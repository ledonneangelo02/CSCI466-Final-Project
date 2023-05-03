<?php
  //Handle User Feedback
  $danger_message = "";
  $warning_message = "";
  $success_message = "";
  $danger = 0;
  $warning = 0;
  $success = 0;



$sort_by = $_GET['sort_by'] ?? '';


//0 None, 1 ASC, 2 DESC
$sorted = $_GET['sorted'] ?? '';

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
    if($price < .00001){
    	$paid = "N";
    }
  }
  if (isset($_POST['freeQ']))
  {
    $paid = "N";
    $price = "0.0";
  }
  $sql = "INSERT INTO `Queue` (IsPaid, AmountPaid) VALUES (:paid, :amount);";
  $prepared = $PDO->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
  $success = $prepared->execute([':paid'=>$paid,':amount'=>floatval($price)]);

      if ($success) {
        $queue_id = $PDO->lastInsertId();

        $sql = "INSERT INTO `Enqueues` (KarFileID, PersonID, QueueID) VALUES (:kfile, :client, :queue_id);";
        $prepared = $PDO->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $success = $prepared->execute([':kfile'=>$kfile, ':client'=>$client, ':queue_id'=>$queue_id]);

          if ($success) {
            $success = 1;
            $success_message = "Make your preparations to sing " . getSongName($PDO, $song);
          }

          else {
            $danger = 1;
            $danger_message = "There was an error adding your song to the queue";  
          }

      }
        
      else {
        $danger = 1;
        $danger_message = "There was an error adding your song to the queue";
      }  
}



//Handle the search on Nav Bar
$search_string = $_GET['search'] ?? '';
if ($search_string) {

  $sort = "Song.Name ASC";
  
  if (isset($_GET["sort_song"])) {
    if ($_GET["sort_song"] == 1) {
      $sort = "Song.Name DESC";
    }
  }
  if (isset($_GET["sort_artist"])) {
    if ($_GET["sort_artist"] == 0) {
      $sort = "Artist.Name ASC";
    }
    else
      $sort = "Artist.Name DESC";
  }
  if (isset($_GET["sort_genre"])) {
    if ($_GET["sort_genre"] == 0) {
      $sort = "Song.Genre ASC";
    }
    else
      $sort = "Song.Genre DESC";
  }

  //Search by Song Name
  $sql = "SELECT DISTINCT Song.ID 'Song.ID',Artist.ID 'Artist.ID',Song.Name 'Song.Name',Artist.Name 'Artist.Name',Song.Genre 'Song.Genre',Song.CoverArt 'Song.CoverArt' FROM Song,Artist,Contributes WHERE Song.Name LIKE :searchQuery AND Song.ID = Contributes.SongID AND Artist.ID = Contributes.ArtistID AND Contributes.RoleID = 1 ORDER BY $sort;";
      $stmt = $PDO->prepare($sql);
      $stmt->execute(['searchQuery' => '%' . $search_string . '%']);
      $search_song = $stmt->fetchAll(PDO::FETCH_ASSOC);

  //Search by Artist Name
  $sql = "SELECT DISTINCT Song.ID 'Song.ID',Artist.ID 'Artist.ID',Song.Name 'Song.Name',Artist.Name 'Artist.Name',Song.Genre 'Song.Genre',Song.CoverArt 'Song.CoverArt' FROM Song,Artist,Contributes WHERE Artist.Name LIKE :searchQuery AND Song.ID = Contributes.SongID AND Artist.ID = Contributes.ArtistID ORDER BY $sort;";
      $stmt = $PDO->prepare($sql);
      $stmt->execute(['searchQuery' => '%' . $search_string . '%']);
      $search_artist = $stmt->fetchAll(PDO::FETCH_ASSOC);


//Search by Genre Name
  $sql = "SELECT DISTINCT Song.ID 'Song.ID',Artist.ID 'Artist.ID',Song.Name 'Song.Name',Artist.Name 'Artist.Name',Song.Genre 'Song.Genre',Song.CoverArt 'Song.CoverArt' FROM Song,Artist,Contributes WHERE Song.Genre LIKE :searchQuery AND Song.ID = Contributes.SongID AND Artist.ID = Contributes.ArtistID AND Contributes.RoleID = 1 ORDER BY $sort;";
      $stmt = $PDO->prepare($sql);
      $stmt->execute(['searchQuery' => '%' . $search_string . '%']);
      $search_genre = $stmt->fetchAll(PDO::FETCH_ASSOC);
}


?>
