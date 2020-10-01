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
				<h2 class="mt-30 page-title">Business</h2>
				<ol class="breadcrumb mb-30">
					<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/Business">Business</a></li>
					<li class="breadcrumb-item active">Add Business</li>
				</ol>
				<div class="row">
					<div class="col-lg-12">
					<?php $validation = \Config\Services::validation(); ?>
						<form class="cool-b4-form mt-5" action="<?php echo base_url();?>/Zrortadmin/Business/business_save" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onSubmit="">
							<div class="add-new-shop">
								<div class="card card-static-2 mb-30">
									<div class="row no-gutters">
										<div class="col-lg-6 col-md-6">
											<div class="card-title-2">
												<h4>Add New Business</h4>
											</div>
											<div class="card-body-table">
												<div class="add-shop-content pd-20">
													<div class="form-group">
														<label class="form-label">Business Number*</label>
														<input type="text" class="form-control" placeholder="Business Number"  name="business_number" required>
													<?php if($validation->getError('business_number')) {?>
														<div class='alert alert-danger mt-2'>
														  <?= $error = $validation->getError('business_number'); ?>
														</div>
													<?php }?>
													</div>
													<div class="form-group">
														<label class="form-label">Name*</label>
														<input type="text" class="form-control" placeholder="Business Name"  name="name" required>
													<?php if($validation->getError('name')) {?>
														<div class='alert alert-danger mt-2'>
														  <?= $error = $validation->getError('name'); ?>
														</div>
													<?php }?>
													</div>
													<div class="form-group">
														<label class="form-label">Country*</label>
														<input type="text" class="form-control" placeholder="Country Name"  name="country" required>
													<?php if($validation->getError('country')) {?>
														<div class='alert alert-danger mt-2'>
														  <?= $error = $validation->getError('country'); ?>
														</div>
													<?php }?>
													</div>
													<div class="form-group">
														<label class="form-label">State*</label>
														<input type="text" class="form-control" placeholder="Sate Name"  name="state" required>
													<?php if($validation->getError('state')) {?>
														<div class='alert alert-danger mt-2'>
														  <?= $error = $validation->getError('state'); ?>
														</div>
													<?php }?>
													</div>
													<div class="form-group">
														<label class="form-label">City*</label>
														<input type="text" class="form-control" placeholder="City Name"  name="city" required>
													<?php if($validation->getError('city')) {?>
														<div class='alert alert-danger mt-2'>
														  <?= $error = $validation->getError('city'); ?>
														</div>
													<?php }?>
													</div>
													<div class="form-group">
														<label class="form-label">Postal Code*</label>
														<input type="text" class="form-control" placeholder="Postal Code"  name="postalcode" required>
													<?php if($validation->getError('postalcode')) {?>
														<div class='alert alert-danger mt-2'>
														  <?= $error = $validation->getError('postalcode'); ?>
														</div>
													<?php }?>
													</div>
													<div class="form-group">
														<label class="form-label">Business Category*</label>
														<select id="categtory" name="business_category_id" class="form-control">
															<option value="" >--Select--</option>
															<?php
															foreach($get_businesscategories as $row)
															{
																echo '<option value="'.$row['pk_id'].'">'.$row['title'].'</option>';
															}
															?>
														</select>
													</div>
													<div class="form-group">
														<label class="form-label">Delivery Charge*</label>
														<input type="text" class="form-control" placeholder="$0" name="delivery_fee" required>
													<?php if($validation->getError('delivery_fee')) {?>
														<div class='alert alert-danger mt-2'>
														  <?= $error = $validation->getError('delivery_fee'); ?>
														</div>
													<?php }?>
													</div>
													<div class="form-group">
														<label class="form-label">Latitude*</label>
														<input type="text" class="form-control" placeholder="0" name="lat" required>
													<?php if($validation->getError('lat')) {?>
														<div class='alert alert-danger mt-2'>
														  <?= $error = $validation->getError('lat'); ?>
														</div>
													<?php }?>
													</div>
													<div class="form-group">
														<label class="form-label">Longitude*</label>
														<input type="text" class="form-control" placeholder="0" name="lang" required>
													<?php if($validation->getError('lang')) {?>
														<div class='alert alert-danger mt-2'>
														  <?= $error = $validation->getError('lang'); ?>
														</div>
													<?php }?>
													</div>
													<div class="form-group">
														<label class="form-label">Current Status*</label>
														<select id="status" name="status" class="form-control">
															<option selected value="1">Yes</option>
															<option value="0">No</option>
														</select>
													</div>
													<div class="form-group">
														<label class="form-label">Status*</label>
														<select id="status" name="is_active" class="form-control">
															<option selected value="1">Active</option>
															<option value="0">Inactive</option>
														</select>
													</div>
													<div class="form-group">
														<label class="form-label">Business Website*</label>
														<input type="text" class="form-control" placeholder="Business Website"  name="business_website" required>
													<?php if($validation->getError('business_website')) {?>
														<div class='alert alert-danger mt-2'>
														  <?= $error = $validation->getError('business_website'); ?>
														</div>
													<?php }?>
													</div>
													<div class="form-group">
														<label class="form-label">Tagline*</label>
														<input type="text" class="form-control" placeholder="Tagline"  name="tagline" required>
													<?php if($validation->getError('tagline')) {?>
														<div class='alert alert-danger mt-2'>
														  <?= $error = $validation->getError('tagline'); ?>
														</div>
													<?php }?>
													</div>
													<div class="form-group">
														<label class="form-label">Description*</label>
														<div class="card card-editor">
															<div class="content-editor">
																 <textarea class="text-control" placeholder="Enter Description" name="description" required></textarea>
															</div>
														</div>
													<?php if($validation->getError('description')) {?>
														<div class='alert alert-danger mt-2'>
														  <?= $error = $validation->getError('description'); ?>
														</div>
													<?php }?>
													</div>
													<div class="form-group">
														<label class="form-label">Business Image*</label>
														<div class="input-group">
															<div class="custom-file">
																<input type="file" class="form-control" name="file" accept="image/*">
															</div>
														</div>
													</div>	
													<div class="form-group">
														<label class="form-label">Business Logo*</label>
														<div class="input-group">
															<div class="custom-file">
																<input type="file" class="form-control" name="logofile" accept="image/*">
															</div>
														</div>
													</div>	
													<button class="save-btn hover-btn" type="submit">Add New Business</button>
													<a href="<?php echo base_url(); ?>/Business" class="cancel-cst-btn">Cancel</a>
												</div> 
											</div>
										</div>
										<div class="col-lg-6 col-md-6">
											<div class="card-title-2">
												<h4>Add New Business</h4>
											</div>
											<div class="card-body-table">
												<div class="add-shop-content pd-20">
													<div class="form-group">
														<label class="form-label">Delivery Price*</label>
														<input type="number"  class="form-control" placeholder="Enter Price" name="min_delivery_price" required>
													<?php if($validation->getError('min_delivery_price')) {?>
														<div class='alert alert-danger mt-2'>
														  <?= $error = $validation->getError('min_delivery_price'); ?>
														</div>
													<?php }?>
													</div>
													<div class="form-group">
														<label class="form-label">Delivery Time*</label>
														<input type="time" id="default-picker" class="form-control" placeholder="Select time" name="min_delivery_time" required>
													</div>
												</div>
											</div>
											
											<div class="card-title-2">
												<h4>Business Owner</h4>
											</div>
											<div class="card-body-table">
												<div class="add-shop-content pd-20">
													<div class="form-group">
														<label class="form-label">First Name*</label>
														<input class="form-control" type="text" placeholder="Enter First Name" name="firstname" required>
													<?php if($validation->getError('firstname')) {?>
														<div class='alert alert-danger mt-2'>
														  <?= $error = $validation->getError('firstname'); ?>
														</div>
													<?php }?>
													</div>
													<div class="form-group">
														<label class="form-label">Last Name*</label>
														<input class="form-control" type="text" placeholder="Enter Last Name" name="lastname" required>
													<?php if($validation->getError('lastname')) {?>
														<div class='alert alert-danger mt-2'>
														  <?= $error = $validation->getError('lastname'); ?>
														</div>
													<?php }?>
													</div>
													<div class="form-group">
														<label class="form-label">Username*</label>
														<input class="form-control" type="text" placeholder="Enter Username" name="username" required>
													<?php if($validation->getError('username')) {?>
														<div class='alert alert-danger mt-2'>
														  <?= $error = $validation->getError('username'); ?>
														</div>
													<?php }?>
													</div>
													<div class="form-group">
														<label class="form-label">Email Address*</label>
														<input class="form-control" type="email" placeholder="Enter Email Address" name="business_email" required>
													<?php if($validation->getError('business_email')) {?>
														<div class='alert alert-danger mt-2'>
														  <?= $error = $validation->getError('business_email'); ?>
														</div>
													<?php }?>
													</div>
													<div class="form-group">
														<label class="form-label">Mobile Number*</label>
														<input class="form-control" type="text" placeholder="Enter Mobile Number" name="business_mobile" required>
													<?php if($validation->getError('business_mobile')) {?>
														<div class='alert alert-danger mt-2'>
														  <?= $error = $validation->getError('business_mobile'); ?>
														</div>
													<?php }?>
													</div>
													<div class="form-group">
														<label class="form-label">Phone Number*</label>
														<input class="form-control" type="text" placeholder="Enter Phone Number" name="business_landline" required>
													<?php if($validation->getError('business_landline')) {?>
														<div class='alert alert-danger mt-2'>
														  <?= $error = $validation->getError('business_landline'); ?>
														</div>
													<?php }?>
													</div>
													<div class="form-group">
														<label class="form-label">Password*</label>
														<input class="form-control" type="password" placeholder="Enter Password" name="password_hash" required>
													<?php if($validation->getError('password_hash')) {?>
														<div class='alert alert-danger mt-2'>
														  <?= $error = $validation->getError('password_hash'); ?>
														</div>
													<?php }?>
													</div>
													<div class="form-group">
														<label class="form-label">Owner Address*</label>
														<div class="card card-editor">
															<div class="content-editor">
																 <textarea class="text-control" placeholder="Enter Address" name="business_address" required></textarea>
															</div>
														</div>
													<?php if($validation->getError('business_address')) {?>
														<div class='alert alert-danger mt-2'>
														  <?= $error = $validation->getError('business_address'); ?>
														</div>
													<?php }?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
        </main>