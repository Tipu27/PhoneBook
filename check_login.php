<?php 
	session_start();
	include 'db.php';
	//mysql_real_escape_string(); for prevent sql injection.
	if($_SERVER['REQUEST_METHOD']=='POST'){
		//echo "inside";
		$user = mysqli_real_escape_string($conn, $_POST['l_email']);
		$pass = mysqli_real_escape_string($conn, $_POST['l_password']);
	}
	//echo $user." user info ".$pass;
	if(!empty($user) && !empty($pass)){
		$sql = "SELECT email FROM user WHERE email='$user' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if($result){
			//var_dump($result);
			if(mysqli_num_rows($result)>0){
				$_SESSION['email'] = $user;
				header("Location: http://www.localhost/PhoneBook/login.php");
				exit;
			}else{
				header("Location: http://www.localhost/PhoneBook/agine_login.php");
				exit;
			}
		}else{
			header("Location: http://www.localhost/PhoneBook/agine_login.php");
			exit;
		}
	}

?>