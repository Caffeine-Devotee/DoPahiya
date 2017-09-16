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
            $ownerid=$_SESSION['ownerid'];
            $rollnum=$_SESSION['rollnumber'];
            $query="UPDATE renter
            SET bookingstatus = 1
            WHERE rollnumber = $rollnum";
            mysql_query($query);
            
            $query1="UPDATE cycle
            SET available = 0
            WHERE ownerid = $ownerid";
            mysql_query($query1);
            
			$query2="INSERT INTO rent (transaction_id,owner_id,renter_id)
            VALUES ('','$ownerid','$rollnum')";
            mysql_query($query2);
			$r="SELECT LAST_INSERT_ID()";
			$result=mysql_query($r);
			$row=mysql_fetch_assoc($result);
			$_SESSION['trans']=$row;
            header("location:renter_home_rent.php");
        }
    }
?>