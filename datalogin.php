<?php
$server = 'localhost';
$username = 'root';
$password = 'root';
$database = 'auth';
<<<<<<< HEAD
/*$connStr =  "odbc:DRIVER={Microsoft Access Driver (*.mdb, *.accdb)}; DBQ=C:\\xampp\\htdocs\\course.mdb;";*/
$connStr =  "odbc:DRIVER={Microsoft Access Driver (*.mdb)}; DBQ=C:\\wamp\\www\\new-php\\db\\course.mdb;";
=======
$connStr =  "odbc:DRIVER={Microsoft Access Driver (*.mdb, *.accdb)}; DBQ=C:\\xampp\\htdocs\\course.mdb;";
//$connStr =  "odbc:DRIVER={Microsoft Access Driver (*.mdb, *.accdb)}; DBQ=C:\\wamp\\www\\new-php\\db\\course.mdb;";
>>>>>>> ca82f2cd3c9c128b7a1227c0f946b5e5d8d0b880

try{
	$conn = new PDO($connStr);
} catch(PDOException $e){
	die( "Connection failed: " . $e->getMessage());
}

?>
