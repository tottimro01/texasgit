<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?

?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>ข่าวสาร</title>
<link rel="stylesheet" type="text/css" href="css/style.css?v=2019">
<? if($_SESSION['lang']=="mm"){?><link rel="stylesheet" type="text/css" href="css/style_mm.css?v=2019"><? }?>
<link href="jsui/jquery-ui.css?v=0001" rel="stylesheet">
<script src="jsui/external/jquery/jquery.js?v=2019"></script>
<script src="jsui/jquery-ui.js?v=2019"></script>
<script>
$(function() {
    $( ".datepicker" ).datepicker({
      showOn: "button",
      buttonImage: "img/calendar.png",
      buttonImageOnly: true,
      buttonText: "Select date",
	  dateFormat:"dd/mm/yy"
    });
  });
  </script>
  <style>
  .ui-datepicker-trigger {
	   vertical-align: bottom !important;
	   cursor:pointer;
	 }
  </style>
</head>

<body>
<table width="100%" border="0" align="left" cellpadding="5" cellspacing="1" bgcolor="#fff">
  <form id="demoform" name="demoform" method="post" action="message.php" style="display:inline">
    <tr align="center">
      <td height="30" colspan="6" align="left" bgcolor="#eeeeee"><table border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="54" align="right" class="txt_back11b">วันที่</td>
            <td width="4"></td>
            <td><input type="text" class="datepicker" size="11" readonly="readonly" value="<?=date("d/m/Y" , strtotime("-1day"))?>"></td>
            <td></td>
            <td width="30" align="center" class="txt_back11b">ถึง</span></td>
            <td><input type="text" class="datepicker" size="11" readonly="readonly" value="<?=date("d/m/Y")?>"></td>
            <td>&nbsp;</td>
            <td><input name="Submit" type="submit" class="txt_back11n" style="cursor:pointer" value="ค้นหา" /></td>
          </tr>
        </table></td>
    </tr>
  </form>
  <tr align="center" class="new_title">
    <td width="5%" height="25">ลำดับ</td>
    <td width="15%">วันที่</td>
    <td width="80%">ข่าวสาร</td>
  </tr>
  <? for($i=1;$i<=10;$i++){ ?>
  <tr bgcolor="#f9f9f9" class="list_news" height="20">
    <td align="center"><?=$i?></td>
    <td height="20" align="center">2015-05-04 00:54:00</td>
    <td height="20" align="left">Attn:[Soccer] The match between "FC Gomel -vs- Shakhtyor Soligorsk" [BELARUS PREMIER LEAGUE - 4/5*Live*], we faced disruption in our broadcast from 5/5 1:39:21 AM - 1:42:43 AM. As a result tickets placed during the disrupted period were REJECTED. Sorry for the inconvenience caused!<br>
      <br></td>
  </tr>
  <? } ?>
</table>
</body>
</html>