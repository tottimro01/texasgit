<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
require("../../lang/variable_lang.php");
// -
// -

if(isset($_POST["cal"])){
$arr = array();
$hack = array("1" => $_POST["txt1"], "2" => $_POST["txt2"], "3" => $_POST["txt3"], "4" => $_POST["txt4"], "5" => $_POST["txt5"], "6" => $_POST["txt6"], "7" => $_POST["txt7"], "8" => $_POST["txt8"], "9" => $_POST["txt9"]);

//if($_POST["txt1"]==$_POST["txt2"] and $_POST["txt1"]==$_POST["txt3"] and $_POST["txt1"]==$_POST["txt4"] and $_POST["txt1"]==$_POST["txt5"] and $_POST["txt1"]==$_POST["txt6"] and $_POST["txt1"]==$_POST["txt7"] and $_POST["txt1"]==$_POST["txt8"]){
	$n = 5;
	$n2 = 5;
	exit();
if($n==$n2){
	
	$ex_sc1 = array("1"=>1,"2"=>2,"3"=>3,"4"=>4,"5"=>5,"6"=>6);
	$ex_sc2 = array("2"=>2,"4"=>4,"6"=>6,"5"=>5,"3"=>3,"1"=>1);
	$ex_sc3 = array("6"=>6,"5"=>5,"4"=>4,"3"=>3,"2"=>2,"1"=>1);
	
}else{
	arsort($hack);
	$i=0;
	foreach ($hack as $key => $val) {
		if($i<3){
			if($val>0){
				$arr[] = $key;
			}
		}
		$i++;
	}
	print_r($arr);
	echo "<br><br>";

	if($arr[0]==8 and $arr[2]!=7 and $hack[$arr[0]]>0){
		//1สูง
		//2อะไรก็ได้
		//3ตัวเลข
		//no_h($arr[2]);
		echo $lang_member[240] . " $arr[2]<br>";
		$ex_sc1 = array("3"=>3,"2"=>2,"1"=>1);
		unset($ex_sc1[$arr[2]]);
		$ex_sc2 = array("4"=>4,"1"=>1,"2"=>2);
		unset($ex_sc2[$arr[2]]);
		$ex_sc3 = array("1"=>1,"3"=>3,"2"=>2);
		unset($ex_sc3[$arr[2]]);
	}else if($arr[0]!=7 and $arr[2]==8 and $hack[$arr[2]]>0){
		//1ตัวเลข
		//2อะไรก็ได้
		//3สูง
		//no_h($arr[2]);
		echo $lang_member[240] . " $arr[0]<br>";
		$ex_sc1 = array("3"=>3,"2"=>2,"1"=>1);
		unset($ex_sc1[$arr[0]]);
		$ex_sc2 = array("4"=>4,"1"=>1,"2"=>2);
		unset($ex_sc2[$arr[0]]);
		$ex_sc3 = array("1"=>1,"3"=>3,"2"=>2);
		unset($ex_sc3[$arr[0]]);
	}else if($arr[0]==7 and $arr[2]!=8 and $hack[$arr[0]]>0){
		//1ต่ำ
		//2อะไรก็ได้
		//3ตัวเลข
		//no_l($arr[2]);
		echo $lang_member[245] . " $arr[2]<br>";
		$ex_sc1 = array("4"=>4,"5"=>5,"6"=>6);
		unset($ex_sc1[$arr[2]]);
		$ex_sc2 = array("3"=>3,"4"=>4,"5"=>5);
		unset($ex_sc2[$arr[2]]);
		$ex_sc3 = array("6"=>6,"5"=>5,"4"=>4);
		unset($ex_sc3[$arr[2]]);
	}else if($arr[0]!=8 and $arr[2]==7 and $hack[$arr[2]]>0){
		//1ตัวเลข
		//2อะไรก็ได้
		//3ต่ำ
		//no_l($arr[2]);
		echo $lang_member[245] . " $arr[0]<br>";
		$ex_sc1 = array("4"=>4,"5"=>5,"6"=>6);
		unset($ex_sc1[$arr[0]]);
		$ex_sc2 = array("3"=>3,"4"=>4,"5"=>5);
		unset($ex_sc2[$arr[0]]);
		$ex_sc3 = array("6"=>6,"5"=>5,"4"=>4);
		unset($ex_sc3[$arr[0]]);
	}else if($arr[0]==7 and $arr[2]==8){
		//1ต่ำ
		//2อะไรก็ได้
		//3สูง
		//no_l($arr[1]);
		echo $lang_member[247] . " $arr[1]<br>";
		$ex_sc1 = array("4"=>4,"5"=>5,"6"=>6);
		unset($ex_sc1[$arr[1]]);
		$ex_sc2 = array("3"=>3,"4"=>4,"2"=>2);
		unset($ex_sc2[$arr[1]]);
		$ex_sc3 = array("6"=>6,"5"=>5,"4"=>4);
		unset($ex_sc3[$arr[1]]);
	}else if($arr[0]==8 and $arr[2]==7){
		//1สูง
		//2อะไรก็ได้
		//3ต่ำ
		//no_h($arr[1]);
		echo $lang_member[249] . " $arr[1]<br>";
		$ex_sc1 = array("3"=>3,"2"=>2,"1"=>1);
		unset($ex_sc1[$arr[1]]);
		$ex_sc2 = array("4"=>4,"1"=>1,"2"=>2);
		unset($ex_sc2[$arr[1]]);
		$ex_sc3 = array("1"=>1,"3"=>3,"2"=>2);
		unset($ex_sc3[$arr[1]]);
	}else if(($arr[0]!=8 and $arr[2]!=7) or ($arr[0]!=7 and $arr[2]!=8)){
		//1อะไรก็ได้ยกเว้นต่ำ/สูง
		//2อะไรก็ได้
		//3อะไรก็ได้ยกเว้นต่ำ/สูง
		//no_num($arr[0],$arr[2]);
		echo $lang_member[235] . " $arr[0] ".$lang_member[237]." $arr[2]<br>";
		$ex_sc1 = array("1"=>1,"2"=>2,"3"=>3,"4"=>4,"5"=>5,"6"=>6);
		unset($ex_sc1[$arr[0]]);
		unset($ex_sc1[$arr[2]]);
		$ex_sc2 = array("2"=>2,"4"=>4,"6"=>6,"5"=>5,"3"=>3,"1"=>1);
		unset($ex_sc2[$arr[0]]);
		unset($ex_sc2[$arr[2]]);
		$ex_sc3 = array("6"=>6,"5"=>5,"4"=>4,"3"=>3,"2"=>2,"1"=>1);
		unset($ex_sc3[$arr[0]]);
		unset($ex_sc3[$arr[2]]);
	}else{
		$ex_sc1 = array("1"=>1,"2"=>2,"3"=>3,"4"=>4,"5"=>5,"6"=>6);
		$ex_sc2 = array("2"=>2,"4"=>4,"6"=>6,"5"=>5,"3"=>3,"1"=>1);
		$ex_sc3 = array("6"=>6,"5"=>5,"4"=>4,"3"=>3,"2"=>2,"1"=>1);
	}
}
echo "<br>";
print_r($ex_sc1);
echo "<br>";
print_r($ex_sc2);
echo "<br>";
print_r($ex_sc3);
exit();
}
?>
<script src="../js/jquery.min.js"></script>
<script>
function setCal(){
	<? for($i=1;$i<=9;$i++){ ?>
	var txt<?=$i?> = $("#txt_<?=$i?>").val();
	<? } ?>
	$.ajax({
				type: "POST",
				url: "_testprocess.php",
				data: { "txt1": txt1 ,"txt2":txt2 ,"txt3":txt3 ,"txt4":txt4 ,"txt5":txt5 ,"txt6":txt6 ,"txt7":txt7 ,"txt8":txt8 ,"txt9":txt9 ,"cal":"yes"},
				timeout: 3000,
				cache: false,	
				beforeSend: function(){
				},
				success: function(data){			
					 $("#token").html(data);
				}
			});	
}
</script>
<table width="100%" border="1" cellspacing="1" cellpadding="5">
  <tbody>
    <tr>
      <td width="11%" align="center">1</td>
      <td width="11%" align="center">2</td>
      <td width="11%" align="center">3</td>
      <td width="11%" align="center">4</td>
      <td width="11%" align="center">5</td>
      <td width="11%" align="center">6</td>
      <td width="11%" align="center"><?=$lang_member[312];?></td>
      <td width="11%" align="center"><?=$lang_member[314];?></td>
      <td width="11%" align="center"><?=$lang_member[225];?></td>
    </tr>
    <tr>
    <? for($i=1;$i<=9;$i++){ ?>
      <td align="center"><input name="txt_<?=$i?>" type="text" id="txt_<?=$i?>" value="0" size="5" style="text-align:center;"></td>
      <? } ?>
    </tr>
  </tbody>
</table>
<input type="button" value="<?=$lang_member[315];?>" onClick="setCal();" name="cal" id="cal">
<br>
<div id="token"></div>