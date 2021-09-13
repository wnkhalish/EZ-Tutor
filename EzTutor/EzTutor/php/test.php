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
                        <div class="my-pic">
                            <div class="photo-container">
								<?php
                                echo "<img src='uploads/profiletutor".$id.".jpg'> ";
								?>
                            </div>
                        </div>

                        <div class="my-detail">
                            <div class="white-spacing">
							<?php
							if (isset($_SESSION['role'])){
								if($_SESSION['role'] == "student"){
									
							?>		
							 <form action="upload.php" method="POST" enctype="multipart/form-data">
                              <div class="upload-btn-wrapper"> 
                                <input type="file" name="file" >
								<button class="btnupload">Upload a file</button>
                              </div>
							  <button type="submit" name="submit">Submit</button>
							 </form>
									
							<?php		
							}elseif($_SESSION['role'] == "tutor"){
							?>	
							 <form action="uploadtutor.php" method="POST" enctype="multipart/form-data">
                              <div class="upload-btn-wrapper"> 
                                <input type="file" name="file" >
								<button class="btnupload">Upload a file</button>
                              </div>
							  <button type="submit" name="submit">Submit</button>
							 </form>
							<?php	
							}
							}
							?>
								
                                <h1>Faisal Amin</h1>
                                <span>Location: Balakong, Selangor</span>
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
                                <h2>My Profile</h2>
                                <i class="material-icons">person</i>
                            </div>
                            <div class="col-md-2 content-page">
                                <div class="col-md-2 blog-post">

                                    <form action="">
                                        <div class="container2">
                                            <h1>User Account</h1>
                                            <hr>

                                            <label for="email"><b>Full Name</b></label>
                                            <input type="text" placeholder="Enter Full Name" name="name" required>

                                            <div class="row3">
                                                <div class="col-50">
                                                    <label for="email"><b>Email</b></label>
                                                    <input type="text" placeholder="Enter Email" name="email" required>
                                                </div>
                                                <div class="col-50">
                                                    <label for="zip">Phone</label>
                                                    <input type="text" id="phone" name="phone" placeholder="0133174533">
                                                </div>
                                            </div>

                                            <label for="psw"><b>Password</b></label>
                                            <input type="password" placeholder="Enter Password" name="psw" required>

                                            <label for="psw-repeat"><b>Confirm Password</b></label>
                                            <input type="password" placeholder="Repeat Password" name="psw-repeat" required>

                                            <label for="state"><b>State</b></label>
                                            <select name="state" class="minimal">
                                                <option selected="" value="Default">State</option>
                                                <option value="1">Johor</option>
                                                <option value="2">Kuala Lumpur</option>
                                                <option value="3">Kelantan</option>
                                                <option value="4">Kedah</option>
                                                <option value="5">Malacca</option>
                                                <option value="6">Negeri Sembilan</option>
                                                <option value="7">Pulau Penang</option>
                                                <option value="8">Perlis</option>
                                                <option value="9">Perak</option>
                                                <option value="10">Pahang</option>
                                                <option value="11">Selangor</option>
                                                <option value="12">Sabah</option>
                                                <option value="13">Terengganu</option>
                                            </select>

                                            <div class="row3">
                                                <div class="col-50">
                                                    <label for="state">City</label>
                                                    <input type="text" id="state" name="state" placeholder="Bandar Baru">
                                                </div>
                                                <div class="col-50">
                                                    <label for="zip">Zip</label>
                                                    <input type="text" id="zip" name="zip" placeholder="43800">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                                    <button class="submit-btn">
                                                        <span>Update<i class="fa fa-long-arrow-right m-l-7"></i></span>
                                                    </button>

                                </div>

                                </form>

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
