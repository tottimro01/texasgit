<?php 
  include "inc/function.php";
  // if(!checkUrlRequest()){ exit(); }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title><?=$app_title;?></title>
        <meta name="description" content="Login Agent <?=$app_name;?> page" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <link rel="shortcut icon" href="assets/img/favicon.ico">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="assets/css/modify.css?v=4" />
    	<!-- <link rel="stylesheet" href="assets/css/agent-login.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" /> -->
        <link rel="stylesheet" href="assets/css/agent-login.css?v=<?=time();?>" />

        <script src="assets/js/jquery.2.1.1.min.js"></script>  
        <style type="text/css">
            #captcha{
                -webkit-border-radius:5px;
                -moz-border-radius:5px;
                border-radius:5px;
                font-size:190%;
                text-align:center;
                color:#333;
                background-color:#dcca7e;
                width:100px;
                height:35px;
            }
        </style>
    </head>

    <body class="login-layout">

        <div class="main-container">
            <div class="main-content">
                <div class="">                    
                    <div class="space-6"></div>
                	<div class="box-login">
                  <br><br>
						<div class="logo"><img src="assets/images/logo.png" alt="<?=$app_title;?>" width="287px;" ></div>

						<form method="post" role="form" class="form-login" action="chkLogin.php" onsubmit="return false;">
						  	<div class="form-group" style="margin-bottom:5px;">
						    	<input type="text" class="form-control" name="usr" id="usr" value="" placeholder="Username" required>         
						  	</div>
						  	<div class="form-group">
						    	<input type="password" class="form-control" name="pwd" id="pwd" placeholder="Password" required>
						  	</div>

                <span class="help-block" id="login_message">
                        
                    </span>
						  	
						  <div class="form-group row">
						    <div class="col-xs-6" style="padding-right:5;width: 140px">
						      <input type="text" class="form-control" name="CaptchaCode" id="CaptchaCode" placeholder="" required>
						    </div>
						    <div class="col-xs-6" id="captcha"></div>
						  </div>
						  <button type="submit" class="btn btn-primary" onclick="ConfirmLogin();">Login</button>
						  <!-- <div class="form-group">
						    <img src="assets/images/anti.png" alt="Anti" style="margin-left: -40px;">
						  </div> -->
						</form>
					</div><br><br><br><br>
                </div>
            </div>
        </div>
        <?php /* ?>
        <footer class="footer">
          <div>
            <center>
              <div class="form-group" style="margin:auto;">
                <div> <span><strong>ความละเอียดหน้าจอพื้นฐาน</strong></span></div>
              </div>
              <div class="form-group" style="margin:auto;">
                <div>
                  <div title="ความละเอียดของจอภาพที่ดีที่สุด" class="" style="display: inline;"> <img src="assets/images/pc-icon.png" style="margin-bottom:10px;"> 1024*768 </div>
                  <!-- <i class="fa fa-chrome fa-2x cursor-pointer" title="Chrome" style="margin-left:5px;"></i>
                  <i class="fa fa-safari fa-2x cursor-pointer" title="Safari" style="margin-left:5px;"></i>
                  <i class="fa fa-firefox fa-2x cursor-pointer" title="Firefox" style="margin-left:5px;"></i>
                  <i class="fa fa-opera fa-2x cursor-pointer" title="Opera" style="margin-left:5px;"></i>
                  <img class="cursor-pointer" src="assets/images/puffin.png" title="puffin" style="margin-bottom:10px;margin-left:5px;">
                  <img class="cursor-pointer" src="assets/images/flash-icon.png" title=" Flash Player" style="margin-bottom:10px;margin-left:5px;"> -->
                </div>
              </div>
              <div class="form-group" style="margin:auto;">
                <div class="clearfix text-center" style="width:80%"> 
                    <span style="float: left;">
                         Copyright © 2019
                    </span>

                    <span style="float: right;">
                        <i class="fa fa-envelope-o" aria-hidden="true" style="color:#ffffff;"> : wan1991@gmail.com</i>
                    </span>

                 
                  
          
                </div> 
              </div>
            </center>
          </div>
        </footer> */?>

        <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery.form-validator.min.js"></script>
        <script type="text/javascript">
            $.validate({        
                modules : 'security',                
              });


            randomCaptcha();
            var captcha;

            function randomCaptcha()
            {
                  captcha = Math.floor(100000 + Math.random() * 900000)
                  captcha = captcha.toString().substring(0, 4);

                  $('#captcha').text('');
                  $('#captcha').text(captcha);

            }

            function ConfirmLogin()
            {
                var n_user=$('#usr').val();
                var n_pass=$('#pwd').val();
                var captchaCode = $('#CaptchaCode').val();

                if(captchaCode == captcha)
                {
                    if(n_user != "" && n_pass != "")
                   {
                     $.ajax({
                       url: 'chkLogin.php',
                       type: 'POST',
                       dataType: 'html',
                       data: {cuser: n_user , cpass: n_pass},
                     })
                     .done(function(data) {
                       $('#login_message').text("");
                       $('#login_message').html(data);
                     })
                     .fail(function() {
                       console.log("error");
                     })
                     .always(function() {
                       console.log("complete");
                     });
                     
                   }
                }else{

                    let message = '<strong style="color:red">CaptchaCode Error</strong>';
                    $('#login_message').text("");
                    $('#login_message').html(message);


                }

                
            }
        </script>
    </body>
</html>

