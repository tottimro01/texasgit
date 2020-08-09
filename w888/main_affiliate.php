<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('inc/conn.php');
require('inc/function.php');
require("lang/variable_lang.php");
// require("lang/member_lang.php");

$rs_mem_af = sql_array("select * from bom_tb_member where m_id = '".$_SESSION['m_id']."'");
$ref_url = 'http://w888.texasbetx.com/r/';
$rec = sql_array("select * from bom_tb_config where con_id = 1;");
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<TITLE><?=$app_title;?></TITLE>
<link rel="stylesheet" type="text/css" href="css/style.css?v=<?=$cache_css;?>">
<link rel="stylesheet" type="text/css" href="css/style2.css?v=<?=$cache_css;?>">
<link rel="stylesheet" type="text/css" href="css/style3.css?v=<?=$cache_css;?>">

<? if($_SESSION['lang']=="mm"){?><link rel="stylesheet" type="text/css" href="css/style_mm.css?v=2019"><? }?>
<link href="jsui/jquery-ui.css?v=0001" rel="stylesheet">
<script src="jsui/external/jquery/jquery.js?v=2019"></script>
<script src="jsui/jquery-ui_<?=$_SESSION['lang'];?>.js" charset="utf-8"></script>
	<script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />
<!-- <link rel="stylesheet" href="css/style2.css?v=<?=$time_stam;?>"> -->

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
  
   function numberonly(event){
  	var e=window.event?window.event:event;
   	var keycode=e.keyCode?e.keyCode:e.which?e.which:e.charCode;

	if ((keycode>=96 && keycode<=105)||(keycode>=48 && keycode<=57)||(keycode==106 )||(keycode==8 )||(keycode==110 )){
    return true;
   }else{
	   return false;
	   }
}


  </script>
  <style>
  .ui-datepicker-trigger {
	   vertical-align: bottom !important;
	   cursor:pointer;
	 }
  </style>
<script>
var fw;
$(document).ready(function() {
	 to_width(<?=$_GET["vvw"]?>);
	 parent.leftx.get_credit();
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
/*  .ui-datepicker-trigger {
	   vertical-align: middle !important;
	   cursor:pointer;
	 }
.txtq2 {
  color: #000;
  border: 1px #333 solid;
  font-size: 12px;
  text-align: center;
  padding: 3px;
}
.txt_white12btitle {
  font-size: 12px;
  color: #fff;
  font-weight: bold;
  text-shadow: 1px 1px 1px #000;
}
.tb_title_lotto {
	background-image: linear-gradient(top, #d9a52e,  #8b691c);
	background-image: -moz-linear-gradient(top, #d9a52e, #8b691c);
	background-image: -webkit-linear-gradient(top, #d9a52e, #8b691c);
	background-image: -o-linear-gradient(top, #d9a52e, #8b691c);
	background-image: -ms-linear-gradient(top, #d9a52e, #8b691c);
	font-size: 12px;
	color: #fff;
	font-weight: bold;
	text-shadow: 1px 1px 1px #000;
}
input.ref{
  width: 250px;
  margin-bottom: 6px;
}*/
</style>
</head>

<body>
<div id="main_left" style="overflow:visible;">
<div id="title_page">
    <div id="ic_title">&gt;</div>
    <span id="stitle"><?=$lang_member[49];?></span>
  </div>

  <? if($rec["con_open_af"]==0){ include 'sa_close.php'; exit(); } ?>
<? 
  include 'mname_tmpl.php'; 
  include 'mtimezone_tmpl.php';
?>
<div style="padding: 0 20px;">
<!--   <h1><?=$lang_member[103];?></h1>
  <h3><?=$lang_member[105];?></h3> -->
  
  <table cellpadding="0" cellspacing="0" class="txt_back11n bg_table" style="width: 100%; table-layout: fixed;">
    <tr class="tb_title_lotto">
      <th><?=$lang_member[1910];?> <?=$lang_member[304]?></th>
 

      <th><?=$lang_member[40];?>  : <?=$af_sport;?>%</th>
      <th><?=$lang_member[36];?>  : <?=$af_lotto;?>%</th>
      <th><?=$lang_member[48];?>  : <?=$af_lothun;?>%</th>
      <th><?=$lang_member[37];?>  : <?=$af_games;?>%</th>
      <th><?=$lang_member[38];?>  : <?=$af_casino;?>%</th>
    </tr>
    <tr class="">
      <td> <?=number_format($rs_mem_af["ref_total"],2)?></td>
      <td><a href="main_affiliate_detail.php?type=sport"> <?=number_format($rs_mem_af["ref_sport"],2)?>	 </a> </td>
      <td><a href="main_affiliate_detail.php?type=lot"> <?=number_format($rs_mem_af["ref_lot"],2)?>	 </a> </td>
      <td><a href="main_affiliate_detail.php?type=hun"> <?=number_format($rs_mem_af["ref_hun"],2)?>	 </a> </td>
      <td><a href="main_affiliate_detail.php?type=games"> <?=number_format($rs_mem_af["ref_games"],2)?>	 </a> </td>
      <td><a href="main_affiliate_detail.php?type=casino"> <?=number_format($rs_mem_af["ref_casino"],2)?> </a> </td>
    </tr>
  </table>
  
  <br><br>
  
  <!--<h1><?=$lang_member[111];?> 100 <?=$_SESSION['m1']['m_currency']?></h1>-->
  <!-- <button class="m-button<? if(intval($rs_mem_af["ref_total"])<100){ echo' btn_dis'; } ?>" onClick="request_credit();" id="btn_request_credit"<? if(intval($rs_mem_af["ref_total"])<100){ echo'disabled'; } ?>><?=$lang_member[113];?></button> -->
  <!-- <button class="m-button" onclick="parent.rightx.location.href='affiliate_transaction.php';"><?=$lang_member[114];?></button> -->
  <button class="btn_le btn_big <? if(intval($rs_mem_af["ref_total"])<=0){ echo' btn_dis'; } ?>" onClick="request_credit();" id="btn_request_credit"<? if(intval($rs_mem_af["ref_total"])<=0){ echo'disabled'; } ?>><?=$lang_member[113];?></button>
  <button class="btn_le btn_big" onclick="parent.rightx.location.href='affiliate_transaction.php';"><?=$lang_member[114];?></button>



  <br><br>
<?/*
  <p class="ref-title"><?=$lang_member[116];?></p>
  <? 
  if(is_null($rs_mem_af['m_user_set']) || empty($rs_mem_af['m_user_set'])){ 
  ?>
    <input type="text" class="ref" name="ref-name" id="ref-name" placeholder="<?=$lang_member[118];?>" value="<?=$rs_mem_af['m_user_set'];?>" >
    <!-- <button class="m-button m-button-2" id="ref-btn" onclick="SaveLinkName(this);"><?=$lang_member[121];?></button> -->
    <button class="btn_le" id="ref-btn" onclick="SaveLinkName(this);"><?=$lang_member[121];?></button>
    <br />
    
    <p id="ref-suggest" style="display: none;">* <?=$lang_member[122];?></p>

    <!-- <br><br> -->
  <? } else { ?>
    <p>* <?=$lang_member[124];?></p>
  <? } ?>

   <?php 
      $url_1 = $ref_url."?u=".$rs_mem_af['m_user_set'];
      $url_1 = tinyUrl_create($url_1);
   ?>
<!-- <input type="text" class="ref" name="ref-name-url" id="ref-name-url" readonly onclick="this.setSelectionRange(0, this.value.length);" value="<?="".$ref_url."?u=".$rs_mem_af['m_user_set'];?>"> -->
 <input type="text" class="ref" name="ref-name-url" id="ref-name-url" readonly onclick="this.setSelectionRange(0, this.value.length);" value="<?=$url_1;?>">


 


  */ ?>
 <br><br>
  
  <p class="ref-title"><?=$lang_member[125];?></p> 
  <?php 
      $url_2 = $ref_url."?ref=".$_SESSION['m_id'];
      $url_2 = tinyUrl_create($url_2);
   ?>
   <!-- <input type="text" class="ref" name="ref-url" id="ref-url" readonly value='<?="".$ref_url."?ref=".$_SESSION['m_id'];?>' onclick="this.setSelectionRange(0, this.value.length);"> -->
  <input type="text" class="ref" name="ref-url" id="ref-url" readonly value='<?=$url_2;?>' onclick="this.setSelectionRange(0, this.value.length);">

  <br><br>
  <p class="ref-title"><?=$lang_member[126];?></p>
  <table cellpadding="0" cellspacing="0" class="txt_back11n bg_table" style="width: 700px;">
    <tr class="tb_title_lotto">
      <th><?=$lang_member[128];?></th>
      <th><?=$lang_member[130];?></th>
      <th><?=$lang_member[131];?></th>
      <th><?=$lang_member[133];?></th>
    </tr>
    <?
	  $sql_af = sql_query("select * from bom_tb_member where bonus_m_id = '".$_SESSION['m_id']."'");
	  while($rs_af=sql_fetch($sql_af)){
	  ?>
    <tr class="">
      <td style="text-align: center;"><?=$rs_af["m_user"]?></td>
      <td style="text-align: center;"><?=$rs_af["m_regis"]?></td>
      <td style="text-align: center;"><?=$rs_af["m_login"]?></td>
      <td style="text-align: left;"><?=$rs_af["m_ref"]?></td>
    </tr>
    <? } ?>
  </table>
  <br><br>
</div>
<!--  -->
</div>
	<script>
	$(document).ready(function($) {
    const ref_url = "<?=$ref_url;?>";
    // $('#ref-name').on('input', function(event) {
    //   event.preventDefault();
    //   let val = $(this).val();
    //   val = val.replace(/[^a-zA-Z0-9.-]/g, '');
    //   $(this).val(val);
    //   $('#ref-name-url').val(ref_url+val);
    // }); 
    var ss = $('#main_affiliate').attr("onClick");
    $('#main_affiliate').hide();
    console.log(ss)
    $('#ref-name').trigger('input');
  });

  function SaveLinkName(button) {
    let n = $.trim($('#ref-name').val());
    if(n.length < 5){ 
      // alert("<?=$lang_member[135];?>"); 
      alert("<?=$lang_member[2148]?>"); 
      return;
    }

    $.ajax({
      url: 'save_linkname.php',
      type: 'post',
      dataType: 'json',
      data: {link_name: n},
      beforeSend: function(){ $(button).attr('disabled', 'disabled'); }
    })
    .done(function(data,status,xhr) {
      if(data["status"]==1){
        $('#ref-name, #ref-btn').remove();
        $('#ref-suggest').css('display', '');
      }
      alert(data["msg"]);
      location.reload();
    })
    .fail(function(){
      alert("<?=$lang_member[57];?>");
    })
    .always(function() {
      $(button).removeAttr('disabled');
    });
  }

	function request_credit(){
		if(confirm("<?=$lang_member[138];?>")==true){
			$.ajax({
				type: "POST",
				url: "request_credit.php",
				data: { "val": "request" },
				dataType:"json",
				cache: false,	// Clear cache IE
				beforeSend: function(){
					$("#btn_request_credit").attr("disabled" , "disabled");
					$("#btn_request_credit").html("<img src='img/loding.gif' style='opacity:1; margin:auto; display:block;'>");
				},
				success: function(data){
					alert(data.msg);
					if(data.status==1){
						/*$("#btn_request_credit").html("เบิกเงิน");
						$("#btn_request_credit").addClass("btn_dis");*/
						parent.leftx.get_credit();
						location.reload();
					}else{
						$("#btn_request_credit").removeAttr("disabled");
						$("#btn_request_credit").html("<?=$lang_member[113];?>");
					}
				}
			});	
		}
	}
	</script>
<?
$token = md5(uniqid(rand(),1));
$_SESSION['bettoken']=$token;
$fo="json/login/token_bet/".$_SESSION['m_id'].".php";
write($fo,'<? $bet_token="'.$token.'"; ?>',"w+"); 
?>

</body>
</html>