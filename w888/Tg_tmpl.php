
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Total Goal</title>
<!--    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="css/table_w.css" rel="stylesheet" type="text/css" />
    <link href="css/button.css" rel="stylesheet" type="text/css" />-->
</head>
<body>
    <table id="tmplTable" class="oddsTable" width="100%" cellpadding="0" cellspacing="0" border="0">
        <tbody id='tmplHeader'>
            <tr align='center'>
                <th rowspan='2' width="6%" nowrap="nowrap" title="เวลา">
                    เวลา</th>
                <th rowspan='2' width="40%" align="left" colspan="2" title="รายการ" class="even">
                    รายการ</th>
                <th colspan='4' class="tabthup" title="เต็มเวลา">
                    เต็มเวลา</th>
                <th colspan='3' class="tabt_L tabthup even" title="ครึ่งแรก">
                    ครึ่งแรก</th>
                <th rowspan='2' width="1"></th>
            </tr>
            <tr align='center' class="tabthdwn">
                <th width="50" class="tabt_L" title="0-1">
                    0-1</th>
                <th width="50" title="2-3">
                    2-3</th>
                <th width="50" title="4-6">
                    4-6</th>
                <th width="60" title="7+">
                    7+</th>
                <th width="50" class="tabt_L even" title="0-1">
                    0-1</th>
                <th width="50" class="even" title="2-3">
                    2-3</th>
                <th width="60" class="even" title="4+">
                    4+</th>
            </tr>
        </tbody>
        <tbody id='tmplLeague'>
            <tr id="l_{%LeagueId}" onclick="refreshData_D()" style="cursor: pointer">
      			<td class="tabtitle"></td>
                <td colspan="9" class="tabtitle">{@FavLeagues}{%LeagueName}</td>
                <td class="tabtitle" align="right" nowrap>
                	<a name="btnRefresh_D" class="btnIcon right disable"><div class="icon-refresh" title="กรุณารอ"></div></a></td>
            </tr>
        </tbody>
        <tbody id='tmplLeague_L'>
            <tr id="Tr1" onclick="refreshData_L()" style="cursor: pointer">
      			<td class="tabtitle"></td>
                <td colspan="9" class="tabtitle">{@FavLeagues}{%LeagueName}</td>
                <td class="tabtitle" align="right" nowrap>
                	<a name="btnRefresh_L" class="btnIcon right disable"><div class="icon-refresh" title="กรุณารอ"></div></a></td>
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
                <td class="tabt_L UdrDogOddsClass {%Changed_6} none_rline">
                    {@Odds_6_01}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_6}','0-1','{%Odds_6_01}',6)" class="UdrDogOddsClass {@Odds_6D_01}">
                        {%Odds_6_01}</a></td>
                <td class="UdrDogOddsClass {%Changed_6} none_rline">
                    {@Odds_6_23}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_6}','2-3','{%Odds_6_23}',6)" class="UdrDogOddsClass {@Odds_6D_23}">
                        {%Odds_6_23}</a></td>
                <td class="UdrDogOddsClass {%Changed_6} none_rline">
                    {@Odds_6_46}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_6}','4-6','{%Odds_6_46}',6)" class="UdrDogOddsClass {@Odds_6D_46}">
                        {%Odds_6_46}</a></td>
                <td class="UdrDogOddsClass {%Changed_6}">
                    {@Odds_6_7}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_6}','7-over','{%Odds_6_7}',6)" class="UdrDogOddsClass {@Odds_6D_7}">
                        {%Odds_6_7}</a></td>
                <td class="tabt_L UdrDogOddsClass {%Changed_126} none_rline">
                    {@Odds_126_01}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_126}','0-1','{%Odds_126_01}',126)" class="UdrDogOddsClass {@Odds_126D_01}">
                        {%Odds_126_01}</a></td>
                <td class="UdrDogOddsClass {%Changed_126} none_rline">
                    {@Odds_126_23}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_126}','2-3','{%Odds_126_23}',126)" class="UdrDogOddsClass {@Odds_126D_23}">
                        {%Odds_126_23}</a></td>
                <td class="UdrDogOddsClass {%Changed_126}">
                    {@Odds_126_4}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_126}','4-over','{%Odds_126_4}',126)" class="UdrDogOddsClass {@Odds_126D_4}">
                        {%Odds_126_4}</a></td>
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
                <td class="tabt_L UdrDogOddsClass {%Changed_6} none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_6}','0-1','{%Odds_6_01}',6)">
                        {%Odds_6_01}</a></td>
                <td class="UdrDogOddsClass {%Changed_6} none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_6}','2-3','{%Odds_6_23}',6)">
                        {%Odds_6_23}</a></td>
                <td class="UdrDogOddsClass {%Changed_6} none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_6}','4-6','{%Odds_6_46}',6)">
                        {%Odds_6_46}</a></td>
                <td class="UdrDogOddsClass {%Changed_6}">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_6}','7-over','{%Odds_6_7}',6)">
                        {%Odds_6_7}</a></td>
                <td class="tabt_L UdrDogOddsClass {%Changed_126} none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_126}','0-1','{%Odds_126_01}',126)">
                        {%Odds_126_01}</a></td>
                <td class="UdrDogOddsClass {%Changed_126} none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_126}','2-3','{%Odds_126_23}',126)">
                        {%Odds_126_23}</a></td>
                <td class="UdrDogOddsClass {%Changed_126}">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_126}','4-over','{%Odds_126_4}',126)">
                        {%Odds_126_4}</a></td>
                <td class="add">
                    {@StatsInfo}</td>
            </tr>
        </tbody>
    </table>
    <span id="tmplEnd"></span>
</body>
</html>
