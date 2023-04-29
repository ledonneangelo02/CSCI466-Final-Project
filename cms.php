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

    function showSongCard($PDO)
    {
        $songInserted = "SELECT * FROM Song WHERE ID = LAST_INSERT_ID()";
        $prp = $PDO->prepare($songInserted);
        $prp->execute();
        $vals = $prp->fetchAll(PDO::FETCH_ASSOC);
?>
    <div class="card m-3" style="width: 18rem;">
        <img src="<?php echo $vals[0]["CoverArt"]; ?>" class="card-img-top">
        <div class="card-body">
            <h3 class="card-title"><?php echo $vals[0]["Name"]; ?></h3>
            <p>Successfully added to the database.</p>
        </div>
    </div>
<?php
    }

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

        <div class="container-md">
            <div class="row">
                <div class="col m-3">
                    <h2>Song Management</h2>
                    <?php
                        
                        if (isset($_POST["SongSubmit"]))
                        {
                            if (
                                isset($_POST["Name"]) && $_POST["Name"] != "" &&
                                isset($_POST["Genre"]) && $_POST["Genre"] != "" &&
                                isset($_POST["SongLen"]) && $_POST["SongLen"] != "" &&
                                isset($_POST["CoverArt"]) && $_POST["CoverArt"] != ""
                            )
                            {
                                $songInsertStatement = "INSERT INTO Song (`Name`, `Genre`, `SongLen`, `CoverArt`) VALUES (?, ?, ?, ?)";
                                $prp = $PDO->prepare($songInsertStatement);
                                $prps = $prp->execute(array($_POST["Name"], $_POST["Genre"], $_POST["SongLen"], $_POST["CoverArt"]));
                                if ($prps == true)
                                {
                                    showSongCard($PDO); 
                                }
                            }
                            else
                            {
                                echo "<strong>Entries within form are not all set.</strong>";
                            }
                        }
                    ?>
                    <form method="POST" target=".">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Song Title</span>
                            <input type="text" class="form-control" placeholder="Song Title" name="Name"/>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Genre</span>
                            <input type="text" class="form-control" placeholder="Genre" name="Genre"/>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Song Length (in Seconds)</span>
                            <input type="text" class="form-control" placeholder="Song Length" name="SongLen"/>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Cover Art Image Link</span>
                            <input type="text" class="form-control" placeholder="Cover Art" name="CoverArt"/>
                        </div>
                        <input type="submit" value="Song Submit" name="SongSubmit"/>
                    </form>
                </div>
                <div class="col m-3">
                <h2>Artist Management</h2>
                    <?php
                        
                        if (isset($_POST["ArtistSubmit"]))
                        {
                            /*
                            if (
                                isset($_POST["Name"]) && $_POST["Name"] != "" &&
                                isset($_POST["Genre"]) && $_POST["Genre"] != "" &&
                                isset($_POST["SongLen"]) && $_POST["SongLen"] != "" &&
                                isset($_POST["CoverArt"]) && $_POST["CoverArt"] != ""
                            )
                            {
                                $songInsertStatement = "INSERT INTO Song (`Name`, `Genre`, `SongLen`, `CoverArt`) VALUES (?, ?, ?, ?)";
                                $prp = $PDO->prepare($songInsertStatement);
                                $prp->execute(array($_POST["Name"], $_POST["Genre"], $_POST["SongLen"], $_POST["CoverArt"]));

                                $result = $PDO->query("SELECT * FROM `Song` WHERE ID = LAST_INSERT_ID()");
                                displaySongsFormless($PDO, $result);
                            }
                            else
                            {
                                echo "<strong>Entries within form are not all set.</strong>";
                            }*/
                        }
                    ?>
                    <form method="POST" target=".">
                        <div class="input-group mb-3">
                            <select class="form-select" aria-label="Default select example">
                                <?php
                                    $artistListQuery = "SELECT * FROM Artist";
                                    $prp = $PDO->prepare($artistListQuery);
                                    $res = $prp->execute();
                                    $vals = $prp->fetchAll(PDO::FETCH_ASSOC);                    
                                    foreach ($vals as $row)
                                    {
                                        echo "<option value=\"" . $row["ID"] . "\">" .
                                            $row["Name"] . "</option>";
                                    }

                                ?>
                            </select>
                            <input type="button" class="btn btn-primary" id="addArtists" value="Add Artist"/>
                            <script>
                                
                            </script>
                        </div>
                        <br/>
                        <input type="submit" value="Song Submit" name="ArtistSubmit"/>
                    </form>
                </div>
            </div>
        </div>

		<?php include "components/footer.php" ?>

	</body>
</html>
