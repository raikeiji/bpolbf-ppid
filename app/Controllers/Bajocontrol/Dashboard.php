<?php

namespace App\Controllers\Bajocontrol;
// ini_set('memory_limit', '-1');
class Dashboard extends ResController
{

	public function __construct(){
			// $this->dashboard = model('App\Models\Dashboard');
	}

	public function index()
	{
		$this->init->generate_admin('admin/dashb');
	}

	public function get_data(){
		$tgl=date('Y-m-d');
		$query=$this->db->table('data_faxes')
										->select("count(id) as total,
														(select count(id) from data_faxes where status=0 and date(created_at)='$tgl') as queue,
														(select count(id) from data_faxes where status=1 and date(created_at)='$tgl') as sent,
														(select count(id) from data_faxes where status=2 and date(created_at)='$tgl') as pending")
										->where('date(created_at)',$tgl)
										->get();
		$data=[];
		if($query->getNumRows()){
				$res=$query->getRow();
				$data=array(
						'total'=>$res->total,
						'sent'=>$res->sent,
						'queue'=>$res->queue,
						'pending'=>$res->pending,
				);
		}
		echo json_encode($data);
	}

	public function get_chart(){

			$tgl=date('Y-m-d');
			$tgl1 = date('Y-m-d', strtotime('-9 days', strtotime($tgl)));
			$str='';
			for($a=$tgl1;$a<=$tgl;$a++){
					$alias='tgl'.str_replace('-','',$a);
					$str.="(select count(id) from data_faxes where date(created_at)='$a') as $alias,";
			}
			$query=$this->db->table("data_faxes")
											->select("$str id")
											->where('date(created_at)',$tgl)
											->get();
			$data=[];
			if($query->getNumRows()){
					$res=$query->getRow();
					for($a=$tgl1;$a<=$tgl;$a++){
							$alias='tgl'.str_replace('-','',$a);
							$data[]=$res->$alias;
					}
			}
			echo json_encode($data);
	}

}
