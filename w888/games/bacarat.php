<?
$sql="select * from bom_tb_config where con_id=1";
$rec=sql_array($sql);
$bet_id=$rec['con_id_games'];

$img_bg="games/img/bg_bar.jpg";
?>
<style type="text/css">
#bet_time {
  font-size: 36px;
}
.cu:hover {
  background: #FF6;
  opacity: 0.4;
  filter: alpha(opacity=40);
}
.cu2:hover {
  opacity: 0.4;
  filter: alpha(opacity=40);
}
.cu2 {
  cursor: pointer;
}
.ccm {
  -webkit-border-radius: 7px;
  -moz-border-radius: 7px;
  border-radius: 7px;
  padding: 2px;
}
.cca1 {
  color: #0FF;
}
.cca2 {
  color: #F00;
}
.cca3 {
  color: #FF0;
}
.cca4 {
  color: #F00;
}
.cca5 {
  color: #F00;
}
.cca6 {
  color: #0FF;
}
.cca7 {
  color: #F00;
}
.cview {
  font-size: 20px;
}
#div2 {
  height: 130px;
  margin-bottom: 12px;
}
#div2 {
  overflow-y: scroll;
}
</style>
<div style="background:url(<?=$img_bg;?>?v=1) no-repeat; color:#000; width:720px; height:364px; position:relative;">

<div id="bet_time1" class="bet_time"  style="position: absolute;top: 12px;left: 282px;width: 157px;height: 57px;font-size: 30px;line-height: 57px;color: red;text-align: center;font-weight: bold;display: block;">40</div>
<!-- <table width="720" height="364" border="0" cellpadding="0" cellspacing="0" style="background:url(<?=$img_bg;?>?v=1) no-repeat; color:#FFF;">
  <tr>
    <td align="center" id="bet_time1" height="72" class="bet_time"   style="font-size: 30px;color: red;text-align: center;font-weight: bold;"></td>
  </tr>
  <tr>
    <td align="center" valign="top" height="302" style="position: relative;"> -->
<div style="position: absolute; top: 155px; left: 0px; width: 720px; height: 123px; z-index: 1; font-size: 9px; color: #fff;" id="view_count1">
  <div id="game_stat_3">

    <table width="565" height="123" border="0" cellspacing="0" cellpadding="0" style="margin-left: 0px;border-radius: 100px;overflow: hidden;">
          <tbody><tr>
            <td width="24%" rowspan="2"><div style="width: 100%; height: 123px; text-align: center; line-height: 175px;"><span class="bet_count 1">0</span></div></td>
            <td width="17%"><div style="width: 100%; text-align: center; position: relative;top: 20px;"><span class="bet_count 6">0</span></div></td>
            <td colspan="2"><div style="width: 100%; text-align: center; position: relative;top: 20px;"><span class="bet_count 3">0</span></div></td>
            <td width="17%"><div style="width: 100%; text-align: center; position: relative;top: 20px;"><span class="bet_count 7">0</span></div></td>
            <td width="24%" rowspan="2" ><div style="width: 100%; height: 123px; text-align: center; line-height: 175px;"><span class="bet_count 2">0</span></div></td>
          </tr>
          <tr>
            <td colspan="2"><div style="width: 100%; text-align: center; position: relative;top: 20px;"><span class="bet_count 4">0</span></div></td>
            <td colspan="2"><div style="width: 100%; text-align: center; position: relative;top: 20px;"><span class="bet_count 5">0</span></div></td>
          </tr>
        </tbody>
      </table>
  </div>
</div>

<!-- <table width="565" height="123" border="0" cellspacing="0" cellpadding="0" style="margin-left: 0px;border-radius: 100px;overflow: hidden;">
        <tbody>
          <tr>
          <td width="24%" rowspan="2"><div style="width: 100%; height: 123px; text-align: center; line-height: 175px;">0</div></td>
          <td width="17%"><div style="width: 100%; text-align: center; position: relative;top: 20px;">0</div></td>
          <td colspan="2"><div style="width: 100%; text-align: center; position: relative;top: 20px;">0</div></td>
          <td width="17%"><div style="width: 100%; text-align: center; position: relative;top: 20px;">0</div></td>
          <td width="24%" rowspan="2" ><div style="width: 100%; height: 123px; text-align: center; line-height: 175px;">0</div></td>
        </tr>
        <tr>
          <td colspan="2"><div style="width: 100%; text-align: center; position: relative;top: 20px;">0</div></td>
          <td colspan="2"><div style="width: 100%; text-align: center; position: relative;top: 20px;">0</div></td>
        </tr>
      </tbody>
  </table> -->
  <div style="z-index: 1; position: absolute; top: 0; left: 0;">
    <span id="bc-1" style="position: absolute;display: inline-block;width: 120px;height: 163px;top: 137px;left: 105px;" ></span>
    <span id="bc-2" style="position: absolute;display: inline-block;width: 120px;height: 163px;top:  137px;left: 217px;" ></span>

    <span id="bc-3" style="position: absolute;display: inline-block;width: 120px;height: 163px;top:  137px;left: 398px;" ></span>
    <span id="bc-4" style="position: absolute;display: inline-block;width: 120px;height: 163px;top:  137px;left: 510px;"></span>
  </div>
    <table width="565" height="123" border="0" cellspacing="0" cellpadding="0" style="margin-left: 0px;border-radius: 100px;overflow: hidden;margin-top: 83px; z-index: 2; position: absolute; left: 77px; top: 73px;">
        <tbody><tr>
          <td width="24%" rowspan="2" onclick="_bet1(1);" class="cu">&nbsp;</td>
          <td width="17%" onclick="_bet1(6);" class="cu">&nbsp;</td>
          <td colspan="2" onclick="_bet1(3);" class="cu">&nbsp;</td>
          <td width="17%" onclick="_bet1(7);" class="cu">&nbsp;</td>
          <td width="24%" rowspan="2" onclick="_bet1(2);" class="cu">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2" onclick="_bet1(4);" class="cu">&nbsp;</td>
          <td colspan="2" onclick="_bet1(5);" class="cu">&nbsp;</td>
        </tr>
      </tbody>
    </table>

      <!-- </td> -->
  <!-- </tr> -->
  <!-- <tr> -->
    <!-- <td align="center" style="position:relative"> -->


      <!-- <button style="position:absolute;bottom: 30px;right: 80px;padding:5px;font-size: 16px;font-weight: bold;cursor:pointer;" onClick="$('#how_to_bacara').slideToggle('slow');">วิธีเล่น</button> -->
    <!-- </td> -->
  <!-- </tr> -->
  <!-- <tr> -->
    <!-- <td style="position: relative;"> -->
      <div class="bttn_container" style="bottom: 9px;">  
<!-- <?if($_SESSION[crid1]==1){?> -->
<button class="btn_le btn_small" onclick="$('#how_to_bacara').slideUp('fast'); $('#stats_bacara').slideToggle('fast')"><?=$lang_member[155];?></button>
<!-- <?}?> -->
<button class="btn_le btn_small danger" onclick="$('#how_to_bacara').slideToggle('fast'); $('#stats_bacara').slideUp('fast');"><?=$lang_member[157];?></button>
</div>
</div>
    <!-- </td> -->
  <!-- </tr> -->

<!-- </table> -->

<style type="text/css">
table{border-collapse:collapse;}
</style>
<div id="how_to_bacara" class="ht_st_container">
<h3><?=$lang_member[157];?></h3>
<p><!--  1.วิธีนับแต้ม เช่น ไพ่ออก 7 กับ 5 =12 , ผล = 2 *นับแต้มตัวสุดท้าย<br>
  2.ไพ่ออก A แต้มเป็น 1<br>
  3.ไพ่ออก 10, J  , Q , K แต้มเป็น 0<br>
  4.*<strong class="cr">แต้มเสมอ</strong> นับไพ่มี 1-10 , J  , Q , K  ตาม<strong class="cr"> ลำดับ </strong>เล็กไปใหญ่ <strong>ชนะ</strong> (<strong>Tie </strong>ยังชนะ)<br>
  5.**<strong class="cr">แต้มเสมอ + ลำดับเสมอ</strong> นับสีไพ่มี <em>ดอกจิก</em> (♣) <em>ข้าวหลามตัด</em> (♦) <em>โพแดง</em> (♥) 
  และ <em>โพดำ</em> (♠) 
  ตาม<strong class="cr"> เกรด</strong> เล็กไปใหญ่ <strong>ชนะ</strong> (<strong>Tie</strong> ยังชนะ) -->
  <?=$lang_member[193];?>
</p>

<table border="0" cellspacing="0" cellpadding="0" class="ball ht_tb">
  <tr class="xsboku" >
    <td width="22%" align="center"><?=$lang_member[160];?></td>
    <td width="13%" align="center"><?=$lang_member[162];?></td>
    <td width="65%" align="center"><?=$lang_member[163];?></td>
  </tr>
  <tr>
    <td><?=$arr_bacarat[1];?></td>
    <td align="center"><?=$arr_bacarat_pay[1];?></td>
    <td><?=$lang_member[194];?></td>
  </tr>
  <tr>
    <td><?=$arr_bacarat[2];?></td>
    <td align="center"><?=$arr_bacarat_pay[2];?></td>
    <td><?=$lang_member[196];?></td>
  </tr>
  <tr>
    <td><?=$arr_bacarat[3];?></td>
    <td align="center"><?=$arr_bacarat_pay[3];?></td>
    <td><?=$lang_member[198];?></td>
  </tr>
  <tr>
    <td><?=$arr_bacarat[4];?></td>
    <td align="center"><?=$arr_bacarat_pay[4];?></td>
    <td> <?=$lang_member[200];?></td>
  </tr>
  <tr>
    <td><?=$arr_bacarat[5];?></td>
    <td align="center"><?=$arr_bacarat_pay[5];?></td>
    <td> <?=$lang_member[202];?></td>
  </tr>
  <tr>
    <td><?=$arr_bacarat[6];?></td>
    <td align="center"><?=$arr_bacarat_pay[6];?></td>
    <td><?=$lang_member[204];?></td>
  </tr>
  <tr>
    <td><?=$arr_bacarat[7];?></td>
    <td align="center"><?=$arr_bacarat_pay[7];?></td>
    <td><?=$lang_member[206];?></td>
  </tr>
</table>
<br>
</div>

<?
  $_rows = 6;
  $_cols = 10;
  $_cellKey = "bacara";
?>
<div id="stats_bacara" class="ht_st_container">
  <h3><?=$lang_member[155];?></h3>
  <? echo createStatsTable($_rows, $_cols, $_cellKey); ?>
  <br>
</div>