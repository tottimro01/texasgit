<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('inc/conn.php');
require('inc/function.php');

require("lang/variable_lang.php");
// require("lang/member_lang.php");


$url_file1="json/transfer/".$_SESSION['m_id']."/draw.json";	

$rs_cset = sql_array("select * from bom_tb_agent where r_id = '".$_SESSION['cr_id']."'");


if(isset($_POST['b_save']))
{
	
  $fo="json/login/token_bet/".$_SESSION['m_id'].".php";
  @require_once($fo);
  if($_SESSION['bettoken']!=$bet_token){ exit();}

  $sql="select * from bom_tb_member where m_id='".$_SESSION['m_id']."'";
  $re_m=sql_array($sql);
  /*
  // if($_SESSION["m1"]['m_b_pass']!=$_POST['tcode'])
  // {
  	// echo"<script language='JavaScript'>
       // alert('".$lang_member[974]." ".$lang_member[980]."');
  	      // window.location.href='main_withdraw.php?vvw=0';
      // </script>";
  	// 
  // }else{
    */
    $_POST['tcount']=str_replace(",","",$_POST['tcount']);
    // if($_POST['tcount']<$rs_cset["r_m_withdraw_min"] || $_POST['tcount']>$rs_cset["r_m_withdraw_max"]){
    //     @header('Location: main_withdraw.php');exit();
    // }
    // if( $_POST['tcount']!="" and $_POST['tcode']!="")
    if( $_POST['tcount']!="")
    {
      if($_POST['tcount']<$rs_cset["r_m_withdraw_min"] )
      {
        $_SESSION['xac2'] = "*".$lang_member[1661]." ".$rs_cset["r_m_withdraw_min"]." ".$_SESSION['m1']['m_currency']."!";
      }else if($_POST['tcount']>$rs_cset["r_m_withdraw_max"])
      {
        $_SESSION['xac2'] = "*".$lang_member[1662]." ".$rs_cset["r_m_withdraw_max"]." ".$_SESSION['m1']['m_currency']."!";
      }else{

      	if($re_m['m_count']>=$_POST['tcount'])
        {
            $sql="select * from bom_tb_trans where t_type=2 and m_id='".$_SESSION['m_id']."' and t_status=3";
            $num=sql_num($sql);  
            if($num==0)
            {
              $c_date=date("Y-m-d");
              // $txt="PASS:".$re_m['m_b_pass']."=".$_POST['tcode']."@".$re_m['m_b_code']."@".$re_m['m_b_name'];
              $txt="PASS:".$re_m['m_b_pass']."@".$re_m['m_b_code']."@".$re_m['m_b_name'];
			  
			  $request_code;
			   include("main_withdraw_curl.php");
             
              $sql="INSERT IGNORE INTO bom_tb_trans (t_bank, t_note, t_date_bet ,t_date,t_count,t_type,m_id,r_id, t_ip,r_agent_id  , t_ref  ) values ('".$re_m['m_b_bank']."', '$txt', now() ,now() , '".$_POST['tcount']."'  , 2 , '".$_SESSION['m_id']."' , '".$_SESSION['cr_id']."','"._bIP()."','".$_SESSION['r_agent_id']."' ,'$request_code')";
              sql_query($sql);

              $ag_update = "UPDATE `bom_tb_agent` SET `r_alert_out`= r_alert_out+1 where r_id = '".$_SESSION['cr_id']."'"; 
              sql_query($ag_update);
              
              $mem_update = "UPDATE `bom_tb_member` SET `m_count`= m_count - $_POST[tcount] where m_id = '".$_SESSION['m_id']."'"; 
              sql_query($mem_update);
              
              $rs_tran=sql_array("select * from bom_tb_trans where t_type=2 and m_id='".$_SESSION['m_id']."' order by t_id desc limit 1");
              $rs_ag = sql_array("select r_agent_id from bom_tb_agent where r_id = '".$_SESSION['cr_id']."'");
                $log_sum=$re_m['m_count']-$_POST[tcount];
                ######################LOG ใหม่
                $sql="INSERT IGNORE INTO bom_tb_all_payment (
                bap_date, bap_ip, bap_type  ,m_id ,r_id,  m_agent_id, r_agent_id, 
                bap_before, bap_out ,bap_after,bap_comment,
                bap_code,trans_id) values(
                now(),'"._bIP()."', '2', '$re_m[m_id]','$re_m[r_id]','$re_m[m_agent_id]','$rs_ag[r_agent_id]',
                '$re_m[m_count]' ,'-$_POST[tcount]','$log_sum','สมาชิกแจ้งถอนผ่านหน้าเว็บไซต์',
                'MOT','$rs_tran[t_id]') ";
                sql_query($sql);  
                ######################LOG ใหม่ 
              
             
			  
			  
              #######################ccccccccccccccccccccc#####
              $fo="json/login/draw/".$_SESSION['crid'].".php";
              if( 0 != @filesize($fo)){
                @require_once($fo);
                $alert_txt=intval($m_draw)+1;
                $fp = @fopen($fo, 'w');
                @fwrite($fp, '<? $m_draw="'.$alert_txt.'"; ?>');
                @fclose($fp);

              }else{
                $fp = @fopen($fo, 'w');
                @fwrite($fp, '<? $m_draw="1"; ?>');
                @fclose($fp);
              }
              #######################ccccccccccccccccccccc#####	
              $_SESSION['xac1']=$lang_member[88];
              
              ####################################
              $js1=array();
              
              $re=sql_page("bom_tb_trans where m_id='".$_SESSION['m_id']."'  and t_type=2     ","t_id"," desc, t_status desc",100);
              while($rs=sql_fetch($re['re']))
              {	
                $js1[]=array("t_bank"=>"".$rs["t_bank"]."","t_date_bet"=>"".$rs["t_date_bet"]."","t_date"=>"".$rs["t_date"]."","t_count"=>"".$rs["t_count"]."","t_status"=>"".$rs["t_status"]."","    t_note"=>"".$rs["t_note"]."");
              }
              ####################################		
              $txt1=json_encode($js1);
              write($url_file1 ,$txt1,"w+"); 
 
          	 }else{#	if($num==0){
        	    $_SESSION['xac2']=$lang_member[962];
        	 }	
        }else{#	if($re_m[m_count]<$_POST[tcount]){
        	 $_SESSION['xac2']=$lang_member[963];
        }
      }# if ($_POST['tcount']<$rs_cset["r_m_withdraw_min"])
    }else
    {#if( $_POST[tcount]!="" and $_POST[tcode]!="" and $_POST[tcount]>=1000){
      $_SESSION['xac2']=$lang_member[964];
    }
    	
    	
    @header('Location: main_withdraw.php');exit();

	// } //end else $_SESSION["m1"]['m_b_pass']!=$_POST['tcode']
} // end if btn save

$rec = sql_array("select * from bom_tb_config where con_id = 1;");
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
<script src="jsui/jquery-ui_th.js?v=2019"></script>
	<script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />
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
  <style>/*
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
	background-image: linear-gradient(top, #d92e37,  #8b1c22);
	background-image: -moz-linear-gradient(top, #d92e37, #8b1c22);
	background-image: -webkit-linear-gradient(top, #d92e37, #8b1c22);
	background-image: -o-linear-gradient(top, #d92e37, #8b1c22);
	background-image: -ms-linear-gradient(top, #d92e37, #8b1c22);
	font-size: 12px;
	  color: #fff;
	  font-weight: bold;
	  text-shadow: 1px 1px 1px #000;
}*/

  </style>
</head>

<body>
<? 
  include 'mname_tmpl.php'; 
  include 'mtimezone_tmpl.php';
?>
	<?
//   include("popvdo.php");
?>
<div id="main_left" style="overflow:visible;">
<!-- <div id="title_page">
    <div id="ic_title">&gt;</div>
    <span id="stitle"><?=$lang_member[966];?></span>
  </div> -->

<div id="menu_lotto">
    <table border="0" cellspacing="0" cellpadding="0" width="100%">
      <tbody>
        <tr align="center" height="32">

          <td class="mlotto" align="center"><a onClick="window.location.href = 'main_transfer.php?tlot=&vvw='+fw"><?=$lang_member[967];?></a></td>
            <td width="4"></td>
          <td class="mlotto mactive" align="center"><a onClick="javascript:void(0);"><?=$lang_member[968];?></a></td>

        </tr>
      </tbody>
    </table>
  </div>


<? if($rec["con_open_tranfer"]==0){ include 'sa_close.php'; exit(); } ?>
<? if($rs_cset["r_open_transfer"]==0 || ($rs_cset["r_m_deposit_open"]==0 && $rs_cset["r_m_withdraw_open"]==0)){ include 'ag_close.php'; exit(); } ?>
<? if($rs_cset["r_m_withdraw_open"]==0){ ?><script type="text/javascript">window.location.href = 'main_transfer.php?vvw='+fw</script><? exit(); } ?>

<br>
<br>
<!--   <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="200" align="center">
      <? if($rs_cset["r_m_deposit_open"]==1){ ?>
    	<input type="button" value="<?=$lang_member[967];?>" class="btn_le green w150px" onclick="window.location.href = 'main_transfer.php?vvw='+fw" >
    <? } ?>
        
    </td>
    <td >
    <form action="" class="form-withdraw" method="post" onsubmit="$('#b_save').hide();">
    		<table width="100%" border="0" cellspacing="1" cellpadding="5">
            <? if($_SESSION['m1']['m_b_bank']>0){?>
  <tr>
    <td width="45%" align="right" class="txt_white12btitle"><strong><?=$lang_member[981];?> :</strong></td>
    <td width="55%" align="left" valign="top" >
	<img src="img/b<?=$_SESSION['m1']['m_b_bank'];?>.png" style="float:left;" >
	<?=$ab_bank[$_SESSION['m1']['m_b_bank']];?> <b class="cbu"><?=$_SESSION['m1']['m_b_name'];?></b><br> <b><?=_bankok($_SESSION['m1']['m_b_code']);?></b></td>
    </tr>
            
            <? }?>
  <tr>
    <td width="45%" align="right" class="txt_white12btitle"><strong><?=$lang_member[969];?> :</strong></td>
    <td width="55%" align="left" ><input name="tcount" type="tel" class="txtq2" id="tcount" onkeydown="return numberonly(event,this);" size="15" maxlength="10" required></td>
    </tr>
    <tr>
    <td align="right" class="txt_white12btitle"><strong><?=$lang_member[974];?> :</strong></td>
    <td align="left" ><input name="tcode" type="tel" class="txtq2" id="tcode" size="15" minlength="4" maxlength="4" autocomplete="off" required>
    
    &nbsp;&nbsp;&nbsp;
    <? if($_SESSION['m1']['m_b_pass']!=""){ echo'***'.substr($_SESSION['m1']['m_b_pass'] , -1);}?>
    </td>
    </tr>
  <tr>
    <td align="center" class="red"></td>
    <td ><input type="submit" name="b_save" id="b_save" value="<?=$lang_member[121];?>" class="btn_le">
    <span class="red" style="text-align: right; float: right;">
      <?=$lang_member[1661];?> <?=number_format($rs_cset["r_m_withdraw_min"] , 2)?> <?=$_SESSION['m1']['m_currency']?><br>
      <?=$lang_member[1662];?> <?=number_format($rs_cset["r_m_withdraw_max"] , 2)?> <?=$_SESSION['m1']['m_currency']?>
    </span>
    </td>
    </tr>
</table></form>
    </td>
  </tr>
  <tr>
    <td align="center"><input type="button" value="<?=$lang_member[968];?>" class="btn_le orange w150px" disabled></td>
  </tr>
  </table> -->




  <!-- new -->
  <form action="" class="" method="post" onsubmit="$('#b_save').hide();">
  <div>
   
          <div style="text-align: center;">
            <img src="img/transfer/icon_bet.png" alt="" style="width: 50px;">
          </div>

          <br>
       
          <div style="text-align: center;">
            <img src="img/transfer/arrow_down.png" alt="" style="width: 50px; height: 40px;">
          </div>
        

    <div class="transfer_step_box">
      <div>
        <table cellpadding="2">
          <tr>
            <td align="right"><strong><?=$lang_member[2375];?>: </strong></td>
            <td>
              <img src="img/b<?=$_SESSION['m1']['m_b_bank'];?>.png" style="float:left;" >
              <?=$ab_bank[$_SESSION['m1']['m_b_bank']];?> <b class="cbu"><?=$_SESSION['m1']['m_b_name'];?></b><br> <b><?=_bankok($_SESSION['m1']['m_b_code']);?></b>
            </td>
          </tr>
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
            <td align="right"><strong><?=$lang_member[969];?>:</strong></td>
            <td>
              <input name="tcount" type="tel" class="txtq2" id="tcount" onkeydown="return numberonly(event,this);" size="15" maxlength="10" required>
            </td>
          </tr>
          <!-- <tr>
            <td align="right"><strong><?=$lang_member[974];?>:</strong></td>
            <td>
              <input name="tcode" type="tel" class="txtq2" id="tcode" size="15" minlength="4" maxlength="4" autocomplete="off" required>
              <? if($_SESSION['m1']['m_b_pass']!=""){ echo'***'.substr($_SESSION['m1']['m_b_pass'] , -1);}?>
            </td>
          </tr> -->
          <tr>
            <td colspan="2" style="text-align: center;">
              <input type="submit" name="b_save" id="b_save" value="<?=$lang_member[121];?>" class="btn_le">
            </td>
          </tr>
        </table>
      </div>
    </div>

  </div>
</form>


  <br>
  <? if($_SESSION['xac1']!=''){?>  <div style="background:#6F9; padding:10px; text-align:center; "><?=$_SESSION['xac1'];?></div><? }?>
<? if($_SESSION['xac2']!=''){?>  <div style="background:#F63; padding:10px; text-align:center; "><?=$_SESSION['xac2'];?></div><? }?>
<? 
$_SESSION['xac1']='';
$_SESSION['xac2']='';
 ?>
<table width="100%" border="0" cellspacing="1" cellpadding="5" bgcolor="#380104">
<tbody>
 <tr class="tb_title_lotto">
    <td width="6%" align="center"><?=$lang_member[425];?></td>
    <td width="19%" align="center"><?=$lang_member[972];?></td>
    <td width="22%" align="center"><?=$lang_member[973];?></td>
    <td width="18%" align="center"><?=$lang_member[971];?></td>
    <td width="18%" align="center"><?=$lang_member[969];?></td>
    <td width="17%" align="center"><?=$lang_member[301];?></td>
  </tr>
</tbody>
<?
$cc=1;

$ok_js=file_get_contents2($url_file1);
$ok_bet = json_decode2($ok_js, true);
#print_r($ok_bet);
//foreach($ok_bet as $rs){
// $sql_list_tran = sql_query("select * from bom_tb_trans where m_id='".$_SESSION['m_id']."'  and t_type=2 order by t_id desc , t_status desc limit 100");
// while($rs=sql_fetch($sql_list_tran)){

	// $ex=explode("@",$rs['t_note']);
?>
  <!-- <tr class="tb_ball">
    <td align="center" ><?=$cc;?></td>
    <td align="center" ><?=$ab_bank[$rs['t_bank']];?></td>
    <td align="center" >******<?=substr($ex[1], -4,4);?></td>
    <td align="center"><?=date('d-m-Y H:i:s', strtotime($rs['t_date']));?></td>
   <td align="center"><?=number_format($rs['t_count']);?></td>
    <td align="center"><?=$ab_status[$rs['t_status']];?></td>
    </tr> -->
<? //$cc++;}?>
  <tbody id="tf_table"></tbody>
</table>

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
    data: {type: 'withdraw'},
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
</script>
</body>
</html>