<?php
    $servername = "localhost";  
    $username = "root";  
    $password = "";  
    $dbname = "pet";
    
    $dbname = new mysqli($servername , $username , $password, $dbname) or die('not connected to server');
	
	$email1 = "";
	$email11 = "";
	$lnameErr = "";
	$lnameErr1 = "";$lnameErr11 = "";
	$flag=1;

	if (isset($_POST['pass'])) {
	    if (empty($_POST['pass'])) {
			$lnameErr = "* Password is required";
			$flag=0;
		}
		else {
			$email1 = input_testing($_POST['pass']);
		}

		if (empty($_POST['pass1'])) {
			$lnameErr1 = "* Confirm Password";
			$flag=0;
		}
		else {
			$email11 = input_testing($_POST['pass1']);
		}

		if (($_POST['pass1']) != ($_POST['pass'])) {
			$lnameErr11 = "* Password not match";
			$flag=0;
		}
	}

  	function input_testing($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	if($flag==1) {
		#$sql = "INSERT INTO pet.user (bname, service) VALUES ( '$B_name', '$service')";
 		#mysqli_query($dbname, $sql);
	}
	
	// Close connection
	mysqli_close($dbname);
?>

<!DOCTYPE html>
<html>

<head lang="en">
	<link rel="stylesheet" type="text/css" href="css\pet.css">
	<meta charset="utf-8">
	<title> Pet Store</title>

	<script>
	function validateForm() {
	    var lastname = document.forms["myform"]["pass"].value;
	    
	    if (lastname == "") 
	    {
	        alert("Password is required");
	        return false;
	    }

	    var lastname1 = document.forms["myform"]["pass1"].value;
	    
	    if (lastname == "") 
	    {
	        alert("Confirm Password");
	        return false;
	    }

	    if (lastname != lastname1) 
	    {
	        alert("Password not match");
	        return false;
	    }
	}	    
	</script>
</head>

<body>
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
			<h2 style="padding-left: 2%"> Forgot Passwird</h2>	
			<form method="POST" action="Login.php" name="myform" onsubmit="return validateForm()">
				<table>
					<tr>
						<td>
							Enter Password:
						</td>
						<td >
							<input type="password" name="pass" required placeholder=""/>
						</td>
					</tr>
					<tr>
						<td>
							Confirm Password:
						</td>
						<td>
							<input type="password" name="pass1" required placeholder="" />
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