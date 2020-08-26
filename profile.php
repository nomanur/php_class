<!-- <!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
		<a href="logout.php">Logout</a>
</body>
</html> -->


<?php 

$arr1 = [1,2,3];
$arr2 = [4,5,6];

$test = array_merge($arr1, $arr2);

shuffle($test);
print_r($test);

