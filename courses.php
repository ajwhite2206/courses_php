<!DOCTYPE html>
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
			<table id="tblView">
				<tr id="tblViewHeader">
					<th>Course Title</th>
					<th>Points</th>
					<th>Date</th>
					<th>Time</th>
					<th>Category</th>
					<th>Instructor</th>
					<th>Location</th>
				</tr>

				<?php
						include 'datalogin.php';
						$query = $conn->query('SELECT * FROM tblCourses WHERE startDate > #1/1/2017#');
						while($r = $query->fetch(PDO::FETCH_OBJ)) {
							//echo $r->subject, 'br>'; } << better way to access objects

					echo '<tr>
								<td>'; echo "<a href='courses_description.php?CID=$r->CourseID'>$r->subject</a>", '</td>
								<td>'; echo $r->points, '</td>
								<td>'; echo $r->startDate, '</td>
								<td>'; echo $r->startTime, '</td>
								<td>'; echo $r->category, '</td>
								<td>'; echo $r->instructor, '</td>
								<td>'; echo $r->location, '</td>
							</tr>';

						}
					?>

			</table>

			<br /><br />
		</div>
		<div id="footer">
			<h1>Lewis-Clark State College  ||  Professional Development and Training  ||  For more information please contact: jcrea@lcsc.edu</h1></div>
	</div>
</body>

</html>
