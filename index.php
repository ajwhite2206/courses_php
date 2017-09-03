<?php
/* $bits = 8 * PHP_INT_SIZE;
echo "(Info: This script is running as $bits-bit.)\r\n\r\n";
 */
 
$connStr = 
        'odbc:Driver={Microsoft Access Driver (*.mdb, *.accdb)};' .
        'Dbq=C:\\wamp\\www\\database\\course.mdb;';

$dbh = new PDO($connStr);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/* if($dbh)
{
	echo "connected";
}
else
{
	echo "Failed";
} */

$sql = 
        "SELECT subject, points, startDate, startTime, category, instructor, location FROM tblCourses WHERE startDate > #1/1/2017#"; 

$sth = $dbh->prepare($sql);

$sth->execute();

//print("Fetch all of the remaining rows in the result set:\n");
$result = $sth->fetchAll();
//print_r($result);



while($result)
{
	echo "<td>".$result[0]."</td>";
	echo "<td>".$result[1]."</td>";
	echo "<td>".$result[2]."</td>";
	echo "<td>".$result[3]."</td>";
	echo "<td>".$result[4]."</td>";
}

?>

<html> <head> </head>

<body>

<tr>
	<th>Course Title</th>
	<th>Points</th>
	<th>Date</th>
	<th>Time</th>
	<th>Category</th>
	<th>Instructor</th>
	<th>Location</th>
</tr>





</body>

</html>
