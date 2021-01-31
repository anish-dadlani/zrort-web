<!-- Add Address Model Start-->
<div id="address_model" class="header-cate-model main-gambo-model modal fade" tabindex="-1" role="dialog" aria-modal="false">
    <div class="modal-dialog category-area" role="document">
        <div class="category-area-inner">
            <div class="modal-header">
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
	    			<i class="uil uil-multiply"></i>
                </button>
            </div>
            <div class="category-model-content modal-content"> 
		    	<div class="cate-header">
					<h4>Add New Address</h4>
				</div>
				<div class="add-address-form">
					<div class="checout-address-step">
						<div class="row">
							<div class="col-lg-12">												
								<form action="<?= base_url('customer/address/save')?>" method="post">
									<!-- Multiple Radios (inline) -->
									<div class="form-group">
										<div class="product-radio">
											<ul class="product-now">
												<li>
													<input type="radio" id="ad1" name="address1" value="Home" checked>
													<label for="ad1">Home</label>
												</li>
												<li>
													<input type="radio" id="ad2" name="address1" value="Office">
													<label for="ad2">Office</label>
												</li>
												<li>
													<input type="radio" id="ad3" name="address1" value="Other">
													<label for="ad3">Other</label>
												</li>
											</ul>
										</div>
									</div>
									<div class="address-fieldset">
										<div class="row">
											<div class="col-lg-12 col-md-12">
												<div class="form-group">
													<label class="control-label">Flat / House / Office No.*</label>
													<input id="flat" name="flat" type="text" placeholder="Address" class="form-control input-md" required="">
												</div>
											</div>
											<div class="col-lg-12 col-md-12">
												<div class="form-group">
													<label class="control-label">Street / Society / Office Name*</label>
													<input id="street" name="street" type="text" placeholder="Street Address" class="form-control input-md">
												</div>
											</div>
                                            <div class="col-lg-12 col-md-12">
												<div class="form-group">
													<label class="control-label">Sector / Colony*</label>
													<input id="sector_colony" name="sector_colony" type="text" placeholder="Sector / Colony" class="form-control input-md">
												</div>
											</div>
											<div class="col-lg-6 col-md-12">
												<div class="form-group">
													<label class="control-label">Pincode*</label>
													<input id="pincode" name="pincode" type="text" placeholder="Pincode" class="form-control input-md numberclass" required="">
												</div>
											</div>
											<div class="col-lg-6 col-md-12">
			    								<div class="form-group">
													<label class="control-label">Locality*</label>
													<input id="Locality" name="locality" type="text" placeholder="Enter City" class="form-control input-md" required="">
												</div>
											</div>
                                            <div class="col-lg-6 col-md-12">
			    								<div class="form-group">
													<label class="control-label">Country*</label>
													<input id="country" name="country" type="text" placeholder="Enter Country" class="form-control input-md" required="">
												</div>
											</div>
                                            <div class="col-lg-6 col-md-12">
			    								<div class="form-group">
													<label class="control-label">Contact Number*</label>
													<input id="mobile1" name="mobile1" type="text" maxlength="11" placeholder="Enter Contact Number" class="form-control input-md numberclass" required="">
												</div>
											</div>
											<div class="col-lg-12 col-md-12">
												<div class="form-group mb-0">
													<div class="address-btns">
														<button type="submit" class="save-btn14 hover-btn">Save</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
<!-- Add Address Model End-->
<div class="">
	<div class="container">
		<div class="row">
			<?php //echo view('/templates/customers/customer_profile_nav'); ?>
			<div class="col-lg-3 col-md-4">
				<div class="left-side-tabs">
					<div class="dashboard-left-links">
						<a href="<?= base_url('customer/profile')?>" class="user-item"><i class="uil uil-apps"></i>Overview</a>
						<a href="#" class="user-item"><i class="uil uil-box"></i>My Orders</a>
						<a href="#" class="user-item"><i class="uil uil-gift"></i>My Rewards</a>
						<a href="#" class="user-item"><i class="uil uil-wallet"></i>My Wallet</a>
						<a href="<?= base_url('customer/wishlist')?>" class="user-item"><i class="uil uil-heart"></i>Shopping Wishlist</a>
						<a href="<?= base_url('customer/address/view')?>" class="user-item active"><i class="uil uil-location-point"></i>My Address</a>
						<a href="<?= base_url('customer/logout')?>" class="user-item"><i class="uil uil-exit"></i>Logout</a>
					</div>
				</div>
			</div>
				<div class="col-lg-9 col-md-8">
					<div class="dashboard-right">
						<div class="row">
							<div class="col-md-12">
								<div class="main-title-tab">
									<h4><i class="uil uil-location-point"></i>My Address</h4>
								</div>
							</div>
							<div class="col-lg-12 col-md-12">
								<div class="pdpt-bg">
									<div class="pdpt-title">
										<h4>My Address</h4>
									</div>
									<div class="address-body">
										<a href="#" class="add-address hover-btn" data-toggle="modal" data-target="#address_model">Add New Address</a>
                                        <?php if(isset($address) && !empty($address)) { foreach($address as $key => $value){ ?>
										<div class="address-item">
											<div class="address-icon1">
												<i class="uil uil-home-alt"></i>
											</div>
											<div class="address-dt-all">
												<h4><?=$value['address_type']?></h4>
												<p><?=$value['house_no']?>, <?=$value['street']?>, <?=$value['sector_colony']?>, <?=$value['city']?> <?=$value['country']?>, <?=$value['zipcode']?></p>
												<ul class="action-btns">
													<!-- <li><i class="uil uil-edit" onclick="edit_address(<?php //echo $value['pk_id']; ?>)"></i></li> -->
													<li><a href="<?php echo base_url(); ?>/customer/address/edit/<?php echo $value['pk_id']?>" class="action-btn"><i class="uil uil-edit"></i></a></li>
													<li><a href="<?php echo base_url(); ?>/customer/address/delete/<?php echo $value['pk_id']?>" class="action-btn"><i class="uil uil-trash-alt"></i></a></li>
												</ul>
											</div>
										</div>
                                        <?php }  }?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>	
		</div>	
	</div>
