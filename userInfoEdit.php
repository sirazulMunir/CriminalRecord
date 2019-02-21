<?php
  require_once('dbConnect.php');
  session_start();
  $email = $_GET['email'];
  $row = $conn->query("SELECT * FROM user_info  WHERE user_email = '$email' ");
  $edit = mysqli_fetch_array($row);

  $email2 = $_SESSION['user_email'];
  $row2= $conn->query("SELECT * FROM `user_info` WHERE user_email='$email2'");
  $result2 = mysqli_fetch_array($row2);



  if (isset($_POST['update'])) {

    $uName= $_POST['userName'];
    $uEmail= $_POST['userEmail'];
    $uPhone= $_POST['userPhone'];
    $uAddress= $_POST['userAddress'];
    $uGender= $_POST['userGender'];
    $uPassword= $_POST['userPassword'];

    $conn->query("UPDATE `user_info`
      SET `user_name`='$uName',`user_email`='$uEmail',`user_phone`='$uPhone',`user_address`='$uAddress',`user_gender`='$uGender',`user_password`='$uPassword'
      WHERE (user_email= '$email') ");


    $conn->close();
    header('location: userInfo.php');



  }


 ?>

 <!DOCTYPE html>
 <html lang="en">
   <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Update Profile</title>

     <link href="css/bootstrap.min.css" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

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
        .btn-success{
          background-color: #2C3E50;
          border-color: #FFFFFF;
          color: #FFFFFF;
        }
        .btn-success:hover,
        .btn-success:focus,
        .btn-success:active,
        .btn-success .active,
        .open .dropdown-toggle.btn-success{
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
                       <li class="active"><a href="#"><span class="glyphicon glyphicon-edit"></span> Edit Profile</a></li>
                       <li><a href="userContent.php"><span class="glyphicon glyphicon-envelope"></span> See Complains</a></li>
                       <li><a href="userContent.php"><span class="glyphicon glyphicon-envelope"></span> Complain Box</a></li>
                       <li><a href="userLogOut.php"><span class="glyphicon glyphicon-off"></span></a></li>
                     </ul>
                 </div>
             </div>
         </div>

           <div class="container">
               <div class="panel panel-default jumbotron">
                   <div class="panel-heading"><h2 align="center">Edit Profile</h2></div>
                     <div class="panel-body">
                       <form id="userUpdate" method="post">
                           <div class="col-md-6">
                               <div class="form-group">
                                   <label for="userName">Your Name</label>
                                   <input type="text" class="form-control" name="userName" autocomplete="off" value="<?php echo $edit['user_name']; ?>">
                               </div>
                               <div class="form-group">
                                   <label for="userEmail">Email</label>
                                   <input type="email" class="form-control" name="userEmail" autocomplete="off" value="<?php echo $edit['user_email']; ?>">
                               </div>
                               <div class="form-group">
                                   <label for="userPhone">Phone Number</label>
                                   <input type="text" class="form-control" name="userPhone" autocomplete="off" value="<?php echo $edit['user_phone']; ?>">
                               </div>
                               <div class="form-group">
                                   <label for="userAddress">Address</label>
                                   <input type="text" class="form-control" name="userAddress" autocomplete="off" value="<?php echo $edit['user_address']; ?>">
                               </div>
                           </div>
                           <div class="col-md-6">
                               <div class="form-group">
                                   <label for="userGender">Gender</label>
                                   <input type="text" class="form-control" name="userGender" autocomplete="off" value="<?php echo $edit['user_gender']; ?>">
                               </div>
                               <div class="form-group">
                                   <label for="userPassword">Password</label>
                                   <input type="text" class="form-control" name="userPassword" autocomplete="off"  value="<?php echo $edit['user_password']; ?>">
                               </div>
                              <div>
                                  <button type="submit" class="btn btn-success" name="update"> Save</button>
                             </div>
                           </div>
                       </form>
                     </div>
               </div>
             </div>


         <div class="navbar navbar-bottom">
           <p align="center">Copyright &copy;Munir&Tushar | All Rights Reserved</p>
         </div>

    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
 		<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js"></script>

     <script type="text/javascript">
 				$(document).ready(function(){
 						$('#userUpdate').bootstrapValidator({
 								feedbackIcons: {
 									 valid: 'glyphicon glyphicon-ok',
 									 invalid: 'glyphicon glyphicon-remove',
 									 validating: 'glyphicon glyphicon-refresh'
 								},
 								fields: {

 									 userName: {
 										 validators: {
 											 stringLength: {
 												  min: 5,
                           max: 20,
 													message: "Please enter your name within 5-20 letters"
 											 },
 											 notEmpty:{
 												 message: "Please enter your name"
 											 }
 										 }
 									 },

 									 userEmail: {
 										validators: {
 											notEmpty:{
 												message: "Please enter your email"
 											},
                       emailAddress: {
                         message: "Please enter valid email"
                       }
 										}
 									},

                   userAddress: {
                    validators: {
                      notEmpty:{
                        message: "Write your address"
                      },
                      stringLength: {
                        min: 5,
                        message: "Enter your address 5-50 character"
                      }
                    }
                  },

                  userGender: {
                    validators: {
                      notEmpty: {
                        message: "Gender is required"
                      }
                    }
                  },

                  userPassword: {
                    validators: {
                      notEmpty: {
                        message: "Please enter password"
                      }
                    }
                  }

 								}
 						});
 				});
 		</script>
   </body>
 </html>
