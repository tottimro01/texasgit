<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php   
header("Content-type:text/html; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);       
require('../inc/conn.php');
require('../inc/function.php');

################OPEN BET LOTTO 
$sql="select * from bom_tb_config where con_id=1";
$rec=sql_array($sql);
if($rec["con_open_lotto_hun"]==0){
 exit();
	}


$zone=$_SESSION["zone_hun"];
$rob=$_SESSION["rob_hun"];
$sql="select * from bom_tb_lotto_ok where lot_zone=$zone and lot_rob=$rob order by ok_id desc limit 1";
$re_ok=sql_array($sql);

if($re_ok[o_limit_time]<$time_stam){ 
//echo"ปิดรับแทงแล้ว";
 exit();
 }
	



if(($_SESSION['m_id'] == '') || (!isset($_SESSION['m_id']))){ 
 exit();
 }

$pid=$_POST[pid];



$sql="select * from bom_tb_lotto_hun_bill_play_live   where  m_id='$_SESSION[mid]'  and  play_id='$pid'  and play_status=7 and  play_timestam>'$time_can_lotto' ";		
$recan=sql_array($sql);

if($recan[play_id]==""){
exit();
	}
	
$time_del_lotto=$recan["play_timestam"]+(60*20);
$ok_del=0;

if($re_ok[o_limit_time]>$time_stam and $time_stam< $time_del_lotto){ 
$ok_del=1;
	}
if($ok_del==1){
	
$sql="update bom_tb_lotto_hun_bill_play_live set b_accept=0, play_status=6, can_date=now() , can_by='$_SESSION[m_user]'  where  m_id='$_SESSION[mid]'  and   play_status=7 and play_id='$recan[play_id]' ";   
sql_query($sql);	

$sql="update bom_tb_lotto_hun_bill_live set   br_pay_1=br_pay_1-$recan[br_pay_1] ,	br_pay_2=br_pay_2-$recan[br_pay_2] ,	br_pay_3=br_pay_3-$recan[br_pay_3] ,	br_pay_4=br_pay_4-$recan[br_pay_4] ,	
b_total=b_total-$recan[b_total] ,	b_pay=b_pay-$recan[b_pay]  where   m_id='$_SESSION[mid]'  and   b_status=5 and bill_id='$recan[bill_id]'";   
sql_query($sql);

$sql="update bom_tb_member set m_count=m_count+$recan[b_pay]  where     m_id='$recan[m_id]' ";
sql_query($sql);

$sql="select * from bom_tb_lotto_hun_bill  where   m_id='$_SESSION[mid]'  and   b_status=5 and bill_id='$recan[bill_id]'";   
$rex=sql_array($sql);
if($rex[b_total]<=0){
$sql="update bom_tb_lotto_hun_bill set   b_accept=0,b_status=4 where  m_id='$_SESSION[mid]'  and   b_status=5 and bill_id='$recan[bill_id]'";   
sql_query($sql);
	}

$sql="update bom_tb_lotto_hun_lock_1 set   h_sum=h_sum+$recan[b_total]    where  h_num='$recan[play_number]' and  lot_type='$recan[lot_type]' ";   
sql_query($sql);




           $q_num=$recan[play_number];
		   $type_lot=$recan[lot_type];
###################################

			###############3โต๊ด
			if($type_lot==3){
$num_up=array(substr($q_num , -3,1), substr($q_num , -2,1),  substr($q_num , -1,1));
sort($num_up);
$arr_xnum=array();
$arr_xnum[]=$num_up[0].$num_up[1].$num_up[2];	
$arr_xnum[]=$num_up[0].$num_up[2].$num_up[1];	
$arr_xnum[]=$num_up[1].$num_up[0].$num_up[2];	
$arr_xnum[]=$num_up[1].$num_up[2].$num_up[0];	
$arr_xnum[]=$num_up[2].$num_up[1].$num_up[0];	
$arr_xnum[]=$num_up[2].$num_up[0].$num_up[1];	

	foreach($arr_xnum as $newnum){
 $url_file_0="../json/lotto/lock/".$recan[lot_zone]."/".$recan[lot_rob]."_".$type_lot."_".$newnum."_.json";
#jwlot($url_file_00,($sumck0+$recan[b_total]));	
	}
	###############3โต๊ด
}

			
$jst1=array();
$sql = sql_query("select * from bom_tb_lotto_hun_lock_1 where   h_sum<10   and lot_zone='$recan[lot_zone]' and lot_rob='$recan[lot_rob]'   order by lot_type asc, h_num asc");
while($rs=sql_fetch($sql)){ 
$jst1[$rs[lot_type]][]="$rs[h_num]";
}
$txt44=json_encode($jst1);
$url_file="../json/lotto/limit/limit_".$recan[lot_zone]."_".$recan[lot_rob].".json";		
#write($url_file ,$txt44,"w+"); 

}
?>