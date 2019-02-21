<?php
  require_once('dbConnect.php');
  session_start();

  $id = $_GET['id'];
  $row = $conn->query("SELECT * FROM criminal join crime_record ON criminal_id = crime_id  WHERE (criminal_id = $id and crime_id = $id)");
  $edit = mysqli_fetch_array($row);

  $email2 = $_SESSION['authority_email'];
  $row2= $conn->query("SELECT * FROM `authority_info` WHERE authority_email='$email2'");
  $result2 = mysqli_fetch_array($row2);


  if (isset($_POST['editInformation'])) {

    $cName=$_POST['criminalName'];
    $cNID=$_POST['criminalNID'];
    $cAge=$_POST['criminalAge'];
    $cGender=$_POST['criminalGender'];
    $cAddress=$_POST['criminalAddress'];
    $cType=$_POST['crimeType'];
    $cPlace=$_POST['crimePlace'];
    $cDate=$_POST['crimeDate'];
    $aStatus=$_POST['arrestStatus'];
    $aThana=$_POST['arrestThana'];
    $cDescription=$_POST['crimeDescription'];


    $conn->query("UPDATE `criminal`
      SET `criminal_name`='$cName',`criminal_nid`='$cNID',`criminal_age`='$cAge',`criminal_gender`='$cGender',`criminal_mark`='$cMark',`criminal_address`='$cAddress'
      WHERE (criminal_id = $id ) ");

    $conn->query(" UPDATE `crime_record`
      SET  `crime_type`='$cType',`crime_place`='$cPlace',`crime_date`='$cDate',`arrest_status`='$aStatus',`thana`='$aThana',`description`='$cDescription'
      WHERE (crime_id = $id) ");

    $conn->close();
    header('location: crimeRecord.php');
  }


 ?>

 <!DOCTYPE html>
 <html lang="en">
   <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Information Update</title>

     <link href="css/bootstrap.min.css" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

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
                         <li><a href="#"> <?php echo $result2['duty_area']; ?> Thana</a>  </li>
                         <li class="active"><a href="#"><span class="glyphicon glyphicon-edit"></span> Update Entry</a></li>
                         <li><a href="crimeRecord.php"><span class="glyphicon glyphicon-file"></span> Crime Record</a></li>
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
                  <div class="panel-heading"><h2 align="center">Criminal Update</h2></div>
                  <div class="panel-body">
                    <form id="criminalUpdate" method="post" enctype="multipart/form-data">

                      <div class="col-md-6 form-line">
                          <div class="form-group">
                                <label for="criminalName">Criminal's Name</label>
                                <input type="text" class="form-control" id="criminalName" name="criminalName" autocomplete="off" value="<?php echo $edit['criminal_name']; ?>">
                          </div>
                          <div class="form-group">
                                <label for="criminalNID">Criminal's NID</label>
                                <input type="text" class="form-control" id="criminalNID" name="criminalNID" autocomplete="off" value="<?php echo $edit['criminal_nid']; ?>" maxlength="20">
                          </div>
                          <div class="form-group">
                                <label for="criminalAge">Criminal's Age</label>
                                <input type="text" class="form-control" id="criminalAge" name="criminalAge" autocomplete="off" value="<?php echo $edit['criminal_age']; ?>">
                          </div>
                          <div class="form-group">
                              <label for="suspectCrime">Criminal's Gender</label>
                              <input type="text" class="form-control" id="criminalGender" name="criminalGender" autocomplete="off" value="<?php echo $edit['criminal_gender']; ?>">
                          </div>
                          <div class="form-group">
                                <label for="criminalAddress">Criminal's Address</label>
                                <input type="text" class="form-control" id="criminalAddress" name="criminalAddress" autocomplete="off" value="<?php echo $edit['criminal_address']; ?>">
                          </div>
                          <div class="form-group">
                            <label for="crimeDate">Crime Date</label>
                            <input type="date" class="form-control" id="crimeDate" name="crimeDate" autocomplete="off" value="<?php echo $edit['crime_date']; ?>">
                          </div>
                        </div>

                        <div class="col-md-6">
                           <div class="form-group">
                                <label for="crimeType">Crime Name</label>
                                <input type="text" class="form-control" id="crimeType" name="crimeType" autocomplete="off" value="<?php echo $edit['crime_type']; ?>">
                          </div>
                          <div class="form-group">
                                <label for="crimePlace">Crime Place</label>
                                <input type="text" class="form-control" id="crimePlace" name="crimePlace" autocomplete="off" value="<?php echo $edit['crime_place']; ?>">
                          </div>
                          <div class="form-group">
                                <label for="arrestStatus"> Arrest Status</label>
                                <input type="text" class="form-control" id="arrestStatus" name="arrestStatus" autocomplete="off" value="<?php echo $edit['arrest_status']; ?>">
                          </div>
                          <div class="form-group">
                                <label for="arrestThana"> Thana</label>
                                <input type="text" class="form-control" id="arrestThana" name="arrestThana" autocomplete="off" value="<?php echo $edit['thana']; ?>">
                          </div>
                          <div class="form-group">
                              <label for="crimeDescription"> Crime Description</label>
                              <input type="text"  class="form-control" id="crimeDescription" name="crimeDescription" required autocomplete="off" value="<?php echo $edit['description']; ?>">
                         </div>
                          <div>
                               <button type="submit" class="btn btn-warning submit" name="editInformation"><span class="glyphicon glyphicon-edit"></span> Update</button>
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
 						$('#criminalUpdate').bootstrapValidator({
 								feedbackIcons: {
 									 valid: 'glyphicon glyphicon-ok',
 									 invalid: 'glyphicon glyphicon-remove',
 									 validating: 'glyphicon glyphicon-refresh'
 								},
 								fields: {

 									 criminalName: {
 										 validators: {
 											 stringLength: {
 												  min: 5,
                           max: 20,
 													message: "Please enter criminal's name within 5-20 letters"
 											 },
 											 notEmpty:{
 												 message: "Please enter criminal's name"
 											 }
 										 }
 									 },

 									 criminalNID: {
 										validators: {
 											numeric : {
 												message: "Please enter number"
 											},
 											notEmpty:{
 												message: "Please enter criminal's NID number"
 											},
                       stringLength: {
                         min: 10,
                         message: "10 digit required"
                       }
 										}
 									},

                   criminalAge: {
                    validators: {
                      notEmpty:{
                        message: "Please select criminal's age"
                      },
                      numeric: {
                        message: "Age must be number"
                      }
                    }
                  },

                  criminalGender: {
                    validators: {
                      notEmpty: {
                        message: "Gender is required"
                      }
                    }
                  },


                  criminalAddress: {
                    validators: {
                      stringLength: {
                        min: 10,
                        max: 100,
                        message: "Please enter 10-100 characters"
                      },
                      notEmpty: {
                        message: "Please enter address"
                      }
                    }
                  },

                  crimeType: {
                      validators: {
                          notEmpty: {
                             message: "Crime type is required"
                        }
                      }
                  },

                  crimePlace: {
                    validators: {
                       notEmpty: {
                         message: "This field is required"
                       },
                       stringLength: {
                         min: 10,
                       }
                    }
                  },

                  crimeDate: {
                    validators: {
                      notEmpty: {
                        message: "Please select date"
                      }
                    }
                  },

                   arrestStatus: {
                    validators: {
                      notEmpty:{
                        message: "Please select one option"
                      }
                    }
                  },

                  arrestThana: {
                    validators: {
                      notEmpty: {
                        message: "Please select one option"
                      }
                    }
                  },

 									crimeDescription: {
                     validators: {
                       notEmpty: {
                         message: "Description is required"
                       },
                       stringLength: {
                         min: 10,
                         max: 500,
                         message: "Write description within 10-500 characters"
                       }
                     }
                   }

 								}
 						});
 				});
 		</script>
   </body>
 </html>
