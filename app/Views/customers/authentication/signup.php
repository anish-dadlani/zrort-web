<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, shrink-to-fit=9">
		<meta name="description" content="Gambolthemes">
		<meta name="author" content="Gambolthemes">		
		<title>Zrort - Sign Up</title>
		<!-- Favicon Icon -->
		<link rel="icon" type="image/png" href="images/fav.png">
		<!-- Stylesheets -->
		<link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
		<link href='<?php echo base_url('assets/customers/vendor/unicons-2.0.1/css/unicons.css'); ?> rel='stylesheet'>
		<link href="<?php echo base_url('assets/customers/css/style.css'); ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/customers/css/responsive.css'); ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/customers/css/night-mode.css'); ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/customers/css/step-wizard.css'); ?>" rel="stylesheet">
		<!-- Vendor Stylesheets -->
		<link href="<?php echo base_url('assets/customers/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/customers/vendor/OwlCarousel/assets/owl.carousel.css'); ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/customers/vendor/OwlCarousel/assets/owl.theme.default.min.css'); ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/customers/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/customers/vendor/semantic/semantic.min.css'); ?>">	
	</head>
<body>
	<div class="sign-inup">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-5">
					<div class="sign-form">
						<div class="sign-inner">
							<div class="sign-logo" id="logo">
								<a href="index.html"><img src="<?php echo base_url('assets/customers/images/logo.svg'); ?>" alt=""></a>
								<a href="index.html"><img class="logo-inverse" src="<?php echo base_url('assets/customers/images/dark-logo.svg'); ?>" alt=""></a>
							</div>
							<div class="form-dt">
								<div class="form-inpts checout-address-step">
									<form action="<?= base_url('customer/save')?>" method="post">
										<div class="form-title"><h6>Sign Up</h6></div>
										<div class="form-group pos_rel">
											<label class="form-label">First Name</label>
											<input id="firstname" name="firstname" type="text" placeholder="Firstname" class="form-control lgn_input" value="<?php if(isset($data) && !empty($data)){echo $data['firstname'];} else{} ?>" required="">
											<i class="uil uil-user-circle lgn_icon"></i>
										</div>
										<?php if (isset($errors['firstname']) && !empty($errors)) : ?>
											<div class="alert alert-danger">
												<p><?= $errors['firstname'] ?></p>
											</div>
										<?php endif ?>
										<div class="form-group pos_rel">
											<label class="form-label">Last Name</label>
											<input id="lastname" name="lastname" type="text" placeholder="Lastname" class="form-control lgn_input" value="<?php if(isset($data) && !empty($data)){echo $data['lastname'];} else{} ?>" required="">
											<i class="uil uil-user-circle lgn_icon"></i>
										</div>
										<?php if (isset($errors['lastname']) && !empty($errors)) : ?>
											<div class="alert alert-danger">
												<p><?= $errors['lastname'] ?></p>
											</div>
										<?php endif ?>
										<div class="form-group pos_rel">
											<label class="form-label">Username</label>
											<input id="username" name="username" type="text" placeholder="Username" class="form-control lgn_input" value="<?php if(isset($data) && !empty($data)){echo $data['username'];} else{} ?>" required="">
											<i class="uil uil-user-circle lgn_icon"></i>
										</div>
										<?php if (isset($errors['username']) && !empty($errors)) : ?>
											<div class="alert alert-danger">
												<p><?= $errors['username'] ?></p>
											</div>
										<?php endif ?>
										<div class="form-group pos_rel">
											<label class="form-label">Email</label>
											<input id="email" name="email" type="email" placeholder="Email Address" class="form-control lgn_input" value="<?php if(isset($data) && !empty($data)){echo $data['email'];} else{} ?>" required="">
											<i class="uil uil-envelope lgn_icon"></i>
										</div>
										<?php if (isset($errors['email']) && !empty($errors)) : ?>
											<div class="alert alert-danger">
												<p><?= $errors['email'] ?></p>
											</div>
										<?php endif ?>
										<div class="form-group pos_rel">
											<label class="form-label">Phone Number</label>
											<input id="phone" name="phone" type="text" placeholder="Phone Number" class="form-control lgn_input numberclass" value="<?php if(isset($data) && !empty($data)){echo $data['phone'];} else{} ?>" required="">
											<i class="uil uil-mobile-android-alt lgn_icon"></i>
										</div>
										<?php if (isset($errors['phone']) && !empty($errors)) : ?>
											<div class="alert alert-danger">
												<p><?= $errors['phone'] ?></p>
											</div>
										<?php endif ?>
										<!-- <div class="form-group pos_rel">
											<label class="control-label">Enter Code</label>
											<ul class="code-alrt-inputs signup-code-list">
												<li>
													<input id="code1" name="code1" type="text" placeholder="" class="form-control input-md numberclass" required="">
												</li>
												<li>
													<input id="code2" name="code2" type="text" placeholder="" class="form-control input-md numberclass" required="">
												</li>
												<li>
													<input id="code3" name="code3" type="text" placeholder="" class="form-control input-md numberclass" required="">
												</li>
												<li>
													<input id="code4" name="code4" type="text" placeholder="" class="form-control input-md numberclass" required="">
												</li>
												<li>
													<a class="chck-btn hover-btn code-btn145"  href="#">Send</a>
												</li>
											</ul>
											<a href="#" class="resend-link">Resend Code</a>
										</div> -->
										<div class="form-group pos_rel">
											<label class="form-label">New Password</label>
											<input id="password_hash" name="password_hash" type="password" placeholder="New Password" class="form-control lgn_input" required="">
											<i class="uil uil-padlock lgn_icon"></i>
										</div>
										<?php if (isset($errors['password_hash']) && !empty($errors)) : ?>
											<div class="alert alert-danger">
												<p><?= $errors['password_hash'] ?></p>
											</div>
										<?php endif ?>
										<button class="login-btn hover-btn" type="submit">Sign Up Now</button>
									</form>
								</div>
								<div class="signup-link">
									<p>I have an account? - <a href="<?php echo base_url('customer/login'); ?>">Sign In Now</a></p>
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
	<script src="<?php echo base_url('assets/customers/js/jquery-3.3.1.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/customers/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/customers/vendor/OwlCarousel/owl.carousel.js'); ?>"></script>
	<script src="<?php echo base_url('assets/customers/vendor/semantic/semantic.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/customers/js/jquery.countdown.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/customers/js/custom.js'); ?>"></script>
	<script src="<?php echo base_url('assets/customers/js/product.thumbnail.slider.js'); ?>"></script>
	<script src="<?php echo base_url('assets/customers/js/offset_overlay.js'); ?>"></script>
	<script src="<?php echo base_url('assets/customers/js/night-mode.js'); ?>"></script>
	<?php echo view('/templates/javascript'); ?>	
</body>
</html>