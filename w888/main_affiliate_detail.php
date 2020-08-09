<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('inc/conn.php');
require('inc/function.php');

require("lang/variable_lang.php");
require("lang/function_array.php");

if($_GET['d']!=""){
  // $view_date = $_GET['d'];
  list($dd,$mm,$yy) = explode("-", $_GET['d']);
  $res_date = $yy."-".$mm."-".$dd;
}else{
  // $view_date = _bdate();
  // $res_date = date("Y-m-d", time());
  $_GET['d'] = _bdate();
  list($dd,$mm,$yy) = explode("-", $_GET['d']);
  $res_date = $yy."-".$mm."-".$dd;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <TITLE><?=$app_title;?></TITLE>
  <link rel="stylesheet" type="text/css" href="css/style.css?v=<?=$cache_css;?>">
  <link rel="stylesheet" type="text/css" href="css/style2.css?v=<?=$cache_css;?>">
  <link rel="stylesheet" type="text/css" href="css/style3.css?v=<?=$cache_css;?>">

  <? if($_SESSION['lang']=="mm"){?><link rel="stylesheet" type="text/css" href="css/style_mm.css?v=2019"><? }?>

  <!-- <link href="jsui/jquery-ui.css?v=0001" rel="stylesheet"> -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css"> -->
  <link rel="stylesheet" href="jsui/jquery-ui.css?v=<?=$cache_css;?>">
  <link href="jsui/jquery-ui-custom.css?v=<?=$cache_css;?>" rel="stylesheet">
  <script src="jsui/external/jquery/jquery.js?v=2019"></script>
  <script src="jsui/jquery-ui_<?=$_SESSION['lang'];?>.js" charset="utf-8"></script>

    <script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
  <link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />
  <!-- <link rel="stylesheet" href="css/style2.css"> -->

</head>
<body>
 <!-- <style>
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
  /*max-width: 300px;*/
  /*margin: 10px auto;*/
  display: flex;
}


.res_date_form button.calendar {
  background-color: #ffffff;
  border: 1px solid #8b691c;
  border-right: 0;
  height: 28px;
  cursor: pointer;
}

.res_date_form button.calendar img {
    height: 18px;
}

.res_date_form input[type="text"] {
  flex: 1;
  border: 1px solid #8b691c;
  height: 26px;
  padding: 0 6px;
  max-width: 130px;
  text-align: center;
}

.res_date_form input[type="button"],
.res_date_form input[type="submit"] {
  /*border: 1px solid #8b691c;*/
  border: 1px solid;
  border-left: 0;
  height: 28px;
  min-width: 70px;
/*  background-image: -moz-linear-gradient(top, #d9a52e, #8b691c);
    background-image: -webkit-linear-gradient(top, #d9a52e, #8b691c);
    background-image: -o-linear-gradient(top, #d9a52e, #8b691c);
    background-image: -ms-linear-gradient(top, #d9a52e, #8b691c);*/
    font-size: 12px;
    color: #fff;
    font-weight: bold;
    text-shadow: 1px 1px 1px #000;
    cursor: pointer;
        padding: 0 14px;
}

.dSearch {
  background-color: #8b691c;
  border-color: #8b691c!important;
    background-image: -moz-linear-gradient(top, #d9a52e, #8b691c);
    background-image: -webkit-linear-gradient(top, #d9a52e, #8b691c);
    background-image: -o-linear-gradient(top, #d9a52e, #8b691c);
    background-image: -ms-linear-gradient(top, #d9a52e, #8b691c);
}
</style> -->


<div id="main_left" style="overflow: visible; width: 770px;">

<?php 

$type_list  = array(1 => $lang_member[35], 2 => $lang_member[36],  3 => $lang_member[48],  4 => $lang_member[37],  5 => $lang_member[38] );

$arr_list = array();

if($_GET[type] == "total")
{
  $title =  $lang_member[1910]." ".$lang_member[304];

}else if($_GET[type] == "sport")
{
  $title =  $lang_member[1910]." ".$lang_member[35];
  $type = $type_list[1];
  /*$sql_af = "select * from bom_tb_football_bill_live where bonus_m_id = '$_SESSION[m_id]' order by b_datenow desc";
  $re_af=sql_query($sql_af);
  while ($rs_af=sql_fetch($re_af)){
    $arr_data = array();

    $arr_data["af_txt"] = ($rs_af["b_numstep"]==1 ? $lang_member[537] : $lang_member[767]." ")." / ".($rs_af["b_numstep"]==1 ? $arr_sp_zone[$rs_af["b_zone"]] : $rs_af["b_numstep"])." - ID : ".$rs_af["bill_id"];
    $arr_data["af_date"] = $rs_af["b_datenow"];
    $arr_data["af_total"] = $rs_af["b_total"];
    $arr_data["af_money"] = $rs_af["b_total"]*($rs_af["com_af"]/100);

    $arr_list[] = $arr_data;
  }*/

  $sql_af = "select * from bom_tb_football_bill where bonus_m_id = '$_SESSION[m_id]' and b_date = '$_GET[d]' order by b_datenow desc";
  $re_af=sql_query($sql_af);
  while ($rs_af=sql_fetch($re_af)){
    $arr_data = array();

    $arr_data["af_txt"] = ($rs_af["b_numstep"]==1 ? $lang_member[537] : $lang_member[767]." ")." / ".($rs_af["b_numstep"]==1 ? $arr_sp_zone[$rs_af["b_zone"]] : $rs_af["b_numstep"])." - ID : ".$rs_af["bill_id"];
    $arr_data["af_date"] = $rs_af["b_datenow"];
    $arr_data["af_total"] = $rs_af["b_total"];
    $arr_data["af_money"] = $rs_af["b_total"]*($rs_af["com_af"]/100);

    $arr_list[] = $arr_data;
  }

}else if($_GET[type] == "lot")
{
  $title =   $lang_member[1910]." ".$lang_member[36];
  $type = $type_list[2];
  /*$sql_af = "select * from bom_tb_lotto_bill_live where bonus_m_id = '$_SESSION[m_id]' and lot_zone = 1 order by b_datenow desc";
  $re_af=sql_query($sql_af);
  while ($rs_af=sql_fetch($re_af)){
    $arr_data = array();

    $arr_data["af_txt"] = $lang_member[568]." / ".$rs_af["b_date"]." - ID : ".$rs_af["bill_id"];
    $arr_data["af_date"] = $rs_af["b_datenow"];
    $arr_data["af_total"] = $rs_af["b_total"];
    $arr_data["af_money"] = $rs_af["b_total"]*($rs_af["com_af"]/100);

    $arr_list[] = $arr_data;
  }*/

  $sql_af = "select * from bom_tb_lotto_bill where bonus_m_id = '$_SESSION[m_id]' and b_date = '$_GET[d]' and lot_zone = 1 order by b_datenow desc";
  $re_af=sql_query($sql_af);
  while ($rs_af=sql_fetch($re_af)){
    $arr_data = array();

    $arr_data["af_txt"] = $lang_member[568]." / ".$rs_af["b_date"]." - ID : ".$rs_af["bill_id"];
    $arr_data["af_date"] = $rs_af["b_datenow"];
    $arr_data["af_total"] = $rs_af["b_total"];
    $arr_data["af_money"] = $rs_af["b_total"]*($rs_af["com_af"]/100);

    $arr_list[] = $arr_data;
  }
}else if($_GET[type] == "hun")
{
  $title =   $lang_member[1910]." ".$lang_member[48];
  $type = $type_list[3];
  /*$sql_af = "select * from bom_tb_lotto_bill_live where bonus_m_id = '$_SESSION[m_id]' and lot_zone <> 1 order by b_datenow desc";
  $re_af=sql_query($sql_af);
  while ($rs_af=sql_fetch($re_af)){
    $arr_data = array();

    if($lot_zone_bet[$rs_af["lot_zone"]]>1 && $rs_af["lot_zone"]==18){
      $af_rob = " / ".$lang_member[688]." ".$rs_af["lot_rob"];
    }else if($lot_zone_bet[$rs_af["lot_zone"]]>1 && $rs_af["lot_zone"]==19){
      $af_rob = " / ".$lang_member[643]." ".$lot_robmun[$rs_af["lot_rob"]];
    }else{
      $af_rob = "";
    }

    $arr_data["af_txt"] = $lot_zone[$_SESSION['lang']]["zone"][$rs_af["lot_zone"]].$af_rob." / ".$rs_af["b_date"]." - ID : ".$rs_af["bill_id"];
    $arr_data["af_date"] = $rs_af["b_datenow"];
    $arr_data["af_total"] = $rs_af["b_total"];
    $arr_data["af_money"] = $rs_af["b_total"]*($rs_af["com_af"]/100);

    $arr_list[] = $arr_data;
  }*/

  $sql_af = "select * from bom_tb_lotto_bill where bonus_m_id = '$_SESSION[m_id]' and b_date = '$_GET[d]' and lot_zone <> 1 order by b_datenow desc";
  $re_af=sql_query($sql_af);
  while ($rs_af=sql_fetch($re_af)){
    $arr_data = array();

    if($lot_zone_bet[$rs_af["lot_zone"]]>1 && $rs_af["lot_zone"]==18){
      $af_rob = " / ".$lang_member[688]." ".$rs_af["lot_rob"];
    }else if($lot_zone_bet[$rs_af["lot_zone"]]>1 && $rs_af["lot_zone"]==19){
      $af_rob = " / ".$lang_member[643]." ".$lot_robmun[$rs_af["lot_rob"]];
    }else{
      $af_rob = "";
    }

    $arr_data["af_txt"] = $lot_zone[$_SESSION['lang']]["zone"][$rs_af["lot_zone"]].$af_rob." / ".$rs_af["b_date"]." - ID : ".$rs_af["bill_id"];
    $arr_data["af_date"] = $rs_af["b_datenow"];
    $arr_data["af_total"] = $rs_af["b_total"];
    $arr_data["af_money"] = $rs_af["b_total"]*($rs_af["com_af"]/100);

    $arr_list[] = $arr_data;
  }
}else if($_GET[type] == "games")
{
  $title =  $lang_member[1910]." ".$lang_member[37];
 $type = $type_list[4];
 /*$sql_af = "select * from bom_tb_games_bill_play_live where bonus_m_id = '$_SESSION[m_id]' order by play_datenow desc";
 $re_af=sql_query($sql_af);
  while ($rs_af=sql_fetch($re_af)){
    $arr_data = array();

    $arr_data["af_txt"] = $lang_member[708]." - ID : ".$rs_af["play_id"];;
    $arr_data["af_date"] = $rs_af["play_datenow"];
    $arr_data["af_total"] = $rs_af["b_total"];
    $arr_data["af_money"] = $rs_af["b_total"]*($rs_af["com_af"]/100);

    $arr_list[] = $arr_data;
  }*/

  $sql_af = "select * from bom_tb_games_bill_play where bonus_m_id = '$_SESSION[m_id]' and b_date = '$_GET[d]' order by play_datenow desc";
 $re_af=sql_query($sql_af);
  while ($rs_af=sql_fetch($re_af)){
    $arr_data = array();

    $arr_data["af_txt"] = $lang_member[708]." - ID : ".$rs_af["play_id"];;
    $arr_data["af_date"] = $rs_af["play_datenow"];
    $arr_data["af_total"] = $rs_af["b_total"];
    $arr_data["af_money"] = $rs_af["b_total"]*($rs_af["com_af"]/100);

    $arr_list[] = $arr_data;
  }
}else if($_GET[type] == "casino")
{
  $title =  $lang_member[1910]." ".$lang_member[38];
 $type = $type_list[5];
 /*$sql_af = "select * from bom_tb_casino_bill_play_live where bonus_m_id = '$_SESSION[m_id]' order by play_datenow desc";
 $re_af=sql_query($sql_af);
  while ($rs_af=sql_fetch($re_af)){
    $arr_data = array();

    $arr_data["af_txt"] = $lang_member[708]." - ID : ".$rs_af["play_id"];;
    $arr_data["af_date"] = $rs_af["play_datenow"];
    $arr_data["af_total"] = $rs_af["b_total"];
    $arr_data["af_money"] = $rs_af["b_total"]*($rs_af["com_af"]/100);

    $arr_list[] = $arr_data;
  }*/

  $sql_af = "select * from bom_tb_casino_bill_play where bonus_m_id = '$_SESSION[m_id]' and b_date = '$_GET[d]' order by play_datenow desc";
 $re_af=sql_query($sql_af);
  while ($rs_af=sql_fetch($re_af)){
    $arr_data = array();

    $arr_data["af_txt"] = $lang_member[708]." - ID : ".$rs_af["play_id"];;
    $arr_data["af_date"] = $rs_af["play_datenow"];
    $arr_data["af_total"] = $rs_af["b_total"];
    $arr_data["af_money"] = $rs_af["b_total"]*($rs_af["com_af"]/100);

    $arr_list[] = $arr_data;
  }
}

 ?>

  <div id="title_page">
      <div id="ic_title">&gt;</div>
      <span id="stitle"><?=$lang_member[49];?></span>
  </div>

  <p class="ref-title"><?=$title;?></p>

<br>
<div class="res_date_form">
  <button class="calendar" onclick="$('#datepicker').focus(); return false;">
    <span><img src="img/calendar.png" alt=""></span>
  </button>
  <input name="d" type="text" id="datepicker">
  <input type="submit" value="<?=$lang_member[321]?>" class="dSearch" onclick="openAffiliate();">
  <input type="hidden" name="type" id="type" value="<?=$_GET['type'];?>">
</div>
<br>
  
  <table cellpadding="0" cellspacing="0" class="txt_back11n bg_table" style="width: 100%; table-layout: fixed;">
    <tbody>
      <tr class="tb_title_lotto">
        <th width="10%"><?=$lang_member[425]?></th>
        <th width="35%"><?=$lang_member[708]?></th>
        <th width="25%"><?=$lang_member[106]?></th>
        <th width="15%"><?=$lang_member[969]?></th>
        <th width="15%"><?=$lang_member[2149]?></th>
      </tr>
      
      <?php 
      $i = 1;
      foreach ($arr_list as $key => $value) 
        {

          ?>
          
          <tr>
            <td style="text-align: center;"><?=$i;?></td>
            <td style="text-align: center;"><?=$value["af_txt"]?></td>
            <td style="text-align: center;"><?=$value["af_date"]?></td>
            <td><?=number_format($value["af_total"] , 2)?></td>
            <td><?=number_format($value["af_money"] , 2)?></td>
          </tr>

          <?
       $i++; }

       ?>   
    </tbody>
  </table>
  <br>
  <br>
  <!-- <button class="m-button" onclick="parent.rightx.location.href='main_affiliate.php';"><?=$lang_member[147];?></button> -->
  <button class="btn_le" onclick="parent.rightx.location.href='main_affiliate.php';"><?=$lang_member[147];?></button>

</div>
<script>
  $(function(){
    $("#datepicker").datepicker({
      maxDate: new Date(),
      minDate: -90,
      defaultDate : new Date(),
      buttonImage: "img/calendar.png",
      buttonImageOnly: true,
      buttonText: "Select date",
      dateFormat:"dd-mm-yy",
    });
    $("#datepicker").datepicker('setDate', new Date('<?=$res_date;?>')); 
  });

  function openAffiliate(){
    $sport = document.getElementById('type').value;
    $date = document.getElementById('datepicker').value;
    parent.rightx.location = "main_affiliate_detail.php?type="+$sport+"&d="+$date;
  }
</script>
  
</body>
</html>