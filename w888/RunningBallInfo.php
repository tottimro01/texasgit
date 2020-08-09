<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<link href="http://i.mbxcdn.com/template/maxbet/public/css/table_w.css?v=<?=date("YmdHis");?>" rel="stylesheet" type="text/css" />
<link href="http://i.mbxcdn.com/template/maxbet/public/css/button.css?v=<?=date("YmdHis");?>" rel="stylesheet" type="text/css" />
<link href="http://i.mbxcdn.com/template/maxbet/public/css/oddsFamily.css?v=<?=date("YmdHis");?>" rel="stylesheet" type="text/css" />

<script language="JavaScript" type="text/javascript" src="http://i.mbxcdn.com/commJS/jquery.min.js?v=<?=date("YmdHis");?>"></script>
<script language="JavaScript" type="text/javascript" src="http://i.mbxcdn.com/commJS/jquery.tmpl.min.js?v=<?=date("YmdHis");?>"></script>
<script language="JavaScript" type="text/javascript" src="http://i.mbxcdn.com/commJS/jquery.mCustomScrollbar.js?v=<?=date("YmdHis");?>"></script>
<script language="JavaScript" type="text/javascript" src="http://i.mbxcdn.com/commJS/jquery.newslides.min.js?v=<?=date("YmdHis");?>"></script>
<script type="text/javascript" src="http://gvweb.garcade.net:8096/js/trailblazerlib.js?v=<?=date("YmdHis");?>"></script>
<script>
    function StartGv() {
        //var gv = new trailblazer();

        //trailblazer.setKey(parent.fFrame.dispatcherkey);
        //trailblazer.setUserLang(parent.fFrame.dispatcherkey);
        //trailblazer.gvstart(29588238, 'เอฟซี บูลลีน ไลออน', 'เมลเบิร์น วิคตอรี่ (ยช)', 'RunningBallDiv', 'full', 'soccer');
        trailblazer.gvstart(<?=$_GET['MatchId'];?>, '<?=$_GET['Homename'];?>', '<?=$_GET['Awayname'];?>', 'RunningBallDiv', 'full', 'soccer');
    }
</script>
</head>
<body onload="StartGv();" style="margin:0;">
    <div class="MainTVInfo fixed">
        <!--<div class="MiddleLiveHadder">
            <a onclick="#" href="javascript:LiveInfoBackButton();" id="btnSwitchBack" class="button light"
                title="Back"><span>
                    <div class="icon-back" title="{{lbl_Back}}">
                    </div>
                </span></a>
            <div class="btnIcon mark right" onclick="CloseTVBox();">
                <span class="icon-close" title="{{lbl_Close}}"></span>
            </div>
            <div class="btnIcon mark right" onclick="HiddleTVBox();">
                <span class="icon-arrowsDown" title="{{lbl_Hiddle}}"></span>
            </div>
            <div class="btnIcon mark right" onclick="ZoomTVBox();">
                <span class="icon-zoom" title="{{lbl_Zoom}}"></span>
            </div>
            <div class="Switch right">
                <ul>
                    <li class="current"><span class="iconOdds tv" title="Streaming"></span>Streaming</li><li>
                        <span class="iconOdds liveInfo" title="Game Visualization"></span>Game Visualization</li>
                </ul>
            </div>
        </div>-->
        <div id="RunningBallDiv">
        </div>
    </div>
</body>
</html>
