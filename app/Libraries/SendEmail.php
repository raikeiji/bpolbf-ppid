<?php
namespace App\Libraries;

Class SendEmail{

  public function __construct(){
      $this->db       = \Config\Database::connect();
      $this->uri      = new \CodeIgniter\HTTP\URI();
      $this->request  = \Config\Services::request();
  }

  public function send($email,$subject,$body){
    require "public/plugins/phpmailer/PHPMailerAutoload.php";
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = $this->getSetting('smtp_host');
    $mail->SMTPAuth = true;
    $mail->Username = $this->getSetting('smtp_user');
    $mail->Password = $this->getSetting('smtp_pass');
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom($this->getSetting('smtp_from'), $this->getSetting('smtp_name'));
    $mail->addAddress($email, 'Dear');

    $mail->isHTML(true);

    $mail->Subject = $subject;
    $mail->Body    = $body;

    $send=$mail->send();
    if($send){
        $info=[
            'status'=>true
        ];
    }else{
        $info=[
            'status'=>false
        ];
    }
    echo json_encode($info);
  }

  public function getSetting($param=''){
			$builder=$this->db->table('settings')
											->select('value')
											->where('name',$param)
											->get();
			if($builder->getNumRows()){
					$row=$builder->getRow();
					return $row->value;
			}else{
					return 'result error';
			}
	}

}
