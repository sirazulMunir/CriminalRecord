<?php
  require_once('dbConnect.php');

  $id = $_GET['id'];

  $conn->query("DELETE FROM `complain`, `complainer` using complain join complainer ON complain_id = complainer_id  WHERE (complain_id = $id and complainer_id = $id) ");
  $conn->close();
  header('location: seeComplain.php');

?>
