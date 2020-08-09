<?php   ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
require('inc/conn.php');
require('inc/function.php');

// require("lang/member_lang.php");
  require("lang/variable_lang.php");
require("lang/function_array.php");

$b_id = $_POST["e"];
$id_type = $_POST["t"];
$sport_home_away = $_POST["a"];
$sport_nam_select = $_POST["r"];
$num_id = $_POST["d"];
$oddsType = $_POST['Odds_type'];
$blink = $_POST['b'];
$oid = $_POST['i'];

$sql="select * from bom_tb_member where m_id='".$_SESSION['m_id']."'";
$re_m=sql_array($sql);

$rs_b = sql_array_sp("select * from bom_tb_ball_list where id_type_".$num_id." = '$id_type' and b_id = '$b_id'");
if($_SESSION['lang']!="th"){
	$rs_b["b_name_1_th"] = $rs_b["b_name_1_en"];
	$rs_b["b_name_2_th"] = $rs_b["b_name_2_en"];
	$rs_b["b_zone_th"] = $rs_b["b_zone_en"];
}

$SportKind = $sport_type[$rs_b["b_zone"]];

if($num_id==1){
	$sport_type_select = 1; //FT.HDP
	$BetKind = $lang_member[955];
}else if($num_id==2){
	$sport_type_select = 2; //FT.O/U
	$BetKind = $lang_member[899]."/".$lang_member[900];
}else if($num_id==3){
	$sport_type_select = 3; //FT.1X2
	$BetKind = $lang_member[820];
	$oddsType = 1;
}else if($num_id==4){
	$sport_type_select = 4; //FT.Odd/Even
	$BetKind = $lang_member[453]."/".$lang_member[459];
}else if($num_id==5){
	$sport_type_select = 5; //1H.HDP
	$BetKind = $lang_member[955]." (".$lang_member[803].")";
}else if($num_id==6){
	$sport_type_select = 6; //1H.O/U
	$BetKind = $lang_member[899]."/".$lang_member[900]." (".$lang_member[803].")";
}else if($num_id==7){
	$sport_type_select = 7; //1H.1X2
	$BetKind = $lang_member[820]." (".$lang_member[803].")";
	$oddsType = 1;
}else if($num_id==8){
	$sport_type_select = 8; //1H.Odd/Even
	$BetKind = $lang_member[453]."/".$lang_member[459]." (".$lang_member[803].")";
}

$disMark = "";
	if($sport_home_away=="h" and $sport_type_select==1){
		$sport_nam_now = $rs_b["b_hdc_1"];
		$choiceValue = ($rs_b["b_name_1_th"]!="" ? $rs_b["b_name_1_th"] : $rs_b["b_name_1_en"]);
		$BetKindValue = $rs_b["b_hdc"];
		if($rs_b["b_big"]==1 && $BetKindValue!="0"){
			$disMark = "-";
		}
		$sport_nam_now = convert_nam($sport_nam_now , $oddsType);
	}else if($sport_home_away=="a" and $sport_type_select==1){
		$sport_nam_now = $rs_b["b_hdc_2"];
		$choiceValue = ($rs_b["b_name_2_th"]!="" ? $rs_b["b_name_2_th"] : $rs_b["b_name_2_en"]);
		$BetKindValue = $rs_b["b_hdc"];
		if($rs_b["b_big"]==2 && $BetKindValue!="0"){
			$disMark = "-";
		}
		$sport_nam_now = convert_nam($sport_nam_now , $oddsType);
	}else if($sport_home_away=="h" and $sport_type_select==2){
		$sport_nam_now = $rs_b["b_goal_1"];
		$choiceValue = $lang_member[899];
		$BetKindValue = $rs_b["b_goal"];
		$sport_nam_now = convert_nam($sport_nam_now , $oddsType);
	}else if($sport_home_away=="a" and $sport_type_select==2){
		$sport_nam_now = $rs_b["b_goal_2"];
		$choiceValue = $lang_member[900];
		$BetKindValue = $rs_b["b_goal"];
		$sport_nam_now = convert_nam($sport_nam_now , $oddsType);
	}else if($sport_home_away=="1" and $sport_type_select==3){
		$sport_nam_now = $rs_b["b_1x2_1"];
		$choiceValue = $lang_member[805].".1";
		$BetKindValue = "";
	}else if($sport_home_away=="X" and $sport_type_select==3){
		$sport_nam_now = $rs_b["b_1x2_x"];
		$choiceValue = $lang_member[805].".X";
		$BetKindValue = "";
	}else if($sport_home_away=="2" and $sport_type_select==3){
		$sport_nam_now = $rs_b["b_1x2_2"];
		$choiceValue = $lang_member[805].".2";
		$BetKindValue = "";
	}elseif($sport_home_away=="h" and $sport_type_select==3){
		$sport_nam_now = $rs_b["b_1x2_1"];
		$choiceValue = $rs_main["h"];
		$BetKindValue = "";
	}else if($sport_home_away=="a" and $sport_type_select==3){
		$sport_nam_now = $rs_b["b_1x2_2"];
		$choiceValue = $rs_main["a"];
		$BetKindValue = "";
	}else if($sport_home_away=="h" and $sport_type_select==4){
		$sport_nam_now = $rs_b["b_odd"];
		$choiceValue = $lang_member[453];
		$BetKindValue = "";
		$sport_nam_now = convert_nam($sport_nam_now , $oddsType);
	}else if($sport_home_away=="a" and $sport_type_select==4){
		$sport_nam_now = $rs_b["b_even"];
		$choiceValue = $lang_member[459];
		$BetKindValue = "";
		$sport_nam_now = convert_nam($sport_nam_now , $oddsType);
	}else if($sport_home_away=="h" and $sport_type_select==5){
		$sport_nam_now = $rs_b["b_1h_hdc_1"];
		$choiceValue = ($rs_b["b_name_1_th"]!="" ? $rs_b["b_name_1_th"] : $rs_b["b_name_1_en"]);
		$BetKindValue = $rs_b["b_1h_hdc"];
		if($rs_b["b_1h_big"]==1 && $BetKindValue!="0"){
			$disMark = "-";
		}
		$sport_nam_now = convert_nam($sport_nam_now , $oddsType);
	}else if($sport_home_away=="a" and $sport_type_select==5){
		$sport_nam_now = $rs_b["b_1h_hdc_2"];
		$choiceValue = ($rs_b["b_name_2_th"]!="" ? $rs_b["b_name_2_th"] : $rs_b["b_name_2_en"]);
		$BetKindValue = $rs_b["b_1h_hdc"];
		if($rs_b["b_1h_big"]==2 && $BetKindValue!="0"){
			$disMark = "-";
		}
		$sport_nam_now = convert_nam($sport_nam_now , $oddsType);
	}else if($sport_home_away=="h" and $sport_type_select==6){
		$sport_nam_now = $rs_b["b_1h_goal_1"];
		$choiceValue = $lang_member[899];
		$BetKindValue = $rs_b["b_1h_goal"];
		$sport_nam_now = convert_nam($sport_nam_now , $oddsType);
	}else if($sport_home_away=="a" and $sport_type_select==6){
		$sport_nam_now = $rs_b["b_1h_goal_2"];
		$choiceValue = $lang_member[900];
		$BetKindValue = $rs_b["b_1h_goal"];
		$sport_nam_now = convert_nam($sport_nam_now , $oddsType);
	}else if($sport_home_away=="1" and $sport_type_select==7){
		$sport_nam_now = $rs_b["b_1h_1x2_1"];
		$choiceValue = $lang_member[803].".1";
		$BetKindValue = "";
	}else if($sport_home_away=="X" and $sport_type_select==7){
		$sport_nam_now = $rs_b["b_1h_1x2_x"];
		$choiceValue = $lang_member[803].".X";
		$BetKindValue = "";
	}else if($sport_home_away=="2" and $sport_type_select==7){
		$sport_nam_now = $rs_b["b_1h_1x2_2"];
		$choiceValue = $lang_member[803].".2";
		$BetKindValue = "";

	}else if($sport_home_away=="h" and $sport_type_select==8){
		$sport_nam_now = $rs_b["b_1h_odd"];
		$choiceValue = $lang_member[453];
		$BetKindValue = "";
		$sport_nam_now = convert_nam($sport_nam_now , $oddsType);
	}else if($sport_home_away=="a" and $sport_type_select==8){
		$sport_nam_now = $rs_b["b_1h_even"];
		$choiceValue = $lang_member[459];
		$BetKindValue = "";
		$sport_nam_now = convert_nam($sport_nam_now , $oddsType);
	}


	if($sport_type_select==1){
		if($rs_b["b_big"]==1 and $sport_home_away=="h"){
			$ChoiceClass = "FavTeamClass";
			if($rs_b["b_zone"]==44){
				$ChoiceClass .= " player-red";
			}
		}else if($rs_b["b_big"]==1 and $sport_home_away=="a"){
			$ChoiceClass = "UdrDogTeamClass";
			if($rs_b["b_zone"]==44){
				$ChoiceClass .= " player-blue";
			}
		}else if($rs_b["b_big"]==2 and $sport_home_away=="h"){
			$ChoiceClass = "UdrDogTeamClass";
			if($rs_b["b_zone"]==44){
				$ChoiceClass .= " player-red";
			}
		}else if($rs_b["b_big"]==2 and $sport_home_away=="a"){
			$ChoiceClass = "FavTeamClass";
			if($rs_b["b_zone"]==44){
				$ChoiceClass .= " player-blue";
			}
		}
	}else if($sport_type_select==5){
		if($rs_b["b_1h_big"]==1 and $sport_home_away=="h"){
			$ChoiceClass = "FavTeamClass";
		}else if($rs_b["b_1h_big"]==1 and $sport_home_away=="a"){
			$ChoiceClass = "UdrDogTeamClass";
		}else if($rs_b["b_1h_big"]==2 and $sport_home_away=="h"){
			$ChoiceClass = "UdrDogTeamClass";
		}else if($rs_b["b_1h_big"]==2 and $sport_home_away=="a"){
			$ChoiceClass = "FavTeamClass";
		}
	}else{
		$ChoiceClass = "FavTeamClass";
	}

	$sport_nam_now = _mtr($sport_nam_now ,$oddsType,($_SESSION["m_nam"]=="" ? "0" : $_SESSION["m_nam"]));

	if(number_format(floatval($sport_nam_now),2)!=number_format(floatval($sport_nam_select),2)){

		$oddsVal = $sport_nam_now;
		$betChange = "";
	}else{
		$oddsVal = $sport_nam_select;
		$betChange = "display: none;";
	}

	if($oddsVal<0){
		$OddsColor = "FavOddsClassBetProcess";
	}else{
		$OddsColor = "UdrDogOddsClassBetProcess";
	}
?>
<iframe name="ifmConfirmBet" id="ifmConfirmBet" src="" style="display:none"></iframe>
    <form name="fomConfirmBet" method="post" target="ifmConfirmBet" autocomplete="off" action="underover/confirm_bet_data.php">
      <div id="BP_SPORT" style="">
        <div class="leftBoxbody">
          <div class="boxbg">
            <div id="BetInfo" class="BetInfo <? if($rs_b["b_live"]>0){ echo "liveligh"; } ?>">
              <div class="TextStyle01 pad"><span id="menuTitle"><?=$SportKind?> / </span> <span id="tdBetKind" height="=27"><?=$BetKind?></span></div>
              <div id="trOddsInfo">
                <div id="tdLiveBgColor" class="bet <?=$blink?>">
                  <div class="pad"><span id="spChoiceClass" class="<?=$ChoiceClass?>"><?=$choiceValue?></span><br>
                    <span id="sbBetKindValue" class="TextStyle03"><?=$disMark?><?=$BetKindValue?></span> <span id="spScoreValue" class="TextStyle01"><? if($rs_b["b_live"]>0){ echo "[".$rs_b["b_run_score_full"]."]"; } ?></span> <span class="TextStyle03">@</span> <span id="bodds" class="<?=$OddsColor?> <?=$oid?>"><?=$oddsVal?></span></div>
                    <div id="sbBetAOSValue" class=""></div>
                </div>
                
              </div>

              <div class="TextStyle04 pad"><div id="spHome_id"><span id="spHome"><?=($rs_b["b_name_1_th"]!="" ? $rs_b["b_name_1_th"] : $rs_b["b_name_1_en"])?></span></div> <div id="spAway_id"><span id="spAway"><?=($rs_b["b_name_2_th"]!="" ? $rs_b["b_name_2_th"] : $rs_b["b_name_2_en"])?></span></div><div id="spMatchCode_id"><span id="spMatchCode"></span></div>
                <div id="ot_dvChoiceValue_id" style="display: none;"><span id="ot_dvChoiceValue" style="display: none;"></span></div>
                <div id="spLeaguename_id" class="TextStyle07"><span id="spLeaguename"><?=($rs_b["b_zone_th"]!="" ? $rs_b["b_zone_th"] : $rs_b["b_zone_en"])?></span></div>
              </div>

                 </div>

                  <div id="divKeepOdds">
				
            <div class="line mag"></div>
            </div>

              <div class="Currency pad mag"><?=$re_m["m_currency"]?>
                <span class="deleteicon"><input id="BPstake" name="BPstake" type="text" size="10" class="deletable" style="ime-mode:disabled" onkeydown="validateOnKD('BPstake', event)" onkeypress="return(validateOnKP(this, event,this.selectionStart));" onkeyup="payOutOnKU(document.getElementById('BPstake'), event)" autocomplete="off" onpaste="return false;"><span onclick="deleteicon();"></span></span>
                <div id="BPMinMaxBetAlert" class="tips" style="display:none">
                <div class="content info"></div>
                </div>
              </div>
   
              <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabstyle02">
                <tbody><tr id="trlPayOut">
                  <th nowrap="nowrap" width="10px"><?=$lang_member[930]?></th>
                  <td>&nbsp;<span id="payOut"></span><span id="scoremap" class="iconOdds scoreMap right" title="Score Map" style="display: block;"></span></td>
                </tr>
                <?
                $ex_max = explode("," , $re_m["m_sport_max"]);
                $ex_min = explode("," , $re_m["m_sport_min"]);
                if($rs_b["b_zone"]==1){
                	$max_txt = $ex_max[8];
                	$min_txt = $ex_min[4];
                }else if($rs_b["b_zone"]==6){
                	if($sport_type_select>=5 and $sport_type_select<=8){
                		$max_txt = $ex_max[3];
                		$min_txt = $ex_min[1];
                	}else{
                		$max_txt = $ex_max[4];
                		$min_txt = $ex_min[2];
                	}
                }else{
                	$max_txt = $ex_max[6];
                	$min_txt = $ex_min[3];
                }
                if($max_txt>$re_m["m_count"]){
                	$max_txt = $re_m["m_count"];
                }
                ?>
                <tr>
                  <th nowrap="nowrap"><?=$lang_member[379]?></th>
                  <td id="tdBetprocessMinBet" class="MinBet"><?=$re_m["m_currency"]?>&nbsp;<span id="spMinBetValue"><?=number_format($min_txt)?></span></td>
                </tr>
                <tr>
                  <th nowrap="nowrap"><?=$lang_member[934]?></th>
                  <td id="tdBetprocessMaxBet" nowrap="nowrap" class="MaxBet"><?=$re_m["m_currency"]?>&nbsp;<span id="spMaxBetValue"><?=number_format($max_txt)?></span></td>
                </tr>
              </tbody></table>
         
            <div class="BetProcessBtnBox">
              <div id="divAutoAccept" class="mag" style="display: none;"><span id="btnAutoAccept" style="display: none;"><span name="btnAutoAccept"></span></span>
                <input id="cbAutoAccept" name="cbAutoAccept" type="checkbox" value="1" style="display:none">
              </div>
              <div style="display:none"><input name="btnBPSubmit" type="text" class="Graybutton" value="<?=$lang_member[931]?>"></div>
              <a id="btnBPSubmit" style="cursor:pointer;" type="submit" class="button mark" title="<?=$lang_member[931]?>"><span onclick="betSubmit('click');"><?=$lang_member[931]?></span></a> 
              <a style="cursor:pointer;" type="button" onclick="javascript:ReloadWaitingBetListx('yes','no','1');" class="button" title="<?=$lang_member[65]?>"><span><?=$lang_member[65]?></span></a> </div>
                <div id="BPOddsChangeAlert" class="tips box" style="<?=$betChange?>">
                <div class="content info"><?=$lang_member[935]?> <em id="oc_1"><?=$sport_nam_select?></em> <?=$lang_member[936]?> <em id="oc_2"<?=$sport_nam_now?></em></div>
                </div>
          </div>
        </div>
  <div class="leftBoxFoot"></div>
      <div class="Backmenu"><span class="icon-arrow"></span><a href="javascript:ReloadWaitingBetListx('yes','no','1');"><?=$lang_member[923]?></a></div>
      </div>
      <input type="hidden" id="MINBET" name="MINBET" value="<?=number_format($min_txt)?>"  />
      <input type="hidden" id="MAXBET" name="MAXBET" value="<?=number_format($max_txt)?>"  />
      <input type="hidden" id="bettype" name="bettype" value="1"  />
      <input type="hidden" id="lowerminmesg" name="lowerminmesg" value="<?=$lang_member[919];?>" />
      <input type="hidden" id="highermaxmesg" name="highermaxmesg" value="<?=$lang_member[920];?>" />
      <input type="hidden" id="areyousuremesg" name="areyousuremesg" value="<?=$lang_member[917];?>" />
      <input type="hidden" id="areyousuremesg1" name="areyousuremesg1" value="Your previous bet is still processing, are you sure you want to bet ?">
      <input type="hidden" id="siteType" name="siteType" value="">
      <input type="hidden" id="oddsType" name="oddsType" value="<?=$oddsType?>">
      <input type="hidden" id="BPBetKey" name="BPBetKey" value="<?=$id_type?>_<?=$sport_home_away?>">
      <input type="hidden" id="chk_addToParlay" onclick="SingleToParlay();">
      <input type="hidden" id="sporttype" name="sporttype" value="1">
      <input type="hidden" id="incorrectStakeMesg" name="incorrectStakeMesg" value="<?=$lang_member[947];?>" />
      <input type="hidden" id="oddsWarning" name="oddsWarning" value="<?=$lang_member[942];?>" />
      <input type="hidden" id="betconfirmmesg" name="betconfirmmesg" value="<?=$lang_member[943];?>" />
      <input type="hidden" name="username" value="<?=$_SESSION["m_user"]?>" />
    </form>

      <script>
      	function deleteicon(){
      		$('input.deletable').val('').focus();
      		$('#payOut').html('');
      	}
    /*$(document).ready(function() {
      $('input.deletable').wrap('<span class="deleteicon" />').after($('<span/>').click(function() {
        $(this).prev('input').val('').focus();
      }));
    });*/
</script>