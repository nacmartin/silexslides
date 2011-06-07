#Tan sencillo como...

    require_once __DIR__.'/silex.phar';
    
    $app = new Silex\Application();
    
    $app->get('/', function () {
        return "Hola";
    });
    
    $app->run();

<p class="incremental">silex.phar</p>
<p class="incremental">Crear instancia</p>
<p class="incremental">Closures ¡λ!</p>
