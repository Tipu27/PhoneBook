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
    #delete{
      color: green;
    }
    button{

    }
  </style>
</head>
<body>
  <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark container">
    <a class="navbar-brand" href="#">Phone Book</a>
  </nav>

  <!-- <div class="container"> -->
    <div class="row">
      <div class="col-lg-4 jumbotron vertical-center">
        <h3>Check your ID & password.</h3>
        <form class="my-2 my-lg-0 ml-auto" action="check_login.php" method="POST">
        <label for="InputEmail" class="in_colore">Email: </label>
          <input class="form-control mr-sm-2" type="email" id="InputEmail" name="l_email">
        <label for="InputPassword" class="in_colore">Password:</label>
          <input class="form-control mr-sm-2" type="password" id="InputPassword" name="l_password">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" value="submit">Submit</button>
      </form>
    </div>
      </div>
  <!-- </div> -->
</body>
</html>