
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>E Sports Template</title>
</head>
<body>
    <table id="tmplTable" class="oddsTable" width="100%" cellpadding="0" cellspacing="0" border="0">
        <tbody id="tmplHeader_L_43">
            <tr>
              <th width="7%" nowrap="nowrap" class="time" title=" เวลา"> เวลา </th>
              <th colspan="2" align="left" class="event even" title=" รายการ"> รายการ </th>
              <th nowrap="nowrap" class="ml text-ellipsis" width="60px">
                <font title=" ทายผลผู้ชนะหรือทีมที่ชนะ"> ทายผลผู้ชนะหรือทีมที่ชนะ </font>
              </th>
              <th nowrap="nowrap" class="text-ellipsis" width="85px">
                <font title="เต็มเวลา แต้มต่อ">FT. HDP</font>
              </th>
              <th nowrap="nowrap" class="text-ellipsis text-ellipsis" width="85px">
                <font title="เต็มเวลา มากกว่า/น้อยกว่า"> FT. O/U </font>
              </th>
              <th nowrap="nowrap" class="even text-ellipsis ml">
                <font title="Map 1 Moneyline">Map 1 ML</font>
              </th>
              <th nowrap="nowrap" class="even text-ellipsis ml">
                <font title="Map 2 Moneyline">Map 2 ML</font>
              </th>
              <th nowrap="nowrap" class="even text-ellipsis ml">
                <font title="Map 3 Moneyline">Map 3 ML</font>
              </th>
              <th width="1" class="more">
                &nbsp;
              </th>
            </tr>
        </tbody>
		<tbody id="tmplHeader_43">
            <tr>
              <th width="7%" nowrap="nowrap" class="time" title=" เวลา">
                เวลา
              </th>
              <th colspan="2" align="left" class="event even" title=" รายการ">
                รายการ
              </th>
              <th nowrap="nowrap" class="ml text-ellipsis" width="60px">
                <font title=" ทายผลผู้ชนะหรือทีมที่ชนะ">ทายผลผู้ชนะหรือทีมที่ชนะ</font>
              </th>
              <th nowrap="nowrap" class="text-ellipsis" width="85px">
                <font title="เต็มเวลา แต้มต่อ">FT. HDP</font>
              </th>
              <th nowrap="nowrap" class="text-ellipsis text-ellipsis" width="85px">
                <font title="เต็มเวลา มากกว่า/น้อยกว่า">FT. O/U</font>
              </th>
              <th nowrap="nowrap" class="even text-ellipsis ml">
                <font title="Map 1 Moneyline">Map 1 ML</font>
              </th>
              <th nowrap="nowrap" class="even text-ellipsis ml">
                <font title="Map 2 Moneyline">Map 2 ML</font>
              </th>
              <th nowrap="nowrap" class="even text-ellipsis ml">
                <font title="Map 3 Moneyline">Map 3 ML</font>
              </th>
              <th width="1" class="more">
                &nbsp;
              </th>
            </tr>
        </tbody>
		<tbody id="tmplLeague_L_43">
			<tr id="l_{%LeagueId}" onclick="refreshData_L()" style="cursor: pointer">
				<td class="tabtitle"></td>
				<td colspan="7" class="tabtitle"> {@FavLeagues} {@ShowTime-iocn} {%LeagueName} </td>
				<td colspan="2" class="tabtitle" align="right" nowrap>
					<a name="btnRefresh_L" class="btnIcon right disable">
						<div class="icon-refresh" title="กรุณารอ"> </div>
					</a>
				</td>
			</tr>
		</tbody>
		<tbody id="tmplLeague_43">
			<tr id="l_{%LeagueId}" onclick="refreshData_D()" style="cursor: pointer">
				<td class="tabtitle"></td>
				<td colspan="7" class="tabtitle"> {@FavLeagues} {@ShowTime-iocn} {%LeagueName} </td>
				<td colspan="2" class="tabtitle" align="right" nowrap>
					<a name="btnRefresh_D" class="btnIcon right disable">
						<div class="icon-refresh" title="กรุณารอ"> </div>
					</a>
				</td>
			</tr>
		</tbody>
		<tbody id="tmplEvent_43">
            <tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
				<td align="center" class="text_time" valign="middle"> 
					{%ShowTime}
				</td>
				<td class="line_unR" style="width: 130px">
					<div class="{@Home_Cls}">  {%HomeName}</div>
					<div class="{@Away_Cls}"> {%AwayName}</div>
				</td>
				<td align="right" valign="middle" style="white-space: nowrap"> 
					{@SportRadarInfo}{@Streaming}{@Favorites}
				</td>
				<td class="none_rline">
					<div class="line_divL line_divR {%Changed_20}"> 
						<a class="{@Odds_20_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','43,{%OddsId_20}','h','{%Odds_20_H}',20)"> {%Odds_20_H}</a><br />
						<a class="{@Odds_20_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','43,{%OddsId_20}','a','{%Odds_20_A}',20)"> {%Odds_20_A}</a> 
					</div>
				</td>
				<td class="none_rline">
					<div class="line_divL HdpGoalClass"> {@Value_1_H}<br />{@Value_1_A}</div>
					<div class="line_divR OddsDiv {%Changed_1}"> 
						<a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','43,{%OddsId_1}','h','{%Odds_1_H}',1)"> {%Odds_1_H}</a><br />
						<a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','43,{%OddsId_1}','a','{%Odds_1_A}',1)"> {%Odds_1_A}</a>
					</div>
				</td>
				<td>
					<div class="line_divL HdpGoalClass"> {%Goal_3}<br /> {@UNDER_3}</div>
					<div class="line_divR OddsDiv {%Changed_3}"> 
						<a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','43,{%OddsId_3}','h','{%Odds_3_O}',3)"> {%Odds_3_O}</a><br />
						<a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','43,{%OddsId_3}','a','{%Odds_3_U}',3)"> {%Odds_3_U}</a>
					</div>
				</td>
				<td class="tabt_L none_rline">
					<div class="line_divR OddsDiv {@Changed_900101}"> 
						<a class="{@Odds_900101_H_Cls}" href="javascript:bet({@isParlay},'{@MatchId}','43,{@OddsId_900101}','h','{@Odds_900101_H}',9001)"> {@Odds_900101_H}</a><br />
						<a class="{@Odds_900101_A_Cls}" href="javascript:bet({@isParlay},'{@MatchId}','43,{@OddsId_900101}','a','{@Odds_900101_A}',9001)"> {@Odds_900101_A}</a>  
					</div>
				</td>
				<td class="none_rline">
					<div class="line_divR OddsDiv {@Changed_900102}"> 
						<a class="{@Odds_900102_H_Cls}" href="javascript:bet({@isParlay},'{@MatchId}','43,{@OddsId_900102}','h','{@Odds_900102_H}',9001)"> {@Odds_900102_H}</a><br />
						<a class="{@Odds_900102_A_Cls}" href="javascript:bet({@isParlay},'{@MatchId}','43,{@OddsId_900102}','a','{@Odds_900102_A}',9001)"> {@Odds_900102_A}</a>  
					</div>
				</td>
				<td>
					<div class="line_divR OddsDiv {@Changed_900103}"> 
						<a class="{@Odds_900103_H_Cls}" href="javascript:bet({@isParlay},'{@MatchId}','43,{@OddsId_900103}','h','{@Odds_900103_H}',9001)"> {@Odds_900103_H}</a><br />
						<a class="{@Odds_900103_A_Cls}" href="javascript:bet({@isParlay},'{@MatchId}','43,{@OddsId_900103}','a','{@Odds_900103_A}',9001)"> {@Odds_900103_A}</a>  
					</div>
				</td>
				<td align="center">

				</td>
            </tr>
        </tbody>
		<tbody id="tmplEventFooter_43">
			<tr class="{@Tr_Cls} mover{@MatchId}" onmouseover="mover('{@MatchId}','{@Tr_Cls}','trbgov');" onmouseout="mover('{@MatchId}','trbgov','{@Tr_Cls}');">
				<td rowspan="{@rowspan}" align="center" class="text_time" valign="middle"> 
					{%ShowTime}
				</td>
				<td class="line_unR" style="width: 130px">
					<div class="{@Home_Cls}">  {%HomeName}</div>
					<div class="{@Away_Cls}"> {%AwayName}</div>
				</td>
				<td align="right" valign="middle" style="white-space: nowrap"> 
					{@SportRadarInfo}{@Streaming}{@Favorites} 
				</td>
				<td class="none_rline">
					<div class="line_divL line_divR {%Changed_20}"> 
						<a class="{@Odds_20_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','43,{%OddsId_20}','h','{%Odds_20_H}',20)"> {%Odds_20_H}</a><br />
						<a class="{@Odds_20_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','43,{%OddsId_20}','a','{%Odds_20_A}',20)"> {%Odds_20_A}</a> 
					</div>
				</td>
				<td class="none_rline">
					<div class="line_divL HdpGoalClass"> {@Value_1_H}<br />{@Value_1_A}</div>
					<div class="line_divR OddsDiv {%Changed_1}"> 
						<a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','43,{%OddsId_1}','h','{%Odds_1_H}',1)"> {%Odds_1_H}</a><br />
						<a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','43,{%OddsId_1}','a','{%Odds_1_A}',1)"> {%Odds_1_A}</a>
					</div>
				</td>
				<td>
					<div class="line_divL HdpGoalClass"> {%Goal_3}<br /> {@UNDER_3}</div>
					<div class="line_divR OddsDiv {%Changed_3}"> 
						<a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','43,{%OddsId_3}','h','{%Odds_3_O}',3)"> {%Odds_3_O}</a><br />
						<a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','43,{%OddsId_3}','a','{%Odds_3_U}',3)"> {%Odds_3_U}</a>
					</div>
				</td>
				<td class="tabt_L none_rline">
					<div class="line_divR OddsDiv {@Changed_900101}"> 
						<a class="{@Odds_900101_H_Cls}" href="javascript:bet({@isParlay},'{@MatchId}','43,{@OddsId_900101}','h','{@Odds_900101_H}',9001)"> {@Odds_900101_H}</a><br />
						<a class="{@Odds_900101_A_Cls}" href="javascript:bet({@isParlay},'{@MatchId}','43,{@OddsId_900101}','a','{@Odds_900101_A}',9001)"> {@Odds_900101_A}</a>  
					</div>
				</td>
				<td class="none_rline">
					<div class="line_divR OddsDiv {@Changed_900102}"> 
						<a class="{@Odds_900102_H_Cls}" href="javascript:bet({@isParlay},'{@MatchId}','43,{@OddsId_900102}','h','{@Odds_900102_H}',9001)"> {@Odds_900102_H}</a><br />
						<a class="{@Odds_900102_A_Cls}" href="javascript:bet({@isParlay},'{@MatchId}','43,{@OddsId_900102}','a','{@Odds_900102_A}',9001)"> {@Odds_900102_A}</a>  
					</div>
				</td>
				<td>
					<div class="line_divR OddsDiv {@Changed_900103}"> 
						<a class="{@Odds_900103_H_Cls}" href="javascript:bet({@isParlay},'{@MatchId}','43,{@OddsId_900103}','h','{@Odds_900103_H}',9001)"> {@Odds_900103_H}</a><br />
						<a class="{@Odds_900103_A_Cls}" href="javascript:bet({@isParlay},'{@MatchId}','43,{@OddsId_900103}','a','{@Odds_900103_A}',9001)"> {@Odds_900103_A}</a>  
					</div>
				</td>
				<td rowspan="{@rowspan}" align="center">
					<div title="More Bet Types">
                        <!-- <a href="#" onclick="GetMore(43,'{%MatchId}','{@HomeName}','{@AwayName}',parseInt('{@isParlay}'),'D','{%MUID}','GetEsportsMore',this);return false;" class="en_Point {@More_Style}"><span id="MoreCount" name="MoreCount">{@More}</span></a> -->
                    </div>

				</td>
            </tr>
            <tr class="{@Tr_Cls} mover{@MatchId}" onmouseover="mover('{@MatchId}','{@Tr_Cls}','trbgov');" onmouseout="mover('{@MatchId}','trbgov','{@Tr_Cls}');">
              <td id="ExtendArea" class="none_lline moreBetType INoddsTable {@Display_ExtendML}" colspan="8">
				<div class="MoreTable">
					<!--ExtendContent-->
				</div>
              </td>
            </tr>
			<tr class="{@Tr_Cls}">
				<td id="more_{%MatchId}" class="moreBetType tag {@Display_More}" colspan="10"> {@MoreData} </td>
			</tr>
		</tbody>
		<tbody id="tmplLive_43">
			<tr class="{@Tr_Cls}" onmouseover="this.style.backgroundColor='#f5eeb8';" onmouseout="this.style.backgroundColor='{@BgColor}';">
				<td align="center" class="text_time" valign="middle">
 					<div nowrap class="{@LiveTimeCls}"> {@ShowTime}</div>
				</td>
				<td class="line_unR" style="width: 130px">
					<div class="{@Home_Cls}"> {%HomeName}</div>
					<div class="{@Away_Cls}"> {%AwayName}</div>
				</td>
				<td align="right" valign="middle" style="white-space: nowrap"> 
					{@SportRadarInfo}{@Streaming}{@Favorites} 
				</td>
				<td class="none_rline">
					<div class="line_divL line_divR {%Changed_20}"> 
						<a class="{@Odds_20_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','43,{%OddsId_20}','h','{%Odds_20_H}',20)"> {%Odds_20_H}</a><br />
						<a class="{@Odds_20_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','43,{%OddsId_20}','a','{%Odds_20_A}',20)"> {%Odds_20_A}</a> 
					</div>
				</td>
				<td class="none_rline">
					<div class="line_divL HdpGoalClass"> {@Value_1_H}<br />{@Value_1_A}</div>
					<div class="line_divR OddsDiv {%Changed_1}"> 
						<a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','43,{%OddsId_1}','h','{%Odds_1_H}',1)"> {%Odds_1_H}</a><br />
						<a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','43,{%OddsId_1}','a','{%Odds_1_A}',1)"> {%Odds_1_A}</a>
					</div>
				</td>
				<td>
					<div class="line_divL HdpGoalClass"> {%Goal_3}<br /> {@UNDER_3}</div>
					<div class="line_divR OddsDiv {%Changed_3}"> 
						<a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','43,{%OddsId_3}','h','{%Odds_3_O}',3)"> {%Odds_3_O}</a><br />
						<a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','43,{%OddsId_3}','a','{%Odds_3_U}',3)"> {%Odds_3_U}</a>
					</div>
				</td>
				<td class="tabt_L none_rline">
					<div class="line_divR OddsDiv {@Changed_900101}"> 
						<a class="{@Odds_900101_H_Cls}" href="javascript:bet({@isParlay},'{@MatchId}','43,{@OddsId_900101}','h','{@Odds_900101_H}',9001)"> {@Odds_900101_H}</a><br />
						<a class="{@Odds_900101_A_Cls}" href="javascript:bet({@isParlay},'{@MatchId}','43,{@OddsId_900101}','a','{@Odds_900101_A}',9001)"> {@Odds_900101_A}</a>  
					</div>
				</td>
				<td class="none_rline">
					<div class="line_divR OddsDiv {@Changed_900102}"> 
						<a class="{@Odds_900102_H_Cls}" href="javascript:bet({@isParlay},'{@MatchId}','43,{@OddsId_900102}','h','{@Odds_900102_H}',9001)"> {@Odds_900102_H}</a><br />
						<a class="{@Odds_900102_A_Cls}" href="javascript:bet({@isParlay},'{@MatchId}','43,{@OddsId_900102}','a','{@Odds_900102_A}',9001)"> {@Odds_900102_A}</a>  
					</div>
				</td>
				<td>
					<div class="line_divR OddsDiv {@Changed_900103}"> 
						<a class="{@Odds_900103_H_Cls}" href="javascript:bet({@isParlay},'{@MatchId}','43,{@OddsId_900103}','h','{@Odds_900103_H}',9001)"> {@Odds_900103_H}</a><br />
						<a class="{@Odds_900103_A_Cls}" href="javascript:bet({@isParlay},'{@MatchId}','43,{@OddsId_900103}','a','{@Odds_900103_A}',9001)"> {@Odds_900103_A}</a>  
					</div>
				</td>
				<td align="center">

				</td>
            </tr>
		</tbody>
		<tbody id="tmplLiveFooter_43">
			<tr class="{@Tr_Cls} mover{@MatchId}" onmouseover="mover('{@MatchId}','{@Tr_Cls}','trbgov');" onmouseout="mover('{@MatchId}','trbgov','{@Tr_Cls}');">
				<td rowspan="{@rowspan}" align="center" class="text_time" valign="middle"> 
                    <div nowrap class="{@LiveTimeCls}"> {@ShowTime}</div>
				</td>
				<td class="line_unR" style="width: 130px">
					<div class="{@Home_Cls}"> {%HomeName}</div>
					<div class="{@Away_Cls}"> {%AwayName}</div>
				</td>
				<td align="right" valign="middle" style="white-space: nowrap"> 
					{@SportRadarInfo}{@Streaming}{@Favorites} 
				</td>
				<td class="none_rline">
					<div class="line_divL line_divR {%Changed_20}"> 
						<a class="{@Odds_20_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','43,{%OddsId_20}','h','{%Odds_20_H}',20)"> {%Odds_20_H}</a><br />
						<a class="{@Odds_20_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','43,{%OddsId_20}','a','{%Odds_20_A}',20)"> {%Odds_20_A}</a> 
					</div>
				</td>
				<td class="none_rline">
					<div class="line_divL HdpGoalClass"> {@Value_1_H}<br />{@Value_1_A}</div>
					<div class="line_divR OddsDiv {%Changed_1}"> 
						<a class="{@Odds_1_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','43,{%OddsId_1}','h','{%Odds_1_H}',1)"> {%Odds_1_H}</a><br />
						<a class="{@Odds_1_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','43,{%OddsId_1}','a','{%Odds_1_A}',1)"> {%Odds_1_A}</a>
					</div>
				</td>
				<td>
					<div class="line_divL HdpGoalClass"> {%Goal_3}<br /> {@UNDER_3}</div>
					<div class="line_divR OddsDiv {%Changed_3}"> 
						<a class="{@Odds_3_O_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','43,{%OddsId_3}','h','{%Odds_3_O}',3)"> {%Odds_3_O}</a><br />
						<a class="{@Odds_3_U_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','43,{%OddsId_3}','a','{%Odds_3_U}',3)"> {%Odds_3_U}</a>
					</div>
				</td>
				<td class="tabt_L none_rline">
					<div class="line_divR OddsDiv {@Changed_900101}"> 
						<a class="{@Odds_900101_H_Cls}" href="javascript:bet({@isParlay},'{@MatchId}','43,{@OddsId_900101}','h','{@Odds_900101_H}',9001)"> {@Odds_900101_H}</a><br />
						<a class="{@Odds_900101_A_Cls}" href="javascript:bet({@isParlay},'{@MatchId}','43,{@OddsId_900101}','a','{@Odds_900101_A}',9001)"> {@Odds_900101_A}</a>  
					</div>
				</td>
				<td class="none_rline">
					<div class="line_divR OddsDiv {%Changed_900102}"> 
						<a class="{@Odds_900102_H_Cls}" href="javascript:bet({@isParlay},'{@MatchId}','43,{@OddsId_900102}','h','{@Odds_900102_H}',9001)"> {@Odds_900102_H}</a><br />
						<a class="{@Odds_900102_A_Cls}" href="javascript:bet({@isParlay},'{@MatchId}','43,{@OddsId_900102}','a','{@Odds_900102_A}',9001)"> {@Odds_900102_A}</a>  
					</div>
				</td>
				<td>
					<div class="line_divR OddsDiv {@Changed_900103}"> 
						<a class="{@Odds_900103_H_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','43,{@OddsId_900103}','h','{@Odds_900103_H}',9001)"> {@Odds_900103_H}</a><br />
						<a class="{@Odds_900103_A_Cls}" href="javascript:bet({@isParlay},'{%MatchId}','43,{@OddsId_900103}','a','{@Odds_900103_A}',9001)"> {@Odds_900103_A}</a>  
					</div>
				</td>
				<td rowspan="{@rowspan}" align="center">
					<div title="More Bet Types">
                        <!-- <a href="#" onclick="GetMore(43,'{%MatchId}','{@HomeName}','{@AwayName}',parseInt('{@isParlay}'),'L','{%MUID}','GetEsportsMore',this);return false;" class="en_Point {@More_Style}"><span id="MoreCount" name="MoreCount">{@More}</span></a> -->
                    </div>

				</td>
            </tr>
			<tr class="{@Tr_Cls} mover{@MatchId}" onmouseover="mover('{@MatchId}','{@Tr_Cls}','trbgov');" onmouseout="mover('{@MatchId}','trbgov','{@Tr_Cls}');">
              <td id="ExtendArea" class="none_lline moreBetType INoddsTable {@Display_ExtendML}" colspan="8">
				<div class="MoreTable">
					<!--ExtendContent-->
				</div>
              </td>
            </tr>
			<tr class="{@Tr_Cls}">
				<td id="more_{%MatchId}" class="moreBetType tag {@Display_More}" colspan="10"> {@MoreData} </td>
			</tr>
		</tbody>
		<tbody>
			<tr>
				<td id="tmplExtend">
					<table class="oddsTable displayOn {@Inplay}" cellpadding="0" cellspacing="0" width="{@tableLength}" id="tmplExtend">
						<tbody>
							<tr class="tabtitle">
								<td colspan="{@MapCount}"> Maps ML </td>
							</tr>
							<tr>
								<!--ExtendHead-->
							</tr>
							<tr align="center" class="{@Tr_Cls} mover{@MatchId}" onmouseover="mover('{@MatchId}','{@Tr_Cls}','trbgov');" onmouseout="mover('{@MatchId}','trbgov','{@Tr_Cls}');">
								<!--ExtendBetType-->
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
		<tbody>
			<tr id="tmplExtendHead">
				<th class="{@HeadCss}"> <span class="text-ellipsis" title="{@title}">{@MapName}</span></th>
			</tr>
		</tbody>
		<tbody>
			<tr id="tmplExtendBettype">
				<td class="{@OddsChanged}">
					<a class="{@Odds_9001_H_Cls}" href="javascript:bet({@isParlay},'{@MatchId}','43,{@OddsId_9001}','h','{@Odds_9001_H}','9001')"> {@Odds_9001_H}</a><br> 
					<a class="{@Odds_9001_A_Cls}" href="javascript:bet({@isParlay},'{@MatchId}','43,{@OddsId_9001}','a','{@Odds_9001_A}','9001')"> {@Odds_9001_A}</a>
				</td>
			</tr>
		</tbody>
    </table>
	<span id="tmplEnd"></span>
</body>
</html>
