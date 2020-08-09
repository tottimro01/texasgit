<?
//Detect special conditions devices
$iPod    = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
$iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
$Android = stripos($_SERVER['HTTP_USER_AGENT'],"Android");
$webOS   = stripos($_SERVER['HTTP_USER_AGENT'],"webOS");

//do something with this information
if( $iPod || $iPhone ){
    //browser reported as an iPhone/iPod touch -- do something here
	$_GET[AGENT]=1;
}else if($iPad){
    //browser reported as an iPad -- do something here
	$_GET[AGENT]=1;
}else if($Android){
    //browser reported as an Android device -- do something here
	$_GET[AGENT]=2;
}else if($webOS){
    //browser reported as a webOS device -- do something here
	$_GET[AGENT]=3;
}else{
	// ไม่มี
	$_GET[AGENT]=3;
	}
	
	if($_GET[AGENT]==3){
		exit();
		#echo'<center><h1>กรุณาเข้าผ่านมือถือ</h1></center>';
		}


/*if($_GET["app"]=="KTstep" || $_GET["app"]=="ETstep"){
	$user = "123";
	$pass = "123";
	$server_use = "@zx5";
}else if($_GET["app"]=="OHO" || $_GET["app"]=="Hzx"){
	$user = "aaaa01";
	$pass = "1111";
	$server_use = "@zx";
}*/


//$token = base64_encode($user.$server_use."##.##".$pass);

$token = "";

if($_GET[AGENT]==1){
	$url = $_GET["app"]."://?".$token;
	if($_GET["app"]=="KTstep"){
		$download = "itms-services://?action=download-manifest&url=https://www.appkub.com/ios/KTstep.plist";
		//$download = "http://www.livezx.com/";
	}else if($_GET["app"]=="OHO"){
		$download = "itms-services://?action=download-manifest&url=https://www.appkub.com/ios/OHO.plist";
		//$download = "http://m.lotzx.com/lot/";
	}else if($_GET["app"]=="firebet"){
		$download = "itms-services://?action=download-manifest&url=https://855-bet.com/resources/manifest.plist";
		//$download = "http://m.lotzx.com/lot/";
		
	}else if($_GET["app"]=="Hzx"){
		$download = "itms-services://?action=download-manifest&url=https://www.appkub.com/ios/lothun.plist";
		//$download = "http://m.lotzx.com/lothun/";
	}else if($_GET["app"]=="OHO99"){
		$download = "itms-services://?action=download-manifest&url=https://www.appkub.com/ios/OHO99.plist";
	}else if($_GET["app"]=="BIG289"){
		$download = "itms-services://?action=download-manifest&url=https://www.appkub.com/ios/BIG289.plist";
	}else if($_GET["app"]=="BIGLive"){
		$download = "itms-services://?action=download-manifest&url=https://www.appkub.com/ios/BIGLive.plist";
	}
}else if($_GET[AGENT]==2){
	if($_GET["app"]=="OHO"){
		$url = "intent://".$token."/#Intent;scheme=OHO88;package=mvk.sc.olotpen.oho;end";
		$download = "https://www.appkub.com/android/oho.apk";
		//$download = "http://m.lotzx.com/lot/";
	}else if($_GET["app"]=="Hzx"){
		$url = "intent://".$token."/#Intent;scheme=Hzx;package=mvk.sc.twolothuntotou.ad;end";
		$download = "https://www.appkub.com/android/lotto_hun.apk";
		//$download = "http://m.lotzx.com/lothun/";
	}else if($_GET["app"]=="KTstep"){
		$url = "intent://scan/".$token."/#Intent;scheme=KTstep;package=wk.sc.stwsekcp;S.browser_fallback_url=https://www.appkub.com/android/ktstep.apk;end";
		$download = "https://www.appkub.com/android/ktstep.apk";
		//$download = "http://www.livezx.com/";
	}else if($_GET["app"]=="ETstep"){
		$url = "intent://".$token."/#Intent;scheme=ETstep;package=vk.sc.sbtaeltlm;end";
		$download = "https://www.appkub.com/android/bstep.apk";
		//$download = "http://www.livezx.com/";
	}else if($_GET["app"]=="OHO99"){
		$url = "intent://".$token."/#Intent;scheme=OHO99;package=mvk.sc.olotpen.oihio;end";
		$download = "https://www.appkub.com/android/oho99.apk";
		//$download = "http://www.livezx.com/";mvk.sc.olotpen.oihio&hl=th
	}else if($_GET["app"]=="BIG289"){
		$url = "intent://".$token."/#Intent;scheme=BIG289;package=mvk.sc.olotpen.oihio;end";
		$download = "https://www.appkub.com/android/oho99.apk";
		//$download = "http://www.livezx.com/";mvk.sc.olotpen.oihio&hl=th
	}
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
      <script type="text/javaScript" src="jquery.js"></script>
      <script>





         var visibleHasChange = false;
         $(document).ready(function() {		 
         	document.addEventListener("visibilitychange", handleVisibilityChange, false);
         	document.addEventListener("msvisibilitychange", handleVisibilityChange, false);
         	document.addEventListener("webkitvisibilitychange", handleVisibilityChange, false);
         	
         	var appUrl = '<?=$url?>';
         	var downloadPage = "<?=$download?>";
         	
			openAppByChrome(appUrl,downloadPage,2000);
			 
         });
         
         function openAppByChrome(appUrl,downloadPage,delayTime){
         	window.location = appUrl;			
         	setTimeout(function() {				
         		if (!visibleHasChange) {
         		    window.location = downloadPage;
					//alert("NO : "+appUrl);
         		}	
         	}, delayTime);
         }
         
         function handleVisibilityChange(){
         	visibleHasChange = true;	
         }
         
      </script>
   </head>
   <body id='checkBody'>
      <div id='result'>
      </div>
   </body>
</html>