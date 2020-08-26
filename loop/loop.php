<?php 

$array = ['1', '2', '3'];

foreach ($array as $value) {
	
	if ($value == 2) {
		break;
	}else{
		echo $value . '</br>';
	}
}