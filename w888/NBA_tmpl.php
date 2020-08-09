<?
session_start(); 
// require("lang/member_lang.php");
  require("lang/variable_lang.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>NBA Template</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
    <table id="tmplTable" class="oddsTable" width="100%" cellpadding="0" cellspacing="0"
        border="0">
        <tbody id="tmplHeader">
            <tr>
                <th width="7%" nowrap="nowrap">
                    <?=$lang_member[303];?>
                </th>
                <th width="34%" colspan="2" align="left" class="even">
                    <?=$lang_member[708];?>
                </th>
                <th style="min-width: 76px; max-width: 88px;" nowrap="nowrap" class="text-ellipsis">
                    <font title="<?=$lang_member[805];?> <?=$lang_member[895];?>">FT. HDP</font>
                </th>
                <th style="min-width: 78px; max-width: 90px;" nowrap="nowrap" class="even text-ellipsis">
                    <font title="<?=$lang_member[805];?> <?=$lang_member[899];?>/<?=$lang_member[900];?>">FT. O/U</font>
                </th>
                <th style="min-width: 56px; max-width: 68px;" nowrap="nowrap" class="text-ellipsis text-ellipsis">
                    <font title="<?=$lang_member[805];?> <?=$lang_member[453];?>/<?=$lang_member[459];?>">FT. O/E</font>
                </th>
                <th style="min-width: 76px; max-width: 88px;" nowrap="nowrap" class="even text-ellipsis">
                    <font title="<?=$lang_member[803];?> <?=$lang_member[895];?>">1H. HDP</font>
                </th>
                <th style="min-width: 78px; max-width: 90px;" nowrap="nowrap" class="text-ellipsis">
                    <font title="<?=$lang_member[803];?> <?=$lang_member[899];?>/<?=$lang_member[900];?>">1H. O/U</font>
                </th>
                <th style="min-width: 56px; max-width: 68px;" nowrap="nowrap" class="even text-ellipsis">
                    <font title="<?=$lang_member[803];?> <?=$lang_member[453];?>/<?=$lang_member[459];?>">1H. O/E</font>
                </th>
                <th width="1">
                    &nbsp;
                </th>
            </tr>
        </tbody>
        <tbody id="tmplLeague_L">
            <tr id="l_{%LeagueId}" onclick="refreshData_L()" style="cursor: pointer">
                <td class="tabtitle">
                </td>
                <td colspan="7" class="tabtitle">
                    {@FavLeagues}{%LeagueName}
                </td>
                <td colspan="2" class="tabtitle" align="right" nowrap>
                    <a name="btnRefresh_L" class="btnIcon right disable">
                        <div class="icon-refresh" title="<?=$lang_member[770];?>">
                        </div>
                    </a>
                </td>
            </tr>
        </tbody>
        <tbody id="tmplLive">
            <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
                <td class="text_time {%Changed_Score}">
                    <b>{%ScoreH}-{%ScoreA}</b>
                    <div style="white-space: nowrap" class="{@LiveTimeCls}">
                        {%ShowTime}</div>
                </td>
                <td class="line_unR" style="width: 130px">
                    <div class="{@Home_Cls}">
                        {%HomeName}</div>
                    <div class="{@Away_Cls}">
                        {%AwayName}</div>
                </td>
                <td align="right" valign="middle" style="white-space: nowrap">
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {@Value_1_H}<br />
                        {@Value_1_A}</div>
                    <div class="line_divR OddsDiv {%Changed_1}">
                        <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)">
                            {%Odds_1_H}</a><br />
                        <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)">
                            {%Odds_1_A}</a><br />
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {%Goal_3}<br />
                        {@UNDER_3}</div>
                    <div class="line_divR OddsDiv {%Changed_3}">
                        <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)">
                            {%Odds_3_O}</a><br />
                        <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)">
                            {%Odds_3_U}</a><br />
                    </div>
                </td>
                <td>
                    <div class="line_divL HdpGoalClass">
                        <span title="<?=$lang_member[453];?>">{@ODD_2}</span><br />
                        <span title="<?=$lang_member[459];?>">{@EVEN_2}</span></div>
                    <div class="line_divR OddsDiv {%Changed_2}">
                        <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)">
                            {%Odds_2_O}</a><br />
                        <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)">
                            {%Odds_2_E}</a><br />
                    </div>
                </td>
                <td class="tabt_L none_rline">
                    <div class="line_divL HdpGoalClass">
                        {@Value_7_H}<br />
                        {@Value_7_A}</div>
                    <div class="line_divR OddsDiv {%Changed_7}">
                        <a class="{@Odds_7_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','h','{%Odds_7_H}',7)">
                            {%Odds_7_H}</a><br />
                        <a class="{@Odds_7_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','a','{%Odds_7_A}',7)">
                            {%Odds_7_A}</a><br />
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {%Goal_8}<br />
                        {@UNDER_8}</div>
                    <div class="line_divR OddsDiv {%Changed_8}">
                        <a class="{@Odds_8_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','h','{%Odds_8_O}',8)">
                            {%Odds_8_O}</a><br />
                        <a class="{@Odds_8_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','a','{%Odds_8_U}',8)">
                            {%Odds_8_U}</a><br />
                    </div>
                </td>
                <td>
                    <div class="line_divL HdpGoalClass">
                        <span title="<?=$lang_member[453];?>">{@ODD_12}</span><br />
                        <span title="<?=$lang_member[459];?>">{@EVEN_12}</span></div>
                    <div class="line_divR OddsDiv {%Changed_12}">
                        <a class="{@Odds_12_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_12}','h','{%Odds_12_O}',12)">
                            {%Odds_12_O}</a><br />
                        <a class="{@Odds_12_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_12}','a','{%Odds_12_E}',12)">
                            {%Odds_12_E}</a><br />
                    </div>
                </td>
                <td align="center">
                    {@StatsInfo}
                </td>
            </tr>
        </tbody>
        <tbody id="tmplLive_56">
            <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
                <td align="center" class="text_time" valign="middle">
                    <div style="white-space: nowrap" class="{@LiveTimeCls}">
                        {%ShowTime}</div>
                </td>
                <td class="line_unR" style="width: 130px">
                    <div class="{@Home_Cls}">{%HomeName}</div>
                    <div class="{@Away_Cls}">{%AwayName}</div>
                </td>
                <td align="right" valign="middle" style="white-space: nowrap">
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {@Value_1_H}<br />
                        {@Value_1_A}</div>
                    <div class="line_divR OddsDiv {%Changed_1}">
                        <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)">
                            {%Odds_1_H}</a><br />
                        <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)">
                            {%Odds_1_A}</a><br />
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {%Goal_3}<br />
                        {@UNDER_3}</div>
                    <div class="line_divR OddsDiv {%Changed_3}">
                        <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)">
                            {%Odds_3_O}</a><br />
                        <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)">
                            {%Odds_3_U}</a><br />
                    </div>
                </td>
                <td>
                    <div class="line_divL HdpGoalClass">
                        <span title="<?=$lang_member[453];?>">{@ODD_2}</span><br />
                        <span title="<?=$lang_member[459];?>">{@EVEN_2}</span></div>
                    <div class="line_divR OddsDiv {%Changed_2}">
                        <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)">
                            {%Odds_2_O}</a><br />
                        <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)">
                            {%Odds_2_E}</a><br />
                    </div>
                </td>
                <td class="tabt_L none_rline">
                    <div class="line_divL HdpGoalClass">
                        {@Value_7_H}<br />
                        {@Value_7_A}</div>
                    <div class="line_divR OddsDiv {%Changed_7}">
                        <a class="{@Odds_7_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','h','{%Odds_7_H}',7)">
                            {%Odds_7_H}</a><br />
                        <a class="{@Odds_7_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','a','{%Odds_7_A}',7)">
                            {%Odds_7_A}</a><br />
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {%Goal_8}<br />
                        {@UNDER_8}</div>
                    <div class="line_divR OddsDiv {%Changed_8}">
                        <a class="{@Odds_8_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','h','{%Odds_8_O}',8)">
                            {%Odds_8_O}</a><br />
                        <a class="{@Odds_8_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','a','{%Odds_8_U}',8)">
                            {%Odds_8_U}</a><br />
                    </div>
                </td>
                <td>
                    <div class="line_divL HdpGoalClass">
                        <span title="<?=$lang_member[453];?>">{@ODD_12}</span><br />
                        <span title="<?=$lang_member[459];?>">{@EVEN_12}</span></div>
                    <div class="line_divR OddsDiv {%Changed_12}">
                        <a class="{@Odds_12_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_12}','h','{%Odds_12_O}',12)">
                            {%Odds_12_O}</a><br />
                        <a class="{@Odds_12_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_12}','a','{%Odds_12_E}',12)">
                            {%Odds_12_E}</a><br />
                    </div>
                </td>
                <td align="center">
                    {@StatsInfo}
                </td>
            </tr>
        </tbody>

        <tbody id="tmplLive_2">
            <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
                <td align="center" class="text_time" valign="middle">
                    <span class="{@TimeSuspendCls} HalfTime">T.Out</span>
                    <div style="white-space: nowrap" class="{@LiveTimeCls}">
                        {%ShowTime}</div>
                </td>
                <td class="line_unR" style="width: 130px">
                    <div class="{@Home_Cls}">
                        <span class="D_liveinfoM_{%MatchId}_H" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%StatsId}', '{@HomeName}', '{@AwayName}',2)" onmouseover="javascript:CheckCursorStyle(1,'D_liveinfoM_{%MatchId}_H');" onmouseout="javascript:CheckCursorStyle(0,'D_liveinfoM_{%MatchId}_H');">{%HomeName}</span></div>
                    <div class="{@Away_Cls}">
                        <span class="L_liveinfoM_{%MatchId}_A" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%StatsId}', '{@HomeName}', '{@AwayName}',2)" onmouseover="javascript:CheckCursorStyle(1,'L_liveinfoM_{%MatchId}_A');" onmouseout="javascript:CheckCursorStyle(0,'L_liveinfoM_{%MatchId}_A');">{%AwayName}</span></div>
                </td>
                <td align="right" valign="middle" style="white-space: nowrap">
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {@Value_1_H}<br />
                        {@Value_1_A}</div>
                    <div class="line_divR OddsDiv {%Changed_1}">
                        <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)">
                            {%Odds_1_H}</a><br />
                        <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)">
                            {%Odds_1_A}</a><br />
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {%Goal_3}<br />
                        {@UNDER_3}</div>
                    <div class="line_divR OddsDiv {%Changed_3}">
                        <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)">
                            {%Odds_3_O}</a><br />
                        <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)">
                            {%Odds_3_U}</a><br />
                    </div>
                </td>
                <td>
                    <div class="line_divL HdpGoalClass">
                        <span title="<?=$lang_member[453];?>">{@ODD_2}</span><br />
                        <span title="<?=$lang_member[459];?>">{@EVEN_2}</span></div>
                    <div class="line_divR OddsDiv {%Changed_2}">
                        <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)">
                            {%Odds_2_O}</a><br />
                        <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)">
                            {%Odds_2_E}</a><br />
                    </div>
                </td>
                <td class="tabt_L none_rline">
                    <div class="line_divL HdpGoalClass">
                        {@Value_7_H}<br />
                        {@Value_7_A}</div>
                    <div class="line_divR OddsDiv {%Changed_7}">
                        <a class="{@Odds_7_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','h','{%Odds_7_H}',7)">
                            {%Odds_7_H}</a><br />
                        <a class="{@Odds_7_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','a','{%Odds_7_A}',7)">
                            {%Odds_7_A}</a><br />
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {%Goal_8}<br />
                        {@UNDER_8}</div>
                    <div class="line_divR OddsDiv {%Changed_8}">
                        <a class="{@Odds_8_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','h','{%Odds_8_O}',8)">
                            {%Odds_8_O}</a><br />
                        <a class="{@Odds_8_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','a','{%Odds_8_U}',8)">
                            {%Odds_8_U}</a><br />
                    </div>
                </td>
                <td>
                    <div class="line_divL HdpGoalClass">
                        <span title="<?=$lang_member[453];?>">{@ODD_12}</span><br />
                        <span title="<?=$lang_member[459];?>">{@EVEN_12}</span></div>
                    <div class="line_divR OddsDiv {%Changed_12}">
                        <a class="{@Odds_12_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_12}','h','{%Odds_12_O}',12)">
                            {%Odds_12_O}</a><br />
                        <a class="{@Odds_12_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_12}','a','{%Odds_12_E}',12)">
                            {%Odds_12_E}</a><br />
                    </div>
                </td>
                <td align="center">
                    {@StatsInfo}
                </td>
            </tr>
        </tbody>
        <tbody id="tmplLive_3">
            <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
                <td class="text_time {%Changed_Score}">
                    <span class="{@TimeSuspendCls} HalfTime">T.Out</span>
                    <div class="{@TimeSuspendCls1}">
                        <b>{%ScoreH}-{%ScoreA}</b></div>
                    <div style="white-space: nowrap" class="{@LiveTimeCls}">
                        {%ShowTime}</div>
                </td>
                <td class="line_unR" style="width: 130px">
                    <div class="{@Home_Cls}">
                        {%HomeName}</div>
                    <div class="{@Away_Cls}">
                        {%AwayName}</div>
                </td>
                <td align="right" valign="middle" style="white-space: nowrap">
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {@Value_1_H}<br />
                        {@Value_1_A}</div>
                    <div class="line_divR OddsDiv {%Changed_1}">
                        <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)">
                            {%Odds_1_H}</a><br />
                        <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)">
                            {%Odds_1_A}</a><br />
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {%Goal_3}<br />
                        {@UNDER_3}</div>
                    <div class="line_divR OddsDiv {%Changed_3}">
                        <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)">
                            {%Odds_3_O}</a><br />
                        <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)">
                            {%Odds_3_U}</a><br />
                    </div>
                </td>
                <td>
                    <div class="line_divL HdpGoalClass">
                        <span title="<?=$lang_member[453];?>">{@ODD_2}</span><br />
                        <span title="<?=$lang_member[459];?>">{@EVEN_2}</span></div>
                    <div class="line_divR OddsDiv {%Changed_2}">
                        <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)">
                            {%Odds_2_O}</a><br />
                        <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)">
                            {%Odds_2_E}</a><br />
                    </div>
                </td>
                <td class="tabt_L none_rline">
                    <div class="line_divL HdpGoalClass">
                        {@Value_7_H}<br />
                        {@Value_7_A}</div>
                    <div class="line_divR OddsDiv {%Changed_7}">
                        <a class="{@Odds_7_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','h','{%Odds_7_H}',7)">
                            {%Odds_7_H}</a><br />
                        <a class="{@Odds_7_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','a','{%Odds_7_A}',7)">
                            {%Odds_7_A}</a><br />
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {%Goal_8}<br />
                        {@UNDER_8}</div>
                    <div class="line_divR OddsDiv {%Changed_8}">
                        <a class="{@Odds_8_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','h','{%Odds_8_O}',8)">
                            {%Odds_8_O}</a><br />
                        <a class="{@Odds_8_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','a','{%Odds_8_U}',8)">
                            {%Odds_8_U}</a><br />
                    </div>
                </td>
                <td>
                    <div class="line_divL HdpGoalClass">
                        <span title="<?=$lang_member[453];?>">{@ODD_12}</span><br />
                        <span title="<?=$lang_member[459];?>">{@EVEN_12}</span></div>
                    <div class="line_divR OddsDiv {%Changed_12}">
                        <a class="{@Odds_12_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_12}','h','{%Odds_12_O}',12)">
                            {%Odds_12_O}</a><br />
                        <a class="{@Odds_12_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_12}','a','{%Odds_12_E}',12)">
                            {%Odds_12_E}</a><br />
                    </div>
                </td>
                <td align="center">
                    {@StatsInfo}
                </td>
            </tr>
        </tbody>
        <tbody id="tmplLive_26" title="tmplLive_3">
        </tbody>
        <tbody id="tmplLiveMaster_26" title="tmplLiveMaster_3">
        </tbody>
        <tbody id="tmplLiveMaster_3">
            <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
                <td class="text_time {%Changed_Score}">
                    <span class="{@TimeSuspendCls} HalfTime">T.Out</span>
                    <div class="{@TimeSuspendCls1}">
                        <b>{%ScoreH}-{%ScoreA}</b></div>
                    <div style="white-space: nowrap" class="{@LiveTimeCls}">
                        {%ShowTime}</div>
                </td>
                <td class="line_unR" style="width: 130px">
                    <div class="{@Home_Cls}">
                        {%HomeName}</div>
                    <div class="{@Away_Cls}">
                        {%AwayName}</div>
                </td>
                <td align="right" valign="middle" style="white-space: nowrap">
                    {@Streaming}{@SportRadarInfo}{@Favorites}
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {@Value_1_H}<br />
                        {@Value_1_A}</div>
                    <div class="line_divR OddsDiv {%Changed_1}">
                        <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)">
                            {%Odds_1_H}</a><br />
                        <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)">
                            {%Odds_1_A}</a><br />
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {%Goal_3}<br />
                        {@UNDER_3}</div>
                    <div class="line_divR OddsDiv {%Changed_3}">
                        <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)">
                            {%Odds_3_O}</a><br />
                        <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)">
                            {%Odds_3_U}</a><br />
                    </div>
                </td>
                <td>
                    <div class="line_divL HdpGoalClass">
                        <span title="<?=$lang_member[453];?>">{@ODD_2}</span><br />
                        <span title="<?=$lang_member[459];?>">{@EVEN_2}</span></div>
                    <div class="line_divR OddsDiv {%Changed_2}">
                        <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)">
                            {%Odds_2_O}</a><br />
                        <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)">
                            {%Odds_2_E}</a><br />
                    </div>
                </td>
                <td class="tabt_L none_rline">
                    <div class="line_divL HdpGoalClass">
                        {@Value_7_H}<br />
                        {@Value_7_A}</div>
                    <div class="line_divR OddsDiv {%Changed_7}">
                        <a class="{@Odds_7_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','h','{%Odds_7_H}',7)">
                            {%Odds_7_H}</a><br />
                        <a class="{@Odds_7_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','a','{%Odds_7_A}',7)">
                            {%Odds_7_A}</a><br />
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {%Goal_8}<br />
                        {@UNDER_8}</div>
                    <div class="line_divR OddsDiv {%Changed_8}">
                        <a class="{@Odds_8_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','h','{%Odds_8_O}',8)">
                            {%Odds_8_O}</a><br />
                        <a class="{@Odds_8_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','a','{%Odds_8_U}',8)">
                            {%Odds_8_U}</a><br />
                    </div>
                </td>
                <td>
                    <div class="line_divL HdpGoalClass">
                        <span title="<?=$lang_member[453];?>">{@ODD_12}</span><br />
                        <span title="<?=$lang_member[459];?>">{@EVEN_12}</span></div>
                    <div class="line_divR OddsDiv {%Changed_12}">
                        <a class="{@Odds_12_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_12}','h','{%Odds_12_O}',12)">
                            {%Odds_12_O}</a><br />
                        <a class="{@Odds_12_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_12}','a','{%Odds_12_E}',12)">
                            {%Odds_12_E}</a><br />
                    </div>
                </td>
                <td align="center">
                    {@StatsInfo}
                </td>
            </tr>
        </tbody>
        <tbody id="tmplLiveMaster">
            <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
                <td class="text_time {%Changed_Score}">
                    <b>{%ScoreH}-{%ScoreA}</b>
                    <div style="white-space: nowrap" class="{@LiveTimeCls}">
                        {%ShowTime}</div>
                </td>
                <td class="line_unR" style="width: 130px">
                    <div class="{@Home_Cls}">
                        {%HomeName}</div>
                    <div class="{@Away_Cls}">
                        {%AwayName}</div>
                </td>
                <td align="right" valign="middle" style="white-space: nowrap">
                    {@Streaming}{@SportRadarInfo}{@Favorites}
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {@Value_1_H}<br />
                        {@Value_1_A}</div>
                    <div class="line_divR OddsDiv {%Changed_1}">
                        <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)">
                            {%Odds_1_H}</a><br />
                        <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)">
                            {%Odds_1_A}</a><br />
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {%Goal_3}<br />
                        {@UNDER_3}</div>
                    <div class="line_divR OddsDiv {%Changed_3}">
                        <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)">
                            {%Odds_3_O}</a><br />
                        <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)">
                            {%Odds_3_U}</a><br />
                    </div>
                </td>
                <td>
                    <div class="line_divL HdpGoalClass">
                        <span title="<?=$lang_member[453];?>">{@ODD_2}</span><br />
                        <span title="<?=$lang_member[459];?>">{@EVEN_2}</span></div>
                    <div class="line_divR OddsDiv {%Changed_2}">
                        <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)">
                            {%Odds_2_O}</a><br />
                        <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)">
                            {%Odds_2_E}</a><br />
                    </div>
                </td>
                <td class="tabt_L none_rline">
                    <div class="line_divL HdpGoalClass">
                        {@Value_7_H}<br />
                        {@Value_7_A}</div>
                    <div class="line_divR OddsDiv {%Changed_7}">
                        <a class="{@Odds_7_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','h','{%Odds_7_H}',7)">
                            {%Odds_7_H}</a><br />
                        <a class="{@Odds_7_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','a','{%Odds_7_A}',7)">
                            {%Odds_7_A}</a><br />
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {%Goal_8}<br />
                        {@UNDER_8}</div>
                    <div class="line_divR OddsDiv {%Changed_8}">
                        <a class="{@Odds_8_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','h','{%Odds_8_O}',8)">
                            {%Odds_8_O}</a><br />
                        <a class="{@Odds_8_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','a','{%Odds_8_U}',8)">
                            {%Odds_8_U}</a><br />
                    </div>
                </td>
                <td>
                    <div class="line_divL HdpGoalClass">
                        <span title="<?=$lang_member[453];?>">{@ODD_12}</span><br />
                        <span title="<?=$lang_member[459];?>">{@EVEN_12}</span></div>
                    <div class="line_divR OddsDiv {%Changed_12}">
                        <a class="{@Odds_12_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_12}','h','{%Odds_12_O}',12)">
                            {%Odds_12_O}</a><br />
                        <a class="{@Odds_12_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_12}','a','{%Odds_12_E}',12)">
                            {%Odds_12_E}</a><br />
                    </div>
                </td>
                <td align="center">
                    {@StatsInfo}
                </td>
            </tr>
        </tbody>
        <tbody id="tmplLiveMaster_56">
            <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
                <td align="center" class="text_time" valign="middle">
                    <div style="white-space: nowrap" class="{@LiveTimeCls}">
                        {%ShowTime}</div>
                </td>
                <td class="line_unR" style="width: 130px">
                    <div class="{@Home_Cls}">{%HomeName}</div>
                    <div class="{@Away_Cls}">{%AwayName}</div>
                </td>
                <td align="right" valign="middle" style="white-space: nowrap">
                    {@Streaming}{@SportRadarInfo}{@Favorites}
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {@Value_1_H}<br />
                        {@Value_1_A}</div>
                    <div class="line_divR OddsDiv {%Changed_1}">
                        <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)">
                            {%Odds_1_H}</a><br />
                        <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)">
                            {%Odds_1_A}</a><br />
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {%Goal_3}<br />
                        {@UNDER_3}</div>
                    <div class="line_divR OddsDiv {%Changed_3}">
                        <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)">
                            {%Odds_3_O}</a><br />
                        <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)">
                            {%Odds_3_U}</a><br />
                    </div>
                </td>
                <td>
                    <div class="line_divL HdpGoalClass">
                        <span title="<?=$lang_member[453];?>">{@ODD_2}</span><br />
                        <span title="<?=$lang_member[459];?>">{@EVEN_2}</span></div>
                    <div class="line_divR OddsDiv {%Changed_2}">
                        <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)">
                            {%Odds_2_O}</a><br />
                        <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)">
                            {%Odds_2_E}</a><br />
                    </div>
                </td>
                <td class="tabt_L none_rline">
                    <div class="line_divL HdpGoalClass">
                        {@Value_7_H}<br />
                        {@Value_7_A}</div>
                    <div class="line_divR OddsDiv {%Changed_7}">
                        <a class="{@Odds_7_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','h','{%Odds_7_H}',7)">
                            {%Odds_7_H}</a><br />
                        <a class="{@Odds_7_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','a','{%Odds_7_A}',7)">
                            {%Odds_7_A}</a><br />
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {%Goal_8}<br />
                        {@UNDER_8}</div>
                    <div class="line_divR OddsDiv {%Changed_8}">
                        <a class="{@Odds_8_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','h','{%Odds_8_O}',8)">
                            {%Odds_8_O}</a><br />
                        <a class="{@Odds_8_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','a','{%Odds_8_U}',8)">
                            {%Odds_8_U}</a><br />
                    </div>
                </td>
                <td>
                    <div class="line_divL HdpGoalClass">
                        <span title="<?=$lang_member[453];?>">{@ODD_12}</span><br />
                        <span title="<?=$lang_member[459];?>">{@EVEN_12}</span></div>
                    <div class="line_divR OddsDiv {%Changed_12}">
                        <a class="{@Odds_12_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_12}','h','{%Odds_12_O}',12)">
                            {%Odds_12_O}</a><br />
                        <a class="{@Odds_12_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_12}','a','{%Odds_12_E}',12)">
                            {%Odds_12_E}</a><br />
                    </div>
                </td>
                <td align="center">
                    {@StatsInfo}
                </td>
            </tr>
        </tbody>
        <tbody id="tmplLiveMaster_2">
            <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
                <td align="center" class="text_time" valign="middle">
                    <span class="{@TimeSuspendCls} HalfTime">T.Out</span>
                    <div style="white-space: nowrap" class="{@LiveTimeCls}">
                        {%ShowTime}</div>
                </td>
                <td class="line_unR" style="width: 130px">
                    <div class="{@Home_Cls}">
                        <span class="D_liveinfoM_{%MatchId}_H" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%StatsId}', '{@HomeName}', '{@AwayName}',2)" onmouseover="javascript:CheckCursorStyle(1,'D_liveinfoM_{%MatchId}_H');" onmouseout="javascript:CheckCursorStyle(0,'D_liveinfoM_{%MatchId}_H');">{%HomeName}</span></div>
                    <div class="{@Away_Cls}">
                        <span class="L_liveinfoM_{%MatchId}_A" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%StatsId}', '{@HomeName}', '{@AwayName}',2)" onmouseover="javascript:CheckCursorStyle(1,'L_liveinfoM_{%MatchId}_A');" onmouseout="javascript:CheckCursorStyle(0,'L_liveinfoM_{%MatchId}_A');">{%AwayName}</span></div>
                </td>
                <td align="right" valign="middle" style="white-space: nowrap">
                    {@Streaming}{@SportRadarInfo}{@Favorites}
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {@Value_1_H}<br />
                        {@Value_1_A}</div>
                    <div class="line_divR OddsDiv {%Changed_1}">
                        <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)">
                            {%Odds_1_H}</a><br />
                        <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)">
                            {%Odds_1_A}</a><br />
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {%Goal_3}<br />
                        {@UNDER_3}</div>
                    <div class="line_divR OddsDiv {%Changed_3}">
                        <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)">
                            {%Odds_3_O}</a><br />
                        <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)">
                            {%Odds_3_U}</a><br />
                    </div>
                </td>
                <td>
                    <div class="line_divL HdpGoalClass">
                        <span title="<?=$lang_member[453];?>">{@ODD_2}</span><br />
                        <span title="<?=$lang_member[459];?>">{@EVEN_2}</span></div>
                    <div class="line_divR OddsDiv {%Changed_2}">
                        <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)">
                            {%Odds_2_O}</a><br />
                        <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)">
                            {%Odds_2_E}</a><br />
                    </div>
                </td>
                <td class="tabt_L none_rline">
                    <div class="line_divL HdpGoalClass">
                        {@Value_7_H}<br />
                        {@Value_7_A}</div>
                    <div class="line_divR OddsDiv {%Changed_7}">
                        <a class="{@Odds_7_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','h','{%Odds_7_H}',7)">
                            {%Odds_7_H}</a><br />
                        <a class="{@Odds_7_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','a','{%Odds_7_A}',7)">
                            {%Odds_7_A}</a><br />
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {%Goal_8}<br />
                        {@UNDER_8}</div>
                    <div class="line_divR OddsDiv {%Changed_8}">
                        <a class="{@Odds_8_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','h','{%Odds_8_O}',8)">
                            {%Odds_8_O}</a><br />
                        <a class="{@Odds_8_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','a','{%Odds_8_U}',8)">
                            {%Odds_8_U}</a><br />
                    </div>
                </td>
                <td>
                    <div class="line_divL HdpGoalClass">
                        <span title="<?=$lang_member[453];?>">{@ODD_12}</span><br />
                        <span title="<?=$lang_member[459];?>">{@EVEN_12}</span></div>
                    <div class="line_divR OddsDiv {%Changed_12}">
                        <a class="{@Odds_12_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_12}','h','{%Odds_12_O}',12)">
                            {%Odds_12_O}</a><br />
                        <a class="{@Odds_12_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_12}','a','{%Odds_12_E}',12)">
                            {%Odds_12_E}</a><br />
                    </div>
                </td>
                <td align="center">
                    {@StatsInfo}
                </td>
            </tr>
        </tbody>
        <tbody id="tmplLiveFooter_56">
            <tr class="{@Tr_Cls} mover{@MatchId}" onmouseover="mover('{@MatchId}','{@Tr_Cls}','trbgov');" onmouseout="mover('{@MatchId}','trbgov','{@Tr_Cls}');">
                <td rowspan="2" align="center" class="text_time" valign="middle">
                    <div style="white-space: nowrap" class="{@LiveTimeCls}">
                        {%ShowTime}</div>
                </td>
                <td class="line_unR" style="width: 130px">
                    <div class="{@Home_Cls}">{%HomeName}</div>
                    <div class="{@Away_Cls}">{%AwayName}</div>
                </td>
                <td align="right" valign="middle" style="white-space: nowrap">
                    {@Streaming}{@SportRadarInfo}{@Favorites}
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {@Value_1_H}<br />
                        {@Value_1_A}</div>
                    <div class="line_divR OddsDiv {%Changed_1}">
                        <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)">
                            {%Odds_1_H}</a><br />
                        <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)">
                            {%Odds_1_A}</a><br />
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {%Goal_3}<br />
                        {@UNDER_3}</div>
                    <div class="line_divR OddsDiv {%Changed_3}">
                        <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)">
                            {%Odds_3_O}</a><br />
                        <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)">
                            {%Odds_3_U}</a><br />
                    </div>
                </td>
                <td>
                    <div class="line_divL HdpGoalClass">
                        <span title="<?=$lang_member[453];?>">{@ODD_2}</span><br />
                        <span title="<?=$lang_member[459];?>">{@EVEN_2}</span></div>
                    <div class="line_divR OddsDiv {%Changed_2}">
                        <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)">
                            {%Odds_2_O}</a><br />
                        <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)">
                            {%Odds_2_E}</a><br />
                    </div>
                </td>
                <td class="tabt_L none_rline">
                    <div class="line_divL HdpGoalClass">
                        {@Value_7_H}<br />
                        {@Value_7_A}</div>
                    <div class="line_divR OddsDiv {%Changed_7}">
                        <a class="{@Odds_7_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','h','{%Odds_7_H}',7)">
                            {%Odds_7_H}</a><br />
                        <a class="{@Odds_7_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','a','{%Odds_7_A}',7)">
                            {%Odds_7_A}</a><br />
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {%Goal_8}<br />
                        {@UNDER_8}</div>
                    <div class="line_divR OddsDiv {%Changed_8}">
                        <a class="{@Odds_8_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','h','{%Odds_8_O}',8)">
                            {%Odds_8_O}</a><br />
                        <a class="{@Odds_8_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','a','{%Odds_8_U}',8)">
                            {%Odds_8_U}</a><br />
                    </div>
                </td>
                <td>
                    <div class="line_divL HdpGoalClass">
                        <span title="<?=$lang_member[453];?>">{@ODD_12}</span><br />
                        <span title="<?=$lang_member[459];?>">{@EVEN_12}</span></div>
                    <div class="line_divR OddsDiv {%Changed_12}">
                        <a class="{@Odds_12_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_12}','h','{%Odds_12_O}',12)">
                            {%Odds_12_O}</a><br />
                        <a class="{@Odds_12_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_12}','a','{%Odds_12_E}',12)">
                            {%Odds_12_E}</a><br />
                    </div>
                </td>
                <td rowspan="2" align="center">
                    <div title="More Bet Types">
                        <!-- <a href="#" onclick="GetMore(2,'{%MatchId}','{@HomeName}','{@AwayName}',parseInt('{@isParlay}'),'L','{%MUID}','GetBasketballMore',this);return false;" class="en_Point {@More_Style}"><span id="MoreCount">{@More}</span></a> -->
                    </div>
                    {@StatsInfo}
                </td>
            </tr>
            <tr class="{@Tr_Cls} mover{@MatchId}" onmouseover="mover('{@MatchId}','{@Tr_Cls}','trbgov');" onmouseout="mover('{@MatchId}','trbgov','{@Tr_Cls}');">
                <td class="none_lline moreBetType INoddsTable {@Display_Extend}" colspan="8">
                    <div class="MoreTable">
                        <table class="oddsTable {@Display_ExtendML}" cellpadding="0" cellspacing="0" width="100%" class="{@Tr_Cls} mover{@MatchId}" onmouseover="mover('{@MatchId}','{@Tr_Cls}','trbgov');" onmouseout="mover('{@MatchId}','trbgov','{@Tr_Cls}');">
                            <tbody>
                                <tr class="tabtitle">
                                    <td colspan="2">
                                        <?=$lang_member[908];?>
                                    </td>
                                    <td colspan="2">
                                        1H Moneyline
                                    </td>
                                </tr>
                                <tr>
                                    <th width="25%">
                                        <span class="text-ellipsis" title="Home">Home</span>
                                    </th>
                                    <th width="25%">
                                        <span class="text-ellipsis" title="Away">Away</span>
                                    </th>
                                    <th class="even" width="25%">
                                        <span class="text-ellipsis" title="Home">Home</span>
                                    </th>
                                    <th class="even" width="25%">
                                        <span class="text-ellipsis" title="Away">Away</span>
                                    </th>
                                </tr>
                                <tr class="{@Tr_Cls} mover{@MatchId}" onmouseover="mover('{@MatchId}','{@Tr_Cls}','trbgov');" onmouseout="mover('{@MatchId}','trbgov','{@Tr_Cls}');" align="center">
									<td class="none_rline {@Changed_20}">
										<a class="{@Odds_20_H_Cls}" href="javascript:bet('{@isParlay}','{%MatchId}','{@OddsId_20}','H','{@Odds_20_H}',20)">{@Odds_20_H}</a>
									</td>
									<td class="{@Changed_20}">
										<a class="{@Odds_20_A_Cls}" href="javascript:bet('{@isParlay}','{%MatchId}','{@OddsId_20}','A','{@Odds_20_A}',20)">{@Odds_20_A}</a>
									</td>
									<td class="none_rline {@Changed_21}">
										<a class="{@Odds_21_H_Cls}" href="javascript:bet('{@isParlay}','{%MatchId}','{@OddsId_21}','H','{@Odds_21_H}',20)">{@Odds_21_H}</a>
									</td>
									<td class="{@Changed_21}">
										<a class="{@Odds_21_A_Cls}" href="javascript:bet('{@isParlay}','{%MatchId}','{@OddsId_21}','A','{@Odds_21_A}',20)">{@Odds_21_A}</a>
									</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>					
                </td>
            </tr>
        </tbody>
        <tbody id="tmplLiveFooter_2">
            <tr class="{@Tr_Cls} mover{@MatchId}" onmouseover="mover('{@MatchId}','{@Tr_Cls}','trbgov');" onmouseout="mover('{@MatchId}','trbgov','{@Tr_Cls}');">
                <td rowspan="2" align="center" class="text_time" valign="middle">
                    <span class="{@TimeSuspendCls} HalfTime">T.Out</span>
                    <div style="white-space: nowrap" class="{@LiveTimeCls}">
                        {%ShowTime}</div>
                </td>
                <td class="line_unR" style="width: 130px">
                    <div class="{@Home_Cls}">
                        <span class="D_liveinfoM_{%MatchId}_H" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%StatsId}', '{@HomeName}', '{@AwayName}',2)" onmouseover="javascript:CheckCursorStyle(1,'D_liveinfoM_{%MatchId}_H');" onmouseout="javascript:CheckCursorStyle(0,'D_liveinfoM_{%MatchId}_H');">{%HomeName}</span></div>
                    <div class="{@Away_Cls}">
                        <span class="L_liveinfoM_{%MatchId}_A" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%StatsId}', '{@HomeName}', '{@AwayName}',2)" onmouseover="javascript:CheckCursorStyle(1,'L_liveinfoM_{%MatchId}_A');" onmouseout="javascript:CheckCursorStyle(0,'L_liveinfoM_{%MatchId}_A');">{%AwayName}</span></div>
                </td>
                <td align="right" valign="middle" style="white-space: nowrap">
                    {@Streaming}{@SportRadarInfo}<span style="display: inline-block;" class="{@LS_Status}"><span
                        class="iconOdds info {@LS_Status_IMG}" title="<?=$lang_member[907];?>" onclick="javascript:View_LS(this,'{%MUID}','{%GS}')"></span></span>{@Favorites}
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {@Value_1_H}<br />
                        {@Value_1_A}</div>
                    <div class="line_divR OddsDiv {%Changed_1}">
                        <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)">
                            {%Odds_1_H}</a><br />
                        <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)">
                            {%Odds_1_A}</a><br />
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {%Goal_3}<br />
                        {@UNDER_3}</div>
                    <div class="line_divR OddsDiv {%Changed_3}">
                        <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)">
                            {%Odds_3_O}</a><br />
                        <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)">
                            {%Odds_3_U}</a><br />
                    </div>
                </td>
                <td>
                    <div class="line_divL HdpGoalClass">
                        <span title="<?=$lang_member[453];?>">{@ODD_2}</span><br />
                        <span title="<?=$lang_member[459];?>">{@EVEN_2}</span></div>
                    <div class="line_divR OddsDiv {%Changed_2}">
                        <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)">
                            {%Odds_2_O}</a><br />
                        <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)">
                            {%Odds_2_E}</a><br />
                    </div>
                </td>
                <td class="tabt_L none_rline">
                    <div class="line_divL HdpGoalClass">
                        {@Value_7_H}<br />
                        {@Value_7_A}</div>
                    <div class="line_divR OddsDiv {%Changed_7}">
                        <a class="{@Odds_7_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','h','{%Odds_7_H}',7)">
                            {%Odds_7_H}</a><br />
                        <a class="{@Odds_7_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','a','{%Odds_7_A}',7)">
                            {%Odds_7_A}</a><br />
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {%Goal_8}<br />
                        {@UNDER_8}</div>
                    <div class="line_divR OddsDiv {%Changed_8}">
                        <a class="{@Odds_8_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','h','{%Odds_8_O}',8)">
                            {%Odds_8_O}</a><br />
                        <a class="{@Odds_8_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','a','{%Odds_8_U}',8)">
                            {%Odds_8_U}</a><br />
                    </div>
                </td>
                <td>
                    <div class="line_divL HdpGoalClass">
                        <span title="<?=$lang_member[453];?>">{@ODD_12}</span><br />
                        <span title="<?=$lang_member[459];?>">{@EVEN_12}</span></div>
                    <div class="line_divR OddsDiv {%Changed_12}">
                        <a class="{@Odds_12_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_12}','h','{%Odds_12_O}',12)">
                            {%Odds_12_O}</a><br />
                        <a class="{@Odds_12_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_12}','a','{%Odds_12_E}',12)">
                            {%Odds_12_E}</a><br />
                    </div>
                </td>
                <td rowspan="2" align="center">
                    <div title="More Bet Types">
                        <!-- <a href="#" onclick="GetMore(2,'{%MatchId}','{@HomeName}','{@AwayName}',parseInt('{@isParlay}'),'L','{%MUID}','GetBasketballMore',this);return false;" class="en_Point {@More_Style}"><span id="MoreCount">{@More}</span></a> -->
                    </div>
                    {@StatsInfo}
                </td>
            </tr>
            <tr class="{@Tr_Cls} mover{@MatchId}" onmouseover="mover('{@MatchId}','{@Tr_Cls}','trbgov');" onmouseout="mover('{@MatchId}','trbgov','{@Tr_Cls}');">
                <td class="none_lline moreBetType INoddsTable {@Display_Extend}" colspan="8">
                    <div class="MoreTable">
                        <table class="oddsTable {@Display_ExtendML}" cellpadding="0" cellspacing="0" width="100%" class="{@Tr_Cls} mover{@MatchId}" onmouseover="mover('{@MatchId}','{@Tr_Cls}','trbgov');" onmouseout="mover('{@MatchId}','trbgov','{@Tr_Cls}');">
                            <tbody>
                                <tr class="tabtitle">
                                    <td colspan="2">
                                        <?=$lang_member[908];?>
                                    </td>
                                    <td colspan="2">
                                        1H Moneyline
                                    </td>
                                </tr>
                                <tr>
                                    <th width="25%">
                                        <span class="text-ellipsis" title="Home">Home</span>
                                    </th>
                                    <th width="25%">
                                        <span class="text-ellipsis" title="Away">Away</span>
                                    </th>
                                    <th class="even" width="25%">
                                        <span class="text-ellipsis" title="Home">Home</span>
                                    </th>
                                    <th class="even" width="25%">
                                        <span class="text-ellipsis" title="Away">Away</span>
                                    </th>
                                </tr>
                                <tr class="{@Tr_Cls} mover{@MatchId}" onmouseover="mover('{@MatchId}','{@Tr_Cls}','trbgov');" onmouseout="mover('{@MatchId}','trbgov','{@Tr_Cls}');" align="center">
									<td class="none_rline {@Changed_20}">
										<a class="{@Odds_20_H_Cls}" href="javascript:bet('{@isParlay}','{%MatchId}','{@OddsId_20}','H','{@Odds_20_H}',20)">{@Odds_20_H}</a>
									</td>
									<td class="{@Changed_20}">
										<a class="{@Odds_20_A_Cls}" href="javascript:bet('{@isParlay}','{%MatchId}','{@OddsId_20}','A','{@Odds_20_A}',20)">{@Odds_20_A}</a>
									</td>
									<td class="none_rline {@Changed_21}">
										<a class="{@Odds_21_H_Cls}" href="javascript:bet('{@isParlay}','{%MatchId}','{@OddsId_21}','H','{@Odds_21_H}',20)">{@Odds_21_H}</a>
									</td>
									<td class="{@Changed_21}">
										<a class="{@Odds_21_A_Cls}" href="javascript:bet('{@isParlay}','{%MatchId}','{@OddsId_21}','A','{@Odds_21_A}',20)">{@Odds_21_A}</a>
									</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>					
                    <!--BasketballExtendBettype-->
                </td>
            </tr>
			<tr id="LS_{%MUID}_4" class="{@LS_display_4}">
				<td style="border-right-style:none" class="score_box">&nbsp;</td>
				<td colspan="9" class="score_box">
					<div class="line_divL" style="width: 150px;">
						<div class="UdrDogTeamClass text-ellipsis" title=" {@HomeName_t}">{%HomeName}</div>
						<div class="UdrDogTeamClass text-ellipsis" title=" {@AwayName_t}">{%AwayName}</div>
					</div>
					<div class="line_divR">
						<table width="100%" border="0" cellspacing="0" cellpadding="0" class="score_box">
							<tbody>
								<tr>
									<td width="83">
										<div class="{@LS_1Q}">
											<div class="{@ScoreChange_1Q} border line_divR">
												<div class="line_b">{@H1Q}</div>
												<div>{@A1Q}</div>
											</div>
											<div class="line_divR">
												<div class="text-ellipsis max_width" title="<?=$lang_member[910];?>"><?=$lang_member[910];?></div>
											</div>
										</div>
									</td>
									<td width="83">
										<div class="{@LS_2Q}">
											<div class="{@ScoreChange_2Q} border line_divR">
												<div class="line_b">{@H2Q}</div>
												<div>{@A2Q}</div>
											</div>
											<div class="line_divR">
												<div class="text-ellipsis max_width" title="<?=$lang_member[911];?>"><?=$lang_member[911];?></div>
											</div>
										</div>
									</td>
									<td width="83">
										<div class="{@LS_3Q}">
											<div class="{@ScoreChange_3Q} border line_divR">
												<div class="line_b">{@H3Q}</div>
												<div>{@A3Q}</div>
											</div>
											<div class="line_divR">
												<div class="text-ellipsis max_width" title="<?=$lang_member[912];?>"><?=$lang_member[912];?></div>
											</div>
										</div>
									</td>
									<td width="83">
										<div class="{@LS_4Q}">
											<div class="{@ScoreChange_4Q} border line_divR">
												<div class="line_b">{@H4Q}</div>
												<div>{@A4Q}</div>
											</div>
											<div class="line_divR">
												<div class="text-ellipsis max_width" title="<?=$lang_member[913];?>"><?=$lang_member[913];?></div>
											</div>
										</div>
									</td>
									<td width="83">
										<div class="{@LS_OT}">
											<div class="{@ScoreChange_OT} border line_divR">
												<div class="line_b">{@HOT}</div>
												<div>{@AOT}</div>
											</div>
											<div class="line_divR">
												<div class="text-ellipsis max_width" title="Overtime"><?=$lang_member[909];?></div>
											</div>
										</div>
									</td>
									<td width="100">
										<div class="box02">
											<div class="border line_r line_divR">
												<div class="line_b">{@H_TG}</div>
												<div>{@A_TG}</div>
											</div>
											<div class="line_divR">
												<div class="text-ellipsis max_width" title="Total Goal">TG</div>
											</div>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</td>
			</tr>
            <tr id="LS_{%MUID}_2" class="{@LS_display_2}">
				<td style="border-right-style:none" class="score_box">&nbsp;</td>
				<td colspan="9" valign="bottom" class="score_box">
					<div class="line_divL" style="width: 150px;">
						<div class="UdrDogTeamClass text-ellipsis" title=" {@HomeName_t}">{%HomeName}</div>
						<div class="UdrDogTeamClass text-ellipsis" title=" {@AwayName_t}">{%AwayName}</div>
					</div>
					<div class="line_divR">
						<table border="0" align="right" cellpadding="0" cellspacing="0" class="score_box" width="100%">
							<tbody>
								<tr>
									<td width="83">
										<div class="{@LS_1Q}">
											<div class="{@ScoreChange_1Q} border line_divR">
												<div class="line_b">{@H1Q}</div>
												<div>{@A1Q}</div>
											</div>
											<div class="line_divR">
												<div class="text-ellipsis max_width" title="<?=$lang_member[803];?>​">1H</div>
											</div>
										</div>
									</td>
									<td width="83">
										<div class="{@LS_2Q}">
											<div class="{@ScoreChange_2Q} border line_divR">
												<div class="line_b">{@H2Q}</div>
												<div>{@A2Q}</div>
											</div>
											<div class="line_divR">
												<div class="text-ellipsis max_width" title="<?=$lang_member[914];?>">2H</div>
											</div>
										</div>
									</td>
									<td width="83">
										<div class="{@LS_OT}">
											<div class="{@ScoreChange_OT} border line_divR">
												<div class="line_b">{@HOT}</div>
												<div>{@AOT}</div>
											</div>
											<div class="line_divR">
												<div class="text-ellipsis max_width" title="Overtime"><?=$lang_member[909];?></div>
											</div>
										</div>
									</td>
									<td width="100">
										<div class="box02">
											<div class="border line_r line_divR">
												<div class="line_b">{@H_TG}</div>
												<div>{@A_TG}</div>
											</div>
											<div class="line_divR">
												<div class="text-ellipsis max_width" title="Total Goal">TG</div>
											</div>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</td>
			</tr>
            <tr><td class="moreBetType tag {@Display_More}" colspan="10">{@MoreData}</td></tr>
        </tbody>
        <tbody id="tmplLiveFooter_3">
            <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
                <td class="text_time {%Changed_Score}">
                    <span class="{@TimeSuspendCls} HalfTime">T.Out</span>
                    <div class="{@TimeSuspendCls1}">
                        <b>{%ScoreH}-{%ScoreA}</b></div>
                    <div style="white-space: nowrap" class="{@LiveTimeCls}">
                        {%ShowTime}</div>
                </td>
                <td class="line_unR" style="width: 130px">
                    <div class="{@Home_Cls}">
                        {%HomeName}</div>
                    <div class="{@Away_Cls}">
                        {%AwayName}</div>
                </td>
                <td align="right" valign="middle" style="white-space: nowrap">
                    {@Streaming}{@SportRadarInfo}<span style="display: inline-block;" class="{@LS_Status}"><span
                        class="iconOdds info {@LS_Status_IMG}" title="<?=$lang_member[907];?>" onclick="javascript:View_LS(this,'{%MUID}','{%GS}')"></span></span>{@Favorites}
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {@Value_1_H}<br />
                        {@Value_1_A}</div>
                    <div class="line_divR OddsDiv {%Changed_1}">
                        <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)">
                            {%Odds_1_H}</a><br />
                        <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)">
                            {%Odds_1_A}</a><br />
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {%Goal_3}<br />
                        {@UNDER_3}</div>
                    <div class="line_divR OddsDiv {%Changed_3}">
                        <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)">
                            {%Odds_3_O}</a><br />
                        <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)">
                            {%Odds_3_U}</a><br />
                    </div>
                </td>
                <td>
                    <div class="line_divL HdpGoalClass">
                        {@ODD_2}<br />
                        {@EVEN_2}</div>
                    <div class="line_divR OddsDiv {%Changed_2}">
                        <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)">
                            {%Odds_2_O}</a><br />
                        <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)">
                            {%Odds_2_E}</a><br />
                    </div>
                </td>
                <td class="tabt_L none_rline">
                    <div class="line_divL HdpGoalClass">
                        {@Value_7_H}<br />
                        {@Value_7_A}</div>
                    <div class="line_divR OddsDiv {%Changed_7}">
                        <a class="{@Odds_7_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','h','{%Odds_7_H}',7)">
                            {%Odds_7_H}</a><br />
                        <a class="{@Odds_7_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','a','{%Odds_7_A}',7)">
                            {%Odds_7_A}</a><br />
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {%Goal_8}<br />
                        {@UNDER_8}</div>
                    <div class="line_divR OddsDiv {%Changed_8}">
                        <a class="{@Odds_8_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','h','{%Odds_8_O}',8)">
                            {%Odds_8_O}</a><br />
                        <a class="{@Odds_8_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','a','{%Odds_8_U}',8)">
                            {%Odds_8_U}</a><br />
                    </div>
                </td>
                <td>
                    <div class="line_divL HdpGoalClass">
                        {@ODD_12}<br />
                        {@EVEN_12}</div>
                    <div class="line_divR OddsDiv {%Changed_12}">
                        <a class="{@Odds_12_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_12}','h','{%Odds_12_O}',12)">
                            {%Odds_12_O}</a><br />
                        <a class="{@Odds_12_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_12}','a','{%Odds_12_E}',12)">
                            {%Odds_12_E}</a><br />
                    </div>
                </td>
                <td align="center">
                    {@StatsInfo}
                </td>
            </tr>
            <tr id="LS_{%MUID}_4" class="{@LS_display_4}">
                <td class="score_box line_unR">
                    <table border="0" align="right" cellpadding="0" cellspacing="0">
                        <tr>
                            <td style="width: 15px; height: 15px">
                                <!--<img border='0' class="{@BALLON1}" title="Ball On" src="http://i.mbxcdn.com/template/sportsbook/public/images/layout/iconfootball.gif" />-->
                                <span class="iconInfo football {@BALLON1}"></span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 15px; height: 15px">
                                <!--<img border='0' class="{@BALLON2}" title="Ball On" src="http://i.mbxcdn.com/template/sportsbook/public/images/layout/iconfootball.gif" />-->
                                <span class="iconInfo football {@BALLON2}"></span>
                            </td>
                        </tr>
                    </table>
                </td>
                <td colspan="9" class="score_box">
                    <div class="line_divL" style="width: 65px;">
                        <div class="{@Home_Cls} text-ellipsis" title=" {@HomeName_t}">
                            {%HomeName}</div>
                        <div class="{@Away_Cls} text-ellipsis" title=" {@AwayName_t}">
                            {%AwayName}</div>
                    </div>
                    <div class="line_divR">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td>
                                    <div class="NFL_LS1">
                                        <div class="line_b box01">
                                            <span title="Down">Down</span></div>
                                        <div class="{@Changed_DOWN}" style="color: #B00000">
                                            &nbsp;{@down}</div>
                                    </div>
                                </td>
                                <td>
                                    <div class="NFL_LS1">
                                        <div class="line_b box01">
                                            <span title="To Go">To Go</span></div>
                                        <div class="{@Changed_TOGO}">
                                            &nbsp;<span class="{@ShowToGo}" style="color: #B00000">{@togo}Y</span></div>
                                    </div>
                                </td>
                                <td width="83">
                                    <div class="{@LS_1Q}">
                                        <div class="{@ScoreChange_1Q} border line_divR">
                                            <div class="line_b">
                                                {@H1Q}</div>
                                            <div>
                                                {@A1Q}</div>
                                        </div>
                                        <div class="line_divR">
                                            <div class="text-ellipsis max_width" title="<?=$lang_member[910];?>">
                                                <?=$lang_member[910];?></div>
                                        </div>
                                    </div>
                                </td>
                                <td width="83">
                                    <div class="{@LS_2Q}">
                                        <div class="{@ScoreChange_2Q} border line_divR">
                                            <div class="line_b">
                                                {@H2Q}</div>
                                            <div>
                                                {@A2Q}</div>
                                        </div>
                                        <div class="line_divR">
                                            <div class="text-ellipsis max_width" title="<?=$lang_member[911];?>">
                                                <?=$lang_member[911];?></div>
                                        </div>
                                    </div>
                                </td>
                                <td width="83">
                                    <div class="{@LS_3Q}">
                                        <div class="{@ScoreChange_3Q} border line_divR">
                                            <div class="line_b">
                                                {@H3Q}</div>
                                            <div>
                                                {@A3Q}</div>
                                        </div>
                                        <div class="line_divR">
                                            <div class="text-ellipsis max_width" title="<?=$lang_member[912];?>">
                                                <?=$lang_member[912];?></div>
                                        </div>
                                    </div>
                                </td>
                                <td width="83">
                                    <div class="{@LS_4Q}">
                                        <div class="{@ScoreChange_4Q} border line_divR">
                                            <div class="line_b">
                                                {@H4Q}</div>
                                            <div>
                                                {@A4Q}</div>
                                        </div>
                                        <div class="line_divR">
                                            <div class="text-ellipsis max_width" title="<?=$lang_member[913];?>">
                                                <?=$lang_member[913];?></div>
                                        </div>
                                    </div>
                                </td>
                                <td width="83">
                                    <div class="{@LS_OT}">
                                        <div class="{@ScoreChange_OT} border line_divR">
                                            <div class="line_b">
                                                {@HOT}</div>
                                            <div>
                                                {@AOT}</div>
                                        </div>
                                        <div class="line_divR">
                                            <div class="text-ellipsis max_width" title="Overtime">
                                                <?=$lang_member[909];?></div>
                                        </div>
                                    </div>
                                </td>
                                <td width="100">
                                    <div class="box02">
                                        <div class="{%Changed_Score} border line_r line_divR">
                                            <div class="line_b">
                                                {@H_TG}</div>
                                            <div>
                                                {@A_TG}</div>
                                        </div>
                                        <div class="line_divR">
                                            <div class="text-ellipsis max_width" title="Total Points">
                                                T.Points</div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </tbody>
        <tbody id="tmplLeague">
            <tr id="l_{%LeagueId}" onclick="refreshData_D()" style="cursor: pointer">
                <td class="tabtitle">
                </td>
                <td colspan="7" class="tabtitle">
                    {@FavLeagues}{%LeagueName}
                </td>
                <td colspan="2" class="tabtitle" align="right" nowrap>
                    <a name="btnRefresh_D" class="btnIcon right disable">
                        <div class="icon-refresh" title="<?=$lang_member[770];?>">
                        </div>
                    </a>
                </td>
            </tr>
        </tbody>
        <tbody id="tmplEvent">
            <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
                <td class="text_time">
                    {%ShowTime}
                </td>
                <td class="line_unR" style="width: 130px">
                    <div class="{@Home_Cls}">
                        {%HomeName}</div>
                    <div class="{@Away_Cls}">
                        {%AwayName}</div>
                </td>
                <td align="right" valign="middle" style="white-space: nowrap">
                    {@Streaming}{@SportRadarInfo}{@Favorites}
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {@Value_1_H}<br />
                        {@Value_1_A}</div>
                    <div class="line_divR OddsDiv {%Changed_1}">
                        <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)">
                            {%Odds_1_H}</a><br />
                        <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)">
                            {%Odds_1_A}</a><br />
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {%Goal_3}<br />
                        {@UNDER_3}</div>
                    <div class="line_divR OddsDiv {%Changed_3}">
                        <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)">
                            {%Odds_3_O}</a><br />
                        <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)">
                            {%Odds_3_U}</a><br />
                    </div>
                </td>
                <td>
                    <div class="line_divL HdpGoalClass">
                        <span title="<?=$lang_member[453];?>">{@ODD_2}</span><br />
                        <span title="<?=$lang_member[459];?>">{@EVEN_2}</span></div>
                    <div class="line_divR OddsDiv {%Changed_2}">
                        <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)">
                            {%Odds_2_O}</a><br />
                        <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)">
                            {%Odds_2_E}</a><br />
                    </div>
                </td>
                <td class="tabt_L none_rline">
                    <div class="line_divL HdpGoalClass">
                        {@Value_7_H}<br />
                        {@Value_7_A}</div>
                    <div class="line_divR OddsDiv {%Changed_7}">
                        <a class="{@Odds_7_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','h','{%Odds_7_H}',7)">
                            {%Odds_7_H}</a><br />
                        <a class="{@Odds_7_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','a','{%Odds_7_A}',7)">
                            {%Odds_7_A}</a><br />
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {%Goal_8}<br />
                        {@UNDER_8}</div>
                    <div class="line_divR OddsDiv {%Changed_8}">
                        <a class="{@Odds_8_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','h','{%Odds_8_O}',8)">
                            {%Odds_8_O}</a><br />
                        <a class="{@Odds_8_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','a','{%Odds_8_U}',8)">
                            {%Odds_8_U}</a><br />
                    </div>
                </td>
                <td>
                    <div class="line_divL HdpGoalClass">
                        <span title="<?=$lang_member[453];?>">{@ODD_12}</span><br />
                        <span title="<?=$lang_member[459];?>">{@EVEN_12}</span></div>
                    <div class="line_divR OddsDiv {%Changed_12}">
                        <a class="{@Odds_12_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_12}','h','{%Odds_12_O}',12)">
                            {%Odds_12_O}</a><br />
                        <a class="{@Odds_12_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_12}','a','{%Odds_12_E}',12)">
                            {%Odds_12_E}</a><br />
                    </div>
                </td>
                <td align="center">
                    {@StatsInfo}
                </td>
            </tr>
        </tbody>
		<tbody id="tmplEvent_56">
            <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
                <td class="text_time">
                    {%ShowTime}
                </td>
                <td class="line_unR" style="width: 130px">
                    <div class="{@Home_Cls}">{%HomeName}</div>
                    <div class="{@Away_Cls}">{%AwayName}</div>
                </td>
                <td align="right" valign="middle" style="white-space: nowrap">
                    {@Streaming}{@SportRadarInfo}{@Favorites}
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {@Value_1_H}<br />
                        {@Value_1_A}</div>
                    <div class="line_divR OddsDiv {%Changed_1}">
                        <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)">
                            {%Odds_1_H}</a><br />
                        <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)">
                            {%Odds_1_A}</a><br />
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {%Goal_3}<br />
                        {@UNDER_3}</div>
                    <div class="line_divR OddsDiv {%Changed_3}">
                        <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)">
                            {%Odds_3_O}</a><br />
                        <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)">
                            {%Odds_3_U}</a><br />
                    </div>
                </td>
                <td>
                    <div class="line_divL HdpGoalClass">
                        <span title="<?=$lang_member[453];?>">{@ODD_2}</span><br />
                        <span title="<?=$lang_member[459];?>">{@EVEN_2}</span></div>
                    <div class="line_divR OddsDiv {%Changed_2}">
                        <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)">
                            {%Odds_2_O}</a><br />
                        <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)">
                            {%Odds_2_E}</a><br />
                    </div>
                </td>
                <td class="tabt_L none_rline">
                    <div class="line_divL HdpGoalClass">
                        {@Value_7_H}<br />
                        {@Value_7_A}</div>
                    <div class="line_divR OddsDiv {%Changed_7}">
                        <a class="{@Odds_7_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','h','{%Odds_7_H}',7)">
                            {%Odds_7_H}</a><br />
                        <a class="{@Odds_7_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','a','{%Odds_7_A}',7)">
                            {%Odds_7_A}</a><br />
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {%Goal_8}<br />
                        {@UNDER_8}</div>
                    <div class="line_divR OddsDiv {%Changed_8}">
                        <a class="{@Odds_8_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','h','{%Odds_8_O}',8)">
                            {%Odds_8_O}</a><br />
                        <a class="{@Odds_8_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','a','{%Odds_8_U}',8)">
                            {%Odds_8_U}</a><br />
                    </div>
                </td>
                <td>
                    <div class="line_divL HdpGoalClass">
                        <span title="<?=$lang_member[453];?>">{@ODD_12}</span><br />
                        <span title="<?=$lang_member[459];?>">{@EVEN_12}</span></div>
                    <div class="line_divR OddsDiv {%Changed_12}">
                        <a class="{@Odds_12_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_12}','h','{%Odds_12_O}',12)">
                            {%Odds_12_O}</a><br />
                        <a class="{@Odds_12_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_12}','a','{%Odds_12_E}',12)">
                            {%Odds_12_E}</a><br />
                    </div>
                </td>
                <td align="center">
                    {@StatsInfo}
                </td>
            </tr>
        </tbody>
		<tbody id="tmplEvent_2">
            <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
                <td class="text_time">
                    {%ShowTime}
                </td>
                <td class="line_unR" style="width: 130px">
                    <div class="{@Home_Cls}">
                        <span class="D_liveinfoM_{%MatchId}_H" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%StatsId}', '{@HomeName}', '{@AwayName}',2)" onmouseover="javascript:CheckCursorStyle(1,'D_liveinfoM_{%MatchId}_H');" onmouseout="javascript:CheckCursorStyle(0,'D_liveinfoM_{%MatchId}_H');">{%HomeName}</span></div>
                    <div class="{@Away_Cls}">
                        <span class="L_liveinfoM_{%MatchId}_A" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%StatsId}', '{@HomeName}', '{@AwayName}',2)" onmouseover="javascript:CheckCursorStyle(1,'L_liveinfoM_{%MatchId}_A');" onmouseout="javascript:CheckCursorStyle(0,'L_liveinfoM_{%MatchId}_A');">{%AwayName}</span></div>
                </td>
                <td align="right" valign="middle" style="white-space: nowrap">
                    {@Streaming}{@SportRadarInfo}{@Favorites}
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {@Value_1_H}<br />
                        {@Value_1_A}</div>
                    <div class="line_divR OddsDiv {%Changed_1}">
                        <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)">
                            {%Odds_1_H}</a><br />
                        <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)">
                            {%Odds_1_A}</a><br />
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {%Goal_3}<br />
                        {@UNDER_3}</div>
                    <div class="line_divR OddsDiv {%Changed_3}">
                        <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)">
                            {%Odds_3_O}</a><br />
                        <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)">
                            {%Odds_3_U}</a><br />
                    </div>
                </td>
                <td>
                    <div class="line_divL HdpGoalClass">
                        <span title="<?=$lang_member[453];?>">{@ODD_2}</span><br />
                        <span title="<?=$lang_member[459];?>">{@EVEN_2}</span></div>
                    <div class="line_divR OddsDiv {%Changed_2}">
                        <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)">
                            {%Odds_2_O}</a><br />
                        <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)">
                            {%Odds_2_E}</a><br />
                    </div>
                </td>
                <td class="tabt_L none_rline">
                    <div class="line_divL HdpGoalClass">
                        {@Value_7_H}<br />
                        {@Value_7_A}</div>
                    <div class="line_divR OddsDiv {%Changed_7}">
                        <a class="{@Odds_7_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','h','{%Odds_7_H}',7)">
                            {%Odds_7_H}</a><br />
                        <a class="{@Odds_7_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','a','{%Odds_7_A}',7)">
                            {%Odds_7_A}</a><br />
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {%Goal_8}<br />
                        {@UNDER_8}</div>
                    <div class="line_divR OddsDiv {%Changed_8}">
                        <a class="{@Odds_8_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','h','{%Odds_8_O}',8)">
                            {%Odds_8_O}</a><br />
                        <a class="{@Odds_8_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','a','{%Odds_8_U}',8)">
                            {%Odds_8_U}</a><br />
                    </div>
                </td>
                <td>
                    <div class="line_divL HdpGoalClass">
                        <span title="<?=$lang_member[453];?>">{@ODD_12}</span><br />
                        <span title="<?=$lang_member[459];?>">{@EVEN_12}</span></div>
                    <div class="line_divR OddsDiv {%Changed_12}">
                        <a class="{@Odds_12_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_12}','h','{%Odds_12_O}',12)">
                            {%Odds_12_O}</a><br />
                        <a class="{@Odds_12_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_12}','a','{%Odds_12_E}',12)">
                            {%Odds_12_E}</a><br />
                    </div>
                </td>
                <td align="center">
                    {@StatsInfo}
                </td>
            </tr>
        </tbody>
		<tbody id="tmplEventFooter_56">
            <tr class="{@Tr_Cls} mover{@MatchId}" onmouseover="mover('{@MatchId}','{@Tr_Cls}','trbgov');" onmouseout="mover('{@MatchId}','trbgov','{@Tr_Cls}');">
                <td rowspan="2" class="text_time">
                        {%ShowTime}
                </td>
                <td class="line_unR" style="width: 130px">
                    <div class="{@Home_Cls}">{%HomeName}</div>
                    <div class="{@Away_Cls}">{%AwayName}</div>
                </td>
                <td align="right" valign="middle" style="white-space: nowrap">
                    {@Streaming}{@SportRadarInfo}{@Favorites}
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {@Value_1_H}<br />
                        {@Value_1_A}</div>
                    <div class="line_divR OddsDiv {%Changed_1}">
                        <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)">
                            {%Odds_1_H}</a><br>
                        <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)">
                            {%Odds_1_A}</a><br />
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {%Goal_3}<br />
                        {@UNDER_3}</div>
                    <div class="line_divR OddsDiv {%Changed_3}">
                        <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)">
                            {%Odds_3_O}</a><br />
                        <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)">
                            {%Odds_3_U}</a><br />
                    </div>
                </td>
                <td>
                    <div class="line_divL HdpGoalClass">
                        <span title="<?=$lang_member[453];?>">{@ODD_2}</span><br />
                        <span title="<?=$lang_member[459];?>">{@EVEN_2}</span>
                    </div>
                    <div class="line_divR OddsDiv {%Changed_2}">
                        <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)">
                            {%Odds_2_O}</a><br />
                        <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)">
                            {%Odds_2_E}</a><br />
                    </div>
                </td>
                <td class="tabt_L none_rline">
                    <div class="line_divL HdpGoalClass">
                        {@Value_7_H}<br />
                        {@Value_7_A}
                    </div>
                    <div class="line_divR OddsDiv {%Changed_7}">
                        <a class="{@Odds_7_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','h','{%Odds_7_H}',7)">
                            {%Odds_7_H}</a><br />
                        <a class="{@Odds_7_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','a','{%Odds_7_A}',7)">
                            {%Odds_7_A}</a><br />
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {%Goal_8}<br />
                        {@UNDER_8}</div>
                    <div class="line_divR OddsDiv {%Changed_8}">
                        <a class="{@Odds_8_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','h','{%Odds_8_O}',8)">
                            {%Odds_8_O}</a><br />
                        <a class="{@Odds_8_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','a','{%Odds_8_U}',8)">
                            {%Odds_8_U}</a><br />
                    </div>
                </td>
                <td>
                    <div class="line_divL HdpGoalClass">
                        <span title="<?=$lang_member[453];?>">{@ODD_12}</span><br />
                        <span title="<?=$lang_member[459];?>">{@EVEN_12}</span></div>
                    <div class="line_divR OddsDiv {%Changed_12}">
                        <a class="{@Odds_12_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_12}','h','{%Odds_12_O}',12)">
                            {%Odds_12_O}</a><br />
                        <a class="{@Odds_12_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_12}','a','{%Odds_12_E}',12)">
                            {%Odds_12_E}</a><br />
                    </div>
                </td>
                <td rowspan="2" align="center">
                    <div title="More Bet Types">
                        <!-- <a href="#" onclick="GetMore(2,'{%MatchId}','{@HomeName}','{@AwayName}',parseInt('{@isParlay}'),'D','{%MUID}','GetBasketballMore',this);return false;" class="en_Point {@More_Style}"><span id="MoreCount">{@More}</span></a> -->
                    </div>
                    {@StatsInfo}
                </td>
            </tr>
            <tr class="{@Tr_Cls} mover{@MatchId}" onmouseover="mover('{@MatchId}','{@Tr_Cls}','trbgov');" onmouseout="mover('{@MatchId}','trbgov','{@Tr_Cls}');">
                <td class="none_lline moreBetType INoddsTable {@Display_Extend}" colspan="8">
                    <div class="MoreTable">
                        <table class="oddsTable {@Display_ExtendML}" cellpadding="0" cellspacing="0" width="100%" class="{@Tr_Cls} mover{@MatchId}" onmouseover="mover('{@MatchId}','{@Tr_Cls}','trbgov');" onmouseout="mover('{@MatchId}','trbgov','{@Tr_Cls}');">
                            <tbody>
                                <tr class="tabtitle">
                                    <td colspan="2">
                                        <?=$lang_member[908];?>
                                    </td>
                                    <td colspan="2">
                                        1H Moneyline
                                    </td>
                                </tr>
                                <tr>
                                    <th width="25%">
                                        <span class="text-ellipsis" title="Home">Home</span>
                                    </th>
                                    <th width="25%">
                                        <span class="text-ellipsis" title="Away">Away</span>
                                    </th>
                                    <th class="even" width="25%">
                                        <span class="text-ellipsis" title="Home">Home</span>
                                    </th>
                                    <th class="even" width="25%">
                                        <span class="text-ellipsis" title="Away">Away</span>
                                    </th>
                                </tr>
                                <tr class="{@Tr_Cls} mover{@MatchId}" onmouseover="mover('{@MatchId}','{@Tr_Cls}','trbgov');" onmouseout="mover('{@MatchId}','trbgov','{@Tr_Cls}');" align="center">
									<td class="none_rline {@Changed_20}">
										<a class="{@Odds_20_H_Cls}" href="javascript:bet('{@isParlay}','{%MatchId}','{@OddsId_20}','H','{@Odds_20_H}',20)">{@Odds_20_H}</a>
									</td>
									<td class="{@Changed_20}">
										<a class="{@Odds_20_A_Cls}" href="javascript:bet('{@isParlay}','{%MatchId}','{@OddsId_20}','A','{@Odds_20_A}',20)">{@Odds_20_A}</a>
									</td>
									<td class="none_rline {@Changed_21}">
										<a class="{@Odds_21_H_Cls}" href="javascript:bet('{@isParlay}','{%MatchId}','{@OddsId_21}','H','{@Odds_21_H}',20)">{@Odds_21_H}</a>
									</td>
									<td class="{@Changed_21}">
										<a class="{@Odds_21_A_Cls}" href="javascript:bet('{@isParlay}','{%MatchId}','{@OddsId_21}','A','{@Odds_21_A}',20)">{@Odds_21_A}</a>
									</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>					
                </td>
            </tr>
        </tbody>
		
		<tbody id="tmplEventFooter_2">
            <tr class="{@Tr_Cls} mover{@MatchId}" onmouseover="mover('{@MatchId}','{@Tr_Cls}','trbgov');" onmouseout="mover('{@MatchId}','trbgov','{@Tr_Cls}');">
                <td rowspan="2" class="text_time">
                        {%ShowTime}
                </td>
                <td class="line_unR" style="width: 130px">
                    <div class="{@Home_Cls}">
                        <span class="D_liveinfoM_{%MatchId}_H" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%StatsId}', '{@HomeName}', '{@AwayName}',2)" onmouseover="javascript:CheckCursorStyle(1,'D_liveinfoM_{%MatchId}_H');" onmouseout="javascript:CheckCursorStyle(0,'D_liveinfoM_{%MatchId}_H');">{%HomeName}</span></div>
                    <div class="{@Away_Cls}">
                        <span class="L_liveinfoM_{%MatchId}_A" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%StatsId}', '{@HomeName}', '{@AwayName}',2)" onmouseover="javascript:CheckCursorStyle(1,'L_liveinfoM_{%MatchId}_A');" onmouseout="javascript:CheckCursorStyle(0,'L_liveinfoM_{%MatchId}_A');">{%AwayName}</span></div>
                </td>
                <td align="right" valign="middle" style="white-space: nowrap">
                    {@Streaming}{@SportRadarInfo}{@Favorites}
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {@Value_1_H}<br />
                        {@Value_1_A}</div>
                    <div class="line_divR OddsDiv {%Changed_1}">
                        <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{%Odds_1_H}',1)">
                            {%Odds_1_H}</a><br>
                        <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{%Odds_1_A}',1)">
                            {%Odds_1_A}</a><br />
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {%Goal_3}<br />
                        {@UNDER_3}</div>
                    <div class="line_divR OddsDiv {%Changed_3}">
                        <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{%Odds_3_O}',3)">
                            {%Odds_3_O}</a><br />
                        <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{%Odds_3_U}',3)">
                            {%Odds_3_U}</a><br />
                    </div>
                </td>
                <td>
                    <div class="line_divL HdpGoalClass">
                        <span title="<?=$lang_member[453];?>">{@ODD_2}</span><br />
                        <span title="<?=$lang_member[459];?>">{@EVEN_2}</span>
                    </div>
                    <div class="line_divR OddsDiv {%Changed_2}">
                        <a class="{@Odds_2_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','h','{%Odds_2_O}',2)">
                            {%Odds_2_O}</a><br />
                        <a class="{@Odds_2_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_2}','a','{%Odds_2_E}',2)">
                            {%Odds_2_E}</a><br />
                    </div>
                </td>
                <td class="tabt_L none_rline">
                    <div class="line_divL HdpGoalClass">
                        {@Value_7_H}<br />
                        {@Value_7_A}
                    </div>
                    <div class="line_divR OddsDiv {%Changed_7}">
                        <a class="{@Odds_7_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','h','{%Odds_7_H}',7)">
                            {%Odds_7_H}</a><br />
                        <a class="{@Odds_7_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','a','{%Odds_7_A}',7)">
                            {%Odds_7_A}</a><br />
                    </div>
                </td>
                <td class="none_rline">
                    <div class="line_divL HdpGoalClass">
                        {%Goal_8}<br />
                        {@UNDER_8}</div>
                    <div class="line_divR OddsDiv {%Changed_8}">
                        <a class="{@Odds_8_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','h','{%Odds_8_O}',8)">
                            {%Odds_8_O}</a><br />
                        <a class="{@Odds_8_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','a','{%Odds_8_U}',8)">
                            {%Odds_8_U}</a><br />
                    </div>
                </td>
                <td>
                    <div class="line_divL HdpGoalClass">
                        <span title="<?=$lang_member[453];?>">{@ODD_12}</span><br />
                        <span title="<?=$lang_member[459];?>">{@EVEN_12}</span></div>
                    <div class="line_divR OddsDiv {%Changed_12}">
                        <a class="{@Odds_12_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_12}','h','{%Odds_12_O}',12)">
                            {%Odds_12_O}</a><br />
                        <a class="{@Odds_12_E_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_12}','a','{%Odds_12_E}',12)">
                            {%Odds_12_E}</a><br />
                    </div>
                </td>
                <td rowspan="2" align="center">
                    <div title="More Bet Types">
                        <!-- <a href="#" onclick="GetMore(2,'{%MatchId}','{@HomeName}','{@AwayName}',parseInt('{@isParlay}'),'D','{%MUID}','GetBasketballMore',this);return false;" class="en_Point {@More_Style}"><span id="MoreCount">{@More}</span></a> -->
                    </div>
                    {@StatsInfo}
                </td>
            </tr>
            <tr class="{@Tr_Cls} mover{@MatchId}" onmouseover="mover('{@MatchId}','{@Tr_Cls}','trbgov');" onmouseout="mover('{@MatchId}','trbgov','{@Tr_Cls}');">
                <td class="none_lline moreBetType INoddsTable {@Display_Extend}" colspan="8">
                    <div class="MoreTable">
                        <table class="oddsTable {@Display_ExtendML}" cellpadding="0" cellspacing="0" width="100%" class="{@Tr_Cls} mover{@MatchId}" onmouseover="mover('{@MatchId}','{@Tr_Cls}','trbgov');" onmouseout="mover('{@MatchId}','trbgov','{@Tr_Cls}');">
                            <tbody>
                                <tr class="tabtitle">
                                    <td colspan="2">
                                        <?=$lang_member[908];?>
                                    </td>
                                    <td colspan="2">
                                        1H Moneyline
                                    </td>
                                </tr>
                                <tr>
                                    <th width="25%">
                                        <span class="text-ellipsis" title="Home">Home</span>
                                    </th>
                                    <th width="25%">
                                        <span class="text-ellipsis" title="Away">Away</span>
                                    </th>
                                    <th class="even" width="25%">
                                        <span class="text-ellipsis" title="Home">Home</span>
                                    </th>
                                    <th class="even" width="25%">
                                        <span class="text-ellipsis" title="Away">Away</span>
                                    </th>
                                </tr>
                                <tr class="{@Tr_Cls} mover{@MatchId}" onmouseover="mover('{@MatchId}','{@Tr_Cls}','trbgov');" onmouseout="mover('{@MatchId}','trbgov','{@Tr_Cls}');" align="center">
									<td class="none_rline {@Changed_20}">
										<a class="{@Odds_20_H_Cls}" href="javascript:bet('{@isParlay}','{%MatchId}','{@OddsId_20}','H','{@Odds_20_H}',20)">{@Odds_20_H}</a>
									</td>
									<td class="{@Changed_20}">
										<a class="{@Odds_20_A_Cls}" href="javascript:bet('{@isParlay}','{%MatchId}','{@OddsId_20}','A','{@Odds_20_A}',20)">{@Odds_20_A}</a>
									</td>
									<td class="none_rline {@Changed_21}">
										<a class="{@Odds_21_H_Cls}" href="javascript:bet('{@isParlay}','{%MatchId}','{@OddsId_21}','H','{@Odds_21_H}',20)">{@Odds_21_H}</a>
									</td>
									<td class="{@Changed_21}">
										<a class="{@Odds_21_A_Cls}" href="javascript:bet('{@isParlay}','{%MatchId}','{@OddsId_21}','A','{@Odds_21_A}',20)">{@Odds_21_A}</a>
									</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>					
                    <!--BasketballExtendBettype-->
                </td>
            </tr>
			<tr><td id="more_{%MatchId}" class="moreBetType tag {@Display_More}" colspan="10">{@MoreData}</td></tr>
        </tbody>
    </table>
    <!-- <div id="BasketballExtendBettype"> -->
	<!-- <div class="MoreTable">
        <table class="oddsTable displayOn" cellpadding="0" cellspacing="0" width="100%">
        <tbody>
          <tr class="tabtitle">
            <td colspan="6">{@QuarterTitle}</td></tr>
          <tr>
            <th width="16%">
              <span class="text-ellipsis" title="{@QTRHDP_hint}">ราคาต่อรอง</span></th>
            <th width="16%">
              <span class="text-ellipsis" title="{@QTROU_hint}">O/U</span></th>
            <th width="16%">
              <span class="text-ellipsis" title="{@QTROE_hint}">O/E</span></th>
            <th class="even" width="16%">
              <span class="text-ellipsis" title="{@Race10_hint}">Race To 10</span></th>
            <th class="even" width="16%">
              <span class="text-ellipsis" title="{@Race15_hint}">Race To 15</span></th>
            <th class="even" width="16%">
              <span class="text-ellipsis" title="{@Race20_hint}">Race To 20</span></th>
          </tr> -->
			<!--MatchList-->
          <!-- </tbody>
      </table> -->
	<!-- </div> -->
    </div>
	<!-- <table id="MatchRow"> -->
		<!-- <tr class="{@Tr_Cls} mover{@MatchId}" onmouseover="mover('{@MatchId}','{@Tr_Cls}','trbgov');" onmouseout="mover('{@MatchId}','trbgov','{@Tr_Cls}');">
            <td class="none_rline UdrDogOddsClass ">
              <div class="line_divL HdpGoalClass">
                {@Value_609_H}<br />
                {@Value_609_A}</div>
              <div class="line_divR OddsDiv {@Changed_609}">
                <a class="{@Odds_609_H_Cls}" href="javascript:bet({@isParlay},'{@MatchId}','{@OddsId_609}','h','{@Odds_609_H}',609)">{@Odds_609_H}</a>
                <br>
                <a class="{@Odds_609_A_Cls}" href="javascript:bet({@isParlay},'{@MatchId}','{@OddsId_609}','a','{@Odds_609_A}',609)">{@Odds_609_A}</a>
                <br></div>
            </td>
            <td class="none_rline UdrDogOddsClass ">
              <div class="line_divL HdpGoalClass">
				{@Goal_610}<br />
                {@UNDER_610}</div>
              <div class="line_divR OddsDiv {@Changed_610}">
                <a class="{@Odds_610_O_Cls}" href="javascript:bet({@isParlay},'{@MatchId}','{@OddsId_610}','o','{@Odds_610_O}',610)">{@Odds_610_O}</a>
                <br>
                <a class="{@Odds_610_U_Cls}" href="javascript:bet({@isParlay},'{@MatchId}','{@OddsId_610}','u','{@Odds_610_U}',610)">{@Odds_610_U}</a>
                <br></div>
            </td>
            <td>
              <div class="line_divL HdpGoalClass ">
                <span title="คี่">{@ODD_611}</span>
                <br>
                <span title="คู่">{@EVEN_611}</span></div>
              <div class="line_divR OddsDiv {@Changed_611}">
                <a class="{@Odds_611_O_Cls}" href="javascript:bet({@isParlay},'{@MatchId}','{@OddsId_611}','o','{@Odds_611_O}',611)">{@Odds_611_O}</a>
                <br>
                <a class="{@Odds_611_E_Cls}" href="javascript:bet({@isParlay},'{@MatchId}','{@OddsId_611}','e','{@Odds_611_E}',611)">{@Odds_611_E}</a>
                <br></div>
            </td>
            <td class="none_rline UdrDogOddsClass ">
              <div class="line_divR OddsDiv {@Changed_613_10}">
                <a class="{@Odds_613_10_H_Cls}" href="javascript:bet({@isParlay},'{@MatchId}','{@OddsId_613_10}','h','{@Odds_613_H10}',613)">{@Odds_613_H10}</a>
                <br>
                <a class="{@Odds_613_10_A_Cls}" href="javascript:bet({@isParlay},'{@MatchId}','{@OddsId_613_10}','a','{@Odds_613_A10}',613)">{@Odds_613_A10}</a>
                <br></div>
            </td>
            <td class="none_rline UdrDogOddsClass ">
              <div class="line_divR OddsDiv {@Changed_613_15}">
                <a class="{@Odds_613_15_H_Cls}" href="javascript:bet({@isParlay},'{@MatchId}','{@OddsId_613_15}','h','{@Odds_613_H15}',613)">{@Odds_613_H15}</a>
                <br>
                <a class="{@Odds_613_15_A_Cls}" href="javascript:bet({@isParlay},'{@MatchId}','{@OddsId_613_15}','a','{@Odds_613_A15}',613)">{@Odds_613_A15}</a>
                <br></div>
            </td>
            <td class="UdrDogOddsClass ">
              <div class="line_divR OddsDiv {@Changed_613_20}">
                <a class="{@Odds_613_20_H_Cls}" href="javascript:bet({@isParlay},'{@MatchId}','{@OddsId_613_20}','h','{@Odds_613_H20}',613)">{@Odds_613_H20}</a>
                <br>
                <a class="{@Odds_613_20_A_Cls}" href="javascript:bet({@isParlay},'{@MatchId}','{@OddsId_613_20}','a','{@Odds_613_A20}',613)">{@Odds_613_A20}</a>
                <br></div>
            </td>
          </tr> -->
	<!-- </table> -->
    <span id="tmplEnd"></span>
</body>
</html>
