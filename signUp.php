<html>
<head>
<title> User create account page </title>
<h1> Create Account </h1>


<!--php element-->
<?php

#This holds $username and $password.
include ('secret.php');

try 
{
    $dsn = "mysql:host=courses;dbname=$username";
    $pdo = new PDO($dsn, $username, $password);
    #$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch(PDOexception $e) 
{
    echo "Connection to database failed: " . $e->getMessage(); 
}


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
        $sql = 'INSERT INTO Person (FirstName, LastName, Email, AddressLine1, AddressLine2) VALUES (:FirstName, :LastName, :Email, :AddressLine1, :AddressLine2);';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['FirstName' => $_POST['FirstName'], 'LastName' => $_POST['LastName'], 'Email' => $_POST['Email'], 'AddressLine1' => $_POST['AddressLine1'], 'AddressLine2' => $_POST['AddressLine2']]);
        
        //Get autoincrimented id from person.
        $NewID = $pdo->lastInsertId();
        
        $sql = 'INSERT INTO Client (PersonID) VALUES (:PersonID);';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['PersonID' => $NewID]);
    }

}
?>


<body>

    <!--Form element-->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

        <label for="Email">Email: </label>
        <input type="text" name="Email"/> 
        <br/> <br/>

        <label for="Fname">First Name: </label>
        <input type="text" name="FirstName"/> 
        <br/>
        <label for="Lname">Last Name: </label>
        <input type="text" name="LastName"/> 
        <br/> <br/>

        <label for="Address1">Address 1: </label>
        <input type="text" name="AddressLine1"/> 
        <br/>
        <label for="Address2">Address 2: </label>
        <input type="text" name="AddressLine2"/> 
        <br/> <br/>


        <input type="submit" value="Submit" name="submit"/>
        <input type="reset" value="Start over" />
    </form>

</body>

</head>
</html>