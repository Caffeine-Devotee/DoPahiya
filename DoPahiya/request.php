<?php
	//Start the session to see if the user is authencticated user.
    session_start();
    //Check if the user is authenticated first. Or else redirect to login page
    
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
            $roll=$_SESSION['ownerrollnumber'];
            $query1="SELECT * FROM owner WHERE ownerrollnumber=$roll";
            $result1=mysql_query($query1);
			$row1=mysql_fetch_assoc($result1);
            $d=$_POST['des'];
            
            $query=mysql_query("INSERT INTO repairrequestowner (ownerrollnumber,ownername,owneremail,repairdescription) VALUES ('$roll','$row1[ownername]','$row1[owneremail]','$d')");
            session_unset(); 
            session_destroy();
            header("location: owner_login.html");
            exit();
            
        }


?>