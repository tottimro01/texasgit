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
    $boxing_today_active = ($array_data["boxing_today_active"] == 1) ? "checked=''" : "";
    $boxing_live_active = ($array_data["boxing_live_active"] == 1) ? "checked=''" : "";

    $r_open_agent = $array_data["r_open_agent"];

    $array_data["boxingtoday_share"] = ($array_data["boxingtoday_share"] == "") ? intval($r_sport_share[3]) : $array_data["boxingtoday_share"];
    $array_data["k_sporttoday_share"] = ($array_data["k_sporttoday_share"] == "") ? intval($r_sport_share[3]) : $array_data["k_sporttoday_share"]; 
    $array_data["boxing_betmax_money"] = ($array_data["boxing_betmax_money"] == "") ? intval($r_sport_max[8]) : $array_data["boxing_betmax_money"]; 
    $array_data["boxing_betmin_money"] = ($array_data["boxing_betmin_money"] == "") ? intval($r_sport_min[4]) : $array_data["boxing_betmin_money"];

    $array_data["boxing_com"] = ($array_data["boxing_com"] == "") ? $r_sport_dis[3] : $array_data["boxing_com"]; 

    $array_data["boxinglive_share"] = ($array_data["boxinglive_share"] == "") ? intval($r_sport_share_live[3]) : $array_data["boxinglive_share"];

    
    $boxing_betmoneymax_pair =  ($array_data["boxing_betmoneymax_pair"] == "") ? 0 : intval($array_data["boxing_betmoneymax_pair"]);
    $boxing_betmoneymax_pair_max =  ($array_data["boxing_betmoneymax_pair_max"] == "") ? 0 : intval($array_data["boxing_betmoneymax_pair_max"]);

    $boxing_betmax_money_max =  ($array_data["boxing_betmax_money_max"] == "") ? intval($r_sport_min[4]) : intval($array_data["boxing_betmax_money_max"]);

    $boxing_betmin_money_max =  ($array_data["boxing_betmin_money_max"] == "") ? intval($r_sport_max[8]) : intval($array_data["boxing_betmin_money_max"]);

    $sporttoday_share_max =  ($array_data["sporttoday_share_max"] == "") ? 0 : intval($array_data["sporttoday_share_max"]);
    $sportlive_share_max =  ($array_data["sportlive_share_max"] == "") ? 0 : intval($array_data["sportlive_share_max"]);
    $boxing_com_max =  ($array_data["boxing_com_max"] == "") ? 0.00 : addCommas($array_data["boxing_com_max"],2);


    $data["arr"]["sport"] = $array_data;    
    $data["temp"] = "
     <div class='form-group'>
         <div class='col-xs-12 col-sm-12 col-md-12'>
             <div class='form-inline pull-left'>
                 <label class='inline'>
                    <div id='boxing_today'>
                        <input type='checkbox' class='ace' id='boxing_today_active' name='boxing_today_active' {$boxing_today_active} >
                        <span class='lbl'> {$lang_memberAgent[103]}</span>
                    </div>
                 </label> &nbsp;
                 <label class='inline'>
                    <div id='boxing_live_active'>
                        <input type='checkbox' class='ace' name='boxing_live_active' {$boxing_live_active}>
                        <span class='lbl'> {$lang_memberAgent[104]}</span>
                    </div>
                 </label>
             </div>
             <div id='setMax_boxing' class='form-inline pull-right'>
                 <button type='button' class='btn btn-white btn-warning btn-bold btn-sm' onclick=\"setMax('boxing');\">
                    {$lang_memberAgent[25]}
                 </button>
             </div>
         </div>
     </div>
     <div id='boxing_body'>
    <div class='form-group'>
        <div class='col-xs-12 col-sm-6 col-md-6'>
            <label class='control-label col-xs-12 col-sm-6 col-md-6 no-padding-right' for='boxingtoday_share'>{$lang_memberAgent[105]} :</label>
            <div class='col-xs-12 col-sm-6 col-md-6'>
                <div class='clearfix input-group'>
                    <select class='form-control input-sm sl_boxing' id='boxingtoday_share' name='boxingtoday_share' onchange=\"setKeep('boxingtoday_share');\">";
                            for($i=$sporttoday_share_max;$i<=intval($r_sport_share[3]);$i++)
                            {
                                $sl_row = "";
                                $sl_row = ($array_data["boxingtoday_share"] == $i) ? "selected='selected'" : "";
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
                <span id='k_boxingtoday_share' data-json='".$r_sport_share[3]."'> ".$array_data["k_boxingtoday_share"]." </span> %
            </label>
        </div>
    </div>
    <div class='form-group'>
        <div class='col-xs-12 col-sm-6 col-md-6'>
            <label class='control-label col-xs-12 col-sm-6 col-md-6 no-padding-right' for='boxinglive_share'>{$lang_memberAgent[106]} :</label>
            <div class='col-xs-12 col-sm-6 col-md-6'>
                <div class='clearfix input-group'>
                    <select class='form-control input-sm sl_boxing' id='boxinglive_share' name='boxinglive_share' onchange=\"setKeep('boxinglive_share');\" >";
                            for($i=$sportlive_share_max;$i<=intval($r_sport_share_live[3]);$i++)
                            {
                                $sl_row = "";
                                $sl_row = ($array_data["boxinglive_share"] == $i) ? "selected='selected'" : "";
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
                <span id='k_boxinglive_share' data-json='".$r_sport_share_live[3]."'> ".$array_data["k_boxinglive_share"]." </span> %
            </label>
        </div>
    </div>

    <div class='form-group'>
       <div class='col-xs-12 col-sm-4 col-md-4'>
           <label class='control-label col-xs-12 col-sm-6 col-md-4 no-padding-right' for='boxing_com'>{$lang_memberAgent[29]} :</label>
           <div class='col-xs-12 col-sm-6 col-md-8'>
               <div class='clearfix input-group'>
                   <select class='form-control input-sm sl_boxing' id='boxing_com' name='boxing_com'>"; 
                     
                        for($x=0;$x<=400;$x++){
                            $num=number_format($x*0.05,2);
                            $rnum=number_format($r_sport_dis[3],2);
                             if($num <= $rnum && $num >= $boxing_com_max)
                             {
                                 $sl_row = "";
                                 $sl_row = (number_format($array_data["boxing_com"],2) == $num) ? "selected='selected'" : "";
                                 $data["temp"] .= "<option value='".$num."' {$sl_row} >".$num."</option>";
                             }
                        }
  $data["temp"] .="</select>
                   <span class='input-group-addon' id='k_boxing_com' data-json='".number_format($r_sport_dis[2],2)."'>%</span>
               </div>
           </div>
       </div>
    </div>
    <div class='form-group'>
       <div class='col-xs-12 col-sm-4 col-md-4'>
            <label class='control-label col-xs-12 col-sm-6 col-md-4 no-padding-right' for='boxing_betmoneymax_pair'>{$lang_memberAgent[40]} :</label>
            <div class='col-xs-12 col-sm-6 col-md-8'>
                <div class='clearfix'>
                    <input type='text' name='boxing_betmoneymax_pair' id='boxing_betmoneymax_pair' class='numeric maxLimit input-num2digt' value='".addCommas($array_data["boxing_betmoneymax_pair"])."' onblur=\"chkMinMax(this,".$boxing_betmoneymax_pair_max.",".intval($r_sport_max[7]).");\">
                    <span class='text-danger label-sm' id='k_boxing_betmoneymax_pair'data-json='".addCommas($r_sport_max[7])."'>(".addCommas($boxing_betmoneymax_pair_max)." - ".addCommas($r_sport_max[7]).") </span>
                </div>
            </div>
        </div>
        <div class='col-xs-12 col-sm-4 col-md-4'>
            <label class='control-label col-xs-12 col-sm-6 col-md-4 no-padding-right' for='boxing_betmax_money'>{$lang_memberAgent[41]} :</label>
            <div class='col-xs-12 col-sm-6 col-md-8'>
                <div class='clearfix'>
                    <input type='text' name='boxing_betmax_money' id='boxing_betmax_money' class='numeric maxLimit input-num2digt' value='".addCommas($array_data["boxing_betmax_money"])."' onblur=\"chkMinMax(this,".$boxing_betmax_money_max.",".intval($r_sport_max[8]).");\">
                    <span class='text-danger label-sm' id='k_boxing_betmax_money' data-json='".addCommas($r_sport_max[8])."'>(".addCommas($boxing_betmax_money_max)." - ".addCommas($r_sport_max[8]).") </span>
                </div>
            </div>
        </div>
        <div class='col-xs-12 col-sm-4 col-md-4'>
            <label class='control-label col-xs-12 col-sm-6 col-md-4 no-padding-right' for='boxing_betmin_money'>{$lang_memberAgent[42]} :</label>
            <div class='col-xs-12 col-sm-6 col-md-8'>
                <div class='clearfix'>
                    <input type='text' name='boxing_betmin_money' id='boxing_betmin_money' class='numeric minLimit input-num2digt' value='".addCommas($array_data["boxing_betmin_money"])."' onblur=\"chkMinMax(this,".intval($r_sport_min[4]).",".intval($r_sport_max[8]).");\">
                    <span class='text-danger label-sm' id='k_boxing_betmin_money' data-json='".addCommas($r_sport_min[4])."'>(".addCommas($r_sport_min[4])." - ".addCommas($boxing_betmin_money_max).") </span>
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
    $('#setMax_boxing').hide();
    $('#boxing_body').hide();
    $('#boxing_alerts').append(html_alerts);
  }
  </script>
";

echo json_encode($data);

 ?>