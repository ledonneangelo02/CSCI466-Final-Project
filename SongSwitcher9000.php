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
	$results = databaseEstablishConnection($database, $username, $password);

	// Define $PDO if we have a connection, otherwise show an error.
	if ($results["conn_stat"] == true)
	{
		$PDO = $results["res"];
	}
	else
	{
		echo "<p>" . "Connection failed: " . $results["res"] . "</p>";
	}

	
	if(!empty($_POST['ID'])){
		
		$QueID = $_POST['ID'];
		$Test1 = $PDO->exec("UPDATE Queue SET Status=2 WHERE Status=1;");
		if($QueID == '0'){

			$Test2 = $PDO->exec("UPDATE Queue SET Status=1 WHERE ID = (SELECT MIN(ID) FROM QUEUE);");
		
		}else{
			$Test2 = $PDO->exec("UPDATE Queue SET Status=1 WHERE ID=$QueID;");
		}
		echo json_encode(array('message' => 'Data receieved Successfully'));
	}
?>

	
<script>		
	function checkEndSong
</script>

