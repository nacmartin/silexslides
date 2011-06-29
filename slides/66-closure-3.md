#Anidadas

<center class="vcenter">

    $calculadora = function($operacion){
      if ($operacion == '+'){
        return function($a, $b) {return $a + $b;};
      }else{
        return function($a, $b) {return $a - $b;};
      }
    };
    
    $sumador = $calculadora('+');
    echo $sumador(2, 3);

</center>
