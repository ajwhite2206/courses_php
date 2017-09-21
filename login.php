<?php
	session_start();

if( isset($_SESSION['email']) ){
	header("Location: index.php");
}

require 'datalogin.php';

if(!empty($_POST['email']) && !empty($_POST['password'])):
	
	$records = $conn->prepare('SELECT email,password FROM tblStudents WHERE email = :email');
	$records->bindParam(':email', $_POST['email']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);

	$message = '';
		if($_POST['password']  == $results['password']) {

	//if(count($results) > 0 && password_verify($_POST['password'], $results['password']) ){

		$_SESSION['email'] = $results['email'];
		//header("Location: /");
		echo $_SESSION['email'];

	} else {
		$message = 'Sorry, those credentials do not match';
	}

endif;

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
			<h1>Login page</h1>
		</div>

		<div id="wrapper">
			<body>
				<div class="container">

					<?php if(!empty($message)): ?>
		<p><?= $message ?></p>
	<?php endif; ?>

	<h1>Login</h1>
	<span>or <a href="register.php">register here</a></span>

	<form action="login.php" method="POST">
		
		<input type="text" placeholder="Enter your email" name="email">
		<input type="password" placeholder="and password" name="password">

		<input type="submit">

	</form>

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