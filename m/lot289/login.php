<? 
	session_start();
	include 'function/site-data.php';  
	include 'function/checkLang.php'; 

	if(isset($_SESSION["login"]) && $_SESSION["login"] == '1') {
		header("Location: ".$_SESSION["base_url"]."index.php"); /* Redirect to index if already logged in */
		die();
	}

	if(!isset($_COOKIE["lang"])) {
		setcookie("lang", "th", time() + (86400 * 365), "/");
	}

	$cache_v = time();
	// $cache_v = '10014';
?>
<!DOCTYPE html>
<html lang="<?=$_COOKIE['lang'];?>">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>OHO 99</title>
	<script>
		const lang_data = {
			"fail": '<?=$lang_data["fail"]?>',
			"user_incorrect": '<?=$lang_data["user_incorrect"]?>',
			"ok": '<?=$lang_data["ok"]?>',
			"alert_insert_login": '<?=$lang_data["alert_insert_login"]?>',
		}
		const base_url = '/lot99/';
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="library/js/login.js?v=<?=$cache_v;?>"></script>
	<script src="library/js/modal.js?v=<?=$cache_v;?>"></script>
	<link rel="stylesheet" href="library/css/style.css?v=<?=$cache_v;?>" />
	<link rel="stylesheet" href="library/css/login-style.css?v=<?=$cache_v;?>" />
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>
<body>
	<div class="login-wrapper">	
		<img src="<?=$_SESSION["logo_img"].'?v=1001';?>" alt="" />
		<form id="form-login" action="" method="post">
			<input type="text" id="uname" name="uname" value="" placeholder='<?=$lang_data['input_username'];?>' autocomplete="off" />
			<input type="password" id="pwd" name="pwd" value="" placeholder='<?=$lang_data['input_password'];?>' />
			<input type="submit" id="lsubmit" name="lsubmit" value='<?=$lang_data['login'];?>' />
		</form>
	</div>
	<? include 'modal.php'; ?>	
</body>
</html>