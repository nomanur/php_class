<?php 

include '../database.php';

$id = $_GET['id'];

$select = "select image from users where id=$id ";

$image_query = mysqli_query($db, $select);

if ($row = mysqli_fetch_assoc($image_query)) {
	unlink('image/'.$row['image']);
}

$query = "delete from users where id=$id ";

$db_query = mysqli_query($db, $query);



if ($db_query) {
	header('location: profile.php');
}

