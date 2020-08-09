<? 

header("Content-type: text/json");     
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);

if($_POST[m_id]==""){exit();}
require('../inc/conn.php');
require('../inc/function.php');

$rs = sql_array("select * from bom_tb_member where m_id = $_POST[m_id]");

$num = sql_array("select * from bom_tb_keycode where keycode_id = 1");

/*$url_file="keycode/keycode.json";	
$lot6_js=file_get_contents2($url_file);
$num = json_decode2($lot6_js, true);*/


$arrn = array();
$arrn["token"] = md5($rs["m_token"]);
//$arrn["mid"] = $_SESSION[m_id];
$arrn["hash"] = bee_encode($_POST[m_id] , $num);
//$arrn["hashx"] = bee_encode($_SESSION[m_id] , $numx);
echo json_encode($arrn);
?>