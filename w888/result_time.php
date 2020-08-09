<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('inc/conn.php');
require('inc/function.php');
// require("lang/member_lang.php");
  require("lang/variable_lang.php");

$score_result['en']=array(1=>"Completed",2=>"Running", 3 =>"Refund",  4=>"Abandoned 1H", 5=>"Abandoned 2H", 6=>"Result Pending");
$score_result['th']=array(1=>"สมบูรณ์",2=>"กำลังแข่งขัน", 3 =>"คืนเงิน",  4=>"คืนเงิน ครึ่งแรก", 5=>"คืนเงิน ครึ่งหลัง", 6=>"รอผลแข่งขัน");

if($_GET['d']!=""){
    $view_date = $_GET['d'];
	list($dd,$mm,$yy) = explode("-", $_GET['d']);
    $res_date = $yy."-".$mm."-".$dd;
}else{
    $view_date = _bdate();
    $res_date = date("Y-m-d", time());
}

if($_GET['sport']!=""){
	$xzone=$_GET['sport'];
	}else{
	$xzone=6;
	}



?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<TITLE><?=$app_name;?></TITLE>
<link rel="stylesheet" type="text/css" href="css/style.css?v=<?=$cache_css;?>">
<link rel="stylesheet" type="text/css" href="css/style3.css?v=<?=$cache_css;?>">
<? if($_SESSION['lang']=="mm"){?><link rel="stylesheet" type="text/css" href="css/style_mm.css?v=2019"><? }?>
<link href="jsui/jquery-ui.css?v=0001" rel="stylesheet">
<script src="jsui/external/jquery/jquery.js?v=2019"></script>
<script src="jsui/jquery-ui_<?=$_SESSION['lang'];?>.js?v=2019"></script>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
<link href="jsui/jquery-ui-custom.css" rel="stylesheet">
  
<script src="<?='js/datepicker_lang/datepicker_'.$_SESSION['lang'].'.js';?>">
	// console.log('yel')
</script>
<script>
$(function(){
    $(".datepicker").datepicker({
      showOn: "button",
      buttonImage: "img/calendar.png",
      buttonImageOnly: true,
      buttonText: "Select date",
	   dateFormat:"dd-mm-yy"
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

  $("body #sport").msDropDown({});
  $("body #asc").msDropDown({});
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
 <!--   <style>
  .ui-datepicker-trigger {
	   vertical-align: top !important;
	   cursor:pointer;
	 }
.txtq2 {
  color: #000;
  border: 1px #8b691c solid;
  font-size: 11px;
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
	background-image: -moz-linear-gradient(top, #b14b41, #83160b);
    background-image: -webkit-linear-gradient(top, #b14b41, #83160b);
    background-image: -o-linear-gradient(top, #b14b41, #83160b);
    background-image: -ms-linear-gradient(top, #b14b41, #83160b);
	font-size: 13px;
	  color: #fff;
	  /*font-weight: bold;*/
	  text-shadow: 1px 1px 1px #000;
        border: 1px solid #bbbbbb;
    /*background-color: #ededed;*/
    border-top-style: hidden;
}

.tb_title_lotto td {
    border: 1px solid #bbbbbb;
    /*background-color: #ededed;*/
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
/*	background-image: -moz-linear-gradient(top, #d9a52e, #8b691c);
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
    background-image: -moz-linear-gradient(top, #b14b41, #83160b);
    background-image: -webkit-linear-gradient(top, #b14b41, #83160b);
    background-image: -o-linear-gradient(top, #b14b41, #83160b);
    background-image: -ms-linear-gradient(top, #b14b41, #83160b);
}

.dToday {
  background-color: #4CAF50;
  border-color: #2E7D32!important;
    background-image: -moz-linear-gradient(top, #4CAF50, #2e7d32);
    background-image: -webkit-linear-gradient(top, #4CAF50, #2e7d32);
    background-image: -o-linear-gradient(top, #4CAF50, #2e7d32);
    background-image: -ms-linear-gradient(top, #4CAF50, #2e7d32);
}

.dYesterday {
  background-color: #FF9800;
  border-color: #EF6C00!important;
      background-image: -moz-linear-gradient(top, #FF9800, #EF6C00);
    background-image: -webkit-linear-gradient(top, #FF9800, #EF6C00);
    background-image: -o-linear-gradient(top, #FF9800, #EF6C00);
    background-image: -ms-linear-gradient(top, #FF9800, #EF6C00);
}

.res_label{
  min-width: 50px;
  margin-right: 4px;
  display: inline-block;
  color: #333;
  text-shadow: none;
  line-height: 28px;
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
<? 
    include 'mname_tmpl.php'; 
    include 'mtimezone_tmpl.php';
?>
<div id="main_left" style="overflow:visible;">
<div id="title_page">
    <div id="ic_title">&gt;</div>
    <span id="stitle"><?=$lang_member[799];?></span>
  </div>
  <form action="" method="get" >
  	<table width="100%" border="0" cellspacing="0" cellpadding="5" style="
    border:1px solid #8b691c; 
    /*background-color: #988141; */
    border-bottom: none;color: #fff;
    font-weight: bold;
    text-shadow: 1px 1px 1px #000;
    /*background: url(img/bg_top.png);*/
    /*background-size: 100% 100%;*/
        border: 1px solid #bbbbbb;
    background-color: #ededed;
    ">
    <!-- <tr><td colspan="3"></td></tr> -->
  <tr>
    <!-- <td align="right" width="10%"></td> -->
    <td align="left" class="res_date_form">
      <span class="res_label">
        <?=$lang_member[146];?> :
      </span>
<!--    <input name="d" type="text" class="datepicker txtq2" id="d" value="<?=$view_date;?>" size="15" readonly> 
    <input type="submit" class="txt_back11n" value="<?=$lang_member[293];?>" >-->
			<button class="calendar" onclick="$('#datepicker').focus(); return false;">
		<span><img src="img/calendar.png" alt=""></span>
	</button>
	<input name="d" type="text" id="datepicker">
	<input type="submit" value="<?=$lang_member[321]?>" class="dSearch">
  <?
    $_tdy = date("d-m-Y", strtotime("now"));
    $_tmm = date("d-m-Y", strtotime("-1 Day"));
  ?>
  <input type="button" value="<?=$lang_member[887]?>"  name="today"      class="dToday" style="margin-left: 6px; border-left: 1px solid #8b691c;" onclick="selectTodayYesterday('<?=$_tdy;?>')">
  <input type="button" value="<?=$lang_member[1438]?>" name="yesterday"   class="dYesterday" style="margin-left: 6px; border-left: 1px solid #8b691c;" onclick="selectTodayYesterday('<?=$_tmm;?>')">
		
		
    </td>
    
    </tr>
    <tr>
      <!-- <td></td> -->
      <td class="res_date_form">
        <span class="res_label">
          <?=$lang_member[40];?> :
        </span><select name="sport" id="sport" class="txtq2 dd" onChange="window.location.href='?d=<?=$view_date;?>&sport='+this.value;">
        <? 
          foreach ($arr_sp_zone as $x => $v) {
          ?>
        <option value="<?=$x;?>" data-image="template/sportsicon/<?=$arr_key_zone[$x]?>.png" <? if($xzone==$x){echo'selected="selected"';}?>><?=$sport_type[$x];?></option>
        <? }?>
      </select>
      &nbsp;&nbsp;
      <span class="res_label">
        <?=$lang_member[1031];?> :
      </span><select name="asc" id="asc" class="txtq2 dd" onChange="window.location.href='result.php?d=<?=$linkDate;?>&sport=<?=$xzone;?>';">
    <option value="0" ><?=$lang_member[1032];?></option>
    <option value="1" selected="selected"><?=$lang_member[1033];?></option>
      </select>
      </td>
    </tr>

</table>
</form>

<table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" class="res_table">
  
  <tbody><tr align="center" class="tb_title_lotto">
    <td width="130" height="25"><?=$lang_member[303];?></td>
    <td width="430"><?=$matchz;?></td>

    <td width="75"><?=$lang_member[803];?> </td>

    <td width="75"><?=$lang_member[805];?></td>
    <td width="80"><?=$lang_member[301];?></td>
  </tr> 


  <? 
$sql="select * from bom_tb_ball_list where b_add=1 and b_date='$view_date' and  b_zone='$xzone'    and b_score_status!=0  order by  b_date_play asc";
$re2=sql_query_sp($sql);
while($rs2=sql_fetch($re2)){
	
if($rs2['b_name_1_th']==""){$rs2['b_name_1_th']=$rs2['b_name_1_en'];}	
if($rs2['b_name_2_th']==""){$rs2['b_name_2_th']=$rs2['b_name_2_en'];}	

if($rs2['b_name_1_cn']==""){$rs2['b_name_1_cn']=$rs2['b_name_1_en'];}	
if($rs2['b_name_2_cn']==""){$rs2['b_name_2_cn']=$rs2['b_name_2_en'];}	
  ?>
<tr class="tb_ball">
<td height="20" align="center"><?=date("d/m/Y H:i",$rs2["b_date_play"]);?></td>
<td align="left" class="txt_back11n">

<?=$rs2["b_name_1_".$_SESSION['lang']];?>

<b> -vs- </b>

<?=$rs2["b_name_2_".$_SESSION['lang']];?>

 </td>
<td align="center"><?=$rs2["b_score_half"];?></td>
<td align="center"><?=$rs2["b_score_full"];?></td>
<td align="center"><?=$score_result[$_SESSION['lang']][$rs2["b_score_status"]];?></td>
</tr>
<? } ?>
</tbody></table>
</div>
	<script>
	$( function() {

   	$( "#datepicker" ).datepicker({
      maxDate : new Date(),
      defaultDate : new Date(),
      buttonImage: "img/calendar.png",
      buttonImageOnly: true,
      buttonText: "Select date",
      dateFormat:"dd-mm-yy",
    });
   		
   	$("#datepicker").datepicker('setDate', new Date('<?=$res_date;?>')); 
  	});

  function selectTodayYesterday($date){
    $sport = document.getElementById('sport').value;
    $asc = document.getElementById('asc').value;
    parent.rightx.location = "result.php?d="+$date+"&sport="+$sport+"&asc="+$asc;
  }
</script>
</body>
</html>