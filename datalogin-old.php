<?php
$server = 'localhost';
$username = 'root';
$password = 'root';
$database = 'auth';

//$connStr =  "odbc:DRIVER={Microsoft Access Driver (*.mdb, *.accdb)}; DBQ=C:\\xampp\\htdocs\\course.mdb;";
$connStr =  "odbc:DRIVER={Microsoft Access Driver (*.mdb)}; DBQ=C:\\wamp\\www\\new-php\\db\\course.mdb;";


try{
	$conn = new PDO($connStr);
} catch(PDOException $e){
	die( "Connection failed: " . $e->getMessage());
}

?>
