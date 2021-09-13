<?php
require_once("php/header.php");
require_once("php/dbconfig.php");
if (!isset($_SESSION['userid'])) {
	session_destroy();
header('Location: index.php');
}

$tID = $_SESSION['userid'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>EZ Tutor</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link href="css/tutoclass.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
  </head>
<body>
<br><br><br>
<h3 align="center" style="color:black; ">LIST OF SUBJECT</h3>
  <div class="container">
  <a href="liststudent.php" class="float">
                        <i class="fa fa-id-badge my-float"></i>
                    </a>

                    <a href="managecourse.php" class="floatplus">
                        <i class="fa fa-calendar my-floatplus"></i>
                    </a>

                    <div class="labell-container">
                        <div class="labell-text">Manage Course</div>
                        <i class="fa fa-play labell-arrow"></i>
                    </div>

                    <a href="addsubject.php" class="floatminus">
                        <i class="fa fa-calendar-plus-o my-floatminus"></i>
                    </a>

                    <div class="labell-containerr">
                        <div class="labell-textr">Add New Course</div>
                        <i class="fa fa-play labell-arrowr"></i>
                    </div>
          <div class="row mb-5">
            <div class="col-md-12 mb-5">

              <div class="block-3 d-md-flex">
                <table id="tutor" class="table-spacing" style="width:100%">

				<?php
				$sqlb ="SELECT * FROM course, tutor, level, subject WHERE course.tID = tutor.tID AND course.lID = level.lID AND course.sID = subject.sID HAVING course.tID = '$tID'";

				$resultb = $conn->query($sqlb);

				if ($resultb->num_rows > 0){
				while ($gg = $resultb->fetch_assoc()){

				$cID=$gg['cID'];
				$tname=$gg['tname'];
				$sname=$gg['sname'];
				$lname=$gg['lname'];
				$cprice=$gg['cprice'];
				$tistatus=$gg['tistatus'];
				$tstate=$gg['tstate'];
				$tcity=$gg['tcity'];
				$taveragerating=$gg['taveragerating'];
				?>
				<tr>
                   <td class="geeks"><a href="#">
				   <?php

				   if ($tistatus == 0){
					   echo "<img alt='img' class='about-box-1-img' src='uploads/profiledefault.jpg'> ";
				   }else{
					   echo "<img alt='img' class='about-box-1-img' src='uploads/profiletutor".$tID.".jpg'> ";
				   }

					?>

				   </a></td>
                   <td align="center" style="font-weight:800; font-size:20px; color:#E0C568FF"><?php echo $tname;?><br>
                     <p style="font-weight:100; font-size:16px; color:white"><?php echo $tcity;?>, <?php echo $tstate;?></p></td>
                   <td align="center"><?php echo $lname;?></td>
                   <td align="center"><?php echo $sname;?></td>

                   <td>

				   <?php
						   if($taveragerating >= 0 && $taveragerating < 1){
						   ?>
                           <span class="fa fa-star"></span>
                           <span class="fa fa-star"></span>
                           <span class="fa fa-star"></span>
                           <span class="fa fa-star"></span>
                           <span class="fa fa-star"></span>
						   <?php
						   }elseif($taveragerating >= 1 && $taveragerating < 2){
						   ?>
						   <span class="fa fa-star checked"></span>
                           <span class="fa fa-star"></span>
                           <span class="fa fa-star"></span>
                           <span class="fa fa-star"></span>
                           <span class="fa fa-star"></span>
						   <?php
						   }elseif($taveragerating >= 2 && $taveragerating < 3){
						   ?>
						   <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star"></span>
                           <span class="fa fa-star"></span>
                           <span class="fa fa-star"></span>
						   <?php
						   }elseif($taveragerating >= 3 && $taveragerating < 4){
						   ?>
						   <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star"></span>
                           <span class="fa fa-star"></span>
						   <?php
						   }elseif($taveragerating >= 4 && $taveragerating < 5){
						   ?>
						   <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star"></span>
						   <?php
						   }elseif($taveragerating == 5){
						   ?>
						   <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
						   <span class="fa fa-star checked"></span>
						   <span class="fa fa-star checked"></span>
						   <?php
						   }
						   ?>

					</td>
                   <td><p class="price">RM <?php echo $cprice;?>/hour</p>
				   <button onclick="location.href='updatesubject.php?cID=<?php echo $cID;?>'" class="btn btn-block button-blue"><i class="fa fa-envelope"></i> Update Subject</button>
				   <button onclick="location.href='removesubject.php?cID=<?php echo $cID;?>'" class="btn btn-block button-red"><i class="fa fa-close"></i> Delete Subject</button>
				 </td>
				</tr>
				<?php
				}
				}else{
				?>
				<td>
				<div id="notfound">
                       <div class="notfound">
                         <div class="notfound-404">
                           <h1>404</h1>
                         </div>
                         <h2>You have not register any subject!</h2>
                         <a href="aboutTutor.php">Back To Homepage</a>
                       </div>
                     </div>

				</td>
				 <?php
				}
				?>


                </table>

              </div>
            </div>
          </div>
		  </div>




  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>

  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

  </body>
</html>
