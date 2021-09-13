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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tutor - About</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700' rel='stylesheet' type='text/css'>
    <link href="css/plugin.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="css/tutoclass.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <section class="white-bg section-padding-bottom">
        <div class="container">

            <div class="section-header section-margin-top">
            </div>

            <div class="row">

                <div class="col-lg-9">
                    <a href="liststudent.php" class="float">
                        <i class="fa fa-id-badge my-float"></i>
                    </a>

					<div class="label-container">
                        <div class="label-text">List of Student</div>
                        <i class="fa fa-play labell-arrow"></i>
                    </div>

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

                    <div class="list-request">
                        <h2 class="inline-block">LIST OF REQUEST </h2>
                        <table id="tutor" class="table-spacing" style="width:100%">

						 <?php
						$sql = "SELECT * FROM booking, student, subject, level, tabletime WHERE booking.uID = student.uID AND booking.sID = subject.sID AND booking.lID = level.lID AND booking.tableID = tabletime.tableID HAVING booking.tID ='$tID' AND booking.bstatus='1'";
						$result = $conn->query($sql);
						if ($result->num_rows > 0){
						while ($rs = $result->fetch_assoc()){

							$bID=$rs['bID'];
							$uID=$rs['uID'];
							$uname=$rs['uname'];
							$sname=$rs['sname'];
							$lname=$rs['lname'];
							$ustate=$rs['ustate'];
							$ucity=$rs['ucity'];
							$uistatus=$rs['uistatus'];
							$tableday=$rs['tableday'];
							$tablesdate=$rs['tablesdate'];
							$tableedate=$rs['tableedate'];
						?>


                         <tr>
                           <td class="geeks"><a href="#">
						   <?php
						   if ($uistatus == 0){
							   echo "<img alt='img' class='about-box-1-img' src='uploads/profiledefault.jpg'> ";
							   }else{
								   echo "<img alt='img' class='about-box-1-img' src='uploads/profilestudent".$uID.".jpg'> ";
								   }
							?>
						   </a></td>
                           <td align="center" style="font-weight:800; font-size:20px; color:#E0C568FF"><?php echo $uname;?><br>
                             <p style="font-weight:100; font-size:16px; color:white"><?php echo $ucity;?>, <?php echo $ustate;?></p></td>
                           <td align="center"><?php echo $sname;?><br>(<?php echo $lname;?>)</td>
                           <td align="center"><div class="day">
                               <p><?php echo $tableday;?></p>
                               <div class="time">
                                   <p><?php echo $tablesdate;?> - <?php echo $tableedate;?></p>
                               </div>
                           </div></td>
                           <td><div class="flat-form">
															 <button type="submit" onclick="location.href='acceptbooking.php?bID=<?php echo $bID;?>&uID=<?php echo $uID;?>'" class="btn btn-block button-green"><i class="fa fa-check"></i> accept</button>
															 <button type="submit" onclick="location.href='rejectbooking.php?bID=<?php echo $bID;?>&uID=<?php echo $uID;?>'" class="btn btn-block button-red"><i class="fa fa-close"></i> Decline</button>
															 <button type="submit" name="submit" class="btn btn-block button-blue"><i class="fa fa-envelope"></i> send email</button>
                           </div></td>
                         </tr>
						 <?php
					   }
						}else{
					   ?>
					   <br><br><br>

						<div id="notfound">
                       <div class="notfound">
                         <div class="notfound-404">
                           <h1>404</h1>
                         </div>
                         <h2>Your student request list is empty!</h2>
                       </div>
                     </div>
						<?php
						}
						?>
                        </table>
                    </div>

                </div>
                <div class="testimonials-box">
                    <h3 class="testimonials-title">Student Reviews</h3>
                    <div class="testimonials-content">
                      <table id="tutorfeedback" class="table-spacing" style="width:100%">



					   <?php
						$sqlz = "SELECT * FROM feedback, student WHERE feedback.uID = student.uID HAVING tID ='$tID'";
						$resultz = $conn->query($sqlz);
						if ($resultz->num_rows > 0){
						while ($zz = $resultz->fetch_assoc()){
							$uuID=$zz['uID'];
							$uuname=$zz['uname'];
							$uustate=$zz['ustate'];
							$uucity=$zz['ucity'];
							$uuistatus=$zz['uistatus'];
							$fcontent=$zz['fcontent'];
							$frating=$zz['frating'];
					  ?>
                       <tr>
                         <td class="geeks"><a href="#">

						  <?php
						   if ($uuistatus == 0){
							   echo "<img alt='img' class='about-box-1-img' src='uploads/profiledefault.jpg'> ";
							   }else{
								   echo "<img alt='img' class='about-box-1-img' src='uploads/profilestudent".$uuID.".jpg'> ";
								   }
							?>

						 </a>
						 <br>
                         <a style="font-weight:800; font-size:20px; color:#3A003A"><?php echo $uuname;?></a><br>
                           <p style="font-weight:100; font-size:16px; color:#4F2C1DFF"><?php echo $uucity;?>, <?php echo $uustate;?></p>
                           <q style="Color:#FCF6F5FF"><?php echo $fcontent;?></q><br>

						   <?php
						   if($frating >= 0 && $frating < 1){
						   ?>
                           <span class="fa fa-star"></span>
                           <span class="fa fa-star"></span>
                           <span class="fa fa-star"></span>
                           <span class="fa fa-star"></span>
                           <span class="fa fa-star"></span>
						   <?php
						   }elseif($frating >= 1 && $frating < 2){
						   ?>
						   <span class="fa fa-star checked"></span>
                           <span class="fa fa-star"></span>
                           <span class="fa fa-star"></span>
                           <span class="fa fa-star"></span>
                           <span class="fa fa-star"></span>
						   <?php
						   }elseif($frating >= 2 && $frating < 3){
						   ?>
						   <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star"></span>
                           <span class="fa fa-star"></span>
                           <span class="fa fa-star"></span>
						   <?php
						   }elseif($frating >= 3 && $frating < 4){
						   ?>
						   <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star"></span>
                           <span class="fa fa-star"></span>
						   <?php
						   }elseif($frating >= 4 && $frating < 5){
						   ?>
						   <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star"></span>
						   <?php
						   }elseif($frating == 5){
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
                       </tr>
					  <?php
						}
						}else{
					  ?>
					  <p style:"color=white;">You don't have any review yet!</p>
					  <?php
						}
						?>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
