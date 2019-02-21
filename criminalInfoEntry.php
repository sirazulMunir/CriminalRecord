<?php
  require_once('dbConnect.php');
  session_start();
  $email2 = $_SESSION['authority_email'];
  $row2= $conn->query("SELECT * FROM `authority_info` WHERE authority_email='$email2'");
  $result2 = mysqli_fetch_array($row2);

  if (isset($_POST['saveInformation'])) {

    $cName=$_POST['criminalName'];
    $cNID=$_POST['criminalNID'];
    $cAge=$_POST['criminalAge'];
    $cGender=$_POST['criminalGender'];
    $cAddress=$_POST['criminalAddress'];
    $cType=$_POST['crimeType'];
    $cPlace=$_POST['crimePlace'];
    $cDate=$_POST['crimeDate'];
    $aStatus=$_POST['arrestStatus'];
    $aThana=$result2['duty_area'];
    $cDescription=$_POST['crimeDescription'];

    $target = "criminalPhoto/".basename($_FILES['criminalPhoto']['name']);
		$image = $_FILES['criminalPhoto']['name'];
		move_uploaded_file($_FILES['criminalPhoto']['tmp_name'],$target);

    $sql1= $conn->query("INSERT INTO `criminal` (`criminal_name`, `criminal_nid`, `criminal_age`, `criminal_gender`, `criminal_address`, `image`)
                  VALUES ('$cName','$cNID','$cAge','$cGender','$cAddress','$image')");
    $last_id = mysqli_insert_id($conn);

    $sql2= $conn->query("INSERT INTO `crime_record` (`crime_id`,`crime_type`, `crime_place`, `crime_date`, `arrest_status`, `thana`, `description`)
                  VALUES ('$last_id','$cType','$cPlace','$cDate','$aStatus','$aThana','$cDescription')");

    $conn->close();

    if (!$sql1) {
      echo '<script type="text/javascript">';
      echo 'alert("Criminal information can not saved!")';
      echo '</script>';
    }elseif (!$sql2) {
      echo '<script type="text/javascript">';
      echo 'alert("Crime information can not saved!")';
      echo '</script>';
    }else {
      echo '<script type="text/javascript">';
      echo 'alert("Information saved!")';
      echo '</script>';
      header("location: criminalEntry.php");
    }

  }


 ?>
