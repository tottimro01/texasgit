<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?

unset($_SESSION['fish_ok']); 

if($_SESSION[mid]==""){exit();}
require('../../../../../inc/conn.php');
require('../../../../../inc/function.php');
require('../function.php');

if(!strstr($_SERVER['HTTP_REFERER'],   $check_url   )){ exit();}

$url_file="../json/bet_close.txt";
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
$bet_close=$date2_bet[0][con_bacara_close];

if($bet_close==0){
	exit();
	}

  header ("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
  header ("Pragma: no-cache"); // HTTP/1.0

if($_POST[ty]==1){
	 $_SESSION["hilo_ok"] =  $_POST[ok];
}else if($_POST[ty]==2){
	$exx=explode("," , $_SESSION["hilo_ok"]);
	if($_POST[ok]=="L"){
		if(count($exx)<2 and $exx[0]!="11" and $exx[0]!="L" and $exx[0]!="H" and $_SESSION["hilo_ok"]!=""){
			$_SESSION["hilo_ok"] = $exx[0];	
			$_SESSION["hilo_ok"] .= ",".$_POST[ok];	
		}else{
			$_SESSION["hilo_ok"] = $_POST[ok];	
		}
	}else if($_POST[ok]=="H"){
		if(count($exx)<2 and $exx[0]!="11" and $exx[0]!="H" and $exx[0]!="L" and $_SESSION["hilo_ok"]!=""){
			$_SESSION["hilo_ok"] = $exx[0];	
			$_SESSION["hilo_ok"] .= ",".$_POST[ok];	
		}else{
			$_SESSION["hilo_ok"] = $_POST[ok];	
		}
	}
}else{
	$exx=explode("," , $_SESSION["hilo_ok"]);
	if(($exx[0]=="L" || $exx[0]=="H") and count($exx)<2 and $_SESSION["hilo_ok"]!=""){
			$_SESSION["hilo_ok"] = $exx[0];	
			$_SESSION["hilo_ok"] .= ",".$_POST[ok];
	}else if(($exx[0]=="L" || $exx[0]=="H" || $exx[1]=="L" || $exx[1]=="H") and count($exx)>=2){
		$_SESSION["hilo_ok"] = $_POST[ok];	
	}else{
		//echo count($exx);
		if (count($exx)>0 and ($exx[0]=="11" || $exx[0]=="L" || $exx[0]=="H" || $exx[1]=="L" || $exx[1]=="H") and $_SESSION["hilo_ok"]!="") {
			$_SESSION["hilo_ok"] = $_POST[ok];	
		}else if(count($exx)==1 and !in_array($_POST[ok], $exx) and $_SESSION["hilo_ok"]!=""){
			$_SESSION["hilo_ok"] = $exx[0];	
			$_SESSION["hilo_ok"] .= ",".$_POST[ok];
		}else if(count($exx)==2 and !in_array($_POST[ok], $exx) and $_SESSION["hilo_ok"]!=""){
			$_SESSION["hilo_ok"] = $exx[0];	
			$_SESSION["hilo_ok"] .= ",".$exx[1];	
			$_SESSION["hilo_ok"] .= ",".$_POST[ok];
		}else{
			$_SESSION["hilo_ok"] = $_POST[ok];	
		}
	}
}
 $ex=explode("," , $_SESSION["hilo_ok"]);
?>


<style type="text/css">
  
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
.bg_table {
    background: #8b691c;
     border-collapse:separate; border-spacing:1px;
}
.txt_back12n{
    font-size: 10px;
  }
  .bg_td {
    background: #f7e1af;
}
</style>
  <?
$url_file="../json/bet_id.txt";
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
$bet_id=$date2_bet[0][id];
?>
 <?
$exx=explode("," , $_SESSION["hilo_ok"]);
$bcounts = 0;
if(count($exx)==1){
  if($exx[0]=="11"){
    $paywin = $arr_hilo_pay[5];
  }else{
    $paywin=$arr_hilo_pay[1];
  }
}else if(count($exx)==2){
  if($exx[0]=="H" || $exx[0]=="L" || $exx[1]=="H" || $exx[1]=="L"){
    $paywin=$arr_hilo_pay[2];
  }else{
    $paywin=$arr_hilo_pay[3];
  }
}else if(count($exx)==3){ 
  $paywin=$arr_hilo_pay[4];
}
          ?>
<form method="post" id="finput" name="finput" action="games_save_bet.php" target="savebet" style="display:inline">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" class="bg_table">
  <tr class="tb_title_lotto">
    <td colspan="3" height="25" align="center" class="txt_white12btitle" style="padding-left:5px;"><span id="s_type"><?=$game_zone[4];?> / Bet ID : <?=$bet_id?> @<b id="price" class="txt_backprice"><?=$paywin?></b></span></td>                
  </tr>  
  <tr>
    <td height="50" align="center" class="bg_td">
    <? foreach ($ex as &$value) { ?><img src="img/hilo/hilo<?=$value?>.png" height="30"><? } ?>
    </td>
    <td colspan="2" height="50" class="bg_td" align="center"><input type="tel" id="txt_bet" name="txt_bet" size="10" maxlength="7" class="textfield_center2" onkeydown="return numberonly(event,this)" onkeyup="_sumx();" placeholder="ยอดเล่น"><input type="hidden" name="cksave" id="cksave" value="<?=date("Y-m-d H:i:s");?>">
        <input type="button" name="sm" id="sm" class="txt_back11n" value="ตกลง" onclick="_betok2();">
    <input type="button" name="rt" id="rt" class="txt_back11n" value="ยกเลิก" onclick="gameslistmini(1);">  </td>
  </tr>
  <tr>
    <td height="21" bgcolor="#FFFFFF" class="txt_back12n" align="center" width="33%">รับสูงสุด : <span id="bmax"><?=number_format($_SESSION[mxmax])?></span> บาท</td>
    <td bgcolor="#FFFFFF" class="txt_back12n" align="center"  width="33%">เล่นต่ำสุด : <span id="mmin"><?=number_format($_SESSION[mmin])?></span> บาท</td>
    <td bgcolor="#FFFFFF" class="txt_back12n" align="center"  width="33%">เล่นสูงสุด : <span id="bmax"><span id="mmax"><?=number_format($_SESSION[mmax])?></span> บาท</td>
  </tr>
</table>
<input type="hidden" name="vid" id="vid" value="<?=$bet_id?>">
<input type="hidden" name="vtype" id="vtype" value="hkg00">
<input type="hidden" name="vselect1" id="vselect1" value="k">
</form>
<input name="typebet"  id="typebet" type="hidden" value="<?=$_SESSION["hilo_ok"];?>" />
<?
$token = md5(uniqid(rand(),1));
$_SESSION[bettoken]=$token;
$fo="../../../../../json/games/session_".$_SESSION[mid].".php";
@unlink($fo);
$fp = @fopen($fo, 'w');
@fwrite($fp, '<? $bettoken="'.$token.'"; ?>');
@fclose($fp);
?>
