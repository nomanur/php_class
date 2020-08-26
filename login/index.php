<?php 

	

	include '../database.php';

	// include composer autoload
	require '../vendor/autoload.php';

		// import the Intervention Image Manager Class
	use Intervention\Image\ImageManager;


	// create an image manager instance with favored driver
	$manager = new ImageManager(array('driver' => 'gd'));
	//require '../vendor/autoload.php';



	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	

		if (isset($_SESSION['block_time'])) {
			if (time() - $_SESSION['block_time'] > 10) {
				unset($_SESSION['attempt']);
				unset($_SESSION['block_time']);
			}
		}


		$_SESSION['attempt'] += 1;

		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$md_password = md5($password);
		$confirm_password = $_POST['confirm_password'];
		$checkbox = isset($_POST['agreement']);
		$image =  $_FILES['image']['name'];
		$tmp_image =  $_FILES['image']['tmp_name'];

		$db_email = "select * from users where email='$email' ";
		
		$query = mysqli_query($db, $db_email);

		$num_rows = mysqli_num_rows($query);


	

		if (strlen($name) <= 0 || strlen($name) < 4) {
			$msg = "name cannot be empty and cannot be less than 4";
		}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$msg = "email is not valid";
		}elseif ($password !==  $confirm_password) {
			$msg = "Password didnt match";
		}elseif ($checkbox != "on") {
			 $msg = "you need to agree our terms n condifion";
		}elseif ($num_rows==1) {
			 $msg = "email already exist";
		}elseif($image == ''){
			 $msg = "image is not given";
		}
		else{


			$image =  $_FILES['image']['name'];

			$ext = explode('.', $image);

			$last_ext = end($ext);

			$exttolower = strtolower($last_ext);

			if ($exttolower == 'jpg' || $exttolower == 'png' || $exttolower == 'bmp') {
				
				$uniqeName = rand(1,1000).rand(1,1000).rand(1,1000).'.'.$exttolower;

				// to finally create image instances
				$image = $manager->make($tmp_image)->resize(300, 200);


				if($image->save('image/'. $uniqeName)){
					$query = "insert into users(name, email, password, image) values('$name', '$email','$md_password', '$uniqeName')";
					
					if (mysqli_query($db, $query)) {
						$_SESSION['email'] = $email;
						header('location: profile.php');
					}

				}else{
					$msg = "image not uploaded";
				}
			}

		}
	}
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Login register system</title>

</head>
<body>
	

	<?php 
		
		if (isset($msg)) {
			echo $msg;
			
		}
	 ?>

	<form action="" method="POST" enctype="multipart/form-data">
		<label for="name">Name</label>
		<input type="text" name="name">
		<br>
		<label for="email">Email</label>
		<input type="text" name="email">
		<br>
		<label for="password">Password</label>
		<input type="text" name="password">
		<br>
		<label for="confirm_password">Confirm Password</label>
		<input type="text" name="confirm_password">
		<br>
		<input type="checkbox" name="agreement">
		<label for="agreement">Check to agree our terms n condifion</label>
		<br>
		<input type="file" name="image">
		<br>
		<label for="gender">Male</label>
		<input type="radio" name="gender" value="male">
		<br>
		<label for="gender">Female</label>
		<input type="radio" name="gender" value="female">
		<br>
		<select name="religion">
			<option value="islam">Islam</option>
			<option value="hindu">Hindu</option>
		</select>
		<br>
		<label for="days">Sat</label>
		<input type="checkbox" name="days[]" value="sat">
		
		<label for="days">Sun</label>
		<input type="checkbox" name="days[]" value="sun">
		<br>

	
		<br>
		
		<?php 
			if (($_SESSION['attempt']) > 3) { 

				$_SESSION['block_time'] =  time();
				?>
				<p>wait for 10 sec</p>
				
		 <?php }else{ ?>
				<a href="login.php">Login</a>
				<input type="submit" name="submit">
			<?php }
		 ?>
			
		

	</form>

</body>
</html>