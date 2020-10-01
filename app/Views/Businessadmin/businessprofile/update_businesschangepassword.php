<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description-gambolthemes" content="">
	<meta name="author-gambolthemes" content="">
	<title>Business Admin</title>
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
					<form action="<?php echo base_url();?>/Businessadmin/Businessprofile/change_businessprofilepassword" class="form-horizontal" method="POST" enctype = "multipart/form-data" id="form">
						<div class="container">
							<div class="row justify-content-center">
								<div class="col-lg-5">
									<div class="card shadow-lg border-0 rounded-lg mt-5">
										<div class="card-header card-sign-header">
											<h3 class="text-center font-weight-light my-4">Change Password</h3>
										</div>
										<div class="card-body">
											<form>
												<div class="form-group">
													<label class="form-label" for="inputPasswordOld">Old Password*</label>
													<input class="form-control py-3" name="oldpassword" id="inputPasswordOld" type="password" placeholder="Enter old password">
												</div>
												<div class="form-group">
													<label class="form-label" for="inputPasswordNew">New Password*</label>
													<input class="form-control py-3" id="new_password" type="password" name='newpassword' placeholder="Enter new password">
												</div>
												<div class="form-group">
													<label class="form-label" for="inputPasswordNewConfirm">Confirmation Password*</label>
													<p id="conf-password-mesg" style="color: red;"></p>
													<input class="form-control py-3" name='repeatnewpassword' id="conf_password" type="password" placeholder="Enter New confirmation password">
												</div>
												<input type="hidden" class="form-control" name='username' value="<?php echo $businessprofile[0]['username']; ?>" id="conf_password" placeholder="Confirm">
												<div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0" id="btn-modalForm-submit">
													<!--<a class="btn btn-sign hover-btn">Change Password</a>-->
													<button class="btn btn-sign hover-btn" type="submit">Change Password</button>
												</div>
												<div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
													<a  href="<?php echo base_url(); ?>/Products" class="btn btn-sign hover-btn">Cancel</a>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
                </main>
            </div>
        </div>
<script src="<?php echo base_url('assets/admin/js/jquery-3.4.1.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/admin/js/scripts.js'); ?>"></script>	
<script type="text/javascript" language="javascript">
$(document).ready(function () {
	$('#conf_password').on('change', function(e) {
		var new_pwd = $("#new_password").val();
		var onf_pwd = $("#conf_password").val();
		if(onf_pwd != new_pwd){
			$("#conf-password-mesg").html('Confirm Password does not Match!');
		}else{
			$("#conf-password-mesg").html('');
		}										
	});
});	
</script>		

    </body>
</html>
