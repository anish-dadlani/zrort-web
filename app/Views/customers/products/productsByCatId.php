<?php //print_r($products);?>
<?php //print_r($products); exit;?>
<div class="gambo-Breadcrumb">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?= base_url('customer/dashboard')?>">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">
                        <?php echo get_product_categories_name($cat_id); ?>
                        </li>
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
				<div class="product-top-dt">
					<div class="product-left-title">
						<h2><?php echo get_product_categories_name($cat_id); ?></h2>
					</div>
					<a href="#" class="filter-btn pull-bs-canvas-right">Filters</a>
					<div class="product-sort">
						<div class="ui selection dropdown vchrt-dropdown">
							<input name="gender" type="hidden" value="default">
								<i class="dropdown icon d-icon"></i>
								<div class="text">Popularity</div>
									<div class="menu">
										<div class="item" value="" data-value="0">Popularity</div>
										<div class="item" value="" data-value="1">Price - Low to High</div>
										<div class="item" value="" data-value="2">Price - High to Low</div>
										<div class="item" value="" data-value="3">Alphabetical</div>
										<div class="item" value="" data-value="4">Saving - High to Low</div>
										<div class="item" value="" data-value="5">Saving - Low to High</div>
										<div class="item" value="" data-value="6">% Off - High to Low</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="product-list-view">
					<div class="row">
                    <?php foreach($products as $key => $item){ ?>
						<div class="col-lg-3 col-md-6">
                           
							<div class="product-item mb-30">
								<a href="<?= base_url().'/products/view/'.$item['pk_id']?>" class="product-img">
									<img src="<?php echo base_url().'/'.$item['image_path']; ?>" alt="">
									<div class="product-absolute-options">
										<?php if($item['discount_percent'] == ""){ ?>
											<!-- <span class="offer-badge-1"> <?php //echo "0 % Off"; ?> </span> -->
										<?php } else{ ?>
										<span class="offer-badge-1"> <?= $item['discount_percent'] .'% Off';} ?></span>
										<span class="like-icon" title="wishlist" onclick="addToWishList(<?= $item['pk_id'] ?>)"></span>
									</div>
								</a>
								<div class="product-text-dt">
									<p>Available<span>(In Stock)</span></p>
									<h4><?= $item['name'] ?></h4>
									<div class="product-price"><?= 'Rs '.$item['unit_price']?></div> <!--<span>$15</span></div>-->
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
                        <?php }?>
						<!-- <div class="col-md-12">
							<div class="more-product-btn">
								<button class="show-more-btn hover-btn" onclick="window.location.href = '#';">Show More</button>
							</div>
						</div> -->
					</div>
				</div>
			</div>
		</div>