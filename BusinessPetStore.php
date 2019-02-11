<!DOCTYPE html>
<html>

<head lang="en">
	<link rel="stylesheet" type="text/css" href="css\pet.css">
	<meta charset="utf-8">
	<title> Pet Store</title>
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
	    	if (empty($_POST['service'])) {
	  			$fnameErr = "* Service is required";
	  			$flag=0;
	  		}
	  		else {
	  			$first_name = input_testing($_POST['service']);
	  			$flag=1;
	  		}

			$phone = input_testing($_POST["B_name"]);
	  	}

	  	function input_testing($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}

	    if($flag==1) {
	    	$lnameErr = "* Added to dummy database";
		}
		
		mysqli_close($dbname);
	?>
<div id="wrapper">
	<header>
		<h1> Business's Pet Store  </h1>
	</header>
	<div class="container">
		<nav >
			<a href="ChangePassword.php">Change Password</a><br />
			<a href="index.php">Logout</a><br /> 
		</nav>
		<div class="col2">
			<img src="images\pet store banner 5 png (1).png">		
			<h2 style="padding-left: 2%"> My Business</h2>	
			<p style="padding-left: 2%; color: black;">
				Required information is marked with an asterisk(&#42;).
			</p>
			<form action="#" method="post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
				<table>
					<tr>
						<td>
							<span class = "error"><?php echo $lnameErr;?></span>
						</td>
					</tr>
					<tr>
						<td>
							Business Name:
						</td>
						<td >
							<input type="text" name="B_name" />
						</td>
					</tr>
					<tr>
						<td>
							&#42; Service:
						</td>
						<td>
							<input type="text" name="service" /><br>
							<span class = "error"><?php echo $fnameErr;?></span>
						</td>
					</tr>
					<tr>
						<td>
							<button class="button" name= "Add New One" >Add New One</button>
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