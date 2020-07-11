<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
</head>
<body>

	<!-- method post, get, put, patch, delete -->

	<?php 

		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];

		if ($name == "") {
			$namemsg = "name field is required";
		}

		if (strlen($name) < 4) {
			$namemsg = "name must be minimum 4 char";
		}

		if ($email == "") {
			$emailmsg = "email field is required";
		}

		if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
			$emailmsg = "email is not valid";
		}

		if ($phone < 11) {
			$phonemsg = "number is not valid";
		}
		if (!is_numeric($phone)) {
			$phonemsg =  "phone must be a number";
		}

	 ?>

	<form action="" method="POST">
		<label for="name">name</label>		
		<input type="text" name="name">
		<br>
		<?php if (isset($namemsg)) { ?>
			<span id="msg"><?php echo $namemsg; ?></span>
		<?php } ?>
		<br>
		<label for="email">email</label>		
		<input type="text" name="email">
		<br>
		<?php 
			if (isset($emailmsg)) {
				echo $emailmsg;
			}
		 ?>
		 <br>
		 <label for="phone">Phone</label>
		 <input type="text" name="phone">
		 <br>
		 <?php 
			if (isset($phonemsg)) {
				echo $phonemsg;
			}
		 ?>


		<br>
		<input type="submit" name="submit">
	</form>


		<script type="text/javascript">
			// document.addEventListener("DOMContentLoaded", function(){
			// 	let msg=document.querySelector('#msg');
			// 	setTimeout(function(){
			// 		msg.style.display = 'none';
			// 	}, 3000);

			// });

		</script>

</body>
</html>