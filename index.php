<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once __DIR__.'/silex.phar';
require_once __DIR__.'/markdown.php';

$app = new Silex\Application();
$app['slides_dir'] = __DIR__.'/slides/';

$app->register(new Silex\Extension\TwigExtension(), array(
    'twig.path'       => __DIR__.'/views',
    'twig.class_path' => __DIR__.'/vendor/twig/lib',
));

$app->get('/', function () use ($app){
    $slides = array();
    if ($handle = opendir($app['slides_dir'])) {
        while (false !== ($file = readdir($handle))) {
            if ($file != "." && $file != "..") {
                $slide = Markdown(file_get_contents($app['slides_dir'].$file));
                array_push($slides, $slide);
                $slides = array_reverse($slides);
            }
        }
        closedir($handle);
    }
    return $app['twig']->render('slide.twig', array(
        'slides' => $slides,
    ));
});

$app->run();
