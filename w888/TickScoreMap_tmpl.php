<?
session_start();
// require('lang/member_lang.php');
  require("lang/variable_lang.php");
?>
<div>
<div id="ScoreMapDivTmpl">

	<div id="ScoreMapDiv">
		<div class="popupW">
		   <div id="ScoreMapTitle" class="popupWTitle">
			  <span>
				 <div class="popWIcon"></div>
				 <div class="popWTitleContain"><div class="text-ellipsis" id="popScoreTitle" style="font-size:12px;"></div></div>
				 <div id="ScoreMapCloser" class="popWClose" title="ปิด"></div>				 
				 <a id="ScoreMapRefresh" class="btnIcon black right" title="รีเฟรช" onClick="parent.topFrame.g_SMF.Refresh(true);">
					<span class="icon-refresh"></span>
				 </a>
			  </span>
		   </div>
		   <div id="ScoreMapContainer" class="popWContain"></div>
		</div>
	</div> 
</div>

<script id="scoremapArea" type="text/x-jquery-tmpl">
<div  class="scoremapArea">
    <div class="popWContain">        
        <div class="popWTableArea">
			<div class="scoremapInfo">
				<span class="iconOdds info" style="cursor: default; background-position: -90px 0px !important;"></span>
				<span class="content">Waiting bet tickets: ${wcount}</span>
				<a onclick="parent.topFrame.g_SMF.removeAllTicket();" class="button right" ><span>Remove All</span></a>
			</div>
{{if (FTTicketList!=null && FTTicketList.length>0) || NowFTScoreMap.Map !=null}}
		    <table width="100%" cellpadding="0" cellspacing="0" border="0" class="oddsTable info">
				<tbody>
				<tr id="sTicket_FT" class="ScoreInfo">
					<td class="tabtitle" colspan="${NowFTScoreMap.HE-NowFTScoreMap.HS+2}" style="border-top-right-radius:0;">
						<span onclick="parent.topFrame.MapControl('FT');" class="icon-arrow"></span>เต็มเวลา
					</td>
					<!--<td class="tabtitle" style="border-top-left-radius:0;">
						<a  onClick="parent.topFrame.g_SMF.Refresh(${MatchID});this.className='btnIcon right disable';" name="btnRefresh" class="btnIcon right" title="รีเฟรช"><div class="icon-refresh" title="รีเฟรช"></div></a> 
					</td> -->
				</tr>
				{{if (FTTicketList!=null && FTTicketList.length>0)}}
				<tr>
				    <td colspan="${NowFTScoreMap.HE-NowFTScoreMap.HS+2}">
						<div class="scoremapList">
							{{each FTTicketList}}
							<div class="BetInfo" {{if $value.Off==0}}onClick="fFrame.topFrame.g_SMF.BetProcess(this,event,'${$value.OddsId}','${$value.BetTeam}','${$value.Odds}','${$value.Stake}');" {{/if}}>
								<div class="TextStyle01 left-cell{{if $value.Off==1}} linethrough{{/if}}" >
									<input {{if $value.Enable}}checked{{/if}} {{if $value.Off==1}}disabled{{/if}} onClick="parent.topFrame.g_SMF.setTicketEnable('${$value.OddsId}','${$value.BetTeam}',this.checked);" type="checkbox"/>
										<span>${$value.BetName} -&nbsp;</span>
										<span class="choose">
										<span title="${$value.ChoiceT}" class="{{if $value.Hdp<0 || $value.Bettype !=1 }}FavTeamClass{{else}}UdrDogTeamClass{{/if}} text-ellipsis" style="max-width: 130px; line-height:16px;">{{html $value.Choice}}</span>
										<span class="TextStyle03" style="padding-right:3px;">&nbsp;${$value.HdpTxt}<span class="{{if $value.OddsSpread<0}}FavTeamClass{{/if}}">{{if $value.Bettype == 301 || $value.Bettype == 302 || $value.Bettype == 303 || $value.Bettype == 304}}(${$value.OddsSpread}){{/if}}</span><span class="TextStyle01">{{if IsLive}}[${LiveScore.H}-${LiveScore.A}]{{/if}}</span>@</span>										
										<span class="{{if $value.Odds < 0}}FavOddsClassBetProcess{{else}}UdrDogOddsClassBetProcess{{/if}}"  style="{{if $value.oddsChg}}background-color:#ffccbc;{{/if}}">${$value.Odds}</span>
										</span>
								</div>
								
								<div class="right-cell">
									<span class="stake{{if $value.Off==1}} linethrough{{/if}}">${$value.Stake}</span>
									<div class="btnIcon" onclick="fFrame.topFrame.g_SMF.removeTicket(${$value.OddsId},'${$value.BetTeam}');"><span class="icon-close"></span></div>
								</div>									
								
							</div>
							{{/each}}
						</div>					
					</td>
				</tr>	
                {{/if}}				
				</tbody>
{{if NowFTScoreMap.Map !=null}}				
				<tbody id="sMap_FT" class="maskSet">
				<tr align="center">
					<th width="78" rowspan="2">Away</th>
					<th colspan="${NowFTScoreMap.HE-NowFTScoreMap.HS+1}" class="even tabthup">Home</th>
				</tr>
				<tr align="center">					  
					  {{each NowFTScoreMap.Map}}<th width="72" class="even">${$index + NowFTScoreMap.HS}</th>{{/each}}
				</tr>
				{{each(a,adata) NowFTScoreMap.Map}}
				<tr align="right">					  
					<th align="center">${a + NowFTScoreMap.AS}</th> 
					
					{{each(h,hdata) NowFTScoreMap.Map[a]}}
					<td class="{{if hdata<0}}FavOddsClass{{else}}UdrDogOddsClass{{/if}}{{if g_SMF.openMark(NowFTScoreMap.HS+h,NowFTScoreMap.AS+a,1)}} maskOn{{/if}}" title="${NowFTScoreMap.HS+h}:${NowFTScoreMap.AS+a}";  bgcolor="${g_SMF.getColor(NowFTScoreMap.HS+h,NowFTScoreMap.AS+a , (IsLive && a + NowFTScoreMap.AS==LiveScore.A && h+NowFTScoreMap.HS==LiveScore.H) , NowFTScoreMap.isWait==2,1)}" onclick="parent.topFrame.g_SMF.ClickMap(${NowFTScoreMap.HS+h},${NowFTScoreMap.AS+a},1);" onmouseover="parent.topFrame.g_SMF.ChkMap(this,${NowFTScoreMap.HS+h},${NowFTScoreMap.AS+a},1);">${addCommas(hdata.toFixed(2))}</td>
					{{/each}}
				</tr>
				{{/each}}
				</tbody>
{{/if}}					
			</table>	
{{/if}}				
{{if (HTTicketList!=null && HTTicketList.length>0) || NowHTScoreMap.Map !=null}}
			<table width="100%" cellpadding="0" cellspacing="0" border="0" class="oddsTable info">
				<tbody>
				<tr id="sTicket_HT" class="ScoreInfo">
					<td class="tabtitle" colspan="${NowHTScoreMap.HE-NowHTScoreMap.HS+2}" style="border-top-right-radius:0;">
					<span onclick="parent.topFrame.MapControl('HT');" class="icon-arrow"></span>ครึ่งแรก
					</td>
					<!--<td class="tabtitle" style="border-top-left-radius:0;">
						<a  onClick="parent.topFrame.g_SMF.Refresh(${MatchID});this.className='btnIcon right disable';" name="btnRefresh" class="btnIcon right" title="รีเฟรช"><div class="icon-refresh" title="รีเฟรช"></div></a>
					</td> -->
				</tr>
				{{if (HTTicketList!=null && HTTicketList.length>0)}}
				<tr>				    
					<td  colspan="${NowHTScoreMap.HE-NowHTScoreMap.HS+2}" >
						<div class="scoremapList">
							{{each HTTicketList}}
							<div class="BetInfo" {{if $value.Off==0}}onClick="fFrame.topFrame.g_SMF.BetProcess(this,event,'${$value.OddsId}','${$value.BetTeam}','${$value.Odds}','${$value.Stake}');" {{/if}}>
								<div class="TextStyle01 left-cell{{if $value.Off==1}} linethrough{{/if}}" >
									<input {{if $value.Enable}}checked{{/if}} {{if $value.Off==1}}disabled{{/if}} onClick="parent.topFrame.g_SMF.setTicketEnable('${$value.OddsId}','${$value.BetTeam}',this.checked);" type="checkbox"/>
										<span>${$value.BetName} -&nbsp;</span>
										<span class="choose">
										<span title="${$value.ChoiceT}" class="{{if $value.Hdp<0 || $value.Bettype !=7 }}FavTeamClass{{else}}UdrDogTeamClass{{/if}} text-ellipsis" style="max-width: 130px; line-height:16px;">{{html $value.Choice}}</span>
										<span class="TextStyle03" style="padding-right:3px;">&nbsp;${$value.HdpTxt}<span class="{{if $value.OddsSpread<0}}FavTeamClass{{/if}}">{{if $value.Bettype == 301 || $value.Bettype == 302 || $value.Bettype == 303 || $value.Bettype == 304}}(${$value.OddsSpread}){{/if}}</span><span class="TextStyle01">{{if IsLive}}[${LiveScore.H}-${LiveScore.A}]{{/if}}</span>@</span>										
										<span class="{{if $value.Odds < 0}}FavOddsClassBetProcess{{else}}UdrDogOddsClassBetProcess{{/if}}"  style="{{if $value.oddsChg}}background-color:#ffccbc;{{/if}}">${$value.Odds}</span>
										</span>
								</div>
								
								<div class="right-cell">
									<span class="stake{{if $value.Off==1}} linethrough{{/if}}">${$value.Stake}</span>
									<div class="btnIcon" onclick="fFrame.topFrame.g_SMF.removeTicket(${$value.OddsId},'${$value.BetTeam}');"><span class="icon-close"></span></div>
								</div>									
								
							</div>
							{{/each}}
						</div>						
					</td>
				</tr>	
                {{/if}}				
				</tbody>
			
{{if NowHTScoreMap.Map !=null}}					
				<tbody id="sMap_HT" class="maskSet">
				<tr align="center">
					<th width="78" rowspan="2">Away</th>
					<th colspan="${NowHTScoreMap.HE-NowHTScoreMap.HS+1}" class="even tabthup">Home</th>
				</tr>
				<tr align="center">
					{{each NowHTScoreMap.Map}}<th width="72" class="even">${$index + NowHTScoreMap.HS}</th>{{/each}}
				</tr>
				{{each(a,adata) NowHTScoreMap.Map}}
				<tr align="right">					  
					<th align="center" w>${a + NowHTScoreMap.AS}</th> 
					
					{{each(h,hdata) NowHTScoreMap.Map[a]}}
					<td class="{{if hdata<0}}FavOddsClass{{else}}UdrDogOddsClass{{/if}}{{if g_SMF.openMark(NowHTScoreMap.HS+h,NowHTScoreMap.AS+a,0)}} maskOn{{/if}}" title="${NowHTScoreMap.HS+h}:${NowHTScoreMap.AS+a}" bgcolor="${g_SMF.getColor(NowHTScoreMap.HS+h,NowHTScoreMap.AS+a , (IsLive && a + NowHTScoreMap.AS==LiveScore.A && h+NowHTScoreMap.HS==LiveScore.H) , NowHTScoreMap.isWait==2,0)}" onclick="parent.topFrame.g_SMF.ClickMap(${NowHTScoreMap.HS+h},${NowHTScoreMap.AS+a},0);" onmouseover="parent.topFrame.g_SMF.ChkMap(this,${NowHTScoreMap.HS+h},${NowHTScoreMap.AS+a},0);" >
					
					   ${addCommas(hdata.toFixed(2))}
					</td>
					{{/each}}
				</tr>
				{{/each}}
				</tbody>
{{/if}}				
			</table>     			
{{/if}}					
{{if (SHTicketList!=null && SHTicketList.length>0) || NowSHTScoreMap.Map !=null}}
			<table width="100%" cellpadding="0" cellspacing="0" border="0" class="oddsTable info">
				<tbody>
				<tr id="sTicket_SHT" class="ScoreInfo">
					<td class="tabtitle" colspan="${NowSHTScoreMap.HE-NowSHTScoreMap.HS+2}" style="border-top-right-radius:0;">
						<span onclick="parent.topFrame.MapControl('SHT');" class="icon-arrow"></span>2H
					</td>
					<!--<td class="tabtitle" style="border-top-left-radius:0;">
						<a  onClick="parent.topFrame.g_SMF.Refresh(${MatchID});this.className='btnIcon right disable';" name="btnRefresh" class="btnIcon right" title="รีเฟรช"><div class="icon-refresh" title="รีเฟรช"></div></a>
					</td> -->
				</tr>
				{{if (SHTicketList!=null && SHTicketList.length>0)}}
				<tr>				    
					<td  colspan="${NowSHTScoreMap.HE-NowSHTScoreMap.HS+2}" >
						<div class="scoremapList">
							{{each SHTicketList}}
							<div class="BetInfo" {{if $value.Off==0}}onClick="fFrame.topFrame.g_SMF.BetProcess(this,event,'${$value.OddsId}','${$value.BetTeam}','${$value.Odds}','${$value.Stake}');" {{/if}}>
								<div class="TextStyle01 left-cell{{if $value.Off==1}} linethrough{{/if}}" >
									<input {{if $value.Enable}}checked{{/if}} {{if $value.Off==1}}disabled{{/if}} onClick="parent.topFrame.g_SMF.setTicketEnable('${$value.OddsId}','${$value.BetTeam}',this.checked);" type="checkbox"/>
										<span>${$value.BetName} -&nbsp;</span>
										<span class="choose">
										<span title="${$value.ChoiceT}" class="{{if $value.Hdp<0 || $value.Bettype !=7 }}FavTeamClass{{else}}UdrDogTeamClass{{/if}} text-ellipsis" style="max-width: 130px; line-height:16px;">{{html $value.Choice}}</span>
										<span class="TextStyle03" style="padding-right:3px;">&nbsp;${$value.HdpTxt}<span class="{{if $value.OddsSpread<0}}FavTeamClass{{/if}}">{{if $value.Bettype == 301 || $value.Bettype == 302 || $value.Bettype == 303 || $value.Bettype == 304}}(${$value.OddsSpread}){{/if}}</span><span class="TextStyle01">{{if IsLive}}[การแข่งขันสด]{{/if}}</span>@</span>										
										<span class="{{if $value.Odds < 0}}FavOddsClassBetProcess{{else}}UdrDogOddsClassBetProcess{{/if}}"  style="{{if $value.oddsChg}}background-color:#ffccbc;{{/if}}">${$value.Odds}</span>
										</span>
								</div>
								
								<div class="right-cell">
									<span class="stake{{if $value.Off==1}} linethrough{{/if}}">${$value.Stake}</span>
									<div class="btnIcon" onclick="fFrame.topFrame.g_SMF.removeTicket(${$value.OddsId},'${$value.BetTeam}');"><span class="icon-close"></span></div>
								</div>									
								
							</div>
							{{/each}}
						</div>						
					</td>
				</tr>	
                {{/if}}				
				</tbody>
			
{{if NowSHTScoreMap.Map !=null}}					
				<tbody id="sMap_SHT" class="maskSet">
				<tr align="center">
					<th width="78" rowspan="2">Away</th>
					<th colspan="${NowSHTScoreMap.HE-NowSHTScoreMap.HS+1}" class="even tabthup">Home</th>
				</tr>
				<tr align="center">
					{{each NowSHTScoreMap.Map}}<th width="72" class="even">${$index + NowSHTScoreMap.HS}</th>{{/each}}
				</tr>
				{{each(a,adata) NowSHTScoreMap.Map}}
				<tr align="right">					  
					<th align="center" w>${a + NowSHTScoreMap.AS}</th> 
					
					{{each(h,hdata) NowSHTScoreMap.Map[a]}}
					<td class="{{if hdata<0}}FavOddsClass{{else}}UdrDogOddsClass{{/if}}{{if g_SMF.openMark(NowSHTScoreMap.HS+h,NowSHTScoreMap.AS+a,0)}} maskOn{{/if}}" title="${NowSHTScoreMap.HS+h}:${NowSHTScoreMap.AS+a}" bgcolor="${g_SMF.getColor(NowSHTScoreMap.HS+h,NowSHTScoreMap.AS+a , (IsLive && a + NowSHTScoreMap.AS==LiveScore.A && h+NowSHTScoreMap.HS==LiveScore.H) , NowSHTScoreMap.isWait==2,0)}" onclick="parent.topFrame.g_SMF.ClickMap(${NowSHTScoreMap.HS+h},${NowSHTScoreMap.AS+a},0);" onmouseover="parent.topFrame.g_SMF.ChkMap(this,${NowSHTScoreMap.HS+h},${NowSHTScoreMap.AS+a},0);" >
					
					   ${addCommas(hdata.toFixed(2))}
					</td>
					{{/each}}
				</tr>
				{{/each}}
				</tbody>
{{/if}}				
			</table>     			
{{/if}}					

{{if ((HTTicketList==null || HTTicketList.length==0) && NowHTScoreMap.Map ==null) &&  ((FTTicketList==null || FTTicketList.length==0) && NowFTScoreMap.Map ==null) &&  ((SHTicketList==null || SHTicketList.length==0) && NowSHTScoreMap.Map ==null)}}
<table class="oddsTable info" width="100%" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td class="noData">ไม่มีข้อมูล</td>
</tr>
</tbody>
</table>
{{/if}}
			<span id="noteValue2"><strong>Note</strong> : Forecasts include the..</span>
			<div class="iconOdds help" onclick="showScoreMsg();" title="ช่วยเหลือ">
				<div id="scoremapmsg" class="hint" style="visibility: hidden;">Forecasts include the Handicap, Odd/Even, Over/Under, Correct Score, FT.1X2, Total Goal, 1H Handicap, 1H Over/Under, 1H Odd/Even, Clean Sheet, 1H 1X2, Double Chance, Draw No Bet, Both/One/Neither Team To Score, To Win To Nil, 3-Way Handicap, 1H Correct Score, Home No Bet, Away No Bet, Draw/No Draw, Result/Total Goals, 1H Double Chance, Exact Total Goals, Exact Home Team Goals, Exact Away Team Goals, Winning Margin, Exact 1H Goals, 1H Exact Home Team Goals, 1H Exact Away Team Goals, Exact 2H Goals, 1H Both Teams To Score, 1H Draw No Bet, Home Team Over/Under, Away Team Over/Under, 1H Home Team Over/Under, 1H Away Team Over/Under, 2H Correct Score, Both Teams To Score/Result, Both Teams To Score/Total Goals, 1H Winning Margin, Double Chance/Total Goals, Odd Even/Total Goals, Both Teams to Score/Double Chance, Asian 1X2, 1H Result/Total Goals, 1H 3-Way Handicap, 1H Both Teams To Score/Result, 1H Both Teams To Score/Total Goals, 1H Asian 1X2, 2H Odd/Even, 2H 1X2 and 2H Double Chance tickets.</div>
			</div>        
        </div>
    </div>
</script>
</div>

