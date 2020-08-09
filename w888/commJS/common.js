function getParent(e) {
    for (var t = e, n = 0; n < 4; n++) {
        if (null != t.SiteMode)
            return t;
        t = t.parent
    }
    return null
}
function indexOf(e, t) {
    for (var n = 0; n < e.length; n++)
        if (e[n] == t)
            return n;
    return -1
}
function addCommas(e) {
    for (var t = new RegExp("(-?[0-9]+)([0-9]{3})"); t.test(e); )
        e = e.replace(t, "$1,$2");
    return e
}
function removeCommas(e) {
    return e.replace(/,/g, "")
}
function trim(e) {
    var t = /^(\s*)$/;
    return t.test(e) && 0 == (e = e.replace(t, "")).length ? e : ((t = /^(\s*)([\W\w]*)(\b\s*$)/).test(e) && (e = e.replace(t, "$2")),
    e)
}
function validateOnKD(e, t) {
    var n = document.all ? t.keyCode : t.which;
    return 86 != n && 27 != n
}
function validateOnKP(e, t, n, a) {
    var o = document.all ? t.keyCode : t.which;
    if (null == n && (n = 0,
    document.selection)) {
        e.focus();
        var r = document.selection.createRange();
        if (null != r) {
            var i = e.createTextRange()
              , l = i.duplicate();
            i.moveToBookmark(r.getBookmark()),
            l.setEndPoint("EndToStart", i),
            n = l.text.length
        }
    }
    return !(e.value.length > 0 && 0 == n && 48 == o) && (13 == o ? null != a ? (a(t),
    !1) : ("Bingo_BPstake" == e.id ? betSubmitBingo(t) : betSubmit(t),
    !1) : (!/^$/.test(removeCommas(e.value)) || !/0/.test(String.fromCharCode(o))) && (!/[^0-9]/.test(String.fromCharCode(o)) || 8 == o || 0 == o))
}
function validateOnKPPhone(e, t, n) {
    var a = document.all ? t.keyCode : t.which;
    return !(13 != a && 8 != a && 45 != a || "stakeField" != n && "scoreField" != n) || (!(13 != a && 8 != a && 46 != a && 45 != a && 39 != a && 37 != a || "oddsField" != n && "hdpField" != n) || !/[^0-9]/.test(String.fromCharCode(a)))
}
function payOutOnKU(fld, e) {
    fld.value = addCommas(removeCommas(fld.value));
    var s = fld.value;
    s = removeCommas(s);
    for (var z = "0123456789", i = 0; i < s.length; i++)
        tmp = s.substr(i, 1),
        -1 == z.indexOf(tmp) && (fld.value = "");
    if (/^$/.test(removeCommas(fld.value)))
        "1" == fFrame.siteMode ? document.getElementById("payOut_P").innerHTML = "" : "HorseBPstake" == fld.id ? (document.getElementById("VRPayout").innerHTML = "",
        document.getElementById("VRMaxPayout").innerHTML = "") : "Bingo_BPstake" == fld.id ? document.getElementById("Bingo_payOut").innerHTML = "" : document.getElementById("payOut").innerHTML = "";
    else {
        var bodds, bettype, sitetype, oddstype, bingobettype, bingooddstype;
        if ("1" == fFrame.SiteMode)
            switch (bettype = document.getElementById("bettype_P").value,
            sitetype = document.getElementById("siteType_P").value,
            oddstype = document.getElementById("oddsType_P").value,
            bettype) {
            case "1":
            case "7":
            case "28":
                bodds = document.getElementById("bp_odds3").value;
                break;
            case "3":
            case "8":
                bodds = document.getElementById("bp_odds2").value;
                break;
            default:
                bodds = document.getElementById("bp_odds1").value
            }
        else if ("HorseBPstake" == fld.id) {
            if (parseInt(fFrame.LastSelectedSport, 10) >= 181 && parseInt(fFrame.LastSelectedSport, 10) <= 185) {
                var oddsStr = document.getElementById("VRaceOddsDisp2").innerHTML.replace("/", "+")
                  , oddsValue = eval(oddsStr);
                document.getElementById("VRPayout").innerHTML = payOutCalculate(oddsValue, removeCommas(fld.value), !1),
                document.getElementById("VRMaxPayout").innerHTML = payOutCalculate(oddsValue, removeCommas(fld.value) / 2, !1)
            }
        } else
            "Bingo_BPstake" == fld.id ? (bettype = "",
            sitetype = "",
            oddstype = "",
            bingobettype = document.getElementById("Bingo_bettype").value,
            bingooddstype = document.getElementById("Bingo_oddsType").value) : (bettype = document.getElementById("bettype").value,
            sitetype = document.getElementById("siteType").value,
            oddstype = document.getElementById("oddsType").value,
            bingobettype = "",
            bingooddstype = "");
            console.log(oddstype);
        if (-1 != indexOf(pairArray, bettype) && "1" != oddstype)
            "5" == oddstype ? document.getElementById("payOut").innerHTML = payOutCalculate(parseInt(removeCommas(document.getElementById("bodds").innerHTML), 10) / 100, removeCommas(fld.value), !0) : "1" == fFrame.SiteMode ? document.getElementById("payOut_P").innerHTML = payOutCalculate(removeCommas(bodds), removeCommas(fld.value), !0) : document.getElementById("payOut").innerHTML = payOutCalculate(removeCommas(document.getElementById("bodds").innerHTML), removeCommas(fld.value), !0);
        else if (-1 != indexOf(MMRArray, bettype))
            document.getElementById("payOut").innerHTML = payOutCalculate(removeCommas(document.getElementById("bodds").innerHTML), removeCommas(fld.value), !0);
        else {
            var bingoArray = ["81", "82", "83", "84", "85", "86", "87", "88", "89", "90", "8101", "8102", "8103", "8104", "8105"]
              , bingoArrayMY = ["81", "82", "83", "84", "85", "86", "87", "88", "8101", "8102", "8104"];
            -1 != indexOf(bingoArray, bingobettype) ? document.getElementById("Bingo_payOut").innerHTML = 1 != bingooddstype ? "5" == bingooddstype ? payOutCalculate(parseInt(removeCommas(document.getElementById("Bingo_bodds").innerHTML), 10) / 100, removeCommas(fld.value), !0) : payOutCalculate(removeCommas(document.getElementById("Bingo_bodds").innerHTML), removeCommas(fld.value), -1 != indexOf(bingoArrayMY, bingobettype)) : payOutCalculate(removeCommas(document.getElementById("Bingo_bodds").innerHTML), removeCommas(fld.value), !1) : "1" == fFrame.SiteMode ? document.getElementById("payOut_P").innerHTML = payOutCalculate(removeCommas(bodds), removeCommas(fld.value), !1) : document.getElementById("payOut").innerHTML = payOutCalculate(removeCommas(document.getElementById("bodds").innerHTML), removeCommas(fld.value), !1)
        }
    }
}
function MinMaxBetAlertHandle(e, t) {
    var n = ""
      , a = ""
      , o = ""
      , r = "";
    "Horse" == e ? (n = "hrspMinBetValue",
    a = "hrspMaxBetValue",
    o = $("#HRBPMinMaxBetAlert"),
    r = $("#HRBPMinMaxBetAlert div")) : "Bingo" == e ? (n = "Bingo_spMinBetValue",
    a = "Bingo_spMaxBetValue",
    o = $("#Bingo_BPMinMaxBetAlert"),
    r = $("#Bingo_BPMinMaxBetAlert div")) : (n = "spMinBetValue",
    a = "spMaxBetValue",
    o = $("#BPMinMaxBetAlert"),
    r = $("#BPMinMaxBetAlert div"));
    var i = parseInt(removeCommas(t), 10)
      , l = parseInt(removeCommas(document.getElementById(n).innerHTML), 10)
      , s = parseInt(removeCommas(document.getElementById(a).innerHTML), 10);
    return i < l ? (r.html(RES_lowermin),
    void o.css("display", "block")) : i > s ? (r.html(RES_highermax),
    void o.css("display", "block")) : (r.html(""),
    void o.css("display", "none"))
}
function betSubmit(e) {
    var t = !1;
    if ("click" == e)
        t = !0;
    else {
        13 == (document.all ? e.keyCode : e.which) && (t = !0)
    }
    return !t || (null != fFrame ? "1" == fFrame.SiteMode ? formvalidationP("fomConfirmBetPhone") : formvalidation("fomConfirmBet") : void 0)
}
function betSubmitMP(e) {
    var t = !1;
    if ("click" == e)
        t = !0;
    else {
        13 == (document.all ? e.keyCode : e.which) && (t = !0)
    }
    return !t || MPformvalidation("betform")
}
function betSubmitBingo(e) {
    var t = !1;
    if ("click" == e)
        t = !0;
    else {
        13 == (document.all ? e.keyCode : e.which) && (t = !0)
    }
    return !t || Bingoformvalidation("fomBingoConfirmBet")
}
function payOutOnKUOT(e, t) {
    e.value = addCommas(removeCommas(e.value)),
    /^$/.test(removeCommas(e.value)) ? "1" == fFrame.SiteMode ? document.getElementById("payOut_P").innerHTML = "" : document.getElementById("payOut").innerHTML = "" : "1" == fFrame.SiteMode ? document.getElementById("payOut_P").innerHTML = payOutCalculate(removeCommas(document.getElementById("odds").value), removeCommas(e.value), !1) : document.getElementById("payOut").innerHTML = payOutCalculate(removeCommas(document.getElementById("bodds").innerHTML), removeCommas(e.value), !1)
}
function payOutOnKUPhone(e, t) {
    e.value = addCommas(removeCommas(e.value)),
    /^$/.test(removeCommas(e.value)) ? document.getElementById("payOut").innerHTML = "" : 1 != document.getElementById("bettype").value && 2 != document.getElementById("bettype").value && 3 != document.getElementById("bettype").value && 7 != document.getElementById("bettype").value && 8 != document.getElementById("bettype").value && 20 != document.getElementById("bettype").value || "DECIMAL" == document.getElementById("siteType").value || "DECIADD" == document.getElementById("siteType").value ? document.getElementById("payOut").innerHTML = payOutCalculate(removeCommas(document.getElementById("odds").innerHTML), removeCommas(e.value), !1) : document.getElementById("payOut").innerHTML = payOutCalculate(removeCommas(document.getElementById("odds").innerHTML), removeCommas(e.value), !0)
}
function payOutCalculate(e, t, n) {
    return addCommas(n ? (t * (1 + Math.abs(e))).toFixed(2) : (t * Math.abs(e)).toFixed(2))
}
function checkValue(e, t, n) {
    for (var a = "", o = 0; o < e.value.length && "." != e.value.charAt(o); o++)
        "," != e.value.charAt(o) && -1 != "0123456789".indexOf(e.value.charAt(o)) && (a += e.value.charAt(o));
    var r = addCommas(a);
    if (e.value = r,
    null != t && "" != t && null != n && "" != n) {
        var i, l = document.getElementById(t), s = document.getElementById(n);
        if (i = "INPUT" == l.tagName ? l.value : l.innerHTML,
        isNaN(i) || isNaN(a))
            "INPUT" == s.tagName ? s.value = "" : s.innerHTML = "";
        else {
            var d = parseFloat(i) * parseFloat(a)
              , m = String(d.toFixed(2)).split(".")
              , u = addCommas(m[0]) + "." + m[1];
            isNaN(d) ? "INPUT" == s.tagName ? s.value = "" : s.innerHTML = "" : "INPUT" == s.tagName ? s.value = u : s.innerHTML = u
        }
    }
}
function checkKeyPress(e, t, n) {
    var a = document.all ? t.keyCode : t.which;
    if (e.value.length > 0 && 0 == n && 48 == a)
        return !1;
    if (9 == a || 0 == a)
        return !0;
    var o = document.all ? t.keyCode : t.which;
    return 13 == o || 8 == o ? betSubmitMP(t) : (key = parseInt(String.fromCharCode(o), 10),
    -1 != "0123456789".indexOf(key) && (0 != e.value.length || "0" != key))
}
function emailCheck(e) {
    var t = '[^\\s\\(\\)<>@,;:\\\\\\"\\.\\[\\]]+'
      , n = "(" + t + '|("[^"]*"))'
      , a = new RegExp("^" + n + "(\\." + n + ")*$")
      , o = new RegExp("^" + t + "(\\." + t + ")*$")
      , r = e.match(/^(.+)@(.+)$/);
    if (null == r)
        return !1;
    var i = r[1]
      , l = r[2];
    if (null == i.match(a))
        return !1;
    var s = l.match(/^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})\]$/);
    if (null != s) {
        for (var d = 1; d <= 4; d++)
            if (s[d] > 255)
                return !1;
        return !0
    }
    if (null == l.match(o))
        return alert("The domain name doesn't seem to be valid."),
        !1;
    var m = new RegExp(t,"g")
      , u = l.match(m)
      , c = u.length;
    if (u[u.length - 1].length < 2 || u[u.length - 1].length > 4)
        return !1;
    if (c < 2) {
        return !1
    }
    return !0
}
function gotoSportsBookPage() {
    if (null != parent.top.LastSelectedMenu && (parent.top.LastSelectedMenu = 0,
    parent.top.LastSelectedSport = -1,
    parent.top.LastSelectedMArket = "T"),
    parent.leftx.document.getElementById("div_BetListMini").style.display = "none",
    parent.leftx.openMenu("en"),
    parent.leftx.LoadMenuData("T", !0),
    parent.leftx.SetLastSelectedSport("T", !1),
    "i" == fFrame.userSite)
        try {
            parent.rightx.setMatch("", 0)
        } catch (e) {}
}
function OpenHappyGameresresult(e) {
    parent.topx.OpenListPage("ResultFrame.php?sportType=164&mode=sport", 680, 810)
}
function OpenNumberGameresresult(e) {
    switch (e) {
    case "NaN":
    case "":
        parent.topx.OpenListPage("ResultFrame.php?sportType=161&mode=league", 680, 810);
        break;
    default:
        parent.topx.OpenListPage("ResultFrame.php?sportType=161&mode=league&SelectLeague=" + e, 680, 810)
    }
}
function OpenHappy5result() {
    parent.topx.OpenListPage("ResultFrame.php?sportType=164&mode=sport", 680, 810)
}
function SunPlus_Marquee() {
    function e() {
        var n;
        n = t.DivElm.style,
        t.marquee_mouse && t.marquee_flag && (n.left = parseInt(n.left, 10) - t.scroll_speed,
        parseInt(n.left, 10) <= -t.DivElm.offsetWidth && (n.left = t.scrollerwidth)),
        window.setTimeout(e, 100)
    }
    var t = this;
    this.marquee_mouse = 1,
    this.scroll_speed = 1,
    this.marquee_flag = !0,
    this.scrollerwidth = 500,
    this.DivElm = null,
    this.Mymarquee_scroll = function() {
        e()
    }
}
function isNum(e) {
    for (numtype = "0123456789",
    i = 0; i < e.length; i++)
        if (numtype.indexOf(e.substring(i, i + 1)) < 0)
            return !1;
    return !0
}
function check_email(e) {
    var t = e.length;
    if (0 == t)
        return !1;
    for (var n = 0; n < t; n++) {
        var a = e.charAt(n);
        if (!(a >= "A" && a <= "Z" || a >= "a" && a <= "z" || a >= "0" && a <= "9" || "-" == a || "_" == a || "." == a || "@" == a))
            return !1
    }
    if (-1 == e.indexOf("@") || 0 == e.indexOf("@") || e.indexOf("@") == t - 1)
        return !1;
    if (-1 != e.indexOf("@") && -1 != e.substring(e.indexOf("@") + 1, t).indexOf("@"))
        return !1;
    if (-1 == e.indexOf(".") || 0 == e.indexOf(".") || e.lastIndexOf(".") == t - 1)
        return !1;
    var o, r;
    t = e.length;
    for (var i = (o = e.substring(e.indexOf("@") + 1, t)).indexOf("."); i > 0; ) {
        if (r = o.substring(0, o.indexOf(".")),
        (t = r.length) < 2)
            return !1;
        t = o.length,
        i = (o = o.substring(o.indexOf(".") + 1, t)).indexOf(".")
    }
    return !((t = o.length) < 2 || isNum(o) || e.indexOf("@.") >= 0)
}
function replaceSubstring(e, t, n) {
    var a = e;
    if ("" == t)
        return e;
    if (-1 == n.indexOf(t))
        for (; -1 != a.indexOf(t); ) {
            a = a.substring(0, a.indexOf(t)) + n + a.substring(a.indexOf(t) + t.length, a.length)
        }
    else {
        for (var o = new Array("~","`","_","^","#"), r = ""; "" == r; )
            for (var i = 0; i < o.length; i++) {
                for (var l = "", s = 0; s < 1; s++)
                    l += o[i];
                -1 == t.indexOf(l) && (r = l,
                i = o.length + 1)
            }
        for (; -1 != a.indexOf(t); ) {
            a = a.substring(0, a.indexOf(t)) + r + a.substring(a.indexOf(t) + t.length, a.length)
        }
        for (; -1 != a.indexOf(r); ) {
            a = a.substring(0, a.indexOf(r)) + n + a.substring(a.indexOf(r) + r.length, a.length)
        }
    }
    return a
}
function currencyFormat(e, t, n, a) {
    var o = ""
      , r = j = 0
      , i = len2 = 0
      , l = aux2 = ""
      , s = document.all ? a.keyCode : a.which;
    if (8 == s && (e.value = ""),
    13 == s)
        return !0;
    if (o = parseInt(String.fromCharCode(s), 10),
    -1 == "0123456789".indexOf(o))
        return !1;
    for (i = e.value.length,
    r = 0; r < i && ("0" == e.value.charAt(r) || e.value.charAt(r) == n); r++)
        ;
    for (l = ""; r < i; r++)
        -1 != "0123456789".indexOf(e.value.charAt(r)) && (l += e.value.charAt(r));
    if (l += o,
    0 == (i = l.length) && (e.value = ""),
    i > 0) {
        for (aux2 = "",
        j = 0,
        r = i - 1; r >= 0; r--)
            3 == j && (aux2 += t,
            j = 0),
            aux2 += l.charAt(r),
            j++;
        for (e.value = "",
        len2 = aux2.length,
        r = len2 - 0; r >= 0; r--)
            e.value += aux2.charAt(r);
        e.value += l.substr(i, i)
    }
    return !1
}
function countPayOut() {
    var e = trim(removeCommas(document.getElementById("OTStake").value))
      , t = trim(removeCommas(document.getElementById("ot_spOddsValue").innerHTML));
    0 != e.length && 0 != t.length ? document.getElementById("OTpayOut").innerHTML = addCommas((e * t).toFixed(2)) : document.getElementById("OTpayOut").innerHTML = ""
}
function onKeyDownFunc(e, t) {
    if (9 == (document.all ? t.keyCode : t.which)) {
        var n = document.getElementById(e);
        null != n && (n.focus(),
        n.select())
    }
}
function WordToHex(e) {
    var t, n = "", a = "";
    for (t = 0; t <= 3; t++)
        n += (a = "0" + (e >>> 8 * t & 255).toString(16)).substr(a.length - 2, 2);
    return n
}
function userBrowser() {
    var e = navigator.userAgent.toLowerCase();
    return /msie/i.test(e) && !/opera/.test(e) || navigator.userAgent.match(/Trident\/7\./) ? "IE" : /firefox/i.test(e) ? "Firefox" : /chrome/i.test(e) && /webkit/i.test(e) && /mozilla/i.test(e) ? "Chrome" : /opera/i.test(e) ? "Opera" : !/webkit/i.test(e) || /chrome/i.test(e) && /webkit/i.test(e) && /mozilla/i.test(e) ? "unKnow" : "Safari"
}
function SwitchDispHidden(e) {
    "none" == (e = document.getElementById(e)).style.display ? e.style.display = "" : e.style.display = "none"
}
function SetHideDisStyleOptionList(e) {
    null == OptionListObj_DisStyle && (OptionListObj_DisStyle = new DivOption(document.getElementById("disstyle"),3)),
    OptionListObj_DisStyle.act(e, null, null)
}
function SetHideOddsTypeOptionList(e) {
    null == OptionListObj_OddsType && (OptionListObj_OddsType = new DivOption(document.getElementById("selOddsType"),3)),
    OptionListObj_OddsType.act(e, null, null)
}
function SetHideSecurityQOptionList(e) {
    null == OptionListObj_OddsType && (OptionListObj_OddsType = new DivOption(document.getElementById("selSecurityQ"),3)),
    OptionListObj_OddsType.act(e, null, null)
}
function SetHideOptionList(e) {
    null == OptionListObj_Other && (OptionListObj_Other = new DivOption(document.getElementById("selSecurityQ"),3)),
    OptionListObj_Other.act(e, null, null)
}
function SetHideLoginWindow(e) {
    null == LoginObj && (LoginObj = new DivPop(document.getElementById("loginact"),3)),
    LoginObj.act(e, null, null)
}
function SetHideBetWindow(e) {
    null != document.getElementById("BankingAct") && (document.getElementById("BankingAct").style.display = "none");
    null == BettingObj && (BettingObj = new DivPop(document.getElementById("BettingAct"),3)),
    BettingObj.act(e, null, null)
}
function SetHideBankingWindow(e) {
    null != document.getElementById("BettingAct") && (document.getElementById("BettingAct").style.display = "none");
    null == BankingObj && (BankingObj = new DivPop(document.getElementById("BankingAct"),3)),
    BankingObj.act(e, null, null)
}
function ShowPopWindow(e, t) {
    document.getElementById(e).style.display = 1 == t ? "block" : "none"
}
function openBingoRuleInfo() {
    (null == fFrame.RuleInfo || fFrame.RuleInfo.closed) && (fFrame.RuleInfo = fFrame.window.open("index_info.php?page=11", "RuleInfo"))
}
function switchAsia_Europe(e, t) {
    "4280" != fFrame.SiteId && "4200800" != fFrame.SiteId || (1 == e && (fFrame.location.href = t ? "http://inner." + fFrame.DomainName + ":36120/index.php?lng=en_eu" : "http://www." + fFrame.DomainName + "/index.php?lng=en_eu"),
    2 == e && (fFrame.location.href = t ? "http://inner." + fFrame.DomainName + ":36120/index.php?lng=en" : "http://www." + fFrame.DomainName + "/index.php?lng=en"))
}
function popScoreMap(e, t, n, a, o, r, i, l, s) {
    var d = 100
      , m = 0;
    if (null == t) {
        var u = getEvent();
        if (CheckIScroll())
            d = 300,
            m += 100;
        else
            try {
                m += u.clientY + 15,
                d = u.clientX
            } catch (e) {}
        try {
            if (fFrame.leftx.g_BetProcesCurrMatchid == e && "none" != fFrame.leftx.document.getElementById("BetProcessContainer").style.display && $(fFrame.leftx.document.getElementById("scoremap")).is(":visible")) {
                return (u = document.createEvent("HTMLEvents")).initEvent("click", !0, !0),
                void fFrame.leftx.document.getElementById("scoremap").dispatchEvent(u)
            }
        } catch (e) {
            return void $(fFrame.leftx.document.getElementById("scoremap")).trigger("click")
        }
    } else
        d = 0,
        m += 100;
    fFrame.topx.g_SMF.openScoreMap(e, d, m, n, a, o, r, i, l, s)
}
function RefreshScoreMap(e) {
    window.top.location.href = e
}
function ClosedWin() {
    window.open("", "_self", ""),
    window.opener = null,
    window.close()
}
function enableStyle() {
    var e = document.getElementById("sp_r1")
      , t = document.getElementById("sp_r2");
    e.style.color = "#4B5D8F",
    e.style.cursor = "pointer",
    e.innerHTML = "<span >" + strRefresh + "</span>",
    e.disabled = !1,
    t.style.color = "#4B5D8F",
    t.style.cursor = "pointer",
    t.innerHTML = "<span >" + strRefresh + "</span>",
    t.disabled = !1
}
function disableStyle() {
    var e = document.getElementById("sp_r1")
      , t = document.getElementById("sp_r2");
    return !e.disabled && !t.disabled && (e.style.color = "#CCCCCC",
    e.style.cursor = "",
    e.className = "btnIcon right disable",
    e.disabled = !0,
    t.style.color = "#CCCCCC",
    t.style.cursor = "",
    t.className = "btnIcon right disable",
    t.disabled = !0,
    !0)
}
function NumberGroupTitle(e, t) {
    if (null != t && "undefined" != t && (parseInt(t) >= 221 && parseInt(t) <= 225 || 171 == parseInt(t) || 426 == parseInt(t)))
        e.title = e.innerHTML.replace("<br>", "");
    else {
        var n = e.innerHTML.split("~")
          , a = !1
          , o = !1;
        if (e.innerHTML.replace("<br>", ",").split(",").length <= 1 && (o = !0),
        n.length <= 1 && (a = !0),
        a && o)
            return void (e.title = "");
        var r, i;
        if (!a) {
            var l = "";
            r = parseInt(n[0], 10),
            i = parseInt(n[1], 10);
            for (var s = r; s <= i; s++)
                l = l + "," + s;
            e.title = l.substr(1)
        }
        o || (e.title = e.innerHTML.replace("<br>", ","))
    }
}
function setSelecter(e, t, n, a) {
    /*if ("selOddsType" == e) {
        var o = $("#" + e).attr("value")
          , r = n;
        fFrame.OddsType = n
    }
    null == a && (a = !1);
    var i = $("#" + e + "_Txt");
    if (a ? i.find("div")[0].className = $(t).find("div")[0].className : i.html($(t).html()),
    i.attr("title", $(t).attr("title")),
    $("#" + e).attr("value", n),
    "aSorter" == e) {
        var l, s = "D";
        null != document.DataForm_L ? (l = document.DataForm_L,
        s = "L") : (l = document.DataForm,
        s = "D"),
        n != l.OrderBy.value ? setRefreshSort() : "L" != s ? refreshData() : refreshAll()
    }
    "selOddsType" == e && "/UnderOver.php" == location.pathname && o != r && $.ajax({
        url: "/ChangeOddsType.php",
        data: {
            OddsType: r
        },
        cache: !1
    })*/
}
function getSelecterValue(e) {
    return $("#" + e).attr("value")
}
function onKeyPressSelecter(e, t) {
    var n = $("#" + e + "_menu > .selected")
      , a = String.fromCharCode(t.charCode).toUpperCase();
    if ($(".submenu li").removeClass("selected"),
    13 != t.keyCode)
        if (38 == t.keyCode && (0 == n.prev().length ? $("#" + e + "_Div .submenu li").siblings().last().addClass("selected") : (n.prev().addClass("selected"),
        CheckScrollMove(300, 22, n.prev().position().top) && $("#" + e + "_menu").scrollTop($("#" + e + "_menu").scrollTop() + n.prev().position().top))),
        40 == t.keyCode && (0 == n.next().length ? $("#" + e + "_Div .submenu li").siblings().first().addClass("selected") : (n.next().addClass("selected"),
        CheckScrollMove(300, 22, n.next().position().top) && $("#" + e + "_menu").scrollTop($("#" + e + "_menu").scrollTop() + n.next().position().top))),
        0 == n.length)
            $("#" + e + "_Div .submenu li").each(function() {
                if (a == $(this).text().substring(0, 1))
                    return SetScrollAndSelected(e, $(this)),
                    !1
            });
        else {
            var o = !0
              , r = !0;
            if (n.nextAll().each(function() {
                if (a == $(this).text().substring(0, 1))
                    return SetScrollAndSelected(e, $(this)),
                    o = !1,
                    r = !1,
                    !1
            }),
            o) {
                if (a == n.prevAll().last().text().substring(0, 1))
                    return SetScrollAndSelected(e, n.prevAll().last()),
                    !1;
                n.prevAll().last().nextUntil($(this)).each(function() {
                    if (a == $(this).text().substring(0, 1))
                        return SetScrollAndSelected(e, $(this)),
                        r = !1,
                        !1
                })
            }
            r && a == n.text().substring(0, 1) && SetScrollAndSelected(e, n)
        }
    else
        n.click()
}
function onOver(e) {
    $(".submenu li").removeClass("selected"),
    $(e).addClass("selected")
}
function onOut(e) {
    $(e).removeClass("selected")
}
function SetScrollAndSelected(e, t) {
    t.addClass("selected"),
    CheckScrollMove(300, 22, t.position().top) && $("#" + e + "_menu").scrollTop($("#" + e + "_menu").scrollTop() + t.position().top)
}
function CheckScrollMove(e, t, n) {
    return n > e - t || n < 0
}
function onClickSelecter(e) {
    if (!(document.getElementById(e + "_Div").className.indexOf("disable") > -1)) {
        var t = document.getElementById(e + "_menu")
          , n = function(a) {
            var o = (a = a || window.event).srcElement || a.target;
            o.id != e + "_Div" && o.id != e + "_Txt" && o.id != e + "_menu" && o.id != e + "_Icon" && (null != t && (t.style.visibility = "hidden"),
            $(document).unbind("click", n))
        };
        null != t && ($(document).unbind("click", n),
        "visible" == t.style.visibility ? t.style.visibility = "hidden" : (t.style.visibility = "visible",
        $(document).bind("click", n)))
    }
}
function setSelecterDisable(e, t) {
    var n = document.getElementById(e + "_Div")
      , a = $("#" + e + "_Txt").find("div").length > 0 ? "button select icon" : "button select";
    null != n && (n.className = 1 == t ? a + " disable" : a)
}
function RemoveSelecterItems(e) {
    var t = document.getElementById(e + "_menu");
    if (t.hasChildNodes())
        for (; t.childNodes.length >= 1; )
            t.removeChild(t.firstChild);
    document.getElementById(e + "_Txt").innerHTML = "",
    document.getElementById(e).value = ""
}
function AddSelecterItem(id, name, value, isselect, callbackJS) {
    var parentobj = $("#" + id + "_menu")
      , newli = $("<li title='" + name + "'>" + name + "</li>");
    null != id && newli.attr("id", id),
    newli.click(function() {
        eval("setSelecter('" + id + "',this,'" + value + "');" + (null == callbackJS ? "" : callbackJS))
    }),
    newli.appendTo(parentobj),
    1 == isselect && ($("#" + id + "_Txt").html(name),
    $("#" + id + "_Txt").attr("title", name),
    $("#" + id).value = value)
}
function getStringFormatPlaceHolderRegEx(e) {
    return new RegExp("({)?\\{" + e + "\\}(?!})","gm")
}
function cleanStringFormatResult(e) {
    return null == e ? "" : e.replace(getStringFormatPlaceHolderRegEx("\\d+"), "")
}
function isFlashSupported() {
    if (window.ActiveXObject)
        try {
            if (new ActiveXObject("ShockwaveFlash.ShockwaveFlash"))
                return !0
        } catch (e) {}
    return !!navigator.plugins["Shockwave Flash"]
}
function checkFlashSupport(e) {
    return null == e && (e = isFlashSupported()),
    e
}
function switchNoSupportFlashTxt(e, t) {
    setTimeout(function() {
        $("#" + e) && (checkFlashSupport(fFrame.FlashSupport) ? ($("#" + e).hide(),
        null != t && $("#" + t).show()) : ($("#" + e).show(),
        null != t && $("#" + t).hide()))
    }, 1)
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
function importJS(src, look_for, onload, TargetFrame) {
    null == TargetFrame && (TargetFrame = window);
    var s = TargetFrame.document.createElement("script");
    if (s.setAttribute("type", "text/javascript"),
    s.setAttribute("src", src),
    onload && wait_for_script_load(look_for, onload),
    "undefined" == eval("typeof " + look_for)) {
        var head = TargetFrame.document.getElementsByTagName("head")[0];
        head ? head.appendChild(s) : TargetFrame.document.body.appendChild(s)
    }
}
function wait_for_script_load(look_for, callback) {
    var interval = setInterval(function() {
        "undefined" != eval("typeof " + look_for) && (clearInterval(interval),
        callback())
    }, 50)
}
function CheckIsIpad() {
    return !!EnableIPadStyle && !(!navigator.userAgent.match(/Android 4./i) && -1 == navigator.userAgent.toLowerCase().indexOf("android") && -1 == navigator.userAgent.toLowerCase().indexOf("mobile") && !navigator.userAgent.match(/iPad/i))
}
function CheckIsIpadForCasino() {
    if (!EnableIPadStyle)
        return !1;
    var e = navigator.userAgent.toLowerCase().indexOf("ipad") >= 0 || navigator.userAgent.toLowerCase().indexOf("iphone") >= 0
      , t = navigator.userAgent.toLowerCase().indexOf("android") >= 0 || navigator.userAgent.toLowerCase().indexOf("mobile") >= 0;
    return e || t
}
function CheckIsMobileDevice() {
    return -1 != navigator.userAgent.toLowerCase().indexOf("iphone") || -1 != navigator.userAgent.toLowerCase().indexOf("android") || -1 != navigator.userAgent.toLowerCase().indexOf("mobile")
}
function CheckIScroll() {
    return !(!EnableIScroll || "undefined" == typeof myScroll)
}
function SportControl(e) {
    var t = document.getElementById("SportArea_" + e);
    -1 != t.className.indexOf(Sport_Area_CLOSE) ? t.className = t.className.replace(Sport_Area_CLOSE, "").replace(/(^\s*)|(\s*$)/g, "") : t.className = t.className.replace(Sport_Area_OPEN, Sport_Area_OPEN + " " + Sport_Area_CLOSE).replace(/(^\s*)|(\s*$)/g, "")
}
function showScoreMsg() {
    "hidden" == $("#scoremapmsg").css("visibility") ? $("#scoremapmsg").css("visibility", "visible") : $("#scoremapmsg").css("visibility", "hidden")
}
function checkiconClass() {
    fFrame.ShowUpGradeMsgForNG ? ($(".gaming-content.bingo").addClass("Upgrade"),
    $(".gaming-content.liveCasino").addClass("Upgrade"),
    $(".gaming-content.numberGame").addClass("Upgrade")) : ($(".gaming-content.bingo").removeClass("Upgrade"),
    $(".gaming-content.liveCasino").removeClass("Upgrade"),
    $(".gaming-content.numberGame").removeClass("Upgrade"))
}
function checkiconLiveCasinoMini() {
    null == $("#miniLiveCasino") && null == $(".Casino.small") || "none" == $("#miniLiveCasino").css("display") && "none" == $(".Casino.small").css("display") || (fFrame.ShowUpGradeMsgForNG ? ($("#miniLiveCasino").hide(),
    $(".Casino.small").show()) : ($("#miniLiveCasino").show(),
    $(".Casino.small").hide()))
}
function changeFavStyle(e) {
    "0" != e ? (fFrame.leftx.document.getElementById("Favorite").className = "icon-favorite added",
    fFrame.topx.document.getElementById("Favorite").className = "Favorite added") : (fFrame.leftx.document.getElementById("Favorite").className = "icon-favorite",
    fFrame.topx.document.getElementById("Favorite").className = "Favorite")
}
function ComboDataDisplay(e) {
    var t = "#Detail_" + e;
    $(t).hasClass("ComboParlay on") ? $(t).removeClass("ComboParlay on").addClass("ComboParlay") : $(t).removeClass("ComboParlay").addClass("ComboParlay on")
}
function switchToV2(e) {
    CallSiteTransitionTip(),
    fFrame.closeAllWindows();
    var t = new Object
      , n = !1;
    switch (e) {
    case 1:
        t.mode = "promotion_odds";
        break;
    case 2:
        t.mode = "promotion_bet";
        break;
    case 3:
        t.mode = "promotion_watch";
        break;
    case 4:
        t.mode = "promotion_rwd";
        break;
    case 5:
        t.mode = "promotion_freeze";
        break;
    case 666:
        n = !0;
        break;
    default:
    case 0:
    }
    $.ajax({
        url: "./GetLoginVerifyInfo.php",
        type: "POST",
        dataType: "json",
        data: t,
        async: !0,
        cache: !1,
        success: function(e) {
            parent.window.location = e.Host + "/ValidateToken/Index?t=" + e.TicketID + "&c=" + e.CustID + "&l=" + e.Lan + "&f=" + e.CountryName + "&v=1&s=" + e.SSL + "&IsTablet=" + (n ? "1" : "0")
        },
        error: function() {
            console.log("switchToV2 fail")
        }
    })
}
function CallSiteTransitionTip() {
    null != fFrame.topx.miniOddsObj && fFrame.topx.miniOddsObj.ShowSiteTransitionTip()
}
function CallSwitchNewVersionTip() {
    window.top.leftx.$(".leftSwitchVer").length > 0 && null != fFrame.topx.miniOddsObj && fFrame.topx.miniOddsObj.ShowSwitchNewVersionTip()
}
function HidePromoPage(e) {
    var t = window.top.rightx.$("#PromoNewVersionPopup");
    t.length > 0 && (t.hide(),
    1 == e && CallSwitchNewVersionTip())
}
function PromoDoNotShowAgain() {
    var e = fFrame.UserName + "_v1promo";
    window.top.topx.setCookie(e, 1, 60, "", fFrame.DomainName),
    HidePromoPage(!0),
    fFrame.clearInterval(fFrame.FreezeHandle)
}
function genGotoMS2HTML(e) {
    switch (e) {
    case 1:
        if (!fFrame.ShowPromotion1)
            return;
        break;
    case 2:
        if (!fFrame.ShowPromotion2)
            return;
        break;
    case 3:
        if (!fFrame.ShowPromotion3)
            return;
        break;
    case 4:
        if (!fFrame.ShowPromotion4)
            return
    }
    fFrame.promotionKey = e;
    var t = ""
      , n = ""
      , a = ""
      , o = fFrame.RES_promotion_button
      , r = "";
    switch (e) {
    case 1:
        n = fFrame.RES_promotion_title1,
        a = fFrame.RES_promotion_content1,
        r = "promotion_odds";
        break;
    case 2:
        n = fFrame.RES_promotion_title2,
        a = fFrame.RES_promotion_content2,
        t = " QuickBet2",
        r = "promotion_bet";
        break;
    case 3:
        n = fFrame.RES_promotion_title3,
        a = fFrame.RES_promotion_content3,
        t = " WatchLive",
        r = "promotion_watch";
        break;
    case 4:
        n = fFrame.RES_promotion_title4,
        a = fFrame.RES_promotion_content4,
        t = " RWD",
        r = "promotion_rwd"
    }
    if ("" != r) {
        var i = new Object;
        i.mode = r,
        i.type = e.toString(),
        ExecAjax("RecSelData.php", i, "POST", null, null)
    }
    var l = fFrame.rightx.document.getElementById("POP_MS2");
    null == l && ((l = document.createElement("div")).id = "POP_MS2",
    fFrame.rightx.document.body.appendChild(l)),
    (l = fFrame.rightx.document.getElementById("POP_MS2")).innerHTML = "";
    var s = document.createElement("div");
    s.className = "enhance-box show" + t;
    var d = document.createElement("div");
    d.className = "enhance-new",
    s.appendChild(d),
    (d = document.createElement("div")).className = "enhance-x",
    s.appendChild(d),
    (d = document.createElement("div")).className = "enhance-left",
    s.appendChild(d),
    (d = document.createElement("div")).className = "enhance-right";
    var m = document.createElement("h1");
    m.innerHTML = n,
    d.appendChild(m),
    (m = document.createElement("p")).innerHTML = a,
    d.appendChild(m),
    (m = document.createElement("div")).className = "button enhance",
    m.onclick = function() {
        fFrame.leftx.checkBrowserVer()
    }
    ;
    var u = document.createElement("span");
    u.innerHTML = o,
    m.appendChild(u),
    d.appendChild(m),
    s.appendChild(d),
    l.appendChild(s)
}
function PopToMS2(e) {
    $(".enhance-x").click(function() {
        $(this).parent(".enhance-box").fadeOut();
        var t = new Object;
        switch (t.mode = "promotion",
        t.type = e.toString(),
        ExecAjax("RecSelData.php", t, "POST", null, null),
        e) {
        case 1:
            fFrame.ShowPromotion1 = !1;
            break;
        case 2:
            fFrame.ShowPromotion2 = !1;
            break;
        case 3:
            fFrame.ShowPromotion3 = !1;
            break;
        case 4:
            fFrame.ShowPromotion4 = !1
        }
    }),
    $(".enhance-box").each(function() {
        $myLeft = (770 - $(this).width()) / 2,
        $(this).data("myLeft", $myLeft),
        $(this).css({
            left: $myLeft,
            bottom: -$(this).height() - 80
        }),
        $(this).hasClass("show") && $(this).delay(1e3).css("opacity", 1).animate({
            bottom: "0px"
        }, 600)
    }),
    $(window).scroll(function() {
        $(".enhance-box").each(function() {
            $(this).css({
                left: -$(window).scrollLeft() + $(this).data("myLeft")
            })
        })
    })
}
function DoNotShowAgainInThisSession(e) {
    var t = new Object;
    switch (t.mode = "promotion",
    t.type = e.toString(),
    ExecAjax("RecSelData.php", t, "POST", null, null),
    e) {
    case 5:
        fFrame.ShowPromotion5 = !1;
        break;
    default:
        return
    }
}
function toggleLetstalk(e, t) {
    "letstalkQR" != t && $("#letstalk").hasClass("active") ? $("#letstalk").removeClass("active") : ($("#letstalk").addClass("active"),
    $(document).one("click", function() {
        $("#letstalk").hasClass("active") && $("#letstalk").removeClass("active")
    }),
    e.stopPropagation())
}
var fFrame = getParent(window), EnableIPadStyle = !0, EnableIScroll = !1, selBetMode = "", pairArray = ["1", "2", "3", "7", "8", "12", "20", "21", "153", "154", "155", "156", "1318", "1324", "18", "17", "184", "194", "197", "198", "203", "204", "205", "501", "401", "402", "403", "404", "603", "604", "605", "606", "607", "609", "610", "611", "612", "613", "615", "616", "617", "9001", "9002", "9003", "9004", "9005", "9006", "9007", "9008", "9009", "9010", "9011", "9012", "9013", "9014", "9015", "9016", "9017", "9018", "9019", "9020", "9021", "9022", "9023", "9024", "9025", "9026", "9027", "9028", "9029", "9030", "9031", "9032", "9033", "9034", "9035", "9036", "9037", "9038", "9039", "9040", "9041", "9042", "9043", "9044", "9045", "9046", "9047", "9048", "9049", "9050", "9051", "9052", "9053", "9054", "9055", "9056", "9057", "9058", "9059", "9060", "9061", "9062", "9063", "9064", "9065", "9066", "9067", "9068", "9069", "9070", "9071", "9072", "9073", "9074", "9075", "9076", "9077", "9078", "9079", "9080", "9081", "9082", "9083", "9084", "9085", "9086"], MMRArray = ["301", "302", "303", "304"], MD5 = function(e) {
    function t(e, t) {
        return e << t | e >>> 32 - t
    }
    function n(e, t) {
        var n, a, o, r, i;
        return o = 2147483648 & e,
        r = 2147483648 & t,
        n = 1073741824 & e,
        a = 1073741824 & t,
        i = (1073741823 & e) + (1073741823 & t),
        n & a ? 2147483648 ^ i ^ o ^ r : n | a ? 1073741824 & i ? 3221225472 ^ i ^ o ^ r : 1073741824 ^ i ^ o ^ r : i ^ o ^ r
    }
    function a(e, a, o, r, i, l, s) {
        return e = n(e, n(n(function(e, t, n) {
            return e & t | ~e & n
        }(a, o, r), i), s)),
        n(t(e, l), a)
    }
    function o(e, a, o, r, i, l, s) {
        return e = n(e, n(n(function(e, t, n) {
            return e & n | t & ~n
        }(a, o, r), i), s)),
        n(t(e, l), a)
    }
    function r(e, a, o, r, i, l, s) {
        return e = n(e, n(n(function(e, t, n) {
            return e ^ t ^ n
        }(a, o, r), i), s)),
        n(t(e, l), a)
    }
    function i(e, a, o, r, i, l, s) {
        return e = n(e, n(n(function(e, t, n) {
            return t ^ (e | ~n)
        }(a, o, r), i), s)),
        n(t(e, l), a)
    }
    var l, s, d, m, u, c, f, p, g, v = Array();
    for (v = function(e) {
        for (var t, n = e.length, a = n + 8, o = 16 * ((a - a % 64) / 64 + 1), r = Array(o - 1), i = 0, l = 0; l < n; )
            i = l % 4 * 8,
            r[t = (l - l % 4) / 4] = r[t] | e.charCodeAt(l) << i,
            l++;
        return t = (l - l % 4) / 4,
        i = l % 4 * 8,
        r[t] = r[t] | 128 << i,
        r[o - 2] = n << 3,
        r[o - 1] = n >>> 29,
        r
    }(e = function(e) {
        e = e.replace(/\r\n/g, "\n");
        for (var t = "", n = 0; n < e.length; n++) {
            var a = e.charCodeAt(n);
            a < 128 ? t += String.fromCharCode(a) : a > 127 && a < 2048 ? (t += String.fromCharCode(a >> 6 | 192),
            t += String.fromCharCode(63 & a | 128)) : (t += String.fromCharCode(a >> 12 | 224),
            t += String.fromCharCode(a >> 6 & 63 | 128),
            t += String.fromCharCode(63 & a | 128))
        }
        return t
    }(e)),
    c = 1732584193,
    f = 4023233417,
    p = 2562383102,
    g = 271733878,
    l = 0; l < v.length; l += 16)
        s = c,
        d = f,
        m = p,
        u = g,
        f = i(f = i(f = i(f = i(f = r(f = r(f = r(f = r(f = o(f = o(f = o(f = o(f = a(f = a(f = a(f = a(f, p = a(p, g = a(g, c = a(c, f, p, g, v[l + 0], 7, 3614090360), f, p, v[l + 1], 12, 3905402710), c, f, v[l + 2], 17, 606105819), g, c, v[l + 3], 22, 3250441966), p = a(p, g = a(g, c = a(c, f, p, g, v[l + 4], 7, 4118548399), f, p, v[l + 5], 12, 1200080426), c, f, v[l + 6], 17, 2821735955), g, c, v[l + 7], 22, 4249261313), p = a(p, g = a(g, c = a(c, f, p, g, v[l + 8], 7, 1770035416), f, p, v[l + 9], 12, 2336552879), c, f, v[l + 10], 17, 4294925233), g, c, v[l + 11], 22, 2304563134), p = a(p, g = a(g, c = a(c, f, p, g, v[l + 12], 7, 1804603682), f, p, v[l + 13], 12, 4254626195), c, f, v[l + 14], 17, 2792965006), g, c, v[l + 15], 22, 1236535329), p = o(p, g = o(g, c = o(c, f, p, g, v[l + 1], 5, 4129170786), f, p, v[l + 6], 9, 3225465664), c, f, v[l + 11], 14, 643717713), g, c, v[l + 0], 20, 3921069994), p = o(p, g = o(g, c = o(c, f, p, g, v[l + 5], 5, 3593408605), f, p, v[l + 10], 9, 38016083), c, f, v[l + 15], 14, 3634488961), g, c, v[l + 4], 20, 3889429448), p = o(p, g = o(g, c = o(c, f, p, g, v[l + 9], 5, 568446438), f, p, v[l + 14], 9, 3275163606), c, f, v[l + 3], 14, 4107603335), g, c, v[l + 8], 20, 1163531501), p = o(p, g = o(g, c = o(c, f, p, g, v[l + 13], 5, 2850285829), f, p, v[l + 2], 9, 4243563512), c, f, v[l + 7], 14, 1735328473), g, c, v[l + 12], 20, 2368359562), p = r(p, g = r(g, c = r(c, f, p, g, v[l + 5], 4, 4294588738), f, p, v[l + 8], 11, 2272392833), c, f, v[l + 11], 16, 1839030562), g, c, v[l + 14], 23, 4259657740), p = r(p, g = r(g, c = r(c, f, p, g, v[l + 1], 4, 2763975236), f, p, v[l + 4], 11, 1272893353), c, f, v[l + 7], 16, 4139469664), g, c, v[l + 10], 23, 3200236656), p = r(p, g = r(g, c = r(c, f, p, g, v[l + 13], 4, 681279174), f, p, v[l + 0], 11, 3936430074), c, f, v[l + 3], 16, 3572445317), g, c, v[l + 6], 23, 76029189), p = r(p, g = r(g, c = r(c, f, p, g, v[l + 9], 4, 3654602809), f, p, v[l + 12], 11, 3873151461), c, f, v[l + 15], 16, 530742520), g, c, v[l + 2], 23, 3299628645), p = i(p, g = i(g, c = i(c, f, p, g, v[l + 0], 6, 4096336452), f, p, v[l + 7], 10, 1126891415), c, f, v[l + 14], 15, 2878612391), g, c, v[l + 5], 21, 4237533241), p = i(p, g = i(g, c = i(c, f, p, g, v[l + 12], 6, 1700485571), f, p, v[l + 3], 10, 2399980690), c, f, v[l + 10], 15, 4293915773), g, c, v[l + 1], 21, 2240044497), p = i(p, g = i(g, c = i(c, f, p, g, v[l + 8], 6, 1873313359), f, p, v[l + 15], 10, 4264355552), c, f, v[l + 6], 15, 2734768916), g, c, v[l + 13], 21, 1309151649), p = i(p, g = i(g, c = i(c, f, p, g, v[l + 4], 6, 4149444226), f, p, v[l + 11], 10, 3174756917), c, f, v[l + 2], 15, 718787259), g, c, v[l + 9], 21, 3951481745),
        c = n(c, s),
        f = n(f, d),
        p = n(p, m),
        g = n(g, u);
    return (WordToHex(c) + WordToHex(f) + WordToHex(p) + WordToHex(g)).toLowerCase()
}, CFS = function(e) {
    function t(e) {
        for (var t = "", n = 1; n <= e.length; n++)
            t += e.charAt(n - 1).charCodeAt(0);
        return t = new Number(t).toString(16)
    }
    var n;
    if ((n = 30 - e.length) > 1)
        for (var a = 1; a <= n; a++)
            e += String.fromCharCode(21);
    for (var o = new Number(1), r = 1; r <= 30; r++)
        o *= 30 + e.charAt(r - 1).charCodeAt(0) * r;
    e = new Number(o.toPrecision(15)).toString().toUpperCase();
    for (var i = "", l = 1; l <= e.length; l++)
        i += t(e.substring(l - 1, l + 2));
    var s = "";
    for (l = 20; l <= i.length - 18; l += 2)
        s += i.charAt(l - 1);
    return s.toUpperCase()
}, OptionListObj_DisStyle = null, OptionListObj_OddsType = null, OptionListObj_SecurityQ = null, OptionListObj_Other = null, LoginObj = null, BettingObj = null, BankingObj = null, ScoreInfoPopWindow, ScoreMapInfoUrl, strRefresh, strWaiting, preMatchId;
String.format = function() {
    var e = arguments[0];
    if (null == e)
        return "";
    for (var t = 0; t < arguments.length - 1; t++) {
        var n = getStringFormatPlaceHolderRegEx(t);
        e = e.replace(n, null == arguments[t + 1] ? "" : arguments[t + 1])
    }
    return cleanStringFormatResult(e)
}
;
var Sport_Area_CLOSE = "closeEvents"
  , Sport_Area_OPEN = "popWBlueArea";
