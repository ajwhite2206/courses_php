<?php
include("datalogin.php"); 	
include("includes/header.php");


if(empty($_SESSION)){		   
	session_start();		
} 


?>


<html>
	<body>
	<div class="container">
		<!-- makes the buttons work nicely -->
		<script>
		function openCity(evt, cityName) {
		// Declare all variables
		var i, tabcontent, tablinks;

		// Get all elements with class="tabcontent" and hide them
		tabcontent = document.getElementsByClassName("tabcontent");
		for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		}

		// Get all elements with class="tablinks" and remove the class "active"
		tablinks = document.getElementsByClassName("tablinks");
		for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		}

		// Show the current tab, and add an "active" class to the button that opened the tab
		document.getElementById(cityName).style.display = "block";
		evt.currentTarget.className += " active";
		}
		
		</script>
		
		<!-- creating our tabs -->
		<div class="tab">
		  <button class="tablinks" onclick="openCity(event, 'addCourse')" id="defaultOpen">Add Course</button>
		  <button class="tablinks" onclick="openCity(event, 'editCourse')">Edit Course</button>
		  <button class="tablinks" onclick="openCity(event, 'dropCourse')">Drop Course</button>
		  <button class="tablinks" onclick="openCity(event, 'userPriv')">User Priveleges</button>
		</div>

		<!-- add course form -->
		<div id="addCourse" class="tabcontent">
		  <h3>Add Course</h3>
		  <p>
			<?php
				if(!empty($_POST['date'])):
					// setting variables for the query
					if($_POST['recommend'] == -1){
						$trueorfalse = 'Yes';
					} else {
						$trueorfalse = 'No';
					}
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
					$course_type_true = $_POST['course-type-true'];
					$course_type_false = $_POST['course-type-false'];
					

					// Enter the new user in the database
					$query = $conn->query("INSERT INTO tblCourses (CourseID, points, subject, StartDate, startTime, endDate, endTime, instructor, resources, location, description) VALUES ('111', '$points', '$start_date', '$start_time', '$end_date', '$instructor', '$resources', '$location ', '$description')");
					//place an if to make sure it runs
					endif;
?>
					<form method="POST" action="index.php" role="form" class="form-hoizontal">
						<input type="hidden" name="add-course" value="1">
						<label for="instructor">
							<span>What is the email address of the instructor?</span>
							<input type="email" name="instructor" id="instructor" required="required" placeholder="instructor@lcsc.edu" autofocus>
						</label>
						<br>
						<label for="title">
							<span>What is the title of the course?</span>
							<input type="text" name="title" id="title" required="required" placeholder="Microsoft Excel Basics">
						</label>
						<br>
						<label for="category">
							<span>What is the category of this course?</span>
							<input type="text" name="category" id="category" required="required" placeholder="Computer Technology">
						</label>
						<br>
						<label for="location">
							<span>Where is it located?</span>
							<input type="text" name="location" id="location" required="required" placeholder="SGC 56">
						</label>
						<br>
						<label for="points">
							<span>How many points is it worth?</span>
							<input type="number" name="points" id="points" required="required" placeholder="2">
						</label>
						<br>
						<label for="start-date">
							<span>What date does it begin?</span>
							<input type="date" name="start-date" required="required" id="start-date">
						</label>
						<br>
						<label for="start-time">
							<span>What time of the day does it begin?</span>
							<input type="time">
						</label>
						<br>
						<label for="end-date">
							<span>What date does it end?</span>
							<input type="date" name="end-date" id="end-date">
						</label>
						<br>
						<label for="end-time">
							<span>What time of the day does it end?</span>
							<input type="time" name="end-time" id="end-time">
						</label>
						<br>
						<label for="resources">
							<span>What other resources are available for this course?</span>
							<textarea name="resources" id="resources"
									  placeholder="Limitations, web links, or other special considerations"></textarea>
						</label>
						<br>
						<label for="description">
							<span>Give a detailed description of the course.</span>
							<textarea name="description" id="description"></textarea>
						</label>
						<br>
						<span>Is this an online course?</span>
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
		<!-- edit course form -->
		<div id="editCourse" class="tabcontent">
		  <h3>Edit Course</h3>
		  <p>
			<?php
				if(!empty($_POST['date'])):
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
					$course_type_true = $_POST['course-type-true'];
					$course_type_false = $_POST['course-type-false'];
					

					// Enter the new user in the database
					$query = $conn->query("UPDATE tblCourses SET CourseID, points, subject, StartDate, startTime, endDate, endTime, instructor, resources, location, description) VALUES ('111', '$points', '$start_date', '$start_time', '$end_date', '$instructor', '$resources', '$location ', '$description')");
					//place an if to make sure it runs
					endif;
?>
					<form method="POST" action="index.php" role="form" class="form-hoizontal">
						<input type="hidden" name="add-course" value="1">
						<label for="instructor">
							<span>What is the email address of the instructor?</span>
							<input type="email" name="instructor" id="instructor" required="required" value="<?php echo $_POST['first_name']; ?>" autofocus>
						</label>
						<br>
						<label for="title">
							<span>What is the title of the course?</span>
							<input type="text" name="title" id="title" required="required" placeholder="Microsoft Excel Basics">
						</label>
						<br>
						<label for="category">
							<span>What is the category of this course?</span>
							<input type="text" name="category" id="category" required="required" placeholder="Computer Technology">
						</label>
						<br>
						<label for="location">
							<span>Where is it located?</span>
							<input type="text" name="location" id="location" required="required" placeholder="SGC 56">
						</label>
						<br>
						<label for="points">
							<span>How many points is it worth?</span>
							<input type="number" name="points" id="points" required="required" placeholder="2">
						</label>
						<br>
						<label for="start-date">
							<span>What date does it begin?</span>
							<input type="date" name="start-date" required="required" id="start-date">
						</label>
						<br>
						<label for="start-time">
							<span>What time of the day does it begin?</span>
							<input type="time">
						</label>
						<br>
						<label for="end-date">
							<span>What date does it end?</span>
							<input type="date" name="end-date" id="end-date">
						</label>
						<br>
						<label for="end-time">
							<span>What time of the day does it end?</span>
							<input type="time" name="end-time" id="end-time">
						</label>
						<br>
						<label for="resources">
							<span>What other resources are available for this course?</span>
							<textarea name="resources" id="resources"
									  placeholder="Limitations, web links, or other special considerations"></textarea>
						</label>
						<br>
						<label for="description">
							<span>Give a detailed description of the course.</span>
							<textarea name="description" id="description"></textarea>
						</label>
						<br>
						<span>Is this an online course?</span>
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
		
		
		<!-- drop course form -->
		<div id="dropCourse" class="tabcontent">
		  <h3>Drop Course</h3>
		  <p>
			<table class="table table-striped table-hover ">
				<thead>
					<tr>
						<th>Course ID</th>
						<th>Course Title</th>
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
							<td>'; echo $r->CourseID, '</td>
							<td>'; echo "<a href='courses_description.php?CID=$r->CourseID'>$r->subject</a>", '</td>
							<td>'; echo date_format($stDate, "m-d-Y"), '</td>
							<td>'; echo $r->startTime, '</td>
							<td>'; echo $r->category, '</td>
							<td>'; echo $r->instructor, '</td>
							<td>'; echo $r->location, '</td>
							<td>'; echo "<a href='courseDrop.php?CID=$r->CourseID'>Drop Course</a>", '</td>
						</tr></tbody>';

					}
				?>
			</table>
		  </p>
		</div>
		
		<script>
		// Get the element with id="defaultOpen" and click on it
		document.getElementById("defaultOpen").click();
		</script>
	<div class="container">
	</body>
</html>
