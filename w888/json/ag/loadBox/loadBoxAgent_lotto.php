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
$r_lotto_pay2   = explode(",", $_SESSION["agent_data"]["r_lotto_pay2"]);
$r_lotto_dis2   = explode(",", $_SESSION["agent_data"]["r_lotto_dis2"]);
$r_lotto_pay3   = explode(",", $_SESSION["agent_data"]["r_lotto_pay3"]);
$r_lotto_dis3   = explode(",", $_SESSION["agent_data"]["r_lotto_dis3"]);

$r_lotto_hun_share   = explode(",", $_SESSION["agent_data"]["r_lotto_hun_share"]);
$r_lotto_hun_pay1   = explode(",", $_SESSION["agent_data"]["r_lotto_hun_pay1"]);
$r_lotto_hun_dis1   = explode(",", $_SESSION["agent_data"]["r_lotto_hun_dis1"]);
$r_lotto_hun_pay2   = explode(",", $_SESSION["agent_data"]["r_lotto_hun_pay2"]);
$r_lotto_hun_dis2   = explode(",", $_SESSION["agent_data"]["r_lotto_hun_dis2"]);
$r_lotto_hun_pay3   = explode(",", $_SESSION["agent_data"]["r_lotto_hun_pay3"]);
$r_lotto_hun_dis3   = explode(",", $_SESSION["agent_data"]["r_lotto_hun_dis3"]);

$r_lotto_hun_set_pay   = explode(",", $_SESSION["agent_data"]["r_lotto_hun_set_pay"]);
$r_lotto_hun_set_price   = explode(",", $_SESSION["agent_data"]["r_lotto_hun_set_price"]);

$r_games_dis   = explode(",", $_SESSION["agent_data"]["r_games_dis"]);
$r_games_share   = explode(",", $_SESSION["agent_data"]["r_games_share"]);
$r_games_myshare   = explode(",", $_SESSION["agent_data"]["r_games_myshare"]);

$r_casino_share = explode(",", $_SESSION["agent_data"]["r_casino_share"]);
$r_casino_max   = explode(",", $_SESSION["agent_data"]["r_casino_max"]);


    $array_data = $_POST["arr"];  

    $lotto_active = ($array_data["lotto_active"] == 1) ? "checked=''" : "";
    
    $chk1 = ($array_data["r_lotto_open"][1] == 1) ? "checked=''" : "";
    $chk2 = ($array_data["r_lotto_open"][2] == 1) ? "checked=''" : "";
    $chk3 = ($array_data["r_lotto_open"][3] == 1) ? "checked=''" : "";

    $r_open_agent = $array_data["r_open_agent"];
    
    // $lotto_share_max[$key] =  (max($array_data["lotto_share_max"][$key]) == "") ? 0 : max($array_data["lotto_share_max"][$key]);
    $lotto_share_max =  ($array_data["lotto_share_max"] == "") ? 0 : $array_data["lotto_share_max"];

    $data["arr"]["lotto"] = $array_data;
    $data["lotto_type"] = $lot_type[$_SESSION["AGlang"]][1];
   

    $data["temp"] = "<div class='widget-main no-padding'>
    <div class='form-group'>
      <div class='col-xs-12 col-sm-12 col-md-12'>
        <div class='form-inline pull-left'>
          <label class='inline'>
          <div id='lotto_today'>
            <input type='checkbox' class='ace' id='lotto_active' name='lotto_active' {$lotto_active}>
            <span class='lbl'> {$lang_memberAgent[18]} </span>
          </div>
          </label>
        </div>
        <div id='setMax_lotto' class='form-inline pull-right'>
          <button type='button' class='btn btn-white btn-warning btn-bold btn-sm' onclick=\"setMax('lotto');\">{$lang_memberAgent[25]}</button>
        </div> 
      </div>
    </div>
    <div id='lotto_body'>
    <div class='form-group'>
	    <div class='col-xs-12 col-sm-4 col-md-2'>
	        <label class='control-label col-xs-12 col-sm-6 col-md-6 no-padding-right' for='7_lotto_share'>{$lang_memberAgent[43]} :</label>
	        <div class='col-xs-12 col-sm-6 col-md-6'>
	            <div class='clearfix input-group'>
	                <select class='form-control input-sm sl_lotto_share' id='7_lotto_share' name='lotto_share' onchange=\"setKeep('7_lotto_share');\">";
                            for($i=$lotto_share_max;$i<=intval($r_lotto_share[1]);$i++)
                            {
                                $sl_row = "";
                                $sl_row = ($array_data["lotto_share"] == $i) ? "selected='selected'" : "";
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
	            {$lang_memberAgent[27]} : <span id='k_7_lotto_share' data-json='".$r_sport_share[1]."'> ".$array_data["k_7_lotto_share"]." </span> %
	        </label>
	    </div>
	</div>
                        <div class='form-group'>";

            $data["temp"].="<div class='col-xs-4'>
                                <div class='widget-box'>
                                    <div class='widget-body'>
                                        <div class='table-responsive'>
                                            <table class='table table-bordered table-hover'>
                                                <thead>
                                                    <tr>
                                                      <th colspan='100%'>
                                                          <div id='lotto_typeA' style='text-align: center; height: 40px; line-height: 40px;'>
                                                                 <input type='checkbox' class='ace' id='lotto_typeAOpen' name='lotto_typeAOpen' style='height: 23px;' ".$chk1.">
                                                                  <span class='lbl'> แบบ A </span>
                                                          </div>
                                                      </th>
                                                    </tr>
                                                    <tr>
                                                        <th class='text-center'>{$lang_memberMember[48]}</th>
                                                        <th class='text-center'>{$lang_memberMember[49]}</th>
                                                        <th class='text-center'>{$lang_memberMember[50]}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>";
  
                          foreach ($data["lotto_type"] as $key => $value) {
                                     // ค่าต่ำสุดของ user ภายใต้ ที่ตั้งไว้                                   
                                    $lotto_pay1_max[$key] =  ($array_data["lotto_pay1_max"][$key] == "") ? 0 : $array_data["lotto_pay1_max"][$key];  
                                    $lotto_dis1_min[$key] =  ($array_data["lotto_dis1_max"][$key] == "") ? 0 : $array_data["lotto_dis1_max"][$key];  

                                    $data["temp"].="<tr class='text-center'> 
                                                        <td width='35%'>{$value}</td>
                                                        <td width='30%'>
                                                            <input type='text' name='lotto_pay1_".$key."' id='lotto_pay1_".$key."'  class='numeric input-num2digt maxLimit' value='".$array_data["lotto_pay1"][$key]."' onblur=\"chkMinMax(this,".$lotto_pay1_max[$key].",".$r_lotto_pay1[$key].");\">
                                                            <br>
                                                            <span class='text-danger label-sm maxtransfer' id='lotto_pay_info' data-json='".$r_lotto_pay1[$key]."'>(".addCommas($lotto_pay1_max[$key])." - ".addCommas($r_lotto_pay1[$key]).") </span>
                                                        </td>
                                                        <td width='35%'>
                                                            <div class='col-xs-12 col-sm-12 col-md-12'>
                                                                <div class='clearfix  input-group'>
                                                                  <select class='form-control input-sm sl_lotto_com' id='7_{$key}_lotto_com1' name='lotto_com1_{$key}'>";
                                                                    for($i=intval($lotto_dis1_min[$key]);$i<=intval($r_lotto_dis1[$key]);$i++){
                                                                        $sl_row = "";
                                                                        $sl_row = ($array_data["lotto_dis1"][$key] == $i) ? "selected='selected'" : "";
                                                                        $data["temp"].="<option value='{$i}' {$sl_row} >{$i}</option>";
                                                                    }
                                                                  $data["temp"].="</select>
                                                                  <span class='input-group-addon' id='k_7_{$key}_lotto_com1' data-json='".intval($r_lotto_dis1[$key])."'>%</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                      </tr>";
                            }             

                                       $data["temp"].="</tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>";

            $data["temp"].="<div class='col-xs-4'>
                                <div class='widget-box'>
                                    <div class='widget-body'>
                                        <div class='table-responsive'>
                                            <table class='table table-bordered table-hover'>
                                                <thead>
                                                    <tr>
                                                      <th colspan='100%'>
                                                          <div id='lotto_typeB' style='text-align: center; height: 40px; line-height: 40px;'>
                                                                 <input type='checkbox' class='ace' id='lotto_typeBOpen' name='lotto_typeBOpen' style='height: 23px;' ".$chk2.">
                                                                  <span class='lbl'> แบบ B </span>
                                                          </div>
                                                      </th>
                                                    </tr>
                                                    <tr>
                                                        <th class='text-center'>{$lang_memberMember[48]}</th>
                                                        <th class='text-center'>{$lang_memberMember[49]}</th>
                                                        <th class='text-center'>{$lang_memberMember[50]}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>";
  
                          foreach ($data["lotto_type"] as $key => $value) {
                                     // ค่าต่ำสุดของ user ภายใต้ ที่ตั้งไว้                                   
                                    $lotto_pay2_max[$key] =  ($array_data["lotto_pay2_max"][$key] == "") ? 0 : $array_data["lotto_pay2_max"][$key];  
                                    $lotto_dis2_min[$key] =  ($array_data["lotto_dis2_max"][$key] == "") ? 0 : $array_data["lotto_dis2_max"][$key];  

                                    $data["temp"].="<tr class='text-center'> 
                                                        <td width='35%'>{$value}</td>
                                                        <td width='30%'>
                                                            <input type='text' name='lotto_pay2_".$key."' id='lotto_pay2_".$key."'  class='numeric input-num2digt maxLimit' value='".$array_data["lotto_pay2"][$key]."' onblur=\"chkMinMax(this,".$lotto_pay2_max[$key].",".$r_lotto_pay2[$key].");\">
                                                            <br>
                                                            <span class='text-danger label-sm maxtransfer' id='lotto_pay_info' data-json='".$r_lotto_pay2[$key]."'>(".addCommas($lotto_pay2_max[$key])." - ".addCommas($r_lotto_pay2[$key]).") </span>
                                                        </td>
                                                        <td width='35%'>
                                                            <div class='col-xs-12 col-sm-12 col-md-12'>
                                                                <div class='clearfix  input-group'>
                                                                  <select class='form-control input-sm sl_lotto_com' id='7_{$key}_lotto_com2' name='lotto_com2_{$key}'>";
                                                                    for($i=intval($lotto_dis2_min[$key]);$i<=intval($r_lotto_dis2[$key]);$i++){
                                                                        $sl_row = "";
                                                                        $sl_row = ($array_data["lotto_dis2"][$key] == $i) ? "selected='selected'" : "";
                                                                        $data["temp"].="<option value='{$i}' {$sl_row} >{$i}</option>";
                                                                    }
                                                                  $data["temp"].="</select>
                                                                  <span class='input-group-addon' id='k_7_{$key}_lotto_com2' data-json='".intval($r_lotto_dis2[$key])."'>%</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                      </tr>";
                            }             

                                       $data["temp"].="</tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>"; 

            $data["temp"].="<div class='col-xs-4'>
                                <div class='widget-box'>
                                    <div class='widget-body'>
                                        <div class='table-responsive'>
                                            <table class='table table-bordered table-hover'>
                                                <thead>
                                                    <tr>
                                                      <th colspan='100%'>
                                                          <div id='lotto_typeC' style='text-align: center; height: 40px; line-height: 40px;'>
                                                                 <input type='checkbox' class='ace' id='lotto_typeCOpen' name='lotto_typeCOpen' style='height: 23px;' ".$chk2.">
                                                                  <span class='lbl'> แบบ C </span>
                                                          </div>
                                                      </th>
                                                    </tr>
                                                    <tr>
                                                        <th class='text-center'>{$lang_memberMember[48]}</th>
                                                        <th class='text-center'>{$lang_memberMember[49]}</th>
                                                        <th class='text-center'>{$lang_memberMember[50]}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>";
  
                          foreach ($data["lotto_type"] as $key => $value) {
                                     // ค่าต่ำสุดของ user ภายใต้ ที่ตั้งไว้                                   
                                    $lotto_pay3_max[$key] =  ($array_data["lotto_pay3_max"][$key] == "") ? 0 : $array_data["lotto_pay3_max"][$key];  
                                    $lotto_dis3_min[$key] =  ($array_data["lotto_dis3_max"][$key] == "") ? 0 : $array_data["lotto_dis3_max"][$key];  

                                    $data["temp"].="<tr class='text-center'> 
                                                        <td width='35%'>{$value}</td>
                                                        <td width='30%'>
                                                            <input type='text' name='lotto_pay3_".$key."' id='lotto_pay3_".$key."'  class='numeric input-num2digt maxLimit' value='".$array_data["lotto_pay3"][$key]."' onblur=\"chkMinMax(this,".$lotto_pay3_max[$key].",".$r_lotto_pay3[$key].");\">
                                                            <br>
                                                            <span class='text-danger label-sm maxtransfer' id='lotto_pay_info' data-json='".$r_lotto_pay3[$key]."'>(".addCommas($lotto_pay3_max[$key])." - ".addCommas($r_lotto_pay3[$key]).") </span>
                                                        </td>
                                                        <td width='35%'>
                                                            <div class='col-xs-12 col-sm-12 col-md-12'>
                                                                <div class='clearfix  input-group'>
                                                                  <select class='form-control input-sm sl_lotto_com' id='7_{$key}_lotto_com3' name='lotto_com3_{$key}'>";
                                                                    for($i=intval($lotto_dis3_min[$key]);$i<=intval($r_lotto_dis3[$key]);$i++){
                                                                        $sl_row = "";
                                                                        $sl_row = ($array_data["lotto_dis3"][$key] == $i) ? "selected='selected'" : "";
                                                                        $data["temp"].="<option value='{$i}' {$sl_row} >{$i}</option>";
                                                                    }
                                                                  $data["temp"].="</select>
                                                                  <span class='input-group-addon' id='k_7_{$key}_lotto_com3' data-json='".intval($r_lotto_dis3[$key])."'>%</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                      </tr>";
                            }             

                                       $data["temp"].="</tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>";  

                          
        $data["temp"].= "</div>
                    </div>
                    </div>
                    <div id='lotto_alerts'></div>
                    <script>
                    var r_open_agent = '{$r_open_agent}';
                    if(r_open_agent == 1){
                      $('#lotto_body').show();
                      $('#lotto_alerts').hide();
                    }
                    else{
                      $('#lotto_today').hide();
                      $('#setMax_lotto').hide();
                      $('#lotto_body').hide();
                      $('#lotto_alerts').append(html_alerts);
                    }
                  
                    </script>
                    ";
    echo json_encode($data);


 ?>