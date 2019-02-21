<?php

    require_once('dbConnect.php');

    if (isset($_POST['sendReg'])) {

      $uName= $_POST['userName'];
      $uEmail= $_POST['userEmail'];
      $uPhone= $_POST['userPhone'];
      $uAddress= $_POST['userAddress'];
      $uThana= $_POST['userThana'];
      $uNid= $_POST['userNID'];
      $uGender= $_POST['userGender'];
      $uPassword= $_POST['userPassword'];

      $target = "userPhoto/".basename($_FILES['userPhoto']['name']);
      $image= $_FILES['userPhoto']['name'];
      move_uploaded_file($_FILES['userPhoto']['tmp_name'],$target);

      $conn->query("INSERT INTO `user_info` (`user_name`, `user_email`, `user_phone`, `user_address`, `user_NID`, `user_gender`, `user_password`, `image`, `thana`)
                      VALUES ('$uName','$uEmail','$uPhone','$uAddress','$uNid','$uGender','$uPassword','$image','$uThana')");
      $conn->close();
      header("location: userReg1.php");
    }
 ?>
