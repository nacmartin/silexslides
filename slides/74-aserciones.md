#Aserciones

<center class="vcenter">

    $app->get('/Hola/{nombre}', function ($nombre) {
        return "Hola $nombre";
    })->assert('nombre', '\w+');;

</center>
