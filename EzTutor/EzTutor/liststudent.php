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
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link href="css/plugin.css" rel="stylesheet">
    <link href="css/tutoclass.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <section class="white-bg section-padding-bottom">

        <div class="container">
		</a>
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
            <div class="section-header section-margin-top">
            </div>
<h3 align="center" style="color:black; font-size: 25px;">LIST OF STUDENT</h3>
            <div class="row">

                <div class="col-lg-11">
                    <div class="list-request">

                        <table id="tutor" class="table-spacing" style="width:100%">

						 <?php
						$sql = "SELECT * FROM booking, student, subject, level, tabletime WHERE booking.uID = student.uID AND booking.sID = subject.sID AND booking.lID = level.lID AND booking.tableID = tabletime.tableID HAVING booking.tID ='$tID' AND booking.bstatus='2'";
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
                           <td><div class="flat-form"><span class="break"></span>
															 <button type="submit" onclick="location.href='removebooking.php?bID=<?php echo $bID;?>'" class="btn btn-block button-red"><i class="fa fa-close"></i>Remove</button>
                           </div></td>
                         </tr>
						 <?php
					   }
					}else{
					   ?>
					   <tr>
					   <td>
						<div id="notfound">
                       <div class="notfound">
                         <div class="notfound-404">
                           <h1>404</h1>
                         </div>
                         <h2>Your student list is empty!</h2>
                         <a href="aboutTutor.php">Back To Homepage</a>
                       </div>
                     </div>
					 </tr>
					 </td>
						<?php
					}
					?>
                        </table>
                    </div>
				<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
