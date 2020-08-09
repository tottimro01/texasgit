<?php
require('../inc/conn.php');	
include "../inc/function.php";

$b_id = $_GET["lid"];

if($_POST["btn_save"]=="save"){
	$b_name_thai = $_POST["txt_name_thai"];	
	$sql=sql_query("update bom_tb_data_sport_today set b_name_1 = '$b_name_thai' where b_id = '$b_id'");
}

$rs=sql_array("select * from bom_tb_data_sport_today where b_id = '$b_id' limit 1");
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<style>
body {
	margin:0px;
	padding:0px;
	background:#EFEFDC;
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
#box_over {
	/*width:100%;*/
	height:101px;
	overflow-y:scroll;
	box-shadow: inset 0 0 2px #000000;
}
.td_bd_right {
	border-right:1px solid #6694b8;
}
.td_bd_bottom {
	border-bottom:1px solid #6694b8;
}
.tr_data td {
	height:20px;
	padding:0px 2px;
}
.tr_data:hover {
	background:#FEFFA4;
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
.trl:nth-child(even) {
  background: white;
}
.trl:nth-child(odd) {
  background: #E1ECF6;
}
.box_light {
	float:left;
	height:15px;
	width:20px;
	background-image: linear-gradient(top, #fff, #9CA2AB);
	background-image: -moz-linear-gradient(top, #fff, #9CA2AB);
	background-image: -webkit-linear-gradient(top, #fff, #9CA2AB);
	background-image: -o-linear-gradient(top, #fff, #9CA2AB);
	background-image: -ms-linear-gradient(top, #fff, #9CA2AB);
	margin-right:5px;
}
.orange {
	color:#F90;
}
button {
	background: #C8C4BC;
	height: 18px;
	line-height: 10px;
	cursor: pointer;
	outline:none;
	min-width:50px;
}
.txt {
	height: 14px;
	outline:none;
	width:80%;
}
</style>
</head>

<body>
<? if($_GET["lid"]!=""){ ?>
<form method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td align="right"><strong>ไทย : </strong><input name="txt_name_thai" type="text" class="txt" id="txt_name_thai" value="<?=$rs["b_name_1"]?>"></td>

  </tr>
  <tr>
    <td align="right"><strong>Eng : </strong><input name="txt_name_eng" type="text" class="txt" id="txt_name_eng" value="Silkeborg"></td>
  </tr>
  <tr>
    <td align="right"><strong>พม่า : </strong><input name="txt_name_pmar" type="text" class="txt" id="txt_name_pmar" value="Silkeborg"></td>
  </tr>
  <tr>
    <td align="right"><strong>ลาว : </strong><input name="txt_name_lao" type="text" class="txt" id="txt_name_lao" value="Silkeborg"></td>
  </tr>
  <tr>
    <td align="right"><button name="btn_save" id="btn_save" type="submit" value="save">บันทึก</button></td>
  </tr>
</table>
</form>
<? } ?>
</body>
</html>