<?php
  include("includes/header.php");
  if (empty($_SESSION)){		   
     header("Location: index.php");		
   }
?>

<html>
  <body>
    <div class="container">
      <table class="table table-striped table-hover ">
        <thead>
          <tr>
            <th>Course ID</th>
            <th>Course Title</th>
            <th>Instructor</th>
            <th>Location</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Registration Date</th>
            <!-- <th>Completed</th> -->
            <th>Evaluation</th>
          </tr>
        </thead>

        <?php
            $email = $_SESSION['email'];
			$query = $conn->query("SELECT r.courseID, c.subject, c.instructor, c.location, c.startDate, c.endDate, r.registerDate, r.courseComplete FROM registration r, tblCourses c WHERE r.email='$email' AND r.courseID=c.CourseID;");
				
				while($r = $query->fetch(PDO::FETCH_OBJ)) {
					$stDate = date_create($r->startDate);
					$edDate = date_create($r->endDate);

					//if($r->courseComplete == 0){ $courseCmp = 'Incomplete'; } elseif ($r->courseComplete == 1) { $courseCmp = 'Complete'; }
					// NINA SAID IT WAS UNNECESSARY HERE IS THE CODE THAT WENT BELOW IN THE TABLE <td>'; echo $courseCmp, '</td>
					//checks to see if current courseid and email have completed course evaluation
					$eval = $conn->query("SELECT CourseID FROM evaluation WHERE Email='$email'");
					$match = False; //default
						while($e = $eval->fetch(PDO::FETCH_OBJ)){
							if ($e->CourseID == $r->courseID){
								$match = True;
							} 
						} 
						
						echo '<tbody>
							<tr>
								<td>'; echo $r->courseID, '</td>
								<td>'; echo "<a href='courses_description.php?CID=$r->courseID'>$r->subject</a>", '</td>
								<td>'; echo $r->instructor, '</td>
								<td>'; echo $r->location, '</td>
								<td>'; echo date_format($stDate, "m-d-Y"), '</td>
								<td>'; echo date_format($edDate, "m-d-Y"), '</td>
								<td>'; echo $r->registerDate, '</td>
								<td>';  
									// prints hyper link if survey has not been completed
									if($match){
											echo "Evaluation Completed"; 
									    } else { 
											echo "<a href='survey.php?CID=$r->courseID'>Evaluation Form</a>";
										} '</td>; 
							</tr></tbody>';

						}
					
					?>

      </table>

    </div>
  </body>
</html>
