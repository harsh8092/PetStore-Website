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
			<img src="images\pet store banner 5 png (1).png">
			<div class="content">
			
				<h2> Enjoy your Pets in our Island </h2>

				<p>
					Pet Store offers a special experience on dealing with your pet's needs on the Island. Relax in serenity with our experts taking care of all your pet's need.
				</p>

				<ul>
					<li> Grooming </li>
					<li> Vaccines</li>
					<li> Implants</li>
					<li> Dental Cleaning</li>
					<li> Travel Documents</li>
				</ul>

				<p>
					Pet Store<br>
					1999 All Pets Road<br>
					Round Rock, TX 95555<br><br>
					888-555-5555<br><br>
				</p>
			</div>

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
</body>
</html>