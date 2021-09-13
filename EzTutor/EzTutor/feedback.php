<?php
require_once("php/header.php");
require_once("php/dbconfig.php");

if (!isset($_SESSION['userid'])) {
	session_destroy();
header('Location: index.php');
}


$uID = $_SESSION['userid'];
$tID = mysqli_real_escape_string($conn,$_GET['tID']);

$sql = "SELECT * FROM tutor WHERE tID ='$tID'";
$result = $conn->query($sql);
while ($rs = $result->fetch_assoc()){

	$tname=$rs['tname'];
	$tstate=$rs['tstate'];
	$tcity=$rs['tcity'];
	$ustate=$rs['ustate'];
	$tistatus=$rs['tistatus'];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tutor Information</title>

    <link rel="stylesheet" type="text/css" href="css/plugin2.css">
    <link rel="stylesheet" type="text/css" href="css/stylee.css">
		<link rel="stylesheet" href="css/main2.css">

    <!-- Google Web Fonts  -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>

<body>
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-long-arrow-up"></i></button>
<br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="about-fixed">
                        <div class="my-pic">
                            <div class="photo-container">
							<?php
						   if ($tistatus == 0){
							   echo "<img alt='img' class='about-box-1-img' src='uploads/profiledefault.jpg'> ";
							   }else{
								   echo "<img alt='img' class='about-box-1-img' src='uploads/profiletutor".$tID.".jpg'> ";
								   }
							?>

                            </div>
                        </div>

                        <div class="my-detail">
                            <div class="white-spacing">
                                <h1><?php echo $tname;?></h1>
                                <span>Location: <?php echo $tcity;?>, <?php echo $tstate;?></span>
                                <br>
                                <p>Primary School Students</p>

                            </div>

                            <ul class="social-icon">
                                <li><a href="#" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" target="_blank" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#" target="_blank" class="envelope"><i class="icon-envelope"></i></a></li>
                                <li><a href="#" target="_blank" class="whatsapp"><i class="fa fa-whatsapp"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-1">
                    <div class="col-md-2 page-body">
                        <div class="row">
                            <div class="sub-title">
                                <h2>Feedback</h2>
                                <i class="material-icons">person</i>
                            </div>
                                <div class="col-md-2 content-page">

                                    <form action="submitfeedback.php?tID=<?php echo $tID;?>" method="POST">
                                        <div class="container2">
                                          <label for="comment"><b>How do you rate your overall experience?</b></label><br>
                                          <fieldset class="rating">
                                              <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>

                                              <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>

                                              <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>

                                              <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>

                                              <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                                          </fieldset>
                                          <br>

                                          <br>
                                            <label for="comment"><b>Comment</b></label><br>
                                            <textarea type="textarea" name="content" id="comments" placeholder="Your Comments" maxlength="6000" cols="94" rows="7" required></textarea>
                                            <br>
                                            <div class="row3">
                                              <br>

                                            </div>
                                            <hr>
                                            <button class="submit-btn" name="submit">
                                                  <span>Post<i class="fa fa-long-arrow-right m-l-7"></i></span>
                                            </button>

                                </div>

                                </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 340 || document.documentElement.scrollTop > 340) {
                document.getElementById("myBtn").style.display = "block";
            } else {
                document.getElementById("myBtn").style.display = "none";
            }
        }

        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }

        function openNav() {
            document.getElementById("mySidenav").style.width = "100%";

        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>
</body>

</html>
