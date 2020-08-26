<?php 

//include '../database.php';



class User
{

	public $db;

	// public function __construct($db)
	// {
	// 	$this->db = $db;	
	// }

	public static function UserName($db, $data = "name")
	{
		$email = $_SESSION['email'];

		$query = "select {$data} from users where email='$email'";

		$dbe = mysqli_query($db, $query);

		$user = mysqli_fetch_object($dbe);

		echo $user->$data;

	}

}





