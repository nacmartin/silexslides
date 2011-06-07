##Aserciones

    $app->get('/Hola/{nombre}', function ($nombre) {
        return "Hola $nombre";
    })->assert('nombre', '\w+');;

##Valores por defecto

    $app->get('/Hola/{nombre}', function ($nombre) {
        return "Hola $nombre";
    })->value('nombre', 'Nacho');;


##Con nombre


    $app->get('/Hola/{nombre}', function ($nombre) {
        return "Hola $nombre";
    })->bind('saludador');
