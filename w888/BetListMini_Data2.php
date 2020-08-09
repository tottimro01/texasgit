<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?

require('inc/conn.php');
require('inc/function.php');
// require("lang/member_lang.php");
require("lang/variable_lang.php");
require("lang/function_array.php");

?>
<html>
<head>
<!-- 取消iOS自動添加電話號碼(連續數字)樣式與連結 -->
<meta name="format-detection" content="telephone=no" />
<title></title>
<script type="text/javascript">
	function ReturnData(){
		var staDate = new Date();
		if(document.all){
			parent.document.getElementById('BetListMiniContainer').innerHTML=document.body.innerHTML;
		<? if($_GET["showBetAcceptedMsg"]=="yes"){ ?>
			parent.showBetAcceptedMsg('<?=$lang_member[953];?>');
		<? } ?>
		}else{		
			replaceHtml('BetListMiniContainer',document.body.innerHTML);
			
			<? if($_GET["showBetAcceptedMsg"]=="yes"){ ?>
			parent.showBetAcceptedMsg('<?=$lang_member[953];?>');
			<? } ?>
		}
		parent.refreshAccountInfo('mini');
	}

	function replaceHtml(el, html) {
	    var oldEl = typeof el == "string" ? parent.document.getElementById(el) : el;
	    var newEl = oldEl.cloneNode(false);
	    newEl.innerHTML = html;
	    oldEl.parentNode.replaceChild(newEl, oldEl);
	    return newEl;
	}
</script>
</head>
<body onLoad="ReturnData();">

<?
	$sql = sql_query("select * from bom_tb_football_bill_live where m_id = '".$_SESSION['m_id']."' order by bill_id desc limit 5");
	while($rs=sql_fetch($sql)){
		if($rs["b_numstep"]>1){
?>

<div id="BetWaitList_<?=$rs['bill_id']?>">        		
   	<input type="checkbox" class="chkCollapseBetWaitList" id="chkCollapseBetWaitList_<?=$rs['bill_id']?>" onchange="javascript:ComboDataDisplay(<?=$rs['bill_id']?>);" />
   	<label class="BetWaitListHeader" for="chkCollapseBetWaitList_<?=$rs['bill_id']?>">
   		<span>บอลชุด</span>
   	</label>
   	<div id="BetWaitListTable">
   		<table cellpadding="0" cellspacing="4" width="100%" style="table-layout: fixed;">
    	  <tr>
    	    <td style="color: #b50000;" colspan="2"><b><?=$rs["b_numstep"]?>-<?=$lang_member[954];?> (1 <?=$lang_member[300];?>)</b></td>
    	    <td align="right"><b><?=number_format($rs["b_total"])?></b></td>
    	  </tr>
    	  <tr>
    	  	<td colspan="3"><b>@<?=number_format($rs["b_sum_pay"],4)?></b></td>
    	  </tr>
			
		  <tr class="BetWaitListDetailsRow">
      	   	<td colspan="3">
      	   		<div class="BetWaitListDetails">
   		  			<hr />
   		  <?
				$sql_b = sql_query("select * from bom_tb_football_bill_play_live where m_id = '".$_SESSION['m_id']."' and bill_id = '".$rs['bill_id']."'");
					while($rs_b=sql_fetch($sql_b)){
					
					//$json_file = file_get_contents2($x_process."json/sport/lang/".$_SESSION['lang']."/".$rs_b['b_id'].".json");
					//$rs_main = json_decode($json_file, true);
					$rs_main = sql_array_sp("select * from bom_tb_ball_list where b_id = '".$rs_b['b_id']."'");
					
					if($rs_b["play_type"]==1){
						$choiceValue = ($rs_main["b_name_1_th"]!="" ? $rs_main["b_name_1_th"] : $rs_main["b_name_1_en"]);
						$BetKind = $lang_member[955];
					}else if($rs_b["play_type"]==2){
						$choiceValue = ($rs_main["b_name_2_th"]!="" ? $rs_main["b_name_2_th"] : $rs_main["b_name_2_en"]);
						$BetKind = $lang_member[955];

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
					}else if($rs_b["play_type"]==12){
						$choiceValue = ($rs_main["b_name_2_th"]!="" ? $rs_main["b_name_2_th"] : $rs_main["b_name_2_en"]);
						$BetKind = $lang_member[895]." (".$lang_member[803].")";

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
   		  			<div style="line-height: 1.5;">
   		  				<div><b><?=$arr_sp_zone[$rs_b["b_type"]]?> / <?=$BetKind?></b></div>
   		  				<div><span><?=$choiceValue?></span></div>
   		  				<div><b><span style="color: #606060;"><?=$rs_b["play_bet"]?></span>@<span><?=$rs_b["play_pay"]?></span></b></div>
   		  				<div><span><?=($rs_main["b_name_1_th"]!="" ? $rs_main["b_name_1_th"] : $rs_main["b_name_1_en"]);?>-vs-<?=($rs_main["b_name_2_th"]!="" ? $rs_main["b_name_2_th"] : $rs_main["b_name_2_en"]);?></span></div>
   		  				<? $datep = strtotime(date("Y-m-d H:i:s", $rs_main["b_date_play"]) . "+1hour"); ?>
   		  				<div><span><?=date("m/d/Y g:i A" , $datep)?></span></div>
   		  				<div><span><?=$lang_member[956];?></span></div>
   		  			</div>
   		  			<br />
   		  		<?	} ?>
   		  		</div>
      	   	</td>
      	  </tr>

    	  <tr>
      		<td colspan="3" align="right"><span><?=number_format($rs["b_total"])?></span></td>
      	  </tr>
      	  <tr>
      	    <td><span>ID: <?=$rs["bill_id"]?></span></td>
      	    <td align="right" style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;" colspan="2"><span><?=$lang_member[956];?></span></td>
      	  </tr>
    	</table>
    </div>
</div>
     

<?
	}else{
		
		
		$rs_b = sql_array("select * from bom_tb_football_bill_play_live where m_id = '".$_SESSION['m_id']."' and bill_id = '".$rs['bill_id']."'");

		/*$json_file = file_get_contents2($x_process."json/sport/lang/".$_SESSION['lang']."/".$rs_b['b_id'].".json");
		$rs_main = json_decode($json_file, true);*/
		$rs_main = sql_array_sp("select * from bom_tb_ball_list where b_id = '".$rs_b['b_id']."'");	
			
		if($rs_b["play_type"]==1){
			$choiceValue = ($rs_main["b_name_1_th"]!="" ? $rs_main["b_name_1_th"] : $rs_main["b_name_1_en"]);
			$BetKind = $lang_member[955];
		}else if($rs_b["play_type"]==2){
			$choiceValue = ($rs_main["b_name_2_th"]!="" ? $rs_main["b_name_2_th"] : $rs_main["b_name_2_en"]);
			$BetKind = $lang_member[955];

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
		}else if($rs_b["play_type"]==12){
			$choiceValue = ($rs_main["b_name_2_th"]!="" ? $rs_main["b_name_2_th"] : $rs_main["b_name_2_en"]);
			$BetKind = $lang_member[895]." (".$lang_member[803].")";

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
<div id="BetWaitList_<?=$rs['bill_id']?>">        		
   	<input type="checkbox" class="chkCollapseBetWaitList" id="chkCollapseBetWaitList_<?=$rs['bill_id']?>" onchange="javascript:ComboDataDisplay(<?=$rs['bill_id']?>);" />
   	<label class="BetWaitListHeader" for="chkCollapseBetWaitList_<?=$rs['bill_id']?>">
   		<span>บอลเต็ง</span>
   	</label>
   	<div id="BetWaitListTable">
   		<table cellpadding="0" cellspacing="4" width="100%" style="table-layout: fixed;">
    	  <tr>
    	    <td style="color: #b50000;" colspan="2"><b><?=$rs["b_numstep"]?>-<?=$lang_member[954];?> <i>(1 <?=$lang_member[300];?>)</i></b></td>
    	    <td align="right"><b><?=number_format($rs["b_total"])?></b></td>
    	  </tr>
    	  <tr>
    	  	<td colspan="3"><b>@<?=number_format($rs["b_sum_pay"],4)?></b></td>
    	  </tr>
			
		  <tr class="BetWaitListDetailsRow">
      	   	<td colspan="3">
      	   		<div class="BetWaitListDetails">
   		  			<hr />
   		  			<div style="line-height: 1.5;">
   		  				<div><b><?=$arr_sp_zone[$rs_b["b_type"]]?> / <?=$BetKind?></b></div>
   		  				<div>
   		  					<span onMouseMove="NumberGroupTitle(this,'1');"><?=$choiceValue?></span>
   		  					<span title="Score Map" onClick="javascript:popScoreMap('29463947','left');" class="iconOdds scoreMap"></span>
   		  				</div>
   		  				<div><b><span style="color: #606060;"><?=$rs_b["play_bet"]?></span>@<span><?=$rs_b["play_pay"]?></span></b></div>
   		  				<div style="text-align: right;"><b><?=number_format($rs["b_total"])?></b></div>
   		  				<div><span><?=($rs_main["b_name_1_th"]!="" ? $rs_main["b_name_1_th"] : $rs_main["b_name_1_en"]);?>-vs-<?=($rs_main["b_name_2_th"]!="" ? $rs_main["b_name_2_th"] : $rs_main["b_name_2_en"]);?></span></div>
   		  				<div><span><?=$lang_member[956];?></span></div>
   		  			</div>
   		  			<br />
   		  		</div>
   		  	</td>
   		  </tr>
   		 </table>
   	</div>
</div>

	
 
	
	
<?
	}
}
?>







</body>
</html>