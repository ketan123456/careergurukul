<?php  require("include" . DIRECTORY_SEPARATOR . "config.php"); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
	<?php require(root . "component" . ds . "head.php"); ?>
    </head>
	<body>
		<!--Wrapper Content Start-->
		<div class="tj-wrapper">
			<div class="loader-outer">
				<div class="tj-loader">
					<img src="images/pre-loader.gif" alt="">
					<h2>Loading...</h2>
				</div>
			</div>
		
			<!--Style Switcher Section End-->
			<?php require(root . "component" . ds . "header.php"); ?>
			<!--Header Content End-->
			
			<!--Slider Section Start-->
			<div class="tj-slider">
				<div class="tj-cab-slider" id="cab-slider">
					
				
				<div class="slide-item">
						<img src="images/banners/2.jpg" alt=""/>
						<div class="slide-caption">
							<div class="container">
								<div class="slide-inner">
									<strong>Reducing distances, increasing convenience</strong>
									<h2>Women Safety Is Our First Priority!!</h2>
									<div class="slide-btns">
										<a href="booking-form.php" class="btn-style-2">Book Now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="slide-item">
						<img src="images/banners/1.jpg" alt=""/>
						<div class="slide-caption">
							<div class="container">
								<div class="slide-inner">
									<strong>So, where are you going to travel today !!!</strong>
									<h2>Travel east to west & enjoy several famous <br/> road trip destinations</h2>
									<div class="slide-btns">
										<a href="booking-form.php" class="btn-style-2">Book Now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		
			
		
			
			
	
			<!--Facts Section Content Start-->
			<section class="tj-facts">
				<div class="container">
					<div class="row">
						<!--Facts Info Content Start-->
						<div class="col-md-4 col-sm-4">
							<div class="tj-heading-style">
								<h3>Safe Cabs</h3>
								<p>We make sure your travels are safe and happy throughout there journey</p>
							</div>
						</div>
						<!--Facts Info Content End-->
						<!--Client Facts Content Start-->
						<div class="col-md-8 col-sm-8">
							<div class="facts-outer">
								<div class="row">
									<!--Fact Box Content Start-->
									<div class="col-md-4 col-sm-4">
										<div class="fact-box">
											<strong class="fact-counter">1000</strong>
											<i class="fa fa-percent"></i>
											<span>Happy Customer</span>
										</div>
									</div>
									<!--Fact Box Content End-->
									<!--Fact Box Content Start-->
									<div class="col-md-4 col-sm-4">
										<div class="fact-box">
											<strong class="fact-counter">500</strong>
											<i class="fas fa-plus"></i>
											<span>Hours</span>
										</div>
									</div>
									<!--Fact Box Content End-->
									<!--Fact Box Content Start-->
									<div class="col-md-4 col-sm-4">
										<div class="fact-box">
											<strong class="fact-counter">12,000</strong>
											<i class="fas fa-arrow-up"></i>
											<span>Kilometers Driven</span>
										</div>
									</div>
									<!--Fact Box Content End-->
								</div>
							</div>
						</div>
						<!--Client Facts Content End-->
					</div>
				</div>
			</section>
			<!--Facts Section Content End-->
		
			
			<?php require(root . "component" . ds . "footer.php"); ?>
		</div>

	</body>
</html>