<?php

namespace App\Models\Admin;

use CodeIgniter\Model;
use App\Libraries\Init;

class Magazine extends Model
{
    public function __construct(){
        $this->table = model('App\Models\Admin\Datatables');
        $this->init = new Init();
        
    }

    public function get_list(){
      $no = $_POST['start'];
      $table="magazine a";
      $join = '';
      $where = ['a.deleted =' => 'N'];
              //Column Order Harus Sesuai Urutan Kolom Pada Header Tabel di bagian View
              //Awali nama kolom tabel dengan nama tabel->tanda titik->nama kolom seperti pengguna.nama
      $select = array(NULL,'a.id','a.judul','a.gambar','a.link','a.created','a.updated','a.deleted');
      $search = array('a.judul');
      $order = array('a.created' => 'desc');
      $list = $this->table->datatables($select,$table, $join, $where, $order, $search);
      $data = [];
      foreach ($list as $res) {
        $gambar=$this->init->get_tumb('public/'.$res->gambar);
          $no++;
          $row=[];
          $row[] = $no;
          $row[] = $res->judul;
          $row[] = '<img src="'.base_url($gambar).'" style="width:40px;height:40px">';
          $row[] = $res->link;
          $row[] = $res->created;
          $row[] = "<button class='btn btn-xs btn-info' onclick='edit(".$res->id.")' type='button'>Edit News</button>
                    <button class='btn btn-xs btn-danger' onclick='hapus(".$res->id.")' type='button'>Delete News</button";

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

}
