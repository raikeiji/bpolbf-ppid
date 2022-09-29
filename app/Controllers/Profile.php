<?php

namespace App\Controllers;
use App\Libraries\Encript;
class Profile extends ResController
{

	public function __construct(){
		$this->language 	= \Config\Services::language();
		$this->session 		= \Config\Services::session();

		$this->encript 		= new Encript();
	}

	public function index()
	{
		$data=[
			'berita'=>$this->get_section()
		];
		$this->init->no_slider('profile',$data);
	}


public function get_section(){
$query=$this->db->table('profil_ppid')
								->where('id',1)
								->where('deleted','N')
								->get();
								// echo $this->db->getlastQuery();exit;
return $query;
}
}
