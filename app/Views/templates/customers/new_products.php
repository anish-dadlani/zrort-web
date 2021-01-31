<!-- New Products Start -->
<div class="section145">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="main-title-tt">
					<div class="main-title-left">
						<span>For You</span>
						<h2>Added New Products</h2>
					</div>
					<a href="<?= base_url('products/new_products').'/'.$business_id?>" class="see-more-btn">See All</a>
				</div>
			</div>
			<div class="col-md-12">
				<div class="owl-carousel featured-slider owl-theme">
					<?php foreach($products as $key => $item): ?>
					<div class="item">
						<div class="product-item">
							<a href="<?= base_url().'/products/view/'.$item['pk_id']?>" class="product-img">
							<img src="<?php echo base_url().'/'.$item['image_path']; ?>" alt="">
								<div class="product-absolute-options">
									<span class="offer-badge-1">New</span>
									<span class="like-icon" title="wishlist" onclick="addToWishList(<?= $item['pk_id'] ?>)"></span>
								</div>
							</a>
							<div class="product-text-dt">
								<h4><?= $item['name'] ?></h4>
								<div class="product-price">
								<?php if(isset($item['discount_amount'])){?>
											<?= 'Rs '.$item['discount_amount'] ?><span><?= $item['unit_price']?></span></div>
									<?php }else { ?>
										<?= 'Rs '.$item['unit_price'] ?> </div>
									<?php }?>
								<!-- </div> -->
								<div class="qty-cart">
									<div class="quantity buttons_added">
										<input type="button" id="minus" value="-" class="minus minus-btn">
										<input type="number" id="number" step="1" name="quantity" value="1" class="input-text qty text">
										<input type="button" id="plus" value="+" class="plus plus-btn">
									</div>
									<span class="cart-icon" onclick="addToCart(<?= $item['pk_id'] ?>)"><i class="uil uil-shopping-cart-alt"></i></span>
								</div>
							</div>
						</div>
					</div>
					<?php endforeach ?>	
				</div>	
			</div>
		</div>
	</div>
</div>
<!-- New Products End -->