<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<meta charset="utf-8">
<?php
require('inc/conn.php');
#require('inc/function.php');




$sql="select * from  bom_tb_lotto_ok  where ok_id='".$_GET['id']."' and o_active='0' and o_number!=''  ";
$re=sql_array($sql);

$exn=explode(',',$re['o_number']);

$id=$re['ok_id'];
$okid=$re['ok_id'];
$okdate=$re['ok_date'];

print_r($exn);

echo'<hr>'; 
echo date("H:i d-m-Y D");
echo'<hr>'; 
#$exn[0]="123456";

$num3_up=substr($exn[0], -3,3);
$num2_up=substr($num3_up, -2);
$num_koo_kee=substr($num3_up, -1,1);

$num_p2=substr($num3_up, -2,1);
$num_p3=substr($num3_up, -3,1);

$num2_down=$exn[1];
$num3_down=array($exn[2], $exn[3],$exn[4],$exn[5]);
$run_down=array(substr($num2_down, -2,1), substr($num2_down, -1,1));

$run_up=array(substr($num3_up, -3,1), substr($num3_up, -2,1),  substr($num3_up, -1,1));
$num_3in4=array(substr($exn[0], -4,1), substr($exn[0], -3,1), substr($exn[0], -2,1),  substr($exn[0], -1,1));
$num_3in5=array(substr($exn[0], -5,1),substr($exn[0], -4,1), substr($exn[0], -3,1), substr($exn[0], -2,1),  substr($exn[0], -1,1));

$num3_up_na=substr($exn[0], -6,3);
$num2_up_na=substr($num3_up_na, -2);
$run_up_na=array(substr($num3_up_na, -3,1), substr($num3_up_na, -2,1),  substr($num3_up_na, -1,1));



############################################################
$tod_3=array();
$tod_3[]=$run_up[0].$run_up[1].$run_up[2];
$tod_3[]=$run_up[0].$run_up[2].$run_up[1];
$tod_3[]=$run_up[1].$run_up[0].$run_up[2];
$tod_3[]=$run_up[1].$run_up[2].$run_up[0];
$tod_3[]=$run_up[2].$run_up[0].$run_up[1];
$tod_3[]=$run_up[2].$run_up[1].$run_up[0];
$tod_3 = array_unique( $tod_3 );		
############################################################
$tod_2in3=array();
$tod_2in3[]=$run_up[0].$run_up[1];
$tod_2in3[]=$run_up[0].$run_up[2];
$tod_2in3[]=$run_up[1].$run_up[0];
$tod_2in3[]=$run_up[1].$run_up[2];
$tod_2in3[]=$run_up[2].$run_up[0];
$tod_2in3[]=$run_up[2].$run_up[1];
$tod_2in3 = array_unique( $tod_2in3 );	
############################################################
$tod_3in4=array();
$tod_3in4[]=$num_3in4[0].$num_3in4[1].$num_3in4[2];
$tod_3in4[]=$num_3in4[0].$num_3in4[1].$num_3in4[3];
$tod_3in4[]=$num_3in4[0].$num_3in4[2].$num_3in4[1];
$tod_3in4[]=$num_3in4[0].$num_3in4[2].$num_3in4[3];
$tod_3in4[]=$num_3in4[0].$num_3in4[3].$num_3in4[1];
$tod_3in4[]=$num_3in4[0].$num_3in4[3].$num_3in4[2];

$tod_3in4[]=$num_3in4[1].$num_3in4[0].$num_3in4[2];
$tod_3in4[]=$num_3in4[1].$num_3in4[0].$num_3in4[3];
$tod_3in4[]=$num_3in4[1].$num_3in4[2].$num_3in4[0];
$tod_3in4[]=$num_3in4[1].$num_3in4[2].$num_3in4[3];
$tod_3in4[]=$num_3in4[1].$num_3in4[3].$num_3in4[0];
$tod_3in4[]=$num_3in4[1].$num_3in4[3].$num_3in4[2];

$tod_3in4[]=$num_3in4[2].$num_3in4[0].$num_3in4[1];
$tod_3in4[]=$num_3in4[2].$num_3in4[0].$num_3in4[3];
$tod_3in4[]=$num_3in4[2].$num_3in4[1].$num_3in4[0];
$tod_3in4[]=$num_3in4[2].$num_3in4[1].$num_3in4[3];
$tod_3in4[]=$num_3in4[2].$num_3in4[3].$num_3in4[0];
$tod_3in4[]=$num_3in4[2].$num_3in4[3].$num_3in4[1];

$tod_3in4[]=$num_3in4[3].$num_3in4[0].$num_3in4[1];
$tod_3in4[]=$num_3in4[3].$num_3in4[0].$num_3in4[2];
$tod_3in4[]=$num_3in4[3].$num_3in4[1].$num_3in4[0];
$tod_3in4[]=$num_3in4[3].$num_3in4[1].$num_3in4[2];
$tod_3in4[]=$num_3in4[3].$num_3in4[2].$num_3in4[0];
$tod_3in4[]=$num_3in4[3].$num_3in4[2].$num_3in4[1];
$tod_3in4 = array_unique( $tod_3in4 );	
############################################################

$tod_3in5=array();
$tod_3in5[]=$num_3in5[0].$num_3in5[1].$num_3in5[2];
$tod_3in5[]=$num_3in5[0].$num_3in5[1].$num_3in5[3];
$tod_3in5[]=$num_3in5[0].$num_3in5[1].$num_3in5[4];
$tod_3in5[]=$num_3in5[0].$num_3in5[2].$num_3in5[1];
$tod_3in5[]=$num_3in5[0].$num_3in5[2].$num_3in5[3];
$tod_3in5[]=$num_3in5[0].$num_3in5[2].$num_3in5[4];
$tod_3in5[]=$num_3in5[0].$num_3in5[3].$num_3in5[1];
$tod_3in5[]=$num_3in5[0].$num_3in5[3].$num_3in5[2];
$tod_3in5[]=$num_3in5[0].$num_3in5[3].$num_3in5[4];
$tod_3in5[]=$num_3in5[0].$num_3in5[4].$num_3in5[1];
$tod_3in5[]=$num_3in5[0].$num_3in5[4].$num_3in5[2];
$tod_3in5[]=$num_3in5[0].$num_3in5[4].$num_3in5[3];

$tod_3in5[]=$num_3in5[1].$num_3in5[0].$num_3in5[2];
$tod_3in5[]=$num_3in5[1].$num_3in5[0].$num_3in5[3];
$tod_3in5[]=$num_3in5[1].$num_3in5[0].$num_3in5[4];
$tod_3in5[]=$num_3in5[1].$num_3in5[2].$num_3in5[0];
$tod_3in5[]=$num_3in5[1].$num_3in5[2].$num_3in5[3];
$tod_3in5[]=$num_3in5[1].$num_3in5[2].$num_3in5[4];
$tod_3in5[]=$num_3in5[1].$num_3in5[3].$num_3in5[0];
$tod_3in5[]=$num_3in5[1].$num_3in5[3].$num_3in5[2];
$tod_3in5[]=$num_3in5[1].$num_3in5[3].$num_3in5[4];
$tod_3in5[]=$num_3in5[1].$num_3in5[4].$num_3in5[0];
$tod_3in5[]=$num_3in5[1].$num_3in5[4].$num_3in5[2];
$tod_3in5[]=$num_3in5[1].$num_3in5[4].$num_3in5[3];

$tod_3in5[]=$num_3in5[2].$num_3in5[0].$num_3in5[1];
$tod_3in5[]=$num_3in5[2].$num_3in5[0].$num_3in5[3];
$tod_3in5[]=$num_3in5[2].$num_3in5[0].$num_3in5[4];
$tod_3in5[]=$num_3in5[2].$num_3in5[1].$num_3in5[0];
$tod_3in5[]=$num_3in5[2].$num_3in5[1].$num_3in5[3];
$tod_3in5[]=$num_3in5[2].$num_3in5[1].$num_3in5[4];
$tod_3in5[]=$num_3in5[2].$num_3in5[3].$num_3in5[0];
$tod_3in5[]=$num_3in5[2].$num_3in5[3].$num_3in5[1];
$tod_3in5[]=$num_3in5[2].$num_3in5[3].$num_3in5[4];
$tod_3in5[]=$num_3in5[2].$num_3in5[4].$num_3in5[0];
$tod_3in5[]=$num_3in5[2].$num_3in5[4].$num_3in5[1];
$tod_3in5[]=$num_3in5[2].$num_3in5[4].$num_3in5[3];

$tod_3in5[]=$num_3in5[3].$num_3in5[0].$num_3in5[1];
$tod_3in5[]=$num_3in5[3].$num_3in5[0].$num_3in5[2];
$tod_3in5[]=$num_3in5[3].$num_3in5[0].$num_3in5[4];
$tod_3in5[]=$num_3in5[3].$num_3in5[1].$num_3in5[0];
$tod_3in5[]=$num_3in5[3].$num_3in5[1].$num_3in5[2];
$tod_3in5[]=$num_3in5[3].$num_3in5[1].$num_3in5[4];
$tod_3in5[]=$num_3in5[3].$num_3in5[2].$num_3in5[0];
$tod_3in5[]=$num_3in5[3].$num_3in5[2].$num_3in5[1];
$tod_3in5[]=$num_3in5[3].$num_3in5[2].$num_3in5[4];
$tod_3in5[]=$num_3in5[3].$num_3in5[4].$num_3in5[0];
$tod_3in5[]=$num_3in5[3].$num_3in5[4].$num_3in5[1];
$tod_3in5[]=$num_3in5[3].$num_3in5[4].$num_3in5[2];

$tod_3in5[]=$num_3in5[4].$num_3in5[0].$num_3in5[1];
$tod_3in5[]=$num_3in5[4].$num_3in5[0].$num_3in5[2];
$tod_3in5[]=$num_3in5[4].$num_3in5[0].$num_3in5[3];
$tod_3in5[]=$num_3in5[4].$num_3in5[1].$num_3in5[0];
$tod_3in5[]=$num_3in5[4].$num_3in5[1].$num_3in5[2];
$tod_3in5[]=$num_3in5[4].$num_3in5[1].$num_3in5[3];
$tod_3in5[]=$num_3in5[4].$num_3in5[2].$num_3in5[0];
$tod_3in5[]=$num_3in5[4].$num_3in5[2].$num_3in5[1];
$tod_3in5[]=$num_3in5[4].$num_3in5[2].$num_3in5[3];
$tod_3in5[]=$num_3in5[4].$num_3in5[3].$num_3in5[0];
$tod_3in5[]=$num_3in5[4].$num_3in5[3].$num_3in5[1];
$tod_3in5[]=$num_3in5[4].$num_3in5[3].$num_3in5[2];

$tod_3in5 = array_unique( $tod_3in5 );	

############################################################
$tod_3_na=array();
$tod_3_na[]=$run_up_na[0].$run_up_na[1].$run_up_na[2];
$tod_3_na[]=$run_up_na[0].$run_up_na[2].$run_up_na[1];
$tod_3_na[]=$run_up_na[1].$run_up_na[0].$run_up_na[2];
$tod_3_na[]=$run_up_na[1].$run_up_na[2].$run_up_na[0];
$tod_3_na[]=$run_up_na[2].$run_up_na[0].$run_up_na[1];
$tod_3_na[]=$run_up_na[2].$run_up_na[1].$run_up_na[0];
$tod_3_na = array_unique( $tod_3_na );		


$num_lao1=substr($num3_up, -1,1);
$num_lao2=substr($num3_up, -2,1);
$num_lao3=substr($num3_up, -3,1);
				if($num_lao1>4){
	                    	$num_txt1_lao="H";
				}else{
		                    $num_txt1_lao="L";			
					}
					
			if($num%2==1){
		               $num_txt2_lao="E";   	# คี่
			}else{
				       $num_txt2_lao="K";
				}


$tod_lao=array();
$tod_lao[]=$num_lao1.$num_txt1_lao.$num_txt2_lao;
$tod_lao[]=$num_lao2.$num_txt1_lao.$num_txt2_lao;
$tod_lao[]=$num_lao3.$num_txt1_lao.$num_txt2_lao;
$tod_lao = array_unique( $tod_lao );		


if($id!="" and $num3_up!=""){
/*
$lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3 ตัวหน้าบน", 17 =>"2 ตัวหน้าบน", 18 =>"วิ่งหน้าบน", 19 =>"3 โต๊ดหน้าบน"); 
*/

#"3บน"
process_lot( 1,$num3_up , $id);
#"2บน"
process_lot(4,$num2_up , $id);
#"วิ่งบน"
process_lot(6 ,$run_up , $id);
#"3โต๊ด"	
process_lot(3,$tod_3 , $id);
#"2ล่าง"
process_lot(5 ,$num2_down , $id);
#"วิ่งล่าง"
process_lot(7 ,$run_down , $id);
#"3ล่าง"
process_lot(2,$num3_down , $id);
#"คี่-คู่"
process_lot(12,$num_koo_kee , $id);
#1ตัวบน สูง-ต่ำ
process_lot(8,$num_koo_kee , $id);
#2ตัวบน สูง-ต่ำ
process_lot(9,$num2_up , $id);
#3ตัวบน สูง-ต่ำ
process_lot(10,$num3_up , $id);
#2ตัวล่าง สูง-ต่ำ
process_lot(11,$num2_down , $id);
#ปักหลักหน่วย
process_lot(20,$num_koo_kee , $id);
#ปักหลักสิบ
process_lot(21,$num_p2 , $id);
#ปักหลักร้อย
process_lot(22,$num_p3 , $id);
#2ใน3
process_lot(13,$tod_2in3 , $id);
#3ใน4
process_lot(14,$tod_3in4 , $id);
#3ใน5
process_lot(15,$tod_3in5 , $id);
#3 ตัวหน้าบน
process_lot(16,$num3_up_na , $id);
#2 ตัวหน้าบน
process_lot(17,$num2_up_na , $id);
#วิ่งหน้าบน
process_lot(18,$run_up_na , $id);
#3 โต๊ดหน้าบน
process_lot(19,$tod_3_na , $id);



echo'<hr>';

# ไม่ถูก
	$sql="update bom_tb_lotto_bill set  b_status='3'  where   ok_id='$id' and b_status='5'   ";
	sql_query($sql);

	$sql="update bom_tb_lotto_bill set b_bonus='0' , br_bonus_1='0', br_bonus_2='0' , br_bonus_3='0' , br_bonus_4='0'    where ok_id='$id'  ";
	sql_query($sql);
	$sql="update bom_tb_lotto_bill_play set b_bonus='0' , br_bonus_1='0', br_bonus_2='0' , br_bonus_3='0' , br_bonus_4='0'    where ok_id='$id' and b_accept=1  ";
	sql_query($sql);

#######################################################เลือกบิลเฉพาะที่ถูก
$sql="select * from bom_tb_lotto_bill_play where  ok_id='$id'  and   play_status='1'  and b_accept=1 ";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
	
	$tosum=$rs['b_total']*$rs['play_pay'];
	$tosum_r1=$rs['b_total']*$rs['play_br_pay_1'];
	$tosum_r2=$rs['b_total']*$rs['play_br_pay_2'];
	$tosum_r3=$rs['b_total']*$rs['play_br_pay_3'];
	$tosum_r4=$rs['b_total']*$rs['play_br_pay_4'];
	#######################################################อัพเดทยอดโบนัทที่ถูก

	$sql="update bom_tb_lotto_bill_play set b_bonus='$tosum'  , br_bonus_1='$tosum_r1', br_bonus_2='$tosum_r2' , br_bonus_3='$tosum_r3' , br_bonus_4='$tosum_r4'    where play_id='".$rs['play_id']."' and  ok_id='$id' ";
	sql_query($sql);
	#######################################################อัพเดทเงินสมาชิก
	$sql="update bom_tb_member set m_count=m_count+$tosum where m_id='".$rs['m_id']."' ";
	sql_query($sql);
	#######################################################อัพเดทบิลใหญ่

	$sql="update bom_tb_lotto_bill set b_bonus=b_bonus+$tosum , br_bonus_1=br_bonus_1+$tosum_r1   , br_bonus_2=br_bonus_2+$tosum_r2  , br_bonus_3=br_bonus_3+$tosum_r3  , br_bonus_4=br_bonus_4+$tosum_r4  
	  , b_status='1'    where bill_id='".$rs['bill_id']."' and  ok_id='$id'";
	sql_query($sql);
	
	echo'<hr>';
}



	#######################################################อัพเดทว่าออกผลแล้ว
    $sql="update bom_tb_lotto_ok set  o_active='1'  where  ok_id='$id'";
	sql_query($sql);

}#if($id!=""){




/*
$lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่าง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3 ตัวหน้าบน", 17 =>"2 ตัวหน้าบน", 18 =>"วิ่งหน้าบน", 19 =>"3 โต๊ดหน้าบน"); 
*/
function process_lot($type , $num , $id){
	if($type==1   or $type==4    or $type==5    or $type==16    or $type==17    or $type==20    or $type==21    or $type==22 ){
		#######################################################อัพเดทคนที่ซื้อตรงถูก
		$sql="update bom_tb_lotto_bill_play set play_status='1'  where ok_id='$id' and lot_type='$type' and play_number='$num' and  play_status='7' and b_accept=1";
		sql_query($sql);
		#######################################################อัพเดทคนที่ซื้อผิด
		$sql="update bom_tb_lotto_bill_play set play_status='4'  where ok_id='$id' and lot_type='$type' and play_number!='$num' and  play_status='7'  and b_accept=1";
		sql_query($sql);
		}
		
		
		
	elseif($type==2 or $type==3  or $type==6   or $type==7    or $type==13   or $type==14   or $type==15  or $type==18  or $type==19  ){
		#for($x=0;$x<count($num);$x++){
			foreach($num as $num_new){
			#######################################################อัพเดทแบบอาเรย์
		$sql="update bom_tb_lotto_bill_play set play_status='1'  where ok_id='$id' and lot_type='$type' and play_number='$num_new' and  play_status='7'  and b_accept=1";
		sql_query($sql);
			}
			#######################################################อัพเดทส่วนที่คงค้างทั้งหมดไม่ถูก
		$sql="update bom_tb_lotto_bill_play set play_status='4'   where ok_id='$id'  and lot_type='$type'  and  play_status='7'  and b_accept=1";
		sql_query($sql);
		
		}elseif($type==12){
		
			if($num%2==1){
				# คี่
		$num_txt="E";
		#######################################################อัพเดทคนที่ซื้อตรงถูก
		$sql="update bom_tb_lotto_bill_play set play_status='1'  where ok_id='$id' and lot_type='$type' and play_number='$num_txt' and  play_status='7'  and b_accept=1";
		sql_query($sql);
		#######################################################อัพเดทคนที่ซื้อผิด
		$sql="update bom_tb_lotto_bill_play set play_status='4'  where ok_id='$id' and lot_type='$type' and play_number!='$num_txt' and  play_status='7'  and b_accept=1";
		sql_query($sql);
		
				}else{		
				# คู่
		$num_txt="K";
		#######################################################อัพเดทคนที่ซื้อตรงถูก
		$sql="update bom_tb_lotto_bill_play set play_status='1'  where ok_id='$id' and lot_type='$type' and play_number='$num_txt' and  play_status='7'  and b_accept=1";
		sql_query($sql);
		#######################################################อัพเดทคนที่ซื้อผิด
		$sql="update bom_tb_lotto_bill_play set play_status='4'  where ok_id='$id' and lot_type='$type' and play_number!='$num_txt' and  play_status='7'  and b_accept=1";
		sql_query($sql);
			}
			
			}elseif($type==8){
				
				if($num>4){
					#สูง
		$num_txt="H";
		#######################################################อัพเดทคนที่ซื้อตรงถูก
		$sql="update bom_tb_lotto_bill_play set play_status='1'  where ok_id='$id' and lot_type='$type' and play_number='$num_txt' and  play_status='7'  and b_accept=1";
		sql_query($sql);
		#######################################################อัพเดทคนที่ซื้อผิด
		$sql="update bom_tb_lotto_bill_play set play_status='4'  where ok_id='$id' and lot_type='$type' and play_number!='$num_txt' and  play_status='7'  and b_accept=1";
		sql_query($sql);
		
					}else{
				    # ต่ำ
		$num_txt="L";
		#######################################################อัพเดทคนที่ซื้อตรงถูก
		$sql="update bom_tb_lotto_bill_play set play_status='1'  where ok_id='$id' and lot_type='$type' and play_number='$num_txt' and  play_status='7'  and b_accept=1";
		sql_query($sql);
		#######################################################อัพเดทคนที่ซื้อผิด
		$sql="update bom_tb_lotto_bill_play set play_status='4'  where ok_id='$id' and lot_type='$type' and play_number!='$num_txt' and  play_status='7'  and b_accept=1";
		sql_query($sql);
					}
					
				
	          }elseif($type==9){
				  
				if($num>49){
					#สูง
		$num_txt="H";
		#######################################################อัพเดทคนที่ซื้อตรงถูก
		$sql="update bom_tb_lotto_bill_play set play_status='1'  where ok_id='$id' and lot_type='$type' and play_number='$num_txt' and  play_status='7'  and b_accept=1";
		sql_query($sql);
		#######################################################อัพเดทคนที่ซื้อผิด
		$sql="update bom_tb_lotto_bill_play set play_status='4'  where ok_id='$id' and lot_type='$type' and play_number!='$num_txt' and  play_status='7'  and b_accept=1";
		sql_query($sql);
		
					}else{
				    # ต่ำ
		$num_txt="L";
		#######################################################อัพเดทคนที่ซื้อตรงถูก
		$sql="update bom_tb_lotto_bill_play set play_status='1'  where ok_id='$id' and lot_type='$type' and play_number='$num_txt' and  play_status='7'  and b_accept=1";
		sql_query($sql);
		#######################################################อัพเดทคนที่ซื้อผิด
		$sql="update bom_tb_lotto_bill_play set play_status='4'  where ok_id='$id' and lot_type='$type' and play_number!='$num_txt' and  play_status='7'  and b_accept=1";
		sql_query($sql);
					}
					
	         }elseif($type==10){
					
							if($num>499){
					#สูง
		$num_txt="H";
		#######################################################อัพเดทคนที่ซื้อตรงถูก
		$sql="update bom_tb_lotto_bill_play set play_status='1'  where ok_id='$id' and lot_type='$type' and play_number='$num_txt' and  play_status='7'  and b_accept=1";
		sql_query($sql);
		#######################################################อัพเดทคนที่ซื้อผิด
		$sql="update bom_tb_lotto_bill_play set play_status='4'  where ok_id='$id' and lot_type='$type' and play_number!='$num_txt' and  play_status='7'  and b_accept=1";
		sql_query($sql);
		
					}else{
				    # ต่ำ
		$num_txt="L";
		#######################################################อัพเดทคนที่ซื้อตรงถูก
		$sql="update bom_tb_lotto_bill_play set play_status='1'  where ok_id='$id' and lot_type='$type' and play_number='$num_txt' and  play_status='7'  and b_accept=1";
		sql_query($sql);
		#######################################################อัพเดทคนที่ซื้อผิด
		$sql="update bom_tb_lotto_bill_play set play_status='4'  where ok_id='$id' and lot_type='$type' and play_number!='$num_txt' and  play_status='7'  and b_accept=1";
		sql_query($sql);
					}
					     }elseif($type==11){
							 
				if($num>49){
					#สูง
		$num_txt="H";
		#######################################################อัพเดทคนที่ซื้อตรงถูก
		$sql="update bom_tb_lotto_bill_play set play_status='1'  where ok_id='$id' and lot_type='$type' and play_number='$num_txt' and  play_status='7'  and b_accept=1";
		sql_query($sql);
		#######################################################อัพเดทคนที่ซื้อผิด
		$sql="update bom_tb_lotto_bill_play set play_status='4'  where ok_id='$id' and lot_type='$type' and play_number!='$num_txt' and  play_status='7'  and b_accept=1";
		sql_query($sql);
		
					}else{
				    # ต่ำ
		$num_txt="L";
		#######################################################อัพเดทคนที่ซื้อตรงถูก
		$sql="update bom_tb_lotto_bill_play set play_status='1'  where ok_id='$id' and lot_type='$type' and play_number='$num_txt' and  play_status='7'  and b_accept=1";
		sql_query($sql);
		#######################################################อัพเดทคนที่ซื้อผิด
		$sql="update bom_tb_lotto_bill_play set play_status='4'  where ok_id='$id' and lot_type='$type' and play_number!='$num_txt' and  play_status='7'  and b_accept=1";
		sql_query($sql);
					}
					

					
		}
		
		
	}
	
	
	






/*


$sql="select * from bom_tb_member order by m_id asc";
$re=sql_query($sql);
while($rs3=sql_fetch($re)){
	
####################################
$js2=array();
$url_file2="../../../json/lotto/betting/sum/".$rs3[m_id]."/".$okdate.".json";	
$sql = sql_query("select * from bom_tb_lotto_bill_play where m_id = '".$rs3[m_id]."' and b_date = '$okdate'  and b_accept=1 order by lot_type asc, play_number asc, play_id desc");
while($rs2=sql_fetch($sql)){ 
$js2[]=array("play_timestam"=>"".$rs2["play_timestam"]."","lot_type"=>"".$rs2["lot_type"]."","play_number"=>"".$rs2["play_number"]."","b_total"=>"".$rs2["b_total"]."","play_pay"=>"".$rs2["b_pay"]."","b_bonus"=>"".($rs2["b_bonus"])."");
}
####################################		
$txt2=json_encode($js2);
write($url_file2 ,$txt2,"w+"); 
	

$url_file="../../../json/lotto/betting/last/$rs3[m_id]/*.json";		
$files = @glob($url_file); // get all file names
foreach($files as $file){ // iterate files
  if(@is_file($file)){
	   @unlink($file); // delete file 
  }}
  
    
}

*/


########################################################################

if($_SERVER['HTTP_REFERER']!=""){echo'<meta http-equiv="refresh" content="0;URL='.$x_process2.'Lotto_Process_new2.php?id='.$okid.'" />';}

?>

