<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
  header ("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
  header ("Pragma: no-cache"); // HTTP/1.0
  
$zone=5;
$view_date=date("d-m-Y");
$type_games=1;

if($_SESSION[mid]==""){exit();}


$fo="../../../json/games/session_".$_SESSION[mid].".php";
@require_once($fo);
if($_SESSION[bettoken]!=$bettoken){
	exit();
}

require('../../../inc/conn.php');
require('../../../inc/function.php');
require('../../../games/function.php');
//echo "ssssss2";
  if(!strstr($_SERVER['HTTP_REFERER'],   $check_url   )){ exit();}


################OPEN BET GAME
$url_file="../../../json/games.json";	
$op_js=file_get_contents2($url_file);
$jsop = json_decode($op_js, true);
if($jsop["open"]==0){
	echo"<b class='cr'>ปิดเดิมพัน</b>";
	exit();
}

$url_file="../../../games/json/bet_close.txt";
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
$bet_close=$date2_bet[0][con_bacara_close];

if($bet_close==0){
	exit();
	}
$url_file2="../../../games/json/bet_time.txt";
$date2_js2=file_get_contents2($url_file2);
$date2_bet2 = json_decode($date2_js2, true);
$bet_time2=$date2_bet2[0][timex];
$new_time2=(90)-(time()-$bet_time2);

if($new_time2<=0){
exit();
}
$_POST[bet]=intval(str_replace(",","",trim($_POST[bet])));
$sumbet=$_POST[bet];
$type=$_POST[type];

$url_file="../../../games/json/bet_id.txt";
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
$bet_id=$date2_bet[0][id];

#echo $bet_id;

$sql="select *   from bom_tb_member where m_id='$_SESSION[mid]'";
$re_m=sql_array($sql);

$re_m[m_count]=intval($re_m[m_count]);
if($re_m[m_count]<=0){
	echo"<b class='cr'>เครดิต ไม่พอมี : $re_m[m_count] บาท</b>";
	exit();
}
if($sumbet>$re_m[m_count]){
	$sumbet=$re_m[m_count];
	}

$exx=explode("," , $type);
$bcounts = 0;
if(count($exx)==1){
	$bcounts = $exx[0];
}

if(count($exx)==1){
	$paywin=$arr_fish_pay[1];
}else if(count($exx)==2){
	$paywin=$arr_fish_pay[2];
}else if(count($exx)==3){	
	$paywin=$arr_fish_pay[3];
}

#$paywin=$arr_fish_pay[count($exx)];

########################################
################Config Member
$url_file="../../../json/config/member/LottoConfig_".$_SESSION[mid].".json";	
$lot6_js=file_get_contents2($url_file);
$lot_m = json_decode($lot6_js, true);

################Config Super
$url_file="../../../json/config/agent/LottoConfig_".$_SESSION['crid1'].".json";	
$lot1_js=file_get_contents2($url_file);
$lot_r1 = json_decode($lot1_js, true);
################Config Senior
$url_file="../../../json/config/agent/LottoConfig_".$_SESSION['crid2'].".json";	
$lot2_js=file_get_contents2($url_file);
$lot_r2 = json_decode($lot2_js, true);
################Config Master
$url_file="../../../json/config/agent/LottoConfig_".$_SESSION['crid3'].".json";	
$lot3_js=file_get_contents2($url_file);
$lot_r3 = json_decode($lot3_js, true);
################Config Agent
$url_file="../../../json/config/agent/LottoConfig_".$_SESSION['crid4'].".json";	
$lot4_js=file_get_contents2($url_file);
$lot_r4 = json_decode($lot4_js, true);


$r1force=$lot_r1[r_force_games]; 
$r2force=$lot_r2[r_force_games]; 
$r3force=$lot_r3[r_force_games]; 
$r4force=$lot_r4[r_force_games]; 


$r2myshare=$lot_r2[r_myshare_games]; 
$r3myshare=$lot_r3[r_myshare_games]; 
$r4myshare=$lot_r4[r_myshare_games]; 
$hshare=$lot_m[m_myshare_games]; 


$r1dis=$lot_r1[r_dis_games]; 
$r2dis=$lot_r2[r_dis_games]; 
$r3dis=$lot_r3[r_dis_games]; 
$r4dis=$lot_r4[r_dis_games]; 
$hdis=$lot_m[m_dis_games]; 

/*$paywin1=$paywin+($r1dis/100);
$paywin2=$paywin+($r2dis/100);
$paywin3=$paywin+($r3dis/100);
$paywin4=$paywin+($r4dis/100);
$paywinh=$paywin+($hdis/100);*/


$paywin1=$paywin;
$paywin2=$paywin;
$paywin3=$paywin;
$paywin4=$paywin;
$paywinh=$paywin;


$diswin1=$sumbet-($r1dis/10);
$diswin2=$sumbet-($r2dis/10);
$diswin3=$sumbet-($r3dis/10);
$diswin4=$sumbet-($r4dis/10);
$diswinh=$sumbet-($hdis/10);




$ms=_myshare( $r1force, $r2force , $r3force , $r4force  ,$r2myshare ,$r3myshare ,$r4myshare ,$hshare );
$r2myshare=$ms[my1];
$r3myshare=$ms[my2];
$r4myshare=$ms[my3];
$hshare=$ms[my4];
########################################


#############################
if(count($exx)>1){
$sql="INSERT IGNORE INTO  bom_tb_games_step (hs_play,	hs_date,	m_id, hs_total, game_zone) values ('$type',now() , '$_SESSION[mid]' ,'$sumbet','$zone')";
sql_query($sql);
	}

/*
$sql="insert into bom_tb_games_bill_play_live
 (bill_id,	play_timestam,	play_datenow	,play_bet		,play_pay,	play_dis,	play_br_pay,	play_br_dis	,b_total	,b_pay,br_pay,b_share,	m_id	,r_id,b_time_last , m_from ) values 
 ('$bet_id','$time_stam',now(),'$type','$paywin' ,'0','$paywin' ,'0' ,'$sumbet' ,'$sumbet' ,'$sumbet' ,' $re_m[m_share]' ,'$_SESSION[mid]','$_SESSION[crid]','$new_time2'  ,'$_SESSION[m_from]')";
 */
$sql="INSERT IGNORE INTO  bom_tb_games_bill_play_live (
bet_id ,	play_timestam,	play_datenow	,play_bet		,play_pay, b_total , b_pay ,  game_zone , m_id, r_agent_id , b_time_last ,b_bet_from,b_date, bonus_m_id
,play_br_pay_1,	play_br_pay_2	,play_br_pay_3,	play_br_pay_4
,br_pay_1	,br_pay_2,	br_pay_3	,br_pay_4
,b_share_m , b_share_force_1  , b_share_force_2  , b_share_force_3  , b_share_force_4
	 ,b_myshare_1 ,b_myshare_2 ,b_myshare_3
 ) values (
 '$bet_id','$time_stam',now(),'$type','$paywinh'  ,'$sumbet'  ,'$diswinh' ,'$zone'  ,'$_SESSION[mid]' ,'$_SESSION[r_agent_id]' ,'$new_time2','w','$view_date','$_SESSION[bonus_m_id]'
 ,'$paywin1' ,'$paywin2' ,'$paywin3' ,'$paywin4' 
  ,'$diswin1'  ,'$diswin2' ,'$diswin3'  ,'$diswin4'
   ,'$hshare' ,'$r1force' ,'$r2force' ,'$r3force' ,'$r4force' 
   	,'$r2myshare' 	,'$r3myshare' 	,'$r4myshare' 
  )";
sql_query($sql);	
$sql="update bom_tb_member set m_count=m_count-$sumbet  where m_id='$_SESSION[mid]' ";
sql_query($sql);

//if($bcounts>0){
foreach($exx as &$values){
	if($values!=""){
	$vals = $sumbet/count($exx);
	$sql="update bom_tb_games_bet_live set  bet_count_$values=bet_count_$values +$vals    where bet_id='$bet_id'  and game_zone='$zone'";
	sql_query($sql);
//}
}	
	
}

/*
################################ค่าแนะนำสมาชิก
$sql="select *  from bom_tb_fish_bill_play   where bet_id='$bet_id'  and m_from='$_SESSION[m_from]'  order by  play_id desc  limit 1 ";
$rex=sql_array($sql);
	$xx_bonus=$sumbet*(2/100);
	$sql="insert into bom_tb_from_bonus_fish  (	play_id,	b_date_bingo	,b_total	,fb_com,	m_id	,m_from, bill_id) values ( '$rex[play_id]',now(),'$sumbet','$xx_bonus','$rex[m_id]' ,'$_SESSION[m_from]','$bet_id') ";
	sql_query($sql);
	#######################################################อัพเดทเงินสมาชิก
	$sql="update bom_tb_member set m_count=m_count+$xx_bonus where m_id='$_SESSION[m_from]' ";
	sql_query($sql);
	
*/
$sql="select *  from bom_tb_games_bet_live   where bet_id='$bet_id'   and game_zone='$zone'  order by  bet_id desc  limit 1 ";
$rec=sql_array($sql);

$url_file="../../../games/fish/json/count_bet.txt";
$js1=array();
$js1[]=array("1"=>"$rec[bet_count_1]","2"=>"$rec[bet_count_2]","3"=>"$rec[bet_count_3]","4"=>"$rec[bet_count_4]","5"=>"$rec[bet_count_5]","6"=>"$rec[bet_count_6]");
$txt11=json_encode($js1);
write($url_file ,$txt11,"w+"); 


unset($_SESSION["fish_ok"]);
// echo'<script>get_credit();parent.rightx._vvxx1();</script>';
echo "success";
?>
