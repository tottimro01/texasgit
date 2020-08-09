<meta charset="utf-8">
<?
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

<ol>
  <?
$re=sql_query("select * from bom_tb_member where m_agent_id like '%*157*%' order by  m_user asc");
while($rs=sql_fetch($re)){
  ?>    
<li><?=$rs[m_user];?> :  [ <?=$rs[m_name];?> ]
<a href="print_am.php?mid=<?=$rs[m_id];?>&user=<?=$rs[m_user];?>&name=<?=$rs[m_name];?>&d=<?=$_GET[d];?>" target="_blank" >แบบตัว</a>&nbsp;&nbsp;||&nbsp;&nbsp;
<a href="print_amB.php?mid=<?=$rs[m_id];?>&user=<?=$rs[m_user];?>&name=<?=$rs[m_name];?>&d=<?=$_GET[d];?>" target="_blank" >แบบบาท</a>
</li>
     <? } ?>
</ol>


 <? }# if($_GET[d]!=""){ ?>
 
 <script>
  function copyToClipboard(text) {
   // window.prompt("Copy to clipboard: Ctrl+C, Enter", text);
  }
</script>

