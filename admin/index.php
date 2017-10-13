<?php
  include("../includes/header.php");

if( isset($_SESSION['email']) ){
	//header("Location: index.php");
}

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

/* include("_header.php");  NOT OF USE TO USE CURRENTLY  */?>
    <div class="container">
    <form method="POST" action="survey.php" role="form" class="form-hoizontal">
    <fieldset>


    <legend>Add Course</legend>
    <section class="c-content box spill-left clear u-min-height">

        <h1>Add A New Course</h1>

        <form method="post" action="?page=add-course">
            <input type="hidden" name="add-course" value="1">
            <label for="instructor">
                <span>What is the email address of the instructor?</span>
                <input type="email" name="instructor" id="instructor" placeholder="instructor@lcsc.edu" autofocus>
            </label>
            <br>
            <label for="title">
                <span>What is the title of the course?</span>
                <input type="text" name="title" id="title" placeholder="Microsoft Excel Basics">
            </label>
            <br>
            <label for="category">
                <span>What is the category of this course?</span>
                <input type="text" name="category" id="category" placeholder="Computer Technology">
            </label>
            <br>
            <label for="location">
                <span>Where is it located?</span>
                <input type="text" name="location" id="location" placeholder="SGC 56">
            </label>
            <br>
            <label for="points">
                <span>How many points is it worth?</span>
                <input type="number" name="points" id="points" placeholder="2">
            </label>
            <br>
            <label for="start-date">
                <span>What date does it begin?</span>
                <input type="date" name="start-date" id="start-date">
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

    
  
    </div>
