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
	$fnameErr = $lnameErr = $emailErr = $commentsErr =" ";
	$flag=1;

	if (isset($_POST['submit'])) {
	    if (empty($_POST['fn'])) {
  			$fnameErr = "* First Name is required";
  			$flag=0;
  		}
  		else {
  			$first_name = input_testing($_POST['fn']);
  		}

  		if (empty($_POST['lname'])) {
			$lnameErr = "* Last Name is required";
			$flag=0;
		}
		else {
			$last_name = input_testing($_POST['lname']);
		}
		
		if (empty($_POST["email"])) {
			$emailErr = "* Email ID is required";
			$flag=0;
		}
		else {
			$email = input_testing($_POST["email"]);
		}

		if (empty($_POST["comments"])) {
			$commentsErr = "* Comments are required";
			$flag=0;
		} 
		else {
			$B_name = input_testing($_POST["comments"]);
		}

		$phone = input_testing($_POST["phone"]);
  	}

  	function input_testing($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	if($flag==1) {
		$sql = "INSERT INTO pet.contactus (fname, lname, email, phone, comments) VALUES ( '$first_name', '$last_name', '$email', '$phone', '$B_name')";

 		mysqli_query($dbname, $sql);
	}
	
	// Close connection
	mysqli_close($dbname);


    // Escape user inputs for iis_get_dir_security(server_instance, virtual_path)
	/*if (isset($_POST['submit'])) {
		# code..
		$first_name = mysqli_real_escape_string($dbname, $_POST['fn']);
		$last_name = mysqli_real_escape_string($dbname, $_POST['lname']);
		$email = mysqli_real_escape_string($dbname, $_POST['email']);
		$phone = mysqli_real_escape_string($dbname, $_POST['phone']);
		$B_name =mysqli_real_escape_string($dbname, $_POST['comments']);

		$sql = "INSERT INTO pet.contactus (fname, lname, email, phone, comments) VALUES ( '$first_name', '$last_name', '$email', '$phone', '$B_name')";

		if(mysqli_query($dbname, $sql))
		{
		    echo "Records added successfully.";
		}
		else
		{
		    echo "ERROR: Could not able to execute $sql. " . mysqli_error($dbname);
		}

	}*/
	

?>

<!DOCTYPE html>
<html>

<head lang="en">
	<link rel="stylesheet" type="text/css" href="css\pet.css">
	<meta charset="utf-8">
	<title> Pet Store </title>

	<script>
	function validateForm() {
	    var firstname = document.forms["myform"]["fn"].value;
	    if (firstname == "") 
	    {
	        alert("First Name should not be empty");
	        return false;
	    }
	    
	    var lastname = document.forms["myform"]["lname"].value;
	    
	    if (lastname == "") 
	    {
	        alert("Last Name should not be empty");
	        return false;
	    }
	    
	    if (! /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(myform.email.value)) 
	    {
	        alert("Enter a invalid Email");
	        return false;
	    }
	   if (! /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/.test(myform.phone.value)) 
	   {
	     alert(" Enter a valid Phone Number");
	     return false;
	   }

	   var comments = document.forms["myform"]["comments"].value;
	    
	    if (comments == "") 
	    {
	        alert("Comments should not be empty");
	        return false;
	    }
	}
	</script>
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
			<img src="images\pet store banner 7 png.png">		
			<h2 style="padding-left: 2%"> Contact Us</h2>	
			<p style="padding-left: 2%; color: black;">
				Required information is marked with an asterisk(&#42;).
			</p>
			<form method="POST" action="Login.php" name="myform" onsubmit="return validateForm()">
				<table>
					<tr>
						<td>
							&#42; First Name:
						</td>
						<td >
							<input type="text" name="fn" />
							<span class="error">
								<?php $fnameErr?>
							</span>
						</td>
					</tr>
					<tr>
						<td>
							&#42; Last Name:
						</td>
						<td>
							<input type="text" name="lname" required placeholder="" />
						</td>
					</tr>
					<tr>
						<td>
							&#42; E-mail:
						</td>
						<td>
							<input type="email" name="email" required placeholder=""/>
						</td>
					</tr>
					<tr>
						<td>
							Phone:
						</td>
						<td>
							 <input type="tel" name="phone" />
						</td>
					</tr>
					<tr>
						<td>
							&#42; Comments:
						</td>
						<td>
							<textarea  rows="3" cols="16" name="comments" required placeholder=""></textarea>
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