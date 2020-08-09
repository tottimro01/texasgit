<?
require('../inc/conn.php');

	$mid = $_POST["mid"];
	$strPassword = md5($_POST["sPassword"]);
$arr = array();


        $sql="update bom_tb_member set m_pass='$strPassword' where m_id = '$mid'";
		$re=sql_array($sql);
	
	$arr["Status"] = "1";
	$arr["Licen"] = "SC";

	
	echo json_encode($arr);
	exit();
?>