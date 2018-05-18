<?php 
  session_start();
  include 'db.php';
  if(!isset($_SESSION['email'])){
    header('Location: http://www.localhost/PhoneBook/index.php');
    exit;
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
    img{
      border-radius: 50%;
      width: 6em;
      height: 6em;
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
        <?php 
            if($_SESSION['delete']){
              echo "<p id='delete'>Successfully delete an entry.</p>";
              $_SESSION['delete'] = false;
            }

            if($_SESSION['edit']){
              echo "<p id='delete'>Successfully edit an entry.</p>";
              $_SESSION['edit'] = false;
            }
            $user_check = mysqli_real_escape_string($conn, $_SESSION['email']);
            $sql = "SELECT id, firstname, lastname, phone, emailContact, image FROM contact WHERE emailUser = '$user_check'";
            $result = mysqli_query($conn, $sql);
            if($result){
              if(mysqli_num_rows($result)>0){
                echo "<table class='table table-dark'>
                      <thead>
                        <tr>
                          <th scope='col'>#</th>
                          <th scope='col'>Profile</th>
                          <th scope='col'>First</th>
                          <th scope='col'>Last</th>
                          <th scope='col'>Number</th>
                          <th scope='col'>Email</th>
                          <th scope='col'>Modification</th>
                        </tr>
                      </thead>";
                $i=0;
                echo "<tbody>";
                while($row = mysqli_fetch_array($result))
                {
                  $im = $row['image'];
                  $image_src = "upload/".$im;
                  $i++;
                  echo "<tr>";
                  echo "<td scope='row'>" . $i . "</td>";
                  echo "<td> <img src='".$image_src."'></td>";
                  echo "<td>" . $row['firstname'] . "</td>";
                  echo "<td>" . $row['lastname'] . "</td>";
                  echo "<td>" . $row['phone'] . "</td>";
                  echo "<td>" . $row['emailContact'] . "</td>";
                  echo "<td><button type='button' class='btn btn-info'><a href='edit.php?id=".$row['id']."'>EDIT</a></button> <button type='button' class='btn btn-warning'><a href='delete.php?id=".$row['id']."'>DELETE</a></button></td>";

                  echo "</tr>";
                }
                  echo "</tbody>" ;
                echo "</table>";

              }else{
                echo "<h3 class='text-center'>Sorry, Your Phone Book is empty.</h3>";
              }
            }else{
                echo "fetch not success.";
            }
        ?>
        <button type='button' class='btn btn-info'><a href='add_contact.php'>ADD CONTACT</a></button>
      </div>
  </div>
</body>
</html>