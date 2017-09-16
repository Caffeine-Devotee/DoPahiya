<?php
	//Start the session to see if the user is authencticated user.
    session_start();
    //Check if the user is authenticated first. Or else redirect to login page

    if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 2){
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
            $renterid=$_POST['selectcycle'];
            $amount=$_POST['amount'];
            $query="UPDATE renter
            SET wallet = wallet+$amount
            WHERE rollnumber = $renterid";
			mysql_query($query);
			 $message = " UPDATED RENTER ACCOUNT .";
          echo "<script type='text/javascript'>window.alert('$message');
						window.location.href='location:admin.php';
						</script>";
						 header('Location:admin.php');
		
        }
    }
 ?>