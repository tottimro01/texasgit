<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('inc/conn.php');
require('inc/function.php');

require("lang/variable_lang.php");
// require("lang/member_lang.php");


if(isset($_POST['b_save'])){
	
$fo="json/login/token_bet/".$_SESSION['m_id'].".php";
@require_once($fo);
if($_SESSION['bettoken']!=$bet_token){ exit();}



	

		$sq = sql_query("update bom_tb_member set m_lang = '".$_POST['tlang']."',m_price = '".$_POST['tprice']."',m_row = '".$_POST['trow']."'  where m_id = '".$_SESSION['m_id']."'");
$_SESSION['lang']=$arr_lang[$_POST['tlang']];
$_SESSION['m_price'] = $m_price[$_POST['tprice']];
$_SESSION['m_row'] = $_POST['trow'];

		$alert=$lang_member[56];
		

}


?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>CONFIG</title>

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
.txtq2 {
  color: #000;
  border: 1px #333 solid;
  font-size: 12px;
  text-align: center;
  padding: 3px;
}
</style>
</head>

<body><form action="" method="post">
<div id="main_left" style="overflow:visible;">
<div id="title_page">
    <div id="ic_title">&gt;</div>
    <span id="stitle"><?=$lang_member[41];?></span>
  </div>
  <div id="box_pass" class="box-orient-example-2">
  	<table width="50%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="right" style="padding:10px 0px;"><?=$lang_member[1078];?> :</td>
    <td align="left">&nbsp;<select name="tlang" class="txtq2" id="tlang" >
    <? for($x=1;$x<=count($m_lang);$x++){?>
    <option value="<?=$x;?>" <? if($_SESSION['lang']==$arr_lang[$x]){echo'selected';}?> ><?=$m_lang[$x];?></option>
    <? }?>
</select></td>
  </tr>
  <tr>
    <td align="right" style="padding:10px 0px;"><?=$lang_x[28];?> :</td>
    <td align="left">&nbsp;<select name="tprice" class="txtq2" id="tprice">
    <? for($x=1;$x<=count($m_price);$x++){?>
    <option value="<?=$x;?>" <? if($_SESSION['m_price']==$m_price[$x]){echo'selected';}?> ><?=$m_price[$x];?></option>
    <? }?>
        </select></td>
  </tr>
  <tr>
    <td align="right" style="padding:10px 0px;"><?=$lang_x[29];?> :</td>
    <td align="left">&nbsp;<select name="trow" class="txtq2" id="trow">
          <option value="1" <? if($_SESSION['m_row']==1){echo'selected';}?> ><?=$lang_member[885];?></option>
          <option value="2" <? if($_SESSION['m_row']==2){echo'selected';}?>><?=$lang_member[884];?></option>
          <option value="3" <? if($_SESSION['m_row']==3){echo'selected';}?>><?=$lang_member[805];?></option>
           <option value="4" <? if($_SESSION['m_row']==4){echo'selected';}?>><?=$lang_member[803];?></option>
        </select></td>
  </tr>
  <tr>
    <td colspan="2" align="center" style="padding:20px 0px;"><input name="b_save" type="submit" class="btn_le" id="b_save" style="width:100px;height:25px;cursor:pointer;" value="<?=$lang_x[1];?>">
    <input type="reset" value="<?=$lang_x[2];?>" class="btn_le" style="width:100px;height:25px;cursor:pointer; background:#F00;"></td>
    </tr>
</table>
  </div>
</div>
</form>
<?
if($alert!=""){echo "<script language='javascript'>alert('$alert');</script>";}

$token = md5(uniqid(rand(),1));
$_SESSION['bettoken']=$token;
$fo="json/login/token_bet/".$_SESSION['m_id'].".php";
write($fo,'<? $bet_token="'.$token.'"; ?>',"w+"); 
?>
</body>
</html>