<?php

/**
 * Performs the necessary initialization procedure required to connect to MariaDB.
 * Provide a username and password. The resulting return is an associative array
 * that contains the connection status as true/false, and the paired value either
 * being the PDO instance or the error message.
 * 
 * You are guaranteed to receive the PDO if "conn_stat" is true, and an error message
 * string if "conn_stat" is false. The following result is stored as the key "res".
 * 
 * @param database The database you are connecting to.
 * @param username The username to connect with.
 * @param password The password to connect with.
 * 
 * @returns An array containing the results of the connection.
 */


function
databaseEstablishConnection($database, $username, $password)
{

	$results = array();
	$results["conn_stat"] = false;

	try {

		$dsn = "mysql:host=courses;dbname=$database";
		$pdo = new PDO($dsn, $username, $password);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	
		$results["conn_stat"] = true;
		$results["res"] = $pdo;

	}
	catch (PDOexception $e)
	{

		// When in doubt, yeet.
		$results["res"] = $e->getMessage();

	}
	
	return $results;

}

?>
