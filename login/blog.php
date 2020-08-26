<?php 
	

	include '../database.php';

	$email = $_SESSION['email'];

	$query = "select id from users where email='$email' ";

	$db_query= mysqli_query($db, $query);

	$row = mysqli_fetch_assoc($db_query);

	$user_id = $row['id'];

	//$query = "select * from posts where user_id=$user_id";
	$query = "select users.id, users.name, posts.title, posts.description from users 
				inner join posts ";

	$db_query = mysqli_query($db, $query);

	$row = mysqli_fetch_all($db_query, MYSQLI_ASSOC);


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>blog</title>
</head>
<body>
	
		<?php 
			foreach ($row as $value) { ?>
				<h2><?php echo $value['title']; ?> - user: <?php echo $value['name']; ?></h2>
				<p><?php echo $value['description']; ?></p>
				
				<?php 
					if($value['id'] == $user_id ){?>
						<a href="">edit</a>
						<a href="">delete</a>
				<?php } ?>

				<br>
		<?php }

		 ?>
	

</body>
</html>



