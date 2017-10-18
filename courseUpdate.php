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
					$CID = $_POST['CID'];

					// Enter the new user in the database
					$query = $conn->query(
					"UPDATE tblCourses 
					SET subject='$title',
						instructor='$instructor',
						category='$category',
						location='$location',
						points='$points',
						startDate=#$start_date#,
						endDate=#$end_date#,
						startTime='$start_time',
						endTime='$end_time',
						resources='$resources',
						description='$description'
					WHERE CourseID=$CID");
					//place an if to make sure it runs
					echo "Your changes are complete.";
				} else {
					$query = $conn->query("SELECT * FROM tblCourses WHERE CourseID = $CID");
					while($r = $query->fetch(PDO::FETCH_OBJ)) {

?>
					<legend>Edit Course: <?php echo $CID; ?></legend>
					<form method="POST" action="courseUpdate.php" role="form" class="form-hoizontal">
						<input type="hidden" name="CID" id="CID" value="<?php echo $_REQUEST['CID'];?>" />
						<input type="hidden" name="submit" id="submit" value=1 />
						<label for="instructor">
							<span>Instructor Email:</span>
							<input type="text" name="instructor" id="instructor" required="required" value="<?php echo $r->instructor; ?>" autofocus>
						</label>
						<br>
						<label for="title">
							<span>Course Title:</span>
							<input type="text" name="title" id="title" required="required" value="<?php echo $r->subject; ?>">
						</label>
						<br>
						<label for="category">
							<span>Course Category:</span>
							<input type="text" name="category" id="category" required="required" value="<?php echo $r->category; ?>">
						</label>
						<br>
						<label for="location">
							<span>Location:</span>
							<input type="text" name="location" id="location" required="required" value="<?php echo $r->location; ?>">
						</label>
						<br>
						<label for="points">
							<span>Points:</span>
							<input type="number" name="points" id="points" required="required" value="<?php echo $r->points; ?>">
						</label>
						<br>
						<?php //converts to proper date format
							$hold = date_create($r->startDate);
							$result = $hold->format('m-d-Y');
							$result = (string)$result;
						?>
						<label for="start-date">
							<span>Start Date:</span>
							<input type="text" name="start-date" id="start-date" required="required" pattern="\d{2}-?\d{2}-?\d{4}" placeholder="11-11-2017" value="<?php echo $result; ?>">
						</label>
						<br>
						<?php //converts to proper date format
							$hold = date_create($r->endDate);
							$result = $hold->format('m-d-Y');
							$result = (string)$result;
						?>
						<label for="end-date">
							<span>End Date:</span>
							<input type="text" name="end-date" id="end-date" pattern="\d{2}-?\d{2}-?\d{4}" placeholder="11-11-2017" value="<?php echo $result; ?>">
						</label>
						<br>
						<?php //converts to proper date format
							if($r->startTime!=Null){
								$stTime = date_create($r->startTime);
							} else {
								$stTime = date_create("00:00");
							}
						?>
						<label for="start-time">
							<span>Start Time:</span>
							<input type="text" name="start-time"id="start-time" pattern="\d{2}+:?\d{2}+[a-z]" placeholder="07:00am" value="<?php echo date_format($stTime, "h:ia") ?>">
						</label>
						<br>
						<?php //converts to proper date format
							if($r->endTime!=Null){
								$endTime = date_create($r->endTime);
							} else {
								$endTime = date_create("00:00");
							}
						?>
						<label for="end-time">
							<span>End Time:</span>
							<input type="text" name="end-time" id="end-time" pattern="\d{2}+:?\d{2}+[a-z]" placeholder="07:00am" value="<?php echo date_format($endTime, "h:ia") ?>">
						</label>
						<br>
						<label for="resources">
							<span>Course Resources:</span><br>
							<textarea name="resources" id="resources" ><?php echo $r->resources; ?></textarea>
						</label>
						<br>
						<label for="description">
						<span>Course Description:</span><br>
							<textarea name="description" id="description" ><?php echo $r->description; ?></textarea>
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