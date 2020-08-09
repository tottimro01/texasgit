<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('inc/conn.php');
require('inc/function.php');

require("lang/variable_lang.php");
// require("lang/member_lang.php");


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
<title>News - Soccer</title>
<link rel="stylesheet" type="text/css" href="css/style.css?v=<?=$cache_css;?>">
<link rel="stylesheet" type="text/css" href="css/style3.css?v=<?=$cache_css;?>">

<? if($_SESSION['lang']=="mm"){?><link rel="stylesheet" type="text/css" href="css/style_mm.css?v=2019"><? }?>
<link href="jsui/jquery-ui.css?v=0001" rel="stylesheet">
<script src="jsui/external/jquery/jquery.js?v=2019"></script>
<script src="jsui/jquery-ui_<?=$_SESSION['lang'];?>.js" charset="utf-8"></script>

<script>
$(function() {
    // $( ".datepicker" ).datepicker({
    //   showOn: "button",
    //   buttonImage: "img/calendar.png",
    //   buttonImageOnly: true,
    //   buttonText: "Select date",
	   //  dateFormat:"yy-mm-dd"
    // });

    $("#sport").msDropDown({});
  });
  </script>
  <!-- <style>
  .ui-datepicker-trigger {
	  vertical-align: bottom !important;
	  cursor:pointer;
	}
  .dd{
    font-weight: normal;
  }
  .dd .ddChild li.hover,
  .dd .ddChild li.selected{
    border-radius: 0;
  }
  select.txtq2 {
      min-width: 130px;
  }
  .res_table{
    border-collapse: collapse;
  }
  .res_table td{
    padding: 2px;
    border: 1px solid #b1b1b1;
  }
  </style> -->
  <script src="js/msDropdown/jquery.dd.min.js"></script>
  <link rel="stylesheet" href="js/msDropdown/dd.css" />
</head>

<body>
<table width="100%" border="0" align="left" cellpadding="5" cellspacing="1">

<tr align="center">
      <td height="30" colspan="6" align="left" bgcolor="#eeeeee">
        <select name="sport" id="sport" class="txtq2 dd" onChange="window.location.href='?s='+this.value;">
            <option value="" <? if($_GET['s']==""){echo'selected="selected"';}?>><?=$lang_member[304];?></option>
          <? 
            foreach ($arr_sp_zone as $x => $v) {
          ?>
            <option value="<?=$x;?>" data-image="template/sportsicon/<?=$arr_key_zone[$x]?>.png" <? if($_GET['s']==$x){echo'selected="selected"';}?>><?=$sport_type[$x];?></option>
          <? } ?>
        </select>
      </td>
  </tr>
</table>
<table width="100%" border="0" align="left" cellpadding="5" cellspacing="1">
  <tr align="center" class="">
    <td width="4%"  class="tb_title_lotto" height="25"><?=$lang_member[425];?></td>
    <td width="19%" class="tb_title_lotto"><?=$lang_member[146];?></td>
    <td width="77%" class="tb_title_lotto"><?=$lang_member[441];?></td>
  </tr>


<?
    $c = 1;

  if($_GET['s']!=""){
    $ss=" and  b_sport = '$_GET[s]'";
  }
    $sql = "SELECT * FROM bom_tb_news WHERE b_zone = 1 $ss ORDER BY n_date DESC limit 30"; 
    $re = sql_query($sql);
    while ($rs = sql_fetch($re)){
    
  ?>
  <tr class="list_news" height="20">
    <td align="center"><?=$c;?></td>
    <td  align="center"><?=$rs['n_date'];?></td>
    <td><?=$rs['n_note_en'];?></td>
  </tr>
<?
  $c++;  } 
?>



</table>

</body>
</html>