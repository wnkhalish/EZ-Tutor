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
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <style>

    </style>

</head>

<body class="bg">
<br>
<h3 align="center" style="color:white;">FILL UP YOUR DETAILS</h3>
    <section class="white-bg section-padding-bottom">
        <div class="section-header section-margin-top">

            <div class="form">
                <div id="Profile" class="tabcontent1 show">
                    <form action="signin.php" method="POST">
                        <label for='user'>Email</label>
                        <input type='text' id='uname' name='lmail' title='Username' />
                        <label for='user'>Password</label>
                        <input type='password' id='umail' name='lpass' title='Email' />

                        <span class="break"></span>
                        <input type="submit" value="Log In" class="btn_Submit1" />
                        <p>Don't have an account?</p><a href="as.php">Sign Up Now</a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
    <script>
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>

    <script src="js/index.js"></script>

</body>

</html>
