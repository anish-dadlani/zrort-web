
<!DOCTYPE html>
<html lang="en">
<!-- Page head -->
    <?php
		$this -> load -> view('template/style');
	?>
<!-- /Page head -->
    <body>
        
        <!-- Page Container -->
        <div class="page-container">
            <!-- Page Sidebar -->
            <?php $this -> load -> view('template/sideMeanu'); ?>
			<!-- /Page Sidebar -->
				<!-- Page Header -->
				<div class="page-content">
                <div class="page-header">
                    <div class="search-form">
                        <form action="#" method="GET">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control search-input" placeholder="Type something...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" id="close-search" type="button"><i class="icon-close"></i></button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <div class="logo-sm">
                                    <a href="javascript:void(0)" id="sidebar-toggle-button"><i class="fa fa-bars"></i></a>
                                    <a class="logo-box" href="index.html"><span>Zarorat</span></a>
                                </div>
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <i class="fa fa-angle-down"></i>
                                </button>
                            </div>
                        
                            <!-- Collect the nav links, forms, and other content for toggling -->
                        
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    <li class="collapsed-sidebar-toggle-inv"><a href="javascript:void(0)" id="collapsed-sidebar-toggle-button"><i class="fa fa-bars"></i></a></li>
                                    <li><a href="javascript:void(0)" id="toggle-fullscreen"><i class="fa fa-expand"></i></a></li>
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
									<li><a class="right-sidebar-toggle" data-sidebar-id="main-right-sidebar"><i><?php echo $this->session->userName ?></i></a></li>
                                    <li><a href="javascript:void(0)" class="right-sidebar-toggle" data-sidebar-id="main-right-sidebar"><i class="fa fa-envelope"></i></a></li>
									<li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url();?>assets/thumbnail/user.png" alt="" class="img-circle"></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?php echo base_url(); ?>zaroratSetup/user_profile">Profile</a></li>
                                            <li><a href="<?php echo base_url(); ?>zaroratSetup/changepassword">Password Reset</a></li>
                                            <!-- <li><a href="#"><span class="badge pull-right badge-info">64</span>Messages</a></li> -->
                                            <li role="separator" class="divider"></li>
                                            <li><a href="#">Account Settings</a></li>
                                            <li><a href="<?php echo base_url(); ?>zaroratLogin/logout">Log Out</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div><!-- /.navbar-collapse -->
                        </div><!-- /.container-fluid -->
                    </nav>
                </div><!-- /Page Header -->
				<div class="page-inner  no-page-title product-form-inner" style="">
				<?php $this->load->view($fileToLoad,$data); ?>
				<?php  $this->load->view('template/footer'); ?>
                </div>
				</div>
				  <!--<div class="page-footer text-center">
                    <p>Copyright <i class="fa fa-copyright" aria-hidden="true"></i> 2018 Zarorat. All rights reserved. </p>
                </div>-->
				 
			</div><!-- /Page Content -->
        <!-- Javascripts -->
		
       <?php  $this->load->view('template/script'); ?>
    </body>
</html>