<?
    session_start();
    require_once 'inc/conn.php';
    require_once 'inc/function.php';
    require_once 'inc/function2.php';
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title><?=$app_title;?></title>
	<link rel="shortcut icon" href="favicon.ico?v=000001" type="image/x-icon">

    <script src="assets/lib/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/css/normalize.css" />
    <link rel="stylesheet" href="assets/css/style.css" />

    <script src="assets/lib/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/lib/bootstrap/4.3.1/css/bootstrap.min.css" />
    <style>
        body{
            background-image: url(assets/img/theme/bg.jpg);
            background-position: center;
            background-size: cover;
        }

        .login-logo a{
            width: 250px;
        }
    </style>
</head>
<body>
  <?
    // $aa = sql_array("SELECT * FROM bom_tb_member WHERE m_id = 4");
    // var_dump($aa);
  ?>
  <div class="container">
    <br>
    <div class="login-logo">
        <a class="py-0 mt-5 mb-5 mx-auto d-block" href="#">
            <img src="assets/img/logo.png" alt="<?=$app_title;?>" class="w-100" />
        </a>
    </div>
        
    <div class="mx-auto col-md-5 col-xl-4">
        <div class="bg-white px-3 py-4 rounded">
        
        <form class="form" method="get" action="login_process.php">
            <div class="form-group">
                <input class="form-control form-control-sm mr-sm-2" type="text" placeholder="ชื่อผู้ใช้" name="l_user" />
            </div>
            <div class="form-group">
                <input class="form-control form-control-sm mr-sm-2" type="password" placeholder="รหัสผ่าน" name="l_pass" />
            </div>
            <div class="form-group mb-0">
                <!-- <button class="btn btn-sm btn-success control-oho my-2 my-sm-0" type="submit" name="login_submit">Login</button> -->
                <input type="submit" class="btn btn-sm btn-block control-oho" name="login_submit" value="เข้าสู่ระบบ" />
            </div>
        </form>
        <?
            if(isset($_GET['result'])){
                if($_GET['result']=='invalid'){
        ?>
        <div class="alert alert-danger small mb-0 mt-3" role="alert">
            <span>
                ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง
            </span>
        </div>
        <?      
                } 
            }
        ?>
        </div>
  </div>
</body>
</html>