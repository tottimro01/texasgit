<style>

table .bg_table {
    border-collapse: collapse;
}

td {
    position: relative;
}
.strikeout td{
	color:#111;
	background:#C3C3C3;
	}
tr.strikeout td:before {
    content: " ";
    position: absolute;
    top: 50%;
    left: 0;
    border-bottom: 1px solid #111;
    width: 100%;
}
</style>
<table width="100%" border="0" cellpadding="5" cellspacing="1" class="txt_back11n bg_table">
  <tbody>
    <tr align="center" class="tb_title_lotto">
      <td width="9%"><?=$lang_member[466];?></td>
      <td width="20%" height="25"><?=$lang_member[407];?></td>
      <td width="11%"><?=$lang_member[160];?></td>
      <td width="12%"><?=$lang_member[381];?></td>
      <td width="12%"><?=$lang_member[300];?></td>
      <td width="12%"><?=$lang_member[610];?></td>
      <td width="12%"><?=$lang_member[470];?></td>
      <td width="12%"><?=$lang_member[611];?></td>
    </tr>
    
    <? 
$x=1;	
$sum1=array();
$sum2=array();
$sum3=array();
$sum4=array();
	
	/*
$url_file3=$json_file_main."json/lotto/betting/sum/".$_SESSION['m_id']."/".$view_date.".json";	
$ok_js=file_get_contents2($url_file3);
$ok_bet = json_decode2($ok_js, true);
foreach($ok_bet as $rs){
	*/
if($_POST[qq]!=""){
	$qq=" and  bill_id='$_POST[qq]'";
	}
	
if($_POST[qqname]!=""){
	$qqname=" and  b_name='$_POST[qqname]'";
	}
if($_POST[qqno]!=""){
	$qqno=" and  b_no='$_POST[qqno]'";
	}	
	# and b_accept=1 
 $sql="select * from  bom_tb_lotto_bill_play_live where m_id='".$_SESSION['m_id']."' and lot_zone = 1 and b_date='$view_date'  $qq $qqname $qqno order by play_timestam desc , play_id asc ";		
 $num=sql_num($sql);
 if($num==0){
 $sql="select * from  bom_tb_lotto_bill_play where m_id='".$_SESSION['m_id']."' and lot_zone = 1 and b_date='$view_date'  $qq $qqname $qqno order by play_timestam desc , play_id asc ";	
 }
 
$re=sql_query($sql);
while($rs=sql_fetch($re)){
	if(
	($_POST[lot_1]==1 and $rs["lot_type"]==1) or 
	($_POST[lot_2]==1 and $rs["lot_type"]==2) or 
	($_POST[lot_3]==1 and $rs["lot_type"]==3) or 
	($_POST[lot_4]==1 and $rs["lot_type"]==4) or 
	($_POST[lot_5]==1 and $rs["lot_type"]==5) or 
	($_POST[lot_6]==1 and $rs["lot_type"]==6) or 
	($_POST[lot_7]==1 and $rs["lot_type"]==7) or 
	($_POST[lot_8]==1 and $rs["lot_type"]==8) or 
	($_POST[lot_9]==1 and $rs["lot_type"]==9) or 
	($_POST[lot_10]==1 and $rs["lot_type"]==10) or 
	($_POST[lot_11]==1 and $rs["lot_type"]==11) or 
	($_POST[lot_12]==1 and $rs["lot_type"]==12) or 
	($_POST[lot_13]==1 and $rs["lot_type"]==13) or 
	($_POST[lot_14]==1 and $rs["lot_type"]==14) or 
	($_POST[lot_15]==1 and $rs["lot_type"]==15) or
	($_POST[lot_16]==1 and $rs["lot_type"]==16) or 
	($_POST[lot_17]==1 and $rs["lot_type"]==17) or 
	($_POST[lot_18]==1 and $rs["lot_type"]==18) or 
	($_POST[lot_19]==1 and $rs["lot_type"]==19) or 
	($_POST[lot_20]==1 and $rs["lot_type"]==20) or 
	($_POST[lot_21]==1 and $rs["lot_type"]==21) or 
	($_POST[lot_22]==1 and $rs["lot_type"]==22) or 
	($_POST[lot_23]==1 and $rs["lot_type"]==23) or 
	($_POST[lot_24]==1 and $rs["lot_type"]==24) or 
	($_POST[period]=="")){

/*	
JSON 
$sum2[]=$rs["b_total"]-$rs["play_pay"];
$sum3[]=(-$rs["play_pay"])+$rs["b_bonus"];
*/
if($rs[b_accept]==1){
$sum1[]=-$rs["b_total"];

$sum2[]=$rs["b_total"]-$rs["b_pay"];
$sum3[]=$rs["b_bonus"];
$sum4[]=(-$rs["b_pay"])+$rs["b_bonus"];

$xdis=_cbp($rs["b_total"]-$rs["b_pay"],2);
$xbonus=_cbp($rs["b_bonus"],2);
$xsum=_cbp((-$rs["b_pay"])+$rs["b_bonus"],2);
}else{
$xdis='';
$xbonus='';
$xsum='';
	}
	
	?>
                  <tr align="center" class="<? if($rs[b_accept]==0){echo'strikeout';}?> tr_lot" >
                  <td align="center"><?=$rs[play_id]?></td>
                    <td><?=date("d/m/Y H:i:s" , $rs["play_timestam"]);?>
                      <? if($rs["b_no"]!=""){?><span class="poy<?=($rs["b_no"]%2);?>"><?=$rs["b_no"];?></span><? }?>
                      </td>
      <td align="center"><?=$lot_type[$_SESSION['lang']][1][$rs["lot_type"]]?></td>
      <td align="center"><?=_dt($rs["play_number"])?></td>
      <td align="right"><?=_cbp(-$rs["b_total"],2)?></td>
      
      
      <td align="right"><?=$xdis?></td>
        <td align="right"><?=$xbonus?></td>
      <td align="right"><?=$xsum?></td>
      
                  </tr>
                  <? $x++; }} ?>
    
    <tr class="bg_td">
      <td height="18" colspan="4" align="center"><?=$lang_member[611];?></td>
      <td align="right" class="txt_back11b"><?=_cbn(@array_sum($sum1),2)?></td>
      <td align="right" class="txt_back11b"><?=_cbn(@array_sum($sum2),2)?></td>
      <td align="right" class="txt_blue11b"><?=_cbn(@array_sum($sum3),2)?></td>
      <td align="right" class="txt_blue11b"><?=_cbn(@array_sum($sum4),2)?></td>
    </tr>
    </tbody>
</table>