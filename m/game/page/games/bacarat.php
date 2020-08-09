<?
$url_file="json/bet_id.txt";
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
$bet_id=$date2_bet[0][id];
?>
<style type="text/css">
#bet_time {
  font-size: 36px;
}
.cu:hover {
  background: #FF6;
  opacity: 0.4;
  filter: alpha(opacity=40);
}
.cu2:hover {
  opacity: 0.4;
  filter: alpha(opacity=40);
}
.cu2 {
  cursor: pointer;
}
.ccm {
  -webkit-border-radius: 7px;
  -moz-border-radius: 7px;
  border-radius: 7px;
  padding: 2px;
}
.cca1 {
  color: #0FF;
}
.cca2 {
  color: #F00;
}
.cca3 {
  color: #FF0;
}
.cca4 {
  color: #F00;
}
.cca5 {
  color: #F00;
}
.cca6 {
  color: #0FF;
}
.cca7 {
  color: #F00;
}
.cview {
  font-size: 20px;
}
#div2 {
  height: 130px;
  margin-bottom: 12px;
}
#div2 {
  overflow-y: scroll;
}
#view_count1 {
      position: absolute;
    top: 47px;
}
</style>

 <div class="row" style="position: relative;">

<div id="bet_time1" class="bet_time"  style="width: 107px;height: 37px;font-size: 20px;line-height: 37px;color: red;text-align: center;font-weight: bold;display: block; margin:auto; background-color:#000000;">90</div>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:10px;">
  <tbody>
    <tr>
      <td align="center" width="25%" rowspan="2"><div style="width:98%; height:80px; background-color:#000000; text-align:center; color:#10abe4; line-height: 80px; font-size:20px; font-weight: bold;">ผู้เล่น</div></td>
      <td align="center" width="50%">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td align="center" width="33%"><div style="width:98%; height:39px; background-color:#000000; text-align:center; color:#10abe4; line-height: 39px; font-size:90%; font-weight: bold;">ไพ่คู่ผู้เล่น</div></td>
      <td align="center" width="33%"><div style="width:98%; height:39px; background-color:#000000; text-align:center; color:yellow; line-height: 39px; font-size:90%; font-weight: bold;">เสมอ</div></td>
      <td align="center" width="33%"><div style="width:98%; height:39px; background-color:#000000; text-align:center; color:red; line-height: 39px; font-size:90%; font-weight: bold;">ไพ่คู่เจ้ามือ</div></td>
    </tr>
  </tbody>
</table>

      </td>
       <td align="center" width="25%" rowspan="2"><div style="width:98%; height:80px; background-color:#000000; text-align:center; color:red; line-height: 80px; font-size:20px; font-weight: bold;">เจ้ามือ</div></td>
    </tr>
    <tr>
      <td align="center" width="50%">
        
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td align="center" width="50%"><div style="width:98%; height:39px; background-color:#000000; text-align:center; color:red; line-height: 39px; font-size:100%; font-weight: bold;">ใหญ่</div></td>
      <td align="center" width="50%"><div style="width:98%; height:39px; background-color:#000000; text-align:center; color:red; line-height: 39px; font-size:100%; font-weight: bold;">เล็ก</div></td>
    </tr>
  </tbody>
</table>
      </td>
    </tr>
  </tbody>
</table>
<div style="width: 100%; height: 80px; font-size: 9px;" id="view_count1">
<table width="100%" height="80" border="0" cellspacing="0" cellpadding="0">
        <tbody><tr>
          <td width="24%" rowspan="2"><div style="width: 100%; height: 80px; text-align: center; line-height: 125px;">0</div></td>
          <td width="17%"><div style="width: 100%; text-align: center;height: 40px; line-height: 65px;">0</div></td>
          <td colspan="2"><div style="width: 100%; text-align: center; height: 40px; line-height: 65px;">0</div></td>
          <td width="17%"><div style="width: 100%; text-align: center; height: 40px; line-height: 65px;">0</div></td>
          <td width="24%" rowspan="2" ><div style="width: 100%; height: 80px; text-align: center; line-height: 125px;">0</div></td>
        </tr>
        <tr>
          <td colspan="2"><div style="width: 100%; text-align: center; height: 40px; line-height: 65px;">0</div></td>
          <td colspan="2"><div style="width: 100%; text-align: center; height: 40px; line-height: 65px;">0</div></td>
        </tr>
      </tbody></table>
</div>

<span id="bc-1" style="position: absolute;display: inline-block;width: 58px;height: 80px;top: 47px;left: 10px;" ></span>
<span id="bc-2" style="position: absolute;display: inline-block;width: 58px;height: 80px;top:  47px;left: 78px;" ></span>

<span id="bc-3" style="position: absolute;display: inline-block;width: 58px;height: 80px;top:  47px;right: 78px;" ></span>
<span id="bc-4" style="position: absolute;display: inline-block;width: 58px;height: 80px;top:  47px;right: 10px;"></span>


<table width="100%" border="0" cellspacing="0" cellpadding="0" style="position: absolute; top:47px;">
  <tbody>
    <tr>
      <td align="center" width="25%" rowspan="2"><div style="width:98%; height:80px; text-align:center; color:#10abe4; line-height: 80px; font-size:20px; font-weight: bold; cursor:pointer;" onclick="_bet1(1);"></div></td>
      <td align="center" width="50%">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td align="center" width="33%"><div style="width:98%; height:39px; text-align:center; color:#10abe4; line-height: 39px; font-size:100%; font-weight: bold; cursor:pointer;" onclick="_bet1(2);"></div></td>
      <td align="center" width="33%"><div style="width:98%; height:39px; text-align:center; color:yellow; line-height: 39px; font-size:100%; font-weight: bold; cursor:pointer;" onclick="_bet1(4);"></div></td>
      <td align="center" width="33%"><div style="width:98%; height:39px; text-align:center; color:red; line-height: 39px; font-size:100%; font-weight: bold; cursor:pointer;" onclick="_bet1(3);"></div></td>
    </tr>
  </tbody>
</table>

      </td>
       <td align="center" width="25%" rowspan="2"><div style="width:98%; height:80px; text-align:center; color:red; line-height: 80px; font-size:20px; font-weight: bold; cursor:pointer;" onclick="_bet1(7);"></div></td>
    </tr>
    <tr>
      <td align="center" width="50%">
        
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td align="center" width="50%"><div style="width:98%; height:39px; text-align:center; color:red; line-height: 39px; font-size:100%; font-weight: bold; cursor:pointer;" onclick="_bet1(5);"></div></td>
      <td align="center" width="50%"><div style="width:98%; height:39px; text-align:center; color:red; line-height: 39px; font-size:100%; font-weight: bold; cursor:pointer;" onclick="_bet1(6);"></div></td>
    </tr>
  </tbody>
</table>
      </td>
    </tr>
  </tbody>
</table>



</div>