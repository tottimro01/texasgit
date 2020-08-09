<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 
require('inc/conn.php');  
require('inc/function.php');  
include("geoiploc.php"); // Must include this

if($_SESSION["aid"]==""){
@session_start(); 
@session_destroy();
  echo"<script language='JavaScript'>
     top.document.location='index.php';
  </script>";
   exit();
}


################OPEN BET maintenance 
$url_file="json/maintenance.json";  
$mm_js=file_get_contents2($url_file);
$jsmm = json_decode($mm_js, true);
if($jsmm["open"]==0){

@session_start(); 
@session_destroy();
  #กำลังอยู่ในการ ซ่อมบำรุง ประมาน 45 นาที
      echo"<script language='JavaScript'>
         top.document.location='maintenance.html';
      </script>";
    exit(); 

}



#############################ลบเกินเวลา
$del_over=time()-(60);
$url_file="json/login/*.json";    
$files = @glob($url_file); // get all file names
foreach($files as $file){ // iterate files
  $file_time=filemtime($file);
  if($file_time<$del_over){
    if(@is_file($file)){
       @unlink($file); // delete file 
   }
  }
}  
#############################ลบเกินเวลา 

$fo="json/login/aid_".$_SESSION["aid"].".php";
$fo_online = "json/online/r/aid_".$_SESSION["aid"].".json";

echo $fo;

if(!file_exists($fo)){
  @session_start(); 
  @session_destroy();
    echo"<script language='JavaScript'>
      top.document.location='index.php';
      </script>";
    exit();
}
        
@require_once($fo);


$ip = _bIP();
$ipe = @explode(",",_bIP());
$ipc=$ipe[0];

if($ipe[0]==$ipe[1]){
  $ip =$ipe[0]; 
}

$location=getCountryFromIP($ipc, " NamE ");

$jst1=array();
$jst1[]=array("o_time"=>"$time_stam","o_date"=>"".date("Y-m-d H:i:s",$time_stam)."","o_type"=>"","a_id"=>"$_SESSION[aid]","o_ip"=>"$ip","o_location"=>"$location");
$txt44=json_encode($jst1);

$url_file = $fo_online;
write($url_file ,$txt44,"w+"); 


if($_SESSION["a_token"]!=$a_token){  // login ซ้อน เด้งออกจากระบบ

@session_start(); 
@session_destroy();
      echo"<script language='JavaScript'>
    alert('มีผู้ใช้งานมากกว่า 1 คน');
      top.document.location='index.php';
      </script>";
}

?>