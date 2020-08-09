function getParent(e) {
    for (var t = e, n = 0; n < 4; n++) {
        if (null != t.SiteMode)
            return t;
        t = t.parent
    }
    return null
}
function SwitchBettingMode(e, t) {
    $("#BPOddsChangeAlert").css("display", "none"),
    $("#HRBPOddsChangeAlert").css("display", "none"),
    $("#Bingo_BPOddsChangeAlert").css("display", "none"),
    $("#ParlayOddsChangeAlert").css("display", "none"),
    $("#MessageAlertContainer").css("display", "none");
    var n = GetCurrentSingleTag()
      , a = document.getElementById(n)
      , l = document.getElementById("Betslip")
      , d = document.getElementById("div_MixParlay")
      , o = document.getElementById("ParlayDetail")
      , s = document.getElementById("noparlayinfo")
      , m = document.getElementById("div_menu_single")
      , r = document.getElementById("div_menu_multiple")
      , i = document.getElementById("div_menu_parlay")
      , u = (document.getElementById("txtSingleEachWay"),
    document.getElementById("sporttype").value);
    "" != u || "151" != fFrame.LastSelectedSport && "152" != fFrame.LastSelectedSport && "153" != fFrame.LastSelectedSport || (u = fFrame.LastSelectedSport);
    var c = !1;
    if ("151" != u && "152" != u && "153" != u || (c = !0),
    null != a && null != l)
        if (0 == e) {
            if (ParlayOddsUPD = !1,
            m.className = "R_menu_R current",
            r.className = "R_menu_gr",
            i.className = "R_menu_gr",
            a.style.display = "",
            l.style.display = "none",
            d.style.display = "none",
            o.style.display = "none",
            s.style.display = "none",
            0 == fFrame.LastSingleType) {
                if ("none" != document.getElementById("BetProcessContainer").style.display)
                    if (c)
                        try {
                            document.getElementById("HorseBPstake").focus()
                        } catch (e) {}
                    else
                        try {
                            document.getElementById("BPstake").focus()
                        } catch (e) {}
            } else if (1 == fFrame.LastSingleType && "none" != document.getElementById("BingoBetProcessContainer").style.display)
                try {
                    document.getElementById("Bingo_BPstake").focus()
                } catch (e) {}
            var y = !1;
            "1" == t && (y = !0,
            boolDelParlay = !1),
            "none" != document.getElementById("BingoBetProcessContainer").style.display && (y = !1),
            fFrame.LastBettingMode = e,
            null == tmp_obj ? OddsKeepCountTime(tmp_obj) : "FScreen" == tmp_obj.id ? FreezeScreen(tmp_obj) : OddsKeepCountTime(tmp_obj),
            y && ParlayToSingle(),
            0 == fFrame.LastSingleType && "none" == document.getElementById("BP_SPORT").style.display && "none" == document.getElementById("BP_RACE").style.display && $("#MessageAlertContainer").css("display", ""),
            0 == fFrame.LastSingleType && "" == document.getElementById("menuTitle").innerHTML && "" == document.getElementById("menuTitle").style.display && "" == document.getElementById("BP_SPORT").style.display && (document.getElementById("BP_SPORT").style.display = "none",
            $("#MessageAlertContainer").css("display", "")),
            0 == fFrame.LastSingleType && "" == document.getElementById("hrmenuTitle").innerHTML && "" == document.getElementById("BP_RACE").style.display && (document.getElementById("BP_RACE").style.display = "none",
            $("#MessageAlertContainer").css("display", ""))
        } else
            1 == e ? (ParlayOddsUPD = !1,
            m.className = "R_menu_gr",
            r.className = "R_menu_R current",
            i.className = "R_menu_gr",
            a.style.display = "none",
            l.style.display = "",
            d.style.display = "none",
            o.style.display = "none",
            s.style.display = "none",
            FocusInputBox(),
            DropTimeoutHandlers(),
            fFrame.LastBettingMode = e) : 2 == e && ("1" == t && (ParlayOddsUPD ? ParlayOddsUPD = !1 : DelParlay("ReloadParlayData")),
            m.className = "R_menu_gr",
            r.className = "R_menu_gr",
            i.className = "R_menu_gr current",
            a.style.display = "none",
            l.style.display = "none",
            d.style.display = "",
            o.style.display = "",
            DropTimeoutHandlers(),
            fFrame.LastBettingMode = e)
}
function GetCurrentSingleTag() {
    return 0 == fFrame.LastSingleType ? "BetProcessContainer" : 1 == fFrame.LastSingleType ? "BingoBetProcessContainer" : ""
}
function ChangeDisplayMode(e, t, n, a) {
    if (IsPageLoadCompleted()) {
        if ("1" == fFrame.SiteMode) {
            var l = document.getElementById("txt_betcredit").innerHTML.replace(/,/g, "");
            document.getElementById("txt_betcreditInfo").innerHTML = addCommas(Math.floor(l) + "")
        }
        switch (e) {
        case "acF":
            document.getElementById("div_accountInfoFull").style.display = "block",
            document.getElementById("div_accountInfoMini").style.display = "none",
            document.getElementById("BettingModeContainer").style.display = "none",
            document.getElementById("BetProcessContainer").style.display = "none",
            document.getElementById("Betslip").style.display = "none",
            null != document.getElementById("BingoBetProcessContainer") && (document.getElementById("BingoBetProcessContainer").style.display = "none"),
            document.getElementById("SuccessBetContainer").style.display = "none",
            document.getElementById("MessageDisplayContainer").style.display = "none",
            document.getElementById("MessageAlertContainer").style.display = "none",
            ("2" != fFrame.SiteMode || "1" != fFrame.Deposit_SiteMode && "2" != fFrame.Deposit_SiteMode && "7" != fFrame.Deposit_SiteMode) && (document.getElementById("div_menu").style.display = "none"),
            document.getElementById("MenuContainer").style.display = "",
            document.getElementById("div_MixParlay").style.display = "none",
            // IsDela || (document.getElementById("div_WaitingBets").style.display = "none",
            IsDela || (document.getElementById("div_WaitingBets").style.display = "block",
            document.getElementById("div_VoidTicket").style.display = "none",
            document.getElementById("div_BetListMini").style.display = "none"),
            DoLeftMenuDisplay(),
            "1" == fFrame.SiteMode && (document.getElementById("BetProcessPhoneContainer").style.display = "none"),
            openMenu(userlang),
            AccountTimeOut = window.setTimeout("ReloadWaitingBetList('yes','no','fromTimer')", 3e4);
            break;
        case "acM":
            IsDela || IsZzun88 || IsMayfair ? (document.getElementById("div_accountInfoMini").style.display = "none",
            document.getElementById("div_accountInfoFull").style.display = "block") : (document.getElementById("div_accountInfoMini").style.display = "block",
            document.getElementById("div_accountInfoFull").style.display = "none");
            break;
        case "Amp":
            document.getElementById("btnMPSubmit").disabled = !1,
            document.getElementById("MessageDisplayContainer").style.display = "none",
            document.getElementById("MessageAlertContainer").style.display = "none",
            document.getElementById("div_accountInfoFull").style.display = IsDela || IsZzun88 || IsMayfair ? "" : "none",
            document.getElementById("div_accountInfoMini").style.display = "",
            ("2" != fFrame.SiteMode || "1" != fFrame.Deposit_SiteMode && "2" != fFrame.Deposit_SiteMode && "7" != fFrame.Deposit_SiteMode) && (document.getElementById("div_menu").style.display = "none",
            IsM88 || IsDela || IsSuncity || IsMayfair || "4270" == fFrame.SiteId || "4200700" == fFrame.siteId || "4201100" == fFrame.siteId || "4201200" == fFrame.SiteId || "4200200" == fFrame.SiteId ? document.getElementById("div_favorite").style.display = "none" : IsALog && (document.getElementById("div_favorite").style.display = "none",
            document.getElementById("div_howtobet").style.display = "none")),
            document.getElementById("MenuContainer").style.display = "none",
            document.getElementById("div_MixParlay").style.display = "block",
            document.getElementById("div_WaitingBets").style.display = "none",
            document.getElementById("div_VoidTicket").style.display = "none",
            document.getElementById("div_BetListMini").style.display = "none",
            document.getElementById("BettingModeContainer").style.display = RES_Open_Multi || RES_Open_Multi_Parlay ? "" : "none",
            document.getElementById("div_menu_multiple").style.display = RES_Open_Multi ? "" : "none",
            document.getElementById("div_menu_parlay").style.display = RES_Open_Multi_Parlay ? "" : "none",
            ProcessBetTimeoutHandler = window.setTimeout("ReloadWaitingBetList('no','no','fromTimer')", 45e3);
            break;
        case "Dmp":
            document.getElementById("div_MixParlay").style.display = "block",
            document.getElementById("div_WaitingBets").style.display = "none",
            document.getElementById("div_VoidTicket").style.display = "none";
            break;
        case "Cmp":
            document.getElementById("ParlayDetail").innerHTML = "",
            document.getElementById("MessageDisplayContainer").style.display = "none",
            document.getElementById("MessageAlertContainer").style.display = "none",
            document.getElementById("div_accountInfoFull").style.display = IsDela || IsZzun88 || IsMayfair ? "" : "none",
            document.getElementById("div_accountInfoMini").style.display = "",
            ("2" != fFrame.SiteMode || "1" != fFrame.Deposit_SiteMode && "2" != fFrame.Deposit_SiteMode && "7" != fFrame.Deposit_SiteMode) && (document.getElementById("div_menu").style.display = "",
            IsM88 || IsDela || IsSuncity || IsMayfair || "4270" == fFrame.SiteId || "4200700" == fFrame.SiteId || "4201100" == fFrame.SiteId || "4201200" == fFrame.SiteId || "4200200" == fFrame.SiteId ? document.getElementById("div_favorite").style.display = "" : IsALog && (document.getElementById("div_favorite").style.display = "",
            document.getElementById("div_howtobet").style.display = "")),
            document.getElementById("MenuContainer").style.display = "inline",
            document.getElementById("div_MixParlay").style.display = "none",
            document.getElementById("div_WaitingBets").style.display = "block",
            document.getElementById("div_VoidTicket").style.display = "none",
            document.getElementById("div_BetListMini").style.display = "none";
            break;
        case "wb":
            document.getElementById("BettingModeContainer").style.display = "none",
            document.getElementById("BetProcessContainer").style.display = "none",
            document.getElementById("Betslip").style.display = "none",
            null != document.getElementById("BingoBetProcessContainer") && (document.getElementById("BingoBetProcessContainer").style.display = "none"),
            "1" == fFrame.SiteMode && (document.getElementById("BetProcessPhoneContainer").style.display = "none"),
            ShowSuccessBet || (document.getElementById("SuccessBetContainer").style.display = "none"),
            document.getElementById("MessageDisplayContainer").style.display = "none",
            document.getElementById("MessageAlertContainer").style.display = "none",
            document.getElementById("div_accountInfoFull").style.display = IsDela || IsZzun88 || IsMayfair ? "block" : "none",
            document.getElementById("div_accountInfoMini").style.display = "",
            ("2" != fFrame.SiteMode || "1" != fFrame.Deposit_SiteMode && "2" != fFrame.Deposit_SiteMode && "7" != fFrame.Deposit_SiteMode) && (document.getElementById("div_menu").style.display = "",
            IsM88 || IsDela || IsSuncity || IsMayfair || "4270" == fFrame.SiteId || "4200700" == fFrame.SiteId || "4201100" == fFrame.SiteId || "4201200" == fFrame.SiteId || "4200200" == fFrame.SiteId ? document.getElementById("div_favorite").style.display = "" : IsALog && (document.getElementById("div_favorite").style.display = "",
            document.getElementById("div_howtobet").style.display = "")),
            document.getElementById("MenuContainer").style.display = "inline",
            "2" != fFrame.SiteMode && "3" != fFrame.SiteMode || IsM88 || IsALog || IsDela || IsSuncity || IsMayfair || "4270" == fFrame.SiteId || "4200700" == fFrame.SiteId || "4201100" == fFrame.SiteId || "4201200" == fFrame.SiteId || "4200200" == fFrame.SiteId ? "yes" == t ? openMenu(userlang) : "no" == t && hideMenu(userlang) : openMenu(userlang),
            document.getElementById("div_MixParlay").style.display = "none",
            document.getElementById("div_WaitingBets").style.display = "block",
            document.getElementById("div_BetListMini").style.display = "none",
            document.getElementById("div_VoidTicket").style.display = "none";
            break;
        case "bm":
            document.getElementById("MessageDisplayContainer").style.display = "none",
            document.getElementById("MessageAlertContainer").style.display = "none",
            document.getElementById("BettingModeContainer").style.display = "none",
            document.getElementById("BetProcessContainer").style.display = "none",
            //document.getElementById("Betslip").style.display = "none",
            //null != document.getElementById("BingoBetProcessContainer") && (document.getElementById("BingoBetProcessContainer").style.display = "none"),
            //"1" == fFrame.SiteMode && (document.getElementById("BetProcessPhoneContainer").style.display = "none"),
            //document.getElementById("div_accountInfoFull").style.display = IsDela || IsZzun88 || IsMayfair ? "block" : "none",
            //document.getElementById("div_accountInfoMini").style.display = "",
            //document.getElementById("div_WaitingBets").style.display = "none",
            //document.getElementById("div_VoidTicket").style.display = "none",
            //("2" != fFrame.SiteMode || "1" != fFrame.Deposit_SiteMode && "2" != fFrame.Deposit_SiteMode && "7" != fFrame.Deposit_SiteMode) && (document.getElementById("div_menu").style.display = "",
            //IsM88 || IsDela || IsSuncity || IsMayfair || "4270" == fFrame.SiteId || "4200700" == fFrame.SiteId || "4201100" == fFrame.SiteId || "4201200" == fFrame.SiteId || "4200200" == fFrame.SiteId ? document.getElementById("div_favorite").style.display = "" : IsALog && (document.getElementById("div_favorite").style.display = "",
            //document.getElementById("div_howtobet").style.display = "")),
            document.getElementById("left_sport_menu").style.display = "",
            //"2" != fFrame.SiteMode && "3" != fFrame.SiteMode || IsM88 || IsALog || IsDela || IsSuncity || IsMayfair || "4270" == fFrame.SiteId || "4200700" == fFrame.SiteId || "4201100" == fFrame.SiteId || "4201200" == fFrame.SiteId || "4200200" == fFrame.SiteId ? "yes" == t ? openMenu(userlang) : hideMenu(userlang) : openMenu(userlang),
            //document.getElementById("div_MixParlay").style.display = "none",
            //IsDela || (document.getElementById("div_WaitingBets").style.display = "none"),
            document.getElementById("left_wait_bet_list").style.display = "block",
            DoLeftMenuDisplay();
            break;
        case "Vtk":
            document.getElementById("MessageDisplayContainer").style.display = "none",
            document.getElementById("MessageAlertContainer").style.display = "none",
            document.getElementById("BettingModeContainer").style.display = "none",
            document.getElementById("BetProcessContainer").style.display = "none",
            document.getElementById("Betslip").style.display = "none",
            null != document.getElementById("BingoBetProcessContainer") && (document.getElementById("BingoBetProcessContainer").style.display = "none"),
            "1" == fFrame.SiteMode && (document.getElementById("BetProcessPhoneContainer").style.display = "none"),
            document.getElementById("div_accountInfoFull").style.display = IsDela || IsZzun88 || IsMayfair ? "block" : "none",
            document.getElementById("div_accountInfoMini").style.display = "",
            document.getElementById("div_WaitingBets").style.display = "none",
            ("2" != fFrame.SiteMode || "1" != fFrame.Deposit_SiteMode && "2" != fFrame.Deposit_SiteMode && "7" != fFrame.Deposit_SiteMode) && (document.getElementById("div_menu").style.display = "",
            IsM88 || IsDela || IsSuncity || IsMayfair || "4270" == fFrame.SiteId || "4200700" == fFrame.SiteId || "4201100" == fFrame.SiteId || "4201200" == fFrame.SiteId || "4200200" == fFrame.SiteId ? document.getElementById("div_favorite").style.display = "" : IsALog && (document.getElementById("div_favorite").style.display = "",
            document.getElementById("div_howtobet").style.display = "")),
            document.getElementById("MenuContainer").style.display = "",
            "2" != fFrame.SiteMode && "3" != fFrame.SiteMode || IsM88 || IsALog || IsDela || IsSuncity || IsMayfair || "4270" == fFrame.SiteId || "4200700" == fFrame.SiteId || "4201100" == fFrame.SiteId || "4201200" == fFrame.SiteId || "4200200" == fFrame.SiteId ? "yes" == t ? openMenu(userlang) : hideMenu(userlang) : openMenu(userlang),
            document.getElementById("div_MixParlay").style.display = "none",
            document.getElementById("div_BetListMini").style.display = "none",
            document.getElementById("div_VoidTicket").style.display = "block",
            DoLeftMenuDisplay();
            break;
        case "betO":
            ClearOTStake(),
            DropTimeoutHandlers(),
            fFrame.LastSingleType = 0,
            document.getElementById("MessageDisplayContainer").style.display = "none",
            document.getElementById("MessageAlertContainer").style.display = "none",
            CtrlSubmitBtnDisabled(!1),
            document.getElementById("div_accountInfoFull").style.display = "none",
            document.getElementById("div_accountInfoMini").style.display = "",
            ("2" != fFrame.SiteMode || "1" != fFrame.Deposit_SiteMode && "2" != fFrame.Deposit_SiteMode && "7" != fFrame.Deposit_SiteMode) && (document.getElementById("div_menu").style.display = "none",
            IsM88 || IsDela || IsSuncity || IsMayfair || "4270" == fFrame.SiteId || "4200700" == fFrame.SiteId || "4201100" == fFrame.SiteId || "4201200" == fFrame.SiteId || "4200200" == fFrame.SiteId ? document.getElementById("div_favorite").style.display = "none" : IsALog && (document.getElementById("div_favorite").style.display = "none",
            document.getElementById("div_howtobet").style.display = "none")),
            document.getElementById("MenuContainer").style.display = "none",
            document.getElementById("SuccessBetContainer").style.display = "none",
            null != document.getElementById("BingoBetProcessContainer") && (document.getElementById("BingoBetProcessContainer").style.display = "none"),
            document.getElementById("BettingModeContainer").style.display = RES_Open_Multi || RES_Open_Multi_Parlay ? "" : "none",
            document.getElementById("div_menu_multiple").style.display = RES_Open_Multi ? "" : "none",
            document.getElementById("div_menu_parlay").style.display = RES_Open_Multi_Parlay ? "" : "none",
            0 == fFrame.LastBettingMode ? (document.getElementById("BetProcessContainer").style.display = "",
            document.getElementById("Betslip").style.display = "none") : (document.getElementById("BetProcessContainer").style.display = "none",
            document.getElementById("Betslip").style.display = ""),
            document.getElementById("div_BetListMini").style.display = "none",
            document.getElementById("div_WaitingBets").style.display = "none",
            document.getElementById("div_VoidTicket").style.display = "none",
            "1" == fFrame.SiteMode && (document.getElementById("BetProcessPhoneContainer").style.display = "none"),
            document.getElementById("BPstake").value = "",
            document.getElementById("payOut").innerHTML = "",
            0 == fFrame.LastBettingMode && (document.getElementById("BPstake").focus(),
            ProcessBetTimeoutHandler = window.setTimeout("ReloadWaitingBetList('no','no','fromTimer')", 2e4));
            break;
        case "betOP":
            DropTimeoutHandlers(),
            document.getElementById("MessageDisplayContainer").style.display = "none",
            document.getElementById("MessageAlertContainer").style.display = "none",
            document.getElementById("btnBPSubmit_P").disabled = !1,
            document.getElementById("div_accountInfoFull").style.display = "none",
            document.getElementById("div_accountInfoMini").style.display = "",
            ("2" != fFrame.SiteMode || "1" != fFrame.Deposit_SiteMode && "2" != fFrame.Deposit_SiteMode && "7" != fFrame.Deposit_SiteMode) && (document.getElementById("div_menu").style.display = "none"),
            document.getElementById("MenuContainer").style.display = "none",
            document.getElementById("SuccessBetContainer").style.display = "none",
            document.getElementById("BettingModeContainer").style.display = "none",
            document.getElementById("BetProcessContainer").style.display = "none",
            null != document.getElementById("BingoBetProcessContainer") && (document.getElementById("BingoBetProcessContainer").style.display = "none"),
            document.getElementById("BetProcessPhoneContainer").style.display = "",
            document.getElementById("RemarkContainer").style.display = "none",
            document.getElementById("liveScoreContainer").style.display = "none",
            document.getElementById("phoneOutright").style.display = "",
            document.getElementById("phoneInputBox1").style.display = "none",
            document.getElementById("phoneInputBox2").style.display = "none",
            document.getElementById("phoneInputBox3").style.display = "none",
            document.getElementById("div_BetListMini").style.display = "none",
            document.getElementById("div_WaitingBets").style.display = "none",
            document.getElementById("BPstake_P").value = "",
            0 == fFrame.LastBettingMode && document.getElementById("BPstake_P").focus(),
            document.getElementById("payOut_P").innerHTML = "";
            break;
        case "su":
            if (document.getElementById("SuccessBetContainer").style.display = "",
            "True" == n) {
                if (document.getElementById("BettingModeContainer").style.display = "none",
                document.getElementById("BetProcessContainer").style.display = "none",
                document.getElementById("Betslip").style.display = "none",
                null != document.getElementById("BingoBetProcessContainer") && (document.getElementById("BingoBetProcessContainer").style.display = "none"),
                CheckIsIpad()) {
                    ShowSuccessBet = !0;
                    window.setTimeout(function() {
                        alert(document.getElementById("successInfo1").value),
                        ShowSuccessBet = !1,
                        document.getElementById("SuccessBetContainer").style.display = "none"
                    }, 1e3)
                } else
                    window.setTimeout('alert(document.getElementById("successInfo1").value)', 100);
                window.setTimeout("ReloadWaitingBetList('no','yes')", 100)
            } else
                alert(document.getElementById("successInfo2").value),
                ReloadBetListMini("no", "no");
            break;
        case "bet":
            ClearBPStake(),
            fFrame.LastSingleType = 0,
            CtrlSubmitBtnDisabled(!1),
            document.getElementById("MessageDisplayContainer").style.display = "none",
            document.getElementById("MessageAlertContainer").style.display = "none",
            null != document.getElementById("BingoBetProcessContainer") && (document.getElementById("BingoBetProcessContainer").style.display = "none"),
            document.getElementById("div_accountInfoFull").style.display = "none",
            document.getElementById("div_WaitingBets").style.display = "none",
            document.getElementById("div_VoidTicket").style.display = "none",
            document.getElementById("div_accountInfoMini").style.display = "",
            ("2" != fFrame.SiteMode || "1" != fFrame.Deposit_SiteMode && "2" != fFrame.Deposit_SiteMode && "7" != fFrame.Deposit_SiteMode) && (document.getElementById("div_menu").style.display = "none",
            IsM88 || IsDela || IsSuncity || IsMayfair || "4270" == fFrame.SiteId || "4200700" == fFrame.SiteId || "4201100" == fFrame.SiteId || "4201200" == fFrame.SiteId || "4200200" == fFrame.SiteId ? document.getElementById("div_favorite").style.display = "none" : IsALog && (document.getElementById("div_favorite").style.display = "none",
            document.getElementById("div_howtobet").style.display = "none")),
            document.getElementById("MenuContainer").style.display = "none",
            "1" == fFrame.SiteMode && (document.getElementById("BetProcessPhoneContainer").style.display = "none"),
            document.getElementById("SuccessBetContainer").style.display = "none",
            document.getElementById("div_BetListMini").style.display = "none",
            document.getElementById("BettingModeContainer").style.display = RES_Open_Multi || RES_Open_Multi_Parlay ? "" : "none",
            document.getElementById("div_menu_multiple").style.display = RES_Open_Multi ? "" : "none",
            document.getElementById("div_menu_parlay").style.display = RES_Open_Multi_Parlay ? "" : "none",
            0 == fFrame.LastBettingMode ? (document.getElementById("BetProcessContainer").style.display = "",
            document.getElementById("Betslip").style.display = "none") : (document.getElementById("BetProcessContainer").style.display = "none",
            document.getElementById("Betslip").style.display = ""),
            null != tmp_obj && (0 == fFrame.LastBettingMode ? "FScreen" == tmp_obj.id && null != document.getElementById("FScreen") && (document.getElementById("FScreen").checked ? DropTimeoutHandlers() : ProcessBetTimeoutHandler = window.setTimeout("ReloadWaitingBetList('no','no','fromTimer')", 2e4)) : DropTimeoutHandlers());
            break;
        case "betP":
            document.getElementById("btnBPSubmit_P").disabled = !1,
            ClearBPStake(),
            document.getElementById("MessageDisplayContainer").style.display = "none",
            document.getElementById("MessageAlertContainer").style.display = "none",
            document.getElementById("div_accountInfoFull").style.display = "none",
            document.getElementById("div_WaitingBets").style.display = "none",
            document.getElementById("div_accountInfoMini").style.display = "",
            ("2" != fFrame.SiteMode || "1" != fFrame.Deposit_SiteMode && "2" != fFrame.Deposit_SiteMode && "7" != fFrame.Deposit_SiteMode) && (document.getElementById("div_menu").style.display = "none"),
            document.getElementById("MenuContainer").style.display = "none",
            "1" == fFrame.SiteMode && (document.getElementById("BetProcessPhoneContainer").style.display = ""),
            document.getElementById("SuccessBetContainer").style.display = "none",
            document.getElementById("div_BetListMini").style.display = "none",
            document.getElementById("BettingModeContainer").style.display = "none",
            document.getElementById("BetProcessContainer").style.display = "none",
            null != document.getElementById("BingoBetProcessContainer") && (document.getElementById("BingoBetProcessContainer").style.display = "none");
            break;
        case "betBingo":
            ClearBPStake(),
            fFrame.LastSingleType = 1,
            document.getElementById("Bingo_btnBPSubmit").disabled = !1,
            document.getElementById("MessageDisplayContainer").style.display = "none",
            document.getElementById("MessageAlertContainer").style.display = "none",
            document.getElementById("div_accountInfoFull").style.display = "none",
            document.getElementById("div_WaitingBets").style.display = "none",
            document.getElementById("div_VoidTicket").style.display = "none",
            document.getElementById("div_accountInfoMini").style.display = "",
            ("2" != fFrame.SiteMode || "1" != fFrame.Deposit_SiteMode && "2" != fFrame.Deposit_SiteMode && "7" != fFrame.Deposit_SiteMode) && (document.getElementById("div_menu").style.display = "none",
            IsM88 || IsDela || IsSuncity || IsMayfair || "4270" == fFrame.SiteId || "4200700" == fFrame.SiteId || "4201100" == fFrame.SiteId || "4201200" == fFrame.SiteId || "4200200" == fFrame.SiteId ? document.getElementById("div_favorite").style.display = "none" : IsALog && (document.getElementById("div_favorite").style.display = "none",
            document.getElementById("div_howtobet").style.display = "none")),
            document.getElementById("MenuContainer").style.display = "none",
            "1" == fFrame.SiteMode && (document.getElementById("BetProcessPhoneContainer").style.display = "none"),
            document.getElementById("SuccessBetContainer").style.display = "none",
            document.getElementById("div_BetListMini").style.display = "none",
            document.getElementById("BetProcessContainer").style.display = "none",
            document.getElementById("BettingModeContainer").style.display = RES_Open_Multi || RES_Open_Multi_Parlay ? "" : "none",
            document.getElementById("div_menu_multiple").style.display = RES_Open_Multi ? "" : "none",
            document.getElementById("div_menu_parlay").style.display = RES_Open_Multi_Parlay ? "" : "none",
            null != document.getElementById("BingoBetProcessContainer") && (0 == fFrame.LastBettingMode ? (document.getElementById("BingoBetProcessContainer").style.display = "",
            document.getElementById("Betslip").style.display = "none") : (document.getElementById("BingoBetProcessContainer").style.display = "none",
            document.getElementById("Betslip").style.display = "")),
            null != document.getElementById("Bingo_chKeepBet") && (document.getElementById("Bingo_chKeepBet").checked ? DropTimeoutHandlers() : ProcessBetTimeoutHandler = window.setTimeout("ReloadWaitingBetList('no','no','fromTimer')", 2e4));
            break;
        case "msg":
            //document.getElementById("btnMPSubmit").disabled = !1,
            //document.getElementById("div_menu_multiple").style.display = RES_Open_Multi ? "" : "none",
            //document.getElementById("div_accountInfoFull").style.display = "none",
            //document.getElementById("div_accountInfoMini").style.display = "block",
            //("2" != fFrame.SiteMode || "1" != fFrame.Deposit_SiteMode && "2" != fFrame.Deposit_SiteMode && "7" != fFrame.Deposit_SiteMode) && (document.getElementById("div_menu").style.display = "none",
            //(IsM88 || IsALog || IsDela || IsSuncity || IsMayfair || "4270" == fFrame.SiteId || "4200700" == fFrame.SiteId || "4201100" == fFrame.SiteId || "4201200" == fFrame.SiteId || "4200200" == fFrame.SiteId) && (document.getElementById("div_favorite").style.display = "none")),
            //document.getElementById("MenuContainer").style.display = "none",
            //document.getElementById("BettingModeContainer").style.display = "none",
            //document.getElementById("Betslip").style.display = "none",
            //"1" == fFrame.SiteMode && (document.getElementById("BetProcessPhoneContainer").style.display = "none"),
            //document.getElementById("div_WaitingBets").style.display = "none",
            //document.getElementById("div_BetListMini").style.display = "none",
            //document.getElementById("div_VoidTicket").style.display = "none",
            "suspend" != document.getElementById("msg_type").value && (document.getElementById("BetProcessContainer").style.display = "none",
            null != document.getElementById("BingoBetProcessContainer") && (document.getElementById("BingoBetProcessContainer").style.display = "none"),
            //document.getElementById("div_MixParlay").style.display = "oddschange" == document.getElementById("msg_type").value ? "block" : "none",
            AccountTimeOut = window.setTimeout("ReloadWaitingBetList('no','no','fromTimer')", 2e4))
        }
    }
}
function refreshAccountInfo(e) {
    IsPageLoadCompleted() && (document.getElementById("accountUpdate").value = e,
    document.getElementById("FrameAllAccount").submit(),
    $("a[name='btnRefresh']").attr("class", "btnIcon right disable"),
    "full" == e ? ChangeDisplayMode("acF") : "mini" == e && ChangeDisplayMode("acM"))
}
function loadAccountData(e) {
    if (IsPageLoadCompleted())
        if (document.getElementById("accountUpdate").value = e,
        $("a[name='btnRefresh']").attr("class", "btnIcon right"),
        "full" == e)
            // console.log(iFrameAllAccount.txt_login)
            document.getElementById("cashBalance").className = iFrameAllAccount.cashClass,
            document.getElementById("txt_cash").innerHTML = iFrameAllAccount.txt_cash,
            document.getElementById("txt_outstanding").innerHTML = iFrameAllAccount.txt_outstanding,
            // document.getElementById("txt_netposition").innerHTML = iFrameAllAccount.txt_netposition,
            document.getElementById("txt_betcredit").innerHTML = iFrameAllAccount.txt_betcredit,
            document.getElementById("txt_credit").innerHTML = iFrameAllAccount.txt_credit,
            document.getElementById("txt_login").innerHTML = iFrameAllAccount.txt_login,
            document.getElementById("txt_transaction").innerHTML = iFrameAllAccount.txt_transaction,
            // document.getElementById("txt_expassword").innerHTML = iFrameAllAccount.txt_expassword;
                document.getElementById("txt_betcreditInfo").innerHTML = iFrameAllAccount.txt_betcredit,
                document.getElementById("txt_cashInfo").innerHTML = iFrameAllAccount.txt_cash

        else if ("mini" == e)
            if ("2" == fFrame.SiteMode || "3" == fFrame.SiteMode)
                document.getElementById("txt_cash").innerHTML = iFrameAllAccount.txt_cash,
                document.getElementById("txt_outstanding").innerHTML = iFrameAllAccount.txt_outstanding;

            else {
                var t = iFrameAllAccount.txt_betcredit.replace(/,/g, "");
                document.getElementById("txt_betcreditInfo").innerHTML = addCommas(Math.floor(t) + ""),
                // document.getElementById("txt_betcredit").innerHTML = document.getElementById("txt_betcreditInfo").innerHTML,
                // document.getElementById("txt_cashInfo").innerHTML = iFrameAllAccount.txt_cashNoDec,
                document.getElementById("txt_cashInfo").innerHTML = iFrameAllAccount.txt_cash,
                document.getElementById("txt_cashInfo").className = iFrameAllAccount.cashClass
            }

        if(parseFloat(iFrameAllAccount.txt_cash.replace(",", "")) < 0.00){
            document.getElementById("txt_cashInfo").style.color = "#f00";
            document.getElementById("txt_cash").style.color = "#f00";
        }else{
            document.getElementById("txt_cashInfo").style.color = "";
            document.getElementById("txt_cash").style.color = "";
        }

        if(parseFloat(iFrameAllAccount.txt_outstanding.replace(",", "")) < 0.00){
            document.getElementById("txt_outstanding").style.color = "#f00";
        }else{
            document.getElementById("txt_outstanding").style.color = "";
        }
}
function ClearMPStake() {
    if (IsPageLoadCompleted()) {
        document.getElementById("betform").stake.value = "",
        document.getElementById("betform").stake.focus(),
        document.getElementById("txtPayOut").innerHTML = "";
        // var e = document.getElementById("TotalStakeValue");
        // null != e && (e.innerHTML = "",
        // e.parentNode.className = "")
    }
}
function checkCombOdds(e, t, n, a, l) {
    if (null == l) {
        var d = document.getElementById("cbCombiOdds");
        d.checked = !d.checked,
        d.checked ? (document.getElementById("MPMaxBet").innerHTML = iframMixParlay.CombiMaxBet,
        document.betform.MAXBET.value = iframMixParlay.CombiMaxBet.replace(/\,/g, "")) : (document.getElementById("MPMaxBet").innerHTML = iframMixParlay.MaxBet,
        document.betform.MAXBET.value = iframMixParlay.MaxBet.replace(/\,/g, ""))
    } else
        l.checked ? (document.getElementById("MPMaxBet").innerHTML = iframMixParlay.CombiMaxBet,
        document.betform.MAXBET.value = iframMixParlay.CombiMaxBet.replace(/\,/g, "")) : (document.getElementById("MPMaxBet").innerHTML = iframMixParlay.MaxBet,
        document.betform.MAXBET.value = iframMixParlay.MaxBet.replace(/\,/g, ""));
    checkCombiValue(document.getElementById(e), t, n, a)
}
function ComboSwitch(e) {
    if ("ComboAllSwitch" == e.id) {
        document.getElementById("ComboAllSwitchfromCkB").checked = !document.getElementById("ComboAllSwitchfromCkB").checked;
        for (var t = 0; t < 32; t++) {
            var n = document.getElementById("ComboDetailSwitch" + t);
            if (null != n)
                if (document.getElementById("ComboAllSwitchfromCkB").checked) {
                    -1 == n.parentElement.className.indexOf("on") && (n.parentElement.className = n.parentElement.className + " on");
                    var a = document.getElementById("ComboStake" + t);
                    1 == parseInt(a.getAttribute("cnt"), 10) && a.focus()
                } else
                    n.parentElement.className = n.parentElement.className.replace(/on/gi, "").replace(/(^\s*)|(\s*$)/g, "")
        }
        n = document.getElementById("spb"),
        document.getElementById("ComboAllSwitchfromCkB").checked ? -1 == n.className.indexOf("on") && (n.className = n.className + " on") : n.className = n.className.replace(/on/gi, "").replace(/(^\s*)|(\s*$)/g, ""),
        document.getElementById("ComboAllSwitchfromCkB").checked || document.getElementById("stake").focus()
    } else
        "spb" == e.parentElement.parentElement.id && (-1 == (n = document.getElementById("spb")).className.indexOf("on") ? (n.className = n.className + " on",
        document.getElementById("stake").focus()) : n.className = n.className.replace(/on/gi, "").replace(/(^\s*)|(\s*$)/g, "")),
        -1 == e.parentElement.className.indexOf("on") ? (e.parentElement.className = e.parentElement.className + " on",
        "" != e.id && document.getElementById("ComboStake" + e.id.replace("ComboDetailSwitch", "")).focus()) : e.parentElement.className = e.parentElement.className.replace(/on/gi, "").replace(/(^\s*)|(\s*$)/g, "")
}
function clearStake(e) {
    var t;
    if ("" === e)
        t = document.getElementById("stake"),
        mixparlay_stake = "";
    else {
        t = document.getElementById("ComboStake" + e);
        var n = document.getElementById("ComboInfo" + e);
        null != n && (n.innerHTML = "",
        n.parentElement.style.display = "none",
        1 == parseInt(t.getAttribute("cnt"), 10) && (mixparlay_stake = ""))
    }
    t.value = "",
    checkCombiValue(t, null)
}
function checkCombiValue_fromKeyIn(e, t) {
    e.value = addCommas(removeCommas(e.value));
    var n = e.value;
    n = removeCommas(n);
    for (var a = 0; a < n.length; a++)
        tmp = n.substr(a, 1),
        -1 == "0123456789".indexOf(tmp) && (e.value = "");
    if (null != t) {
        var l = document.all ? t.keyCode : t.which;
        if (-1 == indexOf([8, 46, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105], l))
            return
    }
    var d = document.getElementById("ComboInfo" + e.id.replace("ComboStake", ""));
    null != d && (d.innerHTML = "",
    d.parentElement.style.display = "none"),
    checkCombiValue(e, t)
}
function formatStake() {
    for (var e, t = 0; t < 32; t++)
        null != (e = document.getElementById("ComboStake" + t)) && "" != e.value && (e.value = addCommas(parseInt(removeCommas(e.value), 10) + ""));
    null != (e = document.getElementById("stake")) && "" != e.value && (e.value = addCommas(parseInt(removeCommas(e.value), 10) + ""))
}
function CalcCombiInfo() {
    for (var e = 0, t = 0, n = 0, a = 0; a < 32; a++) {
        var l = document.getElementById("ComboStake" + a);
        if (null != l) {
            var d = l.parentElement.parentElement.parentElement.parentElement;
            parlayComboStake[a] = l.value,
            "" != l.value ? (-1 == d.className.indexOf("Ltrbgov") && (d.className = d.className + " Ltrbgov"),
            e += parseInt(removeCommas(l.value), 10) * parseFloat(l.getAttribute("odds")),
            t += parseInt(removeCommas(l.value), 10) * parseInt(l.getAttribute("cnt"), 10),
            n += parseInt(l.getAttribute("cnt"), 10)) : d.className = d.className.replace(/Ltrbgov/gi, "").replace(/(^\s*)|(\s*$)/g, "")
        }
    }
    var o = document.getElementById("stake")
    ,  m = document.getElementById("SportMixParleyOddsValue")
    , v = o.value == "" ? 0 : parseInt(removeCommas(o.value), 10) * parseFloat(m.value)
      , s = o.parentElement.parentElement.parentElement.parentElement;
    "" != o.value ? -1 == s.className.indexOf("Ltrbgov") && (s.className = s.className + " Ltrbgov") : s.className = s.className.replace(/Ltrbgov/gi, "").replace(/(^\s*)|(\s*$)/g, ""),
    0 == v || "" == v ? document.getElementById("txtPayOut").innerHTML = "0.00" : (v = (100 * v) / 100,
    document.getElementById("txtPayOut").innerHTML = addCommas((v).toFixed(2) + ""))
    // 0 == e ? document.getElementById("txtPayOut").innerHTML = "" : (e = Math.round(100 * e) / 100,
    // document.getElementById("txtPayOut").innerHTML = addCommas((e + 1e-5).toFixed(2) + ""))

    // 0 == t ? (document.getElementById("TotalStakeValue").innerHTML = "",
    // document.getElementById("TotalStakeValue").parentNode.className = "") : (document.getElementById("TotalStakeValue").innerHTML = addCommas(t + ""),
    // document.getElementById("TotalStakeValue").parentNode.className = "Odds_Upd"),
    // document.getElementById("TotalBetsValue").innerHTML = 0 == n ? "" : addCommas(n + "")
}
function checkCombiValue(e, t) {
    if (null != t) {
        var n = document.all ? t.keyCode : t.which;
        if (13 == n || 9 == n)
            return
    }
    e.value = addCommas(removeCommas(e.value));
    var a = e.value;
    a = removeCommas(a);
    for (var l = 0; l < a.length; l++)
        tmp = a.substr(l, 1),
        -1 == "0123456789".indexOf(tmp) && (e.value = "");
    var d = [2, 3, 5, 6, 8, 9, 11, 12, 14, 15, 17, 18];
    if (null == e)
        for (l = 0; l < 32; l++) {
            null != (o = document.getElementById("ComboStake" + l)) && -1 == indexOf(d, l) && (o.value = document.getElementById("stake").value)
        }
    else if ("stake" == e.id) {
        "" != e.value && (e.value = removeCommas(e.value),
        e.value = addCommas(parseInt(e.value, 10) + ""),
        "0" == e.value && (e.value = "")),
        mixparlay_stake = e.value;
        // console.log(e.value)
        // for (l = 0; l < 32; l++) {
        //     var o;
        //     if (null != (o = document.getElementById("ComboStake" + l)) && -1 == indexOf(d, l)) {
        //         o.value = e.value;
        //         var s = o.parentElement.parentElement.parentElement.parentElement;
        //         "" != e.value && -1 == s.className.indexOf("on") && (s.className = s.className + " on")
        //     }
        //     var m = document.getElementById("ComboInfo" + l);
        //     null != m && (m.innerHTML = "",
        //     m.parentElement.style.display = "none")
        // }
    } else
        "" != e.value && (e.value = addCommas(parseInt(removeCommas(e.value), 10) + ""),
        "0" == e.value && (e.value = ""),
        1 == parseInt(e.getAttribute("cnt"), 10) && (mixparlay_stake = e.value)),
        -1 == indexOf(d, parseInt(e.id.replace("ComboStake", ""), 10)) && (document.getElementById("stake").value = "");
    CalcCombiInfo(),
    null != e && "" != e.value && (e.value = addCommas(parseInt(removeCommas(e.value), 10) + "")),
    $("#ParlayBPMinMaxBetAlert div").html(""),
    $("#ParlayBPMinMaxBetAlert").css("display", "none")
}
function loadParlayData() {
    if (IsPageLoadCompleted()) {
        CtrlSubmitBtnDisabled(!1),
        ParlaySportType = iframMixParlay.SportType,
        document.betform.count.value = iframMixParlay.CartCount,
        parseInt(iframMixParlay.CartCount, 10) < parseInt(iframMixParlay.CanBetTicketCnt, 10) ? (document.getElementById("divKeepOdds").style.display = "none",
        document.getElementById("parlay_bet_info2").style.display = "none",
        document.getElementById("parlay_bet_info").style.display = "none") : (document.getElementById("divKeepOdds").style.display = "",
        document.getElementById("parlay_bet_info2").style.display = "",
        document.getElementById("parlay_bet_info").style.display = "");
        var e = 100;
        if ("190" == ParlaySportType || "191" == ParlaySportType || "192" == ParlaySportType || "193" == ParlaySportType || "194" == ParlaySportType ? (e = 8,
        document.getElementById("spb").style.display = "none",
        document.getElementById("combo_t").style.display = "none") : (document.getElementById("spb").style.display = "",
        document.getElementById("combo_t").style.display = ""),
        parseInt(iframMixParlay.CartCount, 10) > e ? (document.getElementById("divKeepOdds").style.display = "none",
        document.getElementById("parlay_bet_info2").style.display = "none",
        document.getElementById("parlay_bet_info").style.display = "none",
        document.getElementById("Div_Over100").style.display = "none",
        document.getElementById("Div_Over8").style.display = "none",
        document.getElementById("Div_Over" + e).style.display = "") : (document.getElementById("Div_Over100").style.display = "none",
        document.getElementById("Div_Over8").style.display = "none"),
        "1" == fFrame.SiteMode && (document.betform.AdminLevel.value = iframMixParlay.AdminLevel),
        document.betform.MAXBET.value = iframMixParlay.MaxBet.replace(/\,/g, ""),
        document.betform.MINBET.value = iframMixParlay.MinBet.replace(/\,/g, ""),
        document.betform.sport.value = iframMixParlay.SportType,
        document.getElementById("TotalOdds").innerHTML = iframMixParlay.TotalOdds,
        document.getElementById("mincurrency").innerHTML = iframMixParlay.Currency,
        document.getElementById("MPMinBet").innerHTML = iframMixParlay.MinBet,
        parlayMaxBet = iframMixParlay.MaxBet,
        document.getElementById("ParlayDetail").innerHTML = iframMixParlay.parlaydata,
        document.getElementById("ComboStakeList").innerHTML = iframMixParlay.combodata,
        // document.getElementById("ComboAllSwitchfromCkB").checked = !1,
        document.getElementById("spb").className = "stakePerBet on",
        "" == iframMixParlay.combodata ? document.getElementById("combo_t").className = "combo-item displayOff" : document.getElementById("combo_t").className = "combo-item",
        document.getElementById("BetKey").value = iframMixParlay.hiddenBetKey,
        RES_Open_Multi_Parlay && (document.getElementById("mparlay_cnt").innerHTML = "0" == iframMixParlay.CartCount ? "" : iframMixParlay.CartCount,
        document.getElementById("ParlayTitle").style.display = "none"),
        confirmMode = iframMixParlay.confirmMode,
        ParlayOddsUPD = "true" == iframMixParlay.ParlayOddsUPD,
        "1" == fFrame.SiteMode) {
            var t = document.betform.AdminLevel.value;
            document.getElementById("PhoneRemarkContainer").style.display = "8" == t ? "block" : "none"
        }
        if ("1" == ASYN_FLAG && "oddschange" == document.getElementById("msg_type").value && document.fomMessageDisplay.submit(),
        document.getElementById("stake").value = "",
        navigator.userAgent.match(/iPad/i) || -1 != navigator.userAgent.indexOf("iphone")) {
            var n = function(e) {
                e.touches.length < 2 && e.preventDefault()
            };
            document.getElementById("stake_numberPad").style.display = "none";
            for (var a = 0; a < 32; a++)
                $("#ComboStake" + a).length > 0 && ($(".numberPad-wrap").show(),
                document.getElementById("ComboStake" + a + "_numberPad").addEventListener("touchstart", n, !0),
                document.getElementById("ComboStake" + a + "_numberPad").style.display = "none",
                CreateNumberKeyboard("ComboStake" + a))
        }
        if (CombiOddsChange && (CombiOddsChange = !1),
        "none" != document.getElementById("parlay_bet_info").style.display)
            try {
                if ("ReloadParlayData" == document.ParlayBetForm.MId.value)
                    for (a = 0; a < 32; a++) {
                        null != (l = document.getElementById("ComboStake" + a)) && (l.value = parlayComboStake[a],
                        "1" == l.getAttribute("cnt") && (l.focus(),
                        l.select()))
                    }
                else
                    for (a = 0; a < 32; a++) {
                        var l;
                        if (null != (l = document.getElementById("ComboStake" + a)) && "1" == l.getAttribute("cnt")) {
                            "" == document.getElementById("stake").value && ("" == mixparlay_stake && "" != iframMixParlay.hiddenStakeRequest && (mixparlay_stake = iframMixParlay.hiddenStakeRequest),
                            l.value = mixparlay_stake),
                            l.focus(),
                            l.select();
                            break
                        }
                    }
            } catch (e) {}
        CalcCombiInfo();
        var d = document.getElementById("ParlayDetail")
          , o = document.getElementById("noparlayinfo");
        parseInt(iframMixParlay.CartCount, 10) > 0 ? (d.style.display = "",
        o.style.display = "none") : (d.style.display = "none",
        o.style.display = "")
    }
}
function comboStakeFocus(e, t) {
    if (navigator.userAgent.match(/iPad/i) || -1 != navigator.userAgent.indexOf("iphone")) {
        null != e && e.blur();
        for (var n = 0; n < 32; n++)
            null != document.getElementById("ComboStake" + n + "_numberPad") && (document.getElementById("ComboStake" + n + "_numberPad").style.display = "none");
        document.getElementById("stake_numberPad").style.display = "none",
        null != t ? document.getElementById("ComboStake" + t + "_numberPad").style.display = "" : document.getElementById("stake_numberPad").style.display = ""
    }
}
function ReloadWaitingBetList(e, t, n) {
    /*IsPageLoadCompleted() && (DropTimeoutHandlers(),
    "yes" == t && refreshAccountInfo("mini"),
    "none" != document.getElementById("div_MixParlay").style.display && "fromTimer" == n || ChangeDisplayMode("wb", e),
    document.frmWaitingBets.action = "WaitingBets_Data.php?IsFromWaitingBtn=yes",
    document.frmWaitingBets.submit(),
    disableMiniRefresh("WaitingBetRefreshIcon"))*/
}
function ReloadVoidTicket(e) {
    IsPageLoadCompleted() && (DropTimeoutHandlers(),
    ChangeDisplayMode("Vtk", e),
    document.frmWaitingBets.action = "WaitingBets_Data.php",
    document.frmWaitingBets.submit(),
    disableMiniRefresh("VoidTicketRefreshIcon"),
    scrollTo(0, top))
}
function loadBetProcess(e) {
    if (CtrlSubmitBtnDisabled(!0),
    IsPageLoadCompleted()) {
        var t, n;
        "Bingo_chKeepBet" == e ? (t = document.getElementById("Bingo_sporttype").value,
        n = document.getElementById("BingoBetProcessContainer").style.display) : (t = document.getElementById("sporttype").value,
        n = document.getElementById("BetProcessContainer").style.display),
        1 == document.getElementById(e).checked && "none" != n && ("1" == fFrame.SiteMode ? (document.fomBetProcessPhone_Data.action = "BetProcess_Data.php",
        null != eObj && (document.fomBetProcessPhone_Data.bp_p_key.value = eObj.GetKey("bet")),
        document.fomBetProcessPhone_Data.submit()) : (DoLeftMenuDisplay(),
        "201" == t || "151" == t || "152" == t || "153" == t ? (document.fomBetProcess_Data.action = "BetProcess_Data_S.php?autoLoad=yes",
        document.fomBetProcess_Data.submit()) : "161" == t || "164" == t ? (document.Bingo_fomBetProcess_Data.action = "bingo/BetProcess_Data.php?autoLoad=yes",
        null != eObj && (document.Bingo_fomBetProcess_Data.Bingo_bp_key.value = eObj.GetKey("bbet")),
        document.Bingo_fomBetProcess_Data.submit()) : "181" != t && "182" != t && "183" != t && "184" != t && "185" != t && (document.fomBetProcess_Data.action = "BetProcess_Data.php?autoLoad=yes",
        null != eObj && (document.fomBetProcess_Data.bp_key.value = eObj.GetKey("bet")),
        document.fomBetProcess_Data.submit())))
    }
}
function loadWaitingBetList() {
    if (IsPageLoadCompleted() && void 0 != WaitingBets.data) {
        var e = document.getElementById("WaitingBetsSpan");
        document.all ? e.innerHTML = WaitingBets.data : replaceHtml("WaitingBetsSpan", WaitingBets.data)
    }
}
function loadVoidTicket() {
    if (IsPageLoadCompleted() && void 0 != WaitingBets.data) {
        var e = document.getElementById("VoidTicketSpan");
        document.all ? e.innerHTML = WaitingBets.data : replaceHtml("VoidTicketSpan", WaitingBets.data)
    }
}
function replaceHtml(e, t) {
    var n = "string" == typeof e ? document.getElementById(e) : e
      , a = n.cloneNode(!1);
    return a.innerHTML = t,
    n.parentNode.replaceChild(a, n),
    a
}
function counting(e) {
    if (IsPageLoadCompleted()) {
        document.getElementById("lastrefresh").style.display = "block",
        document.getElementById("lastrefresh_time").innerHTML = e - 1;
        var t = e - 1;
        e - 1 > 0 ? TimeoutCountdownIndex = setTimeout("counting(" + t + ")", 1e3) : (document.getElementById("lastrefresh").style.display = "none",
        document.getElementById("checkStatus").style.display = "block")
    }
}
function Countdown() {
    counting(6),
    TimeoutWaitingBetIndex = window.setTimeout("ReloadWaitingBetList('','no','fromTimer')", 6e3)
}
function ReloadBetListMini(e, t) {
    IsPageLoadCompleted() && (DropTimeoutHandlers(),
    ChangeDisplayMode("bm", e),
    //document.frmBetListMini.showBetAcceptedMsg.value = "yes" == t ? "yes" : "no",
    //document.frmBetListMini.from.value = "mini",
    //document.frmBetListMini.submit(),
    //disableMiniRefresh("BetListMiniRefreshIcon"),
    scrollTo(0, top));
    //wbl('betlist').then(function(res){ $('#BetWaitList').html(res); }, );
    if(t=="yes"){
        wbl('betlist').then(function(res){ 
            $('#BetWaitList').html(res); 
            $("#chkDisplayWaitBetList").parents('.left_acc_container').removeClass('onRefresh');
            $("#chkDisplayWaitBetList").prop('checked', true);
            // $("#chkDisplayWaitBetList").trigger("change");
            //$('#BetWaitListTitle').text('รอ');
            $('#BetWaitListTitle').text('รายการแบบย่อ');
        }, );
    }else{
        wbl('waitlist', {IsFromWaitingBtn: "yes"}).then(function(res){ 
            $('#BetWaitList').html(res); 
            $("#chkDisplayWaitBetList").parents('.left_acc_container').removeClass('onRefresh');
            $("#chkDisplayWaitBetList").prop('checked', false);

            $('#BetWaitListTitle').text('รอ');
        }, );
    }

    get_credit();
}
function disableMiniRefresh(e, t) {
    var n = " disable";
    null == t || t || (n = ""),
    null != document.getElementById(e) && (document.getElementById(e).className = "btnIcon mark right" + n)
}
function showBetAcceptedMsg(e) {
    alert(e)
}
function ClearOTStake() {
    IsPageLoadCompleted() && ("1" == fFrame.SiteMode ? (document.getElementById("spBetKind_P").innerHTML = "",
    document.getElementById("spOddsStatus_P").innerHTML = "",
    document.getElementById("spChoiceClass_P").innerHTML = "",
    "none" != document.getElementById("phoneInputBox1").style.display ? (document.getElementById("bp_hdp1Value_1").value = "",
    document.getElementById("bp_hdp2Value_1").value = "",
    document.getElementById("bp_odds1").value = "") : "none" != document.getElementById("phoneInputBox2").style.display ? (document.getElementById("bp_hdp1Value_2").value = "",
    document.getElementById("bp_hdp2Value_2").value = "",
    document.getElementById("bp_odds2").value = "") : "none" != document.getElementById("phoneInputBox3").style.display && (document.getElementById("BetKindValue").innerHTML = "",
    document.getElementById("bp_hdp1Value_3").value = "",
    document.getElementById("bp_hdp2Value_3").value = "",
    document.getElementById("bp_odds3").value = ""),
    document.getElementById("spHome_P").innerHTML = "",
    document.getElementById("spAway_P").innerHTML = "",
    document.getElementById("spLeaguename_P").innerHTML = "",
    document.getElementById("BPstake_P").value = "",
    document.getElementById("liveScoreH").value = "0",
    document.getElementById("liveScoreA").value = "0",
    document.getElementById("payOut_P").innerHTML = "",
    document.getElementById("spMinBetValue_P").innerHTML = "",
    document.getElementById("spMaxBetValue_P").innerHTML = "") : (document.getElementById("BPstake").value = "",
    document.getElementById("payOut").innerHTML = "",
    document.getElementById("tdBetKind").innerHTML = "",
    document.getElementById("spChoiceClass").innerHTML = "",
    document.getElementById("spLeaguename").innerHTML = "",
    document.getElementById("spMinBetValue").innerHTML = "",
    document.getElementById("spMaxBetValue").innerHTML = "",
    document.getElementById("sbBetKindValue").innerHTML = "",
    document.getElementById("spScoreValue").innerHTML = "",
    document.getElementById("ot_dvChoiceValue").innerHTML = ""))
}
function ClearBPStake() {
    if (IsPageLoadCompleted())
        if ("1" == fFrame.siteMode)
            document.getElementById("BPstake_P").OTPStake.value = "",
            document.getElementById("payOut_P").innerHTML = "";
        else {
            (null == document.getElementById("trHorseTotoKeep") || "none" == document.getElementById("trHorseTotoKeep").style.display) && (document.getElementById("tdBetKind").innerHTML = "",
            document.getElementById("spChoiceClass").innerHTML = "",
            document.getElementById("spHome").innerHTML = "",
            document.getElementById("spAway").innerHTML = "",
            document.getElementById("spLeaguename").innerHTML = "",
            document.getElementById("spMinBetValue").innerHTML = "",
            document.getElementById("spMaxBetValue").innerHTML = "",
            document.getElementById("menuTitle").innerHTML = "")
        }
}
function FromConfirmBetProcess(e) {
    if (IsPageLoadCompleted())
        if (DropTimeoutHandlers(),
        "1" == fFrame.SiteMode)
            document.getElementById("bp_p_Match").value = e,
            document.fomBetProcessPhone_Data.action = "BetProcess_Data.php",
            null != eObj && (document.fomBetProcessPhone_Data.bp_p_key.value = eObj.GetKey("bet")),
            document.fomBetProcessPhone_Data.submit();
        else {
            var t = document.getElementById("sporttype").value;
            DoLeftMenuDisplay(),
            document.getElementById("bp_Match").value = e,
            "151" == t || "152" == t || "153" == t ? (document.fomBetProcess_Data.action = "BetProcess_Data_S.php?FromConfimBet=yes",
            document.fomBetProcess_Data.submit()) : null == tmp_obj ? (document.getElementById("otbp_Match").value = e,
            document.fomBetProcess_Data_OT.action = "outright/BetProcess_Data.php?FromConfimBet=yes",
            document.fomBetProcess_Data_OT.submit()) : "Bingo_chKeepBet" == tmp_obj.id ? (document.getElementById("Bingo_bp_Match").value = e,
            document.Bingo_fomBetProcess_Data.action = "bingo/BetProcess_Data.php?FromConfimBet=yes",
            null != eObj && (document.Bingo_fomBetProcess_Data.Bingo_bp_key.value = eObj.GetKey("bbet")),
            document.Bingo_fomBetProcess_Data.submit()) : "chKeepBet" == tmp_obj.id && (document.fomBetProcess_Data.action = "BetProcess_Data.php?FromConfimBet=yes",
            null != eObj && (document.fomBetProcess_Data.bp_key.value = eObj.GetKey("bet")),
            document.fomBetProcess_Data.submit())
        }
}
function Check_betCnt() {
    0 == betCnt && (betThread = setTimeout("betCnt=0;betThread=null;", 18e4)),
    ++betCnt >= 5 && (betCnt = 0,
    window.clearTimeout(betThread))
    // ,
    // fFrame.rightx.genGotoMS2HTML(2),
    // fFrame.rightx.PopToMS2(2))
}
function SetConfirmBetResult(e, t, n) {
    if (IsPageLoadCompleted())
        switch (e) {
        case "Msg":
            DoMessageDisplay(t);
            break;
        case "BListMini":
            Check_betCnt(),
            ReloadBetListMini("no", "yes");
            break;
        case "Success":
            Check_betCnt(),
            DoSuccessBet();
            break;
        case "Bet":
            DoBetProcess(t);
            break;
        case "BetO":
            DoOutrightBetProcess(t);
            break;
        case "BetS":
            DoSpecialBetProcess(t, n);
            break;
        case "BetC":
            FromConfirmBetProcess(t);
            break;
        case "Fnc":
            var a = 8;
            "OddsChanged" == t && (a += 1),
            "IndexChanged" == t && (a += 2),
            document.getElementById("chk_BettingChange").value = a,
            processMsg("201"),
            document.fomBetProcess_Data.action = "BetProcess_Data_S.php?autoLoad=yes",
            document.fomBetProcess_Data.submit();
            break;
        case "WaitingBet":
            Check_betCnt(),
            ReloadBetListMini("no", "no");
        }
}
function OddsKeepCountTime(e) {
    if (tmp_obj = e,
    IsPageLoadCompleted())
        if (DropTimeoutHandlers(),
        null != tmp_obj)
            if ("chKeepBet" == e.id && (document.getElementById("HorseFixchKeepBet").checked = e.checked,
            null != document.getElementById("Bingo_chKeepBet") && (document.getElementById("Bingo_chKeepBet").checked = e.checked)),
            "HorseFixchKeepBet" == e.id && (document.getElementById("chKeepBet").checked = e.checked,
            null != document.getElementById("Bingo_chKeepBet") && (document.getElementById("Bingo_chKeepBet").checked = e.checked)),
            "Bingo_chKeepBet" == e.id && (document.getElementById("chKeepBet").checked = e.checked,
            null != document.getElementById("Bingo_chKeepBet") && (document.getElementById("HorseFixchKeepBet").checked = e.checked)),
            e.checked) {
                var t = OddsKeepREFRESH / 1e3 - 1;
                CounterHandle_L = setTimeout("KeepOddscountdown(" + t + ",'" + e.id + "')", 1e3)
            } else
                0 == fFrame.LastBettingMode && (ProcessBetTimeoutHandler = window.setTimeout("ReloadWaitingBetList('no','no','fromTimer')", 3e4));
        else
            0 == fFrame.LastBettingMode && (ProcessBetTimeoutHandler = window.setTimeout("ReloadWaitingBetList('no','no','fromTimer')", 2e4))
}
function KeepOddscountdown(e, t) {
    if (IsPageLoadCompleted()) {
        if (e <= 0 && !dobet)
            return $("#BPOddsChangeAlert").css("display", "none"),
            void loadBetProcess(t);
        e <= 0 && (e = 0),
        "HorseFixchKeepBet" == t ? document.getElementById("HorseFixKeep").innerHTML = "<span>" + RES_KeepOdds + "(" + e + ")</span>" : "Bingo_chKeepBet" == t ? document.getElementById("Bingo_KeepOdds").innerHTML = "<span>" + RES_KeepOdds + "(" + e + ")</span>" : document.getElementById("KeepOdds").innerHTML = "<span>" + RES_KeepOdds + "(" + e + ")</span>",
        CounterHandle_L = setTimeout("KeepOddscountdown(" + (e - 1) + ",'" + t + "')", 1e3)
    }
}
function FreezeScreen(e) {
    tmp_obj = e,
    ChangeDisplayMode("bet")
}
function DoMessageDisplay(e, t, n) {
    if (IsPageLoadCompleted())
        if (document.getElementById("msg_type").value = e,
        document.getElementById("msg_u_title").value = t,
        document.getElementById("msg_u_msg").value = n,
        "oddschange" == document.getElementById("msg_type").value) {
            var a = document.getElementById("cbCombiOdds");
            null != a && a.checked && (CombiOddsChange = !0),
            ASYN_FLAG = "1",
            document.ParlayBetForm.mode.value = "confirm",
            null != eObj && (document.ParlayBetForm.key.value = eObj.GetKey("mbet")),
            document.ParlayBetForm.submit()
        } else
            document.fomMessageDisplay.submit()
}
function SetMessageDisplayData(e, t, n, a) {
    if (IsPageLoadCompleted()) {
        ChangeDisplayMode("msg", null, null, a),
        "oddschange" == document.getElementById("msg_type").value ? (document.getElementById("MessageDisplayContainer").style.display = "none",
        document.getElementById("MessageAlertContainer").style.display = "none",
        alert(n)) : "suspend" == document.getElementById("msg_type").value ? ("block" == $("#BetProcessContainer").css("display") && ("block" == $("#BP_SPORT").css("display") && (SwitchBettingMode(0, "1"),
        clearTimeout(_ClearOddsChangeAlertTimer),
        $("#BPOddsChangeAlert div").html(n),
        $("#BPOddsChangeAlert").slideDown("fast"),
        _ClearOddsChangeAlertTimer = setTimeout(function() {
            $("#BPOddsChangeAlert").slideUp("fast")
        }, 5e3)),
        "block" == $("#BP_RACE").css("display") && (SwitchBettingMode(0, "1"),
        clearTimeout(_ClearHROddsChangeAlertTimer),
        $("#HRBPOddsChangeAlert div").html(n),
        $("#HRBPOddsChangeAlert").slideDown("fast"),
        _ClearHROddsChangeAlertTimer = setTimeout(function() {
            $("#HRBPOddsChangeAlert").slideUp("fast")
        }, 5e3))),
        "block" == $("#BingoBetProcessContainer").css("display") && (SwitchBettingMode(0, "1"),
        clearTimeout(_ClearBPOddsChangeAlertTimer),
        $("#Bingo_BPOddsChangeAlert div").html(n),
        $("#Bingo_BPOddsChangeAlert").slideDown("fast"),
        _ClearBPOddsChangeAlertTimer = setTimeout(function() {
            $("#Bingo_BPOddsChangeAlert").slideUp("fast")
        }, 5e3),
        "none" != document.getElementById("BingoBetProcessContainer").style.display && document.Bingo_fomBetProcess_Data.submit()),
        "block" == $("#div_MixParlay").css("display") && (SwitchBettingMode(2, "1"),
        clearTimeout(_ClearParlayOddsChangeAlertTimer),
        $("#ParlayOddsChangeAlert div").html(n),
        $("#ParlayOddsChangeAlert").slideDown("fast"),
        CtrlSubmitBtnDisabled(!1),
        _ClearParlayOddsChangeAlertTimer = setTimeout(function() {
            $("#ParlayOddsChangeAlert").slideUp("fast")
        }, 5e3))) : (clearTimeout(_ClearMessageAlertTimer),
        $("#MessageAlertContainer div div div div").html(n),
        $("#MessageAlertContainer").slideDown("fast"),
        _ClearMessageAlertTimer = setTimeout(function() {
            $("#MessageAlertContainer").slideUp("fast")
        }, 2e4))
    }
}
function DropTimeoutHandlers() {
    null != AccountTimeOut && void 0 !== AccountTimeOut && (clearTimeout(AccountTimeOut),
    AccountTimeOut = null),
    null != ProcessBetTimeoutHandler && void 0 !== ProcessBetTimeoutHandler && (clearTimeout(ProcessBetTimeoutHandler),
    ProcessBetTimeoutHandler = null),
    null != TimeoutWaitingBetIndex && void 0 !== TimeoutWaitingBetIndex && (clearTimeout(TimeoutWaitingBetIndex),
    TimeoutWaitingBetIndex = null),
    null != TimeoutCountdownIndex && void 0 !== TimeoutCountdownIndex && (clearTimeout(TimeoutCountdownIndex),
    TimeoutCountdownIndex = null),
    null != CounterHandle_L && void 0 !== CounterHandle_L && (clearTimeout(CounterHandle_L),
    CounterHandle_L = null)
}
function DoLeftMenuDisplay() {
    IsM88 || IsALog || IsTLC || IsDela || IsSuncity || IsMayfair || "4270" == fFrame.SiteId || "4200700" == fFrame.SiteId || "4201100" == fFrame.SiteId || "4201200" == fFrame.SiteId || "4200200" == fFrame.SiteId || fFrame.topx.setleftMenu_tooltip()
}
function IsPageLoadCompleted() {
    return null != document.getElementById("PageLoadCompleted")
}
function CleanMixParlayInfo() {
    if (IsPageLoadCompleted()) {
        if (ParlaySportType = "",
        document.betform.count.value = "",
        "1" == fFrame.SiteMode && (document.betform.AdminLevel.value = ""),
        document.betform.MAXBET.value = "",
        document.betform.MINBET.value = "",
        document.betform.sport.value = "",
        mixparlay_stake = "",
        document.getElementById("TotalOdds").innerHTML = "",
        document.getElementById("mincurrency").innerHTML = "",
        document.getElementById("MPMinBet").innerHTML = "",
        document.getElementById("ParlayDetail").innerHTML = "",
        document.getElementById("ComboStakeList").innerHTML = "",
        RES_Open_Multi_Parlay && (document.getElementById("mparlay_cnt").innerHTML = "",
        document.getElementById("div_MixParlay").style.display = "none"),
        "1" == fFrame.SiteMode) {
            var e = document.betform.AdminLevel.value;
            document.getElementById("PhoneRemarkContainer").style.display = "8" == e ? "block" : "none"
        }
        document.getElementById("txtPayOut").innerHTML = ""
    }
}
function LiveSuccessInfo() {
    alert(document.getElementById("successInfo1").value)
}
function SetAcceptBetterOddsCheck(e) {
    if ("" != e) {
        var t = !1;
        "1" == e && (t = !0),
        obj1 = document.getElementById("cbAcceptBetterOdds"),
        obj1.checked = t,
        obj1.disabled = !1,
        obj2 = document.getElementById("Bingo_cbAcceptBetterOdds"),
        null != obj2 && (obj2.checked = t,
        obj2.disabled = !1)
    }
}
function SyncAcceptBetterOddsCheck(e) {
    obj1 = document.getElementById("cbAcceptBetterOdds"),
    obj1.checked = e.checked,
    obj2 = document.getElementById("Bingo_cbAcceptBetterOdds"),
    null != obj2 && (obj2.checked = e.checked)
}
function CtrlSubmitBtnDisabled(e) {
    document.getElementById("chk_addToParlay").disabled = e;
    for (var t = new Array("btnBPSubmit","Bingo_btnBPSubmit","Race_btnBPSubmit","btnMPSubmit"), n = 0; n < t.length; n++) {
        var a = $("#" + t[n]);
        if (a.length) {
            var l = a.attr("class");
            a.attr("disabled", e),
            e ? -1 == l.indexOf("disable") && a.attr("class", l + " disable") : a.attr("class", l.replace(/disable/gi, "").replace(/(^\s*)|(\s*$)/g, ""))
        }
    }
}
function initFlash(e) {
    var t = getFlashMovieObject(e);
    eObj = null != t.GetKey ? t : new encrypt
}
function getFlashMovieObject(e) {
    return window.document[e] ? window.document[e] : -1 != navigator.appName.indexOf("Microsoft Internet") ? document.getElementById(e) : document.embeds && document.embeds[e] ? document.embeds[e] : void 0
}
function encrypt() {
    this.GetKey = function(e) {
        return e
    }
}
function CheckeObj() {
    null == eObj && (eObj = new encrypt)
}
function GetMenuData(e, t) {
    // console.log(e,t)
    return void 0 !== m_sports[e] && null !== m_sports[e] && void 0 !== m_sports[e][t] && null !== m_sports[e][t] ? m_sports[e][t] : 0
}
function CheckAndSetMenuSport(e, t) {
    return m_sports[e].T > 0 || m_sports[e].OT > 0 ? (t && (void 0 !== fFrame.rightx.ESportBannerClosed && "43" == fFrame.LastSelectedSport ? fFrame.rightx.openESportBanner() : (parent.leftx.LoadMenuData("T"),
    parent.leftx.SwitchSport("T", e))),
    "T") : m_sports[e].E > 0 ? (void 0 !== fFrame.rightx.ESportBannerClosed && "43" == fFrame.LastSelectedSport ? fFrame.rightx.openESportBanner() : (parent.leftx.LoadMenuData("E"),
    parent.leftx.SwitchSport("E", e)),
    "E") : ""
}
function getParent(e) {
    for (var t = e, n = 0; n < 4; n++) {
        if (null != t.SiteMode)
            return t;
        t = t.parent
    }
    return null
}
function InitFirstData() {
    $.ajax({
        url: "menu/Menu_data.php",
        type: "GET",
        dataType: "json",
        data: {},
        async: !0,
        cache: !1,
        success: function(e) {
            if (m_sports = JSON.parse(e.M.replace(/\'/gi, '"')),
            "" != (MenuKey = e.MenuKey)) {
                Tmpl_Initialed = !0,
                DefaultSportOrder = e.SportOrder,
                DefaultVSport = e.DefaultVSport,
                showLiveCasino = e.ShowLiveCasino,
                "1" == fFrame.SiteMode && null != document.getElementById("L_162_head") && (document.getElementById("L_162_head").style.display = "none"),
                EnableWorldCup && $("#worldcup_menu").show(),
                e.IsEuroCupDay && (IsEuroCupDay = !0),
                e.IsOlympicDay && (IsOlympicDay = !0),
                SetMenuDisplayCup(e.OpenOlympic, e.OpenEuroCup, e.OpenWorldCup);
                var t = "true" == e.CanSeeVirtualSports;
                SetCanSeeVirtualSports(t),
                SetShowVirtualSports(t),
                SetMenuData(m_sports, e.ImgSrc),
                SetMenuVerifyKey(e.MenuVerifyKey),
                ifrmaeresizt(),
                document.getElementById("MenuContainer").style.display = "",
                setInterval("UpdateMenuData()", MaxMilliSec)
            }
        },
        complete: function() {},
        error: function(e, t, n) {
            setTimeout(InitFirstData, 3e3)
        }
    })
}
function initialMenuTmpl(e, t, n) {
    if (null == fFrame.hash_TmplLoaded[e]) {
        var a = $("<div></div>");
        return a.load(t, function() {
            fFrame.hash_TmplLoaded[e] = !0,
            document.getElementById("MenuContainer").style.display = "none",
            document.getElementById("MenuContainer").innerHTML = a.html(),
            window.setTimeout(n, 1)
        }),
        !1
    }
    return !0
}
function initialMenu() {
	
	// console.log("sssssffff");
	
    initialMenuTmpl("Menu_tmpl", "menu/Menu_tmpl.php?_=" + (new Date).getTime(), initialMenu) && InitFirstData()
}
function UpdateMenuData(e) {
    $.ajax({
        url: "menu/Menu_data.php",
        type: "GET",
        dataType: "json",
        cache: !1,
        async: !0,
        data: {
            hidMenuType: fFrame.LastSelectedMenu,
            hidMenuKey: MenuKey
        },
        success: function(t) {
            "true" == t.CanSeeVirtualSports != fFrame.CanSeeVirtualSports && (SetCanSeeVirtualSports(t.CanSeeVirtualSports),
            SetShowVirtualSports(t.CanSeeVirtualSports),
            SetLastSelectedSport(fFrame.LastSelectedMArket, !0)),
            SetMenuDisplayCup(t.OpenOlympic, t.OpenEuroCup, t.OpenWorldCup),
            t.MenuKey != MenuKey && (m_sports = JSON.parse(t.M.replace(/\'/gi, '"')),
            MenuKey = t.MenuKey,
            SetMenuData(m_sports, t.ImgSrc, e))
        },
        complete: function() {},
        error: function(e, t, n) {}
    })
}
function AutoRefreshMenuData(e) {
    UpdateMenuData(e)
}
function SetMenuDisplayCup(e, t, n) {
    (n || e) && t ? ($("#subnav_olympic").show(),
    $("#menu_all_tr").show(),
    $("#menu_ap").hide(),
    $("#menu_ep").show(),
    n ? ($("#menu_wp").show(),
    $("#menu_cp").hide()) : ($("#menu_wp").hide(),
    $("#menu_cp").show())) : e || n || t ? ($("#subnav_olympic").show(),
    $("#menu_all_tr").hide(),
    $("#menu_ap").show(),
    t ? e ? ($("#menu_ep").show(),
    $("#menu_cp").hide(),
    $("#menu_wp").hide(),
    2 == fFrame.LastSelectedMenu && (fFrame.LastSelectedMenu = 0,
    gotoSportsBookPage())) : ($("#menu_ep").show(),
    $("#menu_cp").hide(),
    $("#menu_wp").hide(),
    1 == fFrame.LastSelectedMenu && (fFrame.LastSelectedMenu = 0,
    gotoSportsBookPage())) : ($("#menu_ep").hide(),
    n ? ($("#menu_cp").show(),
    $("#menu_wp").hide()) : ($("#menu_wp").show(),
    $("#menu_cp").hide()),
    3 == fFrame.LastSelectedMenu && (fFrame.LastSelectedMenu = 0,
    gotoSportsBookPage()))) : ($("#subnav_olympic").hide(),
    0 != fFrame.LastSelectedMenu && (fFrame.LastSelectedMenu = 0,
    gotoSportsBookPage()))
}
function SetMenuVerifyKey(e) {
    document.getElementById("hidMenuVerifyKey").value = e
}
function SetMenuKey(e) {
    document.getElementById("hidMenuMainSportKey").value = e;
    document.getElementById("hidCanSeeVirtualSports").value = fFrame.CanSeeVirtualSports
}
function SetCanSeeVirtualSports(e) {
    fFrame.CanSeeVirtualSports = e;
    document.getElementById("hidCanSeeVirtualSports").value = e
}
function SetShowVirtualSports(e) {
    /*e && 0 == fFrame.LastSelectedMenu ? document.getElementById("18X_head").style.display = "" : document.getElementById("18X_head").style.display = "none",
    parent.topx.DisplayVistualSport(e)*/
}
function m_mouseover(e, t) {
    var n;
    0 == e ? (null != (n = document.getElementById("menu_all")) && (n.className = "current"),
    null != (n = document.getElementById("menu_ap")) && (n.className = "current"),
    null != (n = document.getElementById("subnav_head")) && (n.className = "item"),
    null != (n = document.getElementById("menu_wp")) && (n.className = ""),
    null != (n = document.getElementById("menu_ep")) && (n.className = ""),
    null != (n = document.getElementById("menu_cp")) && (n.className = "")) : (null != (n = document.getElementById("menu_all")) && (n.className = ""),
    null != (n = document.getElementById("menu_ap")) && (n.className = ""),
    (n = document.getElementById("menu_wp")).className = null != n && 1 == e ? "current" : "",
    (n = document.getElementById("menu_ep")).className = null != n && 3 == e ? "current" : "",
    (n = document.getElementById("menu_cp")).className = null != n && 2 == e ? "current" : "",
    null != (n = document.getElementById("subnav_head")) && (n.className = "item2"))
}
function m_onmouseout(e) {
    var t;
    0 == fFrame.LastSelectedMenu ? (null != (t = document.getElementById("menu_all")) && (t.className = "current"),
    null != (t = document.getElementById("subnav_head")) && (t.className = "item"),
    null != (t = document.getElementById("menu_wp")) && (t.className = "")) : 1 != fFrame.LastSelectedMenu && 2 != fFrame.LastSelectedMenu || (null != (t = document.getElementById("menu_all")) && (t.className = ""),
    null != (t = document.getElementById("menu_wp")) && (t.className = "current"),
    null != (t = document.getElementById("subnav_head")) && (t.className = "item2"))
}
function SwitchMenuType(e, t, n, a) {
    fFrame.LastSelectedSport = null != n ? n : -1,
    fFrame.rightx.RES_PageType = "";
    var l = "E";
    0 == fFrame.LastSelectedMenu && (l = "T"),
    2 != fFrame.LastSelectedMenu || void 0 === m_sports[1].T && void 0 === m_sports[1].L || (l = "T"),
    null != a && (l = a),
    e != fFrame.LastSelectedMenu ? (IsChangeMenuType = !0,
    fFrame.LastSelectedMenu = e,
    m_mouseover(e, t),
    AutoRefreshMenuData(a)) : (1 != fFrame.LastSelectedMenu || IsOlympicDay) && (3 != fFrame.LastSelectedMenu || IsEuroCupDay) ? (fFrame.LastSelectedMenu,
    LoadMenuData(l)) : LoadMenuData(l)
}
function LoadLiveSportSetting() {
    if (parent.rightx.PageLoaded) {
        var e = parent.rightx.arr_ShowLive
          , t = !0;
        for (var n in e) {
            var a = document.getElementById("chkLvSport_" + n);
            null != a && (a.checked = e[n],
            e[n] || (t = !1))
        }
        var l = document.getElementById("chkLvSpotrs_All");
        null != l && (l.checked = t)
    } else
        window.setTimeout(LoadLiveSportSetting, 300)
}
function LiveSportsClickAll(e) {
    LiveMenuSwitch(!0);
    var t = document.getElementById("chkLvSpotrs_All");
    if (t.checked = !0,
    fFrame.LastSelectedSport = -1,
    refreshOddsPage("L", 0))
        if (parent.rightx.PageLoaded) {
            var n = document.getElementsByName("chkLvSport");
            for (a = 0; a < n.length; a++) {
                (l = n[a]).checked = !0,
                161 == l.value ? fFrame.CanSeeNumberGame && parent.rightx.showLiveSport(l.value, !0, fFrame.LastSelectedMenu) : e && "162" == l.value ? (showLiveCasino ? l.checked = !0 : (l.checked = !1,
                t.checked = !1),
                parent.rightx.showLiveSport(l.value, showLiveCasino, fFrame.LastSelectedMenu)) : parent.rightx.showLiveSport(l.value, !0, fFrame.LastSelectedMenu)
            }
        } else
            showLiveCasino || (t.checked = !1);
    else {
        parent.rightx.location.href = "Live.php?Game=" + fFrame.LastSelectedMenu,
        document.getElementById("chkLvSpotrs_All").checked = !0;
        for (var a = 0; a < document.getElementsByName("chkLvSport").length; a++) {
            var l = document.getElementsByName("chkLvSport")[a];
            e && "162" == l.value ? showLiveCasino ? l.checked = !0 : (l.checked = !1,
            t.checked = !1) : l.checked = !0
        }
    }
}
function LiveSportLinkClick(e) {
    if (-1 != parent.rightx.location.pathname.indexOf("Live.php")) {
        "undefined" != typeof myScroll && null != parent.rightx.PopLauncher && parent.rightx.PopLauncher.close();
        var t = document.getElementById("chkLvSport_" + e);
        if (parent.rightx.PageLoaded) {
            document.getElementById("chkLvSpotrs_All").checked = !1;
            var n = getEvent();
            null != n.srcElement ? "checkbox" != n.srcElement.type && (t.checked = !t.checked) : null != n.target && "checkbox" != n.target.type && (t.checked = !t.checked);
            for (var a = !0, l = document.getElementsByName("chkLvSport"), d = 0; d < l.length; d++)
                if (!l[d].checked) {
                    a = !1;
                    break
                }
            document.getElementById("chkLvSpotrs_All").checked = a,
            "undefined" != typeof myScroll && "162" == e || parent.rightx.showLiveSport(e, t.checked, fFrame.LastSelectedMenu)
        } else
            t.checked ? t.checked = !1 : t.checked = !0
    } else
        LiveSportsClickAll(!0)
}
function LiveMenuSwitch(e) {
    for (var t = 1; t <= SportCount; t++)
        null != document.getElementById("L_" + t + "_head") && (e && CheckCountAndSetOtherItem("L", t) ? document.getElementById("L_" + t + "_head").style.display = "" : document.getElementById("L_" + t + "_head").style.display = "none");
    null != document.getElementById("L_1") && (e && CheckCountAndSetOtherItem("L", "1") ? document.getElementById("L_1").style.display = "" : document.getElementById("L_1").style.display = "none"),
    null != document.getElementById("L_99_head") && (e && CheckCountAndSetOtherItem("L", "99") ? document.getElementById("L_99_head").style.display = "" : document.getElementById("L_99_head").style.display = "none"),
    null != document.getElementById("L_160_head") && (document.getElementById("L_160_head").style.display = "none"),
    null != document.getElementById("L_161_head") && (e && fFrame.CanSeeNumberGame ? document.getElementById("L_161_head").style.display = "" : document.getElementById("L_161_head").style.display = "none"),
    null != document.getElementById("L_162_head") && ("1" != fFrame.SiteMode && e ? document.getElementById("L_162_head").style.display = "" : document.getElementById("L_162_head").style.display = "none",
    CheckIsIpad() && $("#L_162_head").empty()),
    null != document.getElementById("L_201_head") && (e && CheckCountAndSetOtherItem("L", "201") ? document.getElementById("L_201_head").style.display = "" : document.getElementById("L_201_head").style.display = "none"),
    OpenLiveSportItem = e
}
function changeLiveDisplayMode(e) {
    parent.rightx.PageLoaded ? parent.rightx.changeDisplayMode(e) : (parent.DisplayMode = e,
    parent.rightx.location.href = "Live.php?Game=" + fFrame.LastSelectedMenu)
}
function refreshOddsPage(e, t, n, a, l) {
    // console.log(e)
    try {
        if (null == parent.rightx.document)
            return !0;
        if (null == parent.rightx.document.body)
            return !0
    } catch (e) {
        return
    }
    var d = parent.rightx.document.DataForm;
    if (null == d && (d = parent.rightx.document.DataForm_D),
    null == d)
        return !1;
    var o = d.action;
    if (null == d.Market)
        return !1;
    var s = d.Sport.value;
    if (null == s)
        return !1;
    if (s != t)
        return !1;
    if (null != a)
        return !1;
    var m = d.Market.value;
    if ("L" != e && "F" != e && "0" != t) {
        if (null == m)
            return !1;
        if (m.toLowerCase() != e.toLowerCase())
            return !1;
        if ("e" == m.toLowerCase() && oAction != o)
            return oAction = o,
            !1
    }
    if ("43" == t && fFrame.LastSelectedLeagueGroup != l)
        return !1;
    if ("1" == t) {
        if ("F" == e && "Favorite" != parent.rightx.document.body.id)
            return !1;
        if ("E" == e || "T" == e) {
            if ("UnderOver" != parent.rightx.document.body.id)
                return !1;
            parent.rightx.document.getElementById("disstyle").value != n && "new" != n && (parent.rightx.initialDisstyle(n),
            parent.rightx.changeDisplayMode(n, fFrame.DomainName))
        }
    } else if ("0" == t)
        if ("L" != e || isParlay) {
            if ("OT" == e) {
                if ("Outright" != parent.rightx.document.body.id)
                    return !1
            } else if (isParlay) {
                if ("MixParlay" != parent.rightx.document.body.id)
                    return !1;
                if (!IsHaveLiveParlay() && "L" == e)
                    return !1;
                if (!IsHaveLiveParlay() && "L" == e && "MixParlay" == parent.rightx.document.body.id)
                    return !1;
                if (parent.rightx.PAGE_MARKET != e && "P" != e)
                    return !1
            }
        } else if ("Live" != parent.rightx.document.body.id)
            return !1;
    return "DataForm" == d.name ? (parent.rightx.refreshData(),
    !0) : "DataForm_D" == d.name && (parent.rightx.refreshAll(),
    !0)
}
function copyKeyWord() {
    $("#KeyWord2").val($("#KeyWord").val())
}
function regclick(e) {
    return !!new RegExp('[\\`,\\~,\\!,\\@,#,\\$,\\%,\\^,\\+,\\*,\\\\,\\?,\\|,\\:,\\<,\\>,\\{,\\},\\=,"]').test(e)
}
function SearchTeamName() {
    var e, t = 3;
    return "ch" != fFrame.UserLang && "cs" != fFrame.UserLang && "zhcn" != fFrame.UserLang || (t = 2),
    regclick($("#KeyWord2").val()) ? ("block" == $("#msgdisplay").css("display") && $("#msgdisplay").css("display", "none"),
    "block" == $("#SearchNotFound").css("display") && $("#SearchNotFound").css("display", "none"),
    $("#SpecialCharacters").css("display", "block"),
    void setTimeout(function() {
        $("#SpecialCharacters").css("display", "none")
    }, 5e3)) : $("#KeyWord2").val().length < t ? ("block" == $("#SearchNotFound").css("display") && $("#SearchNotFound").css("display", "none"),
    "block" == $("#SpecialCharacters").css("display") && $("#SpecialCharacters").css("display", "none"),
    $("#msgdisplay").css("display", "block"),
    void setTimeout(function() {
        $("#msgdisplay").css("display", "none")
    }, 5e3)) : ($.ajax({
        url: "checkSearchResult.ashx",
        async: !1,
        cache: !1,
        type: "post",
        dataType: "json",
        data: "lang=" + encodeURI(fFrame.UserLang) + "&keyWord=" + encodeURI($("#KeyWord2").val()).replace(/&/g, "%26"),
        success: function(t) {
            e = t
        }
    }),
    0 == e ? ("block" == $("#msgdisplay").css("display") && $("#msgdisplay").css("display", "none"),
    "block" == $("#SpecialCharacters").css("display") && $("#SpecialCharacters").css("display", "none"),
    $("#SearchNotFound").css("display", "block"),
    void setTimeout(function() {
        $("#SearchNotFound").css("display", "none")
    }, 5e3)) : ($("#msgdisplay").css("display", "none"),
    $("#SearchNotFound").css("display", "none"),
    parent.rightx.location.href = "AllSingleOdds.php?keyWord=" + encodeURI($("#KeyWord2").val()).replace(/&/g, "%26"),
    fFrame.topx.document.getElementById("SportRadar").className = "liveInfo",
    void $("#KeyWord").val($("#KeyWord2").val())))
}
function AllSportDefClass() {
    null != document.getElementById("151_A") && (document.getElementById("151_A").getElementsByTagName("a")[0].className = ""),
    null != document.getElementById("152_A") && (document.getElementById("152_A").getElementsByTagName("a")[0].className = ""),
    null != document.getElementById("153_A") && (document.getElementById("153_A").getElementsByTagName("a")[0].className = "");
    for (var e = 0; e <= 7; e++)
        null != document.getElementById("18" + e + "_A") && (document.getElementById("18" + e + "_A").getElementsByTagName("a")[0].className = "");
    $("#43_body div[refid] a").removeClass("current"),
    null != document.getElementById("161_A") && (document.getElementById("161_A").getElementsByTagName("a")[0].className = ""),
    null != document.getElementById("164_A") && (document.getElementById("164_A").getElementsByTagName("a")[0].className = ""),
    null != document.getElementById("190_A") && (document.getElementById("190_A").getElementsByTagName("a")[0].className = ""),
    null != document.getElementById("191_A") && (document.getElementById("191_A").getElementsByTagName("a")[0].className = ""),
    null != document.getElementById("192_A") && (document.getElementById("192_A").getElementsByTagName("a")[0].className = ""),
    null != document.getElementById("193_A") && (document.getElementById("193_A").getElementsByTagName("a")[0].className = ""),
    null != document.getElementById("194_A") && (document.getElementById("194_A").getElementsByTagName("a")[0].className = ""),
    null != document.getElementById("99_A") && (document.getElementById("99_A").getElementsByTagName("a")[0].className = ""),
    null != document.getElementById("99_P") && (document.getElementById("99_P").getElementsByTagName("a")[0].className = ""),
    null != document.getElementById("99_OT") && (document.getElementById("99_OT").getElementsByTagName("a")[0].className = "");
    for (e = 1; e <= SportCount; e++)
        null != document.getElementById(e + "_A") && (document.getElementById(e + "_A").getElementsByTagName("a")[0].className = ""),
        null != document.getElementById(e + "_P") && (document.getElementById(e + "_P").getElementsByTagName("a")[0].className = ""),
        null != document.getElementById(e + "_OT") && (document.getElementById(e + "_OT").getElementsByTagName("a")[0].className = ""),
        1 == e && (null != document.getElementById(e + "_1X2") && (document.getElementById(e + "_1X2").getElementsByTagName("a")[0].className = ""),
        null != document.getElementById(e + "_CS") && (document.getElementById(e + "_CS").getElementsByTagName("a")[0].className = ""),
        null != document.getElementById(e + "_OE") && (document.getElementById(e + "_OE").getElementsByTagName("a")[0].className = ""),
        null != document.getElementById(e + "_TG") && (document.getElementById(e + "_TG").getElementsByTagName("a")[0].className = ""),
        null != document.getElementById(e + "_HTFT") && (document.getElementById(e + "_HTFT").getElementsByTagName("a")[0].className = ""),
        null != document.getElementById(e + "_HTFTOE") && (document.getElementById(e + "_HTFTOE").getElementsByTagName("a")[0].className = ""),
        null != document.getElementById(e + "_FGLG") && (document.getElementById(e + "_FGLG").getElementsByTagName("a")[0].className = ""))
}
function ShowOdds(e, t, n, a, l) {
    
    if (fFrame.M88flag && (parent.rightx.location.href = "UnderOver.php?Market=t",
    fFrame.M88flag = !1),
    //fFrame.topx.document.getElementById("SportRadar").className = "B" == e ? "liveInfo added" : "liveInfo",
    "" == e ? (e = fFrame.LastSelectedMArket,
    1 != t || null == parent.rightx.arr_Match || 0 == parent.rightx.arr_Match.length || fFrame.IsShowLiveInfoSideView || parent.rightx.LiveInfoBackButton()) : "F" != e && "B" != e || (isParlay = !1,
    fFrame.isFavFirstLoad = !0),
    void 0 === fFrame.LastSelectedBettype && (fFrame.LastSelectedBettype = "T"),
    "1" == fFrame.LastSelectedSport && e == fFrame.LastSelectedBettype && fFrame.IsShowLiveInfoSideView && void 0 !== parent.rightx.arr_Match && -1 == indexOf(parent.rightx.arr_Match, "0"))
        parent.rightx.LiveInfoBackButton();
    else {
        var d = parent.rightx.document.DataForm;
        null == d && (d = parent.rightx.document.DataForm_D);

        // console.log(d, fFrame.LastSelectedMenu, e, t, n, a, l)
        if ((null == d ? "0" : null == d.Game ? "0" : d.Game.value) != fFrame.LastSelectedMenu || (43 == t && "OU" == a && (l = document.getElementById("43_body").getElementsByTagName("div")[0].id.split("_")[1]),
        !refreshOddsPage(e, t, n, a, l))) {
            (t < 180 || t > 194) && 252 != t && 154 != t && t > 0 && ("T" == e || "E" == e || "L" == e) && GetMenuData(t, e) <= 0 && GetMenuData(t, "P") > 0 && (e = "P"),
            fFrame.LastSelectedSport = t,
            fFrame.LastSelectedBettype = e,
            void 0 === l && (l = fFrame.LastSelectedLeagueGroup),
            fFrame.LastSelectedLeagueGroup = l,
            AllSportDefClass(),
            160 != t && 252 != t && 154 != t && t > 0 && ("T" == e || "E" == e || "L" == e ? 43 != t ? document.getElementById(t + "_A").getElementsByTagName("a")[0].className = "current" : ("OU" == a && (l = document.getElementById("43_body").getElementsByTagName("div")[0].id.split("_")[1]),
            null != document.getElementById(t + "_" + l) && (document.getElementById(t + "_" + l).getElementsByTagName("a")[0].className = "current")) : "F" != e && "B" != e && (document.getElementById(t + "_" + e).getElementsByTagName("a")[0].className = "current"));
            try {
                parent.rightx.document.body.id
            } catch (a) {
                if ("P" == e)
                    parent.rightx.location.href = arrURL["0_P"] + "?Sport=" + t + "&Market=" + fFrame.LastSelectedMArket + "&DispVer=" + n + "&Game=" + fFrame.LastSelectedMenu;
                else if ("P" == t)
                    parent.rightx.location.href = arrURL["0_P"] + "?Sport=0&Market=" + fFrame.LastSelectedMArket + "&Game=" + fFrame.LastSelectedMenu;
                else if ("OT" == e)
                    parent.rightx.location.href = arrURL["0_OT"] + "?Sport=" + t + "&Market=" + e.toLowerCase() + "&DispVer=" + n + "&Game=" + fFrame.LastSelectedMenu;
                else if ("OT" == t)
                    parent.rightx.location.href = arrURL["0_OT"] + "?Sport=0&Market=" + e.toLowerCase() + "&Game=" + fFrame.LastSelectedMenu;
                else if ("151" == t || "152" == t || "153" == t){
                    parent.rightx.location.href = "E" == e ? arrURL[t + "_E"] + "?RM=E&SportType=" + t : arrURL[t + "_T"] + "?RM=T&SportType=" + t;
                }
                /*else if ("252" == t)
                    parent.topx.openCasinoBingo();*/
                else if ("161" == t || "164" == t)
                    fFrame.CanSeeNumberGame && (fFrame.ShowUpGradeMsgForNG ? parent.leftx.OpenMessageForNG() : (fFrame.NowSportPage = t.toString(),
                    parent.rightx.location.href = arrURL["161_T"] + "?Sport=" + t + "&Market=" + e.toLowerCase()));
                else if ("160" == t)
                    fFrame.CanSeeNumberGame && (fFrame.ShowUpGradeMsgForNG ? parent.leftx.OpenMessageForNG() : (fFrame.NowSportPage = t.toString(),
                    parent.rightx.location.href = arrURL["160_T"] + "?Sport=" + t + "&Market=" + e.toLowerCase()));
                else if ("201" == t)
                    "" == e || "T" == e || (parent.rightx.location.href = arrURL[201] + "?Market=" + e);
                else {
                    
                    if (GetMenuData(t, e) <= 0 && GetMenuData(t, "OT") > 0)
                        return parent.rightx.location.href = arrURL["0_OT"] + "?Sport=" + t + "&Market=" + e.toLowerCase() + "&DispVer=" + n + "&Game=" + fFrame.LastSelectedMenu,
                        void (null != d && (oAction = d.action));
                    parent.rightx.location.href = arrURL[t + "_" + e] + "?Sport=" + t + "&Market=" + fFrame.LastSelectedMArket.toLowerCase() + "&DispVer=" + n + "&Game=" + fFrame.LastSelectedMenu + "&LeagueGroup=" + l
                }
                return void (null != d && (oAction = d.action))
            }
            if (-1 == t) {
                for (var o = 1; o <= SportCount; o++)
                    if (GetMenuData(o, e) > 0)
                        return void (t = o)
            } else if ("151" == t || "152" == t || "153" == t)
                parent.rightx.location.href = "E" == e ? arrURL[t + "_E"] + "?RM=E&SportType=" + t : arrURL[t + "_T"] + "?RM=T&SportType=" + t;
            /*else if ("252" == t)
                parent.topx.openCasinoBingo();*/
            else if ("161" == t || "164" == t)
                fFrame.CanSeeNumberGame && (fFrame.ShowUpGradeMsgForNG ? parent.leftx.OpenMessageForNG() : (fFrame.NowSportPage = t.toString(),
                parent.rightx.location.href = arrURL["161_T"] + "?Sport=" + t + "&Market=" + e.toLowerCase() + "&DispVer=" + n));
            else if ("160" == t)
                fFrame.CanSeeNumberGame && (fFrame.ShowUpGradeMsgForNG ? parent.leftx.OpenMessageForNG() : parent.rightx.location.href = arrURL["160_T"] + "?Sport=" + t + "&Market=" + e.toLowerCase() + "&DispVer=" + n);
            else if ("201" == t)
                "" == e || "T" == e || (parent.rightx.location.href = arrURL[201] + "?Market=" + e);
            else if (!isParlay && "P" != e || "P" != SelectPageSport && "0" == t)
                if ("OT" != e || "OT" != SelectPageSport && "0" == t) {
                    var s = "";
                    if ("1X2" != e && "OE" != e && "TG" != e && "CS" != e && "FGLG" != e && "HTFT" != e && "HTFTOE" != e || (s = "&Page=" + e),
                    "B" == e)
                        parent.rightx.location.href = arrURL[t + "_F"] + "?Sport=" + t + "&Market=" + fFrame.LastSelectedMArket.toLowerCase() + "&DispVer=" + n + "&Game=" + fFrame.LastSelectedMenu + s + "&PageType=B";
                    else {
                    if(t==0 && (e=='T' || e=='E')){
                        e = 'P';
                    }
                        var m = null == parent.rightx.appentArg ? "" : parent.rightx.appentArg;
                        parent.rightx.location.href = arrURL[t + "_" + e] + "?Sport=" + t + "&Market=" + fFrame.LastSelectedMArket.toLowerCase() + "&DispVer=" + n + "&Game=" + fFrame.LastSelectedMenu + "&LeagueGroup=" + l + s + m
                    }
                } else
                    "0" == t && null != document.getElementById("OT_head") && (document.getElementById("OT_head").getElementsByTagName("a")[0].className = "navon current"),
                    parent.rightx.location.href = arrURL["0_OT"] + "?Sport=" + t + "&Market=" + e.toLowerCase() + "&DispVer=" + n + "&Game=" + fFrame.LastSelectedMenu;
            else
                "0" == t && null != document.getElementById("P_head") && (document.getElementById("P_head").getElementsByTagName("a")[0].className = "navon current"),
                parent.rightx.location.href = arrURL["0_P"] + "?Sport=" + t + "&Market=" + fFrame.LastSelectedMArket + "&DispVer=" + n + "&Game=" + fFrame.LastSelectedMenu;
            null != d && (oAction = d.action)
        }
    }
}
function SwitchSport(e, t, n, a, l) {
    var d = document.getElementById("subnavbg").offsetHeight;
    "" == e && (e = fFrame.LastSelectedMArket),
    "LP" == e && LiveMenuSwitch(!1);
    try {
        isParlay = "P" == e || "LP" == e || 0 == t && "OT" != e && "Outright" != parent.rightx.document.body.id && "" != parent.rightx.document.body.id
    } catch (e) {
        isParlay = !1
    }
    if ("4201400" == fFrame.SiteId && SwitchSymbol(),
    CheckCountAndSetOtherItem(e, t) ? ("L" != e && "OT" != e && "0" != t && "P" != e && "LP" != e ? (CheckIsRacing(t) ? document.getElementById("15X_body").style.display = "E" == e ? "none" : "" : t >= 180 && t <= 194 ? document.getElementById("18X_body").style.display = "" : 160 != t && 252 != t && 154 != t && (164 == t ? document.getElementById("161_body").style.display = "" : document.getElementById(t + "_body").style.display = ""),
    IsFun88 ? document.getElementById("HAD_T" + t).className = "subnavon" : "4201400" == fFrame.SiteId && (document.getElementById(t + "_head_icon").className = "nava")) : "L" != e && "OT" == e && "0" == t && IsFun88 && (document.getElementById("HAD_TOT").className = "subnavon"),
    fFrame.LastSelectedSport = t) : CheckIsRacing(t) || (t = -1),
    this.CloseSports(e, t),
    CheckIsRacing(t) || (t = fFrame.LastSelectedSport),
    0 != t && (SelectPageSport = ""),
    CheckIsRacing(t) ? null != document.getElementById("15X_head") && (document.getElementById("15X_head").getElementsByTagName("a")[0].className = "navon current") : t >= 180 && t <= 194 ? null != document.getElementById("18X_head") && (document.getElementById("18X_head").getElementsByTagName("a")[0].className = "navon current") : 0 == t ? "OT" == e || "OT" == SelectPageSport && "P" != e ? null != document.getElementById("OT_head") && (SelectPageSport = "OT",
    document.getElementById("OT_head").getElementsByTagName("a")[0].className = "navon current") : "LP" != e && "P" != e && "P" != SelectPageSport || null != document.getElementById("P_head") && (SelectPageSport = "P",
    document.getElementById("P_head").getElementsByTagName("a")[0].className = "navon current") : 164 == t ? document.getElementById("161_head").getElementsByTagName("a")[0].className = "navon current" : null != document.getElementById(t + "_head") && (document.getElementById(t + "_head").getElementsByTagName("a")[0].className = "navon current"),
    //"L" == e ? parent.topx.SwitchSportClass(1) : parent.topx.SwitchSportClass(t),
    !a) {
        if ("L" != e || isParlay)
            "L" == e && isParlay && IsHaveLiveParlay() && LiveMenuSwitch(!1),
            this.ShowOdds(e, t, fFrame.DisplayMode, l);
        else if ("L" == fFrame.LastSelectedMArket || 0 == GetMenuData("0", "TotalLive"))
            return void (fFrame.LastSelectedSport = -1);
        d - document.getElementById("subnavbg").offsetHeight > 0 && (0 != document.body.scrollTop && (document.body.scrollTop = document.body.scrollTop - d + document.getElementById("subnavbg").offsetHeight),
        0 != document.documentElement.scrollTop && (document.documentElement.scrollTop = document.documentElement.scrollTop - d + document.getElementById("subnavbg").offsetHeight))
    }
}
function SetMarketClass_SportRadar(e) {
    SportRadarIdx = e,
    LoadMenuData(e <= 1 ? "T" : "E", !0),
    CloseAllSports()
}
function CloseAllSports() {
    null != document.getElementById("15X_head") && (document.getElementById("15X_head").getElementsByTagName("a")[0].className = "navon"),
    null != document.getElementById("161_head") && (document.getElementById("161_head").getElementsByTagName("a")[0].className = "navon"),
    null != document.getElementById("160_head") && (document.getElementById("160_head").getElementsByTagName("a")[0].className = "navon"),
    null != document.getElementById("18X_head") && (document.getElementById("18X_head").getElementsByTagName("a")[0].className = "navon"),
    null != document.getElementById("P_head") && (document.getElementById("P_head").getElementsByTagName("a")[0].className = "navon"),
    null != document.getElementById("OT_head") && (document.getElementById("OT_head").getElementsByTagName("a")[0].className = "navon"),
    null != document.getElementById("154_head") && (document.getElementById("154_head").getElementsByTagName("a")[0].className = "navon"),
    null != document.getElementById("252_head") && (document.getElementById("252_head").getElementsByTagName("a")[0].className = "navon");
    for (var e = 1; e <= SportCount; e++)
        null != document.getElementById(e + "_head") && (document.getElementById(e + "_head").getElementsByTagName("a")[0].className = "navon");
    for (e = 1; e <= SportCount; e++)
        null != document.getElementById(e + "_body") && (document.getElementById(e + "_body").style.display = "none");
    document.getElementById("99_body").style.display = "none",
    null != document.getElementById("15X_body") && (document.getElementById("15X_body").style.display = "none"),
    null != document.getElementById("161_body") && (document.getElementById("161_body").style.display = "none"),
    null != document.getElementById("18X_body") && (document.getElementById("18X_body").style.display = "none"),
    document.getElementById("201_body").style.display = "none"
}
function CloseSports(e, t) {
    null != document.getElementById("15X_head") && (document.getElementById("15X_head").getElementsByTagName("a")[0].className = "navon"),
    null != document.getElementById("161_head") && (document.getElementById("161_head").getElementsByTagName("a")[0].className = "navon"),
    null != document.getElementById("160_head") && (document.getElementById("160_head").getElementsByTagName("a")[0].className = "navon"),
    null != document.getElementById("18X_head") && (document.getElementById("18X_head").getElementsByTagName("a")[0].className = "navon"),
    null != document.getElementById("P_head") && (document.getElementById("P_head").getElementsByTagName("a")[0].className = "navon"),
    null != document.getElementById("OT_head") && (document.getElementById("OT_head").getElementsByTagName("a")[0].className = "navon"),
    null != document.getElementById("154_head") && (document.getElementById("154_head").getElementsByTagName("a")[0].className = "navon"),
    null != document.getElementById("252_head") && (document.getElementById("252_head").getElementsByTagName("a")[0].className = "navon"),
    null != document.getElementById("99_head") && (document.getElementById("99_head").getElementsByTagName("a")[0].className = "navon");
    for (var n = 1; n <= SportCount; n++)
        n != t && null != document.getElementById(n + "_head") && (document.getElementById(n + "_head").getElementsByTagName("a")[0].className = "navon");
    for (n = 1; n <= SportCount; n++)
        n != t && null != document.getElementById(n + "_body") && (document.getElementById(n + "_body").style.display = "none",
        IsFun88 && (document.getElementById("HAD_T" + n).className = "subnav"));
    99 != t && (document.getElementById("99_body").style.display = "none",
    IsFun88 && (document.getElementById("HAD_T99").className = "subnav")),
    CheckIsRacing(t) || (null != document.getElementById("15X_body") && (document.getElementById("15X_body").style.display = "none"),
    IsFun88 && null != document.getElementById("HAD_T151") && (document.getElementById("HAD_T151").className = "subnav")),
    161 != t && 164 != t && (null != document.getElementById("161_body") && (document.getElementById("161_body").style.display = "none"),
    IsFun88 && null != document.getElementById("HAD_T161") && (document.getElementById("HAD_T161").className = "subnav")),
    160 != t && (null != document.getElementById("160_body") && (document.getElementById("160_body").style.display = "none"),
    IsFun88 && null != document.getElementById("HAD_T160") && (document.getElementById("HAD_T160").className = "subnav")),
    (t < 180 || t > 194) && null != document.getElementById("18X_body") && (document.getElementById("18X_body").style.display = "none"),
    201 != t && (document.getElementById("201_body").style.display = "none",
    IsFun88 && (document.getElementById("HAD_T201").className = "subnav")),
    IsFun88 && "OT" != e && (document.getElementById("HAD_TOT").className = "subnav")
}
function SetMenuBaseItem(e, t) {
    var n = null
      , a = null;
    if ("L" == e ? 164 == t ? (n = document.getElementById("L_161"),
    a = document.getElementById("L_161_head")) : (n = document.getElementById(e + "_" + t),
    a = document.getElementById(e + "_" + t + "_head")) : t >= 180 && t <= 194 ? (n = document.getElementById("18X_body"),
    a = document.getElementById("18X_head")) : 164 == t ? (n = document.getElementById("161_body"),
    a = document.getElementById("161_head")) : (n = document.getElementById(t + "_body"),
    a = document.getElementById(t + "_head")),
    null != n)
        if (CheckCountAndSetOtherItem(e, t)) {
            if (a.style.display = "",
            n.style.display = "",
            t >= 180 && t <= 194)
                return void (fFrame.CanSeeVirtualSports || fFrame.CanSeeBRVS || fFrame.CanSeeBRVSWC || fFrame.CanSeeBRVSBasketball || (a.style.display = "none",
                n.style.display = "none"));
            if ("L" == e)
                if (161 == t || 164 == t) {
                    var l = 0
                      , d = 0;
                    fFrame.CanSeeNumberGame && (!0,
                    l = parseInt(GetMenuData(161, e))),
                    fFrame.CanSeeHappy5 && (!0,
                    d = parseInt(GetMenuData(164, e))),
                    document.getElementById(e + "_161_Cnt").innerHTML = "" + (l + d)
                } else
                    document.getElementById(e + "_" + t + "_Cnt").innerHTML = GetMenuData(t, e);
            else if ("15X" == t || 201 == t || 161 == t || 164 == t || 252 == t || 154 == t) {
                if ("15X" == t) {
                    var o = null;
                    if (2 != fFrame.SiteMode && (o = fFrame.topx.document.getElementById("topHorse")),
                    fFrame.CanSeeHorse || fFrame.CanSeeGreyhounds || fFrame.CanSeeHarness) {
                        var s = 0
                          , m = 0;
                        fFrame.CanSeeHorse && (s += parseInt(GetMenuData("151", "E"), 10),
                        m += parseInt(GetMenuData("151", "T"), 10)),
                        fFrame.CanSeeGreyhounds && (s += parseInt(GetMenuData("152", "E"), 10),
                        m += parseInt(GetMenuData("152", "T"), 10)),
                        fFrame.CanSeeHarness && (s += parseInt(GetMenuData("153", "E"), 10),
                        m += parseInt(GetMenuData("153", "T"), 10)),
                        "E" == e ? (a.style.display = "",
                        n.style.display = "",
                        m <= 0 ? null != o && (o.className = "fun_icon07") : null != o && (o.className = "fun_icon08"),
                        s <= 0 ? (document.getElementById(t + "_Cnt").innerHTML = "",
                        document.getElementById("img_" + t + "_LV").style.display = "none",
                        document.getElementById(t + "_head").style.display = "none") : (document.getElementById(t + "_Cnt").innerHTML = s,
                        document.getElementById("img_" + t + "_LV").style.display = "none",
                        document.getElementById(t + "_head").style.display = "")) : (a.style.display = "",
                        n.style.display = "",
                        m <= 0 ? (document.getElementById(t + "_Cnt").innerHTML = "",
                        document.getElementById("img_" + t + "_LV").style.display = "none",
                        null != o && (o.className = "fun_icon07")) : (document.getElementById(t + "_Cnt").innerHTML = m,
                        document.getElementById("img_" + t + "_LV").style.display = "",
                        null != o && (o.className = "fun_icon08")))
                    } else
                        a.style.display = "none",
                        n.style.display = "none",
                        document.getElementById("img_" + t + "_LV").style.display = "none",
                        null != o && (o.className = "fun_icon07")
                } else if (154 == t)
                    "T" == e ? document.getElementById(t + "_Cnt").innerHTML = GetMenuData("154", "T") : (a.style.display = "none",
                    n.style.display = "none");
                else if (252 == t)
                    a.style.display = "none",
                    n.style.display = "none";
                else if (201 == t) {
                    document.getElementById(t + "_Cnt").innerHTML = "";
                    var r = document.getElementById("201_body").getElementsByTagName("tr");
                    for (i = 0; i < r.length; i++)
                        r[i].style.display = "none"
                } else if (160 == t)
                    fFrame.CanSeeLucky3 ? "E" == e ? (a.style.display = "none",
                    n.style.display = "none") : GetMenuData(t, e) <= 0 ? document.getElementById(t + "_Cnt").innerHTML = "" : "4100300" == fFrame.SiteId ? GetMenuData(t, "L") <= 0 ? document.getElementById(t + "_Cnt").innerHTML = "" : document.getElementById(t + "_Cnt").innerHTML = GetMenuData(t, "L") : document.getElementById(t + "_Cnt").innerHTML = GetMenuData(t, e) : (a.style.display = "none",
                    n.style.display = "none");
                else if (161 == t || 164 == t)
                    if (fFrame.CanSeeNumberGame || fFrame.CanSeeHappy5)
                        if (161 != t || fFrame.CanSeeNumberGame)
                            if (164 != t || fFrame.CanSeeHappy5)
                                if ("E" == e)
                                    a.style.display = "none",
                                    n.style.display = "none";
                                else if (161 == t && GetMenuData(t, e) <= 0)
                                    document.getElementById(t + "_Cnt").innerHTML = "";
                                else {
                                    l = 0,
                                    d = 0;
                                    fFrame.CanSeeNumberGame && (l = parseInt(GetMenuData(161, e))),
                                    fFrame.CanSeeHappy5 && (d = parseInt(GetMenuData(164, e))),
                                    document.getElementById("161_Cnt").innerHTML = "" + (l + d),
                                    document.getElementById(t + "_A_Cnt").innerHTML = GetMenuData(t, e)
                                }
                            else
                                n.style.display = "none";
                        else
                            n.style.display = "none";
                    else
                        a.style.display = "none",
                        n.style.display = "none"
            } else
                null != document.getElementById(t + "_Cnt") && (document.getElementById(t + "_Cnt").innerHTML = parseInt(GetMenuData(t, e), 10) + parseInt(GetMenuData(t, "OT"), 10));
            if ("201" == t || "252" == t || "154" == t)
                return;
            if ("L" != e && "161" != t && "160" != t)
                if ("15X" == t) {
                    var u = GetMenuData("151", e)
                      , c = GetMenuData("152", e)
                      , y = GetMenuData("153", e)
                      , B = document.getElementById("151_A")
                      , p = document.getElementById("152_A")
                      , g = document.getElementById("153_A");
                    fFrame.CanSeeHorse ? (B.style.display = "",
                    document.getElementById("151_A_Cnt").innerHTML = u <= 0 ? "" : u) : null != B && (B.style.display = "none"),
                    fFrame.CanSeeGreyhounds ? (p.style.display = "",
                    document.getElementById("152_A_Cnt").innerHTML = c <= 0 ? "" : c) : null != p && (p.style.display = "none"),
                    fFrame.CanSeeHarness ? (g.style.display = "",
                    document.getElementById("153_A_Cnt").innerHTML = y <= 0 ? "" : y) : null != g && (g.style.display = "none")
                } else
                    null != (n = document.getElementById(t + "_A")) && (GetMenuData(t, e) <= 0 ? n.style.display = "none" : (n.style.display = "",
                    document.getElementById(t + "_A_Cnt").innerHTML = GetMenuData(t, e)));
            if ("L" != e && "15X" != t && "161" != t && "164" != t && (0 == GetMenuData(t, "L") || "E" == e ? "15X" != t && (null != (n = document.getElementById("img_" + t + "_LV")) && (n.style.display = "none"),
            null != (n = document.getElementById("img_" + t + "_P_LV")) && (n.style.display = "none")) : ((n = document.getElementById("img_" + t + "_LV")).style.display = "",
            GetMenuData(t, "LP") > 0 && null != (n = document.getElementById("img_" + t + "_P_LV")) && (n.style.display = ""))),
            "15X" == t || CheckIsRacing(t))
                return;
            if (("161" == t || "164" == t) && (CheckIsIpad() && (document.getElementById("img_L_161_TV").style.display = "none",
            document.getElementById("img_161_TV").style.display = "none"),
            "2" == fFrame.SiteMode && fFrame.IsLogin || "2" != fFrame.SiteMode))
                return;
            if ("160" == t && (null != (n = document.getElementById("img_L_160_TV")) && (n.style.display = "none"),
            null != (n = document.getElementById("img_160_TV")) && (n.style.display = "none"),
            "2" == fFrame.SiteMode && fFrame.IsLogin || "2" != fFrame.SiteMode))
                return;
            if (t >= 180 && t <= 194)
                return;
            n = "L" == e ? document.getElementById("img_" + e + "_" + t + "_TV") : document.getElementById("img_" + t + "_TV"),
            0 == GetMenuData(t, "TV") || "E" == e || IsM88 || IsALog || IsFun88 || IsDela || IsTLC || IsSuncity || IsMayfair || IsZzun88 || "4201100" == fFrame.SiteId || "1" == fFrame.Deposit_SiteMode || "4201200" == fFrame.SiteId || "4200200" == fFrame.SiteId ? n.style.display = "none" : n.style.display = "none" /* ลบ none ตัวนี้ถ้าอยากแสดงไอคอนไลฟ์ของเมนูกีฬา */
        } else
            150 != t && (a.style.display = "none",
            n.style.display = "none")
}
function CheckCountAndSetOtherItem(e, t) {
    var n = 0;
    if ("L" == e && "OT" == t)
        return !1;
    if ("OT" == t || "P" == t)
        return !0;
    if (43 == t && !fFrame.CanSeeESport)
        return !1;
    if (t >= 180 && t <= 194 || 252 == t)
        return "E" != e;
    if ("L" != e) {
        if (1 == t) {
            var a = e + "_1X2";
            spObj = document.getElementById("1_1X2"),
            GetMenuData("1", a) <= 0 ? spObj.style.display = "none" : (spObj.style.display = "",
            document.getElementById("1_1X2_Cnt").innerHTML = GetMenuData("1", a),
            n += GetMenuData("1", a)),
            a = e + "_FGLG",
            spObj = document.getElementById("1_FGLG"),
            GetMenuData("1", a) <= 0 ? spObj.style.display = "none" : (spObj.style.display = "",
            document.getElementById("1_FGLG_Cnt").innerHTML = GetMenuData("1", a),
            n += GetMenuData("1", a)),
            a = e + "_HTFT",
            spObj = document.getElementById("1_HTFT"),
            GetMenuData("1", a) <= 0 ? spObj.style.display = "none" : (spObj.style.display = "",
            document.getElementById("1_HTFT_Cnt").innerHTML = GetMenuData("1", a),
            n += GetMenuData("1", a)),
            a = e + "_HTFTOE",
            spObj = document.getElementById("1_HTFTOE"),
            GetMenuData("1", a) <= 0 ? spObj.style.display = "none" : (spObj.style.display = "",
            document.getElementById("1_HTFTOE_Cnt").innerHTML = GetMenuData("1", a),
            n += GetMenuData("1", a)),
            a = e + "_OE",
            spObj = document.getElementById("1_OE"),
            GetMenuData("1", a) <= 0 ? spObj.style.display = "none" : (spObj.style.display = "",
            document.getElementById("1_OE_Cnt").innerHTML = GetMenuData("1", a),
            n += GetMenuData("1", a)),
            a = e + "_TG",
            spObj = document.getElementById("1_TG"),
            GetMenuData("1", a) <= 0 ? spObj.style.display = "none" : (spObj.style.display = "",
            document.getElementById("1_TG_Cnt").innerHTML = GetMenuData("1", a),
            n += GetMenuData("1", a)),
            a = e + "_CS",
            spObj = document.getElementById("1_CS"),
            GetMenuData("1", a) <= 0 ? spObj.style.display = "none" : (spObj.style.display = "",
            document.getElementById("1_CS_Cnt").innerHTML = GetMenuData("1", a),
            n += GetMenuData("1", a)),
            spObj = document.getElementById("1_P"),
            a = e + "_P";
            var l = 0;
            (l = parseInt(GetMenuData("1", a), 10)) <= 0 ? spObj.style.display = "none" : (spObj.style.display = "",
            document.getElementById("1_P_Cnt").innerHTML = l,
            n += l,
            "E" != e && null != document.getElementById("img_1_P_LV") && (spObj = document.getElementById("img_1_P_LV"),
            GetMenuData("1", "LP") > 0 ? spObj.style.display = "" : spObj.style.display = "none"))
        } else {
            if ("15X" == t || CheckIsRacing(t))
                return !0;
            if (161 == t || 160 == t || 164 == t)
                return !0;
            if (0 == t)
                return !0;
            if ("43" == t) {
                var d = e + "_Item";
                if ($("#43_body div[refid]").css("display", "none"),
                void 0 !== m_sports[t] && null !== m_sports[t] && void 0 !== m_sports[t][d] && null !== m_sports[t][d]) {
                    var o = !1;
                    m_sports[t][d].forEach(function(e) {
                        spObj = document.getElementById("43_" + e.split("_")[0]),
                        null != spObj && (spObj.style.display = "",
                        document.getElementById("43_" + e.split("_")[0] + "_Cnt").innerHTML = e.split("_")[1]),
                        fFrame.LastSelectedLeagueGroup == e.split("_")[0] && (o = !0)
                    }),
                    o || (fFrame.LastSelectedLeagueGroup = "0")
                }
            }
            var s = t + "_P";
            a = e + "_P";
            if (spObj = document.getElementById(s),
            null != spObj) {
                l = 0;
                (l = parseInt(GetMenuData(t, a), 10)) <= 0 ? spObj.style.display = "none" : (spObj.style.display = "",
                s = t + "_P_Cnt",
                document.getElementById(s).innerHTML = l,
                n += l,
                s = "img_" + t + "_P_LV",
                spObj = document.getElementById(s),
                "E" != e && null != spObj && (GetMenuData(t, "LP") > 0 ? spObj.style.display = "" : spObj.style.display = "none"))
            }
        }
        CheckIsRacing(t) || 201 == t || 161 == t || 160 == t || (spObj = document.getElementById(t + "_OT"),
        null != spObj && (GetMenuData(t, "OT") <= 0 ? spObj.style.display = "none" : (spObj.style.display = "",
        document.getElementById(t + "_OT_Cnt").innerHTML = GetMenuData(t, "OT"),
        n += GetMenuData(t, "OT"))))
    }
    return !((n += GetMenuData(t, e)) <= 0)
}
function SetMenuItem(e) {
    var t = null
      , n = null
      , a = null;
    fFrame.UserLang;
    !fFrame.IsLogin || IsM88 || IsALog || null != document.getElementById("div_favorite") && ((a = document.getElementById("div_favorite")).className = "favoritemenu",
    a.style.display = "");
    for (var l = 1; l <= SportCount; l++)
        this.SetMenuBaseItem(e, l);
    if (this.SetMenuBaseItem(e, 99),
    this.SetMenuBaseItem(e, "15X"),
    this.SetMenuBaseItem(e, 161),
    this.SetMenuBaseItem(e, 164),
    this.SetMenuBaseItem(e, DefaultVSport),
    this.SetMenuBaseItem(e, 201),
    this.SetMenuBaseItem(e, 252),
    this.SetMenuBaseItem(e, 154),
    "L" != e) {
        if (n = document.getElementById("OT_head"),
        GetMenuData("OT", e) <= 0 ? n.style.display = "none" : (n.style.display = "",
        document.getElementById("OT_Cnt").innerHTML = GetMenuData("OT", e)),
        void 0 != document.getElementById("P_head"))
            if (n = document.getElementById("P_head"),
            GetMenuData("P", e) <= 0 ? n.style.display = "none" : (n.style.display = "",
            document.getElementById("P_Cnt").innerHTML = GetMenuData("P", e)),
            "T" != e) {
                null != (t = document.getElementById("img_P_LV")) && (t.style.display = "none"),
                null != (t = document.getElementById("img_P_TV")) && (t.style.display = "none")
            } else {
                // disable mix parley live icon 
                null != (t = document.getElementById("img_P_LV")) && (GetMenuData("P", "Live") <= 0 ? t.style.display = "none" : t.style.display = ""),
                null != (t = document.getElementById("img_P_TV")) && (GetMenuData("P", "TV") <= 0 ? t.style.display = "none" : t.style.display = "none")
            }
    } else
        n = document.getElementById(e + "_A_head"),
        GetMenuData("0", "TotalLive") <= 0 ? (document.getElementById(e + "_A_Cnt").innerHTML = "",
        document.getElementById("img_" + e + "_A_TV").style.display = "none") : (n.style.display = "",
        document.getElementById(e + "_A_Cnt").innerHTML = GetMenuData("0", "TotalLive"),
        t = document.getElementById("img_" + e + "_A_TV"),
        0 == GetMenuData("0", "TV") ? t.style.display = "none" : IsM88 || IsALog || IsFun88 || IsTLC || IsSuncity || IsMayfair || IsZzun88 || IsDela || "4201100" == fFrame.SiteId || "4201200" == fFrame.SiteId || "4200200" == fFrame.SiteId ? t.style.display = "none" : t.style.display = ""),
        void 0 != document.getElementById("L_P_head") && (n = document.getElementById("L_P_head"),
        GetMenuData("P", e) <= 0 ? n.style.display = "none" : (n.style.display = "",
        document.getElementById("L_P_Cnt").innerHTML = GetMenuData("P", "T")),
        null != (t = document.getElementById("img_L_P_TV")) && (GetMenuData("P", "TV") <= 0 ? t.style.display = "none" : t.style.display = "")),
        LiveMenuSwitch(OpenLiveSportItem)
}
function SetLastSelectedSport(e, t) {
    if ("2" == fFrame.SiteMode && (151 != fFrame.LastSelectedSport && 152 != fFrame.LastSelectedSport && 153 != fFrame.LastSelectedSport || "E" != e && "L" != e || (fFrame.LastSelectedSport = 1)),
    "E" == e && (fFrame.LastSelectedSport >= 151 && fFrame.LastSelectedSport <= 194 || 252 == fFrame.LastSelectedSport) && (fFrame.LastSelectedSport = -1),
    fFrame.LastSelectedSport >= 180 && fFrame.LastSelectedSport <= 186 && !fFrame.CanSeeVirtualSports && (fFrame.LastSelectedSport = -1),
    fFrame.LastSelectedSport >= 190 && fFrame.LastSelectedSport <= 191 && !fFrame.CanSeeBRVS && (fFrame.LastSelectedSport = -1),
    192 != fFrame.LastSelectedSport || fFrame.CanSeeBRVSWC || (fFrame.LastSelectedSport = -1),
    193 != fFrame.LastSelectedSport || fFrame.CanSeeBRVSBasketball || (fFrame.LastSelectedSport = -1),
    194 != fFrame.LastSelectedSport || fFrame.CanSeeBRVSAC || (fFrame.LastSelectedSport = -1),
    -1 == fFrame.LastSelectedSport || fFrame.LastSelectedSport >= 180 && fFrame.LastSelectedSport <= 194 || GetMenuData(fFrame.LastSelectedSport, e) > 0 || GetMenuData(fFrame.LastSelectedSport, "OT") > 0 || GetMenuData(fFrame.LastSelectedSport, "P") > 0 || 0 == fFrame.LastSelectedSport && 0 == GetMenuData(SelectPageSport, e) && (fFrame.LastSelectedSport = -1),
    -1 == fFrame.LastSelectedSport)
        for (var n = DefaultSportOrder.split(","), a = 0; a < n.length; a++) {
            var l = n[a];
            if (("E" != e || "18X" != l && "15X" != l && "161" != l && "160" != l && "252" != l && "154" != l) && (fFrame.CanSeeVirtualSports || fFrame.CanSeeBRVS || fFrame.CanSeeBRVSWC || fFrame.CanSeeBRVSBasketball || "18X" != l)) {
                if (l <= SportCount || 99 == l || 154 == l) {
                    if (!(GetMenuData(l, e) > 0 || GetMenuData(l, "OT") > 0 || GetMenuData(l, "P") > 0))
                        continue;
                    GetMenuData(l, e) <= 0 && GetMenuData(l, "OT") > 0 && (t = !1)
                } else if ("15X" == l && (l = 151),
                "18X" == l && (l = DefaultVSport),
                l != DefaultVSport && 252 != l && !(GetMenuData(l, e) > 0) && "151" == l)
                    if (GetMenuData("152", e) > 0)
                        l = 152;
                    else {
                        if (!(GetMenuData("153", e) > 0))
                            continue;
                        l = 153
                    }
                return (1 != l || 1 == l && 0 != a) && (t = !1),
                void SwitchSport(e, l, !1, t)
            }
        }
    else
        SwitchSport(e, fFrame.LastSelectedSport, !1, t)
}
function LoadMenuData(e, t) {
    null != m_sports && null != (e = GetBestMarket(e)) && ("L" == e && (fFrame.topx.document.getElementById("SportRadar").className = "liveInfo"),
    this.SwitchMarket(e),
    this.CheckSwitchMenu(t),
    this.SetMenuItem(e),
    this.SetLastSelectedSport(e, t))
    this.refreshAccountInfo('full');
}
function CheckSwitchMenu(e) {
    var t = parent.document.getElementById("div_menu");
    if (null != t) {
        var n = t.className;
        if (n.indexOf("showmenu") >= 0)
            if (e) {
                document.getElementById("market_" + fFrame.LastSelectedMArket + "_body").style.display = "none"
            } else
                t.className = n.replace("showmenu", "hidemenu"),
                null != document.getElementById("lblShowSportsMenu") && (document.getElementById("lblShowSportsMenu").style.display = "none"),
                null != document.getElementById("lblHideSportsMenu") && (document.getElementById("lblHideSportsMenu").style.display = "")
    }
}
function SwitchMarket(e) {
    fFrame.LastSelectedMArket = e;
    try {
        isParlay = "MixParlay" == parent.rightx.document.body.id
    } catch (e) {
        isParlay = !1
    }
    "L" == e && (document.getElementById("market_L_head").className = "itemrdon",
    document.getElementById("market_T_head").className = "itemrd",
    document.getElementById("market_E_head").className = "itemrd",
    document.getElementById("market_L_body").style.display = ShowMenuFlag ? "" : "none",
    document.getElementById("market_body").style.display = "none"),
    "T" == e && (document.getElementById("market_T_head").className = "itemrdon",
    document.getElementById("market_E_head").className = "itemrd",
    document.getElementById("market_L_head").className = "itemrd",
    document.getElementById("market_body").style.display = ShowMenuFlag ? "" : "none",
    document.getElementById("market_L_body").style.display = "none"),
    "E" == e && (document.getElementById("market_E_head").className = "itemrdon",
    document.getElementById("market_T_head").className = "itemrd",
    document.getElementById("market_L_head").className = "itemrd",
    document.getElementById("market_body").style.display = ShowMenuFlag ? "" : "none",
    document.getElementById("market_L_body").style.display = "none")
}
function GetBestMarket(e) {
    var t = e;
	
	// console.log(GetMenuData("0", "TotalLive"));
	
    return 0 == GetMenuData("0", "TotalLive") ? document.getElementById("market_L_head_Cnt").innerHTML = "&nbsp;" : (document.getElementById("market_L_text").style.display = "",
    document.getElementById("market_L_head_Cnt").innerHTML = m_sports[0].TotalLive),
    0 == GetMenuData("0", "TotalToday") ? "T" == t && (t = "E") : document.getElementById("market_T_text").style.display = "",
    0 == GetMenuData("0", "TotalEarly") ? "E" == t && (document.getElementById("market_body").style.display = "none",
    document.getElementById("market_L_body").style.display = "none") : document.getElementById("market_E_text").style.display = "",
    t
}
function SetMenuData(e, t, n) {
    if (null != e && (m_sports = e),
    Tmpl_Initialed) {
        var a = "E";
        0 == fFrame.LastSelectedMenu && (a = "T"),
        2 != fFrame.LastSelectedMenu || void 0 === e[1].T && void 0 === e[1].L || (a = "T"),
        null != n && (a = n),
        null == fFrame.LastSelectedMArket ? LoadMenuData(a, !0) : IsChangeMenuType ? (1 != fFrame.LastSelectedMenu || IsOlympicDay ? (fFrame.LastSelectedMenu,
        LoadMenuData(a)) : LoadMenuData(a),
        IsChangeMenuType = !1) : LoadMenuData(fFrame.LastSelectedMArket, !0),
        m_mouseover(fFrame.LastSelectedMenu, t),
        "B" != fFrame.rightx.RES_PageType && "S" != fFrame.rightx.RES_PageType && "F" != fFrame.rightx.RES_PageType || (CloseAllSports(),
        "B" == fFrame.rightx.RES_PageType && SetMarketClass_SportRadar(SportRadarIdx))
    } else
        window.setTimeout("SetMenuData(null,'" + t + "')", 200)
}
function ifrmaeresizt() {
    document.getElementById("MenuContainer").style.display = "inline"
}
function SwitchMenu(e) {
    var t;
    t = "L" == fFrame.LastSelectedMArket ? document.getElementById("market_" + fFrame.LastSelectedMArket + "_body") : document.getElementById("market_body");
    var n = document.getElementById("div_menu");
    ShowMenuFlag ? (n.className = "showmenu",
    t.style.display = "none",
    null != document.getElementById("lblShowSportsMenu") && (document.getElementById("lblShowSportsMenu").style.display = ""),
    null != document.getElementById("lblHideSportsMenu") && (document.getElementById("lblHideSportsMenu").style.display = "none")) : (n.className = "hidemenu",
    t.style.display = "",
    null != document.getElementById("lblShowSportsMenu") && (document.getElementById("lblShowSportsMenu").style.display = "none"),
    null != document.getElementById("lblHideSportsMenu") && (document.getElementById("lblHideSportsMenu").style.display = "")),
    ShowMenuFlag = !ShowMenuFlag
}
function openMenu(e) {
    var t;
    t = "L" == fFrame.LastSelectedMArket ? document.getElementById("market_" + fFrame.LastSelectedMArket + "_body") : document.getElementById("market_body");
    var n = document.getElementById("div_menu");
    null != n && (n.className = "hidemenu"),
    null != t && (t.style.display = ""),
    null != document.getElementById("lblShowSportsMenu") && (document.getElementById("lblShowSportsMenu").style.display = "none"),
    null != document.getElementById("lblHideSportsMenu") && (document.getElementById("lblHideSportsMenu").style.display = ""),
    ShowMenuFlag = !0
}
function hideMenu(e) {
    var t;
    t = "L" == fFrame.LastSelectedMArket ? document.getElementById("market_" + fFrame.LastSelectedMArket + "_body") : document.getElementById("market_body");
    var n = document.getElementById("div_menu");
    null != n && (n.className = "showmenu"),
    null != t && (t.style.display = "none"),
    null != document.getElementById("lblShowSportsMenu") && (document.getElementById("lblShowSportsMenu").style.display = ""),
    null != document.getElementById("lblHideSportsMenu") && (document.getElementById("lblHideSportsMenu").style.display = "none"),
    ShowMenuFlag = !1
}
function PopHorseInfo(e, t, n) {
    HorseInfoUrl = "HorseInfoPop.php?League=" + e + "&Race=" + t + "&SportType=" + n,
    !HorseInfoPopWindow || HorseInfoPopWindow.closed ? (wx = 710,
    wy = 700,
    x = (screen.width - wx) / 2,
    y = x = (screen.height - wx) / 2,
    HorseInfoPopWindow = window.open(HorseInfoUrl, "subInfo", "directories=no,locationbar=no,scrollbars=yes, left=" + x + ",top=" + y + ",width=" + wx + ",height=" + wy)) : HorseInfoPopWindow.closed || (HorseInfoPopWindow.location.href = HorseInfoUrl,
    HorseInfoPopWindow.focus(),
    HorseInfoPopWindow.document.focus),
    window.setTimeout(resizeinfowindow, 2e3)
}
function resizeinfowindow() {
    try {
        wx = 720,
        wy = 700,
        divy = HorseInfoPopWindow.document.getElementById("popupW").offsetHeight,
        divy + 100 < wy && (wy = divy + 100),
        HorseInfoPopWindow.resizeTo(wx, wy)
    } catch (e) {}
}
function SetMenutest() {
    alert("SetMenutest"),
    SwitchSport("", "151")
}
function getEvent() {
    if (document.all)
        return window.event;
    for (func = getEvent.caller; null != func; ) {
        var e = func.arguments[0];
        if (e && (e.constructor == Event || e.constructor == MouseEvent || "object" == typeof e && e.preventDefault && e.stopPropagation))
            return e;
        func = func.caller
    }
    return null
}
function GetParlayCount(e, t) {
    var n = 0;
    return e = e.toUpperCase(),
    null == m_sports || CheckIsRacing(t) || "161" == t || "160" == t ? n : n = GetMenuData(t, "L" == e ? "LP" : e + "_P")
}
function IsHaveLiveParlay() {
    return GetMenuData("P", "L") > 0
}
function CheckIsRacing(e) {
    var t;
    return (t = "string" == typeof e ? parseInt(e, 10) : e) >= 151 && t <= 153
}
function getParent(e) {
    for (var t = e, n = 0; n < 4; n++) {
        if (null != t.SiteMode)
            return t;
        t = t.parent
    }
    return null
}
function decode_base64(e) {
    var t, n = {}, a = [], l = "", d = String.fromCharCode, o = [[65, 91], [97, 123], [48, 58], [43, 44], [47, 48]];
    for (z in o)
        for (t = o[z][0]; t < o[z][1]; t++)
            a.push(d(t));
    for (t = 0; t < 64; t++)
        n[a[t]] = t;
    for (t = 0; t < e.length; t += 72) {
        var s, m = 0, r = 0, i = e.substring(t, t + 72);
        for (s = 0; s < i.length; s++)
            for (m = (m << 6) + n[i.charAt(s)],
            r += 6; r >= 8; )
                l += d((m >>> (r -= 8)) % 256)
    }
    return l
}
function formvalidation(frmnm) {
    if ("none" == document.getElementById("BetProcessContainer").style.display && "none" == document.getElementById("Betslip").style.display)
        return !1;
    if (document.getElementById("btnBPSubmit").disabled)
        return !1;
    CtrlSubmitBtnDisabled(!0);
    var mf, i, str, found = !1, found1 = !1, login = !1, balance, minbet = 0, maxbet = 0, s_home = !1, s_away = !1, stake = 0, jml = 0, plafond = 0, bettype, sportType = 0, IsRacing = !1, objStake;
    mf = document.forms[frmnm],
    login = !0,
    151 != (sportType = parseInt(mf.elements.sporttype.value)) && 152 != sportType && 153 != sportType || (IsRacing = !0),
    isVRace = sportType >= 181 && sportType <= 185,
    minbet = parseInt(removeCommas(mf.elements.MINBET.value), 10),
    maxbet = parseInt(removeCommas(mf.elements.MAXBET.value), 10),
    bettype = parseInt(mf.elements.bettype.value, 10);
    var lmm, hmm, rusm, rusm1;
    if (lmm = mf.elements.lowerminmesg.value,
    hmm = mf.elements.highermaxmesg.value,
    rusm = mf.elements.areyousuremesg.value,
    rusm1 = mf.elements.areyousuremesg1.value,
    ermm = mf.elements.incorrectStakeMesg.value,
    objStake = IsRacing || isVRace ? mf.elements.HorseBPstake : mf.elements.BPstake,
    stake = Math.round(replaceSubstring(objStake.value, ",", "")),
    isNaN(replaceSubstring(objStake.value, ",", "")))
        return alert(ermm),
        objStake.value = "",
        objStake.focus(),
        document.getElementById("payOut").innerHTML = "",
        CtrlSubmitBtnDisabled(!1),
        null != document.getElementById("cbAutoAccept") && (document.getElementById("cbAutoAccept").checked = !1),
        !1;
    if (isNaN(objStake)) {
        if (stake < 0)
            return alert("Stake must be greater than zero !"),
            objStake.value = "",
            objStake.focus(),
            document.getElementById("payOut").innerHTML = "",
            CtrlSubmitBtnDisabled(!1),
            null != document.getElementById("cbAutoAccept") && (document.getElementById("cbAutoAccept").checked = !1),
            !1;
        var setPayOut = function(stake) {
            if (isVRace) {
                var oddsStr = document.getElementById("VRaceOddsDisp2").innerHTML.replace("/", "+")
                  , oddsValue = eval(oddsStr);
                document.getElementById("VRPayout").innerHTML = payOutCalculate(oddsValue, stake, !1),
                document.getElementById("VRMaxPayout").innerHTML = payOutCalculate(oddsValue, stake / 2, !1)
            } else
                "5" == document.getElementById("oddsType").value ? document.getElementById("payOut").innerHTML = payOutCalculate(parseInt(removeCommas(document.getElementById("bodds").innerHTML), 10) / 100, stake, !0) : "OT" != selBetMode && -1 != indexOf(pairArray, bettype) && "1" != document.getElementById("oddsType").value ? document.getElementById("payOut").innerHTML = payOutCalculate(removeCommas(document.getElementById("bodds").innerHTML), stake, !0) : -1 != indexOf(MMRArray, bettype) ? document.getElementById("payOut").innerHTML = payOutCalculate(removeCommas(document.getElementById("bodds").innerHTML), stake, !0) : document.getElementById("payOut").innerHTML = payOutCalculate(removeCommas(document.getElementById("bodds").innerHTML), stake, !1)
        };
        if (stake < minbet)
            return IsRacing || isVRace ? (clearTimeout(_ClearHROddsChangeAlertTimer),
            $("#HRBPOddsChangeAlert div").html(lmm),
            $("#HRBPOddsChangeAlert").slideDown("fast"),
            _ClearHROddsChangeAlertTimer = setTimeout(function() {
                $("#HRBPOddsChangeAlert").slideUp("fast")
            }, 5e3),
            fFrame.leftx.$("#HRBPMinMaxBetAlert").css("display", "none")) : (clearTimeout(_ClearOddsChangeAlertTimer),
            $("#BPOddsChangeAlert div").html(lmm),
            $("#BPOddsChangeAlert").slideDown("fast"),
            _ClearOddsChangeAlertTimer = setTimeout(function() {
                $("#BPOddsChangeAlert").slideUp("fast")
            }, 5e3),
            fFrame.leftx.$("#BPMinMaxBetAlert").css("display", "none")),
            objStake.value = addCommas(minbet.toFixed(0)),
            objStake.focus(),
            setPayOut(minbet),
            CtrlSubmitBtnDisabled(!1),
            null != document.getElementById("cbAutoAccept") && (document.getElementById("cbAutoAccept").checked = !1),
            !1;
        if (stake > maxbet)
            return IsRacing || isVRace ? (clearTimeout(_ClearHROddsChangeAlertTimer),
            $("#HRBPOddsChangeAlert div").html(hmm),
            $("#HRBPOddsChangeAlert").slideDown("fast"),
            _ClearHROddsChangeAlertTimer = setTimeout(function() {
                $("#HRBPOddsChangeAlert").slideUp("fast")
            }, 5e3),
            fFrame.leftx.$("#HRBPMinMaxBetAlert").css("display", "none")) : (clearTimeout(_ClearOddsChangeAlertTimer),
            $("#BPOddsChangeAlert div").html(hmm),
            $("#BPOddsChangeAlert").slideDown("fast"),
            _ClearOddsChangeAlertTimer = setTimeout(function() {
                $("#BPOddsChangeAlert").slideUp("fast")
            }, 5e3),
            fFrame.leftx.$("#BPMinMaxBetAlert").css("display", "none")),
            objStake.value = addCommas(maxbet.toFixed(0)),
            objStake.focus(),
            setPayOut(maxbet),
            CtrlSubmitBtnDisabled(!1),
            null != document.getElementById("cbAutoAccept") && (document.getElementById("cbAutoAccept").checked = !1),
            !1;
        var bettypeArray = ["33", "43", "1233"]
          , sporttypeArray = ["151", "152", "153", "181", "182", "183", "184", "185"];
        if (-1 != indexOf(bettypeArray, bettype) && -1 != indexOf(sporttypeArray, document.getElementById("sporttype").value) && stake % 2 != 0) {
            var msg = document.getElementById("hidStake2").value;
            return "151" == document.getElementById("sporttype").value || "152" == document.getElementById("sporttype").value || "153" == document.getElementById("sporttype").value ? (clearTimeout(_ClearHROddsChangeAlertTimer),
            $("#HRBPOddsChangeAlert div").html(msg),
            $("#HRBPOddsChangeAlert").slideDown("fast"),
            _ClearHROddsChangeAlertTimer = setTimeout(function() {
                $("#HRBPOddsChangeAlert").slideUp("fast")
            }, 5e3)) : (clearTimeout(_ClearOddsChangeAlertTimer),
            $("#BPOddsChangeAlert div").html(msg),
            $("#BPOddsChangeAlert").slideDown("fast"),
            _ClearOddsChangeAlertTimer = setTimeout(function() {
                $("#BPOddsChangeAlert").slideUp("fast")
            }, 5e3)),
            objStake.value = "",
            objStake.focus(),
            CtrlSubmitBtnDisabled(!1),
            null != document.getElementById("cbAutoAccept") && (document.getElementById("cbAutoAccept").checked = !1),
            !1
        }
    }
    var confirmMsg = rusm;
    return "1" == confirmMode && (confirmMsg = rusm1),
    confirm(confirmMsg) ? (dobet = !0,
    CtrlSubmitBtnDisabled(!0),
    "" != $("#btnAutoAccept").find("span").html() ? document.getElementById("cbAutoAccept").checked = !0 : document.getElementById("cbAutoAccept").checked = !1,
    mf.username.value = fFrame.UserName,
    mf.submit(),
    !0) : (dobet = !1,
    objStake.select(),
    null != document.getElementById("cbAutoAccept") && (document.getElementById("cbAutoAccept").checked = !1),
    CtrlSubmitBtnDisabled(!1),
    !1)
}
function UsingAutoAccept() {
    document.getElementById("cbAutoAccept").checked = !0,
    betSubmit("click")
}
function Using1X2AsiaHdp() {
    document.getElementById("cb1X2AsiaHdp").checked = !0,
    document.getElementById("btnBPSubmit_P").click()
}
function DoBetProcess(e, t, n, a, l, d) {
    RES_Open_Multi_Parlay && (SwitchBettingMode(0),
    document.ParlayBetForm.OddsId.value = e),
    tmp_obj = document.getElementById("chKeepBet");
    var o = e + "_" + t + "_" + n;
    if (null != d && (o += "_" + d),
    DropTimeoutHandlers(),
    "1" == fFrame.SiteMode)
        document.getElementById("bp_p_Match").value = o,
        null != eObj && (document.getElementById("bp_p_key").value = eObj.GetKey("bet")),
        document.fomBetProcessPhone_Data.action = "BetProcess_Data.php",
        document.fomBetProcessPhone_Data.submit();
    else {
        if (DoLeftMenuDisplay(),
        document.getElementById("BPstake").value = "",
        document.getElementById("HorseBPstake").value = "",
        document.getElementById("payOut").innerHTML = "",
        document.getElementById("KeepOdds").innerHTML = "<span>" + RES_KeepOdds + "</span>",
        document.getElementById("bp_Match").value = o,
        null != eObj && (document.getElementById("bp_key").value = eObj.GetKey("bet")),
        null != document.getElementById("UN") && (document.getElementById("UN").value = fFrame.UserName),
        document.getElementById("bp_ssport").value = void 0 === d || "" == d ? "1" : fFrame.LastSelectedSport,
        parseInt(fFrame.LastSelectedSport, 10) >= 181 && parseInt(fFrame.LastSelectedSport, 10) <= 185 && !l)
            document.fomBetProcess_Data.action = "BetProcess_Data_V.php",
            tmp_obj = null;
        else {
            var s = "";
            null != a && (s = "?stake=" + a),
            fFrame.topx.g_SMF.stopWatcher(),
            document.fomBetProcess_Data.action = "BetProcess_Data.php" + s
			
        }
        document.fomBetProcess_Data.submit(),
        CtrlSubmitBtnDisabled(!0)
    }
}
function SwapOdds(e) {
    return parseFloat(e) > 0 ? "-" + e : e.replace("-", "")
}
function SetBetProcessDataNoPhone(e, t) {
    if (document.getElementById("sporttype").value = e.hiddenSportType,
    (t.IsRacing || t.isVRace) && (document.getElementById("KeepOdds").innerHTML = ""),
    null != document.getElementById("trHorseTotoKeep") && (document.getElementById("trHorseTotoKeep").style.display = "none"),
    ChangeDisplayMode("bet"),
    "0" == e.haveparlaylist ? document.getElementById("mparlay_cnt").innerHTML = "" : document.getElementById("mparlay_cnt").innerHTML = e.haveparlaylist,
    t.HorseFixed ? (OddsKeepCountTime(document.getElementById("HorseFixchKeepBet")),
    "43" != e.hiddenBetType ? (document.getElementById("HorseType41").style.display = "",
    document.getElementById("HorseType43").style.display = "none",
    document.getElementById("HFixedbodds1").style.display = "",
    document.getElementById("HFixedbodds2").style.display = "none",
    document.getElementById("HFixedbodds3").style.display = "none",
    document.getElementById("HFixedbodds3").style.display = "none",
    obj = document.getElementById("HFixedbodds1"),
    obj.className = e.lblOddsColor,
    obj.innerHTML = e.lblOddsValue) : (document.getElementById("HorseType41").style.display = "none",
    document.getElementById("HorseType43").style.display = "",
    document.getElementById("HFixedbodds1").style.display = "none",
    document.getElementById("HFixedbodds2").style.display = "",
    document.getElementById("HFixedbodds3").style.display = "",
    obj = document.getElementById("HFixedbodds2"),
    obj.className = e.lblOddsColor,
    obj.innerHTML = e.lblOddsValue,
    obj = document.getElementById("HFixedbodds3"),
    obj.className = e.lblOddsColor,
    obj.innerHTML = e.lblPlaceOddsValue)) : t.HorseTote ? (t.isVRace ? (OddsKeepCountTime(null),
    document.getElementById("trHorseTotoKeep").style.display = "none") : (OddsKeepCountTime(document.getElementById("FScreen")),
    document.getElementById("trHorseTotoKeep").style.display = ""),
    document.getElementById("HorseBPBetKey").value = e.hiddenBetKey) : t.NormalBet && (OddsKeepCountTime(document.getElementById("chKeepBet")),
    obj = document.getElementById("bodds"),
    obj.className = e.lblOddsColor,
    obj.innerHTML = e.lblOddsValue,
    document.getElementById("BPBetKey").value = e.hiddenBetKey,
    "true" == e.haveparlay ? document.getElementById("div_addparlay").style.display = "" : document.getElementById("div_addparlay").style.display = "none",
    "true" == e.inParlayList ? (document.getElementById("chk_addToParlay").checked = !0,
    document.getElementById("icon_addParlay").innerHTML = RES_Cancel_From_Parlay) : (document.getElementById("chk_addToParlay").checked = !1,
    document.getElementById("icon_addParlay").innerHTML = RES_Add_To_Parlay),
    document.getElementById("sbBetAOSValue").innerHTML = e.lblBetAOSValue,
    "" != e.lblBetAOSValue ? document.getElementById("sbBetAOSValue").className = "TextStyle04 AOSbox" : document.getElementById("sbBetAOSValue").className = ""),
    document.getElementById("menuTitleOT").style.display = "none",
    null == fFrame.Deposit_SiteMode && (document.getElementById("phoneOutright").style.display = "none"),
    document.getElementById("ot_dvChoiceValue").style.display = "none",
    document.getElementById("spHome_id").style.display = "",
    document.getElementById("spAway_id").style.display = "",
    document.getElementById("ot_dvChoiceValue_id").style.display = "none",
    document.getElementById("chk_BettingChange").value = e.chk_BettingChange,
    t.IsRacing || t.isVRace ? SetBetProcessDataRacing(e, t) : SetBetProcessDataNormal(e),
    "#FFFFFF" == e.liveBgColor ? document.getElementById("BetInfo").className = "BetInfo" : document.getElementById("BetInfo").className = "BetInfo liveligh",
    obj = document.getElementById("spChoiceClass"),
    obj.className = e.lblChoiceClass,
    obj.innerHTML = e.lblChoiceValue,
    obj = document.getElementById("sbBetKindValue"),
    obj.innerHTML = e.lblBetKindValue,
    obj = document.getElementById("spScoreValue"),
    obj.innerHTML = e.lblScoreValue,
    obj = document.getElementById("divAcceptBetterOdds"),
    obj.style.display = "",
    document.getElementById("stakeRequest").value = e.hiddenStakeRequest,
    document.getElementById("oddsRequest").value = e.hiddenOddsRequest,
    document.getElementById("MINBET").value = e.hiddenMinBet,
    document.getElementById("MAXBET").value = e.hiddenMaxBet,
    document.getElementById("bettype").value = e.hiddenBetType,
    document.getElementById("oddsType").value = e.hiddenOddsType,
    "1" == e.OddsStakeChg && alert(document.getElementById("oddsWarning").value),
    processMsg(e.hiddenSportType, t),
    "" == e.hiddenStakeRequest && "" != document.getElementById("BPstake").value && (e.hiddenStakeRequest = document.getElementById("BPstake").value),
    "" != e.hiddenStakeRequest) {
        document.getElementById("BPstake").value = e.hiddenStakeRequest,
        document.getElementById("BPstake").select();
        var n = e.hiddenBetType
          , a = e.hiddenOddsType;
        if (-1 != indexOf(pairArray, n) && "1" != a)
            document.getElementById("payOut").innerHTML = "5" == a ? payOutCalculate(parseInt(removeCommas(document.getElementById("bodds").innerHTML), 10) / 100, removeCommas(e.hiddenStakeRequest), !0) : payOutCalculate(removeCommas(document.getElementById("bodds").innerHTML), removeCommas(e.hiddenStakeRequest), !0);
        else if (-1 != indexOf(MMRArray, n))
            document.getElementById("payOut").innerHTML = payOutCalculate(removeCommas(document.getElementById("bodds").innerHTML), removeCommas(e.hiddenStakeRequest), !0);
        else if (t.isVRace)
            switch (e.hiddenBetType) {
            case "1231":
                document.getElementById("VRPayout").innerHTML = payOutCalculate(removeCommas(e.lblOddsValue), removeCommas(e.hiddenStakeRequest), !1);
                break;
            case "1232":
                document.getElementById("VRPayout").innerHTML = payOutCalculate(removeCommas(e.lblPlaceOddsValue), removeCommas(e.hiddenStakeRequest), !1);
                break;
            case "1233":
                document.getElementById("VRMaxPayout").innerHTML = payOutCalculate((parseFloat(removeCommas(e.lblOddsValue)) + parseFloat(removeCommas(e.lblPlaceOddsValue))) / 2, removeCommas(e.hiddenStakeRequest), !1)
            }
        else
            document.getElementById("payOut").innerHTML = payOutCalculate(removeCommas(document.getElementById("bodds").innerHTML), removeCommas(e.hiddenStakeRequest), !1)
    }
    t.isVRace ? document.fomConfirmBet.action = "underover/confirm_bet_data_v.php" : t.IsRacing ? document.fomConfirmBet.action = "underover/confirm_bet_data_s151.php" : document.fomConfirmBet.action = "underover/confirm_bet_data.php"
}
function SetBetProcessDataPhone(e) {
    ChangeDisplayMode("betP"),
    document.getElementById("menuTitleOT").style.display = "none",
    null == fFrame.Deposit_SiteMode && (document.getElementById("phoneOutright").style.display = "none"),
    document.getElementById("ot_dvChoiceValue").style.display = "none",
    document.getElementById("spHome_id").style.display = "",
    document.getElementById("spAway_id").style.display = "",
    document.getElementById("ot_dvChoiceValue_id").style.display = "none",
    obj = document.getElementById("BetProcessPhoneData"),
    obj.style.display = "",
    obj.innerHTML = e.lblSportKind + " / ",
    document.getElementById("BetProcessPhoneDataOT").style.display = "none",
    document.getElementById("chk_BettingChange").value = e.chk_BettingChange,
    obj = document.getElementById("PhoneBetKind"),
    obj.setAttribute("height", "=27"),
    obj = document.getElementById("spBetKind_P"),
    obj.innerHTML = e.lblBetKind,
    obj = document.getElementById("BPstake_P"),
    document.all ? (objScore = document.getElementById("liveScoreH"),
    obj.onKeyDown = function() {
        onKeyDownFunc(objScore, event)
    }
    ,
    obj.onkeyup = function() {
        payOutOnKU(this, event)
    }
    ) : (obj.setAttribute("onkeyup", "payOutOnKU(document.getElementById('BPstake_P'), event)"),
    obj.setAttribute("onKeyDown", "onKeyDownFunc('liveScoreH', event)")),
    obj = document.getElementById("spOddsStatus_P"),
    obj.className = e.lbloddsStatusClass,
    obj.innerHTML = e.lbloddsStatus,
    document.getElementById("bettingGraphRemark").value = "",
    document.getElementById("liveIndicator_P").value = e.hiddenliveIndicator,
    "#FFFFFF" == e.liveBgColor ? document.getElementById("BetInfo").className = "BetInfo" : document.getElementById("BetInfo").className = "BetInfo liveligh",
    obj = document.getElementById("spChoiceClass_P"),
    obj.className = e.lblChoiceClass,
    obj.innerHTML = e.lblChoiceValue;
    var t = document.getElementById("tr1X2AsiaHdp");
    switch (null != t && (t.style.display = "none",
    document.getElementById("cb1X2AsiaHdp").checked = !1),
    document.getElementById("spBetKind_P").style.display = "",
    document.getElementById("spChoiceClass_P").style.display = "",
    document.getElementById("PhoneBetKind").style.display = "",
    e.hiddenBetType) {
    case "1":
    case "7":
    case "28":
        if (document.getElementById("phoneOutright").style.display = "none",
        document.getElementById("phoneInputBox1").style.display = "none",
        document.getElementById("phoneInputBox2").style.display = "none",
        document.getElementById("phoneInputBox3").style.display = "",
        document.getElementById("liveScoreContainer").style.display = "",
        document.getElementById("RemarkContainer").style.display = e.lblhedgeBox,
        document.getElementById("BetKindValue").innerHTML = e.lblBetKindValue,
        document.getElementById("bp_hdp1Value_3").value = e.lblhdp1Value,
        document.getElementById("bp_hdp2Value_3").value = e.lblhdp2Value,
        obj = document.getElementById("bp_odds3"),
        obj.className = e.lblOddsColor,
        obj.value = e.lblOddsValue,
        obj = document.getElementById("liveScoreH"),
        obj.value = e.lblLiveScoreH,
        obj.readOnly = e.lblReadyOnly,
        obj = document.getElementById("liveScoreA"),
        obj.value = e.lblLiveScoreA,
        obj.readOnly = e.lblReadyOnly,
        ("1" == e.hiddenBetType || "7" == e.hiddenBetType) && "1" == e.hiddenSportType && Using1x2AsiaHdp && null != t) {
            t.style.display = "";
            var n = document.getElementById("btnBPSubmit_P1");
            null != n && (n.disabled = !1)
        }
        break;
    case "3":
    case "8":
        document.getElementById("phoneOutright").style.display = "none",
        document.getElementById("phoneInputBox1").style.display = "none",
        document.getElementById("phoneInputBox2").style.display = "",
        document.getElementById("phoneInputBox3").style.display = "none",
        document.getElementById("liveScoreContainer").style.display = "",
        document.getElementById("RemarkContainer").style.display = e.lblhedgeBox,
        document.getElementById("bp_hdp1Value_2").value = e.lblhdp1Value,
        document.getElementById("bp_hdp2Value_2").value = e.lblhdp2Value,
        obj = document.getElementById("bp_odds2"),
        obj.className = e.lblOddsColor,
        obj.value = e.lblOddsValue,
        obj = document.getElementById("liveScoreH"),
        obj.value = e.lblLiveScoreH,
        obj.readOnly = e.lblReadyOnly,
        obj = document.getElementById("liveScoreA"),
        obj.value = e.lblLiveScoreA,
        obj.readOnly = e.lblReadyOnly;
        break;
    default:
        document.getElementById("phoneOutright").style.display = "none",
        document.getElementById("phoneInputBox1").style.display = "",
        document.getElementById("phoneInputBox2").style.display = "none",
        document.getElementById("phoneInputBox3").style.display = "none",
        document.getElementById("RemarkContainer").style.display = e.lblhedgeBox,
        "22" == e.hiddenBetType ? document.getElementById("liveScoreContainer").style.display = "" : document.getElementById("liveScoreContainer").style.display = "none",
        document.getElementById("bp_hdp1Value_1").value = e.lblhdp1Value,
        document.getElementById("bp_hdp2Value_1").value = e.lblhdp2Value,
        obj = document.getElementById("bp_odds1"),
        obj.className = e.lblOddsColor,
        obj.value = e.lblOddsValue,
        document.getElementById("liveScoreH").value = e.lblLiveScoreH,
        document.getElementById("liveScoreA").value = e.lblLiveScoreA
    }
    obj = document.getElementById("spAway_P"),
    obj.style.display = "",
    obj.innerHTML = e.lblAway,
    document.getElementById("spHome_P").innerHTML = e.lblHome,
    document.getElementById("spLeaguename_P").innerHTML = e.lblLeaguename,
    document.getElementById("spMinBetValue_P").innerHTML = e.lblMinBetValue,
    document.getElementById("spMaxBetValue_P").innerHTML = e.lblMaxBetValue,
    document.getElementById("stakeRequest_P").value = e.hiddenStakeRequest,
    document.getElementById("oddsRequest_P").value = e.hiddenOddsRequest,
    document.getElementById("MINBET_P").value = e.hiddenMinBet,
    document.getElementById("MAXBET_P").value = e.hiddenMaxBet,
    document.getElementById("bettype_P").value = e.hiddenBetType,
    document.getElementById("oddsType_P").value = e.hiddenOddsType,
    document.getElementById("trlPayOut_P").style.display = "",
    "" == e.hiddenStakeRequest ? document.getElementById("BPstake_P").value = "" : document.getElementById("BPstake_P").value = e.hiddenStakeRequest,
    document.getElementById("payOut_P").innerHTML = "",
    document.getElementById("BPstake_P").focus(),
    document.getElementById("BPBetKey_P").value = e.hiddenBetKey
}
function SetBetProcessDataNormal(e) {
    obj = document.getElementById("menuTitle"),
    obj.style.display = "",
    obj.innerHTML = e.lblSportKind + " / ",
    obj = document.getElementById("tdBetKind"),
    obj.setAttribute("height", "=27"),
    obj.innerHTML = e.lblBetKind,
    obj = document.getElementById("BPstake"),
    document.all ? (obj.onKeyDown = function() {
        validateOnKD(this, event)
    }
    ,
    obj.onkeyup = function() {
        payOutOnKU(this, event)
    }
    ) : (obj.setAttribute("onkeyup", "payOutOnKU(document.getElementById('BPstake'), event)"),
    obj.setAttribute("onKeyDown", "validateOnKD('BPstake', event)")),
    null != document.getElementById("tr_StakeMultiples") && (document.getElementById("tr_StakeMultiples").style.display = "none"),
    document.getElementById("trOddsHorseFixedInfo").style.display = "none",
    document.getElementById("trlPayOut").style.display = "",
    document.getElementById("trOddsInfo").style.display = "",
    null != document.getElementById("imgHorseJockey") && (document.getElementById("imgHorseJockey").style.display = "none",
    document.getElementById("imgHorseJockey").src = fFrame.imgServerURL + "/template/public/images/space.gif"),
    document.getElementById("spHome").innerHTML = e.lblHome,
    document.getElementById("spAway").innerHTML = e.lblAway,
    document.getElementById("spMatchCode").innerHTML = e.lblMatchCode,
    document.getElementById("spLeaguename").innerHTML = e.lblLeaguename,
    document.getElementById("spMinBetValue").innerHTML = e.lblMinBetValue,
    document.getElementById("spMaxBetValue").innerHTML = e.lblMaxBetValue;
    try {
        document.getElementById("BPstake").focus()
    } catch (e) {}
}
function SetBetProcessDataRacing(e, t) {
    obj = document.getElementById("hrmenuTitle"),
    obj.style.display = "",
    t.isVRace ? obj.innerHTML = e.lblSportKind + " / <br/>" : obj.innerHTML = e.lblSportKind + " / ",
    obj = document.getElementById("hrtdBetKind"),
    obj.setAttribute("height", "=27"),
    obj.innerHTML = e.lblBetKind,
    obj = document.getElementById("HorseBPstake"),
    document.all ? (obj.onKeyDown = function() {
        validateOnKD(this, event)
    }
    ,
    obj.onkeyup = function() {
        payOutOnKU(this, event)
    }
    ) : (obj.setAttribute("onkeyup", "payOutOnKU(document.getElementById('HorseBPstake'), event)"),
    obj.setAttribute("onKeyDown", "validateOnKD('HorseBPstake', event)")),
    document.getElementById("trlPayOut").style.display = "none",
    t.HorseFixed ? (document.getElementById("trOddsHorseFixedInfo").style.display = "",
    document.getElementById("trOddsInfo").style.display = "none") : (document.getElementById("trOddsHorseFixedInfo").style.display = "none",
    document.getElementById("trOddsInfo").style.display = "none"),
    document.getElementById("imgHorseJockey").style.display = "",
    document.getElementById("imgHorseJockey").src = e.imgHorseJockey,
    document.getElementById("hrtr_StakeMultiples").style.display = "";
    var n = document.getElementById("hrsp_stakeMultiples");
    if ("33" == e.hiddenBetType || "43" == e.hiddenBetType || "1233" == e.hiddenBetType ? n.innerHTML = document.getElementById("hidStake2").value : n.innerHTML = "",
    document.getElementById("hrspHome").innerHTML = e.lblHome,
    document.getElementById("hrspAway").innerHTML = e.lblAway,
    "" == e.lblLeaguename)
        switch (document.getElementById("hrspLeaguename").style.display = "none",
        document.getElementById("VRaceOddsDisp1").style.display = "",
        document.getElementById("VRaceOddsDisp2").style.display = "",
        e.hiddenBetType) {
        case "1231":
            document.getElementById("VRaceOddsDisp2").innerHTML = e.lblOddsValue;
            break;
        case "1232":
            document.getElementById("VRaceOddsDisp2").innerHTML = e.lblPlaceOddsValue;
            break;
        case "1233":
            document.getElementById("VRaceOddsDisp2").innerHTML = e.lblOddsValue + "/" + e.lblPlaceOddsValue
        }
    else
        document.getElementById("VRaceOddsDisp1").style.display = "none",
        document.getElementById("VRaceOddsDisp2").style.display = "none",
        document.getElementById("hrspLeaguename").style.display = "",
        document.getElementById("hrspLeaguename").innerHTML = e.lblLeaguename;
    document.getElementById("hrspMinBetValue").innerHTML = e.lblMinBetValue,
    document.getElementById("hrspMaxBetValue").innerHTML = e.lblMaxBetValue;
    try {
        document.getElementById("HorseBPstake").focus()
    } catch (e) {}
}
function SetBetProcessDataInit(e) {
    selBetMode = "OU",
    null != document.getElementById("BP_SPORT") && (document.getElementById("BP_SPORT").style.display = "none"),
    null != document.getElementById("BP_RACE") && (document.getElementById("BP_RACE").style.display = "none"),
    null != document.getElementById("VR_tr1") && (document.getElementById("VR_tr1").style.display = "none",
    document.getElementById("VRPayout").innerHTML = ""),
    null != document.getElementById("VR_tr2") && (document.getElementById("VR_tr2").style.display = "none",
    document.getElementById("VRMaxPayout").innerHTML = "");
    var t = new Object
      , n = !1;
    "151" == e.hiddenSportType || "152" == e.hiddenSportType || "153" == e.hiddenSportType ? (null != document.getElementById("BP_RACE") && (document.getElementById("BP_RACE").style.display = ""),
    n = !0) : "181" == e.hiddenSportType || "182" == e.hiddenSportType || "183" == e.hiddenSportType || "184" == e.hiddenSportType || "185" == e.hiddenSportType ? ("1233" == e.hiddenBetType ? null != document.getElementById("VR_tr2") && (document.getElementById("VR_tr2").style.display = "") : null != document.getElementById("VR_tr1") && (document.getElementById("VR_tr1").style.display = ""),
    null != document.getElementById("BP_RACE") && (document.getElementById("BP_RACE").style.display = "")) : null != document.getElementById("BP_SPORT") && (document.getElementById("BP_SPORT").style.display = ""),
    null != document.getElementById("cbAutoAccept") && (document.getElementById("cbAutoAccept").checked = !1),
    null != document.getElementById("divAutoAccept") && ("" == e.lblAutoAccept ? (document.getElementById("btnAutoAccept").style.display = "none",
    document.getElementById("divAutoAccept").style.display = "none") : ($("#btnAutoAccept").find("span").html(e.lblAutoAccept),
    $("#btnAutoAccept").find("span").attr("title", e.lblAutoAccept),
    document.getElementById("btnAutoAccept").style.display = "",
    document.getElementById("divAutoAccept").style.display = ""));
    var a = !1
      , l = !1
      , d = !1
      , o = !1;
    return "41" == e.hiddenBetType || "42" == e.hiddenBetType || "43" == e.hiddenBetType ? l = !0 : "31" == e.hiddenBetType || "32" == e.hiddenBetType || "33" == e.hiddenBetType ? d = !0 : o = !0,
    "1231" == e.hiddenBetType || "1232" == e.hiddenBetType || "1233" == e.hiddenBetType ? (d = !0,
    isVRace = !0,
    o = !1) : isVRace = !1,
    "1" == fFrame.SiteMode && (a = !0),
    t.IsRacing = n,
    t.HorseFixed = l,
    t.HorseTote = d,
    t.NormalBet = o,
    t.isPhone = a,
    t.isVRace = isVRace,
    t
}
function SetBetProcessData(e) {
    var t = SetBetProcessDataInit(e);
    t.IsRacing;
    dobet = !1;
    var n = t.isPhone;
    t.HorseFixed,
    t.HorseTote,
    t.NormalBet;
    switch (DropTimeoutHandlers(),
    $("html, body").scrollTop(0),
    n ? SetBetProcessDataPhone(e) : SetBetProcessDataNoPhone(e, t),
    $("#scoremap").unbind("click"),
    $("#scoremap").hide(),
    g_BetProcesCurrMatchid = null,
    e.hiddenSportType) {
    case "1":
        if (g_BetProcesCurrMatchid = e.matchid,
        ShowScoreMap(e.hiddenBetType)) {
            var a = function() {
                var t = $("#bp_Match").val().split("_")
                  , n = $("#BPstake").val();
                0 == n.length && (n = "0"),
                popScoreMap(e.matchid, "left", t[0], t[1], t[2], e.lblBetKindValue, n, Math.abs(e.lblBetPercentageValue))
            };
            $("#scoremap").bind("click", a),
            $("#scoremap").show(),
            ("1" == e.HasScoreMap && "Y" != e.isAutoLoad || fFrame.topx.g_SMF.IsOpen()) && a()
        }
        break;
    case "3":
    case "4":
    case "8":
    case "26":
    case "28":
        break;
    default:
        document.getElementById("liveScoreContainer").style.display = "none"
    }
    confirmMode = e.confirmMode,
    "" != e.singleBetData && (document.getElementById("Betslip").innerHTML = HTMLDecode(e.singleBetData))
}
function ShowScoreMap(e) {
    return -1 != indexOf(["1", "2", "3", "4", "5", "6", "7", "8", "12", "13", "15", "24", "25", "26", "27", "28", "30", "121", "122", "123", "126", "143", "144", "151", "157", "159", "161", "162", "163", "170", "171", "177", "179", "181", "182", "184", "186", "188", "191", "301", "302", "303", "304", "401", "402", "403", "404", "461", "462", "463", "464", "405", "412", "413", "414", "417", "418", "426", "428", "429", "430", "431", "449", "450", "451", "453", "456", "457", "458", "459"], e)
}
function HTMLDecode(e) {
    var t = document.createElement("div");
    t.innerHTML = e;
    var n = t.innerText || t.textContent;
    return t = null,
    n
}
function DoSpecialBetProcess(e, t, n, a, l, d, o, s) {
    RES_Open_Multi_Parlay && SwitchBettingMode(0),
    document.getElementById("div_MixParlay").style.display = "none",
    tmp_obj = document.getElementById("FScreen");
    var m = e + "_" + t + "_" + n + "_" + a + "_" + l + "_" + d + "_" + o;
    DropTimeoutHandlers(),
    "1" == fFrame.SiteMode ? (DoLeftMenuDisplay(),
    document.getElementById("bp_p_Match").value = m,
    document.getElementById("bp_p_ssport").value = s,
    document.fomBetProcessPhone_Data.action = "BetProcess_Data_S.php",
    document.fomBetProcessPhone_Data.submit()) : (DoLeftMenuDisplay(),
    document.getElementById("HorseBPstake").value = "",
    document.getElementById("payOut").innerHTML = "",
    null != document.getElementById("HorseFixKeep") && (document.getElementById("HorseFixKeep").innerHTML = "<span>" + RES_KeepOdds + "</span>"),
    document.getElementById("bp_Match").value = m,
    document.getElementById("bp_ssport").value = s,
    document.fomBetProcess_Data.action = "BetProcess_Data_S.php",
    document.fomBetProcess_Data.submit(),
    CtrlSubmitBtnDisabled(!0))
}
function OddsChangeAlertHandle(e) {
    // console.log(e)
    clearTimeout(_ClearOddsChangeAlertTimer),
    $("#BPOddsChangeAlert div").html(e),
    $("#BPOddsChangeAlert").slideDown("fast"),
    _ClearOddsChangeAlertTimer = setTimeout(function() {
        $("#BPOddsChangeAlert").slideUp("fast")
    }, 5e3),
    fFrame.leftx.$("#BPMinMaxBetAlert").css("display", "none")
}
function processMsg(e, t) {
    if (0 != document.getElementById("stakeRequest").value.length && (t.IsRacing || t.isVRace ? (document.getElementById("HorseBPstake").value = addCommas(document.getElementById("stakeRequest").value),
    document.getElementById("HorseBPstake").select()) : (document.getElementById("BPstake").value = addCommas(document.getElementById("stakeRequest").value),
    document.getElementById("BPstake").select()),
    CtrlSubmitBtnDisabled(!1)),
    document.getElementById("divHorseFixKeepBetProcess").style.display = "none",
    "201" == e) {
        document.getElementById("divKeepBetProcess").style.display = "";
        var n = document.getElementById("chk_BettingChange").value;
        1 & parseInt(n, 10) ? document.getElementById("bodds").className = "UdrDogOddsClass Odds_Upd" : document.getElementById("bodds").className = "UdrDogOddsClass",
        2 & parseInt(n, 10) ? document.getElementById("sbBetKindValue").className = "HdpGoalClass Odds_Upd" : document.getElementById("sbBetKindValue").className = "HdpGoalClass",
        4 & parseInt(n, 10) ? document.getElementById("tdBetprocessMaxBet").className = "maxbet Odds_Upd" : document.getElementById("tdBetprocessMaxBet").className = "maxbet",
        8 & parseInt(n, 10) && 1 & parseInt(n, 10) ? OddsChangeAlertHandle(RES_FncOddsChangeMsg + document.getElementById("oddChange1").value + " <em>" + document.getElementById("oddsRequest").value + "</em> " + document.getElementById("oddChange2").value + " <em>" + document.getElementById("bodds").innerHTML + "</em>") : 8 & parseInt(n, 10) && 2 & parseInt(n, 10) && alert(RES_FncIndexChangeMsg)
    } else if ("151" != e && "152" != e && "153" != e) {

        n = document.getElementById("chk_BettingChange").value;
        // fake hide odds change 
        // if n = "1" show alert odd change 
        // if(document.getElementById("oddsRequest").value=="0.83"){
        //     n="0";
        // }
        // fake hide odds change 
        // console.log(n)
        "outright" != e && (document.getElementById("divKeepBetProcess").style.display = "");
        var a = !1;
        -1 != n.indexOf("1") && (0 == fFrame.LastBettingMode && OddsChangeAlertHandle(document.getElementById("oddChange1").value + " <em>" + document.getElementById("oddsRequest").value + "</em> " + document.getElementById("oddChange2").value + " <em>" + document.getElementById("bodds").innerHTML + "</em>"),
        document.getElementById("tdLiveBgColor").className = "bet",
        a = !0),
        -1 != n.indexOf("2") && (document.getElementById("tdLiveBgColor").className = "bet Odds_Upd",
        a = !0),
        -1 != n.indexOf("3") && (document.getElementById("tdBetprocessMaxBet").className = "bet Odds_Upd",
        a = !0),
        -1 != n.indexOf("4") && (document.getElementById("tdLiveBgColor").className = "bet",
        document.getElementById("tdBetprocessMaxBet").className = "BetprocessMaxBet",
        document.getElementById("tdBetprocessMinBet").className = "BetprocessMinBet",
        document.getElementById("sbBetKindValue").className = "HdpGoalClass",
        a = !0),
        -1 != n.indexOf("5") && (document.getElementById("tdBetprocessMinBet").className = "bet Odds_Upd",
        a = !0),
        -1 != n.indexOf("6") && (document.getElementById("sbBetKindValue").className = "HdpGoalClass Odds_Upd",
        a = !0),
        a && CtrlSubmitBtnDisabled(!1)
    } else {
        document.getElementById("divKeepBetProcess").style.display = "none";
        var l = document.getElementById("bp_Match").value.split("_")[4];
        document.getElementById("divHorseFixKeepBetProcess").style.display = "41" == l || "42" == l || "43" == l ? "" : "none";
        a = !1;
        -1 != (n = document.getElementById("chk_BettingChange").value).indexOf("1") && (0 == fFrame.LastBettingMode && OddsChangeAlertHandle(document.getElementById("oddChange1").value + " <em>" + document.getElementById("oddsRequest").value + "</em> " + document.getElementById("oddChange2").value + " <em>" + document.getElementById("bodds").innerHTML + "</em>"),
        document.getElementById("tdLiveBgColor").className = "bet",
        a = !0),
        -1 != n.indexOf("2") && (document.getElementById("tdHorseFixedBgColor").className = "bet Odds_Upd",
        a = !0),
        -1 != n.indexOf("3") && (document.getElementById("tdBetprocessMaxBet").className = "bet Odds_Upd",
        a = !0),
        -1 != n.indexOf("4") && (document.getElementById("tdHorseFixedBgColor").className = "bet",
        document.getElementById("tdBetprocessMaxBet").className = "BetprocessMaxBet",
        document.getElementById("tdBetprocessMinBet").className = "BetprocessMinBet",
        a = !0),
        -1 != n.indexOf("5") && (document.getElementById("tdBetprocessMinBet").className = "bet Odds_Upd",
        a = !0),
        a && CtrlSubmitBtnDisabled(!1)
    }
}
function DoSuccessBet() {
    document.fomSuccessBet.submit()
}
function SetSuccessBet(e) {
    var t;
    (t = document.getElementById("su_spRefnoValue")).innerHTML = e.lblRefnoValue,
    (t = document.getElementById("su_spTypeName")).innerHTML = e.lblTypeName,
    (t = document.getElementById("su_spHome")).innerHTML = e.lblHome,
    t.className = e.lblHomeClass,
    (t = document.getElementById("su_spAway")).innerHTML = e.lblAway,
    t.className = e.lblAwayClass,
    (t = document.getElementById("su_tdLeaguename")).innerHTML = "(" + e.lblLeaguename + ")",
    (t = document.getElementById("su_tdBetKind")).innerHTML = e.lblBetKind,
    (t = document.getElementById("su_spBetKindValue")).innerHTML = e.lblBetKindValue,
    (t = document.getElementById("su_spOddsValue")).innerHTML = e.lblOddsValue,
    (t = document.getElementById("su_spChoiceValue")).innerHTML = e.lblChoiceValue,
    t.className = e.lblChoiceColorValue,
    (t = document.getElementById("su_spStakeValue")).innerHTML = e.lblStakeValue,
    (t = document.getElementById("su_spStatusValue")).innerHTML = e.lblStatusValue,
    (t = document.getElementById("su_spPwinningValue")).innerHTML = e.lblPwinningValue,
    (t = document.getElementById("liveindicator")).value = e.hiddenLiveindicator,
    (t = document.getElementById("su_Aos")).innerHTML = e.lblAOSValue,
    ChangeDisplayMode("su", null, e.hiddenLiveindicator)
}
function bin2String(e, t, n) {
    for (var a = "", l = t; l < t + n; l++)
        a += String.fromCharCode(e[l]);
    return a
}
function SingleToParlay() {
    if (document.getElementById("chk_addToParlay").checked) {
        var e = document.getElementById("bp_Match").value.split("_");
        AddParlay(ifmBetProcess_Data.Data.matchid, e[0], e[1], "SingleToParlay", ifmBetProcess_Data.Data.hiddenSportType, e.length >= 4 ? e[3] : ""),
        document.getElementById("icon_addParlay").innerHTML = RES_Cancel_From_Parlay
    } else
        DelParlay(ifmBetProcess_Data.Data.matchid),
        document.getElementById("icon_addParlay").innerHTML = RES_Add_To_Parlay
}
function ParlayToSingle() {
    if ("F" != fFrame.rightx.RES_PageType && "S" != fFrame.rightx.RES_PageType && "OT" != fFrame.LastSelectedBettype && "161" != fFrame.LastSelectedSport && "151" != fFrame.LastSelectedSport && "152" != fFrame.LastSelectedSport && "153" != fFrame.LastSelectedSport) {
        var e = document.getElementById("bp_Match").value.split("_");
        DoBetProcess(e[0], e[1], "ParlayToSingle", null, null, 4 == e.length ? e[3] : "")
    }
}
function getParent(e) {
    for (var t = e, n = 0; n < 4; n++) {
        if (null != t.SiteMode)
            return t;
        t = t.parent
    }
    return null
}
function formvalidation_OT(e) {
    if ("none" == document.getElementById("BetProcessContainer").style.display && "none" == document.getElementById("Betslip").style.display)
        return !1;
    if (document.getElementById("btnBPSubmit").disabled)
        return !1;
    document.getElementById("btnBPSubmit").disabled = !0;
    var t, n = 0, a = 0, l = 0;
    t = document.forms[e],
    n = parseInt(removeCommas(t.elements.MINBET.value), 10),
    a = parseInt(removeCommas(t.elements.MAXBET.value), 10);
    var d, o, s, m;
    if (d = t.elements.lowerminmesg.value,
    o = t.elements.highermaxmesg.value,
    s = t.elements.areyousuremesg.value,
    m = t.elements.areyousuremesg1.value,
    t.elements.betconfirmmesg.value,
    l = Math.round(replaceSubstring(t.elements.BPstake.value, ",", "")),
    isNaN(replaceSubstring(t.elements.BPstake.value, ",", "")))
        return alert("Incorrect stake."),
        t.elements.BPstake.value = "",
        t.elements.BPstake.focus(),
        document.getElementById("payOut").innerHTML = "",
        document.getElementById("btnBPSubmit").disabled = !1,
        !1;
    if (l < 0)
        return alert("Stake must be greater than zero !"),
        t.elements.BPstake.value = "",
        t.elements.BPstake.focus(),
        document.getElementById("payOut").innerHTML = "",
        document.getElementById("btnBPSubmit").disabled = !1,
        !1;
    if (l < n)
        return alert(d),
        t.elements.BPstake.value = n,
        t.elements.BPstake.focus(),
        document.getElementById("payOut").innerHTML = payOutCalculate(removeCommas(document.getElementById("bodds").innerHTML), n, !1),
        document.getElementById("btnBPSubmit").disabled = !1,
        !1;
    if (l > a)
        return alert(o),
        t.elements.BPstake.value = a,
        t.elements.BPstake.focus(),
        document.getElementById("payOut").innerHTML = payOutCalculate(removeCommas(document.getElementById("bodds").innerHTML), a, !1),
        document.getElementById("btnBPSubmit").disabled = !1,
        !1;
    var r = s;
    return "1" == confirmMode && (r = m),
    confirm(r) ? (document.getElementById("btnBPSubmit").disabled = !0,
    t.username.value = fFrame.UserName,
    !0) : (t.elements.BPstake.value = "",
    submit = 0,
    document.getElementById("btnBPSubmit").disabled = !1,
    !1)
}
function DoOutrightBetProcess(e) {
    RES_Open_Multi_Parlay && SwitchBettingMode(0),
    tmp_obj = null,
    DropTimeoutHandlers(),
    "1" == fFrame.SiteMode ? (document.getElementById("otpbp_Match").value = e,
    document.fomBetProcess_Data_OTP.submit()) : (DoLeftMenuDisplay(),
    document.getElementById("KeepOdds").innerHTML = "",
    document.getElementById("otbp_Match").value = e,
    document.getElementById("sporttype").value = fFrame.LastSelectedSport,
    document.fomBetProcess_Data_OT.action = "outright/BetProcess_Data.php",
    document.fomBetProcess_Data_OT.submit(),
    CtrlSubmitBtnDisabled(!0))
}
function SetOutrightBetProcessData(e) {
    selBetMode = "OT",
    document.getElementById("sbBetAOSValue").innerHTML = "",
    document.getElementById("sbBetAOSValue").className = "",
    document.getElementById("div_addparlay").style.display = "none",
    null != document.getElementById("cbAutoAccept") && (document.getElementById("cbAutoAccept").checked = !1),
    null != document.getElementById("divAutoAccept") && (document.getElementById("btnAutoAccept").style.display = "none",
    document.getElementById("divAutoAccept").style.display = "none"),
    null != document.getElementById("BP_RACE") && (document.getElementById("BP_RACE").style.display = "none"),
    null != document.getElementById("BP_SPORT") && (document.getElementById("BP_SPORT").style.display = ""),
    null != document.getElementById("BetInfo") && (document.getElementById("BetInfo").className = "BetInfo"),
    null != document.getElementById("trlPayOut") && (document.getElementById("trlPayOut").style.display = ""),
    $("#scoremap").unbind("click"),
    $("#scoremap").hide();
    var t, n = !1;
    if (DropTimeoutHandlers(),
    $("html, body").scrollTop(0),
    "1" == fFrame.SiteMode ? (ChangeDisplayMode("betOP"),
    n = !0) : ChangeDisplayMode("betO"),
    "0" == e.haveparlaylist ? document.getElementById("mparlay_cnt").innerHTML = "" : document.getElementById("mparlay_cnt").innerHTML = e.haveparlaylist,
    document.getElementById("trOddsInfo").style.display = "",
    n) {
        var a = document.getElementById("tr1X2AsiaHdp");
        null != a && (a.style.display = "none",
        document.getElementById("cb1X2AsiaHdp").checked = !1),
        document.getElementById("BetProcessPhoneData").style.display = "none",
        document.getElementById("BetProcessPhoneDataOT").style.display = "",
        document.getElementById("spBetKind_P").style.display = "none",
        document.getElementById("spChoiceClass_P").style.display = "none",
        document.getElementById("PhoneBetKind").style.display = "none",
        document.getElementById("phoneOutright").style.display = "",
        t = document.getElementById("BPstake_P"),
        document.all ? (t.onKeyDown = function() {
            validateOnKD(this, event)
        }
        ,
        t.onkeyup = function() {
            payOutOnKUOT(this, event)
        }
        ) : (t.setAttribute("onkeyup", "payOutOnKUOT(this, event)"),
        t.setAttribute("onKeyDown", "validateOnKD(this, event)")),
        t = document.forms.fomConfirmBetPhone,
        document.all ? t.onsubmit = function() {
            return formvalidation_OTP("fomConfirmBetPhone")
        }
        : t.setAttribute("onsubmit", "return formvalidation_OTP('fomConfirmBetPhone')")
    } else
        document.getElementById("tr_StakeMultiples").style.display = "none",
        document.getElementById("menuTitle").style.display = "none",
        document.getElementById("menuTitleOT").style.display = "",
        (t = document.getElementById("tdBetKind")).setAttribute("height", "=0"),
        document.getElementById("divKeepBetProcess").style.display = "none",
        document.getElementById("divAcceptBetterOdds").style.display = "none",
        document.getElementById("ot_dvChoiceValue").style.display = "",
        document.getElementById("spHome_id").style.display = "none",
        document.getElementById("spAway_id").style.display = "none",
        document.getElementById("ot_dvChoiceValue_id").style.display = "none",
        document.getElementById("imgHorseJockey").style.display = "none",
        null != document.getElementById("trHorseTotoKeep") && (document.getElementById("trHorseTotoKeep").style.display = "none"),
        t = document.getElementById("BPstake"),
        document.all ? t.onkeyup = function() {
            payOutOnKUOT(this, event)
        }
        : t.setAttribute("onkeyup", "payOutOnKUOT(this, event)");
    if (document.getElementById("trOddsHorseFixedInfo").style.display = "none",
    t = n ? document.getElementById("tdLiveBgColor_P") : document.getElementById("tdLiveBgColor"),
    t.className = "bet",
    t.bgColor = "#FFFFFF",
    n && (t = document.getElementById("PhoneBetKind")).setAttribute("height", "=0"),
    n ? t = document.getElementById("ot_p_spChoiceValue") : (t = document.getElementById("spChoiceClass")).className = "FavTeamClass",
    t.innerHTML = e.lblChoiceValue,
    n && ((t = document.getElementById("ot_hdp1Value")).value = e.hdp1Value,
    (t = document.getElementById("ot_hdp2Value")).value = e.hdp2Value),
    n ? ((t = document.getElementById("odds")).value = e.lblOddsValue,
    t.className = e.lblOddsColor) : ((t = document.getElementById("bodds")).innerHTML = e.lblOddsValue,
    t.className = e.lblOddsColor),
    t = n ? document.getElementById("oddsRequest_P") : document.getElementById("oddsRequest"),
    t.value = e.hiddenOddsRequest,
    n ? (t = document.getElementById("spHome_P"),
    document.getElementById("spAway_P").style.display = "none") : t = document.getElementById("ot_dvChoiceValue"),
    t.innerHTML = e.lblChoiceValue,
    t = n ? document.getElementById("spLeaguename_P") : document.getElementById("spLeaguename"),
    t.innerHTML = e.lblLeaguename,
    t = n ? document.getElementById("spMinBetValue_P") : document.getElementById("spMinBetValue"),
    t.innerHTML = e.lblMinBetValue,
    t = n ? document.getElementById("spMaxBetValue_P") : document.getElementById("spMaxBetValue"),
    t.innerHTML = e.lblMaxBetValue,
    t = n ? document.getElementById("MINBET_P") : document.getElementById("MINBET"),
    t.value = e.hiddenMinBet,
    t = n ? document.getElementById("MAXBET_P") : document.getElementById("MAXBET"),
    t.value = e.hiddenMaxBet,
    n ? (t = document.getElementById("stakeRequest_P")).value = "" : ((t = document.getElementById("stakeRequest")).value = e.hiddenStakeRequest,
    "" != e.hiddenStakeRequest && (document.getElementById("payOut").innerHTML = payOutCalculate(removeCommas(e.hiddenOddsRequest), removeCommas(e.hiddenStakeRequest), !1))),
    !n) {
        document.getElementById("chk_BettingChange").value = e.chk_BettingChange;
        var l = new Object;
        l.IsRacing = !1,
        processMsg(e.hiddenSportType, l)
    }
    document.fomConfirmBetPhone.action = "outright/confirm_bet_data.php",
    document.fomConfirmBet.action = "outright/confirm_bet_data.php",
    confirmMode = e.confirmMode,
    document.getElementById("BPBetKey").value = e.hiddenBetKey,
    "" != e.singleBetData && (document.getElementById("Betslip").innerHTML = HTMLDecode(e.singleBetData))
}
function getParent(e) {
    for (var t = e, n = 0; n < 4; n++) {
        if (null != t.SiteMode)
            return t;
        t = t.parent
    }
    return null
}
function formvalidationP(e) {
    if (document.getElementById("btnBPSubmit_P").disabled)
        return !1;
    CtrlSubmitBtn(!0);
    var t, n, a = 0, l = 0, d = 0;
    t = document.forms[e],
    parseInt(removeCommas(t.elements.MINBET_P.value), 10),
    parseInt(removeCommas(t.elements.MAXBET_P.value), 10),
    n = parseInt(t.elements.bettype_P.value, 10);
    var o, s;
    o = t.elements.areyousuremesg_P.value,
    s = t.elements.areyousuremesg_P1.value,
    null != document.getElementById("bettingGraphRemark") && "" != document.getElementById("bettingGraphRemark").value && (o = "Press Ok to Hedge to Betting Graph"),
    a = Math.round(replaceSubstring(t.elements.BPstake_P.value, ",", ""));
    switch (n) {
    case 28:
        if (l = t.elements.bp_hdp1Value_3.value,
        d = t.elements.bp_hdp2Value_3.value,
        t.elements.bp_odds3.value,
        isNaN(t.elements.bp_hdp1Value_3) && isNaN(t.elements.bp_hdp2Value_3)) {
            if (l > 0 && d > 0)
                return alert("Error: Both Hdp has Value"),
                CtrlSubmitBtn(!1),
                !1;
            if (0 != l) {
                if (0 != d)
                    return alert("Error: HDP2 must be zero !"),
                    CtrlSubmitBtn(!1),
                    t.elements.bp_hdp2Value_3.select(),
                    !1;
                if (0 != l % 1)
                    return alert("Error: Please enter a multiple of 1 in hdp input box."),
                    CtrlSubmitBtn(!1),
                    t.elements.bp_hdp1Value_3.select(),
                    !1
            }
            if (0 != d) {
                if (0 != l)
                    return alert("Error: HDP1 must be zero !"),
                    CtrlSubmitBtn(!1),
                    t.elements.bp_hdp1Value_3.select(),
                    !1;
                if (0 != d % 1)
                    return alert("Error: Please enter a multiple of 1 in hdp input box."),
                    CtrlSubmitBtn(!1),
                    t.elements.bp_hdp2Value_3.select(),
                    !1
            }
        }
        break;
    case 1:
    case 7:
        if (l = t.elements.bp_hdp1Value_3.value,
        d = t.elements.bp_hdp2Value_3.value,
        t.elements.bp_odds3.value,
        isNaN(t.elements.bp_hdp1Value_3) && isNaN(t.elements.bp_hdp2Value_3)) {
            if (l > 0 && d > 0)
                return alert("Error: Both Hdp has Value"),
                CtrlSubmitBtn(!1),
                !1;
            if (0 != l) {
                if (0 != l % .25)
                    return alert("Error: Please enter a multiple of 0.25 in hdp input box."),
                    CtrlSubmitBtn(!1),
                    t.elements.bp_hdp1Value_3.select(),
                    !1
            }
            if (0 != d) {
                if (0 != d % .25)
                    return alert("Error: Please enter a multiple of 0.25 in hdp input box."),
                    CtrlSubmitBtn(!1),
                    t.elements.bp_hdp2Value_3.select(),
                    !1
            }
        }
        break;
    case 3:
    case 8:
        if (l = t.elements.bp_hdp1Value_2.value,
        d = t.elements.bp_hdp2Value_2.value,
        t.elements.bp_odds2.value,
        isNaN(t.elements.bp_hdp1Value_2) && isNaN(t.elements.bp_hdp2Value_2)) {
            if (l > 0 && d > 0)
                return alert("Error: Both Hdp has Value"),
                CtrlSubmitBtn(!1),
                !1;
            if (0 != l) {
                if (0 != l % .25)
                    return alert("Error: Please enter a multiple of 0.25 in hdp input box."),
                    CtrlSubmitBtn(!1),
                    t.elements.bp_hdp1Value_2.select(),
                    !1
            }
        }
        break;
    default:
        if (l = t.elements.bp_hdp1Value_1.value,
        d = t.elements.bp_hdp2Value_1.value,
        t.elements.bp_odds1.value,
        isNaN(t.elements.bp_hdp1Value_1) && isNaN(t.elements.bp_hdp2Value_1) && l > 0 && d > 0)
            return alert("Error: Both Hdp has Value"),
            CtrlSubmitBtn(!1),
            !1
    }
    if (isNaN(replaceSubstring(t.elements.BPstake_P.value, ",", "")) || "" == replaceSubstring(t.elements.BPstake_P.value.trim(), ",", ""))
        return alert("Incorrect stake."),
        t.elements.BPstake_P.value = "",
        t.elements.BPstake_P.focus(),
        document.getElementById("payOut_P").innerHTML = "",
        CtrlSubmitBtn(!1),
        !1;
    if (isNaN(t.elements.BPstake_P) && a <= 0)
        switch (n) {
        case 4:
        case 5:
        case 6:
        case 10:
        case 14:
        case 15:
        case 16:
        case 24:
        case 25:
        case 27:
        case 26:
        case 13:
        case 28:
        case 121:
        case 122:
        case 123:
            if (0 == a)
                return alert("Stake must be greater than zero !"),
                t.elements.BPstake_P.value = "",
                t.elements.BPstake_P.focus(),
                document.getElementById("payOut_P").innerHTML = "",
                CtrlSubmitBtn(!1),
                !1;
            break;
        default:
            return alert("Stake must be greater than zero !"),
            t.elements.BPstake_P.value = "",
            t.elements.BPstake_P.focus(),
            document.getElementById("payOut_P").innerHTML = "",
            CtrlSubmitBtn(!1),
            !1
        }
    var m = o;
    if ("1" == confirmMode && (m = s),
    !confirm(m))
        return t.elements.BPstake_P.value = "",
        CtrlSubmitBtn(!1),
        !1;
    CtrlSubmitBtn(!0),
    t.username.value = fFrame.UserName
}
function formvalidation_OTP(e) {
    if (document.getElementById("btnBPSubmit_P").disabled)
        return !1;
    document.getElementById("btnBPSubmit_P").disabled = !0;
    var t, n, a = 0, l = 0, d = 0;
    t = document.forms[e],
    parseInt(removeCommas(t.elements.MINBET_P.value), 10),
    parseInt(removeCommas(t.elements.MAXBET_P.value), 10),
    n = parseInt(t.elements.ot_p_hidBettype.value, 10);
    var o;
    return t.elements.lowerminmesg_P.value,
    t.elements.highermaxmesg_P.value,
    o = t.elements.areyousuremesg_P.value,
    a = Math.round(replaceSubstring(t.elements.BPstake_P.value, ",", "")),
    l = t.elements.ot_hdp1Value.value,
    d = t.elements.ot_hdp2Value.value,
    isNaN(replaceSubstring(t.elements.BPstake_P.value, ",", "")) || "" == replaceSubstring(t.elements.BPstake_P.value.trim(), ",", "") ? (alert("Incorrect stake."),
    t.elements.BPstake_P.value = "",
    t.elements.BPstake_P.focus(),
    document.getElementById("payOut_P").innerHTML = "",
    CtrlSubmitBtn(!1),
    !1) : isNaN(t.elements.ot_hdp1Value) && isNaN(t.elements.ot_hdp2Value) && l > 0 && d > 0 ? (alert("Error: Both Hdp has Value"),
    CtrlSubmitBtn(!1),
    !1) : a <= 0 && 10 != n ? (alert("Stake must be greater than zero !"),
    t.elements.BPstake_P.value = "",
    t.elements.BPstake_P.focus(),
    document.getElementById("payOut_P").innerHTML = "",
    !1) : 0 == a && 10 == n ? (alert("Stake can NOT be zero !"),
    t.elements.BPstake_P.value = "",
    t.elements.BPstake_P.focus(),
    document.getElementById("payOut_P").innerHTML = "",
    document.getElementById("btnBPSubmit_P").disabled = !1,
    !1) : confirm(o) ? void (document.getElementById("btnBPSubmit_P").disabled = !0) : (t.elements.BPstake_P.value = "",
    submit = 0,
    document.getElementById("btnBPSubmit_P").disabled = !1,
    !1)
}
function getTmepValue(e) {
    tmpvalue = e.value
}
function ParlayOutValue(e, t, n, a, l) {
    document.ParlayBetForm.count.value = document.getElementById(t).value;
    var d = document.ParlayBetForm.count.value;
    if (document.ParlayBetForm.MId.value = document.getElementById("MatchID" + d).value,
    document.ParlayBetForm.OddsId.value = document.getElementById("OddsID" + d).value,
    document.ParlayBetForm.Odds.value = document.getElementById("Odds" + d).value,
    document.ParlayBetForm.Team.value = document.getElementById("Team" + d).value,
    "odds" == e)
        return "" != n && (document.ParlayBetForm.hdp1.value = document.getElementById(n).value),
        "" != a && (document.ParlayBetForm.hdp2.value = document.getElementById(a).value),
        document.ParlayBetForm.Odds.value = l.value,
        document.ParlayBetForm.del.value = "",
        document.ParlayBetForm.updatevalue.value = "yes",
        void (tmpvalue != l.value && document.ParlayBetForm.submit());
    tmpvalue != l.value && ("hdp1" == e ? (document.ParlayBetForm.hdp1.value = l.value,
    document.ParlayBetForm.hdp2.value = "") : "hdp2" == e && (document.ParlayBetForm.hdp2.value = l.value,
    document.ParlayBetForm.hdp1.value = ""),
    document.ParlayBetForm.del.value = "",
    document.ParlayBetForm.updatevalue.value = "yes",
    document.ParlayBetForm.submit())
}
function CtrlSubmitBtn(e) {
    var t = document.getElementById("cb1X2AsiaHdp");
    if (null != t && 1 == t.checked) {
        var n = document.getElementById("btnBPSubmit_P1");
        null != n && (n.disabled = e)
    } else
        document.getElementById("btnBPSubmit_P").disabled = e;
    null != t && 0 == e && (t.checked = !1)
}
function getParent(e) {
    for (var t = e, n = 0; n < 4; n++) {
        if (null != t.SiteMode)
            return t;
        t = t.parent
    }
    return null
}
function MPformvalidation(e) {
    if ("none" == document.getElementById("div_MixParlay").style.display)
        return !1;
    if (document.getElementById("btnMPSubmit").disabled)
        return !1;
    document.getElementById("btnMPSubmit").disabled = !0,
    CtrlSubmitBtnDisabled(!0);
	
	console.log("wwwwwww");
    var t, n = 0, a = 0;
    odds = 0,
    t = document.forms[e],
    n = parseInt(t.elements.MINBET.value, 10),
    a = parseInt(t.elements.MAXBET.value, 10),
    betcount = parseInt(t.elements.count.value, 10);
    var l, d, o, s, m;
    if (l = t.elements.yousuretobetmesg.value,
    m = t.elements.yousuretobetmesg1.value,
    d = t.elements.morethan2.value,
    o = t.elements.lowermin.value,
    s = t.elements.highermax.value,
    null != document.getElementById("phonebettingGraphButton") && "" != document.getElementById("phonebettingGraphButton").value && (rusm = "Press Ok to Hedge to Betting Graph"),
    "" != document.getElementById("txtPayOut").innerHTML && parseFloat(removeCommas(document.getElementById("txtPayOut").innerHTML)),
    "" != document.getElementById("TotalOdds").innerHTML && (odds = parseFloat(document.getElementById("TotalOdds").innerHTML)),
    betcount < parseInt(iframMixParlay.CanBetTicketCnt, 10))
        return alert(d),
        document.getElementById("btnMPSubmit").disabled = !1,
        CtrlSubmitBtnDisabled(!1),
        !1;
    /*for (var r = 0, i = !1, u = "", c = !1, y = 0; y < 32; y++) {
        var B = document.getElementById("ComboInfo" + y);
        if (null != B && (B.innerHTML = "",
        B.parentElement.style.display = "none"),
        null != t.elements["ComboStake" + y]) {
            var p = replaceSubstring(t.elements["ComboStake" + y].value, ",", "");
            if (!isNaN(p) && "" != p) {
                var g = Math.round(replaceSubstring(t.elements["ComboStake" + y].value, ",", ""));
                if (g > 0) {
                    i = !0;
                    var _ = document.getElementById("ComboDetailSwitch" + y).innerHTML.indexOf("</i>");
                    -1 == _ && (_ = document.getElementById("ComboDetailSwitch" + y).innerHTML.indexOf("</I>")),
                    u = u + document.getElementById("ComboDetailSwitch" + y).innerHTML.substring(0, _).replace("<i>", "").replace("<I>", "") + "\n"
                }
                if (r < g && (r = g),
                g < n) {
                    if ("" != t.elements["ComboStake" + y].value) {
                        t.elements["ComboStake" + y].value = addCommas(n + ""),
                        B.innerHTML = o,
                        B.parentElement.style.display = "",
                        c = !0,
                        t.elements.stake.value = "";
                        -1 == (f = t.elements["ComboStake" + y].parentElement.parentElement.parentElement.parentElement).className.indexOf("on") && (f.className = f.className + " on")
                    }
                } else {
                    if (g > (a = parseInt(document.getElementById("ComboStake" + y).getAttribute("max"), 10)) && "" != t.elements["ComboStake" + y].value) {
                        t.elements["ComboStake" + y].value = addCommas(a + ""),
                        B.innerHTML = s,
                        B.parentElement.style.display = "",
                        c = !0,
                        t.elements.stake.value = "";
                        -1 == (f = t.elements["ComboStake" + y].parentElement.parentElement.parentElement.parentElement).className.indexOf("on") && (f.className = f.className + " on")
                    }
                }
            }
        }
    }*/
    var I = replaceSubstring(t.elements.stake.value, ",", "");
    if (!isNaN(I) && "" != I) {
        Math.round(replaceSubstring(t.elements.stake.value, ",", "")) < n && (t.elements.stake.value = addCommas(n + ""))
    }
    /*if (!i) {
        for (y = 0; y < 32; y++) {
            var E = document.getElementById("ComboStake" + y);
            if (null != E && "1" == E.getAttribute("cnt")) {
                E.value = addCommas(n + ""),
                E.focus(),
                E.select(),
                mixparlay_stake = E.value,
                (B = document.getElementById("ComboInfo" + y)).innerHTML = o,
                B.parentElement.style.display = "",
                c = !0,
                t.elements.stake.value = "";
                var f;
                -1 == (f = t.elements["ComboStake" + y].parentElement.parentElement.parentElement.parentElement).className.indexOf("on") && (f.className = f.className + " on");
                break
            }
        }
        return CalcCombiInfo(),
        document.getElementById("btnMPSubmit").disabled = !1,
        CtrlSubmitBtnDisabled(!1),
        !1
    }*/
    /*if (CalcCombiInfo(),
    c)
        return document.getElementById("btnMPSubmit").disabled = !1,
        CtrlSubmitBtnDisabled(!1),
        !1;*/
    var L = l;
    return "1" == confirmMode && (L = m),
    // L = u + document.getElementById("TotalStakeName").childNodes[0].innerHTML + "=" + document.getElementById("TotalStakeValue").innerHTML + "\n" + L,
    confirm(L) ? (document.ParlayBetForm.MId.value = "ReloadParlayData",
    t.action = "mixcom/LeftAllInOne_confirm_bet.php",
    t.username.value = fFrame.UserName,
    t.submit(),
    !0) : (document.getElementById("btnMPSubmit").disabled = !1,
    CtrlSubmitBtnDisabled(!1),
    !1)
}
function AddParlay(e, t, n, a, l, d) {
    ASYN_FLAG = "",
    "SingleToParlay" != a && (SwitchBettingMode(2),
    DropTimeoutHandlers()),
    $("html, body").scrollTop(0),
    DoLeftMenuDisplay(),
    "SingleToParlay" != a && ChangeDisplayMode("Amp"),
    "1" == fFrame.SiteMode && (document.ParlayBetForm.updatevalue.value = ""),
    document.ParlayBetForm.mode.value = "",
    document.ParlayBetForm.Sport.value = l,
    document.ParlayBetForm.MId.value = e,
    document.ParlayBetForm.OddsId.value = t,
    document.ParlayBetForm.Team.value = n,
    document.ParlayBetForm.Odds.value = a,
    document.ParlayBetForm.del.value = "",
    null != eObj && (document.ParlayBetForm.key.value = eObj.GetKey("mbet")),
    document.ParlayBetForm.submit(),
    "SingleToParlay" != a && (document.getElementById("bp_Match").value = t + "_" + n + "_" + a + "_" + d),
    bParlayToSingle = !0,
    CtrlSubmitBtnDisabled(!0)
}
function DelParlay(e) {
    ASYN_FLAG = "",
    2 == fFrame.LastBettingMode && ChangeDisplayMode("Dmp");
    var t = "del";
    0 == fFrame.LastBettingMode && (t = "del_single"),
    document.ParlayBetForm.mode.value = "",
    document.ParlayBetForm.del.value = t,
    document.ParlayBetForm.MId.value = e,
    ParlaySportType = fFrame.LastSelectedSport,
    document.ParlayBetForm.Sport.value = ParlaySportType,
    null != eObj && (document.ParlayBetForm.key.value = eObj.GetKey("mbet")),
    document.ParlayBetForm.submit(),
    boolDelParlay = !0
}
function ClearParlay() {
    ASYN_FLAG = "",
    ChangeDisplayMode("Cmp"),
    document.ParlayBetForm.del.value = "",
    document.ParlayBetForm.mode.value = "cancel",
    ParlaySportType = fFrame.LastSelectedSport,
    document.ParlayBetForm.Sport.value = ParlaySportType,
    null != eObj && (document.ParlayBetForm.key.value = eObj.GetKey("mbet")),
    document.ParlayBetForm.submit(),
    document.getElementById("stake").value = ""
}
function getParent(e) {
    for (var t = e, n = 0; n < 4; n++) {
        if (null != t.SiteMode)
            return t;
        t = t.parent
    }
    return null
}
function Bingoformvalidation(e) {
    if ("none" == document.getElementById("BingoBetProcessContainer").style.display && "none" == document.getElementById("Betslip").style.display)
        return !1;
    if (document.getElementById("Bingo_btnBPSubmit").disabled)
        return !1;
    document.getElementById("Bingo_btnBPSubmit").disabled = !0,
    CtrlSubmitBtnDisabled(!0);
    var t, n = 0, a = 0, l = 0;
    t = document.forms[e],
    n = parseInt(removeCommas(t.elements.Bingo_MINBET.value), 10),
    a = parseInt(removeCommas(t.elements.Bingo_MAXBET.value), 10),
    parseInt(t.elements.Bingo_bettype.value, 10);
    var d, o, s, m;
    if (d = t.elements.Bingo_lowerminmesg.value,
    o = t.elements.Bingo_highermaxmesg.value,
    s = t.elements.Bingo_areyousuremesg.value,
    m = t.elements.Bingo_areyousuremesg1.value,
    ermm = t.elements.Bingo_incorrectStakeMesg.value,
    l = Math.round(replaceSubstring(t.elements.Bingo_BPstake.value, ",", "")),
    isNaN(replaceSubstring(t.elements.Bingo_BPstake.value, ",", "")))
        return alert(ermm),
        t.elements.Bingo_BPstake.value = "",
        t.elements.Bingo_BPstake.focus(),
        document.getElementById("Bingo_payOut").innerHTML = "",
        document.getElementById("Bingo_btnBPSubmit").disabled = !1,
        CtrlSubmitBtnDisabled(!1),
        !1;
    if (isNaN(t.elements.Bingo_BPstake)) {
        if (l < 0)
            return alert("Stake must be greater than zero !"),
            t.elements.Bingo_BPstake.value = "",
            t.elements.Bingo_BPstake.focus(),
            document.getElementById("Bingo_payOut").innerHTML = "",
            document.getElementById("Bingo_btnBPSubmit").disabled = !1,
            CtrlSubmitBtnDisabled(!1),
            !1;
        var r = function(e) {
            if (t.elements.Bingo_BPstake.value = addCommas(e.toFixed(0)),
            t.elements.Bingo_BPstake.focus(),
            "1" != t.elements.Bingo_oddsType.value)
                if ("5" == t.elements.Bingo_oddsType.value)
                    document.getElementById("Bingo_payOut").innerHTML = payOutCalculate(parseInt(removeCommas(document.getElementById("Bingo_bodds").innerHTML), 10) / 100, e, !0);
                else {
                    var n = fFrame.leftx.document.getElementById("Bingo_bettype").value;
                    document.getElementById("Bingo_payOut").innerHTML = payOutCalculate(removeCommas(document.getElementById("Bingo_bodds").innerHTML), e, -1 != indexOf(["81", "82", "83", "84", "85", "86", "87", "88", "8101", "8102", "8104"], n))
                }
            else
                document.getElementById("Bingo_payOut").innerHTML = payOutCalculate(removeCommas(document.getElementById("Bingo_bodds").innerHTML), e, !1);
            document.getElementById("Bingo_btnBPSubmit").disabled = !1,
            CtrlSubmitBtnDisabled(!1)
        };
        if (l < n)
            return clearTimeout(_ClearBPOddsChangeAlertTimer),
            $("#Bingo_BPOddsChangeAlert div").html(d),
            $("#Bingo_BPOddsChangeAlert").slideDown("fast"),
            _ClearBPOddsChangeAlertTimer = setTimeout(function() {
                $("#Bingo_BPOddsChangeAlert").slideUp("fast")
            }, 5e3),
            $("#Bingo_BPMinMaxBetAlert").css("display", "none"),
            r(n),
            !1;
        if (l > a)
            return clearTimeout(_ClearBPOddsChangeAlertTimer),
            $("#Bingo_BPOddsChangeAlert div").html(o),
            $("#Bingo_BPOddsChangeAlert").slideDown("fast"),
            _ClearBPOddsChangeAlertTimer = setTimeout(function() {
                $("#Bingo_BPOddsChangeAlert").slideUp("fast")
            }, 5e3),
            $("#Bingo_BPMinMaxBetAlert").css("display", "none"),
            r(a),
            !1
    }
    var i = s;
    return "1" == confirmMode && (i = m),
    confirm(i) ? (dobet = !0,
    document.getElementById("Bingo_btnBPSubmit").disabled = !0,
    CtrlSubmitBtnDisabled(!0),
    t.Bingo_username.value = fFrame.UserName,
    t.submit(),
    !0) : (dobet = !1,
    t.elements.Bingo_BPstake.select(),
    document.getElementById("Bingo_btnBPSubmit").disabled = !1,
    CtrlSubmitBtnDisabled(!1),
    !1)
}
function DoBingoBetProcess(e, t, n, a) {
    RES_Open_Multi_Parlay && SwitchBettingMode(0),
    document.getElementById("div_MixParlay").style.display = "none",
    tmp_obj = document.getElementById("Bingo_chKeepBet");
    var l = e + "_" + t + "_" + n;
    null != a && (l += "_" + a),
    DropTimeoutHandlers(),
    "1" == fFrame.SiteMode ? (document.getElementById("bp_p_Match").value = l,
    document.fomBetProcessPhone_Data.action = "bingo/BetProcess_Data.php",
    document.fomBetProcessPhone_Data.submit()) : ("0" == fFrame.SiteMode && ($("#minigameheader").hasClass("collapse") || $("#minigameheader").addClass("collapse")),
    DoLeftMenuDisplay(),
    document.getElementById("Bingo_BPstake").value = "",
    document.getElementById("Bingo_payOut").innerHTML = "",
    document.getElementById("Bingo_KeepOdds").innerHTML = "<span>" + RES_KeepOdds + "</span>",
    document.getElementById("Bingo_bp_Match").value = l,
    null != eObj && (document.getElementById("Bingo_bp_key").value = eObj.GetKey("bbet")),
    document.Bingo_fomBetProcess_Data.action = "bingo/BetProcess_Data.php",
    document.Bingo_fomBetProcess_Data.submit(),
    CtrlSubmitBtnDisabled(!0))
}
function SetBingoBetProcessData(e) {
    selBetMode = "NG",
    dobet = !1;
    var t, n = !1;
    if (DropTimeoutHandlers(),
    $("html, body").scrollTop(0),
    "1" == fFrame.SiteMode ? (ChangeDisplayMode("betP"),
    n = !0) : (document.getElementById("Bingo_sporttype").value = e.hiddenSportType,
    ChangeDisplayMode("betBingo"),
    OddsKeepCountTime(document.getElementById("Bingo_chKeepBet")),
    (t = document.getElementById("Bingo_bodds")).className = e.lblOddsColor,
    t.innerHTML = e.lblOddsValue),
    "0" == e.haveparlaylist ? document.getElementById("mparlay_cnt").innerHTML = "" : document.getElementById("mparlay_cnt").innerHTML = e.haveparlaylist,
    document.getElementById("ot_dvChoiceValue").style.display = "none",
    document.getElementById("spHome_id").style.display = "",
    document.getElementById("spAway_id").style.display = "",
    document.getElementById("ot_dvChoiceValue_id").style.display = "none",
    n ? ((t = document.getElementById("BetProcessPhoneData")).style.display = "",
    document.getElementById("BetProcessPhoneDataOT").style.display = "none") : (t = document.getElementById("Bingo_menuTitle")).style.display = "",
    t.innerHTML = e.lblSportKind + " / ",
    document.getElementById("Bingo_chk_BettingChange").value = e.chk_BettingChange,
    n ? ((t = document.getElementById("PhoneBetKind")).setAttribute("height", "=27"),
    t = document.getElementById("spBetKind_P")) : (t = document.getElementById("Bingo_tdBetKind")).setAttribute("height", "=27"),
    t.innerHTML = e.lblBetKind,
    t = document.getElementById("Bingo_spGameNo"),
    t.innerHTML = e.lblMatchCode,
    t = document.getElementById("Bingo_LeagueName"),
    t.innerHTML = e.lblLeaguename,
    n && ((t = document.getElementById("spOddsStatus_P")).className = e.lbloddsStatusClass,
    t.innerHTML = e.lbloddsStatus,
    (t = document.getElementById("bettingGraphRemark")).value = "",
    (t = document.getElementById("liveIndicator_P")).value = e.hiddenliveIndicator),
    t = n ? document.getElementById("tdLiveBgColor_P") : document.getElementById("Bingo_tdLiveBgColor"),
    "#FFFFFF" == e.liveBgColor ? document.getElementById("Bingo_BetInfo").className = "BetInfo" : document.getElementById("Bingo_BetInfo").className = "BetInfo liveligh",
    t = n ? document.getElementById("spChoiceClass_P") : document.getElementById("Bingo_spChoiceClass"),
    t.innerHTML = e.lblChoiceValue,
    n ? (document.getElementById("spBetKind_P").style.display = "",
    document.getElementById("spChoiceClass_P").style.display = "",
    document.getElementById("PhoneBetKind").style.display = "",
    document.getElementById("phoneOutright").style.display = "none",
    document.getElementById("phoneInputBox1").style.display = "",
    document.getElementById("phoneInputBox2").style.display = "none",
    document.getElementById("phoneInputBox3").style.display = "none",
    document.getElementById("RemarkContainer").style.display = e.lblhedgeBox,
    document.getElementById("liveScoreContainer").style.display = "none",
    (t = document.getElementById("bp_hdp1Value_1")).value = e.lblhdp1Value,
    (t = document.getElementById("bp_hdp2Value_1")).value = e.lblhdp2Value,
    (t = document.getElementById("bp_odds1")).className = e.lblOddsColor,
    t.value = e.lblOddsValue,
    (t = document.getElementById("liveScoreH")).value = e.lblLiveScoreH,
    (t = document.getElementById("liveScoreA")).value = e.lblLiveScoreA) : ((t = document.getElementById("Bingo_sbBetKindValue")).innerHTML = e.lblBetKindValue,
    (t = document.getElementById("Bingo_bodds")).className = e.lblOddsColor,
    t.innerHTML = e.lblOddsValue,
    (t = document.getElementById("Bingo_spScoreValue")).innerHTML = e.lblScoreValue,
    (t = document.getElementById("Bingo_divAcceptBetterOdds")).style.display = ""),
    t = n ? document.getElementById("spMinBetValue_P") : document.getElementById("Bingo_spMinBetValue"),
    t.innerHTML = e.lblMinBetValue,
    t = n ? document.getElementById("spMaxBetValue_P") : document.getElementById("Bingo_spMaxBetValue"),
    t.innerHTML = e.lblMaxBetValue,
    t = n ? document.getElementById("stakeRequest_P") : document.getElementById("Bingo_stakeRequest"),
    t.value = e.hiddenStakeRequest,
    t = n ? document.getElementById("oddsRequest_P") : document.getElementById("Bingo_oddsRequest"),
    t.value = e.hiddenOddsRequest,
    t = n ? document.getElementById("MINBET_P") : document.getElementById("Bingo_MINBET"),
    t.value = e.hiddenMinBet,
    t = n ? document.getElementById("MAXBET_P") : document.getElementById("Bingo_MAXBET"),
    t.value = e.hiddenMaxBet,
    t = n ? document.getElementById("bettype_P") : document.getElementById("Bingo_bettype"),
    t.value = e.hiddenBetType,
    n ? (t = document.getElementById("oddsType_P")).value = e.hiddenOddsType : (t = document.getElementById("Bingo_oddsType")).value = e.hiddenOddsType,
    n)
        document.getElementById("trlPayOut_P").style.display = "",
        "" == e.hiddenStakeRequest ? document.getElementById("BPstake_P").value = "" : document.getElementById("BPstake_P").value = e.hiddenStakeRequest,
        document.getElementById("payOut_P").innerHTML = "",
        document.getElementById("BPstake_P").focus();
    else {
        if (document.getElementById("Bingo_tr_StakeMultiples").style.display = "none",
        document.getElementById("Bingo_trlPayOut").style.display = "",
        document.getElementById("Bingo_trOddsInfo").style.display = "",
        "1" == e.OddsStakeChg && alert(document.getElementById("Bingo_oddsWarning").value),
        processBingoMsg(e.hiddenSportType),
        "" == e.hiddenStakeRequest && "" != document.getElementById("Bingo_BPstake").value && (e.hiddenStakeRequest = document.getElementById("Bingo_BPstake").value),
        "" != e.hiddenStakeRequest) {
            document.getElementById("Bingo_BPstake").value = e.hiddenStakeRequest,
            document.getElementById("Bingo_BPstake").select();
            var a = e.hiddenBetType
              , l = e.hiddenOddsType;
            -1 != indexOf(["81", "82", "83", "84", "85", "86", "87", "88", "89", "90", "8101", "8102", "8103", "8104", "8105"], a) && "1" != l ? document.getElementById("Bingo_payOut").innerHTML = "5" == l ? payOutCalculate(parseInt(removeCommas(document.getElementById("Bingo_bodds").innerHTML), 10) / 100, removeCommas(e.hiddenStakeRequest), !0) : payOutCalculate(removeCommas(document.getElementById("Bingo_bodds").innerHTML), removeCommas(e.hiddenStakeRequest), -1 != indexOf(["81", "82", "83", "84", "85", "86", "87", "88", "8101", "8102", "8104"], a)) : document.getElementById("Bingo_payOut").innerHTML = payOutCalculate(removeCommas(document.getElementById("Bingo_bodds").innerHTML), removeCommas(e.hiddenStakeRequest), !1)
        }
        0 == fFrame.LastBettingMode && document.getElementById("Bingo_BPstake").focus()
    }
    n ? document.fomConfirmBetPhone.action = "underover/confirm_bet_data.php" : document.fomBingoConfirmBet.action = "bingo/confirm_bet_data.php",
    confirmMode = e.confirmMode,
    document.getElementById("Bingo_BPBetKey").value = e.hiddenBetKey,
    "" != e.singleBetData && (document.getElementById("Betslip").innerHTML = HTMLDecode(e.singleBetData))
}
function OddsChangeBingoAlertHandle(e) {
    $("#Bingo_BPOddsChangeAlert div").html(e),
    $("#Bingo_BPOddsChangeAlert").css("display", "block")
}
function processBingoMsg(e) {
    0 != document.getElementById("Bingo_stakeRequest").value.length && (document.getElementById("Bingo_BPstake").value = document.getElementById("Bingo_stakeRequest").value,
    document.getElementById("Bingo_btnBPSubmit").disabled = !1,
    CtrlSubmitBtnDisabled(!1));
    switch (document.getElementById("Bingo_chk_BettingChange").value) {
    case "1":
        0 == fFrame.LastBettingMode && OddsChangeBingoAlertHandle(document.getElementById("Bingo_oddChange1").value + " <em>" + document.getElementById("Bingo_oddsRequest").value + "</em> " + document.getElementById("Bingo_oddChange2").value + " <em>" + document.getElementById("Bingo_bodds").innerHTML + "</em>"),
        document.getElementById("Bingo_tdLiveBgColor").className = "bet",
        document.getElementById("Bingo_btnBPSubmit").disabled = !1,
        CtrlSubmitBtnDisabled(!1);
        break;
    case "2":
        document.getElementById("Bingo_tdLiveBgColor").className = "bet Odds_Upd",
        document.getElementById("Bingo_btnBPSubmit").disabled = !1,
        CtrlSubmitBtnDisabled(!1);
        break;
    case "3":
        document.getElementById("Bingo_tdBetprocessMaxBet").className = "bet Odds_Upd",
        document.getElementById("Bingo_btnBPSubmit").disabled = !1,
        CtrlSubmitBtnDisabled(!1);
        break;
    case "5":
        document.getElementById("Bingo_tdBetprocessMinBet").className = "bet Odds_Upd",
        document.getElementById("Bingo_btnBPSubmit").disabled = !1,
        CtrlSubmitBtnDisabled(!1);
        break;
    case "6":
        document.getElementById("Bingo_tdBetprocessMaxBet").className = "bet Odds_Upd",
        document.getElementById("Bingo_tdBetprocessMinBet").className = "bet Odds_Upd",
        document.getElementById("Bingo_btnBPSubmit").disabled = !1,
        CtrlSubmitBtnDisabled(!1);
        break;
    case "4":
        document.getElementById("Bingo_tdLiveBgColor").className = "bet",
        document.getElementById("Bingo_tdBetprocessMaxBet").className = "BetprocessMaxBet",
        document.getElementById("Bingo_tdBetprocessMinBet").className = "BetprocessMinBet",
        document.getElementById("Bingo_btnBPSubmit").disabled = !1,
        CtrlSubmitBtnDisabled(!1)
    }
}
function CallMiniGame(e) {
    if (!CheckIsIpad()) {
        var t, n = document.location.host, a = n.indexOf(".", 0), l = n.substr(0, a);
        location.protocol.indexOf("https") >= 0 ? t = fFrame.MiniGameServerMode ? "ca88.155551.com" : "qarng.155551.com" : fFrame.MiniGameServerMode ? t = n.replace(l, "ca88") : (a = (t = n.replace(l, "casinoqavm1")).indexOf(":", 0)) >= 0 ? (l = t.substr(a + 1, t.length - a),
        t = t.replace(l, "8890")) : t += ":8890";
        var d = document.getElementsByTagName("head")[0]
          , o = document.createElement("script");
        o.type = "text/javascript",
        fFrame.MiniGameServerMode ? o.src = location.protocol + "//" + t + "/MiniWebportal/MiniGameUserCheck.php?o=" + e + "&sbhost=" + n + "&LoginDomain=" + t : o.src = location.protocol + "//" + t + "/QAMiniWebportal/MiniGameUserCheck.php?o=" + e + "&sbhost=" + n + "&LoginDomain=" + t,
        d.appendChild(o)
    }
}
function OpenMiniGame() {}
function CloseMiniGame() {}
function InitBetslip(e) {
    (IsEuro = e) || (BetslipPath = "EuroSite/underover/")
}
function checkStakeValue(e, t, n) {
    var a = validateOnKPForSingle(e, t, n);
    return a ? UpdateSingleBetStake(e.id, e.value) : (e.value = removeCommas(e.value),
    $("#" + Key).val(addCommas_euro(e.value))),
    a
}
function validateOnKPForSingleKeyUP(e, t, n) {
    var a = document.all ? t.keyCode : t.which;
    return !(e.value.length > 0 && 0 == n && 48 == a) && (8 == a || 13 == a || (!/^$/.test(removeCommas(e.value)) || !/0/.test(String.fromCharCode(a))) && !/[^0-9]/.test(String.fromCharCode(a)))
}
function validateOnKPForSingle(e, t, n) {
    var a = validateOnKPForSingleKeyUP(e, t, n)
      , l = document.all ? t.keyCode : t.which;
    if (a && 13 == l) {
        if ("txtSingleEachWay" == e.id)
            UpdateEachStake();
        else {
            if ("" == e.value)
                return a;
            UpdateSingleBetStake(e.id, e.value)
        }
        SingleBetPlaceBet(),
        a = !0
    }
    return a
}
function addCommas_euro(e) {
    for (var t = new RegExp("(-?[0-9]+)([0-9]{3})"); t.test(e); )
        e = e.replace(t, "$1,$2");
    return e
}
function removeCommas(e) {
    return e.replace(/,/g, "")
}
function UpdatePayOutTotalStake(e, t) {
    UpdatePayOut(e, t),
    UpdateTotalStake(t)
}
function UpdatePayOut(e, t) {
    for (var n = e.id.replace("SingleStake", ""), a = removeCommas(e.value), l = 0; l < a.length; l++)
        if (tmp = a.substr(l, 1),
        -1 == "0123456789".indexOf(tmp))
            return;
    if (e.value = addCommas_euro(a.toString()),
    null != $("#" + n + "ibettype")) {
        var d = $("#" + n + "ibettype").val()
          , o = $("#" + n + "oddsvalue").val()
          , s = $("#" + n + "oddsType").val()
          , m = 0;
        m = "'1', '2', '3', '7', '8', '12', '20' ,'81','82','83','84','85','86','87','88','89'".indexOf("'" + d + "'") > -1 ? "5" == s ? a * (1 + Math.abs(o / 100)) : "1" != s ? a * (1 + Math.abs(o)) : a * Math.abs(o) : a * Math.abs(o);
        var r = n + "Payout";
        return $("#" + r).html(addCommas_euro(m.toFixed(2).toString())),
        m
    }
}
function SetSingleBetEachWay(e, t, n) {
    var a = e.value;
    a = addCommas_euro(a = removeCommas(a)),
    e.value = a,
    $("input[id$='_SingleStake']").each(function() {
        $(this).val(a),
        UpdatePayOut(this, !0)
    }),
    UpdateTotalStake(!0)
}
function GetBetslip() {
    $.ajax({
        type: "post",
        url: BetslipPath + "GetBetslip.php",
        data: {},
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        cache: !1,
        asyncBoolean: !1,
        error: function(e) {
            alert("Request error " + e)
        },
        success: function(e) {
            "" != e && ($("#Betslip").html(e),
            OpenMask(),
            updateMultiTitle())
        }
    })
}
function GetSingleBetConfirmBet() {
    $("#SingleBetConfirm").attr("disabled", !0);
    var e = $("#divSingleTickets").find("input").length;
    for (i = 0; i < e - 2; i++) {
        $("#divSingleTickets").find("input:eq(" + i + ")").val(),
        UpdateSingleBetStake($("#divSingleTickets").find("input:eq(" + i + ")").attr("id"), $("#divSingleTickets").find("input:eq(" + i + ")").val())
    }
    $.ajax({
        type: "post",
        url: "underover/GetConfirmBet.php",
        data: {
            CurrentTab: 1
        },
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        cache: !1,
        asyncBoolean: !1,
        complete: function() {
            $("#SingleBetConfirm").attr("disabled", !1)
        },
        error: function(e) {
            alert("Request error " + e)
        },
        success: function(e) {
            "" != e && ($("#Betslip").html(e),
            OpenMask())
        }
    })
}
function GetMixParlayConfirmBet() {
    $("#MixParlayConfirmBet").attr("disabled", !0),
    UpdateMixParlayStake($("#txtParlayStake").val(), $("#ckKeepOdds:checked").val()),
    $.ajax({
        type: "post",
        url: "underover/GetConfirmBet.php",
        data: {
            CurrentTab: 2
        },
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        cache: !1,
        asyncBoolean: !1,
        error: function(e) {
            alert("Request error " + e)
        },
        complete: function() {
            $("#MixParlayConfirmBet").attr("disabled", !1)
        },
        success: function(e) {
            "" != e && ($("#Betslip").html(e),
            OpenMask())
        }
    })
}
function SingleBetPlaceBet() {
    var e = document.getElementById("areyousuremesg").value;
    if (confirm(e)) {
        $("#btnSingleBetPlaceBet").attr("disabled", !0);
        var t = document.getElementById("btnSingleBetPlaceBet");
        t.href = "JavaScript:",
        t.className = "disabled",
        $.ajax({
            type: "post",
            url: BetslipPath + "SingleBetPlaceBet.php",
            data: {},
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            cache: !1,
            asyncBoolean: !1,
            error: function(e) {
                document.getElementById("btnSingleBetPlaceBet"),
                alert("Request error " + e)
            },
            success: function(e) {
                "" != e && (refreshAccountInfo("mini"),
                $("#Betslip").html(e),
                IsEuro && ShowBetListMini(),
                OpenMask()),
                updateMultiTitle()
            }
        }),
        t.href = "JavaScript:SingleBetPlaceBet();",
        t.className = "button"
    }
}
function MixParlayPlaceBet() {
    $("#btnMixParlayPlaceBet").attr("disabled", !0);
    var e = document.getElementById("btnMixParlayPlaceBet");
    e.href = "JavaScript:",
    e.className = "disabled",
    $.ajax({
        type: "post",
        url: "mixcom/MixParlayPlaceBet.php",
        data: {},
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        cache: !1,
        asyncBoolean: !1,
        complete: function() {
            $("#btnMixParlayPlaceBet").attr("disabled", !1)
        },
        error: function(e) {
            alert("Request error " + e)
        },
        success: function(e) {
            "" != e && ($("#Betslip").html(e),
            ShowBetListMini(),
            OpenMask())
        }
    }),
    e.href = "JavaScript:MixParlayPlaceBet();",
    e.className = "button"
}
function AddOutrightBetTicket(e) {
    RES_Open_Multi && $.ajax({
        type: "post",
        url: BetslipPath + "AddOutrightBetTicket.php",
        data: {
            Params: e
        },
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        cache: !1,
        asyncBoolean: !1,
        error: function(e) {
            alert("Request error " + e)
        },
        success: function(e) {
            "" != e && ($("#Betslip").html(e),
            OpenMask(),
            updateMultiTitle(),
            FocusInputBox())
        }
    })
}
function AddHorseTicket(e, t, n, a, l, d, o) {
    RES_Open_Multi && $.ajax({
        type: "post",
        url: BetslipPath + "AddHorseBetTicket.php",
        data: {
            OddsID: e,
            ProgramID: t,
            RaceNum: n,
            Runner: a,
            BType: l,
            SportType: d,
            PoolType: o
        },
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        cache: !1,
        asyncBoolean: !1,
        error: function(e) {
            alert("Request error " + e)
        },
        success: function(e) {
            "" != e && ($("#Betslip").html(e),
            OpenMask(),
            updateMultiTitle(),
            FocusInputBox())
        }
    })
}
function FocusInputBox() {
    navigator.userAgent.match(/iPad/i) || null != document.getElementById("txtSingleEachWay") && setTimeout(function() {
        try {
            (document.getElementById("txtSingleEachWay").clientWidth > 0 || document.getElementById("txtSingleEachWay").clientHeight > 0) && "none" == document.getElementById("div_AlertBox").style.display && document.getElementById("txtSingleEachWay").focus()
        } catch (e) {}
    }, 600)
}
function AddBetTicket(e, t, n, a) {
    if (RES_Open_Multi) {
        var l = "";
        null != eObj && (l = eObj.GetKey(a ? "bbet" : "bet")),
        $.ajax({
            type: "post",
            url: BetslipPath + "AddBetTicket.php",
            data: {
                OddsID: e,
                BTeam: t,
                Odds: n,
                bp_key: l
            },
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            cache: !1,
            asyncBoolean: !1,
            error: function(e) {
                alert("Request error " + e)
            },
            success: function(e) {
                "" != e && ($("#Betslip").html(e),
                OpenMask(),
                updateMultiTitle(),
                FocusInputBox())
            }
        })
    }
}
function updateMultiTitle() {
    "" == OrgMultiTitle && (OrgMultiTitle = $("#div_menu_multiple").find("a").html());
    var e = $("#divSingleSelectionTicket").find(".BetInfo").length;
    $("#div_menu_multiple").find("a").html(e > 0 ? OrgMultiTitle + "(" + e + ")" : OrgMultiTitle),
    $("input[id$='_SingleStake']").length > 0 ? $("#btnSingleBetPlaceBet").attr("disabled", !1) : $("#btnSingleBetPlaceBet").attr("disabled", !0)
}
function flashDoJob() {
    $.ajax({
        type: "post",
        url: "underover/AddBetTicket.php",
        data: {
            KK: "1"
        },
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        cache: !1,
        asyncBoolean: !1,
        error: function(e) {
            alert("Request error " + e)
        },
        success: function(e) {
            "" != e && ($("#Betslip").html(e),
            OpenMask(),
            FocusInputBox())
        }
    })
}
function RemoveTicketByKey(e) {
    $("#div_Betslip_Mask").show(),
    OpenMask(),
    $.ajax({
        type: "post",
        url: BetslipPath + "RemoveBetTicket.php",
        data: {
            RT: 1,
            Key: e
        },
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        cache: !1,
        asyncBoolean: !1,
        error: function(e) {
            alert("Request error " + e),
            $("#div_Betslip_Mask").hide()
        },
        success: function(e) {
            "" != e && ($("#Betslip").html(e),
            OpenMask(),
            updateMultiTitle(),
            FocusInputBox())
        }
    })
}
function RemoveAllTicket() {
    $("#div_Betslip_Mask").show(),
    OpenMask(),
    $.ajax({
        type: "get",
        url: BetslipPath + "RemoveBetTicket.php",
        data: {
            RT: 2
        },
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        cache: !1,
        asyncBoolean: !1,
        error: function(e) {
            alert("Request error " + e),
            $("#div_Betslip_Mask").hide()
        },
        success: function(e) {
            "" != e && ($("#Betslip").html(e),
            OpenMask(),
            updateMultiTitle())
        }
    })
}
function UpdateEachStake() {
    var e = ""
      , t = "";
    if ($("input[id$='_SingleStake']").each(function() {
        var n = $("#" + this.id.replace("SingleStake", "OrgStake")).val()
          , a = this.value;
        (n = removeCommas(n)) != (a = removeCommas(a)) && (e += this.id + "|",
        t += ("" == a ? "0" : a) + "|")
    }),
    "" != e && "" != t) {
        e = e.substr(0, e.length - 1),
        t = t.substr(0, t.length - 1),
        AjaxUpdateStake(e, t, function(e) {
            0 == e.length ? alert("UpdateEachStake Error !!") : $("input[id$='_OrgStake']").each(function() {
                this.value = removeCommas($("#txtSingleEachWay").val())
            })
        }, function(e) {
            return alert("Request error " + e),
            !1
        }, !1)
    }
}
function UpdateTotalStake(e) {
    var t = 0;
    $("input[id$='_SingleStake']").each(function() {
        var e = $(this).val();
        "" !== e && (e = removeCommas(e),
        t += parseInt(e))
    }),
    $("#txt_TotalStakes").val(t > 0 ? addCommas_euro(t.toString()) : "")
}
function AjaxUpdateStake(e, t, n, a, l) {
    $.ajax({
        type: "post",
        url: BetslipPath + "UpdateBetStake.php",
        data: {
            Key: e,
            Stake: t
        },
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        cache: !1,
        async: l,
        error: a,
        success: n
    })
}
function UpdateSingleBetStake(e, t) {
    var n = $("#" + e.replace("SingleStake", "OrgStake")).val();
    if (n = removeCommas(n),
    t = removeCommas(t),
    "" == n && (n = "0"),
    "" == t && (t = "0"),
    n != t) {
        AjaxUpdateStake(e, t, function(a) {
            a.length > 0 ? $("#" + e.replace("SingleStake", "OrgStake")).val(t) : (alert("UpdateSingleBetStake error !!"),
            $("#" + e).val(addCommas_euro(n)))
        }, function(t) {
            return alert("Request error " + t),
            $("#" + e).val(addCommas_euro(n)),
            !1
        }, !1)
    }
}
function UpdateMixParlayStake(e, t) {
    e = removeCommas(e),
    $.ajax({
        type: "post",
        url: "underover/UpdateBetStake.php",
        data: {
            Stake: e,
            ckKeepOdds: t
        },
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        cache: !1,
        error: function(e) {
            alert("Request error " + e)
        },
        success: function(t) {
            var n = 0;
            $("#txtParlayTotalStake").val(addCommas_euro(e)),
            removeCommas(e) > 0 && $("#MP_Acc_Odds").val() > 0 ? (n = parseFloat(removeCommas(e)) * parseFloat($("#MP_Acc_Odds").val()),
            $("#MP_PayOut").html(addCommas_euro(n.toFixed(2)))) : $("#MP_PayOut").html(0)
        }
    }),
    $("#txtParlayStake").val(addCommas(e))
}
function SwitchBetslipTab(e) {
    $.ajax({
        type: "post",
        url: "underover/UpdateBetslipCurrentTab.php",
        data: {
            CurrentTab: e
        },
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        cache: !1,
        error: function(e) {
            alert("Request error " + e)
        },
        success: function(t) {
            var n = document.getElementById("menu_single")
              , a = document.getElementById("menu_parlay")
              , l = document.getElementById("divSingleTickets")
              , d = document.getElementById("divParlayTickets")
              , o = document.getElementById("SingleNoData")
              , s = document.getElementById("ParlayNoData");
            1 == e ? (n.className = "TabOpen",
            a.className = "TabClose",
            l.display = "",
            d.display = "none",
            null != o ? (o.style.display = "",
            s.style.display = "none") : (l.style.display = "",
            d.style.display = "none")) : 2 == e && (n.className = "TabClose",
            a.className = "TabOpen",
            l.display = "none",
            d.display = "",
            null != s ? (o.style.display = "none",
            s.style.display = "") : (l.style.display = "none",
            d.style.display = ""))
        }
    })
}
function ConfirmGoBack() {
    $.ajax({
        type: "post",
        url: "underover/GetBetslip.php",
        data: {
            BACK: "B"
        },
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        cache: !1,
        error: function(e) {
            alert("Request error " + e)
        },
        success: function(e) {
            "" != e && ($("#Betslip").html(e),
            OpenMask())
        }
    })
}
function OpenMask() {
    var e = document.getElementById("div_Betslip_Mask")
      , t = document.getElementById("divSingleTickets")
      , n = document.getElementById("divParlayTickets")
      , a = document.getElementById("div_Title")
      , l = 0;
    if (e && (t && "" == t.style.display ? l = t.offsetHeight : n && "" == n.style.display && (l = n.offsetHeight),
    "" == e.style.display && a)) {
        e.style.display = "block";
        var d = a.offsetHeight;
        e.style.height = d + l + "px"
    }
}
function CloseMaskAndAlertBox() {
    null != (e = document.getElementById("div_Betslip_Mask")) && (e.style.display = "none");
    var e;
    (e = document.getElementById("div_AlertBox")).style.display = "none",
    FocusInputBox()
}
function SwitchSingleSelections() {
    var e = document.getElementById("divSingleSelections")
      , t = document.getElementById("divSingleSelectionTicket");
    "" == t.style.display ? (t.style.display = "none",
    e.className = "stakeline_close") : (t.style.display = "",
    e.className = "stakeline_open")
}
function SwitchMixParlaySelections() {
    var e = document.getElementById("divParlaySelections")
      , t = document.getElementById("divParlaySelectionTicket");
    "" == t.style.display ? (t.style.display = "none",
    e.className = "stakeline_close") : (t.style.display = "",
    e.className = "stakeline_open")
}
function SwitchMoreInfo(e, t) {
    var n = document.getElementById(e)
      , a = document.getElementById(t);
    "" == n.style.display ? (n.style.display = "none",
    a.className = "infoclose") : (n.style.display = "",
    a.className = "infolink")
}
function BetslipFocus(e) {
    document.getElementById("betslipFocus").value = e
}
function CheckBetslipFocus(e) {
    2 == e ? $("#MixParlayConfirmBet").focus() : $("#SingleBetConfirm").focus()
}
function SwitchBetListMini(e) {
    e ? ReloadWaitingBetList("no", "yes") : ReloadBetListMini("no", "no")
}
function ShowBetListMini() {
    $.ajax({
        type: "post",
        url: "EuroSite/BetslipToBetlist.php",
        data: {},
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        cache: !1,
        error: function(e) {
            alert("Request error " + e)
        },
        success: function(e) {
            "" != e && SwitchBetListType(e)
        }
    })
}
var ASYN_FLAG, fFrame = getParent(window), IsFun88 = !1, IsTLC = !1, IsM88 = !1, IsALog = !1, IsDela = !1, IsSuncity = !1, IsMayfair = !1, IsZzun88 = !1, dobet = !1, confirmMode = "", CombiOddsChange = !1, ShowSuccessBet = !1, bParlayToSingle = !1;
"2" == fFrame.SiteMode && ("2" == fFrame.Deposit_SiteMode ? IsFun88 = !0 : "6" == fFrame.Deposit_SiteMode ? IsTLC = !0 : "3" == fFrame.Deposit_SiteMode ? IsM88 = !0 : "4" == fFrame.Deposit_SiteMode ? IsALog = !0 : "5" == fFrame.Deposit_SiteMode ? IsDela = !0 : "8" == fFrame.Deposit_SiteMode ? IsSuncity = !0 : "9" == fFrame.Deposit_SiteMode ? IsMayfair = !0 : "10" == fFrame.Deposit_SiteMode && (IsZzun88 = !0));
for (var boolchKeepBet = !1, boolchKeepBet_bingo = !1, boolchKeepBet_horse = !1, boolDelParlay = !1, ParlayOddsUPD = !1, retryMenu, refreshMenu, ParlaySportType, TimeoutWaitingBetIndex, TimeoutCountdownIndex, ProcessBetTimeoutHandler, AccountTimeOut, CounterHandle_L, fromCkB = !1, parlayComboStake = new Array(32), i = 0; i < parlayComboStake.length; i++)
    parlayComboStake[i] = "";
var mixparlay_stake = "", parlayMaxBet = 0, betCnt = 0, betThread = null, tmp_obj = null, _ClearOddsChangeAlertTimer, _ClearHROddsChangeAlertTimer, _ClearBPOddsChangeAlertTimer, _ClearParlayOddsChangeAlertTimer, _ClearMessageAlertTimer;
AccountTimeOut = window.setTimeout("ReloadWaitingBetList('yes','no','fromTimer')", 3e4);
var eObj = new encrypt, EnableWorldCup = !1, m_sports, MaxMilliSec = 3e4, oAction = "", IsChangeMenuType = !1, Tmpl_Initialed = !1, ShowMenuFlag = !0, showLiveCasino = !0, arrURL = new Array, ForceMenuData = !1, isParlay = !1, IsFun88 = !1, IsM88 = !1, IsALog = !1, IsTLC = !1, IsDela = !1, IsSuncity = !1, IsMayfair = !1, IsZzun88 = !1, IsOlympicDay = !1, IsEuroCupDay = !1, IsWorldCupDay = !1, SportCount = 56, OpenLiveSportItem = !0, SelectPageSport = "", fFrame = getParent(window), DefaultVSport = 180, DefaultSportOrder = "", TempHTML = "", MenuKey = "";
"2" == fFrame.SiteMode && ("2" == fFrame.Deposit_SiteMode ? IsFun88 = !0 : "3" == fFrame.Deposit_SiteMode ? IsM88 = !0 : "4" == fFrame.Deposit_SiteMode ? IsALog = !0 : "5" == fFrame.Deposit_SiteMode ? IsDela = !0 : "6" == fFrame.Deposit_SiteMode ? IsTLC = !0 : "8" == fFrame.Deposit_SiteMode ? IsSuncity = !0 : "9" == fFrame.Deposit_SiteMode ? IsMayfair = !0 : "4270" != fFrame.SiteId && "4200700" != fFrame.SiteId || (IsZzun88 = !0)),
arrURL["0_P"] = "/SportsMixParlay.php",
arrURL["1_UnderOver"] = "UnderOver.php",
arrURL["1_T"] = "UnderOver.php",
arrURL["1_E"] = "UnderOver.php",
arrURL["1_L"] = "UnderOver.php",
arrURL["1_1X2"] = "/1X2.php",
arrURL["1_CS"] = "/CorrectScore.php",
arrURL["1_HTFT"] = "/HTFT.php",
arrURL["1_HTFTOE"] = "/HTFTOE.php",
arrURL["1_FGLG"] = "/FGLG.php",
arrURL["1_OE"] = "/Oe.php",
arrURL["1_TG"] = "/Tg.php",
arrURL["1_P"] = arrURL["0_P"],
arrURL["1_F"] = "/AllSingleOdds.php",
arrURL["2_NBA"] = "/NBA.php",
arrURL["2_T"] = "/NBA.php",
arrURL["2_E"] = "/NBA.php",
arrURL["2_L"] = "/NBA.php",
arrURL["2_P"] = arrURL["0_P"],
arrURL["3_NBA"] = "/NBA.php",
arrURL["3_E"] = "/NBA.php",
arrURL["3_T"] = "/NBA.php",
arrURL["3_L"] = "/NBA.php",
arrURL["3_P"] = arrURL["0_P"],
arrURL["4_Tennis"] = "/Tennis.php",
arrURL["4_E"] = "/Tennis.php",
arrURL["4_T"] = "/Tennis.php",
arrURL["4_L"] = "/Tennis.php",
arrURL["4_P"] = arrURL["0_P"],
arrURL["5_Tennis"] = arrURL["4_Tennis"],
arrURL["5_T"] = arrURL["4_Tennis"],
arrURL["5_E"] = arrURL["4_Tennis"],
arrURL["5_L"] = arrURL["4_Tennis"],
arrURL["5_P"] = arrURL["0_P"],
arrURL["6_Tennis"] = arrURL["4_Tennis"],
arrURL["6_T"] = arrURL["4_Tennis"],
arrURL["6_E"] = arrURL["4_Tennis"],
arrURL["6_L"] = arrURL["4_Tennis"],
arrURL["6_P"] = arrURL["0_P"],
arrURL["7_Tennis"] = arrURL["4_Tennis"],
arrURL["7_T"] = arrURL["4_Tennis"],
arrURL["7_E"] = arrURL["4_Tennis"],
arrURL["7_L"] = arrURL["4_Tennis"],
arrURL["7_P"] = arrURL["0_P"],
arrURL["8_Baseball"] = "/Baseball.php",
arrURL["8_E"] = "/Baseball.php",
arrURL["8_T"] = "/Baseball.php",
arrURL["8_L"] = "/Baseball.php",
arrURL["8_P"] = arrURL["0_P"],
arrURL["9_Tennis"] = arrURL["4_Tennis"],
arrURL["9_T"] = arrURL["4_Tennis"],
arrURL["9_E"] = arrURL["4_Tennis"],
arrURL["9_L"] = arrURL["4_Tennis"],
arrURL["9_P"] = arrURL["0_P"],
arrURL["10_Tennis"] = arrURL["4_Tennis"],
arrURL["10_T"] = arrURL["4_Tennis"],
arrURL["10_E"] = arrURL["4_Tennis"],
arrURL["10_L"] = arrURL["4_Tennis"],
arrURL["10_P"] = arrURL["0_P"],
arrURL["11_Tennis"] = arrURL["4_Tennis"],
arrURL["11_T"] = arrURL["4_Tennis"],
arrURL["11_E"] = arrURL["4_Tennis"],
arrURL["11_L"] = arrURL["4_Tennis"],
arrURL["11_P"] = arrURL["0_P"],
arrURL["12_Tennis"] = arrURL["4_Tennis"],
arrURL["12_T"] = arrURL["4_Tennis"],
arrURL["12_E"] = arrURL["4_Tennis"],
arrURL["12_L"] = arrURL["4_Tennis"],
arrURL["12_P"] = arrURL["0_P"],
arrURL["13_Tennis"] = arrURL["4_Tennis"],
arrURL["13_T"] = arrURL["4_Tennis"],
arrURL["13_E"] = arrURL["4_Tennis"],
arrURL["13_L"] = arrURL["4_Tennis"],
arrURL["13_P"] = arrURL["0_P"],
arrURL["14_Tennis"] = arrURL["4_Tennis"],
arrURL["14_T"] = arrURL["4_Tennis"],
arrURL["14_E"] = arrURL["4_Tennis"],
arrURL["14_L"] = arrURL["4_Tennis"],
arrURL["14_P"] = arrURL["0_P"],
arrURL["15_Tennis"] = arrURL["4_Tennis"],
arrURL["15_T"] = arrURL["4_Tennis"],
arrURL["15_E"] = arrURL["4_Tennis"],
arrURL["15_L"] = arrURL["4_Tennis"],
arrURL["15_P"] = arrURL["0_P"],
arrURL["16_Tennis"] = arrURL["4_Tennis"],
arrURL["16_T"] = arrURL["4_Tennis"],
arrURL["16_E"] = arrURL["4_Tennis"],
arrURL["16_L"] = arrURL["4_Tennis"],
arrURL["16_P"] = arrURL["0_P"],
arrURL["17_Tennis"] = arrURL["4_Tennis"],
arrURL["17_T"] = arrURL["4_Tennis"],
arrURL["17_E"] = arrURL["4_Tennis"],
arrURL["17_L"] = arrURL["4_Tennis"],
arrURL["17_P"] = arrURL["0_P"],
arrURL["18_Tennis"] = arrURL["4_Tennis"],
arrURL["18_T"] = arrURL["4_Tennis"],
arrURL["18_E"] = arrURL["4_Tennis"],
arrURL["18_L"] = arrURL["4_Tennis"],
arrURL["18_P"] = arrURL["0_P"],
arrURL["19_Tennis"] = arrURL["4_Tennis"],
arrURL["19_T"] = arrURL["4_Tennis"],
arrURL["19_E"] = arrURL["4_Tennis"],
arrURL["19_L"] = arrURL["4_Tennis"],
arrURL["19_P"] = arrURL["0_P"],
arrURL["20_Tennis"] = arrURL["4_Tennis"],
arrURL["20_T"] = arrURL["4_Tennis"],
arrURL["20_E"] = arrURL["4_Tennis"],
arrURL["20_L"] = arrURL["4_Tennis"],
arrURL["20_P"] = arrURL["0_P"],
arrURL["21_Tennis"] = arrURL["4_Tennis"],
arrURL["21_T"] = arrURL["4_Tennis"],
arrURL["21_E"] = arrURL["4_Tennis"],
arrURL["21_L"] = arrURL["4_Tennis"],
arrURL["21_P"] = arrURL["0_P"],
arrURL["22_Tennis"] = arrURL["4_Tennis"],
arrURL["22_T"] = arrURL["4_Tennis"],
arrURL["22_E"] = arrURL["4_Tennis"],
arrURL["22_L"] = arrURL["4_Tennis"],
arrURL["22_P"] = arrURL["0_P"],
arrURL["23_Tennis"] = arrURL["4_Tennis"],
arrURL["23_T"] = arrURL["4_Tennis"],
arrURL["23_E"] = arrURL["4_Tennis"],
arrURL["23_L"] = arrURL["4_Tennis"],
arrURL["23_P"] = arrURL["0_P"],
arrURL["24_Tennis"] = arrURL["4_Tennis"],
arrURL["24_T"] = arrURL["4_Tennis"],
arrURL["24_E"] = arrURL["4_Tennis"],
arrURL["24_L"] = arrURL["4_Tennis"],
arrURL["24_P"] = arrURL["0_P"],
arrURL["25_Tennis"] = arrURL["4_Tennis"],
arrURL["25_T"] = arrURL["4_Tennis"],
arrURL["25_E"] = arrURL["4_Tennis"],
arrURL["25_L"] = arrURL["4_Tennis"],
arrURL["25_P"] = arrURL["0_P"],
arrURL["26_NBA"] = arrURL["3_NBA"],
arrURL["26_T"] = arrURL["3_NBA"],
arrURL["26_E"] = arrURL["3_NBA"],
arrURL["26_L"] = arrURL["3_NBA"],
arrURL["26_P"] = arrURL["0_P"],
arrURL["27_Cricket"] = "/Cricket.php",
arrURL["27_T"] = arrURL["27_Cricket"],
arrURL["27_E"] = arrURL["27_Cricket"],
arrURL["27_L"] = arrURL["27_Cricket"],
arrURL["27_P"] = arrURL["0_P"],
arrURL["28_Tennis"] = arrURL["4_Tennis"],
arrURL["28_T"] = arrURL["4_Tennis"],
arrURL["28_E"] = arrURL["4_Tennis"],
arrURL["28_L"] = arrURL["4_Tennis"],
arrURL["28_P"] = arrURL["0_P"],
arrURL["29_T"] = arrURL["4_Tennis"],
arrURL["29_E"] = arrURL["4_Tennis"],
arrURL["29_L"] = arrURL["4_Tennis"],
arrURL["29_P"] = arrURL["0_P"],
arrURL["30_T"] = arrURL["4_Tennis"],
arrURL["30_E"] = arrURL["4_Tennis"],
arrURL["30_L"] = arrURL["4_Tennis"],
arrURL["30_P"] = arrURL["0_P"],
arrURL["31_Tennis"] = arrURL["4_Tennis"],
arrURL["31_T"] = arrURL["4_Tennis"],
arrURL["31_E"] = arrURL["4_Tennis"],
arrURL["31_L"] = arrURL["4_Tennis"],
arrURL["31_P"] = arrURL["0_P"],
arrURL["32_NBA"] = arrURL["3_NBA"],
arrURL["32_T"] = arrURL["3_NBA"],
arrURL["32_E"] = arrURL["3_NBA"],
arrURL["32_L"] = arrURL["3_NBA"],
arrURL["32_P"] = arrURL["0_P"],
arrURL["33_Tennis"] = arrURL["4_Tennis"],
arrURL["33_T"] = arrURL["4_Tennis"],
arrURL["33_E"] = arrURL["4_Tennis"],
arrURL["33_L"] = arrURL["4_Tennis"],
arrURL["33_P"] = arrURL["0_P"],
arrURL["34_Tennis"] = arrURL["4_Tennis"],
arrURL["34_T"] = arrURL["4_Tennis"],
arrURL["34_E"] = arrURL["4_Tennis"],
arrURL["34_L"] = arrURL["4_Tennis"],
arrURL["34_P"] = arrURL["0_P"],
arrURL["35_Tennis"] = arrURL["4_Tennis"],
arrURL["35_T"] = arrURL["4_Tennis"],
arrURL["35_E"] = arrURL["4_Tennis"],
arrURL["35_L"] = arrURL["4_Tennis"],
arrURL["35_P"] = arrURL["0_P"],
arrURL["36_Tennis"] = arrURL["4_Tennis"],
arrURL["36_T"] = arrURL["4_Tennis"],
arrURL["36_E"] = arrURL["4_Tennis"],
arrURL["36_L"] = arrURL["4_Tennis"],
arrURL["36_P"] = arrURL["0_P"],
arrURL["37_Tennis"] = arrURL["4_Tennis"],
arrURL["37_T"] = arrURL["4_Tennis"],
arrURL["37_E"] = arrURL["4_Tennis"],
arrURL["37_L"] = arrURL["4_Tennis"],
arrURL["37_P"] = arrURL["0_P"],
arrURL["38_Tennis"] = arrURL["4_Tennis"],
arrURL["38_T"] = arrURL["4_Tennis"],
arrURL["38_E"] = arrURL["4_Tennis"],
arrURL["38_L"] = arrURL["4_Tennis"],
arrURL["38_P"] = arrURL["0_P"],
arrURL["39_Tennis"] = arrURL["4_Tennis"],
arrURL["39_T"] = arrURL["4_Tennis"],
arrURL["39_E"] = arrURL["4_Tennis"],
arrURL["39_L"] = arrURL["4_Tennis"],
arrURL["39_P"] = arrURL["0_P"],
arrURL["40_Tennis"] = arrURL["4_Tennis"],
arrURL["40_T"] = arrURL["4_Tennis"],
arrURL["40_E"] = arrURL["4_Tennis"],
arrURL["40_L"] = arrURL["4_Tennis"],
arrURL["40_P"] = arrURL["0_P"],
arrURL["41_Tennis"] = arrURL["4_Tennis"],
arrURL["41_T"] = arrURL["4_Tennis"],
arrURL["41_E"] = arrURL["4_Tennis"],
arrURL["41_L"] = arrURL["4_Tennis"],
arrURL["41_P"] = arrURL["0_P"],
arrURL["42_Tennis"] = arrURL["4_Tennis"],
arrURL["42_T"] = arrURL["4_Tennis"],
arrURL["42_E"] = arrURL["4_Tennis"],
arrURL["42_L"] = arrURL["4_Tennis"],
arrURL["42_P"] = arrURL["0_P"],
arrURL["43_ESports"] = "/ESports.php",
arrURL["43_T"] = arrURL["43_ESports"],
arrURL["43_E"] = arrURL["43_ESports"],
arrURL["43_L"] = arrURL["43_ESports"],
arrURL["43_P"] = arrURL["0_P"],
arrURL["44_Tennis"] = arrURL["4_Tennis"],
arrURL["44_T"] = arrURL["4_Tennis"],
arrURL["44_E"] = arrURL["4_Tennis"],
arrURL["44_L"] = arrURL["4_Tennis"],
arrURL["44_P"] = arrURL["0_P"],
arrURL["47_T"] = arrURL["4_Tennis"],
arrURL["47_E"] = arrURL["4_Tennis"],
arrURL["47_L"] = arrURL["4_Tennis"],
arrURL["47_P"] = arrURL["0_P"],
arrURL["48_T"] = arrURL["4_Tennis"],
arrURL["48_E"] = arrURL["4_Tennis"],
arrURL["48_L"] = arrURL["4_Tennis"],
arrURL["48_P"] = arrURL["0_P"],
arrURL["49_T"] = arrURL["4_Tennis"],
arrURL["49_E"] = arrURL["4_Tennis"],
arrURL["49_L"] = arrURL["4_Tennis"],
arrURL["49_P"] = arrURL["0_P"],
arrURL["50_Tennis"] = arrURL["4_Tennis"],
arrURL["50_T"] = arrURL["4_Tennis"],
arrURL["50_E"] = arrURL["4_Tennis"],
arrURL["50_L"] = arrURL["4_Tennis"],
arrURL["50_P"] = arrURL["0_P"],
arrURL["51_T"] = arrURL["4_Tennis"],
arrURL["51_E"] = arrURL["4_Tennis"],
arrURL["51_L"] = arrURL["4_Tennis"],
arrURL["51_P"] = arrURL["0_P"],
arrURL["52_T"] = arrURL["4_Tennis"],
arrURL["52_E"] = arrURL["4_Tennis"],
arrURL["52_L"] = arrURL["4_Tennis"],
arrURL["52_P"] = arrURL["0_P"],
arrURL["53_T"] = arrURL["4_Tennis"],
arrURL["53_E"] = arrURL["4_Tennis"],
arrURL["53_L"] = arrURL["4_Tennis"],
arrURL["53_P"] = arrURL["0_P"],
arrURL["54_T"] = arrURL["4_Tennis"],
arrURL["54_E"] = arrURL["4_Tennis"],
arrURL["54_L"] = arrURL["4_Tennis"],
arrURL["54_P"] = arrURL["0_P"],
arrURL["55_T"] = arrURL["4_Tennis"],
arrURL["55_E"] = arrURL["4_Tennis"],
arrURL["55_L"] = arrURL["4_Tennis"],
arrURL["55_P"] = arrURL["0_P"],
arrURL["56_T"] = arrURL["2_NBA"],
arrURL["56_E"] = arrURL["2_NBA"],
arrURL["56_L"] = arrURL["2_NBA"],
arrURL["56_P"] = arrURL["0_P"],
arrURL["99_Tennis"] = arrURL["4_Tennis"],
arrURL["99_T"] = arrURL["4_Tennis"],
arrURL["99_E"] = arrURL["4_Tennis"],
arrURL["99_L"] = arrURL["4_Tennis"],
arrURL["99_P"] = arrURL["0_P"],
arrURL["151_T"] = "/Racing.php",
arrURL["151_E"] = arrURL["151_T"],
arrURL["152_T"] = arrURL["151_T"],
arrURL["152_E"] = arrURL["151_T"],
arrURL["153_T"] = arrURL["151_T"],
arrURL["153_E"] = arrURL["151_T"],
arrURL["154_T"] = "/Tennis.php",
arrURL["154_E"] = arrURL["151_T"],
arrURL["160_T"] = "/Bingo.php",
arrURL["160_E"] = "/Bingo.php",
arrURL["161_T"] = "/Bingo.php",
arrURL["180_T"] = "/VirtualSports.php",
arrURL["180_E"] = "/VirtualSports.php",
arrURL["181_T"] = "/VirtualHorse.php",
arrURL["181_E"] = "/VirtualHorse.php",
arrURL["182_T"] = "/VirtualHorse.php",
arrURL["182_E"] = "/VirtualHorse.php",
arrURL["183_T"] = "/VirtualHorse.php",
arrURL["183_E"] = "/VirtualHorse.php",
arrURL["184_T"] = "/VirtualHorse.php",
arrURL["184_E"] = "/VirtualHorse.php",
arrURL["185_T"] = "/VirtualHorse.php",
arrURL["185_E"] = "/VirtualHorse.php",
arrURL["186_T"] = "/VirtualSports.php",
arrURL["186_E"] = "/VirtualSports.php",
arrURL["190_T"] = "/BetRadarVirtualSport.php",
arrURL["191_T"] = "/BetRadarVirtualSport.php",
arrURL["192_T"] = "/BetRadarVirtualSport.php",
arrURL["193_T"] = "/BetRadarVirtualSport.php",
arrURL["194_T"] = "/BetRadarVirtualSport.php",
arrURL[201] = "/Financials.php",
arrURL["252_T"] = "/Tennis2.php",
arrURL["252_E"] = arrURL["151_T"],
arrURL["0_OT"] = "/Outright.php",
arrURL["0_E"] = arrURL["0_OT"],
arrURL["0_T"] = arrURL["0_OT"];
var SportRadarIdx = 1, HorseInfoPopWindow, HorseInfoUrl, submit = 0, fFrame = getParent(window), isVRace = !1, g_BetProcesCurrMatchid = null, Base64Binary = {
    _keyStr: "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",
    decodeArrayBuffer: function(e) {
        var t = e.length / 4 * 3
          , n = new ArrayBuffer(t);
        return this.decode(e, n),
        n
    },
    decode: function(e, t) {
        var n = this._keyStr.indexOf(e.charAt(e.length - 1))
          , a = this._keyStr.indexOf(e.charAt(e.length - 2))
          , l = e.length / 4 * 3;
        64 == n && l--,
        64 == a && l--;
        var d, o, s, m, r, i, u, c = 0, y = 0;
        for (d = t ? new Uint8Array(t) : new Uint8Array(l),
        e = e.replace(/[^A-Za-z0-9\+\/\=]/g, ""),
        c = 0; c < l; c += 3)
            o = this._keyStr.indexOf(e.charAt(y++)) << 2 | (r = this._keyStr.indexOf(e.charAt(y++))) >> 4,
            s = (15 & r) << 4 | (i = this._keyStr.indexOf(e.charAt(y++))) >> 2,
            m = (3 & i) << 6 | (u = this._keyStr.indexOf(e.charAt(y++))),
            d[c] = o,
            64 != i && (d[c + 1] = s),
            64 != u && (d[c + 2] = m);
        return d
    }
}, submit = 0, fFrame = getParent(window), submit = 0, tmpvalue = "", Using1x2AsiaHdp = !0, fFrame = getParent(window), submit = 0, fFrame = getParent(window), submit = 0, fFrame = getParent(window), BetslipPath = "underover/", IsEuro = !0, OrgMultiTitle = "";


function _setDefaultOddsType(){
  var  $odds = (fFrame.OddsType=='4'||fFrame.OddsType=='2'||fFrame.OddsType=='1') ? fFrame.OddsType : '4';

  fFrame.rightx.document.DataForm_L.OddsType.value = $odds;
  fFrame.rightx.document.DataForm_D.OddsType.value = $odds;
  document.fomBetProcess_Data.OddsType.value = $odds;
  document.fomBetProcess_Data_OT.OddsType.value = $odds;
  document.fomBetProcessPhone_Data.OddsType.value = $odds;
  document.fomBetProcess_Data_OTP.OddsType.value = $odds;
  document.Bingo_fomBetProcess_Data.OddsType.value = $odds;
  document.ParlayBetForm.OddsType.value = $odds;

  var li = fFrame.rightx.document.getElementsByClassName('oddsLI-'+$odds);
  fFrame.rightx.setSelecter('selOddsType', li, $odds, true);
  fFrame.rightx.changeOddsType($odds);
}