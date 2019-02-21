<?php
  require_once('dbConnect.php');
  session_start();
  $email = $_SESSION['user_email'];
  $row= $conn->query("SELECT * FROM `user_info` WHERE user_email='$email'");
  $result = mysqli_fetch_array($row);
  $conn->close();
 ?>

 <!DOCTYPE html>
 <html lang="en">
   <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Home</title>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
     <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />

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
                        <li class="active"><a href=""> <?php echo $result['user_name']; ?></a></li>
                        <li><a href="userContent.php"><span class="glyphicon glyphicon-envelope"></span> See Complains</a></li>
                        <li><a href="complain.php"><span class="glyphicon glyphicon-send"></span> Complains Box</a></li>
                        <li><a href="userLogOut.php"><span class="glyphicon glyphicon-off"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>

          <div class="container">
              <div class="panel panel-default jumbotron">
                 <div class="panel-heading"><h2 align="center">Profile</h2></div>
                  <div class="panel-body">
                  <div class="row">
                          <div class="row">
                            <div class="col-md-4 text-center">
                              <img class="img-thumbnail avatar avatar-original" style="-webkit-user-select:none; display:block; margin:auto;"  width="200" height="200" <?php echo "<img src='userPhoto/".$result['image']."'> "; ?>
                            </div>
                            <div class="col-md-8">
                              <div class="row">
                                <div class="col-md-12">
                                  <h4 class="only-bottom-margin"><b>Name:</b> <?php echo $result['user_name']; ?></h4>
                                </div>
                              </div><br>
                              <div class="row">
                                <div class="col-md-12">
                                  <span class="text"><b>Phone:</b></span> <?php echo $result['user_gender']; ?><br><br>
                                  <span class="text"><b>Sex:</b></span> <?php echo $result['user_phone']; ?><br><br>
                                  <span class="text"><b>Email:</b></span> <?php echo $result['user_email']; ?><br><br>
                                  <span class="text"><b>NID:</b></span> <?php echo $result['user_NID']; ?><br><br>
                                  <span class="text"><b>Address:</b></span> <?php echo $result['user_address']; ?><br><br>
                                  <span class="text"><b>Thana:</b></span> <?php echo $result['thana']; ?><br>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <hr><a href="userInfoEdit.php?email=<?php echo $_SESSION['user_email']; ?>" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-edit"></i> Edit Profile</a>
                            </div>
                          </div>
                    </div>
                  </div>
              </div>
         </div>


         <div class="navbar navbar-bottom">
           <p align="center">Copyright &copy;Munir&Tushar </p>
         </div>

   </body>
 </html>
