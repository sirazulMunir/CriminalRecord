<?php
  require_once('dbConnect.php');
  session_start();
  $id= $_GET['id'];
  $row= $conn->query("SELECT * FROM criminal join crime_record ON criminal_id = crime_id  WHERE (criminal_id = $id and crime_id = $id)");
  $result = mysqli_fetch_array($row);

  $email2 = $_SESSION['authority_email'];
  $row2= $conn->query("SELECT * FROM `authority_info` WHERE authority_email='$email2'");
  $result2 = mysqli_fetch_array($row2);
  $conn->close();
 ?>

 <!DOCTYPE html>
 <html lang="en">
   <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Criminal Details</title>

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
        .img-thumbnail:hover{
          transform: scale(1.1);
        }
        .img-thumbnail{
          transition: all .3s ese 0s;
        }
        .img-thumbnail{
          overflow: hidden;
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
                         <li><a href="thanaReport.php"> <?php echo $result2['duty_area']; ?> Thana</a>  </li>
                         <li><a href="criminalEntry.php"><span class="glyphicon glyphicon-edit"></span> Criminal Entry</a></li>
                         <li class="active"><a href="#"><span class="glyphicon glyphicon-file"></span> Criminal Details</a></li>
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
                       <div class="panel-heading"><h2 align="center">Criminal Details</h2></div>
                       <div class="panel-body">
                         <div class="row">
                           <div class="col-md-12 lead">Criminal Profile<hr></div>
                         </div>
                         <div class="row">
                           <div class="col-md-4 text-center">
                             <img class="img-thumbnail avatar avatar-original" style="-webkit-user-select:none;
                             display:block; margin:auto;" width="200" height="200" <?php echo "<img src='criminalPhoto/".$result['image']."'> "; ?> Criminal's Photo
                           </div>
                           <div class="col-md-8">
                             <div class="row">
                               <div class="col-md-12">
                                 <h3 class="only-bottom-margin">Criminal's Name: <?php echo $result['criminal_name']; ?></h3>
                               </div>
                             </div>
                             <div class="row">
                               <div class="col-md-12">
                                 <span class="text">Criminal's NID:</span> <?php echo $result['criminal_nid']; ?><br>
                                 <span class="text-muted">Criminal's Age:</span> <?php echo $result['criminal_age']; ?><br>
                                 <span class="text">Criminal's Gender:</span> <?php echo $result['criminal_gender']; ?><br>
                                 <span class="text-muted">Criminal's Address:</span> <?php echo $result['criminal_address']; ?><br>
                                 <span class="text">Crime:</span> <?php echo $result['crime_type']; ?><br>
                                 <span class="text-muted">Crime Place:</span> <?php echo $result['crime_place']; ?><br>
                                 <span class="text">Arrest Status:</span> <?php echo $result['arrest_status']; ?><br>
                                 <span class="text-muted">Arrested Thana:</span> <?php echo $result['thana']; ?><br>
                                 <span class="text">Crime Description:</span> <?php echo $result['description']; ?><br><br>
                                 <small class="text">Crime Date: <?php echo $result['crime_date']; ?></small>
                               </div>
                             </div>
                           </div>
                         </div>
                         <div class="row">
                           <div class="col-md-12">
                             <hr><a onclick="return confirm('Are you sure want to dleate?')" href="deleteEntry.php?id=<?php echo $result['criminal_id']; ?>" class="btn btn-danger pull-right"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                             <a href="edit.php?id=<?php echo $result['criminal_id']; ?>" class="btn btn-warning pull-right"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                             <a href="crimeRecord.php" class="btn btn-info pull-right"><i class="glyphicon glyphicon-envelope"></i> Crime Record</a>
                           </div>
                         </div>
                       </div>
                     </div>
                  </div>



        <div class="navbar navbar-bottom">
          <p align="center">Copyright &copy;Munir&Tushar | All Rights Reserved</p>
        </div>
   </body>
 </html>

 <script>
 $(document).ready(function(){

  function load_unseen_notification(view = '')
  {
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
