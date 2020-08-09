<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
  header ("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
  header ("Pragma: no-cache"); // HTTP/1.0
  
unset($_SESSION['hilo_ok']); 
unset($_SESSION['fish_ok']); 

if($_SESSION['m_id']==""){exit();}
require('../../inc/conn.php');
require('../../inc/function.php');
require('../function.php');

require("../../lang/variable_lang.php");
// require("../../lang/member_lang.php");
require("../../lang/function_array.php");

if(!strstr($_SERVER['HTTP_REFERER'],   $check_url   )){ exit();}

################OPEN BET GAME
$sql="select * from bom_tb_config where con_id=1";
$rec=sql_array($sql);

if($rec['con_open_games']==0){
  exit();
  }


################Config Member
$hmax=@explode(',',$_SESSION['m1']['m_games_max']); 
$hmin=@explode(',',$_SESSION['m1']['m_games_min']); 

$max=$hmax[1]; 
$min=$hmin[1]; 
$over=$_SESSION['m1']['m_games_over']; 


$hdis=@explode(',',$_SESSION['m1']['m_games_dis']); 
$type_games=1;
#$paywinh=$arr_dragon_pay[$_POST["ok"]]+($hdis[$type_games]/100);
$paywinh=$arr_dragon_pay[$_POST["ok"]];
?>
<!-- <link rel="stylesheet" type="text/css" href="css/style.css?v=2019"> -->
<!-- <style type="text/css">
.tb_title_lotto {
  background-image: linear-gradient(top, #d9a52e,  #8b691c);
  background-image: -moz-linear-gradient(top, #d9a52e, #8b691c);
  background-image: -webkit-linear-gradient(top, #d9a52e, #8b691c);
  background-image: -o-linear-gradient(top, #d9a52e, #8b691c);
  background-image: -ms-linear-gradient(top, #d9a52e, #8b691c);
  font-size: 12px;
  color: #fff;
  font-weight: bold;
  text-shadow: 1px 1px 1px #000;
}
.rl-border{
  border-left: 1px;
  border-right: 1px;
  border-bottom: 0;
  border-top: 0;
  border-style: solid;
  border-color: #bbbbbb;
}
.btn_le.submit_game,
.btn_le.cancel_game{
  padding: 2px 8px;
}
.btn_le.cancel_game{
  background-color: #F00;
}
</style>
 -->

<!-- <table border="0" cellpadding="0" cellspacing="0" class="boxright">
<tbody><tr><td> -->
<form method="post" id="finput" name="finput" action="games_save_bet.php" target="savebet">
<table border="0" align="center" cellpadding="0" cellspacing="0" class="">
  <tbody><tr class="tb_title_lotto">
    <td height="25" align="center" class="txt_white12btitle" style="padding-left:5px;"><span id="s_type"><?=$lang_member[1215]." ".$lang_member[1216];?></span></td>                
  </tr>     
  <?
$bet_id=$rec['con_id_games'];
?>
  <tr>
    <td height="20" align="center" bgcolor="#FFCC99" class="txt_back11b rl-border">Bet ID : <b><?=$bet_id?></b></td>              
  </tr>
  <tr>
    <td bgcolor="#FFEDD9" class="rl-border">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class="">
        <tbody><tr>
          <td width="176" height="70" align="center" bgcolor="#FFFFFF" class="txt_back11n" style="font-size: 16px; font-weight: bold;">
           <img src="img/dragon/60/<?=$_POST["ok"]?>.png" height="60">
          </td>
          </tr>
        <tr>
          <td height="25" align="center" bgcolor="#FFFFFF" class="txt_backprice" id="boxprice"><span id="odds"></span>@<b id="price" class="txt_backprice"><?=$paywinh?></b></td>
          </tr>               
          </tbody></table>
    </td>             
  </tr>
  <tr>
    <td height="25" align="center" class="bg_td rl-border">
      <?=$lang_member[319];?> 
          <input type="text" id="txt_bet" name="txt_bet" size="10" maxlength="7" class="textfield_center2" onkeydown="return numberonly(event,this)" onkeyup="_sumx();">
    </td>               
  </tr>               
<!--   <tr>
    <td align="center" height="1"></td>
    </tr> -->
  <tr>
    <td height="30" align="center" class="bg_td rl-border">
         <input type="hidden" name="cksave" id="cksave" value="<?=date("Y-m-d H:i:s");?>">
        <input type="button" name="sm" id="sm" class="btn_le btn_small" value="<?=$lang_member[321];?>" onclick="_betok5();">
    <input type="button" name="rt" id="rt" class="btn_le btn_small danger" value="<?=$lang_member[65];?>" onclick="gameslistmini(0);">           
    </td>               
  </tr> 
    <tr>
      <td bgcolor="#FFEDD9">
          <table border="0" align="center" cellpadding="0" cellspacing="0" class="bg_table">
                <tbody><tr>
                    <td width="95" height="18" bgcolor="#FFFFFF" class="txt_back11n">&nbsp;<?=$lang_member[324];?> </td>
                    <td width="110" align="right" bgcolor="#FFFFFF" class="txt_back11n"><span style="color:#203A79;"><?=$_SESSION['m1']['m_currency']?></span> <span id="bmax"><?=number_format($over)?></span>&nbsp;</td>               
                </tr>
                <tr>
                    <td height="18" bgcolor="#FFFFFF" class="txt_back11n">&nbsp;<?=$lang_member[327];?> </td>
                    <td align="right" bgcolor="#FFFFFF" class="txt_back11n"><span style="color:#203A79;"><?=$_SESSION['m1']['m_currency']?></span> <span id="mmin"><?=number_format($min)?></span>&nbsp;</td>                
                </tr> 
                <tr>
                    <td height="18" bgcolor="#FFFFFF" class="txt_back11n">&nbsp;<?=$lang_member[331];?> </td>
                    <td align="right" bgcolor="#FFFFFF" class="txt_back11n"><span style="color:#203A79;"><?=$_SESSION['m1']['m_currency']?></span> <span id="mmax"><?=number_format($max)?></span>&nbsp;</td>               
                </tr>         
            </tbody></table>
      </td>
    </tr>                                               
</tbody></table>
<input type="hidden" name="vid" id="vid" value="<?=$bet_id?>">
<input type="hidden" name="vtype" id="vtype" value="hkg00">
<input type="hidden" name="vselect1" id="vselect1" value="k">
</form>
<!-- </td>
</tr>
</tbody></table> -->
<input name="typebet"  id="typebet" type="hidden" value="<?=$_POST[ok];?>" />
<?
$token = md5(uniqid(rand(),1));
$_SESSION['bettoken']=$token;
$fo="../../json/games/session_".$_SESSION['m_id'].".php";
@unlink($fo);
$fp = @fopen($fo, 'w');
@fwrite($fp, '<? $bettoken="'.$token.'"; ?>');
@fclose($fp);
?>

