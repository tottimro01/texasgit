<? 
  if($_POST["session"]["AGlang"]=="")
  {
    $_POST["session"]["AGlang"]="th";
  }

  require('../../conn.php');
  require('../../function.php');
  require('../../ag_function.php');
  require('../../../lang/ag_'.$_POST["session"]["AGlang"].'.php');
  require('../../../../lang/function_'.$_POST["session"]["AGlang"].'_new.php');

 
$r_agent_id = $_POST["session"]["r_agent_id"];
$sql="select * from bom_tb_agent where  r_agent_id like '%$r_agent_id%' and r_id = ".$_POST["session"]["rid"]." and r_level=".intval($_POST["session"]["r_level"])."";
$rs = sql_array($sql);  

$r_agent_id_level = explode("*", $_POST["session"]["r_agent_id"].$rs["r_id"]."*");
$sql = "select r_id, r_open from bom_tb_agent where r_id in (".implode(",",array_filter($r_agent_id_level)).")";

$result_level = sql_query($sql);
while($sum = sql_fetch_as($result_level)){
    $result_r_open[$sum["r_id"]] = explode(",",$sum["r_open"]);
}

$r_open = array('1'=>true,'2'=>true,'3'=>true,'4'=>true,'5'=>true,'6'=>true,'7'=>true,'8'=>true,'9'=>true,'10'=>true,'11'=>true,'12'=>true);
foreach ($result_r_open as $key => $value) {
    foreach ($value as $key_r_open => $value_r_open){
        if($key_r_open != 0){
            if($value_r_open == 1){
                if($r_open[$key_r_open] != false){
                    $r_open[$key_r_open] = true;
                }
            }
            else{
                $r_open[$key_r_open] = false;
            }
        }
    }
}

$r_agent_id = $_POST["session"]["r_agent_id"];
$sql="select * from bom_tb_agent where  r_agent_id like '%$r_agent_id%' and r_id = ".$_POST["session"]["rid"]." and r_level=".intval($_POST["session"]["r_level"])."";
$rs = sql_array($sql);
$r_name = $rs["r_user"];
$parent_r_sport_step2   = explode(",", $rs["r_sport_step2"]);

$sql="select * from bom_tb_agent where r_id='".$_POST["session"]["r_id"]."'";
$rs=sql_array($sql);
$ex_r_open =  explode(",", $rs["r_open"]);

$r_sport_nam_tor   = explode(",", $rs["r_sport_nam_tor"]);
$r_sport_nam_rong   = explode(",", $rs["r_sport_nam_rong"]);       
$r_sport_dis   = explode(",", $rs["r_sport_dis"]);
$r_sport_max   = explode(",", $rs["r_sport_max"]);
$r_sport_min   = explode(",", $rs["r_sport_min"]);
 
$r_sport_step_max   = explode(",", $rs["r_sport_step_max"]);
$r_sport_step_min   = explode(",", $rs["r_sport_step_min"]);

$r_sport_step_max   = explode(",", $rs["r_sport_step_max"]);
$r_sport_step_min   = explode(",", $rs["r_sport_step_min"]);
$r_sport_step_day   = explode(",", $rs["r_sport_step_day"]);
$r_sport_step_paymax   = explode(",", $rs["r_sport_step_paymax"]);
$r_sport_step2   = explode(",", $rs["r_sport_step2"]);
$r_sport_step_dis   = explode(",", $rs["r_sport_step_dis"]);

$r_sport_share   = explode(",", $rs["r_sport_share"]);
$r_sport_share_live   = explode(",", $rs["r_sport_share_live"]);

$r_lotto_share   = explode(",", $rs["r_lotto_share"]);
$r_lotto_open   = explode(",", $rs["r_lotto_open"]);
$r_lotto_pay1   = explode(",", $rs["r_lotto_pay1"]);
$r_lotto_dis1   = explode(",", $rs["r_lotto_dis1"]);
$r_lotto_pay2   = explode(",", $rs["r_lotto_pay2"]);
$r_lotto_dis2   = explode(",", $rs["r_lotto_dis2"]);
$r_lotto_pay3   = explode(",", $rs["r_lotto_pay3"]);
$r_lotto_dis3   = explode(",", $rs["r_lotto_dis3"]);

$r_lotto_hun_share   = explode(",", $rs["r_lotto_hun_share"]);
$r_lotto_hun_open   = explode(",", $rs["r_lotto_hun_open"]);
$r_lotto_hun_pay1   = explode(",", $rs["r_lotto_hun_pay1"]);
$r_lotto_hun_dis1   = explode(",", $rs["r_lotto_hun_dis1"]);
$r_lotto_hun_pay2   = explode(",", $rs["r_lotto_hun_pay2"]);
$r_lotto_hun_dis2   = explode(",", $rs["r_lotto_hun_dis2"]);
$r_lotto_hun_pay3   = explode(",", $rs["r_lotto_hun_pay3"]);
$r_lotto_hun_dis3   = explode(",", $rs["r_lotto_hun_dis3"]);

$r_lotto_hun_set_pay   = explode(",", $rs["r_lotto_hun_set_pay"]);
$r_lotto_hun_set_price   = explode(",", $rs["r_lotto_hun_set_price"]);

$r_games_dis   = explode(",", $rs["r_games_dis"]);
$r_games_share   = explode(",", $rs["r_games_share"]);
$r_games_myshare   = explode(",", $rs["r_games_myshare"]);

$r_casino_share = explode(",", $rs["r_casino_share"]);
$r_casino_max   = explode(",", $rs["r_casino_max"]);

  //ดึง credit 
    //$re4["xtotal"] คือ ยอดเครดิตทั้งหมด
    //$x_count_agent คือ ยอดเครดิตที่เปิดให้ agent
    //$x_count_member คือ ยอดเครดิตที่เปิดให้ member
    //$x_count3  คือ ยอดเครดิตคงเหลือ (ยอดเครดิตทั้งหมด หักลบ เครดิตที่เปิดให้ agent และ member)
  $d_incre = strtotime("-7 day");
  $sql = "select sum(b_total) as btotal from bom_tb_football_bill where  m_agent_id like '%*".$_POST["session"]["r_id"]."*%'  and r_cut_bet_4=0";
  $reb1 = sql_array($sql);
  $sql = "select sum(b_total) as btotal from bom_tb_lotto_bill_live where  m_agent_id like '%*".$_POST["session"]["r_id"]."*%' and b_status=5";
  $reb2 = sql_array($sql);
  $sql = "select sum(b_total) as btotal from bom_tb_lotto_hun_bill where  m_agent_id like '%*".$_POST["session"]["r_id"]."*%' and play_timestam >= $d_incre";
  $reb3 = sql_array($sql);
  $sql = "select sum(b_total) as btotal from bom_tb_games_bill_play where  m_agent_id like '%*".$_POST["session"]["r_id"]."*%' and play_timestam >= $d_incre";
  $reb4 = sql_array($sql);
  $sum_kank2 = $reb1["btotal"] + $reb2["btotal"] + $reb3["btotal"] + $reb4["btotal"];

  $sql = "select r_count as xtotal , r_type from bom_tb_agent where r_id=".$_POST["session"]["r_id"];
  $re4 = sql_array($sql);

  $rtype = "m_count";
  $sql = "select sum($rtype) as xtotal from bom_tb_member where  m_agent_id like '%*".$_POST["session"]["r_id"]."*%'";
  $re5 = sql_array($sql);

  // ยอดรวมเครดิตที่โอนให้ member
  $x_count_member = ($re5["xtotal"] + $sum_kank2);

  // ยอดเครดิตทีเปิดให้ agent 
  $lv = intval($_POST["session"]["r_level"])+1;
  $sql = "select sum(r_count) as xtotal from bom_tb_agent where r_agent_id like '%*".$_POST["session"]["r_id"]."*%' and r_level=$lv ";
  $re5 = sql_array($sql);
  // ยอดรวมเครดิตที่โอนให้ agent
  $x_count2 = $re4["xtotal"] - $re5["xtotal"];

  $sql = "select * from bom_tb_agent where  r_agent_id like '%*".$_POST["session"]["r_id"]."*%'  and   r_id='".$_POST["id"]."' ";
  $rex = sql_array($sql);

  $x_count_agent = $re5["xtotal"];
  // เครดิตทั้งหมดที่มี ลบกับ  เครดิตที่ให้ member และ agent
  $x_count3 = $re4["xtotal"] - ($x_count_agent + $x_count_member);

  if($x_count3 <=0 )
  {
    $x_count3=0;
  }

?>

<div class="page-content" id="pageContent" style="">
  <style type="text/css">

   /* .span_block
    {
        display: block;
        margin-top: 5px;
    }*/
    
    .input-group {
      width:100px;
    }

    .input-group-addon {
      width: 40px;
    }

    .sl-width {
      width: 80px;
    }

    .tabbable input[type="text"] {
      width: 85px;
    }

    .col-md-4 {
      float: '' !important;
    }

    .numeric {
      height: 30px;
    }

    .label-sm {
      padding: 0px !important;
    }

    .selectize-control.repositories .selectize-dropdown > div {
      border-bottom: 1px solid rgba(0,0,0,0.05);
    }

    .selectize-control.repositories .selectize-dropdown .by {
      font-size: 11px;
      opacity: 0.8;
    }

    .selectize-control.repositories .selectize-dropdown .by::before {
      content: 'by ';
    }

    .selectize-control.repositories .selectize-dropdown .name {
      font-weight: bold;
      margin-right: 5px;
    }

    .selectize-control.repositories .selectize-dropdown .title {
      display: block;
    }

    .selectize-control.repositories .selectize-dropdown .description {
      font-size: 12px;
      display: block;
      color: #a0a0a0;
      white-space: nowrap;
      width: 100%;
      text-overflow: ellipsis;
      overflow: hidden;
    }

    .selectize-control.repositories .selectize-dropdown .meta {
      list-style: none;
      margin: 0;
      padding: 0;
      font-size: 10px;
    }

    .selectize-control.repositories .selectize-dropdown .meta li {
      margin: 0;
      padding: 0;
      display: inline;
      margin-right: 10px;
    }

    .selectize-control.repositories .selectize-dropdown .meta li span {
      font-weight: bold;
    }

    .selectize-control.repositories::before {
      -moz-transition: opacity 0.2s;
      -webkit-transition: opacity 0.2s;
      transition: opacity 0.2s;
      content: ' ';
      z-index: 2;
      position: absolute;
      display: block;
      top: 10px;
      right: 45px;
      width: 16px;
      height: 16px;
      background: url(assets/img/loading.gif);
      background-size: 16px 16px;
      opacity: 0;
    }

    .selectize-control.repositories.loading::before {
      opacity: 0.4;
    }

    @media (max-width:992px) {                         
      #manage-btn , .normal
      {
        display: none;
      }   
      .tabbable input[type="text"] {
        width: 100%;
      }    
      .sl-width
      {
        width: 100%;
      } 
      .input-group {
      width: 100%;
    }              
    }

    @media (min-width: 993px){  
      #small-manage-btn , .mobile
      {
        display: none;
      }
    }
  </style>

  <link rel="stylesheet" href="assets/css/selectize.css">
  <div class="row pdTop">
    <div class="col-xs-12 col-sm-12 col-md-12 widthTable">
      <form class="form-horizontal" id="createMember_form" method="post" action="" onsubmit="return false;">
        <div class="widget-box no-skin widget-color">
          <div class="widget-header widget-header-blue">
            <h4 class="widget-title lighter"><?=$lang_memberMember[3];?></h4>
            <div class="widget-toolbar" id="manage-btn">
              <button type="button" class="btn btn-success btn-xs" id="saveM" onclick="saveMember();">
                <i class="ace-icon fa fa-floppy-o"></i><?=$lang_memberMember[4];?>
              </button>
              <button type="reset" class="btn btn-danger  btn-xs" onclick="btn_reset();">
                <span class="fa fa-refresh icon-on-right bigger-110"></span><?=$lang_memberMember[5];?>
              </button>
            </div>
            <div class="widget-toolbar no-border">
              <button type="button" class="btn btn-xs btn-white bigger btn-info btn-bold" onclick="regisCopyUser();return false;">
                <span class="normal"><?=$lang_memberMember[6];?></span>
                <span class="mobile"><?=$lang_memberMember[7];?></span>
              </button>
              <button type="button" class="btn btn-xs btn-white bigger btn-info btn-bold" onclick="setMaxAll();return false;">
                <span class="normal"><?=$lang_memberMember[8];?></span>
                <span class="mobile"><?=$lang_memberMember[59];?></span>
              </button>
            </div>
          </div>
          <div class="widget-body">
            <div class="widget-main">
              <div>
                <div class="form-group">
                  <label class="control-label col-xs-12 col-sm-2 no-padding-right" for="username"> <?=$lang_memberMember[9];?> :</label>
                  <div class="col-xs-12 col-sm-4">
                    <div class="input-group clearfix">
                      <span class="input-group-addon"><?=$r_name;?></span>
                      <input type="text" id="username" name="username" class="inputEngNum" value="" maxlength="5" placeholder="<?=$lang_memberMember[9];?>">
                    </div>
                  </div>
                  <label class="control-label col-xs-12 col-sm-2 no-padding-right" for="password"><?=$lang_memberMember[10];?> :</label>
                  <div class="col-xs-12 col-sm-4">
                    <div class="clearfix">
                      <input type="password" name="password" id="password" class="inputEngNum" minlength="6" maxlength="16" placeholder="<?=$lang_memberMember[10];?>">
                      <span class="text-danger"><?=$lang_memberMember[11];?></span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-xs-12 col-sm-2 no-padding-right" for="name"> <?=$lang_memberMember[12];?> :</label>
                  <div class="col-xs-12 col-sm-4">
                    <div class="clearfix">
                      <input type="text" name="name" id="name" value="" placeholder="<?=$lang_memberMember[12];?>">
                    </div>
                  </div>
                  <label class="control-label col-xs-12 col-sm-2 no-padding-right" for="telephone"> <?=$lang_memberMember[55];?> :</label>
                  <div class="col-xs-12 col-sm-4">
                    <div class="clearfix">
                      <input type="tel" id="telephone" name="telephone" value="" placeholder="<?=$lang_memberMember[55];?>">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-xs-12 col-sm-2 no-padding-right" for="credit"> <?=$lang_memberMember[13];?> :</label>
                  <div class="col-xs-12 col-sm-6">
                    <div class="clearfix">
                      <input type="text" name="credit" id="credit" value="0.00" class="numeric input-num2digt" placeholder="<?=$lang_memberMember[13];?>" onblur="calCredit(this,<?=$x_count3;?>);">
                      <span class="text-danger" id="max_credit" data-json="<?=number_format($x_count3,2);?>">(<?=$lang_memberMember[59];?> = <?=number_format($x_count3,2);?>) </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tabbable">
                <ul class="nav nav-tabs padding-12 tab-color-blue background-blue">
                  <li class="active">
                    <a data-toggle="tab" href="#soccer" onclick="utab('soccer');">
                      <i class="menu-icon fa fa-futbol-o"></i><h7><?=$lang_memberMember[14];?></h7>
                    </a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#sport" onclick="utab('sport');">
                      <i class="menu-icon fa fa-futbol-o"></i><h7><?=$lang_memberMember[15];?></h7>
                    </a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#boxing" onclick="utab('boxing');">
                      <i class="menu-icon fa fa-futbol-o"></i>
                      <h7><?=$lang_memberMember[90] ;?></h7> 
                    </a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#step" onclick="utab('step');">
                      <i class="menu-icon fa fa-futbol-o"></i><h7><?=$lang_memberMember[16];?></h7>
                    </a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#lotto" onclick="utab('lotto');">
                      <i class="menu-icon fa fa-retweet"></i><h7><?=$lang_memberMember[17];?></h7>
                    </a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#lotto_set" onclick="utab('lotto_set');">
                      <i class="menu-icon fa fa-line-chart"></i><h7><?=$lang_memberMember[18];?></h7>
                    </a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#lotto_lao" onclick="utab('lotto_lao');">
                      <i class="menu-icon fa fa-line-chart"></i><h7><?=$lang_memberMember[19];?></h7>
                    </a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#game" onclick="utab('game');">
                      <i class="menu-icon fa fa-gamepad"></i><h7><?=$lang_memberMember[20];?></h7>
                    </a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#casino" onclick="utab('casino');">
                      <i class="menu-icon fa fa-puzzle-piece"></i><h7><?=$lang_memberMember[21];?></h7>
                    </a>
                  </li>
                </ul>
                <div class="tab-content">
                  <div id="soccer" class="tab-pane fade in active">
                    <div class="form-group">
                      <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-inline pull-left">
                          <label class="inline">
                            <div id="soccer_today">
                              <input type="checkbox" class="ace" id="soccer_today_active" name="soccer_today_active" <?=($r_open[1] == 1) ? "checked=''" : "";?>>
                              <span class="lbl"><?=$lang_memberMember[22];?></span>
                            </div>
                          </label> &nbsp;
                          <label class="inline">
                            <div id="soccer_live_active">
                              <input type="checkbox" class="ace" name="soccer_live_active" <?=($r_open[2] == 1) ? "checked=''" : "";?>>
                              <span class="lbl"> <?=$lang_memberMember[23];?> </span>
                            </div>
                          </label>
                        </div>
                        <div id="setMax_soccer" class="form-inline pull-right">
                          <button type="button" class="btn btn-white btn-warning btn-bold btn-sm" onclick="setMax('soccer');"><?=$lang_memberMember[24];?></button>
                        </div>
                      </div>
                    </div>
                    <div id="soccer_body">
                    <div class="form-group">
                      <div class="col-xs-12 col-sm-4 col-md-4">
                        <label class="control-label col-xs-12 col-sm-6 col-md-4 no-padding-right" for="today_com"><?=$lang_memberMember[25];?> :</label>
                        <div class="col-xs-12 col-sm-6 col-md-8">
                          <div class="clearfix input-group">
                            <select class="form-control input-sm sl_soccer" id="today_com" name="today_com">
                              <? for($x=0;$x<=400;$x++){
                                  $num=number_format($x*0.05,2);
                                  $rnum=number_format($r_sport_dis[1],2);
                                    if($rnum>=$num)
                                    {
                                        ?>
                                            <option value="<?=$num;?>"><?=$num;?></option>
                                        <?
                                    }
                              }?>
                            </select>
                            <span class="input-group-addon" id="k_today_com" data-json="0.50">%</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-4 col-md-4">
                        <label class="control-label col-xs-12 col-sm-6 col-md-4 no-padding-right" for="torup"><?=$lang_memberMember[26];?> :</label>
                        <div class="col-xs-12 col-sm-6 col-md-8">
                          <div class="clearfix">
                            <select class="form-control sl-width input-sm sl_soccer" id="torup" name="torup">
                              <?php 
                                  for($i=0; $i<=intval($r_sport_nam_tor[1]); $i++)
                                  {
                                      ?>
                                          <option value="<?=$i;?>"><?=$i;?></option>
                                      <?
                                  }
                              ?>
                            </select>
                            <span class="hidden" id="k_torup" data-json="<?=$r_sport_nam_tor[1];?>"></span>
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-4 col-md-4">
                        <label class="control-label col-xs-12 col-sm-6 col-md-4 no-padding-right" for="logup"><?=$lang_memberMember[27];?> :</label>
                        <div class="col-xs-12 col-sm-6 col-md-8">
                          <div class="clearfix">
                            <select class="form-control sl-width input-sm sl_soccer" id="logup" name="logup">
                              <?php 
                                  for($i =0; $i<= intval($r_sport_nam_rong[1]); $i++)
                                  {
                                      ?>
                                          <option value="<?=$i;?>"><?=$i;?></option>
                                      <?
                                  }
                              ?>
                            </select>
                            <span class="hidden" id="k_logup" data-json="<?=intval($r_sport_nam_rong[1]);?>"></span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-xs-12 col-sm-4 col-md-4">
                        <label class="control-label col-xs-12 col-sm-6 col-md-4 no-padding-right" for="live_betmoneymax_pair"><?=$lang_memberMember[28];?> :</label>
                        <div class="col-xs-12 col-sm-6 col-md-8">
                          <div class="clearfix">
                            <input type="text" name="live_betmoneymax_pair" id="live_betmoneymax_pair" class="numeric maxLimit input-num2digt" value="<?=addCommas($r_sport_max[1]);?>" onblur="chkMinMax(this,0,<?=intval($r_sport_max[1]);?>);">
                            <span class="text-danger label-sm span_block" id="k_live_betmoneymax_pair" data-json="<?=addCommas($r_sport_max[1]);?>">(0 - <?=addCommas($r_sport_max[1]);?>) </span>
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-4 col-md-4">
                        <label class="control-label col-xs-12 col-sm-6 col-md-4 no-padding-right" for="live_betmax_money"><?=$lang_memberMember[29];?> :</label>
                        <div class="col-xs-12 col-sm-6 col-md-8">
                          <div class="clearfix">
                            <input type="text" name="live_betmax_money" id="live_betmax_money" class="numeric maxLimit input-num2digt" value="<?=addCommas($r_sport_max[3]);?>" onblur="chkMinMax(this,<?=$r_sport_min[1];?>,<?=$r_sport_max[3];?>);">
                            <span class="text-danger label-sm span_block" id="k_live_betmax_money" data-json="<?=addCommas($r_sport_max[3]);?>">(<?=addCommas($r_sport_min[1]);?> - <?=addCommas($r_sport_max[3]);?>) </span>
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-4 col-md-4">
                        <label class="control-label col-xs-12 col-sm-6 col-md-4 no-padding-right" for="live_betmin_money"><?=$lang_memberMember[60];?> :</label>
                        <div class="col-xs-12 col-sm-6 col-md-8">
                          <div class="clearfix">
                            <input type="text" name="live_betmin_money" id="live_betmin_money" class="numeric minLimit input-num2digt"  value="<?=addCommas($r_sport_min[1]);?>" onblur="chkMinMax(this,<?=$r_sport_min[1];?>,<?=$r_sport_max[3];?>);">
                            <span class="text-danger label-sm span_block" id="k_live_betmin_money" data-json="<?=addCommas($r_sport_min[1]);?>">(<?=addCommas($r_sport_min[1]);?> - <?=addCommas($r_sport_max[3]);?>) </span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-xs-12 col-sm-4 col-md-4">
                        <label class="control-label col-xs-12 col-sm-6 col-md-4 no-padding-right" for="live_fbetmoneymax_pair"><?=$lang_memberMember[30];?> :</label>
                        <div class="col-xs-12 col-sm-6 col-md-8">
                          <div class="clearfix">
                            <input type="text" name="live_fbetmoneymax_pair" id="live_fbetmoneymax_pair" class="numeric maxLimit input-num2digt" value="<?=addCommas($r_sport_max[2]);?>" onblur="chkMinMax(this,0,<?=intval($r_sport_max[2]);?>);">
                            <span class="text-danger label-sm span_block" id="k_live_fbetmoneymax_pair"  data-json="<?=addCommas($r_sport_max[2]);?>">(0 - <?=addCommas($r_sport_max[2]);?>) </span>
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-4 col-md-4">
                        <label class="control-label col-xs-12 col-sm-6 col-md-4 no-padding-right" for="live_fbetmax_money"><?=$lang_memberMember[31];?> :</label>
                        <div class="col-xs-12 col-sm-6 col-md-8">
                          <div class="clearfix">
                            <input type="text" name="live_fbetmax_money" id="live_fbetmax_money" class="numeric maxLimit input-num2digt" value="<?=addCommas($r_sport_max[4]);?>" onblur="chkMinMax(this,<?=$r_sport_min[2];?>,<?=intval($r_sport_max[4]);?>);">
                            <span class="text-danger label-sm span_block" id="k_live_fbetmax_money" data-json="<?=addCommas($r_sport_max[4]);?>">(<?=addCommas($r_sport_min[2]);?> - <?=addCommas($r_sport_max[4]);?>) </span>
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-12 col-sm-4 col-md-4">
                        <label class="control-label col-xs-12 col-sm-6 col-md-4 no-padding-right" for="live_fbetmin_money"><?=$lang_memberMember[61];?> :</label>
                        <div class="col-xs-12 col-sm-6 col-md-8">
                          <div class="clearfix">
                            <input type="text" name="live_fbetmin_money" id="live_fbetmin_money" class="numeric minLimit input-num2digt" value="<?=addCommas($r_sport_min[2]);?>" onblur="chkMinMax(this,<?=$r_sport_min[2];?>,<?=$r_sport_max[4];?>);">
                            <span class="text-danger label-sm span_block" id="k_live_fbetmin_money" data-json="<?=addCommas($r_sport_min[2]);?>">(<?=addCommas($r_sport_min[2]);?> - <?=addCommas($r_sport_max[4]);?>) </span>
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                    <div id="soccer_alerts">
                      <div class="row">
                        <div class="col-xs-6 col-sm-4"></div>
                        <div class="col-xs-6 col-sm-4"><h1 class="text-danger">กรุณาติดต่อตัวแทน</h1></div>
                        <div class="col-xs-6 col-sm-4"></div>
                      </div>
                    </div>
                    </div>
                    <div id="sport" class="tab-pane fade">
                      <div class="form-group">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-inline pull-left">
                            <label class="inline">
                              <div id="sport_today">
                                <input type="checkbox" class="ace" id="sport_today_active" name="sport_today_active" <?=($r_open[3] == 1) ? "checked=''" : "";?> <?=($r_open[3] == 0) ? "disabled" : "";?>>
                                <span class="lbl"><?=$lang_memberMember[32];?></span>
                              </div>
                            </label> &nbsp;
                            <label class="inline">
                              <div id="sport_live_active">
                              <input type="checkbox" class="ace" name="sport_live_active" <?=($r_open[4] == 1) ? "checked=''" : "";?> <?=($r_open[4] == 0) ? "disabled" : "";?>>
                              <span class="lbl"><?=$lang_memberMember[33];?></span>
                              </div>
                            </label>
                          </div>
                          <div id="setMax_sport" class="form-inline pull-right">
                            <button type="button" class="btn btn-white btn-warning btn-bold btn-sm" onclick="setMax('sport');"><?=$lang_memberMember[24];?></button>
                          </div>
                        </div>
                      </div>
                      <div id="sport_body">
                      <div class="form-group">
                        <div class="col-xs-12 col-sm-4 col-md-4">
                          <label class="control-label col-xs-12 col-sm-6 col-md-4 no-padding-right" for="sport_com"><?=$lang_memberMember[25];?> :</label>
                          <div class="col-xs-12 col-sm-6 col-md-8">
                            <div class="clearfix input-group">
                              <select class="form-control input-sm sl_sport" id="sport_com" name="sport_com">
                                <? for($x=0;$x<=400;$x++){
                                    $num=number_format($x*0.05,2);
                                    $rnum=number_format($r_sport_dis[2],2);
                                     if($rnum>=$num)
                                     {
                                         ?>
                                             <option value="<?=$num;?>"><?=$num;?></option>
                                         <?
                                     }
                                }?>
                              </select>
                              <span class="input-group-addon" id="k_sport_com" data-json="<?=intval($r_sport_dis[2]);?>">%</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-xs-12 col-sm-4 col-md-4">
                          <label class="control-label col-xs-12 col-sm-6 col-md-4 no-padding-right" for="sport_betmoneymax_pair"><?=$lang_memberMember[34];?> :</label>
                          <div class="col-xs-12 col-sm-6 col-md-8">
                            <div class="clearfix">
                              <input type="text" name="sport_betmoneymax_pair" id="sport_betmoneymax_pair" class="numeric maxLimit input-num2digt" value="<?=addCommas($r_sport_max[5]);?>" onblur="chkMinMax(this,0,<?=intval($r_sport_max[5]);?>);">
                              <span class="text-danger label-sm span_block" id="k_sport_betmoneymax_pair" data-json="<?=addCommas($r_sport_max[5]);?>">(0 - <?=addCommas($r_sport_max[5]);?>) </span>
                            </div>
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4">
                          <label class="control-label col-xs-12 col-sm-6 col-md-4 no-padding-right" for="sport_betmax_money"><?=$lang_memberMember[35];?> :</label>
                          <div class="col-xs-12 col-sm-6 col-md-8">
                            <div class="clearfix">
                              <input type="text" name="sport_betmax_money" id="sport_betmax_money" class="numeric maxLimit input-num2digt" value="<?=addCommas($r_sport_max[6]);?>" onblur="chkMinMax(this,<?=intval($r_sport_min[3]);?>,<?=intval($r_sport_max[6]);?>);">
                              <span class="text-danger label-sm span_block" id="k_sport_betmax_money" data-json="<?=addCommas($r_sport_max[6]);?>">(<?=addCommas($r_sport_min[3]);?> - <?=addCommas($r_sport_max[6]);?>) </span>
                            </div>
                          </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4">
                          <label class="control-label col-xs-12 col-sm-6 col-md-4 no-padding-right" for="sport_betmin_money"><?=$lang_memberMember[36];?> :</label>
                          <div class="col-xs-12 col-sm-6 col-md-8">
                            <div class="clearfix">
                              <input type="text" name="sport_betmin_money" id="sport_betmin_money" class="numeric minLimit input-num2digt" value="<?=addCommas($r_sport_min[3]);?>" onblur="chkMinMax(this,<?=intval($r_sport_min[3]);?>,<?=intval($r_sport_max[6]);?>);">
                              <span class="text-danger label-sm span_block" id="k_sport_betmin_money" data-json="<?=addCommas($r_sport_min[3]);?>">(<?=addCommas($r_sport_min[3]);?> - <?=addCommas($r_sport_max[6]);?>) </span>
                            </div>
                          </div>
                        </div>
                      </div>
                      </div>
                      <div id="sport_alerts">
                        <div class="row">
                          <div class="col-xs-6 col-sm-4"></div>
                          <div class="col-xs-6 col-sm-4"><h1 class="text-danger">กรุณาติดต่อตัวแทน</h1></div>
                          <div class="col-xs-6 col-sm-4"></div>
                        </div>
                      </div>
                    </div>

                     <div id="boxing" class="tab-pane fade">
                       <div class="form-group">
                         <div class="col-xs-12 col-sm-12 col-md-12">
                           <div class="form-inline pull-left">
                             <label class="inline">
                               <div id="boxing_today"> 
                                 <input type="checkbox" class="ace" id="boxing_today_active" name="boxing_today_active" <?=($r_open[5] == 1) ? "checked=''" : "";?> <?=($r_open[5] == 0) ? "disabled" : "";?>>
                                 <span class="lbl"><?=$lang_memberMember[91];?></span>
                               </div>
                             </label> &nbsp;
                             <label class="inline">
                               <div id="boxing_live_active">
                               <input type="checkbox" class="ace" name="boxing_live_active" <?=($r_open[6] == 1) ? "checked=''" : "";?> <?=($r_open[6] == 0) ? "disabled" : "";?>>
                               <span class="lbl"><?=$lang_memberMember[92];?></span>
                               </div>
                             </label>
                           </div>
                           <div id="setMax_boxing" class="form-inline pull-right">
                             <button type="button" class="btn btn-white btn-warning btn-bold btn-sm" onclick="setMax('boxing');"><?=$lang_memberMember[24];?></button>
                           </div>
                         </div>
                       </div>
                       <div id="boxing_body">
                       <div class="form-group">
                         <div class="col-xs-12 col-sm-4 col-md-4">
                           <label class="control-label col-xs-12 col-sm-6 col-md-4 no-padding-right" for="boxing_com"><?=$lang_memberMember[25];?> :</label>
                           <div class="col-xs-12 col-sm-6 col-md-8">
                             <div class="clearfix input-group"> 
                               <select class="form-control input-sm sl_boxing" id="boxing_com" name="boxing_com">
                                 <? for($x=0;$x<=400;$x++){
                                     $num=number_format($x*0.05,2);
                                     $rnum=number_format($r_sport_dis[3],2);
                                      if($rnum>=$num)
                                      {
                                          ?>
                                              <option value="<?=$num;?>"><?=$num;?></option>
                                          <?
                                      }
                                 }?>
                               </select>
                               <span class="input-group-addon" id="k_boxing_com" data-json="<?=intval($r_sport_dis[3]);?>">%</span>
                             </div>
                           </div>
                         </div>
                       </div>
                       <div class="form-group">
                         <div class="col-xs-12 col-sm-4 col-md-4">
                           <label class="control-label col-xs-12 col-sm-6 col-md-4 no-padding-right" for="boxing_betmoneymax_pair"><?=$lang_memberMember[34];?> :</label>
                           <div class="col-xs-12 col-sm-6 col-md-8">
                             <div class="clearfix">
                               <input type="text" name="boxing_betmoneymax_pair" id="boxing_betmoneymax_pair" class="numeric maxLimit input-num2digt" value="<?=addCommas($r_sport_max[7]);?>" onblur="chkMinMax(this,0,<?=intval($r_sport_max[7]);?>);">
                               <span class="text-danger label-sm span_block" id="k_boxing_betmoneymax_pair" data-json="<?=addCommas($r_sport_max[7]);?>">(0 - <?=addCommas($r_sport_max[7]);?>) </span>
                             </div>
                           </div>
                         </div>
                         <div class="col-xs-12 col-sm-4 col-md-4">
                           <label class="control-label col-xs-12 col-sm-6 col-md-4 no-padding-right" for="boxing_betmax_money"><?=$lang_memberMember[35];?> :</label>
                           <div class="col-xs-12 col-sm-6 col-md-8">
                             <div class="clearfix">
                               <input type="text" name="boxing_betmax_money" id="boxing_betmax_money" class="numeric maxLimit input-num2digt" value="<?=addCommas($r_sport_max[8]);?>" onblur="chkMinMax(this,<?=intval($r_sport_min[3]);?>,<?=intval($r_sport_max[8]);?>);">
                               <span class="text-danger label-sm span_block" id="k_boxing_betmax_money" data-json="<?=addCommas($r_sport_max[8]);?>">(<?=addCommas($r_sport_min[4]);?> - <?=addCommas($r_sport_max[8]);?>) </span>
                             </div>
                           </div>
                         </div>
                         <div class="col-xs-12 col-sm-4 col-md-4">
                           <label class="control-label col-xs-12 col-sm-6 col-md-4 no-padding-right" for="boxing_betmin_money"><?=$lang_memberMember[36];?> :</label>
                           <div class="col-xs-12 col-sm-6 col-md-8">
                             <div class="clearfix">
                               <input type="text" name="boxing_betmin_money" id="boxing_betmin_money" class="numeric minLimit input-num2digt" value="<?=addCommas($r_sport_min[4]);?>" onblur="chkMinMax(this,<?=intval($r_sport_min[3]);?>,<?=intval($r_sport_max[8]);?>);">
                               <span class="text-danger label-sm span_block" id="k_boxing_betmin_money" data-json="<?=addCommas($r_sport_min[4]);?>">(<?=addCommas($r_sport_min[4]);?> - <?=addCommas($r_sport_max[8]);?>) </span>
                             </div>
                           </div>
                         </div>
                       </div>
                       </div>
                       <div id="boxing_alerts">
                         <div class="row">
                           <div class="col-xs-6 col-sm-4"></div>
                           <div class="col-xs-6 col-sm-4"><h1 class="text-danger">กรุณาติดต่อตัวแทน</h1></div>
                           <div class="col-xs-6 col-sm-4"></div>
                         </div>
                       </div>
                     </div>


                    <div id="step" class="tab-pane fade">
                      <div class="form-group">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-inline pull-left">
                            <label class="inline">
                              <div id="step_today">
                                <input type="checkbox" class="ace" id="step_active" name="step_active" <?=($r_open[7] == 1) ? "checked=''" : "";?>>
                                <span class="lbl"> <?=$lang_memberMember[16];?>  </span>
                              </div>
                            </label>
                          </div>
                          <div id="setMax_step" class="form-inline pull-right">
                            <button type="button" class="btn btn-white btn-warning btn-bold btn-sm" onclick="setMax('step');"><?=$lang_memberMember[24];?></button>
                          </div>
                        </div>
                      </div>
          <div id="step_body">
          <div class="form-group">    
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <div class="form-group">
            <div class="col-xs-12 col-sm-12 col-md-12">
                          <label class="control-label col-xs-12 col-sm-6 col-md-4 no-padding-right" for="step_betmax_money">
                            <?=$lang_memberMember[35];?> :
                          </label>
                          <div class="col-xs-12 col-sm-6 col-md-8">
                            <div class="clearfix">
                              <input type="text" name="step_betmax_money" id="step_betmax_money" class="numeric maxLimit input-num2digt" value="<?=addCommas($r_sport_step_max[1]);?>" onblur="chkMinMax(this,<?=$r_sport_step_min[1];?>,<?=$r_sport_step_max[1];?>);">
                              <span class="text-danger label-sm span_block" id="k_step_betmax_money" data-json="<?=addCommas($r_sport_step_max[1]);?>">(<?=addCommas($r_sport_step_min[1]);?> - <?=addCommas($r_sport_step_max[1]);?>) </span>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
            <div class="col-xs-12 col-sm-12 col-md-12">
                          <label class="control-label col-xs-12 col-sm-12 col-md-4 no-padding-right" for="step_betmin_money">
                            <?=$lang_memberMember[36];?> :
                          </label>
                          <div class="col-xs-12 col-sm-6 col-md-8">
                            <div class="clearfix">
                              <input type="text" name="step_betmin_money" id="step_betmin_money" class="numeric minLimit input-num2digt" value="<?=addCommas($r_sport_step_min[1]);?>" onblur="chkMinMax(this,<?=$r_sport_step_min[1];?>,<?=$r_sport_step_max[1];?>);">
                              <span class="text-danger label-sm span_block" id="k_step_betmin_money" data-json="<?=addCommas($r_sport_step_min[1]);?>">(<?=addCommas($r_sport_step_min[1]);?> - <?=addCommas($r_sport_step_max[1]);?>) </span>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
            <div class="col-xs-12 col-sm-12 col-md-12">
                          <label class="control-label col-xs-12 col-sm-6 col-md-4 no-padding-right" for="step_daymax_money">
                            <?=$lang_memberMember[37];?> :
                          </label>
                          <div class="col-xs-12 col-sm-6 col-md-8">
                            <div class="clearfix">
                              <input type="text" name="step_daymax_money" id="step_daymax_money" class="numeric maxLimit input-num2digt" value="<?=addCommas($r_sport_step_day[1]);?>" onblur="chkMinMax(this,0,<?=$r_sport_step_day[1];?>);">
                              <span class="text-danger label-sm span_block" id="k_step_daymax_money" data-json="<?=addCommas($r_sport_step_day[1]);?>">(0 - <?=addCommas($r_sport_step_day[1]);?>) </span>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <div class="col-xs-12 col-sm-12 col-md-12">
                          <label class="control-label col-xs-12 col-sm-6 col-md-4 no-padding-right" for="step_billmax_money">
                            <?=$lang_memberMember[38];?> :
                          </label>
                          <div class="col-xs-12 col-sm-6 col-md-8">
                            <div class="clearfix">
                              <input type="text" name="step_billmax_money" id="step_billmax_money" class="numeric maxLimit input-num2digt" value="<?=addCommas($r_sport_step_paymax[1]);?>" onblur="chkMinMax(this,0,<?=$r_sport_step_paymax[1];?>);">
                              <span class="text-danger label-sm span_block" id="k_step_billmax_money" data-json="<?=addCommas($r_sport_step_paymax[1]);?>">(0 - <?=addCommas($r_sport_step_paymax[1]);?>) </span>
                            </div>
                          </div>
                        </div>
                    </div>                      
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4">
                  <div class="form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                          <label class="control-label col-xs-12 col-sm-6 col-md-4 no-padding-right" for="step_min_pair"><?=$lang_memberMember[46];?> :</label>
                          <div class="col-xs-12 col-sm-6 col-md-8">
                            <div class="clearfix">
                              <select class="form-control sl-width input-sm" id="step_min_pair" name="step_min_pair" onchange="change_set_min_pair(<?=intval($r_sport_step2[1]);?>,<?=intval($r_sport_step2[2]);?>);" >
                                <?php 
                                  for($i=intval($r_sport_step2[1]);$i<=intval($r_sport_step2[2]);$i++)
                                  {
                                      ?>
                                          <option value="<?=$i;?>"><?=$i;?></option>
                                      <?
                                  } 
                                ?>
                              </select>
                              <span class="hidden" id="k_step_min_pair" data-json="<?=intval($r_sport_step2[1]);?>"></span>
                            </div>
                          </div>
                        </div>  
                  </div>
                  <div class="form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                          <label class="control-label col-xs-12 col-sm-6 col-md-4 no-padding-right" for="step_max_pair"><?=$lang_memberMember[45];?> :</label>
                          <div class="col-xs-12 col-sm-6 col-md-8">
                            <div class="clearfix">
                              <select class="form-control sl-width input-sm" id="step_max_pair" name="step_max_pair" onchange="change_set_min_pair(<?=intval($r_sport_step2[1]);?>,<?=intval($r_sport_step2[2]);?>);">
                                <?php 
                                    for($i=intval($r_sport_step2[2]);$i>=0;$i--)
                                    {
                                        ?>
                                            <option value="<?=$i;?>"><?=$i;?></option>
                                        <?
                                    } 
                                ?>
                              </select>
                              <span class="hidden" id="k_step_max_pair" data-json="20"></span>
                            </div>
                          </div>
                        </div>
                  </div>
                    
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4" id="test">
                  
                </div>
          </div>
          </div>
          <div id="step_alerts">
                        <div class="row">
                          <div class="col-xs-6 col-sm-4"></div>
                          <div class="col-xs-6 col-sm-4"><h1 class="text-danger">กรุณาติดต่อตัวแทน</h1></div>
                          <div class="col-xs-6 col-sm-4"></div>
                        </div>
                      </div>
                    </div>
                    <div id="casino" class="tab-pane fade">
                      <div class="form-group">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-inline pull-left">
                            <label class="inline">
                            <div id="casino_today">
                              <input type="checkbox" class="ace" id="casino_active" name="casino_active" <?=($r_open[12] == 1) ? "checked=''" : "";?>>
                              <span class="lbl"> <?=$lang_memberMember[21];?> </span>
                              </div>
                            </label>
                          </div>
                          <div id="setMax_casino" class="form-inline pull-right">
                            <button type="button" class="btn btn-white btn-warning btn-bold btn-sm" onclick="setMax('casino');"><?=$lang_memberMember[24];?></button>
                          </div>
                        </div>
                      </div>
                      <div id="casino_body">
                            <div class="form-group">
                            <?php
                              foreach ($lang_g["casino_share"] as $key => $value)
                              {
                            ?>
                              <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="widget-box">
                                  <div class="widget-header widget-header-flat  text-center">
                                    <h4 class="widget-title smaller"><?=$value;?></h4>
                                  </div>
                                  <div class="widget-body">
                                    <div class="widget-main">
                                      <div class="form-group" style="display:none;">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                          <label class="control-label col-xs-12 col-sm-4 col-md-5 no-padding-right" for="rcb_com"><?=$lang_memberMember[25];?> :</label>
                                          <div class="col-xs-12 col-sm-8 col-md-7">
                                            <div class="clearfix  input-group">
                                              <select class="form-control input-sm sl_casino" id="rcb_com" name="rcb_com">
                                                <option value="0.00">0.00</option>
                                              </select>
                                              <span class="input-group-addon" id="k_rcb_com" data-json="0.00">%</span>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                          <label class="control-label col-xs-12 col-sm-4 col-md-5 no-padding-right" for="rcb_maxtransfer"><?=$lang_memberMember[47];?> :</label>
                                          <div class="col-xs-12 col-sm-8 col-md-7">
                                            <div class="clearfix casino_Input">
                                              <input type="text" name="rcb_maxtransfer<?=$key;?>" id="rcb_maxtransfer<?=$key;?>" class="numeric maxLimit input-num2digt" value="<?=addCommas($r_casino_max[$key]);?>" onblur="chkMinMax(this,0,<?=$r_casino_max[$key];?>);">
                                              <span class="text-danger label-sm maxtransfer" id="k_rcb_maxtransfer" data-json="<?=addCommas($r_casino_max[$key]);?>">(0 - <?=addCommas($r_casino_max[$key]);?>) </span>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <?php  }?>
                          </div>
                          </div>
                          <div id="casino_alerts">
                            <div class="row">
                              <div class="col-xs-6 col-sm-4"></div>
                              <div class="col-xs-6 col-sm-4"><h1 class="text-danger">กรุณาติดต่อตัวแทน</h1></div>
                              <div class="col-xs-6 col-sm-4"></div>
                            </div>
                          </div>
                        </div>
                        <div id="lotto" class="tab-pane fade">
                          <div class="widget-main no-padding">
                            <div class="form-group">
                              <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-inline pull-left">
                                  <label class="inline">
                                    <div id="lotto_today">
                                    <input type="checkbox" class="ace" id="lotto_active" name="lotto_active" <?=($r_open[8] == 1) ? "checked=''" : "";?>>
                                    <span class="lbl"> <?=$lang_memberMember[17];?> </span>
                                    </div>
                                  </label>
                                </div>
                                <div id="setMax_lotto" class="form-inline pull-right">
                                  <button type="button" class="btn btn-white btn-warning btn-bold btn-sm" onclick="setMax('lotto');"><?=$lang_memberMember[24];?></button>
                                </div> 
                              </div>
                            </div>
                            <div id="lotto_body">
                            <div class="form-group">
                       
                        <?php 

                          $data["lotto_type"] = $lot_type[$_POST["session"]["AGlang"]][1];

                        ?>

                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="widget-box">
                                  <div class="widget-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                          <thead>
                                            <tr>
                                                <th colspan="100%">
                                                    <div id="lotto_typeA" style="text-align: center; height: 40px; line-height: 40px;">
                                                       <?
                                                        $chk = ($r_lotto_open[1] == 1) ? "checked=\"\"" : "";
                                                       ?>
                                                           <input type="checkbox" class="ace" id="lotto_typeAOpen" name="lotto_typeAOpen" <?=$chk;?> style="height: 23px;">
                                                            <span class="lbl"> แบบ A </span>
                                                    </div>
                                                </th>
                                            </tr>
                                            <tr>
                                              <th class="text-center"><?=$lang_memberMember[48];?></th>
                                              <th class="text-center"><?=$lang_memberMember[49];?></th>
                                              <th class="text-center"><?=$lang_memberMember[50];?></th>
                                            </tr>
                                          </thead>
                                          <tbody>

                                              <?php 
                                                foreach ($data["lotto_type"] as $key => $value) {
                                                  
                                                    ?>
                                                        <tr class="text-center">
                                                             <td width="35%"><?=$value;?></td>
                                                             <td width="30%">
                                                              <input type="text" name="lotto_pay1_<?=$key;?>" id="lotto_pay1_<?=$key;?>"  class="numeric maxLimit input-num2digt" value="<?=addCommas($r_lotto_pay1[$key]);?>" onblur="chkMinMax(this,0,<?=$r_lotto_pay1[$key];?>);">
                                                              <br>
                                                              <span class="text-danger label-sm maxtransfer" id="lotto_pay_info" data-json="<?=addCommas($r_lotto_pay1[$key]);?>">(0-<?=addCommas($r_lotto_pay1[$key]);?>) </span>
                                                             </td>
                                                             <td width="35%">
                                                               <div class="col-xs-12 col-sm-12 col-md-12">
                                                                 <div class="clearfix  input-group">
                                                                   <select class="form-control input-sm sl_lotto_com" id="7_<?=$key;?>_lotto_com1" name="lotto_com1_<?=$key;?>">
                                                                      <?php 
                                                                         for($i=0;$i<=intval($r_lotto_dis1[$key]);$i++)
                                                                         {
                                                                             $selected = (intval($r_lotto_dis1[$key]) == $i) ? "selected" : "";
                                                                             ?>
                                                                                 <option value="<?=$i;?>" <?=$selected;?>><?=$i;?></option>
                                                                             <?
                                                                         }
                                                                      ?>
                                                                   </select>
                                                                   <span class="input-group-addon" id="k_7_<?=$key;?>_lotto_com1" data-json="<?=intval($r_lotto_dis1[$key]);?>">%</span>
                                                                 </div>
                                                               </div>
                                                             </td>
                                                        </tr>

                                                    <?
                                                } 
                                                ?>
                                          </tbody>
                                        </table>
                                    </div>
                                  </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="widget-box">
                                  <div class="widget-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                          <thead>
                                            <tr>
                                                <th colspan="100%">
                                                    <div id="lotto_typeB" style="text-align: center; height: 40px; line-height: 40px;">
                                                       <?
                                                        $chk = ($r_lotto_open[2] == 1) ? "checked=\"\"" : "";
                                                       ?>
                                                           <input type="checkbox" class="ace" id="lotto_typeBOpen" name="lotto_typeBOpen" <?=$chk;?> style="height: 23px;">
                                                            <span class="lbl"> แบบ B </span>
                                                    </div>
                                                </th>
                                            </tr>
                                            <tr>
                                              <th class="text-center"><?=$lang_memberMember[48];?></th>
                                              <th class="text-center"><?=$lang_memberMember[49];?></th>
                                              <th class="text-center"><?=$lang_memberMember[50];?></th>
                                            </tr>
                                          </thead>
                                          <tbody>

                                              <?php 
                                                foreach ($data["lotto_type"] as $key => $value) {
                                                  
                                                    ?>
                                                        <tr class="text-center">
                                                             <td width="35%"><?=$value;?></td>
                                                             <td width="30%">
                                                              <input type="text" name="lotto_pay2_<?=$key;?>" id="lotto_pay2_<?=$key;?>"  class="numeric maxLimit input-num2digt" value="<?=addCommas($r_lotto_pay2[$key]);?>" onblur="chkMinMax(this,0,<?=$r_lotto_pay2[$key];?>);">
                                                              <br>
                                                              <span class="text-danger label-sm maxtransfer" id="lotto_pay_info" data-json="<?=addCommas($r_lotto_pay2[$key]);?>">(0-<?=addCommas($r_lotto_pay2[$key]);?>) </span>
                                                             </td>
                                                             <td width="35%">
                                                               <div class="col-xs-12 col-sm-12 col-md-12">
                                                                 <div class="clearfix  input-group">
                                                                   <select class="form-control input-sm sl_lotto_com" id="7_<?=$key;?>_lotto_com2" name="lotto_com2_<?=$key;?>">
                                                                      <?php 
                                                                         for($i=0;$i<=intval($r_lotto_dis2[$key]);$i++)
                                                                         {
                                                                             $selected = (intval($r_lotto_dis2[$key]) == $i) ? "selected" : "";
                                                                             ?>
                                                                                 <option value="<?=$i;?>" <?=$selected;?>><?=$i;?></option>
                                                                             <?
                                                                         }
                                                                      ?>
                                                                   </select>
                                                                   <span class="input-group-addon" id="k_7_<?=$key;?>_lotto_com2" data-json="<?=intval($r_lotto_dis2[$key]);?>">%</span>
                                                                 </div>
                                                               </div>
                                                             </td>
                                                        </tr>

                                                    <?
                                                } 
                                                ?>
                                          </tbody>
                                        </table>
                                    </div>
                                  </div>
                            </div>
                        </div>

                         <div class="col-xs-12 col-sm-4 col-md-4">
                            <div class="widget-box">
                                  <div class="widget-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                          <thead>
                                            <tr>
                                                <th colspan="100%">
                                                    <div id="lotto_typeC" style="text-align: center; height: 40px; line-height: 40px;">
                                                       <?
                                                        $chk = ($r_lotto_open[3] == 1) ? "checked=\"\"" : "";
                                                       ?>
                                                           <input type="checkbox" class="ace" id="lotto_typeCOpen" name="lotto_typeCOpen" <?=$chk;?> style="height: 23px;">
                                                            <span class="lbl"> แบบ C </span>
                                                    </div>
                                                </th>
                                            </tr>
                                            <tr>
                                              <th class="text-center"><?=$lang_memberMember[48];?></th>
                                              <th class="text-center"><?=$lang_memberMember[49];?></th>
                                              <th class="text-center"><?=$lang_memberMember[50];?></th>
                                            </tr>
                                          </thead>
                                          <tbody>

                                              <?php 
                                                foreach ($data["lotto_type"] as $key => $value) {
                                                  
                                                    ?>
                                                        <tr class="text-center">
                                                             <td width="35%"><?=$value;?></td>
                                                             <td width="30%">
                                                              <input type="text" name="lotto_pay3_<?=$key;?>" id="lotto_pay3_<?=$key;?>"  class="numeric maxLimit input-num2digt" value="<?=addCommas($r_lotto_pay3[$key]);?>" onblur="chkMinMax(this,0,<?=$r_lotto_pay3[$key];?>);">
                                                              <br>
                                                              <span class="text-danger label-sm maxtransfer" id="lotto_pay_info" data-json="<?=addCommas($r_lotto_pay3[$key]);?>">(0-<?=addCommas($r_lotto_pay3[$key]);?>) </span>
                                                             </td>
                                                             <td width="35%">
                                                               <div class="col-xs-12 col-sm-12 col-md-12">
                                                                 <div class="clearfix  input-group">
                                                                   <select class="form-control input-sm sl_lotto_com" id="7_<?=$key;?>_lotto_com3" name="lotto_com3_<?=$key;?>">
                                                                      <?php 
                                                                         for($i=0;$i<=intval($r_lotto_dis3[$key]);$i++)
                                                                         {
                                                                             $selected = (intval($r_lotto_dis3[$key]) == $i) ? "selected" : "";
                                                                             ?>
                                                                                 <option value="<?=$i;?>" <?=$selected;?>><?=$i;?></option>
                                                                             <?
                                                                         }
                                                                      ?>
                                                                   </select>
                                                                   <span class="input-group-addon" id="k_7_<?=$key;?>_lotto_com3" data-json="<?=intval($r_lotto_dis3[$key]);?>">%</span>
                                                                 </div>
                                                               </div>
                                                             </td>
                                                        </tr>

                                                    <?
                                                } 
                                                ?>
                                          </tbody>
                                        </table>
                                    </div>
                                  </div>
                            </div>
                        </div>
                        
                        </div>
                        </div>
                        <div id="lotto_alerts">
                          <div class="row">
                            <div class="col-xs-6 col-sm-4"></div>
                            <div class="col-xs-6 col-sm-4"><h1 class="text-danger">กรุณาติดต่อตัวแทน</h1></div>
                            <div class="col-xs-6 col-sm-4"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="lotto_set" class="tab-pane fade">
                      <div class="widget-main no-padding">
                        <div class="form-group">
                          <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-inline pull-left">
                              <label class="inline">
                                <div id="lotto_set_today">
                                <input type="checkbox" class="ace" id="lotto_share_active" name="lotto_share_active" <?=($r_open[9] == 1) ? "checked=''" : "";?>>
                                <span class="lbl"> <?=$lang_memberMember[18];?> </span>
                                </div>
                              </label>
                            </div>
                            <div id="setMax_lotto_set" class="form-inline pull-right">
                              <button type="button" class="btn btn-white btn-warning btn-bold btn-sm" onclick="setMax('lotto_set');"><?=$lang_memberMember[24];?></button>
                            </div>
                          </div>
                        </div>
                        <div id="lotto_set_body">
                        <div class="form-group">

                          <?php 
                             $data["lotto_type"] = $lot_type[$_POST["session"]["AGlang"]][3]; 
                           ?>

                        <div class="col-xs-12 col-sm-4 col-md-4">
                          <div class="widget-box">
                            <div class="widget-body">
                              <div class="table-responsive">
                                  <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                      <tr>
                                        <th colspan="100%">
                                            <div id="lotto_hun_typeA" style="text-align: center; height: 40px; line-height: 40px;">
                                                <?
                                                    $chk = ($r_lotto_hun_open[1] == 1) ? "checked=\"\"" : "";
                                                ?>
                                                   <input type="checkbox" class="ace" id="lotto_hun_typeAOpen" name="lotto_hun_typeAOpen" <?=$chk;?> style="height: 23px;">
                                                    <span class="lbl"> แบบ A </span>
                                            </div>
                                        </th>
                                      </tr>
                                      <tr>
                                        <th class="text-center"><?=$lang_memberMember[48];?></th>
                                        <th class="text-center"><?=$lang_memberMember[49];?></th>
                                        <th class="text-center"><?=$lang_memberMember[50];?></th>
                                      </tr>
                                    </thead>
                                  <tbody>
                                     <?
                                        foreach ($data["lotto_type"] as $key => $value) {
                                     ?>
                                    <tr class="text-center">
                                      <td width="35%"><?=$value;?></td>
                                      <td width="30%">
                                        <input type="text" name="lotto_hun_pay1_<?=$key;?>" id="lotto_hun_pay1_<?=$key;?>"  class="numeric maxLimit input-num2digt" value="<?=addCommas($r_lotto_hun_pay1[$key]);?>" onblur="chkMinMax(this,0,<?=$r_lotto_hun_pay1[$key];?>);">
                                        <br>
                                        <span class="text-danger label-sm maxtransfer" id="lotto_pay_info" data-json="<?=addCommas($r_lotto_hun_pay1[$key]);?>">(0-<?=addCommas($r_lotto_hun_pay1[$key]);?>) </span>
                                      </td>
                                      <td width="35%">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                          <div class="clearfix  input-group">
                                            <select class="form-control input-sm sl_lotto_set_pay" id="8_<?=$key;?>_lotto_com1" name="lotto_hun_com1_<?=$key;?>">
                                              <?php 
                                                 for($i=0;$i<=intval($r_lotto_hun_dis1[$key]);$i++)
                                                 {
                                                     $selected = (intval($r_lotto_hun_dis1[$key]) == $i) ? "selected" : "";
                                                     ?>
                                                         <option value="<?=$i;?>" <?=$selected;?>><?=$i;?></option>
                                                     <?
                                                 }
                                              ?>
                                            </select>
                                            <span class="input-group-addon" id="k_8_<?=$key;?>_lotto_com1" data-json="<?=intval($r_lotto_hun_dis1[$key]);?>">%</span>
                                          </div>
                                        </div>
                                      </td>
                                    </tr>
                                            <?
                                        }
                                     ?>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-xs-12 col-sm-4 col-md-4">
                          <div class="widget-box">
                            <div class="widget-body">
                              <div class="table-responsive">
                                  <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                      <tr>
                                        <th colspan="100%">
                                            <div id="lotto_hun_typeB" style="text-align: center; height: 40px; line-height: 40px;">
                                                <?
                                                    $chk = ($r_lotto_hun_open[2] == 1) ? "checked=\"\"" : "";
                                                ?>
                                                   <input type="checkbox" class="ace" id="lotto_hun_typeBOpen" name="lotto_hun_typeBOpen" <?=$chk;?> style="height: 23px;">
                                                    <span class="lbl"> แบบ B </span>
                                            </div>
                                        </th>
                                      </tr>
                                      <tr>
                                        <th class="text-center"><?=$lang_memberMember[48];?></th>
                                        <th class="text-center"><?=$lang_memberMember[49];?></th>
                                        <th class="text-center"><?=$lang_memberMember[50];?></th>
                                      </tr>
                                    </thead>
                                  <tbody>
                                     <?
                                        foreach ($data["lotto_type"] as $key => $value) {
                                     ?>
                                    <tr class="text-center">
                                      <td width="35%"><?=$value;?></td>
                                      <td width="30%">
                                        <input type="text" name="lotto_hun_pay2_<?=$key;?>" id="lotto_hun_pay2_<?=$key;?>"  class="numeric maxLimit input-num2digt" value="<?=addCommas($r_lotto_hun_pay2[$key]);?>" onblur="chkMinMax(this,0,<?=$r_lotto_hun_pay2[$key];?>);">
                                        <br>
                                        <span class="text-danger label-sm maxtransfer" id="lotto_pay_info" data-json="<?=addCommas($r_lotto_hun_pay2[$key]);?>">(0-<?=addCommas($r_lotto_hun_pay2[$key]);?>) </span>
                                      </td>
                                      <td width="35%">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                          <div class="clearfix  input-group">
                                            <select class="form-control input-sm sl_lotto_set_pay" id="8_<?=$key;?>_lotto_com2" name="lotto_hun_com2_<?=$key;?>">
                                              <?php 
                                                 for($i=0;$i<=intval($r_lotto_hun_dis2[$key]);$i++)
                                                 {
                                                     $selected = (intval($r_lotto_hun_dis2[$key]) == $i) ? "selected" : "";
                                                     ?>
                                                         <option value="<?=$i;?>" <?=$selected;?>><?=$i;?></option>
                                                     <?
                                                 }
                                              ?>
                                            </select>
                                            <span class="input-group-addon" id="k_8_<?=$key;?>_lotto_com2" data-json="<?=intval($r_lotto_hun_dis2[$key]);?>">%</span>
                                          </div>
                                        </div>
                                      </td>
                                    </tr>
                                            <?
                                        }
                                     ?>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-xs-12 col-sm-4 col-md-4">
                          <div class="widget-box">
                            <div class="widget-body">
                              <div class="table-responsive">
                                  <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                      <tr>
                                        <th colspan="100%">
                                            <div id="lotto_hun_typeC" style="text-align: center; height: 40px; line-height: 40px;">
                                                <?
                                                    $chk = ($r_lotto_hun_open[3] == 1) ? "checked=\"\"" : "";
                                                ?>
                                                   <input type="checkbox" class="ace" id="lotto_hun_typeCOpen" name="lotto_hun_typeCOpen" <?=$chk;?> style="height: 23px;">
                                                    <span class="lbl"> แบบ C </span>
                                            </div>
                                        </th>
                                      </tr>
                                      <tr>
                                        <th class="text-center"><?=$lang_memberMember[48];?></th>
                                        <th class="text-center"><?=$lang_memberMember[49];?></th>
                                        <th class="text-center"><?=$lang_memberMember[50];?></th>
                                      </tr>
                                    </thead>
                                  <tbody>
                                     <?
                                        foreach ($data["lotto_type"] as $key => $value) {
                                     ?>
                                    <tr class="text-center">
                                      <td width="35%"><?=$value;?></td>
                                      <td width="30%">
                                        <input type="text" name="lotto_hun_pay3_<?=$key;?>" id="lotto_hun_pay3_<?=$key;?>"  class="numeric maxLimit input-num2digt" value="<?=addCommas($r_lotto_hun_pay3[$key]);?>" onblur="chkMinMax(this,0,<?=$r_lotto_hun_pay3[$key];?>);">
                                        <br>
                                        <span class="text-danger label-sm maxtransfer" id="lotto_pay_info" data-json="<?=addCommas($r_lotto_hun_pay3[$key]);?>">(0-<?=addCommas($r_lotto_hun_pay3[$key]);?>) </span>
                                      </td>
                                      <td width="35%">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                          <div class="clearfix  input-group">
                                            <select class="form-control input-sm sl_lotto_set_pay" id="8_<?=$key;?>_lotto_com3" name="lotto_hun_com3_<?=$key;?>">
                                              <?php 
                                                 for($i=0;$i<=intval($r_lotto_hun_dis3[$key]);$i++)
                                                 {
                                                     $selected = (intval($r_lotto_hun_dis3[$key]) == $i) ? "selected" : "";
                                                     ?>
                                                         <option value="<?=$i;?>" <?=$selected;?>><?=$i;?></option>
                                                     <?
                                                 }
                                              ?>
                                            </select>
                                            <span class="input-group-addon" id="k_8_<?=$key;?>_lotto_com3" data-json="<?=intval($r_lotto_hun_dis3[$key]);?>">%</span>
                                          </div>
                                        </div>
                                      </td>
                                    </tr>
                                            <?
                                        }
                                     ?>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                      </div>
                      </div>
                      <div id="lotto_set_alerts">
                        <div class="row">
                          <div class="col-xs-6 col-sm-4"></div>
                          <div class="col-xs-6 col-sm-4"><h1 class="text-danger">กรุณาติดต่อตัวแทน</h1></div>
                          <div class="col-xs-6 col-sm-4"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="lotto_lao" class="tab-pane fade">
                    <div class="widget-main no-padding">
                      <div class="form-group">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="form-inline pull-left">
                            <label class="inline">
                              <div id="lotto_lao_today">
                              <input type="checkbox" class="ace" id="lotto_lao_active" name="lotto_lao_active" <?=($r_open[10] == 1) ? "checked=''" : "";?>>
                              <span class="lbl"> <?=$lang_memberMember[19];?> </span>
                              </div>
                            </label>
                          </div>
                          <div id="setMax_lotto_lao" class="form-inline pull-right">
                            <button type="button" class="btn btn-white btn-warning btn-bold btn-sm" onclick="setMax('lotto_lao');"><?=$lang_memberMember[24];?></button>
                          </div>
                        </div>
                      </div>
                      <div id="lotto_lao_body">
                      <div class="form-group">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                          <div class="widget-box">
                            <div class="widget-body">
                            <?php 
                               $lot_type= $lang_g["setpay"];
                            ?>
                              <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" style="width: 99.9%;">
                                  <thead>
                                    <tr>
                                      <th class="text-center"><?=$lang_memberMember[48];?></th>
                                      <th class="text-center"><?=$lang_memberMember[51];?></th>
                                      <th class="text-center"><?=$lang_memberMember[52];?></th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  <?php 
                                    foreach ($lot_type as $key => $value) {
                                      $index = $key+1;
                                  ?>
                                    <tr class="text-center">
                                           <td width="35%"><?=$value;?></td>
                                           <td width="35%" class="lotto_lao_Input">
                                               <input type="text" name="lot_hun_set_pay<?=$index;?>" id="lot_hun_set_pay<?=$index;?>"  class="numeric maxLimit input-num2digt" value="<?=addCommas($r_lotto_hun_set_pay[$index]);?>" onblur="chkMinMax(this,0,<?=$r_lotto_hun_set_pay[$index];?>);">
                                               <span class="text-danger label-sm maxtransfer" id="lot_hun_set_pay_info" data-json="<?=addCommas($r_lotto_hun_set_pay[$index]);?>">(0-<?=addCommas($r_lotto_hun_set_pay[$index]);?>) </span>
                                           </td>
                                           <?php if($index == 1){ ?>
                                           <td width="35%" rowspan="100%" style="vertical-align: top;" class="lotto_lao_Input">
                                               <input type="text" name="lot_hun_set_price<?=$index;?>" id="lot_hun_set_price<?=$index;?>" class="numeric maxLimit input-num2digt" value="<?=addCommas($r_lotto_hun_set_price[$index]);?>" onblur="chkMinMax(this,0,<?=$r_lotto_hun_set_price[$index];?>);">
                                               <span class="text-danger label-sm maxtransfer" id="lot_hun_set_price_info" data-json="<?=addCommas($r_lotto_hun_set_price[$index]);?>">(0- <?=addCommas($r_lotto_hun_set_price[$index]);?>) </span>
                                           </td>
                                           <?php } ?>
                                    </tr>
                                  <?php } ?>
                                  </tbody>
                                </table>
                              </div>   
                            </div>
                          </div>
                        </div>
                      </div>
                      </div>
                      <div id="lotto_lao_alerts">
                        <div class="row">
                          <div class="col-xs-6 col-sm-4"></div>
                          <div class="col-xs-6 col-sm-4"><h1 class="text-danger">กรุณาติดต่อตัวแทน</h1></div>
                          <div class="col-xs-6 col-sm-4"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                
                  <div id="game" class="tab-pane fade">
                    <div class="form-group">
                      <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-inline pull-left">
                          <label class="inline">
                            <div id="game_today">
                            <input type="checkbox" class="ace" id="game_active" name="game_active" <?=($r_open[11] == 1) ? "checked=''" : "";?>>
                            <span class="lbl"> <?=$lang_memberMember[20];?>  </span>
                            </div>
                          </label>
                        </div>
                        <div id="setMax_game" class="form-inline pull-right">
                          <button type="button" class="btn btn-white btn-warning btn-bold btn-sm" onclick="setMax('game');"><?=$lang_memberMember[24];?></button>
                        </div>
                      </div>
                    </div>
                    <div id="game_body">
                    <div class="form-group">
                      <div class="col-xs-8 col-sm-6 col-md-4">
                        <label class="control-label col-xs-6 col-sm-4 col-md-6 no-padding-right" for="game_com"><?=$lang_memberMember[25];?> :</label>
                        <div class="col-xs-6 col-sm-8 col-md-6">
                          <div class="clearfix input-group">
                            <select class="form-control input-sm sl_game" id="game_com" name="game_com">
                              <?php 
                                  for($i=0;$i<=intval($r_games_dis[1]);$i++)
                                  {
                                      ?>
                                          <option value="<?=$i;?>"><?=$i;?></option>
                                      <?
                                  } 
                              ?>
                            </select>
                            <span class="input-group-addon" id="k_game_com" data-json="<?=$r_games_dis[1];?>">%</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    </div>
                    <div id="game_alerts">
                      <div class="row">
                        <div class="col-xs-6 col-sm-4"></div>
                        <div class="col-xs-6 col-sm-4"><h1 class="text-danger">กรุณาติดต่อตัวแทน</h1></div>
                        <div class="col-xs-6 col-sm-4"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="widget-toolbox text-center clearfix" id="small-manage-btn">
              <button type="button" class="btn btn-success btn-xs" onclick="saveMember();">
                <i class="ace-icon fa fa-floppy-o"></i><?=$lang_memberMember[4];?>
              </button>
              <button type="reset" class="btn btn-danger  btn-xs" onclick="btn_reset();">
                <span class="fa fa-refresh icon-on-right bigger-110"></span><?=$lang_memberMember[5];?>
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
<script src="assets/js/selectize.js"></script>
<script src="assets/js/main.js"></script>
<script type="text/javascript">

  change_set_min_pair(2,20);

// sql_escape_str()
  if($("#soccer_today_active").attr('checked')){
    $("#soccer_body").show();
    $("#soccer_alerts").hide();
  }
  else{
    $("#soccer_today").hide();
    $("#soccer_live_active").hide();
    $("#setMax_soccer").hide();
    $("#soccer_body").hide();
    $("#soccer_alerts").show();
  }

  if($("#sport_today_active").attr('checked')){
    $("#sport_body").show();
    $("#sport_alerts").hide();
  }
  else{
    $("#sport_today").hide();
    $("#sport_live_active").hide();
    $("#setMax_sport").hide();
    $("#sport_body").hide();
    $("#sport_alerts").show();
  }

  if($("#boxing_today_active").attr('checked')){
    $("#boxing_body").show();
    $("#boxing_alerts").hide();
  }
  else{
    $("#boxing_today").hide();
    $("#boxing_live_active").hide();
    $("#setMax_boxing").hide();
    $("#boxing_body").hide();
    $("#boxing_alerts").show();
  }

  if($("#step_active").attr('checked')){
    $("#step_body").show();
    $("#step_alerts").hide();
  }
  else{
    $("#step_today").hide();
    $("#setMax_step").hide();
    $("#step_body").hide();
    $("#step_alerts").show();
  }

  if($("#lotto_active").attr('checked')){
    $("#lotto_body").show();
    $("#lotto_alerts").hide();
  }
  else{
    $("#lotto_today").hide();
    $("#setMax_lotto").hide();
    $("#lotto_body").hide();
    $("#lotto_alerts").show();
  }

  if($("#lotto_share_active").attr('checked')){
    $("#lotto_set_body").show();
    $("#lotto_set_alerts").hide();
  }
  else{
    $("#lotto_set_today").hide();
    $("#setMax_lotto_set").hide();
    $("#lotto_set_body").hide();
    $("#lotto_set_alerts").show();
  }

  if($("#lotto_lao_active").attr('checked')){
    $("#lotto_lao_body").show();
    $("#lotto_lao_alerts").hide();
  }
  else{
    $("#lotto_lao_today").hide();
    $("#setMax_lotto_lao").hide();
    $("#lotto_lao_body").hide();
    $("#lotto_lao_alerts").show();
  }

  if($("#game_active").attr('checked')){
    $("#game_body").show();
    $("#game_alerts").hide();
  }
  else{
    $("#game_today").hide();
    $("#setMax_game").hide();
    $("#game_body").hide();
    $("#game_alerts").show();
  }

  if($("#casino_active").attr('checked')){
    $("#casino_body").show();
    $("#casino_alerts").hide();
  }
  else{
    $("#casino_today").hide();
    $("#setMax_casino").hide();
    $("#casino_body").hide();
    $("#casino_alerts").show();
  }

  // $("#step_hide").hide();

  function changeLowerValue(e)
  {
      var thisVal = $(e).val();
      var thisIndex = $(e).attr("data-index");

       $("#step .sl_step").each(function(i,e) {
            var index = $(this).attr("data-index");
            if(parseInt(index) > parseInt(thisIndex))
            {
              $('#stepcom'+index+'').val(thisVal); 
            }
        }); 
  }

  function change_set_min_pair(_min_df,_max_df){

    var r_sport_step_dis = <?=json_encode($r_sport_step_dis);?>;
    var data_min = +$("#step_min_pair").val();
    var data_max = +$("#step_max_pair").val();
    var _min_df = <?=$parent_r_sport_step2[1];?>;
    var _max_df = <?=$parent_r_sport_step2[2];?>;

    var min_sl = ""
    for(i=_min_df; i<=(data_max-1); i++) {
      var sl = (data_min == i) ? "selected = 'selected'" : '';
      min_sl += "<option "+sl+" value="+i+">"+i+"</option>";
    }
    $('#step_min_pair').html('');
    $("#step_min_pair").append(min_sl);

    var max_sl = ""
      for(i=(data_min+1); i<=_max_df; i++) {
      var sl = (data_max == i) ? "selected = 'selected'" : '';
      max_sl += "<option "+sl+" value="+i+">"+i+"</option>";
    }
    $('#step_max_pair').html('');
    $("#step_max_pair").append(max_sl);

    $.ajax({
      url: 'inc/temp/memberMember/create_dis_step.php',
      type: 'POST',
      dataType: 'html',
      data: {data_min: data_min , data_max :data_max , r_sport_step_dis:r_sport_step_dis},
    })
    .done(function(data) {
      $('#test').text('')
          $('#test').append(data);
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
  }
  
  $(document).ready(function(){
    // $('.numeric').autoNumeric();
    utab('soccer');
    utab('sport');
    utab('boxing');
    utab('step');
    utab('casino');
    utab('lotto');
    utab('lotto_set');
    utab('lotto_lao');
    utab('lottery');
    utab('game');
  });

  function utab(id){
    $('.sl_'+id).click();
  }

  function generateSL(v,tag,plus){
    var select = document.getElementById(tag.id);

    if(select.length == 1){
      if(plus){
        for(var i = 1 ; i <= v; i++){
          var opt = document.createElement('option');
          opt.value = i;
          opt.innerHTML = i;
          select.appendChild(opt);
        }

      }else{
        for(var i = v ; i >= 0; i--){
          var opt = document.createElement('option');
          opt.value = i;
          opt.innerHTML = i;
          select.appendChild(opt);
        }
      }
    }
  }

  function generateSL2(v,tag){
    var select = document.getElementById(tag.id);
    if(select.length == 1){
      for(var i = 0.05 ; parseFloat(i).toFixed(2) <= parseFloat(v).toFixed(2); i = i+ 0.05){
        var opt = document.createElement('option');
        opt.value = i.toFixed(2);
        opt.innerHTML = i.toFixed(2);
        select.appendChild(opt);
      }
    }
  }



  function generateSL3(v,tag){
    var select = document.getElementById(tag.id);
    if(select.length == 1){
      for(var i = 0.01; parseFloat(i).toFixed(2) <= parseFloat(v).toFixed(2); i = i+ 0.01){
        var opt = document.createElement('option');
        opt.value = i.toFixed(2);
        opt.innerHTML = i.toFixed(2);
        select.appendChild(opt);
      }
    }
  }

  function saveMember(){
    pageContentLoader("show");
    var serializeFrm = $("#createMember_form").serializeArray();
    $.ajax({
      url: 'memberMember/save.php',
      type: 'POST',
      data: serializeFrm,
      dataType: 'json',
      success: function (response) {
        // console.log(response.status)
        pageContentLoader("hide");
        if(response.status){

          $.gritter.add({
            title: "",
            text: '<h5><i class="fa fa-check" aria-hidden="true"></i> '+response.msg+'</h5>',
            class_name: 'gritter-success'
         });
        getMenu('memberMember');

        }else{
          var err = response.msg;
          $.gritter.add({
            title: "",
            text: err,
            class_name: 'gritter-error'
          });
          if(response.warningInput){
             alertWrongInput(response.tab,response.id);
          }
        }
      },
      error: function (response) {
        // console.log(response);
      }
    });
  }

  function setMaxAll(){
    var list = ['soccer','sport','step','casino','lotto','lotto_set','lotto_lao','lottery','game'];
    // $('#credit').val($('#max_credit').data('json'));
    $.each(list,function(k,v){
      setMax(v);
    });
  }

  function setMax(game){
    switch (game){
      case 'soccer' :
        $('#today_com').val($('#k_today_com').data('json'));    
        // $('#torup').val($('#k_torup').data('json'));    
        // $('#logup').val($('#k_logup').data('json')); 
        $('#live_betmoneymax_pair').val($('#k_live_betmoneymax_pair').data('json'));    
        $('#live_betmax_money').val($('#k_live_betmax_money').data('json'));    
        $('#live_betmin_money').val($('#k_live_betmin_money').data('json'));    
        $('#live_fbetmoneymax_pair').val($('#k_live_fbetmoneymax_pair').data('json'));    
        $('#live_fbetmax_money').val($('#k_live_fbetmax_money').data('json'));    
        $('#live_fbetmin_money').val($('#k_live_fbetmin_money').data('json'));    
      break;

      case 'sport' :
        $('#sport_com').val($('#sport_com').children('option:last').val());   
        $('#sport_betmoneymax_pair').val($('#k_sport_betmoneymax_pair').data('json'));   
        $('#sport_betmax_money').val($('#k_sport_betmax_money').data('json'));   
        $('#sport_betmin_money').val($('#k_sport_betmin_money').data('json'));   
      break;

      case 'step' :
        $('#step_betmax_money').val($('#k_step_betmax_money').data('json')); 
        $('#step_betmin_money').val($('#k_step_betmin_money').data('json')); 
        $('#step_daymax_money').val($('#k_step_daymax_money').data('json')); 
        $('#step_billmax_money').val($('#k_step_billmax_money').data('json')); 
        $('#step_max_pair').val($('#k_step_max_pair').data('json')); 
        $('#step_min_pair').val($('#k_step_min_pair').data('json')); 

        var max_pair = $('#k_step_max_pair').data('json');
        var min_pair = $('#k_step_min_pair').data('json');

        var min_sl = ""
        for(i=min_pair; i<=max_pair; i++) {
           min_sl += "<option value="+i+">"+i+"</option>";
        }
        $('#step_min_pair').html('');
        $("#step_min_pair").append(min_sl);

        var max_sl = ""
        for(i=min_pair; i<=max_pair; i++) {
          var sl = (max_pair == i) ? "selected = 'selected'" : '';
          max_sl += "<option "+sl+" value="+i+">"+i+"</option>";
        }
        $('#step_max_pair').html('');
        $("#step_max_pair").append(max_sl);
        change_set_min_pair(2,20); 
        setTimeout(function(){ 
            $("#step .sl_com").each(function(i,e) {
                $(this).val($(this).children('option:last').val()) 
            });
        }, 300);

      break;

      case 'casino' :
        $( "#casino .maxLimit" ).each(function() {
          var data = $( this ).closest('.casino_Input').children('.maxtransfer').data('json')
          $( this ).val(data);
        });   
      break;

      case 'lotto' :

        $( "#lotto .maxLimit" ).each(function() {
          var data = $( this ).closest('td').children('.maxtransfer').data('json')
          $( this ).val(data);
        });  
         $( "#lotto .sl_lotto_com" ).each(function() {
             $(this).val($(this).children('option:last').val())  
         });
      break;

      case 'lotto_set' :

        $( "#lotto_set .maxLimit" ).each(function() {
                    var data = $( this ).closest('td').children('.maxtransfer').data('json')
                    $( this ).val(data);
        });
        $( "#lotto_set .sl_lotto_set_com" ).each(function() {
            $(this).val($(this).children('option:last').val())
        });
      break;

      case 'lotto_lao' :
      $( "#lotto_lao .maxLimit" ).each(function() {
        var data = $( this ).closest('.lotto_lao_Input').children('.maxtransfer').data('json')
        $( this ).val(data);
      });   
      break;

      case 'lottery' :
        $('#6_0_lotto_com').val($('#k_6_0_lotto_com').data('json')); 
      break;

      case 'game' :
        $('#game_com').val($('#k_game_com').data('json')); 
      break;
    }
  }

  function setKeep(id){
    var diff = 0;
    var share = $('#'+id).val();
    var keep  = $('#k_'+id).data('json'); 
    diff = keep - share;
    $('#k_'+id).text(diff);
  }

  function btn_reset(){

  }

  function regisCopyUser(){
    pageContentLoader("show");
    $.ajax({
      url: 'inc/temp/memberMember/copyUser_temp.php',
      type: 'GET',
      dataType: 'json',
      success: function (response) {
        pageContentLoader("hide");
      bootbox.dialog({
      message:response.result,
      buttons:            
    {
      "UserList" :
    {
      "label" : "<i class=\"ace-icon fa fa-list-ul bigger-110\"></i> <span class=\"normal\">รายชื่อสมาชิก</span>",
      "className" : "btn btn-sm btn-inverse pull-left",
      "callback": function(e) {
        getMenu('userList');
      }
    },
      "OK" :
    {
      "label" : "<i class='fa fa-floppy-o'></i> <span class=\"normal\">คัดลอกผู้ใช้</span>",
      "className" : "btn-sm btn-success copy_submit",
      "callback": function(e) {
        $(".copy_submit").addClass('disabled');
        $.ajax({
          url: 'inc/temp/memberUserList/saveCopyUser_temp.php',
          data: { 
          _token : $('input[name="_token"]').val(),
          olduser_id : $('#select-user').val(),
          newuser: $('input[name="regis_usernameCopy"]').val(),
          pass: $('input[name="regis_password"]').val(),
          credit: $('input[name="regis_credit"]').val(),
          name: $('input[name="regis_name"]').val(),
          telephone: $('input[name="regis_tel"]').val()
        },
        type: 'POST',
        dataType: 'json',
        success: function (response) {
          $(".copy_submit").removeClass('disabled');
          if(response.status == true){
            dialogSuccess(response.msg);
            $("#search").click();
          }
          else{
            dialogError(response.msg);
          }
        },
        error: function (response) {
          // console.log(response);
        }
        });

        return false;
      }
            },
              "NO" :
            {
              "label" : "<i class='ace-icon glyphicon glyphicon-log-in'></i> <span class=\"normal\">ปิด</span>",
              "className" : "btn-sm btn-primary"
            }
          }
        });
      }
    });
  }

   function calCredit(e,max){
        var newCredit   = $("#credit").val();
        var val = $(e).val();
        val  = val.replace(/,/g, "");
        if(parseFloat(val) > parseFloat(max))
        {
            $(e).val(max);
        }
        
    }

function addDigit(e)
{
    let val = $(e).val();
    $(e).val(formatNumber(val,2,1))
}




</script>
</div>