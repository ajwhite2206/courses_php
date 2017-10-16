<?php
	include("datalogin.php");
	include("includes/header.php");
	if(empty($_SESSION)){		 	
 		session_start();		
 	}
?>

<!DOCTYPE html>
<html>

<body>
		<div class="container">
			<table class="table table-striped table-hover ">

				<?php
				$cid = $_GET['CID'];
				$query = $conn->query("SELECT * FROM tblCourses WHERE CourseID = $cid");
				while($r = $query->fetch(PDO::FETCH_OBJ)){
					$stDate = date_create($r->startDate);
					$edDate = date_create($r->endDate);

					echo '<tbody><tr>
						<td>Subject</td>
						<td>'; echo $r->subject, '</td>
						</tr>
						<tr>
						<td>Start Date</td>
						<td>'; echo date_format($stDate, "m-d-Y"), '</td>
						</tr>
						<tr>
						<td>End Date</td>
						<td>'; echo date_format($edDate, "m-d-Y"), '</td>
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
