function getParent(e) {
    for (var _ = e, a = 0; a < 4; a++) {
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
                for (var a = 0; a < e.length; a++)
                    e[a][27] = SwapOdds(e[a][27]),
                    e[a][28] = SwapOdds(e[a][28]),
                    e[a][32] = SwapOdds(e[a][32]),
                    e[a][33] = SwapOdds(e[a][33]),
                    e[a][40] = SwapOdds(e[a][40]),
                    e[a][41] = SwapOdds(e[a][41]),
                    e[a][45] = SwapOdds(e[a][45]),
                    e[a][46] = SwapOdds(e[a][46]);
            else {
                a = 20;
                for (e.length <= 50 && (a = 0); a < e.length; a++)
                    e[a][27] = SwapOdds(e[a][27]),
                    e[a][28] = SwapOdds(e[a][28]),
                    e[a][32] = SwapOdds(e[a][32]),
                    e[a][33] = SwapOdds(e[a][33]),
                    e[a][40] = SwapOdds(e[a][40]),
                    e[a][41] = SwapOdds(e[a][41]),
                    e[a][45] = SwapOdds(e[a][45]),
                    e[a][46] = SwapOdds(e[a][46])
            }
            break;
        case "UI":
            for (a = 0; a < e.length; a++)
                e[a][27] = SwapOdds(e[a][27]),
                e[a][28] = SwapOdds(e[a][28]),
                e[a][32] = SwapOdds(e[a][32]),
                e[a][33] = SwapOdds(e[a][33]),
                e[a][40] = SwapOdds(e[a][40]),
                e[a][41] = SwapOdds(e[a][41]),
                e[a][45] = SwapOdds(e[a][45]),
                e[a][46] = SwapOdds(e[a][46]);
            break;
        case "UO":
            for (a = 0; a < e.length; a++)
                switch (e[a][1]) {
                case 1:
                case 3:
                case 7:
                case 8:
                    e[a][4] = SwapOdds(e[a][4]),
                    e[a][5] = SwapOdds(e[a][5])
                }
        }
    return e
}
function ShowBetList(e, _, a, d, t, r, s, l, o, n) {
    if (tmpMMRTr_Cls_live = MMR_TR_1,
    tmpMMRTr_Cls = MMR_TR_1,
    tmpOnlyMROdds = OnlyMROdds,
    tmpNoShowMROdds = NoShowMROdds,
    aTimespan = (new Date).getTime(),
    CheckMoreObj(parseInt(document.DataForm_D.Sport.value, 10))) {
        if (retryCnt[parseInt(document.DataForm_D.Sport.value, 10)]++,
        retryCnt[parseInt(document.DataForm_D.Sport.value, 10)] < 20)
            return void window.setTimeout(function() {
                ShowBetList(e, _, a, d, t, r, s, l, o, n)
            }, 500);
        retryCnt[parseInt(document.DataForm_D.Sport.value, 10)] = 0
    }
    var i, M;
    if ("l" == a ? (i = document.DataForm_L,
    DataFrame_L,
    M = g_OddsKeeper_L) : (i = document.DataForm_D,
    DataFrame_D,
    M = g_OddsKeeper_D),
    i.CT.value = _,
    "U" == e) {
        if (null == M)
            return void ("l" == a ? refreshData_L() : refreshData_D());
        M.OddsType = i.OddsType.value,
        M.DataTags = ARR_FIELDS_DEF1[1],
        r = ConvertData(r, "UI"),
        o = ConvertData(o, "UO"),
        M.RegenEverytime = !0,
        M.refreshSportTypeOddsTable("1", d, t, r, s, l, o, n),
        OpenMoreDiv(parseInt(document.DataForm_D.Sport.value, 10)),
        "l" == a ? ++lcnt > 30 && (lcnt = 0,
        i.RT.value = "W") : ++dcnt > 20 && (dcnt = 0,
        i.RT.value = "W")
    } else {
        var m;
        switch ("l" == a ? (lcnt = 0,
        m = "L",
        (M = g_OddsKeeper_L = new OddsKeeper).tag = "L",
        M.TableContainer = document.getElementById("oTableContainer_L")) : (dcnt = 0,
        m = "D",
        (M = g_OddsKeeper_D = new OddsKeeper).tag = "D",
        M.TableContainer = document.getElementById("oTableContainer_D")),
        M.OddsType = "" == i.OddsType.value ? "4" : i.OddsType.value,
        fFrame.DisplayMode) {
        case "1":
            if (!initialTmpl("UnderOver_tmpl_1", "UnderOver_tmpl.php?form=1", "ShowBetList('" + e + "','" + _ + "','" + a + "', DataFrame_" + m + ".N" + a + ");"))
                return;
            M.afterNewEvent = afterNewEvent_1,
            M.setTemplate(fFrame.document.getElementById("UnderOver_tmpl_1").contentWindow),
            M.RegenEverytime = !1;
            break;
        case "1F":
            if (!initialTmpl("UnderOver_tmpl_1F", "UnderOver_tmpl.php?form=1F", "ShowBetList('" + e + "','" + _ + "','" + a + "', DataFrame_" + m + ".N" + a + ");"))
                return;
            M.afterNewEvent = afterNewEvent_1F,
            M.setTemplate(fFrame.document.getElementById("UnderOver_tmpl_1F").contentWindow),
            M.RegenEverytime = !0;
            break;
        case "1H":
            if (!initialTmpl("UnderOver_tmpl_1H", "UnderOver_tmpl.php?form=1H", "ShowBetList('" + e + "','" + _ + "','" + a + "', DataFrame_" + m + ".N" + a + ");"))
                return;
            M.afterNewEvent = afterNewEvent_1H,
            M.setTemplate(fFrame.document.getElementById("UnderOver_tmpl_1H").contentWindow),
            M.RegenEverytime = !0;
            break;
        default:
            if (!initialTmpl("UnderOver_tmpl_3", "UnderOver_tmpl.php?form=3", "ShowBetList('" + e + "','" + _ + "','" + a + "', DataFrame_" + m + ".N" + a + ");"))
                return;
            M.afterNewEvent = afterNewEvent_3,
            M.setTemplate(fFrame.document.getElementById("UnderOver_tmpl_3").contentWindow),
            M.RegenEverytime = !1
        }
        M.afterNewLeague = afterNewLeague,
        d = ConvertData(d, "W"),
        M.SportType = "1",
        M.SortType = "1" == document.DataForm_L.OrderBy.value ? 1 : 0,
        M.afterNewLeague = afterNewLeague,
        M.afterRepaintTable = afterRepaintTable,
        M.updateAppendFields = updateAppendFields,
        M.BetTypes = ARR_BETYPE_DEF[1],
        M.setDatas(d, ARR_FIELDS_DEF1[1]),
        FinalpaintOddsTable(),
        OpenMoreDiv(parseInt(document.DataForm_D.Sport.value, 10))
    }
}
function afterNewLeague(e, _, a) {
    return (a = a.replace("{@Market}", document.DataForm_D.Market.value)).replace("{@Refresh}", RES_REFRESH)
}
function updateAppendFields(e, _, a, d) {
    for (var t = 0; t < e.length; t++) {
        for (var r = e[t][0], s = a[r]; s < _.length && _[s].MUID == r; )
            _[s].RedCardH = e[t][1],
            _[s].RedCardA = e[t][2],
            _[s].MoreCount = e[t][3],
            _[s].IsSuperLive = e[t][4],
            _[s].IsFastMarket = e[t][5],
            _[s].GVType = e[t][6],
            _[s].IsLiveChart = e[t][7],
            _[s].IsMainMarket = e[t][8],
            _[s].GameStatus = e[t][9],
            s++;
        d[r] = "updateAppend"
    }
}
function afterNewEvent_1(e, _, a, d) {
    var t = !1
      , r = !1
      , s = e[_]
      , l = !1;
    if (_ == e.length - 1 ? l = !0 : e[_ + 1].MUID != s.MUID && (l = !0),
    !d && !isInPeriod(s))
        return "";
    (CheckOddsId(s.OddsId_301) || CheckOddsId(s.OddsId_302) || CheckOddsId(s.OddsId_303) || CheckOddsId(s.OddsId_304)) && (d ? r = !0 : t = !0);
    var o = new Array;
    d ? (0 == s.LivePeriod ? o.LiveTimeCls = "1" == s.CsStatus ? "HalfTime" : "IsLive" : (o.LiveTimeCls = "LiveTime",
    2 == s.LivePeriod && s.InjuryTime > 0 ? o.InjuryTime = "+" + s.InjuryTime : o.InjuryTime = ""),
    o.RedCardH = getRedCardHtml(parseInt(s.RedCardH, 10)),
    o.RedCardA = getRedCardHtml(parseInt(s.RedCardA, 10)),
    0 == s.Div ? (o.MMRTr_Cls = MMR_TR_0,
    o.Tr_Cls = "live",
    o.BgColor = GetLiveBGColor(s.Div),
    OnlyMROdds && r ? (tmpMMRTr_Cls_live = tmpMMRTr_Cls_live == MMR_TR_1 ? MMR_TR_0 : MMR_TR_1,
    o.MMRTr_Cls = tmpMMRTr_Cls_live,
    o.MoreTr_Cls = tmpMMRTr_Cls_live) : o.MoreTr_Cls = "live") : (OnlyMROdds && r ? (tmpMMRTr_Cls_live = tmpMMRTr_Cls_live == MMR_TR_1 ? MMR_TR_0 : MMR_TR_1,
    o.MMRTr_Cls = tmpMMRTr_Cls_live,
    o.MoreTr_Cls = tmpMMRTr_Cls_live) : (o.MMRTr_Cls = MMR_TR_0,
    o.MoreTr_Cls = "live"),
    o.Tr_Cls = "liveligh",
    o.BgColor = GetLiveBGColor(s.Div))) : 0 == s.Div ? (o.MMRTr_Cls = MMR_TR_0,
    o.Tr_Cls = TR_0,
    o.BgColor = GetEventBGColor(s.Div),
    OnlyMROdds && t ? (tmpMMRTr_Cls = tmpMMRTr_Cls == MMR_TR_1 ? MMR_TR_0 : MMR_TR_1,
    o.MMRTr_Cls = tmpMMRTr_Cls,
    o.MoreTr_Cls = tmpMMRTr_Cls) : o.MoreTr_Cls = TR_0) : (OnlyMROdds && t ? (tmpMMRTr_Cls = tmpMMRTr_Cls == MMR_TR_1 ? MMR_TR_0 : MMR_TR_1,
    o.MMRTr_Cls = tmpMMRTr_Cls,
    o.MoreTr_Cls = tmpMMRTr_Cls) : (o.MMRTr_Cls = MMR_TR_0,
    o.MoreTr_Cls = TR_1),
    o.Tr_Cls = TR_1,
    o.BgColor = GetEventBGColor(s.Div)),
    o.MMRBgColor = GetMMREventBGColor(o.MMRTr_Cls);
    var n = s.FavorF;
    o.HomeName = s.HomeName,
    o.AwayName = s.AwayName,
    o.Home_Cls = "h" == n ? CLS_HDP_F : CLS_HDP_N,
    o.Away_Cls = "a" == n ? CLS_HDP_F : CLS_HDP_N;
    var i = "" == s.FavorF ? "" : s.FavorF;
    if (o.Odds_1_H = "" != s.Odds_1_H && "" != s.Odds_1_A ? spreadCalculation("h" == i ? 1 : "a" == i ? -1 : "" == i ? 0 : i, "h", parseFloat(s.Odds_1_H), parseFloat(s.Odds_1_A), fFrame.OddsType) : "",
    o.Odds_1_A = "" != s.Odds_1_H && "" != s.Odds_1_A ? spreadCalculation("h" == i ? -1 : "a" == i ? 1 : "" == i ? 0 : i, "a", parseFloat(s.Odds_1_A), parseFloat(s.Odds_1_H), fFrame.OddsType) : "",
    o.ODDS_1_H = "" != s.Odds_1_H && "" != s.Odds_1_A ? ("h" == i ? 1 : "a" == i ? -1 : "" == i ? 0 : i) + ",h," + s.Odds_1_H + "," + s.Odds_1_A : "",
    o.ODDS_1_A = "" != s.Odds_1_H && "" != s.Odds_1_A ? ("h" == i ? -1 : "a" == i ? 1 : "" == i ? 0 : i) + ",a," + s.Odds_1_A + "," + s.Odds_1_H : "",
    i = "" == s.Goal_3 ? "" : s.Goal_3,
    o.Odds_3_O = "" != s.Odds_3_O && "" != s.Odds_3_U ? spreadCalculation("h" == i ? 1 : "a" == i ? -1 : "" == i ? 0 : i, "h", parseFloat(s.Odds_3_O), parseFloat(s.Odds_3_U), fFrame.OddsType) : "",
    o.Odds_3_U = "" != s.Odds_3_O && "" != s.Odds_3_U ? spreadCalculation("h" == i ? -1 : "a" == i ? 1 : "" == i ? 0 : i, "a", parseFloat(s.Odds_3_U), parseFloat(s.Odds_3_O), fFrame.OddsType) : "",
    o.ODDS_3_O = "" != s.Odds_3_O && "" != s.Odds_3_U ? "X,h," + s.Odds_3_O + "," + s.Odds_3_U : "",
    o.ODDS_3_U = "" != s.Odds_3_O && "" != s.Odds_3_U ? "X,a," + s.Odds_3_U + "," + s.Odds_3_O : "",
    i = "" == s.FavorH1 ? "" : s.FavorH1,
    o.Odds_7_H = "" != s.Odds_7_H && "" != s.Odds_7_A ? spreadCalculation("h" == i ? 1 : "a" == i ? -1 : "" == i ? 0 : i, "h", parseFloat(s.Odds_7_H), parseFloat(s.Odds_7_A), fFrame.OddsType) : "",
    o.Odds_7_A = "" != s.Odds_7_H && "" != s.Odds_7_A ? spreadCalculation("h" == i ? -1 : "a" == i ? 1 : "" == i ? 0 : i, "a", parseFloat(s.Odds_7_A), parseFloat(s.Odds_7_H), fFrame.OddsType) : "",
    o.ODDS_7_H = "" != s.Odds_7_H && "" != s.Odds_7_A ? ("h" == i ? 1 : "a" == i ? -1 : "" == i ? 0 : i) + ",h," + s.Odds_7_H + "," + s.Odds_7_A : "",
    o.ODDS_7_A = "" != s.Odds_7_H && "" != s.Odds_7_A ? ("h" == i ? -1 : "a" == i ? 1 : "" == i ? 0 : i) + ",a," + s.Odds_7_A + "," + s.Odds_7_H : "",
    i = "" == s.Goal_8 ? "" : s.Goal_8,
    o.Odds_8_O = "" != s.Odds_8_O && "" != s.Odds_8_U ? spreadCalculation("h" == i ? 1 : "a" == i ? -1 : "" == i ? 0 : i, "h", parseFloat(s.Odds_8_O), parseFloat(s.Odds_8_U), fFrame.OddsType) : "",
    o.Odds_8_U = "" != s.Odds_8_O && "" != s.Odds_8_U ? spreadCalculation("h" == i ? -1 : "a" == i ? 1 : "" == i ? 0 : i, "a", parseFloat(s.Odds_8_U), parseFloat(s.Odds_8_O), fFrame.OddsType) : "",
    o.ODDS_8_O = "" != s.Odds_8_O && "" != s.Odds_8_U ? "X,h," + s.Odds_8_O + "," + s.Odds_8_U : "",
    o.ODDS_8_U = "" != s.Odds_8_O && "" != s.Odds_8_U ? "X,a," + s.Odds_8_U + "," + s.Odds_8_O : "",
    o.Odds_1_H_Cls = o.Odds_1_H < 0 ? CLS_EVEN : CLS_ODD,
    o.Odds_1_A_Cls = o.Odds_1_A < 0 ? CLS_EVEN : CLS_ODD,
    o.Odds_3_O_Cls = o.Odds_3_O < 0 ? CLS_EVEN : CLS_ODD,
    o.Odds_3_U_Cls = o.Odds_3_U < 0 ? CLS_EVEN : CLS_ODD,
    o.Odds_7_H_Cls = o.Odds_7_H < 0 ? CLS_EVEN : CLS_ODD,
    o.Odds_7_A_Cls = o.Odds_7_A < 0 ? CLS_EVEN : CLS_ODD,
    o.Odds_8_O_Cls = o.Odds_8_O < 0 ? CLS_EVEN : CLS_ODD,
    o.Odds_8_U_Cls = o.Odds_8_U < 0 ? CLS_EVEN : CLS_ODD,
    o.isParlay = 0,
    "1" == s.TimerSuspend ? (o.TimeSuspendCls1 = CLS_LS_OFF,
    o.TimeSuspendCls = CLS_LS_ON) : (o.TimeSuspendCls1 = CLS_LS_ON,
    o.TimeSuspendCls = CLS_LS_OFF),
    o.Display_More = CLS_LS_OFF,
    o.More_Style = CLS_LS_OFF,
    o.SuperLive_Style = CLS_LS_OFF,
    o.FastMarket_Style = CLS_LS_OFF,
    l) {
        for (var M = _, m = e[M]; m.MUID == s.MUID; ) {
            if ((m = e[M]).MUID != s.MUID) {
                m = e[M + 1];
                break
            }
            if (0 == M) {
                m = e[0];
                break
            }
            M--
        }
        DisplayMoreHtml(parseInt(document.DataForm_D.Sport.value, 10), s.MUID, o, "Soccer_More"),
        o.More = getMoreLabel_1(s.MoreCount, m.OddsId_5, m.OddsId_15, o.Display_More == CLS_LS_ON ? "off" : ""),
        "" != o.More && (o.More_Style = ""),
        "True" == s.IsSuperLive && fFrame.CanSeeSuperLive && (o.SuperLive_Style = CLS_LS_ON),
        "True" == s.IsFastMarket && (o.FastMarket_Style = CLS_LS_ON)
    }
    if (o.MR_DISP1 = CLS_LS_OFF,
    o.MR_DISP2 = CLS_LS_ON,
    o.MR_DISP3 = CLS_LS_ON,
    0 == _ || e[_ - 1].MatchId != s.MatchId) {
        if (r || t) {
            o.MR_DISP1 = CLS_LS_ON,
            o.MR_DISP2 = CLS_LS_OFF;
            n = s.FavorF_301;
            o.HomeName = s.HomeName,
            o.AwayName = s.AwayName,
            o.Home_MR_Cls = "h" == n ? CLS_HDP_F : CLS_HDP_N,
            o.Away_MR_Cls = "a" == n ? CLS_HDP_F : CLS_HDP_N,
            "" == s.Odds_301_H ? o.Value_301 = "" : o.Value_301 = GenMRHdp("" == s.Value_301 ? 0 : s.Value_301, s.Percentage_301),
            "" == s.Odds_303_H ? o.Value_303 = "" : o.Value_303 = GenMRHdp("" == s.Value_303 ? 0 : s.Value_303, s.Percentage_303),
            "" == s.Odds_302_O ? o.Goal_302 = "" : o.Goal_302 = GenMRHdp("" == s.Goal_302 ? 0 : s.Goal_302, s.Percentage_302),
            "" == s.Odds_304_O ? o.Goal_304 = "" : o.Goal_304 = GenMRHdp("" == s.Goal_304 ? 0 : s.Goal_304, s.Percentage_304)
        }
        switch (s.GVType) {
        case "1":
            $("#MainFly").addClass(RNB_CSS),
            o.SportRadarInfo = getRunningHtml(s.MatchId, d ? "IsLive" : "", s.GVType, s.HomeName, s.AwayName);
            break;
        case "2":
            break;
        case "3":
            $("#MainFly").removeClass(RNB_CSS),
            o.SportRadarInfo = getSportRadarHtml(s.MatchId, d ? "IsLive" : "")
        }
        if (o.StatsInfo = "0" == s.StatsId ? "" : getStatsHtml(s.MatchId),
        o.LiveChart = "False" == s.IsLiveChart ? "" : getLiveChartHtml(s.MatchId),
        o.Streaming = getStreamingHtml(s.MatchId, s.StreamingId, d),
        o.Favorites = getFavoritesHtml(s.MUID, s.MatchCode, "1" == s.Favorite || "1" == s.FavLeague, d),
        o.FavLeagues = getFavLeaguesHtml(document.DataForm_D.Sport.value, s.LeagueId, "1" == s.FavLeague, d),
        o.ScoreMap = getScoreMapHtml(s.MatchId),
        d)
            switch (s.GameStatus) {
            case "1":
                o.GameStatus = '<div class="happen LiveTime" Title="' + RES_PRC_full + '"><b>' + RES_PRC + "</b></div>";
                break;
            case "2":
                o.GameStatus = '<div class="happen LiveTime" Title="' + RES_PPen_full + '"><b>' + RES_PPen + "</b></div>";
                break;
            case "3":
                o.GameStatus = '<div class="happen LiveTime" Title="' + RES_VAR_full + '"><b>' + RES_VAR + "</b></div>";
                break;
            case "4":
                o.GameStatus = '<div class="happen LiveTime" Title="' + RES_Pen_full + '"><b>' + RES_Pen + "</b></div>";
                break;
            case "5":
                o.GameStatus = '<div class="happen LiveTime" Title="' + RES_Inj_full + '"><b>' + RES_Inj + "</b></div>";
                break;
            default:
                o.GameStatus = ""
            }
    }
    if (o.TimerSuspend = s.TimerSuspend,
    OnlyMROdds && (o.MR_DISP3 = CLS_LS_OFF,
    o.Display_More = CLS_LS_OFF),
    NoShowMROdds && (o.MR_DISP1 = CLS_LS_OFF,
    o.MR_DISP2 = CLS_LS_ON),
    NoShowMROdds || o.MR_DISP1 == CLS_LS_OFF) {
        var O = new RegExp("\x3c!--MR_START--\x3e.*\x3c!--MR_END--\x3e");
        a = a.replace(O, "")
    } else
        a = (a = a.replace("\x3c!--MR_START--\x3e", "")).replace("\x3c!--MR_END--\x3e", "");
    if (OnlyMROdds || o.MR_DISP3 == CLS_LS_OFF) {
        var u = new RegExp("\x3c!--MY_START--\x3e.*\x3c!--MY_END--\x3e");
        a = a.replace(u, "")
    } else
        a = (a = a.replace("\x3c!--MY_START--\x3e", "")).replace("\x3c!--MY_END--\x3e", "");
    if ("" != o.More)
        a = (a = a.replace("\x3c!--SMORE_START--\x3e", "")).replace("\x3c!--SMORE_END--\x3e", "");
    else {
        var p = new RegExp("\x3c!--SMORE_START--\x3e.*\x3c!--SMORE_END--\x3e");
        a = a.replace(p, "")
    }
    return a = _formatTemplate(a, "{@", "}"),
    a = _replaceTags(o, a)
}
function CheckOddsId(e) {
    return void 0 !== e && (null != e && "" != e)
}
function GenMRHdp(e, _) {
    var a = parseInt(_);
    return a >= 0 ? e + " (" + a + ")" : e + ' <span style="color:#b50000;">(' + a + ")</span>"
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
function afterNewEvent_3(e, _, a, d) {
    var t = !1
      , r = !1
      , s = e[_]
      , l = !1;
    if (_ == e.length - 1 ? l = !0 : e[_ + 1].MUID != s.MUID && (l = !0),
    !d && !isInPeriod(s))
        return "";
    (CheckOddsId(s.OddsId_301) || CheckOddsId(s.OddsId_302) || CheckOddsId(s.OddsId_303) || CheckOddsId(s.OddsId_304)) && (d ? r = !0 : t = !0);
    var o = new Array;
    o.Market = document.DataForm_D.Market.value,
    o.HomeName = s.HomeName,
    o.AwayName = s.AwayName;
    var n = "" == s.FavorF ? "" : s.FavorF;
    switch (o.Odds_1_H = "" != s.Odds_1_H && "" != s.Odds_1_A ? spreadCalculation("h" == n ? 1 : "a" == n ? -1 : "" == n ? 0 : n, "h", parseFloat(s.Odds_1_H), parseFloat(s.Odds_1_A), fFrame.OddsType) : "",
    o.Odds_1_A = "" != s.Odds_1_H && "" != s.Odds_1_A ? spreadCalculation("h" == n ? -1 : "a" == n ? 1 : "" == n ? 0 : n, "a", parseFloat(s.Odds_1_A), parseFloat(s.Odds_1_H), fFrame.OddsType) : "",
    o.ODDS_1_H = "" != s.Odds_1_H && "" != s.Odds_1_A ? ("h" == n ? 1 : "a" == n ? -1 : "" == n ? 0 : n) + ",h," + s.Odds_1_H + "," + s.Odds_1_A : "",
    o.ODDS_1_A = "" != s.Odds_1_H && "" != s.Odds_1_A ? ("h" == n ? -1 : "a" == n ? 1 : "" == n ? 0 : n) + ",a," + s.Odds_1_A + "," + s.Odds_1_H : "",
    n = "" == s.Goal_3 ? "" : s.Goal_3,
    o.Odds_3_O = "" != s.Odds_3_O && "" != s.Odds_3_U ? spreadCalculation("h" == n ? 1 : "a" == n ? -1 : "" == n ? 0 : n, "h", parseFloat(s.Odds_3_O), parseFloat(s.Odds_3_U), fFrame.OddsType) : "",
    o.Odds_3_U = "" != s.Odds_3_O && "" != s.Odds_3_U ? spreadCalculation("h" == n ? -1 : "a" == n ? 1 : "" == n ? 0 : n, "a", parseFloat(s.Odds_3_U), parseFloat(s.Odds_3_O), fFrame.OddsType) : "",
    o.ODDS_3_O = "" != s.Odds_3_O && "" != s.Odds_3_U ? "X,h," + s.Odds_3_O + "," + s.Odds_3_U : "",
    o.ODDS_3_U = "" != s.Odds_3_O && "" != s.Odds_3_U ? "X,a," + s.Odds_3_U + "," + s.Odds_3_O : "",
    n = "" == s.FavorH1 ? "" : s.FavorH1,
    o.Odds_7_H = "" != s.Odds_7_H && "" != s.Odds_7_A ? spreadCalculation("h" == n ? 1 : "a" == n ? -1 : "" == n ? 0 : n, "h", parseFloat(s.Odds_7_H), parseFloat(s.Odds_7_A), fFrame.OddsType) : "",
    o.Odds_7_A = "" != s.Odds_7_H && "" != s.Odds_7_A ? spreadCalculation("h" == n ? -1 : "a" == n ? 1 : "" == n ? 0 : n, "a", parseFloat(s.Odds_7_A), parseFloat(s.Odds_7_H), fFrame.OddsType) : "",
    o.ODDS_7_H = "" != s.Odds_7_H && "" != s.Odds_7_A ? ("h" == n ? 1 : "a" == n ? -1 : "" == n ? 0 : n) + ",h," + s.Odds_7_H + "," + s.Odds_7_A : "",
    o.ODDS_7_A = "" != s.Odds_7_H && "" != s.Odds_7_A ? ("h" == n ? -1 : "a" == n ? 1 : "" == n ? 0 : n) + ",a," + s.Odds_7_A + "," + s.Odds_7_H : "",
    n = "" == s.Goal_8 ? "" : s.Goal_8,
    o.Odds_8_O = "" != s.Odds_8_O && "" != s.Odds_8_U ? spreadCalculation("h" == n ? 1 : "a" == n ? -1 : "" == n ? 0 : n, "h", parseFloat(s.Odds_8_O), parseFloat(s.Odds_8_U), fFrame.OddsType) : "",
    o.Odds_8_U = "" != s.Odds_8_O && "" != s.Odds_8_U ? spreadCalculation("h" == n ? -1 : "a" == n ? 1 : "" == n ? 0 : n, "a", parseFloat(s.Odds_8_U), parseFloat(s.Odds_8_O), fFrame.OddsType) : "",
    o.ODDS_8_O = "" != s.Odds_8_O && "" != s.Odds_8_U ? "X,h," + s.Odds_8_O + "," + s.Odds_8_U : "",
    o.ODDS_8_U = "" != s.Odds_8_O && "" != s.Odds_8_U ? "X,a," + s.Odds_8_U + "," + s.Odds_8_O : "",
    o.Odds_1_H_Cls = o.Odds_1_H < 0 ? CLS_EVEN : CLS_ODD,
    o.Odds_1_A_Cls = o.Odds_1_A < 0 ? CLS_EVEN : CLS_ODD,
    o.Odds_3_O_Cls = o.Odds_3_O < 0 ? CLS_EVEN : CLS_ODD,
    o.Odds_3_U_Cls = o.Odds_3_U < 0 ? CLS_EVEN : CLS_ODD,
    o.Odds_7_H_Cls = o.Odds_7_H < 0 ? CLS_EVEN : CLS_ODD,
    o.Odds_7_A_Cls = o.Odds_7_A < 0 ? CLS_EVEN : CLS_ODD,
    o.Odds_8_O_Cls = o.Odds_8_O < 0 ? CLS_EVEN : CLS_ODD,
    o.Odds_8_U_Cls = o.Odds_8_U < 0 ? CLS_EVEN : CLS_ODD,
    o.Draw = getDrawHtml("" != s.OddsId_5 || "" != s.OddsId_15),
    d ? (0 == s.LivePeriod ? o.LiveTimeCls = "1" == s.CsStatus ? "HalfTime" : "IsLive" : (o.LiveTimeCls = "LiveTime",
    2 == s.LivePeriod && s.InjuryTime > 0 ? o.InjuryTime = "+" + s.InjuryTime : o.InjuryTime = ""),
    o.RedCardH = getRedCardHtml(parseInt(s.RedCardH, 10)),
    o.RedCardA = getRedCardHtml(parseInt(s.RedCardA, 10)),
    0 == s.Div ? (o.MMRTr_Cls = MMR_TR_0,
    o.Tr_Cls = "live",
    o.BgColor = GetLiveBGColor(s.Div),
    OnlyMROdds && r ? (tmpMMRTr_Cls_live = tmpMMRTr_Cls_live == MMR_TR_1 ? MMR_TR_0 : MMR_TR_1,
    o.MMRTr_Cls = tmpMMRTr_Cls_live,
    o.MoreTr_Cls = tmpMMRTr_Cls_live) : o.MoreTr_Cls = "live") : (OnlyMROdds && r ? (tmpMMRTr_Cls_live = tmpMMRTr_Cls_live == MMR_TR_1 ? MMR_TR_0 : MMR_TR_1,
    o.MMRTr_Cls = tmpMMRTr_Cls_live,
    o.MoreTr_Cls = tmpMMRTr_Cls_live) : (o.MMRTr_Cls = MMR_TR_0,
    o.MoreTr_Cls = "liveligh"),
    o.Tr_Cls = "liveligh",
    o.BgColor = GetLiveBGColor(s.Div))) : 0 == s.Div ? (o.MMRTr_Cls = MMR_TR_0,
    o.Tr_Cls = TR_0,
    o.BgColor = GetEventBGColor(s.Div),
    OnlyMROdds && t ? (tmpMMRTr_Cls = tmpMMRTr_Cls == MMR_TR_1 ? MMR_TR_0 : MMR_TR_1,
    o.MMRTr_Cls = tmpMMRTr_Cls,
    o.MoreTr_Cls = tmpMMRTr_Cls) : o.MoreTr_Cls = TR_0) : (OnlyMROdds && t ? (tmpMMRTr_Cls = tmpMMRTr_Cls == MMR_TR_1 ? MMR_TR_0 : MMR_TR_1,
    o.MMRTr_Cls = tmpMMRTr_Cls,
    o.MoreTr_Cls = tmpMMRTr_Cls) : (o.MMRTr_Cls = MMR_TR_0,
    o.MoreTr_Cls = TR_1),
    o.Tr_Cls = TR_1,
    o.BgColor = GetEventBGColor(s.Div)),
    o.MMRBgColor = GetMMREventBGColor(o.MMRTr_Cls),
    s.FavorF) {
    case "h":
        o.Home_Cls = CLS_HDP_F,
        o.Away_Cls = CLS_HDP_N,
        o.Value_1_H = s.Value_1,
        o.Value_1_A = "";
        break;
    case "a":
        o.Home_Cls = CLS_HDP_N,
        o.Away_Cls = CLS_HDP_F,
        o.Value_1_H = "",
        o.Value_1_A = s.Value_1;
        break;
    default:
        o.Home_Cls = CLS_HDP_N,
        o.Away_Cls = CLS_HDP_N,
        "" != s.Odds_1_H ? o.Value_1_H = "0" : o.Value_1_H = "",
        o.Value_1_A = ""
    }
    switch (s.FavorH1) {
    case "h":
        o.Value_7_H = s.Value_7,
        o.Value_7_A = "";
        break;
    case "a":
        o.Value_7_H = "",
        o.Value_7_A = s.Value_7;
        break;
    default:
        "" != s.Odds_7_H ? o.Value_7_H = "0" : o.Value_7_H = "",
        o.Value_7_A = ""
    }
    if (o.UNDER_3 = "" == s.Goal_3 ? "" : RES_UNDER,
    o.UNDER_8 = "" == s.Goal_8 ? "" : RES_UNDER,
    o.isParlay = 0,
    "1" == s.TimerSuspend ? (o.TimeSuspendCls1 = CLS_LS_OFF,
    o.TimeSuspendCls = CLS_LS_ON) : (o.TimeSuspendCls1 = CLS_LS_ON,
    o.TimeSuspendCls = CLS_LS_OFF),
    o.Display_More = CLS_LS_OFF,
    o.More_Style = CLS_LS_OFF,
    o.SuperLive_Style = CLS_LS_OFF,
    o.FastMarket_Style = CLS_LS_OFF,
    l && (DisplayMoreHtml(parseInt(document.DataForm_D.Sport.value, 10), s.MUID, o, "Soccer_More"),
    "0" == s.MoreCount && (o.Display_More = CLS_LS_OFF),
    o.More = getMoreLabel_3(s.MoreCount, d),
    "" != o.More ? (o.More_Style = "",
    o.Display_More == CLS_LS_ON && (o.More_Style = "off")) : (o.Display_More = CLS_LS_OFF,
    o.MoreData = ""),
    "True" == s.IsSuperLive && fFrame.CanSeeSuperLive && (o.SuperLive_Style = CLS_LS_ON),
    "True" == s.IsFastMarket && (o.FastMarket_Style = CLS_LS_ON)),
    o.MR_DISP1 = CLS_LS_OFF,
    o.MR_DISP2 = CLS_LS_ON,
    o.MR_DISP3 = CLS_LS_ON,
    0 == _ || e[_ - 1].MatchId != s.MatchId) {
        if (r || t) {
            switch (o.MR_DISP1 = CLS_LS_ON,
            l || (o.MR_DISP2 = CLS_LS_OFF),
            s.FavorF_301) {
            case "h":
                o.Home_MR_Cls = CLS_HDP_F,
                o.Away_MR_Cls = CLS_HDP_N,
                o.Value_301_H = GenMRHdp("" == s.Value_301 ? 0 : s.Value_301, s.Percentage_301),
                o.Value_301_A = "";
                break;
            case "a":
                o.Home_MR_Cls = CLS_HDP_N,
                o.Away_MR_Cls = CLS_HDP_F,
                o.Value_301_H = "",
                o.Value_301_A = GenMRHdp("" == s.Value_301 ? 0 : s.Value_301, s.Percentage_301);
                break;
            default:
                o.Home_MR_Cls = CLS_HDP_N,
                o.Away_MR_Cls = CLS_HDP_N,
                "" != s.Odds_301_H ? o.Value_301_H = GenMRHdp(s.Value_301, s.Percentage_301) : o.Value_301_H = "",
                o.Value_301_A = ""
            }
            switch (s.FavorH_303) {
            case "h":
                o.Value_303_H = GenMRHdp("" == s.Value_303 ? 0 : s.Value_303, s.Percentage_303),
                o.Value_303_A = "";
                break;
            case "a":
                o.Value_303_H = "",
                o.Value_303_A = GenMRHdp("" == s.Value_303 ? 0 : s.Value_303, s.Percentage_303);
                break;
            default:
                "" != s.Odds_303_H ? o.Value_303_H = GenMRHdp(s.Value_303, s.Percentage_303) : o.Value_303_H = "",
                o.Value_303_A = ""
            }
            "" == s.Odds_302_O ? o.Goal_302 = "" : o.Goal_302 = GenMRHdp("" == s.Goal_302 ? 0 : s.Goal_302, s.Percentage_302),
            "" == s.Odds_304_O ? o.Goal_304 = "" : o.Goal_304 = GenMRHdp("" == s.Goal_304 ? 0 : s.Goal_304, s.Percentage_304),
            o.UNDER_302 = "" == o.Goal_302 ? "" : RES_UNDER,
            o.UNDER_304 = "" == o.Goal_304 ? "" : RES_UNDER
        }
        switch (o.ShowMatch = getShowMatchHtml(s.MatchId, 1, document.DataForm_D.Market.value),
        s.GVType) {
        case "1":
            $("#MainFly").addClass(RNB_CSS),
            o.SportRadarInfo = getRunningHtml(s.MatchId, d ? "IsLive" : "", s.GVType, s.HomeName, s.AwayName);
            break;
        case "2":
            break;
        case "3":
            $("#MainFly").removeClass(RNB_CSS),
            o.SportRadarInfo = getSportRadarHtml(s.MatchId, d ? "IsLive" : "")
        }
        o.StatsInfo = "0" == s.StatsId ? "" : getStatsHtml(s.MatchId),
        o.LiveChart = "False" == s.IsLiveChart ? "" : getLiveChartHtml(s.MatchId),
        o.Streaming = getStreamingHtml(s.MatchId, s.StreamingId, d);
        "1" == document.DataForm_L.OrderBy.value ? s.KickoffTime : s.MatchCode;
        if (o.Favorites = getFavoritesHtml(s.MUID, s.MatchCode, "1" == s.Favorite || "1" == s.FavLeague, d),
        o.FavLeagues = getFavLeaguesHtml(document.DataForm_D.Sport.value, s.LeagueId, "1" == s.FavLeague, d),
        o.ScoreMap = getScoreMapHtml(s.MatchId),
        d)
            switch (s.GameStatus) {
            case "1":
                o.GameStatus = '<div class="happen LiveTime" Title="' + RES_PRC_full + '"><b>' + RES_PRC + "</b></div>";
                break;
            case "2":
                o.GameStatus = '<div class="happen LiveTime" Title="' + RES_PPen_full + '"><b>' + RES_PPen + "</b></div>";
                break;
            case "3":
                o.GameStatus = '<div class="happen LiveTime" Title="' + RES_VAR_full + '"><b>' + RES_VAR + "</b></div>";
                break;
            case "4":
                o.GameStatus = '<div class="happen LiveTime" Title="' + RES_Pen_full + '"><b>' + RES_Pen + "</b></div>";
                break;
            case "5":
                o.GameStatus = '<div class="happen LiveTime" Title="' + RES_Inj_full + '"><b>' + RES_Inj + "</b></div>";
                break;
            default:
                o.GameStatus = ""
            }
    }
    if (o.MR_rowspan = "1",
    o.MR_dline = "",
    OnlyMROdds && (o.MR_rowspan = "2",
    o.MR_dline = "none_dline",
    o.MR_DISP3 = CLS_LS_OFF,
    o.MR_DISP2 = CLS_LS_OFF,
    o.Display_More = CLS_LS_OFF),
    NoShowMROdds && (o.MR_DISP1 = CLS_LS_OFF,
    o.MR_DISP2 = CLS_LS_ON),
    NoShowMROdds || o.MR_DISP1 == CLS_LS_OFF) {
        var i = new RegExp("\x3c!--MR_START--\x3e.*\x3c!--MR_END--\x3e");
        a = a.replace(i, "")
    } else
        a = (a = a.replace("\x3c!--MR_START--\x3e", "")).replace("\x3c!--MR_END--\x3e", "");
    if (OnlyMROdds || o.MR_DISP3 == CLS_LS_OFF) {
        var M = new RegExp("\x3c!--MY_START--\x3e.*\x3c!--MY_END--\x3e");
        a = a.replace(M, "")
    } else
        a = (a = a.replace("\x3c!--MY_START--\x3e", "")).replace("\x3c!--MY_END--\x3e", "");
    if ("" != o.More || "True" == s.IsSuperLive || "True" == s.IsFastMarket)
        a = (a = a.replace("\x3c!--SMORE_START--\x3e", "")).replace("\x3c!--SMORE_END--\x3e", ""),
        o.MY_rowspan = "2",
        o.MY_dline = "none_dline";
    else {
        o.MY_rowspan = "1",
        o.MR_rowspan = "1",
        o.MY_dline = "",
        o.MR_dline = "";
        var m = new RegExp("\x3c!--SMORE_START--\x3e.*\x3c!--SMORE_END--\x3e");
        a = a.replace(m, "")
    }
    return _replaceTags(o, _formatTemplate(a, "{@", "}"))
}
function afterNewEvent_1F(e, _, a, d) {
    var t = !1
      , r = !1
      , s = e[_]
      , l = !1;
    if (_ == e.length - 1 ? l = !0 : e[_ + 1].MUID != s.MUID ? l = !0 : "" == e[_ + 1].Value_1 && "" == e[_ + 1].OddsId_1 && "" == e[_ + 1].Goal_3 && "" == e[_ + 1].OddsId_3 && (l = !0),
    !d && !isInPeriod(s))
        return "";
    if ("" == s.Value_1 && "" == s.OddsId_1 && "" == s.Goal_3 && "" == s.OddsId_3 && "" == s.Value_301 && "" == s.OddsId_301 && "" == s.Goal_302 && "" == s.OddsId_302)
        return "";
    (CheckOddsId(s.OddsId_301) || CheckOddsId(s.OddsId_302)) && (d ? r = !0 : t = !0);
    var o = new Array;
    0 == _ && (TrFlag = !1),
    PreMatchId != s.MatchId && (TrFlag = !TrFlag),
    s.Div = TrFlag ? 0 : 1,
    d ? (0 == s.LivePeriod ? o.LiveTimeCls = "1" == s.CsStatus ? "HalfTime" : "IsLive" : (o.LiveTimeCls = "LiveTime",
    2 == s.LivePeriod && s.InjuryTime > 0 ? o.InjuryTime = "+" + s.InjuryTime : o.InjuryTime = ""),
    o.RedCardH = getRedCardHtml(parseInt(s.RedCardH, 10)),
    o.RedCardA = getRedCardHtml(parseInt(s.RedCardA, 10)),
    0 == s.Div ? (o.MMRTr_Cls = MMR_TR_0,
    o.Tr_Cls = "live",
    o.BgColor = GetLiveBGColor(s.Div),
    OnlyMROdds && r ? (tmpMMRTr_Cls_live = tmpMMRTr_Cls_live == MMR_TR_1 ? MMR_TR_0 : MMR_TR_1,
    o.MMRTr_Cls = tmpMMRTr_Cls_live,
    o.MoreTr_Cls = tmpMMRTr_Cls_live) : o.MoreTr_Cls = "live") : (OnlyMROdds && r ? (tmpMMRTr_Cls_live = tmpMMRTr_Cls_live == MMR_TR_1 ? MMR_TR_0 : MMR_TR_1,
    o.MMRTr_Cls = tmpMMRTr_Cls_live,
    o.MoreTr_Cls = tmpMMRTr_Cls_live) : (o.MMRTr_Cls = MMR_TR_0,
    o.MoreTr_Cls = "liveligh"),
    o.Tr_Cls = "liveligh",
    o.BgColor = GetLiveBGColor(s.Div))) : 0 == s.Div ? (o.MMRTr_Cls = MMR_TR_0,
    o.Tr_Cls = TR_0,
    o.BgColor = GetEventBGColor(s.Div),
    OnlyMROdds && t ? (tmpMMRTr_Cls = tmpMMRTr_Cls == MMR_TR_1 ? MMR_TR_0 : MMR_TR_1,
    o.MMRTr_Cls = tmpMMRTr_Cls,
    o.MoreTr_Cls = tmpMMRTr_Cls) : o.MoreTr_Cls = TR_0) : (OnlyMROdds && t ? (tmpMMRTr_Cls = tmpMMRTr_Cls == MMR_TR_1 ? MMR_TR_0 : MMR_TR_1,
    o.MMRTr_Cls = tmpMMRTr_Cls,
    o.MoreTr_Cls = tmpMMRTr_Cls) : (o.MMRTr_Cls = MMR_TR_0,
    o.MoreTr_Cls = TR_1),
    o.Tr_Cls = TR_1,
    o.BgColor = GetEventBGColor(s.Div)),
    o.MMRBgColor = GetMMREventBGColor(o.MMRTr_Cls);
    var n = s.FavorF;
    o.HomeName = s.HomeName,
    o.AwayName = s.AwayName,
    o.Home_Cls = "h" == n ? CLS_HDP_F : CLS_HDP_N,
    o.Away_Cls = "a" == n ? CLS_HDP_F : CLS_HDP_N;
    var i = "" == s.FavorF ? "" : s.FavorF;
    if (o.Odds_1_H = "" != s.Odds_1_H && "" != s.Odds_1_A ? spreadCalculation("h" == i ? 1 : "a" == i ? -1 : "" == i ? 0 : i, "h", parseFloat(s.Odds_1_H), parseFloat(s.Odds_1_A), fFrame.OddsType) : "",
    o.Odds_1_A = "" != s.Odds_1_H && "" != s.Odds_1_A ? spreadCalculation("h" == i ? -1 : "a" == i ? 1 : "" == i ? 0 : i, "a", parseFloat(s.Odds_1_A), parseFloat(s.Odds_1_H), fFrame.OddsType) : "",
    o.ODDS_1_H = "" != s.Odds_1_H && "" != s.Odds_1_A ? ("h" == i ? 1 : "a" == i ? -1 : "" == i ? 0 : i) + ",h," + s.Odds_1_H + "," + s.Odds_1_A : "",
    o.ODDS_1_A = "" != s.Odds_1_H && "" != s.Odds_1_A ? ("h" == i ? -1 : "a" == i ? 1 : "" == i ? 0 : i) + ",a," + s.Odds_1_A + "," + s.Odds_1_H : "",
    i = "" == s.Goal_3 ? "" : s.Goal_3,
    o.Odds_3_O = "" != s.Odds_3_O && "" != s.Odds_3_U ? spreadCalculation("h" == i ? 1 : "a" == i ? -1 : "" == i ? 0 : i, "h", parseFloat(s.Odds_3_O), parseFloat(s.Odds_3_U), fFrame.OddsType) : "",
    o.Odds_3_U = "" != s.Odds_3_O && "" != s.Odds_3_U ? spreadCalculation("h" == i ? -1 : "a" == i ? 1 : "" == i ? 0 : i, "a", parseFloat(s.Odds_3_U), parseFloat(s.Odds_3_O), fFrame.OddsType) : "",
    o.ODDS_3_O = "" != s.Odds_3_O && "" != s.Odds_3_U ? "X,h," + s.Odds_3_O + "," + s.Odds_3_U : "",
    o.ODDS_3_U = "" != s.Odds_3_O && "" != s.Odds_3_U ? "X,a," + s.Odds_3_U + "," + s.Odds_3_O : "",
    o.Odds_1_H_Cls = o.Odds_1_H < 0 ? CLS_EVEN : CLS_ODD,
    o.Odds_1_A_Cls = o.Odds_1_A < 0 ? CLS_EVEN : CLS_ODD,
    o.Odds_3_O_Cls = o.Odds_3_O < 0 ? CLS_EVEN : CLS_ODD,
    o.Odds_3_U_Cls = o.Odds_3_U < 0 ? CLS_EVEN : CLS_ODD,
    o.isParlay = 0,
    "1" == s.TimerSuspend ? (o.TimeSuspendCls1 = CLS_LS_OFF,
    o.TimeSuspendCls = CLS_LS_ON) : (o.TimeSuspendCls1 = CLS_LS_ON,
    o.TimeSuspendCls = CLS_LS_OFF),
    o.Display_More = CLS_LS_OFF,
    o.More_Style = CLS_LS_OFF,
    o.SuperLive_Style = CLS_LS_OFF,
    o.FastMarket_Style = CLS_LS_OFF,
    l) {
        for (var M = _, m = e[M]; m.MUID == s.MUID; ) {
            if ((m = e[M]).MUID != s.MUID) {
                m = e[M + 1];
                break
            }
            if (0 == M) {
                m = e[0];
                break
            }
            M--
        }
        DisplayMoreHtml(parseInt(document.DataForm_D.Sport.value, 10), s.MUID, o, "Soccer_More"),
        "0" == s.MoreCount && "" == m.OddsId_5 && (o.Display_More = CLS_LS_OFF),
        o.More = getMoreLabel_1(s.MoreCount, m.OddsId_5, m.OddsId_15, o.Display_More == CLS_LS_ON ? "off" : ""),
        "" != o.More && (o.More_Style = ""),
        "True" == s.IsSuperLive && fFrame.CanSeeSuperLive && (o.SuperLive_Style = CLS_LS_ON),
        "True" == s.IsFastMarket && (o.FastMarket_Style = CLS_LS_ON)
    }
    if (o.MR_DISP1 = CLS_LS_OFF,
    o.MR_DISP2 = CLS_LS_ON,
    o.MR_DISP3 = CLS_LS_ON,
    0 == _ || e[_ - 1].MatchId != s.MatchId) {
        if (r || t) {
            o.MR_DISP1 = CLS_LS_ON,
            o.MR_DISP2 = CLS_LS_OFF;
            n = s.FavorF_301;
            o.HomeName = s.HomeName,
            o.AwayName = s.AwayName,
            o.Home_MR_Cls = "h" == n ? CLS_HDP_F : CLS_HDP_N,
            o.Away_MR_Cls = "a" == n ? CLS_HDP_F : CLS_HDP_N,
            "" == s.Odds_301_H ? o.Value_301 = "" : o.Value_301 = GenMRHdp("" == s.Value_301 ? 0 : s.Value_301, s.Percentage_301),
            "" == s.Odds_302_O ? o.Goal_302 = "" : o.Goal_302 = GenMRHdp("" == s.Goal_302 ? 0 : s.Goal_302, s.Percentage_302)
        }
        switch (s.GVType) {
        case "1":
            $("#MainFly").addClass(RNB_CSS),
            o.SportRadarInfo = getRunningHtml(s.MatchId, d ? "IsLive" : "", s.GVType, s.HomeName, s.AwayName);
            break;
        case "2":
            break;
        case "3":
            $("#MainFly").removeClass(RNB_CSS),
            o.SportRadarInfo = getSportRadarHtml(s.MatchId, d ? "IsLive" : "")
        }
        if (o.StatsInfo = "0" == s.StatsId ? "" : getStatsHtml(s.MatchId),
        o.LiveChart = "False" == s.IsLiveChart ? "" : getLiveChartHtml(s.MatchId),
        o.Streaming = getStreamingHtml(s.MatchId, s.StreamingId, d),
        o.Favorites = getFavoritesHtml(s.MUID, s.MatchCode, "1" == s.Favorite || "1" == s.FavLeague, d),
        o.FavLeagues = getFavLeaguesHtml(document.DataForm_D.Sport.value, s.LeagueId, "1" == s.FavLeague, d),
        o.ScoreMap = getScoreMapHtml(s.MatchId),
        d)
            switch (s.GameStatus) {
            case "1":
                o.GameStatus = '<div class="happen LiveTime" Title="' + RES_PRC_full + '"><b>' + RES_PRC + "</b></div>";
                break;
            case "2":
                o.GameStatus = '<div class="happen LiveTime" Title="' + RES_PPen_full + '"><b>' + RES_PPen + "</b></div>";
                break;
            case "3":
                o.GameStatus = '<div class="happen LiveTime" Title="' + RES_VAR_full + '"><b>' + RES_VAR + "</b></div>";
                break;
            case "4":
                o.GameStatus = '<div class="happen LiveTime" Title="' + RES_Pen_full + '"><b>' + RES_Pen + "</b></div>";
                break;
            case "5":
                o.GameStatus = '<div class="happen LiveTime" Title="' + RES_Inj_full + '"><b>' + RES_Inj + "</b></div>";
                break;
            default:
                o.GameStatus = ""
            }
    }
    if (OnlyMROdds && (o.MR_DISP3 = CLS_LS_OFF,
    o.Display_More = CLS_LS_OFF),
    NoShowMROdds && (o.MR_DISP1 = CLS_LS_OFF,
    o.MR_DISP2 = CLS_LS_ON),
    NoShowMROdds || o.MR_DISP1 == CLS_LS_OFF) {
        var O = new RegExp("\x3c!--MR_START--\x3e.*\x3c!--MR_END--\x3e");
        a = a.replace(O, "")
    } else
        a = (a = a.replace("\x3c!--MR_START--\x3e", "")).replace("\x3c!--MR_END--\x3e", "");
    if (OnlyMROdds || o.MR_DISP3 == CLS_LS_OFF) {
        var u = new RegExp("\x3c!--MY_START--\x3e.*\x3c!--MY_END--\x3e");
        a = a.replace(u, "")
    } else
        a = (a = a.replace("\x3c!--MY_START--\x3e", "")).replace("\x3c!--MY_END--\x3e", "");
    if ("" != o.More)
        a = (a = a.replace("\x3c!--SMORE_START--\x3e", "")).replace("\x3c!--SMORE_END--\x3e", "");
    else {
        var p = new RegExp("\x3c!--SMORE_START--\x3e.*\x3c!--SMORE_END--\x3e");
        a = a.replace(p, "")
    }
    return a = _formatTemplate(a, "{@", "}"),
    a = _replaceTags(o, a)
}
function afterNewEvent_1H(e, _, a, d) {
    var t = !1
      , r = !1
      , s = e[_]
      , l = !1;
    if (_ == e.length - 1 ? l = !0 : e[_ + 1].MUID != s.MUID ? l = !0 : "" == e[_ + 1].Value_7 && "" == e[_ + 1].OddsId_7 && "" == e[_ + 1].Goal_8 && "" == e[_ + 1].OddsId_8 && (l = !0),
    !d && !isInPeriod(s))
        return "";
    if ("" == s.Value_7 && "" == s.OddsId_7 && "" == s.Goal_8 && "" == s.OddsId_8 && "" == s.Value_303 && "" == s.OddsId_303 && "" == s.Goal_304 && "" == s.OddsId_304)
        return "";
    (CheckOddsId(s.OddsId_303) || CheckOddsId(s.OddsId_304)) && (d ? r = !0 : t = !0);
    var o = new Array;
    0 == _ && (TrFlag = !1),
    PreMatchId != s.MatchId && (TrFlag = !TrFlag),
    s.Div = TrFlag ? 0 : 1,
    d ? (0 == s.LivePeriod ? o.LiveTimeCls = "1" == s.CsStatus ? "HalfTime" : "IsLive" : (o.LiveTimeCls = "LiveTime",
    2 == s.LivePeriod && s.InjuryTime > 0 ? o.InjuryTime = "+" + s.InjuryTime : o.InjuryTime = ""),
    o.RedCardH = getRedCardHtml(parseInt(s.RedCardH, 10)),
    o.RedCardA = getRedCardHtml(parseInt(s.RedCardA, 10)),
    0 == s.Div ? (o.MMRTr_Cls = MMR_TR_0,
    o.Tr_Cls = "live",
    o.BgColor = GetLiveBGColor(s.Div),
    OnlyMROdds && r ? (tmpMMRTr_Cls_live = tmpMMRTr_Cls_live == MMR_TR_1 ? MMR_TR_0 : MMR_TR_1,
    o.MMRTr_Cls = tmpMMRTr_Cls_live,
    o.MoreTr_Cls = tmpMMRTr_Cls_live) : o.MoreTr_Cls = "live") : (OnlyMROdds && r ? (tmpMMRTr_Cls_live = tmpMMRTr_Cls_live == MMR_TR_1 ? MMR_TR_0 : MMR_TR_1,
    o.MMRTr_Cls = tmpMMRTr_Cls_live,
    o.MoreTr_Cls = tmpMMRTr_Cls_live) : (o.MMRTr_Cls = MMR_TR_0,
    o.MoreTr_Cls = "liveligh"),
    o.Tr_Cls = "liveligh",
    o.BgColor = GetLiveBGColor(s.Div))) : 0 == s.Div ? (o.MMRTr_Cls = MMR_TR_0,
    o.Tr_Cls = TR_0,
    o.BgColor = GetEventBGColor(s.Div),
    OnlyMROdds && t ? (tmpMMRTr_Cls = tmpMMRTr_Cls == MMR_TR_1 ? MMR_TR_0 : MMR_TR_1,
    o.MMRTr_Cls = tmpMMRTr_Cls,
    o.MoreTr_Cls = tmpMMRTr_Cls) : o.MoreTr_Cls = TR_0) : (OnlyMROdds && t ? (tmpMMRTr_Cls = tmpMMRTr_Cls == MMR_TR_1 ? MMR_TR_0 : MMR_TR_1,
    o.MMRTr_Cls = tmpMMRTr_Cls,
    o.MoreTr_Cls = tmpMMRTr_Cls) : (o.MMRTr_Cls = MMR_TR_0,
    o.MoreTr_Cls = TR_1),
    o.Tr_Cls = TR_1,
    o.BgColor = GetEventBGColor(s.Div)),
    o.MMRBgColor = GetMMREventBGColor(o.MMRTr_Cls);
    var n = s.FavorH1;
    o.HomeName = s.HomeName,
    o.AwayName = s.AwayName,
    o.Home_Cls = "h" == n ? CLS_HDP_F : CLS_HDP_N,
    o.Away_Cls = "a" == n ? CLS_HDP_F : CLS_HDP_N;
    var i = "" == s.FavorH1 ? "" : s.FavorH1;
    if (o.Odds_7_H = "" != s.Odds_7_H && "" != s.Odds_7_A ? spreadCalculation("h" == i ? 1 : "a" == i ? -1 : "" == i ? 0 : i, "h", parseFloat(s.Odds_7_H), parseFloat(s.Odds_7_A), fFrame.OddsType) : "",
    o.Odds_7_A = "" != s.Odds_7_H && "" != s.Odds_7_A ? spreadCalculation("h" == i ? -1 : "a" == i ? 1 : "" == i ? 0 : i, "a", parseFloat(s.Odds_7_A), parseFloat(s.Odds_7_H), fFrame.OddsType) : "",
    o.ODDS_7_H = "" != s.Odds_7_H && "" != s.Odds_7_A ? ("h" == i ? 1 : "a" == i ? -1 : "" == i ? 0 : i) + ",h," + s.Odds_7_H + "," + s.Odds_7_A : "",
    o.ODDS_7_A = "" != s.Odds_7_H && "" != s.Odds_7_A ? ("h" == i ? -1 : "a" == i ? 1 : "" == i ? 0 : i) + ",a," + s.Odds_7_A + "," + s.Odds_7_H : "",
    i = "" == s.Goal_8 ? "" : s.Goal_8,
    o.Odds_8_O = "" != s.Odds_8_O && "" != s.Odds_8_U ? spreadCalculation("h" == i ? 1 : "a" == i ? -1 : "" == i ? 0 : i, "h", parseFloat(s.Odds_8_O), parseFloat(s.Odds_8_U), fFrame.OddsType) : "",
    o.Odds_8_U = "" != s.Odds_8_O && "" != s.Odds_8_U ? spreadCalculation("h" == i ? -1 : "a" == i ? 1 : "" == i ? 0 : i, "a", parseFloat(s.Odds_8_U), parseFloat(s.Odds_8_O), fFrame.OddsType) : "",
    o.ODDS_8_O = "" != s.Odds_8_O && "" != s.Odds_8_U ? "X,h," + s.Odds_8_O + "," + s.Odds_8_U : "",
    o.ODDS_8_U = "" != s.Odds_8_O && "" != s.Odds_8_U ? "X,a," + s.Odds_8_U + "," + s.Odds_8_O : "",
    o.Odds_7_H_Cls = o.Odds_7_H < 0 ? CLS_EVEN : CLS_ODD,
    o.Odds_7_A_Cls = o.Odds_7_A < 0 ? CLS_EVEN : CLS_ODD,
    o.Odds_8_O_Cls = o.Odds_8_O < 0 ? CLS_EVEN : CLS_ODD,
    o.Odds_8_U_Cls = o.Odds_8_U < 0 ? CLS_EVEN : CLS_ODD,
    o.isParlay = 0,
    "1" == s.TimerSuspend ? (o.TimeSuspendCls1 = CLS_LS_OFF,
    o.TimeSuspendCls = CLS_LS_ON) : (o.TimeSuspendCls1 = CLS_LS_ON,
    o.TimeSuspendCls = CLS_LS_OFF),
    o.Display_More = CLS_LS_OFF,
    o.More_Style = CLS_LS_OFF,
    o.SuperLive_Style = CLS_LS_OFF,
    o.FastMarket_Style = CLS_LS_OFF,
    l) {
        "True" == s.IsSuperLive && fFrame.CanSeeSuperLive && (o.SuperLive_Style = CLS_LS_ON),
        "True" == s.IsFastMarket && (o.FastMarket_Style = CLS_LS_ON);
        for (var M = _, m = e[M]; m.MUID == s.MUID; ) {
            if ((m = e[M]).MUID != s.MUID) {
                m = e[M + 1];
                break
            }
            if (0 == M) {
                m = e[0];
                break
            }
            M--
        }
        DisplayMoreHtml(parseInt(document.DataForm_D.Sport.value, 10), s.MUID, o, "Soccer_More"),
        "0" == s.MoreCount && "" == m.OddsId_15 && (o.Display_More = CLS_LS_OFF),
        o.More = getMoreLabel_1(s.MoreCount, m.OddsId_5, m.OddsId_15, o.Display_More == CLS_LS_ON ? "off" : ""),
        "" != o.More && (o.More_Style = "")
    }
    if (o.MR_DISP1 = CLS_LS_OFF,
    o.MR_DISP2 = CLS_LS_ON,
    o.MR_DISP3 = CLS_LS_ON,
    0 == _ || e[_ - 1].MatchId != s.MatchId) {
        if (r || t) {
            o.MR_DISP1 = CLS_LS_ON,
            o.MR_DISP2 = CLS_LS_OFF;
            n = s.FavorH_303;
            o.HomeName = s.HomeName,
            o.AwayName = s.AwayName,
            o.Home_MR_Cls = "h" == n ? CLS_HDP_F : CLS_HDP_N,
            o.Away_MR_Cls = "a" == n ? CLS_HDP_F : CLS_HDP_N,
            "" == s.Odds_303_H ? o.Value_303 = "" : o.Value_303 = GenMRHdp("" == s.Value_303 ? 0 : s.Value_303, s.Percentage_303),
            "" == s.Odds_304_O ? o.Goal_304 = "" : o.Goal_304 = GenMRHdp("" == s.Goal_304 ? 0 : s.Goal_304, s.Percentage_304)
        }
        switch (s.GVType) {
        case "1":
            $("#MainFly").addClass(RNB_CSS),
            o.SportRadarInfo = getRunningHtml(s.MatchId, d ? "IsLive" : "", s.GVType, s.HomeName, s.AwayName);
            break;
        case "2":
            break;
        case "3":
            $("#MainFly").removeClass(RNB_CSS),
            o.SportRadarInfo = getSportRadarHtml(s.MatchId, d ? "IsLive" : "")
        }
        if (o.StatsInfo = "0" == s.StatsId ? "" : getStatsHtml(s.MatchId),
        o.LiveChart = "False" == s.IsLiveChart ? "" : getLiveChartHtml(s.MatchId),
        o.Streaming = getStreamingHtml(s.MatchId, s.StreamingId, d),
        o.Favorites = getFavoritesHtml(s.MUID, s.MatchCode, "1" == s.Favorite || "1" == s.FavLeague, d),
        o.FavLeagues = getFavLeaguesHtml(document.DataForm_D.Sport.value, s.LeagueId, "1" == s.FavLeague, d),
        o.ScoreMap = getScoreMapHtml(s.MatchId),
        d)
            switch (s.GameStatus) {
            case "1":
                o.GameStatus = '<div class="happen LiveTime" Title="' + RES_PRC_full + '"><b>' + RES_PRC + "</b></div>";
                break;
            case "2":
                o.GameStatus = '<div class="happen LiveTime" Title="' + RES_PPen_full + '"><b>' + RES_PPen + "</b></div>";
                break;
            case "3":
                o.GameStatus = '<div class="happen LiveTime" Title="' + RES_VAR_full + '"><b>' + RES_VAR + "</b></div>";
                break;
            case "4":
                o.GameStatus = '<div class="happen LiveTime" Title="' + RES_Pen_full + '"><b>' + RES_Pen + "</b></div>";
                break;
            case "5":
                o.GameStatus = '<div class="happen LiveTime" Title="' + RES_Inj_full + '"><b>' + RES_Inj + "</b></div>";
                break;
            default:
                o.GameStatus = ""
            }
    }
    if (OnlyMROdds && (o.MR_DISP3 = CLS_LS_OFF,
    o.Display_More = CLS_LS_OFF),
    NoShowMROdds && (o.MR_DISP1 = CLS_LS_OFF,
    o.MR_DISP2 = CLS_LS_ON),
    NoShowMROdds || o.MR_DISP1 == CLS_LS_OFF) {
        var O = new RegExp("\x3c!--MR_START--\x3e.*\x3c!--MR_END--\x3e");
        a = a.replace(O, "")
    } else
        a = (a = a.replace("\x3c!--MR_START--\x3e", "")).replace("\x3c!--MR_END--\x3e", "");
    if (OnlyMROdds || o.MR_DISP3 == CLS_LS_OFF) {
        var u = new RegExp("\x3c!--MY_START--\x3e.*\x3c!--MY_END--\x3e");
        a = a.replace(u, "")
    } else
        a = (a = a.replace("\x3c!--MY_START--\x3e", "")).replace("\x3c!--MY_END--\x3e", "");
    if ("" != o.More)
        a = (a = a.replace("\x3c!--SMORE_START--\x3e", "")).replace("\x3c!--SMORE_END--\x3e", "");
    else {
        var p = new RegExp("\x3c!--SMORE_START--\x3e.*\x3c!--SMORE_END--\x3e");
        a = a.replace(p, "")
    }
    return a = _formatTemplate(a, "{@", "}"),
    a = _replaceTags(o, a)
}
function afterScoreChanged(e, _) {
    if (_ < e.length && _ >= 0 && e.length > 0) {
        var a = e[_]
          , d = new Array;
        d.HomeName = a.HomeName,
        d.AwayName = a.AwayName,
        d.ScoreH = a.ScoreH,
        d.ScoreA = a.ScoreA,
        d.ShowTime = a.ShowTime,
        "" != a.InjuryTime && "0" != a.InjuryTime ? d.InjuryTime = "+" + a.InjuryTime : d.InjuryTime = "";
        var t = fFrame.ScoreMsg;
        t = _formatTemplate(t, "{@", "}"),
        t = _replaceTags(d, t);
        new MsgBox(t,1e4,5,"MainMsg").openMsg()
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
    var a = document.getElementById("disstyle").value
      , d = document.getElementById("selPeriod").value;
    "1H" != a && "1F" != a && "0" == d || purgeLeagueRow_1H(e),
    document.getElementById("BetList").style.display = "none",
    document.getElementById("OddsTr").style.display = "block";
    var t = 0;
    e.tBodies.length > 0 && (t = e.tBodies.length - 1),
    e.tBodies[t].rows.length <= 1 ? (e.parentNode.style.display = "none",
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
function getMoreLabel_1(e, _, a, d) {
    if (0 == e)
        if ("1" == fFrame.DisplayMode) {
            if ("" == _ && "" == a)
                return ""
        } else if ("1F" == fFrame.DisplayMode) {
            if ("" == _)
                return ""
        } else if ("1H" == fFrame.DisplayMode) {
            if ("" == a)
                return ""
        } else if ("3" == fFrame.DisplayMode)
            return "";
    return '<span class="iconOdds more ' + d + '" title="' + RES_MORE + '"></span>'
}
function getMoreLabel_3(e) {
    return 0 == e ? "" : e
}
function purgeLeagueRow_1H(e) {
    var _, a = 0;
    e.tBodies.length > 0 && (a = e.tBodies.length - 1);
    for (var d = e.tBodies[a], t = d.rows.length - 1; t >= 0; t--)
        "l" == d.rows[t].id.charAt(0) ? _++ : _ = 0,
        _ > 1 && d.deleteRow(t);
    for (; d.rows.length > 0 && "l" == d.rows[d.rows.length - 1].id.charAt(0); )
        d.deleteRow(d.rows.length - 1)
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
    var a = _;
    eles.length <= _ ? a = eles.length : setTimeout("CalcOdds(" + _ + "," + (_ + 500) + ")", 50);
    for (var d = e; d < a; d++) {
        var t = eles[d]
          , r = t.getAttribute("o");
        if ("" != r) {
            var s = r.split(",")
              , l = t.innerHTML
              , o = spreadCalculation("X" == s[0] ? "X" : parseFloat(s[0]), s[1], parseFloat(s[2]), parseFloat(s[3]), fFrame.OddsType);
            t.innerHTML = o,
            t.href = t.href.replace("'" + l + "'", "'" + o + "'"),
            t.className = o < 0 ? CLS_EVEN : CLS_ODD
        }
    }
    a == eles.length && (btnstart(),
    eles = null)
}
function changeOddsType_ou(e) {
    // console.log(fFrame.leftx.document.fomBetProcess_Data.OddsType)
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
    "undefined" != typeof refreshMoreData && ("t" == PAGE_MARKET && 1 != fFrame.SiteMode && refreshMoreData_L(1),
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
    var a = document.getElementById("tdSelPeriod")
      , d = document.getElementById("selPeriod")
      , t = a.style.display;
    _ < 200 ? a.style.display = "none" : "t" != document.DataForm_D.Market.value ? a.style.display = "none" : e >= SEPERATE_TIME ? a.style.display = "none" : ("W" == document.DataForm_D.RT.value && (d.options[0].selected = !0),
    a.style.display = ""),
    a.style.display != t && "none" == a.style.display && (window.clearTimeout(CounterHandle_D),
    g_OddsKeeper_D.paintOddsTable())
}
function popMore(e, _, a, d, t, r, s) {
    document.getElementById("oPopContainer").innerHTML = "";
    var l = document.MoreForm.Market.value;
    document.MoreForm.MatchId.value = _,
    document.MoreForm.LeagueName.value = a,
    document.MoreForm.HomeName.value = d,
    document.MoreForm.AwayName.value = t,
    document.MoreForm.isParlay.value = r,
    "l" == s && (document.MoreForm.Market.value = s),
    document.MoreForm.action = "UnderOverPop.php",
    document.MoreForm.submit(),
    document.MoreForm.Market.value = l;
    var o = document.getElementById("PopDiv");
    o.style.width = e + 100 + "px";
    if (document.getElementById("PopTitleText").innerHTML = d + " -vs- " + t,
    null == PopLauncher) {
        var n = document.getElementById("PopTitle")
          , i = document.getElementById("PopCloser");
        PopLauncher = new DivLauncher(o,n,i)
    }
    PopLauncher.open(100, 120)
}
function popAD() {
    if (fFrame.PopupAD) {
        fFrame.PopupAD = !1;
        var e = document.getElementById("AcgDiv")
          , _ = document.getElementById("AcgTitleBar")
          , a = document.getElementById("AcgCloser");
        null != e && ((ADLauncher = new DivLauncher(e,_,a)).afterClose = ADafterClose,
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
          , a = document.getElementById("NewsCloser");
        null != e && (NewsLauncher = new DivLauncher(e,_,a)).open()
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
        success: function(a) {
            if ("" != a) {
                var d = document.getElementById("SelLeague")
                  , t = $("#LF").val();
                d.innerHTML = "",
                d.innerHTML = a,
                $("#LF").val(t)
            }
            setTimeout("SelectRefresh('" + e + "','" + _ + "')", 3e4)
        }
    })
}
function addFavorites(e, _, a, d) {
    var t, r = e.substr(2, e.length - 2), s = document.getElementById("fav_" + e), l = d && !siteObj._IsPhonebet ? g_OddsKeeper_L : g_OddsKeeper_D;
    1 == l.SortType ? (t = l.findIndex("KickoffTime", _),
    t = l.adjustIndex1st(t, "KickoffTime", _, e)) : (t = l.findIndex("MatchCode", _),
    t = l.adjustIndex1st(t, "MatchCode", _, e));
    var o = l.EventList[t].KickoffTime;
    a ? (s.parentElement.href = String.format("javascript:addFavorites('{0}','{1}',0,{2});", e, _, d),
    s.parentElement.title = fFrame.RES_AddFavorite,
    s.className = "iconOdds favorite",
    fav.location.href = "addFavorites.php?MatchId=" + r + "&Action=Delete&Time=" + o,
    l.EventList[t].MUID == e && (l.EventList[t].Favorite = "")) : (s.parentElement.href = String.format("javascript:addFavorites('{0}','{1}',1,{2});", e, _, d),
    s.parentElement.title = fFrame.RES_RemoveFavorite,
    s.className = "iconOdds favoriteAdd",
    fav.location.href = "addFavorites.php?MatchId=" + r + "&Action=Add&Time=" + o,
    l.EventList[t].MUID == e && (l.EventList[t].Favorite = "1"))
}
function getDrawHtml(e) {
    return e ? '<div class="HdpGoalClass">' + RES_DRAW + "</div>" : ""
}
function setRefreshMini(e, _) {
    var a = document.getElementById("miniver")
      , d = document.getElementById("column1")
      , t = document.getElementById("column2")
      , r = document.getElementById("tabbox")
      , s = document.getElementById("oTableContainer_L")
      , l = document.getElementById("oTableContainer_D")
      , o = document.getElementById("divSelectDate")
      , n = document.getElementById("HourContainer")
      , i = e.substring(0, 2);
    a.className = _,
    a.innerHTML = "<a href=\"javascript:setRefreshMini('" + _ + "','" + e + "');\"></a>",
    "ma" == i ? (setCookie("MiniKey", "max", 7, "", RES_DOMAIN),
    d.className = "column3",
    t.className = "column3",
    r.className = "tabbox",
    s.className = "tabbox_F",
    l.className = "tabbox_F",
    o.className = "EarlyMarket_top_bg",
    n.className = "EarlyMarket_top_bg") : (setCookie("MiniKey", "min", 7, "", RES_DOMAIN),
    d.className = "column3_75",
    t.className = "column3_75",
    r.className = "tabbox_75",
    s.className = "tabbox_F_75",
    l.className = "tabbox_F_75",
    o.className = "EarlyMarket_top_bg_75",
    n.className = "EarlyMarket_top_bg_75"),
    changeDisplayMode(fFrame.DisplayMode, RES_DOMAIN)
}
function updateHour(e, _, a) {
    currentHour = e;
    var d = document.getElementById("Tbl_TimeRange");
    if (_) {
        if ("" == Hourlbl[0])
            for (var t = 0; t < 9; t++)
                Hourlbl[t] = document.getElementById("HourSpan" + HourClass[t]).innerHTML;
        d.style.display = "",
        document.DataForm_D.DispRang.value = a,
        getHourData()
    } else
        document.DataForm_D.DispRang.value = "",
        d.style.display = "none"
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
            for (var a = document.getElementById("HourContainer"), d = 0; d < a.childNodes.length; d++) {
                var t = a.childNodes[d].tagName;
                null != t && "SPAN" == t.toUpperCase() && (a.childNodes[d].style.color = siteObj._4HourColor)
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
function afterNewLeague(e, _, a) {
    var d = e[_]
      , t = new Array;
    return t.FavLeagues = getFavLeaguesHtml(document.DataForm_D.Sport.value, d.LeagueId, "1" == d.FavLeague, !1),
    _replaceTags(t, _formatTemplate(a, "{@", "}"))
}
var arrTicks, CounterHandle_L, CounterHandle_D, fFrame = getParent(window), CLS_HDP_F = "FavTeamClass", CLS_HDP_N = "UdrDogTeamClass", TR_0 = "bgcpe", TR_1 = "bgcpelight", MMR_TR_0 = "mmbg", MMR_TR_1 = "mmbglight", tmpMMRTr_Cls_live = MMR_TR_1, tmpMMRTr_Cls = MMR_TR_1, SEPERATE_TIME = "1059", g_OddsKeeper_L = null, g_OddsKeeper_D = null, g_OddsKeeper = null, TrFlag = !1, InITIAL = !1, RNB_CSS = "GV";
"1H" == fFrame.DisplayMode && (fFrame.DisplayMode = "1F");
var aTimespan, PreMatchId, btnStartHandle_L, btnStartHandle_D, g_SelDisstyle_InnerHTML, PopLauncher, ADLauncher, NewsLauncher, HADLauncher, sKeeper_Soccer = null, tmpOnlyMROdds = null, tmpNoShowMROdds = null, lcnt = 0, dcnt = 0, eles = null, currentHour = 0, changeDay = !1, Hourlbl = new Array, HourClass = new Array;
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
var g_HourOptioner, div_4hour_x, isIe = !!window.ActiveXObject;
