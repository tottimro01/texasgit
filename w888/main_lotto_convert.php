<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('inc/conn.php');
require('inc/function.php');

require("lang/variable_lang.php");
// require("lang/member_lang.php");
require("lang/function_array.php");



if(isset($_POST['b_save'])){
	$lotpay='pay,'.($_POST['lot_pay1']).','.($_POST['lot_pay2']).','.($_POST['lot_pay3']).','.($_POST['lot_pay4']).','.($_POST['lot_pay5']).','.($_POST['lot_pay6']).','.($_POST['lot_pay7']).','.($_POST['lot_pay8']).','.($_POST['lot_pay9']).','.($_POST['lot_pay10']).','.($_POST['lot_pay11']).','.($_POST['lot_pay12']).','.($_POST['lot_pay13']).','.($_POST['lot_pay14']).','.($_POST['lot_pay15']).','.($_POST['lot_pay16']).','.($_POST['lot_pay17']).','.($_POST['lot_pay18']).','.($_POST['lot_pay19']).','.($_POST['lot_pay20']).','.($_POST['lot_pay21']).','.($_POST['lot_pay22']).','.($_POST['lot_pay23']).','.($_POST['lot_pay24']).','.($_POST['lot_pay25']);

   $sql="update  bom_tb_member set m_lotto_convert_pay='$lotpay'  where m_id='".$_SESSION['m_id']."'";
   sql_query($sql);
   
$_SESSION['m_lotto_convert_pay'] = $lotpay;
}


?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Convert Lotto</title>
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
</style>
</head>

<body>
<form action="" method="post">
<div id="main_left" style="overflow:visible;">
<div id="title_page">
    <div id="ic_title">&gt;</div>
    <span id="stitle"><?=$lang_member[589];?></span>
  </div>

  <?
   ################Config Member
$url_file="json/config/member/LottoConfig_".$_SESSION['m_id'].".json";	
$lot6_js=file_get_contents2($url_file);
$lot_m = json_decode2($lot6_js, true);

$emconpay=@explode(',',$_SESSION['m_lotto_convert_pay']); 

 $empay=@explode(',',$lot_m['m_lotto_pay_member']); 
 $emdis=@explode(',',$lot_m['m_lotto_dis_member']); 
 
  $emhpay=@explode(',',$lot_m['m_lotto_hun_pay_member']); 
 $emhdis=@explode(',',$lot_m['m_lotto_hun_dis_member']); 

  ?>
  	<table width="70%" border="0" cellspacing="0" cellpadding="0">
    <?  // for($x=1;$x<=count($lot_type[$_SESSION['lang']]);$x++){

    foreach ($lot_type[$_SESSION['lang']][1] as $x => $value) {

		
		if($x==4 or $x==5 or $x==18 ){
 if($empay[$x]>0 or $emhpay[$x]>0){
	 

$bet=round(( round((1000/$empay[$x]),10) - (  round((1000/$empay[$x]),10) * round(($emdis[$x]/100),10) ) ),2);

		?>
  <tr>
    <td align="right" style="padding:10px 0px;"><?=$lot_type[$_SESSION['lang']][1][$x];?> :</td>
    <td align="left">
     <input type="text" class="txt_back12n" value="<?=$bet;?>" size="5" readonly="readonly"> <?=$lang_member[587];?>
    <input name="lot_pay<?=$x;?>" type="text" class="txt_back12n" id="lot_pay<?=$x;?>" value="<?=$emconpay[$x];?>" size="5">
    <?=$lang_member[162];?>  <?=$empay[$x];?> <?=$lang_member[582];?> <?=$emdis[$x];?></td>
  </tr>
  <? }}}?>
  <tr>
    <td colspan="2" align="center" style="padding:20px 0px;"><input name="b_save" type="submit" class="btn_le" id="b_save" style="width:100px;height:25px;cursor:pointer;" value="<?=$lang_member[121];?>"></td>
  </tr>
</table>

</div></form>

</body>
</html>