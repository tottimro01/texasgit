<?php require('inc_head_bySession.php'); ?>
<?php 
$data = array();

if($_POST[rob]==""){
	$_POST[rob] = 1;
}

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


	


echo json_encode($data);
 ?>