<?php
require_once("php/header.php");
require_once("php/dbconfig.php");

$tID = $_SESSION['userid'];
$cID = mysqli_real_escape_string($conn,$_GET['cID']);

$sqlb = "SELECT * FROM course, level, subject WHERE course.lID = level.lID AND course.sID = subject.sID HAVING course.cID = '$cID'";
$resultb = $conn->query($sqlb);

while ($gg = $resultb->fetch_assoc()){
	$sname=$gg['sname'];
	$lname=$gg['lname'];
	$cprice=$gg['cprice'];
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>EZ Tutor</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/plugin.css">
    <link rel="stylesheet" type="text/css" href="css/login4.css">
    <link rel="stylesheet" type="text/css" href="css/style4.css">
    <style>

    </style>

</head>

<body>

    <div class="list-request">
        <h3 class="inline-block">UPDATE SUBJECT DETAILS</h3>
      </div><br><br>
    <section class="white-bg section-padding-bottom">
        <div class="section-header section-margin-top">

            <div class="form">
                <ul class="tabs">
                    <li><a class="tablinks" onclick="openTab(event, 'Profile')" class="active">Edit Subject</a></li>
                </ul>

                <div id="Profile" class="tabcontent23 show">
                    <form action="editsubject.php?cID=<?php echo $cID;?>" method="POST">
                      <label for='user'>Level</label>
					  <input type='text' id='level-list' name='level-list' value="<?php echo $lname;?>" disabled>

                      <label for='user'>Subject</label>
					  <input type='text' id='subject-list' name='subject-list' value="<?php echo $sname;?>" disabled>

                          <div>
                             <label for="user">Rate Per Hour (RM)</label>
                             <input type='text' id='umail' name='cprice' value="<?php echo $cprice;?>" /required>
                              <br>
                           </div>
							  <br>
						<div class="row">
							<div class="col-75">
                              <input type="submit" value="Submit" class="button" />
                          </div>
						</div>
                      </div>
                    </form>
                </div>

            </div>
        </div>

    </section>

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

    <script src="js/index.js"></script>

</body>

</html>
