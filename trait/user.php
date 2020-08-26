<?php 

include 'post.php';
include 'category.php';

class user
{
	use post, category;
	
}

$user = new user();

echo $user->catname();