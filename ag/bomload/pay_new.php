<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
require('../inc/conn.php');
require('../inc/function.php');

/*
$lot_type["th"]= array(1 =>"3บน", 2 =>"3ล่างหลัง", 3 =>"3โต๊ด", 4 =>"2บน", 5 =>"2ล่าง", 6 =>"วิ่งบน", 7 =>"วิ่งล่าง"
, 8 =>"1ตัวบน สูง-ต่ำ" , 9 =>"2ตัวบน สูง-ต่ำ", 10 =>"3ตัวบน สูง-ต่ำ", 11 =>"2ตัวล่าง สูง-ต่ำ", 12 =>"คี่-คู่", 13 =>"2ใน3", 14 =>"3ใน4", 15 =>"3ใน5", 16 =>"3ตัวหัวบน", 17 =>"3ล่างหัว", 18 =>"2ตัวหัวบน", 19 =>"วิ่งหัวบน", 20 =>"3 โต๊ดหัวบน", 21 =>"ปักหลักหน่วย", 22 =>"ปักหลักสิบ", 23 =>"ปักหลักร้อย", 24 =>"2โต๊ดบน");
*/
##################JSON Lotto Config
$sql="select * from bom_tb_agent where  1 order by r_id asc ";
$re=sql_query($sql);
while($rs=sql_fetch($re)){

$a1=@explode(",","$rs[r_lotto_pay_super]");
$b1=@explode(",","$rs[r_lotto_pay_senior]");
$c1=@explode(",","$rs[r_lotto_pay_master]");
$d1=@explode(",","$rs[r_lotto_pay_agent]");

$e1=@explode(",","$rs[r_lotto_dis_super]");
$f1=@explode(",","$rs[r_lotto_dis_senior]");
$g1=@explode(",","$rs[r_lotto_dis_master]");
$h1=@explode(",","$rs[r_lotto_dis_agent]");
//echo $a1[2]."ddddd";
	//echo "<br>";
	if($d1[2]>125){
$a2="pay,$a1[1],".round($a1[2]/2).",$a1[3],$a1[4],$a1[5],$a1[6],$a1[7],$a1[8],$a1[9],$a1[10],$a1[11],$a1[12],$a1[13],$a1[14],$a1[15],$a1[16],0,$a1[18],$a1[19],$a1[20],$a1[21],$a1[22],$a1[23],$a1[24]";
$b2="pay,$b1[1],".round($b1[2]/2).",$b1[3],$b1[4],$b1[5],$b1[6],$b1[7],$b1[8],$b1[9],$b1[10],$b1[11],$b1[12],$b1[13],$b1[14],$b1[15],$b1[16],0,$b1[18],$b1[19],$b1[20],$b1[21],$b1[22],$b1[23],$b1[24]";
$c2="pay,$c1[1],".round($c1[2]/2).",$c1[3],$c1[4],$c1[5],$c1[6],$c1[7],$c1[8],$c1[9],$c1[10],$c1[11],$c1[12],$c1[13],$c1[14],$c1[15],$c1[16],0,$c1[18],$c1[19],$c1[20],$c1[21],$c1[22],$c1[23],$c1[24]";
$d2="pay,$d1[1],".round($d1[2]/2).",$d1[3],$d1[4],$d1[5],$d1[6],$d1[7],$d1[8],$d1[9],$d1[10],$d1[11],$d1[12],$d1[13],$d1[14],$d1[15],$d1[16],0,$d1[18],$d1[19],$d1[20],$d1[21],$d1[22],$d1[23],$d1[24]";

$e2="dis,$e1[1],$e1[2],$e1[3],$e1[4],$e1[5],$e1[6],$e1[7],$e1[8],$e1[9],$e1[10],$e1[11],$e1[12],$e1[13],$e1[14],$e1[15],$e1[16],0,$e1[18],$e1[19],$e1[20],$e1[21],$e1[22],$e1[23],$e1[24]";
$f2="dis,$f1[1],$f1[2],$f1[3],$f1[4],$f1[5],$f1[6],$f1[7],$f1[8],$f1[9],$f1[10],$f1[11],$f1[12],$f1[13],$f1[14],$f1[15],$f1[16],0,$f1[18],$f1[19],$f1[20],$f1[21],$f1[22],$f1[23],$f1[24]";
$g2="dis,$g1[1],$g1[2],$g1[3],$g1[4],$g1[5],$g1[6],$g1[7],$g1[8],$g1[9],$g1[10],$g1[11],$g1[12],$g1[13],$g1[14],$g1[15],$g1[16],0,$g1[18],$g1[19],$g1[20],$g1[21],$g1[22],$g1[23],$g1[24]";
$h2="dis,$h1[1],$h1[2],$h1[3],$h1[4],$h1[5],$h1[6],$h1[7],$h1[8],$h1[9],$h1[10],$h1[11],$h1[12],$h1[13],$h1[14],$h1[15],$h1[16],0,$h1[18],$h1[19],$h1[20],$h1[21],$h1[22],$h1[23],$h1[24]";

$sql="update bom_tb_agent set
r_lotto_pay_super='$a2' , r_lotto_pay_senior='$b2' , r_lotto_pay_master='$c2' , r_lotto_pay_agent='$d2' , 
r_lotto_dis_super='$e2' , r_lotto_dis_senior='$f2' , r_lotto_dis_master='$g2' , r_lotto_dis_agent='$h2' 
 where r_id=$rs[r_id] ;";
 #sql_query($sql);
 echo $sql.'<br>';
	}
##################JSON LottoMaxReceive
}









$sql="select * from bom_tb_member where  1 order by m_id asc ";
$re=sql_query($sql);
while($rs=sql_fetch($re)){

$a1=@explode(",","$rs[m_lotto_pay_super]");
$b1=@explode(",","$rs[m_lotto_pay_senior]");
$c1=@explode(",","$rs[m_lotto_pay_master]");
$d1=@explode(",","$rs[m_lotto_pay_agent]");
$x1=@explode(",","$rs[m_lotto_pay_member]");

$e1=@explode(",","$rs[m_lotto_dis_super]");
$f1=@explode(",","$rs[m_lotto_dis_senior]");
$g1=@explode(",","$rs[m_lotto_dis_master]");
$h1=@explode(",","$rs[m_lotto_dis_agent]");
$z1=@explode(",","$rs[m_lotto_dis_member]");
#print_r($a1);
	//echo $a1[2]."ddddd";
if($a1[2]>125 || $b1[2]>125 || $c1[2]>125 || $d1[2]>125 || $x1[2]>125){
	echo $a1[2]."####".$b1[2]."####".$c1[2]."####".$d1[2]."####".$x1[2]."####".$rs[m_id]."<br>";
$a2="pay,$a1[1],".round($a1[2]/2).",$a1[3],$a1[4],$a1[5],$a1[6],$a1[7],$a1[8],$a1[9],$a1[10],$a1[11],$a1[12],$a1[13],$a1[14],$a1[15],$a1[16],0,$a1[18],$a1[19],$a1[20],$a1[21],$a1[22],$a1[23],$a1[24]";
$b2="pay,$b1[1],".round($b1[2]/2).",$b1[3],$b1[4],$b1[5],$b1[6],$b1[7],$b1[8],$b1[9],$b1[10],$b1[11],$b1[12],$b1[13],$b1[14],$b1[15],$b1[16],0,$b1[18],$b1[19],$b1[20],$b1[21],$b1[22],$b1[23],$b1[24]";
$c2="pay,$c1[1],".round($c1[2]/2).",$c1[3],$c1[4],$c1[5],$c1[6],$c1[7],$c1[8],$c1[9],$c1[10],$c1[11],$c1[12],$c1[13],$c1[14],$c1[15],$c1[16],0,$c1[18],$c1[19],$c1[20],$c1[21],$c1[22],$c1[23],$c1[24]";
$d2="pay,$d1[1],".round($d1[2]/2).",$d1[3],$d1[4],$d1[5],$d1[6],$d1[7],$d1[8],$d1[9],$d1[10],$d1[11],$d1[12],$d1[13],$d1[14],$d1[15],$d1[16],0,$d1[18],$d1[19],$d1[20],$d1[21],$d1[22],$d1[23],$d1[24]";
$x2="pay,$x1[1],".round($x1[2]/2).",$x1[3],$x1[4],$x1[5],$x1[6],$x1[7],$x1[8],$x1[9],$x1[10],$x1[11],$x1[12],$x1[13],$x1[14],$x1[15],$x1[16],0,$x1[18],$x1[19],$x1[20],$x1[21],$x1[22],$x1[23],$x1[24]";

$e2="dis,$e1[1],$e1[2],$e1[3],$e1[4],$e1[5],$e1[6],$e1[7],$e1[8],$e1[9],$e1[10],$e1[11],$e1[12],$e1[13],$e1[14],$e1[15],$e1[16],0,$e1[18],$e1[19],$e1[20],$e1[21],$e1[22],$e1[23],$e1[24]";
$f2="dis,$f1[1],$f1[2],$f1[3],$f1[4],$f1[5],$f1[6],$f1[7],$f1[8],$f1[9],$f1[10],$f1[11],$f1[12],$f1[13],$f1[14],$f1[15],$f1[16],0,$f1[18],$f1[19],$f1[20],$f1[21],$f1[22],$f1[23],$f1[24]";
$g2="dis,$g1[1],$g1[2],$g1[3],$g1[4],$g1[5],$g1[6],$g1[7],$g1[8],$g1[9],$g1[10],$g1[11],$g1[12],$g1[13],$g1[14],$g1[15],$g1[16],0,$g1[18],$g1[19],$g1[20],$g1[21],$g1[22],$g1[23],$g1[24]";
$h2="dis,$h1[1],$h1[2],$h1[3],$h1[4],$h1[5],$h1[6],$h1[7],$h1[8],$h1[9],$h1[10],$h1[11],$h1[12],$h1[13],$h1[14],$h1[15],$h1[16],0,$h1[18],$h1[19],$h1[20],$h1[21],$h1[22],$h1[23],$h1[24]";
$z2="dis,$z1[1],$z1[2],$z1[3],$z1[4],$z1[5],$z1[6],$z1[7],$z1[8],$z1[9],$z1[10],$z1[11],$z1[12],$z1[13],$z1[14],$z1[15],$z1[16],0,$z1[18],$z1[19],$z1[20],$z1[21],$z1[22],$z1[23],$z1[24]";

$sql="update bom_tb_member set
m_lotto_pay_super='$a2' , m_lotto_pay_senior='$b2' , m_lotto_pay_master='$c2' , m_lotto_pay_agent='$d2' , m_lotto_pay_member='$x2' , 
m_lotto_dis_super='$e2' , m_lotto_dis_senior='$f2' , m_lotto_dis_master='$g2' , m_lotto_dis_agent='$h2'  , m_lotto_dis_member='$z2' 
 where m_id=$rs[m_id] ;";
 #sql_query($sql);
echo $sql.'<br>';
##################JSON LottoMaxReceive
}
}


?>