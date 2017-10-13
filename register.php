<?php
include("datalogin.php");
include("includes/header.php");
session_start();
session_regenerate_id(true);
if( isset($_SESSION['email']) ){
	header("Location: index.php");
}

$message = '';

if(!empty($_POST['email']) && !empty($_POST['password'])):
	// Enter the new user in the database
	$sql = "INSERT INTO tblStudents (email, password) VALUES (:email, :password)";
	$stmt = $conn->prepare($sql);

	$stmt->bindParam(':email', $_POST['email']);
	// This doesn't work unless you also use the password_hash on the login page as well.
	//$stmt->bindParam(':password', password_hash($_POST['password'], PASSWORD_BCRYPT));
	// Using this for now so that the register and login pages will cooperate.
	$stmt->bindParam(':password', $_POST['password']);

	// Check if user already exists
	$em = $_POST['email'];
	$check = $conn->query("SELECT count(email) as emCount FROM tblStudents WHERE email='$em'");
	$check->execute();
	$checkEmail = $check->fetch(PDO::FETCH_ASSOC);
	// If user exists, the session is destroyed to remove variables and ensure the query will function properly.
	// If the user doesn't exist, the account is created and the user is sent to the login page.
	if((int)$checkEmail['emCount'] > 0){
		echo'<p>The email ', "$em", ' already exists. <br /> If you forgot your password, recover it here: <a href="recovery.php">Recover Password</a></p>';
		session_destroy();
	} else {
		$stmt->execute();
		$message = 'Successfully created new user';
		header("Location: login.php");
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

	<h1>Register</h1>
	<span>or <a href="login.php">login here</a></span>

	<form action="register.php" method="POST">

		<input type="text" placeholder="Enter your email" name="email">
		<input type="password" placeholder="and password" name="password">
		<input type="password" placeholder="confirm password" name="confirm_password">
		<input type="submit">

	</form>

			<br>

		</div>
		<div id="footer">

		</div>

</body>

</html>
