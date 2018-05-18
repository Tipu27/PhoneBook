<?php  
  session_start();
  if(!isset($_SESSION['email'])){
    header('Location: http://www.localhost/PhoneBook/index.php');
    exit;
  }
  $firstnameErr = $lastnameErr = $emailErr = $phoneErr= $imageErr ="";
  $e_firstname = $e_lastname = $e_email = $e_phone =$e_image = "";

  function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
  }

  if($_SERVER['REQUEST_METHOD']=='POST'){
    $_POST['e_firstname'] = test_input($_POST['e_firstname']);
    if(empty($_POST['e_firstname'])){
      $firstnameErr="First Name is require.";
    }else{
      $e_firstname = test_input($_POST['e_firstname']);
      if (!preg_match("/^[a-zA-Z ]*$/",$e_firstname)) {
        $firstnameErr = "Only letter allowed.";
      }
    }

    
    if (!preg_match("/^[a-zA-Z ]*$/",$e_lastname)) {
      $lastnameErr = "Only letter allowed.";
    }else{
      $e_lastname = test_input($_POST['e_lastname']);
    }

    if(!empty($_POST['e_email'])){
      if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,10})$/",$_POST['e_email'])) {
        $emailErr = "Invalid Email formate.";
      }else{
        $e_email = test_input($_POST['e_email']);
      }
    }
    // if (empty($_POST['u_email'])) {
    //   //$emailErr = "Email is required.";
    // }else{
    //   if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,10})$/",$_SESSION['u_email'])) {
    //     $emailErr = "Invalid Email formate.";
    //   }else{
    //     $u_email = test_input($_POST['u_email']);
    //   }
    // }
    
    

    if(empty($_POST['e_phone'])){
      $phoneErr = "Phone No. required";
    }else{
      $e_phone = test_input($_POST['e_phone']);
    }
    //image check
    //echo $_POST['hide_im'];
    if(!empty($_FILES['e_img']['name'])){
        $maxsize    = 2097152;
        $name = $_FILES['e_img']['name'];
        //echo $name;
        if(!empty($name)){//check for empty
              if($_FILES['e_img']['size']>=$maxsize || $_FILES['e_img']['size']==0){
                    $imageErr = "Choose file size less than 2MB";
                    $_SESSION['sizeErr'] = $imageErr;
              }else{
                    $target_dir = "upload/";
                    $target_file = $target_dir . basename($_FILES["e_img"]["name"]);

                    // Select file type
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                    // Valid file extensions
                    $extensions_arr = array("jpg","jpeg","png","gif");

                    // Check extension
                    if( in_array($imageFileType,$extensions_arr) ){ 
                        $username = $_SESSION['email'];
                        //echo $username;
                        $image = $username."_".$name; 
                        $e_img = $image;
                        //echo $e_img;
                        // echo $image;
                        // die("Image name change");
                    }else{
                        $imageErr = "Try jpg, jpeg, png, gif formate";
                        }
                    }
        }else{
          $imageErr = "Choose an image.";
        }
  
    }else{
      $e_img = $_POST['hide_im'];
    }

    
  }
  $data = ['fErr' => $firstnameErr, 'lErr' => $lastnameErr, 'eErr' => $emailErr, 'pErr' => $phoneErr, 'f' => $e_firstname, 'l' => $e_lastname, 'e' => $e_email, 'p'=>$e_phone, 'id' => $_POST['id'], 'im' => $e_img, 'im_re' => $_POST['hide_im'] ];

  $sent_data = http_build_query($data);
  if(!empty($firstnameErr) || !empty($lastnameErr) || !empty($emailErr) || !empty($phoneErr)){
    header("Location: http://www.localhost/PhoneBook/edit.php" .(FALSE === empty($sent_data) ? '?'.$sent_data:''));
    exit;
  }else{
    // $_SESSION['e_firstname'] = $e_firstname; 
    // $_SESSION['e_lastname'] = $e_lastname;
    // $_SESSION['e_email'] = $e_email;
    // $_SESSION['e_phone'] = $e_phone;
    // header("Location: http://www.localhost/PhoneBook/entry_contact.php");
    // exit;
    //echo $_POST['hide_im'];
    //echo $e_img;
    
    // die("hide name");
    if($e_img != $_POST['hide_im']){
        unlink('upload/'.$_POST['hide_im']);
        move_uploaded_file($_FILES['e_img']['tmp_name'],'upload/'.$e_img);
    }
    header("Location: http://www.localhost/PhoneBook/edit_entry.php" .(FALSE === empty($sent_data) ? '?'.$sent_data:''));
    exit;
  }

?>