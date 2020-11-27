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
					<li class="breadcrumb-item active">Edit Product</li>
				</ol>
				<div class="row">
					<div class="col-lg-12">
						<form class="cool-b4-form mt-5" action="<?php echo base_url();?>/Businessadmin/Products/update_products" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onSubmit="">
							<div class="card card-static-2 mb-30">
								<div class="card-title-2">
									<h4>Edit Product</h4>
								</div>
								<div class="card-body-table">
									<div class="news-content-right pd-20">
									<input type="hidden" name="pk_id" value="<?php echo  $products_edit[0]['pk_id']; ?>"  />
										<div class="form-group">
											<label class="form-label">Name*</label>
											<input type="text" class="form-control" placeholder="Product Name" name="name" value="<?php echo  $products_edit[0]['name']; ?>"  required>
										</div>
										<div class="form-group">
												<label class="form-label">Short Name*</label>
												<input type="text" class="form-control" placeholder="Short Name" name="shortname" value="<?php echo  $products_edit[0]['shortname']; ?>" required>
										</div>
										<div class="form-group">
												<label class="form-label">Description*</label>
												<div class="card card-editor">
													<div class="content-editor">
														<textarea class="text-control" placeholder="Enter Description" name="description" required><?php echo  $products_edit[0]['description']; ?></textarea>
													</div>
												</div>
										</div>
										<div class="form-group">
											<label class="form-label">Quantity*</label>
											<input type="text" class="form-control" placeholder="PKR0" name="unit_quantity" value="<?php echo  $products_edit[0]['unit_quantity']; ?>" required>
										</div>
										<div class="form-group">
											<label class="form-label">Product Type*</label>
											<input type="text" class="form-control" placeholder="Product Type" name="product_type" value="<?php echo  $products_edit[0]['product_type']; ?>"  required>
										</div>
										<div class="form-group">
											<label class="form-label">Sale*</label>
											<input type="text" class="form-control" placeholder="Sale" name="on_sale" value="<?php echo  $products_edit[0]['on_sale']; ?>" required>
										</div>
										<div class="form-group">
											<label class="form-label">Discount MRP*</label>
											<input type="text" class="form-control" placeholder="PKR0" name="discount_type" value="<?php echo  $products_edit[0]['discount_type']; ?>" required>
										</div>
										<div class="form-group">
											<label class="form-label">Discount Amount*</label>
											<input type="text" class="form-control" placeholder="PKR0" name="discount_amount" value="<?php echo  $products_edit[0]['discount_amount']; ?>" required>
										</div>
										<div class="form-group">
											<label class="form-label">Discount Percent*</label>
											<input type="text" class="form-control" placeholder="Percent" name="discount_percent" value="<?php echo  $products_edit[0]['discount_percent']; ?>" required>
										</div>
										<div class="form-group">
											<label class="form-label">Unit Price*</label>
											<input type="text" class="form-control" placeholder="PKR0" name="unit_price" value="<?php echo  $products_edit[0]['unit_price']; ?>" required>
										</div>
										<div class="form-group">
											<label class="form-label">Status*</label>
											<select id="status" name="is_active" class="form-control">
												<option selected value="1" <?php if($products_edit[0]['is_active'] == 1 ){ echo 'selected="selected"'; } else  { echo ''; } ?>>Active</option>
												<option value="0" <?php if($products_edit[0]['is_active'] == 0 ){ echo 'selected="selected"'; } else  { echo ''; } ?>>Inactive</option>
											</select>
										</div>
										<div class="form-group">
											<label class="form-label">Favorities</label>
											<input name="favorities" type="hidden" value="0">
												<label class="switch">
												  <input name="favorities" type="checkbox" value="1" <?php if($products_edit[0]['favorities'] == 1 ){ echo "checked='checked'";}?>>
												  <span class="slider round"></span>
												</label>
										</div>
										<div class="form-group">
											<label class="form-label">Order Number*</label>
											<input type="text" class="form-control" placeholder="Order Number" name="list_order_numb" value="<?php echo  $products_edit[0]['list_order_numb']; ?>" required>
										</div>
										<div class="form-group">
											<label class="form-label">Is Feature*</label>
											<select id="is_featured" name="is_featured" class="form-control">
												<option  value="1" <?php if($products_edit[0]['is_featured'] == 1 ){ echo 'selected="selected"'; } else  { echo ''; } ?>>Yes</option>
												<option value="0" <?php if($products_edit[0]['is_featured'] == 0 ){ echo 'selected="selected"'; } else  { echo ''; } ?>>No</option>
											</select>
										</div>
										<div class="form-group">
											<label class="form-label">Tag Name*</label>
											<input type="text" class="form-control" placeholder="Tag Name" name="tags" value="<?php echo  $products_edit[0]['tags']; ?>" required>
										</div>
										<div class="form-group">
											<label class="form-label">Product*</label>
											<input type="text" class="form-control" placeholder="Enter Product" name="product_sku" value="<?php echo  $products_edit[0]['product_sku']; ?>" required>
										</div>
										<div class="form-group">
											<label class="form-label">Product Category*</label>
											<select id="status" name="product_category_id" class="form-control" required>
												<option value="" >--Select--</option>
												<?php	foreach($get_categories as $key => $value){ ?>
													<option name ="product_category_id"  value="<?php echo $value['pk_id']; ?>" <?php if($products_edit[0]['product_category_id'] == $value['pk_id'] ){ echo 'selected="selected"'; } else  { echo ''; } ?>><?php echo $value['name']; ?></option>
												<?php } ?> 
											</select>
										</div>
										<div class="form-group">
											<label class="form-label">Product Unit*</label>
											<select id="status" name="product_unit_id" class="form-control" required>
												<option value="" >--Select--</option>
												<?php	foreach($get_productsunits as $key => $value){ ?>
													<option name ="product_unit_id"  value="<?php echo $value['pk_id']; ?>" <?php if($products_edit[0]['product_unit_id'] == $value['pk_id'] ){ echo 'selected="selected"'; } else  { echo ''; } ?>><?php echo $value['unit_title']; ?></option>
												<?php } ?> 
											</select>
										</div>
										<div class="form-group">
											<label class="form-label">Business Type*</label>
											<select id="status" name="bussiness_id" class="form-control" required>
												<option value="" >--Select--</option>
												<?php	foreach($business as $key => $value){ ?>
													<option name ="bussiness_id"  value="<?php echo $value['pk_id']; ?>" <?php if($products_edit[0]['bussiness_id'] == $value['pk_id'] ){ echo 'selected="selected"'; } else  { echo ''; } ?>><?php echo $value['name']; ?></option>
												<?php } ?> 
											</select>
										</div>
										<div class="form-group">
											<label class="form-label">Product Image*</label>
											<div class="input-group">
												<div class="custom-file">
													<input type="file" class="form-control" name="file_image" accept="image/*">
												</div>
											</div>
										</div>
										<input type="hidden" name="updatepic" value="<?php echo $products_edit[0]['image_path'] ?>" />
										<div class="form-group">
											<div class="col-md-10 col-md-offset-2 col-sm-9">
												<img src="<?php echo base_url().'/'.$products_edit[0]['image_path'] ?>" class="img-fluid" alt="Default Image" height="200" style="margin:0% 20%;" />
											</div>
										</div>
										<button class="save-btn hover-btn" type="submit">Update Product</button>
										<a  href="<?php echo base_url(); ?>/Products" class="cancel-cst-btn">Cancel</a>
									</div> 
								</div>
							</div>
						</form>	
					</div>
				</div>
			</div>
        </main>