<?php
require_once("php/header.php");
require_once("php/dbconfig.php");
$id = $_SESSION['userid'];
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <!-- Google Web Fonts  -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>

<body>
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-long-arrow-up"></i></button>
<br><br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="about-fixed">

						<?php
						if (isset($_SESSION['role'])){
							if($_SESSION['role'] == "student"){
								$sqla ="SELECT * FROM student  WHERE uID = '$id'";
								$resulta = $conn->query($sqla);
								while ($gg = $resulta->fetch_assoc()){
									$status=$gg['uistatus'];
									$name=$gg['uname'];
									$umail=$gg['umail'];
									$udob=$gg['udob'];
									$upass=$gg['upass'];
									$state=$gg['ustate'];
									$city=$gg['ucity'];
									$uzip=$gg['uzip'];

									if ($status == "0"){
										?>
										 <div class="my-pic">
											<div class="photo-container">
												<?php
												echo "<img src='uploads/profiledefault.jpg'> ";
												?>
											</div>
										</div>
										<?php
									}else{
										?>
										<div class="my-pic">
											<div class="photo-container">
												<?php
												echo "<img src='uploads/profilestudent".$id.".jpg'> ";
												?>
											</div>
										</div>
										<?php
									}
									?>
									<div class="my-detail">
											<div class="white-spacing">
												<form action="upload.php" method="POST" enctype="multipart/form-data">
													<div class="upload-btn-wrapper">
														<input type="file" name="file" >
														<button class="btnupload">Upload a file</button>
													</div>
												</form>
									<?php
								}
							}elseif($_SESSION['role'] == "tutor"){
								$sqlb ="SELECT * FROM tutor  WHERE tID = '$id'";
								$resultb = $conn->query($sqlb);
								while ($gg = $resultb->fetch_assoc()){
									$status=$gg['tistatus'];
									$name=$gg['tname'];
									$tdob=$gg['tdob'];
									$temail=$gg['temail'];
									$tpass=$gg['tpass'];
									$state=$gg['tstate'];
									$city=$gg['tcity'];
									$tphno=$gg['tphno'];


									if ($status == "0"){
										?>
										 <div class="my-pic">
											<div class="photo-container">
												<?php
												echo "<img src='uploads/profiledefault.jpg'> ";
												?>
											</div>
										</div>
										<?php
									}else{
										?>
										<div class="my-pic">
											<div class="photo-container">
												<?php
												echo "<img src='uploads/profiletutor".$id.".jpg'> ";
												?>
											</div>
										</div>
										<?php
									}
									?>
									<div class="my-detail">
											<div class="white-spacing">
												<form action="uploadtutor.php" method="POST" enctype="multipart/form-data">
													<div class="upload-btn-wrapper">
														<input type="file" name="file" >
														<button class="btnupload">Upload a file</button>
													</div>
													<div class="upload-btn-wrapper">
														<button class="btnupload" type="submit" name="submit">Submit</button>
													</div>
												</form>
									<?php
								}
							}
						}
						?>

                                <h1><?php echo $name;?></h1>
                                <span>Location: <?php echo $city;?>, <?php echo $state;?></span>
                                <br>

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
                                <h2>My Profile</h2>
                                <i class="material-icons">person</i>
                            </div>
                            <div class="col-md-2 content-page">
                                <div class="col-md-2 blog-post">

								<?php
								if($_SESSION['role'] == "student"){
									?>
                                    <form action="updatestudent.php" method="post">
                                        <div class="container2">
                                            <h1>User Account (Student)</h1>
                                            <hr>

                                            <label for="email"><b>Full Name</b></label>
                                            <input type="text" value="<?php echo $name;?>" name="uname" required>


                                            <label for="email"><b>Email</b></label>
                                            <input type="text" value="<?php echo $umail;?>" name="umail" required>


                                            <label for="psw"><b>Password</b></label>
                                            <input type="password" value="<?php echo $upass;?>" name="upass" required>

                                            <label for="state"><b>State</b></label>
                                            <select name="ustate" class="minimal">
                                                <option selected="" value="<?php echo $state;?>"><?php echo $state;?>(selected)</option>
                                                <option value="Johor">Johor</option>
                                                <option value="Kuala Lumpur">Kuala Lumpur</option>
                                                <option value="Kelantan">Kelantan</option>
                                                <option value="Kedah">Kedah</option>
                                                <option value="Malacca">Malacca</option>
                                                <option value="Negeri Sembilan">Negeri Sembilan</option>
                                                <option value="Pulau Penang">Pulau Penang</option>
                                                <option value="Perlis">Perlis</option>
                                                <option value="Perak">Perak</option>
                                                <option value="Pahang">Pahang</option>
                                                <option value="Selangor">Selangor</option>
                                                <option value="Sabah">Sabah</option>
                                                <option value="Terengganu">Terengganu</option>
                                            </select>

                                            <div class="row3">
                                                <div class="col-50">
                                                    <label for="state">City</label>
                                                    <input type="text" id="state" name="ucity" value="<?php echo $city;?>">
                                                </div>
                                                <div class="col-50">
                                                    <label for="zip">Zip</label>
                                                    <input type="text" id="zip" name="uzip" value="<?php echo $uzip;?>">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <button type="submit" class="submit-btn">
                                           <span>Update<i class="fa fa-long-arrow-right m-l-7"></i></span>
                                        </button>

                                </div>

                                </form>
								<?php
								}elseif($_SESSION['role'] == "tutor"){
								?>
								<form action="updatetutor.php" method="post">
                                        <div class="container2">
                                            <h1>User Account (Tutor)</h1>
                                            <hr>

                                            <label for="email"><b>Full Name</b></label>
                                            <input type="text" value="<?php echo $name;?>" name="tname" required>


                                            <label for="email"><b>Email</b></label>
                                            <input type="text" value="<?php echo $temail;?>" name="temail" required>


                                            <label for="psw"><b>Password</b></label>
                                            <input type="password" value="<?php echo $tpass;?>" name="tpass" required>

                                            <label for="state"><b>State</b></label>
                                            <select name="tstate" class="minimal">
                                                <option selected="" value="<?php echo $state;?>"><?php echo $state;?>(selected)</option>
                                                <option value="Johor">Johor</option>
                                                <option value="Kuala Lumpur">Kuala Lumpur</option>
                                                <option value="Kelantan">Kelantan</option>
                                                <option value="Kedah">Kedah</option>
                                                <option value="Malacca">Malacca</option>
                                                <option value="Negeri Sembilan">Negeri Sembilan</option>
                                                <option value="Pulau Penang">Pulau Penang</option>
                                                <option value="Perlis">Perlis</option>
                                                <option value="Perak">Perak</option>
                                                <option value="Pahang">Pahang</option>
                                                <option value="Selangor">Selangor</option>
                                                <option value="Sabah">Sabah</option>
                                                <option value="Terengganu">Terengganu</option>
                                            </select>

                                            <div class="row3">
                                                <div class="col-50">
                                                    <label for="state">City</label>
                                                    <input type="text" id="state" name="tcity" value="<?php echo $city;?>">
                                                </div>
                                                <div class="col-50">
                                                    <label for="zip">Phone</label>
                                                    <input type="text" id="zip" name="tphno" value="<?php echo $tphno;?>">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <button type="submit" class="submit-btn">
                                            <span>Update<i class="fa fa-long-arrow-right m-l-7"></i></span>
                                         </button>

                                </div>

                                </form>
								<?php
								}
								?>



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
