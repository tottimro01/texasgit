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
$set_r_lotto_hun_over = "over";
$l_zone = $_POST['l_zone'];


$sql="select * from bom_tb_agent  WHERE r_id = $r_id";
$re1=sql_array($sql);

if($_POST['change_all'] != "on")
{

		$exp=@explode(",",$re1['r_lotto_hun_over_'.$l_zone]);

		for($i=1; $i <= 35;$i++)
		{	
				$val = sql_escape_str($_POST['tlot_max_'.$i]);
				$set_r_lotto_hun_over.=','.str_replace(',','',$val);
				
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
		}


		$sql = "update IGNORE `bom_tb_agent` SET `r_lotto_hun_over_".$l_zone."`= '".$set_r_lotto_hun_over."' WHERE `r_id` = $r_id";
		$rs = sql_query($sql);
		if($rs)
		{
			$data = array(
				'msg'     =>  $lang_ag[5],
				'l_zone'     =>  $l_zone,
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

}else{



	for($l = 2; $l <= 20; $l++)
	{
		

		$exp=@explode(",",$re1['r_lotto_hun_over_'.$l]);

		for($i=1; $i <= 35;$i++)
		{	
				$val = sql_escape_str($_POST['tlot_max_'.$i]);
				$set_r_lotto_hun_over.=','.str_replace(',','',$val);
				
				$tover=trim(str_replace(",","",$_POST['tlot_max_'.$i]));
				if($exp[$i]!=$tover){
					
						if($exp[$i]>$tover){
							$tcut=$exp[$i]-$tover;
							$sql = "update IGNORE bom_tb_".$l."_ag SET s_sum= s_sum - $tcut  WHERE lot_type='$i' and s_lock=0 and r_id = $r_id ";
							sql_query_lot($sql);
							$sql = "update IGNORE bom_tb_".$l."_ag SET s_sum= s_sum - $tcut , s_lock=0  WHERE lot_type='$i' and s_lock=1 and r_id = $r_id ";
							sql_query_lot($sql);
			
						}else{
							$tcut=$tover-$exp[$i];
							$sql = "update IGNORE bom_tb_".$l."_ag SET s_sum= s_sum + $tcut  WHERE lot_type='$i' and s_lock=0 and r_id = $r_id ";
							sql_query_lot($sql);
							$sql = "update IGNORE bom_tb_".$l."_ag SET s_sum= s_sum + $tcut , s_lock=0  WHERE lot_type='$i' and s_lock=1 and r_id = $r_id ";
							sql_query_lot($sql);
						}
						
		 			$sql = "update IGNORE bom_tb_".$l."_ag SET s_sum= 0,s_lock=1  WHERE lot_type='$i' and s_sum<0 and r_id = $r_id ";
		 			sql_query_lot($sql);
		 		}
		}


		$sql = "update IGNORE `bom_tb_agent` SET `r_lotto_hun_over_".$l."`= '".$set_r_lotto_hun_over."' WHERE `r_id` = $r_id";
		$rs = sql_query($sql);
		


	}

	if($rs)
	{
		$data = array(
			'msg'     =>  $lang_ag[5],
			'l_zone'     =>  $l_zone,
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



}








echo json_encode($data);
 ?>