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

$r_lotto_hun_share   = explode(",", $_SESSION["agent_data"]["r_lotto_hun_share"]);
$r_lotto_hun_pay1   = explode(",", $_SESSION["agent_data"]["r_lotto_hun_pay1"]);
$r_lotto_hun_dis1   = explode(",", $_SESSION["agent_data"]["r_lotto_hun_dis1"]);

$r_lotto_hun_set_pay   = explode(",", $_SESSION["agent_data"]["r_lotto_hun_set_pay"]);
$r_lotto_hun_set_price   = explode(",", $_SESSION["agent_data"]["r_lotto_hun_set_price"]);

$r_games_dis   = explode(",", $_SESSION["agent_data"]["r_games_dis"]);
$r_games_share   = explode(",", $_SESSION["agent_data"]["r_games_share"]);
$r_games_myshare   = explode(",", $_SESSION["agent_data"]["r_games_myshare"]);

$r_casino_share = explode(",", $_SESSION["agent_data"]["r_casino_share"]);
$r_casino_max   = explode(",", $_SESSION["agent_data"]["r_casino_max"]);
$r_casino_min   = explode(",", $_SESSION["agent_data"]["r_casino_min"]);
$r_casino_myshare   = explode(",", $_SESSION["agent_data"]["r_casino_myshare"]);
  

    $array_data = $_POST["arr"]; 
    $casino_active = ($array_data["casino_active"] == 1) ? "checked=''" : "";

    $r_open_agent = $array_data["r_open_agent"];

    $data["arr"]["casino"] = $array_data;
    $data["temp"] = "
    <div class='form-group'>
    <div class='col-xs-12 col-sm-12 col-md-12'>
        <div class='form-inline pull-left'>
            <label class='inline'>
            <div id='casino_today'>
                <input type='checkbox' class='ace' id='casino_active' name='casino_active' {$casino_active}>
                <span class='lbl'> {$lang_memberAgent[22]} </span>
                </div>
            </label>
        </div>
        <div id='setMax_casino' class='form-inline pull-right'>
            <button type='button' class='btn btn-white btn-warning btn-bold btn-sm' onclick=\"setMax('casino');\">
                {$lang_memberAgent[25]}
            </button>
        </div>
    </div>
</div>
<div id='casino_body'>";
 $data["temp"] .=   "<div class='form-group'>";
                     foreach ($lang_g["casino_share"] as $key => $value)
                     {
    // ค่าต่ำสุดของ user ภายใต้ ที่ตั้งไว้ 
    $r_casino_min[$key] = ($r_casino_min[$key] == "") ? 0 : $r_casino_min[$key];     

    $check_casino_max[$key] =  (max($array_data["check_casino_max"][$key]) == "") ? $r_casino_min[$key] : max($array_data["check_casino_max"][$key]);
    $check_r_casino_share[$key] =  (max($array_data["check_r_casino_share"][$key]) == "") ? 0 : max($array_data["check_r_casino_share"][$key]);

    $data["temp"] .="<div class='col-xs-12 col-sm-6 col-md-6'>
        <div class='widget-box'>
            <div class='widget-header widget-header-flat  text-center'>
                <h4 class='widget-title smaller'>{$value}</h4>
            </div>
            <div class='widget-body'>
                <div class='widget-main'>
                    <div class='form-group'>
                        <div class='col-xs-12 col-sm-12 col-md-12'>
                            <label class='control-label col-xs-12 col-sm-4 col-md-5 no-padding-right' for='casino_share'>
                                {$lang_memberAgent[43]} :</label>
                            <div class='col-xs-12 col-sm-6 col-md-7 casino_select'>
                                <div class='clearfix input-group'> 
                                    <select class='form-control input-sm sl_casino casino_share' id='casino_share{$key}' name='casino_share{$key}' onchange=\"setKeep('casino_share{$key}');\">";
                            for($i=$check_r_casino_share[$key];$i<=intval($r_casino_share[$key]);$i++)
                            {
                                $sl_row = "";
                                $sl_row = ($array_data["casino_share"][$key] == $i) ? "selected='selected'" : "";
                                $data["temp"] .= "<option value='{$i}' {$sl_row} >{$i}</option>";
                            } 
            $data["temp"] .="</select>
                                    <span class='input-group-addon'> % </span>
                                </div>
                                <span class='text-danger'> ".$array_data["r_name"]." </span> 
                                {$lang_memberAgent[27]} : 
                                <span id='k_casino_share{$key}' class='sl_data' data-json='".$r_casino_share[$key]."'> ".$array_data["casino_myshare"][$key]." </span> %
                            </div>
                        </div>
                    </div>

                    <div class='form-group'>
                        <div class='col-xs-12 col-sm-12 col-md-12'>
                            <label class='control-label col-xs-12 col-sm-4 col-md-5 no-padding-right' for='rcb_maxtransfer'>{$lang_memberAgent[41]} :</label>
                            <div class='col-xs-12 col-sm-8 col-md-7'>
                                <div class='clearfix casino_Input'> 
                                    <input type='text' name='rcb_maxtransfer{$key}' id='rcb_maxtransfer{$key}' class='numeric input-num maxLimit' value='".$array_data["rcb_maxtransfer"][$key]."' onblur=\"chkMinMax(this,".$check_casino_max[$key].",".$r_casino_max[$key].");\">
                                    <span class='text-danger label-sm maxtransfer' id='k_rcb_maxtransfer' data-json='".$r_casino_max[$key]."'>(".addCommas($check_casino_max[$key])." - ".addCommas($r_casino_max[$key]).") </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>";
                     }
$data["temp"] .=  "</div>
</div>
<div id='casino_alerts'></div>
<script>
var r_open_agent = '{$r_open_agent}';
if(r_open_agent == 1){
  $('#casino_body').show();
  $('#casino_alerts').hide();
}
else{
  $('#casino_today').hide();
  $('#setMax_casino').hide();
  $('#casino_body').hide();
  $('#casino_alerts').append(html_alerts);
}
</script>
";                     
              
echo json_encode($data);


 ?>