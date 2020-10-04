<?php namespace App\Controllers\Zrortadmin;
//use App\Models\AjaxCallsModel\Zrortadmin;
use CodeIgniter\Controller;
use App\Controllers\BaseController;
class AjaxCalls extends BaseController
{
	public function business_categories_list_filter(){
	  	$draw = intval($this->request->getPost("draw"));
        $start = intval($this->request->getPost("start"));
        $length = intval($this->request->getPost("length"));
        $order = $this->request->getPost("order");
        $search = $this->request->getPost("search");
        $columns = $this->request->getPost("columns");
      	//echo json_encode($_GET);exit;
      	$multiple_search = "";
      	if(isset($columns) AND is_array($columns))
      	{
      		foreach ($columns as $key => $value) 
      		{
      			$search_value = $value['search']['value'];
      			$search_value = str_replace('_', ' ', $search_value);
      			$column = $value['data'];
      			if( ! empty($search_value))
      			{
      				$multiple_search .= " AND ";
      				$multiple_search .= "$column='$search_value'";
      			}
      		}
      	}
      //echo $multiple_search;exit;
      	if(isset($search))
      	{
  			$keyword = $search['value'];
      		$keyword = str_replace('_', ' ', $keyword);
      		$keyword = strtolower($keyword);
      		$search = " AND (lower(title) LIKE '$keyword%' OR 
                        lower(description) LIKE '$keyword%') ";
      	}
      	else
      	{
      		$search = "";
      	}
        $col = 0;
        $dir = "";
        if(!empty($order))
        {
            foreach($order as $o) 
            {
                $col = $o['column'];
                $dir= $o['dir'];
            }
        }
        if($dir != "asc" && $dir != "desc") {
            $dir = "asc";
        }

        $columns_valid = array(
            "serial",
            "title",
			"description",
			"is_active",
        );

        if(!isset($columns_valid[$col])) {
            $order = '';
        } elseif($draw == 1) {
            $order = " order by pk_id ";
        }
        else{
        	$order = "order by ".$columns_valid[$col].' '.$dir;
        }
		$db = \Config\Database::connect();
        $query = $db->query("select title,description,is_active from business_categories  where $search $multiple_search $order LIMIT {$length} OFFSET {$start}");
		//print_r($query);exit;
		$business = $query->getResultArray();
		
        $data = array();
        $i=$start+1;
        foreach($business->result() as $r) 
        {
        	$data[] = array(
				"serial" => $i,
				"title" => $r->title,
				"description" => $r->description,
				"is_active" => $r->is_active,
				
			);
            $i++;
        }
		$query = $db->query("SELECT COUNT(*) AS num FROM business_categories WHERE $search $multiple_search");
			//echo $query;exit;
	  		$total_bussiness_cat = $query->getResultArray();
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $total_bussiness_cat->num,
            "recordsFiltered" => $total_bussiness_cat->num,
            "data" => $data
        );
        echo json_encode($output);
        exit();
	}
}