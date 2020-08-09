<?
    session_start();
    include 'inc/lang.php';
    include 'inc/rsc.php';
    include 'inc/conn.php';
    include 'inc/function.php';

    $sql="select * from bom_tb_member where m_id='".$_SESSION['m_id']."'";
    $re_m=sql_array($sql);
?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" lang="<?=$lang;?>">
<head>
    <title>
    <?=$app_title;?>
    </title>
<meta charset="utf-8" /><meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" /><meta name="robots" content="noindex" /><meta name="googlebot" content="noindex" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" /><link href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet" /><link href="http://fonts.googleapis.com/css?family=Barlow" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="Images/indexSmart/js/responsiveslides.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css" />
    <script type="text/javascript" src="homesmart.js<?=$cache_js;?>"></script>

    <link rel="stylesheet" href="Images/EN-US/smart/css/generalSmart.css?modified=20180810" />

    <!-- Toastr.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    <script src="js/jsrender/1.0.4/jsrender.min.js"></script>

    <script src="js/jquery-ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="js/jquery-ui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" href="js/jquery-ui/1.12.1/jquery-ui-custom.css">

    <script src="js/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <link rel="stylesheet" href="js/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link rel="stylesheet" href="js/jquery-confirm/3.3.2/jquery-confirm-custom.css<?=$cache_css;?>">

    <script src="js/index.js<?=$cache_js;?>"></script>
    <script src="js/form.js<?=$cache_js;?>"></script>
    <script>
        // meesage
        var LNG_ERROR = '<?=$lang_member[67];?>';
        var LNG_ERROR_PROCESSING = '<?=$lang_member[2339];?>';
        var LNG_SAVE_SUCCESSFULLY = '<?=$lang_member[88];?>';
        var LNG_CLOSE = '<?=$lang_member[612];?>';
        var LNG_PLEASE_FILL_DATA = '<?=$lang_member[439];?>';

        var LNG_SUNDAY = '<?=$lang_member[1242];?>';
        var LNG_MONDAY = '<?=$lang_member[1243];?>';
        var LNG_TUESDAY = '<?=$lang_member[1244];?>';
        var LNG_WEDNESDAY = '<?=$lang_member[1245];?>';
        var LNG_THURSDAY = '<?=$lang_member[1246];?>';
        var LNG_FRIDAY = '<?=$lang_member[1247];?>';
        var LNG_SATURDAY = '<?=$lang_member[1248];?>';

        var LNG_SPORT = '<?=$lang_member[40];?>';
        var LNG_LOTTO = '<?=$lang_member[36];?>';
        var LNG_LOTHUN = '<?=$lang_member[48];?>';
        var LNG_GAMES = '<?=$lang_member[1731];?>';
        var LNG_CASINO = '<?=$lang_member[38];?>';

        var LNG_SUM = '<?=$lang_member[611];?>';

        var LNG_CREDIT_BALANCE = '<?=$lang_member[95];?>';
        var LNG_CASH_BALANCE = '<?=$lang_member[94];?>';
        var LNG_OUTSTANDING = '<?=$lang_member[53];?>';
        var LNG_CREDIT_RECEIVED = '<?=$lang_member[97];?>';

        // const config_maintenance = (<?=json_encode($config_maintenance);?>);
        const bDate = "<?=_bdate();?>";
        var serverTimeNow = new Date(parseInt('<?=strtotime('now');?>')*1000);
    </script>

    <link rel="stylesheet" href="css/theme.css<?=$cache_css;?>">

    <style type="text/css">

        html, form, body {
            margin: 0px;
            width: 100%;
            height: 100%;
            font-family: Barlow;
            color: #d1c57c;
            overflow: auto;
            -webkit-overflow-scrolling: auto
        }

        body {
            background-color: #000;
        }

        @media screen and (orientation: portrait) {
            #show{display:block;}
            #hide{display:none;}

            .header {
                background-image: url(Images/MainSmart/pic/header.jpg?v=10001);
                height: 50px;
                width: 100%;
                display: inline-block;
                position: fixed;
                z-index: 70;
            }

            .h_left {
                width: 50%;
                float: left;
                display:inline-block;
            }

            .h_right {
                float: right;
                display: inline-block;
                font-size: 10px;
                text-align:right;
                vertical-align: middle;
                margin-top: 3px;
                padding-right: 8px;
            }

            .name {
                font-size: 15px;
                font-weight: bold;
            }

            #main {
                padding-top: 55px;
                padding-bottom: 60px;
                position:relative;
            }

            .banner, .mainContent {
                width: 100%;
            }

            #banner-slide {
                padding-left: 5px;
            }

            .content {
                width: 100%;
                height: auto;
                overflow: auto; 
                position: relative;
                padding-top: 5px;
            }

            .c_title {
                position: absolute;
                bottom: 6%;
                width: 100%;
                align-items: center;
                font-size: 10pt;
            }

            .inner-wrapper {
                background: inherit;
                width: 100%;
                padding: 0px 5px;
            }

            .footer {
                width: 100%;
                min-height: 50px;
                position: fixed;
                bottom:0;
                border-top: 1px solid #d1c57c;
                padding: 0px;
                background-image: linear-gradient(#231F20, #000);
            }

            .f_title {
                position: absolute;
                bottom: 3%;
                width: 100%;
                text-align: center;
                font-size: 10pt;
                color: #ffffff;
            }

            .banner-mini {
                display: inline-block; 
                position: relative; 
                width: 32%;
                padding-top: 32%;
            }

            .banner-large {
                display: inline-block; 
                position: relative; 
                width: 98%;
                padding-top: 32%;
            }

            .carousel-indicators li {
              width: 5px;
              height: 5px;
              border-radius: 100%;
            }

            .carousel-indicators {
                margin-bottom: 0px;
            }

            #return-to-top {
                position: fixed;
                bottom: 75px;
                right: 20px;
                background: rgb(0, 0, 0);
                background: rgba(0, 0, 0, 0.7);
                width: 50px;
                height: 50px;
                display: block;
                text-decoration: none;
                -webkit-border-radius: 35px;
                -moz-border-radius: 35px;
                border-radius: 35px;
                display: none;
                -webkit-transition: all 0.3s linear;
                -moz-transition: all 0.3s ease;
                -ms-transition: all 0.3s ease;
                -o-transition: all 0.3s ease;
                transition: all 0.3s ease;
            }
            #return-to-top i {
                color: #fff;
                margin: 0;
                position: relative;
                left: 16px;
                top: 13px;
                font-size: 19px;
                -webkit-transition: all 0.3s ease;
                -moz-transition: all 0.3s ease;
                -ms-transition: all 0.3s ease;
                -o-transition: all 0.3s ease;
                transition: all 0.3s ease;
            }
            #return-to-top:hover {
                background: rgba(0, 0, 0, 0.9);
            }
            #return-to-top:hover i {
                color: #fff;
            }

            /* ---------------------------------------------------
                SIDEBAR STYLE
            ----------------------------------------------------- */
            .wrapper {
                display: block;
            }

            #sidebar {
                width: 230px;
                position: fixed;
                top: 0;
                right: -230px;
                height: 100vh;
                z-index: 999;
                background: #000;
                transition: all 0.3s;
                overflow-y: scroll;
                box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.2);
            }

            #sidebar.active {
                right: 0;
            }

            #dismiss {
                width: 35px;
                height: 35px;
                line-height: 35px;
                text-align: center;
                position: absolute;
                color: #fff;
                top: 10px;
                right: 10px;
                cursor: pointer;
                -webkit-transition: all 0.3s;
                -o-transition: all 0.3s;
                transition: all 0.3s;
            }

            #dismiss:hover {
                color: #7386D5;
            }

            .overlay {
                display: none;
                position: fixed;
                width: 100vw;
                height: 100vh;
                background: rgba(0, 0, 0, 0.7);
                z-index: 998;
                opacity: 0;
                transition: all 0.5s ease-in-out;
            }
            .overlay.active {
                display: block;
                opacity: 1;
            }

            #sidebar .sidebar-header {
                padding: 10px;
                background: #000;
            }

            #sidebar ul.components {
                padding: 20px 0;
            }
            
            #sidebar ul li span {
                padding: 10px;
                font-size: 1.1em;
                display: block;
                color: #d1c57c;
            }

            #sidebar ul li span:hover {
                color: red;
            }

            .dropdown-toggle::after {
                display: block;
                position: absolute;
                top: 50%;
                right: 20px;
                transform: translateY(-50%);
            }

            .list-group-item{
                padding: 0.75rem 0.25rem;
                background-color: #1B1C1E;
                font-size: 13px;
                border: 1px solid #AC9A63;
            }

            .m_left {
                float: left;
            }

            .m_right {
                float: right;
            }

            .nav-item {
                background: url(Images/mainsmart/pic/tab.jpg?v=00004) repeat-x;
                background-size: contain;
            }
            .nav-pills .nav-item.active {
                background: url(Images/mainsmart/pic/tab_active.jpg?v=00004) repeat-x;
                background-size: contain;
                color: white;
                font-weight: bold;
            }
            .nav-pills .nav-link{
                border-radius: 0px;
                color: inherit;
                padding: 2px 10px;
            }

            .flex {
                display: flex;
                justify-content: center;
                padding-top: 10px;
            }

            .flex-item + .flex-item {
                margin-left: 10px;
            }

            .flex-item {
                background: url(Images/mainsmart/pic/tab.jpg?v=00004) repeat-x;
                background-size: contain;
                /*border: 1px #DFC980 solid;*/
                border: 1px #991201 solid;
                padding: 0px 30px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 15px;
                cursor: pointer;
                width: 40%;
            }

            .flex-item.active {
                background: url(Images/mainsmart/pic/tab_active.jpg?v=00004) repeat-x;
                background-size: contain;
                color: white;
            }

            .row_header{
                background: url(Images/mainsmart/pic/tab_active.jpg?v=00004) repeat-x;
                background-size: contain;
                color: #fff;
            }

            .row > .col{
                padding: 1px 0px;
                border: 1px solid #6B6345;
            }


                .col + .col:not(:last-child), .row >.col:first-child {
                    border-right: 0;
                }

            .row + .row > .col {
              border-top: 0;
            }

            a.btnCollapse, a.btnCollapse:active, a.btnCollapse:hover {
                text-decoration: none;
                color: inherit;
                padding: 3px 10px;
                display: inline-block;
                width: 100%;
            }

            a.btnCollapse:before {
                font-family: FontAwesome;
                content: "\f068";
            }

            a.btnCollapse.collapsed:before{
                font-family: FontAwesome;
                content: "\f067";
            }

            .right{
                display:inline-block;
                float:right;
                margin:0;
            }

            .dropdown-menu {
                width: 100%;
            }

            .btn:focus{
                box-shadow:none;
            }

            a.btnCollapse2 {
                text-decoration: none;
                color: inherit;
                padding: 3px 10px;
                display: inline-block;
                width: 100%;
            }

            a.btnCollapse2:before {
                font-family: FontAwesome;
                content: "\f068";
                float: right;
            }

            a.btnCollapse2.collapsed:before{
                font-family: FontAwesome;
                content: "\f067";
                float: right;
            }

            .collapse_title{
                font-size: 10px;
            }

            hr {
              margin-top: 10px;
              margin-bottom: 10px;
              border: 0;
              border-top: 1px solid #d1c57c;
            }

            .Accepted, .Pending {
                color: #74f76d;
            }

            .Error {
                color: #ff002b;
            }

            .form-control, .form-control:hover, .form-control:active, .form-control:link, .form-control:valid {
                background-color: #000;
                border: 0;
                border-bottom: 1px solid #2D291A;
                display: inline-block;
                color: inherit;
            }

            .scrollable-menu {
                height: auto;
                max-height: 400px;
                overflow-x: hidden;
            }

            a.btnCollapse3 {
                text-decoration: none;
                color: inherit;
                display: inline-block;
                width: 100%;
            }

            a.btnCollapse3:before {
                font-family: FontAwesome;
                content: "\f068";
                float: right;
            }

            a.btnCollapse3.collapsed:before{
                font-family: FontAwesome;
                content: "\f067";
                float: right;
            }

            .modal-get-offer .modal-content {
                background: #000;
                color:#d1c57c;
                border: 1px solid #AC9A63;
            }

            .modal-get-offer .modal-content .modal-header {
                text-align:center;
                border: none;
            }

            .close {
                color: white;
            }

            .btnsubmit {
                color: #000;
                background: url(Images/mainsmart/pic/tab_active.jpg?v=00004) repeat-x;
            }

            .Negative {}

            .Hd9 {}
        }

        @media screen and (orientation: landscape) {
            #show {
                display: none;
            }

            #hide {
                height: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 20pt;
            }
        }
    </style>

    <script type="text/javascript">
        var RS_UserName = "ชื่อผู้ใช้";
        var RS_TotalBalance2 = "ยอดรวม แพ้ / ชนะ <br/> (รวมหักยอดเงินที่มีในหมวดอื่นๆ)";
        var RS_SportsbookBalance = "ยอดเงิน กีฬา";
        var RS_Currency = "สกุลเงิน";
        var RS_Credit = "เครดิต";
        var RS_RemainingSportsbookCreditLimit = "ยอดเงินคงเหลือในหน้าหลัก";
        var RS_MinMaxBet = "เดิมพันขั้นต่ำสุด / เดิมพันขั้นสูงสุด";
        var RS_TotalOutstanding = "ยอดเดิมพันที่ค้างอยู่";
        var RS_TabBetList = "รายการ";
        var RS_TabStatement = "ประวัติการเล่น";
        var RS_TabResult = "ผล";
        var RS_Btn_LastWeek = "สัปดาห์ที่แล้ว";
        var RS_Btn_ThisWeek = "สัปดาห์นี้";
        var RS_Stake = "เดิมพัน";
        var RS_WL = "ชนะหรือแพ้";
        var RS_Com = "ค่าคอม";
        var RS_Settled = "การโอนยอด";
        var RS_Balance = "ยอดเงิน";
        var RS_Date2 = "วันที่";
        var RS_Res_FirstHalfScore2 = "ผลการแข่งขันครึ่งแรก";
        var RS_Res_FullTimeScore2 = "ผลจบการแข่งขัน";
        var RS_Winner = "ผู้ชนะ";
        var RS_Soccer = "ฟุตบอล";
        var RS_Soccer_MoreBets = "ฟุตบอล - เดิมพันอื่นๆ";
        var RS_SoccerOutright = "ฟุตบอล - ทายผู้ชนะ";
        var RS_Basketball = "บาสเกตบอล";
        var RS_BasketballOutright = "บาสเกตบอล - ทายผลผู้ชนะ";
        var RS_Baseball = "เบสบอล";
        var RS_BaseballOutright = "เบสบอล - ทายผลผู้ชนะ";
        var RS_Snooker = "สนุกเกอร์";
        var RS_SnookerOutright = "สนุกเกอร์ - ทายผู้ชนะ";
        var RS_Tennis = "เทนนิส";
        var RS_TennisOutright = "เทนนิส - ทายผลผู้ชนะ";
        var RS_USFootball = "อเมริกันฟุตบอล";
        var RS_USFootballOutright = "อเมริกันฟุตบอล-ทายผู้ชนะ";
        var RS_IceHockey = "ฮอกกี้น้ำแข็ง";
        var RS_IceHockeyOutright = "ฮอกกี้น้ำแข็ง-ทายผู้ชนะ";
        var RS_Rugby = "รักบี้";
        var RS_RugbyOutright = "รักบี้-ทายผู้ชนะ";
        var RS_MotorSports = "แข่งรถ";
        var RS_MotorSportsOutright = "กีฬายานยนต์ - ทายผลผู้ชนะ";
        var RS_Golf = "กอล์ฟ";
        var RS_GolfOutright = "กีฬากอล์ฟ - ทายผลผู้ชนะ";
        var RS_Handball = "แฮนด์บอล";
        var RS_HandballOutright = "แฮนด์บอล-ทายผู้ชนะ";
        var RS_Badminton = "แบดมินตัน";
        var RS_BadmintonOutright = "แบดมินตัน - ทายผลผู้ชนะ";
        var RS_BeachSoccer = "ฟุตบอลชายหาด";
        var RS_BeachSoccerOutright = "ฟุตบอลชายหาด - ทายผลผู้ชนะ";
        var RS_Volleyball = "วอลเลย์บอล";
        var RS_VolleyballOutright = "วอลเลย์บอล - ทายผลผู้ชนะ";
        var RS_Boxing = "มวยสากล";
        var RS_Financials = "หุ้น";
        var RS_EntertainmentOutright = "ความบันเทิง - ทายผลผู้ชนะ";
        var RS_Olympic = "โอลิมปิก";
        var RS_OlympicOutright = "โอลิมปิค - ทายผลผู้ชนะ";
        var RS__4DSpecials = "4D Specials";
        var RS__1DGame2 = "1D เกม";
        var RS__2DGame2 = "2D เกม";
        var RS_OtherSports = "กีฬาอื่นๆ";
        var RS_OtherSportsOutright = "กีฬาอื่นๆ - ทายผลผู้ชนะ";
        var RS_MuayThai = "มวยไทย";
        var RS_Btn_Today = "วันนี้";
        var RS_All = "ทั้งหมด";
        var RS_SignedIn = "คุณได้เข้าระบบจากสถานที่อื่น!";
        var RS_NickName2 = "ชื่อเล่น ";
        var RS_Language = "ภาษา";
        var RS_Password = "รหัสผ่าน";
        var RS_Btn_Submit = "ส่งข้อมูล";
        var RS_OldPassword = "รหัสผ่านเก่า";
        var RS_NewPassword = "รหัสผ่านใหม่";
        var RS_ConfirmPassword = "ยืนยันรหัสผ่าน";
        var RS_NickNamealreadyexists = "ชื่อเล่นนี้มีแล้ว";
        var RS_ErrMsg_DELETED = "This User Name or Nick Name had been deleted and cannot be used!";
        var RS_NicknameMustBeAtLeast5Characters = "Nickname Must Be At Least 5 Characters.";
        var RS_Passwordmustnotbeblank = "รหัสผ่านต้องไม่สามารถว่างเปล่า";
        var RS_ConfirmPassworddoesnotmatchthenewpassword = "ยืนยันรหัสผ่านไม่ตรงกับรหัสผ่านใหม่"; 
        var RS_Invalidoldpassword = "รหัสผ่านเก่าไม่ถูกต้อง";
        var RS_NewPasswordCannotBeSameAsOldPassword = "รหัสผ่านใหม่ไม่สามารถเหมือนกับรหัสผ่านเก่า!";
        var RS_InvalidPassword = "Invalid password!";
        var RS_Passwordupdatedsuccessfully = "รหัสผ่านเปลี่ยนแปลงประสบความสำเร็จ";
        var RS_Password_RemarkLength = "รหัสผ่านของท่านต้องประกอบด้วยตัวอักษร 8-15 ตัว";
        var RS_Password_RemarkInclude = "รหัสผ่านของคุณจะต้องมีการรวมกันของตัวอักษรตัวเลขและสัญลักษณ์";
        var RS_Password_RemarkExclude = "ห้ามใช้ชื่อเข้าระบบ ชื่อจริงและนามสกุลเป็นส่วนหนึ่งของรหัสผ่าน";
        var CFG_SingleLoginRefresh = "30";
        var CFG_OnlineRefresh = "180"; 

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
            var servertimestring = (servermode == "server-php") ? '<? print date("F d, Y H:i:s", time())?>' : (servermode == "server-ssi") ? '<!--#config timefmt="%B %d, %Y %H:%M:%S"--><!--#echo var="DATE_LOCAL" -->' : '03/25/2020 15:20:02'
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

        $(document).ready(function () {
            $('#dismiss, .overlay, .components li').on('click', function () {
                // hide sidebar
                $('#sidebar').removeClass('active');
                // hide overlay
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function () {
                // open sidebar
                $('#sidebar').addClass('active');
                // fade in the overlay
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });

            new showLocalTime("timecontainer", "server-asp", 0, "short");

            try {
                $.ajax({
                    type: "POST", url: "pgajax.php"
                    , data: { ACT: "CHKTT2" }
                    , success: function (output) {
                        if (output[0] == "1") {
                            window.open('ClearSetting2.aspx', '_top');
                        }
                        if (output[1] == "1")
                            window.open('MaintenancePg.aspx', '_top');
                    }
                });
            }
            catch (ex) {
                //do nothing
            }

            TimerSL();
            TimerUO();
        });

        function resizeIframe(obj) {
            obj.style.height = 0;
            obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
        }

    </script>
</head>
<body>
    <main>
<div class="aspNetHidden">
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUKLTgxNTIzMjA1NmRkbLhcctGKA5nLttR7e6k6EJ9PDUI=" />
</div>

<div class="aspNetHidden">

    <input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="DF40E925" />
</div>
        <div id="home">
            <div id="show">
                <div class="overlay"></div>
                <div class="header">
                    <div class="h_left ml-2"><img src="Images/logo.png" width="90px" height="46px" /></div>
                    <a class="h_right" href="#" onclick="GetMenu('ACC');" style="color: #d1c57c; text-decoration: none;">
                        <span class="name"><?=$_SESSION['m_user'];?></span> 
                        <br />
                        <span><?=$_SESSION['m_currency'];?> <?=number_format($re_m['m_count'],2);?></span>
                        <!-- <span id="timecontainer"></span> -->
                        </div>
                    </a>
                <div id="main">
                    <? include 'doc/home.php'; ?>
                    
                    
                </div>
                <div class="footer">
                    <div class="thumb-text w-25 h-100 position-absolute m_bd_color" style="background-image: url(Images/MainSmart/pic/icon-home.png?v=10001); background-size: 35% 60%; background-repeat:no-repeat; background-position: top center;" onclick="GetMenu('HOME');">
                        <div class="f_title">หน้าแรก</div>
                    </div>
                    <div class="thumb-text w-25 h-100 position-absolute m_bd_color" style="border-left: 1px solid; left: 51%; background-image: url(Images/MainSmart/pic/icon-cashout.png?v=10001); background-size: 35% 60%; background-repeat:no-repeat; background-position: top center;" onclick="GetMenu('TRANSFER', 1);">
                        <div class="f_title">ฝากถอน</div>
                    </div>
                    <div class="thumb-text w-25 h-100 position-absolute m_bd_color" style="border-left: 1px solid; left: 26%; background-image: url(Images/MainSmart/pic/icon-statement.png?v=10001); background-size: 35% 60%; background-repeat:no-repeat; background-position: top center;" onclick="GetMenu('STATEMENT', 1);">
                        <div class="f_title">ประวัติการเล่น</div>
                    </div>
                    <div id="sidebarCollapse" class="thumb-text w-25 h-100 position-absolute m_bd_color" style="border-left: 1px solid; left: 76%; background-image: url(Images/MainSmart/pic/icon-moreinfo.png?v=10001); background-size: 35% 60%; background-repeat:no-repeat; background-position: top center;">
                        <div class="f_title">อื่นๆ</div>
                    </div>
                </div>

                <div class="wrapper">
                <!-- Sidebar -->
                <nav id="sidebar">

                   <div id="dismiss">
                        <i class="fa fa-times"></i>
                    </div>

                    <div class="sidebar-header">
                        <h3>อื่นๆ</h3>
                    </div>

                     <ul class="list-unstyled components">
                        <li onclick="GetMenu('PASS');">
                            <span style="display:inline-block"><i class="fas fa-unlock-alt" style="width: 35px;"></i>รหัสผ่าน</span>
                        </li>
                        <li onclick="GetMenu('LANG');">
                            <span style="display:inline-block"><i class="fas fa-globe" style="width: 35px;"></i>ภาษา</span>
                        </li>
                        <li onclick="GetMenu('AFF');">
                            <span style="display:inline-block"><i class="fas fa-users" style="width: 35px;"></i>แนะนำเพื่อน</span>
                        </li>
                        <!-- <li onclick="GetMenu('ACC');">
                            <span style="display:inline-block"><i class="fa fa-user-circle" style="width: 35px;"></i>ข้อมูลสมาชิก</span>
                        </li>
                        <li onclick="GetMenu('STATEMENT', 1);">
                            <span style="display:inline-block"><i class="fa fa-newspaper" style="width: 35px;"></i>ประวัติการเล่น</span>
                        </li>
                        <li onclick="GetMenu('RESULT');">
                            <span style="display:inline-block"><i class="fa fa-book" style="width: 35px;"></i>ผล</span>
                        </li>
                        <li onclick="GetMenu('SETTING');">
                            <span style="display:inline-block"><i class="fa fa-cog" style="width: 35px;"></i>ตั้งค่า</span>
                        </li>
                        
                        <li onclick="window.open('Signout.aspx', '_self');">
                            <span style="display:inline-block"><i class="fa fa-power-off" style="width: 35px;"></i>ออกจากระบบ</span>
                        </li> -->
                    </ul>
                </nav>
                </div>
            </div>
            <div id="hide">
                กรุณาหมุนอุปกรณ์ของคุณ
            </div>
        </div>
    </main>

    <!-- loading -->
<div class="m-loader" id="loader">
  <div class="m-loader-wrapper">
    <div class="m-loading"></div>
  </div>
</div>

</body>
</html>
