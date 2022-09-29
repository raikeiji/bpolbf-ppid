<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class Peta_sebaran extends Model
{

    public function __construct(){
        $this->table = model('App\Models\Admin\Datatables');
    }

    public function get_list(){
      $no = isset($_POST['start']);
      $table="kategori a";
      $join = [];
      $where = ['a.deleted =' => 'N'];
              //Column Order Harus Sesuai Urutan Kolom Pada Header Tabel di bagian View
              //Awali nama kolom tabel dengan nama tabel->tanda titik->nama kolom seperti pengguna.nama
      $select = array(NULL,'a.id_kategori','a.nama_kategori','a.created','a.updated','a.deleted');
      $search = ['a.nama_kategori'];
      $order = ['a.created' => 'desc'];
      $list = $this->table->datatables($select,$table, $join, $where, $order, $search);
      $data = [];
      foreach ($list as $res) {
          $no++;
          $row=[];
          $row[] = $no;
          $row[] = $res->nama_kategori;
          $row[] = "<button class='btn btn-xs btn-info' onclick='edit(".$res->id_kategori.")' type='button'>Edit Category</button>
                    <button class='btn btn-xs btn-danger' onclick='hapus(".$res->id_kategori.")' type='button'>Delete Category</button";

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
