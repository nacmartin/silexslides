<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once __DIR__.'/silex.phar';
require_once __DIR__.'/markdown.php';

use Symfony\Component\HttpFoundation\Response;

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
    sort($files, SORT_LOCALE_STRING); 
    foreach($files as $file){
        $slide = Markdown(file_get_contents($app['slides_dir'].$file));
        array_push($slides, $slide);
    }
    $resp = $app['twig']->render('slide.twig', array(
        'slides' => $slides,
    ));

    return new Response($resp, 200, array(
        'Cache-Control' => 's-maxage=0',
    ));
});

$app['http_cache']->run();
