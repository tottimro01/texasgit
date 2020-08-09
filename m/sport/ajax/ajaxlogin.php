<? session_start(); ?>
<?php
require("../inc/conn.php");
//เวลาปัจจุบัน จาก server
$hour=0; //เวลาทด เป็น + หรือ - ถ้าเวลาของ Server ไม่ตรงกับประเทศไทย
$min =0; //เวลาทด เป็น + หรือ - ถ้าเวลาของ Server ไม่ตรงกับประเทศไทย
$sestime = date("U",mktime( date("H")+$hour, date("i")+$min ));

	$strAccount = trim($_POST["tAccount"]);
	$strUsername = trim($_POST["tUser"]);
	$strPassword = trim($_POST["tPsw"]);
	$strLogin = $_POST["tLogin"];
		
	if(trim($strUsername) == "")
	{
		echo "<span style='color:#FF0000'/><b><i class='fa fa-times-circle'></i></b> โปรดระบุชื่อผู้ใช้งาน</span>";
		exit();
	}
	
	if(trim($strPassword) == "")
	{
		echo "<span style='color:#FF0000'/><b><i class='fa fa-times-circle'></i></b> โปรดระบุรหัสผ่าน</span>";
		exit();
	}

conn_db_func();


$strPassword = md5(sha1($strPassword));

if($strAccount == "admin"){
$objQuery = sql_query("SELECT * FROM tb_user WHERE user_name='$strUsername' AND user_psw='$strPassword'");
}else{
$objQuery = sql_query("SELECT * FROM tb_user WHERE user_name='$strUsername' AND user_psw='$strPassword'");
}

$objResult = sql_fetch($objQuery);
$rows = mysql_num_rows($objQuery);

if($objResult["user_name"]!=$strUsername || $objResult["user_psw"]!=$strPassword){
echo "<span style='color:#FFF'/><b><i class='fa fa-times-circle'></i></b> ชื่อผู้ใช้งาน หรือ รหัสผ่าน ไม่ถูกต้อง</span>";
}
elseif($objResult["user_access"]=="0"){
echo "<span style='color:#FFF'/><b><i class='fa fa-times-circle'></i></b> รอตรวจสอบ 1-30 นาที</span>";
}
elseif($objResult["user_access"]=="2"){
echo "<span style='color:#FFF'/><b><i class='fa fa-times-circle'></i></b> ยูซเซอร์ของท่านหมดอายุ</font>";
}
elseif($objResult["user_access"]=="3"){
echo "<span style='color:#FFF'/><b><i class='fa fa-times-circle'></i></b> ยูซเซอร์ถูกระงับการใช้งาน</span>";
}
elseif($rows==1){

$_SESSION["user_name"] = $objResult["user_name"];
/*$_SESSION["user_class"] = $objResult["user_class"];*/
$_SESSION["loginlimit"] = $strLogin;
echo "Y";
exit();
}
else{
echo "<span style='color:#FFF'/><b><i class='fa fa-times-circle'></i></b> Please refresh and login again</span>";
}
close_db_func();
?>


