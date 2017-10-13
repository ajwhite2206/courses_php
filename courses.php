<?php
  include("datalogin.php");
  include("includes/header.php");

  //session_start();

  if(empty($_SESSION)){
    session_start();
  } 
?>
<!DOCTYPE html>
<html>
<body>
	<div class="container">


		<table class="table table-striped table-hover ">
  			<thead>
				<tr>
					<th>Course Title</th>
					<th>Points</th>
					<th>Date</th>
					<th>Time</th>
					<th>Category</th>
					<th>Instructor</th>
					<th>Location</th>
					<th>Register</th>
				</tr>
			</thead>

				<?php
						$query = $conn->query('SELECT * FROM tblCourses WHERE startDate > #1/1/2017#');
						while($r = $query->fetch(PDO::FETCH_OBJ)) {
              $stDate = date_create($r->startDate);

					echo '<tbody>
							<tr>
								<td>'; echo "<a href='courses_description.php?CID=$r->CourseID'>$r->subject</a>", '</td>
								<td>'; echo $r->points, '</td>
								<td>'; echo date_format($stDate, "m-d-Y"), '</td>
								<td>'; echo $r->startTime, '</td>
								<td>'; echo $r->category, '</td>
								<td>'; echo $r->instructor, '</td>
								<td>'; echo $r->location, '</td>
								<td>'; echo "<a href='course_registration.php?CID=$r->CourseID'>Register</a>", '</td>
							</tr></tbody>';

						}
					?>

			</table>

			<br /><br />
		</div>
		<div id="footer">

	</div>
</body>

</html>
