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


<!-- <script src="<?=$hostserver;?>/commJS/jquery.min.js"></script> -->
<link rel="stylesheet" href="<?=$hostserver;?>/js/jquery-confirm/jquery-confirm.min.css">
<link rel="stylesheet" href="<?=$hostserver;?>/js/jquery-confirm/jquery-confirm-custom.css" />
<script src="<?=$hostserver;?>/js/jquery-confirm/jquery-confirm.min.js"></script>
<style type="text/css">
.show_blink a{
    border-radius: 2px;
        /*background-color: red !important;*/
        -webkit-animation: blink_ball 1s infinite;  /* Safari 4+ */
        -moz-animation: blink_ball 1s infinite;  /* Fx 5+ */
        -o-animation: blink_ball 1s infinite;  /* Opera 12+ */
        animation: blink_ball 1s infinite;  /* IE 10+, Fx 29+ */
    }
    @-webkit-keyframes blink_ball {
      0%, 49% {
        background-color: #ffaf8c;
      }
      50%, 100% {
        background-color: none;
      }
    }
.loader {
  position: fixed;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  z-index: 999999;
  background: rgba(0,0,0,0.5);
  /*display:none;*/
}
.loader>.fa {
    position: absolute;
    top: 50%;
    left: 50%;
    margin-left: -15px;
    margin-top: -15px;
    color: #000;
    font-size: 30px;
}
.lds-dual-ring {
  display: inline-block;
  width: 64px;
  height: 64px;
      top: 50%;
    left: 50%;
    position: absolute;
}
.lds-dual-ring:after {
  content: " ";
  display: block;
  width: 46px;
  height: 46px;
  margin: 1px;
  border-radius: 50%;
  border: 5px solid #dfc;
  border-color: #dfc transparent #dfc transparent;
  animation: lds-dual-ring 1.2s linear infinite;
}
@keyframes lds-dual-ring {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

@keyframes lds-dual-ring {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
</style>
</head>
<body>
<? 
  include_once 'mname_tmpl.php'; 
  include_once 'mtimezone_tmpl.php';
?>
<div class="loader"><div class="lds-dual-ring"></div></div>
<div id="MainFly" class="MainFly">
<div id="column1" class="titleBar">
  <div class="title">มวยไทย</div>
    <div class="right">
        <a id="btnSwitchBack" href="javascript:LiveInfoBackButton();trailblazer.gvend();" class="button mark" style="display:none" title="กลับ"><span>กลับ</span></a> 
      <!-- <a id="b_SwitchToParlay" href="javascript:SwitchToParlay('1');" class="button mark" style="display: block;" title="สเต็ป"><span>สเต็ป</span></a>  -->
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

<table id="tmplTable" class="oddsTable" width="100%" cellpadding="0" cellspacing="0" border="0">
  <thead id="header_tb_ball_live"></thead>
  <thead id="header_tb_ball"></thead>
</table>


<template id="header_tmpl">
    <tr>
      <th width="6%" nowrap="">เวลา</th>
      <th width="" colspan="2" align="left" class="even">รายการ</th>
      <th style="width:90px;" nowrap="nowrap" class="text-ellipsis" title="เต็มเวลา แต้มต่อ">FT. HDP</th>
      <th style="width:90px;" nowrap="nowrap" class="text-ellipsis" title="เต็มเวลา มากกว่า/น้อยกว่า">FT. O/U</th>
      <th style="width:60px;" nowrap="nowrap" class="text-ellipsis" title="เต็มเวลา คี่/คู่">FT. O/E</th>
      <th width="1%" nowrap="nowrap"></th>
    </tr>
</template>


<template id="leage_tmpl">
  <tbody>
  <tr valign="middle" style="cursor:pointer">      
    <td class="tabtitle"></td>
    <td colspan="6" class="tabtitle"></td>
  </tr>
  </tbody>
</template>




<template id="ball_tmpl">
    <tr class="displayOn"> 
      <td rowspan="2"  class="text_time"></td>
      <td rowspan="2"  class="line_unR" valign="top">
        <div></div>
        <div></div>    
        <div></div> 
      </td>
      <td rowspan="2"  align="right" nowrap="nowrap"></td>
      <td valign="top" class="none_dline none_rline">
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
      <td rowspan="2" valign="top" class="">     
        <div class="line_divR OddsDiv UdrDogOddsClass"> 
          <a></a><br>          
          <a></a><br>        
        </div>
      </td>
      <td rowspan="2" align="center" class="breakLine"><span class="displayOn"></span></td>    
    </tr>
    <tr class="">   
      <td colspan="2" align="center" class="none_rline none_lline none_tline"></td>   
    </tr>
</template>


<script src="js/sport_script.js?v=<?=time()?>"></script>
<script src="js/script_update.js?v=<?=time()?>"></script>
<script src="js/script_table.js?v=<?=time()?>"></script>
<script language="JavaScript" type="text/javascript">
var page_show = <?=($_GET["page_show"]=="" ? 1 : $_GET["page_show"])?>;


var old_arr_data = [];
var arr_blink = [];

var price_type = 0;
var Odds_type = 4;
var dp_mode = "3";

var step_mode = 1;

var live = <?=($_GET["live"]=="" ? 0 : $_GET["live"])?>;

var anam = ["<?=$arnam1?>", "<?=$arnam2?>", "<?=$arnam3?>", "<?=$arnam4?>", "<?=$arnam5?>", "<?=$arnam6?>", "<?=$arnam7?>"];

setInterval(function () {
    show_blink();
}, 1000);

// var leagueLangArray = {};
var leagueArray = {};
var selectedLeague = [];

var leagueNArray = [];
var leagueNArray_live = [];
var ballNArray = [];
var ballNArray_live = [];
var ballBGArray = [];
var ballBGArray_live = [];

var wl = 1;

function data_ball(ci , arr_data) {

  if(wl==1){
    //console.log("1");
    wl = 0;

    var time_stam = parseInt(Date.now() / 1000);

    if (JSON.stringify(arr_data) != JSON.stringify(old_arr_data) || ci == 1) {
      if(ci==1){
        old_arr_data = [];
      }else{
        old_arr_data = arr_data;
      }

      zone_data_ball = [];
      team_data_ball = {};

      zone_data_ball_live = [];
      team_data_ball_live = {};

      

      leagueLangArray = {};
      leagueArray = {};
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

  	  var arr_data_make = [];
  	  var list_zone = [];
      var list_zone_live = [];

      var list_ball = [];
      var list_ball_live = [];
      
        for (var k in data_ball) {

          var arr_insert = {};
          arr_insert["b_zone_id"] = data_ball[k]["b_zone_id"];
          arr_insert["b_zone_th"] = data_ball[k]["b_zone_th"];
          arr_insert["b_zone_en"] = data_ball[k]["b_zone_en"];
          arr_insert["b_zone"] = data_ball[k]["b_zone"];

          if(live==0){
  		  
  		  if(data_ball[k]["b_live"]==0 && data_ball[k]["b_date_play"] >= time_stam && data_ball[k]["b_zone_id"]!=null && data_ball[k]["b_active"]==1 && data_ball[k]["b_zone"]==1){

          if((data_ball[k]["b_hdc"]!="" && data_ball[k]["b_hdc_1"]!="" && data_ball[k]["b_hdc_2"]!="") || (data_ball[k]["b_goal"]!="" && data_ball[k]["b_goal_1"]!="" && data_ball[k]["b_goal_2"]!="") || (data_ball[k]["b_odd"]!=0 && data_ball[k]["b_even"]!=0)){

            if(page_show==1 && ((data_ball[k]["b_hdc"]!="" && data_ball[k]["b_hdc_1"]!="" && data_ball[k]["b_hdc_2"]!="") || (data_ball[k]["b_goal"]!="" && data_ball[k]["b_goal_1"]!="" && data_ball[k]["b_goal_2"]!="") || (data_ball[k]["b_odd"]!=0 && data_ball[k]["b_even"]!=0))){

              if(leagueArray[data_ball[k]["b_zone_id"]] === void 0){
                leagueArray[data_ball[k]["b_zone_id"]] = {
                  'name_en': data_ball[k]["b_zone_en"],
                  'name_th': (data_ball[k]["b_zone_th"]=="" ? data_ball[k]["b_zone_en"] : data_ball[k]["b_zone_th"]),
                };
              }

              if(selectedLeague.length > 0 && selectedLeague.indexOf(""+data_ball[k]["b_zone_id"]+"") == -1){
                continue;
              }

              var list_zone_data = {};
              list_zone_data["zID"] = data_ball[k]["b_zone_id"];
              list_zone_data["zASC"] = data_ball[k]["b_asc"];
              list_zone_data["zData"] = arr_insert;
              list_zone_data["zName"] = data_ball[k]["b_zone_en"];
              list_zone[data_ball[k]["b_zone_id"]] = list_zone_data;

              if (!list_ball[data_ball[k]["b_zone_id"]]) {
                list_ball[data_ball[k]["b_zone_id"]] = [];
              }

              if(Odds_type==1){
                data_ball[k]["b_hdc_1"] = dec_price(data_ball[k]["b_hdc_1"]);
                data_ball[k]["b_hdc_2"] = dec_price(data_ball[k]["b_hdc_2"]);
                data_ball[k]["b_goal_1"] = dec_price(data_ball[k]["b_goal_1"]);
                data_ball[k]["b_goal_2"] = dec_price(data_ball[k]["b_goal_2"]);
                data_ball[k]["b_odd"] = dec_price(data_ball[k]["b_odd"]);
                data_ball[k]["b_even"] = dec_price(data_ball[k]["b_even"]);

                data_ball[k]["b_1h_hdc_1"] = dec_price(data_ball[k]["b_1h_hdc_1"]);
                data_ball[k]["b_1h_hdc_2"] = dec_price(data_ball[k]["b_1h_hdc_2"]);
                data_ball[k]["b_1h_goal_1"] = dec_price(data_ball[k]["b_1h_goal_1"]);
                data_ball[k]["b_1h_goal_2"] = dec_price(data_ball[k]["b_1h_goal_2"]);
                data_ball[k]["b_1h_odd"] = dec_price(data_ball[k]["b_1h_odd"]);
                data_ball[k]["b_1h_even"] = dec_price(data_ball[k]["b_1h_even"]);
              }else if(Odds_type==2){
                data_ball[k]["b_hdc_1"] = hk_price(data_ball[k]["b_hdc_1"]);
                data_ball[k]["b_hdc_2"] = hk_price(data_ball[k]["b_hdc_2"]);
                data_ball[k]["b_goal_1"] = hk_price(data_ball[k]["b_goal_1"]);
                data_ball[k]["b_goal_2"] = hk_price(data_ball[k]["b_goal_2"]);
                data_ball[k]["b_odd"] = hk_price(data_ball[k]["b_odd"]);
                data_ball[k]["b_even"] = hk_price(data_ball[k]["b_even"]);

                data_ball[k]["b_1h_hdc_1"] = hk_price(data_ball[k]["b_1h_hdc_1"]);
                data_ball[k]["b_1h_hdc_2"] = hk_price(data_ball[k]["b_1h_hdc_2"]);
                data_ball[k]["b_1h_goal_1"] = hk_price(data_ball[k]["b_1h_goal_1"]);
                data_ball[k]["b_1h_goal_2"] = hk_price(data_ball[k]["b_1h_goal_2"]);
                data_ball[k]["b_1h_odd"] = hk_price(data_ball[k]["b_1h_odd"]);
                data_ball[k]["b_1h_even"] = hk_price(data_ball[k]["b_1h_even"]);
              }

              var list_ball_data = {};
              list_ball_data["bID"] = data_ball[k]["b_id"];
              list_ball_data["bASC"] = data_ball[k]["b_top"];
              list_ball_data["bAdd"] = data_ball[k]["b_add"];
              list_ball_data["bDP"] = data_ball[k]["b_date_play"];
              list_ball_data["bData"] = data_ball[k];
              list_ball[data_ball[k]["b_zone_id"]].push(list_ball_data);
            }
          }  
  		  }

      }

        if((data_ball[k]["b_live"]==1 || data_ball[k]["b_live"]==2 || data_ball[k]["b_live"]==3) && data_ball[k]["b_zone"]==1){

          if(data_ball[k]["b_add"]!=1 && (data_ball[k]["b_hdc"]==0 && data_ball[k]["b_hdc_1"]==0 && data_ball[k]["b_hdc_2"]==0) && (data_ball[k]["b_goal"]==0 && data_ball[k]["b_goal_1"]==0 && data_ball[k]["b_goal_2"]==0) && (data_ball[k]["b_odd"]==0 && data_ball[k]["b_even"]==0)){

          }else{

            if(page_show==1 && ((data_ball[k]["b_hdc"]!="" && data_ball[k]["b_hdc_1"]!="" && data_ball[k]["b_hdc_2"]!="") || (data_ball[k]["b_goal"]!="" && data_ball[k]["b_goal_1"]!="" && data_ball[k]["b_goal_2"]!="") || (data_ball[k]["b_odd"]!=0 && data_ball[k]["b_even"]!=0))){

              if(leagueArray[data_ball[k]["b_zone_id"]] === void 0){
                leagueArray[data_ball[k]["b_zone_id"]] = {
                  'name_en': data_ball[k]["b_zone_en"],
                  'name_th': (data_ball[k]["b_zone_th"]=="" ? data_ball[k]["b_zone_en"] : data_ball[k]["b_zone_th"]),
                };
                // leagueLangArray[data_ball[k]["b_zone_en"]] = data_ball[k]["b_zone_th"];
              }

              if(selectedLeague.length > 0 && selectedLeague.indexOf(""+data_ball[k]["b_zone_id"]+"") == -1){
                continue;
              }

              var list_zone_data = {};
              list_zone_data["zID"] = data_ball[k]["b_zone_id"];
              list_zone_data["zASC"] = data_ball[k]["b_asc"];
              list_zone_data["zData"] = arr_insert;
              list_zone_data["zName"] = data_ball[k]["b_zone_en"];
              list_zone_live[data_ball[k]["b_zone_id"]] = list_zone_data;

              if (!list_ball_live[data_ball[k]["b_zone_id"]]) {
                list_ball_live[data_ball[k]["b_zone_id"]] = [];
              }

              if(Odds_type==1){
                data_ball[k]["b_hdc_1"] = dec_price(data_ball[k]["b_hdc_1"]);
                data_ball[k]["b_hdc_2"] = dec_price(data_ball[k]["b_hdc_2"]);
                data_ball[k]["b_goal_1"] = dec_price(data_ball[k]["b_goal_1"]);
                data_ball[k]["b_goal_2"] = dec_price(data_ball[k]["b_goal_2"]);
                data_ball[k]["b_odd"] = dec_price(data_ball[k]["b_odd"]);
                data_ball[k]["b_even"] = dec_price(data_ball[k]["b_even"]);

                data_ball[k]["b_1h_hdc_1"] = dec_price(data_ball[k]["b_1h_hdc_1"]);
                data_ball[k]["b_1h_hdc_2"] = dec_price(data_ball[k]["b_1h_hdc_2"]);
                data_ball[k]["b_1h_goal_1"] = dec_price(data_ball[k]["b_1h_goal_1"]);
                data_ball[k]["b_1h_goal_2"] = dec_price(data_ball[k]["b_1h_goal_2"]);
                data_ball[k]["b_1h_odd"] = dec_price(data_ball[k]["b_1h_odd"]);
                data_ball[k]["b_1h_even"] = dec_price(data_ball[k]["b_1h_even"]);
              }else if(Odds_type==2){
                data_ball[k]["b_hdc_1"] = hk_price(data_ball[k]["b_hdc_1"]);
                data_ball[k]["b_hdc_2"] = hk_price(data_ball[k]["b_hdc_2"]);
                data_ball[k]["b_goal_1"] = hk_price(data_ball[k]["b_goal_1"]);
                data_ball[k]["b_goal_2"] = hk_price(data_ball[k]["b_goal_2"]);
                data_ball[k]["b_odd"] = hk_price(data_ball[k]["b_odd"]);
                data_ball[k]["b_even"] = hk_price(data_ball[k]["b_even"]);

                data_ball[k]["b_1h_hdc_1"] = hk_price(data_ball[k]["b_1h_hdc_1"]);
                data_ball[k]["b_1h_hdc_2"] = hk_price(data_ball[k]["b_1h_hdc_2"]);
                data_ball[k]["b_1h_goal_1"] = hk_price(data_ball[k]["b_1h_goal_1"]);
                data_ball[k]["b_1h_goal_2"] = hk_price(data_ball[k]["b_1h_goal_2"]);
                data_ball[k]["b_1h_odd"] = hk_price(data_ball[k]["b_1h_odd"]);
                data_ball[k]["b_1h_even"] = hk_price(data_ball[k]["b_1h_even"]);
              }

              var list_ball_data = {};
              list_ball_data["bID"] = data_ball[k]["b_id"];
              list_ball_data["bASC"] = data_ball[k]["b_top"];
              list_ball_data["bAdd"] = data_ball[k]["b_add"];
              list_ball_data["bDP"] = data_ball[k]["b_date_play"];
              list_ball_data["bData"] = data_ball[k];
              list_ball_live[data_ball[k]["b_zone_id"]].push(list_ball_data);
            }
          }
        }
      }

      list_zone_live.sort(dynamicSortMultiple("zASC Asc" , "zName Asc" , "zID Asc"));
  	  list_zone.sort(dynamicSortMultiple("zASC Asc" , "zName Asc" , "zID Asc"));

      var id_bf = "";
      var id_af = "";
      leagueNArray = [];
      ballNArray = [];
      ballBGArray = [];
      for (var k in list_zone) {
        var tdata = list_zone[k];
        var tdata2 = [];
        var tdata3 = [];
        tdata2 = list_zone[parseInt(k)+1];
        //console.log(tdata2);
        if(tdata2!=undefined){
          id_af = tdata2["zID"];
          tdata["zAF"] = id_af;
        }else{
          tdata["zAF"] = "";
        }

        tdata3 = list_zone[parseInt(k)-1];
        //console.log(tdata2);
        if(tdata3!=undefined){
          id_bf = tdata3["zID"];
          tdata["zBF"] = id_bf;
        }else{
          tdata["zBF"] = "";
        }

        leagueNArray.push(tdata["zID"]);
        //console.log(list_zone[k]);
        var dball = [];
        dball = list_ball[list_zone[k].zData.b_zone_id];
        if(dball!=undefined){
          dball.sort(dynamicSortMultiple("bASC Asc" , "bDP Asc" , "bID Asc" , "bAdd Asc"));
          var idb_bf = "";
          var idb_af = "";
          for (var kk in dball) {
            var tbdata = dball[kk];
            var tbdata2 = [];
            var tbdata3 = [];
            tbdata2 = dball[parseInt(kk)+1];
            if(tbdata2!=undefined){
              idb_af = tbdata2["bID"]+"_"+tbdata2["bAdd"];
              tbdata["bAF"] = idb_af;
            }else{
              tbdata["bAF"] = "";
            }

            tbdata3 = dball[parseInt(kk)-1];
            if(tbdata3!=undefined){
              idb_bf = tbdata3["bID"]+"_"+tbdata3["bAdd"];
              tbdata["bBF"] = idb_bf;
            }else{
              tbdata["bBF"] = "";
            }

            ballNArray.push(dball[kk].bID+"_"+dball[kk].bAdd);

            var list_bg = {};
            list_bg["bID"] = dball[kk].bID;
            list_bg["bAdd"] = dball[kk].bAdd;
            ballBGArray.push(list_bg);
          }
          
        }
      }
      //console.log(ballBGArray);
      var id_bf_live = "";
      var id_af_live = "";
      leagueNArray_live = [];
      ballNArray_live = [];
      ballBGArray_live = [];
      for (var k in list_zone_live) {
        var tdata = list_zone_live[k];
        var tdata2 = [];
        var tdata3 = [];
        tdata2 = list_zone_live[parseInt(k)+1];
        //console.log(tdata2);
        if(tdata2!=undefined){
          id_af = tdata2["zID"];
          tdata["zAF"] = id_af;
        }else{
          tdata["zAF"] = "";
        }

        tdata3 = list_zone_live[parseInt(k)-1];
        //console.log(tdata2);
        if(tdata3!=undefined){
          id_bf = tdata3["zID"];
          tdata["zBF"] = id_bf;
        }else{
          tdata["zBF"] = "";
        }
        
        leagueNArray_live.push(tdata["zID"]);
        //console.log(list_zone_live[k]);
        var dball = [];
        dball = list_ball_live[list_zone_live[k].zData.b_zone_id];
        if(dball!=undefined){
          dball.sort(dynamicSortMultiple("bASC Asc" , "bDP Asc" , "bID Asc" , "bAdd Asc"));
          var idb_bf = "";
          var idb_af = "";
          for (var kk in dball) {
            var tbdata = dball[kk];
            var tbdata2 = [];
            var tbdata3 = [];

            tbdata2 = dball[parseInt(kk)+1];
            if(tbdata2!=undefined){
              idb_af = tbdata2["bID"]+"_"+tbdata2["bAdd"];
              tbdata["bAF"] = idb_af;
            }else{
              tbdata["bAF"] = "";
            }

            tbdata3 = dball[parseInt(kk)-1];
            if(tbdata3!=undefined){
              idb_bf = tbdata3["bID"]+"_"+tbdata3["bAdd"];
              tbdata["bBF"] = idb_bf;
            }else{
              tbdata["bBF"] = "";
            }


            ballNArray_live.push(dball[kk].bID+"_"+dball[kk].bAdd);

            var list_bg = {};
            list_bg["bID"] = dball[kk].bID;
            list_bg["bAdd"] = dball[kk].bAdd;
            ballBGArray_live.push(list_bg);
          }
          
        }
        
      }


     // console.log(ballBGArray_live);
     set_table(list_zone_live , list_ball_live , "ball_live");
  	 set_table(list_zone , list_ball , "ball");

      // display league length
      document.getElementById('TotalLeagueCnt').innerHTML = Object.keys(leagueArray).length;
      if(selectedLeague.length > 0){
        document.getElementById('AllSelL').innerHTML = selectedLeague.length;
      }else{
        document.getElementById('AllSelL').innerHTML = Object.keys(leagueArray).length;
      }
    }else{
      old_arr_data = arr_data;
    }

    wl = 1;
    //console.log("0");
  }
}

var n =1;
var n_live =1;
var old_lg = [];
var old_lg_live = [];
var old_bl = [];
var old_bl_live = [];
function set_table(data , datax , tyx){
  if(tyx=="ball_live"){
    var nc = n_live;
  }else{
    var nc = n;
  }

  if(tyx=="ball_live"){
    if(data.length <= 0){
      $("#header_tb_ball_live").html("");
    }
  }else{
    if(data.length <= 0){
      $("#header_tb_ball").html("");
    }
  }
  
  var template_header = document.querySelector('#header_tmpl');
  var template_leage = document.querySelector('#leage_tmpl');

  var load_tb_ball = document.querySelector("#tmplTable");

  var clone_header= document.importNode(template_header.content, true);

  if(tyx=="ball_live"){
    if(data.length > 0 && $("#header_tb_ball_live").html()==""){
      header_tb_ball_live.appendChild(clone_header);
    }
  }else{
    if(data.length > 0 && $("#header_tb_ball").html()==""){
      header_tb_ball.appendChild(clone_header);
    }
  }

  //console.log(data);
	if(nc==1){
		
		for (var k in data) {
			var clone_leage = document.importNode(template_leage.content, true);
			var tbody_leage = clone_leage.querySelectorAll("tbody");
      tbody_leage[0].className += "lg_"+tyx+data[k].zData.b_zone_id;

      var tr_leage = clone_leage.querySelectorAll("tr");
      tr_leage[0].className += "lge_"+tyx+data[k].zData.b_zone_id;
			var td_leage = clone_leage.querySelectorAll("td");
			td_leage[1].textContent = (data[k].zData.b_zone_th=="" ? data[k].zData.b_zone_en : data[k].zData.b_zone_th);

      if(data[k].zBF==""){
        if(tyx=="ball_live"){
          var elm = document.getElementById("header_tb_ball_live");
        }else{
          var elm = document.getElementById("header_tb_ball");
        }
        $(clone_leage).insertAfter(elm);
      }else{
        var elm = document.getElementsByClassName("lg_"+tyx+data[k].zBF);
        $(clone_leage).insertAfter(elm);
      }

      var dball = [];
      dball = datax[data[k].zData.b_zone_id];
      if(dball!=undefined){
        dball.sort(dynamicSortMultiple("bASC Asc" , "bDP Asc" , "bID Asc" , "bAdd Asc"));
        if(tyx=="ball_live"){
          cre_TB_live(dball , "lg_"+tyx+data[k].zData.b_zone_id);
        }else{
          cre_TB(dball , "lg_"+tyx+data[k].zData.b_zone_id);
        }
      }
		}
    if(tyx=="ball_live"){ set_BG_live(ballBGArray_live); }else{ set_BG(ballBGArray); }
    if(tyx=="ball_live"){
      old_lg_live = data;
      old_bl_live = datax;
      n_live=0;
    }else{
      old_lg = data;
      old_bl = datax;
      n=0;
    }
	}else{
    var old_arr = [];
    var old_barr = [];
    if(tyx=="ball_live"){
      old_arr = old_lg_live;
      old_barr = old_bl_live;
    }else{
      old_arr = old_lg;
      old_barr = old_bl;
    }

    var leagueOArray = [];
    var ballOArray = [];
    for (var ko in old_arr) {
      if(tyx=="ball_live"){
        var a = leagueNArray_live.indexOf(old_arr[ko].zID);
      }else{
        var a = leagueNArray.indexOf(old_arr[ko].zID);
      }
      
      if(a<0){
        $(".lg_"+tyx+old_arr[ko].zID).remove();
        delete old_arr[ko];
      }else{
        leagueOArray.push(old_arr[ko].zID);
      }
      if(old_arr[ko]!=undefined){
        var dball = [];
        dball = old_barr[old_arr[ko].zData.b_zone_id];
        for (var kox in dball) {
          if(tyx=="ball_live"){
            var ax = ballNArray_live.indexOf(dball[kox].bID+"_"+dball[kox].bAdd);
          }else{
            var ax = ballNArray.indexOf(dball[kox].bID+"_"+dball[kox].bAdd);
          }
          if(ax<0){
            $(".bl_"+tyx+dball[kox].bID+"_"+dball[kox].bAdd).remove();
            $(".blx_"+tyx+dball[kox].bID+"_"+dball[kox].bAdd).remove();
            delete dball[kox];
          }else{
            ballOArray.push(dball[kox].bID+"_"+dball[kox].bAdd);
          }
        }
        old_barr[old_arr[ko].zData.b_zone_id] = dball;
      }
    }


    for (var k in data) {
      var a = leagueOArray.indexOf(data[k].zID);
      if(a<0){
        var clone_leage = document.importNode(template_leage.content, true);
        var tbody_leage = clone_leage.querySelectorAll("tbody"); 
        tbody_leage[0].className += "lg_"+tyx+data[k].zData.b_zone_id;

        var tr_leage = clone_leage.querySelectorAll("tr");
        tr_leage[0].className += "lge_"+tyx+data[k].zData.b_zone_id;
        var td_leage = clone_leage.querySelectorAll("td");
        td_leage[1].textContent = (data[k].zData.b_zone_th=="" ? data[k].zData.b_zone_en : data[k].zData.b_zone_th);


        if(data[k].zBF==""){
          if(tyx=="ball_live"){
            var elm = document.getElementById("header_tb_ball_live");
          }else{
            var elm = document.getElementById("header_tb_ball");
          }
          $(clone_leage).insertAfter(elm);
        }else{
          var elm = document.getElementsByClassName("lg_"+tyx+data[k].zBF);
          $(clone_leage).insertAfter(elm);
        }

        var dball = [];
        dball = datax[data[k].zData.b_zone_id];
        if(dball!=undefined){
          dball.sort(dynamicSortMultiple("bASC Asc" , "bDP Asc" , "bID Asc" , "bAdd Asc"));
          if(tyx=="ball_live"){
            cre_TB_live(dball , "lg_"+tyx+data[k].zData.b_zone_id);
          }else{
            cre_TB(dball , "lg_"+tyx+data[k].zData.b_zone_id);
          }
          if(tyx=="ball_live"){ set_BG_live(ballBGArray_live); }else{ set_BG(ballBGArray); }
        }

      }else{
        var dataO = {};
        for (var ko in old_arr) {
          if(old_arr[ko].zID==data[k].zID){
            dataO = old_arr[ko];
          }
        }
        if(dataO.zAF!=data[k].zAF || dataO.zBF!=data[k].zBF){
          //console.log(data[k]);
          if(data[k].zBF==""){

            if(tyx=="ball_live"){
              var elm = document.getElementById("header_tb_ball_live");
            }else{
              var elm = document.getElementById("header_tb_ball");
            }

            //var elm = document.getElementsByClassName("lg_"+tyx+data[k].zAF);
            var elmx = document.getElementsByClassName("lg_"+tyx+data[k].zID);
            $(elmx).insertAfter(elm);
          }else{
            var elm = document.getElementsByClassName("lg_"+tyx+data[k].zBF);
            var elmx = document.getElementsByClassName("lg_"+tyx+data[k].zID);
            $(elmx).insertAfter(elm);
          }
        }

        var dball = [];
        dball = datax[data[k].zData.b_zone_id];
        if(dball!=undefined){
          for (var kb in dball) {
            var ab = ballOArray.indexOf(dball[kb].bID+"_"+dball[kb].bAdd);
            if(ab<0){
              var send_db = [];
              //console.log(dball[kb]);
              send_db.push(dball[kb]);
              if(tyx=="ball_live"){
                cre_TB_live(send_db , "lg_"+tyx+data[k].zData.b_zone_id);
              }else{
                cre_TB(send_db , "lg_"+tyx+data[k].zData.b_zone_id);
              }
              if(tyx=="ball_live"){ set_BG_live(ballBGArray_live); }else{ set_BG(ballBGArray); }
            }else{
              var databO = {};
              var obl = old_barr[data[k].zData.b_zone_id];
              for (var kbo in obl) {
                if(obl[kbo].bID==dball[kb].bID && obl[kbo].bAdd==dball[kb].bAdd){
                  databO = obl[kbo];
                }
              }
              if(databO.bAF!=dball[kb].bAF || databO.bBF!=dball[kb].bBF){
                if(dball[kb].bBF==""){
                  var elm = document.getElementsByClassName("bl_"+tyx+dball[kb].bAF);
                  var elmx = document.getElementsByClassName("bl_"+tyx+dball[kb].bID+"_"+dball[kb].bAdd);
                  var elmxx = document.getElementsByClassName("blx_"+tyx+dball[kb].bID+"_"+dball[kb].bAdd);
                  $(elmx).insertBefore(elm);
                  $(elmxx).insertBefore(elm);
                }else{
                  var elm = document.getElementsByClassName("blx_"+tyx+dball[kb].bBF);
                  var elmx = document.getElementsByClassName("bl_"+tyx+dball[kb].bID+"_"+dball[kb].bAdd);
                  var elmxx = document.getElementsByClassName("blx_"+tyx+dball[kb].bID+"_"+dball[kb].bAdd);

                  $(elmx).insertAfter(elm);
                  $(elmxx).insertAfter(elmx);
                }
              }

              var dataI_old = databO.bData;
              var dataI_new = dball[kb].bData;
              var id_tr = 'id_'+dataI_new["b_id"]+'_'+dataI_new["b_add"];
              if(tyx=="ball_live"){
                if(dataI_old["b_run_score_full"]!=dataI_new["b_run_score_full"] || dataI_old["b_live_string"]!=dataI_new["b_live_string"]){
                  if(dataI_new["b_live"]==1 || dataI_new["b_live"]==3){
                    $("#"+id_tr+"_ts").html("<font color=\"red\">"+dataI_new["b_run_score_full"]+"</font> <br>"+dataI_new["b_live_string"]+"'");
                  }else{
                    $("#"+id_tr+"_ts").html("<font color=\"red\">"+dataI_new["b_run_score_full"]+"</font> <br><span style='color: #106cbb; font-weight: bold;'>"+dataI_new["b_live_string"]+"</span>");
                  }
                }
              }else{
                if(dataI_old["b_date_play"]!=dataI_new["b_date_play"]){
                  var date_data_1 = new Date(dataI_new["b_date_play"] * 1000);
                  var hours_data_1 = "0" + date_data_1.getHours();
                  var minutes_data_1 = "0" + date_data_1.getMinutes();
                  var formattedTime = hours_data_1.substr(-2) + ':' + minutes_data_1.substr(-2);
                  $("#"+id_tr+"_ts").html("<font color=\"red\">LIVE</font><br>"+formattedTime);
                }
              }
              update_team(dataI_old , dataI_new , id_tr);
              update_hdp(dataI_old , dataI_new , id_tr);
              update_goal(dataI_old , dataI_new , id_tr);
              update_1x2(dataI_old , dataI_new , id_tr);
              update_oe(dataI_old , dataI_new , id_tr);

            }
          }
        }


      }
    }
    if(tyx=="ball_live"){
      old_lg_live = data;
      old_bl_live = datax;
    }else{
      old_lg = data;
      old_bl = datax;
    }
  }
  $(".loader").hide();
}
function cre_TB_live(dball , lg){
    var load_tb_ball = document.querySelector("."+lg);

      var n_team = 0;
      var c_team_show = {};

      for (var k3 in dball) {
        var ball_data = dball[k3].bData;

          var template_ball = document.querySelector('#ball_tmpl');

          var clone_ball = document.importNode(template_ball.content, true);

          var tr_ball = clone_ball.querySelectorAll("tr");
          
          
          var id_tr = 'e_'+ball_data["b_id"]+'_'+ball_data["b_add"];

          tr_ball[0].setAttribute('id', id_tr+'_1');
          tr_ball[1].setAttribute('id', id_tr+'_2');
          tr_ball[0].className += " displayOn " + " bl_ball_live" + ball_data["b_id"]+"_"+ball_data["b_add"] + " bl_bg" + ball_data["b_id"];
          tr_ball[1].className += " blx_ball_live" + ball_data["b_id"]+"_"+ball_data["b_add"] + " bl_bg" + ball_data["b_id"];

          if(ball_data["b_name_1_th"]==""){
            ball_data["b_name_1_th"] = ball_data["b_name_1_en"];
          }
          if(ball_data["b_name_2_th"]==""){
            ball_data["b_name_2_th"] = ball_data["b_name_2_en"];
          }

          set_table_muay(clone_ball , ball_data);
          if(dball[k3].bBF==""){
            var elm = document.getElementsByClassName("lge_ball_live"+ball_data["b_zone_id"]);
            $(clone_ball).insertAfter(elm);
          }else{
            if($(".blx_ball_live"+dball[k3].bBF).html()!=undefined){
              var elm = document.getElementsByClassName("blx_ball_live"+dball[k3].bBF);
              $(clone_ball).insertAfter(elm);
            }else{
              load_tb_ball.appendChild(clone_ball);
            }
          }
          n_team++;   
      }
      if (n_team <= 0) {
        $("."+lg).hide();
      }else{
        $("."+lg).show();
      }
     
}
function cre_TB(dball , lg){
  var load_tb_ball = document.querySelector("."+lg);
 
      var n_team = 0;
      var c_team_show = {};

      for (var k3 in dball) {
        var ball_data = dball[k3].bData;

          var template_ball = document.querySelector('#ball_tmpl');

          var clone_ball = document.importNode(template_ball.content, true);

          var tr_ball = clone_ball.querySelectorAll("tr");
          
          var id_tr = 'e_'+ball_data["b_id"]+'_'+ball_data["b_add"];

          tr_ball[0].setAttribute('id', id_tr+'_1');
          tr_ball[1].setAttribute('id', id_tr+'_2');
          tr_ball[0].className += " displayOn " + " bl_ball" + ball_data["b_id"]+"_"+ball_data["b_add"] + " bl_bg" + ball_data["b_id"];
          tr_ball[1].className += " blx_ball" + ball_data["b_id"]+"_"+ball_data["b_add"] + " bl_bg" + ball_data["b_id"];

          if(ball_data["b_name_1_th"]==""){
            ball_data["b_name_1_th"] = ball_data["b_name_1_en"];
          }
          if(ball_data["b_name_2_th"]==""){
            ball_data["b_name_2_th"] = ball_data["b_name_2_en"];
          }

          set_table_muay(clone_ball , ball_data);
          if(dball[k3].bBF==""){
            var elm = document.getElementsByClassName("lge_ball"+ball_data["b_zone_id"]);
            $(clone_ball).insertAfter(elm);
          }else{
            if($(".blx_ball"+dball[k3].bBF).html()!=undefined){
              var elm = document.getElementsByClassName("blx_ball"+dball[k3].bBF);
              $(clone_ball).insertAfter(elm);
            }else{
              load_tb_ball.appendChild(clone_ball);
            }
          }
          n_team++;
        }

        if (n_team <= 0) {
          $("."+lg).hide();
        }else{
          $("."+lg).show();
        }
  
}
</script>
</body>
</html>
