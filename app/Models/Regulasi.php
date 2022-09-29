<?php
namespace App\Models;

use CodeIgniter\Model;

class Regulasi extends Model
{
    public function get_investasi(){
      $query=$this->db->table('regulasi')
                      ->where('jenis','investasi')
                      ->where('deleted','N')
                      ->get();
      if($query->getNumRows()){
          return $query;
      }else{
          return false;
      }
    }

    public function get_sektoral(){
      $query=$this->db->table('regulasi')
                      ->where('jenis','sektoral')
                      ->where('kategori','pariwisata_dan_ekonomi_kreatif')
                      ->where('deleted','N')
                      ->get();
      if($query->getNumRows()){
          return $query;
      }else{
          return false;
      }
    }

    public function get_request($kategori){
      $query=$this->db->table('regulasi')
                      ->where('jenis','sektoral')
                      ->where('kategori',$kategori)
                      ->where('deleted','N')
                      ->get();
      if($query->getNumRows()){
          return $query;
      }else{
          return false;
      }
    }
}
