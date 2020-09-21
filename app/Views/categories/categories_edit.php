		<main>
			<div class="container-fluid">
				<h2 class="mt-30 page-title">Categories</h2>
				<ol class="breadcrumb mb-30">
					<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/categories">Categories</a></li>
					<li class="breadcrumb-item active">Edit Category</li>
				</ol>
				<div class="row">
					<div class="col-lg-6 col-md-6">
						<form class="cool-b4-form mt-5" action="<?php echo base_url();?>/Categories/update_categories" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onSubmit="">
							<div class="card card-static-2 mb-30">
								<div class="card-title-2">
									<h4>Edit Category</h4>
								</div>
								<div class="card-body-table">
									<div class="news-content-right pd-20">
										<div class="form-group">
											<input type="hidden" name="pk_id" value="<?php echo  $categories_edit[0]['pk_id']; ?>"  />
											<label class="form-label">Name*</label>
											<input type="text" class="form-control" placeholder="Category Name" name="name" value="<?php echo  $categories_edit[0]['name']; ?>" required>
										</div>
										<div class="form-group">
											<label class="form-label">Short Name*</label>
											<input type="text" class="form-control" placeholder="Short Name" name="shortname" value="<?php echo  $categories_edit[0]['shortname']; ?>" required>
										</div>
										<div class="form-group">
											<label class="form-label">Business Type*</label>
											<select id="status" name="bussiness_id" class="form-control" required>
												<option value="" >--Select--</option>
												<?php	foreach($business as $key => $value){ ?>
														<option name ="priorityid"  value="<?php echo $value['pk_id']; ?>" <?php if($categories_edit[0]['bussiness_id'] == $value['pk_id'] ){ echo 'selected="selected"'; } else  { echo ''; } ?>><?php echo $value['name']; ?></option>
												<?php } ?> 
											</select>
										</div>
										<div class="form-group">
											<label class="form-label">Status*</label>
											<select id="status" name="is_active" class="form-control" >
												<option selected value="1" <?php if($categories_edit[0]['is_active'] == 1 ){ echo 'selected="selected"'; } else  { echo ''; } ?>>Active</option>
												<option value="0" <?php if($categories_edit[0]['is_active'] == 0 ){ echo 'selected="selected"'; } else  { echo ''; } ?>>Inactive</option>
											</select>
										</div>
										<div class="form-group">
											<label class="form-label">Description*</label>
											<div class="card card-editor">
												<div class="content-editor">
													<textarea class="text-control" placeholder="Enter Description" name="description" required><?php echo  $categories_edit[0]['description']; ?></textarea>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="form-label">Category Image*</label>
											<div class="input-group">
												<div class="custom-file">
													<input type="file" class="form-control" name="file" accept="image/*">
												</div>
											</div>
										</div>
										<input type="hidden" name="updatepic" value="<?php echo $categories_edit[0]['image_path'] ?>" />
										<div class="form-group">
											<div class="col-md-10 col-md-offset-2 col-sm-9">
												<img src="<?php echo base_url().'/'.$categories_edit[0]['image_path'] ?>" class="img-fluid" alt="Default Image" height="200" style="margin:0% 20%;" />
											</div>
										</div>
										<button class="save-btn hover-btn" type="submit">Update Category</button>
										<a href="<?php echo base_url(); ?>/categories" class="save-btn hover-btn">Cancel</a>
									</div> 
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
        </main>