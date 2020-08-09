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
    for (var t = e, n = 0; n < 4; n++) {
        if (null != t.SiteMode)
            return t;
        t = t.parent
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
    "undefined" != typeof refreshMoreData && (refreshMoreData(1),
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
        for (var t = 0; t < e.childNodes.length; t++) {
            var n = e.childNodes[t];
            null != n.tagName && "SPAN" == n.tagName.toUpperCase() && (n.disabled = !0)
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
            for (var t = 0; t < e.childNodes.length; t++) {
                var n = e.childNodes[t];
                null != n.tagName && "SPAN" == n.tagName.toUpperCase() && (n.disabled = !1)
            }
        $("#selOddsType_Div").length > 0 && setSelecterDisable("selOddsType", !1),
        $("#selLeagueType_Div").length > 0 && setSelecterDisable("selLeagueType", !1);
        for (var a = ["btnRefresh", "btnRefresh_L", "btnRefresh_D"], r = 0; r < a.length; r++)
            changeButtonStatus(a[r], !1);
        setSelecterDisable("aSorter", !1),
        REFRESH_GAP = !0
    }
}
function changeBGColor2(e, t) {
    var n = document.getElementById(e + "_1")
      , a = document.getElementById(e + "_2");
    null != n && (n.style.backgroundColor = t),
    null != a && (a.style.backgroundColor = t)
}
function changeBGColor3(e, t) {
    var n = document.getElementById(e + "_1")
      , a = document.getElementById(e + "_2")
      , r = document.getElementById(e + "_3");
    null != n && (n.style.backgroundColor = t),
    null != a && (a.style.backgroundColor = t),
    null != r && (r.style.backgroundColor = t)
}
function changeBGColorX(e, t, n) {
    for (var a = 1; a <= n; a++) {
        var r = document.getElementById(e + "_" + a);
        null != r && (r.style.backgroundColor = t)
    }
}
function MMRchangeBGColor3_over(e, t, n, a) {
    var r = document.getElementById(t + "_1")
      , o = document.getElementById(t + "_2")
      , l = document.getElementById(t + "_3");
    OnlyMROdds ? (null != l && (l.style.backgroundColor = n),
    null != o && (o.style.backgroundColor = n)) : e.id == t + "_3" ? null != l && (l.style.backgroundColor = n) : (null != r && (r.style.backgroundColor = n),
    null != o && (o.style.backgroundColor = n))
}
function MMRchangeBGColor3_out(e, t, n) {
    var a = document.getElementById(e + "_1")
      , r = document.getElementById(e + "_2")
      , o = document.getElementById(e + "_3");
    null != o && (o.style.backgroundColor = n),
    null != a && (a.style.backgroundColor = t),
    null != r && (OnlyMROdds ? r.style.backgroundColor = n : r.style.backgroundColor = t)
}
function initialTmpl(e, t, n) {
    return null == fFrame.hash_TmplLoaded[e] ? (fFrame.document.getElementById(e).contentWindow.location.href = t,
    fFrame.hash_TmplLoaded[e] = !0,
    window.setTimeout(n, 500),
    !1) : null != fFrame.document.getElementById(e).contentWindow.document.getElementById("tmplEnd") || (window.setTimeout(n, 500),
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
        for (var t in e)
            if (null == fFrame.hash_TmplLoaded[t]) {
                null != fFrame.document.getElementById(t) && (fFrame.document.getElementById(t).contentWindow.location.href = e[t],
                fFrame.hash_TmplLoaded[t] = !0)
            }
        LOAD_TMPL_GAP = !1
    }
}
function selectDate(e, t) {
    if ("" != t) {
        if (null != document.DataForm) {
            if (!REFRESH_GAP)
                return;
            a = document.DataForm
        } else {
            if (!REFRESH_GAP_D)
                return;
            a = document.DataForm_D
        }
        a.DT.value = t;
        var n = t.split("/");
        1 == n[0].length && (n[0] = "0" + n[0]),
        1 == n[1].length && (n[1] = "0" + n[1]),
        t = n[2] + n[0] + n[1]
    } else
        (a = null != document.DataForm ? document.DataForm : document.DataForm_D).DT.value = "";
    return SelKickoffTime != t && (SelKickoffTime = t,
    $("#divSelectDate").find("span").css("color", siteObj._SelectDateColor_Def),
    e && (e.style.color = "#9F0915"),
    null != g_OddsKeeper_D && "object" == typeof g_OddsKeeper_D ? (g_OddsKeeper_D.paintOddsTable(),
    OpenEsportFirstMore()) : "undefined" != typeof g_OddsKeeper && null != g_OddsKeeper && "object" == typeof g_OddsKeeper && g_OddsKeeper.paintOddsTable()),
    btnstop(),
    void btnstart();
    var a
}
function getShowMatchHtml(e, t, n) {
    return "<a href='javascript:showMatchOdds(\"" + e + '", "' + t + '", "' + n + "\");'><img border='0' src='" + fFrame.imgServerURL + "template/public/images/more_game.gif' /></a>"
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
    var t = "soccer";
    switch (e) {
    case 2:
        t = "basketball";
        break;
    case 5:
        t = "tennis";
        break;
    case 8:
        t = "baseball";
        break;
    case 9:
        t = "badminton";
        break;
    default:
        t = "soccer"
    }
    return t
}
function getSportRadarHtml(e, t, n) {
    if ("MixParlay" == $("body").attr("id"))
        return "";
    var a = checkSportRadarCss(n);
    if (0 == e || !fFrame.CanSeeLiveInfo)
        return "";
    return null != document.getElementById("LiveInfoMenu") ? "<span title='" + fFrame.RES_GV_MatchInfo + '\' style="display:inline-block;" onclick="openLiveInfoMiddle(event,' + e + ",1,'0','','')\" onmouseover='OpenLiveInfoMenu(" + e + ",this)' onmouseout='CloseLiveInfoMenu(" + e + ",this)'><span class=\"iconOdds " + a + '"></span><div id="lf' + e + '" style="display:none; position:absolute; float:right;"></div></span>' : void 0
}
function getRunningHtmlOtherBetType(e, t, n, a) {
    if ("MixParlay" == $("body").attr("id"))
        return "";
    var r = checkSportRadarCss(a);
    return 0 != e && fFrame.CanSeeLiveInfo ? "<span title='" + fFrame.RES_GV_MatchInfo + '\' style="display:inline-block;" onclick="openLiveLiveInfoForRunningBall(event,' + e + ",'" + t + "','" + n + "'," + a + ')" ><span class="iconOdds ' + r + '"></span><div id="lf' + e + '" style="display:none; position:absolute; float:right;"></div></span>' : ""
}
function getRunningHtml(e, t, n, a, r, o) {
    if ("MixParlay" == $("body").attr("id"))
        return "";
    var l = checkSportRadarCss(o);
    if (0 == e || !fFrame.CanSeeLiveInfo)
        return "";
    var s = document.getElementById("LiveInfoMenu");
    return 2 == o || 8 == o ? "<span title='" + fFrame.RES_GV_MatchInfo + '\' style="display:inline-block;" onclick="openLiveInfoMiddle(event,' + e + ",1,'" + n + "','" + a + "','" + r + "'," + o + ')" ><span class="iconOdds ' + l + '"></span><div id="lf' + e + '" style="display:none; position:absolute; float:right;"></div></span>' : null != s ? "<span title='" + fFrame.RES_GV_MatchInfo + '\' style="display:inline-block;" onclick="openLiveInfoMiddle(event,' + e + ",1,'" + n + "','" + a + "','" + r + '\')" ><span class="iconOdds ' + l + '"></span><div id="lf' + e + '" style="display:none; position:absolute; float:right;"></div></span>' : void 0
}
function openStatsInfo(e) {
    window.open("StatsFrame.php?MatchId=" + e, "StatsInfo" + e)
}
function openBetRadarVSStatsInfo(e, t, n, a) {
    switch (e.toString()) {
    case "191":
        vf_iframe.openVfecStats(t, n, a);
        break;
    case "193":
        vf_iframe.openVblStats(t, n);
        break;
    default:
        vf_iframe.openVfStats(t, n, a)
    }
}
function openLiveChart(e) {
    var t = window.screen.availHeight - 68;
    t > 768 && (t = 768),
    fFrame.openWindowsHandle("LiveChart" + e, !0, "", "LiveChart.php?MatchId=" + e, "height=" + t + ", width=1024, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, resizable=yes, location=no, status=no", !1, function(e, t) {})
}
function OpenLiveInfoMenu(e, t) {
    var n = $(t).find("#lf" + e);
    0 == n.length && (n = $(document.getElementById("lf" + e))),
    "" == n.html() && n.html(getLiveInfoMenuHtml(e)),
    n.css("display", "block")
}
function CloseLiveInfoMenu(e, t) {
    var n = $(t).find("#lf" + e);
    0 == n.length && (n = $(document.getElementById("lf" + e))),
    n.length > 0 && n.css("display", "none")
}
function getLiveInfoMenuHtml(e) {
    "none" != $("#btnSwitchBack").css("display") && null != document.getElementById("LiveInfoMenu") && $("#LFM_FullView").css("display", "block");
    var t = document.getElementById("LiveInfoMenu");
    if (null != t) {
        var n = t.innerHTML;
        return n = n.replace(/JSF/, "javascript:openLiveInfo(event," + e + ");"),
        n = n.replace(/JSL/, "javascript:openLiveInfoMiddle(event," + e + ", '1', '3', '', '');"),
        n = n.replace(/JSS/, "javascript:openLiveInfoSmall(event," + e + ");")
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
        var t = e || window.event;
        void 0 !== t && null != t && (void 0 !== t.cancelBubble ? t.cancelBubble = !0 : t.cancel = !0,
        t.stopPropagation && t.stopPropagation())
    }
}
function openLiveLiveInfoForRunningBall(e, t, n, a, r) {
    GetSourcePage();
    fFrame.IsShowLiveInfoSideView = !1,
    switchLiveInfoDisplay(),
    CloseSmallLiveInfo(),
    0 != $("#AllSingleOdds").length && ($("#oTableContainer_O").show(),
    arr_ShowMixParlay.O = !0),
    null != document.getElementById("LiveInfoMenu") && $("#LFM_FullView").css("display", "none"),
    fFrame.openWindowsHandle("Running Ball", !0, null, "RunningBallInfo.php?MatchId=" + t + "&Homename=" + n + "&Awayname=" + a + "&SportType=" + r, "scrollbars=yes,resizable=yes,top=0,left=0,width=800,Height=295", !1),
    stopClickEvent(e)
}
function openLiveInfo(e, t) {
    var n = GetSourcePage();
    fFrame.IsShowLiveInfoSideView = !1,
    closeMore(),
    switchLiveInfoDisplay(),
    CloseSmallLiveInfo(),
    0 != $("#AllSingleOdds").length && ($("#oTableContainer_O").show(),
    arr_ShowMixParlay.O = !0),
    null != document.getElementById("LiveInfoMenu") && $("#LFM_FullView").css("display", "none"),
    LiveInfoWindowHandle = window.open("LiveInfo.php?MatchId=" + t + "&SPage=" + n + "&Type=full", "LiveInfo" + t, "_blank"),
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
    var t = $("body").attr("id");
    return !!~["UnderOver", "AllSingleOdds", "Live", "NBA", "Baseball"].indexOf(t)
}
function ForceOpenSingle(e, t, n, a, r) {
    "E" == e && selectDate($("span.title").first()[0], "");
    var o = openLiveInfoMiddle(null, t, "0" == n ? "0" : "1", n, a, r);
    if (0 == $("#tmplTable").length)
        var l = setInterval(function() {
            $("#tmplTable").length > 0 && (openLiveInfoMiddle(null, t, "0" == n ? "0" : "1", n, a, r),
            clearInterval(l))
        }, 100);
    return o
}
function GotoSingleMatch(e, t, n, a, r, o) {
    if (arr_League.length > 1 || 1 == arr_League.length && "0" != arr_League[0]) {
        arr_League = new Array("0"),
        FinalpaintOddsTable();
        var l = new Object;
        l.market = fFrame.LastSelectedMArket.toLowerCase(),
        l.gamemode = fFrame.LastSelectedMenu,
        l.sport = fFrame.LastSelectedSport,
        l.pagename = "underover_data.php".toLowerCase(),
        l.selleague = arr_League.toString(),
        l.mode = "league",
        l.writedb = "0",
        ExecAjax("RecSelData.php", l, "POST", "RecSelLeague", "RecSelLeague")
    }
    var s = findOddsKeeper(t, "L" == n.toUpperCase());
    if (null != s && null != s.EventList && s.BetTypes.indexOf(1) > -1)
        for (var i in s.EventList)
            if (s.EventList[i].MatchId == a) {
                var d = "0";
                return s.EventList[i].GVType && (d = s.EventList[i].GVType),
                ForceOpenSingle(n, a, d, r, o)
            }
    this.appentArg = "&StreamingID=" + a + "&marketid=" + n + "&h=" + r + "&a=" + o,
    fFrame.LastSelectedMenu != e ? fFrame.leftx.SwitchMenuType(e, "", t, "L" == n.toUpperCase() ? "T" : n.toUpperCase()) : (fFrame.leftx.LoadMenuData("L" == n.toUpperCase() ? "T" : n.toUpperCase().toUpperCase()),
    fFrame.leftx.SwitchSport("", t, !1, !1, "OU"))
}
function openStreamingMiddle(e, t) {
    var n = findOddsKeeper(1, !0);
    if (null != n && null != n.EventList)
        for (var a in n.EventList)
            if (n.EventList[a].MatchId == t)
                return $("#MiddleLiveInfoFrame").height("417"),
                openLiveInfoMiddle(e, t, "2", "3", "", "");
    this.appentArg = "&StreamingID=" + t,
    fFrame.leftx.SwitchMarket("T"),
    fFrame.leftx.SwitchSport("", "1", !1, !1, "OU")
}
function OpenStreamingFrame(e) {
    var t = "StreamingLv.php?Matchid=" + e + "&TVmode=medium";
    $("#MiddleLiveInfoFrame").attr("src") != t ? ($("#MiddleLiveInfoFrame").attr("src", t),
    $("#MiddleLiveInfoFrame").ready(function() {
        $("#MiddleLiveInfo").slideDown("slow"),
        $(window).scroll(MiddleLiveInfoFixScrollHandler)
    })) : ($("#MiddleLiveInfo").slideDown("slow"),
    $(window).scroll(MiddleLiveInfoFixScrollHandler))
}
function openLiveInfoMiddle(e, t, n, a, r, o, l) {
    if (void 0 === l && (l = 1),
    checkIsFavorite(t)) {
        if (0 != canOpenSingView(t) || "2" == n) {
            if (fFrame.IsShowLiveInfoSideView = !1,
            arr_Match = new Array,
            arr_Match.push(t),
            CloseSmallLiveInfo(),
            "0" == n && $("#MiddleLiveInfo").hide(),
            "1" == n) {
                if (1 == l)
                    switch (a) {
                    case "1":
                    case "2":
                        getRunningBallURL(t, r, o, l);
                        break;
                    default:
                        getLiveInfoURL(t, "M")
                    }
                else
                    getRunningBallURL(t, r, o, l);
                CurrentLiveInfoMatchID = t
            }
            if ("2" == n && (OpenStreamingFrame(t),
            CurrentLiveInfoMatchID = t),
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
                if (1 == l) {
                    if (null != $(".none_rline.none_lline.none_tline").children("span:visible").children("a:visible"))
                        for (var s = $(".none_rline.none_lline.none_tline").children("span:visible").children("a:visible").length, i = 0; i < s; i++)
                            if (-1 != $(".none_rline.none_lline.none_tline").children("span:visible").children("a:visible")[i].getAttribute("onclick").indexOf("GetMore") && -1 == $(".none_rline.none_lline.none_tline").children("span:visible").children("a:visible")[i].className.indexOf(CLS_LS_Hide) && -1 == $(".none_rline.none_lline.none_tline").children("span:visible").children("a:visible")[i].className.indexOf(CLS_LS_OFF))
                                if (navigator.userAgent.indexOf("Safari") > -1) {
                                    var d = $(".none_rline.none_lline.none_tline").children("span:visible").children("a:visible")[i]
                                      , c = document.createEvent("MouseEvents");
                                    navigator.userAgent.indexOf("Edge") > -1 ? c.initEvent("click", !1, !1) : c.initMouseEvent("click", !0, !0, window),
                                    d.dispatchEvent(c)
                                } else
                                    $(".none_rline.none_lline.none_tline").children("span:visible").children("a:visible")[i].click()
                } else if (null != $(".line_unR").parent().children("td:visible") && "" != $("#MoreCount").text()) {
                    var u = $(".line_unR").next("td").next("td").next("td").next("td").next("td").next("td").next("td").next("td").children().find("a");
                    -1 != u[0].className.indexOf("en_Point") && u.click()
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
        for (var t = document.getElementsByName("fav_01" + e), n = 0; n < t.length; n++) {
            var a = t[n];
            if (null != a && "iconOdds favoriteAdd" != a.className)
                return !1
        }
    return !0
}
function openLiveInfoSmall(e, t) {
    "none" != $("#btnSwitchBack").css("display") && LiveInfoBackButton(),
    fFrame.IsShowLiveInfoSideView = !0,
    closeMore(),
    $(window).resize(AdjustLiveInfoReSize),
    $(window).scroll(AdjustLiveInfoReSize),
    $(window).scroll(SmallLiveInfoFixScrollHandler),
    -1 == indexOf(arr_Match, "0") && switchLiveInfoDisplay(),
    CurrentLiveInfoMatchID = t,
    FinalpaintOddsTable(),
    AdjustLiveInfoReSize(),
    getLiveInfoURL(t, "S"),
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
                for (var e = $(".none_rline.none_lline.none_tline").children("span:visible").children("a:visible").length, t = 0; t < e; t++)
                    if (-1 != $(".none_rline.none_lline.none_tline").children("span:visible").children("a:visible")[t].getAttribute("onclick").indexOf("GetMore") && -1 == $(".none_rline.none_lline.none_tline").children("span:visible").children("a:visible")[t].className.indexOf(CLS_LS_Hide) && -1 == $(".none_rline.none_lline.none_tline").children("span:visible").children("a:visible")[t].className.indexOf(CLS_LS_OFF))
                        if (navigator.userAgent.indexOf("Safari") > -1) {
                            var n = $(".none_rline.none_lline.none_tline").children("span:visible").children("a:visible")[t]
                              , a = document.createEvent("MouseEvents");
                            navigator.userAgent.indexOf("Edge") > -1 ? a.initEvent("click", !1, !1) : a.initMouseEvent("click", !0, !0, window),
                            n.dispatchEvent(a)
                        } else
                            $(".none_rline.none_lline.none_tline").children("span:visible").children("a:visible")[t].click();
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
function getRunningBallURL(e, t, n, a) {
    var r = "RunningBallInfo.php?MatchId=" + e + "&Homename=" + t + "&Awayname=" + n + "&SportType=" + a;
    $("#MiddleLiveInfoFrame").height("261"),
    $("#MiddleLiveInfoFrame").attr("src") != r ? ($("#MiddleLiveInfoFrame").attr("src", r),
    $("#MiddleLiveInfoFrame").ready(function() {
        $("#MiddleLiveInfo").slideDown("slow"),
        $(window).scroll(MiddleLiveInfoFixScrollHandlerForGameVisualization)
    })) : $("#MiddleLiveInfo").slideDown("slow")
}
function getLiveInfoURL(e, t, n) {
    var a = window.location.protocol + "//mTracker.872458.com/"
      , r = parent.UserLang
      , o = "full";
    switch (-1 == parent.SkinRootPath.indexOf("maxbet") && (a = window.location.protocol + "//mTracker.245887.com/"),
    t) {
    case "M":
        o = "single";
        break;
    case "S":
        o = "side";
        break;
    default:
        o = "full"
    }
    var l = GetSourcePage()
      , s = new Date
      , i = s.getFullYear().toString()
      , d = (s.getMonth() + 1).toString()
      , c = s.getDate().toString();
    a = a + "BetRadarLiveInfo.php?LiveInfoType=" + o + "&LangType=" + r + "&MatchId=" + e + "&D=" + (i + (d[1] ? d : "0" + d[0]) + (c[1] ? c : "0" + c[0])) + "&Frm=" + l + "&S=" + MD5(e + skeycode),
    "M" == t ? ($("#MiddleLiveInfoFrame").height("397"),
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
function CheckCursorStyle(e, t) {
    1 == e ? 0 != $("#selections").length ? $("." + t).css("cursor", "text") : $("." + t).css("cursor", "pointer") : $("." + t).css("cursor", "default")
}
function getRedCardHtml(e) {
    for (var t = "", n = 0; n < e; n++)
        t += "<img class='code' border='0' src='" + fFrame.imgServerURL + "template/public/images/RedCard.gif' />";
    return t
}
function getFavoritesHtml(e, t, n, a) {
    var r = n ? "iconOdds favoriteAdd" : "iconOdds favorite";
    return "<a href='javascript:addMatchFavorites(\"" + e + '","' + t + '",' + n + "," + a + ");' title='" + (n ? fFrame.RES_RemoveFavorite : fFrame.RES_AddFavorite) + "'><span name='fav_" + e + "' class='" + r + "'></span></a>"
}
function getFavLeaguesHtml(e, t, n, a) {
    var r = n ? "iconOdds favoriteAdd" : "iconOdds favorite";
    LeagueFavObj[t.toString()] = !!n;
    return '<span onmouseover = \'javascript:$(this).css("cursor","pointer");\' onmouseout = \'javascript:$(this).css("cursor","default");\' onclick=\'javascript:addLeagueFavorites(event,"' + e + '","' + t + '",' + n + "," + a + ",null);' title='" + (n ? fFrame.RES_RemoveFavorite : fFrame.RES_AddFavorite) + "'><span id='fav_" + t + "' class='" + r + "'></span></span>"
}
function getScoreMapHtml(e) {
    fFrame.SiteId;
    return "";
    return 1 == fFrame.SiteMode ? "" : "<a onclick='javascript:popScoreMap(\"" + e + "\");' style='cursor:pointer' title='" + fFrame.RES_ScoreMap + '\'><span class="iconOdds scoreMap"></span></a>'
}
function getScoreHtml(e, t) {
    return 1 == fFrame.SiteMode ? "" : "<div id='sco_" + e + "' style='display:inline'><a href='javascript:showScores(\"" + e + '","' + t + "\");'>Score</a></div>"
}
function betBingo(e, t, n, a, r, o) {
    if (fFrame.leftx.$("#Bingo_BPMinMaxBetAlert").css("display", "none"),
    fFrame.leftx.$("#Bingo_BPOddsChangeAlert").css("display", "none"),
    CheckIsIpad() && !CheckIScroll() && parent.window.scrollTo(0, 0),
    trim(r).length < 1)
        return !1;
    var l = document.getElementById("CanBetNumberMsg").value;
    o >= 8101 && o <= 8105 && (l = document.getElementById("CanBetHappy5Msg").value),
    fFrame.CanBetNumberGame ? fFrame.leftx.DoBingoBetProcess(n, a, r, o) : alert(l)
}
function betLucky3(e) {
    fFrame.leftx.$("#Lucky3_ErrorMsg").css("display", "none"),
    fFrame.CanSeeLucky3 && fFrame.leftx.DoLucky3BetProcess(e)
}
function bet(e, t, n, a, r, o) {
    fFrame.leftx.$("#BPMinMaxBetAlert").css("display", "none"),
    fFrame.leftx.$("#BPOddsChangeAlert").css("display", "none"),
    CheckIsIpad() && !CheckIScroll() && parent.window.scrollTo(0, 0),
    "" != n && "" != r && (parseInt(e, 10) ? "undefined" == typeof betParlay ? parent.leftx.AddParlay(t, n, a, r, fFrame.LastSelectedSport, o) : betParlay(t, n, a, r, o) : fFrame.leftx.DoBetProcess(n, a, r, null, null, o))
}
function ReflashSingleStreaming() {
    if (null != fFrame.leftx) {
        var e = fFrame.leftx.document.getElementById("iTV")
          , t = e.src;
        e.src = "",
        e.src = t
    }
}
function openLeague(e, t, n, a, r, o, l) {
    more_mode = "SL",
    LeaguePage = l,
    nowsKeeper = null,
    document.getElementById("oPopContainer").innerHTML = "";
    var s = !1
      , i = !1;
    if (initialTmpl("League_tmpl", "League_tmpl.php", "openLeague(" + e + ",'" + t + "','" + n + "','" + a + "','" + r + "','" + o + "','" + l + "');")) {
        "SportsMixParlay" == l && (s = !0),
        "Outright" == l && (i = !0),
        GetLeagueHTML(s, i);
        var d = document.getElementById("PopDiv");
        d.style.width = e + "px";
        var c = document.getElementById("PopTitleText")
          , u = document.getElementById("oPopContainer");
        if (c.innerHTML = t,
        u.innerHTML = sHTML.join(""),
        null == PopLauncher) {
            var p = document.getElementById("PopTitle")
              , m = document.getElementById("PopCloser");
            PopLauncher = new DivLauncher(d,p,m)
        }
        PopLauncher.open(50, 50, !0);
        var f = document.getElementById("chkSave");
        if (IsSaveLeague && (f.checked = !0),
        s)
            for (var _ = sSportL.split(","), g = 0; g < _.length; g++) {
                checkLeagueBySport(_[g])
            }
        else
            checkLeague()
    }
}
function GetLeagueHTML(e, t) {
    var n = fFrame.document.getElementById("League_tmpl").contentWindow;
    if ((sHTML = new Array).push("<div class='popWTableArea'>"),
    sHTML.push(n.document.getElementById("League_Header").innerHTML),
    t) {
        sHTML.push("<div class='popWBlueArea'>"),
        genLeagueHeadTmpl(t);
        for (var a = 0; a < LeagueListBySport.S0.length; a++) {
            sHTML.push("<tr valign='top' align='left' style='line-height:16px;'>");
            for (var r = 0; r < 2; r++)
                (a += r) < LeagueListBySport.S0.length ? genLeagueTmpl(LeagueListBySport.S0[a].SportId, LeagueListBySport.S0[a].LeagueId, LeagueListBySport.S0[a].LeagueName, e, LeagueListBySport.S0[a].Checked) : genLeagueTmpl("", "", "", e, !1);
            sHTML.push("</tr>")
        }
        genLeagueFooterTmpl(t),
        sHTML.push("</div>")
    } else
        for (var o = 1; o < 162; o++)
            if (void 0 !== LeagueListBySport["S" + o] && 0 != LeagueListBySport["S" + o].length) {
                if (sSportL = "" == sSportL ? o.toString() : sSportL + "," + o.toString(),
                genSportTmpl(LeagueListBySport["S" + o][0].SportId, LeagueListBySport["S" + o][0].SportName, e),
                genLeagueHeadTmpl(t),
                1 == o)
                    if (1 != SelMainMarket || e)
                        for (a = 0; a < LeagueListBySport["S" + o].length; a++) {
                            sHTML.push("<tr valign='top' align='left' style='line-height:16px;'>");
                            for (r = 0; r < 2; r++)
                                (a += r) < LeagueListBySport["S" + o].length ? genLeagueTmpl(LeagueListBySport["S" + o][a].SportId, LeagueListBySport["S" + o][a].LeagueId, LeagueListBySport["S" + o][a].LeagueName, e, LeagueListBySport["S" + o][a].Checked) : genLeagueTmpl("", "", "", e, !1);
                            sHTML.push("</tr>")
                        }
                    else {
                        var l = {};
                        l = cloneMainLeague(LeagueListBySport["S" + o]);
                        for (var a = 0; a < l.length; a++) {
                            sHTML.push("<tr valign='top' align='left' style='line-height:16px;'>");
                            for (var r = 0; r < 2; r++)
                                (a += r) < l.length ? genLeagueTmpl(l[a].SportId, l[a].LeagueId, l[a].LeagueName, e, l[a].Checked) : genLeagueTmpl("", "", "", e, !1);
                            sHTML.push("</tr>")
                        }
                    }
                else
                    for (a = 0; a < LeagueListBySport["S" + o].length; a++) {
                        sHTML.push("<tr valign='top' align='left' style='line-height:16px;'>");
                        for (r = 0; r < 2; r++)
                            (a += r) < LeagueListBySport["S" + o].length ? genLeagueTmpl(LeagueListBySport["S" + o][a].SportId, LeagueListBySport["S" + o][a].LeagueId, LeagueListBySport["S" + o][a].LeagueName, e, LeagueListBySport["S" + o][a].Checked) : genLeagueTmpl("", "", "", e, !1);
                        sHTML.push("</tr>")
                    }
                genLeagueFooterTmpl(t)
            }
    sHTML.push(n.document.getElementById("League_Footer").innerHTML),
    sHTML.push("</div>")
}
function genSportTmpl(e, t, n) {
    var a = "none";
    n && (a = "block"),
    sHTML.push("<div id='SportArea_" + e + "' class='popWBlueArea'>"),
    sHTML.push("<div class='header'>"),
    sHTML.push("<span class='icon' onclick='SportControl(" + e + ");' style='display:block;'></span>"),
    sHTML.push("<input id='chkSport_" + e + "' type='checkbox' style='display:" + a + ";' onclick='checkAllBySport(" + e + ");' name='chkSport_" + e + "'>"),
    sHTML.push("<span class='title' onclick='SportControl(" + e + ");'>" + t + "</span>"),
    sHTML.push("</div>")
}
function genLeagueTmpl(e, t, n, a, r) {
    var o = ""
      , l = "block"
      , s = "checkLeague()";
    a ? (s = "checkLeagueBySport(" + e + ")",
    e = t + "_" + e) : e = t,
    r && (o = "checked"),
    "" == t && (l = "none"),
    sHTML.push("<td width='23' style='vertical-align: top;'>"),
    sHTML.push("<input id='" + e + "' type='checkbox' style='margin:2px;padding:0; display:" + l + ";' value='" + t + "' onclick='" + s + ";' name='LF' " + o + ">"),
    sHTML.push("</td>"),
    sHTML.push("<td width='270' style='vertical-align: top;'>"),
    sHTML.push(n + "<br></td>"),
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
    var t = "chkSport_" + e
      , n = document.getElementById(t)
      , a = document.getElementById("chkLFAll")
      , r = document.getElementsByName("LF");
    for (i = 0; i < r.length; i++)
        if ("0" != r[i].value) {
            var o = r[i].value + "_" + e;
            if (null != document.getElementById(o)) {
                if (!document.getElementById(o).checked)
                    return n.checked = !1,
                    void (a.checked = !1)
            }
        }
    null != n && (n.checked = !0),
    checkLeague()
}
function checkLeague() {
    var e = document.getElementById("chkLFAll")
      , t = document.getElementsByName("LF");
    for (i = 0; i < t.length; i++)
        if (0 != t[i].value && !t[i].checked)
            return void (e.checked = !1);
    e.checked = !0
}
function checkAllBySport(e) {
    var t = document.getElementsByName("LF")
      , n = "chkSport_" + e
      , a = document.getElementById(n);
    for (i = 0; i < t.length; i++)
        if (0 != t[i].value) {
            var r = t[i].value + "_" + e;
            null != document.getElementById(r) && (t[i].checked = a.checked)
        }
    checkLeague()
}
function checkAll() {
    var e = document.getElementsByName("LF")
      , t = document.getElementById("chkLFAll");
    for (i = 0; i < e.length; i++)
        e[i].checked = t.checked;
    for (i = 1; i < 100; i++) {
        var n = "chkSport_" + i;
        null != document.getElementById(n) && (document.getElementById(n).checked = t.checked)
    }
}
function go() {
    // console.log('go1')
    var e = document.getElementById("chkLFAll")
      , t = document.getElementsByName("LF")
      , n = document.getElementById("chkSave")
      , a = n.checked ? "1" : "0";

    if (IsSaveLeague = !!n.checked,
    e.checked) {
        for (i = 0; i < t.length; i++)
            t[i].checked = !1;
        e.checked = !0,
        arr_League = new Array("0")
    } else
        for (arr_League = new Array,
        i = 0; i < t.length; i++)
            "" != t[i].value && "0" != t[i].value || (t[i].checked = !1),
            t[i].checked && arr_League.push(t[i].value);
    var r = LeaguePage + "_data.php"
      , o = new Object;
    o.market = fFrame.LastSelectedMArket.toLowerCase(),
    o.gamemode = fFrame.LastSelectedMenu,
    o.sport = fFrame.LastSelectedSport,
    o.pagename = r.toLowerCase(),
    o.selleague = arr_League.toString(),
    o.mode = "league",
    o.writedb = a,
    SelLeagueThreadId = "RecSelLeague",
    ExecAjax("RecSelData.php", o, "POST", SelLeagueThreadId, "RecSelLeague"),
    PopLauncher.close(),
    FinalpaintOddsTable()

    var sl = arr_League.length==0 ? '0' : arr_League.join(",");
    document.DataForm_L.SelectLeague.value = sl;
    document.DataForm_D.SelectLeague.value = sl;
}
function findOddsKeeper(e, t) {
    if ("object" == typeof arr_ShowMixParlay) {
        var n = new Array
          , a = new Array;
        if (null != g_OddsKeeper_L && (n = g_OddsKeeper_L.getOddsKeeperArray()),
        null != g_OddsKeeper_D && (a = g_OddsKeeper_D.getOddsKeeperArray()),
        t) {
            if (arr_ShowMixParlay[e] && null != n[e]) {
                return n[e]
            }
        } else if (arr_ShowMixParlay[e] && null != a[e]) {
            return a[e]
        }
    } else if ("object" == typeof arr_OddsKeeper) {
        if (t && null != arr_OddsKeeper[e])
            return arr_OddsKeeper[e]
    } else if (t) {
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
          , t = new Array;
        null != g_OddsKeeper_L && (e = g_OddsKeeper_L.getOddsKeeperArray()),
        null != g_OddsKeeper_D && (t = g_OddsKeeper_D.getOddsKeeperArray());
        for (var n in arr_ShowMixParlay) {
            if (arr_ShowMixParlay[n] && null != e[n]) {
                (a = e[n]).paintOddsTable()
            }
            if (arr_ShowMixParlay[n] && null != t[n]) {
                (a = t[n]).paintOddsTable()
            }
        }
    } else if ("object" == typeof arr_OddsKeeper)
        for (var n in arr_OddsKeeper) {
            var a;
            null != (a = arr_OddsKeeper[n]) && a.paintOddsTable()
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
        for (var e = document.getElementsByName("MoreCount"), t = 0; t < e.length; t++)
            if ("" != e[t].innerHTML)
                return void (-1 == e[t].parentElement.className.indexOf("off") && e[t].click())
}
function RecSelLeague(e) {
    1 == arr_League.length && "0" == arr_League[0] ? SelLeagueCnt = 0 : SelLeagueCnt = arr_League.length,
    checkLeagueCount()
}
function GetEventBGColor(e) {
    var t = "";
    return "1" != fFrame.SiteMode && "0" != fFrame.SiteMode || (t = "0" == e ? "#C6D4F1" : "#E4E4E4"),
    t
}
function GetLiveBGColor(e) {
    var t = "";
    return "1" != fFrame.SiteMode && "0" != fFrame.SiteMode || (t = "0" == e ? "#ffccbc" : "#ffddd2"),
    t
}
function GetMMREventBGColor(e) {
    return e == MMR_TR_0 ? "#bbbeeb" : "#d0d2f7"
}
function changeOddsType(e) {
    var t = document.getElementById("selOddsType");
    if ("undefined" == typeof sSport || null == sSport || "190" != sSport && "191" != sSport && "192" != sSport && "193" != sSport && "194" != sSport) {
        null != PopLauncher && PopLauncher.close(),
        e != e && (e = e),
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
        } catch (t) {
            document.DataForm.OddsType.value = e,
            document.DataForm.RT.value = "W",
            refreshData()
        }
        null != fFrame.topx.miniOddsObj && fFrame.topx.miniOddsObj.Refresh(e)
    } else {
        switch (t.value != e && (t.value = e),
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
    var t = new Object;
    if (t.market = fFrame.LastSelectedMArket.toLowerCase(),
    t.gamemode = fFrame.LastSelectedMenu,
    t.sport = fFrame.LastSelectedSport,
    void 0 === fFrame.LastSelectedBettype ? t.pagename = "T" : t.pagename = fFrame.LastSelectedBettype,
    t.selmainmarket = SelMainMarket.toString(),
    t.mode = "mainmarket",
    SelLeagueThreadId = "RecSelMainMarket",
    ExecAjax("RecSelData.php", t, "POST", SelLeagueThreadId, "RecSelMainMarket"),
    "object" == typeof arr_OddsKeeper)
        for (var n in arr_OddsKeeper) {
            arr_OddsKeeper[n].paintOddsTable()
        }
    else
        "object" == typeof g_OddsKeeper_D && null != g_OddsKeeper_D && g_OddsKeeper_D.paintOddsTable(),
        "object" == typeof g_OddsKeeper_L && null != g_OddsKeeper_L && g_OddsKeeper_L.paintOddsTable(),
        "object" == typeof g_OddsKeeper && null != g_OddsKeeper && g_OddsKeeper.paintOddsTable();
    btnstop(),
    btnstart()
}
function RecSelMainMarket(e) {}
function showLeagueOdds(e, t, n) {
    window.location.href = "Match.php?Scope=League&Id=" + e + "&Sport=" + t + "&Market=" + n
}
function showMatchOdds(e, t, n) {
    window.location.href = "Match.php?Scope=Match&Id=" + e + "&Sport=" + t + "&Market=" + n
}
function afterRepaintTable(e) {
    var t;
    "oTableContainer_L" == e.parentNode.id ? (document.DataForm_L.RT.value = "U",
    t = document.getElementById("oTableContainer_D"),
    window.clearTimeout(btnStartHandle_L),
    btnStartHandle_L = setTimeout("startButton('l');", 3e3)) : (document.DataForm_D.RT.value = "U",
    t = document.getElementById("oTableContainer_L"),
    window.clearTimeout(btnStartHandle_D),
    btnStartHandle_D = setTimeout("startButton('d');", 3e3)),
    document.getElementById("BetList").style.display = "none",
    document.getElementById("OddsTr").style.display = "block";
    var n = 0;
    e.tBodies.length > 0 && (n = e.tBodies.length - 1),
    e.tBodies[n].rows.length <= 1 ? (e.parentNode.style.display = "none",
    "none" == t.style.display ? document.getElementById("TrNoInfo").style.display = "block" : document.getElementById("TrNoInfo").style.display = "none",
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
    "undefined" != typeof refreshMoreData && (refreshMoreData_L(1),
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

    "undefined" != typeof refreshMoreData && (refreshMoreData_D(1),
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
function changeButtonStatus(e, t, n) {
    var a = ""
      , r = !1
      , o = RES_REFRESH;
    if (t)
        a = " disable",
        r = !0,
        o = RES_PLEASE_WAIT;
    else {
        if ("AllSingleOdds" == parent.rightx.document.body.id && void 0 === n && fFrame.isAllSingleFirstLoad && "btnRefresh_D" == e)
            return;
        if ("AllSingleOdds" == parent.rightx.document.body.id && void 0 === n) {
            if ("btnRefresh_D" == e && "" != document.DataForm_D.ChangeOddsType.value)
                return;
            if ("btnRefresh_L" == e && "" != document.DataForm_L.ChangeOddsType.value)
                return
        } else
            "btnRefresh_D" == e && (fFrame.isAllSingleFirstLoad = !1)
    }
    $("#" + e).each(function() {
        this.title = o,
        this.className = "button" + a,
        this.firstChild.innerHTML = '<div class="icon-refresh" title="' + o + '"></div>' + (null == n ? "" : n),
        this.disabled = r
    }),
    $('a[name="' + e + '"]').each(function() {
        this.title = o,
        this.className = "btnIcon right" + a,
        this.firstChild.title = o,
        this.disabled = r
    })
}
function stopButton(e) {
    var t = document.getElementById("divSelectDate");
    if (null != t && "none" != t.style.display)
        for (var n = 0; n < t.childNodes.length; n++) {
            var a = t.childNodes[n];
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
        var t = document.getElementById("divSelectDate");
        if (null != t && "none" != t.style.display)
            for (var n = 0; n < t.childNodes.length; n++) {
                var a = t.childNodes[n];
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
    for (var t = ["btnRefresh", "btnRefresh_L", "btnRefresh_D"], n = 0; n < t.length; n++)
        changeButtonStatus(t[n], !1)
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
                    var t = '<span class="color01">' + RES_NOMOREBET + "</span>";
                    $("#" + key).html(t)
                }
            else if ("d" == e) {
                t = '<span class="icon-clock"></span><div class="flash animation">' + HappyCountDownList[key] + ("undefined" == typeof RES_Seconds ? "" : " " + RES_Seconds) + "</div>";
                $("#" + key).html(t)
            } else {
                t = "<b>" + RES_BingoGameStart + '</b> <span class="color01">' + HappyCountDownList[key] + "</span>";
                $("#" + key).html(t)
            }
    }
}
function countdown(e, t) {
    var n;
    if ("l" == e) {
        if (!REFRESH_GAP_L)
            return;
        if (t <= 0)
            return void refreshData_L();
        (n = document.getElementById("btnRefresh_L")).title = RES_LIVE,
        n.hasChildNodes() && (n.firstChild.innerHTML = '<div class="icon-refresh" title="' + RES_LIVE + '"></div>' + t),
        CounterHandle_L = setTimeout("countdown('" + e + "'," + (t - 1) + ")", 1e3)
    } else {
        if (!REFRESH_GAP_D)
            return;
        if (t <= 0)
            return void refreshData_D();
        (n = document.getElementById("btnRefresh_D")).title = RES_REFRESH,
        n.innerHTML = '<span><div class="icon-refresh" title="' + RES_REFRESH + '"></div>' + t + "</span>",
        CounterHandle_D = setTimeout("countdown('" + e + "'," + (t - 1) + ")", 1e3)
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
function checkHasParlay(e, t) {
    try {
        var n = 0;
        n = "L" == e.toUpperCase() ? fFrame.leftx.IsHaveLiveParlay() ? 1 : 0 : fFrame.leftx.GetParlayCount(e, t);
        var a = document.getElementById("b_SwitchToParlay");
        null != a && (n > 0 && "0" == arr_Match[0] ? a.style.display = "block" : a.style.display = "none",
        setTimeout("checkHasParlay('" + e + "','" + t + "')", 2e3))
    } catch (n) {
        setTimeout("checkHasParlay('" + e + "','" + t + "')", 1e3)
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
function SingleNumberWheelMouseMove(e, t) {
    ChangeCursor(e);
    -1 == document.getElementById(t).className.indexOf("trbgov") && (document.getElementById(t).className = document.getElementById(t).className + " trbgov"),
    -1 == e.className.indexOf("trbgov") && (e.className = e.className + " trbgov")
}
function SingleNumberWheelMouseOut(e, t) {
    document.getElementById(t).className = document.getElementById(t).className.replace("trbgov", "").replace(/(^\s*)|(\s*$)/g, ""),
    e.className = e.className.replace("trbgov", "").replace(/(^\s*)|(\s*$)/g, "")
}
function BingoMouseMove(e) {
    ChangeCursor(e);
    var t = e.id.split("_")
      , n = parseInt(t[2], 10)
      , a = "";
    switch (4 == t.length && (a = "_" + t[3]),
    t[1]) {
    case "1":
        for (var r = 5 * n - 4; r <= 5 * n; r++)
            -1 == document.getElementById(t[0] + "_5_" + r + a).className.indexOf("trbgov") && (document.getElementById(t[0] + "_5_" + r + a).className = document.getElementById(t[0] + "_5_" + r + a).className + " trbgov");
        break;
    case "2":
        for (r = 15 * n - 14; r <= 15 * n; r++)
            -1 == document.getElementById(t[0] + "_5_" + r + a).className.indexOf("trbgov") && (document.getElementById(t[0] + "_5_" + r + a).className = document.getElementById(t[0] + "_5_" + r + a).className + " trbgov");
        break;
    case "3":
        for (r = 25 * n - 24; r <= 25 * n; r++)
            -1 == document.getElementById(t[0] + "_5_" + r + a).className.indexOf("trbgov") && (document.getElementById(t[0] + "_5_" + r + a).className = document.getElementById(t[0] + "_5_" + r + a).className + " trbgov");
        break;
    case "4":
        for (r = 0; r <= 14; r++) {
            var o = 5 * r + n;
            -1 == document.getElementById(t[0] + "_5_" + o + a).className.indexOf("trbgov") && (document.getElementById(t[0] + "_5_" + o + a).className = document.getElementById(t[0] + "_5_" + o + a).className + " trbgov")
        }
    }
    -1 == e.className.indexOf("trbgov") && (e.className = e.className + " trbgov")
}
function BingoMouseOut(e) {
    var t = e.id.split("_")
      , n = parseInt(t[2], 10)
      , a = "";
    switch (4 == t.length && (a = "_" + t[3]),
    t[1]) {
    case "1":
        for (var r = 5 * n - 4; r <= 5 * n; r++)
            document.getElementById(t[0] + "_5_" + r + a).className = document.getElementById(t[0] + "_5_" + r + a).className.replace("trbgov", "").replace(/(^\s*)|(\s*$)/g, "");
        break;
    case "2":
        for (r = 15 * n - 14; r <= 15 * n; r++)
            document.getElementById(t[0] + "_5_" + r + a).className = document.getElementById(t[0] + "_5_" + r + a).className.replace("trbgov", "").replace(/(^\s*)|(\s*$)/g, "");
        break;
    case "3":
        for (r = 25 * n - 24; r <= 25 * n; r++)
            document.getElementById(t[0] + "_5_" + r + a).className = document.getElementById(t[0] + "_5_" + r + a).className.replace("trbgov", "").replace(/(^\s*)|(\s*$)/g, "");
        break;
    case "4":
        for (r = 0; r <= 14; r++) {
            var o = 5 * r + n;
            document.getElementById(t[0] + "_5_" + o + a).className = document.getElementById(t[0] + "_5_" + o + a).className.replace("trbgov", "").replace(/(^\s*)|(\s*$)/g, "")
        }
    }
    e.className = e.className.replace("trbgov", "").replace(/(^\s*)|(\s*$)/g, "")
}
function DivPopMore(e, t, n, a, r, o, l, s, i) {
    if (null != PopLauncher && (PopLauncher.close(),
    PopLauncher = null),
    initialTmpl("MorePop_tmpl", "MorePop_tmpl.php", "DivPopMore(" + e + ",'" + t + "','" + n + "','" + a + "','" + r + "','" + o + "','" + l + "','" + s + "','" + i + "');")) {
        var d = "D";
        "true" == l && (d = "L"),
        document.getElementById("oPopContainer").innerHTML = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById(i + d).innerHTML,
        (sKeeper = new SimpleOddsKeeper).MUID = s,
        sKeeper.MatchId = t,
        sKeeper.TableContainer = document.getElementById("oPopContainer"),
        sKeeper.DivTmpl = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById(i + d).innerHTML,
        sKeeper.isParlay = o,
        sKeeper.Market = d;
        var c = document.getElementById("PopDiv");
        c.style.width = e + 100 + "px";
        var u = document.getElementById("PopTitleText");
        if (u.style.width = e + "px",
        null == PopLauncher) {
            var p = document.getElementById("PopTitle")
              , m = document.getElementById("PopCloser");
            PopLauncher = new DivLauncher(c,p,m)
        }
        var f = new Object;
        switch (f.matchid = t,
        f.Market = d,
        f.tag = i,
        f.isparlay = o,
        ThreadId = i,
        i) {
        case "UnderOver_MoreDiv":
            more_mode = "OU",
            u.innerHTML = a + " -vs- " + r,
            ExecAjax("MorePop_data.php", f, "GET", i, "OpenUnderOverPopDiv");
            break;
        case "Bingo_MoreDiv":
        default:
            more_mode = "NG",
            u.innerHTML = RES_B90 + " - " + a,
            ExecAjax("MorePop_data.php", f, "GET", i, "OpenBingoPopDiv")
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
function ConvertArrayIndex(e, t) {
    for (var n = 0; n < e.length; n++)
        if (e[n] == t)
            return n;
    return -1
}
function SwpA(e, t, n) {
    var a = e[t];
    e[t] = e[n],
    e[n] = a
}
function SwpD(e) {
    if (!SwpDEF_FLAG) {
        SwpDEF_FLAG = !0,
        null == ARR_FIELDS_ORG && (ARR_FIELDS_ORG = ARR_FIELDS_DEF[1].slice(0, ARR_FIELDS_DEF[1].length)),
        null == ARR_FIELDS_ORG1 && (ARR_FIELDS_ORG1 = ARR_FIELDS_DEF1[1].slice(0, ARR_FIELDS_DEF1[1].length));
        for (var t = 1; t < e.length; t++)
            SwpA(ARR_FIELDS_DEF[1], e[t - 1], e[t]),
            SwpA(ARR_FIELDS_DEF1[1], e[t - 1], e[t])
    }
}
function InsD(e) {
    if (!InsDEF_FLAG) {
        InsDEF_FLAG = !0,
        null == ARR_FIELDS_ORG && (ARR_FIELDS_ORG = ARR_FIELDS_DEF[1].slice(0, ARR_FIELDS_DEF[1].length)),
        null == ARR_FIELDS_ORG1 && (ARR_FIELDS_ORG1 = ARR_FIELDS_DEF1[1].slice(0, ARR_FIELDS_DEF1[1].length));
        for (var t = 0; t < e.length; t++)
            ARR_FIELDS_DEF[1] = arrayInsert(ARR_FIELDS_DEF[1], e[t], ["XIBCX"]),
            ARR_FIELDS_DEF1[1] = arrayInsert(ARR_FIELDS_DEF1[1], e[t], ["XIBCX"])
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
function addLeagueFavorites(e, t, n, a, r, o) {
    var l = document.getElementById("fav_" + n);
    if (null == o && (o = ""),
    IsFromFavLeague = !0,
    LeagueFavObj[n.toString()] ? (LeagueFavObj[n.toString()] = !1,
    l.parentElement.title = fFrame.RES_AddFavorite,
    l.className = "iconOdds favorite",
    addFavoritesQuery(t, n, o, "DelL", ""),
    null != RES_PageType && (document.DataForm_L.RT.value = "W",
    document.DataForm_D.RT.value = "W",
    document.DataForm_L.CT.value = "",
    document.DataForm_D.CT.value = "",
    "none" != $("#btnSwitchBack").css("display") && LiveInfoBackButton()),
    "" == o && checkOddsKeeperLeague(t, n, "")) : (LeagueFavObj[n.toString()] = !0,
    l.parentElement.title = fFrame.RES_RemoveFavorite,
    l.className = "iconOdds favoriteAdd",
    addFavoritesQuery(t, n, "", "AddL", ""),
    "" == o && checkOddsKeeperLeague(t, n, "1")),
    void 0 !== e) {
        var s = e || window.event;
        void 0 !== s && null != s && (void 0 !== s.cancelBubble ? s.cancelBubble = !0 : s.cancel = !0,
        s.stopPropagation && s.stopPropagation())
    }
    IsFromFavLeague = !1
}
function addMatchFavorites(e, t, n, a) {
    var r, o = e.substr(2, e.length - 2), l = document.getElementsByName("fav_" + e), s = getOddsKeeper(e, a);
    1 == ("AllSingleOdds" == document.body.id || "Live" == document.body.id ? 0 : document.getElementById("aSorter").value) ? (r = s.findIndex("KickoffTime", t),
    r = s.adjustIndex1st(r, "KickoffTime", t, e)) : (r = s.findIndex("MatchCode", t),
    r = s.adjustIndex1st(r, "MatchCode", t, e));
    for (var i = s.EventList[r].KickoffTime, d = s.EventList[r].FavLeague, c = 0; c < l.length; c++) {
        var u = l[c];
        null != u.parentElement && (n ? (u.parentElement.href = String.format("javascript:addMatchFavorites('{0}','{1}',0,{2});", e, t, a),
        u.parentElement.title = fFrame.RES_AddFavorite,
        u.className = "iconOdds favorite",
        addFavoritesQuery("", s.EventList[r].LeagueId, o, "DelM", i),
        s.EventList[r].MUID == e && (s.EventList[r].Favorite = ""),
        null != RES_PageType && (document.DataForm_L.RT.value = "W",
        document.DataForm_D.RT.value = "W",
        document.DataForm_L.CT.value = "",
        document.DataForm_D.CT.value = "",
        "F" == RES_PageType && "none" != $("#btnSwitchBack").css("display") && LiveInfoBackButton()),
        d && (addLeagueFavorites(null, s.EventList[r].SportType, s.EventList[r].LeagueId, "1", a, o),
        checkOddsKeeperLeague(s.EventList[r].SportType, s.EventList[r].LeagueId, "2"))) : (u.parentElement.href = String.format("javascript:addMatchFavorites('{0}','{1}',1,{2});", e, t, a),
        u.parentElement.title = fFrame.RES_RemoveFavorite,
        u.className = "iconOdds favoriteAdd",
        addFavoritesQuery("", s.EventList[r].LeagueId, o, "AddM", i),
        s.EventList[r].MUID == e && (s.EventList[r].Favorite = "1")))
    }
}
function addFavoritesQuery(e, t, n, a, r) {
    $.ajax({
        type: "post",
        url: "addFavorites.php",
        data: {
            SportType: e,
            LeagueID: t,
            MatchId: n,
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
function checkOddsKeeperLeague(e, t, n) {
    if ("object" == typeof arr_ShowMixParlay) {
        if (null != arr_ShowMixParlay[e.toString()]) {
            var a = new Array
              , r = new Array;
            if (null != g_OddsKeeper_L && (a = g_OddsKeeper_L.getOddsKeeperArray()),
            null != g_OddsKeeper_D && (r = g_OddsKeeper_D.getOddsKeeperArray()),
            arr_ShowMixParlay[e.toString()] && null != a[e.toString()])
                for (var o = a[e.toString()], l = 0; l < o.EventList.length; l++)
                    o.EventList[l].LeagueId.toLowerCase() == t && ("2" == n ? o.EventList[l].FavLeague = "" : (o.EventList[l].FavLeague = n,
                    o.EventList[l].Favorite = n));
            if (arr_ShowMixParlay[e.toString()] && null != r[e.toString()])
                for (o = r[e.toString()],
                l = 0; l < o.EventList.length; l++)
                    o.EventList[l].LeagueId.toLowerCase() == t && ("2" == n ? o.EventList[l].FavLeague = "" : (o.EventList[l].FavLeague = n,
                    o.EventList[l].Favorite = n));
            if (arr_ShowMixParlay.O && null != g_OddsKeeper_Outright)
                for (o = g_OddsKeeper_Outright,
                l = 0; l < o.EventList.length; l++)
                    o.EventList[l].LeagueId.toLowerCase() == t && ("2" == n ? o.EventList[l].FavLeague = "" : (o.EventList[l].FavLeague = n,
                    o.EventList[l].Favorite = n))
        }
    } else if ("object" == typeof arr_OddsKeeper) {
        if (null != arr_OddsKeeper[e])
            for (o = arr_OddsKeeper[e],
            l = 0; l < o.EventList.length; l++)
                o.EventList[l].LeagueId.toLowerCase() == t && ("2" == n ? o.EventList[l].FavLeague = "" : (o.EventList[l].FavLeague = n,
                o.EventList[l].Favorite = n))
    } else {
        if ("undefined" != typeof g_OddsKeeper_L && null != g_OddsKeeper_L)
            for (l = 0; l < g_OddsKeeper_L.EventList.length; l++)
                g_OddsKeeper_L.EventList[l].LeagueId.toLowerCase() == t && ("2" == n ? g_OddsKeeper_L.EventList[l].FavLeague = "" : (g_OddsKeeper_L.EventList[l].FavLeague = n,
                g_OddsKeeper_L.EventList[l].Favorite = n));
        if ("undefined" != typeof g_OddsKeeper_D && null != g_OddsKeeper_D)
            for (l = 0; l < g_OddsKeeper_D.EventList.length; l++)
                g_OddsKeeper_D.EventList[l].LeagueId.toLowerCase() == t && ("2" == n ? g_OddsKeeper_D.EventList[l].FavLeague = "" : (g_OddsKeeper_D.EventList[l].FavLeague = n,
                g_OddsKeeper_D.EventList[l].Favorite = n));
        if ("undefined" != typeof g_OddsKeeper && null != g_OddsKeeper)
            for (l = 0; l < g_OddsKeeper.EventList.length; l++)
                g_OddsKeeper.EventList[l].LeagueId.toLowerCase() == t && ("2" == n ? g_OddsKeeper.EventList[l].FavLeague = "" : (g_OddsKeeper.EventList[l].FavLeague = n,
                g_OddsKeeper.EventList[l].Favorite = n))
    }
    FinalpaintOddsTable()
}
function getOddsKeeper(e, t) {
    if ("object" == typeof arr_ShowMixParlay) {
        for (var n = 1; n < 100; n++)
            if (null != arr_ShowMixParlay[n.toString()]) {
                var a = new Array
                  , r = new Array;
                if (null != g_OddsKeeper_L && (a = g_OddsKeeper_L.getOddsKeeperArray()),
                null != g_OddsKeeper_D && (r = g_OddsKeeper_D.getOddsKeeperArray()),
                arr_ShowMixParlay[n.toString()] && null != a[n.toString()] && t)
                    for (var o = 0; o < a[n.toString()].EventList.length; o++)
                        if (a[n.toString()].EventList[o].MUID.toLowerCase() == e)
                            return a[n.toString()];
                if (arr_ShowMixParlay[n.toString()] && null != r[n.toString()] && !t)
                    for (o = 0; o < r[n.toString()].EventList.length; o++)
                        if (r[n.toString()].EventList[o].MUID.toLowerCase() == e)
                            return r[n.toString()]
            }
    } else if ("object" == typeof arr_OddsKeeper) {
        for (n = 1; n < 100; n++)
            if (null != arr_OddsKeeper[n.toString()] && t)
                for (o = 0; o < arr_OddsKeeper[n.toString()].EventList.length; o++)
                    if (arr_OddsKeeper[n.toString()].EventList[o].MUID.toLowerCase() == e)
                        return arr_OddsKeeper[n.toString()]
    } else {
        if (null != g_OddsKeeper_L && t)
            for (o = 0; o < g_OddsKeeper_L.EventList.length; o++)
                if (g_OddsKeeper_L.EventList[o].MUID.toLowerCase() == e)
                    return g_OddsKeeper_L;
        if (null != g_OddsKeeper_D && !t)
            for (o = 0; o < g_OddsKeeper_D.EventList.length; o++)
                if (g_OddsKeeper_D.EventList[o].MUID.toLowerCase() == e)
                    return g_OddsKeeper_D;
        if (null != g_OddsKeeper)
            for (o = 0; o < g_OddsKeeper.EventList.length; o++)
                if (g_OddsKeeper.EventList[o].MUID.toLowerCase() == e)
                    return g_OddsKeeper
    }
}
function OpenSuperLive(e) {
    var t = "matchid=" + e
      , n = "http://" + location.href.split("/")[2] + "/AuthorizationCustomer.php?cust=superlive&" + t;
    fFrame.openWindowsHandle("SuperLive", !0, null, "AuthorizationCustomer.php?cust=superlive&" + t + "&redirectURL=" + encodeURIComponent(n), "scrollbars=yes,resizable=yes,top=0,left=" + (window.screen.availWidth - 375) + ",width=360,Height=" + (window.screen.availHeight - 68), !1, function(e, a) {
        a || (e.location = "AuthorizationCustomer.php?cust=superlive&" + t + "&redirectURL=" + encodeURIComponent(n),
        "Chrome" == userBrowser() ? e.blur() : e.focus())
    })
}
function addScrollbar(e, t) {
    importJS("commJS/jquery.mCustomScrollbar.js", "jQuery.mCustomScrollbar", function() {
        t ? $("#" + e).mCustomScrollbar("update") : $("#" + e).mCustomScrollbar()
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
    var t = e - 1;
    return t <= 1 ? t.toFixed(2) : (-1 / t).toFixed(2)
}
function DecToIndo(e) {
    var t = e - 1;
    return t < 1 && t > 0 ? (-1 / t).toFixed(2) : t.toFixed(2)
}
function ConvertOdds(e, t, n) {
    if (0 == t)
        return "";
    if ("1" == n)
        return t;
    switch (e) {
    case "2":
        return DecToHK(t);
    case "3":
        return DecToIndo(t);
    case "4":
        return DecToMY(t);
    case "5":
        return DecToUS(t);
    default:
        return t
    }
}
function ShowBetType(e, t, n) {
    var a = e + "_" + t + "_Title"
      , r = e + "_" + t + "_Odds";
    0 == _HiddenBetTypeControlArray.length && (_HiddenBetTypeControlArray = HiddenBetTypeControlArray),
    _HiddenBetTypeControlArray.indexOf(n) < 0 ? _HiddenBetTypeControlArray.push(n) : _HiddenBetTypeControlArray = BArrayRemove(_HiddenBetTypeControlArray, n),
    $("#" + n).hasClass("show") ? $("#" + n).removeClass("show") : $("#" + n).addClass("show"),
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
        for (var t = 0; t < HiddenBetTypeArray.length; t++)
            $("#" + HiddenBetTypeArray[t]).css("display", "none")
    } else {
        for (e = 0; e < _HiddenBetTypeControlArray.length; e++)
            $("#" + _HiddenBetTypeControlArray[e]).removeClass("show");
        for (t = 0; t < _HiddenBetTypeArray.length; t++)
            $("#" + _HiddenBetTypeArray[t]).css("display", "none")
    }
}
function BArrayRemove(e, t) {
    var n = e.indexOf(t);
    return n > -1 && e.splice(n, 1),
    e
}
function defaultQuarterHidden(e, t) {
    var n = e + "_Quarter" + t + "_Control";
    HiddenBetTypeControlArray.indexOf(n) < 0 && HiddenBetTypeControlArray.push(n);
    var a = e + "_Quarter" + t + "_Title";
    HiddenBetTypeArray.indexOf(a) < 0 && HiddenBetTypeArray.push(a);
    var r = e + "_Quarter" + t + "_Odds";
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
function getUpdObj(e, t) {
    for (var n, a = 0; a < e.length; a++)
        if ((n = e[a]).OddsId == t)
            return n;
    return null
}
function setUpdObj(e, t) {
    if ("" != t.OddsId) {
        for (var n = !1, a = 0; a < e.length; a++)
            e[a].OddsId == t.OddsId && (n = !0,
            e[a] = t);
        n || (e[e.length] = t)
    }
}
function CheckHappyOddsCss(e) {
    return null == e.innerHTML.match(/[0-9]/g) ? (e.style.cursor = "default",
    e.style.pointerEvents = "none",
    !1) : (e.style.cursor = "pointer",
    !0)
}
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
    function t() {
        var e = (n = document.documentElement.clientWidth) + $(window).scrollLeft();
        $(".tip").length > 0 && ($(".tip").css("right", ""),
        e <= a ? ($(".tip").animate({
            right: "+=5px"
        }, 500),
        $(".tip").animate({
            right: "-=5px"
        }, 500, t)) : setTimeout(t, 500))
    }
    if ("none" != $("#SmallLiveInfo").css("display")) {
        var n = document.documentElement.clientWidth
          , a = 800
          , r = window.outerHeight || document.documentElement.clientHeight || document.body.clientHeight
          , o = n + $(window).scrollLeft();
        o < 950 && 0 == $("#TipLiveInfo").length && (AdjustSizeForSmallInfo && (AdjustSizeForSmallInfo = !1,
        "IE" == userBrowser() ? window.parent.resizeTo(1364, r) : window.parent.resizeBy(1364, r)),
        (o = (n = document.documentElement.clientWidth) + $(window).scrollLeft()) < 950 && ($("body").prepend("<div id='TipLiveInfo' class='tip liveInfo'></div>"),
        t())),
        $("#TipLiveInfo").length > 0 && (o <= a ? $(".tip").css("left", "") : o > a && o <= 950 ? ($(".tip").css("left", 740 - $(document).scrollLeft()),
        $(".tip").css("right", "")) : o > 950 && $("#TipLiveInfo").remove())
    }
}, more_mode, PopLauncher, sHTML, LeaguePage, sChkLeagueFunction, sSportL = "", SelLeagueThreadId = "", btnStartHandle_L, btnStartHandle_D, REFRESH_GAP_L = !0, bShowLoading_L = !0, iRefreshCount_L = REFRESH_COUNTDOWN, RefresHandle_L, Tennis_More = !1, Soccer_More = !1, Basketball_More = !1, REFRESH_GAP_D = !0, bShowLoading_D = !0, iRefreshCount_D = REFRESH_COUNTDOWN, RefresHandle_D, sw1 = !0, sw2 = !0, CountDownList = new Array, HappyCountDownList = new Array, sKeeper = null, ARR_FIELDS_ORG = null, ARR_FIELDS_ORG1 = null, SwpDEF_FLAG = !1, InsDEF_FLAG = !1, IsFromFavLeague = !1, LeagueFavObj = new Object;
void 0 !== window.external && (document.getElementsByName = function(e, t) {
    t || (t = "*");
    for (var n = document.getElementsByTagName(t), a = [], r = 0; r < n.length; r++)
        att = n[r].getAttribute("name"),
        att == e && a.push(n[r]);
    return a
}
);
var OddsConverter = {
    Convert: function(e, t, n, a, r, o, l, s, i) {
        r = a ? 1 : r,
        l = a && 0 == l ? 2 : l;
        var d = 0
          , c = s[i].Price
          , u = s[i].Seq;
        if (0 != c) {
            if (0 == e) {
                if (t > 0 && (1 == t && (o = 0),
                c = this.GetSpreadOdds(c, o, a ? l : 0)),
                2 == t && !a) {
                    var p = 0;
                    s.map(function(e) {
                        e.get("SelId") != i && (p = this.GetSpreadOdds(e.get("Price"), o, 0))
                    }
                    .bind(this)),
                    0 != u && (n *= -1),
                    c = this.FormatHDPOdds(c, p, 0 == u, n)
                }
                return 3 != t || a || (c = this.FormatOUOdds(c, 0 == u)),
                a || (c = this.Floor(c, 2)),
                d = this.MYtoOther(r, c),
                this.FloorToString(d, 5 == r ? 0 : 2)
            }
            return 5 == t && (o = o > .01 ? .01 : 0,
            c = this.GetSpreadOdds(c, o, 0)),
            d = this.Floor(c, 2),
            this.FloorToString(d, 2)
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
    FloorToString: function(e, t) {
        var n = this.Floor(e, t);
        return 0 == n ? "" : n.toFixed(t)
    },
    Floor: function(e, t) {
        if (null == e)
            return !1;
        var n = "^([-+]?[0-9]*.[0-9]{" + t + "})[0-9]*$";
        return parseFloat(e.toString().replace(new RegExp(n), function(e, t) {
            return t
        }))
    },
    RoundOff: function(e, t) {
        var n = 1;
        null != t && (n = Math.pow(10, t));
        var a = Math.abs(e)
          , r = 1;
        return e < 0 && (r = -1),
        this.FloatMul(this.FloatDiv(Math.round(this.FloatMul(a, n)), n), r)
    },
    FormatOUOdds: function(e, t) {
        var n = e;
        return (t && e < 0 || !t && e > 0) && (n = this.Floor(e, 2)),
        (t && e > 0 || !t && e < 0) && (n = this.RoundOff(e, 2)),
        n
    },
    FormatHDPOdds: function(e, t, n, a) {
        return a > 0 && e < 0 || a < 0 && e > 0 || 0 == a && e > 0 && t > 0 && (e > t || e == t && !n) ? this.Floor(e, 2) : this.RoundOff(e, 2)
    },
    GetSpreadOdds: function(e, t, n) {
        var a = e;
        return 0 == e ? 0 : (a = this.FloatSubtraction(a, this.FloatAdd(t, this.FloatMul(.005, n))),
        e > 0 && a < .01 && (a = .01),
        a < -1 && (a = this.FloatAdd(a, 2)) < .01 && (a = 0),
        a)
    },
    MYtoOther: function(e, t) {
        var n = t;
        switch (e) {
        case 1:
            n = this.DecimalOdds(n);
            break;
        case 2:
            n = this.HKOdds(n);
            break;
        case 3:
            n = this.IndoOdds(n);
            break;
        case 5:
            n = this.AmericanOdds(n)
        }
        return n
    },
    FloatAdd: function(e, t) {
        var n, a, r;
        try {
            n = e.toString().split(".")[1].length
        } catch (e) {
            n = 0
        }
        try {
            a = t.toString().split(".")[1].length
        } catch (e) {
            a = 0
        }
        return r = Math.pow(10, Math.max(n, a)),
        (this.FloatMul(e, r) + this.FloatMul(t, r)) / r
    },
    FloatSubtraction: function(e, t) {
        var n, a, r, o;
        try {
            n = e.toString().split(".")[1].length
        } catch (e) {
            n = 0
        }
        try {
            a = t.toString().split(".")[1].length
        } catch (e) {
            a = 0
        }
        return r = Math.pow(10, Math.max(n, a)),
        o = n >= a ? n : a,
        ((e * r - t * r) / r).toFixed(o)
    },
    FloatMul: function(e, t) {
        var n = 0
          , a = e.toString()
          , r = t.toString();
        try {
            n += a.split(".")[1].length
        } catch (e) {}
        try {
            n += r.split(".")[1].length
        } catch (e) {}
        return Number(a.replace(".", "")) * Number(r.replace(".", "")) / Math.pow(10, n)
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
};
