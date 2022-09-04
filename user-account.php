<?php

require("include" . DIRECTORY_SEPARATOR . "guard.php");

if (isset($_POST["account_name"])) {
	db::run("update user set name=?,email=?,mobile=? where id=?", utils::post("account_name"), utils::post("account_email"), utils::post("account_mobile"), user::get("id"));
}

if (isset($_POST["kin_name"])) {
	db::run("insert into  contacts set name=?,email=?,mobile=?,user_id=?", utils::post("kin_name"), utils::post("kin_email"), utils::post("kin_mobile"), user::get("id"));
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

		<?php require(root . "component" . ds . "header.php"); ?>


		<!--Inner Banner Section Start-->
		<div class="tj-inner-banner">
			<div class="container">
				<h2>User Account</h2>
			</div>
		</div>
		<!--Inner Banner Section End-->

		<!--Breadcrumb Section Start-->
		<div class="tj-breadcrumb">
			<div class="container">
				<ul class="breadcrumb-list">
					<li><a href="/">Home</a></li>
					<li class="active">User Account</li>
				</ul>
			</div>
		</div>
		<!--Breadcrumb Section End-->


		<!--User Account Section Start-->
		<section class="tj-account-frm">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="tj-tabs">
							<ul class="nav nav-tabs" role="tablist">
								<li class="active"><a href="#user_account" data-toggle="tab"><i class="far fa-user"></i> My Account</a></li>
								<li><a href="#booking_history" data-toggle="tab"> <i class="far fa-chart-bar"></i> Booking History</a></li>
								<li><a href="#contacts" data-toggle="tab"> <i class="fa fa-users"></i> Kin Contacts</a></li>
								<li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane active" id="confirm_booking">
								<form class="account-frm" method="POST" action="">
									<div class="col-md-6 col-sm-6">
										<div class="account-field">
											<label>Name</label>
											<span class="far fa-user"></span>
											<input type="text" name="account_name" placeholder="Enter First Name" value="<?php echo user::get("name"); ?>">
										</div>
									</div>



									<div class="col-md-6 col-sm-6">
										<div class="account-field">
											<label>Email</label>
											<span class="far fa-envelope"></span>
											<input type="email" name="account_email" placeholder="Enter Email id" value="<?php echo user::get("email"); ?>">
										</div>
									</div>

									<div class="col-md-6 col-sm-6">
										<div class="account-field">
											<label>Mobile</label>
											<span class="icon-phone icomoon"></span>
											<input type="tel" name="account_mobile" placeholder="Enter Phone Number" value="<?php echo user::get("mobile"); ?>">
										</div>
									</div>


									<div class="col-md-6 col-sm-6">
										<button type="submit" class="save-btn">Save <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
									</div>
								</form>
							</div>

							<div class="tab-pane" id="booking_history">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>Pickup Location</th>
											<th>Pickup Date Time</th>
											<th>Drop Location</th>
											<th>Arrival Date Time</th>
											<th colspan="3">Share</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$bookings = db::select("select * from booking where user_id=" . user::get("id"));
										foreach ($bookings as $booking) { ?>
											<tr>
												<td><?php echo $booking["pickup_location"]; ?></td>
												<td><?php echo $booking["pickup_datetime"]; ?></td>
												<td><?php echo $booking["drop_location"]; ?></td>
												<td><?php echo $booking["arrival_datetime"]; ?></td>
												<td><a href="https://api.whatsapp.com/send?text=Cab booking from <?php echo $booking["pickup_location"]; ?> to <?php echo $booking["drop_location"]; ?> pickup datetime - <?php echo $booking["pickup_datetime"]; ?> and arrival datetime - <?php echo $booking["arrival_datetime"]; ?> " class="btn btn-default"><i class="fab fa-whatsapp"></i> Share On Whatsapp</a></td>
												<td><a href="sms://+91<?php echo user::get("mobile"); ?>?body=Cab booking from <?php echo $booking["pickup_location"]; ?> to <?php echo $booking["drop_location"]; ?> pickup datetime - <?php echo $booking["pickup_datetime"]; ?> and arrival datetime - <?php echo $booking["arrival_datetime"]; ?> " class="btn btn-default">SMS message</a></td>
												<td><button class="btn btn-primary start_ride_btn">Start Ride</button></td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>


							<div class="tab-pane" id="contacts">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>Name</th>
											<th>Email</th>
											<th>Mobile</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$contacts = db::select("select * from contacts where user_id=" . user::get("id"));
										foreach ($contacts as $contact) { ?>
											<tr>
												<td><?php echo $contact["name"]; ?></td>
												<td><?php echo $contact["email"]; ?></td>
												<td><?php echo $contact["mobile"]; ?></td>
											</tr>
										<?php } ?>

									</tbody>
								</table>
								<form action="" method="post">
									<table class="table table-hover">
										<tbody>
											<tr>
												<td><input type="text" class="form-control" name="kin_name"></td>
												<td><input type="text" class="form-control" name="kin_email"></td>
												<td><input type="text" class="form-control" name="kin_mobile"></td>
												<td><button type="submit" class="btn btn-primary">ADD</button></td>
											</tr>
										</tbody>
									</table>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--User Account Section End-->


		<?php require(root . "component" . ds . "footer.php"); ?>

		<div class="overlay">
			<button class="close_btn">&times;</button>
			<button class="emergency_btn">Emergency</button>
		</div>
	</div>


	<style>
		.overlay {
			position: fixed;
			width: 100%;
			height: 100%;
			background: #0000006e;
			z-index: 999999999;
			display: none;
		}

		button.emergency_btn {
			position: fixed;
			height: 200px;
			width: 200px;
			border-radius: 100%;
			background: red;
			color: #fff;
			border: none;
			outline: none;
			font-size: 25px;
			font-weight: bold;
			top: 0px;
			left: 0px;
			right: 0px;
			bottom: 0px;
			margin: auto;
			box-shadow: 0px 0px 30px #000;
		}

		button.close_btn {
			height: 50px;
			width: 50px;
			font-size: 30px;
			text-align: center;
			position: fixed;
			right: 15px;
			top: 15px;
			border-radius: 100%;
			border: none;
			background: #fff;
			color: #000;
			outline: none;
		}
	</style>


	<script>
		$(document).on("click", ".emergency_btn", function() {
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(function(position) {
					window.location = `https://api.whatsapp.com/send?text=My Current Location  : https://www.google.com/maps/search/` + position.coords.latitude + `,` + position.coords.longitude;
				});
			} else {
				alert("Unable to get your location");
			}
		});
		$(document).on("click", ".start_ride_btn", function() {
			$(document).find(".overlay").fadeIn();
		});

		$(document).on("click", ".close_btn", function() {
			$(document).find(".overlay").fadeOut();
		});
	</script>


</body>

</html>