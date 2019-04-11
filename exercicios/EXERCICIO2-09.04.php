<!DOCKTYPE HTML>
<html>
<head>
    <meta charset ="utf-8u">
    <title>PHP!!</title>
</head>
  <body>

	<?php

     $i = "abc";
     $x = 0;

       while ( $x <= 8 ) {
         echo $i."<br>";
         $x++;
        
         
       }
       
      $a = "xyz";
      $b = 0;

        do{
         $b++;
         echo $a."<br>";
       }
      while ($b <= 8);
    
          for ($c = 0; $c <= 9 ; $c++){
           echo $c . "<br>";
          }
      
      $items = array(

      "1. " => "Item A",
      "2. " => "Item B",
      "3. " => "Item C",
      "4. " => "Item D",
      "5. " => "Item E",
      "6. " => "Item F"

      ) ;

      //LOOP
      foreach ($items as $key => $value ){
           echo $key . $value . "<br>";
      }
    
    ?>

  </body>	
</html>