<?php

namespace App\Controllers\Bajocontrol;

class Home extends ResController
{

	public function index()
	{
		$this->init->generate_admin('admin/welcome_message');
	}

}
