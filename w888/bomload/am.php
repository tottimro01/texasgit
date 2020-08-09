<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<meta charset="utf-8">
<?php
require('../inc/conn.php');
require('../inc/function.php');


?>


<script type='text/javascript' >
function _w(url){
	window.location=url;
	}
</script>
<title>LOTTO</title>


 งวดวันที่ :
              <select   onchange="_w('?d='+this.value);">
               <option value=''  <? if($_GET[d]==""){echo'selected';}?>>เลือกวัน</option>

  <?
$re=sql_query("select * from bom_tb_lotto_ok where 	lot_zone=1 and lot_rob=1  order by  ok_id desc limit 48 ");
while($rs=sql_fetch($re)){
  ?>    
  <option value='<?=$rs["ok_date"]?>'  <? if($_GET[d]==$rs["ok_date"]){echo'selected';}?>><?=$rs["ok_date"]?></option>
                <? } ?>
</select>
<br>---------------<br>
<?  if($_GET[d]!=""){?>
<h4>แบบ ตัว</h4>
<ol>
  <?
 $cmid=array(); 
   $cmid[]=44482; 
  $cmid[]=100; 
  #ตะวันแดง T
  $cmid[]=536; 
  #แซ็ก
  $cmid[]=505; 
  $cmid[]=506; 
  $cmid[]=507; 
  #Vegus
   $cmid[]=43; 
  $cmid[]=142; 
  $cmid[]=149; 
  #แอม
#  $cmid[]=86; 
  $cmid[]=473; 
  $cmid[]=474; 
  $cmid[]=475; 
  $cmid[]=495; 
  $cmid[]=497; 
  $cmid[]=2966; 
  $cmid[]=2967; 
  
  #หญิง
  $cmid[]=2584; 

  
  $cmid[]=2676; 
  $cmid[]=2677; 
   $cmid[]=2879; 
   $cmid[]=2965; 
 $cmid[]=2586; 

############
  $cmid[]=3170; 
 #  $cmid[]=3171; 
   $cmid[]=3172; 
 $cmid[]=3173; 
#M
  $cmid[]=3331; 
  $cmid[]=3332; 
    $cmid[]=43362; 
	$cmid[]=43828; 
	
	
	#M
  $cmid[]=43859; 
  $cmid[]=43860; 
    $cmid[]=43861; 
	$cmid[]=43862; 
	$cmid[]=43863; 
	
$cmid[]=44418; 
 $cmid[]=44419; 
  $cmid[]=44424; 
  
  
  $xmid='';
  foreach($cmid as $vmid){
	  $xmid.=$vmid.',';
	  }
$damid=rtrim($xmid,',');
#$re=sql_query("select * from bom_tb_member where m_id in ($damid) order by  m_user asc");
$re=sql_query("select * from bom_tb_member where r_agent_id like '%*400*%' order by  m_user asc");
while($rs=sql_fetch($re)){
  ?>    
<li><a href="print_am.php?mid=<?=$rs[m_id];?>&user=<?=$rs[m_user];?>&name=<?=$rs[m_name];?>&d=<?=$_GET[d];?>" target="_blank" ><?=$rs[m_user];?> :  [ <?=$rs[m_name];?> ]</a></li>
     <? } ?>
</ol>
<br>---------------<br>
<h4>แบบ บาท</h4>

  <?
 $cmid=array(); 
 
  #แซ็ก
   $cmid[]=44416; 
 $cmid[]=344; 
  #Vegus
 $cmid[]=45; 
 $cmid[]=57; 
 $cmid[]=63; 
  #แอม
  $cmid[]=86; 
  $cmid[]=476; 
   $cmid[]=477; 
   $cmid[]=337; 
   
   $cmid[]=2968; 
   $cmid[]=2969; 
   $cmid[]=3166; 
   


    $cmid[]=2585; 
	  $cmid[]=2971; 
	  $cmid[]=3171; 
	     $cmid[]=3169; 

 #M
  $cmid[]=3330; 
  
  
  $xmid='';
  foreach($cmid as $vmid){
	  $xmid.=$vmid.',';
	  }
$damid=rtrim($xmid,',');
#$re=sql_query("select * from bom_tb_member where m_id in ($damid) order by  m_user asc");
$re=sql_query("select * from bom_tb_member where r_agent_id like '%*401*%' order by  m_user asc");
while($rs=sql_fetch($re)){
	
	
$timew=" and (b_date = '$_GET[d]') and b_accept=1 "; 
$sql="select   

   sum(ROUND( 	-b_total  ,10)) as m1 ,
  sum(
(ROUND( 	 b_total-b_pay  ,10))
   ) as t2 ,
     sum(
(ROUND( 	 -(b_total-(b_total-b_pay))  ,10))
   ) as t3
   
 from bom_tb_lotto_bill_play where    m_id='$rs[m_id]'   $timew ";
$rslot=sql_array($sql);

if($rslot[m1]<0){

  ?>    
<textarea name="tmid_<?=$rs[m_id];?>" cols="50" rows="8" id="tmid_<?=$rs[m_id];?>" onclick="copyToClipboard(document.getElementById('tmid_<?=$rs[m_id];?>').innerHTML)">ยอดหวย วันที่ <?=$_GET[d];?>  <?=$rs[m_user];?> :  [ <?=$rs[m_name];?> ]
ยอดซื้อ=<?=number_format($rslot[m1],2);?>

ยอดถูก =จ่ายแล้ว
ยอดส่วนลด=<?=number_format($rslot[t2],2);?>

ยอดเคลียร์=<?=number_format($rslot[t3],2);?>

-------------------
ส่งเงิน =<?=number_format($rslot[t3],2);?></textarea>
<br><br>
<? } }?>

 <? }# if($_GET[d]!=""){ ?>
 
 <script>
  function copyToClipboard(text) {
   // window.prompt("Copy to clipboard: Ctrl+C, Enter", text);
  }
</script>

