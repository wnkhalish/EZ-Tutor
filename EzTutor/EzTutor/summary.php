<?php
require_once("php/header.php");
require_once("php/dbconfig.php");

if (!isset($_SESSION['userid'])) {
	session_destroy();
header('Location: index.php');
}
$uID = $_SESSION['userid'];

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
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
<div class="list-request"><br>
  </div><br><br>
  <h3 align="center" style="color:black;">SUMMARY</h3>
  <div class="container">
          <div class="row mb-5">
            <div class="col-md-12 mb-5">

              <div class="block-3 d-md-flex">
                <table id="tutor" class="table-spacing" style="width:100%">
				<?php
				$sql = "SELECT * FROM booking, tutor, subject, level, tabletime WHERE booking.tID = tutor.tID AND booking.sID = subject.sID AND booking.lID = level.lID AND booking.tableID = tabletime.tableID HAVING booking.uID ='$uID' AND booking.bstatus='2'";
				$result = $conn->query($sql);
				if ($result->num_rows > 0){
				while ($rs = $result->fetch_assoc()){
					$bID=$rs['bID'];
					$tID=$rs['tID'];
					$tistatus=$rs['tistatus'];
					$tname=$rs['tname'];
					$sname=$rs['sname'];
					$lname=$rs['lname'];
					$tstate=$rs['tstate'];
					$tcity=$rs['tcity'];

				?>
                 <tr><td class="geeks"><a href="#">
				   <?php
				   if ($tistatus == 0){
					   echo "<img alt='img' class='about-box-1-img' src='uploads/profiledefault.jpg'> ";
					   }else{
						   echo "<img alt='img' class='about-box-1-img' src='uploads/profiletutor".$tID.".jpg'> ";
						}
					?>
                   </a></td>

                   <td style="font-weight:800; font-size:20px; color:#E0C568FF"><?php echo $tname;?><br>
                     <p style="font-weight:100; font-size:16px; color:white"><?php echo $tcity;?>, <?php echo $tstate;?></p></td>
                   <td><?php echo $lname;?></td>
                   <td><?php echo $sname;?></td>
                   <td><span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span></td>
                   <td>
									 <button onclick="location.href='removebooking.php?bID=<?php echo $bID;?>'" class="btn btn-block button-red"><i class="fa fa-close"></i> Cancel Booking</button>
									 <button onclick="location.href='feedback.php?tID=<?php echo $tID;?>'" class="btn btn-block button-orange"><i class="fa fa-thumbs-up"></i> Give Feedback</button></td>
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
                         <h2>Your have not register any subject!</h2>
                         <a href="index.php">Back To Homepage</a>
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
