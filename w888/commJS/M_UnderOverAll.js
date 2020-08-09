function MargeOddsArray(e) {
    for (var _ = new Array, t = 0; t < ARR_BETYPE_DEF[e].length; t++)
        _ = _.concat(MultiSportODDS_DEF[ARR_BETYPE_DEF[e][t]]);
    return _
}
function Set4HourColor() {
    siteObj._4HourColor = "#003399"
}
function SetSelectDateColor() {
    siteObj._SelectDateColor_Def = "#003399",
    siteObj._SelectDateColor_Sel = "#9F0915"
}
function SetSpanTag() {
    "4280" == fFrame.SiteId || "4200800" == fFrame.SiteId ? (siteObj._SpanTagS = "<span>",
    siteObj._SpanTagE = "</span>") : (siteObj._SpanTagS = "",
    siteObj._SpanTagE = "")
}
function SetCss() {
    "4280" == fFrame.SiteId || "4200800" == fFrame.SiteId ? siteObj._t_Order_Css = " right" : siteObj._t_Order_Css = ""
}
function getParent(e) {
    for (var _ = e, t = 0; t < 4; t++) {
        if (null != _.SiteMode)
            return _;
        _ = _.parent
    }
    return null
}
function getOddsClass(e) {
    return e < 0 ? CLS_EVEN : CLS_ODD
}
function Check_refreshCnt() {
    0 == refreshCnt && (refreshThread = setTimeout("refreshCnt=0;refreshThread=null;", 6e4)),
    ++refreshCnt >= 5 && (refreshCnt = 0,
    window.clearTimeout(refreshThread))
    // ,
    // genGotoMS2HTML(1),
    // PopToMS2(1))
}
function refreshData() {
    void 0 !== refreshMoreData && (refreshMoreData(1),
    refreshMoreData(2),
    refreshMoreData(5),
    refreshMoreData(43)),
    null != fFrame.leftx && null != fFrame.leftx.eObj ? REFRESH_GAP && (btnstop(),
    (null == arguments.callee.caller || void 0 !== arguments.callee.caller.name && "onclick" == arguments.callee.caller.name.toLowerCase()) && Check_refreshCnt(),
    window.clearTimeout(RefresHandle),
    RefresHandle = window.setTimeout(refreshData, REFRESH_INTERVAL),
    null == g_OddsKeeper || iRefreshCount <= 0 ? (document.DataForm.RT.value = "W",
    iRefreshCount = REFRESH_COUNTDOWN) : iRefreshCount--,
    bShowLoading && (document.getElementById("BetList").style.display = "block",
    bShowLoading = !1),
    null != document.DataForm.key && (document.DataForm.key.value = fFrame.leftx.eObj.GetKey("odds")),
    "W" == document.DataForm.RT.value && (g_OddsKeeper = null),
    document.DataForm.submit(),
    null != PopLauncher && null != sKeeper && PopLauncher.isOpened ? null != ThreadId && "" != ThreadId && recallAjax(ThreadId) : ThreadId = null) : window.setTimeout("refreshData()", 500)
}
function btnstop() {
    REFRESH_GAP = !1;
    var e = document.getElementById("divSelectDate");
    if (null != e && "none" != e.style.display)
        for (var _ = 0; _ < e.childNodes.length; _++) {
            var t = e.childNodes[_];
            null != t.tagName && "SPAN" == t.tagName.toUpperCase() && (t.disabled = !0)
        }
    setSelecterDisable("aSorter", !0),
    $("#selOddsType_Div").length > 0 && setSelecterDisable("selOddsType", !0),
    $("#selLeagueType_Div").length > 0 && setSelecterDisable("selLeagueType", !0);
    for (var a = ["btnRefresh", "btnRefresh_L", "btnRefresh_D"], r = 0; r < a.length; r++)
        changeButtonStatus(a[r], !0)
}
function btnstart() {
    if (!REFRESH_GAP) {
        var e = document.getElementById("divSelectDate");
        if (null != e && "none" != e.style.display)
            for (var _ = 0; _ < e.childNodes.length; _++) {
                var t = e.childNodes[_];
                null != t.tagName && "SPAN" == t.tagName.toUpperCase() && (t.disabled = !1)
            }
        $("#selOddsType_Div").length > 0 && setSelecterDisable("selOddsType", !1),
        $("#selLeagueType_Div").length > 0 && setSelecterDisable("selLeagueType", !1);
        for (var a = ["btnRefresh", "btnRefresh_L", "btnRefresh_D"], r = 0; r < a.length; r++)
            changeButtonStatus(a[r], !1);
        setSelecterDisable("aSorter", !1),
        REFRESH_GAP = !0
    }
}
function changeBGColor2(e, _) {
    var t = document.getElementById(e + "_1")
      , a = document.getElementById(e + "_2");
    null != t && (t.style.backgroundColor = _),
    null != a && (a.style.backgroundColor = _)
}
function changeBGColor3(e, _) {
    var t = document.getElementById(e + "_1")
      , a = document.getElementById(e + "_2")
      , r = document.getElementById(e + "_3");
    null != t && (t.style.backgroundColor = _),
    null != a && (a.style.backgroundColor = _),
    null != r && (r.style.backgroundColor = _)
}
function changeBGColorX(e, _, t) {
    for (var a = 1; a <= t; a++) {
        var r = document.getElementById(e + "_" + a);
        null != r && (r.style.backgroundColor = _)
    }
}
function MMRchangeBGColor3_over(e, _, t, a) {
    var r = document.getElementById(_ + "_1")
      , d = document.getElementById(_ + "_2")
      , s = document.getElementById(_ + "_3");
    OnlyMROdds ? (null != s && (s.style.backgroundColor = t),
    null != d && (d.style.backgroundColor = t)) : e.id == _ + "_3" ? null != s && (s.style.backgroundColor = t) : (null != r && (r.style.backgroundColor = t),
    null != d && (d.style.backgroundColor = t))
}
function MMRchangeBGColor3_out(e, _, t) {
    var a = document.getElementById(e + "_1")
      , r = document.getElementById(e + "_2")
      , d = document.getElementById(e + "_3");
    null != d && (d.style.backgroundColor = t),
    null != a && (a.style.backgroundColor = _),
    null != r && (r.style.backgroundColor = OnlyMROdds ? t : _)
}
function initialTmpl(e, _, t) {
    return null == fFrame.hash_TmplLoaded[e] ? (fFrame.document.getElementById(e).contentWindow.location.href = _,
    fFrame.hash_TmplLoaded[e] = !0,
    window.setTimeout(t, 500),
    !1) : null != fFrame.document.getElementById(e).contentWindow.document.getElementById("tmplEnd") || (window.setTimeout(t, 500),
    !1)
}
function loadAllTmpl() {
    var e = new Array;
    if (e.UnderOver_tmpl_1 = "UnderOver_tmpl.php?form=1",
    e.UnderOver_tmpl_3 = "UnderOver_tmpl.php?form=3",
    e.UnderOver_tmpl_1F = "UnderOver_tmpl.php?form=1F",
    e.UnderOver_tmpl_1H = "UnderOver_tmpl.php?form=1H",
    e.NBA_tmpl = "NBA_tmpl.php",
    e.Baseball_tmpl = "Baseball_tmpl.php",
    e.Tennis_tmpl = "Tennis_tmpl.php",
    e.Cricket_tmpl = "Cricket_tmpl.php",
    e["1X2_tmpl"] = "1X2_tmpl.php",
    e.CorrectScore_tmpl = "CorrectScore_tmpl.php",
    e.OeTg_tmpl = "OeTg_tmpl.php",
    e.HTFT_tmpl = "HTFT_tmpl.php",
    e.OeTg_tmpl = "OeTg_tmpl.php",
    e.FGLG_tmpl = "FGLG_tmpl.php",
    e.MixParlay_tmpl = "MixParlay_tmpl.php?sport=1",
    e.MixParlay_tmpl_NBA = "MixParlay_tmpl.php?sport=2",
    e.MixParlay_tmpl_Tennis = "MixParlay_tmpl.php?sport=5",
    e.MixParlay_tmpl_Baseball = "MixParlay_tmpl.php?sport=8",
    e.MixParlay_tmpl_Cricket = "MixParlay_tmpl.php?sport=27",
    e.Horse_tmpl = "Horse_tmpl.php",
    e.Horse_Fixed_tmpl = "Horse_Fixed_tmpl.php",
    e.Finance_tmpl = "Finance_tmpl.php",
    e.Outright_tmpl = "Outright_tmpl.php",
    e.Bingo_tmpl = "Bingo_tmpl.php",
    e.Greyhounds_tmpl = "Greyhounds_tmpl.php",
    e.League_tmpl = "Match_tmpl.php?Scope=League",
    e.Match_tmpl = "Match_tmpl.php?Scope=Match",
    LOAD_TMPL_GAP) {
        for (var _ in e)
            if (null == fFrame.hash_TmplLoaded[_]) {
                null != fFrame.document.getElementById(_) && (fFrame.document.getElementById(_).contentWindow.location.href = e[_],
                fFrame.hash_TmplLoaded[_] = !0)
            }
        LOAD_TMPL_GAP = !1
    }
}
function selectDate(e, _) {
    if ("" != _) {
        if (null != document.DataForm) {
            if (!REFRESH_GAP)
                return;
            a = document.DataForm
        } else {
            if (!REFRESH_GAP_D)
                return;
            a = document.DataForm_D
        }
        a.DT.value = _;
        var t = _.split("/");
        1 == t[0].length && (t[0] = "0" + t[0]),
        1 == t[1].length && (t[1] = "0" + t[1]),
        _ = t[2] + t[0] + t[1]
    } else
        (a = null != document.DataForm ? document.DataForm : document.DataForm_D).DT.value = "";
    return SelKickoffTime != _ && (SelKickoffTime = _,
    $("#divSelectDate").find("span").css("color", siteObj._SelectDateColor_Def),
    e && (e.style.color = "#9F0915"),
    null != g_OddsKeeper_D && "object" == typeof g_OddsKeeper_D ? (g_OddsKeeper_D.paintOddsTable(),
    OpenEsportFirstMore()) : void 0 !== g_OddsKeeper && null != g_OddsKeeper && "object" == typeof g_OddsKeeper && g_OddsKeeper.paintOddsTable()),
    btnstop(),
    void btnstart();
    var a
}
function getShowMatchHtml(e, _, t) {
    return "<a href='javascript:showMatchOdds(\"" + e + '", "' + _ + '", "' + t + "\");'><img border='0' src='" + fFrame.imgServerURL + "template/public/images/more_game.gif' /></a>"
}
function getStatsHtml(e) {
    switch (fFrame.userSite.toLowerCase()) {
    case "d":
        return "";
    default:
        return "MixParlay" == $("body").attr("id") ? "" : "<a href='javascript:openStatsInfo(\"" + e + "\");' title='" + fFrame.RES_StatisticInfo + '\'><span class="iconOdds stats"></span></a>'
    }
}
function getLiveChartHtml(e) {
    return "<a href='javascript:openLiveChart(\"" + e + "\");' title='" + fFrame.RES_LiveChart + '\'><span class="iconOdds liveChart"></span></a>'
}
function checkSportRadarCss(e) {
    var _ = "soccer";
    switch (e) {
    case 2:
        _ = "basketball";
        break;
    case 5:
        _ = "tennis";
        break;
    case 8:
        _ = "baseball";
        break;
    case 9:
        _ = "badminton";
        break;
    default:
        _ = "soccer"
    }
    return _
}
function getSportRadarHtml(e, _, t) {
    if ("MixParlay" == $("body").attr("id"))
        return "";
    var a = checkSportRadarCss(t);
    if (0 == e || !fFrame.CanSeeLiveInfo)
        return "";
    return null != document.getElementById("LiveInfoMenu") ? "<span title='" + fFrame.RES_GV_MatchInfo + '\' style="display:inline-block;" onclick="openLiveInfoMiddle(event,' + e + ",1,'0','','')\" onmouseover='OpenLiveInfoMenu(" + e + ",this)' onmouseout='CloseLiveInfoMenu(" + e + ",this)'><span class=\"iconOdds " + a + '"></span><div id="lf' + e + '" style="display:none; position:absolute; float:right;"></div></span>' : void 0
}
function getRunningHtmlOtherBetType(e, _, t, a) {
    if ("MixParlay" == $("body").attr("id"))
        return "";
    var r = checkSportRadarCss(a);
    return 0 != e && fFrame.CanSeeLiveInfo ? "<span title='" + fFrame.RES_GV_MatchInfo + '\' style="display:inline-block;" onclick="openLiveLiveInfoForRunningBall(event,' + e + ",'" + _ + "','" + t + "'," + a + ')" ><span class="iconOdds ' + r + '"></span><div id="lf' + e + '" style="display:none; position:absolute; float:right;"></div></span>' : ""
}
function getRunningHtml(e, _, t, a, r, d) {
    if ("MixParlay" == $("body").attr("id"))
        return "";
    var s = checkSportRadarCss(d);
    if (0 == e || !fFrame.CanSeeLiveInfo)
        return "";
    var o = document.getElementById("LiveInfoMenu");
    return 2 == d || 8 == d ? "<span title='" + fFrame.RES_GV_MatchInfo + '\' style="display:inline-block;" onclick="openLiveInfoMiddle(event,' + e + ",1,'" + t + "','" + a + "','" + r + "'," + d + ')" ><span class="iconOdds ' + s + '"></span><div id="lf' + e + '" style="display:none; position:absolute; float:right;"></div></span>' : null != o ? "<span title='" + fFrame.RES_GV_MatchInfo + '\' style="display:inline-block;" onclick="openLiveInfoMiddle(event,' + e + ",1,'" + t + "','" + a + "','" + r + '\')" ><span class="iconOdds ' + s + '"></span><div id="lf' + e + '" style="display:none; position:absolute; float:right;"></div></span>' : void 0
}
function openStatsInfo(e) {
    window.open("StatsFrame.php?MatchId=" + e, "StatsInfo" + e)
}
function openBetRadarVSStatsInfo(e, _, t, a) {
    switch (e.toString()) {
    case "191":
        vf_iframe.openVfecStats(_, t, a);
        break;
    case "193":
        vf_iframe.openVblStats(_, t);
        break;
    default:
        vf_iframe.openVfStats(_, t, a)
    }
}
function openLiveChart(e) {
    var _ = window.screen.availHeight - 68;
    _ > 768 && (_ = 768),
    fFrame.openWindowsHandle("LiveChart" + e, !0, "", "LiveChart.php?MatchId=" + e, "height=" + _ + ", width=1024, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, resizable=yes, location=no, status=no", !1, function(e, _) {})
}
function OpenLiveInfoMenu(e, _) {
    var t = $(_).find("#lf" + e);
    0 == t.length && (t = $(document.getElementById("lf" + e))),
    "" == t.html() && t.html(getLiveInfoMenuHtml(e)),
    t.css("display", "block")
}
function CloseLiveInfoMenu(e, _) {
    var t = $(_).find("#lf" + e);
    0 == t.length && (t = $(document.getElementById("lf" + e))),
    t.length > 0 && t.css("display", "none")
}
function getLiveInfoMenuHtml(e) {
    "none" != $("#btnSwitchBack").css("display") && null != document.getElementById("LiveInfoMenu") && $("#LFM_FullView").css("display", "block");
    var _ = document.getElementById("LiveInfoMenu");
    if (null != _) {
        var t = _.innerHTML;
        return t = t.replace(/JSF/, "javascript:openLiveInfo(event," + e + ");"),
        t = t.replace(/JSL/, "javascript:openLiveInfoMiddle(event," + e + ", '1', '3', '', '');"),
        t = t.replace(/JSS/, "javascript:openLiveInfoSmall(event," + e + ");")
    }
    return ""
}
function CloseSmallLiveInfo() {
    $("#TipLiveInfo").remove(),
    $(window).off("scroll", AdjustLiveInfoReSize),
    $(window).off("resize", AdjustLiveInfoReSize),
    $(window).off("scroll", SmallLiveInfoFixScrollHandler),
    $("#SmallLiveInfoFrame").attr("src", ""),
    CurrentLiveInfoMatchID = "0",
    FinalpaintOddsTable(),
    $("#SmallLiveInfo").slideUp("slow"),
    $("#SmallLiveInfo").removeClass("fixed"),
    null != fFrame.topx.miniOddsObj && (fFrame.topx.miniOddsObj.SetLiveInfo(!1, ""),
    fFrame.topx.miniOddsObj.CloseNews())
}
function switchLiveInfoDisplay() {
    $("#MainFly").removeClass("fixed"),
    $("#MiddleLiveInfo").slideUp("slow"),
    $("#MiddleLiveInfoFrame").attr("src", ""),
    $(window).off("scroll", MiddleLiveInfoFixScrollHandler),
    arr_Match = new Array("0"),
    CurrentLiveInfoMatchID = "0",
    $("#selLeagueType_Div").show(),
    $("#aSorter_Div").show(),
    $(".selectLeague").show(),
    haveParlay && $("#b_SwitchToParlay").show(),
    haveSelectDate && $("#divSelectDate").show(),
    $("#btnSwitchBack").hide()
}
function stopClickEvent(e) {
    if (void 0 !== e) {
        var _ = e || window.event;
        void 0 !== _ && null != _ && (void 0 !== _.cancelBubble ? _.cancelBubble = !0 : _.cancel = !0,
        _.stopPropagation && _.stopPropagation())
    }
}
function openLiveLiveInfoForRunningBall(e, _, t, a, r) {
    GetSourcePage();
    fFrame.IsShowLiveInfoSideView = !1,
    switchLiveInfoDisplay(),
    CloseSmallLiveInfo(),
    0 != $("#AllSingleOdds").length && ($("#oTableContainer_O").show(),
    arr_ShowMixParlay.O = !0),
    null != document.getElementById("LiveInfoMenu") && $("#LFM_FullView").css("display", "none"),
    fFrame.openWindowsHandle("Running Ball", !0, null, "RunningBallInfo.php?MatchId=" + _ + "&Homename=" + t + "&Awayname=" + a + "&SportType=" + r, "scrollbars=yes,resizable=yes,top=0,left=0,width=800,Height=295", !1),
    stopClickEvent(e)
}
function openLiveInfo(e, _) {
    var t = GetSourcePage();
    fFrame.IsShowLiveInfoSideView = !1,
    closeMore(),
    switchLiveInfoDisplay(),
    CloseSmallLiveInfo(),
    0 != $("#AllSingleOdds").length && ($("#oTableContainer_O").show(),
    arr_ShowMixParlay.O = !0),
    null != document.getElementById("LiveInfoMenu") && $("#LFM_FullView").css("display", "none"),
    LiveInfoWindowHandle = window.open("LiveInfo.php?MatchId=" + _ + "&SPage=" + t + "&Type=full", "LiveInfo" + _, "_blank"),
    stopClickEvent(e)
}
function LiveInfoBackButton() {
    closeMore(),
    switchLiveInfoDisplay(),
    CloseSmallLiveInfo(),
    null != document.getElementById("LiveInfoMenu") && $("#LFM_FullView").css("display", "none"),
    FinalpaintOddsTable(),
    0 != $("#AllSingleOdds").length && ($("#oTableContainer_O").show(),
    "B" == RES_PageType && $("#menu").show(),
    arr_ShowMixParlay.O = !0)
}
function canOpenSingView(e) {
    var _ = $("body").attr("id");
    return !!~["UnderOver", "AllSingleOdds", "Live", "NBA", "Baseball"].indexOf(_)
}
function ForceOpenSingle(e, _, t, a, r) {
    "E" == e && selectDate($("span.title").first()[0], "");
    var d = openLiveInfoMiddle(null, _, "0" == t ? "0" : "1", t, a, r);
    if (0 == $("#tmplTable").length)
        var s = setInterval(function() {
            $("#tmplTable").length > 0 && (openLiveInfoMiddle(null, _, "0" == t ? "0" : "1", t, a, r),
            clearInterval(s))
        }, 100);
    return d
}
function GotoSingleMatch(e, _, t, a, r, d) {
    if (arr_League.length > 1 || 1 == arr_League.length && "0" != arr_League[0]) {
        arr_League = new Array("0"),
        FinalpaintOddsTable();
        var s = new Object;
        s.market = fFrame.LastSelectedMArket.toLowerCase(),
        s.gamemode = fFrame.LastSelectedMenu,
        s.sport = fFrame.LastSelectedSport,
        s.pagename = "underover_data.php".toLowerCase(),
        s.selleague = arr_League.toString(),
        s.mode = "league",
        s.writedb = "0",
        ExecAjax("RecSelData.php", s, "POST", "RecSelLeague", "RecSelLeague")
    }
    var o = findOddsKeeper(_, "L" == t.toUpperCase());
    if (null != o && null != o.EventList && o.BetTypes.indexOf(1) > -1)
        for (var n in o.EventList)
            if (o.EventList[n].MatchId == a) {
                var D = "0";
                return o.EventList[n].GVType && (D = o.EventList[n].GVType),
                ForceOpenSingle(t, a, D, r, d)
            }
    this.appentArg = "&StreamingID=" + a + "&marketid=" + t + "&h=" + r + "&a=" + d,
    fFrame.LastSelectedMenu != e ? fFrame.leftx.SwitchMenuType(e, "", _, "L" == t.toUpperCase() ? "T" : t.toUpperCase()) : (fFrame.leftx.LoadMenuData("L" == t.toUpperCase() ? "T" : t.toUpperCase().toUpperCase()),
    fFrame.leftx.SwitchSport("", _, !1, !1, "OU"))
}
function openStreamingMiddle(e, _) {
    var t = findOddsKeeper(1, !0);
    if (null != t && null != t.EventList)
        for (var a in t.EventList)
            if (t.EventList[a].MatchId == _)
                return $("#MiddleLiveInfoFrame").height("417"),
                openLiveInfoMiddle(e, _, "2", "3", "", "");
    this.appentArg = "&StreamingID=" + _,
    fFrame.leftx.SwitchMarket("T"),
    fFrame.leftx.SwitchSport("", "1", !1, !1, "OU")
}
function OpenStreamingFrame(e) {
    var _ = "StreamingLv.php?Matchid=" + e + "&TVmode=medium";
    $("#MiddleLiveInfoFrame").attr("src") != _ ? ($("#MiddleLiveInfoFrame").attr("src", _),
    $("#MiddleLiveInfoFrame").ready(function() {
        $("#MiddleLiveInfo").slideDown("slow"),
        $(window).scroll(MiddleLiveInfoFixScrollHandler)
    })) : ($("#MiddleLiveInfo").slideDown("slow"),
    $(window).scroll(MiddleLiveInfoFixScrollHandler))
}
function openLiveInfoMiddle(e, _, t, a, r, d, s) {
    if (void 0 === s && (s = 1),
    checkIsFavorite(_)) {
        if (0 != canOpenSingView(_) || "2" == t) {
            if (fFrame.IsShowLiveInfoSideView = !1,
            (arr_Match = new Array).push(_),
            CloseSmallLiveInfo(),
            "0" == t && $("#MiddleLiveInfo").hide(),
            "1" == t) {
                if (1 == s)
                    switch (a) {
                    case "1":
                    case "2":
                        getRunningBallURL(_, r, d, s);
                        break;
                    default:
                        getLiveInfoURL(_, "M")
                    }
                else
                    getRunningBallURL(_, r, d, s);
                CurrentLiveInfoMatchID = _
            }
            if ("2" == t && (OpenStreamingFrame(_),
            CurrentLiveInfoMatchID = _),
            "none" != $("#b_SwitchToParlay").css("display") ? ($("#b_SwitchToParlay").hide(),
            haveParlay = !0) : haveParlay = !1,
            "AllSingleOdds" == $("body").attr("id") ? "none" != $("#menu").css("display") ? ($("#menu").hide(),
            haveSelectDate = !0) : haveSelectDate = !1 : "none" != $("#divSelectDate").css("display") ? ($("#divSelectDate").hide(),
            haveSelectDate = !0) : haveSelectDate = !1,
            $("#selLeagueType_Div").hide(),
            $("#aSorter_Div").hide(),
            $(".selectLeague").hide(),
            $("#btnSwitchBack").show(),
            0 == $(".en_Point.off").length && 0 == $(".ch_Point.off").length)
                if (1 == s) {
                    if (null != $(".none_rline.none_lline.none_tline").children("span:visible").children("a:visible"))
                        for (var o = $(".none_rline.none_lline.none_tline").children("span:visible").children("a:visible").length, n = 0; n < o; n++)
                            if (-1 != $(".none_rline.none_lline.none_tline").children("span:visible").children("a:visible")[n].getAttribute("onclick").indexOf("GetMore") && -1 == $(".none_rline.none_lline.none_tline").children("span:visible").children("a:visible")[n].className.indexOf(CLS_LS_Hide) && -1 == $(".none_rline.none_lline.none_tline").children("span:visible").children("a:visible")[n].className.indexOf(CLS_LS_OFF))
                                if (navigator.userAgent.indexOf("Safari") > -1) {
                                    var D = $(".none_rline.none_lline.none_tline").children("span:visible").children("a:visible")[n]
                                      , l = document.createEvent("MouseEvents");
                                    navigator.userAgent.indexOf("Edge") > -1 ? l.initEvent("click", !1, !1) : l.initMouseEvent("click", !0, !0, window),
                                    D.dispatchEvent(l)
                                } else
                                    $(".none_rline.none_lline.none_tline").children("span:visible").children("a:visible")[n].click()
                } else if (null != $(".line_unR").parent().children("td:visible") && "" != $("#MoreCount").text()) {
                    var p = $(".line_unR").next("td").next("td").next("td").next("td").next("td").next("td").next("td").next("td").children().find("a");
                    -1 != p[0].className.indexOf("en_Point") && p.click()
                }
            null != $(".iconOdds.more") && 0 == $(".iconOdds.more.off").length && $(".iconOdds.more").parent("a").click(),
            $(window).scrollTop(0),
            0 != $("#AllSingleOdds").length && ($("#oTableContainer_O").hide(),
            arr_ShowMixParlay.O = !1),
            e && stopClickEvent(e)
        }
    } else
        refreshAll()
}
function checkIsFavorite(e) {
    if ("F" == RES_PageType)
        for (var _ = document.getElementsByName("fav_01" + e), t = 0; t < _.length; t++) {
            var a = _[t];
            if (null != a && "iconOdds favoriteAdd" != a.className)
                return !1
        }
    return !0
}
function openLiveInfoSmall(e, _) {
    "none" != $("#btnSwitchBack").css("display") && LiveInfoBackButton(),
    fFrame.IsShowLiveInfoSideView = !0,
    closeMore(),
    $(window).resize(AdjustLiveInfoReSize),
    $(window).scroll(AdjustLiveInfoReSize),
    $(window).scroll(SmallLiveInfoFixScrollHandler),
    -1 == indexOf(arr_Match, "0") && switchLiveInfoDisplay(),
    CurrentLiveInfoMatchID = _,
    FinalpaintOddsTable(),
    AdjustLiveInfoReSize(),
    getLiveInfoURL(_, "S"),
    $(window).scrollTop($(window).scrollTop() - 1),
    $(window).scrollTop($(window).scrollTop() + 1),
    stopClickEvent(e)
}
function closeLiveInfoWindow() {
    null != LiveInfoWindowHandle && LiveInfoWindowHandle.close()
}
function closeMore() {
    if ("none" != $("#btnSwitchBack").css("display")) {
        if ($(".en_Point.off").length > 0 || $(".ch_Point.off").length > 0) {
            if (null != $(".none_rline.none_lline.none_tline").children("span:visible").children("a:visible"))
                for (var e = $(".none_rline.none_lline.none_tline").children("span:visible").children("a:visible").length, _ = 0; _ < e; _++)
                    if (-1 != $(".none_rline.none_lline.none_tline").children("span:visible").children("a:visible")[_].getAttribute("onclick").indexOf("GetMore") && -1 == $(".none_rline.none_lline.none_tline").children("span:visible").children("a:visible")[_].className.indexOf(CLS_LS_Hide) && -1 == $(".none_rline.none_lline.none_tline").children("span:visible").children("a:visible")[_].className.indexOf(CLS_LS_OFF))
                        if (navigator.userAgent.indexOf("Safari") > -1) {
                            var t = $(".none_rline.none_lline.none_tline").children("span:visible").children("a:visible")[_]
                              , a = document.createEvent("MouseEvents");
                            navigator.userAgent.indexOf("Edge") > -1 ? a.initEvent("click", !1, !1) : a.initMouseEvent("click", !0, !0, window),
                            t.dispatchEvent(a)
                        } else
                            $(".none_rline.none_lline.none_tline").children("span:visible").children("a:visible")[_].click();
            if (null != $(".line_unR").parent().children("td:visible")) {
                var r = $(".line_unR").next("td").next("td").next("td").next("td").next("td").next("td").next("td").next("td").children().find("a");
                -1 != r[0].className.indexOf("en_Point") && r.click()
            }
        }
        $(".iconOdds.more.off").length > 0 && $(".iconOdds.more.off").parent("a").click()
    }
}
function GetSourcePage() {
    var e = $("body").attr("id");
    if ("AllSingleOdds" == e)
        switch (RES_PageType) {
        case "B":
            e = "MatchInfo";
            break;
        case "S":
            e = "Search";
            break;
        default:
            e = "Favorite"
        }
    return e
}
function getRunningBallURL(e, _, t, a) {
    var r = "RunningBallInfo.php?MatchId=" + e + "&Homename=" + _ + "&Awayname=" + t + "&SportType=" + a;
    $("#MiddleLiveInfoFrame").height("261"),
    $("#MiddleLiveInfoFrame").attr("src") != r ? ($("#MiddleLiveInfoFrame").attr("src", r),
    $("#MiddleLiveInfoFrame").ready(function() {
        $("#MiddleLiveInfo").slideDown("slow"),
        $(window).scroll(MiddleLiveInfoFixScrollHandlerForGameVisualization)
    })) : $("#MiddleLiveInfo").slideDown("slow")
}
function getLiveInfoURL(e, _, t) {
    var a = window.location.protocol + "//mTracker.872458.com/"
      , r = parent.UserLang
      , d = "full";
    switch (-1 == parent.SkinRootPath.indexOf("maxbet") && (a = window.location.protocol + "//mTracker.245887.com/"),
    _) {
    case "M":
        d = "single";
        break;
    case "S":
        d = "side";
        break;
    default:
        d = "full"
    }
    var s = GetSourcePage()
      , o = new Date
      , n = o.getFullYear().toString()
      , D = (o.getMonth() + 1).toString()
      , l = o.getDate().toString();
    a = a + "BetRadarLiveInfo.php?LiveInfoType=" + d + "&LangType=" + r + "&MatchId=" + e + "&D=" + (n + (D[1] ? D : "0" + D[0]) + (l[1] ? l : "0" + l[0])) + "&Frm=" + s + "&S=" + MD5(e + skeycode),
    "M" == _ ? ($("#MiddleLiveInfoFrame").height("397"),
    $("#MiddleLiveInfoFrame").attr("src") != a ? ($("#MiddleLiveInfoFrame").attr("src", a),
    $("#MiddleLiveInfoFrame").ready(function() {
        $("#MiddleLiveInfo").slideDown("slow"),
        $(window).scroll(MiddleLiveInfoFixScrollHandler)
    })) : $("#MiddleLiveInfo").slideDown("slow")) : (null != fFrame.topx.miniOddsObj && fFrame.topx.miniOddsObj.SetLiveInfo(!0, a),
    $("#SmallLiveInfoFrame").attr("src") != a ? ($("#SmallLiveInfoFrame").attr("src", a),
    $("#SmallLiveInfoFrame").ready(function() {
        $("#SmallLiveInfo").slideDown("slow")
    })) : $("#SmallLiveInfo").slideDown("slow"),
    fFrame.topx.miniOddsObj.CloseNews())
}
function CheckCursorStyle(e, _) {
    1 == e ? 0 != $("#selections").length ? $("." + _).css("cursor", "text") : $("." + _).css("cursor", "pointer") : $("." + _).css("cursor", "default")
}
function getRedCardHtml(e) {
    for (var _ = "", t = 0; t < e; t++)
        _ += "<img class='code' border='0' src='" + fFrame.imgServerURL + "template/public/images/RedCard.gif' />";
    return _
}
function getFavoritesHtml(e, _, t, a) {
    var r = t ? "iconOdds favoriteAdd" : "iconOdds favorite";
    return "<a href='javascript:addMatchFavorites(\"" + e + '","' + _ + '",' + t + "," + a + ");' title='" + (t ? fFrame.RES_RemoveFavorite : fFrame.RES_AddFavorite) + "'><span name='fav_" + e + "' class='" + r + "'></span></a>"
}
function getFavLeaguesHtml(e, _, t, a) {
    var r = t ? "iconOdds favoriteAdd" : "iconOdds favorite";
    LeagueFavObj[_.toString()] = !!t;
    return '<span onmouseover = \'javascript:$(this).css("cursor","pointer");\' onmouseout = \'javascript:$(this).css("cursor","default");\' onclick=\'javascript:addLeagueFavorites(event,"' + e + '","' + _ + '",' + t + "," + a + ",null);' title='" + (t ? fFrame.RES_RemoveFavorite : fFrame.RES_AddFavorite) + "'><span id='fav_" + _ + "' class='" + r + "'></span></span>"
}
function getScoreMapHtml(e) {
    fFrame.SiteId;
    return "";
    return 1 == fFrame.SiteMode ? "" : "<a onclick='javascript:popScoreMap(\"" + e + "\");' style='cursor:pointer' title='" + fFrame.RES_ScoreMap + '\'><span class="iconOdds scoreMap"></span></a>'
}
function getScoreHtml(e, _) {
    return 1 == fFrame.SiteMode ? "" : "<div id='sco_" + e + "' style='display:inline'><a href='javascript:showScores(\"" + e + '","' + _ + "\");'>Score</a></div>"
}
function betBingo(e, _, t, a, r, d) {
    if (fFrame.leftx.$("#Bingo_BPMinMaxBetAlert").css("display", "none"),
    fFrame.leftx.$("#Bingo_BPOddsChangeAlert").css("display", "none"),
    CheckIsIpad() && !CheckIScroll() && parent.window.scrollTo(0, 0),
    trim(r).length < 1)
        return !1;
    var s = document.getElementById("CanBetNumberMsg").value;
    d >= 8101 && d <= 8105 && (s = document.getElementById("CanBetHappy5Msg").value),
    fFrame.CanBetNumberGame ? fFrame.leftx.DoBingoBetProcess(t, a, r, d) : alert(s)
}
function betLucky3(e) {
    fFrame.leftx.$("#Lucky3_ErrorMsg").css("display", "none"),
    fFrame.CanSeeLucky3 && fFrame.leftx.DoLucky3BetProcess(e)
}
function bet(e, _, t, a, r, d) {
    fFrame.leftx.$("#BPMinMaxBetAlert").css("display", "none"),
    fFrame.leftx.$("#BPOddsChangeAlert").css("display", "none"),
    CheckIsIpad() && !CheckIScroll() && parent.window.scrollTo(0, 0),
    "" != t && "" != r && (parseInt(e, 10) ? "undefined" == typeof betParlay ? parent.leftx.AddParlay(_, t, a, r, fFrame.LastSelectedSport, d) : betParlay(_, t, a, r, d) : fFrame.leftx.DoBetProcess(t, a, r, null, null, d))
}
function ReflashSingleStreaming() {
    if (null != fFrame.leftx) {
        var e = fFrame.leftx.document.getElementById("iTV")
          , _ = e.src;
        e.src = "",
        e.src = _
    }
}
function openLeague(e, _, t, a, r, d, s) {
    more_mode = "SL",
    LeaguePage = s,
    nowsKeeper = null,
    document.getElementById("oPopContainer").innerHTML = "";
    var o = !1
      , n = !1;
    if (initialTmpl("League_tmpl", "League_tmpl.php", "openLeague(" + e + ",'" + _ + "','" + t + "','" + a + "','" + r + "','" + d + "','" + s + "');")) {
        "SportsMixParlay" == s && (o = !0),
        "Outright" == s && (n = !0),
        GetLeagueHTML(o, n);
        var D = document.getElementById("PopDiv");
        D.style.width = e + "px";
        var l = document.getElementById("PopTitleText")
          , p = document.getElementById("oPopContainer");
        if (l.innerHTML = _,
        p.innerHTML = sHTML.join(""),
        null == PopLauncher) {
            var O = document.getElementById("PopTitle")
              , i = document.getElementById("PopCloser");
            PopLauncher = new DivLauncher(D,O,i)
        }
        PopLauncher.open(50, 50, !0);
        var S = document.getElementById("chkSave");
        if (IsSaveLeague && (S.checked = !0),
        o)
            for (var E = sSportL.split(","), F = 0; F < E.length; F++) {
                checkLeagueBySport(E[F])
            }
        else
            checkLeague()
    }
}
function GetLeagueHTML(e, _) {
    var t = fFrame.document.getElementById("League_tmpl").contentWindow;
    if ((sHTML = new Array).push("<div class='popWTableArea'>"),
    sHTML.push(t.document.getElementById("League_Header").innerHTML),
    _) {
        sHTML.push("<div class='popWBlueArea'>"),
        genLeagueHeadTmpl(_);
        for (var a = 0; a < LeagueListBySport.S0.length; a++) {
            sHTML.push("<tr valign='top' align='left' style='line-height:16px;'>");
            for (var r = 0; r < 2; r++)
                (a += r) < LeagueListBySport.S0.length ? genLeagueTmpl(LeagueListBySport.S0[a].SportId, LeagueListBySport.S0[a].LeagueId, LeagueListBySport.S0[a].LeagueName, e, LeagueListBySport.S0[a].Checked) : genLeagueTmpl("", "", "", e, !1);
            sHTML.push("</tr>")
        }
        genLeagueFooterTmpl(_),
        sHTML.push("</div>")
    } else
        for (var d = 1; d < 162; d++)
            if (void 0 !== LeagueListBySport["S" + d] && 0 != LeagueListBySport["S" + d].length) {
                if (sSportL = "" == sSportL ? d.toString() : sSportL + "," + d.toString(),
                genSportTmpl(LeagueListBySport["S" + d][0].SportId, LeagueListBySport["S" + d][0].SportName, e),
                genLeagueHeadTmpl(_),
                1 == d)
                    if (1 != SelMainMarket || e)
                        for (a = 0; a < LeagueListBySport["S" + d].length; a++) {
                            sHTML.push("<tr valign='top' align='left' style='line-height:16px;'>");
                            for (r = 0; r < 2; r++)
                                (a += r) < LeagueListBySport["S" + d].length ? genLeagueTmpl(LeagueListBySport["S" + d][a].SportId, LeagueListBySport["S" + d][a].LeagueId, LeagueListBySport["S" + d][a].LeagueName, e, LeagueListBySport["S" + d][a].Checked) : genLeagueTmpl("", "", "", e, !1);
                            sHTML.push("</tr>")
                        }
                    else {
                        var s = {};
                        s = cloneMainLeague(LeagueListBySport["S" + d]);
                        for (var a = 0; a < s.length; a++) {
                            sHTML.push("<tr valign='top' align='left' style='line-height:16px;'>");
                            for (var r = 0; r < 2; r++)
                                (a += r) < s.length ? genLeagueTmpl(s[a].SportId, s[a].LeagueId, s[a].LeagueName, e, s[a].Checked) : genLeagueTmpl("", "", "", e, !1);
                            sHTML.push("</tr>")
                        }
                    }
                else
                    for (a = 0; a < LeagueListBySport["S" + d].length; a++) {
                        sHTML.push("<tr valign='top' align='left' style='line-height:16px;'>");
                        for (r = 0; r < 2; r++)
                            (a += r) < LeagueListBySport["S" + d].length ? genLeagueTmpl(LeagueListBySport["S" + d][a].SportId, LeagueListBySport["S" + d][a].LeagueId, LeagueListBySport["S" + d][a].LeagueName, e, LeagueListBySport["S" + d][a].Checked) : genLeagueTmpl("", "", "", e, !1);
                        sHTML.push("</tr>")
                    }
                genLeagueFooterTmpl(_)
            }
    sHTML.push(t.document.getElementById("League_Footer").innerHTML),
    sHTML.push("</div>")
}
function genSportTmpl(e, _, t) {
    var a = "none";
    t && (a = "block"),
    sHTML.push("<div id='SportArea_" + e + "' class='popWBlueArea'>"),
    sHTML.push("<div class='header'>"),
    sHTML.push("<span class='icon' onclick='SportControl(" + e + ");' style='display:block;'></span>"),
    sHTML.push("<input id='chkSport_" + e + "' type='checkbox' style='display:" + a + ";' onclick='checkAllBySport(" + e + ");' name='chkSport_" + e + "'>"),
    sHTML.push("<span class='title' onclick='SportControl(" + e + ");'>" + _ + "</span>"),
    sHTML.push("</div>")
}
function genLeagueTmpl(e, _, t, a, r) {
    var d = ""
      , s = "block"
      , o = "checkLeague()";
    a ? (o = "checkLeagueBySport(" + e + ")",
    e = _ + "_" + e) : e = _,
    r && (d = "checked"),
    "" == _ && (s = "none"),
    sHTML.push("<td width='23' style='vertical-align: top;'>"),
    sHTML.push("<input id='" + e + "' type='checkbox' style='margin:2px;padding:0; display:" + s + ";' value='" + _ + "' onclick='" + o + ";' name='LF' " + d + ">"),
    sHTML.push("</td>"),
    sHTML.push("<td width='270' style='vertical-align: top;'>"),
    sHTML.push(t + "<br></td>"),
    sHTML.push("<td width='1'> </td>")
}
function genLeagueHeadTmpl(e) {
    e || (sHTML.push("<div class='content'>"),
    sHTML.push("<div class='line'></div>")),
    sHTML.push("<table class='popWSelectTab' width='100%' border='0' cellspacing='0' cellpadding='0'>"),
    sHTML.push("<tbody>")
}
function genLeagueFooterTmpl(e) {
    sHTML.push("</tbody>"),
    sHTML.push("</table>"),
    e || (sHTML.push("</div>"),
    sHTML.push("</div>"))
}
function checkLeagueBySport(e) {
    var _ = "chkSport_" + e
      , t = document.getElementById(_)
      , a = document.getElementById("chkLFAll")
      , r = document.getElementsByName("LF");
    for (i = 0; i < r.length; i++)
        if ("0" != r[i].value) {
            var d = r[i].value + "_" + e;
            if (null != document.getElementById(d)) {
                if (!document.getElementById(d).checked)
                    return t.checked = !1,
                    void (a.checked = !1)
            }
        }
    null != t && (t.checked = !0),
    checkLeague()
}
function checkLeague() {
    var e = document.getElementById("chkLFAll")
      , _ = document.getElementsByName("LF");
    for (i = 0; i < _.length; i++)
        if (0 != _[i].value && !_[i].checked)
            return void (e.checked = !1);
    e.checked = !0
}
function checkAllBySport(e) {
    var _ = document.getElementsByName("LF")
      , t = "chkSport_" + e
      , a = document.getElementById(t);
    for (i = 0; i < _.length; i++)
        if (0 != _[i].value) {
            var r = _[i].value + "_" + e;
            null != document.getElementById(r) && (_[i].checked = a.checked)
        }
    checkLeague()
}
function checkAll() {
    var e = document.getElementsByName("LF")
      , _ = document.getElementById("chkLFAll");
    for (i = 0; i < e.length; i++)
        e[i].checked = _.checked;
    for (i = 1; i < 100; i++) {
        var t = "chkSport_" + i;
        null != document.getElementById(t) && (document.getElementById(t).checked = _.checked)
    }
}
function go() {
    // console.log('go2')
    var e = document.getElementById("chkLFAll")
      , _ = document.getElementsByName("LF")
      , t = document.getElementById("chkSave")
      , a = t.checked ? "1" : "0";
    if (IsSaveLeague = !!t.checked,
    e.checked) {
        for (i = 0; i < _.length; i++)
            _[i].checked = !1;
        e.checked = !0,
        arr_League = new Array("0")
    } else
        for (arr_League = new Array,
        i = 0; i < _.length; i++)
            "" != _[i].value && "0" != _[i].value || (_[i].checked = !1),
            _[i].checked && arr_League.push(_[i].value);
    var r = LeaguePage + "_data.php"
      , d = new Object;
    d.market = fFrame.LastSelectedMArket.toLowerCase(),
    d.gamemode = fFrame.LastSelectedMenu,
    d.sport = fFrame.LastSelectedSport,
    d.pagename = r.toLowerCase(),
    d.selleague = arr_League.toString(),
    d.mode = "league",
    d.writedb = a,
    SelLeagueThreadId = "RecSelLeague",
    ExecAjax("RecSelData.php", d, "POST", SelLeagueThreadId, "RecSelLeague"),
    PopLauncher.close(),
    FinalpaintOddsTable()

    var sl = arr_League.length==0 ? '0' : arr_League.join(",");
    document.DataForm_L.SelectLeague.value = sl;
    document.DataForm_D.SelectLeague.value = sl;
}
function findOddsKeeper(e, _) {
    if ("object" == typeof arr_ShowMixParlay) {
        var t = new Array
          , a = new Array;
        if (null != g_OddsKeeper_L && (t = g_OddsKeeper_L.getOddsKeeperArray()),
        null != g_OddsKeeper_D && (a = g_OddsKeeper_D.getOddsKeeperArray()),
        _) {
            if (arr_ShowMixParlay[e] && null != t[e]) {
                return t[e]
            }
        } else if (arr_ShowMixParlay[e] && null != a[e]) {
            return a[e]
        }
    } else if ("object" == typeof arr_OddsKeeper) {
        if (_ && null != arr_OddsKeeper[e])
            return arr_OddsKeeper[e]
    } else if (_) {
        if ("object" == typeof g_OddsKeeper_L && null != g_OddsKeeper_L)
            return g_OddsKeeper_L
    } else {
        if ("object" == typeof g_OddsKeeper_D && null != g_OddsKeeper_D)
            return g_OddsKeeper_D;
        if ("object" == typeof g_OddsKeeper && null != g_OddsKeeper)
            return g_OddsKeeper
    }
    return null
}
function FinalpaintOddsTable() {
    if ("object" == typeof arr_ShowMixParlay) {
        var e = new Array
          , _ = new Array;
        null != g_OddsKeeper_L && (e = g_OddsKeeper_L.getOddsKeeperArray()),
        null != g_OddsKeeper_D && (_ = g_OddsKeeper_D.getOddsKeeperArray());
        for (var t in arr_ShowMixParlay) {
            if (arr_ShowMixParlay[t] && null != e[t]) {
                (a = e[t]).paintOddsTable()
            }
            if (arr_ShowMixParlay[t] && null != _[t]) {
                (a = _[t]).paintOddsTable()
            }
        }
    } else if ("object" == typeof arr_OddsKeeper)
        for (var t in arr_OddsKeeper) {
            var a;
            null != (a = arr_OddsKeeper[t]) && a.paintOddsTable()
        }
    else
        "object" == typeof g_OddsKeeper_D && null != g_OddsKeeper_D && g_OddsKeeper_D.paintOddsTable(),
        "object" == typeof g_OddsKeeper_L && null != g_OddsKeeper_L && g_OddsKeeper_L.paintOddsTable(),
        "object" == typeof g_OddsKeeper && null != g_OddsKeeper && g_OddsKeeper.paintOddsTable(),
        OpenEsportFirstMore();
    btnstop(),
    btnstart()
}
function OpenEsportFirstMore() {
    if ("object" == typeof g_OddsKeeper_D && null != g_OddsKeeper_D && "43" == g_OddsKeeper_D.SportType && "43" == g_OddsKeeper_D.SportType && document.getElementsByName("MoreCount").length > 0)
        for (var e = document.getElementsByName("MoreCount"), _ = 0; _ < e.length; _++)
            if ("" != e[_].innerHTML)
                return void (-1 == e[_].parentElement.className.indexOf("off") && e[_].click())
}
function RecSelLeague(e) {
    1 == arr_League.length && "0" == arr_League[0] ? SelLeagueCnt = 0 : SelLeagueCnt = arr_League.length,
    checkLeagueCount()
}
function GetEventBGColor(e) {
    var _ = "";
    return "1" != fFrame.SiteMode && "0" != fFrame.SiteMode || (_ = "0" == e ? "#C6D4F1" : "#E4E4E4"),
    _
}
function GetLiveBGColor(e) {
    var _ = "";
    return "1" != fFrame.SiteMode && "0" != fFrame.SiteMode || (_ = "0" == e ? "#ffccbc" : "#ffddd2"),
    _
}
function GetMMREventBGColor(e) {
    return e == MMR_TR_0 ? "#bbbeeb" : "#d0d2f7"
}
function changeOddsType(e) {
    var _ = document.getElementById("selOddsType");
    if ("undefined" == typeof sSport || null == sSport || "190" != sSport && "191" != sSport && "192" != sSport && "193" != sSport && "194" != sSport) {
        null != PopLauncher && PopLauncher.close(),
        _.value != e && (_.value = e),
        "undefined" != typeof OddsDataLObj && (OddsDataLObj = []),
        "undefined" != typeof OddsDataObj && (OddsDataObj = []),
        "undefined" != typeof OddsDataObj_164 && (OddsDataObj_164 = []);

        fFrame.leftx.document.fomBetProcess_Data.OddsType.value = e;
        fFrame.leftx.document.fomBetProcess_Data_OT.OddsType.value = e;
        fFrame.leftx.document.fomBetProcessPhone_Data.OddsType.value = e;
        fFrame.leftx.document.fomBetProcess_Data_OTP.OddsType.value = e;
        fFrame.leftx.document.Bingo_fomBetProcess_Data.OddsType.value = e;
        fFrame.leftx.document.ParlayBetForm.OddsType.value = e;

        try {
            document.DataForm_D.RT.value,
            document.DataForm_L.OddsType.value = e,
            document.DataForm_D.OddsType.value = e,
            document.DataForm_L.RT.value = "W",
            document.DataForm_D.RT.value = "W",
            refreshAll()
        } catch (_) {
            document.DataForm.OddsType.value = e,
            document.DataForm.RT.value = "W",
            refreshData()
        }
        null != fFrame.topx.miniOddsObj && fFrame.topx.miniOddsObj.Refresh(e)
    } else {
        switch (_.value != e && (_.value = e),
        e) {
        case 4:
            setOddsType(sSport, "my");
            break;
        case 2:
            setOddsType(sSport, "hk");
            break;
        case 1:
            setOddsType(sSport, "dec");
            break;
        case 3:
            setOddsType(sSport, "indo");
            break;
        default:
            setOddsType(sSport, "us")
        }
        LoadOddsData(!1)
    }
}
function changeLeagueType(e) {
    null != PopLauncher && PopLauncher.close(),
    $("#ScoreMapDiv").css("visibility", "hidden"),
    $("#PopDiv").css("visibility", "hidden"),
    $("#scoremapmsg").css("visibility", "hidden"),
    SelMainMarket = e,
    getLeagueList();
    var _ = new Object;
    if (_.market = fFrame.LastSelectedMArket.toLowerCase(),
    _.gamemode = fFrame.LastSelectedMenu,
    _.sport = fFrame.LastSelectedSport,
    void 0 === fFrame.LastSelectedBettype ? _.pagename = "T" : _.pagename = fFrame.LastSelectedBettype,
    _.selmainmarket = SelMainMarket.toString(),
    _.mode = "mainmarket",
    SelLeagueThreadId = "RecSelMainMarket",
    ExecAjax("RecSelData.php", _, "POST", SelLeagueThreadId, "RecSelMainMarket"),
    "object" == typeof arr_OddsKeeper)
        for (var t in arr_OddsKeeper) {
            arr_OddsKeeper[t].paintOddsTable()
        }
    else
        "object" == typeof g_OddsKeeper_D && null != g_OddsKeeper_D && g_OddsKeeper_D.paintOddsTable(),
        "object" == typeof g_OddsKeeper_L && null != g_OddsKeeper_L && g_OddsKeeper_L.paintOddsTable(),
        "object" == typeof g_OddsKeeper && null != g_OddsKeeper && g_OddsKeeper.paintOddsTable();
    btnstop(),
    btnstart()
}
function RecSelMainMarket(e) {}
function showLeagueOdds(e, _, t) {
    window.location.href = "Match.php?Scope=League&Id=" + e + "&Sport=" + _ + "&Market=" + t
}
function showMatchOdds(e, _, t) {
    window.location.href = "Match.php?Scope=Match&Id=" + e + "&Sport=" + _ + "&Market=" + t
}
function afterRepaintTable(e) {
    var _;
    "oTableContainer_L" == e.parentNode.id ? (document.DataForm_L.RT.value = "U",
    _ = document.getElementById("oTableContainer_D"),
    window.clearTimeout(btnStartHandle_L),
    btnStartHandle_L = setTimeout("startButton('l');", 3e3)) : (document.DataForm_D.RT.value = "U",
    _ = document.getElementById("oTableContainer_L"),
    window.clearTimeout(btnStartHandle_D),
    btnStartHandle_D = setTimeout("startButton('d');", 3e3)),
    document.getElementById("BetList").style.display = "none",
    document.getElementById("OddsTr").style.display = "block";
    var t = 0;
    e.tBodies.length > 0 && (t = e.tBodies.length - 1),
    e.tBodies[t].rows.length <= 1 ? (e.parentNode.style.display = "none",
    "none" == _.style.display ? document.getElementById("TrNoInfo").style.display = "block" : document.getElementById("TrNoInfo").style.display = "none",
    "oTableContainer_L" == e.parentNode.id ? (document.getElementById("btnRefresh_L").style.display = "none",
    2 == fFrame.SiteMode && 2 == fFrame.Deposit_SiteMode && (document.getElementById("RunningGames").style.display = "none")) : (document.getElementById("btnRefresh_D").style.display = "none",
    2 == fFrame.SiteMode && 2 == fFrame.Deposit_SiteMode && (document.getElementById("sub_title").style.display = "none"))) : (e.parentNode.style.display = "",
    document.getElementById("TrNoInfo").style.display = "none",
    "oTableContainer_L" == e.parentNode.id ? (document.getElementById("btnRefresh_L").style.display = "",
    2 == fFrame.SiteMode && 2 == fFrame.Deposit_SiteMode && (document.getElementById("RunningGames").style.display = "")) : ("154" != this.SportType ? document.getElementById("btnRefresh_D").style.display = "none" : document.getElementById("btnRefresh_D").style.display = "",
    2 == fFrame.SiteMode && 2 == fFrame.Deposit_SiteMode && (document.getElementById("sub_title").style.display = ""),
    document.getElementById("btnRefresh_D").style.display = "")),
    "undefined" != typeof myScroll && myScroll.refresh()
}
function refreshAll() {
    "t" == PAGE_MARKET && 1 != fFrame.SiteMode ? refreshData_L() : (document.getElementById("oTableContainer_L").style.display = "none",
    2 == fFrame.SiteMode && 2 == fFrame.Deposit_SiteMode && (document.getElementById("RunningGames").style.display = "none")),
    refreshData_D()

}
function refreshData_L() {
    void 0 !== refreshMoreData && (refreshMoreData_L(1),
    refreshMoreData_L(2),
    refreshMoreData_L(5),
    refreshMoreData_L(43)),
    null != fFrame.leftx && null != fFrame.leftx.eObj ? REFRESH_GAP_L && (window.clearTimeout(CounterHandle_L),
    window.clearTimeout(RefresHandle_L),
    stopButton("l"),
    (null == arguments.callee.caller || void 0 !== arguments.callee.caller.name && "onclick" == arguments.callee.caller.name.toLowerCase()) && Check_refreshCnt(),
    null == g_OddsKeeper_L || iRefreshCount_L <= 0 ? (document.DataForm_L.RT.value = "W",
    iRefreshCount_L = REFRESH_COUNTDOWN) : iRefreshCount_L--,
    bShowLoading_L && (document.getElementById("BetList").style.display = "block",
    bShowLoading_L = !1),
    null != document.DataForm_L.key && (document.DataForm_L.key.value = fFrame.leftx.eObj.GetKey("lodds")),
    "W" == document.DataForm_L.RT.value && (g_OddsKeeper_L = null),
    document.DataForm_L.submit(),
    null != PopLauncher && null != sKeeper && PopLauncher.isOpened ? "L" == sKeeper.Market && null != ThreadId && "" != ThreadId && recallAjax(ThreadId) : ThreadId = null,
    161 != fFrame.LastSelectedSport && 164 != fFrame.LastSelectedSport || refreshData_D()) : window.setTimeout("refreshData_L()", 500)
}
function refreshData_D() {
    void 0 !== refreshMoreData && (refreshMoreData_D(1),
    refreshMoreData_D(2),
    refreshMoreData_D(5),
    refreshMoreData_D(43)),
    null != fFrame.leftx && null != fFrame.leftx.eObj ? "l" != PAGE_MARKET || 1 != fFrame.SiteMode ? REFRESH_GAP_D && (window.clearTimeout(CounterHandle_D),
    window.clearTimeout(RefresHandle_D),
    stopButton("d"),
    (null == arguments.callee.caller || void 0 !== arguments.callee.caller.name && "onclick" == arguments.callee.caller.name.toLowerCase()) && Check_refreshCnt(),
    null == g_OddsKeeper_D || iRefreshCount_D <= 0 ? (document.DataForm_D.RT.value = "W",
    iRefreshCount_D = REFRESH_COUNTDOWN) : iRefreshCount_D--,
    bShowLoading_D && (document.getElementById("BetList").style.display = "block",
    bShowLoading_D = !1),
    null != document.DataForm_D.key && (document.DataForm_D.key.value = fFrame.leftx.eObj.GetKey("dodds")),
    "W" == document.DataForm_D.RT.value && (g_OddsKeeper_D = null),
    document.DataForm_D.submit(),
    null != PopLauncher && null != sKeeper && PopLauncher.isOpened ? "L" != sKeeper.Market && null != ThreadId && "" != ThreadId && recallAjax(ThreadId) : ThreadId = null) : refreshData() : window.setTimeout("refreshData_D()", 500)
}
function changeButtonStatus(e, _, t) {
    var a = ""
      , r = !1
      , d = RES_REFRESH;
    if (_)
        a = " disable",
        r = !0,
        d = RES_PLEASE_WAIT;
    else {
        if ("AllSingleOdds" == parent.rightx.document.body.id && void 0 === t && fFrame.isAllSingleFirstLoad && "btnRefresh_D" == e)
            return;
        if ("AllSingleOdds" == parent.rightx.document.body.id && void 0 === t) {
            if ("btnRefresh_D" == e && "" != document.DataForm_D.ChangeOddsType.value)
                return;
            if ("btnRefresh_L" == e && "" != document.DataForm_L.ChangeOddsType.value)
                return
        } else
            "btnRefresh_D" == e && (fFrame.isAllSingleFirstLoad = !1)
    }
    $("#" + e).each(function() {
        this.title = d,
        this.className = "button" + a,
        this.firstChild.innerHTML = '<div class="icon-refresh" title="' + d + '"></div>' + (null == t ? "" : t),
        this.disabled = r
    }),
    $('a[name="' + e + '"]').each(function() {
        this.title = d,
        this.className = "btnIcon right" + a,
        this.firstChild.title = d,
        this.disabled = r
    })
}
function stopButton(e) {
    var _ = document.getElementById("divSelectDate");
    if (null != _ && "none" != _.style.display)
        for (var t = 0; t < _.childNodes.length; t++) {
            var a = _.childNodes[t];
            null != a.tagName && "SPAN" == a.tagName.toUpperCase() && (a.disabled = !0)
        }
    switch ("l" == e ? sw1 = !1 : sw2 = !1,
    setSelecterDisable("aSorter", !0),
    "l" == e ? (REFRESH_GAP_L = !1,
    changeButtonStatus("btnRefresh_L", !0)) : (REFRESH_GAP_D = !1,
    changeButtonStatus("btnRefresh_D", !0),
    $("#HourContainer_Div").length > 0 && setSelecterDisable("HourContainer", !0)),
    $("#selOddsType_Div").length > 0 && setSelecterDisable("selOddsType", !0),
    $("#selLeagueType_Div").length > 0 && setSelecterDisable("selLeagueType", !0),
    document.DataForm_L.Sport.value) {
    case "164":
        setTimeout("startButton('" + e + "')", 5e3);
        break;
    default:
        setTimeout("startButton('" + e + "')", 15e3)
    }
}
function startButton(e) {
    if (!("l" == e && REFRESH_GAP_L || "d" == e && REFRESH_GAP_D || 1 == fFrame.SiteMode && "t" == e && REFRESH_GAP_D || 1 == fFrame.SiteMode && "e" == e && REFRESH_GAP_D)) {
        "l" == e ? sw1 = !0 : sw2 = !0;
        var _ = document.getElementById("divSelectDate");
        if (null != _ && "none" != _.style.display)
            for (var t = 0; t < _.childNodes.length; t++) {
                var a = _.childNodes[t];
                null != a.tagName && "SPAN" == a.tagName.toUpperCase() && (a.disabled = !1)
            }
        var r;
        "l" == e ? (REFRESH_GAP_L = !0,
        r = REFRESH_INTERVAL_L / 1e3 - 1,
        CounterHandle_L = setTimeout("countdown('l'," + r + ")", 1e3),
        changeButtonStatus("btnRefresh_L", !1, r)) : (REFRESH_GAP_D = !0,
        r = REFRESH_INTERVAL_D / 1e3 - 1,
        1 == fFrame.SiteMode && (window.clearTimeout(CounterHandle_D),
        window.clearTimeout(RefresHandle_D)),
        CounterHandle_D = setTimeout("countdown('d'," + r + ")", 1e3),
        changeButtonStatus("btnRefresh_D", !1, r),
        $("#HourContainer_Div").length > 0 && setSelecterDisable("HourContainer", !1)),
        setSelecterDisable("aSorter", !1),
        $("#selOddsType_Div").length > 0 && setSelecterDisable("selOddsType", !1),
        $("#selLeagueType_Div").length > 0 && setSelecterDisable("selLeagueType", !1)
    }
}
function paintRefreshBtn(e) {
    for (var _ = ["btnRefresh", "btnRefresh_L", "btnRefresh_D"], t = 0; t < _.length; t++)
        changeButtonStatus(_[t], !1)
}
function GameCountDown() {
    for (key in CountDownList) {
        var e = document.getElementById(key);
        null != e && (CountDownList[key] = parseInt(CountDownList[key], 10) - 1,
        CountDownList[key] <= 0 ? (CountDownList[key] = 0,
        e.innerHTML = RES_NOMOREBET,
        $(e).prev()[0].style.display = "none") : (e.innerHTML = CountDownList[key] + ("undefined" == typeof RES_Seconds ? "" : "&nbsp;" + RES_Seconds),
        $(e).prev()[0].style.display = ""))
    }
}
function Happy5GameCountDown(e) {
    for (key in HappyCountDownList) {
        if (null != document.getElementById(key))
            if (HappyCountDownList[key] = parseInt(HappyCountDownList[key], 10) - 1,
            HappyCountDownList[key] <= 0)
                if (HappyCountDownList[key] = 0,
                "d" == e)
                    $("#" + key)[0].innerText = RES_NOMOREBET;
                else {
                    var _ = '<span class="color01">' + RES_NOMOREBET + "</span>";
                    $("#" + key).html(_)
                }
            else if ("d" == e) {
                _ = '<span class="icon-clock"></span><div class="flash animation">' + HappyCountDownList[key] + ("undefined" == typeof RES_Seconds ? "" : " " + RES_Seconds) + "</div>";
                $("#" + key).html(_)
            } else {
                _ = "<b>" + RES_BingoGameStart + '</b> <span class="color01">' + HappyCountDownList[key] + "</span>";
                $("#" + key).html(_)
            }
    }
}
function countdown(e, _) {
    var t;
    if ("l" == e) {
        if (!REFRESH_GAP_L)
            return;
        if (_ <= 0)
            return void refreshData_L();
        (t = document.getElementById("btnRefresh_L")).title = RES_LIVE,
        t.hasChildNodes() && (t.firstChild.innerHTML = '<div class="icon-refresh" title="' + RES_LIVE + '"></div>' + _),
        CounterHandle_L = setTimeout("countdown('" + e + "'," + (_ - 1) + ")", 1e3)
    } else {
        if (!REFRESH_GAP_D)
            return;
        if (_ <= 0)
            return void refreshData_D();
        (t = document.getElementById("btnRefresh_D")).title = RES_REFRESH,
        t.innerHTML = '<span><div class="icon-refresh" title="' + RES_REFRESH + '"></div>' + _ + "</span>",
        CounterHandle_D = setTimeout("countdown('" + e + "'," + (_ - 1) + ")", 1e3)
    }
}
function checkLeagueCount() {
    var e = 1 == SelMainMarket ? TotlaMainLeagueCnt : TotlaLeagueCnt;
    if (document.getElementById("League_New")) {
        if (void 0 === e || "0" == e)
            return document.getElementById("League_New").className = "displayOff",
            void (document.getElementById("League_Old").className = "");
        document.getElementById("League_New").className = "",
        document.getElementById("League_Old").className = "displayOff",
        0 == TotlaSelLeagueCnt ? (document.getElementById("SelLeagueIcon").className = "displayOff",
        document.getElementById("CustSelL").className = "selected displayOff",
        document.getElementById("AllSelL").className = "displayOn") : (document.getElementById("SelLeagueIcon").className = "displayOn",
        document.getElementById("CustSelL").className = "selected displayOn",
        document.getElementById("AllSelL").className = "displayOff"),
        parseInt(TotlaSelLeagueCnt, 10) > parseInt(e, 10) ? document.getElementById("CustSelL").innerHTML = e : document.getElementById("CustSelL").innerHTML = TotlaSelLeagueCnt,
        document.getElementById("AllSelL").innerHTML = e,
        document.getElementById("TotalLeagueCnt").innerHTML = e
    }
}
function checkHasParlay(e, _) {
    try {
        var t = 0;
        t = "L" == e.toUpperCase() ? fFrame.leftx.IsHaveLiveParlay() ? 1 : 0 : fFrame.leftx.GetParlayCount(e, _);
        var a = document.getElementById("b_SwitchToParlay");
        null != a && (t > 0 && "0" == arr_Match[0] ? a.style.display = "block" : a.style.display = "none",
        setTimeout("checkHasParlay('" + e + "','" + _ + "')", 2e3))
    } catch (t) {
        setTimeout("checkHasParlay('" + e + "','" + _ + "')", 1e3)
    }
}
function SwitchToParlay(e) {
    try {
        "0" == e ? fFrame.leftx.SwitchSport("LP", e) : fFrame.leftx.ShowOdds("P", e),
        fFrame.leftx.ReloadWaitingBetList("yes", "no", "1")
    } catch (e) {}
}
function setRefreshSort() {
    if (setSelecterDisable("aSorter", !0),
    null != document.DataForm_L) {
        var e = document.DataForm_L.OrderBy.value;
        "it" == fFrame.UserLang || "jp" == fFrame.UserLang || fFrame.UserLang;
        "1" == e ? (document.DataForm_L.OrderBy.value = "0",
        document.DataForm_D.OrderBy.value = "0",
        null != g_OddsKeeper_L && (g_OddsKeeper_L.SortType = 0),
        g_OddsKeeper_D.SortType = 0) : (document.DataForm_L.OrderBy.value = "1",
        document.DataForm_D.OrderBy.value = "1",
        null != g_OddsKeeper_L && (g_OddsKeeper_L.SortType = 1),
        g_OddsKeeper_D.SortType = 1),
        "t" == PAGE_MARKET && 1 != fFrame.SiteMode && (document.DataForm_L.RT.value = "W",
        refreshData_L()),
        document.DataForm_D.RT.value = "W",
        refreshData_D()
    }
    if (null != document.DataForm) {
        e = document.DataForm.OrderBy.value,
        "it" == fFrame.UserLang || "jp" == fFrame.UserLang || fFrame.UserLang;
        "1" == e ? (document.DataForm.OrderBy.value = "0",
        g_OddsKeeper.SortType = 0) : (document.DataForm.OrderBy.value = "1",
        g_OddsKeeper.SortType = 1),
        document.DataForm.RT.value = "W",
        refreshData()
    }
}
function ChangeCursor(e) {
    trim($(":first-child", e).html()).length > 0 ? e.style.cursor = "pointer" : e.style.cursor = "auto"
}
function SingleNumberWheelMouseMove(e, _) {
    ChangeCursor(e);
    -1 == document.getElementById(_).className.indexOf("trbgov") && (document.getElementById(_).className = document.getElementById(_).className + " trbgov"),
    -1 == e.className.indexOf("trbgov") && (e.className = e.className + " trbgov")
}
function SingleNumberWheelMouseOut(e, _) {
    document.getElementById(_).className = document.getElementById(_).className.replace("trbgov", "").replace(/(^\s*)|(\s*$)/g, ""),
    e.className = e.className.replace("trbgov", "").replace(/(^\s*)|(\s*$)/g, "")
}
function BingoMouseMove(e) {
    ChangeCursor(e);
    var _ = e.id.split("_")
      , t = parseInt(_[2], 10)
      , a = "";
    switch (4 == _.length && (a = "_" + _[3]),
    _[1]) {
    case "1":
        for (var r = 5 * t - 4; r <= 5 * t; r++)
            -1 == document.getElementById(_[0] + "_5_" + r + a).className.indexOf("trbgov") && (document.getElementById(_[0] + "_5_" + r + a).className = document.getElementById(_[0] + "_5_" + r + a).className + " trbgov");
        break;
    case "2":
        for (r = 15 * t - 14; r <= 15 * t; r++)
            -1 == document.getElementById(_[0] + "_5_" + r + a).className.indexOf("trbgov") && (document.getElementById(_[0] + "_5_" + r + a).className = document.getElementById(_[0] + "_5_" + r + a).className + " trbgov");
        break;
    case "3":
        for (r = 25 * t - 24; r <= 25 * t; r++)
            -1 == document.getElementById(_[0] + "_5_" + r + a).className.indexOf("trbgov") && (document.getElementById(_[0] + "_5_" + r + a).className = document.getElementById(_[0] + "_5_" + r + a).className + " trbgov");
        break;
    case "4":
        for (r = 0; r <= 14; r++) {
            var d = 5 * r + t;
            -1 == document.getElementById(_[0] + "_5_" + d + a).className.indexOf("trbgov") && (document.getElementById(_[0] + "_5_" + d + a).className = document.getElementById(_[0] + "_5_" + d + a).className + " trbgov")
        }
    }
    -1 == e.className.indexOf("trbgov") && (e.className = e.className + " trbgov")
}
function BingoMouseOut(e) {
    var _ = e.id.split("_")
      , t = parseInt(_[2], 10)
      , a = "";
    switch (4 == _.length && (a = "_" + _[3]),
    _[1]) {
    case "1":
        for (var r = 5 * t - 4; r <= 5 * t; r++)
            document.getElementById(_[0] + "_5_" + r + a).className = document.getElementById(_[0] + "_5_" + r + a).className.replace("trbgov", "").replace(/(^\s*)|(\s*$)/g, "");
        break;
    case "2":
        for (r = 15 * t - 14; r <= 15 * t; r++)
            document.getElementById(_[0] + "_5_" + r + a).className = document.getElementById(_[0] + "_5_" + r + a).className.replace("trbgov", "").replace(/(^\s*)|(\s*$)/g, "");
        break;
    case "3":
        for (r = 25 * t - 24; r <= 25 * t; r++)
            document.getElementById(_[0] + "_5_" + r + a).className = document.getElementById(_[0] + "_5_" + r + a).className.replace("trbgov", "").replace(/(^\s*)|(\s*$)/g, "");
        break;
    case "4":
        for (r = 0; r <= 14; r++) {
            var d = 5 * r + t;
            document.getElementById(_[0] + "_5_" + d + a).className = document.getElementById(_[0] + "_5_" + d + a).className.replace("trbgov", "").replace(/(^\s*)|(\s*$)/g, "")
        }
    }
    e.className = e.className.replace("trbgov", "").replace(/(^\s*)|(\s*$)/g, "")
}
function DivPopMore(e, _, t, a, r, d, s, o, n) {
    if (null != PopLauncher && (PopLauncher.close(),
    PopLauncher = null),
    initialTmpl("MorePop_tmpl", "MorePop_tmpl.php", "DivPopMore(" + e + ",'" + _ + "','" + t + "','" + a + "','" + r + "','" + d + "','" + s + "','" + o + "','" + n + "');")) {
        var D = "D";
        "true" == s && (D = "L"),
        document.getElementById("oPopContainer").innerHTML = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById(n + D).innerHTML,
        (sKeeper = new SimpleOddsKeeper).MUID = o,
        sKeeper.MatchId = _,
        sKeeper.TableContainer = document.getElementById("oPopContainer"),
        sKeeper.DivTmpl = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById(n + D).innerHTML,
        sKeeper.isParlay = d,
        sKeeper.Market = D;
        var l = document.getElementById("PopDiv");
        l.style.width = e + 100 + "px";
        var p = document.getElementById("PopTitleText");
        if (p.style.width = e + "px",
        null == PopLauncher) {
            var O = document.getElementById("PopTitle")
              , i = document.getElementById("PopCloser");
            PopLauncher = new DivLauncher(l,O,i)
        }
        var S = new Object;
        switch (S.matchid = _,
        S.Market = D,
        S.tag = n,
        S.isparlay = d,
        ThreadId = n,
        n) {
        case "UnderOver_MoreDiv":
            more_mode = "OU",
            p.innerHTML = a + " -vs- " + r,
            ExecAjax("MorePop_data.php", S, "GET", n, "OpenUnderOverPopDiv");
            break;
        case "Bingo_MoreDiv":
        default:
            more_mode = "NG",
            p.innerHTML = RES_B90 + " - " + a,
            ExecAjax("MorePop_data.php", S, "GET", n, "OpenBingoPopDiv")
        }
    }
}
function OpenBingoPopDiv(Response) {
    if ("NG" == more_mode) {
        if (eval(Response),
        0 == ajaxData.length)
            return ThreadId = null,
            sKeeper = null,
            void PopLauncher.close();
        var oldHash = new Object;
        for (var o in sKeeper.oHash)
            oldHash[o] = sKeeper.oHash[o];
        var first = void 0 === sKeeper.oHash.MatchId;
        sKeeper.setDatas(ajaxData, MultiSportODDS_DEF[90]),
        sKeeper.newHash.Changed_90_1 = "";
        for (var i = 1; i <= 15; i++)
            sKeeper.newHash["Odds_90_1_" + i + "_Cls"] = getOddsClass(sKeeper.oHash["Odds_90_1_" + i]),
            oldHash["Odds_90_1_" + i] == sKeeper.oHash["Odds_90_1_" + i] || first || (sKeeper.newHash.Changed_90_1 = CLS_UPD);
        sKeeper.newHash.Changed_90_2 = "",
        sKeeper.newHash.Changed_90_4 = "";
        for (var i = 1; i <= 5; i++)
            sKeeper.newHash["Odds_90_2_" + i + "_Cls"] = getOddsClass(sKeeper.oHash["Odds_90_2_" + i]),
            oldHash["Odds_90_2_" + i] == sKeeper.oHash["Odds_90_2_" + i] || first || (sKeeper.newHash.Changed_90_2 = CLS_UPD),
            sKeeper.newHash["Odds_90_4_" + i + "_Cls"] = getOddsClass(sKeeper.oHash["Odds_90_4_" + i]),
            oldHash["Odds_90_4_" + i] == sKeeper.oHash["Odds_90_4_" + i] || first || (sKeeper.newHash.Changed_90_4 = CLS_UPD);
        sKeeper.newHash.Changed_90_3 = "";
        for (var i = 1; i <= 3; i++)
            sKeeper.newHash["Odds_90_3_" + i + "_Cls"] = getOddsClass(sKeeper.oHash["Odds_90_3_" + i]),
            oldHash["Odds_90_3_" + i] == sKeeper.oHash["Odds_90_3_" + i] || first || (sKeeper.newHash.Changed_90_3 = CLS_UPD);
        for (var i = 1; i <= 75; i++)
            sKeeper.newHash["Odds_90_5_" + i + "_Cls"] = getOddsClass(sKeeper.oHash["Odds_90_5_" + i]),
            sKeeper.newHash["Changed_90_5_" + i] = "",
            oldHash["Odds_90_5_" + i] == sKeeper.oHash["Odds_90_5_" + i] || first || (sKeeper.newHash["Changed_90_5_" + i] = CLS_UPD);
        if (sKeeper.oHash.MatchId = sKeeper.MatchId,
        sKeeper.newHash.isParlay = sKeeper.isParlay,
        sKeeper.paintOddsTable(),
        null != ThreadId && "" != ThreadId && "NG" == more_mode) {
            var y = 120;
            CheckIsIpad() && (y += parent.window.pageYOffset),
            PopLauncher.open(100, y)
        }
    }
}
function Rechkskeeper_5_15() {
    null != sKeeper_Sport[1] && GetSoccerMore(null)
}
function OpenUnderOverPopDiv(Response) {
    if ("OU" == more_mode) {
        if (eval(Response),
        0 == ajaxData.length)
            return ThreadId = null,
            sKeeper = null,
            void PopLauncher.close();
        var oldHash = new Object;
        for (var o in sKeeper.oHash)
            oldHash[o] = sKeeper.oHash[o];
        for (var betType = new Array("5","15","24","25","26","27","13","28","121","122","123","2","12","6","14","16","4","30","126","127"), i = 0; i < betType.length; i++)
            if (null != ajaxData[betType[i]]) {
                sKeeper.setDatas(ajaxData[betType[i]], MultiSportODDS_DEF[parseInt(betType[i], 10)]);
                for (var oddsName, j = 1; j < MultiSportODDS_DEF[parseInt(betType[i], 10)].length; j++)
                    "Odds_" == (oddsName = MultiSportODDS_DEF[parseInt(betType[i], 10)][j]).substr(0, 5) && (sKeeper.newHash[oddsName + "_Cls"] = getOddsClass(sKeeper.oHash[oddsName]));
                "28" == betType[i] && (sKeeper.newHash.Odds_28_hdp = sKeeper.oHash.Odds_28_hdpx.replace(" ", ""))
            }
        if (null != oldHash.MatchId && (sKeeper.oHash = sKeeper.updateOdds(oldHash, sKeeper.oHash, betType)),
        3 == window.top.DisplayMode || 1 == sKeeper.isParlay ? sKeeper.newHash.SHOW5_15 = CLS_LS_OFF : null != ajaxData[5] || null != ajaxData[15] ? sKeeper.newHash.SHOW5_15 = CLS_LS_ON : sKeeper.newHash.SHOW5_15 = CLS_LS_OFF,
        null != ajaxData[121] || null != ajaxData[122] ? sKeeper.newHash.SHOW121_122 = CLS_LS_ON : sKeeper.newHash.SHOW121_122 = CLS_LS_OFF,
        null != ajaxData[123] || null != ajaxData[25] ? sKeeper.newHash.SHOW123_25 = CLS_LS_ON : sKeeper.newHash.SHOW123_25 = CLS_LS_OFF,
        null != ajaxData[24] ? sKeeper.newHash.SHOW24 = CLS_LS_ON : sKeeper.newHash.SHOW24 = CLS_LS_OFF,
        null != ajaxData[26] || null != ajaxData[27] ? sKeeper.newHash.SHOW26_27 = CLS_LS_ON : sKeeper.newHash.SHOW26_27 = CLS_LS_OFF,
        null != ajaxData[13] ? sKeeper.newHash.SHOW13 = CLS_LS_ON : sKeeper.newHash.SHOW13 = CLS_LS_OFF,
        null != ajaxData[28] ? sKeeper.newHash.SHOW28 = CLS_LS_ON : sKeeper.newHash.SHOW28 = CLS_LS_OFF,
        null != ajaxData[2] || null != ajaxData[12] ? sKeeper.newHash.SHOW2_12 = CLS_LS_ON : sKeeper.newHash.SHOW2_12 = CLS_LS_OFF,
        null != ajaxData[6] ? sKeeper.newHash.SHOW6 = CLS_LS_ON : sKeeper.newHash.SHOW6 = CLS_LS_OFF,
        null != ajaxData[126] ? sKeeper.newHash.SHOW126 = CLS_LS_ON : sKeeper.newHash.SHOW126 = CLS_LS_OFF,
        null != ajaxData[14] ? sKeeper.newHash.SHOW14 = CLS_LS_ON : sKeeper.newHash.SHOW14 = CLS_LS_OFF,
        null != ajaxData[127] ? sKeeper.newHash.SHOW127 = CLS_LS_ON : sKeeper.newHash.SHOW127 = CLS_LS_OFF,
        null != ajaxData[16] ? sKeeper.newHash.SHOW16 = CLS_LS_ON : sKeeper.newHash.SHOW16 = CLS_LS_OFF,
        null != ajaxData[4] ? sKeeper.newHash.SHOW4 = CLS_LS_ON : sKeeper.newHash.SHOW4 = CLS_LS_OFF,
        null != ajaxData[30] ? sKeeper.newHash.SHOW30 = CLS_LS_ON : sKeeper.newHash.SHOW30 = CLS_LS_OFF,
        sKeeper.oHash.MatchId = sKeeper.MatchId,
        sKeeper.newHash.isParlay = sKeeper.isParlay,
        sKeeper.paintOddsTable(),
        null != ThreadId && "" != ThreadId && "OU" == more_mode) {
            var y = 120;
            CheckIsIpad() && (y += parent.window.pageYOffset),
            PopLauncher.open(100, y)
        }
    }
}
function ConvertArrayIndex(e, _) {
    for (var t = 0; t < e.length; t++)
        if (e[t] == _)
            return t;
    return -1
}
function SwpA(e, _, t) {
    var a = e[_];
    e[_] = e[t],
    e[t] = a
}
function SwpD(e) {
    if (!SwpDEF_FLAG) {
        SwpDEF_FLAG = !0,
        null == ARR_FIELDS_ORG && (ARR_FIELDS_ORG = ARR_FIELDS_DEF[1].slice(0, ARR_FIELDS_DEF[1].length)),
        null == ARR_FIELDS_ORG1 && (ARR_FIELDS_ORG1 = ARR_FIELDS_DEF1[1].slice(0, ARR_FIELDS_DEF1[1].length));
        for (var _ = 1; _ < e.length; _++)
            SwpA(ARR_FIELDS_DEF[1], e[_ - 1], e[_]),
            SwpA(ARR_FIELDS_DEF1[1], e[_ - 1], e[_])
    }
}
function InsD(e) {
    if (!InsDEF_FLAG) {
        InsDEF_FLAG = !0,
        null == ARR_FIELDS_ORG && (ARR_FIELDS_ORG = ARR_FIELDS_DEF[1].slice(0, ARR_FIELDS_DEF[1].length)),
        null == ARR_FIELDS_ORG1 && (ARR_FIELDS_ORG1 = ARR_FIELDS_DEF1[1].slice(0, ARR_FIELDS_DEF1[1].length));
        for (var _ = 0; _ < e.length; _++)
            ARR_FIELDS_DEF[1] = arrayInsert(ARR_FIELDS_DEF[1], e[_], ["XIBCX"]),
            ARR_FIELDS_DEF1[1] = arrayInsert(ARR_FIELDS_DEF1[1], e[_], ["XIBCX"])
    }
}
function RstrD() {
    SwpDEF_FLAG = !1,
    InsDEF_FLAG = !1,
    null != ARR_FIELDS_ORG && (ARR_FIELDS_DEF[1] = ARR_FIELDS_ORG,
    ARR_FIELDS_ORG = null),
    null != ARR_FIELDS_ORG1 && (ARR_FIELDS_DEF1[1] = ARR_FIELDS_ORG1,
    ARR_FIELDS_ORG1 = null)
}
function addLeagueFavorites(e, _, t, a, r, d) {
    var s = document.getElementById("fav_" + t);
    if (null == d && (d = ""),
    IsFromFavLeague = !0,
    LeagueFavObj[t.toString()] ? (LeagueFavObj[t.toString()] = !1,
    s.parentElement.title = fFrame.RES_AddFavorite,
    s.className = "iconOdds favorite",
    addFavoritesQuery(_, t, d, "DelL", ""),
    null != RES_PageType && (document.DataForm_L.RT.value = "W",
    document.DataForm_D.RT.value = "W",
    document.DataForm_L.CT.value = "",
    document.DataForm_D.CT.value = "",
    "none" != $("#btnSwitchBack").css("display") && LiveInfoBackButton()),
    "" == d && checkOddsKeeperLeague(_, t, "")) : (LeagueFavObj[t.toString()] = !0,
    s.parentElement.title = fFrame.RES_RemoveFavorite,
    s.className = "iconOdds favoriteAdd",
    addFavoritesQuery(_, t, "", "AddL", ""),
    "" == d && checkOddsKeeperLeague(_, t, "1")),
    void 0 !== e) {
        var o = e || window.event;
        void 0 !== o && null != o && (void 0 !== o.cancelBubble ? o.cancelBubble = !0 : o.cancel = !0,
        o.stopPropagation && o.stopPropagation())
    }
    IsFromFavLeague = !1
}
function addMatchFavorites(e, _, t, a) {
    var r, d = e.substr(2, e.length - 2), s = document.getElementsByName("fav_" + e), o = getOddsKeeper(e, a);
    1 == ("AllSingleOdds" == document.body.id || "Live" == document.body.id ? 0 : document.getElementById("aSorter").value) ? (r = o.findIndex("KickoffTime", _),
    r = o.adjustIndex1st(r, "KickoffTime", _, e)) : (r = o.findIndex("MatchCode", _),
    r = o.adjustIndex1st(r, "MatchCode", _, e));
    for (var n = o.EventList[r].KickoffTime, D = o.EventList[r].FavLeague, l = 0; l < s.length; l++) {
        var p = s[l];
        null != p.parentElement && (t ? (p.parentElement.href = String.format("javascript:addMatchFavorites('{0}','{1}',0,{2});", e, _, a),
        p.parentElement.title = fFrame.RES_AddFavorite,
        p.className = "iconOdds favorite",
        addFavoritesQuery("", o.EventList[r].LeagueId, d, "DelM", n),
        o.EventList[r].MUID == e && (o.EventList[r].Favorite = ""),
        null != RES_PageType && (document.DataForm_L.RT.value = "W",
        document.DataForm_D.RT.value = "W",
        document.DataForm_L.CT.value = "",
        document.DataForm_D.CT.value = "",
        "F" == RES_PageType && "none" != $("#btnSwitchBack").css("display") && LiveInfoBackButton()),
        D && (addLeagueFavorites(null, o.EventList[r].SportType, o.EventList[r].LeagueId, "1", a, d),
        checkOddsKeeperLeague(o.EventList[r].SportType, o.EventList[r].LeagueId, "2"))) : (p.parentElement.href = String.format("javascript:addMatchFavorites('{0}','{1}',1,{2});", e, _, a),
        p.parentElement.title = fFrame.RES_RemoveFavorite,
        p.className = "iconOdds favoriteAdd",
        addFavoritesQuery("", o.EventList[r].LeagueId, d, "AddM", n),
        o.EventList[r].MUID == e && (o.EventList[r].Favorite = "1")))
    }
}
function addFavoritesQuery(e, _, t, a, r) {
    $.ajax({
        type: "post",
        url: "addFavorites.php",
        data: {
            SportType: e,
            LeagueID: _,
            MatchId: t,
            Action: a,
            Time: r
        },
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        cache: !1,
        asyncBoolean: !1,
        error: function(e) {},
        success: changeFavStyle
    })
}
function checkOddsKeeperLeague(e, _, t) {
    if ("object" == typeof arr_ShowMixParlay) {
        if (null != arr_ShowMixParlay[e.toString()]) {
            var a = new Array
              , r = new Array;
            if (null != g_OddsKeeper_L && (a = g_OddsKeeper_L.getOddsKeeperArray()),
            null != g_OddsKeeper_D && (r = g_OddsKeeper_D.getOddsKeeperArray()),
            arr_ShowMixParlay[e.toString()] && null != a[e.toString()])
                for (var d = a[e.toString()], s = 0; s < d.EventList.length; s++)
                    d.EventList[s].LeagueId.toLowerCase() == _ && ("2" == t ? d.EventList[s].FavLeague = "" : (d.EventList[s].FavLeague = t,
                    d.EventList[s].Favorite = t));
            if (arr_ShowMixParlay[e.toString()] && null != r[e.toString()])
                for (d = r[e.toString()],
                s = 0; s < d.EventList.length; s++)
                    d.EventList[s].LeagueId.toLowerCase() == _ && ("2" == t ? d.EventList[s].FavLeague = "" : (d.EventList[s].FavLeague = t,
                    d.EventList[s].Favorite = t));
            if (arr_ShowMixParlay.O && null != g_OddsKeeper_Outright)
                for (d = g_OddsKeeper_Outright,
                s = 0; s < d.EventList.length; s++)
                    d.EventList[s].LeagueId.toLowerCase() == _ && ("2" == t ? d.EventList[s].FavLeague = "" : (d.EventList[s].FavLeague = t,
                    d.EventList[s].Favorite = t))
        }
    } else if ("object" == typeof arr_OddsKeeper) {
        if (null != arr_OddsKeeper[e])
            for (d = arr_OddsKeeper[e],
            s = 0; s < d.EventList.length; s++)
                d.EventList[s].LeagueId.toLowerCase() == _ && ("2" == t ? d.EventList[s].FavLeague = "" : (d.EventList[s].FavLeague = t,
                d.EventList[s].Favorite = t))
    } else {
        if (void 0 !== g_OddsKeeper_L && null != g_OddsKeeper_L)
            for (s = 0; s < g_OddsKeeper_L.EventList.length; s++)
                g_OddsKeeper_L.EventList[s].LeagueId.toLowerCase() == _ && ("2" == t ? g_OddsKeeper_L.EventList[s].FavLeague = "" : (g_OddsKeeper_L.EventList[s].FavLeague = t,
                g_OddsKeeper_L.EventList[s].Favorite = t));
        if (void 0 !== g_OddsKeeper_D && null != g_OddsKeeper_D)
            for (s = 0; s < g_OddsKeeper_D.EventList.length; s++)
                g_OddsKeeper_D.EventList[s].LeagueId.toLowerCase() == _ && ("2" == t ? g_OddsKeeper_D.EventList[s].FavLeague = "" : (g_OddsKeeper_D.EventList[s].FavLeague = t,
                g_OddsKeeper_D.EventList[s].Favorite = t));
        if (void 0 !== g_OddsKeeper && null != g_OddsKeeper)
            for (s = 0; s < g_OddsKeeper.EventList.length; s++)
                g_OddsKeeper.EventList[s].LeagueId.toLowerCase() == _ && ("2" == t ? g_OddsKeeper.EventList[s].FavLeague = "" : (g_OddsKeeper.EventList[s].FavLeague = t,
                g_OddsKeeper.EventList[s].Favorite = t))
    }
    FinalpaintOddsTable()
}
function getOddsKeeper(e, _) {
    if ("object" == typeof arr_ShowMixParlay) {
        for (var t = 1; t < 100; t++)
            if (null != arr_ShowMixParlay[t.toString()]) {
                var a = new Array
                  , r = new Array;
                if (null != g_OddsKeeper_L && (a = g_OddsKeeper_L.getOddsKeeperArray()),
                null != g_OddsKeeper_D && (r = g_OddsKeeper_D.getOddsKeeperArray()),
                arr_ShowMixParlay[t.toString()] && null != a[t.toString()] && _)
                    for (var d = 0; d < a[t.toString()].EventList.length; d++)
                        if (a[t.toString()].EventList[d].MUID.toLowerCase() == e)
                            return a[t.toString()];
                if (arr_ShowMixParlay[t.toString()] && null != r[t.toString()] && !_)
                    for (d = 0; d < r[t.toString()].EventList.length; d++)
                        if (r[t.toString()].EventList[d].MUID.toLowerCase() == e)
                            return r[t.toString()]
            }
    } else if ("object" == typeof arr_OddsKeeper) {
        for (t = 1; t < 100; t++)
            if (null != arr_OddsKeeper[t.toString()] && _)
                for (d = 0; d < arr_OddsKeeper[t.toString()].EventList.length; d++)
                    if (arr_OddsKeeper[t.toString()].EventList[d].MUID.toLowerCase() == e)
                        return arr_OddsKeeper[t.toString()]
    } else {
        if (null != g_OddsKeeper_L && _)
            for (d = 0; d < g_OddsKeeper_L.EventList.length; d++)
                if (g_OddsKeeper_L.EventList[d].MUID.toLowerCase() == e)
                    return g_OddsKeeper_L;
        if (null != g_OddsKeeper_D && !_)
            for (d = 0; d < g_OddsKeeper_D.EventList.length; d++)
                if (g_OddsKeeper_D.EventList[d].MUID.toLowerCase() == e)
                    return g_OddsKeeper_D;
        if (null != g_OddsKeeper)
            for (d = 0; d < g_OddsKeeper.EventList.length; d++)
                if (g_OddsKeeper.EventList[d].MUID.toLowerCase() == e)
                    return g_OddsKeeper
    }
}
function OpenSuperLive(e) {
    var _ = "matchid=" + e
      , t = "http://" + location.href.split("/")[2] + "/AuthorizationCustomer.php?cust=superlive&" + _;
    fFrame.openWindowsHandle("SuperLive", !0, null, "AuthorizationCustomer.php?cust=superlive&" + _ + "&redirectURL=" + encodeURIComponent(t), "scrollbars=yes,resizable=yes,top=0,left=" + (window.screen.availWidth - 375) + ",width=360,Height=" + (window.screen.availHeight - 68), !1, function(e, a) {
        a || (e.location = "AuthorizationCustomer.php?cust=superlive&" + _ + "&redirectURL=" + encodeURIComponent(t),
        "Chrome" == userBrowser() ? e.blur() : e.focus())
    })
}
function addScrollbar(e, _) {
    importJS("commJS/jquery.mCustomScrollbar.js", "jQuery.mCustomScrollbar", function() {
        _ ? $("#" + e).mCustomScrollbar("update") : $("#" + e).mCustomScrollbar()
    }, this)
}
function switchCB() {
    $("#cbswitch").hasClass("open") ? ($("#cbswitch").removeClass("open"),
    $("#CBarrow").attr("class", "arrow down_arrow")) : ($("#cbswitch").addClass("open"),
    $("#CBarrow").attr("class", "arrow")),
    fFrame.topx.miniOddsObj.clearCBTimer()
}
function replaceDecimalSeperator(e) {
    return e.toString().replace(".", "")
}
function DecToUS(e) {
    return e < 2 && e > 1 ? (-100 / (e - 1)).toFixed(0) : "+" + (100 * (e - 1)).toFixed(0)
}
function DecToHK(e) {
    return (e - 1).toFixed(2)
}
function DecToMY(e) {
    var _ = e - 1;
    return _ <= 1 ? _.toFixed(2) : (-1 / _).toFixed(2)
}
function DecToIndo(e) {
    var _ = e - 1;
    return _ < 1 && _ > 0 ? (-1 / _).toFixed(2) : _.toFixed(2)
}
function ConvertOdds(e, _, t) {
    if (0 == _)
        return "";
    if ("1" == t)
        return _;
    switch (e) {
    case "2":
        return DecToHK(_);
    case "3":
        return DecToIndo(_);
    case "4":
        return DecToMY(_);
    case "5":
        return DecToUS(_);
    default:
        return _
    }
}
function ShowBetType(e, _, t) {
    var a = e + "_" + _ + "_Title"
      , r = e + "_" + _ + "_Odds";
    0 == _HiddenBetTypeControlArray.length && (_HiddenBetTypeControlArray = HiddenBetTypeControlArray),
    _HiddenBetTypeControlArray.indexOf(t) < 0 ? _HiddenBetTypeControlArray.push(t) : _HiddenBetTypeControlArray = BArrayRemove(_HiddenBetTypeControlArray, t),
    $("#" + t).hasClass("show") ? $("#" + t).removeClass("show") : $("#" + t).addClass("show"),
    0 == _HiddenBetTypeArray.length && (_HiddenBetTypeArray = HiddenBetTypeArray),
    _HiddenBetTypeArray.indexOf(a) < 0 ? _HiddenBetTypeArray.push(a) : _HiddenBetTypeArray = BArrayRemove(_HiddenBetTypeArray, a),
    _HiddenBetTypeArray.indexOf(r) < 0 ? _HiddenBetTypeArray.push(r) : _HiddenBetTypeArray = BArrayRemove(_HiddenBetTypeArray, r),
    "none" == $("#" + a).css("display") ? ($("#" + a).css("display", ""),
    $("#" + r).css("display", "")) : ($("#" + a).css("display", "none"),
    $("#" + r).css("display", "none"))
}
function SetHiddenBettype() {
    if (0 == _HiddenBetTypeControlArray.length) {
        for (var e = 0; e < HiddenBetTypeControlArray.length; e++)
            $("#" + HiddenBetTypeControlArray[e]).removeClass("show");
        for (var _ = 0; _ < HiddenBetTypeArray.length; _++)
            $("#" + HiddenBetTypeArray[_]).css("display", "none")
    } else {
        for (e = 0; e < _HiddenBetTypeControlArray.length; e++)
            $("#" + _HiddenBetTypeControlArray[e]).removeClass("show");
        for (_ = 0; _ < _HiddenBetTypeArray.length; _++)
            $("#" + _HiddenBetTypeArray[_]).css("display", "none")
    }
}
function BArrayRemove(e, _) {
    var t = e.indexOf(_);
    return t > -1 && e.splice(t, 1),
    e
}
function defaultQuarterHidden(e, _) {
    var t = e + "_Quarter" + _ + "_Control";
    HiddenBetTypeControlArray.indexOf(t) < 0 && HiddenBetTypeControlArray.push(t);
    var a = e + "_Quarter" + _ + "_Title";
    HiddenBetTypeArray.indexOf(a) < 0 && HiddenBetTypeArray.push(a);
    var r = e + "_Quarter" + _ + "_Odds";
    HiddenBetTypeArray.indexOf(r) < 0 && HiddenBetTypeArray.push(r)
}
function SwitchGame(e) {
    if (1 == fFrame.CanSeeHappy5) {
        switch (e) {
        case "161":
            fFrame.NowSportPage = "161",
            $("#Happy5Tab").removeClass("active"),
            $("#NumberGameTab").addClass("active"),
            fFrame.leftx.SwitchSport("", "161");
            break;
        default:
            fFrame.NowSportPage = "164",
            $("#NumberGameTab").removeClass("active"),
            $("#Happy5Tab").addClass("active"),
            fFrame.leftx.SwitchSport("", "164")
        }
        refreshData_L()
    }
}
function checkHappy5Odds(e) {
    return 0 == e || "0" == e ? "--" : e
}
function ShowAllHint(e) {
    0 != $("#" + e + "_B_total")[0].innerText.trim().length && $("#" + e + "_B_total").toggleClass("showElement"),
    0 != $("#" + e + "_S_total")[0].innerText.trim().length && $("#" + e + "_S_total").toggleClass("showElement"),
    0 != $("#" + e + "_sp_total")[0].innerText.trim().length && $("#" + e + "_sp_total").toggleClass("showElement"),
    0 != $("#" + e + "_au_total")[0].innerText.trim().length && $("#" + e + "_au_total").toggleClass("showElement"),
    0 != $("#" + e + "_su_total")[0].innerText.trim().length && $("#" + e + "_su_total").toggleClass("showElement"),
    0 != $("#" + e + "_wi_total")[0].innerText.trim().length && $("#" + e + "_wi_total").toggleClass("showElement")
}
function HideAllHint(e) {
    $("#" + e + "_B_total").removeClass("showElement"),
    $("#" + e + "_S_total").removeClass("showElement"),
    $("#" + e + "_sp_total").removeClass("showElement"),
    $("#" + e + "_au_total").removeClass("showElement"),
    $("#" + e + "_su_total").removeClass("showElement"),
    $("#" + e + "_wi_total").removeClass("showElement")
}
function ShowBetTypeHint(e) {
    $("#" + e).toggleClass("showElement")
}
function HideBetTypeHint(e) {
    $("#" + e).removeClass("showElement")
}
function getUpdObj(e, _) {
    for (var t, a = 0; a < e.length; a++)
        if ((t = e[a]).OddsId == _)
            return t;
    return null
}
function setUpdObj(e, _) {
    if ("" != _.OddsId) {
        for (var t = !1, a = 0; a < e.length; a++)
            e[a].OddsId == _.OddsId && (t = !0,
            e[a] = _);
        t || (e[e.length] = _)
    }
}
function CheckHappyOddsCss(e) {
    return null == e.innerHTML.match(/[0-9]/g) ? (e.style.cursor = "default",
    e.style.pointerEvents = "none",
    !1) : (e.style.cursor = "pointer",
    !0)
}
function cloneMainLeague(e) {
    for (var _ = [], t = 0; t < e.length; t++)
        "True" == e[t].IsMainMarket && (_ = _.concat(e[t]));
    return _
}
function getLeagueName(e) {
    var _ = e.split("/");
    return _[0] = "",
    trim(_.join(""))
}
function ExistLeague(e, _) {
    for (var t = 0; t < LeagueList.length; t++)
        if (LeagueList[t].LeagueId == _)
            return !0;
    if ("object" == typeof LeagueListBySport["S" + e])
        for (t = 0; t < LeagueListBySport["S" + e].length; t++)
            if (LeagueListBySport["S" + e][t].LeagueId == _)
                return !0;
    return !1
}
function makeLeagueList(e, _, t) {
    if (null != e) {
        for (var a = 0, r = 0; r < e.length; r++)
            ExistLeague(_, e[r].LeagueId) || (LeagueList[a] = {},
            LeagueList[a].LeagueId = e[r].LeagueId,
            LeagueList[a].LeagueName = t ? getLeagueName(e[r].LeagueName) : e[r].LeagueName,
            LeagueList[a].SportId = _,
            LeagueList[a].SportName = fFrame.RES_SPORTS[parseInt(_, 10)],
            void 0 === e[r].IsMainMarket ? LeagueList[a].IsMainMarket = "False" : LeagueList[a].IsMainMarket = e[r].IsMainMarket,
            -1 != indexOf(arr_League, e[r].LeagueId) ? LeagueList[a].Checked = !0 : LeagueList[a].Checked = !1,
            a++);
        "object" == typeof LeagueListBySport["S" + _] ? LeagueListBySport["S" + _] = LeagueListBySport["S" + _].concat(LeagueList) : (LeagueListBySport["S" + _] = {},
        LeagueListBySport["S" + _] = jQuery.extend(!0, [], LeagueList)),
        LeagueListBySport["S" + _].sort(function(e, _) {
            return e.LeagueName.localeCompare(_.LeagueName)
        })
    }
}
function getSelLeagueCnt(e) {
    for (var _ = 0, t = 0, a = 0, r = [], d = 0; d < e.length; d++)
        e[d].Checked && _++,
        void 0 === e[d].IsMainMarket ? t++ : "True" == e[d].IsMainMarket && (t++,
        e[d].Checked && a++);
    return r[0] = 1 == SelMainMarket ? a : _,
    r[1] = t,
    r[2] = _,
    r
}
function getLeagueList() {
    if (2 == fFrame.LastSelectedMenu && (SelMainMarket = 0),
    LeagueListBySport = [],
    TotlaLeagueCnt = 0,
    TotlaMainLeagueCnt = 0,
    TotlaSelLeagueCnt = 0,
    "object" == typeof arr_ShowMixParlay) {
        var e = new Array
          , _ = new Array;
        null != g_OddsKeeper_L && (e = g_OddsKeeper_L.getOddsKeeperArray()),
        null != g_OddsKeeper_D && (_ = g_OddsKeeper_D.getOddsKeeperArray());
        for (var t in arr_ShowMixParlay) {
            if (LeagueList = [],
            arr_ShowMixParlay[t] && null != e[t]) {
                makeLeagueList((r = e[t]).EventList, t.toString(), !1)
            }
            if (LeagueList = [],
            arr_ShowMixParlay[t] && null != _[t]) {
                makeLeagueList((r = _[t]).EventList, t.toString(), !1)
            }
            if (void 0 !== LeagueListBySport["S" + t]) {
                TotlaLeagueCnt += LeagueListBySport["S" + t].length;
                var a = getSelLeagueCnt(LeagueListBySport["S" + t]);
                TotlaMainLeagueCnt = TotlaLeagueCnt,
                TotlaSelLeagueCnt += a[2]
            }
        }
    } else if ("object" == typeof arr_OddsKeeper)
        for (var t in arr_OddsKeeper) {
            LeagueList = [];
            var r;
            if (null != (r = arr_OddsKeeper[t]) && makeLeagueList(r.EventList, t.toString(), !0),
            void 0 !== LeagueListBySport["S" + t]) {
                TotlaLeagueCnt += LeagueListBySport["S" + t].length;
                a = getSelLeagueCnt(LeagueListBySport["S" + t]);
                "1" == t ? (TotlaMainLeagueCnt += a[1],
                TotlaSelLeagueCnt += a[0]) : (TotlaMainLeagueCnt += LeagueListBySport["S" + t].length,
                TotlaSelLeagueCnt += a[2])
            }
        }
    else {
        t = null;
        if (LeagueList = [],
        "object" == typeof g_OddsKeeper_D && null != g_OddsKeeper_D && (t = g_OddsKeeper_D.SportType,
        makeLeagueList(g_OddsKeeper_D.EventList, t, !1)),
        LeagueList = [],
        "object" == typeof g_OddsKeeper_L && null != g_OddsKeeper_L && (t = g_OddsKeeper_L.SportType,
        makeLeagueList(g_OddsKeeper_L.EventList, t, !1)),
        LeagueList = [],
        "object" == typeof g_OddsKeeper && null != g_OddsKeeper && (t = g_OddsKeeper.SportType,
        makeLeagueList(g_OddsKeeper.EventList, t, !1)),
        null != t) {
            TotlaLeagueCnt = LeagueListBySport["S" + t].length;
            a = getSelLeagueCnt(LeagueListBySport["S" + t]);
            TotlaMainLeagueCnt = "1" == t ? a[1] : LeagueListBySport["S" + t].length,
            TotlaSelLeagueCnt = a[0]
        }
    }
    checkLeagueCount()
}
function isFilterLeague(e) {
    return -1 != indexOf(arr_League, "0") || 0 == TotlaSelLeagueCnt || -1 != indexOf(arr_League, e)
}
function isFilterMatch(e) {
    return -1 != indexOf(arr_Match, "0") || -1 != indexOf(arr_Match, e)
}
function CheckOdds1F1H(e, _) {
    if ("1" == e) {
        if ("1F" == fFrame.DisplayMode) {
            if (OnlyMROdds && "" == _.Value_301 && "" == _.OddsId_301 && "" == _.Goal_302 && "" == _.OddsId_302)
                return !1;
            if (NoShowMROdds && "" == _.Value_1 && "" == _.OddsId_1 && "" == _.Goal_3 && "" == _.OddsId_3)
                return !1
        }
        if ("1H" == fFrame.DisplayMode) {
            if (OnlyMROdds && "" == _.Value_303 && "" == _.OddsId_303 && "" == _.Goal_304 && "" == _.OddsId_304)
                return !1;
            if (NoShowMROdds && "" == _.Value_7 && "" == _.OddsId_7 && "" == _.Goal_8 && "" == _.OddsId_8)
                return !1
        }
    }
    return !0
}
function CheckOddsId(e) {
    return void 0 !== e && (null != e && "" != e)
}
function isFilterMROdds(e) {
    return !OnlyMROdds || !!(CheckOddsId(e.OddsId_301) || CheckOddsId(e.OddsId_302) || CheckOddsId(e.OddsId_303) || CheckOddsId(e.OddsId_304)) && !NoShowMROdds
}
function isFilterMainMarket(e) {
    return 0 == SelMainMarket || "True" == e
}
function isFilterKickoffTime(e) {
    return "" == SelKickoffTime || SelKickoffTime == e.substr(0, 8)
}
function OddsKeeper() {
    function e(e, _) {
        var t = e.document.getElementById(_);
        return null != t && "" != t.title ? e.document.getElementById(t.title) : t
    }
    function _(e) {
        var _ = "";
        return void 0 != e && (_ = (_ = (_ = (_ = e.innerHTML).replace(/%7B/g, "{")).replace(/%7D/g, "}")).replace(/[	\n]/g, "")),
        _
    }
    function t() {
        var e = u.TemplateFrame.document.getElementById(TMPL_TABLE_ID);
        if (null != e) {
            var _ = e.parentNode.innerHTML;
            return _ = _.substring(0, _.indexOf(e.innerHTML)),
            _ = _.substr(_.lastIndexOf("<"))
        }
        return "<table>"
    }
    function a() {
        var e = u.TemplateFrame.document.getElementById(TMPL_COLGROUP_ID);
        if (null != e) {
            var _ = e.parentNode.innerHTML;
            return _ = _.substring(0, _.indexOf(e.innerHTML) - 1),
            (_ = _.substr(_.lastIndexOf("<"))) + e.innerHTML + "</colgroup>"
        }
        return ""
    }
    function r() {
        var e = "";
        return 0 == u.EventList.length ? "" : ("True" == u.EventList[0].FlagLive ? null == u.SubTitleField && (e = null == u.TemplateFrame.document.getElementById(TMPL_HEADER_LIVE_ID + "_" + u.SportType) ? null == u.TemplateFrame.document.getElementById(TMPL_HEADER_LIVE_ID) ? u.TemplateFrame.document.getElementById(TMPL_HEADER_ID).innerHTML : u.TemplateFrame.document.getElementById(TMPL_HEADER_LIVE_ID).innerHTML : u.TemplateFrame.document.getElementById(TMPL_HEADER_LIVE_ID + "_" + u.SportType).innerHTML) : e = null == u.TemplateFrame.document.getElementById(TMPL_HEADER_ID + "_" + u.SportType) ? null != u.SubTitleField ? "" : u.TemplateFrame.document.getElementById(TMPL_HEADER_ID).innerHTML : null != u.SubTitleField ? "" : u.TemplateFrame.document.getElementById(TMPL_HEADER_ID + "_" + u.SportType).innerHTML,
        e)
    }
    function d(e) {
        return null == u.SubTitleField ? "" : u.TemplateFrame.document.getElementById(TMPL_SUBTITLE_ID + "_" + e).innerHTML
    }
    function s(e) {
        var _ = "True" == u.EventList[e].FlagLive ? R : L;
        return _ = _replaceTags(u.EventList[e], _),
        null != u.afterNewLeague && (_ = u.afterNewLeague(u.EventList, e, _)),
        _
    }
    function o(e) {
        var _, t = "True" == u.EventList[e].FlagLive;
        return _ = t ? l(_ = _replaceTags(u.EventList[e], T), e) : _replaceTags(u.EventList[e], y),
        null != u.afterNewEvent && (_ = u.afterNewEvent(u.EventList, e, _, t)),
        _
    }
    function n(e) {
        var _, t = "True" == u.EventList[e].FlagLive;
        return _ = t ? l(_ = _replaceTags(u.EventList[e], g), e) : _replaceTags(u.EventList[e], A),
        null != u.afterNewEvent && (_ = u.afterNewEvent(u.EventList, e, _, t)),
        _
    }
    function D(e) {
        var _, t = "True" == u.EventList[e].FlagLive;
        return _ = t ? l(_ = _replaceTags(u.EventList[e], h), e) : _replaceTags(u.EventList[e], H),
        null != u.afterNewEvent && (_ = u.afterNewEvent(u.EventList, e, _, t)),
        _
    }
    function l(e, _) {
        if (1 == u.SportType && CurrentLiveInfoMatchID == u.EventList[_].MatchId) {
            var t = "";
            t = -1 == e.indexOf("<td") ? e.substring(e.indexOf("<TD"), e.indexOf("</TD>") + 5) : e.substring(e.indexOf("<td"), e.indexOf("</td>") + 5),
            e = "3" == fFrame.DisplayMode ? e.replace(t, "<td class='text_time' rowspan='2'><b class='IsLive'>" + u.EventList[_].ShowTime + "</b></td>") : e.replace(t, "<td class='text_time'><b class='IsLive'>" + u.EventList[_].ShowTime + "</b></td>")
        }
        return e
    }
    function p(e) {
        for (var _ = 0; _ < e.length; _++) {
            var t = e[_][0]
              , a = e[_][1]
              , r = e[_][2]
              , d = e[_][3]
              , s = e[_][4]
              , o = e[_][5]
              , n = e[_][6]
              , D = e[_][7]
              , l = I[t];
            if (null != l) {
                for (var p = !0; l < u.EventList.length && u.EventList[l].MUID == t; ) {
                    var O = u.EventList[l];
                    if (O.FlagLive = "True",
                    O.ShowTime = a,
                    O.LivePeriod = s,
                    O.CsStatus = r,
                    O.InjuryTime = d,
                    O.TimerSuspend = D,
                    O.ScoreH != o || O.ScoreA != n)
                        O.ScoreH = o,
                        O.ScoreA = n,
                        O.Changed_Score = CLS_UPD,
                        null != u.afterScoreChanged && p && (u.afterScoreChanged(u.EventList, l),
                        p = !1),
                        f[t] = (new Date).getTime();
                    else {
                        var i = f[t];
                        if (null != i) {
                            f[t] = void 0;
                            for (_ = l; _ < u.EventList.length; _++) {
                                if ((S = u.EventList[_]).MUID != t)
                                    break;
                                S.Changed_Score = ""
                            }
                        }
                        if (null != (i = w[t])) {
                            w[t] = void 0;
                            for (_ = l; _ < u.EventList.length; _++) {
                                var S;
                                if ((S = u.EventList[_]).MUID != t)
                                    break;
                                switch (u.SportType) {
                                case "2":
                                    S.Changed_Score_1Q = "",
                                    S.Changed_Score_2Q = "",
                                    S.Changed_Score_3Q = "",
                                    S.Changed_Score_4Q = "",
                                    S.Changed_Score_OT = "";
                                    break;
                                case "3":
                                    S.Changed_Score_1Q = "",
                                    S.Changed_Score_2Q = "",
                                    S.Changed_Score_3Q = "",
                                    S.Changed_Score_4Q = "",
                                    S.Changed_Score_OT = "",
                                    S.Changed_DOWN = "",
                                    S.Changed_TOGO = "";
                                    break;
                                case "4":
                                    S.Changed_1s = "",
                                    S.Changed_2s = "",
                                    S.Changed_3s = "",
                                    S.Changed_Score_OT = "";
                                    break;
                                case "7":
                                    S.Changed_1s = "",
                                    S.Changed_Cfm = "",
                                    S.Changed_Pt = "";
                                    break;
                                case "5":
                                case "6":
                                case "9":
                                    S.Changed_1s = "",
                                    S.Changed_2s = "",
                                    S.Changed_3s = "",
                                    S.Changed_4s = "",
                                    S.Changed_5s = "",
                                    S.Changed_Set = "",
                                    S.Changed_Pt = "";
                                    break;
                                case "48":
                                    S.Changed_1s = "",
                                    S.Changed_2s = "",
                                    S.Changed_3s = "",
                                    S.Changed_Set = "",
                                    S.Changed_Pt = "";
                                    break;
                                case "8":
                                    S.Changed_1s = "",
                                    S.Changed_2s = "",
                                    S.Changed_3s = "",
                                    S.Changed_4s = "",
                                    S.Changed_5s = "",
                                    S.Changed_6s = "",
                                    S.Changed_7s = "",
                                    S.Changed_8s = "",
                                    S.Changed_9s = "",
                                    S.Changed_OT = "",
                                    S.Changed_1b = "",
                                    S.Changed_2b = "",
                                    S.Changed_3b = "",
                                    S.Changed_out = ""
                                }
                            }
                        }
                    }
                    l++
                }
                C[t] = "live"
            }
        }
    }
    function O(e) {
        for (var _ = 0; _ < e.length; _++) {
            var t = e[_][0]
              , a = I[t];
            if (null != a) {
                for (; a < u.EventList.length && u.EventList[a].MUID == t; ) {
                    var r = u.EventList[a];
                    "True" != r.FlagLive && (r.ShowTime = e[_][1]),
                    r.StatsId = e[_][2],
                    r.SportRadar = e[_][3],
                    r.StreamingId = e[_][4],
                    r.Favorite = e[_][5],
                    r.HomeName = e[_][6],
                    r.AwayName = e[_][7],
                    r.KickoffTime = e[_][8],
                    a++
                }
                C[t] = "Match"
            }
        }
    }
    function i(e, _) {
        for (var t in v) {
            if (null != (s = I[t]))
                for (; s < u.EventList.length && u.EventList[s].MUID == t; ) {
                    for (var a = 0; a < u.BetTypes.length; a++)
                        u.EventList[s]["Changed_" + u.BetTypes[a]] = "";
                    C[t] = "oddsClear",
                    s++
                }
        }
        v = new Array;
        for (a = 0; a < e.length; a++) {
            t = e[a][0];
            for (var r = e[a][1], d = e[a][2], s = I[t], o = _hashData(e[a], ODDS_DEF[r]); s < u.EventList.length && u.EventList[s].MUID == t; ) {
                if (u.EventList[s]["OddsId_" + r] == d) {
                    !0,
                    C[u.EventList[s].MUID] = "oddsNew";
                    var n = 0
                      , D = !1;
                    for (var l in o)
                        n >= 3 && u.EventList[s][l] != o[l] ? (905 == r && (u.EventList[s][l.replace("Odds", "Changed")] = CLS_UPD),
                        u.EventList[s][l] = o[l],
                        D = !0) : n >= 3 && 905 == r && (u.EventList[s][l.replace("Odds", "Changed")] = ""),
                        n++;
                    D && (u.EventList[s]["Changed_" + r] = CLS_UPD,
                    v[u.EventList[s].MUID] = 1);
                    break
                }
                s++
            }
        }
    }
    function S(e) {
        for (var _ = 0; _ < e.length; _++) {
            var t = e[_][0]
              , a = I[t];
            if (null != a)
                for (var r = !1; a < u.EventList.length && u.EventList[a].MUID == t; ) {
                    var d = u.EventList[a];
                    r = !1,
                    d.H1Q == e[_][3] && d.A1Q == e[_][7] || (d.Changed_Score_1Q = CLS_UPD,
                    r = !0),
                    d.H2Q == e[_][4] && d.A2Q == e[_][8] || (d.Changed_Score_2Q = CLS_UPD,
                    r = !0),
                    d.H3Q == e[_][5] && d.A3Q == e[_][9] || (d.Changed_Score_3Q = CLS_UPD,
                    r = !0),
                    d.H4Q == e[_][6] && d.A4Q == e[_][10] || (d.Changed_Score_4Q = CLS_UPD,
                    r = !0),
                    d.HOT == e[_][11] && d.AOT == e[_][12] || (d.Changed_Score_OT = CLS_UPD,
                    r = !0),
                    r && (w[t] = (new Date).getTime()),
                    a++
                }
        }
    }
    function E(e) {
        switch (u.SportType) {
        case "2":
            S(e);
            break;
        case "3":
            !function(e) {
                S(e);
                for (var _ = 0; _ < e.length; _++) {
                    var t = e[_][0]
                      , a = I[t];
                    if (null != a)
                        for (var r = !1; a < u.EventList.length && u.EventList[a].MUID == t; ) {
                            var d = u.EventList[a];
                            r = !1,
                            d.DOWN != e[_][14] && (d.Changed_DOWN = CLS_UPD,
                            r = !0),
                            d.TOGO != e[_][15] && (d.Changed_TOGO = CLS_UPD,
                            r = !0),
                            r && (w[t] = (new Date).getTime()),
                            a++
                        }
                }
            }(e);
            break;
        case "4":
            !function(e) {
                for (var _ = 0; _ < e.length; _++) {
                    var t = e[_][0]
                      , a = I[t];
                    if (null != a)
                        for (var r = !1; a < u.EventList.length && u.EventList[a].MUID == t; ) {
                            var d = u.EventList[a];
                            r = !1,
                            parseInt(e[_][2], 10) > 0 && (d["H" + e[_][2] + "S"] == e[_][parseInt(e[_][2], 10) + 2] && d["A" + e[_][2] + "S"] == e[_][parseInt(e[_][2], 10) + 5] || (d["Changed_" + e[_][2] + "s"] = CLS_UPD,
                            r = !0)),
                            d.HOT == e[_][9] && d.AOT == e[_][10] || (d.Changed_Score_OT = CLS_UPD,
                            r = !0),
                            r && (w[t] = (new Date).getTime()),
                            a++
                        }
                }
            }(e);
            break;
        case "7":
            !function(e) {
                for (var _ = 0; _ < e.length; _++) {
                    var t = e[_][0]
                      , a = I[t];
                    if (null != a)
                        for (var r = !1; a < u.EventList.length && u.EventList[a].MUID == t; ) {
                            var d = u.EventList[a];
                            r = !1,
                            d.HFM == e[_][2] && d.AFM == e[_][3] || (d.Changed_1s = CLS_UPD,
                            r = !0),
                            d.CFM != e[_][4] && (d.Changed_Cfm = CLS_UPD,
                            r = !0),
                            d.HPT == e[_][5] && d.APT == e[_][6] || ("0" == e[_][5] && "0" == e[_][6] ? d.Changed_Pt = "" : d.Changed_Pt = CLS_UPD,
                            r = !0),
                            r && (w[t] = (new Date).getTime()),
                            a++
                        }
                }
            }(e);
            break;
        case "5":
        case "6":
        case "9":
            !function(e) {
                for (var _ = 0; _ < e.length; _++) {
                    var t = e[_][0]
                      , a = I[t];
                    if (null != a)
                        for (var r = !1; a < u.EventList.length && u.EventList[a].MUID == t; ) {
                            var d = u.EventList[a];
                            r = !1,
                            d.HS == e[_][15] && d.AS == e[_][16] || (d.Changed_Set = CLS_UPD,
                            r = !0),
                            parseInt(e[_][2], 10) > 0 && (d["H" + e[_][2] + "S"] == e[_][parseInt(e[_][2], 10) + 2] && d["A" + e[_][2] + "S"] == e[_][parseInt(e[_][2], 10) + 7] || (d["Changed_" + e[_][2] + "s"] = CLS_UPD,
                            r = !0)),
                            d.HPT == e[_][13] && d.APT == e[_][14] || ("0" == e[_][13] && "0" == e[_][14] ? d.Changed_Pt = "" : d.Changed_Pt = CLS_UPD,
                            r = !0),
                            r && (w[t] = (new Date).getTime()),
                            a++
                        }
                }
            }(e);
            break;
        case "48":
            !function(e) {
                for (var _ = 0; _ < e.length; _++) {
                    var t = e[_][0]
                      , a = I[t];
                    if (null != a)
                        for (var r = !1; a < u.EventList.length && u.EventList[a].MUID == t; ) {
                            var d = u.EventList[a];
                            r = !1,
                            d.HS == e[_][11] && d.AS == e[_][12] || (d.Changed_Set = CLS_UPD,
                            r = !0),
                            parseInt(e[_][2], 10) > 0 && (d["H" + e[_][2] + "S"] == e[_][parseInt(e[_][2], 10) + 2] && d["A" + e[_][2] + "S"] == e[_][parseInt(e[_][2], 10) + 5] || (d["Changed_" + e[_][2] + "s"] = CLS_UPD,
                            r = !0)),
                            d.HPT == e[_][9] && d.APT == e[_][10] || ("0" == e[_][9] && "0" == e[_][10] ? d.Changed_Pt = "" : d.Changed_Pt = CLS_UPD,
                            r = !0),
                            r && (w[t] = (new Date).getTime()),
                            a++
                        }
                }
            }(e);
            break;
        case "8":
            !function(e) {
                for (var _ = 0; _ < e.length; _++) {
                    var t = e[_][0]
                      , a = I[t];
                    if (null != a)
                        for (var r = !1; a < u.EventList.length && u.EventList[a].MUID == t; ) {
                            var d = u.EventList[a];
                            for (r = !1,
                            j = 1; j <= 9; j++)
                                d["H" + j + "S"] == e[_][j + 2] && d["A" + j + "S"] == e[_][j + 11] || (d["Changed_" + j + "s"] = CLS_UPD,
                                r = !0);
                            if (d.HOT == e[_][21] && d.AOT == e[_][22] || (d.Changed_OT = CLS_UPD,
                            r = !0),
                            d.Battle != e[_][22]) {
                                if ("0" == e[_][24] && "0" == e[_][25] && "0" == e[_][26])
                                    for (j = 1; j <= 3; j++)
                                        d["Changed_" + j + "b"] = "";
                                else
                                    for (j = 1; j <= 3; j++)
                                        d["B" + j] != e[_][23 + j] && (d["Changed_" + j + "b"] = CLS_UPD,
                                        r = !0);
                                "0" == e[_][27] ? d.Changed_out = "" : d.Out != e[_][27] && (d.Changed_out = CLS_UPD,
                                r = !0)
                            }
                            r && (w[t] = (new Date).getTime()),
                            a++
                        }
                }
            }(e)
        }
        var _ = LIVE_SCORE_DEF[u.SportType];
        if (_ instanceof Array)
            for (var t = 0; t < e.length; t++) {
                var a = e[t][0]
                  , r = I[a];
                if (null != r) {
                    for (; r < u.EventList.length && u.EventList[r].MUID == a; ) {
                        for (var d = u.EventList[r], s = 1; s < _.length; s++)
                            d[_[s]] = e[t][s];
                        r++
                    }
                    C[a] = "LiveScore"
                }
            }
    }
    function F(e) {
        if (u.slowDelete)
            for (_ = 0; _ < e.length; _++) {
                for (t = e[_],
                d = u.EventList.length - 1; d >= 0; d--)
                    u.EventList[d].MUID == t && (u.EventList = arrayRemove(u.EventList, d, d),
                    u.HtmlList = arrayRemove(u.HtmlList, d, d));
                for (d = u.EventList.length - 1; d >= 0; d--)
                    I[u.EventList[d].MUID] = d;
                f[t] = null,
                w[t] = null
            }
        else
            for (var _ = 0; _ < e.length; _++) {
                for (var t = e[_], a = I[t], r = a + 1; r < u.EventList.length; ) {
                    if (u.EventList[r].MUID != t) {
                        r--;
                        break
                    }
                    r++
                }
                u.EventList = arrayRemove(u.EventList, a, r),
                u.HtmlList = arrayRemove(u.HtmlList, a, r);
                for (var d = u.EventList.length - 1; d >= a; d--)
                    I[u.EventList[d].MUID] = d;
                f[t] = null,
                w[t] = null
            }
    }
    function M(e, _) {
        for (var t, a, r = 0; r < e.length; r++) {
            if ("" == (a = _hashData(e[r], u.DataTags)).LeagueId && (a.LeagueId = t.LeagueId,
            a.LeagueName = t.LeagueName),
            "" == a.MUID && (a.MUID = t.MUID,
            a.MatchId = t.MatchId,
            a.MatchCode = t.MatchCode,
            a.HomeName = t.HomeName,
            a.AwayName = t.AwayName,
            a.KickoffTime = t.KickoffTime,
            a.ShowTime = t.ShowTime,
            a.StatsId = t.StatsId,
            a.SportRadar = t.SportRadar,
            a.StreamingId = t.StreamingId,
            a.Favorite = t.Favorite,
            a.ScoreH = t.ScoreH,
            a.ScoreA = t.ScoreA,
            a.TimerSuspend = t.TimerSuspend,
            void 0 !== LIVE_SCORE_DEF[u.SportType]))
                for (var d = LIVE_SCORE_DEF[u.SportType], s = 0; s < d.length; s++)
                    void 0 !== t[d[s]] && (a[d[s]] = t[d[s]]);
            var o;
            null != u.CustomIdx ? o = u.CustomIdx(u.EventList, a) : 1 == u.SortType ? (o = u.findIndex("KickoffTime", a.KickoffTime),
            o = u.adjustIndex1(o, "KickoffTime", a.KickoffTime, a.MatchCode)) : (o = u.findIndex("MatchCode", a.MatchCode),
            o = u.adjustIndex0(o, "MatchCode", a.MatchCode, a.MUID)),
            t = a,
            u.EventList = arrayInsert(u.EventList, o, new Array(a)),
            u.HtmlList = arrayInsert(u.HtmlList, o, new Array("")),
            C[a.MUID] = "ins"
        }
    }
    function c(e) {
        for (var _ in e) {
            C[_] = "srt";
            for (var t = e[_], a = I[_], r = a + 1; r < u.EventList.length; ) {
                if (u.EventList[r].MUID != _) {
                    r--;
                    break
                }
                r++
            }
            for (var d = u.EventList[a].MatchCode, s = u.EventList.slice(a, r + 1), o = u.HtmlList.slice(a, r + 1), n = 1 == u.SortType ? "KickoffTime" : "MatchCode", D = 0; D < s.length; D++)
                s[D][n] = t;
            u.EventList = arrayRemove(u.EventList, a, r),
            u.HtmlList = arrayRemove(u.HtmlList, a, r);
            var l;
            1 == u.SortType ? (l = u.findIndex("KickoffTime", t),
            l = u.adjustIndex1(l, "KickoffTime", t, d)) : (l = u.findIndex("MatchCode", t),
            l = u.adjustIndex0(l, "MatchCode", t, _)),
            u.EventList = arrayInsert(u.EventList, l, s),
            u.HtmlList = arrayInsert(u.HtmlList, l, o);
            var p = a < l ? a : l;
            for (D = u.EventList.length - 1; D >= p; D--)
                I[u.EventList[D].MUID] = D
        }
    }
    var u = this
      , m = null
      , L = void 0
      , R = void 0
      , T = void 0
      , g = void 0
      , h = void 0
      , y = void 0
      , A = void 0
      , H = void 0
      , I = new Array
      , C = new Array
      , v = new Array
      , f = new Array
      , w = new Array;
    this.DivBase = 2,
    this.HashHeader = null,
    this.DataTags = null,
    this.EventList = null,
    this.HtmlList = null,
    this.TemplateFrame = null,
    this.DataFrame = null,
    this.TableContainer = null,
    this.BetTypes = null,
    this.SubTitleField,
    this.RegenEverytime = !1,
    this.SortType = 0,
    this.SportType,
    this.OddsType = "4",
    this.slowDelete = !1,
    this.getTable = function() {
        return m
    }
    ,
    this.setTemplate = function(t) {
        this.TemplateFrame = t;
        null == (a = e(this.TemplateFrame, TMPL_LEAGUE_ID + "_" + u.SportType)) && (a = e(this.TemplateFrame, TMPL_LEAGUE_ID)),
        L = _formatTemplate(L = _(a), "{%", "}");
        var a;
        null == (a = e(this.TemplateFrame, TMPL_LEAGUE_LIVE_ID + "_" + u.SportType)) && (a = e(this.TemplateFrame, TMPL_LEAGUE_LIVE_ID)),
        R = null == a ? L : _formatTemplate(R = _(a), "{%", "}"),
        null == (a = e(this.TemplateFrame, TMPL_EVENT_ID + "_" + u.SportType)) && (a = e(this.TemplateFrame, TMPL_EVENT_ID)),
        y = _formatTemplate(y = _(a), "{%", "}"),
        null == (a = e(this.TemplateFrame, TMPL_LIVE_ID + "_" + u.SportType)) ? (a = this.TemplateFrame.document.getElementById(TMPL_LIVE_ID),
        T = null == a ? y : _formatTemplate(T = _(a), "{%", "}")) : T = _formatTemplate(T = _(a), "{%", "}"),
        null == (a = e(this.TemplateFrame, TMPL_EVENT_MASTER_ID + "_" + u.SportType)) ? (a = e(this.TemplateFrame, TMPL_EVENT_MASTER_ID),
        A = null == a ? y : _formatTemplate(A = _(a), "{%", "}")) : A = _formatTemplate(A = _(a), "{%", "}"),
        null == (a = e(this.TemplateFrame, TMPL_EVENT_FOOTER_ID + "_" + u.SportType)) ? (a = e(this.TemplateFrame, TMPL_EVENT_FOOTER_ID),
        H = null == a ? A : _formatTemplate(H = _(a), "{%", "}")) : H = _formatTemplate(H = _(a), "{%", "}"),
        null == (a = e(this.TemplateFrame, TMPL_LIVE_MASTER_ID + "_" + u.SportType)) ? (a = this.TemplateFrame.document.getElementById(TMPL_LIVE_MASTER_ID),
        g = null == a ? T : _formatTemplate(g = _(a), "{%", "}")) : g = _formatTemplate(g = _(a), "{%", "}"),
        null == (a = e(this.TemplateFrame, TMPL_LIVE_FOOTER_ID + "_" + u.SportType)) ? (a = this.TemplateFrame.document.getElementById(TMPL_LIVE_FOOTER_ID),
        h = null == a ? g : _formatTemplate(h = _(a), "{%", "}")) : h = _formatTemplate(h = _(a), "{%", "}")
    }
    ,
    this.setDatas = function(e, _, t) {
        this.DataTags = _;
        for (var a = new Array(e.length), r = 0, d = 0; d < e.length; d++) {
            var s = _hashData(e[d], _);
            if ("" == s.LeagueId) {
                var o = a[d - 1];
                s.LeagueId = o.LeagueId,
                s.LeagueName = o.LeagueName
            }
            if ("" == s.MUID) {
                o = a[d - 1];
                if (s.MUID = o.MUID,
                s.MatchId = o.MatchId,
                s.MatchCode = o.MatchCode,
                s.HomeName = o.HomeName,
                s.AwayName = o.AwayName,
                s.KickoffTime = o.KickoffTime,
                s.ShowTime = o.ShowTime,
                s.StatsId = o.StatsId,
                s.SportRadar = o.SportRadar,
                s.StreamingId = o.StreamingId,
                s.Favorite = o.Favorite,
                s.TimerSuspend = o.TimerSuspend,
                s.ScoreH = o.ScoreH,
                s.ScoreA = o.ScoreA,
                s.MatchIndex = o.MatchIndex,
                void 0 !== LIVE_SCORE_DEF[u.SportType])
                    for (var n = LIVE_SCORE_DEF[u.SportType], D = 0; D < n.length; D++)
                        void 0 !== o[n[D]] && (s[n[D]] = o[n[D]])
            } else
                s.MatchIndex = r++;
            s.Div = s.MatchIndex % this.DivBase,
            null != this.afterSetData && this.afterSetData(d, s, a),
            a[d] = s
        }
        this.EventList = a
    }
    ,
    this.paintOddsTable = function() {
        if (getLeagueList(),
        null != this.EventList) {
            var e = new Array(this.EventList.length + 26);
            this.HtmlList = new Array(this.EventList.length),
            e.push(t()),
            e.push(a()),
            e.push("<THead>"),
            e.push(r()),
            e.push("</THead><TBody>");
            for (var _, l, p, O, i, S = 0; S < this.EventList.length; S++) {
                if (null != this.SubTitleField) {
                    var E = this.EventList[S][this.SubTitleField];
                    i != E && (e.push(d(E)),
                    i = E)
                }
                var F = !0;
                void 0 !== this.EventList[S].IsMainMarket && (F = isFilterMainMarket(this.EventList[S].IsMainMarket));
                var M = this.EventList[S].LeagueId
                  , c = this.EventList[S].MatchId
                  , u = this.EventList[S].KickoffTime;
                if (M != _ && isFilterLeague(M) && F && isFilterKickoffTime(u) && isFilterMatch(c) && isFilterMROdds(this.EventList[S]) && CheckOdds1F1H(this.SportType, this.EventList[S])) {
                    var L = s(S);
                    "" != L && (_ = M,
                    e.push(L))
                }
                var R = this.EventList[S].MUID;
                S < this.EventList.length - 1 && (p = this.EventList[S + 1].MUID),
                l != R && (I[R] = S),
                O = p != R || S == this.EventList.length - 1 ? D(S) : l == R ? o(S) : n(S),
                l = R,
                this.HtmlList[S] = O,
                isFilterLeague(M) && F && isFilterKickoffTime(u) && isFilterMatch(c) && isFilterMROdds(this.EventList[S]) && CheckOdds1F1H(this.SportType, this.EventList[S]) && e.push(O)
            }
            e.push("</TBody></Table>");
            var T = e.join("");
            fFrame.IsPA && (T = (T = (T = (T = (T = T.replace(new RegExp("#ffccbc","gi"), "#e6d6fc")).replace(new RegExp("#ffddd2","gi"), "#f2eafd")).replace(new RegExp("#c6d4f1","gi"), "#f1f1f1")).replace(new RegExp("#e4e4e4","gi"), "#ffffff")).replace(new RegExp("#f5eeb8","gi"), "#fefddb")),
            this.TableContainer.innerHTML = T,
            m = null,
            m = this.TableContainer.childNodes[0],
            null != this.afterRepaintTable && this.afterRepaintTable(m, this.EventList)
        }
    }
    ,
    this.refreshSportTypeOddsTable = function(e, _, t, a, r, d, s, o, n) {
        this.TableContainer.innerHTML = "",
        C = new Array,
        O(d),
        p(r),
        i(s),
        null != this.updateAppendFields && this.updateAppendFields(o, this.EventList, I, C),
        null != n && E(n),
        F(_),
        c(t),
        M(a),
        this.regenTableHtml()
    }
    ,
    this.refreshOddsTable = function(e, _, t, a, r, d, s, o) {
        this.TableContainer.innerHTML = "",
        C = new Array,
        O(r),
        p(a),
        i(d),
        null != this.updateAppendFields && this.updateAppendFields(s, this.EventList, I, C),
        null != o && E(o),
        F(e),
        c(_),
        M(t),
        this.regenTableHtml()
    }
    ,
    this.findDataIndex = function(e, _) {
        for (var t = 0; t < this.EventList.length; t++)
            if (this.EventList[t][e] == _)
                return t;
        return -1
    }
    ,
    this.findIndex = function(e, _) {
        var t, a = 0, r = this.EventList.length - 1;
        if (0 == this.EventList.length)
            return 0;
        if (_ >= this.EventList[r][e])
            return r + 1;
        if (_ < this.EventList[a][e])
            return a;
        for (; a <= r; ) {
            t = Math.ceil((a + r) / 2);
            var d = this.EventList[t][e];
            if (d < _)
                a = t + 1;
            else if (d > _)
                r = t - 1;
            else
                for (t += 1; t < this.EventList.length; t++)
                    if (this.EventList[t][e] != _)
                        return t
        }
        for (t + 1 >= this.EventList.length && (t = this.EventList.length - 2),
        t += 1; t >= 0; t--)
            if (this.EventList[t][e] <= _)
                return t + 1;
        return 0
    }
    ,
    this.adjustIndex0 = function(e, _, t) {
        for (var a = e - 1; a >= 0 && this.EventList[a].MatchCode == _; a--)
            if (this.EventList[a].MUID >= t)
                return a + 1;
        return e
    }
    ,
    this.adjustIndex1 = function(e, _, t) {
        for (var a = e - 1; a >= 0 && this.EventList[a].KickoffTime == _; a--)
            if (this.EventList[a].MatchCode >= t)
                return a + 1;
        return e
    }
    ,
    this.adjustIndex1st = function(e, _, t, a) {
        var r;
        for (r = e - 1; r >= 0 && this.EventList[r][_] == t && this.EventList[r].MUID != a; r--)
            ;
        var d;
        for (d = r; d >= 0 && this.EventList[d][_] == t && this.EventList[d].MUID == a; d--)
            ;
        return d + 1
    }
    ,
    this.regenTableHtml = function() {
        getLeagueList(),
        I = new Array;
        var e = new Array;
        e.push(t()),
        e.push(a()),
        e.push("<THead>" + r() + "</THead><TBody>");
        for (var _, l, p, O, i, S = "-1", E = 0; E < this.EventList.length; E++) {
            if (null != this.SubTitleField) {
                var F = this.EventList[E][this.SubTitleField];
                O != F && (e.push(d(F)),
                O = F)
            }
            var M = this.EventList[E]
              , c = !0;
            void 0 !== this.EventList[E].IsMainMarket && (c = isFilterMainMarket(this.EventList[E].IsMainMarket)),
            _ = M.LeagueId,
            i = M.MatchId;
            var L = this.EventList[E].KickoffTime;
            if (_ != l && isFilterLeague(_) && c && isFilterKickoffTime(L) && isFilterMatch(i) && isFilterMROdds(this.EventList[E]) && CheckOdds1F1H(this.SportType, this.EventList[E])) {
                var R = s(E);
                "" != R && (l = _,
                e.push(R))
            }
            var T, g = this.EventList[E].MUID;
            E < this.EventList.length - 1 && (T = this.EventList[E + 1].MUID),
            p != g ? (I[g] = E,
            M.MatchIndex = ++S) : M.MatchIndex = S;
            var h = M.MatchIndex % this.DivBase;
            (u.RegenEverytime || null != C[M.MUID] || M.Div != h) && (M.Div = h,
            T != g || E == this.EventList.length - 1 ? this.HtmlList[E] = D(E) : this.HtmlList[E] = p != g ? n(E) : o(E)),
            p = g,
            isFilterLeague(_) && c && isFilterKickoffTime(L) && isFilterMatch(i) && isFilterMROdds(this.EventList[E]) && CheckOdds1F1H(this.SportType, this.EventList[E]) && e.push(this.HtmlList[E])
        }
        e.push("</TBody></Table>");
        var y = e.join("");
        fFrame.IsPA && (y = (y = (y = (y = (y = y.replace(new RegExp("#ffccbc","gi"), "#e6d6fc")).replace(new RegExp("#ffddd2","gi"), "#f2eafd")).replace(new RegExp("#c6d4f1","gi"), "#f1f1f1")).replace(new RegExp("#e4e4e4","gi"), "#ffffff")).replace(new RegExp("#f5eeb8","gi"), "#fefddb")),
        this.TableContainer.innerHTML = y,
        m = null,
        m = this.TableContainer.childNodes[0],
        null != this.afterRepaintTable && this.afterRepaintTable(m, this.EventList)
    }
    ,
    this.modifyOddsType = function(e, _, t) {
        var a = ["Odds_1_H", "Odds_1_A", "Odds_2_O", "Odds_2_E", "Odds_3_O", "Odds_3_U", "Odds_7_H", "Odds_7_A", "Odds_8_O", "Odds_8_U", "Odds_12_O", "Odds_12_E", "Odds_20_H", "Odds_20_A", "Odds_21_H", "Odds_21_A"];
        if (null != e)
            for (var r = 0; r < e.length; r++)
                for (var d = 0; d < a.length; d++) {
                    var s = e[r][a[d]];
                    s && (e[r][a[d]] = oddsTypeFormula(s, _, t))
                }
        return e
    }
}
function ConvertIndoOdds(e) {
    return e > 0 ? (-(e = e > .79 ? Math.floor(1 / e * 100) / 100 : Math.ceil(1 / e * 100) / 100)).toFixed(2) : e < -.79 ? (e = Math.round(Math.floor(100 * Math.abs(1 / e))) / 100).toFixed(2) : (e = Math.round((Math.ceil(100 * Math.abs(1 / e)) + .01) / 100 * 100) / 100).toFixed(2)
}
function _replaceTags(e, _) {
    var t = new Array(2 * _.length - 1);
    t[0] = _[0];
    for (var a, r = 1; r < _.length; r++)
        t[(a = 2 * r) - 1] = e[_[r][0]],
        t[a] = _[r][1];
    return t.join("").replace(/td>\s+<td/g, "td><td")
}
function replaceTags(e, _) {
    return _replaceTags(e, _formatTemplate(_, "{%", "}"))
}
function _formatTemplate(e, _, t) {
    for (var a = e.split(_), r = 1; r < a.length; r++) {
        var d = a[r].indexOf(t);
        a[r] = [a[r].substr(0, d), a[r].substr(d + 1, a[r].length - d)]
    }
    return a
}
function _hashData(e, _) {
    for (var t = new Array, a = Math.min(e.length, _.length), r = 0; r < a; r++)
        t[_[r]] = e[r];
    if ("/UnderOver.php" == location.pathname)
        for (var d = ["Odds_5_1", "Odds_5_2", "Odds_5_X", "Odds_15_1", "Odds_15_2", "Odds_15_X", "Odds_301_H", "Odds_301_A", "Odds_302_O", "Odds_302_U", "Odds_303_H", "Odds_303_A", "Odds_304_O", "Odds_304_U"], s = 0; s < d.length; s++)
            t[d[s]] && "" != t[d[s]] && (t[d[s]] = parseFloat(t[d[s]]).toFixed(2));
    return t
}
function ConvertOdds(e, _, t) {
    var a = ARR_TWOWAY_MAP[1];
    if ("/UnderOver.php" == location.pathname && -1 != indexOf(Object.keys(a), _) && -1 != indexOf(Object.keys(e), a[_][1]) && "" != e[_] && "" != e[a[_][1]]) {
        var r, d, s = "" == a[_][0] ? "" : e[a[_][0]];
        return a[_][2] ? (r = parseFloat(e[_]),
        d = parseFloat(e[a[_][1]]),
        spreadCalculation("h" == s ? 1 : "a" == s ? -1 : "" == s ? 0 : s, "h", r, d, t)) : (r = parseFloat(e[a[_][1]]),
        d = parseFloat(e[_]),
        spreadCalculation("a" == s ? 1 : "h" == s ? -1 : "" == s ? 0 : s, "a", d, r, t))
    }
    return e[_]
}
function arrayRemove(e, _, t) {
    if (null == t && (t = _),
    _ > t)
        return e.concat([]);
    _ < 0 && (_ = 0),
    t >= e.length && (t = e.length - 1);
    var a = e.slice(0, _)
      , r = e.slice(t + 1);
    return a.concat(r)
}
function arrayInsert(e, _, t) {
    if (_ <= 0)
        return t.concat(e);
    if (_ >= e.length)
        return e.concat(t);
    var a = e.slice(0, _)
      , r = e.slice(_);
    return (a = a.concat(t)).concat(r)
}
function SimpleOddsKeeper() {
    function e(e, _) {
        var t = new Array(2 * _.length - 1);
        t[0] = _[0];
        for (var a, r = 1; r < _.length; r++)
            t[(a = 2 * r) - 1] = e[_[r][0]],
            t[a] = _[r][1];
        return t.join("")
    }
    this.TableContainer = null,
    this.DivTmpl = null,
    this.newHash = new Array,
    this.oHash = new Array,
    this.MUID = null,
    this.MatchId = null,
    this.isParlay = "false",
    this.Market = "",
    this.OddsHTML = "",
    this.setDatas = function(e, _) {
        this.oHash = function(e, _, t) {
            for (var a = Math.min(e.length, _.length), r = 0; r < a; r++)
                t[_[r]] = e[r];
            return t
        }(e, _, this.oHash)
    }
    ,
    this.AppendOddsTable = function() {
        var _, t = this.DivTmpl;
        null != this.oHash && (_ = _formatTemplate(t, "{%", "}"),
        t = e(this.oHash, _)),
        null != this.newHash && (_ = _formatTemplate(t, "{@", "}"),
        t = e(this.newHash, _)),
        this.OddsHTML = this.OddsHTML + t
    }
    ,
    this.paintOddsTable = function() {
        var _;
        if (this.TableContainer.innerHTML = this.DivTmpl,
        null != this.oHash && (_ = _formatTemplate(this.TableContainer.innerHTML, "{%", "}"),
        this.TableContainer.innerHTML = e(this.oHash, _)),
        null != this.newHash && (_ = _formatTemplate(this.TableContainer.innerHTML, "{@", "}"),
        this.TableContainer.innerHTML = e(this.newHash, _)),
        fFrame.IsPA) {
            var t = this.TableContainer.innerHTML;
            t = (t = (t = (t = (t = t.replace(new RegExp("#ffccbc","gi"), "#e6d6fc")).replace(new RegExp("#ffddd2","gi"), "#f2eafd")).replace(new RegExp("#c6d4f1","gi"), "#f1f1f1")).replace(new RegExp("#e4e4e4","gi"), "#ffffff")).replace(new RegExp("#f5eeb8","gi"), "#fefddb"),
            this.TableContainer.innerHTML = t
        }
    }
    ,
    this.updateOdds = function(e, _, t) {
        for (var a = 0; a < t.length; a++)
            for (var r = 1; r < MultiSportODDS_DEF[parseInt(t[a], 10)].length; r++) {
                if (e[MultiSportODDS_DEF[parseInt(t[a], 10)][r]] != _[MultiSportODDS_DEF[parseInt(t[a], 10)][r]]) {
                    _["Changed_" + t[a]] = CLS_UPD;
                    break
                }
                _["Changed_" + t[a]] = ""
            }
        return _
    }
}
function getParent(e) {
    for (var _ = e, t = 0; t < 4; t++) {
        if (null != _.SiteMode)
            return _;
        _ = _.parent
    }
    return null
}
function SwapOdds(e) {
    if ("" == e)
        return e;
    return parseFloat(e) > 0 ? "-" + e : e.replace("-", "")
}
function ConvertData(e, _) {
    if (InITIAL)
        switch (_) {
        case "W":
            if (e.length <= 20)
                for (var t = 0; t < e.length; t++)
                    e[t][27] = SwapOdds(e[t][27]),
                    e[t][28] = SwapOdds(e[t][28]),
                    e[t][32] = SwapOdds(e[t][32]),
                    e[t][33] = SwapOdds(e[t][33]),
                    e[t][40] = SwapOdds(e[t][40]),
                    e[t][41] = SwapOdds(e[t][41]),
                    e[t][45] = SwapOdds(e[t][45]),
                    e[t][46] = SwapOdds(e[t][46]);
            else {
                t = 20;
                for (e.length <= 50 && (t = 0); t < e.length; t++)
                    e[t][27] = SwapOdds(e[t][27]),
                    e[t][28] = SwapOdds(e[t][28]),
                    e[t][32] = SwapOdds(e[t][32]),
                    e[t][33] = SwapOdds(e[t][33]),
                    e[t][40] = SwapOdds(e[t][40]),
                    e[t][41] = SwapOdds(e[t][41]),
                    e[t][45] = SwapOdds(e[t][45]),
                    e[t][46] = SwapOdds(e[t][46])
            }
            break;
        case "UI":
            for (t = 0; t < e.length; t++)
                e[t][27] = SwapOdds(e[t][27]),
                e[t][28] = SwapOdds(e[t][28]),
                e[t][32] = SwapOdds(e[t][32]),
                e[t][33] = SwapOdds(e[t][33]),
                e[t][40] = SwapOdds(e[t][40]),
                e[t][41] = SwapOdds(e[t][41]),
                e[t][45] = SwapOdds(e[t][45]),
                e[t][46] = SwapOdds(e[t][46]);
            break;
        case "UO":
            for (t = 0; t < e.length; t++)
                switch (e[t][1]) {
                case 1:
                case 3:
                case 7:
                case 8:
                    e[t][4] = SwapOdds(e[t][4]),
                    e[t][5] = SwapOdds(e[t][5])
                }
        }
    return e
}
function ShowBetList(e, _, t, a, r, d, s, o, n, D) {
    if (tmpMMRTr_Cls_live = MMR_TR_1,
    tmpMMRTr_Cls = MMR_TR_1,
    tmpOnlyMROdds = OnlyMROdds,
    tmpNoShowMROdds = NoShowMROdds,
    aTimespan = (new Date).getTime(),
    CheckMoreObj(parseInt(document.DataForm_D.Sport.value, 10))) {
        if (retryCnt[parseInt(document.DataForm_D.Sport.value, 10)]++,
        retryCnt[parseInt(document.DataForm_D.Sport.value, 10)] < 20)
            return void window.setTimeout(function() {
                ShowBetList(e, _, t, a, r, d, s, o, n, D)
            }, 500);
        retryCnt[parseInt(document.DataForm_D.Sport.value, 10)] = 0
    }
    var l, p;
    if ("l" == t ? (l = document.DataForm_L,
    DataFrame_L,
    p = g_OddsKeeper_L) : (l = document.DataForm_D,
    DataFrame_D,
    p = g_OddsKeeper_D),
    l.CT.value = _,
    "U" == e) {
        if (null == p)
            return void ("l" == t ? refreshData_L() : refreshData_D());
        p.OddsType = l.OddsType.value,
        p.DataTags = ARR_FIELDS_DEF1[1],
        d = ConvertData(d, "UI"),
        n = ConvertData(n, "UO"),
        p.RegenEverytime = !0,
        p.refreshSportTypeOddsTable("1", a, r, d, s, o, n, D),
        OpenMoreDiv(parseInt(document.DataForm_D.Sport.value, 10)),
        "l" == t ? ++lcnt > 30 && (lcnt = 0,
        l.RT.value = "W") : ++dcnt > 20 && (dcnt = 0,
        l.RT.value = "W")
    } else {
        var O;
        switch ("l" == t ? (lcnt = 0,
        O = "L",
        (p = g_OddsKeeper_L = new OddsKeeper).tag = "L",
        p.TableContainer = document.getElementById("oTableContainer_L")) : (dcnt = 0,
        O = "D",
        (p = g_OddsKeeper_D = new OddsKeeper).tag = "D",
        p.TableContainer = document.getElementById("oTableContainer_D")),
        p.OddsType = "" == l.OddsType.value ? "4" : l.OddsType.value,
        fFrame.DisplayMode) {
        case "1":
            if (!initialTmpl("UnderOver_tmpl_1", "UnderOver_tmpl.php?form=1", "ShowBetList('" + e + "','" + _ + "','" + t + "', DataFrame_" + O + ".N" + t + ");"))
                return;
            p.afterNewEvent = afterNewEvent_1,
            p.setTemplate(fFrame.document.getElementById("UnderOver_tmpl_1").contentWindow),
            p.RegenEverytime = !1;
            break;
        case "1F":
            if (!initialTmpl("UnderOver_tmpl_1F", "UnderOver_tmpl.php?form=1F", "ShowBetList('" + e + "','" + _ + "','" + t + "', DataFrame_" + O + ".N" + t + ");"))
                return;
            p.afterNewEvent = afterNewEvent_1F,
            p.setTemplate(fFrame.document.getElementById("UnderOver_tmpl_1F").contentWindow),
            p.RegenEverytime = !0;
            break;
        case "1H":
            if (!initialTmpl("UnderOver_tmpl_1H", "UnderOver_tmpl.php?form=1H", "ShowBetList('" + e + "','" + _ + "','" + t + "', DataFrame_" + O + ".N" + t + ");"))
                return;
            p.afterNewEvent = afterNewEvent_1H,
            p.setTemplate(fFrame.document.getElementById("UnderOver_tmpl_1H").contentWindow),
            p.RegenEverytime = !0;
            break;
        default:
            if (!initialTmpl("UnderOver_tmpl_3", "UnderOver_tmpl.php?form=3", "ShowBetList('" + e + "','" + _ + "','" + t + "', DataFrame_" + O + ".N" + t + ");"))
                return;
            p.afterNewEvent = afterNewEvent_3,
            p.setTemplate(fFrame.document.getElementById("UnderOver_tmpl_3").contentWindow),
            p.RegenEverytime = !1
        }
        p.afterNewLeague = afterNewLeague,
        a = ConvertData(a, "W"),
        p.SportType = "1",
        p.SortType = "1" == document.DataForm_L.OrderBy.value ? 1 : 0,
        p.afterNewLeague = afterNewLeague,
        p.afterRepaintTable = afterRepaintTable,
        p.updateAppendFields = updateAppendFields,
        p.BetTypes = ARR_BETYPE_DEF[1],
        p.setDatas(a, ARR_FIELDS_DEF1[1]),
        FinalpaintOddsTable(),
        OpenMoreDiv(parseInt(document.DataForm_D.Sport.value, 10))
    }
}
function afterNewLeague(e, _, t) {
    return (t = t.replace("{@Market}", document.DataForm_D.Market.value)).replace("{@Refresh}", RES_REFRESH)
}
function updateAppendFields(e, _, t, a) {
    for (var r = 0; r < e.length; r++) {
        for (var d = e[r][0], s = t[d]; s < _.length && _[s].MUID == d; )
            _[s].RedCardH = e[r][1],
            _[s].RedCardA = e[r][2],
            _[s].MoreCount = e[r][3],
            _[s].IsSuperLive = e[r][4],
            _[s].IsFastMarket = e[r][5],
            _[s].GVType = e[r][6],
            _[s].IsLiveChart = e[r][7],
            _[s].IsMainMarket = e[r][8],
            _[s].GameStatus = e[r][9],
            s++;
        a[d] = "updateAppend"
    }
}
function afterNewEvent_1(e, _, t, a) {
    var r = !1
      , d = !1
      , s = e[_]
      , o = !1;
    if (_ == e.length - 1 ? o = !0 : e[_ + 1].MUID != s.MUID && (o = !0),
    !a && !isInPeriod(s))
        return "";
    (CheckOddsId(s.OddsId_301) || CheckOddsId(s.OddsId_302) || CheckOddsId(s.OddsId_303) || CheckOddsId(s.OddsId_304)) && (a ? d = !0 : r = !0);
    var n = new Array;
    a ? (0 == s.LivePeriod ? n.LiveTimeCls = "1" == s.CsStatus ? "HalfTime" : "IsLive" : (n.LiveTimeCls = "LiveTime",
    2 == s.LivePeriod && s.InjuryTime > 0 ? n.InjuryTime = "+" + s.InjuryTime : n.InjuryTime = ""),
    n.RedCardH = getRedCardHtml(parseInt(s.RedCardH, 10)),
    n.RedCardA = getRedCardHtml(parseInt(s.RedCardA, 10)),
    0 == s.Div ? (n.MMRTr_Cls = MMR_TR_0,
    n.Tr_Cls = "live",
    n.BgColor = GetLiveBGColor(s.Div),
    OnlyMROdds && d ? (tmpMMRTr_Cls_live = tmpMMRTr_Cls_live == MMR_TR_1 ? MMR_TR_0 : MMR_TR_1,
    n.MMRTr_Cls = tmpMMRTr_Cls_live,
    n.MoreTr_Cls = tmpMMRTr_Cls_live) : n.MoreTr_Cls = "live") : (OnlyMROdds && d ? (tmpMMRTr_Cls_live = tmpMMRTr_Cls_live == MMR_TR_1 ? MMR_TR_0 : MMR_TR_1,
    n.MMRTr_Cls = tmpMMRTr_Cls_live,
    n.MoreTr_Cls = tmpMMRTr_Cls_live) : (n.MMRTr_Cls = MMR_TR_0,
    n.MoreTr_Cls = "live"),
    n.Tr_Cls = "liveligh",
    n.BgColor = GetLiveBGColor(s.Div))) : 0 == s.Div ? (n.MMRTr_Cls = MMR_TR_0,
    n.Tr_Cls = TR_0,
    n.BgColor = GetEventBGColor(s.Div),
    OnlyMROdds && r ? (tmpMMRTr_Cls = tmpMMRTr_Cls == MMR_TR_1 ? MMR_TR_0 : MMR_TR_1,
    n.MMRTr_Cls = tmpMMRTr_Cls,
    n.MoreTr_Cls = tmpMMRTr_Cls) : n.MoreTr_Cls = TR_0) : (OnlyMROdds && r ? (tmpMMRTr_Cls = tmpMMRTr_Cls == MMR_TR_1 ? MMR_TR_0 : MMR_TR_1,
    n.MMRTr_Cls = tmpMMRTr_Cls,
    n.MoreTr_Cls = tmpMMRTr_Cls) : (n.MMRTr_Cls = MMR_TR_0,
    n.MoreTr_Cls = TR_1),
    n.Tr_Cls = TR_1,
    n.BgColor = GetEventBGColor(s.Div)),
    n.MMRBgColor = GetMMREventBGColor(n.MMRTr_Cls);
    var D = s.FavorF;
    n.HomeName = s.HomeName,
    n.AwayName = s.AwayName,
    n.Home_Cls = "h" == D ? CLS_HDP_F : CLS_HDP_N,
    n.Away_Cls = "a" == D ? CLS_HDP_F : CLS_HDP_N;
    var l = "" == s.FavorF ? "" : s.FavorF;
    if (n.Odds_1_H = "" != s.Odds_1_H && "" != s.Odds_1_A ? spreadCalculation("h" == l ? 1 : "a" == l ? -1 : "" == l ? 0 : l, "h", parseFloat(s.Odds_1_H), parseFloat(s.Odds_1_A), fFrame.OddsType) : "",
    n.Odds_1_A = "" != s.Odds_1_H && "" != s.Odds_1_A ? spreadCalculation("h" == l ? -1 : "a" == l ? 1 : "" == l ? 0 : l, "a", parseFloat(s.Odds_1_A), parseFloat(s.Odds_1_H), fFrame.OddsType) : "",
    n.ODDS_1_H = "" != s.Odds_1_H && "" != s.Odds_1_A ? ("h" == l ? 1 : "a" == l ? -1 : "" == l ? 0 : l) + ",h," + s.Odds_1_H + "," + s.Odds_1_A : "",
    n.ODDS_1_A = "" != s.Odds_1_H && "" != s.Odds_1_A ? ("h" == l ? -1 : "a" == l ? 1 : "" == l ? 0 : l) + ",a," + s.Odds_1_A + "," + s.Odds_1_H : "",
    l = "" == s.Goal_3 ? "" : s.Goal_3,
    n.Odds_3_O = "" != s.Odds_3_O && "" != s.Odds_3_U ? spreadCalculation("h" == l ? 1 : "a" == l ? -1 : "" == l ? 0 : l, "h", parseFloat(s.Odds_3_O), parseFloat(s.Odds_3_U), fFrame.OddsType) : "",
    n.Odds_3_U = "" != s.Odds_3_O && "" != s.Odds_3_U ? spreadCalculation("h" == l ? -1 : "a" == l ? 1 : "" == l ? 0 : l, "a", parseFloat(s.Odds_3_U), parseFloat(s.Odds_3_O), fFrame.OddsType) : "",
    n.ODDS_3_O = "" != s.Odds_3_O && "" != s.Odds_3_U ? "X,h," + s.Odds_3_O + "," + s.Odds_3_U : "",
    n.ODDS_3_U = "" != s.Odds_3_O && "" != s.Odds_3_U ? "X,a," + s.Odds_3_U + "," + s.Odds_3_O : "",
    l = "" == s.FavorH1 ? "" : s.FavorH1,
    n.Odds_7_H = "" != s.Odds_7_H && "" != s.Odds_7_A ? spreadCalculation("h" == l ? 1 : "a" == l ? -1 : "" == l ? 0 : l, "h", parseFloat(s.Odds_7_H), parseFloat(s.Odds_7_A), fFrame.OddsType) : "",
    n.Odds_7_A = "" != s.Odds_7_H && "" != s.Odds_7_A ? spreadCalculation("h" == l ? -1 : "a" == l ? 1 : "" == l ? 0 : l, "a", parseFloat(s.Odds_7_A), parseFloat(s.Odds_7_H), fFrame.OddsType) : "",
    n.ODDS_7_H = "" != s.Odds_7_H && "" != s.Odds_7_A ? ("h" == l ? 1 : "a" == l ? -1 : "" == l ? 0 : l) + ",h," + s.Odds_7_H + "," + s.Odds_7_A : "",
    n.ODDS_7_A = "" != s.Odds_7_H && "" != s.Odds_7_A ? ("h" == l ? -1 : "a" == l ? 1 : "" == l ? 0 : l) + ",a," + s.Odds_7_A + "," + s.Odds_7_H : "",
    l = "" == s.Goal_8 ? "" : s.Goal_8,
    n.Odds_8_O = "" != s.Odds_8_O && "" != s.Odds_8_U ? spreadCalculation("h" == l ? 1 : "a" == l ? -1 : "" == l ? 0 : l, "h", parseFloat(s.Odds_8_O), parseFloat(s.Odds_8_U), fFrame.OddsType) : "",
    n.Odds_8_U = "" != s.Odds_8_O && "" != s.Odds_8_U ? spreadCalculation("h" == l ? -1 : "a" == l ? 1 : "" == l ? 0 : l, "a", parseFloat(s.Odds_8_U), parseFloat(s.Odds_8_O), fFrame.OddsType) : "",
    n.ODDS_8_O = "" != s.Odds_8_O && "" != s.Odds_8_U ? "X,h," + s.Odds_8_O + "," + s.Odds_8_U : "",
    n.ODDS_8_U = "" != s.Odds_8_O && "" != s.Odds_8_U ? "X,a," + s.Odds_8_U + "," + s.Odds_8_O : "",
    n.Odds_1_H_Cls = n.Odds_1_H < 0 ? CLS_EVEN : CLS_ODD,
    n.Odds_1_A_Cls = n.Odds_1_A < 0 ? CLS_EVEN : CLS_ODD,
    n.Odds_3_O_Cls = n.Odds_3_O < 0 ? CLS_EVEN : CLS_ODD,
    n.Odds_3_U_Cls = n.Odds_3_U < 0 ? CLS_EVEN : CLS_ODD,
    n.Odds_7_H_Cls = n.Odds_7_H < 0 ? CLS_EVEN : CLS_ODD,
    n.Odds_7_A_Cls = n.Odds_7_A < 0 ? CLS_EVEN : CLS_ODD,
    n.Odds_8_O_Cls = n.Odds_8_O < 0 ? CLS_EVEN : CLS_ODD,
    n.Odds_8_U_Cls = n.Odds_8_U < 0 ? CLS_EVEN : CLS_ODD,
    n.isParlay = 0,
    "1" == s.TimerSuspend ? (n.TimeSuspendCls1 = CLS_LS_OFF,
    n.TimeSuspendCls = CLS_LS_ON) : (n.TimeSuspendCls1 = CLS_LS_ON,
    n.TimeSuspendCls = CLS_LS_OFF),
    n.Display_More = CLS_LS_OFF,
    n.More_Style = CLS_LS_OFF,
    n.SuperLive_Style = CLS_LS_OFF,
    n.FastMarket_Style = CLS_LS_OFF,
    o) {
        for (var p = _, O = e[p]; O.MUID == s.MUID; ) {
            if ((O = e[p]).MUID != s.MUID) {
                O = e[p + 1];
                break
            }
            if (0 == p) {
                O = e[0];
                break
            }
            p--
        }
        DisplayMoreHtml(parseInt(document.DataForm_D.Sport.value, 10), s.MUID, n, "Soccer_More"),
        n.More = getMoreLabel_1(s.MoreCount, O.OddsId_5, O.OddsId_15, n.Display_More == CLS_LS_ON ? "off" : ""),
        "" != n.More && (n.More_Style = ""),
        "True" == s.IsSuperLive && fFrame.CanSeeSuperLive && (n.SuperLive_Style = CLS_LS_ON),
        "True" == s.IsFastMarket && (n.FastMarket_Style = CLS_LS_ON)
    }
    if (n.MR_DISP1 = CLS_LS_OFF,
    n.MR_DISP2 = CLS_LS_ON,
    n.MR_DISP3 = CLS_LS_ON,
    0 == _ || e[_ - 1].MatchId != s.MatchId) {
        if (d || r) {
            n.MR_DISP1 = CLS_LS_ON,
            n.MR_DISP2 = CLS_LS_OFF;
            D = s.FavorF_301;
            n.HomeName = s.HomeName,
            n.AwayName = s.AwayName,
            n.Home_MR_Cls = "h" == D ? CLS_HDP_F : CLS_HDP_N,
            n.Away_MR_Cls = "a" == D ? CLS_HDP_F : CLS_HDP_N,
            "" == s.Odds_301_H ? n.Value_301 = "" : n.Value_301 = GenMRHdp("" == s.Value_301 ? 0 : s.Value_301, s.Percentage_301),
            "" == s.Odds_303_H ? n.Value_303 = "" : n.Value_303 = GenMRHdp("" == s.Value_303 ? 0 : s.Value_303, s.Percentage_303),
            "" == s.Odds_302_O ? n.Goal_302 = "" : n.Goal_302 = GenMRHdp("" == s.Goal_302 ? 0 : s.Goal_302, s.Percentage_302),
            "" == s.Odds_304_O ? n.Goal_304 = "" : n.Goal_304 = GenMRHdp("" == s.Goal_304 ? 0 : s.Goal_304, s.Percentage_304)
        }
        switch (s.GVType) {
        case "1":
            $("#MainFly").addClass(RNB_CSS),
            n.SportRadarInfo = getRunningHtml(s.MatchId, a ? "IsLive" : "", s.GVType, s.HomeName, s.AwayName);
            break;
        case "2":
            break;
        case "3":
            $("#MainFly").removeClass(RNB_CSS),
            n.SportRadarInfo = getSportRadarHtml(s.MatchId, a ? "IsLive" : "")
        }
        if (n.StatsInfo = "0" == s.StatsId ? "" : getStatsHtml(s.MatchId),
        n.LiveChart = "False" == s.IsLiveChart ? "" : getLiveChartHtml(s.MatchId),
        n.Streaming = getStreamingHtml(s.MatchId, s.StreamingId, a),
        n.Favorites = getFavoritesHtml(s.MUID, s.MatchCode, "1" == s.Favorite || "1" == s.FavLeague, a),
        n.FavLeagues = getFavLeaguesHtml(document.DataForm_D.Sport.value, s.LeagueId, "1" == s.FavLeague, a),
        n.ScoreMap = getScoreMapHtml(s.MatchId),
        a)
            switch (s.GameStatus) {
            case "1":
                n.GameStatus = '<div class="happen LiveTime" Title="' + RES_PRC_full + '"><b>' + RES_PRC + "</b></div>";
                break;
            case "2":
                n.GameStatus = '<div class="happen LiveTime" Title="' + RES_PPen_full + '"><b>' + RES_PPen + "</b></div>";
                break;
            case "3":
                n.GameStatus = '<div class="happen LiveTime" Title="' + RES_VAR_full + '"><b>' + RES_VAR + "</b></div>";
                break;
            case "4":
                n.GameStatus = '<div class="happen LiveTime" Title="' + RES_Pen_full + '"><b>' + RES_Pen + "</b></div>";
                break;
            case "5":
                n.GameStatus = '<div class="happen LiveTime" Title="' + RES_Inj_full + '"><b>' + RES_Inj + "</b></div>";
                break;
            default:
                n.GameStatus = ""
            }
    }
    if (n.TimerSuspend = s.TimerSuspend,
    OnlyMROdds && (n.MR_DISP3 = CLS_LS_OFF,
    n.Display_More = CLS_LS_OFF),
    NoShowMROdds && (n.MR_DISP1 = CLS_LS_OFF,
    n.MR_DISP2 = CLS_LS_ON),
    NoShowMROdds || n.MR_DISP1 == CLS_LS_OFF) {
        var i = new RegExp("\x3c!--MR_START--\x3e.*\x3c!--MR_END--\x3e");
        t = t.replace(i, "")
    } else
        t = (t = t.replace("\x3c!--MR_START--\x3e", "")).replace("\x3c!--MR_END--\x3e", "");
    if (OnlyMROdds || n.MR_DISP3 == CLS_LS_OFF) {
        var S = new RegExp("\x3c!--MY_START--\x3e.*\x3c!--MY_END--\x3e");
        t = t.replace(S, "")
    } else
        t = (t = t.replace("\x3c!--MY_START--\x3e", "")).replace("\x3c!--MY_END--\x3e", "");
    if ("" != n.More)
        t = (t = t.replace("\x3c!--SMORE_START--\x3e", "")).replace("\x3c!--SMORE_END--\x3e", "");
    else {
        var E = new RegExp("\x3c!--SMORE_START--\x3e.*\x3c!--SMORE_END--\x3e");
        t = t.replace(E, "")
    }
    return t = _formatTemplate(t, "{@", "}"),
    t = _replaceTags(n, t)
}
function CheckOddsId(e) {
    return void 0 !== e && (null != e && "" != e)
}
function GenMRHdp(e, _) {
    var t = parseInt(_);
    return t >= 0 ? e + " (" + t + ")" : e + ' <span style="color:#b50000;">(' + t + ")</span>"
}
function MR_Switch() {
    if (!OnlyMROdds) {
        var e = document.getElementById("MR_Switch").className;
        "on" == e ? (e = "off",
        NoShowMROdds = !0) : (e = "on",
        NoShowMROdds = !1),
        document.getElementById("MR_Switch").className = e;
        var _ = new Object;
        _.pagename = fFrame.LastSelectedMArket.toLowerCase(),
        _.selmmr = e,
        _.mode = "mmr",
        SelLeagueThreadId = "RecSelMMR",
        ExecAjax("RecSelData.php", _, "POST", SelLeagueThreadId, "RecSelMMR"),
        rePaint()
    }
}
function RecSelMMR(e) {}
function afterNewEvent_3(e, _, t, a) {
    var r = !1
      , d = !1
      , s = e[_]
      , o = !1;
    if (_ == e.length - 1 ? o = !0 : e[_ + 1].MUID != s.MUID && (o = !0),
    !a && !isInPeriod(s))
        return "";
    (CheckOddsId(s.OddsId_301) || CheckOddsId(s.OddsId_302) || CheckOddsId(s.OddsId_303) || CheckOddsId(s.OddsId_304)) && (a ? d = !0 : r = !0);
    var n = new Array;
    n.Market = document.DataForm_D.Market.value,
    n.HomeName = s.HomeName,
    n.AwayName = s.AwayName;
    var D = "" == s.FavorF ? "" : s.FavorF;
    switch (n.Odds_1_H = "" != s.Odds_1_H && "" != s.Odds_1_A ? spreadCalculation("h" == D ? 1 : "a" == D ? -1 : "" == D ? 0 : D, "h", parseFloat(s.Odds_1_H), parseFloat(s.Odds_1_A), fFrame.OddsType) : "",
    n.Odds_1_A = "" != s.Odds_1_H && "" != s.Odds_1_A ? spreadCalculation("h" == D ? -1 : "a" == D ? 1 : "" == D ? 0 : D, "a", parseFloat(s.Odds_1_A), parseFloat(s.Odds_1_H), fFrame.OddsType) : "",
    n.ODDS_1_H = "" != s.Odds_1_H && "" != s.Odds_1_A ? ("h" == D ? 1 : "a" == D ? -1 : "" == D ? 0 : D) + ",h," + s.Odds_1_H + "," + s.Odds_1_A : "",
    n.ODDS_1_A = "" != s.Odds_1_H && "" != s.Odds_1_A ? ("h" == D ? -1 : "a" == D ? 1 : "" == D ? 0 : D) + ",a," + s.Odds_1_A + "," + s.Odds_1_H : "",
    D = "" == s.Goal_3 ? "" : s.Goal_3,
    n.Odds_3_O = "" != s.Odds_3_O && "" != s.Odds_3_U ? spreadCalculation("h" == D ? 1 : "a" == D ? -1 : "" == D ? 0 : D, "h", parseFloat(s.Odds_3_O), parseFloat(s.Odds_3_U), fFrame.OddsType) : "",
    n.Odds_3_U = "" != s.Odds_3_O && "" != s.Odds_3_U ? spreadCalculation("h" == D ? -1 : "a" == D ? 1 : "" == D ? 0 : D, "a", parseFloat(s.Odds_3_U), parseFloat(s.Odds_3_O), fFrame.OddsType) : "",
    n.ODDS_3_O = "" != s.Odds_3_O && "" != s.Odds_3_U ? "X,h," + s.Odds_3_O + "," + s.Odds_3_U : "",
    n.ODDS_3_U = "" != s.Odds_3_O && "" != s.Odds_3_U ? "X,a," + s.Odds_3_U + "," + s.Odds_3_O : "",
    D = "" == s.FavorH1 ? "" : s.FavorH1,
    n.Odds_7_H = "" != s.Odds_7_H && "" != s.Odds_7_A ? spreadCalculation("h" == D ? 1 : "a" == D ? -1 : "" == D ? 0 : D, "h", parseFloat(s.Odds_7_H), parseFloat(s.Odds_7_A), fFrame.OddsType) : "",
    n.Odds_7_A = "" != s.Odds_7_H && "" != s.Odds_7_A ? spreadCalculation("h" == D ? -1 : "a" == D ? 1 : "" == D ? 0 : D, "a", parseFloat(s.Odds_7_A), parseFloat(s.Odds_7_H), fFrame.OddsType) : "",
    n.ODDS_7_H = "" != s.Odds_7_H && "" != s.Odds_7_A ? ("h" == D ? 1 : "a" == D ? -1 : "" == D ? 0 : D) + ",h," + s.Odds_7_H + "," + s.Odds_7_A : "",
    n.ODDS_7_A = "" != s.Odds_7_H && "" != s.Odds_7_A ? ("h" == D ? -1 : "a" == D ? 1 : "" == D ? 0 : D) + ",a," + s.Odds_7_A + "," + s.Odds_7_H : "",
    D = "" == s.Goal_8 ? "" : s.Goal_8,
    n.Odds_8_O = "" != s.Odds_8_O && "" != s.Odds_8_U ? spreadCalculation("h" == D ? 1 : "a" == D ? -1 : "" == D ? 0 : D, "h", parseFloat(s.Odds_8_O), parseFloat(s.Odds_8_U), fFrame.OddsType) : "",
    n.Odds_8_U = "" != s.Odds_8_O && "" != s.Odds_8_U ? spreadCalculation("h" == D ? -1 : "a" == D ? 1 : "" == D ? 0 : D, "a", parseFloat(s.Odds_8_U), parseFloat(s.Odds_8_O), fFrame.OddsType) : "",
    n.ODDS_8_O = "" != s.Odds_8_O && "" != s.Odds_8_U ? "X,h," + s.Odds_8_O + "," + s.Odds_8_U : "",
    n.ODDS_8_U = "" != s.Odds_8_O && "" != s.Odds_8_U ? "X,a," + s.Odds_8_U + "," + s.Odds_8_O : "",
    n.Odds_1_H_Cls = n.Odds_1_H < 0 ? CLS_EVEN : CLS_ODD,
    n.Odds_1_A_Cls = n.Odds_1_A < 0 ? CLS_EVEN : CLS_ODD,
    n.Odds_3_O_Cls = n.Odds_3_O < 0 ? CLS_EVEN : CLS_ODD,
    n.Odds_3_U_Cls = n.Odds_3_U < 0 ? CLS_EVEN : CLS_ODD,
    n.Odds_7_H_Cls = n.Odds_7_H < 0 ? CLS_EVEN : CLS_ODD,
    n.Odds_7_A_Cls = n.Odds_7_A < 0 ? CLS_EVEN : CLS_ODD,
    n.Odds_8_O_Cls = n.Odds_8_O < 0 ? CLS_EVEN : CLS_ODD,
    n.Odds_8_U_Cls = n.Odds_8_U < 0 ? CLS_EVEN : CLS_ODD,
    n.Draw = getDrawHtml("" != s.OddsId_5 || "" != s.OddsId_15),
    a ? (0 == s.LivePeriod ? n.LiveTimeCls = "1" == s.CsStatus ? "HalfTime" : "IsLive" : (n.LiveTimeCls = "LiveTime",
    2 == s.LivePeriod && s.InjuryTime > 0 ? n.InjuryTime = "+" + s.InjuryTime : n.InjuryTime = ""),
    n.RedCardH = getRedCardHtml(parseInt(s.RedCardH, 10)),
    n.RedCardA = getRedCardHtml(parseInt(s.RedCardA, 10)),
    0 == s.Div ? (n.MMRTr_Cls = MMR_TR_0,
    n.Tr_Cls = "live",
    n.BgColor = GetLiveBGColor(s.Div),
    OnlyMROdds && d ? (tmpMMRTr_Cls_live = tmpMMRTr_Cls_live == MMR_TR_1 ? MMR_TR_0 : MMR_TR_1,
    n.MMRTr_Cls = tmpMMRTr_Cls_live,
    n.MoreTr_Cls = tmpMMRTr_Cls_live) : n.MoreTr_Cls = "live") : (OnlyMROdds && d ? (tmpMMRTr_Cls_live = tmpMMRTr_Cls_live == MMR_TR_1 ? MMR_TR_0 : MMR_TR_1,
    n.MMRTr_Cls = tmpMMRTr_Cls_live,
    n.MoreTr_Cls = tmpMMRTr_Cls_live) : (n.MMRTr_Cls = MMR_TR_0,
    n.MoreTr_Cls = "liveligh"),
    n.Tr_Cls = "liveligh",
    n.BgColor = GetLiveBGColor(s.Div))) : 0 == s.Div ? (n.MMRTr_Cls = MMR_TR_0,
    n.Tr_Cls = TR_0,
    n.BgColor = GetEventBGColor(s.Div),
    OnlyMROdds && r ? (tmpMMRTr_Cls = tmpMMRTr_Cls == MMR_TR_1 ? MMR_TR_0 : MMR_TR_1,
    n.MMRTr_Cls = tmpMMRTr_Cls,
    n.MoreTr_Cls = tmpMMRTr_Cls) : n.MoreTr_Cls = TR_0) : (OnlyMROdds && r ? (tmpMMRTr_Cls = tmpMMRTr_Cls == MMR_TR_1 ? MMR_TR_0 : MMR_TR_1,
    n.MMRTr_Cls = tmpMMRTr_Cls,
    n.MoreTr_Cls = tmpMMRTr_Cls) : (n.MMRTr_Cls = MMR_TR_0,
    n.MoreTr_Cls = TR_1),
    n.Tr_Cls = TR_1,
    n.BgColor = GetEventBGColor(s.Div)),
    n.MMRBgColor = GetMMREventBGColor(n.MMRTr_Cls),
    s.FavorF) {
    case "h":
        n.Home_Cls = CLS_HDP_F,
        n.Away_Cls = CLS_HDP_N,
        n.Value_1_H = s.Value_1,
        n.Value_1_A = "";
        break;
    case "a":
        n.Home_Cls = CLS_HDP_N,
        n.Away_Cls = CLS_HDP_F,
        n.Value_1_H = "",
        n.Value_1_A = s.Value_1;
        break;
    default:
        n.Home_Cls = CLS_HDP_N,
        n.Away_Cls = CLS_HDP_N,
        "" != s.Odds_1_H ? n.Value_1_H = "0" : n.Value_1_H = "",
        n.Value_1_A = ""
    }
    switch (s.FavorH1) {
    case "h":
        n.Value_7_H = s.Value_7,
        n.Value_7_A = "";
        break;
    case "a":
        n.Value_7_H = "",
        n.Value_7_A = s.Value_7;
        break;
    default:
        "" != s.Odds_7_H ? n.Value_7_H = "0" : n.Value_7_H = "",
        n.Value_7_A = ""
    }
    if (n.UNDER_3 = "" == s.Goal_3 ? "" : RES_UNDER,
    n.UNDER_8 = "" == s.Goal_8 ? "" : RES_UNDER,
    n.isParlay = 0,
    "1" == s.TimerSuspend ? (n.TimeSuspendCls1 = CLS_LS_OFF,
    n.TimeSuspendCls = CLS_LS_ON) : (n.TimeSuspendCls1 = CLS_LS_ON,
    n.TimeSuspendCls = CLS_LS_OFF),
    n.Display_More = CLS_LS_OFF,
    n.More_Style = CLS_LS_OFF,
    n.SuperLive_Style = CLS_LS_OFF,
    n.FastMarket_Style = CLS_LS_OFF,
    o && (DisplayMoreHtml(parseInt(document.DataForm_D.Sport.value, 10), s.MUID, n, "Soccer_More"),
    "0" == s.MoreCount && (n.Display_More = CLS_LS_OFF),
    n.More = getMoreLabel_3(s.MoreCount, a),
    "" != n.More ? (n.More_Style = "",
    n.Display_More == CLS_LS_ON && (n.More_Style = "off")) : (n.Display_More = CLS_LS_OFF,
    n.MoreData = ""),
    "True" == s.IsSuperLive && fFrame.CanSeeSuperLive && (n.SuperLive_Style = CLS_LS_ON),
    "True" == s.IsFastMarket && (n.FastMarket_Style = CLS_LS_ON)),
    n.MR_DISP1 = CLS_LS_OFF,
    n.MR_DISP2 = CLS_LS_ON,
    n.MR_DISP3 = CLS_LS_ON,
    0 == _ || e[_ - 1].MatchId != s.MatchId) {
        if (d || r) {
            switch (n.MR_DISP1 = CLS_LS_ON,
            o || (n.MR_DISP2 = CLS_LS_OFF),
            s.FavorF_301) {
            case "h":
                n.Home_MR_Cls = CLS_HDP_F,
                n.Away_MR_Cls = CLS_HDP_N,
                n.Value_301_H = GenMRHdp("" == s.Value_301 ? 0 : s.Value_301, s.Percentage_301),
                n.Value_301_A = "";
                break;
            case "a":
                n.Home_MR_Cls = CLS_HDP_N,
                n.Away_MR_Cls = CLS_HDP_F,
                n.Value_301_H = "",
                n.Value_301_A = GenMRHdp("" == s.Value_301 ? 0 : s.Value_301, s.Percentage_301);
                break;
            default:
                n.Home_MR_Cls = CLS_HDP_N,
                n.Away_MR_Cls = CLS_HDP_N,
                "" != s.Odds_301_H ? n.Value_301_H = GenMRHdp(s.Value_301, s.Percentage_301) : n.Value_301_H = "",
                n.Value_301_A = ""
            }
            switch (s.FavorH_303) {
            case "h":
                n.Value_303_H = GenMRHdp("" == s.Value_303 ? 0 : s.Value_303, s.Percentage_303),
                n.Value_303_A = "";
                break;
            case "a":
                n.Value_303_H = "",
                n.Value_303_A = GenMRHdp("" == s.Value_303 ? 0 : s.Value_303, s.Percentage_303);
                break;
            default:
                "" != s.Odds_303_H ? n.Value_303_H = GenMRHdp(s.Value_303, s.Percentage_303) : n.Value_303_H = "",
                n.Value_303_A = ""
            }
            "" == s.Odds_302_O ? n.Goal_302 = "" : n.Goal_302 = GenMRHdp("" == s.Goal_302 ? 0 : s.Goal_302, s.Percentage_302),
            "" == s.Odds_304_O ? n.Goal_304 = "" : n.Goal_304 = GenMRHdp("" == s.Goal_304 ? 0 : s.Goal_304, s.Percentage_304),
            n.UNDER_302 = "" == n.Goal_302 ? "" : RES_UNDER,
            n.UNDER_304 = "" == n.Goal_304 ? "" : RES_UNDER
        }
        switch (n.ShowMatch = getShowMatchHtml(s.MatchId, 1, document.DataForm_D.Market.value),
        s.GVType) {
        case "1":
            $("#MainFly").addClass(RNB_CSS),
            n.SportRadarInfo = getRunningHtml(s.MatchId, a ? "IsLive" : "", s.GVType, s.HomeName, s.AwayName);
            break;
        case "2":
            break;
        case "3":
            $("#MainFly").removeClass(RNB_CSS),
            n.SportRadarInfo = getSportRadarHtml(s.MatchId, a ? "IsLive" : "")
        }
        n.StatsInfo = "0" == s.StatsId ? "" : getStatsHtml(s.MatchId),
        n.LiveChart = "False" == s.IsLiveChart ? "" : getLiveChartHtml(s.MatchId),
        n.Streaming = getStreamingHtml(s.MatchId, s.StreamingId, a);
        "1" == document.DataForm_L.OrderBy.value ? s.KickoffTime : s.MatchCode;
        if (n.Favorites = getFavoritesHtml(s.MUID, s.MatchCode, "1" == s.Favorite || "1" == s.FavLeague, a),
        n.FavLeagues = getFavLeaguesHtml(document.DataForm_D.Sport.value, s.LeagueId, "1" == s.FavLeague, a),
        n.ScoreMap = getScoreMapHtml(s.MatchId),
        a)
            switch (s.GameStatus) {
            case "1":
                n.GameStatus = '<div class="happen LiveTime" Title="' + RES_PRC_full + '"><b>' + RES_PRC + "</b></div>";
                break;
            case "2":
                n.GameStatus = '<div class="happen LiveTime" Title="' + RES_PPen_full + '"><b>' + RES_PPen + "</b></div>";
                break;
            case "3":
                n.GameStatus = '<div class="happen LiveTime" Title="' + RES_VAR_full + '"><b>' + RES_VAR + "</b></div>";
                break;
            case "4":
                n.GameStatus = '<div class="happen LiveTime" Title="' + RES_Pen_full + '"><b>' + RES_Pen + "</b></div>";
                break;
            case "5":
                n.GameStatus = '<div class="happen LiveTime" Title="' + RES_Inj_full + '"><b>' + RES_Inj + "</b></div>";
                break;
            default:
                n.GameStatus = ""
            }
    }
    if (n.MR_rowspan = "1",
    n.MR_dline = "",
    OnlyMROdds && (n.MR_rowspan = "2",
    n.MR_dline = "none_dline",
    n.MR_DISP3 = CLS_LS_OFF,
    n.MR_DISP2 = CLS_LS_OFF,
    n.Display_More = CLS_LS_OFF),
    NoShowMROdds && (n.MR_DISP1 = CLS_LS_OFF,
    n.MR_DISP2 = CLS_LS_ON),
    NoShowMROdds || n.MR_DISP1 == CLS_LS_OFF) {
        var l = new RegExp("\x3c!--MR_START--\x3e.*\x3c!--MR_END--\x3e");
        t = t.replace(l, "")
    } else
        t = (t = t.replace("\x3c!--MR_START--\x3e", "")).replace("\x3c!--MR_END--\x3e", "");
    if (OnlyMROdds || n.MR_DISP3 == CLS_LS_OFF) {
        var p = new RegExp("\x3c!--MY_START--\x3e.*\x3c!--MY_END--\x3e");
        t = t.replace(p, "")
    } else
        t = (t = t.replace("\x3c!--MY_START--\x3e", "")).replace("\x3c!--MY_END--\x3e", "");
    if ("" != n.More || "True" == s.IsSuperLive || "True" == s.IsFastMarket)
        t = (t = t.replace("\x3c!--SMORE_START--\x3e", "")).replace("\x3c!--SMORE_END--\x3e", ""),
        n.MY_rowspan = "2",
        n.MY_dline = "none_dline";
    else {
        n.MY_rowspan = "1",
        n.MR_rowspan = "1",
        n.MY_dline = "",
        n.MR_dline = "";
        var O = new RegExp("\x3c!--SMORE_START--\x3e.*\x3c!--SMORE_END--\x3e");
        t = t.replace(O, "")
    }
    return _replaceTags(n, _formatTemplate(t, "{@", "}"))
}
function afterNewEvent_1F(e, _, t, a) {
    var r = !1
      , d = !1
      , s = e[_]
      , o = !1;
    if (_ == e.length - 1 ? o = !0 : e[_ + 1].MUID != s.MUID ? o = !0 : "" == e[_ + 1].Value_1 && "" == e[_ + 1].OddsId_1 && "" == e[_ + 1].Goal_3 && "" == e[_ + 1].OddsId_3 && (o = !0),
    !a && !isInPeriod(s))
        return "";
    if ("" == s.Value_1 && "" == s.OddsId_1 && "" == s.Goal_3 && "" == s.OddsId_3 && "" == s.Value_301 && "" == s.OddsId_301 && "" == s.Goal_302 && "" == s.OddsId_302)
        return "";
    (CheckOddsId(s.OddsId_301) || CheckOddsId(s.OddsId_302)) && (a ? d = !0 : r = !0);
    var n = new Array;
    0 == _ && (TrFlag = !1),
    PreMatchId != s.MatchId && (TrFlag = !TrFlag),
    s.Div = TrFlag ? 0 : 1,
    a ? (0 == s.LivePeriod ? n.LiveTimeCls = "1" == s.CsStatus ? "HalfTime" : "IsLive" : (n.LiveTimeCls = "LiveTime",
    2 == s.LivePeriod && s.InjuryTime > 0 ? n.InjuryTime = "+" + s.InjuryTime : n.InjuryTime = ""),
    n.RedCardH = getRedCardHtml(parseInt(s.RedCardH, 10)),
    n.RedCardA = getRedCardHtml(parseInt(s.RedCardA, 10)),
    0 == s.Div ? (n.MMRTr_Cls = MMR_TR_0,
    n.Tr_Cls = "live",
    n.BgColor = GetLiveBGColor(s.Div),
    OnlyMROdds && d ? (tmpMMRTr_Cls_live = tmpMMRTr_Cls_live == MMR_TR_1 ? MMR_TR_0 : MMR_TR_1,
    n.MMRTr_Cls = tmpMMRTr_Cls_live,
    n.MoreTr_Cls = tmpMMRTr_Cls_live) : n.MoreTr_Cls = "live") : (OnlyMROdds && d ? (tmpMMRTr_Cls_live = tmpMMRTr_Cls_live == MMR_TR_1 ? MMR_TR_0 : MMR_TR_1,
    n.MMRTr_Cls = tmpMMRTr_Cls_live,
    n.MoreTr_Cls = tmpMMRTr_Cls_live) : (n.MMRTr_Cls = MMR_TR_0,
    n.MoreTr_Cls = "liveligh"),
    n.Tr_Cls = "liveligh",
    n.BgColor = GetLiveBGColor(s.Div))) : 0 == s.Div ? (n.MMRTr_Cls = MMR_TR_0,
    n.Tr_Cls = TR_0,
    n.BgColor = GetEventBGColor(s.Div),
    OnlyMROdds && r ? (tmpMMRTr_Cls = tmpMMRTr_Cls == MMR_TR_1 ? MMR_TR_0 : MMR_TR_1,
    n.MMRTr_Cls = tmpMMRTr_Cls,
    n.MoreTr_Cls = tmpMMRTr_Cls) : n.MoreTr_Cls = TR_0) : (OnlyMROdds && r ? (tmpMMRTr_Cls = tmpMMRTr_Cls == MMR_TR_1 ? MMR_TR_0 : MMR_TR_1,
    n.MMRTr_Cls = tmpMMRTr_Cls,
    n.MoreTr_Cls = tmpMMRTr_Cls) : (n.MMRTr_Cls = MMR_TR_0,
    n.MoreTr_Cls = TR_1),
    n.Tr_Cls = TR_1,
    n.BgColor = GetEventBGColor(s.Div)),
    n.MMRBgColor = GetMMREventBGColor(n.MMRTr_Cls);
    var D = s.FavorF;
    n.HomeName = s.HomeName,
    n.AwayName = s.AwayName,
    n.Home_Cls = "h" == D ? CLS_HDP_F : CLS_HDP_N,
    n.Away_Cls = "a" == D ? CLS_HDP_F : CLS_HDP_N;
    var l = "" == s.FavorF ? "" : s.FavorF;
    if (n.Odds_1_H = "" != s.Odds_1_H && "" != s.Odds_1_A ? spreadCalculation("h" == l ? 1 : "a" == l ? -1 : "" == l ? 0 : l, "h", parseFloat(s.Odds_1_H), parseFloat(s.Odds_1_A), fFrame.OddsType) : "",
    n.Odds_1_A = "" != s.Odds_1_H && "" != s.Odds_1_A ? spreadCalculation("h" == l ? -1 : "a" == l ? 1 : "" == l ? 0 : l, "a", parseFloat(s.Odds_1_A), parseFloat(s.Odds_1_H), fFrame.OddsType) : "",
    n.ODDS_1_H = "" != s.Odds_1_H && "" != s.Odds_1_A ? ("h" == l ? 1 : "a" == l ? -1 : "" == l ? 0 : l) + ",h," + s.Odds_1_H + "," + s.Odds_1_A : "",
    n.ODDS_1_A = "" != s.Odds_1_H && "" != s.Odds_1_A ? ("h" == l ? -1 : "a" == l ? 1 : "" == l ? 0 : l) + ",a," + s.Odds_1_A + "," + s.Odds_1_H : "",
    l = "" == s.Goal_3 ? "" : s.Goal_3,
    n.Odds_3_O = "" != s.Odds_3_O && "" != s.Odds_3_U ? spreadCalculation("h" == l ? 1 : "a" == l ? -1 : "" == l ? 0 : l, "h", parseFloat(s.Odds_3_O), parseFloat(s.Odds_3_U), fFrame.OddsType) : "",
    n.Odds_3_U = "" != s.Odds_3_O && "" != s.Odds_3_U ? spreadCalculation("h" == l ? -1 : "a" == l ? 1 : "" == l ? 0 : l, "a", parseFloat(s.Odds_3_U), parseFloat(s.Odds_3_O), fFrame.OddsType) : "",
    n.ODDS_3_O = "" != s.Odds_3_O && "" != s.Odds_3_U ? "X,h," + s.Odds_3_O + "," + s.Odds_3_U : "",
    n.ODDS_3_U = "" != s.Odds_3_O && "" != s.Odds_3_U ? "X,a," + s.Odds_3_U + "," + s.Odds_3_O : "",
    n.Odds_1_H_Cls = n.Odds_1_H < 0 ? CLS_EVEN : CLS_ODD,
    n.Odds_1_A_Cls = n.Odds_1_A < 0 ? CLS_EVEN : CLS_ODD,
    n.Odds_3_O_Cls = n.Odds_3_O < 0 ? CLS_EVEN : CLS_ODD,
    n.Odds_3_U_Cls = n.Odds_3_U < 0 ? CLS_EVEN : CLS_ODD,
    n.isParlay = 0,
    "1" == s.TimerSuspend ? (n.TimeSuspendCls1 = CLS_LS_OFF,
    n.TimeSuspendCls = CLS_LS_ON) : (n.TimeSuspendCls1 = CLS_LS_ON,
    n.TimeSuspendCls = CLS_LS_OFF),
    n.Display_More = CLS_LS_OFF,
    n.More_Style = CLS_LS_OFF,
    n.SuperLive_Style = CLS_LS_OFF,
    n.FastMarket_Style = CLS_LS_OFF,
    o) {
        for (var p = _, O = e[p]; O.MUID == s.MUID; ) {
            if ((O = e[p]).MUID != s.MUID) {
                O = e[p + 1];
                break
            }
            if (0 == p) {
                O = e[0];
                break
            }
            p--
        }
        DisplayMoreHtml(parseInt(document.DataForm_D.Sport.value, 10), s.MUID, n, "Soccer_More"),
        "0" == s.MoreCount && "" == O.OddsId_5 && (n.Display_More = CLS_LS_OFF),
        n.More = getMoreLabel_1(s.MoreCount, O.OddsId_5, O.OddsId_15, n.Display_More == CLS_LS_ON ? "off" : ""),
        "" != n.More && (n.More_Style = ""),
        "True" == s.IsSuperLive && fFrame.CanSeeSuperLive && (n.SuperLive_Style = CLS_LS_ON),
        "True" == s.IsFastMarket && (n.FastMarket_Style = CLS_LS_ON)
    }
    if (n.MR_DISP1 = CLS_LS_OFF,
    n.MR_DISP2 = CLS_LS_ON,
    n.MR_DISP3 = CLS_LS_ON,
    0 == _ || e[_ - 1].MatchId != s.MatchId) {
        if (d || r) {
            n.MR_DISP1 = CLS_LS_ON,
            n.MR_DISP2 = CLS_LS_OFF;
            D = s.FavorF_301;
            n.HomeName = s.HomeName,
            n.AwayName = s.AwayName,
            n.Home_MR_Cls = "h" == D ? CLS_HDP_F : CLS_HDP_N,
            n.Away_MR_Cls = "a" == D ? CLS_HDP_F : CLS_HDP_N,
            "" == s.Odds_301_H ? n.Value_301 = "" : n.Value_301 = GenMRHdp("" == s.Value_301 ? 0 : s.Value_301, s.Percentage_301),
            "" == s.Odds_302_O ? n.Goal_302 = "" : n.Goal_302 = GenMRHdp("" == s.Goal_302 ? 0 : s.Goal_302, s.Percentage_302)
        }
        switch (s.GVType) {
        case "1":
            $("#MainFly").addClass(RNB_CSS),
            n.SportRadarInfo = getRunningHtml(s.MatchId, a ? "IsLive" : "", s.GVType, s.HomeName, s.AwayName);
            break;
        case "2":
            break;
        case "3":
            $("#MainFly").removeClass(RNB_CSS),
            n.SportRadarInfo = getSportRadarHtml(s.MatchId, a ? "IsLive" : "")
        }
        if (n.StatsInfo = "0" == s.StatsId ? "" : getStatsHtml(s.MatchId),
        n.LiveChart = "False" == s.IsLiveChart ? "" : getLiveChartHtml(s.MatchId),
        n.Streaming = getStreamingHtml(s.MatchId, s.StreamingId, a),
        n.Favorites = getFavoritesHtml(s.MUID, s.MatchCode, "1" == s.Favorite || "1" == s.FavLeague, a),
        n.FavLeagues = getFavLeaguesHtml(document.DataForm_D.Sport.value, s.LeagueId, "1" == s.FavLeague, a),
        n.ScoreMap = getScoreMapHtml(s.MatchId),
        a)
            switch (s.GameStatus) {
            case "1":
                n.GameStatus = '<div class="happen LiveTime" Title="' + RES_PRC_full + '"><b>' + RES_PRC + "</b></div>";
                break;
            case "2":
                n.GameStatus = '<div class="happen LiveTime" Title="' + RES_PPen_full + '"><b>' + RES_PPen + "</b></div>";
                break;
            case "3":
                n.GameStatus = '<div class="happen LiveTime" Title="' + RES_VAR_full + '"><b>' + RES_VAR + "</b></div>";
                break;
            case "4":
                n.GameStatus = '<div class="happen LiveTime" Title="' + RES_Pen_full + '"><b>' + RES_Pen + "</b></div>";
                break;
            case "5":
                n.GameStatus = '<div class="happen LiveTime" Title="' + RES_Inj_full + '"><b>' + RES_Inj + "</b></div>";
                break;
            default:
                n.GameStatus = ""
            }
    }
    if (OnlyMROdds && (n.MR_DISP3 = CLS_LS_OFF,
    n.Display_More = CLS_LS_OFF),
    NoShowMROdds && (n.MR_DISP1 = CLS_LS_OFF,
    n.MR_DISP2 = CLS_LS_ON),
    NoShowMROdds || n.MR_DISP1 == CLS_LS_OFF) {
        var i = new RegExp("\x3c!--MR_START--\x3e.*\x3c!--MR_END--\x3e");
        t = t.replace(i, "")
    } else
        t = (t = t.replace("\x3c!--MR_START--\x3e", "")).replace("\x3c!--MR_END--\x3e", "");
    if (OnlyMROdds || n.MR_DISP3 == CLS_LS_OFF) {
        var S = new RegExp("\x3c!--MY_START--\x3e.*\x3c!--MY_END--\x3e");
        t = t.replace(S, "")
    } else
        t = (t = t.replace("\x3c!--MY_START--\x3e", "")).replace("\x3c!--MY_END--\x3e", "");
    if ("" != n.More)
        t = (t = t.replace("\x3c!--SMORE_START--\x3e", "")).replace("\x3c!--SMORE_END--\x3e", "");
    else {
        var E = new RegExp("\x3c!--SMORE_START--\x3e.*\x3c!--SMORE_END--\x3e");
        t = t.replace(E, "")
    }
    return t = _formatTemplate(t, "{@", "}"),
    t = _replaceTags(n, t)
}
function afterNewEvent_1H(e, _, t, a) {
    var r = !1
      , d = !1
      , s = e[_]
      , o = !1;
    if (_ == e.length - 1 ? o = !0 : e[_ + 1].MUID != s.MUID ? o = !0 : "" == e[_ + 1].Value_7 && "" == e[_ + 1].OddsId_7 && "" == e[_ + 1].Goal_8 && "" == e[_ + 1].OddsId_8 && (o = !0),
    !a && !isInPeriod(s))
        return "";
    if ("" == s.Value_7 && "" == s.OddsId_7 && "" == s.Goal_8 && "" == s.OddsId_8 && "" == s.Value_303 && "" == s.OddsId_303 && "" == s.Goal_304 && "" == s.OddsId_304)
        return "";
    (CheckOddsId(s.OddsId_303) || CheckOddsId(s.OddsId_304)) && (a ? d = !0 : r = !0);
    var n = new Array;
    0 == _ && (TrFlag = !1),
    PreMatchId != s.MatchId && (TrFlag = !TrFlag),
    s.Div = TrFlag ? 0 : 1,
    a ? (0 == s.LivePeriod ? n.LiveTimeCls = "1" == s.CsStatus ? "HalfTime" : "IsLive" : (n.LiveTimeCls = "LiveTime",
    2 == s.LivePeriod && s.InjuryTime > 0 ? n.InjuryTime = "+" + s.InjuryTime : n.InjuryTime = ""),
    n.RedCardH = getRedCardHtml(parseInt(s.RedCardH, 10)),
    n.RedCardA = getRedCardHtml(parseInt(s.RedCardA, 10)),
    0 == s.Div ? (n.MMRTr_Cls = MMR_TR_0,
    n.Tr_Cls = "live",
    n.BgColor = GetLiveBGColor(s.Div),
    OnlyMROdds && d ? (tmpMMRTr_Cls_live = tmpMMRTr_Cls_live == MMR_TR_1 ? MMR_TR_0 : MMR_TR_1,
    n.MMRTr_Cls = tmpMMRTr_Cls_live,
    n.MoreTr_Cls = tmpMMRTr_Cls_live) : n.MoreTr_Cls = "live") : (OnlyMROdds && d ? (tmpMMRTr_Cls_live = tmpMMRTr_Cls_live == MMR_TR_1 ? MMR_TR_0 : MMR_TR_1,
    n.MMRTr_Cls = tmpMMRTr_Cls_live,
    n.MoreTr_Cls = tmpMMRTr_Cls_live) : (n.MMRTr_Cls = MMR_TR_0,
    n.MoreTr_Cls = "liveligh"),
    n.Tr_Cls = "liveligh",
    n.BgColor = GetLiveBGColor(s.Div))) : 0 == s.Div ? (n.MMRTr_Cls = MMR_TR_0,
    n.Tr_Cls = TR_0,
    n.BgColor = GetEventBGColor(s.Div),
    OnlyMROdds && r ? (tmpMMRTr_Cls = tmpMMRTr_Cls == MMR_TR_1 ? MMR_TR_0 : MMR_TR_1,
    n.MMRTr_Cls = tmpMMRTr_Cls,
    n.MoreTr_Cls = tmpMMRTr_Cls) : n.MoreTr_Cls = TR_0) : (OnlyMROdds && r ? (tmpMMRTr_Cls = tmpMMRTr_Cls == MMR_TR_1 ? MMR_TR_0 : MMR_TR_1,
    n.MMRTr_Cls = tmpMMRTr_Cls,
    n.MoreTr_Cls = tmpMMRTr_Cls) : (n.MMRTr_Cls = MMR_TR_0,
    n.MoreTr_Cls = TR_1),
    n.Tr_Cls = TR_1,
    n.BgColor = GetEventBGColor(s.Div)),
    n.MMRBgColor = GetMMREventBGColor(n.MMRTr_Cls);
    var D = s.FavorH1;
    n.HomeName = s.HomeName,
    n.AwayName = s.AwayName,
    n.Home_Cls = "h" == D ? CLS_HDP_F : CLS_HDP_N,
    n.Away_Cls = "a" == D ? CLS_HDP_F : CLS_HDP_N;
    var l = "" == s.FavorH1 ? "" : s.FavorH1;
    if (n.Odds_7_H = "" != s.Odds_7_H && "" != s.Odds_7_A ? spreadCalculation("h" == l ? 1 : "a" == l ? -1 : "" == l ? 0 : l, "h", parseFloat(s.Odds_7_H), parseFloat(s.Odds_7_A), fFrame.OddsType) : "",
    n.Odds_7_A = "" != s.Odds_7_H && "" != s.Odds_7_A ? spreadCalculation("h" == l ? -1 : "a" == l ? 1 : "" == l ? 0 : l, "a", parseFloat(s.Odds_7_A), parseFloat(s.Odds_7_H), fFrame.OddsType) : "",
    n.ODDS_7_H = "" != s.Odds_7_H && "" != s.Odds_7_A ? ("h" == l ? 1 : "a" == l ? -1 : "" == l ? 0 : l) + ",h," + s.Odds_7_H + "," + s.Odds_7_A : "",
    n.ODDS_7_A = "" != s.Odds_7_H && "" != s.Odds_7_A ? ("h" == l ? -1 : "a" == l ? 1 : "" == l ? 0 : l) + ",a," + s.Odds_7_A + "," + s.Odds_7_H : "",
    l = "" == s.Goal_8 ? "" : s.Goal_8,
    n.Odds_8_O = "" != s.Odds_8_O && "" != s.Odds_8_U ? spreadCalculation("h" == l ? 1 : "a" == l ? -1 : "" == l ? 0 : l, "h", parseFloat(s.Odds_8_O), parseFloat(s.Odds_8_U), fFrame.OddsType) : "",
    n.Odds_8_U = "" != s.Odds_8_O && "" != s.Odds_8_U ? spreadCalculation("h" == l ? -1 : "a" == l ? 1 : "" == l ? 0 : l, "a", parseFloat(s.Odds_8_U), parseFloat(s.Odds_8_O), fFrame.OddsType) : "",
    n.ODDS_8_O = "" != s.Odds_8_O && "" != s.Odds_8_U ? "X,h," + s.Odds_8_O + "," + s.Odds_8_U : "",
    n.ODDS_8_U = "" != s.Odds_8_O && "" != s.Odds_8_U ? "X,a," + s.Odds_8_U + "," + s.Odds_8_O : "",
    n.Odds_7_H_Cls = n.Odds_7_H < 0 ? CLS_EVEN : CLS_ODD,
    n.Odds_7_A_Cls = n.Odds_7_A < 0 ? CLS_EVEN : CLS_ODD,
    n.Odds_8_O_Cls = n.Odds_8_O < 0 ? CLS_EVEN : CLS_ODD,
    n.Odds_8_U_Cls = n.Odds_8_U < 0 ? CLS_EVEN : CLS_ODD,
    n.isParlay = 0,
    "1" == s.TimerSuspend ? (n.TimeSuspendCls1 = CLS_LS_OFF,
    n.TimeSuspendCls = CLS_LS_ON) : (n.TimeSuspendCls1 = CLS_LS_ON,
    n.TimeSuspendCls = CLS_LS_OFF),
    n.Display_More = CLS_LS_OFF,
    n.More_Style = CLS_LS_OFF,
    n.SuperLive_Style = CLS_LS_OFF,
    n.FastMarket_Style = CLS_LS_OFF,
    o) {
        "True" == s.IsSuperLive && fFrame.CanSeeSuperLive && (n.SuperLive_Style = CLS_LS_ON),
        "True" == s.IsFastMarket && (n.FastMarket_Style = CLS_LS_ON);
        for (var p = _, O = e[p]; O.MUID == s.MUID; ) {
            if ((O = e[p]).MUID != s.MUID) {
                O = e[p + 1];
                break
            }
            if (0 == p) {
                O = e[0];
                break
            }
            p--
        }
        DisplayMoreHtml(parseInt(document.DataForm_D.Sport.value, 10), s.MUID, n, "Soccer_More"),
        "0" == s.MoreCount && "" == O.OddsId_15 && (n.Display_More = CLS_LS_OFF),
        n.More = getMoreLabel_1(s.MoreCount, O.OddsId_5, O.OddsId_15, n.Display_More == CLS_LS_ON ? "off" : ""),
        "" != n.More && (n.More_Style = "")
    }
    if (n.MR_DISP1 = CLS_LS_OFF,
    n.MR_DISP2 = CLS_LS_ON,
    n.MR_DISP3 = CLS_LS_ON,
    0 == _ || e[_ - 1].MatchId != s.MatchId) {
        if (d || r) {
            n.MR_DISP1 = CLS_LS_ON,
            n.MR_DISP2 = CLS_LS_OFF;
            D = s.FavorH_303;
            n.HomeName = s.HomeName,
            n.AwayName = s.AwayName,
            n.Home_MR_Cls = "h" == D ? CLS_HDP_F : CLS_HDP_N,
            n.Away_MR_Cls = "a" == D ? CLS_HDP_F : CLS_HDP_N,
            "" == s.Odds_303_H ? n.Value_303 = "" : n.Value_303 = GenMRHdp("" == s.Value_303 ? 0 : s.Value_303, s.Percentage_303),
            "" == s.Odds_304_O ? n.Goal_304 = "" : n.Goal_304 = GenMRHdp("" == s.Goal_304 ? 0 : s.Goal_304, s.Percentage_304)
        }
        switch (s.GVType) {
        case "1":
            $("#MainFly").addClass(RNB_CSS),
            n.SportRadarInfo = getRunningHtml(s.MatchId, a ? "IsLive" : "", s.GVType, s.HomeName, s.AwayName);
            break;
        case "2":
            break;
        case "3":
            $("#MainFly").removeClass(RNB_CSS),
            n.SportRadarInfo = getSportRadarHtml(s.MatchId, a ? "IsLive" : "")
        }
        if (n.StatsInfo = "0" == s.StatsId ? "" : getStatsHtml(s.MatchId),
        n.LiveChart = "False" == s.IsLiveChart ? "" : getLiveChartHtml(s.MatchId),
        n.Streaming = getStreamingHtml(s.MatchId, s.StreamingId, a),
        n.Favorites = getFavoritesHtml(s.MUID, s.MatchCode, "1" == s.Favorite || "1" == s.FavLeague, a),
        n.FavLeagues = getFavLeaguesHtml(document.DataForm_D.Sport.value, s.LeagueId, "1" == s.FavLeague, a),
        n.ScoreMap = getScoreMapHtml(s.MatchId),
        a)
            switch (s.GameStatus) {
            case "1":
                n.GameStatus = '<div class="happen LiveTime" Title="' + RES_PRC_full + '"><b>' + RES_PRC + "</b></div>";
                break;
            case "2":
                n.GameStatus = '<div class="happen LiveTime" Title="' + RES_PPen_full + '"><b>' + RES_PPen + "</b></div>";
                break;
            case "3":
                n.GameStatus = '<div class="happen LiveTime" Title="' + RES_VAR_full + '"><b>' + RES_VAR + "</b></div>";
                break;
            case "4":
                n.GameStatus = '<div class="happen LiveTime" Title="' + RES_Pen_full + '"><b>' + RES_Pen + "</b></div>";
                break;
            case "5":
                n.GameStatus = '<div class="happen LiveTime" Title="' + RES_Inj_full + '"><b>' + RES_Inj + "</b></div>";
                break;
            default:
                n.GameStatus = ""
            }
    }
    if (OnlyMROdds && (n.MR_DISP3 = CLS_LS_OFF,
    n.Display_More = CLS_LS_OFF),
    NoShowMROdds && (n.MR_DISP1 = CLS_LS_OFF,
    n.MR_DISP2 = CLS_LS_ON),
    NoShowMROdds || n.MR_DISP1 == CLS_LS_OFF) {
        var i = new RegExp("\x3c!--MR_START--\x3e.*\x3c!--MR_END--\x3e");
        t = t.replace(i, "")
    } else
        t = (t = t.replace("\x3c!--MR_START--\x3e", "")).replace("\x3c!--MR_END--\x3e", "");
    if (OnlyMROdds || n.MR_DISP3 == CLS_LS_OFF) {
        var S = new RegExp("\x3c!--MY_START--\x3e.*\x3c!--MY_END--\x3e");
        t = t.replace(S, "")
    } else
        t = (t = t.replace("\x3c!--MY_START--\x3e", "")).replace("\x3c!--MY_END--\x3e", "");
    if ("" != n.More)
        t = (t = t.replace("\x3c!--SMORE_START--\x3e", "")).replace("\x3c!--SMORE_END--\x3e", "");
    else {
        var E = new RegExp("\x3c!--SMORE_START--\x3e.*\x3c!--SMORE_END--\x3e");
        t = t.replace(E, "")
    }
    return t = _formatTemplate(t, "{@", "}"),
    t = _replaceTags(n, t)
}
function afterScoreChanged(e, _) {
    if (_ < e.length && _ >= 0 && e.length > 0) {
        var t = e[_]
          , a = new Array;
        a.HomeName = t.HomeName,
        a.AwayName = t.AwayName,
        a.ScoreH = t.ScoreH,
        a.ScoreA = t.ScoreA,
        a.ShowTime = t.ShowTime,
        "" != t.InjuryTime && "0" != t.InjuryTime ? a.InjuryTime = "+" + t.InjuryTime : a.InjuryTime = "";
        var r = fFrame.ScoreMsg;
        r = _replaceTags(a, r = _formatTemplate(r, "{@", "}"));
        new MsgBox(r,1e4,5,"MainMsg").openMsg()
    }
}
function afterRepaintTable(e) {
    var _;
    "oTableContainer_L" == e.parentNode.id ? (document.DataForm_L.RT.value = "U",
    _ = document.getElementById("oTableContainer_D"),
    window.clearTimeout(btnStartHandle_L),
    btnStartHandle_L = setTimeout("startButton('l');", 3e3)) : (document.DataForm_D.RT.value = "U",
    _ = document.getElementById("oTableContainer_L"),
    window.clearTimeout(btnStartHandle_D),
    btnStartHandle_D = setTimeout("startButton('d');", 3e3));
    var t = document.getElementById("disstyle").value
      , a = document.getElementById("selPeriod").value;
    "1H" != t && "1F" != t && "0" == a || purgeLeagueRow_1H(e),
    document.getElementById("BetList").style.display = "none",
    document.getElementById("OddsTr").style.display = "block";
    var r = 0;
    e.tBodies.length > 0 && (r = e.tBodies.length - 1),
    e.tBodies[r].rows.length <= 1 ? (e.parentNode.style.display = "none",
    "none" == _.style.display ? ("Favorite" == document.body.id && (alert(RES_NonFavoriteMsg),
    fFrame.leftx.SwitchMenuType(0, "")),
    document.getElementById("TrNoInfo").style.display = "block") : document.getElementById("TrNoInfo").style.display = "none",
    "oTableContainer_L" == e.parentNode.id ? (document.getElementById("btnRefresh_L").style.display = "none",
    2 == fFrame.SiteMode && 2 == fFrame.Deposit_SiteMode && (document.getElementById("RunningGames").style.display = "none")) : (document.getElementById("btnRefresh_D").style.display = "none",
    2 == fFrame.SiteMode && 2 == fFrame.Deposit_SiteMode && (document.getElementById("sub_title").style.display = "none"))) : (e.parentNode.style.display = "",
    document.getElementById("TrNoInfo").style.display = "none",
    "oTableContainer_L" == e.parentNode.id ? (document.getElementById("btnRefresh_L").style.display = "",
    2 == fFrame.SiteMode && 2 == fFrame.Deposit_SiteMode && (document.getElementById("RunningGames").style.display = "")) : document.getElementById("btnRefresh_D").style.display = ""),
    window.setTimeout(popHorseAD, 2e3),
    "undefined" != typeof myScroll && myScroll.refresh()
}
function getMoreLabel_1(e, _, t, a) {
    if (0 == e)
        if ("1" == fFrame.DisplayMode) {
            if ("" == _ && "" == t)
                return ""
        } else if ("1F" == fFrame.DisplayMode) {
            if ("" == _)
                return ""
        } else if ("1H" == fFrame.DisplayMode) {
            if ("" == t)
                return ""
        } else if ("3" == fFrame.DisplayMode)
            return "";
    return '<span class="iconOdds more ' + a + '" title="' + RES_MORE + '"></span>'
}
function getMoreLabel_3(e) {
    return 0 == e ? "" : e
}
function purgeLeagueRow_1H(e) {
    var _, t = 0;
    e.tBodies.length > 0 && (t = e.tBodies.length - 1);
    for (var a = e.tBodies[t], r = a.rows.length - 1; r >= 0; r--)
        "l" == a.rows[r].id.charAt(0) ? _++ : _ = 0,
        _ > 1 && a.deleteRow(r);
    for (; a.rows.length > 0 && "l" == a.rows[a.rows.length - 1].id.charAt(0); )
        a.deleteRow(a.rows.length - 1)
}
function ClosePopDiv() {
    $("#ScoreMapDiv").css("visibility", "hidden"),
    $("#PopDiv").css("visibility", "hidden"),
    $("#scoremapmsg").css("visibility", "hidden")
}
function changeDisplayMode(e, _) {
    if (null != g_OddsKeeper_D) {
        switch (ClosePopDiv(),
        fFrame.DisplayMode = e,
        setCookie("DispVer", e, 7, "", _),
        e) {
        case "1":
            if (!initialTmpl("UnderOver_tmpl_1", "UnderOver_tmpl.php?form=1", "changeDisplayMode('" + e + "','" + _ + "');"))
                return;
            break;
        case "3":
            if (!initialTmpl("UnderOver_tmpl_3", "UnderOver_tmpl.php?form=3", "changeDisplayMode('" + e + "','" + _ + "');"))
                return;
            break;
        case "1F":
            if (!initialTmpl("UnderOver_tmpl_1F", "UnderOver_tmpl.php?form=1F", "changeDisplayMode('" + e + "','" + _ + "');"))
                return;
            break;
        case "1H":
            if (!initialTmpl("UnderOver_tmpl_1H", "UnderOver_tmpl.php?form=1H", "changeDisplayMode('" + e + "','" + _ + "');"))
                return
        }
        OnlyMROdds || Rechkskeeper_5_15(),
        "t" == PAGE_MARKET && null != g_OddsKeeper_L && (window.clearTimeout(CounterHandle_L),
        stopButton("l"),
        setDisplayMode(e, g_OddsKeeper_L)),
        window.clearTimeout(CounterHandle_D),
        stopButton("d"),
        setDisplayMode(e, g_OddsKeeper_D)
    }
}
function setDisplayMode(e, _) {
    switch (e) {
    case "1":
        _.afterNewEvent = afterNewEvent_1,
        _.setTemplate(fFrame.document.getElementById("UnderOver_tmpl_1").contentWindow),
        _.RegenEverytime = !1;
        break;
    case "3":
        _.afterNewEvent = afterNewEvent_3,
        _.setTemplate(fFrame.document.getElementById("UnderOver_tmpl_3").contentWindow),
        _.RegenEverytime = !1;
        break;
    case "1F":
        _.afterNewEvent = afterNewEvent_1F,
        _.setTemplate(fFrame.document.getElementById("UnderOver_tmpl_1F").contentWindow),
        _.RegenEverytime = !0;
        break;
    case "1H":
        _.afterNewEvent = afterNewEvent_1H,
        _.setTemplate(fFrame.document.getElementById("UnderOver_tmpl_1H").contentWindow),
        _.RegenEverytime = !0
    }
    _.paintOddsTable()
}
function initialDisstyle(e) {
    var _ = $("#disstyle_menu");
    if (_.children().length > 0) {
        switch (fFrame.DisplayMode = "old" == e ? "1F" : "new" == e ? "3" : e,
        fFrame.DisplayMode) {
        case "1":
            $(_.children()[0]).click();
            break;
        case "3":
            $(_.children()[1]).click();
            break;
        case "1F":
            $(_.children()[2]).click();
            break;
        case "1H":
            $(_.children()[3]).click();
            break;
        default:
            $(_.children()[1]).click()
        }
        _[0].style.visibility = "hidden"
    }
}
function rePaint() {
    "Chrome" != userBrowser() && "IE" != userBrowser() || tmpOnlyMROdds != OnlyMROdds || tmpNoShowMROdds != NoShowMROdds ? (tmpOnlyMROdds = OnlyMROdds,
    tmpNoShowMROdds = NoShowMROdds,
    btnstop(),
    "t" == PAGE_MARKET && 1 != fFrame.SiteMode && g_OddsKeeper_L.paintOddsTable(),
    g_OddsKeeper_D.paintOddsTable(),
    btnstart()) : (btnstop(),
    CalcOdds(0, 100))
}
function CalcOdds(e, _) {
    null == eles && (eles = document.querySelectorAll("[name=cvmy]"));
    var t = _;
    eles.length <= _ ? t = eles.length : setTimeout("CalcOdds(" + _ + "," + (_ + 500) + ")", 50);
    for (var a = e; a < t; a++) {
        var r = eles[a]
          , d = r.getAttribute("o");
        if ("" != d) {
            var s = d.split(",")
              , o = r.innerHTML
              , n = spreadCalculation("X" == s[0] ? "X" : parseFloat(s[0]), s[1], parseFloat(s[2]), parseFloat(s[3]), fFrame.OddsType);
            r.innerHTML = n,
            r.href = r.href.replace("'" + o + "'", "'" + n + "'"),
            r.className = n < 0 ? CLS_EVEN : CLS_ODD
        }
    }
    t == eles.length && (btnstart(),
    eles = null)
}
function changeOddsType_ou(e) {
    null != PopLauncher && PopLauncher.close(),
    ClosePopDiv();
    var _ = document.getElementById("selOddsType");
    _.value != e && (_.value = e),
    document.DataForm_L.OddsType.value = e,
    document.DataForm_D.OddsType.value = e,
    fFrame.leftx.document.fomBetProcess_Data.OddsType.value = e,
    fFrame.leftx.document.fomBetProcess_Data_OT.OddsType.value = e,
    fFrame.leftx.document.fomBetProcessPhone_Data.OddsType.value = e,
    fFrame.leftx.document.fomBetProcess_Data_OTP.OddsType.value = e,
    fFrame.leftx.document.Bingo_fomBetProcess_Data.OddsType.value = e,
    fFrame.leftx.document.ParlayBetForm.OddsType.value = e,
    "t" == PAGE_MARKET && 1 != fFrame.SiteMode && (g_OddsKeeper_L.OddsType = e),
    g_OddsKeeper_D.OddsType = e,
    window.setTimeout("rePaint();", 100),
    void 0 !== refreshMoreData && ("t" == PAGE_MARKET && 1 != fFrame.SiteMode && refreshMoreData_L(1),
    refreshMoreData_D(1)),
    null != fFrame.topx.miniOddsObj && fFrame.topx.miniOddsObj.Refresh(e)
}
function changePeriod(e) {
    g_OddsKeeper_D.paintOddsTable()
}
function isInPeriod(e) {
    if ("none" == document.getElementById("tdSelPeriod").style.display)
        return !0;
    switch (document.getElementById("selPeriod").value) {
    case "0":
        return !0;
    case "1":
        return e.KickoffTime.substr(8, 4) <= SEPERATE_TIME;
    case "2":
        return e.KickoffTime.substr(8, 4) > SEPERATE_TIME;
    default:
        return !0
    }
}
function setSelPeriodMode(e, _) {
    var t = document.getElementById("tdSelPeriod")
      , a = document.getElementById("selPeriod")
      , r = t.style.display;
    _ < 200 ? t.style.display = "none" : "t" != document.DataForm_D.Market.value ? t.style.display = "none" : e >= SEPERATE_TIME ? t.style.display = "none" : ("W" == document.DataForm_D.RT.value && (a.options[0].selected = !0),
    t.style.display = ""),
    t.style.display != r && "none" == t.style.display && (window.clearTimeout(CounterHandle_D),
    g_OddsKeeper_D.paintOddsTable())
}
function popMore(e, _, t, a, r, d, s) {
    document.getElementById("oPopContainer").innerHTML = "";
    var o = document.MoreForm.Market.value;
    document.MoreForm.MatchId.value = _,
    document.MoreForm.LeagueName.value = t,
    document.MoreForm.HomeName.value = a,
    document.MoreForm.AwayName.value = r,
    document.MoreForm.isParlay.value = d,
    "l" == s && (document.MoreForm.Market.value = s),
    document.MoreForm.action = "UnderOverPop.php",
    document.MoreForm.submit(),
    document.MoreForm.Market.value = o;
    var n = document.getElementById("PopDiv");
    n.style.width = e + 100 + "px";
    if (document.getElementById("PopTitleText").innerHTML = a + " -vs- " + r,
    null == PopLauncher) {
        var D = document.getElementById("PopTitle")
          , l = document.getElementById("PopCloser");
        PopLauncher = new DivLauncher(n,D,l)
    }
    PopLauncher.open(100, 120)
}
function popAD() {
    if (fFrame.PopupAD) {
        fFrame.PopupAD = !1;
        var e = document.getElementById("AcgDiv")
          , _ = document.getElementById("AcgTitleBar")
          , t = document.getElementById("AcgCloser");
        null != e && ((ADLauncher = new DivLauncher(e,_,t)).afterClose = ADafterClose,
        ADLauncher.open())
    }
}
function ADafterClose(e) {
    e.innerHTML = "",
    e = null
}
function popNews() {
    if (fFrame.PopupNews && (fFrame.PopupNews = !1,
    checkFlashSupport(fFrame.FlashSupport))) {
        var e = document.getElementById("NewsDiv")
          , _ = document.getElementById("NewsTitleBar")
          , t = document.getElementById("NewsCloser");
        null != e && (NewsLauncher = new DivLauncher(e,_,t)).open()
    }
}
function popHorseAD() {
    if (fFrame.PopupFAD) {
        fFrame.PopupFAD = !1;
        var e = document.getElementById("divFAD");
        null != e && (HADLauncher = new DivLauncher(e)).open(90, 150)
    }
}
function closePopup() {
    null != NewsLauncher && NewsLauncher.close()
}
function SelectChange() {
    1 != fFrame.SiteMode ? stopButton() : stopButton(document.DataForm_D.Market.value),
    "t" == PAGE_MARKET && 1 != fFrame.SiteMode && (document.formLeagueList.target = "DataFrame_L",
    document.formLeagueList.Market.value = document.DataForm_L.Market.value,
    document.formLeagueList.DT.value = null == document.DataForm_L.DT ? "" : document.DataForm_L.DT.value,
    document.formLeagueList.OrderBy.value = document.DataForm_L.OrderBy.value,
    document.formLeagueList.submit()),
    document.formLeagueList.target = "DataFrame_D",
    document.formLeagueList.Market.value = document.DataForm_D.Market.value,
    document.formLeagueList.DT.value = null == document.DataForm_D.DT ? "" : document.DataForm_D.DT.value,
    document.formLeagueList.OrderBy.value = document.DataForm_D.OrderBy.value,
    document.formLeagueList.submit()
}
function SelectRefresh(e, _) {
    $.ajax({
        type: "post",
        url: "League.php",
        data: {
            GameMode: e,
            From: "p",
            Market: _,
            Sport: "1"
        },
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        cache: !1,
        asyncBoolean: !1,
        error: function(e) {},
        success: function(t) {
            if ("" != t) {
                var a = document.getElementById("SelLeague")
                  , r = $("#LF").val();
                a.innerHTML = "",
                a.innerHTML = t,
                $("#LF").val(r)
            }
            setTimeout("SelectRefresh('" + e + "','" + _ + "')", 3e4)
        }
    })
}
function addFavorites(e, _, t, a) {
    var r, d = e.substr(2, e.length - 2), s = document.getElementById("fav_" + e), o = a && !siteObj._IsPhonebet ? g_OddsKeeper_L : g_OddsKeeper_D;
    1 == o.SortType ? (r = o.findIndex("KickoffTime", _),
    r = o.adjustIndex1st(r, "KickoffTime", _, e)) : (r = o.findIndex("MatchCode", _),
    r = o.adjustIndex1st(r, "MatchCode", _, e));
    var n = o.EventList[r].KickoffTime;
    t ? (s.parentElement.href = String.format("javascript:addFavorites('{0}','{1}',0,{2});", e, _, a),
    s.parentElement.title = fFrame.RES_AddFavorite,
    s.className = "iconOdds favorite",
    fav.location.href = "addFavorites.php?MatchId=" + d + "&Action=Delete&Time=" + n,
    o.EventList[r].MUID == e && (o.EventList[r].Favorite = "")) : (s.parentElement.href = String.format("javascript:addFavorites('{0}','{1}',1,{2});", e, _, a),
    s.parentElement.title = fFrame.RES_RemoveFavorite,
    s.className = "iconOdds favoriteAdd",
    fav.location.href = "addFavorites.php?MatchId=" + d + "&Action=Add&Time=" + n,
    o.EventList[r].MUID == e && (o.EventList[r].Favorite = "1"))
}
function getDrawHtml(e) {
    return e ? '<div class="HdpGoalClass">' + RES_DRAW + "</div>" : ""
}
function setRefreshMini(e, _) {
    var t = document.getElementById("miniver")
      , a = document.getElementById("column1")
      , r = document.getElementById("column2")
      , d = document.getElementById("tabbox")
      , s = document.getElementById("oTableContainer_L")
      , o = document.getElementById("oTableContainer_D")
      , n = document.getElementById("divSelectDate")
      , D = document.getElementById("HourContainer")
      , l = e.substring(0, 2);
    t.className = _,
    t.innerHTML = "<a href=\"javascript:setRefreshMini('" + _ + "','" + e + "');\"></a>",
    "ma" == l ? (setCookie("MiniKey", "max", 7, "", RES_DOMAIN),
    a.className = "column3",
    r.className = "column3",
    d.className = "tabbox",
    s.className = "tabbox_F",
    o.className = "tabbox_F",
    n.className = "EarlyMarket_top_bg",
    D.className = "EarlyMarket_top_bg") : (setCookie("MiniKey", "min", 7, "", RES_DOMAIN),
    a.className = "column3_75",
    r.className = "column3_75",
    d.className = "tabbox_75",
    s.className = "tabbox_F_75",
    o.className = "tabbox_F_75",
    n.className = "EarlyMarket_top_bg_75",
    D.className = "EarlyMarket_top_bg_75"),
    changeDisplayMode(fFrame.DisplayMode, RES_DOMAIN)
}
function updateHour(e, _, t) {
    currentHour = e;
    var a = document.getElementById("Tbl_TimeRange");
    if (_) {
        if ("" == Hourlbl[0])
            for (var r = 0; r < 9; r++)
                Hourlbl[r] = document.getElementById("HourSpan" + HourClass[r]).innerHTML;
        a.style.display = "",
        document.DataForm_D.DispRang.value = t,
        getHourData()
    } else
        document.DataForm_D.DispRang.value = "",
        a.style.display = "none"
}
function getHourData() {
    Initial4Hour();
    var e = parseInt(document.DataForm_D.DispRang.value, 10)
      , _ = document.getElementById("HourSpan" + e);
    setSelecter("HourContainer", _, e),
    0 != e && (4 != e || 8 != e ? 23 != e ? "none" == document.getElementById("HourSpan" + e).style.display && HourLinkClick(document.getElementById("HourSpan" + (e + 4)), e + 4) : changeDay && (changeDay = !1,
    HourLinkClick(document.getElementById("HourSpan3"), 3)) : HourLinkClick(document.getElementById("HourSpan" + e), e))
}
function Initial4Hour() {
    for (var e = !0, _ = 0; _ < 7; _++)
        6 == _ && 23 == currentHour && document.getElementById("HourSpan" + HourClass[_]).innerHTML == RES_NOW + Hourlbl[_].substr(5, 6) && (changeDay = !0),
        document.getElementById("HourSpan" + HourClass[_]).innerHTML = Hourlbl[_],
        0 == _ || currentHour < HourClass[_] || 23 == currentHour ? (document.getElementById("HourSpan" + HourClass[_]).style.display = "",
        0 != _ && e && (document.getElementById("HourSpan" + HourClass[_]).innerHTML = RES_NOW + Hourlbl[_].substr(5, 6),
        e = !1)) : document.getElementById("HourSpan" + HourClass[_]).style.display = "none"
}
function popHourContainer(e) {
    Initial4Hour();
    var _ = document.getElementById("HourContainer");
    null == g_HourOptioner && (_.style.position = "absolute",
    _.style.display = "block",
    div_4hour_x = _.offsetLeft,
    g_HourOptioner = new DivOption(_,5)),
    siteObj._IsPhonebet ? g_HourOptioner.Div.style.left = div_4hour_x + "px" : "none" == document.getElementById("HourSpan3").style.display ? g_HourOptioner.Div.style.left = div_4hour_x - 40 + "px" : g_HourOptioner.Div.style.left = div_4hour_x - 120 + "px",
    g_HourOptioner.act(e)
}
function HourLinkClick(e, _) {
    if (null != fFrame.leftx && null != fFrame.leftx.eObj) {
        if (document.DataForm_D.DispRang.value != _) {
            for (var t = document.getElementById("HourContainer"), a = 0; a < t.childNodes.length; a++) {
                var r = t.childNodes[a].tagName;
                null != r && "SPAN" == r.toUpperCase() && (t.childNodes[a].style.color = siteObj._4HourColor)
            }
            null != g_HourOptioner && g_HourOptioner.close(),
            stopButton("d"),
            setTimeout(function() {
                document.DataForm_D.DispRang.value = _,
                document.DataForm_D.RT.value = "W",
                null != document.DataForm_D.key && (document.DataForm_D.key.value = fFrame.leftx.eObj.GetKey("dodds")),
                document.DataForm_D.submit()
            }, 1e3)
        }
    } else
        window.setTimeout("HourLinkClick('" + e + "','" + _ + "')", 500)
}
function GotoNumberGame() {
    closePopup(),
    fFrame.leftx.SwitchSport("", "161")
}
function afterNewLeague(e, _, t) {
    var a = e[_]
      , r = new Array;
    return r.FavLeagues = getFavLeaguesHtml(document.DataForm_D.Sport.value, a.LeagueId, "1" == a.FavLeague, !1),
    _replaceTags(r, _formatTemplate(t, "{@", "}"))
}
function Init_MoreParams(e) {
    switch (Sport_More[e] = !1,
    sKeeper_Sport[e] = null,
    SportMore_ThreadId[e] = null,
    Sport_More_End[e] = !1,
    retryCnt[e] = 0,
    TeamH[e] = "",
    TeamA[e] = "",
    bFromBtnClick[e] = !1,
    bOpenMore[e] = !1,
    bOpen1st[e] = !1,
    oajaxData[e] = new Object,
    1 == e && fromFastMarketBtn || (Category[e] = -1),
    e) {
    case 2:
        CategoryList[e] = new Array(!1,!1,!1,!1,!1,!1,!1,!1,!1);
        break;
    case 43:
        CategoryList[e] = new Array(!1,!1,!1,!1,!1,!1,!1,!1,!1,!1);
        break;
    default:
        CategoryList[e] = new Array(!1,!1,!1,!1,!1,!1,!1,!1)
    }
    MoreTmplList[e] = new Array,
    MoreEventCount[e] = new Array("","",""),
    MoreTmplCategory[e] = "",
    MoreTmpSpecialLeague[e] = new Array("",""),
    MoreTmpSpecialOdds[e] = new Array("","","",""),
    MoreTmpSpecialEvent[e] = new Array("","","","")
}
function CheckMoreObj(e) {
    return void 0 !== sKeeper_Sport[e] && null != sKeeper_Sport[e] && !Sport_More_End[e]
}
function OpenMoreDiv(e) {
    void 0 !== sKeeper_Sport[e] && null != sKeeper_Sport[e] && null != document.getElementById("more_" + sKeeper_Sport[e].MatchId) && (document.getElementById("more_" + sKeeper_Sport[e].MatchId).style.display = ""),
    1 == e && SetHTFTCSSelOdds()
}
function gScrollTop() {
    var e = 0;
    return void 0 !== window.pageYOffset ? e = window.pageYOffset : void 0 !== document.compatMode && "BackCompat" != document.compatMode ? e = document.documentElement.scrollTop : void 0 !== document.body && (e = document.body.scrollTop),
    e
}
function FocusMoreTd() {
    if ("none" == $("#btnSwitchBack").css("display")) {
        var e = $("td.moreBetType.tag.displayOn")
          , _ = $(window).innerHeight()
          , t = $(e[0].parentNode).height()
          , a = gScrollTop();
        if (e.length > 0) {
            var r = e.parent("tr").prev("tr").prev("tr").offset().top;
            (r + t >= a + _ || a > r) && $("html, body").animate({
                scrollTop: r
            }, 500)
        }
    }
}
function DisplayMoreHtml(e, _, t, a) {
    if (void 0 !== sKeeper_Sport[e] && null != sKeeper_Sport[e])
        if (sKeeper_Sport[e].MUID != _)
            t.Display_More = CLS_LS_OFF,
            t.MoreData = "";
        else if (void 0 !== Sport_More[e] && Sport_More[e])
            if ("" == document.getElementById(a).innerHTML)
                t.Display_More = CLS_LS_OFF,
                t.MoreData = "";
            else {
                if ("3" == fFrame.DisplayMode || 1 == sKeeper_Sport[e].isParlay) {
                    (r = $("#" + a + " .mover5")).length > 0 && (r.parent().parent().parent().parent().parent().parent()[0].className = r.parent().parent().parent().parent().parent().parent()[0].className + " " + CLS_LS_OFF),
                    (r = $("#" + a + " .mover15")).length > 0 && (r.parent().parent().parent().parent().parent().parent()[0].className = r.parent().parent().parent().parent().parent().parent()[0].className + " " + CLS_LS_OFF),
                    t.MoreData = document.getElementById(a).innerHTML
                } else {
                    var r;
                    (r = $("#" + a + " .mover5")).length > 0 && (r.parent().parent().parent().parent().parent().parent()[0].className = r.parent().parent().parent().parent().parent().parent()[0].className.replace(CLS_LS_OFF, "")),
                    (r = $("#" + a + " .mover15")).length > 0 && (r.parent().parent().parent().parent().parent().parent()[0].className = r.parent().parent().parent().parent().parent().parent()[0].className.replace(CLS_LS_OFF, "")),
                    t.MoreData = document.getElementById(a).innerHTML
                }
                t.Display_More = CLS_LS_ON
            }
        else
            t.Display_More = CLS_LS_OFF,
            t.MoreData = "";
    else
        t.Display_More = CLS_LS_OFF,
        t.MoreData = ""
}
function OpenFastMarket(e) {
    $(e).parent("span").parent("td").parent("tr").next("tr").find("td.moreBetType.tag.displayOff").length > 0 ? (Category[1] = 7,
    fromFastMarketBtn = !0,
    e.previousSibling.previousSibling.click()) : SwitchCategory(7)
}
function GetMore(e, _, t, a, r, d, s, o, n) {
    if (preSportType != e && (preSportType = e,
    haveHotEvent = !1,
    Init_MoreParams(1),
    Init_MoreParams(2),
    Init_MoreParams(43)),
    initialTmpl("MorePop_tmpl", "MorePop_tmpl.php", function() {
        GetMore(e, _, t, a, r, d, s, o, n)
    })) {
        var D = $("td.moreBetType.tag.displayOn");
        if (D.length > 0)
            return 0 == D.find("#moreAddDiv").length && D.html("<div id='moreAddDiv'>" + D.html() + "</div>"),
            D.parent().prev("tr").find("a").toggleClass("off"),
            D.parent().prev("tr").prev("tr").prev("tr").prev("tr").find("a").toggleClass("off"),
            D.parent().prev("tr").prev("tr").find("a").toggleClass("off"),
            D.parent().prev("tr").find("span").toggleClass("off"),
            D.attr("class", "moreBetType tag displayOff"),
            D.html(""),
            void GetMore(e, _, t, a, r, d, s, o, n);
        switch (fromFastMarketBtn || (Category[e] = -1),
        fromFastMarketBtn = !1,
        htSession = "",
        ftSession = "",
        SelIdxFM = 0,
        SelIdx221 = 0,
        SelIdx222 = 0,
        SelIdx223 = 0,
        SelIdx224 = 0,
        SelIdx225 = 0,
        SelIdx226 = 0,
        SelIdx227 = 0,
        PreSelIdxFM = 0,
        PreSelIdx221 = 0,
        PreSelIdx222 = 0,
        PreSelIdx223 = 0,
        PreSelIdx224 = 0,
        PreSelIdx225 = 0,
        PreSelIdx226 = 0,
        PreSelIdx227 = 0,
        Arr221 = new Array("","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","",""),
        Arr222 = new Array("","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","",""),
        Arr223 = new Array("","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","",""),
        Arr224 = new Array("","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","",""),
        Arr225 = new Array("","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","",""),
        Arr226 = new Array("","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","",""),
        Arr227 = new Array("","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","",""),
        e) {
        case 1:
            MoreId = "Soccer";
            break;
        case 2:
            MoreId = "Basketball";
            break;
        case 43:
            MoreId = "ESports"
        }
        if (void 0 !== sKeeper_Sport[e] && null != sKeeper_Sport[e] ? sKeeper_Sport[e].MUID == s && (bOpenMore[e] = !bOpenMore[e]) : bOpenMore[e] = !bOpenMore[e],
        void 0 !== Sport_More[e] && bOpenMore[e]) {
            bFromBtnClick[e] = !0,
            Sport_More_End[e] = !1,
            $(n).toggleClass("off"),
            $(n).find("span").toggleClass("off");
            var l = $(n).parent("span").parent("td").parent("tr").next("tr").find("td.moreBetType.tag.displayOff");
            2 == e && (l = "L" == d ? $(n).parent("div").parent("td").parent("tr").next("tr").next("tr").next("tr").next("tr").find("td.moreBetType.tag.displayOff") : $(n).parent("div").parent("td").parent("tr").next("tr").next("tr").find("td.moreBetType.tag.displayOff")),
            43 == e && (l = $(n).parent("div").parent("td").parent("tr").next("tr").next("tr").find("td.moreBetType.tag.displayOff")),
            l.html(fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("Loading").innerHTML),
            l.attr("class", "moreBetType tag displayOn"),
            oajaxData[e] = new Object;
            var p = d;
            sKeeper_Sport[e] = new SimpleOddsKeeper,
            TeamH[e] = t,
            TeamA[e] = a,
            sKeeper_Sport[e].MUID = s,
            sKeeper_Sport[e].MatchId = _,
            sKeeper_Sport[e].isParlay = r,
            sKeeper_Sport[e].Market = p;
            var O = new Object;
            O.matchid = _,
            O.Market = p,
            O.tag = o,
            O.isparlay = r,
            SportMore_ThreadId[e] = o,
            ExecAjax("MorePop_data.php", O, "GET", o, o),
            bOpen1st[e] = !0,
            Sport_More[e] = !0
        } else
            void 0 !== sKeeper_Sport[e] && null != sKeeper_Sport[e] && (sKeeper_Sport[e] = null,
            Sport_More[e] = !1,
            bOpen1st[e] = !1,
            document.getElementById(MoreId + "_More").innerHTML = ""),
            5 == e && ShowMore(e);
        fmHelpFlg = null
    }
}
function ShowMore(e) {
    if ("object" == typeof arr_ShowMixParlay) {
        if (null != arr_ShowMixParlay[e.toString()]) {
            var _ = new Array
              , t = new Array;
            if (null != g_OddsKeeper_L && (_ = g_OddsKeeper_L.getOddsKeeperArray()),
            null != g_OddsKeeper_D && (t = g_OddsKeeper_D.getOddsKeeperArray()),
            arr_ShowMixParlay[e.toString()] && null != _[e.toString()]) {
                _[e.toString()].paintOddsTable(),
                paintRefreshBtn("l")
            }
            if (arr_ShowMixParlay[e.toString()] && null != t[e.toString()]) {
                t[e.toString()].paintOddsTable(),
                paintRefreshBtn("d")
            }
        }
    } else
        "object" == typeof arr_OddsKeeper ? null != arr_OddsKeeper[e.toString()] && (arr_OddsKeeper[e.toString()].paintOddsTable(),
        paintRefreshBtn("l")) : (null != g_OddsKeeper_L && (g_OddsKeeper_L.paintOddsTable(),
        paintRefreshBtn("L")),
        null != g_OddsKeeper_D && (g_OddsKeeper_D.paintOddsTable(),
        paintRefreshBtn("D")))
}
function refreshMoreData(e) {
    void 0 !== Sport_More[e] && Sport_More[e] && null != sKeeper_Sport[e] ? "L" == sKeeper_Sport[e].Market && null != SportMore_ThreadId[e] && "" != SportMore_ThreadId[e] && (Sport_More_End[e] = !1,
    ThreadList[SportMore_ThreadId[e]].data.OddsType != DataForm.OddsType.value && (oajaxData[e] = new Object),
    ThreadList[SportMore_ThreadId[e]].data.OddsType = DataForm.OddsType.value,
    recallAjax(SportMore_ThreadId[e])) : SportMore_ThreadId[e] = null
}
function refreshMoreData_L(e) {
    void 0 !== Sport_More[e] && Sport_More[e] && void 0 !== sKeeper_Sport[e] && null != sKeeper_Sport[e] ? "L" == sKeeper_Sport[e].Market && void 0 !== SportMore_ThreadId[e] && null != SportMore_ThreadId[e] && "" != SportMore_ThreadId[e] && (Sport_More_End[e] = !1,
    ThreadList[SportMore_ThreadId[e]].data.OddsType != DataForm_L.OddsType.value && (oajaxData[e] = new Object),
    ThreadList[SportMore_ThreadId[e]].data.OddsType = DataForm_L.OddsType.value,
    recallAjax(SportMore_ThreadId[e])) : SportMore_ThreadId[e] = null
}
function refreshMoreData_D(e) {
    void 0 !== Sport_More[e] && Sport_More[e] && void 0 !== sKeeper_Sport[e] && null != sKeeper_Sport[e] ? "D" == sKeeper_Sport[e].Market && void 0 !== SportMore_ThreadId[e] && null != SportMore_ThreadId[e] && "" != SportMore_ThreadId[e] && (Sport_More_End[e] = !1,
    ThreadList[SportMore_ThreadId[e]].data.OddsType != DataForm_D.OddsType.value && (oajaxData[e] = new Object),
    ThreadList[SportMore_ThreadId[e]].data.OddsType = DataForm_D.OddsType.value,
    recallAjax(SportMore_ThreadId[e])) : SportMore_ThreadId[e] = null
}
function GetSoccerMore(Response) {
    var ajaxData = new Array
      , dataNull = !1;
    if (null == Response) {
        for (var o in oajaxData[1])
            ajaxData[o] = oajaxData[1][o];
        dataNull = !0
    } else
        eval(Response);
    if (0 == Object.keys(ajaxData).length)
        return document.getElementById("Soccer_More").innerHTML = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("NoInfo").innerHTML,
        SportMore_ThreadId[1] = null,
        sKeeper_Sport[1] = null,
        void (Sport_More[1] = !1);
    if (null != sKeeper_Sport[1]) {
        ajaxData416 = ajaxData.B416;
        var CategoryList1X2 = new Array(0,0,0,0,0,0,0,0);
        if ("3" == fFrame.DisplayMode || 1 == sKeeper_Sport[1].isParlay) {
            if (void 0 !== ajaxData.B5) {
                var iCat = ajaxData.B5[0];
                CategoryList1X2[iCat] = CategoryList1X2[iCat] + 1
            }
            if (void 0 !== ajaxData.B15) {
                var iCat = ajaxData.B15[0];
                CategoryList1X2[iCat] = CategoryList1X2[iCat] + 1
            }
        }
        var ChkHaveHotEvent = !1;
        if (haveHotEvent) {
            var haveHotEventbetType;
            haveHotEventbetType = "L" == sKeeper_Sport[1].Market ? new Array("401","402","461","462","403","404","463","464","458","459","4","413","30","414","405","416","22","448","6","2","25","24","28","13","26","27","171","16") : new Array("401","402","461","462","403","404","463","464","4","413","30","414","405","416","16","6","25","14","2","128","26","28","24","13","27","425","171"),
            "1" != fFrame.DisplayMode && "1F" != fFrame.DisplayMode && "1H" != fFrame.DisplayMode || (haveHotEventbetType = "L" == sKeeper_Sport[1].Market ? new Array("5","15","401","402","461","462","403","404","463","464","458","459","4","413","30","414","405","416","22","448","6","2","25","24","28","13","26","27","171","16") : new Array("5","15","401","402","461","462","403","404","463","464","4","413","30","414","405","416","16","6","25","14","2","128","26","28","24","13","27","425","171")),
            1 == sKeeper_Sport[1].isParlay && (haveHotEventbetType = "L" == sKeeper_Sport[1].Market ? new Array("401","402","461","462","403","404","463","464","458","459","4","413","30","414","405","416","22","448","6","2","25","24","28","13","26","27","171","16") : new Array("401","402","461","462","403","404","463","464","458","459","4","413","30","414","405","416","16","6","25","14","2","128","26","28","24","13","27","425","171"));
            for (var i = 0; i < haveHotEventbetType.length; i++)
                void 0 !== ajaxData["B" + haveHotEventbetType[i]] && (ChkHaveHotEvent = !0);
            for (var specialCount = CategoryList[1][0], sLeagueList = new Array, sCnt = 0; sCnt < specialCount; sCnt++) {
                var sLeaguename = ajaxData.B1_3_5_7_8_15[sCnt.toString()][3];
                -1 == indexOf(sLeagueList, sLeaguename) && (sLeagueList[sLeagueList.length] = sLeaguename)
            }
            for (var SLidx = 0; SLidx < sLeagueList.length; SLidx++)
                for (var sCnt = 0; sCnt < specialCount; sCnt++)
                    ajaxData.B1_3_5_7_8_15[sCnt.toString()][3] == sLeagueList[SLidx] && (Category[1].toString() == ajaxData.B1_3_5_7_8_15[sCnt.toString()][0] || Category[1] <= 0 && "1" == ajaxData.B1_3_5_7_8_15[sCnt.toString()][1]) && (ChkHaveHotEvent = !0)
        }
        if (-1 == Category[1] || CategoryList[1][Category[1]] - CategoryList1X2[Category[1]] == 0)
            if (0 == ChkHaveHotEvent) {
                for (var i = 1; i < CategoryList[1].length; i++)
                    if (CategoryList[1][i] - CategoryList1X2[i] > 0) {
                        Category[1] = i;
                        break
                    }
            } else
                Category[1] = 0;
        sKeeper_Sport[1].TableContainer = document.getElementById("Soccer_More"),
        sKeeper_Sport[1].OddsHTML = "";
        for (var specialCount = CategoryList[1][0], sLeagueList = new Array, sFOddsList = new Array, sHOddsList = new Array, sCnt = 0; sCnt < specialCount; sCnt++) {
            var sLeaguename = ajaxData.B1_3_5_7_8_15[sCnt.toString()][3];
            -1 == indexOf(sLeagueList, sLeaguename) && (sLeagueList[sLeagueList.length] = sLeaguename,
            sFOddsList[sFOddsList.length] = "",
            sHOddsList[sHOddsList.length] = "")
        }
        for (var SLidx = 0; SLidx < sLeagueList.length; SLidx++) {
            var OddsFrame = ""
              , Tr_Cls = "";
            Tr_Cls = "L" == sKeeper_Sport[1].Market ? "liveligh" : "bgcpelight";
            for (var sCnt = 0; sCnt < specialCount; sCnt++) {
                var havedata = !1
                  , sMatchid = ajaxData.B1_3_5_7_8_15[sCnt.toString()][2];
                if (ajaxData.B1_3_5_7_8_15[sCnt.toString()][3] == sLeagueList[SLidx] && (Category[1].toString() == ajaxData.B1_3_5_7_8_15[sCnt.toString()][0] || 0 == Category[1] && "1" == ajaxData.B1_3_5_7_8_15[sCnt.toString()][1]) && (havedata = !0),
                havedata) {
                    Tr_Cls = "L" == sKeeper_Sport[1].Market ? "liveligh" == Tr_Cls ? "live" : "liveligh" : "bgcpelight" == Tr_Cls ? "bgcpe" : "bgcpelight",
                    "L" == sKeeper_Sport[1].Market ? ("" == MoreTmpSpecialLeague[1][0] && (MoreTmpSpecialLeague[1][0] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreSpecialLeague_L").innerHTML),
                    OddsFrame = MoreTmpSpecialLeague[1][0]) : ("" == MoreTmpSpecialLeague[1][1] && (MoreTmpSpecialLeague[1][1] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreSpecialLeague_D").innerHTML),
                    OddsFrame = MoreTmpSpecialLeague[1][1]),
                    OddsFrame = OddsFrame.replace("LeagueName", ajaxData.B1_3_5_7_8_15[sCnt.toString()][3]);
                    var maxCntF = 0;
                    if (void 0 !== ajaxData.B1_3_5_7_8_15[sMatchid + "S1"] && (maxCntF = ajaxData.B1_3_5_7_8_15[sMatchid + "S1"].length),
                    void 0 !== ajaxData.B1_3_5_7_8_15[sMatchid + "S2"] && ajaxData.B1_3_5_7_8_15[sMatchid + "S2"].length > maxCntF && (maxCntF = ajaxData.B1_3_5_7_8_15[sMatchid + "S2"].length),
                    void 0 !== ajaxData.B1_3_5_7_8_15[sMatchid + "S3"] && ajaxData.B1_3_5_7_8_15[sMatchid + "S3"].length > maxCntF && (maxCntF = ajaxData.B1_3_5_7_8_15[sMatchid + "S3"].length),
                    void 0 !== ajaxData.B1_3_5_7_8_15[sMatchid + "S5"] && ajaxData.B1_3_5_7_8_15[sMatchid + "S5"].length > maxCntF && (maxCntF = ajaxData.B1_3_5_7_8_15[sMatchid + "S5"].length),
                    0 == maxCntF)
                        ;
                    else {
                        for (var oddstmpl = "", Eventtmpl = "", oCnt = 0; oCnt < maxCntF; oCnt++) {
                            "L" == sKeeper_Sport[1].Market ? ("" == MoreTmpSpecialOdds[1][0] && (MoreTmpSpecialOdds[1][0] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("SpecialOdds_FL").innerHTML),
                            oddstmpl = MoreTmpSpecialOdds[1][0]) : ("" == MoreTmpSpecialOdds[1][1] && (MoreTmpSpecialOdds[1][1] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("SpecialOdds_FD").innerHTML),
                            oddstmpl = MoreTmpSpecialOdds[1][1]);
                            var s1 = new Array("","","","","")
                              , s2 = new Array("","","")
                              , s3 = new Array("","","","")
                              , s5 = new Array("","","","");
                            void 0 !== ajaxData.B1_3_5_7_8_15[sMatchid + "S1"] && ajaxData.B1_3_5_7_8_15[sMatchid + "S1"].length > oCnt && (s1 = ajaxData.B1_3_5_7_8_15[ajaxData.B1_3_5_7_8_15[sMatchid + "S1"][oCnt]]),
                            void 0 !== ajaxData.B1_3_5_7_8_15[sMatchid + "S2"] && ajaxData.B1_3_5_7_8_15[sMatchid + "S2"].length > oCnt && (s2 = ajaxData.B1_3_5_7_8_15[ajaxData.B1_3_5_7_8_15[sMatchid + "S2"][oCnt]]),
                            void 0 !== ajaxData.B1_3_5_7_8_15[sMatchid + "S3"] && ajaxData.B1_3_5_7_8_15[sMatchid + "S3"].length > oCnt && (s3 = ajaxData.B1_3_5_7_8_15[ajaxData.B1_3_5_7_8_15[sMatchid + "S3"][oCnt]]),
                            void 0 !== ajaxData.B1_3_5_7_8_15[sMatchid + "S5"] && ajaxData.B1_3_5_7_8_15[sMatchid + "S5"].length > oCnt && (s5 = ajaxData.B1_3_5_7_8_15[ajaxData.B1_3_5_7_8_15[sMatchid + "S5"][oCnt]]);
                            var tmpArr = ajaxData.B1_3_5_7_8_15[sCnt.toString()].concat(s1).concat(s2).concat(s3).concat(s5);
                            sKeeper_Sport[1].newHash = new Array,
                            sKeeper_Sport[1].oHash = new Array,
                            sKeeper_Sport[1].setDatas(tmpArr, mMultiSportODDS_DEF.B1_2_3_5),
                            sKeeper_Sport[1].newHash.Tr_Cls = Tr_Cls,
                            sKeeper_Sport[1].newHash.isParlay = sKeeper_Sport[1].isParlay,
                            "L" == sKeeper_Sport[1].Market ? sKeeper_Sport[1].newHash.Score = sKeeper_Sport[1].oHash.ScoreH + " - " + sKeeper_Sport[1].oHash.ScoreA : sKeeper_Sport[1].newHash.Score = "",
                            sKeeper_Sport[1].newHash.Odds_1_H_Cls = getOddsClass(sKeeper_Sport[1].oHash.Odds_1_H),
                            sKeeper_Sport[1].newHash.Odds_1_A_Cls = getOddsClass(sKeeper_Sport[1].oHash.Odds_1_A),
                            sKeeper_Sport[1].newHash.Odds_2_O_Cls = getOddsClass(sKeeper_Sport[1].oHash.Odds_2_O),
                            sKeeper_Sport[1].newHash.Odds_2_E_Cls = getOddsClass(sKeeper_Sport[1].oHash.Odds_2_E),
                            sKeeper_Sport[1].newHash.Odds_3_O_Cls = getOddsClass(sKeeper_Sport[1].oHash.Odds_3_O),
                            sKeeper_Sport[1].newHash.Odds_3_U_Cls = getOddsClass(sKeeper_Sport[1].oHash.Odds_3_U);
                            var sFlag = sKeeper_Sport[1].oHash.FavorF;
                            switch (sFlag) {
                            case "h":
                                sKeeper_Sport[1].newHash.Home_Cls = CLS_HDP_F,
                                sKeeper_Sport[1].newHash.Away_Cls = CLS_HDP_N,
                                sKeeper_Sport[1].newHash.Value_1_H = sKeeper_Sport[1].oHash.Value_1,
                                sKeeper_Sport[1].newHash.Value_1_A = "";
                                break;
                            case "a":
                                sKeeper_Sport[1].newHash.Home_Cls = CLS_HDP_N,
                                sKeeper_Sport[1].newHash.Away_Cls = CLS_HDP_F,
                                sKeeper_Sport[1].newHash.Value_1_H = "",
                                sKeeper_Sport[1].newHash.Value_1_A = sKeeper_Sport[1].oHash.Value_1;
                                break;
                            default:
                                sKeeper_Sport[1].newHash.Home_Cls = CLS_HDP_N,
                                sKeeper_Sport[1].newHash.Away_Cls = CLS_HDP_N,
                                "" != sKeeper_Sport[1].oHash.Odds_1_H ? sKeeper_Sport[1].newHash.Value_1_H = "0" : sKeeper_Sport[1].newHash.Value_1_H = "",
                                sKeeper_Sport[1].newHash.Value_1_A = ""
                            }
                            if ("" == sKeeper_Sport[1].oHash.OddsId_5 ? sKeeper_Sport[1].newHash.Draw_5 = "" : sKeeper_Sport[1].newHash.Draw_5 = RES_DRAW,
                            "" == sKeeper_Sport[1].oHash.Odds_2_O && "" == sKeeper_Sport[1].oHash.Odds_2_E ? sKeeper_Sport[1].newHash.disp_2 = CLS_LS_OFF : sKeeper_Sport[1].newHash.disp_2 = CLS_LS_ON,
                            void 0 !== oajaxData[1].B1_3_5_7_8_15) {
                                for (var oldDataIdx = 0; void 0 !== oajaxData[1].B1_3_5_7_8_15[oldDataIdx.toString()]; ) {
                                    if (oajaxData[1].B1_3_5_7_8_15[oldDataIdx.toString()][2] == sMatchid) {
                                        oajaxData[1].B1_3_5_7_8_15[oldDataIdx.toString()].slice(6, 8).toString() != ajaxData.B1_3_5_7_8_15[sCnt.toString()].slice(6, 8).toString() ? sKeeper_Sport[1].newHash.Changed_Score = CLS_UPD : sKeeper_Sport[1].newHash.Changed_Score = "";
                                        break
                                    }
                                    oldDataIdx++
                                }
                                "" != sKeeper_Sport[1].oHash.OddsId_1 && void 0 !== oajaxData[1].B1_3_5_7_8_15[sKeeper_Sport[1].oHash.OddsId_1] && (ajaxData.B1_3_5_7_8_15[sKeeper_Sport[1].oHash.OddsId_1].toString() != oajaxData[1].B1_3_5_7_8_15[sKeeper_Sport[1].oHash.OddsId_1].toString() ? sKeeper_Sport[1].newHash.Changed_1 = CLS_UPD : sKeeper_Sport[1].newHash.Changed_1 = ""),
                                "" != sKeeper_Sport[1].oHash.OddsId_2 && void 0 !== oajaxData[1].B1_3_5_7_8_15[sKeeper_Sport[1].oHash.OddsId_2] && (ajaxData.B1_3_5_7_8_15[sKeeper_Sport[1].oHash.OddsId_2].toString() != oajaxData[1].B1_3_5_7_8_15[sKeeper_Sport[1].oHash.OddsId_2].toString() ? sKeeper_Sport[1].newHash.Changed_2 = CLS_UPD : sKeeper_Sport[1].newHash.Changed_2 = ""),
                                "" != sKeeper_Sport[1].oHash.OddsId_3 && void 0 !== oajaxData[1].B1_3_5_7_8_15[sKeeper_Sport[1].oHash.OddsId_3] && (ajaxData.B1_3_5_7_8_15[sKeeper_Sport[1].oHash.OddsId_3].toString() != oajaxData[1].B1_3_5_7_8_15[sKeeper_Sport[1].oHash.OddsId_3].toString() ? sKeeper_Sport[1].newHash.Changed_3 = CLS_UPD : sKeeper_Sport[1].newHash.Changed_3 = ""),
                                "" != sKeeper_Sport[1].oHash.OddsId_5 && void 0 !== oajaxData[1].B1_3_5_7_8_15[sKeeper_Sport[1].oHash.OddsId_5] && (ajaxData.B1_3_5_7_8_15[sKeeper_Sport[1].oHash.OddsId_5].toString() != oajaxData[1].B1_3_5_7_8_15[sKeeper_Sport[1].oHash.OddsId_5].toString() ? sKeeper_Sport[1].newHash.Changed_5 = CLS_UPD : sKeeper_Sport[1].newHash.Changed_5 = "")
                            }
                            oddstmpl = _formatTemplate(oddstmpl, "{%", "}"),
                            oddstmpl = _replaceTags(sKeeper_Sport[1].oHash, oddstmpl),
                            oddstmpl = _formatTemplate(oddstmpl, "{@", "}"),
                            oddstmpl = _replaceTags(sKeeper_Sport[1].newHash, oddstmpl),
                            Eventtmpl += oddstmpl
                        }
                        sFOddsList[SLidx] = sFOddsList[SLidx] + Eventtmpl
                    }
                    var maxCntH = 0;
                    if (void 0 !== ajaxData.B1_3_5_7_8_15[sMatchid + "S7"] && (maxCntH = ajaxData.B1_3_5_7_8_15[sMatchid + "S7"].length),
                    void 0 !== ajaxData.B1_3_5_7_8_15[sMatchid + "S8"] && ajaxData.B1_3_5_7_8_15[sMatchid + "S8"].length > maxCntH && (maxCntH = ajaxData.B1_3_5_7_8_15[sMatchid + "S8"].length),
                    void 0 !== ajaxData.B1_3_5_7_8_15[sMatchid + "S12"] && ajaxData.B1_3_5_7_8_15[sMatchid + "S12"].length > maxCntH && (maxCntH = ajaxData.B1_3_5_7_8_15[sMatchid + "S12"].length),
                    void 0 !== ajaxData.B1_3_5_7_8_15[sMatchid + "S15"] && ajaxData.B1_3_5_7_8_15[sMatchid + "S15"].length > maxCntH && (maxCntH = ajaxData.B1_3_5_7_8_15[sMatchid + "S15"].length),
                    0 == maxCntH)
                        ;
                    else {
                        for (var oddstmpl = "", Eventtmpl = "", oCnt = 0; oCnt < maxCntH; oCnt++) {
                            "L" == sKeeper_Sport[1].Market ? ("" == MoreTmpSpecialOdds[1][2] && (MoreTmpSpecialOdds[1][2] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("SpecialOdds_HL").innerHTML),
                            oddstmpl = MoreTmpSpecialOdds[1][2]) : ("" == MoreTmpSpecialOdds[1][3] && (MoreTmpSpecialOdds[1][3] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("SpecialOdds_HD").innerHTML),
                            oddstmpl = MoreTmpSpecialOdds[1][3]);
                            var s7 = new Array("","","","","")
                              , s12 = new Array("","","")
                              , s8 = new Array("","","","")
                              , s15 = new Array("","","","");
                            void 0 !== ajaxData.B1_3_5_7_8_15[sMatchid + "S7"] && ajaxData.B1_3_5_7_8_15[sMatchid + "S7"].length > oCnt && (s7 = ajaxData.B1_3_5_7_8_15[ajaxData.B1_3_5_7_8_15[sMatchid + "S7"][oCnt]]),
                            void 0 !== ajaxData.B1_3_5_7_8_15[sMatchid + "S12"] && ajaxData.B1_3_5_7_8_15[sMatchid + "S12"].length > oCnt && (s12 = ajaxData.B1_3_5_7_8_15[ajaxData.B1_3_5_7_8_15[sMatchid + "S12"][oCnt]]),
                            void 0 !== ajaxData.B1_3_5_7_8_15[sMatchid + "S8"] && ajaxData.B1_3_5_7_8_15[sMatchid + "S8"].length > oCnt && (s8 = ajaxData.B1_3_5_7_8_15[ajaxData.B1_3_5_7_8_15[sMatchid + "S8"][oCnt]]),
                            void 0 !== ajaxData.B1_3_5_7_8_15[sMatchid + "S15"] && ajaxData.B1_3_5_7_8_15[sMatchid + "S15"].length > oCnt && (s15 = ajaxData.B1_3_5_7_8_15[ajaxData.B1_3_5_7_8_15[sMatchid + "S15"][oCnt]]);
                            var tmpArr = ajaxData.B1_3_5_7_8_15[sCnt.toString()].concat(s7).concat(s12).concat(s8).concat(s15);
                            sKeeper_Sport[1].newHash = new Array,
                            sKeeper_Sport[1].oHash = new Array,
                            sKeeper_Sport[1].setDatas(tmpArr, mMultiSportODDS_DEF.B7_12_8_15),
                            sKeeper_Sport[1].newHash.Tr_Cls = Tr_Cls,
                            sKeeper_Sport[1].newHash.isParlay = sKeeper_Sport[1].isParlay,
                            "L" == sKeeper_Sport[1].Market ? sKeeper_Sport[1].newHash.Score = sKeeper_Sport[1].oHash.ScoreH + " - " + sKeeper_Sport[1].oHash.ScoreA : sKeeper_Sport[1].newHash.Score = "",
                            sKeeper_Sport[1].newHash.Odds_7_H_Cls = getOddsClass(sKeeper_Sport[1].oHash.Odds_7_H),
                            sKeeper_Sport[1].newHash.Odds_7_A_Cls = getOddsClass(sKeeper_Sport[1].oHash.Odds_7_A),
                            sKeeper_Sport[1].newHash.Odds_8_O_Cls = getOddsClass(sKeeper_Sport[1].oHash.Odds_8_O),
                            sKeeper_Sport[1].newHash.Odds_8_U_Cls = getOddsClass(sKeeper_Sport[1].oHash.Odds_8_U),
                            sKeeper_Sport[1].newHash.Odds_12_O_Cls = getOddsClass(sKeeper_Sport[1].oHash.Odds_12_O),
                            sKeeper_Sport[1].newHash.Odds_12_E_Cls = getOddsClass(sKeeper_Sport[1].oHash.Odds_12_E);
                            var sFlag = sKeeper_Sport[1].oHash.FavorH1;
                            switch (sFlag) {
                            case "h":
                                sKeeper_Sport[1].newHash.Home_Cls = CLS_HDP_F,
                                sKeeper_Sport[1].newHash.Away_Cls = CLS_HDP_N,
                                sKeeper_Sport[1].newHash.Value_7_H = sKeeper_Sport[1].oHash.Value_7,
                                sKeeper_Sport[1].newHash.Value_7_A = "";
                                break;
                            case "a":
                                sKeeper_Sport[1].newHash.Home_Cls = CLS_HDP_N,
                                sKeeper_Sport[1].newHash.Away_Cls = CLS_HDP_F,
                                sKeeper_Sport[1].newHash.Value_7_H = "",
                                sKeeper_Sport[1].newHash.Value_7_A = sKeeper_Sport[1].oHash.Value_7;
                                break;
                            default:
                                sKeeper_Sport[1].newHash.Home_Cls = CLS_HDP_N,
                                sKeeper_Sport[1].newHash.Away_Cls = CLS_HDP_N,
                                "" != sKeeper_Sport[1].oHash.Odds_7_H ? sKeeper_Sport[1].newHash.Value_7_H = "0" : sKeeper_Sport[1].newHash.Value_7_H = "",
                                sKeeper_Sport[1].newHash.Value_7_A = ""
                            }
                            if ("" == sKeeper_Sport[1].oHash.OddsId_15 ? sKeeper_Sport[1].newHash.Draw_15 = "" : sKeeper_Sport[1].newHash.Draw_15 = RES_DRAW,
                            "" == sKeeper_Sport[1].oHash.Odds_12_O && "" == sKeeper_Sport[1].oHash.Odds_12_E ? sKeeper_Sport[1].newHash.disp_12 = CLS_LS_OFF : sKeeper_Sport[1].newHash.disp_12 = CLS_LS_ON,
                            void 0 !== oajaxData[1].B1_3_5_7_8_15) {
                                for (var oldDataIdx = 0; void 0 !== oajaxData[1].B1_3_5_7_8_15[oldDataIdx.toString()]; ) {
                                    if (oajaxData[1].B1_3_5_7_8_15[oldDataIdx.toString()][2] == sMatchid) {
                                        oajaxData[1].B1_3_5_7_8_15[oldDataIdx.toString()].slice(6, 8).toString() != ajaxData.B1_3_5_7_8_15[sCnt.toString()].slice(6, 8).toString() ? sKeeper_Sport[1].newHash.Changed_Score = CLS_UPD : sKeeper_Sport[1].newHash.Changed_Score = "";
                                        break
                                    }
                                    oldDataIdx++
                                }
                                "" != sKeeper_Sport[1].oHash.OddsId_7 && void 0 !== oajaxData[1].B1_3_5_7_8_15[sKeeper_Sport[1].oHash.OddsId_7] && (ajaxData.B1_3_5_7_8_15[sKeeper_Sport[1].oHash.OddsId_7].toString() != oajaxData[1].B1_3_5_7_8_15[sKeeper_Sport[1].oHash.OddsId_7].toString() ? sKeeper_Sport[1].newHash.Changed_7 = CLS_UPD : sKeeper_Sport[1].newHash.Changed_7 = ""),
                                "" != sKeeper_Sport[1].oHash.OddsId_12 && void 0 !== oajaxData[1].B1_3_5_7_8_15[sKeeper_Sport[1].oHash.OddsId_12] && (ajaxData.B1_3_5_7_8_15[sKeeper_Sport[1].oHash.OddsId_12].toString() != oajaxData[1].B1_3_5_7_8_15[sKeeper_Sport[1].oHash.OddsId_12].toString() ? sKeeper_Sport[1].newHash.Changed_12 = CLS_UPD : sKeeper_Sport[1].newHash.Changed_12 = ""),
                                "" != sKeeper_Sport[1].oHash.OddsId_8 && void 0 !== oajaxData[1].B1_3_5_7_8_15[sKeeper_Sport[1].oHash.OddsId_8] && (ajaxData.B1_3_5_7_8_15[sKeeper_Sport[1].oHash.OddsId_8].toString() != oajaxData[1].B1_3_5_7_8_15[sKeeper_Sport[1].oHash.OddsId_8].toString() ? sKeeper_Sport[1].newHash.Changed_8 = CLS_UPD : sKeeper_Sport[1].newHash.Changed_8 = ""),
                                "" != sKeeper_Sport[1].oHash.OddsId_15 && void 0 !== oajaxData[1].B1_3_5_7_8_15[sKeeper_Sport[1].oHash.OddsId_15] && (ajaxData.B1_3_5_7_8_15[sKeeper_Sport[1].oHash.OddsId_15].toString() != oajaxData[1].B1_3_5_7_8_15[sKeeper_Sport[1].oHash.OddsId_15].toString() ? sKeeper_Sport[1].newHash.Changed_15 = CLS_UPD : sKeeper_Sport[1].newHash.Changed_15 = "")
                            }
                            oddstmpl = _formatTemplate(oddstmpl, "{%", "}"),
                            oddstmpl = _replaceTags(sKeeper_Sport[1].oHash, oddstmpl),
                            oddstmpl = _formatTemplate(oddstmpl, "{@", "}"),
                            oddstmpl = _replaceTags(sKeeper_Sport[1].newHash, oddstmpl),
                            Eventtmpl += oddstmpl
                        }
                        sHOddsList[SLidx] = sHOddsList[SLidx] + Eventtmpl
                    }
                }
            }
            "" == sFOddsList[SLidx] ? "L" == sKeeper_Sport[1].Market ? (OddsFrame = OddsFrame.replace("\x3c!--moreSpecialEvent_FL--\x3e", ""),
            OddsFrame = OddsFrame.replace("\x3c!--SpecialOdds_FL--\x3e", "")) : (OddsFrame = OddsFrame.replace("\x3c!--moreSpecialEvent_FD--\x3e", ""),
            OddsFrame = OddsFrame.replace("\x3c!--SpecialOdds_FD--\x3e", "")) : "L" == sKeeper_Sport[1].Market ? ("" == MoreTmpSpecialEvent[1][0] && (MoreTmpSpecialEvent[1][0] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreSpecialEvent_FL").innerHTML),
            OddsFrame = OddsFrame.replace("\x3c!--moreSpecialEvent_FL--\x3e", MoreTmpSpecialEvent[1][0]),
            OddsFrame = OddsFrame.replace("\x3c!--SpecialOdds_FL--\x3e", sFOddsList[SLidx])) : ("" == MoreTmpSpecialEvent[1][1] && (MoreTmpSpecialEvent[1][1] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreSpecialEvent_FD").innerHTML),
            OddsFrame = OddsFrame.replace("\x3c!--moreSpecialEvent_FD--\x3e", MoreTmpSpecialEvent[1][1]),
            OddsFrame = OddsFrame.replace("\x3c!--SpecialOdds_FD--\x3e", sFOddsList[SLidx])),
            "" == sHOddsList[SLidx] ? "L" == sKeeper_Sport[1].Market ? (OddsFrame = OddsFrame.replace("\x3c!--moreSpecialEvent_HL--\x3e", ""),
            OddsFrame = OddsFrame.replace("\x3c!--SpecialOdds_HL--\x3e", "")) : (OddsFrame = OddsFrame.replace("\x3c!--moreSpecialEvent_HD--\x3e", ""),
            OddsFrame = OddsFrame.replace("\x3c!--SpecialOdds_HD--\x3e", "")) : "L" == sKeeper_Sport[1].Market ? ("" == MoreTmpSpecialEvent[1][2] && (MoreTmpSpecialEvent[1][2] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreSpecialEvent_HL").innerHTML),
            OddsFrame = OddsFrame.replace("\x3c!--moreSpecialEvent_HL--\x3e", MoreTmpSpecialEvent[1][2]),
            OddsFrame = OddsFrame.replace("\x3c!--SpecialOdds_HL--\x3e", sHOddsList[SLidx])) : ("" == MoreTmpSpecialEvent[1][3] && (MoreTmpSpecialEvent[1][3] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreSpecialEvent_HD").innerHTML),
            OddsFrame = OddsFrame.replace("\x3c!--moreSpecialEvent_HD--\x3e", MoreTmpSpecialEvent[1][3]),
            OddsFrame = OddsFrame.replace("\x3c!--SpecialOdds_HD--\x3e", sHOddsList[SLidx])),
            sKeeper_Sport[1].DivTmpl = OddsFrame,
            sKeeper_Sport[1].AppendOddsTable()
        }
        var betType = new Array("5","15","458","459","168","4","413","416_460","401_402","461_462","16","6","14","2_128","25_450","26_28","24_13","27_425","171","159","161_162","144","449","172","454","451","417_418","424_419","420_421","422_423","455","414","405","403_404","463_464","127_126","426","143","456_457","12_184","151_186","188_146","412_429","453_177","17_18","140_452","141_142","133_134","149_150","147_148","189_190","445","446_447","221","222","223","224","225","226","227");
        "3" != fFrame.DisplayMode && 1 != sKeeper_Sport[1].isParlay || (betType = new Array("168","4","413","416_460","401_402","461_462","16","6","14","2_128","25_450","26_28","24_13","27_425","171","159","161_162","144","449","172","454","451","417_418","424_419","420_421","422_423","455","414","405","403_404","463_464","127_126","426","143","456_457","12_184","151_186","188_146","412_429","453_177","17_18","140_452","141_142","133_134","149_150","147_148","189_190","445","446_447","221","222","223","224","225","226","227")),
        "L" == sKeeper_Sport[1].Market && (betType = new Array("5","458","4","413","416","401_402","461_462","22_448","6","2_24","28_13","26_27","171","16","25_450","159","161_162","144","449","451","417_418","15","459","414","405","403_404","463_464","126_412","143","12_184","151_186","177_429","140","221","222","223","224","225","226","227"),
        "3" != fFrame.DisplayMode && 1 != sKeeper_Sport[1].isParlay || (betType = new Array("458","4","413","416","401_402","461_462","22_448","6","2_24","28_13","26_27","171","16","25_450","159","161_162","144","449","451","417_418","459","414","405","403_404","463_464","126_412","143","12_184","151_186","177_429","140","221","222","223","224","225","226","227"))),
        ChkHaveHotEvent && 0 == Category[1] && (betType = "L" == sKeeper_Sport[1].Market ? new Array("458_459","4","413","30","414","405","416","401_402","461_462","403_404","463_464","22_448","6_2","25_24","28_13","26_27","171","16","221","222","223","224","225","226","227") : new Array("4","413","30","414","405","416","401_402","461_462","403_404","463_464","16","6_25","14","2_128","26_28","24_13","27_425","171","221","222","223","224","225","226","227"),
        "1" != fFrame.DisplayMode && "1F" != fFrame.DisplayMode && "1H" != fFrame.DisplayMode || (betType = "L" == sKeeper_Sport[1].Market ? new Array("5_15","458_459","4","413","30","414","405","416","401_402","461_462","403_404","463_464","22_448","6_2","25_24","28_13","26_27","171","16","221","222","223","224","225","226","227") : new Array("5_15","4","413","30","414","405","416","401_402","461_462","403_404","463_464","16","6_25","14","2_128","26_28","24_13","27_425","171","221","222","223","224","225","226","227")),
        1 == sKeeper_Sport[1].isParlay && (betType = "L" == sKeeper_Sport[1].Market ? new Array("458_459","4","413","30","414","405","416","401_402","461_462","403_404","463_464","22_448","6_2","25_24","28_13","26_27","171","16","221","222","223","224","225","226","227") : new Array("458_459","4","413","30","414","405","416","401_402","461_462","403_404","463_464","16","6_25","14","2_128","26_28","24_13","27_425","171","221","222","223","224","225","226","227")));
        var MultiOddsArray = [143, 144, 197, 198, 204, 205, 221, 222, 223, 224, 225, 226, 227]
          , CheckZeroOddsArray = [449, 451, 418, 457, 448, 417, 163, 450, 159, 406, 4, 413, 26, 408, 14, 6, 126, 30, 414, 412, 127, 171, 405, 161, 162, 151, 191, 13, 27, 24];
        Arr221 = new Array("","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","",""),
        Arr222 = new Array("","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","",""),
        Arr223 = new Array("","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","",""),
        Arr224 = new Array("","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","",""),
        Arr225 = new Array("","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","",""),
        Arr226 = new Array("","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","",""),
        Arr227 = new Array("","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","");
        for (var OddsHTML_221 = "", OddsHTML_222 = "", OddsHTML_223 = "", OddsHTML_224 = "", OddsHTML_225 = "", OddsHTML_226 = "", OddsHTML_227 = "", i = 0; i < betType.length; i++) {
            var b = []
              , moreEventHTML = "";
            if (-1 != betType[i].indexOf("_"))
                b = betType[i].split("_"),
                void 0 !== MoreTmplList[1][parseInt(b[0], 10)] && "" != MoreTmplList[1][parseInt(b[0], 10)] || (MoreTmplList[1][parseInt(b[0], 10)] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreEvent_" + b[0]).innerHTML),
                void 0 !== MoreTmplList[1][parseInt(b[1], 10)] && "" != MoreTmplList[1][parseInt(b[1], 10)] || (MoreTmplList[1][parseInt(b[1], 10)] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreEvent_" + b[1]).innerHTML),
                "" == MoreEventCount[1][1] && (MoreEventCount[1][1] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreEventDouble").innerHTML),
                moreEventHTML = MoreEventCount[1][1],
                void 0 !== ajaxData["B" + b[0]] && null != ajaxData["B" + b[0]] && (Category[1].toString() == ajaxData["B" + b[0]][0] || "0" == Category[1].toString() && "1" == ajaxData["B" + b[0]][1]) ? (moreEventHTML = moreEventHTML.replace("OddsData0", MoreTmplList[1][parseInt(b[0], 10)]),
                moreEventHTML = void 0 !== ajaxData["B" + b[1]] && null != ajaxData["B" + b[1]] && (Category[1].toString() == ajaxData["B" + b[1]][0] || "0" == Category[1].toString() && "1" == ajaxData["B" + b[1]][1]) ? moreEventHTML.replace("OddsData1", MoreTmplList[1][parseInt(b[1], 10)]) : moreEventHTML.replace("OddsData1", "")) : void 0 !== ajaxData["B" + b[1]] && null != ajaxData["B" + b[1]] && (Category[1].toString() == ajaxData["B" + b[1]][0] || "0" == Category[1].toString() && "1" == ajaxData["B" + b[1]][1]) && (moreEventHTML = moreEventHTML.replace("OddsData0", MoreTmplList[1][parseInt(b[1], 10)]),
                moreEventHTML = moreEventHTML.replace("OddsData1", ""));
            else if (b[0] = betType[i],
            void 0 !== MoreTmplList[1][parseInt(b[0], 10)] && "" != MoreTmplList[1][parseInt(b[0], 10)] || (MoreTmplList[1][parseInt(b[0], 10)] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreEvent_" + b[0]).innerHTML),
            221 == b[0] || 222 == b[0] || 223 == b[0] || 224 == b[0] || 225 == b[0] || 226 == b[0] || 227 == b[0]) {
                var tmpSelIdx;
                if (void 0 !== ajaxData["B" + b[0] + "C" + Category[1]] && null != ajaxData["B" + b[0] + "C" + Category[1]]) {
                    var k = 0;
                    switch (b[0]) {
                    case "221":
                        if ("L" == sKeeper_Sport[1].Market) {
                            for (var m = 0; m < ajaxData["B" + b[0] + "C" + Category[1]].length; m++)
                                m >= 5 ? delete ajaxData[ajaxData["B" + b[0] + "C" + Category[1]][m]] : Arr221[m] = ajaxData["B" + b[0] + "C" + Category[1]][m];
                            SelIdx221 = 0
                        } else {
                            for (var m = 0; m < ajaxData["B" + b[0] + "C" + Category[1]].length; m++)
                                Arr221[parseInt(ajaxData[ajaxData["B" + b[0] + "C" + Category[1]][m]][4], 10)] = ajaxData["B" + b[0] + "C" + Category[1]][m];
                            SelIdx221 = SelIdxFM
                        }
                        tmpSelIdx = SelIdx221;
                        break;
                    case "222":
                        if ("L" == sKeeper_Sport[1].Market) {
                            for (var m = 0; m < ajaxData["B" + b[0] + "C" + Category[1]].length; m++)
                                m >= 5 ? delete ajaxData[ajaxData["B" + b[0] + "C" + Category[1]][m]] : Arr222[m] = ajaxData["B" + b[0] + "C" + Category[1]][m];
                            SelIdx222 = 0
                        } else {
                            for (var m = 0; m < ajaxData["B" + b[0] + "C" + Category[1]].length; m++)
                                Arr222[parseInt(ajaxData[ajaxData["B" + b[0] + "C" + Category[1]][m]][4], 10)] = ajaxData["B" + b[0] + "C" + Category[1]][m];
                            SelIdx222 = SelIdxFM
                        }
                        tmpSelIdx = SelIdx222;
                        break;
                    case "223":
                        if ("L" == sKeeper_Sport[1].Market) {
                            for (var m = 0; m < ajaxData["B" + b[0] + "C" + Category[1]].length; m++)
                                m >= 5 ? delete ajaxData[ajaxData["B" + b[0] + "C" + Category[1]][m]] : Arr223[m] = ajaxData["B" + b[0] + "C" + Category[1]][m];
                            SelIdx223 = 0
                        } else {
                            for (var m = 0; m < ajaxData["B" + b[0] + "C" + Category[1]].length; m++)
                                Arr223[parseInt(ajaxData[ajaxData["B" + b[0] + "C" + Category[1]][m]][4], 10)] = ajaxData["B" + b[0] + "C" + Category[1]][m];
                            SelIdx223 = SelIdxFM
                        }
                        tmpSelIdx = SelIdx223;
                        break;
                    case "224":
                        if ("L" == sKeeper_Sport[1].Market) {
                            for (var m = 0; m < ajaxData["B" + b[0] + "C" + Category[1]].length; m++)
                                m >= 5 ? delete ajaxData[ajaxData["B" + b[0] + "C" + Category[1]][m]] : Arr224[m] = ajaxData["B" + b[0] + "C" + Category[1]][m];
                            SelIdx224 = 0
                        } else {
                            for (var m = 0; m < ajaxData["B" + b[0] + "C" + Category[1]].length; m++)
                                Arr224[parseInt(ajaxData[ajaxData["B" + b[0] + "C" + Category[1]][m]][4], 10)] = ajaxData["B" + b[0] + "C" + Category[1]][m];
                            SelIdx224 = SelIdxFM
                        }
                        tmpSelIdx = SelIdx224;
                        break;
                    case "225":
                        if ("L" == sKeeper_Sport[1].Market) {
                            for (var m = 0; m < ajaxData["B" + b[0] + "C" + Category[1]].length; m++)
                                m >= 5 ? delete ajaxData[ajaxData["B" + b[0] + "C" + Category[1]][m]] : Arr225[m] = ajaxData["B" + b[0] + "C" + Category[1]][m];
                            SelIdx225 = 0
                        } else {
                            for (var m = 0; m < ajaxData["B" + b[0] + "C" + Category[1]].length; m++)
                                Arr225[parseInt(ajaxData[ajaxData["B" + b[0] + "C" + Category[1]][m]][4], 10)] = ajaxData["B" + b[0] + "C" + Category[1]][m];
                            SelIdx225 = SelIdxFM
                        }
                        tmpSelIdx = SelIdx225;
                        break;
                    case "226":
                        if ("L" == sKeeper_Sport[1].Market) {
                            for (var m = 0; m < ajaxData["B" + b[0] + "C" + Category[1]].length; m++)
                                m >= 5 ? delete ajaxData[ajaxData["B" + b[0] + "C" + Category[1]][m]] : Arr226[m] = ajaxData["B" + b[0] + "C" + Category[1]][m];
                            SelIdx226 = 0
                        } else {
                            for (var m = 0; m < ajaxData["B" + b[0] + "C" + Category[1]].length; m++)
                                Arr226[parseInt(ajaxData[ajaxData["B" + b[0] + "C" + Category[1]][m]][4], 10)] = ajaxData["B" + b[0] + "C" + Category[1]][m];
                            SelIdx226 = SelIdxFM
                        }
                        tmpSelIdx = SelIdx226;
                        break;
                    case "227":
                        if ("L" == sKeeper_Sport[1].Market) {
                            for (var m = 0; m < ajaxData["B" + b[0] + "C" + Category[1]].length; m++)
                                m >= 5 ? delete ajaxData[ajaxData["B" + b[0] + "C" + Category[1]][m]] : Arr227[m] = ajaxData["B" + b[0] + "C" + Category[1]][m];
                            SelIdx227 = 0
                        } else {
                            for (var m = 0; m < ajaxData["B" + b[0] + "C" + Category[1]].length; m++)
                                Arr227[parseInt(ajaxData[ajaxData["B" + b[0] + "C" + Category[1]][m]][4], 10)] = ajaxData["B" + b[0] + "C" + Category[1]][m];
                            SelIdx227 = SelIdxFM
                        }
                        tmpSelIdx = SelIdx227
                    }
                }
                "" == MoreEventCount[1][0] && (MoreEventCount[1][0] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreEventSingle").innerHTML);
                var TmpMoreEventHTML = MoreEventCount[1][0];
                TmpMoreEventHTML = TmpMoreEventHTML.replace("OddsData0", MoreTmplList[1][parseInt(b[0], 10)].replace(/{@/g, "{@" + tmpSelIdx).replace(/{%/g, "{%" + tmpSelIdx)).replace("displayOff", ""),
                fmHelpFlg == parseInt(b[0], 10) && (TmpMoreEventHTML = TmpMoreEventHTML.replace("hidden", "visible")),
                moreEventHTML += TmpMoreEventHTML,
                void 0 !== ajaxData["B" + b[0] + "C" + Category[1]] && null != ajaxData["B" + b[0] + "C" + Category[1]] && (TmpMoreEventHTML = MoreEventCount[1][0],
                TmpMoreEventHTML = TmpMoreEventHTML.replace("OddsData0", MoreTmplList[1][parseInt(b[0], 10)].replace(/{@/g, "{@" + (tmpSelIdx + 1)).replace(/{%/g, "{%" + (tmpSelIdx + 1))),
                moreEventHTML += TmpMoreEventHTML,
                TmpMoreEventHTML = MoreEventCount[1][0],
                TmpMoreEventHTML = TmpMoreEventHTML.replace("OddsData0", MoreTmplList[1][parseInt(b[0], 10)].replace(/{@/g, "{@" + (tmpSelIdx + 2)).replace(/{%/g, "{%" + (tmpSelIdx + 2))),
                moreEventHTML += TmpMoreEventHTML,
                TmpMoreEventHTML = MoreEventCount[1][0],
                TmpMoreEventHTML = TmpMoreEventHTML.replace("OddsData0", MoreTmplList[1][parseInt(b[0], 10)].replace(/{@/g, "{@" + (tmpSelIdx + 3)).replace(/{%/g, "{%" + (tmpSelIdx + 3))),
                moreEventHTML += TmpMoreEventHTML,
                TmpMoreEventHTML = MoreEventCount[1][0],
                TmpMoreEventHTML = TmpMoreEventHTML.replace("OddsData0", MoreTmplList[1][parseInt(b[0], 10)].replace(/{@/g, "{@" + (tmpSelIdx + 4)).replace(/{%/g, "{%" + (tmpSelIdx + 4))),
                moreEventHTML += TmpMoreEventHTML)
            } else if (144 == b[0] || 143 == b[0]) {
                if (void 0 !== ajaxData["B" + b[0] + "C" + Category[1]] && null != ajaxData["B" + b[0] + "C" + Category[1]])
                    for (var k = 0; k < ajaxData["B" + b[0] + "C" + Category[1]].length; k++) {
                        "" == MoreEventCount[1][0] && (MoreEventCount[1][0] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreEventSingle").innerHTML);
                        var TmpMoreEventHTML = MoreEventCount[1][0];
                        TmpMoreEventHTML = TmpMoreEventHTML.replace("OddsData0", MoreTmplList[1][parseInt(b[0], 10)].replace(/{@/g, "{@" + k).replace(/{%/g, "{%" + k)),
                        moreEventHTML += TmpMoreEventHTML
                    }
            } else if (-1 != indexOf(MultiOddsArray, b[0])) {
                if (void 0 !== ajaxData["B" + b[0] + "C" + Category[1]] && null != ajaxData["B" + b[0] + "C" + Category[1]])
                    for (var k = 0; k < Math.ceil(ajaxData["B" + b[0] + "C" + Category[1]].length / 3); k++) {
                        "" == MoreEventCount[1][2] && (MoreEventCount[1][2] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreEventTriple").innerHTML);
                        var TmpMoreEventHTML = MoreEventCount[1][2];
                        if (k + 1 == Math.ceil(ajaxData["B" + b[0] + "C" + Category[1]].length / 3))
                            switch (ajaxData["B" + b[0] + "C" + Category[1]].length % 3) {
                            case 0:
                                TmpMoreEventHTML = TmpMoreEventHTML.replace("OddsData0", MoreTmplList[1][parseInt(b[0], 10)].replace(/{@/g, "{@" + 3 * k).replace(/{%/g, "{%" + 3 * k)),
                                TmpMoreEventHTML = TmpMoreEventHTML.replace("OddsData1", MoreTmplList[1][parseInt(b[0], 10)].replace(/{@/g, "{@" + (3 * k + 1)).replace(/{%/g, "{%" + (3 * k + 1))),
                                TmpMoreEventHTML = TmpMoreEventHTML.replace("OddsData2", MoreTmplList[1][parseInt(b[0], 10)].replace(/{@/g, "{@" + (3 * k + 2)).replace(/{%/g, "{%" + (3 * k + 2)));
                                break;
                            case 1:
                                TmpMoreEventHTML = TmpMoreEventHTML.replace("OddsData0", MoreTmplList[1][parseInt(b[0], 10)].replace(/{@/g, "{@" + 3 * k).replace(/{%/g, "{%" + 3 * k)),
                                TmpMoreEventHTML = TmpMoreEventHTML.replace("OddsData1", ""),
                                TmpMoreEventHTML = TmpMoreEventHTML.replace("OddsData2", "");
                                break;
                            case 2:
                                TmpMoreEventHTML = TmpMoreEventHTML.replace("OddsData0", MoreTmplList[1][parseInt(b[0], 10)].replace(/{@/g, "{@" + 3 * k).replace(/{%/g, "{%" + 3 * k)),
                                TmpMoreEventHTML = TmpMoreEventHTML.replace("OddsData1", MoreTmplList[1][parseInt(b[0], 10)].replace(/{@/g, "{@" + (3 * k + 1)).replace(/{%/g, "{%" + (3 * k + 1))),
                                TmpMoreEventHTML = TmpMoreEventHTML.replace("OddsData2", "")
                            }
                        else
                            TmpMoreEventHTML = TmpMoreEventHTML.replace("Odds_1_dsp", CLS_LS_ON),
                            TmpMoreEventHTML = TmpMoreEventHTML.replace("Odds_2_dsp", CLS_LS_ON),
                            TmpMoreEventHTML = TmpMoreEventHTML.replace("OddsData0", MoreTmplList[1][parseInt(b[0], 10)].replace(/{@/g, "{@" + 3 * k).replace(/{%/g, "{%" + 3 * k)),
                            TmpMoreEventHTML = TmpMoreEventHTML.replace("OddsData1", MoreTmplList[1][parseInt(b[0], 10)].replace(/{@/g, "{@" + (3 * k + 1)).replace(/{%/g, "{%" + (3 * k + 1))),
                            TmpMoreEventHTML = TmpMoreEventHTML.replace("OddsData2", MoreTmplList[1][parseInt(b[0], 10)].replace(/{@/g, "{@" + (3 * k + 2)).replace(/{%/g, "{%" + (3 * k + 2)));
                        moreEventHTML += TmpMoreEventHTML
                    }
            } else
                void 0 !== ajaxData["B" + b[0]] && null != ajaxData["B" + b[0]] && (Category[1].toString() == ajaxData["B" + b[0]][0] || "0" == Category[1].toString() && "1" == ajaxData["B" + b[0]][1]) && ("" == MoreEventCount[1][0] && (MoreEventCount[1][0] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreEventSingle").innerHTML),
                moreEventHTML = MoreEventCount[1][0],
                moreEventHTML = moreEventHTML.replace("OddsData0", MoreTmplList[1][parseInt(b[0], 10)]));
            for (var havedata = !1, j = 0; j < b.length; j++)
                if (-1 != indexOf(MultiOddsArray, b[j]) && void 0 !== ajaxData["B" + b[j] + "C" + Category[1]] && null != ajaxData["B" + b[j] + "C" + Category[1]] || void 0 !== ajaxData["B" + b[j]] && null != ajaxData["B" + b[j]] && (Category[1].toString() == ajaxData["B" + b[j]][0] || "0" == Category[1].toString() && "1" == ajaxData["B" + b[j]][1])) {
                    havedata = !0,
                    sKeeper_Sport[1].DivTmpl = moreEventHTML;
                    break
                }
            if (havedata) {
                sKeeper_Sport[1].newHash = new Array,
                sKeeper_Sport[1].oHash = new Array;
                for (var j = 0; j < b.length; j++) {
                    var parseOdds = !1;
                    if (-1 != indexOf(MultiOddsArray, b[j]) && void 0 !== ajaxData["B" + b[j] + "C" + Category[1]] && null != ajaxData["B" + b[j] + "C" + Category[1]] ? parseOdds = !0 : void 0 !== ajaxData["B" + b[j]] && null != ajaxData["B" + b[j]] && ("0" == Category[1].toString() ? "1" == ajaxData["B" + b[j]][1] && (parseOdds = !0) : parseOdds = !0),
                    parseOdds)
                        if (-1 != indexOf(MultiOddsArray, b[j])) {
                            sKeeper_Sport[1].newHash = new Array,
                            sKeeper_Sport[1].oHash = new Array;
                            var stop = !1, Cnt = 0, sIdx = 0, sArr;
                            switch (b[j]) {
                            case "221":
                                sIdx = SelIdx221,
                                sArr = Arr221;
                                break;
                            case "222":
                                sIdx = SelIdx222,
                                sArr = Arr222;
                                break;
                            case "223":
                                sIdx = SelIdx223,
                                sArr = Arr223;
                                break;
                            case "224":
                                sIdx = SelIdx224,
                                sArr = Arr224;
                                break;
                            case "225":
                                sIdx = SelIdx225,
                                sArr = Arr225;
                                break;
                            case "226":
                                sIdx = SelIdx226,
                                sArr = Arr226;
                                break;
                            case "227":
                                sIdx = SelIdx227,
                                sArr = Arr227;
                                break;
                            default:
                                sArr = ajaxData["B" + b[j] + "C" + Category[1]],
                                sIdx = 0
                            }
                            for (var KK = sIdx; KK < sArr.length && !stop; KK++) {
                                switch (b[j]) {
                                case "221":
                                case "222":
                                case "223":
                                case "224":
                                case "225":
                                case "226":
                                case "227":
                                    Cnt++,
                                    Cnt >= 5 && (stop = !0);
                                    break;
                                default:
                                    parseOdds = !0
                                }
                                if (parseOdds) {
                                    if (void 0 !== ajaxData[sArr[KK]])
                                        switch (sKeeper_Sport[1].setDatas(ajaxData[sArr[KK]], addStr(mMultiSportODDS_DEF["B" + b[j]], KK)),
                                        b[j]) {
                                        case "221":
                                            sKeeper_Sport[1].oHash[KK + "Odds_221_01"] + sKeeper_Sport[1].oHash[KK + "Odds_221_02"] + sKeeper_Sport[1].oHash[KK + "Odds_221_03"] + sKeeper_Sport[1].oHash[KK + "Odds_221_04"] + sKeeper_Sport[1].oHash[KK + "Odds_221_05"] + sKeeper_Sport[1].oHash[KK + "Odds_221_10"] + sKeeper_Sport[1].oHash[KK + "Odds_221_20"] + sKeeper_Sport[1].oHash[KK + "Odds_221_30"] + sKeeper_Sport[1].oHash[KK + "Odds_221_40"] + sKeeper_Sport[1].oHash[KK + "Odds_221_50"] != "" && ("" == sKeeper_Sport[1].oHash[KK + "Odds_221_01"] && (sKeeper_Sport[1].oHash[KK + "Odds_221_01"] = "--"),
                                            "" == sKeeper_Sport[1].oHash[KK + "Odds_221_02"] && (sKeeper_Sport[1].oHash[KK + "Odds_221_02"] = "--"),
                                            "" == sKeeper_Sport[1].oHash[KK + "Odds_221_03"] && (sKeeper_Sport[1].oHash[KK + "Odds_221_03"] = "--"),
                                            "" == sKeeper_Sport[1].oHash[KK + "Odds_221_04"] && (sKeeper_Sport[1].oHash[KK + "Odds_221_04"] = "--"),
                                            "" == sKeeper_Sport[1].oHash[KK + "Odds_221_05"] && (sKeeper_Sport[1].oHash[KK + "Odds_221_05"] = "--"),
                                            "" == sKeeper_Sport[1].oHash[KK + "Odds_221_10"] && (sKeeper_Sport[1].oHash[KK + "Odds_221_10"] = "--"),
                                            "" == sKeeper_Sport[1].oHash[KK + "Odds_221_20"] && (sKeeper_Sport[1].oHash[KK + "Odds_221_20"] = "--"),
                                            "" == sKeeper_Sport[1].oHash[KK + "Odds_221_30"] && (sKeeper_Sport[1].oHash[KK + "Odds_221_30"] = "--"),
                                            "" == sKeeper_Sport[1].oHash[KK + "Odds_221_40"] && (sKeeper_Sport[1].oHash[KK + "Odds_221_40"] = "--"),
                                            "" == sKeeper_Sport[1].oHash[KK + "Odds_221_50"] && (sKeeper_Sport[1].oHash[KK + "Odds_221_50"] = "--"));
                                            break;
                                        case "222":
                                            sKeeper_Sport[1].oHash[KK + "Odds_222_01"] + sKeeper_Sport[1].oHash[KK + "Odds_222_10"] + sKeeper_Sport[1].oHash[KK + "Odds_222_02"] + sKeeper_Sport[1].oHash[KK + "Odds_222_20"] + sKeeper_Sport[1].oHash[KK + "Odds_222_13"] + sKeeper_Sport[1].oHash[KK + "Odds_222_03"] + sKeeper_Sport[1].oHash[KK + "Odds_222_30"] + sKeeper_Sport[1].oHash[KK + "Odds_222_04"] + sKeeper_Sport[1].oHash[KK + "Odds_222_40"] + sKeeper_Sport[1].oHash[KK + "Odds_222_05"] + sKeeper_Sport[1].oHash[KK + "Odds_222_50"] != "" && ("" == sKeeper_Sport[1].oHash[KK + "Odds_222_01"] && (sKeeper_Sport[1].oHash[KK + "Odds_222_01"] = "--"),
                                            "" == sKeeper_Sport[1].oHash[KK + "Odds_222_10"] && (sKeeper_Sport[1].oHash[KK + "Odds_222_10"] = "--"),
                                            "" == sKeeper_Sport[1].oHash[KK + "Odds_222_02"] && (sKeeper_Sport[1].oHash[KK + "Odds_222_02"] = "--"),
                                            "" == sKeeper_Sport[1].oHash[KK + "Odds_222_20"] && (sKeeper_Sport[1].oHash[KK + "Odds_222_20"] = "--"),
                                            "" == sKeeper_Sport[1].oHash[KK + "Odds_222_13"] && (sKeeper_Sport[1].oHash[KK + "Odds_222_13"] = "--"),
                                            "" == sKeeper_Sport[1].oHash[KK + "Odds_222_03"] && (sKeeper_Sport[1].oHash[KK + "Odds_222_03"] = "--"),
                                            "" == sKeeper_Sport[1].oHash[KK + "Odds_222_30"] && (sKeeper_Sport[1].oHash[KK + "Odds_222_30"] = "--"),
                                            "" == sKeeper_Sport[1].oHash[KK + "Odds_222_04"] && (sKeeper_Sport[1].oHash[KK + "Odds_222_04"] = "--"),
                                            "" == sKeeper_Sport[1].oHash[KK + "Odds_222_40"] && (sKeeper_Sport[1].oHash[KK + "Odds_222_40"] = "--"),
                                            "" == sKeeper_Sport[1].oHash[KK + "Odds_222_05"] && (sKeeper_Sport[1].oHash[KK + "Odds_222_05"] = "--"),
                                            "" == sKeeper_Sport[1].oHash[KK + "Odds_222_50"] && (sKeeper_Sport[1].oHash[KK + "Odds_222_50"] = "--"));
                                            break;
                                        case "223":
                                            sKeeper_Sport[1].oHash[KK + "Odds_223_00"] + sKeeper_Sport[1].oHash[KK + "Odds_223_01"] + sKeeper_Sport[1].oHash[KK + "Odds_223_02"] + sKeeper_Sport[1].oHash[KK + "Odds_223_03"] + sKeeper_Sport[1].oHash[KK + "Odds_223_05"] + sKeeper_Sport[1].oHash[KK + "Odds_223_04"] != "" && ("" == sKeeper_Sport[1].oHash[KK + "Odds_223_00"] && (sKeeper_Sport[1].oHash[KK + "Odds_223_00"] = "--"),
                                            "" == sKeeper_Sport[1].oHash[KK + "Odds_223_01"] && (sKeeper_Sport[1].oHash[KK + "Odds_223_01"] = "--"),
                                            "" == sKeeper_Sport[1].oHash[KK + "Odds_223_02"] && (sKeeper_Sport[1].oHash[KK + "Odds_223_02"] = "--"),
                                            "" == sKeeper_Sport[1].oHash[KK + "Odds_223_03"] && (sKeeper_Sport[1].oHash[KK + "Odds_223_03"] = "--"),
                                            "" == sKeeper_Sport[1].oHash[KK + "Odds_223_04"] && (sKeeper_Sport[1].oHash[KK + "Odds_223_04"] = "--"),
                                            "" == sKeeper_Sport[1].oHash[KK + "Odds_223_05"] && (sKeeper_Sport[1].oHash[KK + "Odds_223_05"] = "--"));
                                            break;
                                        case "224":
                                            sKeeper_Sport[1].oHash[KK + "Odds_224_00"] + sKeeper_Sport[1].oHash[KK + "Odds_224_01"] + sKeeper_Sport[1].oHash[KK + "Odds_224_02"] + sKeeper_Sport[1].oHash[KK + "Odds_224_12"] + sKeeper_Sport[1].oHash[KK + "Odds_224_13"] != "" && ("" == sKeeper_Sport[1].oHash[KK + "Odds_224_00"] && (sKeeper_Sport[1].oHash[KK + "Odds_224_00"] = "--"),
                                            "" == sKeeper_Sport[1].oHash[KK + "Odds_224_01"] && (sKeeper_Sport[1].oHash[KK + "Odds_224_01"] = "--"),
                                            "" == sKeeper_Sport[1].oHash[KK + "Odds_224_02"] && (sKeeper_Sport[1].oHash[KK + "Odds_224_02"] = "--"),
                                            "" == sKeeper_Sport[1].oHash[KK + "Odds_224_12"] && (sKeeper_Sport[1].oHash[KK + "Odds_224_12"] = "--"),
                                            "" == sKeeper_Sport[1].oHash[KK + "Odds_224_13"] && (sKeeper_Sport[1].oHash[KK + "Odds_224_13"] = "--"));
                                            break;
                                        case "225":
                                            sKeeper_Sport[1].oHash[KK + "Odds_225_00"] + sKeeper_Sport[1].oHash[KK + "Odds_225_01"] != "" && ("" == sKeeper_Sport[1].oHash[KK + "Odds_225_00"] && (sKeeper_Sport[1].oHash[KK + "Odds_225_00"] = "--"),
                                            "" == sKeeper_Sport[1].oHash[KK + "Odds_225_01"] && (sKeeper_Sport[1].oHash[KK + "Odds_225_01"] = "--"));
                                            break;
                                        case "226":
                                            sKeeper_Sport[1].oHash[KK + "Odds_226_00"] + sKeeper_Sport[1].oHash[KK + "Odds_226_01"] + sKeeper_Sport[1].oHash[KK + "Odds_226_02"] != "" && ("" == sKeeper_Sport[1].oHash[KK + "Odds_226_00"] && (sKeeper_Sport[1].oHash[KK + "Odds_226_00"] = "--"),
                                            "" == sKeeper_Sport[1].oHash[KK + "Odds_226_01"] && (sKeeper_Sport[1].oHash[KK + "Odds_226_01"] = "--"),
                                            "" == sKeeper_Sport[1].oHash[KK + "Odds_226_02"] && (sKeeper_Sport[1].oHash[KK + "Odds_226_02"] = "--"));
                                            break;
                                        case "227":
                                            sKeeper_Sport[1].oHash[KK + "Odds_227_00"] + sKeeper_Sport[1].oHash[KK + "Odds_227_01"] + sKeeper_Sport[1].oHash[KK + "Odds_227_02"] != "" && ("" == sKeeper_Sport[1].oHash[KK + "Odds_227_00"] && (sKeeper_Sport[1].oHash[KK + "Odds_227_00"] = "--"),
                                            "" == sKeeper_Sport[1].oHash[KK + "Odds_227_01"] && (sKeeper_Sport[1].oHash[KK + "Odds_227_01"] = "--"),
                                            "" == sKeeper_Sport[1].oHash[KK + "Odds_227_02"] && (sKeeper_Sport[1].oHash[KK + "Odds_227_02"] = "--"))
                                        }
                                    else
                                        switch (b[j]) {
                                        case "221":
                                            sKeeper_Sport[1].oHash[KK + "Odds_221_01"] = "--",
                                            sKeeper_Sport[1].oHash[KK + "Odds_221_02"] = "--",
                                            sKeeper_Sport[1].oHash[KK + "Odds_221_03"] = "--",
                                            sKeeper_Sport[1].oHash[KK + "Odds_221_04"] = "--",
                                            sKeeper_Sport[1].oHash[KK + "Odds_221_05"] = "--",
                                            sKeeper_Sport[1].oHash[KK + "Odds_221_10"] = "--",
                                            sKeeper_Sport[1].oHash[KK + "Odds_221_20"] = "--",
                                            sKeeper_Sport[1].oHash[KK + "Odds_221_30"] = "--",
                                            sKeeper_Sport[1].oHash[KK + "Odds_221_40"] = "--",
                                            sKeeper_Sport[1].oHash[KK + "Odds_221_50"] = "--";
                                            break;
                                        case "222":
                                            sKeeper_Sport[1].oHash[KK + "Odds_222_01"] = "--",
                                            sKeeper_Sport[1].oHash[KK + "Odds_222_10"] = "--",
                                            sKeeper_Sport[1].oHash[KK + "Odds_222_02"] = "--",
                                            sKeeper_Sport[1].oHash[KK + "Odds_222_20"] = "--",
                                            sKeeper_Sport[1].oHash[KK + "Odds_222_13"] = "--",
                                            sKeeper_Sport[1].oHash[KK + "Odds_222_03"] = "--",
                                            sKeeper_Sport[1].oHash[KK + "Odds_222_30"] = "--",
                                            sKeeper_Sport[1].oHash[KK + "Odds_222_04"] = "--",
                                            sKeeper_Sport[1].oHash[KK + "Odds_222_40"] = "--",
                                            sKeeper_Sport[1].oHash[KK + "Odds_222_05"] = "--",
                                            sKeeper_Sport[1].oHash[KK + "Odds_222_50"] = "--";
                                            break;
                                        case "223":
                                            sKeeper_Sport[1].oHash[KK + "Odds_223_00"] = "--",
                                            sKeeper_Sport[1].oHash[KK + "Odds_223_01"] = "--",
                                            sKeeper_Sport[1].oHash[KK + "Odds_223_02"] = "--",
                                            sKeeper_Sport[1].oHash[KK + "Odds_223_03"] = "--",
                                            sKeeper_Sport[1].oHash[KK + "Odds_223_05"] = "--",
                                            sKeeper_Sport[1].oHash[KK + "Odds_223_04"] = "--";
                                            break;
                                        case "224":
                                            sKeeper_Sport[1].oHash[KK + "Odds_224_00"] = "--",
                                            sKeeper_Sport[1].oHash[KK + "Odds_224_01"] = "--",
                                            sKeeper_Sport[1].oHash[KK + "Odds_224_02"] = "--",
                                            sKeeper_Sport[1].oHash[KK + "Odds_224_12"] = "--",
                                            sKeeper_Sport[1].oHash[KK + "Odds_224_13"] = "--";
                                            break;
                                        case "225":
                                            sKeeper_Sport[1].oHash[KK + "Odds_225_00"] = "--",
                                            sKeeper_Sport[1].oHash[KK + "Odds_225_01"] = "--";
                                            break;
                                        case "226":
                                            sKeeper_Sport[1].oHash[KK + "Odds_226_00"] = "--",
                                            sKeeper_Sport[1].oHash[KK + "Odds_226_01"] = "--",
                                            sKeeper_Sport[1].oHash[KK + "Odds_226_02"] = "--";
                                            break;
                                        case "227":
                                            sKeeper_Sport[1].oHash[KK + "Odds_227_00"] = "--",
                                            sKeeper_Sport[1].oHash[KK + "Odds_227_01"] = "--",
                                            sKeeper_Sport[1].oHash[KK + "Odds_227_02"] = "--"
                                        }
                                    void 0 !== oajaxData[1][sArr[KK]] && (oajaxData[1][sArr[KK]].toString() != ajaxData[sArr[KK]].toString() ? sKeeper_Sport[1].newHash[KK + "Changed_" + b[j]] = CLS_UPD : sKeeper_Sport[1].newHash[KK + "Changed_" + b[j]] = ""),
                                    sKeeper_Sport[1].oHash[KK + "MatchId"] = sKeeper_Sport[1].MatchId,
                                    sKeeper_Sport[1].newHash[KK + "isParlay"] = sKeeper_Sport[1].isParlay,
                                    "L" == sKeeper_Sport[1].Market ? sKeeper_Sport[1].newHash[KK + "LorD"] = "liveligh" : sKeeper_Sport[1].newHash[KK + "LorD"] = "bgcpe";
                                    var TimeArr;
                                    switch (b[j]) {
                                    case "221":
                                        for (var m = 0; m < Arr221.length; m++)
                                            "" == Arr221[m] ? sKeeper_Sport[1].newHash[KK + "disable" + m] = "disable" : sKeeper_Sport[1].newHash[KK + "disable" + m] = "";
                                        TimeArr = void 0 !== ajaxData[sArr[KK]] ? genTimeRange(b[j], parseInt(sKeeper_Sport[1].oHash[KK + "Value_221"], 10)) : genTimeRange(b[j], KK),
                                        (KK > 89 || "L" == sKeeper_Sport[1].Market && "" == sArr[KK]) && (TimeArr[0] = "",
                                        TimeArr[1] = "",
                                        TimeArr[2] = ""),
                                        sKeeper_Sport[1].newHash[KK + "TimeRange"] = TimeArr[0],
                                        sKeeper_Sport[1].newHash[KK + "TimeRange_txt"] = TimeArr[1],
                                        sKeeper_Sport[1].newHash[KK + "TimeRange_title"] = TimeArr[2];
                                        break;
                                    case "222":
                                        for (var m = 0; m < Arr222.length; m++)
                                            "" == Arr222[m] ? sKeeper_Sport[1].newHash[KK + "disable" + m] = "disable" : sKeeper_Sport[1].newHash[KK + "disable" + m] = "";
                                        TimeArr = void 0 !== ajaxData[sArr[KK]] ? genTimeRange(b[j], parseInt(sKeeper_Sport[1].oHash[KK + "Value_222"], 10)) : genTimeRange(b[j], KK),
                                        (KK > 85 || "L" == sKeeper_Sport[1].Market && "" == sArr[KK]) && (TimeArr[0] = "",
                                        TimeArr[1] = "",
                                        TimeArr[2] = ""),
                                        sKeeper_Sport[1].newHash[KK + "TimeRange"] = TimeArr[0],
                                        sKeeper_Sport[1].newHash[KK + "TimeRange_txt"] = TimeArr[1],
                                        sKeeper_Sport[1].newHash[KK + "TimeRange_title"] = TimeArr[2];
                                        break;
                                    case "223":
                                        for (var m = 0; m < Arr223.length; m++)
                                            "" == Arr223[m] ? sKeeper_Sport[1].newHash[KK + "disable" + m] = "disable" : sKeeper_Sport[1].newHash[KK + "disable" + m] = "";
                                        TimeArr = void 0 !== ajaxData[sArr[KK]] ? genTimeRange(b[j], parseInt(sKeeper_Sport[1].oHash[KK + "Value_223"], 10)) : genTimeRange(b[j], KK),
                                        (KK > 89 || "L" == sKeeper_Sport[1].Market && "" == sArr[KK]) && (TimeArr[0] = "",
                                        TimeArr[1] = "",
                                        TimeArr[2] = ""),
                                        sKeeper_Sport[1].newHash[KK + "TimeRange"] = TimeArr[0],
                                        sKeeper_Sport[1].newHash[KK + "TimeRange_txt"] = TimeArr[1],
                                        sKeeper_Sport[1].newHash[KK + "TimeRange_title"] = TimeArr[2];
                                        break;
                                    case "224":
                                        for (var m = 0; m < Arr224.length; m++)
                                            "" == Arr224[m] ? sKeeper_Sport[1].newHash[KK + "disable" + m] = "disable" : sKeeper_Sport[1].newHash[KK + "disable" + m] = "";
                                        TimeArr = void 0 !== ajaxData[sArr[KK]] ? genTimeRange(b[j], parseInt(sKeeper_Sport[1].oHash[KK + "Value_224"], 10)) : genTimeRange(b[j], KK),
                                        (KK > 85 || "L" == sKeeper_Sport[1].Market && "" == sArr[KK]) && (TimeArr[0] = "",
                                        TimeArr[1] = "",
                                        TimeArr[2] = ""),
                                        sKeeper_Sport[1].newHash[KK + "TimeRange"] = TimeArr[0],
                                        sKeeper_Sport[1].newHash[KK + "TimeRange_txt"] = TimeArr[1],
                                        sKeeper_Sport[1].newHash[KK + "TimeRange_title"] = TimeArr[2];
                                        break;
                                    case "225":
                                        for (var m = 0; m < Arr225.length; m++)
                                            "" == Arr225[m] ? sKeeper_Sport[1].newHash[KK + "disable" + m] = "disable" : sKeeper_Sport[1].newHash[KK + "disable" + m] = "";
                                        TimeArr = void 0 !== ajaxData[sArr[KK]] ? genTimeRange(b[j], parseInt(sKeeper_Sport[1].oHash[KK + "Value_225"], 10)) : genTimeRange(b[j], KK),
                                        (KK > 89 || "L" == sKeeper_Sport[1].Market && "" == sArr[KK]) && (TimeArr[0] = "",
                                        TimeArr[1] = "",
                                        TimeArr[2] = ""),
                                        sKeeper_Sport[1].newHash[KK + "TimeRange"] = TimeArr[0],
                                        sKeeper_Sport[1].newHash[KK + "TimeRange_txt"] = TimeArr[1],
                                        sKeeper_Sport[1].newHash[KK + "TimeRange_title"] = TimeArr[2];
                                        break;
                                    case "226":
                                        for (var m = 0; m < Arr226.length; m++)
                                            "" == Arr226[m] ? sKeeper_Sport[1].newHash[KK + "disable" + m] = "disable" : sKeeper_Sport[1].newHash[KK + "disable" + m] = "";
                                        TimeArr = void 0 !== ajaxData[sArr[KK]] ? genTimeRange(b[j], parseInt(sKeeper_Sport[1].oHash[KK + "Value_226"], 10)) : genTimeRange(b[j], KK),
                                        (KK > 89 || "L" == sKeeper_Sport[1].Market && "" == sArr[KK]) && (TimeArr[0] = "",
                                        TimeArr[1] = "",
                                        TimeArr[2] = ""),
                                        sKeeper_Sport[1].newHash[KK + "TimeRange"] = TimeArr[0],
                                        sKeeper_Sport[1].newHash[KK + "TimeRange_txt"] = TimeArr[1],
                                        sKeeper_Sport[1].newHash[KK + "TimeRange_title"] = TimeArr[2];
                                        break;
                                    case "227":
                                        for (var m = 0; m < Arr227.length; m++)
                                            "" == Arr227[m] ? sKeeper_Sport[1].newHash[KK + "disable" + m] = "disable" : sKeeper_Sport[1].newHash[KK + "disable" + m] = "";
                                        TimeArr = void 0 !== ajaxData[sArr[KK]] ? genTimeRange(b[j], parseInt(sKeeper_Sport[1].oHash[KK + "Value_227"], 10)) : genTimeRange(b[j], KK),
                                        (KK > 85 || "L" == sKeeper_Sport[1].Market && "" == sArr[KK]) && (TimeArr[0] = "",
                                        TimeArr[1] = "",
                                        TimeArr[2] = ""),
                                        sKeeper_Sport[1].newHash[KK + "TimeRange"] = TimeArr[0],
                                        sKeeper_Sport[1].newHash[KK + "TimeRange_txt"] = TimeArr[1],
                                        sKeeper_Sport[1].newHash[KK + "TimeRange_title"] = TimeArr[2];
                                        break;
                                    case "197":
                                    case "198":
                                    case "204":
                                    case "205":
                                        sKeeper_Sport[1].newHash[KK + "Odds_" + b[j] + "_O_Cls"] = getOddsClass(sKeeper_Sport[1].oHash[KK + "Odds_" + b[j] + "_O"]),
                                        sKeeper_Sport[1].newHash[KK + "Odds_" + b[j] + "_U_Cls"] = getOddsClass(sKeeper_Sport[1].oHash[KK + "Odds_" + b[j] + "_U"])
                                    }
                                }
                            }
                        } else {
                            if (-1 != indexOf(CheckZeroOddsArray, b[j])) {
                                var ChkDataArr = new Array;
                                if ("" != (ChkDataArr = ChkDataArr.concat(ajaxData["B" + b[j]])).slice(4, ChkDataArr.length).toString().replace(/,/g, ""))
                                    for (var iZero = 4; iZero < ChkDataArr.length; iZero++)
                                        "" == ChkDataArr[iZero] && (ChkDataArr[iZero] = "--");
                                sKeeper_Sport[1].setDatas(ChkDataArr, mMultiSportODDS_DEF["B" + b[j]])
                            } else
                                sKeeper_Sport[1].setDatas(ajaxData["B" + b[j]], mMultiSportODDS_DEF["B" + b[j]]);
                            switch (void 0 !== oajaxData[1]["B" + b[j]] && (oajaxData[1]["B" + b[j]].toString() != ajaxData["B" + b[j]].toString() ? sKeeper_Sport[1].newHash["Changed_" + b[j]] = CLS_UPD : sKeeper_Sport[1].newHash["Changed_" + b[j]] = ""),
                            sKeeper_Sport[1].newHash.isParlay = sKeeper_Sport[1].isParlay,
                            "L" == sKeeper_Sport[1].Market ? sKeeper_Sport[1].newHash.LorD = "liveligh" : sKeeper_Sport[1].newHash.LorD = "bgcpe",
                            b[j]) {
                            case "17":
                                sKeeper_Sport[1].newHash["Odds_" + b[j] + "_H_Cls"] = getOddsClass(sKeeper_Sport[1].oHash["Odds_" + b[j] + "_H"]),
                                sKeeper_Sport[1].newHash["Odds_" + b[j] + "_A_Cls"] = getOddsClass(sKeeper_Sport[1].oHash["Odds_" + b[j] + "_A"]),
                                "" != sKeeper_Sport[1].oHash["Value_" + b[j]] ? "0" != sKeeper_Sport[1].oHash["Value_" + b[j]] ? "h" == sKeeper_Sport[1].oHash["FavorF_" + b[j]] ? (sKeeper_Sport[1].newHash["Value_" + b[j] + "_A"] = "(+" + sKeeper_Sport[1].oHash["Value_" + b[j]] + ")",
                                sKeeper_Sport[1].newHash["Value_" + b[j] + "_H"] = "(-" + sKeeper_Sport[1].oHash["Value_" + b[j]] + ")") : (sKeeper_Sport[1].newHash["Value_" + b[j] + "_A"] = "(-" + sKeeper_Sport[1].oHash["Value_" + b[j]] + ")",
                                sKeeper_Sport[1].newHash["Value_" + b[j] + "_H"] = "(+" + sKeeper_Sport[1].oHash["Value_" + b[j]] + ")") : (sKeeper_Sport[1].newHash["Value_" + b[j] + "_A"] = "(0)",
                                sKeeper_Sport[1].newHash["Value_" + b[j] + "_H"] = "(0)") : (sKeeper_Sport[1].newHash["Value_" + b[j] + "_A"] = "()",
                                sKeeper_Sport[1].newHash["Value_" + b[j] + "_H"] = "()");
                                break;
                            case "18":
                                sKeeper_Sport[1].newHash["Odds_" + b[j] + "_O_Cls"] = getOddsClass(sKeeper_Sport[1].oHash["Odds_" + b[j] + "_O"]),
                                sKeeper_Sport[1].newHash["Odds_" + b[j] + "_U_Cls"] = getOddsClass(sKeeper_Sport[1].oHash["Odds_" + b[j] + "_U"]);
                                break;
                            case "2":
                            case "12":
                            case "184":
                            case "194":
                            case "203":
                                sKeeper_Sport[1].newHash["Odds_" + b[j] + "_O_Cls"] = getOddsClass(sKeeper_Sport[1].oHash["Odds_" + b[j] + "_O"]),
                                sKeeper_Sport[1].newHash["Odds_" + b[j] + "_E_Cls"] = getOddsClass(sKeeper_Sport[1].oHash["Odds_" + b[j] + "_E"]);
                                break;
                            case "401":
                            case "402":
                            case "403":
                            case "404":
                            case "461":
                            case "462":
                            case "463":
                            case "464":
                                sKeeper_Sport[1].newHash["Odds_" + b[j] + "_O_Cls"] = getOddsClass(sKeeper_Sport[1].oHash["Odds_" + b[j] + "_O"]),
                                sKeeper_Sport[1].newHash["Odds_" + b[j] + "_U_Cls"] = getOddsClass(sKeeper_Sport[1].oHash["Odds_" + b[j] + "_U"]);
                                break;
                            case "216":
                            case "217":
                                for (var FirstEmpty = !0, iplayer = 1; iplayer <= 99; iplayer++) {
                                    var sIdx = iplayer.toString();
                                    iplayer < 10 && (sIdx = "0" + sIdx),
                                    void 0 !== sKeeper_Sport[1].oHash["Odds_" + b[j] + "_I" + sIdx] && "" != sKeeper_Sport[1].oHash["Odds_" + b[j] + "_I" + sIdx] ? (sKeeper_Sport[1].newHash["Odds_P" + sIdx + "_dsp"] = CLS_LS_ON,
                                    void 0 !== oajaxData[1][sKeeper_Sport[1].oHash["OddsId_" + b[j]] + sKeeper_Sport[1].oHash["Odds_" + b[j] + "_C" + sIdx]] && oajaxData[1][sKeeper_Sport[1].oHash["OddsId_" + b[j]] + sKeeper_Sport[1].oHash["Odds_" + b[j] + "_C" + sIdx]] != sKeeper_Sport[1].oHash["Odds_" + b[j] + "_P" + sIdx] + sKeeper_Sport[1].oHash["Odds_" + b[j] + "_I" + sIdx] ? sKeeper_Sport[1].newHash["Changed_" + b[j] + "_P" + sIdx] = CLS_UPD : sKeeper_Sport[1].newHash["Changed_" + b[j] + "_P" + sIdx] = "") : FirstEmpty ? (sKeeper_Sport[1].newHash["Odds_P" + sIdx + "_dsp"] = iplayer % 2 == 0 ? CLS_LS_ON : CLS_LS_OFF,
                                    FirstEmpty = !1) : sKeeper_Sport[1].newHash["Odds_P" + sIdx + "_dsp"] = CLS_LS_OFF
                                }
                                break;
                            case "28":
                                sKeeper_Sport[1].newHash.Odds_28_hdp = sKeeper_Sport[1].oHash.Odds_28_hdpx.replace(" ", "");
                                break;
                            case 453:
                                sKeeper_Sport[1].newHash.Odds_453_hdp = sKeeper_Sport[1].oHash.Odds_453_hdpx.replace(" ", "")
                            }
                        }
                    if (7 == Category[1])
                        switch (sKeeper_Sport[1].AppendOddsTable(),
                        b[j]) {
                        case "221":
                            OddsHTML_221 = sKeeper_Sport[1].OddsHTML,
                            sKeeper_Sport[1].OddsHTML = "";
                            break;
                        case "222":
                            OddsHTML_222 = sKeeper_Sport[1].OddsHTML,
                            sKeeper_Sport[1].OddsHTML = "";
                            break;
                        case "223":
                            OddsHTML_223 = sKeeper_Sport[1].OddsHTML,
                            sKeeper_Sport[1].OddsHTML = "";
                            break;
                        case "224":
                            OddsHTML_224 = sKeeper_Sport[1].OddsHTML,
                            sKeeper_Sport[1].OddsHTML = "";
                            break;
                        case "225":
                            OddsHTML_225 = sKeeper_Sport[1].OddsHTML,
                            sKeeper_Sport[1].OddsHTML = "";
                            break;
                        case "226":
                            OddsHTML_226 = sKeeper_Sport[1].OddsHTML,
                            sKeeper_Sport[1].OddsHTML = "";
                            break;
                        case "227":
                            OddsHTML_227 = sKeeper_Sport[1].OddsHTML,
                            sKeeper_Sport[1].OddsHTML = ""
                        }
                }
                7 != Category[1] && sKeeper_Sport[1].AppendOddsTable()
            }
        }
        var OddsHTML = sKeeper_Sport[1].OddsHTML;
        "" == MoreTmplCategory[1] && (MoreTmplCategory[1] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("Category_1").innerHTML);
        var Category_1 = MoreTmplCategory[1];
        if (7 == Category[1] && (OddsHTML = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("Category_1_7").innerHTML,
        OddsHTML = OddsHTML.replace("OddsData221", OddsHTML_221),
        OddsHTML = OddsHTML.replace("OddsData222", OddsHTML_222),
        OddsHTML = OddsHTML.replace("OddsData223", OddsHTML_223),
        OddsHTML = OddsHTML.replace("OddsData224", OddsHTML_224),
        OddsHTML = OddsHTML.replace("OddsData225", OddsHTML_225),
        OddsHTML = OddsHTML.replace("OddsData226", OddsHTML_226),
        OddsHTML = OddsHTML.replace("OddsData227", OddsHTML_227),
        "L" != sKeeper_Sport[1].Market)) {
            OddsHTML = OddsHTML.replace("displayOff", "displayOn");
            var TimeArr = genTimeRange(b[j], SelIdxFM);
            OddsHTML = OddsHTML.replace("{@TimeRange_title}", TimeArr[2]),
            OddsHTML = OddsHTML.replace("{@TimeRange_txt}", TimeArr[1])
        }
        Category_1 = Category_1.replace("{@OddsHTML}", OddsHTML);
        for (var i = 1; i < CategoryList[1].length > 0; i++)
            Category_1 = CategoryList[1][i] - CategoryList1X2[i] > 0 ? Category_1.replace("{@category_disp" + i.toString() + "}", CLS_LS_ON) : Category_1.replace("{@category_disp" + i.toString() + "}", CLS_LS_OFF),
            Category_1 = Category[1] == i ? Category_1.replace("{@current" + i.toString() + "}", "current") : Category_1.replace("{@current" + i.toString() + "}", "");
        Category_1 = ChkHaveHotEvent ? Category_1.replace("{@category_disp0}", CLS_LS_ON) : Category_1.replace("{@category_disp0}", CLS_LS_OFF),
        Category_1 = 0 == Category[1] ? Category_1.replace("{@current0}", "current") : Category_1.replace("{@current0}", ""),
        sKeeper_Sport[1].OddsHTML = Category_1,
        sKeeper_Sport[1].TableContainer.innerHTML = sKeeper_Sport[1].OddsHTML,
        oajaxData[1] = new Object;
        for (var o in ajaxData)
            oajaxData[1][o] = ajaxData[o];
        if (void 0 !== ajaxData.B216 && null != ajaxData.B216)
            for (var idx = 6; idx < ajaxData.B216.length; idx += 3)
                oajaxData[1][ajaxData.B216[3] + ajaxData.B216[idx - 2]] = ajaxData.B216[idx - 1] + ajaxData.B216[idx];
        if (void 0 !== ajaxData.B217 && null != ajaxData.B217)
            for (var idx = 6; idx < ajaxData.B217.length; idx += 3)
                oajaxData[1][ajaxData.B217[3] + ajaxData.B217[idx - 2]] = ajaxData.B217[idx - 1] + ajaxData.B217[idx];
        if (Sport_More_End[1] = !0,
        bFromBtnClick[1] && (bFromBtnClick[1] = !1),
        bOpen1st[1]) {
            bOpen1st[1] = !1;
            var tdobj = $("td.moreBetType.tag.displayOn");
            tdobj.html("<div id='moreAddDiv'>" + sKeeper_Sport[1].OddsHTML + "</div>"),
            SetHTFTCSSelOdds(),
            FocusMoreTd()
        } else {
            var tdobj = $("td.moreBetType.tag.displayOn");
            tdobj.html("<div id='moreAddDiv'>" + sKeeper_Sport[1].OddsHTML + "</div>"),
            SetHTFTCSSelOdds(),
            dataNull && FocusMoreTd()
        }
    }
}
function GetEsportsMore(Response) {
    var ajaxData = new Array
      , dataNull = !1;
    if (null == Response) {
        for (var o in oajaxData[43])
            ajaxData[o] = oajaxData[43][o];
        dataNull = !0
    } else
        eval(Response);
    if (0 == Object.keys(ajaxData).length)
        return document.getElementById("ESports_More").innerHTML = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("NoInfo").innerHTML,
        SportMore_ThreadId[43] = null,
        sKeeper_Sport[43] = null,
        void (Sport_More[43] = !1);
    if (null != sKeeper_Sport[43]) {
        if (-1 == Category[43])
            for (var i = 1; i < CategoryList[43].length; i++)
                if (CategoryList[43][i] > 0) {
                    Category[43] = i;
                    break
                }
        Category[43] < ajaxData.LivePeriod[0] && (Category[43] = ajaxData.LivePeriod[0]);
        for (var cl = Category[43]; cl < CategoryList[43].length; cl++)
            if (0 != CategoryList[43][cl]) {
                Category[43] = cl;
                break
            }
        sKeeper_Sport[43].TableContainer = document.getElementById("ESports_More"),
        sKeeper_Sport[43].OddsHTML = "";
        var OddsHTML = sKeeper_Sport[43].OddsHTML;
        "" == MoreTmplCategory[43] && (MoreTmplCategory[43] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("Category_43").innerHTML);
        var Category_43 = MoreTmplCategory[43];
        Category_43 = Category_43.replace("{@OddsHTML}", OddsHTML);
        for (var i = 1; i < CategoryList[43].length > 0; i++)
            Category_43 = CategoryList[43][i] > 0 ? Category[43] < ajaxData.LivePeriod[0] ? Category_43.replace("{@category_disp" + i.toString() + "}", CLS_LS_OFF) : Category_43.replace("{@category_disp" + i.toString() + "}", CLS_LS_ON) : Category_43.replace("{@category_disp" + i.toString() + "}", CLS_LS_OFF),
            Category_43 = Category[43] == i ? Category_43.replace("{@current" + i.toString() + "}", "current") : Category_43.replace("{@current" + i.toString() + "}", "");
        Category_43 = 0 == Category[43] ? Category_43.replace("{@current0}", "current") : Category_43.replace("{@current0}", "");
        var BetTypeGroup1 = null
          , BetTypeGroup2 = null
          , BetTypeGroup3 = null
          , BetTypeGroup4 = null
          , BetTypeGroup5 = null;
        sKeeper_Sport[43].newHash = new Array;
        for (var ii = 1; ii < 10; ii++)
            sKeeper_Sport[43].newHash["MapCss" + ii] = "";
        sKeeper_Sport[43].newHash.HeadCss = "",
        "L" == sKeeper_Sport[43].Market && void 0 !== ajaxData.IsStartingSoon[0] && "False" == ajaxData.IsStartingSoon[0] && (sKeeper_Sport[43].newHash["MapCss" + ajaxData.LivePeriod[0]] = "inPlayAccentBg",
        Category_43 = Category_43.replace("{@MapCss" + ajaxData.LivePeriod[0] + "}", sKeeper_Sport[43].newHash["MapCss" + ajaxData.LivePeriod[0]]),
        Category[43] == ajaxData.LivePeriod[0] && (sKeeper_Sport[43].newHash.HeadCss = "inPlayAccentBg"));
        var SpecialMatchFrame = ""
          , SpecialMatchSpecialOdds = ""
          , SpecilaMatchHead = "";
        "L" == sKeeper_Sport[43].Market ? (SpecialMatchFrame = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreSpecialLeague43_L").innerHTML,
        SpecialMatchSpecialOdds = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("SpecialOdds43_FL").innerHTML,
        SpecilaMatchHead = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreSpecialEvent43_FL").innerHTML) : (SpecialMatchFrame = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreSpecialLeague43_D").innerHTML,
        SpecialMatchSpecialOdds = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("SpecialOdds43_FD").innerHTML,
        SpecilaMatchHead = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreSpecialEvent43_FD").innerHTML);
        var Tr_Cls = "";
        Tr_Cls = "L" == sKeeper_Sport[43].Market ? "liveligh" == Tr_Cls ? "live" : "liveligh" : "bgcpelight" == Tr_Cls ? "bgcpe" : "bgcpelight";
        var SpecialEvent = "", tmplEvent, FinaltmplEvent = "", newHash = new Array;
        if (newHash.LeagueName = "",
        newHash.HomeName = "",
        newHash.AwayName = "",
        newHash.Odds_1_H = "",
        newHash.Odds_1_A = "",
        newHash.Odds_1_H_Cls = "",
        newHash.Odds_1_A_Cls = "",
        newHash.Home_Cls = "",
        newHash.Away_Cls = "",
        newHash.Changed_1 = "",
        newHash.Goal_3 = "",
        newHash.UNDER_3 = "",
        newHash.OddsId_3 = "",
        newHash.Odds_3_O = "",
        newHash.Odds_3_U = "",
        newHash.Odds_3_O_Cls = "",
        newHash.Odds_U_O_Cls = "",
        newHash.Changed_3 = "",
        newHash.OddsId_20 = "",
        newHash.Odds_20_H = "",
        newHash.Odds_20_A = "",
        newHash.Odds_20_H_Cls = "",
        newHash.Odds_20_A_Cls = "",
        newHash.Changed_20 = "",
        newHash.HeadCss = sKeeper_Sport[43].newHash.HeadCss,
        void 0 !== ajaxData.B1_3_20_Match) {
            for (var tmplFrame = SpecialMatchFrame, s = 0; s < ajaxData.B1_3_20_Match.length; s++) {
                var sMatch = ajaxData.B1_3_20_Match[s];
                if (ajaxData.B1_3_20[sMatch][0] == Category[43]) {
                    var RowCountArray = new Array
                      , matchRowCount = 0
                      , hdpCount = 0
                      , ouCount = 0
                      , mlCount = 0;
                    void 0 !== ajaxData.B1_3_20[sMatch + "S1"] && (hdpCount = ajaxData.B1_3_20[sMatch + "S1"].length),
                    void 0 !== ajaxData.B1_3_20[sMatch + "S3"] && (ouCount = ajaxData.B1_3_20[sMatch + "S3"].length),
                    void 0 !== ajaxData.B1_3_20[sMatch + "S20"] && (mlCount = ajaxData.B1_3_20[sMatch + "S20"].length),
                    RowCountArray.push(hdpCount),
                    RowCountArray.push(ouCount),
                    RowCountArray.push(mlCount);
                    var compare = function(e, _) {
                        return e < _ ? 1 : e > _ ? -1 : 0
                    };
                    matchRowCount = RowCountArray.sort(compare)[0];
                    for (var mt = 0; mt < matchRowCount; mt++) {
                        if (tmplEvent = SpecialMatchSpecialOdds.replace(new RegExp("{@Tr_Cls}","g"), Tr_Cls),
                        newHash.LeagueName = ajaxData.B1_3_20[sMatch][2],
                        newHash.HomeName = ajaxData.B1_3_20[sMatch][3],
                        newHash.AwayName = ajaxData.B1_3_20[sMatch][4],
                        tmplEvent = tmplEvent.replace(new RegExp("{@MatchId}","g"), sMatch),
                        tmplEvent = tmplEvent.replace(new RegExp("{@HomeName}","g"), newHash.HomeName),
                        tmplEvent = tmplEvent.replace(new RegExp("{@AwayName}","g"), newHash.AwayName),
                        tmplEvent = tmplEvent.replace(new RegExp("{@isParlay}","g"), sKeeper_Sport[43].isParlay),
                        void 0 !== ajaxData.B1_3_20[sMatch + "S1"])
                            if (void 0 !== ajaxData.B1_3_20[ajaxData.B1_3_20[sMatch + "S1"][mt]]) {
                                if (newHash.OddsId_1 = ajaxData.B1_3_20[ajaxData.B1_3_20[sMatch + "S1"][mt]][0],
                                void 0 !== ajaxData.B1_3_20[ajaxData.B1_3_20[sMatch + "S1"][mt]]) {
                                    switch (newHash.Odds_1_H = ajaxData.B1_3_20[ajaxData.B1_3_20[sMatch + "S1"][mt]][2],
                                    newHash.Odds_1_A = ajaxData.B1_3_20[ajaxData.B1_3_20[sMatch + "S1"][mt]][3],
                                    newHash.Odds_1_H_Cls = getOddsClass(newHash.Odds_1_H),
                                    newHash.Odds_1_A_Cls = getOddsClass(newHash.Odds_1_A),
                                    ajaxData.B1_3_20[ajaxData.B1_3_20[sMatch + "S1"][mt]][4]) {
                                    case "h":
                                        newHash.Home_Cls = CLS_HDP_F,
                                        newHash.Away_Cls = CLS_HDP_N,
                                        newHash.Value_1_H = ajaxData.B1_3_20[ajaxData.B1_3_20[sMatch + "S1"][mt]][1],
                                        newHash.Value_1_A = "";
                                        break;
                                    case "a":
                                        newHash.Home_Cls = CLS_HDP_N,
                                        newHash.Away_Cls = CLS_HDP_F,
                                        newHash.Value_1_H = "",
                                        newHash.Value_1_A = ajaxData.B1_3_20[ajaxData.B1_3_20[sMatch + "S1"][mt]][1];
                                        break;
                                    default:
                                        newHash.Home_Cls = CLS_HDP_N,
                                        newHash.Away_Cls = CLS_HDP_N,
                                        "" != newHash.Odds_1_H ? newHash.Value_1_H = "0" : newHash.Value_1_H = "",
                                        newHash.Value_1_A = ""
                                    }
                                    var oObj = null;
                                    oObj = "L" == sKeeper_Sport[43].Market ? getMoreObj(OddsDataLObj, newHash.OddsId_1) : getMoreObj(OddsDataObj, newHash.OddsId_1),
                                    null != oObj && oObj.OddsId == newHash.OddsId_1 && (oObj.Odds_1_H != newHash.Odds_1_H || oObj.Odds_1_A != newHash.Odds_1_A ? newHash.Changed_1 = CLS_UPD : newHash.Changed_1 = ""),
                                    tmplEvent = tmplEvent.replace(new RegExp("{@Home_Cls}","g"), newHash.Home_Cls),
                                    tmplEvent = tmplEvent.replace(new RegExp("{@Away_Cls}","g"), newHash.Away_Cls),
                                    tmplEvent = tmplEvent.replace(new RegExp("{@OddsId_1}","g"), newHash.OddsId_1),
                                    tmplEvent = tmplEvent.replace(new RegExp("{@Odds_1_H_Cls}","g"), newHash.Odds_1_H_Cls),
                                    tmplEvent = tmplEvent.replace(new RegExp("{@Odds_1_A_Cls}","g"), newHash.Odds_1_A_Cls),
                                    tmplEvent = tmplEvent.replace(new RegExp("{@Value_1_H}","g"), newHash.Value_1_H),
                                    tmplEvent = tmplEvent.replace(new RegExp("{@Value_1_A}","g"), newHash.Value_1_A),
                                    tmplEvent = tmplEvent.replace(new RegExp("{@Odds_1_H}","g"), newHash.Odds_1_H),
                                    tmplEvent = tmplEvent.replace(new RegExp("{@Odds_1_A}","g"), newHash.Odds_1_A),
                                    tmplEvent = tmplEvent.replace(new RegExp("{@Changed_1}","g"), newHash.Changed_1);
                                    var Obj = new Object;
                                    Obj.OddsId = ajaxData.B1_3_20[sMatch + "S1"][mt],
                                    Obj.Value_1 = ajaxData.B1_3_20[ajaxData.B1_3_20[sMatch + "S1"][mt]][1],
                                    Obj.Odds_1_H = ajaxData.B1_3_20[ajaxData.B1_3_20[sMatch + "S1"][mt]][2],
                                    Obj.Odds_1_A = ajaxData.B1_3_20[ajaxData.B1_3_20[sMatch + "S1"][mt]][3],
                                    Obj.FavorF_1 = ajaxData.B1_3_20[ajaxData.B1_3_20[sMatch + "S1"][mt]][4],
                                    "L" == sKeeper_Sport[43].Market ? setMoreObj(OddsDataLObj, Obj) : setMoreObj(OddsDataObj, Obj)
                                }
                            } else
                                newHash.OddsId_1 = "",
                                newHash.Odds_1_H = "",
                                newHash.Odds_1_A = "",
                                newHash.Odds_1_H_Cls = "",
                                newHash.Odds_1_A_Cls = "",
                                newHash.Home_Cls = "",
                                newHash.Away_Cls = "",
                                newHash.Value_1_H = "",
                                newHash.Value_1_A = "",
                                newHash.Changed_1 = "",
                                newHash.Home_Cls = CLS_HDP_N,
                                newHash.Away_Cls = CLS_HDP_N,
                                tmplEvent = tmplEvent.replace(new RegExp("{@Home_Cls}","g"), newHash.Home_Cls),
                                tmplEvent = tmplEvent.replace(new RegExp("{@Away_Cls}","g"), newHash.Away_Cls),
                                tmplEvent = tmplEvent.replace(new RegExp("{@OddsId_1}","g"), newHash.OddsId_1),
                                tmplEvent = tmplEvent.replace(new RegExp("{@Odds_1_H_Cls}","g"), newHash.Odds_1_H_Cls),
                                tmplEvent = tmplEvent.replace(new RegExp("{@Odds_1_A_Cls}","g"), newHash.Odds_1_A_Cls),
                                tmplEvent = tmplEvent.replace(new RegExp("{@Value_1_H}","g"), newHash.Value_1_H),
                                tmplEvent = tmplEvent.replace(new RegExp("{@Value_1_A}","g"), newHash.Value_1_A),
                                tmplEvent = tmplEvent.replace(new RegExp("{@Odds_1_H}","g"), newHash.Odds_1_H),
                                tmplEvent = tmplEvent.replace(new RegExp("{@Odds_1_A}","g"), newHash.Odds_1_A),
                                tmplEvent = tmplEvent.replace(new RegExp("{@Changed_1}","g"), newHash.Changed_1);
                        else
                            newHash.OddsId_1 = "",
                            newHash.Odds_1_H = "",
                            newHash.Odds_1_A = "",
                            newHash.Odds_1_H_Cls = "",
                            newHash.Odds_1_A_Cls = "",
                            newHash.Home_Cls = "",
                            newHash.Away_Cls = "",
                            newHash.Value_1_H = "",
                            newHash.Value_1_A = "",
                            newHash.Changed_1 = "",
                            newHash.Home_Cls = CLS_HDP_N,
                            newHash.Away_Cls = CLS_HDP_N,
                            tmplEvent = tmplEvent.replace(new RegExp("{@Home_Cls}","g"), newHash.Home_Cls),
                            tmplEvent = tmplEvent.replace(new RegExp("{@Away_Cls}","g"), newHash.Away_Cls),
                            tmplEvent = tmplEvent.replace(new RegExp("{@OddsId_1}","g"), newHash.OddsId_1),
                            tmplEvent = tmplEvent.replace(new RegExp("{@Odds_1_H_Cls}","g"), newHash.Odds_1_H_Cls),
                            tmplEvent = tmplEvent.replace(new RegExp("{@Odds_1_A_Cls}","g"), newHash.Odds_1_A_Cls),
                            tmplEvent = tmplEvent.replace(new RegExp("{@Value_1_H}","g"), newHash.Value_1_H),
                            tmplEvent = tmplEvent.replace(new RegExp("{@Value_1_A}","g"), newHash.Value_1_A),
                            tmplEvent = tmplEvent.replace(new RegExp("{@Odds_1_H}","g"), newHash.Odds_1_H),
                            tmplEvent = tmplEvent.replace(new RegExp("{@Odds_1_A}","g"), newHash.Odds_1_A),
                            tmplEvent = tmplEvent.replace(new RegExp("{@Changed_1}","g"), newHash.Changed_1);
                        if (void 0 !== ajaxData.B1_3_20[sMatch + "S3"])
                            if (void 0 !== ajaxData.B1_3_20[ajaxData.B1_3_20[sMatch + "S3"][mt]]) {
                                if (newHash.OddsId_3 = ajaxData.B1_3_20[ajaxData.B1_3_20[sMatch + "S3"][mt]][0],
                                void 0 !== ajaxData.B1_3_20[ajaxData.B1_3_20[sMatch + "S3"][mt]]) {
                                    newHash.Odds_3_O = ajaxData.B1_3_20[ajaxData.B1_3_20[sMatch + "S3"][mt]][2],
                                    newHash.Odds_3_U = ajaxData.B1_3_20[ajaxData.B1_3_20[sMatch + "S3"][mt]][3],
                                    newHash.Goal_3 = ajaxData.B1_3_20[ajaxData.B1_3_20[sMatch + "S3"][mt]][1],
                                    newHash.UNDER_3 = "" == newHash.Goal_3 ? "" : RES_UNDER,
                                    newHash.Odds_3_O_Cls = getOddsClass(newHash.Odds_3_O),
                                    newHash.Odds_3_U_Cls = getOddsClass(newHash.Odds_3_U);
                                    var oObj = null;
                                    oObj = "L" == sKeeper_Sport[43].Market ? getMoreObj(OddsDataLObj, newHash.OddsId_3) : getMoreObj(OddsDataObj, newHash.OddsId_3),
                                    null != oObj && oObj.OddsId == newHash.OddsId_3 && (oObj.Odds_3_O != newHash.Odds_3_O || oObj.Odds_3_U != newHash.Odds_3_U ? newHash.Changed_3 = CLS_UPD : newHash.Changed_3 = ""),
                                    tmplEvent = tmplEvent.replace(new RegExp("{@Goal_3}","g"), newHash.Goal_3),
                                    tmplEvent = tmplEvent.replace(new RegExp("{@UNDER_3}","g"), newHash.UNDER_3),
                                    tmplEvent = tmplEvent.replace(new RegExp("{@OddsId_3}","g"), newHash.OddsId_3),
                                    tmplEvent = tmplEvent.replace(new RegExp("{@Odds_3_O}","g"), newHash.Odds_3_O),
                                    tmplEvent = tmplEvent.replace(new RegExp("{@Odds_3_U}","g"), newHash.Odds_3_U),
                                    tmplEvent = tmplEvent.replace(new RegExp("{@Odds_3_O_Cls}","g"), newHash.Odds_3_O_Cls),
                                    tmplEvent = tmplEvent.replace(new RegExp("{@Odds_3_U_Cls}","g"), newHash.Odds_3_U_Cls),
                                    tmplEvent = tmplEvent.replace(new RegExp("{@Changed_3}","g"), newHash.Changed_3);
                                    var Obj = new Object;
                                    Obj.OddsId = ajaxData.B1_3_20[sMatch + "S3"][mt],
                                    Obj.Goal_3 = ajaxData.B1_3_20[ajaxData.B1_3_20[sMatch + "S3"][mt]][1],
                                    Obj.Odds_3_O = ajaxData.B1_3_20[ajaxData.B1_3_20[sMatch + "S3"][mt]][2],
                                    Obj.Odds_3_U = ajaxData.B1_3_20[ajaxData.B1_3_20[sMatch + "S3"][mt]][3],
                                    "L" == sKeeper_Sport[43].Market ? setMoreObj(OddsDataLObj, Obj) : setMoreObj(OddsDataObj, Obj)
                                }
                            } else
                                newHash.OddsId_3 = "",
                                newHash.Odds_3_O = "",
                                newHash.Odds_3_U = "",
                                newHash.Goal_3 = "",
                                newHash.UNDER_3 = "",
                                newHash.Odds_3_O_Cls = "",
                                newHash.Odds_3_U_Cls = "",
                                newHash.Changed_3 = "",
                                tmplEvent = tmplEvent.replace(new RegExp("{@Goal_3}","g"), newHash.Goal_3),
                                tmplEvent = tmplEvent.replace(new RegExp("{@UNDER_3}","g"), newHash.UNDER_3),
                                tmplEvent = tmplEvent.replace(new RegExp("{@OddsId_3}","g"), newHash.OddsId_3),
                                tmplEvent = tmplEvent.replace(new RegExp("{@Odds_3_O}","g"), newHash.Odds_3_O),
                                tmplEvent = tmplEvent.replace(new RegExp("{@Odds_3_U}","g"), newHash.Odds_3_U),
                                tmplEvent = tmplEvent.replace(new RegExp("{@Odds_3_O_Cls}","g"), newHash.Odds_3_O_Cls),
                                tmplEvent = tmplEvent.replace(new RegExp("{@Odds_3_U_Cls}","g"), newHash.Odds_3_U_Cls),
                                tmplEvent = tmplEvent.replace(new RegExp("{@Changed_3}","g"), newHash.Changed_3);
                        else
                            newHash.OddsId_3 = "",
                            newHash.Odds_3_O = "",
                            newHash.Odds_3_U = "",
                            newHash.Goal_3 = "",
                            newHash.UNDER_3 = "",
                            newHash.Odds_3_O_Cls = "",
                            newHash.Odds_3_U_Cls = "",
                            newHash.Changed_3 = "",
                            tmplEvent = tmplEvent.replace(new RegExp("{@Goal_3}","g"), newHash.Goal_3),
                            tmplEvent = tmplEvent.replace(new RegExp("{@UNDER_3}","g"), newHash.UNDER_3),
                            tmplEvent = tmplEvent.replace(new RegExp("{@OddsId_3}","g"), newHash.OddsId_3),
                            tmplEvent = tmplEvent.replace(new RegExp("{@Odds_3_O}","g"), newHash.Odds_3_O),
                            tmplEvent = tmplEvent.replace(new RegExp("{@Odds_3_U}","g"), newHash.Odds_3_U),
                            tmplEvent = tmplEvent.replace(new RegExp("{@Odds_3_O_Cls}","g"), newHash.Odds_3_O_Cls),
                            tmplEvent = tmplEvent.replace(new RegExp("{@Odds_3_U_Cls}","g"), newHash.Odds_3_U_Cls),
                            tmplEvent = tmplEvent.replace(new RegExp("{@Changed_3}","g"), newHash.Changed_3);
                        if (void 0 !== ajaxData.B1_3_20[sMatch + "S20"])
                            if (void 0 !== ajaxData.B1_3_20[ajaxData.B1_3_20[sMatch + "S20"][mt]]) {
                                newHash.OddsId_20 = ajaxData.B1_3_20[ajaxData.B1_3_20[sMatch + "S20"][mt]][0],
                                newHash.Odds_20_H = ajaxData.B1_3_20[ajaxData.B1_3_20[sMatch + "S20"][mt]][1],
                                newHash.Odds_20_A = ajaxData.B1_3_20[ajaxData.B1_3_20[sMatch + "S20"][mt]][2],
                                newHash.Odds_20_H_Cls = getOddsClass(newHash.Odds_20_H),
                                newHash.Odds_20_A_Cls = getOddsClass(newHash.Odds_20_A);
                                var oObj = null;
                                oObj = "L" == sKeeper_Sport[43].Market ? getMoreObj(OddsDataLObj, newHash.OddsId_20) : getMoreObj(OddsDataObj, newHash.OddsId_20),
                                null != oObj && oObj.OddsId == newHash.OddsId_20 && (oObj.Odds_20_H != newHash.Odds_20_H || oObj.Odds_20_A != newHash.Odds_20_A ? newHash.Changed_20 = CLS_UPD : newHash.Changed_20 = ""),
                                tmplEvent = tmplEvent.replace(new RegExp("{@OddsId_20}","g"), newHash.OddsId_20),
                                tmplEvent = tmplEvent.replace(new RegExp("{@Odds_20_H}","g"), newHash.Odds_20_H),
                                tmplEvent = tmplEvent.replace(new RegExp("{@Odds_20_A}","g"), newHash.Odds_20_A),
                                tmplEvent = tmplEvent.replace(new RegExp("{@Odds_20_H_Cls}","g"), newHash.Odds_20_H_Cls),
                                tmplEvent = tmplEvent.replace(new RegExp("{@Odds_20_A_Cls}","g"), newHash.Odds_20_A_Cls),
                                tmplEvent = tmplEvent.replace(new RegExp("{@Changed_20}","g"), newHash.Changed_20);
                                var Obj = new Object;
                                Obj.OddsId = ajaxData.B1_3_20[sMatch + "S20"][mt],
                                Obj.Odds_20_H = ajaxData.B1_3_20[ajaxData.B1_3_20[sMatch + "S20"][mt]][1],
                                Obj.Odds_20_A = ajaxData.B1_3_20[ajaxData.B1_3_20[sMatch + "S20"][mt]][2],
                                "L" == sKeeper_Sport[43].Market ? setMoreObj(OddsDataLObj, Obj) : setMoreObj(OddsDataObj, Obj)
                            } else
                                newHash.OddsId_20 = "",
                                newHash.Odds_20_H = "",
                                newHash.Odds_20_A = "",
                                newHash.Odds_20_H_Cls = "",
                                newHash.Odds_20_A_Cls = "",
                                newHash.Changed_20 = "",
                                tmplEvent = tmplEvent.replace(new RegExp("{@OddsId_20}","g"), newHash.OddsId_20),
                                tmplEvent = tmplEvent.replace(new RegExp("{@Odds_20_H}","g"), newHash.Odds_20_H),
                                tmplEvent = tmplEvent.replace(new RegExp("{@Odds_20_A}","g"), newHash.Odds_20_A),
                                tmplEvent = tmplEvent.replace(new RegExp("{@Odds_20_H_Cls}","g"), newHash.Odds_20_H_Cls),
                                tmplEvent = tmplEvent.replace(new RegExp("{@Odds_20_A_Cls}","g"), newHash.Odds_20_A_Cls),
                                tmplEvent = tmplEvent.replace(new RegExp("{@Changed_20}","g"), newHash.Changed_20);
                        else
                            newHash.OddsId_20 = "",
                            newHash.Odds_20_H = "",
                            newHash.Odds_20_A = "",
                            newHash.Odds_20_H_Cls = "",
                            newHash.Odds_20_A_Cls = "",
                            newHash.Changed_20 = "",
                            tmplEvent = tmplEvent.replace(new RegExp("{@OddsId_20}","g"), newHash.OddsId_20),
                            tmplEvent = tmplEvent.replace(new RegExp("{@Odds_20_H}","g"), newHash.Odds_20_H),
                            tmplEvent = tmplEvent.replace(new RegExp("{@Odds_20_A}","g"), newHash.Odds_20_A),
                            tmplEvent = tmplEvent.replace(new RegExp("{@Odds_20_H_Cls}","g"), newHash.Odds_20_H_Cls),
                            tmplEvent = tmplEvent.replace(new RegExp("{@Odds_20_A_Cls}","g"), newHash.Odds_20_A_Cls),
                            tmplEvent = tmplEvent.replace(new RegExp("{@Changed_20}","g"), newHash.Changed_20);
                        FinaltmplEvent += tmplEvent
                    }
                }
            }
            "" != newHash.LeagueName ? (tmplFrame = tmplFrame.replace(new RegExp("LeagueName","g"), newHash.LeagueName),
            tmplFrame = tmplFrame.replace(new RegExp("{@HeadCss}","g"), newHash.HeadCss),
            tmplFrame = tmplFrame.replace(new RegExp("\x3c!--moreSpecialEvent43_FD--\x3e","g"), SpecilaMatchHead),
            tmplFrame = tmplFrame.replace(new RegExp("\x3c!--SpecialOdds43_FD--\x3e","g"), FinaltmplEvent),
            SpecialEvent = tmplFrame) : SpecialEvent = ""
        }
        switch (ajaxData.LeagueGroup[0]) {
        case "1":
            BetTypeGroup1 = Dota2BetTypeGroup1,
            BetTypeGroup2 = Dota2BetTypeGroup2,
            BetTypeGroup3 = Dota2BetTypeGroup3,
            BetTypeGroup4 = Dota2BetTypeGroup4,
            sKeeper_Sport[43].newHash.GroupType01 = RES_Dota2GroupType1.replace("{0}", RES_Map[Category[43] - 1]),
            sKeeper_Sport[43].newHash.GroupType02 = RES_Dota2GroupType2.replace("{0}", RES_Map[Category[43] - 1]),
            sKeeper_Sport[43].newHash.GroupType03 = RES_Dota2GroupType3.replace("{0}", RES_Map[Category[43] - 1]),
            sKeeper_Sport[43].newHash.GroupType04 = RES_Dota2GroupType4.replace("{0}", RES_Map[Category[43] - 1]);
            break;
        case "2":
            BetTypeGroup1 = LoLBetTypeGroup1,
            BetTypeGroup2 = LoLBetTypeGroup2,
            BetTypeGroup3 = LoLBetTypeGroup3,
            BetTypeGroup4 = LoLBetTypeGroup4,
            BetTypeGroup5 = LoLBetTypeGroup5,
            sKeeper_Sport[43].newHash.GroupType01 = RES_LoLGroupType1.replace("{0}", RES_Map[Category[43] - 1]),
            sKeeper_Sport[43].newHash.GroupType02 = RES_LoLGroupType2.replace("{0}", RES_Map[Category[43] - 1]),
            sKeeper_Sport[43].newHash.GroupType03 = RES_LoLGroupType3.replace("{0}", RES_Map[Category[43] - 1]),
            sKeeper_Sport[43].newHash.GroupType04 = RES_LoLGroupType4.replace("{0}", RES_Map[Category[43] - 1]),
            sKeeper_Sport[43].newHash.GroupType05 = RES_LoLGroupType5.replace("{0}", RES_Map[Category[43] - 1]);
            break;
        case "3":
            BetTypeGroup1 = CSgoBetTypeGroup1,
            BetTypeGroup2 = CSgoBetTypeGroup2,
            BetTypeGroup3 = CSgoBetTypeGroup3,
            sKeeper_Sport[43].newHash.GroupType01 = RES_CSgoGroupType1.replace("{0}", RES_Map[Category[43] - 1]),
            sKeeper_Sport[43].newHash.GroupType02 = RES_CSgoGroupType2.replace("{0}", RES_Map[Category[43] - 1]),
            sKeeper_Sport[43].newHash.GroupType03 = RES_CSgoGroupType3.replace("{0}", RES_Map[Category[43] - 1]);
            break;
        case "4":
            BetTypeGroup1 = KoGBetTypeGroup1,
            BetTypeGroup2 = KoGBetTypeGroup2,
            BetTypeGroup3 = KoGBetTypeGroup3,
            BetTypeGroup4 = KoGBetTypeGroup4,
            sKeeper_Sport[43].newHash.GroupType01 = RES_KoGGroupType1.replace("{0}", RES_Map[Category[43] - 1]),
            sKeeper_Sport[43].newHash.GroupType02 = RES_KoGGroupType2.replace("{0}", RES_Map[Category[43] - 1]),
            sKeeper_Sport[43].newHash.GroupType03 = RES_KoGGroupType3.replace("{0}", RES_Map[Category[43] - 1]),
            sKeeper_Sport[43].newHash.GroupType04 = RES_KoGGroupType4.replace("{0}", RES_Map[Category[43] - 1])
        }
        void 0 !== MoreTmplList[43][430101] && "" != MoreTmplList[43][430101] || (MoreTmplList[43][430101] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreEvent_430101").innerHTML),
        void 0 !== MoreTmplList[43][430102] && "" != MoreTmplList[43][430102] || (MoreTmplList[43][430102] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreEvent_430102").innerHTML),
        void 0 !== MoreTmplList[43][430103] && "" != MoreTmplList[43][430103] || (MoreTmplList[43][430103] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreEvent_430103").innerHTML),
        void 0 !== MoreTmplList[43][430104] && "" != MoreTmplList[43][430101] || (MoreTmplList[43][430104] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreEvent_430104").innerHTML),
        void 0 !== MoreTmplList[43][430201] && "" != MoreTmplList[43][430201] || (MoreTmplList[43][430201] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreEvent_430201").innerHTML),
        void 0 !== MoreTmplList[43][430202] && "" != MoreTmplList[43][430202] || (MoreTmplList[43][430202] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreEvent_430202").innerHTML),
        void 0 !== MoreTmplList[43][430203] && "" != MoreTmplList[43][430203] || (MoreTmplList[43][430203] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreEvent_430203").innerHTML),
        void 0 !== MoreTmplList[43][430204] && "" != MoreTmplList[43][430204] || (MoreTmplList[43][430204] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreEvent_430204").innerHTML),
        void 0 !== MoreTmplList[43][430205] && "" != MoreTmplList[43][430205] || (MoreTmplList[43][430205] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreEvent_430205").innerHTML),
        void 0 !== MoreTmplList[43][430301] && "" != MoreTmplList[43][430301] || (MoreTmplList[43][430301] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreEvent_430301").innerHTML),
        void 0 !== MoreTmplList[43][430302] && "" != MoreTmplList[43][430302] || (MoreTmplList[43][430302] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreEvent_430302").innerHTML),
        void 0 !== MoreTmplList[43][4303031] && "" != MoreTmplList[43][4303031] || (MoreTmplList[43][4303031] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreEvent_4303031").innerHTML),
        void 0 !== MoreTmplList[43][430303] && "" != MoreTmplList[43][430303] || (MoreTmplList[43][430303] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreEvent_430303").innerHTML),
        void 0 !== MoreTmplList[43][430401] && "" != MoreTmplList[43][430401] || (MoreTmplList[43][430401] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreEvent_430401").innerHTML),
        void 0 !== MoreTmplList[43][430402] && "" != MoreTmplList[43][430402] || (MoreTmplList[43][430402] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreEvent_430402").innerHTML),
        void 0 !== MoreTmplList[43][430403] && "" != MoreTmplList[43][430403] || (MoreTmplList[43][430403] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreEvent_430403").innerHTML),
        void 0 !== MoreTmplList[43][430404] && "" != MoreTmplList[43][430404] || (MoreTmplList[43][430404] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreEvent_430404").innerHTML);
        var Map = []
          , GroupOfMap = null
          , Group = null
          , bettypeOfGroup = null
          , Bettype = ""
          , MoreHeadTmpl = ""
          , MoreTmpl = ""
          , subMoreTmpl = ""
          , FinalsubMoreTmpl = ""
          , FinalTmpl = "";
        if ("undefined" != ajaxData[Category[43]] && null != ajaxData[Category[43]]) {
            sKeeper_Sport[43].newHash.isParlay = sKeeper_Sport[43].isParlay,
            "L" == sKeeper_Sport[43].Market ? sKeeper_Sport[43].newHash.LorD = "liveligh" : sKeeper_Sport[43].newHash.LorD = "bgcpe",
            Map = ajaxData[Category[43]];
            for (var m = 0; m < Map.length; m++)
                if (void 0 !== Map[m] && "" != (GroupOfMap = Map[m])) {
                    switch (Group = GroupOfMap.substring(2, 4)) {
                    case "G1":
                        bettypeOfGroup = BetTypeGroup1;
                        break;
                    case "G2":
                        bettypeOfGroup = BetTypeGroup2;
                        break;
                    case "G3":
                        bettypeOfGroup = BetTypeGroup3;
                        break;
                    case "G4":
                        bettypeOfGroup = BetTypeGroup4;
                        break;
                    default:
                        bettypeOfGroup = BetTypeGroup5
                    }
                    var tmplid = "430" + ajaxData.LeagueGroup[0] + "0" + GroupOfMap.substring(3, 4);
                    MoreHeadTmpl = MoreTmplList[43][4303031],
                    MoreTmpl = MoreTmplList[43][tmplid];
                    for (var i = 1; i < 43; i++) {
                        var res_hint = "0";
                        res_hint = i < 10 ? "0" + i : i,
                        sKeeper_Sport[43].newHash["BetType9068_" + i] = getBetTypeName("9068", i).replace("{0}", i),
                        sKeeper_Sport[43].newHash["BetTypeHint9068_0" + Category[43] + res_hint] = getBetTypeHint("9068", "0" + Category[43] + res_hint),
                        sKeeper_Sport[43].newHash["BetTypeHint9072_0" + Category[43] + res_hint] = getBetTypeHint("9072", "0" + Category[43] + res_hint),
                        sKeeper_Sport[43].newHash["BetTypeHint9073_0" + Category[43] + res_hint] = getBetTypeHint("9073", "0" + Category[43] + res_hint),
                        sKeeper_Sport[43].newHash["BetTypeHint9077_0" + Category[43] + res_hint] = getBetTypeHint("9077", "0" + Category[43] + res_hint),
                        sKeeper_Sport[43].newHash["BetTypeHint9070_0" + Category[43] + res_hint] = getBetTypeHint("9070", "0" + Category[43] + res_hint),
                        sKeeper_Sport[43].newHash["BetTypeHint9071_0" + Category[43] + res_hint] = getBetTypeHint("9071", "0" + Category[43] + res_hint)
                    }
                    if (sKeeper_Sport[43].newHash.BetType9072 = getBetTypeName("9072"),
                    sKeeper_Sport[43].newHash.BetType9073 = getBetTypeName("9073"),
                    sKeeper_Sport[43].newHash.BetType9077 = getBetTypeName("9077"),
                    sKeeper_Sport[43].newHash.BetType9070 = getBetTypeName("9070"),
                    sKeeper_Sport[43].newHash.BetType9071 = getBetTypeName("9071"),
                    "3" == ajaxData.LeagueGroup[0] && "G3" == Group) {
                        for (var ckbettypelist = new Array, ck = 0; ck < ajaxData[GroupOfMap].length; ck++)
                            "9068" != ajaxData[ajaxData[GroupOfMap][ck]][3] && ckbettypelist.indexOf(ajaxData[ajaxData[GroupOfMap][ck]][3]) < 0 && ckbettypelist.push(ajaxData[ajaxData[GroupOfMap][ck]][3]);
                        var bettypelist = new Array;
                        if (ckbettypelist.length > 0) {
                            if (void 0 !== ajaxData[GroupOfMap])
                                for (var i = 0; i < ajaxData[GroupOfMap].length; i++)
                                    bettypelist.indexOf(ajaxData[ajaxData[GroupOfMap][i]][1]) < 0 && bettypelist.push(ajaxData[ajaxData[GroupOfMap][i]][1]);
                            bettypelist = bettypelist.sort();
                            for (var j = 0; j < bettypelist.length; j++) {
                                subMoreTmpl += MoreTmpl,
                                subMoreTmpl = subMoreTmpl.replace(new RegExp("{@Groupid}","g"), "{@Groupid_" + GroupOfMap + j + "}"),
                                void 0 !== ajaxData["9068_" + bettypelist[j]] ? (subMoreTmpl = subMoreTmpl.replace(new RegExp("{@B9068_CLS}","g"), "{@B9068_" + ajaxData["9068_" + bettypelist[j]][1] + "_CLS}"),
                                subMoreTmpl = subMoreTmpl.replace(new RegExp("{@BetType9068}","g"), "{@BetType9068_" + parseInt(ajaxData["9068_" + bettypelist[j]][1].substring(2, 4), 10) + "}"),
                                subMoreTmpl = subMoreTmpl.replace(new RegExp("{@BetTypeHint9068}","g"), "{@BetTypeHint9068_" + ajaxData["9068_" + bettypelist[j]][1] + "}")) : (subMoreTmpl = subMoreTmpl.replace(new RegExp("{@B9068_CLS}","g"), "{@B9068_" + bettypelist[j] + "_CLS}"),
                                subMoreTmpl = subMoreTmpl.replace(new RegExp("{@BetType9068}","g"), "{@BetType9068_" + parseInt(bettypelist[j].substring(2, 4), 10) + "}"),
                                subMoreTmpl = subMoreTmpl.replace(new RegExp("{@BetTypeHint9068}","g"), "{@BetTypeHint9068_" + bettypelist[j] + "}")),
                                void 0 !== ajaxData["9072_" + bettypelist[j]] ? (subMoreTmpl = subMoreTmpl.replace(new RegExp("{@B9072_CLS}","g"), "{@B9072_" + ajaxData["9072_" + bettypelist[j]][1] + "_CLS}"),
                                subMoreTmpl = subMoreTmpl.replace(new RegExp("{@BetTypeHint9072}","g"), "{@BetTypeHint9072_" + ajaxData["9072_" + bettypelist[j]][1] + "}")) : (subMoreTmpl = subMoreTmpl.replace(new RegExp("{@B9072_CLS}","g"), "{@B9072_" + bettypelist[j] + "_CLS}"),
                                subMoreTmpl = subMoreTmpl.replace(new RegExp("{@BetTypeHint9072}","g"), "{@BetTypeHint9072_" + bettypelist[j] + "}")),
                                void 0 !== ajaxData["9073_" + bettypelist[j]] ? (subMoreTmpl = subMoreTmpl.replace(new RegExp("{@B9073_CLS}","g"), "{@B9073_" + ajaxData["9073_" + bettypelist[j]][1] + "_CLS}"),
                                subMoreTmpl = subMoreTmpl.replace(new RegExp("{@BetTypeHint9073}","g"), "{@BetTypeHint9073_" + ajaxData["9073_" + bettypelist[j]][1] + "}")) : (subMoreTmpl = subMoreTmpl.replace(new RegExp("{@B9073_CLS}","g"), "{@B9073_" + bettypelist[j] + "_CLS}"),
                                subMoreTmpl = subMoreTmpl.replace(new RegExp("{@BetTypeHint9073}","g"), "{@BetTypeHint9073_" + bettypelist[j] + "}")),
                                void 0 !== ajaxData["9077_" + bettypelist[j]] ? (subMoreTmpl = subMoreTmpl.replace(new RegExp("{@B9077_CLS}","g"), "{@B9077_" + ajaxData["9077_" + bettypelist[j]][1] + "_CLS}"),
                                subMoreTmpl = subMoreTmpl.replace(new RegExp("{@BetTypeHint9077}","g"), "{@BetTypeHint9077_" + ajaxData["9077_" + bettypelist[j]][1] + "}")) : (subMoreTmpl = subMoreTmpl.replace(new RegExp("{@B9077_CLS}","g"), "{@B9077_" + bettypelist[j] + "_CLS}"),
                                subMoreTmpl = subMoreTmpl.replace(new RegExp("{@BetTypeHint9077}","g"), "{@BetTypeHint9077_" + bettypelist[j] + "}")),
                                void 0 !== ajaxData["9070_" + bettypelist[j]] ? (subMoreTmpl = subMoreTmpl.replace(new RegExp("{@B9070_CLS}","g"), "{@B9070_" + ajaxData["9070_" + bettypelist[j]][1] + "_CLS}"),
                                subMoreTmpl = subMoreTmpl.replace(new RegExp("{@BetTypeHint9070}","g"), "{@BetTypeHint9070_" + ajaxData["9070_" + bettypelist[j]][1] + "}")) : (subMoreTmpl = subMoreTmpl.replace(new RegExp("{@B9070_CLS}","g"), "{@B9070_" + bettypelist[j] + "_CLS}"),
                                subMoreTmpl = subMoreTmpl.replace(new RegExp("{@BetTypeHint9070}","g"), "{@BetTypeHint9070_" + bettypelist[j] + "}")),
                                void 0 !== ajaxData["9071_" + bettypelist[j]] ? (subMoreTmpl = subMoreTmpl.replace(new RegExp("{@B9071_CLS}","g"), "{@B9071_" + ajaxData["9071_" + bettypelist[j]][1] + "_CLS}"),
                                subMoreTmpl = subMoreTmpl.replace(new RegExp("{@BetTypeHint9071}","g"), "{@BetTypeHint9071_" + ajaxData["9071_" + bettypelist[j]][1] + "}")) : (subMoreTmpl = subMoreTmpl.replace(new RegExp("{@B9071_CLS}","g"), "{@B9071_" + bettypelist[j] + "_CLS}"),
                                subMoreTmpl = subMoreTmpl.replace(new RegExp("{@BetTypeHint9071}","g"), "{@BetTypeHint9071_" + bettypelist[j] + "}"));
                                for (var btl = 0; btl < bettypeOfGroup.length; btl++)
                                    switch (subMoreTmpl = subMoreTmpl.replace(new RegExp("{@OddsId_" + bettypeOfGroup[btl] + "}","g"), "{@OddsId_" + bettypeOfGroup[btl] + "_" + bettypelist[j] + "}"),
                                    subMoreTmpl = subMoreTmpl.replace(new RegExp("{@Changed_" + bettypeOfGroup[btl] + "}","g"), "{@Changed_" + bettypeOfGroup[btl] + "_" + bettypelist[j] + "}"),
                                    bettypeOfGroup[btl]) {
                                    case "9070":
                                        subMoreTmpl = subMoreTmpl.replace(new RegExp("{@Goal_" + bettypeOfGroup[btl] + "}","g"), "{@Goal_" + bettypeOfGroup[btl] + "_" + bettypelist[j] + "}"),
                                        subMoreTmpl = subMoreTmpl.replace(new RegExp("{@UNDER_" + bettypeOfGroup[btl] + "}","g"), "{@UNDER_" + bettypeOfGroup[btl] + "_" + bettypelist[j] + "}"),
                                        subMoreTmpl = subMoreTmpl.replace(new RegExp("{@Odds_" + bettypeOfGroup[btl] + "_H}","g"), "{@Odds_" + bettypeOfGroup[btl] + "_" + bettypelist[j] + "_H}"),
                                        subMoreTmpl = subMoreTmpl.replace(new RegExp("{@Odds_" + bettypeOfGroup[btl] + "_A}","g"), "{@Odds_" + bettypeOfGroup[btl] + "_" + bettypelist[j] + "_A}"),
                                        subMoreTmpl = subMoreTmpl.replace(new RegExp("{@Odds_" + bettypeOfGroup[btl] + "_H_Cls}","g"), "{@Odds_" + bettypeOfGroup[btl] + "_" + bettypelist[j] + "_H_Cls}"),
                                        subMoreTmpl = subMoreTmpl.replace(new RegExp("{@Odds_" + bettypeOfGroup[btl] + "_A_Cls}","g"), "{@Odds_" + bettypeOfGroup[btl] + "_" + bettypelist[j] + "_A_Cls}");
                                        break;
                                    case "9071":
                                        subMoreTmpl = subMoreTmpl.replace(new RegExp("{@ODD_" + bettypeOfGroup[btl] + "}","g"), "{@ODD_" + bettypeOfGroup[btl] + "_" + bettypelist[j] + "}"),
                                        subMoreTmpl = subMoreTmpl.replace(new RegExp("{@EVEN_" + bettypeOfGroup[btl] + "}","g"), "{@EVEN_" + bettypeOfGroup[btl] + "_" + bettypelist[j] + "}"),
                                        subMoreTmpl = subMoreTmpl.replace(new RegExp("{@Odds_" + bettypeOfGroup[btl] + "_O}","g"), "{@Odds_" + bettypeOfGroup[btl] + "_" + bettypelist[j] + "_O}"),
                                        subMoreTmpl = subMoreTmpl.replace(new RegExp("{@Odds_" + bettypeOfGroup[btl] + "_E}","g"), "{@Odds_" + bettypeOfGroup[btl] + "_" + bettypelist[j] + "_E}"),
                                        subMoreTmpl = subMoreTmpl.replace(new RegExp("{@Odds_" + bettypeOfGroup[btl] + "_O_Cls}","g"), "{@Odds_" + bettypeOfGroup[btl] + "_" + bettypelist[j] + "_O_Cls}"),
                                        subMoreTmpl = subMoreTmpl.replace(new RegExp("{@Odds_" + bettypeOfGroup[btl] + "_E_Cls}","g"), "{@Odds_" + bettypeOfGroup[btl] + "_" + bettypelist[j] + "_E_Cls}");
                                        break;
                                    case "9073":
                                        subMoreTmpl = subMoreTmpl.replace(new RegExp("{@POP_" + bettypeOfGroup[btl] + "_HY}","g"), "{@POP_" + bettypeOfGroup[btl] + "_" + bettypelist[j] + "_HY}"),
                                        subMoreTmpl = subMoreTmpl.replace(new RegExp("{@POP_" + bettypeOfGroup[btl] + "_HN}","g"), "{@POP_" + bettypeOfGroup[btl] + "_" + bettypelist[j] + "_HN}"),
                                        subMoreTmpl = subMoreTmpl.replace(new RegExp("{@Odds_" + bettypeOfGroup[btl] + "_H}","g"), "{@Odds_" + bettypeOfGroup[btl] + "_" + bettypelist[j] + "_H}"),
                                        subMoreTmpl = subMoreTmpl.replace(new RegExp("{@Odds_" + bettypeOfGroup[btl] + "_A}","g"), "{@Odds_" + bettypeOfGroup[btl] + "_" + bettypelist[j] + "_A}"),
                                        subMoreTmpl = subMoreTmpl.replace(new RegExp("{@Odds_" + bettypeOfGroup[btl] + "_H_Cls}","g"), "{@Odds_" + bettypeOfGroup[btl] + "_" + bettypelist[j] + "_H_Cls}"),
                                        subMoreTmpl = subMoreTmpl.replace(new RegExp("{@Odds_" + bettypeOfGroup[btl] + "_A_Cls}","g"), "{@Odds_" + bettypeOfGroup[btl] + "_" + bettypelist[j] + "_A_Cls}");
                                    case "9077":
                                        subMoreTmpl = subMoreTmpl.replace(new RegExp("{@Value_" + bettypeOfGroup[btl] + "_H}","g"), "{@Value_" + bettypeOfGroup[btl] + "_" + bettypelist[j] + "_H}"),
                                        subMoreTmpl = subMoreTmpl.replace(new RegExp("{@Value_" + bettypeOfGroup[btl] + "_A}","g"), "{@Value_" + bettypeOfGroup[btl] + "_" + bettypelist[j] + "_A}"),
                                        subMoreTmpl = subMoreTmpl.replace(new RegExp("{@Odds_" + bettypeOfGroup[btl] + "_H}","g"), "{@Odds_" + bettypeOfGroup[btl] + "_" + bettypelist[j] + "_H}"),
                                        subMoreTmpl = subMoreTmpl.replace(new RegExp("{@Odds_" + bettypeOfGroup[btl] + "_A}","g"), "{@Odds_" + bettypeOfGroup[btl] + "_" + bettypelist[j] + "_A}"),
                                        subMoreTmpl = subMoreTmpl.replace(new RegExp("{@Odds_" + bettypeOfGroup[btl] + "_H_Cls}","g"), "{@Odds_" + bettypeOfGroup[btl] + "_" + bettypelist[j] + "_H_Cls}"),
                                        subMoreTmpl = subMoreTmpl.replace(new RegExp("{@Odds_" + bettypeOfGroup[btl] + "_A_Cls}","g"), "{@Odds_" + bettypeOfGroup[btl] + "_" + bettypelist[j] + "_A_Cls}");
                                        break;
                                    default:
                                        subMoreTmpl = subMoreTmpl.replace(new RegExp("{@Odds_" + bettypeOfGroup[btl] + "_H}","g"), "{@Odds_" + bettypeOfGroup[btl] + "_" + bettypelist[j] + "_H}"),
                                        subMoreTmpl = subMoreTmpl.replace(new RegExp("{@Odds_" + bettypeOfGroup[btl] + "_A}","g"), "{@Odds_" + bettypeOfGroup[btl] + "_" + bettypelist[j] + "_A}"),
                                        subMoreTmpl = subMoreTmpl.replace(new RegExp("{@Odds_" + bettypeOfGroup[btl] + "_H_Cls}","g"), "{@Odds_" + bettypeOfGroup[btl] + "_" + bettypelist[j] + "_H_Cls}"),
                                        subMoreTmpl = subMoreTmpl.replace(new RegExp("{@Odds_" + bettypeOfGroup[btl] + "_A_Cls}","g"), "{@Odds_" + bettypeOfGroup[btl] + "_" + bettypelist[j] + "_A_Cls}")
                                    }
                            }
                            MoreTmpl = subMoreTmpl,
                            MoreTmpl = MoreHeadTmpl.replace(new RegExp("\x3c!--GroupBetTypeContent--\x3e","g"), MoreTmpl)
                        } else
                            MoreTmpl = "";
                        for (var bg = 0; bg < ajaxData[GroupOfMap].length; bg++) {
                            var Orgbettype = ajaxData[GroupOfMap][bg].substring(0, 4)
                              , bettype = ajaxData[GroupOfMap][bg];
                            if (null != ajaxData[bettype]) {
                                switch (sKeeper_Sport[43].newHash["Groupid_" + GroupOfMap + bg] = ajaxData[GroupOfMap][bg],
                                sKeeper_Sport[43].newHash["OddsId_" + bettype] = ajaxData[bettype][4],
                                "L" == sKeeper_Sport[43].Market && void 0 !== ajaxData.IsStartingSoon[0] && "False" == ajaxData.IsStartingSoon[0] && Category[43] == ajaxData.LivePeriod[0] && (sKeeper_Sport[43].newHash["B" + bettype + "_CLS"] = "current"),
                                ajaxData[bettype][3]) {
                                case "9070":
                                    sKeeper_Sport[43].newHash["UNDER_" + bettype] = "",
                                    "" != ajaxData[bettype][4] && (sKeeper_Sport[43].newHash["UNDER_" + bettype] = "" == ajaxData[bettype][5] ? "" : RES_UNDER),
                                    sKeeper_Sport[43].newHash["Goal_" + bettype] = ajaxData[bettype][5],
                                    sKeeper_Sport[43].newHash["Odds_" + bettype + "_H"] = ajaxData[bettype][6],
                                    sKeeper_Sport[43].newHash["Odds_" + bettype + "_A"] = ajaxData[bettype][7],
                                    sKeeper_Sport[43].newHash["Odds_" + bettype + "_H_Cls"] = getOddsClass(ajaxData[bettype][6]),
                                    sKeeper_Sport[43].newHash["Odds_" + bettype + "_A_Cls"] = getOddsClass(ajaxData[bettype][7]);
                                    break;
                                case "9071":
                                    sKeeper_Sport[43].newHash["Odds_" + bettype + "_O"] = ajaxData[bettype][5],
                                    sKeeper_Sport[43].newHash["Odds_" + bettype + "_E"] = ajaxData[bettype][6],
                                    sKeeper_Sport[43].newHash["Odds_" + bettype + "_O_Cls"] = getOddsClass(ajaxData[bettype][5]),
                                    sKeeper_Sport[43].newHash["Odds_" + bettype + "_E_Cls"] = getOddsClass(ajaxData[bettype][6]),
                                    sKeeper_Sport[43].newHash["ODD_" + bettype] = "",
                                    sKeeper_Sport[43].newHash["EVEN_" + bettype] = "",
                                    "" != ajaxData[bettype][4] && "" != ajaxData[bettype][6] && (sKeeper_Sport[43].newHash["ODD_" + bettype] = RES_ODD,
                                    sKeeper_Sport[43].newHash["EVEN_" + bettype] = RES_EVEN);
                                    break;
                                case "9073":
                                    "" != ajaxData[bettype][5] ? (sKeeper_Sport[43].newHash["POP_" + bettype + "_HY"] = RES_POP_HY,
                                    sKeeper_Sport[43].newHash["POP_" + bettype + "_HN"] = RES_POP_HN) : (sKeeper_Sport[43].newHash["POP_" + bettype + "_HY"] = "",
                                    sKeeper_Sport[43].newHash["POP_" + bettype + "_HN"] = ""),
                                    sKeeper_Sport[43].newHash["Odds_" + bettype + "_H"] = ajaxData[bettype][5],
                                    sKeeper_Sport[43].newHash["Odds_" + bettype + "_A"] = ajaxData[bettype][6],
                                    sKeeper_Sport[43].newHash["Odds_" + bettype + "_H_Cls"] = getOddsClass(ajaxData[bettype][5]),
                                    sKeeper_Sport[43].newHash["Odds_" + bettype + "_A_Cls"] = getOddsClass(ajaxData[bettype][6]);
                                    break;
                                case "9077":
                                    switch (ajaxData[bettype][8]) {
                                    case "h":
                                        sKeeper_Sport[43].newHash["Value_" + bettype + "_H"] = ajaxData[bettype][5],
                                        sKeeper_Sport[43].newHash["Value_" + bettype + "_A"] = "";
                                        break;
                                    case "a":
                                        sKeeper_Sport[43].newHash["Value_" + bettype + "_H"] = "",
                                        sKeeper_Sport[43].newHash["Value_" + bettype + "_A"] = ajaxData[bettype][5];
                                        break;
                                    default:
                                        "" != ajaxData[bettype][6] ? sKeeper_Sport[43].newHash["Value_" + bettype + "_H"] = "0" : sKeeper_Sport[43].newHash["Value_" + bettype + "_H"] = "",
                                        sKeeper_Sport[43].newHash["Value_" + bettype + "_A"] = ""
                                    }
                                    sKeeper_Sport[43].newHash["Odds_" + bettype + "_H"] = ajaxData[bettype][6],
                                    sKeeper_Sport[43].newHash["Odds_" + bettype + "_A"] = ajaxData[bettype][7],
                                    sKeeper_Sport[43].newHash["Odds_" + bettype + "_H_Cls"] = getOddsClass(ajaxData[bettype][6]),
                                    sKeeper_Sport[43].newHash["Odds_" + bettype + "_A_Cls"] = getOddsClass(ajaxData[bettype][7]);
                                    break;
                                default:
                                    sKeeper_Sport[43].newHash["Odds_" + bettype + "_H"] = ajaxData[bettype][5],
                                    sKeeper_Sport[43].newHash["Odds_" + bettype + "_A"] = ajaxData[bettype][6],
                                    sKeeper_Sport[43].newHash["Odds_" + bettype + "_H_Cls"] = getOddsClass(ajaxData[bettype][5]),
                                    sKeeper_Sport[43].newHash["Odds_" + bettype + "_A_Cls"] = getOddsClass(ajaxData[bettype][6])
                                }
                                void 0 !== oajaxData[43][bettype] && (oajaxData[43][bettype].toString() != ajaxData[bettype].toString() ? sKeeper_Sport[43].newHash["Changed_" + bettype] = CLS_UPD : sKeeper_Sport[43].newHash["Changed_" + bettype] = "")
                            }
                        }
                    } else
                        for (var i = 0; i < ajaxData[GroupOfMap].length; i++) {
                            sKeeper_Sport[43].newHash.Groupid = ajaxData[GroupOfMap][i];
                            for (var b1 = 0; b1 < bettypeOfGroup.length; b1++) {
                                var bettype = "";
                                switch (bettypeOfGroup[b1]) {
                                case "9007":
                                    var res = "05";
                                    if ("1" == ajaxData.LeagueGroup[0] && (res = "10"),
                                    bettype = bettypeOfGroup[b1] + "_0" + Category[43] + res,
                                    void 0 !== ajaxData[bettype]) {
                                        var position = parseInt(ajaxData[bettype][1].substring(2, 4));
                                        sKeeper_Sport[43].newHash["BetType" + ajaxData[bettype][3]] = getBetTypeName(ajaxData[bettype][3]).replace("{0}", position),
                                        sKeeper_Sport[43].newHash["BetTypeHint" + ajaxData[bettype][3]] = getBetTypeHint(ajaxData[bettype][3], ajaxData[bettype][1])
                                    } else
                                        sKeeper_Sport[43].newHash["BetType" + bettypeOfGroup[b1]] = getBetTypeName(bettypeOfGroup[b1]).replace("{0}", parseInt(res)),
                                        sKeeper_Sport[43].newHash["BetTypeHint" + bettypeOfGroup[b1]] = getBetTypeHint(bettypeOfGroup[b1], "0" + Category[43] + res);
                                    break;
                                case "9011":
                                case "9027":
                                    var y = b1 + 1;
                                    bettype = bettypeOfGroup[b1] + "_0" + Category[43] + "0" + y;
                                    var position = b1 + 1;
                                    sKeeper_Sport[43].newHash["BetType" + bettypeOfGroup[b1] + "_" + position] = getBetTypeName(bettypeOfGroup[b1]).replace("{0}", position),
                                    sKeeper_Sport[43].newHash["BetTypeHint" + bettypeOfGroup[b1] + "_" + position] = getBetTypeHint(bettypeOfGroup[b1], "0" + Category[43] + "0" + y);
                                    break;
                                case "9062":
                                    var res = "10";
                                    "G1" == Group && (res = "5"),
                                    bettype = "5" == res ? bettypeOfGroup[b1] + "_0" + Category[43] + "0" + res : bettypeOfGroup[b1] + "_0" + Category[43] + res;
                                    var position = "";
                                    void 0 === ajaxData[bettype] || null == ajaxData[bettype] ? ("5" == res ? (position = "05",
                                    sKeeper_Sport[43].newHash["BetTypeHint" + bettypeOfGroup[b1] + "_5"] = getBetTypeHint(bettypeOfGroup[b1], "0" + Category[43] + position)) : (position = "10",
                                    sKeeper_Sport[43].newHash["BetTypeHint" + bettypeOfGroup[b1] + "_10"] = getBetTypeHint(bettypeOfGroup[b1], "0" + Category[43] + position)),
                                    sKeeper_Sport[43].newHash["BetType" + bettypeOfGroup[b1] + "_" + res] = getBetTypeName(bettypeOfGroup[b1], res).replace("{0}", res)) : (position = parseInt(ajaxData[bettype][1].substring(2, 4)),
                                    sKeeper_Sport[43].newHash["BetType" + bettypeOfGroup[b1] + "_" + res] = getBetTypeName(bettypeOfGroup[b1], parseInt(ajaxData[bettype][1].substring(2, 4))).replace("{0}", position),
                                    sKeeper_Sport[43].newHash["BetTypeHint" + bettypeOfGroup[b1] + "_" + res] = getBetTypeHint(bettypeOfGroup[b1], ajaxData[bettype][1]));
                                    break;
                                case "9068":
                                    var res = "16";
                                    0 == b1 && (res = "01"),
                                    bettype = bettypeOfGroup[b1] + "_0" + Category[43] + res,
                                    "01" == res ? sKeeper_Sport[43].newHash["BetTypeHint" + bettypeOfGroup[b1] + "_1"] = getBetTypeHint(bettypeOfGroup[b1], "0" + Category[43] + res) : sKeeper_Sport[43].newHash["BetTypeHint" + bettypeOfGroup[b1] + "_16"] = getBetTypeHint(bettypeOfGroup[b1], "0" + Category[43] + res);
                                    break;
                                default:
                                    bettype = bettypeOfGroup[b1] + "_0" + Category[43],
                                    void 0 !== ajaxData[bettype] ? (sKeeper_Sport[43].newHash["BetType" + ajaxData[bettype][3]] = getBetTypeName(ajaxData[bettype][3]),
                                    sKeeper_Sport[43].newHash["BetTypeHint" + ajaxData[bettype][3]] = getBetTypeHint(ajaxData[bettype][3], ajaxData[bettype][1])) : (sKeeper_Sport[43].newHash["BetType" + bettypeOfGroup[b1]] = getBetTypeName(bettypeOfGroup[b1]),
                                    sKeeper_Sport[43].newHash["BetTypeHint" + bettypeOfGroup[b1]] = getBetTypeHint(bettypeOfGroup[b1], "0" + Category[43]))
                                }
                                if (void 0 !== ajaxData[bettype] && null != ajaxData[bettype] && ajaxData[bettype].length > 0)
                                    switch (sKeeper_Sport[43].newHash.MatchId = ajaxData[bettype][2],
                                    ajaxData[bettype][3]) {
                                    case "9002":
                                    case "9008":
                                    case "9012":
                                    case "9018":
                                    case "9024":
                                    case "9028":
                                    case "9034":
                                    case "9040":
                                    case "9046":
                                    case "9052":
                                    case "9059":
                                    case "9076":
                                    case "9077":
                                        switch ("L" == sKeeper_Sport[43].Market && void 0 !== ajaxData.IsStartingSoon[0] && "False" == ajaxData.IsStartingSoon[0] && Category[43] == ajaxData.LivePeriod[0] && (sKeeper_Sport[43].newHash["B" + ajaxData[bettype][3] + "_CLS"] = "current"),
                                        sKeeper_Sport[43].newHash["OddsId_" + ajaxData[bettype][3]] = ajaxData[bettype][4],
                                        ajaxData[bettype][8]) {
                                        case "h":
                                            sKeeper_Sport[43].newHash["Value_" + ajaxData[bettype][3] + "_H"] = ajaxData[bettype][5],
                                            sKeeper_Sport[43].newHash["Value_" + ajaxData[bettype][3] + "_A"] = "";
                                            break;
                                        case "a":
                                            sKeeper_Sport[43].newHash["Value_" + ajaxData[bettype][3] + "_H"] = "",
                                            sKeeper_Sport[43].newHash["Value_" + ajaxData[bettype][3] + "_A"] = ajaxData[bettype][5];
                                            break;
                                        default:
                                            "" != ajaxData[bettype][6] ? sKeeper_Sport[43].newHash["Value_" + ajaxData[bettype][3] + "_H"] = "0" : sKeeper_Sport[43].newHash["Value_" + ajaxData[bettype][3] + "_H"] = "",
                                            sKeeper_Sport[43].newHash["Value_" + ajaxData[bettype][3] + "_A"] = ""
                                        }
                                        sKeeper_Sport[43].newHash["Odds_" + ajaxData[bettype][3] + "_H"] = ajaxData[bettype][6],
                                        sKeeper_Sport[43].newHash["Odds_" + ajaxData[bettype][3] + "_A"] = ajaxData[bettype][7],
                                        sKeeper_Sport[43].newHash["Odds_" + ajaxData[bettype][3] + "_H_Cls"] = getOddsClass(ajaxData[bettype][6]),
                                        sKeeper_Sport[43].newHash["Odds_" + ajaxData[bettype][3] + "_A_Cls"] = getOddsClass(ajaxData[bettype][7]),
                                        void 0 !== oajaxData[43][bettype] && (oajaxData[43][bettype].toString() != ajaxData[bettype].toString() ? sKeeper_Sport[43].newHash["Changed_" + ajaxData[bettype][3]] = CLS_UPD : sKeeper_Sport[43].newHash["Changed_" + ajaxData[bettype][3]] = "");
                                        break;
                                    case "9003":
                                    case "9009":
                                    case "9013":
                                    case "9019":
                                    case "9025":
                                    case "9029":
                                    case "9035":
                                    case "9041":
                                    case "9047":
                                    case "9053":
                                    case "9058":
                                    case "9060":
                                    case "9070":
                                    case "9074":
                                        "L" == sKeeper_Sport[43].Market && void 0 !== ajaxData.IsStartingSoon[0] && "False" == ajaxData.IsStartingSoon[0] && Category[43] == ajaxData.LivePeriod[0] && (sKeeper_Sport[43].newHash["B" + ajaxData[bettype][3] + "_CLS"] = "current"),
                                        sKeeper_Sport[43].newHash["OddsId_" + ajaxData[bettype][3]] = ajaxData[bettype][4],
                                        sKeeper_Sport[43].newHash["UNDER_" + ajaxData[bettype][3]] = "",
                                        "" != ajaxData[bettype][4] && (sKeeper_Sport[43].newHash["UNDER_" + ajaxData[bettype][3]] = "" == ajaxData[bettype][5] ? "" : RES_UNDER),
                                        "9058" == ajaxData[bettype][3] && "" != ajaxData[bettype][5] ? sKeeper_Sport[43].newHash["Goal_" + ajaxData[bettype][3]] = parseInt(ajaxData[bettype][5], 10) : sKeeper_Sport[43].newHash["Goal_" + ajaxData[bettype][3]] = ajaxData[bettype][5],
                                        sKeeper_Sport[43].newHash["Odds_" + ajaxData[bettype][3] + "_H"] = ajaxData[bettype][6],
                                        sKeeper_Sport[43].newHash["Odds_" + ajaxData[bettype][3] + "_A"] = ajaxData[bettype][7],
                                        sKeeper_Sport[43].newHash["Odds_" + ajaxData[bettype][3] + "_H_Cls"] = getOddsClass(ajaxData[bettype][6]),
                                        sKeeper_Sport[43].newHash["Odds_" + ajaxData[bettype][3] + "_A_Cls"] = getOddsClass(ajaxData[bettype][7]),
                                        void 0 !== oajaxData[43][bettype] && (oajaxData[43][bettype].toString() != ajaxData[bettype].toString() ? sKeeper_Sport[43].newHash["Changed_" + ajaxData[bettype][3]] = CLS_UPD : sKeeper_Sport[43].newHash["Changed_" + ajaxData[bettype][3]] = "");
                                        break;
                                    case "9005":
                                    case "9061":
                                    case "9071":
                                    case "9078":
                                    case "9079":
                                    case "9080":
                                    case "9081":
                                    case "9082":
                                    case "9083":
                                    case "9084":
                                    case "9085":
                                    case "9086":
                                    case "9075":
                                        "L" == sKeeper_Sport[43].Market && void 0 !== ajaxData.IsStartingSoon[0] && "False" == ajaxData.IsStartingSoon[0] && Category[43] == ajaxData.LivePeriod[0] && (sKeeper_Sport[43].newHash["B" + ajaxData[bettype][3] + "_CLS"] = "current"),
                                        sKeeper_Sport[43].newHash["OddsId_" + ajaxData[bettype][3]] = ajaxData[bettype][4],
                                        sKeeper_Sport[43].newHash["ODD_" + ajaxData[bettype][3]] = "",
                                        sKeeper_Sport[43].newHash["EVEN_" + ajaxData[bettype][3]] = "",
                                        "" != ajaxData[bettype][4] && "" != ajaxData[bettype][6] && (sKeeper_Sport[43].newHash["ODD_" + ajaxData[bettype][3]] = RES_ODD,
                                        sKeeper_Sport[43].newHash["EVEN_" + ajaxData[bettype][3]] = RES_EVEN),
                                        "9075" == ajaxData[bettype][3] ? (sKeeper_Sport[43].newHash.POP_HY = RES_POP_HY,
                                        sKeeper_Sport[43].newHash.POP_HN = RES_POP_HN) : (sKeeper_Sport[43].newHash.POP_HY = "",
                                        sKeeper_Sport[43].newHash.POP_HN = ""),
                                        "" == ajaxData[bettype][5] && (sKeeper_Sport[43].newHash.POP_HY = "",
                                        sKeeper_Sport[43].newHash.POP_HN = ""),
                                        sKeeper_Sport[43].newHash["Odds_" + ajaxData[bettype][3] + "_O"] = ajaxData[bettype][5],
                                        sKeeper_Sport[43].newHash["Odds_" + ajaxData[bettype][3] + "_E"] = ajaxData[bettype][6],
                                        sKeeper_Sport[43].newHash["Odds_" + ajaxData[bettype][3] + "_O_Cls"] = getOddsClass(ajaxData[bettype][5]),
                                        sKeeper_Sport[43].newHash["Odds_" + ajaxData[bettype][3] + "_E_Cls"] = getOddsClass(ajaxData[bettype][6]),
                                        void 0 !== oajaxData[43][bettype] && (oajaxData[43][bettype].toString() != ajaxData[bettype].toString() ? sKeeper_Sport[43].newHash["Changed_" + ajaxData[bettype][3]] = CLS_UPD : sKeeper_Sport[43].newHash["Changed_" + ajaxData[bettype][3]] = "");
                                        break;
                                    default:
                                        switch (bettypeOfGroup[b1]) {
                                        case "9011":
                                        case "9027":
                                            "L" == sKeeper_Sport[43].Market && void 0 !== ajaxData.IsStartingSoon[0] && "False" == ajaxData.IsStartingSoon[0] && Category[43] == ajaxData.LivePeriod[0] && (sKeeper_Sport[43].newHash["B" + bettypeOfGroup[b1] + "_" + position + "_CLS"] = "current"),
                                            sKeeper_Sport[43].newHash["OddsId_" + bettypeOfGroup[b1] + "_" + position] = ajaxData[bettype][4],
                                            sKeeper_Sport[43].newHash["Odds_" + bettypeOfGroup[b1] + "_" + position + "_H"] = ajaxData[bettype][5],
                                            sKeeper_Sport[43].newHash["Odds_" + bettypeOfGroup[b1] + "_" + position + "_A"] = ajaxData[bettype][6],
                                            sKeeper_Sport[43].newHash["Odds_" + bettypeOfGroup[b1] + "_" + position + "_H_Cls"] = getOddsClass(ajaxData[bettype][5]),
                                            sKeeper_Sport[43].newHash["Odds_" + bettypeOfGroup[b1] + "_" + position + "_A_Cls"] = getOddsClass(ajaxData[bettype][6]),
                                            void 0 !== oajaxData[43][bettype] && (oajaxData[43][bettype].toString() != ajaxData[bettype].toString() ? sKeeper_Sport[43].newHash["Changed_" + bettypeOfGroup[b1] + "_" + position] = CLS_UPD : sKeeper_Sport[43].newHash["Changed_" + bettypeOfGroup[b1] + "_" + position] = "");
                                            break;
                                        case "9062":
                                        case "9068":
                                            "L" == sKeeper_Sport[43].Market && void 0 !== ajaxData.IsStartingSoon[0] && "False" == ajaxData.IsStartingSoon[0] && Category[43] == ajaxData.LivePeriod[0] && (sKeeper_Sport[43].newHash["B" + bettypeOfGroup[b1] + "_" + bettype.substring(7, 9) + "_CLS"] = "current"),
                                            sKeeper_Sport[43].newHash["OddsId_" + bettypeOfGroup[b1] + "_" + bettype.substring(7, 9)] = ajaxData[bettype][4],
                                            sKeeper_Sport[43].newHash["Odds_" + bettypeOfGroup[b1] + "_" + bettype.substring(7, 9) + "_H"] = ajaxData[bettype][5],
                                            sKeeper_Sport[43].newHash["Odds_" + bettypeOfGroup[b1] + "_" + bettype.substring(7, 9) + "_A"] = ajaxData[bettype][6],
                                            sKeeper_Sport[43].newHash["Odds_" + bettypeOfGroup[b1] + "_" + bettype.substring(7, 9) + "_H_Cls"] = getOddsClass(ajaxData[bettype][5]),
                                            sKeeper_Sport[43].newHash["Odds_" + bettypeOfGroup[b1] + "_" + bettype.substring(7, 9) + "_A_Cls"] = getOddsClass(ajaxData[bettype][6]),
                                            void 0 !== oajaxData[43][bettype] && (oajaxData[43][bettype].toString() != ajaxData[bettype].toString() ? sKeeper_Sport[43].newHash["Changed_" + bettypeOfGroup[b1] + "_" + bettype.substring(7, 9)] = CLS_UPD : sKeeper_Sport[43].newHash["Changed_" + bettypeOfGroup[b1] + "_" + bettype.substring(7, 9)] = "");
                                            break;
                                        default:
                                            "L" == sKeeper_Sport[43].Market && void 0 !== ajaxData.IsStartingSoon[0] && "False" == ajaxData.IsStartingSoon[0] && Category[43] == ajaxData.LivePeriod[0] && (sKeeper_Sport[43].newHash["B" + ajaxData[bettype][3] + "_CLS"] = "current"),
                                            sKeeper_Sport[43].newHash["OddsId_" + ajaxData[bettype][3]] = ajaxData[bettype][4],
                                            sKeeper_Sport[43].newHash["Odds_" + ajaxData[bettype][3] + "_H"] = ajaxData[bettype][5],
                                            sKeeper_Sport[43].newHash["Odds_" + ajaxData[bettype][3] + "_A"] = ajaxData[bettype][6],
                                            sKeeper_Sport[43].newHash["Odds_" + ajaxData[bettype][3] + "_H_Cls"] = getOddsClass(ajaxData[bettype][5]),
                                            sKeeper_Sport[43].newHash["Odds_" + ajaxData[bettype][3] + "_A_Cls"] = getOddsClass(ajaxData[bettype][6]),
                                            void 0 !== oajaxData[43][bettype] && (oajaxData[43][bettype].toString() != ajaxData[bettype].toString() ? sKeeper_Sport[43].newHash["Changed_" + ajaxData[bettype][3]] = CLS_UPD : sKeeper_Sport[43].newHash["Changed_" + ajaxData[bettype][3]] = "")
                                        }
                                    }
                            }
                        }
                    MoreTmpl = _formatTemplate(MoreTmpl, "{@", "}"),
                    MoreTmpl = _replaceTags(sKeeper_Sport[43].newHash, MoreTmpl),
                    FinalTmpl += MoreTmpl
                }
        }
        sKeeper_Sport[43].OddsHTML = Category_43 + SpecialEvent + FinalTmpl,
        sKeeper_Sport[43].TableContainer.innerHTML = sKeeper_Sport[43].OddsHTML,
        oajaxData[43] = new Object;
        for (var o in ajaxData)
            oajaxData[43][o] = ajaxData[o];
        if (Sport_More_End[43] = !0,
        bFromBtnClick[43] && (bFromBtnClick[43] = !1),
        bOpen1st[43]) {
            bOpen1st[43] = !1;
            var tdobj = $("td.moreBetType.tag.displayOn");
            tdobj.html("<div id='moreAddDiv'>" + sKeeper_Sport[43].OddsHTML + "</div>"),
            FocusMoreTd()
        } else {
            var tdobj = $("td.moreBetType.tag.displayOn");
            tdobj.html("<div id='moreAddDiv'>" + sKeeper_Sport[43].OddsHTML + "</div>"),
            dataNull && FocusMoreTd()
        }
    }
}
function GetBasketballMore(Response) {
    var ajaxData = new Array
      , dataNull = !1;
    if (null == Response) {
        for (var o in oajaxData[2])
            ajaxData[o] = oajaxData[2][o];
        dataNull = !0
    } else
        eval(Response);
    if (0 == Object.keys(ajaxData).length)
        return document.getElementById("Basketball_More").innerHTML = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("NoInfo").innerHTML,
        SportMore_ThreadId[2] = null,
        sKeeper_Sport[2] = null,
        void (Sport_More[2] = !1);
    if (null != sKeeper_Sport[2]) {
        if (-1 == Category[2])
            if (0 == haveHotEvent) {
                for (var i = 1; i < CategoryList[2].length; i++)
                    if (CategoryList[2][i] > 0) {
                        Category[2] = i;
                        break
                    }
            } else
                Category[2] = 0;
        sKeeper_Sport[2].TableContainer = document.getElementById("Basketball_More"),
        sKeeper_Sport[2].OddsHTML = "";
        var betType = new Array("607","601","602","401_402","603","604_605","606","608","403_404","612-1","613-1","614-1","615-1_616-1","617-1","612-2","613-2","614-2","615-2_616-2","617-2","612-3","613-3","614-3","615-3_616-3","617-3","612-4","613-4","614-4","615-4_616-4","617-4");
        1 == sKeeper_Sport[2].isParlay && (betType = new Array("607","601","602","401_402","603","604_605","606","608","403_404","612-1","613-1","614-1","615-1_616-1","617-1","612-2","613-2","614-2","615-2_616-2","617-2","612-3","613-3","614-3","615-3_616-3","617-3","612-4","613-4","614-4","615-4_616-4","617-4")),
        "L" == sKeeper_Sport[2].Market && (betType = new Array("607","601","602","401_402","603","604_605","606","608","403_404","612-1","613-1","614-1","615-1_616-1","617-1","612-2","613-2","614-2","615-2_616-2","617-2","612-3","613-3","614-3","615-3_616-3","617-3","612-4","613-4","614-4","615-4_616-4","617-4"),
        "3" != fFrame.DisplayMode && 1 != sKeeper_Sport[2].isParlay || (betType = new Array("607","601","602","401_402","603","604_605","606","608","403_404","612-1","613-1","614-1","615-1_616-1","617-1","612-2","613-2","614-2","615-2_616-2","617-2","612-3","613-3","614-3","615-3_616-3","617-3","612-4","613-4","614-4","615-4_616-4","617-4")));
        for (var MultiOddsArray = [606, 607, 612, 613, 614, 617], CheckZeroOddsArray = [], i = 0; i < betType.length; i++) {
            var b = []
              , moreEventHTML = ""
              , t0 = []
              , t1 = [];
            if (-1 != betType[i].indexOf("_")) {
                b = betType[i].split("_"),
                t0 = b[0].replace("-1", "").replace("-2", "").replace("-3", "").replace("-4", ""),
                t1 = b[1].replace("-1", "").replace("-2", "").replace("-3", "").replace("-4", ""),
                void 0 !== MoreTmplList[2][parseInt(t0, 10)] && "" != MoreTmplList[2][parseInt(t0, 10)] || (MoreTmplList[2][parseInt(t0, 10)] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreEvent_" + t0).innerHTML),
                void 0 !== MoreTmplList[2][parseInt(t1, 10)] && "" != MoreTmplList[2][parseInt(t1, 10)] || (MoreTmplList[2][parseInt(t1, 10)] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreEvent_" + t1).innerHTML),
                "" == MoreEventCount[2][1] && (MoreEventCount[2][1] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreEventDouble").innerHTML),
                moreEventHTML = MoreEventCount[2][1];
                var flg615 = !1
                  , flg616 = !1;
                if (615 == t0 && 616 == t1) {
                    if (void 0 !== ajaxData["B" + t0 + "C" + Category[2]] && null != ajaxData["B" + t0 + "C" + Category[2]]) {
                        for (var res = 0; res < ajaxData["B" + t0 + "C" + Category[2]].length; res++)
                            if (ajaxData["B" + t0 + "C" + Category[2]][res].substr(7, 1) == b[0].replace(t0 + "-", "") && 8 == Category[2]) {
                                flg615 = !0;
                                break
                            }
                        if (flg615) {
                            var oddsCahngeString615 = "{@Changed_" + t0 + "}"
                              , oddsCahngereplace615 = "{@Changed_" + t0 + ajaxData["B" + t0 + "C" + Category[2]][res].substr(6, 2) + "}";
                            if (moreEventHTML = moreEventHTML.replace("OddsData0", MoreTmplList[2][parseInt(t0, 10)]).replace(new RegExp(oddsCahngeString615,"g"), oddsCahngereplace615),
                            void 0 !== ajaxData["B" + t1 + "C" + Category[2]] && null != ajaxData["B" + t1 + "C" + Category[2]])
                                for (var res = 0; res < ajaxData["B" + t1 + "C" + Category[2]].length; res++)
                                    if (ajaxData["B" + t1 + "C" + Category[2]][res].substr(7, 1) == b[1].replace(t1 + "-", "") && 8 == Category[2]) {
                                        flg616 = !0;
                                        break
                                    }
                            if (flg616) {
                                var oddsCahngeString616 = "{@Changed_" + t1 + "}"
                                  , oddsCahngereplace616 = "{@Changed_" + t1 + ajaxData["B" + t1 + "C" + Category[2]][res].substr(6, 2) + "}";
                                moreEventHTML = moreEventHTML.replace("OddsData1", MoreTmplList[2][parseInt(t1, 10)]).replace(new RegExp(oddsCahngeString616,"g"), oddsCahngereplace616)
                            } else
                                moreEventHTML = moreEventHTML.replace("OddsData1", "")
                        } else if (void 0 !== ajaxData["B" + t1 + "C" + Category[2]] && null != ajaxData["B" + t1 + "C" + Category[2]])
                            for (var res = 0; res < ajaxData["B" + t1 + "C" + Category[2]].length; res++)
                                if (ajaxData["B" + t1 + "C" + Category[2]][res].substr(7, 1) == b[1].replace(t1 + "-", "") && 8 == Category[2]) {
                                    flg616 = !0;
                                    var oddsCahngeString616 = "{@Changed_" + t1 + "}"
                                      , oddsCahngereplace616 = "{@Changed_" + t1 + ajaxData["B" + t1 + "C" + Category[2]][res].substr(6, 2) + "}";
                                    moreEventHTML = moreEventHTML.replace("OddsData0", MoreTmplList[2][parseInt(t1, 10)]).replace(new RegExp(oddsCahngeString616,"g"), oddsCahngereplace616),
                                    moreEventHTML = moreEventHTML.replace("OddsData1", "")
                                }
                    } else if (void 0 !== ajaxData["B" + t1 + "C" + Category[2]] && null != ajaxData["B" + t1 + "C" + Category[2]])
                        for (var res = 0; res < ajaxData["B" + t1 + "C" + Category[2]].length; res++)
                            ajaxData["B" + t1 + "C" + Category[2]][res].substr(7, 1) == b[1].replace(t1 + "-", "") && 8 == Category[2] && (flg616 = !0,
                            moreEventHTML = moreEventHTML.replace("OddsData0", MoreTmplList[2][parseInt(t1, 10)]),
                            moreEventHTML = moreEventHTML.replace("OddsData1", ""));
                    0 == flg615 && 1 == flg616 ? moreEventHTML = moreEventHTML.replace("OddsData0", "") : 0 == flg615 && 0 == flg616 ? (moreEventHTML = moreEventHTML.replace("OddsData0", ""),
                    moreEventHTML = moreEventHTML.replace("OddsData1", "")) : 1 == flg615 && 0 == flg616 && (moreEventHTML = moreEventHTML.replace("OddsData1", ""))
                } else
                    void 0 !== ajaxData["B" + t0] && null != ajaxData["B" + t0] && (Category[2].toString() == ajaxData["B" + t0][0] || "0" == Category[2].toString() && "1" == ajaxData["B" + t0][1]) ? (moreEventHTML = moreEventHTML.replace("OddsData0", MoreTmplList[2][parseInt(t0, 10)]),
                    moreEventHTML = void 0 !== ajaxData["B" + t1] && null != ajaxData["B" + t1] && (Category[2].toString() == ajaxData["B" + t1][0] || "0" == Category[2].toString() && "1" == ajaxData["B" + t1][1]) ? moreEventHTML.replace("OddsData1", MoreTmplList[2][parseInt(t1, 10)]) : moreEventHTML.replace("OddsData1", "")) : void 0 !== ajaxData["B" + t1] && null != ajaxData["B" + t1] && (Category[2].toString() == ajaxData["B" + t1][0] || "0" == Category[2].toString() && "1" == ajaxData["B" + t1][1]) && (moreEventHTML = moreEventHTML.replace("OddsData0", MoreTmplList[2][parseInt(t1, 10)]),
                    moreEventHTML = moreEventHTML.replace("OddsData1", ""))
            } else {
                b[0] = betType[i];
                var tmpbettype = b[0].replace("-1", "").replace("-2", "").replace("-3", "").replace("-4", "");
                if (void 0 !== MoreTmplList[2][parseInt(tmpbettype, 10)] && "" != MoreTmplList[2][parseInt(tmpbettype, 10)] || (MoreTmplList[2][parseInt(tmpbettype, 10)] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreEvent_" + tmpbettype).innerHTML),
                606 == tmpbettype || 607 == tmpbettype || 612 == tmpbettype || 613 == tmpbettype || 614 == tmpbettype || 617 == tmpbettype) {
                    if (void 0 !== ajaxData["B" + tmpbettype + "C" + Category[2]] && null != ajaxData["B" + tmpbettype + "C" + Category[2]])
                        if (612 == tmpbettype || 614 == tmpbettype || 617 == tmpbettype) {
                            for (var k = 0; k < 1; k++)
                                for (var res = 0; res < ajaxData["B" + tmpbettype + "C" + Category[2]].length; res++)
                                    if (ajaxData["B" + tmpbettype + "C" + Category[2]][res].substr(6, 2) == "0" + b[0].replace(tmpbettype + "-", "")) {
                                        "" == MoreEventCount[2][0] && (MoreEventCount[2][0] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreEventSingle").innerHTML);
                                        var TmpMoreEventHTML = MoreEventCount[2][0]
                                          , oddsCahngeString = "{@Changed_" + tmpbettype + "}"
                                          , oddsCahngereplace = "{@Changed_" + tmpbettype + ajaxData["B" + tmpbettype + "C" + Category[2]][res].substr(6, 2) + "}";
                                        TmpMoreEventHTML = TmpMoreEventHTML.replace("OddsData0", MoreTmplList[2][parseInt(b[0], 10)].replace(new RegExp(oddsCahngeString,"g"), oddsCahngereplace).replace(/{@/g, "{@" + k).replace(/{%/g, "{%" + k)),
                                        moreEventHTML += TmpMoreEventHTML
                                    }
                        } else
                            for (var flg613 = !1, k = 0; k < 1; k++)
                                if (613 == tmpbettype) {
                                    if (void 0 !== ajaxData["B" + tmpbettype + "C" + Category[2]] && null != ajaxData["B" + tmpbettype + "C" + Category[2]] && 8 == Category[2]) {
                                        for (var res = 0; res < ajaxData["B" + tmpbettype + "C" + Category[2]].length; res++)
                                            if (ajaxData["B" + tmpbettype + "C" + Category[2]][res].substr(5, 1) == b[0].replace(tmpbettype + "-", "")) {
                                                flg613 = !0;
                                                break
                                            }
                                        if (flg613) {
                                            "" == MoreEventCount[2][0] && (MoreEventCount[2][0] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreEventSingle").innerHTML);
                                            var TmpMoreEventHTML = MoreEventCount[2][0]
                                              , oddsCahnge10 = "{@Changed_" + tmpbettype + "_10}"
                                              , oddsCahnge15 = "{@Changed_" + tmpbettype + "_15}"
                                              , oddsCahnge20 = "{@Changed_" + tmpbettype + "_20}"
                                              , oddsCahnge10replace = "{@Changed_" + tmpbettype + "_" + b[0].replace(tmpbettype + "-", "") + "10}"
                                              , oddsCahnge15replace = "{@Changed_" + tmpbettype + "_" + b[0].replace(tmpbettype + "-", "") + "15}"
                                              , oddsCahnge20replace = "{@Changed_" + tmpbettype + "_" + b[0].replace(tmpbettype + "-", "") + "20}";
                                            TmpMoreEventHTML = TmpMoreEventHTML.replace("OddsData0", MoreTmplList[2][parseInt(b[0], 10)].replace(new RegExp(oddsCahnge10,"g"), oddsCahnge10replace).replace(new RegExp(oddsCahnge15,"g"), oddsCahnge15replace).replace(new RegExp(oddsCahnge20,"g"), oddsCahnge20replace).replace(/{@/g, "{@" + k).replace(/{%/g, "{%" + k)),
                                            moreEventHTML += TmpMoreEventHTML
                                        }
                                    }
                                } else {
                                    "" == MoreEventCount[2][0] && (MoreEventCount[2][0] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreEventSingle").innerHTML);
                                    var TmpMoreEventHTML = MoreEventCount[2][0];
                                    TmpMoreEventHTML = TmpMoreEventHTML.replace("OddsData0", MoreTmplList[2][parseInt(b[0], 10)].replace(/{@/g, "{@" + k).replace(/{%/g, "{%" + k)),
                                    moreEventHTML += TmpMoreEventHTML
                                }
                } else if (-1 != indexOf(MultiOddsArray, b[0])) {
                    if (void 0 !== ajaxData["B" + b[0] + "C" + Category[2]] && null != ajaxData["B" + b[0] + "C" + Category[2]])
                        for (var k = 0; k < Math.ceil(ajaxData["B" + b[0] + "C" + Category[2]].length / 3); k++) {
                            "" == MoreEventCount[2][2] && (MoreEventCount[2][2] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreEventTriple").innerHTML);
                            var TmpMoreEventHTML = MoreEventCount[2][2];
                            if (k + 1 == Math.ceil(ajaxData["B" + b[0] + "C" + Category[2]].length / 3))
                                switch (ajaxData["B" + b[0] + "C" + Category[2]].length % 3) {
                                case 0:
                                    TmpMoreEventHTML = TmpMoreEventHTML.replace("OddsData0", MoreTmplList[2][parseInt(b[0], 10)].replace(/{@/g, "{@" + 3 * k).replace(/{%/g, "{%" + 3 * k)),
                                    TmpMoreEventHTML = TmpMoreEventHTML.replace("OddsData1", MoreTmplList[2][parseInt(b[0], 10)].replace(/{@/g, "{@" + (3 * k + 1)).replace(/{%/g, "{%" + (3 * k + 1))),
                                    TmpMoreEventHTML = TmpMoreEventHTML.replace("OddsData2", MoreTmplList[2][parseInt(b[0], 10)].replace(/{@/g, "{@" + (3 * k + 2)).replace(/{%/g, "{%" + (3 * k + 2)));
                                    break;
                                case 1:
                                    TmpMoreEventHTML = TmpMoreEventHTML.replace("OddsData0", MoreTmplList[2][parseInt(b[0], 10)].replace(/{@/g, "{@" + 3 * k).replace(/{%/g, "{%" + 3 * k)),
                                    TmpMoreEventHTML = TmpMoreEventHTML.replace("OddsData1", ""),
                                    TmpMoreEventHTML = TmpMoreEventHTML.replace("OddsData2", "");
                                    break;
                                case 2:
                                    TmpMoreEventHTML = TmpMoreEventHTML.replace("OddsData0", MoreTmplList[2][parseInt(b[0], 10)].replace(/{@/g, "{@" + 3 * k).replace(/{%/g, "{%" + 3 * k)),
                                    TmpMoreEventHTML = TmpMoreEventHTML.replace("OddsData1", MoreTmplList[2][parseInt(b[0], 10)].replace(/{@/g, "{@" + (3 * k + 1)).replace(/{%/g, "{%" + (3 * k + 1))),
                                    TmpMoreEventHTML = TmpMoreEventHTML.replace("OddsData2", "")
                                }
                            else
                                TmpMoreEventHTML = TmpMoreEventHTML.replace("Odds_1_dsp", CLS_LS_ON),
                                TmpMoreEventHTML = TmpMoreEventHTML.replace("Odds_2_dsp", CLS_LS_ON),
                                TmpMoreEventHTML = TmpMoreEventHTML.replace("OddsData0", MoreTmplList[2][parseInt(b[0], 10)].replace(/{@/g, "{@" + 3 * k).replace(/{%/g, "{%" + 3 * k)),
                                TmpMoreEventHTML = TmpMoreEventHTML.replace("OddsData1", MoreTmplList[2][parseInt(b[0], 10)].replace(/{@/g, "{@" + (3 * k + 1)).replace(/{%/g, "{%" + (3 * k + 1))),
                                TmpMoreEventHTML = TmpMoreEventHTML.replace("OddsData2", MoreTmplList[2][parseInt(b[0], 10)].replace(/{@/g, "{@" + (3 * k + 2)).replace(/{%/g, "{%" + (3 * k + 2)));
                            moreEventHTML += TmpMoreEventHTML
                        }
                } else
                    void 0 !== ajaxData["B" + b[0]] && null != ajaxData["B" + b[0]] && (Category[2].toString() == ajaxData["B" + b[0]][0] || "0" == Category[2].toString() && "1" == ajaxData["B" + b[0]][1]) && ("" == MoreEventCount[2][0] && (MoreEventCount[2][0] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreEventSingle").innerHTML),
                    moreEventHTML = MoreEventCount[2][0],
                    moreEventHTML = moreEventHTML.replace("OddsData0", MoreTmplList[2][parseInt(b[0], 10)]))
            }
            for (var havedata = !1, j = 0; j < b.length; j++)
                if (void 0 !== ajaxData["B" + b[j].replace("-1", "").replace("-2", "").replace("-3", "").replace("-4", "") + "C" + Category[2].toString()] && null != ajaxData["B" + b[j].replace("-1", "").replace("-2", "").replace("-3", "").replace("-4", "") + "C" + Category[2].toString()] || -1 != indexOf(MultiOddsArray, b[j].replace("-1", "").replace("-2", "").replace("-3", "").replace("-4", "")) && void 0 !== ajaxData["B" + b[j].replace("-1", "").replace("-2", "").replace("-3", "").replace("-4", "") + "C" + Category[2]] && null != ajaxData["B" + b[j].replace("-1", "").replace("-2", "").replace("-3", "").replace("-4", "") + "C" + Category[2]] || void 0 !== ajaxData["B" + b[j].replace("-1", "").replace("-2", "").replace("-3", "").replace("-4", "")] && null != ajaxData["B" + b[j].replace("-1", "").replace("-2", "").replace("-3", "").replace("-4", "")] && (Category[2].toString() == ajaxData["B" + b[j].replace("-1", "").replace("-2", "").replace("-3", "").replace("-4", "")][0] || "0" == Category[2].toString() && "1" == ajaxData["B" + b[j].replace("-1", "").replace("-2", "").replace("-3", "").replace("-4", "")][1])) {
                    havedata = !0,
                    sKeeper_Sport[2].DivTmpl = moreEventHTML;
                    break
                }
            if (havedata) {
                sKeeper_Sport[2].newHash = new Array,
                sKeeper_Sport[2].oHash = new Array;
                for (var multiBettype = "", j = 0; j < b.length; j++) {
                    multiBettype = b[j].replace("-1", "").replace("-2", "").replace("-3", "").replace("-4", "");
                    var parseOdds = !1;
                    if (-1 != indexOf(MultiOddsArray, multiBettype) && void 0 !== ajaxData["B" + multiBettype + "C" + Category[2]] && null != ajaxData["B" + multiBettype + "C" + Category[2]] ? parseOdds = !0 : (void 0 !== ajaxData["B" + multiBettype] && null != ajaxData["B" + multiBettype] || void 0 !== ajaxData["B" + multiBettype + "C" + Category[2]] && null != ajaxData["B" + multiBettype + "C" + Category[2]]) && ("0" == Category[2].toString() ? "1" == ajaxData["B" + multiBettype][1] && (parseOdds = !0) : parseOdds = !0),
                    parseOdds)
                        if (-1 != indexOf(MultiOddsArray, multiBettype)) {
                            sKeeper_Sport[2].newHash = new Array,
                            sKeeper_Sport[2].oHash = new Array;
                            for (var stop = !1, Cnt = 0, sIdx = 0, sArr = ajaxData["B" + multiBettype + "C" + Category[2]], KK = sIdx; KK < sArr.length && !stop; KK++)
                                if (parseOdds = !0) {
                                    if (void 0 !== ajaxData[sArr[KK]])
                                        if (606 == b[j] || 607 == b[j])
                                            sKeeper_Sport[2].newHash["0OddsId_" + b[j] + "_" + ajaxData[sArr[KK]][6]] = ajaxData[sArr[KK]][3],
                                            sKeeper_Sport[2].newHash["0Odds_" + b[j] + "_H" + ajaxData[sArr[KK]][6]] = ajaxData[sArr[KK]][4],
                                            sKeeper_Sport[2].newHash["0Odds_" + b[j] + "_A" + ajaxData[sArr[KK]][6]] = ajaxData[sArr[KK]][5],
                                            sKeeper_Sport[2].newHash["0Odds_" + b[j] + "_H" + ajaxData[sArr[KK]][6] + "_Cls"] = getOddsClass(ajaxData[sArr[KK]][4]),
                                            sKeeper_Sport[2].newHash["0Odds_" + b[j] + "_A" + ajaxData[sArr[KK]][6] + "_Cls"] = getOddsClass(ajaxData[sArr[KK]][5]);
                                        else if (612 == multiBettype || 613 == multiBettype || 614 == multiBettype || 617 == multiBettype) {
                                            if (613 == multiBettype) {
                                                var rkey = "0";
                                                switch (ajaxData[sArr[KK]][6].substr(0, 2)) {
                                                case "01":
                                                    rkey = "1";
                                                    break;
                                                case "02":
                                                    rkey = "2";
                                                    break;
                                                case "03":
                                                    rkey = "3";
                                                    break;
                                                case "04":
                                                    rkey = "4"
                                                }
                                                if (b[j].substr(4, 1) == rkey) {
                                                    switch (rkey) {
                                                    case "1":
                                                        sKeeper_Sport[2].newHash["0BetType_613"] = RES_1QuarterRaceToTitle;
                                                        break;
                                                    case "2":
                                                        sKeeper_Sport[2].newHash["0BetType_613"] = RES_2QuarterRaceToTitle;
                                                        break;
                                                    case "3":
                                                        sKeeper_Sport[2].newHash["0BetType_613"] = RES_3QuarterRaceToTitle;
                                                        break;
                                                    case "4":
                                                        sKeeper_Sport[2].newHash["0BetType_613"] = RES_4QuarterRaceToTitle
                                                    }
                                                    sKeeper_Sport[2].newHash["0Qid"] = rkey,
                                                    sKeeper_Sport[2].newHash["0OddsId_" + multiBettype + "_" + ajaxData[sArr[KK]][6].substr(2, 2)] = ajaxData[sArr[KK]][3],
                                                    sKeeper_Sport[2].newHash["0Odds_" + multiBettype + "_H" + ajaxData[sArr[KK]][6].substr(2, 2)] = ajaxData[sArr[KK]][4],
                                                    sKeeper_Sport[2].newHash["0Odds_" + multiBettype + "_A" + ajaxData[sArr[KK]][6].substr(2, 2)] = ajaxData[sArr[KK]][5],
                                                    sKeeper_Sport[2].newHash["0Odds_" + multiBettype + "_H" + +ajaxData[sArr[KK]][6].substr(2, 2) + "_Cls"] = getOddsClass(ajaxData[sArr[KK]][4]),
                                                    sKeeper_Sport[2].newHash["0Odds_" + multiBettype + "_A" + +ajaxData[sArr[KK]][6].substr(2, 2) + "_Cls"] = getOddsClass(ajaxData[sArr[KK]][5])
                                                }
                                            } else if (612 == multiBettype || 617 == multiBettype) {
                                                if (b[j].substr(4, 1) == ajaxData[sArr[KK]][6].substr(1, 1)) {
                                                    if (612 == multiBettype)
                                                        switch (ajaxData[sArr[KK]][6].substr(1, 1)) {
                                                        case "1":
                                                            sKeeper_Sport[2].newHash["0BetType_612"] = RES_1QuarterMoneyLineTitle;
                                                            break;
                                                        case "2":
                                                            sKeeper_Sport[2].newHash["0BetType_612"] = RES_2QuarterMoneyLineTitle;
                                                            break;
                                                        case "3":
                                                            sKeeper_Sport[2].newHash["0BetType_612"] = RES_3QuarterMoneyLineTitle;
                                                            break;
                                                        case "4":
                                                            sKeeper_Sport[2].newHash["0BetType_612"] = RES_4QuarterMoneyLineTitle
                                                        }
                                                    else
                                                        switch (ajaxData[sArr[KK]][6].substr(1, 1)) {
                                                        case "1":
                                                            sKeeper_Sport[2].newHash["0BetType_617"] = RES_1QuarterWhichteamtoScorethelastbasketTitle;
                                                            break;
                                                        case "2":
                                                            sKeeper_Sport[2].newHash["0BetType_617"] = RES_2QuarterWhichteamtoScorethelastbasketTitle;
                                                            break;
                                                        case "3":
                                                            sKeeper_Sport[2].newHash["0BetType_617"] = RES_3QuarterWhichteamtoScorethelastbasketTitle;
                                                            break;
                                                        case "4":
                                                            sKeeper_Sport[2].newHash["0BetType_617"] = RES_4QuarterWhichteamtoScorethelastbasketTitle
                                                        }
                                                    sKeeper_Sport[2].newHash["0OddsId_" + multiBettype] = ajaxData[sArr[KK]][3],
                                                    sKeeper_Sport[2].newHash["0Odds_" + multiBettype + "_H"] = ajaxData[sArr[KK]][4],
                                                    sKeeper_Sport[2].newHash["0Odds_" + multiBettype + "_A"] = ajaxData[sArr[KK]][5],
                                                    sKeeper_Sport[2].newHash["0Odds_" + multiBettype + "_H_Cls"] = getOddsClass(ajaxData[sArr[KK]][4]),
                                                    sKeeper_Sport[2].newHash["0Odds_" + multiBettype + "_A_Cls"] = getOddsClass(ajaxData[sArr[KK]][5])
                                                }
                                            } else if (614 == multiBettype && b[j].substr(4, 1) == ajaxData[sArr[KK]][11].substr(1, 1)) {
                                                switch (ajaxData[sArr[KK]][11].substr(1, 1)) {
                                                case "1":
                                                    sKeeper_Sport[2].newHash["0BetType_614"] = RES_1QuarterWinningMargin7WayTitle;
                                                    break;
                                                case "2":
                                                    sKeeper_Sport[2].newHash["0BetType_614"] = RES_2QuarterWinningMargin7WayTitle;
                                                    break;
                                                case "3":
                                                    sKeeper_Sport[2].newHash["0BetType_614"] = RES_3QuarterWinningMargin7WayTitle;
                                                    break;
                                                case "4":
                                                    sKeeper_Sport[2].newHash["0BetType_614"] = RES_4QuarterWinningMargin7WayTitle
                                                }
                                                sKeeper_Sport[2].newHash["0OddsId_" + multiBettype] = ajaxData[sArr[KK]][3],
                                                sKeeper_Sport[2].newHash["0Odds_" + multiBettype + "_H1-4"] = ajaxData[sArr[KK]][4],
                                                sKeeper_Sport[2].newHash["0Odds_" + multiBettype + "_H5-8"] = ajaxData[sArr[KK]][5],
                                                sKeeper_Sport[2].newHash["0Odds_" + multiBettype + "_H9up"] = ajaxData[sArr[KK]][6],
                                                sKeeper_Sport[2].newHash["0Odds_" + multiBettype + "_D"] = ajaxData[sArr[KK]][7],
                                                sKeeper_Sport[2].newHash["0Odds_" + multiBettype + "_A1-4"] = ajaxData[sArr[KK]][8],
                                                sKeeper_Sport[2].newHash["0Odds_" + multiBettype + "_A5-8"] = ajaxData[sArr[KK]][9],
                                                sKeeper_Sport[2].newHash["0Odds_" + multiBettype + "_A9up"] = ajaxData[sArr[KK]][10]
                                            }
                                        } else
                                            sKeeper_Sport[2].setDatas(ajaxData[sArr[KK]], addStr(mMultiSportODDS_DEF["B" + multiBettype], KK));
                                    if (void 0 !== oajaxData[2][sArr[KK]]) {
                                        var reskey = sArr[KK].substr(6, 2);
                                        "614" == multiBettype || "617" == multiBettype ? oajaxData[2][sArr[KK]].toString() != ajaxData[sArr[KK]].toString() ? sKeeper_Sport[2].newHash["0Changed_" + multiBettype + reskey] = CLS_UPD : sKeeper_Sport[2].newHash["0Changed_" + multiBettype + reskey] = "" : "613" == multiBettype ? (reskey = sArr[KK].substr(5, 3),
                                        oajaxData[2][sArr[KK]].toString() != ajaxData[sArr[KK]].toString() ? sKeeper_Sport[2].newHash["0Changed_" + multiBettype + "_" + reskey] = CLS_UPD : sKeeper_Sport[2].newHash["0Changed_" + multiBettype + "_" + reskey] = "") : oajaxData[2][sArr[KK]].toString() != ajaxData[sArr[KK]].toString() ? sKeeper_Sport[2].newHash[KK + "Changed_" + b[j]] = CLS_UPD : sKeeper_Sport[2].newHash[KK + "Changed_" + b[j]] = ""
                                    }
                                    sKeeper_Sport[2].oHash[KK + "MatchId"] = sKeeper_Sport[2].MatchId,
                                    sKeeper_Sport[2].newHash[KK + "isParlay"] = sKeeper_Sport[2].isParlay,
                                    "L" == sKeeper_Sport[2].Market ? sKeeper_Sport[2].newHash[KK + "LorD"] = "liveligh" : sKeeper_Sport[2].newHash[KK + "LorD"] = "bgcpe";
                                    var TimeArr;
                                    switch (b[j]) {
                                    case "197":
                                    case "198":
                                    case "204":
                                    case "205":
                                        sKeeper_Sport[2].newHash[KK + "Odds_" + b[j] + "_O_Cls"] = getOddsClass(sKeeper_Sport[2].oHash[KK + "Odds_" + b[j] + "_O"]),
                                        sKeeper_Sport[2].newHash[KK + "Odds_" + b[j] + "_U_Cls"] = getOddsClass(sKeeper_Sport[2].oHash[KK + "Odds_" + b[j] + "_U"])
                                    }
                                }
                            if (606 == multiBettype || 607 == multiBettype || 612 == multiBettype)
                                if (612 == multiBettype) {
                                    for (var aMatch = "", m = 0; m < ajaxData["B" + multiBettype + "C" + Category[2]].length; m++)
                                        if (b[j].substr(4, 1) == ajaxData["B" + multiBettype + "C" + Category[2]][m].substr(7, 1)) {
                                            aMatch = ajaxData["B" + multiBettype + "C" + Category[2]][m];
                                            break
                                        }
                                    "" != aMatch && void 0 !== aMatch && void 0 !== oajaxData[2][aMatch] && (oajaxData[2][aMatch].toString() != ajaxData[aMatch].toString() ? sKeeper_Sport[2].newHash["0Changed_" + multiBettype + oajaxData[2][aMatch][6]] = CLS_UPD : sKeeper_Sport[2].newHash["0Changed_" + multiBettype + oajaxData[2][aMatch][6]] = "")
                                } else
                                    for (var aMatch = "", m = 0; m < ajaxData["B" + multiBettype + "C" + Category[2]].length; m++)
                                        "" != (aMatch = ajaxData["B" + multiBettype + "C" + Category[2]][m]) && void 0 !== aMatch && void 0 !== oajaxData[2][aMatch] && (oajaxData[2][aMatch].toString() != ajaxData[aMatch].toString() ? sKeeper_Sport[2].newHash["0Changed_" + multiBettype + "_" + oajaxData[2][aMatch][6]] = CLS_UPD : sKeeper_Sport[2].newHash["0Changed_" + multiBettype + "_" + oajaxData[2][aMatch][6]] = "")
                        } else {
                            if (-1 != indexOf(CheckZeroOddsArray, b[j])) {
                                var ChkDataArr = new Array;
                                if ("" != (ChkDataArr = ChkDataArr.concat(ajaxData["B" + b[j]])).slice(4, ChkDataArr.length).toString().replace(/,/g, ""))
                                    for (var iZero = 4; iZero < ChkDataArr.length; iZero++)
                                        "" == ChkDataArr[iZero] && (ChkDataArr[iZero] = "--");
                                sKeeper_Sport[2].setDatas(ChkDataArr, mMultiSportODDS_DEF["B" + b[j].replace("-1", "").replace("-2", "").replace("-3", "").replace("-4", "")], mMultiSportODDS_DEF["B" + b[j].replace("-1", "").replace("-2", "").replace("-3", "").replace("-4", "")])
                            } else if (615 == multiBettype || 616 == multiBettype) {
                                for (var aMatch = "", m = 0; m < ajaxData["B" + multiBettype + "C" + Category[2]].length; m++)
                                    if (b[j].substr(4, 1) == ajaxData["B" + multiBettype + "C" + Category[2]][m].substr(7, 1)) {
                                        aMatch = ajaxData["B" + multiBettype + "C" + Category[2]][m];
                                        break
                                    }
                                if ("" != aMatch) {
                                    if (615 == multiBettype)
                                        switch (b[j].substr(4, 1)) {
                                        case "1":
                                            sKeeper_Sport[2].newHash.BetType_615 = RES_1QuarterHomeTeamOverUnderTitle;
                                            break;
                                        case "2":
                                            sKeeper_Sport[2].newHash.BetType_615 = RES_2QuarterHomeTeamOverUnderTitle;
                                            break;
                                        case "3":
                                            sKeeper_Sport[2].newHash.BetType_615 = RES_3QuarterHomeTeamOverUnderTitle;
                                            break;
                                        case "4":
                                            sKeeper_Sport[2].newHash.BetType_615 = RES_4QuarterHomeTeamOverUnderTitle
                                        }
                                    else
                                        switch (b[j].substr(4, 1)) {
                                        case "1":
                                            sKeeper_Sport[2].newHash.BetType_616 = RES_1QuarterAwayTeamOverUnderTitle;
                                            break;
                                        case "2":
                                            sKeeper_Sport[2].newHash.BetType_616 = RES_2QuarterAwayTeamOverUnderTitle;
                                            break;
                                        case "3":
                                            sKeeper_Sport[2].newHash.BetType_616 = RES_3QuarterAwayTeamOverUnderTitle;
                                            break;
                                        case "4":
                                            sKeeper_Sport[2].newHash.BetType_616 = RES_4QuarterAwayTeamOverUnderTitle
                                        }
                                    "" != aMatch && void 0 !== aMatch && (sKeeper_Sport[2].newHash.MatchId = ajaxData[aMatch][2],
                                    sKeeper_Sport[2].newHash["OddsId_" + multiBettype] = ajaxData[aMatch][3],
                                    sKeeper_Sport[2].newHash["Goal_" + multiBettype] = ajaxData[aMatch][4],
                                    sKeeper_Sport[2].newHash["Odds_" + multiBettype + "_O"] = ajaxData[aMatch][5],
                                    sKeeper_Sport[2].newHash["Odds_" + multiBettype + "_U"] = ajaxData[aMatch][6],
                                    sKeeper_Sport[2].newHash["Odds_" + multiBettype + "_O_Cls"] = getOddsClass(ajaxData[aMatch][5]),
                                    sKeeper_Sport[2].newHash["Odds_" + multiBettype + "_U_Cls"] = getOddsClass(ajaxData[aMatch][6]))
                                }
                            } else
                                sKeeper_Sport[2].setDatas(ajaxData["B" + b[j].replace("-1", "").replace("-2", "").replace("-3", "").replace("-4", "")], mMultiSportODDS_DEF["B" + b[j].replace("-1", "").replace("-2", "").replace("-3", "").replace("-4", "")]);
                            switch (615 == multiBettype || 616 == multiBettype ? void 0 !== oajaxData[2][aMatch] && (oajaxData[2][aMatch].toString() != ajaxData[aMatch].toString() ? sKeeper_Sport[2].newHash["Changed_" + multiBettype + oajaxData[2][aMatch][7]] = CLS_UPD : sKeeper_Sport[2].newHash["Changed_" + multiBettype + oajaxData[2][aMatch][7]] = "") : void 0 !== oajaxData[2]["B" + b[j].replace("-1", "").replace("-2", "").replace("-3", "").replace("-4", "")] && (oajaxData[2]["B" + b[j].replace("-1", "").replace("-2", "").replace("-3", "").replace("-4", "")].toString() != ajaxData["B" + b[j].replace("-1", "").replace("-2", "").replace("-3", "").replace("-4", "")].toString() ? sKeeper_Sport[2].newHash["Changed_" + b[j]] = CLS_UPD : sKeeper_Sport[2].newHash["Changed_" + b[j]] = ""),
                            sKeeper_Sport[2].newHash.isParlay = sKeeper_Sport[2].isParlay,
                            "L" == sKeeper_Sport[2].Market ? sKeeper_Sport[2].newHash.LorD = "liveligh" : sKeeper_Sport[2].newHash.LorD = "bgcpe",
                            b[j]) {
                            case "17":
                                sKeeper_Sport[2].newHash["Odds_" + b[j] + "_H_Cls"] = getOddsClass(sKeeper_Sport[2].oHash["Odds_" + b[j] + "_H"]),
                                sKeeper_Sport[2].newHash["Odds_" + b[j] + "_A_Cls"] = getOddsClass(sKeeper_Sport[2].oHash["Odds_" + b[j] + "_A"]),
                                "" != sKeeper_Sport[2].oHash["Value_" + b[j]] ? "h" == sKeeper_Sport[2].oHash["FavorF_" + b[j]] ? (sKeeper_Sport[2].newHash["Value_" + b[j] + "_A"] = "(+" + sKeeper_Sport[2].oHash["Value_" + b[j]] + ")",
                                sKeeper_Sport[2].newHash["Value_" + b[j] + "_H"] = "(-" + sKeeper_Sport[2].oHash["Value_" + b[j]] + ")") : (sKeeper_Sport[2].newHash["Value_" + b[j] + "_A"] = "(-" + sKeeper_Sport[2].oHash["Value_" + b[j]] + ")",
                                sKeeper_Sport[2].newHash["Value_" + b[j] + "_H"] = "(+" + sKeeper_Sport[2].oHash["Value_" + b[j]] + ")") : (sKeeper_Sport[2].newHash["Value_" + b[j] + "_A"] = "()",
                                sKeeper_Sport[2].newHash["Value_" + b[j] + "_H"] = "()");
                                break;
                            case "18":
                                sKeeper_Sport[2].newHash["Odds_" + b[j] + "_O_Cls"] = getOddsClass(sKeeper_Sport[2].oHash["Odds_" + b[j] + "_O"]),
                                sKeeper_Sport[2].newHash["Odds_" + b[j] + "_U_Cls"] = getOddsClass(sKeeper_Sport[2].oHash["Odds_" + b[j] + "_U"]);
                                break;
                            case "2":
                            case "12":
                            case "184":
                            case "194":
                            case "203":
                                sKeeper_Sport[2].newHash["Odds_" + b[j] + "_O_Cls"] = getOddsClass(sKeeper_Sport[2].oHash["Odds_" + b[j] + "_O"]),
                                sKeeper_Sport[2].newHash["Odds_" + b[j] + "_E_Cls"] = getOddsClass(sKeeper_Sport[2].oHash["Odds_" + b[j] + "_E"]);
                                break;
                            case "401":
                            case "402":
                            case "403":
                            case "404":
                                sKeeper_Sport[2].newHash["Odds_" + b[j] + "_O_Cls"] = getOddsClass(sKeeper_Sport[2].oHash["Odds_" + b[j] + "_O"]),
                                sKeeper_Sport[2].newHash["Odds_" + b[j] + "_U_Cls"] = getOddsClass(sKeeper_Sport[2].oHash["Odds_" + b[j] + "_U"]);
                                break;
                            case "603":
                            case "604":
                            case "605":
                                sKeeper_Sport[2].newHash["Odds_" + b[j] + "_H_Cls"] = getOddsClass(sKeeper_Sport[2].oHash["Odds_" + b[j] + "_H"]),
                                sKeeper_Sport[2].newHash["Odds_" + b[j] + "_A_Cls"] = getOddsClass(sKeeper_Sport[2].oHash["Odds_" + b[j] + "_A"]);
                                break;
                            case "216":
                            case "217":
                                for (var FirstEmpty = !0, iplayer = 1; iplayer <= 99; iplayer++) {
                                    var sIdx = iplayer.toString();
                                    iplayer < 10 && (sIdx = "0" + sIdx),
                                    void 0 !== sKeeper_Sport[2].oHash["Odds_" + b[j] + "_I" + sIdx] && "" != sKeeper_Sport[2].oHash["Odds_" + b[j] + "_I" + sIdx] ? (sKeeper_Sport[2].newHash["Odds_P" + sIdx + "_dsp"] = CLS_LS_ON,
                                    void 0 !== oajaxData[2][sKeeper_Sport[2].oHash["OddsId_" + b[j]] + sKeeper_Sport[2].oHash["Odds_" + b[j] + "_C" + sIdx]] && oajaxData[2][sKeeper_Sport[2].oHash["OddsId_" + b[j]] + sKeeper_Sport[2].oHash["Odds_" + b[j] + "_C" + sIdx]] != sKeeper_Sport[2].oHash["Odds_" + b[j] + "_P" + sIdx] + sKeeper_Sport[2].oHash["Odds_" + b[j] + "_I" + sIdx] ? sKeeper_Sport[2].newHash["Changed_" + b[j] + "_P" + sIdx] = CLS_UPD : sKeeper_Sport[2].newHash["Changed_" + b[j] + "_P" + sIdx] = "") : FirstEmpty ? (sKeeper_Sport[2].newHash["Odds_P" + sIdx + "_dsp"] = iplayer % 2 == 0 ? CLS_LS_ON : CLS_LS_OFF,
                                    FirstEmpty = !1) : sKeeper_Sport[2].newHash["Odds_P" + sIdx + "_dsp"] = CLS_LS_OFF
                                }
                                break;
                            case "28":
                                sKeeper_Sport[2].newHash.Odds_28_hdp = sKeeper_Sport[2].oHash.Odds_28_hdpx.replace(" ", "")
                            }
                        }
                }
                7 != Category[2] && sKeeper_Sport[2].AppendOddsTable()
            }
        }
        var OddsHTML = sKeeper_Sport[2].OddsHTML;
        "" == MoreTmplCategory[2] && (MoreTmplCategory[2] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("Category_2").innerHTML);
        var Category_2 = MoreTmplCategory[2];
        Category_2 = Category_2.replace("{@OddsHTML}", OddsHTML);
        for (var i = 1; i < CategoryList[2].length > 0; i++)
            Category_2 = CategoryList[2][i] > 0 ? Category_2.replace("{@category_disp" + i.toString() + "}", CLS_LS_ON) : Category_2.replace("{@category_disp" + i.toString() + "}", CLS_LS_OFF),
            Category_2 = Category[2] == i ? Category_2.replace("{@current" + i.toString() + "}", "current") : Category_2.replace("{@current" + i.toString() + "}", "");
        Category_2 = haveHotEvent ? Category_2.replace("{@category_disp0}", CLS_LS_ON) : Category_2.replace("{@category_disp0}", CLS_LS_OFF),
        Category_2 = 0 == Category[2] ? Category_2.replace("{@current0}", "current") : Category_2.replace("{@current0}", ""),
        sKeeper_Sport[2].OddsHTML = Category_2,
        sKeeper_Sport[2].TableContainer.innerHTML = sKeeper_Sport[2].OddsHTML,
        oajaxData[2] = new Object;
        for (var o in ajaxData)
            oajaxData[2][o] = ajaxData[o];
        if (void 0 !== ajaxData.B216 && null != ajaxData.B216)
            for (var idx = 6; idx < ajaxData.B216.length; idx += 3)
                oajaxData[2][ajaxData.B216[3] + ajaxData.B216[idx - 2]] = ajaxData.B216[idx - 1] + ajaxData.B216[idx];
        if (void 0 !== ajaxData.B217 && null != ajaxData.B217)
            for (var idx = 6; idx < ajaxData.B217.length; idx += 3)
                oajaxData[2][ajaxData.B217[3] + ajaxData.B217[idx - 2]] = ajaxData.B217[idx - 1] + ajaxData.B217[idx];
        if (Sport_More_End[2] = !0,
        bFromBtnClick[2] && (bFromBtnClick[2] = !1),
        bOpen1st[2]) {
            bOpen1st[2] = !1;
            var tdobj = $("td.moreBetType.tag.displayOn");
            tdobj.html("<div id='moreAddDiv'>" + sKeeper_Sport[2].OddsHTML + "</div>"),
            FocusMoreTd()
        } else {
            var tdobj = $("td.moreBetType.tag.displayOn");
            tdobj.html("<div id='moreAddDiv'>" + sKeeper_Sport[2].OddsHTML + "</div>"),
            dataNull && FocusMoreTd()
        }
    }
}
function addStr(e, _) {
    for (var t = new Array, a = 0; a < e.length; a++)
        t[a] = _ + e[a];
    return t
}
function minuteSel(e) {
    SelIdxFM = parseInt(e, 10),
    SelIdx221 = SelIdxFM,
    SelIdx222 = SelIdxFM,
    SelIdx223 = SelIdxFM,
    SelIdx224 = SelIdxFM,
    SelIdx225 = SelIdxFM,
    SelIdx226 = SelIdxFM,
    SelIdx227 = SelIdxFM
}
function SetHTFTCSSelOdds() {
    var e = !1
      , _ = new Array;
    if ("" != (_ = _.concat(ajaxData416)).slice(4, _.length).toString().replace(/,/g, ""))
        for (var t = 4; t < _.length; t++)
            "" != _[t] && (e = !0);
    if (!e)
        return $("#HalfTime_CorrectScore416_Div").hide(),
        void $("#FullTime_CorrectScore416_Div").hide();
    $("#HalfTime_CorrectScore416_Div").show(),
    $("#FullTime_CorrectScore416_Div").show();
    for (var a = [], r = 0; r < BetType416OddArray.length; r++)
        null != document.getElementById("Odds_416_" + BetType416OddArray[r]) && isNaN(parseFloat(document.getElementById("Odds_416_" + BetType416OddArray[r]).innerText)) && a.push("H" + BetType416OddArray[r].substr(0, 1) + ":" + BetType416OddArray[r].substr(1, 1));
    for (var d = [], s = 0; s < a.length; s++)
        -1 == d.indexOf(a[s]) && d.push(a[s]);
    if (d.length > 0) {
        for (var o = 0; o < d.length; o++)
            null != document.getElementById(d[o]) && void 0 !== document.getElementById(d[o]) && null != document.getElementById(d[o]).parentNode && void 0 !== document.getElementById(d[o]).parentNode && document.getElementById(d[o]).parentNode.removeChild(document.getElementById(d[o]));
        "" != htSession && "" != ftSession && null != document.getElementById("HalfTime_CorrectScore416") || ($("#HalfTime_CorrectScore416_menu li")[0].click(),
        htSession = "",
        ftSession = "")
    }
    if ("" == htSession && "" != ftSession && null != $("#HalfTime_CorrectScore416_menu li") && (htSession = $("#HalfTime_CorrectScore416_menu li")[0].id.replace("H", "")),
    "" != htSession && "" != ftSession && null != document.getElementById("HalfTime_CorrectScore416")) {
        document.getElementById("HalfTime_CorrectScore416").value = htSession.replace("H", ""),
        document.getElementById("HalfTime_CorrectScore416_Txt").title = document.getElementById("H" + htSession).innerHTML,
        document.getElementById("HalfTime_CorrectScore416_Txt").innerHTML = document.getElementById("H" + htSession).innerHTML;
        for (var n = checkFullTimeArray(document.getElementById("HalfTime_CorrectScore416").value), D = 0; D < FullTimeAllArray416.length; D++)
            document.getElementById(FullTimeAllArray416[D]).style.display = "none";
        for (var l = 0; l < n.length; l++)
            document.getElementById(n[l]).style.display = "";
        document.getElementById("FullTime_CorrectScore416").value = ftSession.replace("F", ""),
        document.getElementById("FullTime_CorrectScore416_Txt").title = document.getElementById("F" + ftSession).innerHTML,
        document.getElementById("FullTime_CorrectScore416_Txt").innerHTML = document.getElementById("F" + ftSession).innerHTML,
        changeOddsSelect()
    }
}
function CheckHaveOdds(e) {
    return null == e.innerHTML.match(/[0-9]/g) ? (e.style.cursor = "default",
    !1) : (e.style.cursor = "pointer",
    !0)
}
function mover(e, _, t) {
    for (var a = $(".mover" + e), r = 0; r < a.length; r++)
        a[r].className = a[r].className.replace(_, t)
}
function changeFullTimeSelect(e) {
    var _ = checkFullTimeArray(e);
    document.getElementById("FullTime_CorrectScore416").value = _[0].replace("F", ""),
    document.getElementById("FullTime_CorrectScore416_Txt").title = document.getElementById(_[0]).innerHTML,
    document.getElementById("FullTime_CorrectScore416_Txt").innerHTML = document.getElementById(_[0]).innerHTML;
    for (var t = 0; t < FullTimeAllArray416.length; t++)
        document.getElementById(FullTimeAllArray416[t]).style.display = "none";
    for (var a = 0; a < _.length; a++)
        document.getElementById(_[a]).style.display = "";
    htSession = document.getElementById("HalfTime_CorrectScore416").value,
    changeOddsSelect()
}
function SwitchCategory(e) {
    Category[1] = e,
    GetSoccerMore(null)
}
function SwitchBasketballCategory(e) {
    Category[2] = e,
    GetBasketballMore(null)
}
function SwitchEsportsCategory(e) {
    Category[43] = e,
    GetEsportsMore(null)
}
function changeOddsSelect() {
    ftSession = document.getElementById("FullTime_CorrectScore416").value;
    for (var e = "Odds_416_" + (document.getElementById("HalfTime_CorrectScore416").value.replace(":", "").replace("+", "UP") + document.getElementById("FullTime_CorrectScore416").value.replace(":", "").replace("+", "UP")), _ = 0; _ < BetType416OddArray.length; _++)
        document.getElementById("Odds_416_" + BetType416OddArray[_]).style.display = "none";
    document.getElementById(e).style.display = ""
}
function checkFullTimeArray(e) {
    var _ = null;
    switch (e) {
    case "0:0":
        _ = HTArray416_00;
        break;
    case "0:1":
        _ = HTArray416_01;
        break;
    case "0:2":
        _ = HTArray416_02;
        break;
    case "0:3":
        _ = HTArray416_03;
        break;
    case "1:0":
        _ = HTArray416_10;
        break;
    case "1:1":
        _ = HTArray416_11;
        break;
    case "1:2":
        _ = HTArray416_12;
        break;
    case "1:3":
        _ = HTArray416_13;
        break;
    case "2:0":
        _ = HTArray416_20;
        break;
    case "2:1":
        _ = HTArray416_21;
        break;
    case "2:2":
        _ = HTArray416_22;
        break;
    case "2:3":
        _ = HTArray416_23;
        break;
    case "3:0":
        _ = HTArray416_30;
        break;
    case "3:1":
        _ = HTArray416_31;
        break;
    case "3:2":
        _ = HTArray416_32;
        break;
    default:
        _ = HTArray416_33
    }
    return _
}
function sortObject(e) {
    var _, t = {}, a = [];
    for (_ in e)
        e.hasOwnProperty(_) && a.push(_);
    for (a.sort(),
    _ = 0; _ < a.length; _++)
        t[a[_]] = e[a[_]];
    return t
}
function TimeRangeSelecter(e) {
    if (PreSelIdxFM != SelIdxFM)
        PreSelIdxFM = SelIdxFM,
        GetSoccerMore(null);
    else {
        var _ = document.getElementById(e);
        "visible" == _.style.visibility ? _.style.visibility = "hidden" : _.style.visibility = "visible"
    }
}
function genTimeRange(e, _) {
    var t = 0
      , a = 0
      , r = ""
      , d = "";
    "221" == e || "223" == e || "225" == e || "226" == e ? (a = t = _,
    d = r = t >= 10 ? t + "" : "0" + t) : (a = (t = _) + 4,
    r = t >= 10 ? t + "" : "0" + t,
    d = a >= 10 ? a + "" : "0" + a);
    var s = "(" + r + ":00-" + d + ":59)"
      , o = r + "'"
      , n = r + ":00";
    return new Array(s,o,n)
}
function ShowHint(e) {
    switch (e) {
    case 0:
        fmHelpFlg = 0,
        window.open("/index_info.php?page=4&Key=FastMarkets", "FastMarketsR");
        break;
    default:
        var _ = "hint" + e;
        if ("hidden" == document.getElementById(_).style.visibility) {
            for (i = 0; i <= FmHelpList.length - 1; i += 1)
                null != document.getElementById(FmHelpList[i]) && (document.getElementById(FmHelpList[i]).style.visibility = "hidden");
            document.getElementById(_).style.visibility = "visible",
            fmHelpFlg = e
        } else
            document.getElementById(_).style.visibility = "hidden",
            fmHelpFlg = null
    }
}
function getBetTypeHint(e, _) {
    var t = RES_BetTypeNameHint[e];
    switch (_.length) {
    case 2:
        t = t.replace("{0}", parseInt(_, 10));
        break;
    default:
        t = (t = t.replace("{0}", parseInt(_.substr(0, 2), 10))).replace("{1}", parseInt(_.substr(2, 2), 10))
    }
    return t
}
function getBetTypeName(e, _) {
    switch (e) {
    case "9068":
        return typename = _ > 3 ? 90684 : parseInt(e.toString() + _),
        RES_BetTypeName[typename]
    }
    return RES_BetTypeName[e]
}
function getMoreObj(e, _) {
    for (var t, a = 0; a < e.length; a++)
        if ((t = e[a]).OddsId == _)
            return t;
    return null
}
function setMoreObj(e, _) {
    if ("" != _.OddsId) {
        for (var t = !1, a = 0; a < e.length; a++)
            e[a].OddsId == _.OddsId && (t = !0,
            e[a] = _);
        t || (e[e.length] = _)
    }
}
var COMMON_DEF = new Array;
COMMON_DEF[0] = new Array("MUID","MatchId","MatchCode","MatchCount","LeagueId","LeagueName","HomeName","AwayName","KickoffTime","StatsId","SportRadar","StreamingId","ShowTime","HasLive","Favorite","TimerSuspend","FavLeague"),
COMMON_DEF[1] = new Array("SportType"),
COMMON_DEF[2] = new Array("Combo"),
COMMON_DEF[3] = new Array("IsMainMarket","GameStatus"),
COMMON_DEF[4] = new Array("Category","HotEvent","MatchId"),
COMMON_DEF[5] = new Array("Category","HotEvent","MatchId","LeagueName","HomeName","AwayName","ScoreH","ScoreA"),
COMMON_DEF[6] = new Array("GameStatus");
var FIELDS_DEF = new Array;
FIELDS_DEF[0] = new Array("FlagLive","LivePeriod","CsStatus","InjuryTime","ScoreH","ScoreA"),
FIELDS_DEF[5] = new Array("MoreCount"),
FIELDS_DEF[1] = new Array("RedCardH","RedCardA","MoreCount"),
FIELDS_DEF[2] = new Array("MoreCount"),
FIELDS_DEF[8] = new Array("PitcherH","PitcherA"),
FIELDS_DEF[43] = new Array("BestOfMap","IsStartingSoon","MoveBO3Down","OverTimeSession","IsMainMarket"),
FIELDS_DEF[161] = new Array("RedCardH","RedCardA","MoreCount","Ball1","Ball2");
var ExtFIELDS_DEF = new Array;
ExtFIELDS_DEF[1] = new Array("IsSuperLive","IsFastMarket","GVType","IsLiveChart");
var MultiSportODDS_DEF = new Array;
MultiSportODDS_DEF[0] = new Array("OddsId_0","Odds_0"),
MultiSportODDS_DEF[1] = new Array("OddsId_1","Value_1","Odds_1_H","Odds_1_A","FavorF"),
MultiSportODDS_DEF[2] = new Array("OddsId_2","Odds_2_O","Odds_2_E"),
MultiSportODDS_DEF[3] = new Array("OddsId_3","Goal_3","Odds_3_O","Odds_3_U"),
MultiSportODDS_DEF[4] = new Array("OddsId_4","Odds_4_00","Odds_4_01","Odds_4_02","Odds_4_03","Odds_4_04","Odds_4_05","Odds_4_10","Odds_4_11","Odds_4_12","Odds_4_13","Odds_4_14","Odds_4_20","Odds_4_21","Odds_4_22","Odds_4_23","Odds_4_24","Odds_4_30","Odds_4_31","Odds_4_32","Odds_4_33","Odds_4_34","Odds_4_40","Odds_4_41","Odds_4_42","Odds_4_43","Odds_4_44","Odds_4_50"),
MultiSportODDS_DEF[5] = new Array("OddsId_5","Odds_5_1","Odds_5_X","Odds_5_2"),
MultiSportODDS_DEF[6] = new Array("OddsId_6","Odds_6_01","Odds_6_23","Odds_6_46","Odds_6_7"),
MultiSportODDS_DEF[7] = new Array("OddsId_7","Value_7","Odds_7_H","Odds_7_A","FavorH1"),
MultiSportODDS_DEF[8] = new Array("OddsId_8","Goal_8","Odds_8_O","Odds_8_U"),
MultiSportODDS_DEF[11] = new Array("OddsId_11","Odds_11_08","Odds_11_911","Odds_11_12"),
MultiSportODDS_DEF[12] = new Array("OddsId_12","Odds_12_O","Odds_12_E"),
MultiSportODDS_DEF[14] = new Array("OddsId_14","Odds_14_NO","Odds_14_HF","Odds_14_HL","Odds_14_AF","Odds_14_AL"),
MultiSportODDS_DEF[15] = new Array("OddsId_15","Odds_15_1","Odds_15_X","Odds_15_2"),
MultiSportODDS_DEF[16] = new Array("OddsId_16","Odds_16_HH","Odds_16_HD","Odds_16_HA","Odds_16_DH","Odds_16_DD","Odds_16_DA","Odds_16_AH","Odds_16_AD","Odds_16_AA"),
MultiSportODDS_DEF[17] = new Array("OddsId_17","Value_17","Odds_17_H","Odds_17_A","FavorF_17"),
MultiSportODDS_DEF[18] = new Array("OddsId_18","Goal_18","Odds_18_O","Odds_18_U"),
MultiSportODDS_DEF[20] = new Array("OddsId_20","Odds_20_H","Odds_20_A"),
MultiSportODDS_DEF[21] = new Array("OddsId_21","Odds_21_H","Odds_21_A"),
MultiSportODDS_DEF[22] = new Array("OddsId_22","Odds_22_1","Odds_22_X","Odds_22_2"),
MultiSportODDS_DEF[30] = new Array("OddsId_30","Odds_30_00","Odds_30_01","Odds_30_02","Odds_30_03","Odds_30_04","Odds_30_10","Odds_30_11","Odds_30_12","Odds_30_13","Odds_30_20","Odds_30_21","Odds_30_22","Odds_30_23","Odds_30_30","Odds_30_31","Odds_30_32","Odds_30_33","Odds_30_40"),
MultiSportODDS_DEF[81] = new Array("OddsId_81","Goal_81","Odds_81_O","Odds_81_U"),
MultiSportODDS_DEF[82] = new Array("OddsId_82","Goal_82","Odds_82_O","Odds_82_U"),
MultiSportODDS_DEF[83] = new Array("OddsId_83","Odds_83_O","Odds_83_E"),
MultiSportODDS_DEF[84] = new Array("OddsId_84","Odds_84_O","Odds_84_E"),
MultiSportODDS_DEF[85] = new Array("OddsId_85","Goal_85","Odds_85_O","Odds_85_U"),
MultiSportODDS_DEF[86] = new Array("OddsId_86","Odds_86_O","Odds_86_E"),
MultiSportODDS_DEF[87] = new Array("OddsId_87","Goal_87","Odds_87_H","Odds_87_L"),
MultiSportODDS_DEF[88] = new Array("OddsId_88","Odds_88_H","Odds_88_A"),
MultiSportODDS_DEF[89] = new Array("OddsId_89","Odds_89_OO","Odds_89_UO","Odds_89_OE","Odds_89_UE"),
MultiSportODDS_DEF[901] = new Array("OddsId_901","Odds_90_1_1","Odds_90_1_2","Odds_90_1_3","Odds_90_1_4","Odds_90_1_5","Odds_90_1_6","Odds_90_1_7","Odds_90_1_8","Odds_90_1_9","Odds_90_1_10","Odds_90_1_11","Odds_90_1_12","Odds_90_1_13","Odds_90_1_14","Odds_90_1_15"),
MultiSportODDS_DEF[902] = new Array("OddsId_902","Odds_90_2_1","Odds_90_2_2","Odds_90_2_3","Odds_90_2_4","Odds_90_2_5"),
MultiSportODDS_DEF[903] = new Array("OddsId_903","Odds_90_3_1","Odds_90_3_2","Odds_90_3_3"),
MultiSportODDS_DEF[904] = new Array("OddsId_904","Odds_90_4_1","Odds_90_4_2","Odds_90_4_3","Odds_90_4_4","Odds_90_4_5"),
MultiSportODDS_DEF[905] = new Array("OddsId_905","Odds_90_5_1","Odds_90_5_2","Odds_90_5_3","Odds_90_5_4","Odds_90_5_5","Odds_90_5_6","Odds_90_5_7","Odds_90_5_8","Odds_90_5_9","Odds_90_5_10","Odds_90_5_11","Odds_90_5_12","Odds_90_5_13","Odds_90_5_14","Odds_90_5_15","Odds_90_5_16","Odds_90_5_17","Odds_90_5_18","Odds_90_5_19","Odds_90_5_20","Odds_90_5_21","Odds_90_5_22","Odds_90_5_23","Odds_90_5_24","Odds_90_5_25","Odds_90_5_26","Odds_90_5_27","Odds_90_5_28","Odds_90_5_29","Odds_90_5_30","Odds_90_5_31","Odds_90_5_32","Odds_90_5_33","Odds_90_5_34","Odds_90_5_35","Odds_90_5_36","Odds_90_5_37","Odds_90_5_38","Odds_90_5_39","Odds_90_5_40","Odds_90_5_41","Odds_90_5_42","Odds_90_5_43","Odds_90_5_44","Odds_90_5_45","Odds_90_5_46","Odds_90_5_47","Odds_90_5_48","Odds_90_5_49","Odds_90_5_50","Odds_90_5_51","Odds_90_5_52","Odds_90_5_53","Odds_90_5_54","Odds_90_5_55","Odds_90_5_56","Odds_90_5_57","Odds_90_5_58","Odds_90_5_59","Odds_90_5_60","Odds_90_5_61","Odds_90_5_62","Odds_90_5_63","Odds_90_5_64","Odds_90_5_65","Odds_90_5_66","Odds_90_5_67","Odds_90_5_68","Odds_90_5_69","Odds_90_5_70","Odds_90_5_71","Odds_90_5_72","Odds_90_5_73","Odds_90_5_74","Odds_90_5_75"),
MultiSportODDS_DEF[90] = MultiSportODDS_DEF[901].concat(MultiSportODDS_DEF[902]).concat(MultiSportODDS_DEF[903]).concat(MultiSportODDS_DEF[904]).concat(MultiSportODDS_DEF[905]),
MultiSportODDS_DEF[24] = new Array("OddsId_24","Odds_24_1X","Odds_24_12","Odds_24_2X"),
MultiSportODDS_DEF[25] = new Array("OddsId_25","Odds_25_H","Odds_25_A"),
MultiSportODDS_DEF[26] = new Array("OddsId_26","Odds_26_O","Odds_26_N","Odds_26_B"),
MultiSportODDS_DEF[27] = new Array("OddsId_27","Odds_27_H","Odds_27_A"),
MultiSportODDS_DEF[13] = new Array("OddsId_13","Odds_13_HY","Odds_13_HN","Odds_13_AY","Odds_13_AN"),
MultiSportODDS_DEF[28] = new Array("OddsId_28","Odds_28_1","Odds_28_X","Odds_28_2","Odds_28_hdp1","Odds_28_hdpx","Odds_28_hdp2"),
MultiSportODDS_DEF[121] = new Array("OddsId_121","Odds_121_A","Odds_121_H"),
MultiSportODDS_DEF[122] = new Array("OddsId_122","Odds_122_H","Odds_122_X"),
MultiSportODDS_DEF[123] = new Array("OddsId_123","Odds_123_H","Odds_123_A"),
MultiSportODDS_DEF[126] = new Array("OddsId_126","Odds_126_01","Odds_126_23","Odds_126_4"),
MultiSportODDS_DEF[127] = new Array("OddsId_127","Odds_127_NO","Odds_127_HF","Odds_127_HL","Odds_127_AF","Odds_127_AL"),
MultiSportODDS_DEF[128] = new Array("OddsId_128","Odds_128_OO","Odds_128_OE","Odds_128_EO","Odds_128_EE"),
MultiSportODDS_DEF[133] = new Array("OddsId_133","Odds_133_HY","Odds_133_HN"),
MultiSportODDS_DEF[134] = new Array("OddsId_134","Odds_134_AY","Odds_134_AN"),
MultiSportODDS_DEF[135] = new Array("OddsId_135","Odds_135_Y","Odds_135_N"),
MultiSportODDS_DEF[140] = new Array("OddsId_140","Odds_140_1H","Odds_140_2H","Odds_140_TIE"),
MultiSportODDS_DEF[141] = new Array("OddsId_141","Odds_141_1H","Odds_141_2H","Odds_141_TIE"),
MultiSportODDS_DEF[142] = new Array("OddsId_142","Odds_142_1H","Odds_142_2H","Odds_142_TIE"),
MultiSportODDS_DEF[145] = new Array("OddsId_145","Odds_145_Y","Odds_145_N"),
MultiSportODDS_DEF[146] = new Array("OddsId_146","Odds_146_Y","Odds_146_N"),
MultiSportODDS_DEF[147] = new Array("OddsId_147","Odds_147_HY","Odds_147_HN"),
MultiSportODDS_DEF[148] = new Array("OddsId_148","Odds_148_AY","Odds_148_AN"),
MultiSportODDS_DEF[149] = new Array("OddsId_149","Odds_149_HY","Odds_149_HN"),
MultiSportODDS_DEF[150] = new Array("OddsId_150","Odds_150_AY","Odds_150_AN"),
MultiSportODDS_DEF[151] = new Array("OddsId_151","Odds_151_1X","Odds_151_2X","Odds_151_12"),
MultiSportODDS_DEF[152] = new Array("OddsId_152","Odds_152_0000","Odds_152_0010","Odds_152_0001","Odds_152_0020","Odds_152_0011","Odds_152_0002","Odds_152_0030","Odds_152_0021","Odds_152_0012","Odds_152_0003","Odds_152_004UP","Odds_152_1010","Odds_152_1020","Odds_152_1011","Odds_152_1030","Odds_152_1021","Odds_152_1012","Odds_152_104UP","Odds_152_0101","Odds_152_0111","Odds_152_0102","Odds_152_0121","Odds_152_0112","Odds_152_0103","Odds_152_014UP","Odds_152_1111","Odds_152_1121","Odds_152_1112","Odds_152_114UP","Odds_152_2020","Odds_152_2030","Odds_152_2021","Odds_152_204UP","Odds_152_0202","Odds_152_0212","Odds_152_0203","Odds_152_024UP","Odds_152_2121","Odds_152_214UP","Odds_152_1212","Odds_152_124UP","Odds_152_3030","Odds_152_304UP","Odds_152_0303","Odds_152_034UP","Odds_152_4UP4UP"),
MultiSportODDS_DEF[153] = new Array("OddsId_153","Value_153","Odds_153_H","Odds_153_A","FavorF_153"),
MultiSportODDS_DEF[154] = new Array("OddsId","Odds_0","Odds_1","Resourceid"),
MultiSportODDS_DEF[155] = new Array("OddsId","Value","Odds_0","Odds_1","FavorF","Resourceid"),
MultiSportODDS_DEF[156] = new Array("OddsId","Goal","Odds_0","Odds_1","Resourceid"),
MultiSportODDS_DEF[185] = new Array("OddsId_185","Odds_185_H","Odds_185_A"),
MultiSportODDS_DEF[191] = new Array("OddsId_191","Odds_191_H","Odds_191_A"),
MultiSportODDS_DEF[178] = new Array("OddsId_178","Goal_178","Odds_178_O","Odds_178_U"),
MultiSportODDS_DEF[204] = new Array("OddsId_204","Goal_204","Odds_204_O","Odds_204_U"),
MultiSportODDS_DEF[205] = new Array("OddsId_205","Goal_205","Odds_205_O","Odds_205_U"),
MultiSportODDS_DEF[189] = new Array("OddsId_189","Odds_189_Y","Odds_189_N"),
MultiSportODDS_DEF[190] = new Array("OddsId_190","Odds_190_Y","Odds_190_N"),
MultiSportODDS_DEF[197] = new Array("OddsId_197","Goal_197","Odds_197_O","Odds_197_U"),
MultiSportODDS_DEF[198] = new Array("OddsId_198","Goal_198","Odds_198_O","Odds_198_U"),
MultiSportODDS_DEF[167] = new Array("OddsId_167","Odds_167_1","Odds_167_X","Odds_167_2"),
MultiSportODDS_DEF[176] = new Array("OddsId_176","Odds_176_1","Odds_176_X","Odds_176_2"),
MultiSportODDS_DEF[177] = new Array("OddsId_177","Odds_177_1","Odds_177_X","Odds_177_2"),
MultiSportODDS_DEF[157] = new Array("OddsId_157","Odds_157_O","Odds_157_E"),
MultiSportODDS_DEF[184] = new Array("OddsId_184","Odds_184_O","Odds_184_E"),
MultiSportODDS_DEF[194] = new Array("OddsId_194","Odds_194_O","Odds_194_E"),
MultiSportODDS_DEF[203] = new Array("OddsId_203","Odds_203_O","Odds_203_E"),
MultiSportODDS_DEF[165] = new Array("OddsId_165","Odds_165_00","Odds_165_10","Odds_165_20","Odds_165_01","Odds_165_11","Odds_4_02"),
MultiSportODDS_DEF[166] = new Array("OddsId_166","Odds_166_00","Odds_166_10","Odds_166_20","Odds_166_30","Odds_166_01","Odds_166_11","Odds_166_21","Odds_166_02","Odds_166_12","Odds_166_03"),
MultiSportODDS_DEF[159] = new Array("OddsId_159","Odds_159_G1","Odds_159_G2","Odds_159_G3","Odds_159_G4","Odds_159_G5","Odds_159_G6","Odds_159_G0"),
MultiSportODDS_DEF[161] = new Array("OddsId_161","Odds_161_G0","Odds_161_G1","Odds_161_G2","Odds_161_G3"),
MultiSportODDS_DEF[162] = new Array("OddsId_162","Odds_162_G0","Odds_162_G1","Odds_162_G2","Odds_162_G3"),
MultiSportODDS_DEF[179] = new Array("OddsId_179","Odds_179_G0","Odds_179_G1","Odds_179_G2","Odds_179_G3","Odds_179_G4"),
MultiSportODDS_DEF[181] = new Array("OddsId_181","Odds_181_G0","Odds_181_G1","Odds_181_G2","Odds_181_G3"),
MultiSportODDS_DEF[182] = new Array("OddsId_182","Odds_182_G0","Odds_182_G1","Odds_182_G2","Odds_182_G3"),
MultiSportODDS_DEF[187] = new Array("OddsId_187","Odds_187_G0","Odds_187_G1","Odds_187_G2"),
MultiSportODDS_DEF[143] = new Array("OddsId_143","Goal_143","Odds_143_HU","Odds_143_HO","Odds_143_DU","Odds_143_DO","Odds_143_AU","Odds_143_AO"),
MultiSportODDS_DEF[144] = new Array("OddsId_144","Goal_144","Odds_144_HU","Odds_144_HO","Odds_144_DU","Odds_144_DO","Odds_144_AU","Odds_144_AO"),
MultiSportODDS_DEF[164] = new Array("OddsId_164","Odds_164_1","Odds_164_X","Odds_164_2"),
MultiSportODDS_DEF[168] = new Array("OddsId_168","Odds_168_H","Odds_168_A"),
MultiSportODDS_DEF[169] = new Array("OddsId_169","Odds_169_115","Odds_169_1630","Odds_169_3145","Odds_169_4660","Odds_169_6175","Odds_169_7690"),
MultiSportODDS_DEF[170] = new Array("OddsId_170","Odds_170_H","Odds_170_A","Odds_170_B","Odds_170_N"),
MultiSportODDS_DEF[171] = new Array("OddsId_171","Odds_171_H1","Odds_171_H2","Odds_171_H3","Odds_171_A1","Odds_171_A2","Odds_171_A3","Odds_171_NG","Odds_171_D"),
MultiSportODDS_DEF[172] = new Array("OddsId_172","Odds_172_HH","Odds_172_DH","Odds_172_AH","Odds_172_HA","Odds_172_DA","Odds_172_AA","Odds_172_NO"),
MultiSportODDS_DEF[173] = new Array("OddsId_173","Odds_173_Y","Odds_173_N"),
MultiSportODDS_DEF[174] = new Array("OddsId_174","Odds_174_Y","Odds_174_N"),
MultiSportODDS_DEF[175] = new Array("OddsId_175","Odds_175_HR","Odds_175_HE","Odds_175_HP","Odds_175_AR","Odds_175_AE","Odds_175_AP"),
MultiSportODDS_DEF[180] = new Array("OddsId_180","Odds_180_1","Odds_180_X","Odds_180_2"),
MultiSportODDS_DEF[186] = new Array("OddsId_186","Odds_186_HD","Odds_186_HA","Odds_186_DA"),
MultiSportODDS_DEF[188] = new Array("OddsId_188","Odds_188_Y","Odds_188_N"),
MultiSportODDS_DEF[192] = new Array("OddsId_192","Odds_192_110","Odds_192_1120","Odds_192_2130","Odds_192_3140","Odds_192_4150","Odds_192_5160","Odds_192_6170","Odds_192_7180","Odds_192_8190"),
MultiSportODDS_DEF[193] = new Array("OddsId_193","Odds_193_115","Odds_193_1630","Odds_193_3145","Odds_193_4660","Odds_193_6175","Odds_193_7690"),
MultiSportODDS_DEF[195] = new Array("OddsId_195","Odds_195_02","Odds_195_34","Odds_195_56","Odds_195_7"),
MultiSportODDS_DEF[196] = new Array("OddsId_196","Odds_196_02","Odds_196_34","Odds_196_56","Odds_196_7"),
MultiSportODDS_DEF[200] = new Array("OddsId_200","Odds_200_01","Odds_200_2","Odds_200_3","Odds_200_4"),
MultiSportODDS_DEF[201] = new Array("OddsId_201","Odds_201_01","Odds_201_2","Odds_201_3","Odds_201_4"),
MultiSportODDS_DEF[202] = new Array("OddsId_202","Odds_202_04","Odds_202_56","Odds_202_7"),
MultiSportODDS_DEF[206] = new Array("OddsId_206","Odds_206_H","Odds_206_A","Odds_206_N"),
MultiSportODDS_DEF[207] = new Array("OddsId_207","Odds_207_H","Odds_207_A","Odds_207_N"),
MultiSportODDS_DEF[208] = new Array("OddsId_208","Odds_208_H","Odds_208_A","Odds_208_N"),
MultiSportODDS_DEF[209] = new Array("OddsId_209","Odds_209_H","Odds_209_A","Odds_209_N"),
MultiSportODDS_DEF[210] = new Array("OddsId_210","Odds_210_Y","Odds_210_N"),
MultiSportODDS_DEF[211] = new Array("OddsId_211","Odds_211_Y","Odds_211_N"),
MultiSportODDS_DEF[212] = new Array("OddsId_212","Odds_212_Y","Odds_212_N"),
MultiSportODDS_DEF[213] = new Array("OddsId_213","Odds_213_Y","Odds_213_N"),
MultiSportODDS_DEF[214] = new Array("OddsId_214","Odds_214_Y","Odds_214_N"),
MultiSportODDS_DEF[215] = new Array("OddsId_215","Odds_215_Y","Odds_215_N"),
MultiSportODDS_DEF[216] = new Array("OddsId_216","Odds_216_C01","Odds_216_P01","Odds_216_I01","Odds_216_C02","Odds_216_P02","Odds_216_I02","Odds_216_C03","Odds_216_P03","Odds_216_I03","Odds_216_C04","Odds_216_P04","Odds_216_I04","Odds_216_C05","Odds_216_P05","Odds_216_I05","Odds_216_C06","Odds_216_P06","Odds_216_I06","Odds_216_C07","Odds_216_P07","Odds_216_I07","Odds_216_C08","Odds_216_P08","Odds_216_I08","Odds_216_C09","Odds_216_P09","Odds_216_I09","Odds_216_C10","Odds_216_P10","Odds_216_I10","Odds_216_C11","Odds_216_P11","Odds_216_I11","Odds_216_C12","Odds_216_P12","Odds_216_I12","Odds_216_C13","Odds_216_P13","Odds_216_I13","Odds_216_C14","Odds_216_P14","Odds_216_I14","Odds_216_C15","Odds_216_P15","Odds_216_I15","Odds_216_C16","Odds_216_P16","Odds_216_I16","Odds_216_C17","Odds_216_P17","Odds_216_I17","Odds_216_C18","Odds_216_P18","Odds_216_I18","Odds_216_C19","Odds_216_P19","Odds_216_I19","Odds_216_C20","Odds_216_P20","Odds_216_I20","Odds_216_C21","Odds_216_P21","Odds_216_I21","Odds_216_C22","Odds_216_P22","Odds_216_I22","Odds_216_C23","Odds_216_P23","Odds_216_I23","Odds_216_C24","Odds_216_P24","Odds_216_I24","Odds_216_C25","Odds_216_P25","Odds_216_I25","Odds_216_C26","Odds_216_P26","Odds_216_I26","Odds_216_C27","Odds_216_P27","Odds_216_I27","Odds_216_C28","Odds_216_P28","Odds_216_I28","Odds_216_C29","Odds_216_P29","Odds_216_I29","Odds_216_C30","Odds_216_P30","Odds_216_I30","Odds_216_C31","Odds_216_P31","Odds_216_I31","Odds_216_C32","Odds_216_P32","Odds_216_I32","Odds_216_C33","Odds_216_P33","Odds_216_I33","Odds_216_C34","Odds_216_P34","Odds_216_I34","Odds_216_C35","Odds_216_P35","Odds_216_I35","Odds_216_C36","Odds_216_P36","Odds_216_I36","Odds_216_C37","Odds_216_P37","Odds_216_I37","Odds_216_C38","Odds_216_P38","Odds_216_I38","Odds_216_C39","Odds_216_P39","Odds_216_I39","Odds_216_C40","Odds_216_P40","Odds_216_I40","Odds_216_C41","Odds_216_P41","Odds_216_I41","Odds_216_C42","Odds_216_P42","Odds_216_I42","Odds_216_C43","Odds_216_P43","Odds_216_I43","Odds_216_C44","Odds_216_P44","Odds_216_I44","Odds_216_C45","Odds_216_P45","Odds_216_I45","Odds_216_C46","Odds_216_P46","Odds_216_I46","Odds_216_C47","Odds_216_P47","Odds_216_I47","Odds_216_C48","Odds_216_P48","Odds_216_I48","Odds_216_C49","Odds_216_P49","Odds_216_I49","Odds_216_C50","Odds_216_P50","Odds_216_I50","Odds_216_C51","Odds_216_P51","Odds_216_I51","Odds_216_C52","Odds_216_P52","Odds_216_I52","Odds_216_C53","Odds_216_P53","Odds_216_I53","Odds_216_C54","Odds_216_P54","Odds_216_I54","Odds_216_C55","Odds_216_P55","Odds_216_I55","Odds_216_C56","Odds_216_P56","Odds_216_I56","Odds_216_C57","Odds_216_P57","Odds_216_I57","Odds_216_C58","Odds_216_P58","Odds_216_I58","Odds_216_C59","Odds_216_P59","Odds_216_I59","Odds_216_C60","Odds_216_P60","Odds_216_I60","Odds_216_C61","Odds_216_P61","Odds_216_I61","Odds_216_C62","Odds_216_P62","Odds_216_I62","Odds_216_C63","Odds_216_P63","Odds_216_I63","Odds_216_C64","Odds_216_P64","Odds_216_I64","Odds_216_C65","Odds_216_P65","Odds_216_I65","Odds_216_C66","Odds_216_P66","Odds_216_I66","Odds_216_C67","Odds_216_P67","Odds_216_I67","Odds_216_C68","Odds_216_P68","Odds_216_I68","Odds_216_C69","Odds_216_P69","Odds_216_I69","Odds_216_C70","Odds_216_P70","Odds_216_I70","Odds_216_C71","Odds_216_P71","Odds_216_I71","Odds_216_C72","Odds_216_P72","Odds_216_I72","Odds_216_C73","Odds_216_P73","Odds_216_I73","Odds_216_C74","Odds_216_P74","Odds_216_I74","Odds_216_C75","Odds_216_P75","Odds_216_I75","Odds_216_C76","Odds_216_P76","Odds_216_I76","Odds_216_C77","Odds_216_P77","Odds_216_I77","Odds_216_C78","Odds_216_P78","Odds_216_I78","Odds_216_C79","Odds_216_P79","Odds_216_I79","Odds_216_C80","Odds_216_P80","Odds_216_I80","Odds_216_C81","Odds_216_P81","Odds_216_I81","Odds_216_C82","Odds_216_P82","Odds_216_I82","Odds_216_C83","Odds_216_P83","Odds_216_I83","Odds_216_C84","Odds_216_P84","Odds_216_I84","Odds_216_C85","Odds_216_P85","Odds_216_I85","Odds_216_C86","Odds_216_P86","Odds_216_I86","Odds_216_C87","Odds_216_P87","Odds_216_I87","Odds_216_C88","Odds_216_P88","Odds_216_I88","Odds_216_C89","Odds_216_P89","Odds_216_I89","Odds_216_C90","Odds_216_P90","Odds_216_I90","Odds_216_C91","Odds_216_P91","Odds_216_I91","Odds_216_C92","Odds_216_P92","Odds_216_I92","Odds_216_C93","Odds_216_P93","Odds_216_I93","Odds_216_C94","Odds_216_P94","Odds_216_I94","Odds_216_C95","Odds_216_P95","Odds_216_I95","Odds_216_C96","Odds_216_P96","Odds_216_I96","Odds_216_C97","Odds_216_P97","Odds_216_I97","Odds_216_C98","Odds_216_P98","Odds_216_I98","Odds_216_C99","Odds_216_P99","Odds_216_I99"),
MultiSportODDS_DEF[217] = new Array("OddsId_217","Odds_217_C01","Odds_217_P01","Odds_217_I01","Odds_217_C02","Odds_217_P02","Odds_217_I02","Odds_217_C03","Odds_217_P03","Odds_217_I03","Odds_217_C04","Odds_217_P04","Odds_217_I04","Odds_217_C05","Odds_217_P05","Odds_217_I05","Odds_217_C06","Odds_217_P06","Odds_217_I06","Odds_217_C07","Odds_217_P07","Odds_217_I07","Odds_217_C08","Odds_217_P08","Odds_217_I08","Odds_217_C09","Odds_217_P09","Odds_217_I09","Odds_217_C10","Odds_217_P10","Odds_217_I10","Odds_217_C11","Odds_217_P11","Odds_217_I11","Odds_217_C12","Odds_217_P12","Odds_217_I12","Odds_217_C13","Odds_217_P13","Odds_217_I13","Odds_217_C14","Odds_217_P14","Odds_217_I14","Odds_217_C15","Odds_217_P15","Odds_217_I15","Odds_217_C16","Odds_217_P16","Odds_217_I16","Odds_217_C17","Odds_217_P17","Odds_217_I17","Odds_217_C18","Odds_217_P18","Odds_217_I18","Odds_217_C19","Odds_217_P19","Odds_217_I19","Odds_217_C20","Odds_217_P20","Odds_217_I20","Odds_217_C21","Odds_217_P21","Odds_217_I21","Odds_217_C22","Odds_217_P22","Odds_217_I22","Odds_217_C23","Odds_217_P23","Odds_217_I23","Odds_217_C24","Odds_217_P24","Odds_217_I24","Odds_217_C25","Odds_217_P25","Odds_217_I25","Odds_217_C26","Odds_217_P26","Odds_217_I26","Odds_217_C27","Odds_217_P27","Odds_217_I27","Odds_217_C28","Odds_217_P28","Odds_217_I28","Odds_217_C29","Odds_217_P29","Odds_217_I29","Odds_217_C30","Odds_217_P30","Odds_217_I30","Odds_217_C31","Odds_217_P31","Odds_217_I31","Odds_217_C32","Odds_217_P32","Odds_217_I32","Odds_217_C33","Odds_217_P33","Odds_217_I33","Odds_217_C34","Odds_217_P34","Odds_217_I34","Odds_217_C35","Odds_217_P35","Odds_217_I35","Odds_217_C36","Odds_217_P36","Odds_217_I36","Odds_217_C37","Odds_217_P37","Odds_217_I37","Odds_217_C38","Odds_217_P38","Odds_217_I38","Odds_217_C39","Odds_217_P39","Odds_217_I39","Odds_217_C40","Odds_217_P40","Odds_217_I40","Odds_217_C41","Odds_217_P41","Odds_217_I41","Odds_217_C42","Odds_217_P42","Odds_217_I42","Odds_217_C43","Odds_217_P43","Odds_217_I43","Odds_217_C44","Odds_217_P44","Odds_217_I44","Odds_217_C45","Odds_217_P45","Odds_217_I45","Odds_217_C46","Odds_217_P46","Odds_217_I46","Odds_217_C47","Odds_217_P47","Odds_217_I47","Odds_217_C48","Odds_217_P48","Odds_217_I48","Odds_217_C49","Odds_217_P49","Odds_217_I49","Odds_217_C50","Odds_217_P50","Odds_217_I50","Odds_217_C51","Odds_217_P51","Odds_217_I51","Odds_217_C52","Odds_217_P52","Odds_217_I52","Odds_217_C53","Odds_217_P53","Odds_217_I53","Odds_217_C54","Odds_217_P54","Odds_217_I54","Odds_217_C55","Odds_217_P55","Odds_217_I55","Odds_217_C56","Odds_217_P56","Odds_217_I56","Odds_217_C57","Odds_217_P57","Odds_217_I57","Odds_217_C58","Odds_217_P58","Odds_217_I58","Odds_217_C59","Odds_217_P59","Odds_217_I59","Odds_217_C60","Odds_217_P60","Odds_217_I60","Odds_217_C61","Odds_217_P61","Odds_217_I61","Odds_217_C62","Odds_217_P62","Odds_217_I62","Odds_217_C63","Odds_217_P63","Odds_217_I63","Odds_217_C64","Odds_217_P64","Odds_217_I64","Odds_217_C65","Odds_217_P65","Odds_217_I65","Odds_217_C66","Odds_217_P66","Odds_217_I66","Odds_217_C67","Odds_217_P67","Odds_217_I67","Odds_217_C68","Odds_217_P68","Odds_217_I68","Odds_217_C69","Odds_217_P69","Odds_217_I69","Odds_217_C70","Odds_217_P70","Odds_217_I70","Odds_217_C71","Odds_217_P71","Odds_217_I71","Odds_217_C72","Odds_217_P72","Odds_217_I72","Odds_217_C73","Odds_217_P73","Odds_217_I73","Odds_217_C74","Odds_217_P74","Odds_217_I74","Odds_217_C75","Odds_217_P75","Odds_217_I75","Odds_217_C76","Odds_217_P76","Odds_217_I76","Odds_217_C77","Odds_217_P77","Odds_217_I77","Odds_217_C78","Odds_217_P78","Odds_217_I78","Odds_217_C79","Odds_217_P79","Odds_217_I79","Odds_217_C80","Odds_217_P80","Odds_217_I80","Odds_217_C81","Odds_217_P81","Odds_217_I81","Odds_217_C82","Odds_217_P82","Odds_217_I82","Odds_217_C83","Odds_217_P83","Odds_217_I83","Odds_217_C84","Odds_217_P84","Odds_217_I84","Odds_217_C85","Odds_217_P85","Odds_217_I85","Odds_217_C86","Odds_217_P86","Odds_217_I86","Odds_217_C87","Odds_217_P87","Odds_217_I87","Odds_217_C88","Odds_217_P88","Odds_217_I88","Odds_217_C89","Odds_217_P89","Odds_217_I89","Odds_217_C90","Odds_217_P90","Odds_217_I90","Odds_217_C91","Odds_217_P91","Odds_217_I91","Odds_217_C92","Odds_217_P92","Odds_217_I92","Odds_217_C93","Odds_217_P93","Odds_217_I93","Odds_217_C94","Odds_217_P94","Odds_217_I94","Odds_217_C95","Odds_217_P95","Odds_217_I95","Odds_217_C96","Odds_217_P96","Odds_217_I96","Odds_217_C97","Odds_217_P97","Odds_217_I97","Odds_217_C98","Odds_217_P98","Odds_217_I98","Odds_217_C99","Odds_217_P99","Odds_217_I99"),
MultiSportODDS_DEF[301] = new Array("OddsId_301","Value_301","Odds_301_H","Odds_301_A","FavorF_301","Percentage_301"),
MultiSportODDS_DEF[302] = new Array("OddsId_302","Goal_302","Odds_302_O","Odds_302_U","Percentage_302"),
MultiSportODDS_DEF[303] = new Array("OddsId_303","Value_303","Odds_303_H","Odds_303_A","FavorH_303","Percentage_303"),
MultiSportODDS_DEF[304] = new Array("OddsId_304","Goal_304","Odds_304_O","Odds_304_U","Percentage_304"),
MultiSportODDS_DEF[401] = new Array("OddsId_401","Goal_401","Odds_401_O","Odds_401_U"),
MultiSportODDS_DEF[402] = new Array("OddsId_402","Goal_402","Odds_402_O","Odds_402_U"),
MultiSportODDS_DEF[403] = new Array("OddsId_403","Goal_403","Odds_403_O","Odds_403_U"),
MultiSportODDS_DEF[404] = new Array("OddsId_404","Goal_404","Odds_404_O","Odds_404_U"),
MultiSportODDS_DEF[405] = new Array("OddsId_405","Odds_405_00","Odds_405_01","Odds_405_02","Odds_405_03","Odds_405_10","Odds_405_11","Odds_405_12","Odds_405_13","Odds_405_20","Odds_405_21","Odds_405_22","Odds_405_23","Odds_405_30","Odds_405_31","Odds_405_32","Odds_405_33","Odds_405_99","Odds_405_livehomescore","Odds_405_liveawayscore"),
MultiSportODDS_DEF[412] = new Array("OddsId_412","Odds_412_0","Odds_412_1","Odds_412_2","Odds_412_3"),
MultiSportODDS_DEF[413] = new Array("OddsId_413","Odds_413_00","Odds_413_01","Odds_413_02","Odds_413_03","Odds_413_04","Odds_413_10","Odds_413_11","Odds_413_12","Odds_413_13","Odds_413_14","Odds_413_20","Odds_413_21","Odds_413_22","Odds_413_23","Odds_413_24","Odds_413_30","Odds_413_31","Odds_413_32","Odds_413_33","Odds_413_34","Odds_413_40","Odds_413_41","Odds_413_42","Odds_413_43","Odds_413_44","Odds_413_99","Odds_413_livehomescore","Odds_413_liveawayscore"),
MultiSportODDS_DEF[414] = new Array("OddsId_414","Odds_414_00","Odds_414_01","Odds_414_02","Odds_414_03","Odds_414_10","Odds_414_11","Odds_414_12","Odds_414_13","Odds_414_20","Odds_414_21","Odds_414_22","Odds_414_23","Odds_414_30","Odds_414_31","Odds_414_32","Odds_414_33","Odds_414_99","Odds_414_livehomescore","Odds_414_liveawayscore"),
MultiSportODDS_DEF[416] = new Array("OddsId_416","Odds_416_0000","Odds_416_0001","Odds_416_0002","Odds_416_0003","Odds_416_0004","Odds_416_0010","Odds_416_0011","Odds_416_0012","Odds_416_0013","Odds_416_0014","Odds_416_0020","Odds_416_0021","Odds_416_0022","Odds_416_0023","Odds_416_0024","Odds_416_0030","Odds_416_0031","Odds_416_0032","Odds_416_0033","Odds_416_0034","Odds_416_0040","Odds_416_0041","Odds_416_0042","Odds_416_0043","Odds_416_0044","Odds_416_00AOS","Odds_416_0101","Odds_416_0102","Odds_416_0103","Odds_416_0104","Odds_416_0111","Odds_416_0112","Odds_416_0113","Odds_416_0114","Odds_416_0121","Odds_416_0122","Odds_416_0123","Odds_416_0124","Odds_416_0131","Odds_416_0132","Odds_416_0133","Odds_416_0134","Odds_416_0141","Odds_416_0142","Odds_416_0143","Odds_416_0144","Odds_416_01AOS","Odds_416_0202","Odds_416_0203","Odds_416_0204","Odds_416_0212","Odds_416_0213","Odds_416_0214","Odds_416_0222","Odds_416_0223","Odds_416_0224","Odds_416_0232","Odds_416_0233","Odds_416_0234","Odds_416_0242","Odds_416_0243","Odds_416_0244","Odds_416_02AOS","Odds_416_0303","Odds_416_0304","Odds_416_0313","Odds_416_0314","Odds_416_0323","Odds_416_0324","Odds_416_0333","Odds_416_0334","Odds_416_0343","Odds_416_0344","Odds_416_03AOS","Odds_416_1010","Odds_416_1011","Odds_416_1012","Odds_416_1013","Odds_416_1014","Odds_416_1020","Odds_416_1021","Odds_416_1022","Odds_416_1023","Odds_416_1024","Odds_416_1030","Odds_416_1031","Odds_416_1032","Odds_416_1033","Odds_416_1034","Odds_416_1040","Odds_416_1041","Odds_416_1042","Odds_416_1043","Odds_416_1044","Odds_416_10AOS","Odds_416_1111","Odds_416_1112","Odds_416_1113","Odds_416_1114","Odds_416_1121","Odds_416_1122","Odds_416_1123","Odds_416_1124","Odds_416_1131","Odds_416_1132","Odds_416_1133","Odds_416_1134","Odds_416_1141","Odds_416_1142","Odds_416_1143","Odds_416_1144","Odds_416_11AOS","Odds_416_1212","Odds_416_1213","Odds_416_1214","Odds_416_1222","Odds_416_1223","Odds_416_1224","Odds_416_1232","Odds_416_1233","Odds_416_1234","Odds_416_1242","Odds_416_1243","Odds_416_1244","Odds_416_12AOS","Odds_416_1313","Odds_416_1314","Odds_416_1323","Odds_416_1324","Odds_416_1333","Odds_416_1334","Odds_416_1343","Odds_416_1344","Odds_416_13AOS","Odds_416_2020","Odds_416_2021","Odds_416_2022","Odds_416_2023","Odds_416_2024","Odds_416_2030","Odds_416_2031","Odds_416_2032","Odds_416_2033","Odds_416_2034","Odds_416_2040","Odds_416_2041","Odds_416_2042","Odds_416_2043","Odds_416_2044","Odds_416_20AOS","Odds_416_2121","Odds_416_2122","Odds_416_2123","Odds_416_2124","Odds_416_2131","Odds_416_2132","Odds_416_2133","Odds_416_2134","Odds_416_2141","Odds_416_2142","Odds_416_2143","Odds_416_2144","Odds_416_21AOS","Odds_416_2222","Odds_416_2223","Odds_416_2224","Odds_416_2232","Odds_416_2233","Odds_416_2234","Odds_416_2242","Odds_416_2243","Odds_416_2244","Odds_416_22AOS","Odds_416_2323","Odds_416_2324","Odds_416_2333","Odds_416_2334","Odds_416_2343","Odds_416_2344","Odds_416_23AOS","Odds_416_3030","Odds_416_3031","Odds_416_3032","Odds_416_3033","Odds_416_3034","Odds_416_3040","Odds_416_3041","Odds_416_3042","Odds_416_3043","Odds_416_3044","Odds_416_30AOS","Odds_416_3131","Odds_416_3132","Odds_416_3133","Odds_416_3134","Odds_416_3141","Odds_416_3142","Odds_416_3143","Odds_416_3144","Odds_416_31AOS","Odds_416_3232","Odds_416_3233","Odds_416_3234","Odds_416_3242","Odds_416_3243","Odds_416_3244","Odds_416_32AOS","Odds_416_3333","Odds_416_3334","Odds_416_3343","Odds_416_3344","Odds_416_33AOS"),
MultiSportODDS_DEF[417] = new Array("OddsId_417","Odds_417_YH","Odds_417_YA","Odds_417_YD","Odds_417_NH","Odds_417_NA","Odds_417_ND"),
MultiSportODDS_DEF[418] = new Array("OddsId_418","Goal_418","Odds_418_YO","Odds_418_YU","Odds_418_NO","Odds_418_NU"),
MultiSportODDS_DEF[419] = new Array("OddsId_419","Odds_419_1H","Odds_419_2H","Odds_419_N"),
MultiSportODDS_DEF[420] = new Array("OddsId_420","Odds_420_1H","Odds_420_2H","Odds_420_N"),
MultiSportODDS_DEF[421] = new Array("OddsId_421","Odds_421_1H","Odds_421_2H","Odds_421_N"),
MultiSportODDS_DEF[422] = new Array("OddsId_422","Odds_422_H","Odds_422_A","Odds_422_N"),
MultiSportODDS_DEF[423] = new Array("OddsId_423","Odds_423_H","Odds_423_A","Odds_423_N"),
MultiSportODDS_DEF[424] = new Array("OddsId_424","Odds_424_S","Odds_424_H","Odds_424_P","Odds_424_FK","Odds_424_OG","Odds_424_NG"),
MultiSportODDS_DEF[425] = new Array("OddsId_425","Odds_425_H","Odds_425_A"),
MultiSportODDS_DEF[426] = new Array("OddsId_426","Odds_426_H1","Odds_426_H2UP","Odds_426_D","Odds_426_A1","Odds_426_A2UP","Odds_426_NG"),
MultiSportODDS_DEF[429] = new Array("OddsId_429","Odds_429_0","Odds_429_1","Odds_429_2","Odds_429_3OVER"),
MultiSportODDS_DEF[445] = new Array("OddsId_445","Odds_445_YY","Odds_445_YN","Odds_445_NY","Odds_445_NN"),
MultiSportODDS_DEF[446] = new Array("OddsId_446","Odds_446_YY","Odds_446_YN","Odds_446_NY","Odds_446_NN"),
MultiSportODDS_DEF[447] = new Array("OddsId_447","Odds_447_YY","Odds_447_YN","Odds_447_NY","Odds_447_NN"),
MultiSportODDS_DEF[448] = new Array("OddsId_448","Odds_448_H","Odds_448_A","Odds_448_NG"),
MultiSportODDS_DEF[449] = new Array("OddsId_449","Goal_449","Odds_449_1XO","Odds_449_1XU","Odds_449_12O","Odds_449_12U","Odds_449_2XO","Odds_449_2XU"),
MultiSportODDS_DEF[450] = new Array("OddsId_450","Goal_450","Odds_450_OO","Odds_450_OU","Odds_450_EO","Odds_450_EU"),
MultiSportODDS_DEF[451] = new Array("OddsId_451","Odds_451_Y1X","Odds_451_Y12","Odds_451_Y2X","Odds_451_N1X","Odds_451_N12","Odds_451_N2X"),
MultiSportODDS_DEF[452] = new Array("OddsId_452","Odds_452_1H","Odds_452_2H"),
MultiSportODDS_DEF[453] = new Array("OddsId_453","Odds_453_1","Odds_453_X","Odds_453_2","Odds_453_hdp1","Odds_453_hdpx","Odds_453_hdp2"),
MultiSportODDS_DEF[454] = new Array("OddsId_454","Odds_454_1XH","Odds_454_12H","Odds_454_2XH","Odds_454_1XA","Odds_454_12A","Odds_454_2XA","Odds_454_NG"),
MultiSportODDS_DEF[455] = new Array("OddsId_455","Odds_455_110","Odds_455_1120","Odds_455_2130","Odds_455_3140","Odds_455_4150","Odds_455_5160","Odds_455_6170","Odds_455_7180","Odds_455_8190","Odds_455_NG"),
MultiSportODDS_DEF[456] = new Array("OddsId_456","Odds_456_YH","Odds_456_YA","Odds_456_YD","Odds_456_NH","Odds_456_NA","Odds_456_ND"),
MultiSportODDS_DEF[457] = new Array("OddsId_457","Goal_457","Odds_457_YO","Odds_457_YU","Odds_457_NO","Odds_457_NU"),
MultiSportODDS_DEF[458] = new Array("OddsId_458","Odds_458_1","Odds_458_X","Odds_458_2"),
MultiSportODDS_DEF[459] = new Array("OddsId_459","Odds_459_1","Odds_459_X","Odds_459_2"),
MultiSportODDS_DEF[460] = new Array("OddsId_460","Odds_460_H","Odds_460_A"),
MultiSportODDS_DEF[461] = new Array("OddsId_461","Goal_461","Odds_461_O","Odds_461_U"),
MultiSportODDS_DEF[462] = new Array("OddsId_462","Goal_462","Odds_462_O","Odds_462_U"),
MultiSportODDS_DEF[463] = new Array("OddsId_463","Goal_463","Odds_463_O","Odds_463_U"),
MultiSportODDS_DEF[464] = new Array("OddsId_464","Goal_464","Odds_464_O","Odds_464_U"),
MultiSportODDS_DEF[221] = new Array("OddsId_221","Value_221","Odds_221_01","Odds_221_02","Odds_221_03","Odds_221_04","Odds_221_05","Odds_221_10","Odds_221_20","Odds_221_30","Odds_221_40","Odds_221_50","Goal_221_2","Goal_221_4","Goal_221_8","Goal_221_16","Goal_221_32"),
MultiSportODDS_DEF[222] = new Array("OddsId_222","Value_222","Odds_222_01","Odds_222_10","Odds_222_02","Odds_222_20","Odds_222_13","Odds_222_03","Odds_222_30","Odds_222_04","Odds_222_40","Odds_222_05","Odds_222_50","Goal_222_2","Goal_222_4","Goal_222_128","Goal_222_8","Goal_222_16","Goal_222_32"),
MultiSportODDS_DEF[223] = new Array("OddsId_223","Value_223","Odds_223_00","Odds_223_01","Odds_223_02","Odds_223_03","Odds_223_04","Odds_223_05"),
MultiSportODDS_DEF[224] = new Array("OddsId_224","Value_224","Odds_224_00","Odds_224_01","Odds_224_02","Odds_224_12","Odds_224_13"),
MultiSportODDS_DEF[225] = new Array("OddsId_225","Value_225","Odds_225_00","Odds_225_01"),
MultiSportODDS_DEF[226] = new Array("OddsId_226","Value_226","Odds_226_01","Odds_226_02","Odds_226_00"),
MultiSportODDS_DEF[227] = new Array("OddsId_227","Value_227","Odds_227_01","Odds_227_02","Odds_227_00"),
MultiSportODDS_DEF[1201] = new Array("OddsId_1201","Value_1201","Odds_1201_H","Odds_1201_A","FavorF"),
MultiSportODDS_DEF[1203] = new Array("OddsId_1203","Goal_1203","Odds_1203_O","Odds_1203_U"),
MultiSportODDS_DEF[1204] = new Array("OddsId_1204","Odds_1204_00","Odds_1204_01","Odds_1204_02","Odds_1204_03","Odds_1204_04","Odds_1204_10","Odds_1204_11","Odds_1204_12","Odds_1204_13","Odds_1204_20","Odds_1204_21","Odds_1204_22","Odds_1204_30","Odds_1204_31","Odds_1204_40"),
MultiSportODDS_DEF[1205] = new Array("OddsId_1205","Odds_1205_1","Odds_1205_X","Odds_1205_2"),
MultiSportODDS_DEF[1206] = new Array("OddsId_1206","Odds_1206_0","Odds_1206_1","Odds_1206_2","Odds_1206_3","Odds_1206_4"),
MultiSportODDS_DEF[1224] = new Array("OddsId_1224","Odds_1224_1X","Odds_1224_12","Odds_1224_2X"),
MultiSportODDS_DEF[1220] = new Array("OddsId_1220","Odds_1220_H","Odds_1220_A"),
MultiSportODDS_DEF[1235] = new Array("OddsId_1235","Odds_1235_01","Odds_1235_02","Odds_1235_03","Odds_1235_04","Odds_1235_10","Odds_1235_20","Odds_1235_30","Odds_1235_40"),
MultiSportODDS_DEF[1236] = new Array("OddsId_1236","Odds_1236_0","Odds_1236_1","Odds_1236_2","Odds_1236_3","Odds_1236_4","Odds_1236_5"),
MultiSportODDS_DEF[1326] = new Array("OddsId","Value","Odds_0","Odds_1","FavorF","Resourceid"),
MultiSportODDS_DEF[1304] = new Array("OddsId","Goal","Odds_0","Odds_1","Resourceid"),
MultiSportODDS_DEF[1310] = MultiSportODDS_DEF[1304],
MultiSportODDS_DEF[1323] = MultiSportODDS_DEF[1304],
MultiSportODDS_DEF[1329] = MultiSportODDS_DEF[1304],
MultiSportODDS_DEF[1318] = new Array("OddsId","Odds_0","Odds_1","Resourceid"),
MultiSportODDS_DEF[1331] = MultiSportODDS_DEF[1318],
MultiSportODDS_DEF[1307] = new Array("OddsId","Odds_0","Odds_1","Odds_2","hdp1","hdpx","hdp2","Resourceid"),
MultiSportODDS_DEF[1309] = MultiSportODDS_DEF[1307],
MultiSportODDS_DEF[1313] = MultiSportODDS_DEF[1307],
MultiSportODDS_DEF[1330] = MultiSportODDS_DEF[1307],
MultiSportODDS_DEF[1334] = new Array("OddsId","Goal","Odds_0","Odds_1","Odds_2","Resourceid"),
MultiSportODDS_DEF[1328] = new Array("OddsId","Odds_0","Odds_1","Odds_2","Odds_3","Resourceid"),
MultiSportODDS_DEF[1302] = new Array("OddsId","Odds_0","Odds_1","Odds_2","Odds_3","Odds_4","Odds_5","Odds_6","Odds_7","Odds_8","Odds_9","Resourceid"),
MultiSportODDS_DEF[1317] = new Array("OddsId","Odds_0","Odds_1","Odds_2","Odds_3","Odds_4","Odds_5","Odds_6","Odds_7","Odds_8","Odds_9","Odds_10","Odds_11","Odds_12","Odds_13","Resourceid"),
MultiSportODDS_DEF[1320] = new Array("OddsId","Odds_0","Odds_1","Odds_2","Resourceid"),
MultiSportODDS_DEF[1321] = new Array("OddsId","Odds_0","Odds_1","Odds_2","Odds_3","Odds_4","Resourceid"),
MultiSportODDS_DEF[1322] = new Array("OddsId","Odds_0","Odds_1","Odds_2","Odds_3","Odds_4","Odds_5","Odds_6","Resourceid"),
MultiSportODDS_DEF[1325] = new Array("OddsId","Odds_0","Odds_1","Odds_2","Odds_3","Odds_4","Odds_5","Odds_6","Odds_7","Resourceid"),
MultiSportODDS_DEF[1314] = new Array("OddsId","Odds_0","Odds_1","Resourceid"),
MultiSportODDS_DEF[1319] = MultiSportODDS_DEF[1314],
MultiSportODDS_DEF[1324] = MultiSportODDS_DEF[1314],
MultiSportODDS_DEF[1327] = MultiSportODDS_DEF[1314],
MultiSportODDS_DEF[1332] = MultiSportODDS_DEF[1314],
MultiSportODDS_DEF[1315] = MultiSportODDS_DEF[1320],
MultiSportODDS_DEF[1333] = MultiSportODDS_DEF[1320],
MultiSportODDS_DEF[501] = new Array("OddsId_501","Odds_501_H","Odds_501_A","Odds_501_CS10","Odds_501_CS20"),
MultiSportODDS_DEF[502] = new Array("OddsId_502","Odds_502_1","Odds_502_X","Odds_502_2"),
MultiSportODDS_DEF[601] = new Array("OddsId_601","Odds_601_H1-2","Odds_601_H3-6","Odds_601_H7-9","Odds_601_H10-13","Odds_601_H14-16","Odds_601_H17-20","Odds_601_H21up","Odds_601_A1-2","Odds_601_A3-6","Odds_601_A7-9","Odds_601_A10-13","Odds_601_A14-16","Odds_601_A17-20","Odds_601_A21up"),
MultiSportODDS_DEF[602] = new Array("OddsId_602","Odds_602_H1-5","Odds_602_H6-10","Odds_602_H11-15","Odds_602_H16-20","Odds_602_H21-25","Odds_602_H26up","Odds_602_A1-5","Odds_602_A6-10","Odds_602_A11-15","Odds_602_A16-20","Odds_602_A21-25","Odds_602_A26up"),
MultiSportODDS_DEF[603] = new Array("OddsId_603","Odds_603_H","Odds_603_A"),
MultiSportODDS_DEF[604] = new Array("OddsId_604","Odds_604_H","Odds_604_A"),
MultiSportODDS_DEF[605] = new Array("OddsId_605","Odds_605_H","Odds_605_A"),
MultiSportODDS_DEF[606] = new Array("OddsId_606","Odds_606_H","Odds_606_A","Resourceid"),
MultiSportODDS_DEF[607] = new Array("OddsId_607","Odds_607_H","Odds_607_A","Resourceid"),
MultiSportODDS_DEF[608] = new Array("OddsId_608","Odds_608_H1-5","Odds_608_H6-10","Odds_608_H11-15","Odds_608_H16-20","Odds_608_H21-25","Odds_608_H26up","Odds_608_D","Odds_608_A1-5","Odds_608_A6-10","Odds_608_A11-15","Odds_608_A16-20","Odds_608_A21-25","Odds_608_A26up"),
MultiSportODDS_DEF[609] = new Array("OddsId_609","Value_609","Odds_609_H","Odds_609_A","FavorF"),
MultiSportODDS_DEF[610] = new Array("OddsId_610","Goal_610","Odds_610_O","Odds_610_U"),
MultiSportODDS_DEF[611] = new Array("OddsId_611","Odds_611_O","Odds_611_E"),
MultiSportODDS_DEF[612] = new Array("OddsId_612","Odds_612_H","Odds_612_A","Resourceid"),
MultiSportODDS_DEF[613] = new Array("OddsId_613","Odds_613_H","Odds_613_A","Resourceid"),
MultiSportODDS_DEF[614] = new Array("OddsId_614","Odds_614_H1-4","Odds_614_H5-8","Odds_614_H9up","Odds_614_D","Odds_614_A1-4","Odds_614_A5-8","Odds_614_A9up"),
MultiSportODDS_DEF[615] = new Array("OddsId_615","Goal_615","Odds_615_O","Odds_615_U","Resourceid"),
MultiSportODDS_DEF[616] = new Array("OddsId_616","Goal_616","Odds_616_O","Odds_616_U","Resourceid"),
MultiSportODDS_DEF[617] = new Array("OddsId_617","Odds_617_H","Odds_617_A","Resourceid"),
MultiSportODDS_DEF[9002] = new Array("OddsId_9002","Value_9002","Odds_9002_H","Odds_9002_A","FavorF"),
MultiSportODDS_DEF[9008] = new Array("OddsId_9008","Value_9008","Odds_9008_H","Odds_9008_A","FavorF"),
MultiSportODDS_DEF[9012] = new Array("OddsId_9012","Value_9012","Odds_9012_H","Odds_9012_A","FavorF"),
MultiSportODDS_DEF[9018] = new Array("OddsId_9018","Value_9018","Odds_9018_H","Odds_9018_A","FavorF"),
MultiSportODDS_DEF[9024] = new Array("OddsId_9024","Value_9024","Odds_9024_H","Odds_9024_A","FavorF"),
MultiSportODDS_DEF[9028] = new Array("OddsId_9028","Value_9028","Odds_9028_H","Odds_9028_A","FavorF"),
MultiSportODDS_DEF[9034] = new Array("OddsId_9034","Value_9034","Odds_9034_H","Odds_9034_A","FavorF"),
MultiSportODDS_DEF[9040] = new Array("OddsId_9040","Value_9040","Odds_9040_H","Odds_9040_A","FavorF"),
MultiSportODDS_DEF[9046] = new Array("OddsId_9046","Value_9046","Odds_9046_H","Odds_9046_A","FavorF"),
MultiSportODDS_DEF[9052] = new Array("OddsId_9052","Value_9052","Odds_9052_H","Odds_9052_A","FavorF"),
MultiSportODDS_DEF[9059] = new Array("OddsId_9059","Value_9059","Odds_9059_H","Odds_9059_A","FavorF"),
MultiSportODDS_DEF[9076] = new Array("OddsId_9076","Value_9076","Odds_9076_H","Odds_9076_A","FavorF"),
MultiSportODDS_DEF[9077] = new Array("OddsId_9077","Value_9077","Odds_9077_H","Odds_9077_A","FavorF"),
MultiSportODDS_DEF[9003] = new Array("OddsId_9003","Goal_9003","Odds_9003_O","Odds_9003_U"),
MultiSportODDS_DEF[9009] = new Array("OddsId_9009","Goal_9009","Odds_9009_O","Odds_9009_U"),
MultiSportODDS_DEF[9013] = new Array("OddsId_9013","Goal_9013","Odds_9013_O","Odds_9013_U"),
MultiSportODDS_DEF[9019] = new Array("OddsId_9019","Goal_9019","Odds_9019_O","Odds_9019_U"),
MultiSportODDS_DEF[9025] = new Array("OddsId_9025","Goal_9025","Odds_9025_O","Odds_9025_U"),
MultiSportODDS_DEF[9029] = new Array("OddsId_9029","Goal_9029","Odds_9029_O","Odds_9029_U"),
MultiSportODDS_DEF[9035] = new Array("OddsId_9035","Goal_9035","Odds_9035_O","Odds_9035_U"),
MultiSportODDS_DEF[9041] = new Array("OddsId_9041","Goal_9041","Odds_9041_O","Odds_9041_U"),
MultiSportODDS_DEF[9047] = new Array("OddsId_9047","Goal_9047","Odds_9047_O","Odds_9047_U"),
MultiSportODDS_DEF[9053] = new Array("OddsId_9053","Goal_9053","Odds_9053_O","Odds_9053_U"),
MultiSportODDS_DEF[9058] = new Array("OddsId_9058","Goal_9058","Odds_9058_O","Odds_9058_U"),
MultiSportODDS_DEF[9060] = new Array("OddsId_9060","Goal_9060","Odds_9060_O","Odds_9060_U"),
MultiSportODDS_DEF[9070] = new Array("OddsId_9070","Goal_9070","Odds_9070_O","Odds_9070_U"),
MultiSportODDS_DEF[9074] = new Array("OddsId_9074","Goal_9074","Odds_9074_O","Odds_9074_U"),
MultiSportODDS_DEF[9005] = new Array("OddsId_9005","Odds_9005_O","Odds_9005_E"),
MultiSportODDS_DEF[9061] = new Array("OddsId_9061","Odds_9061_O","Odds_9061_E"),
MultiSportODDS_DEF[9071] = new Array("OddsId_9071","Odds_9071_O","Odds_9071_E"),
MultiSportODDS_DEF[9078] = new Array("OddsId_9078","Odds_9078_O","Odds_9078_E"),
MultiSportODDS_DEF[9079] = new Array("OddsId_9079","Odds_9079_O","Odds_9079_E"),
MultiSportODDS_DEF[9080] = new Array("OddsId_9080","Odds_9080_O","Odds_9080_E"),
MultiSportODDS_DEF[9081] = new Array("OddsId_9081","Odds_9081_O","Odds_9081_E"),
MultiSportODDS_DEF[9082] = new Array("OddsId_9082","Odds_9082_O","Odds_9082_E"),
MultiSportODDS_DEF[9083] = new Array("OddsId_9083","Odds_9083_O","Odds_9083_E"),
MultiSportODDS_DEF[9084] = new Array("OddsId_9084","Odds_9084_O","Odds_9084_E"),
MultiSportODDS_DEF[9085] = new Array("OddsId_9085","Odds_9085_O","Odds_9085_E"),
MultiSportODDS_DEF[9086] = new Array("OddsId_9086","Odds_9086_O","Odds_9086_E"),
MultiSportODDS_DEF[9001] = new Array("OddsId_9001","Odds_9001_H","Odds_9001_A"),
MultiSportODDS_DEF[900101] = new Array("OddsId_900101","Odds_900101_H","Odds_900101_A"),
MultiSportODDS_DEF[900102] = new Array("OddsId_900102","Odds_900102_H","Odds_900102_A"),
MultiSportODDS_DEF[900103] = new Array("OddsId_900103","Odds_900103_H","Odds_900103_A"),
MultiSportODDS_DEF[900104] = new Array("OddsId_900104","Odds_900104_H","Odds_900104_A"),
MultiSportODDS_DEF[900105] = new Array("OddsId_900105","Odds_900105_H","Odds_900105_A"),
MultiSportODDS_DEF[900106] = new Array("OddsId_900106","Odds_900106_H","Odds_900106_A"),
MultiSportODDS_DEF[900107] = new Array("OddsId_900107","Odds_900107_H","Odds_900107_A"),
MultiSportODDS_DEF[900108] = new Array("OddsId_900108","Odds_900108_H","Odds_900108_A"),
MultiSportODDS_DEF[900109] = new Array("OddsId_900109","Odds_900109_H","Odds_900109_A"),
MultiSportODDS_DEF[9006] = new Array("OddsId_9006","Odds_9006_H","Odds_9006_A"),
MultiSportODDS_DEF[9007] = new Array("OddsId_9007","Odds_9007_H","Odds_9007_A"),
MultiSportODDS_DEF[9010] = new Array("OddsId_9010","Odds_9010_H","Odds_9010_A"),
MultiSportODDS_DEF[9011] = new Array("OddsId_9011","Odds_9011_H","Odds_9011_A"),
MultiSportODDS_DEF[9014] = new Array("OddsId_9014","Odds_9014_H","Odds_9014_A"),
MultiSportODDS_DEF[9015] = new Array("OddsId_9015","Odds_9015_H","Odds_9015_A"),
MultiSportODDS_DEF[9016] = new Array("OddsId_9016","Odds_9016_H","Odds_9016_A"),
MultiSportODDS_DEF[9017] = new Array("OddsId_9017","Odds_9017_H","Odds_9017_A"),
MultiSportODDS_DEF[9075] = new Array("OddsId_9075","Odds_9075_H","Odds_9075_A"),
MultiSportODDS_DEF[9021] = new Array("OddsId_9021","Odds_9021_H","Odds_9021_A"),
MultiSportODDS_DEF[9022] = new Array("OddsId_9022","Odds_9022_H","Odds_9022_A"),
MultiSportODDS_DEF[9023] = new Array("OddsId_9023","Odds_9023_H","Odds_9023_A"),
MultiSportODDS_DEF[9026] = new Array("OddsId_9026","Odds_9026_H","Odds_9026_A"),
MultiSportODDS_DEF[9027] = new Array("OddsId_9027","Odds_9027_H","Odds_9027_A"),
MultiSportODDS_DEF[9030] = new Array("OddsId_9030","Odds_9030_H","Odds_9030_A"),
MultiSportODDS_DEF[9031] = new Array("OddsId_9031","Odds_9031_H","Odds_9031_A"),
MultiSportODDS_DEF[9032] = new Array("OddsId_9032","Odds_9032_H","Odds_9032_A"),
MultiSportODDS_DEF[9033] = new Array("OddsId_9033","Odds_9033_H","Odds_9033_A"),
MultiSportODDS_DEF[9036] = new Array("OddsId_9036","Odds_9036_H","Odds_9036_A"),
MultiSportODDS_DEF[9037] = new Array("OddsId_9037","Odds_9037_H","Odds_9037_A"),
MultiSportODDS_DEF[9038] = new Array("OddsId_9038","Odds_9038_H","Odds_9038_A"),
MultiSportODDS_DEF[9039] = new Array("OddsId_9039","Odds_9039_H","Odds_9039_A"),
MultiSportODDS_DEF[9042] = new Array("OddsId_9042","Odds_9042_H","Odds_9042_A"),
MultiSportODDS_DEF[9043] = new Array("OddsId_9043","Odds_9043_H","Odds_9043_A"),
MultiSportODDS_DEF[9044] = new Array("OddsId_9044","Odds_9044_H","Odds_9044_A"),
MultiSportODDS_DEF[9045] = new Array("OddsId_9045","Odds_9045_H","Odds_9045_A"),
MultiSportODDS_DEF[9048] = new Array("OddsId_9048","Odds_9048_H","Odds_9048_A"),
MultiSportODDS_DEF[9049] = new Array("OddsId_9049","Odds_9049_H","Odds_9049_A"),
MultiSportODDS_DEF[9050] = new Array("OddsId_9050","Odds_9050_H","Odds_9050_A"),
MultiSportODDS_DEF[9051] = new Array("OddsId_9051","Odds_9051_H","Odds_9051_A"),
MultiSportODDS_DEF[9054] = new Array("OddsId_9054","Odds_9054_H","Odds_9054_A"),
MultiSportODDS_DEF[9055] = new Array("OddsId_9055","Odds_9055_H","Odds_9055_A"),
MultiSportODDS_DEF[9056] = new Array("OddsId_9056","Odds_9056_H","Odds_9056_A"),
MultiSportODDS_DEF[9057] = new Array("OddsId_9057","Odds_9057_H","Odds_9057_A"),
MultiSportODDS_DEF[9062] = new Array("OddsId_9062","Odds_9062_H","Odds_9062_A"),
MultiSportODDS_DEF[9063] = new Array("OddsId_9063","Odds_9063_H","Odds_9063_A"),
MultiSportODDS_DEF[9064] = new Array("OddsId_9064","Odds_9064_H","Odds_9064_A"),
MultiSportODDS_DEF[9065] = new Array("OddsId_9065","Odds_9065_H","Odds_9065_A"),
MultiSportODDS_DEF[9066] = new Array("OddsId_9066","Odds_9066_H","Odds_9066_A"),
MultiSportODDS_DEF[9067] = new Array("OddsId_9067","Odds_9067_H","Odds_9067_A"),
MultiSportODDS_DEF[9068] = new Array("OddsId_9068","Odds_9068_H","Odds_9068_A"),
MultiSportODDS_DEF[9069] = new Array("OddsId_9069","Odds_9069_H","Odds_9069_A"),
MultiSportODDS_DEF[9072] = new Array("OddsId_9072","Odds_9072_H","Odds_9072_A"),
MultiSportODDS_DEF[9073] = new Array("OddsId_9073","Odds_9073_H","Odds_9073_A");
var mMultiSportODDS_DEF = new Array;
mMultiSportODDS_DEF.B1_2_3_5 = COMMON_DEF[5].concat(MultiSportODDS_DEF[1]).concat(MultiSportODDS_DEF[2]).concat(MultiSportODDS_DEF[3]).concat(MultiSportODDS_DEF[5]),
mMultiSportODDS_DEF.B7_12_8_15 = COMMON_DEF[5].concat(MultiSportODDS_DEF[7]).concat(MultiSportODDS_DEF[12]).concat(MultiSportODDS_DEF[8]).concat(MultiSportODDS_DEF[15]),
mMultiSportODDS_DEF.B2 = COMMON_DEF[4].concat(MultiSportODDS_DEF[2]),
mMultiSportODDS_DEF.B4 = COMMON_DEF[4].concat(MultiSportODDS_DEF[4]),
mMultiSportODDS_DEF.B5 = COMMON_DEF[4].concat(MultiSportODDS_DEF[5]),
mMultiSportODDS_DEF.B6 = COMMON_DEF[4].concat(MultiSportODDS_DEF[6]),
mMultiSportODDS_DEF.B11 = COMMON_DEF[4].concat(MultiSportODDS_DEF[11]),
mMultiSportODDS_DEF.B12 = COMMON_DEF[4].concat(MultiSportODDS_DEF[12]),
mMultiSportODDS_DEF.B13 = COMMON_DEF[4].concat(MultiSportODDS_DEF[13]),
mMultiSportODDS_DEF.B14 = COMMON_DEF[4].concat(MultiSportODDS_DEF[14]),
mMultiSportODDS_DEF.B15 = COMMON_DEF[4].concat(MultiSportODDS_DEF[15]),
mMultiSportODDS_DEF.B16 = COMMON_DEF[4].concat(MultiSportODDS_DEF[16]),
mMultiSportODDS_DEF.B17 = COMMON_DEF[4].concat(MultiSportODDS_DEF[17]),
mMultiSportODDS_DEF.B18 = COMMON_DEF[4].concat(MultiSportODDS_DEF[18]),
mMultiSportODDS_DEF.B22 = COMMON_DEF[4].concat(MultiSportODDS_DEF[22]),
mMultiSportODDS_DEF.B24 = COMMON_DEF[4].concat(MultiSportODDS_DEF[24]),
mMultiSportODDS_DEF.B25 = COMMON_DEF[4].concat(MultiSportODDS_DEF[25]),
mMultiSportODDS_DEF.B26 = COMMON_DEF[4].concat(MultiSportODDS_DEF[26]),
mMultiSportODDS_DEF.B27 = COMMON_DEF[4].concat(MultiSportODDS_DEF[27]),
mMultiSportODDS_DEF.B28 = COMMON_DEF[4].concat(MultiSportODDS_DEF[28]),
mMultiSportODDS_DEF.B30 = COMMON_DEF[4].concat(MultiSportODDS_DEF[30]),
mMultiSportODDS_DEF.B121 = COMMON_DEF[4].concat(MultiSportODDS_DEF[121]),
mMultiSportODDS_DEF.B122 = COMMON_DEF[4].concat(MultiSportODDS_DEF[122]),
mMultiSportODDS_DEF.B123 = COMMON_DEF[4].concat(MultiSportODDS_DEF[123]),
mMultiSportODDS_DEF.B126 = COMMON_DEF[4].concat(MultiSportODDS_DEF[126]),
mMultiSportODDS_DEF.B127 = COMMON_DEF[4].concat(MultiSportODDS_DEF[127]),
mMultiSportODDS_DEF.B128 = COMMON_DEF[4].concat(MultiSportODDS_DEF[128]),
mMultiSportODDS_DEF.B133 = COMMON_DEF[4].concat(MultiSportODDS_DEF[133]),
mMultiSportODDS_DEF.B134 = COMMON_DEF[4].concat(MultiSportODDS_DEF[134]),
mMultiSportODDS_DEF.B135 = COMMON_DEF[4].concat(MultiSportODDS_DEF[135]),
mMultiSportODDS_DEF.B140 = COMMON_DEF[4].concat(MultiSportODDS_DEF[140]),
mMultiSportODDS_DEF.B141 = COMMON_DEF[4].concat(MultiSportODDS_DEF[141]),
mMultiSportODDS_DEF.B142 = COMMON_DEF[4].concat(MultiSportODDS_DEF[142]),
mMultiSportODDS_DEF.B143 = COMMON_DEF[4].concat(MultiSportODDS_DEF[143]),
mMultiSportODDS_DEF.B144 = COMMON_DEF[4].concat(MultiSportODDS_DEF[144]),
mMultiSportODDS_DEF.B145 = COMMON_DEF[4].concat(MultiSportODDS_DEF[145]),
mMultiSportODDS_DEF.B146 = COMMON_DEF[4].concat(MultiSportODDS_DEF[146]),
mMultiSportODDS_DEF.B147 = COMMON_DEF[4].concat(MultiSportODDS_DEF[147]),
mMultiSportODDS_DEF.B148 = COMMON_DEF[4].concat(MultiSportODDS_DEF[148]),
mMultiSportODDS_DEF.B149 = COMMON_DEF[4].concat(MultiSportODDS_DEF[149]),
mMultiSportODDS_DEF.B150 = COMMON_DEF[4].concat(MultiSportODDS_DEF[150]),
mMultiSportODDS_DEF.B151 = COMMON_DEF[4].concat(MultiSportODDS_DEF[151]),
mMultiSportODDS_DEF.B152 = COMMON_DEF[4].concat(MultiSportODDS_DEF[152]),
mMultiSportODDS_DEF.B158 = COMMON_DEF[4].concat(MultiSportODDS_DEF[158]),
mMultiSportODDS_DEF.B159 = COMMON_DEF[4].concat(MultiSportODDS_DEF[159]),
mMultiSportODDS_DEF.B161 = COMMON_DEF[4].concat(MultiSportODDS_DEF[161]),
mMultiSportODDS_DEF.B162 = COMMON_DEF[4].concat(MultiSportODDS_DEF[162]),
mMultiSportODDS_DEF.B164 = COMMON_DEF[4].concat(MultiSportODDS_DEF[164]),
mMultiSportODDS_DEF.B165 = COMMON_DEF[4].concat(MultiSportODDS_DEF[165]),
mMultiSportODDS_DEF.B166 = COMMON_DEF[4].concat(MultiSportODDS_DEF[166]),
mMultiSportODDS_DEF.B167 = COMMON_DEF[4].concat(MultiSportODDS_DEF[167]),
mMultiSportODDS_DEF.B168 = COMMON_DEF[4].concat(MultiSportODDS_DEF[168]),
mMultiSportODDS_DEF.B169 = COMMON_DEF[4].concat(MultiSportODDS_DEF[169]),
mMultiSportODDS_DEF.B170 = COMMON_DEF[4].concat(MultiSportODDS_DEF[170]),
mMultiSportODDS_DEF.B171 = COMMON_DEF[4].concat(MultiSportODDS_DEF[171]),
mMultiSportODDS_DEF.B172 = COMMON_DEF[4].concat(MultiSportODDS_DEF[172]),
mMultiSportODDS_DEF.B173 = COMMON_DEF[4].concat(MultiSportODDS_DEF[173]),
mMultiSportODDS_DEF.B174 = COMMON_DEF[4].concat(MultiSportODDS_DEF[174]),
mMultiSportODDS_DEF.B175 = COMMON_DEF[4].concat(MultiSportODDS_DEF[175]),
mMultiSportODDS_DEF.B176 = COMMON_DEF[4].concat(MultiSportODDS_DEF[176]),
mMultiSportODDS_DEF.B177 = COMMON_DEF[4].concat(MultiSportODDS_DEF[177]),
mMultiSportODDS_DEF.B179 = COMMON_DEF[4].concat(MultiSportODDS_DEF[179]),
mMultiSportODDS_DEF.B180 = COMMON_DEF[4].concat(MultiSportODDS_DEF[180]),
mMultiSportODDS_DEF.B181 = COMMON_DEF[4].concat(MultiSportODDS_DEF[181]),
mMultiSportODDS_DEF.B182 = COMMON_DEF[4].concat(MultiSportODDS_DEF[182]),
mMultiSportODDS_DEF.B184 = COMMON_DEF[4].concat(MultiSportODDS_DEF[184]),
mMultiSportODDS_DEF.B185 = COMMON_DEF[4].concat(MultiSportODDS_DEF[185]),
mMultiSportODDS_DEF.B186 = COMMON_DEF[4].concat(MultiSportODDS_DEF[186]),
mMultiSportODDS_DEF.B187 = COMMON_DEF[4].concat(MultiSportODDS_DEF[187]),
mMultiSportODDS_DEF.B188 = COMMON_DEF[4].concat(MultiSportODDS_DEF[188]),
mMultiSportODDS_DEF.B189 = COMMON_DEF[4].concat(MultiSportODDS_DEF[189]),
mMultiSportODDS_DEF.B190 = COMMON_DEF[4].concat(MultiSportODDS_DEF[190]),
mMultiSportODDS_DEF.B191 = COMMON_DEF[4].concat(MultiSportODDS_DEF[191]),
mMultiSportODDS_DEF.B192 = COMMON_DEF[4].concat(MultiSportODDS_DEF[192]),
mMultiSportODDS_DEF.B193 = COMMON_DEF[4].concat(MultiSportODDS_DEF[193]),
mMultiSportODDS_DEF.B194 = COMMON_DEF[4].concat(MultiSportODDS_DEF[194]),
mMultiSportODDS_DEF.B195 = COMMON_DEF[4].concat(MultiSportODDS_DEF[195]),
mMultiSportODDS_DEF.B196 = COMMON_DEF[4].concat(MultiSportODDS_DEF[196]),
mMultiSportODDS_DEF.B197 = COMMON_DEF[4].concat(MultiSportODDS_DEF[197]),
mMultiSportODDS_DEF.B198 = COMMON_DEF[4].concat(MultiSportODDS_DEF[198]),
mMultiSportODDS_DEF.B200 = COMMON_DEF[4].concat(MultiSportODDS_DEF[200]),
mMultiSportODDS_DEF.B201 = COMMON_DEF[4].concat(MultiSportODDS_DEF[201]),
mMultiSportODDS_DEF.B202 = COMMON_DEF[4].concat(MultiSportODDS_DEF[202]),
mMultiSportODDS_DEF.B203 = COMMON_DEF[4].concat(MultiSportODDS_DEF[203]),
mMultiSportODDS_DEF.B204 = COMMON_DEF[4].concat(MultiSportODDS_DEF[204]),
mMultiSportODDS_DEF.B205 = COMMON_DEF[4].concat(MultiSportODDS_DEF[205]),
mMultiSportODDS_DEF.B206 = COMMON_DEF[4].concat(MultiSportODDS_DEF[206]),
mMultiSportODDS_DEF.B207 = COMMON_DEF[4].concat(MultiSportODDS_DEF[207]),
mMultiSportODDS_DEF.B208 = COMMON_DEF[4].concat(MultiSportODDS_DEF[208]),
mMultiSportODDS_DEF.B209 = COMMON_DEF[4].concat(MultiSportODDS_DEF[209]),
mMultiSportODDS_DEF.B210 = COMMON_DEF[4].concat(MultiSportODDS_DEF[210]),
mMultiSportODDS_DEF.B211 = COMMON_DEF[4].concat(MultiSportODDS_DEF[211]),
mMultiSportODDS_DEF.B212 = COMMON_DEF[4].concat(MultiSportODDS_DEF[212]),
mMultiSportODDS_DEF.B213 = COMMON_DEF[4].concat(MultiSportODDS_DEF[213]),
mMultiSportODDS_DEF.B214 = COMMON_DEF[4].concat(MultiSportODDS_DEF[214]),
mMultiSportODDS_DEF.B215 = COMMON_DEF[4].concat(MultiSportODDS_DEF[215]),
mMultiSportODDS_DEF.B216 = COMMON_DEF[4].concat(MultiSportODDS_DEF[216]),
mMultiSportODDS_DEF.B217 = COMMON_DEF[4].concat(MultiSportODDS_DEF[217]),
mMultiSportODDS_DEF.B221 = COMMON_DEF[4].concat(MultiSportODDS_DEF[221]),
mMultiSportODDS_DEF.B222 = COMMON_DEF[4].concat(MultiSportODDS_DEF[222]),
mMultiSportODDS_DEF.B223 = COMMON_DEF[4].concat(MultiSportODDS_DEF[223]),
mMultiSportODDS_DEF.B224 = COMMON_DEF[4].concat(MultiSportODDS_DEF[224]),
mMultiSportODDS_DEF.B225 = COMMON_DEF[4].concat(MultiSportODDS_DEF[225]),
mMultiSportODDS_DEF.B226 = COMMON_DEF[4].concat(MultiSportODDS_DEF[226]),
mMultiSportODDS_DEF.B227 = COMMON_DEF[4].concat(MultiSportODDS_DEF[227]),
mMultiSportODDS_DEF.B401 = COMMON_DEF[4].concat(MultiSportODDS_DEF[401]),
mMultiSportODDS_DEF.B402 = COMMON_DEF[4].concat(MultiSportODDS_DEF[402]),
mMultiSportODDS_DEF.B403 = COMMON_DEF[4].concat(MultiSportODDS_DEF[403]),
mMultiSportODDS_DEF.B404 = COMMON_DEF[4].concat(MultiSportODDS_DEF[404]),
mMultiSportODDS_DEF.B405 = COMMON_DEF[4].concat(MultiSportODDS_DEF[405]),
mMultiSportODDS_DEF.B412 = COMMON_DEF[4].concat(MultiSportODDS_DEF[412]),
mMultiSportODDS_DEF.B413 = COMMON_DEF[4].concat(MultiSportODDS_DEF[413]),
mMultiSportODDS_DEF.B414 = COMMON_DEF[4].concat(MultiSportODDS_DEF[414]),
mMultiSportODDS_DEF.B416 = COMMON_DEF[4].concat(MultiSportODDS_DEF[416]),
mMultiSportODDS_DEF.B417 = COMMON_DEF[4].concat(MultiSportODDS_DEF[417]),
mMultiSportODDS_DEF.B418 = COMMON_DEF[4].concat(MultiSportODDS_DEF[418]),
mMultiSportODDS_DEF.B419 = COMMON_DEF[4].concat(MultiSportODDS_DEF[419]),
mMultiSportODDS_DEF.B420 = COMMON_DEF[4].concat(MultiSportODDS_DEF[420]),
mMultiSportODDS_DEF.B421 = COMMON_DEF[4].concat(MultiSportODDS_DEF[421]),
mMultiSportODDS_DEF.B422 = COMMON_DEF[4].concat(MultiSportODDS_DEF[422]),
mMultiSportODDS_DEF.B423 = COMMON_DEF[4].concat(MultiSportODDS_DEF[423]),
mMultiSportODDS_DEF.B424 = COMMON_DEF[4].concat(MultiSportODDS_DEF[424]),
mMultiSportODDS_DEF.B425 = COMMON_DEF[4].concat(MultiSportODDS_DEF[425]),
mMultiSportODDS_DEF.B426 = COMMON_DEF[4].concat(MultiSportODDS_DEF[426]),
mMultiSportODDS_DEF.B429 = COMMON_DEF[4].concat(MultiSportODDS_DEF[429]),
mMultiSportODDS_DEF.B445 = COMMON_DEF[4].concat(MultiSportODDS_DEF[445]),
mMultiSportODDS_DEF.B446 = COMMON_DEF[4].concat(MultiSportODDS_DEF[446]),
mMultiSportODDS_DEF.B447 = COMMON_DEF[4].concat(MultiSportODDS_DEF[447]),
mMultiSportODDS_DEF.B448 = COMMON_DEF[4].concat(MultiSportODDS_DEF[448]),
mMultiSportODDS_DEF.B449 = COMMON_DEF[4].concat(MultiSportODDS_DEF[449]),
mMultiSportODDS_DEF.B450 = COMMON_DEF[4].concat(MultiSportODDS_DEF[450]),
mMultiSportODDS_DEF.B451 = COMMON_DEF[4].concat(MultiSportODDS_DEF[451]),
mMultiSportODDS_DEF.B452 = COMMON_DEF[4].concat(MultiSportODDS_DEF[452]),
mMultiSportODDS_DEF.B453 = COMMON_DEF[4].concat(MultiSportODDS_DEF[453]),
mMultiSportODDS_DEF.B454 = COMMON_DEF[4].concat(MultiSportODDS_DEF[454]),
mMultiSportODDS_DEF.B455 = COMMON_DEF[4].concat(MultiSportODDS_DEF[455]),
mMultiSportODDS_DEF.B456 = COMMON_DEF[4].concat(MultiSportODDS_DEF[456]),
mMultiSportODDS_DEF.B457 = COMMON_DEF[4].concat(MultiSportODDS_DEF[457]),
mMultiSportODDS_DEF.B458 = COMMON_DEF[4].concat(MultiSportODDS_DEF[458]),
mMultiSportODDS_DEF.B459 = COMMON_DEF[4].concat(MultiSportODDS_DEF[459]),
mMultiSportODDS_DEF.B460 = COMMON_DEF[4].concat(MultiSportODDS_DEF[460]),
mMultiSportODDS_DEF.B461 = COMMON_DEF[4].concat(MultiSportODDS_DEF[461]),
mMultiSportODDS_DEF.B462 = COMMON_DEF[4].concat(MultiSportODDS_DEF[462]),
mMultiSportODDS_DEF.B463 = COMMON_DEF[4].concat(MultiSportODDS_DEF[463]),
mMultiSportODDS_DEF.B464 = COMMON_DEF[4].concat(MultiSportODDS_DEF[464]),
mMultiSportODDS_DEF.B20 = COMMON_DEF[4].concat(MultiSportODDS_DEF[20]),
mMultiSportODDS_DEF.B21 = COMMON_DEF[4].concat(MultiSportODDS_DEF[21]),
mMultiSportODDS_DEF.B601 = COMMON_DEF[4].concat(MultiSportODDS_DEF[601]),
mMultiSportODDS_DEF.B602 = COMMON_DEF[4].concat(MultiSportODDS_DEF[602]),
mMultiSportODDS_DEF.B603 = COMMON_DEF[4].concat(MultiSportODDS_DEF[603]),
mMultiSportODDS_DEF.B604 = COMMON_DEF[4].concat(MultiSportODDS_DEF[604]),
mMultiSportODDS_DEF.B605 = COMMON_DEF[4].concat(MultiSportODDS_DEF[605]),
mMultiSportODDS_DEF.B606 = COMMON_DEF[4].concat(MultiSportODDS_DEF[606]),
mMultiSportODDS_DEF.B607 = COMMON_DEF[4].concat(MultiSportODDS_DEF[607]),
mMultiSportODDS_DEF.B608 = COMMON_DEF[4].concat(MultiSportODDS_DEF[608]),
mMultiSportODDS_DEF.B609 = COMMON_DEF[4].concat(MultiSportODDS_DEF[609]),
mMultiSportODDS_DEF.B610 = COMMON_DEF[4].concat(MultiSportODDS_DEF[610]),
mMultiSportODDS_DEF.B611 = COMMON_DEF[4].concat(MultiSportODDS_DEF[611]),
mMultiSportODDS_DEF.B612 = COMMON_DEF[4].concat(MultiSportODDS_DEF[612]),
mMultiSportODDS_DEF.B613 = COMMON_DEF[4].concat(MultiSportODDS_DEF[613]),
mMultiSportODDS_DEF.B614 = COMMON_DEF[4].concat(MultiSportODDS_DEF[614]),
mMultiSportODDS_DEF.B615 = COMMON_DEF[4].concat(MultiSportODDS_DEF[615]),
mMultiSportODDS_DEF.B616 = COMMON_DEF[4].concat(MultiSportODDS_DEF[616]),
mMultiSportODDS_DEF.B617 = COMMON_DEF[4].concat(MultiSportODDS_DEF[617]),
mMultiSportODDS_DEF.B9002 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9002]),
mMultiSportODDS_DEF.B9003 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9003]),
mMultiSportODDS_DEF.B9005 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9005]),
mMultiSportODDS_DEF.B9006 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9006]),
mMultiSportODDS_DEF.B9007 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9007]),
mMultiSportODDS_DEF.B9008 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9008]),
mMultiSportODDS_DEF.B9009 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9009]),
mMultiSportODDS_DEF.B9011 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9011]),
mMultiSportODDS_DEF.B9012 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9012]),
mMultiSportODDS_DEF.B9013 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9013]),
mMultiSportODDS_DEF.B9015 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9015]),
mMultiSportODDS_DEF.B9016 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9016]),
mMultiSportODDS_DEF.B9017 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9017]),
mMultiSportODDS_DEF.B9018 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9018]),
mMultiSportODDS_DEF.B9019 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9019]),
mMultiSportODDS_DEF.B9021 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9021]),
mMultiSportODDS_DEF.B9022 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9022]),
mMultiSportODDS_DEF.B9023 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9023]),
mMultiSportODDS_DEF.B9024 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9024]),
mMultiSportODDS_DEF.B9025 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9025]),
mMultiSportODDS_DEF.B9027 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9027]),
mMultiSportODDS_DEF.B9028 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9028]),
mMultiSportODDS_DEF.B9029 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9029]),
mMultiSportODDS_DEF.B9031 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9031]),
mMultiSportODDS_DEF.B9032 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9032]),
mMultiSportODDS_DEF.B9033 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9033]),
mMultiSportODDS_DEF.B9034 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9034]),
mMultiSportODDS_DEF.B9035 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9035]),
mMultiSportODDS_DEF.B9037 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9037]),
mMultiSportODDS_DEF.B9038 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9038]),
mMultiSportODDS_DEF.B9039 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9039]),
mMultiSportODDS_DEF.B9040 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9040]),
mMultiSportODDS_DEF.B9041 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9041]),
mMultiSportODDS_DEF.B9043 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9043]),
mMultiSportODDS_DEF.B9044 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9044]),
mMultiSportODDS_DEF.B9045 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9045]),
mMultiSportODDS_DEF.B9046 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9046]),
mMultiSportODDS_DEF.B9047 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9047]),
mMultiSportODDS_DEF.B9049 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9049]),
mMultiSportODDS_DEF.B9050 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9050]),
mMultiSportODDS_DEF.B9051 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9051]),
mMultiSportODDS_DEF.B9052 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9052]),
mMultiSportODDS_DEF.B9053 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9053]),
mMultiSportODDS_DEF.B9055 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9055]),
mMultiSportODDS_DEF.B9056 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9056]),
mMultiSportODDS_DEF.B9057 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9057]),
mMultiSportODDS_DEF.B9058 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9058]),
mMultiSportODDS_DEF.B9059 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9059]),
mMultiSportODDS_DEF.B9060 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9060]),
mMultiSportODDS_DEF.B9061 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9061]),
mMultiSportODDS_DEF.B9062 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9062]),
mMultiSportODDS_DEF.B9063 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9063]),
mMultiSportODDS_DEF.B9064 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9064]),
mMultiSportODDS_DEF.B9065 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9065]),
mMultiSportODDS_DEF.B9066 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9066]),
mMultiSportODDS_DEF.B9067 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9067]),
mMultiSportODDS_DEF.B9068 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9068]),
mMultiSportODDS_DEF.B9069 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9069]),
mMultiSportODDS_DEF.B9070 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9070]),
mMultiSportODDS_DEF.B9071 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9071]),
mMultiSportODDS_DEF.B9072 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9072]),
mMultiSportODDS_DEF.B9073 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9073]),
mMultiSportODDS_DEF.B9074 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9074]),
mMultiSportODDS_DEF.B9075 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9075]),
mMultiSportODDS_DEF.B9076 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9076]),
mMultiSportODDS_DEF.B9077 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9077]),
mMultiSportODDS_DEF.B9078 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9078]),
mMultiSportODDS_DEF.B9079 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9079]),
mMultiSportODDS_DEF.B9080 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9080]),
mMultiSportODDS_DEF.B9081 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9081]),
mMultiSportODDS_DEF.B9082 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9082]),
mMultiSportODDS_DEF.B9083 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9083]),
mMultiSportODDS_DEF.B9084 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9084]),
mMultiSportODDS_DEF.B9085 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9085]),
mMultiSportODDS_DEF.B9086 = COMMON_DEF[4].concat(MultiSportODDS_DEF[9086]);
var LIVESCORE_DEF = new Array;
LIVESCORE_DEF[2] = new Array("GS","LLP","H1Q","H2Q","H3Q","H4Q","A1Q","A2Q","A3Q","A4Q","HOT","AOT","HIDE","HTG","ATG"),
LIVESCORE_DEF[3] = new Array("GS","LLP","H1Q","H2Q","H3Q","H4Q","A1Q","A2Q","A3Q","A4Q","HOT","AOT","BALLON","DOWN","TOGO","HIDE","HTG","ATG"),
LIVESCORE_DEF[4] = new Array("GS","LLP","H1S","H2S","H3S","A1S","A2S","A3S","HOT","AOT","HIDE","HTG","ATG","PP","HPP","APP"),
LIVESCORE_DEF[7] = new Array("GS","HFM","AFM","CFM","HPT","APT","HLS","TRN"),
LIVESCORE_DEF[5] = new Array("GS","LLP","H1S","H2S","H3S","H4S","H5S","A1S","A2S","A3S","A4S","A5S","HPT","APT","HS","AS","SERVING","GT","HIDE","HTG","ATG","INJ"),
LIVESCORE_DEF[8] = new Array("GS","LLP","H1S","H2S","H3S","H4S","H5S","H6S","H7S","H8S","H9S","A1S","A2S","A3S","A4S","A5S","A6S","A7S","A8S","A9S","HOT","AOT","Battle","B1","B2","B3","Out","HIDE","HRUNS","ARUNS"),
LIVESCORE_DEF[26] = new Array("GS","LLP"),
LIVESCORE_DEF[28] = new Array("GS","LLP"),
LIVESCORE_DEF[48] = new Array("GS","LLP","H1S","H2S","H3S","A1S","A2S","A3S","HPT","APT","HS","AS","SERVING","GT","HIDE","HTG","ATG","INJ");
var LIVE_SCORE_HEAD_DEF = new Array("MUID")
  , LIVE_SCORE_DEF = new Array;
LIVE_SCORE_DEF[2] = LIVE_SCORE_HEAD_DEF.concat(LIVESCORE_DEF[2]),
LIVE_SCORE_DEF[3] = LIVE_SCORE_HEAD_DEF.concat(LIVESCORE_DEF[3]),
LIVE_SCORE_DEF[4] = LIVE_SCORE_HEAD_DEF.concat(LIVESCORE_DEF[4]),
LIVE_SCORE_DEF[5] = LIVE_SCORE_HEAD_DEF.concat(LIVESCORE_DEF[5]),
LIVE_SCORE_DEF[6] = LIVE_SCORE_DEF[5],
LIVE_SCORE_DEF[7] = LIVE_SCORE_HEAD_DEF.concat(LIVESCORE_DEF[7]),
LIVE_SCORE_DEF[8] = LIVE_SCORE_HEAD_DEF.concat(LIVESCORE_DEF[8]),
LIVE_SCORE_DEF[9] = LIVE_SCORE_DEF[5],
LIVE_SCORE_DEF[26] = LIVE_SCORE_HEAD_DEF.concat(LIVESCORE_DEF[26]),
LIVE_SCORE_DEF[28] = LIVE_SCORE_HEAD_DEF.concat(LIVESCORE_DEF[28]),
LIVE_SCORE_DEF[48] = LIVE_SCORE_HEAD_DEF.concat(LIVESCORE_DEF[48]);
var ODDS_HEAD_DEF = new Array("MUID","BetType")
  , ODDS_DEF = new Array;
ODDS_DEF[0] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[0]),
ODDS_DEF[1] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[1]),
ODDS_DEF[2] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[2]),
ODDS_DEF[3] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[3]),
ODDS_DEF[4] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[4]),
ODDS_DEF[5] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[5]),
ODDS_DEF[6] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[6]),
ODDS_DEF[7] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[7]),
ODDS_DEF[8] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[8]),
ODDS_DEF[12] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[12]),
ODDS_DEF[14] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[14]),
ODDS_DEF[15] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[15]),
ODDS_DEF[16] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[16]),
ODDS_DEF[20] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[20]),
ODDS_DEF[21] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[21]),
ODDS_DEF[30] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[30]),
ODDS_DEF[81] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[81]),
ODDS_DEF[82] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[82]),
ODDS_DEF[83] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[83]),
ODDS_DEF[84] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[84]),
ODDS_DEF[85] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[85]),
ODDS_DEF[86] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[86]),
ODDS_DEF[87] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[87]),
ODDS_DEF[88] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[88]),
ODDS_DEF[89] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[89]),
ODDS_DEF[901] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[901]),
ODDS_DEF[902] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[902]),
ODDS_DEF[903] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[903]),
ODDS_DEF[904] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[904]),
ODDS_DEF[905] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[905]),
ODDS_DEF[126] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[126]),
ODDS_DEF[127] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[127]),
ODDS_DEF[128] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[128]),
ODDS_DEF[133] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[133]),
ODDS_DEF[134] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[134]),
ODDS_DEF[135] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[135]),
ODDS_DEF[140] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[140]),
ODDS_DEF[141] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[141]),
ODDS_DEF[142] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[142]),
ODDS_DEF[143] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[143]),
ODDS_DEF[144] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[144]),
ODDS_DEF[145] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[145]),
ODDS_DEF[146] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[146]),
ODDS_DEF[147] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[147]),
ODDS_DEF[148] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[148]),
ODDS_DEF[149] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[149]),
ODDS_DEF[150] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[150]),
ODDS_DEF[151] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[151]),
ODDS_DEF[152] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[152]),
ODDS_DEF[153] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[153]),
ODDS_DEF[301] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[301]),
ODDS_DEF[302] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[302]),
ODDS_DEF[303] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[303]),
ODDS_DEF[304] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[304]),
ODDS_DEF[221] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[221]),
ODDS_DEF[222] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[222]),
ODDS_DEF[223] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[223]),
ODDS_DEF[224] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[224]),
ODDS_DEF[225] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[225]),
ODDS_DEF[226] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[226]),
ODDS_DEF[227] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[227]),
ODDS_DEF[401] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[401]),
ODDS_DEF[402] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[402]),
ODDS_DEF[403] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[403]),
ODDS_DEF[404] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[404]),
ODDS_DEF[405] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[405]),
ODDS_DEF[412] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[412]),
ODDS_DEF[413] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[413]),
ODDS_DEF[414] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[414]),
ODDS_DEF[416] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[416]),
ODDS_DEF[417] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[417]),
ODDS_DEF[418] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[418]),
ODDS_DEF[419] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[419]),
ODDS_DEF[420] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[420]),
ODDS_DEF[421] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[421]),
ODDS_DEF[422] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[422]),
ODDS_DEF[423] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[423]),
ODDS_DEF[424] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[424]),
ODDS_DEF[425] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[425]),
ODDS_DEF[426] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[426]),
ODDS_DEF[429] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[429]),
ODDS_DEF[445] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[445]),
ODDS_DEF[446] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[446]),
ODDS_DEF[447] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[447]),
ODDS_DEF[448] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[448]),
ODDS_DEF[449] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[449]),
ODDS_DEF[450] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[450]),
ODDS_DEF[451] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[451]),
ODDS_DEF[452] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[452]),
ODDS_DEF[453] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[453]),
ODDS_DEF[454] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[454]),
ODDS_DEF[455] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[455]),
ODDS_DEF[456] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[456]),
ODDS_DEF[457] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[457]),
ODDS_DEF[458] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[458]),
ODDS_DEF[459] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[459]),
ODDS_DEF[460] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[460]),
ODDS_DEF[461] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[461]),
ODDS_DEF[462] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[462]),
ODDS_DEF[463] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[463]),
ODDS_DEF[464] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[464]),
ODDS_DEF[501] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[501]),
ODDS_DEF[601] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[601]),
ODDS_DEF[602] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[602]),
ODDS_DEF[603] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[603]),
ODDS_DEF[604] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[604]),
ODDS_DEF[605] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[605]),
ODDS_DEF[606] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[606]),
ODDS_DEF[607] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[607]),
ODDS_DEF[608] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[608]),
ODDS_DEF[609] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[609]),
ODDS_DEF[610] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[610]),
ODDS_DEF[611] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[611]),
ODDS_DEF[612] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[612]),
ODDS_DEF[613] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[613]),
ODDS_DEF[614] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[614]),
ODDS_DEF[615] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[615]),
ODDS_DEF[616] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[616]),
ODDS_DEF[617] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[617]),
ODDS_DEF[9001] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9001]),
ODDS_DEF[900101] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[900101]),
ODDS_DEF[900102] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[900102]),
ODDS_DEF[900103] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[900103]),
ODDS_DEF[900104] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[900104]),
ODDS_DEF[900105] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[900105]),
ODDS_DEF[900106] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[900106]),
ODDS_DEF[900107] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[900107]),
ODDS_DEF[900108] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[900108]),
ODDS_DEF[900109] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[900109]),
ODDS_DEF[9002] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9002]),
ODDS_DEF[9003] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9003]),
ODDS_DEF[9005] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9005]),
ODDS_DEF[9006] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9006]),
ODDS_DEF[9007] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9007]),
ODDS_DEF[9008] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9008]),
ODDS_DEF[9009] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9009]),
ODDS_DEF[9011] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9011]),
ODDS_DEF[9012] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9012]),
ODDS_DEF[9013] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9013]),
ODDS_DEF[9015] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9015]),
ODDS_DEF[9016] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9016]),
ODDS_DEF[9017] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9017]),
ODDS_DEF[9018] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9018]),
ODDS_DEF[9019] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9019]),
ODDS_DEF[9021] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9021]),
ODDS_DEF[9022] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9022]),
ODDS_DEF[9023] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9023]),
ODDS_DEF[9024] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9024]),
ODDS_DEF[9025] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9025]),
ODDS_DEF[9027] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9027]),
ODDS_DEF[9028] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9028]),
ODDS_DEF[9029] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9029]),
ODDS_DEF[9031] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9031]),
ODDS_DEF[9032] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9032]),
ODDS_DEF[9033] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9033]),
ODDS_DEF[9034] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9034]),
ODDS_DEF[9035] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9035]),
ODDS_DEF[9037] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9037]),
ODDS_DEF[9038] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9038]),
ODDS_DEF[9039] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9039]),
ODDS_DEF[9040] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9040]),
ODDS_DEF[9041] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9041]),
ODDS_DEF[9043] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9043]),
ODDS_DEF[9044] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9044]),
ODDS_DEF[9045] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9045]),
ODDS_DEF[9046] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9046]),
ODDS_DEF[9047] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9047]),
ODDS_DEF[9049] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9049]),
ODDS_DEF[9050] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9050]),
ODDS_DEF[9051] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9051]),
ODDS_DEF[9052] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9052]),
ODDS_DEF[9053] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9053]),
ODDS_DEF[9055] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9055]),
ODDS_DEF[9056] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9056]),
ODDS_DEF[9057] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9057]),
ODDS_DEF[9058] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9058]),
ODDS_DEF[9059] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9059]),
ODDS_DEF[9060] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9060]),
ODDS_DEF[9061] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9061]),
ODDS_DEF[9062] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9062]),
ODDS_DEF[9063] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9063]),
ODDS_DEF[9064] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9064]),
ODDS_DEF[9065] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9065]),
ODDS_DEF[9066] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9066]),
ODDS_DEF[9067] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9067]),
ODDS_DEF[9068] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9068]),
ODDS_DEF[9069] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9069]),
ODDS_DEF[9070] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9070]),
ODDS_DEF[9071] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9071]),
ODDS_DEF[9072] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9072]),
ODDS_DEF[9073] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9073]),
ODDS_DEF[9074] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9074]),
ODDS_DEF[9075] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9075]),
ODDS_DEF[9076] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9076]),
ODDS_DEF[9077] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9077]),
ODDS_DEF[9078] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9078]),
ODDS_DEF[9079] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9079]),
ODDS_DEF[9080] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9080]),
ODDS_DEF[9081] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9081]),
ODDS_DEF[9082] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9082]),
ODDS_DEF[9083] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9083]),
ODDS_DEF[9084] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9084]),
ODDS_DEF[9085] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9085]),
ODDS_DEF[9086] = ODDS_HEAD_DEF.concat(MultiSportODDS_DEF[9086]);
var ARR_BETYPE_DEF = new Array;
ARR_BETYPE_DEF[1] = new Array(1,3,5,7,8,15,301,302,303,304),
ARR_BETYPE_DEF[2] = new Array(1,2,3,7,8,12,20,21),
ARR_BETYPE_DEF[3] = new Array(1,2,3,7,8,12),
ARR_BETYPE_DEF[26] = ARR_BETYPE_DEF[3],
ARR_BETYPE_DEF[32] = ARR_BETYPE_DEF[3],
ARR_BETYPE_DEF[4] = new Array(1,2,3,20),
ARR_BETYPE_DEF[5] = new Array(1,2,3,20,153),
ARR_BETYPE_DEF[6] = ARR_BETYPE_DEF[4],
ARR_BETYPE_DEF[7] = ARR_BETYPE_DEF[4],
ARR_BETYPE_DEF[8] = new Array(1,3,7,8,20,21),
ARR_BETYPE_DEF[9] = ARR_BETYPE_DEF[4],
ARR_BETYPE_DEF[10] = ARR_BETYPE_DEF[4],
ARR_BETYPE_DEF[11] = ARR_BETYPE_DEF[4],
ARR_BETYPE_DEF[12] = ARR_BETYPE_DEF[4],
ARR_BETYPE_DEF[13] = ARR_BETYPE_DEF[4],
ARR_BETYPE_DEF[14] = ARR_BETYPE_DEF[4],
ARR_BETYPE_DEF[15] = ARR_BETYPE_DEF[4],
ARR_BETYPE_DEF[16] = ARR_BETYPE_DEF[4],
ARR_BETYPE_DEF[17] = ARR_BETYPE_DEF[4],
ARR_BETYPE_DEF[18] = ARR_BETYPE_DEF[4],
ARR_BETYPE_DEF[19] = ARR_BETYPE_DEF[4],
ARR_BETYPE_DEF[20] = ARR_BETYPE_DEF[4],
ARR_BETYPE_DEF[21] = ARR_BETYPE_DEF[4],
ARR_BETYPE_DEF[22] = ARR_BETYPE_DEF[4],
ARR_BETYPE_DEF[23] = ARR_BETYPE_DEF[4],
ARR_BETYPE_DEF[24] = ARR_BETYPE_DEF[4],
ARR_BETYPE_DEF[25] = ARR_BETYPE_DEF[4],
ARR_BETYPE_DEF[28] = ARR_BETYPE_DEF[4],
ARR_BETYPE_DEF[29] = ARR_BETYPE_DEF[4],
ARR_BETYPE_DEF[30] = ARR_BETYPE_DEF[4],
ARR_BETYPE_DEF[31] = ARR_BETYPE_DEF[4],
ARR_BETYPE_DEF[33] = ARR_BETYPE_DEF[4],
ARR_BETYPE_DEF[34] = ARR_BETYPE_DEF[4],
ARR_BETYPE_DEF[35] = ARR_BETYPE_DEF[4],
ARR_BETYPE_DEF[36] = ARR_BETYPE_DEF[4],
ARR_BETYPE_DEF[37] = ARR_BETYPE_DEF[4],
ARR_BETYPE_DEF[38] = ARR_BETYPE_DEF[4],
ARR_BETYPE_DEF[39] = ARR_BETYPE_DEF[4],
ARR_BETYPE_DEF[40] = ARR_BETYPE_DEF[4],
ARR_BETYPE_DEF[41] = ARR_BETYPE_DEF[4],
ARR_BETYPE_DEF[42] = ARR_BETYPE_DEF[4],
ARR_BETYPE_DEF[43] = new Array(1,3,20,900101,900102,900103),
ARR_BETYPE_DEF[44] = ARR_BETYPE_DEF[4],
ARR_BETYPE_DEF[47] = ARR_BETYPE_DEF[4],
ARR_BETYPE_DEF[48] = ARR_BETYPE_DEF[4],
ARR_BETYPE_DEF[49] = ARR_BETYPE_DEF[4],
ARR_BETYPE_DEF[51] = ARR_BETYPE_DEF[4],
ARR_BETYPE_DEF[52] = ARR_BETYPE_DEF[4],
ARR_BETYPE_DEF[53] = ARR_BETYPE_DEF[4],
ARR_BETYPE_DEF[54] = ARR_BETYPE_DEF[4],
ARR_BETYPE_DEF[55] = ARR_BETYPE_DEF[4],
ARR_BETYPE_DEF[56] = new Array(1,2,3,7,8,12,20),
ARR_BETYPE_DEF[99] = ARR_BETYPE_DEF[4],
ARR_BETYPE_DEF[27] = new Array(1,2,3,5,20),
ARR_BETYPE_DEF[154] = new Array("20"),
ARR_BETYPE_DEF[161] = new Array(85,86,87,88,89,901,902,903,904,905),
ARR_BETYPE_DEF["161d"] = new Array(81,82,83,84,85,86,88),
ARR_BETYPE_DEF.CS = new Array(4,30,405,413,414),
ARR_BETYPE_DEF[50] = new Array(1,2,3,5,501,502);
var ARR_FIELDS_DEF = new Array;
ARR_FIELDS_DEF[1] = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(FIELDS_DEF[1]).concat(ExtFIELDS_DEF[1]).concat(COMMON_DEF[3]).concat(COMMON_DEF[1]).concat(MargeOddsArray("1")),
ARR_FIELDS_DEF[2] = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(FIELDS_DEF[2]).concat(COMMON_DEF[1]).concat(MargeOddsArray("2")).concat(LIVESCORE_DEF[2]),
ARR_FIELDS_DEF[3] = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(COMMON_DEF[1]).concat(MargeOddsArray("3")).concat(LIVESCORE_DEF[3]),
ARR_FIELDS_DEF[26] = ARR_FIELDS_DEF[3],
ARR_FIELDS_DEF[32] = ARR_FIELDS_DEF[3],
ARR_FIELDS_DEF[10] = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(COMMON_DEF[1]).concat(MargeOddsArray("4")),
ARR_FIELDS_DEF[7] = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(COMMON_DEF[1]).concat(MargeOddsArray("7")).concat(LIVESCORE_DEF[7]),
ARR_FIELDS_DEF[4] = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(COMMON_DEF[1]).concat(MargeOddsArray("4")).concat(LIVESCORE_DEF[4]),
ARR_FIELDS_DEF[5] = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(FIELDS_DEF[5]).concat(COMMON_DEF[1]).concat(MargeOddsArray("5")).concat(LIVESCORE_DEF[5]),
ARR_FIELDS_DEF[6] = ARR_FIELDS_DEF[10].concat(LIVESCORE_DEF[5]),
ARR_FIELDS_DEF[9] = ARR_FIELDS_DEF[6],
ARR_FIELDS_DEF[11] = ARR_FIELDS_DEF[10],
ARR_FIELDS_DEF[12] = ARR_FIELDS_DEF[10],
ARR_FIELDS_DEF[13] = ARR_FIELDS_DEF[10],
ARR_FIELDS_DEF[14] = ARR_FIELDS_DEF[10],
ARR_FIELDS_DEF[15] = ARR_FIELDS_DEF[10],
ARR_FIELDS_DEF[16] = ARR_FIELDS_DEF[10],
ARR_FIELDS_DEF[17] = ARR_FIELDS_DEF[10],
ARR_FIELDS_DEF[18] = ARR_FIELDS_DEF[10],
ARR_FIELDS_DEF[19] = ARR_FIELDS_DEF[10],
ARR_FIELDS_DEF[20] = ARR_FIELDS_DEF[10],
ARR_FIELDS_DEF[21] = ARR_FIELDS_DEF[10],
ARR_FIELDS_DEF[22] = ARR_FIELDS_DEF[10],
ARR_FIELDS_DEF[23] = ARR_FIELDS_DEF[10],
ARR_FIELDS_DEF[24] = ARR_FIELDS_DEF[10],
ARR_FIELDS_DEF[25] = ARR_FIELDS_DEF[10],
ARR_FIELDS_DEF[28] = ARR_FIELDS_DEF[10],
ARR_FIELDS_DEF[29] = ARR_FIELDS_DEF[10],
ARR_FIELDS_DEF[30] = ARR_FIELDS_DEF[10],
ARR_FIELDS_DEF[31] = ARR_FIELDS_DEF[10],
ARR_FIELDS_DEF[33] = ARR_FIELDS_DEF[10],
ARR_FIELDS_DEF[34] = ARR_FIELDS_DEF[10],
ARR_FIELDS_DEF[35] = ARR_FIELDS_DEF[10],
ARR_FIELDS_DEF[36] = ARR_FIELDS_DEF[10],
ARR_FIELDS_DEF[37] = ARR_FIELDS_DEF[10],
ARR_FIELDS_DEF[38] = ARR_FIELDS_DEF[10],
ARR_FIELDS_DEF[39] = ARR_FIELDS_DEF[10],
ARR_FIELDS_DEF[40] = ARR_FIELDS_DEF[10],
ARR_FIELDS_DEF[41] = ARR_FIELDS_DEF[10],
ARR_FIELDS_DEF[42] = ARR_FIELDS_DEF[10],
ARR_FIELDS_DEF[43] = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(FIELDS_DEF[5]).concat(COMMON_DEF[1]).concat(FIELDS_DEF[43]).concat(MargeOddsArray("43")),
ARR_FIELDS_DEF[44] = ARR_FIELDS_DEF[10],
ARR_FIELDS_DEF[47] = ARR_FIELDS_DEF[10],
ARR_FIELDS_DEF[48] = ARR_FIELDS_DEF[10].concat(LIVESCORE_DEF[48]),
ARR_FIELDS_DEF[49] = ARR_FIELDS_DEF[10],
ARR_FIELDS_DEF[50] = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(COMMON_DEF[1]).concat(MargeOddsArray("50")),
ARR_FIELDS_DEF[51] = ARR_FIELDS_DEF[10],
ARR_FIELDS_DEF[52] = ARR_FIELDS_DEF[10],
ARR_FIELDS_DEF[53] = ARR_FIELDS_DEF[10],
ARR_FIELDS_DEF[54] = ARR_FIELDS_DEF[10],
ARR_FIELDS_DEF[55] = ARR_FIELDS_DEF[10],
ARR_FIELDS_DEF[56] = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(COMMON_DEF[1]).concat(MargeOddsArray("56")),
ARR_FIELDS_DEF[99] = ARR_FIELDS_DEF[10],
ARR_FIELDS_DEF[8] = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(FIELDS_DEF[8]).concat(COMMON_DEF[1]).concat(MargeOddsArray("8")).concat(LIVESCORE_DEF[8]),
ARR_FIELDS_DEF[27] = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(COMMON_DEF[1]).concat(MargeOddsArray("27")),
ARR_FIELDS_DEF[161] = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(FIELDS_DEF[161]).concat(COMMON_DEF[1]).concat(MargeOddsArray("161"));
var ARR_FIELDS_DEF2 = new Array;
ARR_FIELDS_DEF2[1] = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(FIELDS_DEF[1]).concat(COMMON_DEF[2]).concat(COMMON_DEF[6]).concat(MargeOddsArray("1")),
ARR_FIELDS_DEF2[2] = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(FIELDS_DEF[2]).concat(COMMON_DEF[2]).concat(MargeOddsArray("2")).concat(LIVESCORE_DEF[2]),
ARR_FIELDS_DEF2[3] = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(COMMON_DEF[2]).concat(MargeOddsArray("3")).concat(LIVESCORE_DEF[3]),
ARR_FIELDS_DEF2[26] = ARR_FIELDS_DEF2[3],
ARR_FIELDS_DEF2[32] = ARR_FIELDS_DEF2[3],
ARR_FIELDS_DEF2[10] = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(COMMON_DEF[2]).concat(MargeOddsArray("4")),
ARR_FIELDS_DEF2[7] = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(COMMON_DEF[2]).concat(MargeOddsArray("7")).concat(LIVESCORE_DEF[7]),
ARR_FIELDS_DEF2[4] = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(COMMON_DEF[2]).concat(MargeOddsArray("4")).concat(LIVESCORE_DEF[4]),
ARR_FIELDS_DEF2[5] = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(FIELDS_DEF[5]).concat(COMMON_DEF[2]).concat(MargeOddsArray("5")).concat(LIVESCORE_DEF[5]),
ARR_FIELDS_DEF2[6] = ARR_FIELDS_DEF2[10].concat(LIVESCORE_DEF[5]),
ARR_FIELDS_DEF2[9] = ARR_FIELDS_DEF2[6],
ARR_FIELDS_DEF2[11] = ARR_FIELDS_DEF2[10],
ARR_FIELDS_DEF2[12] = ARR_FIELDS_DEF2[10],
ARR_FIELDS_DEF2[13] = ARR_FIELDS_DEF2[10],
ARR_FIELDS_DEF2[14] = ARR_FIELDS_DEF2[10],
ARR_FIELDS_DEF2[15] = ARR_FIELDS_DEF2[10],
ARR_FIELDS_DEF2[16] = ARR_FIELDS_DEF2[10],
ARR_FIELDS_DEF2[17] = ARR_FIELDS_DEF2[10],
ARR_FIELDS_DEF2[18] = ARR_FIELDS_DEF2[10],
ARR_FIELDS_DEF2[19] = ARR_FIELDS_DEF2[10],
ARR_FIELDS_DEF2[20] = ARR_FIELDS_DEF2[10],
ARR_FIELDS_DEF2[21] = ARR_FIELDS_DEF2[10],
ARR_FIELDS_DEF2[22] = ARR_FIELDS_DEF2[10],
ARR_FIELDS_DEF2[23] = ARR_FIELDS_DEF2[10],
ARR_FIELDS_DEF2[24] = ARR_FIELDS_DEF2[10],
ARR_FIELDS_DEF2[25] = ARR_FIELDS_DEF2[10],
ARR_FIELDS_DEF2[28] = ARR_FIELDS_DEF2[10],
ARR_FIELDS_DEF2[29] = ARR_FIELDS_DEF2[10],
ARR_FIELDS_DEF2[30] = ARR_FIELDS_DEF2[10],
ARR_FIELDS_DEF2[31] = ARR_FIELDS_DEF2[10],
ARR_FIELDS_DEF2[33] = ARR_FIELDS_DEF2[10],
ARR_FIELDS_DEF2[34] = ARR_FIELDS_DEF2[10],
ARR_FIELDS_DEF2[35] = ARR_FIELDS_DEF2[10],
ARR_FIELDS_DEF2[36] = ARR_FIELDS_DEF2[10],
ARR_FIELDS_DEF2[37] = ARR_FIELDS_DEF2[10],
ARR_FIELDS_DEF2[38] = ARR_FIELDS_DEF2[10],
ARR_FIELDS_DEF2[39] = ARR_FIELDS_DEF2[10],
ARR_FIELDS_DEF2[40] = ARR_FIELDS_DEF2[10],
ARR_FIELDS_DEF2[41] = ARR_FIELDS_DEF2[10],
ARR_FIELDS_DEF2[42] = ARR_FIELDS_DEF2[10],
ARR_FIELDS_DEF2[43] = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(FIELDS_DEF[5]).concat(COMMON_DEF[2]).concat(FIELDS_DEF[43]).concat(MargeOddsArray("43")),
ARR_FIELDS_DEF2[44] = ARR_FIELDS_DEF2[10],
ARR_FIELDS_DEF2[47] = ARR_FIELDS_DEF2[10],
ARR_FIELDS_DEF2[48] = ARR_FIELDS_DEF2[10].concat(LIVESCORE_DEF[48]),
ARR_FIELDS_DEF2[49] = ARR_FIELDS_DEF2[10],
ARR_FIELDS_DEF2[50] = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(COMMON_DEF[2]).concat(MargeOddsArray("50")),
ARR_FIELDS_DEF2[51] = ARR_FIELDS_DEF2[10],
ARR_FIELDS_DEF2[52] = ARR_FIELDS_DEF2[10],
ARR_FIELDS_DEF2[53] = ARR_FIELDS_DEF2[10],
ARR_FIELDS_DEF2[54] = ARR_FIELDS_DEF2[10],
ARR_FIELDS_DEF2[55] = ARR_FIELDS_DEF2[10],
ARR_FIELDS_DEF2[56] = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(COMMON_DEF[2]).concat(MargeOddsArray("56")),
ARR_FIELDS_DEF2[99] = ARR_FIELDS_DEF2[10],
ARR_FIELDS_DEF2[8] = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(FIELDS_DEF[8]).concat(COMMON_DEF[2]).concat(MargeOddsArray("8")).concat(LIVESCORE_DEF[8]),
ARR_FIELDS_DEF2[27] = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(COMMON_DEF[2]).concat(MargeOddsArray("27")),
ARR_FIELDS_DEF2[161] = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(FIELDS_DEF[161]).concat(COMMON_DEF[2]).concat(MargeOddsArray("161"));
var ARR_FIELDS_DEF1 = new Array;
ARR_FIELDS_DEF1[1] = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(FIELDS_DEF[1]).concat(ExtFIELDS_DEF[1]).concat(COMMON_DEF[3]).concat(MargeOddsArray("1")),
ARR_FIELDS_DEF1[2] = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(FIELDS_DEF[2]).concat(MargeOddsArray("2")).concat(LIVESCORE_DEF[2]),
ARR_FIELDS_DEF1[3] = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(MargeOddsArray("3")).concat(LIVESCORE_DEF[3]),
ARR_FIELDS_DEF1[26] = ARR_FIELDS_DEF1[3],
ARR_FIELDS_DEF1[32] = ARR_FIELDS_DEF1[3],
ARR_FIELDS_DEF1[10] = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(MargeOddsArray("4")),
ARR_FIELDS_DEF1[7] = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(MargeOddsArray("7")).concat(LIVESCORE_DEF[7]),
ARR_FIELDS_DEF1[4] = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(MargeOddsArray("4")).concat(LIVESCORE_DEF[4]),
ARR_FIELDS_DEF1[5] = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(FIELDS_DEF[5]).concat(MargeOddsArray("5")).concat(LIVESCORE_DEF[5]),
ARR_FIELDS_DEF1[6] = ARR_FIELDS_DEF1[10].concat(LIVESCORE_DEF[5]),
ARR_FIELDS_DEF1[9] = ARR_FIELDS_DEF1[6],
ARR_FIELDS_DEF1[11] = ARR_FIELDS_DEF1[10],
ARR_FIELDS_DEF1[12] = ARR_FIELDS_DEF1[10],
ARR_FIELDS_DEF1[13] = ARR_FIELDS_DEF1[10],
ARR_FIELDS_DEF1[14] = ARR_FIELDS_DEF1[10],
ARR_FIELDS_DEF1[15] = ARR_FIELDS_DEF1[10],
ARR_FIELDS_DEF1[16] = ARR_FIELDS_DEF1[10],
ARR_FIELDS_DEF1[17] = ARR_FIELDS_DEF1[10],
ARR_FIELDS_DEF1[18] = ARR_FIELDS_DEF1[10],
ARR_FIELDS_DEF1[19] = ARR_FIELDS_DEF1[10],
ARR_FIELDS_DEF1[20] = ARR_FIELDS_DEF1[10],
ARR_FIELDS_DEF1[21] = ARR_FIELDS_DEF1[10],
ARR_FIELDS_DEF1[22] = ARR_FIELDS_DEF1[10],
ARR_FIELDS_DEF1[23] = ARR_FIELDS_DEF1[10],
ARR_FIELDS_DEF1[24] = ARR_FIELDS_DEF1[10],
ARR_FIELDS_DEF1[25] = ARR_FIELDS_DEF1[10],
ARR_FIELDS_DEF1[28] = ARR_FIELDS_DEF1[10],
ARR_FIELDS_DEF1[29] = ARR_FIELDS_DEF1[10],
ARR_FIELDS_DEF1[30] = ARR_FIELDS_DEF1[10],
ARR_FIELDS_DEF1[31] = ARR_FIELDS_DEF1[10],
ARR_FIELDS_DEF1[33] = ARR_FIELDS_DEF1[10],
ARR_FIELDS_DEF1[34] = ARR_FIELDS_DEF1[10],
ARR_FIELDS_DEF1[35] = ARR_FIELDS_DEF1[10],
ARR_FIELDS_DEF1[36] = ARR_FIELDS_DEF1[10],
ARR_FIELDS_DEF1[37] = ARR_FIELDS_DEF1[10],
ARR_FIELDS_DEF1[38] = ARR_FIELDS_DEF1[10],
ARR_FIELDS_DEF1[39] = ARR_FIELDS_DEF1[10],
ARR_FIELDS_DEF1[40] = ARR_FIELDS_DEF1[10],
ARR_FIELDS_DEF1[41] = ARR_FIELDS_DEF1[10],
ARR_FIELDS_DEF1[42] = ARR_FIELDS_DEF1[10],
ARR_FIELDS_DEF1[43] = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(FIELDS_DEF[5]).concat(FIELDS_DEF[43]).concat(MargeOddsArray("43")),
ARR_FIELDS_DEF1[44] = ARR_FIELDS_DEF1[10],
ARR_FIELDS_DEF1[47] = ARR_FIELDS_DEF1[10],
ARR_FIELDS_DEF1[48] = ARR_FIELDS_DEF1[10].concat(LIVESCORE_DEF[48]),
ARR_FIELDS_DEF1[49] = ARR_FIELDS_DEF1[10],
ARR_FIELDS_DEF1[51] = ARR_FIELDS_DEF1[10],
ARR_FIELDS_DEF1[50] = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(MargeOddsArray("50")),
ARR_FIELDS_DEF1[52] = ARR_FIELDS_DEF1[10],
ARR_FIELDS_DEF1[53] = ARR_FIELDS_DEF1[10],
ARR_FIELDS_DEF1[54] = ARR_FIELDS_DEF1[10],
ARR_FIELDS_DEF1[55] = ARR_FIELDS_DEF1[10],
ARR_FIELDS_DEF1[56] = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(MargeOddsArray("56")),
ARR_FIELDS_DEF1[99] = ARR_FIELDS_DEF1[10],
ARR_FIELDS_DEF1[154] = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(MargeOddsArray("154")),
ARR_FIELDS_DEF1[8] = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(FIELDS_DEF[8]).concat(MargeOddsArray("8")).concat(LIVESCORE_DEF[8]),
ARR_FIELDS_DEF1[27] = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(MargeOddsArray("27")),
ARR_FIELDS_DEF1[161] = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(FIELDS_DEF[161]).concat(MargeOddsArray("161")),
ARR_FIELDS_DEF1["161d"] = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(FIELDS_DEF[161]).concat(MargeOddsArray("161d"));
var FIELDS_DEF_1X2 = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(COMMON_DEF[3]).concat(MultiSportODDS_DEF[5]).concat(MultiSportODDS_DEF[15])
  , FIELDS_DEF_CorrectScore = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(COMMON_DEF[3]).concat(MargeOddsArray("CS"))
  , FIELDS_DEF_FGLG = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(COMMON_DEF[3]).concat(MultiSportODDS_DEF[14]).concat(MultiSportODDS_DEF[127])
  , FIELDS_DEF_HTFT = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(COMMON_DEF[3]).concat(MultiSportODDS_DEF[16])
  , FIELDS_DEF_Oe = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(COMMON_DEF[3]).concat(MultiSportODDS_DEF[2]).concat(MultiSportODDS_DEF[12])
  , FIELDS_DEF_Tg = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(COMMON_DEF[3]).concat(MultiSportODDS_DEF[6]).concat(MultiSportODDS_DEF[126])
  , FIELDS_DEF_HTFTOE = COMMON_DEF[0].concat(FIELDS_DEF[0]).concat(COMMON_DEF[3]).concat(MultiSportODDS_DEF[128])
  , FIELDS_DEF_Outright = new Array("MatchId","MatchCode","ShowTime","LeagueId","LeagueName","TeamName","Changed","Odds","FavLeague")
  , ARR_TWOWAY_MAP = {
    1: {
        Odds_1_H: ["FavorF", "Odds_1_A", !0],
        Odds_1_A: ["FavorF", "Odds_1_H", !1],
        Odds_3_O: ["Goal_3", "Odds_3_U", !0],
        Odds_3_U: ["Goal_3", "Odds_3_O", !1],
        Odds_7_H: ["FavorH1", "Odds_7_A", !0],
        Odds_7_A: ["FavorH1", "Odds_7_H", !1],
        Odds_8_O: ["Goal_8", "Odds_8_U", !0],
        Odds_8_U: ["Goal_8", "Odds_8_O", !1]
    }
}
  , ARR_TMPLID_DEF = new Array;
ARR_TMPLID_DEF[1] = new Array,
ARR_TMPLID_DEF[1][1] = "UnderOver_tmpl_1",
ARR_TMPLID_DEF[1][2] = "NBA_tmpl",
ARR_TMPLID_DEF[1][3] = ARR_TMPLID_DEF[1][2],
ARR_TMPLID_DEF[1][26] = ARR_TMPLID_DEF[1][2],
ARR_TMPLID_DEF[1][32] = ARR_TMPLID_DEF[1][2],
ARR_TMPLID_DEF[1][4] = "Tennis_tmpl",
ARR_TMPLID_DEF[1][5] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][6] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][7] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][8] = "Baseball_tmpl",
ARR_TMPLID_DEF[1][9] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][10] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][11] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][12] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][13] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][14] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][15] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][16] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][17] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][18] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][19] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][20] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][21] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][22] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][23] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][24] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][25] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][28] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][29] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][30] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][31] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][33] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][34] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][35] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][36] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][37] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][38] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][39] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][40] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][41] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][42] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][43] = "ESports_tmpl",
ARR_TMPLID_DEF[1][44] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][47] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][48] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][49] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][50] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][51] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][52] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][53] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][54] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][55] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][56] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][99] = ARR_TMPLID_DEF[1][2],
ARR_TMPLID_DEF[1][154] = ARR_TMPLID_DEF[1][4],
ARR_TMPLID_DEF[1][27] = "Cricket_tmpl",
ARR_TMPLID_DEF[1][161] = "Bingo_tmpl",
ARR_TMPLID_DEF[3] = new Array,
ARR_TMPLID_DEF[3][1] = "UnderOver_tmpl_3",
ARR_TMPLID_DEF[3][2] = "NBA_tmpl",
ARR_TMPLID_DEF[3][3] = ARR_TMPLID_DEF[3][2],
ARR_TMPLID_DEF[3][26] = ARR_TMPLID_DEF[3][2],
ARR_TMPLID_DEF[3][32] = ARR_TMPLID_DEF[3][2],
ARR_TMPLID_DEF[3][4] = "Tennis_tmpl",
ARR_TMPLID_DEF[3][5] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][6] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][7] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][8] = "Baseball_tmpl",
ARR_TMPLID_DEF[3][9] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][10] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][11] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][12] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][13] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][14] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][15] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][16] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][17] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][18] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][19] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][20] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][21] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][22] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][23] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][24] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][25] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][28] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][29] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][30] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][31] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][33] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][34] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][35] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][36] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][37] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][38] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][39] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][40] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][41] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][42] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][43] = "ESports_tmpl",
ARR_TMPLID_DEF[3][44] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][47] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][48] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][49] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][50] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][51] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][52] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][53] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][54] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][55] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][56] = ARR_TMPLID_DEF[3][2],
ARR_TMPLID_DEF[3][99] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][154] = ARR_TMPLID_DEF[3][4],
ARR_TMPLID_DEF[3][27] = "Cricket_tmpl",
ARR_TMPLID_DEF[3][161] = "Bingo_tmpl",
ARR_TMPLID_DEF["1F"] = new Array,
ARR_TMPLID_DEF["1F"][1] = "UnderOver_tmpl_1F",
ARR_TMPLID_DEF["1F"][2] = "NBA_tmpl",
ARR_TMPLID_DEF["1F"][3] = ARR_TMPLID_DEF["1F"][2],
ARR_TMPLID_DEF["1F"][26] = ARR_TMPLID_DEF["1F"][2],
ARR_TMPLID_DEF["1F"][32] = ARR_TMPLID_DEF["1F"][2],
ARR_TMPLID_DEF["1F"][4] = "Tennis_tmpl",
ARR_TMPLID_DEF["1F"][5] = ARR_TMPLID_DEF["1F"][4],
ARR_TMPLID_DEF["1F"][6] = ARR_TMPLID_DEF["1F"][4],
ARR_TMPLID_DEF["1F"][7] = ARR_TMPLID_DEF["1F"][4],
ARR_TMPLID_DEF["1F"][8] = "Baseball_tmpl",
ARR_TMPLID_DEF["1F"][9] = ARR_TMPLID_DEF["1F"][4],
ARR_TMPLID_DEF["1F"][10] = ARR_TMPLID_DEF["1F"][4],
ARR_TMPLID_DEF["1F"][11] = ARR_TMPLID_DEF["1F"][4],
ARR_TMPLID_DEF["1F"][12] = ARR_TMPLID_DEF["1F"][4],
ARR_TMPLID_DEF["1F"][13] = ARR_TMPLID_DEF["1F"][4],
ARR_TMPLID_DEF["1F"][14] = ARR_TMPLID_DEF["1F"][4],
ARR_TMPLID_DEF["1F"][15] = ARR_TMPLID_DEF["1F"][4],
ARR_TMPLID_DEF["1F"][16] = ARR_TMPLID_DEF["1F"][4],
ARR_TMPLID_DEF["1F"][17] = ARR_TMPLID_DEF["1F"][4],
ARR_TMPLID_DEF["1F"][18] = ARR_TMPLID_DEF["1F"][4],
ARR_TMPLID_DEF["1F"][19] = ARR_TMPLID_DEF["1F"][4],
ARR_TMPLID_DEF["1F"][20] = ARR_TMPLID_DEF["1F"][4],
ARR_TMPLID_DEF["1F"][21] = ARR_TMPLID_DEF["1F"][4],
ARR_TMPLID_DEF["1F"][22] = ARR_TMPLID_DEF["1F"][4],
ARR_TMPLID_DEF["1F"][23] = ARR_TMPLID_DEF["1F"][4],
ARR_TMPLID_DEF["1F"][24] = ARR_TMPLID_DEF["1F"][4],
ARR_TMPLID_DEF["1F"][25] = ARR_TMPLID_DEF["1F"][4],
ARR_TMPLID_DEF["1F"][28] = ARR_TMPLID_DEF["1F"][4],
ARR_TMPLID_DEF["1F"][29] = ARR_TMPLID_DEF["1F"][4],
ARR_TMPLID_DEF["1F"][30] = ARR_TMPLID_DEF["1F"][4],
ARR_TMPLID_DEF["1F"][31] = ARR_TMPLID_DEF["1F"][4],
ARR_TMPLID_DEF["1F"][33] = ARR_TMPLID_DEF["1F"][4],
ARR_TMPLID_DEF["1F"][34] = ARR_TMPLID_DEF["1F"][4],
ARR_TMPLID_DEF["1F"][35] = ARR_TMPLID_DEF["1F"][4],
ARR_TMPLID_DEF["1F"][36] = ARR_TMPLID_DEF["1F"][4],
ARR_TMPLID_DEF["1F"][37] = ARR_TMPLID_DEF["1F"][4],
ARR_TMPLID_DEF["1F"][38] = ARR_TMPLID_DEF["1F"][4],
ARR_TMPLID_DEF["1F"][39] = ARR_TMPLID_DEF["1F"][4],
ARR_TMPLID_DEF["1F"][40] = ARR_TMPLID_DEF["1F"][4],
ARR_TMPLID_DEF["1F"][41] = ARR_TMPLID_DEF["1F"][4],
ARR_TMPLID_DEF["1F"][42] = ARR_TMPLID_DEF["1F"][4],
ARR_TMPLID_DEF["1F"][43] = "ESports_tmpl",
ARR_TMPLID_DEF["1F"][44] = ARR_TMPLID_DEF["1F"][4],
ARR_TMPLID_DEF["1F"][47] = ARR_TMPLID_DEF["1F"][4],
ARR_TMPLID_DEF["1F"][48] = ARR_TMPLID_DEF["1F"][4],
ARR_TMPLID_DEF["1F"][49] = ARR_TMPLID_DEF["1F"][4],
ARR_TMPLID_DEF["1F"][50] = ARR_TMPLID_DEF["1F"][4],
ARR_TMPLID_DEF["1F"][51] = ARR_TMPLID_DEF["1F"][4],
ARR_TMPLID_DEF["1F"][52] = ARR_TMPLID_DEF["1F"][4],
ARR_TMPLID_DEF["1F"][53] = ARR_TMPLID_DEF["1F"][4],
ARR_TMPLID_DEF["1F"][54] = ARR_TMPLID_DEF["1F"][4],
ARR_TMPLID_DEF["1F"][55] = ARR_TMPLID_DEF["1F"][4],
ARR_TMPLID_DEF["1F"][56] = ARR_TMPLID_DEF["1F"][2],
ARR_TMPLID_DEF["1F"][99] = ARR_TMPLID_DEF["1F"][4],
ARR_TMPLID_DEF["1F"][27] = "Cricket_tmpl",
ARR_TMPLID_DEF["1F"][161] = "Bingo_tmpl",
ARR_TMPLID_DEF["1H"] = new Array,
ARR_TMPLID_DEF["1H"][1] = "UnderOver_tmpl_1H",
ARR_TMPLID_DEF["1H"][2] = "NBA_tmpl",
ARR_TMPLID_DEF["1H"][3] = ARR_TMPLID_DEF["1H"][2],
ARR_TMPLID_DEF["1H"][26] = ARR_TMPLID_DEF["1H"][2],
ARR_TMPLID_DEF["1H"][32] = ARR_TMPLID_DEF["1H"][2],
ARR_TMPLID_DEF["1H"][4] = "Tennis_tmpl",
ARR_TMPLID_DEF["1H"][5] = ARR_TMPLID_DEF["1H"][4],
ARR_TMPLID_DEF["1H"][6] = ARR_TMPLID_DEF["1H"][4],
ARR_TMPLID_DEF["1H"][7] = ARR_TMPLID_DEF["1H"][4],
ARR_TMPLID_DEF["1H"][8] = "Baseball_tmpl",
ARR_TMPLID_DEF["1H"][9] = ARR_TMPLID_DEF["1H"][4],
ARR_TMPLID_DEF["1H"][10] = ARR_TMPLID_DEF["1H"][4],
ARR_TMPLID_DEF["1H"][11] = ARR_TMPLID_DEF["1H"][4],
ARR_TMPLID_DEF["1H"][12] = ARR_TMPLID_DEF["1H"][4],
ARR_TMPLID_DEF["1H"][13] = ARR_TMPLID_DEF["1H"][4],
ARR_TMPLID_DEF["1H"][14] = ARR_TMPLID_DEF["1H"][4],
ARR_TMPLID_DEF["1H"][15] = ARR_TMPLID_DEF["1H"][4],
ARR_TMPLID_DEF["1H"][16] = ARR_TMPLID_DEF["1H"][4],
ARR_TMPLID_DEF["1H"][17] = ARR_TMPLID_DEF["1H"][4],
ARR_TMPLID_DEF["1H"][18] = ARR_TMPLID_DEF["1H"][4],
ARR_TMPLID_DEF["1H"][19] = ARR_TMPLID_DEF["1H"][4],
ARR_TMPLID_DEF["1H"][20] = ARR_TMPLID_DEF["1H"][4],
ARR_TMPLID_DEF["1H"][21] = ARR_TMPLID_DEF["1H"][4],
ARR_TMPLID_DEF["1H"][22] = ARR_TMPLID_DEF["1H"][4],
ARR_TMPLID_DEF["1H"][23] = ARR_TMPLID_DEF["1H"][4],
ARR_TMPLID_DEF["1H"][24] = ARR_TMPLID_DEF["1H"][4],
ARR_TMPLID_DEF["1H"][25] = ARR_TMPLID_DEF["1H"][4],
ARR_TMPLID_DEF["1H"][28] = ARR_TMPLID_DEF["1H"][4],
ARR_TMPLID_DEF["1H"][29] = ARR_TMPLID_DEF["1H"][4],
ARR_TMPLID_DEF["1H"][30] = ARR_TMPLID_DEF["1H"][4],
ARR_TMPLID_DEF["1H"][31] = ARR_TMPLID_DEF["1H"][4],
ARR_TMPLID_DEF["1H"][33] = ARR_TMPLID_DEF["1H"][4],
ARR_TMPLID_DEF["1H"][34] = ARR_TMPLID_DEF["1H"][4],
ARR_TMPLID_DEF["1H"][35] = ARR_TMPLID_DEF["1H"][4],
ARR_TMPLID_DEF["1H"][36] = ARR_TMPLID_DEF["1H"][4],
ARR_TMPLID_DEF["1H"][37] = ARR_TMPLID_DEF["1H"][4],
ARR_TMPLID_DEF["1H"][38] = ARR_TMPLID_DEF["1H"][4],
ARR_TMPLID_DEF["1H"][39] = ARR_TMPLID_DEF["1H"][4],
ARR_TMPLID_DEF["1H"][40] = ARR_TMPLID_DEF["1H"][4],
ARR_TMPLID_DEF["1H"][41] = ARR_TMPLID_DEF["1H"][4],
ARR_TMPLID_DEF["1H"][42] = ARR_TMPLID_DEF["1H"][4],
ARR_TMPLID_DEF["1H"][43] = "ESports_tmpl",
ARR_TMPLID_DEF["1H"][44] = ARR_TMPLID_DEF["1H"][4],
ARR_TMPLID_DEF["1H"][47] = ARR_TMPLID_DEF["1H"][4],
ARR_TMPLID_DEF["1H"][48] = ARR_TMPLID_DEF["1H"][4],
ARR_TMPLID_DEF["1H"][49] = ARR_TMPLID_DEF["1H"][4],
ARR_TMPLID_DEF["1H"][50] = ARR_TMPLID_DEF["1H"][4],
ARR_TMPLID_DEF["1H"][51] = ARR_TMPLID_DEF["1H"][4],
ARR_TMPLID_DEF["1H"][52] = ARR_TMPLID_DEF["1H"][4],
ARR_TMPLID_DEF["1H"][53] = ARR_TMPLID_DEF["1H"][4],
ARR_TMPLID_DEF["1H"][54] = ARR_TMPLID_DEF["1H"][4],
ARR_TMPLID_DEF["1H"][55] = ARR_TMPLID_DEF["1H"][4],
ARR_TMPLID_DEF["1H"][56] = ARR_TMPLID_DEF["1H"][2],
ARR_TMPLID_DEF["1H"][99] = ARR_TMPLID_DEF["1H"][4],
ARR_TMPLID_DEF["1H"][27] = "Cricket_tmpl",
ARR_TMPLID_DEF["1H"][161] = "Bingo_tmpl";
var ARR_TMPLURL_DEF = new Array;
ARR_TMPLURL_DEF[1] = new Array,
ARR_TMPLURL_DEF[1][1] = "UnderOver_tmpl.php?form=1",
ARR_TMPLURL_DEF[1][2] = "NBA_tmpl.php",
ARR_TMPLURL_DEF[1][3] = ARR_TMPLURL_DEF[1][2],
ARR_TMPLURL_DEF[1][26] = ARR_TMPLURL_DEF[1][2],
ARR_TMPLURL_DEF[1][32] = ARR_TMPLURL_DEF[1][2],
ARR_TMPLURL_DEF[1][4] = "Tennis_tmpl.php",
ARR_TMPLURL_DEF[1][5] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][6] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][7] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][8] = "Baseball_tmpl.php",
ARR_TMPLURL_DEF[1][9] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][10] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][11] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][12] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][13] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][14] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][15] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][16] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][17] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][18] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][19] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][20] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][21] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][22] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][23] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][24] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][25] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][28] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][29] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][30] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][31] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][33] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][34] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][35] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][36] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][37] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][38] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][39] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][40] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][41] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][42] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][43] = "ESports_tmpl.php",
ARR_TMPLURL_DEF[1][44] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][47] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][48] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][49] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][50] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][51] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][52] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][53] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][54] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][55] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][56] = ARR_TMPLURL_DEF[1][2],
ARR_TMPLURL_DEF[1][99] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][154] = ARR_TMPLURL_DEF[1][4],
ARR_TMPLURL_DEF[1][27] = "Cricket_tmpl.php",
ARR_TMPLURL_DEF[1][161] = "Bingo_tmpl.php",
ARR_TMPLURL_DEF[3] = new Array,
ARR_TMPLURL_DEF[3][1] = "UnderOver_tmpl.php?form=3",
ARR_TMPLURL_DEF[3][2] = "NBA_tmpl.php",
ARR_TMPLURL_DEF[3][3] = ARR_TMPLURL_DEF[3][2],
ARR_TMPLURL_DEF[3][26] = ARR_TMPLURL_DEF[3][2],
ARR_TMPLURL_DEF[3][32] = ARR_TMPLURL_DEF[3][2],
ARR_TMPLURL_DEF[3][4] = "Tennis_tmpl.php",
ARR_TMPLURL_DEF[3][5] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][6] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][7] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][8] = "Baseball_tmpl.php",
ARR_TMPLURL_DEF[3][9] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][10] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][11] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][12] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][13] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][14] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][15] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][16] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][17] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][18] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][19] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][20] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][21] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][22] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][23] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][24] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][25] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][28] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][29] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][30] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][31] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][33] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][34] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][35] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][36] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][37] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][38] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][39] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][40] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][41] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][42] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][43] = "ESports_tmpl.php",
ARR_TMPLURL_DEF[3][44] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][47] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][48] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][49] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][50] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][51] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][52] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][53] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][54] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][55] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][56] = ARR_TMPLURL_DEF[3][2],
ARR_TMPLURL_DEF[3][99] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][154] = ARR_TMPLURL_DEF[3][4],
ARR_TMPLURL_DEF[3][27] = "Cricket_tmpl.php",
ARR_TMPLURL_DEF[3][161] = "Bingo_tmpl.php",
ARR_TMPLURL_DEF["1F"] = new Array,
ARR_TMPLURL_DEF["1F"][1] = "UnderOver_tmpl.php?form=1F",
ARR_TMPLURL_DEF["1F"][2] = "NBA_tmpl.php",
ARR_TMPLURL_DEF["1F"][3] = ARR_TMPLURL_DEF["1F"][2],
ARR_TMPLURL_DEF["1F"][26] = ARR_TMPLURL_DEF["1F"][2],
ARR_TMPLURL_DEF["1F"][32] = ARR_TMPLURL_DEF["1F"][2],
ARR_TMPLURL_DEF["1F"][4] = "Tennis_tmpl.php",
ARR_TMPLURL_DEF["1F"][5] = ARR_TMPLURL_DEF["1F"][4],
ARR_TMPLURL_DEF["1F"][6] = ARR_TMPLURL_DEF["1F"][4],
ARR_TMPLURL_DEF["1F"][7] = ARR_TMPLURL_DEF["1F"][4],
ARR_TMPLURL_DEF["1F"][8] = "Baseball_tmpl.php",
ARR_TMPLURL_DEF["1F"][9] = ARR_TMPLURL_DEF["1F"][4],
ARR_TMPLURL_DEF["1F"][10] = ARR_TMPLURL_DEF["1F"][4],
ARR_TMPLURL_DEF["1F"][11] = ARR_TMPLURL_DEF["1F"][4],
ARR_TMPLURL_DEF["1F"][12] = ARR_TMPLURL_DEF["1F"][4],
ARR_TMPLURL_DEF["1F"][13] = ARR_TMPLURL_DEF["1F"][4],
ARR_TMPLURL_DEF["1F"][14] = ARR_TMPLURL_DEF["1F"][4],
ARR_TMPLURL_DEF["1F"][15] = ARR_TMPLURL_DEF["1F"][4],
ARR_TMPLURL_DEF["1F"][16] = ARR_TMPLURL_DEF["1F"][4],
ARR_TMPLURL_DEF["1F"][17] = ARR_TMPLURL_DEF["1F"][4],
ARR_TMPLURL_DEF["1F"][18] = ARR_TMPLURL_DEF["1F"][4],
ARR_TMPLURL_DEF["1F"][19] = ARR_TMPLURL_DEF["1F"][4],
ARR_TMPLURL_DEF["1F"][20] = ARR_TMPLURL_DEF["1F"][4],
ARR_TMPLURL_DEF["1F"][21] = ARR_TMPLURL_DEF["1F"][4],
ARR_TMPLURL_DEF["1F"][22] = ARR_TMPLURL_DEF["1F"][4],
ARR_TMPLURL_DEF["1F"][23] = ARR_TMPLURL_DEF["1F"][4],
ARR_TMPLURL_DEF["1F"][24] = ARR_TMPLURL_DEF["1F"][4],
ARR_TMPLURL_DEF["1F"][25] = ARR_TMPLURL_DEF["1F"][4],
ARR_TMPLURL_DEF["1F"][28] = ARR_TMPLURL_DEF["1F"][4],
ARR_TMPLURL_DEF["1F"][29] = ARR_TMPLURL_DEF["1F"][4],
ARR_TMPLURL_DEF["1F"][30] = ARR_TMPLURL_DEF["1F"][4],
ARR_TMPLURL_DEF["1F"][31] = ARR_TMPLURL_DEF["1F"][4],
ARR_TMPLURL_DEF["1F"][33] = ARR_TMPLURL_DEF["1F"][4],
ARR_TMPLURL_DEF["1F"][34] = ARR_TMPLURL_DEF["1F"][4],
ARR_TMPLURL_DEF["1F"][35] = ARR_TMPLURL_DEF["1F"][4],
ARR_TMPLURL_DEF["1F"][36] = ARR_TMPLURL_DEF["1F"][4],
ARR_TMPLURL_DEF["1F"][37] = ARR_TMPLURL_DEF["1F"][4],
ARR_TMPLURL_DEF["1F"][38] = ARR_TMPLURL_DEF["1F"][4],
ARR_TMPLURL_DEF["1F"][39] = ARR_TMPLURL_DEF["1F"][4],
ARR_TMPLURL_DEF["1F"][40] = ARR_TMPLURL_DEF["1F"][4],
ARR_TMPLURL_DEF["1F"][41] = ARR_TMPLURL_DEF["1F"][4],
ARR_TMPLURL_DEF["1F"][42] = ARR_TMPLURL_DEF["1F"][4],
ARR_TMPLURL_DEF["1F"][43] = "ESports_tmpl.php",
ARR_TMPLURL_DEF["1F"][44] = ARR_TMPLURL_DEF["1F"][4],
ARR_TMPLURL_DEF["1F"][47] = ARR_TMPLURL_DEF["1F"][4],
ARR_TMPLURL_DEF["1F"][48] = ARR_TMPLURL_DEF["1F"][4],
ARR_TMPLURL_DEF["1F"][49] = ARR_TMPLURL_DEF["1F"][4],
ARR_TMPLURL_DEF["1F"][50] = ARR_TMPLURL_DEF["1F"][4],
ARR_TMPLURL_DEF["1F"][51] = ARR_TMPLURL_DEF["1F"][4],
ARR_TMPLURL_DEF["1F"][52] = ARR_TMPLURL_DEF["1F"][4],
ARR_TMPLURL_DEF["1F"][53] = ARR_TMPLURL_DEF["1F"][4],
ARR_TMPLURL_DEF["1F"][54] = ARR_TMPLURL_DEF["1F"][4],
ARR_TMPLURL_DEF["1F"][55] = ARR_TMPLURL_DEF["1F"][4],
ARR_TMPLURL_DEF["1F"][56] = ARR_TMPLURL_DEF["1F"][2],
ARR_TMPLURL_DEF["1F"][99] = ARR_TMPLURL_DEF["1F"][4],
ARR_TMPLURL_DEF["1F"][27] = "Cricket_tmpl.php",
ARR_TMPLURL_DEF["1F"][161] = "Bingo_tmpl.php",
ARR_TMPLURL_DEF["1H"] = new Array,
ARR_TMPLURL_DEF["1H"][1] = "UnderOver_tmpl.php?form=1H",
ARR_TMPLURL_DEF["1H"][2] = "NBA_tmpl.php",
ARR_TMPLURL_DEF["1H"][3] = ARR_TMPLURL_DEF["1H"][2],
ARR_TMPLURL_DEF["1H"][26] = ARR_TMPLURL_DEF["1H"][2],
ARR_TMPLURL_DEF["1H"][32] = ARR_TMPLURL_DEF["1H"][2],
ARR_TMPLURL_DEF["1H"][4] = "Tennis_tmpl.php",
ARR_TMPLURL_DEF["1H"][5] = ARR_TMPLURL_DEF["1H"][4],
ARR_TMPLURL_DEF["1H"][6] = ARR_TMPLURL_DEF["1H"][4],
ARR_TMPLURL_DEF["1H"][7] = ARR_TMPLURL_DEF["1H"][4],
ARR_TMPLURL_DEF["1H"][8] = "Baseball_tmpl.php",
ARR_TMPLURL_DEF["1H"][9] = ARR_TMPLURL_DEF["1H"][4],
ARR_TMPLURL_DEF["1H"][10] = ARR_TMPLURL_DEF["1H"][4],
ARR_TMPLURL_DEF["1H"][11] = ARR_TMPLURL_DEF["1H"][4],
ARR_TMPLURL_DEF["1H"][12] = ARR_TMPLURL_DEF["1H"][4],
ARR_TMPLURL_DEF["1H"][13] = ARR_TMPLURL_DEF["1H"][4],
ARR_TMPLURL_DEF["1H"][14] = ARR_TMPLURL_DEF["1H"][4],
ARR_TMPLURL_DEF["1H"][15] = ARR_TMPLURL_DEF["1H"][4],
ARR_TMPLURL_DEF["1H"][16] = ARR_TMPLURL_DEF["1H"][4],
ARR_TMPLURL_DEF["1H"][17] = ARR_TMPLURL_DEF["1H"][4],
ARR_TMPLURL_DEF["1H"][18] = ARR_TMPLURL_DEF["1H"][4],
ARR_TMPLURL_DEF["1H"][19] = ARR_TMPLURL_DEF["1H"][4],
ARR_TMPLURL_DEF["1H"][20] = ARR_TMPLURL_DEF["1H"][4],
ARR_TMPLURL_DEF["1H"][21] = ARR_TMPLURL_DEF["1H"][4],
ARR_TMPLURL_DEF["1H"][22] = ARR_TMPLURL_DEF["1H"][4],
ARR_TMPLURL_DEF["1H"][23] = ARR_TMPLURL_DEF["1H"][4],
ARR_TMPLURL_DEF["1H"][24] = ARR_TMPLURL_DEF["1H"][4],
ARR_TMPLURL_DEF["1H"][25] = ARR_TMPLURL_DEF["1H"][4],
ARR_TMPLURL_DEF["1H"][28] = ARR_TMPLURL_DEF["1H"][4],
ARR_TMPLURL_DEF["1H"][29] = ARR_TMPLURL_DEF["1H"][4],
ARR_TMPLURL_DEF["1H"][30] = ARR_TMPLURL_DEF["1H"][4],
ARR_TMPLURL_DEF["1H"][31] = ARR_TMPLURL_DEF["1H"][4],
ARR_TMPLURL_DEF["1H"][33] = ARR_TMPLURL_DEF["1H"][4],
ARR_TMPLURL_DEF["1H"][34] = ARR_TMPLURL_DEF["1H"][4],
ARR_TMPLURL_DEF["1H"][35] = ARR_TMPLURL_DEF["1H"][4],
ARR_TMPLURL_DEF["1H"][36] = ARR_TMPLURL_DEF["1H"][4],
ARR_TMPLURL_DEF["1H"][37] = ARR_TMPLURL_DEF["1H"][4],
ARR_TMPLURL_DEF["1H"][38] = ARR_TMPLURL_DEF["1H"][4],
ARR_TMPLURL_DEF["1H"][39] = ARR_TMPLURL_DEF["1H"][4],
ARR_TMPLURL_DEF["1H"][40] = ARR_TMPLURL_DEF["1H"][4],
ARR_TMPLURL_DEF["1H"][41] = ARR_TMPLURL_DEF["1H"][4],
ARR_TMPLURL_DEF["1H"][42] = ARR_TMPLURL_DEF["1H"][4],
ARR_TMPLURL_DEF["1H"][43] = "ESports_tmpl.php",
ARR_TMPLURL_DEF["1H"][44] = ARR_TMPLURL_DEF["1H"][4],
ARR_TMPLURL_DEF["1H"][47] = ARR_TMPLURL_DEF["1H"][4],
ARR_TMPLURL_DEF["1H"][48] = ARR_TMPLURL_DEF["1H"][4],
ARR_TMPLURL_DEF["1H"][49] = ARR_TMPLURL_DEF["1H"][4],
ARR_TMPLURL_DEF["1H"][50] = ARR_TMPLURL_DEF["1H"][4],
ARR_TMPLURL_DEF["1H"][51] = ARR_TMPLURL_DEF["1H"][4],
ARR_TMPLURL_DEF["1H"][52] = ARR_TMPLURL_DEF["1H"][4],
ARR_TMPLURL_DEF["1H"][53] = ARR_TMPLURL_DEF["1H"][4],
ARR_TMPLURL_DEF["1H"][54] = ARR_TMPLURL_DEF["1H"][4],
ARR_TMPLURL_DEF["1H"][55] = ARR_TMPLURL_DEF["1H"][4],
ARR_TMPLURL_DEF["1H"][56] = ARR_TMPLURL_DEF["1H"][2],
ARR_TMPLURL_DEF["1H"][99] = ARR_TMPLURL_DEF["1H"][4],
ARR_TMPLURL_DEF["1H"][27] = "Cricket_tmpl.php",
ARR_TMPLURL_DEF["1H"][161] = "Bingo_tmpl.php";
var REFRESH_GAP = !0
  , CLS_ODD = "UdrDogOddsClass"
  , CLS_EVEN = "FavOddsClass"
  , DEPOSIT_LEAGUE_WIDTH = 600
  , MEMBER_LEAGUE_WIDTH = 640
  , fFrame = getParent(window)
  , skeycode = "oen25128953"
  , vendorSetting = {
    IsVendor: !1,
    IsM88: !1,
    IsALog: !1,
    IsTLC: !1,
    IsSpondemo: !1,
    IsDela: !1,
    IsSuncity: !1,
    IsMayfair: !1,
    IsZzun88: !1
};
"2" == fFrame.SiteMode && ("3" == fFrame.Deposit_SiteMode ? vendorSetting.IsM88 = !0 : "4" == fFrame.Deposit_SiteMode ? vendorSetting.IsALog = !0 : "5" == fFrame.Deposit_SiteMode ? vendorSetting.IsDela = !0 : "6" == fFrame.Deposit_SiteMode ? vendorSetting.IsTLC = !0 : "7" == fFrame.Deposit_SiteMode ? vendorSetting.IsSpondemo = !0 : "8" == fFrame.Deposit_SiteMode ? vendorSetting.IsSuncity = !0 : "9" == fFrame.Deposit_SiteMode ? vendorSetting.IsMayfair = !0 : "10" == fFrame.Deposit_SiteMode && (vendorSetting.IsZzun88 = !0),
vendorSetting.IsVendor = vendorSetting.IsM88 || vendorSetting.IsALog || vendorSetting.IsTLC || vendorSetting.IsSpondemo || vendorSetting.IsDela || vendorSetting.IsSuncity || vendorSetting.IsMayfair || vendorSetting.IsZzun88);
var siteObj = new Object;
Set4HourColor(),
SetSelectDateColor(),
SetSpanTag(),
SetCss(),
siteObj._IsPhonebet = 1 == fFrame.SiteMode;
var bShowLoading = !0, iRefreshCount = REFRESH_COUNTDOWN, RefresHandle, TennisMore_ThreadId = null, Tennis_More_End = !1, SoccerMore_ThreadId = null, Soccer_More_End = !1, BasketballMore_ThreadId = null, Basketball_More_End = !1, refreshCnt = 0, refreshThread = null, LOAD_TMPL_GAP = !0, LiveInfoWindowHandle = null, haveParlay = !1, haveSelectDate = !1, MiddleLiveInfoFixScrollHandler = function() {
    "none" != $("#MiddleLiveInfo").css("display") && ($(this).scrollTop() > 60 ? $("#MainFly").addClass("fixed") : ($("#MainFly").removeClass("fixed"),
    $(".MainFly").css("left", "")))
}, MiddleLiveInfoFixScrollHandlerForGameVisualization = function() {
    "none" != $("#MiddleLiveInfo").css("display") && ($(this).scrollTop() > 60 ? $("#MainFly").addClass("fixed") : ($("#MainFly").removeClass("fixed"),
    $(".MainFly").css("left", "")))
}, SmallLiveInfoFixScrollHandler = function() {
    "none" != $("#SmallLiveInfo").css("display") && ($(".smallLiveInfo.fixed").css("left", 800 - $(document).scrollLeft()),
    $(this).scrollTop() > 60 ? $("#SmallLiveInfo").addClass("fixed") : ($("#SmallLiveInfo").removeClass("fixed"),
    $(".smallLiveInfo").css("left", "")))
}, scrollLiveInfoAlertHandler = function() {
    var e = document.documentElement.clientWidth + $(window).scrollLeft();
    scrollLeftPosition != $(window).scrollLeft() && e >= 812 && (scrollLeftPosition = $(window).scrollLeft(),
    tipScorllCount++,
    tipScorllCount >= 5 && ($("#TipLiveInfo").remove(),
    $(window).off("scroll", scrollLiveInfoAlertHandler),
    $(window).off("resize", LiveInfoReSizeHandler),
    tipScorllCount = 0))
}, AdjustSizeForSmallInfo = !0, AdjustLiveInfoReSize = function(e) {
    function _() {
        var e = (t = document.documentElement.clientWidth) + $(window).scrollLeft();
        $(".tip").length > 0 && ($(".tip").css("right", ""),
        e <= a ? ($(".tip").animate({
            right: "+=5px"
        }, 500),
        $(".tip").animate({
            right: "-=5px"
        }, 500, _)) : setTimeout(_, 500))
    }
    if ("none" != $("#SmallLiveInfo").css("display")) {
        var t = document.documentElement.clientWidth
          , a = 800
          , r = window.outerHeight || document.documentElement.clientHeight || document.body.clientHeight
          , d = t + $(window).scrollLeft();
        d < 950 && 0 == $("#TipLiveInfo").length && (AdjustSizeForSmallInfo && (AdjustSizeForSmallInfo = !1,
        "IE" == userBrowser() ? window.parent.resizeTo(1364, r) : window.parent.resizeBy(1364, r)),
        (d = (t = document.documentElement.clientWidth) + $(window).scrollLeft()) < 950 && ($("body").prepend("<div id='TipLiveInfo' class='tip liveInfo'></div>"),
        _())),
        $("#TipLiveInfo").length > 0 && (d <= a ? $(".tip").css("left", "") : d > a && d <= 950 ? ($(".tip").css("left", 740 - $(document).scrollLeft()),
        $(".tip").css("right", "")) : d > 950 && $("#TipLiveInfo").remove())
    }
}, more_mode, PopLauncher, sHTML, LeaguePage, sChkLeagueFunction, sSportL = "", SelLeagueThreadId = "", btnStartHandle_L, btnStartHandle_D, REFRESH_GAP_L = !0, bShowLoading_L = !0, iRefreshCount_L = REFRESH_COUNTDOWN, RefresHandle_L, Tennis_More = !1, Soccer_More = !1, Basketball_More = !1, REFRESH_GAP_D = !0, bShowLoading_D = !0, iRefreshCount_D = REFRESH_COUNTDOWN, RefresHandle_D, sw1 = !0, sw2 = !0, CountDownList = new Array, HappyCountDownList = new Array, sKeeper = null, ARR_FIELDS_ORG = null, ARR_FIELDS_ORG1 = null, SwpDEF_FLAG = !1, InsDEF_FLAG = !1, IsFromFavLeague = !1, LeagueFavObj = new Object;
void 0 !== window.external && (document.getElementsByName = function(e, _) {
    _ || (_ = "*");
    for (var t = document.getElementsByTagName(_), a = [], r = 0; r < t.length; r++)
        att = t[r].getAttribute("name"),
        att == e && a.push(t[r]);
    return a
}
);
var OddsConverter = {
    Convert: function(e, _, t, a, r, d, s, o, n) {
        r = a ? 1 : r,
        s = a && 0 == s ? 2 : s;
        var D = 0
          , l = o[n].Price
          , p = o[n].Seq;
        if (0 != l) {
            if (0 == e) {
                if (_ > 0 && (1 == _ && (d = 0),
                l = this.GetSpreadOdds(l, d, a ? s : 0)),
                2 == _ && !a) {
                    var O = 0;
                    o.map(function(e) {
                        e.get("SelId") != n && (O = this.GetSpreadOdds(e.get("Price"), d, 0))
                    }
                    .bind(this)),
                    0 != p && (t *= -1),
                    l = this.FormatHDPOdds(l, O, 0 == p, t)
                }
                return 3 != _ || a || (l = this.FormatOUOdds(l, 0 == p)),
                a || (l = this.Floor(l, 2)),
                D = this.MYtoOther(r, l),
                this.FloorToString(D, 5 == r ? 0 : 2)
            }
            return 5 == _ && (d = d > .01 ? .01 : 0,
            l = this.GetSpreadOdds(l, d, 0)),
            D = this.Floor(l, 2),
            this.FloorToString(D, 2)
        }
        return ""
    },
    HKOdds: function(e) {
        return e < 0 && (e = this.FloatDiv(-1, e),
        e = this.FloatDiv(this.Floor(this.FloatMul(e, 100), 0), 100)),
        e
    },
    IndoOdds: function(e) {
        return e > 0 ? (-(e = e > .79 ? Math.floor(1 / e * 100) / 100 : Math.ceil(1 / e * 100) / 100)).toFixed(2) : e < -.79 ? (e = Math.round(Math.floor(100 * Math.abs(1 / e))) / 100).toFixed(2) : (e = Math.round((Math.ceil(100 * Math.abs(1 / e)) + .01) / 100 * 100) / 100).toFixed(2)
    },
    AmericanOdds: function(e) {
        return this.Floor(this.FloatMul(this.IndoOdds(e), 100), 0)
    },
    DecimalOdds: function(e) {
        return this.FloatAdd(this.HKOdds(e), 1)
    },
    FloorToString: function(e, _) {
        var t = this.Floor(e, _);
        return 0 == t ? "" : t.toFixed(_)
    },
    Floor: function(e, _) {
        if (null == e)
            return !1;
        var t = "^([-+]?[0-9]*.[0-9]{" + _ + "})[0-9]*$";
        return parseFloat(e.toString().replace(new RegExp(t), function(e, _) {
            return _
        }))
    },
    RoundOff: function(e, _) {
        var t = 1;
        null != _ && (t = Math.pow(10, _));
        var a = Math.abs(e)
          , r = 1;
        return e < 0 && (r = -1),
        this.FloatMul(this.FloatDiv(Math.round(this.FloatMul(a, t)), t), r)
    },
    FormatOUOdds: function(e, _) {
        var t = e;
        return (_ && e < 0 || !_ && e > 0) && (t = this.Floor(e, 2)),
        (_ && e > 0 || !_ && e < 0) && (t = this.RoundOff(e, 2)),
        t
    },
    FormatHDPOdds: function(e, _, t, a) {
        return a > 0 && e < 0 || a < 0 && e > 0 || 0 == a && e > 0 && _ > 0 && (e > _ || e == _ && !t) ? this.Floor(e, 2) : this.RoundOff(e, 2)
    },
    GetSpreadOdds: function(e, _, t) {
        var a = e;
        return 0 == e ? 0 : (a = this.FloatSubtraction(a, this.FloatAdd(_, this.FloatMul(.005, t))),
        e > 0 && a < .01 && (a = .01),
        a < -1 && (a = this.FloatAdd(a, 2)) < .01 && (a = 0),
        a)
    },
    MYtoOther: function(e, _) {
        var t = _;
        switch (e) {
        case 1:
            t = this.DecimalOdds(t);
            break;
        case 2:
            t = this.HKOdds(t);
            break;
        case 3:
            t = this.IndoOdds(t);
            break;
        case 5:
            t = this.AmericanOdds(t)
        }
        return t
    },
    FloatAdd: function(e, _) {
        var t, a, r;
        try {
            t = e.toString().split(".")[1].length
        } catch (e) {
            t = 0
        }
        try {
            a = _.toString().split(".")[1].length
        } catch (e) {
            a = 0
        }
        return r = Math.pow(10, Math.max(t, a)),
        (this.FloatMul(e, r) + this.FloatMul(_, r)) / r
    },
    FloatSubtraction: function(e, _) {
        var t, a, r, d;
        try {
            t = e.toString().split(".")[1].length
        } catch (e) {
            t = 0
        }
        try {
            a = _.toString().split(".")[1].length
        } catch (e) {
            a = 0
        }
        return r = Math.pow(10, Math.max(t, a)),
        d = t >= a ? t : a,
        ((e * r - _ * r) / r).toFixed(d)
    },
    FloatMul: function(e, _) {
        var t = 0
          , a = e.toString()
          , r = _.toString();
        try {
            t += a.split(".")[1].length
        } catch (e) {}
        try {
            t += r.split(".")[1].length
        } catch (e) {}
        return Number(a.replace(".", "")) * Number(r.replace(".", "")) / Math.pow(10, t)
    },
    FloatDiv: function(arg1, arg2) {
        var t1 = 0, t2 = 0, r1, r2;
        try {
            t1 = arg1.toString().split(".")[1].length
        } catch (e) {}
        try {
            t2 = arg2.toString().split(".")[1].length
        } catch (e) {}
        with (Math)
            return r1 = Number(arg1.toString().replace(".", "")),
            r2 = Number(arg2.toString().replace(".", "")),
            r1 / r2 * pow(10, t2 - t1)
    }
}, TMPL_TABLE_ID = "tmplTable", TMPL_COLGROUP_ID = "tmplColgroup", TMPL_HEADER_ID = "tmplHeader", TMPL_HEADER_LIVE_ID = "tmplHeader_L", TMPL_SUBTITLE_ID = "tmplSubTitle", TMPL_LEAGUE_ID = "tmplLeague", TMPL_LEAGUE_LIVE_ID = "tmplLeague_L", TMPL_LIVE_ID = "tmplLive", TMPL_LIVE_MASTER_ID = "tmplLiveMaster", TMPL_LIVE_FOOTER_ID = "tmplLiveFooter", TMPL_EVENT_ID = "tmplEvent", TMPL_EVENT_MASTER_ID = "tmplEventMaster", TMPL_EVENT_FOOTER_ID = "tmplEventFooter", CLS_UPD = "Odds_Upd", CLS_SAME = "Odds_Same", CLS_LS_OFF = "displayOff", CLS_LS_ON = "displayOn", CLS_LS_Hide = "displayHidden", LeagueListBySport = [], LeagueList = [], TotlaLeagueCnt = 0, TotlaMainLeagueCnt = 0, TotlaSelLeagueCnt = 0, arr_League = new Array("0"), arr_Match = new Array("0"), CurrentLiveInfoMatchID = "0", IsSaveLeague = !1, ARR_TWOWAY_MAP = {
    1: {
        Odds_1_H: ["FavorF", "Odds_1_A", !0],
        Odds_1_A: ["FavorF", "Odds_1_H", !1],
        Odds_3_O: ["Goal_3", "Odds_3_U", !0],
        Odds_3_U: ["Goal_3", "Odds_3_O", !1],
        Odds_7_H: ["FavorH1", "Odds_7_A", !0],
        Odds_7_A: ["FavorH1", "Odds_7_H", !1],
        Odds_8_O: ["Goal_8", "Odds_8_U", !0],
        Odds_8_U: ["Goal_8", "Odds_8_O", !1]
    }
}, OnlyMROdds = !1, NoShowMROdds = !1, SelMainMarket = 0, SelKickoffTime = "", oddsTypeFormula = function(e, _, t) {
    var a = parseFloat(e);
    if ("1" == _)
        "2" == t ? a -= 1 : "4" == t && (a = parseFloat(oddsTypeFormula(a - 1, "2", "4")));
    else if ("2" == _)
        "1" == t ? a += 1 : "4" == t && (a = a > 1 ? -Math.floor(1 / a * 100) / 100 : a);
    else if ("4" == _)
        if ("1" == t)
            a = a < 0 ? Math.floor(100 * (-1 / a + 1)) / 100 : a + 1;
        else if ("2" == t)
            a = a < 0 ? Math.floor(-1 / a * 100) / 100 : a;
        else if ("3" == t)
            return ConvertIndoOdds(a);
    return a.toFixed(2)
}, spreadCalculation = function(e, _, t, a, r) {
    if (0 == t)
        return "0.00";
    var d = t - fFrame.FSiteSpread;
    return t > 0 && d < .01 && (d = .01),
    d < -1 && (d += 2),
    t = d,
    "number" == typeof e ? ((e > 0 && t < 0 || e < 0 && t > 0) && (d = Floor(d)),
    (e > 0 && t > 0 || e < 0 && t < 0) && (d = MidpointRoundingAwayFromZero(d)),
    0 == e && (d = t > 0 && a > 0 ? t > a ? Floor(d) : t < a ? MidpointRoundingAwayFromZero(d) : "h" == _ ? MidpointRoundingAwayFromZero(d) : Floor(d) : MidpointRoundingAwayFromZero(d))) : (("h" == _ && t < 0 || "a" == _ && t > 0) && (d = Floor(d)),
    ("h" == _ && t > 0 || "a" == _ && t < 0) && (d = MidpointRoundingAwayFromZero(d))),
    oddsTypeFormula(d, "4", r || fFrame.OddsType)
}, Floor = function(e) {
    return e >= 0 ? Math.floor(100 * e + 1e-4) / 100 : -Math.floor(100 * Math.abs(e) + 1e-4) / 100
}, MidpointRoundingAwayFromZero = function(e) {
    return e >= 0 ? Math.round(100 * e + 1e-4) / 100 : -Math.round(100 * Math.abs(e) + 1e-4) / 100
}, GetConvertOdds = function(e, _, t) {
    if ("/UnderOver.php" == location.pathname) {
        for (var a = Object.keys(ARR_TWOWAY_MAP[1]), r = 0; r < a.length; r++)
            _[a[r]] = ConvertOdds(e, a[r], t);
        return _
    }
    return e
}, storeTwoWayOdds = function(e) {
    if ("/UnderOver.php" == location.pathname) {
        for (var _ = Object.keys(ARR_TWOWAY_MAP[1]), t = {}, a = 0; a < _.length; a++)
            t[_[a]] = e[_[a]],
            e[_[a]] = ConvertOdds(e, _[a]);
        return t
    }
    return null
}, restoreTwoWayOdds = function(e, _) {
    for (var t = Object.keys(_), a = 0; a < t.length; a++)
        e[t[a]] = _[t[a]]
}, fFrame = getParent(window), CLS_HDP_F = "FavTeamClass", CLS_HDP_N = "UdrDogTeamClass", TR_0 = "bgcpe", TR_1 = "bgcpelight", MMR_TR_0 = "mmbg", MMR_TR_1 = "mmbglight", tmpMMRTr_Cls_live = MMR_TR_1, tmpMMRTr_Cls = MMR_TR_1, SEPERATE_TIME = "1059", g_OddsKeeper_L = null, g_OddsKeeper_D = null, g_OddsKeeper = null, arrTicks, TrFlag = !1, CounterHandle_L, CounterHandle_D, InITIAL = !1, RNB_CSS = "GV";
"1H" == fFrame.DisplayMode && (fFrame.DisplayMode = "1F");
var aTimespan, sKeeper_Soccer = null, tmpOnlyMROdds = null, tmpNoShowMROdds = null, lcnt = 0, dcnt = 0, PreMatchId, btnStartHandle_L, btnStartHandle_D, g_SelDisstyle_InnerHTML, eles = null, PopLauncher, ADLauncher, NewsLauncher, HADLauncher, currentHour = 0, changeDay = !1, Hourlbl = new Array, HourClass = new Array;
Hourlbl[0] = "",
Hourlbl[1] = "",
Hourlbl[2] = "",
Hourlbl[3] = "",
Hourlbl[4] = "",
Hourlbl[5] = "",
Hourlbl[6] = "",
Hourlbl[7] = "",
Hourlbl[8] = "",
HourClass[0] = 0,
HourClass[1] = 3,
HourClass[2] = 7,
HourClass[3] = 11,
HourClass[4] = 15,
HourClass[5] = 19,
HourClass[6] = 23,
HourClass[7] = 4,
HourClass[8] = 8;
var isIe = !!window.ActiveXObject, g_HourOptioner, div_4hour_x;
document.getElementsByClassName || (document.getElementsByClassName = function(e, _) {
    for (var t = (_ || document).getElementsByTagName("*"), a = new Array, r = 0; r < t.length; r++)
        for (var d = t[r], s = d.className.split(" "), o = 0; o < s.length; o++)
            if (s[o] == e) {
                a.push(d);
                break
            }
    return a
}
);
var moreClick = !1
  , Sport_More = []
  , sKeeper_Sport = []
  , SportMore_ThreadId = []
  , Sport_More_End = []
  , retryCnt = []
  , TeamH = []
  , TeamA = []
  , bFromBtnClick = []
  , bOpenMore = []
  , oajaxData = []
  , bOpen1st = []
  , Category = []
  , CategoryList = []
  , MoreTmplList = []
  , MoreTmplCategory = []
  , MoreEventCount = []
  , MoreTmpSpecialLeague = []
  , MoreTmpSpecialOdds = []
  , MoreTmpSpecialEvent = []
  , htSession = ""
  , ftSession = ""
  , SelIdxFM = 0
  , SelIdx221 = 0
  , SelIdx222 = 0
  , SelIdx223 = 0
  , SelIdx224 = 0
  , SelIdx225 = 0
  , SelIdx226 = 0
  , SelIdx227 = 0
  , PreSelIdxFM = 0
  , PreSelIdx221 = 0
  , PreSelIdx222 = 0
  , PreSelIdx223 = 0
  , PreSelIdx224 = 0
  , PreSelIdx225 = 0
  , PreSelIdx226 = 0
  , PreSelIdx227 = 0
  , Arr221 = new Array("","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","")
  , Arr222 = new Array("","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","")
  , Arr223 = new Array("","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","")
  , Arr224 = new Array("","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","")
  , Arr225 = new Array("","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","")
  , Arr226 = new Array("","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","")
  , Arr227 = new Array("","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","","")
  , FullTimeAllArray416 = ["F0:0", "F0:1", "F0:2", "F0:3", "F0:4", "F1:0", "F1:1", "F1:2", "F1:3", "F1:4", "F2:0", "F2:1", "F2:2", "F2:3", "F2:4", "F3:0", "F3:1", "F3:2", "F3:3", "F3:4", "F4:0", "F4:1", "F4:2", "F4:3", "F4:4"]
  , HTArray416_00 = ["F0:0", "F0:1", "F0:2", "F0:3", "F0:4", "F1:0", "F1:1", "F1:2", "F1:3", "F1:4", "F2:0", "F2:1", "F2:2", "F2:3", "F2:4", "F3:0", "F3:1", "F3:2", "F3:3", "F3:4", "F4:0", "F4:1", "F4:2", "F4:3", "F4:4", "FAOS"]
  , HTArray416_01 = ["F0:1", "F0:2", "F0:3", "F0:4", "F1:1", "F1:2", "F1:3", "F1:4", "F2:1", "F2:2", "F2:3", "F2:4", "F3:1", "F3:2", "F3:3", "F3:4", "F4:1", "F4:2", "F4:3", "F4:4", "FAOS"]
  , HTArray416_02 = ["F0:2", "F0:3", "F0:4", "F1:2", "F1:3", "F1:4", "F2:2", "F2:3", "F2:4", "F3:2", "F3:3", "F3:4", "F4:2", "F4:3", "F4:4", "FAOS"]
  , HTArray416_03 = ["F0:3", "F0:4", "F1:3", "F1:4", "F2:3", "F2:4", "F3:3", "F3:4", "F4:3", "F4:4", "FAOS"]
  , HTArray416_10 = ["F1:0", "F1:1", "F1:2", "F1:3", "F1:4", "F2:0", "F2:1", "F2:2", "F2:3", "F2:4", "F3:0", "F3:1", "F3:2", "F3:3", "F3:4", "F4:0", "F4:1", "F4:2", "F4:3", "F4:4", "FAOS"]
  , HTArray416_11 = ["F1:1", "F1:2", "F1:3", "F1:4", "F2:1", "F2:2", "F2:3", "F2:4", "F3:1", "F3:2", "F3:3", "F3:4", "F4:1", "F4:2", "F4:3", "F4:4", "FAOS"]
  , HTArray416_12 = ["F1:2", "F1:3", "F1:4", "F2:2", "F2:3", "F2:4", "F3:2", "F3:3", "F3:4", "F4:2", "F4:3", "F4:4", "FAOS"]
  , HTArray416_13 = ["F1:3", "F1:4", "F2:3", "F2:4", "F3:3", "F3:4", "F4:3", "F4:4", "FAOS"]
  , HTArray416_20 = ["F2:0", "F2:1", "F2:2", "F2:3", "F2:4", "F3:0", "F3:1", "F3:2", "F3:3", "F3:4", "F4:0", "F4:1", "F4:2", "F4:3", "F4:4", "FAOS"]
  , HTArray416_21 = ["F2:1", "F2:2", "F2:3", "F2:4", "F3:1", "F3:2", "F3:3", "F3:4", "F4:1", "F4:2", "F4:3", "F4:4", "FAOS"]
  , HTArray416_22 = ["F2:2", "F2:3", "F2:4", "F3:2", "F3:3", "F3:4", "F4:2", "F4:3", "F4:4", "FAOS"]
  , HTArray416_23 = ["F2:3", "F2:4", "F3:3", "F3:4", "F4:3", "F4:4", "FAOS"]
  , HTArray416_30 = ["F3:0", "F3:1", "F3:2", "F3:3", "F3:4", "F4:0", "F4:1", "F4:2", "F4:3", "F4:4", "FAOS"]
  , HTArray416_31 = ["F3:1", "F3:2", "F3:3", "F3:4", "F4:1", "F4:2", "F4:3", "F4:4", "FAOS"]
  , HTArray416_32 = ["F3:2", "F3:3", "F3:4", "F4:2", "F4:3", "F4:4", "FAOS"]
  , HTArray416_33 = ["F3:3", "F3:4", "F4:3", "F4:4", "FAOS"]
  , BetType416OddArray = ["0000", "0001", "0002", "0003", "0004", "0010", "0011", "0012", "0013", "0014", "0020", "0021", "0022", "0023", "0024", "0030", "0031", "0032", "0033", "0034", "0040", "0041", "0042", "0043", "0044", "00AOS", "0101", "0102", "0103", "0104", "0111", "0112", "0113", "0114", "0121", "0122", "0123", "0124", "0131", "0132", "0133", "0134", "0141", "0142", "0143", "0144", "01AOS", "0202", "0203", "0204", "0212", "0213", "0214", "0222", "0223", "0224", "0232", "0233", "0234", "0242", "0243", "0244", "02AOS", "0303", "0304", "0313", "0314", "0323", "0324", "0333", "0334", "0343", "0344", "03AOS", "1010", "1011", "1012", "1013", "1014", "1020", "1021", "1022", "1023", "1024", "1030", "1031", "1032", "1033", "1034", "1040", "1041", "1042", "1043", "1044", "10AOS", "1111", "1112", "1113", "1114", "1121", "1122", "1123", "1124", "1131", "1132", "1133", "1134", "1141", "1142", "1143", "1144", "11AOS", "1212", "1213", "1214", "1222", "1223", "1224", "1232", "1233", "1234", "1242", "1243", "1244", "12AOS", "1313", "1314", "1323", "1324", "1333", "1334", "1343", "1344", "13AOS", "2020", "2021", "2022", "2023", "2024", "2030", "2031", "2032", "2033", "2034", "2040", "2041", "2042", "2043", "2044", "20AOS", "2121", "2122", "2123", "2124", "2131", "2132", "2133", "2134", "2141", "2142", "2143", "2144", "21AOS", "2222", "2223", "2224", "2232", "2233", "2234", "2242", "2243", "2244", "22AOS", "2323", "2324", "2333", "2334", "2343", "2344", "23AOS", "3030", "3031", "3032", "3033", "3034", "3040", "3041", "3042", "3043", "3044", "30AOS", "3131", "3132", "3133", "3134", "3141", "3142", "3143", "3144", "31AOS", "3232", "3233", "3234", "3242", "3243", "3244", "32AOS", "3333", "3334", "3343", "3344", "33AOS"]
  , haveHotEvent = !1
  , FmHelpList = new Array(7);
FmHelpList[0] = "hint221",
FmHelpList[1] = "hint222",
FmHelpList[2] = "hint223",
FmHelpList[3] = "hint224",
FmHelpList[4] = "hint225",
FmHelpList[5] = "hint226",
FmHelpList[6] = "hint227";
var fmHelpFlg = null
  , Dota2BetTypeGroup1 = new Array("9006","9007","9058","9002","9003","9005")
  , Dota2BetTypeGroup2 = new Array("9011","9011","9011","9008","9009","9078")
  , Dota2BetTypeGroup3 = new Array("9015","9016","9017","9012","9013","9079")
  , Dota2BetTypeGroup4 = new Array("9021","9022","9023","9018","9019","9080")
  , LoLBetTypeGroup1 = new Array("9006","9007","9058","9002","9003","9005")
  , LoLBetTypeGroup2 = new Array("9027","9027","9027","9024","9025","9081")
  , LoLBetTypeGroup3 = new Array("9031","9032","9033","9028","9029","9082")
  , LoLBetTypeGroup4 = new Array("9037","9038","9039","9034","9035","9083")
  , LoLBetTypeGroup5 = new Array("9043","9044","9045","9040","9041","9084")
  , KoGBetTypeGroup1 = new Array("9006","9007","9058","9002","9003","9005")
  , KoGBetTypeGroup2 = new Array("9011","9011","9011","9008","9009","9078")
  , KoGBetTypeGroup3 = new Array("9049","9050","9051","9046","9047","9085")
  , KoGBetTypeGroup4 = new Array("9055","9056","9057","9052","9053","9086")
  , CSgoBetTypeGroup1 = new Array("9068","9062","9068","9059","9060","9061")
  , CSgoBetTypeGroup2 = new Array("9063","9062","9064","9076","9074","9075")
  , CSgoBetTypeGroup3 = new Array("9068","9072","9073","9077","9070","9071")
  , CSCheckList = new Array("9072","9073","9077","9070","9071");
Init_MoreParams(1),
Init_MoreParams(2),
Init_MoreParams(43);
var fromFastMarketBtn = !1
  , preSportType = 0
  , ajaxData416 = null;
