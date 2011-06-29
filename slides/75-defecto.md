#Valores por defecto

<center class="vcenter">

    $app->get('/Hola/{nombre}', function ($nombre) {
        return "Hola $nombre";
    })->value('nombre', 'Nacho');;

</center>
