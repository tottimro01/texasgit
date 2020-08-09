<?
require('../inc/conn.php');
require('../inc/function.php');
require('function.php');



	###########################คืนเงิน
$sql="select * from bom_tb_games_bill_play where play_status='7'  and r_pay_ok=0  order by play_id desc";
#$sql="select * from bom_tb_games_bill_play where play_status='6'    order by play_id desc";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
$sumbet=$rs['b_total'];
echo"$rs[play_id] = $rs[b_total]<br>";

	$sql="select m_id,m_count,m_agent_id,r_id from bom_tb_member where m_id='$rs[m_id]' ";
	$rec=sql_array($sql);
	$rs_ag = sql_array("select r_agent_id from bom_tb_agent where r_id = '$rec[r_id]'");
	$log_sum=$rec['m_count']+$sumbet;
	######################LOG ใหม่"._bIP()."
	$sql="INSERT IGNORE INTO bom_tb_all_payment (
	bap_date, bap_ip,	bap_type	,m_id	,r_id,	m_agent_id,	r_agent_id,	
	bap_before, bap_in ,bap_after,bap_comment,
	bill_id,bap_play_type,bap_zone,bap_rob,
	bap_code,bap_by_type,bap_by_id) values(
	now(),'', '9', '$rec[m_id]','$rec[r_id]','$rec[m_agent_id]','$rs_ag[r_agent_id]',
	'$rec[m_count]' ,'$sumbet','$log_sum','คืนเงิน ไม่มีผล',
	'$rs[play_id]' , 4 , '$rs[game_zone]' , '$rs[bet_id]' ,
	'BPB',3,'99991') ";
	sql_query($sql);	
	######################LOG ใหม่ 



$sql="update IGNORE bom_tb_member set m_count=m_count + $sumbet  where m_id='$rs[m_id]' ";
sql_query($sql);	


	$exc=@explode("*",$rs["r_agent_id"]);
	$level=@count($exc)-1;
	
	if($level==2){
 $sql="update IGNORE bom_tb_games_bill_play set  	 r_pay_ok=1 , play_status=6 ,
  b_bonus=b_total ,br_bonus_1=b_total ,br_bonus_2=0 ,br_bonus_3=0
  , b_pay=b_total ,br_pay_1=b_total ,br_pay_2=0,br_pay_3=0
 where  play_id='$rs[play_id]'; ";
sql_query($sql);
	}elseif($level==3){
 $sql="update IGNORE bom_tb_games_bill_play set  	 r_pay_ok=1 ,play_status=6 ,
  b_bonus=b_total ,br_bonus_1=b_total ,br_bonus_2=b_total ,br_bonus_3=0 ,br_bonus_4=0
    , b_pay=b_total ,br_pay_1=b_total ,br_pay_2=b_total  ,br_pay_3=0,br_pay_4=0
 where  play_id='$rs[play_id]'; ";
sql_query($sql);
	}elseif($level==4){
 $sql="update IGNORE bom_tb_games_bill_play set  	 r_pay_ok=1 ,play_status=6 ,
  b_bonus=b_total ,br_bonus_1=b_total ,br_bonus_2=b_total ,br_bonus_3=b_total ,br_bonus_4=0 ,br_bonus_5=0
    , b_pay=b_total ,br_pay_1=b_total ,br_pay_2=b_total  ,br_pay_3=b_total  ,br_pay_4=0,br_pay_5=0
 where  play_id='$rs[play_id]'; ";
sql_query($sql);
	}elseif($level==5){
 $sql="update IGNORE bom_tb_games_bill_play set  	 r_pay_ok=1 ,play_status=6 ,
  b_bonus=b_total ,br_bonus_1=b_total ,br_bonus_2=b_total ,br_bonus_3=b_total ,br_bonus_4=b_total ,br_bonus_5=0 ,br_bonus_6=0
    , b_pay=b_total ,br_pay_1=b_total ,br_pay_2=b_total  ,br_pay_3=b_total ,br_pay_4=b_total  ,br_pay_5=0,br_pay_6=0
 where  play_id='$rs[play_id]'; ";
sql_query($sql);
	}elseif($level==6){
 $sql="update IGNORE bom_tb_games_bill_play set  	 r_pay_ok=1 ,play_status=6 ,
  b_bonus=b_total ,br_bonus_1=b_total ,br_bonus_2=b_total ,br_bonus_3=b_total ,br_bonus_4=b_total ,br_bonus_5=b_total ,br_bonus_6=0 ,br_bonus_7=0
      , b_pay=b_total ,br_pay_1=b_total ,br_pay_2=b_total  ,br_pay_3=b_total ,br_pay_4=b_total ,br_pay_5=b_total  ,br_pay_6=0,br_pay_7=0
 where  play_id='$rs[play_id]'; ";
sql_query($sql);
	}elseif($level==7){
 $sql="update IGNORE bom_tb_games_bill_play set  	 r_pay_ok=1 ,play_status=6 ,
  b_bonus=b_total ,br_bonus_1=b_total ,br_bonus_2=b_total ,br_bonus_3=b_total ,br_bonus_4=b_total ,br_bonus_5=b_total ,br_bonus_6=b_total ,br_bonus_7=0 ,br_bonus_8=0
     , b_pay=b_total ,br_pay_1=b_total ,br_pay_2=b_total  ,br_pay_3=b_total ,br_pay_4=b_total ,br_pay_5=b_total  ,br_pay_6=b_total  ,br_pay_7=0,br_pay_8=0
 where  play_id='$rs[play_id]'; ";
sql_query($sql);
	}elseif($level==8){
 $sql="update IGNORE bom_tb_games_bill_play set  	 r_pay_ok=1 ,play_status=6 ,
  b_bonus=b_total ,br_bonus_1=b_total ,br_bonus_2=b_total ,br_bonus_3=b_total ,br_bonus_4=b_total ,br_bonus_5=b_total ,br_bonus_6=b_total ,br_bonus_7=b_total ,br_bonus_8=0 
       , b_pay=b_total ,br_pay_1=b_total ,br_pay_2=b_total  ,br_pay_3=b_total ,br_pay_4=b_total ,br_pay_5=b_total  ,br_pay_6=b_total   ,br_pay_7=b_total  ,br_pay_8=0
 where  play_id='$rs[play_id]'; ";
sql_query($sql);
	}elseif($level==9){
 $sql="update IGNORE bom_tb_games_bill_play set  	 r_pay_ok=1 ,play_status=6 ,
  b_bonus=b_total ,br_bonus_1=b_total ,br_bonus_2=b_total ,br_bonus_3=b_total ,br_bonus_4=b_total ,br_bonus_5=b_total ,br_bonus_6=b_total ,br_bonus_7=b_total ,br_bonus_8=b_total 
         , b_pay=b_total ,br_pay_1=b_total ,br_pay_2=b_total  ,br_pay_3=b_total ,br_pay_4=b_total ,br_pay_5=b_total  ,br_pay_6=b_total   ,br_pay_7=b_total   ,br_pay_8=b_total 
 where  play_id='$rs[play_id]'; ";
sql_query($sql);
	}






}


?>