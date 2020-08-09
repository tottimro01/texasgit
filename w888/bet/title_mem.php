<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<style>
body {
	margin:0px;
	padding:0px;
	background:#FFF;
	font-size: 12px;
	font-family: tahoma, "Microsoft Sans Serif", Vanessa;
}
.title_tb {
	height:24px;
	background:url(img/bg_title.png);
	
}
.td_bd_right {
	border-right:1px solid #6694b8;
}
.td_bd_bottom {
	border-bottom:1px solid #6694b8;
}
.orange {
	color:#F90;
}
/*a {
	text-decoration:none;
}
a:hover {
	text-decoration:underline;
}*/
</style>
<script>
function add_mem(){
	parent.document.getElementById("frameset1").rows="25,125,24,*,130";  
	parent.footx.location.href="add_mem.php";
}
</script>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr class="title_tb">
    <td width="3%" align="center" colspan="2"><a href="#" class="orange" onClick="add_mem()">เพิ่ม</a></td>
    <td width="30%" align="left" colspan="2"><input type="text" size="6" style="background:#FFF; height:12px; outline:none;"> 
    <a href="#" class="orange" onClick="parent.mainx.location.href='main_mem.php';">ดูทั้งหมด</a> 
    <a href="#" class="orange" onClick="parent.mainx.location.href='main_mem.php';">สมาชิก</a> 
    <a href="#" class="orange" onClick="parent.mainx.location.href='main_mem.php';">เอเย่นต์</a> 
    <a href="#" class="orange" onClick="parent.mainx.location.href='main_mem.php';">มาสเตอร์</a> 
    <a href="#" class="orange" onClick="parent.mainx.location.href='main_mem.php';">ซีเนียร์</a> 
    <a href="#" class="orange" onClick="parent.mainx.location.href='main_mem.php';">ซุปเปอร์</a></span></td>
    <td width="10%" align="center"><strong>ราคา</strong></td>
    <td width="3%" align="center"><strong>Com</strong></td>
    <td width="10%" align="center"><strong>เครดิต</strong></td>
    <td width="10%" align="center"><strong>ยอดการเล่น</strong></td>
    <td width="10%" align="center"><strong>ยอดบัญชี</strong></td>
    <td width="10%" align="center"><strong>IP</strong></td>
    <td width="10%" align="center"><strong>เวลา On-line</strong></td>
    <td width="4%"><img src="img/refresh.png" height="14" style="vertical-align:text-bottom; cursor:pointer;" onClick="parent.mainx.location.href='main_mem.php';"></td>
  </tr>
</table>
</body>
</html>