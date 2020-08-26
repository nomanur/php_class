<?php 
	include '../database.php';

	include '../oopusage/oop.php';	
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
		
	<a href="logout.php">Logout</a>

	<table>
		<thead>
			<th>Name</th>
			<th>email</th>
			<th>image</th>
		</thead>
		<tbody>
	<?php 
		$test = true;
		//$email = $_SESSION['email'];
		$query ="select * from users ";

		if ($row = mysqli_query($db, $query)) {

		while ($db_row = mysqli_fetch_assoc($row)) { ?>
			<tr>
		 		<td><?php echo $db_row['name']; ?></td>
		 		<td><?php echo $db_row['email']; ?></td>
		 		<td><img src="<?php echo 'image/'. $db_row['image'] ;?>"></td>
		 		<td>
		 			<a href="edit.php?id=<?php echo $db_row['id']; ?>">Update</a>
		 		</td>
		 		<td>
		 			<a href="delete.php?id=<?php echo $db_row['id'];?>">Delete</a>
		 		</td>
			</tr>
		
		 <?php 	} 
	}
	 ?>

		</tbody>
	</table>
	<br>
	name : <?php 


		User::UserName($db, 'image');

	 ?>
	<br>

	<a href="createpost.php">Create post</a>
	

<!-- 
<?php if (isset($_SESSION['email'])) { ?>
	<h2>Name</h2>				
<?php }else {?>
	<h2>Please login</h2>
<?php } ?>
 -->
</body>
</html>