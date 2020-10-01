		
		<main>
			<div class="container-fluid">
				<h2 class="mt-30 page-title">Business Categories</h2>
				<ol class="breadcrumb mb-30">
					<li class="breadcrumb-item"><a href="">Dashboard</a></li>
					<li class="breadcrumb-item active">Business Categories</li>
				</ol>
				<div class="row justify-content-between">
					<div class="col-lg-12">
						<a href="<?php echo base_url(); ?>/Business-Categories-Add" class="add-btn hover-btn">Add New</a>
					</div>
					<div class="col-lg-5 col-md-6">
						<div class="bulk-section mt-30">
							<div class="search-by-name-input">
								<input type="text" class="form-control" placeholder="Search">
							</div>
						</div>
					</div>
					<div class="col-lg-12 col-md-12">
						<div class="card card-static-2 mt-30 mb-30">
							<div class="card-title-2">
								<h4>All Business Categories</h4>
							</div>
							<div class="card-body-table">
								<div class="table-responsive">
									<table class="table ucp-table table-hover">
										<thead>
											<tr>
												<th>S#</th>
												<th>Title</th>
												<th>Description</th>
												<th>Active</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php $startpoint=0; $i=$startpoint;  foreach ($businesscategories as $row):  $i++;?>
											<tr>
												<td class="text-center" ><?php echo $i; ?> </td>
												<td class="" ><?php echo $row['title']; ?></td>
												<td class="" ><?php echo $row['description']; ?></td>
												<td class="" ><?php echo $row['is_active']; ?></td>
												<td class="action-btns">
													<a href="<?php echo base_url(); ?>/Business-Categories-View/<?php echo $row['pk_id']?>" class="view-shop-btn" title="View"><i class="fas fa-eye"></i></a>
													<a href="<?php echo base_url(); ?>/Business-Categories-Edit/<?php echo $row['pk_id']?>" class="edit-btn" title="Edit"><i class="fas fa-edit"></i></a>
													<a href="<?php echo base_url(); ?>/Business-Categories-Delete/<?php echo $row['pk_id']?>" onclick="return confirm('Are you sure?')"><i class="fa fa-trash  cst-theme-text"></i></a>
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