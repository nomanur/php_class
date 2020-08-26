<?php


interface test {

	public function FunctionName(array $value);

}


class Post implements test
{

	public function FunctionName(array $value)
	{
		echo $value;
	}

}


$post = new Post();

$post->FunctionName('test');