		<main>
			<div class="container-fluid">
				<h2 class="mt-30 page-title">Products</h2>
				<ol class="breadcrumb mb-30">
					<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/products">Products</a></li>
					<li class="breadcrumb-item active">Add Product</li>
				</ol>
				<div class="row">
					<div class="col-lg-6 col-md-6">
						<form class="cool-b4-form mt-5" action="<?php echo base_url();?>/Products/products_save" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onSubmit="">
							<div class="card card-static-2 mb-30">
								<div class="card-title-2">
									<h4>Add New Product</h4>
								</div>
								<div class="card-body-table">
									<div class="news-content-right pd-20">
										<div class="form-group">
											<label class="form-label">Name*</label>
											<input type="text" class="form-control" placeholder="Product Name" name="name" required>
										</div>
										<div class="form-group">
												<label class="form-label">Short Name*</label>
												<input type="text" class="form-control" placeholder="Short Name" name="shortname" required>
										</div>
										<div class="form-group">
												<label class="form-label">Description*</label>
												<div class="card card-editor">
													<div class="content-editor">
														<textarea class="text-control" placeholder="Enter Description" name="description" required></textarea>
													</div>
												</div>
										</div>
										<div class="form-group">
											<label class="form-label">Quantity*</label>
											<input type="text" class="form-control" placeholder="PKR0" name="unit_quantity" required>
										</div>
										<div class="form-group">
											<label class="form-label">Product Type*</label>
											<input type="text" class="form-control" placeholder="Product Type" name="product_type" required>
										</div>
										<div class="form-group">
											<label class="form-label">Sale*</label>
											<input type="text" class="form-control" placeholder="Sale" name="on_sale" required>
										</div>
										<div class="form-group">
											<label class="form-label">Discount MRP*</label>
											<input type="text" class="form-control" placeholder="PKR0" name="discount_type" required>
										</div>
										<div class="form-group">
											<label class="form-label">Discount Amount*</label>
											<input type="text" class="form-control" placeholder="PKR0" name="discount_amount" required>
										</div>
										<div class="form-group">
											<label class="form-label">Discount Percent*</label>
											<input type="text" class="form-control" placeholder="Percent" name="discount_percent" required>
										</div>
										<div class="form-group">
											<label class="form-label">Unit Price*</label>
											<input type="text" class="form-control" placeholder="PKR0" name="unit_price" required>
										</div>
										<div class="form-group">
											<label class="form-label">Status*</label>
											<select id="status" name="is_active" class="form-control">
												<option selected value="1">Active</option>
												<option value="0">Inactive</option>
											</select>
										</div>
										<div class="form-group">
											<label class="form-label">Product*</label>
											<input type="text" class="form-control" placeholder="Enter Product" name="product_sku" required>
										</div>
										<div class="form-group">
											<label class="form-label">Product Category*</label>
											<select id="status" name="product_category_id" class="form-control" required>
												<option value="" >--Select--</option>
												<?php
												foreach($get_categories as $row)
												{
													echo '<option value="'.$row['pk_id'].'">'.$row['name'].'</option>';
												}
												?>
											</select>
										</div>
										<div class="form-group">
											<label class="form-label">Product Unit*</label>
											<select id="status" name="product_unit_id" class="form-control" required>
												<option value="" >--Select--</option>
												<?php
												foreach($get_productsunits as $row)
												{
													echo '<option value="'.$row['pk_id'].'">'.$row['unit_title'].'</option>';
												}
												?>
											</select>
										</div>
										<div class="form-group">
											<label class="form-label">Business Type*</label>
											<select id="status" name="bussiness_id" class="form-control" required>
												<option value="" >--Select--</option>
												<?php
												foreach($business as $row)
												{
													echo '<option value="'.$row['pk_id'].'">'.$row['name'].'</option>';
												}
												?>
											</select>
										</div>
										<div class="form-group">
											<label class="form-label">Product Image*</label>
											<div class="input-group">
												<div class="custom-file">
													<input type="file" class="form-control" name="file" accept="image/*">
												</div>
											</div>
										</div>
										<button class="save-btn hover-btn" type="submit">Add New Product</button>
										<a  href="<?php echo base_url(); ?>/products" class="save-btn hover-btn">Cancel</a>
									</div> 
								</div>
							</div>
						</form>	
					</div>
				</div>
			</div>
        </main>