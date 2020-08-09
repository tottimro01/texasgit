<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>

<?php 
require('../inc/conn.php');	
require('../inc/function.php');	
include("geoiploc.php"); // Must include this

if($_SESSION["rid"]==""  and $_SESSION["uu_id"]==""){
@session_start(); 
@session_destroy();
	echo"<script language='JavaScript'>
     top.document.location='index.php';
	</script>";
	  exit();
}

################OPEN BET maintenance 
$url_file="../json/maintenance.json";	
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

// #############################ลบเกินเวลา
// $del_over=time()-(30);
// $url_file="../json/online/m/*.json";		
// $files = @glob($url_file); // get all file names
// foreach($files as $file){ // iterate files
// $file_time=filemtime($file);
// if($file_time<$del_over){
//   if(@is_file($file)){
// 	   @unlink($file); // delete file 
//  }
// }
//  }  
//  #############################ลบเกินเวลา 
 
 	#############################ลบเกินเวลา
$del_over=time()-(60);
$url_file="../json/online/r/*.json";		
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
 

####################################
if($_SESSION["uu_use"]==0){
	$fo="../json/login/rid_".$_SESSION["rid"].".php";
	$fo_online = "../json/online/r/rid_".$_SESSION["rid"].".json";	
}else{
	$fo="../json/login/ridu_".$_SESSION["u_id"].".php";
	$fo_online = "../json/online/r/ridu_".$_SESSION["u_id"].".json";	
}
		
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
/*
$sql="INSERT IGNORE INTO bom_tb_online (o_time, o_date,	o_type,	m_id,	r_agent_id, o_ip,o_location) values('".time()."',now(),'$_SESSION[r_level]','$_SESSION[rid]','$_SESSION[r_agent_id]','$ip','$location')";
sql_query($sql);
$del_time=time()-60;
$sql="delete from bom_tb_online where o_time<'$del_time' ";
sql_query($sql);
*/
$jst1=array();
$jst1[]=array("o_time"=>"$time_stam","o_date"=>"".date("Y-m-d H:i:s",$time_stam)."","o_type"=>"".$_SESSION["r_level"]."","m_id"=>"$_SESSION[rid]","r_agent_id"=>"$_SESSION[r_agent_id]","o_ip"=>"$ip","o_location"=>"$location");
$txt44=json_encode($jst1);




// $url_file="../json/online/r/".$_SESSION["rid"].".json";	
$url_file = $fo_online;
write($url_file ,$txt44,"w+"); 


if($_SESSION["rtoken"]!=$m_token){  // login ซ้อน เด้งออกจากระบบ

@session_start(); 
@session_destroy();
      echo"<script language='JavaScript'>
	  alert('มีผู้ใช้งานมากกว่า 1 คน');
      top.document.location='index.php';
      </script>";
	}

?>	

