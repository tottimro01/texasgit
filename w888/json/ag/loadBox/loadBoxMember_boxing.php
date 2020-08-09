<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 
if($_SESSION["rid"]=="" and $_SESSION["uu_id"]==""){exit();}

require('../inc/ag_function.php');

$r_sport_nam_tor   = explode(",", $_SESSION["agent_data"]["r_sport_nam_tor"]);
$r_sport_nam_rong   = explode(",", $_SESSION["agent_data"]["r_sport_nam_rong"]);       
$r_sport_dis   = explode(",", $_SESSION["agent_data"]["r_sport_dis"]);
$r_sport_max   = explode(",", $_SESSION["agent_data"]["r_sport_max"]);
$r_sport_min   = explode(",", $_SESSION["agent_data"]["r_sport_min"]);
 
$r_sport_step_max   = explode(",", $_SESSION["agent_data"]["r_sport_step_max"]);
$r_sport_step_min   = explode(",", $_SESSION["agent_data"]["r_sport_step_min"]);

$r_sport_step_max   = explode(",", $_SESSION["agent_data"]["r_sport_step_max"]);
$r_sport_step_min   = explode(",", $_SESSION["agent_data"]["r_sport_step_min"]);
$r_sport_step_day   = explode(",", $_SESSION["agent_data"]["r_sport_step_day"]);
$r_sport_step2   = explode(",", $_SESSION["agent_data"]["r_sport_step2"]);

$r_sport_share   = explode(",", $_SESSION["agent_data"]["r_sport_share"]);
$r_sport_share_live   = explode(",", $_SESSION["agent_data"]["r_sport_share_live"]);

$r_lotto_share   = explode(",", $_SESSION["agent_data"]["r_lotto_share"]);
$r_lotto_pay1   = explode(",", $_SESSION["agent_data"]["r_lotto_pay1"]);
$r_lotto_dis1   = explode(",", $_SESSION["agent_data"]["r_lotto_dis1"]);

$r_lotto_hun_share   = explode(",", $_SESSION["agent_data"]["r_lotto_share"]);
$r_lotto_hun_pay1   = explode(",", $_SESSION["agent_data"]["r_lotto_hun_pay1"]);
$r_lotto_hun_dis1   = explode(",", $_SESSION["agent_data"]["r_lotto_hun_dis1"]);

$r_lotto_hun_set_pay   = explode(",", $_SESSION["agent_data"]["r_lotto_hun_set_pay"]);
$r_lotto_hun_set_price   = explode(",", $_SESSION["agent_data"]["r_lotto_hun_set_price"]);

$r_games_dis   = explode(",", $_SESSION["agent_data"]["r_games_dis"]);
$r_games_share   = explode(",", $_SESSION["agent_data"]["r_games_share"]);
$r_games_myshare   = explode(",", $_SESSION["agent_data"]["r_games_myshare"]);

$r_casino_share = explode(",", $_SESSION["agent_data"]["r_casino_share"]);
$r_casino_max   = explode(",", $_SESSION["agent_data"]["r_casino_max"]);


$array_data = $_POST["arr"];  

$r_open_agent = $array_data["r_open_agent"];
$boxing_today_active = ($array_data["boxing_today_active"] == 1) ? "checked=''" : "";
$boxing_live_active = ($array_data["boxing_live_active"] == 1) ? "checked=''" : "";

  $data["arr"]["sport"] = $array_data;  
  $data["temp"] = "
  <div class='form-group'>
  <div class='col-xs-12 col-sm-12 col-md-12'>
    <div class='form-inline pull-left'>
        <label class='inline'>
            <div id='boxing_today'> 
                <input type='checkbox' class='ace' id='boxing_today_active' name='boxing_today_active' {$boxing_today_active} >
                <span class='lbl'>{$lang_memberMember[91]}</span>
            </div>
    </label> &nbsp;
        <label class='inline'>
            <div id='boxing_live_active'>
                <input type='checkbox' class='ace' name='boxing_live_active' {$boxing_live_active} >
                <span class='lbl'>{$lang_memberMember[92]}</span>
            </div>
    </label>
    </div>
    <div id='setMax_boxing' class='form-inline pull-right'>
    <button type='button' class='btn btn-white btn-warning btn-bold btn-sm' onclick=\"setMax('boxing');\">{$lang_memberMember[24]}</button>
    </div>
  </div>
  </div>
  <div id='boxing_body'>
  <div class='form-group'>
    <div class='col-xs-12 col-sm-4'>
        <label class='control-label col-xs-4 col-sm-4 no-padding-right' for='boxing_com'>{$lang_memberMember[25]} :</label>
        <div class='col-xs-8 col-sm-8'>
            <div class='clearfix input-group'>
        <select class='form-control input-sm' id='boxing_com' name='boxing_com' >";

                    for($x=0;$x<=400;$x++){
                            $num=number_format($x*0.05,2);
                            $rnum=number_format($r_sport_dis[3],2);
                             if($rnum>=$num)
                             {
                                 $sl_row = "";
                                 $sl_row = (number_format($array_data["boxing_com"],2) == $num) ? "selected='selected'" : "";
                                 $data["temp"] .= "<option value='".$num."' {$sl_row} >".$num."</option>";
                             }
                        }
                                         
                         $data["temp"].=  "</select>
                <span class='input-group-addon' id='k_boxing_com' data-json='".number_format($r_sport_dis[2],2)."'>%</span>
            </div>
        </div>
    </div>
</div>
<div class='form-group'>
    <div class='col-xs-12 col-sm-4'>
        <label class='control-label col-xs-4 col-sm-4 no-padding-right' for='boxing_betmoneymax_pair'>{$lang_memberMember[34]} :</label>
        <div class='col-xs-8 col-sm-8'>
            <div class='clearfix'>
                <input type='text' name='boxing_betmoneymax_pair' id='boxing_betmoneymax_pair' class='numeric maxLimit' value='".addCommas($array_data["boxing_betmoneymax_pair"])."' onblur=\"chkMinMax(this,0,".intval($r_sport_max[5]).");\">
                <span class='text-danger' id='k_boxing_betmoneymax_pair' data-json='".addCommas($r_sport_max[5])."'>(0 - ".addCommas($r_sport_max[5]).") </span>
            </div>
        </div>
    </div>
    <div class='col-xs-12 col-sm-4'>
        <label class='control-label col-xs-4 col-sm-4 no-padding-right' for='boxing_betmax_money'>{$lang_memberMember[35]}  :</label>
        <div class='col-xs-8 col-sm-8'>
            <div class='clearfix'>
                    <input type='text' name='boxing_betmax_money' id='boxing_betmax_money' class='numeric maxLimit' value='".addCommas($array_data["boxing_betmax_money"])."' onblur=\"chkMinMax(this,".intval($r_sport_min[3]).",".intval($r_sport_max[6]).");\">
                    <span class='text-danger label-sm' id='k_boxing_betmax_money' data-json='".addCommas($r_sport_max[6])."'>(".addCommas($r_sport_min[3])." - ".addCommas($r_sport_max[6]).") </span>
            </div>
        </div>
    </div>
    <div class='col-xs-12 col-sm-4'>
        <label class='control-label col-xs-4 col-sm-4 no-padding-right' for='boxing_betmin_money'>{$lang_memberMember[36]} :</label>
        <div class='col-xs-8 col-sm-8'>
            <div class='clearfix'>
                <input type='text' name='boxing_betmin_money' id='boxing_betmin_money' class='numeric minLimit' value='".addCommas($array_data["boxing_betmin_money"])."' onblur=\"chkMinMax(this,".intval($r_sport_min[3]).",".intval($r_sport_max[6]).");\">
                <span class='text-danger label-sm' id='k_boxing_betmin_money' data-json='".addCommas($r_sport_min[3])."'>(".addCommas($r_sport_min[3])." - ".addCommas($r_sport_max[6]).") </span>
            </div>
        </div>
    </div>
</div>
</div>
<div id='boxing_alerts'></div>
<script>
var r_open_agent = '{$r_open_agent}';
if(r_open_agent == 1){
    $('#boxing_body').show();
    $('#boxing_alerts').hide();
  }
  else{
    $('#boxing_today').hide();
    $('#boxing_live_active').hide();
    $('#setMax_sport').hide();
    $('#boxing_body').hide();
    $('#boxing_alerts').append(html_alerts);
  }
  </script>
";

echo json_encode($data);


 ?>