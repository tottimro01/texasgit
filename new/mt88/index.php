<?
    ob_start(); if (!isset($_SESSION)) { session_start(); } 
    require_once 'lib/Mobile-Detect/Mobile_Detect.php';
    $detect = new Mobile_Detect;
    $cache_v = '00009';

    if($_GET['p'] == '') 
    {
       header("Location: index.php?p=index");
    }

    if($_GET["hidSelLang"]==""){
        if($_COOKIE["lang"]==""){
            $lang = "th";
        }else{
            $lang = $_COOKIE["lang"];
        }
    }else{
        $lang = $_GET["hidSelLang"];
    }

   setcookie('lang', $lang);

    $langList = array(
        "en" => "English",
        "th" => "ภาษาไทย",
        "la" => "ພາສາລາວ"
    );
    $_GET["hidSelLang"]=$langList[$lang];

    if($detect->isMobile() ) {
        header("Location: index2.php?hidSelLang=".$lang);
        exit(); 
    }

    // ภาษาสำหรับไปเลือกไฟล์รูปภาพ มีแค่ TH หรือ EN //
    // $lang = "en";
    $langImg = $lang;
    if($langImg!="th"&&$langImg!="en"){
        $langImg = "en";
    }
    // ภาษาสำหรับไปเลือกไฟล์รูปภาพ //
    setcookie('lang', $lang);
    include 'lang/home_lang.php';
    // require("/home/ohoking/domains/wan1991.com/public_html/w1/admin_lang/export/lang_member_".$lang.".php");
    require "inc/function.php";

?>

<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Wed Mar 25 2020 06:08:09 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="5e797c3cc3821adbb832a5f2" data-wf-site="5e797c3cc3821a97d332a5f1">
<head>
  <meta charset="utf-8">
  <title><?=$app_title;?></title>
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="assest_login/css/normalize.css" rel="stylesheet" type="text/css">
  <link href="assest_login/css/webflow.css" rel="stylesheet" type="text/css">
  <link href="assest_login/css/mtbet.webflow.css" rel="stylesheet" type="text/css">
  <link href="assest_login/css/custom.css?v=<?=time();?>" rel="stylesheet" type="text/css">
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="assest_login/images/favicon.ico?v=<?=$cache_v;?>" rel="shortcut icon" type="image/x-icon">
  <link href="assest_login/images/favicon.ico?v=<?=$cache_v;?>" rel="apple-touch-icon">
</head>
<body class="body">
  <div class="sec1">
    <div class="con1 w-container"><img src="assest_login/images/logo_ping.gif" width="358" alt="" class="img-logo">
      <div class="div-login">
        <div class="form-login w-form">
          <form id="frmLogin" name="frmLogin" class="form-log w-clearfix">
            <input type="submit" value="Login" data-wait="Please wait..." class="submit-log w-button">
             <input type="text"  id="txtID1"  class="tf-log1 w-input" maxlength="256" name="username" data-name="Nusernameame" placeholder="Username" required="">
             <input type="Password" id="txtPW23" class=" tf-log2 w-input" maxlength="256" name="password" data-name="password" placeholder="Password" required="">
             <input type="hidden" id="ref_url" name="ref_url" value="<?=$ref_url;?>" class="tf-2 w-input">
          </form>

          <span id="token" class="tf-2" style="color: #fff;    line-height: 40px; width: auto; float:right; margin-right: 15px;"></span>
          <!-- 
          <div class="w-form-done">
            <div>Thank you! Your submission has been received!</div>
          </div>
          <div class="w-form-fail">
            <div>Oops! Something went wrong while submitting the form.</div>
          </div> -->
        </div>
      </div>
    </div>
  </div>
  <div class="sec2">
    <div class="con2 w-container">
      <div class="div21"><img src="assest_login/images/casino_button.png?v=<?=$cache_v;?>" width="445" alt="" class="image-2"></div>
      <div class="div22 w-clearfix">
        <div class="div2">
          <div data-animation="slide" data-duration="500" data-infinite="1" data-delay="4000" data-autoplay="1" class="slider w-slider">
            <div class="mask w-slider-mask">
              <div class="sli1 w-slide"><img src="assest_login/images/banner02.png?v=<?=$cache_v;?>" alt="" class="img-sli"></div>
              <div class="sli2 w-slide"><img src="assest_login/images/banner03.png?v=<?=$cache_v;?>" alt="" class="img-sli"></div>
              <div class="w-slide"><img src="assest_login/images/banner01.png?v=<?=$cache_v;?>" alt="" class="image-6"></div>
            </div>
            <div class="la w-slider-arrow-left"></div>
            <div class="ra w-slider-arrow-right"></div>
            <div class="sli-nav w-slider-nav w-round"></div>
          </div>
        </div>
      </div>
      <div class="div23"><img src="assest_login/images/slot_button.png?v=<?=$cache_v;?>" width="133" alt="" class="image"><img src="assest_login/images/sport_button.png?v=<?=$cache_v;?>" width="137" alt="" class="image"><img src="assest_login/images/lotto_button.png?v=<?=$cache_v;?>" width="137" alt="" class="image"></div>
    </div>
  </div>
  <div class="sec3">
    <div class="con3 w-container"><img src="assest_login/images/bank_ping.gif" width="421" alt="" class="image-4">

      <nav id="menu_footter">
        <ul>
          <li class="active"><a href="#">Home</a></li>
          <li><a href="#"> Sport </a></li>
          <li><a href="#">Lotto</a></li>
          <li><a href="#">Casino</a></li>
          <li><a href="#">Slot</a></li>
        </ul>
      </nav>
      <!-- <img src="assest_login/images/menu_footter.png?v=<?=$cache_v;?>" width="450" alt="" class="image-5"> -->
    </div>
  </div>
  <div class="sec4">
    <div class="con4 w-container">
      <div class="div71">
        <p class="p2">Copyright © mtbet.com. All rights reserved. v1.0</p>
      </div>
    </div>
  </div>
  <!-- <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js" type="text/javascript" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script> -->
  <script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
  <script src="assest_login/js/webflow.js" type="text/javascript"></script>
  <script src="assest_login/js/index.js?v=<?=time();?>" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>