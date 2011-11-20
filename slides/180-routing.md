#Routing


    require_once __DIR__.'/silex.phar';
    
    $app = new Silex\Application();
    
    $app->get('/Hola/{nombre}', function ($nombre) {
        return "Hola $nombre";
    });
    
    $app->run();

Cuidado con XSS

