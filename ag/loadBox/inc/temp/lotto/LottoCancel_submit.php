<?php require('inc_head_bySession.php'); ?>
<?php 
$data = array();

if($_POST["ac"] == "can")  // ยกเลิกที่เลือก
{
	foreach ($_POST["ckpro"] as &$value) {
		#	echo $value."<br>";
		$pid=$value;
		include("_inc_cancel.php");
	}
}
else if($_POST["ac"] == "can_single")  // ยกเลิกทีละแถว
{
	$pid=$_POST[pid];
	include("_inc_cancel.php");
}

if(empty($data))
{
	$data = array(
		'status' => false,
		'msg' => $lang_ag[4] ,
	);
}
	


echo json_encode($data);
 ?>