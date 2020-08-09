
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Total Goal</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
    <table id="tmplTable" class="oddsTable" width="100%" cellpadding="0" cellspacing="0" border="0">
        <tbody id='tmplHeader'>
            <tr class="tabthdwn">
                <th width="6%" nowrap="nowrap">
                    เวลา</th>
                <th width="30%" colspan="2" align="left" class="even">
                    รายการ</th>
                <th width="45" class="tabt_L" title="Home/Home">
                    เจ้าบ้านเจ้าบ้าน</th>
                <th width="45" class="even" title="Home/เสมอกัน">
                    เจ้าบ้านเสมอ</th>
                <th width="45" title="Home/Away">
                    เจ้าบ้านทีมเยือน</th>
                <th width="45" class="even tabt_L" title="เสมอกัน/Home">
                    เสมอเจ้าบ้าน</th>
                <th width="45" title="เสมอกัน/เสมอกัน">
                    เสมอเสมอ</th>
                <th width="45" class="even" title="เสมอกัน/Away">
                    เสมอทีมเยือน</th>
                <th width="45" class="tabt_L" title="Away/Home">
                    ทีมเยือนเจ้าบ้าน</th>
                <th width="45" class="even" title="Away/เสมอกัน">
                    ทีมเยือนเสมอ</th>
                <th width="45" title="Away/Away">
                    ทีมเยือนทีมเยือน</th>
                <th width="1" class="even tabt_L">
                </th>
            </tr>
        </tbody>
        <tbody id='tmplLeague'>
            <tr id="l_{%LeagueId}" onclick="refreshData_D()" style="cursor: pointer">
     			 <td class="tabtitle"></td>
                <td colspan="10" class="tabtitle indent">{@FavLeagues}{%LeagueName}</td>
                <td colspan="2" class="tabtitle" align="right" nowrap>
                	<a name="btnRefresh_D" class="btnIcon right disable"><div class="icon-refresh" title="กรุณารอ"></div></a></td>
            </tr>
        </tbody>
        <tbody id='tmplLeague_L'>
            <tr id="Tr1" onclick="refreshData_L()" style="cursor: pointer">
     			 <td class="tabtitle"></td>
                <td colspan="10" class="tabtitle indent">{@FavLeagues}{%LeagueName}</td>
                <td colspan="2" class="tabtitle" align="right" nowrap>
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
                <td class="UdrDogOddsClass tabt_L {%Changed_16} none_rline">
                    {@Odds_16_HH}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_16}','1:1','{%Odds_16_HH}',16)" class="UdrDogOddsClass {@Odds_16D_HH}">
                        {%Odds_16_HH}</a></td>
                <td class="UdrDogOddsClass {%Changed_16} none_rline">
                    {@Odds_16_HD}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_16}','1:0','{%Odds_16_HD}',16)" class="UdrDogOddsClass {@Odds_16D_HD}">
                        {%Odds_16_HD}</a></td>
                <td class="UdrDogOddsClass {%Changed_16}">
                    {@Odds_16_HA}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_16}','1:2','{%Odds_16_HA}',16)" class="UdrDogOddsClass {@Odds_16D_HA}">
                        {%Odds_16_HA}</a></td>
                <td class="UdrDogOddsClass tabt_L {%Changed_16} none_rline">
                    {@%Odds_16_DH}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_16}','0:1','{%Odds_16_DH}',16)" class="UdrDogOddsClass {@Odds_16D_DH}">
                        {%Odds_16_DH}</a></td>
                <td class="UdrDogOddsClass {%Changed_16} none_rline">
                    {@Odds_16_DD}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_16}','0:0','{%Odds_16_DD}',16)" class="UdrDogOddsClass {@Odds_16D_DD}">
                        {%Odds_16_DD}</a></td>
                <td class="UdrDogOddsClass {%Changed_16}">
                    {@Odds_16_DA}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_16}','0:2','{%Odds_16_DA}',16)" class="UdrDogOddsClass {@Odds_16D_DA}">
                        {%Odds_16_DA}</a></td>
                <td class="UdrDogOddsClass tabt_L {%Changed_16} none_rline">
                    {@Odds_16_AH}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_16}','2:1','{%Odds_16_AH}',16)" class="UdrDogOddsClass {@Odds_16D_AH}">
                        {%Odds_16_AH}</a></td>
                <td class="UdrDogOddsClass {%Changed_16} none_rline">
                    {@Odds_16_AD}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_16}','2:0','{%Odds_16_AD}',16)" class="UdrDogOddsClass {@Odds_16D_HD}">
                        {%Odds_16_AD}</a></td>
                <td class="UdrDogOddsClass {%Changed_16}">
                    {@Odds_16_AA}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_16}','2:2','{%Odds_16_AA}',16)" class="UdrDogOddsClass {@Odds_16D_AA}">
                        {%Odds_16_AA}</a></td>
                <td class="tabt_L">
                    {@StatsInfo}</td>
            </tr>
        </tbody>
        <tbody id='tmplEvent'>
            <tr align="center" class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';"
                onmouseout="this.style.backgroundColor='{@BgColor}';">
                <td class="text_time">
                    {%ShowTime}</td>
                <td align="left" class="UdrDogTeamClass line_unR">
                    <div class="UdrDogTeamClass">{%HomeName}</div><div class="UdrDogTeamClass">{%AwayName}</div></td>
                <td align="right" width="6%">{@Streaming}{@SportRadarInfo}{@Favorites}</td>
                <td class="UdrDogOddsClass tabt_L {%Changed_16} none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_16}','1:1','{%Odds_16_HH}',16)">
                        {%Odds_16_HH}</a></td>
                <td class="UdrDogOddsClass {%Changed_16} none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_16}','1:0','{%Odds_16_HD}',16)">
                        {%Odds_16_HD}</a></td>
                <td class="UdrDogOddsClass {%Changed_16}">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_16}','1:2','{%Odds_16_HA}',16)">
                        {%Odds_16_HA}</a></td>
                <td class="UdrDogOddsClass tabt_L {%Changed_16} none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_16}','0:1','{%Odds_16_DH}',16)">
                        {%Odds_16_DH}</a></td>
                <td class="UdrDogOddsClass {%Changed_16} none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_16}','0:0','{%Odds_16_DD}',16)">
                        {%Odds_16_DD}</a></td>
                <td class="UdrDogOddsClass {%Changed_16}">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_16}','0:2','{%Odds_16_DA}',16)">
                        {%Odds_16_DA}</a></td>
                <td class="UdrDogOddsClass tabt_L {%Changed_16} none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_16}','2:1','{%Odds_16_AH}',16)">
                        {%Odds_16_AH}</a></td>
                <td class="UdrDogOddsClass {%Changed_16} none_rline">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_16}','2:0','{%Odds_16_AD}',16)">
                        {%Odds_16_AD}</a></td>
                <td class="UdrDogOddsClass {%Changed_16}">
                    <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_16}','2:2','{%Odds_16_AA}',16)">
                        {%Odds_16_AA}</a></td>
                <td class="tabt_L">
                    {@StatsInfo}</td>
            </tr>
        </tbody>
    </table>
    <span id="tmplEnd"></span>
</body>
</html>
