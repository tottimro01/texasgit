<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?

require('../inc/conn.php');
require('../inc/function.php');

require("../lang/member_lang.php");
require("../lang/function_array.php");


$MId = $_POST["MId"];
$OddsId = $_POST["OddsId"];
$Team = $_POST["Team"];
$Odds = $_POST["Odds"];




$arr_busket = array();
$arr_busket["MId"] = $MId;
$arr_busket["OddsId"] = $OddsId;
$arr_busket["Team"] = $Team;
$arr_busket["Odds"] = $Odds;

if($_POST["del"]=="del" || $_POST["del"]=="del_single"){
	unset($_SESSION["busket"][$MId]);
}else{
	$_SESSION["busket"][$MId] = $arr_busket;
}

if($_POST["mode"]=="cancel"){
	unset($_SESSION["busket"]);
}



$parlaydata = "";

$n_step = 0;
$TotalOdds = 1;
$i = 0;

$arr_busket_send = array();

foreach($_SESSION["busket"] as &$values){
	if($values['MId']!=""){
	
		//$rs_main = sql_array_sp("select * from bom_tb_ball_list where b_id = '$values[MId]' order by b_add asc");
		
		$json_file = file_get_contents2($x_process."json/sport/lang/".$_SESSION['lang']."/".$values['MId'].".json");
		$rs_main = json_decode($json_file, true);
		
		if(count($rs_main)>0){
		
			//print_r($rs_main);
			$key_Odds = "";
			$sql_list = sql_query_sp("select * from bom_tb_ball_list where b_id = '".$values['MId']."' order by b_add asc");
			while($rs_list=sql_fetch_as($sql_list)){

				//echo "dssss";

				$key = array_search ($values["OddsId"], $rs_list);
				if($key!=""){
					$key_Odds = $key;
					$rs_b = $rs_list;
				}
			}

			$sport_home_away = $values["Team"];
			$sport_type_select = substr($key_Odds, -1);
			//$oddsVal = $values["Odds"];
			
			

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
				$choiceValue = "มากกว่า";
				$BetKindValue = $rs_b["b_goal"];
			}else if($sport_home_away=="a" and $sport_type_select==2){
				$sport_nam_now = $rs_b["b_goal_2"];
				$choiceValue = "น้อยกว่า";
				$BetKindValue = $rs_b["b_goal"];

			}else if($sport_home_away=="1" and $sport_type_select==3){
				$sport_nam_now = $rs_b["b_1x2_1"];
				$choiceValue = "เต็มเวลา.1";
				$BetKindValue = "";
			}else if($sport_home_away=="X" and $sport_type_select==3){
				$sport_nam_now = $rs_b["b_1x2_x"];
				$choiceValue = "เต็มเวลา.X";
				$BetKindValue = "";
			}else if($sport_home_away=="2" and $sport_type_select==3){
				$sport_nam_now = $rs_b["b_1x2_2"];
				$choiceValue = "เต็มเวลา.2";
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
				$choiceValue = "คี่";
				$BetKindValue = "";
			}else if($sport_home_away=="a" and $sport_type_select==4){
				$sport_nam_now = $rs_b["b_even"];
				$choiceValue = "คู่";
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
				$choiceValue = "มากกว่า";
				$BetKindValue = $rs_b["b_1h_goal"];
			}else if($sport_home_away=="a" and $sport_type_select==6){
				$sport_nam_now = $rs_b["b_1h_goal_2"];
				$choiceValue = "น้อยกว่า";
				$BetKindValue = $rs_b["b_1h_goal"];

			}else if($sport_home_away=="1" and $sport_type_select==7){
				$sport_nam_now = $rs_b["b_1h_1x2_1"];
				$choiceValue = "ครึ่งแรก.1";
				$BetKindValue = "";
			}else if($sport_home_away=="X" and $sport_type_select==7){
				$sport_nam_now = $rs_b["b_1h_1x2_x"];
				$choiceValue = "ครึ่งแรก.X";
				$BetKindValue = "";
			}else if($sport_home_away=="2" and $sport_type_select==7){
				$sport_nam_now = $rs_b["b_1h_1x2_2"];
				$choiceValue = "ครึ่งแรก.2";
				$BetKindValue = "";

			}else if($sport_home_away=="h" and $sport_type_select==8){
				$sport_nam_now = $rs_b["b_1h_odd"];
				$choiceValue = "คี่";
				$BetKindValue = "";
			}else if($sport_home_away=="a" and $sport_type_select==8){
				$sport_nam_now = $rs_b["b_1h_even"];
				$choiceValue = "คู่";
				$BetKindValue = "";
			}

			$oddsVal = convert_nam($sport_nam_now , 1);

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
			
			if($oddsVal!=$values["Odds"]){
				$Odds_Upd = "Odds_Upd";
			}

			//$rs_b = sql_array_sp("select * from bom_tb_ball_list where ".$key_Odds." = '$values[OddsId]'");Odds_Upd

			$TotalOdds = $TotalOdds*$oddsVal;

			$parlaydata .= "<div style=\"background-color:#F8F8F8\" class=\"BetInfo ".$Odds_Upd."\"> <span class=\"TextStyle01\"><div onclick=\"DelParlay(\'".$rs_b["b_id"]."\');\" class=\"btnIcon right\"><span class=\"icon-close\"></span></div>".$arr_sp_zone[$rs_b["b_zone"]]." / ราคาต่อรอง</span><br /><span class=\"".$ChoiceClass."\">".$choiceValue."</span><br /><span class=\"TextStyle03\">".$BetKindValue."</span><span class=\"TextStyle01\"></span><span class=\"TextStyle03\"> @ </span><span class=\"".$OddsColor."\">".$oddsVal."</span><div class=\"TextStyle04 \"></div><div class=\"TextStyle04\">".$rs_main["h"]." -vs- ".$rs_main["a"]."</div><div class=\"TextStyle04\"></div></div>";

			
			//$BetKey .= $values["OddsId"]."_AA";
			
			//$last_ha = $sport_home_away;
		
			
			$arr_busket_send[$i]["Parlay"] = $rs_b["b_id"];
			$arr_busket_send[$i]["sport_home_away"] = $sport_home_away;
			$arr_busket_send[$i]["sport_type_select"] = $sport_type_select;
			$arr_busket_send[$i]["OddsId"] = $values["OddsId"];
			$n_step++;
			$i++;
		}
		
		$hiddenBetKey = json_encode($arr_busket_send);
	}
}



?>



<script type="text/javascript" LANGUAGE="JavaScript">
var CartCount = '<?=$n_step?>';
var TotalOdds = '<?=number_format($TotalOdds,2)?>';
var CombiName ='Super Heinz';
var CombiOdds = '0.0000';
var CombiMaxBet = '0.0000';
var CombiCount = '120';
var MinBet = '50';
var MaxBet = '12,285';
var Currency = 'THB';
var SportType = '1';
var parlaydata = '<?=$parlaydata?>';
<? if($n_step>0){ ?>
var combodata = '<li class="checkbox on">    <div class="list" id="ComboDetailSwitch0"><div class="Odds displayOn"><span class="TextStyle03">@</span> <span class="UdrDogOddsClass"><?=number_format($TotalOdds,2)?></span><input type="hidden" name="SportMixParleyOddsValue" id="SportMixParleyOddsValue" value="<?=number_format($TotalOdds,2)?>" /></div>    </div>    </li>';
<? }else{ ?>
var combodata = "";
<? } ?>
	// var combodata = "";


var confirmMode = '{{confirmMode}}';
var hiddenStakeRequest = '';
var hiddenBetKey = '<?=$hiddenBetKey?>';
var CanBetTicketCnt = '3';
var Open_MultiBet = 'false';
var ParlayOddsUPD = 'false';
parent.loadParlayData();
</script>
