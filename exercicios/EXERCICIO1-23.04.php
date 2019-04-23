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
        $bmi = $height / ($weight^2);
        echo "Your body fat is: $bmi ";
      }
      //CHAMAR A FUNÇÃO
      getBmi(85, 1.74)

    ?>
  </body>	
</html>
