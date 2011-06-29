#Protected

    $app['closure_parameter'] = $app->protect(function () {
        exit();
    });
    
    // No sale
    $salir = $app['closure_parameter'];
    
    // Salimos!
    $salir();
