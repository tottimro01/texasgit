<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
require('../inc/conn.php');
require('../inc/function.php');

require("../lang/variable_lang.php");
require("../lang/function_array.php");

######################ระงับ
  if(intval($_SESSION['m1']['m_active'])!=1){ 
  					 	 @session_start(); 
						@session_destroy();
echo "<script type='text/javascript' >
var Mod='Msg';
	var Type='User Suspended';
parent.SetConfirmBetResult(Mod,Type);
</script>"; 
 exit();
 }
 
 
   ###############ปิดไม่ให้เล่น
 $exe1=@explode(",",$_SESSION['m1']['m_open']);
  if(intval($exe1[7])!=1){ 
echo "<script type='text/javascript' >
var Mod='Msg';
	var Type='User Suspended';
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
										var Type='Agen Suspended';
									parent.SetConfirmBetResult(Mod,Type);
									</script>"; 
									 exit();
					 }
}


 ###############ปิดไม่ให้เล่น
foreach($_SESSION['arid'] as $rid){
					######################ระงับ
					$exe2=@explode(",",$_SESSION['ardata'][$rid]['r_open']);
					  if(intval($exe2[7])!=1){ 
									echo "<script type='text/javascript' >
									var Mod='Msg';
										var Type='Agen Suspended';
									parent.SetConfirmBetResult(Mod,Type);
									</script>"; 
									 exit();
					 }
}	 


$sql="select * from bom_tb_member where m_id='".$_SESSION['m_id']."'";
$re_m=sql_array($sql);

if($re_m['m_id']==""){ 
echo"<script type='text/javascript' >
var Mod='Msg';
var Type='userProblem';
parent.SetConfirmBetResult(Mod,Type);
parent.go_del_all();
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
$ood = 1;
$q_sum = str_replace(',', '', $_POST["BPstake"]);
$num_s = $_POST["n_step"];
$oddsType = $_POST['oddsType'];
$b_running_bill = 0;
$b_running_step = 0;

if($re_m['m_count']<$q_sum){ 

echo"<script type='text/javascript' >
var Mod='Msg';
var Type='creditProblem';
parent.SetConfirmBetResult(Mod,Type);
parent.go_del_all();
</script>";
 exit();  
 }
 
 
 $exmax=@explode(",",$_SESSION['m1']['m_sport_step_max']);
 $exmin=@explode(",",$_SESSION['m1']['m_sport_step_min']);
 
 $step_max=$exmax[1];
 $step_min=$exmin[1];
 
 
 if($step_max<$q_sum){ 

echo"<script type='text/javascript' >
var Mod='Msg';
var Type='Maximum bet : $step_max';
parent.SetConfirmBetResult(Mod,Type);
parent.go_del_all();
</script>";
 exit();  
 }
 
  if($step_min>$q_sum){ 

echo"<script type='text/javascript' >
var Mod='Msg';
var Type='Minimum bet : $step_min';
parent.SetConfirmBetResult(Mod,Type);
parent.go_del_all();
</script>";
 exit();  
 }


###################ส่วนลด สเต็ป
$arr_comm=array($_SESSION['m1']['m_sport_step_dis'],$_SESSION['r1']['r_sport_step_dis'],$_SESSION['r2']['r_sport_step_dis'],$_SESSION['r3']['r_sport_step_dis'],$_SESSION['r4']['r_sport_step_dis'],$_SESSION['r5']['r_sport_step_dis'],$_SESSION['r6']['r_sport_step_dis'],$_SESSION['r7']['r_sport_step_dis'],$_SESSION['r8']['r_sport_step_dis']);

$comm=_comm($num_s , $_SESSION['m_level'] , $arr_comm , 0 );

###################หุ้น สเต็ป
$arr_share=array(0,$_SESSION['r1']['r_sport_share'],$_SESSION['r2']['r_sport_share'],$_SESSION['r3']['r_sport_share'],$_SESSION['r4']['r_sport_share'],$_SESSION['r5']['r_sport_share'],$_SESSION['r6']['r_sport_share'],$_SESSION['r7']['r_sport_share'],$_SESSION['r8']['r_sport_share']);

$arr_myshare=array(0,$_SESSION['r1']['r_sport_myshare'],$_SESSION['r2']['r_sport_myshare'],$_SESSION['r3']['r_sport_myshare'],$_SESSION['r4']['r_sport_myshare'],$_SESSION['r5']['r_sport_myshare'],$_SESSION['r6']['r_sport_myshare'],$_SESSION['r7']['r_sport_myshare'],$_SESSION['r8']['r_sport_myshare']);

$share= _share_sport($num_s , $_SESSION['m_level'] , $arr_share , $arr_myshare , 0   );
$share0=$share['sm'];
$share1=$share['s1'];
$share2=$share['s2'];
$share3=$share['s3'];
$share4=$share['s4'];
$share5=$share['s5'];
$share6=$share['s6'];
$share7=$share['s7'];
$share8=$share['s8'];



$exmax=@explode(',',$_SESSION['m1']['m_sport_step_day']);
$bet_over=$exmax[1];
 ##################เล่นสูงสุดต่อวัน / lสมาชิก
 $rs_over = sql_array_sp2("select * from bom_tb_step_over where m_id = '".$_SESSION['m_id']."' ");
 $sum_over=$q_sum+$rs_over['b_total'];
 
  if($sum_over > $bet_over){
echo "<script type='text/javascript' >
var Mod='Msg';
var Type='Over bet : $rs_b[b_name_1_en]';
parent.SetConfirmBetResult(Mod,Type);
</script>"; 
 exit();
 }
 
  ################### Over Mem
 if($rs_over['m_id']==""){
 $sql="INSERT IGNORE INTO bom_tb_step_over  ( m_id , b_total , b_date ) 
values ('".$_SESSION['m_id']."' , '$q_sum' ,'$view_date'  )";
sql_query_sp2($sql);
	 }else{
	$sql="update IGNORE  bom_tb_step_over set  
	b_total=b_total + $q_sum
	where m_id = '".$_SESSION['m_id']."'  ";
sql_query_sp2($sql);	
		 }
 
 
 #########################AF
if($re_m['bonus_m_id']>0){
	   $comaf=$af_sport;
	}else{
		$comaf=0;
	}


if($_SESSION['m_level']==1){
$r1nam = $_SESSION['ar_nam'][0].",".$_SESSION['ar_nam'][1];
}elseif($_SESSION['m_level']==2){
$r1nam = $_SESSION['ar_nam'][0].",".$_SESSION['ar_nam'][1].",".$_SESSION['ar_nam'][2];
}elseif($_SESSION['m_level']==3){
$r1nam = $_SESSION['ar_nam'][0].",".$_SESSION['ar_nam'][1].",".$_SESSION['ar_nam'][2].",".$_SESSION['ar_nam'][3];
}elseif($_SESSION['m_level']==4){
$r1nam = $_SESSION['ar_nam'][0].",".$_SESSION['ar_nam'][1].",".$_SESSION['ar_nam'][2].",".$_SESSION['ar_nam'][3].",".$_SESSION['ar_nam'][4];
}elseif($_SESSION['m_level']==5){
$r1nam = $_SESSION['ar_nam'][0].",".$_SESSION['ar_nam'][1].",".$_SESSION['ar_nam'][2].",".$_SESSION['ar_nam'][3].",".$_SESSION['ar_nam'][4].",".$_SESSION['ar_nam'][5];
}elseif($_SESSION['m_level']==6){
$r1nam = $_SESSION['ar_nam'][0].",".$_SESSION['ar_nam'][1].",".$_SESSION['ar_nam'][2].",".$_SESSION['ar_nam'][3].",".$_SESSION['ar_nam'][4].",".$_SESSION['ar_nam'][5].",".$_SESSION['ar_nam'][6];
}elseif($_SESSION['m_level']==7){
$r1nam = $_SESSION['ar_nam'][0].",".$_SESSION['ar_nam'][1].",".$_SESSION['ar_nam'][2].",".$_SESSION['ar_nam'][3].",".$_SESSION['ar_nam'][4].",".$_SESSION['ar_nam'][5].",".$_SESSION['ar_nam'][6].",".$_SESSION['ar_nam'][7];
}elseif($_SESSION['m_level']==8){
$r1nam = $_SESSION['ar_nam'][0].",".$_SESSION['ar_nam'][1].",".$_SESSION['ar_nam'][2].",".$_SESSION['ar_nam'][3].",".$_SESSION['ar_nam'][4].",".$_SESSION['ar_nam'][5].",".$_SESSION['ar_nam'][6].",".$_SESSION['ar_nam'][7].",".$_SESSION['ar_nam'][8];
}elseif($_SESSION['m_level']==9){
$r1nam = $_SESSION['ar_nam'][0].",".$_SESSION['ar_nam'][1].",".$_SESSION['ar_nam'][2].",".$_SESSION['ar_nam'][3].",".$_SESSION['ar_nam'][4].",".$_SESSION['ar_nam'][5].",".$_SESSION['ar_nam'][6].",".$_SESSION['ar_nam'][7].",".$_SESSION['ar_nam'][8].",".$_SESSION['ar_nam'][9];
	}



$sql="INSERT IGNORE INTO bom_tb_football_bill_live  ( b_date ,b_numstep , b_timestam , b_datenow , b_total , b_sum  , b_dis_arr,bonus_m_id
 , m_id, r_id   ,  b_ip  , b_sum_pay ,r_agent_id 
, b_share_m , b_myshare_1 , b_myshare_2 , b_myshare_3 , b_myshare_4 , b_myshare_5 , b_myshare_6 , b_myshare_7 
, com_af
 ) 
values ('$view_date' ,'$num_s','$time_stam','".date("Y-m-d H:i:s",$time_stam)."','$q_sum' ,'$q_sum' ,'$comm' ,'$re_m[bonus_m_id]'
 ,'".$_SESSION['m_id']."' ,'".$_SESSION['cr_id']."' ,'$ip','' ,'".$_SESSION['r_agent_id']."'
,'$share0'  ,'$share1'  ,'$share2'  ,'$share3'  ,'$share4'  ,'$share5'  ,'$share6'  ,'$share7'  
 ,'$comaf'
 )";

sql_query($sql);

$sql="select * from bom_tb_football_bill_live   where m_id='".$_SESSION['m_id']."'  order by bill_id desc limit 1";
$reeb=sql_array($sql);
$man_bill=$reeb['bill_id'];

if($man_bill!=""){	

	$nns = 0;

foreach ($BPBetKey as $key => $value) {


$ex = explode("_" , $value);



$rs_b = sql_array_sp("select * from bom_tb_ball_list where id_type_1 = '$ex[0]' or id_type_2 = '$ex[0]' or id_type_3 = '$ex[0]' or id_type_4 = '$ex[0]' or id_type_5 = '$ex[0]' or id_type_6 = '$ex[0]' or id_type_7 = '$ex[0]' or id_type_8 = '$ex[0]'");

######################No bet
  if(intval($rs_b['no_bet'])!=1){ 
  
$sql="delete from bom_tb_football_bill_live where bill_id='$man_bill'  and m_id='".$_SESSION['m_id']."'"; 
sql_query($sql);

echo "<script type='text/javascript' >
var Mod='Msg';
var Type='Waiting bet price';
parent.SetConfirmBetResult(Mod,Type);
</script>"; 
 continue;
 exit();
 }
 
if($rs_b["b_live"]==4){
	continue;
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

	$m_sport_type = $rs_b["b_zone"];
	$m_sport_zone = 1;	
	#$sport_zone = array(1 =>"ก่อนเวลา", 2 =>"สด");
	$m_score= $rs_b["b_score_full"];
	$m_bid= $rs_b["b_id"];
	$m_add= $rs_b["b_add"];
	$m_rob= 1;	
	$sport_home_away = $ex[1];
	
	$play_time_live=($rs_b["b_live_showtime"]);	
	$play_time_live_not= $rs_b["b_live_showtime"];
	$ball_step= $rs_b["b_step"];
			
			
	$rob=1;	
	$m_big= $rs_b["b_big"];	
	$m_zone= $rs_b["b_zone"];	
	$m_team1= $rs_b["b_name_1_th"];	
	$m_team2= $rs_b["b_name_2_th"];	
	$m_playtime= $rs_b["b_bet_time"];	
	$m_score_FT= $rs_b["b_run_score_full"];	
	$m_score_1H= $rs_b["b_run_score_half"];	

	if($play_time_live>0){
		$b_running = 1;
		$b_running_bill = 1;
		$b_running_step++;
	}else{
		$b_running = 0;
	}


	if($sport_home_away=="h" and $sport_type_select==1){
		$sport_nam_now = $rs_b["b_hdc_step1"];
		$choiceValue = ($rs_b["b_name_1_th"]!="" ? $rs_b["b_name_1_th"] : $rs_b["b_name_1_en"]);
		$BetKindValue = $rs_b["b_hdc_step"];
		$total_bet_sa="b_bet_1";
		$m_sport_man = 1;
		//$sport_nam_now = convert_nam($sport_nam_now , $oddsType);
	}else if($sport_home_away=="a" and $sport_type_select==1){
		$sport_nam_now = $rs_b["b_hdc_step2"];
		$choiceValue = ($rs_b["b_name_2_th"]!="" ? $rs_b["b_name_2_th"] : $rs_b["b_name_2_en"]);
		$BetKindValue = $rs_b["b_hdc_step"];
		$total_bet_sa="b_bet_2";
		$m_sport_man = 2;
		//$sport_nam_now = convert_nam($sport_nam_now , $oddsType);
	}else if($sport_home_away=="h" and $sport_type_select==2){
		$sport_nam_now = $rs_b["b_goal_step1"];
		$choiceValue = $lang_member[899];
		$BetKindValue = $rs_b["b_goal_step"];
		$total_bet_sa="b_bet_3";
		$m_sport_man = 3;
		//$sport_nam_now = convert_nam($sport_nam_now , $oddsType);
	}else if($sport_home_away=="a" and $sport_type_select==2){
		$sport_nam_now = $rs_b["b_goal_step2"];
		$choiceValue = $lang_member[900];
		$BetKindValue = $rs_b["b_goal_step"];
		$total_bet_sa="b_bet_4";
		$m_sport_man = 4;
		//$sport_nam_now = convert_nam($sport_nam_now , $oddsType);
	}else if($sport_home_away=="1" and $sport_type_select==3){
		$sport_nam_now = $rs_b["b_1x2_step1"];
		$choiceValue = $lang_member[805].".1";
		$BetKindValue = "";
		$total_bet_sa="b_bet_7";
		$m_sport_man = 7;
	}else if($sport_home_away=="X" and $sport_type_select==3){
		$sport_nam_now = $rs_b["b_1x2_stepx"];
		$choiceValue = $lang_member[805].".X";
		$BetKindValue = "";
		$total_bet_sa="b_bet_8";
		$m_sport_man = 8;
	}else if($sport_home_away=="2" and $sport_type_select==3){
		$sport_nam_now = $rs_b["b_1x2_step2"];
		$choiceValue = $lang_member[805].".2";
		$BetKindValue = "";
		$total_bet_sa="b_bet_9";
		$m_sport_man = 9;
	}elseif($sport_home_away=="h" and $sport_type_select==3){
		$sport_nam_now = $rs_b["b_1x2_step1"];
		$choiceValue = $rs_main["h"];
		$BetKindValue = "";
		$total_bet_sa="b_bet_7";
		$m_sport_man = 7;
	}else if($sport_home_away=="a" and $sport_type_select==3){
		$sport_nam_now = $rs_b["b_1x2_step2"];
		$choiceValue = $rs_main["a"];
		$BetKindValue = "";
		$total_bet_sa="b_bet_9";
		$m_sport_man = 9;
	}else if($sport_home_away=="h" and $sport_type_select==4){
		$sport_nam_now = $rs_b["b_odd"];
		$choiceValue = $lang_member[453];
		$BetKindValue = "";
		$total_bet_sa="b_bet_5";
		$m_sport_man = 5;
		//$sport_nam_now = convert_nam($sport_nam_now , $oddsType);
	}else if($sport_home_away=="a" and $sport_type_select==4){
		$sport_nam_now = $rs_b["b_even"];
		$choiceValue = $lang_member[459];
		$BetKindValue = "";
		$total_bet_sa="b_bet_6";
		$m_sport_man = 6;
		//$sport_nam_now = convert_nam($sport_nam_now , $oddsType);
	}else if($sport_home_away=="h" and $sport_type_select==5){
		$sport_nam_now = $rs_b["b_1h_hdc_step1"];
		$choiceValue = ($rs_b["b_name_1_th"]!="" ? $rs_b["b_name_1_th"] : $rs_b["b_name_1_en"]);
		$BetKindValue = $rs_b["b_1h_hdc_step"];
		$total_bet_sa="b_1h_bet_1";
		$m_sport_man = 11;
		$m_big= $rs_b["b_1h_big"];	
		//$sport_nam_now = convert_nam($sport_nam_now , $oddsType);
	}else if($sport_home_away=="a" and $sport_type_select==5){
		$sport_nam_now = $rs_b["b_1h_hdc_step2"];
		$choiceValue = ($rs_b["b_name_2_th"]!="" ? $rs_b["b_name_2_th"] : $rs_b["b_name_2_en"]);
		$BetKindValue = $rs_b["b_1h_hdc_step"];
		$total_bet_sa="b_1h_bet_2";
		$m_sport_man = 12;
		$m_big= $rs_b["b_1h_big"];	
		//$sport_nam_now = convert_nam($sport_nam_now , $oddsType);
	}else if($sport_home_away=="h" and $sport_type_select==6){
		$sport_nam_now = $rs_b["b_1h_goal_step1"];
		$choiceValue = $lang_member[899];
		$BetKindValue = $rs_b["b_1h_goal_step"];
		$total_bet_sa="b_1h_bet_3";
		$m_sport_man = 13;
		$m_big= $rs_b["b_1h_big"];	
		//$sport_nam_now = convert_nam($sport_nam_now , $oddsType);
	}else if($sport_home_away=="a" and $sport_type_select==6){
		$sport_nam_now = $rs_b["b_1h_goal_step2"];
		$choiceValue = $lang_member[900];
		$BetKindValue = $rs_b["b_1h_goal_step"];
		$total_bet_sa="b_1h_bet_4";
		$m_sport_man = 14;
		$m_big= $rs_b["b_1h_big"];	
		//$sport_nam_now = convert_nam($sport_nam_now , $oddsType);
	}else if($sport_home_away=="1" and $sport_type_select==7){
		$sport_nam_now = $rs_b["b_1h_1x2_step1"];
		$choiceValue = $lang_member[803].".1";
		$BetKindValue = "";
		$total_bet_sa="b_1h_bet_7";
		$m_sport_man = 17;
		$m_big= $rs_b["b_1h_big"];	
	}else if($sport_home_away=="X" and $sport_type_select==7){
		$sport_nam_now = $rs_b["b_1h_1x2_stepx"];
		$choiceValue = $lang_member[803].".X";
		$BetKindValue = "";
		$total_bet_sa="b_1h_bet_8";
		$m_sport_man = 18;
		$m_big= $rs_b["b_1h_big"];	
	}else if($sport_home_away=="2" and $sport_type_select==7){
		$sport_nam_now = $rs_b["b_1h_1x2_step2"];
		$choiceValue = $lang_member[803].".2";
		$BetKindValue = "";
		$total_bet_sa="b_1h_bet_9";
		$m_sport_man = 19;
		$m_big= $rs_b["b_1h_big"];	
	}else if($sport_home_away=="h" and $sport_type_select==8){
		$sport_nam_now = $rs_b["b_1h_odd"];
		$choiceValue = $lang_member[453];
		$BetKindValue = "";
		$total_bet_sa="b_1h_bet_5";
		$m_sport_man = 15;
		$m_big= $rs_b["b_1h_big"];	
		//$sport_nam_now = convert_nam($sport_nam_now , $oddsType);
	}else if($sport_home_away=="a" and $sport_type_select==8){
		$sport_nam_now = $rs_b["b_1h_even"];
		$choiceValue = $lang_member[459];
		$BetKindValue = "";
		$total_bet_sa="b_1h_bet_6";
		$m_sport_man = 16;
		$m_big= $rs_b["b_1h_big"];	
		//$sport_nam_now = convert_nam($sport_nam_now , $oddsType);
	}

	$sport_nam_now = _mtr($sport_nam_now ,$oddsType,($_SESSION["m_nam"]=="" ? "0" : $_SESSION["m_nam"]));
	
	
	$m_hdc = $BetKindValue;
	$m_pay = $sport_nam_now;

	if($oddsType==1){
		$play_view = "DEC";
	}else if($oddsType==2){
		$play_view = "HK";
	}else{
		$play_view = "MY";
	}
	
	

	
	$accept=1;
	
	if($m_pay!=0.00){
		$sql="INSERT IGNORE INTO bom_tb_football_bill_play_live  (bill_id ,play_timestam ,play_datenow ,play_type,play_view ,play_pay ,play_bet ,b_score_live ,b_time_play ,b_running
		,b_id ,b_big ,b_accept  ,play_numstep ,b_numstep ,b_add ,b_zone, b_dis_arr
		,b_total , b_sum  ,m_id , r_id ,b_date ,r_agent_id
		 ,play_nam
		 , b_share_m , b_myshare_1 , b_myshare_2 , b_myshare_3 , b_myshare_4 , b_myshare_5 , b_myshare_6 , b_myshare_7 
	
		 )  values('$man_bill','$time_stam','".date("Y-m-d H:i:s")."','$m_sport_man', '$play_view' ,'$m_pay' ,'$m_hdc' ,'$m_score_FT' ,'$play_time_live' ,'$b_running'
		,'$m_bid','$m_big' , '$accept'  ,'$num_s' ,'$num_s','$m_add','$rs_b[b_zone]','$comm'
		,'$q_sum' ,'$q_sum', '".$_SESSION['m_id']."' ,'".$_SESSION['cr_id']."'  ,'$view_date','".$_SESSION['r_agent_id']."'
		,'$r1nam' 
		 ,'$share0'  ,'$share1'  ,'$share2'  ,'$share3'  ,'$share4'  ,'$share5'  ,'$share6'  ,'$share7'  
	
		);";
		if(sql_query($sql)){
		$q_sum2=$q_sum / $num_s;
		$sql="update IGNORE bom_tb_ball_list set $total_bet_sa = $total_bet_sa + $q_sum2  where b_id='$rs_b[b_id]' and b_add='$rs_b[b_add]';";		
		sql_query_sp($sql);	
		
				$ood = $ood*floatval($m_pay);
				$nns++;
		}else{
			$set_status++;
		}
	}else{
		#################ไม่สำเร็จ
		$set_status++;
	}
}
if($nns!=$num_s){
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
	parent.go_del_all();
	</script>";

}else{
	// $wait = 1;

	if($_SESSION['m1']['m_confirm'] == 1 and $b_running_bill == 1)
	{
		$wait = 3;
	}else if($_SESSION['m1']['m_confirm'] == 1 and $b_running_bill == 0)
	{
		$wait = 0;
	}else{
		$wait = 1;
	}
	##########################################################สำเร็จ
	##########################################################สำเร็จ
	$res["type_bet"] = $wait; 
	
	$sql="update IGNORE  bom_tb_football_bill_live set  
	b_sum_pay='$ood' 
	, b_accept='1'
	, b_running='$b_running_bill'
	, b_running_step='$b_running_step'
	where bill_id='$man_bill' and  m_id='$_SESSION[m_id]' ";
	sql_query($sql);	

	$rs_ag = sql_array("select r_agent_id from bom_tb_agent where r_id = '$re_m[r_id]'");
	$log_sum = $re_m[m_count]-$q_sum;
	######################LOG ใหม่
	$sql="INSERT IGNORE INTO bom_tb_all_payment (
	bap_date, bap_ip,	bap_type	,m_id	,r_id,	m_agent_id,	r_agent_id,	
	bap_before, bap_out ,bap_after,bap_comment,
	bill_id,bap_play_type,
	bap_code,bap_by_type,bap_by_id) values(
	now(),'"._bIP()."', '3', '$re_m[m_id]','$re_m[r_id]','$re_m[m_agent_id]','$rs_ag[r_agent_id]',
	'$re_m[m_count]' ,'-$q_sum','$log_sum','สมาชิกพนันกีฬาแบบสเต็ป',
	'$man_bill' , 1 ,
	'MPB',1,'$_SESSION[m_id]') ";
	sql_query($sql);	
	######################LOG ใหม่ 
	
	#######################เก็บถาวร
	$sql="update IGNORE  bom_tb_member set m_count = m_count-$q_sum where m_id = '".$_SESSION['m_id']."'";
	sql_query($sql);
	$res["status"] = 1;##1=สำเร็จ
	unset($_SESSION["busket"]);
	?>
	<script type="text/javascript" >
	<? if($b_running_bill==1){ ?>
			var Mod='WaitingBet';
		<? }else{ ?>
			var Mod='BListMini';
		<? } ?>
	var Type='';
	//parent.fFrame.topFrame.g_SMF.removeTicket('<?=$ex[0]?>','<?=$ex[1]?>',<?=$rs_b["b_id"]?>);
	parent.SetConfirmBetResult(Mod,Type);
	parent.go_del_all();
	</script>
	<?
}
?>



