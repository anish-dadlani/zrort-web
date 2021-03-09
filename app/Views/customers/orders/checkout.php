<?php 
if(isset($empty) && $empty == "Yes"){
	echo "<script>
	alert('Your cart is empty! Please add some products to cart to place order.');
	window.location.href = '".base_url('/')."'; </script>";
}
?>
<div class="gambo-Breadcrumb">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?= base_url('customer/dashboard')?>">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Checkout</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</div>
<div class="all-product-grid">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-7">
				<div id="checkout_wizard" class="checkout accordion left-chck145">
					<!-- <div class="checkout-step">
						<div class="checkout-card" id="headingOne"> 
							<span class="checkout-step-number">1</span>
							<h4 class="checkout-step-title"> 
								<button class="wizard-btn" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> Phone Number Verification</button>
							</h4>
						</div> -->
						<!-- <div id="collapseOne" class="collapse in show" data-parent="#checkout_wizard">
							<div class="checkout-step-body">
								<p>We need your phone number so we can inform you about any delay or problem.</p>	
								<p class="phn145">4 digits code send your phone <span><?php // $_SESSION['phone'] ?></span><a class="edit-no-btn hover-btn" data-toggle="collapse" href="#edit-number">Edit</a></p>
								<div class="collapse" id="edit-number">
									<div class="row">
										<div class="col-lg-8">
											<div class="checkout-login">
												<form>
													<div class="login-phone">
														<input type="text" class="form-control numberclass" maxlength="10" placeholder="Phone Number">
													</div>
													<a class="chck-btn hover-btn" role="button" data-toggle="collapse" href="#otp-verifaction" >Send Code</a>
												</form>
											</div>
										</div>
									</div>
								</div>
								<div class="otp-verifaction">
									<div class="row">
										<div class="col-lg-12">
											<div class="form-group mb-0">
												<label class="control-label">Enter Code</label>
												<ul class="code-alrt-inputs">
													<li>
														<input id="code[1]" name="number" type="text" maxlength="1" placeholder="" class="form-control input-md numberclass" required="">
													</li>
													<li>
														<input id="code[2]" name="number" type="text" maxlength="1" placeholder="" class="form-control input-md numberclass" required="">
													</li>
													<li>
														<input id="code[3]" name="number" type="text" maxlength="1" placeholder="" class="form-control input-md numberclass" required="">
													</li>
													<li>
														<input id="code[4]" name="number" type="text" maxlength="1" placeholder="" class="form-control input-md numberclass" required="">
													</li>
													<li>
														<a class="collapsed chck-btn hover-btn" role="button" data-toggle="collapse" data-parent="#checkout_wizard" href="#collapseTwo">Next</a>
													</li>
												</ul>
												<a href="#" class="resend-link">Resend Code</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div> -->
					<div class="checkout-step">
						<div class="checkout-card" id="headingTwo">
							<span class="checkout-step-number">1</span>
							<h4 class="checkout-step-title">
								<button class="wizard-btn collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"> Delivery Address</button>
							</h4>
						</div>
						<div id="collapseTwo" class="collapse in show" aria-labelledby="headingTwo" data-parent="#checkout_wizard">
							<div class="checkout-step-body">
								<div class="checout-address-step">
									<div class="row">
										<div class="col-lg-12">												
											<form action="<?= base_url('orders/save') ?>" method="post">
												<!-- Multiple Radios (inline) -->
												<div class="form-group">
													<div class="product-radio">
														<ul class="product-now">
															<li>
																<input type="radio" id="ad1" value="Home" name="address1" checked>
																<label for="ad1">Home</label>
															</li>
															<li>
																<input type="radio" id="ad2" value="Office" name="address1">
																<label for="ad2">Office</label>
															</li>
															<li>
																<input type="radio" id="ad3" value="Other" name="address1">
																<label for="ad3">Other</label>
															</li>
														</ul>
													</div>
												</div>
												<div class="address-fieldset">
													<div class="row">
														<div class="col-lg-6 col-md-12">
															<div class="form-group">
																<label class="control-label">Name*</label>
																<input id="name" name="name" type="text" placeholder="Name" class="form-control input-md" value="<?php if(isset($_SESSION['UserAuth']) == 'Yes'){ echo $_SESSION['firstname'].' '.$_SESSION['lastname']; } ?>" disabled="disabled">
															</div>
														</div>
														<div class="col-lg-6 col-md-12">
															<div class="form-group">
																<label class="control-label">Email Address*</label>
																<input id="email" name="email" type="text" placeholder="Email Address" class="form-control input-md" value="<?php if(isset($_SESSION['UserAuth']) == 'Yes'){ echo $_SESSION['email']; } ?>" disabled="disabled">
															</div>
														</div>
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
														<div class="col-lg-12 col-md-12">
															<div class="form-group">
																<div class="address-btns">
																	<!-- <button id="saveAddress" name="saveAddress" type="submit" class="save-btn14 hover-btn">Save</button> -->
																	<a class="collapsed ml-auto next-btn16 hover-btn" id="saveAddress_Next" name="saveAddress_Next" role="button" data-toggle="collapse" data-parent="#checkout_wizard" href="#collapseThree"> Next </a>
																</div>
															</div>
														</div>
													</div>
												</div>
											<!-- </form> -->
										</div>
									</div>
								</div>
								<!-- <a class="collapsed next-btn16 hover-btn" role="button" data-toggle="collapse"  href="#collapseFour"> Proccess to payment </a> -->
							</div>
						</div>
					</div>
					<div class="checkout-step">
						<div class="checkout-card" id="headingThree"> 
							<span class="checkout-step-number">2</span>
							<h4 class="checkout-step-title">
								<button class="wizard-btn collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"> Delivery Time & Date </button>
							</h4>
						</div>
						<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#checkout_wizard">
							<div class="checkout-step-body">
								<!-- <form action="<?php //base_url('orders/save') ?>" method="post"> -->
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label">Select Delivery Time*</label>
											<!-- <div class="date-slider-group"> -->
												<!-- <div class="owl-carousel date-slider owl-theme"> -->
													<div class="item">
														<div class="date-now">
															<input type="radio" class="clickTime" id="time" name="date111" value="Instant" checked="">
															<label for="Morning">Instant</label>
														</div>
													</div>
													<div class="item">
														<div class="date-now">
															<input type="radio" class="clickTime" id="time1" name="date111" value="Interval">
															<label for="Afternoon">Interval</label>
														</div>
													</div>
												<!-- </div> -->
											<!-- </div> -->
											<div class="time-radio" id="hideInstant">
												<div class="ui form">
													<div class="grouped fields">
														<div class="field">
															<div class="ui radio checkbox chck-rdio">
																<input type="radio" class="uncheck" id="date" name="time" value="8.00AM - 10.00AM" checked="" tabindex="0" class="hidden">
																<label>8.00AM - 10.00AM</label>
															</div>
														</div>
														<div class="field">
															<div class="ui radio checkbox chck-rdio">
																<input type="radio" class="uncheck" id="date1" name="time" value="10.00AM - 12.00PM" tabindex="0" class="hidden">
																<label>10.00AM - 12.00PM</label>
															</div>
														</div>
														<div class="field">
															<div class="ui radio checkbox chck-rdio">
																<input type="radio" class="uncheck" id="date2" name="time" value="12.00PM - 2.00PM" tabindex="0" class="hidden">
																<label>12.00PM - 2.00PM</label>
															</div>
														</div>
														<div class="field">
															<div class="ui radio checkbox chck-rdio">
																<input type="radio" class="uncheck" id="date3" name="time" value="2.00PM - 4.00PM" tabindex="0" class="hidden">
																<label>2.00PM - 4.00PM</label>
															</div>
														</div>
														<div class="field">
															<div class="ui radio checkbox chck-rdio">
																<input type="radio" class="uncheck" id="date4" name="time" value="4.00PM - 6.00PM" tabindex="0" class="hidden">
																<label>4.00PM - 6.00PM</label>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<a class="collapsed next-btn16 hover-btn" role="button" data-toggle="collapse"  href="#collapseFour"> Proccess to payment </a>
							</div>
						</div>
					</div>
					<div class="checkout-step">
						<div class="checkout-card" id="headingFour">
							<span class="checkout-step-number">3</span>
							<h4 class="checkout-step-title"> 
								<button class="wizard-btn collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Payment</button>
							</h4>
						</div>
						<!-- <form action="<?php //echo base_url('orders/save'); ?>" method="post"> -->
						<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#checkout_wizard">
							<div class="checkout-step-body">
								<div class="payment_method-checkout">	
									<div class="row">	
										<div class="col-md-12">
											<div class="rpt100">													
												<ul class="radio--group-inline-container_1">
												<?php foreach($data['paymentMethod'] as $key => $value):?>
													<li>
														<div class="radio-item_1">
															<input id="<?= $value['description'].'1' ?>" value="<?= $value['description'] ?>" name="paymentmethod" type="radio" data-minimum="50.0">
															<label for="<?= $value['description'].'1' ?>" class="radio-label_1"><?= $value['method_title'] ?></label>
														</div>
													</li>
												<?php endforeach; ?>
												</ul>
											</div>
											<div class="form-group return-departure-dts" data-method="cashondelivery">															
												<div class="row">
													<div class="col-lg-12">
														<div class="pymnt_title">
															<h4>Cash on Delivery</h4>
															<p>Cash on Delivery will not be available if your order value exceeds Rs 100.</p>
														</div>
													</div>														
												</div>
											</div>
											<div class="form-group return-departure-dts" data-method="card">															
												<div class="row">
													<div class="col-lg-12">
														<div class="pymnt_title mb-4">
															<h4>Credit / Debit Card</h4>
														</div>
													</div>														
													<div class="col-lg-6">
														<div class="form-group mt-1">
															<label class="control-label">Holder Name*</label>
															<div class="ui search focus">
																<div class="ui left icon input swdh11 swdh19">
																	<input class="prompt srch_explore" type="text" name="holdername" value="" id="holder[name]" maxlength="64" placeholder="Holder Name">															
																</div>
															</div>
														</div>
													</div>
													<div class="col-lg-6">
														<div class="form-group mt-1">
															<label class="control-label">Card Number*</label>
															<div class="ui search focus">
																<div class="ui left icon input swdh11 swdh19">
																	<input class="prompt srch_explore numberclass" type="text" name="cardnumber" value="" id="card[number]" maxlength="64" placeholder="Card Number">															
																</div>
															</div>
														</div>
													</div>
													<div class="col-lg-4">
														<div class="form-group mt-1">																	
															<label class="control-label">Expiration Month*</label>
															<select class="ui fluid search dropdown form-dropdown" name="card[expire-month]">
																<option value="">Month</option>
																<option value="1">January</option>
																<option value="2">February</option>
																<option value="3">March</option>
																<option value="4">April</option>
																<option value="5">May</option>
																<option value="6">June</option>
																<option value="7">July</option>
																<option value="8">August</option>
																<option value="9">September</option>
																<option value="10">October</option>
																<option value="11">November</option>
																<option value="12">December</option>
		                                                    </select>	
														</div>
													</div>
													<div class="col-lg-4">
														<div class="form-group mt-1">
															<label class="control-label">Expiration Year*</label>
															<div class="ui search focus">
																<div class="ui left icon input swdh11 swdh19">
																	<input class="prompt srch_explore numberclass" type="text" name="card[expire-year]" maxlength="4" placeholder="Year">															
																</div>
															</div>
														</div>
													</div>
													<div class="col-lg-4">
														<div class="form-group mt-1">
															<label class="control-label">CVV*</label>
															<div class="ui search focus">
																<div class="ui left icon input swdh11 swdh19">
																	<input class="prompt srch_explore numberclass" name="card[cvc]" maxlength="3" placeholder="CVV">															
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<button type="submit" id="placeOrder" name="placeOrder" class="next-btn16 hover-btn">Place Order</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						</form>
					</div>
				<!-- </form> -->
				</div>
			</div>
			<div class="col-lg-4 col-md-5">
				<div class="pdpt-bg mt-0">
					<div class="pdpt-title">
						<h4>Order Summary</h4>
					</div>
					<div class="right-cart-dt-body">
					<?php $sumTotal = 0; $sumSaving = 0; $charges = 0;
					if(isset($_SESSION['cart'])){
						foreach($_SESSION['cart'] as $key => $item): 
							$business_ids[] = $item['bussiness_id'];
							$business_ids = array_unique($business_ids);
						endforeach;
						if(isset($business_ids) && !empty($business_ids)){
							foreach($business_ids as $id){
								$charges = $charges + get_business_delivery_charges($id);
							}
						}
						foreach($_SESSION['cart'] as $key => $item): 
							if(isset($item['discount_amount'])){
								$sumTotal = $sumTotal + ($item['discount_amount'] * $item['quantity']); 
								$sumSaving = $sumSaving + (($item['unit_price'] - $item['discount_amount'])  * $item['quantity']);
							}else{
								$sumTotal = $sumTotal + ($item['unit_price'] * $item['quantity']); 
							}				
						?>
						
						<div class="cart-item border_radius">							
							<div class="cart-product-img">
								<img src="<?= base_url().'/'.$item['image_path'] ?>" alt="">
								<?php if(isset($item['discount_amount']) && isset($item['discount_percent'])){?>
									<div class="offer-badge"><?= $item['discount_percent'].'% OFF' ?></div>
								<?php } ?>
							</div>
							<div class="cart-text">
								<h4><?=$item['name']?></h4>
								<div class="cart-item-price">
									<?php if(isset($item['discount_amount'])){?>
											<?= 'Rs '.$item['discount_amount'] ?><span><?= $item['unit_price']?></span></div>
									<?php }else { ?>
										<?= 'Rs '.$item['unit_price'] ?> </div>
									<?php }?>
								<button type="button" class="cart-close-btn" onclick="removeFromCart(<?=$item['pk_id']?>)"><i class="uil uil-multiply"></i></button>
							</div>									
						</div>
						<?php endforeach;
					}?>
					</div>
					<div class="total-checkout-group">
						<!-- <div class="cart-total-dil">
							<h4>Gambo Super Market</h4>
							<span>$15</span>
						</div>-->
						<div class="cart-total-dil pt-3">
							<h4>Delivery Charges</h4>
							<span><?= $charges ?></span>
						</div> 
					</div>
					<?php $finaltotal = $sumTotal + $charges; ?>
					<div class="cart-total-dil saving-total ">
						<h4>Total Saving</h4>
						<span><?= 'Rs '.$sumSaving ?></span>
					</div>
					<div class="main-total-cart">
						<h2>Total</h2>
						<span><?= 'Rs '.$finaltotal ?></span>
					</div>
					<div class="payment-secure">
						<i class="uil uil-padlock"></i>Secure checkout
					</div>
				</div>
				<a href="#" class="promo-link45">Have a promocode?</a>
				<div class="checkout-safety-alerts">
					<p><i class="uil uil-sync"></i>100% Replacement Guarantee</p>
					<p><i class="uil uil-check-square"></i>100% Genuine Products</p>
					<p><i class="uil uil-shield-check"></i>Secure Payments</p>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
$(window).on('load', function(){
	document.getElementById('hideInstant').style.display = 'none';
	$('.uncheck').removeAttr('checked');
});
$(".clickTime").click(function(){ 
	if($(this).is(":checked")){ 
		var val = $(this).val();
		if(val == 'Instant'){
			document.getElementById('hideInstant').style.display = 'none';
			$('.uncheck').removeAttr('checked');
		}else if(val == 'Interval'){
			document.getElementById('hideInstant').style.display = '';
		}
	}
});
</script>