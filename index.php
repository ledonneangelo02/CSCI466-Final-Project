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

	include "functions.php";

?>

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

		<!-- BEGIN Front-Page Carousel ------------------------------------- -->
		<div id="carouselExample" class="carousel slide bg-dark-subtle" data-bs-ride="carousel"
			style="background-image:url('assets/front_banner.jpg'); background-size:cover; background-attachment: fixed; background-position:10% bottom;">
			<div class="carousel-inner">
				<?php
				$query 	= "SELECT * FROM Song ORDER BY RAND()";
				$prp = $PDO->prepare($query);
				$prp->execute();
				$vals = $prp->fetchAll(PDO::FETCH_ASSOC);

				$taglines = array("The Latest Picks", "The Hottest Hits", "From Your Favorite Artists", "Only at KMS Karaoke");

				$i = 0;
				foreach ($vals as $row)
				{
					if ($i == 0)
					{
						echo "<div class=\"carousel-item active\" data-bs-interval=\"3000\">";
					}
					else
					{
						echo "<div class=\"carousel-item\">";
					}
					echo "<img height=\"640px\" src=\"" . $row["CoverArt"] . "\" class=\"d-block\">";
			?>
					<div class="container carousel-caption d-none d-md-block">
							<h1 class="text-light" style="text-shadow: 4px 3px 7px black;"><?php  $v = $i % 4; echo $taglines[$v]; ?></h1>
							<h2 class="text-light" style="text-shadow: 4px 3px 7px black;"><i><?php echo $row["Name"]; ?></i></h2>
					</div>
			<?php
					echo "</div>";
					$i++;
				}
			?>
			</div>

			<button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button>
			</div>
		</div>
		<!-- END Front-Page Carousel --------------------------------------- -->

		<div class="container-md">
			<h1 class="m-3">What's Currently Playing</h1>
		</div>	
		<?php include "components/activeplayer.php"; ?>

    	<div class="container-md">
			<h1 class="m-3">Our Favorite Picks</h1>	
			<?php
			$result = $PDO->query("SELECT * FROM `Song` ORDER BY RAND() LIMIT 6;");
			displaySongsFormless($PDO, $result);
			?>
		</div>

		<?php include "components/footer.php" ?>

	</body>
</html>
