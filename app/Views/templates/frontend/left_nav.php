<nav class="sb-topnav navbar navbar-expand navbar-light bg-clr">
            <a class="navbar-brand logo-brand" href="<?php echo base_url(); ?>/Orders">Zrort - Admin</a>
			<button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <a href="<?php echo base_url(); ?>/Orders" class="frnt-link"><i class="fas fa-external-link-alt"></i>Home</a>
            <ul class="navbar-nav ml-auto mr-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item admin-dropdown-item" href="<?php echo base_url(); ?>/ZrortProfile-Add">Edit Profile</a>
						<a class="dropdown-item admin-dropdown-item" href="<?php echo base_url(); ?>/ZrortChange-Password">Change Password</a>
						<a class="dropdown-item admin-dropdown-item" href="<?php echo base_url(); ?>/logout">Log out<div class="ripple-container"></div></a>
                    </div>
                </li>
            </ul>
        </nav>