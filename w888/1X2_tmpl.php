<?
session_start();
// require("lang/member_lang.php");
require("lang/variable_lang.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>1X2 Template</title>
<link href="css/table_w.css" rel="stylesheet" type="text/css" />
<link href="css/button.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table id="tmplTable" class="oddsTable" width="100%" cellpadding="0" cellspacing="0" border="0">
	<tbody id='tmplHeader'>
		<tr valign="middle">
			<th width="6%" rowspan='2' nowrap><?=$lang_member[303];?></th>
			<th width="35%" colspan="2" rowspan='2' align="left" class="even"><?=$lang_member[708];?></th>
			<th colspan='3' class="tabthup" title="<?=$lang_member[805];?>"><?=$lang_member[805];?></th>
			<th colspan='3' class="even tabthup tabt_L" title="<?=$lang_member[803];?>"><?=$lang_member[803];?></th>
			<th width="1" rowspan='2'>&nbsp;</th>
		</tr>
		<tr class="tabthdwn">
			<th width="65" title="1">1</th>
			<th width="65" title="X">X</th>
			<th width="65" title="2">2</th>
			<th width="65" class="even tabt_L" title="1">1</th>
			<th width="65" class="even" title="X">X</th>
			<th width="65" class="even" title="2">2</th>
		</tr>
	</tbody>
	<tbody id='tmplLeague_L'>
		<tr id="l_{%LeagueId}" onclick="refreshData_L()" style="cursor: pointer">
        	<td class="tabtitle"></td>
			<td colspan="7" class="tabtitle">{@FavLeagues}{%LeagueName}</td>
			<td colspan="2" class="tabtitle" align="right" nowrap><a name="btnRefresh_L" class="btnIcon right disable"><div class="icon-refresh" title="<?=$lang_member[770];?>"></div></a></td>
		</tr>
	</tbody>
	<tbody id='tmplLive'>
		<tr align="center" class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
			<td class="text_time {%Changed_Score}" nowrap="nowrap">
				{@GameStatus}
				<b>{%ScoreH}-{%ScoreA}</b>
				<div nowrap><span class="{@TimeSuspendCls}" title="In Running"><b class="IsLive">IR</b></span><span class="{@TimeSuspendCls1}"><b class="{@LiveTimeCls}">{%ShowTime}</b><span style="color: #566C9E">{@InjuryTime}</span></span></div>
			</td>
			<td class="line_unR" align="left"><div class="UdrDogTeamClass">{%HomeName}</div><div class="UdrDogTeamClass">{%AwayName}</div></td>
			<td align="right" width="6%">{@Streaming}{@SportRadarInfo}{@Favorites}</td>
			<td class="UdrDogOddsClass {%Changed_5} none_rline"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_5}','1','{%Odds_5_1}',5)">{%Odds_5_1}</a></td>
			<td class="UdrDogOddsClass {%Changed_5} none_rline"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_5}','X','{%Odds_5_X}',5)">{%Odds_5_X}</a></td>
			<td class="UdrDogOddsClass {%Changed_5}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_5}','2','{%Odds_5_2}',5)">{%Odds_5_2}</a></td>
			<td class="UdrDogOddsClass {%Changed_15} tabt_L none_rline"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_15}','1','{%Odds_15_1}',15)">{%Odds_15_1}</a></td>
			<td class="UdrDogOddsClass {%Changed_15} none_rline"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_15}','X','{%Odds_15_X}',15)">{%Odds_15_X}</a></td>
			<td class="UdrDogOddsClass {%Changed_15}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_15}','2','{%Odds_15_2}',15)">{%Odds_15_2}</a></td>
			<td align='center'>{@StatsInfo}</td>
		</tr>
	</tbody>
	<tbody id='tmplLeague'>
		<tr id="l_{%LeagueId}" onclick="refreshData_D()" style="cursor: pointer">
        	<td class="tabtitle"></td>
			<td colspan="7" class="tabtitle">{@FavLeagues}{%LeagueName}</td>
			<td colspan="2" class="tabtitle" align="right" nowrap><a name="btnRefresh_D" class="btnIcon right disable"><div class="icon-refresh" title="<?=$lang_member[770];?>"></div></a></td>
		</tr>
	</tbody>
	<tbody id='tmplEvent'>
		<tr align="center" class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
			<td class="text_time">{%ShowTime}</td>
			<td class="line_unR" align="left"><div class="UdrDogTeamClass">{%HomeName}</div><div class="UdrDogTeamClass">{%AwayName}</div></td>
			<td align="right" width="6%">{@Streaming}{@SportRadarInfo}{@Favorites}</td>
			<td class="UdrDogOddsClass {%Changed_5} none_rline"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_5}','1','{%Odds_5_1}',5)">{%Odds_5_1}</a></td>
			<td class="UdrDogOddsClass {%Changed_5} none_rline"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_5}','X','{%Odds_5_X}',5)">{%Odds_5_X}</a></td>
			<td class="UdrDogOddsClass {%Changed_5}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_5}','2','{%Odds_5_2}',5)">{%Odds_5_2}</a></td>
			<td class="UdrDogOddsClass {%Changed_15} tabt_L none_rline"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_15}','1','{%Odds_15_1}',15)">{%Odds_15_1}</a></td>
			<td class="UdrDogOddsClass {%Changed_15} none_rline"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_15}','X','{%Odds_15_X}',15)">{%Odds_15_X}</a></td>
			<td class="UdrDogOddsClass {%Changed_15}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_15}','2','{%Odds_15_2}',15)">{%Odds_15_2}</a></td>
			<td align='center'>{@StatsInfo}</td>
		</tr>
	</tbody>
</table>
<span id="tmplEnd" />
</body>
</html>
