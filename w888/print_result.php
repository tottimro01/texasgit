<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('inc/conn.php');
require('inc/function.php');
// require("lang/member_lang.php");
  require("lang/variable_lang.php");

if($_GET['d']!=""){$view_date=$_GET['d'];}
else{$view_date=_bdate();}

if($_GET['sport']!=""){$xzone=$_GET['sport'];}
else{$xzone=1;}

$fo= $view_date."_".$xzone.".json";
$data=file_get_contents2("json/sport/result/temp/$fo");
$sport = json_decode2($data, true);

if($_SESSION['lang']!='en'){
$fo2= $view_date."_".$_SESSION['lang'].".json";
$data_lang=file_get_contents2("json/sport/lang/1/$fo2");
$sport_lang = json_decode2($data_lang, true);
}


#print_r($sport_lang);

if(count($sport['Result'])>1){

$myLeage = array();	

for($i=0;$i<count($sport['Result']);$i++){
		if(!(in_array(_html($sport['Result'][$i]['b_zone']) , $myLeage))){
			$myLeage[] = _html($sport['Result'][$i]['b_zone']);
		}
}	
}



if($xzone==1  or $xzone==3 or $xzone==4 or $xzone==5 or $xzone==6 ){
	$matchz=$lang_member[708];
}else{
	$matchz='A vs B';
	}
#print_r($sport_lang[Zone]);	
?>
<meta charset="UTF-8">
<? if($_SESSION['lang']=="mm"){?><link rel="stylesheet" type="text/css" href="css/style_mm.css?v=2019"><? }?>
<style type="text/css">
@media all
{
	.page-break	{ display:none; }
	.page-break-no{ display:none; }
}

@media screen
  {
.yes{ display:none;}
.ball{ font-size:12px;}
.r12{ font-size:12px;}
.tcr{ text-decoration:underline; color:#F00; }
.ball td{border: 1px dotted black;}
.bb{ font-weight:bold;}
.txt10{ font-size:12px; font-weight:100; }
table{border-collapse:collapse; }

  }
  
@media print
  {
.no{ display:none;}
.ball{ font-size:12px;}
.r12{ font-size:12px;}
.tcr{ text-decoration:underline; color:#000;}
.ball td{border: 1px solid black;}
.bb{ font-weight:bold;}
.txt10{ font-size:12px; font-weight:100; }
table{border-collapse:collapse; }
	.page-break	{ display:block;height:1px; page-break-before:always; }
	.page-break-no{ display:block;height:1px; page-break-after:avoid; }	
  }

</style>
	

<title><?=$lang_member[799];?>  <?=$view_date;?>
</title>
<div align="center">

<div class="no">
<table width="750" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="57%"><h3> <?=$lang_member[799];?>  
	<select onchange="window.location='?rob=<?=$_GET['rob'];?>&view=<?=$_GET['view'];?>&d='+this.value">
<?  for($xx=0;$xx<=10;$xx++){
$dd=date("d-m-Y",mktime(0,0,0,date("m"),date("d")-$xx,date("Y")));
	?>
<option value="<?=$dd;?>" <? if($view_date==$dd){echo'selected="selected"';}?>><?=$dd;?></option>
 <? }?>
	</select>
</h3> </td>
    <td width="43%"><input type="button"  value="Print"  onclick="javascript:print();"/></td>
  </tr>
</table>
</div>
<div class="page-break-no">&nbsp;</div>
<div class="yes" style="font-size:16px">
<?=$lang_member[799];?>  <?=$view_date;?>
 </div>


<table width="750" border="0" cellspacing="0" cellpadding="0" class="ball">
  
  <tbody>
    <tr align="center" class="tb_title_lotto">
    <td width="130" height="25" bgcolor="#D6D6D6"><?=$lang_member[303];?></td>
    <td width="430" bgcolor="#D6D6D6"><?=$matchz;?></td>
<? if($xzone==1  or $xzone==3 or $xzone==4 or $xzone==5 or $xzone==6 ){?>
    <td width="75" bgcolor="#D6D6D6"><?=$lang_member[803];?> </td>
<? }?>
    <td width="75" bgcolor="#D6D6D6"><?=$lang_member[805];?></td>
    <td width="80" bgcolor="#D6D6D6"><?=$lang_member[301];?></td>
  </tr> 
  <? for($x1=0;$x1<count($myLeage);$x1++){ 
  ?>
<tr><td height="20" colspan="5" class="txt_back11b" bgcolor="#FFFFFF" style="padding-left:80px;"><strong><?=_lg($myLeage[$x1], $sport_lang['Zone'][md5($myLeage[$x1])]);?></strong></td></tr>	
<? for($x2=0;$x2<count($sport['Result']);$x2++){ ?>
<? if($myLeage[$x1]==$sport['Result'][$x2]['b_zone']){ ?>
<tr class="tb_ball">
<td height="20" align="center"><?=date("d/m/Y H:i",$sport['Result'][$x2]['b_date_play']);?></td>
<td align="left" class="txt_back11n">
<? if($sport['Result'][$x2]['b_big']==1){echo'<b>';}?>
<?=_lg($sport['Result'][$x2]['b_name_1'], $sport_lang['Team'][md5($sport['Result'][$x2]['b_name_1'])]);?>
  <? if($sport['Result'][$x2]['b_big']==1){echo'</b>';}?>
 -vs- 
 <? if($sport['Result'][$x2]['b_big']==2){echo'<b>';}?>
<?=_lg($sport['Result'][$x2]['b_name_2'], $sport_lang['Team'][md5($sport['Result'][$x2]['b_name_2'])]);?>
  <? if($sport['Result'][$x2]['b_big']==2){echo'</b>';}?>
 </td>
 <? if($xzone==1  or $xzone==3 or $xzone==4 or $xzone==5 or $xzone==6 ){?>
<td align="center"><?=_sctxt($sport['Result'][$x2]['b_score_half'],$sc_lang);?></td>
<? }?>
<td align="center"><?=_sctxt($sport['Result'][$x2]['b_score_full'],$sc_lang);?></td>
<td align="center"><?=_stsc($sport['Result'][$x2]['b_score_half'] ,$sport['Result'][$x2]['b_score_full'],$sc_lang);?></td>
</tr>
<? }}} ?>
</tbody></table>
</div>
                            

							
							
		