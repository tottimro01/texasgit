<?
$sql="select * from bom_tb_config where con_id=1";
$rec=sql_array($sql);
$bet_id=$rec['con_id_games'];

$img_bg="games/img/bg_2hit.png";
?>
<style>
#view_count4 {
  width: 340px;
  position: absolute;
  top: 280px;
  left: 190px;
  color:#fff;
}
#view_count4 table td {
  /*height: 31px;
  padding-right: 25px;*/
  font-size: 9px;
}
</style>

<div style="background:url(<?=$img_bg;?>?v=1) no-repeat; color:#000; width:720px; height:364px; position:relative;">

<div id="bet_time4" class="bet_time" style="position: absolute;top: 12px;left: 282px;width: 157px;height: 57px;font-size: 30px;line-height: 57px;color: red;text-align: center;font-weight: bold;display: block;">40</div>

<span id="cl-1" style="position: absolute;display: inline-block;width: 132px;height: 121px;top: 152px;left: 211px;cursor:pointer;background: transparent;border-radius: 12px;" class="sp_box" onclick="_bet4(1);"></span>
<span id="cl-2" style="position: absolute;display: inline-block;width: 132px;height: 121px;top: 152px;left: 378px;cursor:pointer;background: transparent;border-radius: 12px;" class="sp_box" onclick="_bet4(2);"></span>

<div id="view_count4">
  <div id="game_stat_1">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tbody>
        <tr>
          <td align="center" width="50%"><span class="bet_count 1">0</span></td>
          <td align="center" width="50%"><span class="bet_count 2">0</span></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<div class="bttn_container">  
<!-- <?if($_SESSION[crid1]==1){?> -->
<button class="btn_le btn_small" onclick="$('#how_to_color').slideUp('fast'); $('#stats_color').slideToggle('fast')"><?=$lang_member[155];?></button>
<!-- <?}?> -->
<button class="btn_le btn_small danger" onclick="$('#how_to_color').slideToggle('fast'); $('#stats_color').slideUp('fast');"><?=$lang_member[157];?></button>
</div>

</div>
<div id="how_to_color" class="ht_st_container">
  <h3><?=$lang_member[157];?></h3>
  <p><?=$lang_member[158];?></p>
  <table border="0" cellspacing="0" cellpadding="0" class="ball ht_tb">
    <tr class="xsboku" >
      <td width="22%" align="center"><?=$lang_member[160];?></td>
      <td width="13%" align="center"><?=$lang_member[162];?></td>
      <td width="65%" align="center"><?=$lang_member[163];?></td>
    </tr>
  
    <tr>
      <td><?=$lang_member[165];?></td>
      <td align="center">1.90</td>
      <td><?=$lang_member[166];?></td>
    </tr>
  </table>
  <br>
</div>

<?
  $_rows = 6;
  $_cols = 10;
  $_cellKey = "color";
?>
<div id="stats_color" class="ht_st_container">
  <h3><?=$lang_member[155];?></h3>
  <? echo createStatsTable($_rows, $_cols, $_cellKey); ?>
  <br>
</div>