<?php



/**
 *
 */
class user
{

	public $name;

	public function set($name)
	{
		$this->name = $name;
	}


	public function get()
	{
		return $this->name;
	}
}

$user = new User();

$user->set('noman');


echo $user->get();