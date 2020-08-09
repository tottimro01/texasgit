<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 

  if($_SESSION["AGlang"]==""){
      $_SESSION["AGlang"]="th";
  }
  require('inc/conn.php');
  require('inc/function.php');
  require('lang/ag_lang.php');

  $bill_total_cnt = 0;
  $bill_total_mon = 0;
  $bill_total_check_cnt = 0;
  $bill_total_check_mon = 0;
  $bill_total_nocheck_cnt = 0;
  $bill_total_nocheck_mon = 0;
  $snet2 = 0;

  $arr_bill_step = [];
  $sql=sql_query("select * from bom_tb_football_bill_live where r_id = '".$_SESSION["rid"]."' and b_numstep > 1");
  while($re=sql_fetch($sql)){
  	$arr_bill_step[] = $re;

  	$bill_total_cnt++;
  	$bill_total_mon = $bill_total_mon+$re["b_total"];

  	if($re["b_status"]!=5){
  		$bill_total_check_cnt++;
  		$bill_total_check_mon = $bill_total_check_mon+$re["b_total"];
  	}else{
  		$bill_total_nocheck_cnt++;
  		$bill_total_nocheck_mon = $bill_total_nocheck_mon+$re["b_total"];
  	}

  	$snet2 = $snet2+$re["b_total"];
  }


$rs = array(

		"status_flag"				=> true,
		"bill_total_cnt" 			=> number_format($bill_total_cnt),
		"bill_total_mon" 			=> number_format($bill_total_mon,2),
		"bill_total_check_cnt" 		=> number_format($bill_total_check_cnt),
		"bill_total_check_mon" 		=> number_format($bill_total_check_mon,2),
		"ncom"						=> "0",
		"snet" 						=> "0",
		"snet2"						=> number_format($snet2,2),
		"bill_total_nocheck_cnt" 	=> number_format($bill_total_nocheck_cnt),
		"bill_total_nocheck_mon" 		=> number_format($bill_total_nocheck_mon,2),

);



$data = array(
    'status' => true,
    'result' => $rs,
);


echo json_encode($data);

 ?>