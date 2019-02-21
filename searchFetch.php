<?php

require_once('dbConnect.php');
session_start();
$email2 = $_SESSION['authority_email'];
$row2= $conn->query("SELECT * FROM `authority_info` WHERE authority_email='$email2'");
$result2 = mysqli_fetch_array($row2);
$cThana = $result2['duty_area'];
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "
  SELECT * FROM criminal join crime_record on ( criminal_id = crime_id and thana='$cThana')
  WHERE ( (criminal_name LIKE  '%".$search."%') or (crime_date LIKE '%".$search."%') or (criminal_age LIKE '%".$search."%') or (crime_type LIKE '%".$search."%') or (arrest_status LIKE '".$search."%'))

 ";
}
else
{
 $query = "SELECT * FROM criminal join crime_record WHERE ( criminal_id = crime_id and thana='$cThana' )

 ";
}
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table">
   <table class="table table-bordered">
    <tr>
       <th>Name</th>
       <th>Age</th>
       <th>Type</th>
       <th>Arrest_Status</th>
       <th>Description</th>
       <th>Detailes</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result)){
  $output .= '
   <tr>
      <td>'.$row["criminal_name"].'</td>
      <td>'.$row["criminal_age"].'</td>
      <td>'.$row["crime_type"].'</td>
      <td>'.$row["arrest_status"].'</td>
      <td>'.$row["description"].'</td>
      <td><a href="criminalDetails.php?id='.$row['criminal_id'].'" class="btn btn-info">Details</a></td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>
