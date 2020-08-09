<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('../inc/conn.php');
require('../inc/function.php');





##################JSON Lotto Config
$sql="select * from bom_tb_member where  1 order by m_id asc ";
$re=sql_query($sql);
while($rsm_2=sql_fetch($re)){

#$js1=array();
$x1=@explode(",","$rsm_2[m_lotto_hun_pay_member]");
$x2=@explode(",","$rsm_2[m_lotto_hun_dis_member]");

$y1=@explode(",","$rsm_2[m_lotto_hun_myshare_agent]");
$y2=@explode(",","$rsm_2[m_lotto_hun_force_agent]");

$z1=@explode(",","$rsm_2[m_lotto_hun_nummax]");
$z2=@explode(",","$rsm_2[m_lotto_hun_max]");
$z3=@explode(",","$rsm_2[m_lotto_hun_min]");

if($x1[4]>0){
	echo "<hr>$rsm_2[m_id] : $rsm_2[m_user] <br>";
	print_r($x1);
	
	$m_lotto_hun_pay_member="pay,$x1[1],$x1[2],$x1[3],$x1[4],$x1[4],$x1[6],$x1[7],$x1[8],$x1[9],$x1[10],$x1[11],$x1[12],$x1[13],$x1[14],$x1[15],$x1[16],$x1[17],$x1[18],$x1[19],$x1[20],$x1[21],$x1[22],$x1[23],$x1[24],$x1[25],$x1[26],$x1[27],$x1[28],$x1[25],$x1[29],$x1[30],$x1[31],$x1[32],$x1[33],$x1[34],$x1[35]";
	$m_lotto_hun_dis_member="dis,$x2[1],$x2[2],$x2[3],$x2[4],$x2[4],$x2[6],$x2[7],$x2[8],$x2[9],$x2[10],$x2[11],$x2[12],$x2[13],$x2[14],$x2[15],$x2[16],$x2[17],$x2[18],$x2[19],$x2[20],$x2[21],$x2[22],$x2[23],$x2[24],$x2[1],$x2[1],0,$x2[28],$x2[25],$x2[29],$x2[30],$x2[31],$x2[32],$x2[33],$x2[34],$x2[35]";
	
	$m_lotto_hun_myshare_agent="myshare,$y1[1],$y1[2],$y1[3],$y1[4],$y1[4],$y1[6],$y1[7],$y1[8],$y1[9],$y1[10],$y1[11],$y1[12],$y1[13],$y1[14],$y1[15],$y1[16],$y1[17],$y1[18],$y1[19],$y1[20],$y1[21],$y1[22],$y1[23],$y1[24],$y1[1],$y1[1],$y1[1],$y1[28],$y1[25],$y1[29],$y1[30],$y1[31],$y1[32],$y1[33],$y1[34],$y1[35]";
	$m_lotto_hun_force_agent="share,$y2[1],$y2[2],$y2[3],$y2[4],$y2[4],$y2[6],$y2[7],$y2[8],$y2[9],$y2[10],$y2[11],$y2[12],$y2[13],$y2[14],$y2[15],$y2[16],$y2[17],$y2[18],$y2[19],$y2[20],$y2[21],$y2[22],$y2[23],$y2[24],$y2[1],$y2[1],$y2[1],$y2[28],$y2[25],$y2[29],$y2[30],$y2[31],$y2[32],$y2[33],$y2[34],$y2[35]";
	
	$m_lotto_hun_nummax="max,$z1[1],$z1[2],$z1[3],$z1[4],$z1[5],$z1[6],$z1[6],$z1[8],$z1[9],$z1[10],$z1[11],$z1[12],$z1[13],$z1[14],$z1[15],$z1[16],$z1[17],$z1[18],$z1[19],$z1[20],$z1[21],$z1[22],$z1[23],$z1[24],$z1[1],$z1[1],$z1[1],$z1[28],$z1[25],$z1[29],$z1[30],$z1[31],$z1[32],$z1[33],$z1[34],$z1[35]";
	$m_lotto_hun_max="max,$z2[1],$z2[2],$z2[3],$z2[4],$z2[5],$z2[6],$z2[6],$z2[8],$z2[9],$z2[10],$z2[11],$z2[12],$z2[13],$z2[14],$z2[15],$z2[16],$z2[17],$z2[18],$z2[19],$z2[20],$z2[21],$z2[22],$z2[23],$z2[24],$z2[1],$z2[1],$z2[1],$z2[28],$z2[25],$z2[29],$z2[30],$z2[31],$z2[32],$z2[33],$z2[34],$z2[35]";
	$m_lotto_hun_min="min,$z3[1],$z3[2],$z3[3],$z3[4],$z3[5],$z3[6],$z3[6],$z3[8],$z3[9],$z3[10],$z3[11],$z3[12],$z3[13],$z3[14],$z3[15],$z3[16],$z3[17],$z3[18],$z3[19],$z3[20],$z3[21],$z3[22],$z3[23],$z3[24],$z3[1],$z3[1],$z3[1],$z3[28],$z3[25],$z3[29],$z3[30],$z3[31],$z3[32],$z3[33],$z3[34],$z3[35]";
echo $sql="update bom_tb_member set 
m_lotto_hun_pay_member='$m_lotto_hun_pay_member' ,
m_lotto_hun_dis_member='$m_lotto_hun_dis_member' ,

m_lotto_hun_myshare_agent='$m_lotto_hun_myshare_agent' ,
m_lotto_hun_force_agent='$m_lotto_hun_force_agent' ,

m_lotto_hun_nummax='$m_lotto_hun_nummax' ,
m_lotto_hun_max='$m_lotto_hun_max' ,
m_lotto_hun_min='$m_lotto_hun_min' 

where m_id='$rsm_2[m_id]'";
#sql_query($sql);
	
	}


##################JSON LottoMaxReceive
}
?>