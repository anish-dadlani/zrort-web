<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="<?php echo base_url(); ?>">
								<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
							</a>
							<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLocations" aria-expanded="false" aria-controls="collapseLocations">
								<div class="sb-nav-link-icon"><i class="fas fa-map-marker-alt"></i></div>
                                Business Categories 
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
							</a>
                            <div class="collapse" id="collapseLocations" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
									<a class="nav-link sub_nav_link" href="<?php echo base_url(); ?>/Business-Categories">All Business Categories</a>
									<a class="nav-link sub_nav_link" href="<?php echo base_url(); ?>/Business-Categories-Add">Add Business Categories</a>
								</nav>
                            </div>	
							<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseShops" aria-expanded="false" aria-controls="collapseShops">
								<div class="sb-nav-link-icon"><i class="fas fa-store"></i></div>
                                Business
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
							</a>
                            <div class="collapse" id="collapseShops" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
									<a class="nav-link sub_nav_link" href="<?php echo base_url(); ?>/Business">All Business</a>
									<a class="nav-link sub_nav_link" href="<?php echo base_url(); ?>/Business-Add">Add Business</a>
								</nav>
                            </div>
							<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAreas" aria-expanded="false" aria-controls="collapseAreas">
								<div class="sb-nav-link-icon"><i class="fas fa-map-marked-alt"></i></div>
                                 Products Units
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
							</a>
                            <div class="collapse" id="collapseAreas" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
									<a class="nav-link sub_nav_link" href="<?php echo base_url(); ?>/Productsunits">All Products Units</a>
									<a class="nav-link sub_nav_link" href="<?php echo base_url(); ?>/Productsunits-Add">Add Product Units</a>
								</nav>
                            </div>
							<a class="nav-link" href="<?php echo base_url(); ?>/Orders">
								<div class="sb-nav-link-icon"><i class="fas fa-cart-arrow-down"></i></div>
                                Orders
							</a>
                        </div>
                    </div>
                </nav>
            </div>