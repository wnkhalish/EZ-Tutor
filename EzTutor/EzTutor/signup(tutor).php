<?php
require_once("php/header.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/plugin.css">
    <link rel="stylesheet" type="text/css" href="css/login2.css">
    <style>

    </style>

</head>

<body>
<br>
<h3 align="center" style="color:black;">FILL UP YOUR DETAILS</h3>
    <div class="list-request">
      </div><br><br>
    <section class="white-bg section-padding-bottom">
        <div class="section-header section-margin-top">

            <div class="form">
              <ul class="tabs">
                  <li><a class="tablinks" onclick="openTab(event, 'Profile')" class="active">PROFILE</a></li>
              </ul>

                <div id="Profile" class="tabcontent4 show">
                    <form action="registertutor.php" method="POST">
                        <label for='user'>Full Name</label>
                        <input type='text' id='uname' name='tname' title='Username' required/>
                        <label for='user'>Email</label>
                        <input type='text' id='umail' name='temail' title='Email' required/>
                        <div class="row">
                            <div class="col-75">
                                <div class="row">
                                    <div class="col-50">
                                        <label for="user">Date of Birth</label>
                                        <input type="text" id="udob" name="tdob">
                                        <br>
                                    </div>

                                    <div class="col-50">
                                        <label for="user">Gender</label>
                                        <select name="tgender" class="minimal">
                                            <option selected="" value="Default">Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <label for='user'>Password</label>
                                <input type='password' id='upass' name='tpass' title='Password' required/>

								<div class="row">
									<div class="col-50">
                                        <label for="user">State</label>
                                        <select name="tstate" class="minimal">
                                            <option selected="" value="Default">State</option>
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
                                    <div class="col-50">
                                        <label for="user">City</label>
                                        <input type="text" id="udob" name="tcity">
                                        <br>
                                    </div>
                                </div>

                                <label for="user">Your Qualification</label>
                                <select name="tqualification" class="minimal">
                                    <option selected="" value="Default">Qualification</option>
                                    <option value="Masters/PhD">Masters/PhD</option>
                                    <option value="Bachelor Degree">Bachelor Degree</option>
                                    <option value="Diploma">Diploma</option>
                                    <option value="STPM/Certificate">STPM/Certificate</option>
                                    <option value="SRP/PMR/SPM">SRP/PMR/SPM</option>
                                    <option value="Others">Others</option>
                                </select>

                                <span class="break"></span>

                                <label for="user">Education Type</label>
                                <select name="ttype" class="minimal">
                                    <option selected="" value="Default">Education Type</option>
                                    <option value="1">Business/Finance/Commerce</option>
                                    <option value="2">Science/Health Sciences</option>
                                    <option value="4">Education</option>
                                    <option value="5">Medicine/Pharmacy/Hospitality</option>
                                    <option value="6">Media/Fine Arts</option>
                                    <option value="7">Communication</option>
                                    <option value="8">Computing/Engineering</option>
                                </select>

                                <span class="break"></span>
                                <div class="row">
                                    <div class="col-50">

                                        <label for='user'>Your Programme Name</label>
                                        <input type='text' id='uqualy' name='tprogramme' title='Qualifying Degree' required/>
                                        <br>
                                    </div>

                                    <div class="col-50">
                                        <label for='user'>Cumulative Grade Point Average (CGPA)</label>
                                        <input type='text' id='uscore' name='tcgpa' title='Aggregates' required/>
                                    </div>
                                </div>



                                <label for="fname">Payment Accepted Cards</label>
                                <div class="icon-container">
                                    <img src="images/card.png" style="width:35%">
                                </div>
                                <label for="cname">Name on Card</label>
                                <input type="text" id="cname" name="cardname" required>

                                <div class="row">
                                    <div class="col-50">

                                        <label for="ccnum">Credit card number</label>
                                        <input type="text" id="ccnum" name="cardnumber" required>

                                        <div class="row">
                                            <div class="col-50">
                                                <label for="user">Expiry Month</label>
                                                <select name="month" class="minimal">
                                                    <option selected="" value="Default">Ex Month</option>
                                                    <option value="1">January</option>
                                                    <option value="2">February</option>
                                                    <option value="4">March</option>
                                                    <option value="5">April</option>
                                                    <option value="6">May</option>
                                                    <option value="7">June</option>
                                                    <option value="8">July</option>
                                                    <option value="9">August</option>
                                                    <option value="10">September</option>
                                                    <option value="11">October</option>
                                                    <option value="12">November</option>
                                                    <option value="13">December</option>
                                                </select>

                                            </div>
                                            <div class="col-50">

                                                <label for="user">Expiry Year</label>
                                                <select name="year" class="minimal">
                                                    <option selected="" value="Default">Ex Year</option>
                                                    <option value="1">2020</option>
                                                    <option value="2">2021</option>
                                                    <option value="4">2022</option>
                                                    <option value="5">2023</option>
                                                    <option value="6">2024</option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-50">

                                        <label for="user">Subscription Package</label>
                                        <select name="tpackage" class="minimal">
                                            <option selected="" value="Default">Subscription Package</option>
                                            <option value="1">MYR 150 - Per Month</option>
                                            <option value="2">MYR 400 - 3 Month</option>
                                            <option value="3">MYR 1500 - 1 Year</option>
                                        </select>

                                    </div>
                                </div>

                                <input type="submit" value="Submit" class="button" />

                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </section>

    <script src="js/index.js"></script>

</body>

</html>
