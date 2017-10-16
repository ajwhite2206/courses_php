<?php
  include("includes/header.php");
?>
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
				</tr>
			</thead>

				<?php
						$query = $conn->query('SELECT * FROM tblCourses WHERE startDate > #1/1/2017#');
						while($r = $query->fetch(PDO::FETCH_OBJ)) {
							//echo $r->subject, 'br>'; } << better way to access objects

					echo '<tbody>
							<tr>
								<td>'; echo "<a href='courses_description.php?CID=$r->CourseID'>$r->subject</a>", '</td>
								<td>'; echo $r->points, '</td>
								<td>'; echo $r->startDate, '</td>
								<td>'; echo $r->startTime, '</td>
								<td>'; echo $r->category, '</td>
								<td>'; echo $r->instructor, '</td>
								<td>'; echo $r->location, '</td>
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
