#Elementos

    require_once __DIR__.'/silex.phar';
    
    $app = new Silex\Application();
    
    $app->get('/', function () {
        return "Hola";
    });
    
    $app->run();

silex.phar

Crear instancia

λ & closures
