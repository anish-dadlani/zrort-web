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
													<input id="mobile1" name="mobile1" type="text" placeholder="Enter Contact Number" class="form-control input-md numberclass" required="">
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