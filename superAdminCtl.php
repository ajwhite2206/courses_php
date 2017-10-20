<?php
include("datalogin.php");
include("includes/header.php");
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
		  <button class="tablinks" onclick="openCity(event, 'dropCourse')">Edit & Drop Course</button>
		  <button class="tablinks" onclick="openCity(event, 'userPriv')" id="privSubmit">User Priveleges</button>
		</div>

		<!-- add course form -->
		<div id="addCourse" class="tabcontent">
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
							(points, subject, startDate, startTime, endDate, endTime, instructor, resources, location, description, category)
						VALUES
							($points, '$title', #$start_date#, '$start_time', #$end_date#, '$end_time', '$instructor', '$resources', '$location',  '$description', '$category')");
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

		<!-- delete/edit table -->
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
							<th>Delete</th>
							<th>Edit</th>
						</tr>
					</thead>

					<?php
						$query = $conn->query('SELECT * FROM tblCourses WHERE startDate > #1/1/2017#');
						while($r = $query->fetch(PDO::FETCH_OBJ)) {
							if($r->startTime!=Null){
								$stTime = date_create($r->startTime);
							} else {
								$stTime = date_create("00:00");
							}
							
							$stDate = date_create($r->startDate);
							echo '<tbody>
								<tr>
									<td>'; echo $r->CourseID, '</td>
									<td>'; echo "<a href='courses_description.php?CID=$r->CourseID'>$r->subject</a>", '</td>
									<td>'; echo date_format($stDate, "m-d-Y"), '</td>
									<td>'; echo date_format($stTime, "h:i a"), '</td>
									<td>'; echo $r->category, '</td>
									<td>'; echo $r->instructor, '</td>
									<td>'; echo $r->location, '</td>
									<td>'; echo "<a href='courseDrop.php?CID=$r->CourseID'><img src='images/trash.png' alt='trash' height='24' width='24'></a>", '</td>
									<td>'; echo "<a href='courseUpdate.php?CID=$r->CourseID'><img src='images/write.png' alt='trash' height='24' width='24'></a>", '</td>
								</tr>
								</tbody>';

							}
					?>
				</table>
			  </p>
			</div>


		
		<?php
		//if the user has submitted the initial email to the priv form open to the priv form with the info loaded
			if(!empty($_POST['userSubmit'])){
				if($_POST['userPriv']==1){
				$email = $_POST['email']; //keeping this email for as long as we are going through the priv process
				?> 
					<script>
					document.getElementById("privSubmit").click();
					</script>
				<!-- above we are clicking into the priveleges tab, below we are recreating the priv tab but with a loaded form -->
				<div id="userPriv" class="tabcontent">
					<h3>User Priveleges</h3>
						<p>
							<?php //pulling user data to load for viewing
							$query = $conn->query("SELECT * FROM tblStudents WHERE email='$email'");
							while($r = $query->fetch(PDO::FETCH_OBJ)) {
								$userName = $r->name;
								$UID = $r->userID?>
								<span>User Email: </span><?php echo $email; ?><br>
								<span>User Name: </span><?php echo $r->name; ?><br>
								<span>Privelege Level: </span><?php 
									if(($r->admin == 'Y') && ($r->superadmin == 'Y')){
										echo "Super Admin";
									} elseif ($r->admin == 'Y'){
										echo "Admin";
									} else {
										echo "Student";
									}
							}
							// this is where the user will reset privs
							?>
							<form method="post" action="superAdminCtl.php" role="form" class="form-hoizontal">
								<input type="hidden" name="uid" value="<?php echo $UID;?>">
								<input type="hidden" name="userName" value="<?php echo $userName;?>">
								<input type="hidden" name="userPriv" value="2">
								<label for="instructor">
									<input type="radio" name="level" value="superuser"> Super User 
									<input type="radio" name="level" value="admin"> Admin
									<input type="radio" name="level" value="student"> Student
								</label>
								<br>
								<input type="submit" name="userSubmit" value="Update">
							</form>
						</p>
				</div>
				<?php
				} elseif($_POST['userPriv']==2) { //this is entered user has submitted priv change
				?> 
					<script>
					document.getElementById("privSubmit").click();
					</script>
				<?php
					$UID = $_POST['uid']; //keeping this email for as long as we are going through the priv process
					$userName = $_POST['userName'];
					$newlevel = $_POST['level'];
					if($newlevel == "superuser"){
						$query = $conn->query(
						"UPDATE tblStudents 
						SET admin='Y',
						superadmin='Y'
						WHERE userID=$UID");
						echo "Complete";
					} elseif($newlevel == "admin") {
						$query = $conn->query(
						"UPDATE tblStudents 
						SET admin='Y'
						WHERE userID=$UID");
						echo "Complete";
					} elseif($newlevel == "student") {
						$query = $conn->query(
						"UPDATE tblStudents 
						SET admin='N',
						superadmin='N'
						WHERE userID=$UID");
						echo "Complete";
					} else {
						echo "There has been an error with your submission";
					}
					echo '<script type="text/javascript">
					window.location = "superAdminCtl.php"
					</script>';
				}
			} else {
				?>
			<!-- User Priveleges Search -->
				<div id="userPriv" class="tabcontent">
					<h3>User Priveleges</h3>
						<p>
							<form method="post" action="superAdminCtl.php" role="form" class="form-hoizontal">
								<input type="hidden" name="userPriv" value="1">
								<label for="instructor">
									<span>User's Email:</span>
									<input type="text" name="email" id="email" required="required" placeholder="something@lcsc.edu" autofocus>
								</label>
								<br>
								<input type="submit" name="userSubmit">
							</form>

						</p>
				</div>
				<script>
				// Get the element with id="defaultOpen" and click on it
				document.getElementById("defaultOpen").click();
				</script><?php
			}
		
		?>
	<div class="container">
	</body>
</html>
