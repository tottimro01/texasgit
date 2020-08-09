<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<? if($_SESSION['mid']!=""){ 
/*
echo "<meta http-equiv='refresh' content='0;URL=page/main.php'>"; 
*/
@header('Location: page/main.php');
exit();
} 

require('../../inc/function.php');

if($_COOKIE['Language']==""){
    setcookie( "Language", 'th', time()+31104000, "/");
	// require('lang/th.php');
}
// else{
// 	require('lang/'.$_COOKIE['Language'].'.php');
// }
require('../../w1/admin_lang/export/lang_member_'.$_COOKIE['Language'].'.php');

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/logo.ico">

    <TITLE><?=$app_title;?></TITLE>

<link rel="shortcut icon" href="favicon.ico?v=000001" type="image/x-icon">
    <link href="plugin/dist/css/bootstrap.min.css?v=001" rel="stylesheet">
    <link href="plugin/docs/examples/signin/signin.css?v=001" rel="stylesheet">
    <link href="dist/css/theme.css?v=001" rel="stylesheet">
    <link href="dist/css/font-awesome.min.css?v=001" rel="stylesheet" type="text/css" />
    <style type="text/css">
	.loader {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url('img/FhHRx.gif') 50% 50% no-repeat rgb(255,255,255); }
	#logo {
		width: 70%;
    max-width: 340px;
    height: 110px;
    background: url(img/logo_white.png) center center no-repeat;
    background-size: 100% auto;
    margin: 20px auto;
}
	</style> 
    <script src="dist/js/jquery.min.js?v=001"></script>
    <script src="plugin/assets/js/ie-emulation-modes-warning.js?v=001"></script>
	<script type="text/javascript">
    $(window).load(function() {
        $(".loader").fadeOut("slow");
    })
	
	


    </script>
  </head>
  
  <script language="JavaScript">
	   var HttPRequest = false;

	   function doCallAjaxLogin() {
		  HttPRequest = false;
		  if (window.XMLHttpRequest) { // Mozilla, Safari,...
			 HttPRequest = new XMLHttpRequest();
			 if (HttPRequest.overrideMimeType) {
				HttPRequest.overrideMimeType('text/html');
			 }
		  } else if (window.ActiveXObject) { // IE
			 try {
				HttPRequest = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
				try {
				   HttPRequest = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {}
			 }
		  } 
		  
		  if (!HttPRequest) {
			 alert('Cannot create XMLHTTP instance');
			 return false;
		  }		
		  
		  var checklogin = new Array();

                $('#timelogin :input:checked').each(function() {
                        checklogin[checklogin.length] = $(this).val();
                });
	
		  var url = 'ajax/ajaxlogin.php';
		  var pmeters = "tUser=" + encodeURI( document.getElementById("txtUser").value)
		  				+ "&tPsw=" + encodeURI( document.getElementById("txtPsw").value );

			HttPRequest.open('POST',url,true);

			HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			HttPRequest.setRequestHeader("Content-length", pmeters.length);
			HttPRequest.setRequestHeader("Connection", "close");
			HttPRequest.send(pmeters);
			
			
			HttPRequest.onreadystatechange = function()
			{

				if(HttPRequest.readyState == 3)  // Loading Request
				{
					document.getElementById("mySpanLogin").innerHTML = "Now is Loading...";
				}

				if(HttPRequest.readyState == 4) // Return Request
				{
//					alert(HttPRequest.responseText); // check ว่ามันมีค่าว่าอะไร ซึ่งมันควรจะเท่ากับ N
//					alert(HttPRequest.responseText.length); // และ check length ครับ ว่ามันมีค่าว่าอะไร ซึ่งมันควรจะเท่ากับ 1 เพราะคุณ echo "N" ออกมาตัวอักษรเดียว
					if(HttPRequest.responseText == 'Y')
					{
						window.location = 'page/main.php';
					}
					else
					{
						document.getElementById("mySpanLogin").innerHTML = HttPRequest.responseText;
					}
				}
				
			}

	   }
	</script>

  <body style="background-color:goldenrod;">
  <div class="loader"></div>
    <div class="container">
	
      <form class="form-signin" name="login">
        <div id="logo" class="cu"></div>
        
        <label for="user" class="sr-only"><!-- ชื่อผู้ใช้งาน --><?=$lang_member[128];?></label>
        <input type="text" name="txtUser" id="txtUser" class="form-control form-group-lg" placeholder="<?=$lang_member[128];?>" required autofocus style="background-color:#FFFF99; margin-bottom: 5px;">
        
        <label for="psw" class="sr-only"><!-- รหัสผ่าน --><?=$lang_member[73];?></label>
        <input type="password" name="txtPsw" id="txtPsw" class="form-control form-group-lg" placeholder="<?=$lang_member[73];?>" required style="margin-top:1px;background-color:#FFFF99">
        
        <span id="mySpanLogin" class="thaisan" style="padding:1px; font-size:10px"></span>
        
        <button class="btn btn-lg btn-warning btn-block thaisan" type="button" style="margin-top:0px" OnClick="JavaScript:doCallAjaxLogin();"><strong><span class="glyphicon glyphicon-off"></span> <!-- เข้าสู่ระบบ --><?=$lang_member[2151];?></strong></button>
      </form>
      
    	</div>  
    </div>


    
    <script src="plugin/assets/js/ie10-viewport-bug-workaround.js?v=001"></script>

  </body>
</html>
