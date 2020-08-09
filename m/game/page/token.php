<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
require('../../../inc/conn.php');	
require('../../../inc/function.php');	
include("../../../geoiploc.php"); // Must include this

if($_SESSION['mid']==""){
@session_start(); 
@session_destroy();
	
	echo"<script language='JavaScript'>
     top.document.location='../index.php';
	</script>";
	exit();
	}



################OPEN BET maintenance 
$url_file="../../../json/maintenance.json";	
$mm_js=file_get_contents2($url_file);
$jsmm = json_decode2($mm_js, true);
if($jsmm["open"]==0){

@session_start(); 
@session_destroy();
  #กำลังอยู่ในการ ซ่อมบำรุง ประมาน 45 นาที
      echo"<script language='JavaScript'>
          top.document.location='../index.php';
      </script>";
	 	exit(); 

	}
	

	####################################
$fo="../../../json/login/$_SESSION[mid].php";
@require_once($fo);





$ip = _bIP();
$location=getCountryFromIP($ip, " NamE ");
/*
$sql="INSERT IGNORE INTO bom_tb_online (o_time, o_date,	o_type,	m_id,	r_agent_id, o_ip,o_location) values('".time()."',now(),5,'$_SESSION[mid]','$_SESSION[r_agent_id]','$ip','$location')";
sql_query($sql);
$del_time=time()-60;
$sql="delete from bom_tb_online where o_time<'$del_time' ";
sql_query($sql);
*/
$jst1=array();
$jst1[]=array("o_time"=>"$time_stam","o_date"=>"".date("Y-m-d H:i:s",$time_stam)."","o_type"=>"5","m_id"=>"$_SESSION[mid]","r_agent_id"=>"$_SESSION[r_agent_id]","o_ip"=>"$ip","o_location"=>"$location");
$txt44=json_encode($jst1);
$url_file="../../../json/online/m/".$_SESSION[mid].".json";		
write($url_file ,$txt44,"w+"); 

#############################ลบเกินเวลา
$del_over=time()-(30);
$url_file="../../../json/online/m/*.json";		
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
  
      echo"<script language='JavaScript'>
       top.document.location='../index.php';
      </script>";
	 	exit(); 
	  
}


?>