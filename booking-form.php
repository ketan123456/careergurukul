<?php

require("include" . DIRECTORY_SEPARATOR . "guard.php");

if (utils::isset($_POST, ["pickup_loc", "pickup_date", "pickup_time", "dropoff_loc", "dropoff_date", "dropoff_time"])) {

	$pickup_datetime = date("Y-m-d H:i:s", strtotime(utils::post("pickup_date") . " " . utils::post("pickup_time")));

	$arrival_datetime = date("Y-m-d H:i:s", strtotime(utils::post("dropoff_date") . " " . utils::post("dropoff_time")));


	db::run(
		"insert into booking set 
		pickup_location=?,
		drop_location=?,
		pickup_datetime=?,
		arrival_datetime=?,
		user_id=?",
		utils::post("pickup_loc"),
		utils::post("dropoff_loc"),
		$pickup_datetime,
		$arrival_datetime,
		user::get("id")
	);
	header("location:user-account.php");
	exit;
}

?>

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
		<!--Style Switcher Section Start-->
		<?php require(root . "component" . ds . "header.php"); ?>
		<!--Header Content End-->

		<!--Inner Banner Section Start-->
		<div class="tj-inner-banner">
			<div class="container">
				<h2>Booking Form</h2>
			</div>
		</div>
		<!--Inner Banner Section End-->

		<!--Breadcrumb Section Start-->
		<div class="tj-breadcrumb">
			<div class="container">
				<ul class="breadcrumb-list">
					<li><a href="#">Home</a></li>
					<li class="active">Booking Form</li>
				</ul>
			</div>
		</div>
		<!--Breadcrumb Section End-->

		<!--Booking Form Section Start-->
		<section class="tj-booking-frm">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="tj-tabs">
							<ul class="nav nav-tabs" role="tablist">
								<li class="active"><a href="#point" data-toggle="tab">Book Now</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane active" id="point">

								<form class="booking-frm" method="POST" action="booking-form.php">
									<div class="col-md-12 col-sm-12">
										<strong>Picking Up</strong>
										<div class="field-holder">
											<span class="fas fa-map-marker-alt"></span>
											<input id="point_start_loc" type="text" name="pickup_loc" placeholder="Pickup Location">
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										<div class="field-holder">
											<input type="date" name="pickup_date" placeholder="Select your Date" id="pickup_date">
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										<div class="field-holder">
											<input type="time" name="pickup_time" placeholder="Select Timings" id="pickup_time">
										</div>
									</div>
									<div class="col-md-12 col-sm-12">
										<strong>Dropoff</strong>
										<div class="field-holder">
											<span class="fas fa-map-marker-alt"></span>
											<input type="text" id="point_end_loc" name="dropoff_loc" placeholder="Pickup Location">
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										<div class="field-holder">
											<input type="date" name="dropoff_date" id="dropoff_date" placeholder="Select your Date">
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										<div class="field-holder">
											<input type="time" name="dropoff_time" placeholder="Select Timings" id="dropoff_time">
										</div>
									</div>



									<div class="col-md-12 col-sm-12">
										<p class="ride-terms">I understand and agree with the <a href="policy.html">Terms</a> of Service and Cancellation </p>
										<label for="book_terms">
											<input name="book_terms" id="book_terms" type="checkbox" checked>
										</label>
									</div>
									<div class="col-md-12 col-sm-12">
										<button type="submit" class="book-btn">BOOK NOW</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<?php require(root . "component" . ds . "footer.php"); ?>
	</div>

</body>

</html>