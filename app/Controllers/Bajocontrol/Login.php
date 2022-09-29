<?php
namespace App\Controllers\Bajocontrol;

class Login extends ResController
{

	public function index()
	{
    $data['title']=$this->init->getSetting('app_name');
		$this->init->nomenu_admin('admin/login',$data);
		$this->session->destroy();
	}

  public function do_login(){
		$url = 'https://www.google.com/recaptcha/api/siteverify';
		$data = [
			'secret' => "6LcZ99kZAAAAAATCb8eZJVg-QDSUURneLDzHK9Fw",/*your secret key */
			'response' => $this->request->getPost('token'),
			'remoteip' => $_SERVER['REMOTE_ADDR']
		];
		$options = array(
				'http' => array(
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
				'method'  => 'POST',
				'content' => http_build_query($data)
			)
		);

		$context  = stream_context_create($options);
		$response = file_get_contents($url, false, $context);
		$result = json_decode($response, true);

		if ($result['success']) {
			$username=$this->request->getPost('username');
			$password=$this->request->getPost('password');
			$user=$this->encript->g_decode($username);
			$passwd=$this->encript->g_decode($password);
			$pass=$this->encript->md5_hash($passwd);
			if ($this->request->isAJAX()){
					$login = $this->login->set_login($user,$pass);
					if($login){
							$ses=array(
									'logged_in'=>true,
									'id'=>$login['id'],
									'username'=>$login['username'],
									'email'=>$login['email']
							);
							$this->session->set($ses);

							$data=array(
									'status'=>true,
									'msg'=>'Congratultion! You have login successfully'
							);
							return $this->response->setJSON($data);
					}else{
							$data=array(
									'status'=>false,
									'msg'=>'Failed to login, Something wrong with username or password'
							);
							return $this->response->setJSON($data);
					}
			}else{
					$data=array(
							'status'=>false,
							'msg'=>'No ajax header method found'
					);
					return $this->response->setJSON($data);
			}
		}else{
				$info=[
						'status'=>false,
						'msg'=>'Recaptcha is not valid, please reload pages first'
				];
		}
  }

  public function do_logout(){
	    $this->session->destroy();
      $data=array(
          'status'=>true,
          'msg'=>'You have logout successfully'
      );
      return $this->response->setJSON($data);
  }

}
