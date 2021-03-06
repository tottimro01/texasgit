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
$r_sport_step_paymax   = explode(",", $_SESSION["agent_data"]["r_sport_step_paymax"]);
$r_sport_step2   = explode(",", $_SESSION["agent_data"]["r_sport_step2"]);

$r_sport_share   = explode(",", $_SESSION["agent_data"]["r_sport_share"]);
$r_sport_share_live   = explode(",", $_SESSION["agent_data"]["r_sport_share_live"]);

$r_lotto_share   = explode(",", $_SESSION["agent_data"]["r_lotto_share"]);
$r_lotto_pay1   = explode(",", $_SESSION["agent_data"]["r_lotto_hun_pay1"]);
$r_lotto_dis1   = explode(",", $_SESSION["agent_data"]["r_lotto_hun_dis1"]);

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
$step_active = ($array_data["step_active"] == 1) ? "checked=''" : "";

$r_open_agent = $array_data["r_open_agent"];

$array_data["step_share"] = ($array_data["step_share"] == "") ? intval($r_sport_share[4]) : $array_data["step_share"];  
$array_data["step_min_pair"] = ($array_data["step_min_pair"] == "") ? intval($r_sport_step2[1]) : $array_data["step_min_pair"];
$array_data["step_betmax_money"] = ($array_data["step_betmax_money"] == "") ? intval($r_sport_step_max[1]) : $array_data["step_betmax_money"];
$array_data["step_betmin_money"] = ($array_data["step_betmin_money"] == "") ? intval($r_sport_step_min[1]) : $array_data["step_betmin_money"];
$array_data["step_daymax_money"] = ($array_data["step_daymax_money"] == "") ? intval($r_sport_step_day[1]) : $array_data["step_daymax_money"];
$array_data["step_billmax_money"] = ($array_data["step_billmax_money"] == "") ? intval($r_sport_step_paymax[1]) : $array_data["step_billmax_money"];

$step_share_max =  ($array_data["step_share_max"] == "") ? 0 : $array_data["step_share_max"];
$step_betmax_money_max =  ($array_data["step_betmax_money_max"] == "") ? intval($r_sport_step_min[1]) : intval($array_data["step_betmax_money_max"]);
$step_daymax_money_max =  ($array_data["step_daymax_money_max"] == "") ? 0 : intval($array_data["step_daymax_money_max"]);
$step_billmax_money_max =  ($array_data["step_billmax_money_max"] == "") ? 0 : intval($array_data["step_billmax_money_max"]);
$step_betmin_money_max =  ($array_data["step_betmin_money_max"] == "") ? intval($max_betmin_money) : intval($array_data["step_betmin_money_max"]);
$step_min_pair_min =  ($array_data["step_min_pair_min"] == "") ? $r_sport_step2[1] : intval($array_data["step_min_pair_min"]);
$step_max_pair_min =  ($array_data["step_max_pair_min"] == "") ? $r_sport_step2[2] : intval($array_data["step_max_pair_min"]);

    $data["arr"]["step"] = $array_data;

        $data["temp"] = "       
		<div class='form-group'>
            <div class='col-xs-12 col-sm-12 col-md-12'>
                <div class='form-inline pull-left'>
                    <label class='inline'>
                    <div id='step_today'>
                        <input type='checkbox' class='ace' id='step_active' name='step_active' {$step_active} >
                        <span class='lbl'> {$lang_ag[469]} </span>
                    </div>
                    </label>
                </div>
                <div id='setMax_step' class='form-inline pull-right'>
                    <button type='button' class='btn btn-white btn-warning btn-bold btn-sm' onclick=\"setMax('step');\">
                       {$lang_ag[1408]} 
                    </button>
                </div>
            </div>
        </div>
        <div id='step_body'>
        <div class='form-group'>
            <div class='col-xs-12 col-sm-6 col-md-6'>
                <label class='control-label col-xs-12 col-sm-6 col-md-6 no-padding-right' for='step_share'>{$lang_ag[567]} :</label>
                <div class='col-xs-12 col-sm-6 col-md-6'>
                    <div class='clearfix input-group'>
                        <select class='form-control input-sm sl_step' id='step_share' name='step_share' onchange=\"setKeep('step_share');\">";
                            for($i=$step_share_max;$i<=intval($r_sport_share[4]);$i++)
                            {
                                $sl_row = "";
                                $sl_row = ($array_data["step_share"] == $i) ? "selected='selected'" : "";
                            	$data["temp"] .= "<option value='{$i}' {$sl_row} >{$i}</option>";
                            } 

            $data["temp"] .="</select>
                        <span class='input-group-addon'> % </span>
                    </div>
                </div>
            </div>
            <div class='col-xs-12 col-sm-6 col-md-6'>
                <label class='control-label col-xs-12 col-sm-6 col-md-6 no-padding-right'>
                    <span class='text-danger'> ".$array_data["r_name"]." </span> 
                    {$lang_ag[1402]} : 
                    <span id='k_step_share' data-json='".$r_sport_share[4]."'>".$array_data["k_step_share"]." </span> %
                </label>
            </div>
        </div>
    

        <div class='col-xs-12 col-sm-4 col-md-4'>
            <div class='form-group'>
                <div class='col-xs-12 col-sm-12 col-md-12'> 
                <label class='control-label col-xs-12 col-sm-6 col-md-4 no-padding-right' for='step_betmax_money'>{$lang_ag[831]} :</label>
                <div class='col-xs-12 col-sm-6 col-md-8'>
                    <div class='clearfix'> 
                        <input type='text' name='step_betmax_money' id='step_betmax_money' class='numeric maxLimit' value='".addCommas($array_data["step_betmax_money"])."' onblur=\"chkMinMax(this,".$step_betmax_money_max.",".intval($r_sport_step_max[1]).");\">
                        <span class='text-danger label-sm' id='k_step_betmax_money' data-json='".addCommas($r_sport_step_max[1])."'>(".addCommas($step_betmax_money_max)." - ".addCommas($r_sport_step_max[1]).") </span>
                    </div>
                </div>
                </div>
            </div>
            <div class='form-group'>
                <div class='col-xs-12 col-sm-12 col-md-12'>
                <label class='control-label col-sm-6 col-md-4 no-padding-right' for='step_betmin_money'>{$lang_ag[1410]} :</label>
                <div class='col-xs-12 col-sm-6 col-md-8'>
                    <div class='clearfix'>
                        <input type='text' name='step_betmin_money' id='step_betmin_money' class='numeric minLimit' value='".addCommas($array_data["step_betmin_money"])."' onblur=\"chkMinMax(this,".$r_sport_step_min[1].",".$step_betmin_money_max.");\">
                        <span class='text-danger label-sm' id='k_step_betmin_money' data-json='".addCommas($r_sport_step_min[1])."'>(".addCommas($r_sport_step_min[1])." - ".addCommas($step_betmin_money_max).") </span>
                    </div>
                </div>
                </div>
            </div>
            <div class='form-group'>
                <div class='col-xs-12 col-sm-12 col-md-12'>
                <label class='control-label col-xs-12 col-sm-6 col-md-4 no-padding-right' for='step_daymax_money'>{$lang_ag[811]} :</label>
                <div class='col-xs-12 col-sm-6 col-md-8'>
                    <div class='clearfix'>
                        <input type='text' name='step_daymax_money' id='step_daymax_money' class='numeric maxLimit' value='".addCommas($array_data["step_daymax_money"])."' onblur=\"chkMinMax(this,".$step_daymax_money_max.",".$r_sport_step_day[1].");\">
                        <span class='text-danger label-sm' id='k_step_daymax_money' data-json='".addCommas($r_sport_step_day[1])."'>(".addCommas($step_daymax_money_max)." - ".addCommas($r_sport_step_day[1]).") </span>
                    </div>
                </div>
                </div>
            </div>
            <div class='form-group'>
                <div class='col-xs-12 col-sm-12 col-md-12'>
                <label class='control-label col-sm-6 col-md-4 no-padding-right' for='step_billmax_money'>{$lang_ag[814]} :</label>
                <div class='col-xs-12 col-sm-6 col-md-8'>
                    <div class='clearfix'>
                        <input type='text' name='step_billmax_money' id='step_billmax_money' class='numeric maxLimit' value='".addCommas($array_data["step_billmax_money"])."' onblur=\"chkMinMax(this,".$step_billmax_money_max.",".$r_sport_step_paymax[1].");\">
                        <span class='text-danger label-sm' id='k_step_billmax_money' data-json='".addCommas($r_sport_step_paymax[1])."'>(".addCommas($step_billmax_money_max)." - ".addCommas($r_sport_step_paymax[1]).") </span>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class='col-xs-12 col-sm-4 col-md-4'>
            <div class='form-group'>
                <div class='col-xs-12 col-sm-12 col-md-12'>
                <label class='control-label col-sm-6 col-md-4 no-padding-right' for='step_min_pair'>{$lang_ag[829]} :</label>
                <div class='col-xs-12 col-sm-6 col-md-8'>
                    <div class='clearfix'>
                        <select class='form-control sl-width input-sm sl_step' id='step_min_pair' name='step_min_pair'  onchange=\"change_set_min_pair(".intval($r_sport_step2[1]).",".intval($r_sport_step2[2]).");\" >";                    
                            for($i=intval($r_sport_step2[1]);$i<=intval($r_sport_step2[2]);$i++)
                            {
                                $sl_row = "";
                                $sl_row = ($array_data["step_min_pair"] == $i) ? "selected='selected'" : "";
                                $data["temp"] .= "<option value='{$i}' {$sl_row} >{$i} </option>";
                            } 

                    $data["temp"] .="</select>
                        <span class='hidden' id='k_step_min_pair' data-json='".intval($r_sport_step2[1])."'></span>
                    </div>
                </div>
                </div>
            </div>
            <div class='form-group'>
                <div class='col-xs-12 col-sm-12 col-md-12'>
                <label class='control-label col-sm-6 col-md-4 no-padding-right' for='step_max_pair'>{$lang_ag[827]} :</label>
                <div class='col-xs-12 col-sm-6 col-md-8'>
                    <div class='clearfix'>
                        <select class='form-control sl-width input-sm sl_step' id='step_max_pair' name='step_max_pair' onchange=\"change_set_min_pair(".intval($r_sport_step2[1]).",".intval($r_sport_step2[2]).");\" >";
                             
                            $array_data["step_max_pair"] = ($array_data["step_max_pair"] == "") ? intval($r_sport_step2[1]) : $array_data["step_max_pair"];
                            for($i=intval($r_sport_step2[2]);$i>=(intval($r_sport_step2[1])+1);$i--)
                            {
                                $sl_row = "";
                                $sl_row = ($array_data["step_max_pair"] == $i) ? "selected='selected'" : "";
                                $data["temp"] .= "<option value='{$i}' {$sl_row} >{$i}</option>";
                            } 
            $data["temp"] .="</select>
                        <span class='hidden' id='k_step_max_pair' data-json='".intval($r_sport_step2[2])."'></span>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class='col-xs-12 col-sm-4 col-md-4' id='test'>
           
        </div>

        <div class='form-group'>
         
        </div>
        </div>
        <div id='step_alerts'></div>
<script>
var r_open_agent = '{$r_open_agent}';
if(r_open_agent == 1){
    $('#step_body').show();
    $('#step_alerts').hide();
  }
  else{
    $('#step_today').hide();
    $('#setMax_step').hide();
    $('#step_body').hide();
    $('#step_alerts').append(html_alerts);
  }
  </script>
       
";



echo json_encode($data);

 ?>