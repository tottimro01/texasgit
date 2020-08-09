function intval(t) {
    return t = parseInt(t),
    isNaN(t) ? 0 : t
}
function getPos(t) {
    for (var e = 0, o = 0, n = intval(t.style.width), l = intval(t.style.height), c = t.offsetWidth, r = t.offsetHeight; t.offsetParent; )
        e += t.offsetLeft + (t.currentStyle ? intval(t.currentStyle.borderLeftWidth) : 0),
        o += t.offsetTop + (t.currentStyle ? intval(t.currentStyle.borderTopWidth) : 0),
        t = t.offsetParent;
    return e += t.offsetLeft + (t.currentStyle ? intval(t.currentStyle.borderLeftWidth) : 0),
    o += t.offsetTop + (t.currentStyle ? intval(t.currentStyle.borderTopWidth) : 0),
    {
        x: e,
        y: o,
        w: n,
        h: l,
        wb: c,
        hb: r
    }
}
function getScroll() {
    var t, e, o, n;
    return document.documentElement && document.documentElement.scrollTop ? (t = document.documentElement.scrollTop,
    e = document.documentElement.scrollLeft,
    o = document.documentElement.scrollWidth,
    n = document.documentElement.scrollHeight) : document.body && (t = document.body.scrollTop,
    e = document.body.scrollLeft,
    o = document.body.scrollWidth,
    n = document.body.scrollHeight),
    {
        t: t,
        l: e,
        w: o,
        h: n
    }
}
function scroller(t, e) {
    if ("object" != typeof t && (t = document.getElementById(t)),
    t) {
        var o = this;
        o.el = t,
        o.p = getPos(t),
        o.s = getScroll(),
        o.clear = function() {
            window.clearInterval(o.timer),
            o.timer = null
        }
        ,
        o.t = (new Date).getTime(),
        o.step = function() {
            var t = (new Date).getTime()
              , n = (t - o.t) / e;
            t >= e + o.t ? (o.clear(),
            window.setTimeout(function() {
                o.scroll(o.p.y, o.p.x)
            }, 13)) : (st = (-Math.cos(n * Math.PI) / 2 + .5) * (o.p.y - o.s.t) + o.s.t,
            sl = (-Math.cos(n * Math.PI) / 2 + .5) * (o.p.x - o.s.l) + o.s.l,
            o.scroll(st, sl))
        }
        ,
        o.scroll = function(t, e) {
            window.scrollTo(e, t)
        }
        ,
        o.timer = window.setInterval(function() {
            o.step()
        }, 13)
    }
}
function getCurrentSetting() {
    return document.body ? document.body.rows ? document.body.rows : document.body.cols : void 0
}
function setframevalue(t, e) {
    "rows" == t ? document.body.rows = e : "cols" == t && (document.body.cols = e)
}
function resizeFrame(t) {
    getCurrentSetting() != defaultsetting ? (setframevalue(columntype, defaultsetting),
    topx.location = "topmenu.php#top") : (setframevalue(columntype, t),
    topx.location = "topmenu.php#collapse")
}
function SwitchLefthideshow() {
    parent.document.getElementById("frameset1").cols = "0,*,0" == parent.document.getElementById("frameset1").cols ? "198,*,0" : "0,*,0"
}
function init() {
    (document.all || document.getElementById) && (null != document.body ? (columntype = document.body.rows ? "rows" : "cols",
    defaultsetting = document.body.rows ? document.body.rows : document.body.cols) : setTimeout("init()", 100))
}
var columntype = ""
  , defaultsetting = "";
setTimeout("init()", 100);