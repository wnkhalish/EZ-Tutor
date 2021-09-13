<?php
if (session_status() == PHP_SESSION_NONE){
	session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>EZ Tutor</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/main2.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" href="index.php">EZ TUTOR</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="index.php" class="nav-link">HOME</a></li><br>
            <!--<li class="nav-item"><a href="#" class="nav-link">CONTACT</a></li><br>-->
            
			<?php
			if (isset($_SESSION['userid'])){
				if($_SESSION['role'] == "student"){
				?>
					<li class="nav-item"><a href="summary.php" class="nav-link">MY BOOKING</a></li><br>
				<?php
				}elseif($_SESSION['role'] == "tutor"){
				?>
					<li class="nav-item"><a href="aboutTutor.php" class="nav-link">MY CLASS</a></li><br>
				<?php
				}
				
			?>
			<li class="nav-item"><a href="std.php" class="nav-link">ACCOUNT</a></li><br>
			<li class="nav-item"><a href="logout.php" class="nav-link">LOGOUT</a></li><br>
			<?php
			}else{
			?>
			<li class="nav-item"><a href="login.php" class="nav-link">LOGIN</a></li><br>
			<?php
				}
			?>
          </ul>
        </div>
      </div>
    </nav>
</body>
</html>
