<?php 
require("include" . DIRECTORY_SEPARATOR . "config.php"); 

$name = utils::post("name");
$email = utils::post("email");
$mobile = utils::post("mobile");
$password = utils::post("password");

if($name !== "" && $email !== "" && $mobile !== "" && $password !== ""){
	db::run("insert into user set name=?,email=?,mobile=?,password=?",$name,$email,$mobile,$password);
	header("location:login.php");
	exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php require(root . "component" . ds . "head.php"); ?>
</head>

<body>
	<div class="tj-wrapper">
		<div class="loader-outer">
			<div class="tj-loader">
				<img src="images/pre-loader.gif" alt="">
				<h2>Loading...</h2>
			</div>
		</div>
		<?php require(root . "component" . ds . "header.php"); ?>
		<div class="tj-inner-banner">
			<div class="container">
				<h2>Register</h2>
			</div>
		</div>
		<div class="tj-breadcrumb">
			<div class="container">
				<ul class="breadcrumb-list">
					<li><a href="home-1.php">Home</a></li>
					<li class="active">Register</li>
				</ul>
			</div>
		</div>
		<section class="tj-login">
			<div class="container">
				<div class="row">
					<div class="col-sm-offset-3 col-sm-6">
						<!--Tabs Nav Start-->
						<div class="tj-tabs">
							<ul class="nav nav-tabs" role="tablist">
								<li><a href="login.php">Login</a></li>
								<li class="active"><a href="register.php">Register</a></li>
							</ul>
						</div>
						<div class="tab-content">

							<div class="tab-pane active" id="register">
								<div class="col-md-12 col-sm-12">
									<form class="reg-frm" method="POST" action="">
										<div class="field-holder">
											<span class="far fa-user"></span>
											<input type="text" name="name" placeholder="Name">
										</div>
										<div class="field-holder">
											<span class="far fa-envelope"></span>
											<input type="email" name="email" placeholder="Enter your Email Address">
										</div>
										<div class="field-holder">
											<span class="fas fa-mobile"></span>
											<input type="text" name="mobile" placeholder="Enter your mobile number">
										</div>
										<div class="field-holder">
											<span class="fas fa-lock"></span>
											<input type="password" name="password" placeholder="Password">
										</div>
										<label for="terms">
											<input type="checkbox" name="terms" id="terms">
											I accept terms & conditions
										</label>
										<button type="submit" class="reg-btn">Signup <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
									</form>
								</div>
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