<?php

   $formpesquisa = mysqli_real_escape_string($mysqli, $_POST['Pesquisar']);
   
   $sql = "SELECT * FROM posts WHERE title LIKE '%$formpesquisa%'";
   
   
   $result = mysqli_query($mysqli, $sql);
   
   while ($row = mysqli_fetch_assoc($result)){
   echo "<h1 class='display-5'>" . $row['title'] . "</h1>";
   echo "<p class='lead'>" . $row['text'] . "</td>";
   echo "<hr>";
   echo "<br>";
   }
   
   
   
   ?>