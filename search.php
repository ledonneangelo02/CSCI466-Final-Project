<?php
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



	if (isset($_POST['query'])) {
    	$searchString = $_POST['query'];
    	$sql = 'SELECT `Name` FROM `Song` WHERE `Name` LIKE :search';
   		$stmt = $PDO->prepare($sql);
    	$stmt->execute(['search' => '%' . $searchString . '%']);
    	$result = $stmt->fetchAll();

    	if ($result) {
      		foreach ($result as $row) {
        	echo "<a href='#' class='list-group-item list-group-item-action border-1'>" . $row['Name'] . "</a>";
      }
    } else {
      echo "<p class='list-group-item border-1'>No Record</p>";
    }
  }	




	}	
?>

