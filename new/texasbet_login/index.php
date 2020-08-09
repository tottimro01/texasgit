<?
    ob_start(); if (!isset($_SESSION)) { session_start(); } 
    require_once 'lib/Mobile-Detect/Mobile_Detect.php';
    $detect = new Mobile_Detect;
    $cache_v = '00023';

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
<!--  Last Published: Wed Mar 25 2020 14:16:15 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="5e7af8505e9f113784f66bdc" data-wf-site="5e7af8505e9f117656f66bdb">
<head>
  <meta charset="utf-8">
  <title><?=$app_title;?></title>
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="assest_login/css/normalize.css?v=<?=$cache_v;?>" rel="stylesheet" type="text/css">
  <link href="assest_login/css/webflow.css?v=<?=$cache_v;?>" rel="stylesheet" type="text/css">
  <link href="assest_login/css/texasbe.webflow.css?v=<?=$cache_v;?>" rel="stylesheet" type="text/css">
  <link href="assest_login/css/custom.css?v=<?=time();?>" rel="stylesheet" type="text/css">
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="assest_login/images/favicon.ico?v=<?=$cache_v;?>" rel="shortcut icon" type="image/x-icon">
  <link href="assest_login/images/favicon.ico?v=<?=$cache_v;?>" rel="apple-touch-icon">
</head>
<body class="body">
  <div class="sec1">
    <div class="con1 w-container">
      <div class="div-login">
        <div class="form-login w-form">
          <form id="frmLogin" name="frmLogin" data-name="Email Form" class="form-log w-clearfix">
          	<input type="submit" value="Login" data-wait="Please wait..." class="submit-log w-button">
          	<input type="text" class="tf-log2 w-input" maxlength="256" name="txtID1" data-name="Name" placeholder="Username" id="txtID1">
          	<input type="password" class="tf-log1 w-input" maxlength="256" name="txtPW23" data-name="Email" placeholder="Password" id="txtPW23">
          </form>
           <span id="token" class="tf-2" style="color: #f00;    line-height: 40px; width: auto; float:right; margin-right: 15px;"></span>
         <!--  <div class="w-form-done">
            <div>Thank you! Your submission has been received!</div>
          </div>
          <div class="w-form-fail">
            <div>Oops! Something went wrong while submitting the form.</div>
          </div> -->
        </div>
      </div><img src="assest_login/images/logo.png?v=<?=$cache_v;?>" width="340" srcset="assest_login/images/logo.png?v=<?=$cache_v;?> 500w, assest_login/images/logo.png?v=<?=$cache_v;?> 800w, assest_login/images/logo.png?v=<?=$cache_v;?> 1040w" sizes="(max-width: 479px) 100vw, 340px" alt="" class="img-logo"></div>
  </div>
  <div class="sec2">
    <div class="con2 w-container">
      <nav id="main_menu">
        <ul>
          <li class="active"><a href="#">HOME</a></li>
          <li><a href="#"> SPORT </a></li>
          <li><a href="#">LOTTO</a></li>
          <li><a href="#">CASINO</a></li>
          <li><a href="#">SLOT</a></li>
        </ul>
      </nav>
      <img src="assest_login/images/menubar.png?v=<?=$cache_v;?>" srcset="assest_login/images/menubar.png?v=<?=$cache_v;?> 500w, assest_login/images/menubar.png?v=<?=$cache_v;?> 789w" sizes="(max-width: 767px) 100vw, (max-width: 991px) 728px, 789px" alt="" class="image">
      <div class="div32"><img src="assest_login/images/bannerMobile.png?v=<?=$cache_v;?>" width="252" alt=""></div>
      <div class="div31 w-clearfix">
        <div class="div2-2">
          <div data-animation="slide" data-duration="500" data-infinite="1" data-delay="4000" data-autoplay="1" class="slider w-slider">
            <div class="mask w-slider-mask">
              <div class="sli1 w-slide"><img src="assest_login/images/banner3.png?v=<?=$cache_v;?>" srcset="assest_login/images/banner3.png?v=<?=$cache_v;?> 500w, assest_login/images/banner3.png?v=<?=$cache_v;?> 550w" sizes="(max-width: 479px) 100vw, 588px" alt="" class="img-sli"></div>
              <div class="sli2 w-slide"><img src="assest_login/images/banner2.png?v=<?=$cache_v;?>" srcset="assest_login/images/banner2.png?v=<?=$cache_v;?> 500w, assest_login/images/banner2.png?v=<?=$cache_v;?> 550w" sizes="(max-width: 479px) 100vw, 588px" alt="" class="img-sli"></div>
              <div class="w-slide"><img src="assest_login/images/banner1.png?v=<?=$cache_v;?>" srcset="assest_login/images/banner1.png?v=<?=$cache_v;?> 500w, assest_login/images/banner1.png?v=<?=$cache_v;?> 549w" sizes="(max-width: 479px) 100vw, 588px" alt="" class="img-sli"></div>
            </div>
            <div class="la w-slider-arrow-left"></div>
            <div class="ra w-slider-arrow-right"></div>
            <div class="sli-nav w-slider-nav w-round"></div>
          </div>
        </div>
      </div>
      <div class="div2">
        <div class="div21 w-clearfix">
          <div class="div23 w-clearfix"><img src="assest_login/images/icon_casino.png?v=<?=$cache_v;?>" alt="" class="image-3"><img src="assest_login/images/button_casino.png?v=<?=$cache_v;?>" alt="" class="image-2"></div>
          <div class="div22 w-clearfix"><img src="assest_login/images/icon_sport.png?v=<?=$cache_v;?>" alt="" class="image-3"><img src="assest_login/images/button_sport.png?v=<?=$cache_v;?>" alt="" class="image-2"></div>
          <div class="div23 w-clearfix"><img src="assest_login/images/icon_lotto.png?v=<?=$cache_v;?>" alt="" class="image-3"><img src="assest_login/images/button_lotto.png?v=<?=$cache_v;?>" alt="" class="image-2"></div>
          <div class="div23 w-clearfix"><img src="assest_login/images/icon_slot.png?v=<?=$cache_v;?>" alt="" class="image-3"><img src="assest_login/images/button_slot.png?v=<?=$cache_v;?>" alt="" class="image-2"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="sec3">
    <div class="con3 w-container"><img src="assest_login/images/icon_Bank.png?v=<?=$cache_v;?>" alt="" class="image-4"></div>
  </div>
  <!-- <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.4.1.min.220afd743d.js?site=5e7af8505e9f117656f66bdb" type="text/javascript" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script> -->
  <script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
  <script src="assest_login/js/webflow.js" type="text/javascript"></script>
  <script src="assest_login/js/index.js?v=<?=time();?>" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>