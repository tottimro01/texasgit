<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('inc/conn.php');	
require('inc/function.php');	
include("geoiploc.php"); // Must include this

// check maintenance
$config = getMaintenance();
if($config['con_service'] != 1){
  	echo"<script language='JavaScript'> top.document.location='maintenance.php';</script>";
	exit();
}
// check maintenance

if(($_SESSION['m_id'] == '') || (!isset($_SESSION['m_id']))){
@session_start(); 
@session_destroy();
echo"<script language='JavaScript'> top.document.location='login.php';</script>";
exit();
	}
	
	
	
################OPEN BET maintenance 
$url_file="json/maintenance.json";	
$mm_js=file_get_contents2($url_file);
$jsmm = json_decode2($mm_js, true);
if($jsmm["open"]==0){

@session_start(); 
@session_destroy();
  #กำลังอยู่ในการ ซ่อมบำรุง ประมาน 45 นาที
      echo"<script language='JavaScript'>
         top.document.location='maintenance.php';
      </script>";
	 	exit(); 

	}


	####################################
$fo="json/login/".$_SESSION['m_id'].".php";


if(!file_exists($fo)){
@session_start(); 
@session_destroy();
  
      echo"<script language='JavaScript'>
	
      top.document.location='login.php';
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
$jst1[]=array("o_time"=>"$time_stam","o_date"=>"".date("Y-m-d H:i:s",$time_stam)."","o_type"=>"5","m_id"=>$_SESSION['m_id'],"r_agent_id"=>$_SESSION['r_agent_id'],"o_ip"=>"$ip","o_location"=>"$location");
$txt44=json_encode($jst1);
$url_file="json/online/m/".$_SESSION['m_id'].".json";		
write($url_file ,$txt44,"w+"); 

#############################ลบเกินเวลา
$del_over=time()-(30);
$url_file="json/online/m/*.json";		
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

if($_SESSION['mtoken']!=$m_token){

@session_start(); 
@session_destroy();
  
       echo"<script language='JavaScript'> top.document.location='login.php';</script>";
	 	exit(); 
	  
}

#  alert('มีผู้ใช้งานมากกว่า 1คน.');

?>