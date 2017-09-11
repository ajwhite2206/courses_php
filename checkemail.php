

<?php 
	include 'datalogin.php';
	
	//Variable carried over from form in recovery
	$email = $_POST['myemail'];
	
	//This saves email so it can be passed to passreset later
	session_start();
	$_SESSION['email'] = $email;

	//Testing for valid email formatting, prevents blanks/invalid entries
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr = "Invalid email format"; 
				echo $emailErr;
			} 
	
	//checking data base for existance of entry
	$itsamatch = false;
	$emailquery = $conn->query('SELECT * FROM tblStudents;');
	while($r = $emailquery->fetch(PDO::FETCH_OBJ)) {
		$other = (string)($r->email);
		if ($other == $email){
			$itsamatch = true;
		} else {
			;
		}
	}
	
	//if email existance it will push email and send you to validation screen, else offers new account.
	if ($itsamatch){
		//code is the variable that contains the reset password that is pushed in the email
		$code = substr(md5(uniqid(rand(),1)),3,10);

		//passes variable code so it can be used in passreset.php
		$_SESSION['code'] = $code;
		
		//generating email
		$to = "$email";
		$subject = "Account Recovery";
		$body = "Hello, \n You or someone else has requested a password change. \n Reset Code:" .$code;
		$additionalheaders = "From: <donotreply@no.com>";
		mail($to, $subject, $body, $additionalheaders);
		
		//forwards you to the pass reset form	
		echo '	<script type="text/javascript">
				window.location = "/new-php/courses_php/passreset.php"
				</script>';    
	} else {
		//exception text if email was not found in data base
		echo 'No user account with this email';
		?>
		<a href="signup.php" name="Sign Up" id="signup" class="btn btn-lg btn-primary btn-block" type="submit">Create new account?</a>
		<?php
	}

		
	
	


				

?>

