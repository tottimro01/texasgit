<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
if($_SESSION[aid]==""){@header('Location: index.php');exit();}


if($_GET["lang"]==""){
    $_SESSION["AGlang"]="th";
}else{
    $_SESSION["AGlang"]=$_GET["lang"];
}   

require('lang/sa_lang.php');
require('inc/conn.php');
require('inc/function.php');
require('inc/ag_function.php');
require('lang/function_th_new.php');
// require('../lang/function_array.php');

// $lot_typeArry = $lot_type["th"][1];
// $lotHun_typeArry = $lot_type["th"][3];


$cache = 0007;
$cache = time();
 
$lot_typeArry = $lot_type["th"][1];
$lotHun_typeArry = $lot_type["th"][3]; 

$view_date=_bdate();

  if($_GET['p'] == "logout")
  {
    @session_start(); 
    @session_destroy();
    @header('Location: index.php');exit();
  }


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$app_title;?> | Dashboard</title>
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
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
   <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
   <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/simplebar/css/simplebar.css">
  <link rel="stylesheet" href="plugins/pace/pace.min.css">
  <link rel="stylesheet" href="assests/css/custom.css">
  <link rel="stylesheet" href="assests/lib/flag-icon/css/flag-icon.min.css">
  <link rel="shortcut icon" href="assests/img/favicon.ico?v=000015">

  <!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- <script src="bower_components/jquery/dist/jquery-latest.min.js"></script> -->
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>

<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="bower_components/simplebar/js/simplebar.min.js"></script>
<!-- PACE -->
<!-- <script src="plugins/pace/pace.min.js"></script> -->

<!-- jquery-confirm -->
<!-- <link rel="stylesheet" href="bower_components/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="bower_components/jquery-confirm/3.3.2/jquery-confirm.min.js"></script> -->
<script src="assests/js/main.js"></script>

<style>
  .loader {
    display: block;
    content: "";
    position: absolute;
    top: -1px;
    bottom: -1px;
    right: -1px;
    left: -1px;
    z-index: 9999;
    width: 100%;
    max-width: inherit;
    bottom: 0;
    top: 0;
    background-color: #00000059;
    display: none;
  }
  .loading-icon {
    position: relative;
    top: 50%;
    left: 50%;
    right: 0;
    text-align: center;
    color: #fff;
}
</style>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="loader">
  <i class="ace-icon loading-icon fa fa-spinner fa-spin fa-2x white"></i>
</div>  

<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="main.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><?=$short_name;?></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><?=$app_name;?></b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" aria-expanded="false" role="button" onclick="export_lang();">
              <img src="assests/img/language.png" class="user-image" alt="User Image">
              <span class="hidden-xs">Export ภาษา AG</span>
            </a>
          </li>
          <li class="dropdown user user-menu">
            <a href="#" aria-expanded="false" role="button" onclick="export_lang_m();">
              <img src="assests/img/language.png" class="user-image" alt="User Image">
              <span class="hidden-xs">Export ภาษา Member</span>
            </a>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user-img.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$_SESSION['auser'];?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <ul class="sidebar-menu" data-widget="tree">
        <li class="<?=($_GET['p'] == 'status' or $_GET['p'] == '') ? 'active' : '';?> ">
          <a href="?p=status">
            <i class="fa fa-dashboard"></i>
            <span>สถานะเซิร์ฟเวอร์</span>
          </a>
        </li>
        <li class="treeview1 <?=($_GET['g_p'] == 'bill') ? 'active' : '';?>">
          <a href="#">
            <i class="fa fa-file-text"></i> <span>บิล</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: block;">
            <li class="<?=($_GET['p'] == 'bill') ? 'active' : '';?>"><a href="?p=bill&g_p=bill&d=<?=$view_date;?>&bmem=1"> บิลรายการ </a></li>
            <li class="<?=($_GET['p'] == 'outstanding' || $_GET['p'] == 'outstandingM' || $_GET['p'] == 'outstanding' || $_GET['p'] == 'outstanding_user') ? 'active' : '';?>"><a href="?p=outstanding&g_p=bill&d=<?=$view_date;?>&e=<?=$view_date;?>"> ยอดเล่นค้าง </a></li>
            <li class="<?=($_GET['p'] == 'check_bill') ? 'active' : '';?>"><a href="?p=check_bill&g_p=bill&d=<?=$view_date;?>"> ตรวจบิลซ้ำ </a></li>
          </ul>
        </li>
        <li class="treeview1 <?=($_GET['g_p'] == 'football') ? 'active' : '';?>">
          <a href="#">
            <i class="fa fa-soccer-ball-o"></i> <span>ฟุตบอล</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: block;">
            <li class="<?=($_GET['p'] == 'score') ? 'active' : '';?>"><a href="?p=score&g_p=football&d=<?=$view_date;?>"> ผลบอล </a></li>
          </ul>
        </li>

        <li class="treeview1 <?=($_GET['g_p'] == 'lotto') ? 'active' : '';?>">
          <a href="#">
            <i class="fa fa-bar-chart"></i> <span>หวย</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: block;">
            <li class="<?=($_GET[p]=="lottoMaxReceive")? "active" : "";?>"><a href="?p=lottoMaxReceive&g_p=lotto">  อัตรารับสูงสุด </a></li>
            <li class="<?=($_GET[p]=="lottoBlockNumber")? "active" : "";?>"><a href="?p=lottoBlockNumber&g_p=lotto">  ปิดรับเลข </a></li>
            <li class="<?=($_GET[p]=="LottoBlockHit")? "active" : "";?>"><a href="?p=LottoBlockHit&g_p=lotto"> เลขดัง อั้น </a></li>
            <li class="<?=($_GET[p]=="lotto_win")? "active" : "";?>"><a href="?p=lotto_win&g_p=lotto"> ผลรางวัล </a></li>
            <li class="<?=($_GET[p]=="lotto_create")? "active" : "";?>"><a href="?p=lotto_create&g_p=lotto"> สร้างงวด </a></li>
            <li class="<?=($_GET[p]=="LottoFight")? "active" : "";?>"><a href="?p=LottoFight&g_p=lotto"> ตั้งสู้ </a></li>
            <li class="<?=($_GET[p]=="lotto_money")? "active" : "";?>"><a href="?p=lotto_money&g_p=lotto"> สรุปรวม </a></li>

          </ul>
        </li>

        <li class="treeview1 <?=($_GET['g_p'] == 'lothun') ? 'active' : '';?>">
          <a href="#">
            <i class="fa fa-line-chart"></i> <span>หวยหุ้น</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: block;">
            <li class="<?=($_GET[p]=="lottoSetMaxReceive")? "active" : "";?>"><a href="?p=lottoSetMaxReceive&g_p=lothun">  อัตรารับสูงสุด </a></li>
            <li class="<?=($_GET[p]=="lottoSetBlockNumber")? "active" : "";?>"><a href="?p=lottoSetBlockNumber&g_p=lothun">  ปิดรับเลข </a></li>
            <li class="<?=($_GET[p]=="LottoSetBlockHit")? "active" : "";?>"><a href="?p=LottoSetBlockHit&g_p=lothun">  เลขดัง อั้น </a></li>
            <li class="<?=($_GET[p]=="lothun_win")? "active" : "";?>"><a href="?p=lothun_win&g_p=lothun&d=<?=$view_date;?>"> ผลรางวัล </a></li>
            <li class="<?=($_GET[p]=="lothun_create")? "active" : "";?>"><a href="?p=lothun_create&g_p=lothun&d=<?=$view_date;?>"> สร้างงวด </a></li>
            <li class="<?=($_GET[p]=="lothunFight")? "active" : "";?>"><a href="?p=lothunFight&g_p=lothun&d=<?=$view_date;?>"> ตั้งสู้ </a></li>
            <li class="<?=($_GET[p]=="lothun_money")? "active" : "";?>"><a href="?p=lothun_money&g_p=lothun&d=<?=$view_date;?>"> สรุปรวม </a></li>
          </ul>
        </li>

        <li class="treeview1 <?=($_GET['g_p'] == 'winloss') ? 'active' : '';?>">
          <a href="?p=winloss&g_p=winloss&d=<?=$view_date;?>&e=<?=$view_date;?>">
            <i class="fa fa-retweet"></i> <span>ชนะ-แพ้</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: block;">
            <li class="<?=($_GET[p]=="winloss")? "active" : "";?>">
              <a href="?p=winloss&g_p=winloss&d=<?=$view_date;?>&e=<?=$view_date;?>"> 
                ชนะแพ้ตามสมาชิก 
              </a>
            </li>
          </ul>
        </li>
        <li class="<?=($_GET['g_p'] == 'control') ? 'active' : '';?> ">
          <a href="?p=control&g_p=control">
            <i class="fa fa-wrench"></i>
            <span>ควบคุมระบบ</span>
          </a>
        </li>
        <li class="<?=($_GET['g_p'] == 'add_agent') ? 'active' : '';?> ">
          <a href="?p=add_agent&g_p=add_agent">
            <i class="fa fa-user-plus"></i>
            <span>สร้างตัวแทน</span>
          </a>
        </li>

        <li class="<?=($_GET['g_p'] == 'list_agent') ? 'active' : '';?> ">
          <a href="?p=list_agent&g_p=list_agent">
            <i class="fa fa-list-ul"></i>
            <span>รายการตัวแทน</span>
          </a>
        </li>
       
        <li class="<?=($_GET['g_p'] == 'userStructure') ? 'active' : '';?> ">
          <a href="?p=userStructure&g_p=userStructure">	
            <i class="fa fa-users"></i>
            <span>โครงสร้างสมาชิก</span>
          </a>
        </li>

         <li class="<?=($_GET['g_p'] == 'MessageList') ? 'active' : '';?> ">
          <a href="?p=MessageList&g_p=MessageList">
            <i class="fa fa-files-o"></i>
            <span>สร้างข้อความ</span>
          </a>
        </li>

        <li class="<?=($_GET['g_p'] == 'keycode') ? 'active' : '';?> ">
          <a href="?p=keycodeList&g_p=keycode">
            <i class="fa fa-expeditedssl"></i>
            <span>สร้างชุดรหัส</span>
          </a>
        </li>

        <li class="<?=($_GET['g_p'] == 'bank') ? 'active' : '';?> ">
          <a href="?p=bank&g_p=bank">
            <i class="fa fa-money"></i>
            <span>ธนาคาร</span>
          </a>
        </li>

         <li>
          <a href="?p=logout">
            <i class="fa fa-sign-out"></i>
            <span>ออกจากระบบ</span>
          </a>
        </li>
      </ul>

    </section>
    <!-- /.sidebar -->
  </aside>



  </script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<?php 
			if(isset($_GET['p']))
			{
				include "inc/".$_GET['p'].".php";
			}else{
        include "inc/status.php";
      }
	?>

  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.18
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">ADMIN</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->

<span id="token" style="display: none;"></span>
</body>
</html>

<script>

$(document).ready(function(){
    loadToken();
    setInterval(function(){                   
          loadToken();
    },30000);
});
  
function loadToken()
{
    $.ajax({
        url: 'token.php',
        type: 'GET',
        data: {randval: Math.random()},
        cache: false
    })
    .done(function(data) {
        // console.log("success");
        $("#token").html(data)
    })
    .fail(function() {
        // console.log("error");
    })
    .always(function() {
        // console.log("complete");
    });
}

function export_lang(){
  $.ajax({
        url: 'export_lang.php',
        type: 'GET',
        data: {randval: Math.random()},
        cache: false
    })
    .done(function(data) {
        alert("สำเร็จ");
    })
    .fail(function() {
        // console.log("error");
    })
    .always(function() {
        // console.log("complete");
    });
}

function export_lang_m(){
  $.ajax({
        url: 'export_lang_m.php',
        type: 'GET',
        data: {randval: Math.random()},
        cache: false
    })
    .done(function(data) {
        alert("สำเร็จ");
    })
    .fail(function() {
        // console.log("error");
    })
    .always(function() {
        // console.log("complete");
    });
}

</script>


