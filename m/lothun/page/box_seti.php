<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php   
header("Content-type:text/html; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);       
require('../inc/conn.php');
require('../inc/function.php');

require("../lang/".$_SESSION['lang'].".php");

if($_SESSION['mid']==""){  exit();}

$arr_seti = explode("," , $_SESSION['lotset']);
$iset = 1;
?>

   <? if($lothun_set==1){?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1">
<? for($i=1;$i<=1;$i++){ ?>
                                    <tr>
<? for($y=1;$y<=1;$y++){ ?>
                              <td height="25" align="center">
<input type="checkbox" name="chk_seti<?=$iset?>" id="chk_seti<?=$iset?>" onclick="set_seti(<?=$iset?>,'one')" <? if(in_array("x".$iset, $arr_seti)){ ?> checked="checked"<? } ?>></input> <label for="chk_seti<?=$iset?>"><?=$iset?>i</label>
                              </td>
<? $iset++; } ?>
                              </tr>
<? } ?>
                              </table>
      <? } ?>                 
      
      
         <? if($lothun_set==10){?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1">
<? for($i=1;$i<=2;$i++){ ?>
                                    <tr>
<? for($y=1;$y<=5;$y++){ ?>
                              <td height="25" align="center">
<input type="checkbox" name="chk_seti<?=$iset?>" id="chk_seti<?=$iset?>" onclick="set_seti(<?=$iset?>,'one')" <? if(in_array("x".$iset, $arr_seti)){ ?> checked="checked"<? } ?>></input> <label for="chk_seti<?=$iset?>"><?=$iset?>i</label>
                              </td>
<? $iset++; } ?>
                              </tr>
<? } ?>
                              </table>
      <? } ?>                        
                            
                            
                            
                            
                               <? if($lothun_set==20){?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1">
<? for($i=1;$i<=4;$i++){ ?>
                                    <tr>
<? for($y=1;$y<=5;$y++){ ?>
                              <td height="25" align="center">
<input type="checkbox" name="chk_seti<?=$iset?>" id="chk_seti<?=$iset?>" onclick="set_seti(<?=$iset?>,'one')" <? if(in_array("x".$iset, $arr_seti)){ ?> checked="checked"<? } ?>></input> <label for="chk_seti<?=$iset?>"><?=$iset?>i</label>
                              </td>
<? $iset++; } ?>
                              </tr>
<? } ?>
                              </table>
      <? } ?>                        
                                   
                              