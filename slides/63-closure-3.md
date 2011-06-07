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

    5

Un concepto simple pero potente

</center>
