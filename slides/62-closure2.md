#Closures

<center class="vcenter">

    $momentos = array('tardes', 'noches');

    $saluda = function($id) use ($momentos){ echo "Buenas $momentos[$id]\n"; };
    
    $saluda(0);

Funciones λ ligadas a variables de su ámbito (_scope_).

</center>
