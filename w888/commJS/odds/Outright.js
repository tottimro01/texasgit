function getParent(e){for(var t=e,a=0;a<4;a++){if(null!=t.SiteMode)return t;t=t.parent}return null}function showOutrightOddsDisplay(e,t){if(arrTicks=new Array,document.DataForm.CT.value=t,"U"==e){if(null==g_OddsKeeper)return void refreshData();g_OddsKeeper.refreshOddsTable(DataFrame.Del,DataFrame.Srt,DataFrame.Ins,DataFrame.uT,DataFrame.uO)}else{if(!initialTmpl("Outright_tmpl","Outright_tmpl.php","showOutrightOddsDisplay('"+e+"','"+t+"');"))return;(g_OddsKeeper=new OutrightKeeper).afterNewLeague=afterNewLeague,g_OddsKeeper.afterNewEvent=afterNewEvent,g_OddsKeeper.afterRepaintTable=afterRepaintTable,g_OddsKeeper.getLeagueList=getLeagueList,g_OddsKeeper.isFilterLeague=isFilterLeague,g_OddsKeeper.TableContainer=document.getElementById("oTableContainer"),g_OddsKeeper.BetTypes=[0],g_OddsKeeper.setTemplate(fFrame.document.getElementById("Outright_tmpl").contentWindow),g_OddsKeeper.setDatas(DataFrame.N,FIELDS_DEF_Outright),g_OddsKeeper.paintOddsTable(),document.DataForm.RT.value="U"}}function afterNewLeague(e,t,a){var r=e[t],n=new Array;return n.FavLeagues=getFavLeaguesHtml(0,r.LeagueId,"1"==r.FavLeague,0),_replaceTags(n,_formatTemplate(a,"{@","}"))}function afterNewEvent(e,t,a,r){var n=e[t],u=new Array;return 0==n.Div?(u.Tr_Cls="bgcpe",u.BgColor=GetEventBGColor(0)):(u.Tr_Cls="bgcpelight",u.BgColor=GetEventBGColor(1)),0==n.Odds?(u.Odds="",u.link=""):(u.Odds=n.Odds,u.link="JavaScript:BetO('"+n.MatchId+"_Outright_"+u.Odds+"');"),a=_formatTemplate(a,"{@","}"),a=_replaceTags(u,a)}function refreshData(){window.clearTimeout(RefresHandle),RefresHandle=window.setTimeout(refreshData,REFRESH_INTERVAL),null==g_OddsKeeper||iRefreshCount<=0?(document.DataForm.RT.value="W",iRefreshCount=REFRESH_COUNTDOWN):iRefreshCount--,btnstop(),(null==arguments.callee.caller||void 0!==arguments.callee.caller.name&&"onclick"==arguments.callee.caller.name.toLowerCase())&&Check_refreshCnt(),null!=document.DataForm.key&&(document.DataForm.key.value=fFrame.leftx.eObj.GetKey("odds")),document.DataForm.submit()}function afterRepaintTable(e){window.clearTimeout(btnStartHandle),btnStartHandle=setTimeout("btnstart()",3e3),document.getElementById("BetList").style.display="none",document.getElementById("OddsTr").style.display="block",0==g_OddsKeeper.EventList.length?document.getElementById("TrNoInfo").style.display="block":document.getElementById("TrNoInfo").style.display="none","undefined"!=typeof myScroll&&myScroll.refresh()}function BetO(e){fFrame.leftx.$("#BPMinMaxBetAlert").css("display","none"),fFrame.leftx.$("#BPOddsChangeAlert").css("display","none"),CheckIsIpad()&&!CheckIScroll()&&parent.window.scrollTo(0,0),fFrame.CanBetOutright?fFrame.leftx.DoOutrightBetProcess(e):alert(RES_DISABLE_OUTRIGHT_MSG)}function ExistLeague(e){for(var t=0;t<LeagueList.length;t++)if(LeagueList[t].LeagueId==e)return!0;if("object"==typeof LeagueListBySport.S0)for(t=0;t<LeagueListBySport.S0.length;t++)if(LeagueListBySport.S0[t].LeagueId==e)return!0;return!1}function makeLeagueList(e){if(null!=e){for(var t=0,a=0;a<e.length;a++)ExistLeague(e[a].LeagueId)||(LeagueList[t]={},LeagueList[t].LeagueId=e[a].LeagueId,LeagueList[t].LeagueName=e[a].LeagueName,-1!=indexOf(arr_League,e[a].LeagueId)?LeagueList[t].Checked=!0:LeagueList[t].Checked=!1,t++);"object"==typeof LeagueListBySport.S0?LeagueListBySport.S0=LeagueListBySport.S0.concat(LeagueList):(LeagueListBySport.S0={},LeagueListBySport.S0=jQuery.extend(!0,[],LeagueList)),LeagueListBySport.S0.sort(function(e,t){return e.LeagueName.localeCompare(t.LeagueName)})}}function getSelLeagueCnt(e){for(var t=0,a=[],r=0;r<e.length;r++)e[r].Checked&&t++;return a[0]=t,a}function getLeagueList(){LeagueListBySport=[],TotlaLeagueCnt=0,TotlaMainLeagueCnt=0,TotlaSelLeagueCnt=0;if(LeagueList=[],"object"==typeof g_OddsKeeper&&null!=g_OddsKeeper&&makeLeagueList(g_OddsKeeper.EventList),void 0!==LeagueListBySport.S0){TotlaLeagueCnt=LeagueListBySport.S0.length,TotlaMainLeagueCnt=LeagueListBySport.S0.length;var e=getSelLeagueCnt(LeagueListBySport.S0);TotlaSelLeagueCnt=e[0]}checkLeagueCount()}function isFilterLeague(e){return-1!=indexOf(arr_League,"0")||0==TotlaSelLeagueCnt||-1!=indexOf(arr_League,e)}function CheckHaveOdds(e){return null==e.innerHTML.match(/[0-9]/g)?(e.style.cursor="default",!1):(e.style.cursor="pointer",!0)}var btnStartHandle,TR_0="bgcpe",TR_1="bgcpelight",g_OddsKeeper=null,fFrame=getParent(window),arr_League=new Array("0"),LeagueListBySport=[],LeagueList=[],TotlaLeagueCnt=0,TotlaMainLeagueCnt=0,TotlaSelLeagueCnt=0,IsSaveLeague=!1,SelMainMarket=0;