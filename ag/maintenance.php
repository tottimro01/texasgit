<?
	session_start();
	
	// require('inc/conn.php');	
	// require('inc/function.php');	

	// $config = getMaintenance();
	// if($config['con_service'] == 1){
 //  		header("Location: login.html");
	// }else{
	// 	$url_file="json/online/m/".$_SESSION['m_id'].".json";
	// 	@unlink($url_file); // delete file 
	// 	session_destroy();
	// }

	require('inc/function.php');	

	$config = getMaintenance();
	if($config['con_service'] == 1){
  		header("Location: index.php");
	}else{
		$url_file="json/online/m/".$_SESSION['m_id'].".json";
		@unlink($url_file); // delete file 
		session_destroy();
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Maintenance</title>
	<link rel="shortcut icon" href="assets/img/favicon.ico?v=<?=$cache;?>">
</head>

<style>
body {
    background: #fef2f1;
    font-family: Tahoma,Geneva,Arial,Helvetica,sans-serif;
    font-size: 12px;
    margin: 0;
    padding: 0;
    background: -webkit-linear-gradient(bottom, rgba(255,255,255,1) 0%, rgba(254,238,237,1) 50%, rgba(255,255,255,1) 100%);
    background: -o-linear-gradient(bottom, rgba(255,255,255,1) 0%, rgba(254,238,237,1) 50%, rgba(255,255,255,1) 100%);
    background: linear-gradient(to top, rgba(255,255,255,1) 0%, rgba(254,238,237,1) 50%, rgba(255,255,255,1) 100%);
}
	
#logo {
    background: url(assets/images/logo.png) center center no-repeat;
    background-size: auto 130%;
    height: 60px;
    /*margin: 7px auto;*/
    width: 230px;
}

#logo_maintenace {
    padding: 10px 15px;
    max-width: 1170px;
    margin: 0 auto;
}

.cr {
    color: #FF0000;
}
.maintenace_topbar {
    background: rgb(254,238,237);
    background: -moz-linear-gradient(0deg, rgba(254,238,237,1) 0%, rgba(254,209,206,1) 100%);
    background: -webkit-linear-gradient(0deg, rgba(254,238,237,1) 0%, rgba(254,209,206,1) 100%);
    background: linear-gradient(0deg, rgba(254,238,237,1) 0%, rgba(254,209,206,1) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#feeeed",endColorstr="#fed1ce",GradientType=1);
}

</style>
<body>
	<div class="maintenace_topbar">
		<div id="logo_maintenace">
			<div id="logo"></div>
		</div>
	</div>	
	<hr style="border-width: 4px; border-color: #8e2c22;" />
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

</body>
</html>