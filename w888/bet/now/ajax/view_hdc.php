<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
//Step & YODAY
require('../../inc/conn.php');
require('../../inc/function.php');

$id = $_POST["id"];
$add = $_POST["add"];
$url_set = $_POST["url_set"];
$name1 = $_POST["name1"];
$name2 = $_POST["name2"];

if($url_set==1){
	$txt="ບ້ານ $name1";
	$type_pay=" and play_type=1";
	}elseif($url_set==2){
	$txt="ຢາມ $name2";	
	$type_pay=" and play_type=2";
	}elseif($url_set==3){	
	$txt="$name1 -  $name2";	
	$type_pay=" and (play_type=1 or play_type=2)";
	}
	
	
	$m_user=array();
$sql="select * from pha_tb_member  order by m_id desc";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
$m_user[$rs[m_id]]=$rs[m_user];
	}
	
	$r_user=array();
	$r_name=array();
$sql="select * from pha_tb_agent   order by r_id desc";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
$r_user[$rs[r_id]]=$rs[r_user];
$r_name[$rs[r_id]]=$rs[r_name];
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Live</title>
<style>

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
	height:131px;
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
#viewset{
	position:fixed;
	width:100%;
	background-color:#FFF;
	}
	#in_top{
		padding-top:150px;
		}
</style>
</head>

<body>
<div id="viewset">
<input  type="button" value="ປິດ" onclick="_cc();"  style="float:right;"/>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr >
    <td width="10%" align="center" bgcolor="#D6D6D6" ><strong>ສາຂາ</strong></td>
    <td width="15%" align="center" bgcolor="#D6D6D6"><strong>ເລືອກ</strong></td>
    <td width="8%" align="center" bgcolor="#D6D6D6"><strong>ແຕ້ມຕໍ່</strong></td>
    <td width="8%" align="center" bgcolor="#D6D6D6"><strong>ລາຄາ</strong></td>
    <td width="10%" align="center" bgcolor="#D6D6D6"><strong>ຍອດສ່ຽງ</strong></td>
    <td width="8%" align="center" bgcolor="#D6D6D6"><strong>ເວລາ</strong></td>
    <td width="10%" align="center" bgcolor="#D6D6D6"><strong>ພະນັກງານ</strong></td>
    <td width="10%" align="center" bgcolor="#D6D6D6"><strong>ID</strong></td>
  
  </tr>
</table>
<div id="box_over">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <? 
	$sql="select * from pha_tb_football_bill_play where b_id='$id' and b_add='$add' and b_numstep=1 and b_cancel=0  $type_pay order by play_id desc";
	$re=sql_query($sql);
	while($rs=sql_fetch($re)){
	?>
          <tr class="tr_data">
        <td width="10%" align="center" bgcolor="#FEFFA3" class="td_bd_right td_bd_bottom"><?=$r_name[$rs[r_id]];?></td>
        <td width="15%" align="left" bgcolor="#FEFFA3" class="td_bd_right td_bd_bottom <? if(($rs[b_big]==1 and $rs[play_type]==1) or ($rs[b_big]==2 and $rs[play_type]==2) ){ echo "red"; }else{ echo "blue"; } ?>"><?=$txt;?></td>
        <td width="8%" align="center" bgcolor="#FEFFA3" class="td_bd_right td_bd_bottom"><?=$rs[play_bet];?></td>
        <td width="8%" align="center" bgcolor="#FEFFA3" class="td_bd_right td_bd_bottom red"><?=$rs[play_pay];?></td>
        <td width="10%" align="right" bgcolor="#FEFFA3" class="td_bd_right td_bd_bottom"><?=number_format($rs[b_total]);?></td>
        <td width="8%" align="center" bgcolor="#FEFFA3" class="td_bd_right td_bd_bottom"><?=date("H:i",$rs[play_timestam]);?></td>
        <td width="10%" align="center" bgcolor="#FEFFA3" class="td_bd_right td_bd_bottom"><?=$m_user[$rs[m_id]];?></td>
        <td width="10%" align="center" bgcolor="#FEFFA3" class="td_bd_right td_bd_bottom"><?=$rs[bill_id];?></td>
      </tr>
      <? }?>
          </table>
</div>
</div>
</body>
</html>