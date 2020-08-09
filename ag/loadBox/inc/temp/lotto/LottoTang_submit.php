<?php
header('Content-type: application/json');
 require('inc_head_bySession.php'); ?>
<?php 



$html_result = '<div style="padding:10px;" id="statussave">'.
							'<b>สมาชิก : aaaa03 [BOM3]</b><br>'.
							'<span class="cb">3บน <b>[ 123 ]</b> = 50 '.$lang_lot[62].' </span><br>'.
							'<span class="cb">3โต๊ด <b>[ 123 ]</b> = 50 '.$lang_lot[62].' </span><br>'.
							'<span class="cb">3ล่าง <b>[ 123 ]</b> = 25 '.$lang_lot[62].' </span><br><br>'.
							'<span style="color:red; font-size:18px;"><b>  '.$lang_lot[21].' = 125 บาท</b></span>'.
				'</div>';

$data = array();
$data = array(
	'html_result' => $html_result,
	'status' => true,
	'msg' => "Successfully",
);


echo json_encode($data);


?>