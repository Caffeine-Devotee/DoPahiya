<?php
	//Start the session to see if the user is authencticated user.
    session_start();
echo'
<html>
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <link rel="shortcut icon" type="image/png" href="favicon.png">
    
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="./css/animate.min.css"><link rel="stylesheet" href="./css/font-awesome.min.css"><link rel="stylesheet" href="./css/linecons.min.css"><link rel="stylesheet" href="./css/ionicons.min.css"><link href="https://fonts.googleapis.com/css?family=Josefin+Sans&subset=latin,latin-ext" rel="stylesheet" type="text/css">
    
	<script src="./js/jquery-2.1.0.min.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/blocs.min.js"></script>
	<script src="./js/jqBootstrapValidation.js"></script>
	<script src="./js/formHandler.js"></script>
    <title>Register_Extended</title>

    
<!-- Google Analytics -->
 
<!-- Google Analytics END -->
    
</head>
<body>
<!-- Main container -->
<div class="page-container">
    
<!-- bloc-20 -->
<div class="bloc bgc-pale-blue l-bloc" id="bloc-20">
	<div class="container bloc-sm">
		<nav class="navbar row">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.html"><img src="img/logo.png" alt="logo" /></a>
				<button id="nav-toggle" type="button" class="ui-navbar-toggle navbar-toggle" data-toggle="collapse" data-target=".navbar-1">
					<span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse navbar-1">
				<ul class="site-navigation nav navbar-nav">
					<li>
						<a href="index.html">Home</a>
					</li>
					<li>
						<a href="the_team.html">The Team</a>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</div>
<!-- bloc-20 END -->

<!-- bloc-21 -->
<div class="bloc bgc-white l-bloc" id="bloc-21">
	<div class="container bloc-lg">
		<div class="row">
			<div class="col-sm-12">
				<h2 class="mg-md text-center">
					Bicycle Info
				</h2>
			</div>
		</div>
		<div class="row voffset">
			<div class="col-sm-4">
				<form id="form_7405" novalidate>
				</form>
			</div>
			<div class="col-sm-4">
				<form id="form_5" method="POST" action="bicycleowner.php" enctype="multipart/form-data">
			
					<div class="divider-h">
						<span class="divider"></span>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="manufacturer" placeholder="Manufacturer" id="input_905" required/>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="model" placeholder="Model"   id="input_2520" />
					</div>
					<div class="form-group">
						<label>
							Description
						</label><textarea type="text" class="form-control" rows="4" cols="50" name="description" placeholder="Max 100" maxlength="100" id="textarea_576"></textarea>
					</div>
					
						<input type="file" name="image" accept="image/*" class="form-control" id="input_2330" required/>
						
					
					<h6 class="mg-md">
							Bicycle Image<br></h6>
						<div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-sm-6 col-sm-offset-3">
                                                                                <input id="button" type="submit" class="form-control" name="submit" value="Sign-Up"></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
					<div class="divider-h">
							<span class="divider"></span>
						</div>
					<div class="panel">
							<div class="panel-body">
								<p>
									To register for ownership you must have a bicycle. Please fill all the fields provided.
								</p>
							</div>
						</div>
				</form>
			</div>
			<div class="col-sm-4">
				</div>
		</div>
	</div>
</div>
<!-- bloc-21 END -->

<!-- ScrollToTop Button -->
<a class="bloc-button btn btn-d scrollToTop" onclick="scrollToTarget(1)"><span class="fa fa-chevron-up"></span></a>
<!-- ScrollToTop Button END-->


<!-- Footer - bloc-22 -->
<div class="bloc bgc-black d-bloc" id="bloc-22">
	<div class="container bloc-lg">
		<div class="row">
			<div class="col-sm-3">
				<h3 class="mg-md bloc-mob-center-text">
					About
				</h3><a href="the_team.html" class="a-btn a-block bloc-mob-center-text">The Team</a><a href="contact_us.html" class="a-btn a-block bloc-mob-center-text">Contact us</a>
			</div>
			<div class="col-sm-3">
				<h3 class="mg-md bloc-mob-center-text">
					Book a Ride
				</h3><a href="renter_login.html" class="a-btn a-block bloc-mob-center-text">Login</a><a href="renter_login.html" class="a-btn a-block bloc-mob-center-text">Sign Up</a>
			</div>
			<div class="col-sm-3">
				<h3 class="mg-md bloc-mob-center-text">
					Follow Us
				</h3><a href="index.html" class="a-btn a-block bloc-mob-center-text">Twitter</a><a href="index.html" class="a-btn a-block bloc-mob-center-text">Facebook</a>
			</div>
			<div class="col-sm-3">
				<h3 class="mg-md bloc-mob-center-text">
					Company
				</h3><a href="termspolicy.html" class="a-btn a-block bloc-mob-center-text">Terms of use</a><a href="termspolicy.html" class="a-btn a-block bloc-mob-center-text">Privacy</a>
			</div>
		</div>
	</div>
</div>
<!-- Footer - bloc-22 END -->

</div>
<!-- Main container END -->
    

</body>
</html>';
?>