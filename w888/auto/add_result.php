<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<meta charset="UTF-8">
<?

require('../inc/conn.php');
require('../inc/function.php');


if($_GET[d]!=""){$view_date=$_GET[d];}
else{$view_date=_bdate();}




for($x_zone=1;$x_zone<=10;$x_zone++){


if($x_zone>2){$table="bom_tb_data_football_sport";}
else{$table="bom_tb_data_football_single";}


$fo= "../json/sport/result/temp/".$view_date."_".$x_zone.".json";
$fo2= "../json/sport/result/desc/".$view_date."_".$x_zone.".json";

#$ct=filemtime($fo);
#$nt=$time_stam-$ct;

 
$sql="update $table set b_score_half='0-0' , b_score_full='0-0'  where    	b_process_half=''  and b_date='$view_date'   and (b_sport=$x_zone)   and b_date_play<'$time_stam' ";
sql_query($sql);



$txt='';
$x=0;
echo'<hr>';
echo $sql="select * from $table  where    	b_score_half!=''  and b_date='$view_date'   and (b_sport=$x_zone)    group by b_id  order by   b_sport desc, b_top asc,b_zone_id asc, b_date_play asc, 	b_id asc";	
$ree=sql_query($sql);
 while($rss=sql_fetch($ree)){
$txt[Result][$x]=array("b_id"=>"$rss[b_id]" , "b_date_play"=>"$rss[b_date_play]"  , "b_big"=>"$rss[b_big]", "b_zone"=>"$rss[b_zone]" , "b_name_1"=>"$rss[b_name_1]" , "b_name_2"=>"$rss[b_name_2]" , "b_score_half"=>"$rss[b_score_half]" , "b_score_full"=>"$rss[b_score_full]" , "b_process_half"=>"$rss[b_process_half]", "b_process_full"=>"$rss[b_process_full]");
$x++;}
#$txt[Completed][0]=array("Match"=>"20");
#$txt[Refund][0]=array("Match"=>"5");
echo $data=json_encode($txt);
write($fo ,$data,"w+"); 


#########################################
$txt2='';
$x=0;
echo'<hr>';
echo $sql="select * from $table  where    	b_score_half!=''  and b_date='$view_date'   and (b_sport=$x_zone)    group by b_id  order by    b_date_play desc";	
$ree=sql_query($sql);
 while($rss=sql_fetch($ree)){
$txt2[Result][$x]=array("b_id"=>"$rss[b_id]" , "b_date_play"=>"$rss[b_date_play]"  , "b_big"=>"$rss[b_big]", "b_zone"=>"$rss[b_zone]" , "b_name_1"=>"$rss[b_name_1]" , "b_name_2"=>"$rss[b_name_2]" , "b_score_half"=>"$rss[b_score_half]" , "b_score_full"=>"$rss[b_score_full]" , "b_process_half"=>"$rss[b_process_half]", "b_process_full"=>"$rss[b_process_full]");
$x++;}
#$txt[Completed][0]=array("Match"=>"20");
#$txt[Refund][0]=array("Match"=>"5");
echo $data2=json_encode($txt2);
write($fo2 ,$data2,"w+"); 


}





?>