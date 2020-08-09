<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('conn.php');
require('function.php');
$view_date=_bdate();
require("../lang/member_lang.php");



$file="../json/sport/bet_success/".$_SESSION['m_id']."/".$_GET['id'].".json";	
$data_bet=@file_get_contents2($file);
$sport_bet = @json_decode2($data_bet, true);

$bm=$sport_bet['mian'];
$bd=$sport_bet['d1'];

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?=$lang_m[54];?>:<?=$bm['bill_id'];?></title>
<style type="text/css">

.sbt{border-bottom:1px dashed #999999;}
.sb2{border-bottom:1px dashed #999999;}
.win{ text-decoration:underline; color:#F00;}


@media screen
  {
.yes{ display:none;}
body{ font-size:12px;}
  }
  
@media print
  {
.no{ display:none;}
body{ font-size:12px;
color:#000;}
.txt10{ font-size:12px;}
  }
  
@media screen,print
  {
.cr {color: #000000;}
.cbu {color: #000000;}
.cb {color: #000000;}
.cw {color: #000000;}

.ball td{border:1px  solid #000000;	}
.r12{ font-size:12px;}
.bb{ font-weight:bold;}
.tcr{ text-decoration:underline; color:#000000;}
.cd{ border:1px  solid #000; text-align:center; font-weight:bold; background:#CCC; margin-right:5px; width:20px; float:left;}
  }

</style>
</head>

<body>



<table width="100%" border="0" cellpadding="0" cellspacing="0"  >
  <tr>
    <td colspan="2" align="center" class="cb">
    <b><?=$lang_m[54];?>:<?=$bm['bill_id'];?>   , <?=$lang_m[40];?>:<?=$bm['b_rob'];?></b>
     <br><span class="cr"><?=$lang_m[23];?></span> <span class="cr"><?=_cvf($bm['b_timestam'],4);?></span></td>
  </tr>
  <tr>
    <td colspan="2" align="center" class="cbu"><?=$lang_m[16];?>  <?=$_SESSION['m_currency'];?> : <span class="cr"> <?=number_format($bm['b_total']);?></span> 
    <!--<? if($bm['b_total']!=$bm['b_pay']){?>   <?=$lang_x[15];?>  <?=$_SESSION['m_currency'];?> : <span class="cr"><?=number_format($bm['b_total']-$bm['b_pay']);?></span><? }?> -->
    <hr>
<?
$ee=explode("+",$bm['b_code']);
 foreach($ee as $cc){echo'<div class="cd">'.$cc.'</div>';}?>
   <div style="clear:both"></div> <hr>
    </td>
  </tr>
  <?
  
$url_file3="../json/sport/bet_playid/".$bm['bill_id'].".json";		
$data_bet3=@file_get_contents2($url_file3);
$sport_bet3 = @json_decode2($data_bet3, true);
 $x=1;
#print_r($sport_bet3);
foreach($sport_bet3 as $dd){ // iterate files


$url_file4="../json/sport/match/".$dd['b_sport']."/".$dd['b_id'].".json";		
$data_bet4=@file_get_contents2($url_file4);
$sport_bet4 = @json_decode2($data_bet4, true);
$bh=$sport_bet4;
#print_r($bh);

if($_SESSION['lang']!='en'){
$fo2= $view_date."_".$_SESSION['lang'].".json";
$data_lang=@file_get_contents2("../json/sport/lang/".$dd['b_sport']."/$fo2");
$sport_lang = @json_decode2($data_lang, true);
}

$leage=_lg($bh['b_zone'], $sport_lang[Zone][md5($bh['b_zone'])]);
 $team_1= _lg($bh['b_name_1'], $sport_lang[Team][md5($bh['b_name_1'])]);
 $team_2= _lg($bh['b_name_2'], $sport_lang[Team][md5($bh['b_name_2'])]);				
 


		    if($dd['b_big']==1 and $dd['play_type']==1){
			$tn="<u class='cr'><b>$team_1</b></u>";
			$det="<br><u>$team_1</u> -vs- $team_2 <br>$leage";
			}elseif($dd['b_big']==2 and $dd['play_type']==2){
			$tn="<u class='cr'><b>$team_2</b></u>";
			$det="<br>$team_1 -vs- <u>$team_2</u><br>$leage";
			}elseif($dd['b_big']==2 and $dd['play_type']==1){
			$tn="<b>$team_1</b>";
			$det="<br>$team_1 -vs- <u>$team_2</u><br>$leage";
			}elseif($dd['b_big']==1 and $dd['play_type']==2){
			$tn="<b>$team_2</b>";
			$det="<br><u>$team_1</u> -vs- $team_2 <br>$leage";
				}	
		
		
        $txt=" $tn $det";
		
		
  ?>
  <tr <?  $bgc = ($bgc=="#fff") ? "#e3e3e3" : "#fff"; {echo"style=' height:25px; background:$bgc'";}?> class="cb txt10"  >
    <td class="sb2">
     <span style="float:right; position:relative;"><?=$sport_man[$dd['play_type']];?><br> [ <b><?=$dd['play_bet'];?></b> ] [ <?=number_format($dd['play_pay'],2);?> ]</span>
    <span><?=$x;?>. <b>[ <?=$dd['play_code'];?> ]</b> <?=$txt;?></span>
    </td>
  </tr>
  <? $x++;}?>
    <tr >
    <td align="right" class="sb2"><br>
    <span style="float: left;"><?=$lang_m[52];?> <b><?=$bm['b_numstep'];?></b></span>
    <strong><?=$lang_m[53];?>   :  <?=$_SESSION['m_currency'];?>  : <span class="cr"> <?=number_format($bm['b_total']*$bm['b_sum_pay']);?> </span></strong></td>
  </tr>
</table>
<hr>
<div  style="color:#000000;" align="center">
<?
$barcode=$bm['bill_id'];
?>
</div>
<center><img src="../barcode.php?barcode=<?php echo $barcode.'&width=250&height=50';?>" /></center>
<p>&nbsp;</p>




<div align="center"  class="no">
<input type="button"  value="<?=$lang_lot[6] ;?>"  onclick="javascript:window.print();window.close();"/>&nbsp;&nbsp;|&nbsp;&nbsp;
<input type="button"  value="<?=$lang_m[3];?>"  onclick="javascript:window.close();"/>
</div>





</body>
</html>