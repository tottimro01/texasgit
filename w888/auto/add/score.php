<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?


require('../../inc/conn.php');
require('../../inc/function.php');

function _bdate_score(){
global $timezone;	
global $time_stam;
if((date("Hi", $time_stam)>=0) and (date("Hi", $time_stam)<=1500)){
	$view_date=date("d-m-Y",mktime(date("H")+$timezone,date("i"),date("s"),date("m"),date("d")-1,date("Y")));
	}else{$view_date=date("d-m-Y",$time_stam);}		

return $view_date;
	}
	
$view_date=_bdate_score();

	    $url = "http://www.lion1234.com/vegus168_bom/results_data.php?d=".$view_date;
        file_get_contents2($url);		

	    $url = "http://www.lion1234.com/vegus168_bom/xscore.php?d=".$view_date;
        file_get_contents2($url);		


$x_bet=array();
$sql="select * from bom_tb_data_sport_today where   b_date='".$view_date."' and b_score_ft=''   group by b_id  order by b_date_play asc";
echo $sql.'<br>';
$re=sql_query($sql);
while($rs=sql_fetch($re)){
$x_bet[]="$rs[b_name_1]";	
}




if(count($x_bet)>0){


$url = "http://www.lion1234.com/vegus168_bom/txt/data_score.php";
$data=file_get_contents2($url);		
$ex1=explode('<hr>',$data);

foreach($ex1 as $nt1){	
$nt=explode('#',$nt1);
$check='';	
					$leage=trim($nt[5]);
					$name1 =trim($nt[7]);
					$name2 = trim($nt[9]);

					$score_FT = trim($nt[3]);
	            	$score_HT = trim($nt[1]);
					
		if($leage!=""){	
		foreach($x_bet as $xcc){
			if(strstr($name1 , $xcc) and $check!=$name1){	
	    $sql="update bom_tb_data_sport_today set  b_score_1h='$score_HT', b_score_ft='$score_FT'  where b_zone='$leage'  and b_name_1='$name1' and b_name_2='$name2'  and b_process='0' ";
		echo $sql.'<br>';
		sql_query($sql);
		 $check=$name1;
			}#if(strstr($name1 , $xcc) and $check!=$name1){	
		}#foreach($x_bet as $xcc){
		}#if($leage!=""){	
}#foreach($ex1 as $nt1){	
}#if(count($x_bet)>0){
?>