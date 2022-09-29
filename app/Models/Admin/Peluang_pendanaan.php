<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class Peluang_pendanaan extends Model
{
    public function __construct(){
        $this->table = model('App\Models\Datatables');
    }

    public function get_list(){
      $no = $_POST['start'];
      $table="investasi a";
      $join = ['kabupaten b'=>'a.id_kab=b.id , left'];
      $where = ['a.deleted =' => 'N'];
              //Column Order Harus Sesuai Urutan Kolom Pada Header Tabel di bagian View
              //Awali nama kolom tabel dengan nama tabel->tanda titik->nama kolom seperti pengguna.nama
      $select = array(NULL,'a.id','a.nama','a.deskripsi','a.koordinat','b.kabupaten','a.created','a.updated','a.deleted');
      $search = array('a.nama','a.deskripsi','b.kabupaten');
      $order = array('a.created' => 'desc');
      $list = $this->table->datatables($select,$table, $join, $where, $order, $search);
      $data = [];
      foreach ($list as $res) {
          $no++;
          $row=[];
          $row[] = $no;
          $row[] = $res->nama;
          $row[] = $res->deskripsi;
          $row[] = $res->kabupaten;
          $row[] = $res->koordinat;
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
