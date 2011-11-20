#DIC

    $app = new Silex\Application();

Parámetros:

    $app['parametro'] = 'valor';

Servicios:

    $app['servicio'] = function(){ return new Servicio() };

    $servicio = $app['servicio'];
