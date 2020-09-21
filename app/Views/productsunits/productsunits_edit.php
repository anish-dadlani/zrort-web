		<main>
			<div class="container-fluid">
				<h2 class="mt-30 page-title">Products Units</h2>
				<ol class="breadcrumb mb-30">
					<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/productsunits"></a></li>
					<li class="breadcrumb-item active">Edit Product Units</li>
				</ol>
				<div class="row">
					<div class="col-lg-6 col-md-6">
						<form class="cool-b4-form mt-5" action="<?php echo base_url();?>/Productsunits/update_productsunits" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onSubmit="">
							<div class="card card-static-2 mb-30">
								<div class="card-title-2">
									<h4>Edit Product Units</h4>
								</div>
								<div class="card-body-table">
									<div class="news-content-right pd-20">
										<div class="form-group">
											<input type="hidden" name="pk_id" value="<?php echo  $productsunits_edit[0]['pk_id']; ?>"  />
											<label class="form-label">Unit Tite*</label>
											<input type="text" class="form-control" placeholder="Unit Name" name="unit_title" value="<?php echo  $productsunits_edit[0]['unit_title']; ?>">
										</div>
										<div class="form-group">
												<label class="form-label">Description*</label>
												<div class="card card-editor">
													<div class="content-editor">
														<textarea class="text-control" placeholder="Enter Description" name="description" ><?php echo  $productsunits_edit[0]['description']; ?></textarea>
													</div>
												</div>
										</div>
										<div class="form-group">
											<label class="form-label">Status*</label>
											<select id="status" name="is_active" class="form-control">
												<option selected value="1" <?php if($productsunits_edit[0]['is_active'] == 1 ){ echo 'selected="selected"'; } else  { echo ''; } ?>>Active</option>
												<option value="0" <?php if($productsunits_edit[0]['is_active'] == 0 ){ echo 'selected="selected"'; } else  { echo ''; } ?>>Inactive</option>
											</select>
										</div>
										<button class="save-btn hover-btn" type="submit">Update Product Units</button>
										<a  href="<?php echo base_url(); ?>/productsunits" class="save-btn hover-btn">Cancel</a>
									</div> 
								</div>
							</div>
						</form>	
					</div>
				</div>
			</div>
        </main>