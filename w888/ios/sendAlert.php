<?
	include "../inc/conn.php";
	include "../inc/function.php";
	include "function_alert.php";

$lang_post           = trim($_GET["lang"]);
if($lang_post==""){
	$lang_post = "th";
}
require("../lang/".$lang_post.".php");

	
if($_POST["send_alert"]!=""){
	$arr_ios = array();
	$arr_andriod = array();
	$gcmRegIds = array();
	$sql=sql_query("select * from bom_tb_member where m_active = 1 and (m_uid_ios!='' or m_uid_android!='' )");
	while($rs=sql_fetch($sql)){
		if(trim($rs["m_uid_ios"])!=""){
			$arr_ios[] = $rs["m_uid_ios"];
		}
		if(trim($rs["m_uid_android"])!=""){
			array_push($gcmRegIds, $rs["m_uid_android"]);
		}
	}
	//print_r($arr_ios);
	if($_POST["device"]==1){
		//echo "ssss";
		//$arr_ios[] = "7e937185d0adc1615a0aae27c9a8288df409d88f9257e19d51465680387b357e";
		echo noti($arr_ios, $_POST["smsg"] , 1 , $_POST["stype"]);
		/*foreach ($arr_ios as $value) {
			//echo $value ." ". $_POST["smsg"] ." ". 1 ." ". $_POST["stype"];
			$snoti = noti($value , $_POST["smsg"] , 1 , $_POST["stype"]);
		}*/
	}else if($_POST["device"]==2){
		echo sm($gcmRegIds , $_POST["smsg"] , 1 , $_POST["stype"]);
		/*foreach ($arr_andriod as $value) {
			echo $value."<br>";
			$snoti2 = sm($value , $_POST["smsg"] , 1 , $_POST["stype"]);
		}*/
	}else{
		echo noti($arr_ios, $_POST["smsg"] , 1 , $_POST["stype"]);
		/*foreach ($arr_ios as $value) {
			$snoti = noti($value , $_POST["smsg"] , 1 , $_POST["stype"]);
		}*/
		echo sm($gcmRegIds , $_POST["smsg"] , 1 , $_POST["stype"]);
		/*foreach ($arr_andriod as $value) {
			$snoti2 = sm($value , $_POST["smsg"] , 1 , $_POST["stype"]);
		}*/
	}
	exit();
}
?>
<script src="../js/jquery-1.9.1.min.js"></script>
<select id="device">
	<?php 
		foreach ($lang_g['sendAlert_sl'] as $key => $value) {
			?>
				<option value="<?=$key;?>"><?=$value;?></option>
			<?
		}
	 ?>
<!-- <option value="0">อุปกรณ์ทั้งหมด</option>
<option value="1">อุปกรณ์ IOS</option>
<option value="2">อุปกรณ์ Andorid</option> -->
</select>
<br><br>
<input name="txt_re" type="text" id="txt_re">
<input type="button" value="<?=$lang_g['sendAlert'][1];?>" onClick="send_alert($('#txt_re').val() , 1);">
<br><br>
<input name="txt_full" type="text" id="txt_full">
<input type="button" value="<?=$lang_g['sendAlert'][2];?>" onClick="send_alert($('#txt_full').val() , 2);">
<br><br>
<input name="txt_news" type="text" id="txt_news">
<input type="button" value="<?=$lang_g['sendAlert'][3];?>" onClick="send_alert($('#txt_news').val() , 3);">
<br><br>
<div id="result"></div>
<script>
function send_alert(stxt,stype){
	$.ajax({
		type: "POST",
		url: "sendAlert.php",
		data: { "send_alert": "yes", "smsg": stxt , "stype": stype , "device": $("#device").val() },
		//timeout: 3000,
		cache: false,	// Clear cache IE
		beforeSend: function(){
			$("#result").html("<img src='../img/loding.gif'>");
		},
		success: function(data){
			$("#result").html(data);
			//console.log(data);
		}
	});	
}
</script>