<?
$url_file="json/bet_id.txt";
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
$bet_id=$date2_bet[0][id];
?>
<style>
#view_count4 {
  color:#ffffff;

}
#view_count4 table td {
    /*height: 31px;
    padding-right: 25px;*/
    font-size: 9px;
}
</style>

 <div class="row">
        <div id="bet_time4" class="bet_time" style="width: 107px;height: 37px;font-size: 20px;line-height: 37px;color: red;text-align: center;font-weight: bold;display: block; margin:auto; background-color:#000000;">90</div>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
  <tbody>
    <tr>
      <td align="center" width="50%"><img id="cl-1" src="img/2hit/1.png" height="52" onclick="_bet4(1);" style="cursor:pointer;"></td>
      <td align="center" width="50%"><img id="cl-2" src="img/2hit/2.png" height="52" onclick="_bet4(2);" style="cursor:pointer;"></td>
    </tr>
  </tbody>
</table>
<div id="view_count4">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td align="center" width="50%">0</td>
      <td align="center" width="50%">0</td>
    </tr>
  </tbody>
</table>
</div>
 </div>