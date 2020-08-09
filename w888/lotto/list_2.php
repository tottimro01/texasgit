<?
#print_r($lot_pay_big5);
 
$mo_array=array();
$num_array=array();


if($_POST[qq]!=""){
	$qq=" and  bill_id='$_POST[qq]'";
	}
if($_POST[qqname]!=""){
	$qqname=" and  b_name='$_POST[qqname]'";
	}
if($_POST[qqno]!=""){
	$qqno=" and  b_no='$_POST[qqno]'";
	}
   $sql="select * from  bom_tb_lotto_bill_play_live where m_id='".$_SESSION['m_id']."' and lot_zone = 1 and b_date='$view_date'  and b_accept=1  $qq $qqname $qqno  order by lot_type asc , play_number asc ";	
    $num=sql_num($sql);
 if($num==0){
	 $sql="select * from  bom_tb_lotto_bill_play where m_id='".$_SESSION['m_id']."' and lot_zone = 1 and b_date='$view_date'  and b_accept=1  $qq $qqname $qqno  order by lot_type asc , play_number asc ";	
 }
	$re=sql_query($sql);
	while($rs=sql_fetch($re)){

	$mo_array[$rs[lot_type]][$rs[play_number]][]=	($rs[b_total]);
	$num_array[$rs[lot_type]][]=$rs[play_number];
}
 #print_r($mo_array[13][45]); 

#}
############ หาเลข
$s_num=array();
// for($x=1;$x<=count($lot_type[$_SESSION['lang']][1]);$x++){	
foreach ($lot_type[$_SESSION['lang']][1] as $x => $value) {  
	if(count($num_array[$x])>0){
$s_num[$x] = @array_unique($num_array[$x]);
}
}
################# รวม
$asum=array();
#$x_cut=$_GET[tcut];


	// for($x=1;$x<=count($lot_type[$_SESSION['lang']][1]);$x++){	
foreach ($lot_type[$_SESSION['lang']][1] as $x => $value) {  	
		if(count($s_num[$x])>0){
foreach($s_num[$x] as $num){
$sum=@array_sum($mo_array[$x][$num]);

$sum_cut=$sum;					
$asum[sum][$x][$num]=$sum_cut;
$asum[num][$x][$sum_cut]=$num;
	}
	}
}
#arsort()
#rsort()
#ksort()
#krsort() 
#sort ()
#rsort()
#uasort 
#uksort 
#usort 


#print_r($asum[num][1]);
#echo'<br>';
/*
for($x=1;$x<=count($lot_type[$_SESSION['lang']][1]);$x++){
if(count($asum[num][$x])>0){	
if($_GET[v]==1){
arsort($asum[sum][$x]);###มาก หา น้อย	
}
}
}*/

#print_r($asum[num][1]);
?>

<table width="100%" border="0" cellpadding="0" cellspacing="1" class="txt_back11n bg_table">
  <tbody>
    <tr align="center" class="tb_title_lotto">
    <? if($lot_pay_big5[1]>0){ ?>
    <td width="14%" align="center" >
      <?=$lot_type[$_SESSION['lang']][1][1];?>
      </td>
      <? }?>
      
      <? if($lot_pay_big5[2]>0){ ?>
    <td width="14%"  align="center" >
      <?=$lot_type[$_SESSION['lang']][1][2];?>
      </td>
      <? }?>
      
      <? if($lot_pay_big5[3]>0){ ?>
    <td width="14%"  align="center" >
      <?=$lot_type[$_SESSION['lang']][1][3];?>
      </td>
      <? }?>
      
      <? if($lot_pay_big5[4]>0){ ?>
    <td width="14%"  align="center" >
      <?=$lot_type[$_SESSION['lang']][1][4];?>
      </td>
      <? }?>
      
      <? if($lot_pay_big5[5]>0){ ?>
    <td width="14%"  align="center" >
      <?=$lot_type[$_SESSION['lang']][1][5];?>
      </td>
      <? }?>
      
       <? if($lot_pay_big5[24]>0){ ?>
     <td width="14%"  align="center" >
      <?=$lot_type[$_SESSION['lang']][1][24];?>
      </td>
      <? }?>
      
    <td width="16%"  align="center" ><?=$lang_member[564]?></td>
  </tr>
  <tr >
  
  <? if($lot_pay_big5[1]>0){ ?>
    <td  align="center" valign="top" bgcolor="#FFFFFF">
<table width="100%" border="0" cellpadding="5" cellspacing="1" class="txt_back11n bg_table">
    <thead>
       <tr align="center" class="tb_title_lotto">
          <th width="30%" align="center" ><?=$lang_member[381]?> <img src="../../img/arrow-down.png" height="14" ></th>
          <th width="70%" align="center" ><?=$lang_member[563]?> </th>
        </tr>
        </thead>
        <tbody>
        <?


$type=1;
$sum_total=array();

$bom_asc=$asum[sum][$type];	


if(count($bom_asc)>0){
	
foreach(array_keys($bom_asc) as $c_num){  

$g_sum=$asum[sum][$type][$c_num];
$sum_total[]=$g_sum;
###############################

?>
        <tr align="center" class="tr_lot" >
          <td align="center" ><?=$c_num;?></td>
          <td align="center" ><span><?=number_format(round($g_sum));?></span></td>
        </tr>
        <? }}?>
        </tbody>
        <tfoot>
         <tr class="bg_td">
          <td align="center" ><b><?=$lang_member[611];?></b></td>
          <td align="center"   ><?=_cbn(round(@array_sum($sum_total)),2);?></td>
        </tr>
        </tfoot>
      </table></td>
       <? }?>
    <? if($lot_pay_big5[2]>0){ ?>  
    <td  align="center" valign="top" bgcolor="#FFFFFF">
   <table width="100%" border="0" cellpadding="5" cellspacing="1" class="txt_back11n bg_table">
        <thead><tr align="center" class="tb_title_lotto">
          <th width="30%" align="center" ><?=$lang_member[381]?> <img src="../../img/arrow-down.png" height="14" ></th>
          <th width="70%" align="center" ><?=$lang_member[563]?> </th>
        </tr>
        </thead>
         <tbody>
        <?


$type=2;
$sum_total=array();

$bom_asc=$asum[sum][$type];	


if(count($bom_asc)>0){
	
foreach(array_keys($bom_asc) as $c_num){  

$g_sum=$asum[sum][$type][$c_num];
$sum_total[]=$g_sum;
###############################

?>
        <tr align="center" class="tr_lot" >
          <td align="center" ><?=$c_num;?></td>
          <td align="center" ><span><?=number_format(round($g_sum));?></span></td>
        </tr>
        <? }}?>
        </tbody>
        <tfoot>
         <tr class="bg_td">
          <td align="center" ><b><?=$lang_member[611];?></b></td>
          <td align="center"   ><?=_cbn(round(@array_sum($sum_total)),2);?></td>
        </tr>
        </tfoot>
      </table></td>
       <? }?>
       <? if($lot_pay_big5[3]>0){ ?>
    <td  align="center" valign="top" bgcolor="#FFFFFF">
<table width="100%" border="0" cellpadding="5" cellspacing="1" class="txt_back11n bg_table">
    <thead><tr align="center" class="tb_title_lotto">
          <th width="30%" align="center" ><?=$lang_member[381]?> <img src="../../img/arrow-down.png" height="14" ></th>
          <th width="70%" align="center" ><?=$lang_member[563]?> </th>
        </tr>
        </thead>
        <tbody>
        <?


$type=3;
$sum_total=array();

$bom_asc=$asum[sum][$type];	


if(count($bom_asc)>0){
	
foreach(array_keys($bom_asc) as $c_num){  

$g_sum=$asum[sum][$type][$c_num];
$sum_total[]=$g_sum;
###############################

?>
        <tr align="center" class="tr_lot" >
          <td align="center" ><?=$c_num;?></td>
          <td align="center" ><span><?=number_format(round($g_sum));?></span></td>
        </tr>
        <? }}?>
        </tbody>
        <tfoot>
        <tr class="bg_td">
          <td align="center" ><b><?=$lang_member[611];?></b></td>
          <td align="center"   ><?=_cbn(round(@array_sum($sum_total)),2);?></td>
        </tr>
        </tfoot>
      </table></td>
       <? }?>
      <? if($lot_pay_big5[4]>0){ ?> 
    <td align="center" valign="top" bgcolor="#FFFFFF">
  <table width="100%" border="0" cellpadding="5" cellspacing="1" class="txt_back11n bg_table">
    <thead><tr align="center" class="tb_title_lotto">
          <th width="30%" align="center" ><?=$lang_member[381]?> <img src="../../img/arrow-down.png" height="14" ></th>
          <th width="70%" align="center" ><?=$lang_member[563]?> </th>
        </tr>
        </thead>
        <tbody>
        <?


$type=4;
$sum_total=array();

$bom_asc=$asum[sum][$type];	


if(count($bom_asc)>0){
	
foreach(array_keys($bom_asc) as $c_num){  

$g_sum=$asum[sum][$type][$c_num];
$sum_total[]=$g_sum;
###############################

?>
        <tr align="center" class="tr_lot" >
          <td align="center" ><?=$c_num;?></td>
          <td align="center" ><span><?=number_format(round($g_sum));?></span></td>
        </tr>
        <? }}?>
        </tbody>
        <tfoot>
        <tr class="bg_td">
          <td align="center" ><b><?=$lang_member[611];?></b></td>
          <td align="center"   ><?=_cbn(round(@array_sum($sum_total)),2);?></td>
        </tr>
        </tfoot>
      </table></td>
       <? }?>
       <? if($lot_pay_big5[5]>0){ ?>
    <td  align="center" valign="top" bgcolor="#FFFFFF">
   <table width="100%" border="0" cellpadding="5" cellspacing="1" class="txt_back11n bg_table">
    <thead><tr align="center" class="tb_title_lotto">
          <th width="30%" align="center" ><?=$lang_member[381]?> <img src="../../img/arrow-down.png" height="14" ></th>
          <th width="70%" align="center" ><?=$lang_member[563]?> </th>
        </tr>
        </thead>
        <tbody>
        <?


$type=5;
$sum_total=array();

$bom_asc=$asum[sum][$type];	


if(count($bom_asc)>0){
	
foreach(array_keys($bom_asc) as $c_num){  

$g_sum=$asum[sum][$type][$c_num];
$sum_total[]=$g_sum;
###############################

?>
        <tr align="center" class="tr_lot" >
          <td align="center" ><?=$c_num;?></td>
          <td align="center" ><span><?=number_format(round($g_sum));?></span></td>
        </tr>
        <? }}?>
        </tbody>
        <tfoot>
         <tr class="bg_td">
          <td align="center" ><b><?=$lang_member[611];?></b></td>
          <td align="center"   ><?=_cbn(round(@array_sum($sum_total)),2);?></td>
        </tr>
        </tfoot>
      </table></td>
       <? }?>
       
        <? if($lot_pay_big5[24]>0){ ?>
    <td  align="center" valign="top" bgcolor="#FFFFFF">
    <table width="100%" border="0" cellpadding="5" cellspacing="1" class="txt_back11n bg_table">
    <thead><tr align="center" class="tb_title_lotto">
          <th width="30%" align="center" ><?=$lang_member[381]?> <img src="../../img/arrow-down.png" height="14" ></th>
          <th width="70%" align="center" ><?=$lang_member[563]?> </th>
        </tr>
        </thead>
        <tbody>
        <?


$type=24;
$sum_total=array();

$bom_asc=$asum[sum][$type];	


if(count($bom_asc)>0){
	
foreach(array_keys($bom_asc) as $c_num){  

$g_sum=$asum[sum][$type][$c_num];
$sum_total[]=$g_sum;
###############################

?>
        <tr align="center" class="tr_lot" >
          <td align="center" ><?=$c_num;?></td>
          <td align="center" ><span><?=number_format(round($g_sum));?></span></td>
        </tr>
        <? }}?>
        </tbody>
        <tfoot>
         <tr class="bg_td">
          <td align="center" ><b><?=$lang_member[611];?></b></td>
          <td align="center"   ><?=_cbn(round(@array_sum($sum_total)),2);?></td>
        </tr>
        </tfoot>
      </table></td>
      <? }?>
      
      
      
    <td  align="center" valign="top" bgcolor="#FFFFFF"><?

	 for($x_type=6;$x_type<=23;$x_type++){
		 	 if($lot_pay_big5[$x_type]>0){ 
$bom_asc=$asum[sum][$x_type];	
if(count($bom_asc)>0){
		?>
    <table width="100%" border="0" cellpadding="5" cellspacing="1" class="txt_back11n bg_table">
      <thead>
        <tr align="center" class="tb_title_lotto">
          <td colspan="2" align="center" >
            <?=$lot_type[$_SESSION['lang']][1][$x_type];?>
            </td>
        </tr><tr align="center" class="tb_title_lotto">
          <th width="30%" align="center" ><?=$lang_member[381]?> <img src="../../img/arrow-down.png" height="14" ></th>
          <th width="70%" align="center" ><?=$lang_member[563]?> </th>
        </tr>
        </thead>
        <tbody>
        <?


$type=$x_type;
$sum_total=array();

$bom_asc=$asum[sum][$type];	


if(count($bom_asc)>0){
	
foreach(array_keys($bom_asc) as $c_num){  

$g_sum=$asum[sum][$type][$c_num];
$sum_total[]=$g_sum;
###############################

?>
        <tr align="center" class="tr_lot" >
          <td align="center" ><?=_dt($c_num);?></td>
          <td align="center" ><span><?=number_format(round($g_sum));?></span></td>
        </tr>
        
        <? }}?>
        </tbody>
        <tfoot>
         <tr class="bg_td">
          <td align="center" ><b><?=$lang_member[611];?></b></td>
          <td align="center"   ><?=_cbn(round(@array_sum($sum_total)),2);?></td>
        </tr>
        </tfoot>
      </table>
      <br>
      <? }}}?></td>
  </tr>
  </tr>
</table>