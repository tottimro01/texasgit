function getParent(e) {
  for (var d = e, a = 0; a < 4; a++) {
    if (null != d.SiteMode) return d;
    d = d.parent;
  }
  return null;
}
function updateDate(e) {
  (day_of_week = e), getDateData(), setDateAll();
}
function getParent(e) {
  for (var d = e, a = 0; a < 4; a++) {
    if (null != d.SiteMode) return d;
    d = d.parent;
  }
  return null;
}
function SwitchMore(e, d, a) {
  var _ = "";
  a.className.indexOf("off") > -1
    ? ((_ = "displayOff"), (a.className = "en_Point"))
    : ((_ = "displayOn"), (a.className = "en_Point off"));
  $(a)
    .parent()
    .parent("td")
    .parent("tr")
    .next("tr")
    .find("td.moreBetType")
    .attr("class", "moreBetType " + _),
    (DisplayMoreObj[e] = _);
}
function SwitchEsortsMore(e, d, a) {
  var _ = "";
  a.className.indexOf("off") > -1
    ? ((_ = "displayOff"),
      (a.className = "en_Point"),
      (EsportCategoryList[e] = MatchCategoryList[e][0]))
    : ((_ = "display"), (a.className = "en_Point off"));
  $(a)
    .parent()
    .parent("td")
    .parent("tr")
    .next("tr")
    .find("td.moreBetType.tag")
    .attr("class", "moreBetType tag " + _),
    (EsportsDisplayMoreObj[e] = _),
    FinalpaintOddsTable();
}
function ShowBetList(e, d, a, _, t, s, r, l, n, o, O) {
  var i = null;
  if (null != a) {
    var c = "";
    if (
      (a.length > 1 &&
        ((c = a.substr(a.length - 1, 1)), (a = a.substr(0, a.length - 1))),
      "l" == c
        ? (null == g_OddsKeeper_L &&
            ((g_OddsKeeper_L = new SportMixParlayClass()).UpdateFinish = ShowSportCheckBox),
          (i = g_OddsKeeper_L))
        : (null == g_OddsKeeper_D &&
            ((g_OddsKeeper_D = new SportMixParlayClass()).UpdateFinish = ShowSportCheckBox),
          (i = g_OddsKeeper_D)),
      "U" == e)
    ) {
      if ((i.Update(d, a, c, _, t, s, r, l, n, o, O), null != sKeeper)) {
        for (var p = !1, u = !1, D = 0; D < _.length; D++)
          sKeeper.MUID == _[D] && (PopLauncher.close(), (p = !0));
        for (D = 0; D < s.length; D++)
          sKeeper.MUID == s[D][0] && (PopLauncher.open(100, 120), (u = !0));
        p && !u && (ThreadId = null);
      }
    } else {i.initData(e, d, a, c, _); };
    null != document.getElementById("DateContainer") &&
      ("E" == fFrame.LastSelectedMArket.toUpperCase()
        ? (document.getElementById("DateContainer").style.display = "block")
        : (document.getElementById("DateContainer").style.display = "none"));
  }
}
function ShowSportCheckBox(e) {
  if (
    ("l" == e ? (synFlag_L = !0) : (synFlag_D = !0),
    "e" == e && (synFlag_L = !0),
    synFlag_D && synFlag_L)
  ) {
    var d = !!(
        "l" != e ||
        (null != g_OddsKeeper_D && g_OddsKeeper_D.IsReady())
      ),
      a = !(
        !("l" == e || (null != g_OddsKeeper_L && g_OddsKeeper_L.IsReady())) ||
        "E" == fFrame.LastSelectedMArket
      ),
      _ = new Array();
    (document.getElementById("BetList").style.display = "none"),
      (_[0] = 0),
      d && (_ = SumSportCount(_, g_OddsKeeper_D.arr_SportsCount)),
      a && (_ = SumSportCount(_, g_OddsKeeper_L.arr_SportsCount)),
      cleartb();
    var t = 0;
    for (var s in arr_ShowMixParlay)
      32 != s && (t = paintsTable(s, _, t)),
        2 == s && (t = paintsTable(32, _, t));

       $('#Span44').insertAfter('#Span0');
    setSportsAll(),
      _[0] > 0
        ? ((document.getElementById("TrNoInfo").style.display = "none"),
          (document.getElementById("menu").style.display = "block"),
          ShowMarketContent(e),
          null != nextShowMarket &&
            (ShowMarketContent(nextShowMarket), (nextShowMarket = null)))
        : ((document.getElementById("TrNoInfo").style.display = "block"),
          (document.getElementById("menu").style.display = "none")),
      checkOpenSport();
  } else nextShowMarket = e;
}
function ShowMarketContent(e) {
  var d = "_D",
    a = "",
    _ = g_OddsKeeper_D;
  "l" == e && ((d = "_L"), (a = "_L"), (_ = g_OddsKeeper_L));
  var t = "none";
  _.ShowHideSportContainer(),
    _.arr_SportsCount[0] > 0 && (t = "block"),
    "E" == fFrame.LastSelectedMArket.toUpperCase() && "l" == e && (t = "none"),
    (document.getElementById("btnRefresh" + d).style.display = t),
    (document.getElementById("OddsTr" + a).style.display = t);
}
function SumSportCount(e, d) {
  d[0] = 0;
  for (var a in arr_ShowMixParlay)
    void 0 != d[a] && arr_ShowMixParlay[a]==!0 &&
      (void 0 == e[a] && (e[a] = 0),
      (e[a] += d[a]),
      (d[0] += d[a]),
      (e[0] += d[a]));
  return e;
}
function paintsTable(e, d, a) {
  if (void 0 == d[e] || 0 == d[e] || !arr_ShowMixParlay[e]) return a;
  if (void 0 != document.getElementById("Span" + e)) return a;
  var _,
    t = $("#SportsContainer");
  (null != t.html() && "" != t.html()) ||
    ((_ = $("<li id='Span0'></li>")),
    $(
      '<input name="chkSpotrsParlay_All" id="chkSpotrsParlay_All" onclick="JavaScript:SportLinkClickAll(false);" type="checkbox" value="0">'
    ).appendTo(_),
    $(
      '<a href="JavaScript:SportLinkClickAll(true);">' +
        fFrame.RES_SPORTS[0] +
        " (" +
        d[0] +
        ")</a>"
    ).appendTo(_),
    _.appendTo(t),
    a++),
    (_ = $("<li id='Span" + e + "'></li>"));
  // if (fFrame.LastSelectedSport == e || fFrame.LastSelectedSport == 0) {
  //   arr_ShowMixParlay_map[e] = !0;
  // } else {
  //   arr_ShowMixParlay_map[e] = !1;
  // }
  var s = $(
    '<input name="chkSportsParlay" id="chkSportsParlay_' +
      e +
      '" onclick="JavaScript:SportLinkClick(' +
      e +
      ',true);" type="checkbox" value="' +
      e +
      '">'
  );
  return (
    s.appendTo(_),
    $(
      '<a href="JavaScript:SportLinkClick(' +
        e +
        ',false);" class="sportParley sportId_' +
        e +
        '">' +
        fFrame.RES_SPORTS[e] +
        " (" +
        d[e] +
        ")</a>"
    ).appendTo(_),
    (void 0 == arr_ShowMixParlay_map[e] || arr_ShowMixParlay_map[e]) &&
      (s.attr("checked", !0), (arr_ShowMixParlay_map[e] = !0)),
    _.appendTo(t),
    ++a
  );
}
function cleartb() {
  (document.getElementById("SportsContainer").innerHTML = ""),
    (mydiv = ""),
    (mytb = ""),
    (myrow = "");
}
function betParlay(e, d, a, _, t) {
  parent.leftx.AddParlay(e, d, a, _, document.DataForm_D.Sport.value, t);
}
function afterNewLeague(e, d, a) {
  var _ = e[d],
    t = new Array();
  return (
    (t.FavLeagues = ""),
    (t["ShowTime-iocn"] =
      "<span class='icon-sport43-" + _.OverTimeSession + "'></span>"),
    (t.Refresh = RES_REFRESH),
    _replaceTags(t, _formatTemplate(a, "{@", "}"))
  );
}
function refreshAll() {
  "e" != PAGE_MARKET && refreshData_L(), refreshData_D();
}
function getMoreLabel(e) {
  return 0 == e ? "" : e;
}
function popMore(e, d, a, _, t, s, r) {
  (document.getElementById("oPopContainer").innerHTML = ""),
    (document.MoreForm.MatchId.value = d),
    (document.MoreForm.HomeName.value = _),
    (document.MoreForm.AwayName.value = t),
    "l" == r && (document.MoreForm.Market.value = r),
    document.MoreForm.submit();
  document.getElementById("PopTitleText").innerHTML = _ + " -vs- " + t;
  var l = document.getElementById("PopDiv");
  if (((l.style.width = e + 100 + "px"), null == PopLauncher)) {
    var n = document.getElementById("PopTitle"),
      o = document.getElementById("PopCloser");
    PopLauncher = new DivLauncher(l, n, o);
  }
  PopLauncher.open(100, 100);
}
function getDrawHtml(e) {
  return e ? '<div class="HdpGoalClass">' + RES_DRAW + "</div>" : "";
}
function setSportsAll() {
  for (
    var e = !0, d = document.getElementsByName("chkSportsParlay"), a = 0;
    a < d.length;
    a++
  )
    if (!d[a].checked) {
      e = !1;
      break;
    }
  void 0 != document.getElementById("chkSpotrsParlay_All") &&
    ((document.getElementById("chkSpotrsParlay_All").checked = e),
    (arr_ShowMixParlay_map[0] = e));
}
function SportLinkClickAll(e) {
  var d = document.getElementById("chkSpotrsParlay_All");
  e && (d.checked = !d.checked), (arr_ShowMixParlay_map[0] = d.checked);
  for (
    var a = document.getElementsByName("chkSportsParlay"), _ = 0;
    _ < a.length;
    _++
  ) {
    var t = a[_];
    (t.checked = d.checked),
      (arr_ShowMixParlay_map[_ + 1] = d.checked),
      null != g_OddsKeeper_D &&
        showSportParlay(t.value, d.checked, "oTableContainer_" + t.value),
      null != g_OddsKeeper_L &&
        showSportParlay(
          t.value,
          d.checked,
          "oTableContainer_" + t.value + "_L"
        );
  }
  checkOpenSport();
}
function checkOpenSport() {
  var e = !0,
    d = !0;
  null != g_OddsKeeper_D &&
    (d = checkMatch(g_OddsKeeper_D.getOddsKeeperArray())),
    (document.getElementById("btnRefresh_D").style.display = d ? "none" : ""),
    "E" == fFrame.LastSelectedMArket.toUpperCase()
      ? (document.getElementById("btnRefresh_L").style.display = "none")
      : (null != g_OddsKeeper_L &&
          (e = checkMatch(g_OddsKeeper_L.getOddsKeeperArray())),
        (document.getElementById("btnRefresh_L").style.display = e
          ? "none"
          : ""));
  var a = e & d;
  (document.getElementById("TrFilterInfo").style.display = a
    ? "block"
    : "none"),
    a && (document.getElementById("TrNoInfo").style.display = "none");
}
function checkMatch(e) {
  var d = !0;
  for (var a in arr_ShowMixParlay)
    if (void 0 != e[a]) {
      var _ = e[a].TableContainer;
      if (void 0 != _.childNodes[0]) {
        var t = 0;
        if (
          (_.childNodes[0].tBodies.length > 0 &&
            (t = _.childNodes[0].tBodies.length - 1),
          _.childNodes[0].tBodies[t].rows.length > 0 &&
            arr_ShowMixParlay[a] &&
            arr_ShowMixParlay_map[a])
        ) {
          (_.style.display = "block"), (d = !1);
          break;
        }
        _.style.display = "none";
      } else _.style.display = "none";
    }
  return d;
}
function refreshOddsPage(e, d, a) {
  if (null == parent.mainFrame.document) return !0;
  if (null == parent.mainFrame.document.body) return !0;
  var _ = parent.mainFrame.document.DataForm;
  if ((null == _ && (_ = parent.mainFrame.document.DataForm_D), null == _))
    return !1;
  var t = _.Sport.value;
  if (null == t) return !1;
  if (t != d) return !1;
  var s = _.Market.value;
  if ("L" != e && "F" != e && "0" != d) {
    if (null == s) return !1;
    if (s.toLowerCase() != e.toLowerCase()) return !1;
  }
  if ("1" == d) {
    if ("F" == e && "Favorite" != parent.mainFrame.document.body.id) return !1;
    if ("E" == e || "T" == e) {
      if ("UnderOver" != parent.mainFrame.document.body.id) return !1;
      parent.mainFrame.document.getElementById("disstyle").value != a &&
        "new" != a &&
        (parent.mainFrame.initialDisstyle(a),
        parent.mainFrame.changeDisplayMode(a, fFrame.DomainName));
    }
  } else if ("0" == d)
    if ("L" == e) {
      if ("Live" != parent.mainFrame.document.body.id) return !1;
    } else if ("OT" == e && "Outright" != parent.mainFrame.document.body.id)
      return !1;
  return "DataForm" == _.name
    ? (parent.mainFrame.refreshData(), !0)
    : "DataForm_D" == _.name && (parent.mainFrame.refreshAll(), !0);
}
function SportLinkClick(e, d) {
  "undefined" != typeof myScroll &&
    null != parent.mainFrame.PopLauncher &&
    parent.mainFrame.PopLauncher.close(),
    (document.getElementById("chkSpotrsParlay_All").checked = !1);
  var a = document.getElementById("chkSportsParlay_" + e);
  d || (a.checked = !a.checked), setSportsAll();
  null != g_OddsKeeper_D &&
    showSportParlay(e, a.checked, "oTableContainer_" + e),
    null != g_OddsKeeper_L &&
      showSportParlay(e, a.checked, "oTableContainer_" + e + "_L"),
    checkOpenSport();
}
function showSportParlay(e, d, a) {
  var _ = document.getElementById(a);
  return null == _
    ? "none"
    : ((arr_ShowMixParlay_map[e] = d),
      d
        ? _.childNodes[0].tBodies[0].rows.length > 0 && (_.style.display = "")
        : (_.style.display = "none"),
      _.style.display);
}
function getDateData() {
  document.getElementById("DateContainer").innerHTML = "";
  var e = document.getElementById("DateContainer");
  e = createCol(e, 0);
  var d = 1;
  if (
    ("E" == fFrame.LastSelectedMArket.toUpperCase() && (d = 2),
    7 != day_of_week)
  )
    for (var a = 7; a > day_of_week; a--) (e = createCol(e, d)), d++;
  else d < RES_DAY.length && (e = createCol(e, d));
}
function setDateAll() {
  for (
    var e = !0, d = document.getElementsByName("chkDate"), a = 0;
    a < d.length;
    a++
  )
    if (!d[a].checked) {
      e = !1;
      break;
    }
  void 0 != document.getElementById("chkDate_All") &&
    ((document.getElementById("chkDate_All").checked = e),
    (arr_ShowMixParlay_map[0] = e));
}
function createCol(e, d) {
  var a = document.createElement("li");
  e.appendChild(a), (a.id = "DateSpan" + d);
  var _ = "";
  (_ =
    0 == d
      ? $(
          "<input name='chkDate_All' id='chkDate_All' type='checkbox' class='noborder'>"
        )[0]
      : $(
          "<input name='chkDate' id='chkDate_" +
            d +
            "' type='checkbox' class='noborder'>"
        )[0]).setAttribute(
    "onClick",
    "JavaScript:DateLinkClick(" + d + ",true);"
  ),
    (_.hidefocus = ""),
    (_.value = RES_DAY[d].substr(0, 2)),
    a.appendChild(_);
  var t = document.createElement("a");
  a.appendChild(t), (t.href = "JavaScript:DateLinkClick(" + d + ",false);");
  var s = document.createTextNode(RES_DAY[d]);
  return (
    void 0 == arr_Date_map[d]
      ? IsMember
        ? (_.setAttribute("checked", !0), (arr_Date_map[d] = !0))
        : "t" == PAGE_MARKET || "l" == PAGE_MARKET
        ? 1 == d
          ? (_.setAttribute("checked", !0), (arr_Date_map[d] = !0))
          : (arr_Date_map[d] = !1)
        : d > 1
        ? (_.setAttribute("checked", !0), (arr_Date_map[d] = !0))
        : (arr_Date_map[d] = !1)
      : arr_Date_map[d] && _.setAttribute("checked", !0),
    t.appendChild(s),
    e
  );
}
function DateLinkClick(e, d) {
  if (0 == e) {
    var a = document.getElementById("chkDate_All");
    d || (a.checked = !a.checked), (arr_Date_map[0] = a.checked);
    for (var _ = 2; _ < arr_Date_map.length; _++) {
      (document.getElementById("chkDate_" + _).checked = a.checked),
        (arr_Date_map[_] = a.checked);
    }
  } else {
    (document.getElementById("chkDate_All").checked = !1),
      (arr_Date_map[0] = !1);
    var t = document.getElementById("chkDate_" + e);
    d || (t.checked = !t.checked), setDateAll(), (arr_Date_map[e] = t.checked);
  }
  btnstop();
  var s = new Array(),
    r = new Array();
  null != g_OddsKeeper_L && (s = g_OddsKeeper_L.getOddsKeeperArray()),
    null != g_OddsKeeper_D && (r = g_OddsKeeper_D.getOddsKeeperArray());
  for (var l in arr_ShowMixParlay) {
    if (arr_ShowMixParlay[l] && null != s[l]) {
      s[l].paintOddsTable();
    }
    if (arr_ShowMixParlay[l] && null != r[l]) {
      r[l].paintOddsTable();
    }
  }
  (btnStartHandle = setTimeout("btnstart()", 3e3)), checkOpenSport();
}
function ltrim(e) {
  return e.replace(/^\s*/, "");
}
function rtrim(e) {
  return e.replace(/\s*$/, "");
}
function trim(e) {
  return rtrim(ltrim(e));
}
function isFilterDate(e) {
  if (arr_Date_map[0]) return !0;
  for (var d in arr_Date_map)
    if (arr_Date_map[d]) {
      var a = document.getElementById("chkDate_" + d);
      if (
        parseInt(trim(a.value), 10) ==
        parseInt(trim(e.KickoffTime.substr(6, 2)), 10)
      )
        return !0;
    }
  return !1;
}
function returnSport() {
  if ("l" == PAGE_MARKET.toLowerCase())
    return (
      fFrame.leftx.LiveSportsClickAll(!1),
      void fFrame.leftx.ReloadWaitingBetList("yes", "no", "1")
    );
  var e = 1;
  for (var d in arr_ShowMixParlay)
    if (
      1 == arr_ShowMixParlay_map[d] &&
      void 0 != document.getElementById("chkSportsParlay_" + d)
    ) {
      e = d;
      break;
    }
  "e" == PAGE_MARKET.toLowerCase()
    ? (fFrame.leftx.SwitchMarket("E"),
      fFrame.leftx.SwitchSport("E", parseInt(e, 10)))
    : (fFrame.leftx.SwitchMarket("T"),
      fFrame.leftx.SwitchSport("T", parseInt(e, 10))),
    fFrame.leftx.ReloadWaitingBetList("yes", "no", "1");
}
function SportMixParlayClass() {
  function e(e, d, a, _) {
    for (var t = 0; t < e.length; t++) {
      for (var s = e[t][0], r = a[s]; r < d.length && d[r].MUID == s; )
        (d[r].MoreCount = e[t][1]), r++;
      _[s] = "updateAppend";
    }
  }
  function d(e, d, a, _) {
    for (var t = 0; t < e.length; t++) {
      for (var s = e[t][0], r = a[s]; r < d.length && d[r].MUID == s; )
        (d[r].RedCardH = e[t][1]),
          (d[r].RedCardA = e[t][2]),
          (d[r].MoreCount = e[t][3]),
          (d[r].Combo = e[t][4]),
          (d[r].GameStatus = e[t][5]),
          r++;
      _[s] = "updateAppend";
    }
  }
  function a(e, d) {
    for (var a, _ = 0; _ < e.length; _++) if ((a = e[_]).OddsId == d) return a;
    return null;
  }
  function _(e, d) {
    if ("" != d.OddsId) {
      for (var a = !1, _ = 0; _ < e.length; _++)
        e[_].OddsId == d.OddsId && ((a = !0), (e[_] = d));
      a || (e[e.length] = d);
    }
  }
  function t(e, d, t, s) {
    var r = fFrame.document
        .getElementById("ESports_tmpl")
        .contentWindow.document.getElementById("tmplExtend").innerHTML,
      l = fFrame.document
        .getElementById("ESports_tmpl")
        .contentWindow.document.getElementById("tmplExtendHead").innerHTML,
      n = fFrame.document
        .getElementById("ESports_tmpl")
        .contentWindow.document.getElementById("tmplExtendBettype").innerHTML,
      o = this.SportType,
      c = e[d];
    if (!isFilterCombo(c.Combo)) return "";
    if (!isFilterDate(c)) return "";
    var p = new Array();
    M != c.MatchId && (f++, (M = c.MatchId)),
      (trClass = f % 2 == 0 ? O : i),
      (p.BgColor = s ? GetLiveBGColor(f % 2) : GetEventBGColor(f % 2)),
      (p.Tr_Cls = trClass),
      (p.MoreTr_Cls = trClass),
      (p.HomeName = c.HomeName.replace('<span class="nameResult">', "").replace(
        "</span>",
        ""
      )),
      (p.AwayName = c.AwayName.replace('<span class="nameResult">', "").replace(
        "</span>",
        ""
      )),
      (p.HomeName_t = c.HomeName.replace(
        '<span class="nameResult">',
        ""
      ).replace("</span>", "")),
      (p.AwayName_t = c.AwayName.replace(
        '<span class="nameResult">',
        ""
      ).replace("</span>", "")),
      (p.Odds_1_H_Cls = getOddsClass(c.Odds_1_H)),
      (p.Odds_1_A_Cls = getOddsClass(c.Odds_1_A)),
      (p.Odds_3_O_Cls = getOddsClass(c.Odds_3_O)),
      (p.Odds_3_U_Cls = getOddsClass(c.Odds_3_U)),
      (p.Odds_2_O_Cls = getOddsClass(c.Odds_2_O)),
      (p.Odds_2_E_Cls = getOddsClass(c.Odds_2_E)),
      (p.Odds_20_H_Cls = getOddsClass(c.Odds_20_H)),
      (p.Odds_20_A_Cls = getOddsClass(c.Odds_20_A));
    var u = [];
    s
      ? void 0 !== OddsData43L && (u = OddsData43L)
      : void 0 !== OddsData43 && (u = OddsData43);
    var D = !1;
    (p.Display_ExtendML = CLS_LS_OFF), (p.MatchId = c.MatchId);
    var m = null,
      h = !1,
      S = "True" == c.IsStartingSoon;
    if (u.length > 0)
      for (var C = "", y = [], g = [], L = 0, I = 0; I < u.length; I++)
        if (u[I][0] == c.MatchId) {
          "True" == u[I][49] && (h = !0),
            "True" == u[I][3] && (S = !0),
            (D = !0),
            (L = parseInt(u[I][1]));
          var E = 0;
          s && (E = parseInt(u[I][2]) - 1 <= 0 ? 0 : parseInt(u[I][2]) - 1);
          var w = L - E;
          if (
            ((p.tableLength = w > 1 ? "100%" : "50%"), (p.MapCount = w), w > 0)
          ) {
            for (var v = 0; v < w; v++) {
              p.thCss = 0 == v || v % 2 == 0 ? "" : "even";
              var b = "",
                A = parseInt(c.LivePeriod, 10);
              A <= 0 && (A = 1),
                (b = (b = (b = l.replace(
                  new RegExp("{@HeadCss}", "g"),
                  "{@HeadCss" + (v + A) + "}"
                )).replace(new RegExp("{@thCss}", "g"), p.thCss)).replace(
                  new RegExp("{@MapName}", "g"),
                  getMapName(v + A)
                )),
                y.push(b);
              var H = "";
              (H = (H = (H = (H = (H = (H = n.replace(
                new RegExp("{@OddsChanged}", "g"),
                "{@Changed_D_90010" + (v + A) + "}"
              )).replace(
                new RegExp("{@Odds_9001_H_Cls}", "g"),
                "{@Odds_D_90010" + (v + A) + "_H_Cls}"
              )).replace(
                new RegExp("{@Odds_9001_A_Cls}", "g"),
                "{@Odds_D_90010" + (v + A) + "_A_Cls}"
              )).replace(
                new RegExp("{@OddsId_9001}", "g"),
                "{@OddsId_D_90010" + (v + A) + "}"
              )).replace(
                new RegExp("{@Odds_9001_H}", "g"),
                "{@Odds_D_90010" + (v + A) + "_H}"
              )).replace(
                new RegExp("{@Odds_9001_A}", "g"),
                "{@Odds_D_90010" + (v + A) + "_A}"
              )),
                g.push(H);
            }
            p.MatchId = u[I][0];
            for (
              var P = (u[I].length - ExMatchFieldLenth) / ExOddsFieldLength,
                T = 0;
              T < P;
              T++
            ) {
              var x = T + 1,
                F = getOddslocation(x);
              (p["OddsId_D_90010" + x] = u[I][F[0]]),
                (p["Odds_D_90010" + x + "_H"] = u[I][F[1]]),
                (p["Odds_D_90010" + x + "_A"] = u[I][F[2]]),
                (p["Odds_D_90010" + x + "_H_Cls"] = getOddsClass(u[I][F[1]])),
                (p["Odds_D_90010" + x + "_A_Cls"] = getOddsClass(u[I][F[2]]));
            }
            null !=
              (m = a(s ? OddsDataLObj : OddsDataObj, p.OddsId_D_900101)) &&
              m.OddsId == p.OddsId_D_900101 &&
              (m.Odds_D_900101_H != p.Odds_D_900101_H ||
              m.Odds_D_900101_A != p.Odds_D_900101_A
                ? (p.Changed_D_900101 = CLS_UPD)
                : (p.Changed_D_900101 = ""));
            ((R = new Object()).OddsId = p.OddsId_D_900101),
              (R.Odds_D_900101_H = p.Odds_D_900101_H),
              (R.Odds_D_900101_A = p.Odds_D_900101_A),
              _(s ? OddsDataLObj : OddsDataObj, R),
              null !=
                (m = a(s ? OddsDataLObj : OddsDataObj, p.OddsId_D_900102)) &&
                m.OddsId == p.OddsId_D_900102 &&
                (m.Odds_D_900102_H != p.Odds_D_900102_H ||
                m.Odds_D_900102_A != p.Odds_D_900102_A
                  ? (p.Changed_D_900102 = CLS_UPD)
                  : (p.Changed_D_900102 = ""));
            ((R = new Object()).OddsId = p.OddsId_D_900102),
              (R.Odds_D_900102_H = p.Odds_D_900102_H),
              (R.Odds_D_900102_A = p.Odds_D_900102_A),
              _(s ? OddsDataLObj : OddsDataObj, R),
              null !=
                (m = a(s ? OddsDataLObj : OddsDataObj, p.OddsId_D_900103)) &&
                m.OddsId == p.OddsId_D_900103 &&
                (m.Odds_D_900103_H != p.Odds_D_900103_H ||
                m.Odds_D_900103_A != p.Odds_D_900103_A
                  ? (p.Changed_D_900103 = CLS_UPD)
                  : (p.Changed_D_900103 = ""));
            ((R = new Object()).OddsId = p.OddsId_D_900103),
              (R.Odds_D_900103_H = p.Odds_D_900103_H),
              (R.Odds_D_900103_A = p.Odds_D_900103_A),
              _(s ? OddsDataLObj : OddsDataObj, R),
              null !=
                (m = a(s ? OddsDataLObj : OddsDataObj, p.OddsId_D_900104)) &&
                m.OddsId == p.OddsId_D_900104 &&
                (m.Odds_D_900104_H != p.Odds_D_900104_H ||
                m.Odds_D_900104_A != p.Odds_D_900104_A
                  ? (p.Changed_D_900104 = CLS_UPD)
                  : (p.Changed_D_900104 = ""));
            ((R = new Object()).OddsId = p.OddsId_D_900104),
              (R.Odds_D_900104_H = p.Odds_D_900104_H),
              (R.Odds_D_900104_A = p.Odds_D_900104_A),
              _(s ? OddsDataLObj : OddsDataObj, R),
              null !=
                (m = a(s ? OddsDataLObj : OddsDataObj, p.OddsId_D_900105)) &&
                m.OddsId == p.OddsId_D_900105 &&
                (m.Odds_D_900105_H != p.Odds_D_900105_H ||
                m.Odds_D_900105_A != p.Odds_D_900105_A
                  ? (p.Changed_D_900105 = CLS_UPD)
                  : (p.Changed_D_900105 = ""));
            ((R = new Object()).OddsId = p.OddsId_D_900105),
              (R.Odds_D_900105_H = p.Odds_D_900105_H),
              (R.Odds_D_900105_A = p.Odds_D_900105_A),
              _(s ? OddsDataLObj : OddsDataObj, R),
              null !=
                (m = a(s ? OddsDataLObj : OddsDataObj, p.OddsId_D_900106)) &&
                m.OddsId == p.OddsId_D_900106 &&
                (m.Odds_D_900106_H != p.Odds_D_900106_H ||
                m.Odds_D_900106_A != p.Odds_D_900106_A
                  ? (p.Changed_D_900106 = CLS_UPD)
                  : (p.Changed_D_900106 = ""));
            ((R = new Object()).OddsId = p.OddsId_D_900106),
              (R.Odds_D_900106_H = p.Odds_D_900106_H),
              (R.Odds_D_900106_A = p.Odds_D_900106_A),
              _(s ? OddsDataLObj : OddsDataObj, R),
              null !=
                (m = a(s ? OddsDataLObj : OddsDataObj, p.OddsId_D_900107)) &&
                m.OddsId == p.OddsId_D_900107 &&
                (m.Odds_D_900107_H != p.Odds_D_900107_H ||
                m.Odds_D_900107_A != p.Odds_D_900107_A
                  ? (p.Changed_D_900107 = CLS_UPD)
                  : (p.Changed_D_900107 = ""));
            ((R = new Object()).OddsId = p.OddsId_D_900107),
              (R.Odds_D_900107_H = p.Odds_D_900107_H),
              (R.Odds_D_900107_A = p.Odds_D_900107_A),
              _(s ? OddsDataLObj : OddsDataObj, R),
              null !=
                (m = a(s ? OddsDataLObj : OddsDataObj, p.OddsId_D_900108)) &&
                m.OddsId == p.OddsId_D_900108 &&
                (m.Odds_D_900108_H != p.Odds_D_900108_H ||
                m.Odds_D_900108_A != p.Odds_D_900108_A
                  ? (p.Changed_D_900108 = CLS_UPD)
                  : (p.Changed_D_900108 = ""));
            ((R = new Object()).OddsId = p.OddsId_D_900108),
              (R.Odds_D_900108_H = p.Odds_D_900108_H),
              (R.Odds_D_900108_A = p.Odds_D_900108_A),
              _(s ? OddsDataLObj : OddsDataObj, R),
              null !=
                (m = a(s ? OddsDataLObj : OddsDataObj, p.OddsId_D_900109)) &&
                m.OddsId == p.OddsId_D_900109 &&
                (m.Odds_D_900109_H != p.Odds_D_900109_H ||
                m.Odds_D_900109_A != p.Odds_D_900109_A
                  ? (p.Changed_D_900109 = CLS_UPD)
                  : (p.Changed_D_900109 = ""));
            var R;
            ((R = new Object()).OddsId = p.OddsId_D_900109),
              (R.Odds_D_900109_H = p.Odds_D_900109_H),
              (R.Odds_D_900109_A = p.Odds_D_900109_A),
              _(s ? OddsDataLObj : OddsDataObj, R),
              (C = r
                .replace(
                  new RegExp("\x3c!--ExtendHead--\x3e", "g"),
                  combinationExOddsHtml(y)
                )
                .replace(
                  new RegExp("\x3c!--ExtendBetType--\x3e", "g"),
                  combinationExOddsHtml(g)
                ));
          }
        }
    if ((u["mc" + c.MatchId], (p.MoreCount = u["mc" + c.MatchId]), s)) {
      if (1 == S) p.ShowTime = RES_Odds_Live;
      else {
        p.ShowTime = RES_InPlay;
        for (var k = 1; k < 10; k++) p["HeadCss" + k] = "";
        p["HeadCss" + c.LivePeriod] = "current";
      }
      c.LivePeriod > 1 || (1 == c.LivePeriod && 0 == S)
        ? (p.Inplay = "inPlayAccentBg")
        : (p.Inplay = "");
    }
    1 == h && D
      ? ((p.Display_ExtendML = CLS_LS_ON),
        (p.rowspan = "2"),
        (t = t.replace("\x3c!--ExtendContent--\x3e", C)))
      : ((p.rowspan = "1"), (t = t.replace("\x3c!--ExtendContent--\x3e", "")));
    var N = !1;
    switch (
      (d == e.length - 1 ? (N = !0) : e[d + 1].MUID != c.MUID && (N = !0),
      s
        ? (0 == c.LivePeriod
            ? (p.LiveTimeCls = "1" == c.CsStatus ? "HalfTime" : "IsLive")
            : (p.LiveTimeCls = "LiveTime"),
          0 == c.Div
            ? ((p.Tr_Cls = "live"), (p.BgColor = GetLiveBGColor(c.Div)))
            : ((p.Tr_Cls = "liveligh"), (p.BgColor = GetLiveBGColor(c.Div))))
        : 0 == c.Div
        ? ((p.Tr_Cls = TR_0), (p.BgColor = GetEventBGColor(c.Div)))
        : ((p.Tr_Cls = TR_1), (p.BgColor = GetEventBGColor(c.Div))),
      c.FavorF)
    ) {
      case "h":
        (p.Home_Cls = CLS_HDP_F),
          (p.Away_Cls = CLS_HDP_N),
          (p.Value_1_H = c.Value_1),
          (p.Value_1_A = "");
        break;
      case "a":
        (p.Home_Cls = CLS_HDP_N),
          (p.Away_Cls = CLS_HDP_F),
          (p.Value_1_H = ""),
          (p.Value_1_A = c.Value_1);
        break;
      default:
        (p.Home_Cls = CLS_HDP_N),
          (p.Away_Cls = CLS_HDP_N),
          "" != c.Odds_1_H ? (p.Value_1_H = "0") : (p.Value_1_H = ""),
          (p.Value_1_A = "");
    }
    return (
      (p.UNDER_3 = "" == c.Goal_3 ? "" : RES_UNDER),
      "" != c.Odds_2_O
        ? ((p.ODD_2 = RES_ODD), (p.EVEN_2 = RES_EVEN))
        : ((p.ODD_2 = ""), (p.EVEN_2 = "")),
      "1" == c.TimerSuspend
        ? ((p.TimeSuspendCls1 = CLS_LS_OFF), (p.TimeSuspendCls = CLS_LS_ON))
        : ((p.TimeSuspendCls1 = CLS_LS_ON), (p.TimeSuspendCls = CLS_LS_OFF)),
      (0 != d && e[d - 1].MatchId == c.MatchId) ||
        ((p.StatsInfo = "0" == c.StatsId ? "" : getStatsHtml(c.MatchId)),
        (p.SportRadarInfo =
          0 == c.SportRadar
            ? ""
            : getRunningHtml(
                c.MatchId,
                s ? "IsLive" : "",
                c.StatsId,
                c.HomeName,
                c.AwayName,
                parseInt(document.DataForm_L.Sport.value, 10)
              )),
        (p.Streaming = getStreamingHtml(c.MatchId, c.StreamingId, s)),
        (p.Favorites = getFavoritesHtml(
          c.MUID,
          c.MatchCode,
          "1" == c.Favorite || "1" == c.FavLeague,
          s
        )),
        (p.FavLeagues = getFavLeaguesHtml(
          c.SportType,
          c.LeagueId,
          "1" == c.FavLeague,
          s
        )),
        0 == h &&
          ((p.OddsId_900101 = p.OddsId_D_900101),
          (p.Changed_900101 = p.Changed_D_900101),
          (p.Odds_900101_H = p.Odds_D_900101_H),
          (p.Odds_900101_A = p.Odds_D_900101_A),
          (p.Odds_900101_H_Cls = p.Odds_D_900101_H_Cls),
          (p.Odds_900101_A_Cls = p.Odds_D_900101_A_Cls),
          (p.OddsId_900102 = p.OddsId_D_900102),
          (p.Changed_900102 = p.Changed_D_900102),
          (p.Odds_900102_H = p.Odds_D_900102_H),
          (p.Odds_900102_A = p.Odds_D_900102_A),
          (p.Odds_900102_H_Cls = p.Odds_D_900102_H_Cls),
          (p.Odds_900102_A_Cls = p.Odds_D_900102_A_Cls),
          (p.OddsId_900103 = p.OddsId_D_900103),
          (p.Changed_900103 = p.Changed_D_900103),
          (p.Odds_900103_H = p.Odds_D_900103_H),
          (p.Odds_900103_A = p.Odds_D_900103_A),
          (p.Odds_900103_H_Cls = p.Odds_D_900103_H_Cls),
          (p.Odds_900103_A_Cls = p.Odds_D_900103_A_Cls))),
      (p.isParlay = 1),
      (p.Display_More = CLS_LS_OFF),
      (p.More_Style = CLS_LS_OFF),
      N
        ? ("0" == c.MoreCount && (p.Display_More = CLS_LS_OFF),
          DisplayMoreHtml(parseInt(o, 10), c.MUID, p, "ESports_More"),
          (p.More = void 0 !== p.MoreCount ? getMoreLabel(p.MoreCount, s) : ""),
          "" != p.More
            ? ((p.More_Style = ""),
              p.Display_More == CLS_LS_ON && (p.More_Style = "off"))
            : ((p.Display_More = CLS_LS_OFF), (p.MoreData = "")))
        : (p.Display_More = CLS_LS_OFF),
      (t = _formatTemplate(t, "{@", "}")),
      (t = _replaceTags(p, t))
    );
  }
  function s(e, d, t, s) {
    var r = this.SportType;
    0 == d &&
      "56" == r &&
      (function(e, d) {
        for (var a = 0, _ = [], t = 0; t < e.length; t++) {
          var s = e[t];
          "1" == s.MatchCount &&
            ((_[a] = new Array(
              s.MatchId,
              s.OddsId_20,
              s.Odds_20_H,
              s.Odds_20_A,
              "",
              "",
              ""
            )),
            a++);
        }
        d ? (y = _) : (L = _);
      })(e, s);
    var l = e[d],
      n = !1;
    if (
      (d == e.length - 1 ? (n = !0) : e[d + 1].MUID != l.MUID && (n = !0),
      !isFilterCombo(l.Combo))
    )
      return "";
    if (!isFilterDate(l)) return "";
    var o = new Array();
    if (
      (M != l.MatchId && (f++, (M = l.MatchId)),
      (trClass = f % 2 == 0 ? O : i),
      (o.BgColor = s ? GetLiveBGColor(f % 2) : GetEventBGColor(f % 2)),
      (o.Tr_Cls = trClass),
      (o.MoreTr_Cls = trClass),
      (o.HomeName = l.HomeName),
      (o.AwayName = l.AwayName),
      (o.HomeName_t = l.HomeName.replace(
        '<span class="nameResult">',
        ""
      ).replace("</span>", "")),
      (o.AwayName_t = l.AwayName.replace(
        '<span class="nameResult">',
        ""
      ).replace("</span>", "")),
      (o.Odds_1_H = l.Odds_1_H),
      (o.Odds_1_A = l.Odds_1_A),
      (o.Odds_3_O = l.Odds_3_O),
      (o.Odds_3_U = l.Odds_3_U),
      (o.Odds_7_H = l.Odds_7_H),
      (o.Odds_7_A = l.Odds_7_A),
      (o.Odds_8_O = l.Odds_8_O),
      (o.Odds_8_U = l.Odds_8_U),
      (o.Odds_1_H_Cls = o.Odds_1_H < 0 ? CLS_EVEN : CLS_ODD),
      (o.Odds_1_A_Cls = o.Odds_1_A < 0 ? CLS_EVEN : CLS_ODD),
      (o.Odds_2_O_Cls = getOddsClass(l.Odds_2_O)),
      (o.Odds_2_E_Cls = getOddsClass(l.Odds_2_E)),
      (o.Odds_3_O_Cls = o.Odds_3_O < 0 ? CLS_EVEN : CLS_ODD),
      (o.Odds_3_U_Cls = o.Odds_3_U < 0 ? CLS_EVEN : CLS_ODD),
      (o.Odds_7_H_Cls = o.Odds_7_H < 0 ? CLS_EVEN : CLS_ODD),
      (o.Odds_7_A_Cls = o.Odds_7_A < 0 ? CLS_EVEN : CLS_ODD),
      (o.Odds_8_O_Cls = o.Odds_8_O < 0 ? CLS_EVEN : CLS_ODD),
      (o.Odds_8_U_Cls = o.Odds_8_U < 0 ? CLS_EVEN : CLS_ODD),
      (o.Odds_12_O_Cls = getOddsClass(l.Odds_12_O)),
      (o.Odds_12_E_Cls = getOddsClass(l.Odds_12_E)),
      (o.Odds_20_H_Cls = getOddsClass(l.Odds_20_H)),
      (o.Odds_20_A_Cls = getOddsClass(l.Odds_20_A)),
      (o.Odds_21_H_Cls = getOddsClass(l.Odds_21_H)),
      (o.Odds_21_A_Cls = getOddsClass(l.Odds_21_A)),
      (o.Odds_501_H_Cls = getOddsClass(l.Odds_501_H)),
      (o.Odds_501_A_Cls = getOddsClass(l.Odds_501_A)),
      (o.Odds_153_H_Cls = getOddsClass(l.Odds_153_H)),
      (o.Odds_153_A_Cls = getOddsClass(l.Odds_153_A)),
      (o.Odds_5_1_Cls = getOddsClass(l.Odds_5_1)),
      (o.Odds_5_X_Cls = getOddsClass(l.Odds_5_X)),
      (o.Odds_5_2_Cls = getOddsClass(l.Odds_5_2)),
      "" != l.OddsId_501)
    )
      switch (fFrame.userSite) {
        case "i":
          (o.Odds_501_H = l.Odds_501_H), (o.Odds_501_A = l.Odds_501_A);
          break;
        default:
          (o.Odds_501_H = l.Odds_501_CS10), (o.Odds_501_A = l.Odds_501_CS20);
      }
    var c = !0,
      p = !0;
    switch (
      (void 0 === l.OddsId_5 ? (c = !1) : "" == l.OddsId_5 && (c = !1),
      void 0 === l.OddsId_15 ? (p = !1) : "" == l.OddsId_15 && (p = !1),
      (o.Draw = getDrawHtml(c || p)),
      (o.InjuryTime = l.InjuryTime > "0" ? "+" + l.InjuryTime : ""),
      0 == l.LivePeriod
        ? (o.LiveTimeCls = "1" == l.CsStatus ? "HalfTime" : "IsLive")
        : (o.LiveTimeCls = "LiveTime"),
      l.FavorF)
    ) {
      case "h":
        (o.Home_Cls = CLS_HDP_F),
          (o.Away_Cls = CLS_HDP_N),
          (o.Value_1_H = l.Value_1),
          (o.Value_1_A = "");
        break;
      case "a":
        (o.Home_Cls = CLS_HDP_N),
          (o.Away_Cls = CLS_HDP_F),
          (o.Value_1_H = ""),
          (o.Value_1_A = l.Value_1);
        break;
      default:
        "44" == r
          ? ((o.Home_Cls = CLS_HDP_F + " " + CLS_PLAY_RED),
            (o.Away_Cls = CLS_HDP_N + " " + CLS_PLAY_BLUE),
            "" == l.ScoreH || "0" == l.ScoreH
              ? (o.Round = "")
              : (o.Round = RES_ROUND + " " + parseInt(l.ScoreH)))
          : ((o.Home_Cls = CLS_HDP_N), (o.Away_Cls = CLS_HDP_N)),
          "" != l.Odds_1_H ? (o.Value_1_H = "0") : (o.Value_1_H = ""),
          (o.Value_1_A = "");
    }
    switch (l.FavorH1) {
      case "h":
        (o.Value_7_H = l.Value_7), (o.Value_7_A = "");
        break;
      case "a":
        (o.Value_7_H = ""), (o.Value_7_A = l.Value_7);
        break;
      default:
        "" != l.Odds_7_H ? (o.Value_7_H = "0") : (o.Value_7_H = ""),
          (o.Value_7_A = "");
    }
    if (
      ((o.UNDER_3 = "" == l.Goal_3 ? "" : RES_UNDER),
      (o.UNDER_8 = "" == l.Goal_8 ? "" : RES_UNDER),
      "" != l.Odds_2_O
        ? ((o.ODD_2 = RES_ODD), (o.EVEN_2 = RES_EVEN))
        : ((o.ODD_2 = ""), (o.EVEN_2 = "")),
      "" != l.Odds_12_O
        ? ((o.ODD_12 = RES_ODD), (o.EVEN_12 = RES_EVEN))
        : ((o.ODD_12 = ""), (o.EVEN_12 = "")),
      (o.Value_153_H = ""),
      (o.Value_153_A = ""),
      "" != l.OddsId_153)
    )
      switch (l.FavorF_153) {
        case "h":
          (o.Value_153_H = l.Value_153), (o.Value_153_A = "");
          break;
        case "a":
          (o.Value_153_H = ""), (o.Value_153_A = l.Value_153);
          break;
        default:
          "" != l.Odds_153_H ? (o.Value_153_H = "0") : (o.Value_153_H = ""),
            (o.Value_153_A = "");
      }
    o.isParlay = 1;
    var u = !1;
    if ("5" == r) {
      if (s) DisplayMoreObj[l.MatchId] = CLS_LS_ON;
      else {
        (aForm = document.DataForm_D),
          (aFrame = DataFrame_D),
          (aKeeper = g_OddsKeeper_D);
        (new Date(
          NowTime.substr(6, 4),
          NowTime.substr(0, 2) - 1,
          NowTime.substr(3, 2),
          NowTime.substr(11, 2),
          NowTime.substr(14, 2),
          NowTime.substr(17, 2)
        ) -
          new Date(
            l.KickoffTime.substr(0, 4),
            l.KickoffTime.substr(4, 2) - 1,
            l.KickoffTime.substr(6, 2),
            l.KickoffTime.substr(8, 2),
            l.KickoffTime.substr(10, 2),
            0
          )) /
          6e4 >=
        -120
          ? ((DisplayMoreObj[l.MatchId] = CLS_LS_ON), (u = !1))
          : (void 0 === DisplayMoreObj[l.MatchId] &&
              (DisplayMoreObj[l.MatchId] = CLS_LS_OFF),
            (u = !0));
      }
      o.Display_More = DisplayMoreObj[l.MatchId];
    } else (o.Display_More = CLS_LS_OFF), (o.More_Style = CLS_LS_OFF);
    if (
      ((o.SuperLive_Style = CLS_LS_OFF), (o.FastMarket_Style = CLS_LS_OFF), n)
    )
      switch (r) {
        case "1":
          DisplayMoreHtml(
            parseInt(r, 10),
            l.MUID,
            o,
            "1" == r ? "Soccer_More" : "Tennis_More"
          ),
            (o.More = 0 == l.MoreCount ? "" : l.MoreCount),
            "" != o.More &&
              ((o.More_Style = ""),
              o.Display_More == CLS_LS_ON && (o.More_Style = "off"));
          break;
        case "5":
          if ("0" != l.MoreCount && "" != l.MoreCount) {
            var D = "en_Point";
            o.Display_More == CLS_LS_ON && (D = "en_Point off"),
              (o.More = u
                ? '<a href="#" onclick="SwitchMore(' +
                  l.MatchId +
                  "," +
                  s +
                  ',this);return false;" class="' +
                  D +
                  '"><span>' +
                  l.MoreCount +
                  "</span></a>"
                : ""),
              (o.MoreData = (function(e, d, t) {
                var s,
                  r = "";
                s = d ? OddsDataL : OddsData;
                for (
                  var l = "", n = "", o = "", O = "", i = 0;
                  i < s.length;
                  i++
                )
                  if (s[i][0] == e.MatchId) {
                    ("" != O && O == s[i][1]) ||
                      ("" != O &&
                        ((n += l.replace("\x3c!--MoreOdds--\x3e", r)),
                        (r = "")),
                      (l = fFrame.document
                        .getElementById("Tennis_tmpl")
                        .contentWindow.document.getElementById(
                          "TennisMoreEvent"
                        ).innerHTML)),
                      (o = fFrame.document
                        .getElementById("Tennis_tmpl")
                        .contentWindow.document.getElementById("MoreOdds")
                        .innerHTML);
                    var c = new Array();
                    if (
                      ((c.MatchId = e.MatchId),
                      (c.isParlay = 1),
                      (c.HomeName = e.HomeName),
                      (c.AwayName = e.AwayName),
                      (c.HomeName_t = e.HomeName),
                      (c.AwayName_t = e.AwayName),
                      (c.Tr_Cls = t),
                      (c.OddsId_154 = s[i][2]),
                      "" != c.OddsId_154 &&
                        ((c.Odds_154_h = s[i][3]),
                        (c.Odds_154_a = s[i][4]),
                        (c.Odds_154_H_Cls = getOddsClass(c.Odds_154_h)),
                        (c.Odds_154_A_Cls = getOddsClass(c.Odds_154_a))),
                      (c.ResourceName_154 = s[i][5]),
                      (c.OddsId_155 = s[i][6]),
                      "" != c.OddsId_155)
                    )
                      switch (
                        ((c.Value_155 = s[i][7]),
                        (c.Odds_155_h = s[i][8]),
                        (c.Odds_155_a = s[i][9]),
                        (c.Odds_155_H_Cls = getOddsClass(c.Odds_155_h)),
                        (c.Odds_155_A_Cls = getOddsClass(c.Odds_155_a)),
                        (c.FavorF_155 = s[i][10]),
                        c.FavorF_155)
                      ) {
                        case "h":
                          (c.Home_155_Cls = CLS_HDP_F),
                            (c.Away_155_Cls = CLS_HDP_N),
                            (c.Value_H_155 = "-" + c.Value_155),
                            (c.Value_A_155 = "+" + c.Value_155);
                          break;
                        case "a":
                          (c.Home_155_Cls = CLS_HDP_N),
                            (c.Away_155_Cls = CLS_HDP_F),
                            (c.Value_H_155 = "+" + c.Value_155),
                            (c.Value_A_155 = "-" + c.Value_155);
                          break;
                        default:
                          (c.Home_155_Cls = CLS_HDP_N),
                            (c.Away_155_Cls = CLS_HDP_N),
                            "" == c.Odds_155_h && "" == c.Odds_155_a
                              ? ((c.Value_H_155 = ""), (c.Value_A_155 = ""))
                              : ((c.Value_H_155 = "0"), (c.Value_A_155 = "0"));
                      }
                    (c.ResourceName_155 = s[i][11]),
                      (c.OddsId_156 = s[i][12]),
                      "" != c.OddsId_156 &&
                        ((c.Goal_156 = s[i][13]),
                        (c.Odds_156_o = s[i][14]),
                        (c.Odds_156_u = s[i][15]),
                        (c.Odds_156_O_Cls = getOddsClass(c.Odds_156_o)),
                        (c.Odds_156_U_Cls = getOddsClass(c.Odds_156_u))),
                      (c.ResourceName_156 = s[i][16]);
                    var p = null;
                    null !=
                      (p = a(d ? OddsDataLObj : OddsDataObj, c.OddsId_154)) &&
                      p.OddsId == c.OddsId_154 &&
                      (p.Odds_154_h != c.Odds_154_h ||
                      p.Odds_154_a != c.Odds_154_a
                        ? (c.Changed_154 = CLS_UPD)
                        : (c.Changed_154 = "")),
                      null !=
                        (p = a(d ? OddsDataLObj : OddsDataObj, c.OddsId_155)) &&
                        p.OddsId == c.OddsId_155 &&
                        (p.Odds_155_h != c.Odds_155_h ||
                        p.Odds_155_a != c.Odds_155_a ||
                        p.Value_155 != c.Value_155
                          ? (c.Changed_155 = CLS_UPD)
                          : (c.Changed_155 = "")),
                      null !=
                        (p = a(d ? OddsDataLObj : OddsDataObj, c.OddsId_156)) &&
                        p.OddsId == c.OddsId_156 &&
                        (p.Odds_156_o != c.Odds_156_o ||
                        p.Odds_156_u != c.Odds_156_u ||
                        p.Goal_156 != c.Goal_156
                          ? (c.Changed_156 = CLS_UPD)
                          : (c.Changed_156 = "")),
                      (l = _formatTemplate(l, "{@", "}")),
                      (l = _replaceTags(c, l)),
                      (o = _formatTemplate(o, "{@", "}")),
                      (o = _replaceTags(c, o)),
                      (O = s[i][1]),
                      (r += o),
                      ((u = new Object()).OddsId = s[i][2]),
                      (u.Odds_154_h = s[i][3]),
                      (u.Odds_154_a = s[i][4]),
                      (u.Odds_154_h = s[i][3]),
                      (u.Odds_154_a = s[i][4]),
                      (u.ResourceName_154 = s[i][5]),
                      _(d ? OddsDataLObj : OddsDataObj, u),
                      ((u = new Object()).OddsId = s[i][6]),
                      (u.Value_155 = s[i][7]),
                      (u.Odds_155_h = s[i][8]),
                      (u.Odds_155_a = s[i][9]),
                      (u.FavorF_155 = s[i][10]),
                      (u.ResourceName_155 = s[i][11]),
                      _(d ? OddsDataLObj : OddsDataObj, u);
                    var u;
                    ((u = new Object()).OddsId = s[i][12]),
                      (u.Goal_156 = s[i][13]),
                      (u.Odds_156_o = s[i][14]),
                      (u.Odds_156_u = s[i][15]),
                      (u.ResourceName_156 = s[i][16]),
                      _(d ? OddsDataLObj : OddsDataObj, u);
                  }
                return (n += l.replace("\x3c!--MoreOdds--\x3e", r));
              })(l, s, o.Tr_Cls));
          } else o.Display_More = CLS_LS_OFF;
          break;
        case "2":
        case "56":
          var m = "",
            h = [],
            S = [];
          "2" == r
            ? s
              ? ("undefined" != typeof OddsData21L && (h = OddsData21L),
                "undefined" != typeof OddsData2L && (S = OddsData2L))
              : ("undefined" != typeof OddsData21 && (h = OddsData21),
                "undefined" != typeof OddsData2 && (S = OddsData2))
            : s
            ? (void 0 !== y && (h = y), void 0 !== C && (S = C))
            : (void 0 !== L && (h = L), void 0 !== g && (S = g)),
            (o.Display_Extend = CLS_LS_OFF),
            (o.Display_ExtendML = CLS_LS_OFF),
            (o.MatchId = l.MatchId);
          var I = null;
          if (n) {
            if (h.length > 0)
              for (var E = 0; E < h.length; E++)
                if (h[E][0] == l.MatchId) {
                  (o.Display_Extend = CLS_LS_ON),
                    (o.Display_ExtendML = CLS_LS_ON),
                    (o.OddsId_20 = h[E][1]),
                    (o.Odds_20_H = h[E][2]),
                    (o.Odds_20_A = h[E][3]),
                    (o.Odds_20_H_Cls = getOddsClass(h[E][2])),
                    (o.Odds_20_A_Cls = getOddsClass(h[E][3])),
                    (o.OddsId_21 = h[E][4]),
                    (o.Odds_21_H = h[E][5]),
                    (o.Odds_21_A = h[E][6]),
                    (o.Odds_21_H_Cls = getOddsClass(h[E][5])),
                    (o.Odds_21_A_Cls = getOddsClass(h[E][6])),
                    null !=
                      (I = a(s ? OddsDataLObj : OddsDataObj, o.OddsId_20)) &&
                      I.OddsId == o.OddsId_20 &&
                      (I.Odds_20_h != o.Odds_20_H || I.Odds_20_a != o.Odds_20_A
                        ? (o.Changed_20 = CLS_UPD)
                        : (o.Changed_20 = "")),
                    null !=
                      (I = a(s ? OddsDataLObj : OddsDataObj, o.OddsId_21)) &&
                      I.OddsId == o.OddsId_21 &&
                      (I.Odds_21_h != o.Odds_21_H || I.Odds_21_a != o.Odds_21_A
                        ? (o.Changed_21 = CLS_UPD)
                        : (o.Changed_21 = ""));
                  ((F = new Object()).OddsId = o.OddsId_20),
                    (F.Odds_20_h = o.Odds_20_H),
                    (F.Odds_20_a = o.Odds_20_A),
                    _(s ? OddsDataLObj : OddsDataObj, F);
                  ((F = new Object()).OddsId = o.OddsId_21),
                    (F.Odds_21_h = o.Odds_21_H),
                    (F.Odds_21_a = o.Odds_21_A),
                    _(s ? OddsDataLObj : OddsDataObj, F);
                }
            if (S.length > 0) {
              var w = "",
                v = checkQuarterByMatch(S, l.MatchId),
                b = [],
                A = [];
              if (v.length > 0) {
                o.Display_Extend = CLS_LS_ON;
                for (var H = 0; H < v.length; H++) {
                  switch (
                    (b.push(
                      fFrame.document
                        .getElementById("NBA_tmpl")
                        .contentWindow.document.getElementById(
                          "BasketballExtendBettype"
                        ).innerHTML
                    ),
                    v[H].replace("0", ""))
                  ) {
                    default:
                    case "1":
                      o.QuarterTitle = RES_1StQuarterTitle;
                      break;
                    case "2":
                      o.QuarterTitle = RES_2ndQuarterTitle;
                      break;
                    case "3":
                      o.QuarterTitle = RES_3rdQuarterTitle;
                      break;
                    case "4":
                      o.QuarterTitle = RES_4thQuarterTitle;
                  }
                  (o.QTRHDP_hint = RES_QTRHDP_hint.replace(
                    "[X]",
                    v[H].replace("0", "")
                  )),
                    (o.QTROU_hint = RES_QTROU_hint.replace(
                      "[X]",
                      v[H].replace("0", "")
                    )),
                    (o.QTROE_hint = RES_QTROE_hint.replace(
                      "[X]",
                      v[H].replace("0", "")
                    )),
                    (o.Qid = v[H].replace("0", ""));
                  var P = "",
                    T = getDataByQuarter(S, l.MatchId, v[H]);
                  if (1 == T.length)
                    (P = (P = fFrame.document
                      .getElementById("NBA_tmpl")
                      .contentWindow.document.getElementById("MatchRow")
                      .innerHTML.replace("<tbody>", "")
                      .replace("</tbody>", "")).replace(
                      new RegExp("{@", "g"),
                      "{@0"
                    )),
                      A.push(P);
                  else {
                    for (var x = 0; x < T.length; x++)
                      w += (P = fFrame.document
                        .getElementById("NBA_tmpl")
                        .contentWindow.document.getElementById("MatchRow")
                        .innerHTML.replace("<tbody>", "")
                        .replace("</tbody>", "")).replace(
                        new RegExp("{@", "g"),
                        "{@" + x
                      );
                    A.push(w), (w = "");
                  }
                  for (x = 0; x < T.length; x++) {
                    switch (
                      ((o[x + "Tr_Cls"] = trClass),
                      (o[x + "BgColor"] = s
                        ? GetLiveBGColor(f % 2)
                        : GetEventBGColor(f % 2)),
                      (o[x + "isParlay"] = "1"),
                      (o[x + "MatchId"] = l.MatchId),
                      (o[x + "OddsId_609"] = T[x][2]),
                      (o[x + "Odds_609_H_Cls"] = getOddsClass(T[x][4])),
                      (o[x + "Odds_609_A_Cls"] = getOddsClass(T[x][5])),
                      T[x][6])
                    ) {
                      case "h":
                        (o[x + "Value_609_H"] = T[x][3]),
                          (o[x + "Value_609_A"] = "");
                        break;
                      case "a":
                        (o[x + "Value_609_H"] = ""),
                          (o[x + "Value_609_A"] = T[x][3]);
                        break;
                      default:
                        "" != T[x][4]
                          ? (o[x + "Value_609_H"] = "0")
                          : (o[x + "Value_609_H"] = ""),
                          (o[x + "Value_609_A"] = "");
                    }
                    (o[x + "Odds_609_H"] = T[x][4]),
                      (o[x + "Odds_609_A"] = T[x][5]),
                      (o[x + "OddsId_610"] = T[x][7]),
                      (o[x + "Odds_610_O_Cls"] = getOddsClass(T[x][9])),
                      (o[x + "Odds_610_U_Cls"] = getOddsClass(T[x][10])),
                      (o[x + "Goal_610"] = T[x][8]),
                      (o[x + "UNDER_610"] = "" == T[x][8] ? "" : RES_UNDER),
                      (o[x + "Odds_610_O"] = T[x][9]),
                      (o[x + "Odds_610_U"] = T[x][10]),
                      (o[x + "OddsId_611"] = T[x][11]),
                      (o[x + "Odds_611_O_Cls"] = getOddsClass(T[x][12])),
                      (o[x + "Odds_611_E_Cls"] = getOddsClass(T[x][13])),
                      "" != T[x][12]
                        ? ((o[x + "ODD_611"] = RES_ODD),
                          (o[x + "EVEN_611"] = RES_EVEN))
                        : ((o[x + "ODD_611"] = ""), (o[x + "EVEN_611"] = "")),
                      (o[x + "Odds_611_O"] = T[x][12]),
                      (o[x + "Odds_611_E"] = T[x][13]),
                      null !=
                        (I = a(
                          s ? OddsDataLObj : OddsDataObj,
                          o[x + "OddsId_609"]
                        )) &&
                        I.OddsId == o[x + "OddsId_609"] &&
                        (I.Odds_609_h != o[x + "Odds_609_H"] ||
                        I.Odds_609_a != o[x + "Odds_609_A"] ||
                        I.Value_609_h != o[x + "Value_609_H"] ||
                        I.Value_609_a != o[x + "Value_609_A"]
                          ? (o[x + "Changed_609"] = CLS_UPD)
                          : (o[x + "Changed_609"] = "")),
                      null !=
                        (I = a(
                          s ? OddsDataLObj : OddsDataObj,
                          o[x + "OddsId_610"]
                        )) &&
                        I.OddsId == o[x + "OddsId_610"] &&
                        (I.Odds_610_o != o[x + "Odds_610_O"] ||
                        I.Odds_610_u != o[x + "Odds_610_U"] ||
                        I.Goal_610 != o[x + "Goal_610"] ||
                        I.UNDER_610 != o[x + "UNDER_610"]
                          ? (o[x + "Changed_610"] = CLS_UPD)
                          : (o[x + "Changed_610"] = "")),
                      null !=
                        (I = a(
                          s ? OddsDataLObj : OddsDataObj,
                          o[x + "OddsId_611"]
                        )) &&
                        I.OddsId == o[x + "OddsId_611"] &&
                        (I.Odds_611_o != o[x + "Odds_611_O"] ||
                        I.Odds_611_e != o[x + "Odds_611_E"] ||
                        I.ODD_611 != o[x + "ODD_611"] ||
                        I.EVEN_611 != o[x + "EVEN_611"]
                          ? (o[x + "Changed_611"] = CLS_UPD)
                          : (o[x + "Changed_611"] = ""));
                    ((F = new Object()).OddsId = o[x + "OddsId_609"]),
                      (F.Value_609_h = o[x + "Value_609_H"]),
                      (F.Value_609_a = o[x + "Value_609_A"]),
                      (F.Odds_609_h = o[x + "Odds_609_H"]),
                      (F.Odds_609_a = o[x + "Odds_609_A"]),
                      _(s ? OddsDataLObj : OddsDataObj, F);
                    ((F = new Object()).OddsId = o[x + "OddsId_610"]),
                      (F.Goal_610 = o[x + "Goal_610"]),
                      (F.UNDER_610 = o[x + "UNDER_610"]),
                      (F.Odds_610_o = o[x + "Odds_610_O"]),
                      (F.Odds_610_u = o[x + "Odds_610_U"]),
                      _(s ? OddsDataLObj : OddsDataObj, F);
                    ((F = new Object()).OddsId = o[x + "OddsId_611"]),
                      (F.ODD_611 = o[x + "ODD_611"]),
                      (F.EVEN_611 = o[x + "EVEN_611"]),
                      (F.Odds_611_o = o[x + "Odds_611_O"]),
                      (F.Odds_611_e = o[x + "Odds_611_E"]),
                      _(s ? OddsDataLObj : OddsDataObj, F),
                      (o[x + "Race10_hint"] = RES_QxRaceto.replace(
                        "[X]",
                        T[x][1].replace("0", "")
                      ).replace("[Y]", "10")),
                      (o[x + "OddsId_613_10"] = T[x][14]),
                      (o[x + "Odds_613_10_H_Cls"] = getOddsClass(T[x][15])),
                      (o[x + "Odds_613_10_A_Cls"] = getOddsClass(T[x][16])),
                      (o[x + "Odds_613_H10"] = T[x][15]),
                      (o[x + "Odds_613_A10"] = T[x][16]),
                      (o[x + "Race15_hint"] = RES_QxRaceto.replace(
                        "[X]",
                        T[x][1].replace("0", "")
                      ).replace("[Y]", "15")),
                      (o[x + "OddsId_613_15"] = T[x][17]),
                      (o[x + "Odds_613_15_H_Cls"] = getOddsClass(T[x][18])),
                      (o[x + "Odds_613_15_A_Cls"] = getOddsClass(T[x][19])),
                      (o[x + "Odds_613_H15"] = T[x][18]),
                      (o[x + "Odds_613_A15"] = T[x][19]),
                      (o[x + "Race20_hint"] = RES_QxRaceto.replace(
                        "[X]",
                        T[x][1].replace("0", "")
                      ).replace("[Y]", "20")),
                      (o[x + "OddsId_613_20"] = T[x][20]),
                      (o[x + "Odds_613_20_H_Cls"] = getOddsClass(T[x][21])),
                      (o[x + "Odds_613_20_A_Cls"] = getOddsClass(T[x][22])),
                      (o[x + "Odds_613_H20"] = T[x][21]),
                      (o[x + "Odds_613_A20"] = T[x][22]),
                      null !=
                        (I = a(
                          s ? OddsDataLObj : OddsDataObj,
                          o[x + "OddsId_613_10"]
                        )) &&
                        I.OddsId == o[x + "OddsId_613_10"] &&
                        (I.Odds_613_h10 != o[x + "Odds_613_H10"] ||
                        I.Odds_613_a10 != o[x + "Odds_613_A10"]
                          ? (o[x + "Changed_613_10"] = CLS_UPD)
                          : (o[x + "Changed_613_10"] = "")),
                      null !=
                        (I = a(
                          s ? OddsDataLObj : OddsDataObj,
                          o[x + "OddsId_613_15"]
                        )) &&
                        I.OddsId == o[x + "OddsId_613_15"] &&
                        (I.Odds_613_h15 != o[x + "Odds_613_H15"] ||
                        I.Odds_613_a15 != o[x + "Odds_613_A15"]
                          ? (o[x + "Changed_613_15"] = CLS_UPD)
                          : (o[x + "Changed_613_15"] = "")),
                      null !=
                        (I = a(
                          s ? OddsDataLObj : OddsDataObj,
                          o[x + "OddsId_613_20"]
                        )) &&
                        I.OddsId == o[x + "OddsId_613_20"] &&
                        (I.Odds_613_h20 != o[x + "Odds_613_H20"] ||
                        I.Odds_613_a20 != o[x + "Odds_613_A20"]
                          ? (o[x + "Changed_613_20"] = CLS_UPD)
                          : (o[x + "Changed_613_20"] = ""));
                    ((F = new Object()).OddsId = o[x + "OddsId_613_10"]),
                      (F.Odds_613_h10 = o[x + "Odds_613_H10"]),
                      (F.Odds_613_a10 = o[x + "Odds_613_A10"]),
                      _(s ? OddsDataLObj : OddsDataObj, F);
                    ((F = new Object()).OddsId = o[x + "OddsId_613_15"]),
                      (F.Odds_613_h15 = o[x + "Odds_613_H15"]),
                      (F.Odds_613_a15 = o[x + "Odds_613_A15"]),
                      _(s ? OddsDataLObj : OddsDataObj, F);
                    var F;
                    ((F = new Object()).OddsId = o[x + "OddsId_613_20"]),
                      (F.Odds_613_h20 = o[x + "Odds_613_H20"]),
                      (F.Odds_613_a20 = o[x + "Odds_613_A20"]),
                      _(s ? OddsDataLObj : OddsDataObj, F);
                  }
                  (m += b[H].replace("\x3c!--MatchList--\x3e", A[H])),
                    (m = _formatTemplate(m, "{@", "}")),
                    (m = _replaceTags(o, m));
                }
              }
              t = t.replace("\x3c!--BasketballExtendBettype--\x3e", m);
            }
          }
          (o.Display_More = CLS_LS_OFF),
            (o.More_Style = CLS_LS_OFF),
            (void 0 !== l.MoreCount && "0" != l.MoreCount) ||
              (o.Display_More = CLS_LS_OFF),
            DisplayMoreHtml(parseInt(r, 10), l.MUID, o, "Basketball_More"),
            (o.More =
              void 0 !== l.MoreCount ? getMoreLabel(l.MoreCount, s) : ""),
            "" != o.More
              ? ((o.More_Style = ""),
                o.Display_More == CLS_LS_ON && (o.More_Style = "off"))
              : ((o.Display_More = CLS_LS_OFF), (o.MoreData = ""));
          break;
        default:
          o.Display_More = CLS_LS_OFF;
      }
    else "5" == r && (o.Display_More = CLS_LS_OFF);
    if (0 == d || e[d - 1].MatchId != l.MatchId) {
      if ("1" == l.SportType)
        switch (l.SportRadar) {
          case "0":
            o.SportRadarInfo = "";
            break;
          default:
            switch (l.StatsId) {
              case "1":
              case "5":
                o.SportRadarInfo = getSportRadarHtml(
                  l.MatchId,
                  s ? "IsLive" : "",
                  parseInt(l.SportType, 10)
                );
                break;
              case "3":
                break;
              case "4":
              case "7":
                o.SportRadarInfo = getRunningHtml(
                  l.MatchId,
                  s ? "IsLive" : "",
                  l.StatsId,
                  l.HomeName,
                  l.AwayName,
                  parseInt(l.SportType, 10)
                );
            }
        }
      else
        o.SportRadarInfo =
          0 == l.SportRadar
            ? ""
            : getSportRadarHtml(
                l.MatchId,
                s ? "IsLive" : "",
                parseInt(l.SportType, 10)
              );
      switch (l.StatsId) {
        case "0":
          o.StatsInfo = "";
          break;
        case "1":
          o.StatsInfo = getStatsHtml(l.MatchId);
          break;
        case "2":
          o.StatsInfo = "";
          break;
        case "3":
          break;
        case "4":
          o.StatsInfo = getStatsHtml(l.MatchId);
          break;
        case "5":
        case "6":
        case "7":
          o.StatsInfo = getStatsHtml(l.MatchId);
      }
      if (
        ((o.Streaming = getStreamingHtml(l.MatchId, l.StreamingId, s)),
        (o.Favorites = ""),
        s)
      )
        switch (l.GameStatus) {
          case "1":
            o.GameStatus =
              '<div class="happen LiveTime" Title="' +
              RES_PRC_full +
              '"><b>' +
              RES_PRC +
              "</b></div>";
            break;
          case "2":
            o.GameStatus =
              '<div class="happen LiveTime" Title="' +
              RES_PPen_full +
              '"><b>' +
              RES_PPen +
              "</b></div>";
            break;
          case "3":
            o.GameStatus =
              '<div class="happen LiveTime" Title="' +
              RES_VAR_full +
              '"><b>' +
              RES_VAR +
              "</b></div>";
            break;
          case "4":
            o.GameStatus =
              '<div class="happen LiveTime" Title="' +
              RES_Pen_full +
              '"><b>' +
              RES_Pen +
              "</b></div>";
            break;
          case "5":
            o.GameStatus =
              '<div class="happen LiveTime" Title="' +
              RES_Inj_full +
              '"><b>' +
              RES_Inj +
              "</b></div>";
            break;
          default:
            o.GameStatus = "";
        }
    }
    s &&
      ("1" == r &&
        ((o.RedCardH = getRedCardHtml(parseInt(l.RedCardH, 10))),
        (o.RedCardA = getRedCardHtml(parseInt(l.RedCardA, 10)))),
      "1" == l.TimerSuspend
        ? ((o.TimeSuspendCls1 = CLS_LS_OFF), (o.TimeSuspendCls = CLS_LS_ON))
        : ((o.TimeSuspendCls1 = CLS_LS_ON), (o.TimeSuspendCls = CLS_LS_OFF)),
      SetLiveScore(o, l, r, n)),
      (o.MR_DISP1 = CLS_LS_OFF),
      (o.MR_DISP2 = CLS_LS_ON),
      (o.MR_DISP3 = CLS_LS_ON);
    var R = new RegExp("\x3c!--MR_START--\x3e.*\x3c!--MR_END--\x3e");
    if (
      ((t = t.replace(R, "")),
      (t = t.replace("\x3c!--MY_START--\x3e", "")),
      (t = t.replace("\x3c!--MY_END--\x3e", "")),
      "" != o.More)
    )
      (t = (t = t.replace("\x3c!--SMORE_START--\x3e", "")).replace(
        "\x3c!--SMORE_END--\x3e",
        ""
      )),
        (o.MY_rowspan = "2"),
        (o.MY_dline = "none_dline");
    else {
      (o.MY_rowspan = "1"), (o.MY_dline = "");
      var k = new RegExp("\x3c!--SMORE_START--\x3e.*\x3c!--SMORE_END--\x3e");
      t = t.replace(k, "");
    }
    return _replaceTags(o, _formatTemplate(t, "{@", "}"));
  }
  function r(e) {
    o(e);
    var d = 0;
    e.tBodies.length > 0 && (d = e.tBodies.length - 1),
      e.tBodies[d].rows.length <= 1 && (e.parentNode.style.display = "none");
  }
  function l(e) {
    o(e);
    var d = 0;
    e.tBodies.length > 0 && (d = e.tBodies.length - 1),
      e.tBodies[d].rows.length <= 1 && (e.parentNode.style.display = "none"),
      n();
  }
  function n() {
    if (c.IsReady()) {
      0 == document.getElementsByName("chkDate").length &&
        (alert(RES_NoParlayMsg), fFrame.leftx.SwitchMenuType(0, "")),
        window.clearTimeout(S),
        (S = setTimeout("startButton('" + ("" == h ? "d" : "l") + "')", 3e3));
      (f = 1),
        null != c.UpdateFinish && c.UpdateFinish(h),
        I && ((I = !1), FinalpaintOddsTable());
    } else window.setTimeout(n, 500);
  }
  function o(e) {
    var d,
      a = 0;
    e.tBodies.length > 0 && (a = e.tBodies.length - 1);
    for (var _ = e.tBodies[a], t = _.rows.length - 1; t >= 0; t--)
      "l" == _.rows[t].id.charAt(0) ? d++ : (d = 0), d > 1 && _.deleteRow(t);
    for (; _.rows.length > 0 && "l" == _.rows[_.rows.length - 1].id.charAt(0); )
      _.deleteRow(_.rows.length - 1);
  }
  var O = "bgcpe",
    i = "bgcpelight",
    c = this,
    p = null,
    u = new Array();
  (this.arr_SportsCount = new Array()), (this.arr_SportsCount[0] = 0);
  var D = new Array(),
    m = "",
    h = "";
  (this.getOddsKeeperArray = function() {
    return u;
  }),
    (this.HasData = !1),
    (this.IsReady = function() {
      for (var e in D) if (!D[e]) return !1;
      return !0;
    }),
    (this.initData = function(a, _, n, o, c) {
      var S = document.DataForm_D;
      h = o;
      var C = "_D";
      "l" == o &&
        ((m = "_L"),
        (C = "_L"),
        (O = "live"),
        (i = "liveligh"),
        (S = document.DataForm_L)),
        (D[n] = !1),
        _ > S.CT.value && (S.CT.value = _);
      var y = fFrame.DisplayMode;
      if (
        initialTmpl(
          ARR_TMPLID_DEF[y][n],
          ARR_TMPLURL_DEF[y][n],
          "ShowBetList('" +
            a +
            "','" +
            _ +
            "','" +
            n +
            o +
            "',DataFrame" +
            C +
            ".N" +
            n +
            o +
            ");"
        )
      ) {
        switch (
          ((p = new OddsKeeper()),
          (u[n] = p),
          (p.SportType = n),
          (p.RegenEverytime = !0),
          p.setTemplate(
            fFrame.document.getElementById(ARR_TMPLID_DEF[3][n]).contentWindow
          ),
          (p.afterNewLeague = afterNewLeague),
          n)
        ) {
          case "43":
            p.afterNewEvent = t;
            break;
          default:
            p.afterNewEvent = s;
        }
        (p.afterRepaintTable = 99 != n ? r : l),
          1 == n && (p.updateAppendFields = d),
          5 == n && (p.updateAppendFields = e),
          43 == n && (p.updateAppendFields = updateAppendFields_Esport),
          (p.TableContainer = document.getElementById(
            "oTableContainer_" + n + m
          )),
          (p.BetTypes = ARR_BETYPE_DEF[n]),
          p.setDatas(c, ARR_FIELDS_DEF2[n]),
          0 != SPORT_TYPE
            ? SPORT_TYPE == n
              ? (arr_ShowMixParlay_map[n] = !0)
              : (arr_ShowMixParlay_map[n] = !1)
            : (arr_ShowMixParlay_map[n] = !0),
          (this.arr_SportsCount[n] =
            0 == p.EventList.length
              ? 0
              : p.EventList[p.EventList.length - 1].MatchIndex + 1),
          p.paintOddsTable(),
          1 == n && OpenMoreDiv(1),
          2 == n && OpenMoreDiv(2),
          (S.RT.value = "U"),
          (D[n] = !0);
      }
    }),
    (this.Update = function(e, d, a, _, t, s, r, l, n, o, O) {
      var i = document.DataForm_D;
      if (
        ("l" == a && (i = document.DataForm_L),
        (D[d] = !1),
        e > i.CT.value && (i.CT.value = e),
        null == u[d])
      )
        return (this.arr_SportsCount[d] = 0), void refreshData();
      (p = u[d]).EventList.length + s.length - _.length == 0
        ? (this.arr_SportsCount[d] = 0)
        : 0 == p.EventList.length
        ? (this.arr_SportsCount[d] = s.length - _.length)
        : (this.arr_SportsCount[d] =
            p.EventList[p.EventList.length - 1].MatchIndex +
            1 +
            s.length -
            _.length),
        p.refreshOddsTable(_, t, s, r, l, n, o, O),
        1 == d && OpenMoreDiv(1),
        2 == d && OpenMoreDiv(2),
        (D[d] = !0);
    });
  var S,
    C = [],
    y = [],
    g = [],
    L = [],
    M = "",
    f = 1,
    I = !0;
  this.ShowHideSportContainer = function() {
    for (var e in u) {
      var d = u[e].TableContainer;
      d.childNodes[0].tBodies[0].rows.length > 0 &&
      arr_ShowMixParlay[e] &&
      arr_ShowMixParlay_map[e]
        ? (d.style.display = "block")
        : (d.style.display = "none");
    }
  };
}
function filterCombo() {
  document.getElementById("selections").innerHTML == RES_Allselections
    ? ((document.getElementById("selections").innerHTML = RES_2selections),
      (document.getElementById("btn_filterCombo").title = RES_2selections),
      (selCombo = "3"))
    : ((document.getElementById("selections").innerHTML = RES_Allselections),
      (document.getElementById("btn_filterCombo").title = RES_Allselections),
      (selCombo = "2"));
  var e = new Array(),
    d = new Array();
  null != g_OddsKeeper_L && (e = g_OddsKeeper_L.getOddsKeeperArray()),
    null != g_OddsKeeper_D && (d = g_OddsKeeper_D.getOddsKeeperArray());
  for (var a in arr_ShowMixParlay) {
    if (arr_ShowMixParlay[a] && null != e[a]) {
      e[a].paintOddsTable();
    }
    if (arr_ShowMixParlay[a] && null != d[a]) {
      d[a].paintOddsTable();
    }
  }
  btnstop(), btnstart();
}
function isFilterCombo(e) {
  return parseInt(selCombo, 10) >= parseInt(e, 10);
}
function getDataByQuarter(e, d, a) {
  for (var _ = [], t = 0; t < e.length; t++)
    e[t][0] == d && e[t][1] == a && -1 == indexOf(_, e[t]) && _.push(e[t]);
  return _;
}
function checkQuarterByMatch(e, d) {
  for (var a = [], _ = 0; _ < e.length; _++)
    e[_][0] == d && -1 == indexOf(a, e[_][1]) && a.push(e[_][1]);
  return a;
}
function getMapName(e) {
  var d = parseInt(e, 10);
  return d - 1 < 0 ? (d = 0) : (d -= 1), RES_Map[d];
}
function combinationExOddsHtml(e) {
  for (var d = "", a = 0; a < e.length; a++) d += e[a];
  return d;
}
function getOddslocation(e) {
  var d = [],
    a = ExOddsFieldLength;
  switch (e) {
    case 1:
      d = ExOddsLocation;
    default:
      (e -= 1),
        (d[0] = ExOddsLocation[0] + e * a),
        (d[1] = ExOddsLocation[1] + e * a),
        (d[2] = ExOddsLocation[2] + e * a),
        (d[3] = ExOddsLocation[3] + e * a),
        (d[4] = ExOddsLocation[4] + e * a);
  }
  return d;
}
function updateAppendFields_Esport(e, d, a, _) {
  for (var t = 0; t < e.length; t++) {
    for (var s = e[t][0], r = a[s]; r < d.length && d[r].MUID == s; )
      (d[r].MoreCount = e[t][1]),
        (d[r].COMBO = e[t][2]),
        (d[r].BestOfMap = e[t][3]),
        (d[r].IsStartingSoon = e[t][4]),
        (d[r].MoveBO3Down = e[t][5]),
        (d[r].OverTimeSession = e[t][6]),
        (d[r].IsMainMarket = e[t][7]),
        r++;
    _[s] = "updateAppend";
  }
}
var CounterHandle_L,
  CounterHandle_D,
  NowTime,
  isIe = !!window.ActiveXObject,
  myspanClass = "EarlyMarket_top_bg",
  CLS_HDP_F = "FavTeamClass",
  CLS_HDP_N = "UdrDogTeamClass",
  CLS_PLAY_RED = "player-red",
  CLS_PLAY_BLUE = "player-blue",
  TR_0 = "bgcpe",
  TR_1 = "bgcpelight",
  g_OddsKeeper_D = null,
  g_OddsKeeper_L = null,
  OddsData = [],
  OddsDataL = [],
  OddsDataObj = [],
  OddsDataLObj = [],
  DisplayMoreObj = new Object(),
  EsportsDisplayMoreObj = new Object(),
  OddsData43 = [],
  OddsData43L = [],
  ExMatchFieldLenth = 4,
  ExOddsFieldLength = 5,
  ExOddsLocation = [4, 5, 6, 7, 8],
  ajaxMainMatchData = [],
  ajaxLeagueList = [],
  ajaxTeamList = [],
  ajaxDisplayCatData = [],
  MatchIndex = [],
  MatchInfo = [],
  ajaxMainMatchDataL = [],
  ajaxLeagueListL = [],
  ajaxTeamListL = [],
  ajaxDisplayCatDataL = [],
  MatchIndexL = [],
  MatchInfoL = [],
  MoreTmplCategory = [],
  MoreTmpSpecialLeague = [],
  MoreTmpSpecialEvent = [],
  MoreOddsTable = [],
  EsportCategoryList = [],
  MatchCategoryList = new Object(),
  day_of_week = 0,
  IsMember = "41" == (fFrame = getParent(window)).SiteId.substr(0, 2),
  fFrame = getParent(window),
  arr_Date_map = new Array(),
  arr_ShowMixParlay_map = new Array();
arr_ShowMixParlay_map[0] = !1;
var arr_ShowMixParlay = new Array();
(arr_ShowMixParlay[1] = !0),
  (arr_ShowMixParlay[2] = !0),
  (arr_ShowMixParlay[32] = 0),
  (arr_ShowMixParlay[3] = 0),
  (arr_ShowMixParlay[4] = !0),
  (arr_ShowMixParlay[5] = !0),
  (arr_ShowMixParlay[6] = !0),
  (arr_ShowMixParlay[7] = 0),
  (arr_ShowMixParlay[8] = 0),
  (arr_ShowMixParlay[9] = !0),
  (arr_ShowMixParlay[10] = 0),
  (arr_ShowMixParlay[11] = 0),
  (arr_ShowMixParlay[12] = 0),
  (arr_ShowMixParlay[13] = 0),
  (arr_ShowMixParlay[14] = !0),
  (arr_ShowMixParlay[15] = 0),
  (arr_ShowMixParlay[16] = !0),
  (arr_ShowMixParlay[17] = 0),
  (arr_ShowMixParlay[18] = 0),
  (arr_ShowMixParlay[19] = 0),
  (arr_ShowMixParlay[20] = 0),
  (arr_ShowMixParlay[21] = 0),
  (arr_ShowMixParlay[22] = 0),
  (arr_ShowMixParlay[23] = 0),
  (arr_ShowMixParlay[24] = !0),
  (arr_ShowMixParlay[25] = 0),
  (arr_ShowMixParlay[26] = 0),
  (arr_ShowMixParlay[27] = 0),
  (arr_ShowMixParlay[28] = 0),
  (arr_ShowMixParlay[29] = 0),
  (arr_ShowMixParlay[30] = 0),
  (arr_ShowMixParlay[31] = 0),
  (arr_ShowMixParlay[33] = 0),
  (arr_ShowMixParlay[34] = 0),
  (arr_ShowMixParlay[35] = 0),
  (arr_ShowMixParlay[36] = 0),
  (arr_ShowMixParlay[37] = 0),
  (arr_ShowMixParlay[38] = 0),
  (arr_ShowMixParlay[39] = 0),
  (arr_ShowMixParlay[40] = 0),
  (arr_ShowMixParlay[41] = 0),
  (arr_ShowMixParlay[42] = 0),
  (arr_ShowMixParlay[43] = 0),
  (arr_ShowMixParlay[44] = !0),
  (arr_ShowMixParlay[47] = 0),
  (arr_ShowMixParlay[48] = 0),
  (arr_ShowMixParlay[49] = 0),
  (arr_ShowMixParlay[50] = 0),
  (arr_ShowMixParlay[51] = 0),
  (arr_ShowMixParlay[52] = 0),
  (arr_ShowMixParlay[53] = 0),
  (arr_ShowMixParlay[54] = 0),
  (arr_ShowMixParlay[55] = 0),
  (arr_ShowMixParlay[56] = 0),
  (arr_ShowMixParlay[99] = 0);
var mydiv,
  mytb,
  myrow,
  PopLauncher,
  synFlag_L = !1,
  synFlag_D = !1,
  nextShowMarket = null,
  selCombo = "3";

//   /*
//  * object.watch polyfill
//  *
//  * 2012-04-03
//  *
//  * By Eli Grey, http://eligrey.com
//  * Public Domain.
//  * NO WARRANTY EXPRESSED OR IMPLIED. USE AT YOUR OWN RISK.
//  */

// // object.watch
// if (!Object.prototype.watch) {
// 	Object.defineProperty(Object.prototype, "watch", {
// 		  enumerable: false
// 		, configurable: true
// 		, writable: false
// 		, value: function (prop, handler) {
// 			var
// 			  oldval = this[prop]
// 			, newval = oldval
// 			, getter = function () {
// 				return newval;
// 			}
// 			, setter = function (val) {
// 				oldval = newval;
// 				return newval = handler.call(this, prop, oldval, val);
// 			}
// 			;
			
// 			if (delete this[prop]) { // can't watch constants
// 				Object.defineProperty(this, prop, {
// 					  get: getter
// 					, set: setter
// 					, enumerable: true
// 					, configurable: true
// 				});
// 			}
// 		}
// 	});
// }

// // object.unwatch
// if (!Object.prototype.unwatch) {
// 	Object.defineProperty(Object.prototype, "unwatch", {
// 		  enumerable: false
// 		, configurable: true
// 		, writable: false
// 		, value: function (prop) {
// 			var val = this[prop];
// 			delete this[prop]; // remove accessors
// 			this[prop] = val;
// 		}
// 	});
// }

// arr_ShowMixParlay_map.watch(0, function (id, oldval, newval) {
//   console.log('o.' + id + ' changed from ' + oldval + ' to ' + newval);
//   return newval;
// });

