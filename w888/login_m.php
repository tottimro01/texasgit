<?
if($_GET["lang"]==""){
	$lang = "en";
}else{
	$lang = $_GET["lang"];
}
require("admin_lang/export/lang_member_".$lang.".php");
/*
    $langImg = $_POST["hidSelLang"]=="" ? "th" : $_POST["hidSelLang"];
    if($langImg!="th"&&$langImg!="en"){
        $langImg = "en";
    }*/
?>
<!DOCTYPE html>
<html lang="<?=$lang;?>" class="h-100">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <meta name="apple-itunes-app" content="app-id=big289, affiliate-data=myAffiliateData, app-argument=BIG289://?"> -->
	<title>::: BIG289 :::</title>

	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <script language="JavaScript" type="text/javascript" src="commJS/jquery.min.js"></script>

    <link rel="stylesheet" href="lib/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="lib/fontawesome/5.11.2/css/all.min.css">

<!--     <link rel="stylesheet" href="lib/bootstrap-select/1.13.12/bootstrap-select.min.css" />
    <script src="lib/bootstrap-select/1.13.12/bootstrap-select.min.js"></script> -->

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css?v=2020">

    <link href="https://fonts.googleapis.com/css?family=Kanit:300,400&amp;display=swap" rel="stylesheet">

</head>
<body class="main-bg m-0">
	<div ></div>
	<div class="container">
		<div>
			<div>
				<a href="#" class="logo mx-auto">
					<img src="login/mbc/common/images/logo_white.png" alt="" class="w-100">
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col-10 col-md-8 mx-auto">
				<form class="formLogin" id="formLogin" action="check_login.php" method="post">
					<h3 class="text-center text-white font-kanit mb-3"><?=$lang_member[2151]?></h3>
					<div class="alert alert-danger" role="alert" id="token" style="display: none;">
					  
					</div>

			  		<fieldset class="d-block m-0 p-0">
			  			<input type="hidden" name="clang" id="clang" value="<?=$lang;?>">
						<div class="form-group">
							<label class="sr-only" for="cuser"><?=$lang_member[2152]?></label>
							<div class="input-group mb-2">
						    	<label class="input-group-prepend m-0" for="cuser">
						    	  	<div class="input-group-text border-right-0">
						    	  		<i class="fas fa-user mx-auto"></i>
						    	  	</div>
						    	</label>
						    	<input type="text" class="form-control form-control-lg border-left-0 control-oho no-outline" id="cuser" name="cuser" placeholder="<?=$lang_member[2152]?>">
						  	</div>
						</div>

						<div class="form-group">
							<label class="sr-only" for="cpass"><?=$lang_member[73]?></label>
							<div class="input-group mb-2">
						    	<label class="input-group-prepend m-0" for="cpass">
						    	  	<div class="input-group-text border-right-0">
						    	  		<i class="fas fa-lock mx-auto"></i>
						    	  	</div>
						    	</label>
						    	<input type="password" class="form-control form-control-lg border-left-0 control-oho no-outline" id="cpass" name="cpass" placeholder="<?=$lang_member[73]?>">
						  	</div>
						</div>
			    
						<div class="form-group form-row m-0">
						  <button type="submit" name="submit" class="btn btn-lg text-white col-10 col-md-6 mb-2 mx-auto shadow">
						  	<i class="fas fa-sign-in-alt mr-2 small"></i>
						  	<span class="font-kanit"><?=$lang_member[2151]?></span>
						  </button>
						</div>
			  		</fieldset>
				</form>
				<div class="mt-3">
					<div class="w-75 mx-auto">
						<table class="w-100">
							<tr>
								<td class="w-50">
									<select name="changeLang" id="changeLang" class="text-white font-kanit" onchange="window.location.href='?lang='+this.value">
										<option<? if($lang=="en"){ ?> selected="selected"<? } ?> value="en">English</div>
   			   							<option<? if($lang=="cn"){ ?> selected="selected"<? } ?> value="cn">简体中文</div>
   			   							<option<? if($lang=="th"){ ?> selected="selected"<? } ?> value="th">ภาษาไทย</div>
   			   							<option<? if($lang=="vn"){ ?> selected="selected"<? } ?> value="vn">Tiếng Việt</div>
   			   							<option<? if($lang=="la"){ ?> selected="selected"<? } ?> value="la">ພາສາລາວ</div>
   			   							<option<? if($lang=="km"){ ?> selected="selected"<? } ?> value="km">ភាសាខ្មែរ</div>
   			   							<option<? if($lang=="mm"){ ?> selected="selected"<? } ?> value="mm">မြန်မာ</div>
   			   							<option<? if($lang=="id"){ ?> selected="selected"<? } ?> value="id">Indonesian</div>
   			   							<option<? if($lang=="jp"){ ?> selected="selected"<? } ?> value="jp">日本語</div>
   			   							<option<? if($lang=="ko"){ ?> selected="selected"<? } ?> value="ko">한국어</div>
									</select>
								</td>
								<td class="w-50 text-right"><a href="download.php?lang=<?=$lang;?>" class="text-white font-kanit"><?=$lang_member[2153]?></a></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
	$(function(){
		$(document).on('submit', '#formLogin', function(event) {
			event.preventDefault();
			var form = this;
			var fdata = new FormData(form);
			$.ajax({
				url: form.action,
				type: form.method,
				dataType: 'html',
				data: fdata,
				contentType: false,
				processData: false,
				beforeSend: function(){
					$('#token').hide();
        			$(form).find('fieldset').attr('disabled', 'disabled');
				}
			})
			.done(function(response){
				$("#token").html(response);
				if(typeof success == 'undefined' || success != 1)
					$('#token').show();
			})
			.fail(function(){
				$('#token').show();
				$("#token").html('Something went wrong! plaese try again.');
				// alert('Something went wrong! plaese try again.');
			})
			.always(function(){
        		$(form).find('fieldset').removeAttr('disabled');
			});
		});
	  //   var dd;
	  //   if(dd = document.getElementById('changeLang')){
	  //   // $.fn.selectpicker.Constructor.BootstrapVersion = '4';
	  //   $(dd).selectpicker({
	  //     width: 'fit',
	  //     styleBase: 'nav-link bg-transparent',
	  //   });
	  //   $(dd).show();
	  //   $(dd).on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
	  //     let urlToGo = e.target[clickedIndex].value;
	  //     window.location.href = urlToGo;
	  //   });
	  // }
	});
	</script>
</body>
</html>