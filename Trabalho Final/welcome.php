<?php
   // Initialize the session
   session_start();
   
   
   // Include config file
   require_once "config.php";
   
   $id = $title = $text = $posts_err = "";
   
   $sql = "SELECT id, title, text FROM posts";
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>Projeto Final</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" href="STYLE.css">
   </head>
   <body>
      <div class="contentor">
         <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <img src="reddit-logo.png" width="35px">
            <a class="navbar-brand" href="welcome.php">ReddClone</a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
               <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                  <li class="nav-item active">
                     <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="profile.php">Profile<span class="sr-only"></span></a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="newPost">Create Post</a>
                  </li>
               </ul>
               <form class="form-inline my-2 my-lg-0" method="POST">
                  <input class="form-control mr-sm-2 " type="search" placeholder="search post" aria-label="Search" name="Pesquisar">
                  <button class="btn btn-outline-success my-2 my-sm-0 btn-sm " type="submit">Submit</button>
               </form>
            </div>
         </nav>
         <!-- Apresentar os posts !-->
         <div class='jumbotron jumbotron-fluid'>
            <div class='container'>
               <?php
                  if (isset($_POST) && isset($_POST["Pesquisar"]) && $_POST["Pesquisar"]!=""){
                  include 'pesquisar.php';
                  }
                  else {
                  if($result = $mysqli->query($sql)){
                  if($result->num_rows > 0){
                  
                  while($row = $result->fetch_array()){
                  echo "<h4 class='display-5'>" . $row['title'] . "</h1>";
                  echo "<p class='lead'>" . $row['text'] . "</td>";
                  echo "<hr>";
                  echo "<br>";

                  }
                  
                  // Free result set
                  $result->free();
                  } else{
                  echo "<p class='lead'><em>No records were found.</em></p>";
                  }
                  }
                  }
                  
                  //FECHA A CONEXÃO
                  $mysqli->close()
                  ?>
            </div>
         </div>
      </div>
   </body>
</html>