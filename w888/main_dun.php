<?php   ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php   
/*
header("Content-type:text/html; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);       
*/
if(($_SESSION['m_id'] == '') || (!isset($_SESSION['m_id']))){
exit();
}

require('inc/conn.php');
require('inc/function.php');

require("lang/variable_lang.php");
// require("lang/member_lang.php");




?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<TITLE><?=$app_name;?></TITLE>
<link rel="stylesheet" type="text/css" href="css/style.css?v=<?=$cache_css;?>">
<link rel="stylesheet" type="text/css" href="css/style3.css?v=<?=$cache_css;?>">
<? if($_SESSION['lang']=="mm"){?><link rel="stylesheet" type="text/css" href="css/style_mm.css?v=2019"><? }?>
<link href="jsui/jquery-ui.css?v=0001" rel="stylesheet">
<script src="jsui/external/jquery/jquery.js?v=2019"></script>
<script src="jsui/jquery-ui.js?v=2019"></script>
<script>
$(function() {
    $( ".datepicker" ).datepicker({
      showOn: "button",
      buttonImage: "img/calendar.png",
      buttonImageOnly: true,
      buttonText: "Select date",
	  dateFormat:"dd/mm/yy"
    });
	$( ".dialog" ).dialog({
      autoOpen: false,
	  width: 750,
	  height: 400,
	  modal: true,
    });
 
    $( ".opener" ).click(function() {
      $( ".dialog" ).dialog( "open" );
    });
  });

  try{
    parent.leftx.unselectSportMenu();
  }catch(e){
    console.log(e);
  }
  </script>
<script>
var fw;
$(document).ready(function() {
	 to_width(<?=$_GET["vvw"]?>);
});
function to_width(ty){
	if(ty==1){
		$("#main_left").width(975);
		fw = 1;
	}else{
		$("#main_left").width(770);
		fw = 0;
	}
}
function _w(url){
	window.location=url;
	}
function _o(url){
	window.open(url);
	}
	function _r(){
	window.location.reload()
	}
</script>
<!-- <style>
.ui-datepicker-trigger {
	vertical-align: middle !important;
	cursor: pointer;
}
.txtq2 {
	color: #000;
	border: 1px #333 solid;
	font-size: 12px;
	text-align: center;
	padding: 3px;
}
.txt_white12btitle {
	font-size: 12px;
	color: #fff;
	font-weight: bold;
	text-shadow: 1px 1px 1px #000;
}
.tb_title_lotto {
	background-image: -moz-linear-gradient(top, #b14b41, #83160b);
    background-image: -webkit-linear-gradient(top, #b14b41, #83160b);
    background-image: -o-linear-gradient(top, #b14b41, #83160b);
    background-image: -ms-linear-gradient(top, #b14b41, #83160b);
	font-size: 12px;
	color: #fff;
	font-weight: bold;
	text-shadow: 1px 1px 1px #000;
}
.ui-widget-header {
    border: 1px solid #ddd;
    /*background: url(images/ui-bg_highlight-soft_50_dddddd_1x100.png) 50% 50% repeat-x #ddd;*/
	background: #8c7531;
    color: #fff;
    font-weight: 700;
}
</style> -->
</head>

<body>
<?php
$js3=array();
$js4=array();
$js5=array();

/*
echo $date1=date("d-m-Y", strtotime('tuesday this week'));   
echo'<br>';
echo $end_date1 =date("d-m-Y", strtotime('+2 monday this week'));		
*/

if($_GET['last']==1){

$week=date("W", strtotime('+1 tuesday last week'));   
$date=date("d-m-Y", strtotime('+1 tuesday last week'));   
$date_x=date("D", strtotime('+1 tuesday last week'));   
$end_date =date("d-m-Y", strtotime('+1 monday this week'));		

}elseif($_GET['last']==2){
$week=date("W", strtotime('-1 tuesday last week'));   
$date=date("d-m-Y", strtotime('-1 tuesday last week'));   
$date_x=date("D", strtotime('-1 tuesday last week'));   
$end_date =date("d-m-Y", strtotime('-1 monday this week'));		
}elseif($_GET['last']==3){
$week=date("W", strtotime('-2 tuesday last week'));   
$date=date("d-m-Y", strtotime('-2 tuesday last week'));   
$date_x=date("D", strtotime('-2 tuesday last week'));   
$end_date =date("d-m-Y", strtotime('-2 monday this week'));		
}elseif($_GET['last']==4){
$week=date("W", strtotime('-3 tuesday last week'));   
$date=date("d-m-Y", strtotime('-3 tuesday last week'));   
$date_x=date("D", strtotime('-3 tuesday last week'));   
$end_date =date("d-m-Y", strtotime('-3 monday this week'));		
}elseif($_GET['last']==5){
$week=date("W", strtotime('-4 tuesday last week'));   
$date=date("d-m-Y", strtotime('-4 tuesday last week'));   
$date_x=date("D", strtotime('-4 tuesday last week'));   
$end_date =date("d-m-Y", strtotime('-4 monday this week'));		
}elseif($_GET['last']==6){
$week=date("W", strtotime('-5 tuesday last week'));   
$date=date("d-m-Y", strtotime('-5 tuesday last week'));   
$date_x=date("D", strtotime('-5 tuesday last week'));   
$end_date =date("d-m-Y", strtotime('-5 monday this week'));		
}else{
$week=date("W", strtotime('+2 tuesday last week'));   
$date=date("d-m-Y", strtotime('+2 tuesday last week'));   
$date_x=date("D", strtotime('+2 tuesday last week'));   
$end_date =date("d-m-Y", strtotime('+2 monday this week'));		
		}
		
$week_6=date("W", strtotime('-5 tuesday last week'));   		
$week_5=date("W", strtotime('-4 tuesday last week'));   
$week_4=date("W", strtotime('-3 tuesday last week'));   
$week_3=date("W", strtotime('-2 tuesday last week'));   		
$week_2=date("W", strtotime('-1 tuesday last week'));   
$week_1=date("W", strtotime('+1 tuesday last week'));   
$week_0=date("W", strtotime('+2 tuesday last week'));   

?>

<div id="main_left" style="overflow:visible;">
  <div id="title_page">
    <div id="ic_title">&gt;</div>
    <span id="stitle"><?=$lang_member[43];?></span> 
    <ul id="utitle">
      <li>
        <span class="ref_today" style="position:relative; top:7px; right:0px;" onClick="_r();">
          <!-- <img src="img/icon3.png" height="15" class="img_ref_today" style="padding:2px 0px;"> -->
        </span>
      </li>
      <li>
        <div class="sele" onClick="_w('main_dun.php');"><span><?=$lang_member[1067];?> [<?=$week_0;?>]</span> <img src="img/bg_m.png" class="img_active"></div>
      </li>
      <li>
        <div class="sele" onClick="_w('main_dun.php?last=1');"><span><?=$lang_member[1068];?>  [<?=$week_1;?>]</span> <img src="img/bg_m.png" class="img_active"></div>
      </li>
       <li>
        <div class="sele" onClick="_w('main_dun.php?last=2');"><span>  [<?=$week_2;?>]</span> <img src="img/bg_m.png" class="img_active"></div>
      </li>
       <li>
        <div class="sele" onClick="_w('main_dun.php?last=3');"><span>  [<?=$week_3;?>]</span> <img src="img/bg_m.png" class="img_active"></div>
      </li>
       <li>
        <div class="sele" onClick="_w('main_dun.php?last=4');"><span>  [<?=$week_4;?>]</span> <img src="img/bg_m.png" class="img_active"></div>
      </li>
       <li>
        <div class="sele" onClick="_w('main_dun.php?last=5');"><span>  [<?=$week_5;?>]</span> <img src="img/bg_m.png" class="img_active"></div>
      </li>
        <li>
        <div class="sele" onClick="_w('main_dun.php?last=6');"><span>  [<?=$week_6;?>]</span> <img src="img/bg_m.png" class="img_active"></div>
      </li>
    </ul>
    </div>

  <table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#382701" class="oho_tb">
    <tbody>
      <tr class="tb_title_lotto">
        <th width="22%"><?=$lang_member[146];;?></th>
        <th width="13%"><?=$lang_member[40];?></th>
		    <th width="13%"><?=$m_news[2];?></th>
        <th width="13%"><?=$lang_member[48];?></th>
        <th width="13%"><?=$lang_member[37];?></th>
        <th width="13%"><?=$lang_member[38];?></th>
        <th width="13%"><?=$lang_member[611];?></th>
 
      </tr>
      <? 
$sum1=array();	 
$sum2=array();	 
$sum3=array();	 
$sum4=array();	 
$sum5=array();	 

  $date3 = str_replace('-','/',$date);
  $end_date3 = str_replace('-','/',$end_date);
  
  
  $date4 =$date;
  $end_date4 = $end_date;


 while (strtotime($date) <= strtotime($end_date)) {

$edd=@explode("-",$date); 
$ndate=$edd[2].'-'.$edd[1].'-'.$edd[0]; 

  $date2 = str_replace('-','/',$date);
  $end_date2 = str_replace('-','/',$end_date);



################################# บอล

$sql="select 
 sum( 
(ROUND(  -b_sum ,2))	
   ) as t1 ,
  sum(
(ROUND( 	 b_pay  ,2))
   ) as t2 ,
  sum(
 ( ROUND( 	b_bonus  ,2))
   ) as t3 
 from bom_tb_football_bill where m_id='".$_SESSION['m_id']."'  and b_accept=1  and b_status!=5   and b_date like '$date'";
$rs1=sql_array($sql);

$s1=($rs1[t1])+($rs1[t2]+$rs1[t3]);
$sum1[]=$s1;	 

################################# หวย

$sql="select 
 sum( 
(ROUND( 	-b_total  ,2))
   ) as t1 ,
  sum(
(ROUND( 	 b_total-b_pay  ,2))
   ) as t2 ,
  sum(
 ( ROUND( 	b_bonus  ,2))
   ) as t3 
 from bom_tb_lotto_bill_play where m_id='".$_SESSION['m_id']."'  and b_accept=1 and lot_zone=1   and play_datenow like '$ndate%'";
$rs2=sql_array($sql);
$s2=($rs2[t1])+($rs2[t2]+$rs2[t3]);
$sum2[]=$s2;	 

################################# หวยหุ้น
$sql="select 
 sum( 
(ROUND( 	-b_total  ,2))
   ) as t1 ,
  sum(
(ROUND( 	 b_total-b_pay  ,2))
   ) as t2 ,
  sum(
 ( ROUND( 	b_bonus  ,2))
   ) as t3 
 from bom_tb_lotto_bill_play where m_id='".$_SESSION['m_id']."'  and b_accept=1 and lot_zone!=1   and play_datenow like '$ndate%'";
$rs3=sql_array($sql);
$s3=($rs3[t1])+($rs3[t2]+$rs3[t3]);
$sum3[]=$s3;	 
################################# เกมส์
$sql="select 
 sum( 
(ROUND( 	-b_total  ,2))
   ) as t1 ,
  sum(
(ROUND( 	 b_total-b_pay  ,2))
   ) as t2 ,
  sum(
 ( ROUND( 	b_bonus  ,2))
   ) as t3 
 from bom_tb_games_bill_play where m_id='".$_SESSION['m_id']."'  and b_accept=1   and play_datenow like '$ndate%'";
$rs4=sql_array($sql);
$s4=($rs4[t1])+($rs4[t2]+$rs4[t3]);
$sum4[]=$s4;	 
################################# คาสิโน
$sql="select 
 sum( 
(ROUND( 	-b_total  ,2))
   ) as t1 ,
  sum(
(ROUND( 	 b_total-b_pay  ,2))
   ) as t2 ,
  sum(
 ( ROUND( 	b_bonus  ,2))
   ) as t3 
 from bom_tb_casino_bill_play where m_id='".$_SESSION['m_id']."'  and b_accept=1     and   STR_TO_DATE(b_date,'%d-%m-%Y') BETWEEN '$ndate' and '$ndate'  ";
$rs5=sql_array($sql);
$s5=($rs5[t1])+($rs5[t2]+$rs5[t3]);
$sum5[]=$s5;	 







	   ?>
      <tr class="tb_ball">
        <td align="left"><a  style="text-decoration:none; color:#000; cursor:pointer;"><strong><?=$date;?> (<?=$n_date[$date_x];?>)</strong></a></td>
        <td align="right">
          <a  onClick="window.location.href='main_betlist.php?d=<?=$date;?>&last=<?=$_GET['last'];?>&vvw='+fw;"  style="text-decoration:none; color:#000; cursor:pointer;">
          <strong><?=_cbn($s1,2);?></strong>
          </a>
        </td>
		  <td align="right">
        <a onClick="window.location.href='main_lotto.php?tlot=list&d=<?=$date;?>&dun=1&last=<?=$_GET['last'];?>&vvw='+fw;" style="text-decoration:none; color:#000; cursor:pointer;">
        <strong><?=_cbn($s2,2);?></strong>
        </a>
      </td>
        <td align="right">
        <a onClick="window.location.href='main_lothun.php?tlot=list&d=<?=$date;?>&dun=1&last=<?=$_GET['last'];?>&zone_send=<?=$_SESSION["zone_hun"];?>&vvw='+fw;" style="text-decoration:none; color:#000; cursor:pointer;">
        <strong><?=_cbn($s3,2);?></strong>
        </a>
         </td>

        <td align="right">
<a onClick="window.location.href='main_game.php?tlot=list&d=<?=$date;?>&vvw='+fw;"style="text-decoration:none; color:#000; cursor:pointer;">
<strong><?=_cbn($s4,2);?></strong>
</a>
        </td>
        
        <td align="right" >
 <a onClick="window.location.href='list_bet_casino.php?d_from=<?=$date2;?>&datepicker_from_hr=0&datepicker_from_mn=0&d_to=<?=$date2;?>&datepicker_to_hr=23&datepicker_to_mn=59';" style="text-decoration:none; color:#000; cursor:pointer;">
        <strong><?=_cbn($s5,2);?></strong>
        </a>
        </td>
        <td align="right" >
        <strong><?=_cbn($s1+$s2+$s3+$s4+$s5,2);?></strong>
        </td>
      
      <? 
 $date_x = date ("D", strtotime("+1 day", strtotime($date)));
 $date = date ("d-m-Y", strtotime("+1 day", strtotime($date)));
 }
 
 

  ?>
 </tr>
 
    </tbody>
   <tr class="tb_ball">
        <td align="right"><strong><?=$lang_member[611]?></strong></td>
             <td align="right">
          <a  onClick="window.location.href='main_betlist.php?d=<?=$date4;?>&e=<?=$end_date4;?>&last=<?=$_GET['last'];?>&vvw='+fw;"  style="text-decoration:none; color:#000; cursor:pointer;">
          <strong><?=_cbn(@array_sum($sum1),2);?></strong>
          </a>
        </td>
		  <td align="right">
        <a onClick="window.location.href='main_lotto.php?tlot=list&d=<?=$date;?>&e=<?=$end_date;?>&dun=1&last=<?=$_GET['last'];?>&vvw='+fw;" style="text-decoration:none; color:#000; cursor:pointer;">
        <strong><?=_cbn(@array_sum($sum2),2);?></strong>
        </a>
      </td>
        <td align="right">
        <a onClick="window.location.href='main_lothun.php?tlot=list&d=<?=$date;?>&e=<?=$end_date;?>&dun=1&last=<?=$_GET['last'];?>&zone_send=<?=$_SESSION["zone_hun"];?>&vvw='+fw;" style="text-decoration:none; color:#000; cursor:pointer;">
        <strong><?=_cbn(@array_sum($sum3),2);?></strong>
        </a>
         </td>

        <td align="right">
<a onClick="window.location.href='main_game.php?tlot=list&d=<?=$date;?>&e=<?=$end_date;?>&vvw='+fw;"style="text-decoration:none; color:#000; cursor:pointer;">
<strong><?=_cbn(@array_sum($sum4),2);?></strong>
</a>
        </td>
        
        <td align="right" >
        <a onClick="window.location.href='list_bet_casino.php?d_from=<?=$date3;?>&datepicker_from_hr=0&datepicker_from_mn=0&d_to=<?=$end_date3;?>&datepicker_to_hr=23&datepicker_to_mn=59';" style="text-decoration:none; color:#000; cursor:pointer;">
        <strong><?=_cbn(@array_sum($sum5),2);?></strong>
        </a>
        </td>

        <td align="right" >
        
        <strong><?=_cbn(@array_sum($sum1)+@array_sum($sum2)+@array_sum($sum3)+@array_sum($sum4)+@array_sum($sum5),2);?></strong>
        </td>
      
 </tr>
    
    
  </table>
</div>


<? #echo mktime(15,40,0,9,16,2019);?>
</body>
</html>