<?php 
		session_start();
		$servername = "localhost";
		$name = "root";
		$password = "oxygen.o2";
		$db = "PhoneBook";

		$conn = mysqli_connect($servername, $name, $password, $db);

		if (!$conn) {
    		die("Connection failed: " . mysqli_connect_error());
		}

		function user(){
			$sql = "CREATE TABLE user(
			id INT AUTO_INCREMENT PRIMARY KEY,
			firstname VARCHAR(30) NOT NULL,
			lastname VARCHAR(30),
			password VARCHAR(15), 
			gender VARCHAR(10)
			)";

			return $sql;
		}

		function user_contact(){
			$sql = "CREATE TABLE contact(
			firstname VARCHAR(30) NOT NULL,
			lastname VARCHAR(30) NOT NULL,
			phone VARCHAR(20) NOT NULL,
			emailContact VARCHAR(30),
			emailUser VARCHAR(30) NOT NULL,
			id int(11) NOT NULL AUTO_INCREMENT,PRIMARY KEY (id)
			)";

			return $sql;
		}
		$sql = user_contact();
		if(mysqli_query($conn, $sql)){
			echo "yeh";
		};



		// $email = $_SESSION['email'];
		// $fname = $_SESSION['firstname'];
		// $lname = $_SESSION['lastname'];
		// $password = $_SESSION['password'];
		// $gender = $_SESSION['gender'];

		// function user_data_entry(){
		// 	$sql = "INSERT INTO user (email, firstname, lastname, password, gender) VALUES ( ".$_SESSION('email').","$_SESSION('firstname').", ".$_SESSION['lastname'].", ".$_SESSION['password'].", ".$_SESSION['gender'].")";
		// 	return sql;
		// }

		// function user_data_entry(){
		// 	echo "hi ".$GLOBALS['email'];
		// 	$sql = "INSERT INTO user (email, firstname, lastname, password, gender) VALUES ($email, $fname, $lname, $password, $gender)";
		// 	$res = mysqli_query($GLOBALS['conn'], $sql);
		// 	return $res;
		// }

		// // $sql = "INSERT INTO user (email, firstname, lastname, password, gender) VALUES ($email, $fname, $lname, $password, $gender)";

		// $ss = user_data_entry();
		// $userEmail = $_SESSION['email'];

		// if($ss){
		// 	$_SESSION['userEmail'] = $userEmail;
		// 	header('Location: http://www.localhost/PhoneBook/login.php');
		// 	exit;
		// }else{
		// 	var_dump($sql);
		// }
		
?>