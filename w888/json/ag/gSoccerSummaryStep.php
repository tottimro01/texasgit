



<?php 

$rs = array(

		"status_flag"				=> true,
		"bill_total_cnt" 			=> "0",
		"bill_total_mon" 			=> "",
		"bill_total_check_cnt" 		=> "0",
		"bill_total_check_mon" 		=> "",
		"ncom"						=> "",
		"snet" 						=> "0",
		"snet2"						=> "",
		"bill_total_nocheck_cnt" 	=> "0",
		"bill_total_nocheck_mon" 	=> "0"

);



$data = array(
    'status' => true,
    'result' => $rs,
);


echo json_encode($data);

 ?>