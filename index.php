<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once __DIR__.'/silex.phar';
require_once __DIR__.'/markdown.php';

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

$app = new Silex\Application();

$app['slides_dir'] = __DIR__.'/slides/';

$app->register(new Silex\Extension\HttpCacheExtension(), array(
    'http_cache.cache_dir' => __DIR__.'/cache/',
));

$app->register(new Silex\Extension\TwigExtension(), array(
    'twig.path'       => __DIR__.'/views',
    'twig.class_path' => __DIR__.'/vendor/twig/lib',
));

$app->get('/', function () use ($app){
    $slides = array();
    $files  = array();
    if ($handle = opendir($app['slides_dir'])) {
        while (false !== ($file = readdir($handle))) {
            if ($file != "." && $file != "..") {
                array_push($files, $file);;
            }
        }
        closedir($handle);
    }
    sort($files, SORT_NUMERIC); 
    foreach($files as $file){
        $content = file_get_contents($app['slides_dir'].$file);
        //Possible metadata in first line
        $matches = array();
        preg_match('/%(.*)%/', $content, $matches);
        $classslide = null;
        if($matches){
            $classslide = $matches[1];
            $content = preg_replace('/%(.*)%/', '', $content);
        }
        $slide['slide'] = Markdown($content);
        $slide['class'] = $classslide;
        array_push($slides, $slide);
    }
    $resp = $app['twig']->render('slide.twig', array(
        'slides' => $slides,
    ));

    return new Response($resp, 200, array(
        'Cache-Control' => 's-maxage=0',
    ));
});

$app->error(function (\Exception $e) {
    if ($e instanceof NotFoundHttpException) {
        return new Response('La página que buscas no está aquí.', 404);
    }

    $code = ($e instanceof HttpException) ? $e->getStatusCode() : 500;
    return new Response('Algo ha fallado en nuestra sala de máquinas.', $code);
});

$app['http_cache']->run();
