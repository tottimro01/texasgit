<?
$url_file="hilo/json/bacarat_id.txt";
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
$bet_id=$date2_bet[0][id];
?>
<style>
#hl1 {
  width:50px;
  height:49px;
  background:url(../img/hilo/hilo.gif?v=1) center center;
  background-size:contain;
  position:absolute;
  top:53px;
  left:15px;
}
#hl2 {
  width:50px;
  height:49px;
  background:url(../img/hilo/hilo.gif?v=1) center center;
  background-size:contain;
  position:absolute;
  top:53px;
  left:70px;
}
#hl3 {
  width:50px;
  height:49px;
  background:url(../img/hilo/hilo.gif?v=1) center center;
  background-size:contain;
  position:absolute;
  top:53px;
  left:125px;
  
}
.sp_box:hover {
  background:#ff6 !important;
  opacity:0.4;
}
#b-4-5-6:hover i.ib , #b-1-2-3:hover i.ib , #b-5:hover i.ib , #b-2:hover i.ib {
  background:#ff6 !important;
  opacity:0.4;
}
#b-4-5-6:hover i.ix {
  border-left-color:#ff6 !important;
  border-bottom-color:#ff6 !important;
  opacity:0.4;
}
#b-1-2-3:hover i.ix {
  border-right-color:#ff6 !important;
  border-bottom-color:#ff6 !important;
  opacity:0.4;
}
#b-5:hover i.ix , #b-2:hover i.ix {
  border-color:#ff6 !important;
  opacity:0.4;
}
#foot_hilo {
    width: 100%;
    position: absolute;
    bottom: 31px;
    left: 0px;
    height: 130px;
}
#cion_bet2 {
  width:400px;
  padding:25px 0px;
  margin-left:34px;
  height:100px;
}
#list_bet2 {
  height:125px;
  width:400px;
  position:absolute;
  top:5px;
  right:34px;
  overflow-y:scroll;
}
#id_hilo {
    position: absolute;
    top: 97px;
    right: 20px;
    width: 140px;
    height: 18px;
    line-height: 18px; 
    font-size: 12px; 
  color:#fff;
}
#account_hilo {
    position: absolute;
    top: 65px;
    right: 20px;
    width: 140px;
    height: 18px;
    line-height: 18px; 
    font-size: 12px; 
  color:#fff;
}
#credit_hilo {
    position: absolute;
    top: 81px;
    right: 20px;
    width: 140px;
    height: 18px;
    line-height: 18px; 
    font-size: 12px; 
  color:#fff;
}
#credit_all_hilo {
    position: absolute;
    top: 114px;
    right: 20px;
    width: 140px;
    height: 18px;
    line-height: 18px; 
    font-size: 12px; 
  color:#fff;
}
#credit_re_hilo {
    position: absolute;
    top: 131px;
    right: 20px;
    width: 140px;
    height: 18px;
    line-height: 18px; 
    font-size: 12px; 
  color:#fff;
}
#view_count2 {
    width: 250px;
    height: 123px;
    position: absolute;
    top: 32px;
    left: 32px;
  color:#fff;

}
#view_count2 table td {
    height: 31px;
    padding-right: 25px;
    font-size: 14px;
}
</style>
<div style="background:url(img/hilo/bg_hilo.jpg?v=1) no-repeat; color:#000; width:770px; height:628px; position:relative;">
<div id="id_hilo"><span id="bet_idx2"></span></div>
<div id="account_hilo"><?=$_SESSION[m_user];?></div>
<div id="credit_hilo"><span id="my_count2"></span></div>
<div id="credit_all_hilo"><?=number_format($re_m[m_count_de])?></div>
<div id="credit_re_hilo"><?=number_format($re_m[m_count]-$re_m[m_count_de])?></div>

<div id="view_count2">
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
    <tr>
      <td align="right">0</td>
      <td align="right">0</td>
      <td align="right">0</td>
    </tr>
  </tbody>
</table>
</div>

  <div id="bet_time2" style="position: absolute;top: 30px;left: 290px; width: 190px;height: 149px; font-size: 45px; line-height: 149px; color: red; text-align: center; font-weight: bold; display: block;"></div>
    <div id="result_hilo" style="position:absolute; top:30px; left:290px; width:190px; height:149px;"></div>  
    
    <span id="b-4-5-6" style="position: absolute; display: inline-block;width: 75px;height: 73px;top: 410px;left: 105px; cursor:pointer;" onclick="_bet2('4,5,6',1);">
    <i class="ib" style="position: absolute;display:inline-block;width: 39px;height: 73px;left:0em;top:0em"></i>
    <i class="ib" style="position: absolute;display:inline-block;width: 36px;height: 38px;left: 39px;top: 35px;"></i>
    <i class="ix" style="position: absolute;display:inline-block;width:0;height: 0;line-height:0;border: 16px solid transparent;border-left: 18px solid transparent;border-bottom: 19px solid transparent;left: 39px;top:0em;"></i></span>
    
    <span id="b-1-2-3" style="position: absolute; display: inline-block;width: 75px;height: 73px;top: 410px;left: 589px; cursor:pointer;" onclick="_bet2('1,2,3',1);">
    <i class="ib" style="position: absolute;display:inline-block;width: 39px;height: 73px;right: 0em;top:0em;"></i>
    <i class="ib" style="position: absolute;display:inline-block;width: 36px;height: 38px;left: 0px;top: 35px;"></i>
    <i class="ix" style="position: absolute;display:inline-block;width:0;height: 0;line-height:0;border: 16px solid transparent;border-right: 18px solid transparent;border-bottom: 19px solid transparent;left: 2px;top:0em;"></i></span>
    
   
   <span id="b-5" style="position: absolute;display: inline-block;width: 116px;height: 96px;top: 345px;left: 504px;cursor:pointer;" onclick="_bet2('5',3);">
   <i class="ib" style="position: absolute;display:inline-block;width: 82px;height: 96px;left:0em;top:0em;"></i>
   <i class="ib" style="position: absolute;display:inline-block;width: 33px;height: 64px;left: 82px;top:0em;"></i>
   <i class="ix" style="position: absolute;display:inline-block;width:0;height:0;line-height:0;border: 30px solid transparent;border-top:none;border-left:none;border-bottom-right-radius: 56px;left: 82px;top: 64px;"></i></span>
   
   <span id="b-2" style="position: absolute; display: inline-block;width: 116px;height: 96px;top: 345px;left: 150px; cursor:pointer;" onclick="_bet2('2',3);">
   <i class="ib" style="position: absolute;display:inline-block;width: 82px;height: 96px;right: 1px;top:0em;"></i>
   <i class="ib" style="position: absolute;display:inline-block;width: 33px;height: 64px;left: 0px;top:0em;"></i>
   <i class="ix" style="position: absolute;display:inline-block;width:0;height:0;line-height:0;border: 30px solid transparent;border-top:none;border-left:none;border-bottom-left-radius: 56px;left: 3px;top: 64px;"></i></span>

<span id="b-1-5" style="position: absolute;display: inline-block;width: 43px;height: 65px;top: 175px;left: 105px;cursor:pointer;background: transparent;" class="sp_box" onclick="_bet2('1,5',1);"></span>
<span id="b-1-6" style="position: absolute;display: inline-block;width: 42px;height: 97px;top: 244px;left: 105px;cursor:pointer;background: transparent;" class="sp_box" onclick="_bet2('1,6',1);"></span>
<span id="b-2-5" style="position: absolute;display: inline-block;width: 43px;height: 62px;top: 345px;left: 105px;cursor:pointer;background: transparent;" class="sp_box" onclick="_bet2('2,5',1);"></span>

<span id="b-5-l" style="position: absolute;display: inline-block;width: 117px;height: 45px;top: 195px;left: 150px;cursor:pointer;background: transparent;" class="sp_box" onclick="_bet2('5,L',1);"></span>

<span id="b-11" style="position: absolute;display: inline-block;width: 232px;height: 45px;top: 195px;left: 269px;cursor:pointer;background: transparent;" class="sp_box" onclick="_bet2('11',1);"></span>
<span id="b-6-l" style="position: absolute;display: inline-block;width: 115px;height: 45px;top: 195px;left: 504px;cursor:pointer;background: transparent;" class="sp_box" onclick="_bet2('6,L',1);"></span>

<span id="b-6-2" style="position: absolute; display: inline-block;width: 43px;height: 65px;top: 175px;left: 622px; cursor:pointer;background: transparent;" class="sp_box" onclick="_bet2('6,2',1);"></span>
<span id="b-6-1" style="position: absolute;display: inline-block;width: 43px;height: 97px;top: 244px;left: 622px;cursor:pointer;background: transparent;" class="sp_box" onclick="_bet2('6,1',1);"></span>
<span id="b-5-2" style="position: absolute;display: inline-block;width: 43px;height: 62px;top: 345px;left: 622px;cursor:pointer;background: transparent;" class="sp_box" onclick="_bet2('5,2',1);"></span>

<span id="b-1" style="position: absolute;display: inline-block;width: 117px;height: 97px;top: 244px;left: 150px;cursor:pointer;background: transparent;" class="sp_box" onclick="_bet2('1',3);"></span>
<span id="b-l" style="position: absolute;display: inline-block;w;width: 116px;height: 97px;top: 244px;left: 269px;cursor:pointer;background: transparent;" class="sp_box" onclick="_bet2('L',2);"></span>
<span id="b-h" style="position: absolute;display: inline-block;width: 113px;height: 97px;top: 244px;left: 388px;cursor:pointer;background: transparent;" class="sp_box" onclick="_bet2('H',2);"></span>
<span id="b-6" style="position: absolute;display: inline-block;width: 115px;height: 97px;top: 244px;left: 504px;cursor:pointer;background: transparent;" class="sp_box" onclick="_bet2('6',3);"></span>

<span id="b-3" style="position: absolute;display: inline-block;width: 116px;height: 95px;top: 345px;left: 269px;cursor:pointer;background: transparent;" class="sp_box" onclick="_bet2('3',3);"></span>
<span id="b-4" style="position: absolute; display: inline-block;width: 113px;height: 95px;top: 345px;left: 388px; cursor:pointer;background: transparent;" class="sp_box" onclick="_bet2('4',3);"></span>

<span id="b-3-6" style="position: absolute;display: inline-block;width: 84px;height: 40px;top: 443px;left: 183px;cursor:pointer;background: transparent;" class="sp_box" onclick="_bet2('3,6',1);"></span>
<span id="b-2-4" style="position: absolute;display: inline-block;width: 116px;height: 40px;top: 443px;left: 269px;cursor:pointer;background: transparent;" class="sp_box" onclick="_bet2('2,4',1);"></span>
<span id="b-3-5" style="position: absolute;display: inline-block;width: 113px;height: 40px;top: 443px;left: 388px;cursor:pointer;background: transparent;" class="sp_box" onclick="_bet2('3,5',1);"></span>
<span id="b-4-1" style="position: absolute;display: inline-block;width: 84px;height: 40px;top: 443px;left: 504px;cursor:pointer;background: transparent;" class="sp_box" onclick="_bet2('4,1',1);"></span>


<div id="foot_hilo">
  <div id="cion_bet2"></div>
    <div id="list_bet2">      </div>
</div>
<button style="position:absolute;bottom: 3px;left: 3px;padding: 1px;font-size: 16px;font-weight: bold; cursor:pointer;" onclick="$('#how_to_hilo').slideToggle('slow');">วิธีเล่น</button>
</div>
<div id="how_to_hilo" style="display:none;">
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
<div id="bet_time_new2"></div>
</div>