function getParent(d){for(var _=d,s=0;s<4;s++){if(null!=_.SiteMode)return _;_=_.parent}return null}function ShowBetList(d,_,s,e,O,t,a,r,n,H){arrTicks=new Array;var o,l;if("l"==s?(o=document.DataForm_L,DataFrame_L,l=g_OddsKeeper_L):(o=document.DataForm_D,DataFrame_D,l=g_OddsKeeper_D),o.CT.value=_,"U"==d){if(null==l)return void("l"==s?refreshData_L():refreshData_D());l.refreshOddsTable(e,O,t,a,r,n,H)}else{var i;switch("l"==s?(i="L",(l=g_OddsKeeper_L=new OddsKeeper).tag="L",l.TableContainer=document.getElementById("oTableContainer_L")):(i="D",(l=g_OddsKeeper_D=new OddsKeeper).tag="D",l.TableContainer=document.getElementById("oTableContainer_D")),DisplayMode){case"H":case"1H":case"2H":if(!initialTmpl("CorrectScore_tmpl_H","CorrectScore_tmpl.php?form=H","ShowBetList('"+d+"','"+_+"','"+s+"', DataFrame_"+i+".N"+s+");"))return;break;default:if(!initialTmpl("CorrectScore_tmpl","CorrectScore_tmpl.php","ShowBetList('"+d+"','"+_+"','"+s+"', DataFrame_"+i+".N"+s+");"))return}switch(l.SportType="1",l.afterNewLeague=afterNewLeague,l.afterNewEvent=afterNewEvent,l.afterRepaintTable=afterRepaintTable,l.updateAppendFields=updateAppendFields,l.BetTypes=ARR_BETYPE_DEF.CS,DisplayMode){case"H":case"1H":case"2H":l.setTemplate(fFrame.document.getElementById("CorrectScore_tmpl_H").contentWindow);break;default:l.setTemplate(fFrame.document.getElementById("CorrectScore_tmpl").contentWindow)}if(l.setDatas(e,FIELDS_DEF_CorrectScore),CheckHasData(l))l.paintOddsTable();else{var S=new Array,L=new Array;L=l.EventList,l.EventList=S,l.paintOddsTable(),l.EventList=L}o.RT.value="U"}}function CheckHasData(d){switch(DisplayMode){case"1H":for(var _=0;_<d.EventList.length;_++)if(""!=d.EventList[_].OddsId_414)return!0;break;case"2H":for(_=0;_<d.EventList.length;_++)if(""!=d.EventList[_].OddsId_405)return!0;break;default:for(_=0;_<d.EventList.length;_++)if(""!=d.EventList[_].OddsId_413)return!0}return!1}function afterNewLeague(d,_,s){var e=d[_];switch(DisplayMode){case"1H":if(""==e.OddsId_414)return"";break;case"2H":if(""==e.OddsId_405)return"";break;default:if(""==e.OddsId_413)return""}var O=new Array;return O.FavLeagues=getFavLeaguesHtml(document.DataForm_D.Sport.value,e.LeagueId,"1"==e.FavLeague,!1),O.Refresh=RES_REFRESH,_replaceTags(O,_formatTemplate(s,"{@","}"))}function afterNewEvent(d,_,s,e){var O=d[_];switch(DisplayMode){case"1H":if(""==O.OddsId_414)return"";break;case"2H":if(""==O.OddsId_405)return"";break;default:if(""==O.OddsId_413)return""}var t=new Array;switch(DisplayMode){case"1H":t.OddsId_4H=O.OddsId_414,t.BetType_H="414",t.Changed_4H=O.Changed_414,t.Odds_4H_10=O.Odds_414_10,t.Odds_4H_20=O.Odds_414_20,t.Odds_4H_21=O.Odds_414_21,t.Odds_4H_30=O.Odds_414_30,t.Odds_4H_31=O.Odds_414_31,t.Odds_4H_32=O.Odds_414_32,t.Odds_4H_00=O.Odds_414_00,t.Odds_4H_11=O.Odds_414_11,t.Odds_4H_22=O.Odds_414_22,t.Odds_4H_33=O.Odds_414_33,t.Odds_4H_99=O.Odds_414_99,t.Odds_4H_01=O.Odds_414_01,t.Odds_4H_02=O.Odds_414_02,t.Odds_4H_12=O.Odds_414_12,t.Odds_4H_03=O.Odds_414_03,t.Odds_4H_13=O.Odds_414_13,t.Odds_4H_23=O.Odds_414_23,O.Odds_414_10+O.Odds_414_20+O.Odds_414_21+O.Odds_414_30+O.Odds_414_31+O.Odds_414_32+O.Odds_414_00+O.Odds_414_11+O.Odds_414_22+O.Odds_414_33+O.Odds_414_99+O.Odds_414_01+O.Odds_414_02+O.Odds_414_12+O.Odds_414_03+O.Odds_414_13+O.Odds_414_23!=""?(t.Odds_4HV_10=""==O.Odds_414_10?"--":"",t.Odds_4HV_20=""==O.Odds_414_20?"--":"",t.Odds_4HV_21=""==O.Odds_414_21?"--":"",t.Odds_4HV_30=""==O.Odds_414_30?"--":"",t.Odds_4HV_31=""==O.Odds_414_31?"--":"",t.Odds_4HV_32=""==O.Odds_414_32?"--":"",t.Odds_4HV_00=""==O.Odds_414_00?"--":"",t.Odds_4HV_11=""==O.Odds_414_11?"--":"",t.Odds_4HV_22=""==O.Odds_414_22?"--":"",t.Odds_4HV_33=""==O.Odds_414_33?"--":"",t.Odds_4HV_99=""==O.Odds_414_99?"--":"",t.Odds_4HV_01=""==O.Odds_414_01?"--":"",t.Odds_4HV_02=""==O.Odds_414_02?"--":"",t.Odds_4HV_12=""==O.Odds_414_12?"--":"",t.Odds_4HV_03=""==O.Odds_414_03?"--":"",t.Odds_4HV_13=""==O.Odds_414_13?"--":"",t.Odds_4HV_23=""==O.Odds_414_23?"--":"",t.Odds_4HD_10=""==O.Odds_414_10?CLS_LS_OFF:"",t.Odds_4HD_20=""==O.Odds_414_20?CLS_LS_OFF:"",t.Odds_4HD_21=""==O.Odds_414_21?CLS_LS_OFF:"",t.Odds_4HD_30=""==O.Odds_414_30?CLS_LS_OFF:"",t.Odds_4HD_31=""==O.Odds_414_31?CLS_LS_OFF:"",t.Odds_4HD_32=""==O.Odds_414_32?CLS_LS_OFF:"",t.Odds_4HD_00=""==O.Odds_414_00?CLS_LS_OFF:"",t.Odds_4HD_11=""==O.Odds_414_11?CLS_LS_OFF:"",t.Odds_4HD_22=""==O.Odds_414_22?CLS_LS_OFF:"",t.Odds_4HD_33=""==O.Odds_414_33?CLS_LS_OFF:"",t.Odds_4HD_99=""==O.Odds_414_99?CLS_LS_OFF:"",t.Odds_4HD_01=""==O.Odds_414_01?CLS_LS_OFF:"",t.Odds_4HD_02=""==O.Odds_414_02?CLS_LS_OFF:"",t.Odds_4HD_12=""==O.Odds_414_12?CLS_LS_OFF:"",t.Odds_4HD_03=""==O.Odds_414_03?CLS_LS_OFF:"",t.Odds_4HD_13=""==O.Odds_414_13?CLS_LS_OFF:"",t.Odds_4HD_23=""==O.Odds_414_23?CLS_LS_OFF:""):(t.Odds_4HV_10="",t.Odds_4HV_20="",t.Odds_4HV_21="",t.Odds_4HV_30="",t.Odds_4HV_31="",t.Odds_4HV_32="",t.Odds_4HV_00="",t.Odds_4HV_11="",t.Odds_4HV_22="",t.Odds_4HV_33="",t.Odds_4HV_99="",t.Odds_4HV_01="",t.Odds_4HV_02="",t.Odds_4HV_12="",t.Odds_4HV_03="",t.Odds_4HV_13="",t.Odds_4HV_23="",t.Odds_4HD_10="",t.Odds_4HD_20="",t.Odds_4HD_21="",t.Odds_4HD_30="",t.Odds_4HD_31="",t.Odds_4HD_32="",t.Odds_4HD_00="",t.Odds_4HD_11="",t.Odds_4HD_22="",t.Odds_4HD_33="",t.Odds_4HD_99="",t.Odds_4HD_01="",t.Odds_4HD_02="",t.Odds_4HD_12="",t.Odds_4HD_03="",t.Odds_4HD_13="",t.Odds_4HD_23=""),t.ScoreH=O.Odds_414_livehomescore,t.ScoreA=O.Odds_414_liveawayscore;break;case"2H":t.OddsId_4H=O.OddsId_405,t.BetType_H="405",t.Changed_4H=O.Changed_405,t.Odds_4H_10=O.Odds_405_10,t.Odds_4H_20=O.Odds_405_20,t.Odds_4H_21=O.Odds_405_21,t.Odds_4H_30=O.Odds_405_30,t.Odds_4H_31=O.Odds_405_31,t.Odds_4H_32=O.Odds_405_32,t.Odds_4H_00=O.Odds_405_00,t.Odds_4H_11=O.Odds_405_11,t.Odds_4H_22=O.Odds_405_22,t.Odds_4H_33=O.Odds_405_33,t.Odds_4H_99=O.Odds_405_99,t.Odds_4H_01=O.Odds_405_01,t.Odds_4H_02=O.Odds_405_02,t.Odds_4H_12=O.Odds_405_12,t.Odds_4H_03=O.Odds_405_03,t.Odds_4H_13=O.Odds_405_13,t.Odds_4H_23=O.Odds_405_23,O.Odds_405_10+O.Odds_405_20+O.Odds_405_21+O.Odds_405_30+O.Odds_405_31+O.Odds_405_32+O.Odds_405_00+O.Odds_405_11+O.Odds_405_22+O.Odds_405_33+O.Odds_405_99+O.Odds_405_01+O.Odds_405_02+O.Odds_405_12+O.Odds_405_03+O.Odds_405_13+O.Odds_405_23!=""?(t.Odds_4HV_10=""==O.Odds_405_10?"--":"",t.Odds_4HV_20=""==O.Odds_405_20?"--":"",t.Odds_4HV_21=""==O.Odds_405_21?"--":"",t.Odds_4HV_30=""==O.Odds_405_30?"--":"",t.Odds_4HV_31=""==O.Odds_405_31?"--":"",t.Odds_4HV_32=""==O.Odds_405_32?"--":"",t.Odds_4HV_00=""==O.Odds_405_00?"--":"",t.Odds_4HV_11=""==O.Odds_405_11?"--":"",t.Odds_4HV_22=""==O.Odds_405_22?"--":"",t.Odds_4HV_33=""==O.Odds_405_33?"--":"",t.Odds_4HV_99=""==O.Odds_405_99?"--":"",t.Odds_4HV_01=""==O.Odds_405_01?"--":"",t.Odds_4HV_02=""==O.Odds_405_02?"--":"",t.Odds_4HV_12=""==O.Odds_405_12?"--":"",t.Odds_4HV_03=""==O.Odds_405_03?"--":"",t.Odds_4HV_13=""==O.Odds_405_13?"--":"",t.Odds_4HV_23=""==O.Odds_405_23?"--":"",t.Odds_4HD_10=""==O.Odds_405_10?CLS_LS_OFF:"",t.Odds_4HD_20=""==O.Odds_405_20?CLS_LS_OFF:"",t.Odds_4HD_21=""==O.Odds_405_21?CLS_LS_OFF:"",t.Odds_4HD_30=""==O.Odds_405_30?CLS_LS_OFF:"",t.Odds_4HD_31=""==O.Odds_405_31?CLS_LS_OFF:"",t.Odds_4HD_32=""==O.Odds_405_32?CLS_LS_OFF:"",t.Odds_4HD_00=""==O.Odds_405_00?CLS_LS_OFF:"",t.Odds_4HD_11=""==O.Odds_405_11?CLS_LS_OFF:"",t.Odds_4HD_22=""==O.Odds_405_22?CLS_LS_OFF:"",t.Odds_4HD_33=""==O.Odds_405_33?CLS_LS_OFF:"",t.Odds_4HD_99=""==O.Odds_405_99?CLS_LS_OFF:"",t.Odds_4HD_01=""==O.Odds_405_01?CLS_LS_OFF:"",t.Odds_4HD_02=""==O.Odds_405_02?CLS_LS_OFF:"",t.Odds_4HD_12=""==O.Odds_405_12?CLS_LS_OFF:"",t.Odds_4HD_03=""==O.Odds_405_03?CLS_LS_OFF:"",t.Odds_4HD_13=""==O.Odds_405_13?CLS_LS_OFF:"",t.Odds_4HD_23=""==O.Odds_405_23?CLS_LS_OFF:""):(t.Odds_4HV_10="",t.Odds_4HV_20="",t.Odds_4HV_21="",t.Odds_4HV_30="",t.Odds_4HV_31="",t.Odds_4HV_32="",t.Odds_4HV_00="",t.Odds_4HV_11="",t.Odds_4HV_22="",t.Odds_4HV_33="",t.Odds_4HV_99="",t.Odds_4HV_01="",t.Odds_4HV_02="",t.Odds_4HV_12="",t.Odds_4HV_03="",t.Odds_4HV_13="",t.Odds_4HV_23="",t.Odds_4HD_10="",t.Odds_4HD_20="",t.Odds_4HD_21="",t.Odds_4HD_30="",t.Odds_4HD_31="",t.Odds_4HD_32="",t.Odds_4HD_00="",t.Odds_4HD_11="",t.Odds_4HD_22="",t.Odds_4HD_33="",t.Odds_4HD_99="",t.Odds_4HD_01="",t.Odds_4HD_02="",t.Odds_4HD_12="",t.Odds_4HD_03="",t.Odds_4HD_13="",t.Odds_4HD_23=""),t.ScoreH=O.Odds_405_livehomescore,t.ScoreA=O.Odds_405_liveawayscore;break;default:O.Odds_413_10+O.Odds_413_20+O.Odds_413_21+O.Odds_413_30+O.Odds_413_31+O.Odds_413_32+O.Odds_413_40+O.Odds_413_41+O.Odds_413_42+O.Odds_413_43+O.Odds_413_00+O.Odds_413_11+O.Odds_413_22+O.Odds_413_33+O.Odds_413_44+O.Odds_413_99!=""?(t.Odds_413_10=""==O.Odds_413_10?"--":"",t.Odds_413_20=""==O.Odds_413_20?"--":"",t.Odds_413_21=""==O.Odds_413_21?"--":"",t.Odds_413_30=""==O.Odds_413_30?"--":"",t.Odds_413_31=""==O.Odds_413_31?"--":"",t.Odds_413_32=""==O.Odds_413_32?"--":"",t.Odds_413_40=""==O.Odds_413_40?"--":"",t.Odds_413_41=""==O.Odds_413_41?"--":"",t.Odds_413_42=""==O.Odds_413_42?"--":"",t.Odds_413_43=""==O.Odds_413_43?"--":"",t.Odds_413_00=""==O.Odds_413_00?"--":"",t.Odds_413_11=""==O.Odds_413_11?"--":"",t.Odds_413_22=""==O.Odds_413_22?"--":"",t.Odds_413_33=""==O.Odds_413_33?"--":"",t.Odds_413_44=""==O.Odds_413_44?"--":"",t.Odds_413_99=""==O.Odds_413_99?"--":"",t.Odds_413_01=""==O.Odds_413_01?"--":"",t.Odds_413_02=""==O.Odds_413_02?"--":"",t.Odds_413_12=""==O.Odds_413_12?"--":"",t.Odds_413_03=""==O.Odds_413_03?"--":"",t.Odds_413_13=""==O.Odds_413_13?"--":"",t.Odds_413_23=""==O.Odds_413_23?"--":"",t.Odds_413_04=""==O.Odds_413_04?"--":"",t.Odds_413_14=""==O.Odds_413_14?"--":"",t.Odds_413_24=""==O.Odds_413_24?"--":"",t.Odds_413_34=""==O.Odds_413_34?"--":"",t.Odds_413D_10=""==O.Odds_413_10?CLS_LS_OFF:"",t.Odds_413D_20=""==O.Odds_413_20?CLS_LS_OFF:"",t.Odds_413D_21=""==O.Odds_413_21?CLS_LS_OFF:"",t.Odds_413D_30=""==O.Odds_413_30?CLS_LS_OFF:"",t.Odds_413D_31=""==O.Odds_413_31?CLS_LS_OFF:"",t.Odds_413D_32=""==O.Odds_413_32?CLS_LS_OFF:"",t.Odds_413D_40=""==O.Odds_413_40?CLS_LS_OFF:"",t.Odds_413D_41=""==O.Odds_413_41?CLS_LS_OFF:"",t.Odds_413D_42=""==O.Odds_413_42?CLS_LS_OFF:"",t.Odds_413D_43=""==O.Odds_413_43?CLS_LS_OFF:"",t.Odds_413D_00=""==O.Odds_413_00?CLS_LS_OFF:"",t.Odds_413D_11=""==O.Odds_413_11?CLS_LS_OFF:"",t.Odds_413D_22=""==O.Odds_413_22?CLS_LS_OFF:"",t.Odds_413D_33=""==O.Odds_413_33?CLS_LS_OFF:"",t.Odds_413D_44=""==O.Odds_413_44?CLS_LS_OFF:"",t.Odds_413D_99=""==O.Odds_413_99?CLS_LS_OFF:"",t.Odds_413D_01=""==O.Odds_413_01?CLS_LS_OFF:"",t.Odds_413D_02=""==O.Odds_413_02?CLS_LS_OFF:"",t.Odds_413D_12=""==O.Odds_413_12?CLS_LS_OFF:"",t.Odds_413D_03=""==O.Odds_413_03?CLS_LS_OFF:"",t.Odds_413D_13=""==O.Odds_413_13?CLS_LS_OFF:"",t.Odds_413D_23=""==O.Odds_413_23?CLS_LS_OFF:"",t.Odds_413D_04=""==O.Odds_413_04?CLS_LS_OFF:"",t.Odds_413D_14=""==O.Odds_413_14?CLS_LS_OFF:"",t.Odds_413D_24=""==O.Odds_413_24?CLS_LS_OFF:"",t.Odds_413D_34=""==O.Odds_413_34?CLS_LS_OFF:""):(t.Odds_413_10="",t.Odds_413_20="",t.Odds_413_21="",t.Odds_413_30="",t.Odds_413_31="",t.Odds_413_32="",t.Odds_413_40="",t.Odds_413_41="",t.Odds_413_42="",t.Odds_413_43="",t.Odds_413_00="",t.Odds_413_11="",t.Odds_413_22="",t.Odds_413_33="",t.Odds_413_44="",t.Odds_413_99="",t.Odds_413_01="",t.Odds_413_02="",t.Odds_413_12="",t.Odds_413_03="",t.Odds_413_13="",t.Odds_413_23="",t.Odds_413_04="",t.Odds_413_14="",t.Odds_413_24="",t.Odds_413_34="",t.Odds_413D_10="",t.Odds_413D_20="",t.Odds_413D_21="",t.Odds_413D_30="",t.Odds_413D_31="",t.Odds_413D_32="",t.Odds_413D_40="",t.Odds_413D_41="",t.Odds_413D_42="",t.Odds_413D_43="",t.Odds_413D_00="",t.Odds_413D_11="",t.Odds_413D_22="",t.Odds_413D_33="",t.Odds_413D_44="",t.Odds_413D_99="",t.Odds_413D_01="",t.Odds_413D_02="",t.Odds_413D_12="",t.Odds_413D_03="",t.Odds_413D_13="",t.Odds_413D_23="",t.Odds_413D_04="",t.Odds_413D_14="",t.Odds_413D_24="",t.Odds_413D_34=""),t.ScoreH=O.Odds_413_livehomescore,t.ScoreA=O.Odds_413_liveawayscore}if(e&&(0==O.LivePeriod?t.LiveTimeCls="1"==O.CsStatus?"HalfTime":"IsLive":t.LiveTimeCls="LiveTime"),0==_||d[_-1].MatchId!=O.MatchId){switch(O.SportRadar){case"0":t.SportRadarInfo="";break;default:switch(O.StatsId){case"1":case"5":t.SportRadarInfo=getSportRadarHtml(O.MatchId,"correctscore",1);break;case"3":break;case"4":case"7":t.SportRadarInfo=getRunningHtmlOtherBetType(O.MatchId,O.HomeName,O.AwayName,1)}}switch(O.StatsId){case"0":t.StatsInfo="";break;case"1":t.StatsInfo=getStatsHtml(O.MatchId);break;case"2":t.StatsInfo="";break;case"3":break;case"4":t.StatsInfo=getStatsHtml(O.MatchId);break;case"5":case"6":case"7":t.StatsInfo=getStatsHtml(O.MatchId)}if(t.Streaming=getStreamingHtml(O.MatchId,O.StreamingId,e),t.Favorites=getFavoritesHtml(O.MUID,O.MatchCode,"1"==O.Favorite||"1"==O.FavLeague,e),t.FavLeagues=getFavLeaguesHtml(document.DataForm_D.Sport.value,O.LeagueId,"1"==O.FavLeague,e),e)switch(O.GameStatus){case"1":t.GameStatus='<div class="happen LiveTime" Title="'+RES_PRC_full+'"><b>'+RES_PRC+"</b></div>";break;case"2":t.GameStatus='<div class="happen LiveTime" Title="'+RES_PPen_full+'"><b>'+RES_PPen+"</b></div>";break;case"3":t.GameStatus='<div class="happen LiveTime" Title="'+RES_VAR_full+'"><b>'+RES_VAR+"</b></div>";break;case"4":t.GameStatus='<div class="happen LiveTime" Title="'+RES_Pen_full+'"><b>'+RES_Pen+"</b></div>";break;case"5":t.GameStatus='<div class="happen LiveTime" Title="'+RES_Inj_full+'"><b>'+RES_Inj+"</b></div>";break;default:t.GameStatus=""}}return t.isParlay=0,s=_formatTemplate(s,"{@","}"),s=_replaceTags(t,s)}function updateAppendFields(d,_,s,e){for(var O=0;O<d.length;O++){for(var t=d[O][0],a=s[t];a<_.length&&_[a].MUID==t;)_[a].GameStatus=d[O][2],a++;e[t]="updateAppend"}}function afterRepaintTable(d){var _;"oTableContainer_L"==d.parentNode.id?(document.DataForm_L.RT.value="U",_=document.getElementById("oTableContainer_D"),window.clearTimeout(btnStartHandle_L),btnStartHandle_L=setTimeout("startButton('l');",3e3)):(document.DataForm_D.RT.value="U",_=document.getElementById("oTableContainer_L"),window.clearTimeout(btnStartHandle_D),btnStartHandle_D=setTimeout("startButton('d');",3e3)),"H"!=DisplayMode&&"1H"!=DisplayMode&&"2H"!=DisplayMode||purgeLeagueRow_1H(d),document.getElementById("BetList").style.display="none",document.getElementById("OddsTr").style.display="block";var s=0;d.tBodies.length>0&&(s=d.tBodies.length-1),d.tBodies[s].rows.length<=1?(d.parentNode.style.display="none","none"==_.style.display?document.getElementById("TrNoInfo").style.display="block":document.getElementById("TrNoInfo").style.display="none","oTableContainer_L"==d.parentNode.id?document.getElementById("btnRefresh_L").style.display="none":document.getElementById("btnRefresh_D").style.display="none"):(d.parentNode.style.display="",document.getElementById("TrNoInfo").style.display="none","oTableContainer_L"==d.parentNode.id?document.getElementById("btnRefresh_L").style.display="":document.getElementById("btnRefresh_D").style.display=""),"undefined"!=typeof myScroll&&myScroll.refresh()}function purgeLeagueRow_1H(d){var _,s=0;d.tBodies.length>0&&(s=d.tBodies.length-1);for(var e=d.tBodies[s],O=e.rows.length-1;O>=0;O--)"l"==e.rows[O].id.charAt(0)?_++:_=0,_>1&&e.deleteRow(O);for(;e.rows.length>0&&"l"==e.rows[e.rows.length-1].id.charAt(0);)e.deleteRow(e.rows.length-1)}function changeDisplayMode(d){if(null!=g_OddsKeeper_D){switch(d){case"H":case"1H":case"2H":if(!initialTmpl("CorrectScore_tmpl_H","CorrectScore_tmpl.php?form=H","changeDisplayMode('"+d+"');"))return;break;default:if(!initialTmpl("CorrectScore_tmpl","CorrectScore_tmpl.php","changeDisplayMode('"+d+"');"))return}DisplayMode=d,"t"==PAGE_MARKET&&null!=g_OddsKeeper_L&&(window.clearTimeout(CounterHandle_L),stopButton("l"),setDisplayMode(d,g_OddsKeeper_L)),window.clearTimeout(CounterHandle_D),stopButton("d"),setDisplayMode(d,g_OddsKeeper_D),getLeagueList()}}function setDisplayMode(d,_){switch(d){case"H":case"1H":case"2H":_.setTemplate(fFrame.document.getElementById("CorrectScore_tmpl_H").contentWindow),_.RegenEverytime=!0;break;default:_.setTemplate(fFrame.document.getElementById("CorrectScore_tmpl").contentWindow),_.RegenEverytime=!0}if(CheckHasData(_))_.paintOddsTable();else{var s=new Array,e=new Array;e=_.EventList,_.EventList=s,_.paintOddsTable(),_.EventList=e}}var CounterHandle_L,CounterHandle_D,btnStartHandle,g_OddsKeeper=null,g_OddsKeeper_L=null,g_OddsKeeper_D=null,fFrame=getParent(window),DisplayMode="";