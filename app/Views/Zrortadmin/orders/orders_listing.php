<style>
li {
  background-color: #e9ecef;
  border: none;
  color: white;
  padding: 5px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
</style>
<main>
	<div class="container-fluid">
		<h2 class="mt-30 page-title">Orders</h2>
		<ol class="breadcrumb mb-30">
			<li class="breadcrumb-item"><a href="">Dashboard</a></li>
			<li class="breadcrumb-item active">Orders</li>
		</ol>
		<div class="row justify-content-between">
			<div class="col-lg-3 col-md-4">
				<div class="bulk-section mb-30">
					<div class="input-group">
						<select id="action" name="action" class="form-control">
							<option selected>Bulk Actions</option>
							<option value="1">Pending</option>
							<option value="2">Cancel</option>
							<option value="3">Process</option>
							<option value="4">Complete</option>
							<option value="5">Delete</option>
						</select>
						<div class="input-group-append">
							<button class="status-btn hover-btn" type="submit">Apply</button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-5 col-md-6">
				<div class="bulk-section mb-30">
					<div class="search-by-name-input">
						<input type="text" class="form-control" placeholder="Search">
					</div>
					<div class="input-group">
						<select id="categeory" name="categeory" class="form-control">
							<option value="1">Pending</option>
							<option value="2">Cancel</option>
							<option value="3">Process</option>
							<option value="4">Complete</option>
						</select>
						<div class="input-group-append">
							<button class="status-btn hover-btn" type="submit">Search Order</button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-12 col-md-12">
				<div class="card card-static-2 mb-30">
					<div class="card-title-2">
						<h4>All Orders</h4> 
					</div>
					<div class="card-body-table">
						<div class="table-responsive">
							<table class="table ucp-table table-hover">
								<thead>
									<tr>
										<th style="width:60px">S#<!--<input type="checkbox" class="check-all">--></th>
										<th style="width:130px">Order ID</th>
										<th>Item</th>
										<th style="width:200px">Date</th>
										<th style="width:300px">Address</th>
										<th style="width:130px">Status</th>
										<th style="width:130px">Total</th>
										<th style="width:100px">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $startpoint=0; $i=$startpoint;  foreach($orders as $key => $value): $i++;?>
									<tr>
										<td><?= $i ?></td>
										<td><?= $value['order_no'] ?></td>
										<td><?= ''?></td>
										<td><?= $value['created_datetime'] ?></td>
										<td><?= $value['address'] ?></td>
										<td><?= $value['status'] ?></td>
										<td><?= $value['total'] ?></td>
										<td class="action-btns">
											<a href="<?php echo base_url(); ?>/#/<?php echo $value['order_no']?>" class="view-shop-btn" title="View"><i class="fas fa-eye"></i></a>
											<a href="<?php echo base_url(); ?>/#/<?php echo $value['order_no']?>" class="edit-btn" title="Edit"><i class="fas fa-edit"></i></a>
											<a href="<?php echo base_url(); ?>/#/<?php echo $value['order_no']?>" onclick="return confirm('Are you sure?')"><i class="fa fa-trash  cst-theme-text"></i></a>
										</td>
									</tr>
									<?php endforeach;  ?>
								</tbody>
							</table>
							<div class="row">
								<div class="col-md-6">
									<?= $pager->links() ?>
								</div>
								<div class="col-md-6">										
									<?= $pager->simpleLinks() ?>
								</div>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>