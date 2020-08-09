<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('inc/conn.php');
require('inc/function.php');

require("lang/variable_lang.php");
// require("lang/member_lang.php");
// require("/home/ohoking/domains/ohoking.com/public_html/admin_lang/export/lang_member_".$_SESSION['lang'].".php");


if(isset($_POST['b_ok'])){
		$bbb=$_POST['t_begin']." 00:00:00";
		$eee=$_POST['t_end']." 00:00:00";
	#	$_POST[t_begin]=date("Y-m-d" , strtotime("-1day"));
	#	$_POST[t_end]=date("Y-m-d" );
		$ddd=" and   (n_date  between '$bbb' and '$eee') ";
		$man=1;
	}else{
		$bbb=date("Y-m-d 00:00:00" , strtotime("-1day"));
		$eee=date("Y-m-d 00:00:00");
		$_POST['t_begin']=date("Y-m-d" , strtotime("-1day"));
		$_POST['t_end']=date("Y-m-d" );
		$ddd=" and   (n_date  between '$bbb' and '$eee') ";
		$man=0;
		}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>News - Lotto</title>
<link rel="stylesheet" type="text/css" href="css/style.css?v=<?=$cache_css;?>">
<link rel="stylesheet" type="text/css" href="css/style3.css?v=<?=$cache_css;?>">
<? if($_SESSION['lang']=="mm"){?><link rel="stylesheet" type="text/css" href="css/style_mm.css?v=2019"><? }?>
<link href="jsui/jquery-ui.css?v=0001" rel="stylesheet">
<script src="jsui/external/jquery/jquery.js?v=2019"></script>
<script src="jsui/jquery-ui_<?=$_SESSION['lang'];?>.js" charset="utf-8"></script>

<!-- <script>
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
  </style> -->
</head>

<body>
<table width="100%" border="0" align="left" cellpadding="5" cellspacing="1">
<!--  <form method="post" action="" style="display:inline">
    <tr align="center">
      <td height="30" colspan="6" align="left" bgcolor="#eeeeee"><table border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="54" align="right" class="txt_back11b">วันที่</td>
            <td width="4"></td>
            <td><input name="t_begin" type="text" class="datepicker" id="t_begin" value="<?=$_POST[t_begin];?>" size="11" readonly></td>
            <td></td>
            <td width="30" align="center" class="txt_back11b">ถึง</span></td>
            <td><input name="t_end" type="text" class="datepicker" id="t_end" value="<?=$_POST[t_end];?>" size="11" readonly></td>
            <td>&nbsp;</td>
            <td><input name="b_ok" type="submit" class="txt_back11n" id="b_ok" style="cursor:pointer" value="ค้นหา" /></td>
          </tr>
        </table></td>
    </tr>
  </form> -->
  <tr align="center" class="">
    <td width="4%"  class="tb_title_lotto" height="25"><?=$lang_member[425];?></td>
    <td width="19%" class="tb_title_lotto" ><?=$lang_member[146];?></td>
    <td width="77%" class="tb_title_lotto" ><?=$lang_member[441];?></td>
  </tr>
    <?
// $i=1;
// #$url_file1="json/news/lotto.json";	
// $url_file1="json/news/lotto.json";	
// $ok_js=file_get_contents2($url_file1);
// $ok_bet = json_decode2($ok_js, true);
// foreach($ok_bet as $rs){

?>
  <!-- <tr bgcolor="#f9f9f9" class="list_news" height="20">
    <td align="center"><?=$i++;?></td>
    <td  align="center"><?=$rs['n_date'];?></td>
    <td ><?=$rs['n_note'];?></td>
  </tr> -->
  <? #} ?>
<?
  if($_GET['s']!=""){
    $sql = "SELECT * FROM bom_tb_news WHERE b_sport = '$_GET[s]' AND b_zone = 2 ORDER BY n_date DESC"; 
  }else{
    $sql = "SELECT * FROM bom_tb_news WHERE b_zone = 2 ORDER BY n_date DESC"; 
  }
    $resNews = sql_query($sql);
    $c = 0;
    while ($news = sql_fetch($resNews)){
      $c++;
  ?>
  <tr class="list_news" height="20">
    <td align="center"><?=$c;?></td>
    <td align="center"><?=$news['n_date'];?></td>
    <td><b class="cr"><?=$news['n_note_en'];?></td>
  </tr>
<?
  } 
?>
</table>
</body>
</html>