
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta name="viewport" content="width=1280" />
    <meta name="description" content="MAXBET -The world leading sportsbook offering one of the kind gambling experience in sports, Casino, Games and Horse Racing." />
    <meta name="keywords" content="Online gambling, Handicap, Sports betting, Live casino, RNG KENO, Horse racing" />

    <title>MAXBET | World leading sportsbook. Best odds offers.</title>
    <link rel="shortcut icon" href="login/mbc/common/images/favicon.ico?v=201810110554" type="image/x-icon">
    <link href="login/mbc/common/css/beforeLogin.css?v=201905160231" type="text/css" rel="stylesheet" />
    
    <link href="template/maxbet/public/css/jquery.colorbox/appDownload.css?v=201501300449" rel="stylesheet" type="text/css" />

    <script language="JavaScript" type="text/javascript" src="commJS/jquery.min.js?v=201206260354"></script>
    <script language="JavaScript" type="text/javascript" src="commJS/jquery.colorbox-min.js"></script>

    <!--[if lt IE 9]>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <![endif]-->
    <script language="JavaScript" type="text/javascript" src="commJS/jquery.slides.min.js?v=2019082101"></script>
    <script language="JavaScript" type="text/javascript" src="commJS/jquery-ui.min.js?v=201810260807"></script>
    <script language="JavaScript" type="text/javascript" src="commJS/jquery.easing.min.js?v=201612290816"></script>
    <script language="JavaScript" type="text/javascript" src="commJS/jquery.easy-ticker.js?v=201612290816"></script>
    <script language="JavaScript" type="text/javascript" src="commJS/jquery.collapser.min.js?v=201612290816"></script>
    <script language="JavaScript" type="text/javascript" src="commJS/ping.js?v=201301020620"></script>
    <script language="JavaScript" type="text/javascript" src="commJS/common.js?v=201608161133"></script>
    <script language="JavaScript" type="text/javascript" src="commJS/Auth.js?v=201806262252"></script>
    <script language="JavaScript" type="text/javascript" src="commJS/jquery.time-to.js?v=201805030759"></script>
    <script>
        if (window.location.protocol == 'https:' && location.href.indexOf('IsSSL') == -1) {
            window.location = location.protocol + "//" + location.host + "/Default.aspx?IsSSL=1";
        }
        $(function () {
            $('#slides').slides({
                effect: 'fade',
                play: 5000,
                pause: 2500,
                hoverPause: true,
                generateNextPrev: false,
                crossfade: true
            });
            $('#slides2').slides({
                effect: 'slide',
                play: 7000,
                pause: 2500,
                hoverPause: true,
                generateNextPrev: true,
                pagination: false
            });
            switch ($("#EventList").children('li').length) {
                case 1:
                    $("#" + $("#EventList").children('li')[0].id).addClass("current");
                    $("#EventBack").hide();
                    break;
                case 4:
                    $('.EventsPop').easyTicker({
                        direction: 'up',
                        easing: 'swing',
                        speed: 'slow',
                        interval: 5000,
                        visible: 3,
                        height: 327,
                        mousePause: 0,
                        controls: {
                            toggle: '.btnToggle'
                        }
                    });
                    break;
                default:
                    $('.EventsPop').easyTicker({
                        direction: 'up',
                        easing: 'swing',
                        speed: 'slow',
                        interval: 3000,
                        visible: 3,
                        height: 327,
                        mousePause: 0,
                        controls: {
                            toggle: '.btnToggle'
                        }
                    });
                    break;
            }
        });
    </script>
    <script type="text/javascript">
        var EnableIPadStyle = true;
        var IsSmartPhone = false;
        var IsIphone = false;
        var userAgent = navigator.userAgent.toLowerCase();
        var FromMode = getUrlParameter('fromMode');
        var unlabel = "ชื่อผู้ใช้";
        var tmpun = "ชื่อผู้ใช้";
        var pwlabel = "รหัสผ่าน";
        var EnableRandomLogin = false;
        var loginTimeOut;
        var RandomMin =2;
        var RandomMax =10;
        if (FromMode == null) {

            if (userAgent.indexOf('iphone') != -1) {
                IsIphone = true;
            }
            if (userAgent.indexOf('android') != -1 && userAgent.indexOf('mobile') != -1) {
                IsSmartPhone = true;
            }
            if (IsIphone || IsSmartPhone) {
                location.href = 'http://m.' + domainName();
            }
            //if (IsSmartPhone) {
            //    location.href = 'http://iphone.maxbetwap.com';
            //}
        }


        function getUrlParameter(parameterName) {
            var strQuery = location.search.substring(1);

            var paramName = parameterName + "=";

            if (strQuery.length > 0) {
                begin = strQuery.indexOf(paramName);

                if (begin != -1) {
                    begin += paramName.length;


                    end = strQuery.indexOf("&", begin);
                    if (end == -1) end = strQuery.length

                    return unescape(strQuery.substring(begin, end));
                }
                return "null";
            }
        }

        function domainName() {
            var dotIndex = location.hostname.indexOf(".");
            var domainname = location.hostname.substring(dotIndex + 1);
            return domainname;

        }

        if (window.location.host.split(".").length == 2) {
            window.location = "http://www." + window.location.host + "/";
        }
        var error_username = "กรุณากรอกชื่อในการเข้าระบบ";
        var error_password = "กรุณากรอกรหัสในการเข้าระบบ";
        var error_validation = "กรุณากรอกหมายเลขตรวจสอบ";
        var topFrameTimeOut;

        var i = 0;

        // Change language
        function changeLan(selValue) {
            document.frmChangeLang.hidSelLang.value = selValue;
            document.frmChangeLang.hidIsLogin.value = "no";
            document.frmChangeLang.submit();
        }

        function loadTopNews() {
            var showmsg = document.getElementById("Hotnews");
            showmsg.innerHTML = TopNews_Data.pubmsg;
        }

        function refreshTopNewsData() {
            var frmTopNewsData = document.getElementById('frmTopNewsData');
            frmTopNewsData.submit();
        }

        function reloadValidatecode() {
            i++;
            document.getElementById('validateCode').src = 'login_code.aspx?' + i;
        }

        function AutoRefreshHeadPage() {
            //ping("detecResponseTime.aspx", function (pingResult) { if (pingResult.status == 'success') document.getElementById('detecResTime').value = pingResult.ackTime }, true);
            SetAutoRefreshHeadPage();
        }

        function SetDetecasAnalysis()
        {
            document.getElementById('detecas-analysis').value = "js-enabled@" + (new Date()).getTime() ;
        }

        function SetAutoRefreshHeadPage() {
            if (topFrameTimeOut != null && typeof topFrameTimeOut != 'undefined') {
                clearTimeout(topFrameTimeOut);
                topFrameTimeOut = null;
            }
            topFrameTimeOut = window.setTimeout("AutoRefreshHeadPage()", 30000);
        }

        function ShowMobileLink() {
            var userAgent = navigator.userAgent.toLowerCase();

            if (userAgent.indexOf('iphone') != -1 || userAgent.indexOf('ipad') != -1) {
                document.getElementById('Mobilelink').style.display = 'inline-block';
            }
        }

        $(document).ready(function () {
            

            //SetDetecasAnalysis();
            document.getElementById('IsSSL').value = (window.location.protocol == 'https:' ? '1' : '0');
            // social icon
            $(".socialBar a.more").live("mouseover", function () {
                var socialmenuTimer = setTimeout(function () {
                    $(".popupW").stop(true, true).fadeOut();
                }, 3000);
                $(".popupW").stop(true, true).fadeIn().hover(function () {
                    clearTimeout(socialmenuTimer);
                }, function () {
                    $(this).fadeOut();
                });
            });
            $(".popWClose").live("click", function () {
                $(".popupW").fadeOut();
            });
            // langMenu for iPad
            // is Pad
            if (CheckIsIpad()) {
                $("html").addClass("isPad");

                /*$(".langMenu li").click(function () {
                    changeLan($(this).attr("lang"));
                }).last().addClass("last");*/
            }

            /*popup appDownload */
            /*var title = "ดาวน์โหลด App", menus = '';
            $(".downloadApp a").each(function (i) {
                $(this).data("index", i);
                menus += "<li><a>MAXBET+ (Android)</a></li>";
            });
            appMenu = "<div class='textTitle'>" + title + "</div><ul class='appMenu'>" + menus + "</ul>";
            $appDownload = $(".downloadApp a").colorbox({
                returnFocus: false,
                preloading: false,
                rel: "nofollow",
                title: appMenu,
                onComplete: function () {
                    // add img map
                    if($(this).data("index") == 0){
                        $("#cboxLoadedContent").find("img").attr("usemap", "#AppDownloadMapAndroid");
                    }
                    $("ul.appMenu li").eq($(this).data("index")).addClass("selected");
                }
            });
            $("ul.appMenu li").live("click", function () {
                $(this).addClass("selected").siblings(this).removeClass("selected");
                $appDownload.eq($(this).index()).click();
            });*/

            

            });

        function setUserNameData(object)
        {
            if(object.value == unlabel){
                object.value='';
                object.className = 'form';
            }else{
                object.value=tmpun;
            }
        }
        function checkUserNameData(object)
        {
            if (object.value==''){
                object.value=unlabel;
                object.className = 'form';
            }else{
                tmpun = object.value;
                object.className = 'form';
            }
        }
        /*function checkPWData(object)
        {
            if (object.value=='')
            {
                object.value=pwlabel;
                object.type='text';
            }
        }*/
        function setFocus()
        {
            var objID = document.getElementById('txtID');
            if (objID.value != unlabel)
            {
                //objID.className = 'text-focus';
                //document.getElementById('txtPW').focus();
                switchInputObj(1);
                document.getElementById('RMME').checked=true;
            }
            else
            {
                objID.className = '';
                objID.focus();
            }
        }
        /*function setPWDXXX(){
           var obj = document.getElementById('txtPW');
           if(obj == null) {return;}
           if(obj.value != pwlabel){
               obj.type = 'password';
           }
        }*/
        function setDropdownlist(){
            if ($('.form.dropdown').hasClass('dropdownActive'))
                $('.form.dropdown').removeClass('dropdownActive');
            else
                $('.form.dropdown').addClass('dropdownActive');
            //$(".dropdown .dropdownPanel").show();
        }
        function syncInputText(){
            var elem = $("#txtPW");
            var elem2 = $("#txtPW2");
            elem.hide();
            elem2.show();
            elem.val(elem2.val());
        }
        function leavePwd(){
            if($("#txtPW2").val()==''){
                switchInputObj(2);
            }
        }
        function switchInputObj(type){
            var elem = null;
            switch(type){
                case 1:
                    $("#txtPW").hide();
                    elem = $("#txtPW2");
                    elem.show();
                    elem.focus();
                    break;
                case 2:
                    $("#txtPW2").hide();
                    elem = $("#txtPW");
                    elem.val(pwlabel);
                    elem.show();
                    break;
                default:
                    break;
            }
        }

        var ddList = [];

        function OpenProducts(e, area) {
            if ($("#" + area).css("display") == 'none') {
                ddList.forEach(function(dd) {
                    if ($("#" + dd).css("display") == 'block') {
                        $("#" + dd).css('display', 'none');
                    }
                });
                ddList = [];

                $('#' + area).toggle("fade", {}, 500);
                ddList.push(area);
                var src=e.currentTarget;
                var callback=function(e) {

                    if (e.currentTarget==src)
                    {
                        $(document).one("click", callback);
                    }
                    else{
                        if ($("#" + area).css("display") == 'block') {
                            $("#" + area).css('display', 'none');
                        }
                    }

                };
                $(document).one("click", callback);
                e.stopPropagation();
            } else {
                $("#" + area).css('display', 'none');
            }
        }

        function EventStop()
        {
            if ($('#btnToggle').hasClass('et-run'))
            {
                $('#btnToggle').click();
            }
        }

        function EventStart()
        {
            var hasOpen = false;
            for (var i = 0; i < $("#EventList").children('li').length; i++) {
                if ($("#"+$("#EventList li")[i].id).hasClass('current'))
                //if ($("#event" + i).hasClass('current'))
                {
                    hasOpen = true;
                    break;
                }
            }
            if (hasOpen)
            {
                return;
            }
            else
            {
                if (!$('#btnToggle').hasClass('et-run'))
                {
                    $('#btnToggle').click();
                }
            }
        }

        function EventOpen(e, id)
        {
            for (var i = 0; i < $("#EventList").children('li').length; i++) {
                //$("#event" + i).removeClass('current');
                //$("#event" + i).addClass('close');
                $("#"+$("#EventList li")[i].id).removeClass('current');
                $("#"+$("#EventList li")[i].id).addClass('close');
            }
            $('#' + id).addClass('current');
            $('#' + id).removeClass('close');
        }

        function EventClose(e)
        {
            for (var i = 0; i < $("#EventList").children('li').length; i++) {
                //$("#event" + i).removeClass('current');
                //$("#event" + i).removeClass('close');
                $("#"+$("#EventList li")[i].id).removeClass('current');
                $("#"+$("#EventList li")[i].id).removeClass('close');
            }

            if (typeof e != "undefined") {
                var evn = e || window.event;
                if (typeof evn != "undefined" && evn != null) {
                    if (typeof evn.cancelBubble != "undefined")
                        evn.cancelBubble = true;
                    else
                        evn.cancel = true;
                    if (evn.stopPropagation) evn.stopPropagation();
                }
            }
        }

        function endEvent(e)
        {
            if (typeof e != "undefined") {
                var evn = e || window.event;
                if (typeof evn != "undefined" && evn != null) {
                    if (typeof evn.cancelBubble != "undefined")
                        evn.cancelBubble = true;
                    else
                        evn.cancel = true;
                    if (evn.stopPropagation) evn.stopPropagation();
                }
            }
        }

        function closeLoginAttention(e)
        {
            switch(e.target.className)
                {
                    case 'Login':
                    case 'more Login':
                    case 'btnToggle':
                    case 'btn Login':                   
                        break;
                    default:
                        if ($('.txtInput').hasClass('attention'))
                        {
                            clearTimeout(_LoginAttention);
                            $('.txtInput').removeClass('attention');
                        }
                        break;
                }
        }
    </script>
    <!--  dropdown show/hide for demo  -->
    <script type="text/javascript">
        $(document).ready(function () {
            /*$(".dropdown > div").click(function () {
            $(".dropdown div").toggle();
            });*/
            
            if(EnableRandomLogin)
            {
                $("#frmLogin").hide();
                $("#loadingTxt").show();
                //$("#overlay1").show();
                //$("#overlay2").show();
                var logintime =Math.ceil(Math.random()*(RandomMax-RandomMin+1)+RandomMin-1) * 1000;             
                if (loginTimeOut != null && typeof loginTimeOut != 'undefined') {
                    clearTimeout(loginTimeOut);
                    loginTimeOut = null;
                }               
                loginTimeOut = window.setTimeout(function(){
                    //$("#overlay1").hide();
                    //$("#overlay2").hide();
                    $("#loadingTxt").hide();
                    $("#frmLogin").show();
                }, logintime);
            }
            
            switch( $("body").attr('Lang'))
            {
                case "zhcn":
                case "cs":
                    //$("#weltitle").html('嗨! 您好!');
                    //$("#welload").html('正在载入...');
                    $("#loadingTxt").html('载入中，请稍待…');
                    
                    break;
                case "ch":
                    //$("#weltitle").html('嗨! 歡迎!');
                    //$("#welload").html('載入中...');
                    $("#loadingTxt").html('載入中，請稍待…');
                    break;
                case "vn":
                    //$("#weltitle").html('Xin Chào!');
                    //$("#welload").html('đang tải...');
                    $("#loadingTxt").html('đang tải, vui lòng đợi...');
                    break;
            }
            
            $("\x69\x6e\x70\x75\x74\x5b\x6e\x61\x6d\x65\x5e\x3d\x27\x6c\x6c\x71\x27\x5d")['\x76\x61\x6c']( window["\x70\x61\x72\x73\x65\x49\x6e\x74"]($("\x69\x6e\x70\x75\x74\x5b\x6e\x61\x6d\x65\x5e\x3d\x27\x70\x70\x27\x5d")['\x76\x61\x6c']())+window["\x70\x61\x72\x73\x65\x49\x6e\x74"]($("\x69\x6e\x70\x75\x74\x5b\x6e\x61\x6d\x65\x5e\x3d\x27\x6b\x31\x27\x5d")['\x76\x61\x6c']()));

            $(".form.dropdown div div").click(function () {
                var text = $(this).html();
                $("#selLanguage").html(text);
                $('.dropdownPanel').toggle('dropdownActive');
                //alert(this.id);
                changeLan(this.id);
            });

            $(document).bind('click', function (e) {
                var $clicked = $(e.target);
                if (!$clicked.parents().hasClass("dropdown"))
                    $('.form.dropdown').removeClass('dropdownActive');
            });

            $("#txtPW").val(pwlabel);
        });
        $(window).load(function () {
            $(".newProducts .feature .info").click(function () {
                for (var i = 0; i < 5; i++) {
                    $("#newProducts" + i).removeClass('current');
                }

                $(this).parent().toggleClass("current");
            })
        });

    </script>

    <style type="text/css">
        #logoDemo {
            height: 70px;
            width: 210px;
            background: url(/template/sportsbook/public/images/layout/logo_DM.png) no-repeat 30px 7px;
        }
    </style>
</head>

<body class="default " lang="th" onload="setFocus();SetAutoRefreshHeadPage();ShowMobileLink();" onclick="closeLoginAttention(event);">
    <div id="overlay1" class="overlay" style="display:none"></div>
    <div id="overlay2" class="popupPanel-welcome" style="display:none">
        <div id="weltitle" class="title">Hi There, Welcome!</div>
        <div class="loading">
            <div class="bounceball"></div>
            <div id="welload" class="text">Now Loading...</div>
        </div>
    </div>
    
    
    <header>
        <div class="content">
            <div class="logo"></div>
            <span id="loadingTxt" style="position: relative;top: 25px;font-size: 18px;float: right;right: 5em;color: white;display:none;">
                Loading, please wait....</span>
            <form id="frmLogin" name="frmLogin" method="post" action="ProcessLogin.aspx" onkeypress="return fxn(event,'D');" class="loginArea" style="">
                
                <!-- BEGIN  LanOptBlock -->
                <div class="form dropdown" onclick="setDropdownlist();">
                    <div id="selLanguage" class="selected">ภาษาไทย</div>
                    <div class="dropdownPanel">
                        <div class='content' id='en'>English</div>
<div class='content' id='ch'>繁體中文</div>
<div class='content' id='cs'>简体中文</div>
<div class='content' id='zhcn'>简体中文(新)</div>
<div class='content' id='jp'>日本語</div>
<div class='content' id='ko'>한국어</div>
<div class='content' id='th'>ภาษาไทย</div>
<div class='content' id='vn'>Tiếng Việt</div>
<div class='content' id='id'>Indonesian</div>

                    </div>
                </div>
                <!-- END LanOptBlock -->
                <div class="txtInput ">
                    <div class="formInput">
                        <input name="txtID" id="txtID" type="text" class="form" placeholder="ชื่อผู้ใช้" onchange="switchInputObj(2);" onfocus="javascript:setUserNameData(this);" onblur="javascript:checkUserNameData(this);" maxlength="30" value="ชื่อผู้ใช้" />
                        <label title="Remember Me" class="">
                            <input id="RMME" name="RMME" type="checkbox" value="on" />
                            <div class="checkbox"></div>
                            จดจำฉัน?
                        </label>
                    </div>
                    <div class="formInput">
                        <input name="txtPW2" id="txtPW2" type="password" class="form" onblur="leavePwd();" onchange="syncInputText();" onfocus="this.value='';" onkeyup="syncInputText();" maxlength="12" style="display:none" />
                    </div>
                    <div class="formInput">
                        <input name="txtPW" id="txtPW" type="text" class="form" placeholder="รหัสผ่าน" onfocus="switchInputObj(1);" maxlength="12" value="รหัสผ่าน" />
                        <div id="txtDisplay" style="display:none">
                            <span class="titleInput">รหัสยืนยัน</span>
                            <input id="txtCode" name="txtCode" maxlength="5" value="6929" />
                        </div>
                        
                        <input type="hidden" id="hidKey" name="hidKey" value="" />
                        <input type="hidden" id="hidLowerCasePW" name="hidLowerCasePW" value="" />
                        <input type="hidden" id="IEVerison" name="IEVerison" value="0" />
                        <input name="pp71" type="hidden" value="47" />
<input name="k181" type="hidden" value="95" />
<input name="llq68" type="hidden" value="" />

                        <input type="hidden" name="hidServerKey" value="mekon88.com" />
                        <input type="hidden" id="detecResTime" name="detecResTime" value="" />
                        <input id="detecas-analysis" type="hidden" name="detecas-analysis" value="{}" />
                        <input name="__tk" type="hidden" id="__tk" value="25af27ec101e1e442c81c7f1f10f09c651ce2d6f51" runat="server" />
                        <input id="IsSSL" name="IsSSL" type="hidden" value="0" />
                        <input id="PF" name="PF" type="hidden" value="Default" />
                    </div>
                    <div class="mark attention">
                        <div class="markInfo">
                            <i>Please login to play</i>
                            <div class="txt">Or <a href="/index_info.aspx?page=2&lang=th" target="DF_Information">เปิดบัญชี</a> ตอนนี้</div>
                        </div>
                    </div>
                </div>

                <div class="largeBtn" title="LOGIN" onclick="return(callSubmit('','D'));">เข้าสู่ระบบ</div>
            </form>
            <script>
                SetDetecasAnalysis();
                !function (e, t, a, c, n) {
                    var s = t.createElement(a),
                        o = t.getElementsByTagName(c)[0];
                    s.async = true, s.defer = true, s.src = n, o.appendChild(s)
                } (window, document, "script", "body", "//sc.detecas.com/di/activator.ashx");
            </script>
        </div>
        <div class="menu">
            <ul class="content">
                <li class="Login">กีฬา</li>
                <li class="Login">หมวดเกมส์จำลอง</li>
                <li class="Login">อีสปอร์ต</li>
                <li class="Login">เกมหมายเลข</li>
                <li class="Login">เกมส์</li>
                <li class="Login">คีโน</li>
            </ul>
        </div>
    </header>
    <div class="mainPm">
        <div id="slides">
            <div id="BigBanner" class="slides-container">

            </div>
        </div>
    </div>
    <main>
        <div class="mainContent">
            <div class="mobileVersion slides">
                <div id="slides2">
                    <div id="SmallBanner" class="slides-container" style="width:340px; height:207px;">

                    </div>
                </div>
            </div>

            <div class="products">
                <ul>
                    <li class="name sports" onclick="OpenProducts(event, 'area1');">
                        <img src="login/mbc/th/images/index_products_01.png?v=2019082101" alt="sports" />
                        <div id="area1" class="moreInfo">
                            <div class="first" onclick="endEvent(event);">
                                <div class="title" title="Hot Sports">Hot Sports</div>
                                <div class="detail">
                                    <ul class="hot-sports">
                                        <li><img src="login/mbc/common/images/beforeLogin/images/hotSports_01.png?v=2019082101" alt="ฟุตบอล" /><span title="ฟุตบอล">ฟุตบอล</span></li>
                                        <li><img src="login/mbc/common/images/beforeLogin/images/hotSports_02.png?v=2019082101" alt="บาสเก็ตบอล" /><span title="บาสเก็ตบอล">บาสเก็ตบอล</span></li>
                                        <li><img src="login/mbc/common/images/beforeLogin/images/hotSports_03.png?v=2019082101" alt="เทนนิส" /><span title="เทนนิส">เทนนิส</span></li>
                                        <li><img src="login/mbc/common/images/beforeLogin/images/hotSports_04.png?v=2019082101" alt="เบสบอล" /><span title="เบสบอล">เบสบอล</span></li>
                                        <li><img src="login/mbc/common/images/beforeLogin/images/hotSports_05.png?v=2019082101" alt="สนุกเกอร์ และ พูล" /><span title="สนุกเกอร์ และ พูล">สนุกเกอร์ และ พูล</span></li>
                                        <li><img src="login/mbc/common/images/beforeLogin/images/hotSports_06.png?v=2019082101" alt="แบตมินตัน" /><span title="แบตมินตัน">แบตมินตัน</span></li>
                                    </ul>
                                    <div class="more Login">more...</div>
                                </div>
                            </div>
                            <div class="second" onclick="endEvent(event);">
                                <div class="title" title="การดูภาพการแข่งขันสดผ่านเวปไซค์">การดูภาพการแข่งขันสดผ่านเวปไซค์</div>
                                <div class="detail static">
                                    <div class="heading">Watch and bet every day</div>
                                </div>
                            </div>
                            <div class="third" onclick="endEvent(event);">
                                <div class="title" title="Numerous Ways to Bet">Numerous Ways to Bet</div>
                                <div class="detail left static">
                                    <div class="heading">Many bet type and odds</div>
                                    <ul>
                                        <li title="แฮนดิแคป & มากกว่า/น้อยกว่า">แฮนดิแคป & มากกว่า/น้อยกว่า</li>
                                        <li title="HT / FT Odd/Even">HT / FT Odd/Even</li>
                                        <li title="เต็มเวลา  & ครึ่งแรก ราคาพูล">เต็มเวลา  & ครึ่งแรก ราคาพูล</li>
                                        <li title="ประตูแรก/ ประตูสุดท้าย">ประตูแรก/ ประตูสุดท้าย</li>
                                        <li title="ทายผลสกอร์">ทายผลสกอร์</li>
                                        <li title="เอาท์ไรท์">เอาท์ไรท์</li>
                                        <li title="คี่/คู่">คี่/คู่</li>
                                        <li title="บอลชุด">บอลชุด</li>
                                        <li title="จำนวนรวมของประตู">จำนวนรวมของประตู</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </li>
                    <li class="name virtual-sports" onclick="OpenProducts(event, 'area2');">
                        <img src="login/mbc/th/images/index_products_02.png?v=2019082101" alt="virtual sports" />
                        <div id="area2" class="moreInfo">
                            <div class="first" onclick="endEvent(event);">
                                <div class="title" title="Hot Sports">Hot Sports</div>
                                <div class="detail">
                                    <ul class="hot-sports">
                                        <li><img src="login/mbc/common/images/beforeLogin/images/hotVSports_01.png?v=2019082101" alt="ฟุตบอล" /><span title="ฟุตบอล">ฟุตบอล</span></li>
                                        <li><img src="login/mbc/common/images/beforeLogin/images/hotVSports_02.png?v=2019082101" alt="ม้าแข่ง" /><span title="ม้าแข่ง">ม้าแข่ง</span></li>
                                        <li><img src="login/mbc/common/images/beforeLogin/images/hotVSports_03.png?v=2019082101" alt="แข่งขันสุนัข" /><span title="แข่งขันสุนัข">แข่งขันสุนัข</span></li>
                                        <li><img src="login/mbc/common/images/beforeLogin/images/hotVSports_04.png?v=2019082101" alt="Speedway" /><span title="Speedway">Speedway</span></li>
                                        <li><img src="login/mbc/common/images/beforeLogin/images/hotVSports_05.png?v=2019082101" alt="Motosports" /><span title="Motosports">Motosports</span></li>
                                        <li><img src="login/mbc/common/images/beforeLogin/images/hotVSports_06.png?v=2019082101" alt="กีฬาขี่จักรยาน" /><span title="กีฬาขี่จักรยาน">กีฬาขี่จักรยาน</span></li>
                                    </ul>
                                    <div class="more Login">more...</div>
                                </div>
                            </div>
                            <div class="second" onclick="endEvent(event);">
                                <div class="title" title="Quick game">Quick game</div>
                                <div class="detail left static">
                                    <div class="heading" title="1 GAME EVERY 3 MINS">1 GAME EVERY 3 MINS</div>
                                    <div class="txt" title="Bet Faster. Win Faster.">Bet Faster. Win Faster.</div>
                                </div>
                            </div>
                            <div class="third" onclick="endEvent(event);">
                                <div class="title" title="Open Every Day">Open Every Day</div>
                                <div class="detail"></div>
                            </div>
                        </div>
                    </li>
                    <li class="name gaming" onclick="OpenProducts(event, 'area3');">
                        <img src="login/mbc/th/images/index_products_03.png?v=2019082101" alt="gaming" />
                        <div id="area3" class="moreInfo">
                            <div class="first" onclick="endEvent(event);">
                                <div class="title" title="คาสิโน">คาสิโน</div>
                                <div class="detail">
                                    <div class="heading">More Than 100+<br />Games to Play!</div>
                                </div>
                            </div>
                            <div class="second" onclick="endEvent(event);">
                                <div class="title" title="คาสิโน ออนไลน์">คาสิโน ออนไลน์</div>
                                <div class="detail">
                                    <div class="heading" title="MOST REALISTIC EXPERIENCE!">MOST REALISTIC EXPERIENCE!<div class="txt" title="Come and experience our Live Casino now!">Come and experience our Live Casino now!</div></div>

                                </div>
                            </div>                            
                        </div>
                    </li>
                    <li class="name keno" onclick="OpenProducts(event, 'area4');">
                        <img src="login/mbc/th/images/index_products_04.png?v=2019082101" alt="keno" />
                        <div id="area4" class="moreInfo">
                            <div class="first" onclick="endEvent(event);">
                                <div class="title" title="Max Keno 2">Max Keno 2</div>
                                <div class="detail left">
                                    <div class="heading">
                                        <div class="check" title="A Fast Winning Opportunity">A Fast Winning Opportunity</div>
                                        <div class="check" title="24x7 NON-STOP">24x7 NON-STOP</div>
                                    </div>
                                </div>
                            </div>
                            <div class="second" onclick="endEvent(event);">
                                <div class="title" title="ONLY ON MAXBET">ONLY ON MAXBET</div>
                                <div class="detail">
                                    <div class="heading" title="more than 12+ RNG keno served on Maxbet">more than 12+ RNG keno served on Maxbet</div>
                                </div>
                            </div>
                            <div class="third" onclick="endEvent(event);">
                                <div class="title" title="Fast Game Ever">Fast Game Ever</div>
                                <div class="detail">
                                    <div class="btn Login" title="Bet Now">Bet Now</div>
                                    <div class="heading" title="EVERY 45 SECS">EVERY 45 SECS</div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="name turbo" onclick="OpenProducts(event, 'area5');">
                        <img src="login/mbc/th/images/index_products_05.png?v=2019082101" alt="turbo unmber game" />
                        <div id="area5" class="moreInfo ">
                            <div class="first" onclick="endEvent(event);">
                                <div class="title" title="No Time to Hesitate">No Time to Hesitate</div>
                                <div class="detail">
                                    <div class="heading">
                                        <div class="txt" title="Turbo Number Game">Turbo Number Game</div>
                                        1 GAME EVERY 60 SECS
                                    </div>
                                </div>
                            </div>
                            <div class="second" onclick="endEvent(event);">
                                <div class="title" title="INDULGED IN AFFECTION">INDULGED IN AFFECTION</div>
                                <div class="detail">
                                    <div class="heading" title="DANCING GIRLS ! PARTY TIME !">DANCING GIRLS ! PARTY TIME !</div>
                                </div>
                            </div>
                            <div class="third" onclick="endEvent(event);">
                                <div class="title" title="การดูภาพการแข่งขันสดผ่านเวปไซค์">การดูภาพการแข่งขันสดผ่านเวปไซค์</div>
                                <div class="detail static left">
                                    <div class="heading" title="FOR ALL PLATFORMS!">FOR ALL PLATFORMS!</div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="name e-sports" onclick="OpenProducts(event, 'area6');">
                        <img src="login/mbc/th/images/index_products_06.png?v=2019082101" alt="e-sports" />
                        <div id="area6" class="moreInfo ">
                            <div class="first" onclick="endEvent(event);">
                                <div class="title" title="Available Games">Available Games</div>
                                <div class="detail">
                                    <div class="heading">
                                        <table>
                                            <tr>
                                                <td title="DOTA 2">DOTA 2</td>
                                                <td title="League of Legends">League of Legends</td>
                                            </tr>
                                            <tr>
                                                <td title="cs:go">cs:go</td>
                                                <td title="StarCraft II">StarCraft II</td>
                                            </tr>
                                            <tr>
                                                <td title="OVERWATCH" colspan="2">OVERWATCH</td>
                                            </tr>
                                        </table>
                                    </div>


                                </div>
                            </div>
                            <div class="second" onclick="endEvent(event);">
                                <div class="title" title="Upcoming Tournaments">Upcoming Tournaments</div>
                                <div class="detail static left">
                                    <div class="heading" title="Do not miss any games">Do not miss any games</div>
                                    <div class="btn Login" title="Bet Now">Bet Now</div>
                                    <table>
                                        <thead>
                                            <tr>
                                                <td title="Game">Game</td>
                                                <td title="Tournament">Tournament</td>
                                                <td title="Start Date">Start Date</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>LOL</td>
                                                <td>2017 LCK Spring</td>
                                                <td>02/02/2017</td>
                                            </tr>
                                            <tr>
                                                <td>LOL</td>
                                                <td>2017 EU LCS Spring</td>
                                                <td>02/02/2017</td>
                                            </tr>
                                           <tr>
                                                <td> </td>
                                                <td> </td>
                                                <td> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="third" onclick="endEvent(event);">
                                <div class="title" title="E-sports Growth">E-sports Growth</div>
                                <div class="detail">
                                    <div class="heading">HAVE A HEAD START NOW</div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="events popupPanel">
                <div class="heading-default">
                    <div class="text" title="Events">Events</div>
                </div>
                <div id="EventsPop" class="EventsPop contentArea">
                    <ul id="EventList" class="list" onMouseOver="EventStop(event);" onMouseOut="EventStart(event);">

                    </ul>
                </div>
            </div>
            <div class="newProducts popupPanel">
                <div class="heading-default">
                    <div class="text" title="New Products & Features">New Products & Features</div>
                </div>
                <div class="contentArea">
                    <ul class="list">
                        <li id="newProducts1" class="feature current">
                            <img src="login/mbc/th/images/banners/Second_Combo_Parlay_01.jpg?v=2019082101" />
                            <div class="info">
                                <div class="title">สเตป</div>
                                <div class="detail">
                                    <ul>
                                        <li>Select at least two games placed as one wager.</li>
                                        <li>You can combine different sports in one parlay.</li>
                                        <li>Mix Parlay will be offer every day.</li>
                                    </ul>
                                </div>
                                <a class="more Login">more...</a>
                            </div>
                        </li>
                        <li id="newProducts3" class="feature">
                            <img src="login/mbc/th/images/banners/Second_PH_AIO_03.jpg?v=2019082101" />
                            <div class="info">
                                <div class="title">Numerous Ways to Bet</div>
                                <div class="detail">
                                    <ul>
                                        <li>New bet types available.</li>
                                        <li>Select home and away score by your prediction.</li>
                                        <li>Select the correct range of goal at fulltime and halftime.</li>
                                    </ul>
                                </div>
                                <a class="more Login">more...</a>
                            </div>
                        </li>
                        <li id="newProducts4" class="feature">
                            <img src="login/mbc/th/images/banners/Second_casino_04.jpg?v=2019082101" />
                            <div class="info">
                                <div class="title">New Casino Lobby </div>
                                <div class="detail">
                                    <ul>
                                        <li>More than 20 new slot games.</li>
                                        <li>You can free to drag the lobby size by responsive web design.</li>
                                        <li>Records of your game journey in personalize setting.</li>
                                    </ul>
                                </div>
                                <a class="more Login">more...</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="contact">
                <div class="socialMedia">
                    Contact us (Login required) via:
                    <div class="Letstalk" title="Letstalk"></div>
                    <div class="liveChat" title="Livechat"></div>
                    <div class="skype" title="Skype"></div>
                    <div class="qq" title="QQ"></div>
                    <div class="whatsApp" title="WhatsApp"></div>
                    <div class="lineApp" title="Line"></div>
                    <div class="weChat" title="WeChat"></div>
                </div>
            </div>
        </div>
        <footer>
            <ul class="nav">
                <li><a href="/index_info.aspx?page=1&lang=th" target="DF_Information">เกี่ยวกับเรา</a></li>
                <li><a href="/index_info.aspx?page=2&lang=th" target="DF_Information">เปิดบัญชี</a></li>
                <li><a href="/index_info.aspx?page=3&lang=th" target="DF_Information">บัญชี</a></li>
                <li><a href="/index_info.aspx?page=6&lang=th" target="DF_Information">คำถามคำตอบที่พบบ่อย </a></li>
                <li><a href="/index_info.aspx?page=10&lang=th" target="DF_Information">เงี่อนไขบังคับใช้</a></li>
                <li><a href="/index_info.aspx?page=8&lang=th" target="DF_Information">นโยบายของบริษัท</a></li>
                <li><a href="/index_info.aspx?page=9&lang=th" target="DF_Information">การรับผิดชอบของการเล่นพนัน</a></li>
            </ul>
            <span class="mobileSwitch">View:
                <a href="javascript:window.location.href='http://m.'+domainName();" target="_parent">Mobile</a>
                <!-- |
                <a href="javascript:window.location.href='LoginTablet.aspx'" target="_parent">Tablet</a>
                | Desktop -->
            </span>
            <div class="copyright">©Copyright 2019. MAXBET. All Rights Reserved.</div>
        </footer>
    </main>
    <form id="frmChangeLang" name="frmChangeLang" method="post" action="ChangeLanguage.aspx">
        <input id="hidSelLang" name="hidSelLang" type="hidden" />
        <input type=hidden name=hidIsLogin value="no" />
    </form>
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date(); a = s.createElement(o),
                m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-43138830-1', 'maxbet.com');
        ga('send', 'pageview');
        if (location.href.indexOf('IsSSL') != -1) {
            ga('send', 'event', 'protocol', 'SSL', '1');
        }
        var _LoginAttention = null;

        $('.Login').click(function () {
            if (!$('.txtInput').hasClass('attention')) {
                $('.txtInput').addClass('attention');
            }
            else {
                clearTimeout(_LoginAttention);
            }
            _LoginAttention = setTimeout(function () {
                $('.txtInput').removeClass('attention');
            }, 5000);
        });

        //function hideLoginAttention(timeoutvalue) {

        //    if (!_LoginAttention) {
        //        _LoginAttention = setTimeout(function () {
        //            if ($('.txtInput').hasClass('attention')) {
        //                $('.txtInput').removeClass('attention');
        //            }
        //        }, timeoutvalue);
        //        _LoginAttention = null;
        //    }
        //}

    </script>
    <a id="btnToggle" href="#" class="btnToggle" />
</body>

</html>
<script>
    $.ajax({
        url: "getBeforeLoginBannerSetting.php",
        async: false,
        cache: false,
        type: "GET",
        dataType: "json",
        data: {
            Lang: 'th',
            platform: 'd'
        },
        success: function (data) {
            if (data != "" && data != null) {
                if (typeof (data.FullBanner) != "undefined") {
                    var FullBanner = "";
                    for (var i = 0; i < data.FullBanner.length; i++) {
                        FullBanner = FullBanner + "<a style='background-image: url(" + data.FullBanner[i] + ")'></a>";
                    }
                    $("#BigBanner").html(FullBanner);
                }
                if (typeof (data.RightSmallBanner) != "undefined") {
                    var RightSmallBanner = "";
                    for (var i = 0; i < data.RightSmallBanner.length; i++) {
                        RightSmallBanner = RightSmallBanner + "<a><img src='" + data.RightSmallBanner[i] + "' /></a>";
                    }
                    $("#SmallBanner").html(RightSmallBanner);
                }
            }
        }
    });
    $.ajax({
        url: "getBeforeLoginContent.php",
        async: false,
        cache: false,
        type: "GET",
        dataType: "text",
        data: { Lang: 'th' },
        success: function (data) {
            if (data != "" && data != null) {
                $("#EventsPop").replaceWith(data);
            }
        }
    });
</script>