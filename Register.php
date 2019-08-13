<?php
 
    if(isset($_POST['register_btn']))
    {
		include 'database.php';
	
        $userId = $_POST['userId'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
		$email = $_POST['email'];
		$phonenumber = $_POST['phone'];

        if($userId == "")
        {
           echo "<script>alert('You have to input username');</script>";
        }
        else if($email == "")
        {
            echo "<script>alert('You have to input email address');</script>";
        }
        else if($password == "")
        {
           echo "<script>alert('You have to input password');</script>";
        }
        else if($password2 == "")
        {
           echo "<script>alert('You have to input confirm password');</script>";
        }
        else
        {  
            $query = "Select customerId from tbcustomer where customerId = '" .$userId. "';";
	
			$result = mysqli_query($connection, $query);

			if($result->num_rows > 0) {
				while($row = mysqli_fetch_row($userInfo)) {
                $User_Name = $row['customerId'];
 
                    if($User_Name == $userId) 
                    {
                        $_SESSION['message'] = "'$userId' is already exist";
                        header("Location: index.php");
                        exit();
                    }
				}
			}
			else
			{
				if($password == $password2)
				{
					$query = "INSERT INTO tbcustomer(customerId, customerPassword, email,phoneNumber) VALUES('$userId',SHA1(UNHEX(SHA1('$password'))),'$email','$phonenumber')";
					$result = mysqli_query($connection, $query);
					if (!$result) {
						echo "<script>alert('Error');</script>";
					}
					else
					{
						$_SESSION['message'] = "Register success !!!!!!!!!!!!!";
						header("Location: Login.php");
					}
				}
				else
				{
					  echo "<script>alert('The two passwords do not match. Try to check again');</script>";
				}  
			}
        }
     }
?>

<!DOCTYPE html>
<html>
<head>
    <title> Register </title>
    <link rel="stylesheet" type="text/css" href="css/MainPageStyle.css">
</head>
<body class="body1">
    <div class="header">
        <h1> Register </h1>
    </div>
    <?php
		if(isset($_SESSION['message'])){
            $msg=$_SESSION['message'];
            echo "<div id='error_msg'>".$msg."</div>";
			unset($_SESSION['message']);
		}
	?>
    <form class="form1" method="post" action="Register.php">
        <table>
            <tr>
                <td colspan="2">User ID:</td>
                <td><input type="text" name="userId" class="textInput"></td>
            </tr>
            <tr>
                <td colspan="2">Password:</td>
                <td><input type="password" name="password" class="textInput"></td>
            </tr>
            <tr>
                <td colspan="2">Password again:</td>
                <td><input type="password" name="password2" class="textInput"></td>
            </tr>
			<tr>
                <td colspan="2">Email:</td>
                <td><input type="text" name="email" class="textInput"></td>
            </tr>
			<tr>
                <td colspan="2">PhoneNumber:</td>
                <td><input type="text" name="phone" class="textInput"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" name="register_btn" value="Register" style="padding:15px 25px;border:none;background-color: lightpink;color: black;margin-top: 40px;"></td>
            </tr>
        </table>
    </form>
</body>
</html>
