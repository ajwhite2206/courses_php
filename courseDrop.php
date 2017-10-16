<!DOCTYPE html>
<html>

<?php 
include("includes/header.php"); 
include 'datalogin.php';
if(!($_SESSION['email'])){
		header("Location: login.php");
	} 
?>

<body>

	<?php
	#$date = $_POST['date'];
	$cid = intval($_GET['CID']);
	$userEmail = $_SESSION['email'];
	$qCheck = $conn->query("DELETE FROM tblCourses WHERE courseID = $cid");

	//Check if already registered.
	if($qCheck){
		print("Course has been removed.");
	} else{
		$query = $conn->query("INSERT INTO registration (courseID, email) VALUES('$cid', '$userEmail')");
		print("There has been an error with your request.");
	}
	
	?>


</body>

</html>