<?php

//Handle the adding of songs to the queue
$paid_queue = $_POST['paidQ'] ?? '';
$free_queue = $_POST['freeQ'] ?? '';
if ($paid_queue == "Paid Queue" || $free_queue == "Free Queue") {
  $client = $_POST['Client'];
  $kfile = $_POST['KFile'];
  $song = $_POST['ID'];
  if ($paid_queue == "Paid Queue")
    $paid = "Y";
  if ($free_queue == "Free Queue")
    $paid = "N";
  $sql = "INSERT INTO `Queue` (IsPaid) VALUES (:paid);";
  $prepared = $PDO->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
  $success = $prepared->execute([':paid'=>$paid]);

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