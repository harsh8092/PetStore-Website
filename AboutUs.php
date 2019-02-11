<?php    
	$servername = "localhost";  
    $username = "root";  
    $password = "";  
    $conn = mysqli_connect ($servername , $username , $password) or die("Unable to connect to host");  
    $sql = mysqli_select_db ($conn,'pet') or die("Unable to connect to database");  
?>

<!DOCTYPE html>
<html>

<head lang="en">
	<link rel="stylesheet" type="text/css" href="css\pet.css">
	<meta charset="utf-8">
	<title> Pet Store </title>
</head>

<body>
<div id="wrapper">
	<header>
		<h1> Pet Store </h1>
	</header>
	<div class="container">

		<nav >
			<a href="index.php">Home</a><br />
			<a href="AboutUs.php">About Us</a><br /> 
			<a href="ContactUs.php">Contact Us</a> <br />
			<a href="Client.php">Client</a> <br />
			<a href="Service.php">Service</a> <br />
			<a href="Login.php">Login</a> <br />
		</nav>
		<div class="col2">
			<img src="images\pet store banner 6 png.png">		
			<div class="content">
				<h2> About Us</h2>	
				
				<p>
							We specialize in offering site services to Pet'Store. We offer a one stop service for client and businesses. Pet Store offers a special experience on dealing with your pet's need on the Island. Relax in serenity with our experts taking care of all your pet's need. 
				</p>
				
				<p>
							Pet Store<br>
							1999 All Pets Road<br>
							Round Rock, TX 95555<br><br>
							888-555-5555<br><br>
				</p>	
				
				<footer>
					<i> 
						<font size="2"> 
							Copyright &copy; 2018 Pet Store <br>
							<a href="mailto:Harsh@Sharma.com">Harsh@Sharma.com</a>
						</font>
					</i>
				</footer>			
			</div>	
		</div>
	</div>
</div>
</body>
</html>