<?php

//Handle the adding of songs to the queue
if (isset($_POST['paidQ']) || isset($_POST['freeQ'])) {
  $client = $_POST['Client'];
  $kfile = $_POST['KFile'];
  $song = $_POST['ID'];
  $price = "0.0";
  if (isset($_POST['paidQ']))
  {
    $paid = "Y";
    $price = $_POST["price"];
  }
  if (isset($_POST['freeQ']))
  {
    $paid = "N";
    $price = "0.0";
  }
  $sql = "INSERT INTO `Queue` (IsPaid, AmountPaid) VALUES (:paid, :amount);";
  $prepared = $PDO->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
  $success = $prepared->execute([':paid'=>$paid,':amount'=>$price]);

      if ($success) {
        $queue_id = $PDO->lastInsertId();

        $sql = "INSERT INTO `Enqueues` (KarFileID, PersonID, QueueID) VALUES (:kfile, :client, :queue_id);";
        $prepared = $PDO->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $success = $prepared->execute([':kfile'=>$kfile, ':client'=>$client, ':queue_id'=>$queue_id]);

      }
        
      else
        $message = "There was an error adding your part. :(";
}



//Handle the search on Nav Bar
$nav_search = $_POST['navsearch'] ?? '';
if ($nav_search == "navsearch") {

  $search_string = $_POST['search'];

  //Search by Song Name
  $sql = 'SELECT * FROM `Song` WHERE `Name` LIKE :searchQuery';
      $stmt = $PDO->prepare($sql);
      $stmt->execute(['searchQuery' => '%' . $search_string . '%']);
      $search_song = $stmt;

  //Search by Artist Name
  $sql = 'SELECT * FROM `Artist` WHERE `Name` LIKE :searchQuery';
      $stmt = $PDO->prepare($sql);
      $stmt->execute(['searchQuery' => '%' . $search_string . '%']);
      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      $artist_id = $row['ID'];

      $search_artist = $PDO->query("SELECT * FROM `Song` WHERE `ID` IN (SELECT `SongID` FROM `AssociatedWith` WHERE `ArtistID` = '$artist_id');");



}


?>
