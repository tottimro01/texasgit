<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php   
header("Content-type:text/html; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);       

if(($_SESSION['m_id'] == '') || (!isset($_SESSION['m_id']))){  exit();}

require('inc/conn.php');
require('inc/function.php');
// require("lang/member_lang.php");
  require("lang/variable_lang.php");

if( !strstr($_SERVER['HTTP_REFERER'],$check_url)){exit();}


$fo="json/login/token_bet/".$_SESSION['m_id'].".php";
@require_once($fo);
if($_SESSION['bettoken']!=$bet_token){ exit();}


$fo="json/ip/".$_SESSION['m_id'].".php";
require($fo);
$token_ip = md5($_SERVER['SERVER_ADDR']);
if($token_ip!=$m_ip){ exit(); }


$res = array();
$js1 = array();
$js2 = array();
$js3 = array();
$js6 = array();
$c_accept=0;
$play_id='';



//# 0=$sport_type # 1=$sport_zone # 2=ผลบอลตอนนั้น # 3=$sport_man # 4=ราคาเช่น MY , HK , EU # 5=ID # 6=ADD # 7=ROB # 8=ทีมต่อ # 9=ชื่อลีก # 10=ชื่อทีมบ้าน # 11=ชื่อทีมเยือน # 12=เวลาเตะ
# 13=ราคา คูณจ่าย # 14=HDC # 15= $sport_mix #  16= ยอดเล่น*/
$view_date=_bdate();
$ip=_bIP();
$num_s = 0;
$set_status=0;

$sql="select m_id,m_count from bom_tb_member where m_id='".$_SESSION['m_id']."'";
$re_m=sql_array($sql);
if($re_m['m_id']==""){  exit();}
if($re_m['m_count']<=0){$re_m['m_count']=0;}
if($re_m['m_count']<$q_sum){  exit();  }
	


$ar = $_REQUEST['step'];     
$q_sum=@str_replace(',','',$_POST["sum"]);
$ood=$_POST["ood"];

for($i=0;$i<count($ar);$i++){ 
	$stp1 = @explode("," , $ar[$i]);
	$num_s++;
}

#,'$sdis' , b_pay 
$sql="INSERT IGNORE INTO bom_tb_football_bill  ( b_date ,b_numstep , b_timestam , b_datenow , b_total
 , m_id  ,  b_ip  , b_sum_pay ,r_agent_id 
 ) 
values ('$view_date' ,'$num_s','$time_stam','".date("Y-m-d H:i:s",$time_stam)."','$q_sum'
 ,'".$_SESSION['m_id']."','$ip','$ood' ,'".$_SESSION['r_agent_id']."'
 )";
sql_query($sql);


	$sql="select * from bom_tb_football_bill   where m_id='".$_SESSION['m_id']."'  order by bill_id desc limit 1";
	$reeb=sql_array($sql);
	$man_bill=$reeb['bill_id'];


			/*################## ส่ง DATA
# 0=$sport_type # 1=$sport_zone # 2=ผลบอลตอนนั้น # 3=$sport_man # 4=ราคาเช่น MY , HK , EU # 5=ID # 6=ADD # 7=ROB # 8=ทีมต่อ # 9=ชื่อลีก # 10=ชื่อทีมบ้าน # 11=ชื่อทีมเยือน # 12=เวลาเตะ  # 13=เวลาLive แปลงแล้ว # 14 เวลาLive ยังไม่แปลง 
# 15=ราคา คูณจ่าย  # 16=HDC # 17= $sport_mix #  18= ยอดเล่น*/

for($i=0;$i<count($ar);$i++){
	
	

$stp = @explode("," , $ar[$i]);
$m_sport_type = $stp[0];	
#$sport_type = array(1 =>"ฟุตบอล", 2 =>"มวยไทย", 3 =>"บาสเกตบอล", 4 =>"อเมริกันฟุตบอล", 5 =>"เบสบอล", 6 =>"ฮอกกี้", 7 =>"เทนนิส", 8 =>"วอลเลย์บอล", 9 =>"แบดมินตัน", 10 =>"สนุกเกอร์");
$m_sport_zone = $stp[1];	
#$sport_zone = array(1 =>"ก่อนเวลา", 2 =>"สด");
$m_score= $stp[2];	
$m_sport_man= $stp[3];	
/*
$sport_man = array(
1 =>"FT.HDC[บ้าน]", 2 =>"FT.HDC[เยือน]", 3 =>"FT.GOAL[สูง]", 4 =>"FT.GOAL[ต่ำ]",
5 =>"FT.ODD[คี่]", 6 =>"FT.EVEN[คู่]", 7 =>"FT.1X2[บ้านชนะ]", 8 =>"FT.1X2[เสมอ]", 9 =>"FT.1X2[เยือนชนะ]",
11 =>"1H.HDC[บ้าน]", 12 =>"1H.HDC[เยือน]", 13 =>"1H.GOAL[สูง]", 14 =>"1H.GOAL[ต่ำ]",
15 =>"1H.ODD[คี่]", 16 =>"1H.EVEN[คู่]", 17 =>"1H.1X2[บ้านชนะ]", 18 =>"1H.1X2[เสมอ]", 19 =>"1H.1X2[เยือนชนะ]"
);
*/
$m_price= $stp[4];	
$m_bid= $stp[5];	
$m_add= $stp[6];	
$m_rob= $stp[7];	
#$m_big= $stp[8];	
#$m_zone= $stp[9];	
#$m_team1= $stp[10];	
#$m_team2= $stp[11];	
#$m_playtime= $stp[12];	
#$m_hdc= $stp[16];	
#$m_pay= $stp[17];		
$m_sport_mix= $stp[14];	
$m_bet= $stp[18];	
$play_time_live=_tlive( $stp[13]);	
$play_time_live_not= $stp[13];
$ball_step= $stp[15];	


$url_file_max="json/sport/max_match/".$_SESSION['m_id']."/".$m_bid.".json";
$xmax_bet=@file_get_contents2($url_file_max);
$mmbet = json_decode2($xmax_bet, true);
$check_mm=intval($mmbet['mbet'])+$q_sum;
$em=@explode(',',$_SESSION['m_max_match']);
if($m_sport_type==1){
	$old_max=$em[1];
	}elseif($m_sport_type==2){
		$old_max=$em[2];
		}else{
			$old_max=$em[3];
			}

if($check_mm>$old_max and $num_s==1){
	#################ไม่สำเร็จ
$res["status"] = 3;##1=ไม่สำเร็จ	
$res["tmax"] =number_format($old_max);
unset($_SESSION["ttt"]);
echo json_encode($res);
exit();
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
#$res["SQL"] = "$q_sum, $sdis,  $_SESSION[m_step_dis] ,$_SESSION[m_com], $num_s,$m_sport_type"; 


$mshare= _share($num_s , $_SESSION['m_share'] ,$_SESSION['m_share_live'] , $m_sport_type , $m_sport_zone );
$r1share= _share($num_s , $_SESSION['r_share_1'] ,$_SESSION['r_share_live_1'] , $m_sport_type , $m_sport_zone );
$r2share= _share($num_s , $_SESSION['r_share_2'] ,$_SESSION['r_share_live_2'] , $m_sport_type , $m_sport_zone );
$r3share= _share($num_s , $_SESSION['r_share_3'] ,$_SESSION['r_share_live_3'] , $m_sport_type , $m_sport_zone );
$r4share= _share($num_s , $_SESSION['r_share_4'] ,$_SESSION['r_share_live_4'] , $m_sport_type , $m_sport_zone );




############ ก่อนเวลา
if($m_sport_zone==2){
	########## รอ
	$c_accept++;
	$accept = 1;
}else{
	###########ยอมรับ
	$accept = 0;
}


	


if($ball_step==0){
	
if($m_sport_type>2){$table="bom_tb_data_football_sport";}
else{$table="bom_tb_data_football_single";}
$sql="select * from $table  where    	b_x='1' and b_id=$m_bid and b_add=$m_add   and b_date='$view_date' and b_sport=$m_sport_type   limit 1";	
$reb=sql_array($sql);


$rob=1;	
$m_big= $reb['b_big'];	
$m_zone= $reb['b_zone'];	
$m_team1= $reb['b_name_1'];	
$m_team2= $reb['b_name_2'];	
$m_playtime= $reb['b_date_play'];	
$m_score_FT= $reb['b_score_full'];	
$m_score_1H= $reb['b_score_half'];	

	$b_h_price_2= number_format(_wp2( $reb['b_h_price'] , $reb['b_h_percent'] ),2);
	$b_g_price_2= number_format(_wp2( $reb['b_g_price'] , $reb['b_g_percent'] ),2);
	
	$b_1h_price_2= number_format(_wp2( $reb['b_1h_price'] , $reb['b_1h_percent'] ),2);
	$b_1g_price_2= number_format(_wp2( $reb['b_1g_price'] , $reb['b_1g_percent'] ),2);
	
	
	$b_oe_price= number_format(_wp2( $reb['b_oe_price'] , $reb['b_oe_percent'] ),2);
	$b_1hoe_price= number_format(_wp2( $reb['b_1hoe_price'] , $reb['b_1hoe_percent'] ),2);
	

	

if($m_sport_man==1 and ($reb['b_a']==1  or $reb['b_b']==1)){
$m_hdc= $reb['b_h_hdc'];	
$m_pay= $reb['b_h_price'];		
}elseif($m_sport_man==2 and ($reb['b_a']==1  or $reb['b_b']==1)){
$m_hdc= $reb['b_h_hdc'];	
$m_pay= $b_h_price_2;		
}elseif($m_sport_man==3 and ($reb['b_g_a']==1  or $reb['b_g_b']==1)){
$m_hdc= $reb['b_g_hdc'];	
$m_pay= $reb['b_g_price'];		
}elseif($m_sport_man==4 and ($reb['b_g_a']==1  or $reb['b_g_b']==1)){
$m_hdc= $reb['b_g_hdc'];	
$m_pay= $b_g_price_2;		

			}elseif($m_sport_man==5 and ($reb['b_1x2_a']==1  or $reb['b_1x2_b']==1)){
$m_hdc= '';	
$m_pay= $reb['b_1x2_h_price_1'];		
				}elseif($m_sport_man==7 and ($reb['b_1x2_a']==1  or $reb['b_1x2_b']==1)){
$m_hdc= '';	
$m_pay= $reb['b_1x2_h_price_2'];		
					}elseif($m_sport_man==6 and ($reb['b_1x2_a']==1  or $reb['b_1x2_b']==1)){
$m_hdc= '';	
$m_pay= $reb['b_1x2_h_price_3'];	
		}elseif($m_sport_man==8 and ($reb['b_oe_a']==1  or $reb['b_oe_b']==1)){
$m_hdc= '';	
$m_pay= $reb['b_oe_price'];		
		}elseif($m_sport_man==9 and ($reb['b_oe_a']==1  or $reb['b_oe_b']==1)){
$m_hdc= '';	
$m_pay= $b_oe_price;		
#####################
}elseif($m_sport_man==11 and ($reb['b_1h_a']==1  or $reb['b_1h_b']==1)){
$m_hdc= $reb['b_1h_hdc'];	
$m_pay= $reb['b_1h_price'];		
}elseif($m_sport_man==12 and ($reb['b_1h_a']==1  or $reb['b_1h_b']==1)){
$m_hdc= $reb['b_1h_hdc'];	
$m_pay= $b_1h_price_2;		
}elseif($m_sport_man==13 and ($reb['b_1g_a']==1  or $reb['b_1g_b']==1)){
$m_hdc= $reb['b_1g_hdc'];	
$m_pay= $reb['b_1g_price'];		
}elseif($m_sport_man==14 and ($reb['b_1g_a']==1  or $reb['b_1g_b']==1)){
$m_hdc= $reb['b_1g_hdc'];	
$m_pay= $b_1g_price_2;		
	
}elseif($m_sport_man==15 and ($reb['b_1h_1x2_a']==1  or $reb['b_1h_1x2_b']==1)){
$m_hdc= '';	
$m_pay= $reb['b_1x2_1h_price_1'];		
}elseif($m_sport_man==17 and ($reb['b_1h_1x2_a']==1  or $reb['b_1h_1x2_b']==1)){
$m_hdc= '';	
$m_pay= $reb['b_1x2_1h_price_2'];		
}elseif($m_sport_man==16 and ($reb['b_1h_1x2_a']==1  or $reb['b_1h_1x2_b']==1)){
$m_hdc= '';	
$m_pay= $reb['b_1x2_1h_price_3'];		
	}elseif($m_sport_man==18 and ($reb['b_1hoe_a']==1  or $reb['b_1hoe_b']==1)){
$m_hdc= '';	
$m_pay= $reb['b_1hoe_price'];		
		}elseif($m_sport_man==19 and ($reb['b_1hoe_a']==1  or $reb['b_1hoe_b']==1)){
$m_hdc= '';	
$m_pay= $b_1hoe_price;	
	}

###############เปลี่ยนราคาสเต็ปเป็น EU
if($num_s>1){
$m_pay= price_ball($m_pay , 3);
	}
	
$mnam=_nam($num_s , $m_pay, $_SESSION['m_nam_tor'] ,$_SESSION['m_nam_tor_live'] , $_SESSION['m_nam_rong'] ,$_SESSION['m_nam_rong_live'] , $m_sport_type , $m_sport_zone);
$r1nam=_nam($num_s , $m_pay, $_SESSION['r_nam_tor_1'] ,$_SESSION['r_nam_tor_live_1'] , $_SESSION['r_nam_rong_1'] ,$_SESSION['r_nam_rong_live_1'] , $m_sport_type , $m_sport_zone);
$r2nam=_nam($num_s , $m_pay, $_SESSION['r_nam_tor_2'] ,$_SESSION['r_nam_tor_live_2'] , $_SESSION['r_nam_rong_2'] ,$_SESSION['r_nam_rong_live_2'] , $m_sport_type , $m_sport_zone);
$r3nam=_nam($num_s , $m_pay, $_SESSION['r_nam_tor_3'] ,$_SESSION['r_nam_tor_live_3'] , $_SESSION['r_nam_rong_3'] ,$_SESSION['r_nam_rong_live_3'] , $m_sport_type , $m_sport_zone);
$r4nam=_nam($num_s , $m_pay, $_SESSION['r_nam_tor_4'] ,$_SESSION['r_nam_tor_live_4'] , $_SESSION['r_nam_rong_4'] ,$_SESSION['r_nam_rong_live_4'] , $m_sport_type , $m_sport_zone);


$m_pay=_ntor_save($m_pay ,$mnam);	



}else{



#require('data/data/football_step_php.php');
$rebs=$St[$m_bid][$m_add];

	if($rebs[18]=='h'){$big=1;}
	else{$big=2;}
	
#$rob= _rob();	
$m_price= 3;	
$m_big= $big;	
$m_zone= $rebs[4];	
$m_team1= $rebs[5];	
$m_team2= $rebs[6];	
$m_playtime= $rebs[45];	
#$m_score_FT= $rebs[b_score_full];	
#$m_score_1H= $rebs[b_score_half];	
if($m_sport_man==1){
$m_hdc= $rebs[15];	
$m_pay= $rebs[16];		
}elseif($m_sport_man==2){
$m_hdc= $rebs[15];	
$m_pay= $rebs[17];	
}elseif($m_sport_man==3){
$m_hdc= $rebs[20];	
$m_pay= $rebs[21];		
}elseif($m_sport_man==4){
$m_hdc= $rebs[20];	
$m_pay= $rebs[22];	
}


}





#$res["SQL"] = $sql;	

	
if($m_pay!=0.00){
	
$js2[]=array("bill_id"=>"$man_bill","play_timestam"=>"$time_stam","play_datenow"=>"".date("Y-m-d H:i:s",$time_stam)."","play_type"=>"$m_sport_man","m_price"=>"$m_price","play_pay"=>"$m_pay","play_bet"=>"$m_hdc","play_score"=>"$m_score","play_time_live"=>"$play_time_live","play_time_live_not"=>"$play_time_live_not","play_com"=>"$mcom","b_id"=>"$m_bid","b_big"=>"$m_big" ,"b_accept"=>"$accept" ,"b_live"=>"$m_sport_zone","play_numstep"=>"$num_s","play_add"=>"$m_add","play_rob"=>"$m_rob","b_sport"=>"$m_sport_type","b_total"=>"$q_sum","b_pay"=>"$sdis","r_agent_id"=>$_SESSION['r_agent_id'],"play_nam_tor"=>"$mnam","b_share_m"=>"$mshare");

	$sql="INSERT IGNORE INTO bom_tb_football_bill_play  ( bill_id	,play_timestam	,play_datenow,	play_type,	m_price	,play_pay,	play_bet	,play_score,	play_time_live,	play_time_live_not
	,play_com,	br_com_1	,br_com_2	,br_com_3,	br_com_4
	,	b_share_m	,b_share_1,	b_share_2	,b_share_3,	b_share_4
	, b_id,	b_big, b_accept,	b_live, play_numstep , b_numstep, play_add	,play_rob,b_sport
	, b_total,	b_pay,	m_id	,b_date,	r_agent_id
	,play_nam	,play_nam_1,	play_nam_2,	play_nam_3	,play_nam_4
	)  
	 values('$man_bill','$time_stam','".date("Y-m-d H:i:s")."','$m_sport_man','$m_price' ,'$m_pay' ,'$m_hdc' ,'$m_score' ,'$play_time_live' ,'$play_time_live_not'
	 ,'$mcom','$mcom1','$mcom2','$mcom3','$mcom4'
	 ,'$mshare' ,'$r1share' ,'$r2share' ,'$r3share' ,'$r4share'
	 ,'$m_bid','$m_big' , '$accept'  ,'$m_sport_zone' ,'$num_s' ,'$num_s','$m_add' ,'$m_rob','$m_sport_type'
	 ,'$q_sum','$sdis', '".$_SESSION['m_id']."','$view_date','".$_SESSION['r_agent_id']."'
	 ,'$mnam' ,'$r1nam' ,'$r2nam' ,'$r3nam' ,'$r4nam' 
 );";
	sql_query($sql);	


$js1=array( "b_date"=>"$view_date"	, "b_id"=>"$m_bid"	,"b_zone"=>"$m_zone"	,"b_name_1"=>"$m_team1"	,"b_name_2"=>"$m_team2"	,"b_date_play"=>"$m_playtime"	,"b_sport"=>"$m_sport_type"	,"b_score_full"=>"$m_score_FT"	,"b_score_half"=>"$m_score_1H");
$txt11 =json_encode($js1);
$url_file1="json/sport/match/".$m_sport_type."/".$m_bid.".json";
write($url_file1 ,$txt11,"w+"); 


	  
	  

}else{
	#################ไม่สำเร็จ
$set_status++;
}
}
}



if($set_status>0){
##########################################################ไม่สำเร็จ
##########################################################ไม่สำเร็จ
	
$sql="delete from bom_tb_football_bill where bill_id='$man_bill' and m_id='".$_SESSION['m_id']."'; ";
 #sql_query($sql);	
 $sql="delete from bom_tb_football_bill_play where bill_id='$man_bill' and m_id='".$_SESSION['m_id']."'; ";
# sql_query($sql);	
 
$res["status"] = 0;##1=ไม่สำเร็จ
$res["type_bet"] = 0; #

	}else{
##########################################################สำเร็จ
##########################################################สำเร็จ
if($num_s==1){
	#############MAX match
$js6=array( "b_id"=>"$m_bid"	, "mbet"=>"$check_mm");
$txt66 =json_encode($js6);
write($url_file_max ,$txt66,"w+"); 	
}


$js3['mian']=array("bill_id"=>"$man_bill","b_date"=>"$view_date","b_numstep"=>"$num_s","b_timestam"=>"$time_stam","b_datenow"=>"".date("Y-m-d H:i:s",$time_stam)."","b_total"=>"$q_sum","b_pay"=>"$sdis","b_share_m"=>$_SESSION['m_share'],"b_com"=>"$mcom","b_ip"=>"$ip","b_sum_pay"=>"$ood","r_agent_id"=>$_SESSION['r_agent_id'],"b_bonus"=>"0","b_status"=>"5","m_count"=>$re_m['m_count'],"b_share_m"=>"$mshare");


if($c_accept>0){
###############รอ	
$wait=1;
$url_file3="json/sport/bet_wait/".$_SESSION['m_id']."/".$man_bill.".json";		
$js3['d1']=array("b_accept"=>1,"b_sport"=>"$m_sport_type");
}else{
###############ยอมรับ
$wait=0;
$url_file3="json/sport/bet_success/".$_SESSION['m_id']."/".$man_bill.".json";		
$js3['d1']=array("b_accept"=>0,"b_sport"=>"$m_sport_type");
}


$res["type_bet"] = $wait; 



#if($ball_step==0){
$sql="update bom_tb_football_bill set  
b_pay='$sdis'
 ,  play_nam='$mnam', play_nam_1='$r1nam', play_nam_2='$r2nam', play_nam_3	='$r3nam',play_nam_4='$r4nam'  
, b_com='$mcom',br_com_1='$mcom1'	,br_com_2='$mcom2'	,br_com_3='$mcom3',	br_com_4 ='$mcom4'
,b_share_m='$mshare',	b_share_1='$r1share',	b_share_2='$r2share',	b_share_3='$r3share',	b_share_4='$r4share'
, b_accept='$wait'  ,b_sport='$m_sport_type', b_live='$m_sport_zone' ,b_rob='$rob'
where bill_id='$man_bill' and  m_id='".$_SESSION['m_id']."' ";
sql_query($sql);	
#	}
#$res["SQL"] = $sql; 
	
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
$res["status"] = 1;##1=สำเร็จ


}
		

unset($_SESSION["ttt"]);
echo json_encode($res);
?>
