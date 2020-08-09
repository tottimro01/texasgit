<?
    session_start();
    require_once 'inc/lang.php';
    require_once 'inc/rsc.php';
    require_once 'inc/conn.php';
    require_once 'inc/function.php';
?>
<!DOCTYPE html>
<html lang="<?=$lang;?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?=$app_title;?></title>
	<link rel="shortcut icon" href="<?=$img_favicon;?>" type="image/x-icon">

    <script src="assets/lib/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/css/normalize.css" />
    <link rel="stylesheet" href="assets/css/style.css<?=$cache_css;?>" />
    <link rel="stylesheet" href="assets/css/theme.css<?=$cache_css;?>" />

    <script src="assets/lib/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/lib/bootstrap/4.3.1/css/bootstrap.min.css" />
    <style>
        .login-logo a{
            width: 250px;
        }
    </style>
    <script src="assets/js/form.js<?=$cache_js;?>"></script>
</head>
<body class="m_bg">
  <div class="container">
    <br>
    <div class="login-logo">
        <a class="py-0 mt-5 mb-5 mx-auto d-block" href="#">
            <img src="<?=$img_logo;?>" alt="<?=$app_name;?>" class="w-100" />
        </a>
    </div>
        
    <div class="mx-auto col-md-5 col-xl-4">
        <div class="px-3 py-4 rounded">
        
        <form class="form auto-form" method="get" action="check_login.php" data-onsuccess="OnLoginSuccess" data-onsuccess="OnLoginFail">
            <div class="form-group">
                <input class="form-control mr-sm-2 control-sc" type="text" placeholder="<?=$lang_member[2152];?>" name="l_user" />
            </div>
            <div class="form-group">
                <input class="form-control mr-sm-2 control-sc" type="password" placeholder="<?=$lang_member[73];?>" name="l_pass" />
            </div>
            <div class="form-group mb-0">
                <input type="submit" class="btn btn-block control-sc sc-gd" name="login_submit" value="<?=$lang_member[2151];?>" />
            </div>
        </form>
        
        <div class="alert alert-danger small mb-0 mt-3" role="alert" id="login-result" style="display: none;">
            <span></span>
        </div>
        
        </div>
  </div>
  <script>
  	function OnLoginSuccess(form, result){
  		if(result.status == 1){
	  		window.location = "index.php";
  		}else{
  			$('#login-result > span').text(result.msg);
  			$('#login-result').show();
  		}
  	}

  	function OnLoginFail(form, error){
        $('#login-result > span').text("Unable to access server, Please try again later.");
        $('#login-result').show();
  	}
  </script>
</body>
</html>