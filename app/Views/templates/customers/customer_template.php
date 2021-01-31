<!DOCTYPE html>
<html lang="en">
	<?php echo view('/templates/customers/header'); ?>
	<?php echo view('/templates/customers/category_model'); ?>
	<?php echo view('/templates/customers/search_model'); ?>
	<?php echo view('/templates/customers/sidebar_nav'); ?>
	<?php echo view('/templates/customers/header_nav'); ?>
	<?php echo view('/templates/customers/offers'); ?>
		<?php echo view ($fileToLoad, $data); ?> 
	<?php //echo view('/templates/customers/categories'); ?>
	<?php //echo view('/templates/customers/featured_products'); ?>
	<?php //echo view('/templates/customers/best_value_offers'); ?>
	<?php //echo view('/templates/customers/new_products'); ?>
	<?php echo view('/templates/customers/footer'); ?>
	<?php echo view ('/templates/customers/script'); ?>
	<?php echo view('/templates/javascript'); ?>
</html>