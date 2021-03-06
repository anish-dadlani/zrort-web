<!-- Category Model Start-->
<div id="category_model" class="header-cate-model main-gambo-model modal fade" tabindex="-1" role="dialog" aria-modal="false">
    <div class="modal-dialog category-area" role="document">
        <div class="category-area-inner">
            <div class="modal-header">
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
				<i class="uil uil-multiply"></i>
                </button>
            </div>
            <div class="category-model-content modal-content"> 
				<div class="cate-header">
					<h4>Select Category</h4>
				</div>
                <ul class="category-by-cat">
				<?php foreach($_SESSION['categories'] as $key => $category){?>
					<li>
						<a href="#" class="single-cat-item">
							<div class="icon">
								<img src="<?php echo base_url().'/'.$category['image_path']; ?>" alt="">
							</div>
							<div class="text"> <?php echo $category['name']; ?> </div>
						</a>
					</li>
					<?php }?>
                </ul>
				<a href="#" class="morecate-btn"><i class="uil uil-apps"></i>More Categories</a>
            </div>
        </div>
    </div>
</div>
	<!-- Category Model End-->	
		<!-- Search Model Start-->
		<div id="search_model" class="header-cate-model main-gambo-model modal fade" tabindex="-1" role="dialog" aria-modal="false">
        <div class="modal-dialog search-ground-area" role="document">
            <div class="category-area-inner">
                <div class="modal-header">
                    <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
						<i class="uil uil-multiply"></i>
                    </button>
                </div>
                <div class="category-model-content modal-content"> 
					<div class="search-header">
						<form action="#">
							<input type="search" placeholder="Search for products...">
							<button type="submit"><i class="uil uil-search"></i></button>
						</form>
					</div>
					<div class="search-by-cat">
                        <a href="#" class="single-cat">
                            <div class="icon">
								<img src="images/category/icon-1.svg" alt="">
                            </div>
                            <div class="text">
                                Fruits and Vegetables
                            </div>
                        </a>
						<a href="#" class="single-cat">
							<div class="icon">
								<img src="images/category/icon-2.svg" alt="">
							</div>
							<div class="text"> Grocery & Staples </div>
						</a>
						<a href="#" class="single-cat">
							<div class="icon">
								<img src="images/category/icon-3.svg" alt="">
							</div>
							<div class="text"> Dairy & Eggs </div>
						</a>
						<a href="#" class="single-cat">
							<div class="icon">
								<img src="images/category/icon-4.svg" alt="">
							</div>
							<div class="text"> Beverages </div>
						</a>
						<a href="#" class="single-cat">
							<div class="icon">
								<img src="images/category/icon-5.svg" alt="">
							</div>
							<div class="text"> Snacks </div>
						</a>
						<a href="#" class="single-cat">
							<div class="icon">
								<img src="images/category/icon-6.svg" alt="">
							</div>
							<div class="text"> Home Care </div>
						</a>
						<a href="#" class="single-cat">
							<div class="icon">
								<img src="images/category/icon-7.svg" alt="">
							</div>
							<div class="text"> Noodles & Sauces </div>
						</a>
						<a href="#" class="single-cat">
							<div class="icon">
								<img src="images/category/icon-8.svg" alt="">
							</div>
							<div class="text"> Personal Care </div>
						</a>
						<a href="#" class="single-cat">
							<div class="icon">
								<img src="images/category/icon-9.svg" alt="">
							</div>
							<div class="text"> Pet Care </div>
						</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- Search Model End-->
	<!-- Header Start -->
	<header class="header clearfix">
		<div class="top-header-group">
			<div class="top-header"> 
				<div class="res_main_logo">
					<a href="<?php echo base_url('customer/dashboard'); ?>"><img src="<?php echo base_url(); ?>/assets/customers/images/dark-logo-1.svg" alt=""></a>
				</div>
				<div class="main_logo" id="logo">
					<a href="<?php echo base_url('customer/dashboard'); ?>"><img src="<?php echo base_url(); ?>/assets/customers/images/logo.svg" alt=""></a>
					<a href="<?php echo base_url('customer/dashboard'); ?>"><img class="logo-inverse" src="<?php echo base_url(); ?>/assets/customers/images/dark-logo.svg" alt=""></a>
				</div>
				<div class="select_location">
					<div class="ui inline dropdown loc-title">
						<div class="text">
						  <i class="uil uil-location-point"></i>
						  Gurugram
						</div>
						<i class="uil uil-angle-down icon__14"></i>
						<div class="menu dropdown_loc">
							<div class="item channel_item">
								<i class="uil uil-location-point"></i>
								Gurugram
							</div>
							<div class="item channel_item">
								<i class="uil uil-location-point"></i>
								New Delhi
							</div>
						</div>
					</div>
				</div>
				<div class="search120">
					<div class="ui search">
					  <div class="ui left icon input swdh10">
						<input class="prompt srch10" type="text" placeholder="Search for products..">
						<i class='uil uil-search-alt icon icon1'></i>
					  </div>
					</div>
				</div>
				<div class="header_right">
					<ul>
						<li>
							<a href="#" class="offer-link"><i class="uil uil-phone-alt"></i>1800-000-000</a>
						</li>
						<li>
							<a href="offers.html" class="offer-link"><i class="uil uil-gift"></i>Offers</a>
						</li>
						<li>
							<a href="faq.html" class="offer-link"><i class="uil uil-question-circle"></i>Help</a>
						</li>
						<li>
							<a href="dashboard_my_wishlist.html" class="option_links" title="Wishlist"><i class='uil uil-heart icon_wishlist'></i><span class="noti_count1">3</span></a>
						</li>	
						<li class="ui dropdown">
							<a href="#" class="opts_account">
								<img src="images/avatar/img-5.jpg" alt="">
								<span class="user__name"><?php echo $_SESSION['username']; ?></span>
								<i class="uil uil-angle-down"></i>
							</a>
							<div class="menu dropdown_account">
								<div class="night_mode_switch__btn">
									<a href="#" id="night-mode" class="btn-night-mode">
										<i class="uil uil-moon"></i> Night mode
										<span class="btn-night-mode-switch">
											<span class="uk-switch-button"></span>
										</span>
									</a>
								</div>	
								<a href="<?php echo base_url('customer/dashboard'); ?>" class="item channel_item"><i class="uil uil-apps icon__1"></i>Dashbaord</a>								
								<a href="#" class="item channel_item"><i class="uil uil-box icon__1"></i>My Orders</a>
								<a href="#" class="item channel_item"><i class="uil uil-heart icon__1"></i>My Wishlist</a>
								<a href="#" class="item channel_item"><i class="uil uil-usd-circle icon__1"></i>My Wallet</a>
								<a href="#" class="item channel_item"><i class="uil uil-location-point icon__1"></i>My Address</a>
								<a href="#" class="item channel_item"><i class="uil uil-gift icon__1"></i>Offers</a>
								<a href="#" class="item channel_item"><i class="uil uil-info-circle icon__1"></i>Faq</a>
								<a href="<?php echo base_url('customer/logout'); ?>" class="item channel_item"><i class="uil uil-lock-alt icon__1"></i>Logout</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="sub-header-group">
			<div class="sub-header">
				<div class="ui dropdown">
					<a href="#" class="category_drop hover-btn" data-toggle="modal" data-target="#category_model" title="Categories"><i class="uil uil-apps"></i><span class="cate__icon">Select Category</span></a>
				</div>
				<nav class="navbar navbar-expand-lg navbar-light py-3">
					<div class="container-fluid">
						<button class="navbar-toggler menu_toggle_btn" type="button" data-target="#navbarSupportedContent"><i class="uil uil-bars"></i></button>
						<div class="collapse navbar-collapse d-flex flex-column flex-lg-row flex-xl-row justify-content-lg-end bg-dark1 p-3 p-lg-0 mt1-5 mt-lg-0 mobileMenu" id="navbarSupportedContent">
							<ul class="navbar-nav main_nav align-self-stretch">
								<li class="nav-item"><a href="<?php echo base_url('customer/dashboard'); ?>" class="nav-link active" title="Home">Home</a></li>
								<li class="nav-item"><a href="shop_grid.html" class="nav-link new_item" title="New Products">New Products</a></li>
								<li class="nav-item"><a href="shop_grid.html" class="nav-link" title="Featured Products">Featured Products</a></li>
								<li class="nav-item">
									<div class="ui icon top left dropdown nav__menu">
										<a class="nav-link" title="Pages">Pages <i class="uil uil-angle-down"></i></a>
										<div class="menu dropdown_page">
											<a href="dashboard_overview.html" class="item channel_item page__links">Account</a>
											<a href="about_us.html" class="item channel_item page__links">About Us</a>
											<a href="shop_grid.html" class="item channel_item page__links">Shop Grid</a>
											<a href="single_product_view.html" class="item channel_item page__links">Single Product View</a>
											<a href="checkout.html" class="item channel_item page__links">Checkout</a>
											<a href="request_product.html" class="item channel_item page__links">Product Request</a>										
											<a href="order_placed.html" class="item channel_item page__links">Order Placed</a>										
											<a href="bill.html" class="item channel_item page__links">Bill Slip</a>										
											<a href="sign_in.html" class="item channel_item page__links">Sign In</a>
											<a href="sign_up.html" class="item channel_item page__links">Sign Up</a>
											<a href="forgot_password.html" class="item channel_item page__links">Forgot Password</a>
											<a href="contact_us.html" class="item channel_item page__links">Contact Us</a>
										</div>
									</div>
								</li>
								<li class="nav-item">
									<div class="ui icon top left dropdown nav__menu">
										<a class="nav-link" title="Blog">Blog <i class="uil uil-angle-down"></i></a>
										<div class="menu dropdown_page">
											<a href="our_blog.html" class="item channel_item page__links">Our Blog</a>
											<a href="blog_no_sidebar.html" class="item channel_item page__links">Our Blog Two No Sidebar</a>
											<a href="blog_left_sidebar.html" class="item channel_item page__links">Our Blog with Left Sidebar</a>
											<a href="blog_right_sidebar.html" class="item channel_item page__links">Our Blog with Right Sidebar</a>
											<a href="blog_detail_view.html" class="item channel_item page__links">Blog Detail View</a>
											<a href="blog_left_sidebar_single_view.html" class="item channel_item page__links">Blog Detail View with Sidebar</a>
										</div>
									</div>
								</li>	
								<li class="nav-item"><a href="contact_us.html" class="nav-link" title="Contact">Contact Us</a></li>
							</ul>
						</div>
					</div>
				</nav>
				<div class="catey__icon">
					<a href="#" class="cate__btn" data-toggle="modal" data-target="#category_model" title="Categories"><i class="uil uil-apps"></i></a>
				</div>
				<div class="header_cart order-1">
					<a href="#" class="cart__btn hover-btn pull-bs-canvas-left" title="Cart"><i class="uil uil-shopping-cart-alt"></i><span>Cart</span><ins>2</ins><i class="uil uil-angle-down"></i></a>
				</div>
				<div class="search__icon order-1">
					<a href="#" class="search__btn hover-btn" data-toggle="modal" data-target="#search_model" title="Search"><i class="uil uil-search"></i></a>
				</div>
			</div>
		</div>
	</header>
	<!-- Header End -->