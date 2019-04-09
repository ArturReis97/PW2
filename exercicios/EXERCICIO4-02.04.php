<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
    <?php
    $val = 8;
    echo "Value is now " .$val ."<br>";
    echo "Add 2. Value is now " . ($val+=2) . "<br>";
    echo "Subtract 4. Value is now " . ($val-=4) . "<br>";
    echo "Multiply by 5. Value is now " . ($val*=5) . "<br>";
    echo "Divide by 3. Value is now " . ($val/=3) . "<br>";
    echo "Increment value by one. Value is now " . ($val+=1) . "<br>";
    echo "Decrement. Value by one. Value is now " . ($val-=1) . "<br>";
    ?>
</body>
</html>
