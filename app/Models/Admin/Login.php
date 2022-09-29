<?php
namespace App\Models\Admin;

use CodeIgniter\Model;

class Login extends Model
{
    public function set_login($username,$password){
        $query=$this->db->table('users')
                        ->select('*')
                        ->where('username',$username)
                        ->where('password',$password)
                        ->get();
        if($query->getNumRows()){
            $row=$query->getRow();
            $data=array(
                'username'=>$row->username,
                'email'=>$row->email,
                'id'=>$row->id
            );
            return $data;
        }else{
            return false;
        }
    }
}
