<!DOCKTYPE HTML>
<html>
<head>
    <meta charset ="utf-8u">
    <title>PHP!!</title>
</head>
  <body>

	<?php
  $contador=1;
  $resultado=0;
      for ($i=1; $i<=100; $i++ ){
        $resultado = $i*$i;
        echo "o quadrado de ". $contador++ . " é " . $resultado. "<br>";
      }
    ?>

  </body>	
</html>
