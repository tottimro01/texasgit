<?
$url_file="bacarat/json/bacarat_id.txt";
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
$bet_id=$date2_bet[0][id];
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
<table width="770" height="497" border="0" cellpadding="0" cellspacing="0" style="background:url(img/bacarat/bac_bk.jpg) no-repeat; color:#FFF;">
  <tr>
    <td width="220" height="215" align="center" valign="top"><table width="100%" height="200" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="150">&nbsp;</td>
        </tr>
        <tr>
          <td align="center" valign="top" id="view_count"><table width="220" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="20%" height="20">&nbsp;</td>
                <td width="20%">&nbsp;</td>
                <td width="20%">&nbsp;</td>
                <td width="20%">&nbsp;</td>
                <td width="20%">&nbsp;</td>
              </tr>
              <tr>
                <td align="center">0</td>
                <td align="center">0</td>
                <td align="center">0</td>
                <td align="center">0</td>
                <td align="center">0</td>
              </tr>
            </table></td>
        </tr>
      </table></td>
    <td width="340" align="center" valign="top"><table width="100%" height="60" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>&nbsp;</td>
          <td align="center" id="bet_time"></td>
          <td>&nbsp;</td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="46%" align="center" id="player_view">&nbsp;</td>
          <td width="8%" align="center">&nbsp;</td>
          <td width="46%" align="center"  id="banker_view">&nbsp;</td>
        </tr>
        <tr>
          <td align="center">Player : ผู้เล่น</td>
          <td align="center">&nbsp;</td>
          <td align="center">Banker : เจ้ามือ</td>
        </tr>
      </table></td>
    <td colspan="2" align="center" valign="top"><table width="100%" border="0" height="185" cellspacing="0" cellpadding="0">
        <tr>
          <td width="45%" height="50">&nbsp;</td>
          <td width="55%">&nbsp;</td>
        </tr>
        <tr>
          <td height="21">&nbsp;</td>
          <td valign="bottom"><?=$_SESSION[m_user];?></td>
        </tr>
        <tr>
          <td height="29">&nbsp;</td>
          <td valign="bottom" id="my_count"><?=number_format($re_m[m_count])?></td>
        </tr>
        <tr>
          <td height="28">&nbsp;</td>
          <td valign="bottom" id="bet_idx"><?=$bet_id;?></td>
        </tr>
        <tr>
          <td height="29">&nbsp;</td>
          <td valign="bottom"><?=number_format($re_m[m_count_de])?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td valign="bottom"><?=number_format($re_m[m_count]-$re_m[m_count_de])?></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td height="180" colspan="4" align="center" valign="top">
    <table width="675" height="147" border="0" cellspacing="0" cellpadding="0" style="margin-left: 15px; border-radius: 100px; overflow: hidden;">
        <tr>
          <td width="24%" rowspan="2" onclick="_bet(1);" class="cu">&nbsp;</td>
          <td width="17%"  onclick="_bet(6);" class="cu">&nbsp;</td>
          <td colspan="2"  onclick="_bet(3);" class="cu">&nbsp;</td>
          <td width="17%"  onclick="_bet(7);" class="cu">&nbsp;</td>
          <td width="24%" rowspan="2"  onclick="_bet(2);" class="cu">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2"  onclick="_bet(4);" class="cu">&nbsp;</td>
          <td colspan="2"  onclick="_bet(5);" class="cu">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td align="center" style="position:relative"><button style="position:absolute;bottom: 5px;left: 5px; padding:5px;font-size: 16px;font-weight: bold; cursor:pointer;" onClick="$('#how_to_bacara').slideToggle('slow');">วิธีเล่น</button></td>
    <td align="center" id="cion_bet">&nbsp;</td>
    <td colspan="2" align="center" valign="top" id="list_bet"></td>
  </tr>
</table>
<style type="text/css">
table{border-collapse:collapse;}
</style>
<div id="how_to_bacara" style="display:none;">
<h3>วิธีเล่น</h3>
<p> 1.วิธีนับแต้ม เช่น ไพ่ออก 7 กับ 5 =12 , ผล = 2 *นับแต้มตัวสุดท้าย<br>
  2.ไพ่ออก A แต้มเป็น 1<br>
  3.ไพ่ออก 10, J  , Q , K แต้มเป็น 0<br>
  4.*<strong class="cr">แต้มเสมอ</strong> นับไพ่มี 1-10 , J  , Q , K  ตาม<strong class="cr"> ลำดับ </strong>เล็กไปใหญ่ <strong>ชนะ</strong> (<strong>Tie </strong>ยังชนะ)<br>
  5.**<strong class="cr">แต้มเสมอ + ลำดับเสมอ</strong> นับสีไพ่มี <em>ดอกจิก</em> (♣) <em>ข้าวหลามตัด</em> (♦) <em>โพแดง</em> (♥) 
  และ <em>โพดำ</em> (♠) 
  ตาม<strong class="cr"> เกรด</strong> เล็กไปใหญ่ <strong>ชนะ</strong> (<strong>Tie</strong> ยังชนะ)</p>
<p>
<table width="50%" border="0" cellspacing="0" cellpadding="0" class="ball" >
  <tr class="xsboku" >
    <td width="22%" align="center">ประเภท</td>
    <td width="13%" align="center">จ่าย</td>
    <td width="65%" align="center">ความหมาย</td>
  </tr>
  <tr>
    <td><?=$arr_bacarat[1];?></td>
    <td align="center"><?=$arr_bacarat_pay[1];?></td>
    <td>ผู้เล่น ชนะ</td>
  </tr>
  <tr>
    <td><?=$arr_bacarat[2];?></td>
    <td align="center"><?=$arr_bacarat_pay[2];?></td>
    <td>เจ้ามือ ชนะ</td>
  </tr>
  <tr>
    <td><?=$arr_bacarat[3];?></td>
    <td align="center"><?=$arr_bacarat_pay[3];?></td>
    <td>ผู้เล่น แต้มเสมอกันกับ เจ้ามือ</td>
  </tr>
  <tr>
    <td><?=$arr_bacarat[4];?></td>
    <td align="center"><?=$arr_bacarat_pay[4];?></td>
    <td> เจ้ามือ แต้ม มากกว่า 6 ขึ้นไป</td>
  </tr>
  <tr>
    <td><?=$arr_bacarat[5];?></td>
    <td align="center"><?=$arr_bacarat_pay[5];?></td>
    <td> เจ้ามือ แต้ม น้อยกว่า 5 ลงมา</td>
  </tr>
  <tr>
    <td><?=$arr_bacarat[6];?></td>
    <td align="center"><?=$arr_bacarat_pay[6];?></td>
    <td>ผู้เล่น แต้มเสมอ *มากกว่า 10 นับเป็น 0</td>
  </tr>
  <tr>
    <td><?=$arr_bacarat[7];?></td>
    <td align="center"><?=$arr_bacarat_pay[7];?></td>
    <td>เจ้ามือ แต้มเสมอ *มากกว่า 10 นับเป็น 0</td>
  </tr>
</table>
</p>
<div id="bet_time_new"></div>
</div>