<?php 
	
	include '../database.php';

	$email = $_SESSION['email'];

	$query = "select id from users where email='$email' ";

	$db_query= mysqli_query($db, $query);

	$row = mysqli_fetch_assoc($db_query);

	if ($_SERVER['REQUEST_METHOD']=='POST') {
		
		$title = $_POST['title'];
		$des = $_POST['desc'];
		$user_id = $row['id'];

		$dquery = "insert into posts(title, description, user_id) values('$title', '$des', $user_id) ";

		$ddb_query = mysqli_query($db, $dquery);

		if ($ddb_query) {
			$msg = "Post successfully submitted";
		}


	}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>create post</title>
</head>
<body>
	
<?php 

	if (isset($msg)) {
		echo $msg;
	}
 ?>

	<form action="" method="POST">
		
		<label for="title">Title</label>
		<input type="text" name="title">
		<br>
		<label for="desc">Description</label>
		<input type="text" name="desc">
		<br>
		<input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
		<input type="submit" name="submit">
		
	</form>
	<br>

	<a href="blog.php">Show blog</a>
</body>
</html>

