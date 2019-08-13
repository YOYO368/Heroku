<?php
	session_start();
	
	$host = "us-cdbr-iron-east-02.cleardb.net";
	$database = "heroku_1bd2b709751bb09";
	$user = "ba0c132d7fde44";
	$password = "667e3d22";

	$connection = mysqli_connect($host, $user, $password, $database);
