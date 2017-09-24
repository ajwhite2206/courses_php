<?php
	include("header.php");


	function match(){
		if( isset($_SESSION['email']) ){
			$email = $_SESSION['email'];
		}
	
		$emailquery = $conn->query('SELECT email FROM tblStudents;');
		while($r = $emailquery->fetch(PDO::FETCH_OBJ)) {
			$other = (string)($r->email);
			if ($other == $email){
				return true;
		} else {
			return false;
			
		}
	}
}

/*$is_match = match();

if($is_match){
	echo $email;
} else {
	echo 'uses not found';
}
*/

?>