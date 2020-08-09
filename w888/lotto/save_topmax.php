<?

 $sql="INSERT IGNORE INTO bom_tb_lotto_topmax ( bill_id	,play_timestam,	play_datenow,	play_number,	lot_type	,lot_zone	,b_total,	play_pay,	m_id,	r_agent_id ,	b_name ,  b_no)  values
  ('$reeb[bill_id]','$time_stam', now() ,'$q_num' ,'$type_lot'  ,'$_POST[zone]'  ,'$x_sum' ,'$hpay[$type_lot]'  ,'$_SESSION[mid]' ,'$_SESSION[r_agent_id]' , '$bill_cus_name', '$bill_no' )";
sql_query($sql);

?>