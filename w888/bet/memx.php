<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>แพ้ชนะตามสมาชิกย้อนหลัง</title>
<link href="jsui/jquery-ui.css?v=0001" rel="stylesheet">
<script src="jsui/external/jquery/jquery.js?v=2019"></script>
<script src="jsui/jquery-ui_th.js?v=2019"></script>
<style>
body {
	margin:0px;
	padding:0px;
	background:#FFF;
	font-size: 12px;
	font-family: tahoma, "Microsoft Sans Serif", Vanessa;
}
.red {
	color:#F00;
}
.blue {
	color:#00F;
}
.gray {
	color:#CCC;
}
.white {
	color:#FFF;
}
.trl:nth-child(even) {
  background:#FFF;
}
.trl:nth-child(odd) {
  background: #EFEFEF;
}
.trl:hover {
	background: #FEFF58;
}
button {
	background: #C8C4BC;
	height: 18px;
	line-height: 10px;
	cursor: pointer;
	outline:none;
	min-width:50px;
}
.box_light {
	background-image: linear-gradient(top, #fff, #9CA2AB);
	background-image: -moz-linear-gradient(top, #fff, #9CA2AB);
	background-image: -webkit-linear-gradient(top, #fff, #9CA2AB);
	background-image: -o-linear-gradient(top, #fff, #9CA2AB);
	background-image: -ms-linear-gradient(top, #fff, #9CA2AB);
}
.hand_hover {
	cursor:pointer;
}
.lk_hover:hover {
	text-decoration:underline;
}
.txt {
	height: 14px;
	outline:none;
	width:25px;
}
</style>
<script>
$(function() {
    $( ".datepicker" ).datepicker({
      showOn: "button",
      buttonImage: "img/calendar.png",
      buttonImageOnly: true,
      buttonText: "Select date",
	  dateFormat:"yy-mm-dd"
    });
  });

  </script>
  <style>
  .ui-datepicker-trigger {
	   vertical-align: bottom !important;
	   cursor:pointer;
	 }
  </style>
  <script>
function open_dialog(page){
	//var page = file_msg;
	  var IEWidth =  1024 ;
	  var IEHeight = 535 ;
	  var NNWidth =  1024 ;
	  var NNHeight = 535 ;
	  var MyBrowser = navigator.appName;
	 
	  if (MyBrowser == "Netscape") {
	  var myWinWidth = ((window.screen.width/2) - (NNWidth/2))*1.5;
	  var myWinHeight = ((window.screen.height/2) - ((NNHeight/2) + 50))*1.5;
	
	  var myWin = window.open(page,"MainWinx","width=" + NNWidth + ",height=" + NNHeight + ",screenX=" + myWinWidth + ",screenY=" + myWinHeight + ",left=" + myWinWidth + ",top=" + myWinHeight + ",scrollbars=yes,toolbar=0,status=1,menubar=0,resizable=0,titlebar=no");
	
	  }else {
	  var myWinWidth = ((window.screen.width/2) - (IEWidth/2))*1.5;
	  var myWinHeight = ((window.screen.height/2) - ((IEHeight/2) + 50))*1.5;
	
	  var myWin = window.open(page,"MainWinx","width=" + IEWidth + ",height=" + IEHeight + ",screenX=" + myWinWidth + ",screenY=" + myWinHeight + ",left=" + myWinWidth + ",top=" + myWinHeight + ",scrollbars=yes,toolbar=0,status=1,menubar=0,resizable=0,titlebar=no");
	
	  }
	  myWin.focus();

}
</script>
</head>

<body>
<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#717171">
	<tr>
    	<td colspan="8"  align="center" bgcolor="#54BAFF" style="color: #FFF"><strong>วันที่ </strong><input name="tdd" type="text" class="datepicker txtq2" value="" size="15" readonly required> <strong>ถึง </strong><input name="tdd" type="text" class="datepicker txtq2" value="" size="15" readonly required> <button onClick="location.reload();">รีเฟชร</button> <button>พิมพ์</button> <button onClick="window.close()">ปิด</button></td>
    </tr>
  <tr>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF" width="5%">No</td>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF" width="10%"><strong>รหัส</strong></td>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF" width="15%"><strong>ชื่อ</strong></td>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF" width="15%"><strong>ยอดการเล่น</strong></td>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF" width="10%"><strong>ค่าคอม</strong></td>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF" width="15%"><strong>ลูกค้าได้</strong></td>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF" width="15%"><strong>ลูกค้าเสีย</strong></td>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF" width="15%"><strong>รวมลูกค้าได้เสีย</strong></td>
  </tr>
  <? for($i=1;$i<=10;$i++){ ?>
  <tr class="trl">
    <td align="center" width="5%"><?=$i?></td>
    <td align="left" width="10%"><strong>1234</strong></td>
    <td align="left" width="15%"><span>1102</span></td>
    <td align="right" width="15%"><span>10,000</span></td>
    <td align="right" width="10%"><span>5,000</span></td>
    <td align="right" width="15%"><span>100,000</span></td>
    <td align="right" width="15%"><span class="red">-50,000</span></td>
    <td align="right" width="15%"><span class="red hand_hover lk_hover" onClick="open_dialog('detailx.php');">-100</span></td>
  </tr>
  <? } ?>
</table>
</body>
</html>