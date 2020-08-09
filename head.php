<?
    ob_start(); if (!isset($_SESSION)) { session_start(); } 
    require_once 'lib/Mobile-Detect/Mobile_Detect.php';
    $detect = new Mobile_Detect;
    $cache_v = '00002';

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
    // include 'lang/home_lang.php';
    require("/home/ohoking/domains/texasbetx.com/public_html/w888/admin_lang/export/lang_member_".$lang.".php");
    require "inc/function.php";

?>

<!DOCTYPE html>
<!--  This site was created in Webflow. http://www.webflow.com  -->
<!--  Last Published: Thu Jan 30 2020 07:03:12 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="5e324556012ef44ad77541f0" data-wf-site="5e324556012ef46d9e7541ef">
<head>
  <meta charset="utf-8">
  <title><?=$app_title;?></title>
  <meta content="Webflow" name="generator">
  <meta name="viewport" content="width=1024" />
  <link href="newLogin/css/normalize.css" rel="stylesheet" type="text/css">
  <link href="newLogin/css/webflow.css" rel="stylesheet" type="text/css">
  <link href="newLogin/css/oho88-40d2c3.webflow.css?v=1" rel="stylesheet" type="text/css">
  <!-- [if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js" type="text/javascript"></script><![endif] -->
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="newLogin/images/favicon.ico" rel="shortcut icon" type="image/x-icon">
  <link href="newLogin/images/webclip.png" rel="apple-touch-icon">

   <style>
    @font-face {
        font-family: 'supermarket';
        src: url('newLogin/fonts/supermarket.woff2') format('woff2'),
            url('newLogin/fonts/supermarket.woff') format('woff');
        font-weight: normal;
        font-style: normal;
    }

    ._login
    {

    position: relative;
    }
    .input_login
    {
      position: absolute;
      width: 25%;
      background: transparent;
      border: 0;
      color: #000;
      font-size: 13px;
    }
    
    .input_login:focus
    {
      outline: none;
    }
    
    .login_submit
    {
      position: absolute;
      right: 0;
      top: 0px;
      width: 115px;
      height: 33px;
      cursor: pointer;
      padding-left: 25px;
      color: #001a63;
      /*background-color: red;*/
    }

    ::-webkit-input-placeholder { /* Edge */
      color: #333333ab;
    }
    
    :-ms-input-placeholder { /* Internet Explorer 10-11 */
      color: #333333ab;
    }
    
    ::placeholder {
      color: #333333ab;
    }

input:-webkit-autofill,
input:-webkit-autofill:hover,
input:-webkit-autofill:focus,
input:-webkit-autofill:active {
    -webkit-transition: "color 9999s ease-out, background-color 9999s ease-out";
    -webkit-transition-delay: 9999s;
}
  
    #token
    {
      position: absolute;
      top: 40px;
      color: red;
      font-size: 12px;
    }


.div-block-3
{
  height: 600px;
}


.image-9
{
  display: none;
}

.w-nav-link , .h.w--current
{
    font-size: 20px;
    color: #e2e2e2;
    font-family: 'supermarket';
    padding: 10px 20px;
    position: relative;
}


.w-nav-link.w--current,.w-nav-link:hover {
    color: #ffffff;
    transition-duration: .3s;

}


.w-nav-link.w--current::after , .w-nav-link:hover::after
{
    content: "";
    position: absolute;
    left: 20px;
    right: 20px;
    height: 2px;
    background: white;
    top: 37px;
}
.footer_nav
{
  position: relative;
  margin-top: -55px;
}
.footer_nav .navbar
{
  float: none;
  margin: 0;
  text-align: center;
}

.footer_nav .nav-menu {
    height: 40px;
    float: inherit;
    margin: 0 auto;
}
 
.footer_nav .navbar .container
{
  text-align: center;
  float: none;
  width: auto;
}




  </style>

</head>
<body class="body">
  <div class="sec1">
    <div class="div-block w-clearfix">
      <div class="image _login">
        <img src="newLogin/images/login.png" width="471" alt="">

        <form id="frmLogin" name="frmLogin" method="post" class="loginArea" style="" onsubmit="return false;">
            <span id="token"></span>
            <input type="text" name="l_user" id="txtID1" class="input_login" placeholder="Username" style=" top: 9px; left: 45px;">
            <input type="Password" name="l_pass" id="txtPW23" class="input_login" placeholder="Password" style=" top:9px; left: 220px;">
            <input type="submit" value="Login" class="input_login login_submit">
            <!-- <input type="button" value="ลืมรหัสผ่าน" class="input_login" style="position: absolute; left:185px; bottom: 35px; width: auto;cursor: pointer;"> -->
            <input id="clang" name="clang" type="hidden" value="<?=$lang;?>" />
         <!--    <img src="newLogin/newLogin/images/buttonlogin.png" alt="" style="cursor: pointer;">
            <img src="newLogin/newLogin/images/buttonlogin.png" alt="" style="cursor: pointer;"> -->
        </form margin-bottom: 15px;>


      </div>
      
      <div data-collapse="medium" data-animation="default" data-duration="400" class="navbar w-nav">
        <div class="container w-container">
          <nav role="navigation" class="nav-menu w-nav-menu">
            <a href="index.php?p=index" class="w-nav-link <?=($_GET['p'] == 'index') ? 'w--current' : '' ;?>">Home</a>
            <?php /* ?>
            <a href="register.php?p=register" class="w-nav-link <?=($_GET['p'] == 'register') ? 'w--current' : '' ;?>">Register</a></nav> 
            */?>
          <div class="w-nav-button">
            <div class="w-icon-nav-menu"></div>
          </div>
          <a href="promotion.php?p=promotion" class="w-nav-link <?=($_GET['p'] == 'promotion') ? 'w--current' : '' ;?>">Promotion</a>
          <a href="sport-casino.php?p=sport" class="w-nav-link <?=($_GET['p'] == 'sport') ? 'w--current' : '' ;?>">Sport&amp;Casino</a>
          <a href="contact.php?p=contact" class="w-nav-link <?=($_GET['p'] == 'contact') ? 'w--current' : '' ;?>">Contact</a>
        </div>
      </div><img src="newLogin/images/menu.png" width="537" alt="" class="image-9"></div>

       <div class="div-block-2 w-clearfix">
      <div class="d1"><img src="newLogin/images/small-banner-1.gif" alt=""></div>
      <div class="d2"><img src="newLogin/images/small-banner-2.gif" alt=""></div>
      <div class="d2"><img src="newLogin/images/small-banner-3.gif" alt=""></div>
      <div class="d3"><img src="newLogin/images/small-banner-4.gif" alt=""></div>
    </div>
  </div>