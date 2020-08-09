<?php 
include "inc/conn.php";
include "inc/function.php";

$id = $_POST['id'];
$name = $_POST['name'];
$telephone = $_POST['telephone'];
$sql="update IGNORE bom_tb_member set m_name = '".$name."', m_phone = '".$telephone."' where m_id='".$id."' ";
$query = sql_query($sql);

$data  = array(
		'msg' => "บันทึกเสร็จสมบูรณ์",
		'status' => "true",
	);


echo json_encode($data);


 ?>