#Con nombre

<center class="vcenter">

    $app->get('/Hola/{nombre}', function ($nombre) {
        return "Hola ". htmlspecialchars($nombre));
    })->bind('saludador');

</center>

