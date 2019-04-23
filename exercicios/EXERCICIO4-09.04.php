<!DOCKTYPE HTML>
<html>
<head>
    <meta charset ="utf-8u">
    <title>PHP!!</title>
</head>
  <body>
   <?php

  $html = '<table border=1>';
      for($linhas=1; $linhas <= 7; $linhas++){

             $html .= '<tr>';

        for($col=1; $col <= 7; $col++){

             $html .= '<td>'.($linhas*$col).'</td>';           
          }
          $html .= '</tr>';
      }
          $html .= '</table>';
      echo $html
    ?>

  </body>
</html>