<?php
require_once("php/header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Sign Up</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/bootstrap-4.1.3/bootstrap.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/main_styles.css">
</head>
<body>

	<h3 class="tajuk">CHOOSE YOUR CATEGORY</h3>

	<!-- Products -->

	<div class="products">
		<div class="section_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="products_container grid">

							<!-- Product -->
							<div class="product grid-item hot">
								<div class="product_inner">
									<div class="product_image">
                    <a href="signup(student).php">
										<img src="images/student.jpg" alt=""></a>
									</div>
									<div class="product_content text-center">
										<div class="product_button ml-auto mr-auto trans_200"><a href="signup(student).php">Student</a></div>
									</div>
								</div>
							</div>

							<!-- Product -->
							<div class="product grid-item hot">
								<div class="product_inner">
									<div class="product_image">
                    <a href="signup(tutor).php">
										<img src="images/tutor.jpg" alt=""></a>
									</div>
									<div class="product_content text-center">
										<div class="product_button ml-auto mr-auto trans_200"><a href="signup(tutor).php">Tutor</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap-4.1.3/popper.js"></script>
<script src="styles/bootstrap-4.1.3/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/Isotope/fitcolumns.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
