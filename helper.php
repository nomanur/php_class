<?php 

function slug($str){

	$trim = rtrim($str);
	$ltrim = ltrim($trim);

	$arr = explode(" ", $ltrim);

	$map = array_map(function($value){
		return $value . '-' ;
	}, $arr);

	$imp = implode("", $map);

	return $sub = substr($imp, 0, -1);
}
