<!DOCKTYPE HTML>
<html>
<head>
    <meta charset ="utf-8u">
    <title>PHP!!</title>
</head>
  <body>

	<?php
      // DEFENIR A FUNÇÃO
      function getBmi($height, $weight){
        $bmi = $height / $weight;
        echo "Your body fat is $height and $weight : $bmi ";
      }
      //CHAMAR A FUNÇÃO
      getBmi(85, 174)
      
    ?>
           
  </body>	
</html>
