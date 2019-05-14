
<?php
function calculo($valor1, $valor2)
{
  return $valor1+$valor2;
}

$Valores = json_decode(file_get_contents('php://input'));

$soma = calculo($Valores -> v1, $Valores -> v2);
echo Json_encode($soma);

?>