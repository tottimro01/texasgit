<?php 

$uid = $_POST["uid"];

$fo="../../json/login/ridu_".$uid.".php";
$fo_online = "../../json/online/r/ridu_".$uid.".json";	
$isDel1 = @unlink($fo);

$data = [];
if($isDel1)
{
	$isDel2 = @unlink($fo_online);
	$data = array(
	    "msg" => "บันทึกเสร็จสมบูรณ์".$delete1.$delete2,
	    'status' => "success"
	);
}else{
	$data = array(
	    "msg" => "ผิดพลาด",
	    'status' => "error"
	);
}

echo json_encode($data);

 ?>