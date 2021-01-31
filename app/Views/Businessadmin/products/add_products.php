<style>
.cancel-cst-btn{    
	background: #f55d2c;
    border: 0;
    color: #fff;
    font-size: 14px;
    font-weight: 500;
    height: 40px !Important;
    padding: 12px 20px !Important;
    border-radius: 3px;
    margin-top: 20px;
}
.cancel-cst-btn:hover{
	text-decoration: none !important;
    background: #f55d2c;
    color: #fff !important;
    transition: all .2s ease-in-out;
    -webkit-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    -ms-transition: all 0.2s ease-in-out;
    -webkit-transition: all 0.2s ease-in-out;
    background-image: -webkit-linear-gradient(left, rgba(230, 92, 91, 0.9), rgba(245, 93, 44, 0.9));
    background-image: linear-gradient(to right, rgba(230, 92, 91, 0.9), rgba(245, 93, 44, 0.9));
}
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
		<main>
			<div class="container-fluid">
				<h2 class="mt-30 page-title">Products</h2>
				<ol class="breadcrumb mb-30">
					<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/Products">Products</a></li>
					<li class="breadcrumb-item active">Add Product</li>
				</ol>
				<div class="row">
					<div class="col-lg-12">
					<?php $validation = \Config\Services::validation(); ?>
						<form id="form"  class="cool-b4-form mt-5" action="<?php echo base_url();?>/Businessadmin/Products/products_save" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onSubmit="">
							<div class="card card-static-2 mb-30">
								<div class="card-title-2">
									<h4>Add New Product</h4>
								</div>
								<div class="card-body-table">
									<div class="news-content-right pd-20">
										<div class="form-group">
											<label class="form-label">Name*</label>
											<input type="text" class="form-control" placeholder="Product Name" name="name" value="<?= old('name') ?>" required>
										<?php if($validation->getError('name')) {?>
											<div class='alert alert-danger mt-2'>
											  <?= $error = $validation->getError('name'); ?>
											</div>
										<?php }?>
										</div>
										<div class="form-group">
												<label class="form-label">Short Name*</label>
												<input type="text" class="form-control" placeholder="Short Name" name="shortname" value="<?= old('shortname') ?>" required>
										<?php if($validation->getError('shortname')) {?>
											<div class='alert alert-danger mt-2'>
											  <?= $error = $validation->getError('shortname'); ?>
											</div>
										<?php }?>
										</div>
										<div class="form-group">
												<label class="form-label">Description*</label>
												<div class="card card-editor">
													<div class="content-editor">
														<textarea class="text-control" placeholder="Enter Description" name="description" value="<?= old('description') ?>" required></textarea>
													</div>
												</div>
										<?php if($validation->getError('description')) {?>
											<div class='alert alert-danger mt-2'>
											  <?= $error = $validation->getError('description'); ?>
											</div>
										<?php }?>		
										</div>
										<div class="form-group">
											<label class="form-label">Quantity*</label>
											<input type="text" class="form-control numberclass" placeholder="Quantity" name="unit_quantity" value="<?= old('unit_quantity') ?>" required>
										<?php if($validation->getError('unit_quantity')) {?>
											<div class='alert alert-danger mt-2'>
											  <?= $error = $validation->getError('unit_quantity'); ?>
											</div>
										<?php }?>	
										</div>
										<div class="form-group">
											<label class="form-label">Product Type*</label>
											<input type="text" class="form-control" placeholder="Product Type" name="product_type" value="<?= old('product_type') ?>" required>
										<?php if($validation->getError('product_type')) {?>
											<div class='alert alert-danger mt-2'>
											  <?= $error = $validation->getError('product_type'); ?>
											</div>
										<?php }?>
										</div>
										<div class="form-group">
											<label class="form-label">Sale*</label>
											<input type="text" class="form-control numberclass" placeholder="Sale" name="on_sale" value="<?= old('on_sale') ?>" required>
										<?php if($validation->getError('on_sale')) {?>
											<div class='alert alert-danger mt-2'>
											  <?= $error = $validation->getError('on_sale'); ?>
											</div>
										<?php }?>
										</div>
										<div class="form-group">
											<label class="form-label">Discount MRP*</label>
											<input type="text" class="form-control" placeholder="PKR0" name="discount_type" value="<?= old('discount_type') ?>" required>
										<?php if($validation->getError('discount_type')) {?>
											<div class='alert alert-danger mt-2'>
											  <?= $error = $validation->getError('discount_type'); ?>
											</div>
										<?php }?>
										</div>
										<div class="form-group">
											<label class="form-label">Discount Amount*</label>
											<input type="text" class="form-control numberclass" placeholder="PKR0" name="discount_amount" value="<?= old('discount_amount') ?>" required>
										<?php if($validation->getError('discount_amount')) {?>
											<div class='alert alert-danger mt-2'>
											  <?= $error = $validation->getError('discount_amount'); ?>
											</div>
										<?php }?>
										</div>
										<div class="form-group">
											<label class="form-label">Discount Percent*</label>
											<input type="text" class="form-control numberclass" placeholder="Percent" name="discount_percent" value="<?= old('discount_percent') ?>" required>
										<?php if($validation->getError('discount_percent')) {?>
											<div class='alert alert-danger mt-2'>
											  <?= $error = $validation->getError('discount_percent'); ?>
											</div>
										<?php }?>
										</div>
										<div class="form-group">
											<label class="form-label">Unit Price*</label>
											<input type="text" class="form-control numberclass" placeholder="PKR0" name="unit_price" value="<?= old('unit_price') ?>" required>
										<?php if($validation->getError('unit_price')) {?>
											<div class='alert alert-danger mt-2'>
											  <?= $error = $validation->getError('unit_price'); ?>
											</div>
										<?php }?>
										</div>
										<div class="form-group">
											<label class="form-label">Status*</label>
											<select id="status" name="is_active" class="form-control">
												<option selected value="1">Active</option>
												<option value="0">Inactive</option>
											</select>
										</div>
										<div class="form-group">
											<label class="form-label">Favorities</label>
											<input name="favorities" type="hidden" value="0">
												<label class="switch">
												  <input name="favorities" type="checkbox" value="1" checked>
												  <span class="slider round"></span>
												</label>
										</div>	
										<div class="form-group">
											<label class="form-label">Order Number*</label>
											<input type="text" class="form-control numberclass" placeholder="Order Number" name="list_order_numb" value="<?= old('list_order_numb') ?>" required>
										<?php if($validation->getError('list_order_numb')) {?>
											<div class='alert alert-danger mt-2'>
											  <?= $error = $validation->getError('list_order_numb'); ?>
											</div>
										<?php }?>
										</div>
										<div class="form-group">
											<label class="form-label">Tag Name*</label>
											<input type="text" class="form-control" placeholder="Tag Name" name="tags" value="<?= old('tags') ?>" required>
										<?php if($validation->getError('tags')) {?>
											<div class='alert alert-danger mt-2'>
											  <?= $error = $validation->getError('tags'); ?>
											</div>
										<?php }?>
										</div>
										<div class="form-group">
											<label class="form-label">Is Feature*</label>
											<select id="is_featured" name="is_featured" class="form-control">
												<option selected value="1">Yes</option>
												<option value="0">No</option>
											</select>
										</div>
										<div class="form-group">
											<label class="form-label">Product*</label>
											<input type="text" class="form-control" placeholder="Enter Product" name="product_sku" value="<?= old('product_sku') ?>" required>
										<?php if($validation->getError('product_sku')) {?>
											<div class='alert alert-danger mt-2'>
											  <?= $error = $validation->getError('product_sku'); ?>
											</div>
										<?php }?>
										</div>
										<div class="form-group">
											<label class="form-label">Product Category*</label>
											<select id="status" name="product_category_id" class="form-control" required>
												<option value="" >--Select Category--</option>
												<?php foreach($get_categories as $row){
													echo '<option value="'.$row['pk_id'].'">'.$row['name'].'</option>';
												}?>
											</select>
										</div>
										<div class="form-group">
											<label class="form-label">Product Unit*</label>
											<select id="status" name="product_unit_id" class="form-control" required>
												<option value="" >--Select Product Unit--</option>
												<?php foreach($get_productsunits as $row){
													echo '<option value="'.$row['pk_id'].'">'.$row['unit_title'].'</option>';
												}?>
											</select>
										</div>
										<div class="form-group">
											<label class="form-label">Business Type*</label>
											<select id="status" name="bussiness_id" class="form-control" required>
												<option value="" >--Select Business Type--</option>
												<?php foreach($business as $row) {
													echo '<option value="'.$row['pk_id'].'">'.$row['name'].'</option>';
												} ?>
											</select>
										</div>
										<div class="form-group">
											<label class="form-label">Product Image*</label>
											<div class="input-group">
												<div class="custom-file">
													<input type="file" class="form-control" name="file_image" accept="image/*">
												</div>
											</div>
											<?php if($validation->getError('file_image')) {?>
											<div class='alert alert-danger mt-2'>
											  <?= $error = $validation->getError('file_image'); ?>
											</div>
										<?php }?>
										</div>
										<!--<div class="dropzone" name="file" id="myDropzone"></div>-->
										
										<!--<div><form id="dropzone" name="file" id="myDropzone" action="/" class="dropzone" method="post" enctype="multipart/form-data"></form></div>-->
										
										<button class="save-btn hover-btn" id="submit-all" type="submit">Add New Product</button>
										<a  href="<?php echo base_url(); ?>/Products" class="cancel-cst-btn">Cancel</a>
									</div> 
								</div>
							</div>
						</form>	
					</div>
				</div>
			</div>
        </main>
	
<script type="text/javascript">
	Dropzone.autoDiscover = false;
	/* $(function() {
		var async = function (func) {
		  return function () {
			var args = arguments;
			setTimeout(function () {
			  func.apply(this, args);
			}, 0);
		  };
		}; */
    //Dropzone class
    var myDropzone = new Dropzone(".dropzone", {
		url: '<?php echo base_url("/Businessadmin/Products/products_save"); ?>',
		paramName: "file",
		maxFilesize: 2,
		maxFiles: 10,
		acceptedFiles: "image/*,application/pdf",
		addRemoveLinks: true,
		autoProcessQueue: true,
		init: function() {
			this.on('sending', function(file, xhr, formData) {
				// Append all form inputs to the formData Dropzone will POST
				var data = $('#form').serializeArray();
				$.each(data, function(key, el) {
					formData.append(el.name, el.value);
				});
			});
		},
		  success: function(file, response)
            {
                //window.location="";
            }
		
	});
	  
	$('#submit-all').click(function(){
		myDropzone.processQueue();
	});
	 
	
//});	

	</script>