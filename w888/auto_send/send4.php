<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
require('../inc/conn.php');
require('../inc/function.php');
require('phpmail/PHPMailerAutoload.php');
require('gmail.php');



################OPEN BET maintenance 
$url_file="../json/maintenance.json";	
$mm_js=file_get_contents2($url_file);
$jsmm = json_decode($mm_js, true);
if($jsmm["open"]==0){
 exit();
	}
	
$url_file="../json/lotto_hun.json";	
$op_js=file_get_contents2($url_file);
$jsop = json_decode($op_js, true);
if($jsop["open"]==0){
 exit();
	}
	
	
	
$x_date=date("D",$time_stam);
if($x_date!="Sat" and $x_date!="Sun"){
	
$xdate=date("d-m-Y",$new_time);	 
if(!in_array($xdate , $d_stop)){


#$to_email = "kanhasee@gmail.com";
$to_email = $email_lothun;
$subject = "หวยหุ้น สายB LOTZX ".date("d-m-Y",$time_stam)."  รอบ 4 เวลา ".date("H:i",$time_stam)." ประเภท "._i_iset($_GET[i])."";

$body_html=" LOTZX สายB  ข้อมูลถูกส่งอัติโนมัติ "._cvf($time_stam, 6).".";

$view_date=date("d-m-Y");	
$zone=1;
$rob=4;
$sql="select play_id  from  bom_tb_lotto_hun_bill_play where  b_date='$view_date' and lot_rob='$rob'  and b_accept=1 and lot_zone = '$zone'   order by play_id desc ";	
$renum=sql_num($sql);
if($renum>0){
	
file_get_contents($hostserver.'create_pdf/go4.php?i='.$_GET[i].'');
sleep(1);


scriptdd_sendmail($to_email,$subject,$body_html);

}#if($renum>0){
}#if(!in_array($xdate , $d_stop)){
}#if($x_date!="Sat" and $x_date!="Sun"){
?>