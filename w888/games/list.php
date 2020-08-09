<link href="jsui/jquery-ui.css?v=0001" rel="stylesheet">

<script src="jsui/external/jquery/jquery.js?v=2019"></script>
<script src="jsui/jquery-ui_<?=$_SESSION['lang'];?>.js?v=2019"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
<link href="../jsui/jquery-ui-custom.css" rel="stylesheet">
<script src="<?='js/datepicker_lang/datepicker_'.$_SESSION['lang'].'.js';?>">
	// console.log('yel')
</script>
<?
if($_GET['date']!=""){
  $_GET['d'] = $_GET['date'];
	list($dd,$mm,$yy) = explode("-", $_GET['date']);
    $res_date = $yy."-".$mm."-".$dd;
}else{
    $res_date = date("Y-m-d", time());
    $_GET['d'] = date("d-m-Y", time());
}
?>
<!-- <style>
	  	   .res_date_form {
	display: flex;
			   margin: 0px 180px;
			   
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
}
</style>
 --><br><form action="" method="get"  class="res_date_form">
		<button class="calendar" onclick="$('#datepicker').focus(); return false;">
		<span><img src="img/calendar.png" alt=""></span>
	</button>
	<input type="text" id="datepicker" name="date">
	&nbsp;
<input name="tlot" type="hidden" value="<?=$_GET[tlot];?>" />
<input name="vvw" type="hidden" value="<?=$_GET[vvw];?>" />
<input name="p" type="hidden" value="<?=$_GET[p];?>" />
<input name="q" class="txtq2" id="q" value="<?=$_GET[q];?>"  type="text" placeholder="Bet ID">
<input type="submit" value="<?=$lang_member[293];?>">
</form>
<br>

<table width="100%" border="0" cellspacing="1" cellpadding="5" class="bg_table">
<tbody>
<tr class="tb_title_lotto">
  <td width="10%" align="center" height="25"><?=$lang_member[146];?> - <?=$lang_member[303];?></td>
    <td width="10%" align="center" ><?=$lang_member[295];?></td>

	<td width="30%" align="center"><?=$lang_member[50];?></td>

    <td width="8%" align="center" ><?=$lang_member[297];?></td>
    <td width="15%" align="center" ><?=$lang_member[37];?></td>
    <td width="12%" align="center" ><?=$lang_member[299];?></td>
    <td width="8%" align="center"><?=$lang_member[300];?></td>
    <td width="7%" align="center"><?=$lang_member[301];?></td>
  </tr>
 <?
   if($_GET[q]!=""){
	  $qq=" and bet_id like '%$_GET[q]%' ";
	  }
   if($_GET[d]!=""){
	  $dd=" and b_date like '$_GET[d]' ";
	  }

$re=sql_page(" bom_tb_games_bill_play where  m_id='$_SESSION[m_id]' $qq  $dd  ","play_id","desc",100);
while($rs=sql_fetch($re[re])){
	$win=explode(',',$rs['bet_win']);
  ?>
 <? if($rs['game_zone']==1){?>
<tr class="tr_lot">
  <td align="center"><?=$rs['play_datenow'];?></td>
    <td align="center"><?=$rs['bet_id'];?></td>
	<td align="center">
	<? if($win[1]!=""){?>
	<img src="img/2hit/30/<?=$win[1]?>.png" height="30">
		<? }else{ ?>
		<span class="cbu"><?=$lang_member[302];?></span>
		<? } ?>
	</td>
      <td align="center"><?=$rs['play_id'];?></td>
        <td align="center"><?=$game_zone[$rs['game_zone']];?></td>
        
    <td align="center"><img src="img/2hit/30/<?=$rs["play_bet"]?>.png" height="30"></td>
    <td align="center"><?=number_format($rs['b_total']);?></td>
    <td align="center"><?=$games_type[$rs['play_status']];?></td>
  </tr>
  
  <? }elseif($rs['game_zone']==2){?>
  
<tr class="tr_lot">
  <td align="center"><?=$rs['play_datenow'];?></td>
    <td align="center"><?=$rs['bet_id'];?></td>
	<td align="center">
	<? if($win[1]!="" and $win[2]!=""){?>
	<img src="img/bacarat/35/<?=$win[1];?>.jpg"   style="border: 1px solid #999; vertical-align: middle;" /> 
   <b>-VS-</b>
    <img src="img/bacarat/35/<?=$win[2];?>.jpg"  style="border: 1px solid #999; vertical-align: middle;"  /> 
		<? }else{ ?>
		<span class="cbu"><?=$lang_member[302];?></span>
		<? } ?>
	</td>
      <td align="center"><?=$rs['play_id'];?></td>
        <td align="center"><?=$game_zone[$rs['game_zone']];?></td>
        
    <td align="center">
      <img src="img/dragon/22/<?=$rs["play_bet"]?>.png?v=1" height="22">
</td>
    <td align="center"><?=number_format($rs['b_total']);?></td>
    <td align="center"><?=$games_type[$rs['play_status']];?></td>
  </tr>
  
    <? }elseif($rs['game_zone']==3){?>  
    <tr class="tr_lot">
      <td align="center"><?=$rs['play_datenow'];?></td>
    <td align="center"><?=$rs['bet_id'];?></td>
	<td align="center">
	<? if($win[1]!="" and $win[2]!="" and $win[3]!="" and $win[4]!=""){?>
	<strong>P</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>B</strong> <br>
<img src="img/bacarat/35/<?=$win[1];?>.jpg"   style="border: 1px solid #999; vertical-align: middle;" />  <img src="img/bacarat/35/<?=$win[2];?>.jpg"   style="border: 1px solid #999; vertical-align: middle;" /> 
   <b>-VS-</b> 
  <img src="img/bacarat/35/<?=$win[3];?>.jpg"   style="border: 1px solid #999; vertical-align: middle;" />  <img src="img/bacarat/35/<?=$win[4];?>.jpg"   style="border: 1px solid #999; vertical-align: middle;" /> 
		<? }else{ ?>
		<span class="cbu"><?=$lang_member[302];?></span>
		<? } ?>
	</td>
      <td align="center"><?=$rs['play_id'];?></td>
        <td align="center"><?=$game_zone[$rs['game_zone']];?></td>
        
    <td align="center" ><img src="img/bacarat/b22/b<?=$rs['play_bet'];?>.png" height="22"></td>
    <td align="center"><?=number_format($rs['b_total']);?></td>
    <td align="center"><?=$games_type[$rs['play_status']];?></td>
  </tr>
      <? }elseif($rs['game_zone']==4){
	$ex=explode("," , $rs["play_bet"]);
		  ?>
<tr class="tr_lot">
  <td align="center"><?=$rs['play_datenow'];?></td>
    <td align="center"><?=$rs['bet_id'];?></td>
	<td align="center">
		<? if($win[1]!="" and $win[2]!="" and $win[3]!=""){?>
	<img src="img/hilo/25/hilo<?=$win[1]?>.png" height="22"><img src="img/hilo/25/hilo<?=$win[2]?>.png" height="22"><img src="img/hilo/25/hilo<?=$win[3]?>.png" height="22">
		<? }else{ ?>
		<span class="cbu"><?=$lang_member[302];?></span>
		<? } ?>
	</td>
      <td align="center"><?=$rs['play_id'];?></td>
        <td align="center"><?=$game_zone[$rs['game_zone']];?></td>
        
    <td align="center"><? foreach ($ex as &$value) { ?><img src="img/hilo/25/hilo<?=$value?>.png" height="22"><? } ?></td>
    <td align="center"><?=number_format($rs['b_total']);?></td>
    <td align="center"><?=$games_type[$rs['play_status']];?></td>
  </tr>
        <? }elseif($rs['game_zone']==5){
			 $ex=explode("," , $rs["play_bet"]);
			?>
<tr class="tr_lot">
  <td align="center"><?=$rs['play_datenow'];?></td>
    <td align="center"><?=$rs['bet_id'];?></td>
	<td align="center">
		<? if($win[1]!="" and $win[2]!="" and $win[3]!=""){?>
	<img src="img/fish/25/<?=$win[1]?>.png" height="22"><img src="img/fish/25/<?=$win[2]?>.png" height="22"><img src="img/fish/25/<?=$win[3]?>.png" height="22">
		<? }else{ ?>
		<span class="cbu"><?=$lang_member[302];?></span>
		<? } ?>
	</td>
      <td align="center"><?=$rs['play_id'];?></td>
        <td align="center"><?=$game_zone[$rs['game_zone']];?></td>
        
    <td align="center"><? foreach ($ex as &$value) { ?><img src="img/fish/25/<?=$value?>.png" height="22"><? } ?></td>
    <td align="center"><?=number_format($rs['b_total']);?></td>
    <td align="center"><?=$games_type[$rs['play_status']];?></td>
  </tr>
  <? }?>
  <? }?>
  
  </tbody></table>
   <p>   <!--<?=_page("$_GET[tlot]&tlot=$_GET[tlot]&vvw=$_GET[vvw]",$re['page']);?>--></p>
<script>
	$(function() {
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

	// $( function() {
 //   		$("#datepicker").datepicker({maxDate: new Date()});
 //   		$("#datepicker").datepicker('setDate', new Date('<?=$res_date;?>')); 
 //  	});
</script>