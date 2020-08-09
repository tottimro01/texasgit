<?
$sql="select * from bom_tb_lotto_ok  where lot_zone=3 and  lot_rob=1  order by ok_id desc limit 1";
$re_ok=sql_array($sql);

$sql="select * from bom_tb_lotto_bill_play_live   where    play_id='$pid'  and play_status=7 ";		
$recan=sql_array($sql);


$ok_del=0;

if($re_ok[o_limit_time]>$time_stam){ 
	$ok_del=1;
}

if($ok_del==1){
	$sql="update IGNORE bom_tb_lotto_bill_play_live set b_accept=0, play_status=6, can_date=now() , can_by='$_SESSION[r_user]'  where play_status=7 and play_id='$recan[play_id]'";   
	sql_query($sql);

	$sql="update IGNORE bom_tb_lotto_bill_live set   br_pay_1=br_pay_1-$recan[br_pay_1] ,	br_pay_2=br_pay_2-$recan[br_pay_2] ,	br_pay_3=br_pay_3-$recan[br_pay_3] ,	br_pay_4=br_pay_4-$recan[br_pay_4]
	, br_pay_5=br_pay_5-$recan[br_pay_5] ,	br_pay_6=br_pay_6-$recan[br_pay_6] ,	br_pay_7=br_pay_7-$recan[br_pay_7] ,	br_pay_8=br_pay_8-$recan[br_pay_8] 
	 , b_total=b_total-$recan[b_total] ,	b_pay=b_pay-$recan[b_pay]  where b_status=5 and bill_id='$recan[bill_id]'";   
	sql_query($sql);

	$sql="update IGNORE bom_tb_member set m_count=m_count+$recan[b_pay]  where m_id='$recan[m_id]' ";
	sql_query($sql);

	$sql="select * from bom_tb_lotto_bill_live  where b_status=5 and bill_id='$recan[bill_id]'";   
	$rex=sql_array($sql);

	if($rex[b_total]<=0){
		$sql="update IGNORE bom_tb_lotto_bill_live set   b_accept=0,b_status=4 where b_status=5 and bill_id='$recan[bill_id]'";   
		sql_query($sql);
	}

	$r_up = "";

	$ex_r_up = explode("*" , $recan[r_agent_id]);
	foreach ($ex_r_up as $key => $value) {
		if($value!=""){
			if($r_up==""){
				$r_up = "r_id = '$value'";
			}else{
				$r_up .= " or r_id = '$value'";
			}
		}
	}
	
	$sql="update IGNORE bom_tb_".$recan[lot_zone]."_mem set   s_sum=s_sum+$recan[b_total]  where  play_number='$recan[play_number]' and  lot_type='$recan[lot_type]' and m_id='$recan[m_id]'";   
	sql_query_lot($sql);

	$sql="update IGNORE bom_tb_".$recan[lot_zone]."_ag set   s_sum=s_sum+$recan[b_total]  where  play_number='$recan[play_number]' and  lot_type='$recan[lot_type]' and ($r_up)";   
	sql_query_lot($sql);

	$sql="update IGNORE bom_tb_".$recan[lot_zone]."_sa set   s_sum=s_sum+$recan[b_total]  where  play_number='$recan[play_number]' and  lot_type='$recan[lot_type]'";   
	sql_query_lot($sql);

	$data = array(
		'status' => true,
		'msg' => $lang_ag[3],
	);

}else{
	$data = array(
		'status' => false,
		'msg' => $lang_ag[4] ,
	);
}
?>