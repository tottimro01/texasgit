<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
header("Content-type:text/html; charset=UTF-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);

require('inc/conn.php');
require('inc/function.php');
// require("lang/member_lang.php");
  require("lang/variable_lang.php");

if(($_SESSION['m_id'] == '') || (!isset($_SESSION['m_id']))){  exit();}

if( !strstr($_SERVER['HTTP_REFERER'],$check_url)){exit();}

$fo="json/login/token_bet/".$_SESSION['m_id'].".php";
@require_once($fo);
if($_SESSION['bettoken']!=$bet_token){ exit();}


$fo="json/ip/".$_SESSION['m_id'].".php";
require($fo);
$token_ip = md5($_SERVER['SERVER_ADDR']);
if($token_ip!=$m_ip){ exit(); }



$_SESSION['all'] = array();
$rob= _rob();
$view_date= _bdate();
$ip=_bIP();
$ar= $_REQUEST['step'];
$m_sport_type=1;
$m_sport_zone = 1;	
$accept = 1;
$acceptp = 0;



$ex_max=explode(',',$_SESSION['m_max']);
$ex_min=explode(',',$_SESSION['m_min']);
$ex_step2=explode(',',$_SESSION['m_step2']);

$mix_min=$ex_step2[0];
$mix_max=$ex_step2[1];
$bet_min=$ex_min[4];
$bet_max=$ex_max[4];



$filename="json/sport/today/php/data_".$view_date."_".$rob.".php";
if (file_exists($filename)) {
	require($filename);
	}else{
    ########################################	
	$i=0;
    $xi=$i+1;
	$_SESSION['all']['no'][$i]      = $xi;
     $_SESSION['all']['id'][$i]      = 0;
	$_SESSION['all']['data'][$i]    = '';
	$_SESSION['all']['type'][$i]    = 0;
	$_SESSION['all']['sum'][$i]     = 0;
    $_SESSION['all']['betshow'][$i] = '';
    $_SESSION['all']['txt'][$i]     = $lang_member[317];
    ########################################				
	  require "inc/save_fast_ok.php";
    exit();
}





for ($i = 0; $i < count($ar); $i++) {
	
	#$q_num= '';
##############################################
    $ex= explode(",", $ar[$i]);
    $q_sum= intval(str_replace(",", "", trim($ex[1])));
    $q_num= trim($ex[0]);
    $q_num= str_replace(array( "++++", "+++", "++", "***", "**", "*" ), array( "+", "+", "+","+",  "+", "+" ), $q_num);
	$q_num= rtrim($q_num, '+');
	$array= explode("+", $q_num);
	$enum = array_unique($array);
	$num_s=count($enum);
	if($num_s>5){
	$num_txt= rtrim("$enum[0]+$enum[1]+$enum[2]+$enum[3]+$enum[4]+$enum[5]+$enum[6]+$enum[7]+$enum[8]+$enum[9]+$enum[10]+$enum[11]+$enum[12]+$enum[13]+$enum[14]+$enum[15]+$enum[16]+$enum[17]+$enum[18]+$enum[19]", '+');
	}else{
	$num_txt=$q_num;	
		}
##############################################
    ########################################	
    $xi=$i+1;
	$_SESSION['all']['no'][$i]      = $xi;
     $_SESSION['all']['id'][$i]      = 0;
	$_SESSION['all']['data'][$i]    = $num_txt;
	$_SESSION['all']['type'][$i]    = 0;
	$_SESSION['all']['sum'][$i]     = 0;
    $_SESSION['all']['betshow'][$i] = '';
    $_SESSION['all']['txt'][$i]     = '';
    ########################################			

###############################CHECK#############################
###############################CHECK#############################
###############################CHECK#############################
$sql="select m_id,m_count from bom_tb_member where m_id='".$_SESSION['m_id']."'";
$re_m=sql_array($sql);
if($re_m['m_id']==""){  exit();}
if($re_m['m_count']<=0){$re_m['m_count']=0;}
if($re_m['m_count']<$q_sum){ 
   ########################################			
    $xi=$i+1;
	$_SESSION['all']['no'][$i]      = $xi;
     $_SESSION['all']['id'][$i]      = 0;
	$_SESSION['all']['data'][$i]    = $num_txt;
	$_SESSION['all']['type'][$i]    = 0;
	$_SESSION['all']['sum'][$i]     = 0;
	$_SESSION['all']['betshow'][$i] = $q_sum;
	$_SESSION['all']['txt'][$i]     ="<span class='cr'>$lang_member[633]</span>";#'ไม่สำเร็จ'
   ########################################				
  }else{
	  
	  
	  
	  ###############################CHECK#############################
if($num_s<$mix_min){	
   ########################################			
    $xi=$i+1;
	$_SESSION['all']['no'][$i]      = $xi;
     $_SESSION['all']['id'][$i]      = 0;
	$_SESSION['all']['data'][$i]    = $num_txt;
	$_SESSION['all']['type'][$i]    = 0;
	$_SESSION['all']['sum'][$i]     = 0;
	$_SESSION['all']['betshow'][$i] = $q_sum;
	 $_SESSION['all']['txt'][$i]     ="$lang_member[755]<br><span class='cr'>$lang_member[379]</span>";#'ไม่สำเร็จ'
   ########################################				
}else{
	
	
	
  ###############################CHECK#############################
	if($num_s>$mix_max){
   ########################################			
    $xi=$i+1;
	$_SESSION['all']['no'][$i]      = $xi;
    $_SESSION['all']['id'][$i]      = 0;
	$_SESSION['all']['data'][$i]    = $num_txt;
	$_SESSION['all']['type'][$i]    = 0;
	$_SESSION['all']['sum'][$i]     = 0;
	$_SESSION['all']['betshow'][$i] = $q_sum;
	 $_SESSION['all']['txt'][$i]     ="$lang_member[755]<br><span class='cr'>$lang_member[380]</span>";#'ไม่สำเร็จ'
   ########################################				
}else{
	
	
	 ###############################CHECK#############################
	if($q_sum<$bet_min){
   ########################################			
    $xi=$i+1;
	$_SESSION['all']['no'][$i]      = $xi;
     $_SESSION['all']['id'][$i]      = 0;
	$_SESSION['all']['data'][$i]    = $num_txt;
	$_SESSION['all']['type'][$i]    = 0;
	$_SESSION['all']['sum'][$i]     = 0;
	$_SESSION['all']['betshow'][$i] = $q_sum;
	  $_SESSION['all']['txt'][$i]     ="<span class='cr'>$lang_member[631]</span>";#'ไม่สำเร็จ'
   ########################################				
}else{
	
	
	 ###############################CHECK#############################
	if($q_sum>$bet_max){
   ########################################			
    $xi=$i+1;
	$_SESSION['all']['no'][$i]      = $xi;
    $_SESSION['all']['id'][$i]      = 0;
	$_SESSION['all']['data'][$i]    = $num_txt;
	$_SESSION['all']['type'][$i]    = 0;
	$_SESSION['all']['sum'][$i]     = 0;
	$_SESSION['all']['betshow'][$i] = $q_sum;
	  $_SESSION['all']['txt'][$i]     ="<span class='cr'>$lang_member[632]</span>";#'ไม่สำเร็จ'
   ########################################				
}else{
		



$adis= _dis($q_sum,  $_SESSION['m_step_dis'] ,$_SESSION['m_com'], $num_s,$m_sport_type );
$sdis=$adis['mpay'];
$mcom=$adis['mcom'];
$adis1= _dis($q_sum,  $_SESSION['step_dis_1'] ,$_SESSION['r_com_1'], $num_s,$m_sport_type );
$sdis1=$adis1['mpay'];
$mcom1=$adis1['mcom'];
$adis2= _dis($q_sum,  $_SESSION['step_dis_2'] ,$_SESSION['r_com_2'], $num_s ,$m_sport_type );
$sdis2=$adis2['mpay'];
$mcom2=$adis2['mcom'];
$adis3= _dis($q_sum,  $_SESSION['step_dis_3'] ,$_SESSION['r_com_3'], $num_s,$m_sport_type );
$sdis3=$adis3['mpay'];
$mcom3=$adis3['mcom'];
$adis4= _dis($q_sum,  $_SESSION['step_dis_4'] ,$_SESSION['r_com_4'], $num_s,$m_sport_type );
$sdis4=$adis4['mpay'];
$mcom4=$adis4['mcom'];



$mshare= _share($num_s , $_SESSION['m_share'] ,$_SESSION['m_share_live'] , $m_sport_type , $m_sport_zone );
$r1share= _share($num_s , $_SESSION['r_share_1'] ,$_SESSION['r_share_live_1'] , $m_sport_type , $m_sport_zone );
$r2share= _share($num_s , $_SESSION['r_share_2'] ,$_SESSION['r_share_live_2'] , $m_sport_type , $m_sport_zone );
$r3share= _share($num_s , $_SESSION['r_share_3'] ,$_SESSION['r_share_live_3'] , $m_sport_type , $m_sport_zone );
$r4share= _share($num_s , $_SESSION['r_share_4'] ,$_SESSION['r_share_live_4'] , $m_sport_type , $m_sport_zone );


$sql="INSERT IGNORE INTO bom_tb_football_bill  ( b_date ,b_numstep , b_timestam , b_datenow , b_total,b_pay, b_code, b_rob
 , m_id  ,  b_ip   ,r_agent_id 
 ) 
values ('$view_date' ,'$num_s','$time_stam','".date("Y-m-d H:i:s",$time_stam)."','$q_sum','$sdis','$q_num','$rob'
 ,'".$_SESSION['m_id']."','$ip','".$_SESSION['r_agent_id']."'
 )";
sql_query($sql);

	$sql="select * from bom_tb_football_bill   where m_id='".$_SESSION['m_id']."' and b_code='$q_num' and  b_total='$q_sum'   order by bill_id desc limit 1";
	$reeb=sql_array($sql);
	$man_bill=$reeb['bill_id'];
	
	
			/*################## ส่ง DATA
# 0=$sport_type # 1=$sport_zone # 2=ผลบอลตอนนั้น # 3=$sport_man # 4=ราคาเช่น MY , HK , EU # 5=ID # 6=ADD # 7=ROB # 8=ทีมต่อ # 9=ชื่อลีก # 10=ชื่อทีมบ้าน # 11=ชื่อทีมเยือน # 12=เวลาเตะ  # 13=เวลาLive แปลงแล้ว # 14 เวลาLive ยังไม่แปลง 
# 15=ราคา คูณจ่าย  # 16=HDC # 17= $sport_mix #  18= ยอดเล่น*/
$set_status=0;
$_SESSION['sum_pay']=1;
$js1=array();
$js2=array();
$js3=array();
$js4=array();
$js5=array();
#$number=array();
foreach($enum as $xxx){
	
$data=$c_data[$xxx];	
	
$m_sport_man= $data['type'];	
/*
$sport_man = array(
1 =>"FT.HDC[บ้าน]", 2 =>"FT.HDC[เยือน]", 3 =>"FT.GOAL[สูง]", 4 =>"FT.GOAL[ต่ำ]",
5 =>"FT.ODD[คี่]", 6 =>"FT.EVEN[คู่]", 7 =>"FT.1X2[บ้านชนะ]", 8 =>"FT.1X2[เสมอ]", 9 =>"FT.1X2[เยือนชนะ]",
11 =>"1H.HDC[บ้าน]", 12 =>"1H.HDC[เยือน]", 13 =>"1H.GOAL[สูง]", 14 =>"1H.GOAL[ต่ำ]",
15 =>"1H.ODD[คี่]", 16 =>"1H.EVEN[คู่]", 17 =>"1H.1X2[บ้านชนะ]", 18 =>"1H.1X2[เสมอ]", 19 =>"1H.1X2[เยือนชนะ]"
);
*/
$m_bid= $data['b_id'];	
$m_add= $data['b_add'];	
$m_rob= $rob;	
$m_price= 3;	
$m_big= $data['b_big'];	
$m_zone= $data['b_zone'];	
$m_team1= $data['b_name_1'];	
$m_team2= $data['b_name_2'];	
$m_playtime= $data['b_date_play'];	
$m_hdc= $data['hdc'];	
$m_pay= $data['price1'];	

if($m_pay>0.00){
	
$js2[]=array("bill_id"=>"$man_bill","play_timestam"=>"$time_stam","play_datenow"=>"".date("Y-m-d H:i:s",$time_stam)."","play_type"=>"$m_sport_man","m_price"=>"$m_price","play_pay"=>"$m_pay","play_bet"=>"$m_hdc","play_score"=>"$m_score","play_time_live"=>"$play_time_live","play_time_live_not"=>"$play_time_live_not","play_com"=>"$mcom","b_id"=>"$m_bid","b_big"=>"$m_big" ,"b_accept"=>"$acceptp" ,"b_live"=>"$m_sport_zone","play_numstep"=>"$num_s","play_add"=>"$m_add","play_rob"=>"$m_rob","b_sport"=>"$m_sport_type","b_total"=>"$q_sum","b_pay"=>"$sdis","r_agent_id"=>$_SESSION['r_agent_id'],"play_nam_tor"=>"$mnam","b_share_m"=>"$mshare","b_code"=>"$q_num","b_rob"=>"$rob","play_code"=>"$xxx");
	
	$sql="INSERT IGNORE INTO bom_tb_football_bill_play  ( bill_id	,play_timestam	,play_datenow,	play_type,	m_price	,play_pay,	play_bet	,play_score,	play_time_live,	play_time_live_not,play_code,b_code
	,play_com,	br_com_1	,br_com_2	,br_com_3,	br_com_4
	,	b_share_m	,b_share_1,	b_share_2	,b_share_3,	b_share_4
	, b_id,	b_big, b_accept,	b_live, play_numstep , b_numstep, play_add	,play_rob,b_sport
	, b_total,	b_pay,	m_id	,b_date,	r_agent_id
	,play_nam	,play_nam_1,	play_nam_2,	play_nam_3	,play_nam_4
	)  
	 values('$man_bill','$time_stam','".date("Y-m-d H:i:s")."','$m_sport_man','$m_price' ,'$m_pay' ,'$m_hdc' ,'$m_score' ,'$play_time_live' ,'$play_time_live_not','$xxx','$q_num'
	 ,'$mcom','$mcom1','$mcom2','$mcom3','$mcom4'
	 ,'$mshare' ,'$r1share' ,'$r2share' ,'$r3share' ,'$r4share'
	 ,'$m_bid','$m_big' , '$acceptp'  ,'$m_sport_zone' ,'$num_s' ,'$num_s','$m_add' ,'$m_rob','$m_sport_type'
	 ,'$q_sum','$sdis', '".$_SESSION['m_id']."','$view_date','".$_SESSION['r_agent_id']."'
	 ,'$mnam' ,'$r1nam' ,'$r2nam' ,'$r3nam' ,'$r4nam' 
 );";
	sql_query($sql);	
$_SESSION['sum_pay']=$_SESSION['sum_pay']*$m_pay;
	
$js1=array( "b_date"=>"$view_date"	, "b_id"=>"$m_bid"	,"b_zone"=>"$m_zone"	,"b_name_1"=>"$m_team1"	,"b_name_2"=>"$m_team2"	,"b_date_play"=>"$m_playtime"	,"b_sport"=>"$m_sport_type"	,"b_score_full"=>"$m_score_FT"	,"b_score_half"=>"$m_score_1H");
$txt11 =json_encode($js1);
$url_file1="json/sport/match/".$m_sport_type."/".$m_bid.".json";
write($url_file1 ,$txt11,"w+"); 	
	
	
	
	
}#if($m_pay>0.00){
else{
#################ไม่สำเร็จ
$set_status++;
}##if($m_pay>0.00){
	
}#foreach($enum as $number){
	
	
if($set_status>0){
##########################################################ไม่สำเร็จ
##########################################################ไม่สำเร็จ
$sql="delete from bom_tb_football_bill where bill_id='$man_bill' and m_id='".$_SESSION['m_id']."'; ";
 sql_query($sql);	
 $sql="delete from bom_tb_football_bill_play where bill_id='$man_bill' and m_id='".$_SESSION['m_id']."'; ";
 sql_query($sql);	
 
   ########################################			
    $xi=$i+1;
	$_SESSION['all']['no'][$i]      = $xi;
    $_SESSION['all']['id'][$i]      = $man_bill;
	$_SESSION['all']['data'][$i]    = $num_txt;
	$_SESSION['all']['type'][$i]    = 0;
	$_SESSION['all']['sum'][$i]     = 0;
	$_SESSION['all']['betshow'][$i] = $q_sum;
	$_SESSION['all']['txt'][$i]     ="<span class='cr'>$lang_member[810]</span>";#'ไม่สำเร็จ'
   ########################################				
   
}else{#if($set_status>0){
	##########################################################สำเร็จ
##########################################################สำเร็จ
$js3['mian']=array("bill_id"=>"$man_bill","b_date"=>"$view_date","b_numstep"=>"$num_s","b_timestam"=>"$time_stam","b_datenow"=>"".date("Y-m-d H:i:s",$time_stam)."","b_total"=>"$q_sum","b_pay"=>"$sdis","b_share_m"=>$_SESSION['m_share'],"b_com"=>"$mcom","b_ip"=>"$ip","b_sum_pay"=>$_SESSION['sum_pay'],"r_agent_id"=>$_SESSION['r_agent_id'],"b_bonus"=>"0","b_status"=>"5","m_count"=>$re_m['m_count'],"b_share_m"=>"$mshare","b_code"=>"$q_num","b_rob"=>"$rob");

###############ยอมรับ
$wait=0;
$url_file3="json/sport/bet_success/".$_SESSION['m_id']."/".$man_bill.".json";		
$js3['d1']=array("b_accept"=>0,"b_sport"=>"$m_sport_type");
# ,  play_nam='$mnam', play_nam_1='$r1nam', play_nam_2='$r2nam', play_nam_3	='$r3nam',play_nam_4='$r4nam'  
$sql="update bom_tb_football_bill set  
 b_com='$mcom',br_com_1='$mcom1'	,br_com_2='$mcom2'	,br_com_3='$mcom3',	br_com_4 ='$mcom4'
,b_share_m='$mshare',	b_share_1='$r1share',	b_share_2='$r2share',	b_share_3='$r3share',	b_share_4='$r4share'
, b_accept='$wait'  ,b_sport='$m_sport_type', b_live='$m_sport_zone' ,b_sum_pay='".$_SESSION['sum_pay']."'
where bill_id='$man_bill' and  m_id='".$_SESSION['m_id']."' ";
sql_query($sql);	
		
#################################################################
#################################################################
$url_file2="json/sport/bet_playid/".$man_bill.".json";		
$txt22=json_encode($js2);
write($url_file2 ,$txt22,"w+"); 

$txt33=json_encode($js3);
write($url_file3 ,$txt33,"w+"); 

#######################เก็บถาวร
$url_file4="json/sport/bet_date/".$_SESSION['m_id']."/".$view_date."/";	
@mkdir($url_file4, 0777, true);
@chmod($url_file4, 0777);
$url_file5="json/sport/bet_date/".$_SESSION['m_id']."/".$view_date."/".$man_bill.".json";		
write($url_file5 ,$txt33,"w+"); 
$sql="update bom_tb_member set m_count = m_count-$sdis where m_id = '".$_SESSION['m_id']."'";
sql_query($sql);
   ########################################			
    $xi=$i+1;
	$_SESSION['all']['no'][$i]      = $xi;
    $_SESSION['all']['id'][$i]      = $man_bill;
	$_SESSION['all']['data'][$i]    = $num_txt;
	$_SESSION['all']['type'][$i]    = 1;
	$_SESSION['all']['sum'][$i]     = $q_sum;
	$_SESSION['all']['betshow'][$i] = $q_sum;
	$_SESSION['all']['txt'][$i]     = $ab_status[1];#'สำเร็จ'
   ########################################				
   
   
   
	}#if($set_status>0){
	
		
}#	if($q_sum>$bet_max){
}#if($q_sum<$bet_min){
}#if($num_s>$mix_max){
}#if($num_s<$mix_min){	
}#if($re_m[m_count]<$q_sum){ 




	
	
}#for ($i = 0; $i < count($ar); $i++) {

require "inc/save_fast_ok.php";
?>