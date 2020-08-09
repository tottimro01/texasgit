<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>สมาชิกที่มีจำนวนครั้งมากที่สุด</title>
<style>
body {
	margin: 0px;
	padding: 0px;
	background: #FFFFFF;
	font-size: 12px;
	font-family: tahoma, "Microsoft Sans Serif", Vanessa;
}
button {
	background: #C8C4BC;
	height: 20px;
	line-height: 10px;
	cursor: pointer;
	outline:none;
}
.row:nth-child(even) {
  background:#FFF;
}
.row:nth-child(odd) {
  background:#EFEFEF;
}
.row:hover {
	background:#FEFF58;
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
	color:#fff;
}
.link_to {
	cursor:pointer;
}
.link_to:hover {
	text-decoration:underline;
}
</style>
<script>
function open_dialog(page){
	//var page = file_msg;
	  var IEWidth =  880 ;
	  var IEHeight = 535 ;
	  var NNWidth =  880 ;
	  var NNHeight = 535 ;
	  var MyBrowser = navigator.appName;
	 
	  if (MyBrowser == "Netscape") {
	  var myWinWidth = (window.screen.width/2) - (NNWidth/2);
	  var myWinHeight = ((window.screen.height/2) - ((NNHeight/2) + 50))*2;
	
	  var myWin = window.open(page,"MainWin3","width=" + NNWidth + ",height=" + NNHeight + ",screenX=" + myWinWidth + ",screenY=" + myWinHeight + ",left=" + myWinWidth + ",top=" + myWinHeight + ",scrollbars=yes,toolbar=0,status=1,menubar=0,resizable=0,titlebar=no");
	
	  }else {
	  var myWinWidth = (window.screen.width/2) - (IEWidth/2);
	  var myWinHeight = ((window.screen.height/2) - ((IEHeight/2) + 50))*2;
	
	  var myWin = window.open(page,"MainWin3","width=" + IEWidth + ",height=" + IEHeight + ",screenX=" + myWinWidth + ",screenY=" + myWinHeight + ",left=" + myWinWidth + ",top=" + myWinHeight + ",scrollbars=yes,toolbar=0,status=1,menubar=0,resizable=0,titlebar=no");
	
	  }
	  myWin.focus();

}
</script>
</head>

<body>
<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#999999">
  <tr class="white">
    <td colspan="7" bgcolor="#54BAFF">
    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" width="50%"><strong>แสดงสมาชิกที่มีสถานะ : </strong><select>
              <option value="1">เฉพาะปกติ</option>
              <option value="2">ปกติ และ ล๊อค</option>
          </select></td>
    <td align="center" width="50%"><strong>แสดงข้อมูลใน Robot : </strong><select>
              <option value="1">เฉพาะวันนี้</option>
          </select></td>
  </tr>
</table>
    </td>
  </tr>
  <tr class="white">
    <td rowspan="2" align="center" bgcolor="#54BAFF" width="5%"><strong>No</strong></td>
    <td rowspan="2" align="center" bgcolor="#54BAFF" width="25%"><strong>รหัส</strong></td>
    <td rowspan="2" align="center" bgcolor="#54BAFF" width="10%"><strong>สถานะ</strong></td>
    <td colspan="2" align="center" bgcolor="#54BAFF"><strong>วันนี้ (19-05-2015)</strong></td>
    <td colspan="2" align="center" bgcolor="#54BAFF"><strong>ทั้งหมด</strong></td>
  </tr>
  <tr class="white">
    <td align="center" bgcolor="#54BAFF" width="15%"><strong>ครั้ง</strong></td>
    <td align="center" bgcolor="#54BAFF" width="15%"><strong>จำนวนเงิน</strong></td>
    <td align="center" bgcolor="#54BAFF" width="15%"><strong>รวมครั้ง</strong></td>
    <td align="center" bgcolor="#54BAFF" width="15%"><strong>รวมจำนวนเงิน</strong></td>
  </tr>
  <? for($i=1;$i<=20;$i++){ ?>
  <tr class="row">
    <td align="center" class="gray"><?=$i?></td>
    <td align="center"><strong>tm4617</strong></td>
    <td align="center">ปกติ</td>
    <td align="center"><span class="link_to" onClick="open_dialog('mem_detail.php');"><strong>11</strong></span></td>
    <td align="right"><span class="link_to" onClick="open_dialog('mem_detail.php');">16,700</span></td>
    <td align="center"><span class="link_to" onClick="open_dialog('mem_detail.php');"><strong>1762</strong></span></td>
    <td align="right"><span class="link_to" onClick="open_dialog('mem_detail.php');">3,644,598</span></td>
  </tr>
  <? } ?>
</table>
</body>
</html>