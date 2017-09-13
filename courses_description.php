<!doctype html>
<html>

<head>
	<link type="text/css" href="styles/defaultstyle.css" rel="stylesheet" media="screen" />
	<link type="text/css" href="styles/courses.css" rel="stylesheet" media="screen" />
	<title>Professional Development and Training || Lewis-Clark State College</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
	<div id="container">
		<div id="banner">
			<!--Start of the header, and LCSC logo image -->
			<div class="auto-style2">
				<a href="http://connect.lcsc.edu/pdt"> <img alt="LCSC Blue Flag Logo" height="63" src="images/LCSCLogo-small.jpg" width="194"> </a>

				<span class="auto-style1">
					<strong><br>Professional Development &amp; Training (PDT)</strong>
				</span>
			</div>

			<!-- strip just below banner -->
			<h1>training success daily</h1>
		</div>

		<div id="wrapper">
			<table>
				<th scope="row">Subject</th>
				<th scope="row">Start Date</th>
				<th scope="row">End Date</th>
				<th scope="row">Start Time</th>
				<th scope="row">End Time</th>
				<th scope="row">Instructor</th>
				<th scope="row">Location</th>
				<th scope="row">Resources</th>
				<th scope="row">Description</th>

			<?php
			include 'datalogin.php';
			session_start();
			$sub = $_GET['CID'];
			$query = $conn->query("SELECT * FROM tblCourses WHERE subject = '$sub'");
			while($r = $query->fetch(PDO::FETCH_OBJ)){

				echo '	<tr>
					<td>'; echo $r->subject, '</td>
					<td>'; echo $r->startDate, '</td>
					<td>'; echo $r->startTime, '</td>
					<td>'; echo $r->category, '</td>
					<td>'; echo $r->instructor, '</td>
					<td>'; echo $r->location, '</td>
					<td>'; echo $r->resources, '</td>
					<td>'; echo $r->description, '</td>
					</tr>';
			}
		?>
		</div>

</body>
</html>
