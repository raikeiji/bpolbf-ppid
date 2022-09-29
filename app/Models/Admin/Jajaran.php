<?php

namespace App\Models\Admin;

use CodeIgniter\Model;
use App\Libraries\Init;

class Jajaran extends Model
{

    public function __construct(){
        $this->table = model('App\Models\Admin\Datatables');
        $this->init = new Init();
    }

    public function get_list(){
      $no = $_POST['start'];
      $table="team a";
      $join = [];
      $where = ['a.deleted =' => 'N'];
              //Column Order Harus Sesuai Urutan Kolom Pada Header Tabel di bagian View
              //Awali nama kolom tabel dengan nama tabel->tanda titik->nama kolom seperti pengguna.nama
      $select = array(NULL,'a.id','a.nama','a.gambar','a.jabatan','a.direktorat','a.ulasan_singkat','a.facebook','a.twitter','a.instagram','a.email','a.created','a.updated','a.deleted');
      $search = ['a.nama','a.jabatan','a.direktorat','a.ulasan_singkat'];
      $order = ['a.created' => 'desc'];
      $list = $this->table->datatables($select,$table, $join, $where, $order, $search);
      $data = [];
      foreach ($list as $key=>$res) {
          $gambar=$this->init->get_tumb('public/'.$res->gambar);
          $no++;
          $row=[];
          $row[] = $no;
          $row[] = $res->nama;
          $row[] = $res->jabatan;
          $row[] = $res->ulasan_singkat;
          $row[] = '<img src="'.base_url($gambar).'" style="width:40px;height:40px">';
          $row[] = $res->facebook;
          $row[] = $res->twitter;
          $row[] = $res->instagram;
          $row[] = $res->email;
          $row[] = "<button class='btn btn-xs btn-info' onclick='edit(".$res->id.")' type='button'>Edit</button>
                    <button class='btn btn-xs btn-danger' onclick='hapus(".$res->id.")' type='button'>Delete</button";

          $data[] = $row;
      }
      $output = array(
          "draw" => $_POST['draw'],
          "recordsTotal" => $this->table->count_all($select,$table,$join, $where),
          "recordsFiltered" => $this->table->count_filtered($select, $table, $join, $where, $order, $search),
          "data" => $data,
      );

      echo json_encode($output);
    }


    public function insert_user($data){
        return $this->db->table('users')->insert($data);
    }

}
