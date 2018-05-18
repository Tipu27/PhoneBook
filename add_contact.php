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
  // unset($_FILES);
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
    .text-center{
      text-align: center;
    }
    .jumbotron{
      margin-top: 30px;
    }
    body{
      background-color: #90C3D4;
    }

    .error{
      color: red;
    }

    .container {
      text-align: center;
    }
    #Image {
      margin-left: 10em;
    }
  </style>
</head>
<body>
  <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark container">
    <a class="navbar-brand" href="#">Phone Book</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <button class="ml-auto my-2"><a href="http://www.localhost/PhoneBook/index.php">Logout</a></button>
      <button><a href="http://www.localhost/PhoneBook/index.php">Home</a></button>
    </div>
  </nav>

  <div class="container">
    <div class="row">
      <div class="col-lg-12 jumbotron vertical-center">
        <h2>Contact Form</h2>
        <div class="jumbotron big-info vertical-center">
           <form action="check_contact.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">

            <label class="control-label my-2" for="Firstname">First Name: </label><span class="error"><?php echo $_GET['fErr'] ?></span>
            <div>
              <input type="text" name="u_firstname" id="Firstname" class="in-check" value="<?php echo $_GET['f']; ?>" required><span class="e_color">*</span>
            </div>

            <label class="control-label my-2" for="Lastname">Last Name: </label>
            <span class="error"><?php echo $_GET['lErr'] ?></span>
            <div>
              <input type="text" name="u_lastname" id="Lastname" class="in-check" value="<?php echo $_GET['l']; ?>" >
            </div>

            <label class="control-label my-2" for="Phone">Phone No: </label>
            <span class="error"><?php echo $_GET['pErr'] ?></span>
            <div>
              <input type="text" name="phone" id="Phone" class="in-check" value="<?php echo $_GET['p']; ?>" required><span class="e_color">*</span>
            </div>

            <label class="control-label my-2" for="Email">Email: </label>
            <span class="error"><?php echo $_GET['eErr'] ?></span>
            <div>
              <input type="email" name="u_email" id="Email" class="in-check" value="<?php echo $_GET['e']; ?>">
            </div>

            <label class="control-label my-2" for="Image">Image: </label>
            <span class="error"><?php echo $_GET['iErr'] ?></span>
            <div>
              <input type="file" name="img" id="Image" class="in-check" accept=".jpg, .jpeg, .png, .gif">
            </div>
          <button class="btn btn-outline-success my-2 my-sm-0 mr-center" type="submit" value="submit">Submit</button>
        </form>
        </div>
      </div>
  </div>
</body>
</html>