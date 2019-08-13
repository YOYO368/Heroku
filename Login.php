<?php

if(isset($_POST['login_btn'])) 
{
    include 'database.php';

    if(isset($_POST['userId']))
     {
        $userId = $_POST['userId'];
        if(isset($_POST['userPassword'])) 
        {
            $userPassword = $_POST['userPassword'];
        }
        else
        {
            echo "<script>alert('You have to input password');</script>";
        }
	}
    else
    {
        echo "<script>alert('You have to input UserName');</script>";
    }
	$query = "Select customerId , customerPassword from tbcustomer where customerId = '" .$userId ."' and customerPassword = SHA1(UNHEX(SHA1('".$userPassword."')));";
	
	$result = mysqli_query($connection, $query);

	if($result == false) {
		 echo "error: " . mysqli_error($connection);
	}
	else
	{
		if ($result->num_rows > 0) {
		while($row = mysqli_fetch_row($result)) {
			$_SESSION['User_ID'] = $row[0];
			$_SESSION['userPassword'] = $row[1];
		}
			header("Location: index.php");
		}
		else {
			echo "false";
		}		
	}
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Login Page </title>
        <link rel="stylesheet" type="text/css" href="css/MainPageStyle.css">
 
    </head>
    <body class="body1">
		<div class="header">
			<h1> Login </h1>
		</div>
		<?php
			if(isset($_SESSION['message'])){
				$msg=$_SESSION['message'];
				echo "<div id='error_msg'>".$msg."</div>";
				unset($_SESSION['message']);
			}
		?>
		<form class="form1" method="post" action="Login.php">
			<table>
				<tr>
					<td colspan="2">User ID:</td>
					<td><input type="text" name="userId" class="textInput"></td>
				</tr>
				<tr>
					<td colspan="2">Password:</td>
					<td><input type="password" name="userPassword" class="textInput"></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input type="submit" name="login_btn" value="LOGIN" style="padding:15px 25px;border:none;background-color: lightpink;color: black;margin-top: 40px;"/></td>
				</tr>
			</table>
		</form>
	</body>
</html>
