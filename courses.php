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
			<?php
				$connStr = "odbc:DRIVER={Microsoft Access Driver (*.mdb, *.accdb)}; DBQ=C:\\wamp\\www\\database\\course.mdb";
				try {
					$handler = new PDO($connStr);
					$handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				}
				catch(PDOException $e) {
					echo $e->getMessage();
					die();
				}
				$query = $handler->query('SELECT * FROM tblCourses WHERE startDate > #1/1/2017#');
				?>

				<table>
					<tr>
						<th>Course Title</th>
						<th>Points</th>
						<th>Date</th>
						<th>Time</th>
						<th>Category</th>
						<th>Instructor</th>
						<th>Location</th>
					</tr>

					<?php
						while($r = $query->fetch()) {
					?>
						<tr>
							<td> <?php echo $r['subject']; ?> </td>
							<td> <?php echo $r['points']; ?> </td>
							<td> <?php echo $r['startDate']; ?> </td>
							<td> <?php echo $r['startTime']; ?> </td>
							<td> <?php echo $r['category']; ?> </td>
							<td> <?php echo $r['instructor']; ?> </td>
							<td> <?php echo $r['location']; ?> </td>
						</tr>
					<?php
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
