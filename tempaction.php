<?php  
//action.php

$input = filter_input_array(INPUT_POST);

$first_name = mysqli_real_escape_string($connect, $input["first_name"]);
$last_name = mysqli_real_escape_string($connect, $input["last_name"]);

include("includes/header.php"); 
include 'datalogin.php';
$query = $conn->query('SELECT * FROM tblCourses WHERE startDate > #1/1/2017#');


if($input["action"] === 'edit')
{
 $done = $conn->query("
 UPDATE tblCourses 
 SET subject = '".$subject."', 
 points = '".$points."' 
 WHERE CourseID = '".$input["CourseID"]."'
 ");

 //mysqli_query($connect, $query);

}
if($input["action"] === 'delete')
{
 $done = $conn->query("
 DELETE FROM tblCourses 
 WHERE CourseID = '".$input["CourseID"]."'
 ");
 //mysqli_query($connect, $query);
}

echo json_encode($input);

?>