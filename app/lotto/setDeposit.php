<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
header("Content-Type: application/json");

if($_POST['lang']=="")
{
  $_SESSION['lang']="th";
}else{
  $_SESSION['lang']=$_POST['lang'];
}
require('../inc/conn.php');
require('../inc/function.php');
require("../lang/variable_lang.php");



$mid =  $_POST['mid'];
$date = $_POST['date'];
$time = $_POST['time'];
$amount = $_POST['amount'];
$bank_id = $_POST['bank_id'];
$bank4digit = $_POST['bank4digit'];

$arr = array();


$sql = "SELECT * FROM `bom_tb_member` WHERE `m_id` = $mid";
$re = sql_query($sql);
$re_m = sql_fetch($re);
$sql = "SELECT * FROM `bom_tb_agent` WHERE `r_id` = $re_m[r_id]";
$re = sql_query($sql);
$re_ag = sql_fetch($re);


if($mid != "" and $date != "" and $time != "" and $amount != "" and $bank_id != "")
{
	if(floatval($amount) < floatval($re_ag[r_m_deposit_min]))
	{
		$arr["status"] = 2;
		$arr["msg"] = $lang_member[1659]." ".$re_ag[r_m_deposit_min]." ".$re_m[m_currency];
	}else if(floatval($amount) > floatval($re_ag[r_m_deposit_max]))
	{
		$arr["status"] = 2;
		$arr["msg"] = $lang_member[1660]." ".$re_ag[r_m_deposit_max]." ".$re_m[m_currency];
	}else{

		$sql="select * from bom_tb_trans where t_type=1 and m_id='".$mid."' and t_status=3";
		$num=sql_num($sql);
		if($num==0){

			$txt="BC=".$bank4digit;
			$tdate_bet=$date." ".$time.":00";
			$sql="INSERT IGNORE INTO bom_tb_trans (t_bank, t_note, t_date_bet ,t_date,t_count,t_type,m_id,r_id, t_ip,r_agent_id ) values ('".$bank_id."', '$txt', '$tdate_bet' ,now() , $amount  , 1 , '".$mid."' , '".$re_m['r_id']."','"._bIP()."' ,'".$re_m['m_agent_id']."')";

			$rs = sql_query($sql);

			if($rs)
			{
				$ag_update = "UPDATE `bom_tb_agent` SET `r_alert_in`= r_alert_in+1 where r_id = '".$re_m[r_id]."'"; 
				sql_query($ag_update);	

				$arr["status"] = 1;
				$arr["msg"] = $lang_member[629];


			}else{
				$arr["status"] = 2;
				$arr["msg"] = $lang_member[2339];
			}


		}else{
			$arr["status"] = 2;
			$arr["msg"] = $lang_member[962];
			
		}

	}	

}else{
	$arr["status"] = 2;
	$arr["msg"] = $lang_member[2338];
}	

echo json_encode($arr);

?>
