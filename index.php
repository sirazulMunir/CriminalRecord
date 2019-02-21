
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
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Criminal Record</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Cabin:700' rel='stylesheet' type='text/css'>
    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
    <link href="css/grayscale.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Criminal Record</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#signIn">LogIn</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="userReg1.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#login">Admin</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <!-- Intro Header -->
    <header class="masthead">
      <div class="intro-body">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h1 class="brand-heading">Criminal Record</h1>
              <p class="intro-text">An official website where  you can write and send your complain to your nearest police station.
                <br></p>
              <a href="#about" class="btn btn-circle js-scroll-trigger">
                <i class="fa fa-angle-double-down animated"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- About Section -->
    <section id="about" class="content-section text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <h2>About Criminal Record</h2>
            <p>Criminal Record is an official website of Bangladesh Police. It can be solution of your problems what you are facing in your daily life.</p>
            <p>You don't have to go to police station if are busy. Just write your problem here and sent it to us. We will take action.</p>
            <p>You can see complains of your thana and comment on complains. To do that, you need to register first. </p><br>
            <a href="#signIn" class="btn btn-circle js-scroll-trigger">
              <i class="fa fa-angle-double-down animated"></i>
            </a>
          </div>
        </div>
      </div>
    </section>

    <section id="signIn" class="content-section text-center">
      <div class="container">
         <div class="row">
              <div class="col-lg-8 mx-auto">
                   <h2>User LogIn</h2>
                   <form action="" method="post">
                        <div class="form-group">
                            <label for="email">Email</label><br>
                            <input class="form-control" id="userEmail" placeholder="Enter Email Addresss" type="email" name="userEmail">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label><br>
                            <input class="form-control" id="userPassword" autocomplete="off" placeholder="Password" type="password" name="userPassword">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success submit" name="userLogIn">LogIn</button>
                       </div>
                   </form><br>
                   <a href="#contact" class="btn btn-circle js-scroll-trigger">
                     <i class="fa fa-angle-double-down animated"></i>
                   </a>
              </div>
         </div>
      </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="content-section text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <h2>Contact With Us</h2>
            <div class="panel panel-default">
                <div class="panel-heading">Mobile Numbers</div>
                <table class="table table-bordered table-striped">
                   <thead>
                     <tr>
                       <th>Thana</th>
                       <th>Number</th>
                     </tr>
                   </thead>
                   <tbody>
                     <tr>
                       <td>Dhanmondi</td>
                       <td>01774098177</td>
                     </tr>
                     <tr>
                       <td>Mohammodpur</td>
                       <td>01824583741</td>
                     </tr>
                     <tr>
                       <td>Hazaribag</td>
                       <td>01559687450</td>
                     </tr>
                     <tr>
                       <td>Shahbag</td>
                       <td>0155066568</td>
                     </tr>
                   </tbody>
                </table>
            </div>
            <ul class="list-inline banner-social-buttons">
              <li class="list-inline-item">
                <a href="" class="btn btn-default btn-md">
                  <i class="fa fa-twitter fa-fw"></i>
                  <span class="network-name">Twitter</span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="" class="btn btn-default btn-md">
                  <i class="fa fa-facebook fa-fw"></i>
                  <span class="network-name">Facebook</span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="" class="btn btn-default btn-md">
                  <i class="fa fa-google-plus fa-fw"></i>
                  <span class="network-name">Google+</span>
                </a>
              </li>
            </ul>
            <a href="#login" class="btn btn-circle js-scroll-trigger">
              <i class="fa fa-angle-double-down animated"></i>
            </a>
          </div>
          </div>
        </div>
      </div>
    </section>

    <section id="login" class="content-section text-center">
      <div class="container">
         <div class="row">
              <div class="col-lg-8 mx-auto">
                   <h2>Admin LogIn</h2>
                   <form action="" method="post">
                        <div class="form-group">
                            <label for="email">Email</label><br>
                            <input class="form-control" id="adminEmail" placeholder="Enter Email Addresss" type="email" name="adminEmail">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label><br>
                            <input class="form-control" id="adminPassword" autocomplete="off" placeholder="Password" type="password" name="adminPassword">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success submit" name="adminLogIn">LogIn</button>
                       </div>
                   </form>
              </div>
         </div>
      </div>
    </section>

    <footer>
      <div class="container text-center">
        <p>Copyright &copy;<i>Munir&Tushar</i> 2017</p>
      </div>
    </footer>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/grayscale.min.js"></script>

  </body>

</html>
