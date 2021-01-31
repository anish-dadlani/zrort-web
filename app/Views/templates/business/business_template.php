<!DOCTYPE html>
<html lang="en">
<?php echo view('/templates/business/header'); ?>
    <body class="sb-nav-fixed">
		<?php echo view('/templates/business/left_nav'); ?>
        <div id="layoutSidenav">
			 <?php echo view('/templates/business/sidebar_nav'); ?>
            <div id="layoutSidenav_content">
				<?php echo view ($fileToLoad,$data); ?> 
				<?php echo view('/templates/business/footer'); ?>
            </div>
        </div>
		<?php echo view ('/templates/business/script'); ?>
		<?php echo view('/templates/javascript'); ?>
		<!-- Javascripts -->
	
	</body>
</html>