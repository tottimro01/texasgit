<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php       
include( "conn.php");
include( "function.php");
require('ok_block_7.php');
include( "nam_tor.php");
require("../lang/member_lang.php");
$tprice = $_POST["tprice"];
$ar = $_REQUEST['ball'];
//echo $Arball[0];
for($i=0;$i<count($ar);$i++){
	$Arball[$i] = explode("," , $ar[$i]);
}
unset($_SESSION["league_live"]);
$fav = @explode("," , $_SESSION["fav"]);
if(count($Arball)>0){
$myLeage = array();
$ln = 0;
for($i=0;$i<count($Arball);$i++){
	if(!(in_array($Arball[$i][4] , $myLeage))){ 
		$myLeage[] = $Arball[$i][4];
		if (_in_ar($Arball[$i][4] , $leage_c)==1)
  		{	
			$_SESSION["league_live"][$ln] = $Arball[$i][4];
			$ln++;
		}
	}
}

$view_date = _bdate();
$data_lang=file_get_contents2("../json/sport/lang/".$view_date.".json");
$sport_lang = json_decode2($data_lang, true);
?>
<table width="100%" border="0" cellspacing="1" cellpadding="5">
  <tr>
    <td rowspan="2" align="center" class="title_ball" width="6%"><?=$lang_m[9];?></td>
    <td rowspan="2" align="center" class="title_ball" width="19%"><?=$lang_m[10];?></td>
    <td colspan="6" align="center" class="title_ball"><?=$lang_m[7];?></td>
    <td colspan="6" align="center" class="title_ball"><?=$lang_m[8];?></td>
    <td rowspan="2" align="center" class="title_ball" width="3%">&nbsp;</td>
  </tr>
  <tr>
    <td width="6%" align="center" class="title_ball"><?=$lang_m[11];?></td>
    <td width="6%" align="center" class="title_ball"><?=$lang_m[30];?></td>
    <td width="6%" align="center" class="title_ball"><?=$lang_m[31];?></td>
    <td width="6%" align="center" class="title_ball"><?=$lang_m[12];?></td>
    <td width="6%" align="center" class="title_ball"><?=$lang_m[32];?></td>
    <td width="6%" align="center" class="title_ball"><?=$lang_m[33];?></td>
    <td width="6%" align="center" class="title_ball"><?=$lang_m[11];?></td>
    <td width="6%" align="center" class="title_ball"><?=$lang_m[30];?></td>
    <td width="6%" align="center" class="title_ball"><?=$lang_m[31];?></td>
    <td width="6%" align="center" class="title_ball"><?=$lang_m[12];?></td>
    <td width="6%" align="center" class="title_ball"><?=$lang_m[32];?></td>
    <td width="6%" align="center" class="title_ball"><?=$lang_m[33];?></td>
  </tr>
  <? 
  $os = array();
  $os = $_SESSION["ppp"][7];
  $tr_le = 0;
  //echo $_SESSION["leage"][0];
 // print_r($_SESSION["leage"]);
 				 if(count($os)>0){
						$le = 1;
				}else{
					$le = 0;	
				}
				//echo $le;
		   for($i=0;$i<count($myLeage);$i++){ 
		   		$leage=$myLeage[$i];
				
		   		if($le==1){
					if(in_array($myLeage[$i] , $os)){
						$show = 1;
					}else{
						$show = 0;	
					}
					//$show = 1;
				}else{
					$show = 1;	
				}
				//echo $show;
		   		if($show==1){
if (_in_ar($leage , $leage_c)==1)
  {	
  $nrow = 0;
  
  $leage=$sport_lang[z][md5($myLeage[$i])][$_SESSION['lang']];
		   ?>
  <tr id="tr_le<?=$tr_le?>">
    <td  bgcolor="#FFFFFF">&nbsp;</td>
    <td colspan="14" bgcolor="#FFFFFF" style="padding:5px;"><div style="position:relative;"><strong><?=$leage?></strong><span class="ref_live" onClick="Live_Basketball_List();"><img src="img/icon3.png" height="15" class="img_ref_live"></span></div></td>
  </tr>
  <? 
		  for($y=0;$y<count($Arball);$y++){ 
		 
		 $Arball[$y][4]=$sport_lang[z][md5($Arball[$y][4])][$_SESSION['lang']];
		 
		  	if($Arball[$y][4]==$leage){
				$idball = $Arball[$y][0];
				$add = $Arball[$y][1];
				$team_1 = $Arball[$y][5];
				$team_2 = $Arball[$y][6];
				$time_date = $Arball[$y][8];
				$time_date2 = $Arball[$y][7];
				$time_date3 = str_replace("'" , "" , $time_date);


$team_1= $sport_lang[t][md5($team_1)][$_SESSION['lang']];
$team_2=  $sport_lang[t][md5($team_2)][$_SESSION['lang']];
		
				//เต็มเวลา
				//$hdp1 = _chdc($Arball[$y][16] , $Arball[$y][17] , $Arball[$y][18] , 20);
				$ball1 = $Arball[$y][15];
				$hdp1_1 = price_ball($Arball[$y][16] , $tprice);
				$hdp1_2 = price_ball($Arball[$y][17] , $tprice);
				
				//$hdp2 = _chdc($Arball[$y][21] , $Arball[$y][22] , $Arball[$y][18] , 20);
				$ball2 = $Arball[$y][20];
				$hdp2_1 = price_ball($Arball[$y][21] , $tprice);
				$hdp2_2 = price_ball($Arball[$y][22] , $tprice);
				
				//ครึ่งแรก
				//$hdp3 = _chdc($Arball[$y][26] , $Arball[$y][30] , $Arball[$y][31] , 20);
				$ball3 = $Arball[$y][28];
				$hdp3_1 = price_ball($Arball[$y][29] , $tprice);
				$hdp3_2 = price_ball($Arball[$y][30] , $tprice);
				
				//$hdp4 = _chdc($Arball[$y][34] , $Arball[$y][35] , $Arball[$y][36] , 20);
				$ball4 = $Arball[$y][33];
				$hdp4_1 = price_ball($Arball[$y][34] , $tprice);
				$hdp4_2 = price_ball($Arball[$y][35] , $tprice);
				
				$tor = $Arball[$y][18];
$b_sport = $Arball[$y][46];
$b_date_play = $Arball[$y][47];
$b_tv = $Arball[$y][48];
$b_livecenter = $Arball[$y][49];
$b_statistics = $Arball[$y][50];
				$score = $Arball[$y][10]."-".$Arball[$y][11];
				if($idball==8257268 or $idball==8160045 ){$dss='display:none;';}
				else{$dss='';}
				
				$aq =  $_SESSION["ttt"];
				for($iq=0;$iq<count($aq);$iq++){
					$ex2 = explode("," , $aq[$iq]);
					
					if($idball==$ex2[0]){
						//echo $ex2[0]."-".$idball."<br>";
						$bg = "background: url(img/bgro.png);";
						break;
					}else{
						$bg="";	
					}
				}
								###########FT				
$hdp1_1=_ntor($hdp1_1,$ntl03 , $nrl03);
$hdp1_2=_ntor($hdp1_2,$ntl03 , $nrl03);	
$hdp2_1=_ntor($hdp2_1,$ntl03 , $nrl03);
$hdp2_2=_ntor($hdp2_2,$ntl03 , $nrl03);	
#############1H
$hdp3_1=_ntor($hdp3_1,$ntl03 , $nrl03);
$hdp3_2=_ntor($hdp3_2,$ntl03 , $nrl03);	
$hdp4_1=_ntor($hdp4_1,$ntl03 , $nrl03);
$hdp4_2=_ntor($hdp4_2,$ntl03 , $nrl03);		
				if($ball1!="" || $ball2!="" || $ball3!="" || $ball4!="" || $f1!="" || $f2!="" || $fx!="" || $h1!="" || $h2!="" || $hx!=""){
		  ?>
   <tr class="tr<?=$Arball[$y][0];?> font11 fontB tr_ball" bgcolor="#FCC8CD" style=" <? echo $bg; ?>" >
    <td align="center" style="font-size:9px;"><strong class="score_p<?=$idball?>"><?=$score?></strong><br>
      <strong style="color:<? if($time_date=="H.Time"){ echo "blue"; }else{ echo "red"; } ?>;" class="time_p<?=$idball?>"><?=preg_replace('/[^a-z0-9\_\- ]/i', "'", $time_date)?></strong></td>
    <td style="font-size:11px; font-weight:bold;">
    <table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td align="left" class="<? if($tor=="h" or $tor==""){ echo "red"; } ?>"><?=$team_1?></td>
    <td rowspan="2" align="right">    <? if($add==1){?>
        <? if($b_tv!=""){?>
<img src="img/tv-icon.png" width="15" style="cursor:pointer;" onClick="open_dialog('tv.php?bid=<?=md5($b_tv);?>');"><br><? } ?>
<? if($b_livecenter!=""){?>
<img src="img/lc.png" width="15" style="cursor:pointer;" onClick="_o('livecenter.php?bid=<?=($b_livecenter);?>');"><? } ?>
<? }?></td>
  </tr>
  <tr align="left">
    <td class="<? if($tor=="a"){ echo "red"; } ?>"><?=$team_2?></td>
    </tr>
</table>
    </td>
    <td align="center" bgcolor="#E8EFF4" class="gray" id="Lball_<?=$Arball[$y][14];?>_1"><?=$ball1?></td>
    <td style="cursor:pointer;" align="center" class="<?=_red($hdp1_1)?>" id="Lfhdp_<?=$Arball[$y][14];?>_1" <? if(_mix($hdp1_1)!=""){ ?>onClick="setshowprice('<?=$Arball[$y][4]?>','<?=$Arball[$y][5]?>','<?=$Arball[$y][6]?>','<?=$tor?>','<?=$ball1?>',this,'L',$('.score_p<?=$idball?>').html(),1,1,'<?=$idball?>','Lfhdp_<?=$Arball[$y][14];?>_1','<?=$time_date2?>' ,'Lball_<?=$Arball[$y][14];?>_1',$('.time_p<?=$idball?>').html(),'<?=$b_sport?>','<?=$b_date_play?>','<?=$add?>');"<? } ?>><?=_mix($hdp1_1)?></td>
    <td style="cursor:pointer;" align="center" class="<?=_red($hdp1_2)?>" id="Lfhdp_<?=$Arball[$y][14];?>_2" <? if(_mix($hdp1_2)!=""){ ?>onClick="setshowprice('<?=$Arball[$y][4]?>','<?=$Arball[$y][5]?>','<?=$Arball[$y][6]?>','<?=$tor?>','<?=$ball1?>',this,'L',$('.score_p<?=$idball?>').html(),2,1,'<?=$idball?>','Lfhdp_<?=$Arball[$y][14];?>_2','<?=$time_date2?>' ,'Lball_<?=$Arball[$y][14];?>_1',$('.time_p<?=$idball?>').html(),'<?=$b_sport?>','<?=$b_date_play?>','<?=$add?>');"<? } ?>><?=_mix($hdp1_2)?></td>
    <td align="center" bgcolor="#E8EFF4" class="gray" id="Lball_<?=$Arball[$y][19];?>_2"><?=$ball2?></td>
    <td style="cursor:pointer;" align="center" class="<?=_red($hdp2_1)?>" id="Lfou_<?=$Arball[$y][19];?>_3" <? if(_mix($hdp2_1)!=""){ ?>onClick="setshowprice('<?=$Arball[$y][4]?>','<?=$Arball[$y][5]?>','<?=$Arball[$y][6]?>','<?=$tor?>','<?=$ball2?>',this,'L',$('.score_p<?=$idball?>').html(),1,2,'<?=$idball?>','Lfou_<?=$Arball[$y][19];?>_3','<?=$time_date2?>' ,'Lball_<?=$Arball[$y][19];?>_2',$('.time_p<?=$idball?>').html(),'<?=$b_sport?>','<?=$b_date_play?>','<?=$add?>');"<? } ?>><?=_mix($hdp2_1)?></td>
    <td style="cursor:pointer;" align="center" class="<?=_red($hdp2_2)?>" id="Lfou_<?=$Arball[$y][19];?>_4" <? if(_mix($hdp2_2)!=""){ ?>onClick="setshowprice('<?=$Arball[$y][4]?>','<?=$Arball[$y][5]?>','<?=$Arball[$y][6]?>','<?=$tor?>','<?=$ball2?>',this,'L',$('.score_p<?=$idball?>').html(),2,2,'<?=$idball?>','Lfou_<?=$Arball[$y][19];?>_4','<?=$time_date2?>' ,'Lball_<?=$Arball[$y][19];?>_2',$('.time_p<?=$idball?>').html(),'<?=$b_sport?>','<?=$b_date_play?>','<?=$add?>');"<? } ?>><?=_mix($hdp2_2)?></td>
    <td align="center" bgcolor="#E8EFF4" class="gray" id="Lball_<?=$Arball[$y][27];?>_3"><?=$ball3?></td>
    <td style="cursor:pointer;" align="center" class="<?=_red($hdp3_1)?>" id="Lhhdp_<?=$Arball[$y][27];?>_5" <? if(_mix($hdp3_1)!=""){ ?>onClick="setshowprice('<?=$Arball[$y][4]?>','<?=$Arball[$y][5]?>','<?=$Arball[$y][6]?>','<?=$tor?>','<?=$ball3?>',this,'L',$('.score_p<?=$idball?>').html(),1,3,'<?=$idball?>','Lhhdp_<?=$Arball[$y][27];?>_5','<?=$time_date2?>' ,'Lball_<?=$Arball[$y][27];?>_3',$('.time_p<?=$idball?>').html(),'<?=$b_sport?>','<?=$b_date_play?>','<?=$add?>');"<? } ?>><?=_mix($hdp3_1)?></td>
    <td style="cursor:pointer;" align="center" class="<?=_red($hdp3_2)?>" id="Lhhdp_<?=$Arball[$y][27];?>_6" <? if(_mix($hdp3_2)!=""){ ?>onClick="setshowprice('<?=$Arball[$y][4]?>','<?=$Arball[$y][5]?>','<?=$Arball[$y][6]?>','<?=$tor?>','<?=$ball3?>',this,'L',$('.score_p<?=$idball?>').html(),2,3,'<?=$idball?>','Lhhdp_<?=$Arball[$y][27];?>_6','<?=$time_date2?>' ,'Lball_<?=$Arball[$y][27];?>_3',$('.time_p<?=$idball?>').html(),'<?=$b_sport?>','<?=$b_date_play?>','<?=$add?>');"<? } ?>><?=_mix($hdp3_2)?></td>
    <td align="center" bgcolor="#E8EFF4" class="gray" id="Lball_<?=$Arball[$y][32];?>_4"><?=$ball4?></td>
    <td style="cursor:pointer;" align="center" class="<?=_red($hdp4_1)?>" id="Lhou_<?=$Arball[$y][32];?>_7" <? if(_mix($hdp4_1)!=""){ ?>onClick="setshowprice('<?=$Arball[$y][4]?>','<?=$Arball[$y][5]?>','<?=$Arball[$y][6]?>','<?=$tor?>','<?=$ball4?>',this,'L',$('.score_p<?=$idball?>').html(),1,4,'<?=$idball?>','Lhou_<?=$Arball[$y][32];?>_7','<?=$time_date2?>' ,'Lball_<?=$Arball[$y][32];?>_4',$('.time_p<?=$idball?>').html(),'<?=$b_sport?>','<?=$b_date_play?>','<?=$add?>');"<? } ?>><?=_mix($hdp4_1)?></td>
    <td style="cursor:pointer;" align="center" class="<?=_red($hdp4_2)?>" id="Lhou_<?=$Arball[$y][32];?>_8" <? if(_mix($hdp4_2)!=""){ ?>onClick="setshowprice('<?=$Arball[$y][4]?>','<?=$Arball[$y][5]?>','<?=$Arball[$y][6]?>','<?=$tor?>','<?=$ball4?>',this,'L',$('.score_p<?=$idball?>').html(),2,4,'<?=$idball?>','Lhou_<?=$Arball[$y][32];?>_8','<?=$time_date2?>' ,'Lball_<?=$Arball[$y][32];?>_4',$('.time_p<?=$idball?>').html(),'<?=$b_sport?>','<?=$b_date_play?>','<?=$add?>');"<? } ?>><?=_mix($hdp4_2)?></td>
    <td align="center" valign="top">
    	<!--<?
	if($_POST["ball_fav"]==1){
	$img_fav = "img/star1.png";	
    		for($fv=0;$fv<count($fav);$fv++){
			if($fav[$fv]==$Arball[$y][0])	{
				$img_fav = "img/star2.png";	
				break;
			}
		}
	?>
    	<img src="<?=$img_fav?>" width="15" style="cursor:pointer;" onClick="set_fev(this,'<?=$Arball[$y][0];?>')" class="str<?=$Arball[$y][0];?>">
        <? } ?>
         <? if($add==1 && $b_statistics!="0"){?>
        <img src="img/stats.png" width="15" style="cursor:pointer;" onClick="_o('stats.php?bid=<?=$b_statistics;?>');">
        <? }?>-->
    </td>
  </tr>
  <? $nrow++; } } } } ?>
    <? }
	if($nrow<=0){
		echo "<script>$('#tr_le".$tr_le."').hide();</script>";
	}
	$tr_le++;
	 } ?>
</table>
<? } ?>
