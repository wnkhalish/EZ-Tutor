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
<h3 align="center" style="color:black;">FILL UP YOUR DETAILS</h3>
    <div class="list-request">
      </div><br><br>
    <section class="white-bg section-padding-bottom">
        <div class="section-header section-margin-top">

            <div class="form">
              <ul class="tabs">
                  <li><a class="tablinks" onclick="openTab(event, 'Profile')" class="active">PROFILE</a></li>
              </ul>
                <div id="Profile" class="tabcontent show">
                    <form action="register.php" method="POST">
                        <label for='user'>Full Name</label>
                        <input type='text' id='uname' name='uname' required title='Username' required/>
                        <label for='user'>Email</label>
                        <input type='text' id='umail' name='umail' required title='Email' required/>
                        <div class="row">
                            <div class="col-75">
                                <div class="row">
                                    <div class="col-50">
                                        <label for="user">Date of Birth</label>
                                        <input type="text" id="udob" name="udob">
                                        <br>
                                    </div>

                                    <div class="col-50">
                                        <label for="user">Gender</label>
                                        <select name="ugender" class="minimal">
                                            <option selected="" value="Default">Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <label for='user'>Password</label>
                                <input type='password' id='upass' name='upass' title='Password' required/>

                                <label for='user'>Home Address</label>
                                <input type='text' id='ucollege' name='uaddress' title='address' required/>

                                <label for='user'>Street Name</label>
                                <input type='text' id='ucollege' name='ustreet' title='street' required/>

                                  <label for="user">State</label>
                                  <select name="ustate" class="minimal">
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

                                  <span class="break"></span>
                                  <div class="row">
                                      <div class="col-50">

                                          <label for='user'>City</label>
                                          <input type='text' id='uqualy' name='ucity' title='Qualifying Degree' required/>
                                          <br>
                                      </div>

                                      <div class="col-50">
                                          <label for='user'>Zipcode</label>
                                          <input type='text' id='uscore' name='uzip' title='Aggregates' required/>
                                      </div>
                                  </div><br>
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
