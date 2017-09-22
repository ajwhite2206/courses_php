<!DOCTYPE html>
<html>

<?php include("includes/header.html"); ?>

<body>
	

		<div id="wrapper">
			<table class="table table-striped table-hover ">
  			
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
