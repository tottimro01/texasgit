<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 
    require('inc/conn.php');
    require('inc/function.php');
    require("lang/variable_lang.php");
    include_once __DIR__.'/inc/conn_dd.php';
 ?>

<?php

// require("lang/member_lang.php");
#echo"bom<hr>";


$url_file1="json/transfer/".$_SESSION['m_id']."/tranfer.json";	

$rs_cset = sql_array("select * from bom_tb_agent where r_id = '".$_SESSION['cr_id']."'");

if(isset($_POST['b_save'])){
	// echo $_POST['tdd'];
 //  die();
$fo="json/login/token_bet/".$_SESSION['m_id'].".php";
@require_once($fo);
if($_SESSION['bettoken']!=$bet_token){ exit();}


$_POST['tcount']=str_replace(",","",$_POST['tcount']);
	/*if($_POST['tcount']<100 and ($_SESSION['crid3']==340 || $_SESSION['crid3']==344)){
		@header('Location: main_transfer.php');exit();
	}*/

 // echo $rs_cset["r_m_deposit_min"]."sssss".$rs_cset["r_m_deposit_max"];
//exit();



  $alert_msg = "";
  if($_POST['tcount']<$rs_cset["r_m_deposit_min"])
  {
      $_SESSION['xac2'] = "*".$lang_member[1659]." ".$rs_cset["r_m_deposit_min"]." ".$_SESSION['m1']['m_currency']."!";
  }else if($_POST['tcount']>$rs_cset["r_m_deposit_max"])
  {
      $_SESSION['xac2'] = "*".$lang_member[1660]." ".$rs_cset["r_m_deposit_max"]." ".$_SESSION['m1']['m_currency']."!";
  }else{
      if($_POST['tbank']!="" and $_POST['tcount']!="" and $_POST['tdd']!="" and $_POST['thh']!=""){
      
          $sql="select * from bom_tb_trans where t_type=1 and m_id='".$_SESSION['m_id']."' and t_status=3";
          $num=sql_num($sql);
          if($num==0){
          	
          	 $txt="BC=".$_POST['tbankcode'];
          	 $tdate_bet=$_POST['tdd']." ".$_POST['thh'].":".$_POST['tmm'].":00";
              $sql="INSERT IGNORE INTO bom_tb_trans (t_bank, t_note, t_date_bet ,t_date,t_count,t_type,m_id,r_id, t_ip,r_agent_id ) values ('".$_POST['tbank']."', '$txt', '$tdate_bet' ,now() , '"    .$_POST['tcount']."'  , 1 , '".$_SESSION['m_id']."' , '".$_SESSION['cr_id']."','"._bIP()."' ,'".$_SESSION['r_agent_id']."')";
          	 sql_query($sql);
            
            
              $ag_update = "UPDATE `bom_tb_agent` SET `r_alert_in`= r_alert_in+1 where r_id = '".$_SESSION['cr_id']."'"; 
              sql_query($ag_update);
          
          	
               ############################
               /*
               $fo="json/login/tranfer/".$_SESSION['crid'].".php";
               
               if( 0 != @filesize($fo)){
               @require_once($fo);
               $alert_txt=intval($m_tranfer)+1;
               $fp = @fopen($fo, 'w');
               @fwrite($fp, '<? $m_tranfer="'.$alert_txt.'"; ?>');
               @fclose($fp);
               
               
               
               }else{
               $fp = @fopen($fo, 'w');
               @fwrite($fp, '<? $m_tranfer="1"; ?>');
               @fclose($fp);
               	}*/
               ############################
               $_SESSION['xac1']=$lang_member[88];
               
               
               ####################################
               $js1=array();
               $re=sql_page("bom_tb_trans where m_id='".$_SESSION['m_id']."'  and t_type=1     ","t_id"," desc, t_status desc",100);
               while($rs=sql_fetch($re['re'])){	
               $js1[]=array("t_bank"=>"".$rs["t_bank"]."","t_date_bet"=>"".$rs["t_date_bet"]."","t_date"=>"".$rs["t_date"]."","t_count"=>"".$rs["t_count"]."","t_status"=>"".$rs["t_status"]."");
               }
               ####################################		
               $txt1=json_encode($js1);
               write($url_file1 ,$txt1,"w+"); 
          
          
          }else{
              $_SESSION['xac2']=$lang_member[962];
          }
      }
  }
	
}


$rec = sql_array("select * from bom_tb_config where con_id = 1;");

?>

<?php 

 ?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<TITLE><?=$app_title;?></TITLE>


<link rel="stylesheet" type="text/css" href="css/style.css?v=<?=$cache_css;?>">
<link rel="stylesheet" type="text/css" href="css/style3.css?v=<?=$cache_css;?>">

<? if($_SESSION['lang']=="mm"){?><link rel="stylesheet" type="text/css" href="css/style_mm.css?v=2019"><? }?>
<link href="jsui/jquery-ui.css?v=0001" rel="stylesheet">
<script src="jsui/external/jquery/jquery.js?v=2019"></script>
<script src="jsui/jquery-ui.min.js" charset="utf-8"></script>
<script src="jsui/jquery-ui_<?=$_SESSION['lang'];?>.js" charset="utf-8"></script>

<!-- <script src="<?=$hostserver;?>/js/jquery-1.9.1.min.js"></script>   -->
<link rel="stylesheet" href="<?=$hostserver;?>/js/jquery-confirm/jquery-confirm.min.css"> 
<link rel="stylesheet" href="<?=$hostserver;?>/js/jquery-confirm/jquery-confirm-custom.css?v=<?=$cache_css;?>" /> 
<script src="<?=$hostserver;?>/js/jquery-confirm/jquery-confirm.min.js"></script> 


<script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
<link href="jsui/jquery-ui-custom.css" rel="stylesheet">
<script src="<?='js/datepicker_lang/datepicker_'.$_SESSION['lang'].'.js';?>"></script>

<script src="js/msDropdown/jquery.dd.min.js"></script>
<link rel="stylesheet" href="js/msDropdown/dd.css" />

<link rel="stylesheet" href="<?=$hostserver;?>/js/jquery-confirm/jquery-confirm.min.css">
<link rel="stylesheet" href="<?=$hostserver;?>/js/jquery-confirm/jquery-confirm-custom.css?v=00002" />
<script src="<?=$hostserver;?>/js/jquery-confirm/jquery-confirm.min.js"></script>

<style>
  .ddcommon .ddTitle .ddTitleText img, .ddcommon .ddChild li img{
    width: 26px;
  }
  #r_bank_msdd{
    width: 210px!important;
  }
</style>
<script>
  var fw;
  $(document).ready(function($){
    $( "#datepicker" ).datepicker({
      maxDate : new Date(),
      defaultDate : new Date(),
      buttonImage: "img/calendar.png",
      buttonImageOnly: true,
      buttonText: "Select date",
      dateFormat:"dd-mm-yy",
      altFormat: "yy-mm-dd",
      altField: "#tdd",
    });
    $("#datepicker").datepicker('setDate', new Date()); 
    // $("#datepicker").datepicker({maxDate: new Date()});
    // $(".datepicker").datepicker("setDate", new Date());

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
    /*
  .ui-datepicker-trigger {
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
	  	   .res_date_form {
	display: flex;
}

 .ui-datepicker-trigger {
     vertical-align: middle !important;
     cursor:pointer;
   }

.res_date_form button.calendar {
	background-color: #ffffff;
	border: 1px solid #333;
	border-right: 0;
	height: 28px;
	cursor: pointer;
}

.res_date_form button.calendar img {
    height: 18px;
}

.res_date_form input[type="text"] {
	flex: 1;
	border: 1px solid #a4a4a4;
	height: 26px;
	padding: 0 6px;
	margin-right: 5px;
	border: 1px #333 solid;
}

.res_date_form input[type="submit"] {
	border: 1px solid #333;
	border-left: 0;
	height: 28px;
	width: 60px;
	background-image: -moz-linear-gradient(top, #d9a52e, #8b691c);
  background-image: -webkit-linear-gradient(top, #d9a52e, #8b691c);
  background-image: -o-linear-gradient(top, #d9a52e, #8b691c);
  background-image: -ms-linear-gradient(top, #d9a52e, #8b691c);
  font-size: 12px;
  color: #fff;
  font-weight: bold;
  text-shadow: 1px 1px 1px #000;
  cursor: pointer;
}*/
  </style>
</head>

<body>
<?
include 'spin_reward.php';
//   include("popvdo.php");
?>
<div id="main_left" style="overflow:visible;">
<!-- <div id="title_page">
    <div id="ic_title">&gt;</div>
    <span id="stitle"><?=$lang_member[965];?></span>
  </div> -->
  <div id="menu_lotto">
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
      <tbody>
        <tr align="center" height="32">

          <td class="mlotto mactive" align="center"><a onClick="javascript:void(0);"><?=$lang_member[967];?></a></td>
            <td width="4"></td>
          <td class="mlotto" align="center"><a onClick="window.location.href = 'main_withdraw.php?tlot=&vvw='+fw"><?=$lang_member[968];?></a></td>

        </tr>
      </tbody>
    </table>
  </div>

<? if($rec["con_open_tranfer"]==0){ include 'sa_close.php'; exit(); } ?>
<? if($rs_cset["r_open_transfer"]==0 || ($rs_cset["r_m_deposit_open"]==0 && $rs_cset["r_m_withdraw_open"]==0)){ include 'ag_close.php'; exit(); } ?>
<? if($rs_cset["r_m_deposit_open"]==0){ ?><script type="text/javascript">window.location.href = 'main_withdraw.php?vvw='+fw</script><? exit(); } ?>
<? 
  include 'mname_tmpl.php'; 
  include 'mtimezone_tmpl.php';
?>
<br><br>

 <!--  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="200" align="center">
    	<input type="button" value="<?=$lang_member[967];?>" class="btn_le green w150px" disabled>
        
    </td>
    <td rowspan="2">
    <form action="" class="form-transfer" method="post" onsubmit="$('#b_save').hide();">
    		<table width="100%" border="0" cellspacing="1" cellpadding="5">
  <tr>
    <td width="45%" align="right" class="txt_white12btitle"><strong><?=$lang_member[975];?> :</strong></td>
    <td width="55%" >
    <?
		$rs_mems = sql_array("select * from bom_tb_member where m_id='".$_SESSION['m_id']."'");
		if($rs_mems["bank_id"]>0 and $rs_mems["bank_id"]!=""){
			$rs_bank_mem = sql_array("select * from bom_tb_bank where bank_id = '".$rs_mems['bank_id']."'");
			?>
			<img src="img/b<?=$rs_bank_mem['bank_name'];?>.png" style="float:left;" >
	<?=$ab_bank[$rs_bank_mem['bank_name']];?> <b class="cbu"><?=$rs_bank_mem['bank_cname'];?></b><br> <b><?=_bankok($rs_bank_mem['bank_code']);?></b>
		<input type="hidden" value="<?=$rs_bank_mem['bank_name']?>" name="tbank">
	<?
		}else{
	?>
    <select class="txtq2" name="tbank" id="tbank" required>
      <?for($x=1;$x<=count($ab_bank)-2;$x++){?>
      <option value="<?=$x;?>"><?=$ab_bank[$x];?></option>
      <?}?>
    </select>
  <? } ?>
                                      
                                      
                                      </td>
    </tr>
    <? if($rs_mems["bank_id"]>0 and $rs_mems["bank_id"]!=""){ ?><input type="hidden" value="<?=substr($rs_bank_mem['bank_code'] , 6 , 4)?>" name="tbankcode"><? }else{ ?>
  <tr>
    <td align="right" class="txt_white12btitle"><strong><?=$lang_member[976];?> :</strong></td>
    <td align="left" ><input name="tbankcode" type="tel" class="txtq2" id="tbankcode" onkeydown="return numberonly(event,this);" size="15" minlength="4" maxlength="4" required></td>
    </tr>
    <? } ?>
  <tr>
    <td align="right" class="txt_white12btitle"><strong><?=$lang_member[106];?> :</strong></td>
    <td align="left" >
		<div class="res_date_form">
      
		<button class="calendar" onclick="$('#datepicker').focus(); return false;">
		<span><img src="img/calendar.png" alt=""></span>
	</button>
	<input type="hidden" id="tdd" name="tdd">
  <input type="text" id="datepicker" name="datepicker-display">

		
		
      <select id="thh" name="thh" class="txtq2" required style="margin-left: 4px;">
        <?for($x=0;$x<=23;$x++){?>
          <option value="<?=sprintf("%02d",$x)?>"><?=sprintf("%02d",$x)?></option>
        <?}?>
      </select>
      
      :<select id="tmm" name="tmm" class="txtq2">
        <?for($x=0;$x<=59;$x++){?>
          <option value="<?=sprintf("%02d",$x)?>"><?=sprintf("%02d",$x)?></option>
        <?}?>        
      </select>
    </div>

    </td>
    </tr>
  <tr>
    <td align="right" class="txt_white12btitle"><strong><?=$lang_member[969];?> :</strong></td>
    <td align="left" ><input name="tcount" type="tel" class="txtq2" id="tcount" onkeydown="return numberonly(event,this);" size="15" maxlength="10" required> </td>
    </tr>
  <tr>
    <td align="center" class="red"></td>
    <td ><input type="submit" name="b_save" id="b_save" value="<?=$lang_member[121];?>" class="btn_le" >
<span class="red" style="text-align: right; float: right;">
      <?=$lang_member[1659];?> <?=number_format($rs_cset["r_m_deposit_min"] , 2)?> <?=$_SESSION['m1']['m_currency']?><br>
      <?=$lang_member[1660];?> <?=number_format($rs_cset["r_m_deposit_max"] , 2)?> <?=$_SESSION['m1']['m_currency']?>
    </span>
    </td>
    </tr>
</table></form>
    </td>
  </tr>
  <tr>
    <td align="center">
<? if($rs_cset["r_m_withdraw_open"]==1){ ?>
      <input type="button" value="<?=$lang_member[968];?>" class="btn_le orange w150px" onclick="window.location.href = 'main_withdraw.php?vvw='+fw">
<? } ?>
    </td>
  </tr>
  </table> -->

<!-- new -->
<form action="" class="" method="post" onsubmit="$('#b_save').hide();">
<div> 
<?
    $sql = "SELECT * FROM `bom_tb_bank` WHERE `r_id` = ".$_SESSION["cr_id"]." ORDER BY bank_id DESC";

    $re_bank=sql_query($sql);
    $rs_mems = sql_array("select * from bom_tb_member where m_id='".$_SESSION['m_id']."'");
?>

<? if($_SESSION['m1']['m_b_bank']!="" && $_SESSION['m1']['m_b_bank'] != 0){ ?>
<div class="transfer_step_box">
  <div>
    <table cellpadding="2">
      <tr>
        <td align="right"><strong><?=$lang_member[2374];?>: </strong></td>
        <td>
          <img src="img/b<?=$_SESSION['m1']['m_b_bank'];?>.png" style="float:left;" >
          <?=$ab_bank[$_SESSION['m1']['m_b_bank']];?> <b class="cbu"><?=$_SESSION['m1']['m_b_name'];?></b><br> <b><?=_bankok($_SESSION['m1']['m_b_code']);?></b>
        </td>
      </tr>
    </table>
  </div>
</div>

<? }else{ ?>
<div class="transfer_step_box">
  <div>
    <table cellpadding="2">
      <tr>
        <td>
			<button onclick="openUserBankAdd(event); return false;" style="background-color: transparent; border: 0;">
				<img src="img/transfer/add-icon.png" alt="" style="width: 40px;">
			</button>
        </td>
      </tr>
    </table>
  </div>
</div>
<? } ?>

<div style="text-align: center;">
  <img src="img/transfer/arrow_down.png" alt="" style="width: 50px; height: 40px;">
</div>



<div class="transfer_step_box">
  <div>
    <table cellpadding="2">
        <? if($rs_mems["m_b_type"] == 2){ ?>
        <tr>
          <td colspan="2">
            <div style="text-align: center;">
              <img src="img/transfer/AutoV3.png" alt="" style="width: 120px;">
            </div>
          </td>
        </tr>
        <? }else{ ?>
        <tr>
          <td align="right"><strong><?=$lang_member[969];?> :</strong></td>
          <td>
              <div>
                <input name="tcount" type="tel" class="txtq2" id="tcount" onkeydown="return numberonly(event,this);" size="15" maxlength="10" required>
              </div>
            </td>
        </tr>
        <tr>
          <td align="right"><strong><?=$lang_member[106];?> :</strong></td>
          <td>

              <div class="res_date_form"> 
                <button class="calendar" onclick="$('#datepicker').focus(); return false;">
                  <span><img src="img/calendar.png" alt=""></span>
                </button>
                <input type="hidden" id="tdd" name="tdd">
                <input type="text" id="datepicker" name="datepicker-display">
                <select id="thh" name="thh" class="txtq2" required style="margin-left: 4px;">
                  <?for($x=0;$x<=23;$x++){?>
                  <option value="<?=sprintf("%02d",$x)?>"><?=sprintf("%02d",$x)?></option>
                  <?}?>
                </select>
                  
                :<select id="tmm" name="tmm" class="txtq2">
                  <?for($x=0;$x<=59;$x++){?>
                  <option value="<?=sprintf("%02d",$x)?>"><?=sprintf("%02d",$x)?></option>
                  <?}?>        
                </select>
              </div>
            </td>
          </tr>
          <tr>
            <td colspan="2" style="text-align: center;">
              <input type="submit" name="b_save" id="b_save" value="<?=$lang_member[121];?>" class="btn_le" >
            </td>
          </tr>
      <? } ?>
    </table>
  </div>
</div>

<div style="text-align: center;">
  <img src="img/transfer/arrow_down.png" alt="" style="width: 50px; height: 40px;">
</div>

<div class="transfer_step_box">
  <div>
    <table cellpadding="2">
      <tr>
      <td align="right"><strong><?=$lang_member[2375];?>:</strong></td>
      <td>
        <?
    if($rs_mems["bank_id"]>0 and $rs_mems["bank_id"]!=""){
      $rs_bank_mem = sql_array("select * from bom_tb_bank where bank_id = '".$rs_mems['bank_id']."'");
      ?>
      <img src="img/b<?=$rs_bank_mem['bank_name'];?>.png" style="float:left;" >
  <?=$ab_bank[$rs_bank_mem['bank_name']];?> <b class="cbu"><?=$rs_bank_mem['bank_cname'];?></b><br> <b><?=_bankok($rs_bank_mem['bank_code']);?></b>
    <input type="hidden" value="<?=$rs_bank_mem['bank_name']?>" name="tbank">
  <?
    }else{
  ?>
    <select class="txtq2" name="tbank" id="tbank" required>
      <?for($x=1;$x<=count($ab_bank)-2;$x++){?>
      <option value="<?=$x;?>"><?=$ab_bank[$x];?></option>
      <?}?>
    </select>
  <? } ?>
      </td>
    </tr>

    <? if($rs_mems["bank_id"]>0 and $rs_mems["bank_id"]!=""){ ?><input type="hidden" value="<?=substr($rs_bank_mem['bank_code'] , 6 , 4)?>" name="tbankcode"><? }else{ ?>
  <tr>
    <td align="right"><strong><?=$lang_member[976];?> :</strong></td>
    <td align="left" ><input name="tbankcode" type="tel" class="txtq2" id="tbankcode" onkeydown="return numberonly(event,this);" size="15" minlength="4" maxlength="4" required></td>
    </tr>
    <? } ?>

    </tr>
    </table>
  </div>
</div>
</form>
<!-- <? if($rs_mems["m_b_type"] != 2){?>
<div class="">
  <div>
    <table cellpadding="2" style="width: 100%;">
   <tr>
  <td colspan="2" align="center">
    <input type="submit" name="b_save" id="b_save" value="<?=$lang_member[121];?>" class="btn_le" >
  </td>
</tr>
    </table>
  </div>
</div>  
<? } ?> -->

<!-- <table style="margin: 0 auto; table-layout: fixed;" cellpadding="2"> -->
    
 <!--  <tr>
    <td align="right"><strong><?=$lang_member[2374];?>: </strong></td>
    <td>
      <img src="img/b<?=$_SESSION['m1']['m_b_bank'];?>.png" style="float:left;" >
      <?=$ab_bank[$_SESSION['m1']['m_b_bank']];?> <b class="cbu"><?=$_SESSION['m1']['m_b_name'];?></b><br> <b><?=_bankok($_SESSION['m1']['m_b_code']);?></b>
    </td>
  </tr> -->

    
<!-- 
    <tr>
      <td colspan="2">
        <div style="text-align: center;">
          <img src="img/transfer/arrow_down.png" alt="" style="width: 50px;">
        </div>
      </td>
    </tr> -->

<!--   <? if($rs_mems["m_b_type"] == 2){ ?>
  <tr>
    <td colspan="2">
      <div style="text-align: center; margin-top: 10px; margin-bottom: 10px;">
        <img src="img/transfer/AutoV3.png" alt="" style="width: 120px;">
      </div>
    </td>
  </tr>
  <? }else{ ?>
  <tr>
    <td align="right"><strong><?=$lang_member[969];?> :</strong></td>
    <td>
        <div>
          <input name="tcount" type="tel" class="txtq2" id="tcount" onkeydown="return numberonly(event,this);" size="15" maxlength="10" required>
        </div>
      </td>
  </tr>
  <tr>
    <td align="right"><strong><?=$lang_member[106];?> :</strong></td>
    <td>

        <div class="res_date_form"> 
          <button class="calendar" onclick="$('#datepicker').focus(); return false;">
            <span><img src="img/calendar.png" alt=""></span>
          </button>
          <input type="hidden" id="tdd" name="tdd">
          <input type="text" id="datepicker" name="datepicker-display">
          <select id="thh" name="thh" class="txtq2" required style="margin-left: 4px;">
            <?for($x=0;$x<=23;$x++){?>
            <option value="<?=sprintf("%02d",$x)?>"><?=sprintf("%02d",$x)?></option>
            <?}?>
          </select>
            
          :<select id="tmm" name="tmm" class="txtq2">
            <?for($x=0;$x<=59;$x++){?>
            <option value="<?=sprintf("%02d",$x)?>"><?=sprintf("%02d",$x)?></option>
            <?}?>        
          </select>
        </div>
      </td>
    </tr>

<? } ?> -->
<!-- 
  <tr>
    <td colspan="2">
      <div style="text-align: center;">
        <img src="img/transfer/arrow_down.png" alt="" style="width: 50px;">
      </div>
    </td>
  </tr> -->

<!--   <tr>
      <td align="right"><strong><?=$lang_member[2375];?>:</strong></td>
      <td>
        <?
    $rs_mems = sql_array("select * from bom_tb_member where m_id='".$_SESSION['m_id']."'");
    if($rs_mems["bank_id"]>0 and $rs_mems["bank_id"]!=""){
      $rs_bank_mem = sql_array("select * from bom_tb_bank where bank_id = '".$rs_mems['bank_id']."'");
      ?>
      <img src="img/b<?=$rs_bank_mem['bank_name'];?>.png" style="float:left;" >
  <?=$ab_bank[$rs_bank_mem['bank_name']];?> <b class="cbu"><?=$rs_bank_mem['bank_cname'];?></b><br> <b><?=_bankok($rs_bank_mem['bank_code']);?></b>
    <input type="hidden" value="<?=$rs_bank_mem['bank_name']?>" name="tbank">
  <?
    }else{
  ?>
    <select class="txtq2" name="tbank" id="tbank" required>
      <?for($x=1;$x<=count($ab_bank)-2;$x++){?>
      <option value="<?=$x;?>"><?=$ab_bank[$x];?></option>
      <?}?>
    </select>
  <? } ?>
      </td>
    </tr>

    <? if($rs_mems["bank_id"]>0 and $rs_mems["bank_id"]!=""){ ?><input type="hidden" value="<?=substr($rs_bank_mem['bank_code'] , 6 , 4)?>" name="tbankcode"><? }else{ ?>
  <tr>
    <td align="right"><strong><?=$lang_member[976];?> :</strong></td>
    <td align="left" ><input name="tbankcode" type="tel" class="txtq2" id="tbankcode" onkeydown="return numberonly(event,this);" size="15" minlength="4" maxlength="4" required></td>
    </tr>
    <? } ?>

    </tr>
 -->
<!--   
<? if($rs_mems["m_b_type"] != 2){?>
   <tr>
  <td colspan="2" align="center">
    <input type="submit" name="b_save" id="b_save" value="<?=$lang_member[121];?>" class="btn_le" >
  </td>
</tr>
<? } ?> -->
  
<!-- </table> -->

</div>


  <br>
<? if($_SESSION['xac1']!=''){?>  <div style="background:#6F9; padding:10px; text-align:center; "><?=$_SESSION['xac1'];?></div><? }?>
<? if($_SESSION['xac2']!=''){?>  <div style="background:#F63; padding:10px; text-align:center; "><?=$_SESSION['xac2'];?></div><? }?>
<? 
$_SESSION['xac1']='';
$_SESSION['xac2']='';
 ?>
  <table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#382701" class="oho_tb">
  <tbody>
    <tr class="tb_title_lotto">
      <td width="6%" align="center"><?=$lang_member[425];?></td>
      <td width="19%" align="center"><?=$lang_member[77];?></td>
      <td width="22%" align="center"><?=$lang_member[976];?></td>
      <td width="18%" align="center"><?=$lang_member[971];?></td>
      <td width="18%" align="center"><?=$lang_member[969];?></td>
      <td width="17%" align="center"><?=$lang_member[301];?></td>
    </tr>
  </tbody>
<?
// $cc=1;


// $ok_js=file_get_contents2($url_file1);
// $ok_bet = json_decode2($ok_js, true);
#print_r($ok_bet);
//foreach($ok_bet as $rs){
// $sql_list_tran = sql_query("select * from bom_tb_trans where m_id='".$_SESSION['m_id']."'  and t_type=1 order by t_id desc , t_status desc limit 100");
// while($rs=sql_fetch($sql_list_tran)){
//   $last4digit = explode("=", $rs['t_note']);
?>
  <!-- <tr class="tb_ball">
    <td align="center" ><?=$cc;?></td>
    <td align="center" ><?=$ab_bank[$rs['t_bank']];?></td>
    <td align="center" ><?=$last4digit[1];?></td>
    <td align="center"><?=date('d-m-Y H:i:s', strtotime($rs['t_date']));?></td>
   <td align="center"><?=number_format($rs['t_count'],2 );?></td>
    <td align="center"><?=$ab_status[$rs['t_status']];?></td>
    </tr> -->
<? //$cc++;}?>
<tbody id="tf_table"></tbody>
</table>
<button style="background-color: transparent; color: transparent; border: 0;" onclick="activeSpinGame();">test</button>

</div>
<?
$token = md5(uniqid(rand(),1));
$_SESSION['bettoken']=$token;
$fo="json/login/token_bet/".$_SESSION['m_id'].".php";
write($fo,'<? $bet_token="'.$token.'"; ?>',"w+"); 
?>
<script>
loadTransferData();
setInterval(loadTransferData, (60*1000));
function loadTransferData(){
  $.ajax({
    url: 'transfer_data.php',
    type: 'get',
    dataType: 'html',
    data: {type: 'transfer'},
    timeout: (30*1000),
  })
  .done(function(res){
    $('#tf_table').html(res)
  })
  .fail(function(){
  })
  .always(function(){
  });
}
 // $("body #r_bank").msDropDown({});

var _jcUserBank = _jcUserBank = null;
function openUserBankAdd(event){
    event.stopImmediatePropagation()
    if(null!==_jcUserBank)
      return;

    if(null!==_jcUserBank)
      _jcUserBank.close();

    var _form = $('#tmpl-mbank-form').html();
    _jcUserBank = $.dialog({
        title: '<?=$lang_member[2309];?>',
        content: _form,
        useBootstrap: false,
        theme: "oho",
        closeIcon: true,
        animation: 'none',
        closeAnimation: 'none',
        backgroundDismiss: true,
        onContentReady: function(){
          var self = this;
          $(self.$content).on('submit', 'form', function(event){
            event.preventDefault();
            var fd = new FormData(event.target);

            _jcUserBank.setContent('<div style="text-align: center; margin: 20px 0;"><img src="http://w1.wan1991.com/template/sportsbook/public/images/layout/loading.gif" /></div>');
            submitUserBank(fd).then(function(res){
              _jcUserBank.close();
              console.log('save')
              parent.rightx.location.reload();
            }, function(msg){
              _jcUserBank = $.dialog({
                title: "<?=$lang_member[67];?>",
                content: '<div style="color: red; text-align: center; font-size: 12px; margin-top: 10px; margin-bottom: 10px;">'+msg+'</div>',
                useBootstrap: false,
                theme: "oho",
                closeIcon: true,
                animation: 'none',
                closeAnimation: 'none',
                backgroundDismiss: true,
                onClose: function(){
                  _jcUserBank = null;
                },
              })
              _jcUserBank.close();
            });
          });

          $(self.$content).on('click', '._close', function(event){
            event.preventDefault();
            _jcUserBank.close();
          });
        },
        onClose: function(){
          _jcUserBank = null;
        },
    });
  }

  function submitUserBank($fd){
    var $def = $.Deferred();
    $.ajax({
      url: 'muserbank_save.php',
      type: 'post',
      dataType: 'json',
      data: $fd,
      contentType: false,
      processData: false,
    })
    .done(function(data){
      if(data.status==1){
        $def.resolve(true);
      }else{
        $def.reject(data.msg);
      }
    })
    .fail(function() {
      $def.reject("<?=$lang_member[66];?>");
    });
    return $def.promise();
  }

</script>
<template id="tmpl-mbank-form">
<div style="margin-top: 15px; margin-bottom: 15px;">
  <form action="#" method="post" class="jquery-confirm-form">
    <fieldset style="border: 0; padding: 0; margin: 0;">
    	<div style="margin-bottom: 4px;">
    		<label for="tbank" style="margin-bottom: 4px; display: block;"><?=$lang_member[77];?></label>
    		<select class="txtq2" name="tbank" id="tbank" required style="height: 26px;">
    		<?for($x=1;$x<=count($ab_bank)-2;$x++){?>
    		<option value="<?=$x;?>"><?=$ab_bank[$x];?></option>
    		<?}?>
    		</select>
    	</div>
    	<div style="margin-bottom: 4px;">
    		<label for="tbanknum" style="margin-bottom: 4px; display: block;"><?=$lang_member[79];?></label>
    		<input name="tbanknum" type="tel" id="tbanknum" onkeydown="return numberonly(event,this);" size="15" minlength="10" maxlength="10" required autocomplete="off">
    	</div>
    	<div style="margin-bottom: 4px;">
    		<label for="tbankname" style="margin-bottom: 4px; display: block;"><?=$lang_member[80];?></label>
    		<input name="tbankname" type="tel" id="tbankname" size="15" required autocomplete="off">
    	</div>
    	<div style="margin-bottom: 4px;">
    		<label for="tbankcode" style="margin-bottom: 4px; display: block;"><?=$lang_member[974];?></label>
    		<input name="tbankcode" type="tel" id="tbankcode" onkeydown="return numberonly(event,this);" size="15" minlength="4" maxlength="4" required autocomplete="off">
    	</div>
      <div style="margin-top: 8px;">
        <div class="jconfirm-buttons oho-btns" style="border: 0;padding: 0;">
          <button type="submit" class="btn btn-default oho-btn _submit"><span><?=$lang_member[64];?></span></button>
          <button type="button" class="btn btn-default oho-btn _close"><span><?=$lang_member[65];?></span></button>
        </div>
      </div>
    </fieldset>
  </form>
</div>
</template>
</body>
</html>
