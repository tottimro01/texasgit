<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?

require('inc/conn.php');
require('inc/function.php');

require("lang/variable_lang.php");
require("lang/function_array.php");

$nl = 0;

$sql = sql_query("select * from bom_tb_football_bill_live where m_id = '".$_SESSION['m_id']."' and b_running = 1 order by bill_id desc limit 5");
while($rs=sql_fetch($sql)){
	if(!in_array($rs["bill_id"], $_SESSION["wbet_id"])){
		$_SESSION["wbet_id"][] = $rs["bill_id"];
	}
}

rsort($_SESSION["wbet_id"]);

foreach ($_SESSION["wbet_id"] as $key => $value) {
	$rs_c = sql_array("select * from bom_tb_football_bill_live where m_id = '".$_SESSION['m_id']."' and bill_id = $value");
	if($rs_c["b_running"]==1){
		$rs_c["time_out"] = time();
		$_SESSION["wbet_show"][$rs_c["bill_id"]] = $rs_c;
	}else{
		if($_SESSION["wbet_show"][$rs_c["bill_id"]]!=""){
			$tnow = time();
			$tout = $_SESSION["wbet_show"][$rs_c["bill_id"]]["time_out"];
			$timeO = $tnow-$tout;
			if($timeO>20){
				unset($_SESSION["wbet_show"][$rs_c["bill_id"]]);
				unset($_SESSION["wbet_id"][$key]);
			}else{
				$rs_c["time_out"] = $tout;
				$_SESSION["wbet_show"][$rs_c["bill_id"]] = $rs_c;
			}
			//if($_SESSION["wbet_show"][$rs_c["bill_id"]]["time_out"])
		}else{
			$rs_c["time_out"] = time();
			$_SESSION["wbet_show"][$rs_c["bill_id"]] = $rs_c;
		}
		
	}
}

//rsort($_SESSION["wbet_show"]);

//$sql = sql_query("select * from bom_tb_football_bill_live where m_id = '".$_SESSION['m_id']."' and b_running = 1 order by bill_id desc limit 5");
//while($rs=sql_fetch($sql)){
foreach ($_SESSION["wbet_id"] as $key => $value) {
	$rs = $_SESSION["wbet_show"][$value];
	if($rs["b_numstep"]>1){
?>
<div class="BetInfo <? if($rs["b_accept"]==2){ echo "canlight"; }else{ echo "bgcpelight"; } ?>">
 <div id="Detail_<?=$rs['bill_id']?>" class="ComboParlay">
   <div class="TextStyle01" onclick='javascript:ComboDataDisplay(<?=$rs['bill_id']?>);'><?=$lang_member[767]?></div>
    
<div class="combo-list-item">
    
<div class="tab-tr">
    <div class="TextStyle02"><?=$rs["b_numstep"]?>-<?=$lang_member[954];?> <i>(1 <?=$lang_member[300];?>)</i>
        
<div class="TextStyle01 <? if($rs["b_accept"]==2){ echo "cantext"; } ?>"><span class="TextStyle03">@</span><span class="UdrDogOddsClass"><?=number_format($rs["b_sum_pay"],2)?></span></div>

    </div>
    <div class="TextStyle01 txt-r <? if($rs["b_accept"]==2){ echo "cantext"; } ?>"><?=number_format($rs["b_total"])?></div>
</div>
 
</div>
 
    <div class="multiple-box" style="border-bottom: #b1b1b1 1px solid;">
        <?
		$sql_b = sql_query("select * from bom_tb_football_bill_play_live where m_id = '".$_SESSION['m_id']."' and bill_id = '".$rs['bill_id']."'");
		while($rs_b=sql_fetch($sql_b)){
			
			/*$json_file = file_get_contents2($x_process."json/sport/lang/".$_SESSION['lang']."/".$rs_b['b_id'].".json");
			$rs_main = json_decode($json_file, true);*/
			$rs_main = sql_array_sp("select * from bom_tb_ball_list where b_id = '".$rs_b['b_id']."'");	
			$disMark = "";
			if($_SESSION['lang']!="th"){
				$rs_main["b_name_1_th"] = $rs_main["b_name_1_en"];
				$rs_main["b_name_2_th"] = $rs_main["b_name_2_en"];
			}
			if($rs_b["play_type"]==1){
				$choiceValue = ($rs_main["b_name_1_th"]!="" ? $rs_main["b_name_1_th"] : $rs_main["b_name_1_en"]);
				$BetKind = $lang_member[955];
				if($rs_b["b_big"]==1 && $rs_b["play_bet"]!="0"){
					$disMark = "-";
				}
			}else if($rs_b["play_type"]==2){
				$choiceValue = ($rs_main["b_name_2_th"]!="" ? $rs_main["b_name_2_th"] : $rs_main["b_name_2_en"]);
				$BetKind = $lang_member[955];
				if($rs_b["b_big"]==2 && $rs_b["play_bet"]!="0"){
					$disMark = "-";
				}
			}else if($rs_b["play_type"]==3){
				$choiceValue = $lang_member[899];
				$BetKind = $lang_member[899]."/".$lang_member[900];
			}else if($rs_b["play_type"]==4){
				$choiceValue = $lang_member[900];
				$BetKind = $lang_member[899]."/".$lang_member[900];

			}else if($rs_b["play_type"]==7){
				$choiceValue = $lang_member[805].".1";
				$BetKind = $lang_member[820];
			}else if($rs_b["play_type"]==8){
				$choiceValue = $lang_member[805].".X";
				$BetKind = $lang_member[820];
			}else if($rs_b["play_type"]==9){
				$choiceValue = $lang_member[805].".2";
				$BetKind = $lang_member[820];

			}else if($rs_b["play_type"]==5){
				$choiceValue = $lang_member[453];
				$BetKind = $lang_member[453]."/".$lang_member[459];
			}else if($rs_b["play_type"]==6){
				$choiceValue = $lang_member[459];
				$BetKind = $lang_member[453]."/".$lang_member[459];

			}else if($rs_b["play_type"]==11){
				$choiceValue = ($rs_main["b_name_1_th"]!="" ? $rs_main["b_name_1_th"] : $rs_main["b_name_1_en"]);
				$BetKind = $lang_member[895]." (".$lang_member[803].")";
				if($rs_b["b_big"]==1 && $rs_b["play_bet"]!="0"){
					$disMark = "-";
				}
			}else if($rs_b["play_type"]==12){
				$choiceValue = ($rs_main["b_name_2_th"]!="" ? $rs_main["b_name_2_th"] : $rs_main["b_name_2_en"]);
				$BetKind = $lang_member[895]." (".$lang_member[803].")";
				if($rs_b["b_big"]==2 && $rs_b["play_bet"]!="0"){
					$disMark = "-";
				}
			}else if($rs_b["play_type"]==13){
				$choiceValue = $lang_member[899];
				$BetKind = $lang_member[899]."/".$lang_member[900]." (".$lang_member[803].")";
			}else if($rs_b["play_type"]==14){
				$choiceValue = $lang_member[900];
				$BetKind = $lang_member[899]."/".$lang_member[900]." (".$lang_member[803].")";

			}else if($rs_b["play_type"]==17){
				$choiceValue = $lang_member[803].".1";
				$BetKind = $lang_member[783]."/".$lang_member[780]." (".$lang_member[803].")";
			}else if($rs_b["play_type"]==18){
				$choiceValue = $lang_member[803].".X";
				$BetKind = $lang_member[783]."/".$lang_member[780]." (".$lang_member[803].")";
			}else if($rs_b["play_type"]==19){
				$choiceValue = $lang_member[803].".2";
				$BetKind = $lang_member[783]."/".$lang_member[780]." (".$lang_member[803].")";

			}else if($rs_b["play_type"]==15){
				$choiceValue = $lang_member[453];
				$BetKind = $lang_member[453]."/".$lang_member[459]." (".$lang_member[803].")";
			}else if($rs_b["play_type"]==16){
				$choiceValue = $lang_member[459];
				$BetKind = $lang_member[453]."/".$lang_member[459]." (".$lang_member[803].")";
			}
			
			
			
		?>
        <div class="multiple <? if($rs_b[b_running]==1){ echo "Ltrbgov"; } ?>">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td class="TextStyle01 "><?=$sport_type[$rs_b["b_zone"]]?> / <?=$BetKind?></td>
                </tr>
                <tr>
                    <td class="TextStyle02  "><?=$choiceValue?></td>
                </tr>
                <tr>
                    <td class="<? if($rs["b_accept"]==2){ echo "cantext"; } ?>"><span class="TextStyle03 "><?=$disMark?><?=$rs_b["play_bet"]?></span><span class="TextStyle03">@</span><span class="UdrDogOddsClass "><?=number_format($rs_b["play_pay"],2)?></span></td>
                </tr>
                <tr>
                    <td colspan="2" class="TextStyle04 ">
                        <div style="overflow: hidden; text-overflow: ellipsis; white-space:nowrap; width: 150px;" title=""></div>
                        <div style="overflow: hidden; text-overflow: ellipsis; white-space:nowrap; width: 150px;" title=""></div>
                        <div style="overflow: hidden; text-overflow: ellipsis; white-space:nowrap; width: 150px;" title=""></div>
                   </td>
                </tr>
                <tr>
                    <td class="TextStyle04 "><?=($rs_main["b_name_1_th"]!="" ? $rs_main["b_name_1_th"] : $rs_main["b_name_1_en"]);?>-vs-<?=($rs_main["b_name_2_th"]!="" ? $rs_main["b_name_2_th"] : $rs_main["b_name_2_en"]);?>
<? if($rs_b["b_time_play"]>0){ ?><br><span class="" style="background: yellow; padding: 0px 2px;">[<?=str_replace(' ', '', $rs_b["b_score_live"])?>] <?=$rs_b["b_time_play"]?>'</span><? } ?>
                </td>
                </tr>
                <tr>
					<?
					$datep = strtotime(date("Y-m-d H:i:s", $rs_main["b_date_play"]) . "+1hour");
					?>
                    <td class="TextStyle04 TextStyle07"><?=date("d/m/Y H:i" , $datep)?></td>
                </tr>
                <tr>
                    <td class="TextStyle08 singleTicketStatus <? if($rs["b_accept"]==2){ echo "cantext"; } ?>" style="text-align: right;"><? if($rs_b[b_running]==1){ echo $lang_member[1423]; }else{ if($rs["b_accept"]==2){ echo $lang_member[1422]; }else{ echo $lang_member[956]; } } ?></td>
                </tr>
            </table>
        </div>
        <?
		}
		?>
         
        
    </div>
    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="padding-top: 5px;">
        <!--<tr>
            <td class="TextStyle01"><b> </b></td>
            <td align="right" class="TextStyle01"><b> <?=number_format($rs["b_total"])?></b></td>
        </tr>-->
        <tr>
            <td colspan="2" class="TextStyle06"><div class="left">ID:<?=$rs["bill_id"]?></div><div class="right text-ellipsis statusInfo <? if($rs["b_accept"]==2){ echo "cantext"; } ?>" style="width:100px; text-align:right; line-height:inherit;" title="<? if($rs_b[b_running]==1){ echo $lang_member[1423]; }else{ echo $lang_member[956]; } ?>"><? if($rs[b_running]==1){ echo $lang_member[1423]; }else{ if($rs["b_accept"]==2){ echo $lang_member[1422]; }else{ echo $lang_member[956]; } } ?></div></td>
        </tr>
    </table>
    </div>
</div>
<?
	}else{
		
		
		$rs_b = sql_array("select * from bom_tb_football_bill_play_live where m_id = '".$_SESSION['m_id']."' and bill_id = '".$rs['bill_id']."'");
		$disMark = "";
		/*$json_file = file_get_contents2($x_process."json/sport/lang/".$_SESSION['lang']."/".$rs_b['b_id'].".json");
		$rs_main = json_decode($json_file, true);*/
		$rs_main = sql_array_sp("select * from bom_tb_ball_list where b_id = '".$rs_b['b_id']."'");	
		$datep = strtotime(date("Y-m-d H:i:s", $rs_main["b_date_play"]) . "+1hour");
		if($_SESSION['lang']!="th"){
				$rs_main["b_name_1_th"] = $rs_main["b_name_1_en"];
				$rs_main["b_name_2_th"] = $rs_main["b_name_2_en"];
			}
		if($rs_b["play_type"]==1){
			$choiceValue = ($rs_main["b_name_1_th"]!="" ? $rs_main["b_name_1_th"] : $rs_main["b_name_1_en"]);
			$BetKind = $lang_member[955];
			if($rs_b["b_big"]==1 && $rs_b["play_bet"]!="0"){
				$disMark = "-";
			}
		}else if($rs_b["play_type"]==2){
			$choiceValue = ($rs_main["b_name_2_th"]!="" ? $rs_main["b_name_2_th"] : $rs_main["b_name_2_en"]);
			$BetKind = $lang_member[955];
			if($rs_b["b_big"]==2 && $rs_b["play_bet"]!="0"){
				$disMark = "-";
			}
		}else if($rs_b["play_type"]==3){
			$choiceValue = $lang_member[899];
			$BetKind = $lang_member[899]."/".$lang_member[900];
		}else if($rs_b["play_type"]==4){
			$choiceValue = $lang_member[900];
			$BetKind = $lang_member[899]."/".$lang_member[900];

		}else if($rs_b["play_type"]==7){
			$choiceValue = $lang_member[805].".1";
			$BetKind = $lang_member[820];
		}else if($rs_b["play_type"]==8){
			$choiceValue = $lang_member[805].".X";
			$BetKind = $lang_member[820];
		}else if($rs_b["play_type"]==9){
			$choiceValue = $lang_member[805].".2";
			$BetKind = $lang_member[820];

		}else if($rs_b["play_type"]==5){
			$choiceValue = $lang_member[453];
			$BetKind = $lang_member[453]."/".$lang_member[459];
		}else if($rs_b["play_type"]==6){
			$choiceValue = $lang_member[459];
			$BetKind = $lang_member[453]."/".$lang_member[459];

		}else if($rs_b["play_type"]==11){
			$choiceValue = ($rs_main["b_name_1_th"]!="" ? $rs_main["b_name_1_th"] : $rs_main["b_name_1_en"]);
			$BetKind = $lang_member[895]." (".$lang_member[803].")";
			if($rs_b["b_big"]==1 && $rs_b["play_bet"]!="0"){
				$disMark = "-";
			}
		}else if($rs_b["play_type"]==12){
			$choiceValue = ($rs_main["b_name_2_th"]!="" ? $rs_main["b_name_2_th"] : $rs_main["b_name_2_en"]);
			$BetKind = $lang_member[895]." (".$lang_member[803].")";
			if($rs_b["b_big"]==2 && $rs_b["play_bet"]!="0"){
				$disMark = "-";
			}
		}else if($rs_b["play_type"]==13){
			$choiceValue = $lang_member[899];
			$BetKind = $lang_member[899]."/".$lang_member[900]." (".$lang_member[803].")";
		}else if($rs_b["play_type"]==14){
			$choiceValue = $lang_member[900];
			$BetKind = $lang_member[899]."/".$lang_member[900]." (".$lang_member[803].")";

		}else if($rs_b["play_type"]==17){
			$choiceValue = $lang_member[803].".1";
			$BetKind = $lang_member[783]."/".$lang_member[780]." (".$lang_member[803].")";
		}else if($rs_b["play_type"]==18){
			$choiceValue = $lang_member[803].".X";
			$BetKind = $lang_member[783]."/".$lang_member[780]." (".$lang_member[803].")";
		}else if($rs_b["play_type"]==19){
			$choiceValue = $lang_member[803].".2";
			$BetKind = $lang_member[783]."/".$lang_member[780]." (".$lang_member[803].")";

		}else if($rs_b["play_type"]==15){
			$choiceValue = $lang_member[453];
			$BetKind = $lang_member[453]."/".$lang_member[459]." (".$lang_member[803].")";
		}else if($rs_b["play_type"]==16){
			$choiceValue = $lang_member[459];
			$BetKind = $lang_member[453]."/".$lang_member[459]." (".$lang_member[803].")";
		}

		if($rs_b["play_pay"]<0){
			$cpp = "FavOddsClassBetProcess";
		}else{
			$cpp = "UdrDogOddsClassBetProcess";
		}
		
		
if($rs_b["b_time_play"]>0){		
?>	
	<div class="BetInfo <? if($rs_b[b_running]==1){ echo "Ltrbgov"; }else{ ?><? if($rs["b_accept"]==2){ echo "canlight"; }else{ echo "bgcpe"; } ?><? } ?>"> 
  
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td colspan="2" class="TextStyle01"><?=$sport_type[$rs_b["b_zone"]]?> / <?=$BetKind?></td>
    </tr>
    <tr>
        <td colspan="0" class="FavTeamClass" onMouseMove="NumberGroupTitle(this,'1');"><?=$choiceValue?></td>
        
        <td align="right"><span  title="Score Map" onClick="javascript:popScoreMap('29628671','left');" class="iconOdds scoreMap"></span></td>
         
         
    </tr>
    <tr>
        <td nowrap class="<? if($rs["b_accept"]==2){ echo "cantext"; } ?>"><div style="overflow: hidden; text-overflow: ellipsis; white-space:nowrap; width: 120px; " title="<?=number_format($rs_b["play_pay"],2)?>">
		<span class="TextStyle03"><?=$disMark?><?=$rs_b["play_bet"]?></span>
		<span class="TextStyle03">@</span><span class="<?=$cpp?>"><?=number_format($rs_b["play_pay"],2)?></span>
		</div></td>
        <td align="right" class="TextStyle01 <? if($rs["b_accept"]==2){ echo "cantext"; } ?>"><b><?=number_format($rs["b_total"])?></b></td>
    </tr>
    <tr>
        <td colspan="2" class="TextStyle04">
            <div style="overflow: hidden; text-overflow: ellipsis; white-space:nowrap; width: 150px;" title=""></div>
            <div style="overflow: hidden; text-overflow: ellipsis; white-space:nowrap; width: 150px;" title=""></div>
            <div style="overflow: hidden; text-overflow: ellipsis; white-space:nowrap; width: 150px;" title=""></div>
        </td>
    </tr>
    <tr>
        <td colspan="2"><div class="TextStyle04"><?=($rs_main["b_name_1_th"]!="" ? $rs_main["b_name_1_th"] : $rs_main["b_name_1_en"]);?>-vs-<?=($rs_main["b_name_2_th"]!="" ? $rs_main["b_name_2_th"] : $rs_main["b_name_2_en"]);?></div>
        	<span class="" style="background: yellow; padding: 0px 2px;">[<?=str_replace(' ', '', $rs_b["b_score_live"])?>] <?=$rs_b["b_time_play"]?>'</span>
        </td>
    </tr>
    <tr>
        <td colspan="2"><div class="TextStyle04 TextStyle07"><?=date("d/m/Y H:i" , $datep)?></div></td>
    </tr>
    <tr>
        <td colspan="2" class="TextStyle06"><div class="left">ID:<?=$rs["bill_id"]?></div><div class="right statusInfo <? if($rs["b_accept"]==2){ echo "cantext"; } ?>" style="width:100px; text-align:right; line-height:inherit;" title="<? if($rs[b_running]==1){ echo $lang_member[1423]; }else{ if($rs["b_accept"]==2){ echo $lang_member[1422]; }else{ echo $lang_member[956]; } } ?>"><? if($rs_b[b_running]==1){ echo $lang_member[1423]; }else{ if($rs["b_accept"]==2){ echo $lang_member[1422]; }else{ echo $lang_member[956]; } } ?></div></td>
    </tr>
  </table>
  
   
   
</div>

<? }else{ ?>
<div class="BetInfo <? if($rs_b[b_running]==1){ echo "Ltrbgov"; }else{ ?><? if($rs["b_accept"]==2){ echo "canlight"; }else{ echo "bgcpelight"; } ?><? } ?>"> 
  
  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td colspan="2" class="TextStyle01"><?=$sport_type[$rs_b["b_zone"]]?> / <?=$BetKind?></td>
    </tr>
    <tr>
        <td colspan="0" class="FavTeamClass" onMouseMove="NumberGroupTitle(this,'1');"><?=$choiceValue?></td>
        
        <td align="right"><span  title="Score Map" onClick="javascript:popScoreMap('29463947','left');" class="iconOdds scoreMap"></span></td>
         
         
    </tr>
    <tr>
        <td nowrap class="<? if($rs["b_accept"]==2){ echo "cantext"; } ?>"><div style="overflow: hidden; text-overflow: ellipsis; white-space:nowrap; width: 110px; " title="<?=number_format($rs_b["play_pay"],2)?>">
		<span class="TextStyle03"><?=$disMark?><?=$rs_b["play_bet"]?><span class=""></span></span>
		<span class="TextStyle01"> @</span><span class="<?=$cpp?>"><?=number_format($rs_b["play_pay"],2)?></span>
		</div></td>
        <td align="right" class="TextStyle01 <? if($rs["b_accept"]==2){ echo "cantext"; } ?>"><b><?=number_format($rs["b_total"])?></b></td>
    </tr>
    <tr>
        <td colspan="2" class="TextStyle04">
            <div style="overflow: hidden; text-overflow: ellipsis; white-space:nowrap; width: 150px;" title=""></div>
            <div style="overflow: hidden; text-overflow: ellipsis; white-space:nowrap; width: 150px;" title=""></div>
            <div style="overflow: hidden; text-overflow: ellipsis; white-space:nowrap; width: 150px;" title=""></div>
        </td>
    </tr>
    <tr>
        <td colspan="2"><div class="TextStyle04"><?=($rs_main["b_name_1_th"]!="" ? $rs_main["b_name_1_th"] : $rs_main["b_name_1_en"]);?>-vs-<?=($rs_main["b_name_2_th"]!="" ? $rs_main["b_name_2_th"] : $rs_main["b_name_2_en"]);?></div></td>
    </tr>
    <tr>
        <td colspan="2"><div class="TextStyle04 TextStyle07"><?=date("d/m/Y H:i" , $datep)?></div></td>
    </tr>
    <tr>
        <td colspan="2" class="TextStyle06"><div class="left">ID:<?=$rs["bill_id"]?></div><div class="right statusInfo <? if($rs["b_accept"]==2){ echo "cantext"; } ?>" style="width:100px; text-align:right; line-height:inherit;" title="<? if($rs[b_running]==1){ echo $lang_member[1423]; }else{ if($rs["b_accept"]==2){ echo $lang_member[1422]; }else{ echo $lang_member[956]; } } ?>"><? if($rs_b[b_running]==1){ echo $lang_member[1423]; }else{ if($rs["b_accept"]==2){ echo $lang_member[1422]; }else{ echo $lang_member[956]; } } ?></div></td>
    </tr>
  </table>
  
   
   
</div>
 
	
	
<?
	} }

	$nl++;
}
if($nl==0){
	?>
<div style="padding: 4px;"><div align="center"><?=$lang_member[957]?></div><div align="center" id="lastrefresh" style="display: none">{{lbl_countDown}} : <span id="lastrefresh_time"></span></div><div align="center" id="checkStatus" style="display: none">{{lbl_checkStatus}}</div>   </div>
<script type="text/javascript">
	cccwb();
</script>
	<?
}else{
?>
<script type="text/javascript">
	$(".chkboxButton").css('width' , '65%');
    $("#wb_count").show();
	var ccwb = 5;
	ttt_wb = setInterval(function () {
		if(ccwb>0){
	   		$("#wb_count").html("Time:"+ccwb);
	   		ccwb = ccwb-1;
	   	}else{
	   		$("#refreshBetWaitList").trigger("click");
	   	}
	}, 1000);

</script>
<? } ?>