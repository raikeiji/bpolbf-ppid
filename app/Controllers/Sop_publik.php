<?php

namespace App\Controllers;
use App\Libraries\Encript;
class Sop_publik extends ResController
{

	public function __construct(){
		$this->language 	= \Config\Services::language();
		$this->session 		= \Config\Services::session();

		$this->encript 		= new Encript();
	}

	public function index()
	{

		$this->init->no_slider('sop_publik');
	}


}
