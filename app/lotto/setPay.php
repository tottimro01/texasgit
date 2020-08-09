<?
require('../inc/conn.php');

$mid = $_POST["mid"];
if($_POST[zone]==""){$_POST[zone]=1;}
if($_POST[rob]==""){$_POST[rob]=1;}
$zone=$_POST[zone];
$rob=$_POST[rob];
$val=$_POST[val];



$arr = array();

if($zone==1){
	$sql="update bom_tb_member set m_lotto_setbet='$val' where m_id = '$mid'";
}else{
	$sql="update bom_tb_member set m_lotto_hun_setbet='$val' where m_id = '$mid'";
}
        
		$re=sql_array($sql);
	
	$arr["Status"] = "1";
	$arr["Licen"] = "SC";

	
	echo json_encode($arr);
	exit();
?>