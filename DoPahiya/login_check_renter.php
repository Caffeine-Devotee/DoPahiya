
<?php 
	/*Connect to mysql server*/ 
	define("DB_SERVER",'localhost');
	define("DB_USER",'root');
	define("DB_PASSWORD",'');
	define("DB_DATABASE",'gaurav');
	$link = mysql_connect('localhost', 'root', '','gaurav');  
	
	/*Check link to the mysql server*/ 
	if(!$link){ 
		die('Failed to connect to server: ' . mysql_error());
	} 
	else{
		/*Select database*/ 
		$db = mysql_select_db('gaurav'); 
		if(!$db){
			die("Unable to select database"); 
		}
		else{
			$count=0;
			if ($_POST['submit'] == 'Login'){ 
			//Collect POST values 
				$username = $_POST['username']; 
				$password = $_POST['password']; 
				if($username=='admin' && $password=='pass'){$count=2;}
				elseif($username && $password){ 
					
					//Create query (if you have a Logins table the you can select login id and password from there)
					$qry="SELECT * FROM renter WHERE rollnumber = '$username' AND pass = '$password'"; 
					//Execute query 
					$result=mysql_query($qry); 
					//Check whether the query was successful or not 
					while ($row = mysql_fetch_assoc($result)){ 
						if($row['rollnumber']==$username && $row['pass']==$password)
							$count=1;
					}
					
				}
				
				else{ 
					//Login failed 
					
					echo '<center>Incorrect Username or Password !!!</center>'; 
                    include('renter_login.html'); 
					exit(); 
				} 
			} 
			
			//if query was successful it should fetch 1 matching record from the table. 
			if( $count == 1){ 
			
				//Login successful set session variables and redirect to main page. 
				session_start(); 
				$_SESSION['IS_AUTHENTICATED'] = 1;
				$qry="SELECT * FROM renter WHERE renter.rollnumber = '$username'"; 	
				$result=mysql_query($qry);	
				$rollnumber = mysql_fetch_assoc($result);
				$_SESSION['rollnumber'] = $rollnumber['rollnumber'];
				$_SESSION['bookingstatus']=$rollnumber['bookingstatus'];
				if($_SESSION['bookingstatus']==0)
				{
				header('location: renter_home.php');
				}
				else{
					header('location:renter_home_rent.php');
				}
			}
elseif($count==2){
	session_start();
	$_SESSION['IS_AUTHENTICATED']=2;
	header('location:admin.php');
}	
			else{ 
				//Login failed  
				
           $message = "Incorrect Username or Password !!\\n LOGIN TO RENT .";
          echo "<script type='text/javascript'>window.alert('$message');
						window.location.href='renter_login.html';

				</script>";				
				exit(); 
			} 
			
		} 
		
	}	
	

?>