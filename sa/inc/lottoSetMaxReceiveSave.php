<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 

// if($_SESSION["AGlang"]=="")
// {
// 	$_SESSION["AGlang"]="th";
// }


require('conn.php');
require('function.php');
require('ag_function.php');
require('../lang/sa_lang.php');
// require('../../lang/function_array.php');



$r_id = $_SESSION['aid'];

$sql="select * from bom_tb_config  WHERE con_id = 1";
$re1=sql_array($sql);
$exp=@explode(",",$re1['lot_hun_over']);



$set_r_lotto_over = "over";

$a= array();
for($i=1; $i <= 35;$i++)
{
	$val = $_POST['tlot_max_'.$i];
	$set_r_lotto_over.=','.str_replace(',','',$val);
	
	
$tover=trim(str_replace(",","",$_POST['tlot_max_'.$i]));

if($exp[$i]!=$tover){
		
		if($exp[$i]>$tover){
$tcut=$exp[$i]-$tover;
		
		for($i2=2; $i2 <= 20;$i2++){	
$sql = "update IGNORE bom_tb_".$i2."_sa SET s_sum= s_sum - $tcut  WHERE lot_type='$i' and s_lock=0  ";
sql_query_lot($sql);
$sql = "update IGNORE bom_tb_".$i2."_sa SET s_sum= s_sum - $tcut , s_lock=0  WHERE lot_type='$i' and s_lock=1  ";
sql_query_lot($sql);
		}

		}else{
			$tcut=$tover-$exp[$i];
	for($i2=2; $i2 <= 20;$i2++){	
$sql = "update IGNORE bom_tb_".$i2."_sa SET s_sum= s_sum + $tcut  WHERE lot_type='$i' and s_lock=0  ";
sql_query_lot($sql);
$sql = "update IGNORE bom_tb_".$i2."_sa SET s_sum= s_sum + $tcut , s_lock=0  WHERE lot_type='$i' and s_lock=1  ";
sql_query_lot($sql);
	}
			}
	for($i2=2; $i2 <= 20;$i2++){				
$sql = "update IGNORE bom_tb_".$i2."_sa SET s_sum= 0,s_lock=1  WHERE lot_type='$i' and s_sum<0  ";
sql_query_lot($sql);
	}
		}
	
	
}


$sql = "UPDATE `bom_tb_config` SET `lot_hun_over`= '".$set_r_lotto_over."' WHERE `con_id` = 1";

$rs = sql_query($sql);
if($rs)
{
	$data = array(
		'msg'     =>  "สำเร็จ",
		'status'  =>  true,
	);
}
else
{
	$data = array(
		'msg'     =>  "ผิดพลาด",
		'status'  =>  false
	);
}


echo json_encode($data);



 ?>