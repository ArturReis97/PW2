<!DOCKTYPE HTML>
<html lang="en">
<head>
   <title>Example of PHP $_REQUEST</title>
</head>
  <body>
	<?php

    function CalculaIdade($data)
     {
       $today = "2019";
       $data = $today - $data;
       return $data;
     }

    if(isset($_REQUEST["firstName"]))
     {
       echo "<p>Hi, " . $_REQUEST["firstName"] . "</p>";
       echo "<p>Idade: ". CalculaIdade($_REQUEST["birthYear"]) ."</p>";
     }

        
    ?>
    </form>
  </body>	
</html>