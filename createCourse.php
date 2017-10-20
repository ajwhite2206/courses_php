<html>
<?php 
include("includes/header.php"); 
include 'datalogin.php';
if(!($_SESSION['email'])){
		header("Location: login.php");
	} 
?>
	<body>
		<div class="container">		
			<h3>Add Course</h3>
				<p>
				<?php		
				
				if(isset($_POST['submitcreate'])){
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

					// Enter the new user in the database
					$query = $conn->query(
						"INSERT INTO tblCourses
							(points, subject, startDate, startTime, endDate, endTime, instructor, resources, location, description)
						VALUES
							($points, '$title', #$start_date#, '$start_time', #$end_date#, '$end_time', '$instructor', '$resources', '$location',  '$description')");
					//place an if to make sure it runs
					echo "Complete";
					echo '<script type="text/javascript">
					window.location = "superAdminCtl.php"
					</script>';
				} else {


				?>

					<form method="POST" action="superAdminCtl.php" role="form" class="form-hoizontal">
						<input type="hidden" name="create" id="create" value="create" />
						<!--<input type="hidden" name="submit" id="submit" value=1 />-->
						<label for="instructor">
							<span>Instructor Email:</span>
							<input type="text" name="instructor" id="instructor" required="required" autofocus>
						</label>
						<br>
						<label for="title">
							<span>Course Title:</span>
							<input type="text" name="title" id="title" required="required">
						</label>
						<br>
						<label for="category">
							<span>Course Category:</span>
							<input type="text" name="category" id="category" required="required">
						</label>
						<br>
						<label for="location">
							<span>Location:</span>
							<input type="text" name="location" id="location" required="required">
						</label>
						<br>
						<label for="points">
							<span>Points:</span>
							<input type="number" name="points" id="points" required="required">
						</label>
						<br>
						<label for="start-date">
							<span>Start Date:</span>
							<input type="date" name="start-date" id="start-date" required="required" pattern="\d{2}-?\d{2}-?\d{4}" placeholder="11-11-2017">
						</label>
						<br>
						<label for="end-date">
							<span>End Date:</span>
							<input type="date" name="end-date" id="end-date" pattern="\d{2}-?\d{2}-?\d{4}" placeholder="11-11-2017">
						</label>
						<br>
						<label for="start-time">
							<span>Start Time:</span>
							<input type="time" name="start-time"id="start-time" pattern="\d{2}+:?\d{2}+[a-z]" placeholder="07:00am" >
						</label>
						<br>
						<label for="end-time">
							<span>End Time:</span>
							<input type="time" name="end-time" id="end-time" pattern="\d{2}+:?\d{2}+[a-z]" placeholder="07:00am">
						</label>
						<br>
						<label for="resources">
							<span>Course Resources:</span><br>
							<textarea name="resources" id="resources" ></textarea>
						</label>
						<br>
						<label for="description">
						<span>Course Description:</span><br>
							<textarea name="description" id="description" ></textarea>
						</label>
						<br>
						<input type="submit" name="submitcreate">
					</form>
				<?php } ?>
				</p>
		</div>
	</body>
</html>