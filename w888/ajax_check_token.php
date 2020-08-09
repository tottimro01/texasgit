<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<? 
if($_SESSION[m_id]==""){exit();}
require('inc/conn.php');
require('inc/function.php');

$rs = sql_array("select m_id , m_token , m_update_count from bom_tb_member where m_id = '".$_SESSION['m_id']."' ");

$num = sql_array("select * from bom_tb_keycode where keycode_id = 1");

/*$url_file="keycode/keycode.json";	
$lot6_js=file_get_contents2($url_file);
$num = json_decode2($lot6_js, true);*/

$arrn = array();


####################ระบบฝากถอน อัพเดท
if($rs['m_update_count']==1){
	$arrn["muc"] = 1;

	$sql="update IGNORE bom_tb_member set  m_update_count='0'  where m_id='".$_SESSION['m_id']."'";
	sql_query($sql);
 }else{
 	$arrn["muc"] = 0;
 }


$arrn["token"] = md5($rs["m_token"]);
//$arrn["mid"] = $_SESSION[m_id];
$arrn["hash"] = bee_encode($_SESSION['m_id'] , $num);
//$arrn["hashx"] = bee_encode($_SESSION[m_id] , $numx);
echo json_encode($arrn);
?>