<?php 
	
	include '../database.php';

	if (isset($_SESSION['email'])) {
		header("location: profile.php");
	}
	

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$email = $_POST['email'];
		$password = $_POST['password'];

	
	
	$db_email = "select * from users where email='$email' ";
	
	$query = mysqli_query($db, $db_email);

	$num_rows = mysqli_num_rows($query);

	$assoc = mysqli_fetch_assoc($query);

	if ($num_rows != 1) {
		echo "email doesnt exist plz register";
	}elseif (md5($password) != $assoc['password']) {
		echo "password didnt match";
	}else{
		$_SESSION['email'] = $email;

		header("location: profile.php");
	}
}
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>login</title>
</head>
<body>

	<!-- email exist or not -->
	<!-- password match -->
	


	<form action="" method="POST">
		<label for="email">email</label>
		<input type="text" name="email">
		<br>
		<label for="password">password</label>
		<input type="text" name="password">
		<br>
		<input type="submit" name="submit">
	</form>

</body>
</html>
