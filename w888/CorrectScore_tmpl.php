
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Correct Score Template</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
    <table id="tmplTable" class="oddsTable" width="100%" cellpadding="0" cellspacing="0" border="0">
        <tbody id='tmplHeader'>
            <tr align="middle" class="OddsValue">
                <th colspan="10" align="left" title="รายการ">
                    รายการ</th>
                <th colspan="6" class="even" title="เวลา">
                    เวลา</th>
                <th>&nbsp;</th>
            </tr>
        </tbody>
        <tbody id='tmplHeader_L'>
            <tr align="middle" class="OddsValue">
                <th colspan="10" align="left" title="รายการ">
                    รายการ</th>
                <th colspan="6" class="even" title="เวลา">
                    เวลา</th>
                <th>&nbsp;</th>
            </tr>
        </tbody>
        <tbody id="tmplLeague_L">
            <tr id="l_{%LeagueId}" bgcolor="#B1B1B1" align="center" onclick="refreshData_L()" style="cursor: pointer">
                <td colspan="13" align="left" class="tabtitle">
                    {@FavLeagues}{%LeagueName}</td>
              <td colspan="4" class="tabtitle" align="right" nowrap><a name="btnRefresh_L" class="btnIcon right disable"><div class="icon-refresh" title="กรุณารอ"></div></a></td>
            </tr>
        </tbody>
        <tbody id="tmplLeague">
            <tr id="l_{%LeagueId}" bgcolor="#B1B1B1" align="center" onclick="refreshData_D()" style="cursor: pointer">
                <td colspan="13" align="left" class="tabtitle">
                    {@FavLeagues}{%LeagueName}</td>
              <td colspan="4" class="tabtitle" align="right" nowrap><a name="btnRefresh_D" class="btnIcon right disable"><div class="icon-refresh" title="กรุณารอ"></div></a></td>
            </tr>
        </tbody>
        <tbody id='tmplLive'>
            <tr align="center" valign="middle" bgcolor="#c3c3c3">
                <td colspan="10" align="left">
                    <span class="UdrDogTeamClass">{%HomeName}</span> <span class="text_11BlackB">-vs-</span>
                    <span class="UdrDogTeamClass">{%AwayName}</span>
                </td>
                <td colspan="7" class="text_time">
                    {@GameStatus}
					<b>{@ScoreH}-{@ScoreA}&nbsp;&nbsp;<font class="{@LiveTimeCls}">{%ShowTime}</font></b></td>
            </tr>
            <tr align="center" valign="middle" class="live text_11Black">
                <td width="44" class="none_rline">
                    1-0</td>
                <td width="44" class="none_rline">
                    2-0</td>
                <td width="44" class="none_rline">
                    2-1</td>
                <td width="44" class="none_rline">
                    3-0</td>
                <td width="44" class="none_rline">
                    3-1</td>
                <td width="44" class="none_rline">
                    3-2</td>
                <td width="44" class="none_rline">
                    4-0</td>
                <td width="44" class="none_rline">
                    4-1</td>
                <td width="44" class="none_rline">
                    4-2</td>
                <td width="44">
                    4-3</td>
                <td width="40" class="none_rline">
                    0-0</td>
                <td width="40" class="none_rline">
                    1-1</td>
                <td width="40" class="none_rline">
                    2-2</td>
                <td width="40" class="none_rline">
                    3-3</td>
                <td width="40" class="none_rline">
                    4-4</td>
                     <td width="46" title="คะแนนอื่นใด​">AOS</td>
                <td width="1">&nbsp;
                    </td>
            </tr>
            <tr id="e_{%MatchId}_1" align="center" valign="middle" class="liveligh"
                onmouseover="changeBGColor2('e_{%MatchId}','#f5eeb8');" onmouseout="changeBGColor2('e_{%MatchId}','#ffddd2');">
                <td width="44" height="18" class="none_rline {%Changed_413}">
                    {@Odds_413_10}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','1:0','{%Odds_413_10}',413)" class="UdrDogOddsClass {@Odds_413D_10}">
                        {%Odds_413_10}</a></td>
                <td width="44" class="none_rline {%Changed_413}">
                    {@Odds_413_20}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','2:0','{%Odds_413_20}',413)" class="UdrDogOddsClass {@Odds_413D_20}">
                        {%Odds_413_20}</a></td>
                <td width="44" class="none_rline {%Changed_413}">
                    {@Odds_413_21}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','2:1','{%Odds_413_21}',413)" class="UdrDogOddsClass {@Odds_413D_21}">
                        {%Odds_413_21}</a></td>
                <td width="44" class="none_rline {%Changed_413}">
                    {@Odds_413_30}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','3:0','{%Odds_413_30}',413)" class="UdrDogOddsClass {@Odds_413D_30}">
                        {%Odds_413_30}</a></td>
                <td width="44" class="none_rline {%Changed_413}">
                    {@Odds_413_31}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','3:1','{%Odds_413_31}',413)" class="UdrDogOddsClass {@Odds_413D_31}">
                        {%Odds_413_31}</a></td>
                <td width="44" class="none_rline {%Changed_413}">
                    {@Odds_413_32}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','3:2','{%Odds_413_32}',413)" class="UdrDogOddsClass {@Odds_413D_32}">
                        {%Odds_413_32}</a></td>
                <td width="44" class="none_rline {%Changed_413}">
                    {@Odds_413_40}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','4:0','{%Odds_413_40}',413)" class="UdrDogOddsClass {@Odds_413D_40}">
                        {%Odds_413_40}</a></td>
                <td width="44" class="none_rline {%Changed_413}">
                    {@Odds_413_41}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','4:1','{%Odds_413_41}',413)" class="UdrDogOddsClass {@Odds_413D_41}">
                        {%Odds_413_41}</a></td>
                <td width="44" class="none_rline {%Changed_413}">
                    {@Odds_413_42}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','4:2','{%Odds_413_42}',413)" class="UdrDogOddsClass {@Odds_413D_42}">
                        {%Odds_413_42}</a></td>
                <td width="44" class="{%Changed_413}">
                    {@Odds_413_43}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','4:3','{%Odds_413_43}',413)" class="UdrDogOddsClass {@Odds_413D_43}">
                        {%Odds_413_43}</a></td>                
                <td rowspan="3" class="none_rline {%Changed_413}" align="center">
                    {@Odds_413_00}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','0:0','{%Odds_413_00}',413)" class="UdrDogOddsClass {@Odds_413D_00}">
                        {%Odds_413_00}</a></td>
                <td rowspan="3" class="none_rline {%Changed_413}">
                    {@Odds_413_11}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','1:1','{%Odds_413_11}',413)" class="UdrDogOddsClass {@Odds_413D_11}">
                        {%Odds_413_11}</a></td>
                <td rowspan="3" class="none_rline {%Changed_413}">
                    {@Odds_413_22}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','2:2','{%Odds_413_22}',413)" class="UdrDogOddsClass {@Odds_413D_22}">
                        {%Odds_413_22}</a></td>
                <td rowspan="3" class="none_rline {%Changed_413}">
                    {@Odds_413_33}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','3:3','{%Odds_413_33}',413)" class="UdrDogOddsClass {@Odds_413D_33}">
                        {%Odds_413_33}</a></td>
                <td rowspan="3" class="none_rline {%Changed_413}">
                    {@Odds_413_44}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','4:4','{%Odds_413_44}',413)" class="UdrDogOddsClass {@Odds_413D_44}">
                        {%Odds_413_44}</a></td>
                <td width="46" rowspan="3" class=" {%Changed_413}">
					{@Odds_413_99}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','AOS','{%Odds_413_99}',413)" class="UdrDogOddsClass {@Odds_413D_99}">
                        {%Odds_413_99}</a></td>
                <td rowspan="3" align="center" valign="middle">{@SportRadarInfo}<br />{@StatsInfo}<br />{@Favorites}</td>
            </tr>
            <tr align="center" valign="middle" class="live text_11Black">
                <td width="44" class="none_rline">
                    0-1</td>
                <td width="44" class="none_rline">
                    0-2</td>
                <td width="44" class="none_rline">
                    1-2</td>
                <td width="44" class="none_rline">
                    0-3</td>
                <td width="44" class="none_rline">
                    1-3</td>
                <td width="44" class="none_rline">
                    2-3</td>
                <td width="44" class="none_rline">
                    0-4</td>
                <td width="44" class="none_rline">
                    1-4</td>
                <td width="44" class="none_rline">
                    2-4</td>
                <td width="44">
                    3-4</td>
            </tr>
            <tr id="e_{%MatchId}_2" align="center" valign="middle" class="liveligh"
                onmouseover="changeBGColor2('e_{%MatchId}','#f5eeb8');" onmouseout="changeBGColor2('e_{%MatchId}','#ffddd2');">
                <td width="44" height="18" class="none_rline {%Changed_413}">
                    {@Odds_413_01}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','0:1','{%Odds_413_01}',413)" class="UdrDogOddsClass {@Odds_413D_01}">
                        {%Odds_413_01}</a></td>
                <td width="44" class="none_rline {%Changed_413}">
                    {@Odds_413_02}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','0:2','{%Odds_413_02}',413)" class="UdrDogOddsClass {@Odds_413D_02}">
                        {%Odds_413_02}</a></td>
                <td width="44" class="none_rline {%Changed_413}">
                    {@Odds_413_12}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','1:2','{%Odds_413_12}',413)" class="UdrDogOddsClass {@Odds_413D_12}">
                        {%Odds_413_12}</a></td>
                <td width="44" class="none_rline {%Changed_413}">
                    {@Odds_413_03}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','0:3','{%Odds_413_03}',413)" class="UdrDogOddsClass {@Odds_413D_03}">
                        {%Odds_413_03}</a></td>
                <td width="44" class="none_rline {%Changed_413}">
                    {@Odds_413_13}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','1:3','{%Odds_413_13}',413)" class="UdrDogOddsClass {@Odds_413D_13}">
                        {%Odds_413_13}</a></td>
                <td width="44" class="none_rline {%Changed_413}">
                    {@Odds_413_23}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','2:3','{%Odds_413_23}',413)" class="UdrDogOddsClass {@Odds_413D_23}">
                        {%Odds_413_23}</a></td>
                <td width="44" class="none_rline {%Changed_413}">
                    {@Odds_413_04}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','0:4','{%Odds_413_04}',413)" class="UdrDogOddsClass {@Odds_413D_04}">
                        {%Odds_413_04}</a></td>
                <td width="44" class="none_rline {%Changed_413}">
                    {@Odds_413_14}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','1:4','{%Odds_413_14}',413)" class="UdrDogOddsClass {@Odds_413D_14}">
                        {%Odds_413_14}</a></td>
                <td width="44" class="none_rline {%Changed_413}">
                    {@Odds_413_24}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','2:4','{%Odds_413_24}',413)" class="UdrDogOddsClass {@Odds_413D_24}">
                        {%Odds_413_24}</a></td>
                <td width="44" class="{%Changed_413}">
                    {@Odds_413_34}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','3:4','{%Odds_413_34}',413)" class="UdrDogOddsClass {@Odds_413D_34}">
                        {%Odds_413_34}</a></td>
            </tr>
        </tbody>
        <tbody id='tmplEvent'>
            <tr align="center" valign="middle" bgcolor="#c3c3c3">
                <td colspan="10" align="left">
                    <span class="UdrDogTeamClass">{%HomeName}</span> <span class="text_11BlackB">-vs-</span>
                    <span class="UdrDogTeamClass">{%AwayName}</span>
                </td>
                <td colspan="7" class="text_time">
                    {%ShowTime}</td>
            </tr>
            <tr align="center" valign="middle" class="bgcpe text_11Black">
                <td width="44" class="none_rline">
                    1-0</td>
                <td width="44" class="none_rline">
                    2-0</td>
                <td width="44" class="none_rline">
                    2-1</td>
                <td width="44" class="none_rline">
                    3-0</td>
                <td width="44" class="none_rline">
                    3-1</td>
                <td width="44" class="none_rline">
                    3-2</td>
                <td width="44" class="none_rline">
                    4-0</td>
                <td width="44" class="none_rline">
                    4-1</td>
                <td width="44" class="none_rline">
                    4-2</td>
                <td width="44">
                    4-3</td>
                <td width="40" class="none_rline">
                    0-0</td>
                <td width="40" class="none_rline">
                    1-1</td>
                <td width="40" class="none_rline">
                    2-2</td>
                <td width="40" class="none_rline">
                    3-3</td>
                <td width="40" class="none_rline">
                    4-4</td>
                     <td width="46" title="คะแนนอื่นใด​">AOS</td>
                <td width="1">&nbsp;
                    </td>
            </tr>
            <tr id="e_{%MatchId}_1" class="bgcpelight" align="center" valign="middle" onmouseover="changeBGColor2('e_{%MatchId}','#F5EEB8');"
                onmouseout="changeBGColor2('e_{%MatchId}','#E4E4E4');">
                <td width="44" height="18" class="none_rline {%Changed_413}">
                    {@Odds_413_10}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','1:0','{%Odds_413_10}',413)" class="UdrDogOddsClass {@Odds_413D_10}">
                        {%Odds_413_10}</a></td>
                <td width="44" class="none_rline {%Changed_413}">
                    {@Odds_413_20}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','2:0','{%Odds_413_20}',413)" class="UdrDogOddsClass {@Odds_413D_20}">
                        {%Odds_413_20}</a></td>
                <td width="44" class="none_rline {%Changed_413}">
                    {@Odds_413_21}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','2:1','{%Odds_413_21}',413)" class="UdrDogOddsClass {@Odds_413D_21}">
                        {%Odds_413_21}</a></td>
                <td width="44" class="none_rline {%Changed_413}">
                    {@Odds_413_30}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','3:0','{%Odds_413_30}',413)" class="UdrDogOddsClass {@Odds_413D_30}">
                        {%Odds_413_30}</a></td>
                <td width="44" class="none_rline {%Changed_413}">
                    {@Odds_413_31}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','3:1','{%Odds_413_31}',413)" class="UdrDogOddsClass {@Odds_413D_31}">
                        {%Odds_413_31}</a></td>
                <td width="44" class="none_rline {%Changed_413}">
                    {@Odds_413_32}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','3:2','{%Odds_413_32}',413)" class="UdrDogOddsClass {@Odds_413D_32}">
                        {%Odds_413_32}</a></td>
                <td width="44" class="none_rline {%Changed_413}">
                    {@Odds_413_40}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','4:0','{%Odds_413_40}',413)" class="UdrDogOddsClass {@Odds_413D_40}">
                        {%Odds_413_40}</a></td>
                <td width="44" class="none_rline {%Changed_413}">
                    {@Odds_413_41}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','4:1','{%Odds_413_41}',413)" class="UdrDogOddsClass {@Odds_413D_41}">
                        {%Odds_413_41}</a></td>
                <td width="44" class="none_rline {%Changed_413}">
                    {@Odds_413_42}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','4:2','{%Odds_413_42}',413)" class="UdrDogOddsClass {@Odds_413D_42}">
                        {%Odds_413_42}</a></td>
                <td width="44" class="{%Changed_413}">
                    {@Odds_413_43}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','4:3','{%Odds_413_43}',413)" class="UdrDogOddsClass {@Odds_413D_43}">
                        {%Odds_413_43}</a></td>                
                <td rowspan="3" class="none_rline {%Changed_413}" align="center">
                    {@Odds_413_00}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','0:0','{%Odds_413_00}',413)" class="UdrDogOddsClass {@Odds_413D_00}">
                        {%Odds_413_00}</a></td>
                <td rowspan="3" class="none_rline {%Changed_413}">
                    {@Odds_413_11}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','1:1','{%Odds_413_11}',413)" class="UdrDogOddsClass {@Odds_413D_11}">
                        {%Odds_413_11}</a></td>
                <td rowspan="3" class="none_rline {%Changed_413}">
                    {@Odds_413_22}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','2:2','{%Odds_413_22}',413)" class="UdrDogOddsClass {@Odds_413D_22}">
                        {%Odds_413_22}</a></td>
                <td rowspan="3" class="none_rline {%Changed_413}">
                    {@Odds_413_33}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','3:3','{%Odds_413_33}',413)" class="UdrDogOddsClass {@Odds_413D_33}">
                        {%Odds_413_33}</a></td>
                <td rowspan="3" class="none_rline {%Changed_413}">
                    {@Odds_413_44}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','4:4','{%Odds_413_44}',413)" class="UdrDogOddsClass {@Odds_413D_44}">
                        {%Odds_413_44}</a></td>
                <td width="46" rowspan="3" class=" {%Changed_413}">
					{@Odds_413_99}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','AOS','{%Odds_413_99}',413)" class="UdrDogOddsClass {@Odds_413D_99}">
                        {%Odds_413_99}</a></td>
                <td rowspan="3" align="center" valign="middle">{@SportRadarInfo}<br />{@StatsInfo}<br />{@Favorites}</td>
            </tr>
            <tr align="center" valign="middle" class="bgcpe text_11Black">
                <td width="44" class="none_rline">
                    0-1</td>
                <td width="44" class="none_rline">
                    0-2</td>
                <td width="44" class="none_rline">
                    1-2</td>
                <td width="44" class="none_rline">
                    0-3</td>
                <td width="44" class="none_rline">
                    1-3</td>
                <td width="44" class="none_rline">
                    2-3</td>
                <td width="44" class="none_rline">
                    0-4</td>
                <td width="44" class="none_rline">
                    1-4</td>
                <td width="44" class="none_rline">
                    2-4</td>
                <td width="44">
                    3-4</td>
            </tr>
            <tr id="e_{%MatchId}_2" class="bgcpelight" align="center" valign="middle" onmouseover="changeBGColor2('e_{%MatchId}','#F5EEB8');"
                onmouseout="changeBGColor2('e_{%MatchId}','#E4E4E4');">
                <td width="44" height="18" class="none_rline {%Changed_413}">
                    {@Odds_413_01}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','0:1','{%Odds_413_01}',413)" class="UdrDogOddsClass {@Odds_413D_01}">
                        {%Odds_413_01}</a></td>
                <td width="44" class="none_rline {%Changed_413}">
                    {@Odds_413_02}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','0:2','{%Odds_413_02}',413)" class="UdrDogOddsClass {@Odds_413D_02}">
                        {%Odds_413_02}</a></td>
                <td width="44" class="none_rline {%Changed_413}">
                    {@Odds_413_12}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','1:2','{%Odds_413_12}',413)" class="UdrDogOddsClass {@Odds_413D_12}">
                        {%Odds_413_12}</a></td>
                <td width="44" class="none_rline {%Changed_413}">
                    {@Odds_413_03}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','0:3','{%Odds_413_03}',413)" class="UdrDogOddsClass {@Odds_413D_03}">
                        {%Odds_413_03}</a></td>
                <td width="44" class="none_rline {%Changed_413}">
                    {@Odds_413_13}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','1:3','{%Odds_413_13}',413)" class="UdrDogOddsClass {@Odds_413D_13}">
                        {%Odds_413_13}</a></td>
                <td width="44" class="none_rline {%Changed_413}">
                    {@Odds_413_23}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','2:3','{%Odds_413_23}',413)" class="UdrDogOddsClass {@Odds_413D_23}">
                        {%Odds_413_23}</a></td>
                <td width="44" class="none_rline {%Changed_413}">
                    {@Odds_413_04}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','0:4','{%Odds_413_04}',413)" class="UdrDogOddsClass {@Odds_413D_04}">
                        {%Odds_413_04}</a></td>
                <td width="44" class="none_rline {%Changed_413}">
                    {@Odds_413_14}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','1:4','{%Odds_413_14}',413)" class="UdrDogOddsClass {@Odds_413D_14}">
                        {%Odds_413_14}</a></td>
                <td width="44" class="none_rline {%Changed_413}">
                    {@Odds_413_24}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','2:4','{%Odds_413_24}',413)" class="UdrDogOddsClass {@Odds_413D_24}">
                        {%Odds_413_24}</a></td>
                <td width="44" class="{%Changed_413}">
                    {@Odds_413_34}<a href="javascript:bet({@isParlay},'{%MatchId}','{%OddsId_413}','3:4','{%Odds_413_34}',413)" class="UdrDogOddsClass {@Odds_413D_34}">
                        {%Odds_413_34}</a></td>
            </tr>
        </tbody>
    </table>
    <span id="tmplEnd"></span>
</body>
</html>
