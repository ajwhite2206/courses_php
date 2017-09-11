<?php
	include 'datalogin.php';
?>
<!DOCTYPE html>
<html>

	<head>
		<link type="text/css" href="styles/defaultstyle.css" rel="stylesheet" media="screen" />
		<link type="text/css" href="styles/courses.css" rel="stylesheet" media="screen" />
		<title>Professional Development and Training || Lewis-Clark State College</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>

	<body>
		<div id="container">
			<div id="banner">
				<!--Start of the header, and LCSC logo image -->
				<div class="auto-style2">
					<a href="http://connect.lcsc.edu/pdt"> <img alt="LCSC Blue Flag Logo" height="63" src="images/LCSCLogo-small.jpg" width="194"> </a>

					<span class="auto-style1">
						<strong><br>Professional Development &amp; Training (PDT)</strong>
					</span>
				</div>

				<!-- strip just below banner -->
				<h1>Account Recovery</h1>
			</div>

			<div id="wrapper">
					<body>
						<div class="container">
							<!-- This is where the user entry is imputed, myemail start here and will be carried throughout checkemail and passreset-->
							<form action="checkemail.php" method="post">
								<h2 class="form-signin-heading">Reset Password:</h2>
								<input name="myemail" id="myemail" type="text" class="form-control" placeholder="Email" autofocus>
								<button name="Submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
							</form>
							
							<a href="signup.php" name="Sign Up" id="signup" class="btn btn-lg btn-primary btn-block" type="submit">Create new account</a>
							</br>	
							<a href="login.php" name="login" id="login" class="btn btn-lg btn-primary btn-block" type="submit">Existing Account</a>
						</div> <!-- /container -->
						
						<br>

					</body>
			</div>
			<div id="footer">
					<h1>Lewis-Clark State College  ||  Professional Development and Training  ||  For more information please contact: jcrea@lcsc.edu</h1>
			</div>
		</div>
	</body>

</html>