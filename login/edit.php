<?php 
	include '../database.php';

	$id = $_GET['id'];

	if (isset($_POST['update'])) {
		
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		$query = "UPDATE users SET name ='$name', email='$email', password='$password' where id=$id ";

		$db_query = mysqli_query($db, $query);

		if ($db_query) {
			header('location: profile.php');
		}else{
			echo "problem";
		}

	}

	$query = "select * from users where id='$id' ";

	$db_query = mysqli_query($db, $query);

	$db_info = mysqli_fetch_assoc($db_query);

	if ($_SESSION['email'] != $db_info['email']) {
		header('location: profile.php');
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>update</title>
</head>
<body>
		<h2>Update Users</h2>
		<br>
		<form action="" method="POST" enctype="multipart/form-data">
		<label for="name">Name</label>
		<input type="text" name="name" value="<?php echo $db_info['name']; ?>">
		<br>
		<label for="email">Email</label>
		<input type="text" name="email" value="<?php echo $db_info['email']; ?>">
		<br>
		<label for="password">Password</label>
		<input type="text" name="password" value="<?php echo $db_info['password']; ?>">
		<br>
		<input type="submit" name="update">
		<br>
		

	</form>

</body>
</html>
