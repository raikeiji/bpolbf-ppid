<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class Pasar extends Model
{
    public function __construct(){
        $this->table = model('App\Models\Admin\Datatables');
    }

    public function get_list(){
      $no = $_POST['start'];
      $table="umkm a";
      $join = ['kategori_umkm b'=>'a.id_kategori=b.id_kategori , left'];
      $where = ['a.deleted =' => 'N'];
              //Column Order Harus Sesuai Urutan Kolom Pada Header Tabel di bagian View
              //Awali nama kolom tabel dengan nama tabel->tanda titik->nama kolom seperti pengguna.nama
      $select = array(NULL,'a.id','a.nama','a.alamat','a.telp','a.deskripsi','b.nama_kategori','a.created','a.updated','a.deleted');
      $search = array('a.nama','a.alamat','b.nama_kategori');
      $order = array('a.created' => 'desc');
      $list = $this->table->datatables($select,$table, $join, $where, $order, $search);
      $data = [];
      foreach ($list as $res) {
          $no++;
          $row=[];
          $row[] = $no;
          $row[] = $res->nama;
          $row[] = $res->alamat;
          $row[] = $res->telp;
          $row[] = $res->deskripsi;
          $row[] = $res->created;
          $row[] ='<a href="#" onclick=edit("'.$res->id.'") class="btn btn-xs btn-primary pull-left" title="Edit umkm" style="margin-right:3px"><i class="fa fa-edit"></i> Edit</a><a href="#" onclick=hapus("'.$res->id.'") class="btn btn-xs btn-danger pull-left" title="Delete"><i class="fa fa-trash-o"></i></a>';


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
