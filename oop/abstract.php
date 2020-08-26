<?php


include '../database.php';

// class user
// {


// 	public static function all($db)
// 	{


// 		$query = "select * from users";

// 		$db_query = mysqli_query($db, $query);

// 		return $show_all = mysqli_fetch_all($db_query, MYSQLI_ASSOC);

// 	}
// }

// User::all($db);




abstract class test {

	abstract public function postAll(string $data, $value);
}


class Post extends test
{

	public function postAll(string $value, $second = 1)
	{
		echo $value . "<br>" . $second;
	}
}

$post = new Post();

$post->postAll('abs');