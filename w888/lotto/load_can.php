<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php   
header("Content-type:text/html; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);       
require('../inc/conn.php');
require('../inc/function.php');

// require("../lang/member_lang.php");
require("../lang/variable_lang.php");
require("../lang/function_array.php");


if(($_SESSION['m_id'] == '') || (!isset($_SESSION['m_id']))){  exit();}

 
$bill_id = $_POST['bid']; 
$sql="select * from  bom_tb_lotto_bill_play_live where m_id='$_SESSION[mid]'  and b_accept=1    and bill_id='$bill_id'    order by play_id asc";	
?>
<script>
$("#btn").click(function(event){
    event.preventDefault();
    var searchIDs = $("input:checkbox:checked").map(function(){
		var pid=this.value;
		$(this).load("lotto/_inc_cancel.php",{"pid":pid})
		// console.log(pid);
        return this.value;
    }).toArray();
    
//   console.log(searchIDs);
     load_can(<?=$bill_id;?>);              
  })
  </script>
<div style="clear:both;"></div><b>ยกเลิกบิล <?=$bill_id;?></b>
<table width="100%" border="0" cellpadding="3" cellspacing="1" class="txt_back11n">
  <tbody>
    <tr align="center" >
      <td width="41%"  class="sa" ><?=$lang_member[160];?></td>
      <td width="27%" class="sa" ><?=$lang_member[381];?></td>
      <td width="32%" class="sa" ><?=$lang_member[300];?></td>
    </tr>
    <? 

$re=sql_query($sql);
while($rs=sql_fetch($re)){

	?>
    <tr align="center" >
      <td class="sb"><input type="checkbox" value="<?=$rs["play_id"];?>" style="float:left;" class="pidx" /><?=$lot_type[$_SESSION['lang']][1][$rs["lot_type"]]?></td>
      <td class="sb"><?=_dt($rs["play_number"])?></td>
      <td class="sb" align="right"><?=number_format($rs["b_total"])?></td>
    </tr>
   <? } ?>


  </tbody>
</table>
<input name="btn" type="button" id="btn" value="ยกเลิก" />
