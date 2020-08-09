<?php 

$lang = ($_SESSION['lang']=='' ? 'th' : $_SESSION['lang']);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<title>Document</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css?v=<?=$time_stam;?>">
	<link rel="stylesheet" href="css/login_style.css?v=<?=$time_stam;?>">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 

</head>
<body>
	<div id="dialog_container">
		
	</div>

	<div id="login_container">

		<div class="login-box">
			<div id="logo"> <img src="img/logo1-new.png" alt="" style="width: 190px;     padding-bottom: 20px;"> </div>
			
			<form action="" style="padding: 0 15px;">
				<input name="l_user" type="text" class="form-control" id="l_user" placeholder="Username">
				<i class="ace-icon fa fa-user"></i>
				<input name="l_pass" type="Password" class="form-control" id="l_pass" placeholder="Password">
				<i class="ace-icon ace-icon1 fa fa-lock"></i>
			<!-- 	<select name="l_lang" id="l_lang" class="sl_lang">
					    <option value="en"  >English</option>
					    <option value="ch" >繁體中文</option>
					    <option value="cs" >简体中文</option>
					    <option value="th"   selected>ภาษาไทย</option>
					    <option value="vn" >Tiếng Việt</option> 
					    <option value="la" >ພາສາລາວ</option>
					    <option value="km" >ភាសាខ្មែរ</option>
					    <option value="mm" >Myanmar</option>
					    <option value="id" >Indonesian</option>


				</select> -->

			</form>

		</div>	

		<div class="button-box">
						<input type="button" class="btn-sty1" onclick="ConfirmLogin(); return false;" value="Login">
						<!-- <input type="button" class="btn-sty1" onclick="ClearLogin(); return false;" value="ยกเลิก"> -->
		</div>
		<div id="token_message">   </div>
	</div>
</body>
</html>


<script type="text/javascript" >

	function ClearLogin()
	{
		$('#l_user').val('');
		$('#l_pass').val('');
	}
	function ConfirmLogin()
	{		
	$("#b_login").attr('disabled' , 'disabled');
	var n_user=$('#l_user').val();
	var n_pass=$('#l_pass').val();
	var n_lang=  '<?=$lang;?>';
	if(n_user!="" && n_pass!=""){
//////////////////////////////////////////////////////////////////////////////////////////////////
	$.ajax({
				type: "POST",
				url: "check_login.php",
				data: { "cuser": n_user , "cpass":n_pass , "clang":n_lang },
				timeout: 15000,
				cache: false,	
				beforeSend: function(){
					//$("#token").html("<img src='img/loding.gif' style='opacity:1; margin:auto; display:block;' id='loding-f'>");
				},
				success: function(data){			
					 $("#token_message").html(data);
					 // alert(data)
				}
			});	
//////////////////////////////////////////////////////////////////////////////////////////////////
	}else{
		alert('กรุณนากรอกข้อมูลให้ถูกต้อง')
	}
	$('#l_user').val('');
	$('#l_pass').val('');
	// $("#b_login").removeAttr('disabled');
	}


	
</script>


