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

<script src="js/react.min.js?v20190820001"></script>
<script src="js/react-dom.min.js?v20190820001"></script>


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
  .ball_hov:hover{
    background: #f5eeb8;
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
  <div class="title"><?=$sport_type[$_GET["zone"]]?><?=$lang_member[887]?></div>
    <div class="right">
        <a id="btnSwitchBack" href="javascript:LiveInfoBackButton();trailblazer.gvend();" class="button mark" style="display:none" title="กลับ"><span>กลับ</span></a> 
      <!-- <a id="b_SwitchToParlay" href="javascript:SwitchToParlay('1');" class="button mark" style="display: block;" title="สเต็ป"><span>สเต็ป</span></a>  -->
      <a id="b_SwitchToParlay" href="#" onclick="OnSwitchSportMixParley(this , '<?=$_SESSION['m_token'];?>')" class="button mark" style="display: block;" title="<?=$lang_member[767]?>" data-parley="mixparley"><span><?=$lang_member[767]?></span></a> 
      
        <!--<div id="aSorter_Div" tabindex="6" hidefocus="" onkeypress="onKeyPressSelecter('aSorter',event);return false;" onclick="onClickSelecter('aSorter');return false;" class="button select icon">
<input type="hidden" name="aSorter" id="aSorter" value="0">
<span id="aSorter_Txt" title="เรียงลำดับตามปกติ"><div id="aSorter_Icon" class="icon_NO"></div></span>
<ul id="aSorter_menu" class="submenu">
<li title="เรียงตามเวลา" onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('aSorter',this,'1',true);"><div class="icon_ST"></div>เรียงตามเวลา</li>
<li title="เรียงลำดับตามปกติ" onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('aSorter',this,'0',true);"><div class="icon_NO"></div>เรียงลำดับตามปกติ</li>
</ul>
</div>-->

        <input type="hidden" name="selectLeageHidden" id="selectLeageHidden" />
        <!-- <a href="javascript:openLeague(640,'เลือกลีค','t','1','1,3,5,7,8,15','0','UnderOver');" class="button selectLeague" style="display:inline-block;" title="เลือกลีค"> -->
        <a href="javascript:selectLeague();" class="button selectLeague" style="display:inline-block;" title="<?=$lang_member[786]?>">
          <span>
            <div id="League_New" class="">
              <div id="SelLeagueIcon" class="displayOff">
                <div class="icon">
                </div>
              </div>
              <div class="events">
                <div class="normal">(</div><div id="CustSelL" class="selected displayOff">0</div><div id="AllSelL" class="displayOn">0</div><div class="normal">/</div><div id="TotalLeagueCnt" class="normal">0</div><div class="normal">)</div>
              </div>
              <?=$lang_member[788]?></div>
            <div id="League_Old" class="displayOff">
              <?=$lang_member[786]?></div>
            </span>
        </a>        

        <div id="disstyle_Div" tabindex="6" hidefocus="" onkeypress="onKeyPressSelecter('disstyle',event);return false;" onclick="onClickSelecter('disstyle');return false;" class="button select icon">
<input type="hidden" name="disstyle" id="disstyle" value="3">
<span id="disstyle_Txt" title="<?=$lang_member[884]?>"><div id="disstyle_Icon" class="icon_DL"></div></span>
<ul id="disstyle_menu" class="submenu" style="visibility: hidden;">
<li title="<?=$lang_member[885]?>" onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('disstyle',this,'1',true);changeDisplayModex('1','ohoking.com'); parent.focus();"><div class="icon_SL"></div><?=$lang_member[885]?></li>
<li title="<?=$lang_member[884]?>" onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('disstyle',this,'3',true);changeDisplayModex('3','ohoking.com'); parent.focus();"><div class="icon_DL"></div><?=$lang_member[884]?></li>
<li title="<?=$lang_member[805]?>" onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('disstyle',this,'1F',true);changeDisplayModex('1F','ohoking.com'); parent.focus();"><div class="icon_FT"></div><?=$lang_member[805]?></li>
<li title="<?=$lang_member[803]?>" onmouseover="onOver(this)" onmouseout="onOut(this)" onclick="setSelecter('disstyle',this,'1H',true);changeDisplayModex('1H','ohoking.com'); parent.focus();"><div class="icon_HT"></div><?=$lang_member[803]?></li>
</ul>
</div>

        
        
          <div id="selOddsType_Div" tabindex="6" hidefocus="" onkeypress="onKeyPressSelecter('selOddsType',event);return false;" onclick="onClickSelecter('selOddsType');return false;" class="button select icon">
<input type="hidden" name="selOddsType" id="selOddsType" value="4">
<span id="selOddsType_Txt" title="<?=$lang_member[790]?>"><div id="selOddsType_Icon" class="icon_MY"></div></span>
<ul id="selOddsType_menu" class="submenu">
<li title="<?=$lang_member[791]?>" onmouseover="onOver(this)" class="oddsLI-2" onmouseout="onOut(this)" onclick="setSelecter('selOddsType',this,'2',true);changeOddsType_ou(2);"><div class="icon_HK"></div><?=$lang_member[791]?></li>
<li title="<?=$lang_member[793]?>" onmouseover="onOver(this)" class="oddsLI-1" onmouseout="onOut(this)" onclick="setSelecter('selOddsType',this,'1',true);changeOddsType_ou(1);"><div class="icon_Dec"></div><?=$lang_member[793]?></li>
<li title="<?=$lang_member[790]?>" onmouseover="onOver(this)" class="oddsLI-4" onmouseout="onOut(this)" onclick="setSelecter('selOddsType',this,'4',true);changeOddsType_ou(4);"><div class="icon_MY"></div><?=$lang_member[790]?></li>
</ul>
</div>

    </div>
</div>
<div id="MiddleLiveInfo" class="MainTVInfo" style="display: none; color:#e8eff5">
  <div class="loadiframe"><iframe id="MiddleLiveInfoFrame" src="" scrolling="no" frameborder="0" style="height: 417px;"></iframe></div>
</div>
</div>

<div id="main"></div>

<script src="js/sport_script.js?v=<?=time()?>"></script>
<script src="js/script_tablex.js?v=<?=time()?>"></script>
<script language="JavaScript" type="text/javascript">
var page_show = <?=($_GET["page_show"]=="" ? 1 : $_GET["page_show"])?>;
var page_zone = <?=($_GET["zone"]=="" ? 6 : $_GET["zone"])?>;

if(page_show==1){
    $("#disstyle_Div").show();
    $("#selOddsType_Div").show();
  }else if(page_show==2){
    $("#disstyle_Div").hide();
    $("#selOddsType_Div").hide();
  }else if(page_show==3){
    $("#disstyle_Div").hide();
    $("#selOddsType_Div").show();
  }

var old_arr_data = [];
var arr_blink = [];

var price_type = 0;
var Odds_type = 4;
var dp_mode = "3";

var txt_draw = "<?=$lang_member[220]?>";
var txt_Hwin = "<?=$lang_member[1386]?>";
var txt_Awin = "<?=$lang_member[1387]?>";
var txt_Odd = "<?=$lang_member[453]?>";
var txt_Even = "<?=$lang_member[459]?>";
var txt_select_all = "<?=$lang_member[1027]?>";
var txt_save = "<?=$lang_member[121]?>";
var txt_cancel = "<?=$lang_member[65]?>";
var txt_title_league = "<?=$lang_member[786]?>";
var txt_lang_sport = [];
txt_lang_sport[42] = "<?=$lang_member[303]?>";
txt_lang_sport[40] = "<?=$lang_member[708]?>";
txt_lang_sport[122] = "<?=$lang_member[901]?>";
txt_lang_sport[123] = "<?=$lang_member[902]?>";
txt_lang_sport[124] = "<?=$lang_member[903]?>";
txt_lang_sport[125] = "<?=$lang_member[904]?>";
txt_lang_sport[126] = "<?=$lang_member[905]?>";
txt_lang_sport[127] = "<?=$lang_member[906]?>";
txt_lang_sport[44] = "<?=$lang_member[805]?>";
txt_lang_sport[43] = "<?=$lang_member[803]?>";
txt_lang_sport[21] = "<?=$lang_member[312]?>";

txt_lang_sport[116] = "<?=$lang_member[895]?>";
txt_lang_sport[117] = "<?=$lang_member[896]?>";
txt_lang_sport[118] = "<?=$lang_member[897]?>";
txt_lang_sport[119] = "<?=$lang_member[898]?>";
txt_lang_sport[120] = "<?=$lang_member[899]?>";
txt_lang_sport[121] = "<?=$lang_member[900]?>";


var step_mode = 1;

var live = <?=($_GET["live"]=="" ? 0 : $_GET["live"])?>;

var anam = ["<?=$arnam1?>", "<?=$arnam2?>", "<?=$arnam3?>", "<?=$arnam4?>", "<?=$arnam5?>", "<?=$arnam6?>", "<?=$arnam7?>"];

setInterval(function () {
    show_blinkx();
}, 1000);

// var leagueLangArray = {};
var leagueArray = {};
var selectedLeague = [];

var leagueNArray = [];
var leagueNArray_live = [];
var ballNArray = [];
var ballNArray_live = [];

var wl = 1;

function data_ball(ci , arr_data) {
  if(wl==1){
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

          <? if($_SESSION['lang']!="th"){ ?>
            data_ball[k]["b_zone_th"] = data_ball[k]["b_zone_en"];
            data_ball[k]["b_name_1_th"] = data_ball[k]["b_name_1_en"];
            data_ball[k]["b_name_2_th"] = data_ball[k]["b_name_2_en"];
          <? } ?>

          var arr_insert = {};
          arr_insert["b_zone_id"] = data_ball[k]["b_zone_id"];
          arr_insert["b_zone_th"] = data_ball[k]["b_zone_th"];
          arr_insert["b_zone_en"] = data_ball[k]["b_zone_en"];
          arr_insert["b_zone"] = data_ball[k]["b_zone"];

          if(live==0){
        
            if(data_ball[k]["b_live"]==0 && data_ball[k]["b_date_play"] >= time_stam && data_ball[k]["b_zone_id"]!=null && data_ball[k]["b_active"]==1 && data_ball[k]["b_zone"]==page_zone){

              if((data_ball[k]["b_hdc"]!="" && data_ball[k]["b_hdc_1"]!="" && data_ball[k]["b_hdc_2"]!="") || (data_ball[k]["b_goal"]!="" && data_ball[k]["b_goal_1"]!="" && data_ball[k]["b_goal_2"]!="") || (data_ball[k]["b_1x2_1"]>0 && data_ball[k]["b_1x2_2"]>0) || (data_ball[k]["b_odd"]!=0 && data_ball[k]["b_even"]!=0) || (data_ball[k]["b_1h_hdc"]!="" && data_ball[k]["b_1h_hdc_1"]!="" && data_ball[k]["b_1h_hdc_2"]!="") || (data_ball[k]["b_1h_goal"]!="" && data_ball[k]["b_1h_goal_1"]!="" && data_ball[k]["b_1h_goal_2"]!="") || (data_ball[k]["b_1h_1x2_1"]>0 && data_ball[k]["b_1h_1x2_x"]>0 && data_ball[k]["b_1h_1x2_2"]>0) || (data_ball[k]["b_1h_odd"]!=0 && data_ball[k]["b_1h_even"]!=0)){

                if((page_show==1 && ((data_ball[k]["b_hdc"]!="" && data_ball[k]["b_hdc_1"]!="" && data_ball[k]["b_hdc_2"]!="") || (data_ball[k]["b_goal"]!="" && data_ball[k]["b_goal_1"]!="" && data_ball[k]["b_goal_2"]!="") || (data_ball[k]["b_1x2_1"]>0 && data_ball[k]["b_1x2_2"]>0) || (data_ball[k]["b_1h_hdc"]!="" && data_ball[k]["b_1h_hdc_1"]!="" && data_ball[k]["b_1h_hdc_2"]!="") || (data_ball[k]["b_1h_goal"]!="" && data_ball[k]["b_1h_goal_1"]!="" && data_ball[k]["b_1h_goal_2"]!="") || (data_ball[k]["b_1h_1x2_1"]>0 && data_ball[k]["b_1h_1x2_2"]>0))) || (page_show==2 && ((data_ball[k]["b_1x2_1"]>0 && data_ball[k]["b_1x2_2"]>0) || (data_ball[k]["b_1h_1x2_1"]>0 && data_ball[k]["b_1h_1x2_2"]>0))) || (page_show==3 && ((data_ball[k]["b_odd"]!=0 && data_ball[k]["b_even"]!=0) || (data_ball[k]["b_1h_odd"]!=0 && data_ball[k]["b_1h_even"]!=0)))){

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

        if((data_ball[k]["b_live"]==1 || data_ball[k]["b_live"]==2 || data_ball[k]["b_live"]==3) && data_ball[k]["b_zone"]==page_zone){

          if(data_ball[k]["b_add"]!=1 && (data_ball[k]["b_hdc"]==0 && data_ball[k]["b_hdc_1"]==0 && data_ball[k]["b_hdc_2"]==0) && (data_ball[k]["b_goal"]==0 && data_ball[k]["b_goal_1"]==0 && data_ball[k]["b_goal_2"]==0) && (data_ball[k]["b_1x2_1"]==0 && data_ball[k]["b_1x2_2"]==0) && (data_ball[k]["b_odd"]==0 && data_ball[k]["b_even"]==0) && (data_ball[k]["b_1h_hdc"]==0 && data_ball[k]["b_1h_hdc_1"]==0 && data_ball[k]["b_1h_hdc_2"]==0) && (data_ball[k]["b_1h_goal"]==0 && data_ball[k]["b_1h_goal_1"]==0 && data_ball[k]["b_1h_goal_2"]==0) && (data_ball[k]["b_1h_1x2_1"]==0 && data_ball[k]["b_1h_1x2_2"]==0) && (data_ball[k]["b_1h_odd"]==0 && data_ball[k]["b_1h_even"]==0)){

          }else{

            //if((page_show==1 && ((data_ball[k]["b_hdc"]!="" && data_ball[k]["b_hdc_1"]!="" && data_ball[k]["b_hdc_2"]!="") || (data_ball[k]["b_goal"]!="" && data_ball[k]["b_goal_1"]!="" && data_ball[k]["b_goal_2"]!="") || (data_ball[k]["b_1x2_1"]>0 && data_ball[k]["b_1x2_x"]>0 && data_ball[k]["b_1x2_2"]>0) || (data_ball[k]["b_1h_hdc"]!="" && data_ball[k]["b_1h_hdc_1"]!="" && data_ball[k]["b_1h_hdc_2"]!="") || (data_ball[k]["b_1h_goal"]!="" && data_ball[k]["b_1h_goal_1"]!="" && data_ball[k]["b_1h_goal_2"]!="") || (data_ball[k]["b_1h_1x2_1"]>0 && data_ball[k]["b_1h_1x2_x"]>0 && data_ball[k]["b_1h_1x2_2"]>0))) || (page_show==2 && ((data_ball[k]["b_1x2_1"]>0 && data_ball[k]["b_1x2_x"]>0 && data_ball[k]["b_1x2_2"]>0) || (data_ball[k]["b_1h_1x2_1"]>0 && data_ball[k]["b_1h_1x2_x"]>0 && data_ball[k]["b_1h_1x2_2"]>0))) || (page_show==3 && ((data_ball[k]["b_odd"]!=0 && data_ball[k]["b_even"]!=0) || (data_ball[k]["b_1h_odd"]!=0 && data_ball[k]["b_1h_even"]!=0)))){

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
          //}
        }
      }

      list_zone_live.sort(dynamicSortMultiple("zASC Asc" , "zName Asc" , "zID Asc"));
      list_zone.sort(dynamicSortMultiple("zASC Asc" , "zName Asc" , "zID Asc"));


     set_table(list_zone_live , list_ball_live , list_zone , list_ball);

      // display league length
      document.getElementById('TotalLeagueCnt').innerHTML = Object.keys(leagueArray).length;
      if(selectedLeague.length > 0){
        document.getElementById('AllSelL').innerHTML = selectedLeague.length;
      }else{
        document.getElementById('AllSelL').innerHTML = Object.keys(leagueArray).length;
      }
    }else{
      old_arr_data = arr_data;
      wl = 1;
    }
  }

  
}
var ddd = {};
var ddd_old = {};

var set_tb_c = 1;

var colspan_league = 9;

var lg_hide_live = {};
var lg_hide = {};

function set_table(zl , bl , z , b){


  if(page_show==2){
    //1x2
    colspan_league = 8;
  }else if(page_show==3){
    //oe
    colspan_league = 6;
  }else{
    if(dp_mode=="1"){
      //1rows
      colspan_league = 14;
    }else if(dp_mode=="1F"){
      //1Frows
      colspan_league = 14;
    }else if(dp_mode=="1H"){
      //1Hrows
      colspan_league = 14;
    }else{
      //2rows
      colspan_league = 9;
    }
  }

  ddd = {};
  lg_hide_live = {};
  lg_hide = {};

  ddd["zone_live"] = zl;
  ddd["ball_live"] = bl;
  ddd["ball_live_old"] = ddd_old["ball_live"];
  ddd["zone"] = z;
  ddd["ball"] = b;
  ddd["ball_old"] = ddd_old["ball"];
  if(JSON.stringify(ddd)!=JSON.stringify(ddd_old)){
    //console.log(JSON.stringify(ddd) , JSON.stringify(ddd_old));
    if(set_tb_c==1){
      set_tb_c = 0;
      ReactDOM.render(
          React.createElement(HelloMessage, ddd),
          document.getElementById('main') , function(){
            if(bl.length<=0){
              $("#header_tb_ball_live").hide();
            }else{
              $("#header_tb_ball_live").show();
              for (var k in lg_hide_live) {
                if(lg_hide_live[k]==0){
                  $(".lg_ball_live"+k).hide();
                }else{
                  $(".lg_ball_live"+k).show();
                }
              }
            }

            if(b.length<=0){
              $("#header_tb_ball").hide();
            }else{
              $("#header_tb_ball").show();
              for (var k in lg_hide) {
                if(lg_hide[k]==0){
                  $(".lg_ball"+k).hide();
                }else{
                  $(".lg_ball"+k).show();
                }
              }
            }
            set_tb_c = 1;
          }
      );
      ddd_old = ddd;
       
    }
  }else{
    ddd_old = ddd;
  }
  wl = 1;
    
}

var HelloMessage = React.createClass({
  componentDidMount: function() {
    //var $this = $(ReactDOM.findDOMNode(this));
    $(".loader").hide();
    //console.log("xxx");
  },
  render: function() {
    var bl = this.props.ball_live;
    var b = this.props.ball;

    var bl_old = this.props.ball_live_old;
    var b_old = this.props.ball_old;

    var bgck = "";
    var bgcl = "bgcpelight";

    var bgck_live = "";
    var bgcl_live = "liveligh";

    return (
      React.DOM.table({className: "oddsTable" , width:'100%' , id:"tmplTable" , cellPadding:"0" , cellSpacing:"0" , style : {'border': "0px"}}, 
                React.createElement("thead" , {id: "header_tb_ball_live" },
                  header_tb()
                ),
                this.props.zone_live.map(function(blg, i) {
                    //console.log(bl_old[blg.zID]);
                    bl[blg.zID].sort(dynamicSortMultiple("bASC Asc" , "bDP Asc" , "bID Asc" , "bAdd Asc"));
                    return (
                      React.DOM.tbody({key: i , className: "lg_ball_live"+blg.zID },
                        React.createElement("tr" , {className:"lge_ball_live"+blg.zID , style : {'cursor': "pointer" , "verticalAlign":"middle"}} , 
                          React.createElement("td" , {className :'tabtitle'} , null),
                          React.createElement("td" , {className :'tabtitle' , colSpan :colspan_league} , name_zone(blg.zData))
                        ),
                        bl[blg.zID].map(function(tlist, j) {

                          if(bgck_live!=tlist.bID){
                            bgck_live = tlist.bID;
                            if(bgcl_live=="live"){
                              bgcl_live = "liveligh";
                            }else{
                              bgcl_live = "live";
                            }
                          }

                          var dataI_old = {};

                          if(bl_old!=undefined){

                            var databO = {};
                            var obl = bl_old[blg.zID];
                            for (var kbo in obl) {
                              if(obl[kbo].bID==tlist.bID && obl[kbo].bAdd==tlist.bAdd){
                                databO = obl[kbo];
                              }
                            }

                            dataI_old = databO.bData;
                          }else{
                            dataI_old = null;
                          }

                          if(lg_hide_live[blg.zID]==undefined){
                            lg_hide_live[blg.zID] = 0;
                          }

                          var r_ball_td = ball_td(tlist.bData , dataI_old);
                          if(r_ball_td!=null){
                            lg_hide_live[blg.zID]++;
                          }

                          //console.log();

                          return (
                            React.DOM.tr({key: j , className: "displayOn ball_hov bl_ball_live"+tlist.bID+"_"+tlist.bAdd+" bl_bg"+tlist.bID+" "+bgcl_live}, 
                              r_ball_td
                            )
                          )
                        })
                      )
                    )
                }),
                React.createElement("thead" , {id: "header_tb_ball" },
                  header_tb()
                ),
                this.props.zone.map(function(blg, i) {
                    //console.log(bl[blg.zID])
                    
                    b[blg.zID].sort(dynamicSortMultiple("bASC Asc" , "bDP Asc" , "bID Asc" , "bAdd Asc"));
                    return (
                      React.DOM.tbody({key: i , className: "lg_ball"+blg.zID },
                        React.createElement("tr" , {className:"lge_ball"+blg.zID , style : {'cursor': "pointer" , "verticalAlign":"middle"}} , 
                          React.createElement("td" , {className :'tabtitle'} , null),
                          React.createElement("td" , {className :'tabtitle' , colSpan :colspan_league} , name_zone(blg.zData))
                        ),
                        b[blg.zID].map(function(tlist, j) {

                          if(bgck!=tlist.bID){
                            bgck = tlist.bID;
                            if(bgcl=="bgcpe"){
                              bgcl = "bgcpelight";
                            }else{
                              bgcl = "bgcpe";
                            }
                          }

                          var dataI_old = {};

                          if(b_old!=undefined){

                            var databO = {};
                            var obl = b_old[blg.zID];
                            for (var kbo in obl) {
                              if(obl[kbo].bID==tlist.bID && obl[kbo].bAdd==tlist.bAdd){
                                databO = obl[kbo];
                              }
                            }

                            dataI_old = databO.bData;
                          }else{
                            dataI_old = null;
                          }

                          if(lg_hide[blg.zID]==undefined){
                            lg_hide[blg.zID] = 0;
                          }

                          var r_ball_td = ball_td(tlist.bData , dataI_old);
                          if(r_ball_td!=null){
                            lg_hide[blg.zID]++;
                          }
                     

                          return (
                            React.DOM.tr({key: j , className: "displayOn ball_hov bl_ball"+tlist.bID+"_"+tlist.bAdd+" bl_bg"+tlist.bID+" "+bgcl}, 
                              r_ball_td
                            )
                          )
                        })
                      )
                    )
                })
          )
    );
  }
});

function name_zone(data){
  return (data.b_zone_th=="" ? data.b_zone_en : data.b_zone_th);
}
function header_tb(){

  if(page_show==2){
    return header1x2(); 
  }else if(page_show==3){
    return headerOE(); 
  }else{
    if(dp_mode=="1"){
      return header1rows(); 
    }else if(dp_mode=="1F"){
      return header1rows(); 
    }else if(dp_mode=="1H"){
      return header1rows(); 
    }else{
      return header2rows();
    }
  }
}
function ball_td(ball_data , old_data){
  if(page_show==2){
    return td1x2(ball_data , old_data); 
  }else if(page_show==3){
    return tdOE(ball_data , old_data); 
  }else{
    if(dp_mode=="1"){
      return td1rows(ball_data , old_data , dp_mode); 
    }else if(dp_mode=="1F" && ((ball_data["b_hdc"]!="" && ball_data["b_hdc_1"]!="" && ball_data["b_hdc_2"]!="") || (ball_data["b_goal"]!="" && ball_data["b_goal_1"]!="" && ball_data["b_goal_2"]!="") || (ball_data["b_1x2_1"]>0 && ball_data["b_1x2_2"]>0))){
      return td1rows(ball_data , old_data , dp_mode);    
    }else if(dp_mode=="1H" && ((ball_data["b_1h_hdc"]!="" && ball_data["b_1h_hdc_1"]!="" && ball_data["b_1h_hdc_2"]!="") || (ball_data["b_1h_goal"]!="" && ball_data["b_1h_goal_1"]!="" && ball_data["b_1h_goal_2"]!="") || (ball_data["b_1h_1x2_1"]>0 && ball_data["b_1h_1x2_2"]>0))){
      return td1rows(ball_data , old_data , dp_mode); 
    }else if(dp_mode=="3"){
        return td2rows(ball_data , old_data); 
    }else{
      return null; 
    } 
  } 
}
</script>
</body>
</html>
