<?php
namespace App\Models;

use CodeIgniter\Model;

class Fasilitas_kemudahan extends Model
{
    public function get_data($param=''){
      $query=$this->db->table('fasilitas_kemudahan')
                      ->where('jenis',$param)
                      ->where('deleted','N')
                      ->get();
      if($query->getNumRows()){
          return $query;
      }else{
          return false;
      }
    }
}
