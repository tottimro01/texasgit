
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Outright</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="template/maxbet/public/css/table_w.css" rel="stylesheet" type="text/css" />
<link href="template/maxbet/public/css/button.css" rel="stylesheet" type="text/css" />
<link href="template/maxbet/public/css/oddsFamily.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
var REFRESH_INTERVAL = 60000;
var REFRESH_COUNTDOWN = 720; //60;
var RES_REFRESH = "รีเฟรช";
var RES_PLEASE_WAIT = "กรุณารอ";
var RES_DISABLE_OUTRIGHT_MSG="Your account is not able to play Outright. Please contact your upline to enable Outright for you.";
var RES_PageType;
</script>
<script language="JavaScript" type="text/javascript" src="commJS/jquery.min.js"></script>
<script language="JavaScript" type="text/javascript" src="commJS/getDataClass.js"></script>
<script language="JavaScript" type="text/javascript" src="commJS/ajaxData.js"></script>
<script language="JavaScript" type="text/javascript" src="commJS/odds/MultiSport_Def.js"></script>
<script language="JavaScript" type="text/javascript" src="commJS/OddsUtils.js"></script>
<script language="JavaScript" type="text/javascript" src="commJS/OutrightKeeper.js"></script>
<!--<script language="JavaScript" type="text/javascript" src="commJS/odds/Outright_Def.js?v=200801180612"></script>-->
<script language="JavaScript" type="text/javascript" src="commJS/odds/Outright.js"></script>
<script language="JavaScript" type="text/javascript" src="commJS/DivLauncher.js"></script>
<script language="JavaScript" type="text/javascript" src="commJS/common.js"></script>
</head>

<body id="Outright" onload="refreshData();">
<iframe name='DataFrame' src="" style="display: none"></iframe>
<div class="titleBar">
    <div class="title">เอาท์ไรท์</div>
    <div class="right">
        <a href="javascript:openLeague(640,'เลือกลีค','Outright','1','10','0','Outright');" class="button selectLeague" title="เลือกลีค">
        	<span>
            <div id="League_New" class="displayOff">
              <div id="SelLeagueIcon">
                <div class="icon">
                </div>
              </div>
              <div class="events">
                <div class="normal">(</div><div id="CustSelL" class="selected"></div><div id="AllSelL" class="normal"></div><div class="normal">/</div><div id="TotalLeagueCnt" class="normal"></div><div class="normal">)</div>
              </div>
              ลีกค์</div>
            <div id="League_Old">
              เลือกลีค</div>
            </span>
        </a>
        <a href="javascript:refreshData();" id="btnRefresh_D" class="button disable"><span><div class="icon-refresh" title="กรุณารอ"></div></span></a>
    </div>
</div>


	<div id='OddsTr' style="display: none">
				<div class="tabbox_F" id="oTableContainer"></div>
		</div>

            <div id="TrNoInfo"  style="display: none">
            <table class="oddsTable" width="100%" cellpadding="0" cellspacing="0" border="0">
                <tr>
                	<td align="center" class="tabtitle" style="border-radius: 0;">ไม่มีการแข่งขันหรือเกมในขณะนี้ กรุณาเข้าชมการแข่งกีฬาหรือเกมอื่น ๆ แล้วกลับมาใหม่ภายหลัง</td>
                </tr>
            </table>
            </div>
			<div id="BetList" align="center"><img src="template/maxbet/public/images/layout/loading.gif" vspace="2" /></div>


<form action="Outright_data.php" target="DataFrame" name="DataForm" style="display: none">
	<input type="hidden" name="Market" value="OT" />
	<input type="hidden" name="Sport" value="1" />
	<input type="hidden" name="RT" value="W" />
	<input type="hidden" name="CT" value="" />
	<input type="hidden" name="Game" value="0" />
	<input type="hidden" name="Page" value="OUTRIGHT" />
	<input type="hidden" name="key" value="" />
</form>

<div id="PopDiv" style="display: none">
	<div class="popupW">
        <div id="PopTitle" class="popupWTitle">
        	<span>
                <div class="popWIcon"></div>
                <div id="PopTitleText" class="popWTitleContain"></div>
                <div id="PopCloser" class="popWClose" title="ปิด"></div>
            </span>
        </div>
        <div id="oPopContainer" class="popWContain">
        </div>
    </div>
</div>

<iframe name='PopFrame' id='PopFrame' src="" style="display: none" onload="document.getElementById('oPopContainer').innerHTML=this.contentWindow.document.body.innerHTML;"></iframe>

</body>
</html>