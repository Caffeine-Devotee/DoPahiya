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
	
	$manufacturer = $_POST['manufacturer'];
	$ownerid = $_SESSION['ownerid'];
	$model = $_POST['model'];
	$description =  $_POST['description'];
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
    $query1= "UPDATE cycle set bicyclepic = '".$image."'
	where ownerid=".$ownerid;
    $data1=mysql_query($query1);
	$query = "INSERT INTO cycle (manufacturer,ownerid,model,description,bicyclepic) VALUES ('$manufacturer','$ownerid','$model','$description','$pic')";
	$data = mysql_query ($query);
	if($data and $data1)
	{
	$message = "Account Created.\\n\\n\\n LOGIN WITH ROLLNUMBER AND PASSWORD .";
          echo "<script type='text/javascript'>window.alert('$message');
						window.location.href='owner_login.html';

				</script>";	
	}
}}}

function SignUp()
{ 
if(!empty($_SESSION['ownerid']))   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
{echo "h";
    $r=$_SESSION['ownerid'];
	$query = mysql_query("SELECT * FROM cycle WHERE ownerid = $r");
	
	if(!mysql_fetch_array($query))
	{
		NewUser();
	}
	else
	{
		$message = "Sorry you have to insert the cycle pic \\n LOGIN TO UPDATE DETAILS .";
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
?>