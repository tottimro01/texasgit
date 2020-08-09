<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
@import url(http://fonts.googleapis.com/earlyaccess/myanmarsanspro.css);
input{
	font-family: 'Myanmar Sans Pro', sans-serif;
}
</style>
<script type="text/javascript" src="http://js.step98.com/jquery-latest.js?v=2019"></script>
<script  type="text/javascript" >
function _ok(id,by){
	var txt_en=$("#txt_en_"+id).val();
	var txt_th=$("#txt_th_"+id).val();
	var txt_vn=$("#txt_vn_"+id).val();
	var txt_mm=$("#txt_mm_"+id).val();
	var txt_km=$("#txt_km_"+id).val();
	var txt_la=$("#txt_la_"+id).val();

	$(this).load("ajax_zone.php",{"en":txt_en,"th":txt_th,"vn":txt_vn,"mm":txt_mm,"km":txt_km,"la":txt_la,"add":"all","by":by });
	}
	
</script>
<div id="save_ok"></div>
<?php
require('conn_lang.php');

$lang=array(1=>"ฟุตบอล","มวยไทย","บาสเกตบอล","อเมริกันฟุตบอล","เบสบอล","ฮอกกี้","เทนนิส","วอลเล่บอล","สนุกเกอร์");
#	echo '<br>'.$sql="update bom_tb_lang_zone set th='$rs[thai]' , la='$rs[lao]'   where en='$rs[eng]'; ";

	
?>
<select onchange="window.location.href='?lang='+this.value">
<? for($x=1;$x<=count($lang);$x++){?>
  <option value="<?=$x;?>" <? if($x==$_GET[lang]){echo'selected="selected"';}?>><?=$lang[$x];?></option>
  <? }?>
</select>

<style type="text/css">
	.TFtable{
		width:100%; 
		border-collapse:collapse; 
	}
	.TFtable td{ 
		padding:7px; border:#999 1px solid;
	}
	/* provide some minimal visual accomodation for IE8 and below */
	.TFtable tr{
		background: #fff;
	}
	/*  Define the background color for all the ODD background rows  */
	.TFtable tr:nth-child(odd){ 
		background: #e5e5e5;
	}
	/*  Define the background color for all the EVEN background rows  */
	.TFtable tr:nth-child(even){
		background: #d5d5d5;
	}
</style>



<div>
<table width="100%" border="1" cellpadding="5" cellspacing="1"  class="TFtable">
  <tr>
   <td width="2%" align="center">No.</td>
    <td width="16%" align="center">Eng</td>
    <td width="15%" align="center">Thai</td>
    <td width="15%" align="center">Vietnamese</td>
    <td width="16%" align="center">Myanmar</td>
    <td width="16%" align="center">Khmer</td>
    <td width="16%" align="center">Laos</td>
    <td width="4%" align="center">&nbsp;</td>
  </tr>
<?
$x=1;
if($_GET[lang]==""){
$ww=" where  lang_sport=1 ";
}else{
$ww=" where  lang_sport=$_GET[lang] ";
	}
	
$sql="SELECT * FROM bom_tb_lang_zone $ww order by en asc  limit  5000";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
  ?>
  <tr>
   <td align="center"><b><?=$x;?></b></td>
    <td><input name="txt_en_<?=$x;?>" type="text" id="txt_en_<?=$x;?>" value="<?=$rs[en];?>"  style="width:100%"/></td>
   <td><input name="txt_th_<?=$x;?>" type="text" id="txt_th_<?=$x;?>" value="<?=$rs[th];?>"  style="width:100%" /></td>
    <td><input name="txt_vn_<?=$x;?>" type="text" id="txt_vn_<?=$x;?>" value="<?=$rs[vn];?>"  style="width:100%" /></td>
   <td><input name="txt_mm_<?=$x;?>" type="text" id="txt_mm_<?=$x;?>" value="<?=$rs[mm];?>"  style="width:100%" /></td>
   <td><input name="txt_km_<?=$x;?>" type="text" id="txt_km_<?=$x;?>" value="<?=$rs[km];?>"  style="width:100%" /></td>
   <td><input name="txt_la_<?=$x;?>" type="text" id="txt_la_<?=$x;?>" value="<?=$rs[la];?>" style="width:100%" /></td>
    <td><input type="submit" name="b_save" id="b_save" value="Save <?=$x;?>" onclick="_ok('<?=$x;?>','zone')" /></td>
  </tr>
  <? $x++;}?>
</table>
</div>

<hr>

<div>
<table width="100%" border="1" cellpadding="5" cellspacing="1"  class="TFtable">
  <tr>
   <td width="2%" align="center">No.</td>
    <td width="16%" align="center">Eng</td>
    <td width="15%" align="center">Thai</td>
    <td width="15%" align="center">Vietnamese</td>
    <td width="16%" align="center">Myanmar</td>
    <td width="16%" align="center">Khmer</td>
    <td width="16%" align="center">Laos</td>
    <td width="4%" align="center">&nbsp;</td>
  </tr>
<?
#$x=1;
#$ww=" where  en like '%-%'";
$sql="SELECT * FROM bom_tb_lang_team $ww order by en asc  limit  20000";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
  ?>
  <tr>
   <td align="center"><b><?=$x;?></b></td>
    <td><input name="txt_en_<?=$x;?>" type="text" id="txt_en_<?=$x;?>" value="<?=$rs[en];?>"  style="width:100%"/></td>
   <td><input name="txt_th_<?=$x;?>" type="text" id="txt_th_<?=$x;?>" value="<?=$rs[th];?>"  style="width:100%" /></td>
    <td><input name="txt_vn_<?=$x;?>" type="text" id="txt_vn_<?=$x;?>" value="<?=$rs[vn];?>"  style="width:100%" /></td>
   <td><input name="txt_mm_<?=$x;?>" type="text" id="txt_mm_<?=$x;?>" value="<?=$rs[mm];?>"  style="width:100%" /></td>
   <td><input name="txt_km_<?=$x;?>" type="text" id="txt_km_<?=$x;?>" value="<?=$rs[km];?>"  style="width:100%" /></td>
   <td><input name="txt_la_<?=$x;?>" type="text" id="txt_la_<?=$x;?>" value="<?=$rs[la];?>" style="width:100%" /></td>
    <td><input type="submit" name="b_save" id="b_save" value="Save <?=$x;?>" onclick="_ok('<?=$x;?>','team')" /></td>
  </tr>
  <? $x++;}?>
</table>
</div>
