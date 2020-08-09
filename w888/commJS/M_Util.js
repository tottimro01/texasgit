function getDataClass() {
    function e(e) {
        return "" != e.url
    }
    function t(e, t) {
        n(l, r, e, t)
    }
    function n(t, n, o, i) {
        if (void 0 === s[t] && (s[t] = {
            queue: [],
            xhrObj: null
        }),
        void 0 !== n) {
            var a = {};
            for (var r in n)
                a[r] = n[r];
            n = a,
            s[t].queue.push({
                options: n,
                originalComplete: a.complete,
                autoRepeat: i,
                interval: o,
                timer: null
            }),
            n.complete = function(n, o) {
                if (s[t].queue.length > 0) {
                    var i = s[t].queue[0];
                    s[t].queue.shift(),
                    s[t].xhrObj = null,
                    i.originalComplete && i.originalComplete(n, o),
                    !0 === i.autoRepeat && s[t].queue.push(i),
                    s[t].queue.length > 0 && e(s[t].queue[0].options) && (s[t].queue[0].timer = setTimeout(function() {
                        s[t].xhrObj = jQuery.ajax(s[t].queue[0].options)
                    }, s[t].queue[0].interval))
                }
            }
            ,
            1 == s[t].queue.length && null == s[t].xhrObj && (e(n) ? s[t].queue[0].timer = setTimeout(function() {
                s[t].xhrObj = jQuery.ajax(s[t].queue[0].options)
            }, s[t].queue[0].interval) : (s[t].queue.shift(),
            s[t].xhrObj = null))
        }
    }
    function o(e) {
        void 0 !== s[e] && s[e].xhrObj && (s[e].xhrObj.abort(),
        s[e].xhrObj = null)
    }
    var i = {
        contentType: "application/x-www-form-urlencoded",
        dataType: "script",
        type: "POST",
        cache: !0,
        ifModified: !0,
        timeout: 1e4
    }
      , a = {
        url: "",
        param: "",
        callBack: null,
        feedBack: null
    }
      , r = {}
      , l = "OneXQueue"
      , s = {};
    this.SetAjaxAttr = function(e, t) {
        void 0 !== a[e] ? a[e] = t : void 0 !== i[e] && (i[e] = t),
        r = {
            url: a.url,
            data: a.param,
            contentType: i.contentType,
            dataType: i.dataType,
            type: i.type,
            ifModified: i.ifModified,
            cache: i.cache,
            async: !0,
            timeout: i.timeout,
            beforeSend: function() {},
            error: function(e, t, n) {},
            complete: function(e, t) {
                !function(e) {
                    return 304 === e || 200 <= e && e <= 207
                }(e.status) || "success" != t && "notmodified" != t ? "function" == typeof a.feedBack && a.feedBack(e, t) : "function" == typeof a.callBack && a.callBack(e)
            }
        }
    }
    ,
    this.GetAjaxAttr = function(e) {
        return void 0 !== a[e] ? a[e] : void 0 !== i[e] ? i[e] : void 0
    }
    ,
    this.AutoGetData = function(e) {
        !function(e) {
            t(0, !1),
            t(e, !0)
        }(e)
    }
    ,
    this.StopGetData = function() {
        void 0 !== s[l] && (s[l].queue.length > 0 && clearTimeout(s[l].queue[0].timer),
        s[l].queue = []),
        o(l)
    }
    ,
    this.GetData = function() {
        t(0, !1)
    }
    ,
    this.GetDataCustomize = function(e, t) {
        n(e, t, 0, !1)
    }
    ,
    this.AbortRequest = function(e) {
        o(e)
    }
}
function OverWriteFormSubmit() {
    if (null != ajaxDataObj)
        for (var e = 0; e < document.forms.length; e++)
            document.forms[e].submit = null,
            document.forms[e].submit = function() {
                Submit(this, null)
            }
}
function recallAjax(e) {
    null != ThreadList[e] && (ajaxDataObj.AbortRequest(e),
    ajaxDataObj.GetDataCustomize(e, ThreadList[e]))
}
function ExecAjax(url, param, type, ThreadId, FName_Success, FName_Timeout) {
    ajaxDataObj.AbortRequest(ThreadId);
    var Options = new Object;
    switch (Options.url = url,
    Options.data = param,
    Options.contentType = "application/x-www-form-urlencoded",
    Options.dataType = "text",
    type.toUpperCase()) {
    case "GET":
    case "POST":
        Options.type = type.toUpperCase();
        break;
    default:
        Options.type = "GET"
    }
    Options.ifModified = !0,
    Options.cache = !1,
    Options.async = !0,
    Options.timeout = 2e4,
    Options.beforeSend = null,
    Options.error = null,
    Options.complete = function(xhr, status) {
        HTTPStatusOK(xhr.status) && "success" == status ? null != FName_Success && "" != FName_Success && "undefined" != FName_Success && eval(FName_Success + "(xhr.responseText);") : "timeout" == status && null != FName_Timeout && "" != FName_Timeout && "undefined" != FName_Timeout && eval(FName_Timeout + "();")
    }
    ,
    ThreadList[ThreadId] = Options,
    ajaxDataObj.GetDataCustomize(ThreadId, Options)
}
function Submit(e, t) {
    null == t && (t = !0);
    "#fomConfirmBet#,#fomConfirmBetPhone#,#betform#,#fomBingoConfirmBet#".indexOf("#" + e.name + "#") > -1 && (t = !1),
    ajaxDataObj.AbortRequest(e.name);
    var n = new Object
      , o = new Object;
    for (i = 0; i < e.elements.length; i++)
        switch (e.elements[i].type) {
        case "text":
        case "hidden":
        case "select-one":
            n[e.elements[i].name] = e.elements[i].value;
            break;
        case "checkbox":
            e.elements[i].checked && (void 0 == o[e.elements[i].name] ? o[e.elements[i].name] = e.elements[i].value : o[e.elements[i].name] = o[e.elements[i].name] + "," + e.elements[i].value)
        }
    for (var i = 0; i < Object.keys(o).length; i++) {
        var a = o[Object.keys(o)[i]].split(",");
        $("[name='" + Object.keys(o)[i] + "']").length > 1 ? n[Object.keys(o)[i]] = a : n[Object.keys(o)[i]] = a[0]
    }
    var r = new Object;
    r.url = e.action,
    r.data = n,
    r.contentType = "application/x-www-form-urlencoded",
    r.dataType = "text",
    "" == e.method ? r.type = "GET" : r.type = e.method.toUpperCase(),
    r.ifModified = !0,
    r.cache = !1,
    r.async = t,
    r.timeout = 2e4,
    r.beforeSend = null,
    r.error = null,
    r.complete = function(t, n) {
        HTTPStatusOK(t.status) && "success" == n && DataArrived(t, e.target)
    }
    ,
    ajaxDataObj.GetDataCustomize(e.name, r)
}
function HTTPStatusOK(e) {
    return 304 === e || 200 <= e && e <= 207
}
function DataArrived(e, t) {
    var n = document.getElementById(t);
    null == n && (n = document.getElementsByName(t)[0]),
    "iframe" == n.tagName.toLowerCase() ? putIFrameDocument(n, e.responseText) : n.innerHTML = e.responseText
}
function putIFrameDocument(e, t) {
    if (isIe) {
        (n = e.contentWindow).document.designMode = "on",
        n.document.open(),
        n.document.write(t),
        n.document.designMode = "off",
        n.document.close()
    } else {
        var n;
        (n = e.contentWindow).document.open(),
        n.document.clear(),
        n.document.write(t),
        n.document.close()
    }
}
function getCookie(e) {
    var t = document.cookie.indexOf(e + "=")
      , n = t + e.length + 1;
    if (!t && e != document.cookie.substring(0, e.length))
        return null;
    if (-1 == t)
        return null;
    var o = document.cookie.indexOf(";", n);
    return -1 == o && (o = document.cookie.length),
    unescape(document.cookie.substring(n, o))
}
function setCookie(e, t, n, o, i, a) {
    var r = new Date;
    r.setTime(r.getTime()),
    n && (n = 1e3 * n * 60 * 60 * 24);
    var l = new Date(r.getTime() + n);
    document.cookie = e + "=" + escape(t) + (n ? ";expires=" + l.toGMTString() : "") + (o ? ";path=" + o : "") + (i ? ";domain=" + i : "") + (a ? ";secure" : "")
}
function deleteCookie(e, t, n) {
    getCookie(e) && (document.cookie = e + "=" + (t ? ";path=" + t : "") + (n ? ";domain=" + n : "") + ";expires=Thu, 01-Jan-1970 00:00:01 GMT")
}
function getBrowserVer() {
    var e, t = {}, n = navigator.userAgent.toLowerCase();
    return (e = n.match(/msie ([\d.]+)/)) ? t.ie = e[1] : (e = n.match(/firefox\/([\d.]+)/)) ? t.firefox = e[1] : (e = n.match(/chrome\/([\d.]+)/)) ? t.chrome = e[1] : (e = n.match(/opera.([\d.]+)/)) ? t.opera = e[1] : (e = n.match(/version\/([\d.]+).*safari/)) && (t.safari = e[1]),
    t.ie ? "IE" + t.ie : t.firefox ? "Firefox" + t.firefox : t.chrome ? "Chrome" + t.chrome : t.opera ? "Opera" + t.opera : t.safari ? "Safari" + t.safari : void 0
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
function getDivH(e) {
    var t = e.style.display;
    if ("none" != t && null != t)
        return e.offsetHeight;
    var n = e.style
      , o = n.visibility
      , i = n.position
      , a = n.display;
    n.visibility = "hidden",
    n.position = "absolute",
    n.display = "block";
    var r = e.clientHeight;
    return n.display = a,
    n.position = i,
    n.visibility = o,
    r
}
function getDivW(e) {
    var t = e.style.display;
    if ("none" != t && null != t)
        return e.offsetWidth;
    var n = e.style
      , o = n.visibility
      , i = n.position
      , a = n.display;
    n.visibility = "hidden",
    n.position = "absolute",
    n.display = "block";
    var r = e.clientWidth;
    return n.display = a,
    n.position = i,
    n.visibility = o,
    r
}
function MsgBox(e, t, n, o) {
    function i() {
        clearTimeout(l),
        parseInt(p.style.height.replace("px", ""), 10) > 0 ? parseInt(p.style.height.replace("px", ""), 10) - m > 0 ? p.style.height = parseInt(p.style.height.replace("px", ""), 10) - m + "px" : p.style.height = "0px" : (p.style.display = "none",
        window.clearInterval(s),
        c.removeChild(p),
        0 == c.children.length && document.body.removeChild(c))
    }
    var a, r, l, s, d = t, m = n, u = getBrowserVer(), c = document.getElementById(o);
    if (null == c) {
        if (c = document.createElement("div"),
        c.id = o,
        -1 != u.indexOf("IE6")) {
            var g = document.getElementsByTagName("body")[0];
            g.style.height = "100%",
            g.style.overflowY = "auto";
            document.getElementsByTagName("html")[0].style.overflowY = "hidden",
            c.style.cssText = "display:block;bottom:0px;right:1px!important;float: right;position:absolute;border:1px solid #fff;text-align:center;"
        } else
            c.style.cssText = "display:block;bottom:0px;right:1px!important;float: right;position:fixed;border:1px solid #fff;text-align:center;";
        document.body.appendChild(c)
    }
    var p = document.createElement("div");
    p.style.display = "none",
    p.style.overflow = "hidden",
    p.innerHTML = e,
    p.onclick = function() {
        var e = getEvent();
        "pointer" == (e.srcElement || e.target).style.cursor && (s = window.setInterval(function() {
            i()
        }, m))
    }
    ,
    a = getDivH(p),
    r = getDivW(p),
    c.insertBefore(p, c.firstChild),
    a = getDivH(p),
    r = getDivW(p),
    p.style.width = r + "px",
    this.openMsg = function() {
        s = window.setInterval(function() {
            "none" == p.style.display && (p.style.height = "0px",
            p.style.display = "block"),
            parseInt(p.style.height.replace("px", ""), 10) < a ? parseInt(p.style.height.replace("px", ""), 10) + m < a ? p.style.height = parseInt(p.style.height.replace("px", ""), 10) + m + "px" : p.style.height = a + "px" : (window.clearInterval(s),
            l = setTimeout(function() {
                s = window.setInterval(function() {
                    i()
                }, 10)
            }, d))
        }, 10)
    }
    ,
    this.closeMsg = function() {
        s = window.setInterval(function() {
            i()
        }, 10)
    }
}
function closeAllDivLauncher() {
    if (DivLauncherArray.length > 0) {
        for (var e = 0; e < DivLauncherArray.length; e++)
            DivLauncherArray[e].close();
        DivLauncherArray = []
    }
}
function closePopup() {
    closeAllDivLauncher()
}
function DivLauncher(e, t, n, o) {
    function i(e) {
        for (var t = S ? event.srcElement : e.target, n = 0; t != f && t != y && t.tagName != p; ) {
            if (null == (t = t.parentNode))
                return;
            if (n >= 50)
                return;
            n++
        }
        t == f ? (s = S ? event.clientX : e.clientX,
        d = S ? event.clientY : e.clientY,
        m = parseInt(p.style.left),
        u = parseInt(p.style.top),
        v = !0) : t == y && l()
    }
    function a() {
        v = !1
    }
    function r(e) {
        v && (S ? (p.style.left = parseInt(m) + parseInt(event.clientX) - parseInt(s) + "px",
        p.style.top = parseInt(u) + parseInt(event.clientY) - parseInt(d) + "px") : (p.style.left = parseInt(m) + parseInt(e.clientX) - parseInt(s) + "px",
        p.style.top = parseInt(u) + parseInt(e.clientY) - parseInt(d) + "px"))
    }
    function l() {
        h && (null == b.beforeClose || b.beforeClose(p)) && (--DivLauncherCnt <= 0 && (w.document.onmousemove = DefDocMouseMove,
        w.document.onmousedown = DefDocMouseDown,
        w.document.onmouseup = DefDocMouseUp,
        w.document.ontouchstart = DefDocMouseDown,
        w.document.ontouchend = DefDocMouseUp,
        DivLauncherCnt = 0),
        p.style.visibility = "hidden",
        v = !1,
        h = !1,
        null != b.afterClose && b.afterClose(p),
        b.isOpened = !1,
        CheckIScroll() && ($(e).mutate("clear", "pop", function(e, t) {}),
        ReSideBarHeight()))
    }
    var s, d, m, u, c = 171, g = 47, p = e, f = t, y = n, h = !1, v = !1, S = document.all, b = (!document.all && document.getElementById,
    this), w = window;
    null != o && (w = o),
    this.beforeOpen = null,
    this.afterOpen = null,
    this.beforeClose = null,
    this.afterClose = null,
    this.onDragging = null,
    this.isOpened = !1,
    this.popDiv = p,
    this.titleDiv = f,
    p.style.position = "absolute",
    p.style.display = "none",
    p.style.visibility = "hidden",
    p.style.zIndex = 1e3,
    null != f && (f.style.cursor = "move"),
    this.close = function() {
        l()
    }
    ,
    this.open = function(t, n, o) {
        closeAllDivLauncher();
        var l = n
          , s = n;
        CheckIScroll() && (o ? $(e).mutate("height", "pop", function(t, n) {
            FixSideBarHeight(e, l)
        }) : $(e).mutate("clear", "pop", function(e, t) {}),
        FixSideBarHeight(e, n),
        s += Math.abs(myScroll.y)),
        n = s,
        arguments.length < 2 && (t = c,
        s = n = g),
        DivLauncherArray.push(b),
        function(e, t) {
            if (null == b.beforeOpen || b.beforeOpen(p)) {
                var n, o;
                n = o = 0,
                document.documentElement && document.documentElement.scrollTop ? (n = document.documentElement.scrollTop,
                o = document.documentElement.scrollLeft) : document.body && (n = document.body.scrollTop,
                o = document.body.scrollLeft),
                p.style.top = parseInt(t) + parseInt(n) + "px",
                p.style.left = parseInt(e) + parseInt(o) + "px",
                h || (0 == DivLauncherCnt && (DefDocMouseMove = w.document.onmousemove,
                DefDocMouseDown = w.document.onmousedown,
                DefDocMouseUp = w.document.onmouseup),
                DivLauncherCnt++,
                w.document.onmousemove = r,
                w.document.onmousedown = i,
                w.document.onmouseup = a,
                w.document.ontouchstart = i,
                w.document.ontouchend = a,
                p.style.display = "inline",
                p.style.visibility = "visible",
                h = !0,
                null != b.afterOpen && b.afterOpen(p),
                b.isOpened = !0)
            }
        }(t, s)
    }
    ,
    this.setDEFAULT_X = function(e) {
        c = e
    }
    ,
    this.setDEFAULT_Y = function(e) {
        g = e
    }
    ,
    this.getDEFAULT_X = function() {
        return c
    }
    ,
    this.getDEFAULT_Y = function() {
        return g
    }
}
function DivOption(e, t) {
    function n(e) {
        window.clearTimeout(a)
    }
    function o(e) {
        window.clearTimeout(a),
        a = window.setTimeout(i, 1e3 * l.AutoCloseSec)
    }
    function i(e) {
        s && (window.clearTimeout(a),
        r ? (window.detachEvent("onblur", i),
        l.Div.detachEvent("onmouseover", n),
        l.Div.detachEvent("onmouseout", o)) : (document.removeEventListener("click", i, !1),
        l.Div.removeEventListener("mouseover", n, !1),
        l.Div.removeEventListener("mouseout", o, !1)),
        s = !1,
        l.Div.style.display = "none")
    }
    var a, r = !!window.ActiveXObject, l = this, s = !1;
    this.Div = e,
    this.Div.style.display = "none",
    this.AutoCloseSec = t,
    this.isOpened = function() {
        return s
    }
    ,
    this.close = function(e) {
        i()
    }
    ,
    this.open = function(e, t, l) {
        s || (window.event ? window.event.cancelBubble = !0 : e && e.stopPropagation(),
        r ? (document.detachEvent("onclick", i),
        document.attachEvent("onclick", i),
        this.Div.attachEvent("onmouseover", n),
        this.Div.attachEvent("onmouseout", o)) : (document.removeEventListener("click", i, !1),
        document.addEventListener("click", i, !1),
        this.Div.removeEventListener("mouseover", n, !1),
        this.Div.addEventListener("mouseover", n, !1),
        this.Div.removeEventListener("mouseout", o, !1),
        this.Div.addEventListener("mouseout", o, !1)),
        window.clearTimeout(a),
        null != this.AutoCloseSec && (a = window.setTimeout(i, 1e3 * this.AutoCloseSec)),
        this.Div.style.position = "absolute",
        null != t && (this.Div.style.left = t),
        null != l && (this.Div.style.top = l),
        this.Div.style.display = "block",
        s = !0)
    }
    ,
    this.act = function(e, t, n) {
        s ? this.close(e) : this.open(e, t, n)
    }
}
function DivPop(e, t) {
    function n() {
        !function() {
            var e = document.activeElement.name;
            this._Focus = "txtUserName" == e || "txtPasswd" == e || "txtValidCode" == e
        }(),
        r && (this._Focus ? o = window.setTimeout(n, 1e3 * a.AutoCloseSec) : (window.clearTimeout(o),
        i ? window.detachEvent("onblur", n) : document.removeEventListener("click", n, !1),
        r = !1,
        a.Div.style.display = "none"))
    }
    var o, i = !!window.ActiveXObject, a = this, r = !1;
    this.Div = e,
    this.Div.style.display = "none",
    this.AutoCloseSec = t,
    this.isOpened = function() {
        return r
    }
    ,
    this.close = function() {
        n()
    }
    ,
    this.open = function(e, t) {
        r || (window.clearTimeout(o),
        null != this.AutoCloseSec && (o = window.setTimeout(n, 1e3 * this.AutoCloseSec)),
        this.Div.style.position = "absolute",
        this.Div.style.display = "block",
        r = !0)
    }
    ,
    this.act = function(e, t) {
        r ? this.close() : this.open(e, t)
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
function validateOnKP(e, t, n, o) {
    var i = document.all ? t.keyCode : t.which;
    if (null == n && (n = 0,
    document.selection)) {
        e.focus();
        var a = document.selection.createRange();
        if (null != a) {
            var r = e.createTextRange()
              , l = r.duplicate();
            r.moveToBookmark(a.getBookmark()),
            l.setEndPoint("EndToStart", r),
            n = l.text.length
        }
    }
    return !(e.value.length > 0 && 0 == n && 48 == i) && (13 == i ? null != o ? (o(t),
    !1) : ("Bingo_BPstake" == e.id ? betSubmitBingo(t) : betSubmit(t),
    !1) : (!/^$/.test(removeCommas(e.value)) || !/0/.test(String.fromCharCode(i))) && (!/[^0-9]/.test(String.fromCharCode(i)) || 8 == i || 0 == i))
}
function validateOnKPPhone(e, t, n) {
    var o = document.all ? t.keyCode : t.which;
    return !(13 != o && 8 != o && 45 != o || "stakeField" != n && "scoreField" != n) || (!(13 != o && 8 != o && 46 != o && 45 != o && 39 != o && 37 != o || "oddsField" != n && "hdpField" != n) || !/[^0-9]/.test(String.fromCharCode(o)))
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
      , o = ""
      , i = ""
      , a = "";
    "Horse" == e ? (n = "hrspMinBetValue",
    o = "hrspMaxBetValue",
    i = $("#HRBPMinMaxBetAlert"),
    a = $("#HRBPMinMaxBetAlert div")) : "Bingo" == e ? (n = "Bingo_spMinBetValue",
    o = "Bingo_spMaxBetValue",
    i = $("#Bingo_BPMinMaxBetAlert"),
    a = $("#Bingo_BPMinMaxBetAlert div")) : (n = "spMinBetValue",
    o = "spMaxBetValue",
    i = $("#BPMinMaxBetAlert"),
    a = $("#BPMinMaxBetAlert div"));
    var r = parseInt(removeCommas(t), 10)
      , l = parseInt(removeCommas(document.getElementById(n).innerHTML), 10)
      , s = parseInt(removeCommas(document.getElementById(o).innerHTML), 10);
    return r < l ? (a.html(RES_lowermin),
    void i.css("display", "block")) : r > s ? (a.html(RES_highermax),
    void i.css("display", "block")) : (a.html(""),
    void i.css("display", "none"))
}
function betSubmit(e) {
    if(parent.leftx.document.getElementById("btnBPSubmit").classList.contains('disable')){
        return;
    }

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
    for (var o = "", i = 0; i < e.value.length && "." != e.value.charAt(i); i++)
        "," != e.value.charAt(i) && -1 != "0123456789".indexOf(e.value.charAt(i)) && (o += e.value.charAt(i));
    var a = addCommas(o);
    if (e.value = a,
    null != t && "" != t && null != n && "" != n) {
        var r, l = document.getElementById(t), s = document.getElementById(n);
        if (r = "INPUT" == l.tagName ? l.value : l.innerHTML,
        isNaN(r) || isNaN(o))
            "INPUT" == s.tagName ? s.value = "" : s.innerHTML = "";
        else {
            var d = parseFloat(r) * parseFloat(o)
              , m = String(d.toFixed(2)).split(".")
              , u = addCommas(m[0]) + "." + m[1];
            isNaN(d) ? "INPUT" == s.tagName ? s.value = "" : s.innerHTML = "" : "INPUT" == s.tagName ? s.value = u : s.innerHTML = u
        }
    }
}
function checkKeyPress(e, t, n) {
    var o = document.all ? t.keyCode : t.which;
    if (e.value.length > 0 && 0 == n && 48 == o)
        return !1;
    if (9 == o || 0 == o)
        return !0;
    var i = document.all ? t.keyCode : t.which;
    return 13 == i || 8 == i ? betSubmitMP(t) : (key = parseInt(String.fromCharCode(i), 10),
    -1 != "0123456789".indexOf(key) && (0 != e.value.length || "0" != key))
}
function emailCheck(e) {
    var t = '[^\\s\\(\\)<>@,;:\\\\\\"\\.\\[\\]]+'
      , n = "(" + t + '|("[^"]*"))'
      , o = new RegExp("^" + n + "(\\." + n + ")*$")
      , i = new RegExp("^" + t + "(\\." + t + ")*$")
      , a = e.match(/^(.+)@(.+)$/);
    if (null == a)
        return !1;
    var r = a[1]
      , l = a[2];
    if (null == r.match(o))
        return !1;
    var s = l.match(/^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})\]$/);
    if (null != s) {
        for (var d = 1; d <= 4; d++)
            if (s[d] > 255)
                return !1;
        return !0
    }
    if (null == l.match(i))
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
        var o = e.charAt(n);
        if (!(o >= "A" && o <= "Z" || o >= "a" && o <= "z" || o >= "0" && o <= "9" || "-" == o || "_" == o || "." == o || "@" == o))
            return !1
    }
    if (-1 == e.indexOf("@") || 0 == e.indexOf("@") || e.indexOf("@") == t - 1)
        return !1;
    if (-1 != e.indexOf("@") && -1 != e.substring(e.indexOf("@") + 1, t).indexOf("@"))
        return !1;
    if (-1 == e.indexOf(".") || 0 == e.indexOf(".") || e.lastIndexOf(".") == t - 1)
        return !1;
    var i, a;
    t = e.length;
    for (var r = (i = e.substring(e.indexOf("@") + 1, t)).indexOf("."); r > 0; ) {
        if (a = i.substring(0, i.indexOf(".")),
        (t = a.length) < 2)
            return !1;
        t = i.length,
        r = (i = i.substring(i.indexOf(".") + 1, t)).indexOf(".")
    }
    return !((t = i.length) < 2 || isNum(i) || e.indexOf("@.") >= 0)
}
function replaceSubstring(e, t, n) {
    var o = e;
    if ("" == t)
        return e;
    if (-1 == n.indexOf(t))
        for (; -1 != o.indexOf(t); ) {
            o = o.substring(0, o.indexOf(t)) + n + o.substring(o.indexOf(t) + t.length, o.length)
        }
    else {
        for (var i = new Array("~","`","_","^","#"), a = ""; "" == a; )
            for (var r = 0; r < i.length; r++) {
                for (var l = "", s = 0; s < 1; s++)
                    l += i[r];
                -1 == t.indexOf(l) && (a = l,
                r = i.length + 1)
            }
        for (; -1 != o.indexOf(t); ) {
            o = o.substring(0, o.indexOf(t)) + a + o.substring(o.indexOf(t) + t.length, o.length)
        }
        for (; -1 != o.indexOf(a); ) {
            o = o.substring(0, o.indexOf(a)) + n + o.substring(o.indexOf(a) + a.length, o.length)
        }
    }
    return o
}
function currencyFormat(e, t, n, o) {
    var i = ""
      , a = j = 0
      , r = len2 = 0
      , l = aux2 = ""
      , s = document.all ? o.keyCode : o.which;
    if (8 == s && (e.value = ""),
    13 == s)
        return !0;
    if (i = parseInt(String.fromCharCode(s), 10),
    -1 == "0123456789".indexOf(i))
        return !1;
    for (r = e.value.length,
    a = 0; a < r && ("0" == e.value.charAt(a) || e.value.charAt(a) == n); a++)
        ;
    for (l = ""; a < r; a++)
        -1 != "0123456789".indexOf(e.value.charAt(a)) && (l += e.value.charAt(a));
    if (l += i,
    0 == (r = l.length) && (e.value = ""),
    r > 0) {
        for (aux2 = "",
        j = 0,
        a = r - 1; a >= 0; a--)
            3 == j && (aux2 += t,
            j = 0),
            aux2 += l.charAt(a),
            j++;
        for (e.value = "",
        len2 = aux2.length,
        a = len2 - 0; a >= 0; a--)
            e.value += aux2.charAt(a);
        e.value += l.substr(r, r)
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
    var t, n = "", o = "";
    for (t = 0; t <= 3; t++)
        n += (o = "0" + (e >>> 8 * t & 255).toString(16)).substr(o.length - 2, 2);
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
function popScoreMap(e, t, n, o, i, a, r, l, s) {
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
    fFrame.topx.g_SMF.openScoreMap(e, d, m, n, o, i, a, r, l, s)
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
          , o = !1
          , i = !1;
        if (e.innerHTML.replace("<br>", ",").split(",").length <= 1 && (i = !0),
        n.length <= 1 && (o = !0),
        o && i)
            return void (e.title = "");
        var a, r;
        if (!o) {
            var l = "";
            a = parseInt(n[0], 10),
            r = parseInt(n[1], 10);
            for (var s = a; s <= r; s++)
                l = l + "," + s;
            e.title = l.substr(1)
        }
        i || (e.title = e.innerHTML.replace("<br>", ","))
    }
}
function setSelecter(e, t, n, o) {
    if ("selOddsType" == e) {
        var i = $("#" + e).attr("value")
          , a = n;
        fFrame.OddsType = n
    }
    null == o && (o = !1);
    var r = $("#" + e + "_Txt");
    if (o ? r.find("div")[0].className = $(t).find("div")[0].className : r.html($(t).html()),
    r.attr("title", $(t).attr("title")),
    $("#" + e).attr("value", n),
    "aSorter" == e) {
        var l, s = "D";
        null != document.DataForm_L ? (l = document.DataForm_L,
        s = "L") : (l = document.DataForm,
        s = "D"),
        n != l.OrderBy.value ? setRefreshSort() : "L" != s ? refreshData() : refreshAll()
    }
    "selOddsType" == e && "UnderOver.php" == location.pathname && i != a && $.ajax({
        url: "/ChangeOddsType.php",
        data: {
            OddsType: a
        },
        cache: !1
    })
}
function getSelecterValue(e) {
    return $("#" + e).attr("value")
}
function onKeyPressSelecter(e, t) {
    var n = $("#" + e + "_menu > .selected")
      , o = String.fromCharCode(t.charCode).toUpperCase();
    if ($(".submenu li").removeClass("selected"),
    13 != t.keyCode)
        if (38 == t.keyCode && (0 == n.prev().length ? $("#" + e + "_Div .submenu li").siblings().last().addClass("selected") : (n.prev().addClass("selected"),
        CheckScrollMove(300, 22, n.prev().position().top) && $("#" + e + "_menu").scrollTop($("#" + e + "_menu").scrollTop() + n.prev().position().top))),
        40 == t.keyCode && (0 == n.next().length ? $("#" + e + "_Div .submenu li").siblings().first().addClass("selected") : (n.next().addClass("selected"),
        CheckScrollMove(300, 22, n.next().position().top) && $("#" + e + "_menu").scrollTop($("#" + e + "_menu").scrollTop() + n.next().position().top))),
        0 == n.length)
            $("#" + e + "_Div .submenu li").each(function() {
                if (o == $(this).text().substring(0, 1))
                    return SetScrollAndSelected(e, $(this)),
                    !1
            });
        else {
            var i = !0
              , a = !0;
            if (n.nextAll().each(function() {
                if (o == $(this).text().substring(0, 1))
                    return SetScrollAndSelected(e, $(this)),
                    i = !1,
                    a = !1,
                    !1
            }),
            i) {
                if (o == n.prevAll().last().text().substring(0, 1))
                    return SetScrollAndSelected(e, n.prevAll().last()),
                    !1;
                n.prevAll().last().nextUntil($(this)).each(function() {
                    if (o == $(this).text().substring(0, 1))
                        return SetScrollAndSelected(e, $(this)),
                        a = !1,
                        !1
                })
            }
            a && o == n.text().substring(0, 1) && SetScrollAndSelected(e, n)
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
          , n = function(o) {
            var i = (o = o || window.event).srcElement || o.target;
            i.id != e + "_Div" && i.id != e + "_Txt" && i.id != e + "_menu" && i.id != e + "_Icon" && (null != t && (t.style.visibility = "hidden"),
            $(document).unbind("click", n))
        };
        null != t && ($(document).unbind("click", n),
        "visible" == t.style.visibility ? t.style.visibility = "hidden" : (t.style.visibility = "visible",
        $(document).bind("click", n)))
    }
}
function setSelecterDisable(e, t) {
    var n = document.getElementById(e + "_Div")
      , o = $("#" + e + "_Txt").find("div").length > 0 ? "button select icon" : "button select";
    null != n && (n.className = 1 == t ? o + " disable" : o)
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
  /*  "0" != e ? (fFrame.leftx.document.getElementById("Favorite").className = "icon-favorite added",
    fFrame.topx.document.getElementById("Favorite").className = "Favorite added") : (fFrame.leftx.document.getElementById("Favorite").className = "icon-favorite",
    fFrame.topx.document.getElementById("Favorite").className = "Favorite")*/
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
      , o = ""
      , i = fFrame.RES_promotion_button
      , a = "";
    switch (e) {
    case 1:
        n = fFrame.RES_promotion_title1,
        o = fFrame.RES_promotion_content1,
        a = "promotion_odds";
        break;
    case 2:
        n = fFrame.RES_promotion_title2,
        o = fFrame.RES_promotion_content2,
        t = " QuickBet2",
        a = "promotion_bet";
        break;
    case 3:
        n = fFrame.RES_promotion_title3,
        o = fFrame.RES_promotion_content3,
        t = " WatchLive",
        a = "promotion_watch";
        break;
    case 4:
        n = fFrame.RES_promotion_title4,
        o = fFrame.RES_promotion_content4,
        t = " RWD",
        a = "promotion_rwd"
    }
    if ("" != a) {
        var r = new Object;
        r.mode = a,
        r.type = e.toString(),
        ExecAjax("RecSelData.php", r, "POST", null, null)
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
    (m = document.createElement("p")).innerHTML = o,
    d.appendChild(m),
    (m = document.createElement("div")).className = "button enhance",
    m.onclick = function() {
        fFrame.leftx.checkBrowserVer()
    }
    ;

    var u = document.createElement("span");
    u.innerHTML = i,
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
            var o = 500
              , i = 500
              , a = 562;
            try {
                window.resizeTo(o, a),
                window.outerWidth = i,
                window.outerHeight = a
            } catch (e) {
                setTimeout("ResizeIE(500,570,505,570)", 1e3)
            }
        } else {
            var r = 820
              , l = 825;
            try {
                window.resizeTo(r, 700),
                window.outerWidth = l,
                window.outerHeight = 700
            } catch (e) {
                setTimeout("ResizeIE(" + r + ",700," + l + ",700)", 1e3)
            }
        }
    else if (1 == e) {
        $("body").addClass("miniWin");
        o = 500,
        i = 500,
        a = 498;
        "true" == document.getElementById("bingoMode").value && "5" == document.getElementById("StreamingSrc").value && (o = 998,
        i = 1008,
        a = 555);
        try {
            window.resizeTo(o, a),
            window.outerWidth = i,
            window.outerHeight = a
        } catch (e) {
            setTimeout("ResizeIE(500,570,505,570)", 1e3)
        }
    } else {
        r = 820,
        l = 825;
        "true" == document.getElementById("bingoMode").value && "5" == document.getElementById("StreamingSrc").value && ($("body").addClass("double"),
        r = 1340,
        l = 1355);
        try {
            window.resizeTo(r, 700),
            window.outerWidth = l,
            window.outerHeight = 700
        } catch (e) {
            setTimeout("ResizeIE(" + r + ",700," + l + ",700)", 1e3)
        }
    }
}
function ResizeIE(e, t, n, o) {
    try {
        window.resizeTo(e, t),
        window.outerWidth = n,
        window.outerHeight = o
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
    var o = fFrame.LastSelectedSport;
    $("#HorseChannelID").val(e),
    $("#RacingLeagueID").val(t),
    $("#RacingRaceNumber").val(n),
    null == getStreamingFrameHandle() || getStreamingFrameHandle().closed || ("6" == e ? getStreamingFrameHandle().CurrentHorseChannelID != e && (switchGreyhoundsStreaming(),
    getStreamingFrameHandle().CurrentHorseChannelID = e) : (getStreamingFrameHandle().isHorseStreaming = !0,
    getStreamingFrameHandle().ScheduleType = o,
    getStreamingFrameHandle().swapHorseStreaming(e, t, n),
    getStreamingFrameHandle().ShowHorseRacingSchule(parseInt(o, 10))))
}
function ChagneBingoStream() {
    null == getStreamingFrameHandle() || getStreamingFrameHandle().closed || (getStreamingFrameHandle().isHorseStreaming = !1,
    getStreamingFrameHandle().ScheduleType = "161",
    getStreamingFrameHandle().swapBingoStreaming(),
    getStreamingFrameHandle().ShowNumberGameSchule())
}
function EuroChagneHorseStream(e, t, n) {
    var o = document.getElementById("HorseChannelID");
    null != o ? (o.value = e,
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
function SetLoadVideoLocation(e, t, n, o, i) {
    if (n = n || "0",
    o = o || "0",
    i = i || "0",
    ("3" == t && "5" != n || "1" == t || "4" == t || "9" == t || "10" == t) && (document.getElementById("FrameValidation").width = 484),
    "5" == t && ("true" == document.getElementById("bingoMode").value ? document.getElementById("FrameValidation").width = 978 : document.getElementById("FrameValidation").width = 484),
    "10" == t && (document.getElementById("FrameValidation").width = 484),
    "2" != n && "3" != n) {
        if (isPlaySuccess && document.getElementById("Matchid").value == e && document.getElementById("StreamingSrc").value == t && document.getElementById("HorseChannelID").value == n)
            return
    } else if (document.getElementById("StreamingSrc").value == t && document.getElementById("HorseChannelID").value == n && document.getElementById("RacingLeagueID").value == o && document.getElementById("RacingRaceNumber").value == i)
        return;
    bStandalonePlayer = null == document.getElementById("containerhead") || "block" != document.getElementById("containerhead").style.display,
    "" != e && GetIBC_IsLogin() ? null != document.getElementById("Matchid") && null != document.getElementById("StreamingSrc") && null != document.getElementById("HorseChannelID") && (document.getElementById("Matchid").value = e,
    document.getElementById("StreamingSrc").value = t,
    document.getElementById("HorseChannelID").value = n,
    document.getElementById("RacingLeagueID").value = o,
    document.getElementById("RacingRaceNumber").value = i,
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
    // var o = document.getElementById("cm-nav");
    // return n && fFrame.IsUserStreaming ? null != o ? '<span style="display:inline-block;" onmouseover=\'OpenStreamingMenu(' + e + ",this)' onmouseout='CloseStreamingMenu(" + e + ',this)\'><span class="iconOdds tv"></span><div id="tv' + e + '" style="display:none; position:absolute; float:right;"></div></span>' : "<a href='javascript:fFrame.openSingleStreaming(" + e + ',0);\'><span class="iconOdds tv"></span></a>' : '<span class="iconOdds tv off"></span>'
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
          , o = document.getElementById("RacingRaceNumber").value;
        (fFrame = getParent(window)).openRacingStreamingMain(e, t, n, o)
    }
}
function openRacingStreamingMain(e, t, n, o) {
    fFrame.openWindowsHandle("StreamingFrame", !0, "", "StreamingFrame.php?Matchid=9999&StreamingSrc=3&RacingType=" + e + "&HorseChannelID=" + t + "&RacingLeagueID=" + n + "&RacingRaceNumber=" + o, "top=20,left=20,height=520,width=525,status=no,toolbar=no,menubar=no,resizable=yes,location=no,scrollbars=yes", !1, function(i, a) {
        null != i && (i.isHorseStreaming = !0,
        i.ScheduleType = e,
        a || (i.ShowHorseRacingSchule(e),
        i.swapHorseStreaming(t, n, o)))
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
var ajaxDataObj = null;
try {
    ajaxDataObj = new getDataClass
} catch (e) {
    ajaxDataObj = null
}
var ThreadId = null
  , ThreadList = new Object
  , isIe = !!window.ActiveXObject;
Object.keys || (Object.keys = function(e) {
    if (e !== Object(e))
        throw new TypeError("Object.keys called on a non-object");
    var t, n = [];
    for (t in e)
        Object.prototype.hasOwnProperty.call(e, t) && n.push(t);
    return n
}
);
var DivLauncherCnt = 0, DivLauncherArray = [], DefDocMouseDown, DefDocMouseUp, DefDocMouseMove;
theObjects = document.getElementsByTagName("object");
for (var i = 0; i < theObjects.length; i++)
    theObjects[i].outerHTML = theObjects[i].outerHTML;
var fFrame = getParent(window), EnableIPadStyle = !0, EnableIScroll = !1, selBetMode = "", pairArray = ["1", "2", "3", "7", "8", "12", "20", "21", "153", "154", "155", "156", "1318", "1324", "18", "17", "184", "194", "197", "198", "203", "204", "205", "501", "401", "402", "403", "404", "603", "604", "605", "606", "607", "609", "610", "611", "612", "613", "615", "616", "617", "9001", "9002", "9003", "9004", "9005", "9006", "9007", "9008", "9009", "9010", "9011", "9012", "9013", "9014", "9015", "9016", "9017", "9018", "9019", "9020", "9021", "9022", "9023", "9024", "9025", "9026", "9027", "9028", "9029", "9030", "9031", "9032", "9033", "9034", "9035", "9036", "9037", "9038", "9039", "9040", "9041", "9042", "9043", "9044", "9045", "9046", "9047", "9048", "9049", "9050", "9051", "9052", "9053", "9054", "9055", "9056", "9057", "9058", "9059", "9060", "9061", "9062", "9063", "9064", "9065", "9066", "9067", "9068", "9069", "9070", "9071", "9072", "9073", "9074", "9075", "9076", "9077", "9078", "9079", "9080", "9081", "9082", "9083", "9084", "9085", "9086"], MMRArray = ["301", "302", "303", "304"], MD5 = function(e) {
    function t(e, t) {
        return e << t | e >>> 32 - t
    }
    function n(e, t) {
        var n, o, i, a, r;
        return i = 2147483648 & e,
        a = 2147483648 & t,
        n = 1073741824 & e,
        o = 1073741824 & t,
        r = (1073741823 & e) + (1073741823 & t),
        n & o ? 2147483648 ^ r ^ i ^ a : n | o ? 1073741824 & r ? 3221225472 ^ r ^ i ^ a : 1073741824 ^ r ^ i ^ a : r ^ i ^ a
    }
    function o(e, o, i, a, r, l, s) {
        return e = n(e, n(n(function(e, t, n) {
            return e & t | ~e & n
        }(o, i, a), r), s)),
        n(t(e, l), o)
    }
    function i(e, o, i, a, r, l, s) {
        return e = n(e, n(n(function(e, t, n) {
            return e & n | t & ~n
        }(o, i, a), r), s)),
        n(t(e, l), o)
    }
    function a(e, o, i, a, r, l, s) {
        return e = n(e, n(n(function(e, t, n) {
            return e ^ t ^ n
        }(o, i, a), r), s)),
        n(t(e, l), o)
    }
    function r(e, o, i, a, r, l, s) {
        return e = n(e, n(n(function(e, t, n) {
            return t ^ (e | ~n)
        }(o, i, a), r), s)),
        n(t(e, l), o)
    }
    var l, s, d, m, u, c, g, p, f, y = Array();
    for (y = function(e) {
        for (var t, n = e.length, o = n + 8, i = 16 * ((o - o % 64) / 64 + 1), a = Array(i - 1), r = 0, l = 0; l < n; )
            r = l % 4 * 8,
            a[t = (l - l % 4) / 4] = a[t] | e.charCodeAt(l) << r,
            l++;
        return t = (l - l % 4) / 4,
        r = l % 4 * 8,
        a[t] = a[t] | 128 << r,
        a[i - 2] = n << 3,
        a[i - 1] = n >>> 29,
        a
    }(e = function(e) {
        e = e.replace(/\r\n/g, "\n");
        for (var t = "", n = 0; n < e.length; n++) {
            var o = e.charCodeAt(n);
            o < 128 ? t += String.fromCharCode(o) : o > 127 && o < 2048 ? (t += String.fromCharCode(o >> 6 | 192),
            t += String.fromCharCode(63 & o | 128)) : (t += String.fromCharCode(o >> 12 | 224),
            t += String.fromCharCode(o >> 6 & 63 | 128),
            t += String.fromCharCode(63 & o | 128))
        }
        return t
    }(e)),
    c = 1732584193,
    g = 4023233417,
    p = 2562383102,
    f = 271733878,
    l = 0; l < y.length; l += 16)
        s = c,
        d = g,
        m = p,
        u = f,
        g = r(g = r(g = r(g = r(g = a(g = a(g = a(g = a(g = i(g = i(g = i(g = i(g = o(g = o(g = o(g = o(g, p = o(p, f = o(f, c = o(c, g, p, f, y[l + 0], 7, 3614090360), g, p, y[l + 1], 12, 3905402710), c, g, y[l + 2], 17, 606105819), f, c, y[l + 3], 22, 3250441966), p = o(p, f = o(f, c = o(c, g, p, f, y[l + 4], 7, 4118548399), g, p, y[l + 5], 12, 1200080426), c, g, y[l + 6], 17, 2821735955), f, c, y[l + 7], 22, 4249261313), p = o(p, f = o(f, c = o(c, g, p, f, y[l + 8], 7, 1770035416), g, p, y[l + 9], 12, 2336552879), c, g, y[l + 10], 17, 4294925233), f, c, y[l + 11], 22, 2304563134), p = o(p, f = o(f, c = o(c, g, p, f, y[l + 12], 7, 1804603682), g, p, y[l + 13], 12, 4254626195), c, g, y[l + 14], 17, 2792965006), f, c, y[l + 15], 22, 1236535329), p = i(p, f = i(f, c = i(c, g, p, f, y[l + 1], 5, 4129170786), g, p, y[l + 6], 9, 3225465664), c, g, y[l + 11], 14, 643717713), f, c, y[l + 0], 20, 3921069994), p = i(p, f = i(f, c = i(c, g, p, f, y[l + 5], 5, 3593408605), g, p, y[l + 10], 9, 38016083), c, g, y[l + 15], 14, 3634488961), f, c, y[l + 4], 20, 3889429448), p = i(p, f = i(f, c = i(c, g, p, f, y[l + 9], 5, 568446438), g, p, y[l + 14], 9, 3275163606), c, g, y[l + 3], 14, 4107603335), f, c, y[l + 8], 20, 1163531501), p = i(p, f = i(f, c = i(c, g, p, f, y[l + 13], 5, 2850285829), g, p, y[l + 2], 9, 4243563512), c, g, y[l + 7], 14, 1735328473), f, c, y[l + 12], 20, 2368359562), p = a(p, f = a(f, c = a(c, g, p, f, y[l + 5], 4, 4294588738), g, p, y[l + 8], 11, 2272392833), c, g, y[l + 11], 16, 1839030562), f, c, y[l + 14], 23, 4259657740), p = a(p, f = a(f, c = a(c, g, p, f, y[l + 1], 4, 2763975236), g, p, y[l + 4], 11, 1272893353), c, g, y[l + 7], 16, 4139469664), f, c, y[l + 10], 23, 3200236656), p = a(p, f = a(f, c = a(c, g, p, f, y[l + 13], 4, 681279174), g, p, y[l + 0], 11, 3936430074), c, g, y[l + 3], 16, 3572445317), f, c, y[l + 6], 23, 76029189), p = a(p, f = a(f, c = a(c, g, p, f, y[l + 9], 4, 3654602809), g, p, y[l + 12], 11, 3873151461), c, g, y[l + 15], 16, 530742520), f, c, y[l + 2], 23, 3299628645), p = r(p, f = r(f, c = r(c, g, p, f, y[l + 0], 6, 4096336452), g, p, y[l + 7], 10, 1126891415), c, g, y[l + 14], 15, 2878612391), f, c, y[l + 5], 21, 4237533241), p = r(p, f = r(f, c = r(c, g, p, f, y[l + 12], 6, 1700485571), g, p, y[l + 3], 10, 2399980690), c, g, y[l + 10], 15, 4293915773), f, c, y[l + 1], 21, 2240044497), p = r(p, f = r(f, c = r(c, g, p, f, y[l + 8], 6, 1873313359), g, p, y[l + 15], 10, 4264355552), c, g, y[l + 6], 15, 2734768916), f, c, y[l + 13], 21, 1309151649), p = r(p, f = r(f, c = r(c, g, p, f, y[l + 4], 6, 4149444226), g, p, y[l + 11], 10, 3174756917), c, g, y[l + 2], 15, 718787259), f, c, y[l + 9], 21, 3951481745),
        c = n(c, s),
        g = n(g, d),
        p = n(p, m),
        f = n(f, u);
    return (WordToHex(c) + WordToHex(g) + WordToHex(p) + WordToHex(f)).toLowerCase()
}, CFS = function(e) {
    function t(e) {
        for (var t = "", n = 1; n <= e.length; n++)
            t += e.charAt(n - 1).charCodeAt(0);
        return t = new Number(t).toString(16)
    }
    var n;
    if ((n = 30 - e.length) > 1)
        for (var o = 1; o <= n; o++)
            e += String.fromCharCode(21);
    for (var i = new Number(1), a = 1; a <= 30; a++)
        i *= 30 + e.charAt(a - 1).charCodeAt(0) * a;
    e = new Number(i.toPrecision(15)).toString().toUpperCase();
    for (var r = "", l = 1; l <= e.length; l++)
        r += t(e.substring(l - 1, l + 2));
    var s = "";
    for (l = 20; l <= r.length - 18; l += 2)
        s += r.charAt(l - 1);
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
  , Sport_Area_OPEN = "popWBlueArea"
  , bStandalonePlayer = !1
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
