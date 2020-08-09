function getParent(e) {
    for (var d = e, _ = 0; _ < 4; _++) {
        if (null != d.SiteMode)
            return d;
        d = d.parent
    }
    return null
}
function getMoreObj(e, d) {
    for (var _, a = 0; a < e.length; a++)
        if ((_ = e[a]).OddsId == d)
            return _;
    return null
}
function setMoreObj(e, d) {
    if ("" != d.OddsId) {
        for (var _ = !1, a = 0; a < e.length; a++)
            e[a].OddsId == d.OddsId && (_ = !0,
            e[a] = d);
        _ || (e[e.length] = d)
    }
}
function ShowBetList(e, d, _, a, s, t, O, r, l, n, o) {
    if (CheckMoreObj(parseInt(document.DataForm_D.Sport.value, 10))) {
        if (retryCnt[parseInt(document.DataForm_D.Sport.value, 10)]++,
        retryCnt[parseInt(document.DataForm_D.Sport.value, 10)] < 20)
            return void window.setTimeout(function() {
                ShowBetList(e, d, _, a, s, t, O, r, l, n)
            }, 500);
        retryCnt[parseInt(document.DataForm_D.Sport.value, 10)] = 0
    }
    var D, u;
    if ("l" == _ ? (D = document.DataForm_L,
    DataFrame_L,
    u = g_OddsKeeper_L) : (D = document.DataForm_D,
    DataFrame_D,
    u = g_OddsKeeper_D),
    D.CT.value = d,
    "U" == e) {
        if (null == u)
            return void ("l" == _ ? refreshData_L() : refreshData_D());
        u.RegenEverytime = !0,
        u.refreshOddsTable(a, s, t, O, r, l, n, o),
        OpenMoreDiv(parseInt(document.DataForm_D.Sport.value, 10))
    } else {
        var i;
        if ("l" == _ ? (i = "L",
        (u = g_OddsKeeper_L = new OddsKeeper).tag = "L",
        u.TableContainer = document.getElementById("oTableContainer_L")) : (i = "D",
        (u = g_OddsKeeper_D = new OddsKeeper).tag = "D",
        u.TableContainer = document.getElementById("oTableContainer_D")),
        !initialTmpl("NBA_tmpl", "NBA_tmpl.php", "ShowBetList('" + e + "','" + d + "','" + _ + "', DataFrame_" + i + ".N" + _ + ");"))
            return;
        u.afterNewLeague = afterNewLeague,
        u.afterNewEvent = afterNewEvent,
        u.SportType = document.DataForm_D.Sport.value,
        u.setTemplate(fFrame.document.getElementById("NBA_tmpl").contentWindow),
        u.afterRepaintTable = afterRepaintTable,
        u.BetTypes = ARR_BETYPE_DEF[document.DataForm_D.Sport.value],
        u.setDatas(a, ARR_FIELDS_DEF1[document.DataForm_D.Sport.value]),
        FinalpaintOddsTable(),
        OpenMoreDiv(parseInt(document.DataForm_D.Sport.value, 10))
    }
}
function afterNewLeague(e, d, _) {
    var a = e[d]
      , s = new Array;
    return s.FavLeagues = getFavLeaguesHtml(document.DataForm_D.Sport.value, a.LeagueId, "1" == a.FavLeague, !1),
    s.Market = document.DataForm_D.Market.value,
    s.Refresh = RES_REFRESH,
    _replaceTags(s, _formatTemplate(_, "{@", "}"))
}
function GenExtendML_56(e, d) {
    for (var _ = 0, a = [], s = 0; s < e.length; s++) {
        var t = e[s];
        "1" == t.MatchCount && (a[_] = new Array(t.MatchId,t.OddsId_20,t.Odds_20_H,t.Odds_20_A,"","",""),
        _++)
    }
    d ? OddsData21L = a : OddsData21 = a
}
function afterNewEvent(e, d, _, a) {
    0 == d && "56" == document.DataForm_D.Sport.value && GenExtendML_56(e, a);
    var s = e[d]
      , t = new Array;
    t.HomeName = s.HomeName.replace('<span class="nameResult">', "").replace("</span>", ""),
    t.AwayName = s.AwayName.replace('<span class="nameResult">', "").replace("</span>", ""),
    t.HomeName_t = s.HomeName.replace('<span class="nameResult">', "").replace("</span>", ""),
    t.AwayName_t = s.AwayName.replace('<span class="nameResult">', "").replace("</span>", ""),
    t.Odds_1_H_Cls = getOddsClass(s.Odds_1_H),
    t.Odds_1_A_Cls = getOddsClass(s.Odds_1_A),
    t.Odds_3_O_Cls = getOddsClass(s.Odds_3_O),
    t.Odds_3_U_Cls = getOddsClass(s.Odds_3_U),
    t.Odds_2_O_Cls = getOddsClass(s.Odds_2_O),
    t.Odds_2_E_Cls = getOddsClass(s.Odds_2_E),
    t.Odds_7_H_Cls = getOddsClass(s.Odds_7_H),
    t.Odds_7_A_Cls = getOddsClass(s.Odds_7_A),
    t.Odds_8_O_Cls = getOddsClass(s.Odds_8_O),
    t.Odds_8_U_Cls = getOddsClass(s.Odds_8_U),
    t.Odds_12_O_Cls = getOddsClass(s.Odds_12_O),
    t.Odds_12_E_Cls = getOddsClass(s.Odds_12_E);
    var O = !1;
    if (d == e.length - 1 ? O = !0 : e[d + 1].MUID != s.MUID && (O = !0),
    a) {
        switch (document.DataForm_D.Sport.value) {
        case "2":
        case "3":
            d == e.length - 1 ? O = !0 : e[d + 1].MUID != s.MUID && (O = !0),
            SetLiveScore(t, s, document.DataForm_D.Sport.value, O)
        }
        0 == s.LivePeriod ? t.LiveTimeCls = "1" == s.CsStatus ? "HalfTime" : "IsLive" : t.LiveTimeCls = "LiveTime",
        0 == s.Div ? (t.Tr_Cls = "live",
        t.BgColor = GetLiveBGColor(s.Div)) : (t.Tr_Cls = "liveligh",
        t.BgColor = GetLiveBGColor(s.Div))
    } else
        0 == s.Div ? (t.Tr_Cls = TR_0,
        t.BgColor = GetEventBGColor(s.Div)) : (t.Tr_Cls = TR_1,
        t.BgColor = GetEventBGColor(s.Div));
    switch (s.FavorF) {
    case "h":
        t.Home_Cls = CLS_HDP_F,
        t.Away_Cls = CLS_HDP_N,
        t.Value_1_H = s.Value_1,
        t.Value_1_A = "";
        break;
    case "a":
        t.Home_Cls = CLS_HDP_N,
        t.Away_Cls = CLS_HDP_F,
        t.Value_1_H = "",
        t.Value_1_A = s.Value_1;
        break;
    default:
        t.Home_Cls = CLS_HDP_N,
        t.Away_Cls = CLS_HDP_N,
        "" != s.Odds_1_H ? t.Value_1_H = "0" : t.Value_1_H = "",
        t.Value_1_A = ""
    }
    switch (s.FavorH1) {
    case "h":
        t.Value_7_H = s.Value_7,
        t.Value_7_A = "";
        break;
    case "a":
        t.Value_7_H = "",
        t.Value_7_A = s.Value_7;
        break;
    default:
        "" != s.Odds_7_H ? t.Value_7_H = "0" : t.Value_7_H = "",
        t.Value_7_A = ""
    }
    t.UNDER_3 = "" == s.Goal_3 ? "" : RES_UNDER,
    t.UNDER_8 = "" == s.Goal_8 ? "" : RES_UNDER,
    "" != s.Odds_2_O ? (t.ODD_2 = RES_ODD,
    t.EVEN_2 = RES_EVEN) : (t.ODD_2 = "",
    t.EVEN_2 = ""),
    "" != s.Odds_12_O ? (t.ODD_12 = RES_ODD,
    t.EVEN_12 = RES_EVEN) : (t.ODD_12 = "",
    t.EVEN_12 = ""),
    "1" == s.TimerSuspend ? (t.TimeSuspendCls1 = CLS_LS_OFF,
    t.TimeSuspendCls = CLS_LS_ON) : (t.TimeSuspendCls1 = CLS_LS_ON,
    t.TimeSuspendCls = CLS_LS_OFF),
    0 != d && e[d - 1].MatchId == s.MatchId || (t.StatsInfo = "0" == s.StatsId ? "" : getStatsHtml(s.MatchId),
    t.SportRadarInfo = 0 == s.SportRadar ? "" : getRunningHtml(s.MatchId, a ? "IsLive" : "", s.StatsId, s.HomeName, s.AwayName, parseInt(document.DataForm_L.Sport.value, 10)),
    t.Streaming = getStreamingHtml(s.MatchId, s.StreamingId, a),
    t.Favorites = getFavoritesHtml(s.MUID, s.MatchCode, "1" == s.Favorite || "1" == s.FavLeague, a),
    t.FavLeagues = getFavLeaguesHtml(document.DataForm_D.Sport.value, s.LeagueId, "1" == s.FavLeague, a)),
    t.isParlay = 0;
    var r = ""
      , l = []
      , n = [];
    a ? (void 0 !== OddsData21L && (l = OddsData21L),
    void 0 !== OddsData2L && (n = OddsData2L)) : (void 0 !== OddsData21 && (l = OddsData21),
    void 0 !== OddsData2 && (n = OddsData2)),
    t.Display_Extend = CLS_LS_OFF,
    t.Display_ExtendML = CLS_LS_OFF,
    t.MatchId = s.MatchId;
    var o = null;
    if (O) {
        if (l.length > 0)
            for (var D = 0; D < l.length; D++)
                if (l[D][0] == s.MatchId) {
                    t.Display_Extend = CLS_LS_ON,
                    t.Display_ExtendML = CLS_LS_ON,
                    t.OddsId_20 = l[D][1],
                    t.Odds_20_H = l[D][2],
                    t.Odds_20_A = l[D][3],
                    t.Odds_20_H_Cls = getOddsClass(l[D][2]),
                    t.Odds_20_A_Cls = getOddsClass(l[D][3]),
                    t.OddsId_21 = l[D][4],
                    t.Odds_21_H = l[D][5],
                    t.Odds_21_A = l[D][6],
                    t.Odds_21_H_Cls = getOddsClass(l[D][5]),
                    t.Odds_21_A_Cls = getOddsClass(l[D][6]),
                    null != (o = getMoreObj(a ? OddsDataLObj : OddsDataObj, t.OddsId_20)) && o.OddsId == t.OddsId_20 && (o.Odds_20_h != t.Odds_20_H || o.Odds_20_a != t.Odds_20_A ? t.Changed_20 = CLS_UPD : t.Changed_20 = ""),
                    null != (o = getMoreObj(a ? OddsDataLObj : OddsDataObj, t.OddsId_21)) && o.OddsId == t.OddsId_21 && (o.Odds_21_h != t.Odds_21_H || o.Odds_21_a != t.Odds_21_A ? t.Changed_21 = CLS_UPD : t.Changed_21 = "");
                    (L = new Object).OddsId = t.OddsId_20,
                    L.Odds_20_h = t.Odds_20_H,
                    L.Odds_20_a = t.Odds_20_A,
                    setMoreObj(a ? OddsDataLObj : OddsDataObj, L);
                    (L = new Object).OddsId = t.OddsId_21,
                    L.Odds_21_h = t.Odds_21_H,
                    L.Odds_21_a = t.Odds_21_A,
                    setMoreObj(a ? OddsDataLObj : OddsDataObj, L)
                }
        // if (n.length > 0) {
        //     var u = ""
        //       , i = checkQuarterByMatch(n, s.MatchId)
        //       , c = []
        //       , C = [];
        //     if (i.length > 0) {
        //         t.Display_Extend = CLS_LS_ON;
        //         // for (var g = 0; g < i.length; g++) {
        //         //     switch (c.push(fFrame.document.getElementById("NBA_tmpl").contentWindow.document.getElementById("BasketballExtendBettype").innerHTML),
        //         //     i[g].replace("0", "")) {
        //         //     default:
        //         //     case "1":
        //         //         t.QuarterTitle = RES_1StQuarterTitle;
        //         //         break;
        //         //     case "2":
        //         //         t.QuarterTitle = RES_2ndQuarterTitle;
        //         //         break;
        //         //     case "3":
        //         //         t.QuarterTitle = RES_3rdQuarterTitle;
        //         //         break;
        //         //     case "4":
        //         //         t.QuarterTitle = RES_4thQuarterTitle
        //         //     }
        //         //     t.QTRHDP_hint = RES_QTRHDP_hint.replace("[X]", i[g].replace("0", "")),
        //         //     t.QTROU_hint = RES_QTROU_hint.replace("[X]", i[g].replace("0", "")),
        //         //     t.QTROE_hint = RES_QTROE_hint.replace("[X]", i[g].replace("0", "")),
        //         //     t.Qid = i[g].replace("0", "");
        //         //     var m = ""
        //         //       , p = getDataByQuarter(n, s.MatchId, i[g]);
        //         //     if (1 == p.length)
        //         //         m = (m = fFrame.document.getElementById("NBA_tmpl").contentWindow.document.getElementById("MatchRow").innerHTML.replace("<tbody>", "").replace("</tbody>", "")).replace(new RegExp("{@","g"), "{@0"),
        //         //         C.push(m);
        //         //     else {
        //         //         for (var S = 0; S < p.length; S++)
        //         //             u += (m = fFrame.document.getElementById("NBA_tmpl").contentWindow.document.getElementById("MatchRow").innerHTML.replace("<tbody>", "").replace("</tbody>", "")).replace(new RegExp("{@","g"), "{@" + S);
        //         //         C.push(u),
        //         //         u = ""
        //         //     }
        //         //     for (S = 0; S < p.length; S++) {
        //         //         switch (a ? 0 == s.Div ? (t[S + "Tr_Cls"] = "live",
        //         //         t[S + "BgColor"] = GetLiveBGColor(s.Div)) : (t[S + "Tr_Cls"] = "liveligh",
        //         //         t[S + "BgColor"] = GetLiveBGColor(s.Div)) : 0 == s.Div ? (t[S + "Tr_Cls"] = TR_0,
        //         //         t[S + "BgColor"] = GetEventBGColor(s.Div)) : (t[S + "Tr_Cls"] = TR_1,
        //         //         t[S + "BgColor"] = GetEventBGColor(s.Div)),
        //         //         t[S + "isParlay"] = "0",
        //         //         t[S + "MatchId"] = s.MatchId,
        //         //         t[S + "OddsId_609"] = p[S][2],
        //         //         t[S + "Odds_609_H_Cls"] = getOddsClass(p[S][4]),
        //         //         t[S + "Odds_609_A_Cls"] = getOddsClass(p[S][5]),
        //         //         p[S][6]) {
        //         //         case "h":
        //         //             t[S + "Value_609_H"] = p[S][3],
        //         //             t[S + "Value_609_A"] = "";
        //         //             break;
        //         //         case "a":
        //         //             t[S + "Value_609_H"] = "",
        //         //             t[S + "Value_609_A"] = p[S][3];
        //         //             break;
        //         //         default:
        //         //             "" != p[S][4] ? t[S + "Value_609_H"] = "0" : t[S + "Value_609_H"] = "",
        //         //             t[S + "Value_609_A"] = ""
        //         //         }
        //         //         t[S + "Odds_609_H"] = p[S][4],
        //         //         t[S + "Odds_609_A"] = p[S][5],
        //         //         t[S + "OddsId_610"] = p[S][7],
        //         //         t[S + "Odds_610_O_Cls"] = getOddsClass(p[S][9]),
        //         //         t[S + "Odds_610_U_Cls"] = getOddsClass(p[S][10]),
        //         //         t[S + "Goal_610"] = p[S][8],
        //         //         t[S + "UNDER_610"] = "" == p[S][8] ? "" : RES_UNDER,
        //         //         t[S + "Odds_610_O"] = p[S][9],
        //         //         t[S + "Odds_610_U"] = p[S][10],
        //         //         t[S + "OddsId_611"] = p[S][11],
        //         //         t[S + "Odds_611_O_Cls"] = getOddsClass(p[S][12]),
        //         //         t[S + "Odds_611_E_Cls"] = getOddsClass(p[S][13]),
        //         //         "" != p[S][12] ? (t[S + "ODD_611"] = RES_ODD,
        //         //         t[S + "EVEN_611"] = RES_EVEN) : (t[S + "ODD_611"] = "",
        //         //         t[S + "EVEN_611"] = ""),
        //         //         t[S + "Odds_611_O"] = p[S][12],
        //         //         t[S + "Odds_611_E"] = p[S][13],
        //         //         null != (o = getMoreObj(a ? OddsDataLObj : OddsDataObj, t[S + "OddsId_609"])) && o.OddsId == t[S + "OddsId_609"] && (o.Odds_609_h != t[S + "Odds_609_H"] || o.Odds_609_a != t[S + "Odds_609_A"] || o.Value_609_h != t[S + "Value_609_H"] || o.Value_609_a != t[S + "Value_609_A"] ? t[S + "Changed_609"] = CLS_UPD : t[S + "Changed_609"] = ""),
        //         //         null != (o = getMoreObj(a ? OddsDataLObj : OddsDataObj, t[S + "OddsId_610"])) && o.OddsId == t[S + "OddsId_610"] && (o.Odds_610_o != t[S + "Odds_610_O"] || o.Odds_610_u != t[S + "Odds_610_U"] || o.Goal_610 != t[S + "Goal_610"] || o.UNDER_610 != t[S + "UNDER_610"] ? t[S + "Changed_610"] = CLS_UPD : t[S + "Changed_610"] = ""),
        //         //         null != (o = getMoreObj(a ? OddsDataLObj : OddsDataObj, t[S + "OddsId_611"])) && o.OddsId == t[S + "OddsId_611"] && (o.Odds_611_o != t[S + "Odds_611_O"] || o.Odds_611_e != t[S + "Odds_611_E"] || o.ODD_611 != t[S + "ODD_611"] || o.EVEN_611 != t[S + "EVEN_611"] ? t[S + "Changed_611"] = CLS_UPD : t[S + "Changed_611"] = "");
        //         //         (L = new Object).OddsId = t[S + "OddsId_609"],
        //         //         L.Value_609_h = t[S + "Value_609_H"],
        //         //         L.Value_609_a = t[S + "Value_609_A"],
        //         //         L.Odds_609_h = t[S + "Odds_609_H"],
        //         //         L.Odds_609_a = t[S + "Odds_609_A"],
        //         //         setMoreObj(a ? OddsDataLObj : OddsDataObj, L);
        //         //         (L = new Object).OddsId = t[S + "OddsId_610"],
        //         //         L.Goal_610 = t[S + "Goal_610"],
        //         //         L.UNDER_610 = t[S + "UNDER_610"],
        //         //         L.Odds_610_o = t[S + "Odds_610_O"],
        //         //         L.Odds_610_u = t[S + "Odds_610_U"],
        //         //         setMoreObj(a ? OddsDataLObj : OddsDataObj, L);
        //         //         (L = new Object).OddsId = t[S + "OddsId_611"],
        //         //         L.ODD_611 = t[S + "ODD_611"],
        //         //         L.EVEN_611 = t[S + "EVEN_611"],
        //         //         L.Odds_611_o = t[S + "Odds_611_O"],
        //         //         L.Odds_611_e = t[S + "Odds_611_E"],
        //         //         setMoreObj(a ? OddsDataLObj : OddsDataObj, L),
        //         //         t[S + "Race10_hint"] = RES_QxRaceto.replace("[X]", p[S][1].replace("0", "")).replace("[Y]", "10"),
        //         //         t[S + "OddsId_613_10"] = p[S][14],
        //         //         t[S + "Odds_613_10_H_Cls"] = getOddsClass(p[S][15]),
        //         //         t[S + "Odds_613_10_A_Cls"] = getOddsClass(p[S][16]),
        //         //         t[S + "Odds_613_H10"] = p[S][15],
        //         //         t[S + "Odds_613_A10"] = p[S][16],
        //         //         t[S + "Race15_hint"] = RES_QxRaceto.replace("[X]", p[S][1].replace("0", "")).replace("[Y]", "15"),
        //         //         t[S + "OddsId_613_15"] = p[S][17],
        //         //         t[S + "Odds_613_15_H_Cls"] = getOddsClass(p[S][18]),
        //         //         t[S + "Odds_613_15_A_Cls"] = getOddsClass(p[S][19]),
        //         //         t[S + "Odds_613_H15"] = p[S][18],
        //         //         t[S + "Odds_613_A15"] = p[S][19],
        //         //         t[S + "Race20_hint"] = RES_QxRaceto.replace("[X]", p[S][1].replace("0", "")).replace("[Y]", "20"),
        //         //         t[S + "OddsId_613_20"] = p[S][20],
        //         //         t[S + "Odds_613_20_H_Cls"] = getOddsClass(p[S][21]),
        //         //         t[S + "Odds_613_20_A_Cls"] = getOddsClass(p[S][22]),
        //         //         t[S + "Odds_613_H20"] = p[S][21],
        //         //         t[S + "Odds_613_A20"] = p[S][22],
        //         //         null != (o = getMoreObj(a ? OddsDataLObj : OddsDataObj, t[S + "OddsId_613_10"])) && o.OddsId == t[S + "OddsId_613_10"] && (o.Odds_613_h10 != t[S + "Odds_613_H10"] || o.Odds_613_a10 != t[S + "Odds_613_A10"] ? t[S + "Changed_613_10"] = CLS_UPD : t[S + "Changed_613_10"] = ""),
        //         //         null != (o = getMoreObj(a ? OddsDataLObj : OddsDataObj, t[S + "OddsId_613_15"])) && o.OddsId == t[S + "OddsId_613_15"] && (o.Odds_613_h15 != t[S + "Odds_613_H15"] || o.Odds_613_a15 != t[S + "Odds_613_A15"] ? t[S + "Changed_613_15"] = CLS_UPD : t[S + "Changed_613_15"] = ""),
        //         //         null != (o = getMoreObj(a ? OddsDataLObj : OddsDataObj, t[S + "OddsId_613_20"])) && o.OddsId == t[S + "OddsId_613_20"] && (o.Odds_613_h20 != t[S + "Odds_613_H20"] || o.Odds_613_a20 != t[S + "Odds_613_A20"] ? t[S + "Changed_613_20"] = CLS_UPD : t[S + "Changed_613_20"] = "");
        //         //         (L = new Object).OddsId = t[S + "OddsId_613_10"],
        //         //         L.Odds_613_h10 = t[S + "Odds_613_H10"],
        //         //         L.Odds_613_a10 = t[S + "Odds_613_A10"],
        //         //         setMoreObj(a ? OddsDataLObj : OddsDataObj, L);
        //         //         (L = new Object).OddsId = t[S + "OddsId_613_15"],
        //         //         L.Odds_613_h15 = t[S + "Odds_613_H15"],
        //         //         L.Odds_613_a15 = t[S + "Odds_613_A15"],
        //         //         setMoreObj(a ? OddsDataLObj : OddsDataObj, L);
        //         //         var L;
        //         //         (L = new Object).OddsId = t[S + "OddsId_613_20"],
        //         //         L.Odds_613_h20 = t[S + "Odds_613_H20"],
        //         //         L.Odds_613_a20 = t[S + "Odds_613_A20"],
        //         //         setMoreObj(a ? OddsDataLObj : OddsDataObj, L)
        //         //     }
        //         //     r += c[g].replace("\x3c!--MatchList--\x3e", C[g]),
        //         //     r = _formatTemplate(r, "{@", "}"),
        //         //     r = _replaceTags(t, r)
        //         // }
        //     }
        //     _ = _.replace("\x3c!--BasketballExtendBettype--\x3e", r)
        // }
    }
    return t.Display_More = CLS_LS_OFF,
    t.More_Style = CLS_LS_OFF,
    O ? ("0" == s.MoreCount && (t.Display_More = CLS_LS_OFF),
    DisplayMoreHtml(parseInt(document.DataForm_D.Sport.value, 10), s.MUID, t, "Basketball_More"),
    t.More = void 0 !== s.MoreCount ? getMoreLabel(s.MoreCount, a) : "",
    "" != t.More ? (t.More_Style = "",
    t.Display_More == CLS_LS_ON && (t.More_Style = "off")) : (t.Display_More = CLS_LS_OFF,
    t.MoreData = "")) : t.Display_More = CLS_LS_OFF,
    _ = _formatTemplate(_, "{@", "}"),
    _ = _replaceTags(t, _)
}
function getDataByQuarter(e, d, _) {
    for (var a = [], s = 0; s < e.length; s++)
        e[s][0] == d && e[s][1] == _ && -1 == indexOf(a, e[s]) && a.push(e[s]);
    return a
}
function checkQuarterByMatch(e, d) {
    for (var _ = [], a = 0; a < e.length; a++)
        e[a][0] == d && -1 == indexOf(_, e[a][1]) && _.push(e[a][1]);
    return _
}
function getMoreLabel(e) {
    return 0 == e ? "" : e
}
function SwitchMore(e, d, _) {
    var a = "";
    _.className.indexOf("off") > -1 ? (a = "displayOff",
    _.className = "en_Point") : (a = "displayOn",
    _.className = "en_Point off");
    $(_).parent().parent("td").parent("tr").next("tr").find("td.moreBetType.reset").attr("class", "moreBetType reset " + a)
}
function afterScoreChanged(e, d) {
    if (d < e.length && d >= 0 && e.length > 0) {
        var _ = e[d]
          , a = new Array;
        a.HomeName = _.HomeName,
        a.AwayName = _.AwayName,
        a.ScoreH = _.ScoreH,
        a.ScoreA = _.ScoreA,
        a.ShowTime = _.ShowTime,
        "" != _.InjuryTime && "0" != _.InjuryTime ? a.InjuryTime = "+" + _.InjuryTime : a.InjuryTime = "";
        var s = fFrame.ScoreMsg;
        s = _formatTemplate(s, "{@", "}"),
        s = _replaceTags(a, s);
        new MsgBox(s,1e4,5,"MainMsg").openMsg()
    }
}
var CounterHandle_L, CounterHandle_D, CLS_HDP_F = "FavTeamClass", CLS_HDP_N = "UdrDogTeamClass", TR_0 = "bgcpe", TR_1 = "bgcpelight", g_OddsKeeper_L = null, g_OddsKeeper_D = null, OddsDataObj = [], OddsDataLObj = [], fFrame = getParent(window), DisplayMoreObj = new Object, OddsData2L = [], OddsData21L = [], OddsData2 = [], OddsData21 = [];
