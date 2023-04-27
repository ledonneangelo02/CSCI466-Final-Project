<?php

function getSongArtist($PDO, $song_id) {

$result = $PDO->query("SELECT * FROM `AssociatedWith` WHERE `SongID` = '$song_id';");
$row = $result->fetch(PDO::FETCH_ASSOC);
if ($row) {
	$artist_id = $row['ArtistID'];
	$resultB = $PDO->query("SELECT * FROM `Artist` WHERE `ID` = '$artist_id';");
	$rowB = $resultB->fetch(PDO::FETCH_ASSOC);
	$artist_name = $rowB['Name'];
	return $artist_name;
	}
else 
	return "Could not find artist";
}

function displaySongs($PDO, $result) {
	?>

	<div class="card-deck m-3">

	<?php
		$count = 0;
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$songID = $row['ID'];
			$mainArtist = getSongArtist($PDO, $songID);

			if ($count % 3 == 0)
			{
				echo "<div class='row'>";
			}
			?>
		
				<div class="col">
				<div class="card m-2" style="min-height:700px;">
					<img src="<?php echo $row['CoverArt']; ?>" class="card-img-top" alt="<?php echo $row['MainArtist']; ?>">
					
					<div class="card-body">
						<form action="" method="POST">
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
						</form>
					</div>
				</div>
				</div>
		
		<?php
			if ($count % 3 == 2)
			{
				echo "</div>";
			}
			$count++;
		}
		?>

	</div>
	<?php
}



function displaySongsFormless($PDO, $result) {
	?>

	<div class="card-deck m-3">

	<?php
		$count = 0;
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$songID = $row['ID'];
			$mainArtist = getSongArtist($PDO, $songID);

			if ($count % 3 == 0)
			{
				echo "<div class='row'>";
			}
			?>
		
				<div class="col">
				<div class="card m-2" style="min-height:560px;">
					<img src="<?php echo $row['CoverArt']; ?>" class="card-img-top" alt="<?php echo $row['MainArtist']; ?>">
					
					<div class="card-body">
						<form action="" method="POST">
							<h5 class="card-title" style=""><?php echo $row['Name']; ?></h5>
							<p class="card-text">Performed by: <?php echo $mainArtist; ?></p>
						</form>
					</div>
				</div>
				</div>
		
		<?php
			if ($count % 3 == 2)
			{
				echo "</div>";
			}
			$count++;
		}
		?>

	</div>
	<?php
}
?>

<!--
IGNORE THIS:
IGNORE THIS:
IGNORE THIS:
IGNORE THIS:
				<div class="card">
					<img src="<?php echo $row['CoverArt']; ?>" class="card-img-top" alt="<?php echo $row['MainArtist']; ?>">
					
					<div class="card-body">
						<form action="" method="POST">
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
						</form>
					</div>
				</div>











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
			

-->