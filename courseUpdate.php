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
	$cid = intval($_GET['CID']);
	$qCheck = $conn->query("SELECT * tblCourses WHERE courseID = $cid");
	$r = $qCheck->fetch(PDO::FETCH_OBJ);
	//Check if already registered.
	if($r){
		print("This is right");
	} else{
		print("Something is amiss");
	}
	
	?>


</body>

</html>