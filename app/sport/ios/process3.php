<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
header("Content-type: text/json");     
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);

require('../inc/conn.php');
require('../inc/function.php');
require('../config.php');

  if($ren[con_service]==0){ exit();}
#$_POST[mid]=2;
#$_POST[rid]=2;

#$_POST[sum2]=100;
#$_POST[num2]="1+5+9";

	

$sql="select *   from bom_tb_member where m_id='$_POST[mid]'";
$re_m=sql_array($sql);
$sql="select *   from bom_tb_agent where r_id='$re_m[r_id]'";
$re_r=sql_array($sql);


if($re_m[m_active]!=1){
	$pq=0;
	$x_pg=0;
########################################	
		 $type_error[$x_pg][col]=$x_pg;
		$type_error[$x_pg][status]=4;
		$type_error[$x_pg][txt]="0";
		$type_error[$x_pg][alert]="ติดต่อตัวแทน";
		$type_error[$x_pg][id]=$x_pg;
		$type_error[$x_pg][pq]=$pq;
		$type_error[$x_pg][credit]=0;
		echo json_encode($type_error);
exit(); 
	}


$price_type=_price_type( $re_m[m_price_type] );

$url_file=$server_js."txt/json/process_1_".$price_type.".json";	
$d_js=file_get_contents2($url_file);
$code1 = json_decode($d_js, true);
#$re_m[m_accept]==1  and 
 if($re_m[m_live]==1){
$url_file=$server_js."txt/json/process_live_1_".$price_type.".json";	
$d_js=file_get_contents2($url_file);
$code11 = json_decode($d_js, true);

 }
$url_file=$server_js."txt/json/process_6_".$price_type.".json";	
$d_js=file_get_contents2($url_file);
$code6 = json_decode($d_js, true);
#$re_m[m_accept]==1  and 
 if($re_m[m_live]==1){
$url_file=$server_js."txt/json/process_live_6_".$price_type.".json";	
$d_js=file_get_contents2($url_file);
$code66 = json_decode($d_js, true);

 }
 /*
$url_file=$server_js."txt/json/agent.json";	
$d_js=file_get_contents2($url_file);
$jag = json_decode($d_js, true);
*/
$exr=@explode("*",$re_m[r_agent_id]);
############1#############
$url_file=$server_js."txt/json/agent/".$exr[1].".json";	
$d_js = file_get_contents2($url_file);
$jag1 = json_decode($d_js, true);
############1#############	
############1#############
$url_file=$server_js."txt/json/agent/".$exr[2].".json";	
$d_js = file_get_contents2($url_file);
$jag2 = json_decode($d_js, true);
############1#############	
############1#############
$url_file=$server_js."txt/json/agent/".$exr[3].".json";	
$d_js = file_get_contents2($url_file);
$jag3 = json_decode($d_js, true);
############1#############	
############1#############
$url_file=$server_js."txt/json/agent/".$exr[4].".json";	
$d_js = file_get_contents2($url_file);
$jag4 = json_decode($d_js, true);
############1#############	
############1#############
$url_file=$server_js."txt/json/agent/".$exr[5].".json";	
$d_js = file_get_contents2($url_file);
$jag5 = json_decode($d_js, true);
############1#############	
############1#############
$url_file=$server_js."txt/json/agent/".$exr[6].".json";	
$d_js = file_get_contents2($url_file);
$jag6 = json_decode($d_js, true);
############1#############	
############1#############
$url_file=$server_js."txt/json/agent/".$exr[7].".json";	
$d_js = file_get_contents2($url_file);
$jag7 = json_decode($d_js, true);
############1#############	
############1#############
$url_file=$server_js."txt/json/agent/".$exr[8].".json";	
$d_js = file_get_contents2($url_file);
$jag8 = json_decode($d_js, true);
############1#############	
############1#############
$url_file=$server_js."txt/json/agent/".$exr[9].".json";	
$d_js = file_get_contents2($url_file);
$jag9 = json_decode($d_js, true);
############1#############	

if($exr[1]>0){
$ax[1]=$jag1[r_active];
}
if($exr[2]>0){
$ax[2]=$jag2[r_active];
}
if($exr[3]>0){
$ax[3]=$jag3[r_active];
}
if($exr[4]>0){
$ax[4]=$jag4[r_active];
}
if($exr[5]>0){
$ax[5]=$jag5[r_active];
}
if($exr[6]>0){
$ax[6]=$jag6[r_active];
}
if($exr[7]>0){
$ax[7]=$jag7[r_active];
}
if($exr[8]>0){
$ax[8]=$jag8[r_active];
}
if($exr[9]>0){
$ax[9]=$jag9[r_active];
}


$stop=1;
for($xx=1; $xx < $re_m[m_level]; $xx++){
if($ax[$xx]==0 or $ax[$xx]==2){
$stop=0;
	}
	}

	
	if($stop==0){

	$pq=0;
	$x_pg=0;
########################################	
		 $type_error[$x_pg][col]=$x_pg;
		$type_error[$x_pg][status]=4;
		$type_error[$x_pg][txt]="0";
		$type_error[$x_pg][alert]="ติดต่อตัวแทน";
		$type_error[$x_pg][id]=$x_pg;
		$type_error[$x_pg][pq]=$pq;
		$type_error[$x_pg][credit]=0;
		echo json_encode($type_error);
		exit(); 
		}

#############ส่วนลด
$ardis1=$jag1[r_dis];
$ardis2=$jag2[r_dis];
$ardis3=$jag3[r_dis];
$ardis4=$jag4[r_dis];
$ardis5=$jag5[r_dis];
$ardis6=$jag6[r_dis];
$ardis7=$jag7[r_dis];
$ardis8=$jag8[r_dis];

################บอลเต็ง 5ตังค์
$exd1d5=array();
$exd1d5[1]=$jag1[r_dis_5];
$exd1d5[2]=$jag2[r_dis_5];
$exd1d5[3]=$jag3[r_dis_5];
$exd1d5[4]=$jag4[r_dis_5];
$exd1d5[5]=$jag5[r_dis_5];
$exd1d5[6]=$jag6[r_dis_5];
$exd1d5[7]=$jag7[r_dis_5];
$exd1d5[8]=$jag8[r_dis_5];
$exd1d5[m]=$re_m[m_dis_5];


$exd1=@explode(",",$ardis1);
$exd2=@explode(",",$ardis2);
$exd3=@explode(",",$ardis3);
$exd4=@explode(",",$ardis4);
$exd5=@explode(",",$ardis5);
$exd6=@explode(",",$ardis6);
$exd7=@explode(",",$ardis7);
$exd8=@explode(",",$ardis8);
$exdm=@explode(",",$re_m[m_dis]);

#############น้ำ
$arnam1=$jag2[r_nam];
$arnam2=$jag3[r_nam];
$arnam3=$jag4[r_nam];
$arnam4=$jag5[r_nam];
$arnam5=$jag6[r_nam];
$arnam6=$jag7[r_nam];
$arnam7=$jag8[r_nam];
$arnam8=$jag9[r_nam];

$exn1=@explode(",",$arnam1);
$exn2=@explode(",",$arnam2);
$exn3=@explode(",",$arnam3);
$exn4=@explode(",",$arnam4);
$exn5=@explode(",",$arnam5);
$exn6=@explode(",",$arnam6);
$exn7=@explode(",",$arnam7);
$exn8=@explode(",",$arnam8);
$mxn=@explode(",",$re_m[m_nam]);

#############หุ้น
$arshare1=$jag1[r_share];
$arshare2=$jag2[r_share];
$arshare3=$jag3[r_share];
$arshare4=$jag4[r_share];
$arshare5=$jag5[r_share];
$arshare6=$jag6[r_share];
$arshare7=$jag7[r_share];
$arshare8=$jag8[r_share];


#############หุ้นเก็บ
#$marshare1=$jag[$exr[1]][r_share_my];
$marshare2=$jag2[r_share_my];
$marshare3=$jag3[r_share_my];
$marshare4=$jag4[r_share_my];
$marshare5=$jag5[r_share_my];
$marshare6=$jag6[r_share_my];
$marshare7=$jag7[r_share_my];
$marshare8=$jag8[r_share_my];

$ss= _share2($re_m[m_level]  ,$marshare2 , $marshare3 , $marshare4, $marshare5, $marshare6, $marshare7, $marshare8, $re_m[m_share], $arshare1, $arshare2, $arshare3, $arshare4, $arshare5, $arshare6, $arshare7, $arshare8);
#$ss= _share($re_m[m_level] , $arshare1 ,$arshare2 , $arshare3 , $arshare4, $arshare5, $arshare6, $arshare7, $arshare8, $re_m[m_share]);
$share1=$ss[s1];
$share2=$ss[s2];
$share3=$ss[s3];
$share4=$ss[s4];
$share5=$ss[s5];
$share6=$ss[s6];
$share7=$ss[s7];
$share8=$ss[sm];

##################################1111111111111111############################

$type_error = array();
$x_pg=0;
for($pq=1;$pq<=10;$pq++){
	

	
	

$q_sum=intval(str_replace(",","",trim($_POST[sum.$pq])));
$q_num=trim($_POST[num.$pq]);
$re_m[m_count]=intval($re_m[m_count]);

$m_lat=trim($_POST[lat]);
$m_lon=trim($_POST[lon]);


if($q_sum>0){
	




if($re_m[m_count]<$q_sum){
		 $type_error[$x_pg][col]=$x_pg;
		$type_error[$x_pg][status]=4;
		$type_error[$x_pg][txt]="$re_m[m_count]";
		$type_error[$x_pg][alert]="เครดิต ไม่พอ";
		$type_error[$x_pg][id]=$x_pg;
		$type_error[$x_pg][pq]=$pq;
		$type_error[$x_pg][credit]=($re_m[m_count]);
		echo json_encode($type_error);
	exit();
	}

$q_num=rtrim($q_num,"+");
$q_num=str_replace(array("++++","+++","++","***","**","*"),array("+","+","+","+","+","+"),$q_num);	
$array=explode("+",$q_num);
$ex1 = array_unique( $array );
$num_s=count($ex1);



$dis_arr=_dis($re_m[m_level] , $num_s ,$exd1 , $exd2 , $exd3 , $exd4 , $exd5 , $exd6 , $exd7 , $exd8 , $exdm , $exd1d5 );



$exstep=explode(",",$re_m[m_step2]);
$exmax=explode(",",$re_m[m_max]);
$exmin=explode(",",$re_m[m_min]);

if($num_s>1){
$type_bet=2;
	}else{
$type_bet=1;
}


if($re_m[m_step1]==0 and $num_s==1){
########################################	
		 $type_error[$x_pg][col]=$x_pg;
		$type_error[$x_pg][status]=3;
		$type_error[$x_pg][txt]="$q_num";
		$type_error[$x_pg][alert]="แทงเต็งไม่ได้";
		$type_error[$x_pg][id]=$x_pg;
		$type_error[$x_pg][pq]=$pq;
		$type_error[$x_pg][credit]=($re_m[m_count]);
		echo json_encode($type_error);
	exit();
########################################	
}


	if($num_s<$exstep[0] and $num_s>1){
########################################	
		 $type_error[$x_pg][col]=$x_pg;
		$type_error[$x_pg][status]=3;
		$type_error[$x_pg][txt]="$exstep[0] คู่";
		$type_error[$x_pg][alert]="แทงสเต็ปขั้นต่ำ";
		$type_error[$x_pg][id]=$x_pg;
		$type_error[$x_pg][pq]=$pq;
		$type_error[$x_pg][credit]=($re_m[m_count]);
		echo json_encode($type_error);
	exit();
########################################	
}

if($num_s>$exstep[1] and $num_s>1){
########################################	
		 $type_error[$x_pg][col]=$x_pg;
		$type_error[$x_pg][status]=3;
		$type_error[$x_pg][txt]="$exstep[1] คู่";
		$type_error[$x_pg][alert]="แทงสเต็ปสูงสุด";
		$type_error[$x_pg][id]=$x_pg;
		$type_error[$x_pg][pq]=$pq;
		$type_error[$x_pg][credit]=($re_m[m_count]);
		echo json_encode($type_error);
	exit();
########################################	
}


if($q_sum<$exmin[0] and $num_s==1){
########################################	
		 $type_error[$x_pg][col]=$x_pg;
		$type_error[$x_pg][status]=3;
		$type_error[$x_pg][txt]="$exmin[0] บาท";
		$type_error[$x_pg][alert]="เงินเต็งขั้นต่ำ";
		$type_error[$x_pg][id]=$x_pg;
		$type_error[$x_pg][pq]=$pq;
		$type_error[$x_pg][credit]=($re_m[m_count]);
		echo json_encode($type_error);
	exit();
########################################	
}


	if($q_sum<$exmin[1] and $num_s>1){
########################################	
		 $type_error[$x_pg][col]=$x_pg;
		$type_error[$x_pg][status]=3;
		$type_error[$x_pg][txt]="$exmin[1] บาท";
		$type_error[$x_pg][alert]="เงินสเต็ปขั้นต่ำ";
		$type_error[$x_pg][id]=$x_pg;
		$type_error[$x_pg][pq]=$pq;
		$type_error[$x_pg][credit]=($re_m[m_count]);
		echo json_encode($type_error);
	exit();
########################################	
}

	if($q_sum>$exmax[0] and $num_s==1){
########################################	
		 $type_error[$x_pg][col]=$x_pg;
		$type_error[$x_pg][status]=3;
		$type_error[$x_pg][txt]="$exmax[0] บาท";
		$type_error[$x_pg][alert]="เงินเต็งสูงสุด";
		$type_error[$x_pg][id]=$x_pg;
		$type_error[$x_pg][pq]=$pq;
		$type_error[$x_pg][credit]=($re_m[m_count]);
		echo json_encode($type_error);
	exit();
########################################	
}

if($q_sum>$exmax[1] and $num_s>1){
########################################	
		 $type_error[$x_pg][col]=$x_pg;
		$type_error[$x_pg][status]=3;
		$type_error[$x_pg][txt]="$exmax[1] บาท";
		$type_error[$x_pg][alert]="เงินสเต็ปสูงสุด";
		$type_error[$x_pg][id]=$x_pg;
		$type_error[$x_pg][pq]=$pq;
		$type_error[$x_pg][credit]=($re_m[m_count]);
		echo json_encode($type_error);
	exit();
########################################	
}


$sql="INSERT IGNORE INTO  bom_tb_football_bill (b_date, 	b_timestam, 	b_datenow ,	b_total  ,	b_numstep 	   ,	b_com_arr , 	m_id ,	r_id ,	b_code,  b_hid , 	b_ip ,	b_accept, r_agent_id
,b_share, br_share_1 , br_share_2, br_share_3, br_share_4, br_share_5, br_share_6, br_share_7   , b_web_from  , m_accept , b_currency ) 
values('"._bdate()."','$time_stam',now(),'$q_sum' ,'$num_s' ,'$dis_arr'  ,'$re_m[m_id]','$re_m[r_id]','$q_num','1' ,'"._bIP()."','$re_m[m_accept]','$re_m[r_agent_id]'
,'$share8', '$share1', '$share2', '$share3', '$share4', '$share5', '$share6', '$share7' ,'1'   ,'$re_m[m_accept]'  ,'$re_m[m_currency]' )";
sql_query($sql);

$sql="select * from bom_tb_football_bill   where m_id='$re_m[m_id]' and b_code='$q_num'   and b_total='$q_sum'  order by bill_id desc limit 1";
$reeb=sql_array($sql);

 $sql="update bom_tb_member set m_count=m_count-$q_sum where m_id='$re_m[m_id]' ";
sql_query($sql);


$error_id=array();
$count_num=array();
$_SESSION[sum_pay]=1;
$acceptx=0;
$time_live=0;
$arr_1x2oe_no = 0;
$arr_1x2oe_live_no = 0;
$bmuy = array();
$have_live = 0;
foreach($ex1 as $num){
$num=intval($num);
		if($num>0){	
		
#$ev1=$code[$num];
						$ev1=$code11[$num];
						if($ev1[b_hdc_1]==""){
						$ev1=$code1[$num];
							}
						if($ev1[b_hdc_1]==""){
						$ev1=$code66[$num];
							}
						if($ev1[b_hdc_1]==""){
						$ev1=$code6[$num];
							}




	if($ev1[b_type]==1 or $ev1[b_type]==3 or $ev1[b_type]==5 or $ev1[b_type]==8 or $ev1[b_type]==11 or $ev1[b_type]==13 or $ev1[b_type]==15 or $ev1[b_type]==18){
		######################################
if(($ev1[bet_a]+$q_sum)>=$ev1[bet_b]){
$summax=($ev1[bet_a]+$q_sum)-$ev1[bet_b];	
}else{
$summax=$ev1[bet_b]-($ev1[bet_a]+$q_sum);	
	}
     ######################################	
	}else{
		######################################
if(($ev1[bet_b]+$q_sum)>=$ev1[bet_a]){
$summax=($ev1[bet_b]+$q_sum)-$ev1[bet_a];	
}else{
$summax=$ev1[bet_a]-($ev1[bet_b]+$q_sum);	
	}
     ######################################	
		}
		


if(($num_s>1) or  ($ev1[btype]!=1) or ($ev1[btype]==1 and $num_s==1 and $q_sum<=2000)){
if(($num_s>1) or ($num_s==1 and $summax<=$ev1[maxbet] )){

#if($ev1[b_date_play]> $time_stam){ 
if($ev1[b_type]>0 and $ev1[b_hdc_1]>0 ){	
if (!in_array($ev1[b_id], $error_id)) {
	
	
$nam_arr=_nam($re_m[m_level]  , $ev1[b_big] , $ev1[b_type] , $ev1[b_hdc_1] ,$exn1 , $exn2 , $exn3 , $exn4 , $exn5 , $exn6 , $exn7 , $exn8 , $mxn );
$nam1=$nam_arr[r1];
$nam2=$nam_arr[r2];
$nam3=$nam_arr[r3];
$nam4=$nam_arr[r4];
$nam5=$nam_arr[r5];
$nam6=$nam_arr[r6];
$nam7=$nam_arr[r7];
$nam8=$nam_arr[r8];
$namm=$nam_arr[mm];
$ev1[b_hdc_1]=$nam_arr[mm];

if($ev1[baccept]==3){
$acceptx=$ev1[baccept];
$have_live = 1;
}else{
$acceptx=$re_m[m_accept];	
}

if($ev1[score]==""){
$scorex="0-0";
}else{
$scorex=$ev1[score];
}
	
if($num_s>1){
$btype=0;
	}else{
$btype=$ev1[btype];
}
	
	
	if (strpos($ev1[b_zone], 'ไทยแลนด์') !== false) {
			if (strpos($ev1[b_zone], 'T3') !== false or strpos($ev1[b_zone], 'T4') !== false) {
				$bmuy[] = 998;
			}else{
				$bmuy[] = 999;
			}
		}else{
			$bmuy[] = $ev1[btype];
		}
		
	if($ev1["b_type"]==5 || $ev1["b_type"]==6 || $ev1["b_type"]==7 || $ev1["b_type"]==8 || $ev1["b_type"]==9 || $ev1["b_type"]==15 || $ev1["b_type"]==16 || $ev1["b_type"]==17 || $ev1["b_type"]==18 || $ev1["b_type"]==19){
				$arr_1x2oe_no = 1;
				if($acceptx==3 || $ev1[timelive]>0){
					$arr_1x2oe_live_no = 1;
				}
			}
		/*	if($ev1["b_type"]==15 || $ev1["b_type"]==16 || $ev1["b_type"]==17 || $ev1["b_type"]==18 || $ev1["b_type"]==19){
				$arr_1x2oe_live_no = 1;
			}*/
	
$sql="INSERT IGNORE INTO  bom_tb_football_bill_play ( b_date, 	play_timestam ,	play_datenow, 	play_numstep, 	play_type ,	play_pay ,	play_bet 	, 	play_code,b_numstep , 	b_id , b_add, 	b_big ,	b_total 	, 	bill_id ,	m_id, r_id  ,	b_accept  ,b_com_arr
, r_agent_id, b_score_live, b_time_play, b_type
 ,	play_nam_1,	play_nam_2,	play_nam_3,	play_nam_4,	play_nam_5,	play_nam_6,	play_nam_7,	play_nam_8
 ,b_share, br_share_1 , br_share_2, br_share_3, br_share_4, br_share_5, br_share_6, br_share_7
  , m_accept , b_currency
 )
 values('"._bdate()."','$time_stam',now(),'$num_s','".$ev1[b_type]."','".$ev1[b_hdc_1]."' ,'".$ev1[b_hdc]."','$num','$num_s' ,'".$ev1[b_id]."'  ,'".$ev1[b_add]."' ,'".$ev1[b_big]."','$q_sum','$reeb[bill_id]','$re_m[m_id]','$re_m[r_id]','$acceptx','$dis_arr' 
 ,'$re_m[r_agent_id]','$scorex','".$ev1[timelive]."','".$ev1[btype]."'
  ,'$nam1','$nam2' ,'$nam3' ,'$nam4' ,'$nam5' ,'$nam6' ,'$nam7' ,'$nam8' 
  ,'$share8', '$share1', '$share2', '$share3', '$share4', '$share5', '$share6', '$share7'
   ,'$re_m[m_accept]'  ,'$re_m[m_currency]' )";	
sql_query($sql);	
$count_num[]=$reeb[bill_id];
$_SESSION[sum_pay]=$_SESSION[sum_pay]*$ev1[b_hdc_1];

$error_id[]=$ev1[b_id];

if($ev1[timelive]>$time_live){
$time_live=$ev1[timelive];
}

##################################
if($ev1[b_type]>10){
	$typec=$ev1[b_type]-10;
	}else{
	$typec=$ev1[b_type];
		}
		
	if($num_s>1){
		$cbet=$q_sum/$num_s;
		}else{
		$cbet=$q_sum;	
			}
$sql="update bom_tb_ball_list set b_bet_".$typec."=b_bet_".$typec." + $cbet  where b_id='$ev1[b_id]' and b_add='$ev1[b_add]' and b_hf='$ev1[b_hf]' ";
sql_query($sql);	
##################################


###############ราคาลด บอลไทย
if($ev1[btype]==2){
	
	$sql="select * from bom_tb_ball_list  where b_id='$ev1[b_id]' and b_add='$ev1[b_add]' and b_hf='$ev1[b_hf]' ";
	$rev2=sql_array($sql);
	
	
	$downpx1=1+($rev2[b_bet_2]/$rev2[b_bet_1]);
	$downpx2=1+($rev2[b_bet_1]/$rev2[b_bet_2]);
	$downpx3=1+($rev2[b_bet_4]/$rev2[b_bet_3]);
	$downpx4=1+($rev2[b_bet_3]/$rev2[b_bet_4]);
	
	if($downpx1<1.10){
		 $downpx1=1.09;
		 $downpx2=2.52;
	}
	if($downpx2<1.10){ 
		 $downpx2=1.09;
		 $downpx1=2.52;
	}
	if($downpx3<1.10){ 
		 $downpx3=1.09;
		 $downpx4=2.52;
	}
	if($downpx4<1.10){ 
		 $downpx4=1.09;
		 $downpx3=2.52;
	}
	
	$sql="update bom_tb_ball_list  set  b_hdc_1='$downpx1', b_hdc_2='$downpx2' ,  b_goal_1='$downpx3' ,  b_goal_2='$downpx4'  where b_id='$rev2[b_id]' and b_add='$rev2[b_add]' and b_hf='$rev2[b_hf]' ";
	sql_query($sql);	
	
		


}
###############ราคาลด บอลไทย	


	###############Update Write
	if($num_s==1 and ($summax+1000)>$ev1[maxbet] ){

$url=$server_js."write.php";
file_get_contents2($url);

	}	
	
}#if (!in_array($ev1[b_id], $error_id) ) {
}#if($ev1[b_type]>0){	
#}#if($ev1[b_date_play]> $time_stam){ 
}#if(($num_s>1) or ($num_s==1 and $summax<=$ev1[maxbet] )){
}#if(($num_s>1) or  ($ev1[btype]!=1) or ($ev1[btype]==1 and $num_s==1 and $q_sum<=2000)){


}#if($num>0){	
}#foreach($ex_num as $num){
	$msg_alert = "ผิดพลาด";
	$num_step=count($count_num);
	if(in_array(1, $bmuy) and $num_step==1){ //เต็งมวย
		if($q_sum>2000){
			$num_s = 0;
			$msg_alert = "ผิดพลาด";
		}
	}else if(in_array(999, $bmuy) and $num_step==1){ //เต็งบอลไทย 
		if($q_sum>5000){
			$num_s = 0;
			$msg_alert = "ผิดพลาด";
		}
	}else if(in_array(998, $bmuy) and $num_step==1){ //เต็งบอลไทย T3-T4
		if($q_sum>1000){
			$num_s = 0;
			$msg_alert = "ผิดพลาด";
		}
	}else if(!in_array(6, $bmuy) and !in_array(999, $bmuy) and !in_array(998, $bmuy) and $num_step>1){ //สเตปมวย
		if($q_sum>5000){
			$num_s = 0;
			$msg_alert = "ผิดพลาด";
		}
	}else if(in_array(1, $bmuy) and $num_step==2 and !in_array(998, $bmuy)){ //สเตป 2 มีมวย 
		if($q_sum>5000){
			$num_s = 0;
			$msg_alert = "ผิดพลาด";
		}
	}else if(in_array(999, $bmuy) and !in_array(998, $bmuy) and $num_step==2){ //สเตป 2 มีบอลไทย 
		if($q_sum>10000){
			$num_s = 0;
			$msg_alert = "ผิดพลาด";
		}
	}else if(in_array(998, $bmuy) and $num_step>1){ //สเตปมีบอลไทย T3-T4
		//if($q_sum>2000){
			$num_s = 0;
		$msg_alert = "บอลไทย T3 และ T4 เต็งได้เท่านั้น";
		//}
	}
	
	if($arr_1x2oe_no==1 and $num_step>1){
		$num_s = 0;
		$msg_alert = "ผิดพลาด";
	}
	
	if($arr_1x2oe_live_no==1){
		$num_s = 0;
		$msg_alert = "ผิดพลาด";
	}
	
	if(($_SESSION[sum_pay]*$q_sum)>$re_m[m_paymax]){
		$num_s = 0;
		$msg_alert = "ยอดจ่ายสูงสุด = ".number_format($re_m[m_paymax]);
	}
	
#######################################################################################
$count_step=count($count_num);

#echo"if($count_step==$num_s ){    ####   $reeb[bill_id]  ###";


if($count_step==$num_s ){
	


$sql="update bom_tb_football_bill set b_sum_pay='$_SESSION[sum_pay]'  where bill_id='$reeb[bill_id]'";
sql_query($sql);
$sql="update bom_tb_football_bill set b_type='$ev1[btype]'  where bill_id='$reeb[bill_id]' and 	b_numstep=1";
sql_query($sql);

$txtb="สำเร็จ";
###############Live
if($have_live==1){
$sql="update bom_tb_football_bill set b_accept='3', b_time_play='$time_live'   where bill_id='$reeb[bill_id]'";
sql_query($sql);
$txtb="รอยืนยัน";
}


 $sql="select *   from bom_tb_member where m_id='$_POST[mid]' ";
$re_m=sql_array($sql);


############################บัญชี
#$sql="select * from bom_tb_member where m_id='$_GET[id]' ";
#$rec=sql_array($sql);

$mtxt="พนัน";
$q_count=$q_sum;
$sum_count=$re_m[m_count];
#$typeby=1;#ฝาก
$typeby=2;#ถอน
$bill=$reeb[bill_id];
$sql="INSERT IGNORE INTO  bom_tb_databet (d_date	,bill_id	,m_id	,d_out	,d_sum, d_by,d_txt,r_id) values (now(),'$bill','$re_m[m_id]','$q_count','$sum_count','$typeby','$mtxt','$re_m[r_id]');";
sql_query($sql);
############################บัญชี

        $type_error[$x_pg][col]=$x_pg;
		$type_error[$x_pg][status]=1;
		$type_error[$x_pg][txt]="$q_num";
		$type_error[$x_pg][alert]="$txtb";
		$type_error[$x_pg][id]=$reeb[bill_id];
		$type_error[$x_pg][pq]=$pq;
		$type_error[$x_pg][credit]=($re_m[m_count]);
		
$js_b=array();
$js_b[]=array("b_total"=>"".$reeb["b_total"]."","b_com_arr"=>"".$reeb["b_com_arr"]."");
/*
$re=sql_page("bom_tb_member ","m_id","desc",1000);
while($rs=mysql_fetch_array($re[re])){
$js_b[$rs[m_id]]=array("m_name"=>"".$rs["m_name"]."","m_user"=>"".$rs["m_user"]."","m_count"=>"".$rs["m_count"]."");
}
*/
$url_file="../txt/json/bet/".$reeb[bill_id].".json";	
$txt=json_encode($js_b);
#write($url_file ,$txt,"w+"); 
		
		
}#if($re_m[m_shop]==0 and $count_step==$num_s and $re_m[m_count]>=$dis  and $num_s>2 ){
	elseif($count_step!=$num_s){
		
$sql="delete from bom_tb_football_bill where bill_id='$reeb[bill_id]'";
sql_query($sql);
$sql="delete from bom_tb_football_bill_play where bill_id='$reeb[bill_id]'";
sql_query($sql);	
$sql="update bom_tb_member set m_count=m_count+$q_sum  where m_id='$re_m[m_id]' ";
sql_query($sql);

        $type_error[$x_pg][col]=$x_pg;
		$type_error[$x_pg][status]=2;
		$type_error[$x_pg][txt]="$q_num";
		
		//if(in_array(998, $bmuy) and $num_step>1){
			$type_error[$x_pg][alert]=$msg_alert;
	/*}else{
		$type_error[$x_pg][alert]="ผิดพลาด";
		
	}*/
		
		
		
		$type_error[$x_pg][id]=$x_pg;
		$type_error[$x_pg][pq]=$pq;
		$type_error[$x_pg][credit]=($re_m[m_count]);
		}#if($re_m[m_shop]==0 and $count_step==$num_s and $re_m[m_count]>=$dis  and $num_s>2 ){
	



			
	$x_pg++;			
}#if($q_sum>0){

}#for($pq=1;$pq<=10;$pq++){


	echo json_encode($type_error);
?>