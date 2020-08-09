<?
###TIME File
$del_over=$time_stam-(120);
#$url_file="../json/lotto/limit.json";
$url_file="../json/lotto/limit/limit_".$_POST[zone]."_".$_POST[rob].".json";		
$file_time=filemtime($url_file);
if($file_time<$del_over){
###TIME File


$jst1=array();
$sql = sql_query("select * from bom_tb_lotto_hun_lock_1 where   h_sum<10   and lot_zone='$_POST[zone]' and lot_rob='$_POST[rob]'   order by lot_type asc, h_num asc");
while($rs=sql_fetch($sql)){ 
$jst1[$rs[lot_type]][]="$rs[h_num]";
}
$txt44=json_encode($jst1);
$url_file="../json/lotto/limit/limit_".$_POST[zone]."_".$_POST[rob].".json";		
write($url_file ,$txt44,"w+"); 





}#iif($file_time<$del_over){


?>