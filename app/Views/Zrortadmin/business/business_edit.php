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
			<li class="breadcrumb-item active">Edit Business</li>
		</ol>
		<div class="row">
			<div class="col-lg-12">
				<form class="cool-b4-form mt-5" action="<?php echo base_url();?>/Zrortadmin/Business/update_business" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onSubmit="">
					<div class="add-new-shop">
						<div class="card card-static-2 mb-30">
							<div class="row no-gutters">
								<div class="col-lg-6 col-md-6">
									<div class="card-title-2">
										<h4>Edit Business</h4>
									</div>
									<input type="hidden" name="pk_id" value="<?php echo  $business_edit[0]['pk_id']; ?>"  />
									<input type="hidden" name="business_admin_id" value="<?php echo  $business_edit[0]['business_admin_id']; ?>"  />
									<div class="card-body-table">
										<div class="add-shop-content pd-20">
											<div class="form-group">
												<label class="form-label">Business Number*</label>
												<input type="text" class="form-control numberclass" placeholder="Business Number"  name="business_number" value="<?php echo  $business_edit[0]['business_number']; ?>" required>
											</div>
											<div class="form-group">
												<label class="form-label">Name*</label>
												<input type="text" class="form-control" placeholder="Business Name"  name="name" value="<?php echo  $business_edit[0]['name']; ?>" required>
											</div>
											<div class="form-group">
												<label class="form-label">Country*</label>
												<input type="text" class="form-control" placeholder="Country Name"  name="country" value="<?php echo  $business_edit[0]['country']; ?>" required>
											</div>
											<div class="form-group">
												<label class="form-label">State*</label>
												<input type="text" class="form-control" placeholder="Sate Name"  name="state" value="<?php echo  $business_edit[0]['state']; ?>" required>
											</div>
											<div class="form-group">
												<label class="form-label">City*</label>
												<input type="text" class="form-control" placeholder="City Name"  name="city" value="<?php echo  $business_edit[0]['city']; ?>" required>
											</div>
											<div class="form-group">
												<label class="form-label">Postal Code*</label>
												<input type="text" class="form-control numberclass" placeholder="Postal Code"  name="postalcode"  value="<?php echo  $business_edit[0]['postalcode']; ?>" required>
											</div>
											<div class="form-group">
												<label class="form-label">Business Category*</label>
												<select id="categtory" name="business_category_id" class="form-control" required>
													<option value="" >--Select--</option>
													<?php	foreach($get_businesscategories as $key => $value){ ?>
													<option name ="business_category_id"  value="<?php echo $value['pk_id']; ?>" <?php if($business_edit[0]['business_category_id'] == $value['pk_id'] ){ echo 'selected="selected"'; } else  { echo ''; } ?>><?php echo $value['title']; ?></option>
												<?php } ?> 
												</select>
											</div>
											<div class="form-group">
												<label class="form-label">Delivery Charge*</label>
												<input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control numberclass" placeholder="$0" name="delivery_fee" value="<?php echo  $business_edit[0]['delivery_fee']; ?>" required>
											</div>
											<div class="form-group">
												<label class="form-label">Latitude*</label>
												<input type="text" class="form-control numberclass" placeholder="0" name="lat" value="<?php echo  $business_edit[0]['lat']; ?>" required>
											</div>
											<div class="form-group">
												<label class="form-label">Longitude*</label>
												<input type="text" class="form-control numberclass" placeholder="0" name="lang" value="<?php echo  $business_edit[0]['lang']; ?>" required>
											</div>
											<div class="form-group">
												<label class="form-label">Current Status*</label>
												<select id="status" name="status" class="form-control">
													<option  value="1" <?php if($business_edit[0]['status'] == 1 ){ echo 'selected="selected"'; } else  { echo ''; } ?>>Yes</option>
													<option value="0" <?php if($business_edit[0]['status'] == 0 ){ echo 'selected="selected"'; } else  { echo ''; } ?>>No</option>
												</select>
											</div>
											<div class="form-group">
												<label class="form-label">Status*</label>
												<select id="status" name="is_active" class="form-control">
													<option selected value="1" <?php if($business_edit[0]['is_active'] == 1 ){ echo 'selected="selected"'; } else  { echo ''; } ?>>Active</option>
													<option value="0" <?php if($business_edit[0]['is_active'] == 0 ){ echo 'selected="selected"'; } else  { echo ''; } ?>>Inactive</option>
												</select>
											</div>
											<div class="form-group">
												<label class="form-label">Business Website*</label>
												<input type="text" class="form-control" placeholder="Business Website"  name="business_website" value="<?php echo  $business_edit[0]['business_website']; ?>" required>
											</div>
											<div class="form-group">
												<label class="form-label">Tagline*</label>
												<input type="text" class="form-control" placeholder="Tagline"  name="tagline" value="<?php echo  $business_edit[0]['tagline']; ?>" required>
											</div>
											<div class="form-group">
												<label class="form-label">Description*</label>
												<div class="card card-editor">
													<div class="content-editor">
														 <textarea class="text-control" placeholder="Enter Description" name="description" required><?php echo  $business_edit[0]['description']; ?></textarea>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="form-label">Business Image*</label>
												<div class="input-group">
													<div class="custom-file">
														<input type="file" class="form-control" name="file" accept="image/*">
													</div>
												</div>
											</div>
											<input type="hidden" name="updatepic" value="<?php echo $business_edit[0]['cover_photo'] ?>" />
											<div class="form-group">
												<div class="col-md-10 col-md-offset-2 col-sm-9">
													<img src="<?php echo base_url().'/'.$business_edit[0]['cover_photo'] ?>" class="img-fluid" alt="Default Image" height="200" style="margin:0% 20%;" />
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
											<input type="hidden" name="updatepic_logo" value="<?php echo $business_edit[0]['business_logo'] ?>" />
											<div class="form-group">
												<div class="col-md-10 col-md-offset-2 col-sm-9">
													<img src="<?php echo base_url().'/'.$business_edit[0]['business_logo'] ?>" class="img-fluid" alt="Default Image" height="200" style="margin:0% 20%;" />
												</div>
											</div>
											<button class="save-btn hover-btn" type="submit">Update Business</button>
											<a href="<?php echo base_url(); ?>/Business	" class="cancel-cst-btn">Cancel</a>
										</div> 
									</div>
								</div>
								<div class="col-lg-6 col-md-6">
									<div class="card-title-2">
										
									</div>
									<div class="card-body-table">
										<div class="add-shop-content pd-20">
											<div class="form-group">
												<label class="form-label">Delivery Price*</label>
												<input type="number"  class="form-control numberclass" placeholder="Enter Price" name="min_delivery_price" value="<?php echo  $business_edit[0]['min_delivery_price']; ?>"  required>
											</div>
											<div class="form-group">
												<label class="form-label">Delivery Time*</label>
												<input type="time" id="default-picker" class="form-control" placeholder="Select time" name="min_delivery_time" value="<?php echo  $business_edit[0]['min_delivery_time']; ?>"  required>
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
												<input class="form-control" type="text" placeholder="Enter First Name" name="firstname" value="<?php echo  $get_businessadmin[0]['firstname']; ?>"  required>
											</div>
											<div class="form-group">
												<label class="form-label">Last Name*</label>
												<input class="form-control" type="text" placeholder="Enter Last Name" name="lastname" value="<?php echo  $get_businessadmin[0]['lastname']; ?>"  required>
											</div>
											<div class="form-group">
												<label class="form-label">Username*</label>
												<input class="form-control" type="text" placeholder="Enter Username" name="username"  value="<?php echo  $get_businessadmin[0]['username']; ?>"  required>
											</div>
											<div class="form-group">
												<label class="form-label">Email Address*</label>
												<input class="form-control" type="email" placeholder="Enter Email Address" name="business_email" value="<?php echo  $business_edit[0]['business_email']; ?>"  required>
											</div>
											<div class="form-group">
												<label class="form-label">Mobile Number*</label>
												<input class="form-control numberclass" type="text" placeholder="Enter Mobile Number" name="business_mobile" value="<?php echo  $business_edit[0]['business_mobile']; ?>"  required>
											</div>
											<div class="form-group">
												<label class="form-label">Phone Number*</label>
												<input class="form-control numberclass" type="text" placeholder="Enter Phone Number" name="business_landline" value="<?php echo  $business_edit[0]['business_landline']; ?>"  required>
											</div>
											<div class="form-group">
												<label class="form-label">Password*</label>
												<input class="form-control" type="password" placeholder="Enter Password" name="password_hash" value="<?php echo  $get_businessadmin[0]['password_hash']; ?>"  required>
											</div>
											<div class="form-group">
												<label class="form-label">Owner Address*</label>
												<div class="card card-editor">
													<div class="content-editor">
														 <textarea class="text-control" placeholder="Enter Address" name="business_address" required><?php echo  $business_edit[0]['business_address']; ?></textarea>
													</div>
												</div>
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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
$('.numberclass').keydown(function(e){
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 || // Allow: Ctrl+A, Command+A
        (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) || // Allow: home, end, left, right, down, up
        (e.keyCode >= 35 && e.keyCode <= 40)) {// let it happen, don't do anything
            return;
    }
            // Ensure that it is a number and stop the keypress
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
            // $(this).val('0');
        $(this).select();
    }
});

$(document).on('keydown','.numberclass',function(e){
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 || // Allow: Ctrl+A, Command+A
        (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) || // Allow: home, end, left, right, down, up
        (e.keyCode >= 35 && e.keyCode <= 40)) {// let it happen, don't do anything
            return;
    }
    // Ensure that it is a number and stop the keypress
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
            // $(this).val('0');
        $(this).select();
    }
});</script>