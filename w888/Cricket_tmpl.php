
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cricket Template</title>

</head>
<body>
<table id="tmplTable" class="oddsTable" width="100%" cellpadding="0" cellspacing="0" border="0">
  <tbody id="tmplHeader">
    <tr>
      <th width="7%" title=" เวลา" nowrap="nowrap">เวลา</th>
      <th width="48%" colspan="2" align="left" class="even" title=" รายการ">รายการ</th>
      <th width="6%" align="right" nowrap title="เต็มเวลา ราคาพูล">FT. 1X2</th>
      <th width="7%" align="right" nowrap class="even" title=" ทายผลผู้ชนะหรือทีมที่ชนะ">ทายผลผู้ชนะหรือทีมที่ชนะ</th>
      <th width="11%" title="เต็มเวลา แต้มต่อ">FT. HDP</th>
      <th width="11%" title="เต็มเวลา มากกว่า/น้อยกว่า" class="even">FT. O/U</th>
      <th width="11%" title="เต็มเวลา คี่/คู่">FT. O/E</th>
      <th width="1" class="even"></th>
    </tr>
  </tbody>
  <tbody id="tmplLeague_L">
    <tr id="l_{%LeagueId}" onclick="refreshData_L()" style="cursor: pointer">
      <td class="tabtitle"></td>
      <td colspan="6" class="tabtitle none_rline">{@FavLeagues}{%LeagueName}</td>
      <td colspan="2" class="tabtitle" align="right" nowrap><a name="btnRefresh_L" class="btnIcon right disable">
        <div class="icon-refresh" title="กรุณารอ"></div>
        </a></td>
    </tr>
  </tbody>
  <tbody id="tmplLive">
    <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
      <td class="text_time {%Changed_Score}"><b>{%ScoreH}-{%ScoreA}</b>
        <div nowrap class="{@LiveTimeCls}">{%ShowTime}</div></td>
      <td class="line_unR" valign='top'><div class="{@Home_Cls}">{%HomeName}</div>
        <div class="{@Away_Cls}">{%AwayName}</div>
        <div>{@Draw}</div> </td>
      <td align="right" valign="middle" style="white-space: nowrap">{@SportRadarInfo}{@Streaming}{@Favorites}</td>
      <td align="right" valign="top"><div class="line_divL line_divR UdrDogOddsClass {%Changed_5}"> <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_5}','1','{%Odds_5_1}',5)">{%Odds_5_1}</a><br />
          <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_5}','2','{%Odds_5_2}',5)">{%Odds_5_2}</a><br />
          <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_5}','X','{%Odds_5_X}',5)">{%Odds_5_X}</a> </div></td>
      <td valign="top"><div class="line_divL line_divR {%Changed_20}"> <a class="{@Odds_20_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','h','{%Odds_20_H}',20)">{%Odds_20_H}</a><br />
          <a class="{@Odds_20_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','a','{%Odds_20_A}',20)">{%Odds_20_A}</a><br />
        </div></td>
      <td valign="top"><div class="line_divL HdpGoalClass">{@Value_1_H}<br />
          {@Value_1_A}</div>
        <div class="line_divR OddsDiv {%Changed_1}"><a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)">{%Odds_1_H}</a><br />
          <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)">{%Odds_1_A}</a><br />
        </div></td>
      <td valign="top"><div class="line_divL HdpGoalClass">{%Goal_3}<br />
          {@UNDER_3}</div>
        <div class="line_divR OddsDiv {%Changed_3}"><a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)">{%Odds_3_O}</a><br />
          <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)">{%Odds_3_U}</a><br />
        </div></td>
      <td valign="top"><div class="line_divL HdpGoalClass">{@ODD_2}<br />
          {@EVEN_2}</div>
        <div class="line_divR OddsDiv {%Changed_2}"><a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)">{%Odds_2_O}</a><br />
          <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)">{%Odds_2_E}</a><br />
        </div></td>
      <td align="center">{@StatsInfo}</td>
    </tr>
  </tbody>
  <tbody id="tmplLeague">
    <tr id="l_{%LeagueId}" onclick="refreshData_D()" style="cursor: pointer">
      <td class="tabtitle"></td>
      <td colspan="6" class="tabtitle">{@FavLeagues}{%LeagueName}</td>
      <td colspan="2" class="tabtitle" align="right" nowrap><a name="btnRefresh_D" class="btnIcon right disable">
        <div class="icon-refresh" title="กรุณารอ"></div>
        </a></td>
    </tr>
  </tbody>
  <tbody id="tmplEvent">
    <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
      <td class="text_time">{%ShowTime}</td>
      <td class="line_unR" valign='top'><div class="{@Home_Cls}">{%HomeName}</div>
        <div class="{@Away_Cls}">{%AwayName}</div>
        <div>{@Draw}</div> </td>
      <td align="right" valign="middle" style="white-space: nowrap">{@SportRadarInfo}{@Streaming}{@Favorites}</td>
      <td align="right" valign="top"><div class="line_divL line_divR UdrDogOddsClass {%Changed_5}"> <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_5}','1','{%Odds_5_1}',5)">{%Odds_5_1}</a><br />
          <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_5}','2','{%Odds_5_2}',5)">{%Odds_5_2}</a><br />
          <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_5}','X','{%Odds_5_X}',5)">{%Odds_5_X}</a> </div></td>
      <td valign="top"><div class="line_divL line_divR {%Changed_20}"><a class="{@Odds_20_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','h','{%Odds_20_H}',20)">{%Odds_20_H}</a><br />
          <a class="{@Odds_20_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','a','{%Odds_20_A}',20)">{%Odds_20_A}</a><br />
        </div></td>
      <td valign="top"><div class="line_divL HdpGoalClass">{@Value_1_H}<br />
          {@Value_1_A}</div>
        <div class="line_divR OddsDiv {%Changed_1}"><a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)">{%Odds_1_H}</a><br />
          <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)">{%Odds_1_A}</a><br />
        </div></td>
      <td valign="top"><div class="line_divL HdpGoalClass">{%Goal_3}<br />
          {@UNDER_3}</div>
        <div class="line_divR OddsDiv {%Changed_3}"> <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)">{%Odds_3_O}</a><br />
          <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)">{%Odds_3_U}</a><br />
        </div></td>
      <td valign="top"><div class="line_divL HdpGoalClass">{@ODD_2}<br />
          {@EVEN_2}</div>
        <div class="line_divR OddsDiv {%Changed_2}"> <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)">{%Odds_2_O}</a><br />
          <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)">{%Odds_2_E}</a><br />
        </div></td>
      <td align="center">{@StatsInfo}</td>
    </tr>
  </tbody>
</table>
<span id="tmplEnd"></span>


</body>
</html>
