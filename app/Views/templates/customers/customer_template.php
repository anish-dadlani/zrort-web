<!DOCTYPE html>
<html lang="en">
	<?php echo view('/templates/customers/header'); ?>
	<?php echo view('/templates/customers/category_model'); ?>
	<?php echo view('/templates/customers/search_model'); ?>
	<?php echo view('/templates/customers/sidebar_nav'); ?>
	<?php echo view('/templates/customers/header_nav'); ?>
	<!-- <div class="tab-content">
		<div class="tab-pane container-fluid active p-0" id="mapdiv">
			<?php echo view ($fileToLoad, $data); ?> 
		</div>
		<div class="tab-pane container-fluid fade p-0" id="businessdiv">
			<?php //echo view('/templates/customers/offers'); ?>
		</div>
	</div> -->
	<?php //echo view('/templates/customers/categories'); ?>
	<?php //echo view('/templates/customers/featured_products'); ?>
	<?php //echo view('/templates/customers/best_value_offers'); ?>
	<?php //echo view('/templates/customers/new_products'); ?>
	<?php echo view('/templates/customers/footer'); ?>
	<?php echo view ('/templates/customers/script'); ?>
	<?php echo view('/templates/javascript'); ?>
</html>