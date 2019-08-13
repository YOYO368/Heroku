<!DOCTYPE html>
<html lang="en">
<head>
  <title>Final Exam Application</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/MainPageStyle.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <?php require('./database.php'); ?>
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container">
		  <div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span>
			  <span class="icon-bar"></span> 
			</button>
			<p class="navbar-brand">Final Exam Application</p>
			
		  </div>
		  <div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav navbar-right">
			  <li style="font-size:15px"><a href="#">Home</a></li>
              <li style="font-size:15px"><a href="./Register.php">Register</a></li>

				<?php
				if(!isset($_SESSION['User_ID']))
				{?>
						<li style="font-size:15px"><a href="./Login.php">Login</a></li>
				<?php }
				else { ?>
					 <li style="font-size:15px"><a href="./Logout.php">Logout</a></li>
				<?php
				} ?>
			</ul>
		  </div>
		</div>
	  </nav>
	  <div class="section">
			<img src="Images/MainImage.jpg" width="100%" height="400px" alt="Images" />
	 </div> 
	  <footer class="container-fluid bg-4 text-center" style="position:absolute;bottom:0;height: 50px;width:100%;padding:20px">
		<p>This is a final exam</p> 
	</footer>
</body>
</html>