<?php

namespace App\Controllers\Bajocontrol;

class Profile extends ResController
{

	public function index()
	{
		$data['data']=$this->get_setting();
		$this->init->generate_admin('admin/profile',$data);
	}
	public function get_setting(){
      $query=$this->db->table('profil_ppid')
											->where('id','1')
                      ->select('*')
                      ->get();
                      $res=$query->getRow();
      return $res;
  }
	public function get_data(){
		// var_dump($_POST);exit;
		$lang=$this->request->getPost('lang');
		if($lang=="1"){
			$selec='ind';
		}else{
			$selec='en';
		}
				$query=$this->db->table('profil_ppid')
												->select("$selec as k1")
												->get();
			header('Content-Type: application/json');
			echo json_encode($query->getResult());
	}



  public function do_save(){
    $validation =  \Config\Services::validation();
    $konten1=$this->request->getPost('konten1');
    $validasi=array(
      'konten1'=>'required|string',
    );
    $validation->setRules($validasi);
    $validate = $validation->withRequest($this->request)->run();
    if($validate){
      if($_POST['bahasa']==1){
        $k1='ind';
      }else{
          $k1='en';
      }
      $data=array(
        $k1=>$konten1,
      );
    $res=$this->db->table('profil_ppid')->where('id',1)->update($data);
  }
        if($res){
            $info=array(
                'status'=>true,
                'msg'=>'data berhasil disimpan'
            );
        }else{
            $info=array(
                'msg'=>false,
                'msg'=>'data gagal disimpan'
            );
        }
      echo json_encode($info);
  }
	public function upload_images(){
		// var_dump($_POST);exit;
			$filename = str_replace(' ','_',$_FILES['file']['name']);
			$tmp=$_FILES['file']['tmp_name'];
			$up=$this->init->upload('file','image',$filename,'profile_ppid','insert');
			// var_dump($up);exit;
			if($up){
				$ups=json_decode($up);
				$info=[
					"status"=>true,
					"fileName"=>$filename,
					"location"=>base_url('public/'.$ups->msg)
				];
				$this->init->json($info);
			}else{
				$info=[
					"uploaded"=>0,
					"error"=>[
							"message"=>"The file is too big."
					]
				];
				$this->init->json($info);
			}

	}
}
