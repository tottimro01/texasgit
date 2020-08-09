function getParent(e) {
    for (var t = e, n = 0; n < 4; n++) {
        if (null != t.SiteMode)
            return t;
        t = t.parent
    }
    return null
}
function getPop(e, t) {
    if (IsLoadCompleted()) {
        oldnews = e.replace(/\"/g, "&quot;"),
        oldprinews = t.replace(/\"/g, "&quot;");
        var n = document.getElementById("btnMorePriNewsCount");
        0 != count ? n.innerHTML = "<font color='red'>" + count + "</font>" : n.innerHTML = "0"
    }
}
function SetMarqueeMsg(e) {
    function t() {
        var e = n.position().top - a.height();
        n.animate({
            top: e
        }, r, function() {
            e <= o + a.height() && n.css("top", o / 2 + a.height())
        }),
        marqueeTimer = setTimeout(t, c)
    }
    clearTimeout(marqueeTimer);
    var n = $("#marqueeMsg")
      , i = $("#marqueeMsg").html()
      , a = (n.append("<br/>" + n.html()).children(),
    $("#marquee"))
      , o = -1 * n.height()
      , r = 600
      , s = !1
      , c = 1500 + r;
    a.height() != n.height() / 2 && (s = !0),
    n.css("top", o / 2),
    n.hover(function() {
        $("#marqueeMsgHover").css("display", "block"),
        "" == $("#marqueeMsgHover div").html() ? ($("#marqueeMsgHover div").html(i),
        $("#marqueeMsgHover").mCustomScrollbar()) : ($("#marqueeMsgHover").mCustomScrollbar("destroy"),
        $("#marqueeMsgHover div").html(i),
        $("#marqueeMsgHover").mCustomScrollbar())
    }),
    $("#marqueeMsgHover").mouseleave(function() {
        $("#marqueeMsgHover").css("display", "none")
    }),
    s && (marqueeTimer = setTimeout(t, c))
}
function loadTopNews() {
    if (IsLoadCompleted()) {
        var e = document.getElementById("marqueeMsg");
        if (hotnews = FrameLoginCheckin.pubmsg.replace(/\"/g, "&quot;"),
        hotprinews = FrameLoginCheckin.primsg.replace(/\"/g, " &quot;"),
        null != e) {
            if (0 == hotprinews.length) {
                count = 0;
                null != (t = document.getElementById("btnMorePriNewsCount")) && (t.innerHTML = "0"),
                $("#marqueeMsg").html(hotnews)
            } else
                $("#marqueeMsg").html(hotnews + lbl_private_message + hotprinews);
            SetMarqueeMsg()
        }
        if (hotnews != oldnews && hotnews.length > 0 && (SwitchShowHidMode(1),
        creatediv("TOPpopup1", hotnews, 1, 535, 78, 8, 365),
        mytime1 = setTimeout("Close_obj('TOPpopup1',1);", _delaytime),
        $("#mytd1").mCustomScrollbar()),
        hotprinews != oldprinews && hotprinews.length > 25) {
            count++;
            var t;
            null != (t = document.getElementById("btnMorePriNewsCount")) && (t.innerHTML = "<font color='red'>" + count + "</font>"),
            SwitchShowHidMode(1),
            creatediv("TOPpopup2", hotprinews, 2, 535, 78, 8, 365),
            mytime2 = setTimeout("Close_obj('TOPpopup2',2);", _delaytime),
            $("#mytd2 .toppopunews2").mCustomScrollbar()
        }
        oldnews = hotnews,
        oldprinews = hotprinews
    }
}
function refreshTopNewsData() {
    var e = document.getElementById("frmTopNewsData");
    null != e && e.submit()
}
function OpenWinMessage() {
    IsLoadCompleted() && PopMessage("", 860, 600)
}
function OpenWinPriMessage() {
    IsLoadCompleted() && (count = 0,
    pri_count = document.getElementById("btnMorePriNewsCount"),
    null != pri_count && (pri_count.innerHTML = "0"),
    PopMessage("private", 860, 600))
}
function PopMessage(e, t, n) {
    if (IsLoadCompleted()) {
        navigator.appVersion.indexOf("Chrome") > 0 && (t += 100),
        x = (screen.width - t) / 2,
        y = x = (screen.height - t) / 2;
        window.open("MessageHistory.php?pageQuery=" + e, "message_history", "left=" + x + ",top=" + y + ",width=" + t + ",height=" + n + ",location=no,resizable=no,scrollbars=yes").focus()
    }
}
function setObjOpen(e) {
    IsLoadCompleted() && (isIe ? 1 == e ? (curSObj1.filters.alpha.opacity += intAlphaStep,
    curSObj1.filters.alpha.opacity < 100 && setTimeout("setObjOpen(1)", intTimeStep)) : 2 == e && (curSObj2.filters.alpha.opacity += intAlphaStep,
    curSObj2.filters.alpha.opacity < 100 && setTimeout("setObjOpen(2)", intTimeStep)) : 1 == e ? (curOpacity1 += intAlphaStep,
    curSObj1.style.opacity = curOpacity1,
    curOpacity1 < 1 && setTimeout("setObjOpen(1)", intTimeStep)) : 2 == e && (curOpacity2 += intAlphaStep,
    curSObj2.style.opacity = curOpacity2,
    curOpacity2 < 1 && setTimeout("setObjOpen(2)", intTimeStep)))
}
function setObjClose(e) {
    IsLoadCompleted() && (isIe ? 1 == e ? (curSObj1.filters.alpha.opacity -= intAlphaStep,
    curSObj1.filters.alpha.opacity > 0 ? setTimeout("setObjClose(1)", intTimeStep) : curSObj1.parentNode.removeChild(curSObj1)) : 2 == e && (curSObj2.filters.alpha.opacity -= intAlphaStep,
    curSObj2.filters.alpha.opacity > 0 ? setTimeout("setObjClose(2)", intTimeStep) : curSObj2.parentNode.removeChild(curSObj2)) : 1 == e ? (curOpacity1 -= intAlphaStep) > 0 ? (curSObj1.style.opacity = curOpacity1,
    setTimeout("setObjClose(1)", intTimeStep)) : curSObj1.parentNode.removeChild(curSObj1) : 2 == e && ((curOpacity2 -= intAlphaStep) > 0 ? (curSObj2.style.opacity = curOpacity2,
    setTimeout("setObjClose(2)", intTimeStep)) : curSObj2.parentNode.removeChild(curSObj2)))
}
function Close_obj(e, t) {
    IsLoadCompleted() && ($("#TOPpopup" + t).fadeOut("slow", function() {
        $("#TOPpopup" + t).remove()
    }),
    1 == t ? clearTimeout(mytime1) : 2 == t && clearTimeout(mytime2),
    1 == hidemenu && ("hide_top" == document.getElementById("showhidetop").className && (document.getElementById("showhidetop").className = "show_top",
    document.getElementById("showhidetoplink").title = "Click to expand top menu",
    parent.resizeFrame("0,23,*,12")),
    hidemenu = !1))
}
function createMsgTable(e, t) {
    if (IsLoadCompleted())
        return mytb = document.createElement("table"),
        mytbb = document.createElement("tbody"),
        mytb.setAttribute("width", "100%"),
        mytb.setAttribute("border", "0"),
        mytb.setAttribute("cellSpacing", "0"),
        mytb.setAttribute("cellPadding", "0"),
        myrow = document.createElement("tr"),
        mytext = document.createTextNode("close"),
        myspan = document.createElement("span"),
        myspan.appendChild(mytext),
        mya = document.createElement("a"),
        mya.setAttribute("href", "#"),
        mya.appendChild(myspan),
        mytd = document.createElement("td"),
        mytd.setAttribute("id", "mytd" + t),
        1 == t ? mytd.className = "toppopuclose1" : 2 == t && (mytd.className = "toppopuclose2"),
        mytd.appendChild(mya),
        mytd.title = lbl_close,
        mytd.attachEvent ? mytd.onmousedown = function() {
            Close_obj(mytb.parentNode.id, t)
        }
        : mytd.setAttribute("onmousedown", "Close_obj(mytb.parentNode.id," + t + ")"),
        myrow.appendChild(mytd),
        mytd2 = document.createElement("td"),
        mytd2.setAttribute("id", "mytd" + t),
        1 == t ? mytd2.className = "toppopunews1" : 2 == t && (mytd2.className = "toppopunews2"),
        myfont = document.createElement("font"),
        myfont.setAttribute("id", "mymsg" + t),
        myfont.innerHTML = e,
        mydiv = document.createElement("div"),
        mydiv.setAttribute("id", "mydiv" + t),
        mydiv.style.cursor = "pointer",
        1 == t ? mydiv.className = "hotnewscont1" : 2 == t && (mydiv.className = "hotnewscont2"),
        mydiv.appendChild(myfont),
        mydiv.attachEvent ? 1 == t ? mydiv.onclick = function() {
            OpenWinMessage()
        }
        : 2 == t && (mydiv.onclick = function() {
            OpenWinPriMessage()
        }
        ) : 1 == t ? mydiv.setAttribute("onclick", "OpenWinMessage()") : 2 == t && mydiv.setAttribute("onclick", "OpenWinPriMessage()"),
        mytd2.appendChild(mydiv),
        myrow.appendChild(mytd2),
        mytbb.appendChild(myrow),
        mytb.appendChild(mytbb),
        mytb
}
function creatediv(e, t, n, i, a, o, r) {
    if (IsLoadCompleted()) {
        var s = document.getElementById(e);
        null != s && ((s = document.getElementById("mymsg" + n)).innerHTML = t);
        var c = document.createElement("div");
        c.setAttribute("id", e);
        var l = createMsgTable(t, n);
        c.appendChild(l),
        document.body.appendChild(c),
        $("#" + e).fadeIn("slow", function() {})
    }
}
function showRacing(e, t) {
    IsLoadCompleted() && null != fFrame.hash_TmplLoaded.Menu_tmpl && null != parent.leftx.document.getElementById("MenuContainer").innerHTML && null != fFrame.LastSelectedMArket && (0 != fFrame.LastSelectedMenu && parent.leftx.SwitchMenuType(0, e),
    parent.leftx.document.getElementById("div_BetListMini").style.display = "none",
    parent.leftx.openMenu("en"),
    parent.leftx.LoadMenuData("T"),
    parent.leftx.SwitchSport("T", t))
}
function SwitchESportGame(e) {
    if (IsLoadCompleted() && null != fFrame.hash_TmplLoaded.Menu_tmpl && null != parent.leftx.document.getElementById("MenuContainer").innerHTML && null != fFrame.LastSelectedMArket) {
        0 != fFrame.LastSelectedMenu && parent.leftx.SwitchMenuType(0);
        var t = fFrame.LastSelectedMArket;
        "L" == t && (t = "T"),
        parent.leftx.SwitchMarket(t),
        parent.leftx.document.getElementById("div_BetListMini").style.display = "none",
        parent.leftx.openMenu("en"),
        parent.leftx.SwitchSport(t, "43"),
        parent.leftx.ShowOdds(t, "43", null, null, e)
    }
}
function ShowVirtualSports(e) {
    IsLoadCompleted() && null != fFrame.hash_TmplLoaded.Menu_tmpl && null != parent.leftx.document.getElementById("MenuContainer").innerHTML && null != fFrame.LastSelectedMArket && (0 != fFrame.LastSelectedMenu && parent.leftx.SwitchMenuType(0),
    parent.leftx.document.getElementById("div_BetListMini").style.display = "none",
    parent.leftx.openMenu("en"),
    parent.leftx.LoadMenuData("T"),
    parent.leftx.SwitchSport("T", e))
}
function ShowNumberGame(e) {
    IsLoadCompleted() && null != fFrame.hash_TmplLoaded.Menu_tmpl && null != parent.leftx.document.getElementById("MenuContainer").innerHTML && null != fFrame.LastSelectedMArket && (0 != fFrame.LastSelectedMenu && parent.leftx.SwitchMenuType(0),
    parent.leftx.document.getElementById("div_BetListMini").style.display = "none",
    parent.leftx.openMenu("en"),
    parent.leftx.LoadMenuData("T"),
    parent.leftx.SwitchSport("T", e))
}
function ShowSports(e) {
    IsLoadCompleted() && null != fFrame.hash_TmplLoaded.Menu_tmpl && null != parent.leftx.document.getElementById("MenuContainer").innerHTML && null != fFrame.LastSelectedMArket && (0 != fFrame.LastSelectedMenu && parent.leftx.SwitchMenuType(0),
    parent.leftx.document.getElementById("div_BetListMini").style.display = "none",
    parent.leftx.openMenu("en"),
    parent.leftx.LoadMenuData("T"),
    parent.leftx.SwitchSport("T", e))
}
function SwitchSportClass(e) {
    var t = document.getElementsByName("top_menu_sportsbook");
    for (i = 0; i < t.length; i++)
        t[i].className = "";
    var n = $("#top_menu_sportsbook_a");
    n.length > 0 && n.removeClass("current");
    var a = $("#top_menu_virtualsports_a");
    a.length > 0 && a.removeClass("current");
    var o = $("#top_menu_racing_a");
    o.length > 0 && o.removeClass("current");
    var r = $("#top_menu_numbergame_a");
    r.length > 0 && r.removeClass("current"),
    151 == e || 152 == e || 153 == e ? o.length > 0 && o.addClass("current") : e >= 180 && e <= 191 ? a.length > 0 && a.addClass("current") : 161 == e || 164 == e ? r.length > 0 && r.addClass("current") : $("#top_menu_sportsbook_" + e).length > 0 ? $("#top_menu_sportsbook_" + e).addClass("current") : n.length > 0 && n.addClass("current")
}
function DisplayVistualSport(e) {
    null != e && $("#top_menu_virtualsports_a").length > 0 && (e ? $("#top_menu_virtualsports_a").show() : $("#top_menu_virtualsports_a").hide())
}
function showFinance() {
    if (IsLoadCompleted())
        if (null != fFrame.hash_TmplLoaded.Menu_tmpl)
            if (null != fFrame.document.getElementById("Menu_tmpl").contentWindow.document.getElementById("tmplEnd"))
                if (null != fFrame.LastSelectedMArket) {
                    parent.leftx.LoadMenuData("T", !1),
                    parent.leftx.SwitchSport("T", "201");
                    var e = parent.leftx.document.getElementById("201_head");
                    null != e && "none" != e.style.display || (parent.rightx.location.href = "Finance.php?market=5306")
                } else
                    window.setTimeout(showFinance, 200);
            else
                window.setTimeout(showFinance, 200);
        else
            window.setTimeout(showFinance, 200)
}
function IsLoadCompleted() {
    return null != document.getElementById("LoadCompleted")
}
function ShowTopRaceMenu() {
    HideTopGamingLink(),
    HideTopLiveCasinoLink(),
    HideTopKenoLink(),
    HideTopVSLink(),
    HideTopESLink();
    var e = document.getElementById("TopRaceMenuContainer");
    if (null != e) {
        if (void 0 !== showTopRaceLinkTimer && clearTimeout(showTopRaceLinkTimer),
        e.style.display = "block",
        !fFrame.CanSeeHorse) {
            document.getElementById("top_menu_151").style.display = "none"
        }
        if (!fFrame.CanSeeGreyhounds) {
            document.getElementById("top_menu_152").style.display = "none"
        }
        if (!fFrame.CanSeeHarness) {
            document.getElementById("top_menu_153").style.display = "none"
        }
        showTopRaceLinkTimer = setTimeout("HideTopRaceLink()", 5e3)
    }
}
function ShowTopVSMenu() {
    HideTopGamingLink(),
    HideTopLiveCasinoLink(),
    HideTopKenoLink(),
    HideTopRaceLink(),
    HideTopESLink();
    var e = document.getElementById("TopVSMenuContainer");
    if (null != e) {
        if (void 0 !== showTopVSLinkTimer && clearTimeout(showTopVSLinkTimer),
        e.style.display = "block",
        !fFrame.CanSeeVirtualSports) {
            document.getElementById("top_menu_180").style.display = "none"
        }
        if (!fFrame.CanSeeBRVS) {
            document.getElementById("top_menu_190").style.display = "none";
            document.getElementById("top_menu_191").style.display = "none"
        }
        showTopVSLinkTimer = setTimeout("HideTopVSLink()", 5e3)
    }
}
function ShowTopCasinoMenu() {
    HideTopRaceLink(),
    HideTopLiveCasinoLink(),
    HideTopKenoLink(),
    HideTopVSLink(),
    HideTopESLink();
    var e = document.getElementById("TopCasinoMenuContainer");
    null != e && (void 0 !== showTopCasinoLinkTimer && clearTimeout(showTopCasinoLinkTimer),
    e.style.display = "block",
    showTopCasinoLinkTimer = setTimeout("HideTopCasinoLink()", 5e3)),
    null != (e = document.getElementById("TopCasinoMenuMiniGame")) && (fFrame.CanSeeRng ? e.style.display = "" : e.style.display = "none")
}
function ShowTopGamingMenu() {
    HideTopRaceLink(),
    HideTopLiveCasinoLink(),
    HideTopKenoLink(),
    HideTopVSLink(),
    HideTopESLink();
    var e = document.getElementById("TopGamingMenuContainer");
    null != e && (void 0 !== showTopGamingLinkTimer && clearTimeout(showTopGamingLinkTimer),
    e.style.display = "block",
    showTopGamingLinkTimer = setTimeout("HideTopGamingLink()", 5e3)),
    null != (e = document.getElementById("TopGamingMenuMiniGame")) && (fFrame.CanSeeRng ? e.style.display = "" : e.style.display = "none")
}
function ShowTopKenoMenu() {
    HideTopRaceLink(),
    HideTopLiveCasinoLink(),
    HideTopGamingLink(),
    HideTopVSLink(),
    HideTopESLink();
    var e = document.getElementById("TopKenoMenuContainer");
    null != e && ("undefined" != typeof showTopKenoLinkTimer && clearTimeout(showTopKenoLinkTimer),
    e.style.display = "block",
    showTopKenoLinkTimer = setTimeout("HideTopKenoLink()", 5e3))
}
function ShowTopLiveCasinoMenu() {
    HideTopGamingLink(),
    HideTopRaceLink(),
    HideTopKenoLink(),
    HideTopVSLink(),
    HideTopESLink();
    var e = document.getElementById("TopLiveCasinoMenuContainer");
    if (null != e) {
        if (void 0 !== showTopLiveCasinoLinkTimer && clearTimeout(showTopLiveCasinoLinkTimer),
        e.style.display = "block",
        !fFrame.CanSeeLiveCasino) {
            document.getElementById("top_menu_162").style.display = "none"
        }
        if (!fFrame.CanSeeGD) {
            document.getElementById("top_menu_255").style.display = "none"
        }
        showTopLiveCasinoLinkTimer = setTimeout("HideTopLiveCasinoLink()", 5e3)
    }
}
function ShowTopESMenu() {
    HideTopGamingLink(),
    HideTopRaceLink(),
    HideTopKenoLink(),
    HideTopVSLink(),
    HideTopLiveCasinoLink();
    var e = document.getElementById("TopESMenuContainer");
    null != e && (void 0 !== showTopESLinkTimer && clearTimeout(showTopESLinkTimer),
    e.style.display = "block",
    showTopLiveCasinoLinkTimer = setTimeout("HideTopESLink()", 5e3))
}
function HideTopRaceLink() {
    var e = document.getElementById("TopRaceMenuContainer");
    null != e && (e.style.display = "none",
    showTopRaceLinkTimer = null)
}
function HideTopVSLink() {
    var e = document.getElementById("TopVSMenuContainer");
    null != e && (e.style.display = "none",
    showTopVSLinkTimer = null)
}
function HideTopLiveCasinoLink() {
    var e = document.getElementById("TopLiveCasinoMenuContainer");
    null != e && (e.style.display = "none",
    showTopLiveCasinoLinkTimer = null)
}
function HideTopCasinoLink() {
    var e = document.getElementById("TopCasinoMenuContainer");
    null != e && (e.style.display = "none",
    showTopCasinoLinkTimer = null),
    null != (e = document.getElementById("TopCasinoMenuMiniGame")) && (fFrame.CanSeeRng ? e.style.display = "" : e.style.display = "none")
}
function HideTopGamingLink() {
    var e = document.getElementById("TopGamingMenuContainer");
    null != e && (e.style.display = "none",
    showTopGamingLinkTimer = null),
    null != (e = document.getElementById("TopGamingMenuMiniGame")) && (fFrame.CanSeeRng ? e.style.display = "" : e.style.display = "none")
}
function HideTopKenoLink() {
    var e = document.getElementById("TopKenoMenuContainer");
    null != e && (e.style.display = "none",
    showTopKenoLinkTimer = null)
}
function HideTopESLink() {
    var e = document.getElementById("TopESMenuContainer");
    null != e && (e.style.display = "none",
    showTopESLinkTimer = null)
}
function SearchTeamName() {
    var e, t = 3;
    return "ch" != fFrame.UserLang && "cs" != fFrame.UserLang && "ncs" != fFrame.UserLang || (t = 2),
    regclick($("#KeyWord").val()) ? ("block" == $("#msgdisplay").css("display") && $("#msgdisplay").css("display", "none"),
    "block" == $("#SearchNotFound").css("display") && $("#SearchNotFound").css("display", "none"),
    "hide_top" == $("#showhidetop").attr("class") ? $("#SpecialCharacters").removeClass("topmenuHid") : $("#SpecialCharacters").addClass("topmenuHid"),
    $("#SpecialCharacters").css("display", "block"),
    void setTimeout(function() {
        $("#SpecialCharacters").css("display", "none")
    }, 5e3)) : $("#KeyWord").val().length < t ? ("block" == $("#SearchNotFound").css("display") && $("#SearchNotFound").css("display", "none"),
    "block" == $("#SpecialCharacters").css("display") && $("#SpecialCharacters").css("display", "none"),
    "hide_top" == $("#showhidetop").attr("class") ? $("#msgdisplay").removeClass("topmenuHid") : $("#msgdisplay").addClass("topmenuHid"),
    $("#msgdisplay").css("display", "block"),
    void setTimeout(function() {
        $("#msgdisplay").css("display", "none")
    }, 5e3)) : (fFrame.isAllSingleFirstLoad = !0,
    $.ajax({
        url: "checkSearchResult.ashx",
        async: !1,
        cache: !1,
        type: "post",
        dataType: "json",
        data: "lang=" + encodeURI(fFrame.UserLang) + "&keyWord=" + encodeURI($("#KeyWord").val()).replace(/&/g, "%26"),
        success: function(t) {
            e = t
        }
    }),
    0 == e ? ("block" == $("#msgdisplay").css("display") && $("#msgdisplay").css("display", "none"),
    "block" == $("#SpecialCharacters").css("display") && $("#SpecialCharacters").css("display", "none"),
    "hide_top" == $("#showhidetop").attr("class") ? $("#SearchNotFound").removeClass("topmenuHid") : $("#SearchNotFound").addClass("topmenuHid"),
    $("#SearchNotFound").css("display", "block"),
    void setTimeout(function() {
        $("#SearchNotFound").css("display", "none")
    }, 5e3)) : ($("#msgdisplay").css("display", "none"),
    $("#SearchNotFound").css("display", "none"),
    parent.rightx.location.href = "AllSingleOdds.php?keyWord=" + encodeURI($("#KeyWord").val()).replace(/&/g, "%26"),
    void (fFrame.topx.document.getElementById("SportRadar").className = "liveInfo")))
}
function regclick(e) {
    return !!new RegExp('[\\`,\\~,\\!,\\@,#,\\$,\\%,\\^,\\+,\\*,\\\\,\\?,\\|,\\:,\\<,\\>,\\{,\\},\\=,"]').test(e)
}
function SesrchTeamOnfocus() {
    $("#KeyWord").val() == res_SearchTeamName && $("#KeyWord").val("")
}
function copyKeyWord() {
    $("#KeyWord2").val($("#KeyWord").val())
}
function copyKeyWord2() {
    "" == $("#KeyWord").val() && $("#KeyWord").val(res_SearchTeamName)
}
function ShowWhatIsNews() {
    null != fFrame.topx.miniOddsObj && (fFrame.topx.miniOddsObj.SetWhatIsNews(),
    fFrame.topx.miniOddsObj.closeCB())
}
function ShowColossusBet(e) {
    parent.leftx.OpenColossusBet(e)
}
function removeCommasFunc(e) {
    null == e && (e = "0");
    return (e = "" + e).replace(/,/g, "")
}
function EmptyMap(e, t) {
    for (var n = new Array(t), i = 0; i <= t; i++) {
        n[i] = new Array(e);
        for (var a = 0; a <= e; a++)
            n[i][a] = 0
    }
    return n
}
function isString(e) {
    return "string" == typeof e || e.constructor == String
}
function MapControl(e) {
    var t = fFrame.rightx.document.getElementById("sTicket_" + e);
    -1 != t.className.indexOf(Score_TicketArea_CLOSE) ? t.className = t.className.replace(Score_TicketArea_CLOSE, Score_TicketArea_OPEN).replace(/(^\s*)|(\s*$)/g, "") : t.className = t.className.replace(Score_TicketArea_OPEN, Score_TicketArea_CLOSE).replace(/(^\s*)|(\s*$)/g, "");
    var n = fFrame.rightx.document.getElementById("sMap_" + e);
    -1 != n.className.indexOf(Score_MapArea_CLOSE) ? n.className = n.className.replace(Score_MapArea_CLOSE, Score_MapArea_OPEN).replace(/(^\s*)|(\s*$)/g, "") : n.className = n.className.replace(Score_MapArea_OPEN, Score_MapArea_CLOSE).replace(/(^\s*)|(\s*$)/g, "")
}
var mytime1, mytime2, marqueeTimer, oldnews = "", oldprinews = "", hotnews = "", hotprinews = "", hidemenu = !1, fFrame = getParent(window), _delaytime = 3e4, popWindow = null, intTimeStep = 20, isIe = "IE" == userBrowser(), intAlphaStep = isIe ? 5 : .05, curSObj1 = null, curSObj2 = null, curOpacity1 = null, curOpacity2 = null, showTopRaceLinkTimer = null, showTopGamingLinkTimer = null, showTopLiveCasinoLinkTimer = null, showTopCasinoLinkTimer = null, showTopVSLinkTimer = null, showTopESLinkTimer = null, ScoreMapData = function(e) {
    function t(e) {
        if (null == c)
            return "";
        var t, n, i, a, o = [], r = 0, s = 0;
        for (e = e.replace(/[^0-9A-Za-z$_~]/g, ""); r < e.length; )
            t = c[e.charAt(r++)],
            n = c[e.charAt(r++)],
            i = c[e.charAt(r++)],
            a = c[e.charAt(r++)],
            o[s++] = t << 2 | n >> 4,
            o[s++] = (15 & n) << 4 | i >> 2,
            o[s++] = (3 & i) << 6 | a;
        var u = e.slice(-2);
        return u.charAt(0) == l ? o.length = o.length - 2 : u.charAt(1) == l && (o.length = o.length - 1),
        function(e) {
            for (var t = !1, n = "", i = 0; i < e.length; ++i) {
                var a = e[i];
                29 != a ? n += t ? String.fromCharCode(256 * a + e[++i]) : String.fromCharCode(a) : t = !t
            }
            return n
        }(o)
    }
    function n(e) {
        return e > 63 ? n(Math.floor(e / 63) + e % 63) : e
    }
    function i() {
        var e = jQuery.extend(!0, {}, o.FTScoreMap)
          , t = jQuery.extend(!0, {}, o.HTScoreMap)
          , n = jQuery.extend(!0, {}, o.SHTScoreMap);
        if (o.HTTicketList = new Array,
        o.FTTicketList = new Array,
        o.SHTicketList = new Array,
        e.isWait = 1,
        t.isWait = 1,
        n.isWait = 1,
        !jQuery.isEmptyObject(o.TicketList))
            for (var i = 0; i < u.length; i++) {
                var a = u[i]
                  , s = o.TicketList[a]
                  , c = function(e) {
                    return A[e]
                }(s.Bettype);
                if (null != c) {
                    s.is2HT = c.is2HT,
                    s.isHT = c.isHT;
                    var l = null;
                    if (s.is2HT) {
                        if (o.SHTicketList.push(s),
                        !s.Enable)
                            continue;
                        l = n
                    } else if (s.isHT) {
                        if (o.HTTicketList.push(s),
                        !s.Enable)
                            continue;
                        l = t
                    } else {
                        if (o.FTTicketList.push(s),
                        !s.Enable)
                            continue;
                        l = e
                    }
                    null == l.Map && (l.Map = EmptyMap(l.AE - l.AS, l.HE - l.HS)),
                    l.Map = function(e, t, n, i, a) {
                        var o = n.OddsType;
                        -1 != indexOf(["301", "302", "303", "304"], n.Bettype) && (o = 4);
                        for (var r = parseFloat(removeCommasFunc(n.Odds)), s = parseInt(removeCommasFunc(n.Stake), 10), c = function(e, t, n) {
                            return 1 == n ? t * (e - 1) : e < 0 ? t : t * e
                        }(r, s, o), l = function(e, t, n) {
                            return 1 == n ? -t : e < 0 ? t * e : -t
                        }(r, s, o), u = 0; u < e.Map.length; u++)
                            for (h = 0; h < e.Map[u].length; h++)
                                t[u][h] += i(n, h + e.HS, u + e.AS, a, c, l);
                        return t
                    }(l, l.Map, s, c.Func, o.LiveScore)
                }
            }
        if (o.wcount > 0) {
            var m = [e, t, n];
            for (i = 0; i < m.length; i++)
                null == m[i].Map2 ? (m[i].isWait = 0,
                m[i].Map2 = m[i].Map) : (null == m[i].Map && (m[i].Map = EmptyMap(m[i].AE - m[i].AS, m[i].HE - m[i].HS)),
                m[i].Map2 = function(e, t) {
                    var n = e.length - 1
                      , i = e[0].length - 1;
                    if (null == t)
                        return e;
                    for (var a = new Array(n), o = 0; o <= n; o++) {
                        a[o] = new Array(i);
                        for (var r = 0; r <= i; r++)
                            a[o][r] = e[o][r] + t[o][r]
                    }
                    return a
                }(m[i].Map, m[i].Map2))
        }
        o.NowFTScoreMap = e,
        o.NowHTScoreMap = t,
        o.NowSHTScoreMap = n,
        r.onUpdateScoreMap(o)
    }
    var a = e
      , o = {
        MatchID: e,
        TicketList: {}
    }
      , r = this
      , s = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", "$", "_", "~"]
      , c = function() {
        var e = function(e) {
            var t = document.cookie.indexOf(e + "=")
              , n = t + e.length + 1;
            if (!t && e != document.cookie.substring(0, e.length))
                return null;
            if (-1 == t)
                return null;
            var i = document.cookie.indexOf(";", n);
            return -1 == i && (i = document.cookie.length),
            unescape(document.cookie.substring(n, i))
        }("_SessionId")
          , t = []
          , i = s;
        if (null == e)
            return null;
        if (e.length < 64)
            for (var a = e, o = Math.floor(64 / e.length), r = 0; r < o; r++)
                e += a;
        for (var c = 0; c < 64 && !(c > e.length - 1); c++) {
            var l = n(e.charCodeAt(c))
              , u = i[c];
            i[c] = i[l],
            i[l] = u
        }
        for (var m = 0; m < 64; ++m)
            t[i[m]] = m;
        return t
    }()
      , l = s[64]
      , u = [];
    this.Matchid = function() {
        return a
    }
    ,
    this.onUpdateScoreMap = null,
    this.getScoreMapInfo = function() {
        return o
    }
    ,
    this.changeStake = function(e, t) {
        e = e.toLowerCase(),
        jQuery.isEmptyObject(o.TicketList) || jQuery.isEmptyObject(o.TicketList[e]) || (0 == t.length && (t = "0"),
        o.TicketList[e].Stake = t,
        o.TicketList[e].Enable = !0,
        i())
    }
    ,
    this.addTicket = function(e, t, n, i, s, c, l, m) {
        if (e != a)
            return !1;
        var d = t + (n = n.toLowerCase());
        return jQuery.isEmptyObject(o.TicketList) && (o.TicketList = {}),
        null == r.getTicket(d) ? (o.TicketList[d] = {
            OddsId: t,
            BetTeam: n,
            Odds: i,
            Hdp: s,
            Bettype: 0,
            Stake: c,
            Enable: !0,
            Off: 0,
            OddsSpread: l,
            Aos: m
        },
        u.push(d)) : (o.TicketList[d].Odds = i,
        o.TicketList[d].Hdp = s,
        o.TicketList[d].Stake = 0 == c.length ? "0" : c,
        o.TicketList[d].OddsSpread = 0 == l.length ? "0" : l,
        o.TicketList[d].Aos = m),
        !0
    }
    ,
    this.updateMatchData = function(e, n) {
        var r = {
            matchid: a
        };
        if (!jQuery.isEmptyObject(o.TicketList)) {
            var s = "";
            for (var c in o.TicketList) {
                var l = o.TicketList[c];
                s.length > 0 && (s += ","),
                s += l.OddsId + "_" + l.BetTeam
            }
            r.oddsdata = s,
            null != n && (r.isRefresh = 1)
        }
        jQuery.ajax({
            type: "get",
            url: "TickScoreMap_data.php",
            data: r,
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            cache: !1,
            async: e,
            error: function(e) {
                alert("Request error " + e)
            },
            success: function(e) {
                "" != e && (123 != e.charCodeAt(0) && (e = t(e)),
                function(e) {
                    var t = o.TicketList
                      , n = e.TicketList;
                    o = e;
                    for (var i in t) {
                        var a = t[i];
                        if (jQuery.isEmptyObject(n) && (n = {}),
                        null != n[i]) {
                            var r = n[i];
                            r.Enable = a.Enable,
                            r.Stake = a.Stake,
                            r.BetTeam = r.BetTeam.toLowerCase(),
                            r.oddsChg = !1,
                            r.Hdp != a.Hdp ? r.hdpChg = !0 : r.hdpChg = !1,
                            1 == r.Off && (r.Enable = !1,
                            r.oddsChg = !1,
                            r.hdpChg = !1,
                            r.Odds = a.Odds)
                        } else
                            a.Off = 1,
                            a.Enable = !1,
                            a.oddsChg = !1,
                            a.hdpChg = !1,
                            n[i] = a
                    }
                    o.TicketList = n
                }(jQuery.parseJSON(e)),
                i())
            }
        })
    }
    ,
    this.removeTicket = function(e, t) {
        if (e = e.toLowerCase(),
        !jQuery.isEmptyObject(o.TicketList)) {
            delete o.TicketList[e];
            for (var n = -1, a = 0; a < u.length; a++)
                if (u[a] == e) {
                    n = a;
                    break
                }
            n > -1 && (u.splice(n, 1),
            (null == t || t) && i())
        }
    }
    ,
    this.removeAllTicket = function() {
        o.TicketList = {},
        u = [],
        i()
    }
    ,
    this.setTicketEnable = function(e, t) {
        e = e.toLowerCase(),
        jQuery.isEmptyObject(o.TicketList) || (o.TicketList[e].Enable = t,
        i())
    }
    ,
    this.getTicket = function(e) {
        return null != e && isString(e) && (e = e.toLowerCase()),
        jQuery.isEmptyObject(o.TicketList) ? null : o.TicketList[e]
    }
    ;
    var m = function(e, t, n, i, a, o) {
        var r = parseFloat(e.Hdp);
        "h" == e.BetTeam && (r *= -1);
        var s = t - i.H - r - (n - i.A);
        return "a" == e.BetTeam && (s = -s),
        s > 0 ? s >= .5 ? a : a / 2 : 0 == s ? 0 : s <= -.5 ? o : o / 2
    }
      , d = function(e, t, n, i, a, o) {
        var r = (t + n) % 2;
        return "o" == e.BetTeam && r > 0 || "e" == e.BetTeam && 0 == r ? a : o
    }
      , p = function(e, t, n, i, a, o) {
        var r = (t + n) % 2;
        return "h" == e.BetTeam && r > 0 || "a" == e.BetTeam && 0 == r ? a : o
    }
      , f = function(e, t, n, i, a, o) {
        var r = t + n - parseFloat(e.Hdp);
        return "a" == e.BetTeam && (r = -r),
        r > 0 ? r >= .5 ? a : a / 2 : 0 == r ? 0 : r <= -.5 ? o : o / 2
    }
      , T = function(e, t, n, i, a, o) {
        var r = t - n;
        return "1" == e.BetTeam && r > 0 || "2" == e.BetTeam && r < 0 || "x" == e.BetTeam && 0 == r ? a : o
    }
      , y = function(e, t, n, i, a, o) {
        var r = t + n;
        return 412 == e.Bettype || 429 == e.Bettype ? "0" == e.BetTeam && 0 == r || "1" == e.BetTeam && 1 == r || "2" == e.BetTeam && 2 == r || "3-over" == e.BetTeam && r >= 3 ? a : o : 126 == e.Bettype ? "0-1" == e.BetTeam && r < 2 || "2-3" == e.BetTeam && r > 1 && r < 4 || "4-over" == e.BetTeam && r > 3 ? a : o : "0-1" == e.BetTeam && r < 2 || "2-3" == e.BetTeam && r > 1 && r < 4 || "4-6" == e.BetTeam && r > 3 && r < 7 || "7-over" == e.BetTeam && r > 6 ? a : o
    }
      , g = function(e, t, n, i, a, o) {
        if (2 != e.BetTeam.replace(":", "").length)
            return 0;
        var r = parseInt(e.BetTeam.replace(":", "").substr(0, 1), 10)
          , s = parseInt(e.BetTeam.replace(":", "").substr(1, 1), 10)
          , c = 5;
        return 30 == e.Bettype && (c = 4),
        r == t && s == n || e.BetTeam == c + "0" && t - n >= c || e.BetTeam == "0" + c && n - t >= c ? a : o
    }
      , S = function(e, t, n, i, a, o) {
        return "1x" == e.BetTeam && t >= n || "2x" == e.BetTeam && n >= t || "12" == e.BetTeam && t != n ? a : o
    }
      , v = function(e, t, n, i, a, o) {
        return "hd" == e.BetTeam && t >= n || "da" == e.BetTeam && n >= t || "ha" == e.BetTeam && t != n ? a : o
    }
      , F = function(e, t, n, i, a, o) {
        parseFloat(e.Hdp);
        return "1" == e.BetTeam && t - i.H > n - i.A || "2" == e.BetTeam && t - i.H < n - i.A || "x" == e.BetTeam && t - i.H == n - i.A ? a : o
    }
      , w = function(e, t, n, i, a, o) {
        var r = parseFloat(e.Hdp);
        return "1" == e.BetTeam && r + t - n > 0 || "2" == e.BetTeam && r + n - t > 0 || "x" == e.BetTeam && r - (t - n) == 0 ? a : o
    }
      , H = function(e, t, n, i, a, o) {
        return 25 == e.Bettype && t == n || 121 == e.Bettype && t > n || 122 == e.Bettype && t < n || 191 == e.Bettype && t == n ? 0 : "h" == e.BetTeam && t > n || "x" == e.BetTeam && t == n || "a" == e.BetTeam && t < n ? a : o
    }
      , C = function(e, t, n, i, a, o) {
        var r = t + n;
        return 179 == e.Bettype ? "g0" == e.BetTeam && 0 == r || "g1" == e.BetTeam && 1 == r || "g2" == e.BetTeam && 2 == r || "g3" == e.BetTeam && 3 == r || "g4" == e.BetTeam && r > 3 ? a : o : "g0" == e.BetTeam && 0 == r || "g1" == e.BetTeam && 1 == r || "g2" == e.BetTeam && 2 == r || "g3" == e.BetTeam && 3 == r || "g4" == e.BetTeam && 4 == r || "g5" == e.BetTeam && 5 == r || "g6" == e.BetTeam && r > 5 ? a : o
    }
      , L = function(e, t, n, i, a, o) {
        var r = 161 == e.Bettype || 181 == e.Bettype ? t : n;
        return "g0" == e.BetTeam && 0 == r || "g1" == e.BetTeam && 1 == r || "g2" == e.BetTeam && 2 == r || "g3" == e.BetTeam && r > 2 ? a : o
    }
      , k = function(e, t, n, i, a, o) {
        var r = t + n - parseFloat(e.Hdp);
        switch (e.BetTeam) {
        case "ho":
            return t > n && r > 0 ? a : o;
        case "hu":
            return t > n && r < 0 ? a : o;
        case "ao":
            return t < n && r > 0 ? a : o;
        case "au":
            return t < n && r < 0 ? a : o;
        case "do":
            return t == n && r > 0 ? a : o;
        case "du":
            return t == n && r < 0 ? a : o
        }
    }
      , $ = function(e, t, n, i, a, o) {
        var r = t - n;
        switch (e.BetTeam) {
        case "h1":
            return t > n && 1 == r ? a : o;
        case "h2":
            return t > n && 2 == r ? a : o;
        case "h2+":
            return t > n && r >= 2 ? a : o;
        case "h3":
            return t > n && r > 2 ? a : o;
        case "a1":
            return t < n && -1 == r ? a : o;
        case "a2":
            return t < n && -2 == r ? a : o;
        case "a2+":
            return t < n && r < -1 ? a : o;
        case "a3":
            return t < n && r < -2 ? a : o;
        case "ng":
            return t + n == 0 ? a : o;
        case "d":
            return t + n != 0 && t == n ? a : o
        }
    }
      , B = function(e, t, n, i, a, o) {
        var r = parseFloat(e.Hdp);
        "h" == e.BetTeam && (r *= -1);
        var s = t - i.H - r - (n - i.A);
        return "a" == e.BetTeam && (s = -s),
        s > 0 ? s >= .5 ? a : a / 2 : 0 == s ? parseInt(e.OddsSpread, 10) >= 0 ? a * parseInt(e.OddsSpread, 10) / 100 : parseInt(removeCommasFunc(e.Stake), 10) * parseInt(e.OddsSpread, 10) / 100 : s <= -.5 ? o : o / 2
    }
      , M = function(e, t, n, i, a, o) {
        var r = t + n - parseFloat(e.Hdp);
        return "a" == e.BetTeam && (r = -r),
        r > 0 ? r >= .5 ? a : a / 2 : 0 == r ? parseInt(e.OddsSpread, 10) >= 0 ? a * parseInt(e.OddsSpread, 10) / 100 : parseInt(removeCommasFunc(e.Stake), 10) * parseInt(e.OddsSpread, 10) / 100 : r <= -.5 ? o : o / 2
    }
      , b = function(e, t, n, i, a, o) {
        if ("aos" == e.BetTeam.toLowerCase()) {
            var r = e.Aos.replace(/\:/g, "")
              , s = t.toString() + n.toString();
            return -1 == r.indexOf(s) ? a : o
        }
        var c = parseInt(e.BetTeam.replace(":", "").substr(0, 1), 10)
          , l = parseInt(e.BetTeam.replace(":", "").substr(1, 1), 10);
        return c == t && l == n ? a : o
    }
      , O = function(e, t, n, i, a, o) {
        var r = t - parseFloat(e.Hdp);
        return "u" == e.BetTeam && (r = -r),
        r > 0 ? r >= .5 ? a : a / 2 : 0 == r ? 0 : r <= -.5 ? o : o / 2
    }
      , E = function(e, t, n, i, a, o) {
        var r = n - parseFloat(e.Hdp);
        return "u" == e.BetTeam && (r = -r),
        r > 0 ? r >= .5 ? a : a / 2 : 0 == r ? 0 : r <= -.5 ? o : o / 2
    }
      , _ = function(e, t, n, i, a, o) {
        switch (e.BetTeam) {
        case "yh":
            return t > n && t > 0 && n > 0 ? a : o;
        case "ya":
            return t < n && t > 0 && n > 0 ? a : o;
        case "yd":
            return t == n && t > 0 && n > 0 ? a : o;
        case "nh":
            return t > n && (0 == t || 0 == n) ? a : o;
        case "na":
            return t < n && (0 == t || 0 == n) ? a : o;
        case "nd":
            return t != n || 0 != t && 0 != n ? o : a
        }
    }
      , I = function(e, t, n, i, a, o) {
        var r = t + n - parseFloat(e.Hdp);
        switch ("yu" != e.BetTeam && "nu" != e.BetTeam || (r = -r),
        e.BetTeam) {
        case "yo":
        case "yu":
            return t > 0 && n > 0 ? r > 0 ? a : 0 == r ? 0 : o : o;
        case "no":
        case "nu":
            return 0 == t || 0 == n ? r > 0 ? a : 0 == r ? 0 : o : o
        }
    }
      , A = {};
    A[1] = {
        Func: m,
        isHT: !1,
        is2HT: !1
    },
    A[7] = {
        Func: m,
        isHT: !0,
        is2HT: !1
    },
    A[2] = {
        Func: p,
        isHT: !1,
        is2HT: !1
    },
    A[428] = {
        Func: d,
        isHT: !1,
        is2HT: !0
    },
    A[184] = {
        Func: d,
        isHT: !1,
        is2HT: !0
    },
    A[12] = {
        Func: p,
        isHT: !0,
        is2HT: !1
    },
    A[3] = {
        Func: f,
        isHT: !1,
        is2HT: !1
    },
    A[8] = {
        Func: f,
        isHT: !0,
        is2HT: !1
    },
    A[4] = {
        Func: g,
        isHT: !1,
        is2HT: !1
    },
    A[30] = {
        Func: g,
        isHT: !0,
        is2HT: !1
    },
    A[5] = {
        Func: T,
        isHT: !1,
        is2HT: !1
    },
    A[15] = {
        Func: T,
        isHT: !0,
        is2HT: !1
    },
    A[430] = {
        Func: T,
        isHT: !1,
        is2HT: !0
    },
    A[177] = {
        Func: T,
        isHT: !1,
        is2HT: !0
    },
    A[6] = {
        Func: y,
        isHT: !1,
        is2HT: !1
    },
    A[126] = {
        Func: y,
        isHT: !0,
        is2HT: !1
    },
    A[13] = {
        Func: function(e, t, n, i, a, o) {
            return "hy" == e.BetTeam && 0 == n || "hn" == e.BetTeam && n > 0 || "ay" == e.BetTeam && 0 == t || "an" == e.BetTeam && t > 0 ? a : o
        },
        isHT: !1,
        is2HT: !1
    },
    A[24] = {
        Func: S,
        isHT: !1,
        is2HT: !1
    },
    A[431] = {
        Func: v,
        isHT: !1,
        is2HT: !0
    },
    A[186] = {
        Func: v,
        isHT: !1,
        is2HT: !0
    },
    A[25] = {
        Func: H,
        isHT: !1,
        is2HT: !1
    },
    A[26] = {
        Func: function(e, t, n, i, a, o) {
            return "b" == e.BetTeam && t + n >= 2 && 0 != t && 0 != n || "o" == e.BetTeam && (0 == n || 0 == t) && t + n >= 1 || "n" == e.BetTeam && n + t == 0 ? a : o
        },
        isHT: !1,
        is2HT: !1
    },
    A[27] = {
        Func: function(e, t, n, i, a, o) {
            return "h" == e.BetTeam && t > 0 && 0 == n || "a" == e.BetTeam && n > 0 && 0 == t ? a : o
        },
        isHT: !1,
        is2HT: !1
    },
    A[28] = {
        Func: w,
        isHT: !1,
        is2HT: !1
    },
    A[121] = {
        Func: H,
        isHT: !1,
        is2HT: !1
    },
    A[122] = {
        Func: H,
        isHT: !1,
        is2HT: !1
    },
    A[123] = {
        Func: function(e, t, n, i, a, o) {
            return "h" == e.BetTeam && t == n || "a" == e.BetTeam && t != n ? a : o
        },
        isHT: !1,
        is2HT: !1
    },
    A[144] = {
        Func: k,
        isHT: !1,
        is2HT: !1
    },
    A[143] = {
        Func: k,
        isHT: !0,
        is2HT: !1
    },
    A[151] = {
        Func: S,
        isHT: !0,
        is2HT: !1
    },
    A[157] = {
        Func: p,
        isHT: !1,
        is2HT: !1
    },
    A[159] = {
        Func: C,
        isHT: !1,
        is2HT: !1
    },
    A[161] = {
        Func: L,
        isHT: !1,
        is2HT: !1
    },
    A[162] = {
        Func: L,
        isHT: !1,
        is2HT: !1
    },
    A[163] = {
        Func: k,
        isHT: !1,
        is2HT: !1
    },
    A[171] = {
        Func: $,
        isHT: !1,
        is2HT: !1
    },
    A[179] = {
        Func: C,
        isHT: !0,
        is2HT: !1
    },
    A[181] = {
        Func: L,
        isHT: !0,
        is2HT: !1
    },
    A[182] = {
        Func: L,
        isHT: !0,
        is2HT: !1
    },
    A[188] = {
        Func: function(e, t, n, i, a, o) {
            return "y" == e.BetTeam && t > 0 && n > 0 || "n" == e.BetTeam && (0 == n || 0 == t) ? a : o
        },
        isHT: !0,
        is2HT: !1
    },
    A[191] = {
        Func: H,
        isHT: !0,
        is2HT: !1
    },
    A[301] = {
        Func: B,
        isHT: !1,
        is2HT: !1
    },
    A[302] = {
        Func: M,
        isHT: !1,
        is2HT: !1
    },
    A[303] = {
        Func: B,
        isHT: !0,
        is2HT: !1
    },
    A[304] = {
        Func: M,
        isHT: !0,
        is2HT: !1
    },
    A[413] = {
        Func: b,
        isHT: !1,
        is2HT: !1
    },
    A[414] = {
        Func: b,
        isHT: !0,
        is2HT: !1
    },
    A[401] = {
        Func: O,
        isHT: !1,
        is2HT: !1
    },
    A[403] = {
        Func: O,
        isHT: !0,
        is2HT: !1
    },
    A[461] = {
        Func: O,
        isHT: !1,
        is2HT: !1
    },
    A[463] = {
        Func: O,
        isHT: !0,
        is2HT: !1
    },
    A[402] = {
        Func: E,
        isHT: !1,
        is2HT: !1
    },
    A[404] = {
        Func: E,
        isHT: !0,
        is2HT: !1
    },
    A[462] = {
        Func: E,
        isHT: !1,
        is2HT: !1
    },
    A[464] = {
        Func: E,
        isHT: !0,
        is2HT: !1
    },
    A[405] = {
        Func: function(e, t, n, i, a, o) {
            if ("aos" == e.BetTeam.toLowerCase()) {
                var r = e.Aos.replace(/\:/g, "")
                  , s = (t - i.H).toString() + (n - i.A).toString();
                return -1 == r.indexOf(s) ? a : o
            }
            var c = parseInt(e.BetTeam.replace(":", "").substr(0, 1), 10) - i.H
              , l = parseInt(e.BetTeam.replace(":", "").substr(1, 1), 10) - i.A;
            return c == t && l == n ? a : o
        },
        isHT: !1,
        is2HT: !0
    },
    A[412] = {
        Func: y,
        isHT: !0,
        is2HT: !1
    },
    A[426] = {
        Func: $,
        isHT: !0,
        is2HT: !1
    },
    A[429] = {
        Func: y,
        isHT: !1,
        is2HT: !0
    },
    A[417] = {
        Func: _,
        isHT: !1,
        is2HT: !1
    },
    A[418] = {
        Func: I,
        isHT: !1,
        is2HT: !1
    },
    A[449] = {
        Func: function(e, t, n, i, a, o) {
            var r = parseFloat(e.Hdp);
            return "1xo" == e.BetTeam && t >= n && t + n - r > 0 || "1xu" == e.BetTeam && t >= n && r - (t + n) > 0 || "2xo" == e.BetTeam && n >= t && t + n - r > 0 || "2xu" == e.BetTeam && n >= t && r - (t + n) > 0 || "12u" == e.BetTeam && t != n && r - (t + n) > 0 || "12o" == e.BetTeam && t != n && t + n - r > 0 ? a : o
        },
        isHT: !1,
        is2HT: !1
    },
    A[450] = {
        Func: function(e, t, n, i, a, o) {
            var r = parseFloat(e.Hdp)
              , s = (t + n) % 2;
            return "oo" == e.BetTeam && t + n - r > 0 && s > 0 || "ou" == e.BetTeam && r - (t + n) > 0 && s > 0 || "eo" == e.BetTeam && t + n - r > 0 && 0 == s || "eu" == e.BetTeam && r - (t + n) > 0 && 0 == s ? a : o
        },
        isHT: !1,
        is2HT: !1
    },
    A[451] = {
        Func: function(e, t, n, i, a, o) {
            parseFloat(e.Hdp);
            return "y1x" == e.BetTeam && t >= n && t > 0 && n > 0 || "y12" == e.BetTeam && t != n && t > 0 && n > 0 || "y2x" == e.BetTeam && t <= n && t > 0 && n > 0 || "n1x" == e.BetTeam && t >= n && (0 == t || 0 == n) || "n12" == e.BetTeam && t != n && (0 == t || 0 == n) || "n2x" == e.BetTeam && t <= n && (0 == t || 0 == n) ? a : o
        },
        isHT: !1,
        is2HT: !1
    },
    A[453] = {
        Func: w,
        isHT: !0,
        is2HT: !1
    },
    A[456] = {
        Func: _,
        isHT: !0,
        is2HT: !1
    },
    A[457] = {
        Func: I,
        isHT: !0,
        is2HT: !1
    },
    A[458] = {
        Func: F,
        isHT: !1,
        is2HT: !1
    },
    A[459] = {
        Func: F,
        isHT: !0,
        is2HT: !1
    }
}, ScoreMapForecast = function() {
    function e(e, t, i) {
        var a = $(parent.leftx.document.getElementById("BPstake"));
        g.afterChange = function(e) {
            var t = !0;
            if (n() && i == fFrame.leftx.g_BetProcesCurrMatchid) {
                var o = $(parent.leftx.document.getElementById("bp_Match")).val().toLowerCase().split("_");
                null == r.getTicket(o[0] + o[1]) ? (r.addTicket(i, o[0], o[1], parent.leftx.document.getElementById("bodds").innerHTML, 0, a.val()),
                r.updateMatchData(!0)) : r.changeStake(o[0] + o[1], a.val())
            } else
                l.stopWatcher(),
                t = !1;
            return t
        }
        ,
        l.stopWatcher(),
        a.bind("focus", function() {
            g.watchForChange(a.get(0))
        }),
        a.bind("blur", function() {
            g.cancelWatchForChange()
        }),
        g.watchForChange(a.get(0))
    }
    function t(t, a, m, d, f, g, S, v, F, w) {
        if (null == c && jQuery.ajax({
            type: "get",
            url: "TickScoreMap_tmpl.php",
            data: {},
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            cache: !1,
            async: !1,
            error: function(e) {
                alert("Request error " + e)
            },
            success: function(e) {
                "" != e && (o = $(e).find("#ScoreMapDivTmpl").html(),
                c = $(e).find("#scoremapArea"))
            }
        }),
        r = function(e) {
            var t = s[e];
            return null == t && (t = new ScoreMapData(e),
            s[e] = t),
            t
        }(t),
        n()) {
            var H = $(p).scrollTop()
              , C = $(p).scrollTop() + $(p).height()
              , L = $(p.document.getElementById("ScoreMapDiv")).position().top;
            (L < H || L > C) && l.Close()
        }
        y == t && null != r.getTicket(d + f) && u.isOpened || ((u = function() {
            null == p.document.getElementById("ScoreMapDiv") && (null != p.document.getElementById("sidebar") ? $(o).appendTo(p.document.getElementById("sidebar")) : $(o).appendTo(p.document.body));
            var e = p.document.getElementById("ScoreMapDiv")
              , t = p.document.getElementById("ScoreMapTitle")
              , n = p.document.getElementById("ScoreMapCloser");
            return void 0 !== p.DivLauncher ? new p.DivLauncher(e,t,n,p) : new DivLauncher(e,t,n,p)
        }()).beforeClose = function() {
            return fFrame.rightx.$("#scoremapmsg").css("visibility", "hidden"),
            !0
        }
        ,
        u.setDEFAULT_X(a),
        u.setDEFAULT_Y(m),
        T = {
            HomeScore: -1,
            AwayScore: -1
        },
        h = {
            HomeScore: -1,
            AwayScore: -1
        }),
        y = t,
        null != d && "" != v ? (r.addTicket(t, d, f, g, S, v, F, w),
        r.onUpdateScoreMap = function(n) {
            i(n),
            e(0, 0, t)
        }
        ) : r.onUpdateScoreMap = i,
        r.updateMatchData(!1)
    }
    function n() {
        var e = p.document.getElementById("ScoreMapDiv");
        if (null == e || "visible" != e.style.visibility) {
            try {
                null != u && u.isOpened && u.close()
            } catch (e) {
                u.isOpened = !1
            }
            return !1
        }
        return !0
    }
    function i(e, t) {
        if (e.wcount > 0) {
            if ((t = null == t ? 0 : t) > 3)
                return void l.Refresh();
            t > -1 && (a(e.NowFTScoreMap),
            a(e.NowHTScoreMap),
            a(e.NowSHTScoreMap),
            clearTimeout(f),
            t++,
            f = setTimeout(function() {
                n() && i(e, t)
            }, 1500))
        } else
            clearTimeout(f);
        var o = $(u.popDiv).find("#ScoreMapContainer")
          , r = $(u.titleDiv).find("#popScoreTitle")
          , s = e.HName + " -vs- " + e.AName;
        if (r.html(s),
        r.attr("title", s),
        o.empty(),
        c.tmpl(e).appendTo(o),
        !u.isOpened) {
            if (null != m) {
                var p = u.getDEFAULT_X()
                  , T = getDivW(u.popDiv);
                p + T > m && u.setDEFAULT_X(p - (p + T - m))
            }
            if (null != d) {
                var h = u.getDEFAULT_Y()
                  , y = getDivH(u.popDiv);
                h + y > d && u.setDEFAULT_Y(h - (h + y - y))
            }
            u.open(u.getDEFAULT_X(), u.getDEFAULT_Y(), CheckIScroll())
        }
        null != S && S()
    }
    function a(e) {
        var t = e.Map;
        e.Map = e.Map2,
        e.Map2 = t,
        1 == e.isWait ? e.isWait = 2 : 2 == e.isWait && (e.isWait = 1)
    }
    var o, r, s = {}, c = null, l = this, u = null, m = 790, d = null, p = parent.rightx, f = null, T = {
        HomeScore: -1,
        AwayScore: -1
    }, h = {
        HomeScore: -1,
        AwayScore: -1
    }, y = null;
    this.stopWatcher = function() {
        var e = $(parent.leftx.document.getElementById("BPstake"));
        g.cancelWatchForChange(),
        e.unbind("focus"),
        e.unbind("blur")
    }
    ;
    var g = {
        timeout: null,
        currentValue: "",
        watchForChange: function(e) {
            clearTimeout(this.timeout);
            var t = !0;
            e.value != this.currentValue && (t = this.changed(e)),
            t && "none" != parent.leftx.document.getElementById("BetProcessContainer").style.display && (this.timeout = setTimeout(function() {
                g.watchForChange(e)
            }, 200))
        },
        cancelWatchForChange: function() {
            clearTimeout(this.timeout),
            this.timeout = null
        },
        changed: function(e) {
            return this.currentValue = e.value,
            null == this.afterChange || this.afterChange()
        },
        afterChange: null
    };
    this.changeStake = function(e, t, n) {
        r.changeStake("" + e + t, n)
    }
    ,
    this.openScoreMap = function(e, n, i, a, o, r, s, c, l, u) {
        void 0 === p.DivLauncher ? importJS("commJs/DivLauncher.js", "parent.rightx.DivLauncher", function() {
            t(e, n, i, a, o, r, s, c, l, u)
        }, p) : t(e, n, i, a, o, r, s, c, l, u)
    }
    ;
    var S = null;
    this.BetProcess = function(t, n, a, o, s, c) {
        try {
            var u = n.srcElement ? n.srcElement : n.target;
            if ("checkbox" == u.type || "icon-close" == u.className)
                return;
            $(t).attr("onclick", ""),
            $(t).unbind(),
            l.setTicketEnable(a, o, !0),
            r.onUpdateScoreMap = function(t) {
                i(t),
                e(0, 0, r.Matchid())
            }
            ,
            fFrame.leftx.DoBetProcess(a, o, s, "0" == c ? "" : c),
            l.Refresh()
        } catch (e) {}
    }
    ,
    this.setTicketEnable = function(e, t, n) {
        r.setTicketEnable(e + t, n)
    }
    ,
    this.Refresh = function(e) {
        if (n()) {
            var t = p.document.getElementById("ScoreMapRefresh");
            t.className = "btnIcon black right disable",
            r.updateMatchData(!0, e),
            S = function() {
                t.className = "btnIcon black right",
                S = null
            }
        }
    }
    ,
    this.removeAllTicket = function() {
        r.removeAllTicket()
    }
    ,
    this.removeTicket = function(e, t, i) {
        if (null == i)
            r.removeTicket("" + e + t);
        else {
            var a = s[i];
            null != a && (a.removeTicket("" + e + t, n()),
            setTimeout(function() {
                n() && i == r.Matchid() && l.Refresh()
            }, 2e3))
        }
    }
    ,
    this.IsOpen = function() {
        return n()
    }
    ,
    this.Close = function() {
        try {
            null != u && u.isOpened && u.close(),
            $("#scoremapmsg").css("visibility", "hidden")
        } catch (e) {
            u.isOpened = !1
        }
    }
    ,
    this.openMark = function(e, t, n) {
        var i = {
            h: 0,
            a: 0
        }
          , a = {
            h: 99,
            a: 99
        };
        return 0 == n && -1 != h.HomeScore && -1 != h.AwayScore && (a.h = h.HomeScore,
        a.a = h.AwayScore),
        1 == n && -1 != T.HomeScore && -1 != T.AwayScore && (i.h = T.HomeScore,
        i.a = T.AwayScore),
        !(e >= i.h && e <= a.h && t >= i.a && t <= a.a)
    }
    ,
    this.getColor = function(e, t, n, i, a) {
        var o = "#F5F3F2";
        n && (o = "#FFCCBC"),
        !n && i && (o = "#FFDDD2");
        var r = null;
        return (r = 0 == a ? T : h).HomeScore == e && r.AwayScore == t && (o = "#FFFF73"),
        o
    }
    ,
    this.ChkMap = function(e, t, n, i) {
        var a = !0;
        return 0 == i ? -1 != h.HomeScore && (t > h.HomeScore || n > h.AwayScore) && (a = !1) : -1 != T.HomeScore && (t < T.HomeScore || n < T.AwayScore) && (a = !1),
        null != e && (e.style.cursor = a ? "pointer" : ""),
        a
    }
    ,
    this.ClickMap = function(e, t, n) {
        var a = null;
        l.ChkMap(null, e, t, n) && ((a = 0 == n ? T : h).HomeScore == e && a.AwayScore == t ? (a.HomeScore = -1,
        a.AwayScore = -1) : (a.HomeScore = e,
        a.AwayScore = t),
        i(r.getScoreMapInfo()))
    }
}, Score_TicketArea_CLOSE = "ScoreInfo close", Score_TicketArea_OPEN = "ScoreInfo", Score_MapArea_CLOSE = "maskSet displayOff", Score_MapArea_OPEN = "maskSet", g_SMF = new ScoreMapForecast, miniOdds = function() {
    function e() {
        jQuery.ajax({
            type: "get",
            url: "miniOdds_tmpl.php",
            data: {},
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            cache: !1,
            async: !1,
            error: function(e) {},
            success: function(e) {
                "" != e && (d = $(e).find("#minioddstmpl"),
                p = $(e).find("#LiveStreamingtmpl"),
                f = $(e).find("#minioddsDiv").html(),
                F = $(e).find("#ColossusBetPopup").html(),
                w = $(e).find("#SiteTransitionTip").html(),
                C = $(e).find("#PromoNewVersionPopup").html(),
                H = $(e).find("#SwitchNewVersionTip").html())
            }
        })
    }
    function t(t) {
        null == d && e();
        // var n = $(u.document).find("#minioddCcontainer");
        // n.empty(),
        // d.tmpl(function(e) {
        //     if (null != m && !e.renew)
        //         for (var t in e.data)
        //             for (var n in m.data)
        //                 if (e.data[t].SportName == m.data[n].SportName) {
        //                     for (var i in e.data[t].matchs)
        //                         for (var a in m.data[n].matchs)
        //                             if (e.data[t].matchs[i].Matchid == m.data[n].matchs[a].Matchid) {
        //                                 e.data[t].matchs[i].OddsH != m.data[n].matchs[a].OddsH && (e.data[t].matchs[i].Ischg = !0),
        //                                 e.data[t].matchs[i].ScoreH == m.data[n].matchs[a].ScoreH && e.data[t].matchs[i].ScoreA == m.data[n].matchs[a].ScoreA || (e.data[t].matchs[i].Scorechg = !0),
        //                                 e.data[t].matchs[i].Hdp != m.data[n].matchs[a].Hdp && (e.data[t].matchs[i].Hdpchg = !0);
        //                                 break
        //                             }
        //                     break
        //                 }
        //     return m = e
        // }(t)).appendTo(n),
        // $(u.document).find(".miniodds li a").each(function() {
        //     var e = this.id.split("_")[1];
        //     null == T[e] && (T[e] = !0),
        //     T[e] ? ($(this).addClass("current"),
        //     $(this).next(".miniContent").show()) : ($(this).removeClass("current"),
        //     $(this).next(".miniContent").hide()),
        //     $(this).click(function() {
        //         !function(e, t) {
        //             1 == T[e] ? ($(t).removeClass("current"),
        //             $(t).next(".miniContent").slideUp("fast")) : ($(t).addClass("current"),
        //             $(t).next(".miniContent").slideDown("fast"),
        //             $(t).next(".miniContent").find("div[name='teamName']").ellipsis(B));
        //             T[e] = !T[e]
        //         }(e, this)
        //     })
        // }),
        // $(u.document).find("div[name='teamName']").ellipsis(B),
        // $(u.document).find("#btnMiniOddsRefresh").attr("class", "btnIcon right"),
        clearTimeout(g),
        g = setTimeout(i, 2e4)
    }
    function n(t) {
        null == p && e();
        // var n = $(u.document).find("#streamingarray");
        // n.empty(),
        // p.tmpl(t).appendTo(n);
        // $(u.document).find(".LiveTV li > a").each(function() {
        //     var e = this.id.split("_")[1];
        //     null == k[e] && (k[e] = !0),
        //     k[e] ? ($(this).addClass("current"),
        //     $(this).next(".LiveTVContent").show()) : ($(this).removeClass("current"),
        //     $(this).next(".LiveTVContent").hide()),
        //     $(this).click(function() {
        //         var e = this.id.split("_")[1];
        //         $(this).hasClass("current") ? ($(this).next(".LiveTVContent").slideUp("fast"),
        //         $(this).removeClass("current"),
        //         k[e] = !1) : ($(this).addClass("current").next(".LiveTVContent").slideDown("fast"),
        //         k[e] = !0)
        //     })
        // });
        // try {
        //     u.addScrollbar("livestreamingCcontainer", !0)
        // } catch (e) {}
        // 0 == t.data.length ? $(u.document).find("#livetv").hide() : $(u.document).find("#livetv").show()
    }
    function i(e) {
        // $(u.document).find("#btnMiniOddsRefresh").attr("class", "btnIcon right disable"),
        null == e && (e = "");
        var i = {
            OddsType: e
        };
        !function(e, t) {
            jQuery.ajax({
                type: "get",
                url: "miniOdds_data.php",
                data: e,
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                cache: !1,
                async: !0,
                dataType: "json",
                error: function(e) {},
                success: function(e) {
                    "" != e && t(e)
                }
            })
        }(i, t),
        function(e, t) {
            jQuery.ajax({
                type: "get",
                url: "LiveStreamingData.php",
                data: e,
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                cache: !1,
                async: !0,
                dataType: "json",
                error: function(e) {},
                success: function(e) {
                    "" != e && t(e)
                }
            })
        }(i, n),
        // fFrame.IsRngPlayForFun || fFrame.CanSeeCrossSelling && !(fFrame.CanSeeCrossSellingPT > fFrame.CanSeeCrossSellingSettingPT) ? $(u.document).find("#fixed_slide").show() : $(u.document).find("#fixed_slide").hide(),
        E || (O = function(e) {
            "false" == fFrame.DisableCasino.toLowerCase() && "true" == fFrame.SyncCasino.toLowerCase() && setTimeout(function() {
                // $(u.document).find("#fixed_slide").hasClass("open") || ($(u.document).find(".fixed_slide").toggleClass("open"),
                // $(u.document).find("#CSarrow").attr("class", "arrow down_arrow"),
                // fFrame.topx.CrossSellingStatus = "open")
            }, e)
        }(3e3))
    }
    function a() {
        fFrame.CanSeeRngJackpot || fFrame.CanSeeColossusBet ? ($(u.document).find("#JackpotWinDiv").hide(),
        $(u.document).find("#JackpotArrowLeft").hide(),
        $(u.document).find("#JackpotArrowRight").hide(),
        fFrame.CanSeeRngJackpot && $.ajax({
            type: "get",
            url: "JackpotHandler.ashx",
            cache: !1,
            async: !0,
            dataType: "json",
            error: function(e) {},
            success: function(e) {
                setTimeout(a, 18e4);
                if (null != e.Jackpot[0]) {
                    var t = "javascript:fFrame.topx.OpenCrossSellingOneRNGGame('OneRNG', '" + e.Jackpot[0].No + "',960,720)"
                      , n = $(u.document).find("#tmpSwiper .casino-jackpot__banner img:first").attr("src");
                    n = n.substring(0, n.lastIndexOf("/")),
                    $(u.document).find("#tmpSwiper .casino-jackpot__banner img:first").attr("src", n + "/" + e.Jackpot[0].Image),
                    $(u.document).find("#tmpSwiper .casino-jackpot__banner").attr("href", t),
                    $(u.document).find("#tmpSwiper .casino-jackpot__text").html(e.Jackpot[0].Name),
                    $(u.document).find("#tmpSwiper .casino-jackpot__money").html(e.Jackpot[0].Money)
                }
                null != e.Win ? (I = !0,
                $(u.document).find("#JackpotWinDiv").show(),
                $(u.document).find("#JackpotWinUserName").html(e.Win.UserName),
                $(u.document).find("#JackpotWinWinTime").html(e.Win.WinTime),
                $(u.document).find("#JackpotWinWinMoney").html(e.Win.WinMoney),
                $(u.document).find("#JackpotWinWinGame").html(e.Win.WinGame),
                _ = setTimeout(function() {
                    $(u.document).find("#JackpotWinDiv").hide()
                }, 5e3)) : I = !1
            }
        })) : $(u.document).find("#cbswitch").hide()
    }
    function o(e) {
        $(u.document).find("#slides").slidesjs({
            width: 305,
            height: 165,
            navigation: !1,
            effect: {
                slide: {
                    speed: 900
                }
            },
            play: {
                active: !1,
                effect: "slide",
                interval: 3500,
                auto: !0,
                swap: !1,
                pauseOnHover: !0,
                restartDelay: 2500
            },
            pagination: {
                effect: "slide",
                play: {
                    restartDelay: 3e3
                }
            },
            callback: {
                complete: function(e) {
                    $(u.document).find("#slides > div > div img").length == e && ($(u.document).find("#slides").data("plugin_slidesjs").stop(!0),
                    S = setTimeout(function() {
                        $(u.document).find(".gaming li").removeClass("selected"),
                        $(u.document).find(".promotion-banner").fadeOut("normal"),
                        $(u.document).find("#gamingtitle").hide(),
                        $("#MiniOddsNewsTitle").removeClass("current"),
                        r(),
                        s(1e4)
                    }, 5e3))
                }
            }
        })
    }
    function r() {
        I && ($(u.document).find("#JackpotWinDiv").show(),
        I = !1,
        clearTimeout(_),
        _ = setTimeout(function() {
            $(u.document).find("#JackpotWinDiv").hide()
        }, 5e3))
    }
    function s(e) {
        b || (M = setTimeout(function() {
            $(u.document).find("#cbswitch").hasClass("open") && ($(u.document).find("#cbswitch").removeClass("open"),
            $(u.document).find("#CBarrow").attr("class", "arrow down_arrow"))
        }, e))
    }
    function c() {
        fFrame.IsShowLiveInfoSideView && ($(u.document).find("#MiniOddsNews").slideUp("slow"),
        $(u.document).find("#SmallLiveInfoFrame").attr("src", y),
        $(u.document).find("#SmallLiveInfoFrame").ready(function() {
            $(u.document).find("#SmallLiveInfo").slideDown("slow"),
            fFrame.rightx.AdjustLiveInfoReSize(),
            $(fFrame.rightx).resize(fFrame.rightx.AdjustLiveInfoReSize),
            $(fFrame.rightx).scroll(fFrame.rightx.AdjustLiveInfoReSize),
            $(fFrame.rightx).scroll(fFrame.rightx.SmallLiveInfoFixScrollHandler)
        }))
    }
    function l(e) {
        "none" != fFrame.topx.MiniOddsNews.parentNode.style.display ? ($gamingMenu = $(u.document).find(".gaming li"),
        $promotion = $(u.document).find(".promotion-banner > ul > li"),
        $banner = $(u.document).find(".promotion-banner"),
        "disable" != $gamingMenu.eq(0).attr("class") && ($gamingMenu.removeClass("selected"),
        $banner.hide(),
        $banner.fadeIn("normal"),
        $promotion.hide(),
        $promotion.eq(0).fadeIn("normal"))) : fFrame.rightx.document.getElementById("gamingtitle").style.display = "none"
    }
    var u, m = null, d = null, p = null, f = null, T = new Array, h = !1, y = null, g = null, S = null, v = null, F = null, w = null, H = null, C = null, L = null, k = new Array, B = {
        ellipsis: "...",
        setTitle: "never",
        live: !1,
        maxWords: 10
    }, M = null, b = !1, O = null, E = !1;
    this.closeCB = function() {
        s(1e4)
    }
    ,
    this.clearCrossSellingTimer = function() {
        E = !0,
        clearTimeout(O)
    }
    ,
    this.clearCBTimer = function() {
        b = !0,
        clearTimeout(M)
    }
    ,
    this.clickOdds = function(e, t, n, i) {
        fFrame.leftx.$("#BPMinMaxBetAlert").css("display", "none"),
        fFrame.leftx.$("#BPOddsChangeAlert").css("display", "none"),
        fFrame.leftx.DoBetProcess(e, t, n, null, !0, i)
    }
    ,
    this.Refresh = function(e) {
        i(e)
    }
    ,
    this.SetLiveInfo = function(e, t) {
        h = e,
        y = t
    }
    ,
    this.CloseNews = function() {
        try {
            $(u.document).find("#gamingtitle").slideUp("fast"),
            $gamingMenu.removeClass("selected"),
            $("#MiniOddsNewsTitle").removeClass("current")
        } catch (e) {}
        clearTimeout(S)
    }
    ,
    this.InitForIPad = function() {
        null == u && (u = fFrame.rightx),
        null != d && null != p || e()
    }
    ,
    this.Init = function() {
        null == u && (u = fFrame.rightx);
        for (var t = ["allstatement.php", "bettingstatement.php", "dbetlist.php", "userbetsummary.php", "betlist.php", "result.php", "resultoutright.php"], n = u.document.location.pathname, r = 0; r < t.length; r++)
            if (n.toLowerCase().indexOf(t[r]) > -1)
                return;
        null != d && null != p || e(),
        $(f).prependTo(u.document.body),
        u.addScrollbar("livestreamingCcontainer", !1),
        null == v ? (v = $(u.document).find(".main-banner").html(),
        $("#MiniOddsNewsTitle").addClass("current"),
        o()) : ($(u.document).find("#gamingtitle").hide(),
        $(u.document).find(".promotion-banner").hide(),
        $("#MiniOddsNewsTitle").removeClass("current"),
        fFrame.topx.OpenMiniBanner = "open"),
        $(u.document).find("#gamingtitle").css("padding", ""),
        L = $(u.document).find("#promotionBannerTitle").html(),
        h ? window.setTimeout(c, 5e3) : ($(u.document).find("#SmallLiveInfoFrame").slideDown("slow"),
        $(u.document).find("#MiniOddsNews").ready(function() {
            $(u.document).find("#MiniOddsNews").slideDown("slow")
        })),
        a(),
        $gamingMenu = $(u.document).find(".gaming > ul > li"),
        $promotion = $(u.document).find(".promotion-banner > ul > li"),
        $gamingMenu.click(function() {
            $(this).hasClass("disable") || ($(u.document).find(".promotion-banner").fadeIn("fast"),
            $promotion.hide(),
            $promotion.eq($(this).index()).fadeIn("fast"),
            0 == $(this).index() ? ($(u.document).find(".main-banner").html(v),
            $(u.document).find("#promotionBannerTitle").html(L),
            o()) : $(u.document).find("#promotionBannerTitle").html("&nbsp"),
            clearTimeout(S))
        }),
        null == S && l(),
        i(),
        ("false" == fFrame.DisableCasino.toLowerCase() && "true" == fFrame.SyncCasino.toLowerCase() || fFrame.IsRngPlayForFun) && ("open" == fFrame.topx.CrossSellingStatus || "" != fFrame.topx.OpenMiniBanner && "" == fFrame.topx.CrossSellingStatus || fFrame.IsRngPlayForFun) && ($(u.document).find(".fixed_slide").toggleClass("open"),
        $(u.document).find("#CSarrow").attr("class", "arrow down_arrow"),
        fFrame.topx.CrossSellingStatus = "open")
    }
    ;
    var _, I = !1;
    this.SetWhatIsNews = function() {
        $(u.document).find("#gamingtitle").is(":visible") ? (clearTimeout(S),
        $(u.document).find("#gamingtitle").hide(),
        r(),
        $("#MiniOddsNewsTitle").removeClass("current")) : ($(u.document).find("#gamingtitle").show(),
        $("#MiniOddsNewsTitle").addClass("current"),
        $(u.document).find(".main-banner").html(v),
        $(u.document).find("#promotionBannerTitle").html(L),
        o(),
        l())
    }
    ,
    this.ShowColossusBetPopup = function() {
        "False" != getCookie("OpenColossusBetPopup") ? $(u.document).find("#ColossusBetPopup").length > 0 ? $(u.document).find("#ColossusBetPopup").show() : ($(F).prependTo(u.document.body),
        $(u.document).find("#ColossusBetPopupClose").click(function() {
            $(u.document).find("#ColossusBetPopup").hide(),
            parent.leftx.OpenColossusBet()
        }),
        $(u.document).find("#ColossusBetPopupConfirm").click(function() {
            if ($(u.document).find("#Mobile").val()) {
                if (!function(e) {
                    for (var t, n = 0; n < e.length; n++)
                        if (t = e.substr(n, 1),
                        -1 == "0123456789+-".indexOf(t))
                            return !1;
                    return "0" != e
                }($(u.document).find("#Mobile").val()))
                    return void $(u.document).find("#MobileAlert").show();
                $(u.document).find("#MobileAlert").hide()
            }
            if ($(u.document).find("#Email").val()) {
                if (!function(e) {
                    var t = '[^\\s\\(\\)<>@,;:\\\\\\"\\.\\[\\]]+'
                      , n = "(" + t + '|("[^"]*"))'
                      , i = new RegExp("^" + n + "(\\." + n + ")*$")
                      , a = new RegExp("^" + t + "(\\." + t + ")*$")
                      , o = e.match(/^(.+)@(.+)$/);
                    if (null == o)
                        return !1;
                    var r = o[1]
                      , s = o[2];
                    if (null == r.match(i))
                        return !1;
                    var c = s.match(/^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})\]$/);
                    if (null != c) {
                        for (var l = 1; l <= 4; l++)
                            if (c[l] > 255)
                                return !1;
                        return !0
                    }
                    if (null == s.match(a))
                        return !1;
                    var u = new RegExp(t,"g")
                      , m = s.match(u)
                      , d = m.length;
                    if (m[m.length - 1].length < 2 || m[m.length - 1].length > 4)
                        return !1;
                    if (d < 2)
                        return !1;
                    return !0
                }($(u.document).find("#Email").val()))
                    return void $(u.document).find("#EmailAlert").show();
                $(u.document).find("#EmailAlert").hide()
            }
            $(u.document).find("#ColossusBetPopup").hide(),
            parent.leftx.OpenColossusBet(),
            $.ajax({
                url: "ColossusBetPopupHandle.ashx",
                type: "GET",
                dataType: "json",
                data: {
                    mobile: $(u.document).find("#SelectMobileCountry").attr("value") + "-" + $(u.document).find("#Mobile").val(),
                    email: $(u.document).find("#Email").val()
                },
                async: !0,
                cache: !1,
                success: function(e) {
                    "Success" == e.Message && u.document.getElementById("cbColossusBetPopup").checked && setCookie("OpenColossusBetPopup", "False", 365, "", fFrame.DomainName)
                },
                complete: function() {},
                error: function(e, t, n) {}
            })
        })) : parent.leftx.OpenColossusBet()
    }
    ,
    this.ShowSiteTransitionTip = function() {
        if (void 0 !== u) {
            var e = $(u.document).find("#SiteTransitionTip");
            e.length > 0 ? e.show() : $(w).prependTo(u.document.body)
        }
    }
    ,
    this.ShowSwitchNewVersionTip = function() {
        if (void 0 !== u) {
            var e = $(u.document).find("#SwitchNewVersionTip");
            e.length > 0 ? (e.show(),
            setTimeout(function() {
                e.hide()
            }, 6e3)) : ($(H).prependTo(u.document.body),
            setTimeout(function() {
                $(u.document).find("#SwitchNewVersionTip").hide()
            }, 6e3))
        }
    }
    ,
    this.ShowPromoNewVersionPopup = function() {
        if (void 0 !== u) {
            var e = $(u.document).find("#PromoNewVersionPopup");
            e.length > 0 ? e.show() : $(C).prependTo(u.document.body),
            fFrame.IsShowPromoNewVersion = !1
        }
    }
}, miniOddsObj = new miniOdds;