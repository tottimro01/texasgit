<?
$url_file="json/bet_id.txt";
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
    position: absolute;
    top: 47px;
width: 100%;
}
#view_count2 table td {
    /*height: 31px;
    padding-right: 25px;*/
    color: #000000;
    font-size: 9px;
    height: 40px;
    vertical-align: bottom;
    padding-right: 2px;
}
</style>
 <div class="row" style="position: relative;">
<div id="bet_time2" class="bet_time"  style="width: 107px;height: 37px;font-size: 20px;line-height: 37px;color: red;text-align: center;font-weight: bold;display: block; margin:auto; background-color:#000000;">90</div>


<table width="100%" border="0" cellspacing="3" cellpadding="0" style="margin-top:10px; background-color:#000000; border-collapse:separate; border-spacing:3px;">
<tr>
  <td width="25%" align="center"><div style="width:100%; height:40px; background-color:#ffffff; text-align:center; color:#000000; line-height: 40px; font-size:20px; font-weight: bold; cursor:pointer;">5 <span style="color:red;">ต่ำ</span></div></td>
  <td width="50%" align="center" colspan="2"><div style="width:100%; height:40px; background-color:#ffffff; text-align:center; color:red; line-height: 40px; font-size:20px; font-weight: bold; cursor:pointer;">11 ไฮโลว์</div></td>
  <td width="25%" align="center"><div style="width:100%; height:40px; background-color:#ffffff; text-align:center; color:#000000; line-height: 40px; font-size:20px; font-weight: bold; cursor:pointer;">6 <span style="color:red;">ต่ำ</span></div></td>
</tr>
<tr>
  <td width="25%" align="center"><div style="width:100%; height:40px; background:url(img/hilo/_hilo1.png?v=1) no-repeat center center; background-size: contain; background-color:#ffffff; text-align:center; color:#000000; line-height: 40px; font-size:20px; font-weight: bold; cursor:pointer;"></div></td>
  <td width="25%" align="center"><div style="width:100%; height:40px; background-color:#ffffff; text-align:center; color:red; line-height: 40px; font-size:20px; font-weight: bold; cursor:pointer;">ต่ำ</div></td>
  <td width="25%" align="center"><div style="width:100%; height:40px; background-color:#ffffff; text-align:center; color:#000000; line-height: 40px; font-size:20px; font-weight: bold; cursor:pointer;">สูง</div></td>
  <td width="25%" align="center"><div style="width:100%; height:40px; background:url(img/hilo/_hilo6.png?v=1) no-repeat center center; background-size: contain; background-color:#ffffff; text-align:center; color:#000000; line-height: 40px; font-size:20px; font-weight: bold; cursor:pointer;"></div></td>
</tr>
<tr>
  <td width="25%" align="center"><div style="width:100%; height:40px; background:url(img/hilo/_hilo2.png?v=1) no-repeat center center; background-size: contain; background-color:#ffffff; text-align:center; color:#000000; line-height: 40px; font-size:20px; font-weight: bold; cursor:pointer;"></div></td>
  <td width="25%" align="center"><div style="width:100%; height:40px; background:url(img/hilo/_hilo3.png?v=1) no-repeat center center; background-size: contain; background-color:#ffffff; text-align:center; color:#000000; line-height: 40px; font-size:20px; font-weight: bold; cursor:pointer;"></div></td>
  <td width="25%" align="center"><div style="width:100%; height:40px; background:url(img/hilo/_hilo4.png?v=1) no-repeat center center; background-size: contain; background-color:#ffffff; text-align:center; color:#000000; line-height: 40px; font-size:20px; font-weight: bold; cursor:pointer;"></div></td>
  <td width="25%" align="center"><div style="width:100%; height:40px; background:url(img/hilo/_hilo5.png?v=1) no-repeat center center; background-size: contain; background-color:#ffffff; text-align:center; color:#000000; line-height: 40px; font-size:20px; font-weight: bold; cursor:pointer;"></div></td>
</tr>
</table>


<div id="view_count2">
 <table width="100%" border="0" cellspacing="3" cellpadding="0" style="border-collapse:separate; border-spacing:3px;">
<tr>
  <td width="25%" align="right"></td>
  <td width="50%" align="right" colspan="2">0</td>
  <td width="25%" align="right"></td>
</tr>
<tr>
  <td width="25%" align="right">0</td>
  <td width="25%" align="right">0</td>
  <td width="25%" align="right">0</td>
  <td width="25%" align="right">0</td>
</tr>
<tr>
  <td width="25%" align="right">0</td>
  <td width="25%" align="right">0</td>
  <td width="25%" align="right">0</td>
  <td width="25%" align="right">0</td>
</tr>
</table>
</div>

<table width="100%" border="0" cellspacing="3" cellpadding="0" style="position: absolute; top:47px; border-collapse:separate; border-spacing:3px;">
<tr>
  <td width="25%" align="center"><div id="b-5-l" style="width:100%; height:40px; cursor:pointer;" onclick="_bet2('5,L',1);"></div></td>
  <td width="50%" align="center" colspan="2"><div id="b-11" style="width:100%; height:40px; cursor:pointer;" onclick="_bet2('11',1);"></div></td>
  <td width="25%" align="center"><div id="b-6-l" style="width:100%; height:40px; cursor:pointer;" onclick="_bet2('6,L',1);"></div></td>
</tr>
<tr>
  <td width="25%" align="center"><div id="b-1" style="width:100%; height:40px; cursor:pointer;" onclick="_bet2('1',3);"></div></td>
  <td width="25%" align="center"><div id="b-l" style="width:100%; height:40px; cursor:pointer;" onclick="_bet2('L',2);"></div></td>
  <td width="25%" align="center"><div id="b-h" style="width:100%; height:40px; cursor:pointer;" onclick="_bet2('H',2);"></div></td>
  <td width="25%" align="center"><div id="b-6" style="width:100%; height:40px; cursor:pointer;" onclick="_bet2('6',3);"></div></td>
</tr>
<tr>
  <td width="25%" align="center"><div id="b-2" style="width:100%; height:40px; cursor:pointer;" onclick="_bet2('2',3);"></div></td>
  <td width="25%" align="center"><div id="b-3" style="width:100%; height:40px; cursor:pointer;" onclick="_bet2('3',3);"></div></td>
  <td width="25%" align="center"><div id="b-4" style="width:100%; height:40px; cursor:pointer;" onclick="_bet2('4',3);"></div></td>
  <td width="25%" align="center"><div id="b-5" style="width:100%; height:40px; cursor:pointer;" onclick="_bet2('5',3);"></div></td>
</tr>
</table>
</div>