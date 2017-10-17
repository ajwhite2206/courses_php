<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="styles/textboxControl.css">
<?php 
include("includes/header.php"); 
include 'datalogin.php';
if(!($_SESSION['email'])){
		header("Location: login.php");
	} 
?>


<body>
	<div class="container">		
				<?php
				
				$CID = $_REQUEST['CID'];		
				
				if(isset($_POST['submit'])){
					//preparing vars
					$instructor = $_POST['instructor'];
					$title = $_POST['title'];
					$category = $_POST['category'];
					$location = $_POST['location'];
					$points = $_POST['points'];
					$start_date = $_POST['start-date'];
					$start_time = $_POST['start-time'];
					$end_date = $_POST['end-date'];
					$end_time = $_POST['end-time'];
					$resources = $_POST['resources'];
					$description = $_POST['description'];
					//$course_type = $_POST['course-type-true'];
					//implement radios
					$CID = $_POST['CID'];

					// Enter the new user in the database
					$query = $conn->query("UPDATE tblCourses SET subject='$title' WHERE CourseID=$CID");
					//place an if to make sure it runs
					echo "Your changes are complete.";
				} else {
					$query = $conn->query("SELECT * FROM tblCourses WHERE CourseID = $CID");
					while($r = $query->fetch(PDO::FETCH_OBJ)) {
						
					
?>
					<legend>Edit Course</legend>
					<form method="POST" action="courseUpdate.php" role="form" class="form-hoizontal">
						<input type="hidden" name="CID" id="CID" value="<?php echo $_REQUEST['CID'];?>" />
						<input type="hidden" name="submit" id="submit" value=1 />
						<label for="instructor">
							<span>Instructor Email</span>
							<input type="email" name="instructor" id="instructor" required="required" value="<?php echo $r->instructor; ?>" autofocus>
						</label>
						<br>
						<label for="title">
							<span>Course Title:</span>
							<input type="text" name="title" id="title" required="required" value="<?php echo $r->subject; ?>">
						</label>
						<br>
						<label for="category">
							<span>Course Category</span>
							<input type="text" name="category" id="category" required="required" value="<?php echo $r->category; ?>">
						</label>
						<br>
						<label for="location">
							<span>Location</span>
							<input type="text" name="location" id="location" required="required" value="<?php echo $r->location; ?>">
						</label>
						<br>
						<label for="points">
							<span>Points</span>
							<input type="number" name="points" id="points" required="required" value="<?php echo $r->points; ?>">
						</label>
						<br>
						<label for="start-date">
							<span>Start Date</span>
							<input type="date" name="start-date" id="start-date" required="required" value="<?php echo $r->startDate; ?>">
						</label>
						<br>
						<label for="end-date">
							<span>End Date</span>
							<input type="date" name="end-date" id="end-date" value="<?php echo $r->endDate; ?>">
						</label>
						<br>
						<label for="start-time">
							<span>Start Time</span>
							<input type="time" name="start-time" id="start-time" value="<?php echo $r->startTime; ?>">
						</label>
						<br>
						<label for="end-time">
							<span>End Time</span>
							<input type="time" name="end-time" id="end-time" value="<?php echo $r->endTime; ?>">
						</label>
						<br>
						<label for="resources">
							<span>Course Resources</span>
							<textarea name="resources" id="resources" ><?php echo $r->description; ?></textarea>
						</label>
						<br>
						<label for="description">
							<span>Course Description</span>
							<textarea name="description" id="description" ><?php echo $r->description; ?></textarea>
						</label>
						<br>
						<span>Online</span>
						<label for="course-type-true">
							<input type="radio" name="course-type" id="course-type-true" value="online">
							<span>Yes</span>
						</label>
						<label for="course-type-false">
							<input type="radio" name="course-type" id="course-type-false" value="traditional">
							<span>No</span>
						</label>
						<br>
						<input type="submit">
					</form>
			  </p>
		</div>
					<?php }}
				
				?>
	</div>
</body>

</html>