<?php
	include("datalogin.php");
	include("includes/header.php");
	session_start();
	if (empty($_SESSION)){
		header("Location: index.php");
	}


	$courseID = $_REQUEST['CID'];

?>
<div class="container">
	<form method="POST" action="surveycomplete.php" role="form" class="form-hoizontal">
		<fieldset>


			<legend>Survey</legend>
			<div class="form-group">
				<input type="hidden" name="CID" id="CID" value="<?php echo $_REQUEST['CID'];?>" />
				<input type="hidden" name="post-feedback" value="1">

					<legend>When did you take the course?</legend>
					<label for="date">
						<input type="date" id="date" name="date" required="required">
					</label>

					<legend>Please rate this course with 1 being the lowest and 5 being the highest.</legend>
					<label for="rating" required="required">
						<select name="rating" id="rating">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
						</select>
					</label>

					<legend>Would you recommend this course to a friend?</legend>
					<label for="recommend-yes">
						<input type="radio" name="recommend" id="recommend-yes" value="true">
						Yes
					</label>

					<label for="recommend-no">
						<input type="radio" name="recommend" id="recommend-no" value="false">
						No
					</label>


					<legend>Please leave comments below.</legend>
					<textarea name="comment" id="comment"></textarea>

					<br>

					<div class="form-group">
					  <div class="col-lg-10 col-lg-offset-2">
						<button type="reset" class="btn btn-default">Cancel</button>
						<button type="submit" class="btn btn-primary">Submit</button>
					  </div>
					</div>

			</div>
		</fieldset>
	</form>
</div>
