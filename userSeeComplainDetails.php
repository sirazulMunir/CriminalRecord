<?php
  require_once('dbConnect.php');
  session_start();
  $id= $_GET['id'];
  $row= $conn->query("SELECT * FROM `complain` join `complainer` ON complain_id = complainer_id WHERE(complain_id = $id and complainer_id)");
  $result = mysqli_fetch_array($row);
  $email = $_SESSION['user_email'];
  $row2= $conn->query("SELECT * FROM `user_info` WHERE user_email='$email'");
  $result2 = mysqli_fetch_array($row2);


  if (isset($_POST['submit'])) {
    $iId = $_GET['id'];
    $name = $result2['user_name'];
    $uComment = $_POST['comment'];

    $bb= $conn->query("INSERT INTO `tblcomment`(`complain_id`, `PERSON`, `COMMENT`, `DATEPOSTED`) VALUES ('$iId','$name','$uComment',Now())");

    if (!$bb) {
      echo "Can not insert";
    }
  }

  $sql = $conn->query("SELECT * FROM `tblcomment` WHERE (complain_id = '$id') ORDER by ID DESC ");

  $conn->close();
 ?>

 <!DOCTYPE html>
 <html lang="en">
   <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Complain Details</title>

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
     .panel-footer{
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
                         <li><a href="userInfo.php"> <?php echo $result2['user_name']; ?></a></li>
                         <li class="active"><a href=""><span class="glyphicon glyphicon-envelope"></span> Complain Details</a></li>
                         <li><a href="complain.php"><span class="glyphicon glyphicon-send"></span> Complain Box</a></li>
                         <li><a href="userLogOut.php"><span class="glyphicon glyphicon-off"></span></a></li>
                     </ul>
                 </div>
             </div>
         </div>

             <div class="panel panel-default jumbotron">
                <div class="panel-heading"><h3 align="center">Complain Details</h3></div>
                 <div class="row">
                   <div class="col-md-6">
                     <div class="panel panel-default">
                       <div class="panel-heading"><h3 align="center">Complain Profile</h3></div>
                       <div class="panel-body">
                         <div class="row">
                           <div class="col-md-4 text-center">
                             <img class="img-thumbnail avatar avatar-original" style="-webkit-user-select:none;
                             display:block; margin:auto;"  width="200" height="200" <?php echo "<img src='suspectPhoto/".$result['image']."'> "; ?> Suspect's Photo
                           </div>
                           <div class="col-md-8">
                             <div class="row">
                               <div class="col-md-12">
                                 <h3 class="only-bottom-margin">Suspect's Name: <?php echo $result['suspect_name']; ?></h3>
                               </div>
                             </div>
                             <div class="row">
                               <div class="col-md-12">
                                 <span class="text">Suspect's Age:</span> <?php echo $result['suspect_age']; ?><br>
                                 <span class="text">Suspect's Gender:</span> <?php echo $result['suspect_gender']; ?><br>
                                 <span class="text">Crime:</span> <?php echo $result['crime_type']; ?><br>
                                 <span class="text">Description:</span> <?php echo $result['complain_description']; ?><br><br>
                                 <small class="text">Complain Date: <?php echo $result['complain_date']; ?></small>
                               </div>
                             </div>
                             <div class="row">
                               <div class="col-md-12">
                                 <h3 class="only-bottom-margin">Complainer's Name: <?php echo $result['complainer_name']; ?></h3>
                               </div>
                             </div>
                             <div class="row">
                               <div class="col-md-12">
                                 <span class="text">Complainer's NID:</span> <?php echo $result['complainer_nid']; ?><br>
                                 <span class="text">Complainer's Phone:</span> <?php echo $result['complainer_phone']; ?><br>
                                 <span class="text">Complainer's Email:</span> <?php echo $result['complainer_email']; ?><br>
                                 <span class="text">Complainer's Address:</span> <?php echo $result['complainer_address']; ?><br><br>
                               </div>
                             </div>
                           </div>
                         </div>
                         <div class="row">
                           <div class="col-md-12">
                             <hr><a href="userContent.php" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-envelope"></i> All Complains</a>
                           </div>
                         </div>
                       </div>
                     </div>
                   </div>
                   <div class="col-md-6">
                       <div class="panel panel-default">
                         <div class="panel-heading"><h3 align="center">Write your comment</h3></div>
                           <div class="panel-body">
                                <div class="row">
                                  <div class="col col-md-6">
                                    <form action="" method="post">
                                          <div class="form-group">
                                              <input type="text" class="form-control" required name="comment">
                                          </div>
                                          <div class="form-group">
                                              <button class="btn btn-primary" id ="submit" name="submit"  type="submit" >Post Comment</button>
                                          </div>
                                    </form>
                                  </div>
                               </div>
                                <div class="row" >
                                  <div class="col col-md-8">
                                    <div class="page-header"><h4> Comments</h4></div>
                                      <div id="display" class="col-md-10">
                                        <?php
                                           while($row4 = mysqli_fetch_array($sql)) {
                                           echo '<div class="panel panel-primary">';
                                           echo '<div class="panel-heading"><span class="glyphicon glyphicon-user"> </span> Posted by : ' . $row4['PERSON'].'</div>';
                                           echo '<div class="panel-body">';
                                           echo  $row4['COMMENT'];
                                           echo '</div>';
                                           echo '<div class="panel-footer">';
                                           echo 'Posted: ' . $row4['DATEPOSTED'];
                                           echo '</div>';
                                           echo '</div>';
                                         }
                                          ?>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div><br><br><br>
                        <div id="result"></div>
                   </div>
                 </div>
                </div>


        <div class="navbar navbar-bottom">
          <p align="center">Copyright &copy;Munir&Tushar | All Rights Reserved</p>
        </div>
    </body>
</html>
