<?php require('inc_head_bySession.php'); ?>
<?php 

	
if($_POST["ac"] == "can")  // ยกเลิกที่เลือก
{
	
}
else if($_POST["ac"] == "can_single")  // ยกเลิกทีละแถว
{

}

$data = [];
	$data = array(
		'status' => true,
		'msg' => "Successfully",
	);


echo json_encode($data);
 ?>