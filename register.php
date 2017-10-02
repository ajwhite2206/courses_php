<?php

include("includes/header.php");

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

	if( $stmt->execute() ):
		$message = 'Successfully created new user';
		// This should forward the user to the login page
	header("Location: login.php");
	else:
		$message = 'Sorry there must have been an issue creating your account';
	endif;

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
