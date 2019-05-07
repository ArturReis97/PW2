<?php

class Calculator
{
    function CalculaBmi($Altura, $Peso)
    {
       $bmi = $Peso / ($Altura*$Altura);
   
         return $bmi;
    }
}
    $IMC = new Calculator();

    if(isset($_REQUEST["Altura"]))
    {
       echo "<p>Your height is, " . $_REQUEST["Altura"] . "</p>";
       echo "<p>and your weight is: ". $_REQUEST["Peso"] ."</p>";
       echo "<p>So your perfect BMI is: ". $IMC -> CalculaBmi($_REQUEST["Altura"], $_REQUEST["Peso"]) ."</p>";
    }
?>