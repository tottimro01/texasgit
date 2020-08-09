function getBrowserVer() {
    var e, t = {}, n = navigator.userAgent.toLowerCase();
    return (e = n.match(/msie ([\d.]+)/)) ? t.ie = e[1] : (e = n.match(/firefox\/([\d.]+)/)) ? t.firefox = e[1] : (e = n.match(/chrome\/([\d.]+)/)) ? t.chrome = e[1] : (e = n.match(/opera.([\d.]+)/)) ? t.opera = e[1] : (e = n.match(/version\/([\d.]+).*safari/)) ? t.safari = e[1] : 0,
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
      , s = n.display;
    n.visibility = "hidden",
    n.position = "absolute",
    n.display = "block";
    var l = e.clientHeight;
    return n.display = s,
    n.position = i,
    n.visibility = o,
    l
}
function getDivW(e) {
    var t = e.style.display;
    if ("none" != t && null != t)
        return e.offsetWidth;
    var n = e.style
      , o = n.visibility
      , i = n.position
      , s = n.display;
    n.visibility = "hidden",
    n.position = "absolute",
    n.display = "block";
    var l = e.clientWidth;
    return n.display = s,
    n.position = i,
    n.visibility = o,
    l
}
function MsgBox(e, t, n, o) {
    function i() {
        "none" == m.style.display && (m.style.height = "0px",
        m.style.display = "block"),
        parseInt(m.style.height.replace("px", ""), 10) < l ? m.style.height = parseInt(m.style.height.replace("px", ""), 10) + d < l ? parseInt(m.style.height.replace("px", ""), 10) + d + "px" : l + "px" : (window.clearInterval(u),
        c = setTimeout(function() {
            u = window.setInterval(function() {
                s()
            }, 10)
        }, a))
    }
    function s() {
        clearTimeout(c),
        parseInt(m.style.height.replace("px", ""), 10) > 0 ? m.style.height = parseInt(m.style.height.replace("px", ""), 10) - d > 0 ? parseInt(m.style.height.replace("px", ""), 10) - d + "px" : "0px" : (m.style.display = "none",
        window.clearInterval(u),
        p.removeChild(m),
        0 == p.children.length && document.body.removeChild(p))
    }
    var l, r, c, u, a = t, d = n, v = getBrowserVer(), p = document.getElementById(o);
    if (null == p) {
        if (p = document.createElement("div"),
        p.id = o,
        -1 != v.indexOf("IE6")) {
            var h = document.getElementsByTagName("body")[0];
            h.style.height = "100%",
            h.style.overflowY = "auto";
            var f = document.getElementsByTagName("html")[0];
            f.style.overflowY = "hidden",
            p.style.cssText = "display:block;bottom:0px;right:1px!important;float: right;position:absolute;border:1px solid #fff;text-align:center;"
        } else
            p.style.cssText = "display:block;bottom:0px;right:1px!important;float: right;position:fixed;border:1px solid #fff;text-align:center;";
        document.body.appendChild(p)
    }
    var m = document.createElement("div");
    m.style.display = "none",
    m.style.overflow = "hidden",
    m.innerHTML = e,
    m.onclick = function() {
        var e = getEvent()
          , t = e.srcElement || e.target;
        "pointer" == t.style.cursor && (u = window.setInterval(function() {
            s()
        }, d))
    }
    ,
    l = getDivH(m),
    r = getDivW(m),
    p.insertBefore(m, p.firstChild),
    l = getDivH(m),
    r = getDivW(m),
    m.style.width = r + "px",
    this.openMsg = function() {
        u = window.setInterval(function() {
            i()
        }, 10)
    }
    ,
    this.closeMsg = function() {
        u = window.setInterval(function() {
            s()
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
        for (var t = g ? event.srcElement : e.target, n = 0; t != m && t != y && t.tagName != f; ) {
            if (t = t.parentNode,
            null == t)
                return;
            if (n >= 50)
                return;
            n++
        }
        t == m ? (u = g ? event.clientX : e.clientX,
        a = g ? event.clientY : e.clientY,
        d = parseInt(f.style.left),
        v = parseInt(f.style.top),
        w = !0) : t == y && r()
    }
    function s() {
        w = !1
    }
    function l(e) {
        w && (g ? (f.style.left = parseInt(d) + parseInt(event.clientX) - parseInt(u) + "px",
        f.style.top = parseInt(v) + parseInt(event.clientY) - parseInt(a) + "px") : (f.style.left = parseInt(d) + parseInt(e.clientX) - parseInt(u) + "px",
        f.style.top = parseInt(v) + parseInt(e.clientY) - parseInt(a) + "px"))
    }
    function r() {
        D && (null == b.beforeClose || b.beforeClose(f)) && (DivLauncherCnt--,
        0 >= DivLauncherCnt && (x.document.onmousemove = DefDocMouseMove,
        x.document.onmousedown = DefDocMouseDown,
        x.document.onmouseup = DefDocMouseUp,
        x.document.ontouchstart = DefDocMouseDown,
        x.document.ontouchend = DefDocMouseUp,
        DivLauncherCnt = 0),
        f.style.visibility = "hidden",
        w = !1,
        D = !1,
        null != b.afterClose && b.afterClose(f),
        b.isOpened = !1,
        CheckIScroll() && ($(e).mutate("clear", "pop", function(e, t) {}),
        ReSideBarHeight()))
    }
    function c(e, t) {
        if (null == b.beforeOpen || b.beforeOpen(f)) {
            var n, o;
            n = o = 0,
            document.documentElement && document.documentElement.scrollTop ? (n = document.documentElement.scrollTop,
            o = document.documentElement.scrollLeft) : document.body && (n = document.body.scrollTop,
            o = document.body.scrollLeft),
            f.style.top = parseInt(t) + parseInt(n) + "px",
            f.style.left = parseInt(e) + parseInt(o) + "px",
            D || (0 == DivLauncherCnt && (DefDocMouseMove = x.document.onmousemove,
            DefDocMouseDown = x.document.onmousedown,
            DefDocMouseUp = x.document.onmouseup),
            DivLauncherCnt++,
            x.document.onmousemove = l,
            x.document.onmousedown = i,
            x.document.onmouseup = s,
            x.document.ontouchstart = i,
            x.document.ontouchend = s,
            f.style.display = "inline",
            f.style.visibility = "visible",
            D = !0,
            null != b.afterOpen && b.afterOpen(f),
            b.isOpened = !0)
        }
    }
    var u, a, d, v, p = 171, h = 47, f = e, m = t, y = n, D = !1, w = !1, g = document.all, b = (!document.all && document.getElementById,
    this), x = window;
    null != o && (x = o),
    this.beforeOpen = null,
    this.afterOpen = null,
    this.beforeClose = null,
    this.afterClose = null,
    this.onDragging = null,
    this.isOpened = !1,
    this.popDiv = f,
    this.titleDiv = m,
    f.style.position = "absolute",
    f.style.display = "none",
    f.style.visibility = "hidden",
    f.style.zIndex = 1e3,
    null != m && (m.style.cursor = "move"),
    this.close = function() {
        r()
    }
    ,
    this.open = function(t, n, o) {
        closeAllDivLauncher();
        var i = n
          , s = n;
        CheckIScroll() && (o ? $(e).mutate("height", "pop", function(t, n) {
            FixSideBarHeight(e, i)
        }) : $(e).mutate("clear", "pop", function(e, t) {}),
        FixSideBarHeight(e, n),
        s += Math.abs(myScroll.y)),
        n = s,
        arguments.length < 2 && (t = p,
        n = h,
        s = n),
        DivLauncherArray.push(b),
        c(t, s)
    }
    ,
    this.setDEFAULT_X = function(e) {
        p = e
    }
    ,
    this.setDEFAULT_Y = function(e) {
        h = e
    }
    ,
    this.getDEFAULT_X = function() {
        return p
    }
    ,
    this.getDEFAULT_Y = function() {
        return h
    }
}
function DivOption(e, t) {
    function n(e) {
        window.clearTimeout(s)
    }
    function o(e) {
        window.clearTimeout(s),
        s = window.setTimeout(i, 1e3 * r.AutoCloseSec)
    }
    function i(e) {
        c && (window.clearTimeout(s),
        l ? (window.detachEvent("onblur", i),
        r.Div.detachEvent("onmouseover", n),
        r.Div.detachEvent("onmouseout", o)) : (document.removeEventListener("click", i, !1),
        r.Div.removeEventListener("mouseover", n, !1),
        r.Div.removeEventListener("mouseout", o, !1)),
        c = !1,
        r.Div.style.display = "none")
    }
    var s, l = window.ActiveXObject ? !0 : !1, r = this, c = !1;
    this.Div = e,
    this.Div.style.display = "none",
    this.AutoCloseSec = t,
    this.isOpened = function() {
        return c
    }
    ,
    this.close = function(e) {
        i(e)
    }
    ,
    this.open = function(e, t, r) {
        c || (window.event ? window.event.cancelBubble = !0 : e && e.stopPropagation(),
        l ? (document.detachEvent("onclick", i),
        document.attachEvent("onclick", i),
        this.Div.attachEvent("onmouseover", n),
        this.Div.attachEvent("onmouseout", o)) : (document.removeEventListener("click", i, !1),
        document.addEventListener("click", i, !1),
        this.Div.removeEventListener("mouseover", n, !1),
        this.Div.addEventListener("mouseover", n, !1),
        this.Div.removeEventListener("mouseout", o, !1),
        this.Div.addEventListener("mouseout", o, !1)),
        window.clearTimeout(s),
        null != this.AutoCloseSec && (s = window.setTimeout(i, 1e3 * this.AutoCloseSec)),
        this.Div.style.position = "absolute",
        null != t && (this.Div.style.left = t),
        null != r && (this.Div.style.top = r),
        this.Div.style.display = "block",
        c = !0)
    }
    ,
    this.act = function(e, t, n) {
        c ? this.close(e) : this.open(e, t, n)
    }
}
function DivPop(e, t) {
    function n() {
        var e = document.activeElement.name;
        this._Focus = "txtUserName" == e || "txtPasswd" == e || "txtValidCode" == e ? !0 : !1
    }
    function o() {
        if (n(),
        r) {
            if (this._Focus)
                return void (i = window.setTimeout(o, 1e3 * l.AutoCloseSec));
            window.clearTimeout(i),
            s ? window.detachEvent("onblur", o) : document.removeEventListener("click", o, !1),
            r = !1,
            l.Div.style.display = "none"
        }
    }
    var i, s = window.ActiveXObject ? !0 : !1, l = this, r = !1;
    this.Div = e,
    this.Div.style.display = "none",
    this.AutoCloseSec = t,
    this.isOpened = function() {
        return r
    }
    ,
    this.close = function() {
        o()
    }
    ,
    this.open = function(e, t) {
        r || (window.clearTimeout(i),
        null != this.AutoCloseSec && (i = window.setTimeout(o, 1e3 * this.AutoCloseSec)),
        this.Div.style.position = "absolute",
        this.Div.style.display = "block",
        r = !0)
    }
    ,
    this.act = function(e, t) {
        r ? this.close() : this.open(e, t)
    }
}
var DivLauncherCnt = 0, DivLauncherArray = [], DefDocMouseDown, DefDocMouseUp, DefDocMouseMove;