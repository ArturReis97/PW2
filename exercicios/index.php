<!DOCKTYPE HTML>
<html lang="en">
<head>
   <title>Example of PHP $_REQUEST</title>
</head>
  <body>
	<?php
      if(isset($_REQUEST["name"])){
          echo "<p>Hi, " . $_REQUEST["name"] . "</p>";
      }
    ?>
    <form method="post" action="process.php">
         <p>Primeiro nome: <input type="text" name="name" id="inputName">
         <p>Ultimo nome: <input type="text" name="name" id="inputName">
         <p>Data de nascimento: <input id="date" type="date">
         <input type="submit" value="Submit"><br>
    </form>
  </body>	
</html>