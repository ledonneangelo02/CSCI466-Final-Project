<?php
function getArtistName($PDO, $artist_id) {
	$result = $PDO->query("SELECT * FROM `Artist` WHERE `ID` = '$artist_id';");
	$row = $result->fetch(PDO::FETCH_ASSOC);
	$artist_name = $row['Name'];
	return $artist_name;
}
function getSongName($PDO, $song_id) {
	$result = $PDO->query("SELECT * FROM `Song` WHERE `ID` = '$song_id';");
	$row = $result->fetch(PDO::FETCH_ASSOC);
	$song_name = $row['Name'];
	return $song_name;
}
function getRoleName($PDO, $role_id) {
	$result = $PDO->query("SELECT * FROM `Role` WHERE `ID` = '$role_id';");
	$row = $result->fetch(PDO::FETCH_ASSOC);
	$role_name = $row['RoleType'];
	return $role_name;
}

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
			if ($count % 3 == 0)
			{
				echo "<div class='row'>";
			}
			?>
		
				<div class="col">
					<div class="card m-2" style="min-height:760px;">
						<img src="<?php echo $row['Song.CoverArt']; ?>" class="card-img-top" alt="<?php echo $row['Artist.Name']; ?>">
						
						<div class="card-body d-flex flex-column">
							<h5 class="card-title" style=""><?php echo $row['Song.Name']; ?></h5>
							<p class="card-text">Performed by: <?php echo $row['Artist.Name']; ?></p>
							<div class="mt-auto mx-auto">
								<form method="POST" action="">
									<label class="form-label">Select Your Queue Options</label>
									<div class="input-group mb-3 align-self-end">
										<span class="input-group-text" id="basic-addon1">Person</span>
										<select name="Client" class="form-select" aria-label="Default select example">
										<?php
										$resultB = $PDO->query("SELECT * FROM `Person`;");
										while ($rowB = $resultB->fetch(PDO::FETCH_ASSOC)) {
											?>
											<option value="<?php echo $rowB['ID']; ?>"><?php echo $rowB['FirstName'] . " " . $rowB['LastName'];?></option> 	
										<?php
										}	
										?>
										</select>
									</div>
									<div class="input-group mb-3">
										<span class="input-group-text" id="basic-addon1">Karaoke</span>
										<select name="KFile" class="form-select" aria-label="Default select example">
											<?php
											$songID = $row['Song.ID'];
											$resultC = $PDO->query("SELECT * FROM AssociatedWith, Artist WHERE `SongID` = '$songID' AND ArtistID = Artist.ID");
											$selections = array();
											while ($rowC = $resultC->fetch(PDO::FETCH_ASSOC))
											{
												$selections[$rowC["KarFileID"]][] = $rowC["Name"];
											}

											foreach ($selections as $keyC=>$selC)
											{
												echo "<option value=\"$keyC\">";
												$m = count($selC);
												$i = 0;
												foreach ($selC as $artistC)
												{
													echo $artistC;
													if ($i < $m-1)
														echo " & ";
													$i++;
												}
												echo "</option>";
											}
											?>
										</select>
									</div>
									<div class="input-group mb-3">
										<input type="submit" name="freeQ" value="Free Queue" class="btn btn-outline-primary"/>
										
									</div>
									<div class="input-group mb-3">	
										<input type="submit" name="paidQ" value="Priority Queue" class="btn btn-outline-primary"/>
										<span class="input-group-text" id="basic-addon1"><i class="bi bi-currency-bitcoin"> </i></span>
										<input type="text" class="form-control" placeholder="BTC" name="price">
									</div>
									<input type="hidden" name="ID" value="<?php echo $row['Song.ID']; ?>">
								</form>
							</div>
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


function displaySongTable($PDO, $result, $search_string) {
	?>
	<table class="table table-dark">
		<tr>
			<td></td>
			<?php
			if (isset($_GET["sort_song"])) {
				$value = $_GET["sort_song"];
				$opposite = ($value == 1) ? 0 : 1;
				echo "<td><a href='user.php?search=" . $search_string . "&sort_song=" . $opposite . "'>Song Name</a></td>";
				}
			else {
				echo "<td><a href='user.php?search=" . $search_string . "&sort_song=0'>Song Name</a></td>";
			}

			if (isset($_GET["sort_artist"])) {
				$value = $_GET["sort_artist"];
				$opposite = ($value == 1) ? 0 : 1;
				echo "<td><a href='user.php?search=" . $search_string . "&sort_artist=" . $opposite . "'>Artist Name</a></td>";
				}
			else {
				echo "<td><a href='user.php?search=" . $search_string . "&sort_artist=0'>Artist Name</a></td>";
			}
			if (isset($_GET["sort_genre"])) {
				$value = $_GET["sort_genre"];
				$opposite = ($value == 1) ? 0 : 1;
				echo "<td><a href='user.php?search=" . $search_string . "&sort_genre=" . $opposite . "'>Genre</a></td>";
				}
			else {
				echo "<td><a href='user.php?search=" . $search_string . "&sort_genre=0'>Genre</a></td>";
			}
			?>
			<td>Contributors</td>
			<td>Queue</td>
		</tr>	
		<?php
		$results = $result;
		foreach ($results as $row) {
			$songID = $row['Song.ID'];
			?>
			<tr>
				<form method="POST" action=""> 
				<td><img src="<?php echo $row['Song.CoverArt']; ?>" height=160px/></td>
				<td><?php echo $row['Song.Name']; ?></td>
				<td><?php echo $row['Artist.Name'] ?></td>
				<td>
				<?php echo $row['Song.Genre']; ?>
				</td>
				<td>
					<?php
					$resultA = $PDO->query("SELECT * FROM Contributes WHERE `SongID` = '$songID' AND `RoleID` != '1'");
						while ($rowA = $resultA->fetch(PDO::FETCH_ASSOC)) {
							echo getArtistName($PDO, $rowA['ArtistID']) . " (" . getRoleName($PDO, $rowA['RoleID']) . ") </br>";
						}
					?>	
				</td>
				<td>
					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">User</span>
						<select name="Client" class="form-select" aria-label="Default select example">
							<?php
							$resultB = $PDO->query("SELECT * FROM `Person`;");
							while ($rowB = $resultB->fetch(PDO::FETCH_ASSOC)) {
								?>
								<option value="<?php echo $rowB['ID']; ?>"><?php echo $rowB['FirstName'] . " " . $rowB['LastName'];?></option> 	
								<?php }	?>
							</select>
						</div>
						<div class="input-group mb-3">
							<span class="input-group-text" id="basic-addon1">Karaoke</span>
							<select name="KFile" class="form-select" aria-label="Default select example">
								<?php
							$resultC = $PDO->query("SELECT * FROM AssociatedWith, Artist WHERE `SongID` = '$songID' AND ArtistID = Artist.ID");
							$selections = array();
							while ($rowC = $resultC->fetch(PDO::FETCH_ASSOC)) {
								$selections[$rowC["KarFileID"]][] = $rowC["Name"];
							}
							foreach ($selections as $keyC=>$selC) {
								echo "<option value=\"$keyC\">";
								$m = count($selC);
								$i = 0;
								foreach ($selC as $artistC) {
									echo $artistC;
									if ($i < $m-1)
									echo " & ";
									$i++;
								}
								echo "</option>";
							}
							?>
						</select>
					</div>
					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1"><i class="bi bi-currency-bitcoin"> </i></span>
						<input type="text" class="form-control" placeholder="BTC" name="price">
					</div>
					<div class="input-group mb-3">
						<span class="input-group-text" id="basic-addon1">Queue Type</span>
						<input type="submit" name="paidQ" value="Paid" class="btn btn-outline-primary"/>
						<input type="submit" name="freeQ" value="Free" class="btn btn-outline-primary">
					</div>
				</td>
				<input type="hidden" name="ID" value="<?php echo $row['Song.ID']; ?>">
				</form>
			</tr>		
			<?php } ?>
	</table>
	

<?php
}
/*function getArtistName($PDO, $artist_id) {
	$result = $PDO->query("SELECT * FROM `Artist` WHERE `ID` = '$artist_id';");
	$row = $result->fetch(PDO::FETCH_ASSOC);
	$artist_name = $row['Name'];
	return $artist_name;
}*/
/*function getSongName($PDO, $song_id) {
	$result = $PDO->query("SELECT * FROM `Song` WHERE `ID` = '$song_id';");
	$row = $result->fetch(PDO::FETCH_ASSOC);
	$song_name = $row['Name'];
	return $song_name;
}*/
/*
function getRoleName($PDO, $role_id) {
	$result = $PDO->query("SELECT * FROM `Role` WHERE `ID` = '$role_id';");
	$row = $result->fetch(PDO::FETCH_ASSOC);
	$role_name = $row['RoleType'];
	return $role_name;
}*/

