<?php
  	ob_start(); if (!isset($_SESSION)) { session_start(); }
  	// session_destroy();
  	$_SESSION["includeUrl"] = "http://m.lotzx.com/hun";

  	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  	<!-- <meta name="viewport" content="maximum-scale=1, user-scalable=0"> -->
  	<meta name="viewport" content="width=device-width, user-scalable=0">
	<title>Login</title>

	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/library/css/login-style.css?v=<?=time()?>">
	

</head>
<body>
 	
		<div class="login-form-style">
		<div class="login-title"><img  src="assets/library/img/logo.png"></div>
			<form id='login-form' method="post">
				<input type="text" class="input-text" id="input-uname" placeholder="ชื่อผู้ใช้" name="uname" autocomplete="off">
				<input type="password" class="input-text" id="input-pword" placeholder="รหัสผ่าน" name="pword" autocomplete="off">
				<input type="submit" class="input-button" id="input-button" value="เข้าสู่ระบบ" name="submit" data-role="none">
			</form>
	</div>

</body>
</html>

<script>

localStorage.removeItem("openSubpassPage");
	
	$("#login-form").submit(function(event) 
	{
		var _name = $('#input-uname').val();
		var _pass = $('#input-pword').val();
	  	$.post('data/check-login.php', 
	  	{
	  	    uname: _name,
	  	    pword: _pass
	  	})
	  	.done(function(data, textStatus, xhr) 
	  	{
	  		// console.log(data)
	  		var _status = data['Status'];
	  		// console.log(_status)
	  		if(_status == 1)
	  		{
	  			$('input,textarea').blur();

 				  setTimeout(function(){
 				  	 window.location.href = "index.php?p=home";
 				 }, 300);
				

	  		}else {
	  		
	  			alert('ไม่พบผู้ใช้');
	  			$('#input-uname,#input-pword').val('');
	  		}
	  	});
	  	event.preventDefault();
	});

	document.addEventListener('touchmove', function (event) {
  		if (event.scale !== 1) { event.preventDefault(); }
	}, false)

</script>
