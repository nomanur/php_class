<?php

	$db = mysqli_connect('localhost', 'root', '123', 'php_class');

	if (!$db) {
		echo "not connected";
	}

	session_start();
