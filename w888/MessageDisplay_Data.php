<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?

require('inc/conn.php');
require('inc/function.php');

require("lang/variable_lang.php");
// require("lang/member_lang.php");
require("lang/function_array.php");


$msg_type = $_POST["msg_type"];


if($msg_type=="creditProblem"){
	$SubTitle = "จำนวนเงินที่เล่นมีปัญหา";
	$Content = "ขออภัย เงินที่คุณต้องการวางเดิมพันมีจำนวนมากกว่าเงินในบัญชีของคุณ";
	unset($_SESSION["busket"]);
}else if($msg_type=="userProblem"){
	$SubTitle = "บัญชีผู้ใช้ปัญหา";
	$Content = "ขออภัย เกิดข้อผิดพลาดเกี่ยวกับบัญชีผู้ใช้ กรุณาติดต่อ Admin";
	unset($_SESSION["busket"]);
}else if($msg_type=="betProblem"){
	$SubTitle = "พนันผิดพลาด";
	$Content = "ขออภัย พนันผิดพลาด กรุณาลองใหม่อีกครั้ง";
	unset($_SESSION["busket"]);
}else{
	$SubTitle = "พนันผิดพลาด";
	$Content = $msg_type;
	unset($_SESSION["busket"]);
}

?>
<script type="text/javascript" >
var title="";
var SubTitle="<?=$SubTitle?>";
var Content="<?=$Content?>";
var timeout='20000';
parent.SetMessageDisplayData(title,SubTitle,Content,timeout);
</script>
