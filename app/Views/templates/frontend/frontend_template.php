<!DOCTYPE html>
<html lang="en">
<?php echo view('/templates/frontend/header'); ?>
    <body class="sb-nav-fixed">
		
        <div class="col-lg-12">
			<?php echo view ($fileToLoad,$data); ?> 
			<?php echo view('/templates/frontend/footer'); ?>
        </div>
		<?php echo view ('/templates/frontend/script'); ?>
		<!-- Javascripts -->
	
	</body>
</html>