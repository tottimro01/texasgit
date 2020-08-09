<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('inc/conn.php');
require('inc/function.php');

// require("lang/member_lang.php");
require("lang/variable_lang.php");
require("lang/function_array.php");
?>

 <? 
$zone=$_SESSION["zone_hun"];
$rob=$_SESSION["rob_hun"];
$arr=array();
$sql = sql_query_lot("select * from bom_tb_".$zone."_sa where   s_sum<10  and lot_rob='$rob' order by lot_type asc, play_number asc");
while($rs=sql_fetch($sql)){ 
$arr[$rs['lot_type']][]=$rs['play_number'];
}
				
        	// for($type=1;$type<=count($lot_type[$_SESSION['lang']][$zone]);$type++){		
        foreach ($lot_type[$_SESSION['lang']][$zone] as $type => $value) {
				  if(@count($arr[$type])>0){
				
 ?>
    <tr style="font-size:11px;" class="cw">
    <!-- <td align="left" valign="top" class="bg_table"><strong><?=$lot_type[$_SESSION['lang']][$zone][$type];?></strong></td> -->
    <td align="left" valign="top" class="bg_table"><strong><?=$value;?></strong></td>
  </tr>
   <tr style="color:#000;">
              <td align="left" valign="top" bgcolor="#FEFFFF">
             <?
			    foreach($arr[$type] as $num){
				echo   "$num , ";
				}
				 ?>
                
                <br>
     
                
           </td>
    </tr>
    <? } }?>

