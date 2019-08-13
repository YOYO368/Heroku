<?php
	session_start();
	session_destroy();
	$_SESSION["User_ID"] = "";
	$_SESSION['message'] = "You are now Logged out";
	header("Location: Index.php");
	exit();
?>