<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'gaurav');
define('DB_USER','root');
define('DB_PASSWORD','');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());
    
function SignIn()
{
session_start();   //starting the session for user profile page
if($_POST['rollnumber']== 'admin' && $_POST['password']== 'pass')
{
	$_SESSION['IS_AUTHENTICATED'] = 2;
	header('location:admin.php');
}
 if(!empty($_POST['rollnumber']))   //checking the 'user' name which is from Sign-In.html, is it empty or have some text
{
	$query = mysql_query("SELECT *  FROM owner where ownerrollnumber = '$_POST[rollnumber]' AND ownerpassword = '$_POST[password]'");
	$query1 = mysql_query("SELECT *  FROM cycle where ownerid = '$_POST[rollnumber]'");
	$row = mysql_fetch_array($query);
	$_SESSION['ownerimage']=$row['ownerpic'];
	$_SESSION['ownerrollnumber']=$row['ownerrollnumber'];
	$_SESSION['ownername']=$row['ownername'];
	$_SESSION['owneraddress']=$row['owneraddress'];
	$_SESSION['email']=$row['owneremail'];
	$_SESSION['ownerphonenumber']=$row['ownerphonenumber'];
	$_SESSION['wallet']=$row['ownerwallet'];
	$row1=mysql_fetch_array($query1);
	$_SESSION['bicycleimage']=$row1['bicyclepic'];
	$_SESSION['ownerid']=$row1['ownerid'];
	$_SESSION['model']=$row1['model'];
	$_SESSION['description']=$row1['description'];
	$_SESSION['manufacturer']=$row1['manufacturer'];
	if(!empty($row['ownerrollnumber']) AND !empty($row['ownerpassword']))
	{
		$_SESSION['ownerrollnumber'] = $row['ownerrollnumber'];
		$_SESSION['available']=$row1['available'];
		if($_SESSION['available']==1){
echo "<html>\n"; 
echo "<head>\n"; 
echo "    <meta charset=\"utf-8\">\n"; 
echo "    <meta name=\"keywords\" content=\"\">\n"; 
echo "    <meta name=\"description\" content=\"\">\n"; 
echo "    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, user-scalable=0\">\n"; 
echo "    <link rel=\"shortcut icon\" type=\"image/png\" href=\"favicon.png\">\n"; 
echo "    \n"; 
echo "	<link rel=\"stylesheet\" type=\"text/css\" href=\"./css/bootstrap.min.css\">\n"; 
echo "	<link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\">\n"; 
echo "	<link rel=\"stylesheet\" href=\"./css/animate.min.css\"><link rel=\"stylesheet\" href=\"./css/font-awesome.min.css\"><link rel=\"stylesheet\" href=\"./css/linecons.min.css\"><link rel=\"stylesheet\" href=\"./css/ionicons.min.css\"><link href='https://fonts.googleapis.com/css?family=Josefin+Sans&subset=latin,latin-ext' rel='stylesheet' type='text/css'>\n"; 
echo "    \n"; 
echo "	<script src=\"./js/jquery-2.1.0.min.js\"></script>\n"; 
echo "	<script src=\"./js/bootstrap.min.js\"></script>\n"; 
echo "	<script src=\"./js/blocs.min.js\"></script>\n"; 
echo "    <title>Owner Home</title>\n"; 
echo "\n"; 
echo "    \n"; 
echo "<!-- Google Analytics -->\n"; 
echo " \n"; 
echo "<!-- Google Analytics END -->\n"; 
echo "    \n"; 
echo "</head>\n"; 
echo "<body>\n"; 
echo "<!-- Main container -->\n"; 
echo "<div class=\"page-container\">\n"; 
echo "    \n"; 
echo "<!-- bloc-18 -->\n"; 
echo "<div class=\"bloc bgc-pale-blue l-bloc\" id=\"bloc-18\">\n"; 
echo "	<div class=\"container bloc-sm\">\n"; 
echo "		<nav class=\"navbar row\">\n"; 
echo "			<div class=\"navbar-header\">\n"; 
echo "				<a class=\"navbar-brand\" href=\"index.html\"><img src=\"img/logo.png\" alt=\"logo\" /></a>\n"; 
echo "				<button id=\"nav-toggle\" type=\"button\" class=\"ui-navbar-toggle navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-1\">\n"; 
echo "					<span class=\"sr-only\">Toggle navigation</span><span class=\"icon-bar\"></span><span class=\"icon-bar\"></span><span class=\"icon-bar\"></span>\n"; 
echo "				</button>\n"; 
echo "			</div>\n"; 
echo "			<div class=\"collapse navbar-collapse navbar-1\">\n"; 
echo "				<ul class=\"site-navigation nav navbar-nav\">\n"; 
echo "					<li>\n"; 
echo "						<a href=\"index.html\">Home</a>\n"; 
echo "					</li>\n"; 
echo "					<li>\n"; 
echo "						<a href=\"the_team.html\">The Team</a>\n"; 
echo "					</li>\n"; 
echo "					<li>\n"; 
echo "						<a href=\"logout.php\">Logout</a>\n"; 
echo "					</li>\n"; 
echo "				</ul>\n"; 
echo "			</div>\n"; 
echo "		</nav>\n"; 
echo "	</div>\n"; 
echo "</div>\n"; 
echo "<!-- bloc-18 END -->\n"; 
echo "\n"; 
echo "<!-- bloc-19 -->\n"; 
echo "<div class=\"bloc bgc-white l-bloc \" id=\"bloc-19\">\n"; 
echo "	<div class=\"container bloc-lg\">\n"; 
echo "		<div class=\"row\">\n"; 
echo "			<div class=\"col-sm-6\">\n"; 
echo "				<h1 class=\"mg-md\">\n"; 
echo 				 $_SESSION['ownername']; 
echo "				</h1>\n"; 
echo "				<h3 class=\"mg-md\">\n";
echo" 				Wallet Balance:Rs ";
echo				$_SESSION['wallet'];
echo"                </h3>\n";
echo "				<h6 class=\"mg-md\">\n"; 
echo "					<br>\n"; 
echo "				</h6>\n"; 
echo "				<div class=\"row\">\n"; 
echo "					<div class=\"col-sm-4\">\n"; 
echo "						<img src='upload/".$_SESSION['ownerimage']."'    class=\'img-responsive img-rd-md\'  height=\"170\" width=\"170\"/>"; 
echo "					</div>\n"; 
echo "					<div class=\"col-sm-8\">\n"; 
echo "						<h3 class=\"mg-md\">\n"; 
echo "							Roll No\n"; 
echo "						</h3>\n"; 
echo "						<h4 class=\"mg-md\">\n"; 
echo     					$_SESSION['ownerrollnumber']; 
echo "						</h4>\n"; 
echo "						<div class=\"divider-h\">\n"; 
echo "							<span class=\"divider\"></span>\n"; 
echo "						</div>\n"; 
echo "						<h3 class=\"mg-md\" >\n"; 
echo "							Email\n"; 
echo "						</h3>\n"; 
echo "						<h4 class=\"mg-md\">\n"; 
echo 						$_SESSION['email']; 
echo "						</h4>\n"; 
echo "						<div class=\"divider-h\">\n"; 
echo "							<span class=\"divider\"></span>\n"; 
echo "						</div>\n"; 
echo "						<h3 class=\"mg-md\">\n"; 
echo "							Phone\n"; 
echo "						</h3>\n"; 
echo "						<h4 class=\"mg-md\">\n"; 
echo 						$_SESSION['ownerphonenumber']; 
echo "						</h4>\n"; 
echo "						<div class=\"divider-h\">\n"; 
echo "							<span class=\"divider\"></span>\n"; 
echo "						</div>\n"; 
echo "						<h3 class=\"mg-md\">\n"; 
echo "							Address\n"; 
echo "						</h3>\n"; 
echo "						<h4 class=\"mg-md\">\n"; 
echo 						$_SESSION['owneraddress']; 
echo "						</h4>\n"; 
echo "						<div class=\"divider-h\">\n"; 
echo "							<span class=\"divider\"></span>\n"; 
echo "						</div>\n"; 
echo "					</div>\n"; 
echo "				</div>\n"; 
echo "			</div>\n"; 
echo "			<div class=\"col-sm-6\">\n"; 
echo "				<h2 class=\"mg-lg\">\n"; 
echo "					<br>\n"; 
echo "				</h2>\n"; 
echo "				<h6 class=\"mg-md\">\n"; 
echo "					<br>\n"; 
echo "				</h6><img src='upload/".$_SESSION['bicycleimage']."' class=\"animated vanishIn img-rd-md img-responsive\" height=\"323\" width=\"485\" />\n"; 
echo "						<h3 class=\"mg-md\">\n"; 
echo "							Manufacturer:\n"; 
echo "						</h3>\n"; 
echo "				<h2 class=\"mg-lg\">\n"; 
echo 					$_SESSION['manufacturer']; 
echo "				</h2>\n"; 
echo "						<h4 class=\"mg-md\">\n"; 
echo "							Model:\n"; 
echo "						</h4>\n"; 
echo "				<h3 class=\"mg-sm\">\n"; 
echo 					$_SESSION['model']; 
echo "				</h3>\n"; 
echo "						<h3 class=\"mg-md\">\n"; 
echo "							Description:\n"; 
echo "						</h3>\n"; 
echo "				<p class=\"mg-lg\">\n"; 
echo 					$_SESSION['description']; 
echo "				</p>\n"; 
echo "				<div class=\"divider-h\">\n"; 
echo "					<span class=\"divider\"></span>\n"; 
echo "				</div><a href=\"update_availability.php\" class=\"btn btn-lg btn-seashell\">Unavailable</a><a href=\"repair_request.php\" class=\"btn btn-lg btn-alice-blue\">Request Repair</a>\n"; 
echo "				<h6 class=\"mg-md\">\n"; 
echo "					*Click when unavailable\n"; 
echo "				</h6>\n"; 
echo "			</div>\n"; 
echo "		</div>\n"; 
echo "	</div>\n"; 
echo "</div>\n"; 
echo "<!-- bloc-19 END -->\n"; 
echo "\n"; 
echo "<!-- ScrollToTop Button -->\n"; 
echo "<a class=\"bloc-button btn btn-d scrollToTop\" onclick=\"scrollToTarget('1')\"><span class=\"fa fa-chevron-up\"></span></a>\n"; 
echo "<!-- ScrollToTop Button END-->\n"; 
echo "\n"; 
echo "\n"; 
echo "<!-- Footer - bloc-22 -->\n"; 
echo "<div class=\"bloc bgc-black d-bloc\" id=\"bloc-22\">\n"; 
echo "	<div class=\"container bloc-lg\">\n"; 
echo "		<div class=\"row\">\n"; 
echo "			<div class=\"col-sm-3\">\n"; 
echo "				<h3 class=\"mg-md bloc-mob-center-text\">\n"; 
echo "					About\n"; 
echo "				</h3><a href=\"the_team.html\" class=\"a-btn a-block bloc-mob-center-text\">The Team</a><a href=\"contact_us.html\" class=\"a-btn a-block bloc-mob-center-text\">Contact us</a>\n"; 
echo "			</div>\n"; 
echo "			<div class=\"col-sm-3\">\n"; 
echo "				<h3 class=\"mg-md bloc-mob-center-text\">\n"; 
echo "					Book a Ride\n"; 
echo "				</h3><a href=\"renter_login.html\" class=\"a-btn a-block bloc-mob-center-text\">Login</a><a href=\"renter_login.html\" class=\"a-btn a-block bloc-mob-center-text\">Sign Up</a>\n"; 
echo "			</div>\n"; 
echo "			<div class=\"col-sm-3\">\n"; 
echo "				<h3 class=\"mg-md bloc-mob-center-text\">\n"; 
echo "					Follow Us\n"; 
echo "				</h3><a href=\"index.html\" class=\"a-btn a-block bloc-mob-center-text\">Twitter</a><a href=\"index.html\" class=\"a-btn a-block bloc-mob-center-text\">Facebook</a>\n"; 
echo "			</div>\n"; 
echo "			<div class=\"col-sm-3\">\n"; 
echo "				<h3 class=\"mg-md bloc-mob-center-text\">\n"; 
echo "					Company\n"; 
echo "				</h3><a href=\"termspolicy.html\" class=\"a-btn a-block bloc-mob-center-text\">Terms of use</a><a href=\"termspolicy.html\" class=\"a-btn a-block bloc-mob-center-text\">Privacy</a>\n"; 
echo "			</div>\n"; 
echo "		</div>\n"; 
echo "	</div>\n"; 
echo "</div>\n"; 
echo "<!-- Footer - bloc-22 END -->\n"; 
echo "\n"; 
echo "</div>\n"; 
echo "<!-- Main container END -->\n"; 
echo "    \n"; 
echo "\n"; 
echo "</body>\n"; 
echo "</html>\n"; 
echo "\n";
		}
		else{
			header('Location:login_check_owner2.php');
		}

	}
	else
	{
		$message = "Username and/or Password wrong.\\n\\n\\n LOGIN WITH CORRECT ID AND PASSWORD .";
          echo "<script type='text/javascript'>window.alert('$message');
						window.location.href='owner_login.html';

				</script>";

	}
}
}
if(isset($_POST['submit']))
{
	SignIn();
}

?>

