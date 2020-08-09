<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php   

header("Content-type:text/html; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);       



require('../inc/conn.php');
require('../inc/function.php');
// require("../lang/member_lang.php");
require("../lang/variable_lang.php");
require("../lang/function_array.php");



$fo="../json/ip/".$_SESSION['m_id'].".php";
require($fo);
$token_ip = md5($_SERVER['SERVER_ADDR']);
if($token_ip!=$m_ip){ exit(); }

$b_web_from="$check_url";






$arr = array();
$arr["res"]=1;

if(($_SESSION['m_id'] == '') || (!isset($_SESSION['m_id']))){  exit();}
if( !strstr($_SERVER['HTTP_REFERER'],$check_url)){exit();}
$fo="../json/login/token_bet/".$_SESSION['m_id'].".php";
if(!file_exists($fo)){
	$_SESSION['error'][1][0]="<b class='cr'>ERROR BET!!!</b>";
$arr["txt"] = $_SESSION['error'][1][0]."<br>";
	echo json_encode($arr);
	 exit();
}
@require_once($fo);
if($_SESSION['bettoken']!=$bet_token){ exit();}

################OPEN BET maintenance 
$url_file="../json/maintenance.json";	
$mm_js=file_get_contents2($url_file);
$jsmm = json_decode($mm_js, true);
if($jsmm["open"]==0){
	$_SESSION['error'][1][0]="<b class='cr'>Maintenance</b>";
$arr["txt"] = $_SESSION['error'][1][0]."<br>";
echo json_encode($arr);
 exit();
 
	}
	
################OPEN BET LOTTO 
$sql="select * from bom_tb_config where con_id=1";
$rec=sql_array($sql);
##################### รับสูงสุด
$quota_lot=@explode(',',$rec['lot_over']);

if($rec['con_open_lotto']==0){
	$_SESSION['error'][1][0]="<b class='cr'>$lang_member[317]</b>";
$arr["txt"] = $_SESSION['error'][1][0]."<br>";
echo json_encode($arr);
 exit();
 
	}



######################ระงับ
  if(intval($_SESSION['m1']['m_active'])!=1){ 
$_SESSION['error'][1][]="<b class='cr'>E21-".$lang_member[555]."</b>";
$arr["txt"] = $_SESSION['error'][1][0]."<br>";
echo json_encode($arr);
 @session_start(); 
@session_destroy();
exit();
 }
 
 
$rpay=array(); 
$rdis=array(); 
$rmyshare=array(); 
$rag=array(); 
 
# print_r($_SESSION['arid']);
########################Agent
foreach($_SESSION['arid'] as $rid){
	
	
					######################ระงับ
					  if(intval($_SESSION['ardata'][$rid]['r_active'])!=1){ 
					$_SESSION['error'][1][]="<b class='cr'>E22-".$lang_member[555]."</b>";
					$arr["txt"] = $_SESSION['error'][1][0]."<br>";
					echo json_encode($arr);
 @session_start(); 
@session_destroy();
					 exit();
					 }
	
 if($_SESSION['m1']['m_lotto_setbet']==1){
$rpay[]=@explode(',',$_SESSION['ardata'][$rid]['r_lotto_pay1']); 
$rdis[]=@explode(',',$_SESSION['ardata'][$rid]['r_lotto_dis1']); 
	}elseif($_SESSION['m1']['m_lotto_setbet']==2){
$rpay[]=@explode(',',$_SESSION['ardata'][$rid]['r_lotto_pay2']); 
$rdis[]=@explode(',',$_SESSION['ardata'][$rid]['r_lotto_dis2']); 
	}else{
$rpay[]=@explode(',',$_SESSION['ardata'][$rid]['r_lotto_pay3']); 
$rdis[]=@explode(',',$_SESSION['ardata'][$rid]['r_lotto_dis3']); 
	}
	
$rag[]=$rid; 
$rmyshare[]=@explode(',',$_SESSION['ardata'][$rid]['r_lotto_myshare']); 

$mshare=@explode(',',$_SESSION['ardata'][$rid]['r_lotto_share']); 

$last_rid=$rid; 
}



$mnummax=@explode(',',$_SESSION['m1']['m_lotto_nummax']); 
$mmax=@explode(',',$_SESSION['m1']['m_lotto_max']); 
$mmin=@explode(',',$_SESSION['m1']['m_lotto_min']); 


 if($_SESSION['m1']['m_lotto_setbet']==1){
			$mpay=@explode(',',$_SESSION['m1']['m_lotto_pay1']); 
			$mdis=@explode(',',$_SESSION['m1']['m_lotto_dis1']); 
	}elseif($_SESSION['m1']['m_lotto_setbet']==2){
			$mpay=@explode(',',$_SESSION['m1']['m_lotto_pay2']); 
			$mdis=@explode(',',$_SESSION['m1']['m_lotto_dis2']); 
	}else{
			$mpay=@explode(',',$_SESSION['m1']['m_lotto_pay3']); 
			$mdis=@explode(',',$_SESSION['m1']['m_lotto_dis3']); 
	}
	
$setbet=$_SESSION['m1']['m_lotto_setbet'];

#####################################################


 


$zone=1;
$rob=1;
$sql="select * from bom_tb_lotto_ok where lot_zone=$zone and lot_rob=$rob order by ok_id desc limit 1";
$re_ok=sql_array($sql);




if($re_ok['o_limit_time']<$time_stam){ 
//echo"ปิดรับแทงแล้ว";
	$_SESSION['error'][1][0]="<b class='cr'>$lang_member[317]</b>";
$arr["txt"] = $_SESSION['error'][1][0]."<br>";
echo json_encode($arr);
 exit();
 }

$view_date=date("d-m-Y",$re_ok['o_limit_time']);
$view_date_bingo=date("Y-m-d H:i:s",$re_ok['o_limit_time']);



$bill_cus_name = mysql_escape_mimic(trim($_POST['bill_cus_name']));
$bill_no = trim($_POST['bill_no']);


$arr_socket = array();
$arr_in_socket = array();

$sql="select m_id,m_count,bonus_m_id,m_sport_print from bom_tb_member where m_id='".$_SESSION['m_id']."'";
$re_m=sql_array($sql);
if($re_m['m_id']==""){  exit();}
if($re_m['m_count']<=0){$re_m['m_count']=0;}
$re_m['m_count']=intval($re_m['m_count']);
$_SESSION['xcount']=$re_m['m_count'];
if($re_m['m_count']<=0){

$_SESSION['error'][1][0]="<b class='cr'>$lang_member[633] : $re_m[m_count]</b>";
$arr["txt"] = $_SESSION['error'][1][0]."<br>";
echo json_encode($arr);
exit();
}

$sql="INSERT IGNORE INTO bom_tb_lotto_bill_live (b_date,	b_timestam,	b_datenow ,	m_id	,b_ip	,ok_id	,lot_zone,	lot_rob, b_date_bingo, r_agent_id, b_web_from,b_name,b_no , bonus_m_id, r_id, com_af, b_setbet
) values(
'$view_date','$time_stam',now(),'".$_SESSION['m_id']."','"._bIP()."','$re_ok[ok_id]','$zone','$rob' , '$view_date_bingo','$_SESSION[r_agent_id]' ,'$b_web_from', '$bill_cus_name', '$bill_no','$re_m[bonus_m_id]' , '".$_SESSION['cr_id']."' ,'$af_lotto','$setbet'
); ";
sql_query($sql);


$sql="select bill_id  from bom_tb_lotto_bill_live   where m_id='".$_SESSION['m_id']."' and lot_zone='$zone' and  lot_rob='$rob'  order by bill_id desc limit 1";
$reeb=sql_array($sql);

$_SESSION['count_sum3t']=0;
$_SESSION['count_sum']=0;
$_SESSION['count_dis']=0;

$_SESSION['count_dis1']=0;
$_SESSION['count_dis2']=0;
$_SESSION['count_dis3']=0;
$_SESSION['count_dis4']=0;
$_SESSION['count_dis5']=0;
$_SESSION['count_dis6']=0;
$_SESSION['count_dis7']=0;
$_SESSION['count_dis8']=0;



$count_num=array();
$error_id=array();
$_SESSION['error']=array();


$ar = $_REQUEST['lotto'];     
$ttlot = $_POST['tlot']; 

 $emax=@explode(',',$_SESSION['m1']['m_lotto_max']); 
 $emin=@explode(',',$_SESSION['m1']['m_lotto_min']); 


/*
#########################ลบบิลเอง
 if($_SESSION['m_lotto_del']==1){
 $_SESSION['error'][1][]='<b class="cbu cu" id="vdata3" style="float:left;" onclick=load_can('.$reeb['bill_id'].'); ><img src="img/cancel.png" > '.$lang_member[65].' <b>BetID : </b>'.$reeb['bill_id'].'</b><br>';
}
*/


for($i=0;$i<count($ar);$i++){
	$ex = explode("," , $ar[$i]);
	$q_num=trim($ex[0]);	
	$q_sum1=intval(str_replace(",","",trim($ex[1])));
	$q_sum2=intval(str_replace(",","",trim($ex[2])));
	$q_sum3=intval(str_replace(",","",trim($ex[3])));
/*
$lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3 ตัวหน้าบน", 17 =>"2 ตัวหน้าบน", 18 =>"วิ่งหน้าบน", 19 =>"3 โต๊ดหน้าบน", 20 =>"ปักหลักหน่วย", 21 =>"ปักหลักสิบ", 22 =>"ปักหลักร้อย"); 
*/
######################################################3 ตัว บน-ล่าง
if(strlen($q_num)==3 and $ttlot==1){
		for($t1=1;$t1<=3;$t1++){
			
		#	 $_SESSION['error'][1][]="<span class='cr'>ล่าง=	if(".date("d-m-Y H:i:s",$re_ok['o_limit_time_lang']).">".date("d-m-Y H:i:s",$time_stam)."){ </span>";
			 
			 
			if($t1==1){
				$x_sum=$q_sum1;
				$type_lot=1;
			}else if($t1==2){
				$x_sum=$q_sum2;
				$type_lot=3;
				
$num_up=array(substr($q_num, -3,1), substr($q_num, -2,1),  substr($q_num, -1,1));
sort($num_up);
$q_num3=$num_up[0].$num_up[1].$num_up[2];

			}else if($t1==3){
					if($re_ok['o_limit_time_lang']>$time_stam){ 
				#$x_sum=$q_sum3/2;
				$x_sum=$q_sum3;
				$type_lot=2;
					}
			}else{
				#exit();	
				$type_lot=0;
			}
			
if($type_lot>0){
include("save_db.php");
}

############################3ล่างหน้า
if($type_lot==2){
				$x_sum=$q_sum3/2;
				$type_lot=17;
if($type_lot>0){			
#include("save_db.php");
}
}
############################3ล่างหน้า

}#	for($t1=1;$t1<=3;$t1++){
}#if(strlen($q_num)==3 and $ttlot==1){
if(strlen($q_num)==2 and $ttlot==1){
	$num_root = $q_num;
	for($t1=1;$t1<=3;$t1++){
			
		#	 $_SESSION['error'][1][]="<span class='cr'>ล่าง=	if(".date("d-m-Y H:i:s",$re_ok['o_limit_time_lang']).">".date("d-m-Y H:i:s",$time_stam)."){ </span>";
			 


	if($t1==1){
                $q_num = $num_root;
                if (strpos($q_num, '*') !== false) {
                    $ar_root = str_split($q_num);
                    if($ar_root[0]!="*" and $ar_root[1]=="*"){
                            for($ri=0;$ri<10;$ri++){
                                $q_num = $ar_root[0].$ri;
                                $x_sum=$q_sum1;
								$type_lot=4;								
if($type_lot>0){
include("save_db.php");
}
                            }
                    }else{
				#exit();	
				$type_lot=0;
                    }
                }else{
                    $x_sum=$q_sum1;
					$type_lot=4;                   
if($type_lot>0){
include("save_db.php");
}
                }
            }else if($t1==2){
                $q_num = $num_root;
                   /* if (strpos($q_num, '*') !== false) {
                        $ar_root = str_split($q_num);
                        if($ar_root[0]!="*" and $ar_root[1]=="*"){
                                for($ri=0;$ri<10;$ri++){
                                    $q_num = $ar_root[0].$ri;
                                    $x_sum=$q_sum2;
                                $type_lot=24;
                                include("save_db.php");
                                }
                        }else{
                            exit(); 
                        }
                    }else{*/
                        $x_sum=$q_sum2;
                        $type_lot=24;
						
						
$num_up=array( substr($q_num, -2,1),  substr($q_num, -1,1));
sort($num_up);
$q_num3=$num_up[0].$num_up[1];	
						
if($type_lot>0){
include("save_db.php");
}
                   // }
              } else if ($t1 == 3) {
                $q_num = $num_root;
                if($re_ok['o_limit_time_lang']>$time_stam){ 
                    if (strpos($q_num, '*') !== false) {
                        $ar_root = str_split($q_num);
                        if($ar_root[0]!="*" and $ar_root[1]=="*"){
                                for($ri=0;$ri<10;$ri++){
                                    $q_num = $ar_root[0].$ri;
                                    $x_sum=$q_sum3;
		$type_lot=5;							                                   
if($type_lot>0){
include("save_db.php");
}
                                }
                        }else{
				#exit();	
				$type_lot=0;
                        }
                    }else{
                        $x_sum=$q_sum3;
				       $type_lot=5;		                    
if($type_lot>0){
include("save_db.php");
}
                    }
                }
            }else{
				#exit();	
				$type_lot=0;
            }


			 
			/*if($t1==1){
				$x_sum=$q_sum1;
				$type_lot=4;
			}else if($t1==2){
				$x_sum=$q_sum2;
				$type_lot=24;
			}else if($t1==3){
					if($re_ok['o_limit_time_lang']>$time_stam){ 
				$x_sum=$q_sum3;
				$type_lot=5;
					}
			}else{
				exit();	
			}*/
			

//include("save_db.php");

}
}
if(strlen($q_num)==1 and $ttlot==1){
	for($t1=1;$t1<=2;$t1++){
			
		#	 $_SESSION['error'][1][]="<span class='cr'>ล่าง=	if(".date("d-m-Y H:i:s",$re_ok['o_limit_time_lang']).">".date("d-m-Y H:i:s",$time_stam)."){ </span>";
			 
			 
			if($t1==1){
				$x_sum=$q_sum1;
				$type_lot=6;
			}else if($t1==2){
					if($re_ok['o_limit_time_lang']>$time_stam){ 
				$x_sum=$q_sum3;
				$type_lot=7;
					}
			}else{
				#exit();	
				$type_lot=0;
			}
			

if($type_lot>0){
include("save_db.php");
}

}
}
/*
$lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3 ตัวหน้าบน", 17 =>"2 ตัวหน้าบน", 18 =>"วิ่งหน้าบน", 19 =>"3 โต๊ดหน้าบน", 20 =>"ปักหลักหน่วย", 21 =>"ปักหลักสิบ", 22 =>"ปักหลักร้อย"); 
*/
######################################################3หน้าบน-3หน้าโต๊ด
if(strlen($q_num)==3 and $ttlot==2){
		for($t1=1;$t1<=3;$t1++){
			
			if($t1==1){
				$x_sum=$q_sum1;
				$type_lot=16;
			}else if($t1==2){
				$x_sum=$q_sum2;
				$type_lot=20;
				
$num_up=array(substr($q_num, -3,1), substr($q_num, -2,1),  substr($q_num, -1,1));
sort($num_up);
$q_num3=$num_up[0].$num_up[1].$num_up[2];
				
			}else if($t1==3){
		    	if($re_ok['o_limit_time_lang']>$time_stam){ 
				$x_sum=$q_sum3;
				$type_lot=17;
					}

			}else{
				#exit();	
				$type_lot=0;
			}
			
if($type_lot>0){
include("save_db.php");
}
			
		}#	for($t1=1;$t1<=2;$t1++){
}#if(strlen($q_num)==3 and $ttlot==2){


/*
$lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3 ตัวหน้าบน", 17 =>"2 ตัวหน้าบน", 18 =>"วิ่งหน้าบน", 19 =>"3 โต๊ดหน้าบน", 20 =>"ปักหลักหน่วย", 21 =>"ปักหลักสิบ", 22 =>"ปักหลักร้อย"); 
*/
	######################################################2หน้า
	if(strlen($q_num)==2 and $ttlot==2){
				for($t1=1;$t1<=1;$t1++){

			if($t1==1){
				$x_sum=$q_sum1;
				$type_lot=18;
			}else{
				#exit();	
				$type_lot=0;
			}
			
			
if($type_lot>0){
include("save_db.php");
}

				}#		for($t1=1;$t1<=1;$t1++){
	}#	if(strlen($q_num)==2 and $ttlot==2){
		
		
/*
$lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3 ตัวหน้าบน", 17 =>"2 ตัวหน้าบน", 18 =>"วิ่งหน้าบน", 19 =>"3 โต๊ดหน้าบน", 20 =>"ปักหลักหน่วย", 21 =>"ปักหลักสิบ", 22 =>"ปักหลักร้อย"); 
*/
######################################################วิ่งหน้า
if(strlen($q_num)==1 and $ttlot==2){
			for($t1=1;$t1<=1;$t1++){

			if($t1==1){
				$x_sum=$q_sum1;
				$type_lot=19;
			}else{
				#exit();	
				$type_lot=0;
			}
			
			
			
if($type_lot>0){
include("save_db.php");
}

			}#		for($t1=1;$t1<=1;$t1++){
}#if(strlen($q_num)==1 and $ttlot==2){
	
/*
$lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่างหลัง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3ตัวหน้าบน", 17 =>"3ล่างหน้า", 18 =>"2ตัวหน้าบน", 19 =>"วิ่งหน้าบน", 20 =>"3 โต๊ดหน้าบน", 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย", 24 =>"2โต๊ดบน");
*/


	######################################################2 ตัว บน-ล่าง
	if(strlen($q_num)==2 and $ttlot==3){
				for($t1=1;$t1<=3;$t1++){
					
			if($t1==1){
				$x_sum=$q_sum1;
				$type_lot=4;
			}else if($t1==2){
					if($re_ok['o_limit_time_lang']>$time_stam){ 
				$x_sum=$q_sum2;
				$type_lot=5;
					}
			  } else if ($t1 == 3) {
				$x_sum    = $q_sum3;
                $type_lot = 24;
			}else{
				#exit();	
				$type_lot=0;
			}
			
if($type_lot>0){
include("save_db.php");
}

				}#		for($t1=1;$t1<=2;$t1++){
	}#	if(strlen($q_num)==2 and $ttlot==3){
		
		
		
		
######################################################2 ตัว แบบตัว
	if(strlen($q_num)==2 and $ttlot==8){
			for($t1=1;$t1<=2;$t1++){
					
			if($t1==1){
				$x_sum=$q_sum1;
				$type_lot=4;
			}else if($t1==2){
					if($re_ok['o_limit_time_lang']>$time_stam){ 
				$x_sum=$q_sum2;
				$type_lot=5;
					}
			}else{
				#exit();	
				$type_lot=0;
			}
			/*
if($x_sum>0){			
$x_sum=round(1000/$hpay[$type_lot],2)*$x_sum;
}
	*/		
if($type_lot>0){
include("save_db.php");
}

				}#		for($t1=1;$t1<=2;$t1++){
	}#	if(strlen($q_num)==2 and $ttlot==3){
		
		
		
	######################################################3 ตัว แบบตัว
	if(strlen($q_num)==3 and $ttlot==9){
			for($t1=1;$t1<=2;$t1++){
					
			if($t1==1){
				$x_sum=$q_sum1;
				$type_lot=1;
			}else if($t1==2){
				
				$x_sum=$q_sum2;
				$type_lot=3;

$num_up=array(substr($q_num, -3,1), substr($q_num, -2,1),  substr($q_num, -1,1));
sort($num_up);
$q_num3=$num_up[0].$num_up[1].$num_up[2];

			}else{
				#exit();	
				$type_lot=0;
			}
			
if($x_sum>0 and $type_lot==1){			
$x_sum=round(10000/$hpay[$type_lot],2)*$x_sum;
}
			
if($type_lot>0){
include("save_db.php");
}

				}#		for($t1=1;$t1<=2;$t1++){
	}#if(strlen($q_num)==3 and $ttlot==9){
		
		
		
/*
$lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3 ตัวหน้าบน", 17 =>"2 ตัวหน้าบน", 18 =>"วิ่งหน้าบน", 19 =>"3 โต๊ดหน้าบน", 20 =>"ปักหลักหน่วย", 21 =>"ปักหลักสิบ", 22 =>"ปักหลักร้อย"); 
*/	
	######################################################เลขวิ่ง
	if(strlen($q_num)==1 and $ttlot==4){
		
		if($q_sum3=="r"){
			for($t1=1;$t1<=2;$t1++){
				
			if($t1==1){
				$x_sum=$q_sum1;
				$type_lot=6;
			}else if($t1==2){
					if($re_ok['o_limit_time_lang']>$time_stam){ 
				$x_sum=$q_sum2;
				$type_lot=7;
					}
			}else{
				#exit();	
				$type_lot=0;
			}
		
if($type_lot>0){
include("save_db.php");
}


			}
		}else if($q_sum3=="19h"){
			$arr_li = array();
			for($li=0;$li<10;$li++){
				$arr_li[] = $li."".$q_num.",".$q_sum1.",".$q_sum2;
				$arr_li[] = $q_num."".$li.",".$q_sum1.",".$q_sum2;
			}
			$arr_li = array_unique($arr_li);
			foreach ($arr_li as &$value) {
				$ex_li = explode("," , $value);
				$q_num=trim($ex_li[0]);	
				$q_sum1=intval(str_replace(",","",trim($ex_li[1])));
				$q_sum2=intval(str_replace(",","",trim($ex_li[2])));
				if(strlen($q_num)==2){
					for($t1=1;$t1<=2;$t1++){
					if($t1==1){
						$x_sum=$q_sum1;
						$type_lot=4;
					}else if($t1==2){
							if($re_ok['o_limit_time_lang']>$time_stam){ 
						$x_sum=$q_sum2;
						$type_lot=5;
							}
					  } else{
				#exit();	
				$type_lot=0;
					}
					
if($type_lot>0){
include("save_db.php");
}

				}#		for($t1=1;$t1<=2;$t1++){
				}
			}
		}
			#for($t1=1;$t1<=2;$t1++){
	}#	if(strlen($q_num)==1 and $ttlot==4){
		
		
/*
$lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3 ตัวหน้าบน", 17 =>"2 ตัวหน้าบน", 18 =>"วิ่งหน้าบน", 19 =>"3 โต๊ดหน้าบน", 20 =>"ปักหลักหน่วย", 21 =>"ปักหลักสิบ", 22 =>"ปักหลักร้อย"); 
*/
	######################################################แบบพิเศษ
	if($ttlot==5){
		if($i==0){
			$type_lot=8;
			$x_sum=$q_sum1;
if($type_lot>0){
include("save_db.php");
}
		}else if($i==1){
			$type_lot=9;
			$x_sum=$q_sum1;
if($type_lot>0){
include("save_db.php");
}
		}else if($i==2){
			$type_lot=10;
			$x_sum=$q_sum1;
if($type_lot>0){
include("save_db.php");
}
		}else if($i==3){
			if($re_ok['o_limit_time_lang']>$time_stam){ 
				
				
				
				
				
			$type_lot=11;
			$x_sum=$q_sum1;
				}else{
			$q_sum1=0;	
			$x_sum=$q_sum1;
			   }
if($type_lot>0){
include("save_db.php");
}
		}else if($i==4){
			$type_lot=12;
			$x_sum=$q_sum1;
if($type_lot>0){
include("save_db.php");
}
		}else if($i==5){
			$type_lot=13;
			$x_sum=$q_sum1;
if($type_lot>0){
include("save_db.php");
}
		}else if($i==6){
			
			
			
			############ตรวจสอบเลขซ้ำของ 3ใน4
			$arr_num_check = str_split($q_num);
			$cnt_array = array_count_values($arr_num_check);
			$sduplicate = 0;
			$res = array();
			foreach($cnt_array as $keyc=>$valc){
				if($valc>1){
					$sduplicate = 1;
					break;
				}
			}
			if($sduplicate==0){
				$type_lot=14;
				$x_sum=$q_sum1;
			}else{
				$q_sum1=0;	
				$type_lot=0;
				$x_sum=$q_sum1;
			}
			
			
			
			if($type_lot>0){
			include("save_db.php");
			}
		}else if($i==7){
			############ตรวจสอบเลขซ้ำของ 3ใน5
			$arr_num_check = str_split($q_num);
			$cnt_array = array_count_values($arr_num_check);
			$sduplicate = 0;
			$res = array();
			foreach($cnt_array as $keyc=>$valc){
				if($valc>1){
					$sduplicate = 1;
					break;
				}
			}
			if($sduplicate==0){
				$type_lot=15;
				$x_sum=$q_sum1;
			}else{
				$q_sum1=0;	
				$type_lot=0;
				$x_sum=$q_sum1;
			}
if($type_lot>0){
include("save_db.php");
}
		}else{
			if(strlen($q_num)==2){
				for($t1=1;$t1<=2;$t1++){
					if($t1==1){
						$x_sum=$q_sum1;
						$type_lot=4;
					}else if($t1==2){
							if($re_ok['o_limit_time_lang']>$time_stam){ 
						$x_sum=$q_sum2;
						$type_lot=5;
							}
					  }
if($type_lot>0){
include("save_db.php");
}
				}
			}else if(strlen($q_num)==3){
				for($t1=1;$t1<=3;$t1++){
							if($t1==1){
								$x_sum=$q_sum1;
								$type_lot=1;
							}else if($t1==2){
								if($re_ok['o_limit_time_lang']>$time_stam){ 
								$x_sum=$q_sum2;
								$type_lot=2;
									}
							}else if($t1==3){
									$x_sum=$q_sum3;
								$type_lot=16;
							}
							
				
if($type_lot>0){
include("save_db.php");
}
				
				}
			}else if(strlen($q_num)==1){
				$q_sum4=trim($ex[4]);
				if($q_sum4=="r"){
					for($t1=1;$t1<=2;$t1++){
					if($t1==1){
						$x_sum=$q_sum1;
						$type_lot=6;
					}else if($t1==2){
							if($re_ok['o_limit_time_lang']>$time_stam){ 
						$x_sum=$q_sum2;
						$type_lot=7;
							}
					}else{
				#exit();	
				$type_lot=0;
					}
if($type_lot>0){
include("save_db.php");
}
				}
				}else if($q_sum4=="p"){
					for($t1=1;$t1<=3;$t1++){
						if($t1==1){
							$x_sum=$q_sum1;
							$type_lot=21;
						}else if($t1==2){
							$x_sum=$q_sum2;
							$type_lot=22;
						}else if($t1==3){
							$x_sum=$q_sum3;
							$type_lot=23;
						}else{
				#exit();	
				$type_lot=0;
						}
if($type_lot>0){
include("save_db.php");
}
					}
				}
			}
		}
		

		



}#if($ttlot==5){
				
		
	/*
$lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3 ตัวหน้าบน", 17 =>"2 ตัวหน้าบน", 18 =>"วิ่งหน้าบน", 19 =>"3 โต๊ดหน้าบน", 20 =>"ปักหลักหน่วย", 21 =>"ปักหลักสิบ", 22 =>"ปักหลักร้อย"); 
*/
###########################################ปักหลัก
	if(strlen($q_num)==1 and $ttlot==7){	
		for($t1=1;$t1<=3;$t1++){
			if($t1==1){
				$x_sum=$q_sum1;
				$type_lot=21;
			}else if($t1==2){
				$x_sum=$q_sum2;
				$type_lot=22;
			}else if($t1==3){
				$x_sum=$q_sum3;
				$type_lot=23;
			}else{
				#exit();	
				$type_lot=0;
			}
			
			
if($type_lot>0){
include("save_db.php");
}


		}#for($t1=1;$t1<=3;$t1++){
	}#	if(strlen($q_num)==1 and $ttlot==7){	
		

##########################################################################################################################
}#for($i=0;$i<count($ar);$i++){


$count_step=@count($count_num);

if($count_step==0){
	########################### ผิดพลาด
	$sql="delete from bom_tb_lotto_bill_live where bill_id='$reeb[bill_id]' and m_id='".$_SESSION['m_id']."' and lot_zone='$zone' and  lot_rob='$rob'";
	sql_query($sql);
	$arr["res"]=0;
	$_SESSION['error'][1][] = "<br><b style=\" float:right; color: #000;\">".$lang_member[503]." <span class=\"cr\"> 0</span> ".$_SESSION['m1']['m_currency']."</b>";
}else{
	########################### ถูกต้อง
	$sql="update IGNORE  bom_tb_lotto_bill_live set b_total='$_SESSION[count_sum]' , b_pay='$_SESSION[count_dis]'
, 	br_pay_1	='$_SESSION[count_dis1]', br_pay_2='$_SESSION[count_dis2]', 	br_pay_3	='$_SESSION[count_dis3]', br_pay_4='$_SESSION[count_dis4]'
, 	br_pay_5	='$_SESSION[count_dis5]', br_pay_6='$_SESSION[count_dis6]', 	br_pay_7	='$_SESSION[count_dis7]', br_pay_8='$_SESSION[count_dis8]'
	 where bill_id='$reeb[bill_id]'  and m_id='".$_SESSION['m_id']."' and lot_zone='$zone' and  lot_rob='$rob' ";
	sql_query($sql);



	$rs_ag = sql_array("select r_agent_id from bom_tb_agent where r_id = '$re_m[r_id]'");

	$log_sum = $re_m[m_count]-$_SESSION[count_dis];
	######################LOG ใหม่
	$sql="INSERT IGNORE INTO bom_tb_all_payment (
	bap_date, bap_ip,	bap_type	,m_id	,r_id,	m_agent_id,	r_agent_id,	
	bap_before, bap_out ,bap_after,bap_comment,
	bill_id,bap_play_type,bap_zone,bap_rob,
	bap_code,bap_by_type,bap_by_id) values(
	now(),'"._bIP()."', '3', '$re_m[m_id]','$re_m[r_id]','$re_m[m_agent_id]','$rs_ag[r_agent_id]',
	'$re_m[m_count]' ,'-$_SESSION[count_dis]','$log_sum','สมาชิกพนันหวย',
	'$reeb[bill_id]' , 2 , $zone , $rob ,
	'MPB',1,'$_SESSION[m_id]') ";
	sql_query($sql);	
	######################LOG ใหม่ 


	
	$sql="update IGNORE    bom_tb_member  set m_count=m_count-$_SESSION[count_dis]   where m_id='".$_SESSION['m_id']."'";
	sql_query($sql);


	$arr["res"]=1;

	$_SESSION['error'][1][] = "<br><b style=\" float:right; color: #000;\">".$lang_member[503]." <span class=\"cr\"> ".number_format($_SESSION['count_sum3t'])."</span> ".$_SESSION['m1']['m_currency']."</b>";
	
	if($re_m['m_sport_print']==1){
		//$_SESSION['error'][1][] .= "<br /><div><a href=\"javascript:void(0)\" style=\"color: #333;float: right;font-weight: bold;text-decoration: none;\" onclick=\"parent.leftx.billPrintPopup($zone);\"><img src=\"img/printer.png\" style=\"width: 15px;margin-right: 4px;vertical-align: middle;\">$lang_member[512]</a></div>";

		$_SESSION['error'][1][] .= "<br /><div><a href=\"javascript:void(0)\" style=\"color: #333;float: right;font-weight: bold;text-decoration: none;\" onclick=\"MM_openBrWindow('print_bill_lotto.php?id=".$reeb['bill_id']."' , '' , 'scrollbars=yes,resizable=yes,width=350,height=450');\"><img src=\"img/printer.png\" style=\"width: 15px;margin-right: 4px;vertical-align: middle;\">$lang_member[512]</a></div>";
	}
}

/*if($_SESSION['m_print_slip']==1){
 $_SESSION['error'][1][]='<br><b class="cbu cu" style="float:right;" onclick=MM_openBrWindow("print_bill_lotto.php?id='.$reeb['bill_id'].'","","scrollbars=yes,resizable=yes,width=350,height=450"); ><img src="img/icon2.png" > '.$lang_member[512].'</b>';
}*/

for($e=0;$e<count($_SESSION['error'][1]);$e++){
	$arr["txt"] .= $_SESSION['error'][1][$e]."<br>";
}



echo json_encode($arr);


#############################################################
#############################################################
#############################################################



?>
