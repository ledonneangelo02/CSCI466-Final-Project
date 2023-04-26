
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

		<?php 
		include "components/navbar.php";
		
		//Testing Area
		echo "<br><br><br><br>POST dump<br>";
		var_dump($_POST);
		?>
		
		<!-- Autocomplete
		 <div class="list-group" id="search-results">
		 	Autocomplete...
 
        </div>
		-->

    	<h2>Search Results</h2>
    	<div class="container-md">	
		<?php
		$result = $PDO->query("SELECT * FROM `Song`;");
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$songID = $row['ID'];
			$mainArtist = getSongArtist($PDO, $songID);
		?>
			<form action="" method="POST">
				<div class="card-deck">
					<div class="card" style="width:33%;min-height:680px; float: left; margin: 0 auto; text-align: center;">
  						<img src="<?php echo $row['CoverArt']; ?>" class="card-img-top" alt="<?php echo $row['MainArtist']; ?>">
  						<div class="card-body">
    					<h5 class="card-title" style=""><?php echo $row['Name']; ?></h5>
    					<p class="card-text">Performed by: <?php echo $mainArtist; ?></p>
    					User:<br>
    					<select name="Client">
    						<?php
    						$resultB = $PDO->query("SELECT * FROM `Person`;");
								while ($rowB = $resultB->fetch(PDO::FETCH_ASSOC)) {
									?>
									<option value="<?php echo $rowB['ID']; ?>"><?php echo $rowB['FirstName'] . " " . $rowB['LastName'];?></option> 	

								<?php
								}	
    							?>
    						
    					</select>
    					<br>
    					Karaoke File:<br>
    					<select name="KFile">
    						<?php
    						$resultC = $PDO->query("SELECT * FROM `AssociatedWith` WHERE `SongID` = '$songID';");
    							$version = 0;
								while ($rowC = $resultC->fetch(PDO::FETCH_ASSOC)) {
									$version++;
									?>
									<option value="<?php echo $rowC['KarFileID']; ?>">Version <?php echo $version; ?></option> 	

								<?php
								}	
    							?>
    						
    					</select>
    					<br>
    					<input type="hidden" name="ID" value="<?php echo $songID; ?>">
    					<input type="submit" name="freeQ" class="btn btn-primary" value="Free Queue">&nbsp;&nbsp;<input type="submit" name="paidQ" class="btn btn-success" value="Paid Queue">	
  					</div>
				</div>
			</form>
		<?php
		}
		?>
	
		</div>
		<div style="clear:both;">
		</div>	

		


		<?php include "components/footer.php" ?>
	</body>
</html>
