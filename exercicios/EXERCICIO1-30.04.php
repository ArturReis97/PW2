<!DOCKTYPE HTML>
<html lang="en">
<head>
   <title>Example of PHP $_REQUEST variable </title>
</head>
  <body>
	<?php
      if(isset($_REQUEST["name"])){
          echo "<p>Hi, " . $_REQUEST["name"] . "</p>";
      }
    ?>
    <form method="get" action="<?php echo $_SERVER["PHP_SELF"];?>">
         <label for="inputName">Name:</label>
         <input type="text" name="name" id="inputName">
         <input type="submit" value="Submit"><br>
         <input type="radio" name="gender"
            <?php if (isset($gender) && $gender=="female") echo "checked";?>
            value="female">Female
         <input type="radio" name="gender"
            <?php if (isset($gender) && $gender=="male") echo "checked";?>
            value="male">Male
    </form>
    
  </body>	
</html>
