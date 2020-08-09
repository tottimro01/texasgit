<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>รายละเอียดการเล่น Robot</title>
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
	  var myWinWidth = ((window.screen.width/2) - (NNWidth/2))*1.5;
	  var myWinHeight = ((window.screen.height/2) - ((NNHeight/2) + 50))*1.5;
	
	  var myWin = window.open(page,"MainWin2","width=" + NNWidth + ",height=" + NNHeight + ",screenX=" + myWinWidth + ",screenY=" + myWinHeight + ",left=" + myWinWidth + ",top=" + myWinHeight + ",scrollbars=yes,toolbar=0,status=1,menubar=0,resizable=0,titlebar=no");
	
	  }else {
	  var myWinWidth = ((window.screen.width/2) - (IEWidth/2))*1.5;
	  var myWinHeight = ((window.screen.height/2) - ((IEHeight/2) + 50))*1.5;
	
	  var myWin = window.open(page,"MainWin2","width=" + IEWidth + ",height=" + IEHeight + ",screenX=" + myWinWidth + ",screenY=" + myWinHeight + ",left=" + myWinWidth + ",top=" + myWinHeight + ",scrollbars=yes,toolbar=0,status=1,menubar=0,resizable=0,titlebar=no");
	
	  }
	  myWin.focus();

}
</script>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="2" style="height:25px; position:fixed; top:0px; left:0px; z-index:2;">
  <tr>
    <td align="left" bgcolor="#ECE9D8">&nbsp;<button onClick="open_dialog('mem_max.php')">ดูสมาชิกที่มีจำนวนครั้งมากที่สุด</button></td>
    <td align="right" bgcolor="#ECE9D8"><strong>เลือกวันที่ : </strong><select>
              <option value="19">19</option>
          </select><select>
              <option value="5">5</option>
          </select><strong> : </strong><select>
              <option value="">ทั้งหมด</option>
          </select></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="1" cellpadding="5" style="top: 25px; position: relative; z-index:1;" bgcolor="#999999">
  <tr class="white">
    <td width="5%" align="center" bgcolor="#54BAFF"><strong>No</strong></td>
    <td width="10%" align="center" bgcolor="#54BAFF"><strong>วัน/เวลา</strong></td>
    <td width="10%" align="center" bgcolor="#54BAFF"><strong>รหัส<br>betID</strong></td>
    <td width="30%" align="center" bgcolor="#54BAFF"><strong>คู่แข่งขัน</strong></td>
    <td width="15%" align="center" bgcolor="#54BAFF"><strong>เลือก<br>
    บอล</strong></td>
    <td width="10%" align="center" bgcolor="#54BAFF"><strong>จำนวนเงิน<br>
    ยอดเข้าเวป</strong></td>
    <td width="10%" align="center" bgcolor="#54BAFF"><strong>ราคาที่เล่น</strong></td>
    <td width="10%" align="center" bgcolor="#54BAFF"><strong>ราคาถัดมา</strong></td>
  </tr>
  <? for($i=1;$i<=20;$i++){ ?>
  <tr class="row">
    <td align="center" class="gray"><?=$i?></td>
    <td align="center">20/5/2015<br>10:09:11</td>
    <td align="center"><strong>11168ne135</strong><br><span class="gray">6579881</span></td>
    <td align="center"><strong class="red">LD อลาจูเรนเซ่</strong> <span class="blue">-vs-</span> <strong class="blue">CS เฮเรเดียโน่</strong><br>ในเกม <strong>Live @ 1 : 0</strong></td>
    <td align="center"><strong class="red">(สูง) LD อลาจูเรนเซ่</strong><br><strong>2</strong></td>
    <td align="right">501.00<br>100.20</td>
    <td align="center"><strong>0.850</strong><br><span class="blue">10:09:11</span></td>
    <td align="center"><strong>0.730</strong> (12.0)<br><span class="blue">10:09:35</span></td>
  </tr>
  <? } ?>
</table>
</body>
</html>