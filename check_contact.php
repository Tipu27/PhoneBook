<?php  
  session_start();
  // if(!isset($_SESSION['email'])){
  //   header('Location: http://www.localhost/PhoneBook/index.php');
  //   exit;
  // }
  unset($_SESSION['u_firstname']);
  unset($_SESSION['u_lastname']);
  unset($_SESSION['u_email']);
  unset($_SESSION['phone']);
  unset($_SESSION['image']);

  // var_dump($_FILES['img']['size']);
  // die("size given");
  
  $firstnameErr = $lastnameErr = $emailErr = $phoneErr = $imageErr= "";
  $u_firstname = $u_lastname = $u_email = $phone = $image ="";

  function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
  }

  if($_SERVER['REQUEST_METHOD']=='POST'){
        $_POST['u_firstname'] = test_input($_POST['u_firstname']);
        if(empty($_POST['u_firstname'])){
          $firstnameErr="First Name is require.";
        }else{
          $u_firstname = test_input($_POST['u_firstname']);
          if (!preg_match("/^[a-zA-Z ]*$/",$u_firstname)) {
            $firstnameErr = "Only letter allowed.";
          }
        }

    
        if (!preg_match("/^[a-zA-Z ]*$/",$u_lastname)) {
          $lastnameErr = "Only letter allowed.";
        }else{
          $u_lastname = test_input($_POST['u_lastname']);
        }

        if(!empty($_POST['u_email'])){
          if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,10})$/",$_POST['u_email'])) {
            $emailErr = "Invalid Email formate.";
          }else{
            $u_email = test_input($_POST['u_email']);
          }
        }
        if (empty($_POST['u_email'])) {
          //$emailErr = "Email is required.";
        }else{
          if (!(filter_var($_POST['u_email'], FILTER_VALIDATE_EMAIL) 
            && preg_match('/@.+\./', $_POST['u_email']))) {
            $emailErr = "Invalid Email formate.";
          }else{
            $u_email = test_input($_POST['u_email']);
          }
        }
    
    

        if(empty($_POST['phone'])){
          $phoneErr = "Phone No. required";
        }else{
          $phone = test_input($_POST['phone']);
        }

        $maxsize    = 2097152;
        $name = $_FILES['img']['name'];
        if(!empty($name)){//check for empty
              if($_FILES['img']['size']>=$maxsize || $_FILES['img']['size']==0){
                    $imageErr = "Choose file size less than 2MB";
                    $_SESSION['sizeErr'] = $imageErr;
              }else{
                    $target_dir = "upload/";
                    $target_file = $target_dir . basename($_FILES["img"]["name"]);

                    // Select file type
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                    // Valid file extensions
                    $extensions_arr = array("jpg","jpeg","png","gif");

                    // Check extension
                    if( in_array($imageFileType,$extensions_arr) ){ 
                        $username = $_SESSION['email'];
                        $image = $username."_".$name; 
                        // echo $image;
                        // die("Image name change");
                    }else{
                        $imageErr = "Try jpg, jpeg, png, gif formate";
                        }
                    }
        }else{
          $imageErr = "Choose an image.";
        }
  
  }

  $data = ['fErr' => $firstnameErr, 'lErr' => $lastnameErr, 'eErr' => $emailErr, 'pErr' => $phoneErr, 'iErr' => $imageErr, 'f' => $firstname, 'l' => $lastname, 'e' => $u_email, 'p'=>$phone, 'i' => $image];

  $sent_data = http_build_query($data);

  if(!empty($firstnameErr) || !empty($lastnameErr) || !empty($emailErr) || !empty($phoneErr) || !empty($imageErr)){
        header("Location: http://www.localhost/PhoneBook/add_contact.php" .(FALSE === empty($sent_data) ? '?'.$sent_data:''));
        exit();
  }else{

      $_SESSION['u_firstname'] = $u_firstname; 
      $_SESSION['u_lastname'] = $u_lastname;
      $_SESSION['u_email'] = $u_email;
      $_SESSION['phone'] = $phone;
      $_SESSION['image'] = $image;
    // var_dump($_FILES['img']['size']);
    
      if(move_uploaded_file($_FILES['img']['tmp_name'],'upload/'.$image)){
        header("Location: http://www.localhost/PhoneBook/entry_contact.php");
        exit();
      }else{
        // echo "ghgh";
        var_dump($_FILES['img']['tmp_name']);
        var_dump($_FILES['img']['name']);
        var_dump($_FILES['img']['size']);
      }
    
  }

?>