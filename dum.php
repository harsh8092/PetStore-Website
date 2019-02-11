<?php
$servername ="localhost";
$username ="root";
$password ="";
$dbname="pet";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 //   echo "Connected successfully"; 
    }
  //catch exception if connection fails
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>

<?php
//turn on error reporting
//ini_set('error_reporting',E_ALL);
//ini_set('display_errors','1');
$fnameErr=$lnameErr=$emailErr=$phoneErr="";
$clientid==$dbemail=$dbuserid="";
$fname=$userid=$lname=$email=$phone="";
$flag=1;

$status=false;
//check validations
if (isset($_POST['submit']))
{
  $status=true;
   if(empty($_POST["fname"]))//name should not be empty
	{
		$nameErr="First Name should not be empty";
         $flag=0;
	}
	else
	{
    $name = test_input($_POST["fname"]);
    }
	if(empty($_POST["lname"]))//name should not be empty
	{
		$nameErr="Last Name should not be empty";
        $flag=0;
	}
	else
	{
    $name = test_input($_POST["lname"]);
    }
    $email = test_input($_POST["email"]);
 	if (empty($_POST["email"]))//should not be empty
	 {
    	$emailErr = "Email should not be empty";
        $flag=0;
     } 
    elseif(!preg_match("/(.+)@([^\.].*)\.([a-z]{2,})/",$email))
     {
   	// check if e-mail address is well-formed
     	$emailErr = "Invalid email format"; 
       $flag=0;
     }
    else
     {
    $email = test_input($_POST["email"]);
     }
  
 	$phone = test_input($_POST["phone"]);
    $businessname = test_input($_POST["businessname"]);

   if(($flag==1))
   {
      //echo "processing form";
    //check if the entered email id alredy present
        $sql="SELECT email from client where email='$email'";
        $result=$conn->query($sql);
       while($row=$result->fetch())
       {
        $dbemail=$row['email'];
       }
          if(strcmp($dbemail,$email)==0)
         {
          $clientidquery="SELECT clientid from Client where email='$email'";
          $clientid=$conn->query($clientidquery);
          echo "client already exists.";
         }
      else
      //if client id not present insert new row in client table.
      {
        function randomPassword() 
        {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) 
        {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
        }
        $userpassword="";
        $userpassword=randomPassword();
        
        $clientquery="INSERT INTO User (email, password, roleid) VALUES ('$email',$userpassword,2)";
            $conn->query($clientquery);  
            
                        $to = "$email";
                        $subject = "Password Verification";
                        $txt = "Dear user, your credentials as as follows : \n Email :$email \n Password:".$userpassword;
                        $headers = "From: Harsh@Sharma.com" . "\r\n" ;
                        mail($to,$subject,$txt,$headers); 
            //get clientid
            $useridquery="SELECT userid from User where email='$email'";
            $userid=$conn->query($useridquery);
            while($row=$userid->fetch())
            {
              $dbuserid=$row['userid'];
            }
            
            $clientquery="INSERT INTO Client (fname, lname, phone, email, userid) VALUES ('$fname','$lname','$phone','$email','$dbuserid')";
            #$conn->query($clientquery);
            
               if(mysqli_query($link,$clientquery))
                           {   
                               //echo "Records added";
                              header("loginclient.php?signup=success");
                           }
                            else
                            {
                                echo "Error : Add Error";
                           }
              
        }
                
 }

/*else
{
  echo "<script type='text/javascript'>alert('Please provide required information.');</script>";
  //echo "Please provide required information";
}*/
}

function test_input($data)
{
	$data=trim($data);
	$data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta charset="utf-8">
<title> Client </title>

<link rel="stylesheet"   href="css/pet.css" />
<meta http-equiv="Cache-control" content="no-cache">
<meta name="petstore content="width="divice-width"/>

<script>

function validateForm() {

    var firstname = document.forms["myform"]["firstname"].value;
    if (firstname == "") {
        alert("First Name should not be empty");
        return false;
    }
    
    var lastname = document.forms["myform"]["lastname"].value;
    if (lastname == "") {
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
   
}

</script>

</head>
<body >

<div id="wrapper">
<header>
		<div id="head1">
		<h1>Pet Store</h1>
		</div>
		<div>
      </header>	
	 <div class="layout">
	            <div class="column1">
     		<nav>
				         	<a href="index.html" ><b>Home</b></a> 
							<br>
							<a href="aboutus.html">About Us</a> 
							<br>
								<a href="contactus.php">Contact Us</a> 
							<br>
							 <a href="client.php">Client</a>
							<br>
							 <a href="service.php">Service </a> 
							<br>
							 <a href="login.php">Login</a> 						 
		 </nav>
              </div>	

<div class="column2">
		<img src="images/pet store banner 5 png (1).png" alt="pet store banner" > 
  		<article>
				<h2> Client </h2>
				<p>Required information is marked with an asterik(*)</p>
			<div class="container">
	  
<form method='post' name='myform' action='login.php'  onsubmit="return validateForm()"> 

		<div class="row">
		  <div class="col-25">
			<label for="fname">*First Name:</label>
		  </div>
		  <div class="col-75">
			<input type="text" id="fname" name="firstname" >  
		  </div>
		  <div class="row">
		  <div class="col-25">
			<label for="lname">*Last Name:</label>
		  </div>
		  <div class="col-75">
			<input type="text" id="lname" name="lastname">
			 <span clss="error"
			 <?php $lnameErr ?> 
			 </span>
		  </div>
		 <div class="row">
		  <div class="col-25">
			<label for="email">*Email:</label>
		  </div>
		  <div class="col-75">
			<input type="text" id="email" name="email" required placeholder="Enter a valid email address"><br>
		  </div>
		</div>
		<div class="row">
		  <div class="col-25">
			<label for="email">Phone:</label>
		  </div>
		  <div class="col-75">
			<input type="text" id="phone" name="phone"><br>
		  </div>
		</div>
		<div class="row">
		  <input type="submit" value="Add New One"></input>
		</div>
	  </form>
	 </div>
	   </article>			
		<footer>
		Copyright &copy 2018 Pet Store
		<br>
		<a href="mailto:Harsh@Sharma.com">Harsh@Sharma.com</a>
	</footer>
	 </div>
	</div>
	</div>
</html>
