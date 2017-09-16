<?php
error_reporting(0);
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
			echo '!!';
        }
        /*Select database*/
        $db = mysql_select_db('gaurav',$link);
        if(!$db){
            die("Unable to select database");
        }
		else{
            //$trans=$_SESSION['trans'];
			$query="SELECT max(transaction_id) AS trans FROM rent";
			$result=mysql_query($query);
            $row = mysql_fetch_assoc($result);
			
            $query6=mysql_query("SELECT * FROM rent WHERE transaction_id=$row[trans]");
			$row6=mysql_fetch_assoc($query6);
			$starttime=$row6['timedate'];
			
            $query3=mysql_query("INSERT INTO rentstop (transaction_id_rent) VALUES ($row[trans])");
			
            $query5=mysql_query("SELECT * FROM rentstop WHERE transaction_id_rent=$row[trans]");
			$row5=mysql_fetch_assoc($query5);
			$endtime=$row5['stopdate'];
            $ownerid=$_SESSION['ownerid'];
            $renterid=$_SESSION['rollnumber'];
            
            $query1="SELECT * FROM owner WHERE ownerrollnumber=$ownerid";
            $result1=mysql_query($query1);
			$row1=mysql_fetch_assoc($result1);
            $query2="SELECT * FROM renter WHERE rollnumber= $renterid";
            $row2=mysql_fetch_assoc(mysql_query($query2));
			
			$start=mysql_fetch_assoc(mysql_query("SELECT timedate FROM rent WHERE transaction_id = $row[trans]"));
			$stop=mysql_fetch_assoc(mysql_query("SELECT stopdate FROM rentstop WHERE transaction_id_rent = $row[trans]"));
			$diff=(strtotime($stop['stopdate']) - strtotime($start['timedate']))/60;
			$bill=$diff*0.5;
			
			$query4="UPDATE rent SET amount = $bill WHERE transaction_id = $row[trans]";
			mysql_query($query4);
			
			 $query7="UPDATE renter
            SET bookingstatus =0 
            WHERE rollnumber = $renterid";
            mysql_query($query7);
            
            $query8="UPDATE cycle
            SET available = 1
            WHERE ownerid = $ownerid";
            mysql_query($query8);
			
			$query9="UPDATE renter SET wallet = wallet-$bill WHERE rollnumber = $renterid";
			mysql_query($query9);
			
			$query10="UPDATE owner SET ownerwallet = ownerwallet+$bill WHERE ownerrollnumber = $ownerid";
			mysql_query($query10);
			
        echo '
<html>
    <head> 
        <meta charset="utf-8"> 
        <meta name="keywords" content=""> 
        <meta name="description" content=""> 
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0"> 
        <link rel="shortcut icon" type="image/png" href="favicon.png"> 
        <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="./css/animate.min.css">
        <link rel="stylesheet" href="./css/font-awesome.min.css">
        <link rel="stylesheet" href="./css/linecons.min.css">
        <link rel="stylesheet" href="./css/ionicons.min.css">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&subset=latin,latin-ext" rel="stylesheet" type="text/css"> 
        <script src="./js/jquery-2.1.0.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        <script src="./js/blocs.min.js"></script> 
        <title>Renter_Bill</title> 
        </head>
    <body>
        <div class="page-container"> 
            <div class="bloc bgc-pale-blue l-bloc" id="bloc-28">
                <div class="container bloc-sm">
                    <nav class="navbar row">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="index.html"><img src="img/logo.png" alt="logo" /></a>
                            <button id="nav-toggle" type="button" class="ui-navbar-toggle navbar-toggle" data-toggle="collapse" data-target=".navbar-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse navbar-1">
                            <ul class="site-navigation nav navbar-nav">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="the_team.html">The Team</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="bloc bgc-white l-bloc" id="bloc-29">
                <div class="container bloc-lg">
                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <h3 class="mg-md text-center tc-outer-space-2">Rental Bill</h3>
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="mg-clear tc-outer-space-2">Txn. ID: '.$row[trans].'</h3>
                                </div>
                                <div class="panel-body">
                                    <h3 class="mg-md tc-outer-space-2">Renter Name: '.$row2['fullname'].'</h3>
                                    <h4 class="mg-md">Amount Paid: Rs '.$bill.'</h4>
                                    <h3 class="mg-md tc-outer-space-2">Owner Name: '.$row1['ownername'].'</h3>
									<h4 class="mg-md">Start Time: '.$starttime.'</h4>
									<h4 class="mg-md">Stop Time: '.$endtime.'</h4>
                                </div></div><div class="panel">
                            <div class="panel-body">
                                <p>For any Billing relates issue please contact us through our Contact Us page. <br>Any matter solved between Owner and Renter is against our policy thereby preventing from any further bussiness in future.</p>
                            </div>
                            </div>
                            <a href="renter_home.php" class="btn btn-lg btn-block btn-alice-blue">Rent Again</a>
                        </div>
                        <div class="col-sm-4"></div>
                    </div>
                </div>
            </div>
            <a class="bloc-button btn btn-d scrollToTop" onclick="scrollToTarget(1)">
                <span class="fa fa-chevron-up"></span>
            </a>
            <div class="bloc bgc-black d-bloc" id="bloc-30">
                <div class="container bloc-lg">
                    <div class="row">
                        <div class="col-sm-3">
                            <h3 class="mg-md bloc-mob-center-text">About</h3>
                            <a href="the_team.html" class="a-btn a-block bloc-mob-center-text">The Team</a>
                            <a href="contact_us.html" class="a-btn a-block bloc-mob-center-text">Contact us</a>
                        </div>
                        <div class="col-sm-3">
                            <h3 class="mg-md bloc-mob-center-text">Book a Ride</h3>
                            <a href="renter_login.html" class="a-btn a-block bloc-mob-center-text">Login</a>
                            <a href="renter_login.html" class="a-btn a-block bloc-mob-center-text">Sign Up</a>
                        </div>
                        <div class="col-sm-3">
                            <h3 class="mg-md bloc-mob-center-text">Follow Us</h3>
                            <a href="index.html" class="a-btn a-block bloc-mob-center-text">Twitter</a>
                            <a href="index.html" class="a-btn a-block bloc-mob-center-text">Facebook</a>
                        </div>
                        <div class="col-sm-3">
                            <h3 class="mg-md bloc-mob-center-text">Company</h3>
                            <a href="termspolicy.html" class="a-btn a-block bloc-mob-center-text">Terms of use</a>
                            <a href="termspolicy.html" class="a-btn a-block bloc-mob-center-text">Privacy</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>';
        }
    }
?>