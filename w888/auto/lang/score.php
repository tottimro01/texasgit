<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
//Step & YODAY
require "../../inc/conn.php";
require "../../inc/function.php";

$timezone=0;
$time_stam=mktime(date("H")+$timezone,date("i"),date("s"),date("m"),date("d"),date("Y"));


if($_GET[d]!=""){
$view_date=$_GET[d];	
}else{
$view_date=_bdate();
}
$x_bet=array();

 echo'<br>'.$sql="select * from bom_tb_ball_list where   b_date='".$view_date."' and b_score_full=''   group by b_id  order by b_date_play asc";
$re=sql_query($sql);
while($rs=sql_fetch($re)){

$x_bet[]="$rs[b_name_1]";	
#$x_bet[]="$rs[b_name_2]";	
}




if(count($x_bet)>0){

$data=file_get_contents2("http://www.atom168.com/isc888/data_score.php");
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
	    echo'<br>'.$sql="update bom_tb_ball_list set  b_score_half='$score_HT', b_score_full='$score_FT'  where b_zone='$leage'  and b_name_1='$name1' and b_name_2='$name2'  and b_process='0' ";
		sql_query($sql);
		 $check=$name1;
			}#if(strstr($name1 , $xcc) and $check!=$name1){	
		}#foreach($x_bet as $xcc){
		}#if($leage!=""){	
}#foreach($ex1 as $nt1){	
}#if(count($x_bet)>0){
########################################################################
if($_SERVER['HTTP_REFERER']!=""){echo'<meta http-equiv="refresh" content="0;URL='.$_SERVER['HTTP_REFERER'].'" />';}

?>