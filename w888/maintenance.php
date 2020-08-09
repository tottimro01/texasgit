<?
	session_start();
	
	// require('inc/conn.php');	
	require('inc/function.php');	

	$config = getMaintenance();
	if($_GET["f"]!="app"){
		if($config['con_service'] == 1){
	  		header("Location: login.php");
		}else{
			$url_file="json/online/m/".$_SESSION['m_id'].".json";
			@unlink($url_file); // delete file 
			session_destroy();
		}
	}
?>
<!DOCTYPE html>
<html lang="en" class="maintenace">
<head>
	<meta charset="UTF-8">
	<title>Maintenance</title>

	<link rel="stylesheet" href="css/style.css" />
</head>
<body class="maintenace">
	<div class="maintenace_topbar">
		<div id="logo_maintenace">
			<div id="logo"></div>
		</div>
	</div>

	<hr style="border-width: 4px; border-color: #8e2c22; margin: 0;" />
	<br />
	<div class="" style="padding: 0 15px; margin: 0 auto; max-width: 800px;">
		<br>
		<h1 class="cr">! UNDER MAINTENANCE</h1>
		<hr>
		<div>
			<br>
			<h4>Dear valued customers:</h4>
			<p>
				We are having server maintenance, website will be unavailable from time <span class="cr"><?=$config['time_service'];?></span>. <br>Sorry for the inconvenience caused.
			</p>
			<p>From: <?=$app_name;?></p>
		</div>

		<div>
			<br>
			<h4>เรียนลูกค้าผู้มีอุปการคุณทุกท่าน:</h4>
			<p>
				ทางเรากำลังทำการปรับปรุงระบบ เว็บไซต์จะไม่สามารถเข้าใช้งานได้ตั้งแต่เวลา <span class="cr"><?=$config['time_service'];?></span>. <br>ขออภัยในความไม่สะดวก
			</p>
			<p>จาก: <?=$app_name;?></p>
		</div>
		<br>
	</div>
	<br>
	<br>
	<br>
	<br>
	<div class="maintenace_footer">
		<hr style="margin: 0;">
		<br>
		<br>
		<p style="text-align: center;">&#9400; Copyright <?=date("Y");?>. <?=$app_name;?>. All Rights Reserved.</p>
	</div>

</body>
</html>