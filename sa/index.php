<?
require('inc/function.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$app_title;?> | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <link rel="shortcut icon" href="assests/img/favicon.ico?v=000014">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <!-- <a href="index2.html"><b>Admin</b>LTE</a> -->
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"> <?=$app_title;?> </p>

    <form  method="post" onsubmit="return false;">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="username" name="username" id="l_user">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" id="l_pass">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <!-- <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div> -->
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" id="b_login" onclick="ConfirmLogin();">เข้าสู่ระบบ</button>
        </div>

        <div class="col-xs-12">
          <div id="token"></div>
        </div>
        <!-- /.col -->
      </div>
    </form>

    

    <!-- /.social-auth-links -->

    <!-- <a href="#">I forgot my password</a><br> -->
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });

  function ConfirmLogin()
  {   


    $("#b_login").attr('disabled' , 'disabled');
    var n_user=$('#l_user').val();
    var n_pass=$('#l_pass').val();
    if(n_user!="" && n_pass!=""){

      console.log('888')
  //////////////////////////////////////////////////////////////////////////////////////////////////
    $.ajax({
          type: "POST",
          url: "check_login.php",
          data: { "cuser": n_user ,"cpass":n_pass},
          cache: false, 
          beforeSend: function(){
            // $("#token").html("<img src='img/loding.gif' style='opacity:1; margin:auto; display:block;' id='loding-f'>");
          },
          success: function(data){      
             $("#token").html(data);
          }
        }); 
  //////////////////////////////////////////////////////////////////////////////////////////////////
        }
    $('#l_user').val('');
    $('#l_pass').val('');
    $("#b_login").removeAttr('disabled');
  }

</script>
</body>
</html>
