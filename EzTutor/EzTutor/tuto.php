<?php
require_once("php/header.php");
require_once("php/dbconfig.php");

$uID = $_SESSION['userid'];
$id = mysqli_real_escape_string($conn,$_GET['tID']);
$cID = mysqli_real_escape_string($conn,$_GET['cID']);
$lname = mysqli_real_escape_string($conn,$_GET['lname']);
$sname = mysqli_real_escape_string($conn,$_GET['sname']);

$sqlb ="SELECT * FROM tutor  WHERE tID = '$id'";
$resultb = $conn->query($sqlb);
while ($gg = $resultb->fetch_assoc()){
	$status=$gg['tistatus'];
	$tname=$gg['tname'];
	$tdob=$gg['tdob'];
	$temail=$gg['temail'];
	$tpass=$gg['tpass'];
	$tstate=$gg['tstate'];
	$tcity=$gg['tcity'];
	$tphno=$gg['tphno'];
	$tistatus=$gg['tistatus'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>EZ Tutor</title>

    <link rel="stylesheet" type="text/css" href="css/plugin2.css">
    <link rel="stylesheet" type="text/css" href="css/style4.css">


    <!-- Google Web Fonts  -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

</head>

<body>
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-long-arrow-up"></i></button>
<br><br>

    <div id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="about-fixed">
                        <div class="my-pic">
							<?php

				   if ($tistatus == 0){
					   echo "<img alt='img' class='about-box-1-img' src='uploads/profiledefault.jpg'> ";
				   }else{
					   echo "<img alt='img' class='about-box-1-img' src='uploads/profiletutor".$id.".jpg'> ";
				   }
				   ?>

                        </div>

                        <div class="my-detail">
                            <div class="white-spacing">
                                <h1><?php echo $tname;?></h1>
                                <span>Lokasi: <?php echo $tcity;?>, <?php echo $tstate;?></span>
                                <br>
                                <div class="rating"><span>Rating:</span>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <p>Major in Math at UPM </p>
                                <p>I have tutored over 80 students</p>
                            </div>

                            <ul class="social-icon">
                                <li><a href="#" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" target="_blank" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#" target="_blank" class="envelope"><i class="icon-envelope"></i></a></li>
                                <li><a href="#" target="_blank" class="whatsapp"><i class="fa fa-whatsapp"></i></a></li>
                            </ul>
                        </div>

                        <aside class="testimonials aside section">
                            <div class="section-inner">
                                <div class="content">
                                    <div class="item">
                                        <blockquote class="quote">
                                            <p><i class="fa fa-quote-left"></i><?php echo $tname;?> has really helped me to achieve my goals in class. Working with Mr. Khairul has improved my marks more than I would have ever done on my own.</p>
                                        </blockquote>
                                        <p class="source"><span class="name">Faisal Amin</span>
                                            <br /><span class="title"> aged 15</span></p>
                                    </div>

                                    <p><a class="more-link" href="#"><i class="fa fa-external-link"></i> More on Linkedin</a></p>
                                    <div id="mySidenav" class="sidenav">
                                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                                        <a> Hi students! On the schedule, all the bookings that are available will be displayed using coloured time slots.</a>
										<a> Click on the time slot, specifying your subject then click submit to book your class. </a>

                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>

                <div class="col-md-1">
                    <div class="col-md-2 page-body">
                        <div class="row">
                            <div class="sub-title">
                                <h2><?php echo $sname;?> (<?php echo $lname;?>)</h2>
                              <i  class="icon-calendar"></i>
                            </div>
                            <div class="col-md-2 content-page">
                                <div class="col-md-2 blog-post">
                                            <form action="bookings.php?tID=<?php echo $id;?>&cID=<?php echo $cID;?>&lname=<?php echo $lname;?>&sname=<?php echo $sname;?>" method="POST" class="book-form">
                                                <span class="book-form-title">Book a Class Now! </span>
                                                <main>
                                                    <div class="calendar">
                                                        <div class="header2">
                                                            <div>time</div>
                                                            <div>mon</div>
                                                            <div>tue</div>
                                                            <div>wed</div>
                                                            <div>thu</div>
                                                            <div>fri</div>
                                                            <div>sat</div>
                                                            <div>sun</div>
                                                        </div>

                                                        <div class="week">
														<div class="day"><span>9:00</span>am</div>
														<?php
														$sql1 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '1' AND bstatus ='0'";
														$result = $conn->query($sql1);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="1"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql14 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '14' AND bstatus ='0'";
														$result = $conn->query($sql14);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="14"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql27 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '27' AND bstatus ='0'";
														$result = $conn->query($sql27);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="27"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql40 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '40' AND bstatus ='0'";
														$result = $conn->query($sql40);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="40"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql53 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '53' AND bstatus ='0'";
														$result = $conn->query($sql53);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="53"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql66 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '66' AND bstatus ='0'";
														$result = $conn->query($sql66);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="66"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql79 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '79' AND bstatus ='0'";
														$result = $conn->query($sql79);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="79"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>
														</div>

														<div class="week">
														<div class="day"><span>10:00</span>am</div>
														<?php
														$sql2 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '2' AND bstatus ='0'";
														$result = $conn->query($sql2);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="2"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql15 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '15' AND bstatus ='0'";
														$result = $conn->query($sql15);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="15"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql28 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '28' AND bstatus ='0'";
														$result = $conn->query($sql28);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="28"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql41 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '41' AND bstatus ='0'";
														$result = $conn->query($sql41);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="41"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql54 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '54' AND bstatus ='0'";
														$result = $conn->query($sql54);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="54"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql67 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '67' AND bstatus ='0'";
														$result = $conn->query($sql67);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="67"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql80 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '80' AND bstatus ='0'";
														$result = $conn->query($sql80);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="80"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>
														</div>

														<div class="week">
														<div class="day"><span>11:00</span>am</div>
														<?php
														$sql3 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '3' AND bstatus ='0'";
														$result = $conn->query($sql3);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="3"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql16 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '16' AND bstatus ='0'";
														$result = $conn->query($sql16);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="16"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql29 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '29' AND bstatus ='0'";
														$result = $conn->query($sql29);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="29"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql42 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '42' AND bstatus ='0'";
														$result = $conn->query($sql42);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="42"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql55 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '55' AND bstatus ='0'";
														$result = $conn->query($sql55);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="55"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql68 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '68' AND bstatus ='0'";
														$result = $conn->query($sql68);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="68"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql81 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '81' AND bstatus ='0'";
														$result = $conn->query($sql81);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="81"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>
														</div>

														<div class="week">
														<div class="day"><span>12:00</span>pm</div>
														<?php
														$sql4 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '4' AND bstatus ='0'";
														$result = $conn->query($sql4);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="4"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql17 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '17' AND bstatus ='0'";
														$result = $conn->query($sql17);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="17"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql30 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '30' AND bstatus ='0'";
														$result = $conn->query($sql30);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="30"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql43 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '43' AND bstatus ='0'";
														$result = $conn->query($sql43);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="43"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql56 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '56' AND bstatus ='0'";
														$result = $conn->query($sql56);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="56"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql69 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '69' AND bstatus ='0'";
														$result = $conn->query($sql69);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="69"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql82 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '82' AND bstatus ='0'";
														$result = $conn->query($sql82);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="82"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>
														</div>

														<div class="week">
														<div class="day"><span>1:00</span>pm</div>
														<?php
														$sql5 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '5' AND bstatus ='0'";
														$result = $conn->query($sql5);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="5"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql18 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '18' AND bstatus ='0'";
														$result = $conn->query($sql18);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="18"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql31 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '31' AND bstatus ='0'";
														$result = $conn->query($sql31);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="31"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql44 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '44' AND bstatus ='0'";
														$result = $conn->query($sql44);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="44"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql57 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '57' AND bstatus ='0'";
														$result = $conn->query($sql57);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="57"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql70 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '70' AND bstatus ='0'";
														$result = $conn->query($sql70);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="70"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql83 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '83' AND bstatus ='0'";
														$result = $conn->query($sql83);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="83"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>
														</div>

														<div class="week">
														<div class="day"><span>2:00</span>pm</div>
														<?php
														$sql6 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '6' AND bstatus ='0'";
														$result = $conn->query($sql6);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="6"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql19 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '19' AND bstatus ='0'";
														$result = $conn->query($sql19);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="19"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql32 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '32' AND bstatus ='0'";
														$result = $conn->query($sql32);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="32"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql45 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '45' AND bstatus ='0'";
														$result = $conn->query($sql45);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="45"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql58 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '58' AND bstatus ='0'";
														$result = $conn->query($sql58);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="58"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql71 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '71' AND bstatus ='0'";
														$result = $conn->query($sql71);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="71"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql84 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '84' AND bstatus ='0'";
														$result = $conn->query($sql84);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="84"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>
														</div>

														<div class="week">
														<div class="day"><span>3:00</span>pm</div>
														<?php
														$sql7 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '7' AND bstatus ='0'";
														$result = $conn->query($sql7);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="7"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql20 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '20' AND bstatus ='0'";
														$result = $conn->query($sql20);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="20"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql33 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '33' AND bstatus ='0'";
														$result = $conn->query($sql33);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="33"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql46 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '46' AND bstatus ='0'";
														$result = $conn->query($sql46);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="46"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql59 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '59' AND bstatus ='0'";
														$result = $conn->query($sql59);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="59"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql72 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '72' AND bstatus ='0'";
														$result = $conn->query($sql72);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="72"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql85 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '85' AND bstatus ='0'";
														$result = $conn->query($sql85);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="85"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>
														</div>

														<div class="week">
														<div class="day"><span>4:00</span>pm</div>
														<?php
														$sql8 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '8' AND bstatus ='0'";
														$result = $conn->query($sql8);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="8"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql21 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '21' AND bstatus ='0'";
														$result = $conn->query($sql21);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="21"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql34 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '34' AND bstatus ='0'";
														$result = $conn->query($sql34);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="34"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql47 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '47' AND bstatus ='0'";
														$result = $conn->query($sql47);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="47"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql60 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '60' AND bstatus ='0'";
														$result = $conn->query($sql60);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="60"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql73 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '73' AND bstatus ='0'";
														$result = $conn->query($sql73);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="73"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql86 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '86' AND bstatus ='0'";
														$result = $conn->query($sql86);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="86"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>
														</div>

														<div class="week">
														<div class="day"><span>5:00</span>pm</div>
														<?php
														$sql9 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '9' AND bstatus ='0'";
														$result = $conn->query($sql9);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="9"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql22 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '22' AND bstatus ='0'";
														$result = $conn->query($sql22);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="22"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql35 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '35' AND bstatus ='0'";
														$result = $conn->query($sql35);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="35"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql48 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '48' AND bstatus ='0'";
														$result = $conn->query($sql48);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="48"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql61 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '61' AND bstatus ='0'";
														$result = $conn->query($sql61);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="61"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql74 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '74' AND bstatus ='0'";
														$result = $conn->query($sql74);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="74"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql87 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '87' AND bstatus ='0'";
														$result = $conn->query($sql87);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="87"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>
														</div>

														<div class="week">
														<div class="day"><span>6:00</span>pm</div>
														<?php
														$sql10 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '10' AND bstatus ='0'";
														$result = $conn->query($sql10);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="10"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql23 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '23' AND bstatus ='0'";
														$result = $conn->query($sql23);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="23"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql36 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '36' AND bstatus ='0'";
														$result = $conn->query($sql36);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="36"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql49 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '49' AND bstatus ='0'";
														$result = $conn->query($sql49);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="49"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql62 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '62' AND bstatus ='0'";
														$result = $conn->query($sql62);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="62"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql75 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '75' AND bstatus ='0'";
														$result = $conn->query($sql75);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="75"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql88 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '88' AND bstatus ='0'";
														$result = $conn->query($sql88);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="88"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>
														</div>

														<div class="week">
														<div class="day"><span>7:00</span>pm</div>
														<?php
														$sql11 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '11' AND bstatus ='0'";
														$result = $conn->query($sql11);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="11"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql24 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '24' AND bstatus ='0'";
														$result = $conn->query($sql24);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="24"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql37 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '37' AND bstatus ='0'";
														$result = $conn->query($sql37);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="37"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql50 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '50' AND bstatus ='0'";
														$result = $conn->query($sql50);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="50"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql63 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '63' AND bstatus ='0'";
														$result = $conn->query($sql63);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="63"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql76 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '76' AND bstatus ='0'";
														$result = $conn->query($sql76);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="76"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql89 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '89' AND bstatus ='0'";
														$result = $conn->query($sql89);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="89"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>
														</div>

														<div class="week">
														<div class="day"><span>8:00</span>pm</div>
														<?php
														$sql12 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '12' AND bstatus ='0'";
														$result = $conn->query($sql12);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="12"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql25 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '25' AND bstatus ='0'";
														$result = $conn->query($sql25);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="25"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql38 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '38' AND bstatus ='0'";
														$result = $conn->query($sql38);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="38"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql51 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '51' AND bstatus ='0'";
														$result = $conn->query($sql51);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="51"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql64 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '64' AND bstatus ='0'";
														$result = $conn->query($sql64);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="64"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql77 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '77' AND bstatus ='0'";
														$result = $conn->query($sql77);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="77"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql90 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '90' AND bstatus ='0'";
														$result = $conn->query($sql90);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="90"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>
														</div>

														<div class="week">
														<div class="day"><span>9:00</span>pm</div>
														<?php
														$sql13 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '13' AND bstatus ='0'";
														$result = $conn->query($sql13);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="13"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql26 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '26' AND bstatus ='0'";
														$result = $conn->query($sql26);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="26"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql39 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '39' AND bstatus ='0'";
														$result = $conn->query($sql39);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="39"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql52 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '52' AND bstatus ='0'";
														$result = $conn->query($sql52);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="52"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql65 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '65' AND bstatus ='0'";
														$result = $conn->query($sql65);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="65"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql78 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '78' AND bstatus ='0'";
														$result = $conn->query($sql78);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="78"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>

														<?php
														$sql91 = "SELECT * FROM booking  WHERE cID = '$cID' AND tableID = '91' AND bstatus ='0'";
														$result = $conn->query($sql91);
														if ($result->num_rows > 0){
														?>
														<div class="day"><label class="containerC"><input type="checkbox" name="Days[]" value="91"><span class="checkmarkk"></span></label></div>
														<?php
														}else{
														?>
														<div class="day"></div>
														<?php
														}
														?>
														</div>



													<br>
													</div>
                                                    </div><br><br>
                                                </main><br><br>


												<?php
												if($_SESSION['role'] == "student"){
												?>
													<button class="submit-btn" name="submit">
                            <span>SUBMIT<i class="fa fa-long-arrow-right m-l-7"></i></span>
                          </button>
													<?php
												}
												?>

                                            </form>
                            </div>
                        </div>
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
