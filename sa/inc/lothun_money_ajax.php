<?php 

include "inc_head_bySession.php";


if($_GET['rob']==""){
	$_GET['rob']=1;
	}
$zone=$_GET['zone'];
$rob=$_GET['rob'];
$date=$_GET['d'];
$sql="select * from bom_tb_lotto_ok where lot_zone='$zone' and lot_rob='$rob' and ok_date='$date' order by ok_id desc limit 1";
$re_ok=sql_array($sql);

$ok_id=$re_ok['ok_id'];
$o_active=$re_ok['o_active'];
if($o_active==0){
	$tb="bom_tb_lotto_bill_play_live";
	}else{
	$tb="bom_tb_lotto_bill_play";	
		}

 
$mset=$_GET['mset'];
$title_set = "";
if($mset!=""){
$tmset=" and b_setbet='$mset'";
if($mset==1){
  $title_set = "<h3>แสดงข้อมูลการเล่นแบบ A</h3>";
}else if($mset==2){
  $title_set = "<h3>แสดงข้อมูลการเล่นแบบ B</h3>";
}else if($mset==3){
  $title_set = "<h3>แสดงข้อมูลการเล่นแบบ C</h3>";
}

}


$mo_array=array();
$num_array=array();

 $sql="select 
*,
 (
    ROUND( b_total, 10)
   ) as t1 ,
   (
      ROUND(  (b_total)*(( 100-(b_share_m+b_myshare_1+b_myshare_2+b_myshare_3+b_myshare_4+b_myshare_5+b_myshare_6+b_myshare_7))/100) ,10)
   ) as r1 
 from $tb where     b_accept=1  and ok_id='$ok_id' $tmset order by lot_type asc , play_number asc ";

$re=sql_query($sql);
while($rs=sql_fetch($re)){
  if($_GET['set']==""){ 
    $sum10a=($rs['r1']);
  }else{
    $sum10a=($rs['t1']);
  }
  
  $mo_array[$rs[lot_type]][$rs[play_number]][]= $sum10a;
  $num_array[$rs[lot_type]][]=$rs[play_number];

}  


############ หาเลข
$s_num=array();
// for($x=1;$x<=count($lot_type["th"][$_GET[zone]]);$x++){ 
foreach ($lotHun_typeArry as $x => $value) {
  if(count($num_array[$x])>0){
    $s_num[$x] = @array_unique($num_array[$x]);
  }
}
################# รวมยอด  
$asum=array();

$_GET[tcut1]=str_replace(',','',trim($_GET[tcut1]));
$_GET[tcut2]=str_replace(',','',trim($_GET[tcut2]));
$_GET[tcut3]=str_replace(',','',trim($_GET[tcut3]));
$_GET[tcut4]=str_replace(',','',trim($_GET[tcut4]));
$_GET[tcut5]=str_replace(',','',trim($_GET[tcut5]));
$_GET[tcut6]=str_replace(',','',trim($_GET[tcut6]));
$_GET[tcut7]=str_replace(',','',trim($_GET[tcut7]));
$_GET[tcut8]=str_replace(',','',trim($_GET[tcut8]));
$_GET[tcut9]=str_replace(',','',trim($_GET[tcut9]));
$_GET[tcut10]=str_replace(',','',trim($_GET[tcut10]));
$_GET[tcut11]=str_replace(',','',trim($_GET[tcut11]));
$_GET[tcut12]=str_replace(',','',trim($_GET[tcut12]));
$_GET[tcut13]=str_replace(',','',trim($_GET[tcut13]));
$_GET[tcut14]=str_replace(',','',trim($_GET[tcut14]));
$_GET[tcut15]=str_replace(',','',trim($_GET[tcut15]));
$_GET[tcut16]=str_replace(',','',trim($_GET[tcut16]));
$_GET[tcut17]=str_replace(',','',trim($_GET[tcut17]));
$_GET[tcut18]=str_replace(',','',trim($_GET[tcut18]));
$_GET[tcut19]=str_replace(',','',trim($_GET[tcut19]));
$_GET[tcut20]=str_replace(',','',trim($_GET[tcut20]));
$_GET[tcut21]=str_replace(',','',trim($_GET[tcut21]));
$_GET[tcut22]=str_replace(',','',trim($_GET[tcut22]));
$_GET[tcut23]=str_replace(',','',trim($_GET[tcut23]));
$_GET[tcut24]=str_replace(',','',trim($_GET[tcut24]));
$_GET[tcut25]=str_replace(',','',trim($_GET[tcut25]));
$_GET[tcut26]=str_replace(',','',trim($_GET[tcut26]));
$_GET[tcut27]=str_replace(',','',trim($_GET[tcut27]));
$_GET[tcut28]=str_replace(',','',trim($_GET[tcut28]));
$_GET[tcut29]=str_replace(',','',trim($_GET[tcut29]));
$_GET[tcut30]=str_replace(',','',trim($_GET[tcut30]));
$_GET[tcut31]=str_replace(',','',trim($_GET[tcut31]));
$_GET[tcut32]=str_replace(',','',trim($_GET[tcut32]));
$_GET[tcut33]=str_replace(',','',trim($_GET[tcut33]));
$_GET[tcut34]=str_replace(',','',trim($_GET[tcut34]));
$_GET[tcut35]=str_replace(',','',trim($_GET[tcut35]));


if($_GET[tcut1]>=0){$x_cut1=$_GET[tcut1];}
else{$x_cut1=0;}
if($_GET[tcut2]>=0){$x_cut2=$_GET[tcut2];}
else{$x_cut2=0;}
if($_GET[tcut3]>=0){$x_cut3=$_GET[tcut3];}
else{$x_cut3=0;}
if($_GET[tcut4]>=0){$x_cut4=$_GET[tcut4];}
else{$x_cut4=0;}
if($_GET[tcut5]>=0){$x_cut5=$_GET[tcut5];}
else{$x_cut5=0;}
if($_GET[tcut6]>=0){$x_cut6=$_GET[tcut6];}
else{$x_cut6=0;}
if($_GET[tcut7]>=0){$x_cut7=$_GET[tcut7];}
else{$x_cut7=0;}
if($_GET[tcut8]>=0){$x_cut8=$_GET[tcut8];}
else{$x_cut8=0;}
if($_GET[tcut9]>=0){$x_cut9=$_GET[tcut9];}
else{$x_cut9=0;}
if($_GET[tcut10]>=0){$x_cut10=$_GET[tcut10];}
else{$x_cut10=0;}
if($_GET[tcut11]>=0){$x_cut11=$_GET[tcut11];}
else{$x_cut11=0;}
if($_GET[tcut12]>=0){$x_cut12=$_GET[tcut12];}
else{$x_cut12=0;}
if($_GET[tcut13]>=0){$x_cut13=$_GET[tcut13];}
else{$x_cut13=0;}
if($_GET[tcut14]>=0){$x_cut14=$_GET[tcut14];}
else{$x_cut14=0;}
if($_GET[tcut15]>=0){$x_cut15=$_GET[tcut15];}
else{$x_cut16=0;}
if($_GET[tcut17]>=0){$x_cut17=$_GET[tcut17];}
else{$x_cut17=0;}
if($_GET[tcut18]>=0){$x_cut18=$_GET[tcut18];}
else{$x_cut18=0;}
if($_GET[tcut19]>=0){$x_cut19=$_GET[tcut19];}
else{$x_cut19=0;}
if($_GET[tcut20]>=0){$x_cut20=$_GET[tcut20];}
else{$x_cut20=0;}
if($_GET[tcut21]>=0){$x_cut21=$_GET[tcut21];}
else{$x_cut21=0;}
if($_GET[tcut22]>=0){$x_cut22=$_GET[tcut22];}
else{$x_cut22=0;}
if($_GET[tcut23]>=0){$x_cut23=$_GET[tcut23];}
else{$x_cut23=0;}
if($_GET[tcut24]>=0){$x_cut24=$_GET[tcut24];}
else{$x_cut24=0;}
if($_GET[tcut25]>=0){$x_cut25=$_GET[tcut25];}
else{$x_cut25=0;}
if($_GET[tcut26]>=0){$x_cut26=$_GET[tcut26];}
else{$x_cut26=0;}
if($_GET[tcut27]>=0){$x_cut27=$_GET[tcut27];}
else{$x_cut27=0;}
if($_GET[tcut28]>=0){$x_cut28=$_GET[tcut28];}
else{$x_cut28=0;}
if($_GET[tcut29]>=0){$x_cut29=$_GET[tcut29];}
else{$x_cut29=0;}
if($_GET[tcut30]>=0){$x_cut30=$_GET[tcut30];}
else{$x_cut30=0;}
if($_GET[tcut31]>=0){$x_cut31=$_GET[tcut31];}
else{$x_cut31=0;}
if($_GET[tcut32]>=0){$x_cut32=$_GET[tcut32];}
else{$x_cut32=0;}
if($_GET[tcut33]>=0){$x_cut33=$_GET[tcut33];}
else{$x_cut33=0;}
if($_GET[tcut34]>=0){$x_cut34=$_GET[tcut34];}
else{$x_cut34=0;}
if($_GET[tcut35]>=0){$x_cut35=$_GET[tcut35];}
else{$x_cut35=0;}


foreach ($lotHun_typeArry as $x => $value) {
  if(count($s_num[$x])>0)
  {
      foreach($s_num[$x] as $num)
      {
          $sum=@array_sum($mo_array[$x][$num]);
          if($x==1){$x_cut=$x_cut1;}
          elseif($x==2){$x_cut=$x_cut2;}
          elseif($x==3){$x_cut=$x_cut3;}
          elseif($x==4){$x_cut=$x_cut4;}
          elseif($x==5){$x_cut=$x_cut5;}
          elseif($x==6){$x_cut=$x_cut6;}
          elseif($x==7){$x_cut=$x_cut7;}
          elseif($x==8){$x_cut=$x_cut8;}
          elseif($x==9){$x_cut=$x_cut9;}
          elseif($x==10){$x_cut=$x_cut10;}
          elseif($x==11){$x_cut=$x_cut11;}
          elseif($x==12){$x_cut=$x_cut12;}
          elseif($x==13){$x_cut=$x_cut13;}
          elseif($x==14){$x_cut=$x_cut14;}
          elseif($x==15){$x_cut=$x_cut15;}
          elseif($x==16){$x_cut=$x_cut16;}
          elseif($x==17){$x_cut=$x_cut17;}
          elseif($x==18){$x_cut=$x_cut18;}
          elseif($x==19){$x_cut=$x_cut19;}
          elseif($x==20){$x_cut=$x_cut20;}
          elseif($x==21){$x_cut=$x_cut21;}
          elseif($x==22){$x_cut=$x_cut22;}
          elseif($x==23){$x_cut=$x_cut23;}
          elseif($x==24){$x_cut=$x_cut24;}
          elseif($x==25){$x_cut=$x_cut25;}
          elseif($x==26){$x_cut=$x_cut26;}
          elseif($x==27){$x_cut=$x_cut27;}
          elseif($x==28){$x_cut=$x_cut28;}
          elseif($x==29){$x_cut=$x_cut29;}
          elseif($x==30){$x_cut=$x_cut30;}
          elseif($x==31){$x_cut=$x_cut31;}
          elseif($x==32){$x_cut=$x_cut32;}
          elseif($x==33){$x_cut=$x_cut33;}
          elseif($x==34){$x_cut=$x_cut34;}
          elseif($x==35){$x_cut=$x_cut35;}

          if($sum>=$x_cut and $x_cut!=""){
            $sum_cut=$x_cut;
          }else{
            $sum_cut=$sum;  
          }
        
          $asum[sum][$x][$num]=$sum_cut;
          $asum[num][$x][$sum_cut]=$num;
      }
  }
}


foreach ($lotHun_typeArry as $x => $value) {        
  if(count($asum[num][$x])>0){  
    if($_GET[asc]!=1){
      arsort($asum[sum][$x]);###มาก หา น้อย 
    }
  }
}


?>
<?=$title_set?>
<table width="100%" border="0" cellspacing="2" cellpadding="0" class="table-bordered table-hover" style="min-width: 900px;">
  <tr class="rightbox bg-blue-gradient" style="height: 40px;">
    <td width="12%" align="center" ><b class="cb">
       <?=$lotHun_typeArry[1];?>
      </b></td>
    
    <td width="12%"  align="center" ><b class="cb">
     <?=$lotHun_typeArry[3];?>
      </b></td>
    <td width="12%"  align="center" ><b class="cb">
      <?=$lotHun_typeArry[4];?>
      </b></td>
    <td width="12%"  align="center" ><b class="cb">
       <?=$lotHun_typeArry[5];?>
      </b></td>
     <td width="12%"  align="center" ><b class="cb">
      <?=$lotHun_typeArry[25];?>
      </b></td> 
     <td width="12%"  align="center" ><b class="cb">
      <?=$lotHun_typeArry[26];?>
      </b></td>
	  <? if($zone==3){?>
	     <td width="12%"  align="center" ><b class="cb">
      <?=$lotHun_typeArry[31];?>
      </b></td>
	  <? }?>
    <td width="16%"  align="center" ><strong>พิเศษ</strong></td>
  </tr>
  <tr >
    <td  align="center" valign="top">
    <table width="100%" border="0" cellspacing="1" cellpadding="0" id="tableLot1" class="table-bordered table-hover">
    <thead>
        <tr class="xsboku bg-aqua-gradient" >
          <th width="30%" align="center" >เลข</th>
          <th width="70%" align="center" >ยอด <img src="../../assests/img/arrow-up.png" height="19" onClick="load_tb();" style="cursor:pointer;"></th>
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
        <tr class="cu" id="tb<?=$type;?>tr<?=$c_num;?>" data-sum="<?=$g_sum?>" onClick="window.open('main.php?p=lothun_money2&g_p=lothun&d=<?=$_GET[d]?>&mset=<?=$_GET[mset]?>&zone=<?=$_GET[zone]?>&rob=<?=$_GET[rob]?>&number=<?=$c_num;?>&type=<?=$type;?>&bingo=&asc=3' , '_blank');">
          <td align="center" bgcolor="#f0f0f0" class="sa num"><?=$c_num;?></td>
          <td align="center" class="sa sum" style="position:relative;"><div class="bgfade" id="tb<?=$type;?>tr<?=$c_num;?>bg"></div><span class="sptxt" id="tb<?=$type;?>tr<?=$c_num;?>sum"><?=number_format(round($g_sum));?></span></td>
        </tr>
        <? }}?>
        </tbody>
        <tfoot>
        <tr>
          <td align="center" bgcolor="#2700B5" class="cw bb"><strong>รวม</strong></td>
          <td align="center" bgcolor="#2700B5" id="tb<?=$type;?>sumAll" class="cr bb"><?=number_format(round(@array_sum($sum_total)));?></td>
        </tr>
        </tfoot>
      </table></td>
    <td  align="center" valign="top">
    <table width="100%" border="0" cellspacing="1" cellpadding="0" id="tableLot2" class="table-bordered table-hover">
        <thead>
        <tr class="xsboku bg-aqua-gradient" >
          <th width="30%" align="center" >เลข</th>
          <th width="70%" align="center" >ยอด <img src="../../assests/img/arrow-up.png" height="19" onClick="load_tb();" style="cursor:pointer;"></th>
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
        <tr class="cu" id="tb<?=$type;?>tr<?=$c_num;?>" data-sum="<?=$g_sum?>" onClick="window.open('main.php?p=lothun_money2&g_p=lothun&d=<?=$_GET[d]?>&mset=<?=$_GET[mset]?>&zone=<?=$_GET[zone]?>&rob=<?=$_GET[rob]?>&number=<?=$c_num;?>&type=<?=$type;?>&bingo=&asc=3' , '_blank');">
          <td align="center" bgcolor="#f0f0f0" class="sa num"><?=$c_num;?></td>
          <td align="center" class="sa sum" style="position:relative;"><div class="bgfade" id="tb<?=$type;?>tr<?=$c_num;?>bg"></div><span class="sptxt" id="tb<?=$type;?>tr<?=$c_num;?>sum"><?=number_format(round($g_sum));?></span></td>
        </tr>
        <? }}?>
        </tbody>
        <tfoot>
        <tr>
          <td align="center" bgcolor="#2700B5" class="cw bb"><strong>รวม</strong></td>
          <td align="center" bgcolor="#2700B5" id="tb<?=$type;?>sumAll" class="cr bb"><?=number_format(round(@array_sum($sum_total)));?></td>
        </tr>
        </tfoot>
      </table></td>
    <td align="center" valign="top">
    <table width="100%" border="0" cellspacing="1" cellpadding="0" id="tableLot4" class="table-bordered table-hover">
    <thead>
        <tr class="xsboku bg-aqua-gradient" >
          <th width="30%" align="center" >เลข</th>
          <th width="70%" align="center" >ยอด <img src="../../assests/img/arrow-up.png" height="19" onClick="load_tb();" style="cursor:pointer;"></th>
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
        <tr class="cu" id="tb<?=$type;?>tr<?=$c_num;?>" data-sum="<?=$g_sum?>" onClick="window.open('main.php?p=lothun_money2&g_p=lothun&d=<?=$_GET[d]?>&mset=<?=$_GET[mset]?>&zone=<?=$_GET[zone]?>&rob=<?=$_GET[rob]?>&number=<?=$c_num;?>&type=<?=$type;?>&bingo=&asc=3' , '_blank');">
          <td align="center" bgcolor="#f0f0f0" class="sa num"><?=$c_num;?></td>
          <td align="center" class="sa sum" style="position:relative;"><div class="bgfade" id="tb<?=$type;?>tr<?=$c_num;?>bg"></div><span class="sptxt" id="tb<?=$type;?>tr<?=$c_num;?>sum"><?=number_format(round($g_sum));?></span></td>
        </tr>
        <? }}?>
        </tbody>
        <tfoot>
        <tr>
          <td align="center" bgcolor="#2700B5" class="cw bb"><strong>รวม</strong></td>
          <td align="center" bgcolor="#2700B5" id="tb<?=$type;?>sumAll" class="cr bb"><?=number_format(round(@array_sum($sum_total)));?></td>
        </tr>
        </tfoot>
      </table></td>
    <td  align="center" valign="top">
    <table width="100%" border="0" cellspacing="1" cellpadding="0" id="tableLot5" class="table-bordered table-hover">
    <thead>
        <tr class="xsboku bg-aqua-gradient" >
          <th width="30%" align="center" >เลข</th>
          <th width="70%" align="center" >ยอด <img src="../../assests/img/arrow-up.png" height="19" onClick="load_tb();" style="cursor:pointer;"></th>
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
        <tr class="cu" id="tb<?=$type;?>tr<?=$c_num;?>" data-sum="<?=$g_sum?>" onClick="window.open('main.php?p=lothun_money2&g_p=lothun&d=<?=$_GET[d]?>&mset=<?=$_GET[mset]?>&zone=<?=$_GET[zone]?>&rob=<?=$_GET[rob]?>&number=<?=$c_num;?>&type=<?=$type;?>&bingo=&asc=3' , '_blank');">
          <td align="center" bgcolor="#f0f0f0" class="sa num"><?=$c_num;?></td>
          <td align="center" class="sa sum" style="position:relative;"><div class="bgfade" id="tb<?=$type;?>tr<?=$c_num;?>bg"></div><span class="sptxt" id="tb<?=$type;?>tr<?=$c_num;?>sum"><?=number_format(round($g_sum));?></span></td>
        </tr>
        <? }}?>
        </tbody>
        <tfoot>
        <tr>
          <td align="center" bgcolor="#2700B5" class="cw bb"><strong>รวม</strong></td>
          <td align="center" bgcolor="#2700B5" id="tb<?=$type;?>sumAll" class="cr bb"><?=number_format(round(@array_sum($sum_total)));?></td>
        </tr>
        </tfoot>
      </table></td>
    <td  align="center" valign="top">
    <table width="100%" border="0" cellspacing="1" cellpadding="0" id="tableLot5" class="table-bordered table-hover">
    <thead>
        <tr class="xsboku bg-aqua-gradient" >
          <th width="30%" align="center" >เลข</th>
          <th width="70%" align="center" >ยอด <img src="../../assests/img/arrow-up.png" height="19" onClick="load_tb();" style="cursor:pointer;"></th>
        </tr>
        </thead>
        <tbody>
<?


$type=25;
$sum_total=array();

$bom_asc=$asum[sum][$type]; 


if(count($bom_asc)>0){
  
foreach(array_keys($bom_asc) as $c_num){  

$g_sum=$asum[sum][$type][$c_num];
$sum_total[]=$g_sum;
###############################

?>
        <tr class="cu" id="tb<?=$type;?>tr<?=$c_num;?>" data-sum="<?=$g_sum?>" onClick="window.open('main.php?p=lothun_money2&g_p=lothun&d=<?=$_GET[d]?>&mset=<?=$_GET[mset]?>&zone=<?=$_GET[zone]?>&rob=<?=$_GET[rob]?>&number=<?=$c_num;?>&type=<?=$type;?>&bingo=&asc=3' , '_blank');">
          <td align="center" bgcolor="#f0f0f0" class="sa num"><?=$c_num;?></td>
          <td align="center" class="sa sum" style="position:relative;"><div class="bgfade" id="tb<?=$type;?>tr<?=$c_num;?>bg"></div><span class="sptxt" id="tb<?=$type;?>tr<?=$c_num;?>sum"><?=number_format(round($g_sum));?></span></td>
        </tr>
        <? }}?>
        </tbody>
        <tfoot>
        <tr>
          <td align="center" bgcolor="#2700B5" class="cw bb"><strong>รวม</strong></td>
          <td align="center" bgcolor="#2700B5" id="tb<?=$type;?>sumAll" class="cr bb"><?=number_format(round(@array_sum($sum_total)));?></td>
        </tr>
        </tfoot>
      </table></td>
    <td  align="center" valign="top">
    <table width="100%" border="0" cellspacing="1" cellpadding="0" id="tableLot3" class="table-bordered table-hover">
    <thead>
        <tr class="xsboku bg-aqua-gradient" >
          <th width="30%" align="center" >เลข</th>
          <th width="70%" align="center" >ยอด <img src="../../assests/img/arrow-up.png" height="19" onClick="load_tb();" style="cursor:pointer;"></th>
        </tr>
        </thead>
        <tbody>


        <?


$type=26;
$sum_total=array();

$bom_asc=$asum[sum][$type]; 


if(count($bom_asc)>0){
  
foreach(array_keys($bom_asc) as $c_num){  

$g_sum=$asum[sum][$type][$c_num];
$sum_total[]=$g_sum;
###############################

?>
        <tr class="cu" id="tb<?=$type;?>tr<?=$c_num;?>" data-sum="<?=$g_sum?>" onClick="window.open('main.php?p=lothun_money2&g_p=lothun&d=<?=$_GET[d]?>&mset=<?=$_GET[mset]?>&zone=<?=$_GET[zone]?>&rob=<?=$_GET[rob]?>&number=<?=$c_num;?>&type=<?=$type;?>&bingo=&asc=3' , '_blank');">
          <td align="center" bgcolor="#f0f0f0" class="sa num"><?=$c_num;?></td>
          <td align="center" class="sa sum" style="position:relative;"><div class="bgfade" id="tb<?=$type;?>tr<?=$c_num;?>bg"></div><span class="sptxt" id="tb<?=$type;?>tr<?=$c_num;?>sum"><?=number_format(round($g_sum));?></span></td>
        </tr>
        <? }}?>
        </tbody>
        <tfoot>
        <tr>
          <td align="center" bgcolor="#2700B5" class="cw bb"><strong>รวม</strong></td>
          <td align="center" bgcolor="#2700B5" id="tb<?=$type;?>sumAll" class="cr bb"><?=number_format(round(@array_sum($sum_total)));?></td>
        </tr>
        </tfoot>
      </table></td>
	  
	  <? if($zone==3){?>
	    <td  align="center" valign="top">
    <table width="100%" border="0" cellspacing="1" cellpadding="0" id="tableLot3" class="table-bordered table-hover">
    <thead>
        <tr class="xsboku bg-aqua-gradient" >
          <th width="30%" align="center" >เลข</th>
          <th width="70%" align="center" >ยอด <img src="../../assests/img/arrow-up.png" height="19" onClick="load_tb();" style="cursor:pointer;"></th>
        </tr>
        </thead>
        <tbody>


        <?


$type=31;
$sum_total=array();

$bom_asc=$asum[sum][$type]; 


if(count($bom_asc)>0){
  
foreach(array_keys($bom_asc) as $c_num){  

$g_sum=$asum[sum][$type][$c_num];
$sum_total[]=$g_sum;
###############################

?>
        <tr class="cu" id="tb<?=$type;?>tr<?=$c_num;?>" data-sum="<?=$g_sum?>" onClick="window.open('main.php?p=lothun_money2&g_p=lothun&d=<?=$_GET[d]?>&mset=<?=$_GET[mset]?>&zone=<?=$_GET[zone]?>&rob=<?=$_GET[rob]?>&number=<?=$c_num;?>&type=<?=$type;?>&bingo=&asc=3' , '_blank');">
          <td align="center" bgcolor="#f0f0f0" class="sa num"><?=$c_num;?></td>
          <td align="center" class="sa sum" style="position:relative;"><div class="bgfade" id="tb<?=$type;?>tr<?=$c_num;?>bg"></div><span class="sptxt" id="tb<?=$type;?>tr<?=$c_num;?>sum"><?=number_format(round($g_sum));?></span></td>
        </tr>
        <? }}?>
        </tbody>
        <tfoot>
        <tr>
          <td align="center" bgcolor="#2700B5" class="cw bb"><strong>รวม</strong></td>
          <td align="center" bgcolor="#2700B5" id="tb<?=$type;?>sumAll" class="cr bb"><?=number_format(round(@array_sum($sum_total)));?></td>
        </tr>
        </tfoot>
      </table></td>
	  <? }?>
	  
    <td  align="center" valign="top"><?
  # $exbet=explode(',',$re_c[con_bet]);
   // for($x_type=6;$x_type<=count($lot_type["th"][$_GET[zone]]);$x_type++){

   foreach ($lotHun_typeArry as $x_type => $value) {
   if($x_type >= 6 and $x_type <= 23 && $x_type != 1 && $x_type != 3 && $x_type != 4 && $x_type != 5 && $x_type != 25 && $x_type != 26){
$bom_asc=$asum[sum][$x_type]; 
if(count($bom_asc)>0){
    ?>
      <table width="100%" border="0" cellspacing="1" cellpadding="0" id="tableLot<?=$x_type?>" class="table-bordered table-hover">
      <thead>
        <tr class="rightbox bg-blue-gradient">
          <td colspan="2" align="center" ><b class="cb">
            <?=$lotHun_typeArry[$x_type];?>
            </b></td>
        </tr>
        <tr class="xsboku bg-aqua-gradient" >
          <th width="30%" align="center" >เลข</th>
          <th width="70%" align="center" >ยอด <img src="../../assests/img/arrow-up.png" height="19" onClick="load_tb();" style="cursor:pointer;"></th>
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
        <tr class="cu" id="tb<?=$type;?>tr<?=$c_num;?>" data-sum="<?=$g_sum?>" onClick="window.open('main.php?p=lothun_money2&g_p=lothun&d=<?=$_GET[d]?>&mset=<?=$_GET[mset]?>&zone=<?=$_GET[zone]?>&rob=<?=$_GET[rob]?>&number=<?=$c_num;?>&type=<?=$type;?>&bingo=&asc=3' , '_blank');">
          <td align="center" bgcolor="#f0f0f0" class="sa num"><?=_dt($c_num);?></td>
          <td align="center" class="sa sum" style="position:relative;"><div class="bgfade" id="tb<?=$type;?>tr<?=$c_num;?>bg"></div><span class="sptxt" id="tb<?=$type;?>tr<?=$c_num;?>sum"><?=number_format(round($g_sum));?></span></td>
        </tr>
        
        <? }}?>
        </tbody>
        <tfoot>
        <tr>
          <td align="center" bgcolor="#2700B5" class="cw bb"><strong>รวม</strong></td>
          <td align="center" bgcolor="#2700B5" id="tb<?=$type;?>sumAll" class="cr bb"><?=number_format(round(@array_sum($sum_total)));?></td>
        </tr>
        </tfoot>
      </table>
      <br>
      <? }}}?></td>
  </tr>
</table>
