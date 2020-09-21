		<main>
			<div class="container-fluid">
				<h2 class="mt-30 page-title">Business Categories</h2>
				<ol class="breadcrumb mb-30">
					<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/businesscategories">Business Categories</a></li>
					<li class="breadcrumb-item active">Add Business Categories</li>
				</ol>
				<div class="row">
					<div class="col-lg-6 col-md-6">
						<form class="cool-b4-form mt-5" action="<?php echo base_url();?>/Businesscategories/businesscategories_save" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onSubmit="">
							<div class="card card-static-2 mb-30">
								<div class="card-title-2">
									<h4>Add New Business Categories</h4>
								</div>
								<div class="card-body-table">
									<div class="news-content-right pd-20">
										<div class="form-group">
											<label class="form-label">Tite*</label>
											<input type="text" class="form-control" placeholder="Title" name="title" required>
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
											<label class="form-label">Status*</label>
											<select id="status" name="is_active" class="form-control" >
												<option selected value="1">Active</option>
												<option value="0">Inactive</option>
											</select>
										</div>
										<div class="form-group">
											<label class="form-label">Category Image*</label>
											<div class="input-group">
												<div class="custom-file">
													<input type="file" class="form-control" name="file" accept="image/*">
												</div>
											</div>
										</div>
										<button class="save-btn hover-btn" type="submit">Add New Business Categories</button>
										<a  href="<?php echo base_url(); ?>/businesscategories" class="save-btn hover-btn">Cancel</a>
									</div> 
								</div>
							</div>
						</form>	
					</div>
				</div>
			</div>
        </main>