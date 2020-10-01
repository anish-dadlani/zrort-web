<style>
.cancel-cst-btn{    
	background: #f55d2c;
    border: 0;
    color: #fff;
    font-size: 14px;
    font-weight: 500;
    height: 40px !Important;
    padding: 12px 20px !Important;
    border-radius: 3px;
    margin-top: 20px;
}
.cancel-cst-btn:hover{
	text-decoration: none !important;
    background: #f55d2c;
    color: #fff !important;
    transition: all .2s ease-in-out;
    -webkit-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    -ms-transition: all 0.2s ease-in-out;
    -webkit-transition: all 0.2s ease-in-out;
    background-image: -webkit-linear-gradient(left, rgba(230, 92, 91, 0.9), rgba(245, 93, 44, 0.9));
    background-image: linear-gradient(to right, rgba(230, 92, 91, 0.9), rgba(245, 93, 44, 0.9));
}
</style>
	<main>
		<div class="container-fluid">
			<h2 class="mt-30 page-title">Edit Profile</h2>
			<ol class="breadcrumb mb-30">
				<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
				<li class="breadcrumb-item active">Edit Profile</li>
			</ol>
			<div class="row">
				<div class="col-lg-4 col-md-5">
					<div class="card card-static-2 mb-30">
						<div class="card-body-table">
							<div class="shopowner-content-left text-center pd-20">
								<div class="shop_img mb-3">
									<img src="<?php echo base_url().'/'.$businessadminimage[0]['cover_photo'] ?>" alt="">
								</div>
								<div class="shopowner-dt-left">
									<h4>Business</h4>
									<span>Admin</span>
								</div>
								<div class="shopowner-dts">
									<div class="shopowner-dt-list">
										<span class="left-dt">Username</span>
										<span class="right-dt"><?php echo  $businessprofile[0]['username']; ?></span>
									</div>
									<div class="shopowner-dt-list">
										<span class="left-dt">Phone</span>
										<span class="right-dt"><?php echo  $businessprofile[0]['contact']; ?></span>
									</div>
									<div class="shopowner-dt-list">
										<span class="left-dt">Email</span>
										<span class="right-dt"><?php echo  $businessprofile[0]['email']; ?></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-8 col-md-7">
					<div class="card card-static-2 mb-30">
						<div class="card-title-2">
							<h4>Edit Profile</h4>
						</div>
						<div class="card-body-table">
							<form class="cool-b4-form mt-5" action="<?php echo base_url();?>/Businessadmin/Businessprofile/update_businessprofile" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onSubmit="">
							<input type="hidden" name="pk_id" value="<?php echo  $businessprofile[0]['pk_id']; ?>"  />
								<div class="news-content-right pd-20">
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group mb-3">
												<label class="form-label">First Name*</label>
												<input type="text" class="form-control" name="firstname" value="<?php echo  $businessprofile[0]['firstname']; ?>" required placeholder="Enter First Name">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group mb-3">
												<label class="form-label">Last Name*</label>
												<input type="text" class="form-control" name="lastname" value="<?php echo  $businessprofile[0]['lastname']; ?>" placeholder="Enter Last Name">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group mb-3">
												<label class="form-label">User Name*</label>
												<input type="text" class="form-control" name="username" value="<?php echo  $businessprofile[0]['username']; ?>" placeholder="Enter User Name" required>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group mb-3">
												<label class="form-label">Email*</label>
												<input type="email" class="form-control" name="email" value="<?php echo  $businessprofile[0]['email']; ?>" placeholder="Enter Email Address">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group mb-3">
												<label class="form-label">Phone*</label>
												<input type="text" class="form-control" name="contact" value="<?php echo  $businessprofile[0]['contact']; ?>" placeholder="Enter Phone Number">
											</div>
										</div>
										<!--<div class="col-lg-6">
											<div class="form-group mb-3">
												<label class="form-label">Profile Image*</label>
												<div class="input-group">
													<div class="custom-file">
														<input type="file" class="form-control" name="file" accept="image/*">
													</div>
												</div>
												<input type="hidden" name="updatepic" value="<?php echo $businessadminimage[0]['cover_photo'] ?>" />
												<div class="add-cate-img-1">
													<img src="<?php echo base_url().'/'.$businessadminimage[0]['cover_photo'] ?>" alt="">
												</div>
											</div>
										</div>-->
										<div class="col-lg-12">
											<button class="save-btn hover-btn" type="submit">Save Changes</button>
											<a  href="<?php echo base_url(); ?>/Products" class="cancel-cst-btn">Cancel</a>
										</div>
									</div>
								</div>
							</form>	
						</div>
					</div>
				</div>
			</div>
		</div>
    </main>