<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>รายการเล่นแก้ไข/ยกเลิก</title>
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
</head>

<body>
<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#717171">
	<tr>
    	<td colspan="8"  align="center" bgcolor="#54BAFF" style="color: #FFF"><strong>วันที่ : </strong><input name="tdd" type="text" class="datepicker txtq2" id="tdd" value="" size="15" readonly required> <button onClick="location.reload();">รีเฟชร</button> <button>พิมพ์</button> <button onClick="window.close()">ปิด</button></td>
    </tr>
  <tr>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF" width="5%">No</td>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF" width="10%"><strong>วัน/เวลา<br>User</strong></td>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF" width="10%"><strong>รหัส</strong></td>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF" width="25%"><strong>คู่แข่งขัน</strong></td>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF" width="15%"><strong>เลือก<br>บอล</strong></td>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF" width="10%"><strong>ยอดการเล่น<br>ราคา</strong></td>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF" width="10%"><strong>แก้ไข<br>ยกเลิก</strong></td>
    <td align="center" bgcolor="#54BAFF" style="color: #FFF" width="15%"><strong>User<br>เวลาที่แก้ไข</strong></td>
  </tr>
</table>
</body>
</html>