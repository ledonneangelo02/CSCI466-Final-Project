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

        <div class="container-md" style="min-height:80vh;">


            <div class="container-fluid m-3">
                <h3>User Registration</h3>

                <?php
                if (isset($_POST['submit']))
                {
                    //Check if any form elements are missing and print an error.
                    if ($_POST['Email'] == null)
                    {
                        echo "You did not enter an email address! \n";
		    }
                    else if ($_POST['FirstName'] == null)
                    {
                        echo "You did not enter your first name! \n";
                    }
                    else
		    {
			$key = $_POST['Email'];
			$kill = false;
			//Check if email alredy exists in the database and print an error if it does.
			$sql = 'SELECT Email FROM Person WHERE Email = :key';
			$stmt = $PDO->prepare($sql);
			$stmt->execute(['key' => $key]);
			$posts = $stmt->fetchAll();
			
			foreach($posts as $post)
			{
				echo "This email address is alredy associated with an account.";
				$kill = true;
			}

			
			if ($kill == true)
			{
				exit;
			}


                        $sql = 'INSERT INTO Person (FirstName, LastName, Email, AddressLine1, AddressLine2) VALUES (:FirstName, :LastName, :Email, :AddressLine1, :AddressLine2);';
                        $stmt = $PDO->prepare($sql);
                        $stmt->execute(['FirstName' => $_POST['FirstName'], 'LastName' => $_POST['LastName'], 'Email' => $_POST['Email'], 'AddressLine1' => $_POST['AddressLine1'], 'AddressLine2' => $_POST['AddressLine2']]);
                        
                        //Get autoincrimented id from person.
                        $NewID = $PDO->lastInsertId();
                        
                        $sql = 'INSERT INTO Client (PersonID) VALUES (:PersonID);';
                        $stmt = $PDO->prepare($sql);
                        $stmt->execute(['PersonID' => $NewID]);

                        // Show the user that they were created.
                        $sql = "SELECT * FROM Person WHERE ID = ?";
                        $statement = $PDO->prepare($sql);
                        $statement->execute(array($NewID));

                        $vals = $statement->fetchAll(PDO::FETCH_ASSOC);
                        $row = $vals[0];

                        echo "<h4> User: " . $row["FirstName"] . " " . $row["LastName"] . " created!</h4>";
                    }
                
                }
                ?>

                <!--Form element-->
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Email </span>
                        <input type="text" name="Email"  class="form-control" placeholder="name@example.com">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">First Name </span>
                        <input type="text" name="FirstName" class="form-control" placeholder="Jon">
                    </div>


                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Last Name </span>
                        <input type="text" name="LastName" class="form-control" placeholder="Lehuta">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Address Line 1 </span>
                        <input type="text" name="AddressLine1" class="form-control" placeholder="">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Address Line 2 </span>
                        <input type="text" name="AddressLine2" class="form-control" placeholder="">
                    </div>

                    <div class="input-group mb-3">
                        <input type="submit" name="submit" value="Submit" class="form-control">
                        <input type="reset" name="Submit" value="Reset" class="form-control">
                    </div>

                </form>

            </div>
        </div>

		<?php include "components/footer.php" ?>

	</body>
</html>
