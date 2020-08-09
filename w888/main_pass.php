<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('inc/conn.php');
require('inc/function.php');

require("lang/variable_lang.php");
// require("lang/member_lang.php");




?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>PASS</title>
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

  try{
    parent.leftx.unselectSportMenu();
  }catch(e){
    console.log(e);
  }
  </script>
<script>
var fw;
$(document).ready(function() {
	 to_width(<?=$_GET["vvw"]?>);
});
function to_width(ty){
	if(ty==1){
		$("#main_left").width(975);
		fw = 1;
	}else{
		$("#main_left").width(770);
		fw = 0;
	}
}
</script>
<style>
.txt_back12n {
  font-size: 12px;
  font-family: Tahoma, Geneva, Arial, Helvetica, sans-serif;
  color: #000000;
  height:20px;
}
.box-orient-example-2 {
  display: -webkit-box;
  display: -moz-box;
  display: box;
  -webkit-box-orient: horizontal;
  -moz-box-orient: horizontal;
  box-orient: horizontal;
  -webkit-box-pack: center;
  -moz-box-pack: center;
  box-pack: center;
  -webkit-box-align: center;
  -moz-box-align: center;
  box-align: center;
}
</style>
</head>

<body>
<? 
    include 'mname_tmpl.php'; 
    include 'mtimezone_tmpl.php';
?>
<form action="" method="post">
<div id="main_left" style="overflow:visible;">
<div id="title_page">
    <div id="ic_title">&gt;</div>
    <span id="stitle"><?=$lang_member[45];?></span>
  </div>
  <div id="box_pass" class="box-orient-example-2">
  	<table width="50%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="right" style="padding:10px 0px;"><?=$lang_member[1044];?> :</td>
    <td align="left"><input type="password" name="old_pass" id="old_pass" size="30" class="txt_back12n" autocomplete="off"></td>
  </tr>
  <tr>
    <td align="right" style="padding:10px 0px;"><?=$lang_member[1045];?> :</td>
    <td align="left"><input type="password" name="new_pass" id="new_pass" size="30" class="txt_back12n" autocomplete="off"></td>
  </tr>
  <tr>
    <td align="right" style="padding:10px 0px;"><?=$lang_member[74];?> :</td>
    <td align="left"><input type="password" name="cnew_pass" id="cnew_pass" size="30" class="txt_back12n" autocomplete="off"></td>
  </tr>
  <tr>
    <td colspan="2" align="center" style="padding:20px 0px;"><input name="b_save" type="submit" class="btn_le" id="b_save" style="width:100px;height:25px;cursor:pointer;" value="<?=$lang_member[121];?>">
    <input type="reset" value="<?=$lang_member[65];?>" class="btn_le" style="width:100px;height:25px;cursor:pointer; background:#F00;"></td>
    </tr>
</table>
  </div>
</div></form>
<?
if(isset($_POST['b_save'])){
	
$fo="json/login/token_bet/".$_SESSION['m_id'].".php";
@require_once($fo);
if($_SESSION['bettoken']!=$bet_token){ exit();}

$rs_m = sql_array("select m_pass from bom_tb_member where m_id = '".$_SESSION['m_id']."'");

if($_POST["cnew_pass"]!="" and $_POST["new_pass"]!="" and $_POST["old_pass"]!=""){
	$_POST["old_pass"]=md5(trim($_POST["old_pass"]));
	$_POST["new_pass"]=md5(trim($_POST["new_pass"]));
	$_POST["cnew_pass"]=md5(trim($_POST["cnew_pass"]));
	
	if($_POST["old_pass"]==$rs_m["m_pass"]){
		$sq = sql_query("update bom_tb_member set m_pass = '".$_POST['new_pass']."' where m_id = '".$_SESSION['m_id']."'");
		$alert=$lang_member[56];
		echo "<script language='javascript'>alert('$alert');</script>";
	}else{
		$alert=$lang_member[810];
		echo "<script language='javascript'>alert('$alert');</script>";
	}
}

}


$token = md5(uniqid(rand(),1));
$_SESSION['bettoken']=$token;
$fo="json/login/token_bet/".$_SESSION['m_id'].".php";
write($fo,'<? $bet_token="'.$token.'"; ?>',"w+"); 
?>
</body>
</html>