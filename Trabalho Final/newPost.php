<?php
// Initialize the session
session_start();

// Include config file
require_once "config.php";

//submit para bd
// Processing form data when form is submitted
$textTitle_err = $textTitle = "";
$textPost_err = $textPost = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if Title is empty
    if(empty(trim($_POST["textTitle"]))){
        $textTitle_err = "Please enter title.";
    } else{
        $textTitle = trim($_POST["textTitle"]);
    }
    
    // Check if Post is empty
    if(empty(trim($_POST["textPost"]))){
        $textPost_err = "Please enter your text.";
    } else{
        $textPost = trim($_POST["textPost"]);
    }
    
    // Validate credentials
    if(empty($textTitle_err) && empty($textPost_err)){

        // Prepare a select statement
        $sql = "INSERT INTO posts (title, text) VALUES (?, ?)";

        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ss", $param_title, $param_text);
            
            // Set parameters
            $param_title = $textTitle;
            $param_text = $textPost; // Creates a password hash
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location: welcome.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        $stmt->close();
    }
    
    // Close connection
    $mysqli->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Projeto Final</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="STYLE.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <img src="reddit-logo.png" width="35px">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">ReddClone</a>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="welcome.php">Home<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="profile.php">Profile<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="newPost">Create Post</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2 " type="search" placeholder="search post" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0 btn-sm" type="submit">Submit</button>
        </form>
      </div>
    </nav>

    <form action="" method="post" class="centrarForm">
      <div class="form-group row">
        <label for="inputPassword" placeholder="title" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10">
          <input type="text-box" placeholder="title" class="form-control centrarPost" name="textTitle" id="textPost">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10">
          <textarea class="form-control" style=" width:50% ; margin: auto" name="textPost" rows="10" id="textPost" placeholder="text"></textarea><br>
          <button class="btn btn-outline-success my-2 my-sm-0 btn-lg" type="submit">Submit</button>
        </div>
      </div>
    </form>

    </body>
    </html>