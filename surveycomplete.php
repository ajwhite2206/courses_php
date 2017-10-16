<?php
	include("includes/header.php");

	/*if( isset($_SESSION['email']) ){ //may not need this waiting on response from amjad
		//header("Location: index.php");
}*/

	//values coming in from survey.php
	$date =  $_POST['date'];
	$rating = $_POST['rating'];
	$recommend = $_POST['recommend'];
	$comment = $_POST['comment'];
	$courseID = $_POST['CID'];
	$userID = $_SESSION['email'];

	// submitting user evaluation to database
?>

<html>
<?php

	$query = $conn->query("INSERT INTO evaluation (CourseID, Email, submissionDate, Question1, Question2, Question3, Question4) VALUES ('$courseID', '$userID', date(), '$date', '$rating', '$recommend', '$comment');");
	if($query){
		echo "Your submission was successful, thank you.";
	} else {
		echo "There was an error with your submission.";
	}
?>

</html>
