<?php
	include 'datalogin.php';
	include("includes/header.html");
?>
<!DOCTYPE html>
<html>

	

	<body>
		<div class="container">
			

			
					<body>
						<div class="container">
							<!-- This is where the user entry is imputed, myemail start here and will be carried throughout checkemail and passreset-->
							<form action="checkemail.php" method="post">
								<h2 class="form-signin-heading">Reset Password:</h2>
								<input name="myemail" id="myemail" type="text" class="form-control" placeholder="Email" autofocus>
								<button name="Submit" id="submit" class="btn primary btn-default" type="submit">Sign in</button>
							</form>
							
							<a href="signup.php" name="Sign Up" id="signup" class="btn btn-default" type="submit">Create new account</a>
							<br>	
							<a href="login.php" name="login" id="login" class="btn btn-default " type="submit">Existing Account</a>
						</div> <!-- /container -->
						
						<br>

					</body>
			</div>
			<div id="footer">
			</div>
		</div>
	</body>

</html>