/**************************************************************** Time Container Function START ****************************************************************/

/***********************************************
* Local Time script- © Dynamic Drive (http://www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit http://www.dynamicdrive.com/ for this script and 100s more.
***********************************************/

var monthstxt = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"]

function showLocalTime(container, servermode, offsetMinutes, displayversion) {
    if (!document.getElementById || !document.getElementById(container)) return
    this.container = document.getElementById(container)
    this.displayversion = displayversion
    var servertimestring = (servermode == "server-php") ? '<? print date("F d, Y H:i:s", time())?>' : (servermode == "server-ssi") ? '<!--#config timefmt="%B %d, %Y %H:%M:%S"--><!--#echo var="DATE_LOCAL" -->' : '<%= Common.GetServerTime().ToString("MM/dd/yyyy HH:mm:ss") %>'
    this.localtime = this.serverdate = new Date(servertimestring)
    this.localtime.setTime(this.serverdate.getTime() + offsetMinutes * 60 * 1000) //add user offset to server time
    this.updateTime()
    this.updateContainer()
}

showLocalTime.prototype.updateTime = function () {
    var thisobj = this
    this.localtime.setSeconds(this.localtime.getSeconds() + 1)
    setTimeout(function () { thisobj.updateTime() }, 1000) //update time every second
}

showLocalTime.prototype.updateContainer = function () {
    var thisobj = this
    if (this.displayversion == "long")
        this.container.innerHTML = this.localtime.toLocaleString()
    else {
        var monthofyear = monthstxt[this.localtime.getMonth()]
        var day = formatField(this.localtime.getDate());
        var year = this.localtime.getFullYear();
        var hour = this.localtime.getHours();
        var ampm = (hour >= 12) ? " PM " : " AM "
        if (hour > 12) {
            hour = hour - 12;
        }
        var minutes = this.localtime.getMinutes()
        var seconds = this.localtime.getSeconds()

        this.container.innerHTML = monthofyear + "-" + day + "-" + year + " " + formatField(hour) + ":" + formatField(minutes) + ampm + " (GMT+8)";
    }
    setTimeout(function () { thisobj.updateContainer() }, 1000) //update container every second
}

function formatField(num, isHour) {
    if (typeof isHour != "undefined") { //if this is the hour field
        var hour = (num > 12) ? num - 12 : num
        return (hour == 0) ? 12 : hour
    }
    return (num <= 9) ? "0" + num : num//if this is minute or sec field
}

/**************************************************************** Time Container Function END ****************************************************************/

function StringBuilder() {
    this.__asBuilder = [];
}
StringBuilder.prototype.clear = function () {
    this.__asBuilder = [];//这种写法要比this.__asBuilder.length = 0稍快,快多少，看数组的长度
}
StringBuilder.prototype.append = function () {
    Array.prototype.push.apply(this.__asBuilder, arguments);//调用Array的push方法，这样调用，使用append,可以传递多个参数
    return this;//这样可以实现append("a").append()的效果
}
StringBuilder.prototype.toString = function () {
    return this.__asBuilder.join("");
}

var isClicked = false;
function PopupCenter(pageURL, title, w, h) {
    if (isClicked) return;

    isClicked = true;
    setTimeout(function () {
        isClicked = false;
    }, 1500);

    var left = (screen.width / 2) - (w / 2);
    var top = (screen.height / 2) - (h / 2);
    var targetWin = window.open(pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
}

var _timerSL = null;
var _timerUO = null;

function TimerSL() {
    if (_timerSL != null)
        clearTimeout(_timerSL);

    _timerSL = setTimeout(function () { ScheduleCheck("CHKTT"); }, CFG_SingleLoginRefresh * 1000);
}

function TimerUO() {
    if (_timerUO != null)
        clearTimeout(_timerUO);

    _timerUO = setTimeout(function () { ScheduleCheck("CHKUO"); }, CFG_OnlineRefresh * 1000);
}

function ScheduleCheck(act) {
    $.ajax({
        type: "POST", url: "pgajax.php"
        , data: { ACT: act }
        , success: function (output) {
            if (act == "CHKTT") {
                //output = $.parseJSON(output);
                if (output[0] == "1") {
                    alert(RS_SignedIn);
                    window.open('ClearSetting.aspx', '_top');
                }
                if (output[1] == "1")
                    window.open('MaintenancePg.aspx', '_top');
            }
        }
    });
    if (act == "CHKTT")
        TimerSL();
    else
        TimerUO();
}

function DrawACC(output) {
    output = output[0];
    var sb = new StringBuilder();

    sb.append("<ul class='list-group' style='width: 92%; margin: auto; padding-top: 10px;'>");
    sb.append("<li class='list-group-item'><span class='m_left'>" + RS_UserName + "</span><span class='m_right'>" + output.UserName + "</span></li>");
    sb.append("<li class='list-group-item'><span class='m_left'>" + RS_Currency + "</span><span class='m_right'>" + output.Currency + "</span></li>");
    sb.append("<li class='list-group-item'><span class='m_left'>" + LNG_CREDIT_BALANCE + "</span><span class='m_right'>" + output.Credit + "</span></li>");
    sb.append("<li class='list-group-item'><span class='m_left'>" + LNG_CASH_BALANCE + "</span><span class='m_right'>" + output.WinCredit + "</span></li>");
    sb.append("<li class='list-group-item'><span class='m_left'>" + LNG_OUTSTANDING + "</span><span class='m_right'>" + output.InCredit + "</span></li>");
    sb.append("<li class='list-group-item'><span class='m_left'>" + LNG_CREDIT_RECEIVED + "</span><span class='m_right'>" + output.ReCredit + "</span></li>");

    // sb.append("<li class='list-group-item'><span class='m_left'>" + RS_Credit + "</span><span class='m_right'>" + output.TotalGivenCredit + "</span></li>");
    // sb.append("<li class='list-group-item'><span class='m_left'>" + RS_TotalBalance2 + "</span><span class='m_right'>" + output.TotalBalance + "</span></li>");
    // sb.append("<li class='list-group-item'><span class='m_left'>" + RS_RemainingSportsbookCreditLimit + "</span><span class='m_right'>" + output.Credit + "</span></li>");
    // sb.append("<li class='list-group-item'><span class='m_left'>" + RS_MinMaxBet + "</span><span class='m_right'>" + output.MinBet + "</span></li>");
    // sb.append("<li class='list-group-item'><span class='m_left'>" + RS_TotalOutstanding + "</span><span class='m_right'>" + output.TotalOutstanding + "</span></li>");
    sb.append("</ul>");

    $("#main").empty().html(sb.toString());
}

function DrawStatement(output) {
    var sb = new StringBuilder();

    sb.append("<nav class='nav nav-pills nav-justified'>");
    // sb.append("<a class='nav-item nav-link' href='#' style='border-right: 1px #DFC980 solid;' onclick=\"GetMenu('STAKE');\">" + RS_TabBetList + "</a>");
    sb.append("<a class='nav-item nav-link active' href='#' style='border-right: 1px #DFC980 solid;'>" + RS_TabStatement + "</a>");
    // sb.append("<a class='nav-item nav-link' href='#' onclick=\"GetMenu('RESULT');\">" + RS_TabResult + "</a>");
    sb.append("</nav>");
    sb.append("<div class='flex'>");
    sb.append("<div id='divStatement_LW' class='flex-item' onclick=\"GetMenu('STATEMENT', 0);\">" + RS_Btn_LastWeek + "</div>");
    sb.append("<div id='divStatement_TW' class='flex-item active' onclick=\"GetMenu('STATEMENT', 1);\">" + RS_Btn_ThisWeek + "</div>");
    sb.append("</div>");
    for (var i = 0; i < output.length; i++)
    {
        sb.append("<ul class='list-group' style='width: 92%; margin: auto; padding-top: 10px;'>");
        sb.append("<li class='list-group-item'>");
        sb.append("<a class='btnCollapse collapsed' data-toggle='collapse' href='#collapse_" + i + "' role='button' aria-expanded='false' aria-controls='collapse_" + i + "'>&nbsp;&nbsp;<span class='left'>" + output[i][1] + "</span></a>");
        sb.append("<div id='collapse_" + i +"' class='collapse multi-collapse container' style='width: 95%;'>");
        sb.append("<div class='row row_header'>");
        sb.append("<div class='col text-center'>" + LNG_SPORT + "</div>");
        sb.append("<div class='col text-center'>" + LNG_LOTTO + "</div>");
        sb.append("<div class='col text-center'>" + LNG_LOTHUN + "</div>");
        sb.append("<div class='col text-center'>" + LNG_GAMES + "</div>");
        sb.append("<div class='col text-center'>" + LNG_CASINO + "</div>");

        sb.append("</div>");
        sb.append("<div class='row'>");
        sb.append("<div class='col text-center'>" + output[i][2] + "</div>");
        sb.append("<div class='col text-center'>" + output[i][3] + "</div>");
        sb.append("<div class='col text-center'>" + output[i][4] + "</div>");
        sb.append("<div class='col text-center'>" + output[i][5] + "</div>");
        sb.append("<div class='col text-center'>" + output[i][6] + "</div>");

        sb.append("</div>");
        sb.append("<span class='right'>" + LNG_SUM + ": " + output[i][7] + "</span>");
        sb.append("</div>");
        sb.append("</li>");
        sb.append("</ul>");
    }

    $("#main").empty().html(sb.toString());
}

function DrawStake(output) {
    //output = output[0];
    var sb = new StringBuilder();

    sb.append("<nav class='nav nav-pills nav-justified'>");
    sb.append("<a class='nav-item nav-link active' href='#' style='border-right: 1px #DFC980 solid;'>" + RS_TabBetList + "</a>");
    sb.append("<a class='nav-item nav-link' href='#' style='border-right: 1px #DFC980 solid;' onclick=\"GetMenu('STATEMENT', 1);\">" + RS_TabStatement + "</a>");
    sb.append("<a class='nav-item nav-link' href='#' onclick=\"GetMenu('RESULT');\">" + RS_TabResult + "</a>");
    sb.append("</nav>");
    for (var i = 0; i < output.length; i++) {
        if (output[i][0] != "-1") {
            sb.append("<ul class='list-group' style='width: 92%; margin: auto; padding-top: 10px;'>");
            sb.append("<li class='list-group-item'>");
            if (output[i][9] != "PAR") {
                sb.append("<div style='display:inline-block; width: 100%;'>");
                sb.append("<div class='left' style='width: 70%;'>");
                sb.append(output[i][1]);
                sb.append("</div>");
                sb.append("<div class='right' style='text-align:right;'>");
                sb.append(output[i][2] + "<br />" + output[i][4]);
                sb.append("</div>");
                sb.append("</div>");
                sb.append("<div style='display:inline-block; width: 100%;'>");
                sb.append("<div class='left'>");
                sb.append(output[i][3]);
                sb.append("</div>");
                sb.append("<div class='right' style='text-align:right;'>");
                sb.append(output[i][5]);
                sb.append("</div>");
                sb.append("</div>");
                sb.append("<div style='background-color: #D1C57D; width: 100%; margin-top: 5px; padding: 10px; color: black;'>");
                sb.append("<div class='left align-middle' style='width: 60%;'>");
                sb.append(RS_Date2 + " : " + output[i][6] + " <br />" + RS_Stake + ": " + output[i][8]);
                sb.append("</div>");
                sb.append("<div class='right align-middle' style='width: 40%;'>");
                sb.append("ID: " + output[i][7]);
                sb.append("</div>");
                sb.append("</div>");
            }
            else {
                sb.append("<div style='display:inline-block; width: 100%;'>");
                sb.append("<div style='text-align:right; width: 100%;'>");
                sb.append("<a class='btnCollapse3 collapsed' data-toggle='collapse' href='#collapse_" + output[i][0] + "' role='button' aria-expanded='false' aria-controls='collapse_" + output[i][0] + "' onclick=\"GetPar('" + output[i][0] + "');\">" + output[i][4] + "&nbsp;&nbsp;</a>");
                sb.append("</div>");
                sb.append("<div id='collapse_" + output[i][0] + "' class='collapse multi-collapse' style='width: 100%;'>");
                sb.append("</div>");
                sb.append("</div>");
                sb.append("<div style='display:inline-block; width: 100%;'>");
                sb.append("<div class='left'>");
                sb.append(output[i][3]);
                sb.append("</div>");
                sb.append("<div class='right' style='text-align:right;'>");
                sb.append(output[i][5]);
                sb.append("</div>");
                sb.append("</div>");
                sb.append("<div style='background-color: #D1C57D; width: 100%; margin-top: 5px; padding: 10px; color: black;'>");
                sb.append("<div class='left align-middle' style='width: 60%;'>");
                sb.append(RS_Date2 + " : " + output[i][6] + " <br />" + RS_Stake + ": " + output[i][8]);
                sb.append("</div>");
                sb.append("<div class='right align-middle' style='width: 40%;'>");
                sb.append("ID: " + output[i][7]);
                sb.append("</div>");
                sb.append("</div>");
            }
            sb.append("</li>");
            sb.append("</ul>");
        }
    }
    //sb.append("<a href='javascript:' id='return-to-top'><i class='icon-chevron-up'></i></a >");
    $("#main").empty().html(sb.toString());
}

function DrawResult(output) {
    var Dates = output[0].Dates;
    var Modules = output[1].Modules;
    var Results = output[2].Results;
    var sb = new StringBuilder();

    sb.append("<nav class='nav nav-pills nav-justified'>");
    sb.append("<a class='nav-item nav-link' href='#' style='border-right: 1px #DFC980 solid;' onclick=\"GetMenu('STAKE');\">" + RS_TabBetList + "</a>");
    sb.append("<a class='nav-item nav-link' href='#' style='border-right: 1px #DFC980 solid;' onclick=\"GetMenu('STATEMENT', 1);\">" + RS_TabStatement + "</a>");
    sb.append("<a class='nav-item nav-link active' href='#'>" + RS_TabResult + "</a>");
    sb.append("</nav>");
    sb.append("<div style='display:inline-block; width: 100%;'>");
    sb.append("<div style='display:inline-block; width: 100%;'>");
    sb.append("<div class='dropdown show left' style='border-bottom: 1px solid #2D291A; width: 60%; '>");
    sb.append("<a class='btn dropdown-toggle' href='#' role='button' id='ddlGType' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' style='color:inherit; width: 100%'>");
    sb.append(RS_Soccer);
    sb.append("</a>");

    sb.append("<ul class='dropdown-menu scrollable-menu' aria-labelledby='ddlGType'>");
    sb.append("<li><a class='dropdown-item' href='#' data-value='S,S,p1,g1'>" + RS_Soccer + "</a></li>");
    sb.append("<li><a class='dropdown-item' href='#' data-value='S,SY,p1,g1'>" + RS_Soccer_MoreBets + "</a></li>");
    sb.append("<li><a class='dropdown-item' href='#' data-value='S,SO,p3,g3'>" + RS_SoccerOutright + "</a></li>");
    sb.append("<li><a class='dropdown-item' href='#' data-value='B,B,p1,g1'>" + RS_Basketball + "</a></li>");
    sb.append("<li><a class='dropdown-item' href='#' data-value='S,BO,p3,g3'>" + RS_BasketballOutright + "</a></li>");
    sb.append("<li><a class='dropdown-item' href='#' data-value='S,BB,p1,g1'>" + RS_Baseball + "</a></li>");
    sb.append("<li><a class='dropdown-item' href='#' data-value='S,BBO,p3,g3'>" + RS_BaseballOutright + "</a></li>");
    sb.append("<li><a class='dropdown-item' href='#' data-value='S,K,p2,g2'>" + RS_Snooker + "</a></li>");
    sb.append("<li><a class='dropdown-item' href='#' data-value='S,KO,p3,g3'>" + RS_SnookerOutright + "</a></li>");
    sb.append("<li><a class='dropdown-item' href='#' data-value='B,T,p2,g2'>" + RS_Tennis + "</a></li>");
    sb.append("<li><a class='dropdown-item' href='#' data-value='B,TO,p3,g3'>" + RS_TennisOutright + "</a></li>");
    sb.append("<li><a class='dropdown-item' href='#' data-value='B,N,p1,g1'>" + RS_USFootball + "</a></li>");
    sb.append("<li><a class='dropdown-item' href='#' data-value='S,NO,p3,g3'>" + RS_USFootballOutright + "</a></li>");
    sb.append("<li><a class='dropdown-item' href='#' data-value='S,H,p1,g1'>" + RS_IceHockey + "</a></li>");
    sb.append("<li><a class='dropdown-item' href='#' data-value='S,HO,p3,g3'>" + RS_IceHockeyOutright + "</a></li>");
    sb.append("<li><a class='dropdown-item' href='#' data-value='B,R,p1,g1'>" + RS_Rugby + "</a></li>");
    sb.append("<li><a class='dropdown-item' href='#' data-value='S,RO,p3,g3'>" + RS_RugbyOutright + "</a></li>");
    sb.append("<li><a class='dropdown-item' href='#' data-value='S,MSH,p2,g2'>" + RS_MotorSports + "</a></li>");
    sb.append("<li><a class='dropdown-item' href='#' data-value='S,MSO,p3,g3'>" + RS_MotorSportsOutright + "</a></li>");
    sb.append("<li><a class='dropdown-item' href='#' data-value='S,G,p2,g2'>" + RS_Golf + "</a></li>");
    sb.append("<li><a class='dropdown-item' href='#' data-value='S,GO,p3,g3'>" + RS_GolfOutright + "</a></li>");
    sb.append("<li><a class='dropdown-item' href='#' data-value='B,HB,p1,g1'>" + RS_Handball + "</a></li>");
    sb.append("<li><a class='dropdown-item' href='#' data-value='S,HBO,p3,g3'>" + RS_HandballOutright + "</a></li>");
    sb.append("<li><a class='dropdown-item' href='#' data-value='B,BD,p2,g2'>" + RS_Badminton + "</a></li>");
    sb.append("<li><a class='dropdown-item' href='#' data-value='B,BDO,p3,g3'>" + RS_BadmintonOutright + "</a></li>");
    sb.append("<li><a class='dropdown-item' href='#' data-value='B,BS,p1,g1'>" + RS_BeachSoccer + "</a></li>");
    sb.append("<li><a class='dropdown-item' href='#' data-value='S,BSO,p3,g3'>" + RS_BeachSoccerOutright + "</a></li>");
    sb.append("<li><a class='dropdown-item' href='#' data-value='S,V,p2,g2'>" + RS_Volleyball + "</a></li>");
    sb.append("<li><a class='dropdown-item' href='#' data-value='S,VO,p3,g3'>" + RS_VolleyballOutright + "</a></li>");
    sb.append("<li><a class='dropdown-item' href='#' data-value='S,X,p2,g2'>" + RS_Boxing + "</a></li>");
    sb.append("<li><a class='dropdown-item' href='#' data-value='S,F,p2,g2'>" + RS_Financials + "</a></li>");
    sb.append("<li><a class='dropdown-item' href='#' data-value='S,NVO,p3,g3'>" + RS_EntertainmentOutright + "</a></li>");
    sb.append("<li><a class='dropdown-item' href='#' data-value='B,OL,p1,g1'>" + RS_Olympic + "</a></li>");
    sb.append("<li><a class='dropdown-item' href='#' data-value='S,OLO,p3,g3'>" + RS_OlympicOutright + "</a></li>");
    sb.append("<li><a class='dropdown-item' href='#' data-value='S,M,p2,g2'>" + RS__4DSpecials + "</a></li>");
    sb.append("<li><a class='dropdown-item' href='#' data-value='1,S,p2,g2'>" + RS__1DGame2 + "</a></li>");
    sb.append("<li><a class='dropdown-item' href='#' data-value='2,S,p2,g2'>" + RS__2DGame2 + "</a></li>");
    sb.append("<li><a class='dropdown-item' href='#' data-value='B,OT,p1,g1'>" + RS_OtherSports + "</a></li>");
    sb.append("<li><a class='dropdown-item' href='#' data-value='B,OTO,p3,g3'>" + RS_OtherSportsOutright + "</a></li>");
    sb.append("<li><a class='dropdown-item' href='#' data-value='S,MT,p2,g2'>" + RS_MuayThai + "</a></li>");
    sb.append("</ul>");

    sb.append("</div>");
    sb.append("<div class='dropdown show right' style='border-bottom: 1px solid #2D291A; width: 35%; '>");
    sb.append("<a class='btn dropdown-toggle' href='#' role='button' id='ddlDates' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' style='color:inherit; width: 100%'>");
    sb.append(RS_Btn_Today);
    sb.append("</a>");
    sb.append("<ul class='dropdown-menu' aria-labelledby='ddlDates'>");
    for (var i = 0; i < Dates.length; i++) {
        sb.append("<li><a class='dropdown-item' href='#' data-value='" + Dates[i][1] + "'>" + Dates[i][0] + "</a></li>");
    }
    sb.append("</ul>");
    sb.append("</div>");

    sb.append("<div style='display:inline-block; width: 100%; margin-top: 5px;'>");
    sb.append("<div id='divModules' class='dropdown show' style='width: 60%; border-bottom: 1px solid #2D291A; width: 100%;'>");
    sb.append(DrawModules(Modules));
    sb.append("</div>");

    sb.append("<div id='divResult'>")
    sb.append(DrawMatch(Results));
    sb.append("</div>");

    sb.append("<input type='hidden' id='gtype' value='S,S,p1,g1' />");
    sb.append("<input type='hidden' id='dates' value='-1' />");
    sb.append("<input type='hidden' id='modules' value='-1' />");

    $("#main").empty().html(sb.toString());
}

function DrawMatch(Results, Games) {
    var sb = new StringBuilder();
    var panel = Games == null ? "p1" : Games[2];
    var grid = Games == null ? "g1" : Games[3];

    if (panel == "p1" && grid == "g1") {
        for (var k = 0; k < Results.length; k++) {
            sb.append("<ul class='list-group' style='width: 95%; margin: auto; padding-top: 10px;'>");
            sb.append("<li class='list-group-item'>");
            sb.append("<a class='btnCollapse2 collapsed' data-toggle='collapse' href='#collapse_" + k + "' role='button' aria-expanded='false' aria-controls='collapse_1'><span class='left' style='font-size: 15px; width: 80%;'>" + Results[k][0] + "</span></a>");
            sb.append("<div id='collapse_" + k + "' class='collapse multi-collapse container' style='width: 100%; '>");
            var Match = Results[k][1];
            for (var m = 0; m < Match.length; m++) {
                if (m > 0)
                    sb.append("<hr />");
                sb.append("<div class='collapse_title'>");
                sb.append(Match[m][1] + "<br />");
                sb.append(Match[m][2]);
                sb.append("</div>");
                sb.append("<div class='container'>");
                sb.append("<div class='row row_header'>");
                sb.append("<div class='col text-center'>");
                sb.append(RS_Res_FirstHalfScore2);
                sb.append("</div>");
                sb.append("<div class='col text-center'>");
                sb.append(RS_Res_FullTimeScore2);
                sb.append("</div>");
                sb.append("</div>");
                sb.append("<div class='row'>");
                sb.append("<div class='col text-center'>");
                sb.append(Match[m][3]);
                sb.append("</div>");
                sb.append("<div class='col text-center'>");
                sb.append(Match[m][4]);
                sb.append("</div>");
                sb.append("</div>");
                sb.append("</div>");
            }
            sb.append("</div>");

            sb.append("</li>");
            sb.append("</ul>");
        }
    }
    else if (panel == "p2" && grid == "g2") {
        for (var k = 0; k < Results.length; k++) {
            sb.append("<ul class='list-group' style='width: 95%; margin: auto; padding-top: 10px;'>");
            sb.append("<li class='list-group-item'>");
            sb.append("<a class='btnCollapse2 collapsed' data-toggle='collapse' href='#collapse_" + k + "' role='button' aria-expanded='false' aria-controls='collapse_1'><span class='left' style='font-size: 15px;'>" + Results[k][0] + "</span></a>");
            sb.append("<div id='collapse_" + k + "' class='collapse multi-collapse container' style='width: 100%; '>");
            var Match = Results[k][1];
            for (var m = 0; m < Match.length; m++) {
                if (m > 0)
                    sb.append("<hr />");
                sb.append("<div class='collapse_title'>");
                sb.append(Match[m][1] + "<br />");
                sb.append(Match[m][2]);
                sb.append("</div>");
                sb.append("<div class='container'>");
                sb.append("<div class='row row_header'>");
                sb.append("<div class='col text-center'>");
                sb.append(RS_TabResult);
                sb.append("</div>");
                sb.append("</div>");
                sb.append("<div class='row'>");
                sb.append("<div class='col text-center'>");
                sb.append(Match[m][3]);
                sb.append("</div>");
                sb.append("</div>");
                sb.append("</div>");
            }
            sb.append("</div>");

            sb.append("</li>");
            sb.append("</ul>");
        }
    }
    else if (panel == "p3" && grid == "g3") {
        for (var k = 0; k < Results.length; k++) {

            sb.append("<ul class='list-group' style='width: 95%; margin: auto; padding-top: 10px;'>");
            sb.append("<li class='list-group-item'>");
            sb.append("<a class='btnCollapse2 collapsed' data-toggle='collapse' href='#collapse_" + k + "' role='button' aria-expanded='false' aria-controls='collapse_1'><span class='left' style='font-size: 15px;'>" + Results[k][1] + "</span></a>");
            sb.append("<div id='collapse_" + k + "' class='collapse multi-collapse container' style='width: 100%; '>");
            sb.append("<div class='collapse_title'>");
            sb.append(Results[k][0]);
            sb.append("</div>");
            sb.append("<div class='container'>");
            sb.append("<div class='row row_header'>");
            sb.append("<div class='col text-center'>");
            sb.append(RS_Winner);
            sb.append("</div>");
            sb.append("</div>");
            sb.append("<div class='row'>");
            sb.append("<div class='col text-center' style='border-right: 1px solid #6B6345;'>");
            sb.append(Results[k][2]);
            sb.append("</div>");
            sb.append("</div>");
            sb.append("</div>");
            sb.append("</div>");

            sb.append("</li>");
            sb.append("</ul>");
        }
    }
    
    return sb.toString();
}

function DrawModules(Modules) {
    var sb = new StringBuilder();

    sb.append("<a class='btn dropdown-toggle' href='#' role='button' id='ddlModules' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' style='color:inherit; width: 100%'>");
    sb.append(RS_All);
    sb.append("</a>");

    sb.append("<ul class='dropdown-menu scrollable-menu' aria-labelledby='ddlModules'>");
    for (var j = 0; j < Modules.length; j++) {
        sb.append("<li><a class='dropdown-item' href='#' data-value='" + Modules[j][1] + "'>" + Modules[j][0] + "</a></li>");
    }
    sb.append("</ul>");

    return sb.toString();
}

function DrawPar(output) {
    var sb = new StringBuilder();
    sb.append("<hr />");
    for (var i = 0; i < output.length; i++) {
        sb.append("<div style='display:inline-block; width: 100%;'>");
        sb.append("<div class='left' style='width: 70%;'>");
        sb.append(output[i][0]);
        sb.append("</div>");
        sb.append("<div class='right' style='text-align:right;'>");
        sb.append(output[i][2]);
        sb.append("</div>");
        sb.append("</div>");
        sb.append("<div style='display:inline-block; width: 100%;'>");
        sb.append("<div class='left'>");
        sb.append(output[i][1]);
        sb.append("</div>");
        sb.append("<div class='right' style='text-align:right;'>");
        sb.append(output[i][3]);
        sb.append("</div>");
        sb.append("</div>");
        sb.append("<hr />");
    }

    return sb.toString();
}

function DrawSetting(output) {
    output = output[0];
    var sb = new StringBuilder();

    sb.append("<ul class='list-group' style='width: 92%; margin: auto; padding-top: 10px;'>");
    sb.append("<li class='list-group-item'><span class='m_left'>" + RS_NickName2 + "</span><span class='m_right'>" + (output.NickName == '' ? "<a href='#GetNickName' role='button' data-toggle='modal' style='color: inherit;'><i class='fa fa-edit' style='width: 35px; cursor: pointer'></i></a>" : output.NickName) + "</span ></li > ");
    sb.append("<li class='list-group-item'><span class='m_left'>" + RS_Password + "</span><span class='m_right'><a href='#GetPassword' role='button' data-toggle='modal' style='color: inherit;'><i data-toggle='modal' data-target='GetPassword' class='fa fa-edit' style='width: 35px;'></i></a></span></li>");
    sb.append("<li class='list-group-item'><span class='m_left'>" + RS_Language + "</span><span class='m_right'>");
    sb.append("<a class='dropdown-toggle' href='#' role='button' id='ddlDates' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false' style='color:inherit; width: 100%; padding-right: 30px; text-decoration: none;'>");
    sb.append(GetLang(output.Preference));
    sb.append("</a>");
    sb.append("<ul class='dropdown-menu dropdown-menu-right' aria-labelledby='ddlDates' style='width: 150px; text-align: center;'>");
    sb.append("<li><a class='dropdown-item' href='HomeSmart.aspx?lang=EN-US'>ENGLISH</a></li>");
    sb.append("<li><a class='dropdown-item' href='HomeSmart.aspx?lang=ZH-CN'>中文</a></li>");
    sb.append("<li><a class='dropdown-item' href='HomeSmart.aspx?lang=EN-GB'>ภาษาไทย</a></li>");
    sb.append("<li><a class='dropdown-item' href='HomeSmart.aspx?lang=EN-IE'>Tiếng Việt</a></li>");
    sb.append("<li><a class='dropdown-item' href='HomeSmart.aspx?lang=EN-AU'>INDONESIAN</a></li>");
    sb.append("<li><a class='dropdown-item' href='HomeSmart.aspx?lang=JA-JP'>日本語</a></li>");
    sb.append("<li><a class='dropdown-item' href='HomeSmart.aspx?lang=EN-TT'>KOREAN</a></li>");
    sb.append("<li><a class='dropdown-item' href='HomeSmart.aspx?lang=ES-PA'>Español</a></li>");
    sb.append("<li><a class='dropdown-item' href='HomeSmart.aspx?lang=EN-PH'>Português</a></li>");
    sb.append("<li><a class='dropdown-item' href='HomeSmart.aspx?lang=EN-JM'>FRENCH</a></li>");
    sb.append("<li><a class='dropdown-item' href='HomeSmart.aspx?lang=EN-BZ'>MYANMAR</a></li>");
    sb.append("<li><a class='dropdown-item' href='HomeSmart.aspx?lang=ES-PR'>LAOS</a></li>");
    sb.append("</ul>");
    sb.append("</ul>");

    //NickName
    sb.append("<div id='GetNickName' class='modal fade modal-get-offer hide' tabindex='-1' role='dialog' aria-hidden='true'>");
    sb.append("<div class='modal-dialog'>");
    sb.append("<div class='modal-content'>");

    sb.append("<div class='modal-header'>");
    sb.append("<h3>" + RS_NickName2 + "</h3>");
    sb.append("<a href='#' class='close' style='line-height: 38px;' data-dismiss='modal'>×</a>");
    sb.append("</div>");

    sb.append("<div class='modal-body'>");
    sb.append("<div class='form'>");
    sb.append("<div class='form-group'>");
    sb.append("<input type='text' class='form-control' name='nickName' id='txtNickName' placeholder='" + RS_NickName2 + "' style='border: 1px solid #2D291A;'>");
    sb.append("<div id='divErrMsg' class='Error' style='display:none; margin-top: 10px;'></div>");
    sb.append("</div>");
    sb.append("<div>");
    sb.append("<input type='button' class='btn btnsubmit' id='btnNickName' value='" + RS_Btn_Submit + "' />");
    sb.append("</div>");
    sb.append("</div>");
    sb.append("</div>");
    sb.append("</div>");
    sb.append("</div>");
    sb.append("</div>");

    //Password
    sb.append("<div id='GetPassword' class='modal fade modal-get-offer hide' tabindex='-1' role='dialog' aria-hidden='true'>");
    sb.append("<div class='modal-dialog'>");
    sb.append("<div class='modal-content'>");

    sb.append("<div class='modal-header'>");
    sb.append("<h3>" + RS_Password + "</h3>");
    sb.append("<a href='#' class='close' style='line-height: 38px;' data-dismiss='modal'>×</a>");
    sb.append("</div>");

    sb.append("<div class='modal-body'>");
    sb.append("<div class='form'>");
    sb.append("<div class='form-group'>");
    sb.append("<input type='password' class='form-control' name='password' id='txtOpw' placeholder='" + RS_OldPassword + "' style='border: 1px solid #2D291A;'>");
    sb.append("<label id='lblErrOpw' class='Error' style='display:none;'>" + RS_Passwordmustnotbeblank +"</label>");
    sb.append("</div>");
    sb.append("<div class='form-group'>");
    sb.append("<input type='password' class='form-control' name='password' id='txtNpw' placeholder='" + RS_NewPassword + "' style='border: 1px solid #2D291A;'>");
    sb.append("<label id='lblErrNpw' class='Error' style='display:none;'>" + RS_Passwordmustnotbeblank +"</label>");
    sb.append("</div>");
    sb.append("<div class='form-group'>");
    sb.append("<input type='password' class='form-control' name='password' id='txtCpw' placeholder='" + RS_ConfirmPassword + "' style='border: 1px solid #2D291A;'>");
    sb.append("<label id='lblErrCpw' class='Error' style='display:none;'>" + RS_Passwordmustnotbeblank +"</label>");
    sb.append("</div>");
    sb.append("<div>");
    sb.append("<input type='button' class='btn btnsubmit' id='btnPassword' value='" + RS_Btn_Submit + "' />");
    sb.append("</div>");
    sb.append("<div>");
    sb.append("<label id='lblErrStatus' class='Error' style='display:none;'>" + RS_InvalidPassword + "</label>");
    sb.append("</div>");
    sb.append("<div class='Error'>");
    sb.append(RS_Password_RemarkLength + "<br />" + RS_Password_RemarkInclude + "<br />" + RS_Password_RemarkExclude);
    sb.append("</div>");
    sb.append("</div>");
    sb.append("</div>");
    sb.append("</div>");
    sb.append("</div>");
    sb.append("</div>");

    $(document).ready(function () {
        $('.modal').on('hidden.bs.modal', function (e) {
            $(this)
                .find("input[type=text],input[type=password]")
                .val('')
                .end();
            $('[id^=divErrMsg]').hide();
        });

        $("#btnNickName").click(function () {
            var nName = $('#txtNickName').val();

            if (nName == "" || nName.length < 5) {
                $('#divErrMsg').show();
                $('#divErrMsg').html(RS_NicknameMustBeAtLeast5Characters);
                return;
            }
            else {
                var js = { NickName: nName };
                $.ajax({
                    type: "POST", url: "pgajax.php"
                    , data: { ACT: "SETNICKNAME", JT: JSON.stringify(js) }
                    , success: function (output) {
                        try {
                            output = JSON.parse(output);
                            output = output[0];
                            if (output.Result != "SUCCESS") {
                                if (output.Result == "EXIST")
                                    $('#divErrMsg').html(RS_NickNamealreadyexists);
                                else if (output.Result == "DELETED")
                                    $('#divErrMsg').html(RS_ErrMsg_DELETED);
                                else if (output.Result == "LENGTH")
                                    $('#divErrMsg').html(RS_NicknameMustBeAtLeast5Characters);
                                else
                                    $('#divErrMsg').html(output.Result);
                                $('#divErrMsg').show();
                            }
                            else {
                                window.open("HomeSmart.aspx", "_self");
                            }
                        }
                        catch (ex) {
                            alert(ex.message);
                        }
                    }
                });
            }
        });

        $("#btnPassword").click(function () {
            $('.modal').on('hidden.bs.modal', function (e) {
                $(this)
                    .find("input[type=text],input[type=password]")
                    .val('')
                    .end();
                $(this)
                    .find("label")
                    .text('')
                    .hide()
                    .end();
                $('[id^=divErrMsg]').hide();
            });

            var opw = $('#txtOpw').val();
            var npw = $('#txtNpw').val();
            var cpw = $('#txtCpw').val();

            if (opw === "" || npw === "" || cpw === "") {
                if (opw === "")
                    $("#lblErrOpw").show();
                if (npw === "")
                    $("#lblErrNpw").show();
                if (cpw === "")
                    $("#lblErrCpw").show();

                return;
            }
            else
            {
                if (npw !== cpw) {
                    $("#lblErrStatus").text(RS_ConfirmPassworddoesnotmatchthenewpassword);
                    $("#lblErrStatus").show();
                    return;
                }

                if (!IsPassFormat(npw, output.UserName)) {
                    $("#lblErrStatus").text(RS_InvalidPassword);
                    $("#lblErrStatus").show();
                    return;
                }

                var js = { OPW: opw, NPW: npw };
                $.ajax({
                    type: "POST", url: "pgajax.php"
                    , data: { ACT: "SETPASSWORD", JT: JSON.stringify(js) }
                    , success: function (output) {
                        try {
                            output = JSON.parse(output);
                            output = output[0];
                            if (output.Result != "SUCCESS") {
                                if (output.Result == "OPNV")
                                    $('#lblErrStatus').text(RS_Invalidoldpassword);
                                else if (output.Result == "SWOP")
                                    $('#lblErrStatus').text(RS_NewPasswordCannotBeSameAsOldPassword);
                                else
                                    $('#lblErrStatus').text(output.Result);
                                $('#lblErrStatus').show();
                            }
                            else {
                                window.open("HomeSmart.aspx","_self");
                            }
                        }
                        catch (ex) {
                            alert(ex.message);
                        }
                    }
                });
            }
        });
    });
    


    $("#main").empty().html(sb.toString());
}

function GetMenu(type, params) {
    var js = {};
    var outputType = "json";
    if (type === "TRANSFER" || type === "PASS" || type === "LANG" || type == "HOME") {
        outputType = "html";
    }
    if (type === "STATEMENT") {
        if (params != null)
            js = { isThisWeek: params };
    }
    else if (type === "TRANSFER") {
        if (params != null)
            js = { page: params };
    }
    addLoadingTask();
    $.ajax({
        type: "POST"
        , url: "pgajax.php"
        , dataType: outputType
        , data: { ACT: type, JT: JSON.stringify(js) }
        , success: function (output) {
            if(outputType == "json"){
                try {
                output = JSON.parse(output);
                }
                catch (ex) {
                    alert(ex.message);
                }
            }
            

            if (type === "STAKE")
                DrawStake(output);
            else if (type === "ACC")
                DrawACC(output);
            else if (type === "STATEMENT") {
                DrawStatement(output);
                if (params == 1) {
                    $("#divStatement_LW").removeClass("active");
                    $("#divStatement_TW").addClass("active");
                }
                else if (params == 0) {
                    $("#divStatement_LW").addClass("active");
                    $("#divStatement_TW").removeClass("active");
                }
            }
            else if (type === "RESULT") {
                DrawResult(output);
                ResultOnC();
            }
            else if (type === "TRANSFER") {
                DrawTransfer(output)
            }
            else if (type === "PASS") {
                DrawPass(output)
            }
            else if (type === "LANG") {
                DrawLang(output)
            }
            else if (type === "HOME") {
                DrawHome(output)
            }
            else if (type === "SETTING") 
                DrawSetting(output);

            subtractLoadingTask();
        }
        , fail: function(){
            subtractLoadingTask();
        }
    });
}

function CHGResult(id) {
    var js = {};
    var ModulesId = $('#modules').val();
    var GameId = $('#gtype').val();
    var Dates = $('#dates').val();
    js = { GType: GameId, Dates: Dates, Modules: ModulesId };
    $.ajax({
        type: "POST", url: "pgajax.php"
        , data: { ACT: "CHG_RESULT", JT: JSON.stringify(js) }
        , success: function (output) {
            try {
                output = JSON.parse(output);
                var Results = output[2].Results;
                var Modules = output[1].Modules;
                var Games = GameId.split(",");
                $("#divResult").html(DrawMatch(Results, Games));
                if (id == "ddlGType" || id == "ddlDates") {
                    $("#divModules").html(DrawModules(Modules));
                    $("#divModules .dropdown-menu li a").click(function () {
                        $(this).parents(".dropdown").find('.btn').html($(this).text());
                        $(this).parents(".dropdown").find('.btn').val($(this).data('value'));
                        $('#modules').val($(this).data('value'));
                        CHGResult("ddlModules");
                    });
                }
            }
            catch (ex) {
                alert(ex.message);
            }
        }
    });
}

function ResultOnC() {
    $(document).ready(function () {
        $(".dropdown-menu li a").click(function () {
            $(this).parents(".dropdown").find('.btn').html($(this).text());
            $(this).parents(".dropdown").find('.btn').val($(this).data('value'));
            var id = $(this).parents(".dropdown").find('.btn').attr('id');
            if (id == "ddlGType") {
                $('#gtype').val($(this).data('value'));
                $('#modules').val("-1");
            }
            else if (id == "ddlDates") {
                $('#dates').val($(this).data('value'));
                $('#modules').val("-1");
            }
            else if (id == "ddlModules") {
                $('#modules').val($(this).data('value'));
            }
            CHGResult(id);
        });
    });
}

function GetPar(id) {
    var isExpanded = $('#collapse_' + id).hasClass("show");
    if (!isExpanded) {
        var js = {};
        js = { SocTransId: id };
        $.ajax({
            type: "POST", url: "pgajax.php"
            , data: { ACT: "GETPAR", JT: JSON.stringify(js) }
            , success: function (output) {
                try {
                    output = JSON.parse(output);
                    $('#collapse_' + id).html(DrawPar(output));
                }
                catch (ex) {
                    //alert(ex.message);
                }
            }
        });
    }
}

function GetLang(lang) {
    if (lang == "EN-US")
        return "ENGLISH";
    else if (lang == "ZH-CN")
        return "中文";
    else if (lang == "EN-GB")
        return "ภาษาไทย";
    else if (lang == "EN-IE")
        return "Tiếng Việt";
    else if (lang == "EN-AU")
        return "INDONESIAN";
    else if (lang == "JA-JP")
        return "日本語";
    else if (lang == "EN-TT")
        return "KOREAN";
    else if (lang == "ES-PA")
        return "Español";
    else if (lang == "EN-PH")
        return "Português";
    else if (lang == "EN-JM")
        return "FRENCH";
    else if (lang == "EN-BZ")
        return "MYANMAR";
    else if (lang == "ES-PR")
        return "LAOS";
    
}

function IsPassFormat(npw, userName) {
    var regPattern = /^(?=.*\d)(?=.*[A-Za-z])(?!.*\s).{8,15}$/;

    if (regPattern.test(npw) && userName.indexOf(npw) == -1)
        return true;

    return false;
}

/// NEW Function 
function submitTrigger(e){
    $(e.form).trigger('submit');
}

function DrawTransfer(output){
    // console.log(output)
    $("#main").empty().html(output);
    DisplayTransfer("TRANSFER");
}

function DisplayTransfer(page){
    if(page == "TRANSFER"){
        $('.nav-page-transfer').addClass('active');
        $('.nav-page-withdraw').removeClass('active');

        $('.s_s.h_transfer').show();
        $('.s_s.h_withdraw').hide();
    }else{
        $('.nav-page-transfer').removeClass('active');
        $('.nav-page-withdraw').addClass('active');

        $('.s_s.h_transfer').hide();
        $('.s_s.h_withdraw').show();
    }
}

function DrawPass(output){
    $("#main").empty().html(output);
}

function DrawLang(output){
    $("#main").empty().html(output);
}

function DrawHome(output){
    $("#main").empty().html(output);
}