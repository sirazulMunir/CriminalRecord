<?php
	require_once('dbConnect.php');
	session_start();
  $email = $_SESSION['user_email'];
  $row= $conn->query("SELECT * FROM `user_info` WHERE user_email='$email'");
  $result = mysqli_fetch_array($row);

	if (isset($_POST['sendComplain'])) {

	  $uName = $result['user_name'];
		$uNID = $result['user_NID'];
		$uPhone = $result['user_phone'];
		$uEmail =$result['user_email'];
		$uAddress = $result['user_address'];

		$sName = $_POST['suspectName'];
		$sAge = $_POST['suspectAge'];
		$sGender =$_POST['suspectGender'];
		$sCrime =$_POST['suspectCrime'];
		$dscrption =$_POST['description'];
		$cDate = $_POST['complainDate'];

		$target = "suspectPhoto/".basename($_FILES['suspectPhoto']['name']);
		$image= $_FILES['suspectPhoto']['name'];
		move_uploaded_file($_FILES['suspectPhoto']['tmp_name'],$target);

		$conn->query("INSERT INTO `complainer`(`complainer_name`, `complainer_nid`, `complainer_phone`, `complainer_email`, `complainer_address`)
			VALUES('$uName', '$uNID','$uPhone','$uEmail', '$uAddress')");

		$last_id = mysqli_insert_id($conn);

		$conn->query("INSERT INTO `complain`(`complain_id`, `suspect_name`, `suspect_age`, `suspect_gender`, `crime_type`, `complain_description`, `complain_date`, `image`)
			VALUES('$last_id','$sName', '$sAge', '$sGender', '$sCrime','$dscrption','$cDate','$image')");

		$conn->close();
		header('location: complain.php');
}

?>
