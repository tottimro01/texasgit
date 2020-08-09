<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
require('../inc/conn.php');
require('../inc/function.php');

/*
$lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่างหลัง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3ตัวหัวบน", 17 =>"3ล่างหัว", 18 =>"2ตัวหัวบน", 19 =>"วิ่งหัวบน", 20 =>"3 โต๊ดหัวบน", 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย", 24 =>"2โต๊ดบน");
*/
$ok_id=35602;
$play_number="03";
#$play_number="30";
#$play_number="68";
#$play_number="86";
##################JSON Lotto Config
$sql="select * from bom_tb_lotto_bill_play_live where  ok_id='$ok_id' and  (lot_type='4' or lot_type='5') and play_number='$play_number' order by play_id asc ";
$re=sql_query($sql);
while($rs=sql_fetch($re)){

$p5=($rs[play_pay]/2);
$p4=($rs[play_br_pay_4]/2);
$p3=($rs[play_br_pay_3]/2);
$p2=($rs[play_br_pay_2]/2);
$p1=($rs[play_br_pay_1]/2);



$sql="update bom_tb_lotto_bill_play_live set
play_pay='$p5' , play_br_pay_4='$p4' , play_br_pay_3='$p3' , play_br_pay_2='$p2' ,  play_br_pay_1='$p1' 
 where play_id=$rs[play_id] ;";
 #sql_query($sql);
 echo $sql.'<br>';

##################JSON LottoMaxReceive
}



$play_number="130";
$play_number="103";
$play_number="013";
$play_number="031";
$play_number="310";
$play_number="301";

$play_number="186";
$play_number="168";
$play_number="681";
$play_number="618";
$play_number="816";
$play_number="861";
##################JSON Lotto Config
$sql="select * from bom_tb_lotto_bill_play_live where  ok_id='$ok_id' and  (lot_type='1' ) and play_number='$play_number' order by play_id asc ";
$re=sql_query($sql);
while($rs=sql_fetch($re)){

$p5=($rs[play_pay]/2);
$p4=($rs[play_br_pay_4]/2);
$p3=($rs[play_br_pay_3]/2);
$p2=($rs[play_br_pay_2]/2);
$p1=($rs[play_br_pay_1]/2);



$sql="update bom_tb_lotto_bill_play_live set
play_pay='$p5' , play_br_pay_4='$p4' , play_br_pay_3='$p3' , play_br_pay_2='$p2' ,  play_br_pay_1='$p1' 
 where play_id=$rs[play_id] ;";
 #sql_query($sql);
 #echo $sql.'<br>';

##################JSON LottoMaxReceive
}

?>