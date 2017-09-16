<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'gaurav');
define('DB_USER','root');
define('DB_PASSWORD','');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());


function NewUser()
{
	$fullname = $_POST['rentername'];
	$email = $_POST['renteremail'];
	$rollnumber = $_POST['renterrollno'];
	$password =  $_POST['renterpassword'];
	$phone =  $_POST['renterphone'];
	$address =  $_POST['renteraddress'];
	$query = "INSERT INTO renter (fullname,email,rollnumber,pass,phonenumber,address) VALUES ('$fullname','$email','$rollnumber','$password','$phone','$address')";
	$data = mysql_query ($query);
	if($data)
	{
	 $message = "Username and/or Password generated.\\n LOGIN TO RENT .";
          echo "<script type='text/javascript'>window.alert('$message');
						window.location.href='renter_login.html';

				</script>";
	}
}

function SignUp()
{
if(!empty($_POST['renterrollno']))   //checking the 'rollnumber' name which is from renter_login.html, is it empty or have some text
{
   $query = mysql_query("SELECT * FROM renter WHERE rollnumber = '$_POST[renterrollno]' AND pass = '$_POST[renterpassword]'");
	if(!mysql_fetch_array($query))
	{
		NewUser();
	}
	else
	{
		$message = "Sorry you are already Registered.\\n LOGIN TO RENT .";
          echo "<script type='text/javascript'>window.alert('$message');
						window.location.href='renter_login.html';

				</script>";
	}
}
}
if(isset($_POST['register-submit']))
{
	SignUp();
}
?>