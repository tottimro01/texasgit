<?
$url_file="json/bet_id.txt";
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
$bet_id=$date2_bet[0][id];
?>
<style>
#view_count5 {
  color:#ffffff;

}
#view_count5 table td {
    /*height: 31px;
    padding-right: 25px;*/
    font-size: 9px;
}
</style>
 <div class="row">

<div id="bet_time5" class="bet_time"  style="width: 107px;height: 37px;font-size: 20px;line-height: 37px;color: red;text-align: center;font-weight: bold;display: block; margin:auto; background-color:#000000;">90</div>

<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
  <tbody>
    <tr>
      <td align="center" width="33%"><div id="dt-1" style="width: 38px; height:52px; background:url(img/dragon/1.png?v=1) no-repeat center center; background-size: contain; cursor:pointer;" onclick="_bet5(1);"></div></td>
      <td align="center" width="33%"><div id="dt-3" style="width: 38px; height:52px; background:url(img/dragon/3.png?v=1) no-repeat center center; background-size: contain; cursor:pointer;" onclick="_bet5(3);"></div></td>
      <td align="center" width="33%"><div id="dt-2" style="width: 38px; height:52px; background:url(img/dragon/2.png?v=1) no-repeat center center; background-size: contain; cursor:pointer;" onclick="_bet5(2);"></div></td>
    </tr>
  </tbody>
</table>
<div id="view_count5">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td align="center" width="33%">0</td>
      <td align="center" width="33%">0</td>
      <td align="center" width="33%">0</td>
    </tr>
  </tbody>
</table>
</div>


</div>