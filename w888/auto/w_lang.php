<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<meta charset="UTF-8">
<?php
require('../inc/conn.php');
require('../inc/function.php');


if($_GET[d]!=""){$view_date=$_GET[d];}
else{$view_date=_bdate();}


for($xz=1;$xz<=count($sport_type);$xz++){
	
if($xz>2){$table="bom_tb_data_football_sport";}
else{$table="bom_tb_data_football_single";}

echo'<hr>';
echo '<br>'.$sql="select * from $table  where    	b_x='1'  and b_add=1  and b_date='$view_date'   and b_date_play>'$time_stam' and (b_sport=$xz)   order by    b_top asc,b_zone_id asc, b_date_play asc, 	b_id asc, b_add asc";	
$ree=sql_query($sql);
   while($rss=sql_fetch($ree)){
	############################################################
   _uname($rss[b_zone] ,$rss[b_name_1],$rss[b_name_2],$rss[b_sport]);

   }
   
    
   $arr=array();
   
   $xx=0;
  ###########################################
 if($xz==1){
	$xzor=" or lang_sport='2' "; 
	 } else{
	$xzor="  "; 	 
		 }
  
$sql="select * from bom_tb_lang_zone where xupdate='$view_date' and (lang_sport='$xz' $xzor)";
   $re2=sql_query($sql);
   while($rs=sql_fetch($re2)){
	   
		$arr['th']['Zone'][md5($rs[en])]=$rs[th];
		$arr['ko']['Zone'][md5($rs[en])]=$rs[ko];
		$arr['ch']['Zone'][md5($rs[en])]=$rs[ch];
		$arr['vn']['Zone'][md5($rs[en])]=$rs[vn];
		$arr['cs']['Zone'][md5($rs[en])]=$rs[cs];
		$arr['id']['Zone'][md5($rs[en])]=$rs[id];
		$arr['my']['Zone'][md5($rs[en])]=$rs[my];
		$arr['km']['Zone'][md5($rs[en])]=$rs[km];
		$arr['la']['Zone'][md5($rs[en])]=$rs[la];

		
$xx++;   }

#print_r($arr['th']);




   $xx=0;
  ###########################################
$sql="select * from bom_tb_lang_team where xupdate='$view_date' and (lang_sport='$xz' $xzor )";
   $re3=sql_query($sql);
   while($rs=sql_fetch($re3)){
	   
if($rs[lang_sport]==2){
		$arr['th']['Team'][md5($rs[en].' (Fully)')]=$rs[th].' (ครบยก)';
		$arr['th']['Team'][md5($rs[en].' (KnockOut)')]=$rs[th].' (ไม่ครบยก)';
		$arr['th']['Team'][md5($rs[en].' (Fully)')]=$rs[th].' (ครบยก)';
		$arr['th']['Team'][md5($rs[en].' (KnockOut)')]=$rs[th].' (ไม่ครบยก)';
	}
	   
		$arr['th']['Team'][md5($rs[en])]=$rs[th];
		$arr['ko']['Team'][md5($rs[en])]=$rs[ko];
		$arr['ch']['Team'][md5($rs[en])]=$rs[ch];
		$arr['vn']['Team'][md5($rs[en])]=$rs[vn];
		$arr['cs']['Team'][md5($rs[en])]=$rs[cs];
		$arr['id']['Team'][md5($rs[en])]=$rs[id];
		$arr['my']['Team'][md5($rs[en])]=$rs[my];
		$arr['km']['Team'][md5($rs[en])]=$rs[km];
		$arr['la']['Team'][md5($rs[en])]=$rs[la];
$xx++;   }

echo'<br>';




echo $data2=json_encode($arr['th']);
$fo= "../json/sport/lang/$xz/".$view_date."_th.json";
write($fo ,$data2,"w+"); 

$data3=json_encode($arr['jp']);
$fo= "../json/sport/lang/$xz/".$view_date."_jp.json";
write($fo ,$data3,"w+"); 

$data4=json_encode($arr['ko']);
$fo= "../json/sport/lang/$xz/".$view_date."_ko.json";
write($fo ,$data4,"w+"); 

$data5=json_encode($arr['ch']);
$fo= "../json/sport/lang/$xz/".$view_date."_ch.json";
write($fo ,$data5,"w+"); 

$data6=json_encode($arr['vn']);
$fo= "../json/sport/lang/$xz/".$view_date."_vn.json";
write($fo ,$data6,"w+"); 

$data7=json_encode($arr['cs']);
$fo= "../json/sport/lang/$xz/".$view_date."_cs.json";
write($fo ,$data7,"w+"); 

$data8=json_encode($arr['id']);
$fo= "../json/sport/lang/$xz/".$view_date."_id.json";
write($fo ,$data8,"w+"); 

$data9=json_encode($arr['my']);
$fo= "../json/sport/lang/$xz/".$view_date."_my.json";
#write($fo ,$data9,"w+"); 

$data10=json_encode($arr['km']);
$fo= "../json/sport/lang/$xz/".$view_date."_km.json";
#write($fo ,$data10,"w+"); 


$data11=json_encode($arr['la']);
$fo= "../json/sport/lang/$xz/".$view_date."_la.json";
write($fo ,$data11,"w+"); 

}



?>
