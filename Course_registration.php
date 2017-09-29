<!DOCTYPE html>
<html>

<?php 
include("includes/header.php"); 
include 'datalogin.php';	
?>

<body>

	<?php
	$cid = $_GET['CID'];
	$userEmail = $_SESSION['email'];
	##$date = $_POST['date'];
	$query = $conn->query("INSERT INTO registration (CourseID, email) VALUES('$cid', '$userEmail')");
	##$r = $query->fetch(PDO::FETCH_OBJ);
	?>

<p>Successfully registered to this course.</p>


</body>

</html>