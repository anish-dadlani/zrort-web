<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="<?php echo base_url(); ?>">
								<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
							</a>
							<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategories" aria-expanded="false" aria-controls="collapseCategories">
								<div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                                Categories
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
							</a>
                            <div class="collapse" id="collapseCategories" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
									<a class="nav-link sub_nav_link" href="<?php echo base_url(); ?>/categories">All Categories</a>
									<a class="nav-link sub_nav_link" href="<?php echo base_url(); ?>/categories_add">Add Category</a>
								</nav>
                            </div>
							<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseShops" aria-expanded="false" aria-controls="collapseShops">
								<div class="sb-nav-link-icon"><i class="fas fa-store"></i></div>
                                Business
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
							</a>
                            <div class="collapse" id="collapseShops" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
									<a class="nav-link sub_nav_link" href="<?php echo base_url(); ?>/business">All Business</a>
									<a class="nav-link sub_nav_link" href="<?php echo base_url(); ?>/business_add">Add Business</a>
								</nav>
                            </div>
							<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLocations" aria-expanded="false" aria-controls="collapseLocations">
								<div class="sb-nav-link-icon"><i class="fas fa-map-marker-alt"></i></div>
                                Business Categories 
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
							</a>
                            <div class="collapse" id="collapseLocations" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
									<a class="nav-link sub_nav_link" href="<?php echo base_url(); ?>/businesscategories">All Business Categories</a>
									<a class="nav-link sub_nav_link" href="<?php echo base_url(); ?>/businesscategories_add">Add Business Categories</a>
								</nav>
                            </div>	
							<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProducts" aria-expanded="false" aria-controls="collapseProducts">
								<div class="sb-nav-link-icon"><i class="fas fa-box"></i></div>
                                Products
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
							</a>
                            <div class="collapse" id="collapseProducts" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
									<a class="nav-link sub_nav_link" href="<?php echo base_url(); ?>/products">All Products</a>
									<a class="nav-link sub_nav_link" href="<?php echo base_url(); ?>/products_add">Add Product</a>
								</nav>
                            </div>
							<a class="nav-link active collapsed" href="#" data-toggle="collapse" data-target="#collapseAreas" aria-expanded="false" aria-controls="collapseAreas">
								<div class="sb-nav-link-icon"><i class="fas fa-map-marked-alt"></i></div>
                                 Products Units
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
							</a>
                            <div class="collapse" id="collapseAreas" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
									<a class="nav-link sub_nav_link" href="<?php echo base_url(); ?>/productsunits">All Products Units</a>
									<a class="nav-link sub_nav_link active" href="<?php echo base_url(); ?>/productsunits_add">Add Product Units</a>
								</nav>
                            </div>
							<a class="nav-link" href="<?php echo base_url(); ?>/orders">
								<div class="sb-nav-link-icon"><i class="fas fa-cart-arrow-down"></i></div>
                                Orders
							</a>
                        </div>
                    </div>
                </nav>
            </div>