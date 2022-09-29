<?php
namespace App\Libraries;

Class Encript{
  public function random($jml=4){
    $result = '';
    for($i = 0; $i < $jml; $i++) {
        $result .= mt_rand(0, 9);
    }
    return $result;
  }

  /**
  *@param $sync_string string type
  */
   public function b64_encode($sync__string){
      $sync__rand = $this->random();
      $sync__data = str_replace("=","#",base64_encode($sync__rand.$sync__string));
      $sync__data = strrev($sync__data);
      return $sync__data;
  }




  /**
  *@param $string to decode base64_decode
  *@return string data
  */
   public function b64_decode($sync__string){
      $string = strrev($sync__string);
      $string = base64_decode($string);
      $string = substr(str_replace("#","=",$string),5);

      return $string;
  }




  /**
  *@param $string data to hash
  *@return string data hash
  *@return hash string to hexa char
  */
   public function str2hex($sync__string){
      $hex = '';
      for ($i=0; $i<strlen($sync__string); $i++){
          $ord = ord($sync__string[$i]);
          $hexCode = dechex($ord);
          $hex .= substr('0'.$hexCode, -2);
      }
      return strToUpper($hex);
  }

  /**
  *@param $hex string to decode
  *@return string data has been decode
  *@return string data who has to decode
  */
   public function hex2str($hex){
      $sync__string='';
      for ($i=0; $i < strlen($hex)-1; $i+=2){
          $sync__string .= chr(hexdec($hex[$i].$hex[$i+1]));
      }
      return $sync__string;
  }

  public function md5_hash($string){
      $string = sha1(md5($string));
      $key    = sha1($string);
      $string = strrev($string.':'.$key);

      return $string;
  }


  /**
  *@param string to encode
  *@return string encode
  */
   public function md5_chash($string){
      $chars="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
      $chars1="a&B0c!D1e#";
      $keychar=str_split($chars1);
      $char=str_split($chars);
      $jml=strlen($string);
      $keys=$char[$jml];
      $rnd=$this->random($jml);
      $utama=$this->get_rnd(70-(strlen($string)+$jml+2));
      $str=str_split($rnd);
      $jump=str_split($string);
      $np='';
      foreach ($str as $key => $value) {
          $np.=$keychar[$value];
      }
      $nd='';
      foreach ($jump as $key=>$val) {
        $utama=substr_replace(strrev($utama),$val,$str[$key],0);
        $nd.=$str[$key];
      }
      $utama=substr_replace($utama,$keys.'$',rand(5,56),0);
      $utama=substr_replace($utama,$np,$jml,0);
      $utama=substr_replace(strrev($utama),':',rand(11,59),0);
      $result = strrev($utama);
      return $result;
  }

  public function md5_dhash($param){
      $chars="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
      $chars1="a&B0c!D1e#";
      $keychar=str_split($chars1);
      $char=str_split($chars);
      $kunci=explode('$',$param);
      $ind=substr($kunci[0],-1,1);
      $posisi=array_search($ind,$char);
      $utama=str_replace(':','',$param);
      $kombinasi=substr($param,$posisi,$posisi);
      $utama=str_replace($kombinasi,'',$utama);
      $utama=str_replace($ind.'$','',$utama);
      $kombinasi=strrev($kombinasi);
      $string=str_split($kombinasi);
      $np='';
      foreach ($string as $key => $value) {
          $np.=array_search($value,$keychar);
      }
      $np=str_split($np);
      $n='';$s='';
      foreach ($np as $key => $value) {
          $n.=substr($utama,$value,1);
          $s=substr($utama,$value,1);
          $utama=substr_replace($utama,'~',$value,0);
          $utama=str_replace('~'.$s,'',$utama);
          $utama=strrev($utama);
      }
      return strrev($n);
  }


  public function sth($sync__string){
    $hex = '';
    for ($i=0; $i<strlen($sync__string); $i++){
        $ord = ord($sync__string[$i]);
        $hexCode = dechex($ord);
        $hex .= substr('0'.$hexCode, -2);
    }
    return strToUpper($hex);
  }


   public function get_rnd($length = 10) {
      $characters = 'ZaYbXcWdVeUfTgShR(i&Q%j@P0k8O6l4N2m1M3n5L7o9K!p#J^q*I)rHsGtFuEvDwCxByAz';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString;
  }


  /**
  * global encode format
  *@param string
  *@return string
  */


  public function g_encode($string){
        $st= rand(111,999);
        for($a=1;$a<=3;$a++){
            $string = strrev(base64_encode($string.''.$st));
        }
        // return $string;
        $hex = '';
        for ($i=0; $i<strlen($string); $i++){
            $ord = ord($string[$i]);
            $hexCode = dechex($ord);
            $hex .= substr('0'.$hexCode, -2);
        }
        return $this->get_rnd(5).base64_encode($hex);
  }

   public function g_decode($string){
       $string = base64_decode(substr($string,5));
       $str    ='';
       for ($i=0; $i < strlen($string)-1; $i+=2){
           $str .= chr(hexdec($string[$i].$string[$i+1]));
       }
       $stra   =base64_decode(substr(strrev(base64_decode(strrev($str))),3));
       $rts    = base64_decode(substr(strrev($stra),3));
       $strs   = substr($rts,0,(strlen($rts)-3));
       return $strs;
   }
   public function g_decode_v1($string){
       $string = base64_decode(substr($string,5));
       $str    ='';
       for ($i=0; $i < strlen($string)-1; $i+=2){
           $str .= chr(hexdec($string[$i].$string[$i+1]));
       }
       $stra   =base64_decode(substr(strrev(base64_decode(strrev($str))),3));
       $rts    = base64_decode(substr(strrev($stra),3));
       $strs   = substr($rts,0,(strlen($rts)-3));
       return $strs;
   }

   function url_encode($string){
      $characters = 'aA1bB2cC3dD4eE5fF6gG7hH8iI9jJ0kK1lL2mM3nN4oO5pP6qQ7rR8sS9tT0uU1vV2wW3xX4yY5zZ6';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < 2; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      $string = base64_encode($string);
      $string = strrev($string);
      $string = $randomString.base64_encode($string);
      $hex    = '';
      for ($i=0; $i<strlen($string); $i++){
          $ord      = ord($string[$i]);
          $hexCode  = dechex($ord);
          $hex      .= substr('0'.$hexCode, -2);
      }
      return $randomString.$hex;
  }



  /**
  *global decode format
  *@param string
  *@return string
  */
   function url_decode($string){
      $str='';$string=substr($string,2);
      for ($i=0; $i < strlen($string)-1; $i+=2){
          $str .= chr(hexdec($string[$i].$string[$i+1]));
      }
      $str    = base64_decode(substr($str,2));
      $string = strrev($str);
      return base64_decode($string);
  }


}

 ?>
