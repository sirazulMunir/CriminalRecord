<?php
  require_once('dbConnect.php');
  session_start();
  $row= $conn->query("SELECT * FROM `complain` join `complainer` WHERE complain_id = complainer_id ORDER by complain_id DESC");
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
     <title>Complains</title>

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
                         <li> <a href="thanaReport.php"> <?php echo $result2['duty_area']; ?> Thana</a>  </li>
                         <li><a href="criminalEntry.php"><span class="glyphicon glyphicon-edit"></span> Criminal Entry</a></li>
                         <li><a href="crimeRecord.php"><span class="glyphicon glyphicon-file"></span> Crime Record</a></li>
                         <li><a href="search.php"><span class="glyphicon glyphicon-search"></span> Search Criminal</a></li>
                         <li class="active"><a href="seeComplain.php"><span class="glyphicon glyphicon-envelope"></span> All Complains</a></li>
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
             <div class="panel-heading"><h3 align="center">Complains</h3></div>
             <table class="table table-bordered">
               <thead>
                   <tr>
                       <th>Suspect's Name</th>
                       <th>Age</th>
                       <th>Crime</th>
                       <th>Complainer</th>
                       <th>See Details</th>
                       <th colspan="2">Action</th>
                   </tr>
               </thead>
               <tbody>
                 <?php while($result = mysqli_fetch_array($row)) { ?>

                   <tr>
                       <td><?php echo $result['suspect_name']; ?></td>
                       <td><?php echo $result['suspect_age']; ?></td>
                       <td><?php echo $result['crime_type']; ?></td>
                       <td><?php echo $result['complainer_name']; ?></td>
                       <td><a href="complainDetails.php?id=<?php echo $result['complainer_id']; ?>" class="btn btn-info" >Details</a></td>
                       <td><a onclick="return confirm('Are you sure want to dleate?')" href="deleteComplain.php?id=<?php echo $result['complainer_id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a></td>
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
