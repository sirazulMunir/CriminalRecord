<?php
  require_once('dbConnect.php');
  session_start();
  $row= $conn->query("SELECT * FROM `complain` join `complainer` WHERE complain_id = complainer_id ORDER by complain_id DESC");
  $email = $_SESSION['user_email'];
  $row2= $conn->query("SELECT * FROM `user_info` WHERE user_email='$email'");
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
       background: linear-gradient(rgba(26,26,26,.9),rgba(26,26,26,.9)), url("images/12.jpg");
       background-size: cover;
       background-position: center;
       background-repeat: no-repeat;
       color: #FFFFFF;
     }
     .panel{
       background: linear-gradient(rgba(26,26,26,.9),rgba(26,26,26,.9)), url("images/12.jpg");
       background-size: cover;
       background-position: center;
       background-repeat: no-repeat;
       color: #FFFFFF;
     }
     .panel .panel-heading{
      background: linear-gradient(rgba(26,26,26,.9),rgba(26,26,26,.9)), url("images/12.jpg");
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
    .btn-primary{
      background-color: #2C3E50;
      border-color: #FFFFFF;
      color: #FFFFFF;
    }
    .btn-primary:hover,
    .btn-primary:focus,
    .btn-primary:active,
    .btn-primary .active,
    .open .dropdown-toggle.btn-primary{
      color: #FFFFFF;
      background-color: #AE2A36;
      border-color: #161F29;
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
                         <li><a href="userInfo.php"> <?php echo $result2['user_name']; ?></a></li>
                         <li class="active"><a href=""><span class="glyphicon glyphicon-envelope"></span> See Complains</a></li>
                         <li><a href="complain.php"><span class="glyphicon glyphicon-send"></span> Complain Box</a></li>
                         <li><a href="userLogOut.php"><span class="glyphicon glyphicon-off"></span></a></li>
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
                   </tr>
               </thead>
               <tbody>
                 <?php while($result = mysqli_fetch_array($row)) { ?>

                   <tr>
                       <td><?php echo $result['suspect_name']; ?></td>
                       <td><?php echo $result['suspect_age']; ?></td>
                       <td><?php echo $result['crime_type']; ?></td>
                       <td><?php echo $result['complainer_name']; ?></td>
                       <td><a href="userSeeComplainDetails.php?id=<?php echo $result['complainer_id']; ?>" class="btn btn-primary" >Details</a></td>
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
