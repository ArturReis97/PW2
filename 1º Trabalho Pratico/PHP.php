<html>
  <head>
    <title>Soma em PHP</title>
  </head>

<body>

<?php
function calculo($valor1, $valor2)
{
  return $valor1+$valor2;
}

$v1=$_POST['valor1'];
$v2=$_POST['valor2'];

$soma=calculo($v1, $v2);
   echo"A soma é:$soma";

?>
</body>
</html>