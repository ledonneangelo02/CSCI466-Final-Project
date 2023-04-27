
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
	}	
	include "functions.php";
	include "postman.php";
?>

<html data-bs-theme="dark">
	<head>
		<title>CSCI 466 Group Project - User Page</title>

		<!-- CSS Include -->
		<link rel="stylesheet" href="assets/styles.css">

		<!-- Bootstrap CSS/JS Framework -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
		rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
		crossorigin="anonymous"/>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
		crossorigin="anonymous"></script>


		<!-- JavaScript Includes -->
		<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
		<script src="assets/script.js"></script>

	</head>
	<body>

		<?php include "components/navbar.php"; ?>
		
		<?php
		//Testing Area
		echo "POST dump<br>";
		var_dump($_POST);
		?>
		
		<!-- Autocomplete
		 <div class="list-group" id="search-results">
		 	Autocomplete...
 
        </div>
		-->

		<?php

		if (isset($search_string)) 
			echo "<h2>Search Results</h2>";
		if (isset($search_song)) {
			echo "<h3>Song Search</h3>";
			displaySongs($PDO, $search_song);
			}
			?>
			<div style="clear:both;">
			</div>
		<?php	
		if (isset($search_artist)) {
			echo "<h3>Artist Search</h3>";
			displaySongs($PDO, $search_artist);
			}
			?>
			<div style="clear:both;">
			</div>	
			
	

    	<h2>Browse Songs</h2>
    	<div class="container-md">
			<?php
			$result = $PDO->query("SELECT * FROM `Song`;");
			displaySongs($PDO, $result);
			?>
		</div>
		<div style="clear:both;"></div>	

		<?php include "components/footer.php" ?>
	</body>
</html>
