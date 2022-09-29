<?php

namespace App\Models;

use CodeIgniter\Model;

class User_account extends Model
{

    public function __construct(){
        $this->table = model('App\Models\Datatables');
    }

    public function get_list(){
      $no = $_POST['start'];
      $table="users a";
      $join = ['roles b'=>'a.role_id=b.id , left'];
      $where = ['a.type =' => 'user'];
              //Column Order Harus Sesuai Urutan Kolom Pada Header Tabel di bagian View
              //Awali nama kolom tabel dengan nama tabel->tanda titik->nama kolom seperti pengguna.nama
      $select = array(NULL,'a.name','a.email','a.type','a.is_ldap','a.is_login','b.name as role','a.id');
      $search = array('a.name','a.email','a.type','a.is_ldap','b.name');
      $order = array('a.created_at' => 'desc');
      $list = $this->table->datatables($select,$table, $join, $where, $order, $search);
      $data = [];
      foreach ($list as $res) {
          $no++;
          $row=[];
          $row[] = $no;
          $row[] = $res->name;
          $row[] = $res->email;
          $row[] = $res->type;
          $row[] = ($res->is_ldap=='Y')?'Ldap':'Non Ldap';
          $row[] = ($res->is_login=='Y')?'Login':'Logout';
          $row[] = $res->role;
          $row[] = "<button class='btn btn-xs btn-info' onclick='edit(".$res->id.")' type='button'>Edit User</button>
                    <button class='btn btn-xs btn-danger' onclick='hapus(".$res->id.")' type='button'>Delete User</button";

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
