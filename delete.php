<?php 
	session_start();
	include 'db.php';
	if(!isset($_SESSION['email'])){
		header('Location: http://www.localhost/PhoneBook/index.php');
		exit;
	}
	$id = mysqli_real_escape_string($conn, $_GET['id']);
	$sql1 = "SELECT image FROM contact WHERE id='$id'";
	if(mysqli_query($conn, $sql1)){
		$result = mysqli_query($conn, $sql1);
		$row = mysqli_fetch_array($result);
		$un = unlink('upload/'.$row['image']);
	}
	$sql = "DELETE FROM contact WHERE id='$id'";


	if(mysqli_query($conn, $sql) && $un){
		$_SESSION['delete'] = true;

		header("Location: http://www.localhost/PhoneBook/all_contact_list.php");
		exit;
	}else{
		echo "Error In delete.";
	}
?>