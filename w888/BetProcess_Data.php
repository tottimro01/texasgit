<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?

require('inc/conn.php');
require('inc/function.php');

// require("lang/member_lang.php");
require("lang/variable_lang.php");
require("lang/function_array.php");

$oddsType = $_GET['OddsType'];


$b = explode("_", $_GET['bp_Match']);

$sport_type_id = $b[0];
$sport_home_away = $b[1];
$sport_nam_select = $b[2];
$sport_type_select = $b[3];

if($b[3]==1){
	$sport_type_select = 1; //FT.HDP
	$BetKind = $lang_member[955];
}else if($b[3]==3){
	$sport_type_select = 2; //FT.O/U
	$BetKind = $lang_member[899]."/".$lang_member[900];
}else if($b[3]==5){
	$sport_type_select = 3; //FT.1X2
	$BetKind = $lang_member[820];
}else if($b[3]==2){
	$sport_type_select = 4; //FT.Odd/Even
	$BetKind = $lang_member[453]."/".$lang_member[459];
}else if($b[3]==7){
	$sport_type_select = 5; //1H.HDP
	$BetKind = $lang_member[895]." (".$lang_member[803].")";
}else if($b[3]==8){
	$sport_type_select = 6; //1H.O/U
	$BetKind = $lang_member[899]."/".$lang_member[900]." (".$lang_member[803].")";
}else if($b[3]==15){
	$sport_type_select = 7; //1H.1X2
	$BetKind = $lang_member[783]."/".$lang_member[780]." (".$lang_member[803].")";
}else if($b[3]==12){
	$sport_type_select = 8; //1H.Odd/Even
	$BetKind = $lang_member[453]."/".$lang_member[459]." (".$lang_member[803].")";
}else if($b[3]==20){
	$sport_type_select = 3; //ทายผลผู้ชนะหรือทีมที่ชนะ
	$BetKind = $lang_member[908];
}

$rs_b = sql_array_sp("select * from bom_tb_ball_list where id_type_".$sport_type_select." = '$sport_type_id'");
//$rs_main = sql_array_sp("select * from bom_tb_ball_list where b_id = '$rs_b[b_id]' order by b_add asc");
if(count($rs_b)>0){
	$SportKind = $arr_sp_zone[$rs_b["b_zone"]];

	$json_file = file_get_contents2($x_process."json/sport/lang/".$_SESSION['lang']."/".$rs_b['b_id'].".json");
	$rs_main = json_decode($json_file, true);


	if($sport_home_away=="h" and $sport_type_select==1){
		$sport_nam_now = $rs_b["b_hdc_1"];
		$choiceValue = $rs_main["h"];
		$BetKindValue = $rs_b["b_hdc"];
	}else if($sport_home_away=="a" and $sport_type_select==1){
		$sport_nam_now = $rs_b["b_hdc_2"];
		$choiceValue = $rs_main["a"];
		$BetKindValue = $rs_b["b_hdc"];

	}else if($sport_home_away=="h" and $sport_type_select==2){
		$sport_nam_now = $rs_b["b_goal_1"];
		$choiceValue = $lang_member[899];
		$BetKindValue = $rs_b["b_goal"];
	}else if($sport_home_away=="a" and $sport_type_select==2){
		$sport_nam_now = $rs_b["b_goal_2"];
		$choiceValue = $lang_member[900];
		$BetKindValue = $rs_b["b_goal"];

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
	}else if($sport_home_away=="a" and $sport_type_select==4){
		$sport_nam_now = $rs_b["b_even"];
		$choiceValue = $lang_member[459];
		$BetKindValue = "";

	}else if($sport_home_away=="h" and $sport_type_select==5){
		$sport_nam_now = $rs_b["b_1h_hdc_1"];
		$choiceValue = $rs_main["h"];
		$BetKindValue = $rs_b["b_1h_hdc"];
	}else if($sport_home_away=="a" and $sport_type_select==5){
		$sport_nam_now = $rs_b["b_1h_hdc_2"];
		$choiceValue = $rs_main["a"];
		$BetKindValue = $rs_b["b_1h_hdc"];

	}else if($sport_home_away=="h" and $sport_type_select==6){
		$sport_nam_now = $rs_b["b_1h_goal_1"];
		$choiceValue = $lang_member[899];
		$BetKindValue = $rs_b["b_1h_goal"];
	}else if($sport_home_away=="a" and $sport_type_select==6){
		$sport_nam_now = $rs_b["b_1h_goal_2"];
		$choiceValue = $lang_member[900];
		$BetKindValue = $rs_b["b_1h_goal"];

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
	}else if($sport_home_away=="a" and $sport_type_select==8){
		$sport_nam_now = $rs_b["b_1h_even"];
		$choiceValue = $lang_member[459];
		$BetKindValue = "";
	}


	$sport_nam_now = convert_nam($sport_nam_now , $oddsType);


	if($sport_nam_select=="ParlayToSingle"){
		$sport_nam_select = $sport_nam_now;
	}



	if(floatval($sport_nam_now)!=floatval($sport_nam_select)){
		$oddsVal = $sport_nam_now;
		$betChange = 1;
	}else{
		$oddsVal = $sport_nam_select;
		$betChange = "";
	}


	if($sport_type_select==1){
		if($rs_b["b_big"]==1 and $sport_home_away=="h"){
			$ChoiceClass = "FavTeamClass";
			if($_GET["bp_ssport"]==44){
				$ChoiceClass .= " player-red";
			}
		}else if($rs_b["b_big"]==1 and $sport_home_away=="a"){
			$ChoiceClass = "UdrDogTeamClass";
			if($_GET["bp_ssport"]==44){
				$ChoiceClass .= " player-blue";
			}
		}else if($rs_b["b_big"]==2 and $sport_home_away=="h"){
			$ChoiceClass = "UdrDogTeamClass";
			if($_GET["bp_ssport"]==44){
				$ChoiceClass .= " player-red";
			}
		}else if($rs_b["b_big"]==2 and $sport_home_away=="a"){
			$ChoiceClass = "FavTeamClass";
			if($_GET["bp_ssport"]==44){
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

	if($oddsVal<0){
		$OddsColor = "FavOddsClassBetProcess";
	}else{
		$OddsColor = "UdrDogOddsClassBetProcess";
	}
}
?>
<script type="text/javascript" >
	
	//console.log("<?="select * from bom_tb_ball_list where b_id = '$rs_b[b_id]' order by b_add asc"?>");
	
var Data={
'lblSportKind':"<?=$SportKind?>",
'lblBetKind':"<?=$BetKind?>",
'lblHome':"<?=$rs_main["h"]?>", 
'lblAway':"<?=$rs_main["a"]?>",
'lblMatchCode':'',
'lblLeaguename':'<?=$rs_main["z"]?>',
'lblBetKindValue':'<?=$BetKindValue?>',
'lblOddsValue':'<?=$oddsVal;?>',
'lblPlaceOddsValue':'{{lblPlaceOddsValue}}',
'lblOddsColor':'<?=$OddsColor?>',
'lblScore':'',
'lblScoreValue':'',
//'lblScore':'สกอร์ ',
//'lblScoreValue':'[การแข่งขันสด]',
'hideTicketBox':'',
'liveBgColor':'#FFFFFF',
//'liveBgColor':'#FFCCBC',
'lblChoiceClass':"<?=$ChoiceClass?>",
'lblChoiceValue':'<?=$choiceValue?>',
'lblMinBetValue':'100',
'hiddenStakeRequest':'',
'hiddenOddsRequest':'<?=$sport_nam_select;?>',
'hiddenMinBet':'100',
'hiddenMaxBet':'98,280',
'hiddenBetType':'1',
'lblMaxBetValue':'98,280',
'lbloddsStatus':'running',
'lbloddsStatusClass':'',
'lblhdp1Value':'0',
'lblhdp2Value':'0',
'lblLiveScoreH':'0',
'lblLiveScoreA':'0',
'lblReadyOnly':'',
'lblhedgeBox':'none',
'hiddenliveIndicator':'0',
'hiddenSportType':'<?=$_GET["bp_ssport"]?>',
'imgHorseJockey':'',
'chk_BettingChange':'<?=$betChange;?>',
'hiddenOddsType':'4',
'hiddenBetKey':'<?=$sport_type_id?>_<?=$sport_home_away?>',
'lblAutoAccept':'',
'lblAcceptBetterOdds':'1',
'confirmMode':'{{confirmMode}}',
'matchid':'<?=$rs_main["b_id"]?>',
'OddsStakeChg':'0',
'HasScoreMap':'0',
'isAutoLoad':'',
'singleBetData':"",
'haveparlay':"false",
'haveparlaylist':"0",
'inParlayList':"false",
'lblBetPercentageValue':"",
'lblBetAOSValue':""
};
parent.SetBetProcessData(Data);
if (false)
{
    parent.OpenMask();
    parent.updateMultiTitle();
    parent.FocusInputBox(); 
}
</script>
