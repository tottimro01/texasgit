<meta charset="utf-8">
<?php
require('../../inc/conn.php');
require('lotto_function.php');
########################################  จับยี่กี
###### ยิงมา ทุกวัน

    $zone=18;
    $rob=$_GET[rob];
	$date=date("d-m-Y");
	
	
	##############เปิดใหญ่
$url_opt="../../json/lotto_hun.json";	
$opt_js=file_get_contents2($url_opt);
$jsopt = json_decode($opt_js, true);
if($jsopt[open]==0){
	exit();
	}
##############เปิดเล็ก
 $url_opt="../../json/lotto_hun_new.json";	
$opt_js=file_get_contents2($url_opt);
$jsopt = json_decode($opt_js, true);
$exopen=@explode(",",$jsopt[open]);
if($exopen[$zone]==0){
exit();
	}	

	/*
	SELECT * FROM `bom_tb_lotto_ok` WHERE `ok_date`='14-05-2018' and `lot_zone`=18
	*/
	#and ok_date='$date'
/*$num3=mt_rand(100,999);
$num2=str_pad(mt_rand(0,99) , 2, "0", STR_PAD_LEFT);
$number=$num3.','.$num2;



$rs = sql_array("SELECT * FROM bom_tb_lotto_ok where lot_zone='$zone'   and o_limit_time<'$time_stam' and o_number='' order by ok_id asc limit 1");
echo "ออกผลงวดวันที่ : ".$rs["ok_date"]." รอบที่ : ".$rs["ok_date"];

echo $sql="update bom_tb_lotto_ok set  o_number='$number' where lot_zone='$zone'   and o_limit_time<'$time_stam' and o_number='' order by ok_id asc limit 1";	*/
//sql_query($sql);






$sql_q = sql_query("SELECT * FROM bom_tb_lotto_ok where lot_zone='$zone'   and o_limit_time<'$time_stam' and o_number='' order by ok_id asc");
while($rs=sql_fetch($sql_q)){
$num3=mt_rand(100,999);
$num2=str_pad(mt_rand(0,99) , 2, "0", STR_PAD_LEFT);
$number=$num3.','.$num2;

//$rs = sql_array("SELECT * FROM bom_tb_lotto_ok where lot_zone='$zone'   and o_limit_time<'$time_stam' and o_number='' order by ok_id asc limit 1");
echo "ออกผลงวดวันที่ : ".$rs["ok_date"]." รอบที่ : ".$rs["lot_rob"];
echo "<br>";
echo $sql="update bom_tb_lotto_ok set  o_number='$number' where ok_id = '$rs[ok_id]'";	
	echo "<br>";
	echo "<br>";
sql_query($sql);
}


	
?>
