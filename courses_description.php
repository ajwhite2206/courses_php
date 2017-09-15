<!DOCTYPE html>
<html>

<head>
	<link type="text/css" href="styles/defaultstyle.css" rel="stylesheet" media="screen" />
	<link type="text/css" href="styles/description.css" rel="stylesheet" media="screen" />
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
				<?php
				include 'datalogin.php';
				session_start();
				$cid = $_GET['CID'];
				$query = $conn->query("SELECT * FROM tblCourses WHERE CourseID = $cid");
				while($r = $query->fetch(PDO::FETCH_OBJ)){
					echo '<tr>
						<td>Subject</td>
						<td>'; echo $r->subject, '</td>
						</tr>
						<tr>
						<td>Start Date</td>
						<td>'; echo $r->startDate, '</td>
						</tr>
						<tr>
						<td>End Date</td>
						<td>'; echo $r->endDate, '</td>
						</tr>
						<tr>
						<td>Start Time</td>
						<td>'; echo $r->startTime, '</td>
						</tr>
						<tr>
						<td>End Time</td>
						<td>'; echo $r->endTime, '</td>
						</tr>
						<tr>
						<td>Instructor</td>
						<td>'; echo $r->instructor, '</td>
						</tr>
						<tr>
						<td>Location</td>
						<td>'; echo $r->location, '</td>
						</tr>
						<tr>
						<td>Resources</td>
						<td>'; echo $r->resources, '</td>
						</tr>
						<tr>
						<td>Description</td>
						<td>'; echo $r->description, '</td>
						</tr>';
					}
					?>
			</table>
		</div>
	</div>
</body>

</html>
