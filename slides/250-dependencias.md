#Dependencias

<center class="vcenter">

    $app['servicio'] = function ($app) {
        return new Service($app['otro_servicio'], $app['otro_servicio.config']);
    };

</center>
