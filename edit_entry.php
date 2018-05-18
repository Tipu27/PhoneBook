<?php 
	session_start();
	include 'db.php';
	if(!isset($_SESSION['email'])){
		header('Location: http://www.localhost/PhoneBook/index.php');
		exit;
	}

	//session_unset();
	// $sql = "INSERT INTO user (email, firstname, lastname, password, gender) VALUES ('".$_SESSION['email']."', '".$_SESSION['firstname']."', '".$_SESSION['lastname']."', '".$_SESSION['password']."', '".$_SESSION['gender']."')";

	// $sql = "INSERT INTO contact (firstname, lastname, phone, emailContact, emailUser) VALUES ('".$_SESSION['u_firstname']."', '".$_SESSION['u_lastname']."', '".$_SESSION['phone']."', '".$_SESSION['u_email']."', '".$_SESSION['email']."')";
	$fname = mysqli_real_escape_string($conn, $_GET['f']);
	$lname = mysqli_real_escape_string($conn, $_GET['l']);
	$phone = mysqli_real_escape_string($conn, $_GET['p']);
	$email = mysqli_real_escape_string($conn, $_GET['e']);
	$id = mysqli_real_escape_string($conn, $_GET['id']);
	$im = mysqli_real_escape_string($conn, $_GET['im']);
	$im_re = mysqli_real_escape_string($conn, $_GET['im_re']);
	
	$sql = "UPDATE contact SET firstname='$fname', lastname='$lname', phone = '$phone', emailContact= '$email', image = '$im' WHERE id = '$id'";

	$res = mysqli_query($conn, $sql);

	if($res){
		$_SESSION['edit'] = true;
		header('Location: http://www.localhost/PhoneBook/all_contact_list.php');
		exit;
	}else{
		header('Location: http://www.localhost/PhoneBook/edit.php');
		exit;
	}
	
?>
