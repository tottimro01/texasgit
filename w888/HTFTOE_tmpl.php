
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>HT/FT Odd Even</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<!--<link href="css/table_w.css" rel="stylesheet" type="text/css" />
<link href="css/button.css" rel="stylesheet" type="text/css" />-->
</head>
<body>
<table id="tmplTable" class="oddsTable" width="100%" cellpadding="0" cellspacing="0" border="0">
  <tbody id='tmplHeader'>
    <tr align='center'>
      <th width="6%" nowrap="nowrap" title="เวลา"> เวลา</th>
      <th width="45%" align="left" colspan="2" title="รายการ" class="even" > รายการ</th>
      <th width="52" nowrap="nowrap" title="คี่/คี่"> คี่/คี่</th>
      <th width="52" nowrap="nowrap" class="even" title="คี่/คู่"> คี่/คู่</th>
      <th width="52" nowrap="nowrap" title="คู่/คี่"> คู่/คี่</th>
      <th width="52" nowrap="nowrap" class="even" title="คู่/คู่"> คู่/คู่</th>
      <th width="1"></th>
    </tr>
  </tbody>
  <tbody id='tmplLeague'>
    <tr id="l_{%LeagueId}" onclick="refreshData()" style="cursor: pointer">
      <td class="tabtitle"></td>
      <td colspan="6" class="tabtitle">{@FavLeagues}{%LeagueName}</td>
      <td class="tabtitle" align="right" nowrap><a name="btnRefresh" class="btnIcon right disable">
        <div class="icon-refresh" title="กรุณารอ"></div>
        </a></td>
    </tr>
  </tbody>
  <tbody id='tmplLive'>
    <tr align="center" class="bgcpepk" onmouseover="this.style.backgroundColor='#f5eeb8';"
                onmouseout="this.style.backgroundColor='#FFCCBC';">
      <td class="text_time {%Changed_Score}">
	  {@GameStatus}
	  <b>{%ScoreH}-{%ScoreA}</b>
        <div nowrap class="{@LiveTimeCls}"> {%ShowTime}</div></td>
      <td align="left" class="line_unR"><div class="UdrDogTeamClass">{%HomeName}</div><div class="UdrDogTeamClass">{%AwayName}</div></td>
      <td align="right" width="6%">{@Streaming}{@SportRadarInfo}{@Favorites}</td>
      <td class="{%Changed_128} none_rline"><a class="UdrDogOddsClass" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_128}','oo','{%Odds_128_OO}',128)"> {%Odds_128_OO}</a></td>
      <td class="{%Changed_128} none_rline"><a class="UdrDogOddsClass" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_128}','oe','{%Odds_128_OE}',128)"> {%Odds_128_OE}</a></td>
      <td class="{%Changed_128} none_rline"><a class="UdrDogOddsClass" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_128}','eo','{%Odds_128_EO}',128)"> {%Odds_128_EO}</a></td>
      <td class="{%Changed_128}"><a class="UdrDogOddsClass" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_128}','ee','{%Odds_128_EE}',128)"> {%Odds_128_EE}</a></td>
      <td class="add"> {@StatsInfo}</td>
    </tr>
  </tbody>
  <tbody id='tmplEvent'>
    <tr align="center" class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';"
                onmouseout="this.style.backgroundColor='{@BgColor}';">
      <td class="text_time"> {%ShowTime}</td>
      <td align="left" class="line_unR"><div class="UdrDogTeamClass">{%HomeName}</div><div class="UdrDogTeamClass">{%AwayName}</div></td>
      <td align="right" width="6%">{@Streaming}{@SportRadarInfo}{@Favorites}</td>
      <td class="{%Changed_128} none_rline"><a class="UdrDogOddsClass" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_128}','oo','{%Odds_128_OO}',128)"> {%Odds_128_OO}</a></td>
      <td class="{%Changed_128} none_rline"><a class="UdrDogOddsClass" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_128}','oe','{%Odds_128_OE}',128)"> {%Odds_128_OE}</a></td>
      <td class="{%Changed_128} none_rline"><a class="UdrDogOddsClass" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_128}','eo','{%Odds_128_EO}',128)"> {%Odds_128_EO}</a></td>
      <td class="{%Changed_128}"><a class="UdrDogOddsClass" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_128}','ee','{%Odds_128_EE}',128)"> {%Odds_128_EE}</a></td>
      <td class="add"> {@StatsInfo}</td>
    </tr>
  </tbody>
</table>
<span id="tmplEnd"></span>
</body>
</html>
