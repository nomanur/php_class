<?php 

include '../database.php';



$query_rows = "select * from posts";
$db_query_rows = mysqli_query($db, $query_rows);
$total_rows = mysqli_num_rows($db_query_rows);


$perpage = 3;


if (!isset($_GET['rows']) || $_GET['rows']==1 ) {
	$page = 0;
}else{
	$page = ($_GET['rows'] * $perpage) - $perpage;
}

$show_page = ceil($total_rows / $perpage);


$query = "select * from posts limit $page, $perpage";

$db_query = mysqli_query($db, $query);



$posts = mysqli_fetch_all($db_query, MYSQLI_ASSOC);






// for ($i=1; $i <3 ; $i++) { 
// 	echo $i;
// }

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	

	<?php 
		foreach ($posts as $post) {
			echo $post['title'] . "<br>";
	}

	 ?>

	<ul>
		<?php 
			for ($i=1; $i <=$show_page ; $i++) { ?>
				<li><a href="paginate.php?rows=<?php echo $i;?>"><?php echo $i; ?></a></li>
			<?php }
		 ?>
	</ul>

</body>
</html>