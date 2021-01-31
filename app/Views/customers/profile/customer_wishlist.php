<?php //print_r($data['products']); exit;?>
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
					<a href="<?= base_url('customer/wishlist')?>" class="user-item active"><i class="uil uil-heart"></i>Shopping Wishlist</a>
					<a href="<?= base_url('customer/address/view')?>" class="user-item"><i class="uil uil-location-point"></i>My Address</a>
					<a href="<?= base_url('customer/logout')?>" class="user-item"><i class="uil uil-exit"></i>Logout</a>
				</div>
			</div>
		</div>
			<div class="col-lg-9 col-md-8">
				<div class="dashboard-right">
					<div class="row">
						<div class="col-md-12">
							<div class="main-title-tab">
								<h4><i class="uil uil-heart"></i>Shopping Wishlist</h4>
							</div>
						</div>								
						<div class="col-lg-12 col-md-12">
							<div class="pdpt-bg">
							<?php foreach($data['products'] as $key => $product):?>
								<div class="wishlist-body-dtt">
									<div class="cart-item">
										<div class="cart-product-img">
											<img src="<?php echo base_url().'/'.$product['image_path']; ?>" alt="">
										<div class="offer-badge">
										<?php if($product['discount_percent'] == ""){echo "0 % Off";} else{?>
										<?= $product['discount_percent'] .'% Off';} ?></div>
									</div>
									<div class="cart-text">
										<h4><?= $product['name'] ?></h4>
										<div class="cart-item-price"><?= 'Rs '.$product['unit_price'] ?> <!--<span>$18</span></div>-->
											<button onclick="deleteFromWishlist(<?= $product['pk_id'] ?>)" type="button" class="cart-close-btn"><i class="uil uil-trash-alt"></i></button>
										</div>		
									</div>
								</div>
								<?php endforeach ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>
</div>				