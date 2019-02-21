
<?php
require_once('dbConnect.php');
session_start();

if (isset($_POST['userLogIn'])) {
    $uEmail= mysqli_real_escape_string($conn,$_POST['userEmail']);
    $uPassword= mysqli_real_escape_string($conn,$_POST['userPassword']);

    $sql= $conn->query("SELECT `user_email`, `user_password` FROM `user_info` WHERE (`user_email`='$uEmail' and `user_password`='$uPassword')");

    $count= mysqli_num_rows($sql);

    if ($count == 1) {
      $_SESSION['user_email'] = $uEmail;
      header("location: userInfo.php");
    }else {
      echo '<script type="text/javascript">';
      echo 'alert("User Email or Password is Invalid!")';
      echo '</script>';
    }
}

if(isset($_POST['adminLogIn'])) {

  $aEmail = mysqli_real_escape_string($conn,$_POST['adminEmail']);
  $aPassword = mysqli_real_escape_string($conn,$_POST['adminPassword']);

  $sql= $conn->query("SELECT `authority_email`, `authority_password` FROM `authority_info` WHERE authority_email = '$aEmail' and authority_password = '$aPassword'");

  $count = mysqli_num_rows($sql);


  if($count == 1) {
     $_SESSION['authority_email'] = $aEmail;
     header("location: thanaReport.php");
  }else {
    echo '<script type="text/javascript">';
    echo 'alert("Admin Email or Password is Invalid!")';
    echo '</script>';
  }
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Registration</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet"></script>

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
   .modal .modal-body, .modal-header, .modal-footer{
     background: linear-gradient(rgba(26,26,26,.9),rgba(26,26,26,.9)), url("images/b.jpg");
     background-size: cover;
     background-position: center;
     background-repeat: no-repeat;
     color: #FFFFFF;
   }
   .modal .modal-header .close{
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
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navRes">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="" class="navbar-brand"><span class="glyphicon glyphicon-book"></span></span> <b>Criminal Record</b></a>
                </div>
                <div class="collapse navbar-collapse" id="navRes">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                        <li class="active"><a href="#"> Register</a></li>
                        <li><a href="#popUpSingIn" data-toggle="modal" data-target="#popUpSingIn"><span class="glyphicon glyphicon-log-in"></span> Sign In</a></li>
                        <li><a href="#popUpLogIn" data-toggle="modal" data-target="#popUpLogIn"><span class="glyphicon glyphicon-log-in"></span> Admin</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!--Pop Up sign In form -->
        <div class="modal fade" id="popUpSingIn">
          <div class="modal-dialog">
              <form class="modal-content" method="post" action="">

                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h3 class="modal-title"><span class="glyphicon glyphicon-log-in"></span> User Log-in</h3>
                </div>

                <div class="modal-body">
                  <div class="form-group">
                    <label for="email">User Email</label>
                    <input class="form-control" id="userEmail" placeholder="Enter Email Addresss" type="email" name="userEmail">
                  </div>

                  <div class="form-group">
                    <label for="userPassword">Password</label>
                    <input class="form-control" id="userPassword" autocomplete="off" placeholder="Password" type="password" name="userPassword">
                  </div>
                </div>

                <div class="modal-footer">
                  <a href="#" data-dismiss="modal" class="btn btn-danger">Close</a>
                  <button type="submit" class="btn btn-success" name="userLogIn">LogIn</button>
                </div>

              </form>
            </div>
        </div>

        <!--Pop Up Log In form -->
        <div class="modal fade" id="popUpLogIn">
          <div class="modal-dialog">
              <form class="modal-content" method="post" action="">

                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h3 class="modal-title"><span class="glyphicon glyphicon-log-in"></span> Admin Log-in</h3>
                </div>

                <div class="modal-body">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" id="adminEmail" placeholder="Enter Email Addresss" type="email" name="adminEmail">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input class="form-control" id="adminPassword" placeholder="Password" autocomplete="off" type="password" name="adminPassword">
                  </div>
                </div>

                <div class="modal-footer">
                  <a href="#" data-dismiss="modal" class="btn btn-danger">Close</a>
                  <button type="submit" class="btn btn-success" name="adminLogIn">LogIn</button>
                </div>

              </form>
            </div>
        </div>


          <div class="container">
              <div class="panel panel-default jumbotron">
                  <div class="panel-heading"><h2 align="center">Registration Form</h2></div>
                    <div class="panel-body">
                      <form id="userEnrty" action="userReg.php" method="post" enctype="multipart/form-data">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="userName">Your Name</label>
                                  <input type="text" class="form-control" name="userName" autocomplete="off" placeholder="Enter your name">
                              </div>
                              <div class="form-group">
                                  <label for="userEmail">Email</label>
                                  <input type="email" class="form-control" name="userEmail" autocomplete="off" placeholder="Enter your email">
                              </div>
                              <div class="form-group">
                                  <label for="userPhone">Phone Number</label>
                                  <input type="text" class="form-control" name="userPhone" autocomplete="off" placeholder="Enter your phone">
                              </div>
                              <div class="form-group">
                                  <label for="userAddress">Address</label>
                                  <input type="text" class="form-control" name="userAddress" autocomplete="off" placeholder="Enter your Address">
                              </div>
                              <div class="form-group">
                                  <label for="userThana">Your Thana</label>
                                  <select class="form-control" name="userThana">
                                    <option  value="">Select Thana</option>
                                    <option  value="Dhanmondi">Dhanmondi</option>
                                    <option  value="Mohammodpur">Mohammodpur</option>
                                    <option value="Hajaribag">Hajaribag</option>
                                    <option value="Shahbag">Shahbag</option>
                                    <option value="Motijeel">Motijeel</option>
                                  </select>
                              </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                               <label for="userNID">Your NID</label>
                               <input type="text" class="form-control" name="userNID" id="userNID" autocomplete="off" placeholder=" Enter NID">
                           </div>
                              <div class="form-group">
                                  <label for="userGender">Gender</label>
                                  <select class="form-control" name="userGender">
                                    <option  value="">Select Gender</option>
                                    <option  value="Male">Male</option>
                                    <option  value="Female">Female</option>
                                  </select>
                              </div>
                              <div class="form-group">
                                  <label for="userPassword">Password</label>
                                  <input type="password" class="form-control" name="userPassword" autocomplete="off" placeholder="Enter your Password">
                              </div>
                              <div class="form-group">
                                  <label for="userPassword1">Password</label>
                                  <input type="password" class="form-control" name="userPassword1" autocomplete="off" placeholder="Re-enter your Password">
                              </div>
                              <div class="form-group">
                                   <label for="userPhoto"> Upload your photo</label>
                                   <input type="file" class="form-control" name="userPhoto" autocomplete="off"/>
                             </div>
                             <div>
                                 <button type="submit" class="btn btn-success" name="sendReg"> Register</button>
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
  </body>
</html>

<script type="text/javascript">
    $(document).ready(function(){
        $('#userEnrty').bootstrapValidator({
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
                    message: "Please enter email"
                  },
                  emailAddress: {
                    message: "Please enter valid email"
                  }
                }
              },

              userPhone: {
               validators: {
                 notEmpty:{
                   message: "Please enter mobile number"
                 },
                 stringLength: {
                   min: 11,
                   max: 11
                 },
                 numeric: {
                   message: "Please enter number"
                 }
               }
             },

             userAddress: {
               validators: {
                 stringLength: {
                   min: 5,
                   max: 100,
                   message: "Please enter at least 5 characters and maximum 100 characters"
                 },
                 notEmpty: {
                   message: "Please enter address"
                 }
               }
             },

             userThana: {
               validators: {
                 notEmpty: {
                   message: "Please select thana"
                 }
               }
             },


             userNID: {
                 validators: {
                     notEmpty: {
                        message: "This field is required"
                   },
                   numeric: {
                     message: "Please enter number"
                   },
                   stringLength: {
                     min: 10,
                     max: 20
                   }
                 }
             },

             userGender: {
               validators: {
                  notEmpty: {
                    message: "Please select your gender"
                  },
              }
             },

             userPassword: {
               validators: {
                 notEmpty: {
                   message: "Please enter your password"
                 }
               }
             },

              userPassword1: {
               validators: {
                 notEmpty:{
                   message: "Please re-enter password"
                 },
                 identical: {
                   field: 'userPassword',
                   message: "Password does not match"
                 }
               }
             },


              userPhoto: {
                validators: {
                  notEmpty: {
                    message: "Your photo is required"
                  }
                }
              }

            }
        });
    });
</script>
