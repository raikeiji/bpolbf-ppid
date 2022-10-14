<?php

namespace App\Controllers;
use App\Libraries\Encript;
class Home extends ResController
{

	public function __construct(){
		$this->language 	= \Config\Services::language();
		$this->session 		= \Config\Services::session();

		$this->encript 		= new Encript();
		$email = \Config\Services::email();

	}

	public function index()
	{
		$data=[
			'title'=>$this->init->getSetting('title'),
		];
		$this->init->generate('index',$data);
	}

	public function filter_image($file=''){
        $info = strtolower(mime_content_type($file));
        if($info === 'image/jpeg' ||
            $info === 'image/png' ||
            $info === 'image/gif' ||
            $info === 'image/svg+xml' ||
            $info === 'image/tiff' ||
            $info === 'image/bmp' ||
            $info === 'image/pjpeg'){
            return true;
        }else{
            if(file_exists($file)){
              unlink($file);
            }
            return false;
        }
  }

	public function sve(){
			$tmp=@$_FILES[$value->kode_syarat]['tmp_name'];
			if (!empty($tmp) && $this->filter_image($tmp)) {
		// var_dump($_POST['cara_beri'][1]);exit;
				$mail = \Config\Services::email();
				$emails ='joko.uedan@gmail.com';
				$mail->SMTPHost = 'mail.daymarts.id';
				$mail->SMTPUser = 'no-reply@daymarts.id';
				$mail->SMTPPass = 'csteam512@';
				$mail->SMTPCrypto = 'tls';
				$mail->SMTPPort = '587';
				$mail->mailType = 'html';
				$mail->setFrom('no-reply@daymarts.id', 'PPID');
				$mail->setTo($emails);
				$mail->setSubject('Permintaan Informasi');
				$body='<table style="border-collapse: collapse; width: 100%; height: 270px;" border="0">
				<tbody>
				<tr style="height: 18px;">
				<td style="width: 50%; height: 18px;" colspan="2">Nama Sesuai Ktp</td>
				<td style="width: 50%; height: 18px;" colspan="2">Alamat Email</td>
				</tr>
				<tr style="height: 18px;">
				<td style="width: 8.04094%; height: 18px;">&nbsp;</td>
				<td style="width: 41.9591%; height: 18px;">'.$_POST["nama"].'</td>
				<td style="width: 9.01559%; height: 18px;">&nbsp;</td>
				<td style="width: 40.9844%; height: 18px;">'.$_POST["email"].'</td>
				</tr>
				<tr style="height: 18px;">
				<td style="width: 50%; height: 18px;" colspan="2">Kontak</td>
				<td style="width: 50%; height: 18px;" colspan="2">NIK</td>
				</tr>
				<tr style="height: 18px;">
				<td style="width: 8.04094%; height: 18px;">&nbsp;</td>
				<td style="width: 41.9591%; height: 18px;">'.$_POST["telp"].'</td>
				<td style="width: 9.01559%; height: 18px;">&nbsp;</td>
				<td style="width: 40.9844%; height: 18px;">'.$_POST["nik"].'</td>
				</tr>
				<tr style="height: 18px;">
				<td style="width: 50%; height: 18px;" colspan="4">Alamat</td>
				</tr>
				<tr style="height: 18px;">
				<td style="width: 8.04094%; height: 18px;">&nbsp;</td>
				<td style="width: 41.9591%; height: 18px;" colspan="3">'.$_POST["alamat"].'</td>
				</tr>
				<tr style="height: 18px;">
				<td style="width: 50%; height: 18px;" colspan="4">Permintaan Informasi</td>
				</tr>
				<tr style="height: 18px;">
				<td style="width: 8.04094%; height: 18px;">&nbsp;</td>
				<td style="width: 41.9591%; height: 18px;" colspan="3">'.$_POST["info_req"].'</td>
				</tr>
				<tr style="height: 18px;">
				<td style="width: 50%; height: 18px;" colspan="4">Tujuan Informasi</td>
				</tr>
				<tr style="height: 18px;">
				<td style="width: 8.04094%; height: 18px;">&nbsp;</td>
				<td style="width: 41.9591%; height: 18px;" colspan="3">'.$_POST["info_tujuan"].'</td>
				</tr>
				<tr style="height: 18px;">
				<td style="width: 50%; height: 18px;" colspan="2">Cara Mendapatkan</td>
				<td style="width: 50%; height: 18px;" colspan="2">Cara memberikan</td>
				</tr>
				<tr style="height: 18px;">
				<td style="width: 8.04094%; height: 18px;">&nbsp;</td>';
				if(isset($_POST["cara_dapat"][0])){
					$body.='<td style="width: 41.9591%; height: 18px;">'.$_POST["cara_dapat"][0].'</td>';
				}else{
					$body.='<td style="width: 8.04094%; height: 18px;">&nbsp;</td>';
				}
				$body.='<td style="width: 9.01559%; height: 18px;">&nbsp;</td>';
				if(isset($_POST["cara_beri"][0])){
					$body.='<td style="width: 41.9591%; height: 18px;">'.$_POST["cara_beri"][0].'</td>';
				}else{
					$body.='<td style="width: 8.04094%; height: 18px;">&nbsp;</td>';
				}
				$body.='</tr>
				<tr style="height: 18px;">
				<td style="width: 8.04094%; height: 18px;">&nbsp;</td>';
				if(isset($_POST["cara_dapat"][1])){
					$body.='<td style="width: 41.9591%; height: 18px;">'.$_POST["cara_dapat"][1].'</td>';
				}else{
					$body.='<td style="width: 8.04094%; height: 18px;">&nbsp;</td>';
				}
				$body.='<td style="width: 9.01559%; height: 18px;">&nbsp;</td>';
				if(isset($_POST["cara_beri"][1])){
					$body.='<td style="width: 41.9591%; height: 18px;">'.$_POST["cara_beri"][1].'</td>';
				}else{
					$body.='<td style="width: 8.04094%; height: 18px;">&nbsp;</td>';
				}

				$body.='</tr>
				<tr style="height: 18px;">
				<td style="width: 8.04094%; height: 18px;">&nbsp;</td>';
				if(isset($_POST["cara_dapat"][2])){
					$body.='<td style="width: 41.9591%; height: 18px;">'.$_POST["cara_dapat"][2].'</td>';
				}else{
					$body.='<td style="width: 8.04094%; height: 18px;">&nbsp;</td>';
				}
				$body.='<td style="width: 9.01559%; height: 18px;">&nbsp;</td>';
				if(isset($_POST["cara_beri"][2])){
					$body.='<td style="width: 41.9591%; height: 18px;">'.$_POST["cara_beri"][2].'</td>';
				}else{
					$body.='<td style="width: 8.04094%; height: 18px;">&nbsp;</td>';
				}
				$body.='</tr>
				<tr style="height: 18px;">
				<td style="width: 8.04094%; height: 18px;">&nbsp;</td>';
				if(isset($_POST["cara_dapat"][3])){
					$body.='<td style="width: 41.9591%; height: 18px;">'.$_POST["cara_dapat"][3].'</td>';
				}else{
					$body.='<td style="width: 8.04094%; height: 18px;">&nbsp;</td>';
				}
				$body.='<td style="width: 9.01559%; height: 18px;">&nbsp;</td>';
				if(isset($_POST["cara_beri"][3])){
					$body.='<td style="width: 41.9591%; height: 18px;">'.$_POST["cara_beri"][3].'</td>';
				}else{
					$body.='<td style="width: 8.04094%; height: 18px;">&nbsp;</td>';
				}
				$body.='</tr>
				</tbody>
				</table>';
				// $files = $_FILES['file']['tmp_name'];
				// $upload=$this->init->upload('gambar','image',$_POST["nik"],'berita','insert');
				// $pesan=json_decode($upload);
				// var_dump($pesan);exit;
				if (move_uploaded_file($_FILES['file']['tmp_name'],'writable/uploads/2021/11/'. $_FILES["file"]['name'])) {
    			// echo "Uploaded";
				} else {
				   // echo "File not uploaded";
				}
// exit;
				$mail->attach('writable/uploads/2021/11/'. $_FILES["file"]['name']);
				$mail->setMessage($body);
				$mail->send();
				$info=[
					'status'=>true,
					'msg'=>'Terimakasih anda sudah mengirimkan permintaan informasi kepada kami'
				];
			}else{
				$info=[
					'status'=>false,
					'msg'=>'Lampiran yang anda masukan tidak sesuai dengan format lampiran yang benar'
				];
			}
			echo json_encode($info);
	}
	public function get_header(){
		$query=$this->db->table('header_link')
										->where('deleted','N')
										->orderBy('id','asc')
										->limit(4)
										->get();
		return $query;
	}


	public function download(){
		$filepath=$this->request->getPost('file');
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($filepath));
		readfile($filepath);
		exit;
	}

	public function subscribe(){
			$validation =  \Config\Services::validation();
			$validasi=array(
					'widget-subscribe-form-email'=>'required|string',
			);
			$validation->setRules($validasi);
			$validate = $validation->withRequest($this->request)->run();
			if($validate){
				$email=$this->request->getPost('widget-subscribe-form-email');
				$cek=$this->db->table('subscribe')
											->where('email',$email)
											->get();
				if($cek->getNumRows()){
					$info=[
						'status'=>'warning',
						'message'=>'Alamat email sudah terdaftar'
					];
				}else{
					$data=[
							'email'=>$email,
							'created'=>date('Y-m-d H:i:s'),
							'updated'=>date('Y-m-d H:i:s'),
							'deleted'=>'N'
					];
					$insert=$this->db->table('subscribe')->insert($data);
					if($insert){
							$info=[
									'response'=>'success'
							];
					}else{
							$info=[
									'response'=>'warning',
									'message'=>'Tidak dapat menyimpan ke database'
							];
					}
				}
			}else{
				$info=[
					'response'=>'warning'
				];
			}
			echo json_encode($info);
	}

	public function pages(){
			$page=$this->request->uri->getSegment(3);
			$page=str_replace('-',' ',str_replace('.html','',$page));
			$query=$this->db->table('menu a,pages b,page_content c')
											->select('a.id_menu,c.bg,b.id_pages,b.tipe,b.filename,c.lebar,a.menu_name,c.type_pages,c.id_content as jenis,c.type_column')
											->where('a.id_menu','b.id_menu',false)
											->where('b.id_pages','c.id_pages',false)
											->where('a.menu_name',$page)
											->where('a.deleted','N')
											->get();
			$data=[];
			if($query->getNumRows() < 1){
				return redirect()->to(base_url('home/pages/beranda.html'));
			}else{
					if($query->getNumRows() && $query->getRow()->tipe=='custom'){
							$this->init->generate($query->getRow()->filename);
					}else{
							foreach ($query->getResult() as $key => $value) {
									$content=[];
									if($value->type_pages=='dynamic'){
											$cek=$this->db->table('content')
																		->where('category',$value->jenis)
																		->where('publish','Y')
																		->get();
											foreach ($cek->getResult() as $keys => $values) {
													$content[]=[
															'id_content'=>$values->id_content,
															'title'=>$values->title,
															'bg'=>$values->bg,
															'type'=>$values->tipe,
															'category'=>$values->category,
															'content'=>$values->content,
															'publish'=>$values->publish,
															'created'=>$values->created
													];
											}
									}else{
											$cek=$this->db->table('content')
																		->where('id_content',$value->jenis)
																		->where('publish','Y')
																		->get();
											$res=$cek->getRow();
											$content[]=[
													'id_content'=>$res->id_content,
													'title'=>$res->title,
													'bg'=>$res->bg,
													'type'=>$res->tipe,
													'category'=>$res->category,
													'content'=>$res->content,
													'publish'=>$res->publish,
													'created'=>$res->created
											];
									}
									$data[]=[
											'id'=>$value->id_menu,
											'menu'=>$value->menu_name,
											'tipe'=>$value->type_pages,
											'jenis'=>$value->jenis,
											'kolom'=>$value->type_column,
											'lebar'=>$value->lebar,
											'bg'=>$value->bg,
											'content'=>$content
									];
							}
							$this->init->no_slider('pages',['data'=>$data]);
					}
				}
	}

	public function valid_email($email) {
	    return !filter_var($email, FILTER_VALIDATE_EMAIL);
	}

	public function set_position(){
			$lat=$this->request->getPost('lat');
			$long=$this->request->getPost('long');

			$this->session->set('lat',$lat);
			$this->session->set('long',$long);

			$info=array(
					'status'=>true,
					'msg'=>'Thanks for allowing geolocation to get accuracy store'
			);
			echo json_encode($info);
	}

	public function logout(){
			$logout=$this->session->remove('logged_in');
			if($this->request->isAJAX()){
					if($logout){
						$info=[
								'status'=>true
						];
					}else{
						$info=[
								'status'=>false
						];
					}
					echo json_encode($info);
			}else{
					return redirect()->to(base_url('home/pages/beranda.html'));
			}
	}

	public function get_toko(){
		$query=$this->db->table('member')
										->select('id_member,nama_usaha,alamat_usaha,foto')
										->where('jabatan','pemilik')
										->where('deleted','N')
										->limit(15)
										->get();
		return $query;
	}
	public function get_product(){
		$query=$this->db->table('stok_produk a,produk b')
								->select('a.id_stok,a.id_member,a.kode_produk,a.diskon,a.stok,a.harga_jual,b.nama_barang,b.gambar_utama,(select nama_usaha from member where id_member=a.id_member) as toko')
								->where("a.kode_produk=b.kode_barang")
								->where('a.flag','2')
								->where('a.deleted','N')
								->groupBy('a.id_member')
								->limit(15)
								->get();
			return $query;

	}

	public function search_lokasi(){
			$key=$this->request->getPost('key');
			$query=$this->db->table('member')
											->select('propinsi,kabupaten,kecamatan,kelurahan')
											->like('propinsi',$key)
											->orLike('kabupaten',$key)
											->orLike('kecamatan',$key)
											->orLike('kelurahan',$key)
											->groupBy('kelurahan')
											->limit(20)
											->get();
			$data=[];
			foreach ($query->getResult() as $key => $value) {
					$data[]=[
							'propinsi'=>$value->propinsi,
							'kabupaten'=>$value->kabupaten,
							'kecamatan'=>$value->kecamatan,
							'kelurahan'=>$value->kelurahan
					];
			}
			echo json_encode($data);
	}
	public function search(){
			$key=$this->request->getGet('search');
			$key=str_replace('+',' ',$key);
			$select="id_member,nama_usaha,alamat_usaha,foto";
			$table="member";
			$join="";
			$where=[
				'deleted'=>'N'
			];
			$search=[
				'kelurahan'=>$key
			];
			$group="";
			$limit=20;
			$start=$page=$this->request->getGet('page');
			$query=$this->pagging->query($select,$table,$join,$where,$group,$limit,$start,$search);
			$data=[
					'status'=>true,
					'toko'=>$query
			];
			$this->init->generate('store',$data);
	}

	public function search_store(){
			$key=$this->request->getPost('key');
			$query=$this->db->table('member')
											->select('id_member,nama_usaha,kabupaten_usaha,kecamatan_usaha')
											->like('nama_usaha',$key)
											->groupBy('kecamatan_usaha')
											->limit(20)
											->get();
			$data=[];
			foreach ($query->getResult() as $key => $value) {
					$data[]=[
							'id'=>$value->id_member,
							'kabupaten'=>$value->kabupaten_usaha,
							'kecamatan'=>$value->kecamatan_usaha,
							'nama'=>$value->nama_usaha
					];
			}
			echo json_encode($data);
	}

	public function get_partner(){
		$query=$this->db->table('partner')
									->get();
									return $query;

	}

}
