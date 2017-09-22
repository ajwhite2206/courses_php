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

<?php include("includes/header.html"); ?>
<body>

		<div class="container">

					<?php if(!empty($message)): ?>
		<p><?= $message ?></p>
	<?php endif; ?>

	<h1>Login</h1> <h2>or <a href="register.php">register here</a></h2>

	<form action="login.php" method="POST">
		
		<input type="text" placeholder="Enter your email" name="email">
		<input type="password" placeholder="and password" name="password">

		<input type="submit">

	</form>

				</div> <!-- /container -->

			<br>
			
		</div>
		<div id="footer">
			
		</div>
	</div>
</body>

</html>