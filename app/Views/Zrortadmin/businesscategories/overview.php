		
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
								<input id="nameSearch" name="nameSearch" class="form-control" placeholder="Search">
							</div>
							<div class="input-group">
								<select id="status" name="is_active" class="form-control">
									<option value="2">--- Select Status ---</option>
									<option value="1">Active</option>
									<option value="0">Inactive</option>
								</select>
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
									<table id="business-categories" class="table ucp-table table-hover table-striped footable table-vcenter tbl-listing" data-filter="#filter" data-filter-text-only="true">
										<thead>
											<tr>
												<th>S#</th>
												<th>Title</th>
												<th>Description</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php $startpoint=0; $i=$startpoint;  foreach ($businesscategories as $row):  $i++;?>
											<tr>
												<td class="text-center" ><?php echo $i; ?> </td>
												<td class="" ><?php echo $row['title']; ?></td>
												<td class="" ><?php echo $row['description']; ?></td>
												<td class="" ><?php if($row['is_active']==1){echo 'Active';}else{echo 'Inactive';}?></td>
												<td class="action-btns">
													<a href="<?php echo base_url(); ?>/Business-Categories-View/<?php echo $row['pk_id']?>" class="view-shop-btn" title="View"><i class="fas fa-eye"></i></a>
													<a href="<?php echo base_url(); ?>/Business-Categories-Edit/<?php echo $row['pk_id']?>" class="edit-btn" title="Edit"><i class="fas fa-edit"></i></a>
													<a href="<?php echo base_url(); ?>/Business-Categories-Delete/<?php echo $row['pk_id']?>" title="Delete" onclick="return confirm('Are you sure?')"><i class="fa fa-trash  cst-theme-text"></i></a>
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
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" type="text/javascript"></script>		
<script src="<?php echo base_url('/assets/admin/js/footable.js'); ?>"></script>
<script src="<?php echo base_url('/assets/admin/js/footable.filter.js'); ?>"></script>
<script type="text/javascript">
  $(function () {
    $('.footable').footable();
  });
</script>
<script type="text/javascript"> 
 $(document).ready(function(){   
    var columns = [
          { data: "serial" ,
		  orderable: false,
		  },
		  { data: "title" },
          { data: "description" },
          { data: "is_active" },
          { data: "pk_id" ,
            orderable: false,
            render : function(data, type, row) {
                return '<a  href="<?php echo base_url(); ?>/Business-Categories-View/'+data+'" class="view-shop-btn" title="View"><i class="fas fa-eye"></i></a><a  href="<?php echo base_url(); ?>/Business-Categories-Edit/'+data+'" class="edit-btn" title="Edit"><i class="fas fa-edit"></i></a><a  href="<?php echo base_url(); ?>/Business-Categories-Delete/'+data+'" title="Delete"><i class="fa fa-trash  cst-theme-text"></i></a>'
            }  
          }
        ]; 
  var table = $('#business-categories').DataTable({ 
        "pageLength" : 16,
        "serverSide": true,
        "order": [
          [1, "desc" ]
        ],
        $.ajax({
			url: '<?php echo base_url("/Zrortadmin/AjaxCalls/business_categories_list_filter"); ?>',
            type : 'GET'
        },
        "columns": columns,
        dom: 'lrtips'
      });
  $('#status').on('change', function () {
    table.columns(3).search( this.value ).draw();
  });

  $('#nameSearch').on('keyup change', function () {
    table.search( this.value ).draw();
  });


});

</script>		