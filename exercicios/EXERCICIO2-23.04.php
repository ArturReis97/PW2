<!DOCKTYPE HTML>
<html>
<head>
    <meta charset ="utf-8u">
    <title>PHP!!</title>
</head>
  <body>

	<?php
      //NUMEROS PRIMOS ATE 300
      function getPrimos($num1)
      {

      for ($i = 1; $i <= $num1 ; $i++)
      {
           $divisao = 0;

      for ($j = $i ; $j >= 1 ; $j--)
      {
          if (($i % $j) == 0)
          {
            $divisao++;
          }
     }
          if ($divisao == 2)
          {
              echo $i . ', ';
          }
        }  
     }
     echo getPrimos(300);
    ?>

  </body>	
</html>

