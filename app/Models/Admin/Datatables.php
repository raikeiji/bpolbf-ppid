<?php

namespace App\Models\Admin;

use CodeIgniter\Model;


class Datatables extends Model{


		protected function _get_datatables_query($select, $table, $join, $where, $order, $search)
 		{
     $this->builder = $this->db->table($table);
     $this->builder->select($select);
     //jika ingin join formatnya adalah sebagai berikut :
		 if(is_array($join)){
	     foreach ($join as $key => $value) {
	        $val=explode(',',$value);
	        if(count($val) > 1){
	            $this->builder->join($key,$val[0],$val[1]);
	        }else{
	            $this->builder->join($key,$value);
	        }
	     }
		 }
     //end Join
     $i = 0;

     foreach ($search as $item) {
         if (isset($_POST['search']['value'])) {

             if ($i === 0) {
                 $this->builder->groupStart();
                 $this->builder->like($item, $_POST['search']['value']);
             } else {
                 $this->builder->orLike($item, $_POST['search']['value']);
             }

             if (count($search) - 1 == $i)
                 $this->builder->groupEnd();
         }
         $i++;
     }

		 if(is_array($where)){
	     foreach ($where as $key => $value) {
	        $this->builder->where($key,$value);
	     }
		 }

     if (isset($_POST['order'])) {
         $this->builder->orderBy($select[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
     } else if (isset($order)) {
         $order = $order;
         $this->builder->orderBy(key($order), $order[key($order)]);
     }

 	}

	 public function datatables($select, $table, $join='', $where='', $order='', $search='')
	 {
	     $this->_get_datatables_query($select, $table, $join, $where, $order, $search);
	     if ($_POST['length'] != -1)
	         $this->builder->limit($_POST['length'], $_POST['start']);
	     if (is_array($where)) {
	         $this->builder->where($where);
	     }

	     $query = $this->builder->get();
	     return $query->getResult();
	 }

	 public function count_filtered($select, $table, $join, $where, $order, $search)
	 {
	     $this->_get_datatables_query($select, $table, $join, $where, $order, $search);
	     if (is_array($where)) {
	         $this->builder->where($where);
	     }
	     $this->builder->get();
	     return $this->builder->countAll();
	 }

	 public function count_all($select, $table, $join, $where)
	 {
       $this->builder->select($select);
			 if(is_array($join)){
	       foreach ($join as $key => $value) {
	          $val=explode(',',$value);
	          if(count($val) > 1){
	              $this->builder->join($key,$val[0],$val[1]);
	          }else{
	              $this->builder->join($key,$value);
	          }
	       }
			 }

	     if (is_array($where)) {
	         $this->builder->where($where);
	     }

	     return $this->builder->countAll();
	 }
}
