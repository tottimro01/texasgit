<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('../inc/conn.php');
require('../inc/function.php');

//require("../lang/member_lang.php");


$rs_aff = sql_array("select * from bom_tb_member where m_id = '$_GET[ref]'");
$ex_ridf=explode('*',$rs_aff[r_agent_id]);
			
		
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="icon" href="../img/logo.ico">
  <TITLE>::: <? if($ex_ridf[3]==340){ echo "LOTMX"; }else{ echo "OHOBET"; } ?> :::</TITLE>
  
  <meta name="Description" content="เว็บหวย ดีที่สุดของไทย จ่ายไว ลดสูง30% จ่ายสูงสุด550">
  <meta name="KeyWords" content="OHOBET หวยหุ้น,หวยหุ้นไทย,เลขหุ้น,หวยออนไลน์ หวยรัฐบาล แทงหวย ซื้อหวย">
  <meta name="copyright" content="lotzx.com" >
  <meta name="author" content="OHOBET เว็บหวยออนไลน์">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <meta itemprop="name" content="เว็บหวย ดีที่สุดของไทย จ่ายไว ลดสูง30% จ่ายสูงสุด550">
  <meta itemprop="description" content="ครบทุกหวย หวยไทย หวยต่างประเทศ www.lotzx.com">
  <meta itemprop="image" content="http://www.lotzx.com/img/banner_afv2.jpg">     
  
  <meta property="og:title" content="เว็บหวย ดีที่สุดของไทย จ่ายไว ลดสูง30% จ่ายสูงสุด550">
  <meta property="og:description" content="ครบทุกหวย หวยไทย หวยต่างประเทศ www.lotzx.com">
  <meta property="og:image" content="http://www.lotzx.com/img/banner_afv2.jpg">
  <meta property="og:url" content="http://www.lotzx.com/regisOHO/?ref=<?=$_GET[ref]?>">
  <meta property="og:site_name" content="OHOBET">
  <meta property="og:type" content="article">
  <meta property="article:author" content="https://www.facebook.com/OHOBET">
  <meta property="fb:app_id" content="1610990855657783">
  
  <link rel="stylesheet" type="text/css" href="../css/register.css?v=<?=$time_stam;?>">
  <link rel="stylesheet" type="text/css" href="../css/lize.css?v=<?=$time_stam;?>">
  <link rel="stylesheet" type="text/css" href="../css/style_me.css?v=<?=$time_stam;?>">
  <link rel="stylesheet" type="text/css" href="../css/speed.css?v=<?=$time_stam;?>">
  <script type="text/javascript" src="https://js.step98.com/jquery-latest.js"></script>
  <link rel="image_src" type="image/jpeg" href="http://www.lotzx.com/img/banner_afv2.jpg">
  <link rel="stylesheet" href="regis.css">
  <script type="text/javascript" >
    
 // function numberonly2(event){
 //  	var e=window.event?window.event:event;
 //   	var keycode=e.keyCode?e.keyCode:e.which?e.which:e.charCode;

	// if ((keycode>=96 && keycode<=105)||(keycode>=48 && keycode<=57)||(keycode==106 )||(keycode==8 )){
 //    return true;
 //  }else{
	//  return false;
	// }
// }


$(document).on('input', 'input[data-num="numeric"]', function(event) {
  event.preventDefault();
  var val = $.trim($(this).val()); 
  val = val.replace(/[^0-9]/g, '');

  $(this).val(val); 
  console.log(this)
});

</script>
</head>
<body>
  <!-- <style>
  	
  </style> -->

    <div class="w-section sec-head">
    <div class="w-container">
      <div class="w-row">
        <div class="logo">
          <img src="../img/logo.png" width="160" height="47" class="img-logo">
        </div>
        <div class="w-col w-col-9">
            <!-- <div class="lang">
              <select name="l_lang" class="demoselect" id="l_lang" onChange="parent.location.href='?lang='+this.value">
                  <option value="en"  >English</option>
                  <option value="ch" >繁體中文</option>
                  <option value="cs" >简体中文</option>
                  <option value="th"   selected>ภาษาไทย</option>
                  <option value="vn" >Tiếng Việt</option> 
                  <option value="la" >ພາສາລາວ</option>
                  <option value="km" >ភាសាខ្មែរ</option>
                  <option value="mm" >Myanmar</option>
                  <option value="id" >Indonesian</option>
              </select>
            </div> -->
        </div>

      </div>

    </div>
  </div>
  <div class="w-section sec-nav">
    <div class="w-container">
      <div class="top-line"></div>
            <?
		//echo $_SERVER['HTTP_REFERER']."<br><br>";
		//echo $_SERVER['HTTP_USER_AGENT'];
		$rs_af = sql_array("select * from bom_tb_member where m_id = '$_GET[ref]'");
		if($rs_af["m_id"]!=""){
			$ex_rid=explode('*',$rs_af[r_agent_id]);
			$rs_ag = sql_array("select * from bom_tb_agent where r_id = '$ex_rid[4]'");
			$ex_rida=explode('*',$rs_ag[r_agent_id]);
			if($ex_rida[1]==1 || $ex_rid[2]==297){
				$sql1="select m_id from  bom_tb_member where r_agent_id like '%*$rs_ag[r_id]*%' ";
				$num2=sql_num($sql1);
				$user = $rs_ag[r_user]."-".($num2+1);
		?>
             <div id="ccontent" class="contentBox">
                <h3 class="title">สมัครสมาชิก</h3>
                <p>
                </p><form method="post">
                  <!--<div class="input-wrapper">
                    <span class="lb">ชื่อใช้งาน : </span>
                    <span class="ip uname"><?=$user?></span>
                  </div>-->
                  <div class="input-wrapper">
                    <span class="lb">เบอร์โทร : </span>
                    <span class="ip"><input name="tphone" type="text" class="txt" id="tphone" size="15" maxlength="10" required data-num="numeric"></span>
                  </div>

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
                  </div>

                  <div class="input-wrapper">
                    <span class="warning">*** หากทีมงานเราตรวจสอบแล้วเป็นข้อมูลปลอม ทางเราจะดำเนินการระงับทันที</span>
                  </div>

                  <div class="input-wrapper">
                    <div id="token" style="margin: 0 auto;">
                    <button name="b_login" id="b_login" class="bt red-bt" onclick="request_user();">สมัครสมาชิก</button>
                  </div>
                  </div>
                </form>

                <!--   <table width="100%" border="0" cellspacing="5" cellpadding="0" class="registable">
                    <tbody><tr>
                      <td width="40%" align="right"><strong>ชื่อใช้งาน : </strong></td>
                      <td width="60%">&nbsp; <b class="cbu">
                        <?=$user?>              </b></td>
                    </tr> -->
                   <!--  <tr>
                      <td align="right"><strong>รหัสผ่าน :</strong></td>
                      <td>&nbsp;
                        <input name="tpass" type="text" class="txt" id="tpass" maxlength="10" required=""></td>
                    </tr> -->
                   <!--  <tr>
                      <td align="right"><strong>ยืนยันรหัสผ่าน :</strong></td>
                      <td>&nbsp;
                        <input name="tpassc" type="text" class="txt" id="tpassc" maxlength="10" required=""></td>
                    </tr> -->
                    <!-- <tr>
                      <td align="right"><strong>เบอร์โทร :</strong></td>
                      <td>&nbsp;
                        <input name="tphone" type="text" class="txt" id="tphone" size="15" maxlength="10" required="" onkeydown="return numberonly2(event);"></td>
                    </tr> -->
                   <!--  <tr>
                      <td align="right"><strong>ธนาคาร :</strong></td>
                      <td>&nbsp;
                        <select class="txt" name="tbank" id="tbank">
                          <option value="">-----</option>
                <? for($x=1;$x<=count($ab_bank);$x++){?>
                <option value="<?=$x;?>" <? if($re[m_b_bank]==$x){echo'selected="selected"';}?>>
                <?=$ab_bank[$x];?>
                </option>
                <? }?>
                                        </select></td>
                    </tr> -->
                  <!--   <tr>
                      <td align="right"><strong>เลขบัญชี :</strong></td>
                      <td>&nbsp;
                        <input name="tbcode" type="text" class="txt" id="tbcode" maxlength="10" required="" onkeydown="return numberonly2(event);"></td>
                    </tr>
                    <tr>
                      <td align="right"><strong>ชื่อบัญชี :</strong></td>
                      <td>&nbsp;
                        <input name="tbname" type="text" class="txt" id="tbname" maxlength="20" required=""></td>
                    </tr> -->
                  <!--   <tr>
                      <td align="right"><strong>รหัสลับ 4 หลัก :</strong></td>
                      <td>&nbsp;
                        <input name="tbpass" type="text" class="txt" id="tbpass" size="10" maxlength="4" required="" onkeydown="return numberonly2(event);"></td>
                    </tr>
                    <tr>
                      <td align="right" valign="middle">&nbsp;</td>
                      <td align="left" class="cr bb">*** หากทีมงานเราตรวจสอบแล้วเป็นข้อมูลปลอม ทางเราจะดำเนินการระงับทันที</td>
                    </tr> -->
                   <!--  <tr>
                      <td align="right" valign="middle">&nbsp;</td>
                      <td align="left"><div id="token">
                          <input name="b_login" type="button" value="สมัครสมาชิก" class="bt" id="b_login" onclick="ConfirmRegis();">
                        </div></td>
                    </tr>
                  </tbody></table>
                  <table width="100%" border="0" cellspacing="10" cellpadding="0">
                    <tbody><tr> </tr>
                  </tbody></table>
                </form> -->
                <!-- <p></p> -->
              </div>
		<script>
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
						$("#token").html("<img src='../img/loding.gif' style='opacity:1; margin:auto; display:block;' id='loding-f'>");
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
              <? } } ?>
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

