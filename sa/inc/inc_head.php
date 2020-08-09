<?
if($_SESSION[aid]==""){
@session_start(); 
@session_destroy();
	echo"<script language='JavaScript'>
     top.document.location='index.php';
	</script>";
	}
/*	
	#################################hijack
if($_SESSION[u_use]==1){
$foh="../../json/login/hjau_".$_SESSION[u_id].".php";
}else{
$foh="../../json/login/hja_".$_SESSION[aid].".php";	
	}
if(!file_exists($foh)){
     echo "ERROR HJ!!!";
	 exit();
}
@require_once($foh);

echo"<hr>";
$hijack=($_SERVER['REMOTE_ADDR']);
echo"$hijack!=$m_hijack";
echo"<hr>";
function getIP(){
    // ตรวจสอบ IP กรณีการใช้งาน share internet
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }else{
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
echo getIP();
*/
/*
if($hijack!=$m_hijack){ 
@session_start(); 
@session_destroy();
echo"<script>top.document.location='http://sa.".$check_url."';</script>";

     echo "ERROR HJ!!!";
	 exit();
}
*/
#################################hijack


$max_credit=9999999999;
// require('conn.php');
// require('function.php');
require('lang/th.php');
// require('lang/function_th.php');
	
?>