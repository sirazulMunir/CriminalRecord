<?php
  require_once('dbConnect.php');
  session_start();
  $email2 = $_SESSION['authority_email'];
  $row2= $conn->query("SELECT * FROM `authority_info` WHERE authority_email='$email2'");
  $result2 = mysqli_fetch_array($row2);

  $cThana = $result2['duty_area'];
  $row= $conn->query("SELECT COUNT(criminal_id) as C FROM criminal join crime_record on criminal_id = crime_id  WHERE (thana='$cThana')");
  $result = mysqli_fetch_array($row);

  $row1= $conn->query("SELECT AVG(criminal_age) as Age FROM criminal join crime_record on criminal_id = crime_id  WHERE (thana='$cThana')");
  $result1 = mysqli_fetch_array($row1);

  $row3= $conn->query("SELECT COUNT(crime_id) as D FROM criminal join crime_record on criminal_id = crime_id WHERE (thana='$cThana' and crime_type ='Robbery') group by crime_type");
  $result3= mysqli_fetch_array($row3);

  if ($result3['D'] == 0) {
    $D = 0 ;
  }else {
    $D = $result3['D'];
  }

  $row4= $conn->query("SELECT COUNT(crime_id) as E FROM criminal join crime_record on criminal_id = crime_id WHERE (thana='$cThana' and crime_type ='Fraud') group by crime_type");
  $result4= mysqli_fetch_array($row4);

  if ($result4['E'] == 0) {
    $E = 0 ;
  }else {
    $E = $result4['E'];
  }

  $row5= $conn->query("SELECT COUNT(crime_id) as F FROM criminal join crime_record on criminal_id = crime_id WHERE (thana='$cThana' and crime_type ='Child Abuse') group by crime_type");
  $result5= mysqli_fetch_array($row5);

  if ($result5['F'] == 0) {
    $F = 0 ;
  }else {
    $F = $result5['F'];
  }

  $row6= $conn->query("SELECT COUNT(crime_id) as G FROM criminal join crime_record on criminal_id = crime_id WHERE (thana='$cThana' and crime_type ='Kidnapping') group by crime_type");
  $result6= mysqli_fetch_array($row6);

  if ($result6['G'] == 0) {
    $G = 0 ;
  }else {
    $G = $result6['G'];
  }

  $row7= $conn->query("SELECT COUNT(crime_id) as H FROM criminal join crime_record on criminal_id = crime_id WHERE (thana='$cThana' and crime_type ='Extortion') group by crime_type");
  $result7= mysqli_fetch_array($row7);

  if ($result7['H'] == 0) {
    $H = 0 ;
  }else {
    $H = $result7['H'];
  }

  $row8= $conn->query("SELECT COUNT(crime_id) as I FROM criminal join crime_record on criminal_id = crime_id WHERE (thana='$cThana' and crime_type ='Rape') group by crime_type");
  $result8= mysqli_fetch_array($row8);

  if ($result8['I'] == 0) {
    $I = 0 ;
  }else {
    $I = $result8['I'];
  }

  $row9= $conn->query("SELECT COUNT(crime_id) as J FROM criminal join crime_record on criminal_id = crime_id WHERE (thana='$cThana' and crime_type ='Murder') group by crime_type");
  $result9= mysqli_fetch_array($row9);

  if ($result9['J'] == 0) {
    $J = 0 ;
  }else {
    $J = $result9['J'];
  }

  $row10= $conn->query("SELECT COUNT(crime_id) as K FROM criminal join crime_record on criminal_id = crime_id WHERE (thana='$cThana' and crime_type ='Theft') group by crime_type");
  $result10= mysqli_fetch_array($row10);

  if ($result10['K'] == 0) {
    $K = 0 ;
  }else {
    $K = $result10['K'];
  }

  $row11= $conn->query("SELECT COUNT(criminal_id) as L FROM criminal join crime_record on criminal_id = crime_id  WHERE (thana='$cThana' and criminal_gender='Male')");
  $result11 = mysqli_fetch_array($row11);

  $row12= $conn->query("SELECT COUNT(criminal_id) as M FROM criminal join crime_record on criminal_id = crime_id  WHERE (thana='$cThana' and criminal_gender='Female')");
  $result12 = mysqli_fetch_array($row12);

  $row13= $conn->query("SELECT COUNT(criminal_id) as N FROM criminal join crime_record on criminal_id = crime_id  WHERE (thana='$cThana' and arrest_status='Arrested')");
  $result13 = mysqli_fetch_array($row13);

  $row14= $conn->query("SELECT COUNT(criminal_id) as O FROM criminal join crime_record on criminal_id = crime_id  WHERE (thana='$cThana' and arrest_status='Not Arrested')");
  $result14 = mysqli_fetch_array($row14);

  $conn->close();
 ?>

 <!DOCTYPE html>
 <html lang="en">
   <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Thana Report</title>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

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
                         <li class="active"><a href="#"> <?php echo $result2['duty_area']; ?> Thana</a>  </li>
                         <li><a href="criminalEntry.php"><span class="glyphicon glyphicon-edit"></span> Criminal Entry</a></li>
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
                <div class="panel-heading"><h3 align="center">Thana Report</h3></div>
                 <div class="row">
                   <div class="col-md-12">
                     <div class="panel panel-default">
                       <div class="panel-body">
                         <div class="row">
                           <div class="col-md-12">
                             <div class="row">
                               <div class="col-md-12">
                                 <div class="panel panel-default">
                                     <table class="table table-bordered">
                                        <thead>
                                          <tr>
                                            <th>Name</th>
                                            <th>Count</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td>Total Criminals</td>
                                            <td><?php echo $result['C']; ?></td>
                                          </tr>
                                          <tr>
                                            <td>Male Criminals</td>
                                            <td><?php echo $result11['L']; ?></td>
                                          </tr>
                                          <tr>
                                            <td>Female Criminals</td>
                                            <td><?php echo $result12['M']; ?></td>
                                          </tr>
                                          <tr>
                                            <td>Arrested Criminals</td>
                                            <td><?php echo $result13['N']; ?></td>
                                          </tr>
                                          <tr>
                                            <td>Not Arrested Criminals</td>
                                            <td><?php echo $result14['O']; ?></td>
                                          </tr>
                                          <tr>
                                            <td>Avarage age</td>
                                            <td><?php echo $result1['Age']; ?></td>
                                          </tr>
                                        </tbody>
                                     </table>
                                 </div>
                               </div>
                             </div><br><hr><br>
                             <div class="row">
                                 <div class="col-md-12">
                                   <div id="criminalChart" style="height: 350px; width: 100%;"></div>
                                 </div>
                           </div>
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
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

 <script type="text/javascript">
	window.onload = function () {
		var chart = new CanvasJS.Chart("criminalChart", {

			title:{
				text:"Criminal count by Crime"

			},
        animationEnabled: true,

      axisX:{
				interval: 1,
				gridThickness: 0,
				labelFontSize: 12,
				labelFontStyle: "normal",
				labelFontWeight: "normal",
				labelFontFamily: "Lucida Sans Unicode"

			},
			axisY2:{
				interlacedColor: "rgba(1,77,101,.2)",
				gridColor: "rgba(1,77,101,.1)"

			},

			data: [
			{
				type: "bar",
        name: "crimes",
				axisYType: "secondary",
				color: "#014D65",
				dataPoints: [

				{y: <?php echo $I; ?>, label: "Rape" },
				{y: <?php echo $J; ?>, label: "Murder"},
				{y: <?php echo $D; ?>, label: "Robbery"},
				{y: <?php echo $E; ?>, label: "Fraud" },
				{y: <?php echo $K; ?>, label: "Theft"},
				{y: <?php echo $H; ?>, label: "Extortion"},
        {y: <?php echo $G; ?>, label: "Kidnapping"},
        {y: <?php echo $F; ?>, label: "Child Abuse"}
				]
			}

			]
		});

chart.render();
}
</script>
