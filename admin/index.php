<?php
    include("../includes/header.php");
     if( isset($_POST['submit']) ) {
    // Enter the course
    $stmt = $conn->prepare("INSERT INTO tblCourses (CourseID, points, subject, startDate, startTime, endDate, endTime, instructor, resources, location, description) VALUES ('1596', :points, :title, :start_date, :start_time, :end_date, :instructor, :resources, :location, :description)");

    $stmt->bindParam(':points', $_POST['points']);
    $stmt->bindParam(':subject', $_POST['title']);
    $stmt->bindParam(':StartDate', $_POST['start-date']);
    $stmt->bindParam(':startTime', $_POST['start-time']);
    $stmt->bindParam(':endDate', $_POST['end-date']);
    $stmt->bindParam(':endTime', $_POST['end-time']);
    $stmt->bindParam(':resources', $_POST['resources']);
    $stmt->bindParam(':description', $_POST['description']);

    $stmt->execute();

}
	
?>
    <div class="container">

    <fieldset>


    <legend>Add Course</legend>
    <section class="c-content box spill-left clear u-min-height">

        <h1>Add A New Course</h1>

        <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" role="form" class="form-hoizontal">
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
