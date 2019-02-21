<?php

    require_once('dbConnect.php');
    session_start();
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
    <title>Criminal Entry</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet"></script>
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
                        <li><a href="thanaReport.php"><?php echo $result2['duty_area']; ?> Thana</a>  </li>
                        <li class="active"><a href="#criminalEntry"><span class="glyphicon glyphicon-edit"></span> Criminal Entry</a></li>
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
              <div class="panel-heading"><h2 align="center">Criminal Enrty</h2></div>
               <div class="panel-body">
                 <form  id="criminalEnrty" method="post" action="criminalInfoEntry.php" enctype="multipart/form-data">
                   <div class="col-md-6">
                       <div class="form-group">
                             <label for="criminalName">Criminal's Name</label>
                             <input type="text" class="form-control" id="criminalName" name="criminalName" autocomplete="off" placeholder=" Criminal's Name">
                       </div>
                       <div class="form-group">
                             <label for="criminalNID">Criminal's NID</label>
                             <input type="text" class="form-control" id="criminalNID" name="criminalNID" autocomplete="off" maxlength="20" placeholder=" Criminal's NID">
                       </div>
                       <div class="form-group">
                             <label for="criminalAge">Criminal's Age</label>
                             <select class="form-control" name="criminalAge">
                               <option value="">Criminal's Age</option>
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
                           <label for="suspectCrime">Criminal's Gender</label>
                           <select class="form-control" name="criminalGender">
                             <option value="">Criminal's Gender</option>
                             <option  value="Male">Male</option>
                             <option  value="Female">Female</option>
                         </select>
                       </div>
                       <div class="form-group">
                             <label for="criminalAddress">Criminal's Address</label>
                             <input type="text" class="form-control" id="criminalAddress" name="criminalAddress" autocomplete="off" placeholder=" Address">
                       </div>
                       <div class="form-group">
                         <label for="crimeDate">Crime Date</label>
                         <input type="date" class="form-control" id="crimeDate" name="crimeDate" autocomplete="off" placeholder=" Crime Date">
                       </div>
                     </div>

                     <div class="col-md-6">
                        <div class="form-group">
                             <label for="crimeType">Crime Name</label>
                             <select class="form-control" name="crimeType">
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
                             <label for="crimePlace">Crime Place</label>
                             <input type="text" class="form-control" id="crimePlace" name="crimePlace" autocomplete="off" placeholder=" Crime Place Name">
                       </div>
                       <div class="form-group">
                             <label for="arrestStatus"> Arrest Status</label>
                             <select class="form-control" name="arrestStatus">
                                 <option value="">Select Arrest Status</option>
                                 <option value="Arrested">Arrested</option>
                                 <option value="Not Arrested">Not Arrested</option>
                             </select>
                       </div>
                       <div class="form-group">
                           <label for="crimeDescription"> Crime Description</label>
                           <textarea  class="form-control" id="crimeDescription" name="crimeDescription" autocomplete="off" placeholder="Crime Description"></textarea>
                      </div>
                      <div class="form-group">
                          <label for="criminalPhoto"> Criminal's Photo</label>
                          <input type="file" class="form-control" id="criminalPhoto" name="criminalPhoto" autocomplete="off"/>
                       </div>
                       <div>
                            <button type="submit" class="btn btn-info submit" name="saveInformation"><span class="glyphicon glyphicon-folder-close"></span> Save</button>
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
						$('#criminalEnrty').bootstrapValidator({
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
                       min: 5,
                       max: 100,
                       message: "Please enter at least 5 characters and maximum 100 characters"
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
                        min: 5,
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
  </body>
</html>
