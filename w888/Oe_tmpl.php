<?
session_start();
// require("lang/member_lang.php");
  require("lang/variable_lang.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Odd Even & Total Goal</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="css/table_w.css" rel="stylesheet" type="text/css" />
    <link href="css/button.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <table id="tmplTable" class="oddsTable" width="100%" cellpadding="0" cellspacing="0" border="0">
        <tbody id='tmplHeader'>
            <tr align='center'>
                <th rowspan='2' width="6%" nowrap="nowrap" title="<?=$lang_sport[42];?>">
                    <?=$lang_sport[42];?></th>
                <th rowspan='2' width="45%" align="left" colspan="2" title="<?=$lang_sport[40];?>" class="even">
                    <?=$lang_sport[40];?></th>
                <th colspan='2' class="tabthup" title="<?=$lang_sport[44];?>">
                    <?=$lang_sport[44];?></th>
                <th colspan='2' class="tabthup tabt_L even" title="<?=$lang_sport[43];?>">
                    <?=$lang_sport[43];?></th>
                <th rowspan='2' width="1"></th>
            </tr>
            <tr align='center' class="tabthdwn">
                <th width="52" title="<?=$lang_sport[19];?>">
                    <?=$lang_sport[19];?></th>
                <th width="52" title="<?=$lang_sport[20];?>">
                    <?=$lang_sport[20];?></th>
                <th width="52" class="tabt_L even" title="<?=$lang_sport[19];?>">
                    <?=$lang_sport[19];?></th>
                <th width="52" class="even" title="<?=$lang_sport[20];?>">
                    <?=$lang_sport[20];?></th>

            </tr>
        </tbody>
        <tbody id='tmplLeague'>
            <tr id="l_{%LeagueId}" onclick="refreshData_D()" style="cursor: pointer">
      			<td class="tabtitle"></td>
                <td colspan="6" class="tabtitle">{@FavLeagues}{%LeagueName}</td>
                <td colspan="1" class="tabtitle" align="right" nowrap>
                	<a name="btnRefresh_D" class="btnIcon right disable"><div class="icon-refresh" title="<?=$lang_sport[18];?>"></div></a></td>
            </tr>
        </tbody>
        <tbody id='tmplLeague_L'>
            <tr id="l_{%LeagueId}" onclick="refreshData_L()" style="cursor: pointer">
      			<td class="tabtitle"></td>
                <td colspan="6" class="tabtitle">{@FavLeagues}{%LeagueName}</td>
                <td colspan="1" class="tabtitle" align="right" nowrap>
                	<a name="btnRefresh_L" class="btnIcon right disable"><div class="icon-refresh" title="<?=$lang_sport[18];?>"></div></a></td>
            </tr>
        </tbody>
        <tbody id='tmplLive'>
            <tr align="center" bgcolor="#FFCCBC" onmouseover="this.style.backgroundColor='#f5eeb8';"
                onmouseout="this.style.backgroundColor='#FFCCBC';">
                <td class="text_time {%Changed_Score}">
					{@GameStatus}
					<b>{%ScoreH}-{%ScoreA}</b><div nowrap class="{@LiveTimeCls}">
                        {%ShowTime}</div>
                </td>
                <td align="left" class="line_unR">
                    <div class="UdrDogTeamClass">{%HomeName}</div><div class="UdrDogTeamClass">{%AwayName}</div></td>
                <td align="right" width="6%">{@Streaming}{@SportRadarInfo}{@Favorites}</td>
                <td class="{%Changed_2} none_rline">
                    <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)">
                        {%Odds_2_O}</a></td>
                <td class="{%Changed_2}">
                    <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)">
                        {%Odds_2_E}</a></td>
                <td class="{%Changed_12} none_rline">
                    <a class="{@Odds_12_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_12}','h','{%Odds_12_O}',12)">
                        {%Odds_12_O}</a></td>
                <td class="{%Changed_12}">
                    <a class="{@Odds_12_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_12}','a','{%Odds_12_E}',12)">
                        {%Odds_12_E}</a></td>
                <td class="add">
                    {@StatsInfo}</td>
            </tr>
        </tbody>
        <tbody id='tmplEvent'>
            <tr align="center" class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';"
                onmouseout="this.style.backgroundColor='{@BgColor}';">
                <td class="text_time">
                    {%ShowTime}</td>
                <td align="left" class="line_unR">
                    <div class="UdrDogTeamClass">{%HomeName}</div><div class="UdrDogTeamClass">{%AwayName}</div></td>
                <td align="right" width="6%">{@Streaming}{@SportRadarInfo}{@Favorites}</td>
                <td class="{%Changed_2} none_rline">
                    <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)">
                        {%Odds_2_O}</a></td>
                <td class="{%Changed_2}">
                    <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)">
                        {%Odds_2_E}</a></td>
                <td class="{%Changed_12} none_rline">
                    <a class="{@Odds_12_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_12}','h','{%Odds_12_O}',12)">
                        {%Odds_12_O}</a></td>
                <td class="{%Changed_12}">
                    <a class="{@Odds_12_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_12}','a','{%Odds_12_E}',12)">
                        {%Odds_12_E}</a></td>
                <td class="add">
                    {@StatsInfo}</td>
            </tr>
        </tbody>
    </table>
    <span id="tmplEnd"></span>
</body>
</html>
