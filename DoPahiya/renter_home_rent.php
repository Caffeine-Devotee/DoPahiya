<?php
	//Start the session to see if the user is authencticated user.
    session_start();
    //Check if the user is authenticated first. Or else redirect to login page

    if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){
        //Connect to mysql server
        define("DB_SERVER","localhost");
        define("DB_USER","root");
        define("DB_PASSWORD","");
        define("DB_DATABASE","gaurav");
        $link = mysql_connect('localhost', 'root', '', 'gaurav');
        /*Check link to the mysql server*/
        if(!$link){
            die('Failed to connect to server: ' . mysql_error());
        }
        /*Select database*/
        $db = mysql_select_db('gaurav',$link);
        if(!$db){
            die("Unable to select database");
        }
		else{
            $renterroll=$_SESSION['rollnumber'];
            $query="SELECT * FROM rent WHERE renter_id = $renterroll AND transaction_id = (SELECT max(transaction_id) FROM rent WHERE renter_id = $renterroll)";
            $result=mysql_query($query);
            $row=mysql_fetch_array($result);
            $ownerid=$row['owner_id'];
            $_SESSION['ownerid']=$ownerid;
            
            $query1="SELECT * FROM owner WHERE ownerrollnumber = $ownerid";
            $result1=mysql_query($query1);
            $row1=mysql_fetch_array($result1);
                        
            $query2="SELECT * FROM renter WHERE rollnumber = $renterroll";
            $result2=mysql_query($query2);
            $row2=mysql_fetch_array($result2);

            
            $query3="SELECT * FROM cycle WHERE ownerid = $ownerid";
            $result3=mysql_query($query3);
            $row3=mysql_fetch_array($result3);
            $_SESSION['bicyclepic'] = $row3['bicyclepic'];
            
            
            
echo "<!doctype html>\n"; 
echo "<html>\n"; 
echo "   <head>\n"; 
echo "      <meta charset=\"utf-8\">\n"; 
echo "      <meta name=\"keywords\" content=\"\">\n"; 
echo "      <meta name=\"description\" content=\"\">\n"; 
echo "      <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, user-scalable=0\">\n"; 
echo "      <link rel=\"shortcut icon\" type=\"image/png\" href=\"favicon.png\">\n"; 
echo "      <link rel=\"stylesheet\" type=\"text/css\" href=\"./css/bootstrap.min.css\">\n"; 
echo "      <link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\">\n"; 
echo "      <link rel=\"stylesheet\" href=\"./css/animate.min.css\">\n"; 
echo "      <link rel=\"stylesheet\" href=\"./css/font-awesome.min.css\">\n"; 
echo "      <link rel=\"stylesheet\" href=\"./css/linecons.min.css\">\n"; 
echo "      <link rel=\"stylesheet\" href=\"./css/ionicons.min.css\">\n"; 
echo "      <link href='https://fonts.googleapis.com/css?family=Josefin+Sans&subset=latin,latin-ext' rel='stylesheet' type='text/css'>\n"; 
echo "      <script src=\"./js/jquery-2.1.0.min.js\"></script><script src=\"./js/bootstrap.min.js\"></script><script src=\"./js/blocs.min.js\"></script> \n"; 
echo "      <title>Renter_Home_Rent</title>\n"; 
echo "      <!-- Google Analytics --> <!-- Google Analytics END --> \n"; 
echo "   </head>\n"; 
echo "   <body>\n"; 
echo "      <!-- Main container -->\n"; 
echo "      <div class=\"page-container\">\n"; 
echo "         <!-- bloc-26 -->\n"; 
echo "         <div class=\"bloc bgc-pale-blue l-bloc\" id=\"bloc-26\">\n"; 
echo "            <div class=\"container bloc-sm\">\n"; 
echo "               <nav class=\"navbar row\">\n"; 
echo "                  <div class=\"navbar-header\"><a class=\"navbar-brand\" href=\"index.html\"><img src=\"img/logo.png\" alt=\"logo\" /></a><button id=\"nav-toggle\" type=\"button\" class=\"ui-navbar-toggle navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-1\"><span class=\"sr-only\">Toggle navigation</span><span class=\"icon-bar\"></span><span class=\"icon-bar\"></span><span class=\"icon-bar\"></span></button></div>\n"; 
echo "                  <div class=\"collapse navbar-collapse navbar-1\">\n"; 
echo "                     <ul class=\"site-navigation nav navbar-nav\">\n"; 
echo "                        <li><a href=\"index.html\">Home</a></li>\n"; 
echo "                        <li><a href=\"the_team.html\">The Team</a></li>\n"; 
echo "                        <li><a href=\"logoutrenter.php\">Logout</a></li>\n"; 
echo "                     </ul>\n"; 
echo "                  </div>\n"; 
echo "               </nav>\n"; 
echo "            </div>\n"; 
echo "         </div>\n"; 
echo "         <!-- bloc-26 END --><!-- bloc-27 -->\n"; 
echo "         <div class=\"bloc bgc-white l-bloc\" id=\"bloc-27\">\n"; 
echo "            <div class=\"container bloc-lg\">\n"; 
echo "               <div class=\"row\">\n"; 
echo "                  <div class=\"col-sm-6\">\n"; 
echo "                     <h3 class=\"mg-md\">Wallet Balance:$row2[wallet]</h3>\n"; 
echo "                     <div class=\"divider-h\"><span class=\"divider\"></span></div>\n"; 
echo "                    <img src='upload/".$_SESSION['bicyclepic']."' class=\"img-rd-md animated vanishIn img-responsive\" title=\"This is a tooltip\" height=\"271\" width=\"406\" />\n"; 
echo "                     <h2 class=\"mg-lg \">Manufacturer:$row3[manufacturer]</h2>\n"; 
echo "                     <h4 class=\"mg-md \">Description:$row3[description]</h4>\n"; 
echo "                     <div class=\"divider-h\"><span class=\"divider\"></span></div>\n"; 
echo "                    <h3 class=\"mg-sm \"><strong>Owner Name:$row1[ownername]</strong></h3>\n"; 
echo "                     <h4 class=\"mg-md \">Contact Number:$row1[ownerphonenumber]</h4>\n"; 
echo "                     <h4 class=\"mg-md \">Email:$row1[owneremail]</h4>\n"; 
echo "                     <div class=\"divider-h\"><span class=\"divider\"></span></div>\n"; 
echo "                     <a href=\"renter_bill.php\" class=\"btn btn-lg btn-seashell\">Stop/Bill<br></a>\n"; 
echo "                  </div>\n"; 
echo "                  <div class=\"col-sm-6\"></div>\n"; 
echo "               </div>\n"; 
echo "            </div>\n"; 
echo "         </div>\n"; 
echo "         <!-- bloc-27 END --><!-- ScrollToTop Button --><a class=\"bloc-button btn btn-d scrollToTop\" onclick=\"scrollToTarget('1')\"><span class=\"fa fa-chevron-up\"></span></a><!-- ScrollToTop Button END--><!-- Footer - bloc-32 -->\n"; 
echo "         <div class=\"bloc bgc-black d-bloc\" id=\"bloc-32\">\n"; 
echo "            <div class=\"container bloc-lg\">\n"; 
echo "               <div class=\"row\">\n"; 
echo "                  <div class=\"col-sm-3\">\n"; 
echo "                     <h3 class=\"mg-md bloc-mob-center-text\">About</h3>\n"; 
echo "                     <a href=\"the_team.html\" class=\"a-btn a-block bloc-mob-center-text\">The Team</a><a href=\"contact_us.html\" class=\"a-btn a-block bloc-mob-center-text\">Contact us</a>\n"; 
echo "                  </div>\n"; 
echo "                  <div class=\"col-sm-3\">\n"; 
echo "                     <h3 class=\"mg-md bloc-mob-center-text\">Book a Ride</h3>\n"; 
echo "                     <a href=\"renter_login.html\" class=\"a-btn a-block bloc-mob-center-text\">Login</a><a href=\"renter_login.html\" class=\"a-btn a-block bloc-mob-center-text\">Sign Up</a>\n"; 
echo "                  </div>\n"; 
echo "                  <div class=\"col-sm-3\">\n"; 
echo "                     <h3 class=\"mg-md bloc-mob-center-text\">Follow Us</h3>\n"; 
echo "                     <a href=\"index.html\" class=\"a-btn a-block bloc-mob-center-text\">Twitter</a><a href=\"index.html\" class=\"a-btn a-block bloc-mob-center-text\">Facebook</a>\n"; 
echo "                  </div>\n"; 
echo "                  <div class=\"col-sm-3\">\n"; 
echo "                     <h3 class=\"mg-md bloc-mob-center-text\">Company</h3>\n"; 
echo "                     <a href=\"termspolicy.html\" class=\"a-btn a-block bloc-mob-center-text\">Terms of use</a><a href=\"termspolicy.html\" class=\"a-btn a-block bloc-mob-center-text\">Privacy</a>\n"; 
echo "                  </div>\n"; 
echo "               </div>\n"; 
echo "            </div>\n"; 
echo "         </div>\n"; 
echo "         <!-- Footer - bloc-32 END -->\n"; 
echo "      </div>\n"; 
echo "      <!-- Main container END --> \n"; 
echo "   </body>\n"; 
echo "</html>\n"; 
echo "\n";
        }
    }
?>