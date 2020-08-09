<meta charset="utf-8">
<?
require('../inc/conn.php');
require('../inc/function.php');


?>

<?  if($_GET[d]!=""){?>


  <?
$re=sql_query("select * from bom_tb_member where m_id like '$_GET[mid]' order by  m_user asc");
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

