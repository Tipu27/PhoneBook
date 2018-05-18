<?php 
  session_start();
  if(isset($_SESSION['email'])){
    session_destroy();
  }
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
    .error {
      color: red;
    }
    .e_color {
      color: green;
    }
  </style>
</head>
<body>
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark container">
    <a class="navbar-brand" href="#">Phone Book</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <form class="form-inline my-2 my-lg-0 ml-auto" action="check_login.php" method="POST">
        <label for="InputEmail" class="in_colore">Email: </label>
          <input class="form-control mr-sm-2" type="email" id="InputEmail" name="email">
        <label for="InputPassword" class="in_colore">Password:</label>
          <input class="form-control mr-sm-2" type="text" id="InputPassword" name="password">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" value="submit">Submit</button>
      </form>
    </div>
  </nav>
</body>
</html>