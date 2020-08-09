<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?

require('../inc/conn.php');
require('../inc/function.php');

require("../lang/member_lang.php");
require("../lang/function_array.php");


$sql="select m_id,m_count from bom_tb_member where m_id='".$_SESSION['m_id']."'";
$re_m=sql_array($sql);
if($re_m['m_id']==""){  ?><script>parent.DoMessageDisplay('userProblem');</script><? exit();}
if($re_m['m_count']<=0){$re_m['m_count']=0;}


$view_date=_bdate();
$ip=_bIP();
$set_status=0;


$ood = $_POST["SportMixParleyOddsValue"];
$q_sum = str_replace(',', '', $_POST["stake"]);
$BetKey = json_decode2($_POST["BetKey"], true);
$btnMPSubmit = $_POST["btnMPSubmit"];
$num_s = $_POST["count"];
$sport = $_POST["sport"];

if($re_m['m_count']<$q_sum){ ?><script>parent.DoMessageDisplay('creditProblem');</script><? exit();  }



$sql="INSERT IGNORE INTO bom_tb_football_bill_live  ( b_date ,b_numstep , b_timestam , b_datenow , b_total
 , m_id  ,  b_ip  , b_sum_pay ,r_agent_id 
 ) 
values ('$view_date' ,'$num_s','$time_stam','".date("Y-m-d H:i:s",$time_stam)."','$q_sum'
 ,'".$_SESSION['m_id']."','$ip','$ood' ,'".$_SESSION['r_agent_id']."'
 )";


sql_query($sql);


$sql="select * from bom_tb_football_bill_live   where m_id='".$_SESSION['m_id']."'  order by bill_id desc limit 1";
$reeb=sql_array($sql);
$man_bill=$reeb['bill_id'];

foreach($BetKey as &$value){
	
	if($value['Parlay']!=""){
	
		//$rs_main = sql_array_sp("select * from bom_tb_ball_list where b_id = '$values[MId]' order by b_add asc");
		
		$json_file = file_get_contents2($x_process."json/sport/lang/".$_SESSION['lang']."/".$value['Parlay'].".json");
		$rs_main = json_decode($json_file, true);
		
		
		
		
		if(count($rs_main)>0){
			
			$sport_home_away = $value["sport_home_away"];
			$sport_type_select = $value["sport_type_select"];
			$sport_type_id = $value["OddsId"];
			
			$rs_b = sql_array_sp("select * from bom_tb_ball_list where id_type_".$sport_type_select." = '$sport_type_id'");
			
			$m_sport_type = $rs_b["b_zone"];
			$m_sport_zone = 1;	
			#$sport_zone = array(1 =>"ก่อนเวลา", 2 =>"สด");
			$m_score= $rs_b["b_score_full"];
			/*
			$sport_man = array(
			1 =>"FT.HDC[บ้าน]", 2 =>"FT.HDC[เยือน]", 3 =>"FT.GOAL[สูง]", 4 =>"FT.GOAL[ต่ำ]",
			5 =>"FT.ODD[คี่]", 6 =>"FT.EVEN[คู่]", 7 =>"FT.1X2[บ้านชนะ]", 8 =>"FT.1X2[เสมอ]", 9 =>"FT.1X2[เยือนชนะ]",
			11 =>"1H.HDC[บ้าน]", 12 =>"1H.HDC[เยือน]", 13 =>"1H.GOAL[สูง]", 14 =>"1H.GOAL[ต่ำ]",
			15 =>"1H.ODD[คี่]", 16 =>"1H.EVEN[คู่]", 17 =>"1H.1X2[บ้านชนะ]", 18 =>"1H.1X2[เสมอ]", 19 =>"1H.1X2[เยือนชนะ]"
			);
			*/
			$m_bid= $rs_b["b_id"];
			$m_add= $rs_b["b_add"];
			$m_rob= 1;
			
			/*$m_sport_mix= $stp[14];	
			$m_bet= $stp[18];*/	
			
			
			
			$play_time_live=_tlive( $rs_b["b_live_show_time"]);	
			$play_time_live_not= $rs_b["b_live_show_time"];
			$ball_step= $rs_b["b_step"];
			
			
			$rob=1;	
			$m_big= $rs_b["b_big"];	
			$m_zone= $rs_b["b_zone"];	
			$m_team1= $rs_b["b_name_1_th"];	
			$m_team2= $rs_b["b_name_2_th"];	
			$m_playtime= $rs_b["b_bet_time"];	
			$m_score_FT= $rs_b["b_score_full"];	
			$m_score_1H= $rs_b["b_score_half"];	
			
			
			if($sport_home_away=="h" and $sport_type_select==1){
				$sport_nam_now = $rs_b["b_hdc_1"];
				$choiceValue = $rs_main["h"];
				$BetKindValue = $rs_b["b_hdc"];
				$m_sport_man = 1;
			}else if($sport_home_away=="a" and $sport_type_select==1){
				$sport_nam_now = $rs_b["b_hdc_2"];
				$choiceValue = $rs_main["a"];
				$BetKindValue = $rs_b["b_hdc"];
				$m_sport_man = 2;

			}else if($sport_home_away=="h" and $sport_type_select==2){
				$sport_nam_now = $rs_b["b_goal_1"];
				$choiceValue = "มากกว่า";
				$BetKindValue = $rs_b["b_goal"];
				$m_sport_man = 3;
			}else if($sport_home_away=="a" and $sport_type_select==2){
				$sport_nam_now = $rs_b["b_goal_2"];
				$choiceValue = "น้อยกว่า";
				$BetKindValue = $rs_b["b_goal"];
				$m_sport_man = 4;

			}else if($sport_home_away=="1" and $sport_type_select==3){
				$sport_nam_now = $rs_b["b_1x2_1"];
				$choiceValue = "เต็มเวลา.1";
				$BetKindValue = "";
				$m_sport_man = 7;
			}else if($sport_home_away=="X" and $sport_type_select==3){
				$sport_nam_now = $rs_b["b_1x2_x"];
				$choiceValue = "เต็มเวลา.X";
				$BetKindValue = "";
				$m_sport_man = 8;
			}else if($sport_home_away=="2" and $sport_type_select==3){
				$sport_nam_now = $rs_b["b_1x2_2"];
				$choiceValue = "เต็มเวลา.2";
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
				$choiceValue = "คี่";
				$BetKindValue = "";
				$m_sport_man = 5;
			}else if($sport_home_away=="a" and $sport_type_select==4){
				$sport_nam_now = $rs_b["b_even"];
				$choiceValue = "คู่";
				$BetKindValue = "";
				$m_sport_man = 6;

			}else if($sport_home_away=="h" and $sport_type_select==5){
				$sport_nam_now = $rs_b["b_1h_hdc_1"];
				$choiceValue = $rs_main["h"];
				$BetKindValue = $rs_b["b_1h_hdc"];
				$m_sport_man = 11;
			}else if($sport_home_away=="a" and $sport_type_select==5){
				$sport_nam_now = $rs_b["b_1h_hdc_2"];
				$choiceValue = $rs_main["a"];
				$BetKindValue = $rs_b["b_1h_hdc"];
				$m_sport_man = 12;

			}else if($sport_home_away=="h" and $sport_type_select==6){
				$sport_nam_now = $rs_b["b_1h_goal_1"];
				$choiceValue = "มากกว่า";
				$BetKindValue = $rs_b["b_1h_goal"];
				$m_sport_man = 13;
			}else if($sport_home_away=="a" and $sport_type_select==6){
				$sport_nam_now = $rs_b["b_1h_goal_2"];
				$choiceValue = "น้อยกว่า";
				$BetKindValue = $rs_b["b_1h_goal"];
				$m_sport_man = 14;

			}else if($sport_home_away=="1" and $sport_type_select==7){
				$sport_nam_now = $rs_b["b_1h_1x2_1"];
				$choiceValue = "ครึ่งแรก.1";
				$BetKindValue = "";
				$m_sport_man = 17;
			}else if($sport_home_away=="X" and $sport_type_select==7){
				$sport_nam_now = $rs_b["b_1h_1x2_x"];
				$choiceValue = "ครึ่งแรก.X";
				$BetKindValue = "";
				$m_sport_man = 18;
			}else if($sport_home_away=="2" and $sport_type_select==7){
				$sport_nam_now = $rs_b["b_1h_1x2_2"];
				$choiceValue = "ครึ่งแรก.2";
				$BetKindValue = "";
				$m_sport_man = 19;

			}else if($sport_home_away=="h" and $sport_type_select==8){
				$sport_nam_now = $rs_b["b_1h_odd"];
				$choiceValue = "คี่";
				$BetKindValue = "";
				$m_sport_man = 15;
			}else if($sport_home_away=="a" and $sport_type_select==8){
				$sport_nam_now = $rs_b["b_1h_even"];
				$choiceValue = "คู่";
				$BetKindValue = "";
				$m_sport_man = 16;
			}
			
			//$oddsVal = convert_nam($sport_nam_now , 1);
			$m_hdc = $BetKindValue;
			$m_pay = $sport_nam_now;
			
			
			$m_pay= price_ball($m_pay , 3);
			
			
			$mnam=_nam($num_s , $m_pay, $_SESSION['m_nam_tor'] ,$_SESSION['m_nam_tor_live'] , $_SESSION['m_nam_rong'] ,$_SESSION['m_nam_rong_live'] , $m_sport_type , $m_sport_zone);
			$r1nam=_nam($num_s , $m_pay, $_SESSION['r_nam_tor_1'] ,$_SESSION['r_nam_tor_live_1'] , $_SESSION['r_nam_rong_1'] ,$_SESSION['r_nam_rong_live_1'] , $m_sport_type , $m_sport_zone);
			$r2nam=_nam($num_s , $m_pay, $_SESSION['r_nam_tor_2'] ,$_SESSION['r_nam_tor_live_2'] , $_SESSION['r_nam_rong_2'] ,$_SESSION['r_nam_rong_live_2'] , $m_sport_type , $m_sport_zone);
			$r3nam=_nam($num_s , $m_pay, $_SESSION['r_nam_tor_3'] ,$_SESSION['r_nam_tor_live_3'] , $_SESSION['r_nam_rong_3'] ,$_SESSION['r_nam_rong_live_3'] , $m_sport_type , $m_sport_zone);
			$r4nam=_nam($num_s , $m_pay, $_SESSION['r_nam_tor_4'] ,$_SESSION['r_nam_tor_live_4'] , $_SESSION['r_nam_rong_4'] ,$_SESSION['r_nam_rong_live_4'] , $m_sport_type , $m_sport_zone);


			$m_pay=_ntor_save($m_pay ,$mnam);	
			
			if($m_pay!=0.00){
				$sql="INSERT IGNORE INTO bom_tb_football_bill_play_live  (bill_id ,play_timestam ,play_datenow ,play_type ,play_pay ,play_bet ,b_score_live ,b_time_play 
				,b_id ,b_big ,b_accept  ,play_numstep ,b_numstep ,b_add ,b_type
				,b_total ,b_pay ,m_id ,b_date ,r_agent_id
				 ,play_nam_1 ,play_nam_2 ,play_nam_3 ,play_nam_4)  
				
				values('$man_bill','$time_stam','".date("Y-m-d H:i:s")."','$m_sport_man' ,'$m_pay' ,'$m_hdc' ,'$m_score' ,'$play_time_live' 
				,'$m_bid','$m_big' , '$accept'  ,'$num_s' ,'$num_s','$m_add','".$rs_b['b_zone']."'
				,'$q_sum','$q_sum', '".$_SESSION['m_id']."','$view_date','".$_SESSION['r_agent_id']."'
				,'$r1nam' ,'$r2nam' ,'$r3nam' ,'$r4nam' 
				);";
				if(sql_query($sql)){
					
					
				}else{
					$set_status++;
				}
			}else{
				#################ไม่สำเร็จ
				$set_status++;
			}
		}
	}
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
	?><script>parent.DoMessageDisplay('betProblem');</script><?
}else{
	##########################################################สำเร็จ
	##########################################################สำเร็จ
	$res["type_bet"] = $wait; 
	
	$sql="update bom_tb_football_bill_live set  
	b_pay='$q_sum' 
	,play_nam='$mnam', play_nam_1='$r1nam', play_nam_2='$r2nam', play_nam_3	='$r3nam',play_nam_4='$r4nam'  
	,b_com='$mcom',br_com_1='$mcom1'	,br_com_2='$mcom2'	,br_com_3='$mcom3',	br_com_4 ='$mcom4'
	,b_share_m='$mshare',	b_share_1='$r1share',	b_share_2='$r2share',	b_share_3='$r3share',	b_share_4='$r4share'
	, b_accept='$wait'  ,b_sport='$m_sport_type', b_live='$m_sport_zone' ,b_rob='$rob'
	where bill_id='$man_bill' and  m_id='".$_SESSION['m_id']."' ";
	sql_query($sql);	
	

	#######################เก็บถาวร
	$sql="update bom_tb_member set m_count = m_count-$q_sum where m_id = '".$_SESSION['m_id']."'";
	sql_query($sql);
	$res["status"] = 1;##1=สำเร็จ
	unset($_SESSION["busket"]);
	?>
	<script>parent.ReloadBetListMini('no','yes');parent.CleanMixParlayInfo();</script>
	<?
}
?>



<!--<script>parent.ReloadBetListMini('no','yes');parent.CleanMixParlayInfo();</script>-->