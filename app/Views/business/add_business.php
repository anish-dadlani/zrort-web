		<main>
			<div class="container-fluid">
				<h2 class="mt-30 page-title">Business</h2>
				<ol class="breadcrumb mb-30">
					<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/business">Business</a></li>
					<li class="breadcrumb-item active">Add Business</li>
				</ol>
				<div class="row">
					<div class="col-lg-12">
						<form class="cool-b4-form mt-5" action="<?php echo base_url();?>/Business/business_save" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onSubmit="">
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
													</div>
													<div class="form-group">
														<label class="form-label">Name*</label>
														<input type="text" class="form-control" placeholder="Business Name"  name="name" required>
													</div>
													<div class="form-group">
														<label class="form-label">Country*</label>
														<input type="text" class="form-control" placeholder="Country Name"  name="country" required>
													</div>
													<div class="form-group">
														<label class="form-label">State*</label>
														<input type="text" class="form-control" placeholder="Sate Name"  name="state" required>
													</div>
													<div class="form-group">
														<label class="form-label">City*</label>
														<input type="text" class="form-control" placeholder="City Name"  name="city" required>
													</div>
													<div class="form-group">
														<label class="form-label">Postal Code*</label>
														<input type="text" class="form-control" placeholder="Postal Code"  name="postalcode" required>
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
														<input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control" placeholder="$0" name="delivery_fee" required>
													</div>
													<div class="form-group">
														<label class="form-label">Latitude*</label>
														<input type="text" class="form-control" placeholder="0" name="lat" required>
													</div>
													<div class="form-group">
														<label class="form-label">Longitude*</label>
														<input type="text" class="form-control" placeholder="0" name="lang" required>
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
													</div>
													<div class="form-group">
														<label class="form-label">Tagline*</label>
														<input type="text" class="form-control" placeholder="Tagline"  name="tagline" required>
													</div>
													<div class="form-group">
														<label class="form-label">Description*</label>
														<div class="card card-editor">
															<div class="content-editor">
																 <textarea class="text-control" placeholder="Enter Description" name="description" required></textarea>
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
													<div class="form-group">
														<label class="form-label">Business Logo*</label>
														<div class="input-group">
															<div class="custom-file">
																<input type="file" class="form-control" name="logofile" accept="image/*">
															</div>
														</div>
													</div>	
													<button class="save-btn hover-btn" type="submit">Add New Business</button>
													<a href="<?php echo base_url(); ?>/business" class="save-btn hover-btn">Cancel</a>
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
													</div>
													<div class="form-group">
														<label class="form-label">Last Name*</label>
														<input class="form-control" type="text" placeholder="Enter Last Name" name="lastname" required>
													</div>
													<div class="form-group">
														<label class="form-label">Username*</label>
														<input class="form-control" type="text" placeholder="Enter Username" name="username" required>
													</div>
													<div class="form-group">
														<label class="form-label">Email Address*</label>
														<input class="form-control" type="email" placeholder="Enter Email Address" name="business_email" required>
													</div>
													<div class="form-group">
														<label class="form-label">Mobile Number*</label>
														<input class="form-control" type="text" placeholder="Enter Mobile Number" name="business_mobile" required>
													</div>
													<div class="form-group">
														<label class="form-label">Phone Number*</label>
														<input class="form-control" type="text" placeholder="Enter Phone Number" name="business_landline" required>
													</div>
													<div class="form-group">
														<label class="form-label">Password*</label>
														<input class="form-control" type="password" placeholder="Enter Password" name="password_hash" required>
													</div>
													<div class="form-group">
														<label class="form-label">Owner Address*</label>
														<div class="card card-editor">
															<div class="content-editor">
																 <textarea class="text-control" placeholder="Enter Address" name="business_address" required></textarea>
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