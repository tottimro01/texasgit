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
    var a = "#fomConfirmBet#,#fomConfirmBetPhone#,#betform#,#fomBingoConfirmBet#";
    a.indexOf("#" + e.name + "#") > -1 && (t = !1),
    ajaxDataObj.AbortRequest(e.name);
    var n = new Object
      , o = new Object;
    for (s = 0; s < e.elements.length; s++)
        switch (e.elements[s].type) {
        case "text":
        case "hidden":
        case "select-one":
            n[e.elements[s].name] = e.elements[s].value;
            break;
        case "checkbox":
            e.elements[s].checked && (o[e.elements[s].name] = void 0 == o[e.elements[s].name] ? e.elements[s].value : o[e.elements[s].name] + "," + e.elements[s].value)
        }
    for (var s = 0; s < Object.keys(o).length; s++) {
        var c = o[Object.keys(o)[s]].split(",");
        n[Object.keys(o)[s]] = $("[name='" + Object.keys(o)[s] + "']").length > 1 ? c : c[0]
    }
    var r = new Object;
    r.url = e.action,
    r.data = n,
    r.contentType = "application/x-www-form-urlencoded",
    r.dataType = "text",
    r.type = "" == e.method ? "GET" : e.method.toUpperCase(),
    r.ifModified = !0,
    r.cache = !1,
    r.async = t,
    r.timeout = 2e4,
    r.beforeSend = null,
    r.error = null,
    r.complete = function(t, a) {
        HTTPStatusOK(t.status) && "success" == a && DataArrived(t, e.target)
    }
    ,
    ajaxDataObj.GetDataCustomize(e.name, r)
}
function HTTPStatusOK(e) {
    return 304 === e || e >= 200 && 207 >= e
}
function DataArrived(e, t) {
    var a = document.getElementById(t);
    null == a && (a = document.getElementsByName(t)[0]),
    "iframe" == a.tagName.toLowerCase() ? putIFrameDocument(a, e.responseText) : a.innerHTML = e.responseText
}
function putIFrameDocument(e, t) {
    if (isIe) {
        var a = e.contentWindow;
        a.document.designMode = "on",
        a.document.open(),
        a.document.write(t),
        a.document.designMode = "off",
        a.document.close()
    } else {
        var a = e.contentWindow;
        a.document.open(),
        a.document.clear(),
        a.document.write(t),
        a.document.close()
    }
}
var ajaxDataObj = null;
try {
    ajaxDataObj = new getDataClass
} catch (e) {
    ajaxDataObj = null
}
var ThreadId = null
  , ThreadList = new Object
  , isIe = window.ActiveXObject ? !0 : !1;
Object.keys || (Object.keys = function(e) {
    if (e !== Object(e))
        throw new TypeError("Object.keys called on a non-object");
    var t, a = [];
    for (t in e)
        Object.prototype.hasOwnProperty.call(e, t) && a.push(t);
    return a
}
);
