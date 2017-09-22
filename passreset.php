<html>
<body>
	<?php
		include 'datalogin.php';
		session_start();

		//loop to make sure form was filled out correctly
		$code = $_SESSION['code'];
		$email = $_SESSION['email'];

		if(!empty($_GET["newpass1"])){
			if($_GET["resetcode"] == $code){
				if(($_GET["newpass1"]) == ($_GET["newpass2"])){
                    //if all form credentials are met password is updated in access
                    $password = $_GET["newpass1"];

                    $query = $conn->query("UPDATE tblStudents SET password = '$password' WHERE email= '$email'");
                    while($r = $query->fetch(PDO::FETCH_OBJ)){
                        echo '<p>Successfully changed password.</p>';
                    }

				} else {
					echo 'Passwords do not match.';
				}
			} else {
				echo 'Invalid reset credential';
			}
		} else {
			echo 'All Fields Required';
		}

	?>

	<!-- beginning of HTML form -->
	<form action="passreset.php" method="get">
		<h2>Password Reset</h2>
		<p>Email sent: <?php echo $_SESSION['email'];?></p>
		<input name="resetcode" id="resetcode" type="text" class="form-control" placeholder="Reset Code" autofocus></br>
		<input name="newpass1" id="newpass1" type="text" class="form-control" placeholder="New Password" autofocus></br>
		<input name="newpass2" id="newpass2" type="text" class="form-control" placeholder="Repeat New Password" autofocus></br>
		<button name="Reset" id="submit" class="btn btn-lg btn-primary btn-block" type="submit">Reset Password</button>
	</form>

</body>
</html>
