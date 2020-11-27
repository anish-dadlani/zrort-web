	
	<main>
		<div class="container-fluid">
			<h2 class="mt-30 page-title">Business Listing</h2>
			<div class="row justify-content-between">
				<div class="col-lg-12 col-md-12">
					<div class="card card-static-2 mt-30 mb-30">
						<div class="card-title-2">
							<h4>All Business</h4>
						</div>
						<div class="card-body-table">
							<div class="table-responsive">
								<!--<table class="table ucp-table table-hover">-->
								<table class="table ucp-table table-hover table-striped footable table-vcenter" data-filter="#filter" data-filter-text-only="true" id="businessList">
									<thead>
										<tr class="info">
											<th class="text-center" >S#</th>
											<th>Business Name</th>
											<th>Owner Name</th>
											<th>Business Category</th>
											<th style="width: 200px;">City</th>
											<th style="width: 120px;">Status</th>
										</tr>
									</thead>
									<tbody id="tbody">
										<?php $startpoint=0; $i=$startpoint;  foreach ($business as $row):  $i++;?>
										<tr class="DrillDownRow">
											<td style="display:none;"><?php echo $row['pk_id']; ?></td>
											<td class="text-center" ><?php echo $i; ?> </td>
											<td class="" ><?php echo $row['name']; ?></td>
											<td class="" ><?php echo get_business_admin_name($row['business_admin_id']); ?></td>
											<td class="" ><?php echo get_business_categories_name($row['business_category_id']); ?></td>
											<td class="" ><?php echo $row['city']; ?></td>
											<td class="" ><?php if($row['is_active']==1){echo 'Active';}else{echo 'Inactive';}?></td>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
  $('.DrillDownRow').css('cursor','pointer');
    $(document).on('click',".DrillDownRow", function(){
        var code = $(this).find("td:eq(0)").text();
		alert(code); exit();
        //var distcode = code.substr(0,3);
        //var facode = code.substr(0,6);
        var url = ''; 
		//url: '<?php echo base_url("/Businessadmin/AjaxCalls/categories_list_filter"); ?>',        
        var win = window.open(url,'_self');
       if(win){
          //Browser has allowed it to be opened
          win.focus();
        }else{
          //Broswer has blocked it
          alert('Please allow popups for this site');
        }
      });
  </script>