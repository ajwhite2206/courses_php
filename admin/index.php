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
    <form class="form-horizontal">
  <fieldset>
    <legend>Legend</legend>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Email</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="inputEmail" placeholder="Email">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-10">
        <input type="password" class="form-control" id="inputPassword" placeholder="Password">
        <div class="checkbox">
          <label>
            <input type="checkbox"> Checkbox
          </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Textarea</label>
      <div class="col-lg-10">
        <textarea class="form-control" rows="3" id="textArea"></textarea>
        <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 control-label">Radios</label>
      <div class="col-lg-10">
        <div class="radio">
          <label>
            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
            Option one is this
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
            Option two can be something else
          </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="select" class="col-lg-2 control-label">Selects</label>
      <div class="col-lg-10">
        <select class="form-control" id="select">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
        <br>
        <select multiple="" class="form-control">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>
    
  
    </div>
