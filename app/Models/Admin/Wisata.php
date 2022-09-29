<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class Wisata extends Model
{
    public function __construct(){
        $this->table = model('App\Models\Admin\Datatables');
    }

    public function get_list(){
      $no = $_POST['start'];
      $table="destinasi_wisata a";
      $join = ['kabupaten b'=>'a.id_kab=b.id , left','kategori_wisata c'=>'a.kategori=c.id_kategori , left'];
      $where = ['a.deleted =' => 'N'];
              //Column Order Harus Sesuai Urutan Kolom Pada Header Tabel di bagian View
              //Awali nama kolom tabel dengan nama tabel->tanda titik->nama kolom seperti pengguna.nama
      $select = array(NULL,'a.id','a.nama','c.nama_kategori','a.koordinat','a.deskripsi','b.kabupaten');
      $search = array('a.nama','a.deskripsi','b.kabupaten');
      $order = array('a.created' => 'desc');
      $list = $this->table->datatables($select,$table, $join, $where, $order, $search);
      $data = [];
      foreach ($list as $res) {
          $no++;
          $row=[];
          $row[] = $no;
          $row[] = $res->nama;
          $row[] = $res->nama_kategori;
          $row[] = $res->deskripsi;
          $row[] = $res->kabupaten;
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

}
