
<!DOCTYPE html>
<html lang="en">
<head>
   <title>Example of PHP $_REQUEST</title>
</head>
  <body>
    

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

    if(!$_GET["Altura"])
{

    ?>

      <form method="get" action="">
      <p>Altura : <input type="text" name="Altura" id="inputName"> metros
      <p>Peso : <input type="text" name="Peso" id="inputName"> Kg <br>
      <br>
      <input type="submit" value="Submit"><br>
       </form>
    <?php
 } 
     else
      {
        echo "<p>Your height is, " . $_REQUEST["Altura"] . "</p>";
        echo "<p>and your weight is: ". $_REQUEST["Peso"] ."</p>";
        echo "<p>So your perfect BMI is: ". $IMC -> CalculaBmi($_REQUEST["Altura"], $_REQUEST["Peso"]) ."</p>";
      }
?>

  </body>
</html>
