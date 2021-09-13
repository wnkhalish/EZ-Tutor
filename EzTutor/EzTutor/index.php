<?php
require_once("php/header.php");
require_once("php/dbconfig.php");
?>
<script type="text/javascript">
function getSubject(val) {
	$.ajax({
	type: "POST",
	url: "get_subject.php",
	data:'lID='+val,
	success: function(data){
		$("#subject-list").html(data);
	}
	});
}
</script>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>EZ Tutor</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Maven+Pro:400,900" rel="stylesheet">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>


  <!-- END nav -->

	<div class="block-31" style="position: relative;">
    <div class="owl-carousel loop-block-31 ">
      <div class="block-30 item">
				<img src="images/cover1.jpg" class="mySlides ">
				<img src="images/cover2.jpg" class="mySlides ">
				<img src="images/cover3.jpg" class="mySlides ">
      </div>
    </div>
  </div>


  <div class="container">
      <div class="row mb-5">
        <div class="col-md-12">

          <div class="block-32">
            <form action="index.php" method="POST">
              <div class="row">
                <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                  <label>Level</label>
                  <div class="field-icon-wrap">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <select name="level" id="level-list" onChange="getSubject(this.value);" class="form-control">
                      <option value="">Select Level</option>
                      <?php
						$sql = "SELECT * FROM level";
						$result = $conn->query($sql);
						while ($rs = $result->fetch_assoc()){
							?>
							<option value="<?php echo $rs["lID"]; ?>"><?php echo $rs["lname"]; ?></option>
							<?php
						}
						?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                  <label>Subject</label>
                  <div class="field-icon-wrap">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <select name="subject-list" id="subject-list" class="form-control">
                      <option value="">Subject</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6 mb-3 mb-md-0 col-lg-3">
                      <label>State</label>
                      <div class="field-icon-wrap">
                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                        <select name="state" id="state" class="form-control">
                          <option value="">State</option>
                          <option value="Johor">Johor</option>
                          <option value="Kedah">Kedah</option>
                          <option value="Kelantan">Kelantan</option>
                          <option value="Malacca">Malacca</option>
                          <option value="Negeri Sembilan">Negeri Sembilan</option>
                          <option value="Pahang">Pahang</option>
                          <option value="Penang">Penang</option>
                          <option value="Perak">Perak</option>
                          <option value="Perlis">Perlis</option>
                          <option value="Sabah">Sabah</option>
                          <option value="Sarawak">Sarawak</option>
                          <option value="Selangor">Selangor</option>
                          <option value="Terengganu">Terengganu</option>
                        </select>
                      </div>
                </div>
                <div class="col-md-6 col-lg-3 align-self-end">
                  <button type="submit" name="submit" class="btn btn-block button-purple"><i class="fa fa-search"></i> search now</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>


          <div class="row mb-5">
            <div class="col-md-12 mb-5">

              <div class="block-3 d-md-flex">
                <table id="tutor" class="table-spacing" style="width:100%">
				<?php
				if(!isset($_POST['submit'])){
				$sqlb ="SELECT * FROM course, tutor, level, subject WHERE course.tID = tutor.tID AND course.lID = level.lID AND course.sID = subject.sID";
				}else{
					$level = $_POST['level'];
					$subject = $_POST['subject-list'];
					$state = $_POST['state'];

					if($subject != ""){
					$sqlb ="SELECT * FROM course, tutor, level, subject WHERE course.tID = tutor.tID AND course.lID = level.lID AND course.sID = subject.sID HAVING course.sID = '$subject'";
				}elseif($level != "" && $state != ""){
					$sqlb ="SELECT * FROM course, tutor, level, subject WHERE course.tID = tutor.tID AND course.lID = level.lID AND course.sID = subject.sID HAVING course.lID = '$level' AND tutor.tstate ='$state'";
				}elseif($state != ""){
					$sqlb ="SELECT * FROM course, tutor, level, subject WHERE course.tID = tutor.tID AND course.lID = level.lID AND course.sID = subject.sID HAVING tutor.tstate ='$state'";
				}elseif($level == "" && $state == "" && $subject == ""){
					$sqlb ="SELECT * FROM course, tutor, level, subject WHERE course.tID = tutor.tID AND course.lID = level.lID AND course.sID = subject.sID";
				}
					else{
					$sqlb ="SELECT * FROM course, tutor, level, subject WHERE course.tID = tutor.tID AND course.lID = level.lID AND course.sID = subject.sID HAVING course.lID = '$level'";
				}
				}

				$resultb = $conn->query($sqlb);

				if ($resultb->num_rows > 0){
				while ($gg = $resultb->fetch_assoc()){

				$cID=$gg['cID'];
				$tname=$gg['tname'];
				$sname=$gg['sname'];
				$lname=$gg['lname'];
				$cprice=$gg['cprice'];
				$tID=$gg['tID'];
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
                   <td><p class="price">RM <?php echo $cprice;?>/hour
				   <?php
			       if (!isset($_SESSION['role'])){
					?>
					</p><button onclick="location.href='login.php'" class="btn btn-block button-purple">Login</button></td>
				   <?php
				   }else{
					   if($_SESSION['role'] == "student"){
					?>
					</p><button onclick="location.href='tuto.php?tID=<?php echo $tID;?>&cID=<?php echo $cID;?>&lname=<?php echo $lname;?>&sname=<?php echo $sname;?>'" class="btn btn-block button-purple">Check Availabilty</button></td>
					<?php
						}elseif($_SESSION['role'] == "tutor"){
					?>
				   </p><button onclick="location.href='tuto.php?tID=<?php echo $tID;?>&cID=<?php echo $cID;?>&lname=<?php echo $lname;?>&sname=<?php echo $sname;?>'" class="btn btn-block button-purple">View</button></td>
				   <?php
				   }
				   }
					?>
                 </tr>
				 <?php
				}
				}
				else{
				?>
				<td>
                     <div id="notfound">
                       <div class="notfound">
                         <div class="notfound-404">
                           <h1>404</h1>
                         </div>
                         <h2>Opss, Tutor not found!</h2>
                         <p>The tutor you are looking for might have been removed had its name changed or is temporarily unavailable.</p>
                         <a href="#">Back To Homepage</a>
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

	<script>
			var slideIndex = 0;
			carousel();

			function carousel() {
					var i;
					var x = document.getElementsByClassName("mySlides");
					for (i = 0; i < x.length; i++) {
							x[i].style.display = "none";
					}
					slideIndex++;
					if (slideIndex > x.length) {
							slideIndex = 1
					}
					x[slideIndex - 1].style.display = "block";
					setTimeout(carousel, 3000);
			}
	</script>
  </body>
</html>
