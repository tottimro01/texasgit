<?
session_start();
// require("lang/member_lang.php");
  require("lang/variable_lang.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tennis Template</title>
</head>
<body>
<table id="tmplTable" class="oddsTable" width="100%" cellpadding="0" cellspacing="0" border="0">
  <tbody id="tmplHeader">
    <tr>
      <th width="6%" nowrap title=" <?=$lang_sport[42];?>"> <?=$lang_sport[42];?> </th>
      <th width="330" colspan="2" class="even" align="left" title=" <?=$lang_sport[40];?>"> <?=$lang_sport[40];?> </th>
      <th width="69" align="right" title=" <?=$lang_sport[129];?>"> <?=$lang_sport[129];?> </th>
      <th width="83" class="even"> <font title="<?=$lang_sport[44];?> <?=$lang_sport[116];?>">FT. HDP</font> </th>
      <th width="95" class="even"> <font title="<?=$lang_sport[44];?> <?=$lang_sport[120];?>/<?=$lang_sport[121];?>">FT. O/U</font> </th>
      <th width="100" class="even"> <font title="<?=$lang_sport[44];?> <?=$lang_sport[19];?>/<?=$lang_sport[20];?>">FT. O/E</font> </th>
      <th width="1"> </th>
    </tr>
  </tbody>
  <tbody id="tmplHeader_L_50">
    <tr>
      <th width="6%" nowrap title=" <?=$lang_sport[42];?>"> <?=$lang_sport[42];?> </th>
      <th width="300" colspan="2" class="even" align="left" title=" <?=$lang_sport[40];?>"> <?=$lang_sport[40];?> </th>
      <th width="69" title=" <?=$lang_sport[58];?>"> <?=$lang_sport[58];?> </th>
      <th width="69" class="even" title=" Match Winner"> Match Winner </th>
      <th width="83"> <font title="<?=$lang_sport[44];?> <?=$lang_sport[116];?>">FT. HDP</font> </th>
      <th width="95" class="even"> <font title="<?=$lang_sport[44];?> <?=$lang_sport[120];?>/<?=$lang_sport[121];?>">FT. O/U</font> </th>
      <th width="100"> <font title="<?=$lang_sport[44];?> <?=$lang_sport[19];?>/<?=$lang_sport[20];?>">FT. O/E</font> </th>
      <th width="1" class="even"> </th>
    </tr>
  </tbody>
  <tbody id="tmplHeader_50">
    <tr>
      <th width="6%" nowrap title=" <?=$lang_sport[42];?>"> <?=$lang_sport[42];?> </th>
      <th width="300" colspan="2" class="even" align="left" title=" <?=$lang_sport[40];?>"> <?=$lang_sport[40];?> </th>
      <th width="69" title=" <?=$lang_sport[58];?>"> <?=$lang_sport[58];?> </th>
      <th width="69" class="even" title=" Match Winner"> Match Winner </th>
      <th width="83"> <font title="<?=$lang_sport[44];?> <?=$lang_sport[116];?>">FT. HDP</font> </th>
      <th width="95" class="even"> <font title="<?=$lang_sport[44];?> <?=$lang_sport[120];?>/<?=$lang_sport[121];?>">FT. O/U</font> </th>
      <th width="100"> <font title="<?=$lang_sport[44];?> <?=$lang_sport[19];?>/<?=$lang_sport[20];?>">FT. O/E</font> </th>
      <th width="1" class="even"> </th>
    </tr>
  </tbody>
  <tbody id="tmplHeader_L_5">
    <tr>
      <th width="6%" nowrap title=" <?=$lang_sport[42];?>"> <?=$lang_sport[42];?> </th>
      <th width="350" colspan="2" class="even" align="left" title=" <?=$lang_sport[40];?>"> <?=$lang_sport[40];?> </th>
      <th align="right" nowrap="nowrap" class="text-ellipsis" style="width: 69px; max-width: 69px;"> <font title="<?=$lang_sport[129];?>"><?=$lang_sport[129];?></font> </th>
      <th width="80" class="even"> <font title="<?=$lang_sport[44];?> <?=$lang_sport[116];?>">FT. HDP</font> </th>
      <th width="80"> <font title="Full Time Game Handicap">FT. Game HDP</font> </th>
      <th width="80" class="even"> <font title="<?=$lang_sport[44];?> <?=$lang_sport[120];?>/<?=$lang_sport[121];?>">FT. O/U</font> </th>
      <th width="80" class="even"> <font title="<?=$lang_sport[44];?> <?=$lang_sport[19];?>/<?=$lang_sport[20];?>">FT. O/E</font> </th>
      <th width="1"> </th>
    </tr>
  </tbody>
  <tbody id="tmplHeader_5">
    <tr>
      <th width="6%" nowrap title=" <?=$lang_sport[42];?>"> <?=$lang_sport[42];?> </th>
      <th width="350" colspan="2" class="even" align="left" title=" <?=$lang_sport[40];?>"> <?=$lang_sport[40];?> </th>
      <th align="right" nowrap="nowrap" class="text-ellipsis" style="width: 69px; max-width: 69px;"> <font title="<?=$lang_sport[129];?>"><?=$lang_sport[129];?></font> </th>
      <th width="80" class="even"> <font title="<?=$lang_sport[44];?> <?=$lang_sport[116];?>">FT. HDP</font> </th>
      <th width="80"> <font title="Full Time Game Handicap">FT. Game HDP</font> </th>
      <th width="80" class="even"> <font title="<?=$lang_sport[44];?> <?=$lang_sport[120];?>/<?=$lang_sport[121];?>">FT. O/U</font> </th>
      <th width="80" class="even"> <font title="<?=$lang_sport[44];?> <?=$lang_sport[19];?>/<?=$lang_sport[20];?>">FT. O/E</font> </th>
      <th width="1"> </th>
    </tr>
  </tbody>
  <tbody id="tmplHeader_154">
    <tr>
      <th width="6%" nowrap title=" <?=$lang_sport[42];?>"> <?=$lang_sport[42];?> </th>
      <th colspan="6" class="even" align="left" title=" <?=$lang_sport[40];?>"> <?=$lang_sport[40];?> </th>
      <th width="130" align="right" title=" <?=$lang_sport[129];?>"> <?=$lang_sport[129];?> </th>
      <!--<th width="1"></th>--> 
    </tr>
  </tbody>
  <tbody id="tmplHeader_43">
    <tr>
	  <th class="time" nowrap="" title=" <?=$lang_sport[42];?>"> <?=$lang_sport[42];?> </th>
      <th class="event" colspan="2" align="left" title=" <?=$lang_sport[40];?>"> <?=$lang_sport[40];?> </th>
      <th class="moneyline" align="right" title=" <?=$lang_sport[129];?>"> <?=$lang_sport[129];?> </th>
      <th class="fthdp"> <font title="<?=$lang_sport[44];?> <?=$lang_sport[116];?>">FT. HDP</font> </th>
      <th class="ftou"> <font title="<?=$lang_sport[44];?> <?=$lang_sport[120];?>/<?=$lang_sport[121];?>">FT. O/U</font> </th>
      <th class="ftoe"> <font title="<?=$lang_sport[44];?> <?=$lang_sport[19];?>/<?=$lang_sport[20];?>">FT. O/E</font> </th>
      <th class="more"> </th>
    </tr>
  </tbody>
  <tbody id="tmplHeader_L_43">
    <tr>
	  <th class="time" nowrap="" title=" <?=$lang_sport[42];?>"> <?=$lang_sport[42];?> </th>
      <th class="event" colspan="2" align="left" title=" <?=$lang_sport[40];?>"> <?=$lang_sport[40];?> </th>
      <th class="moneyline" align="right" title=" <?=$lang_sport[129];?>"> <?=$lang_sport[129];?> </th>
      <th class="fthdp"> <font title="<?=$lang_sport[44];?> <?=$lang_sport[116];?>">FT. HDP</font> </th>
      <th class="ftou"> <font title="<?=$lang_sport[44];?> <?=$lang_sport[120];?>/<?=$lang_sport[121];?>">FT. O/U</font> </th>
      <th class="ftoe"> <font title="<?=$lang_sport[44];?> <?=$lang_sport[19];?>/<?=$lang_sport[20];?>">FT. O/E</font> </th>
      <th class="more"> </th>
    </tr>
  </tbody>
  <tbody id="tmplLeague_L">
    <tr id="l_{%LeagueId}" onclick="refreshData_L()" style="cursor: pointer">
      <td class="tabtitle"></td>
      <td colspan="5" class="tabtitle"> {@FavLeagues}{%LeagueName} </td>
      <td colspan="2" class="tabtitle" align="right" nowrap><a name="btnRefresh_L" class="btnIcon right disable">
        <div class="icon-refresh" title="<?=$lang_sport[37];?>"> </div>
        </a></td>
    </tr>
  </tbody>
  <tbody id="tmplLeague_L_5">
    <tr id="l_{%LeagueId}" onclick="refreshData_L()" style="cursor: pointer">
      <td class="tabtitle"></td>
      <td colspan="6" class="tabtitle"> {@FavLeagues}{%LeagueName} </td>
      <td colspan="2" class="tabtitle" align="right" nowrap><a name="btnRefresh_L" class="btnIcon right disable">
        <div class="icon-refresh" title="<?=$lang_sport[37];?>"> </div>
        </a></td>
    </tr>
  </tbody>
  <tbody id="tmplLeague_L_50">
    <tr id="l_{%LeagueId}" onclick="refreshData_L()" style="cursor: pointer">
      <td class="tabtitle"></td>
      <td colspan="6" class="tabtitle"> {@FavLeagues}{%LeagueName} </td>
      <td colspan="2" class="tabtitle" align="right" nowrap><a name="btnRefresh_L" class="btnIcon right disable">
        <div class="icon-refresh" title="<?=$lang_sport[37];?>"> </div>
        </a></td>
    </tr>
  </tbody>
  <tbody id="tmplLive">
    <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
      <td class="text_time {%Changed_Score}"><div class="{@TimeSuspendCls1}"> <b>{@Round}</b></div><div nowrap class="{@LiveTimeCls}"> {%ShowTime}</div></td>
      <td class="line_unR"><div class="{@Home_Cls}"> {%HomeName}</div>
        <div class="{@Away_Cls}"> {%AwayName}</div></td>
      <td align="right" valign="middle" style="white-space: nowrap" width="8%"> {@SportRadarInfo}{@Streaming}{@Favorites} </td>
      <td class="none_rline"><div class="line_divL line_divR {%Changed_20}"> <a class="{@Odds_20_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','h','{%Odds_20_H}',20)"> {%Odds_20_H}</a><br />
          <a class="{@Odds_20_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','a','{%Odds_20_A}',20)"> {%Odds_20_A}</a> </div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {@Value_1_H}<br />
          {@Value_1_A}</div>
        <div class="line_divR OddsDiv {%Changed_1}"> <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)"> {%Odds_1_H}</a><br />
          <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)"> {%Odds_1_A}</a> </div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {%Goal_3}<br />
          {@UNDER_3}</div>
        <div class="line_divR OddsDiv {%Changed_3}"> <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)"> {%Odds_3_O}</a><br />
          <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)"> {%Odds_3_U}</a> </div></td>
      <td><div class="line_divL HdpGoalClass"> {@ODD_2}<br />
          {@EVEN_2}</div>
        <div class="line_divR OddsDiv {%Changed_2}"> <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)"> {%Odds_2_O}</a><br />
          <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)"> {%Odds_2_E}</a> </div></td>
      <td align="center"> {@StatsInfo} </td>
    </tr>
  </tbody>
  <tbody id="tmplLive_51" title="tmplLive_49"></tbody>
  <tbody id="tmplLive_49">
    <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
      <td class="text_time {%Changed_Score}"><span class="{@TimeSuspendCls} HalfTime">T.Out</span>
        <div class="{@TimeSuspendCls1}"> <b>{%ScoreH}-{%ScoreA}</b></div>
        <div nowrap class="{@LiveTimeCls}"> {%ShowTime}</div></td>
      <td class="line_unR"><div class="{@Home_Cls}"> {%HomeName}</div>
        <div class="{@Away_Cls}"> {%AwayName}</div></td>
      <td align="right" valign="middle" style="white-space: nowrap" width="8%"> {@SportRadarInfo}{@Streaming}{@Favorites} </td>
      <td class="none_rline"><div class="line_divL line_divR {%Changed_20}"> <a class="{@Odds_20_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','h','{%Odds_20_H}',20)"> {%Odds_20_H}</a><br />
          <a class="{@Odds_20_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','a','{%Odds_20_A}',20)"> {%Odds_20_A}</a> </div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {@Value_1_H}<br />
          {@Value_1_A}</div>
        <div class="line_divR OddsDiv {%Changed_1}"> <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)"> {%Odds_1_H}</a><br />
          <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)"> {%Odds_1_A}</a> </div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {%Goal_3}<br />
          {@UNDER_3}</div>
        <div class="line_divR OddsDiv {%Changed_3}"> <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)"> {%Odds_3_O}</a><br />
          <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)"> {%Odds_3_U}</a> </div></td>
      <td><div class="line_divL HdpGoalClass"> {@ODD_2}<br />
        {@EVEN_2}</div>
        <div class="line_divR OddsDiv {%Changed_2}"> <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)"> {%Odds_2_O}</a><br />
          <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)"> {%Odds_2_E}</a> </div></td>
      <td align="center"> {@StatsInfo} </td>
    </tr>
  </tbody>
  <!-- For beach soccer only
  <tbody id="tmplLive_99">
    <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
      <td class="text_time {%Changed_Score}"><b>{%ScoreH}-{%ScoreA}</b><div nowrap class="{@LiveTimeCls}"> {%ShowTime}</div></td>
      <td class="line_unR"><div class="{@Home_Cls}"> {%HomeName}</div>
        <div class="{@Away_Cls}"> {%AwayName}</div></td>
      <td align="right" valign="middle" style="white-space: nowrap" width="8%"> {@SportRadarInfo}{@Streaming}{@Favorites} </td>
      <td class="none_rline"><div class="line_divL line_divR {%Changed_20}"> <a class="{@Odds_20_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','h','{%Odds_20_H}',20)"> {%Odds_20_H}</a><br />
          <a class="{@Odds_20_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','a','{%Odds_20_A}',20)"> {%Odds_20_A}</a> </div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {@Value_1_H}<br />
          {@Value_1_A}</div>
        <div class="line_divR OddsDiv {%Changed_1}"> <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)"> {%Odds_1_H}</a><br />
          <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)"> {%Odds_1_A}</a> </div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {%Goal_3}<br />
          {@UNDER_3}</div>
        <div class="line_divR OddsDiv {%Changed_3}"> <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)"> {%Odds_3_O}</a><br />
          <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)"> {%Odds_3_U}</a> </div></td>
      <td><div class="line_divL HdpGoalClass"> {@ODD_2}<br />
          {@EVEN_2}</div>
        <div class="line_divR OddsDiv {%Changed_2}"> <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)"> {%Odds_2_O}</a><br />
          <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)"> {%Odds_2_E}</a> </div></td>
      <td align="center"> {@StatsInfo} </td>
    </tr>
  </tbody> -->
  <tbody id="tmplLive_43">
    <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
      <td class="text_time"><div nowrap class="{@LiveTimeCls}"> <?=$lang_sport[99];?></div></td>
      <td class="line_unR"><div class="{@Home_Cls}"> {%HomeName}</div>
        <div class="{@Away_Cls}"> {%AwayName}</div></td>
      <td align="right" valign="middle" style="white-space: nowrap" width="8%"> {@SportRadarInfo}{@Streaming}{@Favorites} </td>
      <td class="none_rline"><div class="line_divL line_divR {%Changed_20}"> <a class="{@Odds_20_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','h','{%Odds_20_H}',20)"> {%Odds_20_H}</a><br />
          <a class="{@Odds_20_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','a','{%Odds_20_A}',20)"> {%Odds_20_A}</a> </div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {@Value_1_H}<br />
          {@Value_1_A}</div>
        <div class="line_divR OddsDiv {%Changed_1}"> <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)"> {%Odds_1_H}</a><br />
          <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)"> {%Odds_1_A}</a> </div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {%Goal_3}<br />
          {@UNDER_3}</div>
        <div class="line_divR OddsDiv {%Changed_3}"> <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)"> {%Odds_3_O}</a><br />
          <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)"> {%Odds_3_U}</a> </div></td>
      <td><div class="line_divL HdpGoalClass"> {@ODD_2}<br />
        {@EVEN_2}</div>
        <div class="line_divR OddsDiv {%Changed_2}"> <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)"> {%Odds_2_O}</a><br />
          <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)"> {%Odds_2_E}</a> </div></td>
      <td align="center"> {@StatsInfo} </td>
    </tr>
  </tbody>
  <tbody id="tmplLiveFooter_43">
    <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
      <td class="text_time"><div nowrap class="{@LiveTimeCls}"> <?=$lang_sport[99];?></div></td>
      <td class="line_unR"><div class="{@Home_Cls}"> {%HomeName}</div>
        <div class="{@Away_Cls}"> {%AwayName}</div></td>
      <td align="right" valign="middle" style="white-space: nowrap" width="8%"> {@SportRadarInfo}{@Streaming}{@Favorites} </td>
      <td class="none_rline"><div class="line_divL line_divR {%Changed_20}"> <a class="{@Odds_20_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','h','{%Odds_20_H}',20)"> {%Odds_20_H}</a><br />
          <a class="{@Odds_20_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','a','{%Odds_20_A}',20)"> {%Odds_20_A}</a> </div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {@Value_1_H}<br />
          {@Value_1_A}</div>
        <div class="line_divR OddsDiv {%Changed_1}"> <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)"> {%Odds_1_H}</a><br />
          <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)"> {%Odds_1_A}</a> </div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {%Goal_3}<br />
          {@UNDER_3}</div>
        <div class="line_divR OddsDiv {%Changed_3}"> <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)"> {%Odds_3_O}</a><br />
          <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)"> {%Odds_3_U}</a> </div></td>
      <td><div class="line_divL HdpGoalClass"> {@ODD_2}<br />
        {@EVEN_2}</div>
        <div class="line_divR OddsDiv {%Changed_2}"> <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)"> {%Odds_2_O}</a><br />
          <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)"> {%Odds_2_E}</a> </div></td>
      <td align="center"><div title="More Bet Types">{@More}</div> {@StatsInfo} </td>
    </tr>
	<tr class="{@Tr_Cls}">
      <td id="more_{%MatchId}" class="moreBetType tag {@Display_More}" colspan="8"> {@MoreData} </td>
    </tr>
  </tbody>
  <tbody id="tmplLive_50">
    <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
      <td class="text_time {%Changed_Score}"><b>{%ScoreH}-{%ScoreA}</b>
        <div nowrap class="{@LiveTimeCls}">{%ShowTime}</div></td>
      <td class="line_unR" valign='top'><div class="{@Home_Cls}"> {%HomeName}</div>
        <div class="{@Away_Cls}"> {%AwayName}</div><div>{@Draw}</div> </td></td>
      <td align="right" valign="middle" style="white-space: nowrap" width="5%"> {@SportRadarInfo}{@Streaming}{@Favorites} </td>
      <td class="none_rline" valign='top'>
        <div class="line_divL line_divR {%Changed_5}">
            <a class="{@Odds_5_1_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_5}','1','{%Odds_5_1}',5)">{%Odds_5_1}</a><br />
            <a class="{@Odds_5_2_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_5}','2','{%Odds_5_2}',5)">{%Odds_5_2}</a><br />
            <a class="{@Odds_5_X_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_5}','X','{%Odds_5_X}',5)">{%Odds_5_X}</a>
        </div>
      </td>
      <td class="none_rline" valign='top'><div class="line_divL line_divR {%Changed_501}"> <a class="{@Odds_501_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_501}','h','{@Odds_501_H}',501)"> {@Odds_501_H}</a><br />
          <a class="{@Odds_501_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_501}','a','{@Odds_501_A}',501)"> {@Odds_501_A}</a> </div></td>
      <td class="none_rline" valign='top'><div class="line_divL HdpGoalClass"> {@Value_1_H}<br />
          {@Value_1_A}</div>
        <div class="line_divR OddsDiv {%Changed_1}"> <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)"> {%Odds_1_H}</a><br />
          <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)"> {%Odds_1_A}</a> </div></td>
      <td class="none_rline" valign='top'><div class="line_divL HdpGoalClass"> {%Goal_3}<br />
          {@UNDER_3}</div>
        <div class="line_divR OddsDiv {%Changed_3}"> <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)"> {%Odds_3_O}</a><br />
          <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)"> {%Odds_3_U}</a> </div></td>
      <td valign='top'><div class="line_divL HdpGoalClass"> {@ODD_2}<br />
          {@EVEN_2}</div>
        <div class="line_divR OddsDiv {%Changed_2}"> <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)"> {%Odds_2_O}</a><br />
          <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)"> {%Odds_2_E}</a> </div></td>
      <td align="center"> {@StatsInfo} </td>
    </tr>
  </tbody>
  <tbody id="tmplLive_5">
    <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
      <td class="text_time"><div class="{@TimeSuspendCls}"> <span class="iconInfo rain"></span> </div>
        <div nowrap class="{@LiveTimeCls}"> {%ShowTime}</div></td>
      <td class="line_unR"><div class="{@Home_Cls}"> {%HomeName}</div>
        <div class="{@Away_Cls}"> {%AwayName}</div></td>
      <td align="right" valign="middle" style="white-space: nowrap" width="5%"> {@SportRadarInfo}{@Streaming}{@Favorites} </td>
      <td class="none_rline"><div class="line_divL line_divR {%Changed_20}"> <a class="{@Odds_20_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','h','{%Odds_20_H}',20)"> {%Odds_20_H}</a><br />
          <a class="{@Odds_20_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','a','{%Odds_20_A}',20)"> {%Odds_20_A}</a> </div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {@Value_1_H}<br />
          {@Value_1_A}</div>
        <div class="line_divR OddsDiv {%Changed_1}"> <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)"> {%Odds_1_H}</a><br />
          <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)"> {%Odds_1_A}</a> </div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {@Value_153_H}<br />
          {@Value_153_A}</div>
        <div class="line_divR OddsDiv {%Changed_153}"> <a class="{@Odds_153_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_153}','h','{%Odds_153_H}',153)"> {%Odds_153_H}</a><br />
          <a class="{@Odds_153_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_153}','a','{%Odds_153_A}',153)"> {%Odds_153_A}</a> </div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {%Goal_3}<br />
          {@UNDER_3}</div>
        <div class="line_divR OddsDiv {%Changed_3}"> <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)"> {%Odds_3_O}</a><br />
          <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)"> {%Odds_3_U}</a> </div></td>
      <td><div class="line_divL HdpGoalClass"> {@ODD_2}<br />
          {@EVEN_2}</div>
        <div class="line_divR OddsDiv {%Changed_2}"> <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)"> {%Odds_2_O}</a><br />
          <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)"> {%Odds_2_E}</a> </div></td>
      <td align="center"><div title="More Bet Types">{@More}</div>
        {@StatsInfo} </td>
    </tr>
    <tr class="{@Tr_Cls}">
      <td id="more_{%MatchId}" class="moreBetType reset {@Display_More}" colspan="9"> {@MoreData} </td>
    </tr>
  </tbody>
  <tbody id="tmplLive_6">
    <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
      <td class="text_time"><span class="{@TimeSuspendCls} HalfTime">T.Out</span>
        <div nowrap class="{@LiveTimeCls}"> {%ShowTime}</div></td>
      <td class="line_unR"><div class="{@Home_Cls}"> {%HomeName}</div>
        <div class="{@Away_Cls}"> {%AwayName}</div></td>
      <td align="right" valign="middle" style="white-space: nowrap" width="8%"> {@SportRadarInfo}{@Streaming}{@Favorites} </td>
      <td class="none_rline"><div class="line_divL line_divR {%Changed_20}"> <a class="{@Odds_20_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','h','{%Odds_20_H}',20)"> {%Odds_20_H}</a><br />
          <a class="{@Odds_20_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','a','{%Odds_20_A}',20)"> {%Odds_20_A}</a> </div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {@Value_1_H}<br />
          {@Value_1_A}</div>
        <div class="line_divR OddsDiv {%Changed_1}"> <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)"> {%Odds_1_H}</a><br />
          <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)"> {%Odds_1_A}</a> </div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {%Goal_3}<br />
          {@UNDER_3}</div>
        <div class="line_divR OddsDiv {%Changed_3}"> <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)"> {%Odds_3_O}</a><br />
          <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)"> {%Odds_3_U}</a> </div></td>
      <td><div class="line_divL HdpGoalClass"> {@ODD_2}<br />
          {@EVEN_2}</div>
        <div class="line_divR OddsDiv {%Changed_2}"> <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)"> {%Odds_2_O}</a><br />
          <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)"> {%Odds_2_E}</a> </div></td>
      <td align="center"> {@StatsInfo} </td>
    </tr>
  </tbody>
  <!-- <tbody id="tmplLive_6" title="tmplLive_5"></tbody> -->
  <tbody id="tmplLive_48" title="tmplLive_9"></tbody>
  <tbody id="tmplLive_9">
    <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
      <td class="text_time"><div class="{@TimeSuspendCls}"> <span class="iconInfo rain"></span> </div>
        <div nowrap class="{@LiveTimeCls}"> {%ShowTime}</div></td>
      <td class="line_unR"><div class="{@Home_Cls}"> {%HomeName}</div>
        <div class="{@Away_Cls}"> {%AwayName}</div></td>
      <td align="right" valign="middle" style="white-space: nowrap" width="5%"> {@SportRadarInfo}{@Streaming}{@Favorites} </td>
      <td class="none_rline"><div class="line_divL line_divR {%Changed_20}"> <a class="{@Odds_20_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','h','{%Odds_20_H}',20)"> {%Odds_20_H}</a><br />
          <a class="{@Odds_20_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','a','{%Odds_20_A}',20)"> {%Odds_20_A}</a> </div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {@Value_1_H}<br />
          {@Value_1_A}</div>
        <div class="line_divR OddsDiv {%Changed_1}"> <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)"> {%Odds_1_H}</a><br />
          <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)"> {%Odds_1_A}</a> </div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {%Goal_3}<br />
          {@UNDER_3}</div>
        <div class="line_divR OddsDiv {%Changed_3}"> <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)"> {%Odds_3_O}</a><br />
          <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)"> {%Odds_3_U}</a> </div></td>
      <td><div class="line_divL HdpGoalClass"> {@ODD_2}<br />
          {@EVEN_2}</div>
        <div class="line_divR OddsDiv {%Changed_2}"> <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)"> {%Odds_2_O}</a><br />
          <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)"> {%Odds_2_E}</a> </div></td>
      <td align="center"><div title="More Bet Types">{@More}</div>
        {@StatsInfo} </td>
    </tr>
    <tr class="{@Tr_Cls}">
      <td id="Td1" class="moreBetType reset {@Display_More}" colspan="9"> {@MoreData} </td>
    </tr>
  </tbody>
  <tbody id="tmplLive_47">
    <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
      <td class="text_time"><span class="{@TimeSuspendCls} HalfTime">T.Out</span>
        <div nowrap class="{@LiveTimeCls}"> {%ShowTime}</div></td>
      <td class="line_unR"><div class="{@Home_Cls}"> {%HomeName}</div>
        <div class="{@Away_Cls}"> {%AwayName}</div></td>
      <td align="right" valign="middle" style="white-space: nowrap" width="8%"> {@SportRadarInfo}{@Streaming}{@Favorites} </td>
      <td class="none_rline"><div class="line_divL line_divR {%Changed_20}"> <a class="{@Odds_20_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','h','{%Odds_20_H}',20)"> {%Odds_20_H}</a><br />
          <a class="{@Odds_20_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','a','{%Odds_20_A}',20)"> {%Odds_20_A}</a> </div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {@Value_1_H}<br />
          {@Value_1_A}</div>
        <div class="line_divR OddsDiv {%Changed_1}"> <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)"> {%Odds_1_H}</a><br />
          <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)"> {%Odds_1_A}</a> </div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {%Goal_3}<br />
          {@UNDER_3}</div>
        <div class="line_divR OddsDiv {%Changed_3}"> <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)"> {%Odds_3_O}</a><br />
          <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)"> {%Odds_3_U}</a> </div></td>
      <td><div class="line_divL HdpGoalClass"> {@ODD_2}<br />
          {@EVEN_2}</div>
        <div class="line_divR OddsDiv {%Changed_2}"> <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)"> {%Odds_2_O}</a><br />
          <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)"> {%Odds_2_E}</a> </div></td>
      <td align="center"> {@StatsInfo} </td>
    </tr>
  </tbody>
  <tbody id="tmplLive_4">
    <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
      <td class="text_time {%Changed_Score}"><span class="{@TimeSuspendCls} HalfTime">T.Out</span>
        <div class="{@TimeSuspendCls1}"> <b>{%ScoreH}-{%ScoreA}</b></div>
        <div nowrap class="{@LiveTimeCls}"> {%ShowTime}</div></td>
      <td class="line_unR"><div class="{@Home_Cls}"> {%HomeName}</div>
        <div class="{@Away_Cls}"> {%AwayName}</div></td>
      <td align="right" valign="middle" style="white-space: nowrap" width="8%"> {@SportRadarInfo}{@Streaming}{@Favorites} </td>
      <td class="none_rline"><div class="line_divL line_divR {%Changed_20}"> <a class="{@Odds_20_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','h','{%Odds_20_H}',20)"> {%Odds_20_H}</a><br />
          <a class="{@Odds_20_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','a','{%Odds_20_A}',20)"> {%Odds_20_A}</a> </div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {@Value_1_H}<br />
          {@Value_1_A}</div>
        <div class="line_divR OddsDiv {%Changed_1}"> <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)"> {%Odds_1_H}</a><br />
          <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)"> {%Odds_1_A}</a> </div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {%Goal_3}<br />
          {@UNDER_3}</div>
        <div class="line_divR OddsDiv {%Changed_3}"> <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)"> {%Odds_3_O}</a><br />
          <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)"> {%Odds_3_U}</a> </div></td>
      <td><div class="line_divL HdpGoalClass"> {@ODD_2}<br />
          {@EVEN_2}</div>
        <div class="line_divR OddsDiv {%Changed_2}"> <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)"> {%Odds_2_O}</a><br />
          <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)"> {%Odds_2_E}</a> </div></td>
      <td align="center"> {@StatsInfo} </td>
    </tr>
  </tbody>
  <tbody id="tmplLive_28" title="tmplLive_4">
  </tbody>
  <tbody id="tmplLiveFooter_4">
    <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
      <td class="text_time {%Changed_Score}"><div class="{@TimeSuspendCls}"> <span class="{@TimeSuspendCls} HalfTime">T.Out</span></div>
        <div class="{@TimeSuspendCls1}"> <b>{%ScoreH}-{%ScoreA}</b></div>
        <div nowrap class="{@LiveTimeCls}"> {%ShowTime}</div></td>
      <td class="line_unR"><div class="{@Home_Cls}"> {%HomeName}</div>
        <div class="{@Away_Cls}"> {%AwayName}</div></td>
      <td align="right" valign="middle" style="white-space: nowrap" width="8%"> {@SportRadarInfo}{@Streaming}<span style="display: inline-block;" class="{@LS_Status}"><span
                        class="iconOdds info {@LS_Status_IMG}" title="<?=$lang_sport[128];?>" onclick="javascript:View_LS(this,'{%MUID}','{%GS}')"></span></span>{@Favorites} </td>
      <td class="none_rline"><div class="line_divR {%Changed_20}"> <a class="{@Odds_20_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','h','{%Odds_20_H}',20)"> {%Odds_20_H}</a><br />
          <a class="{@Odds_20_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','a','{%Odds_20_A}',20)"> {%Odds_20_A}</a></div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {@Value_1_H}<br />
          {@Value_1_A}</div>
        <div class="line_divR OddsDiv {%Changed_1}"> <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)"> {%Odds_1_H}</a><br />
          <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)"> {%Odds_1_A}</a></div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {%Goal_3}<br />
          {@UNDER_3}</div>
        <div class="line_divR OddsDiv {%Changed_3}"> <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)"> {%Odds_3_O}</a><br />
          <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)"> {%Odds_3_U}</a></div></td>
      <td><div class="line_divL HdpGoalClass"> {@ODD_2}<br />
          {@EVEN_2}</div>
        <div class="line_divR OddsDiv {%Changed_2}"> <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)"> {%Odds_2_O}</a><br />
          <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)"> {%Odds_2_E}</a></div></td>
      <td align="center"> {@StatsInfo} </td>
    </tr>
    <tr id="LS_{%MUID}_3" class="{@LS_display_3}">
      <td valign="top" class="score_box" style="border-right-style: none"><table border="0" align="right" cellpadding="0" cellspacing="0">
          <tr>
            <td style="width: 15px; height: 15px"><span class="iconInfo hockeyPP {@PP1}" title=" Power Play"></span></td>
          </tr>
          <tr>
            <td style="width: 15px; height: 15px"><span class="iconInfo hockeyPP {@PP2}" title=" Power Play"></span></td>
          </tr>
        </table></td>
      <td colspan="7" class="score_box"><div class="line_divL" style="width: 160px;">
          <div class="{@Home_Cls} text-ellipsis" title=" {@HomeName_t}"> {@HomeName_t}</div>
          <div class="{@Away_Cls} text-ellipsis" title=" {@AwayName_t}"> {@AwayName_t}</div>
        </div>
        <div class="line_divR">
          <table border="0" align="right" cellpadding="0" cellspacing="0" class="score_box">
            <tr>
              <td width="80"><div style="height: 18px;"> <span class="iconInfo hockey {@HPP5} right" style="margin: 1px;"></span><span class="iconInfo hockey {@HPP4} right"
                                            style="margin: 1px;"></span><span class="iconInfo hockey {@HPP3} right" style="margin: 1px;"> </span><span class="iconInfo hockey {@HPP2} right" style="margin: 1px;"></span> <span class="iconInfo hockey {@HPP1} right" style="margin: 1px;"></span> </div>
                <div style="height: 18px;"> <span class="iconInfo hockey {@APP5} right" style="margin: 1px;"></span><span class="iconInfo hockey {@APP4} right"
                                            style="margin: 1px;"></span><span class="iconInfo hockey {@APP3} right" style="margin: 1px;"> </span><span class="iconInfo hockey {@APP2} right" style="margin: 1px;"></span> <span class="iconInfo hockey {@APP1} right" style="margin: 1px;"></span> </div></td>
              <td width="80"><div class="{@LS_1S}">
                  <div class="{@Changed_1s} border line_divR">
                    <div class="line_b"> &nbsp;{%H1S}</div>
                    <div> &nbsp;{%A1S}</div>
                  </div>
                  <div class="line_divR">
                    <div class="text-ellipsis max_width" title=" 1P"> 1P</div>
                  </div>
                </div></td>
              <td width="80"><div class="{@LS_2S}">
                  <div class="{@Changed_2s} border line_divR">
                    <div class="line_b"> &nbsp;{%H2S}</div>
                    <div> &nbsp;{%A2S}</div>
                  </div>
                  <div class="line_divR">
                    <div class="text-ellipsis max_width" title=" 2P"> 2P</div>
                  </div>
                </div></td>
              <td width="80"><div class="{@LS_3S}">
                  <div class="{@Changed_3s} border line_divR">
                    <div class="line_b"> &nbsp;{%H3S}</div>
                    <div> &nbsp;{%A3S}</div>
                  </div>
                  <div class="line_divR">
                    <div class="text-ellipsis max_width" title=" 3P"> 3P</div>
                  </div>
                </div></td>
              <td width="82"><div class="{@LS_OT}">
                  <div class="{@ScoreChange_OT} border line_divR">
                    <div class="line_b"> &nbsp;{%HOT}</div>
                    <div> &nbsp;{%AOT}</div>
                  </div>
                  <div class="line_divR">
                    <div class="text-ellipsis max_width" title=" Overtime"> <?=$lang_sport[130];?></div>
                  </div>
                </div></td>
              <td width="100"><div class="box02">
                  <div class="{%Changed_Score} border line_r line_divR">
                    <div class="line_b"> &nbsp;{%HTG}</div>
                    <div> &nbsp;{%ATG}</div>
                  </div>
                  <div class="line_divR">
                    <div class="text-ellipsis max_width" title=" Total Goal"> Total Goal</div>
                  </div>
                </div></td>
            </tr>
          </table>
        </div></td>
    </tr>
  </tbody>
  <tbody id="tmplLiveFooter_7">
    <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
      <td class="text_time"><div class="{@TimeSuspendCls}"> <span class="iconInfo break"></span> </div>
        <div nowrap class="{@LiveTimeCls}"> {%ShowTime}</div></td>
      <td class="line_unR"><div class="{@Home_Cls}"> {%HomeName}</div>
        <div class="{@Away_Cls}"> {%AwayName}</div></td>
      <td align="right" valign="middle" style="white-space: nowrap" width="8%"> {@SportRadarInfo}{@Streaming}<span style="display: inline-block;" class="{@LS_Status}"><span
                        class="iconOdds info {@LS_Status_IMG}" title="<?=$lang_sport[128];?>" onclick="javascript:View_LS(this,'{%MUID}','{%GS}')"></span></span>{@Favorites} </td>
      <td class="none_rline"><div class="line_divR {%Changed_20}"> <a class="{@Odds_20_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','h','{%Odds_20_H}',20)"> {%Odds_20_H}</a><br />
          <a class="{@Odds_20_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','a','{%Odds_20_A}',20)"> {%Odds_20_A}</a></div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {@Value_1_H}<br />
          {@Value_1_A}</div>
        <div class="line_divR OddsDiv {%Changed_1}"> <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)"> {%Odds_1_H}</a><br />
          <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)"> {%Odds_1_A}</a></div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {%Goal_3}<br />
          {@UNDER_3}</div>
        <div class="line_divR OddsDiv {%Changed_3}"> <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)"> {%Odds_3_O}</a><br />
          <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)"> {%Odds_3_U}</a></div></td>
      <td><div class="line_divL HdpGoalClass"> {@ODD_2}<br />
          {@EVEN_2}</div>
        <div class="line_divR OddsDiv {%Changed_2}"> <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)"> {%Odds_2_O}</a><br />
          <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)"> {%Odds_2_E}</a></div></td>
      <td align="center"> {@StatsInfo} </td>
    </tr>
    <tr id="LS_{%MUID}_0" class="{@LS_display_0}">
      <td class="score_box" style="border-right-style: none"><table align="right" border="0" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td style="width: 15px; height: 15px"><span class="iconInfo injury displayOff" title="Injury"></span> 
                <!--img border='0' class="displayOff"  title="Injury" src="http://image.ibcbet.com/template/sportsbook/public/images/layout/Injury_break.gif" /--></td>
              <td style="width: 15px; height: 15px"><span class="iconInfo point {@SERVING1}" title="Turn"></span> 
                <!--img border='0' class="displayOn" title="Serve" src="http://image.ibcbet.com/template/sportsbook/public/images/layout/point.gif" /--></td>
            </tr>
            <tr>
              <td style="width: 15px; height: 15px"><span class="iconInfo injury displayOff" title="Injury"></span> 
                <!--img border='0' class="displayOff"  title="Injury" src="http://image.ibcbet.com/template/sportsbook/public/images/layout/Injury_break.gif" /--></td>
              <td style="width: 15px; height: 15px"><span class="iconInfo point {@SERVING2}" title="Turn"></span> 
                <!--img border='0' class="displayOff" title="Serve" src="http://image.ibcbet.com/template/sportsbook/public/images/layout/point.gif" /--></td>
            </tr>
          </tbody>
        </table></td>
      <td colspan="7" class="score_box"><div class="line_divL" style="width: 234px;">
          <div class="FavTeamClass text-ellipsis" title=" {@HomeName_t}"> {@HomeName_t}</div>
          <div class="UdrDogTeamClass text-ellipsis" title=" {@AwayName_t}"> {@AwayName_t}</div>
        </div>
        <div class="line_divR">
          <table class="score_box" align="right" border="0" cellpadding="0" cellspacing="0">
            <tbody>
              <tr>
                <td width="120"><div class="{@LS_1S}">
                    <div class="{@Changed_1s} border line_divR">
                      <div class="line_b"> &nbsp;{%HFM}</div>
                      <div> &nbsp;{%AFM}</div>
                    </div>
                    <div class="line_divR"> <span title=" Frames">Frames</span></div>
                  </div></td>
                <td width="120" class="baseball_LS1"><div class="box03">
                    <div class="{@Changed_Cfm} border line_divR"> &nbsp;{%CFM} </div>
                    <div class="line_divR"> <span title=" Current Frame">Current Frame</span></div>
                  </div></td>
                <td width="120"><div class="box02">
                    <div class="{%Changed_Pt} border line_divR">
                      <div class="line_b"> &nbsp;{%HPT}</div>
                      <div> &nbsp;{%APT}</div>
                    </div>
                    <div class="line_divR"> <span title=" Points">Pts</span></div>
                  </div></td>
              </tr>
            </tbody>
          </table>
        </div></td>
    </tr>
  </tbody>
  <tbody id="tmplLiveFooter_5">
    <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
      <td class="text_time"><div class="{@TimeSuspendCls}"> <span class="iconInfo rain"></span> </div>        
        <div nowrap class="{@LiveTimeCls}"> {%ShowTime}</div></td>
      <td class="line_unR"><div class="{@Home_Cls}"> {%HomeName}</div>
        <div class="{@Away_Cls}"> {%AwayName}</div></td>
      <td align="right" valign="middle" style="white-space: nowrap" width="5%"> {@SportRadarInfo}{@Streaming}<span style="display: inline-block;" class="{@LS_Status}"><span
                        class="iconOdds info {@LS_Status_IMG}" title="<?=$lang_sport[128];?>" onclick="javascript:View_LS(this,'{%MUID}','{%GS}')"></span></span>{@Favorites} </td>
      <td class="none_rline"><div class="line_divL line_divR {%Changed_20}"> <a class="{@Odds_20_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','h','{%Odds_20_H}',20)"> {%Odds_20_H}</a><br />
          <a class="{@Odds_20_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','a','{%Odds_20_A}',20)"> {%Odds_20_A}</a> </div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {@Value_1_H}<br />
          {@Value_1_A}</div>
        <div class="line_divR OddsDiv {%Changed_1}"> <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)"> {%Odds_1_H}</a><br />
          <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)"> {%Odds_1_A}</a> </div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {@Value_153_H}<br />
          {@Value_153_A}</div>
        <div class="line_divR OddsDiv {%Changed_153}"> <a class="{@Odds_153_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_153}','h','{%Odds_153_H}',153)"> {%Odds_153_H}</a><br />
          <a class="{@Odds_153_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_153}','a','{%Odds_153_A}',153)"> {%Odds_153_A}</a> </div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {%Goal_3}<br />
          {@UNDER_3}</div>
        <div class="line_divR OddsDiv {%Changed_3}"> <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)"> {%Odds_3_O}</a><br />
          <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)"> {%Odds_3_U}</a> </div></td>
      <td><div class="line_divL HdpGoalClass"> {@ODD_2}<br />
          {@EVEN_2}</div>
        <div class="line_divR OddsDiv {%Changed_2}"> <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)"> {%Odds_2_O}</a><br />
          <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)"> {%Odds_2_E}</a> </div></td>
      <td align="center"><div title="More Bet Types">{@More}</div>
        {@StatsInfo} </td>
    </tr>
    <tr id="LS_{%MUID}_3" class="{@LS_display_3}">
      <td valign="top" class="score_box" style="border-right-style: none"><table border="0" align="right" cellpadding="0" cellspacing="0">
          <tr>
            <td style="width: 15px; height: 15px"><span class="iconInfo injury {@HINJ}" title="Injury"></span> 
              <!--img border='0' class="{@HINJ}"  title="Injury" src="http://i.mbgfx.com/template/sportsbook/public/images/layout/Injury_break.gif" /--></td>
            <td style="width: 15px; height: 15px"><span class="iconInfo point {@SERVING1}" title="Serve"></span> 
              <!--img border='0' class="{@SERVING1}" title="Serve" src="http://i.mbgfx.com/template/sportsbook/public/images/layout/point.gif" /--></td>
          </tr>
          <tr>
            <td style="width: 15px; height: 15px"><span class="iconInfo injury {@AINJ}" title="Injury"></span> 
              <!--img border='0' class="{@AINJ}"  title="Injury" src="http://i.mbgfx.com/template/sportsbook/public/images/layout/Injury_break.gif" /--></td>
            <td style="width: 15px; height: 15px"><span class="iconInfo point {@SERVING2}" title="Serve"></span> 
              <!--img border='0' class="{@SERVING2}" title="Serve" src="http://i.mbgfx.com/template/sportsbook/public/images/layout/point.gif" /--></td>
          </tr>
        </table></td>
      <td colspan="8" class="score_box"><div class="line_divL" style="width: 150px;">
          <div class="{@Home_Cls} text-ellipsis" title=" {@HomeName_t}"> {@HomeName_t}</div>
          <div class="{@Away_Cls} text-ellipsis" title=" {@AwayName_t}"> {@AwayName_t}</div>
        </div>
        <div class="line_divR">
          <table border="0" align="right" cellpadding="0" cellspacing="0" class="score_box">
            <tr>
              <td width="83"><div class="box02">
                  <div class="{@Changed_Set} border line_divR">
                    <div class="line_b"> &nbsp;{@HS}</div>
                    <div> &nbsp;{@AS}</div>
                  </div>
                  <div class="line_divR">
                    <div class="text-ellipsis max_width" title="Set"> Set</div>
                  </div>
                </div></td>
              <td width="83"><div class="{@LS_1S}">
                  <div class="{@Changed_1s} border line_divR">
                    <div class="line_b"> &nbsp;{@H1S}</div>
                    <div> &nbsp;{@A1S}</div>
                  </div>
                  <div class="line_divR">
                    <div class="text-ellipsis max_width" title="1Set"> 1S</div>
                  </div>
                </div></td>
              <td width="83"><div class="{@LS_2S}">
                  <div class="{@Changed_2s} border line_divR">
                    <div class="line_b"> &nbsp;{@H2S}</div>
                    <div> &nbsp;{@A2S}</div>
                  </div>
                  <div class="line_divR">
                    <div class="text-ellipsis max_width" title="2Set"> 2S</div>
                  </div>
                </div></td>
              <td width="83"><div class="{@LS_3S}">
                  <div class="{@Changed_3s} border line_divR">
                    <div class="line_b"> &nbsp;{@H3S}</div>
                    <div> &nbsp;{@A3S}</div>
                  </div>
                  <div class="line_divR">
                    <div class="text-ellipsis max_width" title="3Set"> 3S</div>
                  </div>
                </div></td>
              <td width="87"><div class="box02">
                  <div class="{@Changed_Pt} border line_r line_divR">
                    <div class="line_b" title="{@HPT_TITLE}"> &nbsp;{@HPT}</div>
                    <div title="{@APT_TITLE}"> &nbsp;{@APT}</div>
                  </div>
                  <div class="line_divR">
                    <div class="text-ellipsis max_width" title=" {@GT_TITLE}"> {@GT3}</div>
                  </div>
                </div></td>
              <td width="100"><div class="box02">
                  <div class="border line_r line_divR">
                    <div class="line_b"> &nbsp;{@HTG}</div>
                    <div> &nbsp;{@ATG}</div>
                  </div>
                  <div class="line_divR">
                    <div class="text-ellipsis max_width" title="Total Games"> T.Games</div>
                  </div>
                </div></td>
            </tr>
          </table>
        </div></td>
    </tr>
    <tr id="LS_{%MUID}_5" class="{@LS_display_5}">
      <td valign="top" style="border-right-style: none" class="score_box"><table border="0" align="right" cellpadding="0" cellspacing="0">
          <tr>
            <td style="width: 15px; height: 15px"><span class="iconInfo injury {@HINJ}" title="Injury"></span> 
              <!--img border='0' class="{@HINJ}"  title="Injury" src="http://i.mbgfx.com/template/sportsbook/public/images/layout/Injury_break.gif" /--></td>
            <td style="width: 15px; height: 15px"><span class="iconInfo point {@SERVING1}" title="Serve"></span> 
              <!--img border='0' class="{@SERVING1}" title="Serve" src="http://i.mbgfx.com/template/sportsbook/public/images/layout/point.gif" /--></td>
          </tr>
          <tr>
            <td style="width: 15px; height: 15px"><span class="iconInfo injury {@AINJ}" title="Injury"></span> 
              <!--img border='0' class="{@AINJ}"  title="Injury" src="http://i.mbgfx.com/template/sportsbook/public/images/layout/Injury_break.gif" /--></td>
            <td style="width: 15px; height: 15px"><span class="iconInfo point {@SERVING2}" title="Serve"></span> 
              <!--img border='0' class="{@SERVING2}" title="Serve" src="http://i.mbgfx.com/template/sportsbook/public/images/layout/point.gif" /--></td>
          </tr>
        </table></td>
      <td colspan="8" class="score_box"><div class="line_divL" style="width: 100px;">
          <div class="{@Home_Cls} text-ellipsis" title=" {@HomeName_t}"> {@HomeName_t}</div>
          <div class="{@Away_Cls} text-ellipsis" title=" {@AwayName_t}"> {@AwayName_t}</div>
        </div>
        <div class="line_divR">
          <table border="0" align="right" cellpadding="0" cellspacing="0" class="score_box">
            <tr>
              <td width="82"><div class="box02">
                  <div class="{@Changed_Set} border line_divR">
                    <div class="line_b"> &nbsp;{@HS}</div>
                    <div> &nbsp;{@AS}</div>
                  </div>
                  <div class="line_divR">
                    <div class="text-ellipsis max_width" title="Set"> Set</div>
                  </div>
                </div></td>
              <td width="55"><div class="{@LS_1S}">
                  <div class="{@Changed_1s} border line_divR">
                    <div class="line_b"> &nbsp;{@H1S}</div>
                    <div> &nbsp;{@A1S}</div>
                  </div>
                  <div class="line_divR">
                    <div class="text-ellipsis max_width" title="1Set"> 1s</div>
                  </div>
                </div></td>
              <td width="55"><div class="{@LS_2S}">
                  <div class="{@Changed_2s} border line_divR">
                    <div class="line_b"> &nbsp;{@H2S}</div>
                    <div> &nbsp;{@A2S}</div>
                  </div>
                  <div class="line_divR">
                    <div class="text-ellipsis max_width" title="2Set"> 2s</div>
                  </div>
                </div></td>
              <td width="55"><div class="{@LS_3S}">
                  <div class="{@Changed_3s} border line_divR">
                    <div class="line_b"> &nbsp;{@H3S}</div>
                    <div> &nbsp;{@A3S}</div>
                  </div>
                  <div class="line_divR">
                    <div class="text-ellipsis max_width" title="3Set"> 3s</div>
                  </div>
                </div></td>
              <td width="55"><div class="{@LS_4S}">
                  <div class="{@Changed_4s} border line_divR">
                    <div class="line_b"> &nbsp;{@H4S}</div>
                    <div> &nbsp;{@A4S}</div>
                  </div>
                  <div class="line_divR">
                    <div class="text-ellipsis max_width" title="4Set"> 4s</div>
                  </div>
                </div></td>
              <td width="55"><div class="{@LS_5S}">
                  <div class="{@Changed_5s} border line_divR">
                    <div class="line_b"> &nbsp;{@H5S}</div>
                    <div> &nbsp;{@A5S}</div>
                  </div>
                  <div class="line_divR">
                    <div class="text-ellipsis max_width" title="5Set"> 5s</div>
                  </div>
                </div></td>
              <td width="85"><div class="box02">
                  <div class="{@Changed_Pt} border line_r line_divR">
                    <div class="line_b" title="{@HPT_TITLE}"> &nbsp;{@HPT}</div>
                    <div title="{@APT_TITLE}"> &nbsp;{@APT}</div>
                  </div>
                  <div class="line_divR">
                    <div class="text-ellipsis max_width" title="{@GT_TITLE}"> {@GT5}</div>
                  </div>
                </div></td>
              <td width="100"><div class="box02">
                  <div class="border line_r line_divR">
                    <div class="line_b"> &nbsp;{@HTG}</div>
                    <div> &nbsp;{@ATG}</div>
                  </div>
                  <div class="line_divR">
                    <div class="text-ellipsis max_width" title="Total Games"> T.Games</div>
                  </div>
                </div></td>
            </tr>
          </table>
        </div></td>
    </tr>
    <tr class="{@Tr_Cls}">
      <td id="more_{%MatchId}" class="moreBetType reset {@Display_More}" colspan="9"> {@MoreData} </td>
    </tr>
  </tbody>
  <tbody id="tmplLiveFooter_6">
    <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
      <td class="text_time"><span class="{@TimeSuspendCls} HalfTime">T.Out</span>
        <div nowrap class="{@LiveTimeCls}"> {%ShowTime}</div></td>
      <td class="line_unR"><div class="{@Home_Cls}"> {%HomeName}</div>
        <div class="{@Away_Cls}"> {%AwayName}</div></td>
      <td align="right" valign="middle" style="white-space: nowrap" width="8%"> {@SportRadarInfo}{@Streaming}<span style="display: inline-block;" class="{@LS_Status}"><span
                        class="iconOdds info {@LS_Status_IMG}" title="<?=$lang_sport[128];?>" onclick="javascript:View_LS(this,'{%MUID}','{%GS}')"></span></span>{@Favorites} </td>
      <td class="none_rline"><div class="line_divL line_divR {%Changed_20}"> <a class="{@Odds_20_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','h','{%Odds_20_H}',20)"> {%Odds_20_H}</a><br />
          <a class="{@Odds_20_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','a','{%Odds_20_A}',20)"> {%Odds_20_A}</a> </div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {@Value_1_H}<br />
          {@Value_1_A}</div>
        <div class="line_divR OddsDiv {%Changed_1}"> <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)"> {%Odds_1_H}</a><br />
          <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)"> {%Odds_1_A}</a> </div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {%Goal_3}<br />
          {@UNDER_3}</div>
        <div class="line_divR OddsDiv {%Changed_3}"> <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)"> {%Odds_3_O}</a><br />
          <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)"> {%Odds_3_U}</a> </div></td>
      <td><div class="line_divL HdpGoalClass"> {@ODD_2}<br />
          {@EVEN_2}</div>
        <div class="line_divR OddsDiv {%Changed_2}"> <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)"> {%Odds_2_O}</a><br />
          <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)"> {%Odds_2_E}</a> </div></td>
      <td align="center"> {@StatsInfo} </td>
    </tr>
    <tr id="LS_{%MUID}_3" class="{@LS_display_3}">
      <td valign="top" class="score_box" style="border-right-style: none"><table border="0" align="right" cellpadding="0" cellspacing="0">
          <tr>
            <td style="width: 15px; height: 15px"><span class="iconInfo injury {@HINJ}" title="Injury"></span> 
              <!--img border='0' class="{@HINJ}"  title="Injury" src="http://i.mbgfx.com/template/sportsbook/public/images/layout/Injury_break.gif" /--></td>
            <td style="width: 15px; height: 15px"><span class="iconInfo point {@SERVING1}" title="Serve"></span> 
              <!--img border='0' class="{@SERVING1}" title="Serve" src="http://i.mbgfx.com/template/sportsbook/public/images/layout/point.gif" /--></td>
          </tr>
          <tr>
            <td style="width: 15px; height: 15px"><span class="iconInfo injury {@AINJ}" title="Injury"></span> 
              <!--img border='0' class="{@AINJ}"  title="Injury" src="http://i.mbgfx.com/template/sportsbook/public/images/layout/Injury_break.gif" /--></td>
            <td style="width: 15px; height: 15px"><span class="iconInfo point {@SERVING2}" title="Serve"></span> 
              <!--img border='0' class="{@SERVING2}" title="Serve" src="http://i.mbgfx.com/template/sportsbook/public/images/layout/point.gif" /--></td>
          </tr>
        </table></td>
      <td colspan="7" class="score_box"><div class="line_divL" style="width: 230px;">
          <div class="{@Home_Cls} text-ellipsis" title=" {@HomeName_t}"> {@HomeName_t}</div>
          <div class="{@Away_Cls} text-ellipsis" title=" {@AwayName_t}"> {@AwayName_t}</div>
        </div>
        <div class="line_divR">
          <table border="0" align="right" cellpadding="0" cellspacing="0" class="score_box">
            <tr>
              <td width="83"><div class="box02">
                  <div class="{@Changed_Set} border line_divR">
                    <div class="line_b"> &nbsp;{@HS}</div>
                    <div> &nbsp;{@AS}</div>
                  </div>
                  <div class="line_divR">
                    <div class="text-ellipsis max_width" title="Set"> Set</div>
                  </div>
                </div></td>
              <td width="83"><div class="{@LS_1S}">
                  <div class="{@Changed_1s} border line_divR">
                    <div class="line_b"> &nbsp;{@H1S}</div>
                    <div> &nbsp;{@A1S}</div>
                  </div>
                  <div class="line_divR">
                    <div class="text-ellipsis max_width" title="1Set"> 1S</div>
                  </div>
                </div></td>
              <td width="83"><div class="{@LS_2S}">
                  <div class="{@Changed_2s} border line_divR">
                    <div class="line_b"> &nbsp;{@H2S}</div>
                    <div> &nbsp;{@A2S}</div>
                  </div>
                  <div class="line_divR">
                    <div class="text-ellipsis max_width" title="2Set"> 2S</div>
                  </div>
                </div></td>
              <td width="83"><div class="{@LS_3S}">
                  <div class="{@Changed_3s} border line_divR">
                    <div class="line_b"> &nbsp;{@H3S}</div>
                    <div> &nbsp;{@A3S}</div>
                  </div>
                  <div class="line_divR">
                    <div class="text-ellipsis max_width" title="3Set"> 3S</div>
                  </div>
                </div></td>
              <td width="100"><div class="box02">
                  <div class="border line_r line_divR">
                    <div class="line_b"> &nbsp;{@HTG}</div>
                    <div> &nbsp;{@ATG}</div>
                  </div>
                  <div class="line_divR">
                    <div class="text-ellipsis max_width" title="Total Points"> T.Points</div>
                  </div>
                </div></td>
            </tr>
          </table>
        </div></td>
    </tr>
    <tr id="LS_{%MUID}_5" class="{@LS_display_5}">
      <td valign="top" style="border-right-style: none" class="score_box"><table border="0" align="right" cellpadding="0" cellspacing="0">
          <tr>
            <td style="width: 15px; height: 15px"><span class="iconInfo injury {@HINJ}" title="Injury"></span> 
              <!--img border='0' class="{@HINJ}"  title="Injury" src="http://i.mbgfx.com/template/sportsbook/public/images/layout/Injury_break.gif" /--></td>
            <td style="width: 15px; height: 15px"><span class="iconInfo point {@SERVING1}" title="Serve"></span> 
              <!--img border='0' class="{@SERVING1}" title="Serve" src="http://i.mbgfx.com/template/sportsbook/public/images/layout/point.gif" /--></td>
          </tr>
          <tr>
            <td style="width: 15px; height: 15px"><span class="iconInfo injury {@AINJ}" title="Injury"></span> 
              <!--img border='0' class="{@AINJ}"  title="Injury" src="http://i.mbgfx.com/template/sportsbook/public/images/layout/Injury_break.gif" /--></td>
            <td style="width: 15px; height: 15px"><span class="iconInfo point {@SERVING2}" title="Serve"></span> 
              <!--img border='0' class="{@SERVING2}" title="Serve" src="http://i.mbgfx.com/template/sportsbook/public/images/layout/point.gif" /--></td>
          </tr>
        </table></td>
      <td colspan="7" class="score_box"><div class="line_divL" style="width: 180px;">
          <div class="{@Home_Cls} text-ellipsis" title=" {@HomeName_t}"> {@HomeName_t}</div>
          <div class="{@Away_Cls} text-ellipsis" title=" {@AwayName_t}"> {@AwayName_t}</div>
        </div>
        <div class="line_divR">
          <table border="0" align="right" cellpadding="0" cellspacing="0" class="score_box">
            <tr>
              <td width="82"><div class="box02">
                  <div class="{@Changed_Set} border line_divR">
                    <div class="line_b"> &nbsp;{@HS}</div>
                    <div> &nbsp;{@AS}</div>
                  </div>
                  <div class="line_divR">
                    <div class="text-ellipsis max_width" title="Set"> Set</div>
                  </div>
                </div></td>
              <td width="55"><div class="{@LS_1S}">
                  <div class="{@Changed_1s} border line_divR">
                    <div class="line_b"> &nbsp;{@H1S}</div>
                    <div> &nbsp;{@A1S}</div>
                  </div>
                  <div class="line_divR">
                    <div class="text-ellipsis max_width" title="1Set"> 1s</div>
                  </div>
                </div></td>
              <td width="55"><div class="{@LS_2S}">
                  <div class="{@Changed_2s} border line_divR">
                    <div class="line_b"> &nbsp;{@H2S}</div>
                    <div> &nbsp;{@A2S}</div>
                  </div>
                  <div class="line_divR">
                    <div class="text-ellipsis max_width" title="2Set"> 2s</div>
                  </div>
                </div></td>
              <td width="55"><div class="{@LS_3S}">
                  <div class="{@Changed_3s} border line_divR">
                    <div class="line_b"> &nbsp;{@H3S}</div>
                    <div> &nbsp;{@A3S}</div>
                  </div>
                  <div class="line_divR">
                    <div class="text-ellipsis max_width" title="3Set"> 3s</div>
                  </div>
                </div></td>
              <td width="55"><div class="{@LS_4S}">
                  <div class="{@Changed_4s} border line_divR">
                    <div class="line_b"> &nbsp;{@H4S}</div>
                    <div> &nbsp;{@A4S}</div>
                  </div>
                  <div class="line_divR">
                    <div class="text-ellipsis max_width" title="4Set"> 4s</div>
                  </div>
                </div></td>
              <td width="55"><div class="{@LS_5S}">
                  <div class="{@Changed_5s} border line_divR">
                    <div class="line_b"> &nbsp;{@H5S}</div>
                    <div> &nbsp;{@A5S}</div>
                  </div>
                  <div class="line_divR">
                    <div class="text-ellipsis max_width" title="5Set"> 5s</div>
                  </div>
                </div></td>
              <td width="100"><div class="box02">
                  <div class="border line_r line_divR">
                    <div class="line_b"> &nbsp;{@HTG}</div>
                    <div> &nbsp;{@ATG}</div>
                  </div>
                  <div class="line_divR">
                    <div class="text-ellipsis max_width" title="Total Points"> T.Points</div>
                  </div>
                </div></td>
            </tr>
          </table>
        </div></td>
    </tr>
  </tbody>
  <tbody id="tmplLiveFooter_48" title="tmplLiveFooter_9"></tbody>
  <tbody id="tmplLiveFooter_9">
    <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
      <td class="text_time"><div class="{@TimeSuspendCls}"> <span class="iconInfo rain"></span> </div>
        <div nowrap class="{@LiveTimeCls}"> {%ShowTime}</div></td>
      <td class="line_unR"><div class="{@Home_Cls}"> {%HomeName}</div>
        <div class="{@Away_Cls}"> {%AwayName}</div></td>
      <td align="right" valign="middle" style="white-space: nowrap" width="8%"> {@SportRadarInfo}{@Streaming}<span style="display: inline-block;" class="{@LS_Status}"><span
                        class="iconOdds info {@LS_Status_IMG}" title="<?=$lang_sport[128];?>" onclick="javascript:View_LS(this,'{%MUID}','{%GS}')"></span></span>{@Favorites} </td>
      <td class="none_rline"><div class="line_divL line_divR {%Changed_20}"> <a class="{@Odds_20_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','h','{%Odds_20_H}',20)"> {%Odds_20_H}</a><br />
          <a class="{@Odds_20_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','a','{%Odds_20_A}',20)"> {%Odds_20_A}</a> </div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {@Value_1_H}<br />
          {@Value_1_A}</div>
        <div class="line_divR OddsDiv {%Changed_1}"> <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)"> {%Odds_1_H}</a><br />
          <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)"> {%Odds_1_A}</a> </div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {%Goal_3}<br />
          {@UNDER_3}</div>
        <div class="line_divR OddsDiv {%Changed_3}"> <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)"> {%Odds_3_O}</a><br />
          <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)"> {%Odds_3_U}</a> </div></td>
      <td><div class="line_divL HdpGoalClass"> {@ODD_2}<br />
          {@EVEN_2}</div>
        <div class="line_divR OddsDiv {%Changed_2}"> <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)"> {%Odds_2_O}</a><br />
          <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)"> {%Odds_2_E}</a> </div></td>
      <td align="center"> {@StatsInfo} </td>
    </tr>
    <tr id="LS_{%MUID}_3" class="{@LS_display_3}">
      <td valign="top" class="score_box" style="border-right-style: none"><table border="0" align="right" cellpadding="0" cellspacing="0">
          <tr>
            <td style="width: 15px; height: 15px"><span class="iconInfo injury {@HINJ}" title="Injury"></span> 
              <!--img border='0' class="{@HINJ}"  title="Injury" src="http://i.mbgfx.com/template/sportsbook/public/images/layout/Injury_break.gif" /--></td>
            <td style="width: 15px; height: 15px"><span class="iconInfo point {@SERVING1}" title="Serve"></span> 
              <!--img border='0' class="{@SERVING1}" title="Serve" src="http://i.mbgfx.com/template/sportsbook/public/images/layout/point.gif" /--></td>
          </tr>
          <tr>
            <td style="width: 15px; height: 15px"><span class="iconInfo injury {@AINJ}" title="Injury"></span> 
              <!--img border='0' class="{@AINJ}"  title="Injury" src="http://i.mbgfx.com/template/sportsbook/public/images/layout/Injury_break.gif" /--></td>
            <td style="width: 15px; height: 15px"><span class="iconInfo point {@SERVING2}" title="Serve"></span> 
              <!--img border='0' class="{@SERVING2}" title="Serve" src="http://i.mbgfx.com/template/sportsbook/public/images/layout/point.gif" /--></td>
          </tr>
        </table></td>
      <td colspan="7" class="score_box"><div class="line_divL" style="width: 230px;">
          <div class="{@Home_Cls} text-ellipsis" title=" {@HomeName_t}"> {@HomeName_t}</div>
          <div class="{@Away_Cls} text-ellipsis" title=" {@AwayName_t}"> {@AwayName_t}</div>
        </div>
        <div class="line_divR">
          <table border="0" align="right" cellpadding="0" cellspacing="0" class="score_box">
            <tr>
              <td width="83"><div class="box02">
                  <div class="{@Changed_Set} border line_divR">
                    <div class="line_b"> &nbsp;{@HS}</div>
                    <div> &nbsp;{@AS}</div>
                  </div>
                  <div class="line_divR">
                    <div class="text-ellipsis max_width" title="Set"> Set</div>
                  </div>
                </div></td>
              <td width="83"><div class="{@LS_1S}">
                  <div class="{@Changed_1s} border line_divR">
                    <div class="line_b"> &nbsp;{@H1S}</div>
                    <div> &nbsp;{@A1S}</div>
                  </div>
                  <div class="line_divR">
                    <div class="text-ellipsis max_width" title="1Set"> 1S</div>
                  </div>
                </div></td>
              <td width="83"><div class="{@LS_2S}">
                  <div class="{@Changed_2s} border line_divR">
                    <div class="line_b"> &nbsp;{@H2S}</div>
                    <div> &nbsp;{@A2S}</div>
                  </div>
                  <div class="line_divR">
                    <div class="text-ellipsis max_width" title="2Set"> 2S</div>
                  </div>
                </div></td>
              <td width="83"><div class="{@LS_3S}">
                  <div class="{@Changed_3s} border line_divR">
                    <div class="line_b"> &nbsp;{@H3S}</div>
                    <div> &nbsp;{@A3S}</div>
                  </div>
                  <div class="line_divR">
                    <div class="text-ellipsis max_width" title="3Set"> 3S</div>
                  </div>
                </div></td>
              <td width="100"><div class="box02">
                  <div class="border line_r line_divR">
                    <div class="line_b"> &nbsp;{@HTG}</div>
                    <div> &nbsp;{@ATG}</div>
                  </div>
                  <div class="line_divR">
                    <div class="text-ellipsis max_width" title="Total Points"> T.Points</div>
                  </div>
                </div></td>
            </tr>
          </table>
        </div></td>
    </tr>
    <tr id="LS_{%MUID}_5" class="{@LS_display_5}">
      <td valign="top" class="score_box" style="border-right-style: none"><table border="0" align="right" cellpadding="0" cellspacing="0">
          <tr>
            <td style="width: 15px; height: 15px"><span class="iconInfo injury {@HINJ}" title="Injury"></span> 
              <!--img border='0' class="{@HINJ}"  title="Injury" src="http://i.mbgfx.com/template/sportsbook/public/images/layout/Injury_break.gif" /--></td>
            <td style="width: 15px; height: 15px"><span class="iconInfo point {@SERVING1}" title="Serve"></span> 
              <!--img border='0' class="{@SERVING1}" title="Serve" src="http://i.mbgfx.com/template/sportsbook/public/images/layout/point.gif" /--></td>
          </tr>
          <tr>
            <td style="width: 15px; height: 15px"><span class="iconInfo injury {@AINJ}" title="Injury"></span> 
              <!--img border='0' class="{@AINJ}"  title="Injury" src="http://i.mbgfx.com/template/sportsbook/public/images/layout/Injury_break.gif" /--></td>
            <td style="width: 15px; height: 15px"><span class="iconInfo point {@SERVING2}" title="Serve"></span> 
              <!--img border='0' class="{@SERVING2}" title="Serve" src="http://i.mbgfx.com/template/sportsbook/public/images/layout/point.gif" /--></td>
          </tr>
        </table></td>
      <td colspan="7" class="score_box"><div class="line_divL" style="width: 102px;">
          <div class="{@Home_Cls} text-ellipsis" title=" {@HomeName_t}"> {@HomeName_t}</div>
          <div class="{@Away_Cls} text-ellipsis" title=" {@AwayName_t}"> {@AwayName_t}</div>
        </div>
        <div class="line_divR">
          <table border="0" align="right" cellpadding="0" cellspacing="0" class="score_box">
            <tr>
              <td width="82"><div class="box02">
                  <div class="{@Changed_Set} border line_divR">
                    <div class="line_b"> &nbsp;{@HS}</div>
                    <div> &nbsp;{@AS}</div>
                  </div>
                  <div class="line_divR">
                    <div class="text-ellipsis max_width" title="Set"> Set</div>
                  </div>
                </div></td>
              <td width="83"><div class="{@LS_1S}">
                  <div class="{@Changed_1s} border line_divR">
                    <div class="line_b"> &nbsp;{@H1S}</div>
                    <div> &nbsp;{@A1S}</div>
                  </div>
                  <div class="line_divR">
                    <div class="text-ellipsis max_width" title="1Set"> 1S</div>
                  </div>
                </div></td>
              <td width="83"><div class="{@LS_2S}">
                  <div class="{@Changed_2s} border line_divR">
                    <div class="line_b"> &nbsp;{@H2S}</div>
                    <div> &nbsp;{@A2S}</div>
                  </div>
                  <div class="line_divR">
                    <div class="text-ellipsis max_width" title="2Set"> 2S</div>
                  </div>
                </div></td>
              <td width="83"><div class="{@LS_3S}">
                  <div class="{@Changed_3s} border line_divR">
                    <div class="line_b"> &nbsp;{@H3S}</div>
                    <div> &nbsp;{@A3S}</div>
                  </div>
                  <div class="line_divR">
                    <div class="text-ellipsis max_width" title="3Set"> 3S</div>
                  </div>
                </div></td>
              <td width="83"><div class="{@LS_4S}">
                  <div class="{@Changed_4s} border line_divR">
                    <div class="line_b"> &nbsp;{@H4S}</div>
                    <div> &nbsp;{@A4S}</div>
                  </div>
                  <div class="line_divR">
                    <div class="text-ellipsis max_width" title="4Set"> 4S</div>
                  </div>
                </div></td>
              <td width="83"><div class="{@LS_5S}">
                  <div class="{@Changed_5s} border line_divR">
                    <div class="line_b"> &nbsp;{@H5S}</div>
                    <div> &nbsp;{@A5S}</div>
                  </div>
                  <div class="line_divR">
                    <div class="text-ellipsis max_width" title="5Set"> 5S</div>
                  </div>
                </div></td>
              <td width="85"><div class="box02">
                  <div class="border line_r line_divR">
                    <div class="line_b"> &nbsp;{@HTG}</div>
                    <div> &nbsp;{@ATG}</div>
                  </div>
                  <div class="line_divR">
                    <div class="text-ellipsis max_width" title="Total Points"> T.Points</div>
                  </div>
                </div></td>
            </tr>
          </table>
        </div></td>
    </tr>
  </tbody>
  <tbody id="tmplLeague">
    <tr id="l_{%LeagueId}" onclick="refreshData_D()" style="cursor: pointer">
      <td class="tabtitle"></td>
      <td colspan="6" class="tabtitle"> {@FavLeagues}{%LeagueName} </td>
      <td class="tabtitle" align="right" nowrap><a name="btnRefresh_D" class="btnIcon right disable">
        <div class="icon-refresh" title="<?=$lang_sport[37];?>"> </div>
        </a></td>
    </tr>
  </tbody>
  <tbody id="tmplLeague_5">
    <tr id="l_{%LeagueId}" onclick="refreshData_D()" style="cursor: pointer">
      <td class="tabtitle"></td>
      <td colspan="6" class="tabtitle"> {@FavLeagues}{%LeagueName} </td>
      <td colspan="2" class="tabtitle" align="right" nowrap><a name="btnRefresh_D" class="btnIcon right disable">
        <div class="icon-refresh" title="<?=$lang_sport[37];?>"> </div>
        </a></td>
    </tr>
  </tbody>
  <tbody id="tmplLeague_50">
    <tr id="l_{%LeagueId}" onclick="refreshData_D()" style="cursor: pointer">
      <td class="tabtitle"></td>
      <td colspan="6" class="tabtitle"> {@FavLeagues}{%LeagueName} </td>
      <td colspan="2" class="tabtitle" align="right" nowrap><a name="btnRefresh_D" class="btnIcon right disable">
        <div class="icon-refresh" title="<?=$lang_sport[37];?>"> </div>
        </a></td>
    </tr>
  </tbody>
  <tbody id="tmplEvent">
    <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
      <td class="text_time"> {%ShowTime} </td>
      <td class="line_unR"><div class="{@Home_Cls}"> {%HomeName}</div>
        <div class="{@Away_Cls}"> {%AwayName}</div></td>
      <td align="right" valign="middle" style="white-space: nowrap" width="8%"> {@SportRadarInfo}{@Streaming}{@Favorites} </td>
      <td class="none_rline"><div class="line_divL line_divR {%Changed_20}"> <a class="{@Odds_20_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','h','{%Odds_20_H}',20)"> {%Odds_20_H}</a><br />
          <a class="{@Odds_20_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','a','{%Odds_20_A}',20)"> {%Odds_20_A}</a> </div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {@Value_1_H}<br />
          {@Value_1_A}</div>
        <div class="line_divR OddsDiv {%Changed_1}"> <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)"> {%Odds_1_H}</a><br />
          <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)"> {%Odds_1_A}</a> </div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {%Goal_3}<br />
          {@UNDER_3}</div>
        <div class="line_divR OddsDiv {%Changed_3}"> <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)"> {%Odds_3_O}</a><br />
          <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)"> {%Odds_3_U}</a> </div></td>
      <td><div class="line_divL HdpGoalClass"> {@ODD_2}<br />
          {@EVEN_2}</div>
        <div class="line_divR OddsDiv {%Changed_2}"> <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)"> {%Odds_2_O}</a><br />
          <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)"> {%Odds_2_E}</a> </div></td>
      <td align="center"> {@StatsInfo} </td>
    </tr>
  </tbody>
  <tbody id="tmplEvent_154">
    <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
      <td class="text_time"> {%ShowTime} </td>
      <td colspan="5" class="line_unR"><div class="{@Home_Cls}"> {%HomeName}</div>
        <div class="{@Away_Cls}"> {%AwayName}</div></td>
      <td align="right" valign="middle" style="white-space: nowrap" width="8%"> {@SportRadarInfo}{@Streaming}{@Favorites} </td>
      <td class=""><div class="line_divL line_divR {%Changed_20}"> <a class="{@Odds_20_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','h','{%Odds_20_H}',20)"> {%Odds_20_H}</a><br />
          <a class="{@Odds_20_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','a','{%Odds_20_A}',20)"> {%Odds_20_A}</a> </div></td>
      <!--<td align="center">
                    {@StatsInfo}</td>--> 
    </tr>
  </tbody>
  <tbody id="tmplEvent_43">
    <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
      <td class="text_time"> {%ShowTime} </td>
      <td class="line_unR"><div class="{@Home_Cls}"> {%HomeName}</div>
        <div class="{@Away_Cls}"> {%AwayName}</div></td>
      <td align="right" valign="middle" style="white-space: nowrap" width="8%"> {@SportRadarInfo}{@Streaming}{@Favorites} </td>
      <td class="none_rline"><div class="line_divL line_divR {%Changed_20}"> <a class="{@Odds_20_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','h','{%Odds_20_H}',20)"> {%Odds_20_H}</a><br />
          <a class="{@Odds_20_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','a','{%Odds_20_A}',20)"> {%Odds_20_A}</a> </div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {@Value_1_H}<br />
          {@Value_1_A}</div>
        <div class="line_divR OddsDiv {%Changed_1}"> <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)"> {%Odds_1_H}</a><br />
          <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)"> {%Odds_1_A}</a> </div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {%Goal_3}<br />
          {@UNDER_3}</div>
        <div class="line_divR OddsDiv {%Changed_3}"> <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)"> {%Odds_3_O}</a><br />
          <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)"> {%Odds_3_U}</a> </div></td>
      <td><div class="line_divL HdpGoalClass"> {@ODD_2}<br />
        {@EVEN_2}</div>
        <div class="line_divR OddsDiv {%Changed_2}"> <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)"> {%Odds_2_O}</a><br />
          <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)"> {%Odds_2_E}</a> </div></td>
      <td align="center"> {@StatsInfo} </td>
    </tr>
  </tbody>
  <tbody id="tmplEventFooter_43">
    <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
      <td class="text_time"> {%ShowTime} </td>
      <td class="line_unR"><div class="{@Home_Cls}"> {%HomeName}</div>
        <div class="{@Away_Cls}"> {%AwayName}</div></td>
      <td align="right" valign="middle" style="white-space: nowrap" width="8%"> {@SportRadarInfo}{@Streaming}{@Favorites} </td>
      <td class="none_rline"><div class="line_divL line_divR {%Changed_20}"> <a class="{@Odds_20_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','h','{%Odds_20_H}',20)"> {%Odds_20_H}</a><br />
          <a class="{@Odds_20_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','a','{%Odds_20_A}',20)"> {%Odds_20_A}</a> </div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {@Value_1_H}<br />
          {@Value_1_A}</div>
        <div class="line_divR OddsDiv {%Changed_1}"> <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)"> {%Odds_1_H}</a><br />
          <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)"> {%Odds_1_A}</a> </div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {%Goal_3}<br />
          {@UNDER_3}</div>
        <div class="line_divR OddsDiv {%Changed_3}"> <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)"> {%Odds_3_O}</a><br />
          <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)"> {%Odds_3_U}</a> </div></td>
      <td><div class="line_divL HdpGoalClass"> {@ODD_2}<br />
        {@EVEN_2}</div>
        <div class="line_divR OddsDiv {%Changed_2}"> <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)"> {%Odds_2_O}</a><br />
          <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)"> {%Odds_2_E}</a> </div></td>
      <td align="center"><div title="More Bet Types">{@More}</div> 
		{@StatsInfo} </td>
    </tr>
	<tr class="{@Tr_Cls}">
      <td id="more_{%MatchId}" class="moreBetType tag {@Display_More}" colspan="8"> {@MoreData} </td>
    </tr>
  </tbody>
  <tbody id="tmplEvent_5">
    <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
      <td class="text_time"> {%ShowTime} </td>
      <td class="line_unR"><div class="{@Home_Cls}"> {%HomeName}</div>
        <div class="{@Away_Cls}"> {%AwayName}</div></td>
      <td align="right" valign="middle" style="white-space: nowrap" width="5%"> {@SportRadarInfo}{@Streaming}{@Favorites} </td>
      <td class="none_rline"><div class="line_divL line_divR {%Changed_20}"> <a class="{@Odds_20_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','h','{%Odds_20_H}',20)"> {%Odds_20_H}</a><br />
          <a class="{@Odds_20_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','a','{%Odds_20_A}',20)"> {%Odds_20_A}</a> </div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {@Value_1_H}<br />
          {@Value_1_A}</div>
        <div class="line_divR OddsDiv {%Changed_1}"> <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)"> {%Odds_1_H}</a><br />
          <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)"> {%Odds_1_A}</a> </div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {@Value_153_H}<br />
          {@Value_153_A}</div>
        <div class="line_divR OddsDiv {%Changed_153}"> <a class="{@Odds_153_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_153}','h','{%Odds_153_H}',153)"> {%Odds_153_H}</a><br />
          <a class="{@Odds_153_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_153}','a','{%Odds_153_A}',153)"> {%Odds_153_A}</a> </div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {%Goal_3}<br />
          {@UNDER_3}</div>
        <div class="line_divR OddsDiv {%Changed_3}"> <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)"> {%Odds_3_O}</a><br />
          <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)"> {%Odds_3_U}</a> </div></td>
      <td><div class="line_divL HdpGoalClass"> {@ODD_2}<br />
          {@EVEN_2}</div>
        <div class="line_divR OddsDiv {%Changed_2}"> <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)"> {%Odds_2_O}</a><br />
          <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)"> {%Odds_2_E}</a></div></td>
      <td align="center"><div title="More Bet Types">{@More}</div>
        {@StatsInfo} </td>
    </tr>
    <tr class="{@Tr_Cls}">
      <td id="more_{%MatchId}" class="moreBetType reset {@Display_More}" colspan="9"> {@MoreData} </td>
    </tr>
  </tbody>
  <tbody id="tmplEvent_50">
    <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
      <td class="text_time"> {%ShowTime} </td>
      <td class="line_unR" valign='top'><div class="{@Home_Cls}"> {%HomeName}</div>
        <div class="{@Away_Cls}"> {%AwayName}</div><div>{@Draw}</div> </td></td>
      <td align="right" valign="middle" style="white-space: nowrap" width="5%"> {@SportRadarInfo}{@Streaming}{@Favorites} </td>
      <td class="none_rline">
        <div class="line_divL line_divR {%Changed_5}">
            <a class="{@Odds_5_1_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_5}','1','{%Odds_5_1}',5)">{%Odds_5_1}</a><br />
            <a class="{@Odds_5_2_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_5}','2','{%Odds_5_2}',5)">{%Odds_5_2}</a><br />
            <a class="{@Odds_5_X_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_5}','X','{%Odds_5_X}',5)">{%Odds_5_X}</a>
        </div>
      </td>
      <td class="none_rline" valign='top'><div class="line_divL line_divR {%Changed_501}"> <a class="{@Odds_501_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_501}','h','{@Odds_501_H}',501)"> {@Odds_501_H}</a><br />
          <a class="{@Odds_501_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_501}','a','{@Odds_501_A}',501)"> {@Odds_501_A}</a> </div></td>
      <td class="none_rline" valign='top'><div class="line_divL HdpGoalClass"> {@Value_1_H}<br />
          {@Value_1_A}</div>
        <div class="line_divR OddsDiv {%Changed_1}"> <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)"> {%Odds_1_H}</a><br />
          <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)"> {%Odds_1_A}</a> </div></td>     
      <td class="none_rline" valign='top'><div class="line_divL HdpGoalClass"> {%Goal_3}<br />
          {@UNDER_3}</div>
        <div class="line_divR OddsDiv {%Changed_3}"> <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)"> {%Odds_3_O}</a><br />
          <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)"> {%Odds_3_U}</a> </div></td>
      <td valign='top'><div class="line_divL HdpGoalClass"> {@ODD_2}<br />
          {@EVEN_2}</div>
        <div class="line_divR OddsDiv {%Changed_2}"> <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)"> {%Odds_2_O}</a><br />
          <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)"> {%Odds_2_E}</a></div></td>
      <td align="center"> {@StatsInfo} </td>
    </tr>
  </tbody>
  <!--Tennis More NoInfo-->
  <tbody>
    <tr>
      <td><div id="NoInfo">
          <div class="styleblack" align="center" style="background-color: #E1E4E8;"><?=$lang_sport[38];?></div>
        </div></td>
    </tr>
  </tbody>
  <!--Tennis More loading-->
  <tbody>
    <tr>
      <td><div id="Loading">
          <div align="center" style="background-color: #FFFFFF;"> <img src="template/sportsbook/public/images/layout/loading.gif"
                                vspace="2" /></div>
        </div></td>
    </tr>
  </tbody>
</table>
<!--<table>
<tbody id="TennisMoreEvent">
</tbody>
</table>-->
<div id="TennisMoreEvent">
  <table class="MoreTable" border="0" cellpadding="0" cellspacing="0" width="100%">
    <tbody>
      <tr>
        <td valign="top"><table class="oddsTable displayOn" cellpadding="0" cellspacing="0" width="100%">
            <tbody>
              <tr class="tabtitle">
                <td colspan="2"> {@ResourceName_154} </td>
                <td colspan="4"> {@ResourceName_155} </td>
                <td colspan="3"> {@ResourceName_156} </td>
              </tr>
              <tr>
                <th width="16%"> <span class="text-ellipsis" title="{@HomeName_t}">{@HomeName_t}</span> </th>
                <th width="16%"> <span class="text-ellipsis" title="{@AwayName_t}">{@AwayName_t}</span> </th>
                <th colspan="2" class="even" width="17%"> <span class="text-ellipsis" title="{@HomeName_t}">{@HomeName_t}</span> </th>
                <th colspan="2" class="even" width="17%"> <span class="text-ellipsis" title="{@AwayName_t}">{@AwayName_t}</span> </th>
                <th width="6%" title="Games"> Games </th>
                <th width="13%"> <span class="text-ellipsis" title="<?=$lang_sport[120];?>"><?=$lang_sport[120];?></span> </th>
                <th width="13%"> <span class="text-ellipsis" title="<?=$lang_sport[121];?>"><?=$lang_sport[121];?></span> </th>
              </tr>
              <!--MoreOdds-->
            </tbody>
          </table></td>
      </tr>
    </tbody>
  </table>
</div>
<table>
  <tbody id="MoreOdds">
    <tr class="{@Tr_Cls}" onmouseover="this.className='trbgov'" onmouseout="this.className='{@Tr_Cls}'" align="center">
      <td class="none_rline {@Odds_154_H_Cls} {@Changed_154}" onmouseover="CheckHaveOdds(this);" onclick="javascript:bet('{@isParlay}','{@MatchId}','{@OddsId_154}','h','{@Odds_154_h}','154')"> {@Odds_154_h} </td>
      <td class="{@Odds_154_A_Cls} {@Changed_154}" onmouseover="CheckHaveOdds(this);" onclick="javascript:bet('{@isParlay}','{@MatchId}','{@OddsId_154}','a','{@Odds_154_a}','154')"> {@Odds_154_a} </td>
      <td class="none_rline HdpGoalClass {@Changed_155}"> {@Value_H_155} </td>
      <td class="none_rline {@Odds_155_H_Cls} {@Changed_155}" onclick="javascript:bet('{@isParlay}','{@MatchId}','{@OddsId_155}','h','{@Odds_155_h}','155')" onmouseover="CheckHaveOdds(this);"> {@Odds_155_h} </td>
      <td class="none_rline HdpGoalClass {@Changed_155}"> {@Value_A_155} </td>
      <td class="{@Odds_155_A_Cls} {@Changed_155}" onclick="javascript:bet('{@isParlay}','{@MatchId}','{@OddsId_155}','a','{@Odds_155_a}','155')" onmouseover="CheckHaveOdds(this);"> {@Odds_155_a} </td>
      <td class="none_rline HdpGoalClass {@Changed_156}"> {@Goal_156} </td>
      <td class="none_rline {@Odds_156_O_Cls} {@Changed_156}" style="cursor: pointer;" onclick="javascript:bet('{@isParlay}','{@MatchId}','{@OddsId_156}','o','{@Odds_156_o}','156')" onmouseover="CheckHaveOdds(this);"> {@Odds_156_o} </td>
      <td class="{@Odds_156_U_Cls} {@Changed_156}" onclick="javascript:bet('{@isParlay}','{@MatchId}','{@OddsId_156}','u','{@Odds_156_u}','156')" onmouseover="CheckHaveOdds(this);"> {@Odds_156_u} </td>
    </tr>
  </tbody>
</table>
<span id="tmplEnd"></span>
</body>
</html>