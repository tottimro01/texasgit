<?

// @header('Location:  http://www.oho88.com');	


    require_once 'lib/Mobile-Detect/Mobile_Detect.php';
    $detect = new Mobile_Detect;  
    $cache_v = '00001';
    if($_GET["hidSelLang"]!=""){
        $lang = $_GET["hidSelLang"];
    }else{
        if($_COOKIE['lang']!=""){
            $lang = $_COOKIE['lang'];
        }else{
            $lang = "en";
        }
    }
    setcookie('lang', $lang);
    // $lang = $_GET["hidSelLang"]=="" ? "en" : $_GET["hidSelLang"];
 /*   $langList = array(
        "en" => "English",
        "cn" => "简体中文",
        "th" => "ภาษาไทย",
        "vn" => "Tiếng Việt",
        "la" => "ພາສາລາວ",
        "km" => "ភាសាខ្មែរ",
        "mm" => "မြန်မာ",
        "id" => "Indonesian",
        "jp" => "日本語",
        "ko" => "한국어",
    );*/
	 $langList = array(
        "en" => "English",
        "th" => "ภาษาไทย",
        "la" => "ພາສາລາວ"
    );
    $_GET["hidSelLang"]=$langList[$lang];
    if($detect->isMobile() ) {
        header("Location: login_m.php?hidSelLang=".$lang);
        exit(); 
    }
    // ภาษาสำหรับไปเลือกไฟล์รูปภาพ มีแค่ TH หรือ EN //
    // $lang = "en";
    $langImg = $lang;
    if($langImg!="th"&&$langImg!="en"){
        $langImg = "en";
    }
    // ภาษาสำหรับไปเลือกไฟล์รูปภาพ //

    // include 'lang/home_lang.php';
    require("admin_lang/export/lang_member_".$lang.".php");
    require "inc/function.php";

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta name="viewport" content="width=1280" />
    <meta name="description" content="<?=$app_name;?> -The world leading sportsbook offering one of the kind gambling experience in sports, Casino, Games and Horse Racing." />
    <meta name="keywords" content="Online gambling, Handicap, Sports betting, Live casino, RNG KENO, Horse racing" />

    <title><?=$app_title;?></title>
    <link rel="shortcut icon" href="favicon.ico?v=000001" type="image/x-icon">
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
    <style>
    	#frmLogin > fieldset > div,
    	#frmLogin > fieldset > div .formInput{
    		display: inline-block;
    		vertical-align: top;
    	}

    	#frmLogin > fieldset > .txtInput{
    		margin-left: 8px;
    	}
    </style>
    <script>
        if (window.location.protocol == 'https:' && location.href.indexOf('IsSSL') == -1) {
            window.location = location.protocol + "//" + location.host + "/index.php?IsSSL=1";
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
        var unlabel = "<?=$lang_member[128];?>";
        var tmpun = "<?=$lang_member[128];?>";
        var pwlabel = "<?=$lang_member[71];?>";
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
             //   location.href = 'http://m.' + domainName();
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
        var error_username = "<?=$lang_member[2264];?>";
        var error_password = "<?=$lang_member[2264];?>";
        var error_validation = "<?=$lang_member[2293];?>";
        var topFrameTimeOut;

        var i = 0;

        // Change language
        function changeLan(selValue , selText) {
            document.frmChangeLang.hidSelLang.value = selValue;
            document.frmChangeLang.hidSelLangx.value = selText;
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
            document.getElementById('validateCode').src = 'login_code.php?' + i;
        }

        function AutoRefreshHeadPage() {
            //ping("detecResponseTime.php", function (pingResult) { if (pingResult.status == 'success') document.getElementById('detecResTime').value = pingResult.ackTime }, true);
            SetAutoRefreshHeadPage();
        }

        function SetDetecasAnalysis()
        {
       //     document.getElementById('detecas-analysis').value = "js-enabled@" + (new Date()).getTime() ;
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
            //document.getElementById('IsSSL').value = (window.location.protocol == 'https:' ? '1' : '0');
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
            // var objID = document.getElementById('txtID');
            // if (objID.value != unlabel)
            // {
            //     //objID.className = 'text-focus';
            //     //document.getElementById('txtPW').focus();
            //     switchInputObj(1);
            //     document.getElementById('RMME').checked=true;
            // }
            // else
            // {
            //     objID.className = '';
            //     objID.focus();
            // }


            var objID2 = document.getElementById('txtID1');
            var objRMME = document.getElementById('RMME');
            if (objID2.value != "")
            {
                objRMME.checked=true;
            }else{
                objRMME.checked=false;
            }

            // var chk_rem = $("#RMME").val();
            // if()



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

            $(".list_lang").click(function () {
                var text = $(this).html();
                $("#selLanguage").html(text);
                $('.dropdownPanel').toggle('dropdownActive');
                //alert(this.id);
                changeLan(this.id , text);
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

        $(document).on('submit', '#frmLogin', function(event) {
        	event.preventDefault();
        	var $self = this;
        	$($self).find('fieldset').attr('disabled', 'disabled');
        	var fData = {
        		cuser: $($self).find('#txtID1').val(),
        		cpass: $($self).find('#txtPW23').val(),
                clang: $($self).find('#clang').val(),
        	}

        	$.ajax({
        		url: 'check_login.php',
			// url: 'http://13bt.big289.com/check_login.php',
        		type: 'POST',
        		dataType: 'html',
        		data: fData,
        	})
        	.done(function(response){
        		// console.log("success");
          //       console.log(response)
				 $("#token").html(response);
        	})
        	.fail(function(xhr, status, res) {
        		// console.log(xhr, status, res);
                alert('Something went wrong! plaese try again.');
        	})
        	.always(function(){
        		$($self).find('fieldset').removeAttr('disabled');
        	});
        	
        });
    </script>

    <style type="text/css">
        #logoDemo {
            height: 70px;
            width: 210px;
            background: url(/template/sportsbook/public/images/layout/logo_DM.png) no-repeat 30px 7px;
        }


        .products .moreInfo .title
        {
            color: #8b5807;
        }

        .events li
        {
            height: 229px;
        }

        .events li img
        {
            width: 100%;
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
            <span id="token"></span>
            <span id="loadingTxt" style="position: relative;top: 25px;font-size: 18px;float: right;right: 5em;color: white;display:none;">
                Loading, please wait....</span>
            <form id="frmLogin" name="frmLogin" method="post" action="login.php" onkeypress="return fxn(event,'D');" class="loginArea" style="">
                <fieldset>
                <!-- BEGIN  LanOptBlock -->
                <input id="clang" name="clang" type="hidden" value="<?=$lang;?>" />


                <div class="form dropdown" onclick="setDropdownlist();">
                    <div id="selLanguage" class="selected"><?=($_GET["hidSelLang"])?></div>
                        <div class="dropdownPanel" >
                            <? foreach ($langList as $key => $value) { ?>
                            <div class='content list_lang' id="<?=$key?>"><?=$value?></div>
                            <? } ?>
   			   				<!-- <div class='content list_lang' id="en">English</div>
   			   				<div class='content list_lang' id="cn"  >简体中文</div>
   			   				<div class='content list_lang' id="th"  >ภาษาไทย</div>
   			   				<div class='content list_lang' id="vn"  >Tiếng Việt</div>
   			   				<div class='content list_lang' id="la"  >ພາສາລາວ</div>
   			   				<div class='content list_lang' id="km"  >ភាសាខ្មែរ</div>
   			   				<div class='content list_lang' id="mm"  >မြန်မာ</div>
   			   				<div class='content list_lang' id="id"  >Indonesian</div>
   			   				<div class='content list_lang' id="jp"  >日本語</div>
   			   				<div class='content list_lang' id="ko"  >한국어</div> -->
                    </div>
                </div>
                <!-- END LanOptBlock -->
                <div class="txtInput ">
                    <div class="formInput">
                        <!-- <input name="l_user" id="txtID" type="text" class="form" placeholder="ชื่อผู้ใช้" onchange="switchInputObj(2);" onfocus="javascript:setUserNameData(this);" onblur="javascript:checkUserNameData(this);" maxlength="30" value="ชื่อผู้ใช้" /> -->
                        <input name="l_user" id="txtID1" type="text" class="form" placeholder="<?=$lang_member[128];?>"  maxlength="30"  />

                        <label title="Remember Me" class="">
                            <input id="RMME" name="RMME" type="checkbox" value="on" />
                            <div class="checkbox"></div>
                            <?=$lang_member[2294];?>?
                        </label>
                    </div>
                    <div class="formInput">
                        <!-- <input name="l_pass" id="txtPW2" type="password" class="form" onblur="leavePwd();" onchange="syncInputText();" onfocus="this.value='';" onkeyup="syncInputText();" maxlength="12" style="display:none" /> -->
                        <input name="l_pass" id="txtPW23" type="password" class="form" placeholder="<?=$lang_member[73];?>">
                    </div>
                    <div class="formInput">
                        <!-- <input name="txtPW" id="txtPW" type="text" class="form" placeholder="รหัสผ่าน" onfocus="switchInputObj(1);" maxlength="12" value="รหัสผ่าน" /> -->


                    </div>
                    <div class="mark attention">
                        <div class="markInfo">
                            <i>Please login to play</i>
                            <div class="txt"> <a href="/login.php?page=2&lang=th" target="DF_Information"><?=$lang_member[87];?></a> <?=$lang_member[891];?></div>
                        </div>
                    </div>
                </div>

                <!-- <div class="largeBtn" title="LOGIN" onclick="return(callSubmit('','D'));" style="float: none;">เข้าสู่ระบบ</div> -->
                <button type="submit" class="largeBtn" title="LOGIN" style="float: none;"><?=$lang_member[2151];?></button>
                </fieldset>
            </form>
            <script>
          /*      SetDetecasAnalysis();
                !function (e, t, a, c, n) {
                    var s = t.createElement(a),
                        o = t.getElementsByTagName(c)[0];
                    s.async = true, s.defer = true, s.src = n, o.appendChild(s)
                } (window, document, "script", "body", "//sc.detecas.com/di/activator.ashx");
				*/
            </script>
        </div>
        <div class="menu">
            <ul class="content">
                <li class="Login"><?=$lang_member[35];?></li>
                <li class="Login"><?=$lang_member[1363];?></li>
                <li class="Login"><?=$lang_member[1731];?></li>
                <li class="Login"><?=$lang_member[38];?></li>
                <li class="Login"><?=$lang_member[1173];?></li>
                <li class="Login"><?=$lang_member[48];?></li>
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
                        <img src="login/mbc/<?=$langImg;?>/images/index_products_01.png?v=2019082101" alt="sports" />
                        <div id="area1" class="moreInfo" style="width: 540px;">

                            <div class="first" onclick="endEvent(event);" style="width: 50%">
                                <div class="detail">
                                    <img src="img/login/<?=$langImg;?>/f1.png" alt="" style="width: 130px; height: 130px; " />
                                    <div class="title" style="text-align: center; margin-top: 15px;"><?=$lang_member[1403];?></div>
                                </div>
                            </div>
                            <div class="third" onclick="endEvent(event);" style="width: 50%">
                                <div class="detail">
                                    <img src="img/login/<?=$langImg;?>/f2.png" alt="" style="width: 130px; height: 130px; " />
                                    <div class="title" style="text-align: center; margin-top: 15px;"><?=$lang_member[766];?></div>
                                </div>
                            </div>
                        </div>

                    </li>
                    <li class="name virtual-sports" onclick="OpenProducts(event, 'area2');">
                        <img src="login/mbc/<?=$langImg;?>/images/index_products_02.png?v=2019082101" alt="virtual sports" />
                        <div id="area2" class="moreInfo" style="width: 540px;">
                            <div class="first" onclick="endEvent(event);" style="width: 50%">
                                <div class="detail">
                                    <img src="img/login/<?=$langImg;?>/m1.png" alt="" style="width: 130px; height: 130px; " />
                                    <div class="title" style="text-align: center; margin-top: 15px;"><?=$lang_member[747];?></div>
                                </div>
                            </div>
                            <div class="third" onclick="endEvent(event);" style="width: 50%">
                                <div class="detail">
                                    <img src="img/login/<?=$langImg;?>/m2.png" alt="" style="width: 130px; height: 130px; " />
                                    <div class="title" style="text-align: center; margin-top: 15px;"><?=$lang_member[1363];?></div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="name gaming" onclick="OpenProducts(event, 'area3');">
                        <img src="login/mbc/<?=$langImg;?>/images/index_products_03.png?v=2019082101" alt="gaming" />
                        <div id="area3" class="moreInfo">
                            <div class="first" onclick="endEvent(event);">
                                <!-- <div class="title" title="คาสิโน">สล็อต</div> -->
                                <div class="detail">
                                    <img src="img/login/<?=$langImg;?>/slot99.png" alt="" style="width: 130px; height: 130px; " />
                                    <div class="title" style="text-align: center; margin-top: 15px;"><?=$lang_member[341];?></div>
                                </div>
                            </div>
                            <div class="second" onclick="endEvent(event);">
                                <!-- <div class="title" title="คาสิโน ออนไลน์">น้ำเต้า ปู ปลา</div> -->
                                <div class="detail">
                                    <img src="img/login/<?=$langImg;?>/sdd.png" alt="" style="width: 130px; height: 130px; " />
                                    <div class="title" style="text-align: center; margin-top: 15px;"><?=$lang_member[340];?></div>

                                </div>
                            </div>                            
                        </div>
                    </li>
                    <li class="name keno" onclick="OpenProducts(event, 'area4');">
                        <img src="login/mbc/<?=$langImg;?>/images/index_products_04.png?v=2019082101" alt="keno" />
                        <div id="area4" class="moreInfo">
                            <div class="first" onclick="endEvent(event);">
                                 <div class="detail">
                                    <img src="img/login/<?=$langImg;?>/bacarat.png" alt="" style="width: 130px; height: 130px; " />
                                    <div class="title" style="text-align: center; margin-top: 15px;"><?=$lang_member[355];?></div>
                                </div>
                            </div>
                            <div class="second" onclick="endEvent(event);">
                               <!--  <div class="detail">
                                    <img src="img/sdd.png" alt="" style="width: 130px; height: 130px; " />
                                    <div class="title" style="text-align: center; margin-top: 15px;">รูเล็ตออนไลน์</div>

                                </div> -->
                            </div>
                            <div class="third" onclick="endEvent(event);">
                                <div class="detail">
                                    <img src="img/login/<?=$langImg;?>/TG.png" alt="" style="width: 130px; height: 130px; " />
                                    <div class="title" style="text-align: center; margin-top: 15px;"><?=$lang_member[1215];?> <?=$lang_member[1216];?></div>

                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="name turbo" onclick="OpenProducts(event, 'area5');">
                        <img src="login/mbc/<?=$langImg;?>/images/index_products_05.png?v=2019082101" alt="turbo unmber game" />
                        <div id="area5" class="moreInfo " style="width: 540px;">
                            <div class="first" onclick="endEvent(event);" style="width: 50%">
                                <div class="detail">
                                    <img src="img/login/<?=$langImg;?>/l1.png" alt="" style="width: 130px; height: 130px; " />
                                    <div class="title" style="text-align: center; margin-top: 15px;"><?=$lang_member[580];?></div>
                                </div>
                            
                            </div>
                            <div class="third" onclick="endEvent(event);" style="width: 50%">
                                <div class="detail">
                                    <img src="img/login/<?=$langImg;?>/lh2.png" alt="" style="width: 130px; height: 130px; " />
                                    <div class="title" style="text-align: center; margin-top: 15px;"><?=$lang_member[2295];?></div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="name e-sports" onclick="OpenProducts(event, 'area6');">
                        <img src="login/mbc/<?=$langImg;?>/images/index_products_06.png?v=2019082101" alt="e-sports" />
                        <div id="area6" class="moreInfo " style="width: 540px;">
                            <div class="first" onclick="endEvent(event);" style="width: 50%">
                              
                                <div class="detail">
                                    <img src="img/login/<?=$langImg;?>/l1.png" alt="" style="width: 130px; height: 130px; " />
                                    <div class="title" style="text-align: center; margin-top: 15px;"><?=$lang_member[580];?></div>
                                </div>
                            </div>
                            <div class="second" onclick="endEvent(event);" style="width: 50%">
                               <div class="detail">
                                    <img src="img/login/<?=$langImg;?>/lh1.png" alt="" style="width: 130px; height: 130px; " />
                                    <div class="title" style="text-align: center; margin-top: 15px;"><?=$lang_member[2295];?></div>
                                </div>
                            </div>
                           <!--  <div class="third" onclick="endEvent(event);">
                              <div class="detail static" style="text-align: left; padding: 20px;font-size: 13px;">
                                    <div class="heading">- สูตรคำนวนหวย</div>
                                </div>
                            </div> -->
                        </div>
                    </li>
                </ul>
            </div>

            <div class="events popupPanel">
                <div class="heading-default">
                    <div class="text" ><?=$lang_member[2296];?></div>
                </div>
                <div id="EventsPop" class="EventsPop contentArea">
                    <ul id="EventList" class="list" onMouseOver="EventStop(event);" onMouseOut="EventStart(event);">

                    </ul>
                </div>
            </div>
            <div class="newProducts popupPanel">
                <div class="heading-default">
                    <div class="text" > <?=$lang_member[2297];?> </div>
                </div>
                <div class="contentArea">
                    <ul class="list">
                        <li id="newProducts1" class="feature current">
                            <img src="login/mbc/<?=$langImg;?>/images/banners/Second_Combo_Parlay_01.jpg?v=<?=$cache_v;?>" />
                            <div class="info">
                                <div class="title"><?=$lang_member[799];?></div>
                                <div class="detail">
                                    <ul>
                                        <li><?=$lang_member[2298];?></li>
                                        <li><?=$lang_member[2299];?></li>
                                    </ul>
                                </div>
                                <a class="more Login"><?=$lang_member[2306];?>...</a>
                            </div>
                        </li>
                        <li id="newProducts3" class="feature">
                            <img src="login/mbc/<?=$langImg;?>/images/banners/Second_PH_AIO_03.jpg?v=<?=$cache_v;?>" />
                            <div class="info">
                                <div class="title"><?=$lang_member[767];?></div>
                                <div class="detail">
                                    <ul>
                                        <li><?=$lang_member[2300];?></li>
                                        <li><?=$lang_member[2301];?></li>
                                    </ul>
                                </div>
                                <a class="more Login"><?=$lang_member[2306];?>...</a>
                            </div>
                        </li>
                        <li id="newProducts4" class="feature">
                            <img src="login/mbc/<?=$langImg;?>/images/banners/Second_casino_04.jpg?v=<?=$cache_v;?>" />
                            <div class="info">
                                <div class="title"><?=$lang_member[2302];?> </div>
                                <div class="detail">
                                    <ul>
                                        <li><?=$lang_member[2303];?></li>
                                        <li><?=$lang_member[2304];?></li>
                                        <li><?=$lang_member[2305];?></li>
                                    </ul>
                                </div>
                                <a class="more Login"><?=$lang_member[2306];?>...</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="contact">
                <div class="socialMedia">
                    <?=$lang_member[2307];?>:
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
                <li><a href="/login.php?page=1&lang=th" target="DF_Information"> <?=$lang_member[2308];?></a></li>
                <li><a href="/login.php?page=2&lang=th" target="DF_Information"> <?=$lang_member[87];?></a></li>
                <li><a href="/login.php?page=3&lang=th" target="DF_Information"> <?=$lang_member[2309];?></a></li>
                <li><a href="/login.php?page=6&lang=th" target="DF_Information"> <?=$lang_member[2310];?> </a></li>
                <li><a href="/login.php?page=10&lang=th" target="DF_Information"><?=$lang_member[2311];?></a></li>
                <li><a href="/login.php?page=8&lang=th" target="DF_Information"> <?=$lang_member[2312];?></a></li>
                <li><a href="/login.php?page=9&lang=th" target="DF_Information"> <?=$lang_member[2313];?></a></li>
            </ul>
            <span class="mobileSwitch"><?=$lang_member[2314];?>:
                <a href="javascript:window.location.href='http://m.'+domainName();" target="_parent"><?=$lang_member[2315];?></a>
                <!-- |
                <a href="javascript:window.location.href='LoginTablet.php'" target="_parent">Tablet</a>
                | Desktop -->
            </span>
            <div class="copyright">©Copyright 2019. <?=$app_name;?>. All Rights Reserved.</div>
        </footer>
    </main>
    <form id="frmChangeLang" name="frmChangeLang" method="get" action="login.php">
        <input id="hidSelLang" name="hidSelLang" type="hidden" />
        <input id="hidSelLangx" name="hidSelLangx" type="hidden" />
        <input type=hidden name=hidIsLogin value="<?=$_GET["hidSelLang"]?>" />
    </form>
    <script>

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
            Lang: '<?=$langImg;?>',
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
        data: { Lang: '<?=$lang;?>' },
        success: function (data) {
            if (data != "" && data != null) {
                $("#EventsPop").replaceWith(data);
            }
        }
    });
</script>