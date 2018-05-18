<?php  
	session_start();
	$firstnameErr = $lastnameErr = $emailErr = $passwordErr = $genderErr = $cpasswordErr= "";
	$firstname = $lastname = $email = $password = $gender = $cpassword ="";

	function test_input($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);

		return $data;
	}

	if($_SERVER['REQUEST_METHOD']=='POST'){
		$_POST['firstname'] = test_input($_POST['firstname']);
		if(empty($_POST['firstname'])){
			$firstnameErr="First Name is require.";
		}else{
			$firstname = test_input($_POST['firstname']);
			if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
				$firstnameErr = "Only letter allowed.";
			}
		}

		
		if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
			$lastnameErr = "Only letter allowed.";
		}else{
			$lastname = test_input($_POST['lastname']);
		}

		if (empty($_POST['email'])) {
			$emailErr = "Email is required.";
		}else{
			if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,10})$/",$_POST['email'])) {
				$emailErr = "Invalid Email formate.";
			}else{
				$email = test_input($_POST['email']);
			}
		}

		if(!empty($_POST["password"]) && ($_POST["password"] == $_POST["cpassword"])) {
		    $password = test_input($_POST["password"]);
		    $cpassword = test_input($_POST["cpassword"]);
		    if (strlen($_POST["password"]) <= '8') {
		        $passwordErr = "Your Password Must Contain At Least 8 Characters!";
		    }
		    elseif(!preg_match("#[0-9]+#",$password)) {
		        $passwordErr = "Your Password Must Contain At Least 1 Number!";
		    }
		    elseif(!preg_match("#[A-Z]+#",$password)) {
		        $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
		    }
		    elseif(!preg_match("#[a-z]+#",$password)) {
		        $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
		    }
		}else{
			$cpasswordErr = "Please Check You've Entered Or Confirmed Your Password!";
		}

		if (!isset($_POST['gender'])) {
			$genderErr = "gender is require.";
		}else{
			$gender = test_input($_POST['gender']);
		}
	}
	$data = ['fErr' => $firstnameErr, 'lErr' => $lastnameErr, 'eErr' => $emailErr, 'pErr'=>$passwordErr, 'cpErr' => $cpasswordErr, 'gErr' => $genderErr, 'f' => $firstname, 'l' => $lastname, 'e' => $email, 'p'=>$password, 'cp' => $cpassword, 'g' => $gender, ];

	$sent_data = http_build_query($data);
	if(!empty($firstnameErr) || !empty($lastnameErr) || !empty($emailErr) || !empty($passwordErr) || !empty($cpasswordErr) || !empty($genderErr)){
		header("Location: http://www.localhost/PhoneBook/index.php" .(FALSE === empty($sent_data) ? '?'.$sent_data:''));
		exit;
	}else{
		$_SESSION['firstname'] = $firstname; 
		$_SESSION['lastname'] = $lastname;
		$_SESSION['email'] = $email;
		$_SESSION['password'] = $password;
		$_SESSION['gender'] = $gender;
		header("Location: http://www.localhost/PhoneBook/entry_user.php");
		exit;
	}

?>