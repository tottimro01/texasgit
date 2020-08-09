
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Baseball Template</title>

</head>
<body>
<table id="tmplTable" class="oddsTable" width="100%" cellpadding="0" cellspacing="0" border="0">
  <tbody id="tmplHeader">
    <tr>
      <th width="6%" rowspan="2" title="เวลา" nowrap="nowrap">เวลา</th>
      <th colspan="2" rowspan="2" align="left" class="even" title="รายการ/คนขว้างลูก"><div class="text-ellipsis" style="">รายการ/คนขว้างลูก</div></th>
      <th width="55" rowspan="2"  title="ทายผลผู้ชนะหรือทีมที่ชนะ"><div class="text-ellipsis" style="width:55px;">ทายผลผู้ชนะหรือทีมที่ชนะ</div></th>
      <th width="80" rowspan="2" title="ราคาต่อรอง"><div class="text-ellipsis" style="width:80px;">ราคาต่อรอง</div></th>
      <th width="80" rowspan="2" class="tabt_R" title="มากกว่า/น้อยกว่า"><div class="text-ellipsis" style="width:80px;">มากกว่า/น้อยกว่า</div></th>
      <th colspan="3" class="even tabthup" title="5 อินนิ่งแรก">5 อินนิ่งแรก</th>
      <th width="1" rowspan="2">&nbsp;</th>
    </tr>
    <tr class="tabthdwn">
      <th width="50" class="even" title="1H Moneyline"><div class="text-ellipsis" style="width:80px;">1H Moneyline</div></th>
      <th width="80" class="even" title="แต้มต่อ (ครึ่งแรก)"><div class="text-ellipsis" style="width:80px;">แต้มต่อ (ครึ่งแรก)</div></th>
      <th width="80" class="even" title="มากกว่า/น้อยกว่า (ครึ่งแรก)"><div class="text-ellipsis" style="width:80px;">มากกว่า/น้อยกว่า (ครึ่งแรก)</div></th>
    </tr>
  </tbody>
  <tbody id="tmplLeague_L">
    <tr id="l_{%LeagueId}" onclick="refreshData_L()" style="cursor: pointer">
      <td class="tabtitle"></td>
      <td colspan="7" class="tabtitle">{@FavLeagues}{%LeagueName}</td>
      <td colspan="2" class="tabtitle" align="right" nowrap><a name="btnRefresh_L" class="btnIcon right disable"><div class="icon-refresh" title="กรุณารอ"></div></a></td>
    </tr>
  </tbody>
  <tbody id="tmplLive">
    <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
      <td align="center" class="text_time {%Changed_Score}">
        <div class="{@TimeSuspendCls}"><span class="iconInfo rain"></span></div>
		<div><b>{%ScoreH}-{%ScoreA}</b></div>
      </td>
      <td class="line_unR"><div onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%StatsId}', '{@HomeName}', '{@AwayName}',8)" onmouseover="javascript:CheckCursorStyle(1,'D_liveinfoM_{%MatchId}_H');" onmouseout="javascript:CheckCursorStyle(0,'D_liveinfoM_{%MatchId}_H');" class="{@Home_Cls} D_liveinfoM_{%MatchId}_H"> {%HomeName} [{%PitcherH}]</div>
        <div onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%StatsId}', '{@HomeName}', '{@AwayName}',8)" onmouseover="javascript:CheckCursorStyle(1,'L_liveinfoM_{%MatchId}_A');" onmouseout="javascript:CheckCursorStyle(0,'L_liveinfoM_{%MatchId}_A');" class="{@Away_Cls} L_liveinfoM_{%MatchId}_A"> {%AwayName} [{%PitcherA}]</div></td>
	  <td align="right" valign="middle" style="white-space: nowrap">{@Streaming}{@SportRadarInfo}{@Favorites}</td>
      <td class="none_rline"><div class="line_divR {%Changed_20}"> <a class="{@Odds_20_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','h','{%Odds_20_H}',20)"> {%Odds_20_H}</a><br />
          <a class="{@Odds_20_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','a','{%Odds_20_A}',20)"> {%Odds_20_A}</a> </div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {@Value_1_H}<br />
          {@Value_1_A}</div>
        <div class="line_divR OddsDiv {%Changed_1}"> <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)"> {%Odds_1_H}</a><br />
          <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)"> {%Odds_1_A}</a> </div></td>
      <td class="tabt_R"><div class="line_divL HdpGoalClass"> {%Goal_3}<br />
          {@UNDER_3}</div>
        <div class="line_divR OddsDiv {%Changed_3}"> <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)"> {%Odds_3_O}</a><br />
          <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)"> {%Odds_3_U}</a> </div></td>
      <td class="none_rline"><div class="line_divR {%Changed_21}"> <a class="{@Odds_21_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_21}','h','{%Odds_21_H}',21)"> {%Odds_21_H}</a><br />
          <a class="{@Odds_21_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_21}','a','{%Odds_21_A}',21)"> {%Odds_21_A}</a> </div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {@Value_7_H}<br />
          {@Value_7_A}</div>
        <div class="line_divR OddsDiv {%Changed_7}"> <a class="{@Odds_7_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','h','{%Odds_7_H}',7)"> {%Odds_7_H}</a><br />
          <a class="{@Odds_7_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','a','{%Odds_7_A}',7)"> {%Odds_7_A}</a> </div></td>
      <td><div class="line_divL HdpGoalClass"> {%Goal_8}<br />
          {@UNDER_8}</div>
        <div class="line_divR OddsDiv {%Changed_8}"> <a class="{@Odds_8_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','h','{%Odds_8_O}',8)"> {%Odds_8_O}</a><br />
          <a class="{@Odds_8_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','a','{%Odds_8_U}',8)"> {%Odds_8_U}</a> </div></td>
      <td align="center"> {@StatsInfo}</td>
    </tr>
  </tbody>
  <tbody id="tmplLiveFooter">
    <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
      <td align="center" class="text_time {%Changed_Score}">
              <div class="{@TimeSuspendCls}"><span class="iconInfo rain"></span></div>
              <div><b>{%ScoreH}-{%ScoreA}</b></div>
      </td>
      <td class="line_unR"><div onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%StatsId}', '{@HomeName}', '{@AwayName}',8)" onmouseover="javascript:CheckCursorStyle(1,'D_liveinfoM_{%MatchId}_H');" onmouseout="javascript:CheckCursorStyle(0,'D_liveinfoM_{%MatchId}_H');" class="{@Home_Cls} D_liveinfoM_{%MatchId}_H"> {%HomeName} <span class="FavTeamClass">[{%PitcherH}]</span></div>
        <div onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%StatsId}', '{@HomeName}', '{@AwayName}',8)" onmouseover="javascript:CheckCursorStyle(1,'L_liveinfoM_{%MatchId}_A');" onmouseout="javascript:CheckCursorStyle(0,'L_liveinfoM_{%MatchId}_A');" class="{@Away_Cls} L_liveinfoM_{%MatchId}_A"> {%AwayName} [{%PitcherA}]</div></td>
	  <td align="right" valign="middle" style="white-space: nowrap">{@Streaming}{@SportRadarInfo}<span style="display: inline-block; " class="{@LS_Status}"><span class="iconOdds info {@LS_Status_IMG}" title="คะแนนสด" onclick="javascript:View_LS(this,'{%MUID}','{%GS}')"></span></span>{@Favorites}</td>
      <td class="none_rline"><div class="line_divR {%Changed_20}"> <a class="{@Odds_20_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','h','{%Odds_20_H}',20)"> {%Odds_20_H}</a><br />
          <a class="{@Odds_20_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','a','{%Odds_20_A}',20)"> {%Odds_20_A}</a> </div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {@Value_1_H}<br />
          {@Value_1_A}</div>
        <div class="line_divR OddsDiv {%Changed_1}"> <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)"> {%Odds_1_H}</a><br />
          <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)"> {%Odds_1_A}</a> </div></td>
      <td class="tabt_R"><div class="line_divL HdpGoalClass"> {%Goal_3}<br />
          {@UNDER_3}</div>
        <div class="line_divR OddsDiv {%Changed_3}"> <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)"> {%Odds_3_O}</a><br />
          <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)"> {%Odds_3_U}</a> </div></td>
      <td class="none_rline"><div class="line_divR {%Changed_21}"> <a class="{@Odds_21_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_21}','h','{%Odds_21_H}',21)"> {%Odds_21_H}</a><br />
          <a class="{@Odds_21_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_21}','a','{%Odds_21_A}',21)"> {%Odds_21_A}</a> </div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {@Value_7_H}<br />
          {@Value_7_A}</div>
        <div class="line_divR OddsDiv {%Changed_7}"> <a class="{@Odds_7_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','h','{%Odds_7_H}',7)"> {%Odds_7_H}</a><br />
          <a class="{@Odds_7_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','a','{%Odds_7_A}',7)"> {%Odds_7_A}</a> </div></td>
      <td><div class="line_divL HdpGoalClass"> {%Goal_8}<br />
          {@UNDER_8}</div>
        <div class="line_divR OddsDiv {%Changed_8}"> <a class="{@Odds_8_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','h','{%Odds_8_O}',8)"> {%Odds_8_O}</a><br />
          <a class="{@Odds_8_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','a','{%Odds_8_U}',8)"> {%Odds_8_U}</a> </div></td>
      <td align="center"> {@StatsInfo}</td>
    </tr>
    <tr class="{@LS_display_9}" id="LS_{%MUID}_9">
      <td class="score_box line_unR"><table border="0" align="right" cellpadding="0" cellspacing="0">
          <tr>
            <td style="width: 15px; height: 15px"><span class="iconInfo baseball {@Battleh}" title="Battle"></span></td>
          </tr>
          <tr>
            <td style="width: 15px; height: 15px"><span class="iconInfo baseball {@Battlea}" title="Battle"></span></td>
          </tr>
        </table></td>
      <td colspan="9" class="score_box baseball_LS2"><table border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td><table border="0" cellpadding="0" cellspacing="0" class="baseball_LS1">
                <tr>
                  <td><div class="box02">
                      <div class="{@Changed_out} border" title="{@Out} Out"> {@Out} Out</div>
                    </div></td>
                  <td><div class="{@B1}">
                      <div class="{@Changed_1b} border line_divL" title="1st Base"> 1st B</div>
                    </div>
                    <div class="{@B2}">
                      <div class="{@Changed_2b} border line_divL" title="2nd Base"> 2nd B</div>
                    </div>
                    <div class="{@B3}">
                      <div class="{@Changed_3b} border line_divL" title="3rd Base"> 3rd B</div>
                    </div></td>
                </tr>
              </table></td>
            <td width="50" class="score_box"><div class="{@LS_1}">
                <div class="{@ScoreChange_1} border line_divR">
                  <div class="line_b"> {@H1S}</div>
                  <div> {@A1S}</div>
                </div>
                <div class="line_divR"> <span title="1st Inning">1st</span></div>
              </div></td>
            <td width="50" class="score_box"><div class="{@LS_2}">
                <div class="{@ScoreChange_2} border line_divR">
                  <div class="line_b"> {@H2S}</div>
                  <div> {@A2S}</div>
                </div>
                <div class="line_divR"> <span title="2nd Inning">2nd</span></div>
              </div></td>
            <td width="50" class="score_box"><div class="{@LS_3}">
                <div class="{@ScoreChange_3} border line_divR">
                  <div class="line_b"> {@H3S}</div>
                  <div> {@A3S}</div>
                </div>
                <div class="line_divR"> <span title="3rd Inning">3rd</span></div>
              </div></td>
            <td width="50" class="score_box"><div class="{@LS_4}">
                <div class="{@ScoreChange_4} border line_divR">
                  <div class="line_b"> {@H4S}</div>
                  <div> {@A4S}</div>
                </div>
                <div class="line_divR"> <span title="4th Inning">4th</span></div>
              </div></td>
            <td width="50" class="score_box"><div class="{@LS_5}">
                <div class="{@ScoreChange_5} border line_divR">
                  <div class="line_b"> {@H5S}</div>
                  <div> {@A5S}</div>
                </div>
                <div class="line_divR"> <span title="5th Inning">5th</span></div>
              </div></td>
            <td width="50" class="score_box"><div class="{@LS_6}">
                <div class="{@ScoreChange_6} border line_divR">
                  <div class="line_b"> {@H6S}</div>
                  <div> {@A6S}</div>
                </div>
                <div class="line_divR"> <span title="6th Inning">6th</span></div>
              </div></td>
            <td width="50" class="score_box"><div class="{@LS_7}">
                <div class="{@ScoreChange_7} border line_divR">
                  <div class="line_b"> {@H7S}</div>
                  <div> {@A7S}</div>
                </div>
                <div class="line_divR"> <span title="7th Inning">7th</span></div>
              </div></td>
            <td width="50" class="score_box"><div class="{@LS_8}">
                <div class="{@ScoreChange_8} border line_divR">
                  <div class="line_b"> {@H8S}</div>
                  <div> {@A8S}</div>
                </div>
                <div class="line_divR"> <span title="8th Inning">8th</span></div>
              </div></td>
            <td width="50" class="score_box"><div class="{@LS_9}">
                <div class="{@ScoreChange_9} border line_divR">
                  <div class="line_b"> {@H9S}</div>
                  <div> {@A9S}</div>
                </div>
                <div class="line_divR"> <span title="9th Inning">9th</span></div>
              </div></td>
            <td width="50" class="score_box"><div class="{@LS_OT}">
                <div class="{@ScoreChange_OT} border line_r line_divR">
                  <div class="line_b"> {@HOT}</div>
                  <div> {@AOT}</div>
                </div>
                <div class="line_divR"> <span title="Overtime">EI</span></div>
              </div></td>
            <td width="50" class="score_box"><div class="box02">
                <div class="border line_r line_divR {%Changed_Score}">
                  <div class="line_b"> {@HRUNS}</div>
                  <div> {@ARUNS}</div>
                </div>
                <div class="line_divR"> <span title="Runs">R</span></div>
              </div></td>
          </tr>
        </table></td>
    </tr>
  </tbody>
  <tbody id="tmplLeague">
    <tr id="l_{%LeagueId}" onclick="refreshData_D()" style="cursor: pointer">
      <td class="tabtitle"></td>
      <td colspan="7" class="tabtitle">{@FavLeagues}{%LeagueName}</td>
      <td colspan="2" class="tabtitle" align="right" nowrap><a name="btnRefresh_D" class="btnIcon right disable"><div class="icon-refresh" title="กรุณารอ"></div></a></td>
    </tr>
  </tbody>
  <tbody id="tmplEvent">
    <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
      <td align="center" class="text_time"> {%ShowTime}</td>
      <td class="line_unR"><div onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%StatsId}', '{@HomeName}', '{@AwayName}',8)" onmouseover="javascript:CheckCursorStyle(1,'D_liveinfoM_{%MatchId}_H');" onmouseout="javascript:CheckCursorStyle(0,'D_liveinfoM_{%MatchId}_H');" class="{@Home_Cls} D_liveinfoM_{%MatchId}_H"> {%HomeName} [{%PitcherH}]</div>
        <div onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%StatsId}', '{@HomeName}', '{@AwayName}',8)" onmouseover="javascript:CheckCursorStyle(1,'L_liveinfoM_{%MatchId}_A');" onmouseout="javascript:CheckCursorStyle(0,'L_liveinfoM_{%MatchId}_A');" class="{@Away_Cls} L_liveinfoM_{%MatchId}_A"> {%AwayName} [{%PitcherA}]</div></td>
	  <td align="right" valign="middle" style="white-space: nowrap">{@Streaming}{@SportRadarInfo}{@Favorites}</td>
      <td class="none_rline"><div class="line_divR {%Changed_20}"> <a class="{@Odds_20_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','h','{%Odds_20_H}',20)"> {%Odds_20_H}</a><br />
          <a class="{@Odds_20_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_20}','a','{%Odds_20_A}',20)"> {%Odds_20_A}</a> </div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {@Value_1_H}<br />
          {@Value_1_A}</div>
        <div class="line_divR {%Changed_1}"> <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)"> {%Odds_1_H}</a><br />
          <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)"> {%Odds_1_A}</a> </div></td>
      <td class="tabt_R"><div class="line_divL HdpGoalClass"> {%Goal_3}<br />
          {@UNDER_3}</div>
        <div class="line_divR OddsDiv {%Changed_3}"> <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)"> {%Odds_3_O}</a><br />
          <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)"> {%Odds_3_U}</a> </div></td>
      <td class="none_rline"><div class="line_divR {%Changed_21}"> <a class="{@Odds_21_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_21}','h','{%Odds_21_H}',21)"> {%Odds_21_H}</a><br />
          <a class="{@Odds_21_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_21}','a','{%Odds_21_A}',21)"> {%Odds_21_A}</a> </div></td>
      <td class="none_rline"><div class="line_divL HdpGoalClass"> {@Value_7_H}<br />
          {@Value_7_A}</div>
        <div class="line_divR OddsDiv {%Changed_7}"> <a class="{@Odds_7_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','h','{%Odds_7_H}',7)"> {%Odds_7_H}</a><br />
          <a class="{@Odds_7_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','a','{%Odds_7_A}',7)"> {%Odds_7_A}</a> </div></td>
      <td><div class="line_divL HdpGoalClass"> {%Goal_8}<br />
          {%UNDER_8}</div>
        <div class="line_divR OddsDiv {%Changed_8}"> <a class="{@Odds_8_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','h','{%Odds_8_O}',8)"> {%Odds_8_O}</a><br />
          <a class="{@Odds_8_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','a','{%Odds_8_U}',8)"> {%Odds_8_U}</a> </div></td>
      <td align="center"> {@StatsInfo}</td>
    </tr>
  </tbody>
</table>
<span id="tmplEnd"></span>
</body>
</html>
