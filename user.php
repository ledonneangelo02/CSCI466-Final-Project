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
?>

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


		<!-- JavaScript Includes -->
		<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	



		<!-- Autocomplete Search -->
		<script>
        $(function() {
            //autocomplete
            $("#song_search").autocomplete({
                source: "search.php",
                minLength: 3
            });                

        });
		</script>

	</head>
	<body>

		<?php include "components/navbar.php";
		echo "POST dump<br>";
		var_dump($_POST);
		?>
		

		<div>
		<form action="" method="POST">
      		<input class="form-control mr-lg-2" type="search" placeholder="Search for anything" id="song_search" aria-label="song_search" name="song_search">
      		<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    	</form> 
    	</div>


    	<br><br><br>
    	<div class="container-md">
			<?php

			$result = $PDO->query("SELECT * FROM `Song`;");
			while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			?>
			<form action="" method="POST">
			<div class="card" style="width: 33%; float:left; margin: 0 auto; text-align: center;">
  				<img src="<?php echo $row['CoverArt']; ?>" class="card-img-top" alt="<?php echo $row['MainArtist']; ?>">
  				<div class="card-body">
    				<h5 class="card-title" style=""><?php echo $row['Name']; ?></h5>
    				<p class="card-text">Performed by: <?php echo $row['MainArtist']; ?></p>
    				<input type="hidden" name="ID" value="<?php echo $row['ID']; ?>">
    				<input type="submit" name="freeQ" class="btn btn-primary" value="Free Queue">
    				<input type="submit" name="paidQ" class="btn btn-success" value="Paid Queue">
  				</div>
			</div>
		</form>
			<?php
			}
			?>
	
		</div>
	</body>
</html>
