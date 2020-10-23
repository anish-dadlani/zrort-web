<?php namespace App\Models\Businessadmin;

use CodeIgniter\Model;

class AjaxCallsModel extends Model
{
    public function categories_list_filter($is_active){
		$data = $is_active;
		if($is_active==""){
			$query = $this->query("SELECT pk_id,name,shortname,bussiness_id,tags,is_active from product_categories order by pk_id asc");
		}else{
		$query = $this->query("SELECT pk_id,name,shortname,bussiness_id,tags,is_active from product_categories where is_active='$is_active' order by pk_id");
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
							<td class="">'.$row['shortname'].'</td>
							<td class="">'.get_business_name($row['bussiness_id']).'</td>
							<td class="">'.$row['tags'].'</td>
							<td class="" >'.(($row['is_active'] == 1) ?  "Active" : "Inactive").'</td>
							<td class="action-btns">
								<a  href="' .base_url(). '/Categories-View/'.$link.'"  title="View"><i class="fas fa-eye"></i></a>
								<a  href="' .base_url(). '/Categories-Edit/'.$link.'"  title="Edit"><i class="fas fa-edit"></i></a>
								<a href="' .base_url(). '/Categories-Delete/'.$link.'" data-toggle="tooltip title="Delete" onclick="return confirm(\'Are you sure?\')"><i class="fa fa-trash  cst-theme-text"></i></i></a>
						  	</td>
		    			</tr>';
		}
		$resultJson["tbody"] = $tbody;
		return json_encode($resultJson,true);
	}
	public function product_list_filter($is_active){
		$data = $is_active;
		if($is_active==""){
			$query = $this->query("SELECT pk_id,name,product_type,product_category_id,product_unit_id,bussiness_id,shortname,unit_price,is_active from products order by pk_id asc");
		}else{
		$query = $this->query("SELECT pk_id,name,product_type,product_category_id,product_unit_id,bussiness_id,shortname,unit_price,is_active from products  where is_active='$is_active' order by pk_id");
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
							<td class="">'.$row['product_type'].'</td>
							<td class="">'.get_product_categories_name($row['bussiness_id']).'</td>
							<td class="">'.get_product_unit_name($row['product_unit_id']).'</td>
							<td class="">'.get_business_name($row['bussiness_id']).'</td>
							<td class="">'.$row['shortname'].'</td>
							<td class="">'.$row['unit_price'].'</td>
							<td class="" >'.(($row['is_active'] == 1) ?  "Active" : "Inactive").'</td>
							<td class="action-btns">
								<a  href="' .base_url(). '/Products-View/'.$link.'"  title="View"><i class="fas fa-eye"></i></a>
								<a  href="' .base_url(). '/Products-Edit/'.$link.'"  title="Edit"><i class="fas fa-edit"></i></a>
								<a href="' .base_url(). '/Products-Delete/'.$link.'" data-toggle="tooltip title="Delete" onclick="return confirm(\'Are you sure?\')"><i class="fa fa-trash  cst-theme-text"></i></i></a>
						  	</td>
		    			</tr>';
		}
		$resultJson["tbody"] = $tbody;
		return json_encode($resultJson,true);
	}
}