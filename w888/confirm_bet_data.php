<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
// require('../inc/conn.php');
// require('../inc/function.php');

// require("../lang/member_lang.php");
// require("../lang/function_array.php");

require('inc/conn.php');
require('inc/function.php');
require("lang/variable_lang.php");
require("lang/function_array.php");



######################ระงับ
  if(intval($_SESSION['m1']['m_active'])!=1){ 
@session_start(); 
@session_destroy();
echo "<script type='text/javascript' >
var Mod='Msg';
var Type='user Suspended';
parent.SetConfirmBetResult(Mod,Type);
</script>"; 
 exit();
 }
 
 ########################Agent
foreach($_SESSION['arid'] as $rid){
	
	
					######################ระงับ
					  if(intval($_SESSION['ardata'][$rid]['r_active'])!=1){ 
					 	 @session_start(); 
						@session_destroy();
									echo "<script type='text/javascript' >
									var Mod='Msg';
									var Type='agen Suspended';
									parent.SetConfirmBetResult(Mod,Type);
									</script>"; 
									 exit();
					 }
}

$sql="select * from bom_tb_member where m_id='".$_SESSION['m_id']."'";
$re_m=sql_array($sql);

if($re_m['m_id']==""){ 
echo "<script type='text/javascript' >
var Mod='Msg';
var Type='userProblem';
parent.SetConfirmBetResult(Mod,Type);
</script>"; 
 exit();
}

if($re_m['m_count']<=0){$re_m['m_count']=0;}


$view_date=_bdate();
$ip=_bIP();
$set_status=0;

$BPBetKey = $_POST["BPBetKey"];
$btnBPSubmit = $_POST["btnBPSubmit"];
$sporttype = $_POST["sporttype"];
$ood = $_POST["oddsRequest"];
$q_sum = str_replace(',', '', $_POST["BPstake"]);
$num_s = 1;
$oddsType = $_POST['oddsType'];


if($re_m['m_count']<$q_sum){
	echo"<script type='text/javascript' >
var Mod='Msg';
var Type='creditProblem';
parent.SetConfirmBetResult(Mod,Type);
</script>";
exit(); 
	  }


$ex = explode("_" , $BPBetKey);





$rs_b = sql_array_sp("select * from bom_tb_ball_list where id_type_1 = '$ex[0]' or id_type_2 = '$ex[0]' or id_type_3 = '$ex[0]' or id_type_4 = '$ex[0]' or id_type_5 = '$ex[0]' or id_type_6 = '$ex[0]' or id_type_7 = '$ex[0]' or id_type_8 = '$ex[0]'");


######################No bet
  if(intval($rs_b['no_bet'])!=1){ 
echo "<script type='text/javascript' >
var Mod='Msg';
var Type='Waiting bet price';
parent.SetConfirmBetResult(Mod,Type);
</script>"; 
 exit();
 }
 


if($ex[0]==$rs_b["id_type_1"]){
	$sport_type_select = 1; //FT.HDP
}else if($ex[0]==$rs_b["id_type_2"]){
	$sport_type_select = 2; //FT.O/U
}else if($ex[0]==$rs_b["id_type_3"]){
	$sport_type_select = 3; //FT.1X2
}else if($ex[0]==$rs_b["id_type_4"]){
	$sport_type_select = 4; //FT.Odd/Even
}else if($ex[0]==$rs_b["id_type_5"]){
	$sport_type_select = 5; //1H.HDP
}else if($ex[0]==$rs_b["id_type_6"]){
	$sport_type_select = 6; //1H.O/U
}else if($ex[0]==$rs_b["id_type_7"]){
	$sport_type_select = 7; //1H.1X2
}else if($ex[0]==$rs_b["id_type_8"]){
	$sport_type_select = 8; //1H.Odd/Even
}




 $exmin=@explode(',',$_SESSION['m1']['m_sport_min']);
 $exmax=@explode(',',$_SESSION['m1']['m_sport_max']);
 
 #################เล่นสูงสุด น้อยสุด
 if($rs_b["b_zone"]==1){#############มวย
$bet_min=$exmin[4];	 
$bet_max=$exmax[8];
$bet_over=$exmax[7];
 }elseif($rs_b["b_zone"]==6){############บอล
					 if($sport_type_select>=5){###1H
				$bet_min=$exmin[1];	 
				$bet_max=$exmax[3];
				$bet_over=$exmax[1];
					 }else{########FT
		        $bet_min=$exmin[2];	 
				$bet_max=$exmax[4];
				$bet_over=$exmax[2];
						 }
	 }else{##############กีฬา
$bet_min=$exmin[3];	 
$bet_max=$exmax[6];
$bet_over=$exmax[5];
		 }
	

		 

######################Min
  if($bet_min>$q_sum){ 
echo "<script type='text/javascript' >
var Mod='Msg';
var Type='Minimum bet : $bet_min';
parent.SetConfirmBetResult(Mod,Type);
</script>"; 
 exit();
 }

#echo print_r($exmax);	 
#exit(); 
 ######################Max
  if($bet_max<$q_sum){ 
echo "<script type='text/javascript' >
var Mod='Msg';
var Type='Maximum bet : $bet_max';
parent.SetConfirmBetResult(Mod,Type);
</script>"; 
 exit();
 }


 ##################เล่นสูงสุดต่อคู่ / lสมาชิก
 $rs_over = sql_array_sp("select * from bom_tb_over where m_id = '".$_SESSION['m_id']."' and b_id = '".$rs_b["b_id"]."' ");
 $sum_over=$q_sum+$rs_over['b_total'];
 
  $rs_over2 = sql_array_sp("select * from bom_tb_over_ag where r_id = '".$_SESSION['cr_id']."' and b_id = '".$rs_b["b_id"]."' ");
  $sum_over2=$q_sum+$rs_over2['b_total'];
 
 if($sum_over > $bet_over){
echo "<script type='text/javascript' >
var Mod='Msg';
var Type='Over bet : $rs_b[b_name_1_en]';
parent.SetConfirmBetResult(Mod,Type);
</script>"; 
 exit();
 }
 
 $bet_over2=$bet_over * 3; # 3 เท่า
  if($sum_over2 > $bet_over2){
echo "<script type='text/javascript' >
var Mod='Msg';
var Type='Over bet : $rs_b[b_name_1_en]';
parent.SetConfirmBetResult(Mod,Type);
</script>"; 
 exit();
 }
 ################### Over Mem
 if($rs_over['b_id']==""){
 $sql="INSERT IGNORE INTO bom_tb_over  ( b_id ,m_id , b_total , b_zone ) 
values ('".$rs_b["b_id"]."' ,'".$_SESSION['m_id']."' , '$q_sum' ,'".$rs_b["b_zone"]."'  )";
sql_query_sp($sql);
	 }else{
	$sql="update IGNORE  bom_tb_over set  
	b_total=b_total + $q_sum
	where m_id = '".$_SESSION['m_id']."' and b_id = '".$rs_b["b_id"]."'  ";
sql_query_sp($sql);	
		 }
 ################### Over AG
  if($rs_over2['b_id']==""){
 $sql="INSERT IGNORE INTO bom_tb_over_ag  ( b_id ,r_id , b_total , b_zone ) 
values ('".$rs_b["b_id"]."' ,'".$_SESSION['cr_id']."' , '$q_sum' ,'".$rs_b["b_zone"]."'  )";
sql_query_sp($sql);
	 }else{
	$sql="update IGNORE  bom_tb_over_ag set  
	b_total=b_total + $q_sum
	where r_id = '".$_SESSION['cr_id']."' and b_id = '".$rs_b["b_id"]."'  ";
sql_query_sp($sql);	
		 }
 

		 
		 
###################ส่วนลดบอลเต็ง
$arr_comm=array($_SESSION['m1']['m_sport_dis'],$_SESSION['r1']['r_sport_dis'],$_SESSION['r2']['r_sport_dis'],$_SESSION['r3']['r_sport_dis'],$_SESSION['r4']['r_sport_dis'],$_SESSION['r5']['r_sport_dis'],$_SESSION['r6']['r_sport_dis'],$_SESSION['r7']['r_sport_dis'],$_SESSION['r8']['r_sport_dis']);

$comm=_comm(1 , $_SESSION['m_level'] , $arr_comm , $rs_b["b_zone"]);

###################หุ้น บอลเต็ง
if( $rs_b["b_live"]==0){	

$arr_share=array(0,$_SESSION['r1']['r_sport_share'],$_SESSION['r2']['r_sport_share'],$_SESSION['r3']['r_sport_share'],$_SESSION['r4']['r_sport_share'],$_SESSION['r5']['r_sport_share'],$_SESSION['r6']['r_sport_share'],$_SESSION['r7']['r_sport_share'],$_SESSION['r8']['r_sport_share']);

$arr_myshare=array(0,$_SESSION['r1']['r_sport_myshare'],$_SESSION['r2']['r_sport_myshare'],$_SESSION['r3']['r_sport_myshare'],$_SESSION['r4']['r_sport_myshare'],$_SESSION['r5']['r_sport_myshare'],$_SESSION['r6']['r_sport_myshare'],$_SESSION['r7']['r_sport_myshare'],$_SESSION['r8']['r_sport_myshare']);

}else{
	
####################live
$arr_share=array(0,$_SESSION['r1']['r_sport_share_live'],$_SESSION['r2']['r_sport_share_live'],$_SESSION['r3']['r_sport_share_live'],$_SESSION['r4']['r_sport_share_live'],$_SESSION['r5']['r_sport_share_live'],$_SESSION['r6']['r_sport_share_live'],$_SESSION['r7']['r_sport_share_live'],$_SESSION['r8']['r_sport_share_live']);

$arr_myshare=array(0,$_SESSION['r1']['r_sport_myshare_live'],$_SESSION['r2']['r_sport_myshare_live'],$_SESSION['r3']['r_sport_myshare_live'],$_SESSION['r4']['r_sport_myshare_live'],$_SESSION['r5']['r_sport_myshare_live'],$_SESSION['r6']['r_sport_myshare_live'],$_SESSION['r7']['r_sport_myshare_live'],$_SESSION['r8']['r_sport_myshare_live']);
	}


$share= _share_sport($num_s , $_SESSION['m_level'] , $arr_share , $arr_myshare , $rs_b["b_zone"]   );
$share0=$share['sm'];
$share1=$share['s1'];
$share2=$share['s2'];
$share3=$share['s3'];
$share4=$share['s4'];
$share5=$share['s5'];
$share6=$share['s6'];
$share7=$share['s7'];
$share8=$share['s8'];


$r1nam="";




 $sql="INSERT IGNORE INTO bom_tb_football_bill_live  ( b_date ,b_numstep , b_timestam , b_datenow , b_total , b_dis_arr ,m_ref
 , m_id , r_id  ,  b_ip  , b_sum_pay ,r_agent_id ,b_confirm
, b_share , br_share_1 , br_share_2 , br_share_3 , br_share_4 , br_share_5 , br_share_6 , br_share_7 , br_share_8
 ) 
values ('$view_date' ,'$num_s','$time_stam','".date("Y-m-d H:i:s",$time_stam)."','$q_sum' ,'$comm' ,'".$_SESSION['m1']['m_ref']."'
 ,'".$_SESSION['m_id']."' ,'".$_SESSION['cr_id']."','$ip','$ood' ,'".$_SESSION['r_agent_id']."','$re_m[m_confirm]'
,'$share0'  ,'$share1'  ,'$share2'  ,'$share3'  ,'$share4'  ,'$share5'  ,'$share6'  ,'$share7'  ,'$share8'
 )";

sql_query($sql);

$sql="select * from bom_tb_football_bill_live   where m_id='".$_SESSION['m_id']."'  order by bill_id desc limit 1";
$reeb=sql_array($sql);
$man_bill=$reeb['bill_id'];


if($man_bill!="" and $rs_b["b_live"]!=4){	


	$m_sport_type = $rs_b["b_zone"];
	$m_sport_zone = 1;	
	#$sport_zone = array(1 =>"ก่อนเวลา", 2 =>"สด");
	$m_score= $rs_b["b_score_full"];
	$m_bid= $rs_b["b_id"];
	$m_add= $rs_b["b_add"];
	$m_rob= 1;	
	$sport_home_away = $ex[1];
	
	#$play_time_live=_tlive( $rs_b["b_live_showtime"]);	
	$play_time_live=($rs_b["b_live_showtime"]);	
	$play_time_live_not= $rs_b["b_live_showtime"];
	$ball_step= $rs_b["b_step"];

	if($play_time_live>0){
		$b_running = 1;
	}else{
		$b_running = 0;
	}
			
			
	$rob=1;	
	$m_big= $rs_b["b_big"];	
	$m_zone= $rs_b["b_zone"];	
	$m_team1= $rs_b["b_name_1_th"];	
	$m_team2= $rs_b["b_name_2_th"];	
	$m_playtime= $rs_b["b_bet_time"];	
	$m_score_FT= $rs_b["b_run_score_full"];	
	$m_score_1H= $rs_b["b_run_score_half"];	


	if($sport_home_away=="h" and $sport_type_select==1){
		$sport_nam_now = $rs_b["b_hdc_1"];
		$choiceValue = ($rs_b["b_name_1_th"]!="" ? $rs_b["b_name_1_th"] : $rs_b["b_name_1_en"]);
		$BetKindValue = $rs_b["b_hdc"];
		$m_sport_man = 1;
		$sport_nam_now = convert_nam($sport_nam_now , $oddsType);
	}else if($sport_home_away=="a" and $sport_type_select==1){
		$sport_nam_now = $rs_b["b_hdc_2"];
		$choiceValue = ($rs_b["b_name_2_th"]!="" ? $rs_b["b_name_2_th"] : $rs_b["b_name_2_en"]);
		$BetKindValue = $rs_b["b_hdc"];
		$m_sport_man = 2;
		$sport_nam_now = convert_nam($sport_nam_now , $oddsType);
	}else if($sport_home_away=="h" and $sport_type_select==2){
		$sport_nam_now = $rs_b["b_goal_1"];
		$choiceValue = $lang_member[899];
		$BetKindValue = $rs_b["b_goal"];
		$m_sport_man = 3;
		$sport_nam_now = convert_nam($sport_nam_now , $oddsType);
	}else if($sport_home_away=="a" and $sport_type_select==2){
		$sport_nam_now = $rs_b["b_goal_2"];
		$choiceValue = $lang_member[900];
		$BetKindValue = $rs_b["b_goal"];
		$m_sport_man = 4;
		$sport_nam_now = convert_nam($sport_nam_now , $oddsType);
	}else if($sport_home_away=="1" and $sport_type_select==3){
		$sport_nam_now = $rs_b["b_1x2_1"];
		$choiceValue = $lang_member[805].".1";
		$BetKindValue = "";
		$m_sport_man = 7;
	}else if($sport_home_away=="X" and $sport_type_select==3){
		$sport_nam_now = $rs_b["b_1x2_x"];
		$choiceValue = $lang_member[805].".X";
		$BetKindValue = "";
		$m_sport_man = 8;
	}else if($sport_home_away=="2" and $sport_type_select==3){
		$sport_nam_now = $rs_b["b_1x2_2"];
		$choiceValue = $lang_member[805].".2";
		$BetKindValue = "";
		$m_sport_man = 9;
	}elseif($sport_home_away=="h" and $sport_type_select==3){
		$sport_nam_now = $rs_b["b_1x2_1"];
		$choiceValue = $rs_main["h"];
		$BetKindValue = "";
		$m_sport_man = 7;
	}else if($sport_home_away=="a" and $sport_type_select==3){
		$sport_nam_now = $rs_b["b_1x2_2"];
		$choiceValue = $rs_main["a"];
		$BetKindValue = "";
		$m_sport_man = 9;
	}else if($sport_home_away=="h" and $sport_type_select==4){
		$sport_nam_now = $rs_b["b_odd"];
		$choiceValue = $lang_member[453];
		$BetKindValue = "";
		$m_sport_man = 5;
		$sport_nam_now = convert_nam($sport_nam_now , $oddsType);
	}else if($sport_home_away=="a" and $sport_type_select==4){
		$sport_nam_now = $rs_b["b_even"];
		$choiceValue = $lang_member[459];
		$BetKindValue = "";
		$m_sport_man = 6;
		$sport_nam_now = convert_nam($sport_nam_now , $oddsType);
	}else if($sport_home_away=="h" and $sport_type_select==5){
		$sport_nam_now = $rs_b["b_1h_hdc_1"];
		$choiceValue = ($rs_b["b_name_1_th"]!="" ? $rs_b["b_name_1_th"] : $rs_b["b_name_1_en"]);
		$BetKindValue = $rs_b["b_1h_hdc"];
		$m_sport_man = 11;
		$m_big= $rs_b["b_1h_big"];	
		$sport_nam_now = convert_nam($sport_nam_now , $oddsType);
	}else if($sport_home_away=="a" and $sport_type_select==5){
		$sport_nam_now = $rs_b["b_1h_hdc_2"];
		$choiceValue = ($rs_b["b_name_2_th"]!="" ? $rs_b["b_name_2_th"] : $rs_b["b_name_2_en"]);
		$BetKindValue = $rs_b["b_1h_hdc"];
		$m_sport_man = 12;
		$m_big= $rs_b["b_1h_big"];	
		$sport_nam_now = convert_nam($sport_nam_now , $oddsType);
	}else if($sport_home_away=="h" and $sport_type_select==6){
		$sport_nam_now = $rs_b["b_1h_goal_1"];
		$choiceValue = $lang_member[899];
		$BetKindValue = $rs_b["b_1h_goal"];
		$m_sport_man = 13;
		$m_big= $rs_b["b_1h_big"];	
		$sport_nam_now = convert_nam($sport_nam_now , $oddsType);
	}else if($sport_home_away=="a" and $sport_type_select==6){
		$sport_nam_now = $rs_b["b_1h_goal_2"];
		$choiceValue = $lang_member[900];
		$BetKindValue = $rs_b["b_1h_goal"];
		$m_sport_man = 14;
		$m_big= $rs_b["b_1h_big"];	
		$sport_nam_now = convert_nam($sport_nam_now , $oddsType);
	}else if($sport_home_away=="1" and $sport_type_select==7){
		$sport_nam_now = $rs_b["b_1h_1x2_1"];
		$choiceValue = $lang_member[803].".1";
		$BetKindValue = "";
		$m_sport_man = 17;
		$m_big= $rs_b["b_1h_big"];	
	}else if($sport_home_away=="X" and $sport_type_select==7){
		$sport_nam_now = $rs_b["b_1h_1x2_x"];
		$choiceValue = $lang_member[803].".X";
		$BetKindValue = "";
		$m_sport_man = 18;
		$m_big= $rs_b["b_1h_big"];	
	}else if($sport_home_away=="2" and $sport_type_select==7){
		$sport_nam_now = $rs_b["b_1h_1x2_2"];
		$choiceValue = $lang_member[803].".2";
		$BetKindValue = "";
		$m_sport_man = 19;
		$m_big= $rs_b["b_1h_big"];	
	}else if($sport_home_away=="h" and $sport_type_select==8){
		$sport_nam_now = $rs_b["b_1h_odd"];
		$choiceValue = $lang_member[453];
		$BetKindValue = "";
		$m_sport_man = 15;
		$m_big= $rs_b["b_1h_big"];	
		$sport_nam_now = convert_nam($sport_nam_now , $oddsType);
	}else if($sport_home_away=="a" and $sport_type_select==8){
		$sport_nam_now = $rs_b["b_1h_even"];
		$choiceValue = $lang_member[459];
		$BetKindValue = "";
		$m_sport_man = 16;
		$m_big= $rs_b["b_1h_big"];	
		$sport_nam_now = convert_nam($sport_nam_now , $oddsType);
	}
	
	
	$m_hdc = $BetKindValue;
	$m_pay = $sport_nam_now;

	if($oddsType==1){
		$play_view = "DEC";
		$play_my_win=($q_sum*$m_pay)-$q_sum;		
		$play_my_loss=$q_sum;		
	}else if($oddsType==2){
		$play_view = "HK";
		$play_my_win=$q_sum*$m_pay;		
		$play_my_loss=$q_sum;		
	}else{
		$play_view = "MY";
		
		if($m_pay>=0.00){
		$play_my_win=$q_sum*$m_pay;		
		$play_my_loss=$q_sum;		
		}else{
		############# ตัวแดง
		$play_my_win=$q_sum;	
		$play_my_loss=$q_sum*(-$m_pay);		
			}
	
	}
	$accept=1;
	
	if($m_pay!=0.00){
		$sql="INSERT IGNORE INTO bom_tb_football_bill_play_live  (bill_id ,play_timestam ,play_datenow ,play_type,play_my_win , play_my_loss ,play_view ,play_pay ,play_bet ,b_score_live ,b_time_play ,b_running ,b_confirm
		,b_id ,b_big ,b_accept  ,play_numstep ,b_numstep ,b_add ,b_zone , b_dis_arr
		,b_total , b_sum ,m_id , r_id  ,b_date ,r_agent_id
		 ,play_nam
		  , b_share , br_share_1 , br_share_2 , br_share_3 , br_share_4 , br_share_5 , br_share_6 , br_share_7 , br_share_8
		  )  	values('$man_bill','$time_stam','".date("Y-m-d H:i:s")."','$m_sport_man','$play_my_win' , '$play_my_loss', '$play_view' ,'$m_pay' ,'$m_hdc' ,'$m_score_FT' ,'$play_time_live' ,'$b_running','$re_m[m_confirm]'
		,'$m_bid','$m_big' , '$accept'  ,'$num_s' ,'$num_s','$m_add','$rs_b[b_zone]','$comm'
		,'$q_sum' , '$play_my_loss' , '".$_SESSION['m_id']."' ,'".$_SESSION['cr_id']."' ,'$view_date','".$_SESSION['r_agent_id']."'
		,'$r1nam' 
        ,'$share0'  ,'$share1'  ,'$share2'  ,'$share3'  ,'$share4'  ,'$share5'  ,'$share6'  ,'$share7'  ,'$share8'
		);";
		if(sql_query($sql)){
					
					
		}else{
			$set_status++;
		}
	}else{
		#################ไม่สำเร็จ
		$set_status++;
	}

}else{
	$set_status++;
}
if($set_status>0){
	##########################################################ไม่สำเร็จ
	##########################################################ไม่สำเร็จ
	
	$sql="delete from bom_tb_football_bill_live where bill_id='$man_bill' and m_id='".$_SESSION['m_id']."'; ";
	sql_query($sql);	
	$sql="delete from bom_tb_football_bill_play_live where bill_id='$man_bill' and m_id='".$_SESSION['m_id']."'; ";
	sql_query($sql);	
	
	$res["status"] = 0;##1=ไม่สำเร็จ
	$res["type_bet"] = 0; #
	
	echo"	<script type='text/javascript' >
	var Mod='Msg';
	var Type='betProblem';
	parent.SetConfirmBetResult(Mod,Type);
	</script>";
	
	
	
}else{
	$wait = 1;
	##########################################################สำเร็จ
	##########################################################สำเร็จ
	$res["type_bet"] = $wait; 
	
	$sql="update IGNORE  bom_tb_football_bill_live set  
	b_sum_pay='$m_pay' 
	, b_accept='$wait'
	, b_running='$b_running'
	, b_zone='$rs_b[b_zone]'
	, play_my_win='$play_my_win'
	 , play_my_loss='$play_my_loss'
	 , b_sum='$play_my_loss'
	where bill_id='$man_bill' and  m_id='$_SESSION[m_id]' ";
	sql_query($sql);	
	


	#######################เก็บถาวร
	$sql="update IGNORE  bom_tb_member set m_count = m_count - $play_my_loss , m_bet_date=now()  where m_id = '".$_SESSION['m_id']."'";
	sql_query($sql);
	$res["status"] = 1;##1=สำเร็จ
	unset($_SESSION["busket"]);
	?>
	<script type='text/javascript' >
		<? if($b_running==1){ ?>
var Mod='WaitingBet';
		<? }else{ ?>
var Mod='BListMini';
		<? } ?>	
var Type='';
//parent.fFrame.topFrame.g_SMF.removeTicket('<?=$ex[0]?>','<?=$ex[1]?>',<?=$rs_b["b_id"]?>);
parent.SetConfirmBetResult(Mod,Type);

	</script>
	<?
}
?>



