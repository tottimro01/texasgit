<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php   
header("Content-type:text/html; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);       
?>
<?php
require('conn.php');
require('function.php');
$view_date=_bdate();

require("../lang/member_lang.php");
$url_file4="../json/sport/bet_wait/".$_SESSION['mid']."/*.json";	
$x_del=(60*60*4*1);
$files = @glob($url_file4); // get all file names
@array_multisort(@array_map('filemtime', $files), SORT_NUMERIC, SORT_DESC, $files);
foreach(@array_slice($files, 0, 30) as $file){ // iterate files
  if(@is_file($file)){
$ct=@filemtime($file);
$nt=$time_stam-$ct;

if($nt<($x_del)){
#	 echo $file;
	# echo'<br>';


$data_bet=@file_get_contents2($file);
$sport_bet = @json_decode2($data_bet, true);

$bm=$sport_bet['mian'];
$bd=$sport_bet['d1'];
#print_r($bm);
#echo'<hr>';
#print_r($bd);
?>
<table width="179" border="0" cellspacing="0" cellpadding="1" style="border:1px solid #cccccc; border-radius:5px;" class="font10" bgcolor="#E0E5EC">
  <tr bgcolor="#CCCCCC">
    <td width="41%"  class="sa">BetID:<strong><?=$bm['bill_id'];?></strong></td>
    <td width="59%" align="right"   class="sa"><?=date("d/m H:i:s",$bm['b_timestam']);?></td>
    </tr>
    <?
$url_file3="../json/sport/bet_playid/".$bm['bill_id'].".json";		
$data_bet3=@file_get_contents2($url_file3);
$sport_bet3 = @json_decode2($data_bet3, true);

foreach($sport_bet3 as $dd){ // iterate files

#print_r($dd);

$url_file4="../json/sport/match/".$dd['b_sport']."/".$dd['b_id'].".json";		
$data_bet4=@file_get_contents2($url_file4);
$sport_bet4 =@json_decode2($data_bet4, true);
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
?>
  <tr>
    <td><strong><?=$sport_type[$dd['b_sport']];?></strong></td>
    <td align="right"><strong><?=$sport_man[$dd['play_type']];?></strong></td>
    </tr>
  <tr>
    <td colspan="2">
    <span <? if($dd['b_big']==1){echo'class="red"';}else{echo'class="blue"';}?>><?=$team_1;?></span>
     -vs- 
     <span <? if($dd['b_big']==2){echo'class="red"';}else{echo'class="blue"';}?>><?=$team_2;?></span>
     </td>
    </tr>
    <tr>
    <td colspan="2"><?=$leage;?></td>
    </tr>
    <tr>
    <td colspan="2" >
    <?=$lang_x[25];?>:
    <strong>
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
    </strong>
    </td>
    </tr>
    <tr>
       <td colspan="2" align="right"   style="background:url(img/newY.gif);"><strong class="blue2"><?=$del;?><?=$dd['play_bet'];?></strong> @<b><?=_cbp($dd['play_pay'],3);?></b> <?=$m_price[$dd['m_price']];?> <span class="red" ><?=$ab_bet[$dd['b_accept']];?></span></td>
    </tr>
        <tr>
    <td class="sb"></td>
    <td class="sb"></td>
    </tr>
<? }?> 
    
            <tr>
    <td class="sa"></td>
    <td class="sa"></td>
    </tr>
      <tr bgcolor="#CCCCCC">
       <td align="center"  class="red"><strong><?=$ab_bet[$bd['b_accept']];?></strong></td>
    <td align="right" class="blue">BET : <span class="cb"><?=$_SESSION['m_currency'];?></span> <strong><?=number_format($bm['b_total'],2);?></strong></td>
  </tr>
</table>
<div style="display:block; clear:both; height:5px;"></div>
<?
 }
 }
}
 ?>
<script language="javascript">
if (tmc_last) { clearTimeout(tmc_last); }
var hv_wait = 0;
var ha_wait = 3;
chktime_wait();
function chktime_wait(){
	ha_wait = ha_wait-1;
	if(ha_wait==0){
		if (tmc_wait) { clearTimeout(tmc_wait); }
		menu_bet(1,0);
	}else{
		//console.log(ha_wait , "w");
		if (tmc_wait) { clearTimeout(tmc_wait); }
		tmc_wait=setTimeout("chktime_wait()",1000);
	}
}
</script>