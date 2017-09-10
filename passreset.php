<?php 
	
?>
<html>
<body>
	<form action="#" method="post">
		<h2>Password Reset</h2>
		<p>Email sent: <?php session_start(); echo $_SESSION['savedemail'];?></p>
		<input name="resetcode" id="resetcode" type="text" class="form-control" placeholder="Reset Code" autofocus></br>
		<input name="newpass1" id="newpass1" type="text" class="form-control" placeholder="New Password" autofocus></br>
		<input name="newpass2" id="newpass2" type="text" class="form-control" placeholder="Repeat New Password" autofocus></br>
		<button name="Submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	</form>
</body>
</html>