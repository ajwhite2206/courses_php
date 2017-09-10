

<?php 
	include 'datalogin.php';
	
	//This section is testing for valid email formatting, prevents blanks/invalid entries
	$email = "";
	$emailErr = "";
	$to = "";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if(empty($_POST["myemail"])){
			$emailErr = "Valid email is required";
			echo $emailErr; 
		} else {
			$to = $email;
			$email = stripper($_POST["myemail"]);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr = "Invalid email format"; 
				echo $emailErr;
			} 
		}
	}
	
	
	function stripper($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	//checking data base for existance of entry
	session_start();
	$_SESSION['savedemail'] = $email;
	$itsamatch = false;
	
	while($r = $emailquery->fetch(PDO::FETCH_OBJ)) {
		$temp = (string)($r->email);
		$other = stripper($temp);
		if ($other == $email){
			$itsamatch = true;
		} 
	}
	
	//response if email existance it will push email and send you to validation screen, else offers new account.
	if ($itsamatch == true){
		$password = substr(md5(uniqid(rand(),1)),3,10);
		$pass = md5($password);
		
		$to = "$email";
		$subject = "Account Recovery";
		$body = "Hello, \n You or someone else has requested a password change. \n Reset Code:";
		$additionalheaders = "From: <donotreply@no.com>";
		mail($to, $subject, $body, $password, $additionalheaders);
		
		/* echo '	<script type="text/javascript">
				window.location = "/courses_php-master/passreset.php"
				</script>'; */
	} else {
		echo 'No user account with this email';
		?>
		<a href="signup.php" name="Sign Up" id="signup" class="btn btn-lg btn-primary btn-block" type="submit">Create new account?</a>
		<?php
	}

		
	
	


				

?>

