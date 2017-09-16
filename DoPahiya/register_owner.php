<?php
session_start();
ob_start();
define('DB_HOST', 'localhost');
define('DB_NAME', 'gaurav');
define('DB_USER','root');
define('DB_PASSWORD','');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());


function NewUser()
{
	$fullname = $_POST['ownername'];
	$email = $_POST['owneremail'];
	$rollnumber = $_POST['ownerrollno'];
	$password =  $_POST['ownerpassword'];
	$phone =  $_POST['ownerphoneno'];
	$address =  $_POST['owneraddress'];
	$pic=$_FILES['image']['name'];
	if (!empty($_FILES['image']['name'])){
    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
		   $image=basename( $_FILES["image"]["name"],".jpg"); // used to store the filename in a variable
    //storind the data in your database
    $query1= "UPDATE owner set ownerpic = '".$image."'
	where ownerrollnumber=".$rollnumber;
    $data1=mysql_query($query1);
	
	$query = "INSERT INTO owner (ownername,owneremail,ownerrollnumber,ownerpassword,ownerphonenumber,owneraddress,ownerpic) VALUES ('$fullname','$email','$rollnumber','$password','$phone','$address','$pic')";
	$_SESSION['ownerid']=$rollnumber;
	$data = mysql_query ($query );
	if($data and $data1)
	{
	header('Location:register_extended.php');	
	}
}}}

function SignUp()
{
if(!empty($_POST['ownerrollno']))   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
{
	$query = mysql_query("SELECT * FROM owner WHERE ownerrollnumber = '$_POST[ownerrollno]' AND ownerpassword = '$_POST[ownerpassword]'");
	
	if(!mysql_fetch_array($query))
	{
		NewUser();
	}
	else
	{
		$message = "Sorry you are already registered \\n LOGIN TO UPDATE DETAILS .";
          echo "<script type='text/javascript'>window.alert('$message');
						window.location.href='owner_login.html';

				</script>";
	}
}
}
if(isset($_POST['submit']))
{
	SignUp();
}
ob_flush();
?>

