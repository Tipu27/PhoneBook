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
  <link rel="stylesheet" type="text/css" href="decoration.css">
</head>
<body>
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark container">
    <a class="navbar-brand" href="#">Phone Book</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <form class="form-inline my-2 my-lg-0 ml-auto" action="check_login.php" method="POST">
        <label for="InputEmail" class="in_colore">Email: </label>
          <input class="form-control mr-sm-2" type="email" id="InputEmail" name="l_email">
        <label for="InputPassword" class="in_colore">Password:</label>
          <input class="form-control mr-sm-2" type="password" id="InputPassword" name="l_password">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" value="submit">Submit</button>
      </form>
    </div>
  </nav>

  <div class="container">
    <div class="row">
      <div class="col-lg-5 col-md-5 g_border jumbotron">
        <h3>You can store here your contact. And can access any time you want.</h3>
      </div>
      <div class="col-lg-1 col-md-1 g_border"></div>
      <div class="col-lg-6 col-md-6 g_border jumbotron">
        <h2>Create an account.</h2>
        <form action="create_user_account.php" method="POST">
          <div class="form-group">

            <label class="control-label my-2" for="Firstname">First Name: </label><span class="error"><?php echo $_GET['fErr'] ?></span>
            <div>
              <input type="text" name="firstname" id="Firstname" class="in-check" value="<?php echo $_GET['f']; ?>"><span class="e_color">*</span>
            </div>

            <label class="control-label my-2" for="Lastname">Last Name: </label>
            <span class="error"><?php echo $_GET['lErr'] ?></span>
            <div>
              <input type="text" name="lastname" id="Lastname" class="in-check" value="<?php echo $_GET['l']; ?>" >
            </div>

            <label class="control-label my-2" for="Email">Email: </label>
            <span class="error"><?php echo $_GET['eErr'] ?></span>
            <div>
              <input type="email" name="email" id="Email" class="in-check" value="<?php echo $_GET['e']; ?>"><span class="e_color">*</span>
            </div>

            <label class="control-label my-2" for="Password">Password:  </label>
            <span class="error"><?php echo $_GET['pErr'] .$_GET['cpErr']?></span>
            <div>
              <input type="password" name="password" id="Password" class="in-check"><span class="e_color">*</span>
            </div>

            <label class="control-label my-2" for="ConfirmPassword">Confirm Password:  </label>
            <div>
              <input type="password" name="cpassword" id="ConfirmPassword" class="in-check"><span class="e_color">*</span>
            </div>

            <span class="error"><?php echo $_GET['gErr'] ?></span>
            <div>
              <label class="control-label my-2" for="Gender">Gender: </label>
              <input type="radio" name="gender" id="Gender" value="male">
              <label>Male</label>
              <input type="radio" name="gender" id="Gender" value="female">
              <label>Female</label><span class="e_color">*</span>
            </div>
          </div>
          <button class="btn btn-outline-success my-2 my-sm-0 mr-center" type="submit" value="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>