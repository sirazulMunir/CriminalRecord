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
    <title>Complain Box</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet"></script>

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
                      <li><a href="userInfo.php"> <?php echo $result['user_name']; ?></a></li>
                      <li><a href="userContent.php"><span class="glyphicon glyphicon-envelope"></span> See Complains</a></li>
                      <li class="active"><a href=""><span class="glyphicon glyphicon-send"></span> Complain Box</a></li>
                      <li><a href="userLogOut.php"><span class="glyphicon glyphicon-off"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container">
               <div class="panel panel-default jumbotron">
                  <div class="panel-heading"><h2 align="center">Write Your Complain</h2></div>
                  <div class="panel-body">
                    <form id="complainForm" action="userComplain.php" method="post" enctype="multipart/form-data">
                      <div class="col-md-6">
                        <div class="form-group">
                           <label for="complainDate">Crime Date</label>
                           <input type="date" class="form-control" name="complainDate" id="complainDate" autocomplete="off">
                       </div>
                       <div class="form-group">
                          <label for="suspectName">Suspect's Name</label>
                          <input type="text" class="form-control" name="suspectName" id="suspectName" autocomplete="off" placeholder=" Enter Suspect's Name">
                       </div>
                       <div class="form-group">
                           <label for="suspectAge">Suspect's Age</label>
                             <select class="form-control" name="suspectAge">
                                 <option value="">Select Suspects Age</option>
                                 <option value="16">16</option>
                                 <option value="17">17</option>
                                 <option value="18">18</option>
                                 <option value="19">19</option>
                                 <option value="20">20</option>
                                 <option value="21">21</option>
                                 <option value="22">22</option>
                                 <option value="23">23</option>
                                 <option value="24">24</option>
                                 <option value="25">25</option>
                                 <option value="26">26</option>
                                 <option value="27">27</option>
                                 <option value="28">28</option>
                                 <option value="29">29</option>
                                 <option value="30">30</option>
                                 <option value="31">31</option>
                                 <option value="32">32</option>
                                 <option value="33">33</option>
                                 <option value="34">34</option>
                                 <option value="35">35</option>
                                 <option value="36">36</option>
                                 <option value="37">37</option>
                                 <option value="38">38</option>
                                 <option value="39">39</option>
                                 <option value="40">40</option>
                                 <option value="41">41</option>
                                 <option value="42">42</option>
                                 <option value="43">43</option>
                                 <option value="44">44</option>
                                 <option value="45">45</option>
                                 <option value="46">46</option>
                                 <option value="47">47</option>
                                 <option value="48">48</option>
                                 <option value="49">49</option>
                                 <option value="50">50</option>
                                 <option value="51">51</option>
                                 <option value="52">52</option>
                                 <option value="53">53</option>
                                 <option value="54">54</option>
                                 <option value="55">55</option>
                                 <option value="56">56</option>
                                 <option value="57">57</option>
                                 <option value="58">58</option>
                                 <option value="59">59</option>
                                 <option value="60">60</option>
                                 <option value="61">61</option>
                                 <option value="62">62</option>
                                 <option value="63">63</option>
                                 <option value="64">64</option>
                                 <option value="65">65</option>
                                 <option value="66">66</option>
                                 <option value="67">67</option>
                                 <option value="68">68</option>
                                 <option value="69">69</option>
                                 <option value="70">70</option>
                             </select>
                       </div>
                       <div class="form-group">
                           <label for="suspectGender">Suspect's Gender</label>
                             <select class="form-control" name="suspectGender">
                               <option  value="">Select Gender</option>
                               <option  value="Male">Male</option>
                               <option  value="Female">Female</option>
                             </select>
                       </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="suspectCrime">Crime Type</label>
                              <select class="form-control" name="suspectCrime">
                                <option  value="">Select Crime</option>
                                <option  value="Theft">Theft</option>
                                <option  value="Robbery">Robbery</option>
                                <option  value="Murder">Murder</option>
                                <option  value="Rape">Rape</option>
                                <option  value="Extortion">Extortion</option>
                                <option  value="Kidnapping">Kidnapping</option>
                                <option  value="Fraud">Fraud</option>
                                <option value="Child Abuse">Child Abuse</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description"> Your Complain</label>
                            <textarea  class="form-control" id="description" name="description" autocomplete="off" placeholder="Your Complain"></textarea>
                      </div>
                       <div class="form-group">
                            <label for="suspectPhoto"> Suspects Photo(If have any)</label>
                            <input type="file" class="form-control" id="suspectPhoto" name="suspectPhoto" autocomplete="off"/>
                      </div>
                       <div>
                           <button type="submit" class="btn btn-success" name="sendComplain"><span class="glyphicon glyphicon-send"></span> Send Complain</button>
                      </div>
                    </div>
                </form>
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
                  <input class="form-control" id="userPassword" placeholder="Password" type="password" name="userPassword">
                </div>
              </div>

              <div class="modal-footer">
                <a href="#" data-dismiss="modal" class="btn">Close</a>
                <button type="submit" class="btn btn-info submit" name="userLogIn">LogIn</button>
              </div>

            </form>
          </div>
      </div>

        <!--Pop Up Log In form -->
        <div class="modal fade" id="popUpLogIn">
          <div class="modal-dialog">
              <form class="modal-content" method="post" action="logIn.php">

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
                    <input class="form-control" id="adminPassword" placeholder="Password" type="password" name="adminPassword">
                  </div>
                </div>

                <div class="modal-footer">
                  <a href="#" data-dismiss="modal" class="btn">Close</a>
                  <button type="submit" class="btn btn-info submit" name="adminLogIn">LogIn</button>
                </div>

              </form>
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
						$('#complainForm').bootstrapValidator({
								feedbackIcons: {
									 valid: 'glyphicon glyphicon-ok',
									 invalid: 'glyphicon glyphicon-remove',
									 validating: 'glyphicon glyphicon-refresh'
								},
								fields: {

									 userNID: {
										validators: {
											numeric : {
												message: "Please enter number"
											},
											notEmpty:{
												message: "Please enter your NID number"
											},
                      stringLength: {
                        min: 10,
                        message: "10 digit required"
                      }
										}
									},

                  complainDate: {
                    validators: {
                      notEmpty: {
                        message: "Please select complain date"
                      }
                    }
                  },

                  suspectName: {
                    validators: {
                      stringLength: {
                         min: 5,
                         max: 20,
                         message: "Please enter suspect's name within 5-20 letters"
                      },
                      notEmpty:{
                        message: "Please enter suspect's name"
                      }
                    }
                  },

                  suspectAge: {
                   validators: {
                     notEmpty:{
                       message: "Please select suspect's age"
                     }
                   }
                 },

									suspectGender: {
										validators: {
											notEmpty: {
												message: "Gender is required"
											}
										}
									},

                  suspectCrime: {
                      validators: {
                          notEmpty: {
                             message: "Crime type is required"
                        }
                      }
                  },

									description: {
                    validators: {
                      notEmpty: {
                        message: "Description is required"
                      },
                      stringLength: {
                        min: 10,
                        max: 500,
                        message: "Write your complain within 10-500 characters"
                      }
                    }
                  }

								}
						});
				});
		</script>

  </body>
</html>
