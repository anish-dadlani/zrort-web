
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description-gambolthemes" content="">
	<meta name="author-gambolthemes" content="">
	<title>Zarorat - Admin Login</title>
	<link href="<?php echo base_url(); ?>/assets/admin/css/styles.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>/assets/admin/css/admin-style.css" rel="stylesheet">
	
	<!-- Vendor Stylesheets -->
	<link href="<?php echo base_url(); ?>/assets/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>/assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
	
</head>

    <body class="bg-sign">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header card-sign-header">
										<h3 class="text-center font-weight-light my-4">Login</h3>
									</div>
                                    <div class="card-body">
                                        <form action="<?php echo base_url();?>zaroratLogin/login" method="post">
                                            <div class="form-group">
												<label class="form-label" for="inputUsername">User Name*</label>
												<input class="form-control py-3" id="inputUsername" name="username" type="text" placeholder="Enter User Name" required>
											</div>
                                            <div class="form-group">
												<label class="form-label" for="inputPassword">Password*</label>
												<input class="form-control py-3" id="inputPassword" type="password" name="password"  placeholder="Enter password" required>
											</div>
                                            <!--<div class="form-group">
                                                <div class="custom-control custom-checkbox">
													<input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
													<label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
												</div>
                                            </div>-->
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
												<a class="btn btn-sign hover-btn" id="submit" type="submit">Login</a>
											</div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
		 <script src="<?php echo base_url(); ?>/assets/admin/js/jquery-3.4.1.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/admin/js/scripts.js"></script>		
		
    </body>
</html>