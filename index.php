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
	// their own credentials files during development. Create a file called "db_creds"
	// in the "utils" folder and define the username/password variables.
	include "utils/db_init.php";
	include "utils/db_creds.php";
	$results = databaseEstablishConnection("z1836870", $username, $password);

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
