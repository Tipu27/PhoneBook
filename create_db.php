<!DOCTYPE html>
<html>
<head>
	<title>Create a database.</title>
</head>
<body>
	<h1>Create Database.</h1>
	<?php 
		$servername = "localhost";
		$name = "root";
		$password = "oxygen.o2";

		$conn = mysqli_connect($servername, $name, $password);

		if (!$conn) {
    		die("Connection failed: " . mysqli_connect_error());
		}
		$sql = "CREATE DATABASE PhoneBook";

		//$sql = "DROP DATABASE myDB";
		if (mysqli_query($conn, $sql)) {
		    echo "Database deleted successfully";
		} else {
		    echo "Error creating database: " . mysqli_error($conn);
		}
		mysqli_close($conn);
	?>
</body>
</html>