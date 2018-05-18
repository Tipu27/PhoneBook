<?php 
  session_start();
  if(!isset($_SESSION['email'])){
    header('Location: http://www.localhost/PhoneBook/index.php');
    exit;
  }
  // if(!isset($_SESSION['email'])){
  //     header("Location: http://www.localhost/PhoneBook/index.php");
  //   exit;
  // }
  //echo $_GET['firstnameErr'];
?>
<!DOCTYPE html>
<html>
<head>
  <title>Index</title>
  <link rel="icon" href="art.ico">
  <link rel="stylesheet" type="text/css" href="bootstrap.css">
  <style type="text/css">
    .in_colore {
      color: #FFFFFF;
    }
    .in-check {
      margin: auto;
    }
    .vertical-center{
      margin: auto; 
    }
    .jumbotron{
      margin-top: 30px;
    }
    body{
      background-color: #90C3D4;
    }
    .text-center{
      text-align: center;
    }
  </style>
</head>
<body>
  <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark container">
    <a class="navbar-brand" href="#">Phone Book</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <button class="ml-auto"><a href="http://www.localhost/PhoneBook/index.php">Logout</a></button>
    </div>
  </nav>

  <div class="container">
    <div class="row">
      <div class="col-lg-12 jumbotron vertical-center">
        <h2 class="text-center">Online Phone Number Storage</h2>
        <a href="all_contact_list.php"><span class="text-center">View all of your contact.</span></a>
        <div>
          <a href="http://www.localhost/PhoneBook/add_contact.php"><span class="text-center">Add a contact.</span></a>
        </div>
      </div>
  </div>
</body>
</html>