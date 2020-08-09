<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('../inc/conn.php');
require("../lang/th.php");
require('../inc/function.php');
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<script src="../js/jquery-1.9.1.min.js?v=2019"></script>
<style>
body {
	padding: 0px;
	margin: 0px;
}
div {
	display: block;
}
.boxx {
	width: 100%;
	overflow: hidden;
}
#inputBox {
	padding:10px;
}
#txtInsert {
	width: 95%;
	min-height: 300px;
	margin-top: 5px;
}
#result {
	padding:10px;
}
#resultTXT {
	width:100%;
	border:1px solid #000000;
	min-height:500px;
	font-size:12px;
}
</style>
<script>
function save_data(){
	$.ajax({
		type: "POST",
		url: "insert_db.php",
		data: { "m_id": $("#seMem").val() , "txt": $("#txtInsert").val() },
		dataType:"json",
		timeout: 15000,
		cache: false,	// Clear cache IE
		beforeSend: function(){
			$("#resultTXT").html("กำลังบันทึกข้อมูลกรุณารอสักครู่...");
		},
		success: function(data){
			$("#resultTXT").html(data.Msg);
		}
	});	
}
</script>
</head>

<body>
<?
/*
	$re=sql_query("select * from bom_tb_agent order by r_user asc");
	while($rs=sql_fetch($re)){
		$newuser=str_replace('sssw','sw',$rs[r_user]);
		echo '<br>'.$sql="update bom_tb_agent set r_user='$newuser' where r_id='$rs[r_id]'; ";
		sql_query($sql);
	}
	
	$re=sql_query("select * from bom_tb_member order by m_user asc");
	while($rs=sql_fetch($re)){
		$newuser=str_replace('sssw','sw',$rs[m_user]);
		echo '<br>'.$sql="update bom_tb_member set m_user='$newuser' where m_id='$rs[m_id]'; ";
		sql_query($sql);
	}
	
	*/
	$sql="update bom_tb_member set  m_count='3000000' , m_count_de='3000000'  where 1 ";
	sql_query($sql);
?>
<div class="boxx">
  <div id="inputBox">
    <select id="seMem">
      <option value="">เลือกสมาชิก</option>
      <?
	$sql_mem=sql_query("select * from bom_tb_member order by m_user asc");
	while($rs_mem=sql_fetch($sql_mem)){
?>
      <option value="<?=$rs_mem["m_id"]?>">
      <?=$rs_mem["m_user"]?>
      [
      <?=$rs_mem["m_name"]?>
      ]</option>
      <? } ?>
    </select>
    <input type="button" value="บันทึก" onClick="save_data();">
    <br>
    <textarea id="txtInsert"></textarea>
  </div>
</div>
<div class="boxx">
  <div id="result">
  	ผลการบันทึกข้อมูล
    <div id="resultTXT"></div>
  </div>
</div>
</body>
</html>