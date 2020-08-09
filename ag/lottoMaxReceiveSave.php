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

$sql="select * from bom_tb_agent  WHERE r_id = $r_id";
$re1=sql_array($sql);
$exp=@explode(",",$re1['r_lotto_over']);


$set_r_lotto_over = "over";

$a= array();
for($i=1; $i <= 35;$i++)
{
	$val = sql_escape_str($_POST['tlot_max_'.$i]);
	$set_r_lotto_over.=','.str_replace(',','',$val);
	
	$tover=trim(str_replace(",","",$_POST['tlot_max_'.$i]));
	
	if($exp[$i]!=$tover){
		
		if($exp[$i]>$tover){
			$tcut=$exp[$i]-$tover;
$sql = "update IGNORE bom_tb_1_ag SET s_sum= s_sum - $tcut  WHERE lot_type='$i' and s_lock=0 and r_id = $r_id ";
sql_query_lot($sql);
$sql = "update IGNORE bom_tb_1_ag SET s_sum= s_sum - $tcut , s_lock=0  WHERE lot_type='$i' and s_lock=1 and r_id = $r_id ";
sql_query_lot($sql);

		}else{
			$tcut=$tover-$exp[$i];
$sql = "update IGNORE bom_tb_1_ag SET s_sum= s_sum + $tcut  WHERE lot_type='$i' and s_lock=0 and r_id = $r_id ";
sql_query_lot($sql);
$sql = "update IGNORE bom_tb_1_ag SET s_sum= s_sum + $tcut , s_lock=0  WHERE lot_type='$i' and s_lock=1 and r_id = $r_id ";
sql_query_lot($sql);
			}
			
$sql = "update IGNORE bom_tb_1_ag SET s_sum= 0,s_lock=1  WHERE lot_type='$i' and s_sum<0 and r_id = $r_id ";
sql_query_lot($sql);
		}
	
	
}


$sql = "update IGNORE `bom_tb_agent` SET `r_lotto_over`= '".$set_r_lotto_over."' WHERE r_id = $r_id";
$rs = sql_query($sql);
if($rs)
{
	$data = array(
		'msg'     =>  $lang_ag[5],
		'status'  =>  true,
	);
}
else
{
	$data = array(
		'msg'     =>  $lang_ag[4],
		'status'  =>  false
	);
}

echo json_encode($data);
 ?>