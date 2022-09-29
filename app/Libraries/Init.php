<?php
namespace App\Libraries;

Class Init{

  public function __construct(){
      $this->db         = \Config\Database::connect();
      $this->session    = \Config\Services::session();
      $this->request 		= \Config\Services::request();
      $this->language 	= \Config\Services::language();
      $validation =  \Config\Services::validation();
      $this->uri        = new \CodeIgniter\HTTP\URI();
      $this->encript 		= new Encript();
      $this->set_dir();
      $supportLang = ['id', 'en'];
  		$language=$this->request->getGet('lang');
  		$this->session = session();
  		if($language){
  	    $this->session->remove('web_lang');
  	    $this->session->set('web_lang',$language);
  			$this->language->setLocale($language);
  		}else{
        if($this->session->get('web_lang')){
        $this->language->setLocale($_SESSION['web_lang']);
      }else{
        $this->session->set('web_lang','id');
      }
  		}

      $this->get_visitor();
      header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
      header("Cache-Control: no-cache");
      header("Pragma: no-cache");

  }

  public function set_dir(){
    if(is_dir('public/uploads/'.date('Y'))){
        if(!is_dir('public/uploads/'.date('Y/m'))){
            mkdir('public/uploads/'.date('Y/m'),0777, true);
            mkdir('public/uploads/'.date('Y/m/').'tumb',0777, true);
        }
    }else{
        mkdir('public/uploads/'.date('Y'),0777, true);
        mkdir('public/uploads/'.date('Y').'/'.date('m'),0777, true);
        mkdir('public/uploads/'.date('Y').'/'.date('m').'/tumb',0777, true);
    }
  }


  public function generate($file,$content=[]){
      $title=[
          'title'=>$this->getSetting('app_name'),
          'prop'=>$this->get_prop()
      ];

      $data = [
              'header'=> view('template/header',$title),
              'head'=> view('template/head',['menu'=>$this->menu()]),
              'slider'=> view('template/slider'),
              'content'=> view($file,$content),
              'footer'=> view('template/footer',$title),
              'footerjs'=> view('template/footerjs')
      ];
      echo view('template/media',$data);
  }

  public function no_slider($file,$content=[]){
      $title=[
          'title'=>$this->getSetting('app_name'),
          'prop'=>$this->get_prop(),
          'page_title'=>$this->get_attr()
      ];
      $data = [
              'header'=> view('template/header',$title),
              'head'=> view('template/head',['menu'=>$this->menu()]),
              'slider'=>'',
              'content'=> view($file,$content),
              'footer'=> view('template/footer'),
              'footerjs'=> view('template/footerjs')
      ];
      echo view('template/media',$data);
  }

  public function get_attr(){
    $url=$this->request->uri->getSegments(1);
    $query=$this->db->table('menu')
                    ->where('url',$url)
                    ->get();
    if($query->getNumRows()){
      $res=$query->getRow();
      $page=[];
      if($res->parent_id > 0){
        $cek=$this->db->table('menu')
                      ->where('id_menu',$res->parent_id)
                      ->get();
        $result=$cek->getRow();
        $parent=$result->menu_name;
        $page=[
          'parent'=>$parent,
          'child'=>$res->menu_name
        ];
      }else{
        $page=[
          'parent'=>'',
          'child'=>$res->menu_name
        ];
      }
      return $page;
    }else{
      return false;
    }
  }

	public function nologin($file,$content=[]){
			$title=[
					'title'=>$this->getSetting('app_name'),
          'prop'=>$this->get_prop(),
          'logged_in'=>false
			];

      $data = [
              'header'=> view('template/header',$title),
              'menu'=> view('template/menu',['menu'=>$this->menu()]),
              'content'=> view($file,$content),
              'footer'=> view('template/footer_login'),
              'footerjs'=> view('template/footerjs')
      ];
      echo view('template/media',$data);
	}

	public function nomenu($file,$content=[]){
			$title=[
					'title'=>$this->getSetting('app_name'),
          'logged_in'=>($this->session->get('logged_in'))?$this->session->get('logged_in'):false
			];

      if($this->session->get('logged_in')){
    			echo view('template/meta',$title);
    			echo view($file,$content);
    			echo view('template/footer');
      }else{
          echo view('template/meta',$title);
          echo view('login',$title);
          echo view('template/footer');
      }
	}

  private function menu($parent=0){
    $data=[];$child=[];
		$builder=$this->db->table('menu a')
								->select('a.id_menu,a.url,a.menu_name,a.parent_id,(select count(*) from menu where parent_id=a.id_menu and deleted="N") as parent')
                ->where('a.parent_id',$parent)
								->where('a.deleted','N')
                ->orderBy('order','asc')
								->get();
		foreach ($builder->getResult() as $key => $value) {
      if($value->parent > 0){
          $data[]=[
              'menu_id'=>$value->id_menu,
              'slug'=>str_replace(' ','-',strtolower($value->menu_name)),
              'menu_name'=>$value->menu_name,
              'parent_id'=>$value->parent_id,
              'url'=>$value->url,
              'child'=>$this->menu($value->id_menu)
          ];
      }else{
          $data[]=[
              'menu_id'=>$value->id_menu,
              'slug'=>str_replace(' ','-',strtolower($value->menu_name)),
              'menu_name'=>$value->menu_name,
              'parent_id'=>$value->parent_id,
              'url'=>$value->url,
              'child'=>$child
          ];
      }
		}
		return $data;
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

  public function get_menu($str){
      $str=explode(',',$str);
      $query=$this->db->table('menu')
                      ->whereIn('id_menu',$str)
                      ->groupBy('id_menu')
                      ->get();
      $data=[];
      foreach ($query->getResult() as $key => $value) {
          $data[]=[
              'id_menu'=>$this->encript->url_encode($value->id_menu),
              'menu_name'=>$value->menu_name,
              'parent_id'=>$value->parent_id
          ];
      }
      return $data;
  }

  private function get_prop(){
      $prop=[
        'copyright'=>$this->getSetting('copyright'),
        'address'=>$this->getSetting('address'),
        'phone'=>$this->getSetting('phone'),
        'negara'=>$this->getSetting('negara'),
        'propinsi'=>$this->getSetting('propinsi'),
        'negara'=>$this->getSetting('negara'),
        'facebook_id'=>$this->getSetting('facebook_id'),
        'facebook'=>$this->getSetting('facebook'),
        'twitter'=>$this->getSetting('twitter'),
        'youtube'=>$this->getSetting('youtube'),
        'instagram'=>$this->getSetting('instagram'),
        'contact_info'=>$this->getSetting('contact_info'),
        'berlangganan'=>$this->getSetting('berlangganan'),
        'berbagai_sektor'=>$this->getSetting('berbagai_sektor'),
        'gambar_peta'=>$this->getSetting('gambar_peta'),
        'destinasi_super_premium'=>$this->getSetting('destinasi_super_premium'),
        'destinasi_bima'=>$this->getSetting('destinasi_bima'),
        'link_about'=>$this->get_menu($this->getSetting('link_about')),
        'investasi'=>$this->get_menu($this->getSetting('investasi')),
        'floratama'=>$this->get_menu($this->getSetting('floratama')),
        'footer'=>$this->getSetting('footer'),
      ];

      return $prop;
  }

  public function getAllSetting(){
      $query=$this->db->table('settings')
                      ->where('deleted','N')
                      ->get();
      return $query->getResult();
  }

  public function generate_admin($file,$content=[]){
      $url=$this->request->uri->getSegment(2);
      $title=[
          'title'=>$this->getSetting('app_name'),
          'aktif'=>$this->get_parent($url),
          'url'=>$this->get_menuid($url),
          'real'=>$url
      ];

      if(session()->get('logged_in')){
          $data = [
                  'meta' => view('admin/template/meta',$title),
                  'header'=> view('admin/template/header'),
                  'sidemenu'=> view('admin/template/menu',['menu'=>$this->menu()]),
                  'content'=> view($file,$content),
                  'footer'=> view('admin/template/footer')
          ];
          echo view('admin/template/media',$data);
      }else{
          echo view('admin/template/meta',$title);
          echo view('admin/login',$title);
          echo view('admin/template/footer');
      }
  }

	public function nomenu_admin($file,$content=[]){
			$title=[
					'title'=>$this->getSetting('app_name')
			];

      if(session()->get('logged_in')){
    			echo view('admin/template/meta',$title);
    			echo view($file,$content);
    			echo view('admin/template/footer');
      }else{
          echo view('admin/template/meta',$title);
          echo view('login',$title);
          echo view('admin/template/footer');
      }
	}

  public function get_parent($menu=''){
    $query=$this->db->table('menu')
                    ->where('url',$menu)
                    ->get();
    if($query->getNumRows()){
      $parent_menu=$query->getRow()->parent_id;
    }else{
      $parent_menu=0;
    }
    return $parent_menu;
  }
  public function get_menuid($menu=''){
    $query=$this->db->table('menu')
                    ->where('url',$menu)
                    ->get();
    if($query->getNumRows()){
      $parent_menu=$query->getRow()->id_menu;
    }else{
      $parent_menu=0;
    }
    return $parent_menu;
  }

  public function make_thumb($src, $dest, $desired_width=134) {

  	/* read the source image */
    $type = exif_imagetype($src);
    $allowedTypes = array(
        1,  // [] gif
        2,  // [] jpg
        3,  // [] png
        6   // [] bmp
    );
    if (!in_array($type, $allowedTypes)) {
        return false;
    }
    switch ($type) {
        case 1 :
            $source_image = imageCreateFromGif($src);
        break;
        case 2 :
            $source_image = imageCreateFromJpeg($src);
        break;
        case 3 :
            $source_image = imageCreateFromPng($src);
        break;
        case 6 :
            $source_image = imageCreateFromBmp($src);
        break;
    }
  	$width = imagesx($source_image);
  	$height = imagesy($source_image);

  	/* find the "desired height" of this thumbnail, relative to the desired width  */
  	$desired_height = floor($height * ($desired_width / $width));

  	/* create a new, "virtual" image */
  	$virtual_image = imagecreatetruecolor($desired_width, $desired_height);

  	/* copy source image at a resized size */
  	imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);

  	/* create the physical thumbnail image to its destination */
  	imagejpeg($virtual_image, $dest);
  }


  public function upload($gambar,$tipe,$id=0,$table='',$param='insert'){
    $max=$this->getSetting('max_size_image');
    // max file size allow
    $image_tipe=$this->getSetting('image_tipe');
    // image tipe
    $image_tipe=explode(',',$image_tipe);

    $file_tipe=$this->getSetting('file_tipe');
    // file tipe
    $file_tipe=explode(',',$file_tipe);

    $file=$this->request->getFile($gambar);

    if($tipe=='image'){
      $file_tipe=$image_tipe;
    }
    // path upload file
    $uploadpath = 'public/uploads/'.date('Y/m/');

    $filename= $file->getName();
    $tempfile = $file->getTempName();
    $filetipe = $file->getMimeType();
    $filesize= $file->getSize('kb');
    if($filesize > $max && $tipe==='image'){
      $info=[
          'status'=>false,
          'msg'=>'Filesize more big than allowed file size system'
      ];
    }elseif(!in_array($filetipe,$file_tipe)){
      $info=[
          'status'=>false,
          'msg'=>'File type you uploaded has block by allowed file tipe '.$filetipe,
          'tipe'=>substr($uploadpath,7).$filename
      ];
    }else{
      if ($file->isValid() && ! $file->hasMoved()) {
        $newName = $file->getRandomName();
        $file->move($uploadpath, $newName);
        $this->make_thumb($uploadpath.$newName,$uploadpath.'tumb/'.$newName);
        // $this->make_tumb($uploadpath.$newName,$uploadpath.'/tumb/');
        if($param !=='insert'){
          $gambar=[
              'doc_name'=>substr($uploadpath,7).$newName,
              'table'=>$table,
              'jenis'=>'image',
              'filesize'=>$filesize,
              'file_tipe'=>$filetipe,
              'updated'=>date('Y-m-d H:i:s'),
              'deleted'=>'N'
          ];
          $this->db->table('arsip')->where('id_page',$id)->update($gambar);
          $info=[
              'status'=>true,
              'msg'=>substr($uploadpath,7).$newName
          ];
        }else{
          $gambar=[
              'id_page'=>$id,
              'doc_name'=>substr($uploadpath,7).$newName,
              'table'=>$table,
              'jenis'=>'image',
              'filesize'=>$filesize,
              'file_tipe'=>$filetipe,
              'created'=>date('Y-m-d H:i:s'),
              'updated'=>date('Y-m-d H:i:s'),
              'deleted'=>'N'
          ];
          $this->db->table('arsip')->insert($gambar);
          $info=[
              'status'=>true,
              'msg'=>substr($uploadpath,7).$newName
          ];
        }
      }
    }
    return json_encode($info);
  }

  public function get_tumb($image=''){
    $string=explode('/',$image);
    $string=end($string);
    $str=str_replace($string,'tumb/'.$string,$image);
    if(file_exists($str)){
      return $str;
    }else{
      return $image;
    }
  }

  public function get_visitor(){
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
              $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
              $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    $date=date('Y-m-d');
    $cek=$this->db->table('pengunjung')
                  ->where('ip_address',$ip)
                  ->where('date(created)',$date)
                  ->get();
    if($cek->getNumRows()){
      $res=$cek->getRow();
      $data=[
        'last_activities'=>date('Y-m-d H:i:s')
      ];
      $this->db->table('pengunjung')->where('id',$res->id)->update($data);
    }else{
      $data=[
        'ip_address'=>$ip,
        'created'=>date('Y-m-d H:i:s'),
        'last_activities'=>date('Y-m-d H:i:s')
      ];
      $this->db->table('pengunjung')->insert($data);
    }
  }

}

 ?>
