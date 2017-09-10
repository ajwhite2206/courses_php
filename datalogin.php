<?php
				// in order to make it work change the DBQ value to the database path in your machine
				$connStr = "odbc:DRIVER={Microsoft Access Driver (*.mdb, *.accdb)}; DBQ=C:\\wamp\\www\\course_php-master\\database\\course.mdb;";
				try {
					$handler = new PDO($connStr);
					$handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				}
				catch(PDOException $e) {
					echo $e->getMessage();
					die();
				}
				$query = $handler->query('SELECT * FROM tblCourses WHERE startDate > #1/1/2017#');
				$emailquery = $handler->query('SELECT * FROM tblStudents');
				?>