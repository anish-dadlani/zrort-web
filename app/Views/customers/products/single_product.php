<div class="gambo-Breadcrumb">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?= base_url('/')?>">Home</a></li>
						<li class="breadcrumb-item"><a href="#"><?= get_category_name_by_product_id($product_id) ?></a></li>
						<li class="breadcrumb-item active" aria-current="page"><?= get_product_name($product_id) ?></li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</div>
<div class="all-product-grid">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="product-dt-view">
					<div class="row">
						<div class="col-lg-4 col-md-4">
							<div id="sync1" class="owl-carousel owl-theme">
								<div class="item">
									<img src="<?= base_url().'/'.$products[0]['image_path'] ?>" alt="">
								</div>
							</div>
							<div id="sync2" class="owl-carousel owl-theme">
								<div class="item">
									<img src="<?= base_url().'/'.$products[0]['image_path'] ?>" alt="">
								</div>
							</div>
						</div>
						<div class="col-lg-8 col-md-8">
							<div class="product-dt-right">
	    						<h2><?= $products[0]['name'] ?></h2>
								<div class="no-stock">
									<p class="pd-no">Product No.<span><?= $products[0]['pk_id'] ?></span></p>
									<p class="stock-qty">Available<span>(Instock)</span></p>
								</div>
								<div class="product-radio">
									<ul class="product-now">
										<li>
											<input type="radio" id="p1" name="product1">
											<label for="p1"><?= get_product_unit_by_product_id($products[0]['pk_id']) ?></label>
										</li>
									</ul>
								</div>
								<p class="pp-descp"><?= $products[0]['description'] ?></p>
								<div class="product-group-dt">
									<ul>
									<?php if ($products[0]['discount_amount'] != ""){ ?>
										<li><div class="main-price color-discount">Discount Price<span><?= $products[0]['discount_amount'] ?></span></div></li>
										<li><div class="main-price mrp-price">Price<span><?= $products[0]['unit_price'] ?></span></div></li>
									<?php } else {?>
										<li><div class="main-price color-discount">Price<span><?= $products[0]['unit_price'] ?></span></div></li>
									<?php } ?>
									</ul>
									<ul class="gty-wish-share">
										<li>
											<div class="qty-product">
												<div class="quantity buttons_added">
													<input type="button" id="minus" value="-" class="minus minus-btn">
													<input type="number" id="number" step="1" name="quantity" value="1" class="input-text qty text">
													<input type="button" id="plus" value="+" class="plus plus-btn">
												</div>
											</div>
										</li>
										<li><span class="like-icon save-icon" title="wishlist" onclick="addToWishList(<?= $products[0]['pk_id'] ?>)"></span></li>
									</ul>
									<ul class="ordr-crt-share">
										<li><button class="add-cart-btn hover-btn" onclick="addToCart(<?= $products[0]['pk_id'] ?>)"><i class="uil uil-shopping-cart-alt"></i>Add to Cart</button></li>
										<li><button class="order-btn hover-btn">Order Now</button></li>
									</ul>
								</div>
								<div class="pdp-details">
									<ul>
										<li>
											<div class="pdp-group-dt">
			    								<div class="pdp-icon"><i class="uil uil-usd-circle"></i></div>
				    							<div class="pdp-text-dt">
													<span>Lowest Price Guaranteed</span>
													<p>Get difference refunded if you find it cheaper anywhere else.</p>
												</div>
											</div>
										</li>
										<li>
											<div class="pdp-group-dt">
					    						<div class="pdp-icon"><i class="uil uil-cloud-redo"></i></div>
												<div class="pdp-text-dt">
													<span>Easy Returns & Refunds</span>
													<p>Return products at doorstep and get refund in seconds.</p>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4 col-md-12">
				<div class="pdpt-bg">
					<div class="pdpt-title">
						<h4>More Like This</h4>
					</div>
					<div class="pdpt-body scrollstyle_4">
                        <?php foreach($product_by_category as $key => $category){ ?>
						<div class="cart-item border_radius">
							<a href="<?= base_url().'/products/view/'.$category['pk_id']?>" class="cart-product-img">
								<img src="<?= base_url().'/'.$category['image_path']; ?>" alt="">
								<div class="offer-badge"><?= $category['discount_amount']?>4% OFF</div>
							</a>
							<div class="cart-text">
								<h4><?=$category['name']?></h4>
								<div class="cart-radio">
									<ul class="kggrm-now">
										<li>
											<input type="radio" id="k1" name="cart1">
											<label for="k1"><?= get_product_unit_by_product_id($category['pk_id']) ?></label>
										</li>
									</ul>
								</div>
								<div class="qty-group">
									<div class="quantity buttons_added">
										<input type="button" value="-" class="minus minus-btn">
										<input type="number" step="1" name="quantity" value="1" class="input-text qty text">
										<input type="button" value="+" class="plus plus-btn">
									</div>
									<div class="cart-item-price"><?= 'Rs '.$category['unit_price']?></div> <!--<span>$15</span></div>-->
								</div>
							</div>
						</div>
                        <?php }?>	
					</div>
				</div>
			</div>
			<div class="col-lg-8 col-md-12">
				<div class="pdpt-bg">
					<div class="pdpt-title">
						<h4>Product Details</h4>
					</div>
					<div class="pdpt-body scrollstyle_4">
						<div class="pdct-dts-1">
							<div class="pdct-dt-step">
								<h4>Description</h4>
								<p><?= $products[0]['description'] ?></p>
							</div>
							<!-- <div class="pdct-dt-step">
								<h4>Benefits</h4>
								<div class="product_attr">
									Aliquam nec nulla accumsan, accumsan nisl in, rhoncus sapien.<br>
									In mollis lorem a porta congue.<br>
									Sed quis neque sit amet nulla maximus dignissim id mollis urna.<br>
									Cras non libero at lorem laoreet finibus vel et turpis.<br>
									Mauris maximus ligula at sem lobortis congue.<br>
								</div>
							</div>
							<div class="pdct-dt-step">
								<h4>How to Use</h4>
								<div class="product_attr">
									The peeled, orange segments can be added to the daily fruit bowl, and its juice is a refreshing drink.
								</div>
							</div> -->
							<div class="pdct-dt-step">
								<h4>Seller</h4>
								<div class="product_attr">
									<?= get_business_name_by_product_id($products[0]['bussiness_id']) ?>
								</div>
							</div>
							<!-- <div class="pdct-dt-step">
								<h4>Disclaimer</h4>
								<p>Phasellus efficitur eu ligula consequat ornare. Nam et nisl eget magna aliquam consectetur. Aliquam quis tristique lacus. Donec eget nibh et quam maximus rutrum eget ut ipsum. Nam fringilla metus id dui sollicitudin, sit amet maximus sapien malesuada.</p>
							</div> -->
						</div>			
					</div>					
				</div>
			</div>
		</div>
	</div>
</div>