<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class Bpolbf extends Model
{
    public function __construct(){
        $this->table = model('App\Models\Admin\Datatables');
    }

    public function get_list(){
      $no = $_POST['start'];
      $table="acara a";
      $join = ['kabupaten b'=>'a.lokasi=b.id , left','kategori_wisata c'=>'a.kategori=c.id_kategori , left'];
      $where = ['a.deleted =' => 'N','a.kategori ='=>'bpolbf'];
              //Column Order Harus Sesuai Urutan Kolom Pada Header Tabel di bagian View
              //Awali nama kolom tabel dengan nama tabel->tanda titik->nama kolom seperti pengguna.nama
      $select = array(NULL,'a.id_berita','a.judul','b.kabupaten','a.tgl_event','a.info','a.konten');
      $search = array('a.judul','a.konten','b.kabupaten');
      $order = array('a.created' => 'desc');
      $list = $this->table->datatables($select,$table, $join, $where, $order, $search);
      $data = [];
      foreach ($list as $res) {
          $no++;
          $row=[];
          $row[] = $no;
          $row[] = $res->judul;
          $row[] = $res->kabupaten;
          $row[] = $res->tgl_event;
          $row[] = $res->info;
          $row[] = $res->konten;
          $row[] = "<button class='btn btn-xs btn-info' onclick='edit(".$res->id_berita.")' type='button'>Edit</button>
                    <button class='btn btn-xs btn-danger' onclick='hapus(".$res->id_berita.")' type='button'>Delete</button";

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
