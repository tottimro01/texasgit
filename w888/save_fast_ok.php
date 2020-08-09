<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
// require("lang/member_lang.php");
  require("lang/variable_lang.php");
?>
<meta charset="UTF-8">
 <table align="left" border="0" cellpadding="2" cellspacing="1" width="100%" style="font-size:11px; margin:0px 0px; border:none; box-shadow:#000 1px 1px 1px; background:#1B377E;">
    <tbody>
      <tr class="new_title">
        <td width="10%"><div align="center"><?=$lang_member[425];?></div></td>
        <td width="44%"><div align="center"><?=$lang_member[613];?></div></td>
        <td width="20%"><div align="center"><?=$lang_member[300];?></div></td>
        <td width="26%"><div align="center"><?=$lang_member[301];?></div></td>
      </tr>
      <? 
$sum=array();
for($x=0;$x<=9;$x++){
$sum[]=$_SESSION['all']['sum'][$x];	
	?>
      <tr class="tb_line">
        <td align="center" bgcolor="#FFFFFF">&nbsp;<strong>
          <?=$_SESSION['all']['no'][$x];?>
          </strong></td>
        <td bgcolor="#FFFFFF">&nbsp;<strong>
          <?=str_replace('+','+',$_SESSION['all']['data'][$x]);?>
          </strong></td>
        <td align="center" bgcolor="#FFFFFF">&nbsp;<strong>
          <?=$_SESSION['all']['betshow'][$x];?>
          </strong></td>
        <td align="center" bgcolor="#FFFFFF">
        <? if($_SESSION['all']['type'][$x]==1){?>
        <img src="img/print_16.gif" onclick="MM_openBrWindow('<?=$hostserver;?>inc/print_p.php?id=<?=$_SESSION['all']['id'][$x];?>','','scrollbars=yes,resizable=yes,width=350,height=400');"  class="cu"/>
<? }?>
        &nbsp;<strong>
          <?=$_SESSION['all']['txt'][$x];?>
          </strong></td>
      </tr>
      <? }?>
      <tr >
        <td align="center" bgcolor="#6699FF">&nbsp;</td>
        <td align="right" bgcolor="#6699FF"><strong><?=$lang_member[611];?></strong></td>
        <td align="center" bgcolor="#6699FF"><strong  style="color:#FFF;">
          <?=number_format(@array_sum($sum));?>
          </strong></td>
        <td align="center" bgcolor="#6699FF">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="4" align="center" bgcolor="#FFFFFF";>
          <input type="button" value="<< <?=$lang_member[492];?>" class="btn_le" style="width:80px;height:25px;cursor:pointer; background:#F00;" onClick="_back();">
          <input type="button" value="<?=$lang_member[730];?>" class="btn_le" style="width:80px;height:25px;cursor:pointer; background:#00F;" onClick="_all_print();"><br>
          </td>
      </tr>
    </tbody>
  </table>

