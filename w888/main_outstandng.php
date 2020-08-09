<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php   
header("Content-type:text/html; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);       
?>
<?php
require('inc/conn.php');
require('inc/function.php');

if($_GET['d']!=""){$view_date=$_GET['d'];}
else{$view_date=_bdate();}

require("lang/variable_lang.php");
// require("lang/member_lang.php");
$rec = sql_array("select * from bom_tb_config where con_id = 1;");

if($rec["con_open_sport"]==0){ 
  include 'sa_close.php'; 
  exit(); 
} 

foreach($_SESSION['arid'] as $rid){

  $r_open_page = explode(",", $_SESSION['ardata'][$rid]["r_open"]);

  if($r_open_page[1]==0 && $r_open_page[2]==0 && $r_open_page[3]==0 && $r_open_page[4]==0 && $r_open_page[5]==0 && $r_open_page[6]==0 && $r_open_page[7]==0){ 
    include 'ag_close.php'; 
    exit(); 
  } 
}


$m_open_page = explode(",", $_SESSION["m1"]["m_open"]);

if($m_open_page[1]==0 && $m_open_page[2]==0 && $m_open_page[3]==0 && $m_open_page[4]==0 && $m_open_page[5]==0 && $m_open_page[6]==0 && $m_open_page[7]==0){ 
  include 'ag_close.php'; 
  exit(); 
}

?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<TITLE><?=$app_name;?></TITLE>
<link rel="stylesheet" type="text/css" href="css/style.css?v=<?=$cache_css;?>">
<link rel="stylesheet" type="text/css" href="css/style3.css?v=<?=$cache_css;?>">
<? if($_SESSION['lang']=="mm"){?><link rel="stylesheet" type="text/css" href="css/style_mm.css?v=2019"><? }?>
<link href="template/maxbet/public/css/M_LeftAllInOne.css" rel="stylesheet" type="text/css" />
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
</style> -->
</head>

<body>
<div id="main_left" style="overflow:visible;">
  <div id="title_page">
    <div id="ic_title">&gt;</div>
    <span id="stitle"><?=$lang_member[53];?></span>
    <ul id="utitle">
      <li> <span class="ref_today" style="position:relative; top:7px; right:0px;" onClick="_r();"><!-- <img src="img/icon3.png" height="15" class="img_ref_today" style="padding:2px 0px;"> --></span> </li>
    </ul>
  </div>
  <table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#382701" class="oho_tb">
    <tbody>
      <tr class="tb_title_lotto">
        <th width="7%"><?=$lang_member[706];?></th>
        <th width="15%"><?=$lang_member[1049];?></th>
        <th width="38%"><?=$lang_member[708];?></th>
        <th width="7%"><?=$lang_member[938];?></th>
        <th width="10%"><?=$lang_member[1050];?></th>
        <th width="10%"><?=$ball_billb[1];?> / <?=$ball_billb[3];?></th>
        <th width="13%"><?=$lang_member[301];?></th>
      </tr>
      <? 
$i=1;  
$sbonus=array();
$scom=array();


$sql = sql_query("select * from bom_tb_football_bill_live where m_id = '".$_SESSION['m_id']."' and b_status=5 order by bill_id desc");
while($rs=sql_fetch($sql)){

$bm=$rs;
$bd=$rs;

?>
      <tr class="tb_ball <? if($rs["b_accept"]==2){ echo "canlight"; } ?>">
        <td align="center"  <? if($bd['b_accept']==1){/*echo' style="background:url(img/newY.gif);"';*/}?>><?=$i?></td>
        <td align="center"  <? if($bd['b_accept']==1){/*echo' style="background:url(img/newY.gif);"';*/}?>><strong class="blue">BetID:<?=$bm['bill_id'];?></strong><br>
          <?=date("d/m H:i:s",$bm['b_timestam']);?>
           <br> <strong><?
		   if($bd['b_numstep']>1){
		   echo '<br>'.$lang_member[767].' '.$bd['b_numstep'];
		   }
		   ?></strong>
          </td>
        <td <? if($bd['b_accept']==1){/*echo' style="background:url(img/newY.gif);"';*/}?>>
<?
$hrp=0;
$sql_b = sql_query("select * from bom_tb_football_bill_play_live where m_id = '".$_SESSION['m_id']."' and bill_id = '".$rs['bill_id']."'");
    while($dd=sql_fetch($sql_b)){



      $rs_main = sql_array_sp("select * from bom_tb_ball_list where b_id = '".$dd['b_id']."'"); 


       if($_SESSION['lang']!="th"){
        $rs_main["b_name_1_th"] = $rs_main["b_name_1_en"];
        $rs_main["b_name_2_th"] = $rs_main["b_name_2_en"];
        $rs_main["b_zone_th"] = $rs_main["b_zone_en"];
      }

 $leage= ($rs_main["b_zone_th"]!="" ? $rs_main["b_zone_th"] : $rs_main["b_zone_en"]);
 $team_1= ($rs_main["b_name_1_th"]!="" ? $rs_main["b_name_1_th"] : $rs_main["b_name_1_en"]);
 $team_2= ($rs_main["b_name_2_th"]!="" ? $rs_main["b_name_2_th"] : $rs_main["b_name_2_en"]);	

?>
    	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:12px;padding:10px 5px;" >
  <tr>
    <td align="right" style="border:none !important;" class="<? if($rs["b_accept"]==2){ echo "cantext"; } ?>"> 

    <?
		    if( ($dd['b_big']==1 and $dd['play_type']==1) or  ($dd['b_big']==1 and $dd['play_type']==11)  ){
			$w1='<u class="red">';
			$w2='</u>';
			$del='-';
			}elseif( ($dd['b_big']==2 and $dd['play_type']==2) or  ($dd['b_big']==2 and $dd['play_type']==12)   ){
			$w1='<u class="red">';
			$w2='</u>';
			$del='-';
			}else{
			$w1='<span class="blue">';
			$w2='</span>';
			$del='';
				}	
			if($dd['play_type']==2 or $dd['play_type']==12){$tn="$w1".$team_2."$w2";}
			else{$tn="$w1".$team_1."$w2";} 
			echo $tn;
	?>
    <strong class="blue2"><?=$del;?><?=$dd['play_bet'];?></strong> @<b><?=_cbp($dd['play_pay'],2);?></b> <?=$m_price[$dd['m_price']];?> </td>
  </tr>
  <tr>
    <td align="right" style="border:none !important;" >
    <? if($dd['b_time_play']!=""){?>
   <span style="background:#FF3; padding: 0px 4px;">"<?=$lang_member[2067]?>" <span class="blue"><?=$dd['b_time_play'];?>'</span> <?=$lang_member[1076];?>:<b class="red">[<?=$dd['b_score_live'];?>]</b></span>&nbsp;&nbsp;
    <? }?>  
     <?=$sport_man[$dd['play_type']];?>  </td>
  </tr>
  <tr>
    <td align="right"  style="border:none !important;"><!--<img src="img/iconfirstgoal.gif"> --><strong>
     <span <? if($dd['b_big']==1){echo'class="red"';}else{echo'class="blue"';}?>><?=$team_1;?></span>
      -vs- 
       <span <? if($dd['b_big']==2){echo'class="red"';}else{echo'class="blue"';}?>><?=$team_2;?></span>
       </strong><!--<img src="img/iconlastgoal.gif"> --></td>
  </tr>
  <tr>
    <td align="right" style="border:none !important;"> <?=date("H:i , d/m/Y",$rs_main['b_date_play']);?><br><span class="orange"><b><?=$sport_type[$dd["b_zone"]];?></b> / <?=$leage;?></span>
      <? if($rs_main['b_run_score_full']!=""){?><br><span style="background:#9F9; padding: 0px 4px;"> <?=$lang_member[2066]?> : <?=$rs_main['b_live_string'];?>' [<?=$rs_main['b_run_score_full'];?>]</span><? }?>
    
    </td>
  </tr>
</table>
<? $hrp++; if($hrp!=$bd["b_numstep"]){ ?>
<hr>
<? }  } ?>
        </td>
        <td align="center"  <? if($bd['b_accept']==1){/*echo' style="background:url(img/newY.gif);"';*/}?>><strong class="blue <? if($rs["b_accept"]==2){ echo "cantext"; } ?>"><?=_cbp($bm['b_sum_pay'],2);?></strong><br>
        <strong><?=$m_price[$dd['m_price']];?></strong></td>
        <td align="right" class="blue <? if($rs["b_accept"]==2){ echo "cantext"; } ?>"  <? if($bd['b_accept']==1){/*echo' style="background:url(img/newY.gif);"';*/}?>><strong><?=number_format($bm['b_total'],2);?></strong></td>
        <?
		 if($rs['b_accept']==1){
		   $mbonus=-$rs['b_sum'];
			}else{
		   $mbonus=0;		
			}

$sbonus[]=$mbonus;

		?>
        <td align="right"><strong ><?=_cbn($mbonus,2);?></strong></td>
        <td align="center"><? if($rs["b_accept"]==2){ echo $lang_member[1422]; }else{ echo $ball_bill[$bm['b_status']]; } ?><br>
        <span class="txtip"><?=$bm['b_ip'];?></span> </td>
      </tr>
      <? $i++;} ?>
      <tr>
      	<td colspan="5" align="right" bgcolor="#EEEEEE"><br><strong><?=$lang_member[701];?>:</strong><br><br></td>
        <td align="right" bgcolor="#EEEEEE"><strong><span class="red"><?=_cbn(@array_sum($sbonus),2);?></span>
</td>
        <td bgcolor="#EEEEEE"></td>
      </tr>
    </tbody>
  </table>
</div>
</body>
</html>