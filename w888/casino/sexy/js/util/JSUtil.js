if (typeof (StringUtil) == "undefined") {
    StringUtil = {}
}
(function() {
    StringUtil.startsWith = function(b, a) {
        return (b.substr(0, a.length) == a)
    }
    ;
    StringUtil.endsWith = function(b, a) {
        return b.substring(b.length - a.length) == a
    }
    ;
    StringUtil.concat = function(a, b) {
        return new String(a.toString() + b)
    }
    ;
    StringUtil.toCharArray = function(c) {
        var b = new Array(c.length);
        for (var a = 0; a < c.length; a++) {
            b[a] = c.charAt(a)
        }
        return b
    }
    ;
    StringUtil.trim = function(a) {
        return a.replace(/(^\s*)|(\s*$)/g, "")
    }
    ;
    StringUtil.replaceAll = function(e, c, d) {
        var a = e;
        var b = a.indexOf(c);
        while (b != -1) {
            a = a.replace(c, d);
            b = a.indexOf(c)
        }
        return a
    }
    ;
    StringUtil.replaceOnlyNumber = function(b) {
        var a = /\D/g;
        if (!a.test(b)) {
            return b
        }
        return b.replace(a, "")
    }
}
)();
if (typeof (ArrayUtil) == "undefined") {
    ArrayUtil = {}
}
(function() {
    ArrayUtil.max = function(c) {
        var b, a = c[0];
        for (b = 1; b < c.length; b++) {
            if (a < c[b]) {
                a = c[b]
            }
        }
        return a
    }
    ;
    ArrayUtil.contains = function(c, b) {
        for (var a = 0; a < c.length; a++) {
            if (c[a] === b) {
                return true
            }
        }
        return false
    }
    ;
    ArrayUtil.remove = function(c, b) {
        for (var a = 0; a < c.length; a++) {
            if (c[a] === b) {
                c.splice(a, 1);
                return true
            }
        }
        return false
    }
    ;
    ArrayUtil.isArray = function(a) {
        return Object.prototype.toString.call(a) === "[object Array]"
    }
    ;
    ArrayUtil.distinct = function(e) {
        var a = [];
        for (var d = 0, b = e.length; d < b; d++) {
            var c = 0;
            for (len = a.length; c < len; c++) {
                if (e[d] === a[c]) {
                    break
                }
            }
            if (c == a.length) {
                a.push(e[d])
            }
        }
        return a
    }
    ;
    ArrayUtil.shuffle = function(a) {
        var d, c, b;
        for (d = a.length - 1; d > 0; d--) {
            c = Math.floor(Math.random() * (d + 1));
            b = a[d];
            a[d] = a[c];
            a[c] = b
        }
        return a
    }
}
)();
if (typeof (CurrencyUtil) == "undefined") {
    CurrencyUtil = {}
}
(function() {
    CurrencyUtil.event = {};
    CurrencyUtil.event.keyup = function(a) {
        this.value = CurrencyUtil.format(this.value)
    }
    ;
    CurrencyUtil.event.keypress = function(a) {
        if (a.which && a.which != 8 && (a.which < 48 || a.which > 57)) {
            a.preventDefault();
            return
        }
    }
    ;
    CurrencyUtil.event.keyup.plusOrMinus = function(a) {
        if (CurrencyUtil.isNumeric(this.value, true, true)) {
            this.value = a.data.plusOrMinus * Math.abs(this.value)
        }
    }
    ;
    CurrencyUtil.event.keypress.decimals = function(a) {
        if (a.which && a.which != 8 && a.which != 46 && (a.which < 48 || a.which > 57)) {
            a.preventDefault();
            return
        }
    }
    ;
    CurrencyUtil.format = function(g, a) {
        var f = a || 0;
        isNaN(parseFloat(g)) ? g = 0 : g = parseFloat(g);
        if (f > 0) {
            var b = Math.pow(10, f);
            g = Math.round(g * b) / b
        }
        v = g.toFixed(f).toString();
        var h = v.split(".");
        var e = h[0];
        var c = h[1] ? "." + h[1] : "";
        var d = /(\d+)(\d{3})/;
        while (d.test(e)) {
            e = e.replace(d, "$1,$2")
        }
        return v = e + c
    }
    ;
    CurrencyUtil.formatByCurrency = function(g, f, h) {
        isNaN(parseFloat(g)) ? g = 0 : g = parseFloat(g);
        if (f == CurrencyType.WN.value) {
            return CurrencyUtil.showAmountByCurrency(g, f, h)
        }
        var d = h || 0;
        if (d > 0) {
            var j = Math.pow(10, d);
            g = Math.round(g * j) / j
        }
        v = g.toFixed(d).toString();
        var b = v.split(".");
        var e = b[0];
        var c = b[1] ? "." + b[1] : "";
        var a = /(\d+)(\d{3})/;
        while (a.test(e)) {
            e = e.replace(a, "$1,$2")
        }
        return v = e + c
    }
    ;
    CurrencyUtil.isNumeric = function(g, c, b) {
        var f = true;
        var e = 0;
        var a = "0123456789";
        if (c) {
            a += "."
        }
        if (b) {
            a += "-"
        }
        var d;
        for (var h = 0; h < g.length && f == true; h++) {
            d = g.charAt(h);
            if (b && d == "-" && h > 0) {
                f = false
            }
            if (c && d == ".") {
                e = e + 1;
                if (h == 0 || h == g.length - 1) {
                    f = false
                }
                if (e > 1) {
                    f = false
                }
            }
            if (a.indexOf(d) == -1) {
                f = false
            }
        }
        return f
    }
    ;
    CurrencyUtil.parseToAmountFormat = function(b, a, d) {
        if (typeof (d) == "undefined") {
            d = 2
        }
        b = b + "";
        var c = parseFloat(b.replace(/,/g, ""));
        c = CurrencyUtil.format(c.toString(), d);
        return c
    }
    ;
    CurrencyUtil.showAmount = function(a) {
        if (a < 1000) {
            return a
        } else {
            if (a >= 1000 && a < 1000000) {
                return MathUtil.decimal.divide(a, 1000) + "K"
            } else {
                return MathUtil.decimal.divide(a, 1000000) + "M"
            }
        }
        return 0
    }
    ;
    CurrencyUtil.showAmountByCurrency = function(d, b, a) {
        if (b == CurrencyType.WN.value) {
            var e = a || 1;
            if (e > 0) {
                var c = Math.pow(10, e);
                d = Math.round(d * c) / c
            }
            if (d < 1000) {
                return d
            } else {
                if (d >= 1000 && d < 1000000) {
                    return MathUtil.decimal.divide(d, 1000) + "K"
                } else {
                    return MathUtil.decimal.divide(d, 1000000) + "M"
                }
            }
        }
        return d
    }
    ;
    CurrencyUtil.getIntegerAmount = function(a) {
        if (a < 1000) {
            return a
        } else {
            if (a >= 1000 && a < 1000000) {
                return MathUtil.decimal.multiply(parseInt(a / 1000), 1000)
            } else {
                return MathUtil.decimal.multiply(parseInt(a / 1000000), 1000000)
            }
        }
        return 0
    }
    ;
    CurrencyUtil.showFloorAmount = function(a) {
        if (a < 1000) {
            return a
        } else {
            if (a >= 1000 && a < 1000000) {
                return MathUtil.decimal.divide(Math.floor(MathUtil.decimal.divide(a, 100)), 10) + "K"
            } else {
                return MathUtil.decimal.divide(Math.floor(MathUtil.decimal.divide(a, 100000)), 10) + "M"
            }
        }
        return 0
    }
    ;
    CurrencyUtil.getFloorAmount = function(a) {
        if (a < 1000) {
            return a
        } else {
            if (a >= 1000 && a < 1000000) {
                return MathUtil.decimal.multiply(Math.floor(MathUtil.decimal.divide(a, 100)), 100)
            } else {
                return MathUtil.decimal.multiply(Math.floor(MathUtil.decimal.divide(a, 100000)), 100000)
            }
        }
        return 0
    }
}
)();
function Map() {
    this.elements = new Array();
    this.size = function() {
        return this.elements.length
    }
    ;
    this.put = function(c, a) {
        var b = 0;
        for (; b < this.elements.length; b++) {
            if (this.elements[b].key == c) {
                this.elements[b].value = a;
                return
            }
        }
        if (b == this.elements.length) {
            this.elements.push({
                key: c,
                value: a
            })
        }
    }
    ;
    this.putAll = function(b) {
        var a = b.entrySet();
        for (var c = 0; c < a.length; c++) {
            this.put(a[c].key, a[c].value)
        }
    }
    ;
    this.remove = function(b) {
        for (var a = 0; a < this.elements.length; a++) {
            if (this.elements[a].key == b) {
                this.elements.splice(a, 1);
                return true
            }
        }
        return false
    }
    ;
    this.containsKey = function(b) {
        for (var a = 0; a < this.elements.length; a++) {
            if (this.elements[a].key == b) {
                return true
            }
        }
        return false
    }
    ;
    this.get = function(c) {
        for (var b = 0, a = this.elements.length; b < a; b++) {
            if (this.elements[b].key == c) {
                return this.elements[b].value
            }
        }
        return null
    }
    ;
    this.values = function() {
        var a = new Array(this.elements.length);
        for (var b = 0; b < this.elements.length; b++) {
            a[b] = this.elements[b].value
        }
        return a
    }
    ;
    this.sort = function(a) {
        this.elements = this.elements.sort(a)
    }
    ;
    this.entrySet = function() {
        return this.elements
    }
    ;
    this.clear = function() {
        this.elements.length = 0
    }
    ;
    this.keySet = function() {
        var a = new Array(this.elements.length);
        for (var b = 0; b < this.elements.length; b++) {
            a[b] = this.elements[b].key
        }
        return a
    }
    ;
    this.showOrder = function() {
        var a = "";
        for (var b = 0; b < this.elements.length; b++) {
            a += this.elements[b].key + ","
        }
        return a
    }
    ;
    this.sortByKey = function() {
        this.elements.sort(function(d, c) {
            return (d.key - c.key)
        })
    }
}
function HashMap() {
    this.length = 0;
    this.elements = {};
    this.size = function() {
        return this.length
    }
    ;
    this.put = function(b, a) {
        if (!this.elements.hasOwnProperty(b)) {
            this.length++
        }
        this.elements[b] = a
    }
    ;
    this.putAll = function(a) {
        for (var b in a) {
            if (!this.elements.hasOwnProperty(b)) {
                this.length++
            }
            this.elements[b] = a[b]
        }
    }
    ;
    this.remove = function(a) {
        if (this.elements.hasOwnProperty(a)) {
            this.length--;
            delete this.elements[a];
            return true
        }
        return false
    }
    ;
    this.containsKey = function(a) {
        return this.elements.hasOwnProperty(a)
    }
    ;
    this.get = function(a) {
        return this.elements.hasOwnProperty(a) ? this.elements[a] : null
    }
    ;
    this.values = function() {
        var a = new Array(this.length);
        var b = 0;
        for (var c in this.elements) {
            a[b++] = this.elements[c]
        }
        return a
    }
    ;
    this.entrySet = function() {
        var a = new Array(this.length);
        var b = 0;
        for (var c in this.elements) {
            a[b++] = {
                key: c,
                value: this.elements[c]
            }
        }
        return a
    }
    ;
    this.clear = function() {
        this.elements = {};
        this.length = 0
    }
    ;
    this.keySet = function() {
        var a = new Array(this.length);
        var b = 0;
        for (var c in this.elements) {
            a[b++] = c
        }
        return a
    }
}
if (typeof (DateUtil) == "undefined") {
    DateUtil = {}
}
(function() {
    var a = [];
    DateUtil.format = function(c, d) {
        c = c ? new Date(c) : new Date;
        if (isNaN(c)) {
            throw SyntaxError("invalid date")
        }
        d = d.replace(/yyyy/, c.getFullYear());
        var b = c.getMonth() + 1;
        d = d.replace(/MM/, (b < 10 ? "0" + b : b));
        b = c.getDate();
        d = d.replace(/dd/, (b < 10 ? "0" + b : b));
        b = c.getHours();
        d = d.replace(/hh/, (b < 10 ? "0" + b : b));
        d = d.replace(/TT/, b < 12 ? "AM" : "PM");
        b = c.getMinutes();
        d = d.replace(/mm/, (b < 10 ? "0" + b : b));
        b = c.getSeconds();
        d = d.replace(/ss/, (b < 10 ? "0" + b : b));
        return d
    }
    ;
    DateUtil.getGMTDate = function(k, h, c, f, e, b, g) {
        var j = new Date(k,h,c,f,e,b);
        var l = j.getTime() - (j.getTimezoneOffset() * 60000);
        return new Date(l - (3600000 * g))
    }
    ;
    DateUtil.addListener = function(b) {
        a[a.length] = b
    }
    ;
    DateUtil.countTime = function(b) {
        b.setTime(b.getTime() + 60000);
        setTimeout(function() {
            DateUtil.countTime(b)
        }, 60000);
        for (var c = 0; c < a.length; c++) {
            a[c].notify(b)
        }
    }
    ;
    DateUtil.startCount = function(d) {
        var b = new Date(d);
        var c = b.getSeconds();
        b.setTime(b.getTime() - (c * 1000));
        setTimeout(function() {
            DateUtil.countTime(b)
        }, (60 - c) * 1000);
        return b
    }
    ;
    DateUtil.getRealRaceDateTimeStr = function(f, g) {
        if (parseInt(g) >= 2400) {
            var h = (parseInt(g) - 2400) + "";
            while (h.length < 4) {
                h = "0" + h
            }
            var e = f.split(/\-|\s/);
            var b = (new Date(e.slice(0, 3).reverse().join("/")));
            b.setDate(b.getDate() + 1);
            var c = b.getDate() + "";
            if (c.length == 1) {
                c = "0" + c
            }
            var d = (b.getMonth() + 1) + "";
            if (d.length == 1) {
                d = "0" + d
            }
            return c + "-" + d + "-" + b.getFullYear() + " - " + h.substr(0, 2) + ":" + h.substr(2, 2)
        } else {
            return f + " - " + g.substring(0, 2) + ":" + g.substring(2, 4)
        }
    }
    ;
    DateUtil.getRealRaceTimeStr = function(b) {
        if (parseInt(b) >= 2400) {
            b = (parseInt(b) - 2400) + "";
            while (b.length < 4) {
                b = "0" + b
            }
        }
        return b
    }
    ;
    DateUtil.onInputHHmm = function(d) {
        if (d.length > 0 && !StringUtil.isOnlyNumberAndColon(d)) {
            return ""
        }
        var c = (d.match(/:/g) || []).length;
        if (c > 1) {
            d = d.replace(/:/g, "")
        }
        if (d.length == 1) {
            if (d.charAt(0) == ":") {
                return ""
            }
        }
        if (d.length == 2) {
            if (parseInt(d) > 23) {
                d = "23"
            }
            if (d.charAt(1) == ":") {
                d = d.replace(/:/g, "")
            }
            return d
        }
        if (d.length > 2) {
            var b = d.charAt(2);
            if (b != ":") {
                d = d.replace(/:/g, "");
                d = d.substr(0, 2) + ":" + d.substr(2, d.length);
                return d
            }
        }
        if (d.length == 5) {
            var e = d.substr(3, 5);
            if (parseInt(e) > 59) {
                e = "59";
                d = d.substr(0, 3) + e
            }
            return d
        }
        if (d.length > 5) {
            return d.substr(0, 5)
        }
        return d
    }
}
)();
if (typeof (MathUtil) == "undefined") {
    MathUtil = {}
}
(function() {
    MathUtil.decimal = {};
    MathUtil.decimal.createDecimalSet = function(f, b, e) {
        var c = new Array();
        for (var d = f; d <= b; d = MathUtil.decimal.add(d, e)) {
            c.push(d)
        }
        return c
    }
    ;
    MathUtil.decimal.add = function(c, b) {
        return function(j, h) {
            if (j == null || j.length == 0) {
                j = 0
            }
            if (h == null || h.length == 0) {
                h = 0
            }
            var g, f, d;
            try {
                g = j.toString().split(".")[1].length
            } catch (k) {
                g = 0
            }
            try {
                f = h.toString().split(".")[1].length
            } catch (k) {
                f = 0
            }
            d = Math.pow(10, Math.max(g, f));
            return (a(j, d) + a(h, d)) / d
        }(c, b)
    }
    ;
    MathUtil.decimal.subtract = function(c, b) {
        return function(j, h) {
            if (j == null || j.length == 0) {
                j = 0
            }
            if (h == null || h.length == 0) {
                h = 0
            }
            var g, f, d;
            try {
                g = j.toString().split(".")[1].length
            } catch (k) {
                g = 0
            }
            try {
                f = h.toString().split(".")[1].length
            } catch (k) {
                f = 0
            }
            d = Math.pow(10, Math.max(g, f));
            return (a(j, d) - a(h, d)) / d
        }(c, b)
    }
    ;
    MathUtil.decimal.multiply = function(c, b) {
        return function(e, d) {
            if (e == null || e.length == 0) {
                e = 0
            }
            if (d == null || d.length == 0) {
                d = 0
            }
            return a(e, d)
        }(c, b)
    }
    ;
    MathUtil.decimal.divide = function(c, b) {
        return function(h, g) {
            var k = 0, j = 0, f, d;
            try {
                k = h.toString().split(".")[1].length
            } catch (l) {}
            try {
                j = g.toString().split(".")[1].length
            } catch (l) {}
            f = Number(h.toString().replace(".", ""));
            d = Number(g.toString().replace(".", ""));
            return a((f / d), Math.pow(10, j - k))
        }(c, b)
    }
    ;
    MathUtil.decimal.divide2 = function(c, b) {
        return function(h, g) {
            var k = 0, j = 0, f, d;
            try {
                h = Math.round(h * 10000);
                k = h.toString().split(".")[1].length
            } catch (l) {}
            try {
                g = Math.round(g * 10000);
                j = g.toString().split(".")[1].length
            } catch (l) {}
            f = Number(h.toString().replace(".", ""));
            d = Number(g.toString().replace(".", ""));
            return a((f / d), Math.pow(10, j - k))
        }(c, b)
    }
    ;
    MathUtil.isInteger = function(b) {
        if (b.match(/^\d+$/) == null) {
            return false
        } else {
            return true
        }
    }
    ;
    MathUtil.isNumeric = function(h, d, c) {
        var g = true;
        var f = 0;
        var b = "0123456789";
        if (d) {
            b += "."
        }
        if (c) {
            b += "-"
        }
        var e;
        if (h.length == 0) {
            return false
        }
        for (var j = 0; j < h.length && g == true; j++) {
            e = h.charAt(j);
            if (c && e == "-" && j > 0) {
                g = false
            }
            if (d && e == ".") {
                f = f + 1;
                if (j == 0 || j == h.length - 1) {
                    g = false
                }
                if (f > 1) {
                    g = false
                }
            }
            if (b.indexOf(e) == -1) {
                g = false
            }
        }
        return g
    }
    ;
    MathUtil.isPositive = function(b) {
        return (b >= 0)
    }
    ;
    MathUtil.roundp = function(b, d) {
        var c = Math.pow(10, d);
        return Math.round(b * c) / c
    }
    ;
    MathUtil.percentage = function(d, e) {
        var b = 0;
        if (d != 0) {
            var f = MathUtil.decimal.divide2(d, e);
            var c = MathUtil.decimal.multiply(f, 100);
            b = MathUtil.roundp(c, 1)
        }
        return b
    }
    ;
    MathUtil.currentBetAmountShow = function(c, e, f, b) {
        if (typeof (f) == "undefined") {
            f = ""
        }
        if (typeof (b) == "undefined") {
            b = false
        }
        var g = 0;
        if (b) {
            if (c < 1000) {
                f = "";
                g = CurrencyUtil.format(c, 1)
            } else {
                if (c >= 1000 && c < 1000000) {
                    var h = MathUtil.decimal.divide2(c, 1000);
                    if (MathUtil.roundp(h, 1) != 1000) {
                        f = "K";
                        g = CurrencyUtil.format(MathUtil.roundp(h, 1), 1)
                    } else {
                        f = "M";
                        h = MathUtil.decimal.divide2(c, 1000000);
                        g = CurrencyUtil.format(MathUtil.roundp(h, 1), 1)
                    }
                } else {
                    f = "M";
                    var h = MathUtil.decimal.divide2(c, 1000000);
                    g = CurrencyUtil.format(MathUtil.roundp(h, 1), 1)
                }
            }
        } else {
            if (c != 0) {
                var h = MathUtil.decimal.divide2(c, e);
                var d = MathUtil.decimal.multiply(h, 100);
                g = MathUtil.roundp(d, 1)
            }
        }
        return g + "" + f
    }
    ;
    var a = function(h, f) {
        var g = 0, d = 0, c, b, l = h.toString(), k = f.toString();
        try {
            g = l.split(".")[1].length
        } catch (j) {}
        try {
            d = k.split(".")[1].length
        } catch (j) {}
        c = Number(l.toString().replace(".", ""));
        b = Number(k.toString().replace(".", ""));
        return c * b / Math.pow(10, g + d)
    }
}
)();
if (typeof (EncryptUtil) == "undefined") {
    EncryptUtil = {}
}
(function() {
    var b = function(e, d) {
        return ((e << d) | (e >>> (32 - d)))
    };
    var c = function(g) {
        var e, d, f = "";
        for (e = 7; e >= 0; e--) {
            d = (g >>> (e * 4)) & 15;
            f += d.toString(16)
        }
        return f
    };
    var a = function(f) {
        f = f.replace(/\r\n/g, "\n");
        var e = "";
        for (var h = 0, d = f.length; h < d; h++) {
            var g = f.charCodeAt(h);
            if (g < 128) {
                e += String.fromCharCode(g)
            } else {
                if ((g > 127) && (g < 2048)) {
                    e += String.fromCharCode((g >> 6) | 192);
                    e += String.fromCharCode((g & 63) | 128)
                } else {
                    e += String.fromCharCode((g >> 12) | 224);
                    e += String.fromCharCode(((g >> 6) & 63) | 128);
                    e += String.fromCharCode((g & 63) | 128)
                }
            }
        }
        return e
    };
    EncryptUtil.mask = function(f) {
        var k, w, u, t, s, r, q, p, x;
        var e = new Array(80);
        var o = 1732584193;
        var m = 4023233417;
        var l = 2562383102;
        var h = 271733878;
        var g = 3285377520;
        f = a(f);
        var d = f.length;
        var n = new Array();
        for (w = 0; w < d - 3; w += 4) {
            u = f.charCodeAt(w) << 24 | f.charCodeAt(w + 1) << 16 | f.charCodeAt(w + 2) << 8 | f.charCodeAt(w + 3);
            n.push(u)
        }
        switch (d % 4) {
        case 0:
            w = 2147483648;
            break;
        case 1:
            w = f.charCodeAt(d - 1) << 24 | 8388608;
            break;
        case 2:
            w = f.charCodeAt(d - 2) << 24 | f.charCodeAt(d - 1) << 16 | 32768;
            break;
        case 3:
            w = f.charCodeAt(d - 3) << 24 | f.charCodeAt(d - 2) << 16 | f.charCodeAt(d - 1) << 8 | 128;
            break
        }
        n.push(w);
        while ((n.length % 16) != 14) {
            n.push(0)
        }
        n.push(d >>> 29);
        n.push((d << 3) & 4294967295);
        for (k = 0; k < n.length; k += 16) {
            for (w = 0; w < 16; w++) {
                e[w] = n[k + w]
            }
            for (w = 16; w <= 79; w++) {
                e[w] = b(e[w - 3] ^ e[w - 8] ^ e[w - 14] ^ e[w - 16], 1)
            }
            t = o;
            s = m;
            r = l;
            q = h;
            p = g;
            for (w = 0; w <= 19; w++) {
                x = (b(t, 5) + ((s & r) | (~s & q)) + p + e[w] + 1518500249) & 4294967295;
                p = q;
                q = r;
                r = b(s, 30);
                s = t;
                t = x
            }
            for (w = 20; w <= 39; w++) {
                x = (b(t, 5) + (s ^ r ^ q) + p + e[w] + 1859775393) & 4294967295;
                p = q;
                q = r;
                r = b(s, 30);
                s = t;
                t = x
            }
            for (w = 40; w <= 59; w++) {
                x = (b(t, 5) + ((s & r) | (s & q) | (r & q)) + p + e[w] + 2400959708) & 4294967295;
                p = q;
                q = r;
                r = b(s, 30);
                s = t;
                t = x
            }
            for (w = 60; w <= 79; w++) {
                x = (b(t, 5) + (s ^ r ^ q) + p + e[w] + 3395469782) & 4294967295;
                p = q;
                q = r;
                r = b(s, 30);
                s = t;
                t = x
            }
            o = (o + t) & 4294967295;
            m = (m + s) & 4294967295;
            l = (l + r) & 4294967295;
            h = (h + q) & 4294967295;
            g = (g + p) & 4294967295
        }
        var x = c(o) + c(m) + c(l) + c(h) + c(g);
        return x.toLowerCase()
    }
}
)();
if (typeof (FormatUtil) == "undefined") {
    FormatUtil = {}
}
(function() {
    FormatUtil = {};
    FormatUtil.padLeft = function(a, c, b) {
        return Array(c - String(a).length + 1).join(b || "0") + a
    }
    ;
    FormatUtil.padLeftSpace = function(a, c, b) {
        return Array(c - String(a).length + 1).join(b || " ") + a
    }
}
)();
if (typeof (nv) == "undefined") {
    nv = {}
}
if (typeof (nv.ajax) == "undefined") {
    nv.ajax = {}
}
(function() {
    nv.ajax.messageHandler = function(a, b, c) {
        try {
            if (a == undefined) {
                alert("Error: response == undefined");
                return
            }
            if (a.status != undefined && a.status == "200") {
                b(a)
            }
            if (a.message != undefined) {
                if (nv.ui != undefined && nv.ui.dialog != undefined && nv.ui.dialog.showInfo != undefined && nv.ui.dialog.showError != undefined) {
                    if (a.status != undefined && a.status == "200") {
                        nv.ui.dialog.showInfo(I18N.get(a.message), c)
                    } else {
                        nv.ui.dialog.showError(I18N.get(a.message))
                    }
                } else {
                    alert(I18N.get(a.message))
                }
            }
        } catch (d) {
            throw d
        } finally {}
    }
}
)();
if (typeof (JCache) == "undefined") {
    JCache = {}
}
(function() {
    var a = {};
    JCache.get = function(c) {
        if (c == null || c.length == 0) {
            return null
        }
        var b = a[c];
        if (!b) {
            try {
                b = $j(c);
                a[c] = b
            } catch (d) {
                console.error(d)
            }
        }
        return b
    }
    ;
    JCache.clone = function(b) {
        var c = JCache.get(b);
        if (c == null) {
            return null
        }
        return c.clone()
    }
}
)();
var postAjax = function(a, b) {
    a.type = "POST";
    a.dataType = "json";
    if (a.error == undefined) {
        a.error = function(c) {
            try {
                console.error("post Ajax error!");
                console.error(a);
                console.error(c);
                console.error(c.status + " " + c.statusText);
                console.error(c.responseText);
                if (typeof c.responseText != "undefined" && c.responseText.indexOf(" html ") > -1) {
                    location.reload(true)
                }
            } finally {
                if (b != null && typeof (b.check) != "undefined") {
                    b.check();
                    TaskExecuter.execute()
                }
            }
        }
    }
    $j.ajax(a)
};
if (typeof (PubSub) == "undefined") {
    PubSub = {}
}
(function() {
    var a = {};
    PubSub.subscribe = function(b, c) {
        if (!a[b]) {
            a[b] = []
        }
        a[b].push({
            context: this,
            callback: c
        });
        return this
    }
    ;
    PubSub.publish = function(d) {
        var e = Array.prototype.slice.call(arguments, 1);
        var b = (a[d] != undefined && a[d].length > 0);
        if (!b) {
            console.warn("channel: " + d + " not yet subscribed");
            setTimeout(function() {
                console.info("wait 200 ms , call PubSub.publish(" + d + ") again");
                if (e.length > 0) {
                    console.info(e[0]);
                    PubSub.publish(d, e[0])
                } else {
                    PubSub.publish(d)
                }
            }, 200);
            return false
        }
        for (var f = 0, c = a[d].length; f < c; f++) {
            var g = a[d][f];
            g.callback.apply(g.context, e)
        }
        return this
    }
}());
if (typeof (TaskExecuter) == "undefined") {
    TaskExecuter = {}
}
(function() {
    var a = [];
    var b = null;
    TaskExecuter.execute = function() {
        if (a.length != 0) {
            b = a.pop();
            b.execute()
        } else {
            setTimeout(TaskExecuter.execute, 500)
        }
    }
    ;
    TaskExecuter.addTask = function(c) {
        a.push(c)
    }
    ;
    TaskExecuter.reExecute = function() {
        b.execute()
    }
}
)();
if (typeof (I18N) == "undefined") {
    I18N = {}
}
(function() {
    var a = undefined;
    I18N.setResource = function(b) {
        a = b
    }
    ;
    I18N.get = function(c, b) {
        c = c.toString() || "";
        var e = c;
        if (typeof a !== "undefined") {
            e = (a[c] ? a[c] : c)
        }
        if (typeof b !== "undefined" && b.length > 0) {
            var d = new RegExp("{([0-" + b.length + "])}","g");
            return String(e).replace(d, function(g, f) {
                return b[f]
            })
        } else {
            return e
        }
    }
}
)();
if (typeof (OddsUtil) == "undefined") {
    OddsUtil = {}
}
(function() {
    OddsUtil.CalcWinStake = function(b, a) {
        if (b > 0 && a > 0) {
            return MathUtil.decimal.multiply(b, a)
        } else {
            return 0
        }
    }
    ;
    OddsUtil.bounsOdds = function(a) {
        switch (a) {
        case 9:
            return 30;
        case 8:
            return 10;
        case 7:
            return 6;
        case 6:
            return 4;
        case 5:
            return 2;
        case 4:
            return 1;
        default:
            return 0
        }
    }
    ;
    OddsUtil.bankerInsurance1stOdds = function(a, b) {
        switch (b) {
        case 5:
            if (a < 5) {
                return 2
            } else {
                return 0
            }
            break;
        case 6:
            if (a < 6) {
                return 3
            } else {
                return 0
            }
            break;
        case 7:
            if (a < 6) {
                return 4
            } else {
                return 0
            }
            break;
        default:
            return 0;
            break
        }
    }
    ;
    OddsUtil.playerInsurance1stOdds = function(a, b) {
        switch (a) {
        case 5:
            if (b == 4) {
                return 2
            } else {
                return 0
            }
            break;
        case 6:
            if (b < 6) {
                return 3
            } else {
                return 0
            }
            break;
        case 7:
            if (b < 6) {
                return 4
            } else {
                return 0
            }
            break;
        default:
            return 0;
            break
        }
    }
    ;
    OddsUtil.bankerInsurance2ndOdds = function(a, b) {
        switch (a) {
        case 0:
            if (b > 0 && b < 7) {
                return 9
            } else {
                return 0
            }
            break;
        case 1:
            if (b == 1) {
                return 7
            } else {
                if (b > 1 && b < 7) {
                    return 8
                } else {
                    return 0
                }
            }
            break;
        case 2:
            if (b > 2 && b < 7) {
                return 4
            } else {
                return 0
            }
            break;
        case 3:
            if (b == 4) {
                return 2
            } else {
                return 0
            }
            break;
        default:
            return 0;
            break
        }
    }
    ;
    OddsUtil.playerInsurance2ndOdds = function(a, b) {
        switch (a) {
        case 5:
            if (b < 5) {
                return 2
            } else {
                return 0
            }
            break;
        case 6:
            if (b < 6) {
                return 3
            } else {
                return 0
            }
            break;
        case 7:
            if (b < 7) {
                return 4
            } else {
                return 0
            }
            break;
        case 8:
            if (b < 7) {
                return 8
            } else {
                return 0
            }
            break;
        case 9:
            if (b < 7) {
                return 9
            } else {
                return 0
            }
            break;
        default:
            return 0;
            break
        }
    }
}
)();
if (typeof (ScrollBarHandler) == "undefined") {
    ScrollBarHandler = {}
}
(function() {
    var a = function(d) {
        var c = $j(d).niceScroll({
            horizrailenabled: false,
            touchbehavior: false,
            cursoropacitymax: 1,
            cursorwidth: 10,
            cursorspeed: 30,
            cursorfixedheight: 85,
            cursorborder: "1px #d8d8d8 solid",
            autohidemode: false,
            background: "#E9E9E9"
        });
        c.resize = function() {
            c.onResize();
            if (c.cursor) {
                var e = $j(c.cursor);
                e.html("<span  style='height:85px;' >");
                e.hover(function() {
                    e.css("background-color", "#979797")
                }).mouseleave(function() {
                    e.css("background-color", "#5c5c5c")
                })
            }
        }
    };
    var b = function(d) {
        var c = $j(d).niceScroll({
            touchbehavior: false,
            cursoropacitymax: 1,
            cursorwidth: 2,
            cursorspeed: 30,
            cursorfixedheight: 85,
            cursorborder: "1px #d8d8d8 solid",
            background: "#E9E9E9"
        });
        c.resize = function() {
            c.onResize();
            if (c.cursor) {
                var e = $j(c.cursor);
                e.html("<span  style='height:85px;' >");
                e.hover(function() {
                    e.css("background-color", "#979797")
                }).mouseleave(function() {
                    e.css("background-color", "#5c5c5c")
                })
            }
        }
    };
    ScrollBarHandler.init = function(c) {
        a(c)
    }
    ;
    ScrollBarHandler.initByHideScrollBar = function(c) {
        b(c)
    }
}
)();
if (typeof (PageUtil) == "undefined") {
    PageUtil = {}
}
(function() {
    PageUtil.contentLock = function() {
        document.oncontextmenu = function() {
            return false
        }
        ;
        document.onselectstart = function() {
            return false
        }
    }
    ;
    PageUtil.launchIntoFullscreen = function(a) {
        if (a.requestFullscreen) {
            a.requestFullscreen()
        } else {
            if (a.mozRequestFullScreen) {
                a.mozRequestFullScreen()
            } else {
                if (a.webkitRequestFullscreen) {
                    a.webkitRequestFullscreen()
                } else {
                    if (a.msRequestFullscreen) {
                        a.msRequestFullscreen()
                    }
                }
            }
        }
    }
    ;
    PageUtil.touchmovePrevention = function(a) {
        a.preventDefault();
        return false
    }
    ;
    PageUtil.pinchZoomPrevention = function(a) {
        if (a.touches.length > 1) {
            a.preventDefault();
            return false
        }
        return
    }
    ;
    PageUtil.commonsScriptMobile = function() {
        $j("#goHome").bind("click", function() {
            parent.location.href = PageConfig.playerIndexMobilePage + "?dm=" + PageConfig.dealerDomain + "&title=" + PageConfig.title
        });
        $j("#navLink").bind("click", function() {
            if (JCache.get("#nav").css("display") == "block") {
                JCache.get("#nav").css("display", "none")
            } else {
                JCache.get("#nav").css("display", "block")
            }
        });
        $j("#transHistoryShow").bind("click", function() {
            PageUtil.allGuideAndFuntionHideMobile();
            JCache.get("#transHistory").css("display", "")
        });
        $j("#guideBacShow").bind("click", function() {
            PageUtil.allGuideAndFuntionHideMobile();
            if (PageConfig.guideBacPageReady == "0") {
                JCache.get("#guideBac").prop("src", PageConfig.guideBacPage);
                PageConfig.guideBacPageReady = "1"
            }
            JCache.get("#guideBac").css("display", "")
        });
        $j("#guideDraShow").bind("click", function() {
            PageUtil.allGuideAndFuntionHideMobile();
            if (PageConfig.guideDraPageReady == "0") {
                JCache.get("#guideDra").prop("src", PageConfig.guideDraPage);
                PageConfig.guideDraPageReady = "1"
            }
            JCache.get("#guideDra").css("display", "")
        });
        $j("#guideSicShow").bind("click", function() {
            PageUtil.allGuideAndFuntionHideMobile();
            if (PageConfig.guideSicPageReady == "0") {
                JCache.get("#guideSic").prop("src", PageConfig.guideSicPage);
                PageConfig.guideSicPageReady = "1"
            }
            JCache.get("#guideSic").css("display", "")
        });
        $j("#guideFpcShow").bind("click", function() {
            PageUtil.allGuideAndFuntionHideMobile();
            if (PageConfig.guideFpcPageReady == "0") {
                JCache.get("#guideFpc").prop("src", PageConfig.guideFpcPage);
                PageConfig.guideFpcPageReady = "1"
            }
            JCache.get("#guideFpc").css("display", "")
        });
        $j("#guideBacShow2").bind("click", function() {
            PageUtil.allGuideAndFuntionHideMobile();
            if (PageConfig.guideBacPageReady == "0") {
                JCache.get("#guideBac").prop("src", PageConfig.guideBacPage);
                PageConfig.guideBacPageReady = "1"
            }
            JCache.get("#guideBac").css("display", "")
        });
        $j("#guideDraShow2").bind("click", function() {
            PageUtil.allGuideAndFuntionHideMobile();
            if (PageConfig.guideDraPageReady == "0") {
                JCache.get("#guideDra").prop("src", PageConfig.guideDraPage);
                PageConfig.guideDraPageReady = "1"
            }
            JCache.get("#guideDra").css("display", "")
        });
        $j("#switchTable").bind("click", function() {
            JCache.get("#gameTableList").css("opacity", "1").css("z-index", "400");
            PageUtil.callGameTableListMobileIframe("resize", {})
        })
    }
    ;
    PageUtil.commonsScriptWeb = function() {
        $j("#goHome").bind("click", function() {
            location.href = PageConfig.playerIndexPage + "?dm=" + PageConfig.dealerDomain + "&title=" + PageConfig.title
        });
        $j("#sound").bind("mouseenter", function() {
            JCache.get("#soundLink").focus();
            JCache.get("#sound").addClass("now")
        }).bind("mouseleave", function() {
            JCache.get("#soundLink").blur();
            JCache.get("#sound").removeClass("now")
        });
        $j("#language").bind("mouseenter", function() {
            JCache.get("#lg").css("display", "block")
        }).bind("mouseleave", function() {
            JCache.get("#lg").css("display", "none")
        });
        $j("#menu").bind("mouseenter", function() {
            JCache.get("#navLink").focus();
            JCache.get("#nav").css("display", "block")
        }).bind("mouseleave", function() {
            JCache.get("#navLink").blur();
            JCache.get("#nav").css("display", "none")
        });
        $j("#transHistoryShow").bind("click", function() {
            PageUtil.allGuideAndFuntionHideWeb();
            JCache.get("#transHistory").css("visibility", "visible");
            PageUtil.callTxnHistoryWebIframe("openAndQuery", {})
        });
        $j("#guideBacShow").bind("click", function() {
            PageUtil.allGuideAndFuntionHideWeb();
            if (PageConfig.guideBacPageReady == "0") {
                JCache.get("#guideBac").prop("src", PageConfig.guideBacPage);
                PageConfig.guideBacPageReady = "1"
            }
            JCache.get("#guideBac").css("display", "")
        });
        $j("#guideDraShow").bind("click", function() {
            PageUtil.allGuideAndFuntionHideWeb();
            if (PageConfig.guideDraPageReady == "0") {
                JCache.get("#guideDra").prop("src", PageConfig.guideDraPage);
                PageConfig.guideDraPageReady = "1"
            }
            JCache.get("#guideDra").css("display", "")
        });
        $j("#guideSicShow").bind("click", function() {
            PageUtil.allGuideAndFuntionHideWeb();
            if (PageConfig.guideSicPageReady == "0") {
                JCache.get("#guideSic").prop("src", PageConfig.guideSicPage);
                PageConfig.guideSicPageReady = "1"
            }
            JCache.get("#guideSic").css("display", "")
        });
        $j("#guideFpcShow").bind("click", function() {
            PageUtil.allGuideAndFuntionHideWeb();
            if (PageConfig.guideFpcPageReady == "0") {
                JCache.get("#guideFpc").prop("src", PageConfig.guideFpcPage);
                PageConfig.guideFpcPageReady = "1"
            }
            JCache.get("#guideFpc").css("display", "")
        })
    }
    ;
    PageUtil.allGuideAndFuntionHideMobile = function() {
        JCache.get("#transHistory").css("display", "none");
        JCache.get("#guideBac").css("display", "none");
        JCache.get("#guideDra").css("display", "none");
        JCache.get("#guideSic").css("display", "none");
        JCache.get("#guideFpc").css("display", "none")
    }
    ;
    PageUtil.allGuideAndFuntionHideWeb = function() {
        JCache.get("#transHistory").css("visibility", "hidden");
        JCache.get("#guideBac").css("display", "none");
        JCache.get("#guideDra").css("display", "none");
        JCache.get("#guideSic").css("display", "none");
        JCache.get("#guideFpc").css("display", "none")
    }
    ;
    PageUtil.callGameTableListMobileIframe = function(d, c) {
        var b = JCache.get("#gameTableList").get(0);
        if (typeof b != "undefined") {
            var a = (b.contentWindow || b.contentDocument);
            if (a != null && (typeof a.gameTableListMobile != "undefined") && (typeof a.gameTableListMobile[d] === "function")) {
                a.gameTableListMobile[d](c);
                return a
            }
        }
        return null
    }
    ;
    PageUtil.callGameTableListWebIframe = function(d, c) {
        var b = JCache.get("#gameTableList").get(0);
        if (typeof b != "undefined") {
            var a = (b.contentWindow || b.contentDocument);
            if (a != null && (typeof a.gameTableList != "undefined") && (typeof a.gameTableList[d] === "function")) {
                a.gameTableList[d](c);
                return a
            }
        }
        return null
    }
    ;
    PageUtil.callTxnHistoryWebIframe = function(d, c) {
        var b = JCache.get("#transHistory").get(0);
        if (typeof b != "undefined") {
            var a = (b.contentWindow || b.contentDocument);
            if (a != null && (typeof a.txnHistory != "undefined") && (typeof a.txnHistory[d] === "function")) {
                a.txnHistory[d](c);
                return a
            }
        }
        return null
    }
}
)();
if (typeof (LanguageUtil) == "undefined") {
    LanguageUtil = {}
}
(function() {
    var b = function(c) {
        postAjax({
            url: "/player/update/changeLang",
            data: {
                lang: c
            },
            success: function(d) {
                if (d == null || d.status != "200") {
                    return
                }
                var h = location.href;
                if (h.indexOf("?") != -1) {
                    var g = h.split("?");
                    var f = g[0] + "?";
                    var e = g[1].split("&");
                    for (i = 0; i < e.length; i++) {
                        if (e[i].indexOf("t=") == 0) {
                            continue
                        }
                        f = f + e[i] + "&"
                    }
                    if ("&" == f.charAt(f.length - 1)) {
                        f = f.substring(0, f.length - 1)
                    }
                    location.replace(f);
                    return
                }
                location.reload()
            }
        })
    };
    var a = function(c) {
        return function() {
            b(c)
        }
    };
    LanguageUtil.init = function() {
        JCache.get("#langEN").unbind("click").bind("click", a("en"));
        JCache.get("#langCN").unbind("click").bind("click", a("cn"));
        JCache.get("#langJP").unbind("click").bind("click", a("jp"));
        JCache.get("#langTH").unbind("click").bind("click", a("th"));
        JCache.get("#langVN").unbind("click").bind("click", a("vn"));
        JCache.get("#langKR").unbind("click").bind("click", a("kr"))
    }
}
)();
if (typeof (HtmlSortUtil) == "undefined") {
    HtmlSortUtil = {}
}
(function() {
    HtmlSortUtil.initDataTableExt = function() {
        $j.fn.dataTableExt.oSort["numeric-html-asc"] = function(e, d) {
            var g = e.indexOf(")") > 0 ? true : false;
            var f = d.indexOf(")") > 0 ? true : false;
            var c = (e == "-") ? 0 : e.replace(",", "").replace("(", "").replace(")", "");
            var h = (d == "-") ? 0 : d.replace(",", "").replace("(", "").replace(")", "");
            c = parseFloat(c);
            h = parseFloat(h);
            if (g) {
                c = c * -1
            }
            if (f) {
                h = h * -1
            }
            return ((c < h) ? -1 : ((c > h) ? 1 : 0))
        }
        ;
        $j.fn.dataTableExt.oSort["numeric-html-desc"] = function(e, d) {
            var g = e.indexOf(")") > 0 ? true : false;
            var f = d.indexOf(")") > 0 ? true : false;
            var c = (e == "-") ? 0 : e.replace(",", "").replace("(", "").replace(")", "");
            var h = (d == "-") ? 0 : d.replace(",", "").replace("(", "").replace(")", "");
            c = parseFloat(c);
            h = parseFloat(h);
            if (g) {
                c = c * -1
            }
            if (f) {
                h = h * -1
            }
            return ((c < h) ? 1 : ((c > h) ? -1 : 0))
        }
    }
}
)();
if (typeof (PlayerSettingUtil) == "undefined") {
    PlayerSettingUtil = {}
}
(function() {
    PlayerSettingUtil.changeStreamingAudio = function(a) {
        PlayerSettingUtil.changePlayerSetting(AccountGameSettingType.StreamingAudioPC, a)
    }
    ;
    PlayerSettingUtil.changeStreamingAudioMobile = function(a) {
        PlayerSettingUtil.changePlayerSetting(AccountGameSettingType.StreamingAudioMobile, a)
    }
    ;
    PlayerSettingUtil.changeResultSound = function(a) {
        PlayerSettingUtil.changePlayerSetting(AccountGameSettingType.ResultSoundPC, a)
    }
    ;
    PlayerSettingUtil.changeResultSoundMobile = function(a) {
        PlayerSettingUtil.changePlayerSetting(AccountGameSettingType.ResultSoundMobile, a)
    }
    ;
    PlayerSettingUtil.changeBettingSound = function(a) {
        PlayerSettingUtil.changePlayerSetting(AccountGameSettingType.BettingSoundPC, a)
    }
    ;
    PlayerSettingUtil.changeBettingSoundMobile = function(a) {
        PlayerSettingUtil.changePlayerSetting(AccountGameSettingType.BettingSoundMobile, a)
    }
    ;
    PlayerSettingUtil.changeBackgroundMusic = function(a) {
        PlayerSettingUtil.changePlayerSetting(AccountGameSettingType.BackgroundMusicPC, a)
    }
    ;
    PlayerSettingUtil.changeBackgroundMusicMobile = function(a) {
        PlayerSettingUtil.changePlayerSetting(AccountGameSettingType.BackgroundMusicMobile, a)
    }
    ;
    PlayerSettingUtil.changeGoodRoadTip = function(a) {
        PlayerSettingUtil.changePlayerSetting(AccountGameSettingType.GoodRoadTipPC, a)
    }
    ;
    PlayerSettingUtil.changeGoodRoadTipMobile = function(a) {
        PlayerSettingUtil.changePlayerSetting(AccountGameSettingType.GoodRoadTipMobile, a)
    }
    ;
    PlayerSettingUtil.changeGoodRoadSort = function(a) {
        PlayerSettingUtil.changePlayerSetting(AccountGameSettingType.GoodRoadSortPC, a)
    }
    ;
    PlayerSettingUtil.changeGoodRoadSortMobile = function(a) {
        PlayerSettingUtil.changePlayerSetting(AccountGameSettingType.GoodRoadSortMobile, a)
    }
    ;
    PlayerSettingUtil.changeNoCommission = function(a) {
        PlayerSettingUtil.changePlayerSetting(AccountGameSettingType.NoCommissionPC, a)
    }
    ;
    PlayerSettingUtil.changeNoCommissionMobile = function(a) {
        PlayerSettingUtil.changePlayerSetting(AccountGameSettingType.NoCommissionMobile, a)
    }
    ;
    PlayerSettingUtil.changeBrowserBanner = function(a) {
        PlayerSettingUtil.changePlayerSetting(AccountGameSettingType.BrowserBanner, a)
    }
    ;
    PlayerSettingUtil.changeBrowserBannerMobile = function(a) {
        PlayerSettingUtil.changePlayerSetting(AccountGameSettingType.BrowserBannerMobile, a)
    }
    ;
    PlayerSettingUtil.changePlayerSetting = function(a, b) {
        postAjax({
            url: "update/changePlayerSetting.php",
            data: {
                type: a.value,
                update: b
            },
            success: function(c) {}
        })
    }
}
)();
if (typeof (BetLimitSettingUtil) == "undefined") {
    BetLimitSettingUtil = {}
}
(function() {
    BetLimitSettingUtil.setUserBetLimitIDCache = function(a) {
        postAjax({
            url: "/player/update/setUserBetLimitIDCache",
            data: {
                domainType: a.dealerDomain,
                tableID: a.tableID,
                betLimitID: a.betLimitID
            },
            success: function(b) {}
        })
    }
}
)();
if (typeof (PokerCardUtil) == "undefined") {
    PokerCardUtil = {}
}
(function() {
    PokerCardUtil.getDragonTigerCardPoint = function(b) {
        var a;
        switch (b) {
        case 1:
            a = "A";
            break;
        case 11:
            a = "J";
            break;
        case 12:
            a = "Q";
            break;
        case 13:
            a = "K";
            break;
        default:
            a = b;
            break
        }
        return a
    }
    ;
    PokerCardUtil.controlPokerCardOpen = function(f, j, k, e) {
        if (typeof k.tableCardStampTimes == "undefined" || k.tableCardStampTimes == null) {
            return false
        }
        if (typeof k.tableCardStampTimes[f] == "undefined" || k.tableCardStampTimes[f] == null) {
            return false
        }
        var g = k.tableCardStampTimes[f];
        if (g <= 0) {
            return false
        }
        var b = PokerCardIndexType.getInstance(f).preCardIndex;
        for (var h in b) {
            var a = g - k.tableCardStampTimes[d];
            var c = k.deliverTime - g;
            var d = b[h];
            if (d > -1) {
                if (k.tableCardStampTimes[d] > 0 && (j - g) < e) {
                    return true
                }
            } else {
                if (k.tableCardStampTimes[f] > 0 && (j - g) < e) {
                    return true
                }
            }
        }
        return false
    }
}
)();
if (typeof (ResizeUtil) == "undefined") {
    ResizeUtil = {}
}
(function() {
    ResizeUtil.doResize = function() {
        var d = JCache.get("#very-specific-design");
        var a = d.outerHeight();
        var c = d.outerWidth();
        var e = JCache.get("#scaleable-wrapper");
        e.css("height", window.innerHeight);
        e.css("width", window.innerWidth);
        e.resizable({
            resize: b
        });
        function b(h, j) {
            var k, g;
            k = Math.min(j.size.width / c, j.size.height / a);
            k = k > 1 ? 1 : k;
            d.css({
                transform: "translate(-50%, -50%) scale(" + k + ")"
            })
        }
        var f = {
            size: {
                width: e.width(),
                height: e.height()
            }
        };
        b(null, f)
    }
}
)();
if (typeof (DealerEventUtil) == "undefined") {
    DealerEventUtil = {}
}
(function() {
    DealerEventUtil.getWinnerBaccarat = function(a) {
        if (GameWinnerType.EMPTY.value == a.winner) {
            return GameWinnerType.EMPTY.value
        }
        var d = PokerCardType.getInstance(a.tableCards[PokerCardIndexType.Player1stCard.value]);
        var h = PokerCardType.getInstance(a.tableCards[PokerCardIndexType.Player2ndCard.value]);
        var e = PokerCardType.getInstance(a.tableCards[PokerCardIndexType.Player3rdCard.value]);
        var k = PokerCardType.getInstance(a.tableCards[PokerCardIndexType.Banker1stCard.value]);
        var g = PokerCardType.getInstance(a.tableCards[PokerCardIndexType.Banker2ndCard.value]);
        var c = PokerCardType.getInstance(a.tableCards[PokerCardIndexType.Banker3rdCard.value]);
        var b = d.handValue + h.handValue + e.handValue;
        b = b >= 10 ? b % 10 : b;
        var f = k.handValue + g.handValue + c.handValue;
        f = f >= 10 ? f % 10 : f;
        var j = GameWinnerType.EMPTY;
        if (f == b) {
            j = GameWinnerType.TIE
        } else {
            if (f > b) {
                j = GameWinnerType.BANKER
            } else {
                j = GameWinnerType.PLAYER
            }
        }
        return j.value
    }
    ;
    DealerEventUtil.getWinnerLongHu = function(c) {
        if (GameWinnerLongHuType.EMPTY.value == c.winner) {
            return GameWinnerLongHuType.EMPTY.value
        }
        var d = PokerCardType.getInstance(c.tableCards[PokerCardIndexType.Player1stCard.value]);
        var e = PokerCardType.getInstance(c.tableCards[PokerCardIndexType.Banker1stCard.value]);
        var a = d.cardPoint;
        var f = e.cardPoint;
        var b = GameWinnerLongHuType.EMPTY;
        if (f == a) {
            b = GameWinnerLongHuType.TIE
        } else {
            if (f > a) {
                b = GameWinnerLongHuType.TIGER
            } else {
                b = GameWinnerLongHuType.DRAGON
            }
        }
        return b.value
    }
}
)();
if (typeof (RoadHandler) == "undefined") {
    RoadHandler = {}
}
(function() {
    RoadHandler.paintMarkerRoad = function(e, a) {
        if (typeof a.currRound != "undefined" && typeof a.gameRound != "undefined") {
            if (a.currRound == a.gameRound) {
                this.style.backgroundColor = "#1C1C1C"
            }
        }
        var b = this.childNodes;
        for (var c = 0, d = a.results.length; c < d; c++) {
            var f = a.results[c];
            if ("BP" == f) {
                b[1].className = "pair_banker";
                b[1].style.display = "";
                continue
            }
            if ("PP" == f) {
                b[3].className = "pair_player";
                b[3].style.display = "";
                continue
            }
            if ("B" == f) {
                b[5].innerHTML = a.supportGame == TableSupportGameType.Baccarat.value ? I18N.get("form.text.road.word.banker") : I18N.get("form.text.road.word.tiger");
                b[5].className = "banker";
                b[5].style.display = "";
                continue
            }
            if ("P" == f) {
                b[5].innerHTML = a.supportGame == TableSupportGameType.Baccarat.value ? I18N.get("form.text.road.word.player") : I18N.get("form.text.road.word.dragon");
                b[5].className = "player";
                b[5].style.display = "";
                continue
            }
            if ("askB" == f) {
                b[5].innerHTML = a.supportGame == TableSupportGameType.Baccarat.value ? I18N.get("form.text.road.word.banker") : I18N.get("form.text.road.word.tiger");
                b[5].className = "banker ask";
                b[5].style.display = "";
                continue
            }
            if ("askP" == f) {
                b[5].innerHTML = a.supportGame == TableSupportGameType.Baccarat.value ? I18N.get("form.text.road.word.player") : I18N.get("form.text.road.word.dragon");
                b[5].className = "player ask";
                b[5].style.display = "";
                continue
            }
            if ("T" == f) {
                b[5].innerHTML = I18N.get("form.text.road.word.tie");
                b[5].className = "tie";
                b[5].style.display = "";
                continue
            }
        }
    }
    ;
    RoadHandler.paintMarkerRoadV2 = function(c, a) {
        var d = $j(c);
        var b = d.children().eq(0);
        switch (a.results) {
        case 0:
            d.addClass("road-dot dot-banker");
            b.text(parent.I18N.get("form.text.road.word.banker"));
            break;
        case 1:
            d.addClass("road-dot dot-player");
            b.text(parent.I18N.get("form.text.road.word.player"));
            break;
        case 2:
            d.addClass("road-dot dot-tie");
            b.text(parent.I18N.get("form.text.road.word.tie"));
            break;
        case 3:
            d.addClass("road-dot dot-banker pair-banker-up");
            b.text(parent.I18N.get("form.text.road.word.banker"));
            break;
        case 4:
            d.addClass("road-dot dot-banker pair-player-down");
            b.text(parent.I18N.get("form.text.road.word.banker"));
            break;
        case 5:
            d.addClass("road-dot dot-banker pair-banker-up pair-player-down");
            b.text(parent.I18N.get("form.text.road.word.banker"));
            break;
        case 6:
            d.addClass("road-dot dot-player pair-banker-up");
            b.text(parent.I18N.get("form.text.road.word.player"));
            break;
        case 7:
            d.addClass("road-dot dot-player pair-player-down");
            b.text(parent.I18N.get("form.text.road.word.player"));
            break;
        case 8:
            d.addClass("road-dot dot-player pair-banker-up pair-player-down");
            b.text(parent.I18N.get("form.text.road.word.player"));
            break;
        case 9:
            d.addClass("road-dot dot-tie pair-banker-up");
            b.text(parent.I18N.get("form.text.road.word.tie"));
            break;
        case 10:
            d.addClass("road-dot dot-tie pair-player-down");
            b.text(parent.I18N.get("form.text.road.word.tie"));
            break;
        case 11:
            d.addClass("road-dot dot-tie pair-banker-up pair-player-down");
            b.text(parent.I18N.get("form.text.road.word.tie"));
            break
        }
    }
    ;
    RoadHandler.paintMarkerRoadDTV2 = function(c, a) {
        var d = $j(c);
        var b = d.children().eq(0);
        switch (a.results) {
        case 0:
            d.addClass("road-dot dot-tiger");
            b.text(parent.I18N.get("form.text.road.word.tiger"));
            break;
        case 1:
            d.addClass("road-dot dot-dragon");
            b.text(parent.I18N.get("form.text.road.word.dragon"));
            break;
        case 2:
            d.addClass("road-dot dot-tie");
            b.text(parent.I18N.get("form.text.road.word.tie"));
            break;
        case 3:
            d.addClass("road-dot dot-tiger pair-tiger-up");
            b.text(parent.I18N.get("form.text.road.word.tiger"));
            break;
        case 4:
            d.addClass("road-dot dot-tiger pair-dragon-down");
            b.text(parent.I18N.get("form.text.road.word.tiger"));
            break;
        case 5:
            d.addClass("road-dot dot-tiger pair-tiger-up pair-dragon-down");
            b.text(parent.I18N.get("form.text.road.word.tiger"));
            break;
        case 6:
            d.addClass("road-dot dot-dragon pair-tiger-up");
            b.text(parent.I18N.get("form.text.road.word.dragon"));
            break;
        case 7:
            d.addClass("road-dot dot-dragon pair-dragon-down");
            b.text(parent.I18N.get("form.text.road.word.dragon"));
            break;
        case 8:
            d.addClass("road-dot dot-dragon pair-tiger-up pair-dragon-down");
            b.text(parent.I18N.get("form.text.road.word.dragon"));
            break;
        case 9:
            d.addClass("road-dot dot-tie pair-tiger-up");
            b.text(parent.I18N.get("form.text.road.word.tie"));
            break;
        case 10:
            d.addClass("road-dot dot-tie pair-dragon-down");
            b.text(parent.I18N.get("form.text.road.word.tie"));
            break;
        case 11:
            d.addClass("road-dot dot-tie pair-tiger-up pair-dragon-down");
            b.text(parent.I18N.get("form.text.road.word.tie"));
            break
        }
    }
    ;
    RoadHandler.paintBigSmallRoad = function(c, a) {
        var b = this.childNodes;
        if ("0" == a.results) {
            b[1].innerHTML = I18N.get("form.text.road.word.big");
            b[1].className = "banker";
            b[1].style.display = ""
        }
        if ("1" == a.results) {
            b[1].innerHTML = I18N.get("form.text.road.word.small");
            b[1].className = "player";
            b[1].style.display = ""
        }
    }
    ;
    RoadHandler.paintMainRoad = function(e, a) {
        if (typeof a.currRoundMin != "undefined" && typeof a.currRoundMax != "undefined" && typeof a.gameRound != "undefined") {
            if (a.currRoundMin <= a.gameRound && a.gameRound <= a.currRoundMax) {
                this.style.backgroundColor = "#1C1C1C"
            }
        }
        var g = false;
        if (typeof a.gameType != "undefined" && a.gameType === TableSupportGameType.SicBo.value) {
            g = true
        }
        var b = this.childNodes;
        if (a.tieCount == 1) {
            b[3].className = "tie";
            b[3].style.display = ""
        } else {
            if (a.tieCount > 1) {
                b[1].innerHTML = a.tieCount;
                b[1].style.display = "";
                b[3].className = "tie_top";
                b[3].style.display = "";
                b[5].className = "tie_down";
                b[5].style.display = ""
            }
        }
        for (var c = 0, d = a.results.length; c < d; c++) {
            var f = a.results[c];
            if ("T" == f) {
                if (g) {
                    b[3].className = "tie";
                    b[3].style.display = ""
                }
                continue
            }
            if ("BP" == f) {
                b[7].className = "pair_banker";
                b[7].style.display = "";
                continue
            }
            if ("PP" == f) {
                b[9].className = "pair_player";
                b[9].style.display = "";
                continue
            }
            if ("B" == f) {
                b[11].className = "banker";
                b[11].style.display = "";
                continue
            }
            if ("P" == f) {
                b[11].className = "player";
                b[11].style.display = "";
                continue
            }
            if ("askB" == f) {
                b[11].className = "banker ask";
                b[11].style.display = "";
                continue
            }
            if ("askP" == f) {
                b[11].className = "player ask";
                b[11].style.display = "";
                continue
            }
        }
    }
    ;
    RoadHandler.paintMainRoadV2 = function(c, a) {
        var d = $j(c);
        var b = "road-dot";
        if (a.tieCount == 1) {
            b += " line-tie"
        } else {
            if (a.tieCount > 1) {
                b += " line-tie-up line-tie-down";
                d.children().eq(0).children().eq(0).text(a.tieCount)
            }
        }
        switch (a.results) {
        case 0:
        case 4:
            b += " dot-banker";
            break;
        case 1:
        case 5:
            b += " dot-banker pair-banker-up";
            break;
        case 2:
        case 6:
            b += " dot-banker pair-player-down";
            break;
        case 3:
        case 7:
            b += " dot-banker pair-banker-up pair-player-down";
            break;
        case 8:
        case 12:
            b += " dot-player";
            break;
        case 9:
        case 13:
            b += " dot-player pair-banker-up";
            break;
        case 10:
        case 14:
            b += " dot-player pair-player-down";
            break;
        case 11:
        case 15:
            b += " dot-player pair-banker-up pair-player-down";
            break;
        case 16:
            break;
        default:
            break
        }
        d.children().eq(0).removeClass().addClass(b)
    }
    ;
    RoadHandler.paintMainRoadDTV2 = function(c, a) {
        var d = $j(c);
        var b = "road-dot";
        if (a.tieCount == 1) {
            b += " line-tie"
        } else {
            if (a.tieCount > 1) {
                b += " line-tie-up line-tie-down";
                d.children().eq(0).children().eq(0).text(a.tieCount)
            }
        }
        switch (a.results) {
        case 0:
        case 4:
            b += " dot-tiger";
            break;
        case 1:
        case 5:
            b += " dot-tiger pair-tiger-up";
            break;
        case 2:
        case 6:
            b += " dot-tiger pair-dragon-down";
            break;
        case 3:
        case 7:
            b += " dot-tiger pair-tiger-up pair-dragon-down";
            break;
        case 8:
        case 12:
            b += " dot-dragon";
            break;
        case 9:
        case 13:
            b += " dot-dragon pair-tiger-up";
            break;
        case 10:
        case 14:
            b += " dot-dragon pair-dragon-down";
            break;
        case 11:
        case 15:
            b += " dot-dragon pair-tiger-up pair-dragon-down";
            break;
        case 16:
            break;
        default:
            break
        }
        d.children().eq(0).removeClass().addClass(b)
    }
    ;
    RoadHandler.paintDownRoad = function(c, a) {
        var b = this.childNodes;
        b[1].className = a.results;
        b[1].style.display = ""
    }
    ;
    RoadHandler.paintDownRoadV2 = function(b, a) {
        $j(b).addClass("road-dot dot-" + a.results)
    }
    ;
    RoadHandler.paintDownRoadDTV2 = function(b, a) {
        if (a.results == "banker") {
            $j(b).addClass("road-dot dot-tiger")
        } else {
            $j(b).addClass("road-dot dot-dragon")
        }
    }
    ;
    RoadHandler.paintGoodRoadAdd = function(b, a) {
        if (a.type == "B") {
            this.className = "good_banker"
        }
        if (a.type == "P") {
            this.className = "good_player"
        }
    }
    ;
    RoadHandler.paintGoodRoadDel = function(b, a) {
        if (a.type == "B") {
            this.className = ""
        }
        if (a.type == "P") {
            this.className = ""
        }
    }
    ;
    RoadHandler.paintSicboSumRoad = function(b, a) {
        if (typeof a.currRound != "undefined" && typeof a.gameRound != "undefined") {
            if (a.currRound == a.gameRound) {
                this.style.backgroundColor = "#1C1C1C"
            }
        }
        this.className = "";
        if (typeof a.results != "undefined") {
            this.className = "textBlue-S";
            this.innerHTML = a.results
        }
    }
    ;
    RoadHandler.paintSicboDiceRoad = function(b, a) {
        if (typeof a.currRound != "undefined" && typeof a.gameRound != "undefined") {
            if (a.currRound == a.gameRound) {
                this.style.backgroundColor = "#1C1C1C"
            }
        }
        this.className = "";
        if (typeof a.results != "undefined") {
            this.className = "textBlue-XS";
            this.innerHTML = a.results
        }
    }
    ;
    RoadHandler.paintSicboBigSmallRoad = function(b, a) {
        var c = a.results[0];
        if ("B" == c) {
            this.className = "textBoldRed";
            this.innerHTML = I18N.get("form.text.road.word.big")
        } else {
            if ("P" == c) {
                this.className = "textBoldBlue";
                this.innerHTML = I18N.get("form.text.road.word.small")
            } else {
                if ("T" == c) {
                    this.className = "textBoldGreen";
                    this.innerHTML = I18N.get("form.text.road.word.triple")
                } else {
                    this.className = "";
                    this.innerHTML = ""
                }
            }
        }
    }
    ;
    RoadHandler.paintSicboOddEvenRoad = function(b, a) {
        var c = a.results[0];
        if ("B" == c) {
            this.className = "textBoldBlue";
            this.innerHTML = I18N.get("form.text.road.word.odd")
        } else {
            if ("P" == c) {
                this.className = "textBoldRed";
                this.innerHTML = I18N.get("form.text.road.word.even")
            } else {
                if ("T" == c) {
                    this.className = "textBoldGreen";
                    this.innerHTML = I18N.get("form.text.road.word.triple")
                } else {
                    this.className = "";
                    this.innerHTML = ""
                }
            }
        }
    }
    ;
    RoadHandler.paintRouRedBlacklRoad = function(b, a) {
        var d = RouCategoryType.getInstance(a.winBall);
        var c = a.results[0];
        if ("B" == c) {
            this.className = "textBoldRed";
            this.innerHTML = a.winBall
        } else {
            if ("P" == c) {
                this.className = "textBoldBlue";
                this.innerHTML = a.winBall
            } else {
                if ("T" == c) {
                    this.className = "textBoldGreen";
                    this.innerHTML = a.winBall
                } else {
                    this.className = "";
                    this.innerHTML = ""
                }
            }
        }
    }
}
)();
if (typeof (TableSupportGameTypeUtil) == "undefined") {
    TableSupportGameTypeUtil = {}
}
(function() {
    TableSupportGameTypeUtil.supportGameType = function(c, a) {
        var b = false;
        switch (c) {
        case 0:
            if (GameType.Baccarat.value === a) {
                b = true
            }
            break;
        case 1:
            if (GameType.DragonTiger.value === a) {
                b = true
            }
            break;
        case 2:
            if (GameType.Baccarat.value === a || GameType.DragonTiger.value === a) {
                b = true
            }
            break;
        case 3:
            if (GameType.Sicbo.value === a) {
                b = true
            }
            break;
        case 4:
            if (GameType.FishPrawnCrab.value === a) {
                b = true
            }
            break;
        case 5:
            if (GameType.Roulette.value === a) {
                b = true
            }
            break;
        default:
            b = false;
            break
        }
        return b
    }
}
)();
