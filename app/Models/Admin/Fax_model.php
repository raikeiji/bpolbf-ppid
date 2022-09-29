<?php

namespace App\Models;

use CodeIgniter\Model;

class Fax_model extends Model
{

    protected $table      = 'channels';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['name', 'number', 'mapping', 'created_at', 'updated_at'];

    public function __construct(){
        $this->table = model('App\Models\Datatables');
    }

    public function fax_list(){
      $no = $_POST['start'];
      $table="channels";
      $join = [];
      $where = [];
              //Column Order Harus Sesuai Urutan Kolom Pada Header Tabel di bagian View
              //Awali nama kolom tabel dengan nama tabel->tanda titik->nama kolom seperti pengguna.nama
      $select = array('id','name','number','mapping');
      $search = array('name','number','mapping');
      $order = array('id' => 'asc');
      $list = $this->table->datatables($select,$table, $join, $where, $order, $search);
      $data = [];
      foreach ($list as $res) {
          $no++;
          $row=[];
          $row[] = $no;
          $row[] = $res->name;
          $row[] = $res->number;
          $row[] = $res->mapping;
          $row[] = '<button class="btn btn-xs btn-info" onclick="edit('.$res->id.')">edit fax</button><button class="btn btn-xs btn-danger" onclick="hapus('.$res->id.')">delete fax</button>';
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
