<?php

	/**
	 * -------------------------------------------------------------------------
	 * -------------------------------------------------------------------------
	 * 
	 * CSCI 466 Group Project
	 * 
	 * 		Angelo LeDonne
	 * 			z1920784@students.niu.edu
	 * 		Chris Dejong
	 * 			z1836870@students.niu.edu
	 * 		Mark Southwood
	 * 			z058227@students.niu.edu
	 * 		Milad Jizan
	 * 			z1943173@students.niu.edu
	 * 
	 * -------------------------------------------------------------------------
	 * -------------------------------------------------------------------------
	 */

	// Attempt to establish a connection to the database. Each developer must provide
	// their own credentials files during development. See below:
	include "utils/db_init.php";
	$creds = databaseFetchCredentials("utils/creds.ini");
	$results = databaseEstablishConnection("z1836870", $creds["username"], $creds["password"]);

?>

<html>
	<head>
		<title></title>
	</head>
	<body>
		<h1>Hello, world.</h1>
		<?php
			if ($results["conn_stat"] == true)
			{
				echo "<p>" . "Connection successful." . "</p>";
			}
			else
			{
				echo "<p>" . "Connection failed: " . $results["res"] . "</p>";
			}
		?>
	</body>
</html>
