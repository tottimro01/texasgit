function ChkOpener() {
    null == window.opener && (window.open("", "_self", ""),
    window.opener = null,
    window.close())
}
function CloseWindow() {
    window.opener = null,
    window.close()
}
function getParent(e) {
    for (var t = e, n = 0; n < 4; n++) {
        if (null != t.SiteMode)
            return t;
        if (null == t.parent)
            return null;
        t = t.parent
    }
    return null
}
function StandalonePlayer() {
    window.moveTo(0, 0);
    var e = document.getElementById("mintxtdiv")
      , t = document.getElementById("maxtxtdiv");
    e.disabled = !0,
    t.disabled = !0,
    null != document.getElementById("containerhead") && "block" == document.getElementById("containerhead").style.display ? (bStandalonePlayer = !0,
    document.getElementById("containerhead").style.display = "none",
    document.getElementById("containerhead").style.visibility = "hidden",
    document.getElementById("containerleft").style.display = "none",
    document.getElementById("containerleft").style.visibility = "hidden",
    document.getElementById("footer").style.display = "none",
    document.getElementById("footer").style.visibility = "hidden",
    document.getElementById("minimgdiv").style.display = "none",
    document.getElementById("minimgdiv").style.visibility = "hidden",
    document.getElementById("maximgdiv").style.display = "block",
    document.getElementById("maximgdiv").style.visibility = "visible",
    document.getElementById("mintxtdiv").style.display = "none",
    document.getElementById("mintxtdiv").style.visibility = "hidden",
    document.getElementById("maxtxtdiv").style.display = "block",
    document.getElementById("maxtxtdiv").style.visibility = "visible",
    document.getElementById("blueArea").style.display = "none") : (bStandalonePlayer = !1,
    document.getElementById("containerhead").style.display = "block",
    document.getElementById("containerhead").style.visibility = "visible",
    document.getElementById("containerleft").style.display = "inline-block",
    document.getElementById("containerleft").style.visibility = "visible",
    document.getElementById("footer").style.display = "block",
    document.getElementById("footer").style.visibility = "visible",
    document.getElementById("minimgdiv").style.display = "block",
    document.getElementById("minimgdiv").style.visibility = "visible",
    document.getElementById("maximgdiv").style.display = "none",
    document.getElementById("maximgdiv").style.visibility = "hidden",
    document.getElementById("mintxtdiv").style.display = "block",
    document.getElementById("mintxtdiv").style.visibility = "visible",
    document.getElementById("maxtxtdiv").style.display = "none",
    document.getElementById("maxtxtdiv").style.visibility = "hidden",
    document.getElementById("blueArea").style.display = "block",
    "151" == ScheduleType || "152" == ScheduleType || "153" == ScheduleType ? (document.getElementById("FrameValidation").width = 484,
    document.getElementById("leftcont").src = "StreamingSchedule.php?Type=" + ScheduleType,
    window.leftcont.location.href = "StreamingSchedule.php?Type=" + ScheduleType,
    SwitchTopButton(151)) : "160" == ScheduleType ? (document.getElementById("leftcont").src = "StreamingSchedule.php?Type=160",
    window.leftcont.location.href = "StreamingSchedule.php?Type=160",
    SwitchTopButton(160)) : "161" == ScheduleType || "164" == ScheduleType ? (document.getElementById("leftcont").src = "StreamingSchedule.php?Type=161",
    window.leftcont.location.href = "StreamingSchedule.php?Type=161",
    SwitchTopButton(161)) : (document.getElementById("leftcont").src = "StreamingSchedule.php?Type=1",
    window.leftcont.location.href = "StreamingSchedule.php?Type=1")),
    Resize(bStandalonePlayer),
    e.disabled = !1,
    t.disabled = !1
}
function SwitchTopButton(e) {
    switch (null != document.getElementById("sportbutton") && (document.getElementById("sportbutton").className = ""),
    null != document.getElementById("racingbutton") && (document.getElementById("racingbutton").className = ""),
    null != document.getElementById("numbergamebutton") && (document.getElementById("numbergamebutton").className = ""),
    null != document.getElementById("lucky3button") && (document.getElementById("lucky3button").className = ""),
    e) {
    case 151:
    case 152:
    case 153:
        null != document.getElementById("racingbutton") && (document.getElementById("racingbutton").className = "current");
        break;
    case 160:
        null != document.getElementById("lucky3button") && (document.getElementById("lucky3button").className = "current");
        break;
    case 161:
    case 164:
        null != document.getElementById("numbergamebutton") && (document.getElementById("numbergamebutton").className = "current");
        break;
    default:
        null != document.getElementById("sportbutton") && (document.getElementById("sportbutton").className = "current")
    }
}
function Resize(e) {
    try {
        var t = GetIBC_IsLogin();
        if (!isReSizeLoading && t) {
            var n = getParent(window.opener);
            ImgServURL = n.imgServerURL
        }
        t ? document.DataForm.submit() : CloseWindow(),
        AdjustSize(e),
        document.getElementById("containerMain").style.width = "100%",
        document.getElementById("containerMain").style.height = "100%",
        isReSizeLoading = !0
    } catch (e) {}
}
function AdjustSize(e) {
    if ($("body").removeClass("double"),
    $("body").removeClass("miniWin"),
    $("body").removeClass("maxWin"),
    $("body").removeClass("wbWin"),
    "5" == document.getElementById("HorseChannelID").value)
        if (1 == e) {
            $("body").addClass("double miniWin");
            try {
                window.resizeTo(1070, 590),
                window.outerWidth = 1085,
                window.outerHeight = 590
            } catch (e) {
                setTimeout("ResizeIE(1070,590,1085,590)", 1e3)
            }
        } else {
            $("body").addClass("double");
            try {
                window.resizeTo(1340, 710),
                window.outerWidth = 1355,
                window.outerHeight = 710
            } catch (e) {
                setTimeout("ResizeIE(1345,710,1355,710)", 1e3)
            }
        }
    else if ("3" == document.getElementById("StreamingSrc").value && "5" != document.getElementById("HorseChannelID").value)
        if (parent.document.getElementById("FrameValidation").width = 484,
        1 == e) {
            var t = 500
              , n = 555;
            4 == document.getElementById("HorseChannelID").value && (t = 526,
            n = 452),
            $("body").addClass("miniWin");
            try {
                window.resizeTo(t, n),
                window.outerWidth = t,
                window.outerHeight = n
            } catch (e) {
                setTimeout("ResizeIE(" + t + "," + n + "," + t + "," + n + ")", 1e3)
            }
        } else
            try {
                window.resizeTo(820, 700),
                window.outerWidth = 825,
                window.outerHeight = 700
            } catch (e) {
                setTimeout("ResizeIE(820,700,825,700)", 1e3)
            }
    else if ("8" == document.getElementById("StreamingSrc").value && 484 != document.getElementById("FrameValidation").width)
        if (1 == e) {
            $("body").addClass("maxWin miniWin");
            try {
                window.resizeTo(697, 553),
                window.outerWidth = 697,
                window.outerHeight = 553
            } catch (e) {
                setTimeout("ResizeIE(700,555,715,555)", 1e3)
            }
        } else {
            $("body").addClass("maxWin");
            try {
                window.resizeTo(1005, 700),
                window.outerWidth = 1010,
                window.outerHeight = 700
            } catch (e) {
                setTimeout("ResizeIE(1005,700,1010,700)", 1e3)
            }
        }
    else if ("9" == document.getElementById("StreamingSrc").value && 484 != document.getElementById("FrameValidation").width)
        if (1 == e) {
            $("body").addClass("wbWin miniWin");
            try {
                window.resizeTo(626, 562),
                window.outerWidth = 626,
                window.outerHeight = 562
            } catch (e) {
                setTimeout("ResizeIE(630,595,635,595)", 1e3)
            }
        } else {
            $("body").addClass("wbWin");
            try {
                window.resizeTo(910, 740),
                window.outerWidth = 925,
                window.outerHeight = 740
            } catch (e) {
                setTimeout("ResizeIE(910,740,925,740)", 1e3)
            }
        }
    else if ("10" == document.getElementById("StreamingSrc").value)
        if (1 == e) {
            $("body").addClass("miniWin");
            var i = 500
              , a = 500
              , o = 562;
            try {
                window.resizeTo(i, o),
                window.outerWidth = a,
                window.outerHeight = o
            } catch (e) {
                setTimeout("ResizeIE(500,570,505,570)", 1e3)
            }
        } else {
            var l = 820
              , d = 825;
            try {
                window.resizeTo(l, 700),
                window.outerWidth = d,
                window.outerHeight = 700
            } catch (e) {
                setTimeout("ResizeIE(" + l + ",700," + d + ",700)", 1e3)
            }
        }
    else if (1 == e) {
        $("body").addClass("miniWin");
        i = 500,
        a = 500,
        o = 498;
        "true" == document.getElementById("bingoMode").value && "5" == document.getElementById("StreamingSrc").value && (i = 998,
        a = 1008,
        o = 555);
        try {
            window.resizeTo(i, o),
            window.outerWidth = a,
            window.outerHeight = o
        } catch (e) {
            setTimeout("ResizeIE(500,570,505,570)", 1e3)
        }
    } else {
        l = 820,
        d = 825;
        "true" == document.getElementById("bingoMode").value && "5" == document.getElementById("StreamingSrc").value && ($("body").addClass("double"),
        l = 1340,
        d = 1355);
        try {
            window.resizeTo(l, 700),
            window.outerWidth = d,
            window.outerHeight = 700
        } catch (e) {
            setTimeout("ResizeIE(" + l + ",700," + d + ",700)", 1e3)
        }
    }
}
function ResizeIE(e, t, n, i) {
    try {
        window.resizeTo(e, t),
        window.outerWidth = n,
        window.outerHeight = i
    } catch (e) {}
}
function Resize1(e) {
    (0 == e && "block" != document.getElementById("containerhead").style.display || 1 == e && "block" == document.getElementById("containerhead").style.display) && StandalonePlayer()
}
function SetTitle(e, t) {
    document.getElementById("GreyhoundsContainer").style.display = "none",
    document.getElementById("SportsContainer").style.display = "block",
    document.getElementById("left_title").innerHTML = t,
    document.getElementById("Button1").style.display = "0" == e ? "block" : "none"
}
function Refresh_List() {
    var e = GetIBC_IsLogin();
    StreamingStatusIsLogin != e ? CloseWindow() : "151" == ScheduleType || "152" == ScheduleType || "153" == ScheduleType ? window.leftcont.location.href = "StreamingSchedule.php?Type=" + ScheduleType : "160" == ScheduleType ? window.leftcont.location.href = "StreamingSchedule.php?Type=160" : "161" == ScheduleType || "164" == ScheduleType ? window.leftcont.location.href = "StreamingSchedule.php?Type=161" : window.leftcont.location.href = "StreamingSchedule.php?Type=1",
    StreamingStatusIsLogin = e
}
function AutoRefreshLoginCheckin() {
    var e = GetIBC_IsLogin();
    if (StreamingStatusIsLogin != e)
        CloseWindow();
    else {
        var t = document.getElementById("containerleft");
        if (null != t && "inline-block" == t.style.display) {
            null != document.getElementById("leftcont") && document.getElementById("leftcont").contentWindow.location.reload(!0)
        }
    }
    StreamingStatusIsLogin = e
}
function GetIBC_IsLogin() {
    try {
        return !mainWindowIsClosed() && window.opener.fFrame.IsLogin
    } catch (e) {
        return !1
    }
}
function CheckLogin() {
    var e = GetIBC_IsLogin();
    StreamingStatusIsLogin != e && CloseWindow()
}
function mainWindowIsClosed() {
    return null == window.opener || window.opener.closed
}
function swapHorseStreaming(e, t, n) {
    "2" != CurrentHorseChannelID && "3" != CurrentHorseChannelID ? isHorseStreaming && CurrentHorseChannelID != e && SetLoadVideoLocation("9999", "3", e, t, n) : !isHorseStreaming || CurrentLeagueID == t && CurrentRaceNumber == n || SetLoadVideoLocation("9999", "3", e, t, n)
}
function OpenHorseStreaming() {
    CloseTVBox();
    null != document.getElementById("HorseChannelID") && openRacingStreaming("151")
}
function EuroOpenHorseStreaming() {
    CloseTVBox();
    var e = document.getElementById("HorseChannelID")
      , t = document.getElementById("RacingLeagueID")
      , n = document.getElementById("RacingRaceNumber");
    if (null != e) {
        null == window.top.StreamingFrame || window.top.StreamingFrame.closed ? window.top.StreamingFrame = window.open("../StreamingFrame.php?Matchid=9999&StreamingSrc=3&HorseChannelID=" + e.value + "&RacingLeagueID=" + t.value + "&RacingRaceNumber=" + n.value, "StreamingFrame", "top=200,left=300,height=485,width=525,status=no,toolbar=no,menubar=no,resizable=yes,location=no") : (window.top.StreamingFrame.isHorseStreaming = !0,
        window.top.StreamingFrame.swapHorseStreaming(e, t, n)),
        window.top.StreamingFrame.focus()
    }
}
function ChagneHorseStream(e, t, n) {
    var i = fFrame.LastSelectedSport;
    $("#HorseChannelID").val(e),
    $("#RacingLeagueID").val(t),
    $("#RacingRaceNumber").val(n),
    null == getStreamingFrameHandle() || getStreamingFrameHandle().closed || ("6" == e ? getStreamingFrameHandle().CurrentHorseChannelID != e && (switchGreyhoundsStreaming(),
    getStreamingFrameHandle().CurrentHorseChannelID = e) : (getStreamingFrameHandle().isHorseStreaming = !0,
    getStreamingFrameHandle().ScheduleType = i,
    getStreamingFrameHandle().swapHorseStreaming(e, t, n),
    getStreamingFrameHandle().ShowHorseRacingSchule(parseInt(i, 10))))
}
function ChagneBingoStream() {
    null == getStreamingFrameHandle() || getStreamingFrameHandle().closed || (getStreamingFrameHandle().isHorseStreaming = !1,
    getStreamingFrameHandle().ScheduleType = "161",
    getStreamingFrameHandle().swapBingoStreaming(),
    getStreamingFrameHandle().ShowNumberGameSchule())
}
function EuroChagneHorseStream(e, t, n) {
    var i = document.getElementById("HorseChannelID");
    null != i ? (i.value = e,
    $("#RacingLeagueID").val(t),
    $("#RacingRaceNumber").val(n),
    null == StreamingFrame || StreamingFrame.closed || StreamingFrame.swapHorseStreaming(e, t, n)) : setTimeout("EuroChagneHorseStream('" + e + "','" + t + "','" + n + "')", 100)
}
function swapBingoStreaming() {
    SetLoadVideoLocation("9999", "5", "0", "0", "0")
}
function swapHappy5Streaming() {
    SetLoadVideoLocation("9999", "10", "0", "0", "0")
}
function SetLoadVideoLocation(e, t, n, i, a) {
    if (n = n || "0",
    i = i || "0",
    a = a || "0",
    ("3" == t && "5" != n || "1" == t || "4" == t || "9" == t || "10" == t) && (document.getElementById("FrameValidation").width = 484),
    "5" == t && ("true" == document.getElementById("bingoMode").value ? document.getElementById("FrameValidation").width = 978 : document.getElementById("FrameValidation").width = 484),
    "10" == t && (document.getElementById("FrameValidation").width = 484),
    "2" != n && "3" != n) {
        if (isPlaySuccess && document.getElementById("Matchid").value == e && document.getElementById("StreamingSrc").value == t && document.getElementById("HorseChannelID").value == n)
            return
    } else if (document.getElementById("StreamingSrc").value == t && document.getElementById("HorseChannelID").value == n && document.getElementById("RacingLeagueID").value == i && document.getElementById("RacingRaceNumber").value == a)
        return;
    bStandalonePlayer = null == document.getElementById("containerhead") || "block" != document.getElementById("containerhead").style.display,
    "" != e && GetIBC_IsLogin() ? null != document.getElementById("Matchid") && null != document.getElementById("StreamingSrc") && null != document.getElementById("HorseChannelID") && (document.getElementById("Matchid").value = e,
    document.getElementById("StreamingSrc").value = t,
    document.getElementById("HorseChannelID").value = n,
    document.getElementById("RacingLeagueID").value = i,
    document.getElementById("RacingRaceNumber").value = a,
    document.DataForm.submit(),
    AdjustSize(bStandalonePlayer)) : (document.DataForm.submit(),
    AdjustSize(bStandalonePlayer))
}
function getStreamingHtml(e, t, n) {
	return "";
    // if (CheckIsIpad())
    //     return "";
    // if (0 == t)
    //     return "";
    // if (vendorSetting.IsM88 || vendorSetting.IsALog || vendorSetting.IsTLC || vendorSetting.IsDela || vendorSetting.IsSuncity || vendorSetting.IsMayfair || vendorSetting.IsZzun88 || "4201100" == fFrame.SiteId)
    //     return "";
    // if (1 == fFrame.SiteMode)
    //     return "";
    // var i = document.getElementById("cm-nav");
    // return n && fFrame.IsUserStreaming ? null != i ? '<span style="display:inline-block;" onmouseover=\'OpenStreamingMenu(' + e + ",this)' onmouseout='CloseStreamingMenu(" + e + ',this)\'><span class="iconOdds tv"></span><div id="tv' + e + '" style="display:none; position:absolute; float:right;"></div></span>' : "<a href='javascript:fFrame.openSingleStreaming(" + e + ',0);\'><span class="iconOdds tv"></span></a>' : '<span class="iconOdds tv off"></span>'
}
function OpenStreamingMenu(e, t) {
    var n = $(t).find("#tv" + e);
    0 == n.length && (n = $(document.getElementById("tv" + e))),
    "" == n.html() && n.html(getStreamingMenuHtml(e)),
    n.css("display", "block")
}
function CloseStreamingMenu(e, t) {
    var n = $(t).find("#tv" + e);
    0 == n.length && (n = $(document.getElementById("tv" + e))),
    n.length > 0 && n.css("display", "none")
}
function getStreamingMenuHtml(e) {
    var t = document.getElementById("cm-nav");
    if (null != t) {
        var n = t.innerHTML;
        return n = n.replace(/#L/, "javascript:fFrame.openSingleStreaming(" + e + ",0);"),
        n = n.replace(/#S/, "javascript:fFrame.openSingleStreaming(" + e + ",1);")
    }
    return ""
}
function getBingoStreamingHtml() {
    return CheckIsIpad() ? "none" : "<a href='javascript:openBingoStreamingMain();'><span class=\"iconOdds tv\"></span></a>"
}
function getLucky3StreamingHtml() {
    return CheckIsIpad() ? "none" : "<a href='javascript:openLucky3StreamingMain();'><span class=\"iconOdds tv\"></span></a>"
}
function ReflashSingleStreaming() {
    if (null != fFrame.leftx) {
        var e = fFrame.leftx.document.getElementById("iTV")
          , t = e.src;
        e.src = "",
        e.src = t
    }
}
function SwitchSingleStreaming() {
    if (null != fFrame.leftx) {
        var e = fFrame.leftx.document.getElementById("iTV").src;
        e = (e = (e = e.substr(e.indexOf("StreamingLV.php"))).replace("StreamingLV.php?Matchid=", "")).replace("&TVmode=small", ""),
        CloseTVBox(),
        openSingleStreaming(e, 0)
    }
}
function openSingleStreaming(e, t) {
    openSingleStreamingMain(e, t)
}
function openSingleStreamingMain(e, t) {
    switch (CloseStreamingMenu(e),
    t) {
    case 0:
        CloseTVBox();
        fFrame.openWindowsHandle("StreamingFrame" + e, !0, "", "StreamingFrame.php?Matchid=" + e, "top=20,left=20,height=520,width=525,status=no,toolbar=no,menubar=no,resizable=yes,location=no,scrollbars=yes", !1, function(t, n) {
            if (null != t && !n)
                try {
                    t.SetLoadVideoLocation(e, "1", "0", "0", "0")
                } catch (e) {}
        });
        break;
    case 1:
        var n = fFrame.getOpenWindowsHandle("StreamingFrame");
        if (null == n || n.closed || n.CloseWindow(),
        CloseTVBox(),
        null != fFrame.leftx) {
            fFrame.leftx.document.getElementById("iTV").src = "StreamingLV.php?Matchid=" + e + "&TVmode=small"
        }
    }
}
function openBingoStreamingMain() {
    if (CanOpenStreaming()) {
        CloseTVBox();
        fFrame.openWindowsHandle("StreamingFrame", !0, "", "StreamingFrame.php?Matchid=9999&StreamingSrc=5", "top=20,left=20,height=520,width=565,status=no,toolbar=no,menubar=no,resizable=yes,location=no,scrollbars=yes", !1, function(e, t) {
            null != e && (e.isHorseStreaming = !1,
            e.ScheduleType = "161",
            t || (e.ShowNumberGameSchule(),
            e.swapBingoStreaming()))
        })
    }
}
function openHappy5StreamingMain() {
    if (CanOpenStreaming()) {
        CloseTVBox();
        fFrame.openWindowsHandle("StreamingFrame", !0, "", "StreamingFrame.php?Matchid=9999&StreamingSrc=10", "top=20,left=20,height=520,width=565,status=no,toolbar=no,menubar=no,resizable=yes,location=no,scrollbars=yes", !1, function(e, t) {
            null != e && (e.isHorseStreaming = !1,
            e.ScheduleType = "164",
            t || (e.ShowNumberGameSchule(),
            e.swapHappy5Streaming()))
        })
    }
}
function CloseTVBox() {
    if (null != fFrame.leftx) {
        var e = fFrame.leftx.document.getElementById("iTV");
        null != e && (e.src = "");
        var t = fFrame.leftx.document.getElementById("TVBox");
        null != t && (t.style.display = "none");
        var n = fFrame.leftx.document.getElementById("div_Casino");
        null != n && (n.style.display = "")
    }
}
function openStreamingMain() {
    CloseTVBox();
    var e = topx.document.getElementById("iTV");
    e.disabled = !0,
    e.href = "JavaScript:void(0);";
    fFrame.openWindowsHandle("StreamingFrame", !0, "", "StreamingFrame.php", "top=20,left=20,height=710,width=820,status=no,toolbar=no,menubar=no,resizable=yes,location=no,scrollbars=yes", !1, function(t, n) {
        null == t || n || (null != t.document.getElementById("containerhead") && "none" == t.document.getElementById("containerhead").style.display && t.StandalonePlayer(),
        "Chrome" == userBrowser() ? t.blur() : t.focus()),
        e.href = "JavaScript:fFrame.openStreamingMain();",
        e.disabled = !1
    })
}
function CloseHorseInfoPopWindow() {
    try {
        null != HorseInfoPopWindow && HorseInfoPopWindow.open && (HorseInfoPopWindow.close(),
        HorseInfoPopWindow = null),
        (null != getStreamingFrameHandle() || getStreamingFrameHandle().open) && (getStreamingFrameHandle().close(),
        fFrame.windowsHandle.StreamingFrame = null)
    } catch (e) {}
}
function OpenGreyhoundsStreaming() {
    CloseTVBox(),
    fFrame = getParent(window);
    var e = document.getElementById("HorseChannelID");
    if (null != e)
        if ("5" == e.value)
            openRacingStreaming("152");
        else if (CanOpenStreaming()) {
            fFrame.openWindowsHandle("StreamingFrame", !0, "", "StreamingFrame.php", "top=20,left=20,height=680,width=825,status=no,toolbar=no,menubar=no,resizable=yes,location=no,scrollbars=yes", !1, function(e, t) {
                null != e && (t ? (setTimeout("getStreamingFrameHandle().ShowGreyhoundsContainer();", 1e3),
                setTimeout("switchGreyhoundsStreaming();", 1500)) : switchGreyhoundsStreaming())
            })
        }
}
function OpenHarnessStreaming() {
    CloseTVBox(),
    openRacingStreaming("153")
}
function CanOpenStreaming() {
    return !OpenStreamingFlag && (OpenStreamingFlag = !0,
    void 0 !== setOpenStreamingTimer && clearTimeout(setOpenStreamingTimer),
    setOpenStreamingTimer = setTimeout("ReSetStreamingFlag()", 3e3),
    !0)
}
function ReSetStreamingFlag() {
    OpenStreamingFlag = !1
}
function openRacingStreaming(e) {
    if (CanOpenStreaming()) {
        var t = document.getElementById("HorseChannelID").value
          , n = document.getElementById("RacingLeagueID").value
          , i = document.getElementById("RacingRaceNumber").value;
        (fFrame = getParent(window)).openRacingStreamingMain(e, t, n, i)
    }
}
function openRacingStreamingMain(e, t, n, i) {
    fFrame.openWindowsHandle("StreamingFrame", !0, "", "StreamingFrame.php?Matchid=9999&StreamingSrc=3&RacingType=" + e + "&HorseChannelID=" + t + "&RacingLeagueID=" + n + "&RacingRaceNumber=" + i, "top=20,left=20,height=520,width=525,status=no,toolbar=no,menubar=no,resizable=yes,location=no,scrollbars=yes", !1, function(a, o) {
        null != a && (a.isHorseStreaming = !0,
        a.ScheduleType = e,
        o || (a.ShowHorseRacingSchule(e),
        a.swapHorseStreaming(t, n, i)))
    })
}
function switchGreyhoundsStreaming() {
    bStandalonePlayer = !1,
    getStreamingFrameHandle().document.getElementById("containerhead").style.display = "block",
    getStreamingFrameHandle().document.getElementById("containerhead").style.visibility = "visible",
    getStreamingFrameHandle().document.getElementById("containerleft").style.display = "inline-block",
    getStreamingFrameHandle().document.getElementById("containerleft").style.visibility = "visible",
    getStreamingFrameHandle().document.getElementById("footer").style.display = "block",
    getStreamingFrameHandle().document.getElementById("footer").style.visibility = "visible",
    getStreamingFrameHandle().document.getElementById("minimgdiv").style.display = "block",
    getStreamingFrameHandle().document.getElementById("minimgdiv").style.visibility = "visible",
    getStreamingFrameHandle().document.getElementById("maximgdiv").style.display = "none",
    getStreamingFrameHandle().document.getElementById("maximgdiv").style.visibility = "hidden",
    getStreamingFrameHandle().document.getElementById("mintxtdiv").style.display = "block",
    getStreamingFrameHandle().document.getElementById("mintxtdiv").style.visibility = "visible",
    getStreamingFrameHandle().document.getElementById("maxtxtdiv").style.display = "none",
    getStreamingFrameHandle().document.getElementById("maxtxtdiv").style.visibility = "hidden",
    getStreamingFrameHandle().document.getElementById("containerMain").style.width = "100%",
    getStreamingFrameHandle().document.getElementById("containerMain").style.height = "100%",
    getStreamingFrameHandle().isHorseStreaming = !1,
    getStreamingFrameHandle().CurrentHorseChannelID = "6",
    getStreamingFrameHandle().ShowGreyhoundsContainer()
}
function getStreamingFrameHandle() {
    return fFrame.getOpenWindowsHandle("StreamingFrame")
}
var bStandalonePlayer = !1
  , isReSizeLoading = !1
  , StreamingStatusIsLogin = GetIBC_IsLogin()
  , isPlaySuccess = !1
  , ImgServURL = ""
  , CurrentHorseChannelID = ""
  , CurrentLeagueID = ""
  , CurrentRaceNumber = ""
  , fFrame = getParent(window)
  , OpenStreamingFlag = !1
  , setOpenStreamingTimer = null;
window.focus();
