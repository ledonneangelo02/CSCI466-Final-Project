
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
<!doctype html>
<html data-bs-theme="dark">
	<head>
		<title>CSCI 466 Group Project - User Page</title>


		<!-- Bootstrap CSS/JS Framework -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
		rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
		crossorigin="anonymous"/>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
		crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">


		<!-- JavaScript Includes -->
		<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
	

	</head>
<?php 

include "components/navbar.php"; 


?>
	




	<body>
		<?php
		if ($danger==1) {
		?>
  		<div class="alert alert-danger alert-dismissible fade show" role="alert">
  		<strong>Error: </strong><?php echo $danger_message; ?> 
  		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		<?php } ?>  

		<?php
		if ($warning==1) {
		?>
  		<div class="alert alert-warning alert-dismissible fade show" role="alert">
  		<strong>Warning: </strong><?php echo $warning_message; ?> 
  		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		<?php } ?> 


		<?php
		if ($success==1) {
		?>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
  		<strong>Success: </strong><?php echo $success_message; ?> 
  		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		<?php } ?> 


		<?php

		if ($search_string != "")
			echo "<div class=\"container-md\">";
		if ($search_string != "") 
			echo "<h3 class='display-3 text-center'>Search Results</h3>";

		if (isset($search_song) && count($search_song) != 0) {
			echo "<h4 class='display-4 text-center'>Song Search</h4>";
			displaySongTable($PDO, $search_song, $search_string);
		}
	
		if (isset($search_artist) && count($search_artist) != 0) {
			echo "<h4 class='display-4 text-center'>Artist Search</h4>";
			displaySongTable($PDO, $search_artist, $search_string);
		}

		if (isset($search_genre) && count($search_genre) != 0) {

			echo "<h4 class='display-4 text-center'>Genre Search</h4>";
			displaySongTable($PDO, $search_genre, $search_string);
		}
		if ($search_string != "")
			echo "</div>";
		?>
			
	

		<div class="container-md">
			<h3 class="display-3 text-center">Song Catalog Browser</h3>
			<?php
			$sql = "SELECT Song.ID 'Song.ID',Artist.ID 'Artist.ID',Song.Name 'Song.Name',Artist.Name 'Artist.Name',Song.Genre 'Song.Genre',Song.CoverArt 'Song.CoverArt' FROM Song,Artist,Contributes WHERE Song.ID = Contributes.SongID AND Artist.ID = Contributes.ArtistID AND Contributes.RoleID = 1;";
			$result = $PDO->query($sql);
			displaySongs($PDO, $result);
			?>
		</div>

		<?php include "components/footer.php" ?>
	</body>
</html>
