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

?>
<!doctype html>
<html data-bs-theme="dark">
	<head>
		<title>CSCI 466 Group Project</title>

		<!-- Bootstrap CSS/JS Framework -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
		rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
		crossorigin="anonymous"/>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
		crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

	</head>
	<body>

		<?php include "components/navbar.php"; ?>
		<?php include "components/activeplayer.php"; ?>

		<?php
		$PaidQueueFinderBoi = "SELECT Queue.AmountPaid, Person.FirstName 'Singer', Song.Name 'Song Title', Artist.Name 'Main Artist', KaraokeFile.ID 'KarFileID', Queue.ID, Song.CoverArt FROM Song, Queue, Enqueues, Artist,AssociatedWith, Contributes, Person, Role, KaraokeFile WHERE Song.ID = Contributes.SongID AND Song.ID = AssociatedWith.SongID AND Person.ID = Enqueues.PersonID AND KaraokeFile.ID = AssociatedWith.KarFileID AND KaraokeFile.ID = Enqueues.KarFileID AND Queue.ID = Enqueues.QueueID AND Artist.ID = AssociatedWith.ArtistID AND Artist.ID = Contributes.ArtistID AND Queue.IsPaid = 'Y' GROUP BY Queue.ID;";
		$FreeQueueFinderBoi = "SELECT Person.FirstName 'Singer', Song.Name 'Song Title', Artist.Name 'Main Artist', KaraokeFile.ID 'KarFileID', Queue.ID, Song.CoverArt FROM Song, Queue, Enqueues, Artist,AssociatedWith, Contributes, Person, Role, KaraokeFile WHERE Song.ID = Contributes.SongID AND Song.ID = AssociatedWith.SongID AND Person.ID = Enqueues.PersonID AND KaraokeFile.ID = AssociatedWith.KarFileID AND KaraokeFile.ID = Enqueues.KarFileID AND Queue.ID = Enqueues.QueueID AND Artist.ID = AssociatedWith.ArtistID AND Artist.ID = Contributes.ArtistID AND Queue.IsPaid = 'N' GROUP BY Queue.ID;";
		?>

		<div class="container-md">
				<div class="row">

			<!-- Priority Queue Table -->
			<h2 class="display-3">Priority Paid Queue</h2>
			<table class="table">
				<thead>
					<tr>
						<th>&nbsp;</th>
						<th><i class="bi bi-currency-bitcoin"></i> Price</th>
						<th>Singer</th>
						<th>Song</th>
						<th>Q-ID</th>
						<th>K-ID</th>
					</tr>
				</thead>
				<tbody>
					   <?php 
						   include "functions.php";

					   	   $prepared = $PDO->prepare($PaidQueueFinderBoi);
							  $succ = $prepared->execute();
						   while($row = $prepared->fetch(PDO::FETCH_BOTH)){
						   
							echo "<tr>";
						   	echo "<td><img src=\"".$row["CoverArt"]."\" height=100px/></td>";
						   	echo "<td>$row[0]</td>";
						   	echo "<td>$row[1]</td>";
						   	echo "<td>$row[2]</br><i>Artist: $row[3]</i></td>";
						   	echo "<td>".$row["ID"]."</td>";
						   	echo "<td>$row[4]</td>";
							echo "</tr>";
							
						   }
					?>
				</tbody>
			</table>
			
			<!-- End Priority Queue Table -->
		</div>


		<div class="container-md">				
			<!-- Free Queue Table -->
			<h2 class="display-3">Free Queue</h2>
			<table class="table">
			<thead>
				<tr>
				 <th>&nbsp;</th>
				 <th>Singer</th>
				 <th>Song</th>
				 <th>Q-ID</th>
				 <th>K-ID</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				   $prepared = $PDO->prepare($FreeQueueFinderBoi);
						  $succ = $prepared->execute();
				   while($row = $prepared->fetch(PDO::FETCH_BOTH)){
					   echo"<tr>";
					   echo "<td><img src=\"".$row["CoverArt"]."\" height=100px/></td>";
					   echo "<td>$row[0]</td>";
					   echo "<td>$row[1]</br><i>Artist: $row[2]</i></td>";
					   echo "<td>".$row["ID"]."</td>";
					   echo "<td>$row[3]</td>";
						  echo"</tr>";			   
				   }
				?>
			</tbody>
			</table>
			<!-- End Free Queue Table -->
		</div>

		<?php include "components/footer.php" ?>

	</body>
</html>
