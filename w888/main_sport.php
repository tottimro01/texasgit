<? session_start();
require('inc/conn.php');
require('inc/function.php');

$rec = sql_array("select * from bom_tb_config where con_id = 1;");

if($rec["con_open_sport"]==0){ 
  include 'sa_close.php'; 
  exit(); 
}  
require("lang/variable_lang.php");
// require("lang/member_lang.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UnderOver</title>
<link href="template/maxbet/public/css/M_UnderOver.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.js"></script>
<script language="JavaScript" type="text/javascript" src="commJS/M_Util.js"></script>
<script src="js/socket.io.js"></script>

<!-- <script src="<?=$hostserver;?>/commJS/jquery.min.js"></script> -->
<link rel="stylesheet" href="<?=$hostserver;?>/js/jquery-confirm/jquery-confirm.min.css">
<link rel="stylesheet" href="<?=$hostserver;?>/js/jquery-confirm/jquery-confirm-custom.css" />
<script src="<?=$hostserver;?>/js/jquery-confirm/jquery-confirm.min.js"></script>
</head>
<body>
<? 
  include 'mname_tmpl.php'; 
  include 'mtimezone_tmpl.php';
?>
<div id="MainFly" class="MainFly">
<div id="column1" class="titleBar">
  <div class="title"><?=$lang_member[830];?></div>
    <div class="right">
        <a id="btnSwitchBack" href="javascript:LiveInfoBackButton();trailblazer.gvend();" class="button mark" style="display:none" title="กลับ"><span>กลับ</span></a> 
      <!-- <a id="b_SwitchToParlay" href="javascript:SwitchToParlay('1');" class="button mark" style="display: block;" title="สเต็ป"><span>บอลชุด</span></a>  -->
      <a id="b_SwitchToParlay" href="#" onclick="OnSwitchSportMixParley(this)" class="button mark" style="display: block;" title="สเต็ป" data-parley="mixparley"><span>สเต็ป</span></a> 
  
      
        <div id="aSorter_Div" tabindex="6" hidefocus="" onkeypress="onKeyPressSelecter('aSorter',event);return false;" onclick="onClickSelecter('aSorter');return false;" class="button select icon">
<input type="hidden" name="aSorter" id="aSorter" value="0">
<span id="aSorter_Txt" title="เรียงลำดับตามปกติ"><div id="aSorter_Icon" class="icon_NO"></div></span>
<ul id="aSorter_menu" class="submenu">
<li title="เรียงตามเวลา" onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('aSorter',this,'1',true);"><div class="icon_ST"></div>เรียงตามเวลา</li>
<li title="เรียงลำดับตามปกติ" onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('aSorter',this,'0',true);"><div class="icon_NO"></div>เรียงลำดับตามปกติ</li>
</ul>
</div>

        <input type="hidden" name="selectLeageHidden" id="selectLeageHidden" />
        <!-- <a href="javascript:openLeague(640,'เลือกลีค','t','1','1,3,5,7,8,15','0','UnderOver');" class="button selectLeague" style="display:inline-block;" title="เลือกลีค"> -->
        <a href="javascript:selectLeague();" class="button selectLeague" style="display:inline-block;" title="เลือกลีค">
          <span>
            <div id="League_New" class="">
              <div id="SelLeagueIcon" class="displayOff">
                <div class="icon">
                </div>
              </div>
              <div class="events">
                <div class="normal">(</div><div id="CustSelL" class="selected displayOff">0</div><div id="AllSelL" class="displayOn">0</div><div class="normal">/</div><div id="TotalLeagueCnt" class="normal">0</div><div class="normal">)</div>
              </div>
              ลีกค์</div>
            <div id="League_Old" class="displayOff">
              เลือกลีค</div>
            </span>
        </a>       

        <div id="disstyle_Div" tabindex="6" hidefocus="" onkeypress="onKeyPressSelecter('disstyle',event);return false;" onclick="onClickSelecter('disstyle');return false;" class="button select icon">
<input type="hidden" name="disstyle" id="disstyle" value="3">
<span id="disstyle_Txt" title="แถวคู่"><div id="disstyle_Icon" class="icon_DL"></div></span>
<ul id="disstyle_menu" class="submenu" style="visibility: hidden;">
<li title="แถวเดี่ยว" onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('disstyle',this,'1',true);changeDisplayMode('1','ohoking.com'); parent.focus();"><div class="icon_SL"></div>แถวเดี่ยว</li>
<li title="แถวคู่" onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('disstyle',this,'3',true);changeDisplayMode('3','ohoking.com'); parent.focus();"><div class="icon_DL"></div>แถวคู่</li>
<li title="เต็มเวลา" onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('disstyle',this,'1F',true);changeDisplayMode('1F','ohoking.com'); parent.focus();"><div class="icon_FT"></div>เต็มเวลา</li>
<li title="ครึ่งแรก" onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('disstyle',this,'1H',true);changeDisplayMode('1H','ohoking.com'); parent.focus();"><div class="icon_HT"></div>ครึ่งแรก</li>
</ul>
</div>

        
        
            <div id="selOddsType_Div" tabindex="6" hidefocus="" onkeypress="onKeyPressSelecter('selOddsType',event);return false;" onclick="onClickSelecter('selOddsType');return false;" class="button select icon">
<input type="hidden" name="selOddsType" id="selOddsType" value="4">
<span id="selOddsType_Txt" title="การเดิมพันแบบมาเลย์"><div id="selOddsType_Icon" class="icon_MY"></div></span>
<ul id="selOddsType_menu" class="submenu">
<li title="ค่าน้ำแบบฮ่องกง" onmouseover="onOver(this)" class="oddsLI-2" onmouseout="onOut(this)" onclick="setSelecter('selOddsType',this,'2',true);changeOddsType_ou(2);"><div class="icon_HK"></div>ค่าน้ำแบบฮ่องกง</li>
<li title="การเดิมพันแบบมีทศนิยม" onmouseover="onOver(this)" class="oddsLI-1" onmouseout="onOut(this)" onclick="setSelecter('selOddsType',this,'1',true);changeOddsType_ou(1);"><div class="icon_Dec"></div>การเดิมพันแบบมีทศนิยม</li>
<li title="การเดิมพันแบบมาเลย์" onmouseover="onOver(this)" class="oddsLI-4" onmouseout="onOut(this)" onclick="setSelecter('selOddsType',this,'4',true);changeOddsType_ou(4);"><div class="icon_MY"></div>การเดิมพันแบบมาเลย์</li>
</ul>
</div>

    </div>
</div>
<div id="MiddleLiveInfo" class="MainTVInfo" style="display: none; color:#e8eff5">
  <div class="loadiframe"><iframe id="MiddleLiveInfoFrame" src="" scrolling="no" frameborder="0" style="height: 417px;"></iframe></div>
</div>
</div>

<div class="board" id="menu" style="/* display:none */">
  <ul class="panelInfo checkbox" id="DateContainer" style="/* display: none; */"><li id="DateSpan0"><input name="chkDate_All" id="chkDate_All" type="checkbox" class="noborder" onclick="JavaScript:DateLinkClick(0,true);" value="ทั"><a href="JavaScript:DateLinkClick(0,false);">ทั้งหมด</a></li><li id="DateSpan1"><input name="chkDate" id="chkDate_1" type="checkbox" class="noborder" onclick="JavaScript:DateLinkClick(1,true);" value="09" checked="true"><a href="JavaScript:DateLinkClick(1,false);">09 ()</a></li><li id="DateSpan2"><input name="chkDate" id="chkDate_2" type="checkbox" class="noborder" onclick="JavaScript:DateLinkClick(2,true);" value="10"><a href="JavaScript:DateLinkClick(2,false);">10 ()</a></li><li id="DateSpan3"><input name="chkDate" id="chkDate_3" type="checkbox" class="noborder" onclick="JavaScript:DateLinkClick(3,true);" value="11"><a href="JavaScript:DateLinkClick(3,false);">11 ()</a></li><li id="DateSpan4"><input name="chkDate" id="chkDate_4" type="checkbox" class="noborder" onclick="JavaScript:DateLinkClick(4,true);" value="12"><a href="JavaScript:DateLinkClick(4,false);">12 ()</a></li><li id="DateSpan5"><input name="chkDate" id="chkDate_5" type="checkbox" class="noborder" onclick="JavaScript:DateLinkClick(5,true);" value="13"><a href="JavaScript:DateLinkClick(5,false);">13 ()</a></li><li id="DateSpan6"><input name="chkDate" id="chkDate_6" type="checkbox" class="noborder" onclick="JavaScript:DateLinkClick(6,true);" value="14"><a href="JavaScript:DateLinkClick(6,false);">14 ()</a></li></ul>
  <ul class="panelInfo checkbox" id="SportsContainer"></ul>
</div>



<table id="tmplTable" class="oddsTable" width="100%" cellpadding="0" cellspacing="0" border="0">
  <thead id="header_tb_ball"></thead>
  <tbody id="load_tb_ball_live"></tbody>
  <tbody id="load_tb_ball"></tbody>
</table>

<template id="header_2rows_tmpl">
  <tr>
      <th width="6%" nowrap="">เวลา</th>
      <th width="34%" colspan="2" align="left" class="even">รายการ</th>
      <th style="min-width:78px;max-width:90px;" nowrap="nowrap" class="text-ellipsis" title="เต็มเวลา แต้มต่อ">FT. HDP</th>
      <th style="min-width:78px;max-width:90px;" nowrap="nowrap" class="text-ellipsis" title="เต็มเวลา มากกว่า/น้อยกว่า">FT. O/U</th>
      <th style="min-width:48px;max-width:60px;" nowrap="nowrap" class="text-ellipsis" title="เต็มเวลา ราคาพูล">FT. 1X2</th>
      <th style="min-width:78px;max-width:90px;" nowrap="nowrap" class="even tabt_L text-ellipsis" title="ครึ่งแรก แต้มต่อ">1H. HDP</th>
      <th style="min-width:78px;max-width:90px;" nowrap="nowrap" class="even text-ellipsis" title="ครึ่งแรก มากกว่า/น้อยกว่า">1H. O/U</th>
      <th style="min-width:48px;max-width:60px;" nowrap="nowrap" class="even text-ellipsis" title="ครึ่งแรก ราคาพูล">1H. 1X2</th>
      <th width="1%" nowrap="nowrap"></th>
    </tr>
</template>
<template id="header_1rows_tmpl">
    <tr class="thead_hdp-ou_single-line">
      <th class="th_time" rowspan="2" title="เวลา"><span>เวลา</span></th>
      <th class="th_event even" rowspan="2" title="รายการ"><span>รายการ</span></th>
      <th class="th_full-time" title="เต็มเวลา" colspan="6"><span>เต็มเวลา</span></th>
      <th class="th_half-time even" title="ครึ่งแรก" colspan="6"><span>ครึ่งแรก</span></th>
      <th class="th_last" rowspan="2"></th>
    </tr>
    <tr>
      <th title="แต้มต่อ"><span>แต้มต่อ</span></th>
      <th title="เจ้าบ้าน"><span>เจ้าบ้าน</span></th>
      <th title="ทีมเยือน"><span>ทีมเยือน</span></th>
      <th title="ประตู"><span>ประตู</span></th>
      <th title="มากกว่า"><span>มากกว่า</span></th>
      <th title="น้อยกว่า"><span>น้อยกว่า</span></th>
      <th class="even" title="แต้มต่อ"><span>แต้มต่อ</span></th>
      <th class="even" title="เจ้าบ้าน"><span>เจ้าบ้าน</span></th>
      <th class="even" title="ทีมเยือน"><span>ทีมเยือน</span></th>
      <th class="even" title="ประตู"><span>ประตู</span></th>
      <th class="even" title="มากกว่า"><span>มากกว่า</span></th>
      <th class="even" title="น้อยกว่า"><span>น้อยกว่า</span></th>
    </tr>
</template>
<template id="header_1Frows_tmpl">
    <tr class="thead_hdp-ou_single-line">
      <th class="th_time" rowspan="2" title="เวลา"><span>เวลา</span></th>
      <th class="th_event even" rowspan="2" title="รายการ"><span>รายการ</span></th>
      <th class="th_full-time" title="เต็มเวลา" colspan="6"><span>เต็มเวลา</span></th>
      <th class="th_half-time even" title="ครึ่งแรก" colspan="6"><span>ครึ่งแรก</span></th>
      <th class="th_last" rowspan="2"></th>
    </tr>
    <tr>
      <th title="แต้มต่อ"><span>แต้มต่อ</span></th>
      <th title="เจ้าบ้าน"><span>เจ้าบ้าน</span></th>
      <th title="ทีมเยือน"><span>ทีมเยือน</span></th>
      <th title="ประตู"><span>ประตู</span></th>
      <th title="มากกว่า"><span>มากกว่า</span></th>
      <th title="น้อยกว่า"><span>น้อยกว่า</span></th>
      <th class="even" title="แต้มต่อ"><span>แต้มต่อ</span></th>
      <th class="even" title="เจ้าบ้าน"><span>เจ้าบ้าน</span></th>
      <th class="even" title="ทีมเยือน"><span>ทีมเยือน</span></th>
      <th class="even" title="ประตู"><span>ประตู</span></th>
      <th class="even" title="มากกว่า"><span>มากกว่า</span></th>
      <th class="even" title="น้อยกว่า"><span>น้อยกว่า</span></th>
    </tr>
</template>
<template id="header_1Hrows_tmpl">
    <tr class="thead_hdp-ou_single-line">
      <th class="th_time" rowspan="2" title="เวลา"><span>เวลา</span></th>
      <th class="th_event even" rowspan="2" title="รายการ"><span>รายการ</span></th>
      <th class="th_full-time" title="เต็มเวลา" colspan="6"><span>เต็มเวลา</span></th>
      <th class="th_half-time even" title="ครึ่งแรก" colspan="6"><span>ครึ่งแรก</span></th>
      <th class="th_last" rowspan="2"></th>
    </tr>
    <tr>
      <th title="แต้มต่อ"><span>แต้มต่อ</span></th>
      <th title="เจ้าบ้าน"><span>เจ้าบ้าน</span></th>
      <th title="ทีมเยือน"><span>ทีมเยือน</span></th>
      <th title="ประตู"><span>ประตู</span></th>
      <th title="มากกว่า"><span>มากกว่า</span></th>
      <th title="น้อยกว่า"><span>น้อยกว่า</span></th>
      <th class="even" title="แต้มต่อ"><span>แต้มต่อ</span></th>
      <th class="even" title="เจ้าบ้าน"><span>เจ้าบ้าน</span></th>
      <th class="even" title="ทีมเยือน"><span>ทีมเยือน</span></th>
      <th class="even" title="ประตู"><span>ประตู</span></th>
      <th class="even" title="มากกว่า"><span>มากกว่า</span></th>
      <th class="even" title="น้อยกว่า"><span>น้อยกว่า</span></th>
    </tr>
</template>


<template id="leage_tmpl">
  <tr valign="middle" style="cursor:pointer">      
    <td class="tabtitle"></td>
    <td colspan="9" class="tabtitle"></td>
  </tr>
</template>
<template id="leage_tmpl_1">
  <tr valign="middle" style="cursor:pointer">      
    <td class="tabtitle"></td>
    <td colspan="14" class="tabtitle"></td>
  </tr>
</template>
<template id="leage_tmpl_1F">
  <tr valign="middle" style="cursor:pointer">      
    <td class="tabtitle"></td>
    <td colspan="14" class="tabtitle"></td>
  </tr>
</template>
<template id="leage_tmpl_1H">
  <tr valign="middle" style="cursor:pointer">      
    <td class="tabtitle"></td>
    <td colspan="14" class="tabtitle"></td>
  </tr>
</template>




<template id="ball_tmpl_live">
    <tr class="live displayOn"> 
      <td rowspan="2" class="text_time"></td>
      <td rowspan="2" class="line_unR" valign="top">
        <div></div>
        <div></div>    
        <div></div> 
      </td>
      <td align="right" rowspan="2" nowrap="nowrap"></td>
      <td valign="top" class="none_rline none_dline">
        <div class="line_divL HdpGoalClass"></div>        
        <div class="line_divR OddsDiv "> 
          <a></a><br>          
          <a></a><br>      
        </div>
      </td>
      <td valign="top" class="none_dline none_rline">
        <div class="line_divL HdpGoalClass"></div>        
        <div class="line_divR OddsDiv "> 
          <a></a><br>          
          <a></a><br>        
        </div>
      </td>
      <td rowspan="2" align="right" valign="top" class="tabt_R">
        <div class="line_divL line_divR UdrDogOddsClass "> 
          <a></a><br>          
          <a></a><br>          
          <a></a> 
        </div>
      </td>
      <td valign="top" class="none_rline none_dline">
        <div class="line_divL HdpGoalClass"></div>        
        <div class="line_divR OddsDiv "> 
          <a></a><br>          
          <a></a><br>     
        </div>
      </td>
      <td valign="top" class="none_dline none_rline">
        <div class="line_divL HdpGoalClass"></div>        
        <div class="line_divR OddsDiv "> 
          <a></a><br>          
          <a></a><br>          
        </div>
      </td>
      <td rowspan="2" align="right" valign="top">
        <div class="line_divL line_divR UdrDogOddsClass "> 
          <a></a><br>          
          <a></a><br>          
          <a></a> 
        </div>
      </td>
      <td rowspan="2" align="center" class="breakLine"><span class="displayOn"></span></td>    
    </tr>
    <tr class="bgcpe">      
      <td colspan="2" align="center" class="none_rline none_lline none_tline"></td>
      <td class="none_rline none_tline" colspan="2"></td>    
    </tr>
</template>
<template id="ball_tmpl">
    <tr class="bgcpe displayOn"> 
      <td rowspan="2" class="text_time"></td>
      <td rowspan="2" class="line_unR" valign="top">
        <div></div>
        <div></div>    
        <div></div> 
      </td>
      <td align="right" rowspan="2" nowrap="nowrap"></td>
      <td valign="top" class="none_rline none_dline">
        <div class="line_divL HdpGoalClass"></div>        
        <div class="line_divR OddsDiv "> 
          <a></a><br>          
          <a></a><br>      
        </div>
      </td>
      <td valign="top" class="none_dline none_rline">
        <div class="line_divL HdpGoalClass"></div>        
        <div class="line_divR OddsDiv "> 
          <a></a><br>          
          <a></a><br>        
        </div>
      </td>
      <td rowspan="2" align="right" valign="top" class="tabt_R">
        <div class="line_divL line_divR UdrDogOddsClass "> 
          <a></a><br>          
          <a></a><br>          
          <a></a> 
        </div>
      </td>
      <td valign="top" class="none_rline none_dline">
        <div class="line_divL HdpGoalClass"></div>        
        <div class="line_divR OddsDiv "> 
          <a></a><br>          
          <a></a><br>     
        </div>
      </td>
      <td valign="top" class="none_dline none_rline">
        <div class="line_divL HdpGoalClass"></div>        
        <div class="line_divR OddsDiv "> 
          <a></a><br>          
          <a></a><br>          
        </div>
      </td>
      <td rowspan="2" align="right" valign="top">
        <div class="line_divL line_divR UdrDogOddsClass "> 
          <a></a><br>          
          <a></a><br>          
          <a></a> 
        </div>
      </td>
      <td rowspan="2" align="center" class="breakLine"><span class="displayOn"></span></td>    
    </tr>
    <tr class="bgcpe">      
      <td colspan="2" align="center" class="none_rline none_lline none_tline"></td>
      <td class="none_rline none_tline" colspan="2"></td>    
    </tr>
</template>
<template id="ball_tmpl_1">
  <tr align="center" class="bgcpe displayOn">      
    <td class="text_time"></td>
    <td align="left" class="">        
      <div class="eventLeft">      
        <div></div>        
        <div></div>        
        </div>        
      </td>    
    <td nowrap="nowrap" class="HdpGoalClass"></td>
    <td nowrap="nowrap" class=""><a></a></td>
    <td nowrap="nowrap" class=""><a></a></td>
    <td nowrap="nowrap" class="HdpGoalClass"></td>
    <td nowrap="nowrap" class=""><a></a></td>
    <td nowrap="nowrap" class=""><a></a></td>
    <td nowrap="nowrap" class="tabt_L HdpGoalClass"></td>
    <td nowrap="nowrap" class=""><a></a></td>
    <td nowrap="nowrap" class=""><a></a></td>
    <td nowrap="nowrap" class="HdpGoalClass"></td>
    <td nowrap="nowrap" class=""><a></a></td>
    <td nowrap="nowrap" class=""><a></a></td>
    <td align="center" class="breakLine"><span class="displayOn"></span></td>    
  </tr>
<tr>
  <td class="moreBetType tag displayOff" colspan="16"></td>
</tr>
</template>
<template id="ball_tmpl_1F">
  <tr align="center" class="bgcpe displayOn">      
    <td class="text_time"></td>
    <td align="left" class="">        
      <div class="eventLeft">      
        <div></div>        
        <div></div>        
        </div>        
      </td>    
    <td nowrap="nowrap" class="HdpGoalClass"></td>
    <td nowrap="nowrap" class=""><a></a></td>
    <td nowrap="nowrap" class=""><a></a></td>
    <td nowrap="nowrap" class="HdpGoalClass"></td>
    <td nowrap="nowrap" class=""><a></a></td>
    <td nowrap="nowrap" class=""><a></a></td>
    <td nowrap="nowrap" class="tabt_L HdpGoalClass"></td>
    <td nowrap="nowrap" class=""><a></a></td>
    <td nowrap="nowrap" class=""><a></a></td>
    <td nowrap="nowrap" class="HdpGoalClass"></td>
    <td nowrap="nowrap" class=""><a></a></td>
    <td nowrap="nowrap" class=""><a></a></td>
    <td align="center" class="breakLine"><span class="displayOn"></span></td>    
  </tr>
<tr>
  <td class="moreBetType tag displayOff" colspan="16"></td>
</tr>
</template>
<template id="ball_tmpl_1H">
  <tr align="center" class="bgcpe displayOn">      
    <td class="text_time"></td>
    <td align="left" class="">        
      <div class="eventLeft">      
        <div></div>        
        <div></div>        
        </div>        
      </td>    
    <td nowrap="nowrap" class="HdpGoalClass"></td>
    <td nowrap="nowrap" class=""><a></a></td>
    <td nowrap="nowrap" class=""><a></a></td>
    <td nowrap="nowrap" class="HdpGoalClass"></td>
    <td nowrap="nowrap" class=""><a></a></td>
    <td nowrap="nowrap" class=""><a></a></td>
    <td nowrap="nowrap" class="tabt_L HdpGoalClass"></td>
    <td nowrap="nowrap" class=""><a></a></td>
    <td nowrap="nowrap" class=""><a></a></td>
    <td nowrap="nowrap" class="HdpGoalClass"></td>
    <td nowrap="nowrap" class=""><a></a></td>
    <td nowrap="nowrap" class=""><a></a></td>
    <td align="center" class="breakLine"><span class="displayOn"></span></td>    
  </tr>
<tr>
  <td class="moreBetType tag displayOff" colspan="16"></td>
</tr>
</template>
<script language="JavaScript" type="text/javascript">
var OnlyMROdds=false;
var MD5 = function (s) {
    function L(k, d) {
        return (k << d) | (k >>> (32 - d))
    }

    function K(G, k) {
        var I, d, F, H, x;
        F = (G & 2147483648);
        H = (k & 2147483648);
        I = (G & 1073741824);
        d = (k & 1073741824);
        x = (G & 1073741823) + (k & 1073741823);
        if (I & d) {
            return (x ^ 2147483648 ^ F ^ H)
        }
        if (I | d) {
            if (x & 1073741824) {
                return (x ^ 3221225472 ^ F ^ H)
            } else {
                return (x ^ 1073741824 ^ F ^ H)
            }
        } else {
            return (x ^ F ^ H)
        }
    }

    function r(d, F, k) {
        return (d & F) | ((~d) & k)
    }

    function q(d, F, k) {
        return (d & k) | (F & (~k))
    }

    function p(d, F, k) {
        return (d ^ F ^ k)
    }

    function n(d, F, k) {
        return (F ^ (d | (~k)))
    }

    function u(G, F, aa, Z, k, H, I) {
        G = K(G, K(K(r(F, aa, Z), k), I));
        return K(L(G, H), F)
    }

    function f(G, F, aa, Z, k, H, I) {
        G = K(G, K(K(q(F, aa, Z), k), I));
        return K(L(G, H), F)
    }

    function D(G, F, aa, Z, k, H, I) {
        G = K(G, K(K(p(F, aa, Z), k), I));
        return K(L(G, H), F)
    }

    function t(G, F, aa, Z, k, H, I) {
        G = K(G, K(K(n(F, aa, Z), k), I));
        return K(L(G, H), F)
    }

    function e(G) {
        var Z;
        var F = G.length;
        var x = F + 8;
        var k = (x - (x % 64)) / 64;
        var I = (k + 1) * 16;
        var aa = Array(I - 1);
        var d = 0;
        var H = 0;
        while (H < F) {
            Z = (H - (H % 4)) / 4;
            d = (H % 4) * 8;
            aa[Z] = (aa[Z] | (G.charCodeAt(H) << d));
            H++
        }
        Z = (H - (H % 4)) / 4;
        d = (H % 4) * 8;
        aa[Z] = aa[Z] | (128 << d);
        aa[I - 2] = F << 3;
        aa[I - 1] = F >>> 29;
        return aa
    }

    function B(x) {
        var k = "",
            F = "",
            G, d;
        for (d = 0; d <= 3; d++) {
            G = (x >>> (d * 8)) & 255;
            F = "0" + G.toString(16);
            k = k + F.substr(F.length - 2, 2)
        }
        return k
    }

    function J(k) {
        k = k.replace(/rn/g, "n");
        var d = "";
        for (var F = 0; F < k.length; F++) {
            var x = k.charCodeAt(F);
            if (x < 128) {
                d += String.fromCharCode(x)
            } else {
                if ((x > 127) && (x < 2048)) {
                    d += String.fromCharCode((x >> 6) | 192);
                    d += String.fromCharCode((x & 63) | 128)
                } else {
                    d += String.fromCharCode((x >> 12) | 224);
                    d += String.fromCharCode(((x >> 6) & 63) | 128);
                    d += String.fromCharCode((x & 63) | 128)
                }
            }
        }
        return d
    }
    var C = Array();
    var P, h, E, v, g, Y, X, W, V;
    var S = 7,
        Q = 12,
        N = 17,
        M = 22;
    var A = 5,
        z = 9,
        y = 14,
        w = 20;
    var o = 4,
        m = 11,
        l = 16,
        j = 23;
    var U = 6,
        T = 10,
        R = 15,
        O = 21;
    s = J(s);
    C = e(s);
    Y = 1732584193;
    X = 4023233417;
    W = 2562383102;
    V = 271733878;
    for (P = 0; P < C.length; P += 16) {
        h = Y;
        E = X;
        v = W;
        g = V;
        Y = u(Y, X, W, V, C[P + 0], S, 3614090360);
        V = u(V, Y, X, W, C[P + 1], Q, 3905402710);
        W = u(W, V, Y, X, C[P + 2], N, 606105819);
        X = u(X, W, V, Y, C[P + 3], M, 3250441966);
        Y = u(Y, X, W, V, C[P + 4], S, 4118548399);
        V = u(V, Y, X, W, C[P + 5], Q, 1200080426);
        W = u(W, V, Y, X, C[P + 6], N, 2821735955);
        X = u(X, W, V, Y, C[P + 7], M, 4249261313);
        Y = u(Y, X, W, V, C[P + 8], S, 1770035416);
        V = u(V, Y, X, W, C[P + 9], Q, 2336552879);
        W = u(W, V, Y, X, C[P + 10], N, 4294925233);
        X = u(X, W, V, Y, C[P + 11], M, 2304563134);
        Y = u(Y, X, W, V, C[P + 12], S, 1804603682);
        V = u(V, Y, X, W, C[P + 13], Q, 4254626195);
        W = u(W, V, Y, X, C[P + 14], N, 2792965006);
        X = u(X, W, V, Y, C[P + 15], M, 1236535329);
        Y = f(Y, X, W, V, C[P + 1], A, 4129170786);
        V = f(V, Y, X, W, C[P + 6], z, 3225465664);
        W = f(W, V, Y, X, C[P + 11], y, 643717713);
        X = f(X, W, V, Y, C[P + 0], w, 3921069994);
        Y = f(Y, X, W, V, C[P + 5], A, 3593408605);
        V = f(V, Y, X, W, C[P + 10], z, 38016083);
        W = f(W, V, Y, X, C[P + 15], y, 3634488961);
        X = f(X, W, V, Y, C[P + 4], w, 3889429448);
        Y = f(Y, X, W, V, C[P + 9], A, 568446438);
        V = f(V, Y, X, W, C[P + 14], z, 3275163606);
        W = f(W, V, Y, X, C[P + 3], y, 4107603335);
        X = f(X, W, V, Y, C[P + 8], w, 1163531501);
        Y = f(Y, X, W, V, C[P + 13], A, 2850285829);
        V = f(V, Y, X, W, C[P + 2], z, 4243563512);
        W = f(W, V, Y, X, C[P + 7], y, 1735328473);
        X = f(X, W, V, Y, C[P + 12], w, 2368359562);
        Y = D(Y, X, W, V, C[P + 5], o, 4294588738);
        V = D(V, Y, X, W, C[P + 8], m, 2272392833);
        W = D(W, V, Y, X, C[P + 11], l, 1839030562);
        X = D(X, W, V, Y, C[P + 14], j, 4259657740);
        Y = D(Y, X, W, V, C[P + 1], o, 2763975236);
        V = D(V, Y, X, W, C[P + 4], m, 1272893353);
        W = D(W, V, Y, X, C[P + 7], l, 4139469664);
        X = D(X, W, V, Y, C[P + 10], j, 3200236656);
        Y = D(Y, X, W, V, C[P + 13], o, 681279174);
        V = D(V, Y, X, W, C[P + 0], m, 3936430074);
        W = D(W, V, Y, X, C[P + 3], l, 3572445317);
        X = D(X, W, V, Y, C[P + 6], j, 76029189);
        Y = D(Y, X, W, V, C[P + 9], o, 3654602809);
        V = D(V, Y, X, W, C[P + 12], m, 3873151461);
        W = D(W, V, Y, X, C[P + 15], l, 530742520);
        X = D(X, W, V, Y, C[P + 2], j, 3299628645);
        Y = t(Y, X, W, V, C[P + 0], U, 4096336452);
        V = t(V, Y, X, W, C[P + 7], T, 1126891415);
        W = t(W, V, Y, X, C[P + 14], R, 2878612391);
        X = t(X, W, V, Y, C[P + 5], O, 4237533241);
        Y = t(Y, X, W, V, C[P + 12], U, 1700485571);
        V = t(V, Y, X, W, C[P + 3], T, 2399980690);
        W = t(W, V, Y, X, C[P + 10], R, 4293915773);
        X = t(X, W, V, Y, C[P + 1], O, 2240044497);
        Y = t(Y, X, W, V, C[P + 8], U, 1873313359);
        V = t(V, Y, X, W, C[P + 15], T, 4264355552);
        W = t(W, V, Y, X, C[P + 6], R, 2734768916);
        X = t(X, W, V, Y, C[P + 13], O, 1309151649);
        Y = t(Y, X, W, V, C[P + 4], U, 4149444226);
        V = t(V, Y, X, W, C[P + 11], T, 3174756917);
        W = t(W, V, Y, X, C[P + 2], R, 718787259);
        X = t(X, W, V, Y, C[P + 9], O, 3951481745);
        Y = K(Y, h);
        X = K(X, E);
        W = K(W, v);
        V = K(V, g)
    }
    var i = B(Y) + B(X) + B(W) + B(V);
    return i.toLowerCase()
};
function dynamicSortMultiple() {
    var props = [];
    /*Let's separate property name from ascendant or descendant keyword*/
    for (var i = 0; i < arguments.length; i++) {
        var splittedArg = arguments[i].split(/ +/);
        props[props.length] = [splittedArg[0], (splittedArg[1] ? splittedArg[1].toUpperCase() : "ASC")];
    }
    return function (obj1, obj2) {
        var i = 0,
            result = 0,
            numberOfProperties = props.length;
        /*Cycle on values until find a difference!*/
        while (result === 0 && i < numberOfProperties) {
            result = dynamicSort(props[i][0], props[i][1])(obj1, obj2);
            i++;
        }
        return result;
    }
}

function dynamicSort(property, isAscDesc) {
    return function (obj1, obj2) {
        if (isAscDesc === "DESC") {
            return ((obj1[property] > obj2[property]) ? (-1) : ((obj1[property] < obj2[property]) ? (1) : (0)));
        }
        /*else, if isAscDesc==="ASC"*/
        return ((obj1[property] > obj2[property]) ? (1) : ((obj1[property] < obj2[property]) ? (-1) : (0)));
    }
}
function formatMoney(n, c, d, t) {
    var c = isNaN(c = Math.abs(c)) ? 0 : c,
        d = d == undefined ? "." : d,
        t = t == undefined ? "," : t,
        s = n < 0 ? "-" : "",
        i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))),
        j = (j = i.length) > 3 ? j % 3 : 0;

    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
}

function MMRchangeBGColor3_over(e, _, t, a) {
    var r = document.getElementById(_ + "_1")
      , d = document.getElementById(_ + "_2")
      , s = document.getElementById(_ + "_3");
    OnlyMROdds ? (null != s && (s.style.backgroundColor = t),
    null != d && (d.style.backgroundColor = t)) : e.id == _ + "_3" ? null != s && (s.style.backgroundColor = t) : (null != r && (r.style.backgroundColor = t),
    null != d && (d.style.backgroundColor = t))
}
function MMRchangeBGColor3_out(e, _, t) {
    var a = document.getElementById(e + "_1")
      , r = document.getElementById(e + "_2")
      , d = document.getElementById(e + "_3");
    null != d && (d.style.backgroundColor = t),
    null != a && (a.style.backgroundColor = _),
    null != r && (r.style.backgroundColor = OnlyMROdds ? t : _)
}
function changeOddsType_ou(val){
  Odds_type = val;
  data_ball(1);
}
function dec_price(val){
  if(val!=""){
    var vre = 0;
    if(val<0){
      vre = 3-(0-(parseFloat(val)));
    }else{
      vre = 1+(parseFloat(val));
    }
    return vre;
  }else{
    return "";
  }
}
function hk_price(val){
  if(val!=""){
    var vre = 0;
    if(val<0){
      vre = 2-(0-(parseFloat(val)));
    }else{
      vre = val;
    }
    return vre;
  }else{
    return "";
  }
}
function changeDisplayMode(val,site){
  dp_mode = val;
  data_ball(1);
}
function bet(e, t, a, r, d) {
    fFrame.leftx.DoBetProcessX(e, t, a, r, d , Odds_type);
}


var arr_data = [];
var arr_mdata = [];
var arr_blink = [];
var old_arr_data = [];

var zone_data_ball = [];
var team_data_ball = {};

var team_data_old = {};

var price_type = 0;
var Odds_type = 4;
var dp_mode = "3";

var anam = ["<?=$arnam1?>", "<?=$arnam2?>", "<?=$arnam3?>", "<?=$arnam4?>", "<?=$arnam5?>", "<?=$arnam6?>", "<?=$arnam7?>"];

$(() => {
    var socket = io.connect('27.254.65.237:9899', { secure: true });
    //socket.emit('check_user', { "token": "<?=$_SESSION[m_tokenx]?>", "mid": "<?=$_SESSION[mid]?>" , "site":document });
    socket.on('datalist', function (data) {
        arr_data = JSON.parse(data);
        //arr_mdata = data[1];
    });
});

setInterval(function () {
    data_ball(0);
}, 1000);

/*setInterval(function () {
    show_blink();
}, 1000);*/

var leagueLangArray = {};
var leagueArray = [];
var selectedLeague = [];
function data_ball(ci) {

  var time_stam = parseInt(Date.now() / 1000);

  if (JSON.stringify(arr_data) != JSON.stringify(old_arr_data) || ci == 1) {
    zone_data_ball = [];
    team_data_ball = {};

    zone_data_ball_live = [];
    team_data_ball_live = {};

    old_arr_data = arr_data;

    leagueLangArray = {};
    leagueArray = [];
    var data_ball = [];
    var db = 0;
    for (var k in arr_data) {
      var db_in = {};
      for (var kk in arr_data[k]) {
        db_in[kk] = arr_data[k][kk];
      }
      data_ball[db] = db_in;
      db++;
    }
    //console.log(data_ball);

    var i_zone_data_ball = 0;
    var i_team_data_ball = 0;

    var i_zone_data_ball_live = 0;
    var i_team_data_ball_live = 0;

    var check_zone_data_ball = [];

    var check_zone_data_ball_live = [];

      for (var k in data_ball) {

        var arr_insert = {};
        arr_insert["b_zone"] = data_ball[k]["b_zone_th"];
        arr_insert["b_zone_en"] = data_ball[k]["b_zone_en"];
        arr_insert["b_top"] = data_ball[k]["b_top"];
        arr_insert["b_asc"] = data_ball[k]["b_asc"];
        arr_insert["b_active"] = data_ball[k]["b_active"];
        arr_insert["b_type"] = data_ball[k]["b_zone"];

        if(data_ball[k]["b_live"]==1 || data_ball[k]["b_live"]==2 || data_ball[k]["b_live"]==3){

          var check_arr = check_zone_data_ball_live.indexOf(data_ball[k]["b_zone_en"]);
          check_zone_data_ball_live[i_zone_data_ball_live] = data_ball[k]["b_zone_en"];
          if (check_arr < 0) {
            zone_data_ball_live[i_zone_data_ball_live] = arr_insert;
            i_zone_data_ball_live++;
          }

          if (!team_data_ball_live[MD5(data_ball[k]["b_zone_en"])]) {
            team_data_ball_live[MD5(data_ball[k]["b_zone_en"])] = [];
            i_team_data_ball_live = 0;
          }else{
            i_team_data_ball_live = team_data_ball_live[MD5(data_ball[k]["b_zone_en"])].length;
          }
          team_data_ball_live[MD5(data_ball[k]["b_zone_en"])][i_team_data_ball_live] = data_ball[k];

        }


        if(data_ball[k]["b_live"]==0 && data_ball[k]["b_date_play"] >= time_stam){
          var check_arr = check_zone_data_ball.indexOf(data_ball[k]["b_zone_en"]);
          check_zone_data_ball[i_zone_data_ball] = data_ball[k]["b_zone_en"];
          if (check_arr < 0) {
            zone_data_ball[i_zone_data_ball] = arr_insert;
            i_zone_data_ball++;
          }

          if (!team_data_ball[MD5(data_ball[k]["b_zone_en"])]) {
            team_data_ball[MD5(data_ball[k]["b_zone_en"])] = [];
            i_team_data_ball = 0;
          }else{
            i_team_data_ball = team_data_ball[MD5(data_ball[k]["b_zone_en"])].length;
          }
          team_data_ball[MD5(data_ball[k]["b_zone_en"])][i_team_data_ball] = data_ball[k];

        }


        

      }

      zone_data_ball_live.sort(dynamicSortMultiple("b_type Asc","b_active DESC", "b_top Asc", "b_asc Asc", "b_zone_en Asc"));
      zone_data_ball.sort(dynamicSortMultiple("b_type Asc","b_active DESC", "b_top Asc", "b_asc Asc"));
      for(var i = 0; i < zone_data_ball_live.length; i++) {
        if(leagueArray.indexOf(zone_data_ball_live[i].b_zone_en) == -1){
          leagueArray.push(zone_data_ball_live[i].b_zone_en);
          leagueLangArray[zone_data_ball_live[i].b_zone_en] = zone_data_ball_live[i].b_zone;
        }
      }
      for(var i = 0; i < zone_data_ball.length; i++) {
        if(leagueArray.indexOf(zone_data_ball[i].b_zone_en) == -1){
          leagueArray.push(zone_data_ball[i].b_zone_en);
          leagueLangArray[zone_data_ball[i].b_zone_en] = zone_data_ball[i].b_zone;
        }
      }
      document.getElementById('TotalLeagueCnt').innerHTML = leagueArray.length;
      if(selectedLeague.length > 0){
        document.getElementById('AllSelL').innerHTML = selectedLeague.length;
      }else{
        document.getElementById('AllSelL').innerHTML = leagueArray.length;
      }

      var header_tb_ball = document.querySelector("#header_tb_ball");
      header_tb_ball.innerHTML = "";
      if(dp_mode=="1"){
        var template_header = document.querySelector('#header_1rows_tmpl');
      }else if(dp_mode=="1F"){
        var template_header = document.querySelector('#header_1Frows_tmpl');
      }else if(dp_mode=="1H"){
        var template_header = document.querySelector('#header_1Hrows_tmpl');
      }else{
        var template_header = document.querySelector('#header_2rows_tmpl');
      }

      var clone_header= document.importNode(template_header.content, true);
    header_tb_ball.appendChild(clone_header);

      cre_TB_live();
      cre_TB();
  }
}

//console.log(data_ball);
function cre_TB_live(){
  var load_tb_ball = document.querySelector("#load_tb_ball_live");
  load_tb_ball.innerHTML = "";

  var bgck = "";
  var bgcl = "liveligh";

  var bgcov = "f5eeb8";

  var bgcou1 = "C6D4F1";
  var bgcou2 = "bbbeeb";

  var bgci = 1;
  for (var k2 in zone_data_ball_live) {
    if(selectedLeague.length > 0 && selectedLeague.indexOf(MD5(zone_data_ball_live[k2].b_zone_en)) == -1){
      continue;
    }
    if (zone_data_ball_live[k2].b_zone != null) {

      if(dp_mode=="1"){
        var template_leage = document.querySelector('#leage_tmpl_1');
      }else if(dp_mode=="1F"){
        var template_leage = document.querySelector('#leage_tmpl_1F');
      }else if(dp_mode=="1H"){
        var template_leage = document.querySelector('#leage_tmpl_1H');
      }else{
        var template_leage = document.querySelector('#leage_tmpl');
      }

      var clone_leage = document.importNode(template_leage.content, true);
      var tr_leage = clone_leage.querySelectorAll("tr");
      tr_leage[0].className += "tr_" + MD5(zone_data_ball_live[k2].b_zone_en) + " lge_" + MD5(zone_data_ball_live[k2].b_zone_en);
      if(selectedLeague.length > 0 && selectedLeague.indexOf(MD5(zone_data_ball_live[k2].b_zone_en)) == -1){
        tr_leage[0].style.display = 'none';
      }

      var td_leage = clone_leage.querySelectorAll("td");
      if(zone_data_ball_live[k2].b_zone==""){
        td_leage[1].textContent = zone_data_ball_live[k2].b_zone_en;
      }else{
        td_leage[1].textContent = zone_data_ball_live[k2].b_zone;
      }
      
      load_tb_ball.appendChild(clone_leage);

      team_data_ball_live[MD5(zone_data_ball_live[k2].b_zone_en)].sort(dynamicSortMultiple("b_active DESC", "b_date_play Asc", "b_id Asc", "b_add Asc"));

      var n_team = 0;
      var c_team_show = {};

      for (var k3 in team_data_ball_live[MD5(zone_data_ball_live[k2].b_zone_en)]) {
        var ball_data = team_data_ball_live[MD5(zone_data_ball_live[k2].b_zone_en)][k3];

        //console.log(ball_data);

       // if((ball_data["b_hdc"]!="" && ball_data["b_hdc_1"]!="" && ball_data["b_hdc_2"]!="") || (ball_data["b_goal"]!="" && ball_data["b_goal_1"]!="" && ball_data["b_goal_2"]!="") || (ball_data["b_1x2_1"]>0 && ball_data["b_1x2_x"]>0 && ball_data["b_1x2_2"]>0) || (ball_data["b_1h_hdc"]!="" && ball_data["b_1h_hdc_1"]!="" && ball_data["b_1h_hdc_2"]!="") || (ball_data["b_1h_goal"]!="" && ball_data["b_1h_goal_1"]!="" && ball_data["b_1h_goal_2"]!="") || (ball_data["b_1h_1x2_1"]>0 && ball_data["b_1h_1x2_x"]>0 && ball_data["b_1h_1x2_2"]>0)){


         
          if(Odds_type==1){
            ball_data["b_hdc_1"] = dec_price(ball_data["b_hdc_1"]);
            ball_data["b_hdc_2"] = dec_price(ball_data["b_hdc_2"]);
            ball_data["b_goal_1"] = dec_price(ball_data["b_goal_1"]);
            ball_data["b_goal_2"] = dec_price(ball_data["b_goal_2"]);

            ball_data["b_1h_hdc_1"] = dec_price(ball_data["b_1h_hdc_1"]);
            ball_data["b_1h_hdc_2"] = dec_price(ball_data["b_1h_hdc_2"]);
            ball_data["b_1h_goal_1"] = dec_price(ball_data["b_1h_goal_1"]);
            ball_data["b_1h_goal_2"] = dec_price(ball_data["b_1h_goal_2"]);
          }else if(Odds_type==2){
            ball_data["b_hdc_1"] = hk_price(ball_data["b_hdc_1"]);
            ball_data["b_hdc_2"] = hk_price(ball_data["b_hdc_2"]);
            ball_data["b_goal_1"] = hk_price(ball_data["b_goal_1"]);
            ball_data["b_goal_2"] = hk_price(ball_data["b_goal_2"]);

            ball_data["b_1h_hdc_1"] = hk_price(ball_data["b_1h_hdc_1"]);
            ball_data["b_1h_hdc_2"] = hk_price(ball_data["b_1h_hdc_2"]);
            ball_data["b_1h_goal_1"] = hk_price(ball_data["b_1h_goal_1"]);
            ball_data["b_1h_goal_2"] = hk_price(ball_data["b_1h_goal_2"]);
          }


          
          if(dp_mode=="1"){
            var template_ball = document.querySelector('#ball_tmpl_1');
          }else if(dp_mode=="1F"){
            var template_ball = document.querySelector('#ball_tmpl_1F');
          }else if(dp_mode=="1H"){
            var template_ball = document.querySelector('#ball_tmpl_1H');
          }else{
            var template_ball = document.querySelector('#ball_tmpl_live');
          }

          var clone_ball = document.importNode(template_ball.content, true);

          var tr_ball = clone_ball.querySelectorAll("tr");
          
          if(bgck!=ball_data["b_id"]){
            bgck = ball_data["b_id"];
            if(bgcl=="live"){
              bgcl = "liveligh";

              bgcou1 = "ffddd2";
              bgcou2 = "bbbeeb";
            }else{
              bgcl = "live";

              bgcou1 = "FFCCBC";
              bgcou2 = "bbbeeb";
            }
            tr_ball[0].className = bgcl;
            tr_ball[1].className = bgcl;
            bgci = 1;
          }else{
            tr_ball[0].className = bgcl;
            tr_ball[1].className = bgcl;
            bgci = bgci+1;
          }
          var id_tr = 'e_'+ball_data["b_id"]+'_'+bgci;
          tr_ball[0].setAttribute('onmouseout', "MMRchangeBGColor3_out('"+id_tr+"','#"+bgcou1+"','#"+bgcou2+"');");
          tr_ball[1].setAttribute('onmouseout', "MMRchangeBGColor3_out('"+id_tr+"','#"+bgcou1+"','#"+bgcou2+"');");

          tr_ball[0].setAttribute('onmouseover', "MMRchangeBGColor3_over(this,'"+id_tr+"','#f5eeb8');");
          tr_ball[1].setAttribute('onmouseover', "MMRchangeBGColor3_over(this,'"+id_tr+"','#f5eeb8');");

          tr_ball[0].setAttribute('id', id_tr+'_1');
          tr_ball[1].setAttribute('id', id_tr+'_2');
          tr_ball[0].className += " displayOn " + " lge_" + MD5(zone_data_ball_live[k2].b_zone_en);
          tr_ball[1].className += " lge_" + MD5(zone_data_ball_live[k2].b_zone_en);
      // tr_leage[0].className += "tr_" + MD5(zone_data_ball_live[k2].b_zone_en) + " lge_" + MD5(zone_data_ball_live[k2].b_zone_en);
          if(selectedLeague.length > 0 && selectedLeague.indexOf(MD5(zone_data_ball_live[k2].b_zone_en)) == -1){
            tr_ball[0].style.display = 'none';
            tr_ball[1].style.display = 'none';
          }

          if(ball_data["b_name_1_th"]==""){
            ball_data["b_name_1_th"] = ball_data["b_name_1_en"];
          }
          if(ball_data["b_name_2_th"]==""){
            ball_data["b_name_2_th"] = ball_data["b_name_2_en"];
          }

          if(dp_mode=="1"){
            set_table_1rows(clone_ball , ball_data);
            load_tb_ball.appendChild(clone_ball);
            n_team++;
          }else if(dp_mode=="1F" && ((ball_data["b_hdc"]!="" && ball_data["b_hdc_1"]!="" && ball_data["b_hdc_2"]!="") || (ball_data["b_goal"]!="" && ball_data["b_goal_1"]!="" && ball_data["b_goal_2"]!="") || (ball_data["b_1x2_1"]>0 && ball_data["b_1x2_x"]>0 && ball_data["b_1x2_2"]>0))){
            set_table_1Frows(clone_ball , ball_data);
            load_tb_ball.appendChild(clone_ball);
            n_team++;
          }else if(dp_mode=="1H" && ((ball_data["b_1h_hdc"]!="" && ball_data["b_1h_hdc_1"]!="" && ball_data["b_1h_hdc_2"]!="") || (ball_data["b_1h_goal"]!="" && ball_data["b_1h_goal_1"]!="" && ball_data["b_1h_goal_2"]!="") || (ball_data["b_1h_1x2_1"]>0 && ball_data["b_1h_1x2_x"]>0 && ball_data["b_1h_1x2_2"]>0))){
            set_table_1Hrows(clone_ball , ball_data);
            load_tb_ball.appendChild(clone_ball);
            n_team++;
          }else if(dp_mode=="3"){
            set_table_2rows(clone_ball , ball_data);
            load_tb_ball.appendChild(clone_ball);
            n_team++;
          }   
        //}
      }
      if (n_team <= 0) {
        $(".tr_" + MD5(zone_data_ball[k2].b_zone_en)).hide();
      }
    }
  }
}
function cre_TB(){
  var load_tb_ball = document.querySelector("#load_tb_ball");
  load_tb_ball.innerHTML = "";

  var bgck = "";
  var bgcl = "bgcpelight";

  var bgcov = "f5eeb8";

  var bgcou1 = "C6D4F1";
  var bgcou2 = "bbbeeb";

  var bgci = 1;
  for (var k2 in zone_data_ball) {
    if(selectedLeague.length > 0 && selectedLeague.indexOf(MD5(zone_data_ball[k2].b_zone_en)) == -1){
      continue;
    }
    if (zone_data_ball[k2].b_zone != null) {
      
      if(dp_mode=="1"){
        var template_leage = document.querySelector('#leage_tmpl_1');
      }else if(dp_mode=="1F"){
        var template_leage = document.querySelector('#leage_tmpl_1F');
      }else if(dp_mode=="1H"){
        var template_leage = document.querySelector('#leage_tmpl_1H');
      }else{
        var template_leage = document.querySelector('#leage_tmpl');
      }

      var clone_leage = document.importNode(template_leage.content, true);
      var tr_leage = clone_leage.querySelectorAll("tr");
      tr_leage[0].className += "tr_" + MD5(zone_data_ball[k2].b_zone_en) + " lge_" + MD5(zone_data_ball[k2].b_zone_en);
      // if(selectedLeague.length > 0 && selectedLeague.indexOf(MD5(zone_data_ball[k2].b_zone_en)) == -1){
      //   tr_leage[0].style.display = 'none';
      // }

      var td_leage = clone_leage.querySelectorAll("td");
      td_leage[1].textContent = zone_data_ball[k2].b_zone;
      load_tb_ball.appendChild(clone_leage);

      team_data_ball[MD5(zone_data_ball[k2].b_zone_en)].sort(dynamicSortMultiple("b_active DESC", "b_date_play Asc", "b_id Asc", "b_add Asc"));

      var n_team = 0;
      var c_team_show = {};

      for (var k3 in team_data_ball[MD5(zone_data_ball[k2].b_zone_en)]) {
        var ball_data = team_data_ball[MD5(zone_data_ball[k2].b_zone_en)][k3];

        if((ball_data["b_hdc"]!="" && ball_data["b_hdc_1"]!="" && ball_data["b_hdc_2"]!="") || (ball_data["b_goal"]!="" && ball_data["b_goal_1"]!="" && ball_data["b_goal_2"]!="") || (ball_data["b_1x2_1"]>0 && ball_data["b_1x2_x"]>0 && ball_data["b_1x2_2"]>0) || (ball_data["b_1h_hdc"]!="" && ball_data["b_1h_hdc_1"]!="" && ball_data["b_1h_hdc_2"]!="") || (ball_data["b_1h_goal"]!="" && ball_data["b_1h_goal_1"]!="" && ball_data["b_1h_goal_2"]!="") || (ball_data["b_1h_1x2_1"]>0 && ball_data["b_1h_1x2_x"]>0 && ball_data["b_1h_1x2_2"]>0)){


         
          if(Odds_type==1){
            ball_data["b_hdc_1"] = dec_price(ball_data["b_hdc_1"]);
            ball_data["b_hdc_2"] = dec_price(ball_data["b_hdc_2"]);
            ball_data["b_goal_1"] = dec_price(ball_data["b_goal_1"]);
            ball_data["b_goal_2"] = dec_price(ball_data["b_goal_2"]);

            ball_data["b_1h_hdc_1"] = dec_price(ball_data["b_1h_hdc_1"]);
            ball_data["b_1h_hdc_2"] = dec_price(ball_data["b_1h_hdc_2"]);
            ball_data["b_1h_goal_1"] = dec_price(ball_data["b_1h_goal_1"]);
            ball_data["b_1h_goal_2"] = dec_price(ball_data["b_1h_goal_2"]);
          }else if(Odds_type==2){
            ball_data["b_hdc_1"] = hk_price(ball_data["b_hdc_1"]);
            ball_data["b_hdc_2"] = hk_price(ball_data["b_hdc_2"]);
            ball_data["b_goal_1"] = hk_price(ball_data["b_goal_1"]);
            ball_data["b_goal_2"] = hk_price(ball_data["b_goal_2"]);

            ball_data["b_1h_hdc_1"] = hk_price(ball_data["b_1h_hdc_1"]);
            ball_data["b_1h_hdc_2"] = hk_price(ball_data["b_1h_hdc_2"]);
            ball_data["b_1h_goal_1"] = hk_price(ball_data["b_1h_goal_1"]);
            ball_data["b_1h_goal_2"] = hk_price(ball_data["b_1h_goal_2"]);
          }


          
          if(dp_mode=="1"){
            var template_ball = document.querySelector('#ball_tmpl_1');
          }else if(dp_mode=="1F"){
            var template_ball = document.querySelector('#ball_tmpl_1F');
          }else if(dp_mode=="1H"){
            var template_ball = document.querySelector('#ball_tmpl_1H');
          }else{
            var template_ball = document.querySelector('#ball_tmpl');
          }

          var clone_ball = document.importNode(template_ball.content, true);

          var tr_ball = clone_ball.querySelectorAll("tr");
          
          if(bgck!=ball_data["b_id"]){
            bgck = ball_data["b_id"];
            if(bgcl=="bgcpe"){
              bgcl = "bgcpelight";

              bgcou1 = "E4E4E4";
              bgcou2 = "bbbeeb";
            }else{
              bgcl = "bgcpe";

              bgcou1 = "C6D4F1";
              bgcou2 = "bbbeeb";
            }
            tr_ball[0].className = bgcl;
            tr_ball[1].className = bgcl;
            bgci = 1;
          }else{
            tr_ball[0].className = bgcl;
            tr_ball[1].className = bgcl;
            bgci = bgci+1;
          }
          var id_tr = 'e_'+ball_data["b_id"]+'_'+bgci;
          tr_ball[0].setAttribute('onmouseout', "MMRchangeBGColor3_out('"+id_tr+"','#"+bgcou1+"','#"+bgcou2+"');");
          tr_ball[1].setAttribute('onmouseout', "MMRchangeBGColor3_out('"+id_tr+"','#"+bgcou1+"','#"+bgcou2+"');");

          tr_ball[0].setAttribute('onmouseover', "MMRchangeBGColor3_over(this,'"+id_tr+"','#f5eeb8');");
          tr_ball[1].setAttribute('onmouseover', "MMRchangeBGColor3_over(this,'"+id_tr+"','#f5eeb8');");

          tr_ball[0].setAttribute('id', id_tr+'_1');
          tr_ball[1].setAttribute('id', id_tr+'_2');
          // tr_ball[0].className += " displayOn";
          tr_ball[0].className += " displayOn " + " lge_" + MD5(zone_data_ball[k2].b_zone_en);
          tr_ball[1].className += " lge_" + MD5(zone_data_ball[k2].b_zone_en);
          // if(selectedLeague.length > 0 && selectedLeague.indexOf(MD5(zone_data_ball[k2].b_zone_en)) == -1){
          //   tr_ball[0].style.display = 'none';
          //   tr_ball[1].style.display = 'none';
          // }

          if(ball_data["b_name_1_th"]==""){
            ball_data["b_name_1_th"] = ball_data["b_name_1_en"];
          }
          if(ball_data["b_name_2_th"]==""){
            ball_data["b_name_2_th"] = ball_data["b_name_2_en"];
          }

          if(dp_mode=="1"){
            set_table_1rows(clone_ball , ball_data);
            load_tb_ball.appendChild(clone_ball);
            n_team++;
          }else if(dp_mode=="1F" && ((ball_data["b_hdc"]!="" && ball_data["b_hdc_1"]!="" && ball_data["b_hdc_2"]!="") || (ball_data["b_goal"]!="" && ball_data["b_goal_1"]!="" && ball_data["b_goal_2"]!="") || (ball_data["b_1x2_1"]>0 && ball_data["b_1x2_x"]>0 && ball_data["b_1x2_2"]>0))){
            set_table_1Frows(clone_ball , ball_data);
            load_tb_ball.appendChild(clone_ball);
            n_team++;
          }else if(dp_mode=="1H" && ((ball_data["b_1h_hdc"]!="" && ball_data["b_1h_hdc_1"]!="" && ball_data["b_1h_hdc_2"]!="") || (ball_data["b_1h_goal"]!="" && ball_data["b_1h_goal_1"]!="" && ball_data["b_1h_goal_2"]!="") || (ball_data["b_1h_1x2_1"]>0 && ball_data["b_1h_1x2_x"]>0 && ball_data["b_1h_1x2_2"]>0))){
            set_table_1Hrows(clone_ball , ball_data);
            load_tb_ball.appendChild(clone_ball);
            n_team++;
          }else if(dp_mode=="3"){
            set_table_2rows(clone_ball , ball_data);
            load_tb_ball.appendChild(clone_ball);
            n_team++;
          }   
        }
      }
      if (n_team <= 0) {
        $(".tr_" + MD5(zone_data_ball[k2].b_zone_en)).hide();
      }
    }
  }
}
function set_table_2rows(clone_ball , ball_data){

  var td_ball = clone_ball.querySelectorAll("td");


          if(ball_data["b_live"]!=0){
            td_ball[0].innerHTML = "<font color=\"red\">"+ball_data["b_run_score_full"]+"</font> <br>"+ball_data["b_live_string"]+"'";
          }else{
            var date_data_1 = new Date(ball_data["b_date_play"] * 1000);
            var hours_data_1 = "0" + date_data_1.getHours();
            var minutes_data_1 = "0" + date_data_1.getMinutes();
            var formattedTime = hours_data_1.substr(-2) + ':' + minutes_data_1.substr(-2);
            td_ball[0].innerHTML = "<font color=\"red\">LIVE</font> "+formattedTime;
          }
          

          var div_team = td_ball[1].querySelectorAll("div");
          if(ball_data["b_zone"]==6){
            if(ball_data["b_big"]==1){
              div_team[0].className = "FavTeamClass";
            }else{
              div_team[0].className = "UdrDogTeamClass";
            }

            if(ball_data["b_big"]==2){
              div_team[1].className = "FavTeamClass";
            }else{
              div_team[1].className = "UdrDogTeamClass";
            }
          }else if(ball_data["b_zone"]==1){
            div_team[0].className = "FavTeamClass";
            div_team[1].className = "UdrDogTeamClass";
          }
          
          

          div_team[0].innerHTML = "<span>"+ball_data["b_name_1_th"]+"</span>";
          div_team[1].innerHTML = "<span>"+ball_data["b_name_2_th"]+"</span>";
          if((ball_data["b_1x2_1"]>0 && ball_data["b_1x2_x"]>0 && ball_data["b_1x2_2"]>0) || (ball_data["b_1h_1x2_1"]>0 && ball_data["b_1h_1x2_x"]>0 && ball_data["b_1h_1x2_2"]>0)){
            div_team[2].innerHTML = "เสมอ";
            div_team[2].className = "HdpGoalClass";
          }else{
            div_team[2].innerHTML = "";
          }

          if(ball_data["b_hdc"]!="" && ball_data["b_hdc_1"]!="" && ball_data["b_hdc_2"]!=""){
            var div_hdc = td_ball[3].querySelectorAll("div");

            if(ball_data["b_big"]==2){
              div_hdc[0].innerHTML = "<br>"+ball_data["b_hdc"];
            }else{
              div_hdc[0].innerHTML = ball_data["b_hdc"];
            }
            

            var a_hdc = div_hdc[1].querySelectorAll("a");
            if(ball_data["b_hdc_1"]<0){
              a_hdc[0].className = "FavOddsClass";
            }else{
              a_hdc[0].className = "UdrDogOddsClass";
            }
            a_hdc[0].setAttribute("href" , "javascript:bet('"+ball_data["b_id"]+"','"+ball_data["id_type_1"]+"','h','"+formatMoney(ball_data["b_hdc_1"],2)+"',1)");
            a_hdc[0].innerHTML = formatMoney(ball_data["b_hdc_1"],2);

            if(ball_data["b_hdc_2"]<0){
              a_hdc[1].className = "FavOddsClass";
            }else{
              a_hdc[1].className = "UdrDogOddsClass";
            }
            a_hdc[1].setAttribute("href" , "javascript:bet('"+ball_data["b_id"]+"','"+ball_data["id_type_1"]+"','a','"+formatMoney(ball_data["b_hdc_2"],2)+"',1)");
            a_hdc[1].innerHTML = formatMoney(ball_data["b_hdc_2"],2);
          }

          if(ball_data["b_goal"]!="" && ball_data["b_goal_1"]!="" && ball_data["b_goal_2"]!=""){
            var div_goal = td_ball[4].querySelectorAll("div");
            div_goal[0].innerHTML = ball_data["b_goal"]+"<br>ต่ำ";

            var a_goal = div_goal[1].querySelectorAll("a");
            if(ball_data["b_goal_1"]<0){
              a_goal[0].className = "FavOddsClass";
            }else{
              a_goal[0].className = "UdrDogOddsClass";
            }
            a_goal[0].setAttribute("href" , "javascript:bet('"+ball_data["b_id"]+"','"+ball_data["id_type_2"]+"','h','"+formatMoney(ball_data["b_goal_1"],2)+"',2)");
            a_goal[0].innerHTML = formatMoney(ball_data["b_goal_1"],2);

            if(ball_data["b_goal_2"]<0){
              a_goal[1].className = "FavOddsClass";
            }else{
              a_goal[1].className = "UdrDogOddsClass";
            }
            a_goal[1].setAttribute("href" , "javascript:bet('"+ball_data["b_id"]+"','"+ball_data["id_type_2"]+"','a','"+formatMoney(ball_data["b_goal_2"],2)+"',2)");
            a_goal[1].innerHTML = formatMoney(ball_data["b_goal_2"],2);
          }

          if(ball_data["b_1x2_1"]>0 && ball_data["b_1x2_x"]>0 && ball_data["b_1x2_2"]>0){
            var div_1x2 = td_ball[5].querySelectorAll("div");

            var a_1x2 = div_1x2[0].querySelectorAll("a");
            if(ball_data["b_1x2_1"]<0){
              a_1x2[0].className = "FavOddsClass";
            }else{
              a_1x2[0].className = "UdrDogOddsClass";
            }
            a_1x2[0].setAttribute("href" , "javascript:bet('"+ball_data["b_id"]+"','"+ball_data["id_type_3"]+"','1','"+formatMoney(ball_data["b_1x2_1"],2)+"',3)");
            a_1x2[0].innerHTML = formatMoney(ball_data["b_1x2_1"],2);

            if(ball_data["b_1x2_2"]<0){
              a_1x2[1].className = "FavOddsClass";
            }else{
              a_1x2[1].className = "UdrDogOddsClass";
            }
            a_1x2[1].setAttribute("href" , "javascript:bet('"+ball_data["b_id"]+"','"+ball_data["id_type_3"]+"','2','"+formatMoney(ball_data["b_1x2_2"],2)+"',3)");
            a_1x2[1].innerHTML = formatMoney(ball_data["b_1x2_2"],2);

            if(ball_data["b_1x2_x"]<0){
              a_1x2[2].className = "FavOddsClass";
            }else{
              a_1x2[2].className = "UdrDogOddsClass";
            }
            a_1x2[2].setAttribute("href" , "javascript:bet('"+ball_data["b_id"]+"','"+ball_data["id_type_3"]+"','X','"+formatMoney(ball_data["b_1x2_x"],2)+"',3)");
            a_1x2[2].innerHTML = formatMoney(ball_data["b_1x2_x"],2);
          }

          if(ball_data["b_1h_hdc"]!="" && ball_data["b_1h_hdc_1"]!="" && ball_data["b_1h_hdc_2"]!=""){
            var div_1h_hdc = td_ball[6].querySelectorAll("div");


            if(ball_data["b_big"]==2){
              div_1h_hdc[0].innerHTML = "<br>"+ball_data["b_1h_hdc"];
            }else{
             div_1h_hdc[0].innerHTML = ball_data["b_1h_hdc"];
            }

            

            var a_1h_hdc = div_1h_hdc[1].querySelectorAll("a");
            if(ball_data["b_1h_hdc_1"]<0){
              a_1h_hdc[0].className = "FavOddsClass";
            }else{
              a_1h_hdc[0].className = "UdrDogOddsClass";
            }
            a_1h_hdc[0].setAttribute("href" , "javascript:bet('"+ball_data["b_id"]+"','"+ball_data["id_type_5"]+"','h','"+formatMoney(ball_data["b_1h_hdc_1"],2)+"',5)");
            a_1h_hdc[0].innerHTML = formatMoney(ball_data["b_1h_hdc_1"],2);

            if(ball_data["b_1h_hdc_2"]<0){
              a_1h_hdc[1].className = "FavOddsClass";
            }else{
              a_1h_hdc[1].className = "UdrDogOddsClass";
            }
            a_1h_hdc[1].setAttribute("href" , "javascript:bet('"+ball_data["b_id"]+"','"+ball_data["id_type_5"]+"','a','"+formatMoney(ball_data["b_1h_hdc_2"],2)+"',5)");
            a_1h_hdc[1].innerHTML = formatMoney(ball_data["b_1h_hdc_2"],2);
          }

          if(ball_data["b_1h_goal"]!="" && ball_data["b_1h_goal_1"]!="" && ball_data["b_1h_goal_2"]!=""){
            var div_1h_goal = td_ball[7].querySelectorAll("div");
            div_1h_goal[0].innerHTML = ball_data["b_1h_goal"]+"<br>ต่ำ";

            var a_1h_goal = div_1h_goal[1].querySelectorAll("a");
            if(ball_data["b_1h_goal_1"]<0){
              a_1h_goal[0].className = "FavOddsClass";
            }else{
              a_1h_goal[0].className = "UdrDogOddsClass";
            }
            a_1h_goal[0].setAttribute("href" , "javascript:bet('"+ball_data["b_id"]+"','"+ball_data["id_type_6"]+"','h','"+formatMoney(ball_data["b_1h_goal_1"],2)+"',6)");
            a_1h_goal[0].innerHTML = formatMoney(ball_data["b_1h_goal_1"],2);

            if(ball_data["b_1h_goal_2"]<0){
              a_1h_goal[1].className = "FavOddsClass";
            }else{
              a_1h_goal[1].className = "UdrDogOddsClass";
            }
            a_1h_goal[1].setAttribute("href" , "javascript:bet('"+ball_data["b_id"]+"','"+ball_data["id_type_6"]+"','a','"+formatMoney(ball_data["b_1h_goal_2"],2)+"',6)");
            a_1h_goal[1].innerHTML = formatMoney(ball_data["b_1h_goal_2"],2);
          }

          if(ball_data["b_1h_1x2_1"]>0 && ball_data["b_1h_1x2_x"]>0 && ball_data["b_1h_1x2_2"]>0){
            var div_1h_1x2 = td_ball[8].querySelectorAll("div");

            var a_1h_1x2 = div_1h_1x2[0].querySelectorAll("a");
            if(ball_data["b_1h_1x2_1"]<0){
              a_1h_1x2[0].className = "FavOddsClass";
            }else{
              a_1h_1x2[0].className = "UdrDogOddsClass";
            }
            a_1h_1x2[0].setAttribute("href" , "javascript:bet('"+ball_data["b_id"]+"','"+ball_data["id_type_7"]+"','1','"+formatMoney(ball_data["b_1h_1x2_1"],2)+"',7)");
            a_1h_1x2[0].innerHTML = formatMoney(ball_data["b_1h_1x2_1"],2);

            if(ball_data["b_1h_1x2_2"]<0){
              a_1h_1x2[1].className = "FavOddsClass";
            }else{
              a_1h_1x2[1].className = "UdrDogOddsClass";
            }
            a_1h_1x2[1].setAttribute("href" , "javascript:bet('"+ball_data["b_id"]+"','"+ball_data["id_type_7"]+"','2','"+formatMoney(ball_data["b_1h_1x2_2"],2)+"',7)");
            a_1h_1x2[1].innerHTML = formatMoney(ball_data["b_1h_1x2_2"],2);

            if(ball_data["b_1h_1x2_x"]<0){
              a_1h_1x2[2].className = "FavOddsClass";
            }else{
              a_1h_1x2[2].className = "UdrDogOddsClass";
            }
            a_1h_1x2[2].setAttribute("href" , "javascript:bet('"+ball_data["b_id"]+"','"+ball_data["id_type_7"]+"','X','"+formatMoney(ball_data["b_1h_1x2_x"],2)+"',7)");
            a_1h_1x2[2].innerHTML = formatMoney(ball_data["b_1h_1x2_x"],2);
          }
          if(ball_data["b_add"]==1){
            td_ball[9].innerHTML = "<a href=\"javascript:openStatsInfo(&quot;"+ball_data["b_id"]+"&quot;);\" title=\"Statistic Information\"><span class=\"iconOdds stats\"></span></a>";
          }
}
function set_table_1rows(clone_ball , ball_data){

  var td_ball = clone_ball.querySelectorAll("td");

          var date_data_1 = new Date(ball_data["b_date_play"] * 1000);
          var hours_data_1 = "0" + date_data_1.getHours();
          var minutes_data_1 = "0" + date_data_1.getMinutes();
          var formattedTime = hours_data_1.substr(-2) + ':' + minutes_data_1.substr(-2);
          td_ball[0].innerHTML = "<font color=\"red\">LIVE</font> "+formattedTime;


          var div_list = td_ball[1].querySelectorAll("div");

          var div_team = div_list[0].querySelectorAll("div");

          if(ball_data["b_zone"]==6){
            if(ball_data["b_big"]==1){
              div_team[0].className = "FavTeamClass";
            }else{
              div_team[0].className = "UdrDogTeamClass";
            }

            if(ball_data["b_big"]==2){
              div_team[1].className = "FavTeamClass";
            }else{
              div_team[1].className = "UdrDogTeamClass";
            }
          }else if(ball_data["b_zone"]==1){
            div_team[0].className = "FavTeamClass";
            div_team[1].className = "UdrDogTeamClass";
          }

          div_team[0].innerHTML = "<span>"+ball_data["b_name_1_th"]+"</span>";
          div_team[1].innerHTML = "<span>"+ball_data["b_name_2_th"]+"</span>";

          if(ball_data["b_hdc"]!="" && ball_data["b_hdc_1"]!="" && ball_data["b_hdc_2"]!=""){
            td_ball[2].innerHTML = ball_data["b_hdc"];

            var a_hdc_1 = td_ball[3].querySelectorAll("a");
            if(ball_data["b_hdc_1"]<0){
              a_hdc_1[0].className = "FavOddsClass";
            }else{
              a_hdc_1[0].className = "UdrDogOddsClass";
            }
            a_hdc_1[0].innerHTML = formatMoney(ball_data["b_hdc_1"],2);

            var a_hdc_2 = td_ball[4].querySelectorAll("a");
            if(ball_data["b_hdc_2"]<0){
              a_hdc_2[0].className = "FavOddsClass";
            }else{
              a_hdc_2[0].className = "UdrDogOddsClass";
            }
            a_hdc_2[0].innerHTML = formatMoney(ball_data["b_hdc_2"],2);
          }

          if(ball_data["b_goal"]!="" && ball_data["b_goal_1"]!="" && ball_data["b_goal_2"]!=""){

            td_ball[5].innerHTML = ball_data["b_goal"];

            var a_goal_1 = td_ball[6].querySelectorAll("a");
            if(ball_data["b_goal_1"]<0){
              a_goal_1[0].className = "FavOddsClass";
            }else{
              a_goal_1[0].className = "UdrDogOddsClass";
            }
            a_goal_1[0].innerHTML = formatMoney(ball_data["b_goal_1"],2);

            var a_goal_2 = td_ball[7].querySelectorAll("a");
            if(ball_data["b_goal_2"]<0){
              a_goal_2[0].className = "FavOddsClass";
            }else{
              a_goal_2[0].className = "UdrDogOddsClass";
            }
            a_goal_2[0].innerHTML = formatMoney(ball_data["b_goal_2"],2);
          }

          if(ball_data["b_1h_hdc"]!="" && ball_data["b_1h_hdc_1"]!="" && ball_data["b_1h_hdc_2"]!=""){
            td_ball[8].innerHTML = ball_data["b_1h_hdc"];

            var a_1h_hdc_1 = td_ball[9].querySelectorAll("a");
            if(ball_data["b_1h_hdc_1"]<0){
              a_1h_hdc_1[0].className = "FavOddsClass";
            }else{
              a_1h_hdc_1[0].className = "UdrDogOddsClass";
            }
            a_1h_hdc_1[0].innerHTML = formatMoney(ball_data["b_1h_hdc_1"],2);

            var a_1h_hdc_2 = td_ball[10].querySelectorAll("a");
            if(ball_data["b_1h_hdc_2"]<0){
              a_1h_hdc_2[0].className = "FavOddsClass";
            }else{
              a_1h_hdc_2[0].className = "UdrDogOddsClass";
            }
            a_1h_hdc_2[0].innerHTML = formatMoney(ball_data["b_1h_hdc_2"],2);
          }

          if(ball_data["b_1h_goal"]!="" && ball_data["b_1h_goal_1"]!="" && ball_data["b_1h_goal_2"]!=""){

            td_ball[11].innerHTML = ball_data["b_1h_goal"];

            var a_1h_goal_1 = td_ball[12].querySelectorAll("a");
            if(ball_data["b_1h_goal_1"]<0){
              a_1h_goal_1[0].className = "FavOddsClass";
            }else{
              a_1h_goal_1[0].className = "UdrDogOddsClass";
            }
            a_1h_goal_1[0].innerHTML = formatMoney(ball_data["b_1h_goal_1"],2);

            var a_1h_goal_2 = td_ball[13].querySelectorAll("a");
            if(ball_data["b_1h_goal_2"]<0){
              a_1h_goal_2[0].className = "FavOddsClass";
            }else{
              a_1h_goal_2[0].className = "UdrDogOddsClass";
            }
            a_1h_goal_2[0].innerHTML = formatMoney(ball_data["b_1h_goal_2"],2);
          }

          if(ball_data["b_add"]==1){
            td_ball[14].innerHTML = "<a href=\"javascript:openStatsInfo(&quot;"+ball_data["b_id"]+"&quot;);\" title=\"Statistic Information\"><span class=\"iconOdds stats\"></span></a>";
          }
          
}
function set_table_1Frows(clone_ball , ball_data){
  var td_ball = clone_ball.querySelectorAll("td");

          var date_data_1 = new Date(ball_data["b_date_play"] * 1000);
          var hours_data_1 = "0" + date_data_1.getHours();
          var minutes_data_1 = "0" + date_data_1.getMinutes();
          var formattedTime = hours_data_1.substr(-2) + ':' + minutes_data_1.substr(-2);
          td_ball[0].innerHTML = "<font color=\"red\">LIVE</font> "+formattedTime;


          var div_list = td_ball[1].querySelectorAll("div");

          var div_team = div_list[0].querySelectorAll("div");
          

          if(ball_data["b_zone"]==6){
            if(ball_data["b_big"]==1){
              div_team[0].className = "FavTeamClass";
            }else{
              div_team[0].className = "UdrDogTeamClass";
            }

            if(ball_data["b_big"]==2){
              div_team[1].className = "FavTeamClass";
            }else{
              div_team[1].className = "UdrDogTeamClass";
            }
          }else if(ball_data["b_zone"]==1){
            div_team[0].className = "FavTeamClass";
            div_team[1].className = "UdrDogTeamClass";
          }

          div_team[0].innerHTML = "<span>"+ball_data["b_name_1_th"]+"</span>";
          div_team[1].innerHTML = "<span>"+ball_data["b_name_2_th"]+"</span>";

          if(ball_data["b_hdc"]!="" && ball_data["b_hdc_1"]!="" && ball_data["b_hdc_2"]!=""){
            td_ball[2].innerHTML = ball_data["b_hdc"];

            var a_hdc_1 = td_ball[3].querySelectorAll("a");
            if(ball_data["b_hdc_1"]<0){
              a_hdc_1[0].className = "FavOddsClass";
            }else{
              a_hdc_1[0].className = "UdrDogOddsClass";
            }
            a_hdc_1[0].innerHTML = formatMoney(ball_data["b_hdc_1"],2);

            var a_hdc_2 = td_ball[4].querySelectorAll("a");
            if(ball_data["b_hdc_2"]<0){
              a_hdc_2[0].className = "FavOddsClass";
            }else{
              a_hdc_2[0].className = "UdrDogOddsClass";
            }
            a_hdc_2[0].innerHTML = formatMoney(ball_data["b_hdc_2"],2);
          }

          if(ball_data["b_goal"]!="" && ball_data["b_goal_1"]!="" && ball_data["b_goal_2"]!=""){

            td_ball[5].innerHTML = ball_data["b_goal"];

            var a_goal_1 = td_ball[6].querySelectorAll("a");
            if(ball_data["b_goal_1"]<0){
              a_goal_1[0].className = "FavOddsClass";
            }else{
              a_goal_1[0].className = "UdrDogOddsClass";
            }
            a_goal_1[0].innerHTML = formatMoney(ball_data["b_goal_1"],2);

            var a_goal_2 = td_ball[7].querySelectorAll("a");
            if(ball_data["b_goal_2"]<0){
              a_goal_2[0].className = "FavOddsClass";
            }else{
              a_goal_2[0].className = "UdrDogOddsClass";
            }
            a_goal_2[0].innerHTML = formatMoney(ball_data["b_goal_2"],2);
          }

          if(ball_data["b_1h_hdc"]!="" && ball_data["b_1h_hdc_1"]!="" && ball_data["b_1h_hdc_2"]!=""){
            td_ball[8].innerHTML = ball_data["b_1h_hdc"];

            var a_1h_hdc_1 = td_ball[9].querySelectorAll("a");
            a_1h_hdc_1[0].innerHTML = "";

            var a_1h_hdc_2 = td_ball[10].querySelectorAll("a");
            a_1h_hdc_2[0].innerHTML = "";
          }

          if(ball_data["b_1h_goal"]!="" && ball_data["b_1h_goal_1"]!="" && ball_data["b_1h_goal_2"]!=""){

            td_ball[11].innerHTML = ball_data["b_1h_goal"];

            var a_1h_goal_1 = td_ball[12].querySelectorAll("a");
            a_1h_goal_1[0].innerHTML = "";

            var a_1h_goal_2 = td_ball[13].querySelectorAll("a");
            a_1h_goal_2[0].innerHTML = "";
          }

          if(ball_data["b_add"]==1){
            td_ball[14].innerHTML = "<a href=\"javascript:openStatsInfo(&quot;"+ball_data["b_id"]+"&quot;);\" title=\"Statistic Information\"><span class=\"iconOdds stats\"></span></a>";
          }

}
function set_table_1Hrows(clone_ball , ball_data){
  var td_ball = clone_ball.querySelectorAll("td");

          var date_data_1 = new Date(ball_data["b_date_play"] * 1000);
          var hours_data_1 = "0" + date_data_1.getHours();
          var minutes_data_1 = "0" + date_data_1.getMinutes();
          var formattedTime = hours_data_1.substr(-2) + ':' + minutes_data_1.substr(-2);
          td_ball[0].innerHTML = "<font color=\"red\">LIVE</font> "+formattedTime;


          var div_list = td_ball[1].querySelectorAll("div");

          var div_team = div_list[0].querySelectorAll("div");


          if(ball_data["b_zone"]==6){
            if(ball_data["b_big"]==1){
              div_team[0].className = "FavTeamClass";
            }else{
              div_team[0].className = "UdrDogTeamClass";
            }

            if(ball_data["b_big"]==2){
              div_team[1].className = "FavTeamClass";
            }else{
              div_team[1].className = "UdrDogTeamClass";
            }
          }else if(ball_data["b_zone"]==1){
            div_team[0].className = "FavTeamClass";
            div_team[1].className = "UdrDogTeamClass";
          }

          div_team[0].innerHTML = "<span>"+ball_data["b_name_1_th"]+"</span>";
          div_team[1].innerHTML = "<span>"+ball_data["b_name_2_th"]+"</span>";

          if(ball_data["b_hdc"]!="" && ball_data["b_hdc_1"]!="" && ball_data["b_hdc_2"]!=""){
            td_ball[2].innerHTML = ball_data["b_hdc"];

            var a_hdc_1 = td_ball[3].querySelectorAll("a");
            a_hdc_1[0].innerHTML = "";

            var a_hdc_2 = td_ball[4].querySelectorAll("a");
            a_hdc_2[0].innerHTML = "";
          }

          if(ball_data["b_goal"]!="" && ball_data["b_goal_1"]!="" && ball_data["b_goal_2"]!=""){

            td_ball[5].innerHTML = ball_data["b_goal"];

            var a_goal_1 = td_ball[6].querySelectorAll("a");
            a_goal_1[0].innerHTML = "";

            var a_goal_2 = td_ball[7].querySelectorAll("a");
            a_goal_2[0].innerHTML = "";
          }

          if(ball_data["b_1h_hdc"]!="" && ball_data["b_1h_hdc_1"]!="" && ball_data["b_1h_hdc_2"]!=""){
            td_ball[8].innerHTML = ball_data["b_1h_hdc"];

            var a_1h_hdc_1 = td_ball[9].querySelectorAll("a");
            if(ball_data["b_1h_hdc_1"]<0){
              a_1h_hdc_1[0].className = "FavOddsClass";
            }else{
              a_1h_hdc_1[0].className = "UdrDogOddsClass";
            }
            a_1h_hdc_1[0].innerHTML = formatMoney(ball_data["b_1h_hdc_1"],2);

            var a_1h_hdc_2 = td_ball[10].querySelectorAll("a");
            if(ball_data["b_1h_hdc_2"]<0){
              a_1h_hdc_2[0].className = "FavOddsClass";
            }else{
              a_1h_hdc_2[0].className = "UdrDogOddsClass";
            }
            a_1h_hdc_2[0].innerHTML = formatMoney(ball_data["b_1h_hdc_2"],2);
          }

          if(ball_data["b_1h_goal"]!="" && ball_data["b_1h_goal_1"]!="" && ball_data["b_1h_goal_2"]!=""){

            td_ball[11].innerHTML = ball_data["b_1h_goal"];

            var a_1h_goal_1 = td_ball[12].querySelectorAll("a");
            if(ball_data["b_1h_goal_1"]<0){
              a_1h_goal_1[0].className = "FavOddsClass";
            }else{
              a_1h_goal_1[0].className = "UdrDogOddsClass";
            }
            a_1h_goal_1[0].innerHTML = formatMoney(ball_data["b_1h_goal_1"],2);

            var a_1h_goal_2 = td_ball[13].querySelectorAll("a");
            if(ball_data["b_1h_goal_2"]<0){
              a_1h_goal_2[0].className = "FavOddsClass";
            }else{
              a_1h_goal_2[0].className = "UdrDogOddsClass";
            }
            a_1h_goal_2[0].innerHTML = formatMoney(ball_data["b_1h_goal_2"],2);
          }

          if(ball_data["b_add"]==1){
            td_ball[14].innerHTML = "<a href=\"javascript:openStatsInfo(&quot;"+ball_data["b_id"]+"&quot;);\" title=\"Statistic Information\"><span class=\"iconOdds stats\"></span></a>";
          }
}

function selectLeague(){
var leagues = leagueArray;
var _lbs = '';

for(var i = 0; i < leagues.length; i++){
    let _id = MD5(leagues[i]);
    let isChk = (selectedLeague.indexOf(_id) != -1 || selectedLeague.length == 0) ? 'checked="checked"' : "";
    _lbs += ['<div class="chkLgeLB-c">', 
    '<div>',
    '<table callspacing="0" cellpadding="0"><tr>',
    '<td><input type="checkbox" name="chkLge" id="chkLge_',_id,'" value="',_id,'" ' + isChk + ' /></td>',
    '<td><label for="chkLge_',_id,'">',leagueLangArray[leagues[i]],'<label></td>',
    '</tr></table>',
    '</div>',
    '</div>',].join("");
}

let _isChk = (selectedLeague.length == 0 || selectedLeague.length == leagues.length) ? 'checked="checked"' : "";
var _form = ['<div>','<div>',
'<div>',
'<input type="checkbox" name="chkLgeAll" id="chkLgeAll" value="all" ' + _isChk + ' />',
'<label for="chkLgeAll">เลือกทั้งหมด<label>',
'</div>',
'<br />',
_lbs,
'</div>','</div>'].join("");

$.confirm({
    title: 'เลือกลีกส์',
    content: _form,
    theme: 'oho ohox',
    animation: 'none',
    closeAnimation: 'none',
    useBootstrap: false,
    closeIcon: true,
    onContentReady: function () {
        var self = this;
        self.$content.find('#chkLgeAll').change(function(){
            if($(this).is(':checked')){
                self.$content.find('input[name="chkLge"]').prop('checked', 'checked');
            }else{
                self.$content.find('input[name="chkLge"]').prop('checked', '');
            }
        });
        self.$content.find('input[name="chkLge"]').change(function(){
            if($(this).is(':checked')){
                let cntChk = self.$content.find('input[name="chkLge"]:checked');
                if(cntChk.length == leagues.length)
                    self.$content.find('#chkLgeAll').prop('checked', 'checked');
            }else{
                self.$content.find('#chkLgeAll').prop('checked', '');
            }
        });
    },
    buttons: {
        confirm: {
            text: "บันทึก",
            btnClass: "btn btn-default oho-btn _submit",
            action: function () {
                var self = this;
                var chkList = self.$content.find('input[name="chkLge"]:checked');
                var chkListVal = [];
                selectedLeague = [];
                if(chkList.length > 0){
                    var _selectorStrNot = [];
                    var _selectorStr = [];
                    for(var i = 0; i < chkList.length; i++){
                        let v = $(chkList[i]).val();
                        chkListVal.push(v);

                        _selectorStr.push('#load_tb_muay_live tr.lge_' + v);
                        _selectorStr.push('#load_tb_muay tr.lge_' + v);
                        _selectorStr.push('#load_tb_ball_live tr.lge_' + v);
                        _selectorStr.push('#load_tb_ball tr.lge_' + v);

                        selectedLeague.push(v);
                   // console.log(v)
                    }
                    document.getElementById('selectLeageHidden').value = chkListVal.join(",");
                    _selectorStr = _selectorStr.join(",");
                    // _selectorStrNot = _selectorStrNot.join(",");

                    $(_selectorStr).css('display', 'table-row');
                    $('#load_tb_muay_live tr, #load_tb_muay tr, #load_tb_ball_live tr, #load_tb_ball tr').not(_selectorStr).css('display', 'none');
                }else{
                    // if not select any then show all
                    $('#load_tb_muay_live tr, #load_tb_muay tr, #load_tb_ball_live tr, #load_tb_ball tr').css('display', 'table-row');
                }
            }
        },
        cancel: { 
            text: "ยกเลิก",
            btnClass: "btn btn-default oho-btn _close",
            action: function () {},
            }
        }
    });
}

</script>
</body>
</html>
