<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'gaurav');
define('DB_USER','root');
define('DB_PASSWORD','');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
session_start();
if($_SESSION['available']==true)
{
	mysql_query("UPDATE cycle SET available='0' WHERE ownerid=".$_SESSION['ownerrollnumber']);
	header('Location:login_check_owner2.php');
}
else
{
mysql_query("UPDATE cycle SET available='1' WHERE ownerid=".$_SESSION['ownerrollnumber']);
	header('Location:login_check_owner2.php');	
}
	
?>