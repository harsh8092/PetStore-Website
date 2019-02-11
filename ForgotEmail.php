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
	    	if (empty($_POST['email'])) {
	  			$fnameErr = "* Email is required";
	  			$flag=0;
	  		}
	  		else {
	  			$first_name = input_testing($_POST['email']);
	  			$flag=1;
	  		}

			if (empty($_POST["pass"]))//should not be empty
		 	{
	    		$emailErr = "* New Password is required";
	       		$flag=0;
	   		} 
	  		else
	  		{
	    		$email = input_testing($_POST["pass"]);
	    		$flag=1;
	  		}

			if (empty($_POST["pass1"])) {
				$commentsErr = "* Confirm new Password";
				$flag=0;
			} 
			else {
				$B_name = input_testing($_POST["pass1"]);
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
	    	$sql = "UPDATE user SET password = $B_name WHERE email='$first_name';";
 			mysqli_query($dbname, $sql);
		}
		
		// Close connection
		mysqli_close($dbname);
	?>
<div id="wrapper">
	<header>
		<h1> Oops I Forgot!!! </h1>
	</header>
	<div class="container">
		<nav >
			<a href="index.php">Home</a><br /> 
		</nav>
		<div class="col2">
			<img src="images\pet store banner 7 png.png">		
			<h2 style="padding-left: 2%"> Forgot Password</h2>	
			<form method="POST" action="" name="myform" onsubmit="return validateForm()">
				<table>
					<tr>
						<td>
							&#42; Enter registered email:
						</td>
						<td >
							<input type="email" name="email" /><br>
							<span class = "error"><?php echo $fnameErr;?></span>
						</td>
					</tr>
					<tr>
						<td>
							&#42; Enter Password:
						</td>
						<td >
							<input type="password" name="pass" /><br>
							<span class = "error"><?php echo $emailErr;?></span>
						</td>
					</tr>
					<tr>
						<td>
							&#42; Confirm Password:
						</td>
						<td>
							<input type="password" name="pass1" /><br>
							<span class = "error"><?php echo $commentsErr;?></span>
						</td>
					</tr>
					<tr>
						<td>
							<button class="button" name= "submit2" >Submit</button>
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