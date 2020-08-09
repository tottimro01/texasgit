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
    $sport_today_active = ($array_data["sport_today_active"] == 1) ? "checked=''" : "";
    $sport_live_active = ($array_data["sport_live_active"] == 1) ? "checked=''" : "";

    $r_open_agent = $array_data["r_open_agent"];

    $array_data["sporttoday_share"] = ($array_data["sporttoday_share"] == "") ? intval($r_sport_share[2]) : $array_data["sporttoday_share"];
    $array_data["k_sporttoday_share"] = ($array_data["k_sporttoday_share"] == "") ? intval($r_sport_share[2]) : $array_data["k_sporttoday_share"]; 
    $array_data["sport_betmax_money"] = ($array_data["sport_betmax_money"] == "") ? intval($r_sport_max[6]) : $array_data["sport_betmax_money"]; 
    $array_data["sport_betmin_money"] = ($array_data["sport_betmin_money"] == "") ? intval($r_sport_min[3]) : $array_data["sport_betmin_money"];
    $array_data["sport_com"] = ($array_data["sport_com"] == "") ? $r_sport_dis[2] : $array_data["sport_com"]; 

    $sport_betmoneymax_pair_max =  ($array_data["sport_betmoneymax_pair_max"] == "") ? 0 : intval($array_data["sport_betmoneymax_pair_max"]);
    $sport_betmax_money_max =  ($array_data["sport_betmax_money_max"] == "") ? intval($r_sport_min[3]) : intval($array_data["sport_betmax_money_max"]);
    $sport_betmin_money_max =  ($array_data["sport_betmin_money_max"] == "") ? intval($r_sport_max[3]) : intval($array_data["sport_betmin_money_max"]);
    $sporttoday_share_max =  ($array_data["sporttoday_share_max"] == "") ? 0 : intval($array_data["sporttoday_share_max"]);
    $sportlive_share_max =  ($array_data["sportlive_share_max"] == "") ? 0 : intval($array_data["sportlive_share_max"]);
    $sport_com_max =  ($array_data["sport_com_max"] == "") ? 0.00 : addCommas($array_data["sport_com_max"],2);


    $data["arr"]["sport"] = $array_data;    
    $data["temp"] = "
     <div class='form-group'>
         <div class='col-xs-12 col-sm-12 col-md-12'>
             <div class='form-inline pull-left'>
                 <label class='inline'>
                    <div id='sport_today'>
                        <input type='checkbox' class='ace' id='sport_today_active' name='sport_today_active' {$sport_today_active} >
                        <span class='lbl'> {$lang_memberAgent[37]}</span>
                    </div>
                 </label> &nbsp;
                 <label class='inline'>
                    <div id='sport_live_active'>
                        <input type='checkbox' class='ace' name='sport_live_active' {$sport_live_active}>
                        <span class='lbl'> {$lang_memberAgent[38]}</span>
                    </div>
                 </label>
             </div>
             <div id='setMax_sport' class='form-inline pull-right'>
                 <button type='button' class='btn btn-white btn-warning btn-bold btn-sm' onclick=\"setMax('sport');\">
                    {$lang_memberAgent[25]}
                 </button>
             </div>
         </div>
     </div>
     <div id='sport_body'>
    <div class='form-group'>
        <div class='col-xs-12 col-sm-6 col-md-6'>
            <label class='control-label col-xs-12 col-sm-6 col-md-6 no-padding-right' for='sporttoday_share'>{$lang_memberAgent[39]} :</label>
            <div class='col-xs-12 col-sm-6 col-md-6'>
                <div class='clearfix input-group'>
                    <select class='form-control input-sm sl_sport' id='sporttoday_share' name='sporttoday_share' onchange=\"setKeep('sporttoday_share');\">";
                            for($i=$sporttoday_share_max;$i<=intval($r_sport_share[2]);$i++)
                            {
                                $sl_row = "";
                                $sl_row = ($array_data["sporttoday_share"] == $i) ? "selected='selected'" : "";
                                $data["temp"] .= "<option value='{$i}' {$sl_row} >{$i}</option>";
                            } 
            $data["temp"] .="</select>
                    <span class='input-group-addon'>% </span>
                </div>
            </div>
        </div>
        <div class='col-xs-12 col-sm-6 col-md-6'>
            <label class='control-label col-xs-12 col-sm-6 col-md-6 no-padding-right'>
                <span class='text-danger'>
                    ".$array_data["r_name"]." 
                </span> 
                {$lang_memberAgent[27]} :
                <span id='k_sporttoday_share' data-json='".$r_sport_share[2]."'> ".$array_data["k_sporttoday_share"]." </span> %
            </label>
        </div>
    </div>
    <div class='form-group'>
        <div class='col-xs-12 col-sm-6 col-md-6'>
            <label class='control-label col-xs-12 col-sm-6 col-md-6 no-padding-right' for='sportlive_share'>{$lang_memberAgent[28]} :</label>
            <div class='col-xs-12 col-sm-6 col-md-6'>
                <div class='clearfix input-group'>
                    <select class='form-control input-sm sl_sport' id='sportlive_share' name='sportlive_share' onchange=\"setKeep('sportlive_share');\" >";
                            for($i=$sportlive_share_max;$i<=intval($r_sport_share_live[2]);$i++)
                            {
                                $sl_row = "";
                                $sl_row = ($array_data["sportlive_share"] == $i) ? "selected='selected'" : "";
                                $data["temp"] .= "<option value='{$i}' {$sl_row}>{$i}</option>";
                            } 
            $data["temp"] .="</select>
                    <span class='input-group-addon'>
                        %
                    </span>
                </div>
            </div>
        </div>
        <div class='col-xs-12 col-sm-6 col-md-6'>
            <label class='control-label col-xs-12 col-sm-6 col-md-6 no-padding-right'>
                <span class='text-danger'>".$array_data["r_name"]."</span> 
                {$lang_memberAgent[27]} : 
                <span id='k_sportlive_share' data-json='".$r_sport_share_live[2]."'> ".$array_data["k_sportlive_share"]." </span> %
            </label>
        </div>
    </div>

    <div class='form-group'>
       <div class='col-xs-12 col-sm-4 col-md-4'>
           <label class='control-label col-xs-12 col-sm-6 col-md-4 no-padding-right' for='sport_com'>{$lang_memberAgent[29]} :</label>
           <div class='col-xs-12 col-sm-6 col-md-8'>
               <div class='clearfix input-group'>
                   <select class='form-control input-sm sl_sport' id='sport_com' name='sport_com'>";  
                        for($x=0;$x<=400;$x++){
                            $num=number_format($x*0.05,2);
                            $rnum=number_format($r_sport_dis[2],2);
                             if($num <= $rnum && $num >= $sport_com_max)
                             {
                                 $sl_row = "";
                                 $sl_row = (number_format($array_data["sport_com"],2) == $num) ? "selected='selected'" : "";
                                 $data["temp"] .= "<option value='".$num."' {$sl_row} >".$num."</option>";
                             }
                        }
  $data["temp"] .="</select>
                   <span class='input-group-addon' id='k_sport_com' data-json='".number_format($r_sport_dis[2],2)."'>%</span>
               </div>
           </div>
       </div>
    </div>
    <div class='form-group'>
       <div class='col-xs-12 col-sm-4 col-md-4'>
            <label class='control-label col-xs-12 col-sm-6 col-md-4 no-padding-right' for='sport_betmoneymax_pair'>{$lang_memberAgent[40]} :</label>
            <div class='col-xs-12 col-sm-6 col-md-8'>
                <div class='clearfix'>
                    <input type='text' name='sport_betmoneymax_pair' id='sport_betmoneymax_pair' class='numeric maxLimit input-num2digt' value='".addCommas($array_data["sport_betmoneymax_pair"])."' onblur=\"chkMinMax(this,".$sport_betmoneymax_pair_max.",".intval($r_sport_max[5]).");\">
                    <span class='text-danger label-sm' id='k_sport_betmoneymax_pair'data-json='".addCommas($r_sport_max[5])."'>(".addCommas($sport_betmoneymax_pair_max)." - ".addCommas($r_sport_max[5]).") </span>
                </div>
            </div>
        </div>
        <div class='col-xs-12 col-sm-4 col-md-4'>
            <label class='control-label col-xs-12 col-sm-6 col-md-4 no-padding-right' for='sport_betmax_money'>{$lang_memberAgent[41]} :</label>
            <div class='col-xs-12 col-sm-6 col-md-8'>
                <div class='clearfix'>
                    <input type='text' name='sport_betmax_money' id='sport_betmax_money' class='numeric maxLimit input-num2digt' value='".addCommas($array_data["sport_betmax_money"])."' onblur=\"chkMinMax(this,".$sport_betmax_money_max.",".intval($r_sport_max[6]).");\">
                    <span class='text-danger label-sm' id='k_sport_betmax_money' data-json='".addCommas($r_sport_max[6])."'>(".addCommas($sport_betmax_money_max)." - ".addCommas($r_sport_max[6]).") </span>
                </div>
            </div>
        </div>
        <div class='col-xs-12 col-sm-4 col-md-4'>
            <label class='control-label col-xs-12 col-sm-6 col-md-4 no-padding-right' for='sport_betmin_money'>{$lang_memberAgent[42]} :</label>
            <div class='col-xs-12 col-sm-6 col-md-8'>
                <div class='clearfix'>
                    <input type='text' name='sport_betmin_money' id='sport_betmin_money' class='numeric minLimit input-num2digt' value='".addCommas($array_data["sport_betmin_money"])."' onblur=\"chkMinMax(this,".intval($r_sport_min[3]).",".intval($r_sport_max[3]).");\">
                    <span class='text-danger label-sm' id='k_sport_betmin_money' data-json='".addCommas($r_sport_min[3])."'>(".addCommas($r_sport_min[3])." - ".addCommas($sport_betmin_money_max).") </span>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div id='sport_alerts'></div>
<script>
var r_open_agent = '{$r_open_agent}';
if(r_open_agent == 1){
    $('#sport_body').show();
    $('#sport_alerts').hide();
  }
  else{
    $('#sport_today').hide();
    $('#sport_live_active').hide();
    $('#setMax_sport').hide();
    $('#sport_body').hide();
    $('#sport_alerts').append(html_alerts);
  }
  </script>
";

echo json_encode($data);

 ?>