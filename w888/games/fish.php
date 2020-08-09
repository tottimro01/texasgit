<?
$sql="select * from bom_tb_config where con_id=1";
$rec=sql_array($sql);
$bet_id=$rec['con_id_games'];

$img_bg="games/img/bg_fish4.jpg";
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
    width: 120px;
    position: absolute;
    top: 148px;
    left: 65px;
  color:#fff;

}
#view_count3 table td {
    /*height: 31px;
    padding-right: 25px;*/
    font-size: 9px;
}
#bet_time3 img{
  margin-top: 4px;
}
</style>

<div style="background:url(<?=$img_bg;?>?v=2) no-repeat; color:#000; width:720px; height:405px; position:relative;">
<div id="result_fish" style="position:absolute; top:10px; left:292px; width:150px; height:140px;"></div>  

<div id="bet_time3" class="bet_time"  style="position: absolute;top: 12px;left: 282px;width: 157px;height: 57px;font-size: 30px;line-height: 57px;color: red;text-align: center;font-weight: bold;display: block;">40</div>

<span id="fb-1" style="position: absolute;display: inline-block;width: 94px;height: 96px;top: 117px;left: 203px;cursor:pointer;background: transparent;border-radius: 15px;" class="sp_box" onclick="_bet3(1);"></span>
<span id="fb-2" style="position: absolute; display: inline-block;width: 94px;height: 96px;top: 117px;left: 312px; cursor:pointer;background: transparent;border-radius: 15px;" class="sp_box" onclick="_bet3(2);"></span>
<span id="fb-3" style="position: absolute; display: inline-block;width: 94px;height: 96px;top: 117px;left: 420px; cursor:pointer;background: transparent;border-radius: 15px;" class="sp_box" onclick="_bet3(3);"></span>
<span id="fb-4" style="position: absolute; display: inline-block;width: 94px;height: 96px;top: 226px;left: 203px; cursor:pointer;background: transparent;border-radius: 15px;" class="sp_box" onclick="_bet3(4);"></span>
<span id="fb-5" style="position: absolute; display: inline-block;width: 94px;height: 96px;top: 226px;left: 312px; cursor:pointer;background: transparent;border-radius: 15px;" class="sp_box" onclick="_bet3(5);"></span>
<span id="fb-6" style="position: absolute; display: inline-block;width: 94px;height: 96px;top: 226px;left: 420px; cursor:pointer;background: transparent;border-radius: 15px;" class="sp_box" onclick="_bet3(6);"></span>

<div id="view_count3">
  <div id="game_stat_5">

  <table width="120" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td align="left" width="30"><img src="img/fish/25/1.png" width="25"></td>
      <td align="left" width="90"><span class="bet_count 1">0</span></td>
    </tr>
    <tr>
      <td align="left"><img src="img/fish/25/2.png" width="25"></td>
      <td align="left"><span class="bet_count 2">0</span></td>
    </tr>
    <tr>
      <td align="left"><img src="img/fish/25/3.png" width="25"></td>
      <td align="left"><span class="bet_count 3">0</span></td>
    </tr>
    <tr>
      <td align="left"><img src="img/fish/25/4.png" width="25"></td>
      <td align="left"><span class="bet_count 4">0</span></td>
    </tr>
    <tr>
      <td align="left"><img src="img/fish/25/5.png" width="25"></td>
      <td align="left"><span class="bet_count 5">0</span></td>
    </tr>
    <tr>
      <td align="left"><img src="img/fish/25/6.png" width="25"></td>
      <td align="left"><span class="bet_count 6">0</span></td>
    </tr>
  </tbody>
</table>
</div>
</div>

<div class="bttn_container" style="bottom: 18px;">  
<!-- <?if($_SESSION[crid1]==1){?> -->
<button class="btn_le btn_small" onclick="$('#how_to_fish').slideUp('fast'); $('#stats_fish').slideToggle('fast')"><?=$lang_member[155];?></button>
<!-- <?}?> -->
<button class="btn_le btn_small danger" onclick="$('#how_to_fish').slideToggle('fast'); $('#stats_fish').slideUp('fast');"><?=$lang_member[157];?></button>
</div>

<!-- <button style="position:absolute;bottom: 20px;right: 80px;padding: 1px;font-size: 16px;font-weight: bold; cursor:pointer;" onclick="$('#how_to_fish').slideToggle('slow');">วิธีเล่น</button> -->
</div>
<div id="how_to_fish" class="ht_st_container">
<h3><?=$lang_member[157];?></h3>
<p> <?=$lang_member[158];?></p>
<table border="0" cellspacing="0" cellpadding="0" class="ball ht_tb">
  <tr class="xsboku" >
    <td width="22%" align="center"><?=$lang_member[160];?></td>
    <td width="13%" align="center"><?=$lang_member[162];?></td>
    <td width="65%" align="center"><?=$lang_member[163];?></td>
  </tr>
  <tr>
    <td><?=$lang_member[165];?></td>
    <td align="center"><?=$arr_fish_pay[1];?></td>
    <td><?=$lang_member[211];?></td>
  </tr>
  <tr>
    <td><?=$lang_member[209];?></td>
    <td align="center"><?=$arr_fish_pay[2];?></td>
    <td><?=$lang_member[213];?></td>
  </tr>
  <tr>
    <td>X-X-X</td>
    <td align="center"><?=$arr_fish_pay[3];?></td>
    <td><?=$lang_member[215];?></td>
  </tr>
</table>
<br>
</div>

<?
  $_rows = 3;
  $_cols = 10;
  $_cellKey = "fish";
?>
<div id="stats_fish" class="ht_st_container">
  <h3><?=$lang_member[155];?></h3>
  <? echo createStatsTable($_rows, $_cols, $_cellKey); ?>
  <br>
</div>