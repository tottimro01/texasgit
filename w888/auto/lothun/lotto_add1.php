<meta charset="utf-8">
<?php
require('../../inc/conn.php');
require('lotto_function.php');
######################################## หวยไทย
    $zone=1;
	$rob=1;
	$hi=_close($zone , $rob );	 
    $x_date=date("d",$time_stam);	
		  if($x_date>17){
		$close_time=mktime($hi[hh] ,$hi[mm],0 ,date("m")+1 ,1,date("Y"));
			  }else{
		$close_time=mktime($hi[hh] ,$hi[mm], 0 ,date("m") ,16 ,date("Y"));		  
				  }		
	$o_status = 1;
        $ok_date=date("d-m-Y",$close_time);	  

     $sql="INSERT IGNORE INTO bom_tb_lotto_ok (o_limit_time , lot_rob ,	ok_date, lot_zone) values('$close_time' ,'$rob','$ok_date' ,'$zone')";
	//sql_query($sql);
	
	
	
	
$sql="select * from bom_tb_lotto_ok  where lot_zone = $zone order by ok_id desc limit 1 ";
$re=sql_array($sql);
$js1=array();
$js1[]=array("ok_id"=>"$re[ok_id]","o_limit_time"=>"$re[o_limit_time]","lot_rob"=>"$re[lot_rob]","ok_date"=>"".date("d-m-Y",$re[o_limit_time])."","view_stop"=>"".date("Y-m-d H:i:s",$re[o_limit_time])."","o_status"=>"$o_status");
$txt1=json_encode($js1);
$url_file="../../json/lotto/ok.json";		
write($url_file ,$txt1,"w+"); 
$url_file="../../json/lotto/ok/ok_".$zone."_".$rob.".json";		
write($url_file ,$txt1,"w+"); 



#####################ล้างเลขเต็ม
     $sql="TRUNCATE bom_tb_1_sa;";
	sql_query($sql);
     $sql="TRUNCATE bom_tb_1_ag;";
	sql_query($sql);
     $sql="TRUNCATE bom_tb_1_mem;";
	sql_query($sql);
#####################ล้างเลขเต็ม

#####################ล้างเลขเต็ม
$js1=array();
$txt1=json_encode($js1);
$url_file="../../json/lotto/limit/limit_".$zone."_".$rob.".json";		
write($url_file ,$txt1,"w+"); 

######################ล้างไฟล์
$url_file="../../json/lotto/lock/".$zone."/".$rob."_*.json";		
$files = @glob($url_file); // get all file names
foreach($files as $file){ // iterate files
  if(@is_file($file)){
	   @unlink($file); // delete file 
  }}
  
  
$url_file="../../json/lotto/number/".$zone."/".$rob."_*.json";		
$files = @glob($url_file); // get all file names
foreach($files as $file){ // iterate files
  if(@is_file($file)){
	   @unlink($file); // delete file 
  }}  
  
  
###################สร้างวัน
$js2=array();
$sql_ok=sql_query("select * from bom_tb_lotto_ok where lot_zone = $zone order by ok_id desc limit 48");
while($rs_ok=sql_fetch($sql_ok)){
$js2[]="$rs_ok[ok_date]";
}
##########
$url_file2="../../json/lotto/date/date_".$zone.".json";		
$txt2=json_encode($js2);
write($url_file2 ,$txt2,"w+"); 



	 
	echo'<hr>'; 
	echo date("H:i d-m-Y D",$close_time);
?>
