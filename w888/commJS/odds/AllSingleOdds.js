function getParent(e) {
    for (var d = e, a = 0; a < 4; a++) {
        if (null != d.SiteMode)
            return d;
        d = d.parent
    }
    return null
}
function updateDate(e) {
    day_of_week = e,
    getDateData(),
    setDateAll()
}
function getParent(e) {
    for (var d = e, a = 0; a < 4; a++) {
        if (null != d.SiteMode)
            return d;
        d = d.parent
    }
    return null
}
function CheckOddsId(e) {
    return void 0 !== e && (null != e && "" != e)
}
function GenMRHdp(e, d) {
    var a = parseInt(d);
    return a >= 0 ? e + " (" + a + ")" : e + ' <span style="color:#b50000;">(' + a + ")</span>"
}
function MR_Switch() {
    if (!OnlyMROdds) {
        var e = document.getElementById("MR_Switch").className;
        "on" == e ? (e = "off",
        NoShowMROdds = !0) : (e = "on",
        NoShowMROdds = !1),
        document.getElementById("MR_Switch").className = e;
        var d = new Object;
        d.pagename = "F",
        d.selmmr = e,
        d.mode = "mmr",
        SelLeagueThreadId = "RecSelMMR",
        ExecAjax("RecSelData.aspx", d, "POST", SelLeagueThreadId, "RecSelMMR");
        var a = new Array
          , _ = new Array;
        null != g_OddsKeeper_L && (a = g_OddsKeeper_L.getOddsKeeperArray()),
        null != g_OddsKeeper_D && (_ = g_OddsKeeper_D.getOddsKeeperArray());
        for (var t in arr_ShowMixParlay) {
            if (arr_ShowMixParlay[t] && null != a[t]) {
                a[t].paintOddsTable()
            }
            if (arr_ShowMixParlay[t] && null != _[t]) {
                _[t].paintOddsTable()
            }
        }
    }
}
function RecSelMMR(e) {}
function HighLightKeyWord(e, d, a) {
    for (var _ = new RegExp("^" + e.replace(/\(/g, "\\(").replace(/\)/g, "\\)").replace("/[/g", "\\[").replace("/]/g", "\\]").replace("/./g", "\\.").replace("///g", "\\/").replace("/-/g", "\\-").replace("/'/g", "\\'").replace("/&/g", "\\&").replace("/;/g", "\\;"),"i"), t = 0; t < d.length; t++)
        a ? d[t][5] = d[t][5].replace(_, function(e, d) {
            return '<span class="nameResult">' + e + "</span>"
        }) : (d[t][6] = d[t][6].replace(_, function(e, d) {
            return '<span class="nameResult">' + e + "</span>"
        }),
        d[t][7] = d[t][7].replace(_, function(e, d) {
            return '<span class="nameResult">' + e + "</span>"
        }));
    return d
}
function SwitchMore(e, d, a) {
    var _ = "";
    a.className.indexOf("off") > -1 ? (_ = "displayOff",
    a.className = "en_Point") : (_ = "displayOn",
    a.className = "en_Point off");
    $(a).parent().parent("td").parent("tr").next("tr").find("td.moreBetType").attr("class", "moreBetType " + _),
    DisplayMoreObj[e] = _
}
function SwitchEsortsMore(e, d, a) {
    var _ = "";
    a.className.indexOf("off") > -1 ? (_ = "displayOff",
    a.className = "en_Point",
    EsportCategoryList[e] = MatchCategoryList[e][0]) : (_ = "display",
    a.className = "en_Point off");
    $(a).parent().parent("td").parent("tr").next("tr").find("td.moreBetType.tag").attr("class", "moreBetType tag " + _),
    EsportsDisplayMoreObj[e] = _,
    FinalpaintOddsTable()
}
function ShowBetList(e, d, a, _, t, s, r, l, n, O, o) {
    var i = null;
    if (null != a) {
        var p = "";
        a.length > 1 && (p = a.substr(a.length - 1, 1),
        a = a.substr(0, a.length - 1)),
        "l" == p ? (null == g_OddsKeeper_L && ((g_OddsKeeper_L = new SingleOddsClass).UpdateFinish = ShowSportCheckBox),
        i = g_OddsKeeper_L) : (null == g_OddsKeeper_D && ((g_OddsKeeper_D = new SingleOddsClass).UpdateFinish = ShowSportCheckBox),
        i = g_OddsKeeper_D),
        "U" == e ? i.Update(d, a, p, _, t, s, r, l, n, O, o) : i.initData(e, d, a, p, _)
    }
}
function ShowSportCheckBox(e) {
    if ("l" == e ? synFlag_L = !0 : synFlag_D = !0,
    "e" == e && (synFlag_L = !0),
    synFlag_D && synFlag_L) {
        var d = !!("l" != e || null != g_OddsKeeper_D && g_OddsKeeper_D.IsReady())
          , a = !!("l" == e || null != g_OddsKeeper_L && g_OddsKeeper_L.IsReady())
          , _ = new Array;
        document.getElementById("BetList").style.display = "none",
        _[0] = 0,
        d && (_ = SumSportCount(_, g_OddsKeeper_D.arr_SportsCount)),
        a && (_ = SumSportCount(_, g_OddsKeeper_L.arr_SportsCount)),
        d && (haveOutgight ? (_[0] = _[0] + TotlaLeagueCnt_O,
        _.O = TotlaLeagueCnt_O,
        g_OddsKeeper_D.arr_SportsCount[0] += TotlaLeagueCnt_O) : _.O = 0),
        cleartb();
        var t = 0;
        for (var s in arr_ShowMixParlay)
            32 != s && (t = paintsTable(s, _, t)),
            2 == s && (t = paintsTable(32, _, t));
        haveOutgight && paintsTable("O", _, t),
        setSportsAll(),
        _[0] > 0 ? (document.getElementById("TrNoInfo").style.display = "none",
        "B" == RES_PageType ? (document.getElementById("SportsContainer").style.display = "none",
        document.getElementById("DateContainer").style.display = "none",
        document.getElementById("DateContainer1").style.display = "",
        -1 != indexOf(arr_Match, "0") ? document.getElementById("menu").style.display = "" : document.getElementById("menu").style.display = "none") : document.getElementById("menu").style.display = "none",
        ShowMarketContent(e),
        null != nextShowMarket && (ShowMarketContent(nextShowMarket),
        nextShowMarket = null)) : (document.getElementById("TrNoInfo").style.display = "block",
        document.getElementById("menu").style.display = "none"),
        "B" == RES_PageType && FirstLoading && (FirstLoading = !1,
        SelectDate(1)),
        fFrame.leftFrame.document.getElementById("L_1").style.display = "none",
        checkOpenSport()
    } else
        nextShowMarket = e
}
function SelectDate(e) {
    for (var d = 0; d < arr_Date_map.length; d++)
        arr_Date_map[d] = !1,
        document.getElementById("DateSpanA" + d).style.color = "#003399";
    arr_Date_map[e] = !0,
    document.getElementById("DateSpanA" + e).style.color = "#9F0915",
    fFrame.leftFrame.SetMarketClass_SportRadar(e);
    var a = new Array
      , _ = new Array;
    null != g_OddsKeeper_L && (a = g_OddsKeeper_L.getOddsKeeperArray()),
    null != g_OddsKeeper_D && (_ = g_OddsKeeper_D.getOddsKeeperArray());
    for (var t in arr_ShowMixParlay) {
        if (arr_ShowMixParlay[t] && null != a[t]) {
            a[t].paintOddsTable()
        }
        if (arr_ShowMixParlay[t] && null != _[t]) {
            _[t].paintOddsTable()
        }
    }
    haveOutgight && g_OddsKeeper_Outright.paintOddsTable(),
    checkOpenSport(),
    EnBtn("btnRefresh_L"),
    EnBtn("btnRefresh_D")
}
function EnBtn(e) {
    $('a[name="' + e + '"]').each(function() {
        this.title = RES_REFRESH,
        this.className = "btnIcon right",
        this.firstChild.title = RES_REFRESH,
        this.disabled = !1
    })
}
function ShowMarketContent(e) {
    var d = "_D"
      , a = ""
      , _ = g_OddsKeeper_D;
    "l" == e && (d = "_L",
    a = "_L",
    _ = g_OddsKeeper_L);
    var t = "none";
    _.ShowHideSportContainer(),
    _.arr_SportsCount[0] > 0 && (t = "block"),
    document.getElementById("btnRefresh" + d).style.display = t,
    document.getElementById("OddsTr" + a).style.display = t
}
function SumSportCount(e, d) {
    d[0] = 0;
    for (var a in arr_ShowMixParlay)
        void 0 != d[a] && arr_ShowMixParlay[a]==!0 && "O" != a && (void 0 == e[a] && (e[a] = 0),
        e[a] += d[a],
        d[0] += d[a],
        e[0] += d[a]);
    return e
}
function paintsTable(e, d, a) {
    if (void 0 == d[e] || 0 == d[e] || !arr_ShowMixParlay[e])
        return a;
    if (void 0 != document.getElementById("Span" + e))
        return a;
    var _, t = $("#SportsContainer");
    null != t.html() && "" != t.html() || (_ = $("<li id='Span0'></li>"),
    $('<input name="chkSpotrs_All" id="chkSpotrs_All" onclick="JavaScript:SportLinkClickAll(false);" type="checkbox" value="0">').appendTo(_),
    $('<a href="JavaScript:SportLinkClickAll(true);">' + fFrame.RES_SPORTS[0] + " (" + d[0] + ")</a>").appendTo(_),
    _.appendTo(t),
    a++),
    _ = $("<li id='Span" + e + "'></li>");
    var s = $('<input name="chkSports" id="chkSports_' + e + '" onclick="JavaScript:SportLinkClick(\'' + e + '\',true);" type="checkbox" value="' + e + '">');
    return s.appendTo(_),
    "O" == e ? $("<a href=\"JavaScript:SportLinkClick('" + e + "',false);\">" + RES_OUTRIGHT + " (" + d[e] + ")</a>").appendTo(_) : $("<a href=\"JavaScript:SportLinkClick('" + e + "',false);\">" + fFrame.RES_SPORTS[e] + " (" + d[e] + ")</a>").appendTo(_),
    (void 0 == arr_ShowMixParlay_map[e] || arr_ShowMixParlay_map[e]) && (s.attr("checked", !0),
    arr_ShowMixParlay_map[e] = !0),
    _.appendTo(t),
    ++a
}
function cleartb() {
    document.getElementById("SportsContainer").innerHTML = "",
    mydiv = "",
    mytb = "",
    myrow = ""
}
function refreshAll() {
    refreshData_L(),
    refreshData_D()
}
function getMoreLabel(e) {
    return 0 == e ? "" : e
}
function getMoreLabel_1(e, d, a, _) {
    if (0 == e)
        if ("1" == fFrame.DisplayMode) {
            if ("" == d && "" == a || void 0 === d && void 0 === a)
                return ""
        } else if ("1F" == fFrame.DisplayMode) {
            if ("" == d || void 0 === d)
                return ""
        } else if ("1H" == fFrame.DisplayMode) {
            if ("" == a || void 0 === a)
                return ""
        } else if ("3" == fFrame.DisplayMode)
            return "";
    return '<span class="iconOdds more ' + _ + '" title="' + RES_MORE + '"></span>'
}
function getDrawHtml(e) {
    return e ? '<div class="HdpGoalClass">' + RES_DRAW + "</div>" : ""
}
function setSportsAll() {
    for (var e = !0, d = document.getElementsByName("chkSports"), a = 0; a < d.length; a++)
        if (!d[a].checked) {
            e = !1;
            break
        }
    void 0 != document.getElementById("chkSpotrs_All") && (document.getElementById("chkSpotrs_All").checked = e,
    arr_ShowMixParlay_map[0] = e)
}
function SportLinkClickAll(e) {
    var d = document.getElementById("chkSpotrs_All");
    e && (d.checked = !d.checked),
    arr_ShowMixParlay_map[0] = d.checked;
    for (var a = document.getElementsByName("chkSports"), _ = 0; _ < a.length; _++) {
        var t = a[_];
        t.checked = d.checked,
        arr_ShowMixParlay_map[_ + 1] = d.checked,
        null != g_OddsKeeper_D && showSport(t.value, d.checked, "oTableContainer_" + t.value),
        null != g_OddsKeeper_L && showSport(t.value, d.checked, "oTableContainer_" + t.value + "_L")
    }
    checkOpenSport()
}
function checkOpenSport() {
    var e = !0
      , d = !0;
    null != g_OddsKeeper_D && (d = checkMatch(g_OddsKeeper_D.getOddsKeeperArray(), "d")),
    d ? document.getElementById("btnRefresh_D").style.display = "none" : (document.getElementById("btnRefresh_D").style.display = "",
    document.getElementById("btnRefresh_D").style.display = ""),
    null != g_OddsKeeper_L && (e = checkMatch(g_OddsKeeper_L.getOddsKeeperArray(), "l")),
    document.getElementById("btnRefresh_L").style.display = e ? "none" : "";
    var a = e & d;
    document.getElementById("TrFilterInfo").style.display = a ? "block" : "none",
    a && (document.getElementById("TrNoInfo").style.display = "none")
}
function checkMatch(e, d) {
    var a = !0;
    for (var _ in arr_ShowMixParlay) {
        if ("d" == d) {
            if (void 0 == e[_] && "O" != _)
                continue;
            if ("O" != _)
                var t = e[_].TableContainer;
            else {
                if (null == g_OddsKeeper_Outright)
                    continue;
                t = g_OddsKeeper_Outright.TableContainer
            }
        } else {
            if (void 0 == e[_])
                continue;
            t = e[_].TableContainer
        }
        if (void 0 != t.childNodes[0]) {
            var s = 0;
            t.childNodes[0].tBodies.length > 0 && (s = t.childNodes[0].tBodies.length - 1),
            t.childNodes[0].tBodies[s].rows.length > 0 && arr_ShowMixParlay[_] && arr_ShowMixParlay_map[_] ? (t.style.display = "block",
            a = !1) : t.style.display = "none"
        } else
            t.style.display = "none"
    }
    return a
}
function refreshOddsPage(e, d, a) {
    if (null == parent.mainFrame.document)
        return !0;
    if (null == parent.mainFrame.document.body)
        return !0;
    var _ = parent.mainFrame.document.DataForm;
    if (null == _ && (_ = parent.mainFrame.document.DataForm_D),
    null == _)
        return !1;
    var t = _.Sport.value;
    if (null == t)
        return !1;
    if (t != d)
        return !1;
    var s = _.Market.value;
    if ("L" != e && "F" != e && "0" != d) {
        if (null == s)
            return !1;
        if (s.toLowerCase() != e.toLowerCase())
            return !1
    }
    if ("1" == d) {
        if ("F" == e && "Favorite" != parent.mainFrame.document.body.id)
            return !1;
        if ("E" == e || "T" == e) {
            if ("UnderOver" != parent.mainFrame.document.body.id)
                return !1;
            parent.mainFrame.document.getElementById("disstyle").value != a && "new" != a && (parent.mainFrame.initialDisstyle(a),
            parent.mainFrame.changeDisplayMode(a, fFrame.DomainName))
        }
    } else if ("0" == d)
        if ("L" == e) {
            if ("Live" != parent.mainFrame.document.body.id)
                return !1
        } else if ("OT" == e && "Outright" != parent.mainFrame.document.body.id)
            return !1;
    return "DataForm" == _.name ? (parent.mainFrame.refreshData(),
    !0) : "DataForm_D" == _.name && (parent.mainFrame.refreshAll(),
    !0)
}
function SportLinkClick(e, d) {
    document.getElementById("chkSpotrs_All").checked = !1;
    var a = document.getElementById("chkSports_" + e);
    d || (a.checked = !a.checked),
    setSportsAll();
    null != g_OddsKeeper_D && showSport(e, a.checked, "oTableContainer_" + e),
    null != g_OddsKeeper_L && showSport(e, a.checked, "oTableContainer_" + e + "_L"),
    checkOpenSport()
}
function showSport(e, d, a) {
    var _ = document.getElementById(a);
    return null == _ ? "none" : (arr_ShowMixParlay_map[e] = d,
    d ? _.childNodes[0].tBodies[0].rows.length > 0 && (_.style.display = "") : _.style.display = "none",
    _.style.display)
}
function getDateData() {
    document.getElementById("DateContainer").innerHTML = "";
    for (var e = document.getElementById("DateContainer"), d = 0; d < RES_DAY.length; d++)
        e = createCol(e, d),
        1 != d && (document.getElementById("DateSpanA" + d).innerHTML = RES_DAY[d])
}
function setDateAll() {
    for (var e = !0, d = document.getElementsByName("chkDate"), a = 0; a < d.length; a++)
        if (!d[a].checked) {
            e = !1;
            break
        }
    void 0 != document.getElementById("chkDate_All") && (document.getElementById("chkDate_All").checked = e,
    arr_ShowMixParlay_map[0] = e)
}
function createCol(e, d) {
    var a = document.createElement("li");
    e.appendChild(a),
    a.id = "DateSpan" + d;
    var _ = "";
    (_ = 0 == d ? $("<input name='chkDate_All' id='chkDate_All' type='checkbox' class='noborder'>")[0] : $("<input name='chkDate' id='chkDate_" + d + "' type='checkbox' class='noborder'>")[0]).setAttribute("onClick", "JavaScript:DateLinkClick(" + d + ",true);"),
    _.hidefocus = "",
    _.value = RES_DAY[d].substr(0, 2),
    a.appendChild(_);
    var t = document.createElement("a");
    a.appendChild(t),
    t.href = "JavaScript:DateLinkClick(" + d + ",false);";
    var s = document.createTextNode(RES_DAY[d]);
    return void 0 == arr_Date_map[d] ? IsMember ? (_.setAttribute("checked", !0),
    arr_Date_map[d] = !0) : "t" == PAGE_MARKET || "l" == PAGE_MARKET ? 1 == d ? (_.setAttribute("checked", !0),
    arr_Date_map[d] = !0) : arr_Date_map[d] = !1 : d > 1 ? (_.setAttribute("checked", !0),
    arr_Date_map[d] = !0) : arr_Date_map[d] = !1 : arr_Date_map[d] && _.setAttribute("checked", !0),
    t.appendChild(s),
    e
}
function DateLinkClick(e, d) {
    if (0 == e) {
        var a = document.getElementById("chkDate_All");
        d || (a.checked = !a.checked),
        arr_Date_map[0] = a.checked;
        for (var _ = 1; _ < arr_Date_map.length; _++) {
            document.getElementById("chkDate_" + _).checked = a.checked,
            arr_Date_map[_] = a.checked
        }
    } else {
        document.getElementById("chkDate_All").checked = !1,
        arr_Date_map[0] = !1;
        var t = document.getElementById("chkDate_" + e);
        d || (t.checked = !t.checked),
        setDateAll(),
        arr_Date_map[e] = t.checked
    }
    btnstop();
    var s = new Array
      , r = new Array;
    null != g_OddsKeeper_L && (s = g_OddsKeeper_L.getOddsKeeperArray()),
    null != g_OddsKeeper_D && (r = g_OddsKeeper_D.getOddsKeeperArray());
    for (var l in arr_ShowMixParlay) {
        if (arr_ShowMixParlay[l] && null != s[l]) {
            s[l].paintOddsTable()
        }
        if (arr_ShowMixParlay[l] && null != r[l]) {
            r[l].paintOddsTable()
        }
    }
    haveOutgight && g_OddsKeeper_Outright.paintOddsTable(),
    btnStartHandle = setTimeout("btnstart()", 3e3),
    checkOpenSport()
}
function ltrim(e) {
    return e.replace(/^\s*/, "")
}
function rtrim(e) {
    return e.replace(/\s*$/, "")
}
function trim(e) {
    return rtrim(ltrim(e))
}
function isFilterDate(e, d) {
    if (arr_Date_map[0])
        return !0;
    for (var a in arr_Date_map)
        if (arr_Date_map[a]) {
            var _ = document.getElementById("chkDate_" + a);
            if (parseInt(trim(_.value), 10) == parseInt(trim(e.KickoffTime.substr(6, 2)), 10))
                return !0;
            if (1 == a && d)
                return !0
        }
    return !1
}
function isFilterDate_O(e) {
    if (arr_Date_map[0])
        return !0;
    for (var d in arr_Date_map)
        if (arr_Date_map[d]) {
            var a = document.getElementById("chkDate_" + d);
            if (parseInt(trim(a.value), 10) == parseInt(trim(e.ShowTime.substr(3, 2)), 10))
                return !0
        }
    return !1
}
function returnSport() {
    if ("l" == PAGE_MARKET.toLowerCase())
        return fFrame.leftFrame.LiveSportsClickAll(!1),
        void fFrame.leftFrame.ReloadWaitingBetList("yes", "no", "1");
    var e = 1;
    for (var d in arr_ShowMixParlay)
        if (1 == arr_ShowMixParlay_map[d] && void 0 != document.getElementById("chkSports_" + d)) {
            e = d;
            break
        }
    "e" == PAGE_MARKET.toLowerCase() ? (fFrame.leftFrame.SwitchMarket("E"),
    fFrame.leftFrame.SwitchSport("E", parseInt(e, 10))) : (fFrame.leftFrame.SwitchMarket("T"),
    fFrame.leftFrame.SwitchSport("T", parseInt(e, 10))),
    fFrame.leftFrame.ReloadWaitingBetList("yes", "no", "1")
}
function CloseAllContainer(e) {
    for (var d = "l" == e ? "_L" : "", a = 1; a < 44; a++) {
        document.getElementById("oTableContainer_" + a + d).style.display = "none"
    }
    document.getElementById("oTableContainer_99" + d).style.display = "none",
    "l" != e && (document.getElementById("oTableContainer_O" + d).style.display = "none")
}
function SingleOddsClass() {
    function e(e, d, a, _) {
        for (var t = 0; t < e.length; t++) {
            for (var s = e[t][0], r = a[s]; r < d.length && d[r].MUID == s; )
                d[r].MoreCount = e[t][1],
                r++;
            _[s] = "updateAppend"
        }
    }
    function d(e, d, a, _) {
        for (var t = 0; t < e.length; t++) {
            for (var s = e[t][0], r = a[s]; r < d.length && d[r].MUID == s; )
                d[r].RedCardH = e[t][1],
                d[r].RedCardA = e[t][2],
                d[r].MoreCount = e[t][3],
                d[r].IsSuperLive = e[t][4],
                d[r].IsFastMarket = e[t][5],
                d[r].GVType = e[t][6],
                d[r].IsLiveChart = e[t][7],
                d[r].IsMainMarket = e[t][8],
                d[r].GameStatus = e[t][9],
                r++;
            _[s] = "updateAppend"
        }
    }
    function a(e, d, a) {
        var _ = e[d]
          , t = new Array;
        return t.FavLeagues = getFavLeaguesHtml(_.SportType, _.LeagueId, "1" == _.FavLeague, !1),
        t["ShowTime-iocn"] = "<span class='icon-sport43-" + _.OverTimeSession + "'></span>",
        _replaceTags(t, _formatTemplate(a, "{@", "}"))
    }
    function _(e, d) {
        for (var a, _ = 0; _ < e.length; _++)
            if ((a = e[_]).OddsId == d)
                return a;
        return null
    }
    function t(e, d) {
        if ("" != d.OddsId) {
            for (var a = !1, _ = 0; _ < e.length; _++)
                e[_].OddsId == d.OddsId && (a = !0,
                e[_] = d);
            a || (e[e.length] = d)
        }
    }
    function s(e, d, a, s) {
        var r = fFrame.document.getElementById("ESports_tmpl").contentWindow.document.getElementById("tmplExtend").innerHTML
          , l = fFrame.document.getElementById("ESports_tmpl").contentWindow.document.getElementById("tmplExtendHead").innerHTML
          , n = fFrame.document.getElementById("ESports_tmpl").contentWindow.document.getElementById("tmplExtendBettype").innerHTML
          , O = this.SportType
          , o = e[d]
          , i = new Array;
        i.HomeName = o.HomeName.replace('<span class="nameResult">', "").replace("</span>", ""),
        i.AwayName = o.AwayName.replace('<span class="nameResult">', "").replace("</span>", ""),
        i.HomeName_t = o.HomeName.replace('<span class="nameResult">', "").replace("</span>", ""),
        i.AwayName_t = o.AwayName.replace('<span class="nameResult">', "").replace("</span>", ""),
        i.Odds_1_H_Cls = getOddsClass(o.Odds_1_H),
        i.Odds_1_A_Cls = getOddsClass(o.Odds_1_A),
        i.Odds_3_O_Cls = getOddsClass(o.Odds_3_O),
        i.Odds_3_U_Cls = getOddsClass(o.Odds_3_U),
        i.Odds_2_O_Cls = getOddsClass(o.Odds_2_O),
        i.Odds_2_E_Cls = getOddsClass(o.Odds_2_E),
        i.Odds_20_H_Cls = getOddsClass(o.Odds_20_H),
        i.Odds_20_A_Cls = getOddsClass(o.Odds_20_A);
        var p = [];
        s ? void 0 !== OddsData43L && (p = OddsData43L) : void 0 !== OddsData43 && (p = OddsData43);
        var c = !1;
        i.Display_ExtendML = CLS_LS_OFF,
        i.MatchId = o.MatchId;
        var g = null
          , u = !1
          , D = "True" == o.IsStartingSoon;
        if (p.length > 0)
            for (var m = "", h = [], S = [], C = 0, L = 0; L < p.length; L++)
                if (p[L][0] == o.MatchId) {
                    "True" == p[L][49] && (u = !0),
                    "True" == p[L][3] && (D = !0),
                    c = !0,
                    C = parseInt(p[L][1]);
                    var y = 0;
                    s && (y = parseInt(p[L][2]) - 1 <= 0 ? 0 : parseInt(p[L][2]) - 1);
                    var E = C - y;
                    if (i.tableLength = E > 1 ? "100%" : "50%",
                    i.MapCount = E,
                    E > 0) {
                        for (var M = 0; M < E; M++) {
                            i.thCss = 0 == M || M % 2 == 0 ? "" : "even";
                            var f = ""
                              , w = parseInt(o.LivePeriod, 10);
                            w <= 0 && (w = 1),
                            f = (f = (f = l.replace(new RegExp("{@HeadCss}","g"), "{@HeadCss" + (M + w) + "}")).replace(new RegExp("{@thCss}","g"), i.thCss)).replace(new RegExp("{@MapName}","g"), getMapName(M + w)),
                            h.push(f);
                            var I = "";
                            I = (I = (I = (I = (I = (I = n.replace(new RegExp("{@OddsChanged}","g"), "{@Changed_D_90010" + (M + w) + "}")).replace(new RegExp("{@Odds_9001_H_Cls}","g"), "{@Odds_D_90010" + (M + w) + "_H_Cls}")).replace(new RegExp("{@Odds_9001_A_Cls}","g"), "{@Odds_D_90010" + (M + w) + "_A_Cls}")).replace(new RegExp("{@OddsId_9001}","g"), "{@OddsId_D_90010" + (M + w) + "}")).replace(new RegExp("{@Odds_9001_H}","g"), "{@Odds_D_90010" + (M + w) + "_H}")).replace(new RegExp("{@Odds_9001_A}","g"), "{@Odds_D_90010" + (M + w) + "_A}"),
                            S.push(I)
                        }
                        i.MatchId = p[L][0];
                        for (var v = (p[L].length - ExMatchFieldLenth) / ExOddsFieldLength, R = 0; R < v; R++) {
                            var H = R + 1
                              , x = getOddslocation(H);
                            i["OddsId_D_90010" + H] = p[L][x[0]],
                            i["Odds_D_90010" + H + "_H"] = p[L][x[1]],
                            i["Odds_D_90010" + H + "_A"] = p[L][x[2]],
                            i["Odds_D_90010" + H + "_H_Cls"] = getOddsClass(p[L][x[1]]),
                            i["Odds_D_90010" + H + "_A_Cls"] = getOddsClass(p[L][x[2]])
                        }
                        null != (g = _(s ? OddsDataLObj : OddsDataObj, i.OddsId_D_900101)) && g.OddsId == i.OddsId_D_900101 && (g.Odds_D_900101_H != i.Odds_D_900101_H || g.Odds_D_900101_A != i.Odds_D_900101_A ? i.Changed_D_900101 = CLS_UPD : i.Changed_D_900101 = "");
                        (T = new Object).OddsId = i.OddsId_D_900101,
                        T.Odds_D_900101_H = i.Odds_D_900101_H,
                        T.Odds_D_900101_A = i.Odds_D_900101_A,
                        t(s ? OddsDataLObj : OddsDataObj, T),
                        null != (g = _(s ? OddsDataLObj : OddsDataObj, i.OddsId_D_900102)) && g.OddsId == i.OddsId_D_900102 && (g.Odds_D_900102_H != i.Odds_D_900102_H || g.Odds_D_900102_A != i.Odds_D_900102_A ? i.Changed_D_900102 = CLS_UPD : i.Changed_D_900102 = "");
                        (T = new Object).OddsId = i.OddsId_D_900102,
                        T.Odds_D_900102_H = i.Odds_D_900102_H,
                        T.Odds_D_900102_A = i.Odds_D_900102_A,
                        t(s ? OddsDataLObj : OddsDataObj, T),
                        null != (g = _(s ? OddsDataLObj : OddsDataObj, i.OddsId_D_900103)) && g.OddsId == i.OddsId_D_900103 && (g.Odds_D_900103_H != i.Odds_D_900103_H || g.Odds_D_900103_A != i.Odds_D_900103_A ? i.Changed_D_900103 = CLS_UPD : i.Changed_D_900103 = "");
                        (T = new Object).OddsId = i.OddsId_D_900103,
                        T.Odds_D_900103_H = i.Odds_D_900103_H,
                        T.Odds_D_900103_A = i.Odds_D_900103_A,
                        t(s ? OddsDataLObj : OddsDataObj, T),
                        null != (g = _(s ? OddsDataLObj : OddsDataObj, i.OddsId_D_900104)) && g.OddsId == i.OddsId_D_900104 && (g.Odds_D_900104_H != i.Odds_D_900104_H || g.Odds_D_900104_A != i.Odds_D_900104_A ? i.Changed_D_900104 = CLS_UPD : i.Changed_D_900104 = "");
                        (T = new Object).OddsId = i.OddsId_D_900104,
                        T.Odds_D_900104_H = i.Odds_D_900104_H,
                        T.Odds_D_900104_A = i.Odds_D_900104_A,
                        t(s ? OddsDataLObj : OddsDataObj, T),
                        null != (g = _(s ? OddsDataLObj : OddsDataObj, i.OddsId_D_900105)) && g.OddsId == i.OddsId_D_900105 && (g.Odds_D_900105_H != i.Odds_D_900105_H || g.Odds_D_900105_A != i.Odds_D_900105_A ? i.Changed_D_900105 = CLS_UPD : i.Changed_D_900105 = "");
                        (T = new Object).OddsId = i.OddsId_D_900105,
                        T.Odds_D_900105_H = i.Odds_D_900105_H,
                        T.Odds_D_900105_A = i.Odds_D_900105_A,
                        t(s ? OddsDataLObj : OddsDataObj, T),
                        null != (g = _(s ? OddsDataLObj : OddsDataObj, i.OddsId_D_900106)) && g.OddsId == i.OddsId_D_900106 && (g.Odds_D_900106_H != i.Odds_D_900106_H || g.Odds_D_900106_A != i.Odds_D_900106_A ? i.Changed_D_900106 = CLS_UPD : i.Changed_D_900106 = "");
                        (T = new Object).OddsId = i.OddsId_D_900106,
                        T.Odds_D_900106_H = i.Odds_D_900106_H,
                        T.Odds_D_900106_A = i.Odds_D_900106_A,
                        t(s ? OddsDataLObj : OddsDataObj, T),
                        null != (g = _(s ? OddsDataLObj : OddsDataObj, i.OddsId_D_900107)) && g.OddsId == i.OddsId_D_900107 && (g.Odds_D_900107_H != i.Odds_D_900107_H || g.Odds_D_900107_A != i.Odds_D_900107_A ? i.Changed_D_900107 = CLS_UPD : i.Changed_D_900107 = "");
                        (T = new Object).OddsId = i.OddsId_D_900107,
                        T.Odds_D_900107_H = i.Odds_D_900107_H,
                        T.Odds_D_900107_A = i.Odds_D_900107_A,
                        t(s ? OddsDataLObj : OddsDataObj, T),
                        null != (g = _(s ? OddsDataLObj : OddsDataObj, i.OddsId_D_900108)) && g.OddsId == i.OddsId_D_900108 && (g.Odds_D_900108_H != i.Odds_D_900108_H || g.Odds_D_900108_A != i.Odds_D_900108_A ? i.Changed_D_900108 = CLS_UPD : i.Changed_D_900108 = "");
                        (T = new Object).OddsId = i.OddsId_D_900108,
                        T.Odds_D_900108_H = i.Odds_D_900108_H,
                        T.Odds_D_900108_A = i.Odds_D_900108_A,
                        t(s ? OddsDataLObj : OddsDataObj, T),
                        null != (g = _(s ? OddsDataLObj : OddsDataObj, i.OddsId_D_900109)) && g.OddsId == i.OddsId_D_900109 && (g.Odds_D_900109_H != i.Odds_D_900109_H || g.Odds_D_900109_A != i.Odds_D_900109_A ? i.Changed_D_900109 = CLS_UPD : i.Changed_D_900109 = "");
                        var T;
                        (T = new Object).OddsId = i.OddsId_D_900109,
                        T.Odds_D_900109_H = i.Odds_D_900109_H,
                        T.Odds_D_900109_A = i.Odds_D_900109_A,
                        t(s ? OddsDataLObj : OddsDataObj, T),
                        m = r.replace(new RegExp("\x3c!--ExtendHead--\x3e","g"), combinationExOddsHtml(h)).replace(new RegExp("\x3c!--ExtendBetType--\x3e","g"), combinationExOddsHtml(S))
                    }
                }
        if (s) {
            if (1 == D)
                i.ShowTime = RES_Odds_Live;
            else {
                i.ShowTime = RES_InPlay;
                for (var b = 1; b < 10; b++)
                    i["HeadCss" + b] = "";
                i["HeadCss" + o.LivePeriod] = "current"
            }
            o.LivePeriod > 1 || 1 == o.LivePeriod && 0 == D ? i.Inplay = "inPlayAccentBg" : i.Inplay = ""
        }
        1 == u && c ? (i.Display_ExtendML = CLS_LS_ON,
        i.rowspan = "2",
        a = a.replace("\x3c!--ExtendContent--\x3e", m)) : (i.rowspan = "1",
        a = a.replace("\x3c!--ExtendContent--\x3e", "")),
        void 0 === o.ChangeLeagueName && (o.LeagueName = fFrame.RES_SPORTS[O] + " / " + o.LeagueName,
        o.ChangeLeagueName = 1);
        var A = !1;
        switch (d == e.length - 1 ? A = !0 : e[d + 1].MUID != o.MUID && (A = !0),
        s ? (0 == o.LivePeriod ? i.LiveTimeCls = "1" == o.CsStatus ? "HalfTime" : "IsLive" : i.LiveTimeCls = "LiveTime",
        0 == o.Div ? (i.Tr_Cls = "live",
        i.BgColor = GetLiveBGColor(o.Div)) : (i.Tr_Cls = "liveligh",
        i.BgColor = GetLiveBGColor(o.Div))) : 0 == o.Div ? (i.Tr_Cls = TR_0,
        i.BgColor = GetEventBGColor(o.Div)) : (i.Tr_Cls = TR_1,
        i.BgColor = GetEventBGColor(o.Div)),
        o.FavorF) {
        case "h":
            i.Home_Cls = CLS_HDP_F,
            i.Away_Cls = CLS_HDP_N,
            i.Value_1_H = o.Value_1,
            i.Value_1_A = "";
            break;
        case "a":
            i.Home_Cls = CLS_HDP_N,
            i.Away_Cls = CLS_HDP_F,
            i.Value_1_H = "",
            i.Value_1_A = o.Value_1;
            break;
        default:
            i.Home_Cls = CLS_HDP_N,
            i.Away_Cls = CLS_HDP_N,
            "" != o.Odds_1_H ? i.Value_1_H = "0" : i.Value_1_H = "",
            i.Value_1_A = ""
        }
        return i.UNDER_3 = "" == o.Goal_3 ? "" : RES_UNDER,
        "" != o.Odds_2_O ? (i.ODD_2 = RES_ODD,
        i.EVEN_2 = RES_EVEN) : (i.ODD_2 = "",
        i.EVEN_2 = ""),
        "1" == o.TimerSuspend ? (i.TimeSuspendCls1 = CLS_LS_OFF,
        i.TimeSuspendCls = CLS_LS_ON) : (i.TimeSuspendCls1 = CLS_LS_ON,
        i.TimeSuspendCls = CLS_LS_OFF),
        0 != d && e[d - 1].MatchId == o.MatchId || (i.StatsInfo = "0" == o.StatsId ? "" : getStatsHtml(o.MatchId),
        i.SportRadarInfo = 0 == o.SportRadar ? "" : getRunningHtml(o.MatchId, s ? "IsLive" : "", o.StatsId, o.HomeName, o.AwayName, parseInt(document.DataForm_L.Sport.value, 10)),
        i.Streaming = getStreamingHtml(o.MatchId, o.StreamingId, s),
        i.Favorites = getFavoritesHtml(o.MUID, o.MatchCode, "1" == o.Favorite || "1" == o.FavLeague, s),
        i.FavLeagues = getFavLeaguesHtml(o.SportType, o.LeagueId, "1" == o.FavLeague, s),
        0 == u && (i.OddsId_900101 = i.OddsId_D_900101,
        i.Changed_900101 = i.Changed_D_900101,
        i.Odds_900101_H = i.Odds_D_900101_H,
        i.Odds_900101_A = i.Odds_D_900101_A,
        i.Odds_900101_H_Cls = i.Odds_D_900101_H_Cls,
        i.Odds_900101_A_Cls = i.Odds_D_900101_A_Cls,
        i.OddsId_900102 = i.OddsId_D_900102,
        i.Changed_900102 = i.Changed_D_900102,
        i.Odds_900102_H = i.Odds_D_900102_H,
        i.Odds_900102_A = i.Odds_D_900102_A,
        i.Odds_900102_H_Cls = i.Odds_D_900102_H_Cls,
        i.Odds_900102_A_Cls = i.Odds_D_900102_A_Cls,
        i.OddsId_900103 = i.OddsId_D_900103,
        i.Changed_900103 = i.Changed_D_900103,
        i.Odds_900103_H = i.Odds_D_900103_H,
        i.Odds_900103_A = i.Odds_D_900103_A,
        i.Odds_900103_H_Cls = i.Odds_D_900103_H_Cls,
        i.Odds_900103_A_Cls = i.Odds_D_900103_A_Cls)),
        i.isParlay = 0,
        i.Display_More = CLS_LS_OFF,
        i.More_Style = CLS_LS_OFF,
        A ? ("0" == o.MoreCount && (i.Display_More = CLS_LS_OFF),
        DisplayMoreHtml(parseInt(O, 10), o.MUID, i, "ESports_More"),
        i.More = void 0 !== o.MoreCount ? getMoreLabel(o.MoreCount, s) : "",
        "" != i.More ? (i.More_Style = "",
        i.Display_More == CLS_LS_ON && (i.More_Style = "off")) : (i.Display_More = CLS_LS_OFF,
        i.MoreData = "")) : i.Display_More = CLS_LS_OFF,
        a = _formatTemplate(a, "{@", "}"),
        a = _replaceTags(i, a)
    }
    function r(e, d, a, s) {
        var r = this.SportType
          , l = e[d];
        0 == d && "56" == r && function(e, d) {
            for (var a = 0, _ = [], t = 0; t < e.length; t++) {
                var s = e[t];
                "1" == s.MatchCount && (_[a] = new Array(s.MatchId,s.OddsId_20,s.Odds_20_H,s.Odds_20_A,"","",""),
                a++)
            }
            d ? L = _ : E = _
        }(e, s),
        void 0 === l.ChangeLeagueName && (l.LeagueName = fFrame.RES_SPORTS[r] + " / " + l.LeagueName,
        l.ChangeLeagueName = 1);
        var n = !1;
        if (d == e.length - 1 ? n = !0 : e[d + 1].MUID != l.MUID && (n = !0),
        !isFilterDate(l, s))
            return "";
        var O = new Array;
        M != l.MatchId && (f++,
        M = l.MatchId),
        trClass = f % 2 == 0 ? i : p,
        O.HomeName = l.HomeName.replace('<span class="nameResult">', "").replace("</span>", ""),
        O.AwayName = l.AwayName.replace('<span class="nameResult">', "").replace("</span>", ""),
        O.HomeName_t = l.HomeName.replace('<span class="nameResult">', "").replace("</span>", ""),
        O.AwayName_t = l.AwayName.replace('<span class="nameResult">', "").replace("</span>", ""),
        O.BgColor = s ? GetLiveBGColor(f % 2) : GetEventBGColor(f % 2),
        O.Tr_Cls = trClass,
        O.MoreTr_Cls = O.Tr_Cls,
        O.Odds_1_H = l.Odds_1_H,
        O.Odds_1_A = l.Odds_1_A,
        O.Odds_3_O = l.Odds_3_O,
        O.Odds_3_U = l.Odds_3_U,
        O.Odds_7_H = l.Odds_7_H,
        O.Odds_7_A = l.Odds_7_A,
        O.Odds_8_O = l.Odds_8_O,
        O.Odds_8_U = l.Odds_8_U,
        O.Odds_5_1_Cls = getOddsClass(l.Odds_5_1),
        O.Odds_5_X_Cls = getOddsClass(l.Odds_5_X),
        O.Odds_5_2_Cls = getOddsClass(l.Odds_5_2),
        O.Odds_1_H_Cls = O.Odds_1_H < 0 ? CLS_EVEN : CLS_ODD,
        O.Odds_1_A_Cls = O.Odds_1_A < 0 ? CLS_EVEN : CLS_ODD,
        O.Odds_2_O_Cls = getOddsClass(l.Odds_2_O),
        O.Odds_2_E_Cls = getOddsClass(l.Odds_2_E),
        O.Odds_3_O_Cls = O.Odds_3_O < 0 ? CLS_EVEN : CLS_ODD,
        O.Odds_3_U_Cls = O.Odds_3_U < 0 ? CLS_EVEN : CLS_ODD,
        O.Odds_7_H_Cls = O.Odds_7_H < 0 ? CLS_EVEN : CLS_ODD,
        O.Odds_7_A_Cls = O.Odds_7_A < 0 ? CLS_EVEN : CLS_ODD,
        O.Odds_8_O_Cls = O.Odds_8_O < 0 ? CLS_EVEN : CLS_ODD,
        O.Odds_8_U_Cls = O.Odds_8_U < 0 ? CLS_EVEN : CLS_ODD,
        O.Odds_12_O_Cls = getOddsClass(l.Odds_12_O),
        O.Odds_12_E_Cls = getOddsClass(l.Odds_12_E),
        O.Odds_20_H_Cls = getOddsClass(l.Odds_20_H),
        O.Odds_20_A_Cls = getOddsClass(l.Odds_20_A),
        O.Odds_21_H_Cls = getOddsClass(l.Odds_21_H),
        O.Odds_21_A_Cls = getOddsClass(l.Odds_21_A),
        O.Odds_501_H_Cls = getOddsClass(l.Odds_501_H),
        O.Odds_501_A_Cls = getOddsClass(l.Odds_501_A),
        O.Odds_153_H_Cls = getOddsClass(l.Odds_153_H),
        O.Odds_153_A_Cls = getOddsClass(l.Odds_153_A);
        var o = !0
          , c = !0;
        switch (void 0 === l.OddsId_5 ? o = !1 : "" == l.OddsId_5 && (o = !1),
        void 0 === l.OddsId_15 ? c = !1 : "" == l.OddsId_15 && (c = !1),
        O.Draw = getDrawHtml(o || c),
        O.InjuryTime = l.InjuryTime > "0" ? "+" + l.InjuryTime : "",
        0 == l.LivePeriod ? O.LiveTimeCls = "1" == l.CsStatus ? "HalfTime" : "IsLive" : O.LiveTimeCls = "LiveTime",
        l.FavorF) {
        case "h":
            O.Home_Cls = CLS_HDP_F,
            O.Away_Cls = CLS_HDP_N,
            O.Value_1_H = l.Value_1,
            O.Value_1_A = "";
            break;
        case "a":
            O.Home_Cls = CLS_HDP_N,
            O.Away_Cls = CLS_HDP_F,
            O.Value_1_H = "",
            O.Value_1_A = l.Value_1;
            break;
        default:
            O.Home_Cls = CLS_HDP_N,
            O.Away_Cls = CLS_HDP_N,
            "" != l.Odds_1_H ? O.Value_1_H = "0" : O.Value_1_H = "",
            O.Value_1_A = ""
        }
        switch (l.FavorH1) {
        case "h":
            O.Value_7_H = l.Value_7,
            O.Value_7_A = "";
            break;
        case "a":
            O.Value_7_H = "",
            O.Value_7_A = l.Value_7;
            break;
        default:
            "" != l.Odds_7_H ? O.Value_7_H = "0" : O.Value_7_H = "",
            O.Value_7_A = ""
        }
        if ("44" == l.SportType && (O.Home_Cls = CLS_HDP_F + " " + CLS_PLAY_RED,
        O.Away_Cls = CLS_HDP_N + " " + CLS_PLAY_BLUE,
        "" == l.ScoreH || "0" == l.ScoreH ? O.Round = "" : O.Round = RES_ROUND + " " + parseInt(l.ScoreH)),
        O.UNDER_3 = "" == l.Goal_3 ? "" : RES_UNDER,
        O.UNDER_8 = "" == l.Goal_8 ? "" : RES_UNDER,
        "" != l.Odds_2_O ? (O.ODD_2 = RES_ODD,
        O.EVEN_2 = RES_EVEN) : (O.ODD_2 = "",
        O.EVEN_2 = ""),
        "" != l.Odds_12_O ? (O.ODD_12 = RES_ODD,
        O.EVEN_12 = RES_EVEN) : (O.ODD_12 = "",
        O.EVEN_12 = ""),
        O.Value_153_H = "",
        O.Value_153_A = "",
        "" != l.OddsId_153)
            switch (l.FavorF_153) {
            case "h":
                O.Value_153_H = l.Value_153,
                O.Value_153_A = "";
                break;
            case "a":
                O.Value_153_H = "",
                O.Value_153_A = l.Value_153;
                break;
            default:
                "" != l.Odds_153_H ? O.Value_153_H = "0" : O.Value_153_H = "",
                O.Value_153_A = ""
            }
        if (O.isParlay = 0,
        "" != l.OddsId_501)
            switch (fFrame.userSite) {
            case "i":
                O.Odds_501_H = l.Odds_501_H,
                O.Odds_501_A = l.Odds_501_A;
                break;
            default:
                O.Odds_501_H = l.Odds_501_CS10,
                O.Odds_501_A = l.Odds_501_CS20
            }
        O.Odds_501_H_Cls = getOddsClass(O.Odds_501_H),
        O.Odds_501_A_Cls = getOddsClass(O.Odds_501_A);
        var g = !1;
        if ("5" == r) {
            if (s)
                DisplayMoreObj[l.MatchId] = CLS_LS_ON;
            else {
                aForm = document.DataForm_D,
                aFrame = DataFrame_D,
                aKeeper = g_OddsKeeper_D;
                (new Date(NowTime.substr(6, 4),NowTime.substr(0, 2) - 1,NowTime.substr(3, 2),NowTime.substr(11, 2),NowTime.substr(14, 2),NowTime.substr(17, 2)) - new Date(l.KickoffTime.substr(0, 4),l.KickoffTime.substr(4, 2) - 1,l.KickoffTime.substr(6, 2),l.KickoffTime.substr(8, 2),l.KickoffTime.substr(10, 2),0)) / 6e4 >= -120 ? (DisplayMoreObj[l.MatchId] = CLS_LS_ON,
                g = !1) : (void 0 === DisplayMoreObj[l.MatchId] && (DisplayMoreObj[l.MatchId] = CLS_LS_OFF),
                g = !0)
            }
            O.Display_More = DisplayMoreObj[l.MatchId]
        } else
            "43" == r ? (null != EsportsDisplayMoreObj[l.MatchId] && void 0 !== EsportsDisplayMoreObj[l.MatchId] || (EsportsDisplayMoreObj[l.MatchId] = "display"),
            g = !0,
            O.Display_More = EsportsDisplayMoreObj[l.MatchId]) : (O.Display_More = CLS_LS_OFF,
            O.More_Style = CLS_LS_OFF);
        if (O.SuperLive_Style = CLS_LS_OFF,
        O.FastMarket_Style = CLS_LS_OFF,
        n) {
            if ("1" == r) {
                if (DisplayMoreHtml(parseInt(r, 10), l.MUID, O, "1" == r ? "Soccer_More" : "Tennis_More"),
                O.More = s || 0 == l.MoreCount ? "" : l.MoreCount,
                "3" == fFrame.DisplayMode)
                    O.More = getMoreLabel(l.MoreCount),
                    "0" == l.MoreCount && (O.Display_More = CLS_LS_OFF);
                else {
                    for (var u = d, D = e[u]; D.MUID == l.MUID; ) {
                        if ((D = e[u]).MUID != l.MUID) {
                            D = e[u + 1];
                            break
                        }
                        if (0 == u) {
                            D = e[0];
                            break
                        }
                        u--
                    }
                    O.More = getMoreLabel_1(l.MoreCount, D.OddsId_5, D.OddsId_15, O.Display_More == CLS_LS_ON ? "off" : ""),
                    "1F" == fFrame.DisplayMode ? "0" == l.MoreCount && "" == D.OddsId_5 && (O.Display_More = CLS_LS_OFF) : "1H" == fFrame.DisplayMode && "0" == l.MoreCount && "" == D.OddsId_15 && (O.Display_More = CLS_LS_OFF)
                }
                "" != O.More && (O.More_Style = "",
                O.Display_More == CLS_LS_ON && (O.More_Style = "off")),
                fFrame.DisplayMode,
                "True" == l.IsSuperLive && fFrame.CanSeeSuperLive && (O.SuperLive_Style = CLS_LS_ON),
                "True" == l.IsFastMarket && (O.FastMarket_Style = CLS_LS_ON)
            } else if ("5" == r)
                if ("0" != l.MoreCount && "" != l.MoreCount) {
                    var m = "en_Point";
                    O.Display_More == CLS_LS_ON && (m = "en_Point off"),
                    O.More = g ? '<a href="#" onclick="SwitchMore(' + l.MatchId + "," + s + ',this);return false;" class="' + m + '"><span>' + l.MoreCount + "</span></a>" : "",
                    O.MoreData = function(e, d, a) {
                        var s, r = "";
                        s = d ? OddsDataL : OddsData;
                        for (var l = "", n = "", O = "", o = "", i = 0; i < s.length; i++)
                            if (s[i][0] == e.MatchId) {
                                "" != o && o == s[i][1] || ("" != o && (n += l.replace("\x3c!--MoreOdds--\x3e", r),
                                r = ""),
                                l = fFrame.document.getElementById("Tennis_tmpl").contentWindow.document.getElementById("TennisMoreEvent").innerHTML),
                                O = fFrame.document.getElementById("Tennis_tmpl").contentWindow.document.getElementById("MoreOdds").innerHTML;
                                var p = new Array;
                                if (p.MatchId = e.MatchId,
                                p.isParlay = 0,
                                p.HomeName = e.HomeName,
                                p.AwayName = e.AwayName,
                                p.HomeName_t = e.HomeName.replace('<span class="nameResult">', "").replace("</span>", ""),
                                p.AwayName_t = e.AwayName.replace('<span class="nameResult">', "").replace("</span>", ""),
                                p.Tr_Cls = a,
                                p.OddsId_154 = s[i][2],
                                "" != p.OddsId_154 && (p.Odds_154_h = s[i][3],
                                p.Odds_154_a = s[i][4],
                                p.Odds_154_H_Cls = getOddsClass(p.Odds_154_h),
                                p.Odds_154_A_Cls = getOddsClass(p.Odds_154_a)),
                                p.ResourceName_154 = s[i][5],
                                p.OddsId_155 = s[i][6],
                                "" != p.OddsId_155)
                                    switch (p.Value_155 = s[i][7],
                                    p.Odds_155_h = s[i][8],
                                    p.Odds_155_a = s[i][9],
                                    p.Odds_155_H_Cls = getOddsClass(p.Odds_155_h),
                                    p.Odds_155_A_Cls = getOddsClass(p.Odds_155_a),
                                    p.FavorF_155 = s[i][10],
                                    p.FavorF_155) {
                                    case "h":
                                        p.Home_155_Cls = CLS_HDP_F,
                                        p.Away_155_Cls = CLS_HDP_N,
                                        p.Value_H_155 = "-" + p.Value_155,
                                        p.Value_A_155 = "+" + p.Value_155;
                                        break;
                                    case "a":
                                        p.Home_155_Cls = CLS_HDP_N,
                                        p.Away_155_Cls = CLS_HDP_F,
                                        p.Value_H_155 = "+" + p.Value_155,
                                        p.Value_A_155 = "-" + p.Value_155;
                                        break;
                                    default:
                                        p.Home_155_Cls = CLS_HDP_N,
                                        p.Away_155_Cls = CLS_HDP_N,
                                        "" == p.Odds_155_h && "" == p.Odds_155_a ? (p.Value_H_155 = "",
                                        p.Value_A_155 = "") : (p.Value_H_155 = "0",
                                        p.Value_A_155 = "0")
                                    }
                                p.ResourceName_155 = s[i][11],
                                p.OddsId_156 = s[i][12],
                                "" != p.OddsId_156 && (p.Goal_156 = s[i][13],
                                p.Odds_156_o = s[i][14],
                                p.Odds_156_u = s[i][15],
                                p.Odds_156_O_Cls = getOddsClass(p.Odds_156_o),
                                p.Odds_156_U_Cls = getOddsClass(p.Odds_156_u)),
                                p.ResourceName_156 = s[i][16];
                                var c = null;
                                null != (c = _(d ? OddsDataLObj : OddsDataObj, p.OddsId_154)) && c.OddsId == p.OddsId_154 && (c.Odds_154_h != p.Odds_154_h || c.Odds_154_a != p.Odds_154_a ? p.Changed_154 = CLS_UPD : p.Changed_154 = ""),
                                null != (c = _(d ? OddsDataLObj : OddsDataObj, p.OddsId_155)) && c.OddsId == p.OddsId_155 && (c.Odds_155_h != p.Odds_155_h || c.Odds_155_a != p.Odds_155_a || c.Value_155 != p.Value_155 ? p.Changed_155 = CLS_UPD : p.Changed_155 = ""),
                                null != (c = _(d ? OddsDataLObj : OddsDataObj, p.OddsId_156)) && c.OddsId == p.OddsId_156 && (c.Odds_156_o != p.Odds_156_o || c.Odds_156_u != p.Odds_156_u || c.Goal_156 != p.Goal_156 ? p.Changed_156 = CLS_UPD : p.Changed_156 = ""),
                                l = _formatTemplate(l, "{@", "}"),
                                l = _replaceTags(p, l),
                                O = _formatTemplate(O, "{@", "}"),
                                O = _replaceTags(p, O),
                                o = s[i][1],
                                r += O,
                                (g = new Object).OddsId = s[i][2],
                                g.Odds_154_h = s[i][3],
                                g.Odds_154_a = s[i][4],
                                g.Odds_154_h = s[i][3],
                                g.Odds_154_a = s[i][4],
                                g.ResourceName_154 = s[i][5],
                                t(d ? OddsDataLObj : OddsDataObj, g),
                                (g = new Object).OddsId = s[i][6],
                                g.Value_155 = s[i][7],
                                g.Odds_155_h = s[i][8],
                                g.Odds_155_a = s[i][9],
                                g.FavorF_155 = s[i][10],
                                g.ResourceName_155 = s[i][11],
                                t(d ? OddsDataLObj : OddsDataObj, g);
                                var g;
                                (g = new Object).OddsId = s[i][12],
                                g.Goal_156 = s[i][13],
                                g.Odds_156_o = s[i][14],
                                g.Odds_156_u = s[i][15],
                                g.ResourceName_156 = s[i][16],
                                t(d ? OddsDataLObj : OddsDataObj, g)
                            }
                        return n += l.replace("\x3c!--MoreOdds--\x3e", r)
                    }(l, s, O.Tr_Cls)
                } else
                    O.Display_More = CLS_LS_OFF;
            else if ("43" == r)
                if ("0" != l.MoreCount && "" != l.MoreCount) {
                    O.Display_More = EsportsDisplayMoreObj[l.MatchId];
                    m = "en_Point";
                    "display" == O.Display_More && (m = "en_Point off"),
                    O.More = g ? '<a href="#" onclick="SwitchEsortsMore(' + l.MatchId + "," + s + ',this);return false;" class="' + m + '"><span>' + l.MoreCount + "</span></a>" : "",
                    O.MoreData = function(e, d, a) {
                        var s, r, l, n, O, o, i, p = new Array, c = new Array("11","12","13","14","15","16","17","18","19");
                        MoreTmpSpecialLeague[43] = new Array("",""),
                        MoreTmpSpecialEvent[43] = new Array("",""),
                        MoreOddsTable[43] = new Array("",""),
                        d ? (s = ajaxMainMatchDataL,
                        r = ajaxLeagueListL,
                        l = ajaxTeamListL,
                        n = ajaxDisplayCatDataL,
                        O = MatchIndexL,
                        o = MatchInfoL,
                        i = OddsData43L) : (s = ajaxMainMatchData,
                        r = ajaxLeagueList,
                        l = ajaxTeamList,
                        n = ajaxDisplayCatData,
                        O = MatchIndex,
                        o = MatchInfo,
                        i = OddsData43);
                        var g = ""
                          , u = ""
                          , D = "";
                        if (null != s[e] && void 0 !== s[e]) {
                            if (s[e].length > 0) {
                                "" != MoreTmplCategory[43] && void 0 !== MoreTmplCategory[43] || (MoreTmplCategory[43] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("Category_43").innerHTML),
                                d ? ("" != MoreTmpSpecialLeague[43][0] && void 0 !== MoreTmpSpecialLeague[43][0] || (MoreTmpSpecialLeague[43][0] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreSpecialLeague43_L").innerHTML),
                                "" != MoreTmpSpecialEvent[43][0] && void 0 !== MoreTmpSpecialEvent[43][0] || (MoreTmpSpecialEvent[43][0] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreSpecialEvent43_FL").innerHTML),
                                "" != MoreOddsTable[43][0] && void 0 !== MoreOddsTable[43][0] || (MoreOddsTable[43][0] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("SpecialOdds43_FL").innerHTML)) : ("" != MoreTmpSpecialLeague[43][1] && void 0 !== MoreTmpSpecialLeague[43][1] || (MoreTmpSpecialLeague[43][1] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreSpecialLeague43_D").innerHTML),
                                "" != MoreTmpSpecialEvent[43][1] && void 0 !== MoreTmpSpecialEvent[43][1] || (MoreTmpSpecialEvent[43][1] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreSpecialEvent43_FD").innerHTML),
                                "" != MoreOddsTable[43][1] && void 0 !== MoreOddsTable[43][1] || (MoreOddsTable[43][1] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("SpecialOdds43_FD").innerHTML));
                                var m = MoreTmplCategory[43];
                                m = (m = (m = m.replace(new RegExp("{@matchid}","g"), e)).replace(new RegExp("{@IsLive}","g"), d)).replace(new RegExp("{@Tr_Cls}","g"), a);
                                for (var h = 0; h < c.length; h++)
                                    void 0 !== n[e + "C" + c[h]] && p.push(c[h]),
                                    MatchCategoryList[e] = p;
                                for (h = 0; h < c.length; h++)
                                    m = void 0 !== n[e + "C" + c[h]] && n[e + "C" + c[h]].length > 0 ? m.replace(new RegExp("{@category_disp" + c[h] + "}","g"), CLS_LS_ON) : m.replace(new RegExp("{@category_disp" + c[h] + "}","g"), CLS_LS_OFF);
                                m = EsportCategoryList.length > 0 && void 0 !== EsportCategoryList[e] && void 0 !== n[e + "C" + EsportCategoryList[e]] ? SetDefaultCategory(MatchCategoryList[e], m, EsportCategoryList[e]) : SetDefaultCategory(MatchCategoryList[e], m, null);
                                var S, C, L, y;
                                d ? (g = MoreTmpSpecialLeague[43][0],
                                C = MoreTmpSpecialEvent[43][0],
                                L = "\x3c!--moreSpecialEvent43_FL--\x3e",
                                SpecialOddsTag = "\x3c!--SpecialOdds_FL--\x3e",
                                y = MoreOddsTable[43][0]) : (g = MoreTmpSpecialLeague[43][1],
                                C = MoreTmpSpecialEvent[43][1],
                                L = "\x3c!--moreSpecialEvent43_FD--\x3e",
                                SpecialOddsTag = "\x3c!--SpecialOdds_FD--\x3e",
                                y = MoreOddsTable[43][1]);
                                var E = g.replace(new RegExp(L,"g"), C);
                                if (MatchCategoryList[e].length > 0) {
                                    void 0 !== EsportCategoryList[e] && MatchCategoryList[e].indexOf(EsportCategoryList[e].toString()) > -1 ? S = EsportCategoryList[e] : (S = MatchCategoryList[e][0],
                                    EsportCategoryList[e] = "");
                                    var M = e + "C" + S;
                                    if (void 0 !== n[M])
                                        for (var f = 0; f < n[M].length; f++) {
                                            var w = "";
                                            u += E.replace(new RegExp("LeagueName","g"), r[n[M][f]]);
                                            for (var I = O[n[M][f]], v = 0; v < I.length; v++)
                                                if (s[e].indexOf(I[v]) > -1)
                                                    for (var R = o[I[v]], H = 0; H < parseInt(i[0]); H++)
                                                        if (null != getMatchRowKey(o, I[v], H)) {
                                                            var x = l[R[1]] + R[3];
                                                            w += y.replace(new RegExp("{@HomeName}","g"), x).replace(new RegExp("{@AwayName}","g"), l[R[2]]);
                                                            var T = getMatchRowKey(o, I[v], H)
                                                              , b = getBettypeArr(T, i);
                                                            for (var A in T) {
                                                                var F = new Array;
                                                                if (F.MatchId = i[T[A]][0],
                                                                F.isParlay = 0,
                                                                w = w.replace(new RegExp("{@MatchId}","g"), F.MatchId),
                                                                w = w.replace(new RegExp("{@isParlay}","g"), F.isParlay),
                                                                w = w.replace(new RegExp("{@Tr_Cls}","g"), a),
                                                                0 == b[0] && (w = (w = (w = (w = (w = (w = (w = (w = (w = (w = w.replace(new RegExp("{@Home_Cls}","g"), CLS_HDP_N)).replace(new RegExp("{@Away_Cls}","g"), CLS_HDP_N)).replace(new RegExp("{@OddsId_1}","g"), "")).replace(new RegExp("{@Odds_1_H_Cls}","g"), "")).replace(new RegExp("{@Odds_1_A_Cls}","g"), "")).replace(new RegExp("{@Value_1_H}","g"), "")).replace(new RegExp("{@Value_1_A}","g"), "")).replace(new RegExp("{@Odds_1_H}","g"), "")).replace(new RegExp("{@Odds_1_A}","g"), "")).replace(new RegExp("{@Changed_1}","g"), "")),
                                                                0 == b[1] && (w = (w = (w = (w = (w = (w = (w = w.replace(new RegExp("{@OddsId_2}","g"), "")).replace(new RegExp("{@Odds_2_O}","g"), "")).replace(new RegExp("{@Odds_2_E}","g"), "")).replace(new RegExp("{@disp_2}","g"), CLS_LS_OFF)).replace(new RegExp("{@Odds_2_O_Cls}","g"), "")).replace(new RegExp("{@Odds_2_E_Cls}","g"), "")).replace(new RegExp("{@Changed_2}","g"), "")),
                                                                0 == b[2] && (w = (w = (w = (w = (w = (w = (w = (w = w.replace(new RegExp("{@Goal_3}","g"), "")).replace(new RegExp("{@UNDER_3}","g"), "")).replace(new RegExp("{@OddsId_3}","g"), "")).replace(new RegExp("{@Odds_3_O}","g"), "")).replace(new RegExp("{@Odds_3_U}","g"), "")).replace(new RegExp("{@Odds_3_O_Cls}","g"), "")).replace(new RegExp("{@Odds_3_U_Cls}","g"), "")).replace(new RegExp("{@Changed_3}","g"), "")),
                                                                0 == b[3] && (w = (w = (w = (w = (w = (w = w.replace(new RegExp("{@OddsId_20}","g"), "")).replace(new RegExp("{@Odds_20_H}","g"), "")).replace(new RegExp("{@Odds_20_A}","g"), "")).replace(new RegExp("{@Odds_20_H_Cls}","g"), "")).replace(new RegExp("{@Odds_20_A_Cls}","g"), "")).replace(new RegExp("{@Changed_20}","g"), "")),
                                                                "1" == i[T[A]][3])
                                                                    if (1 == b[0]) {
                                                                        switch (F.OddsId_1 = i[T[A]][1],
                                                                        F.Odds_1_H = i[T[A]][6],
                                                                        F.Odds_1_A = i[T[A]][7],
                                                                        F.Odds_1_H_Cls = getOddsClass(F.Odds_1_H),
                                                                        F.Odds_1_A_Cls = getOddsClass(F.Odds_1_A),
                                                                        i[T[A]][8]) {
                                                                        case "h":
                                                                            F.Home_Cls = CLS_HDP_F,
                                                                            F.Away_Cls = CLS_HDP_N,
                                                                            F.Value_1_H = i[T[A]][5],
                                                                            F.Value_1_A = "";
                                                                            break;
                                                                        case "a":
                                                                            F.Home_Cls = CLS_HDP_N,
                                                                            F.Away_Cls = CLS_HDP_F,
                                                                            F.Value_1_H = "",
                                                                            F.Value_1_A = i[T[A]][5];
                                                                            break;
                                                                        default:
                                                                            F.Home_Cls = CLS_HDP_N,
                                                                            F.Away_Cls = CLS_HDP_N,
                                                                            "" != i[T[A]][6] ? F.Value_1_H = "0" : F.Value_1_H = "",
                                                                            F.Value_1_A = ""
                                                                        }
                                                                        var P = null;
                                                                        null != (P = _(d ? OddsDataLObj : OddsDataObj, F.OddsId_1)) && P.OddsId == F.OddsId_1 && (P.Odds_1_H != F.Odds_1_H || P.Odds_1_A != F.Odds_1_A ? F.Changed_1 = CLS_UPD : F.Changed_1 = ""),
                                                                        w = (w = (w = (w = (w = (w = (w = (w = (w = (w = w.replace(new RegExp("{@Home_Cls}","g"), F.Home_Cls)).replace(new RegExp("{@Away_Cls}","g"), F.Away_Cls)).replace(new RegExp("{@OddsId_1}","g"), F.OddsId_1)).replace(new RegExp("{@Odds_1_H_Cls}","g"), F.Odds_1_H_Cls)).replace(new RegExp("{@Odds_1_A_Cls}","g"), F.Odds_1_A_Cls)).replace(new RegExp("{@Value_1_H}","g"), F.Value_1_H)).replace(new RegExp("{@Value_1_A}","g"), F.Value_1_A)).replace(new RegExp("{@Odds_1_H}","g"), F.Odds_1_H)).replace(new RegExp("{@Odds_1_A}","g"), F.Odds_1_A)).replace(new RegExp("{@Changed_1}","g"), F.Changed_1),
                                                                        (N = new Object).OddsId = i[T[A]][1],
                                                                        N.Value_1 = i[T[A]][5],
                                                                        N.Odds_1_H = i[T[A]][6],
                                                                        N.Odds_1_A = i[T[A]][7],
                                                                        N.FavorF_1 = i[T[A]][8],
                                                                        t(d ? OddsDataLObj : OddsDataObj, N)
                                                                    } else
                                                                        w = (w = (w = (w = (w = (w = (w = (w = (w = (w = w.replace(new RegExp("{@Home_Cls}","g"), CLS_HDP_N)).replace(new RegExp("{@Away_Cls}","g"), CLS_HDP_N)).replace(new RegExp("{@OddsId_1}","g"), "")).replace(new RegExp("{@Odds_1_H_Cls}","g"), "")).replace(new RegExp("{@Odds_1_A_Cls}","g"), "")).replace(new RegExp("{@Value_1_H}","g"), "")).replace(new RegExp("{@Value_1_A}","g"), "")).replace(new RegExp("{@Odds_1_H}","g"), "")).replace(new RegExp("{@Odds_1_A}","g"), "")).replace(new RegExp("{@Changed_1}","g"), "");
                                                                if ("2" == i[T[A]][3] && (1 == b[1] ? (F.OddsId_2 = i[T[A]][1],
                                                                F.Odds_2_O = i[T[A]][5],
                                                                F.Odds_2_E = i[T[A]][6],
                                                                F.Odds_2_O_Cls = getOddsClass(F.Odds_2_O),
                                                                F.Odds_2_E_Cls = getOddsClass(F.Odds_2_E),
                                                                "" == F.Odds_2_O && "" == F.Odds_2_E ? F.disp_2 = CLS_LS_OFF : F.disp_2 = CLS_LS_ON,
                                                                P = null,
                                                                null != (P = _(d ? OddsDataLObj : OddsDataObj, F.OddsId_2)) && P.OddsId == F.OddsId_2 && (P.Odds_2_O != F.Odds_2_O || P.Odds_2_E != F.Odds_2_E ? F.Changed_2 = CLS_UPD : F.Changed_2 = ""),
                                                                w = (w = (w = (w = (w = (w = (w = w.replace(new RegExp("{@OddsId_2}","g"), F.OddsId_2)).replace(new RegExp("{@Odds_2_O}","g"), F.Odds_2_O)).replace(new RegExp("{@Odds_2_E}","g"), F.Odds_2_E)).replace(new RegExp("{@disp_2}","g"), F.disp_2)).replace(new RegExp("{@Odds_2_O_Cls}","g"), F.Odds_2_O_Cls)).replace(new RegExp("{@Odds_2_E_Cls}","g"), F.Odds_2_E_Cls)).replace(new RegExp("{@Changed_2}","g"), F.Changed_2),
                                                                (N = new Object).OddsId = i[T[A]][1],
                                                                N.Odds_2_O = i[T[A]][5],
                                                                N.Odds_2_E = i[T[A]][6],
                                                                t(d ? OddsDataLObj : OddsDataObj, N)) : w = (w = (w = (w = (w = (w = (w = w.replace(new RegExp("{@OddsId_2}","g"), "")).replace(new RegExp("{@Odds_2_O}","g"), "")).replace(new RegExp("{@Odds_2_E}","g"), "")).replace(new RegExp("{@disp_2}","g"), CLS_LS_OFF)).replace(new RegExp("{@Odds_2_O_Cls}","g"), "")).replace(new RegExp("{@Odds_2_E_Cls}","g"), "")).replace(new RegExp("{@Changed_2}","g"), "")),
                                                                "3" == i[T[A]][3] && (1 == b[2] ? (F.Goal_3 = i[T[A]][5],
                                                                F.UNDER_3 = "" == F.Goal_3 ? "" : RES_UNDER,
                                                                F.OddsId_3 = i[T[A]][1],
                                                                F.Odds_3_O = i[T[A]][6],
                                                                F.Odds_3_U = i[T[A]][7],
                                                                F.Odds_3_O_Cls = getOddsClass(F.Odds_3_O),
                                                                F.Odds_3_U_Cls = getOddsClass(F.Odds_3_U),
                                                                P = null,
                                                                null != (P = _(d ? OddsDataLObj : OddsDataObj, F.OddsId_3)) && P.OddsId == F.OddsId_3 && (P.Odds_3_O != F.Odds_3_O || P.Odds_3_U != F.Odds_3_U ? F.Changed_3 = CLS_UPD : F.Changed_3 = ""),
                                                                w = (w = (w = (w = (w = (w = (w = (w = w.replace(new RegExp("{@Goal_3}","g"), F.Goal_3)).replace(new RegExp("{@UNDER_3}","g"), F.UNDER_3)).replace(new RegExp("{@OddsId_3}","g"), F.OddsId_3)).replace(new RegExp("{@Odds_3_O}","g"), F.Odds_3_O)).replace(new RegExp("{@Odds_3_U}","g"), F.Odds_3_U)).replace(new RegExp("{@Odds_3_O_Cls}","g"), F.Odds_3_O_Cls)).replace(new RegExp("{@Odds_3_U_Cls}","g"), F.Odds_3_U_Cls)).replace(new RegExp("{@Changed_3}","g"), F.Changed_3),
                                                                (N = new Object).OddsId = i[T[A]][1],
                                                                N.Goal_3 = i[T[A]][5],
                                                                N.Odds_3_O = i[T[A]][6],
                                                                N.Odds_3_U = i[T[A]][7],
                                                                t(d ? OddsDataLObj : OddsDataObj, N)) : w = (w = (w = (w = (w = (w = (w = (w = w.replace(new RegExp("{@Goal_3}","g"), "")).replace(new RegExp("{@UNDER_3}","g"), "")).replace(new RegExp("{@OddsId_3}","g"), "")).replace(new RegExp("{@Odds_3_O}","g"), "")).replace(new RegExp("{@Odds_3_U}","g"), "")).replace(new RegExp("{@Odds_3_O_Cls}","g"), "")).replace(new RegExp("{@Odds_3_U_Cls}","g"), "")).replace(new RegExp("{@Changed_3}","g"), "")),
                                                                "20" == i[T[A]][3])
                                                                    if (1 == b[3]) {
                                                                        F.OddsId_20 = i[T[A]][1],
                                                                        F.Odds_20_H = i[T[A]][5],
                                                                        F.Odds_20_A = i[T[A]][6],
                                                                        F.Odds_20_H_Cls = getOddsClass(F.Odds_20_H),
                                                                        F.Odds_20_A_Cls = getOddsClass(F.Odds_20_A),
                                                                        P = null,
                                                                        null != (P = _(d ? OddsDataLObj : OddsDataObj, F.OddsId_20)) && P.OddsId == F.OddsId_20 && (P.Odds_20_H != F.Odds_20_H || P.Odds_20_A != F.Odds_20_A ? F.Changed_20 = CLS_UPD : F.Changed_20 = ""),
                                                                        w = (w = (w = (w = (w = (w = w.replace(new RegExp("{@OddsId_20}","g"), F.OddsId_20)).replace(new RegExp("{@Odds_20_H}","g"), F.Odds_20_H)).replace(new RegExp("{@Odds_20_A}","g"), F.Odds_20_A)).replace(new RegExp("{@Odds_20_H_Cls}","g"), F.Odds_20_H_Cls)).replace(new RegExp("{@Odds_20_A_Cls}","g"), F.Odds_20_A_Cls)).replace(new RegExp("{@Changed_20}","g"), F.Changed_20);
                                                                        var N;
                                                                        (N = new Object).OddsId = i[T[A]][1],
                                                                        N.Odds_20_H = i[T[A]][5],
                                                                        N.Odds_20_A = i[T[A]][6],
                                                                        t(d ? OddsDataLObj : OddsDataObj, N)
                                                                    } else
                                                                        w = (w = (w = (w = (w = (w = w.replace(new RegExp("{@OddsId_20}","g"), "")).replace(new RegExp("{@Odds_20_H}","g"), "")).replace(new RegExp("{@Odds_20_A}","g"), "")).replace(new RegExp("{@Odds_20_H_Cls}","g"), "")).replace(new RegExp("{@Odds_20_A_Cls}","g"), "")).replace(new RegExp("{@Changed_20}","g"), "")
                                                            }
                                                        }
                                            u = u.replace(new RegExp(SpecialOddsTag,"g"), w)
                                        }
                                }
                            }
                            return D += m.replace(new RegExp("{@OddsHTML}","g"), u)
                        }
                    }(l.MatchId, s, O.Tr_Cls)
                } else
                    O.Display_More = CLS_LS_OFF;
            else if ("2" == r || "56" == r) {
                var h = ""
                  , S = []
                  , w = [];
                "2" == r ? s ? ("undefined" != typeof OddsData21L && (S = OddsData21L),
                "undefined" != typeof OddsData2L && (w = OddsData2L)) : ("undefined" != typeof OddsData21 && (S = OddsData21),
                "undefined" != typeof OddsData2 && (w = OddsData2)) : s ? (void 0 !== L && (S = L),
                void 0 !== C && (w = C)) : (void 0 !== E && (S = E),
                void 0 !== y && (w = y)),
                O.Display_Extend = CLS_LS_OFF,
                O.Display_ExtendML = CLS_LS_OFF,
                O.MatchId = l.MatchId;
                var I = null;
                if (n) {
                    if (S.length > 0)
                        for (var v = 0; v < S.length; v++)
                            if (S[v][0] == l.MatchId) {
                                O.Display_Extend = CLS_LS_ON,
                                O.Display_ExtendML = CLS_LS_ON,
                                O.OddsId_20 = S[v][1],
                                O.Odds_20_H = S[v][2],
                                O.Odds_20_A = S[v][3],
                                O.Odds_20_H_Cls = getOddsClass(S[v][2]),
                                O.Odds_20_A_Cls = getOddsClass(S[v][3]),
                                O.OddsId_21 = S[v][4],
                                O.Odds_21_H = S[v][5],
                                O.Odds_21_A = S[v][6],
                                O.Odds_21_H_Cls = getOddsClass(S[v][5]),
                                O.Odds_21_A_Cls = getOddsClass(S[v][6]),
                                null != (I = _(s ? OddsDataLObj : OddsDataObj, O.OddsId_20)) && I.OddsId == O.OddsId_20 && (I.Odds_20_h != O.Odds_20_H || I.Odds_20_a != O.Odds_20_A ? O.Changed_20 = CLS_UPD : O.Changed_20 = ""),
                                null != (I = _(s ? OddsDataLObj : OddsDataObj, O.OddsId_21)) && I.OddsId == O.OddsId_21 && (I.Odds_21_h != O.Odds_21_H || I.Odds_21_a != O.Odds_21_A ? O.Changed_21 = CLS_UPD : O.Changed_21 = "");
                                (N = new Object).OddsId = O.OddsId_20,
                                N.Odds_20_h = O.Odds_20_H,
                                N.Odds_20_a = O.Odds_20_A,
                                t(s ? OddsDataLObj : OddsDataObj, N);
                                (N = new Object).OddsId = O.OddsId_21,
                                N.Odds_21_h = O.Odds_21_H,
                                N.Odds_21_a = O.Odds_21_A,
                                t(s ? OddsDataLObj : OddsDataObj, N)
                            }
                    if (w.length > 0) {
                        var R = ""
                          , H = checkQuarterByMatch(w, l.MatchId)
                          , x = []
                          , T = [];
                        if (H.length > 0) {
                            O.Display_Extend = CLS_LS_ON;
                            for (var b = 0; b < H.length; b++) {
                                switch (x.push(fFrame.document.getElementById("NBA_tmpl").contentWindow.document.getElementById("BasketballExtendBettype").innerHTML),
                                H[b].replace("0", "")) {
                                default:
                                case "1":
                                    O.QuarterTitle = RES_1StQuarterTitle;
                                    break;
                                case "2":
                                    O.QuarterTitle = RES_2ndQuarterTitle;
                                    break;
                                case "3":
                                    O.QuarterTitle = RES_3rdQuarterTitle;
                                    break;
                                case "4":
                                    O.QuarterTitle = RES_4thQuarterTitle
                                }
                                O.QTRHDP_hint = RES_QTRHDP_hint.replace("[X]", H[b].replace("0", "")),
                                O.QTROU_hint = RES_QTROU_hint.replace("[X]", H[b].replace("0", "")),
                                O.QTROE_hint = RES_QTROE_hint.replace("[X]", H[b].replace("0", "")),
                                O.Qid = H[b].replace("0", "");
                                var A = ""
                                  , F = getDataByQuarter(w, l.MatchId, H[b]);
                                if (1 == F.length)
                                    A = (A = fFrame.document.getElementById("NBA_tmpl").contentWindow.document.getElementById("MatchRow").innerHTML.replace("<tbody>", "").replace("</tbody>", "")).replace(new RegExp("{@","g"), "{@0"),
                                    T.push(A);
                                else {
                                    for (var P = 0; P < F.length; P++)
                                        R += (A = fFrame.document.getElementById("NBA_tmpl").contentWindow.document.getElementById("MatchRow").innerHTML.replace("<tbody>", "").replace("</tbody>", "")).replace(new RegExp("{@","g"), "{@" + P);
                                    T.push(R),
                                    R = ""
                                }
                                for (P = 0; P < F.length; P++) {
                                    switch (O[P + "Tr_Cls"] = trClass,
                                    O[P + "BgColor"] = s ? GetLiveBGColor(f % 2) : GetEventBGColor(f % 2),
                                    O[P + "isParlay"] = "0",
                                    O[P + "MatchId"] = l.MatchId,
                                    O[P + "OddsId_609"] = F[P][2],
                                    O[P + "Odds_609_H_Cls"] = getOddsClass(F[P][4]),
                                    O[P + "Odds_609_A_Cls"] = getOddsClass(F[P][5]),
                                    F[P][6]) {
                                    case "h":
                                        O[P + "Value_609_H"] = F[P][3],
                                        O[P + "Value_609_A"] = "";
                                        break;
                                    case "a":
                                        O[P + "Value_609_H"] = "",
                                        O[P + "Value_609_A"] = F[P][3];
                                        break;
                                    default:
                                        "" != F[P][4] ? O[P + "Value_609_H"] = "0" : O[P + "Value_609_H"] = "",
                                        O[P + "Value_609_A"] = ""
                                    }
                                    O[P + "Odds_609_H"] = F[P][4],
                                    O[P + "Odds_609_A"] = F[P][5],
                                    O[P + "OddsId_610"] = F[P][7],
                                    O[P + "Odds_610_O_Cls"] = getOddsClass(F[P][9]),
                                    O[P + "Odds_610_U_Cls"] = getOddsClass(F[P][10]),
                                    O[P + "Goal_610"] = F[P][8],
                                    O[P + "UNDER_610"] = "" == F[P][8] ? "" : RES_UNDER,
                                    O[P + "Odds_610_O"] = F[P][9],
                                    O[P + "Odds_610_U"] = F[P][10],
                                    O[P + "OddsId_611"] = F[P][11],
                                    O[P + "Odds_611_O_Cls"] = getOddsClass(F[P][12]),
                                    O[P + "Odds_611_E_Cls"] = getOddsClass(F[P][13]),
                                    "" != F[P][12] ? (O[P + "ODD_611"] = RES_ODD,
                                    O[P + "EVEN_611"] = RES_EVEN) : (O[P + "ODD_611"] = "",
                                    O[P + "EVEN_611"] = ""),
                                    O[P + "Odds_611_O"] = F[P][12],
                                    O[P + "Odds_611_E"] = F[P][13],
                                    null != (I = _(s ? OddsDataLObj : OddsDataObj, O[P + "OddsId_609"])) && I.OddsId == O[P + "OddsId_609"] && (I.Odds_609_h != O[P + "Odds_609_H"] || I.Odds_609_a != O[P + "Odds_609_A"] || I.Value_609_h != O[P + "Value_609_H"] || I.Value_609_a != O[P + "Value_609_A"] ? O[P + "Changed_609"] = CLS_UPD : O[P + "Changed_609"] = ""),
                                    null != (I = _(s ? OddsDataLObj : OddsDataObj, O[P + "OddsId_610"])) && I.OddsId == O[P + "OddsId_610"] && (I.Odds_610_o != O[P + "Odds_610_O"] || I.Odds_610_u != O[P + "Odds_610_U"] || I.Goal_610 != O[P + "Goal_610"] || I.UNDER_610 != O[P + "UNDER_610"] ? O[P + "Changed_610"] = CLS_UPD : O[P + "Changed_610"] = ""),
                                    null != (I = _(s ? OddsDataLObj : OddsDataObj, O[P + "OddsId_611"])) && I.OddsId == O[P + "OddsId_611"] && (I.Odds_611_o != O[P + "Odds_611_O"] || I.Odds_611_e != O[P + "Odds_611_E"] || I.ODD_611 != O[P + "ODD_611"] || I.EVEN_611 != O[P + "EVEN_611"] ? O[P + "Changed_611"] = CLS_UPD : O[P + "Changed_611"] = "");
                                    (N = new Object).OddsId = O[P + "OddsId_609"],
                                    N.Value_609_h = O[P + "Value_609_H"],
                                    N.Value_609_a = O[P + "Value_609_A"],
                                    N.Odds_609_h = O[P + "Odds_609_H"],
                                    N.Odds_609_a = O[P + "Odds_609_A"],
                                    t(s ? OddsDataLObj : OddsDataObj, N);
                                    (N = new Object).OddsId = O[P + "OddsId_610"],
                                    N.Goal_610 = O[P + "Goal_610"],
                                    N.UNDER_610 = O[P + "UNDER_610"],
                                    N.Odds_610_o = O[P + "Odds_610_O"],
                                    N.Odds_610_u = O[P + "Odds_610_U"],
                                    t(s ? OddsDataLObj : OddsDataObj, N);
                                    (N = new Object).OddsId = O[P + "OddsId_611"],
                                    N.ODD_611 = O[P + "ODD_611"],
                                    N.EVEN_611 = O[P + "EVEN_611"],
                                    N.Odds_611_o = O[P + "Odds_611_O"],
                                    N.Odds_611_e = O[P + "Odds_611_E"],
                                    t(s ? OddsDataLObj : OddsDataObj, N),
                                    O[P + "Race10_hint"] = RES_QxRaceto.replace("[X]", F[P][1].replace("0", "")).replace("[Y]", "10"),
                                    O[P + "OddsId_613_10"] = F[P][14],
                                    O[P + "Odds_613_10_H_Cls"] = getOddsClass(F[P][15]),
                                    O[P + "Odds_613_10_A_Cls"] = getOddsClass(F[P][16]),
                                    O[P + "Odds_613_H10"] = F[P][15],
                                    O[P + "Odds_613_A10"] = F[P][16],
                                    O[P + "Race15_hint"] = RES_QxRaceto.replace("[X]", F[P][1].replace("0", "")).replace("[Y]", "15"),
                                    O[P + "OddsId_613_15"] = F[P][17],
                                    O[P + "Odds_613_15_H_Cls"] = getOddsClass(F[P][18]),
                                    O[P + "Odds_613_15_A_Cls"] = getOddsClass(F[P][19]),
                                    O[P + "Odds_613_H15"] = F[P][18],
                                    O[P + "Odds_613_A15"] = F[P][19],
                                    O[P + "Race20_hint"] = RES_QxRaceto.replace("[X]", F[P][1].replace("0", "")).replace("[Y]", "20"),
                                    O[P + "OddsId_613_20"] = F[P][20],
                                    O[P + "Odds_613_20_H_Cls"] = getOddsClass(F[P][21]),
                                    O[P + "Odds_613_20_A_Cls"] = getOddsClass(F[P][22]),
                                    O[P + "Odds_613_H20"] = F[P][21],
                                    O[P + "Odds_613_A20"] = F[P][22],
                                    null != (I = _(s ? OddsDataLObj : OddsDataObj, O[P + "OddsId_613_10"])) && I.OddsId == O[P + "OddsId_613_10"] && (I.Odds_613_h10 != O[P + "Odds_613_H10"] || I.Odds_613_a10 != O[P + "Odds_613_A10"] ? O[P + "Changed_613_10"] = CLS_UPD : O[P + "Changed_613_10"] = ""),
                                    null != (I = _(s ? OddsDataLObj : OddsDataObj, O[P + "OddsId_613_15"])) && I.OddsId == O[P + "OddsId_613_15"] && (I.Odds_613_h15 != O[P + "Odds_613_H15"] || I.Odds_613_a15 != O[P + "Odds_613_A15"] ? O[P + "Changed_613_15"] = CLS_UPD : O[P + "Changed_613_15"] = ""),
                                    null != (I = _(s ? OddsDataLObj : OddsDataObj, O[P + "OddsId_613_20"])) && I.OddsId == O[P + "OddsId_613_20"] && (I.Odds_613_h20 != O[P + "Odds_613_H20"] || I.Odds_613_a20 != O[P + "Odds_613_A20"] ? O[P + "Changed_613_20"] = CLS_UPD : O[P + "Changed_613_20"] = "");
                                    (N = new Object).OddsId = O[P + "OddsId_613_10"],
                                    N.Odds_613_h10 = O[P + "Odds_613_H10"],
                                    N.Odds_613_a10 = O[P + "Odds_613_A10"],
                                    t(s ? OddsDataLObj : OddsDataObj, N);
                                    (N = new Object).OddsId = O[P + "OddsId_613_15"],
                                    N.Odds_613_h15 = O[P + "Odds_613_H15"],
                                    N.Odds_613_a15 = O[P + "Odds_613_A15"],
                                    t(s ? OddsDataLObj : OddsDataObj, N);
                                    var N;
                                    (N = new Object).OddsId = O[P + "OddsId_613_20"],
                                    N.Odds_613_h20 = O[P + "Odds_613_H20"],
                                    N.Odds_613_a20 = O[P + "Odds_613_A20"],
                                    t(s ? OddsDataLObj : OddsDataObj, N)
                                }
                                h += x[b].replace("\x3c!--MatchList--\x3e", T[b]),
                                h = _formatTemplate(h, "{@", "}"),
                                h = _replaceTags(O, h)
                            }
                        }
                        a = a.replace("\x3c!--BasketballExtendBettype--\x3e", h)
                    }
                }
                O.Display_More = CLS_LS_OFF,
                O.More_Style = CLS_LS_OFF,
                void 0 !== l.MoreCount && "0" != l.MoreCount || (O.Display_More = CLS_LS_OFF),
                DisplayMoreHtml(parseInt(r, 10), l.MUID, O, "Basketball_More"),
                O.More = void 0 !== l.MoreCount ? getMoreLabel(l.MoreCount, s) : "",
                "" != O.More ? (O.More_Style = "",
                O.Display_More == CLS_LS_ON && (O.More_Style = "off")) : (O.Display_More = CLS_LS_OFF,
                O.MoreData = "")
            }
        } else
            "5" != r && "2" != r || (O.Display_More = CLS_LS_OFF);
        if ("1" == r && (O.MR_DISP1 = CLS_LS_OFF,
        O.MR_DISP2 = CLS_LS_ON,
        O.MR_DISP3 = CLS_LS_ON),
        0 == d || e[d - 1].MatchId != l.MatchId) {
            if ("1" == r) {
                var k = !1;
                switch (fFrame.DisplayMode) {
                case "1":
                case "3":
                    k = CheckOddsId(l.OddsId_301) || CheckOddsId(l.OddsId_302) || CheckOddsId(l.OddsId_303) || CheckOddsId(l.OddsId_304);
                    break;
                case "1F":
                    k = CheckOddsId(l.OddsId_301) || CheckOddsId(l.OddsId_302);
                    break;
                case "1H":
                    k = CheckOddsId(l.OddsId_303) || CheckOddsId(l.OddsId_304)
                }
                if (k) {
                    switch (O.MR_DISP1 = CLS_LS_ON,
                    O.MR_DISP2 = CLS_LS_OFF,
                    l.FavorF_301) {
                    case "h":
                        O.Home_MR_Cls = CLS_HDP_F,
                        O.Away_MR_Cls = CLS_HDP_N,
                        O.Value_301_H = GenMRHdp("" == l.Value_301 ? 0 : l.Value_301, l.Percentage_301),
                        O.Value_301_A = "",
                        O.Value_301 = O.Value_301_H;
                        break;
                    case "a":
                        O.Home_MR_Cls = CLS_HDP_N,
                        O.Away_MR_Cls = CLS_HDP_F,
                        O.Value_301_H = "",
                        O.Value_301_A = GenMRHdp("" == l.Value_301 ? 0 : l.Value_301, l.Percentage_301),
                        O.Value_301 = O.Value_301_A;
                        break;
                    default:
                        O.Home_MR_Cls = CLS_HDP_N,
                        O.Away_MR_Cls = CLS_HDP_N,
                        "" != l.Odds_301_H ? O.Value_301_H = GenMRHdp(l.Value_301, l.Percentage_301) : O.Value_301_H = "",
                        O.Value_301_A = "",
                        O.Value_301 = O.Value_301_H
                    }
                    switch (l.FavorH_303) {
                    case "h":
                        O.Value_303_H = GenMRHdp("" == l.Value_303 ? 0 : l.Value_303, l.Percentage_303),
                        O.Value_303_A = "",
                        O.Value_303 = O.Value_303_H;
                        break;
                    case "a":
                        O.Value_303_H = "",
                        O.Value_303_A = GenMRHdp("" == l.Value_303 ? 0 : l.Value_303, l.Percentage_303),
                        O.Value_303 = O.Value_303_A;
                        break;
                    default:
                        "" != l.Odds_303_H ? O.Value_303_H = GenMRHdp(l.Value_303, l.Percentage_303) : O.Value_303_H = "",
                        O.Value_303 = O.Value_303_H,
                        O.Value_303_A = ""
                    }
                    "" == l.Odds_302_O ? O.Goal_302 = "" : O.Goal_302 = GenMRHdp("" == l.Goal_302 ? 0 : l.Goal_302, l.Percentage_302),
                    "" == l.Odds_304_O ? O.Goal_304 = "" : O.Goal_304 = GenMRHdp("" == l.Goal_304 ? 0 : l.Goal_304, l.Percentage_304),
                    O.UNDER_302 = "" == O.Goal_302 ? "" : RES_UNDER,
                    O.UNDER_304 = "" == O.Goal_304 ? "" : RES_UNDER
                }
                if (s)
                    switch (l.GameStatus) {
                    case "1":
                        O.GameStatus = '<div class="happen LiveTime" Title="' + RES_PRC_full + '"><b>' + RES_PRC + "</b></div>";
                        break;
                    case "2":
                        O.GameStatus = '<div class="happen LiveTime" Title="' + RES_PPen_full + '"><b>' + RES_PPen + "</b></div>";
                        break;
                    case "3":
                        O.GameStatus = '<div class="happen LiveTime" Title="' + RES_VAR_full + '"><b>' + RES_VAR + "</b></div>";
                        break;
                    case "4":
                        O.GameStatus = '<div class="happen LiveTime" Title="' + RES_Pen_full + '"><b>' + RES_Pen + "</b></div>";
                        break;
                    case "5":
                        O.GameStatus = '<div class="happen LiveTime" Title="' + RES_Inj_full + '"><b>' + RES_Inj + "</b></div>";
                        break;
                    default:
                        O.GameStatus = ""
                    }
            }
            if ("1" == l.SportType || "2" == l.SportType || "8" == l.SportType)
                if ("1" == l.SportType)
                    switch (l.GVType) {
                    case "1":
                        $("#MainFly").addClass(RNB_CSS),
                        O.SportRadarInfo = getRunningHtml(l.MatchId, s ? "IsLive" : "", l.GVType, O.HomeName, O.AwayName);
                        break;
                    case "2":
                        break;
                    case "3":
                        $("#MainFly").removeClass(RNB_CSS),
                        O.SportRadarInfo = getSportRadarHtml(l.MatchId, s ? "IsLive" : "")
                    }
                else
                    $("#MainFly").addClass(RNB_CSS),
                    O.SportRadarInfo = 0 == l.SportRadar ? "" : getRunningHtml(l.MatchId, s ? "IsLive" : "", l.StatsId, O.HomeName, O.AwayName, parseInt(l.SportType, 10));
            else
                O.SportRadarInfo = 0 == l.SportRadar ? "" : getSportRadarHtml(l.MatchId, s ? "IsLive" : "", parseInt(l.SportType, 10));
            O.StatsInfo = "0" == l.StatsId ? "" : getStatsHtml(l.MatchId),
            O.LiveChart = "False" == l.IsLiveChart ? "" : getLiveChartHtml(l.MatchId),
            O.Streaming = getStreamingHtml(l.MatchId, l.StreamingId, s),
            O.Favorites = getFavoritesHtml(l.MUID, l.MatchCode, "1" == l.Favorite || "1" == l.FavLeague, s),
            O.FavLeagues = getFavLeaguesHtml(l.SportType, l.LeagueId, "1" == l.FavLeague, s),
            O.ScoreMap = 1 == r ? getScoreMapHtml(l.MatchId) : ""
        }
        if ("1" == r) {
            if (O.MR_rowspan = "1",
            O.MR_dline = "",
            OnlyMROdds && (O.MR_rowspan = "2",
            O.MR_dline = "none_dline",
            O.MR_DISP3 = CLS_LS_OFF,
            O.MR_DISP2 = CLS_LS_OFF,
            O.Display_More = CLS_LS_OFF),
            NoShowMROdds && (O.MR_DISP1 = CLS_LS_OFF,
            O.MR_DISP2 = CLS_LS_ON),
            NoShowMROdds || O.MR_DISP1 == CLS_LS_OFF) {
                var B = new RegExp("\x3c!--MR_START--\x3e.*\x3c!--MR_END--\x3e");
                a = a.replace(B, "")
            } else
                a = (a = a.replace("\x3c!--MR_START--\x3e", "")).replace("\x3c!--MR_END--\x3e", "");
            if (OnlyMROdds || O.MR_DISP3 == CLS_LS_OFF) {
                var j = new RegExp("\x3c!--MY_START--\x3e.*\x3c!--MY_END--\x3e");
                a = a.replace(j, "")
            } else
                a = (a = a.replace("\x3c!--MY_START--\x3e", "")).replace("\x3c!--MY_END--\x3e", "");
            if ("" != O.More || "True" == l.IsSuperLive || "True" == l.IsFastMarket)
                a = (a = a.replace("\x3c!--SMORE_START--\x3e", "")).replace("\x3c!--SMORE_END--\x3e", ""),
                O.MY_rowspan = "2",
                O.MY_dline = "none_dline";
            else {
                O.MY_rowspan = "1",
                O.MR_rowspan = "1",
                O.MY_dline = "",
                O.MR_dline = "";
                var V = new RegExp("\x3c!--SMORE_START--\x3e.*\x3c!--SMORE_END--\x3e");
                a = a.replace(V, "")
            }
        }
        return s && ("1" == r && (O.RedCardH = getRedCardHtml(parseInt(l.RedCardH, 10)),
        O.RedCardA = getRedCardHtml(parseInt(l.RedCardA, 10))),
        "1" == l.TimerSuspend ? (O.TimeSuspendCls1 = CLS_LS_OFF,
        O.TimeSuspendCls = CLS_LS_ON) : (O.TimeSuspendCls1 = CLS_LS_ON,
        O.TimeSuspendCls = CLS_LS_OFF),
        SetLiveScore(O, l, r, n)),
        _replaceTags(O, _formatTemplate(a, "{@", "}"))
    }
    function l(e) {
        o(e);
        var d = 0;
        e.tBodies.length > 0 && (d = e.tBodies.length - 1),
        e.tBodies[d].rows.length <= 1 && (e.parentNode.style.display = "none")
    }
    function n(e) {
        o(e);
        var d = 0;
        e.tBodies.length > 0 && (d = e.tBodies.length - 1),
        e.tBodies[d].rows.length <= 1 && (e.parentNode.style.display = "none"),
        O()
    }
    function O() {
        if (c.IsReady()) {
            0 == document.getElementsByName("chkDate").length && fFrame.leftFrame.SwitchMenuType(0, ""),
            window.clearTimeout(S),
            S = setTimeout("startButton('" + ("" == h ? "d" : "l") + "')", 3e3);
            f = 1,
            null != c.UpdateFinish && c.UpdateFinish(h),
            w && (w = !1,
            FinalpaintOddsTable())
        } else
            window.setTimeout(O, 500)
    }
    function o(e) {
        var d, a = 0;
        e.tBodies.length > 0 && (a = e.tBodies.length - 1);
        for (var _ = e.tBodies[a], t = _.rows.length - 1; t >= 0; t--)
            "l" == _.rows[t].id.charAt(0) ? d++ : d = 0,
            d > 1 && _.deleteRow(t);
        for (; _.rows.length > 0 && "l" == _.rows[_.rows.length - 1].id.charAt(0); )
            _.deleteRow(_.rows.length - 1)
    }
    var i = "bgcpe"
      , p = "bgcpelight"
      , c = this
      , g = null
      , u = new Array;
    this.arr_SportsCount = new Array,
    this.arr_SportsCount[0] = 0;
    var D = new Array
      , m = ""
      , h = "";
    this.set_arr_final = function(e, d) {
        D[e] = d
    }
    ,
    this.getOddsKeeperArray = function() {
        return u
    }
    ,
    this.HasData = !1,
    this.IsReady = function() {
        for (var e in D)
            if (!D[e])
                return !1;
        return !0
    }
    ,
    this.initData = function(_, t, O, o, c) {
        var S = document.DataForm_D;
        h = o;
        var C = "_D";
        "l" == o && (m = "_L",
        C = "_L",
        i = "live",
        p = "liveligh",
        S = document.DataForm_L),
        D[O] = !1,
        t > S.CT.value && (S.CT.value = t);
        var L = fFrame.DisplayMode;
        if (initialTmpl(ARR_TMPLID_DEF[L][O], ARR_TMPLURL_DEF[L][O], "ShowBetList('" + _ + "','" + t + "','" + O + o + "',DataFrame" + C + ".N" + O + o + ");")) {
            switch (g = new OddsKeeper,
            u[O] = g,
            g.SportType = O,
            g.RegenEverytime = !0,
            g.setTemplate(fFrame.document.getElementById(ARR_TMPLID_DEF[L][O]).contentWindow),
            O) {
            case "43":
                g.afterNewEvent = s;
                break;
            default:
                g.afterNewEvent = r
            }
            g.afterNewLeague = a,
            g.RegenEverytime = !0,
            O.toString() != SingleLastSport.toString() ? g.afterRepaintTable = l : (g.afterRepaintTable = n,
            "l" != o && haveOutgight && (D.outright = !1,
            void 0 === arr_ShowMixParlay_map.O && (arr_ShowMixParlay_map.O = !0))),
            1 == O && (g.updateAppendFields = d),
            5 == O && (g.updateAppendFields = e),
            43 == O && (g.updateAppendFields = updateAppendFields_Esport),
            g.TableContainer = document.getElementById("oTableContainer_" + O + m),
            g.BetTypes = ARR_BETYPE_DEF[O],
            "" != S.keyWord.value && (c = HighLightKeyWord(S.keyWord.value, c, !1)),
            g.setDatas(c, ARR_FIELDS_DEF1[O]),
            void 0 === arr_ShowMixParlay_map[O] && (arr_ShowMixParlay_map[O] = !0);
            for (var y = 0; y < g.EventList.length; y++)
                g.EventList[y].SportType = O;
            this.arr_SportsCount[O] = 0 == g.EventList.length ? 0 : g.EventList[g.EventList.length - 1].MatchIndex + 1,
            g.paintOddsTable(),
            1 == O && OpenMoreDiv(1),
            2 == O && OpenMoreDiv(2),
            S.RT.value = "U",
            D[O] = !0
        }
    }
    ,
    this.Update = function(e, d, a, _, t, s, r, l, n, O, o) {
        var i = document.DataForm_D;
        if ("l" == a && (i = document.DataForm_L),
        D[d] = !1,
        e > i.CT.value && (i.CT.value = e),
        null == u[d])
            return this.arr_SportsCount[d] = 0,
            void refreshData();
        (g = u[d]).EventList.length + s.length - _.length == 0 ? this.arr_SportsCount[d] = 0 : 0 == g.EventList.length ? this.arr_SportsCount[d] = s.length - _.length : this.arr_SportsCount[d] = g.EventList[g.EventList.length - 1].MatchIndex + 1 + s.length - _.length,
        "" != i.keyWord.value && (s = HighLightKeyWord(i.keyWord.value, s, !1)),
        g.refreshOddsTable(_, t, s, r, l, n, O, o);
        for (var p = 0; p < g.EventList.length; p++)
            g.EventList[p].SportType = d;
        1 == d && OpenMoreDiv(1),
        2 == d && OpenMoreDiv(2),
        D[d] = !0
    }
    ;
    var S, C = [], L = [], y = [], E = [], M = "", f = 1, w = !0;
    this.ShowHideSportContainer = function() {
        for (var e in u) {
            var d = u[e].TableContainer;
            d.childNodes[0].tBodies[0].rows.length > 0 && arr_ShowMixParlay[e] && arr_ShowMixParlay_map[e] ? d.style.display = "block" : d.style.display = "none"
        }
    }
}
function showOutrightOddsDisplay(e, d) {
    if (arrTicks = new Array,
    "U" == e) {
        if (null == g_OddsKeeper_Outright)
            return void refreshData();
        "" != document.DataForm_D.keyWord.value && (DataFrame_D.Ins = HighLightKeyWord(document.DataForm_D.keyWord.value, DataFrame_D.Ins, !0)),
        g_OddsKeeper_Outright.refreshOddsTable(DataFrame_D.Del, DataFrame_D.Srt, DataFrame_D.Ins, DataFrame_D.uT, DataFrame_D.uO)
    } else {
        if (!initialTmpl("Outright_tmp1", "Outright_tmpl.php?type=1", "showOutrightOddsDisplay('" + e + "','" + d + "');"))
            return;
        (g_OddsKeeper_Outright = new OutrightKeeper).afterNewEvent = afterNewEvent_O,
        g_OddsKeeper_Outright.afterNewLeague = afterNewLeague_O,
        g_OddsKeeper_Outright.getLeagueList = getLeagueList_O,
        g_OddsKeeper_Outright.isFilterLeague = isFilterLeague_O,
        g_OddsKeeper_Outright.TableContainer = document.getElementById("oTableContainer_O"),
        g_OddsKeeper_Outright.BetTypes = [0],
        g_OddsKeeper_Outright.setTemplate(fFrame.document.getElementById("Outright_tmp1").contentWindow),
        "" != document.DataForm_D.keyWord.value && (DataFrame_D.N = HighLightKeyWord(document.DataForm_D.keyWord.value, DataFrame_D.N, !0)),
        g_OddsKeeper_Outright.setDatas(DataFrame_D.N, FIELDS_DEF_Outright),
        g_OddsKeeper_Outright.paintOddsTable()
    }
    null != g_OddsKeeper_D ? g_OddsKeeper_D.set_arr_final("outright", !0) : haveOutgight ? (g_OddsKeeper_D = new SingleOddsClass,
    document.DataForm_D.RT.value = "U",
    document.DataForm_D.CT.value = d,
    document.getElementById("OddsTr").style.display = "",
    document.getElementById("oTableContainer_O").style.display = "",
    document.getElementById("btnRefresh_D").style.display = "",
    document.getElementById("BetList").style.display = "none") : ReturnToUnderOver()
}
function ReturnToUnderOver() {
    "B" != RES_PageType && (isNoFav || (isNoFav = !0,
    alert(RES_NonFavoriteMsg),
    fFrame.leftFrame.SwitchMenuType(0, "")))
}
function afterNewLeague_O(e, d, a) {
    var _ = e[d]
      , t = new Array;
    return t.FavLeagues = getFavLeaguesHtml(0, _.LeagueId, "1" == _.FavLeague, !1),
    _replaceTags(t, _formatTemplate(a, "{@", "}"))
}
function afterNewEvent_O(e, d, a, _) {
    var t = e[d];
    if (!isFilterDate_O(t))
        return "";
    var s = new Array;
    return 0 == t.Div ? (s.Tr_Cls = "bgcpe",
    s.BgColor = GetEventBGColor(0)) : (s.Tr_Cls = "bgcpelight",
    s.BgColor = GetEventBGColor(1)),
    0 == t.Odds ? (s.Odds = "",
    s.link = "") : (s.Odds = t.Odds,
    s.link = "JavaScript:BetO('" + t.MatchId + "_Outright_" + s.Odds + "');"),
    a = _formatTemplate(a, "{@", "}"),
    a = _replaceTags(s, a)
}
function BetO(e) {
    CheckIsIpad() && !CheckIScroll() && parent.window.scrollTo(0, 0),
    fFrame.CanBetOutright ? fFrame.leftFrame.DoOutrightBetProcess(e) : alert(RES_DISABLE_OUTRIGHT_MSG)
}
function ExistLeague_O(e) {
    for (var d = 0; d < LeagueList_O.length; d++)
        if (LeagueList_O[d].LeagueId == e)
            return !0;
    if ("object" == typeof LeagueListBySport_O.S0)
        for (d = 0; d < LeagueListBySport_O.S0.length; d++)
            if (LeagueListBySport_O.S0[d].LeagueId == e)
                return !0;
    return !1
}
function makeLeagueList_O(e) {
    if (null != e) {
        for (var d = 0, a = 0; a < e.length; a++)
            ExistLeague_O(e[a].LeagueId) || (LeagueList_O[d] = {},
            LeagueList_O[d].LeagueId = e[a].LeagueId,
            LeagueList_O[d].LeagueName = e[a].LeagueName,
            -1 != indexOf(arr_League_O, e[a].LeagueId) ? LeagueList_O[d].Checked = !0 : LeagueList_O[d].Checked = !1,
            d++);
        "object" == typeof LeagueListBySport_O.S0 ? LeagueListBySport_O.S0 = LeagueListBySport_O.S0.concat(LeagueList_O) : (LeagueListBySport_O.S0 = {},
        LeagueListBySport_O.S0 = jQuery.extend(!0, [], LeagueList_O)),
        LeagueListBySport_O.S0.sort(function(e, d) {
            return e.LeagueName.localeCompare(d.LeagueName)
        })
    }
}
function getSelLeagueCnt_O(e) {
    for (var d = 0, a = [], _ = 0; _ < e.length; _++)
        e[_].Checked && d++;
    return a[0] = d,
    a
}
function getLeagueList_O() {
    LeagueListBySport_O = [],
    TotlaLeagueCnt_O = 0,
    TotlaMainLeagueCnt_O = 0,
    TotlaSelLeagueCnt_O = 0;
    if (LeagueList_O = [],
    "object" == typeof g_OddsKeeper_Outright && null != g_OddsKeeper_Outright && makeLeagueList_O(g_OddsKeeper_Outright.EventList),
    void 0 !== LeagueListBySport_O.S0) {
        TotlaLeagueCnt_O = LeagueListBySport_O.S0.length,
        TotlaMainLeagueCnt_O = LeagueListBySport_O.S0.length;
        var e = getSelLeagueCnt_O(LeagueListBySport_O.S0);
        TotlaSelLeagueCnt_O = e[0]
    }
    checkLeagueCount()
}
function isFilterLeague_O(e) {
    for (var d = 0; d < g_OddsKeeper_Outright.EventList.length; d++) {
        var a = g_OddsKeeper_Outright.EventList[d];
        if (void 0 === a.ChangeLeagueName && (a.LeagueName = RES_OUTRIGHT + " / " + a.LeagueName,
        a.ChangeLeagueName = 1),
        a.LeagueId == e)
            return isFilterDate_O(a)
    }
    return -1 != indexOf(arr_League_O, "0") || 0 == TotlaSelLeagueCnt_O || -1 != indexOf(arr_League_O, e)
}
function CloseOddsTr_L(e, d) {
    if (null != g_OddsKeeper_L) {
        arr_OddsKeeper_L = g_OddsKeeper_L.getOddsKeeperArray();
        for (var a in arr_ShowMixParlay)
            if (arr_ShowMixParlay[a] && null != arr_OddsKeeper_L[a]) {
                arr_OddsKeeper_L[a].EventList.length > 0 && !0
            }
    }
    e || d || ReturnToUnderOver()
}
function changeDisplayMode(e, d) {
    setCookie("DispVer", e, 7, "", d),
    "1" == e || "3" == e ? "1F" != fFrame.DisplayMode && "1H" != fFrame.DisplayMode || (fFrame.DisplayMode = e,
    initialDisstyle()) : "1F" != e && "1H" != e || "1" != fFrame.DisplayMode && "3" != fFrame.DisplayMode || (fFrame.DisplayMode = e,
    initialDisstyle()),
    fFrame.DisplayMode = e;
    var a = ARR_TMPLID_DEF[e][1]
      , _ = ARR_TMPLURL_DEF[e][1];
    if (initialTmpl(a, _, "changeDisplayMode('" + e + "','" + d + "');")) {
        OnlyMROdds || Rechkskeeper_5_15();
        var t = null;
        if (null != g_OddsKeeper_L) {
            null != (t = g_OddsKeeper_L.getOddsKeeperArray()[1]) && (t.setTemplate(fFrame.document.getElementById(a).contentWindow),
            t.RegenEverytime = "1F" == e || "1H" == e,
            t.paintOddsTable())
        }
        if (t = null,
        null != g_OddsKeeper_D) {
            null != (t = g_OddsKeeper_D.getOddsKeeperArray()[1]) && (t.setTemplate(fFrame.document.getElementById(a).contentWindow),
            t.RegenEverytime = "1F" == e || "1H" == e,
            t.paintOddsTable())
        }
    }
}
function initialDisstyle() {
    var e = $("#disstyle_menu");
    if (e.children().length > 0) {
        switch (fFrame.DisplayMode) {
        case "1":
            $(e.children()[0]).click();
            break;
        case "3":
            $(e.children()[1]).click();
            break;
        case "1F":
            $(e.children()[2]).click();
            break;
        case "1H":
            $(e.children()[3]).click();
            break;
        default:
            $(e.children()[1]).click()
        }
        e[0].style.visibility = "hidden"
    }
}
function getDataByQuarter(e, d, a) {
    for (var _ = [], t = 0; t < e.length; t++)
        e[t][0] == d && e[t][1] == a && -1 == indexOf(_, e[t]) && _.push(e[t]);
    return _
}
function checkQuarterByMatch(e, d) {
    for (var a = [], _ = 0; _ < e.length; _++)
        e[_][0] == d && -1 == indexOf(a, e[_][1]) && a.push(e[_][1]);
    return a
}
function changeOddsType_ou(e) {
    null != PopLauncher && PopLauncher.close(),
    void 0 !== OddsDataLObj && (OddsDataLObj = []),
    void 0 !== OddsDataObj && (OddsDataObj = []);
    var d = document.getElementById("selOddsType");
    d.value != e && (d.value = e),
    document.DataForm_L.OddsType.value = e,
    document.DataForm_D.OddsType.value = e,
    fFrame.leftx.document.fomBetProcess_Data.OddsType.value = e,
    fFrame.leftx.document.fomBetProcess_Data_OT.OddsType.value = e,
    fFrame.leftx.document.fomBetProcessPhone_Data.OddsType.value = e,
    fFrame.leftx.document.fomBetProcess_Data_OTP.OddsType.value = e,
    fFrame.leftx.document.Bingo_fomBetProcess_Data.OddsType.value = e,
    fFrame.leftx.document.ParlayBetForm.OddsType.value = e,
    document.DataForm_L.RT.value = "W",
    document.DataForm_D.RT.value = "W",
    refreshAll(),
    null != fFrame.topFrame.miniOddsObj && fFrame.topFrame.miniOddsObj.Refresh(e)
}
function getBettypeArr(e, d) {
    var a = new Array(!1,!1,!1,!1);
    for (var _ in e)
        switch (d[e[_]][3]) {
        case "1":
            a[0] = !0;
            break;
        case "2":
            a[1] = !0;
            break;
        case "3":
            a[2] = !0;
            break;
        default:
            a[3] = !0
        }
    return a
}
function getMatchRowKey(e, d, a) {
    var _ = null;
    return void 0 !== e[d + "_" + a] && (_ = e[d + "_" + a]),
    _
}
function SetDefaultCategory(e, d, a) {
    for (var _ = 0; _ < e.length; _++)
        d = null == a ? 0 == _ ? d.replace(new RegExp("{@current" + e[_] + "}","g"), "current") : d.replace(new RegExp("{@current" + e[_] + "}","g"), "") : a == e[_] ? d.replace(new RegExp("{@current" + e[_] + "}","g"), "current") : d.replace(new RegExp("{@current" + e[_] + "}","g"), "");
    return d
}
function getMapName(e) {
    var d = parseInt(e, 10);
    return d - 1 < 0 ? d = 0 : d -= 1,
    RES_Map[d]
}
function combinationExOddsHtml(e) {
    for (var d = "", a = 0; a < e.length; a++)
        d += e[a];
    return d
}
function getOddslocation(e) {
    var d = []
      , a = ExOddsFieldLength;
    switch (e) {
    case 1:
        d = ExOddsLocation;
    default:
        e -= 1,
        d[0] = ExOddsLocation[0] + e * a,
        d[1] = ExOddsLocation[1] + e * a,
        d[2] = ExOddsLocation[2] + e * a,
        d[3] = ExOddsLocation[3] + e * a,
        d[4] = ExOddsLocation[4] + e * a
    }
    return d
}
function updateAppendFields_Esport(e, d, a, _) {
    for (var t = 0; t < e.length; t++) {
        for (var s = e[t][0], r = a[s]; r < d.length && d[r].MUID == s; )
            d[r].MoreCount = e[t][1],
            d[r].BestOfMap = e[t][2],
            d[r].IsStartingSoon = e[t][3],
            d[r].MoveBO3Down = e[t][4],
            d[r].OverTimeSession = e[t][5],
            d[r].IsMainMarket = e[t][6],
            r++;
        _[s] = "updateAppend"
    }
}
var CounterHandle_L, CounterHandle_D, NowTime, isIe = !!window.ActiveXObject, isNoFav = !1, myspanClass = "EarlyMarket_top_bg", CLS_HDP_F = "FavTeamClass", CLS_HDP_N = "UdrDogTeamClass", CLS_PLAY_RED = "player-red", CLS_PLAY_BLUE = "player-blue", TR_0 = "bgcpe", TR_1 = "bgcpelight", g_OddsKeeper_D = null, g_OddsKeeper_L = null, g_OddsKeeper_Outright = null, OddsData = [], OddsDataL = [], OddsDataObj = [], OddsDataLObj = [], OddsData43 = [], OddsData43L = [], ajaxMainMatchData = [], ajaxLeagueList = [], ajaxTeamList = [], ajaxDisplayCatData = [], MatchIndex = [], MatchInfo = [], ajaxMainMatchDataL = [], ajaxLeagueListL = [], ajaxTeamListL = [], ajaxDisplayCatDataL = [], MatchIndexL = [], MatchInfoL = [], ExMatchFieldLenth = 4, ExOddsFieldLength = 5, ExOddsLocation = [4, 5, 6, 7, 8], MoreTmplCategory = [], MoreTmpSpecialLeague = [], MoreTmpSpecialEvent = [], MoreOddsTable = [], EsportCategoryList = [], MatchCategoryList = new Object, DisplayMoreObj = new Object, EsportsDisplayMoreObj = new Object, haveOutgight = !1, day_of_week = 0, IsMember = "41" == (fFrame = getParent(window)).SiteId.substr(0, 2), fFrame = getParent(window), arr_Date_map = new Array, arr_ShowMixParlay_map = new Array;
arr_ShowMixParlay_map[0] = !1;
var SingleLastSport = "1"
  , RNB_CSS = "GV"
  , arr_ShowMixParlay = new Array;
arr_ShowMixParlay[1] = !0,
arr_ShowMixParlay[2] = !0,
arr_ShowMixParlay[3] = !0,
arr_ShowMixParlay[4] = !0,
arr_ShowMixParlay[5] = !0,
arr_ShowMixParlay[6] = !0,
arr_ShowMixParlay[7] = !0,
arr_ShowMixParlay[8] = !0,
arr_ShowMixParlay[9] = !0,
arr_ShowMixParlay[10] = !0,
arr_ShowMixParlay[11] = !0,
arr_ShowMixParlay[12] = !0,
arr_ShowMixParlay[13] = !0,
arr_ShowMixParlay[14] = !0,
arr_ShowMixParlay[15] = !0,
arr_ShowMixParlay[16] = !0,
arr_ShowMixParlay[17] = !0,
arr_ShowMixParlay[18] = !0,
arr_ShowMixParlay[19] = !0,
arr_ShowMixParlay[20] = !0,
arr_ShowMixParlay[21] = !0,
arr_ShowMixParlay[22] = !0,
arr_ShowMixParlay[23] = !0,
arr_ShowMixParlay[24] = !0,
arr_ShowMixParlay[25] = !0,
arr_ShowMixParlay[26] = !0,
arr_ShowMixParlay[27] = !1,
arr_ShowMixParlay[28] = !0,
arr_ShowMixParlay[29] = !0,
arr_ShowMixParlay[30] = !0,
arr_ShowMixParlay[31] = !0,
arr_ShowMixParlay[32] = !0,
arr_ShowMixParlay[33] = !0,
arr_ShowMixParlay[34] = !0,
arr_ShowMixParlay[35] = !0,
arr_ShowMixParlay[36] = !0,
arr_ShowMixParlay[37] = !0,
arr_ShowMixParlay[38] = !0,
arr_ShowMixParlay[39] = !0,
arr_ShowMixParlay[40] = !0,
arr_ShowMixParlay[41] = !0,
arr_ShowMixParlay[42] = !0,
arr_ShowMixParlay[43] = !0,
arr_ShowMixParlay[44] = !0,
arr_ShowMixParlay[47] = !0,
arr_ShowMixParlay[48] = !0,
arr_ShowMixParlay[49] = !0,
arr_ShowMixParlay[50] = !0,
arr_ShowMixParlay[51] = !0,
arr_ShowMixParlay[52] = !0,
arr_ShowMixParlay[53] = !0,
arr_ShowMixParlay[54] = !0,
arr_ShowMixParlay[55] = !0,
arr_ShowMixParlay[56] = !0,
arr_ShowMixParlay[99] = !0,
arr_ShowMixParlay[154] = !0,
arr_ShowMixParlay.O = !0;
var mydiv, mytb, myrow, g_SelDisstyle_InnerHTML, synFlag_L = !1, synFlag_D = !1, nextShowMarket = null, FirstLoading = !0, arr_League_O = new Array("0"), LeagueListBySport_O = [], LeagueList_O = [], TotlaLeagueCnt_O = 0, TotlaMainLeagueCnt_O = 0, TotlaSelLeagueCnt_O = 0;
