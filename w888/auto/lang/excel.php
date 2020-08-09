<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('conn_lang.php');

@header("Content-Type: application/vnd.ms-excel");
@header('Content-Disposition: attachment; filename="Lang_MY.xls"');#ชื่อไฟล์
?>

<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">
<HEAD>
<style type="text/css">
@import url(http://fonts.googleapis.com/earlyaccess/myanmarsanspro.css);
input{
	font-family: 'Myanmar Sans Pro', sans-serif;
}
</style>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
</HEAD><BODY>
<style type="text/css">
.bb{ font-weight:bold;}
.tcr{ text-decoration:underline;  font-weight:bold; color:#F00;}
table{border-collapse:collapse;}
</style>

<script type="text/javascript" src="js/jquery-latest.js"></script>

<table width="100%" border="1" cellspacing="0" cellpadding="0" class="ball"    x:str >
  <tr>
   <td width="10%" align="center">No.</td>
    <td width="30%" align="center">Eng</td>
    <td width="30%" align="center">Thai</td>
    <td width="30%" align="center">Myanmar</td>
  </tr>
<?
#and my=''
$x=1;
$ww=" where  lang_sport=1  ";
$sql="SELECT * FROM bom_tb_lang_zone  $ww order by en asc";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
  ?>
  <tr>
   <td align="center"><b><?=$x;?></b></td>
    <td><?=$rs[en];?></td>
   <td><?=$rs[th];?></td>
   <td><?=$rs[mm];?></td>
  
  </tr>
  <? $x++;}?>
  <?
$sql="SELECT * FROM bom_tb_lang_team $ww order by en asc ";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
  ?>
  <tr>
   <td align="center"><b><?=$x;?></b></td>
    <td><?=$rs[en];?></td>
   <td><?=$rs[th];?></td>
   <td><?=$rs[mm];?></td>
  </tr>
  <? $x++;}?>
</table>

</BODY>

</HTML>

