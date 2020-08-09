<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 

if($_SESSION["AGlang"]=="")
{
	$_SESSION["AGlang"]="th";
}


if($_SESSION['r_id'] == "")
{
	exit();
}

require('inc/conn.php');
require('inc/function.php');
require('inc/ag_function.php');
require('lang/ag_lang.php');
require('lang/function_array.php');


$r_id = $_SESSION['r_id'];
$l_zone = 3;


$sql="select * from bom_tb_agent  WHERE r_id = $r_id";
$re1=sql_array($sql);
$exp=@explode(",",$re1['r_lotto_hun_over_'.$l_zone]);



$sql = "SELECT  `r_lotto_hun_over_".$l_zone."` FROM `bom_tb_agent` WHERE `r_id` = ".$r_id."";
$rs= sql_array($sql);
$ex_over = explode(",", $rs['r_lotto_hun_over_'.$l_zone]);
$ex_over[31] = sql_escape_str($_POST['tlot_max_31']);

$set_r_lotto_hun_over = "over";

for($i=1; $i <= 35;$i++)
{
	

	if($i == 31)
	{
		$val = sql_escape_str($_POST['tlot_max_'.$i]);
		$tover=trim(str_replace(",","",$_POST['tlot_max_'.$i]));
		
	if($exp[$i]!=$tover){
		
		if($exp[$i]>$tover){
			$tcut=$exp[$i]-$tover;
$sql = "update IGNORE bom_tb_".$l_zone."_ag SET s_sum= s_sum - $tcut  WHERE lot_type='$i' and s_lock=0 and r_id = $r_id ";
sql_query_lot($sql);
$sql = "update IGNORE bom_tb_".$l_zone."_ag SET s_sum= s_sum - $tcut , s_lock=0  WHERE lot_type='$i' and s_lock=1 and r_id = $r_id ";
sql_query_lot($sql);

		}else{
			$tcut=$tover-$exp[$i];
$sql = "update IGNORE bom_tb_".$l_zone."_ag SET s_sum= s_sum + $tcut  WHERE lot_type='$i' and s_lock=0 and r_id = $r_id ";
sql_query_lot($sql);
$sql = "update IGNORE bom_tb_".$l_zone."_ag SET s_sum= s_sum + $tcut , s_lock=0  WHERE lot_type='$i' and s_lock=1 and r_id = $r_id ";
sql_query_lot($sql);
			}
			
$sql = "update IGNORE bom_tb_".$l_zone."_ag SET s_sum= 0,s_lock=1  WHERE lot_type='$i' and s_sum<0 and r_id = $r_id ";
sql_query_lot($sql);
		}
		
	}else{
		$val = $ex_over[$i];
	#	$tover=$ex_over[$i];
	}


	$set_r_lotto_hun_over.=','.str_replace(',','',$val);
	
	
}


$ex_set_r_lotto_hun_over =explode(",", $set_r_lotto_hun_over);
$lotHun_typeArry = $lot_type[$_SESSION["AGlang"]][3]; 
foreach ($lotHun_typeArry as $key => $value) {
	if($ex_set_r_lotto_hun_over[$key] == "")
	{
		$ex_set_r_lotto_hun_over[$key] = 0;
	}
}

$set_r_lotto_hun_over = implode(",", $ex_set_r_lotto_hun_over);

// $set_r_lotto_hun_over = implode(",", $ex_over);


$sql = "update IGNORE `bom_tb_agent` SET `r_lotto_hun_over_".$l_zone."`= '".$set_r_lotto_hun_over."' WHERE `r_id` = $r_id";

$rs = sql_query($sql);
if($rs)
{
	$data = array(
		'msg'     =>  $lang_ag[5],
		'l_zone'     =>  $l_zone,
		'status'  =>  true,
	);

	// $data = array(
	// 	'msg'     =>  $lang_message[5],
	// 	'l_zone'     =>  $l_zone,
	// 	'set_r_lotto_hun_over' =>	$set_r_lotto_hun_over,
	// 	'ex_over' =>	$ex_over,
	// 	'status'  =>  true,
	// );
}
else
{
	$data = array(
		'msg'     =>  $lang_ag[4],
		'status'  =>  false
	);
}



// $data = array(
// 	'set_r_lotto_over' =>	$set_r_lotto_over,
// 	'status_flag' =>	true,
// 	'ex_over' =>	$ex_over,
// 	'set_r_lotto_hun_over' =>	$set_r_lotto_hun_over,
// 	'msg' 				=>	$lang_message[5],
// );


echo json_encode($data);
 ?>