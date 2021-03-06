<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, shrink-to-fit=9">
		<meta name="description" content="Gambolthemes">
		<meta name="author" content="Gambolthemes">		
		<title>Zrort - Sign In</title>
		<!-- Favicon Icon -->
		<link rel="icon" type="image/png" href="<?php echo base_url(); ?>/customers/images/fav.png">
		<!-- Stylesheets -->
		<link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
		<link href='<?php echo base_url(); ?>/assets/customers/vendor/unicons-2.0.1/css/unicons.css' rel='stylesheet'>
		<link href="<?php echo base_url(); ?>/assets/customers/css/style.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>/assets/customers/css/responsive.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>/assets/customers/css/night-mode.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>/assets/customers/css/step-wizard.css" rel="stylesheet">
		<!-- Vendor Stylesheets -->
		<link href="<?php echo base_url(); ?>/assets/customers/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>/assets/customers/vendor/OwlCarousel/assets/owl.carousel.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>/assets/customers/vendor/OwlCarousel/assets/owl.theme.default.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>/assets/customers/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/customers/vendor/semantic/semantic.min.css">	
	</head>
<body>
	<div class="sign-inup">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-5">
					<div class="sign-form">
						<div class="sign-inner">
							<div class="sign-logo" id="logo">
								<a href="<?php echo base_url(); ?>/assets/customers/index.html"><img src="<?php echo base_url(); ?>/assets/customers/images/logo.svg" alt=""></a>
								<a href="<?php echo base_url(); ?>/assets/customers/index.html"><img class="logo-inverse" src="<?php echo base_url(); ?>/assets/customers/images/dark-logo.svg" alt=""></a>
							</div>
							<div class="form-dt">
								<div class="form-inpts checout-address-step">
									<form method="post" action="<?php echo base_url();?>/customer/login">
										<div class="form-title"><h6>Sign In</h6></div>
										<div class="text-center">
												<p class="message" style="color:red; padding-top:10px; padding-bottom:0px"><?php if(isset($_SESSION['message'])){echo $_SESSION['message'];} ?></p>
											</div>
										<div class="form-group pos_rel">
											<input id="username" name="username" type="text" placeholder="Username" class="form-control lgn_input" required="">
											<i class="uil uil-mobile-android-alt lgn_icon"></i>
										</div>
										<div class="form-group pos_rel">
											<input id="password_hash" name="password_hash" type="password" placeholder="Password" class="form-control lgn_input" required="">
											<i class="uil uil-padlock lgn_icon"></i>
										</div>
										<button class="login-btn hover-btn" type="submit">Sign In Now</button>
									</form>
								</div>
								<div class="password-forgor">
									<a href="<?php echo base_url(); ?>/customer/reset_password">Forgot Password?</a>
								</div>
								<div class="signup-link">
									<p>Don't have an account? - <a href="<?php echo base_url(); ?>/customer/register">Sign Up Now</a></p>
								</div>
							</div>
						</div>
					</div>
					<div class="copyright-text text-center mt-3">
						<i class="uil uil-copyright"></i>Copyright 2020 <b>Zrort</b> . All rights reserved
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Javascripts -->
	<script src="<?php echo base_url('assets/customers/js/jquery-3.3.1.min.js');?>"></script>
	<script src="<?php echo base_url('assets/customers/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
	<script src="<?php echo base_url('assets/customers/vendor/OwlCarousel/owl.carousel.js');?>"></script>
	<script src="<?php echo base_url('assets/customers/vendor/semantic/semantic.min.js');?>"></script>
	<script src="<?php echo base_url('assets/customers/js/jquery.countdown.min.js');?>"></script>
	<script src="<?php echo base_url('assets/customers/js/custom.js');?>"></script>
	<script src="<?php echo base_url('assets/customers/js/product.thumbnail.slider.js');?>"></script>
	<script src="<?php echo base_url('assets/customers/js/offset_overlay.js');?>"></script>
	<script src="<?php echo base_url('assets/customers/js/night-mode.js');?>"></script>	
</body>
</html>