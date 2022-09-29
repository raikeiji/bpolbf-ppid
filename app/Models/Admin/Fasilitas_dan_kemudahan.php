<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class Fasilitas_dan_kemudahan extends Model
{
    public function __construct(){
        $this->table = model('App\Models\Admin\Datatables');
    }

    public function get_list(){
      $no = $_POST['start'];
      $table="fasilitas_kemudahan a";
      $join = '';
      $where = ['a.deleted =' => 'N'];
              //Column Order Harus Sesuai Urutan Kolom Pada Header Tabel di bagian View
              //Awali nama kolom tabel dengan nama tabel->tanda titik->nama kolom seperti pengguna.nama
      $select = array(NULL,'a.id','a.title','a.konten','a.jenis','a.created','a.updated','a.deleted','(select c.doc_name from arsip c where c.id_page=a.id) as gambar');
      $search = array('a.title','a.jenis','a.konten');
      $order = array('a.created' => 'desc');
      $list = $this->table->datatables($select,$table, $join, $where, $order, $search);
      $data = [];
      foreach ($list as $res) {
          $no++;
          $row=[];
          $row[] = $no;
          $row[] = $res->title;
          $row[] = substr(strip_tags($res->konten),0,200);
          $row[] = $res->jenis;
          $row[] = '<img src="'.base_url('public/').'/'.$res->gambar.'" style="width:40px;height:35px">';
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
