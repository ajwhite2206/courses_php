<?php
	include("includes/header.php");
if( isset($_SESSION['email']) ){
	header("Location: index.php");
}
if(!empty($_POST['email']) && !empty($_POST['password'])):
	
	$records = $conn->prepare('SELECT email,password FROM tblStudents WHERE email = :email');
	$records->bindParam(':email', $_POST['email']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);
	$message = '';
	if($_POST['password']  == $results['password']) {
		$_SESSION['email'] = $results['email'];
		//header("Location: /");
		echo $_SESSION['email'];
		
		// check for admin priv
		$email = $_SESSION['email'];
		$admin = $conn->prepare("SELECT * FROM tblAdmin where adminEmail = '$email'");
		$admin->execute();
		$issuper = $admin->fetch(PDO::FETCH_ASSOC);
		if($_SESSION['email'] == $issuper['adminEmail']){
			echo "and we are in";
			$_SESSION['admin'] = true;
			//doubling checking to see if they are super user
			if($issuper['superAdmin']  == 'T'){
				$_SESSION['superAdmin'] = true;
			} else {
				$_SESSION['superAdmin'] = false;
			}
		} else {
			$_SESSION['admin'] = false;
		}
		header("Location: index.php");
	} else {
		$message = 'Sorry, those credentials do not match';
	}
endif;
?>
<!DOCTYPE html>
<html>

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