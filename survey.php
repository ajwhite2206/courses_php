<?php

session_start();

if( isset($_SESSION['email']) ){
	//header("Location: index.php");
}

require 'datalogin.php';

$message = '';

if(!empty($_POST['date']) /*&& !empty($_POST['rating']) && !empty($_POST['recommend'])*/):	
	// setting variables for the query
	if($_POST['recommend'] == -1){
		$trueorfalse = 'Yes';
	} else {
		$trueorfalse = 'No';
	}
	
	$date =  $_POST['date'];
	$rating = $_POST['rating'];
	$recommend = $_POST['recommend'];
	$comment = $_POST['comment'];
	

	
	
	// Enter the new user in the database
	$query = $conn->query("INSERT INTO evaluation (CourseID, userID, submissionDate, Question1, Question2, Question3, Question4) VALUES ('111', '111', date(), '$date', '$rating', '$recommend', '$comment')");
/*
	else:
		$message = 'Sorry, there was an error with your submission';
	endif;
		
	echo $message; */

endif;
include("includes/header.html"); 
/* include("_header.php");  NOT OF USE TO USE CURRENTLY  */?>


    <h2>Leave Feedback for <?php /* how is this form connected to the others?? echo $course["subject"]; */ ?></h2>
    <p>Thank you.</p>

    <form method="post" action="survey.php" class="survey">

        <input type="hidden" name="course-id" value="<?php /* again should we use this? echo $course_id;  */?>">
        <input type="hidden" name="post-feedback" value="1">

        <fieldset>
            <legend>When did you take the course?</legend>
            <label for="date">
                <input type="date" id="date" name="date">
            </label>
        </fieldset>

        <fieldset>
            <legend>Please rate this course with 1 being the lowest and 5 being the highest.</legend>
            <label for="rating">
                <select name="rating" id="rating">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </label>
        </fieldset>

        <fieldset>
            <legend>Would you recommend this course to a friend?</legend>
            <label for="recommend-yes">
                <input type="radio" name="recommend" id="recommend-yes" value="true">
                Yes
            </label>

            <label for="recommend-no">
                <input type="radio" name="recommend" id="recommend-no" value="false">
                No
            </label>
        </fieldset>

        <fieldset>
            <legend>Please leave any additional feedback here.</legend>
            <label for="comment">
                <textarea name="comment" id="comment"></textarea>
            </label>
        </fieldset>

        <input type="submit" value="Submit">

    </form>

<?php /* include("_footer.php");  currently not of any use*/?>