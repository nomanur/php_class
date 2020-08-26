<?php 


include '../database.php';

if ($_SERVER['REQUEST_METHOD']== 'POST' && $_POST['action'] == 'insert') {
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$address = $_POST['address'];

	$query = "insert into ajax(name, email, address) values('$name', '$email', '$address') ";

	$db_query = mysqli_query($db, $query);

	echo "success";
}

if ($_SERVER['REQUEST_METHOD']== 'POST' && $_POST['action'] == 'getinfo') {
	
	$query = 'select * from ajax';

	$db_query = mysqli_query($db, $query);

	$row = mysqli_fetch_all($db_query, MYSQLI_ASSOC);

	$output = '';

	foreach ($row as $value) {
		$output .= '<tr>
						<td>'.$value["name"].'</td>
						<td>'.$value["email"].'</td>
						<td>'.$value["address"].'</td>
						<td>
							<button class="btn btn-info update" upd=" '.$value["id"].' ">Update</button>
							<button class="btn btn-danger remove" id="delete" del=" '.$value["id"].' ">Delete</button>
						</td>

					</tr>';
	}

	echo $output;
	
}

if ($_SERVER['REQUEST_METHOD']== 'POST' && $_POST['action'] == 'delete') {

	$id = $_POST['id'];

	$query = "delete from ajax where id =$id ";

	$db_query = mysqli_query($db, $query);

	echo "deleted";
	
}

if ($_SERVER['REQUEST_METHOD']== 'POST' && $_POST['action'] == 'updateinfo') {

	$id = $_POST['id'];

	$query = "select * from ajax where id=$id ";

	$db_query = mysqli_query($db, $query);

	$row = mysqli_fetch_all($db_query, MYSQLI_ASSOC);

	$output = [];

	foreach ($row as $value) {
		$output['name'] = $value['name'];
		$output['email'] = $value['email'];
		$output['address'] = $value['address'];
		$output['id'] = $value['id'];
	}

	echo json_encode($output);
	
}

if ($_SERVER['REQUEST_METHOD']== 'POST' && $_POST['action'] == 'updaterow') {

	$id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$address = $_POST['address'];

	$query = "update ajax set name='$name', email='$email', address='$address' where id=$id ";

	$db_query = mysqli_query($db, $query);

	echo "updated";

}







