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
	<!-- <link type="text/css" href="styles/defaultstyle.css" rel="stylesheet" media="screen" /> -->
	<link type="text/css" href="https://bootswatch.com/flatly/bootstrap.min.css" rel="stylesheet" media="screen" />
	
	<title>Professional Development and Training || Lewis-Clark State College</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">PDT Website</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="courses.php">courses <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php">signin</a></li>
      </ul>
    </div>
  </div>
</nav>


	<div id="container">
		


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
			
		</div>
	</div>
</body>

</html>