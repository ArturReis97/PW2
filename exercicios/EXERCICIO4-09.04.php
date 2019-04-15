<!DOCKTYPE HTML>
<html>
<head>
    <meta charset ="utf-8u">
    <title>PHP!!</title>
</head>
  <body>
   <?php

  $html = '<table border=1>';
      for($row=1; $row <= 7; $row++){

             $html .= '<tr>';

        for($col=1; $col <= 7; $col++){

             $html .= '<td>'.($row*$col).'</td>';           
          }
          $html .= '</tr>';
      }
          $html .= '</table>';
      echo $html
    ?>

  </body>
</html>