function getParent(e) {
    for (var a = e, d = 0; d < 4; d++) {
        if (null != a.SiteMode)
            return a;
        a = a.parent
    }
    return null
}
function ShowBetList(e, a, d, _, s, t, l, r, n, o, p) {
    if (CheckMoreObj(parseInt(document.DataForm_D.Sport.value, 10))) {
        if (retryCnt[parseInt(document.DataForm_D.Sport.value, 10)]++,
        retryCnt[parseInt(document.DataForm_D.Sport.value, 10)] < 20)
            return void window.setTimeout(function() {
                ShowBetList(e, a, d, _, s, t, l, r, n, o, p)
            }, 500);
        retryCnt[parseInt(document.DataForm_D.Sport.value, 10)] = 0
    }
    var O, g;
    if ("l" == d ? (O = document.DataForm_L,
    DataFrame_L,
    g = g_OddsKeeper_L) : (O = document.DataForm_D,
    DataFrame_D,
    g = g_OddsKeeper_D),
    O.CT.value = a,
    "U" == e) {
        if (null == g)
            return void ("l" == d ? refreshData_L() : refreshData_D());
        g.refreshOddsTable(_, s, t, l, r, n, o, p),
        OpenMoreDiv(parseInt(document.DataForm_D.Sport.value, 10))
    } else {
        var c;
        if ("l" == d ? (c = "L",
        (g = g_OddsKeeper_L = new OddsKeeper).tag = "L",
        g.TableContainer = document.getElementById("oTableContainer_L")) : (c = "D",
        (g = g_OddsKeeper_D = new OddsKeeper).tag = "D",
        g.TableContainer = document.getElementById("oTableContainer_D")),
        !initialTmpl("Tennis_tmpl", "Tennis_tmpl.php", "ShowBetList('" + e + "','" + a + "','" + d + "', DataFrame_" + c + ".N" + d + ");"))
            return;
        g.afterNewLeague = afterNewLeague,
        g.afterNewEvent = afterNewEvent,
        g.SportType = document.DataForm_D.Sport.value,
        g.setTemplate(fFrame.document.getElementById("Tennis_tmpl").contentWindow),
        g.afterRepaintTable = afterRepaintTable,
        g.updateAppendFields = updateAppendFields,
        g.BetTypes = ARR_BETYPE_DEF[document.DataForm_D.Sport.value],
        g.RegenEverytime = !0,
        g.setDatas(_, ARR_FIELDS_DEF1[document.DataForm_D.Sport.value]),
        FinalpaintOddsTable(),
        OpenMoreDiv(parseInt(document.DataForm_D.Sport.value, 10))
    }
}
function afterNewLeague(e, a, d) {
    var _ = e[a]
      , s = new Array;
    return s.FavLeagues = getFavLeaguesHtml(document.DataForm_D.Sport.value, _.LeagueId, "1" == _.FavLeague, !1),
    s.Market = document.DataForm_D.Market.value,
    s.Refresh = RES_REFRESH,
    _replaceTags(s, _formatTemplate(d, "{@", "}"))
}
function SwitchMore(e, a, d) {
    var _ = "";
    if ("43" == document.DataForm_L.Sport.value || "43" == document.DataForm_D.Sport.value) {
        d.className.indexOf("off") > -1 ? (_ = "displayOff",
        d.className = "en_Point",
        EsportCategoryList[e] = MatchCategoryList[e][0]) : (_ = "display",
        d.className = "en_Point off");
        $(d).parent().parent("td").parent("tr").next("tr").find("td.moreBetType.tag").attr("class", "moreBetType tag " + _),
        EsportsDisplayMoreObj[e] = _,
        FinalpaintOddsTable()
    } else {
        d.className.indexOf("off") > -1 ? (_ = "displayOff",
        d.className = "en_Point") : (_ = "displayOn",
        d.className = "en_Point off");
        $(d).parent().parent("td").parent("tr").next("tr").find("td.moreBetType.reset").attr("class", "moreBetType reset " + _),
        DisplayMoreObj[e] = _
    }
}
function afterNewEvent(e, a, d, _) {
    var s = e[a]
      , t = new Array;
    t.HomeName = s.HomeName,
    t.AwayName = s.AwayName,
    t.HomeName_t = s.HomeName.replace('<span class="nameResult">', "").replace("</span>", ""),
    t.AwayName_t = s.AwayName.replace('<span class="nameResult">', "").replace("</span>", ""),
    t.Odds_1_H_Cls = getOddsClass(s.Odds_1_H),
    t.Odds_1_A_Cls = getOddsClass(s.Odds_1_A),
    t.Odds_3_O_Cls = getOddsClass(s.Odds_3_O),
    t.Odds_3_U_Cls = getOddsClass(s.Odds_3_U),
    t.Odds_2_O_Cls = getOddsClass(s.Odds_2_O),
    t.Odds_2_E_Cls = getOddsClass(s.Odds_2_E),
    t.Odds_20_H_Cls = getOddsClass(s.Odds_20_H),
    t.Odds_20_A_Cls = getOddsClass(s.Odds_20_A),
    t.Odds_153_H_Cls = getOddsClass(s.Odds_153_H),
    t.Odds_153_A_Cls = getOddsClass(s.Odds_153_A),
    t.Odds_5_1_Cls = getOddsClass(s.Odds_5_1),
    t.Odds_5_X_Cls = getOddsClass(s.Odds_5_X),
    t.Odds_5_2_Cls = getOddsClass(s.Odds_5_2),
    t.Draw = getDrawHtml("" != s.OddsId_5);
    var l = !1;
    if (a == e.length - 1 ? l = !0 : e[a + 1].MUID != s.MUID && (l = !0),
    _) {
        switch (document.DataForm_L.Sport.value) {
        case "4":
        case "5":
        case "6":
        case "7":
        case "9":
        case "48":
            SetLiveScore(t, s, document.DataForm_D.Sport.value, l)
        }
        0 == s.LivePeriod ? t.LiveTimeCls = "1" == s.CsStatus ? "HalfTime" : "IsLive" : t.LiveTimeCls = "LiveTime",
        0 == s.Div ? (t.Tr_Cls = "live",
        t.BgColor = GetLiveBGColor(s.Div)) : (t.Tr_Cls = "liveligh",
        t.BgColor = GetLiveBGColor(s.Div))
    } else
        0 == s.Div ? (t.Tr_Cls = TR_0,
        t.BgColor = GetEventBGColor(s.Div)) : (t.Tr_Cls = TR_1,
        t.BgColor = GetEventBGColor(s.Div));
    if (t.Home_Cls = CLS_HDP_N,
    t.Away_Cls = CLS_HDP_N,
    t.Value_1_H = "",
    t.Value_1_A = "",
    "" != s.OddsId_1)
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
    if ("44" == document.DataForm_L.Sport.value && (t.Home_Cls = CLS_HDP_F + " " + CLS_PLAY_RED,
    t.Away_Cls = CLS_HDP_N + " " + CLS_PLAY_BLUE,
    "" == s.ScoreH || "0" == s.ScoreH ? t.Round = "" : t.Round = RES_ROUND + " " + parseInt(s.ScoreH)),
    t.UNDER_3 = "",
    "" != s.OddsId_3 && (t.UNDER_3 = "" == s.Goal_3 ? "" : RES_UNDER),
    t.ODD_2 = "",
    t.EVEN_2 = "",
    "" != s.OddsId_2 && "" != s.Odds_2_O && (t.ODD_2 = RES_ODD,
    t.EVEN_2 = RES_EVEN),
    "1" == s.TimerSuspend ? (t.TimeSuspendCls = CLS_LS_ON,
    t.TimeSuspendCls1 = CLS_LS_OFF) : (t.TimeSuspendCls = CLS_LS_OFF,
    t.TimeSuspendCls1 = CLS_LS_ON),
    t.Value_153_H = "",
    t.Value_153_A = "",
    "" != s.OddsId_153)
        switch (s.FavorF_153) {
        case "h":
            t.Value_153_H = s.Value_153,
            t.Value_153_A = "";
            break;
        case "a":
            t.Value_153_H = "",
            t.Value_153_A = s.Value_153;
            break;
        default:
            "" != s.Odds_153_H ? t.Value_153_H = "0" : t.Value_153_H = "",
            t.Value_153_A = ""
        }
    if ("" != s.OddsId_501)
        switch (fFrame.userSite) {
        case "i":
            t.Odds_501_H = s.Odds_501_H,
            t.Odds_501_A = s.Odds_501_A;
            break;
        default:
            t.Odds_501_H = s.Odds_501_CS10,
            t.Odds_501_A = s.Odds_501_CS20
        }
    t.Odds_501_H_Cls = getOddsClass(t.Odds_501_H),
    t.Odds_501_A_Cls = getOddsClass(t.Odds_501_A);
    var r = !1;
    if (_ && "43" == document.DataForm_L.Sport.value || !_ && "43" == document.DataForm_D.Sport.value)
        null != EsportsDisplayMoreObj[s.MatchId] && void 0 !== EsportsDisplayMoreObj[s.MatchId] || (EsportsDisplayMoreObj[s.MatchId] = "display"),
        r = !0;
    else if (_)
        DisplayMoreObj[s.MatchId] = CLS_LS_ON;
    else {
        aForm = document.DataForm_D,
        aFrame = DataFrame_D,
        aKeeper = g_OddsKeeper_D;
        (new Date(NowTime.substr(6, 4),NowTime.substr(0, 2) - 1,NowTime.substr(3, 2),NowTime.substr(11, 2),NowTime.substr(14, 2),NowTime.substr(17, 2)) - new Date(s.KickoffTime.substr(0, 4),s.KickoffTime.substr(4, 2) - 1,s.KickoffTime.substr(6, 2),s.KickoffTime.substr(8, 2),s.KickoffTime.substr(10, 2),0)) / 6e4 >= -120 ? (DisplayMoreObj[s.MatchId] = CLS_LS_ON,
        r = !1) : (void 0 === DisplayMoreObj[s.MatchId] && (DisplayMoreObj[s.MatchId] = CLS_LS_OFF),
        r = !0)
    }
    if (t.Display_More = DisplayMoreObj[s.MatchId],
    0 != a && e[a - 1].MatchId == s.MatchId || (t.StatsInfo = "0" == s.StatsId ? "" : getStatsHtml(s.MatchId),
    t.SportRadarInfo = 0 == s.SportRadar ? "" : getSportRadarHtml(s.MatchId, "tennis", parseInt(document.DataForm_L.Sport.value, 10)),
    t.Streaming = getStreamingHtml(s.MatchId, s.StreamingId, _),
    t.Favorites = getFavoritesHtml(s.MUID, s.MatchCode, "1" == s.Favorite || "1" == s.FavLeague, _),
    t.FavLeagues = getFavLeaguesHtml(document.DataForm_D.Sport.value, s.LeagueId, "1" == s.FavLeague, _)),
    l)
        if ("0" != s.MoreCount && "" != s.MoreCount) {
            var n = "en_Point";
            _ && "43" == document.DataForm_L.Sport.value || !_ && "43" == document.DataForm_D.Sport.value ? (t.Display_More = EsportsDisplayMoreObj[s.MatchId],
            t.MoreData = genEsportsMoreEvent(s.MatchId, _, t.Tr_Cls),
            "display" == t.Display_More && (n = "en_Point off"),
             t.More = r ? "" : "") : (t.Display_More == CLS_LS_ON && (n = "en_Point off"),
            t.More = r ? "" : "",
            // t.More = r ? '<a href="#" onclick="SwitchMore(' + s.MatchId + "," + _ + ',this);return false;" class="' + n + '"><span>' + s.MoreCount + "</span></a>" : "") : (t.Display_More == CLS_LS_ON && (n = "en_Point off"),
            // t.More = r ? '<a href="#" onclick="SwitchMore(' + s.MatchId + "," + _ + ',this);return false;" class="' + n + '"><span>' + s.MoreCount + "</span></a>" : "",
            t.MoreData = genMoreEvent(s, _, t.Tr_Cls))
        } else
            t.Display_More = CLS_LS_OFF;
    else
        t.Display_More = CLS_LS_OFF;
    return t.isParlay = 0,
    d = _formatTemplate(d, "{@", "}"),
    d = _replaceTags(t, d)
}
function getMoreObj(e, a) {
    for (var d, _ = 0; _ < e.length; _++)
        if ((d = e[_]).OddsId == a)
            return d;
    return null
}
function setMoreObj(e, a) {
    if ("" != a.OddsId) {
        for (var d = !1, _ = 0; _ < e.length; _++)
            e[_].OddsId == a.OddsId && (d = !0,
            e[_] = a);
        d || (e[e.length] = a)
    }
}
function genEsportsMoreEvent(e, a, d) {
    var _, s, t, l, r, n, o, p = new Array, O = new Array("11","12","13","14","15","16","17","18","19");
    MoreTmpSpecialLeague[43] = new Array("",""),
    MoreTmpSpecialEvent[43] = new Array("",""),
    MoreOddsTable[43] = new Array("",""),
    a ? (_ = ajaxMainMatchDataL,
    s = ajaxLeagueListL,
    t = ajaxTeamListL,
    l = ajaxDisplayCatDataL,
    r = MatchIndexL,
    n = MatchInfoL,
    o = OddsData43L) : (_ = ajaxMainMatchData,
    s = ajaxLeagueList,
    t = ajaxTeamList,
    l = ajaxDisplayCatData,
    r = MatchIndex,
    n = MatchInfo,
    o = OddsData43);
    var g = ""
      , c = ""
      , i = "";
    if (null != _[e] && void 0 !== _[e]) {
        if (_[e].length > 0) {
            "" != MoreTmplCategory[43] && void 0 !== MoreTmplCategory[43] || (MoreTmplCategory[43] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("Category_43").innerHTML),
            a ? ("" != MoreTmpSpecialLeague[43][0] && void 0 !== MoreTmpSpecialLeague[43][0] || (MoreTmpSpecialLeague[43][0] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreSpecialLeague43_L").innerHTML),
            "" != MoreTmpSpecialEvent[43][0] && void 0 !== MoreTmpSpecialEvent[43][0] || (MoreTmpSpecialEvent[43][0] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreSpecialEvent43_FL").innerHTML),
            "" != MoreOddsTable[43][0] && void 0 !== MoreOddsTable[43][0] || (MoreOddsTable[43][0] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("SpecialOdds43_FL").innerHTML)) : ("" != MoreTmpSpecialLeague[43][1] && void 0 !== MoreTmpSpecialLeague[43][1] || (MoreTmpSpecialLeague[43][1] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreSpecialLeague43_D").innerHTML),
            "" != MoreTmpSpecialEvent[43][1] && void 0 !== MoreTmpSpecialEvent[43][1] || (MoreTmpSpecialEvent[43][1] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("moreSpecialEvent43_FD").innerHTML),
            "" != MoreOddsTable[43][1] && void 0 !== MoreOddsTable[43][1] || (MoreOddsTable[43][1] = fFrame.document.getElementById("MorePop_tmpl").contentWindow.document.getElementById("SpecialOdds43_FD").innerHTML));
            var m = MoreTmplCategory[43];
            m = (m = (m = m.replace(new RegExp("{@matchid}","g"), e)).replace(new RegExp("{@IsLive}","g"), a)).replace(new RegExp("{@Tr_Cls}","g"), d);
            for (var u = 0; u < O.length; u++)
                void 0 !== l[e + "C" + O[u]] && p.push(O[u]),
                MatchCategoryList[e] = p;
            for (u = 0; u < O.length; u++)
                m = void 0 !== l[e + "C" + O[u]] && l[e + "C" + O[u]].length > 0 ? m.replace(new RegExp("{@category_disp" + O[u] + "}","g"), CLS_LS_ON) : m.replace(new RegExp("{@category_disp" + O[u] + "}","g"), CLS_LS_OFF);
            m = EsportCategoryList.length > 0 && void 0 !== EsportCategoryList[e] && void 0 !== l[e + "C" + EsportCategoryList[e]] ? SetDefaultCategory(MatchCategoryList[e], m, EsportCategoryList[e]) : SetDefaultCategory(MatchCategoryList[e], m, null);
            var C, E, D, w;
            a ? (g = MoreTmpSpecialLeague[43][0],
            E = MoreTmpSpecialEvent[43][0],
            D = "\x3c!--moreSpecialEvent43_FL--\x3e",
            SpecialOddsTag = "\x3c!--SpecialOdds_FL--\x3e",
            w = MoreOddsTable[43][0]) : (g = MoreTmpSpecialLeague[43][1],
            E = MoreTmpSpecialEvent[43][1],
            D = "\x3c!--moreSpecialEvent43_FD--\x3e",
            SpecialOddsTag = "\x3c!--SpecialOdds_FD--\x3e",
            w = MoreOddsTable[43][1]);
            var L = g.replace(new RegExp(D,"g"), E);
            if (MatchCategoryList[e].length > 0) {
                void 0 !== EsportCategoryList[e] && MatchCategoryList[e].indexOf(EsportCategoryList[e].toString()) > -1 ? C = EsportCategoryList[e] : (C = MatchCategoryList[e][0],
                EsportCategoryList[e] = "");
                var S = e + "C" + C;
                if (void 0 !== l[S])
                    for (var v = 0; v < l[S].length; v++) {
                        var M = "";
                        c += L.replace(new RegExp("LeagueName","g"), s[l[S][v]]);
                        for (var h = r[l[S][v]], R = 0; R < h.length; R++)
                            if (_[e].indexOf(h[R]) > -1)
                                for (var f = n[h[R]], x = 0; x < parseInt(o[0]); x++)
                                    if (null != getMatchRowKey(n, h[R], x)) {
                                        var T = t[f[1]] + f[3];
                                        M += w.replace(new RegExp("{@HomeName}","g"), T).replace(new RegExp("{@AwayName}","g"), t[f[2]]);
                                        var H = getMatchRowKey(n, h[R], x)
                                          , y = getBettypeArr(H, o);
                                        for (var I in H) {
                                            var b = new Array;
                                            if (b.MatchId = o[H[I]][0],
                                            b.isParlay = 0,
                                            M = M.replace(new RegExp("{@MatchId}","g"), b.MatchId),
                                            M = M.replace(new RegExp("{@isParlay}","g"), b.isParlay),
                                            M = M.replace(new RegExp("{@Tr_Cls}","g"), d),
                                            0 == y[0] && (M = (M = (M = (M = (M = (M = (M = (M = (M = (M = M.replace(new RegExp("{@Home_Cls}","g"), CLS_HDP_N)).replace(new RegExp("{@Away_Cls}","g"), CLS_HDP_N)).replace(new RegExp("{@OddsId_1}","g"), "")).replace(new RegExp("{@Odds_1_H_Cls}","g"), "")).replace(new RegExp("{@Odds_1_A_Cls}","g"), "")).replace(new RegExp("{@Value_1_H}","g"), "")).replace(new RegExp("{@Value_1_A}","g"), "")).replace(new RegExp("{@Odds_1_H}","g"), "")).replace(new RegExp("{@Odds_1_A}","g"), "")).replace(new RegExp("{@Changed_1}","g"), "")),
                                            0 == y[1] && (M = (M = (M = (M = (M = (M = (M = M.replace(new RegExp("{@OddsId_2}","g"), "")).replace(new RegExp("{@Odds_2_O}","g"), "")).replace(new RegExp("{@Odds_2_E}","g"), "")).replace(new RegExp("{@disp_2}","g"), CLS_LS_OFF)).replace(new RegExp("{@Odds_2_O_Cls}","g"), "")).replace(new RegExp("{@Odds_2_E_Cls}","g"), "")).replace(new RegExp("{@Changed_2}","g"), "")),
                                            0 == y[2] && (M = (M = (M = (M = (M = (M = (M = (M = M.replace(new RegExp("{@Goal_3}","g"), "")).replace(new RegExp("{@UNDER_3}","g"), "")).replace(new RegExp("{@OddsId_3}","g"), "")).replace(new RegExp("{@Odds_3_O}","g"), "")).replace(new RegExp("{@Odds_3_U}","g"), "")).replace(new RegExp("{@Odds_3_O_Cls}","g"), "")).replace(new RegExp("{@Odds_3_U_Cls}","g"), "")).replace(new RegExp("{@Changed_3}","g"), "")),
                                            0 == y[3] && (M = (M = (M = (M = (M = (M = M.replace(new RegExp("{@OddsId_20}","g"), "")).replace(new RegExp("{@Odds_20_H}","g"), "")).replace(new RegExp("{@Odds_20_A}","g"), "")).replace(new RegExp("{@Odds_20_H_Cls}","g"), "")).replace(new RegExp("{@Odds_20_A_Cls}","g"), "")).replace(new RegExp("{@Changed_20}","g"), "")),
                                            "1" == o[H[I]][3])
                                                if (1 == y[0]) {
                                                    switch (b.OddsId_1 = o[H[I]][1],
                                                    b.Odds_1_H = o[H[I]][6],
                                                    b.Odds_1_A = o[H[I]][7],
                                                    b.Odds_1_H_Cls = getOddsClass(b.Odds_1_H),
                                                    b.Odds_1_A_Cls = getOddsClass(b.Odds_1_A),
                                                    o[H[I]][8]) {
                                                    case "h":
                                                        b.Home_Cls = CLS_HDP_F,
                                                        b.Away_Cls = CLS_HDP_N,
                                                        b.Value_1_H = o[H[I]][5],
                                                        b.Value_1_A = "";
                                                        break;
                                                    case "a":
                                                        b.Home_Cls = CLS_HDP_N,
                                                        b.Away_Cls = CLS_HDP_F,
                                                        b.Value_1_H = "",
                                                        b.Value_1_A = o[H[I]][5];
                                                        break;
                                                    default:
                                                        b.Home_Cls = CLS_HDP_N,
                                                        b.Away_Cls = CLS_HDP_N,
                                                        "" != o[H[I]][6] ? b.Value_1_H = "0" : b.Value_1_H = "",
                                                        b.Value_1_A = ""
                                                    }
                                                    var F = null;
                                                    null != (F = getMoreObj(a ? OddsDataLObj : OddsDataObj, b.OddsId_1)) && F.OddsId == b.OddsId_1 && (F.Odds_1_H != b.Odds_1_H || F.Odds_1_A != b.Odds_1_A ? b.Changed_1 = CLS_UPD : b.Changed_1 = ""),
                                                    M = (M = (M = (M = (M = (M = (M = (M = (M = (M = M.replace(new RegExp("{@Home_Cls}","g"), b.Home_Cls)).replace(new RegExp("{@Away_Cls}","g"), b.Away_Cls)).replace(new RegExp("{@OddsId_1}","g"), b.OddsId_1)).replace(new RegExp("{@Odds_1_H_Cls}","g"), b.Odds_1_H_Cls)).replace(new RegExp("{@Odds_1_A_Cls}","g"), b.Odds_1_A_Cls)).replace(new RegExp("{@Value_1_H}","g"), b.Value_1_H)).replace(new RegExp("{@Value_1_A}","g"), b.Value_1_A)).replace(new RegExp("{@Odds_1_H}","g"), b.Odds_1_H)).replace(new RegExp("{@Odds_1_A}","g"), b.Odds_1_A)).replace(new RegExp("{@Changed_1}","g"), b.Changed_1);
                                                    (A = new Object).OddsId = o[H[I]][1],
                                                    A.Value_1 = o[H[I]][5],
                                                    A.Odds_1_H = o[H[I]][6],
                                                    A.Odds_1_A = o[H[I]][7],
                                                    A.FavorF_1 = o[H[I]][8],
                                                    setMoreObj(a ? OddsDataLObj : OddsDataObj, A)
                                                } else
                                                    M = (M = (M = (M = (M = (M = (M = (M = (M = (M = M.replace(new RegExp("{@Home_Cls}","g"), CLS_HDP_N)).replace(new RegExp("{@Away_Cls}","g"), CLS_HDP_N)).replace(new RegExp("{@OddsId_1}","g"), "")).replace(new RegExp("{@Odds_1_H_Cls}","g"), "")).replace(new RegExp("{@Odds_1_A_Cls}","g"), "")).replace(new RegExp("{@Value_1_H}","g"), "")).replace(new RegExp("{@Value_1_A}","g"), "")).replace(new RegExp("{@Odds_1_H}","g"), "")).replace(new RegExp("{@Odds_1_A}","g"), "")).replace(new RegExp("{@Changed_1}","g"), "");
                                            if ("2" == o[H[I]][3])
                                                if (1 == y[1]) {
                                                    b.OddsId_2 = o[H[I]][1],
                                                    b.Odds_2_O = o[H[I]][5],
                                                    b.Odds_2_E = o[H[I]][6],
                                                    b.Odds_2_O_Cls = getOddsClass(b.Odds_2_O),
                                                    b.Odds_2_E_Cls = getOddsClass(b.Odds_2_E),
                                                    "" == b.Odds_2_O && "" == b.Odds_2_E ? b.disp_2 = CLS_LS_OFF : b.disp_2 = CLS_LS_ON;
                                                    F = null;
                                                    null != (F = getMoreObj(a ? OddsDataLObj : OddsDataObj, b.OddsId_2)) && F.OddsId == b.OddsId_2 && (F.Odds_2_O != b.Odds_2_O || F.Odds_2_E != b.Odds_2_E ? b.Changed_2 = CLS_UPD : b.Changed_2 = ""),
                                                    M = (M = (M = (M = (M = (M = (M = M.replace(new RegExp("{@OddsId_2}","g"), b.OddsId_2)).replace(new RegExp("{@Odds_2_O}","g"), b.Odds_2_O)).replace(new RegExp("{@Odds_2_E}","g"), b.Odds_2_E)).replace(new RegExp("{@disp_2}","g"), b.disp_2)).replace(new RegExp("{@Odds_2_O_Cls}","g"), b.Odds_2_O_Cls)).replace(new RegExp("{@Odds_2_E_Cls}","g"), b.Odds_2_E_Cls)).replace(new RegExp("{@Changed_2}","g"), b.Changed_2);
                                                    (A = new Object).OddsId = o[H[I]][1],
                                                    A.Odds_2_O = o[H[I]][5],
                                                    A.Odds_2_E = o[H[I]][6],
                                                    setMoreObj(a ? OddsDataLObj : OddsDataObj, A)
                                                } else
                                                    M = (M = (M = (M = (M = (M = (M = M.replace(new RegExp("{@OddsId_2}","g"), "")).replace(new RegExp("{@Odds_2_O}","g"), "")).replace(new RegExp("{@Odds_2_E}","g"), "")).replace(new RegExp("{@disp_2}","g"), CLS_LS_OFF)).replace(new RegExp("{@Odds_2_O_Cls}","g"), "")).replace(new RegExp("{@Odds_2_E_Cls}","g"), "")).replace(new RegExp("{@Changed_2}","g"), "");
                                            if ("3" == o[H[I]][3])
                                                if (1 == y[2]) {
                                                    b.Goal_3 = o[H[I]][5],
                                                    b.UNDER_3 = "" == b.Goal_3 ? "" : RES_UNDER,
                                                    b.OddsId_3 = o[H[I]][1],
                                                    b.Odds_3_O = o[H[I]][6],
                                                    b.Odds_3_U = o[H[I]][7],
                                                    b.Odds_3_O_Cls = getOddsClass(b.Odds_3_O),
                                                    b.Odds_3_U_Cls = getOddsClass(b.Odds_3_U);
                                                    F = null;
                                                    null != (F = getMoreObj(a ? OddsDataLObj : OddsDataObj, b.OddsId_3)) && F.OddsId == b.OddsId_3 && (F.Odds_3_O != b.Odds_3_O || F.Odds_3_U != b.Odds_3_U ? b.Changed_3 = CLS_UPD : b.Changed_3 = ""),
                                                    M = (M = (M = (M = (M = (M = (M = (M = M.replace(new RegExp("{@Goal_3}","g"), b.Goal_3)).replace(new RegExp("{@UNDER_3}","g"), b.UNDER_3)).replace(new RegExp("{@OddsId_3}","g"), b.OddsId_3)).replace(new RegExp("{@Odds_3_O}","g"), b.Odds_3_O)).replace(new RegExp("{@Odds_3_U}","g"), b.Odds_3_U)).replace(new RegExp("{@Odds_3_O_Cls}","g"), b.Odds_3_O_Cls)).replace(new RegExp("{@Odds_3_U_Cls}","g"), b.Odds_3_U_Cls)).replace(new RegExp("{@Changed_3}","g"), b.Changed_3);
                                                    (A = new Object).OddsId = o[H[I]][1],
                                                    A.Goal_3 = o[H[I]][5],
                                                    A.Odds_3_O = o[H[I]][6],
                                                    A.Odds_3_U = o[H[I]][7],
                                                    setMoreObj(a ? OddsDataLObj : OddsDataObj, A)
                                                } else
                                                    M = (M = (M = (M = (M = (M = (M = (M = M.replace(new RegExp("{@Goal_3}","g"), "")).replace(new RegExp("{@UNDER_3}","g"), "")).replace(new RegExp("{@OddsId_3}","g"), "")).replace(new RegExp("{@Odds_3_O}","g"), "")).replace(new RegExp("{@Odds_3_U}","g"), "")).replace(new RegExp("{@Odds_3_O_Cls}","g"), "")).replace(new RegExp("{@Odds_3_U_Cls}","g"), "")).replace(new RegExp("{@Changed_3}","g"), "");
                                            if ("20" == o[H[I]][3])
                                                if (1 == y[3]) {
                                                    b.OddsId_20 = o[H[I]][1],
                                                    b.Odds_20_H = o[H[I]][5],
                                                    b.Odds_20_A = o[H[I]][6],
                                                    b.Odds_20_H_Cls = getOddsClass(b.Odds_20_H),
                                                    b.Odds_20_A_Cls = getOddsClass(b.Odds_20_A);
                                                    F = null;
                                                    null != (F = getMoreObj(a ? OddsDataLObj : OddsDataObj, b.OddsId_20)) && F.OddsId == b.OddsId_20 && (F.Odds_20_H != b.Odds_20_H || F.Odds_20_A != b.Odds_20_A ? b.Changed_20 = CLS_UPD : b.Changed_20 = ""),
                                                    M = (M = (M = (M = (M = (M = M.replace(new RegExp("{@OddsId_20}","g"), b.OddsId_20)).replace(new RegExp("{@Odds_20_H}","g"), b.Odds_20_H)).replace(new RegExp("{@Odds_20_A}","g"), b.Odds_20_A)).replace(new RegExp("{@Odds_20_H_Cls}","g"), b.Odds_20_H_Cls)).replace(new RegExp("{@Odds_20_A_Cls}","g"), b.Odds_20_A_Cls)).replace(new RegExp("{@Changed_20}","g"), b.Changed_20);
                                                    var A;
                                                    (A = new Object).OddsId = o[H[I]][1],
                                                    A.Odds_20_H = o[H[I]][5],
                                                    A.Odds_20_A = o[H[I]][6],
                                                    setMoreObj(a ? OddsDataLObj : OddsDataObj, A)
                                                } else
                                                    M = (M = (M = (M = (M = (M = M.replace(new RegExp("{@OddsId_20}","g"), "")).replace(new RegExp("{@Odds_20_H}","g"), "")).replace(new RegExp("{@Odds_20_A}","g"), "")).replace(new RegExp("{@Odds_20_H_Cls}","g"), "")).replace(new RegExp("{@Odds_20_A_Cls}","g"), "")).replace(new RegExp("{@Changed_20}","g"), "")
                                        }
                                    }
                        c = c.replace(new RegExp(SpecialOddsTag,"g"), M)
                    }
            }
        }
        return i += m.replace(new RegExp("{@OddsHTML}","g"), c)
    }
}
function getBettypeArr(e, a) {
    var d = new Array(!1,!1,!1,!1);
    for (var _ in e)
        switch (a[e[_]][3]) {
        case "1":
            d[0] = !0;
            break;
        case "2":
            d[1] = !0;
            break;
        case "3":
            d[2] = !0;
            break;
        default:
            d[3] = !0
        }
    return d
}
function getMatchRowKey(e, a, d) {
    var _ = null;
    return void 0 !== e[a + "_" + d] && (_ = e[a + "_" + d]),
    _
}
function SetDefaultCategory(e, a, d) {
    for (var _ = 0; _ < e.length; _++)
        a = null == d ? 0 == _ ? a.replace(new RegExp("{@current" + e[_] + "}","g"), "current") : a.replace(new RegExp("{@current" + e[_] + "}","g"), "") : d == e[_] ? a.replace(new RegExp("{@current" + e[_] + "}","g"), "current") : a.replace(new RegExp("{@current" + e[_] + "}","g"), "");
    return a
}
function genMoreEvent(e, a, d) {
    var _, s = "";
    _ = a ? OddsDataL : OddsData;
    for (var t = "", l = "", r = "", n = "", o = 0; o < _.length; o++)
        if (_[o][0] == e.MatchId) {
            "" != n && n == _[o][1] || ("" != n && (l += t.replace("\x3c!--MoreOdds--\x3e", s),
            s = ""),
            t = fFrame.document.getElementById("Tennis_tmpl").contentWindow.document.getElementById("TennisMoreEvent").innerHTML),
            r = fFrame.document.getElementById("Tennis_tmpl").contentWindow.document.getElementById("MoreOdds").innerHTML;
            var p = new Array;
            if (p.MatchId = e.MatchId,
            p.isParlay = 0,
            p.HomeName = e.HomeName,
            p.AwayName = e.AwayName,
            p.HomeName_t = e.HomeName,
            p.AwayName_t = e.AwayName,
            p.Tr_Cls = d,
            p.OddsId_154 = _[o][2],
            "" != p.OddsId_154 && (p.Odds_154_h = _[o][3],
            p.Odds_154_a = _[o][4],
            p.Odds_154_H_Cls = getOddsClass(p.Odds_154_h),
            p.Odds_154_A_Cls = getOddsClass(p.Odds_154_a)),
            p.ResourceName_154 = _[o][5],
            p.OddsId_155 = _[o][6],
            "" != p.OddsId_155)
                switch (p.Value_155 = _[o][7],
                p.Odds_155_h = _[o][8],
                p.Odds_155_a = _[o][9],
                p.Odds_155_H_Cls = getOddsClass(p.Odds_155_h),
                p.Odds_155_A_Cls = getOddsClass(p.Odds_155_a),
                p.FavorF_155 = _[o][10],
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
            p.ResourceName_155 = _[o][11],
            p.OddsId_156 = _[o][12],
            "" != p.OddsId_156 && (p.Goal_156 = _[o][13],
            p.Odds_156_o = _[o][14],
            p.Odds_156_u = _[o][15],
            p.Odds_156_O_Cls = getOddsClass(p.Odds_156_o),
            p.Odds_156_U_Cls = getOddsClass(p.Odds_156_u)),
            p.ResourceName_156 = _[o][16];
            var O = null;
            null != (O = getMoreObj(a ? OddsDataLObj : OddsDataObj, p.OddsId_154)) && O.OddsId == p.OddsId_154 && (O.Odds_154_h != p.Odds_154_h || O.Odds_154_a != p.Odds_154_a ? p.Changed_154 = CLS_UPD : p.Changed_154 = ""),
            null != (O = getMoreObj(a ? OddsDataLObj : OddsDataObj, p.OddsId_155)) && O.OddsId == p.OddsId_155 && (O.Odds_155_h != p.Odds_155_h || O.Odds_155_a != p.Odds_155_a || O.Value_155 != p.Value_155 ? p.Changed_155 = CLS_UPD : p.Changed_155 = ""),
            null != (O = getMoreObj(a ? OddsDataLObj : OddsDataObj, p.OddsId_156)) && O.OddsId == p.OddsId_156 && (O.Odds_156_o != p.Odds_156_o || O.Odds_156_u != p.Odds_156_u || O.Goal_156 != p.Goal_156 ? p.Changed_156 = CLS_UPD : p.Changed_156 = ""),
            t = _formatTemplate(t, "{@", "}"),
            t = _replaceTags(p, t),
            r = _formatTemplate(r, "{@", "}"),
            r = _replaceTags(p, r),
            n = _[o][1],
            s += r;
            (g = new Object).OddsId = _[o][2],
            g.Odds_154_h = _[o][3],
            g.Odds_154_a = _[o][4],
            g.Odds_154_h = _[o][3],
            g.Odds_154_a = _[o][4],
            g.ResourceName_154 = _[o][5],
            setMoreObj(a ? OddsDataLObj : OddsDataObj, g);
            (g = new Object).OddsId = _[o][6],
            g.Value_155 = _[o][7],
            g.Odds_155_h = _[o][8],
            g.Odds_155_a = _[o][9],
            g.FavorF_155 = _[o][10],
            g.ResourceName_155 = _[o][11],
            setMoreObj(a ? OddsDataLObj : OddsDataObj, g);
            var g;
            (g = new Object).OddsId = _[o][12],
            g.Goal_156 = _[o][13],
            g.Odds_156_o = _[o][14],
            g.Odds_156_u = _[o][15],
            g.ResourceName_156 = _[o][16],
            setMoreObj(a ? OddsDataLObj : OddsDataObj, g)
        }
    return l += t.replace("\x3c!--MoreOdds--\x3e", s)
}
function updateAppendFields(e, a, d, _) {
    for (var s = 0; s < e.length; s++) {
        for (var t = e[s][0], l = d[t]; l < a.length && a[l].MUID == t; )
            a[l].MoreCount = e[s][e[s].length - 1],
            l++;
        _[t] = "updateAppend"
    }
}
function afterScoreChanged(e, a) {
    if (a < e.length && a >= 0 && e.length > 0) {
        var d = e[a]
          , _ = new Array;
        _.HomeName = d.HomeName,
        _.AwayName = d.AwayName,
        _.ScoreH = d.ScoreH,
        _.ScoreA = d.ScoreA,
        _.ShowTime = d.ShowTime,
        _.InjuryTime = d.InjuryTime;
        var s = fFrame.ScoreMsg;
        s = _formatTemplate(s, "{@", "}"),
        s = _replaceTags(_, s);
        new MsgBox(s,1e4,5,"MainMsg").openMsg()
    }
}
function ShowESportBanner(e) {
    if (null != e) {
        var a = "";
        if (0 == ESportBannerClosed && "43" == document.DataForm_D.Sport.value)
            if ($("#ESportBanner").css("display", "block"),
            e.length > 0) {
                a = "<div class='eBox'><div class='eLogo'></div><div class='icon-close' title='" + RES_CloseBanner + "' onclick='closeESportBanner();'></div>";
                var d = "";
                switch (fFrame.UserLang.toLowerCase()) {
                case "ch":
                    d = changeLanguage(e[0].Tournament, e[0].Tournament_TC);
                    break;
                case "cs":
                case "zhcn":
                    d = changeLanguage(e[0].Tournament, e[0].Tournament_SC);
                    break;
                default:
                    d = e[0].Tournament
                }
                a += '<div class="eTitle" title="' + d + '">' + d + "</div>",
                a += "<div class='eSCH'><div class='eTab'><ul class='eth'>",
                a += "<li>" + RES_Esport_Game + "</li><li class='Wmid'>" + RES_Esport_Tournament + "</li>",
                a += "<li class='Wsmll'>" + RES_Esport_StartDate + "</li><li></li><li class='Wsmll'>" + RES_Esport_EndDate + "</li><li class='Wxsmll'></li></ul></div>",
                a += "<div id='ESportScrollbar' class='eBody ScrollbarContent'  data-mcs-theme='dark'>";
                for (var _ = "", s = 1; s < e.length; s++) {
                    _ = s % 2 == 0 ? "bgeven" : "bgodd";
                    var t = e[s].LinkUrl;
                    a += "" != t && null != t ? "<div class='eTab " + _ + "' onClick=\"window.open('" + t + "');\">" : "<div class='eTab " + _ + "'>",
                    a += "<ul class='etd'>";
                    var l = ""
                      , r = "";
                    switch (fFrame.UserLang.toLowerCase()) {
                    case "ch":
                        l = changeLanguage(e[s].Game, e[s].Game_TC),
                        r = changeLanguage(e[s].Tournament, e[s].Tournament_TC);
                        break;
                    case "cs":
                    case "zhcn":
                        l = changeLanguage(e[s].Game, e[s].Game_SC),
                        r = changeLanguage(e[s].Tournament, e[s].Tournament_SC);
                        break;
                    default:
                        l = e[s].Game,
                        r = e[s].Tournament
                    }
                    a += "<li>" + l + "</li>",
                    a += "<li class='Wmid'>" + r + "</li>",
                    a += "<li class='Wsmll'>" + changeDateFormat(e[s].StartDate) + "</li><li>- </li><li class='Wsmll'>" + changeDateFormat(e[s].EndDate) + "</li>",
                    a += "" != t && null != t ? "<li class='Wxsmll'><span class='icon-link'></span></li>" : "<li class='Wxsmll'></li>",
                    a += "</ul>",
                    a += "</div>"
                }
                $("#ESportBanner").html(a),
                $("#ESportScrollbar").mCustomScrollbar()
            } else
                a = "<div class='eBox'>",
                a += "<div class='eLogo'></div>",
                a += "<div class='icon-close' title='" + RES_CloseBanner + "' onclick='closeESportBanner();'></div>",
                a += "<div class='eTitle' title=''></div>",
                a += "</div>",
                $("#ESportBanner").html(a)
    }
}
function getDrawHtml(e) {
    return e ? '<div class="HdpGoalClass">' + RES_DRAW + "</div>" : ""
}
function closeESportBanner() {
    $("#ESportBanner").css("display", "none"),
    ESportBannerClosed = !0
}
function openESportBanner() {
    $("#ESportBanner").css("display", "block"),
    ESportBannerClosed = !1
}
function ESportPop(e) {
    fFrame.openWindowsHandle("ESportInfo", !0, null, e, "scrollbars=yes,resizable=yes,top=0,left=0,width=800,Height=295", !1)
}
function changeDateFormat(e) {
    if (e) {
        e = (e = (e = e.replace(/-/g, "/")).replace("T", " ")).replace(/(\+[0-9]{2})(\:)([0-9]{2}$)/, " UTC$1$3");
        var a = new Date(e)
          , d = a.getMonth() + 1
          , _ = a.getDate();
        return (d < 10 ? "0" : "") + d + "/" + (_ < 10 ? "0" : "") + _ + "/" + a.getFullYear()
    }
}
function changeLanguage(e, a) {
    return "" == a || null == a ? e : a
}
function SwitchEsportsCategory(e, a) {
    EsportCategoryList[e] = a,
    FinalpaintOddsTable()
}
var CounterHandle_L, CounterHandle_D, NowTime, CLS_HDP_F = "FavTeamClass", CLS_HDP_N = "UdrDogTeamClass", CLS_PLAY_RED = "player-red", CLS_PLAY_BLUE = "player-blue", TR_0 = "bgcpe", TR_1 = "bgcpelight", ESPORTTAG = "bgodd", g_OddsKeeper_L = null, g_OddsKeeper_D = null, OddsData = [], OddsDataL = [], OddsData43 = [], OddsData43L = [], ajaxMainMatchData = [], ajaxLeagueList = [], ajaxTeamList = [], ajaxDisplayCatData = [], MatchIndex = [], MatchInfo = [], ajaxMainMatchDataL = [], ajaxLeagueListL = [], ajaxTeamListL = [], ajaxDisplayCatDataL = [], MatchIndexL = [], MatchInfoL = [], ooHash = null, MoreTmplCategory = [], MoreTmpSpecialLeague = [], MoreTmpSpecialEvent = [], MoreOddsTable = [], EsportCategoryList = [], MatchCategoryList = new Object, OddsDataObj = [], OddsDataLObj = [], DisplayMoreObj = new Object, EsportsDisplayMoreObj = new Object, fFrame = getParent(window), ESportBannerClosed = !1;
