#Shared

<br>
<br>

    $app['servicio'] = $app->share(function ($app) {
        return new Servicio();
    });

Solo crea el servicio una vez

