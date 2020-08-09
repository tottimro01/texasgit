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
	var txt_my=$("#txt_my_"+id).val();
	var txt_km=$("#txt_km_"+id).val();
	var txt_la=$("#txt_la_"+id).val();

	$("#ok_"+id).load("ajax_zone2.php",{"en":txt_en,"th":txt_th,"vn":txt_vn,"my":txt_my,"km":txt_km,"la":txt_la,"add":"all","by":by });
	}
</script>
<div id="save_ok"></div>
<?php
require('conn_lang.php');


#	echo '<br>'.$sql="update bom_tb_lang_zone set th='$rs[thai]' , la='$rs[lao]'   where en='$rs[eng]'; ";

	
?>

<style type="text/css">
	.TFtable{
		width:60%; 
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
<table  border="1" cellpadding="5" cellspacing="1"  class="TFtable">
  <tr>
   <td width="2%" align="center">No.</td>
    <td width="16%" align="center">Eng</td>
    <td width="15%" align="center">Thai</td>
    <td width="16%" align="center">Myanmar</td>
    <td width="16%" align="center">Laos</td>
    <td width="4%" align="center">&nbsp;</td>
  </tr>
<?
$x=2;
$ww=" where  lang_sport =$x";
$sql="SELECT * FROM bom_tb_lang_zone $ww order by en asc  limit  5000";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
  ?>
  <tr>
   <td align="center"><b><?=$x;?></b></td>
    <td><input name="txt_en_<?=$x;?>" type="text" id="txt_en_<?=$x;?>" value="<?=$rs[en];?>"  style="width:100%"/></td>
   <td><input name="txt_th_<?=$x;?>" type="text" id="txt_th_<?=$x;?>" value="<?=$rs[th];?>"  style="width:100%" /></td>
   <td><input name="txt_my_<?=$x;?>" type="text" id="txt_my_<?=$x;?>" value="<?=$rs[my];?>"  style="width:100%" /></td>
   <td><input name="txt_la_<?=$x;?>" type="text" id="txt_la_<?=$x;?>" value="<?=$rs[la];?>" style="width:100%" /></td>
    <td><span id="ok_<?=$x;?>"><input type="submit" name="b_save" id="b_save" value="Save <?=$x;?>" onclick="_ok('<?=$x;?>','zone')" /></span></td>
  </tr>
  <? $x++;}?>
</table>
</div>

<hr>

<div>
<table  border="1" cellpadding="5" cellspacing="1"  class="TFtable">
  <tr>
   <td width="2%" align="center">No.</td>
    <td width="16%" align="center">Eng</td>
    <td width="15%" align="center">Thai</td>
    <td width="16%" align="center">Myanmar</td>
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
   <td><input name="txt_my_<?=$x;?>" type="text" id="txt_my_<?=$x;?>" value="<?=$rs[my];?>"  style="width:100%" /></td>
   <td><input name="txt_la_<?=$x;?>" type="text" id="txt_la_<?=$x;?>" value="<?=$rs[la];?>" style="width:100%" /></td>
    <td><span id="ok_<?=$x;?>"><input type="submit" name="b_save" id="b_save" value="Save <?=$x;?>" onclick="_ok('<?=$x;?>','team')" /></span></td>
  </tr>
  <? $x++;}?>
</table>
</div>

<hr>

<?
/*
function _myz($val){
	$xx=str_replace(array('มวยไทย','ลุมพินี','ช่อง','ราชดำเนิน','ไม่ครบยก','ครบยก','','','','','',''),array('Muaythai','Lumpini','Channel','Rajdumnern','KnockOut','Fully','','','','','',''),$val);
	return $xx;
	}
	
	
	
echo'<br>'.$sql="SELECT * FROM bom_tb_data_football_single where b_sport='2'   group by   b_zone  order by b_zone asc  limit  20000";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
	
			echo'<br>'.$sql = "INSERT IGNORE INTO bom_tb_lang_zone(en,th,lang_sport) value('"._myz($rs[b_zone])."' ,'$rs[b_zone]',2);";
		#	sql_query($sql);	
	
}

echo'<br>'.$sql="SELECT * FROM bom_tb_data_football_single where b_sport='2'  group by b_name_1   order by b_zone asc  limit  20000";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
	
			echo'<br>'.$sql = "INSERT IGNORE INTO bom_tb_lang_team(en,th,lang_sport) value('"._myz($rs[b_name_1])."' ,'$rs[b_name_1]',2);";
	#		sql_query($sql);	
	
}
*/
/*
echo'<br>'.$sql="SELECT * FROM bom_tb_lang_team where lang_sport='2'  group by th   order by th desc";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
	
			echo'<br>'.$sql = "INSERT IGNORE INTO bom_tb_lang_team(en,th,lang_sport) value('$rs[en]' ,'$rs[th]',2);";
		#	sql_query($sql);	
	
}
*/
  ?>
  
  
