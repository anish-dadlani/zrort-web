<!DOCTYPE html>
<html lang="en">
	<?php echo view('/templates/products/header'); ?>
	<?php echo view('/templates/products/category_model'); ?>
	<?php echo view('/templates/products/search_model'); ?>
	<?php echo view('/templates/products/sidebar_nav'); ?>
	<?php echo view('/templates/products/header_nav'); ?>
    <div class="wrapper">
		<?php echo view ($fileToLoad, $data); ?> 
	<?php echo view('/templates/products/footer'); ?>
	<?php echo view ('/templates/products/script'); ?>
	<?php echo view('/templates/javascript'); ?>
</html>