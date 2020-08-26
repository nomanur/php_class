<?php


// class

// property

// method

// object


// public
// private
// protected


class Users
{ //class

    public $name;
    public $age;

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    public function getInfo()
    {
        echo "name is :" . $this->name . ' ' . "age is: " . $this->age;
    }

    public function show()
    {
        $this->getInfo();
    }
}


$obj = new Users();

//$obj->setName('noman')->setAge('32')->show();



/**
 *
 */
class Post
{
    public static $name;
    public static $age;

    public static function name($name)
    {
        Self::$name = $name;

        return new static;
    }
    public static function age($age)
    {
        Self::$age = $age;

        return new static;
    }


    public static function getInfo()
    {
        echo 'name: '. Self::$name . ' ' . 'age: '. Self::$age;
    }

    public static function show()
    {
        Self::getInfo();
    }
}


//Post::name('noman')->age('32')->show();


class Business
{
    public $test;

    public function __construct()
    {
        $this->test = 'noman';
    }

    public function b()
    {
        return 'from business';
    }
}

class Posts extends Business
{
    // public $test = 'test posts';
    // public function b(){
    // 	return 'from business from post' ;
    // }

    public function name()
    {
        return 'name';
    }
}

$post = new Posts();

//echo $post->test;


class Category
{
    public static $name;

    public function __construct()
    {
        Self::$name = 'category';
        //echo "string";
    }

    public static function catName()
    {
        return 'php';
    }
}


class Ext extends Category
{
    public function __construct()
    {
        Parent::__construct();
    }

    public static function catName()
    {
        return 'php,javascript';
    }
}

$cat = new Category();

 Category::$name;


 $name = 'noman';


 class User
 {

    // public $name;

     // public function __construct($name){
     // 	$this->name = $name;
     // }

     public function name($name = "noman")
     {
         echo $name;
     }
 }


$user = new User();

$user->name("rahman");
