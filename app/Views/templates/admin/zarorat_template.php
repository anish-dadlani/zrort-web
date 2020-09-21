<!DOCTYPE html>
<html lang="en">
<?php echo view('/templates/admin/header'); ?>
    <body class="sb-nav-fixed">
		<?php echo view('/templates/admin/left_nav'); ?>
        <div id="layoutSidenav">
			 <?php echo view('/templates/admin/sidebar_nav'); ?>
            <div id="layoutSidenav_content">
				<?php echo view ($fileToLoad,$data); ?> 
				<?php echo view('/templates/admin/footer'); ?>
            </div>
        </div>
		<?php echo view ('/templates/admin/script'); ?>
		<!-- Javascripts -->
	
	</body>
</html>