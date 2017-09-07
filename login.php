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
			<h1>Login page</h1>
		</div>

		<div id="wrapper">
				<body>
    <div class="container">

      <form class="form-signin" name="form1" method="post" action="checklogin.php">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input name="myusername" id="myusername" type="text" class="form-control" placeholder="Username" autofocus>
        <input name="mypassword" id="mypassword" type="password" class="form-control" placeholder="Password">
        <!-- The checkbox remember me is not implemented yet...
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        -->
        <button name="Submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	    <a href="signup.php" name="Sign Up" id="signup" class="btn btn-lg btn-primary btn-block" type="submit">Create new account</a>

        <div id="message"></div>
      </form>

    </div> <!-- /container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-2.2.4.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <!-- The AJAX login script -->
    <script src="js/login.js"></script>
    <br>

  </body>
		</div>
		<div id="footer">
			<h1>Lewis-Clark State College  ||  Professional Development and Training  ||  For more information please contact: jcrea@lcsc.edu</h1></div>
	</div>
</body>

</html>