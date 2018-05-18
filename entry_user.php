<?php 
	session_start();
	include 'db.php';
	if(!isset($_SESSION['email'])){
		header('Location: http://www.localhost/PhoneBook/index.php');
		exit;
	}
	//session_unset();
	$sql = "INSERT INTO user (email, firstname, lastname, password, gender) VALUES ('".$_SESSION['email']."', '".$_SESSION['firstname']."', '".$_SESSION['lastname']."', '".$_SESSION['password']."', '".$_SESSION['gender']."')";

	$res = mysqli_query($conn, $sql);

	if($res){
		header('Location: http://www.localhost/PhoneBook/login.php');
		exit;
	}else{
		header('Location: http://www.localhost/PhoneBook/index.php');
		exit;
	}
	
?>