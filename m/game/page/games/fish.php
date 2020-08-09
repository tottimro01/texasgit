<?
$url_file="json/bet_id.txt";
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
   position: absolute;
    top: 47px;
width: 100%;

}
#view_count3 table td {
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
<div id="bet_time3" class="bet_time"  style="width: 107px;height: 37px;font-size: 20px;line-height: 37px;color: red;text-align: center;font-weight: bold;display: block; margin:auto; background-color:#000000;">90</div>
<table width="100%" border="0" cellspacing="3" cellpadding="0" style="margin-top:10px; background-color:#f9ea8b; border-collapse:separate; border-spacing:3px;">
<tr>
  <td width="33%" align="center"><div style="width:100%; height:40px; background:url(img/fish/_1.png?v=1) no-repeat center center; background-size: contain; background-color:#ccdea2; text-align:center; color:#000000; line-height: 40px; font-size:20px; font-weight: bold; cursor:pointer;"></div></td>
  <td width="33%" align="center"><div style="width:100%; height:40px; background:url(img/fish/_2.png?v=1) no-repeat center center; background-size: contain; background-color:#72c2d9; text-align:center; color:#000000; line-height: 40px; font-size:20px; font-weight: bold; cursor:pointer;"></div></td>
  <td width="33%" align="center"><div style="width:100%; height:40px; background:url(img/fish/_3.png?v=1) no-repeat center center; background-size: contain; background-color:#afc887; text-align:center; color:#000000; line-height: 40px; font-size:20px; font-weight: bold; cursor:pointer;"></div></td>
<tr>
  <td width="33%" align="center"><div style="width:100%; height:40px; background:url(img/fish/_4.png?v=1) no-repeat center center; background-size: contain; background-color:#cea3aa; text-align:center; color:#000000; line-height: 40px; font-size:20px; font-weight: bold; cursor:pointer;"></div></td>
  <td width="33%" align="center"><div style="width:100%; height:40px; background:url(img/fish/_5.png?v=1) no-repeat center center; background-size: contain; background-color:#9fd3e0; text-align:center; color:#000000; line-height: 40px; font-size:20px; font-weight: bold; cursor:pointer;"></div></td>
  <td width="33%" align="center"><div style="width:100%; height:40px; background:url(img/fish/_6.png?v=1) no-repeat center center; background-size: contain; background-color:#cec6c3; text-align:center; color:#000000; line-height: 40px; font-size:20px; font-weight: bold; cursor:pointer;"></div></td>
</table>

<div id="view_count3">
 <table width="100%" border="0" cellspacing="3" cellpadding="0" style="border-collapse:separate; border-spacing:3px;">
<tr>
  <td width="33%" align="right">0</td>
  <td width="33%" align="right">0</td>
  <td width="33%" align="right">0</td>
</tr>
<tr>
  <td width="33%" align="right">0</td>
  <td width="33%" align="right">0</td>
  <td width="33%" align="right">0</td>
</tr>
</table>
</div>


<table width="100%" border="0" cellspacing="3" cellpadding="0" style="position: absolute; top:47px; border-collapse:separate; border-spacing:3px;">
<tr>
  <td width="33%" align="center"><div id="fb-1" style="width:100%; height:40px; cursor:pointer;" onclick="_bet3(1);"></div></td>
  <td width="33%" align="center"><div id="fb-2" style="width:100%; height:40px; cursor:pointer;" onclick="_bet3(2);"></div></td>
  <td width="33%" align="center"><div id="fb-3" style="width:100%; height:40px; cursor:pointer;" onclick="_bet3(3);"></div></td>
</tr>
<tr>
  <td width="33%" align="center"><div id="fb-4" style="width:100%; height:40px; cursor:pointer;" onclick="_bet3(4);"></div></td>
  <td width="33%" align="center"><div id="fb-5" style="width:100%; height:40px; cursor:pointer;" onclick="_bet3(5);"></div></td>
  <td width="33%" align="center"><div id="fb-6" style="width:100%; height:40px; cursor:pointer;" onclick="_bet3(6);"></div></td>
</tr>
</table>


</div>