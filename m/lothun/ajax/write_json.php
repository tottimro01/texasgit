<?


###TIME File
$del_over=$time_stam-(120);
$url_file="../../../json/lotto_hun/".$_POST[zone]."/limit.json";
$file_time=filemtime($url_file);
if($file_time<$del_over){
###TIME File


$jst1=array();
$sql = sql_query("select * from bom_tb_lotto_lock_1 where   h_sum<10  order by lot_type asc, h_num asc");
while($rs=sql_fetch($sql)){ 
$jst1[$rs[lot_type]][]="$rs[h_num]";
}
$txt44=json_encode($jst1);
$url_file="../../../json/lotto_hun/".$_POST[zone]."/limit.json";		
write($url_file ,$txt44,"w+"); 





}#if($file_time<$del_over){


##################Refresh
$url_file="../../../json/lotto_hun/refresh.json";		
$date_js=file_get_contents2($url_file);
$date_ff = json_decode2($date_js, true);

$re_fresh=$date_ff["rf"];

$jst1=array();
$jst1["rf"]=intval($re_fresh)+1;
$txt=json_encode($jst1);
write($url_file ,$txt,"w+"); 


?>