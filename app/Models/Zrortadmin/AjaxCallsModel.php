<?php namespace App\Models\Zrortadmin;

use CodeIgniter\Model;

class AjaxCallsModel extends Model
{
	public function business_categories_list_filter($is_active){
		$data = $is_active;
		if($is_active==""){
			$query = $this->query("SELECT pk_id,title,description,is_active from business_categories order by pk_id asc");
		}else{
		$query = $this->query("SELECT pk_id,title,description,is_active from business_categories where is_active='$is_active' order by pk_id");
		}
		$result =  $query->getResultArray();
		$startpoint = 0;
		$i = $startpoint;
		$resultJson = array();
		$tbody = '';
		foreach ($result as $row) {
			$i++;
			$link = (isset($row['pk_id']) && $row['pk_id'] != '')?$row['pk_id']: '';			
			$tbody .= '<tr id="row_'.$row['pk_id'].'">
							<td class="text-center">'.$i.'</td>
							<td class="">'.$row['title'].'</td>
							<td class="">'.$row['description'].'</td>
							<td class="" >'.(($row['is_active'] == 1) ?  "Active" : "Inactive").'</td>
							<td class="action-btns">
								<a  href="' .base_url(). '/Business-Categories-View/'.$link.'"  title="View"><i class="fas fa-eye"></i></a>
								<a  href="' .base_url(). '/Business-Categories-Edit/'.$link.'"  title="Edit"><i class="fas fa-edit"></i></a>
								<a href="' .base_url(). '/Business-Categories-Delete/'.$link.'" data-toggle="tooltip title="Delete" onclick="return confirm(\'Are you sure?\')"><i class="fa fa-trash  cst-theme-text"></i></i></a>
						  	</td>
		    			</tr>';
		}
		$resultJson["tbody"] = $tbody;
		return json_encode($resultJson,true);
	}
    public function product_units_list_filter($is_active){
		$data = $is_active;
		if($is_active==""){
			$query = $this->query("SELECT pk_id,unit_title,description,is_active from products_units order by pk_id asc");
		}else{
		$query = $this->query("SELECT pk_id,unit_title,description,is_active from products_units where is_active='$is_active' order by pk_id");
		}
		$result =  $query->getResultArray();
		$startpoint = 0;
		$i = $startpoint;
		$resultJson = array();
		$tbody = '';
		foreach ($result as $row) {
			$i++;
			$link = (isset($row['pk_id']) && $row['pk_id'] != '')?$row['pk_id']: '';			
			$tbody .= '<tr id="row_'.$row['pk_id'].'">
							<td class="text-center">'.$i.'</td>
							<td class="">'.$row['unit_title'].'</td>
							<td class="">'.$row['description'].'</td>
							<td class="" >'.(($row['is_active'] == 1) ?  "Active" : "Inactive").'</td>
							<td class="action-btns">
								<a  href="' .base_url(). '/Productsunits-View/'.$link.'"  title="View"><i class="fas fa-eye"></i></a>
								<a  href="' .base_url(). '/Productsunits-Edit/'.$link.'"  title="Edit"><i class="fas fa-edit"></i></a>
						  	</td>
		    			</tr>';
		}
		$resultJson["tbody"] = $tbody;
		return json_encode($resultJson,true);
	}
	public function business_list_filter($is_active){
		$data = $is_active;
		if($is_active==""){
			$query = $this->query("SELECT pk_id,name,business_admin_id,business_category_id,city,is_active from business order by pk_id asc");
		}else{
		$query = $this->query("SELECT pk_id,name,business_admin_id,business_category_id,city,is_active from business where is_active='$is_active' order by pk_id");
		}
		$result =  $query->getResultArray();
		$startpoint = 0;
		$i = $startpoint;
		$resultJson = array();
		$tbody = '';
		foreach ($result as $row) {
			$i++;
			$link = (isset($row['pk_id']) && $row['pk_id'] != '')?$row['pk_id']: '';			
			$tbody .= '<tr id="row_'.$row['pk_id'].'">
							<td class="text-center">'.$i.'</td>
							<td class="">'.$row['name'].'</td>
							<td class="">'.get_business_admin_name($row['business_admin_id']).'</td>
							<td class="">'.get_business_categories_name($row['business_category_id']).'</td>
							<td class="">'.$row['city'].'</td>
							<td class="" >'.(($row['is_active'] == 1) ?  "Active" : "Inactive").'</td>
							<td class="action-btns">
								<a  href="' .base_url(). '/Business-View/'.$link.'"  title="View" class="view-shop-btn"><i class="fas fa-eye"></i></a>
								<a  href="' .base_url(). '/Business-Edit/'.$link.'"  title="Edit"><i class="fas fa-edit"></i></a>
								<a href="' .base_url(). '/Business-Delete/'.$link.'" data-toggle="tooltip title="Delete" onclick="return confirm(\'Are you sure?\')"><i class="fa fa-trash  cst-theme-text"></i></i></a>
						  	</td>
		    			</tr>';
		}
		$resultJson["tbody"] = $tbody;
		return json_encode($resultJson,true);
	}
}