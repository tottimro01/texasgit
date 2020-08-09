<? session_start(); ?>
<? if($_SESSION["user_name"]!=""){ 
echo "<meta http-equiv='refresh' content='0;URL=page/main.php'>"; 
exit();
} ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/lotto-logo.ico">

    <title>Sport Online</title>


    <link href="plugin/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="plugin/docs/examples/signin/signin.css" rel="stylesheet">
    <link href="dist/css/theme.css" rel="stylesheet">
    <link href="dist/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
	.loader {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url('img/FhHRx.gif') 50% 50% no-repeat rgb(255,255,255); }
	</style> 
    <script src="dist/js/jquery.min.js"></script>
    <script src="plugin/assets/js/ie-emulation-modes-warning.js"></script>
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

  <body>
  <div class="loader"></div>
    <div class="container">
	
    	<div style="padding:10px">

          <form class="form-signin" name="login">
            <h1 class="H1" align="center" style="margin-bottom:20px"><i>SPORT ONLINE</i></h1>
            
            <label for="user" class="sr-only">ชื่อผู้ใช้งาน</label>
            <input type="text" name="txtUser" id="txtUser" class="form-control form-group-lg" placeholder="ชื่อผู้ใช้งาน" style="margin-bottom:5px; color:#337ab7; border:1px solid #337ab7">
            
            <label for="psw" class="sr-only">รหัสผ่าน</label>
            <input type="password" name="txtPsw" id="txtPsw" class="form-control form-group-lg" placeholder="รหัสผ่าน" style="color:#337ab7;border:1px solid #337ab7">
            
            <center><span id="mySpanLogin" class="thaisan" style="padding:1px; font-size:13px"></span></center>
            
            <button class="btn btn-lg btn-primary btn-block thaisan" type="button" style="margin-top:0px" OnClick="JavaScript:doCallAjaxLogin();"><strong><span class="glyphicon glyphicon-off"></span> เข้าสู่ระบบ</strong></button>
          </form>
      
    	</div>  
    </div>


    
    <script src="plugin/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
