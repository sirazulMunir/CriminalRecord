<?php
  require_once('dbConnect.php');

  $id = $_GET['id'];

  $conn->query("DELETE FROM `criminal`, `crime_record` using criminal join crime_record ON criminal_id = crime_id  WHERE (criminal_id = $id and crime_id = $id) ");
  $conn->close();
  header('location: crimeRecord.php');

?>
