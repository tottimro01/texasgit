<?
$sql="select * from bom_tb_config where con_id=1";
$rec=sql_array($sql);
$bet_id=$rec['con_id_games'];

$img_bg="games/img/bg_hilo2.jpg";
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
    width: 120px;
    position: absolute;
    top: 135px;
    left: 65px;
  color:#fff;

}
#view_count2 table td {
    /*height: 31px;
    padding-right: 25px;*/
    font-size: 9px;
}
</style>
<div style="background:url(<?=$img_bg;?>?v=2) no-repeat; color:#000; width:720px; height:405px; position:relative;">

  <div id="bet_time2" class="bet_time"  style="position: absolute;top: 12px;left: 282px;width: 157px;height: 57px;font-size: 30px;line-height: 57px;color: red;text-align: center;font-weight: bold;display: block;"></div>
    <div id="result_hilo" style="position:absolute; top:12px; left:282px; width:157px; height:57px;"></div>  
    
    <span id="b-4-5-6" style="position: absolute;display: inline-block;width: 45px;height: 43px;top: 267px;left: 196px;cursor:pointer;" onclick="_bet2('4,5,6',1);">
    <i class="ib" style="position: absolute;display:inline-block;width: 26px;height: 43px;left:0em;top:0em"></i>
    <i class="ib" style="position: absolute;display:inline-block;width: 18px;height: 24px;left: 26px;top: 19px;"></i>
    <i class="ix" style="position: absolute;display:inline-block;width:0;height: 0;line-height:0;border: 13px solid transparent;border-left: 8px solid transparent;border-bottom: 6px solid transparent;left: 26px;top:0em;"></i></span>
    
    <span id="b-1-2-3" style="position: absolute; display: inline-block;width: 45px;height: 43px;top: 267px;left: 480px; cursor:pointer;" onclick="_bet2('1,2,3',1);">
    <i class="ib" style="position: absolute;display:inline-block;width: 25px;height: 43px;right: 0em;top:0em;"></i>
    <i class="ib" style="position: absolute;display:inline-block;width: 20px;height: 24px;left: 0px;top: 19px;"></i>
    <i class="ix" style="position: absolute;display:inline-block;width:0;height: 0;line-height:0;border: 12px solid transparent;border-right: 8px solid transparent;border-bottom: 7px solid transparent;left: 0px;top:0em;"></i></span>
    
   
   <span id="b-5" style="position: absolute;display: inline-block;width: 68px;height: 56px;top: 228px;left: 431px;cursor:pointer;" onclick="_bet2('5',3);">
   <i class="ib" style="position: absolute;display:inline-block;width: 48px;height: 56px;left:0em;top:0em;"></i>
   <i class="ib" style="position: absolute;display:inline-block;width: 20px;height: 38px;left: 48px;top:0em;"></i>
   <i class="ix" style="position: absolute;display:inline-block;width:0;height:0;line-height:0;border: 18px solid transparent;border-top:none;border-left:none;border-bottom-right-radius: 56px;left: 48px;top: 38px;"></i></span>
   
   <span id="b-2" style="position: absolute;display: inline-block;width: 68px;height: 56px;top: 228px;left: 223px;cursor:pointer;" onclick="_bet2('2',3);">
   <i class="ib" style="position: absolute;display:inline-block;width: 48px;height: 56px;right: 1px;top:0em;"></i>
   <i class="ib" style="position: absolute;display:inline-block;width: 20px;height: 38px;left: 0px;top:0em;"></i>
   <i class="ix" style="position: absolute;display:inline-block;width:0;height:0;line-height:0;border: 18px solid transparent;border-top:none;border-left:none;border-bottom-left-radius: 47px;left: 2px;top: 38px;"></i></span>

<span id="b-1-5" style="position: absolute;display: inline-block;width: 25px;height: 36px;top: 130px;left: 196px;cursor:pointer;background: transparent;" class="sp_box" onclick="_bet2('1,5',1);"></span>
<span id="b-1-6" style="position: absolute;display: inline-block;width: 25px;height: 57px;top: 169px;left: 196px;cursor:pointer;background: transparent;" class="sp_box" onclick="_bet2('1,6',1);"></span>
<span id="b-2-5" style="position: absolute;display: inline-block;width: 25px;height: 36px;top: 228px;left: 196px;cursor:pointer;background: transparent;" class="sp_box" onclick="_bet2('2,5',1);"></span>

<span id="b-5-l" style="position: absolute;display: inline-block;width: 68px;height: 31px;top: 135px;left: 223px;cursor:pointer;background: transparent;" class="sp_box" onclick="_bet2('5,L',1);"></span>

<span id="b-11" style="position: absolute;display: inline-block;width: 136px;height: 31px;top: 135px;left: 293px;cursor:pointer;background: transparent;" class="sp_box" onclick="_bet2('11',1);"></span>
<span id="b-6-l" style="position: absolute;display: inline-block;width: 67px;height: 31px;top: 135px;left: 431px;cursor:pointer;background: transparent;" class="sp_box" onclick="_bet2('6,L',1);"></span>

<span id="b-6-2" style="position: absolute;display: inline-block;width: 25px;height: 36px;top: 130px;left: 501px;cursor:pointer;background: transparent;" class="sp_box" onclick="_bet2('6,2',1);"></span>
<span id="b-6-1" style="position: absolute;display: inline-block;width: 25px;height: 57px;top: 169px;left: 501px;cursor:pointer;background: transparent;" class="sp_box" onclick="_bet2('6,1',1);"></span>
<span id="b-5-2" style="position: absolute;display: inline-block;width: 25px;height: 36px;top: 228px;left: 501px;cursor:pointer;background: transparent;" class="sp_box" onclick="_bet2('5,2',1);"></span>

<span id="b-1" style="position: absolute;display: inline-block;width: 68px;height: 57px;top: 169px;left: 223px;cursor:pointer;background: transparent;" class="sp_box" onclick="_bet2('1',3);"></span>
<span id="b-l" style="position: absolute;display: inline-block;width: 68px;height: 57px;top: 169px;left: 293px;cursor:pointer;background: transparent;" class="sp_box" onclick="_bet2('L',2);"></span>
<span id="b-h" style="position: absolute;display: inline-block;width: 66px;height: 57px;top: 169px;left: 363px;cursor:pointer;background: transparent;" class="sp_box" onclick="_bet2('H',2);"></span>
<span id="b-6" style="position: absolute;display: inline-block;width: 67px;height: 57px;top: 169px;left: 431px;cursor:pointer;background: transparent;" class="sp_box" onclick="_bet2('6',3);"></span>

<span id="b-3" style="position: absolute;display: inline-block;width: 68px;height: 56px;top: 228px;left: 293px;cursor:pointer;background: transparent;" class="sp_box" onclick="_bet2('3',3);"></span>
<span id="b-4" style="position: absolute; display: inline-block;width: 66px;height: 56px;top: 228px;left: 363px; cursor:pointer;background: transparent;" class="sp_box" onclick="_bet2('4',3);"></span>

<span id="b-3-6" style="position: absolute;display: inline-block;width: 49px;height: 23px;top: 287px;left: 242px;cursor:pointer;background: transparent;" class="sp_box" onclick="_bet2('3,6',1);"></span>
<span id="b-2-4" style="position: absolute;display: inline-block;width: 68px;height: 23px;top: 287px;left: 293px;cursor:pointer;background: transparent;" class="sp_box" onclick="_bet2('2,4',1);"></span>
<span id="b-3-5" style="position: absolute;display: inline-block;width: 66px;height: 23px;top: 287px;left: 363px;cursor:pointer;background: transparent;" class="sp_box" onclick="_bet2('3,5',1);"></span>
<span id="b-4-1" style="position: absolute;display: inline-block;width: 48px;height: 23px;top: 287px;left: 431px;cursor:pointer;background: transparent;" class="sp_box" onclick="_bet2('4,1',1);"></span>


<div id="view_count2">
  <div id="game_stat_4">

  <table width="120" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td align="left" width="30"><img src="img/hilo/25/hilo1.png" width="25"></td>
      <td align="left" width="90"><span class="bet_count 1">0</span></td>

      <td align="left"><img src="img/hilo/25/hiloL.png" width="25"></td>
      <td align="left"><span class="bet_count 7">0</span></td>
    </tr>
    <tr>
      <td align="left"><img src="img/hilo/25/hilo2.png" width="25"></td>
      <td align="left"><span class="bet_count 2">0</span></td>

       <td align="left"><img src="img/hilo/25/hiloH.png" width="25"></td>
      <td align="left"><span class="bet_count 8">0</span></td>
    </tr>
    <tr>
      <td align="left"><img src="img/hilo/25/hilo3.png" width="25"></td>
      <td align="left"><span class="bet_count 3">0</span></td>

      <td align="left"><img src="img/hilo/25/hilo11.png" width="25"></td>
      <td align="left"><span class="bet_count 9">0</span></td>
    </tr>
    <tr>
      <td align="left"><img src="img/hilo/25/hilo4.png" width="25"></td>
      <td align="left"><span class="bet_count 4">0</span></td>

      <td></td><td></td>
    </tr>
    <tr>
      <td align="left"><img src="img/hilo/25/hilo5.png" width="25"></td>
      <td align="left"><span class="bet_count 5">0</span></td>

      <td></td><td></td>
    </tr>
    <tr>
      <td align="left"><img src="img/hilo/25/hilo6.png" width="25"></td>
      <td align="left"><span class="bet_count 6">0</span></td>

      <td></td><td></td>
    </tr>  
     <!-- <tr>
      <td align="left"><img src="img/hilo/25/hiloL.png" width="25"></td>
      <td align="left"><span class="bet_count 7">0</span></td>
    </tr> -->
    <!-- <tr>
      <td align="left"><img src="img/hilo/25/hiloH.png" width="25"></td>
      <td align="left"><span class="bet_count 8">0</span></td>
    </tr> -->
 
    <!-- <tr>
      <td align="left"><img src="img/hilo/25/hilo11.png" width="25"></td>
      <td align="left"><span class="bet_count 9">0</span></td>
    </tr> -->
  </tbody>
</table>
  </div>
</div>

<div class="bttn_container" style="bottom: 43px;">  
<!-- <?if($_SESSION[crid1]==1){?> -->
<button class="btn_le btn_small" onclick="$('#how_to_hilo').slideUp('fast'); $('#stats_hilo').slideToggle('fast')"><?=$lang_member[155];?></button>
<!-- <?}?> -->
<button class="btn_le btn_small danger" onclick="$('#how_to_hilo').slideToggle('fast'); $('#stats_hilo').slideUp('fast');"><?=$lang_member[157];?></button>
</div>

<!-- <button style="position:absolute;bottom: 20px;right: 80px;padding: 1px;font-size: 16px;font-weight: bold; cursor:pointer;" onclick="$('#how_to_hilo').slideToggle('slow');">วิธีเล่น</button> -->
</div>
<div id="how_to_hilo" class="ht_st_container">
<h3><?=$lang_member[157];?></h3>
<p> <?=$lang_member[158];?></p>
<table border="0" cellspacing="0" cellpadding="0" class="ball ht_tb">
  <tr class="xsboku" >
    <td width="22%" align="center"><?=$lang_member[160];?></td>
    <td width="13%" align="center"><?=$lang_member[162];?></td>
    <td width="65%" align="center"><?=$lang_member[163];?></td>
  </tr>
  <tr>
    <td><?=$lang_member[225];?></td>
    <td align="center"><?=$arr_hilo_pay[5];?></td>
    <td><?=$lang_member[230];?></td>
  </tr>
  <tr>
    <td><?=$lang_member[226];?></td>
    <td align="center"><?=$arr_hilo_pay[1];?></td>
    <td><?=$lang_member[232];?></td>
  </tr>
  <tr>
    <td><?=$lang_member[228];?></td>
    <td align="center"><?=$arr_hilo_pay[2];?></td>
    <td><?=$lang_member[233];?></td>
  </tr>
  <tr>
    <td><?=$lang_member[165];?></td>
    <td align="center"><?=$arr_hilo_pay[1];?></td>
    <td><?=$lang_member[211];?></td>
  </tr>
  <tr>
    <td><?=$lang_member[209];?></td>
    <td align="center"><?=$arr_hilo_pay[3];?></td>
    <td><?=$lang_member[213];?></td>
  </tr>
  <tr>
    <td>X-X-X</td>
    <td align="center"><?=$arr_hilo_pay[4];?></td>
    <td><?=$lang_member[215];?></td>
  </tr>
</table>
<br>
</div>

<?
  $_rows = 4;
  $_cols = 10;
  $_cellKey = "hilo";
?>
<div id="stats_hilo" class="ht_st_container">
  <h3><?=$lang_member[155];?></h3>
  <? echo createStatsTable($_rows, $_cols, $_cellKey); ?>
  <br>
</div>