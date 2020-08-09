<?
session_start();
// require("lang/member_lang.php");
  require("lang/variable_lang.php");

if($_GET['form']==1){?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Single_Line</title>
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

</head>
<body>
<table id="tmplTable" class="oddsTable layout-fixed" width="100%" cellpadding="0" cellspacing="0" border="0">
  <tbody id='tmplHeader'>
    <tr class="thead_hdp-ou_single-line">
      <th class="th_time" rowspan="2" title="<?=$lang_sport[42];?>"><span><?=$lang_sport[42];?></span></th>
      <th class="th_event even" rowspan="2" title="<?=$lang_sport[40];?>"><span><?=$lang_sport[40];?></span></th>
      <th class="th_full-time" title="<?=$lang_sport[44];?>" colspan="6"><span><?=$lang_sport[44];?></span></th>
      <th class="th_half-time even" title="<?=$lang_sport[43];?>" colspan="6"><span><?=$lang_sport[43];?></span></th>
      <th class="th_last" rowspan="2"></th>
      <th class="th_last" rowspan="2"></th>
      
    </tr>
    <tr>
      <th title="<?=$lang_sport[116];?>"><span><?=$lang_sport[116];?></span></th>
      <th title="<?=$lang_sport[117];?>"><span><?=$lang_sport[117];?></span></th>
      <th title="<?=$lang_sport[118];?>"><span><?=$lang_sport[118];?></span></th>
      <th title="<?=$lang_sport[119];?>"><span><?=$lang_sport[119];?></span></th>
      <th title="<?=$lang_sport[120];?>"><span><?=$lang_sport[120];?></span></th>
      <th title="<?=$lang_sport[121];?>"><span><?=$lang_sport[121];?></span></th>
      <th class="even" title="<?=$lang_sport[116];?>"><span><?=$lang_sport[116];?></span></th>
      <th class="even" title="<?=$lang_sport[117];?>"><span><?=$lang_sport[117];?></span></th>
      <th class="even" title="<?=$lang_sport[118];?>"><span><?=$lang_sport[118];?></span></th>
      <th class="even" title="<?=$lang_sport[119];?>"><span><?=$lang_sport[119];?></span></th>
      <th class="even" title="<?=$lang_sport[120];?>"><span><?=$lang_sport[120];?></span></th>
      <th class="even" title="<?=$lang_sport[121];?>"><span><?=$lang_sport[121];?></span></th>


    </tr>
  </tbody>
  <tbody id='tmplLeague_L'>
    <tr id="l_{%LeagueId}" onclick="refreshData_L();" style="cursor: pointer">
      <td class="tabtitle"></td>
      <td colspan="13" class="tabtitle">{@FavLeagues}{%LeagueName}</td>
      <td colspan="2" class="tabtitle" align="right" nowrap>
          <a name="btnRefresh_L" class="btnIcon right disable"><div class="icon-refresh" title="<?=$lang_sport[18];?>"></div></a></td>
    </tr>
  </tbody>
  <tbody id='tmplLiveMaster'>
    <!--MR_START-->
    <tr align="center" class="{@MMRTr_Cls} {@MR_DISP1}" onmouseover="this.style.backgroundColor='#f5eeb8';"
                onmouseout="this.style.backgroundColor='{@MMRBgColor}';">
      <td nowrap class="text_time {%Changed_Score}">
    {@GameStatus}
    <b>{%ScoreH}-{%ScoreA}</b>
        <div nowrap style="color: red"> <span class="{@TimeSuspendCls}" title="In Running"><b class="IsLive">IR</b></span><span class="{@TimeSuspendCls1}"><b class="{@LiveTimeCls}">{%ShowTime}</b><span style="color: #566C9E">{@InjuryTime}</span></span></div></td>
      <td align='left' class="line_unR">
      <div class="eventLeft">
          <div class="{@Home_MR_Cls}"><span class="L_liveinfoM_{%MatchId}_H" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'L_liveinfoM_{%MatchId}_H');" onmouseout="javascript:CheckCursorStyle(0,'L_liveinfoM_{%MatchId}_H');">{%HomeName}</span>{@RedCardH}</div>
            <div class="{@Away_MR_Cls}"><span class="L_liveinfoM_{%MatchId}_A" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'L_liveinfoM_{%MatchId}_A');" onmouseout="javascript:CheckCursorStyle(0,'L_liveinfoM_{%MatchId}_A');">{%AwayName}</span>{@RedCardA}</div>
        </div>
        <div class="eventRight">{@Streaming}{@SportRadarInfo}{@LiveChart}{@Favorites}</div>
        </td>
      <!--<td width="8%" align="right">{@Streaming}{@SportRadarInfo}{@LiveChart}{@Favorites}</td>-->
      <td nowrap="nowrap" class="HdpGoalClass {%Changed_301} mmrOdds"> {@Value_301}</td>
      <td nowrap="nowrap" class="UdrDogOddsClass {%Changed_301}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_301}','h','{%Odds_301_H}','301_{%Percentage_301}')">{%Odds_301_H}</a></td>
      <td nowrap="nowrap" class="UdrDogOddsClass {%Changed_301}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_301}','a','{%Odds_301_A}','301_{%Percentage_301}')">{%Odds_301_A}</a></td>
      <td nowrap="nowrap" class="HdpGoalClass {%Changed_302} mmrOdds"> {@Goal_302}</td>
      <td nowrap="nowrap" class="UdrDogOddsClass {%Changed_302}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_302}','h','{%Odds_302_O}','302_{%Percentage_302}')">{%Odds_302_O}</a></td>
      <td nowrap="nowrap" class="UdrDogOddsClass {%Changed_302}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_302}','a','{%Odds_302_U}','302_{%Percentage_302}')">{%Odds_302_U}</a></td>
      <td nowrap="nowrap" class="tabt_L HdpGoalClass {%Changed_303} mmrOdds"> {@Value_303}</td>
      <td nowrap="nowrap" class="UdrDogOddsClass {%Changed_303}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_303}','h','{%Odds_303_H}','303_{%Percentage_303}')">{%Odds_303_H}</a></td>
      <td nowrap="nowrap" class="UdrDogOddsClass {%Changed_303}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_303}','a','{%Odds_303_A}','303_{%Percentage_303}')">{%Odds_303_A}</a></td>
      <td nowrap="nowrap" class="HdpGoalClass {%Changed_304} mmrOdds"> {@Goal_304}</td>
      <td nowrap="nowrap" class="UdrDogOddsClass {%Changed_304}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_304}','h','{%Odds_304_O}','304_{%Percentage_304}')">{%Odds_304_O}</a></td>
      <td nowrap="nowrap" class="UdrDogOddsClass {%Changed_304}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_304}','a','{%Odds_304_U}','304_{%Percentage_304}')">{%Odds_304_U}</a></td>
      <td width="1" class="breakLine">
    <!-- <span class="{@MR_DISP2}">
            <a onclick="GetMore(1,'{%MatchId}','{@HomeName}','{@AwayName}',parseInt('{@isParlay}'),'L','{%MUID}','GetSoccerMore',this);return false;" href="#" >{@More}</a>
            <span class="iconOdds fastMarket {@FastMarket_Style}" onclick="OpenFastMarket(this);return false;" title="กลุ่มเป้าหมายด่วน"></span>
            <a href="#" class="btn icon {@SuperLive_Style}" onclick="OpenSuperLive('{%MatchId}');return false;" title="SuperLive">S</a>
    </span> -->
      </td>
      <td align="center" class="breakLine">{@ScoreMap}{@StatsInfo}</td>
    </tr>
    <!--MR_END-->
    <!--MY_START-->
    <tr align="center" class="{@Tr_Cls} {@MR_DISP3}" onmouseover="this.style.backgroundColor='#f5eeb8';"
                onmouseout="this.style.backgroundColor='{@BgColor}';">
      <td nowrap class="text_time {%Changed_Score}">
    {@GameStatus}
    <b>{%ScoreH}-{%ScoreA}</b>
        <div nowrap style="color: red"> <span class="{@TimeSuspendCls}" title="In Running"><b class="IsLive">IR</b></span><span class="{@TimeSuspendCls1}"><b class="{@LiveTimeCls}">{%ShowTime}</b><span style="color: #566C9E">{@InjuryTime}</span></span></div></td>
      <td align='left' class="line_unR">
        <div class="eventLeft">
      <div class="{@Home_Cls}"><span class="L_liveinfoM_{%MatchId}_H" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'L_liveinfoM_{%MatchId}_H');" onmouseout="javascript:CheckCursorStyle(0,'L_liveinfoM_{%MatchId}_H');">{%HomeName}</span>{@RedCardH}</div>
        <div class="{@Away_Cls}"><span class="L_liveinfoM_{%MatchId}_A" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'L_liveinfoM_{%MatchId}_A');" onmouseout="javascript:CheckCursorStyle(0,'L_liveinfoM_{%MatchId}_A');">{%AwayName}</span>{@RedCardA}</div>
    </div>
        <div class="eventRight">{@Streaming}{@SportRadarInfo}{@LiveChart}{@Favorites}</div>
        </td>
      <!--<td width="8%" align="right">{@Streaming}{@SportRadarInfo}{@LiveChart}{@Favorites}</td>-->
      <td nowrap="nowrap" class="HdpGoalClass"> {%Value_1}</td>
      <td nowrap="nowrap" class="{%Changed_1}"><a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{@Odds_1_H}',1)" name="cvmy" o="{@ODDS_1_H}">{@Odds_1_H}</a></td>
      <td nowrap="nowrap" class="{%Changed_1}"><a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{@Odds_1_A}',1)" name="cvmy" o="{@ODDS_1_A}">{@Odds_1_A}</a></td>
      <td nowrap="nowrap" class="HdpGoalClass"> {%Goal_3}</td>
      <td nowrap="nowrap" class="{%Changed_3}"><a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{@Odds_3_O}',3)" name="cvmy" o="{@ODDS_3_O}">{@Odds_3_O}</a></td>
      <td nowrap="nowrap" class="{%Changed_3}"><a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{@Odds_3_U}',3)" name="cvmy" o="{@ODDS_3_U}">{@Odds_3_U}</a></td>
      <td nowrap="nowrap" class="tabt_L HdpGoalClass"> {%Value_7}</td>
      <td nowrap="nowrap" class="{%Changed_7}"><a class="{@Odds_7_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','h','{@Odds_7_H}',7)" name="cvmy" o="{@ODDS_7_H}">{@Odds_7_H}</a></td>
      <td nowrap="nowrap" class="{%Changed_7}"><a class="{@Odds_7_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','a','{@Odds_7_A}',7)" name="cvmy" o="{@ODDS_7_A}">{@Odds_7_A}</a></td>
      <td nowrap="nowrap" class="HdpGoalClass"> {%Goal_8}</td>
      <td nowrap="nowrap" class="{%Changed_8}"><a class="{@Odds_8_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','h','{@Odds_8_O}',8)" name="cvmy" o="{@ODDS_8_O}">{@Odds_8_O}</a></td>
      <td nowrap="nowrap" class="{%Changed_8}"><a class="{@Odds_8_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','a','{@Odds_8_U}',8)" name="cvmy" o="{@ODDS_8_U}">{@Odds_8_U}</a></td>
      <td width="1" class="breakLine">
    <!-- <span>
      <a onclick="GetMore(1,'{%MatchId}','{@HomeName}','{@AwayName}',parseInt('{@isParlay}'),'L','{%MUID}','GetSoccerMore',this);return false;" href="#" >{@More}</a>
            <span class="iconOdds fastMarket {@FastMarket_Style}" onclick="OpenFastMarket(this);return false;" title="กลุ่มเป้าหมายด่วน"></span>
      <a href="#" class="btn icon {@SuperLive_Style}" onclick="OpenSuperLive('{%MatchId}');return false;" title="SuperLive">S</a>
    </span> -->
      </td>
      <td align="center" class="breakLine"><span class="{@MR_DISP2}">{@ScoreMap}{@StatsInfo}</span></td>
    </tr>
    <!--MY_END-->
    <!--SMORE_START-->
    <tr><td class="moreBetType tag {@Display_More}" colspan="16">{@MoreData}</td></tr>
    <!--SMORE_END-->
  </tbody>
  <tbody id='tmplLive'>
    <tr align="center" class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';"
                onmouseout="this.style.backgroundColor='{@BgColor}';">
      <td nowrap class="text_time {%Changed_Score}">
    {@GameStatus}
    <b>{%ScoreH}-{%ScoreA}</b>
        <div nowrap style="color: red"> <span class="{@TimeSuspendCls}" title="In Running"><b class="IsLive">IR</b></span><span class="{@TimeSuspendCls1}"><b class="{@LiveTimeCls}">{%ShowTime}</b><span style="color: #566C9E">{@InjuryTime}</span></span></div></td>
      <td align='left' class="line_unR">
        <div class="eventLeft">
      <div class="{@Home_Cls}"><span class="L_liveinfoM_{%MatchId}_H" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'L_liveinfoM_{%MatchId}_H');" onmouseout="javascript:CheckCursorStyle(0,'L_liveinfoM_{%MatchId}_H');">{%HomeName}</span>{@RedCardH}</div>
        <div class="{@Away_Cls}"><span class="L_liveinfoM_{%MatchId}_A" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'L_liveinfoM_{%MatchId}_A');" onmouseout="javascript:CheckCursorStyle(0,'L_liveinfoM_{%MatchId}_A');">{%AwayName}</span>{@RedCardA}</div>
        </div>
        <div class="eventRight">{@Streaming}{@SportRadarInfo}{@LiveChart}{@Favorites}</div>
        </td>
      <!--<td width="8%" align="right">{@Streaming}{@SportRadarInfo}{@LiveChart}{@Favorites}</td>-->
      <td nowrap="nowrap" class="HdpGoalClass"> {%Value_1}</td>
      <td nowrap="nowrap" class="{%Changed_1}"><a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{@Odds_1_H}',1)" name="cvmy" o="{@ODDS_1_H}">{@Odds_1_H}</a></td>
      <td nowrap="nowrap" class="{%Changed_1}"><a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{@Odds_1_A}',1)" name="cvmy" o="{@ODDS_1_A}">{@Odds_1_A}</a></td>
      <td nowrap="nowrap" class="HdpGoalClass"> {%Goal_3}</td>
      <td nowrap="nowrap" class="{%Changed_3}"><a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{@Odds_3_O}',3)" name="cvmy" o="{@ODDS_3_O}">{@Odds_3_O}</a></td>
      <td nowrap="nowrap" class="{%Changed_3}"><a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{@Odds_3_U}',3)" name="cvmy" o="{@ODDS_3_U}">{@Odds_3_U}</a></td>
      <td nowrap="nowrap" class="tabt_L HdpGoalClass"> {%Value_7}</td>
      <td nowrap="nowrap" class="{%Changed_7}"><a class="{@Odds_7_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','h','{@Odds_7_H}',7)" name="cvmy" o="{@ODDS_7_H}">{@Odds_7_H}</a></td>
      <td nowrap="nowrap" class="{%Changed_7}"><a class="{@Odds_7_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','a','{@Odds_7_A}',7)" name="cvmy" o="{@ODDS_7_A}">{@Odds_7_A}</a></td>
      <td nowrap="nowrap" class="HdpGoalClass"> {%Goal_8}</td>
      <td nowrap="nowrap" class="{%Changed_8}"><a class="{@Odds_8_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','h','{@Odds_8_O}',8)" name="cvmy" o="{@ODDS_8_O}">{@Odds_8_O}</a></td>
      <td nowrap="nowrap" class="{%Changed_8}"><a class="{@Odds_8_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','a','{@Odds_8_U}',8)" name="cvmy" o="{@ODDS_8_U}">{@Odds_8_U}</a></td>
      <td width="1" class="breakLine">
        <!-- <a onclick="GetMore(1,'{%MatchId}','{@HomeName}','{@AwayName}',parseInt('{@isParlay}'),'L','{%MUID}','GetSoccerMore',this);return false;" href="#" >{@More}</a> -->
          <!-- <span class="iconOdds fastMarket {@FastMarket_Style}" onclick="OpenFastMarket(this);return false;" title="กลุ่มเป้าหมายด่วน"></span> -->
        <!-- <a href="#" class="btn icon {@SuperLive_Style}" onclick="OpenSuperLive('{%MatchId}');return false;" title="SuperLive">S</a> -->
      </td>
      <td align="center" class="breakLine">{@ScoreMap}{@StatsInfo}</td>
    </tr>
    <!--SMORE_START-->
    <tr><td class="moreBetType tag {@Display_More}" colspan="16">{@MoreData}</td></tr>
    <!--SMORE_END-->
  </tbody>
  <tbody id='tmplLeague'>
    <tr id="l_{%LeagueId}" onclick="refreshData_D()" style="cursor: pointer">
      <td class="tabtitle"></td>
      <td colspan="13" class="tabtitle">{@FavLeagues}{%LeagueName}</td>
      <td colspan="2" class="tabtitle" align="right" nowrap>
          <a name="btnRefresh_D" class="btnIcon right disable"><div class="icon-refresh" title="<?=$lang_sport[18];?>"></div></a></td>
    </tr>
  </tbody>
  <tbody id='tmplEventMaster'>
    <!--MR_START-->
    <tr align="center" class="{@MMRTr_Cls} {@MR_DISP1}" onmouseover="this.style.backgroundColor='#f5eeb8';"
                onmouseout="this.style.backgroundColor='{@MMRBgColor}';">
      <td class="text_time"> {%ShowTime}</td>
      <td align='left' class="line_unR">
        <div class="eventLeft">
      <div class="{@Home_MR_Cls}"><span class="D_liveinfoM_{%MatchId}_H" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'D_liveinfoM_{%MatchId}_H');" onmouseout="javascript:CheckCursorStyle(0,'D_liveinfoM_{%MatchId}_H');">{%HomeName}</span></div>
        <div class="{@Away_MR_Cls}"><span class="D_liveinfoM_{%MatchId}_A" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'D_liveinfoM_{%MatchId}_A');" onmouseout="javascript:CheckCursorStyle(0,'D_liveinfoM_{%MatchId}_A');">{%AwayName}</span></div>
        </div>
        <div class="eventRight">{@Streaming}{@SportRadarInfo}{@LiveChart}{@Favorites}</div>
        </td>
      <!--<td width="8%" align="right">{@Streaming}{@SportRadarInfo}{@LiveChart}{@Favorites}</td>-->
      <td nowrap="nowrap" class="HdpGoalClass {%Changed_301} mmrOdds"> {@Value_301}</td>
      <td nowrap="nowrap" class="UdrDogOddsClass {%Changed_301}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_301}','h','{%Odds_301_H}','301_{%Percentage_301}')">{%Odds_301_H}</a></td>
      <td nowrap="nowrap" class="UdrDogOddsClass {%Changed_301}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_301}','a','{%Odds_301_A}','301_{%Percentage_301}')">{%Odds_301_A}</a></td>
      <td nowrap="nowrap" class="HdpGoalClass {%Changed_302} mmrOdds"> {@Goal_302}</td>
      <td nowrap="nowrap" class="UdrDogOddsClass {%Changed_302}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_302}','h','{%Odds_302_O}','302_{%Percentage_302}')">{%Odds_302_O}</a></td>
      <td nowrap="nowrap" class="UdrDogOddsClass {%Changed_302}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_302}','a','{%Odds_302_U}','302_{%Percentage_302}')">{%Odds_302_U}</a></td>
      <td nowrap="nowrap" class="tabt_L HdpGoalClass {%Changed_303} mmrOdds"> {@Value_303}</td>
      <td nowrap="nowrap" class="UdrDogOddsClass {%Changed_303}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_303}','h','{%Odds_303_H}','303_{%Percentage_303}')">{%Odds_303_H}</a></td>
      <td nowrap="nowrap" class="UdrDogOddsClass {%Changed_303}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_303}','a','{%Odds_303_A}','303_{%Percentage_303}')">{%Odds_303_A}</a></td>
      <td nowrap="nowrap" class="HdpGoalClass {%Changed_304} mmrOdds"> {@Goal_304}</td>
      <td nowrap="nowrap" class="UdrDogOddsClass {%Changed_304}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_304}','h','{%Odds_304_O}','304_{%Percentage_304}')">{%Odds_304_O}</a></td>
      <td nowrap="nowrap" class="UdrDogOddsClass {%Changed_304}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_304}','a','{%Odds_304_U}','304_{%Percentage_304}')">{%Odds_304_U}</a></td>
      <td class="breakLine">
    <!-- <span class="{@MR_DISP2}">
            <a onclick="GetMore(1,'{%MatchId}','{@HomeName}','{@AwayName}',parseInt('{@isParlay}'),'D','{%MUID}','GetSoccerMore',this);return false;" href="#" >{@More}</a>
            <span class="iconOdds fastMarket {@FastMarket_Style}" onclick="OpenFastMarket(this);return false;" title="กลุ่มเป้าหมายด่วน"></span>
            <a href="#" class="btn icon {@SuperLive_Style}" onclick="OpenSuperLive('{%MatchId}');return false;" title="SuperLive">S</a>
    </span> -->
      </td>
      <td align="center" class="breakLine">{@ScoreMap}{@StatsInfo}</td>
    </tr>
    <!--MR_END-->
    <!--MY_START-->
    <tr align="center" class="{@Tr_Cls} {@MR_DISP3}" onmouseover="this.style.backgroundColor='#f5eeb8';"
                onmouseout="this.style.backgroundColor='{@BgColor}';">
      <td class="text_time"> {%ShowTime}</td>
      <td align='left' class="line_unR">
        <div class="eventLeft">
      <div class="{@Home_Cls}"><span class="D_liveinfoM_{%MatchId}_H" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'D_liveinfoM_{%MatchId}_H');" onmouseout="javascript:CheckCursorStyle(0,'D_liveinfoM_{%MatchId}_H');">{%HomeName}</span></div>
        <div class="{@Away_Cls}"><span class="D_liveinfoM_{%MatchId}_A" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'D_liveinfoM_{%MatchId}_A');" onmouseout="javascript:CheckCursorStyle(0,'D_liveinfoM_{%MatchId}_A');">{%AwayName}</span></div>
        </div>
        <div class="eventRight">{@Streaming}{@SportRadarInfo}{@LiveChart}{@Favorites}</div>
        </td>
      <!--<td width="8%" align="right">{@Streaming}{@SportRadarInfo}{@LiveChart}{@Favorites}</td>-->
      <td nowrap="nowrap" class="HdpGoalClass"> {%Value_1}</td>
      <td nowrap="nowrap" class="{%Changed_1}"><a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{@Odds_1_H}',1)" name="cvmy" o="{@ODDS_1_H}">{@Odds_1_H}</a></td>
      <td nowrap="nowrap" class="{%Changed_1}"><a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{@Odds_1_A}',1)" name="cvmy" o="{@ODDS_1_A}">{@Odds_1_A}</a></td>
      <td nowrap="nowrap" class="HdpGoalClass"> {%Goal_3}</td>
      <td nowrap="nowrap" class="{%Changed_3}"><a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{@Odds_3_O}',3)" name="cvmy" o="{@ODDS_3_O}">{@Odds_3_O}</a></td>
      <td nowrap="nowrap" class="{%Changed_3}"><a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{@Odds_3_U}',3)" name="cvmy" o="{@ODDS_3_U}">{@Odds_3_U}</a></td>
      <td nowrap="nowrap" class="tabt_L HdpGoalClass"> {%Value_7}</td>
      <td nowrap="nowrap" class="{%Changed_7}"><a class="{@Odds_7_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','h','{@Odds_7_H}',7)" name="cvmy" o="{@ODDS_7_H}">{@Odds_7_H}</a></td>
      <td nowrap="nowrap" class="{%Changed_7}"><a class="{@Odds_7_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','a','{@Odds_7_A}',7)" name="cvmy" o="{@ODDS_7_A}">{@Odds_7_A}</a></td>
      <td nowrap="nowrap" class="HdpGoalClass"> {%Goal_8}</td>
      <td nowrap="nowrap" class="{%Changed_8}"><a class="{@Odds_8_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','h','{@Odds_8_O}',8)" name="cvmy" o="{@ODDS_8_O}">{@Odds_8_O}</a></td>
      <td nowrap="nowrap" class="{%Changed_8}"><a class="{@Odds_8_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','a','{@Odds_8_U}',8)" name="cvmy" o="{@ODDS_8_U}">{@Odds_8_U}</a></td>
      <td class="breakLine">
   <!--  <span>
      <a onclick="GetMore(1,'{%MatchId}','{@HomeName}','{@AwayName}',parseInt('{@isParlay}'),'D','{%MUID}','GetSoccerMore',this);return false;" href="#" >{@More}</a>
            <span class="iconOdds fastMarket {@FastMarket_Style}" onclick="OpenFastMarket(this);return false;" title="กลุ่มเป้าหมายด่วน"></span>
      <a href="#" class="btn icon {@SuperLive_Style}" onclick="OpenSuperLive('{%MatchId}');return false;" title="SuperLive">S</a>
    </span> -->
      </td>
      <td align="center" class="breakLine"><span class="{@MR_DISP2}">{@ScoreMap}{@StatsInfo}</span></td>
    </tr>
    <!--MY_END-->
    <!--SMORE_START-->
    <tr><td class="moreBetType tag {@Display_More}" colspan="16">{@MoreData}</td></tr>
    <!--SMORE_END-->
  </tbody>
  <tbody id='tmplEvent'>
    <tr align="center" class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';"
                onmouseout="this.style.backgroundColor='{@BgColor}';">
      <td class="text_time"> {%ShowTime}</td>
      <td align='left' class="line_unR">
        <div class="eventLeft">
      <div class="{@Home_Cls}"><span class="D_liveinfoM_{%MatchId}_H" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'D_liveinfoM_{%MatchId}_H');" onmouseout="javascript:CheckCursorStyle(0,'D_liveinfoM_{%MatchId}_H');">{%HomeName}</span></div>
        <div class="{@Away_Cls}"><span class="D_liveinfoM_{%MatchId}_A" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{2AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'D_liveinfoM_{%MatchId}_A');" onmouseout="javascript:CheckCursorStyle(0,'D_liveinfoM_{%MatchId}_A');">{%AwayName}</span></div>
        </div>
        <div class="eventRight">{@Streaming}{@SportRadarInfo}{@LiveChart}{@Favorites}</div>
        </td>
      <!--<td width="8%" align="right">{@Streaming}{@SportRadarInfo}{@LiveChart}{@Favorites}</td>-->
      <td nowrap="nowrap" class="HdpGoalClass"> {%Value_1}</td>
      <td nowrap="nowrap" class="{%Changed_1}"><a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{@Odds_1_H}',1)" name="cvmy" o="{@ODDS_1_H}">{@Odds_1_H}</a></td>
      <td nowrap="nowrap" class="{%Changed_1}"><a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{@Odds_1_A}',1)" name="cvmy" o="{@ODDS_1_A}">{@Odds_1_A}</a></td>
      <td nowrap="nowrap" class="HdpGoalClass"> {%Goal_3}</td>
      <td nowrap="nowrap" class="{%Changed_3}"><a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{@Odds_3_O}',3)" name="cvmy" o="{@ODDS_3_O}">{@Odds_3_O}</a></td>
      <td nowrap="nowrap" class="{%Changed_3}"><a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{@Odds_3_U}',3)" name="cvmy" o="{@ODDS_3_U}">{@Odds_3_U}</a></td>
      <td nowrap="nowrap" class="tabt_L HdpGoalClass"> {%Value_7}</td>
      <td nowrap="nowrap" class="{%Changed_7}"><a class="{@Odds_7_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','h','{@Odds_7_H}',7)" name="cvmy" o="{@ODDS_7_H}">{@Odds_7_H}</a></td>
      <td nowrap="nowrap" class="{%Changed_7}"><a class="{@Odds_7_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','a','{@Odds_7_A}',7)" name="cvmy" o="{@ODDS_7_A}">{@Odds_7_A}</a></td>
      <td nowrap="nowrap" class="HdpGoalClass"> {%Goal_8}</td>
      <td nowrap="nowrap" class="{%Changed_8}"><a class="{@Odds_8_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','h','{@Odds_8_O}',8)" name="cvmy" o="{@ODDS_8_O}">{@Odds_8_O}</a></td>
      <td nowrap="nowrap" class="{%Changed_8}"><a class="{@Odds_8_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','a','{@Odds_8_U}',8)" name="cvmy" o="{@ODDS_8_U}">{@Odds_8_U}</a></td>
      <td class="breakLine">
        <!-- <a onclick="GetMore(1,'{%MatchId}','{@HomeName}','{@AwayName}',parseInt('{@isParlay}'),'D','{%MUID}','GetSoccerMore',this);return false;" href="#" >{@More}</a> -->
          <!-- <span class="iconOdds fastMarket {@FastMarket_Style}" onclick="OpenFastMarket(this);return false;" title="กลุ่มเป้าหมายด่วน"></span> -->
        <!-- <a href="#" class="btn icon {@SuperLive_Style}" onclick="OpenSuperLive('{%MatchId}');return false;" title="SuperLive">S</a> -->
      </td>
      <td align="center" class="breakLine">{@ScoreMap}{@StatsInfo}</td>
    </tr>
    <!--SMORE_START-->
    <tr><td class="moreBetType tag {@Display_More}" colspan="16">{@MoreData}</td></tr>
    <!--SMORE_END-->
  </tbody>
</table>
<span id="tmplEnd"></span>
</body>
</html>

<?}elseif($_GET['form']=='1F'){?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>Single_Line</title>
  <meta http-equiv="Pragma" content="no-cache" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

</head>

<body>

<table id="tmplTable" class="oddsTable" width="100%" cellpadding="0" cellspacing="0" border="0">
  
<tbody id='tmplHeader'>
  <tr>
    <th nowrap width="6%" rowspan="2" title="<?=$lang_sport[42];?>"><?=$lang_sport[42];?></th>
    <th nowrap rowspan="2" colspan="2" class="even" title="<?=$lang_sport[40];?>"><?=$lang_sport[40];?></th>
    <th nowrap colspan="6" class="tabthup" title="<?=$lang_sport[44];?>"><?=$lang_sport[44];?></th>
                           <th colspan="2" rowspan="2" width="1%" class="even"></th>
  </tr>
  <tr class="tabthdwn">
    <th nowrap width="45" title="<?=$lang_sport[116];?>"><?=$lang_sport[116];?></th>
    <th nowrap width="45" title="<?=$lang_sport[117];?>"><?=$lang_sport[117];?></th>
    <th nowrap width="45" title="<?=$lang_sport[118];?>"><?=$lang_sport[118];?></th>
    <th nowrap width="45" title="<?=$lang_sport[119];?>"><?=$lang_sport[119];?></th>
    <th nowrap width="45" title="<?=$lang_sport[120];?>"><?=$lang_sport[120];?></th>
    <th nowrap width="45" title="<?=$lang_sport[121];?>"><?=$lang_sport[121];?></th>
  </tr>
</tbody>

<tbody id='tmplLeague_L'>
  <tr id="l_{%LeagueId}" onclick="refreshData_L();" style="cursor:pointer">
        <td class="tabtitle"></td>
    <td colspan="8" class="tabtitle">{@FavLeagues}{%LeagueName}</td>
    <td colspan="2" class="tabtitle" align="right">
          <a name="btnRefresh_L" class="btnIcon right disable"><div class="icon-refresh" title="<?=$lang_sport[18];?>"></div></a></td>
  </tr>
</tbody>

<tbody id='tmplLiveMaster'>
    <!--MR_START-->
  <tr id="e_{%MatchId}_{%MatchCount}_1" align="center" class="{@MMRTr_Cls} {@MR_DISP1}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@MMRBgColor}';">
    <td nowrap="nowrap" class="text_time {%Changed_Score}">
      {@GameStatus}
      <b>{%ScoreH}-{%ScoreA}</b>
      <div nowrap style="color:red"><span class="{@TimeSuspendCls}" title="In Running"><b class="IsLive">IR</b></span><span class="{@TimeSuspendCls1}"><b class="{@LiveTimeCls}">{%ShowTime}</b><span style="color:#566C9E">{@InjuryTime}</span></span></div>
    </td>
    <td class="line_unR matchTeamName" align="left"><span class="{@Home_MR_Cls}"><span class="L_liveinfoM_{%MatchId}_H" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'L_liveinfoM_{%MatchId}_H');" onmouseout="javascript:CheckCursorStyle(0,'L_liveinfoM_{%MatchId}_H');">{%HomeName}</span>{@RedCardH}</span>
         -vs- <span class="{@Away_Cls}"><span class="L_liveinfoM_{%MatchId}_A" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'L_liveinfoM_{%MatchId}_A');" onmouseout="javascript:CheckCursorStyle(0,'L_liveinfoM_{%MatchId}_A');">{%AwayName}</span>{@RedCardA}</span></td>
    <td align="right" width="8%">{@Streaming}{@SportRadarInfo}{@LiveChart}{@Favorites}</td>
    <td nowrap="nowrap" class="HdpGoalClass {%Changed_301}">{@Value_301}</td>
    <td nowrap="nowrap" class="UdrDogOddsClass {%Changed_301}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_301}','h','{%Odds_301_H}','301_{%Percentage_301}')">{%Odds_301_H}</a></td>
    <td nowrap="nowrap" class="UdrDogOddsClass {%Changed_301}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_301}','a','{%Odds_301_A}','301_{%Percentage_301}')">{%Odds_301_A}</a></td>
    <td nowrap="nowrap" class="HdpGoalClass {%Changed_302}">{@Goal_302}</td>
    <td nowrap="nowrap" class="UdrDogOddsClass {%Changed_302}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_302}','h','{%Odds_302_O}','302_{%Percentage_302}')">{%Odds_302_O}</a></td>
    <td nowrap="nowrap" class="UdrDogOddsClass {%Changed_302}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_302}','a','{%Odds_302_U}','302_{%Percentage_302}')">{%Odds_302_U}</a></td>
    <td class="breakLine">
      <!-- <span class="{@MR_DISP2}">
              <a href="#" onclick="GetMore(1,'{%MatchId}','{@HomeName}','{@AwayName}',parseInt('{@isParlay}'),'L','{%MUID}','GetSoccerMore',this); return false;" >{@More}</a>
                <span class="iconOdds fastMarket {@FastMarket_Style}" onclick="OpenFastMarket(this);return false;" title="กลุ่มเป้าหมายด่วน"></span>
                <a href="#" class="btn icon {@SuperLive_Style}" onclick="OpenSuperLive('{%MatchId}');return false;" title="SuperLive">S</a>
      </span> -->
        </td>
    <td align="center" class="breakLine">{@ScoreMap}{@StatsInfo}</td>
  </tr>
    <!--MR_END-->
    <!--MY_START-->
  <tr id="e_{%MatchId}_{%MatchCount}" align="center" class="{@Tr_Cls} {@MR_DISP3}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
    <td nowrap="nowrap" class="text_time {%Changed_Score}">
      {@GameStatus}
      <b>{%ScoreH}-{%ScoreA}</b>
      <div nowrap style="color:red"><span class="{@TimeSuspendCls}" title="In Running"><b class="IsLive">IR</b></span><span class="{@TimeSuspendCls1}"><b class="{@LiveTimeCls}">{%ShowTime}</b><span style="color:#566C9E">{@InjuryTime}</span></span></div>
    </td>
    <td class="line_unR matchTeamName" align="left"><span class="{@Home_Cls}"><span class="L_liveinfoM_{%MatchId}_H" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'L_liveinfoM_{%MatchId}_H');" onmouseout="javascript:CheckCursorStyle(0,'L_liveinfoM_{%MatchId}_H');">{%HomeName}</span>{@RedCardH}</span>
         -vs- <span class="{@Away_Cls}"><span class="L_liveinfoM_{%MatchId}_A" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'L_liveinfoM_{%MatchId}_A');" onmouseout="javascript:CheckCursorStyle(0,'L_liveinfoM_{%MatchId}_A');">{%AwayName}</span>{@RedCardA}</span></td>
    <td align="right" width="8%"><span class="{@MR_DISP2}">{@Streaming}{@SportRadarInfo}{@LiveChart}{@Favorites}</span></td>
    <td nowrap="nowrap" class="HdpGoalClass">{%Value_1}</td>
    <td nowrap="nowrap" class="{%Changed_1}"><a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{@Odds_1_H}',1)" name="cvmy" o="{@ODDS_1_H}">{@Odds_1_H}</a></td>
    <td nowrap="nowrap" class="{%Changed_1}"><a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{@Odds_1_A}',1)" name="cvmy" o="{@ODDS_1_A}">{@Odds_1_A}</a></td>
    <td nowrap="nowrap" class="HdpGoalClass}">{%Goal_3}</td>
    <td nowrap="nowrap" class="{%Changed_3}"><a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{@Odds_3_O}',3)" name="cvmy" o="{@ODDS_3_O}">{@Odds_3_O}</a></td>
    <td nowrap="nowrap" class="{%Changed_3}"><a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{@Odds_3_U}',3)" name="cvmy" o="{@ODDS_3_U}">{@Odds_3_U}</a></td>
    <td class="breakLine">
      <!-- <span>
        <a href="#" onclick="GetMore(1,'{%MatchId}','{@HomeName}','{@AwayName}',parseInt('{@isParlay}'),'L','{%MUID}','GetSoccerMore',this); return false;" >{@More}</a>
                <span class="iconOdds fastMarket {@FastMarket_Style}" onclick="OpenFastMarket(this);return false;" title="กลุ่มเป้าหมายด่วน"></span>
        <a href="#" class="btn icon {@SuperLive_Style}" onclick="OpenSuperLive('{%MatchId}');return false;" title="SuperLive">S</a>
      </span> -->
        </td>
    <td align="center" class="breakLine"><span class="{@MR_DISP2}">{@ScoreMap}{@StatsInfo}</span></td>
  </tr>
    <!--MY_END-->
    <!--SMORE_START-->
    <tr><td class="moreBetType tag {@Display_More}" colspan="11">{@MoreData}</td></tr>
    <!--SMORE_END-->
</tbody>

<tbody id='tmplLive'>
  <tr id="e_{%MatchId}_{%MatchCount}" align="center" class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
    <td nowrap="nowrap" class="text_time {%Changed_Score}">
      {@GameStatus}
      <b>{%ScoreH}-{%ScoreA}</b>
      <div nowrap style="color:red"><span class="{@TimeSuspendCls}" title="In Running"><b class="IsLive">IR</b></span><span class="{@TimeSuspendCls1}"><b class="{@LiveTimeCls}">{%ShowTime}</b><span style="color:#566C9E">{@InjuryTime}</span></span></div>
    </td>
    <td class="line_unR matchTeamName" align="left"><span class="{@Home_Cls}"><span class="L_liveinfoM_{%MatchId}_H" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'L_liveinfoM_{%MatchId}_H');" onmouseout="javascript:CheckCursorStyle(0,'L_liveinfoM_{%MatchId}_H');">{%HomeName}</span>{@RedCardH}</span>
         -vs- <span class="{@Away_Cls}"><span class="L_liveinfoM_{%MatchId}_A" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'L_liveinfoM_{%MatchId}_A');" onmouseout="javascript:CheckCursorStyle(0,'L_liveinfoM_{%MatchId}_A');">{%AwayName}</span>{@RedCardA}</span></td>
    <td align="right" width="8%">{@Streaming}{@SportRadarInfo}{@LiveChart}{@Favorites}</td>
    <td nowrap="nowrap" class="HdpGoalClass">{%Value_1}</td>
    <td nowrap="nowrap" class="{%Changed_1}"><a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{@Odds_1_H}',1)" name="cvmy" o="{@ODDS_1_H}">{@Odds_1_H}</a></td>
    <td nowrap="nowrap" class="{%Changed_1}"><a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{@Odds_1_A}',1)" name="cvmy" o="{@ODDS_1_A}">{@Odds_1_A}</a></td>
    <td nowrap="nowrap" class="HdpGoalClass">{%Goal_3}</td>
    <td nowrap="nowrap" class="{%Changed_3}"><a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{@Odds_3_O}',3)" name="cvmy" o="{@ODDS_3_O}">{@Odds_3_O}</a></td>
    <td nowrap="nowrap" class="{%Changed_3}"><a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{@Odds_3_U}',3)" name="cvmy" o="{@ODDS_3_U}">{@Odds_3_U}</a></td>
    <td class="breakLine">
          <!-- <a href="#" onclick="GetMore(1,'{%MatchId}','{@HomeName}','{@AwayName}',parseInt('{@isParlay}'),'L','{%MUID}','GetSoccerMore',this); return false;" >{@More}</a> -->
            <!-- <span class="iconOdds fastMarket {@FastMarket_Style}" onclick="OpenFastMarket(this);return false;" title="กลุ่มเป้าหมายด่วน"></span> -->
            <!-- <a href="#" class="btn icon {@SuperLive_Style}" onclick="OpenSuperLive('{%MatchId}');return false;" title="SuperLive">S</a> -->
        </td>
    <td align="center" class="breakLine">{@ScoreMap}{@StatsInfo}</td>
  </tr>
    <!--SMORE_START-->
    <tr><td class="moreBetType tag {@Display_More}" colspan="11">{@MoreData}</td></tr>
    <!--SMORE_END-->
</tbody>

<tbody id='tmplLeague'>
  <tr id="l_{%LeagueId}" onclick="refreshData_D()" style="cursor:pointer">
        <td class="tabtitle"></td>
    <td colspan="8" class="tabtitle indent">{@FavLeagues}{%LeagueName}</td>
    <td colspan="2" class="tabtitle" align="right">
          <a name="btnRefresh_D" class="btnIcon right disable"><div class="icon-refresh" title="<?=$lang_sport[18];?>"></div></a></td>
  </tr>
</tbody>

<tbody id='tmplEventMaster'>
    <!--MR_START-->
  <tr id="e_{%MatchId}_{%MatchCount}_1" align="center" class="{@MMRTr_Cls} {@MR_DISP1}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@MMRBgColor}';">
    <td class="text_time">{%ShowTime}</td>
    <td class="line_unR matchTeamName" align="left"><span class="{@Home_MR_Cls}"><span class="D_liveinfoM_{%MatchId}_H" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'D_liveinfoM_{%MatchId}_H');" onmouseout="javascript:CheckCursorStyle(0,'D_liveinfoM_{%MatchId}_H');">{%HomeName}</span>{@RedCardH}</span>
         -vs- <span class="{@Away_MR_Cls}"><span class="D_liveinfoM_{%MatchId}_A" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'D_liveinfoM_{%MatchId}_A');" onmouseout="javascript:CheckCursorStyle(0,'D_liveinfoM_{%MatchId}_A');">{%AwayName}</span>{@RedCardA}</span></td>
    <td align="right" width="8%">{@Streaming}{@SportRadarInfo}{@LiveChart}{@Favorites}</td>
    <td nowrap="nowrap" class="HdpGoalClass {%Changed_301}">{@Value_301}</td>
    <td nowrap="nowrap" class="UdrDogOddsClass {%Changed_301}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_301}','h','{%Odds_301_H}','301_{%Percentage_301}')">{%Odds_301_H}</a></td>
    <td nowrap="nowrap" class="UdrDogOddsClass {%Changed_301}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_301}','a','{%Odds_301_A}','301_{%Percentage_301}')">{%Odds_301_A}</a></td>
    <td nowrap="nowrap" class="HdpGoalClass {%Changed_302}">{@Goal_302}</td>
    <td nowrap="nowrap" class="UdrDogOddsClass {%Changed_302}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_302}','h','{%Odds_302_O}','302_{%Percentage_302}')">{%Odds_302_O}</a></td>
    <td nowrap="nowrap" class="UdrDogOddsClass {%Changed_302}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_302}','a','{%Odds_302_U}','302_{%Percentage_302}')">{%Odds_302_U}</a></td>
    <td class="breakLine">
    <!--   <span class="{@MR_DISP2}">
              <a href="#" onclick="GetMore(1,'{%MatchId}','{@HomeName}','{@AwayName}',parseInt('{@isParlay}'),'D','{%MUID}','GetSoccerMore',this); return false;" >{@More}</a>
                <span class="iconOdds fastMarket {@FastMarket_Style}" onclick="OpenFastMarket(this);return false;" title="กลุ่มเป้าหมายด่วน"></span>
                <a href="#" class="btn icon {@SuperLive_Style}" onclick="OpenSuperLive('{%MatchId}');return false;" title="SuperLive">S</a>
      </span> -->
        </td>
    <td align="center" class="breakLine">{@ScoreMap}{@StatsInfo}</td>
  </tr>
    <!--MR_END-->
    <!--MY_START-->
  <tr id="e_{%MatchId}_{%MatchCount}" align="center" class="{@Tr_Cls} {@MR_DISP3}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
    <td class="text_time">{%ShowTime}</td>
    <td class="line_unR matchTeamName" align="left"><span class="{@Home_Cls}"><span class="D_liveinfoM_{%MatchId}_H" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'D_liveinfoM_{%MatchId}_H');" onmouseout="javascript:CheckCursorStyle(0,'D_liveinfoM_{%MatchId}_H');">{%HomeName}</span>{@RedCardH}</span>
         -vs- <span class="{@Away_Cls}"><span class="D_liveinfoM_{%MatchId}_A" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'D_liveinfoM_{%MatchId}_A');" onmouseout="javascript:CheckCursorStyle(0,'D_liveinfoM_{%MatchId}_A');">{%AwayName}</span>{@RedCardA}</span></td>
    <td align="right" width="8%"><span class="{@MR_DISP2}">{@Streaming}{@SportRadarInfo}{@LiveChart}{@Favorites}</span></td>
    <td nowrap="nowrap" class="HdpGoalClass">{%Value_1}</td>
    <td nowrap="nowrap" class="{%Changed_1}"><a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{@Odds_1_H}',1)" name="cvmy" o="{@ODDS_1_H}">{@Odds_1_H}</a></td>
    <td nowrap="nowrap" class="{%Changed_1}"><a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{@Odds_1_A}',1)" name="cvmy" o="{@ODDS_1_A}">{@Odds_1_A}</a></td>
    <td nowrap="nowrap" class="HdpGoalClass">{%Goal_3}</td>
    <td nowrap="nowrap" class="{%Changed_3}"><a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{@Odds_3_O}',3)" name="cvmy" o="{@ODDS_3_O}">{@Odds_3_O}</a></td>
    <td nowrap="nowrap" class="{%Changed_3}"><a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{@Odds_3_U}',3)" name="cvmy" o="{@ODDS_3_U}">{@Odds_3_U}</a></td>
    <td class="breakLine">
    <!--   <span>
        <a href="#" onclick="GetMore(1,'{%MatchId}','{@HomeName}','{@AwayName}',parseInt('{@isParlay}'),'D','{%MUID}','GetSoccerMore',this); return false;" >{@More}</a>
                <span class="iconOdds fastMarket {@FastMarket_Style}" onclick="OpenFastMarket(this);return false;" title="กลุ่มเป้าหมายด่วน"></span>
        <a href="#" class="btn icon {@SuperLive_Style}" onclick="OpenSuperLive('{%MatchId}');return false;" title="SuperLive">S</a>
      </span> -->
        </td>
    <td align="center" class="breakLine"><span class="{@MR_DISP2}">{@ScoreMap}{@StatsInfo}</span></td>
  </tr>
    <!--MY_END-->
    <!--SMORE_START-->
    <tr><td class="moreBetType tag {@Display_More}" colspan="11">{@MoreData}</td></tr>
    <!--SMORE_END-->
</tbody>


<tbody id='tmplEvent'>
  <tr id="e_{%MatchId}_{%MatchCount}" align="center" class="{@Tr_Cls} {@MR_DISP3}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
    <td class="text_time">{%ShowTime}</td>
    <td class="line_unR matchTeamName" align="left"><span class="{@Home_Cls}"><span class="D_liveinfoM_{%MatchId}_H" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'D_liveinfoM_{%MatchId}_H');" onmouseout="javascript:CheckCursorStyle(0,'D_liveinfoM_{%MatchId}_H');">{%HomeName}</span>{@RedCardH}</span>
         -vs- <span class="{@Away_Cls}"><span class="D_liveinfoM_{%MatchId}_A" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'D_liveinfoM_{%MatchId}_A');" onmouseout="javascript:CheckCursorStyle(0,'D_liveinfoM_{%MatchId}_A');">{%AwayName}</span>{@RedCardA}</span></td>
    <td align="right" width="8%"><span class="{@MR_DISP2}">{@Streaming}{@SportRadarInfo}{@LiveChart}{@Favorites}</span></td>
    <td nowrap="nowrap" class="HdpGoalClass">{%Value_1}</td>
    <td nowrap="nowrap" class="{%Changed_1}"><a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{@Odds_1_H}',1)" name="cvmy" o="{@ODDS_1_H}">{@Odds_1_H}</a></td>
    <td nowrap="nowrap" class="{%Changed_1}"><a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{@Odds_1_A}',1)" name="cvmy" o="{@ODDS_1_A}">{@Odds_1_A}</a></td>
    <td nowrap="nowrap" class="HdpGoalClass">{%Goal_3}</td>
    <td nowrap="nowrap" class="{%Changed_3}"><a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{@Odds_3_O}',3)" name="cvmy" o="{@ODDS_3_O}">{@Odds_3_O}</a></td>
    <td nowrap="nowrap" class="{%Changed_3}"><a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{@Odds_3_U}',3)" name="cvmy" o="{@ODDS_3_U}">{@Odds_3_U}</a></td>
    <td class="breakLine">
      <!-- <span class="{@MR_DISP2}">
        <a href="#" onclick="GetMore(1,'{%MatchId}','{@HomeName}','{@AwayName}',parseInt('{@isParlay}'),'D','{%MUID}','GetSoccerMore',this); return false;" >{@More}</a>
                <span class="iconOdds fastMarket {@FastMarket_Style}" onclick="OpenFastMarket(this);return false;" title="กลุ่มเป้าหมายด่วน"></span>
        <a href="#" class="btn icon {@SuperLive_Style}" onclick="OpenSuperLive('{%MatchId}');return false;" title="SuperLive">S</a>
      </span> -->
        </td>
    <td align="center" class="breakLine">{@ScoreMap}{@StatsInfo}</td>
  </tr>
    <!--SMORE_START-->
    <tr><td class="moreBetType tag {@Display_More}" colspan="11">{@MoreData}</td></tr>
    <!--SMORE_END-->
</tbody>

</table>

<span id="tmplEnd"></span>
</body>
</html>

<?}elseif($_GET['form']=='3'){?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Double_Line</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

</head>
<body onload="window.top.hash_TmplLoaded['UnderOver_tmpl_3']=true">
<table id="tmplTable" class="oddsTable" width="100%" cellpadding="0" cellspacing="0" border="0">
  <tbody id='tmplHeader'>
    <tr>
      <th width="6%" nowrap><?=$lang_sport[42];?></th>
      <th width="34%" colspan="2" align="left" class="even"><?=$lang_sport[40];?></th>
      <th style="min-width:78px;max-width:90px;" nowrap="nowrap" class="text-ellipsis" title="<?=$lang_sport[122];?>">FT. HDP</th>
      <th style="min-width:78px;max-width:90px;" nowrap="nowrap" class="text-ellipsis" title="<?=$lang_sport[123];?>">FT. O/U</th>
      <th style="min-width:48px;max-width:60px;" nowrap="nowrap" class="text-ellipsis" title="<?=$lang_sport[124];?>">FT. 1X2</th>
      <th style="min-width:78px;max-width:90px;" nowrap="nowrap" class="even tabt_L text-ellipsis" title="<?=$lang_sport[125];?>">1H. HDP</th>
      <th style="min-width:78px;max-width:90px;" nowrap="nowrap" class="even text-ellipsis" title="<?=$lang_sport[126];?>">1H. O/U</th>
      <th style="min-width:48px;max-width:60px;" nowrap="nowrap" class="even text-ellipsis" title="<?=$lang_sport[127];?>">1H. 1X2</th>
      <th width="1%" nowrap="nowrap"></th>
    </tr>
  </tbody>
  <tbody id="tmplLeague_L">
    <tr id="l_{%LeagueId}" valign="middle" onclick="refreshData_L();" style="cursor:pointer">
      <td class="tabtitle"></td>
      <td colspan="8" valign="middle" class="tabtitle">{@FavLeagues}{%LeagueName}</td>
      <td colspan="1" class="tabtitle" align="right"><a name="btnRefresh_L" class="btnIcon right disable"><div class="icon-refresh" title="<?=$lang_sport[18];?>"></div></a></td>
    </tr>
  </tbody>
  <tbody id="tmplLiveMaster">
    <!--MR_START-->
    <tr id="e_{%MatchId}_{%MatchCount}_3" class="{@MMRTr_Cls} {@MR_DISP1}" onmouseover="MMRchangeBGColor3_over(this,'e_{%MatchId}_{%MatchCount}','#f5eeb8');" onmouseout="MMRchangeBGColor3_out('e_{%MatchId}_{%MatchCount}','{@BgColor}','{@MMRBgColor}');">
      <td rowspan="{@MR_rowspan}" nowrap="nowrap" class="text_time {%Changed_Score}">
    {@GameStatus}
    <b>{%ScoreH}-{%ScoreA}</b>
        <div nowrap="nowrap" style="color:red"><span class="{@TimeSuspendCls}" title="In Running"><b class="IsLive">IR</b></span><span class="{@TimeSuspendCls1}"><b class="{@LiveTimeCls}">{%ShowTime}</b><span style="color:#566C9E">{@InjuryTime}</span></span></div></td>
      <td rowspan="{@MR_rowspan}" valign="top" class="line_unR"><div class="{@Home_MR_Cls}"><span class="L_liveinfoM_{%MatchId}_H" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'L_liveinfoM_{%MatchId}_H');" onmouseout="javascript:CheckCursorStyle(0,'L_liveinfoM_{%MatchId}_H');">{%HomeName}</span>{@RedCardH}</div>
        <div class="{@Away_MR_Cls}"><span class="L_liveinfoM_{%MatchId}_A" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'L_liveinfoM_{%MatchId}_A');" onmouseout="javascript:CheckCursorStyle(0,'L_liveinfoM_{%MatchId}_A');">{%AwayName}</span>{@RedCardA}</div>
      </td>
      <td rowspan="{@MR_rowspan}" align="right" nowrap="nowrap">{@Streaming}{@SportRadarInfo}{@LiveChart}{@Favorites}</td>
      <td valign="top" class="{@MR_dline} none_rline"><div class="line_divL HdpGoalClass {%Changed_301}">{@Value_301_H}<br/>
          {@Value_301_A}</div>
        <div class="line_divR OddsDiv {%Changed_301}"> <a class="UdrDogOddsClass" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_301}','h','{%Odds_301_H}','301_{%Percentage_301}')">{%Odds_301_H}</a><br/>
          <a class="UdrDogOddsClass" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3011}','a','{%Odds_301_A}','301_{%Percentage_301}')">{%Odds_301_A}</a><br/>
        </div></td>
      <td  valign="top" class="{@MR_dline} none_rline"><div class="line_divL HdpGoalClass {%Changed_302}">{@Goal_302}<br/>
          {@UNDER_302}</div>
        <div class="line_divR OddsDiv {%Changed_302}"> <a class="UdrDogOddsClass" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_302}','h','{%Odds_302_O}','302_{%Percentage_302}')">{%Odds_302_O}</a><br/>
          <a class="UdrDogOddsClass" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_302}','a','{%Odds_302_U}','302_{%Percentage_302}')">{%Odds_302_U}</a><br/>
        </div></td>
      <td rowspan="{@MR_rowspan}" valign="top" align="right" class="tabt_R"></td>
      <td valign="top" class="{@MR_dline} none_rline"><div class="line_divL HdpGoalClass {%Changed_303}">{@Value_303_H}<br/>
          {@Value_303_A}</div>
        <div class="line_divR OddsDiv {%Changed_303}"> <a class="UdrDogOddsClass" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_303}','h','{%Odds_303_H}','303_{%Percentage_303}')">{%Odds_303_H}</a><br/>
          <a class="UdrDogOddsClass" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_303}','a','{%Odds_303_A}','303_{%Percentage_303}')">{%Odds_303_A}</a><br/>
        </div></td>
      <td valign="top" class="{@MR_dline} none_rline"><div class="line_divL HdpGoalClass {%Changed_304}">{@Goal_304}<br/>
          {@UNDER_304}</div>
        <div class="line_divR OddsDiv {%Changed_304}"> <a class="UdrDogOddsClass" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_304}','h','{%Odds_304_O}','304_{%Percentage_304}')">{%Odds_304_O}</a><br/>
          <a class="UdrDogOddsClass" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_304}','a','{%Odds_304_U}','304_{%Percentage_304}')">{%Odds_304_U}</a><br/>
        </div></td>
      <td rowspan="{@MR_rowspan}" valign="top" align="right"></td>
      <td rowspan="{@MR_rowspan}" align="center" class="breakLine">{@ScoreMap}{@StatsInfo}</td>
    </tr>
    <!--MR_END-->
    <!--MY_START-->
    <tr id="e_{%MatchId}_{%MatchCount}_1" class="{@Tr_Cls} {@MR_DISP3}" onmouseover="MMRchangeBGColor3_over(this,'e_{%MatchId}_{%MatchCount}','#f5eeb8');" onmouseout="MMRchangeBGColor3_out('e_{%MatchId}_{%MatchCount}','{@BgColor}','{@MMRBgColor}');">
      <td rowspan="{@MY_rowspan}" nowrap="nowrap" class="text_time {%Changed_Score}">
    {@GameStatus}
    <b>{%ScoreH}-{%ScoreA}</b>
        <div nowrap="nowrap" style="color:red"><span class="{@TimeSuspendCls}" title="In Running"><b class="IsLive">IR</b></span><span class="{@TimeSuspendCls1}"><b class="{@LiveTimeCls}">{%ShowTime}</b><span style="color:#566C9E">{@InjuryTime}</span></span></div></td>
      <td rowspan="{@MY_rowspan}" valign="top" class="line_unR"><div class="{@Home_Cls}"><span class="L_liveinfoM_{%MatchId}_H" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'L_liveinfoM_{%MatchId}_H');" onmouseout="javascript:CheckCursorStyle(0,'L_liveinfoM_{%MatchId}_H');">{%HomeName}</span>{@RedCardH}</div>
        <div class="{@Away_Cls}"><span class="L_liveinfoM_{%MatchId}_A" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'L_liveinfoM_{%MatchId}_A');" onmouseout="javascript:CheckCursorStyle(0,'L_liveinfoM_{%MatchId}_A');">{%AwayName}</span>{@RedCardA}</div>
        {@Draw} </td>
      <td rowspan="{@MY_rowspan}" align="right" nowrap="nowrap"><span class="{@MR_DISP2}">{@Streaming}{@SportRadarInfo}{@LiveChart}{@Favorites}</span></td>
      <td valign="top" class="none_rline {@MY_dline}"><div class="line_divL HdpGoalClass">{@Value_1_H}<br/>
          {@Value_1_A}</div>
        <div class="line_divR OddsDiv {%Changed_1}"> <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{@Odds_1_H}',1)" name="cvmy" o="{@ODDS_1_H}">{@Odds_1_H}</a><br/>
          <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{@Odds_1_A}',1)"  name="cvmy" o="{@ODDS_1_A}">{@Odds_1_A}</a><br/>
        </div></td>
      <td  valign="top" class="none_rline {@MY_dline}"><div class="line_divL HdpGoalClass">{%Goal_3}<br/>
          {@UNDER_3}</div>
        <div class="line_divR OddsDiv {%Changed_3}"> <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{@Odds_3_O}',3)"  name="cvmy" o="{@ODDS_3_O}">{@Odds_3_O}</a><br/>
          <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{@Odds_3_U}',3)"  name="cvmy" o="{@ODDS_3_U}">{@Odds_3_U}</a><br/>
        </div></td>
      <td rowspan="{@MY_rowspan}" valign="top" align="right" class="tabt_R"><div class="line_divL line_divR UdrDogOddsClass {%Changed_5}"> <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_5}','1','{%Odds_5_1}',5)">{%Odds_5_1}</a><br/>
          <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_5}','2','{%Odds_5_2}',5)">{%Odds_5_2}</a><br/>
          <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_5}','X','{%Odds_5_X}',5)">{%Odds_5_X}</a> </div></td>
      <td rowspan="{@MY_rowspan}" valign="top" class="none_rline"><div class="line_divL HdpGoalClass">{@Value_7_H}<br/>
          {@Value_7_A}</div>
        <div class="line_divR OddsDiv {%Changed_7}"> <a class="{@Odds_7_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','h','{@Odds_7_H}',7)"  name="cvmy" o="{@ODDS_7_H}">{@Odds_7_H}</a><br/>
          <a class="{@Odds_7_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','a','{@Odds_7_A}',7)"  name="cvmy" o="{@ODDS_7_A}">{@Odds_7_A}</a><br/>
        </div></td>
      <td rowspan="{@MY_rowspan}" valign="top" class="none_rline"><div class="line_divL HdpGoalClass">{%Goal_8}<br/>
          {@UNDER_8}</div>
        <div class="line_divR OddsDiv {%Changed_8}"> <a class="{@Odds_8_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','h','{@Odds_8_O}',8)"  name="cvmy" o="{@ODDS_8_O}">{@Odds_8_O}</a><br/>
          <a class="{@Odds_8_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','a','{@Odds_8_U}',8)"  name="cvmy" o="{@ODDS_8_U}">{@Odds_8_U}</a><br/>
        </div></td>
      <td rowspan="{@MY_rowspan}" valign="top" align="right"><div class="line_divL line_divR UdrDogOddsClass {%Changed_15}"> <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_15}','1','{%Odds_15_1}',15)">{%Odds_15_1}</a><br/>
          <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_15}','2','{%Odds_15_2}',15)">{%Odds_15_2}</a><br/>
          <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_15}','X','{%Odds_15_X}',15)">{%Odds_15_X}</a> </div></td>
      <td rowspan="{@MY_rowspan}" align="center" class="breakLine"><span class="{@MR_DISP2}">{@ScoreMap}{@StatsInfo}</span></td>
    </tr>
    <!--MY_END-->
    <!--SMORE_START-->
    <tr id="e_{%MatchId}_{%MatchCount}_2" class="{@MoreTr_Cls}"  onmouseover="MMRchangeBGColor3_over(this,'e_{%MatchId}_{%MatchCount}','#f5eeb8');" onmouseout="MMRchangeBGColor3_out('e_{%MatchId}_{%MatchCount}','{@BgColor}','{@MMRBgColor}');">
      <td colspan="2" align="center" class="none_rline none_lline none_tline">
        <!-- <span class="{@MR_DISP2}">
      <a href="#" onclick="GetMore(1,'{%MatchId}','{@HomeName}','{@AwayName}',parseInt('{@isParlay}'),'L','{%MUID}','GetSoccerMore',this);return false;" class="en_Point {@More_Style}" title="More Bet Types"><span style="width:20px">{@More}</span></a>
            <a href="#" class="btn redBg iconfast {@FastMarket_Style}" onclick="OpenFastMarket(this);return false;" title="กลุ่มเป้าหมายด่วน">Fast</a>
            <a href="#" class="btn {@SuperLive_Style}" onclick="OpenSuperLive('{%MatchId}');return false;" title="SuperLive">SuperLive</a>
        </span> -->
      </td>
    </tr>
    <tr><td class="moreBetType tag {@Display_More}" colspan="10">{@MoreData}</td></tr>
    <!--SMORE_END-->
  </tbody>
  <tbody id="tmplLive">
    <tr id="e_{%MatchId}_{%MatchCount}_1" class="{@Tr_Cls}" onmouseover="changeBGColor2('e_{%MatchId}_{%MatchCount}','#f5eeb8');" onmouseout="changeBGColor2('e_{%MatchId}_{%MatchCount}','{@BgColor}');">
      <td rowspan="{@MY_rowspan}" nowrap="nowrap" class="text_time {%Changed_Score}">
    {@GameStatus}
    <b>{%ScoreH}-{%ScoreA}</b>
        <div nowrap="nowrap" style="color:red"><span class="{@TimeSuspendCls}" title="In Running"><b class="IsLive">IR</b></span><span class="{@TimeSuspendCls1}"><b class="{@LiveTimeCls}">{%ShowTime}</b><span style="color:#566C9E">{@InjuryTime}</span></span></div></td>
      <td rowspan="{@MY_rowspan}" valign="top" class="line_unR"><div class="{@Home_Cls}"><span class="L_liveinfoM_{%MatchId}_H" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'L_liveinfoM_{%MatchId}_H');" onmouseout="javascript:CheckCursorStyle(0,'L_liveinfoM_{%MatchId}_H');">{%HomeName}</span>{@RedCardH}</div>
        <div class="{@Away_Cls}"><span class="L_liveinfoM_{%MatchId}_A" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'L_liveinfoM_{%MatchId}_A');" onmouseout="javascript:CheckCursorStyle(0,'L_liveinfoM_{%MatchId}_A');">{%AwayName}</span>{@RedCardA}</div>
        {@Draw} </td>
      <td rowspan="{@MY_rowspan}" align="right" nowrap="nowrap">{@Streaming}{@SportRadarInfo}{@LiveChart}{@Favorites}</td>
      <td valign="top" class="none_rline {@MY_dline}"><div class="line_divL HdpGoalClass">{@Value_1_H}<br/>
          {@Value_1_A}</div>
        <div class="line_divR OddsDiv {%Changed_1}"> <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{@Odds_1_H}',1)"  name="cvmy" o="{@ODDS_1_H}">{@Odds_1_H}</a><br/>
          <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{@Odds_1_A}',1)"  name="cvmy" o="{@ODDS_1_A}">{@Odds_1_A}</a><br/>
        </div></td>
      <td  valign="top" class="none_rline {@MY_dline}"><div class="line_divL HdpGoalClass">{%Goal_3}<br/>
          {@UNDER_3}</div>
        <div class="line_divR OddsDiv {%Changed_3}"> <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{@Odds_3_O}',3)"  name="cvmy" o="{@ODDS_3_O}">{@Odds_3_O}</a><br/>
          <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{@Odds_3_U}',3)"  name="cvmy" o="{@ODDS_3_U}">{@Odds_3_U}</a><br/>
        </div></td>
      <td rowspan="{@MY_rowspan}" valign="top" align="right" class="tabt_R"><div class="line_divL line_divR UdrDogOddsClass {%Changed_5}"> <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_5}','1','{%Odds_5_1}',5)">{%Odds_5_1}</a><br/>
          <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_5}','2','{%Odds_5_2}',5)">{%Odds_5_2}</a><br/>
          <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_5}','X','{%Odds_5_X}',5)">{%Odds_5_X}</a> </div></td>
      <td rowspan="{@MY_rowspan}" valign="top" class="none_rline"><div class="line_divL HdpGoalClass">{@Value_7_H}<br/>
          {@Value_7_A}</div>
        <div class="line_divR OddsDiv {%Changed_7}"> <a class="{@Odds_7_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','h','{@Odds_7_H}',7)"  name="cvmy" o="{@ODDS_7_H}">{@Odds_7_H}</a><br/>
          <a class="{@Odds_7_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','a','{@Odds_7_A}',7)"  name="cvmy" o="{@ODDS_7_A}">{@Odds_7_A}</a><br/>
        </div></td>
      <td rowspan="{@MY_rowspan}" valign="top" class="none_rline"><div class="line_divL HdpGoalClass">{%Goal_8}<br/>
          {@UNDER_8}</div>
        <div class="line_divR OddsDiv {%Changed_8}"> <a class="{@Odds_8_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','h','{@Odds_8_O}',8)"  name="cvmy" o="{@ODDS_8_O}">{@Odds_8_O}</a><br/>
          <a class="{@Odds_8_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','a','{@Odds_8_U}',8)"  name="cvmy" o="{@ODDS_8_U}">{@Odds_8_U}</a><br/>
        </div></td>
      <td rowspan="{@MY_rowspan}" valign="top" align="right"><div class="line_divL line_divR UdrDogOddsClass {%Changed_15}"> <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_15}','1','{%Odds_15_1}',15)">{%Odds_15_1}</a><br/>
          <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_15}','2','{%Odds_15_2}',15)">{%Odds_15_2}</a><br/>
          <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_15}','X','{%Odds_15_X}',15)">{%Odds_15_X}</a> </div></td>
      <td rowspan="{@MY_rowspan}" align="center" class="breakLine">{@ScoreMap}{@StatsInfo}</td>
    </tr>
    <!--SMORE_START-->
    <tr id="e_{%MatchId}_{%MatchCount}_2" class="{@Tr_Cls}"  onmouseover="changeBGColor2('e_{%MatchId}_{%MatchCount}','#f5eeb8');" onmouseout="changeBGColor2('e_{%MatchId}_{%MatchCount}','{@BgColor}');">
      <td colspan="2" align="center" class="none_rline none_lline none_tline">
      <!-- <a href="#" onclick="GetMore(1,'{%MatchId}','{@HomeName}','{@AwayName}',parseInt('{@isParlay}'),'L','{%MUID}','GetSoccerMore',this);return false;" class="en_Point {@More_Style}" title="More Bet Types"><span style="width:20px">{@More}</span></a> -->
          <!-- <a href="#" class="btn redBg iconfast {@FastMarket_Style}" onclick="OpenFastMarket(this);return false;" title="กลุ่มเป้าหมายด่วน">Fast</a> -->
            <!-- <a href="#" class="btn {@SuperLive_Style}" onclick="OpenSuperLive('{%MatchId}');return false;" title="SuperLive">SuperLive</a> -->
      </td>
    </tr>
    <tr><td class="moreBetType tag {@Display_More}" colspan="10">{@MoreData}</td></tr>
    <!--SMORE_END-->
  </tbody>
  <tbody id="tmplLeague">
    <tr id="l_{%LeagueId}" valign="middle" onclick="refreshData_D();" style="cursor:pointer">
      <td class="tabtitle"></td>
      <td colspan="8" class="tabtitle">{@FavLeagues}{%LeagueName}</td>
      <td colspan="1" class="tabtitle" align="right"><a name="btnRefresh_D" class="btnIcon right disable"><div class="icon-refresh" title="กรุณารอ"></div></a></td>
    </tr>
  </tbody>
  <tbody id="tmplEventMaster">
    <!--MR_START-->
    <tr id="e_{%MatchId}_{%MatchCount}_3" class="{@MMRTr_Cls} {@MR_DISP1}" onmouseover="MMRchangeBGColor3_over(this,'e_{%MatchId}_{%MatchCount}','#f5eeb8');" onmouseout="MMRchangeBGColor3_out('e_{%MatchId}_{%MatchCount}','{@BgColor}','{@MMRBgColor}');">
      <td rowspan="{@MR_rowspan}" class="text_time">{%ShowTime}</td>
      <td rowspan="{@MR_rowspan}" class="line_unR" valign="top"><div class="{@Home_MR_Cls}"><span class="D_liveinfoM_{%MatchId}_H" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'D_liveinfoM_{%MatchId}_H');" onmouseout="javascript:CheckCursorStyle(0,'D_liveinfoM_{%MatchId}_H');">{%HomeName}</span></div>
        <div class="{@Away_MR_Cls}"><span class="D_liveinfoM_{%MatchId}_A" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'D_liveinfoM_{%MatchId}_A');" onmouseout="javascript:CheckCursorStyle(0,'D_liveinfoM_{%MatchId}_A');">{%AwayName}</span></div>
      </td>
      <td rowspan="{@MR_rowspan}" align="right" nowrap="nowrap">{@Streaming}{@SportRadarInfo}{@LiveChart}{@Favorites}</td>
      <td valign="top" class="{@MR_dline} none_rline"><div class="line_divL HdpGoalClass {%Changed_301}">{@Value_301_H}<br/>
          {@Value_301_A}</div>
        <div class="line_divR OddsDiv {%Changed_301}"> <a class="UdrDogOddsClass" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_301}','h','{%Odds_301_H}','301_{%Percentage_301}')">{%Odds_301_H}</a><br/>
          <a class="UdrDogOddsClass" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_301}','a','{%Odds_301_A}','301_{%Percentage_301}')">{%Odds_301_A}</a><br/>
        </div></td>
      <td valign="top" class="{@MR_dline} none_rline"><div class="line_divL HdpGoalClass {%Changed_302}">{@Goal_302}<br/>
          {@UNDER_302}</div>
        <div class="line_divR OddsDiv {%Changed_302}"> <a class="UdrDogOddsClass" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_302}','h','{%Odds_302_O}','302_{%Percentage_302}')">{%Odds_302_O}</a><br/>
          <a class="UdrDogOddsClass" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_302}','a','{%Odds_302_U}','302_{%Percentage_302}')">{%Odds_302_U}</a><br/>
        </div></td>
      <td rowspan="{@MR_rowspan}" align="right" valign="top" class="tabt_R"></td>
      <td valign="top" class="{@MR_dline} none_rline"><div class="line_divL HdpGoalClass {%Changed_303}">{@Value_303_H}<br/>
          {@Value_303_A}</div>
        <div class="line_divR OddsDiv {%Changed_303}"> <a class="UdrDogOddsClass" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_303}','h','{%Odds_303_H}','303_{%Percentage_303}')">{%Odds_303_H}</a><br/>
          <a class="UdrDogOddsClass" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_303}','a','{%Odds_303_A}','303_{%Percentage_303}')">{%Odds_303_A}</a><br/>
        </div></td>
      <td valign="top" class="{@MR_dline} none_rline"><div class="line_divL HdpGoalClass {%Changed_304}">{@Goal_304}<br/>
          {@UNDER_304}</div>
        <div class="line_divR OddsDiv {%Changed_304}"> <a class="UdrDogOddsClass" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_304}','h','{%Odds_304_O}','304_{%Percentage_304}')">{%Odds_304_O}</a><br/>
          <a class="UdrDogOddsClass" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_304}','a','{%Odds_304_U}','304_{%Percentage_304}')">{%Odds_304_U}</a><br/>
        </div></td>
      <td rowspan="{@MR_rowspan}" align="right" valign="top"></td>
      <td rowspan="{@MR_rowspan}" align="center" class="breakLine">{@ScoreMap}{@StatsInfo}</td>
    </tr>
    <!--MR_END-->
    <!--MY_START-->
    <tr id="e_{%MatchId}_{%MatchCount}_1" class="{@Tr_Cls} {@MR_DISP3}" onmouseover="MMRchangeBGColor3_over(this,'e_{%MatchId}_{%MatchCount}','#f5eeb8');" onmouseout="MMRchangeBGColor3_out('e_{%MatchId}_{%MatchCount}','{@BgColor}','{@MMRBgColor}');">
      <td rowspan="{@MY_rowspan}" class="text_time">{%ShowTime}</td>
      <td rowspan="{@MY_rowspan}" class="line_unR" valign="top"><div class="{@Home_Cls}"><span class="D_liveinfoM_{%MatchId}_H" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'D_liveinfoM_{%MatchId}_H');" onmouseout="javascript:CheckCursorStyle(0,'D_liveinfoM_{%MatchId}_H');">{%HomeName}</span></div>
        <div class="{@Away_Cls}"><span class="D_liveinfoM_{%MatchId}_A" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'D_liveinfoM_{%MatchId}_A');" onmouseout="javascript:CheckCursorStyle(0,'D_liveinfoM_{%MatchId}_A');">{%AwayName}</span></div>
        {@Draw} </td>
      <td align="right" rowspan="{@MY_rowspan}" nowrap="nowrap"><span class="{@MR_DISP2}">{@Streaming}{@SportRadarInfo}{@LiveChart}{@Favorites}</span></td>
      <td valign="top" class="none_rline {@MY_dline}"><div class="line_divL HdpGoalClass">{@Value_1_H}<br/>
          {@Value_1_A}</div>
        <div class="line_divR OddsDiv {%Changed_1}"> <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{@Odds_1_H}',1)"  name="cvmy" o="{@ODDS_1_H}">{@Odds_1_H}</a><br/>
          <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{@Odds_1_A}',1)"  name="cvmy" o="{@ODDS_1_A}">{@Odds_1_A}</a><br/>
        </div></td>
      <td valign="top" class="{@MY_dline} none_rline"><div class="line_divL HdpGoalClass">{%Goal_3}<br/>
          {@UNDER_3}</div>
        <div class="line_divR OddsDiv {%Changed_3}"> <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{@Odds_3_O}',3)"  name="cvmy" o="{@ODDS_3_O}">{@Odds_3_O}</a><br/>
          <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{@Odds_3_U}',3)"  name="cvmy" o="{@ODDS_3_U}">{@Odds_3_U}</a><br/>
        </div></td>
      <td rowspan="{@MY_rowspan}" align="right" valign="top" class="tabt_R"><div class="line_divL line_divR UdrDogOddsClass {%Changed_5}"> <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_5}','1','{%Odds_5_1}',5)">{%Odds_5_1}</a><br/>
          <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_5}','2','{%Odds_5_2}',5)">{%Odds_5_2}</a><br/>
          <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_5}','X','{%Odds_5_X}',5)">{%Odds_5_X}</a> </div></td>
      <td valign="top" class="none_rline {@MY_dline}"><div class="line_divL HdpGoalClass">{@Value_7_H}<br/>
          {@Value_7_A}</div>
        <div class="line_divR OddsDiv {%Changed_7}"> <a class="{@Odds_7_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','h','{@Odds_7_H}',7)"  name="cvmy" o="{@ODDS_7_H}">{@Odds_7_H}</a><br/>
          <a class="{@Odds_7_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','a','{@Odds_7_A}',7)"  name="cvmy" o="{@ODDS_7_A}">{@Odds_7_A}</a><br/>
        </div></td>
      <td valign="top" class="{@MY_dline} none_rline"><div class="line_divL HdpGoalClass">{%Goal_8}<br/>
          {@UNDER_8}</div>
        <div class="line_divR OddsDiv {%Changed_8}"> <a class="{@Odds_8_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','h','{@Odds_8_O}',8)"  name="cvmy" o="{@ODDS_8_O}">{@Odds_8_O}</a><br/>
          <a class="{@Odds_8_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','a','{@Odds_8_U}',8)"  name="cvmy" o="{@ODDS_8_U}">{@Odds_8_U}</a><br/>
        </div></td>
      <td rowspan="{@MY_rowspan}" align="right" valign="top"><div class="line_divL line_divR UdrDogOddsClass {%Changed_15}"> <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_15}','1','{%Odds_15_1}',15)">{%Odds_15_1}</a><br/>
          <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_15}','2','{%Odds_15_2}',15)">{%Odds_15_2}</a><br/>
          <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_15}','X','{%Odds_15_X}',15)">{%Odds_15_X}</a> </div></td>
      <td rowspan="{@MY_rowspan}" align="center" class="breakLine"><span class="{@MR_DISP2}">{@ScoreMap}{@StatsInfo}</span></td>
    </tr>
    <!--MY_END-->
    <!--SMORE_START-->
    <tr id="e_{%MatchId}_{%MatchCount}_2" class="{@MoreTr_Cls}" onmouseover="MMRchangeBGColor3_over(this,'e_{%MatchId}_{%MatchCount}','#f5eeb8');" onmouseout="MMRchangeBGColor3_out('e_{%MatchId}_{%MatchCount}','{@BgColor}','{@MMRBgColor}');">
      <td colspan="2" align="center" class="none_rline none_lline none_tline">
        <!-- <span class="{@MR_DISP2}">
            <a href="#" onclick="GetMore(1,'{%MatchId}','{@HomeName}','{@AwayName}',parseInt('{@isParlay}'),'D','{%MUID}','GetSoccerMore',this);return false;" class="en_Point {@More_Style}" title="More Bet Types"><span style="width:20px">{@More}</span></a>
            <a href="#" class="btn redBg iconfast {@FastMarket_Style}" onclick="OpenFastMarket(this);return false;" title="กลุ่มเป้าหมายด่วน">Fast</a>
            <a href="#" class="btn {@SuperLive_Style}" onclick="OpenSuperLive('{%MatchId}');return false;" title="SuperLive">SuperLive</a>
        </span> -->
      </td>
      <td class="none_rline none_tline" colspan="2"></td>
    </tr>
    <tr><td class="moreBetType tag {@Display_More}" colspan="10">{@MoreData}</td></tr>
    <!--SMORE_END-->
  </tbody>
  <tbody id="tmplEvent">
    <tr id="e_{%MatchId}_{%MatchCount}_1" class="{@Tr_Cls}" onmouseover="changeBGColor2('e_{%MatchId}_{%MatchCount}','#f5eeb8');" onmouseout="changeBGColor2('e_{%MatchId}_{%MatchCount}','{@BgColor}');">
      <td rowspan="{@MY_rowspan}" class="text_time">{%ShowTime}</td>
      <td rowspan="{@MY_rowspan}" class="line_unR" valign="top"><div class="{@Home_Cls}"><span class="D_liveinfoM_{%MatchId}_H" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'D_liveinfoM_{%MatchId}_H');" onmouseout="javascript:CheckCursorStyle(0,'D_liveinfoM_{%MatchId}_H');">{%HomeName}</span></div>
        <div class="{@Away_Cls}"><span class="D_liveinfoM_{%MatchId}_A" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'D_liveinfoM_{%MatchId}_A');" onmouseout="javascript:CheckCursorStyle(0,'D_liveinfoM_{%MatchId}_A');">{%AwayName}</span></div>
        {@Draw} </td>
      <td align="right" rowspan="{@MY_rowspan}" nowrap="nowrap">{@Streaming}{@SportRadarInfo}{@LiveChart}{@Favorites}</td>
      <td valign="top" class="none_rline {@MY_dline}"><div class="line_divL HdpGoalClass">{@Value_1_H}<br/>
          {@Value_1_A}</div>
        <div class="line_divR OddsDiv {%Changed_1}"> <a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{@Odds_1_H}',1)"  name="cvmy" o="{@ODDS_1_H}">{@Odds_1_H}</a><br/>
          <a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{@Odds_1_A}',1)"  name="cvmy" o="{@ODDS_1_A}">{@Odds_1_A}</a><br/>
        </div></td>
      <td valign="top" class="{@MY_dline} none_rline"><div class="line_divL HdpGoalClass">{%Goal_3}<br/>
          {@UNDER_3}</div>
        <div class="line_divR OddsDiv {%Changed_3}"> <a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{@Odds_3_O}',3)"  name="cvmy" o="{@ODDS_3_O}">{@Odds_3_O}</a><br/>
          <a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{@Odds_3_U}',3)"  name="cvmy" o="{@ODDS_3_U}">{@Odds_3_U}</a><br/>
        </div></td>
      <td rowspan="{@MY_rowspan}" align="right" valign="top" class="tabt_R"><div class="line_divL line_divR UdrDogOddsClass {%Changed_5}"> <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_5}','1','{%Odds_5_1}',5)">{%Odds_5_1}</a><br/>
          <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_5}','2','{%Odds_5_2}',5)">{%Odds_5_2}</a><br/>
          <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_5}','X','{%Odds_5_X}',5)">{%Odds_5_X}</a> </div></td>
      <td valign="top" class="none_rline {@MY_dline}"><div class="line_divL HdpGoalClass">{@Value_7_H}<br/>
          {@Value_7_A}</div>
        <div class="line_divR OddsDiv {%Changed_7}"> <a class="{@Odds_7_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','h','{@Odds_7_H}',7)"  name="cvmy" o="{@ODDS_7_H}">{@Odds_7_H}</a><br/>
          <a class="{@Odds_7_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','a','{@Odds_7_A}',7)"  name="cvmy" o="{@ODDS_7_A}">{@Odds_7_A}</a><br/>
        </div></td>
      <td valign="top" class="{@MY_dline} none_rline"><div class="line_divL HdpGoalClass">{%Goal_8}<br/>
          {@UNDER_8}</div>
        <div class="line_divR OddsDiv {%Changed_8}"> <a class="{@Odds_8_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','h','{@Odds_8_O}',8)"  name="cvmy" o="{@ODDS_8_O}">{@Odds_8_O}</a><br/>
          <a class="{@Odds_8_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','a','{@Odds_8_U}',8)"  name="cvmy" o="{@ODDS_8_U}">{@Odds_8_U}</a><br/>
        </div></td>
      <td rowspan="{@MY_rowspan}" align="right" valign="top"><div class="line_divL line_divR UdrDogOddsClass {%Changed_15}"> <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_15}','1','{%Odds_15_1}',15)">{%Odds_15_1}</a><br/>
          <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_15}','2','{%Odds_15_2}',15)">{%Odds_15_2}</a><br/>
          <a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_15}','X','{%Odds_15_X}',15)">{%Odds_15_X}</a> </div></td>
      <td rowspan="{@MY_rowspan}" align="center" class="breakLine">{@ScoreMap}{@StatsInfo}</td>
    </tr>
    <!--SMORE_START-->
    <tr id="e_{%MatchId}_{%MatchCount}_2" class="{@Tr_Cls}" onmouseover="changeBGColor2('e_{%MatchId}_{%MatchCount}','#f5eeb8');" onmouseout="changeBGColor2('e_{%MatchId}_{%MatchCount}','{@BgColor}');">
      <td colspan="2" align="center" class="none_rline none_lline none_tline">
        <!-- <a href="#" onclick="GetMore(1,'{%MatchId}','{@HomeName}','{@AwayName}',parseInt('{@isParlay}'),'D','{%MUID}','GetSoccerMore',this);return false;" class="en_Point {@More_Style}" title="More Bet Types"><span style="width:20px">{@More}</span></a> -->
          <!-- <a href="#" class="btn redBg iconfast {@FastMarket_Style}" onclick="OpenFastMarket(this);return false;" title="กลุ่มเป้าหมายด่วน">Fast</a> -->
        <!-- <a href="#" class="btn {@SuperLive_Style}" onclick="OpenSuperLive('{%MatchId}');return false;" title="SuperLive">SuperLive</a> -->
      </td>
      <td class="none_rline none_tline" colspan="2"></td>
    </tr>
    <tr><td class="moreBetType tag {@Display_More}" colspan="10">{@MoreData}</td></tr>
    <!--SMORE_END-->
  </tbody>
</table>
<span id="tmplEnd"></span>
</body>
</html>


<?}else{?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Single_Line</title>
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

</head>
<body>
<table id="tmplTable" class="oddsTable layout-fixed" width="100%" cellpadding="0" cellspacing="0" border="0">
  <tbody id='tmplHeader'>
    <tr class="thead_hdp-ou_single-line">
      <th class="th_time" rowspan="2" title="<?=$lang_sport[42];?>"><span><?=$lang_sport[42];?></span></th>
      <th class="th_event even" rowspan="2" title="<?=$lang_sport[40];?>"><span><?=$lang_sport[40];?></span></th>
      <th class="th_full-time" title="<?=$lang_sport[44];?>" colspan="6"><span><?=$lang_sport[44];?></span></th>
      <th class="th_half-time even" title="<?=$lang_sport[43];?>" colspan="6"><span><?=$lang_sport[43];?></span></th>
      <th class="th_last" rowspan="2"></th>
      <th class="th_last" rowspan="2"></th>
      
    </tr>
    <tr>
      <th title="<?=$lang_sport[116];?>"><span><?=$lang_sport[116];?></span></th>
      <th title="<?=$lang_sport[117];?>"><span><?=$lang_sport[117];?></span></th>
      <th title="<?=$lang_sport[118];?>"><span><?=$lang_sport[118];?></span></th>
      <th title="<?=$lang_sport[119];?>"><span><?=$lang_sport[119];?></span></th>
      <th title="<?=$lang_sport[120];?>"><span><?=$lang_sport[120];?></span></th>
      <th title="<?=$lang_sport[121];?>"><span><?=$lang_sport[121];?></span></th>
      <th class="even" title="<?=$lang_sport[116];?>"><span><?=$lang_sport[116];?></span></th>
      <th class="even" title="<?=$lang_sport[117];?>"><span><?=$lang_sport[117];?></span></th>
      <th class="even" title="<?=$lang_sport[118];?>"><span><?=$lang_sport[118];?></span></th>
      <th class="even" title="<?=$lang_sport[119];?>"><span><?=$lang_sport[119];?></span></th>
      <th class="even" title="<?=$lang_sport[120];?>"><span><?=$lang_sport[120];?></span></th>
      <th class="even" title="<?=$lang_sport[121];?>"><span><?=$lang_sport[121];?></span></th>


    </tr>
  </tbody>
  <tbody id='tmplLeague_L'>
    <tr id="l_{%LeagueId}" onclick="refreshData_L();" style="cursor: pointer">
      <td class="tabtitle"></td>
      <td colspan="13" class="tabtitle">{@FavLeagues}{%LeagueName}</td>
      <td colspan="2" class="tabtitle" align="right" nowrap>
          <a name="btnRefresh_L" class="btnIcon right disable"><div class="icon-refresh" title="<?=$lang_sport[18];?>"></div></a></td>
    </tr>
  </tbody>
  <tbody id='tmplLiveMaster'>
    <!--MR_START-->
    <tr align="center" class="{@MMRTr_Cls} {@MR_DISP1}" onmouseover="this.style.backgroundColor='#f5eeb8';"
                onmouseout="this.style.backgroundColor='{@MMRBgColor}';">
      <td nowrap class="text_time {%Changed_Score}">
    {@GameStatus}
    <b>{%ScoreH}-{%ScoreA}</b>
        <div nowrap style="color: red"> <span class="{@TimeSuspendCls}" title="In Running"><b class="IsLive">IR</b></span><span class="{@TimeSuspendCls1}"><b class="{@LiveTimeCls}">{%ShowTime}</b><span style="color: #566C9E">{@InjuryTime}</span></span></div></td>
      <td align='left' class="line_unR">
      <div class="eventLeft">
          <div class="{@Home_MR_Cls}"><span class="L_liveinfoM_{%MatchId}_H" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'L_liveinfoM_{%MatchId}_H');" onmouseout="javascript:CheckCursorStyle(0,'L_liveinfoM_{%MatchId}_H');">{%HomeName}</span>{@RedCardH}</div>
            <div class="{@Away_MR_Cls}"><span class="L_liveinfoM_{%MatchId}_A" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'L_liveinfoM_{%MatchId}_A');" onmouseout="javascript:CheckCursorStyle(0,'L_liveinfoM_{%MatchId}_A');">{%AwayName}</span>{@RedCardA}</div>
        </div>
        <div class="eventRight">{@Streaming}{@SportRadarInfo}{@LiveChart}{@Favorites}</div>
        </td>
      <!--<td width="8%" align="right">{@Streaming}{@SportRadarInfo}{@LiveChart}{@Favorites}</td>-->
      <td nowrap="nowrap" class="HdpGoalClass {%Changed_301} mmrOdds"> {@Value_301}</td>
      <td nowrap="nowrap" class="UdrDogOddsClass {%Changed_301}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_301}','h','{%Odds_301_H}','301_{%Percentage_301}')">{%Odds_301_H}</a></td>
      <td nowrap="nowrap" class="UdrDogOddsClass {%Changed_301}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_301}','a','{%Odds_301_A}','301_{%Percentage_301}')">{%Odds_301_A}</a></td>
      <td nowrap="nowrap" class="HdpGoalClass {%Changed_302} mmrOdds"> {@Goal_302}</td>
      <td nowrap="nowrap" class="UdrDogOddsClass {%Changed_302}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_302}','h','{%Odds_302_O}','302_{%Percentage_302}')">{%Odds_302_O}</a></td>
      <td nowrap="nowrap" class="UdrDogOddsClass {%Changed_302}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_302}','a','{%Odds_302_U}','302_{%Percentage_302}')">{%Odds_302_U}</a></td>
      <td nowrap="nowrap" class="tabt_L HdpGoalClass {%Changed_303} mmrOdds"> {@Value_303}</td>
      <td nowrap="nowrap" class="UdrDogOddsClass {%Changed_303}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_303}','h','{%Odds_303_H}','303_{%Percentage_303}')">{%Odds_303_H}</a></td>
      <td nowrap="nowrap" class="UdrDogOddsClass {%Changed_303}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_303}','a','{%Odds_303_A}','303_{%Percentage_303}')">{%Odds_303_A}</a></td>
      <td nowrap="nowrap" class="HdpGoalClass {%Changed_304} mmrOdds"> {@Goal_304}</td>
      <td nowrap="nowrap" class="UdrDogOddsClass {%Changed_304}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_304}','h','{%Odds_304_O}','304_{%Percentage_304}')">{%Odds_304_O}</a></td>
      <td nowrap="nowrap" class="UdrDogOddsClass {%Changed_304}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_304}','a','{%Odds_304_U}','304_{%Percentage_304}')">{%Odds_304_U}</a></td>
      <td width="1" class="breakLine">
   <!--  <span class="{@MR_DISP2}">
            <a onclick="GetMore(1,'{%MatchId}','{@HomeName}','{@AwayName}',parseInt('{@isParlay}'),'L','{%MUID}','GetSoccerMore',this);return false;" href="#" >{@More}</a>
            <span class="iconOdds fastMarket {@FastMarket_Style}" onclick="OpenFastMarket(this);return false;" title="กลุ่มเป้าหมายด่วน"></span>
            <a href="#" class="btn icon {@SuperLive_Style}" onclick="OpenSuperLive('{%MatchId}');return false;" title="SuperLive">S</a>
    </span> -->
      </td>
      <td align="center" class="breakLine">{@ScoreMap}{@StatsInfo}</td>
    </tr>
    <!--MR_END-->
    <!--MY_START-->
    <tr align="center" class="{@Tr_Cls} {@MR_DISP3}" onmouseover="this.style.backgroundColor='#f5eeb8';"
                onmouseout="this.style.backgroundColor='{@BgColor}';">
      <td nowrap class="text_time {%Changed_Score}">
    {@GameStatus}
    <b>{%ScoreH}-{%ScoreA}</b>
        <div nowrap style="color: red"> <span class="{@TimeSuspendCls}" title="In Running"><b class="IsLive">IR</b></span><span class="{@TimeSuspendCls1}"><b class="{@LiveTimeCls}">{%ShowTime}</b><span style="color: #566C9E">{@InjuryTime}</span></span></div></td>
      <td align='left' class="line_unR">
        <div class="eventLeft">
      <div class="{@Home_Cls}"><span class="L_liveinfoM_{%MatchId}_H" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'L_liveinfoM_{%MatchId}_H');" onmouseout="javascript:CheckCursorStyle(0,'L_liveinfoM_{%MatchId}_H');">{%HomeName}</span>{@RedCardH}</div>
        <div class="{@Away_Cls}"><span class="L_liveinfoM_{%MatchId}_A" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'L_liveinfoM_{%MatchId}_A');" onmouseout="javascript:CheckCursorStyle(0,'L_liveinfoM_{%MatchId}_A');">{%AwayName}</span>{@RedCardA}</div>
    </div>
        <div class="eventRight">{@Streaming}{@SportRadarInfo}{@LiveChart}{@Favorites}</div>
        </td>
      <!--<td width="8%" align="right">{@Streaming}{@SportRadarInfo}{@LiveChart}{@Favorites}</td>-->
      <td nowrap="nowrap" class="HdpGoalClass"> {%Value_1}</td>
      <td nowrap="nowrap" class="{%Changed_1}"><a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{@Odds_1_H}',1)" name="cvmy" o="{@ODDS_1_H}">{@Odds_1_H}</a></td>
      <td nowrap="nowrap" class="{%Changed_1}"><a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{@Odds_1_A}',1)" name="cvmy" o="{@ODDS_1_A}">{@Odds_1_A}</a></td>
      <td nowrap="nowrap" class="HdpGoalClass"> {%Goal_3}</td>
      <td nowrap="nowrap" class="{%Changed_3}"><a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{@Odds_3_O}',3)" name="cvmy" o="{@ODDS_3_O}">{@Odds_3_O}</a></td>
      <td nowrap="nowrap" class="{%Changed_3}"><a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{@Odds_3_U}',3)" name="cvmy" o="{@ODDS_3_U}">{@Odds_3_U}</a></td>
      <td nowrap="nowrap" class="tabt_L HdpGoalClass"> {%Value_7}</td>
      <td nowrap="nowrap" class="{%Changed_7}"><a class="{@Odds_7_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','h','{@Odds_7_H}',7)" name="cvmy" o="{@ODDS_7_H}">{@Odds_7_H}</a></td>
      <td nowrap="nowrap" class="{%Changed_7}"><a class="{@Odds_7_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','a','{@Odds_7_A}',7)" name="cvmy" o="{@ODDS_7_A}">{@Odds_7_A}</a></td>
      <td nowrap="nowrap" class="HdpGoalClass"> {%Goal_8}</td>
      <td nowrap="nowrap" class="{%Changed_8}"><a class="{@Odds_8_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','h','{@Odds_8_O}',8)" name="cvmy" o="{@ODDS_8_O}">{@Odds_8_O}</a></td>
      <td nowrap="nowrap" class="{%Changed_8}"><a class="{@Odds_8_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','a','{@Odds_8_U}',8)" name="cvmy" o="{@ODDS_8_U}">{@Odds_8_U}</a></td>
      <td width="1" class="breakLine">
    <!-- <span>
      <a onclick="GetMore(1,'{%MatchId}','{@HomeName}','{@AwayName}',parseInt('{@isParlay}'),'L','{%MUID}','GetSoccerMore',this);return false;" href="#" >{@More}</a>
            <span class="iconOdds fastMarket {@FastMarket_Style}" onclick="OpenFastMarket(this);return false;" title="กลุ่มเป้าหมายด่วน"></span>
      <a href="#" class="btn icon {@SuperLive_Style}" onclick="OpenSuperLive('{%MatchId}');return false;" title="SuperLive">S</a>
    </span> -->
      </td>
      <td align="center" class="breakLine"><span class="{@MR_DISP2}">{@ScoreMap}{@StatsInfo}</span></td>
    </tr>
    <!--MY_END-->
    <!--SMORE_START-->
    <tr><td class="moreBetType tag {@Display_More}" colspan="16">{@MoreData}</td></tr>
    <!--SMORE_END-->
  </tbody>
  <tbody id='tmplLive'>
    <tr align="center" class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';"
                onmouseout="this.style.backgroundColor='{@BgColor}';">
      <td nowrap class="text_time {%Changed_Score}">
    {@GameStatus}
    <b>{%ScoreH}-{%ScoreA}</b>
        <div nowrap style="color: red"> <span class="{@TimeSuspendCls}" title="In Running"><b class="IsLive">IR</b></span><span class="{@TimeSuspendCls1}"><b class="{@LiveTimeCls}">{%ShowTime}</b><span style="color: #566C9E">{@InjuryTime}</span></span></div></td>
      <td align='left' class="line_unR">
        <div class="eventLeft">
      <div class="{@Home_Cls}"><span class="L_liveinfoM_{%MatchId}_H" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'L_liveinfoM_{%MatchId}_H');" onmouseout="javascript:CheckCursorStyle(0,'L_liveinfoM_{%MatchId}_H');">{%HomeName}</span>{@RedCardH}</div>
        <div class="{@Away_Cls}"><span class="L_liveinfoM_{%MatchId}_A" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'L_liveinfoM_{%MatchId}_A');" onmouseout="javascript:CheckCursorStyle(0,'L_liveinfoM_{%MatchId}_A');">{%AwayName}</span>{@RedCardA}</div>
        </div>
        <div class="eventRight">{@Streaming}{@SportRadarInfo}{@LiveChart}{@Favorites}</div>
        </td>
      <!--<td width="8%" align="right">{@Streaming}{@SportRadarInfo}{@LiveChart}{@Favorites}</td>-->
      <td nowrap="nowrap" class="HdpGoalClass"> {%Value_1}</td>
      <td nowrap="nowrap" class="{%Changed_1}"><a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{@Odds_1_H}',1)" name="cvmy" o="{@ODDS_1_H}">{@Odds_1_H}</a></td>
      <td nowrap="nowrap" class="{%Changed_1}"><a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{@Odds_1_A}',1)" name="cvmy" o="{@ODDS_1_A}">{@Odds_1_A}</a></td>
      <td nowrap="nowrap" class="HdpGoalClass"> {%Goal_3}</td>
      <td nowrap="nowrap" class="{%Changed_3}"><a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{@Odds_3_O}',3)" name="cvmy" o="{@ODDS_3_O}">{@Odds_3_O}</a></td>
      <td nowrap="nowrap" class="{%Changed_3}"><a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{@Odds_3_U}',3)" name="cvmy" o="{@ODDS_3_U}">{@Odds_3_U}</a></td>
      <td nowrap="nowrap" class="tabt_L HdpGoalClass"> {%Value_7}</td>
      <td nowrap="nowrap" class="{%Changed_7}"><a class="{@Odds_7_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','h','{@Odds_7_H}',7)" name="cvmy" o="{@ODDS_7_H}">{@Odds_7_H}</a></td>
      <td nowrap="nowrap" class="{%Changed_7}"><a class="{@Odds_7_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','a','{@Odds_7_A}',7)" name="cvmy" o="{@ODDS_7_A}">{@Odds_7_A}</a></td>
      <td nowrap="nowrap" class="HdpGoalClass"> {%Goal_8}</td>
      <td nowrap="nowrap" class="{%Changed_8}"><a class="{@Odds_8_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','h','{@Odds_8_O}',8)" name="cvmy" o="{@ODDS_8_O}">{@Odds_8_O}</a></td>
      <td nowrap="nowrap" class="{%Changed_8}"><a class="{@Odds_8_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','a','{@Odds_8_U}',8)" name="cvmy" o="{@ODDS_8_U}">{@Odds_8_U}</a></td>
      <td width="1" class="breakLine">
        <!-- <a onclick="GetMore(1,'{%MatchId}','{@HomeName}','{@AwayName}',parseInt('{@isParlay}'),'L','{%MUID}','GetSoccerMore',this);return false;" href="#" >{@More}</a> -->
          <!-- <span class="iconOdds fastMarket {@FastMarket_Style}" onclick="OpenFastMarket(this);return false;" title="กลุ่มเป้าหมายด่วน"></span> -->
        <!-- <a href="#" class="btn icon {@SuperLive_Style}" onclick="OpenSuperLive('{%MatchId}');return false;" title="SuperLive">S</a> -->
      </td>
      <td align="center" class="breakLine">{@ScoreMap}{@StatsInfo}</td>
    </tr>
    <!--SMORE_START-->
    <tr><td class="moreBetType tag {@Display_More}" colspan="16">{@MoreData}</td></tr>
    <!--SMORE_END-->
  </tbody>
  <tbody id='tmplLeague'>
    <tr id="l_{%LeagueId}" onclick="refreshData_D()" style="cursor: pointer">
      <td class="tabtitle"></td>
      <td colspan="13" class="tabtitle">{@FavLeagues}{%LeagueName}</td>
      <td colspan="2" class="tabtitle" align="right" nowrap>
          <a name="btnRefresh_D" class="btnIcon right disable"><div class="icon-refresh" title="<?=$lang_sport[18];?>"></div></a></td>
    </tr>
  </tbody>
  <tbody id='tmplEventMaster'>
    <!--MR_START-->
    <tr align="center" class="{@MMRTr_Cls} {@MR_DISP1}" onmouseover="this.style.backgroundColor='#f5eeb8';"
                onmouseout="this.style.backgroundColor='{@MMRBgColor}';">
      <td class="text_time"> {%ShowTime}</td>
      <td align='left' class="line_unR">
        <div class="eventLeft">
      <div class="{@Home_MR_Cls}"><span class="D_liveinfoM_{%MatchId}_H" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'D_liveinfoM_{%MatchId}_H');" onmouseout="javascript:CheckCursorStyle(0,'D_liveinfoM_{%MatchId}_H');">{%HomeName}</span></div>
        <div class="{@Away_MR_Cls}"><span class="D_liveinfoM_{%MatchId}_A" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'D_liveinfoM_{%MatchId}_A');" onmouseout="javascript:CheckCursorStyle(0,'D_liveinfoM_{%MatchId}_A');">{%AwayName}</span></div>
        </div>
        <div class="eventRight">{@Streaming}{@SportRadarInfo}{@LiveChart}{@Favorites}</div>
        </td>
      <!--<td width="8%" align="right">{@Streaming}{@SportRadarInfo}{@LiveChart}{@Favorites}</td>-->
      <td nowrap="nowrap" class="HdpGoalClass {%Changed_301} mmrOdds"> {@Value_301}</td>
      <td nowrap="nowrap" class="UdrDogOddsClass {%Changed_301}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_301}','h','{%Odds_301_H}','301_{%Percentage_301}')">{%Odds_301_H}</a></td>
      <td nowrap="nowrap" class="UdrDogOddsClass {%Changed_301}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_301}','a','{%Odds_301_A}','301_{%Percentage_301}')">{%Odds_301_A}</a></td>
      <td nowrap="nowrap" class="HdpGoalClass {%Changed_302} mmrOdds"> {@Goal_302}</td>
      <td nowrap="nowrap" class="UdrDogOddsClass {%Changed_302}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_302}','h','{%Odds_302_O}','302_{%Percentage_302}')">{%Odds_302_O}</a></td>
      <td nowrap="nowrap" class="UdrDogOddsClass {%Changed_302}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_302}','a','{%Odds_302_U}','302_{%Percentage_302}')">{%Odds_302_U}</a></td>
      <td nowrap="nowrap" class="tabt_L HdpGoalClass {%Changed_303} mmrOdds"> {@Value_303}</td>
      <td nowrap="nowrap" class="UdrDogOddsClass {%Changed_303}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_303}','h','{%Odds_303_H}','303_{%Percentage_303}')">{%Odds_303_H}</a></td>
      <td nowrap="nowrap" class="UdrDogOddsClass {%Changed_303}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_303}','a','{%Odds_303_A}','303_{%Percentage_303}')">{%Odds_303_A}</a></td>
      <td nowrap="nowrap" class="HdpGoalClass {%Changed_304} mmrOdds"> {@Goal_304}</td>
      <td nowrap="nowrap" class="UdrDogOddsClass {%Changed_304}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_304}','h','{%Odds_304_O}','304_{%Percentage_304}')">{%Odds_304_O}</a></td>
      <td nowrap="nowrap" class="UdrDogOddsClass {%Changed_304}"><a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_304}','a','{%Odds_304_U}','304_{%Percentage_304}')">{%Odds_304_U}</a></td>
      <td class="breakLine">
   <!--  <span class="{@MR_DISP2}">
            <a onclick="GetMore(1,'{%MatchId}','{@HomeName}','{@AwayName}',parseInt('{@isParlay}'),'D','{%MUID}','GetSoccerMore',this);return false;" href="#" >{@More}</a>
            <span class="iconOdds fastMarket {@FastMarket_Style}" onclick="OpenFastMarket(this);return false;" title="กลุ่มเป้าหมายด่วน"></span>
            <a href="#" class="btn icon {@SuperLive_Style}" onclick="OpenSuperLive('{%MatchId}');return false;" title="SuperLive">S</a>
    </span> -->
      </td>
      <td align="center" class="breakLine">{@ScoreMap}{@StatsInfo}</td>
    </tr>
    <!--MR_END-->
    <!--MY_START-->
    <tr align="center" class="{@Tr_Cls} {@MR_DISP3}" onmouseover="this.style.backgroundColor='#f5eeb8';"
                onmouseout="this.style.backgroundColor='{@BgColor}';">
      <td class="text_time"> {%ShowTime}</td>
      <td align='left' class="line_unR">
        <div class="eventLeft">
      <div class="{@Home_Cls}"><span class="D_liveinfoM_{%MatchId}_H" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'D_liveinfoM_{%MatchId}_H');" onmouseout="javascript:CheckCursorStyle(0,'D_liveinfoM_{%MatchId}_H');">{%HomeName}</span></div>
        <div class="{@Away_Cls}"><span class="D_liveinfoM_{%MatchId}_A" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'D_liveinfoM_{%MatchId}_A');" onmouseout="javascript:CheckCursorStyle(0,'D_liveinfoM_{%MatchId}_A');">{%AwayName}</span></div>
        </div>
        <div class="eventRight">{@Streaming}{@SportRadarInfo}{@LiveChart}{@Favorites}</div>
        </td>
      <!--<td width="8%" align="right">{@Streaming}{@SportRadarInfo}{@LiveChart}{@Favorites}</td>-->
      <td nowrap="nowrap" class="HdpGoalClass"> {%Value_1}</td>
      <td nowrap="nowrap" class="{%Changed_1}"><a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{@Odds_1_H}',1)" name="cvmy" o="{@ODDS_1_H}">{@Odds_1_H}</a></td>
      <td nowrap="nowrap" class="{%Changed_1}"><a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{@Odds_1_A}',1)" name="cvmy" o="{@ODDS_1_A}">{@Odds_1_A}</a></td>
      <td nowrap="nowrap" class="HdpGoalClass"> {%Goal_3}</td>
      <td nowrap="nowrap" class="{%Changed_3}"><a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{@Odds_3_O}',3)" name="cvmy" o="{@ODDS_3_O}">{@Odds_3_O}</a></td>
      <td nowrap="nowrap" class="{%Changed_3}"><a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{@Odds_3_U}',3)" name="cvmy" o="{@ODDS_3_U}">{@Odds_3_U}</a></td>
      <td nowrap="nowrap" class="tabt_L HdpGoalClass"> {%Value_7}</td>
      <td nowrap="nowrap" class="{%Changed_7}"><a class="{@Odds_7_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','h','{@Odds_7_H}',7)" name="cvmy" o="{@ODDS_7_H}">{@Odds_7_H}</a></td>
      <td nowrap="nowrap" class="{%Changed_7}"><a class="{@Odds_7_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','a','{@Odds_7_A}',7)" name="cvmy" o="{@ODDS_7_A}">{@Odds_7_A}</a></td>
      <td nowrap="nowrap" class="HdpGoalClass"> {%Goal_8}</td>
      <td nowrap="nowrap" class="{%Changed_8}"><a class="{@Odds_8_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','h','{@Odds_8_O}',8)" name="cvmy" o="{@ODDS_8_O}">{@Odds_8_O}</a></td>
      <td nowrap="nowrap" class="{%Changed_8}"><a class="{@Odds_8_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','a','{@Odds_8_U}',8)" name="cvmy" o="{@ODDS_8_U}">{@Odds_8_U}</a></td>
      <td class="breakLine">
   <!--  <span>
      <a onclick="GetMore(1,'{%MatchId}','{@HomeName}','{@AwayName}',parseInt('{@isParlay}'),'D','{%MUID}','GetSoccerMore',this);return false;" href="#" >{@More}</a>
            <span class="iconOdds fastMarket {@FastMarket_Style}" onclick="OpenFastMarket(this);return false;" title="กลุ่มเป้าหมายด่วน"></span>
      <a href="#" class="btn icon {@SuperLive_Style}" onclick="OpenSuperLive('{%MatchId}');return false;" title="SuperLive">S</a>
    </span> -->
      </td>
      <td align="center" class="breakLine"><span class="{@MR_DISP2}">{@ScoreMap}{@StatsInfo}</span></td>
    </tr>
    <!--MY_END-->
    <!--SMORE_START-->
    <tr><td class="moreBetType tag {@Display_More}" colspan="16">{@MoreData}</td></tr>
    <!--SMORE_END-->
  </tbody>
  <tbody id='tmplEvent'>
    <tr align="center" class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';"
                onmouseout="this.style.backgroundColor='{@BgColor}';">
      <td class="text_time"> {%ShowTime}</td>
      <td align='left' class="line_unR">
        <div class="eventLeft">
      <div class="{@Home_Cls}"><span class="D_liveinfoM_{%MatchId}_H" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{@AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'D_liveinfoM_{%MatchId}_H');" onmouseout="javascript:CheckCursorStyle(0,'D_liveinfoM_{%MatchId}_H');">{%HomeName}</span></div>
        <div class="{@Away_Cls}"><span class="D_liveinfoM_{%MatchId}_A" onclick="javascript:openLiveInfoMiddle(event,'{%MatchId}','{%SportRadar}', '{%GVType}', '{@HomeName}', '{2AwayName}')" onmouseover="javascript:CheckCursorStyle(1,'D_liveinfoM_{%MatchId}_A');" onmouseout="javascript:CheckCursorStyle(0,'D_liveinfoM_{%MatchId}_A');">{%AwayName}</span></div>
        </div>
        <div class="eventRight">{@Streaming}{@SportRadarInfo}{@LiveChart}{@Favorites}</div>
        </td>
      <!--<td width="8%" align="right">{@Streaming}{@SportRadarInfo}{@LiveChart}{@Favorites}</td>-->
      <td nowrap="nowrap" class="HdpGoalClass"> {%Value_1}</td>
      <td nowrap="nowrap" class="{%Changed_1}"><a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','h','{@Odds_1_H}',1)" name="cvmy" o="{@ODDS_1_H}">{@Odds_1_H}</a></td>
      <td nowrap="nowrap" class="{%Changed_1}"><a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_1}','a','{@Odds_1_A}',1)" name="cvmy" o="{@ODDS_1_A}">{@Odds_1_A}</a></td>
      <td nowrap="nowrap" class="HdpGoalClass"> {%Goal_3}</td>
      <td nowrap="nowrap" class="{%Changed_3}"><a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','h','{@Odds_3_O}',3)" name="cvmy" o="{@ODDS_3_O}">{@Odds_3_O}</a></td>
      <td nowrap="nowrap" class="{%Changed_3}"><a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_3}','a','{@Odds_3_U}',3)" name="cvmy" o="{@ODDS_3_U}">{@Odds_3_U}</a></td>
      <td nowrap="nowrap" class="tabt_L HdpGoalClass"> {%Value_7}</td>
      <td nowrap="nowrap" class="{%Changed_7}"><a class="{@Odds_7_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','h','{@Odds_7_H}',7)" name="cvmy" o="{@ODDS_7_H}">{@Odds_7_H}</a></td>
      <td nowrap="nowrap" class="{%Changed_7}"><a class="{@Odds_7_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_7}','a','{@Odds_7_A}',7)" name="cvmy" o="{@ODDS_7_A}">{@Odds_7_A}</a></td>
      <td nowrap="nowrap" class="HdpGoalClass"> {%Goal_8}</td>
      <td nowrap="nowrap" class="{%Changed_8}"><a class="{@Odds_8_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','h','{@Odds_8_O}',8)" name="cvmy" o="{@ODDS_8_O}">{@Odds_8_O}</a></td>
      <td nowrap="nowrap" class="{%Changed_8}"><a class="{@Odds_8_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_8}','a','{@Odds_8_U}',8)" name="cvmy" o="{@ODDS_8_U}">{@Odds_8_U}</a></td>
      <td class="breakLine">
        <!-- <a onclick="GetMore(1,'{%MatchId}','{@HomeName}','{@AwayName}',parseInt('{@isParlay}'),'D','{%MUID}','GetSoccerMore',this);return false;" href="#" >{@More}</a> -->
          <!-- <span class="iconOdds fastMarket {@FastMarket_Style}" onclick="OpenFastMarket(this);return false;" title="กลุ่มเป้าหมายด่วน"></span> -->
        <!-- <a href="#" class="btn icon {@SuperLive_Style}" onclick="OpenSuperLive('{%MatchId}');return false;" title="SuperLive">S</a> -->
      </td>
      <td align="center" class="breakLine">{@ScoreMap}{@StatsInfo}</td>
    </tr>
    <!--SMORE_START-->
    <tr><td class="moreBetType tag {@Display_More}" colspan="16">{@MoreData}</td></tr>
    <!--SMORE_END-->
  </tbody>
</table>
<span id="tmplEnd"></span>
</body>
</html>


<?}?>

