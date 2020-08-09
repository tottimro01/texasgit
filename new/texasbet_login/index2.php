<?
// require('inc/conn.php');
// require('w1/inc/function.php');

//Detect special conditions devices
$iPod    = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
$iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
$iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
$Android = stripos($_SERVER['HTTP_USER_AGENT'],"Android");
$webOS   = stripos($_SERVER['HTTP_USER_AGENT'],"webOS");

//do something with this information
if( $iPod || $iPhone ){
    //browser reported as an iPhone/iPod touch -- do something here
  $_GET[AGENT]=1;
}else if($iPad){
    //browser reported as an iPad -- do something here
  $_GET[AGENT]=1;
}else if($Android){
    //browser reported as an Android device -- do something here
  $_GET[AGENT]=2;
}else if($webOS){
    //browser reported as a webOS device -- do something here
  $_GET[AGENT]=3;
}else{
  // ไม่มี
  $_GET[AGENT]=3;
}
  
if($_GET[AGENT]==3){
 // exit();
    #echo'<center><h1>กรุณาเข้าผ่านมือถือ</h1></center>';
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
$_SESSION['lang'] = $lang;
require("admin_lang/export/lang_member_".$lang.".php");
$lang_months = array($lang_member[1218], $lang_member[1219], $lang_member[1220], $lang_member[1221], $lang_member[1222], $lang_member[1223], $lang_member[1224], $lang_member[1225], $lang_member[1226], $lang_member[1227], $lang_member[1228], $lang_member[1229]);
$lang_months_short = array($lang_member[1230], $lang_member[1231], $lang_member[1232], $lang_member[1233], $lang_member[1234], $lang_member[1235], $lang_member[1236], $lang_member[1237], $lang_member[1238], $lang_member[1239], $lang_member[1240], $lang_member[1241]);
$lang_g['lotZone'][1] = $lang_member[568];
$lang_g['lotZone'][2] = $lang_member[1093];
$lang_g['lotZone'][3] = $lang_member[1094];
$lang_g['lotZone'][4] = $lang_member[1096];
$lang_g['lotZone'][5] = $lang_member[1097];
$lang_g['lotZone'][6] = $lang_member[1098];
$lang_g['lotZone'][7] = $lang_member[1099];
$lang_g['lotZone'][8] = $lang_member[1101];
$lang_g['lotZone'][9] = $lang_member[1102];
$lang_g['lotZone'][10] = $lang_member[1104];
$lang_g['lotZone'][11] = $lang_member[1105];
$lang_g['lotZone'][12] = $lang_member[1106];
$lang_g['lotZone'][13] = $lang_member[1108];
$lang_g['lotZone'][14] = $lang_member[1109];
$lang_g['lotZone'][15] = $lang_member[1110];
$lang_g['lotZone'][16] = $lang_member[1111];
$lang_g['lotZone'][17] = $lang_member[1112];
$lang_g['lotZone'][18] = $lang_member[686];
$lang_g['lotZone'][19] = $lang_member[683];

$lang_g['lotrob'][1] = $lang_member[689];
$lang_g['lotrob'][2] = $lang_member[691];
$lang_g['lotrob'][3] = $lang_member[692];
$lang_g['lotrob'][4] = $lang_member[694];
function _cvf2($strDate, $mode , $lg="th"){

  $month_key = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"); 

  global $lang_months, $lang_months_short;

  $month_full = $lang_months;
  $month_short = $lang_months_short;
  
  $strDate=date("Y-m-d H:i:s",$strDate); // รูปแบบ Y-m-d H:i:s
  $dYear = substr($strDate,0,4);  
  $dMonth = substr($strDate,5,2);
  $dDay = substr($strDate,8,2);
  $dTime = substr($strDate,11,5); 
  $dsecon=substr($strDate,17,2); 
  
  if($dYear < 2550){ $dYear += 543; }
  
  switch($mode){
    case '1':     // วันที่ 12 เดือนสิงหาคม พ.ศ. 2550
      $thMonth = array_combine($month_key, $month_full);  
      $new_date = "วันที่ ".$dDay." เดือน".$thMonth[$dMonth]." พ.ศ.".$dYear ;
    break;
    case '2':     // วันที่ 12 เดือนสิงหาคม พ.ศ. 2550 เวลา 12.30
      $thMonth = array_combine($month_key, $month_full);  
      $new_date = "วันที่ ".$dDay." เดือน".$thMonth[$dMonth]." พ.ศ.".$dYear." เวลา ".$dTime ;
    break;
    
    
    case '3':     // 12 สิงหาคม พ.ศ. 2550
      $thMonth = array_combine($month_key, $month_full);  
      $new_date = $dDay." ".$thMonth[$dMonth]." ".$dYear ;
    break;
    case '4':     // 12 สิงหาคม พ.ศ. 2550 เวลา 12.30
      $thMonth = array_combine($month_key, $month_full);  
      $new_date = $dDay." ".$thMonth[$dMonth]." ".$dYear ." เวลา ".$dTime ;
    break;
    
    case '5':     // 12 ส.ค. 50
      $thMonth = array_combine($month_key, $month_short); 
      $new_date = $dDay." ".$thMonth[$dMonth]." ". substr($dYear,2,2);
    break;
    case '6':     // 12 ส.ค. 50 12.30
      $thMonth = array_combine($month_key, $month_short); 
      $new_date = $dDay." ".$thMonth[$dMonth]." ". substr($dYear,2,2)." ".$dTime;
    break;
    
    
    case '7':     // 12/08/2550
      $new_date = $dDay."/".$dMonth."/".$dYear;
    break;
    case '8':     // 12/08/2550 12.30
      $new_date = $dDay."/".$dMonth."/".$dYear." ".$dTime;
    break;
    
    case '9':     // 12-08-2550
      $new_date = $dDay."-".$dMonth."-".$dYear;
    break;
    case '10':      // 12-08-2550 12.30
      $new_date = $dDay."-".$dMonth."-".$dYear." ".$dTime;
    break;
    
    case '11':      // 12/08/2010
      $new_date = $dDay."/".$dMonth."/".substr($strDate,0,4);
    break;
    case '12':      // 12/08/2010 12.30
      $new_date = $dDay."/".$dMonth."/".substr($strDate,0,4)." ".$dTime;
    break;
    
    case '13':      // 12-08-2010
      $new_date = $dDay."-".$dMonth."-".substr($strDate,0,4);
    break;
    case '14':      // 12-08-2010 12.30
      $new_date = $dDay."-".$dMonth."-".substr($strDate,0,4)." ".$dTime;
    break;
    case '15':      // 12 สิงหาคม พ.ศ. 2550 เวลา 12.30
      $thMonth = array_combine($month_key, $month_full);  
      $new_date = $dDay." ".$thMonth[$dMonth]." ".$dYear ." เวลา ".$dTime.":".$dsecon ;
    break;
  } 
  
  return $new_date;
}
require "inc/function.php";

$res_date = date("Y-m-d", time());
$_GET['d'] = date("d")."-".date("m")."-".date("Y");

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title><?=$app_title;?></title>
  <link href="assets/bootstrap/css/bootstrap.min.css?v=7ab95db" rel="stylesheet" type="text/css">
  <!-- <link href="assets/css/style.css?v=<?=time()?>" rel="stylesheet" type="text/css"> -->
  <link href="assest_login/css/webflow.css?v=<?=$cache_v;?>" rel="stylesheet" type="text/css">
  <link href="assest_login/css/styles.css?v=<?=time()?>" rel="stylesheet" type="text/css">

 <link href="assets/fonts/xmen/stylesheet.css?v=7ab95db" rel="stylesheet">
 

 <!-- <link rel="apple-touch-icon" sizes="57x57" href="assets/logo/apple-icon-57x57.png">
 <link rel="apple-touch-icon" sizes="60x60" href="assets/logo/apple-icon-60x60.png">
 <link rel="apple-touch-icon" sizes="72x72" href="assets/logo/apple-icon-72x72.png">
 <link rel="apple-touch-icon" sizes="76x76" href="assets/logo/apple-icon-76x76.png">
 <link rel="apple-touch-icon" sizes="114x114" href="assets/logo/apple-icon-114x114.png">
 <link rel="apple-touch-icon" sizes="120x120" href="assets/logo/apple-icon-120x120.png">
 <link rel="apple-touch-icon" sizes="144x144" href="assets/logo/apple-icon-144x144.png">
 <link rel="apple-touch-icon" sizes="152x152" href="assets/logo/apple-icon-152x152.png">
 <link rel="apple-touch-icon" sizes="180x180" href="assets/logo/apple-icon-180x180.png">
 <link rel="icon" type="image/png" sizes="192x192"  href="assets/logo/android-icon-192x192.png">
 <link rel="icon" type="image/png" sizes="32x32" href="assets/logo/favicon-32x32.png">
 <link rel="icon" type="image/png" sizes="96x96" href="assets/logo/favicon-96x96.png">
 <link rel="icon" type="image/png" sizes="16x16" href="assets/logo/favicon-16x16.png">
 <link rel="manifest" href="assets/logo/manifest.json">
 <meta name="msapplication-TileColor" content="#ffffff">
 <meta name="msapplication-TileImage" content="assets/logo/ms-icon-144x144.png"> -->
 <link href="assest_login/images/favicon.ico?v=<?=$cache_v;?>" rel="shortcut icon" type="image/x-icon">
 <meta name="theme-color" content="#ffffff">
 <script src="assest_login/js/jquery-3.3.1.min.js"></script>
 <script src="assest_login/js/index2.js?v=<?=time();?>"></script>

 <style type="text/css">
   * {
     font-family: 'Lato',"db_admanrounded_xregular", "open sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
 }
 </style>
  <!-- Ladda style -->
  

  <!-- Scripts -->
  <script>
    window.App = {
      csrfToken: 'gwGJAcMl-95M_jZJLotr1XEJOzap-YHDhG0c',
      jwtToken: '',
    }
    window.Config = { PUSH_KEY: "f429dd33cee0a336aa9b" }
  </script>
  

</head>

<body>
  <div id="app">
    
<div class="box__auth"> 
  <!--<marquee scrollamount="5">
  ยินดีต้อนรับทุกท่านเข้าสู่เว็บ www.wan1991.com เว็บหวยออนไลน์ที่มาแรงที่สุดในตอนนี้
  </marquee>-->
  
  <div class="container content">
    <h1><img src="assest_login/images/logo.png?v=<?=$cache_img;?>"></h1>
    <div class="row">
      <div class="col-lg-6  offset-lg-3"> 
        
        <form method="POST"  id="frmLogin" class="form-login form-horizontal"  onsubmit="return false;">
          <input type="hidden" name="ref_url" id="ref_url" value="<?=$ref_url;?>">
        <input type="hidden" name="clang" id="clang" value="<?=$lang;?>">
        <div class="box__auth-content">
          <div class="row">
            <div class="col-md-12">
              <h2><?=$lang_member[2151]?></h2>
            </div>
          </div>
          <div class="alert alert-danger" role="alert" id="token" style="display: none;">
            
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group"> <input type="text" name="l_user" class="form-control" placeholder="<?=$lang_member[2152]?>" id="l_user" /> </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group"> <input type="password" name="l_pass" class="form-control" placeholder="<?=$lang_member[73]?>" id="l_pass" /> </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12"> 
               </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <button type="submit"><?=$lang_member[2151]?></button>
            </div>
          </div>
          <div class="row">
            <div class="col-12"> 
               </div>
          </div>
          <div class="row">
            <div class="col-md-12 text-right"> 

              <select name="changeLang" id="changeLang" class="btn btn-contact-huay" onchange="window.location.href='?hidSelLang='+this.value">
                    <? foreach ($langList as $key => $value) { ?>
                                  <option<? if($lang==$key){ ?> selected="selected"<? } ?> value="<?=$key;?>"><?=$value;?></div>
                                  <? } ?>
                    <!-- <option<? if($lang=="en"){ ?> selected="selected"<? } ?> value="en">English</div>
                        <option<? if($lang=="cn"){ ?> selected="selected"<? } ?> value="cn">简体中文</div>
                        <option<? if($lang=="th"){ ?> selected="selected"<? } ?> value="th">ภาษาไทย</div>
                        <option<? if($lang=="vn"){ ?> selected="selected"<? } ?> value="vn">Tiếng Việt</div>
                        <option<? if($lang=="la"){ ?> selected="selected"<? } ?> value="la">ພາສາລາວ</div>
                        <option<? if($lang=="km"){ ?> selected="selected"<? } ?> value="km">ភាសាខ្មែរ</div>
                        <option<? if($lang=="mm"){ ?> selected="selected"<? } ?> value="mm">မြန်မာ</div>
                        <option<? if($lang=="id"){ ?> selected="selected"<? } ?> value="id">Indonesian</div>
                        <option<? if($lang=="jp"){ ?> selected="selected"<? } ?> value="jp">日本語</div>
                        <option<? if($lang=="ko"){ ?> selected="selected"<? } ?> value="ko">한국어</div> -->
                  </select>

              <a href="javascript:void(0)" onclick="<? if($_GET[AGENT]==1){ ?>startMyApp()<? }else if($_GET[AGENT]==2){ ?>startMyAppA()<? } ?>" class="btn btn-register-huay"><?=$lang_member[2153]?></a>  </div>
          </div>
        </div>
        </form> </div>
    </div>
    <br />
    <!-- /.modal -->
    <div class="modal" tabindex="-1" id="contact-success" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content bg-transparent">
          <div class="modal-header bg-blueface text-white">
            <h5 class="modal-title" > บันทึกข้อมูลสำเร็จ</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true"  class="text-white">&times;</span> </button>
          </div>
          <div class="modal-body bg-white">
            <h2 class="text-navy text-center">บันทึกข้อมูลสำเร็จ</h2>
          </div>
          <div class="modal-footer bg-white">
            <button type="button" data-dismiss="modal" class="btn btn-blueface"> ปิดหน้าต่าง</button>
          </div>
        </div>
        <!-- /.modal-content --> 
      </div>
      <!-- /.modal-dialog --> 
    </div>
    <!-- /.modal --> 


<div class="row text-center">
  <div class="col-lg-6  offset-lg-3">
    <div class="box__auth-content mx-auto slide">
      <div class="slideshow">
          <div>
            <img src="assest_login/images/Mbg1.jpg" alt="Image One" />
            <p class="controls"><a href="#2" class="next slide-tg">Next 1</a></p>
          </div>
          <div>
            <img src="assest_login/images/Mbg2.jpg" alt="Image Two" />
            <p class="controls"><a href="#1" class="prev slide-tg last">Prev</a> 
             <!--  <a href="#3" class="next">Next 2 </a></p> -->
          </div>
    </div>
    </div>
  </div>

</div>


<?php /* ?>

<div class="row text-center">
  <div class="col-lg-6  offset-lg-3">
    <div class="box__auth-content mx-auto slide">
        <div class="div2-2">
          <div data-animation="slide" data-duration="3500" data-infinite="1" data-delay="4000" data-autoplay="1" class="slider w-slider">
            <div class="mask w-slider-mask">
              <div class="sli1 w-slide" style="transform: translateX(-588px); opacity: 1; transition: transform 500ms ease 0s;">
                <img src="assest_login/images/Mbg1.jpg"  alt="" class="img-sli">
              </div>
              <div class="sli2 w-slide" style="transform: translateX(-588px); opacity: 1; transition: transform 500ms ease 0s;">
                <img src="assest_login/images/Mbg2.jpg"  alt="" class="img-sli">
              </div>
            <!--   <div class="w-slide" style="transform: translateX(-588px); opacity: 1; transition: transform 500ms ease 0s;">
                <img src="assest_login/images/banner1.png?v=00023" alt="" class="img-sli">
              </div> -->
            </div>
            <div class="la w-slider-arrow-left"></div>
            <div class="ra w-slider-arrow-right"></div>
            <div class="sli-nav w-slider-nav w-round"><div class="w-slider-dot" data-wf-ignore=""></div><div class="w-slider-dot w-active" data-wf-ignore=""></div><div class="w-slider-dot" data-wf-ignore=""></div></div>
          </div>
        </div>
    </div>
  </div>

</div> */?>

  </div>
</div>

<script src="assets/bootstrap/js/popper.min.js"></script>
<script src="assets/js/vue.min.js"></script>


  </div>

  <!-- Mainly scripts -->
  <script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="assets/bootstrap/js/bootstrap.js"></script>
  <!-- compile from webpack -->
  <script src="assets/components/jquery.nodoubletapzoom/jquery.nodoubletapzoom.js?v=1"></script>
  <!-- <script src="assest_login/js/webflow.js" type="text/javascript"></script> -->
  <script>
  document.addEventListener('gesturestart', function (e) {
      e.preventDefault();
  });
  $(function() {
        $('.pagewrap').nodoubletapzoom()
  });
    
  window.onscroll = function() {myFunction()};

function myFunction() {
    if (document.body.scrollTop > 250 || document.documentElement.scrollTop > 250) {
       $(".botton-select-category").css("display","block");
    } else {
       $(".botton-select-category").css("display","none");
    }
}
   
  </script>
  <!-- Components -->
  <script src="assets/components/formvalidation/formValidation.min.js?v=1"></script>
  <script src="assets/components/formvalidation/framework/bootstrap.min.js?v=1"></script>
  <script src="assets/components/formvalidation/language/en_US.js?v=1"></script>
  <script src="assets/components/formvalidation/language/th_TH.js?v=1"></script>

  <!-- Inject script -->
  
  
<style >
  .has-error{
    text-align: left;
  }
  .has-error input,.has-error select,.has-error textarea,  .has-error small{
    color: red !important;
  }
  .has-error input,.has-error select,.has-error textarea {
      border: 1px solid red !important;
      color: red !important;
  }
  .has-success input,.has-success select,.has-success textarea,  .has-success small{
    color: green !important;
  }
  .has-success input,.has-success select,.has-success textarea {
      border: 1px solid green !important;
      color: green !important;
  }
  div.box__auth .box__auth-content label, div.box__auth .box__auth-content a {
    font-family: "db_admanrounded_xregular", "open sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
    font-size: 14px;
    color: #1a1a1a;
    line-height: 17px;
}
.form-login input::-webkit-input-placeholder { /* Chrome/Opera/Safari */
  font-family: "db_admanrounded_xregular", "open sans", "Helvetica Neue", Helvetica, Arial, sans-serif;

}
.form-login input::-moz-placeholder { /* Firefox 19+ */
  font-family: "db_admanrounded_xregular", "open sans", "Helvetica Neue", Helvetica, Arial, sans-serif;

}
.form-login input:-ms-input-placeholder { /* IE 10+ */
  font-family: "db_admanrounded_xregular", "open sans", "Helvetica Neue", Helvetica, Arial, sans-serif;

}
.form-login input:-moz-placeholder { /* Firefox 18- */
  font-family: "db_admanrounded_xregular", "open sans", "Helvetica Neue", Helvetica, Arial, sans-serif;

}

  </style>
<script>

  
    function startMyApp()
    {
        document.location = 'wan888://?';
        setTimeout( function()
        {
            if( confirm( '<?=$lang_member[2318];?>'))
            {
                document.location = 'itms-services://?action=download-manifest&url=https://www.appkub.com/ios/WAN888.plist';
            }
        }, 300);
    }

    function startMyAppA()
    {
        document.location = 'https://play.google.com/store/apps/details?id=mvk.anw.tethpiegs';
    }
    </script>


</body>
</html>
<script>
  $(document).ready(function(){
  $('.slideshow div:eq(0) .slide-tg').click();
  // Set the initial state: Hide all but the first slide
  $('.slideshow').find('> div:eq(0)').nextAll().css({'opacity':'0','display':'none'});
  // On click of a controller link...
  $('.controls > a').click(function(event) {
    event.preventDefault();
    // Get the div containing the clicked link...
    var currentslide = $(this).parents('div:first');
    // ... and get the index of that div
    var currentposition = $('.slideshow div').index(currentslide);
    // Use that index to get the slide we'll be fading to
    var nextposition = ($(this).attr('class')=='next') ? currentposition+1 : currentposition-1;

    console.log(currentposition);
    // Fade the current slide out...
    $('.slideshow div:eq('+currentposition+')').animate({opacity: 0}, 250, function() {
      // ... and hide it.
      $('.slideshow div:eq('+currentposition+')').css('display','none');
      // Show the next slide...
      $('.slideshow div:eq('+nextposition+')').css('display','block');
      // ... and fade it in.
      $('.slideshow div:eq('+nextposition+')').animate({opacity: 100}, 3000);
      }
    );

    setTimeout(function(){ 

     $('.slideshow div:eq('+nextposition+') .slide-tg').click();
    }, 8000);
    

  });

  $('.slideshow div:eq(0) .slide-tg').click();

});
</script>