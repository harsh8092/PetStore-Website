<!DOCTYPE html>
<html>

<head lang="en">
	<link rel="stylesheet" type="text/css" href="css\pet.css">
	<meta charset="utf-8">
	<title> Pet Store </title>
	<style>
         .error {
         	color: #FF0000;
         	font-size: 10px;
         }
    </style>
</head>

<body>
	<?php
	    $servername = "localhost";  
	    $username = "root";  
	    $password = "";  
	    $dbname = "pet";
	    
	    $dbname = new mysqli($servername , $username , $password, $dbname) or die('not connected to server');
		
	    $first_name = "";
	    $last_name = $email = "";
	    $phone = "";
	    $B_name = "";
	    $fnameErr=$lnameErr=$emailErr=$commentsErr=$phoneErr="";    $flag=2;

	    if ($_SERVER["REQUEST_METHOD"] == "POST") {
	    	if (empty($_POST['email'])) {
	  			$fnameErr = "* First Name is required";
	  			$flag=0;
	  		}
	  		else {
	  			$first_name = input_testing($_POST['email']);
	  			$flag=1;
	  		}

	  		if (empty($_POST['password'])) {
				$lnameErr = "* Last Name is required";
				$flag=0;
			}
			else {
				$last_name = input_testing($_POST['password']);
				$flag=1;
			}
		}

	  	function input_testing($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}

	    if($flag==1) {
	    	$sql_user_search = "SELECT roleid from pet.user where email = '$first_name' and password = '$last_name'";
		$result = mysqli_query($dbname, $sql_user_search);
		while ($row = $result->fetch_assoc()) {
    		$result1 = $row['roleid'];
		}
 		if($result1 == 1)
 			header('Location: BusinessPetStore.php');
 		else if($result1 == 2)
 			header('Location: ClientPetStore.php');
		}
		
		// Close connection
		mysqli_close($dbname);
	?>
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
			<h2 style="padding-left: 2%"> 
				Login
			</h2>	
			<p style="padding-left: 2%; color: black;">
				Required information is marked with an asterisk(&#42;).
			</p>
			<form action="#" method="post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
				<table>
					<tr>
						<td>
							&#42; E-mail:
						</td>
						<td >
							<input type="email" name="email" /><br>
							<span class = "error"><?php echo $fnameErr;?></span>
						</td>
					</tr>
					<tr>
						<td>
							&#42; Password:
						</td>
						<td>
							<input type="password" name="password" /><br>
							<span class = "error"><?php echo $lnameErr;?></span>
						</td>
					</tr>
					<tr>
						<td>
							<a href="ForgotEmail.php">Forgot Password</a>	
						</td>
					</tr>
					<tr>
						<td>
							<button class="button" name= "submit" >Submit</button>	
						</td>
					</tr>
				</table>
			</form>
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