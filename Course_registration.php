<!DOCTYPE html>
<html>

<?php 
include("includes/header.php"); 

if(!($_SESSION['email'])){
		header("Location: login.php");
	} 
?>

<body>

	<?php
	#$date = $_POST['date'];
	$cid = intval($_GET['CID']);
	$userEmail = $_SESSION['email'];
	$qCheck = $conn->query("SELECT count(courseID) as idCount FROM registration WHERE courseID = $cid AND email = '$userEmail'");
	$qCheck->execute();
	$checkClass = $qCheck->fetch(PDO::FETCH_ASSOC);
	//Check if already registered.
	if((int)$checkClass['idCount'] > 0){
		print("You are already registered to this course");
	} else{
		$query = $conn->query("INSERT INTO registration (courseID, email) VALUES('$cid', '$userEmail')");
		print("You are now registered to this course");
	}
	
	?>


</body>

</html>