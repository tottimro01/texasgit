<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('inc/conn.php');
require('inc/function.php');

// require("lang/member_lang.php");
require("lang/variable_lang.php");
require("lang/function_array.php");
?>

<? 
$arr=array();
$sql = sql_query_lot("select * from bom_tb_1_sa where   s_sum<10  order by lot_type asc, play_number asc");
while($rs=sql_fetch($sql)){ 
$arr[$rs['lot_type']][]=$rs['play_number'];
}
				
        	for($type=1;$type<=count($lot_type[$_SESSION['lang']][1]);$type++){		
				  if(@count($arr[$type])>0){
				  ?>
    <tr style="font-size:11px;" class="cw">
    <td align="left" valign="top" class="bg_table"><strong><?=$lot_type[$_SESSION['lang']][1][$type];?></strong></td>
  </tr>
   <tr style="color:#000;">
              <td align="left" valign="top" bgcolor="#FEFFFF">
              <?
		   foreach($arr[$type] as $num){
				echo   "$num , ";
				}
			  ?>
                
                <br>
                
               <!-- <button class="btn_le" onclick="parent.rightx.location.href='main_lotto.php?tlot=lottofalse&vvw=0'" style="width:145px;height:20px;cursor:pointer; margin:auto; display:block; margin-top:10px; margin-bottom:2px; line-height:10px; background:#f7c63c; color:#000000; font-weight: bold;"><?=$lang_member[501]?> <?=$lang_member[92]?> <img src="img/icon_hot.gif" style="vertical-align: bottom;"></button> -->
                
      
                
           </td>
    </tr>
    <? }} ?>