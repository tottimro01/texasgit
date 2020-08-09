<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
include( "conn.php");
include( "function.php");
require("../lang/member_lang.php");

if($_SESSION['lang']!='en'){
$fo2= _bdate()."_".$_SESSION['lang'].".json";
$data_lang=file_get_contents2("../json/sport/lang/$_POST[sport]/$fo2");
$sport_lang = json_decode2($data_lang, true);
}
$al = array();
$os = array();
$os = $_SESSION["ppp"][$_POST[sport]];
/*print_r($_SESSION["league_live"]);
echo "<br><br>";
print_r($_SESSION["league_today2"]);

exit();*/
$al = $_SESSION["league_live"];
for($a=0;$a<count($_SESSION["league_today2"]);$a++){
	if(!(in_array($_SESSION["league_today2"][$a] , $al))){
		$al[] = $_SESSION["league_today2"][$a];
	}
}


//exit();
$nr = ceil(count($al)/2);

	  $lc = 0;
	   for($l=0;$l<$nr;$l++){ ?>

<tr class="tb_ball">
  <? for($ll=0;$ll<2;$ll++){
  	if($al[$lc]){
		$leage=_lg($al[$lc], $sport_lang[Zone][md5($al[$lc])]);
  ?>
  <td class="list_legue" width="50%"><input type="checkbox" name="ck[<?=$lc?>]" id="ck[<?=$lc?>]" value="<?=$al[$lc]?>" <? if(@in_array($al[$lc] , $os)){ ?>checked="checked"<? } ?>>
    <label for="ck[<?=$lc?>]"><?=$leage?></label></td>
  <? $lc++; }   } ?>
</tr>
<? } ?>
<tr>
  <td colspan="3" height="5"><hr>
    <input type="hidden" id="cntall" name="cntall" value="<?=$lc?>"></td>
</tr>
<tr>
  <td colspan="3" align="center"><input type="submit" value="<?=$lang_member[786];?>" class="btn_le" onclick="save_leage()" style="width:100px;height:25px;cursor:pointer;">
    <input type="button" value="<?=$lang_member[612];?>" class="btn_le" onClick="show_league();" style="width:100px;height:25px;cursor:pointer; background:#F00;">
    <br>
    <br></td>
</tr>
