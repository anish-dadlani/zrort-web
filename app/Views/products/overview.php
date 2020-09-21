		
		<main>
			<div class="container-fluid">
				<h2 class="mt-30 page-title">Products</h2>
				<ol class="breadcrumb mb-30">
					<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
					<li class="breadcrumb-item active">Products</li>
				</ol>
				<div class="row justify-content-between">
					<div class="col-lg-12">
						<a href="<?php echo base_url(); ?>/products_add" class="add-btn hover-btn">Add New</a>
					</div>
					<div class="col-lg-3 col-md-4">
						<div class="bulk-section mt-30">
							<div class="input-group">
								<select id="action" name="action" class="form-control">
									<option selected>Bulk Actions</option>
									<option value="1">Active</option>
									<option value="2">Inactive</option>
									<option value="3">Delete</option>
								</select>
								<div class="input-group-append">
									<button class="status-btn hover-btn" type="submit">Apply</button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-5 col-md-6">
						<div class="bulk-section mt-30">
							<div class="search-by-name-input">
								<input type="text" class="form-control" placeholder="Search">
							</div>
							<div class="input-group">
								<select id="categeory" name="categeory" class="form-control">
									<option selected>Active</option>
									<option value="1">Inactive</option>
								</select>
								<div class="input-group-append">
									<button class="status-btn hover-btn" type="submit">Search Area</button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-12 col-md-12">
						<div class="card card-static-2 mt-30 mb-30">
							<div class="card-title-2">
								<h4>All Products</h4>
							</div>
							<div class="card-body-table">
								<div class="table-responsive">
									<table class="table ucp-table table-hover">
										<thead>
											<tr>
												<th>S#</th>
												<th>Title</th>
												<th>Category</th>
												<th>Short Name</th>
												<th>Thumbnail</th>
												<th>Unit Price <span class="badge-cst">Rs</span></th>
												<th>Active</th>
												<th>On Promotion</th>
												<th>Instant Product</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php $startpoint=0; $i=$startpoint;  foreach ($products as $row):  $i++;?>
											<tr>
												<td class="text-center" ><?php echo $i; ?> </td>
												<td class="" ><?php echo $row['name']; ?></td>
												<td class="" ><?php echo $row['product_category_id']; ?></td>
												<td class="" ><?php echo $row['shortname']; ?></td>
												<td class="" ><?php echo $row['thumbnail_path']; ?></td>
												<td class="" ><?php echo $row['unit_price']; ?></td>
												<td class="" ><?php echo $row['is_active']; ?></td>
												<td class="" ><?php echo $row['on_sale']; ?></td>
												<td class="" ><?php echo $row['product_type']; ?></td>
												<td class="action-btns">
													<a href="<?php echo base_url(); ?>/products_view/<?php echo $row['pk_id']?>" class="view-shop-btn" title="View"><i class="fas fa-eye"></i></a>
													<a href="<?php echo base_url(); ?>/products_edit/<?php echo $row['pk_id']?>" class="edit-btn" title="Edit"><i class="fas fa-edit"></i></a>
													<a href="<?php echo base_url(); ?>/products_delete/<?php echo $row['pk_id']?>" onclick="return confirm('Are you sure?')"><i class="fa fa-trash  cst-theme-text"></i></a>
												</td>
											</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        </main>	