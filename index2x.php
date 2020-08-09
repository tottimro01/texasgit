<?
require('inc/conn.php');
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
require("/home/ohoking/domains/texasbetx.com/public_html/admin_lang/export/lang_member_".$lang.".php");
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


$arr_ok = array();
$sql_arr=sql_query("select * from bom_tb_lotto_ok  where lot_zone!=1  and ok_date='$_GET[d]'");
while($rs_arr=sql_fetch($sql_arr)){
  $arr_ok[$rs_arr['lot_zone']][$rs_arr['lot_rob']] = $rs_arr;
}

$rs_last_18 = sql_array("select * from bom_tb_lotto_ok  where lot_zone=18 and o_number != ''  and ok_date='$_GET[d]' order by ok_id desc limit 1");
//print_r($rs_last_18);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title><?=$app_title;?></title>
  <link href="/assets/bootstrap/css/bootstrap.min.css?v=7ab95db" rel="stylesheet" type="text/css">
  <link href="/assets/css/style.css?v=<?=time()?>" rel="stylesheet" type="text/css">
 <link href="/assets/fonts/xmen/stylesheet.css?v=7ab95db" rel="stylesheet">

 <!-- <link rel="apple-touch-icon" sizes="57x57" href="/assets/logo/apple-icon-57x57.png">
 <link rel="apple-touch-icon" sizes="60x60" href="/assets/logo/apple-icon-60x60.png">
 <link rel="apple-touch-icon" sizes="72x72" href="/assets/logo/apple-icon-72x72.png">
 <link rel="apple-touch-icon" sizes="76x76" href="/assets/logo/apple-icon-76x76.png">
 <link rel="apple-touch-icon" sizes="114x114" href="/assets/logo/apple-icon-114x114.png">
 <link rel="apple-touch-icon" sizes="120x120" href="/assets/logo/apple-icon-120x120.png">
 <link rel="apple-touch-icon" sizes="144x144" href="/assets/logo/apple-icon-144x144.png">
 <link rel="apple-touch-icon" sizes="152x152" href="/assets/logo/apple-icon-152x152.png">
 <link rel="apple-touch-icon" sizes="180x180" href="/assets/logo/apple-icon-180x180.png">
 <link rel="icon" type="image/png" sizes="192x192"  href="/assets/logo/android-icon-192x192.png">
 <link rel="icon" type="image/png" sizes="32x32" href="/assets/logo/favicon-32x32.png">
 <link rel="icon" type="image/png" sizes="96x96" href="/assets/logo/favicon-96x96.png">
 <link rel="icon" type="image/png" sizes="16x16" href="/assets/logo/favicon-16x16.png">
 <link rel="manifest" href="/assets/logo/manifest.json">
 <meta name="msapplication-TileColor" content="#ffffff">
 <meta name="msapplication-TileImage" content="/assets/logo/ms-icon-144x144.png"> -->
 <link rel="shortcut icon" type="image/png" href="favicon.ico"/>
 <meta name="theme-color" content="#ffffff">

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
  ยินดีต้อนรับทุกท่านเข้าสู่เว็บ www.texasbetx.com เว็บหวยออนไลน์ที่มาแรงที่สุดในตอนนี้
  </marquee>-->
  
  <div class="container content">
    <h1><img src="/login/mbc/common/images/logo_white.png?v=<?=$cache_img;?>"></h1>
    <div class="row">
      <div class="col-lg-6  offset-lg-3"> 
        
        <form method="POST" action="check_login.php" enctype="application/x-www-form-urlencoded" id="formLogin" class="form-login form-horizontal" role="form">
        <input type="hidden" name="clang" id="clang" value="<?=$lang;?>">
        <input type="hidden" name="ref_url" value="m">
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
  </div>
</div>

<div class="container-fluid">
<div class="box__rusult mb-4">

<!--<div class="row">
  <div class="col-12">
    <div class="card background-card mt-2 last-update">
      <div class="card-body p-2">
        <h1 class="text-danger">จับยี่กี Huay รอบที่ 13
          <div class="badge badge-danger">27 มกราคม 2563</div>
        </h1>
        <div class="card border-danger text-center">
          <div class="card-header border-danger p-2">
            <div class="row">
              <div class="col-6">
                <p class="title-type text-center m-0">สามตัวบน</p>
              </div>
              <div class="col-6">
                <p class="title-type text-center m-0">สองตัวล่าง</p>
              </div>
            </div>
          </div>
          <div class="card-body background-card-body p-1"> 
            <div class="row">
              <div class="col-6 border-right" style="border-right-color: rgb(220, 53, 69) !important;">
                <p class="number text-center m-0">702</p>
              </div>
              <div class="col-6">
                <p class="number text-center m-0">31</p>
              </div>
            </div>
             </div>
        </div>
      </div>
    </div>
  </div>
</div>-->
<?
$rs_lot1 = sql_array("select * from bom_tb_lotto_ok where lot_zone = 1 order by ok_id desc limit 1");
$ed_lot1=@explode(',',$rs_lot1['o_number']);
?>
<div class="row"id="government">
  <div class="col-12">
    <div class="card background-card mt-2">
      <div class="card-body p-2">
        <h1><?=$lang_member[568]?>
          <div class="badge badge-primary"><?=_cvf2(strtotime($rs_lot1["ok_date"]) , 3 , $lang)?></div>
        </h1>
        <div class="card border text-center">
          <div class="card-header p-2">
            <p class="text-center title-type m-0"><?=$lang_member[2196]?></p>
            <p class="number m-0 text-center"><?=($ed_lot1[0]=="" ? "xxxxxx" : $ed_lot1[0])?></p>
          </div>
          <div class="card-body background-card-body p-1">
            <div class="row">
              <div class="col-4 border-right mb-2">
                <p class="title-type text-center m-0"><?=$lang_member[2359]?></p>
                <p class="number text-center m-0"><?=($ed_lot1[2]=="" ? "xxx" : $ed_lot1[2])?>,<?=($ed_lot1[3]=="" ? "xxx" : $ed_lot1[3])?></p>
              </div>
              <div class="col-4 border-right  mb-2">
                <p class="title-type text-center m-0"><?=$lang_member[2360]?></p>
                <p class="number text-center m-0"><?=($ed_lot1[4]=="" ? "xxx" : $ed_lot1[4])?>,<?=($ed_lot1[5]=="" ? "xxx" : $ed_lot1[5])?></p>
              </div>
              <div class="col-4  mb-2">
                <p class="title-type text-center m-0"><?=$lang_member[2361]?></p>
                <p class="number text-center m-0"><?=($ed_lot1[1]=="" ? "xx" : $ed_lot1[1])?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row" id="thaiStock">
  <div class="col-12">
    <div class="card background-card mt-2">
      <div class="card-body p-2">
        <h1><?=$lang_member[1093]?>
          <div class="badge badge-primary"><?=_cvf2(strtotime($_GET[d]) , 3 , $lang)?></div>
        </h1>
        <?
        $rs_lot2_1 = $arr_ok[2][1];
        $ed_lot2_1=@explode(',',$rs_lot1['o_number']);
        ?>
        <div class="mb-2">
          <div class="card border text-center">
            <h5 class="card-header">
              <p class="title-type m-0"><?=$lang_member[2362]?></p>
            </h5>
            <div class="card-body  background-card-body  p-1">
              <div class="row">
                <div class="col-6 border-right border-secondary">
                  <p class="title-type text-center m-0"><?=$lang_member[2363]?></p>
                  <p class="number text-center m-0"><?=($ed_lot2_1[0]=="" ? "xxx" : $ed_lot2_1[0])?></p>
                </div>
                <div class="col-6">
                  <p class="title-type text-center m-0"><?=$lang_member[2361]?></p>
                  <p class="number text-center m-0"><?=($ed_lot2_1[1]=="" ? "xx" : $ed_lot2_1[1])?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?
        $rs_lot2_2 = $arr_ok[2][2];
        $ed_lot2_2=@explode(',',$rs_lot1['o_number']);
        ?>
        <div class="mb-2">
          <div class="card border text-center">
            <h5 class="card-header">
              <p class="title-type m-0"><?=$lang_member[2364]?></p>
            </h5>
            <div class="card-body  background-card-body  p-1">
              <div class="row">
                <div class="col-6 border-right border-secondary">
                  <p class="title-type text-center m-0"><?=$lang_member[2363]?></p>
                  <p class="number text-center m-0"><?=($ed_lot2_2[0]=="" ? "xxx" : $ed_lot2_2[0])?></p>
                </div>
                <div class="col-6">
                  <p class="title-type text-center m-0"><?=$lang_member[2361]?></p>
                  <p class="number text-center m-0"><?=($ed_lot2_2[1]=="" ? "xx" : $ed_lot2_2[1])?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?
        $rs_lot2_3 = $arr_ok[2][3];
        $ed_lot2_3=@explode(',',$rs_lot1['o_number']);
        ?>
        <div class="mb-2">
          <div class="card border text-center">
            <h5 class="card-header">
              <p class="title-type m-0"><?=$lang_member[2365]?></p>
            </h5>
            <div class="card-body  background-card-body  p-1">
              <div class="row">
                <div class="col-6 border-right border-secondary">
                  <p class="title-type text-center m-0"><?=$lang_member[2363]?></p>
                  <p class="number text-center m-0"><?=($ed_lot2_3[0]=="" ? "xxx" : $ed_lot2_3[0])?></p>
                </div>
                <div class="col-6">
                  <p class="title-type text-center m-0"><?=$lang_member[2361]?></p>
                  <p class="number text-center m-0"><?=($ed_lot2_3[1]=="" ? "xx" : $ed_lot2_3[1])?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?
        $rs_lot2_4 = $arr_ok[2][4];
        $ed_lot2_4=@explode(',',$rs_lot1['o_number']);
        ?>
        <div class="mb-2">
          <div class="card border text-center">
            <h5 class="card-header">
              <p class="title-type m-0"><?=$lang_member[2366]?></p>
            </h5>
            <div class="card-body  background-card-body  p-1">
              <div class="row">
                <div class="col-6 border-right border-secondary">
                  <p class="title-type text-center m-0"><?=$lang_member[2363]?></p>
                  <p class="number text-center m-0"><?=($ed_lot2_4[0]=="" ? "xxx" : $ed_lot2_4[0])?></p>
                </div>
                <div class="col-6">
                  <p class="title-type text-center m-0"><?=$lang_member[2361]?></p>
                  <p class="number text-center m-0"><?=($ed_lot2_4[1]=="" ? "xx" : $ed_lot2_4[1])?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
         </div>
    </div>
  </div>
</div>
<div class="row" id="foreignStock">
<div class="col-12">
  <div class="card background-card mt-2">
    <div class="card-body p-2">
      <h1> หวยหุ้นต่างประเทศ
        <div class="badge badge-primary"><?=_cvf2(strtotime($_GET[d]) , 3 , $lang)?></div>
      </h1>
      <!--block foreignStock -->
      <div class="row no-gutters"> 
        <? for($zone_i=3;$zone_i<=17;$zone_i++){  
              $nz = $lot_zone_bet[$zone_i]; 
              if($nz<=1){
                $rob_i = 1;
                $rs =  $arr_ok[$zone_i][$rob_i]; 
                $enum=explode(',',$rs[o_number]);
                ?>
              <div class="mb-2 col-12"> 
              <div class="card border text-center">
                <h5 class="card-header">
                  <p class="title-type m-0">
                    <?=$lang_g['lotZone'][$zone_i]?>
                     </p>
                </h5>
                <div class="card-body background-card-body">
                  <div class="row no-gutters">
                    <div class="col-6 border-right border-secondary">
                      <p class="title-type text-center"><?=$lang_member[2363]?></p>
                      <p
                              class="number text-center"
                            ><?=($enum[0]=="" ? "xxx" : $enum[0])?></p>
                    </div>
                    <div class="col-6">
                      <p class="title-type text-center"><?=$lang_member[2361]?></p>
                      <p
                              class="number text-center"
                            ><?=($enum[1]=="" ? "xx" : $enum[1])?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
                <?
              }else{ 
                for($zr=1;$zr<=$nz;$zr++){
                  if($zr%2==0){
                    $p = "pl-1";
                  }else{
                    $p = "pr-1";
                  }
                  $rs =  $arr_ok[$zone_i][$zr]; 
                  $enum=explode(',',$rs[o_number]);
                ?>
                  <div class="mb-2 col-6 <?=$p?>"> 
                    <div class="card border text-center">
                      <h5 class="card-header">
                        <p class="title-type m-0">
                          <?=$lang_g['lotZone'][$zone_i].$lang_g['lotrob'][$zr]?>
                           </p>
                      </h5>
                      <div class="card-body background-card-body">
                        <div class="row no-gutters">
                          <div class="col-6 border-right border-secondary">
                            <p class="title-type text-center"><?=$lang_member[2363]?></p>
                            <p
                                    class="number text-center"
                                  ><?=($enum[0]=="" ? "xxx" : $enum[0])?></p>
                          </div>
                          <div class="col-6">
                            <p class="title-type text-center"><?=$lang_member[2361]?></p>
                            <p
                                    class="number text-center"
                                  ><?=($enum[1]=="" ? "xx" : $enum[1])?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                <?
                }
              }

        ?>
            
            
        <? } ?>
             </div>
          <!--block foreignStock--> 
        </div>
      </div>
    </div>
  </div>
  <div class="row" id="yeekee">
    <div class="col-12">
      <div class="card background-card mt-2">
        <div class="card-body p-2">
          <h1><?=$lang_member[686];?>
            <div class="badge badge-primary"><?=_cvf2(strtotime($_GET[d]) , 3 , $lang)?></div>
          </h1>      
          
          <div class="navigation-yeekee-layout clearlayout">
            <div class="text-center" v-bind:class="{'active' : (type == 1)}">
              <div v-on:click="handleOnClickViewType(1)"><?=$lang_member[2367]?></div>
            </div>
            <div class="text-center" v-bind:class="{'active' : (type == 2)}">
              <div v-on:click="handleOnClickViewType(2)"><?=$lang_member[2368]?></div>
            </div>
          </div>
          <template v-if="result_type == 1">
          
          <? 
          for($rob_i=1;$rob_i<=44;$rob_i++){  

            $rs =  $arr_ok[$zone_i][$rob_i]; 
            $enum=explode(',',$rs[o_number]);

            ?>
            <div class="mb-2 yeekee-item-list item-list-number-<?=($rob_i+160)?>"<? if($rob_i==$rs_last_18["lot_rob"]){ ?> v-bind:class="{'single' : (item == 0 || item == <?=($rob_i+160)?>)}"<? }else{ ?> v-bind:class="{'multiple' : (type == 1),'single' : (item == <?=($rob_i+160)?>)}"<? } ?>>
            
              <div class="card border text-center">
                <h5 class="card-header">
                  <p class="title-type m-0"><?=$lang_member[686];?> <?=$lang_member[688]?> <?=$rob_i?></p>
                </h5>
                <div class="card-body background-card-body  p-1">
                  <div class="row">
                    <div class="col-6 border-right border-secondary">
                      <p class="title-type text-center m-0"><?=$lang_member[2363]?></p>
                      
                      <p class="number text-center m-0"> <?=($enum[0]=="" ? "xxx" : $enum[0])?> </p>
                       </div>
                    <div class="col-6">
                      <p class="title-type text-center m-0"><?=$lang_member[2361]?></p>
                      
                      <p class="number text-center m-0"> <?=($enum[1]=="" ? "xx" : $enum[1])?> </p>
                       </div>
                  </div>
                </div>
              </div>
            </div>
            <? } ?>

            <? 
          for($rob_i=45;$rob_i<=88;$rob_i++){  

            $rs =  $arr_ok[$zone_i][$rob_i]; 
            $enum=explode(',',$rs[o_number]);

            ?>
            <div class="mb-2 yeekee-item-list item-list-number-<?=($rob_i+336)?>"<? if($rob_i==$rs_last_18["lot_rob"]){ ?> v-bind:class="{'single' : (item == 0 || item == <?=($rob_i+336)?>)}"<? }else{ ?> v-bind:class="{'multiple' : (type == 1),'single' : (item == <?=($rob_i+336)?>)}"<? } ?>>
            
              <div class="card border text-center">
                <h5 class="card-header">
                  <p class="title-type m-0"><?=$lang_member[686];?> <?=$lang_member[688]?> <?=$rob_i?></p>
                </h5>
                <div class="card-body background-card-body  p-1">
                  <div class="row">
                    <div class="col-6 border-right border-secondary">
                      <p class="title-type text-center m-0"><?=$lang_member[2363]?></p>
                      
                      <p class="number text-center m-0"> <?=($enum[0]=="" ? "xxx" : $enum[0])?> </p>
                       </div>
                    <div class="col-6">
                      <p class="title-type text-center m-0"><?=$lang_member[2361]?></p>
                      
                      <p class="number text-center m-0"> <?=($enum[1]=="" ? "xx" : $enum[1])?> </p>
                       </div>
                  </div>
                </div>
              </div>
            </div>
            <? } ?>
            
          </template>

            <div class="yeekee-number-button clearlayout" v-if="result_type == 1 && type == 2">
              
          <? 
          for($rob_i=1;$rob_i<=44;$rob_i++){  
            ?>
                <div> 
                <button<? if($rob_i==$rs_last_18["lot_rob"]){ ?> class="active"<? }else{ ?> v-bind:class="{'active' : (item == <?=($rob_i+160)?>)}"<? } ?> v-on:click="handleOnClickNumberYeekeeResult(<?=($rob_i+160)?>)"><?=$rob_i?></button>
                </div>
             <? } ?> 


             <? 
          for($rob_i=45;$rob_i<=88;$rob_i++){  
            ?>
                <div> 
                <button<? if($rob_i==$rs_last_18["lot_rob"]){ ?> class="active"<? }else{ ?> v-bind:class="{'active' : (item == <?=($rob_i+336)?>)}"<? } ?> v-on:click="handleOnClickNumberYeekeeResult(<?=($rob_i+336)?>)"><?=$rob_i?></button>
                </div>
             <? } ?> 
              
              
               
            </div>

     


          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="/assets/bootstrap/js/popper.min.js"></script>
<script src="/assets/js/vue.min.js"></script>
<script>
var app2 = new Vue({
  el: '#yeekee',
  data: {
    type : 2,
    item : 0,
    result_type : 1
  },
  methods : {
    handleOnClickYeekeeType(result_type){
        this.result_type = result_type;
        this.item = 0;
    },
    handleOnClickViewType(type){
        this.type = type
        this.item = 0;
    },
    handleOnClickNumberYeekeeResult(item){
      this.item = item
    }
  }
})
</script>

  </div>

  <!-- Mainly scripts -->
  <script type="text/javascript" src="/assets/js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="/assets/bootstrap/js/bootstrap.js"></script>
  <!-- compile from webpack -->
  <script src="/assets/components/jquery.nodoubletapzoom/jquery.nodoubletapzoom.js"></script>
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
  <script src="/assets/components/formvalidation/formValidation.min.js"></script>
  <script src="/assets/components/formvalidation/framework/bootstrap.min.js"></script>
  <script src="/assets/components/formvalidation/language/en_US.js"></script>
  <script src="/assets/components/formvalidation/language/th_TH.js"></script>

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
  $(function(){
    $(document).on('submit', '#formLogin', function(event) {
      event.preventDefault();
      var form = this;
      var fdata = new FormData(form);
      $.ajax({
        url: form.action,
        type: form.method,
        dataType: 'html',
        data: fdata,
        contentType: false,
        processData: false,
        beforeSend: function(){
          $('#token').hide();
              $(form).find('fieldset').attr('disabled', 'disabled');
        }
      })
      .done(function(response){
        $("#token").html(response);
        if(typeof success == 'undefined' || success != 1)
          $('#token').show();
      })
      .fail(function(){
        $("#token").html('Something went wrong! plaese try again.');
        $('#token').show();
        // alert('Something went wrong! plaese try again.');
      })
      .always(function(){
            $(form).find('fieldset').removeAttr('disabled');
      });
    });
    //   var dd;
    //   if(dd = document.getElementById('changeLang')){
    //   // $.fn.selectpicker.Constructor.BootstrapVersion = '4';
    //   $(dd).selectpicker({
    //     width: 'fit',
    //     styleBase: 'nav-link bg-transparent',
    //   });
    //   $(dd).show();
    //   $(dd).on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
    //     let urlToGo = e.target[clickedIndex].value;
    //     window.location.href = urlToGo;
    //   });
    // }
  });
  
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
