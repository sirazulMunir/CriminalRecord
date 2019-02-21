<?php

  require_once('dbConnect.php');

      if(isset($_POST["view"])){

       if($_POST["view"] != ''){
         $conn->query("UPDATE complain SET complain_ststus = 1 WHERE complain_ststus = 0");
        }
        $result = $conn->query("SELECT * FROM complain ORDER BY complain_id DESC LIMIT 5");
        $output = '';

       if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
         $output .= '
         <li>
          <a href="complainDetails.php?id='.$row['complain_id'].'">
           <strong>'.$row["suspect_name"].'</strong><br />
           <small><em>'.$row["crime_type"].'</em></small>
          </a>
         </li>
         <li class="divider"></li>
         ';
        }
       }
       else{
        $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
       }

       $result_1 = $conn->query("SELECT * FROM complain WHERE complain_ststus = 0");
       $count = mysqli_num_rows($result_1);
       $data = array(
        'notification'   => $output,
        'unseen_notification' => $count
       );
       echo json_encode($data);
      }
?>
