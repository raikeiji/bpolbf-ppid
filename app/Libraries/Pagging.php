<?php
namespace App\Libraries;

Class Pagging{

  public function __construct(){
      $this->db       = \Config\Database::connect();
      $this->uri      = new \CodeIgniter\HTTP\URI();
      $this->request  = \Config\Services::request();
  }

  public function query($select='',$table='',$join=[],$where=[],$group='',$limit='',$starts='',$search=''){
      $start=$starts;
      if($starts<2){
        $start=1;
      }
      $start=$start*$limit;
      $builder=$this->db->table($table);
      $builder->select($select);

      if(is_array($join)){
        foreach ($join as $key => $value) {
            $builder->join($key,$value);
        }
      }

      if(is_array($search)){
          foreach ($search as $key => $value) {
              if($key<1){
                  $builder->like($key,$value);
              }else{
                  $builder->orLike($key,$value);
              }
          }
      }

      if(is_array($where)){
          foreach ($where as $key => $value) {
              $builder->where($key,$value);
          }
      }

      if(!empty($group)){
          $builder->groupBy($group);
      }

      if(!empty($limit)){
          $builder->limit($limit,$start);
      }

      $res=$builder->get();

      $data=[
          'data'=>$res->getResult(),
          'total'=>$this->count_all($table,$join,$where,$group,$search),
          'start'=>$start,
          'limit'=>$limit,
          'filtered'=>$builder->countAll(),
          'total_page'=>floor($this->count_all($table,$join,$where,$group,$search)/$limit)
      ];
      if($this->request->isAJAX()){
          echo json_encode($data);
      }else{
          return $data;
      }
  }

  public function count_all($table,$join,$where,$group,$search){
      $builder=$this->db->table($table);
      $builder->select('count(*) as total');
      if(is_array($join)){
          foreach ($join as $key => $value) {
              $builder->join($key,$value);
          }
      }

      if(is_array($search)){
          foreach ($search as $key => $value) {
              if($key<1){
                  $builder->like($key,$value);
              }else{
                  $builder->orLike($key,$value);
              }
          }
      }

      if(is_array($where)){
        foreach ($where as $key => $value) {
            $builder->where($key,$value);
        }
      }

      if(!empty($group)){
          $builder->groupBy($group);
      }

      return $builder->countAllResults();
  }

}
