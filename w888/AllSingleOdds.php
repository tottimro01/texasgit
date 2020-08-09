
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SingleOdds</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<link href="template/maxbet/public/css/table_w.css" rel="stylesheet" type="text/css" />
<link href="template/maxbet/public/css/button.css" rel="stylesheet" type="text/css" />
<link href="template/maxbet/public/css/oddsFamily.css" rel="stylesheet" type="text/css" />
<?
  $_now = strtotime('now');
  $_resDay = array(
    e_formatDate(strtotime("now")),
    e_formatDate(strtotime("+1 Day")),
    e_formatDate(strtotime("+2 Days")),
    e_formatDate(strtotime("+3 Days")),
    e_formatDate(strtotime("+4 Days")),
    e_formatDate(strtotime("+5 Days")),
    e_formatDate(strtotime("+6 Days")),
  );

  function e_formatDate($tstamp){
    $m = intval(date("m", $tstamp));
    $d = (date("d", $tstamp));
    $l = strtolower((date("l", $tstamp)));
    switch ($m) {
      case 1:  $m_name = $lang_months_short[0]; break;
      case 2:  $m_name = $lang_months_short[1]; break;
      case 3:  $m_name = $lang_months_short[2]; break;
      case 4:  $m_name = $lang_months_short[3]; break;
      case 5:  $m_name = $lang_months_short[4]; break;
      case 6:  $m_name = $lang_months_short[5]; break;
      case 7:  $m_name = $lang_months_short[6]; break;
      case 8:  $m_name = $lang_months_short[7]; break;
      case 9:  $m_name = $lang_months_short[8]; break;
      case 10: $m_name = $lang_months_short[9]; break;
      case 11: $m_name = $lang_months_short[10]; break;
      case 12: $m_name = $lang_months_short[11]; break;
      default: $m_name = "";     break;
    }

    switch ($l) {
      case 'sunday':    $l_name = $lang_days[0]; break;
      case 'tuesday':   $l_name = $lang_days[1]; break;
      case 'wednesday': $l_name = $lang_days[2]; break;
      case 'thursday':  $l_name = $lang_days[3]; break;
      case 'friday':    $l_name = $lang_days[4]; break;
      case 'saturday':  $l_name = $lang_days[5]; break;
      case 'monday':    $l_name = $lang_days[6]; break;
      default:          $l_name = ""; break;
    }
    return $d . " " . $m_name . "(" . $l_name . ")";
  }
?>
<script language="JavaScript" type="text/javascript">
var REFRESH_INTERVAL = 60000;
var REFRESH_INTERVAL_L = 20000;
var REFRESH_INTERVAL_D = REFRESH_INTERVAL;
var RES_LIVE = '<?=$lang_member[772];?>';
var REFRESH_COUNTDOWN = 720; //60;
var RES_REFRESH = '<?=$lang_member[769];?>';
var RES_PLEASE_WAIT = '<?=$lang_member[770];?>';
var RES_ODD = '<?=$lang_member[453];?>';
var RES_EVEN = '<?=$lang_member[459];?>';
var RES_UNDER = '<?=$lang_member[459];?>';
var RES_MORE = "More Bet Types";
var SPORT_TYPE = "<?=$_GET['Sport'];?>";
var RES_DRAW = '<?=$lang_member[220];?>';
var PAGE_MARKET = "t";
var RES_NoGameMsg = '<?=$lang_member[795];?>';
var RES_DAY = new Array(8);
RES_DAY[0] = '<?=$lang_member[304];?>';
RES_DAY[1] = "<?=$_resDay[0];?>";
RES_DAY[2] = "<?=$_resDay[1];?>";
RES_DAY[3] = "<?=$_resDay[2];?>";
RES_DAY[4] = "<?=$_resDay[3];?>";
RES_DAY[5] = "<?=$_resDay[4];?>";
RES_DAY[6] = "<?=$_resDay[5];?>";
RES_DAY[7] = "<?=$_resDay[6];?>";
// RES_DAY[1] = "12 มี.ค.(อังคาร)";
// RES_DAY[2] = "13 มี.ค.(พุธ)";
// RES_DAY[3] = "14 มี.ค.(พฤหัส)";
// RES_DAY[4] = "15 มี.ค.(ศุกร์)";
// RES_DAY[5] = "16 มี.ค.(เสาร์)";
// RES_DAY[6] = "17 มี.ค.(อาทิตย์)";
// RES_DAY[7] = "18 มี.ค.(จันทร์)";
RES_2selections = "2 Selections";
RES_Allselections="All Selections";
var RES_POINTS3="Pts";
var RES_TIEBREAK3="Tiebreak";
var RES_POINTS5="Pts";
var RES_TIEBREAK5="Tiebreak";
var RES_ADVANTAGE_HINT="Advantage";
var RES_POINTS_HINT="Points";
var RES_TIEBREAK_HINT="Tiebreak";
var RES_MORE_UNDER = '<?=$lang_member[312];?>';
var RES_MORE_OVER = '<?=$lang_member[314];?>';
var RES_MORE_ODD = '<?=$lang_member[453];?>';
var RES_MORE_EVEN = '<?=$lang_member[459];?>';
var RES_MORE_YES = "Yes";
var RES_MORE_NO = "No";
var RES_MORE_NOTIEBREAK = "No Tiebreak";
var RES_MORE_NEITHER = '<?=$lang_member[777];?>';
var RES_MORE_EXACTLY = "Exactly";
var RES_MORE_TIE = "Tie";
var RES_OUTRIGHT = '<?=$lang_member[758];?>';
var RES_NonFavoriteMsg = '<?=$lang_member[832];?>';
var RES_ROUND = "Round";
var RES_PageType = "F";
var RES_QTRHDP_hint = '<?=$lang_member[834];?>';
var RES_QTROU_hint = '<?=$lang_member[836];?>';
var RES_QTROE_hint = '<?=$lang_member[838];?>';
var RES_QxRaceto = '<?=$lang_member[839];?>';
var RES_1StQuarterTitle = '<?=$lang_member[841];?>';
var RES_2ndQuarterTitle = '<?=$lang_member[843];?>';
var RES_3rdQuarterTitle = '<?=$lang_member[844];?>';
var RES_4thQuarterTitle = '<?=$lang_member[846];?>';
var RES_1QuarterMoneyLineTitle = '<?=$lang_member[848];?>';
var RES_2QuarterMoneyLineTitle = '<?=$lang_member[849];?>';
var RES_3QuarterMoneyLineTitle = '<?=$lang_member[851];?>';
var RES_4QuarterMoneyLineTitle = '<?=$lang_member[852];?>';
var RES_1QuarterRaceToTitle = '<?=$lang_member[853];?>';
var RES_2QuarterRaceToTitle = '<?=$lang_member[854];?>';
var RES_3QuarterRaceToTitle = '<?=$lang_member[855];?>';
var RES_4QuarterRaceToTitle = '<?=$lang_member[856];?>';
var RES_1QuarterWinningMargin7WayTitle = '<?=$lang_member[857];?>';
var RES_2QuarterWinningMargin7WayTitle = '<?=$lang_member[858];?>';
var RES_3QuarterWinningMargin7WayTitle = '<?=$lang_member[859];?>';
var RES_4QuarterWinningMargin7WayTitle = '<?=$lang_member[861];?>';
var RES_1QuarterHomeTeamOverUnderTitle = '<?=$lang_member[863];?>';
var RES_2QuarterHomeTeamOverUnderTitle = '<?=$lang_member[864];?>';
var RES_3QuarterHomeTeamOverUnderTitle = '<?=$lang_member[865];?>';
var RES_4QuarterHomeTeamOverUnderTitle = '<?=$lang_member[867];?>';
var RES_1QuarterAwayTeamOverUnderTitle = '<?=$lang_member[869];?>';
var RES_2QuarterAwayTeamOverUnderTitle = '<?=$lang_member[871];?>';
var RES_3QuarterAwayTeamOverUnderTitle = '<?=$lang_member[872];?>';
var RES_4QuarterAwayTeamOverUnderTitle = '<?=$lang_member[874];?>';
var RES_1QuarterWhichteamtoScorethelastbasketTitle = '<?=$lang_member[875];?>';
var RES_2QuarterWhichteamtoScorethelastbasketTitle = '<?=$lang_member[876];?>';
var RES_3QuarterWhichteamtoScorethelastbasketTitle = '<?=$lang_member[878];?>';
var RES_4QuarterWhichteamtoScorethelastbasketTitle = '<?=$lang_member[879];?>';
var RES_Map = ["Map 1", "Map 2", "Map 3", "Map 4", "Map 5", "Map 6", "Map 7", "Map 8", "Map 9"];
var RES_MapML = "{{lbl_MapX_ML}}";
var RES_Dota2GroupType1 = "{0} - Kills & Duration";
var RES_Dota2GroupType2 = "{0} - Towers";
var RES_Dota2GroupType3 = "{0} - Roshans";
var RES_Dota2GroupType4 = "{0} - Barracks";
var RES_LoLGroupType1 = "{0} - Kills & Duration";
var RES_LoLGroupType2 = "{0} - Turrets";
var RES_LoLGroupType3 = "{0} - Dragons";
var RES_LoLGroupType4 = "{0} - Barons";
var RES_LoLGroupType5 = "{0} - Inhibitors";
var RES_CSgoGroupType1 = "{0} - Rounds";
var RES_CSgoGroupType2 = "{0} - Others";
var RES_CSgoGroupType3 = "{0} - Round Betting";
var RES_KoGGroupType1 = "{0} - Kills & Duration";
var RES_KoGGroupType2 = "{0} - Towers";
var RES_KoGGroupType3 = "{0} - Tyrants";
var RES_KoGGroupType4 = "{0} - Overlords";
var RES_BetTypeName = [];
RES_BetTypeName[9002] = "Total Kills HDP";
RES_BetTypeName[9003] = "Total Kills O/U";
RES_BetTypeName[9005] = "Total Kills O/E";
RES_BetTypeName[9006] = "1st Blood";
RES_BetTypeName[9007] = "1st to {0} Kills";
RES_BetTypeName[9008] = "Total Towers HDP";
RES_BetTypeName[9009] = "Total Towers O/U";
RES_BetTypeName[9011] = "1st Tier {0} Tower";
RES_BetTypeName[9012] = "Total Roshans HDP";
RES_BetTypeName[9013] = "Total Roshans O/U";
RES_BetTypeName[9015] = "1st Roshan";
RES_BetTypeName[9016] = "2nd Roshan";
RES_BetTypeName[9017] = "3rd Roshan";
RES_BetTypeName[9018] = "Total Barracks HDP";
RES_BetTypeName[9019] = "Total Barracks O/U";
RES_BetTypeName[9021] = "Barracks 1st Lane";
RES_BetTypeName[9022] = "Barracks 2nd Lane";
RES_BetTypeName[9023] = "Barracks 3rd Lane";
RES_BetTypeName[9024] = "Total Turrets HDP";
RES_BetTypeName[9025] = "Total Turrets O/U";
RES_BetTypeName[9027] = "1st Tier {0} Turret";
RES_BetTypeName[9028] = "Total Dragons HDP";
RES_BetTypeName[9029] = "Total Dragons O/U";
RES_BetTypeName[9031] = "1st Dragon";
RES_BetTypeName[9032] = "2nd Dragon";
RES_BetTypeName[9033] = "3rd Dragon";
RES_BetTypeName[9034] = "Total Barons HDP";
RES_BetTypeName[9035] = "Total Barons O/U";
RES_BetTypeName[9037] = "1st Baron";
RES_BetTypeName[9038] = "2nd Baron";
RES_BetTypeName[9039] = "3rd Baron";
RES_BetTypeName[9040] = "Total Inhibitors HDP";
RES_BetTypeName[9041] = "Total Inhibitors O/U";
RES_BetTypeName[9043] = "1st Inhibitor";
RES_BetTypeName[9044] = "2nd Inhibitor";
RES_BetTypeName[9045] = "3rd Inhibitor";
RES_BetTypeName[9046] = "Total Tyrants HDP";
RES_BetTypeName[9047] = "Total Tyrants O/U";
RES_BetTypeName[9049] = "1st Tyrant";
RES_BetTypeName[9050] = "2nd Tyrant";
RES_BetTypeName[9051] = "3rd Tyrant";
RES_BetTypeName[9052] = "Total Overlords HDP";
RES_BetTypeName[9053] = "Total Overlords O/U";
RES_BetTypeName[9055] = "1st Overlord";
RES_BetTypeName[9056] = "2nd Overlord";
RES_BetTypeName[9057] = "3rd Overlord";
RES_BetTypeName[9058] = "Duration O/U (Mins)";
RES_BetTypeName[9059] = "Rounds HDP";
RES_BetTypeName[9060] = "Rounds O/U";
RES_BetTypeName[9061] = "Rounds O/E";
RES_BetTypeName[9062] = "1st to {0} Rounds";
RES_BetTypeName[9063] = "1st Half";
RES_BetTypeName[9064] = "2nd Half";
RES_BetTypeName[90681] = "{0}st Round";
RES_BetTypeName[90682] = "{0}nd Round";
RES_BetTypeName[90683] = "{0}rd Round";
RES_BetTypeName[90684] = "{0}th Round";
RES_BetTypeName[9070] = "Round Kills O/U";
RES_BetTypeName[9071] = "Round Kills O/E";
RES_BetTypeName[9072] = "1st Kill";
RES_BetTypeName[9073] = "Bomb Plant";
RES_BetTypeName[9074] = "Rounds O/U (OT)";
RES_BetTypeName[9075] = "Final Round B. Plant";
RES_BetTypeName[9076] = "Clutches HDP";
RES_BetTypeName[9077] = "Round Kills HDP";
RES_BetTypeName[9078] = "Total Towers O/E";
RES_BetTypeName[9079] = "Total Roshans O/E";
RES_BetTypeName[9080] = "Total Barracks O/E";
RES_BetTypeName[9081] = "Total Turrets O/E";
RES_BetTypeName[9082] = "Total Dragons O/E";
RES_BetTypeName[9083] = "Total Barons O/E";
RES_BetTypeName[9084] = "Total Inhibitors O/E";
RES_BetTypeName[9085] = "Total Tyrants O/E";
RES_BetTypeName[9086] = "Total Overlords O/E";
var RES_BetTypeNameHint = [];
RES_BetTypeNameHint[9002] = "Map {0} Total Kills Handicap";
RES_BetTypeNameHint[9003] = "Map {0} Total Kills Over/Under";
RES_BetTypeNameHint[9004] = "Map {0} Total Kills Moneyline";
RES_BetTypeNameHint[9005] = "Map {0} Total Kills Odd/Even";
RES_BetTypeNameHint[9006] = "Map {0} First Blood";
RES_BetTypeNameHint[9007] = "Map {0} First to {1} Kills";
RES_BetTypeNameHint[9008] = "Map {0} Total Towers Handicap";
RES_BetTypeNameHint[9009] = "Map {0} Total Towers Over/Under";
RES_BetTypeNameHint[9010] = "Map {0} Total Towers Moneyline";
RES_BetTypeNameHint[9011] = "Map {0} First Tier {1} Tower";
RES_BetTypeNameHint[9012] = "Map {0} Total Roshans Handicap";
RES_BetTypeNameHint[9013] = "Map {0} Total Roshans Over/Under";
RES_BetTypeNameHint[9014] = "Map {0} Total Roshans Moneyline";
RES_BetTypeNameHint[9015] = "Map {0} 1st Roshan";
RES_BetTypeNameHint[9016] = "Map {0} 2nd Roshan";
RES_BetTypeNameHint[9017] = "Map {0} 3rd Roshan";
RES_BetTypeNameHint[9018] = "Map {0} Total Barracks Handicap";
RES_BetTypeNameHint[9019] = "Map {0} Total Barracks Over/Under";
RES_BetTypeNameHint[9020] = "Map {0} Total Barracks Moneyline";
RES_BetTypeNameHint[9021] = "Map {0} Barracks 1st Lane";
RES_BetTypeNameHint[9022] = "Map {0} Barracks 2nd Lane";
RES_BetTypeNameHint[9023] = "Map {0} Barracks 3rd Lane";
RES_BetTypeNameHint[9024] = "Map {0} Total Turrets Handicap";
RES_BetTypeNameHint[9025] = "Map {0} Total Turrets Over/Under";
RES_BetTypeNameHint[9026] = "Map {0} Total Turrets Moneyline";
RES_BetTypeNameHint[9027] = "Map {0} First Tier {1} Turret";
RES_BetTypeNameHint[9028] = "Map {0} Total Dragons Handicap";
RES_BetTypeNameHint[9029] = "Map {0} Total Dragons Over/Under";
RES_BetTypeNameHint[9030] = "Map {0} Total Dragons Moneyline";
RES_BetTypeNameHint[9031] = "Map {0} 1st Dragon";
RES_BetTypeNameHint[9032] = "Map {0} 2nd Dragon";
RES_BetTypeNameHint[9033] = "Map {0} 3rd Dragon";
RES_BetTypeNameHint[9034] = "Map {0} Total Barons Handicap";
RES_BetTypeNameHint[9035] = "Map {0} Total Barons Over/Under";
RES_BetTypeNameHint[9036] = "Map {0} Total Barons Moneyline";
RES_BetTypeNameHint[9037] = "Map {0} 1st Baron";
RES_BetTypeNameHint[9038] = "Map {0} 2nd Baron";
RES_BetTypeNameHint[9039] = "Map {0} 3rd Baron";
RES_BetTypeNameHint[9040] = "Map {0} Total Inhibitors Handicap";
RES_BetTypeNameHint[9041] = "Map {0} Total Inhibitors Over/Under";
RES_BetTypeNameHint[9042] = "Map {0} Total Inhibitors Moneyline";
RES_BetTypeNameHint[9043] = "Map {0} 1st Inhibitor";
RES_BetTypeNameHint[9044] = "Map {0} 2nd Inhibitor";
RES_BetTypeNameHint[9045] = "Map {0} 3rd Inhibitor";
RES_BetTypeNameHint[9046] = "Map {0} Total Tyrants Handicap";
RES_BetTypeNameHint[9047] = "Map {0} Total Tyrants Over/Under";
RES_BetTypeNameHint[9048] = "Map {0} Total Tyrants Moneyline";
RES_BetTypeNameHint[9049] = "Map {0} 1st Tyrant";
RES_BetTypeNameHint[9050] = "Map {0} 2nd Tyrant";
RES_BetTypeNameHint[9051] = "Map {0} 3rd Tyrant";
RES_BetTypeNameHint[9052] = "Map {0} Total Lords Handicap";
RES_BetTypeNameHint[9053] = "Map {0} Total Lords Over/Under";
RES_BetTypeNameHint[9054] = "Map {0} Total Lords Moneyline";
RES_BetTypeNameHint[9055] = "Map {0} 1st Lord";
RES_BetTypeNameHint[9056] = "Map {0} 2nd Lord";
RES_BetTypeNameHint[9057] = "Map {0} 3rd Lord";
RES_BetTypeNameHint[9058] = "Map {0} Duration Over/Under (Mins)";
RES_BetTypeNameHint[9059] = "Map {0} Rounds Handicap";
RES_BetTypeNameHint[9060] = "Map {0} Rounds Over/Under";
RES_BetTypeNameHint[9061] = "Map {0} Rounds Odd/Even";
RES_BetTypeNameHint[9062] = "Map {0} First to {1} Rounds";
RES_BetTypeNameHint[9063] = "Map {0} First Half";
RES_BetTypeNameHint[9064] = "Map {0} Second Half";
RES_BetTypeNameHint[9065] = "Map {0} Most First Kill";
RES_BetTypeNameHint[9066] = "Map {0} Clutches Moneyline";
RES_BetTypeNameHint[9067] = "Map {0} 16th Round";
RES_BetTypeNameHint[9068] = "Map {0} Round {1} Moneyline";
RES_BetTypeNameHint[9069] = "Map {0} Round {1} Total Kills Moneyline";
RES_BetTypeNameHint[9070] = "Map {0} Round {1} Total Kills Over/Under";
RES_BetTypeNameHint[9071] = "Map {0} Round {1} Total Kills Odd/Even";
RES_BetTypeNameHint[9072] = "Map {0} Round {1} First Kill";
RES_BetTypeNameHint[9073] = "Map {0} Round {1} Bomb Plant";
RES_BetTypeNameHint[9074] = "Map {0} Rounds Over/Under (Overtime)";
RES_BetTypeNameHint[9075] = "Map {0} Final Round Bomb Plant";
RES_BetTypeNameHint[9076] = "Map {0} Clutches Handicap";
RES_BetTypeNameHint[9077] = "Map {0} Round {1} Total Kills Handicap";
RES_BetTypeNameHint[9078] = "Map {0} Total Towers Odd/Even";
RES_BetTypeNameHint[9079] = "Map {0} Total Roshans Odd/Even";
RES_BetTypeNameHint[9080] = "Map {0} Total Barracks Odd/Even";
RES_BetTypeNameHint[9081] = "Map {0} Total Turrets Odd/Even";
RES_BetTypeNameHint[9082] = "Map {0} Total Dragons Odd/Even";
RES_BetTypeNameHint[9083] = "Map {0} Total Barons Odd/Even";
RES_BetTypeNameHint[9084] = "Map {0} Total Inhibitors Odd/Even";
RES_BetTypeNameHint[9085] = "Map {0} Total Tyrants Odd/Even";
RES_BetTypeNameHint[9086] = "Map {0} Total Overlords Odd/Even";

RES_Odds_Live = '<?=$lang_member[881];?>';
RES_InPlay = "IN-PLAY";
RES_POP_HY = "Yes";
RES_POP_HN = "No";
var RES_VAR = "VAR";
var RES_PRC = "PRC";
var RES_PPen = "PPen.";
var RES_Pen = "Pen.";
var RES_Inj = "Inj.";
var RES_VAR_full = '<?=$lang_member[812];?>';
var RES_PRC_full = '<?=$lang_member[813];?>';
var RES_PPen_full = '<?=$lang_member[815];?>';
var RES_Pen_full = '<?=$lang_member[817];?>';
var RES_Inj_full = '<?=$lang_member[818];?>';
</script>
<script language="JavaScript" type="text/javascript" src="commJS/jquery.min.js"></script>
<script language="JavaScript" type="text/javascript" src="commJS/jquery-latest.min.js"></script>
<script language="JavaScript" type="text/javascript" src="commJS/getDataClass.js"></script>
<script language="JavaScript" type="text/javascript" src="commJS/ajaxData.js"></script>
<script language="JavaScript" type="text/javascript" src="commJS/odds/MultiSport_Def.js"></script>
<script language="JavaScript" type="text/javascript" src="commJS/cookie.js"></script>
<script language="JavaScript" type="text/javascript" src="commJS/OddsUtils.js"></script>
<script language="JavaScript" type="text/javascript" src="commJS/odds/more.js"></script>
<script language="JavaScript" type="text/javascript" src="commJS/OddsKeeper.js"></script>
<script language="JavaScript" type="text/javascript" src="commJS/OutrightKeeper.js"></script>
<script language="JavaScript" type="text/javascript" src="commJS/odds/AllSingleOdds.js"></script>
<script language="JavaScript" type="text/javascript" src="commJS/DivLauncher.js"></script>
<script language="JavaScript" type="text/javascript" src="commJS/LiveScore.js"></script>
<script language="JavaScript" type="text/javascript" src="commJS/streaming.js"></script>
<script language="JavaScript" type="text/javascript" src="commJS/common.js"></script>
<script type="text/javascript" src="commJS/trailblazerlib.js"></script>
<script language="JavaScript" type="text/javascript">
  NoShowMROdds=false;
  OnlyMROdds=false;
</script>
</head>

<body id="AllSingleOdds" onload="fFrame.leftx.CloseAllSports();OverWriteFormSubmit();refreshAll();initialDisstyle(); fFrame.leftx._setDefaultOddsType();">
<iframe name='DataFrame_D' src="" style="display:none"></iframe>
<iframe name='DataFrame_L' src="" style="display: none"></iframe>

<div id="MainFly" class="MainFly">
<div class="titleBar">
    <div class="title"><?=$lang_member[883];?></div>
    <div class="right">
        <!--<a id="t_Order" href="javascript:setRefreshSort();" class="button"><span id="aSorter">Sort by Time</span></a>-->
        <!--{{Label_OrderBy}}-->
		<a id="btnSwitchBack" href="javascript:LiveInfoBackButton();trailblazer.gvend();" class="button mark" style="display:none" title="<?=$lang_member[492];?>"><span><?=$lang_member[492];?></span></a> 
        <!--<a href="javascript:openLeague(640,'เลือกลีค','t','0','','1','SportsMixParlay');" class="button selectLeague" title="เลือกลีค">
        	<span>
            <div id="League_New" class="displayOff">
              <div id="SelLeagueIcon">
                <div class="icon">
                </div>
              </div>
              <div class="events">
                <div class="normal">(</div><div id="CustSelL" class="selected"></div><div id="AllSelL" class="normal"></div><div class="normal">/</div><div id="TotalLeagueCnt" class="normal"></div><div class="normal">)</div>
              </div>
              ลีกค์</div>
            <div id="League_Old">
              เลือกลีค</div>
            </span>
        </a>-->
        <!--<div id="MRSwitch" class="button switch displayOff" onclick="MR_Switch();">
        	<span>
        		<div class="icon_MMR"></div>
                <div class="switch-gruop">
                    <ul id="MR_Switch" class="on">
                        <li class="switch-btn-on">On</li>
                        <li class="switch-btn-off">Off</li>
                    </ul>
                </div>
            </span>
        </div>-->
        <div id="disstyle_Div" tabindex="6" hidefocus onkeypress="onKeyPressSelecter('disstyle',event);return false;" onclick="onClickSelecter('disstyle');return false;" class="button select icon">
<input type="hidden" name="disstyle" id="disstyle" value="3" />
<span  id="disstyle_Txt" title='<?=$lang_member[884];?>'><div id="disstyle_Icon" class="icon_DL"></div></span>
<ul id="disstyle_menu" class="submenu">
<li  title='<?=$lang_member[885];?>' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('disstyle',this,'1',true);changeDisplayMode('1','ohoking.com'); parent.focus();"><div class="icon_SL"></div><?=$lang_member[885];?></li>
<li  title='<?=$lang_member[884];?>' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('disstyle',this,'3',true);changeDisplayMode('3','ohoking.com'); parent.focus();"><div class="icon_DL"></div><?=$lang_member[884];?></li>
<li  title='<?=$lang_member[805];?>' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('disstyle',this,'1F',true);changeDisplayMode('1F','ohoking.com'); parent.focus();"><div class="icon_FT"></div><?=$lang_member[805];?></li>
<li  title='<?=$lang_member[803];?>' onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('disstyle',this,'1H',true);changeDisplayMode('1H','ohoking.com'); parent.focus();"><div class="icon_HT"></div><?=$lang_member[803];?></li>
</ul>
</div>

        
        
            <div id="selOddsType_Div" tabindex="6" hidefocus onkeypress="onKeyPressSelecter('selOddsType',event);return false;" onclick="onClickSelecter('selOddsType');return false;" class="button select icon">
<input type="hidden" name="selOddsType" id="selOddsType" value="4" />
<span  id="selOddsType_Txt" title='<?=$lang_member[790];?>'><div id="selOddsType_Icon" class="icon_MY"></div></span>
<ul id="selOddsType_menu" class="submenu">
<li  title='<?=$lang_member[791];?>' onmouseover="onOver(this)" class="oddsLI-2" onmouseout="onOut(this)" onclick="setSelecter('selOddsType',this,'2',true);changeOddsType_ou(2);"><div class="icon_HK"></div><?=$lang_member[791];?></li>
<li  title='<?=$lang_member[793];?>' onmouseover="onOver(this)" class="oddsLI-1" onmouseout="onOut(this)" onclick="setSelecter('selOddsType',this,'1',true);changeOddsType_ou(1);"><div class="icon_Dec"></div><?=$lang_member[793];?></li>
<li  title='<?=$lang_member[790];?>' onmouseover="onOver(this)" class="oddsLI-4" onmouseout="onOut(this)" onclick="setSelecter('selOddsType',this,'4',true);changeOddsType_ou(4);"><div class="icon_MY"></div><?=$lang_member[790];?></li>
</ul>
</div>

        

        <!--<a id="t_Order" href="javascript:returnSport();" class="button mark" title="สเต็ป"><span>สเต็ป</span></a>-->
		<a href="javascript:refreshData_D();" id="btnRefresh_D" class="button disable" style="display:none" title="<?=$lang_member[770];?>"><span><div class="icon-refresh"></div><?=$lang_member[770];?></span></a>
		<a href="javascript:refreshData_L();" id="btnRefresh_L" class="button disable" style="display:none" title="<?=$lang_member[770];?>"><span><div class="icon-refresh"></div><?=$lang_member[770];?></span></a>
    </div>
</div>
<div id ="MiddleLiveInfo" class="MainTVInfo" style="display: none; color:#e8eff5">
	<div class="loadiframe" ><iframe id="MiddleLiveInfoFrame" src="" height="417" scrolling="no" frameborder="0"></iframe></div>
</div>
</div>
<div class="board" id="menu" style="display:none">
	<ul class="panelInfo" id="DateContainer1" style="display:none">
                <li><span id="DateSpanA0" class="title" onclick="SelectDate(0);" style="cursor:pointer;color:#003399;display:none"></span></li>
                <li><span id="DateSpanA1" class="title" onclick="SelectDate(1);" style="cursor:pointer;color:#9F0915"><?=$lang_member[887];?></span></li>
                <li><span id="DateSpanA2" class="title" onclick="SelectDate(2);" style="cursor:pointer;color:#003399"></span></li>
                <li><span id="DateSpanA3" class="title" onclick="SelectDate(3);" style="cursor:pointer;color:#003399"></span></li>
                <li><span id="DateSpanA4" class="title" onclick="SelectDate(4);" style="cursor:pointer;color:#003399"></span></li>
                <li><span id="DateSpanA5" class="title" onclick="SelectDate(5);" style="cursor:pointer;color:#003399"></span></li>
                <li><span id="DateSpanA6" class="title" onclick="SelectDate(6);" style="cursor:pointer;color:#003399"></span></li>
                <li><span id="DateSpanA7" class="title" onclick="SelectDate(7);" style="cursor:pointer;color:#003399"></span></li>
    </ul>
	<ul class="panelInfo checkbox" id="DateContainer" style="display:none"></ul>
	<ul class="panelInfo checkbox" id="SportsContainer"></ul>
</div>

		<div class="tabbox">
			    <div id='OddsTr_L' style="display:none">
                    <div class="tabbox_F sport44 sport44 phase2" id="oTableContainer_44_L" style="display:none"></div><div class="tabbox_F sport1 sport1 phase2" id="oTableContainer_1_L" style="display:none"></div><div class="tabbox_F sport43 sport43 phase2" id="oTableContainer_43_L" style="display:none"></div><div class="tabbox_F sport2 sport2 phase2" id="oTableContainer_2_L" style="display:none"></div><div class="tabbox_F sport8 sport8 phase2" id="oTableContainer_8_L" style="display:none"></div><div class="tabbox_F sport3 sport3 phase2" id="oTableContainer_3_L" style="display:none"></div><div class="tabbox_F sport4 sport4 phase2" id="oTableContainer_4_L" style="display:none"></div><div class="tabbox_F sport29 sport29 phase2" id="oTableContainer_29_L" style="display:none"></div><div class="tabbox_F sport5 sport5 phase2" id="oTableContainer_5_L" style="display:none"></div><div class="tabbox_F sport9 sport9 phase2" id="oTableContainer_9_L" style="display:none"></div><div class="tabbox_F sport6 sport6 phase2" id="oTableContainer_6_L" style="display:none"></div><div class="tabbox_F sport7 sport7 phase2" id="oTableContainer_7_L" style="display:none"></div><div class="tabbox_F sport11 sport11 phase2" id="oTableContainer_11_L" style="display:none"></div><div class="tabbox_F sport50 sport50 phase2" id="oTableContainer_50_L" style="display:none"></div><div class="tabbox_F sport47 sport47 phase2" id="oTableContainer_47_L" style="display:none"></div><div class="tabbox_F sport99 sport99 phase2" id="oTableContainer_99_L" style="display:none"></div><div class="tabbox_F sport10 sport10 phase2" id="oTableContainer_10_L" style="display:none"></div><div class="tabbox_F sport16 sport16 phase2" id="oTableContainer_16_L" style="display:none"></div><div class="tabbox_F sport26 sport26 phase2" id="oTableContainer_26_L" style="display:none"></div><div class="tabbox_F sport25 sport25 phase2" id="oTableContainer_25_L" style="display:none"></div><div class="tabbox_F sport18 sport18 phase2" id="oTableContainer_18_L" style="display:none"></div><div class="tabbox_F sport48 sport48 phase2" id="oTableContainer_48_L" style="display:none"></div><div class="tabbox_F sport49 sport49 phase2" id="oTableContainer_49_L" style="display:none"></div><div class="tabbox_F sport51 sport51 phase2" id="oTableContainer_51_L" style="display:none"></div><div class="tabbox_F sport30 sport30 phase2" id="oTableContainer_30_L" style="display:none"></div><div class="tabbox_F sport28 sport28 phase2" id="oTableContainer_28_L" style="display:none"></div><div class="tabbox_F sport24 sport24 phase2" id="oTableContainer_24_L" style="display:none"></div><div class="tabbox_F sport32 sport32 phase2" id="oTableContainer_32_L" style="display:none"></div><div class="tabbox_F sport22 sport22 phase2" id="oTableContainer_22_L" style="display:none"></div><div class="tabbox_F sport12 sport12 phase2" id="oTableContainer_12_L" style="display:none"></div><div class="tabbox_F sport14 sport14 phase2" id="oTableContainer_14_L" style="display:none"></div><div class="tabbox_F sport15 sport15 phase2" id="oTableContainer_15_L" style="display:none"></div><div class="tabbox_F sport17 sport17 phase2" id="oTableContainer_17_L" style="display:none"></div><div class="tabbox_F sport20 sport20 phase2" id="oTableContainer_20_L" style="display:none"></div><div class="tabbox_F sport33 sport33 phase2" id="oTableContainer_33_L" style="display:none"></div><div class="tabbox_F sport31 sport31 phase2" id="oTableContainer_31_L" style="display:none"></div><div class="tabbox_F sport23 sport23 phase2" id="oTableContainer_23_L" style="display:none"></div><div class="tabbox_F sport34 sport34 phase2" id="oTableContainer_34_L" style="display:none"></div><div class="tabbox_F sport21 sport21 phase2" id="oTableContainer_21_L" style="display:none"></div><div class="tabbox_F sport35 sport35 phase2" id="oTableContainer_35_L" style="display:none"></div><div class="tabbox_F sport36 sport36 phase2" id="oTableContainer_36_L" style="display:none"></div><div class="tabbox_F sport37 sport37 phase2" id="oTableContainer_37_L" style="display:none"></div><div class="tabbox_F sport38 sport38 phase2" id="oTableContainer_38_L" style="display:none"></div><div class="tabbox_F sport39 sport39 phase2" id="oTableContainer_39_L" style="display:none"></div><div class="tabbox_F sport40 sport40 phase2" id="oTableContainer_40_L" style="display:none"></div><div class="tabbox_F sport41 sport41 phase2" id="oTableContainer_41_L" style="display:none"></div><div class="tabbox_F sport19 sport19 phase2" id="oTableContainer_19_L" style="display:none"></div><div class="tabbox_F sport42 sport42 phase2" id="oTableContainer_42_L" style="display:none"></div><div class="tabbox_F sport13 sport13 phase2" id="oTableContainer_13_L" style="display:none"></div><div class="tabbox_F" id="oTableContainer_27_L" style="display:none"></div>
			    </div>
			    <div id='OddsTr' style="display:none">			    
                    <div class="tabbox_F sport44 sport44 phase2" id="oTableContainer_44" style="display:none"></div><div class="tabbox_F sport1 sport1 phase2" id="oTableContainer_1" style="display:none"></div><div class="tabbox_F sport43 sport43 phase2" id="oTableContainer_43" style="display:none"></div><div class="tabbox_F sport2 sport2 phase2" id="oTableContainer_2" style="display:none"></div><div class="tabbox_F sport8 sport8 phase2" id="oTableContainer_8" style="display:none"></div><div class="tabbox_F sport3 sport3 phase2" id="oTableContainer_3" style="display:none"></div><div class="tabbox_F sport4 sport4 phase2" id="oTableContainer_4" style="display:none"></div><div class="tabbox_F sport29 sport29 phase2" id="oTableContainer_29" style="display:none"></div><div class="tabbox_F sport5 sport5 phase2" id="oTableContainer_5" style="display:none"></div><div class="tabbox_F sport9 sport9 phase2" id="oTableContainer_9" style="display:none"></div><div class="tabbox_F sport6 sport6 phase2" id="oTableContainer_6" style="display:none"></div><div class="tabbox_F sport7 sport7 phase2" id="oTableContainer_7" style="display:none"></div><div class="tabbox_F sport11 sport11 phase2" id="oTableContainer_11" style="display:none"></div><div class="tabbox_F sport50 sport50 phase2" id="oTableContainer_50" style="display:none"></div><div class="tabbox_F sport47 sport47 phase2" id="oTableContainer_47" style="display:none"></div><div class="tabbox_F sport99 sport99 phase2" id="oTableContainer_99" style="display:none"></div><div class="tabbox_F sport10 sport10 phase2" id="oTableContainer_10" style="display:none"></div><div class="tabbox_F sport16 sport16 phase2" id="oTableContainer_16" style="display:none"></div><div class="tabbox_F sport26 sport26 phase2" id="oTableContainer_26" style="display:none"></div><div class="tabbox_F sport25 sport25 phase2" id="oTableContainer_25" style="display:none"></div><div class="tabbox_F sport18 sport18 phase2" id="oTableContainer_18" style="display:none"></div><div class="tabbox_F sport48 sport48 phase2" id="oTableContainer_48" style="display:none"></div><div class="tabbox_F sport49 sport49 phase2" id="oTableContainer_49" style="display:none"></div><div class="tabbox_F sport51 sport51 phase2" id="oTableContainer_51" style="display:none"></div><div class="tabbox_F sport30 sport30 phase2" id="oTableContainer_30" style="display:none"></div><div class="tabbox_F sport28 sport28 phase2" id="oTableContainer_28" style="display:none"></div><div class="tabbox_F sport24 sport24 phase2" id="oTableContainer_24" style="display:none"></div><div class="tabbox_F sport32 sport32 phase2" id="oTableContainer_32" style="display:none"></div><div class="tabbox_F sport22 sport22 phase2" id="oTableContainer_22" style="display:none"></div><div class="tabbox_F sport12 sport12 phase2" id="oTableContainer_12" style="display:none"></div><div class="tabbox_F sport14 sport14 phase2" id="oTableContainer_14" style="display:none"></div><div class="tabbox_F sport15 sport15 phase2" id="oTableContainer_15" style="display:none"></div><div class="tabbox_F sport17 sport17 phase2" id="oTableContainer_17" style="display:none"></div><div class="tabbox_F sport20 sport20 phase2" id="oTableContainer_20" style="display:none"></div><div class="tabbox_F sport33 sport33 phase2" id="oTableContainer_33" style="display:none"></div><div class="tabbox_F sport31 sport31 phase2" id="oTableContainer_31" style="display:none"></div><div class="tabbox_F sport23 sport23 phase2" id="oTableContainer_23" style="display:none"></div><div class="tabbox_F sport34 sport34 phase2" id="oTableContainer_34" style="display:none"></div><div class="tabbox_F sport21 sport21 phase2" id="oTableContainer_21" style="display:none"></div><div class="tabbox_F sport35 sport35 phase2" id="oTableContainer_35" style="display:none"></div><div class="tabbox_F sport36 sport36 phase2" id="oTableContainer_36" style="display:none"></div><div class="tabbox_F sport37 sport37 phase2" id="oTableContainer_37" style="display:none"></div><div class="tabbox_F sport38 sport38 phase2" id="oTableContainer_38" style="display:none"></div><div class="tabbox_F sport39 sport39 phase2" id="oTableContainer_39" style="display:none"></div><div class="tabbox_F sport40 sport40 phase2" id="oTableContainer_40" style="display:none"></div><div class="tabbox_F sport41 sport41 phase2" id="oTableContainer_41" style="display:none"></div><div class="tabbox_F sport19 sport19 phase2" id="oTableContainer_19" style="display:none"></div><div class="tabbox_F sport42 sport42 phase2" id="oTableContainer_42" style="display:none"></div><div class="tabbox_F sport13 sport13 phase2" id="oTableContainer_13" style="display:none"></div><div class="tabbox_F" id="oTableContainer_27" style="display:none"></div><div class="tabbox_F" id="oTableContainer_O" style="display:none"></div>
				</div> 		
			</div>

            <div id="TrNoInfo"  style="display: none">
            <table class="oddsTable" width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr>
                	<td align="center" class="tabtitle" style="border-radius: 0;"><?=$lang_member[888];?></td>
                </tr>
            </table>
            </div>
			<div id="TrFilterInfo" style="display: none">
            <table class="oddsTable" width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr>
                	<td align="center" class="tabtitle" style="border-radius: 0;"><?=$lang_member[889];?></td>
                </tr>
            </table>
            </div>
			<div id="BetList" align="center"><img src="template/maxbet/public/images/layout/loading.gif" vspace="2" /></div>


<form action="AllSingleOdds_data.php" target="DataFrame_D" name="DataForm_D" style="display: none">
	<input type="hidden" name="Market" value="d"/>
	<input type="hidden" name="DT" value="{{r_dt}}" />
	<input type="hidden" name="RT" value="W" />
	<input type="hidden" name="Sport" value="1" />
	<input type="hidden" name="CT" value="" />
	<input type="hidden" name="Game" value="0" />
	<input type="hidden" name="OddsType" value="4" />
	<input type="hidden" name="Combo" value="3" />
	<input type="hidden" name="Page" value="AllSingleOdds" />
	<input type="hidden" name="PageType" value="F" />
	<input type="hidden" name="key" value="" />
  <input type="hidden" name="keyWord" value="" />
	<input type="hidden" name="ChangeOddsType" value="" />
  <input type="hidden" name="SelectLeague" value="0" />
</form>

<form action="AllSingleOdds_data.php" target="DataFrame_L" name="DataForm_L" style="display: none">
	<input type="hidden" name="Market" value="l"/>
	<input type="hidden" name="DT" value="{{r_dt}}" />
	<input type="hidden" name="RT" value="W" />
	<input type="hidden" name="Sport" value="1" />
	<input type="hidden" name="CT" value="" />
	<input type="hidden" name="Game" value="0" />
	<input type="hidden" name="OddsType" value="4" />
	<input type="hidden" name="Combo" value="3" />
	<input type="hidden" name="Page" value="AllSingleOdds" />
	<input type="hidden" name="PageType" value="F" />
	<input type="hidden" name="key" value="" />
  <input type="hidden" name="keyWord" value="" />
	<input type="hidden" name="ChangeOddsType" value="" />
  <input type="hidden" name="SelectLeague" value="0" />
</form>

<div id="PopDiv" style="display: none">
	<div class="popupW">
        <div id="PopTitle" class="popupWTitle">
        	<span>
                <div class="popWIcon"></div>
                <div id="PopTitleText" class="popWTitleContain"></div>
                <div id="PopCloser" class="popWClose" title="<?=$lang_member[612];?>"></div>
            </span>
        </div>
        <div id="oPopContainer" class="popWContain">
        </div>
    </div>
</div>

<iframe name='PopFrame' id='PopFrame' src="" style="display: none" onload="document.getElementById('oPopContainer').innerHTML=this.contentWindow.document.body.innerHTML;"></iframe>
<div id="LiveInfoMenu" style="display: none;">
    <ul class="cm-nav">
        <li id="LFM_FullView" style = "display: none;"><a onclick="JSF">Full View</a></li>       
        <li><a onclick="JSS">Side View</a></li>
    </ul>
</div>
<div id="cm-nav" style="display:none">
    <ul class="cm-nav">
        <li><a href="#L">Large View</a></li>
        <li><a href="#S">Small View</a></li>
    </ul>
</div>
<div id="Soccer_More" style="display:none"></div>
<div id="Tennis_More" style="display:none"></div>
<div id="Basketball_More" style="display:none"></div>
<div id="ESports_More" style="display:none"></div>
</body>
</html>
