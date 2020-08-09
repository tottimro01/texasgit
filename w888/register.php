<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('inc/conn.php');
require('inc/function.php');

// require("lang/th.php");
// require("lang/member_lang.php");
  require("lang/variable_lang.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="icon" href="img/logo.ico">
  <TITLE>::: OHOKING :::</TITLE>
  
     <link rel="stylesheet" type="text/css" href="css/register.css?v=<?=$time_stam;?>">
     <link rel="stylesheet" type="text/css" href="css/lize.css?v=<?=$time_stam;?>">
     <link rel="stylesheet" type="text/css" href="css/style_me.css?v=<?=$time_stam;?>">
     <link rel="stylesheet" type="text/css" href="css/speed.css?v=<?=$time_stam;?>">
</head>
<body>

    <div class="w-section sec-head">
    <div class="w-container">
      <div class="w-row">
        <div class="w-col w-col-3">
          <img src="img/logo.png" width="160" height="47" class="img-logo">
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
             <div id="ccontent" class="contentBox">
                <h3><?=$lang_member[70];?></h3>
                <p>
                </p><form method="post">
                  <table width="100%" border="0" cellspacing="5" cellpadding="0" class="registable">
                    <tbody><tr>
                      <td width="40%" align="right"><strong><?=$lang_member[71];?> : </strong></td>
                      <td width="60%">&nbsp; <b class="cbu">
                        a2430              </b></td>
                    </tr>
                    <tr>
                      <td align="right"><strong><?=$lang_member[73];?> :</strong></td>
                      <td>&nbsp;
                        <input name="tpass" type="text" class="txt" id="tpass" maxlength="10" required=""></td>
                    </tr>
                    <tr>
                      <td align="right"><strong><?=$lang_member[74];?> :</strong></td>
                      <td>&nbsp;
                        <input name="tpassc" type="text" class="txt" id="tpassc" maxlength="10" required=""></td>
                    </tr>
                    <tr>
                      <td align="right"><strong><?=$lang_member[76];?> :</strong></td>
                      <td>&nbsp;
                        <input name="tphone" type="text" class="txt" id="tphone" size="15" maxlength="10" required=""></td>
                    </tr>
                    <tr>
                      <td align="right"><strong><?=$lang_member[77];?> :</strong></td>
                      <td>&nbsp;
                        <select class="txt" name="tbank" id="tbank">
                          <option value="">-----</option>
                                          <option value="1">
                          <?=$lang_banks[1];?>                </option>
                                          <option value="2">
                          <?=$lang_banks[2];?>                </option>
                                          <option value="3">
                          <?=$lang_banks[3];?>                </option>
                                          <option value="4">
                          <?=$lang_banks[4];?>                </option>
                                          <option value="5">
                          <?=$lang_banks[5];?>                </option>
                                          <option value="6">
                          <?=$lang_banks[6];?>                </option>
                                        </select></td>
                    </tr>
                    <tr>
                      <td align="right"><strong><?=$lang_member[79];?> :</strong></td>
                      <td>&nbsp;
                        <input name="tbcode" type="text" class="txt" id="tbcode" maxlength="10" required=""></td>
                    </tr>
                    <tr>
                      <td align="right"><strong><?=$lang_member[80];?> :</strong></td>
                      <td>&nbsp;
                        <input name="tbname" type="text" class="txt" id="tbname" maxlength="20" required=""></td>
                    </tr>
                    <tr>
                      <td align="right"><strong><?=$lang_member[81];?> :</strong></td>
                      <td>&nbsp;
                        <input name="tbpass" type="text" class="txt" id="tbpass" size="10" maxlength="4" required=""></td>
                    </tr>
                    <tr>
                      <td align="right" valign="middle">&nbsp;</td>
                      <td align="left" class="cr bb">*** <?=$lang_member[83];?></td>
                    </tr>
                    <tr>
                      <td align="right" valign="middle">&nbsp;</td>
                      <td align="left"><div id="token">
                          <input name="b_login" type="button" value="<?=$lang_member[70];?>" class="bt" id="b_login">
                        </div></td>
                    </tr>
                  </tbody></table>
                  <table width="100%" border="0" cellspacing="10" cellpadding="0">
                    <tbody><tr> </tr>
                  </tbody></table>
                </form>
                <p></p>
              </div>
    </div>
  </div>
  
</body>
</html>