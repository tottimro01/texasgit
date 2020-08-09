<?
$sql="select * from bom_tb_config where con_id=1";
$rec=sql_array($sql);
$bet_id=$rec['con_id_games'];

$img_bg="games/img/bg_dargon.jpg";
?>
<style>
#view_count5 {
  width: 450px;
  position: absolute;
  top: 305px;
  left: 135px;
  color:#fff;
}
#view_count5 table td {
  /*height: 31px;
  padding-right: 25px;*/
  font-size: 9px;
}
</style>

<div style="background:url(<?=$img_bg;?>?v=1) no-repeat; color:#000; width:720px; height:364px; position:relative;">

<div id="bet_time5" class="bet_time"  style="position: absolute;top: 12px;left: 282px;width: 157px;height: 57px;font-size: 30px;line-height: 57px;color: red;text-align: center;font-weight: bold;display: block;">40</div>

<span id="dt-1" style="position: absolute;display: inline-block;width: 120px;height: 163px;top: 128px;left: 164px;cursor:pointer;background: transparent;border-radius: 15px;" class="sp_box" onclick="_bet5(1);"></span>
<span id="dt-2" style="position: absolute;display: inline-block;width: 120px;height: 163px;top: 128px;left: 437px;cursor:pointer;background: transparent;border-radius: 15px;" class="sp_box" onclick="_bet5(2);"></span>
<span id="dt-3" style="position: absolute;display: inline-block;width: 120px;height: 163px;top: 128px;left: 300px;cursor:pointer;background: transparent;border-radius: 15px;" class="sp_box" onclick="_bet5(3);"></span>

<div id="view_count5">
  <div id="game_stat_2">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tbody>
      <tr>
        <td align="center" width="33%"><span class="bet_count 1">0</span></td>
        <td align="center" width="33%"><span class="bet_count 2">0</span></td>
        <td align="center" width="33%"><span class="bet_count 3">0</span></td>
      </tr>
    </tbody>
  </table>
  </div>
</div>

<div class="bttn_container">  
<!-- <?if($_SESSION[crid1]==1){?> -->
<button class="btn_le btn_small" onclick="$('#how_to_dt').slideUp('fast'); $('#stats_dt').slideToggle('fast')"><?=$lang_member[155];?></button>
<!-- <?}?> -->
<button class="btn_le btn_small danger" onclick="$('#how_to_dt').slideToggle('fast'); $('#stats_dt').slideUp('fast');"><?=$lang_member[157];?></button>
</div>

<!-- <button style="position:absolute;bottom: 20px;right: 80px;padding: 1px;font-size: 16px;font-weight: bold; cursor:pointer;" onclick="$('#how_to_dt').slideToggle('slow');">วิธีเล่น</button> -->
</div>
<div id="how_to_dt" class="ht_st_container">
<h3><?=$lang_member[157];?></h3>
<p> <?=$lang_member[158];?></p>

<table border="0" cellspacing="0" cellpadding="0" class="ball ht_tb">
  <tr class="xsboku" >
    <td width="22%" align="center"><?=$lang_member[160];?></td>
    <td width="13%" align="center"><?=$lang_member[162];?></td>
    <td width="65%" align="center"><?=$lang_member[163];?></td>
  </tr>
  <tr>
    <td><?=$lang_member[1216];?></td>
        <td align="center"><?=$arr_dragon_pay[1];?></td>
    <td><?=$lang_member[221];?></td>
  </tr>
  <tr>
    <td><?=$lang_member[1215];?></td>
        <td align="center"><?=$arr_dragon_pay[2];?></td>
    <td><?=$lang_member[222];?></td>
  </tr>
    <tr>
    <td><?=$lang_member[220];?></td>
        <td align="center"><?=$arr_dragon_pay[3];?></td>
    <td><?=$lang_member[223];?></td>
  </tr>
</table>
<br>
</div>

<?
  $_rows = 6;
  $_cols = 10;
  $_cellKey = "dt";
?>
<div id="stats_dt" class="ht_st_container">
  <h3><?=$lang_member[155];?></h3>
  <? echo createStatsTable($_rows, $_cols, $_cellKey); ?>
  <br>
</div>