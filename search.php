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

if (isset($_GET['term'])){
    $return_arr = array();

    $stmt =  $pdo->stmt_init();
    $term = '%'.$_GET['term'].'%';
    $stmt = $pdo->prepare("SELECT * from Song WHERE Name like ?");
    $stmt->bind_param("s", $term);
    $stmt->execute();

    $stmt->bind_result($name);
        while ($stmt->fetch()) {
        $return_arr[] = $name;
        }
        echo json_encode($return_arr);
}  
?>
