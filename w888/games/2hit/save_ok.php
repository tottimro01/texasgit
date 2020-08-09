<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
header ("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header ("Pragma: no-cache"); // HTTP/1.0
  
$zone=1;
$view_date=date("d-m-Y");
$type_games=1;

if($_SESSION['m_id']==""){exit();}

$fo="../../json/games/session_".$_SESSION['m_id'].".php";
@require_once($fo);

if($_SESSION['bettoken']!=$bettoken){
	exit();
}


require('../../inc/conn.php');
require('../../inc/function.php');
require('../function.php');
require("../../lang/variable_lang.php");
// -
require("../../lang/function_array.php");

  if(!strstr($_SERVER['HTTP_REFERER'],   $check_url   )){ exit();}


$b_web_from=$check_url;
  
  
$sql="select * from bom_tb_config where con_id=1";
$rec=sql_array($sql);

if($rec['con_open_games']==0){
echo"<b class='cr'>$lang_member[317]</b>";
exit();
	}
  
$bet_time=$rec['con_time_games'];
$new_time=(90)-($time_stam-$bet_time);

if($new_time<=0){
exit();
}

$_POST['bet']=intval(str_replace(",","",trim($_POST['bet'])));
$sumbet=$_POST['bet'];
$type=$_POST['type'];

$bet_id=$rec['con_id_games'];



$sql="select *   from bom_tb_member where m_id='".$_SESSION['m_id']."'";
$re_m=sql_array($sql);

$re_m['m_count']=intval($re_m['m_count']);
if($re_m['m_count']<=0){
	echo"<b class='cr'>$lang_member[335] : $re_m[m_count] $lang_member[325]</b>";
	exit();
}

if($sumbet>$re_m['m_count']){
	$sumbet=$re_m['m_count'];
	}


$rmyshare=array();
$rdis=array();
$rag=array(); 

######################ระงับ
  if(intval($_SESSION['m1']['m_active'])!=1){ 
echo "<b class='cr'>E32-".$lang_member[555]."</b>";
 @session_start(); 
@session_destroy();
exit();
 }
 
 
   ###############ปิดไม่ให้เล่น
 $exe1=@explode(",",$_SESSION['m1']['m_open']);
  if(intval($exe1[11])!=1){ 
echo "<b class='cr'>E32-".$lang_member[555]."</b>";
exit();
 }
 
 
################Config Member
########################Agent
foreach($_SESSION['arid'] as $rid){
	
	
						######################ระงับ
					  if(intval($_SESSION['ardata'][$rid]['r_active'])==0){ 
					echo "<b class='cr'>E32-".$lang_member[555]."</b>";
 @session_start(); 
@session_destroy();
					 exit();
					 }
					 
					 

					 
					 
$rag[]=$rid; 					 
$rdis[]=@explode(',',$_SESSION['ardata'][$rid]['r_games_dis']); 					 
$rmyshare[]=@explode(',',$_SESSION['ardata'][$rid]['r_games_myshare']); 
$mshare=@explode(',',$_SESSION['ardata'][$rid]['r_games_share']); 
	
}

					 
 ###############ปิดไม่ให้เล่น
foreach($_SESSION['arid'] as $rid){
					######################ระงับ
					$exe2=@explode(",",$_SESSION['ardata'][$rid]['r_open']);
					  if(intval($exe2[11])!=1){ 
	                 echo "<b class='cr'>E32-".$lang_member[555]."</b>";
					 exit();
					 }
}	 
				 
###################Share New
for($xs=1;$xs<@count($rmyshare);$xs++){
$r1myshare[$xs]=$rmyshare[$xs][1]; 
	}
$hshare=$mshare[1]; 




$mdis=@explode(',',$_SESSION['m1']['m_games_dis']); 


$r1dis=$rdis[0]['1']; 
$r2dis=$rdis[1]['1']; 
$r3dis=$rdis[2]['1']; 
$r4dis=$rdis[3]['1']; 
$r5dis=$rdis[4]['1']; 
$r6dis=$rdis[5]['1']; 
$r7dis=$rdis[6]['1']; 
$r8dis=$rdis[7]['1']; 
$mdis=$mdis['1']; 



if($rag[0]>0){$paywin1=$arr_color_pay[$type];}
if($rag[1]>0){$paywin2=$arr_color_pay[$type];}
if($rag[2]>0){$paywin3=$arr_color_pay[$type];}
if($rag[3]>0){$paywin4=$arr_color_pay[$type];}
if($rag[4]>0){$paywin5=$arr_color_pay[$type];}
if($rag[5]>0){$paywin6=$arr_color_pay[$type];}
if($rag[6]>0){$paywin7=$arr_color_pay[$type];}
if($rag[7]>0){$paywin8=$arr_color_pay[$type];}
$paywinh=$arr_color_pay[$type];


if($rag[0]>0){$diswin1=$sumbet-($r1dis/10);}
if($rag[1]>0){$diswin2=$sumbet-($r2dis/10);}
if($rag[2]>0){$diswin3=$sumbet-($r3dis/10);}
if($rag[3]>0){$diswin4=$sumbet-($r4dis/10);}
if($rag[4]>0){$diswin5=$sumbet-($r5dis/10);}
if($rag[5]>0){$diswin6=$sumbet-($r6dis/10);}
if($rag[6]>0){$diswin7=$sumbet-($r7dis/10);}
if($rag[7]>0){$diswin8=$sumbet-($r8dis/10);}
$diswinh=$sumbet-($mdis/10);

$b_dis_arr="$mdis,$r1dis,$r2dis,$r3dis,$r4dis,$r5dis,$r6dis,$r7dis,$r8dis";
########################################

 #########################AF
if($re_m['bonus_m_id']>0){
	   $comaf=$af_games;
	}else{
		$comaf=0;
	}					




$sql="INSERT IGNORE INTO  bom_tb_games_bill_play_live (
bet_id ,	play_timestam,	play_datenow	,play_bet		,play_pay, b_total , b_pay ,  game_zone 
, m_id, r_agent_id , b_time_last ,b_web_from,b_date, bonus_m_id
,play_br_pay_1,	play_br_pay_2	,play_br_pay_3,	play_br_pay_4 ,	play_br_pay_5 ,	play_br_pay_6 ,	play_br_pay_7 ,	play_br_pay_8
,br_pay_1	,br_pay_2,	br_pay_3	,br_pay_4	,br_pay_5	,br_pay_6	,br_pay_7	,br_pay_8
,b_share_m 	 ,b_myshare_1 ,b_myshare_2 ,b_myshare_3 ,b_myshare_4 ,b_myshare_5 ,b_myshare_6,b_myshare_7
,b_dis_arr, r_id, com_af
 ) values (
 '$bet_id','$time_stam',now(),'$type','$paywinh'  ,'$sumbet'  ,'$diswinh' ,'$zone' 
  ,'".$_SESSION['m_id']."' ,'".$_SESSION['r_agent_id']."' ,'$new_time','$b_web_from','$view_date','$re_m[bonus_m_id]'
 ,'$paywin1' ,'$paywin2' ,'$paywin3' ,'$paywin4' ,'$paywin5' ,'$paywin6' ,'$paywin7' ,'$paywin8' 
 ,'$diswin1'  ,'$diswin2' ,'$diswin3'  ,'$diswin4' ,'$diswin5' ,'$diswin6' ,'$diswin7' ,'$diswin8'
 ,'$hshare' ,'".$r1myshare[1]."' 	,'".$r1myshare[2]."' 	,'".$r1myshare[3]."' 	,'".$r1myshare[4]."' 	,'".$r1myshare[5]."' 	,'".$r1myshare[6]."' 	,'".$r1myshare[7]."' 
 ,'$b_dis_arr', '".$_SESSION['cr_id']."' ,'$comaf'
  )";
sql_query($sql);	

	$sql="select play_id from  bom_tb_games_bill_play_live  where m_id='".$_SESSION['m_id']."'  order by  play_id desc limit 1  ";
	$rex=sql_array($sql);

	$rs_ag = sql_array("select r_agent_id from bom_tb_agent where r_id = '$re_m[r_id]'");
	$log_sum = $re_m['m_count']-$sumbet;
	######################LOG ใหม่
	$sql="INSERT IGNORE INTO bom_tb_all_payment (
	bap_date, bap_ip,	bap_type	,m_id	,r_id,	m_agent_id,	r_agent_id,	
	bap_before, bap_out ,bap_after,bap_comment,
	bill_id,bap_play_type,bap_zone,bap_rob,
	bap_code,bap_by_type,bap_by_id) values(
	now(),'"._bIP()."', '3', '$re_m[m_id]','$re_m[r_id]','$re_m[m_agent_id]','$rs_ag[r_agent_id]',
	'$re_m[m_count]' ,'-$sumbet','$log_sum','สมาชิกพนันเกมส์ 2ฮิต',
	'$rex[play_id]' , 4 , $zone , $bet_id ,
	'MPB',1,'$_SESSION[m_id]') ";
	sql_query($sql);	
	######################LOG ใหม่ 




$sql="update IGNORE  bom_tb_member set m_count=m_count-$sumbet  where m_id='".$_SESSION['m_id']."' ";
sql_query($sql);

$sql="update IGNORE  bom_tb_games_bet_live set  bet_count_$type=bet_count_$type +$sumbet    where bet_id='$bet_id'  and game_zone='$zone'";
sql_query($sql);

#######################################################LOG
	 /*$sql="select play_id from  bom_tb_games_bill_play_live  where m_id='".$_SESSION['m_id']."'  order by  play_id desc limit 1  ";
	 $rex=sql_array($sql);
	 $sql="select m_count from  bom_tb_member  where m_id='$_SESSION[m_id]'  ";
	 $rexm=sql_array($sql);
	 $tosum=-$sumbet;
	 $tosum2=$sumbet-$diswinh;
     $log_sum=$rexm['m_count'];
	  $xcountm=$rexm['m_count']+$sumbet;
	$sql="INSERT IGNORE INTO bom_tb_databet_live (d_date,	play_id,	m_id	,d_count, d_out,	d_in	,d_sum	,d_by ) values(now(),'$rex[play_id]','".$_SESSION['m_id']."','$xcountm','$tosum','$tosum2' ,'$log_sum',23)";
     sql_query($sql);*/
	#######################################################LOG
	
$sql="select *  from bom_tb_games_bet_live   where bet_id='$bet_id'   and game_zone='$zone'  order by  bet_id desc  limit 1 ";
$rec=sql_array($sql);

$url_file="json/count_bet.json";
$js1=array();
$js1[]=array("1"=>"$rec[bet_count_1]","2"=>"$rec[bet_count_2]");
$txt11=json_encode($js1);
write($url_file ,$txt11,"w+"); 

echo'<script> get_credit();parent.rightx._vvxx1();</script>';
?>
