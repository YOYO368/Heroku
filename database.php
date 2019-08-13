<?php
	session_start();
	
	$host = "us-cdbr-iron-east-02.cleardb.net";
	$database = "heroku_7a5e9375a8d8807";
	$user = "bab47069dbc174";
	$password = "1e5dc72f";

	$connection = mysqli_connect($host, $user, $password, $database);
