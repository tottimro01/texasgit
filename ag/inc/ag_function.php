<?php 
require('conn_dd.php');


function removeComma($str)
{
  $res =  preg_replace('/[^\d.]/', '', $str);
  return $res;
}

function checkUrlRequest()
{ 
  $url = $_SERVER['HTTP_REFERER'];
  $parse = parse_url($url);
  $res = true;
  if($parse['host'] == $site_agent[0] || $url == "")
  {
    $res = true; 
  }else {   
     $res = false;
  }

  return $res;
}


function addCommas($var)
{
  $tmp = explode('.', $var);
  $digit = 0;
    if(count($tmp)>1){
        $digit = strlen($tmp[1]);
    }
  return number_format($var, $digit);
  
}

function warningInput($tab,$message,$id_iuput)
{
  $data  = array(
    'msg'     =>  $message,
    'status'  =>  false,
    'warningInput' => true,
    'tab'  =>  $tab,
    'id'  =>  $id_iuput,
  );
  echo json_encode($data);
  exit();
}

?>