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
$r_games_max   = explode(",", $_SESSION["agent_data"]["r_games_max"]);
$r_games_min   = explode(",", $_SESSION["agent_data"]["r_games_min"]);


$r_casino_share = explode(",", $_SESSION["agent_data"]["r_casino_share"]);
$r_casino_max   = explode(",", $_SESSION["agent_data"]["r_casino_max"]);

    $array_data = $_POST["arr"]; 
    $game_active = ($array_data["game_active"] == 1) ? "checked=''" : "";

    $r_open_agent = $array_data["r_open_agent"];

    $game_share_max =  ($array_data["game_share_max"] == "") ? 0: intval($array_data["game_share_max"]);
    $game_com_max =  ($array_data["game_com_max"] == "") ? 0 : intval($array_data["game_com_max"]);
    $game_max_max =  ($array_data["game_max_max"] == "" || $array_data["game_max_max"] == 0) ? intval($max_betmin_money) : intval($array_data["game_max_max"]);
    $game_min_max =  ($array_data["game_min_max"] == "" || $array_data["game_min_max"] == 0) ? intval($max_betmin_money) : intval($array_data["game_min_max"]);
    
    $data["arr"]["game"] = $array_data;
    $data["temp"] =     " 

    <div class='form-group'>
    <div class='col-xs-12 col-sm-12 col-md-12'>
        <div class='form-inline pull-left'>
            <label class='inline'>
            <div id='game_today'>
                <input type='checkbox' class='ace' id='game_active' name='game_active' {$game_active} >
                <span class='lbl'>{$lang_ag[477]}</span>
            </div>
            </label>
        </div>
        <div id='setMax_game' class='form-inline pull-right'>
            <button type='button' class='btn btn-white btn-warning btn-bold btn-sm' onclick=\"setMax('game');\">
               {$lang_ag[1408]}
            </button>
        </div>
    </div>
</div>
<div id='game_body'>
<div class='form-group'>
    <div class='col-xs-12 col-sm-5 col-md-4'>
        <label class='control-label col-xs-12 col-sm-6 col-md-6 no-padding-right' for='game_share'>{$lang_ag[567]} :</label>
        <div class='col-xs-12 col-sm-6 col-md-6'>
            <div class='clearfix input-group'>
                <select class='form-control input-sm sl_game' id='game_share' name='game_share' onchange=\"setKeep('game_share');\">";
                            for($i=$game_share_max;$i<=intval($r_games_share[1]);$i++)
                            { 
                                $sl_row = "";
                                $sl_row = ($array_data["game_share"] == $i) ? "selected='selected'" : ""; 
                                $data["temp"] .= "<option value='{$i}' {$sl_row} >{$i}</option>";
                            } 
            $data["temp"] .="</select>
                <span class='input-group-addon'> % </span>
            </div>
        </div>
    </div>
    <div class='col-xs-12 col-sm-6 col-md-6'>
        <label class='control-label col-xs-12 col-sm-6 col-md-6 no-padding-right'>
            <span class='text-danger'>".$array_data["r_name"]."</span> 
            {$lang_ag[1402]} : 
            <span id='k_game_share' data-json='".$r_games_share[1]."'> ".$array_data["k_game_share"]." </span> %
        </label>
    </div>
</div>

<div class='row'>

    <div class='col-sm-12 col-md-4 col-xs-12'>
        <div class='form-group'>
            
                <label class='control-label col-xs-12 col-sm-6 col-md-6 no-padding-right' for='game_com'>{$lang_ag[210]} :</label>
                <div class='col-xs-12 col-sm-6 col-md-6'>
                    <div class='clearfix input-group'>
                        <select class='form-control input-sm sl_game' id='game_com' name='game_com'>";
                            for($i=$r_games_dis[1];$i>=$game_com_max;$i--)
                            {
                                $sl_row = "";
                                $sl_row = ($array_data["game_com"] == $i) ? "selected='selected'" : ""; 
                                $data["temp"] .= " <option value='".$i."' {$sl_row} >0.".$i."</option>";
                            }      
                    $data["temp"] .="</select>
                        <span class='input-group-addon' id='k_game_com' data-json='".intval($r_games_dis[1])."'>%</span>
                    </div>
                </div>
           
        </div>
    </div>

    <div class='col-sm-12 col-md-4'>  
        <div class='form-group'>
           
             <label class='control-label col-xs-12 col-sm-4 col-md-5 no-padding-right' for='rcb_maxtransfer'> $lang_ag[831] :</label>
             <div class='col-xs-12 col-sm-8 col-md-7'>
               <div class='clearfix casino_Input'>
                 <input type='text' name='game_max' id='game_max' class='numeric maxLimit input-num2digt' value='".$array_data["game_max"]."' onblur=\"chkMinMax(this,".$game_max_max.",".$r_games_max[1].");\">
                <span class='text-danger label-sm span_block' id='k_game_max' data-json='".addCommas($game_max_max)."'>(".addCommas($game_max_max)." - ".addCommas($r_games_max[1]).") </span>
               </div>
             </div>
           
        </div>
    </div>


    <div class='col-sm-12 col-md-4'>
        <div class='form-group'>
           
             <label class='control-label col-xs-12 col-sm-4 col-md-5 no-padding-right' for='rcb_mintransfer'> $lang_ag[1410] :</label>
             <div class='col-xs-12 col-sm-8 col-md-7'>
               <div class='clearfix casino_Input'>
                 <input type='text' name='game_min' id='game_min' class='numeric maxLimit input-num2digt' value='".$array_data["game_min"]."' onblur=\"chkMinMax(this,".$min_betmin_money.", ".$game_min_max.");\">
                  <span class='text-danger label-sm span_block' id='k_game_min' data-json='".addCommas($r_games_min[1])."'>( ".addCommas($min_betmin_money)." - ".addCommas($game_min_max).") </span>
               </div>
             </div>
           
        </div>
    </div>


</div>


</div>
<div id='game_alerts'></div>
<script>
var r_open_agent = '{$r_open_agent}';
if(r_open_agent == 1){
   $('#game_alerts').hide();
}
else{
   $('#game_today').hide();
   $('#setMax_game').hide();
   $('#game_body').hide();
   $('#game_alerts').append(html_alerts);
}
</script>
";
             echo json_encode($data);


 ?>