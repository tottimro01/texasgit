<?
$url_file="fish/json/bacarat_id.txt";
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
$bet_id=$date2_bet[0][id];
?>
<style>
#fh1 {
  width:50px;
  height:49px;
  background:url(../img/fish/hilo.gif?v=1) center center;
  background-size:contain;
  position:absolute;
  top:70px;
  left:15px;
}
#fh2 {
  width:50px;
  height:49px;
  background:url(../img/fish/hilo.gif?v=1) center center;
  background-size:contain;
  position:absolute;
  top:70px;
  left:70px;
}
#fh3 {
  width:50px;
  height:49px;
  background:url(../img/fish/hilo.gif?v=1) center center;
  background-size:contain;
  position:absolute;
  top:70px;
  left:125px;
  
}
#id_fish {
    position: absolute;
    top: 92px;
    right: 12px;
    width: 120px;
    height: 18px;
    line-height: 18px; 
    font-size: 12px; 
  color:#fff;
}
#account_fish {
    position: absolute;
    top: 60px;
    right: 12px;
    width: 120px;
    height: 18px;
    line-height: 18px; 
    font-size: 12px; 
  color:#fff;
}
#credit_fish {
    position: absolute;
    top: 76px;
    right: 12px;
    width: 120px;
    height: 18px;
    line-height: 18px; 
    font-size: 12px; 
  color:#fff;
}
#credit_all_fish {
    position: absolute;
    top: 108px;
    right: 12px;
    width: 120px;
    height: 18px;
    line-height: 18px; 
    font-size: 12px; 
  color:#fff;
}
#credit_re_fish {
    position: absolute;
    top: 125px;
    right: 12px;
    width: 120px;
    height: 18px;
    line-height: 18px; 
    font-size: 12px; 
  color:#fff;
}
#foot_fish {
    width: 100%;
    position: absolute;
    bottom: 30px;
    left: 0px;
    height: 130px;
}
#cion_bet3 {
  width:400px;
  padding:25px 0px;
  margin-left:34px;
  height:100px;
}
#list_bet3 {
  height:125px;
  width:400px;
  position:absolute;
  top:5px;
  right:34px;
  overflow-y:scroll;
}
#view_count3 {
    width: 250px;
    height: 117px;
    position: absolute;
    top: 30px;
    left: 4px;
    color: #000;
}
#view_count3 table td {
    height: 49px;
    padding-right: 25px;
    font-size: 14px;
}
</style>

<div style="background:url(img/fish/bg_fish.jpg?v=1) no-repeat; color:#000; width:770px; height:628px; position:relative;">

<div id="id_fish"><span id="bet_idx3"></span></div>
<div id="account_fish"><?=$_SESSION[m_user];?></div>
<div id="credit_fish"><span id="my_count3"></span></div>
<div id="credit_all_fish"><?=number_format($re_m[m_count_de])?></div>
<div id="credit_re_fish"><?=number_format($re_m[m_count]-$re_m[m_count_de])?></div>

<div id="result_fish" style="position:absolute; top:10px; left:292px; width:190px; height:140px;"></div>  

<div id="bet_time3" style="position: absolute;top: 10px;left: 292px;width: 190px;height: 140px;font-size: 45px;line-height: 150px;color: red;text-align: center;font-weight: bold;display: block;">90</div>


<div id="view_count3">
  <table width="100%" border="0" cellspacing="1" cellpadding="5">
  <tbody>
    <tr>
      <td align="right">0</td>
      <td align="right">0</td>
      <td align="right">0</td>
    </tr>
    <tr>
      <td align="right">0</td>
      <td align="right">0</td>
      <td align="right">0</td>
    </tr>
  </tbody>
</table>
</div>


<span id="fb-1" style="position: absolute;display: inline-block;width: 165px;height: 167px;top: 157px;left: 134px;cursor:pointer;background: transparent;border-radius: 30px;" class="sp_box" onclick="_bet3(1);"></span>
<span id="fb-2" style="position: absolute; display: inline-block;width: 165px;height: 167px;top: 157px;left: 305px; cursor:pointer;background: transparent;border-radius: 30px;" class="sp_box" onclick="_bet3(2);"></span>
<span id="fb-3" style="position: absolute; display: inline-block;width: 165px;height: 167px;top: 157px;left: 476px; cursor:pointer;background: transparent;border-radius: 30px;" class="sp_box" onclick="_bet3(3);"></span>
<span id="fb-4" style="position: absolute; display: inline-block;width: 165px;height: 167px;top: 328px;left: 134px; cursor:pointer;background: transparent;border-radius: 30px;" class="sp_box" onclick="_bet3(4);"></span>
<span id="fb-5" style="position: absolute; display: inline-block;width: 165px;height: 167px;top: 328px;left: 305px; cursor:pointer;background: transparent;border-radius: 30px;" class="sp_box" onclick="_bet3(5);"></span>
<span id="fb-6" style="position: absolute; display: inline-block;width: 165px;height: 167px;top: 328px;left: 476px; cursor:pointer;background: transparent;border-radius: 30px;" class="sp_box" onclick="_bet3(6);"></span>

<div id="foot_fish">
  <div id="cion_bet3"></div>
    <div id="list_bet3">      </div>
</div>
<button style="position:absolute;bottom: 3px;left: 3px;padding: 1px;font-size: 16px;font-weight: bold; cursor:pointer;" onclick="$('#how_to_fish').slideToggle('slow');">วิธีเล่น</button>
</div>
<div id="how_to_fish" style="display:none;">
<h3>วิธีเล่น</h3>
<p> 1.เลือกตามที่ต้องการ<br>
 </p>
<p>
<table width="55%" border="0" cellspacing="0" cellpadding="0" class="ball" >
  <tr class="xsboku" >
    <td width="22%" align="center">ประเภท</td>
    <td width="13%" align="center">จ่าย</td>
    <td width="65%" align="center">ความหมาย</td>
  </tr>
  <tr>
    <td>11 ไฮโล</td>
    <td align="center">22.95</td>
    <td>ผลรวมของลูกเต๋าเท่ากับ 11</td>
  </tr>
  <tr>
    <td>สูง-ต่ำ</td>
    <td align="center">1.95</td>
    <td>ผลรวมของลูกเต๋าตั้งแต่ 3 ถึง 10 เท่ากับ ต่ำ<br>
ผลรวมของลูกเต๋าตั้งแต่ 12 ถึง 18 เท่ากับ สูง</td>
  </tr>
  <tr>
    <td>ต่ำ+X , สูง+X</td>
    <td align="center">3.95</td>
    <td>มีเลขที่แทงทั้ง 2ตัว ที่มี ต่ำ หรือ สูง ผสมอยู่ด้วย</td>
  </tr>
  <tr>
    <td>ตรง</td>
    <td align="center">1.95</td>
    <td>มีเลขที่แทงปรากฎอยู่ในลูกเต๋าที่ออกลูกใดลูกหนึ่ง</td>
  </tr>
  <tr>
    <td>โต๊ด</td>
    <td align="center">5.95</td>
    <td>มีเลขที่แทงทั้ง 2ตัวปรากฎอยู่ในลูกเต๋าที่ออกลูกใดลูกหนึ่ง</td>
  </tr>
  <tr>
    <td>X-X-X</td>
    <td align="center">15.95</td>
    <td>มีเลขที่แทงทั้ง 3ตัว</td>
  </tr>
</table>
</p>
<div id="bet_time_new3"></div>
</div>