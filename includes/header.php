<?php
include 'datalogin.php';
session_start();
echo '
<head>
	<link type="text/css" href="https://bootswatch.com/flatly/bootstrap.min.css" rel="stylesheet" media="screen" />

  <link type="text/css" href="https://bootswatch.com/flatly/bootstrap.css" rel="stylesheet" media="screen" />

  <link type="text/css" https://bootswatch.com/flatly/variables.less" rel="stylesheet" media="screen" />

  <link rel="shortcut icon" type="image/png" href="images/logo.ico">

	<title>Professional Development and Training || Lewis-Clark State College</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

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
        <li><a href="courses.php">Courses<span class="sr-only">(current)</span></a></li>';
        if(!(isset($_SESSION['email'])) ){
        echo '<li><a href="register.php">Register<span class="sr-only">(current)</span></a></li>
	<li><a href="recovery.php">Recover Account<span class="sr-only">(current)</span></a></li>';
}
        if( isset($_SESSION['email']) ){
          echo '<li><a href="mycourses.php">My Courses<span class="sr-only">(current)</span></a></li>';
        }
      echo '
      </ul>
      <ul class="nav navbar-nav navbar-right">';
      if( isset($_SESSION['email']) ){
        echo '<li><a href="logout.php">sign out</a></li>';
      } else {
        echo '<li><a href="login.php">sign in</a></li>'; }
        echo '
      </ul>
    </div>
  </div>
</nav>';
?>
