<?php
namespace App\Controllers\Bajocontrol;

class Setting extends ResController
{

  public function __construct(){
      $this->role = model('App\Models\Admin\Setting');
  }

	public function index()
	{
    // $data['data']=$this->inbox->get_inbox();
    $data['data']=$this->get_setting();
		$this->init->generate_admin('admin/setting',$data);
	}

  public function get_setting(){
      $query=$this->db->table('settings')
                      ->select('name,value,tipe,kategori')
                      ->where('visible','Y')
                      ->where('kategori !=','beranda')
                      ->orderBy('kategori')
                      ->get();
      return $query;
  }

  public function do_save(){
      $validation =  \Config\Services::validation();
      $setting=$this->get_setting();
      foreach ($setting->getResult() as $key => $value) {
          $validasi=array($value->name=>'required|string');
      }
      $validation->setRules($validasi);
      $validate = $validation->withRequest($this->request)->run();

      if($validate){
        $data=[];$n=0;
        foreach ($setting->getResult() as $key => $value) {
            $data=array('value'=>$this->request->getPost($value->name));
            $res=$this->db->table('settings')->where('name',$value->name)->update($data);
            if($res){
              $n++;
            }
        }

        if($n > 0){
            $info=array(
                'status'=>true,
                'msg'=>'data berhasil disimpan'
            );
        }else{
            $info=array(
                'msg'=>false,
                'msg'=>'data user gagal disimpan'
            );
        }
      }else{
        $info=array(
            'status'=>false,
            'msg'=>'data tidak bisa disimpan'
        );
      }
      echo json_encode($info);
  }

}
