<?php
  require_once('dbConnect.php');
  session_start();
  $email2 = $_SESSION['authority_email'];
  $row2= $conn->query("SELECT * FROM `authority_info` WHERE authority_email='$email2'");
  $result2 = mysqli_fetch_array($row2);
  $cThana = $result2['duty_area'];
  $result1 = $conn->query("SELECT * FROM criminal join crime_record where (criminal_id = crime_id and thana='$cThana') ORDER by crime_date DESC");
  $conn->close();
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crime Record</title>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style type="text/css">
       body{
         padding-top: 5px;
         padding-bottom: 5px;
         background: linear-gradient(rgba(26,26,26,.9),rgba(26,26,26,.9)), url("images/b.jpg");
         background-size: cover;
         background-position: center;
         background-repeat: no-repeat;
         color: #FFFFFF;
       }
       .panel{
         background: linear-gradient(rgba(26,26,26,.9),rgba(26,26,26,.9)), url("images/b.jpg");
         background-size: cover;
         background-position: center;
         background-repeat: no-repeat;
         color: #FFFFFF;
       }
       .panel .panel-heading{
        background: linear-gradient(rgba(26,26,26,.9),rgba(26,26,26,.9)), url("images/b.jpg");
        color: #FFFFFF;
      }
       .navbar-inverse{
         background-color: #2C3E50;
         border-color: #FFFFFF;
         color: #FFFFFF;
       }
       .navbar-inverse .navbar-brand{
         color: #FFFFFF;
       }
       .navbar-inverse .navbar-brand:hover,
       .navbar-inverse .navbar-brand:focus{
         color: #1BBC9C;
         background-color: transparent;
       }
       .navbar-inverse .navbar-nav > li > a{
         color: #FFFFFF;
         border-right: 1px solid #FFFFFF;
       }
       .navbar-inverse .navbar-nav > .active > a,
       .navbar-inverse .navbar-nav > .active > a:hover,
       .navbar-inverse .navbar-nav > .active > a:focus{
         color: #FFFFFF;
         background-color: #1A242F;
       }
       .navbar-inverse .navbar-nav > li > a,
       .navbar-inverse .navbar-nav > li > a:focus{
         color: #1BBC9C;
         background-color: transparent;
       }
    </style>

  </head>
  <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="" class="navbar-brand"><span class="glyphicon glyphicon-book"></span></span> <b>Criminal Record</b></a>
                </div>
                <div class="collapse navbar-collapse" id="example">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="thanaReport.php"> <?php echo $result2['duty_area']; ?> Thana </a>  </li>
                        <li><a href="criminalEntry.php"><span class="glyphicon glyphicon-edit"></span> Criminal Entry</a></li>
                        <li class="active"><a href=""><span class="glyphicon glyphicon-file"></span> Crime Record</a></li>
                        <li><a href="search.php"><span class="glyphicon glyphicon-search"></span> Search Criminal</a></li>
                        <li><a href="seeComplain.php"><span class="glyphicon glyphicon-envelope"></span> All Complains</a></li>
                        <li class="dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-envelope" style="font-size:18px;"></span></a>
                           <ul class="dropdown-menu"></ul>
                        </li>
                        <li><a href="logOut.php"><span class="glyphicon glyphicon-off"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container">
           <div class="panel panel-default jumbotron">
             <div class="panel-heading"><h3 align="center"><span class="glyphicon glyphicon-book"></span> Crime Record</h3></div>
               <table class="table table-bordered">
                 <thead>
                     <tr>
                         <th>Name</th>
                         <th>Age</th>
                         <th>Crime</th>
                         <th>Status</th>
                         <th>Description</th>
                         <th>See Details</th>
                         <th colspan="2">Action</th>
                     </tr>
                 </thead>
                 <tbody>
                   <?php while($row1 = mysqli_fetch_array($result1)) { ?>

                     <tr>
                         <td><?php echo $row1['criminal_name']; ?></td>
                         <td><?php echo $row1['criminal_age']; ?></td>
                         <td><?php echo $row1['crime_type']; ?></td>
                         <td><?php echo $row1['arrest_status']; ?></td> 
                         <td><?php echo $row1['description']; ?></td>
                         <td><a href="criminalDetails.php?id=<?php echo $row1['criminal_id']; ?>" class="btn btn-info">Details</a></td>
                         <td><a href="edit.php?id=<?php echo $row1['criminal_id']; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span></a></td>
                         <td><a onclick="return confirm('Are you sure want to delete?')" href="deleteEntry.php?id=<?php echo $row1['criminal_id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a></td>
                     </tr>

                   <?php } ?>

                 </tbody>
               </table>
            </div>
        </div>

     <div class="navbar navbar-bottom">
          <p align="center">Copyright &copy;Munir&Tushar | All Rights Reserved</p>
     </div>
  </body>
</html>

<script>
$(document).ready(function(){

 function load_unseen_notification(view = ''){
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('.dropdown-menu').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }

 load_unseen_notification();

 $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });

 setInterval(function(){
  load_unseen_notification();;
 }, 5000);

});
</script>
