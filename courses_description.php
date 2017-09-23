<?php
	include("includes/header.php");
?>

<!DOCTYPE html>
<html>

<body>
	

		<div class=="container">
			<table class="table table-striped table-hover ">
  			
				<?php
				$cid = $_GET['CID'];
				$query = $conn->query("SELECT * FROM tblCourses WHERE CourseID = $cid");
				while($r = $query->fetch(PDO::FETCH_OBJ)){
					echo '<tbody><tr>
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
						</tr></tbody>';
					}
					?>
			</table>
	</div>
</body>

</html>
