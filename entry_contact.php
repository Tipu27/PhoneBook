<?php 
	session_start();
	if(!isset($_SESSION['email'])){
		header('Location: http://www.localhost/PhoneBook/index.php');
		exit;
	}
	include 'db.php';
	//session_unset();

	if(empty($_SESSION['u_email'])){
		//$_SESSION['u_email'] = " ";
	}
	$sql = "INSERT INTO contact (firstname, lastname, phone, emailContact, emailUser, image) VALUES ('".$_SESSION['u_firstname']."', '".$_SESSION['u_lastname']."', '".$_SESSION['phone']."', '".$_SESSION['u_email']."', '".$_SESSION['email']."', '".$_SESSION['image']."')";

	$res = mysqli_query($conn, $sql);

	if($res){
		header('Location: http://www.localhost/PhoneBook/all_contact_list.php');
		exit;
	}else{
		header('Location: http://www.localhost/PhoneBook/add_contact.php');
		exit;
	}
?>