<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('../inc/conn.php');
require('../inc/function.php');

//require("../lang/member_lang.php");
if($_GET['u']!=""){
$rs_aff = sql_array("select * from bom_tb_member where m_user_set = '$_GET[u]'");
$ex_ridf=explode('*',$rs_aff['m_agent_id']);
	}else{
$rs_aff = sql_array("select * from bom_tb_member where m_id = '$_GET[ref]'");
$ex_ridf=explode('*',$rs_aff['m_agent_id']);
}
		
  if($_SERVER['HTTP_REFERER'] != "")  // หา url ของเว็บที่กดมาหน้านี้ เพื่อน redirect  กลับตอน สมัครสำเร็จ
  {
    $_SESSION["ref"]  = $_SERVER['HTTP_REFERER'];
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <link rel="icon" href="../favicon.ico">
  <TITLE><?=$app_title;?></TITLE>
  
  <meta name="Description" content="เว็บหวย ดีที่สุดของไทย จ่ายไว ลดสูง30% จ่ายสูงสุด550">
  <meta name="KeyWords" content="<?=$app_name;?> หวยหุ้น,หวยหุ้นไทย,เลขหุ้น,หวยออนไลน์ หวยรัฐบาล แทงหวย ซื้อหวย">
  <meta itemprop="description" content="ครบทุกหวย หวยไทย หวยต่างประเทศ <?=$site_member[0];?>">
  <meta name="copyright" content="<?=$site_member[0];?>" >
  <meta name="author" content="<?=$app_name;?> เว็บหวยออนไลน์">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <meta itemprop="name" content="เว็บหวย ดีที่สุดของไทย จ่ายไว ลดสูง30% จ่ายสูงสุด550">
  <meta itemprop="description" content="ครบทุกหวย หวยไทย หวยต่างประเทศ <?=$site_member[0];?>">
  <meta itemprop="image" content="<?=$hostserver;?>.com/img/banner_afv2.jpg">     
  
  <meta property="og:title" content="เว็บหวย ดีที่สุดของไทย จ่ายไว ลดสูง30% จ่ายสูงสุด550">
  <meta property="og:description" content="ครบทุกหวย หวยไทย หวยต่างประเทศ <?=$site_member[0];?>">
  <meta property="og:image" content="<?=$hostserver;?>.com/img/banner_afv2.jpg">
  <meta property="og:url" content="<?=$hostserver;?>/r/?ref=<?=$_GET[ref]?>">
  <meta property="og:site_name" content="<?=$app_name;?>">
  <meta property="og:type" content="article">
  <meta property="article:author" content="https://www.facebook.com/<?=$app_name;?>">
  <meta property="fb:app_id" content="1610990855657783">
 
  <link rel="image_src" type="image/jpeg" href="<?=$site_member[0];?>/img/banner_afv2.jpg">
  <link rel="stylesheet" href="regis.css?v=1111">
  <link rel="stylesheet" href="style.css?v=1111">
  <link rel="stylesheet" href="http://<?=$site_abc[0];?>/assets/lib/bootstrap/4.3.1/css/bootstrap.min.css" />
  <link rel="stylesheet" href="fontawesome/5.11.2/css/all.css" />
  <link href="https://fonts.googleapis.com/css?family=Kanit:300,400&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="component/jquery-confirm/css/jquery-confirm.min.css" />
  <script type="text/javascript" src="component/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="component/jquery-confirm/js/jquery-confirm.min.js"></script>
  <script type="text/javascript" src="component/jquery-confirm/js/jquery-confirm-defaults.js"></script>

  <script type="text/javascript" >

    $(document).on('input', 'input[data-num="numeric"]', function(event) {
      event.preventDefault();
      var val = $.trim($(this).val()); 
      val = val.replace(/[^0-9]/g, '');
    
      $(this).val(val); 
      // console.log(this)
    });

  </script>
</head>
<body>
  <!-- <style>
  	
  </style> -->
  <div class="pt-2 topbar-bg">
    <div class="container">
      <div class="row">
        <div class="mx-auto col-md-8 col-lg-6">
          <div class="position-relative">
            <div class="" style="width: 130px;">
              <img src="http://<?=$site_abc[0];?>/assets/img/logo.png" class="img-logo w-100">
            </div>

            <a href="<?=$hostserver;?>" class="text-white position-absolute font-kanit" style="top: 10px; right: 0;">
              <i class="fas fa-sign-in-alt mr-1"></i><span>เข้าสู่ระบบ</span>
            </a>
          </div>
        </div>
      </div>
      
    </div>
  </div>
  
  <div class="">
    <div class="container">
            <?
		if($_GET['u']!=""){
$rs_af = sql_array("select * from bom_tb_member where m_user_set = '$_GET[u]'");
	}else{
$rs_af = sql_array("select * from bom_tb_member where m_id = '$_GET[ref]'");
	}
			
		if($rs_af["m_id"]!=""){
			
			$rs_ag = sql_array("select * from bom_tb_agent where r_id = '$rs_af[r_id]'");
			#$ex_rida=explode('*',$rs_ag['r_agent_id']);
###################Z
				$sql11="select m_id from  bom_tb_member where r_id = '$rs_af[r_id]' and m_user like '%".$rs_ag['r_user']."z%'";
				$num2=sql_num($sql11);
				$user = $rs_ag['r_user']."z".sprintf("%04d",($num2+1));
				
				
###################Z
			
			if($num2>9998){
			$sql12="select m_id from  bom_tb_member where r_id = '$rs_af[r_id]' and m_user like '%".$rs_ag['r_user']."x%'";
			$num3=sql_num($sql12);
			$user = $rs_ag['r_user']."x".sprintf("%04d",($num3+1));
			
				}
			if($num3>9998){
			$sql13="select m_id from  bom_tb_member where r_id = '$rs_af[r_id]' and m_user like '%".$rs_ag['r_user']."c%'";
			$num4=sql_num($sql13);
			$user = $rs_ag['r_user']."c".sprintf("%04d",($num4+1));
			
				}
				
			if($num4>9998){
			$sql14="select m_id from  bom_tb_member where r_id = '$rs_af[r_id]' and m_user like '%".$rs_ag['r_user']."v%'";
			$num5=sql_num($sql14);
			$user = $rs_ag['r_user']."v".sprintf("%04d",($num5+1));
			
				}
		#		echo $user;
		?>
    <div class="row">
      <div class="mx-auto col-md-8 col-lg-6">
        <div style="margin-top: -80px;">
          <div id="ccontent" class="contentBox">
            <h3 class="title text-white mb-3 font-kanit font-weight-normal">สมัครสมาชิก</h3>
            <div class="bg-light px-4 py-4 formRegisBox">
              <div class="pt-3">
                <form method="post">

                  <label class="sr-only" for="tphone">เบอร์โทรศัพท์</label>
                  <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="fas fa-mobile-alt"></i></div>
                    </div>
                    <input name="tphone" type="text" class="txt form-control control-oho no-outline" id="tphone" size="15" maxlength="10" required data-num="numeric" placeholder="เบอร์โทรศัพท์" />
                  </div>

                  <label class="sr-only" for="tpass">รหัสผ่าน</label>
                  <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="fas fa-unlock"></i></div>
                    </div>
                    <input name="tpass" type="password" class="txt form-control control-oho no-outline" id="tpass" maxlength="10" required placeholder="รหัสผ่าน" />
                  </div>

                  <label class="sr-only" for="tpassc">ยืนยันรหัสผ่าน</label>
                  <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="fas fa-lock"></i></div>
                    </div>
                    <input name="tpassc" type="password" class="txt form-control control-oho no-outline" id="tpassc" maxlength="10" required placeholder="ยืนยันรหัสผ่าน" />
                  </div>

                  <label class="sr-only" for="tbank">ธนาคาร</label>
                  <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="fas fa-university"></i></div>
                    </div>
                    <select class="txt custom-select control-oho no-outline" name="tbank" id="tbank">
                      <option value="">- กรุณาเลือกธนาคาร -</option>
                      <? for($x=1;$x<=count($ab_bank);$x++){?>
                        <option value="<?=$x;?>" <? if($re[m_b_bank]==$x){echo'selected="selected"';}?>>
                        <?=$ab_bank[$x];?>
                        </option>
                      <? }?>
                    </select>
                  </div>

                  <label class="sr-only" for="tbcode">เลขบัญชี</label>
                  <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="fas fa-money-check-alt"></i></div>
                    </div>
                    <input name="tbcode" type="text" class="txt form-control control-oho no-outline" id="tbcode" maxlength="10" required data-num="numeric" placeholder="เลขบัญชี" />
                  </div>

                  <!-- <label class="sr-only" for="tbname">ชื่อบัญชี</label>
                  <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="fas fa-file-signature"></i></div>
                    </div>
                    <input name="tbname" type="text" class="txt form-control control-oho no-outline" id="tbname" maxlength="20" required placeholder="ชื่อบัญชี" />
                  </div>

                  <label class="sr-only" for="tbpass">รหัสลับ 4 หลัก</label>
                  <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="fas fa-key"></i></div>
                    </div>
                    <input name="tbpass" type="text" class="txt  form-control control-oho no-outline" id="tbpass" size="10" maxlength="4" required data-num="numeric" placeholder="รหัสลับ 4 หลัก" />
                  </div> -->

                  <!-- <div class="input-wrapper">
                    <span class="lb">เบอร์โทร : </span>
                    <span class="ip">
                      <input name="tphone" type="text" class="txt" id="tphone" size="15" maxlength="10" required data-num="numeric">
                    </span>
                  </div> -->
<!-- 
                  <div class="input-wrapper">
                    <span class="lb">รหัสผ่าน : </span>
                    <span class="ip"><input name="tpass" type="password" class="txt" id="tpass" maxlength="10" required></span>
                  </div>

                  <div class="input-wrapper">
                    <span class="lb">ยืนยันรหัสผ่าน : </span>
                    <span class="ip"><input name="tpassc" type="password" class="txt" id="tpassc" maxlength="10" required></span>
                  </div>

                  <div class="input-wrapper">
                    <span class="lb">ธนาคาร : </span>
                    <span class="ip">
                      <select class="txt" name="tbank" id="tbank">
                          <option value="">-----</option>
                        <? for($x=1;$x<=count($ab_bank);$x++){?>
                            <option value="<?=$x;?>" <? if($re[m_b_bank]==$x){echo'selected="selected"';}?>>
                            <?=$ab_bank[$x];?>
                            </option>
                        <? }?>
                        </select>
                    </span>
                  </div>

                  <div class="input-wrapper">
                    <span class="lb">เลขบัญชี : </span>
                    <span class="ip"><input name="tbcode" type="text" class="txt" id="tbcode" maxlength="10" required data-num="numeric"></span>
                  </div>

                  <div class="input-wrapper">
                    <span class="lb">ชื่อบัญชี : </span>
                    <span class="ip"><input name="tbname" type="text" class="txt" id="tbname" maxlength="20" required></span>
                  </div>

                  <div class="input-wrapper">
                    <span class="lb">รหัสลับ 4 หลัก : </span>
                    <span class="ip"><input name="tbpass" type="text" class="txt" id="tbpass" size="10" maxlength="4" required data-num="numeric"></span>
                  </div> -->

                  <p class="mr-3">
                    <span class="text-danger">*** หากทีมงานเราตรวจสอบแล้วเป็นข้อมูลปลอม ทางเราจะดำเนินการระงับทันที</span>
                  </p>

                  <div class="form-group row">

                    <div id="token" class="mx-auto col-md-8">
                      <button name="b_login" id="b_login" class="btn btn-block control-oho shadow font-kanit" onclick="request_user();">สมัครสมาชิก</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
                
          </div>
        </div>
      </div>
    </div>
		<script>

// $.alert("88");
			function request_user(){
				$("#b_login").attr('disabled' , 'disabled');

	var tpass=$('#tpass').val();
	var tpassc=$('#tpassc').val();
	var tphone=$('#tphone').val();
	var tbank=$('#tbank').val();
	var tbcode=$('#tbcode').val();
	var tbname=$('#tbname').val();
	var tbpass=$('#tbpass').val();
				if( tpass!=""  && tpassc!=""  && tphone!=""  && tbank!=""  && tbcode!=""  && tbname!=""  && tbpass!=""  ){
					$.ajax({
				type: "POST",
				url: "request_user.php",
				data: {"rid":'<?=$rs_ag["r_id"]?>'  ,"fby":'<?=$rs_af["m_id"]?>'},
				dataType:"json",
				timeout: 30000,
				cache: false,	
				beforeSend: function(){
						$("#token").html("<img src='../img/loding.gif' style='opacity:1; margin:auto; display:block;' id='loding-f'>");
				},
				success: function(data){			
					 if(data.status==1){
						 if(data.user!=""){
							 ConfirmRegis(data.user);
						 }else{
							 request_user();
						 }
					 }else if(data.status==2){
						 request_user();
					 }else{
						 location.reload();
					 }
				}
			});	
				}else{
					$('#tpass').val('');
	$('#tpassc').val('');
	$('#tphone').val('');
	$('#tbank').val('');
	$('#tbcode').val('');
	$('#tbname').val('');
	$('#tbpass').val('');

	$("#b_login").removeAttr('disabled');
				}
			}
			function ConfirmRegis(user)
	{		
	$("#b_login").attr('disabled' , 'disabled');

	var tpass=$('#tpass').val();
	var tpassc=$('#tpassc').val();
	var tphone=$('#tphone').val();
	var tbank=$('#tbank').val();
	var tbcode=$('#tbcode').val();
	var tbname=$('#tbname').val();
	var tbpass=$('#tbpass').val();

	
	
	if( tpass!=""  && tpassc!=""  && tphone!=""  && tbank!=""  && tbcode!=""  && tbname!=""  && tbpass!=""  ){
//////////////////////////////////////////////////////////////////////////////////////////////////
	$.ajax({
				type: "POST",
				url: "check_regis.php",
				data: { "tpass":tpass  ,"tpassc":tpassc ,"tphone":tphone ,"tbank":tbank ,"tbcode":tbcode ,"tbname":tbname ,"tbpass":tbpass ,"tuser":user  ,"rid":'<?=$rs_ag["r_id"]?>'  ,"fby":'<?=$rs_af["m_id"]?>'},
				timeout: 30000,
				cache: false,	
				beforeSend: function(){
						$("#token").html("<img src='loding.gif' style='opacity:1; margin:auto; display:block;' id='loding-f'>");
				},
				success: function(data){

          $("#token").html(data); 
					onButtonClick();
				}
			});	
//////////////////////////////////////////////////////////////////////////////////////////////////
			}

	$('#tpass').val('');
	$('#tpassc').val('');
	$('#tphone').val('');
	$('#tbank').val('');
	$('#tbcode').val('');
	$('#tbname').val('');
	$('#tbpass').val('');

	$("#b_login").removeAttr('disabled');
	}
		
		</script>
              <? } //} ?>
    </div>
  </div>
  
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1610990855657783',
      cookie     : true,
      xfbml      : true,
      version    : 'v2.10'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
	
	
function onButtonClick() {
  // Add this to a button's onclick handler
  FB.AppEvents.logEvent("สมัครสมาชิก");
}
    
</script>

<?
// ตรวจสอบว่าเปิดลิงค์จากที่ใด
// ใช้ $_SERVER['HTTP_USER_AGENT'], $_SERVER['HTTP_REFERER']

//รองรับ
// facebook 
// - desktop -> รองรับทั้ง โดเมนปกติ facebook.com กับมือถือ m.facebook.com
// - app -> รองรับถ้าเปิดผ่าน in app browser ทั้ง android , ios

// line
// - app -> รองรับถ้าเปิดผ่าน in app browser     

// instagram
// - desktop -> รองรับ

// twitter
// - desktop -> รองรับ  
// - app -> ios รองรับ 

// google+
// - desktop รองรับ
// app -> ios รองรับ 


// hangouts
// - app รองรับ android ถ้าเปิดผ่าน in app browser 
  $regex = "((https?|ftp)://)?"; // SCHEME
  $regex .= "([a-z0-9+!*(),;?&=$_.-]+(:[a-z0-9+!*(),;?&=$_.-]+)?@)?"; // User and Pass
  $regex .= "([a-z0-9\-\.]*)\.(([a-z]{2,4})|([0-9]{1,3}\.([0-9]{1,3})\.([0-9]{1,3})))"; // Host or IP
  $regex .= "(:[0-9]{2,5})?"; // Port
  $regex .= "(/([a-z0-9+$_%-]\.?)+)*/?"; // Path
  $regex .= "(\?[a-z+&\$_.-][a-z0-9;:@&%=+/$_.-]*)?"; // GET Query
  $regex .= "(#[a-z_.-][a-z0-9+$%_.-]*)?"; // Anchor

if(preg_match_all('#(?<protocal>https|http?)?\://(?<pref>(?:m\.)?(?:l\.)?(?:lm\.)?(?:www\.)?(?:plus\.)?(?:plus\.url\.)?)?(?<site>facebook|google|instagram?)(?<subf>(?:\.com)?)#',$_SERVER['HTTP_REFERER'], $result, PREG_PATTERN_ORDER)){
    $agent = $result["pref"][0].$result["site"][0].$result["subf"][0];
}
else if (preg_match_all("/(?<app>Line|line|Facebook|facebook|Facebookexternalhit|facebookexternalhit|Facebot|facebot|MessengerForiOS|FB_IAB|FBAN|FBIOS|FB|Twitterbot|Twitter|twitter|Instagram|instagram?)/", $_SERVER['HTTP_USER_AGENT'], $result, PREG_PATTERN_ORDER))
{
  $agent = $result['app'][0];
}
else if(preg_match("~^$regex$~i", $_SERVER['HTTP_REFERER'], $m)) {
  $agent = parse_url($m[0], PHP_URL_HOST);
}
else if	(preg_match_all('#https?\://(?:t)\.co#',$_SERVER['HTTP_REFERER'], $result, PREG_PATTERN_ORDER)){
   	$agent = "twitter.com";
}else if(preg_match_all('#(?<platform>android-app|ios-app?)?\://(?:com\.google\.?)(?<os>android|ios?)\.talk#',$_SERVER['HTTP_REFERER'], $result, PREG_PATTERN_ORDER)) {
	$agent = "hangouts";
}
else {
  $agent = '';
}

if(!empty($agent)) {
	$agent = strtolower($agent);
	if($agent == "facebookexternalhit" || $agent == "facebot" || $agent == "MessengerForiOS" || $agent == "fb_iab" || $agent == "fban" || $agent == "fbios" || $agent == "fb") {
		$agent = "facebook";
	}else if($agent == "twitterbot") {
		$agent = "twitter";
	}
}
$_SESSION["HTTP_REFERER"] = $agent;
?>

</body>
</html>

<!-- <script>
  
  console.log('<?=$_SESSION["ref"];?>')
</script>
 -->
