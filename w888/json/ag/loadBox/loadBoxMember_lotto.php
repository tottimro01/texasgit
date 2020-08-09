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

$r_open_agent = $array_data["r_open_agent"];
$lotto_active = ($array_data["lotto_active"] == 1) ? "checked=''" : "";

$chk1 = ($array_data["m_lotto_open"][1] == 1) ? "checked=''" : "";
$chk2 = ($array_data["m_lotto_open"][2] == 1) ? "checked=''" : "";
$chk3 = ($array_data["m_lotto_open"][3] == 1) ? "checked=''" : "";


    $data["lotto_type"] = $lot_type[$_SESSION["AGlang"]][1];
  
	$data["temp"] = "<div class='widget-main no-padding'>
	<div class='form-group'>
                              <div class='col-xs-12 col-sm-12 col-md-12'>
                                <div class='form-inline pull-left'>
                                  <label class='inline'>
                                  <div id='lotto_today'>
                                    <input type='checkbox' class='ace' id='lotto_active' name='lotto_active' {$lotto_active} >
                                    <span class='lbl'> {$lang_memberMember[17]} </span>
                                    </div>
                                  </label>
                                </div>
                                <div id='setMax_lotto' class='form-inline pull-right'>
                                  <button type='button' class='btn btn-white btn-warning btn-bold btn-sm' onclick=\"setMax('lotto');\">{$lang_memberMember[24]}</button>
                                </div> 
                              </div>
                            </div>
                            <div id='lotto_body'>
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
                                                          <input type='checkbox' class='ace' id='lotto_typeAOpen' name='lotto_typeAOpen' style='height: 23px;' ".$chk1." >
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
                            $data["temp"].="<tr class='text-center'>
                                              <td width='35%'>{$value}</td>
                                              <td width='30%'>
                                                  <input type='text' name='lotto_pay1_".$key."' id='lotto_pay1_".$key."'  class='numeric maxLimit input-num2digt' value='".addCommas($array_data["lotto_pay1"][$key])."' onblur=\"chkMinMax(this,0,".$r_lotto_pay1[$key].");\">
                                                  <br>
                                                  <span class='text-danger label-sm maxtransfer' id='lotto_pay_info' data-json='".$r_lotto_pay1[$key]."'>(0-".$r_lotto_pay1[$key].") </span>
                                              </td>
                                              <td width='35%'>
                                                  <div class='col-xs-12 col-sm-12 col-md-12'>
                                                      <div class='clearfix  input-group'>
                                                        <select class='form-control input-sm sl_lotto_com' id='7_{$key}_lotto_com1' name='lotto_com1_{$key}'>";
                                                            for($i=0;$i<=intval($r_lotto_dis1[$key]);$i++){
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
                                                          <input type='checkbox' class='ace' id='lotto_typeBOpen' name='lotto_typeBOpen' style='height: 23px;' ".$chk2." >
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
                            $data["temp"].="<tr class='text-center'>
                                              <td width='35%'>{$value}</td>
                                              <td width='30%'>
                                                  <input type='text' name='lotto_pay2_".$key."' id='lotto_pay2_".$key."'  class='numeric maxLimit input-num2digt' value='".addCommas($array_data["lotto_pay2"][$key])."' onblur=\"chkMinMax(this,0,".$r_lotto_pay2[$key].");\">
                                                  <br>
                                                  <span class='text-danger label-sm maxtransfer' id='lotto_pay_info' data-json='".$r_lotto_pay2[$key]."'>(0-".$r_lotto_pay2[$key].") </span>
                                              </td>
                                              <td width='35%'>
                                                  <div class='col-xs-12 col-sm-12 col-md-12'>
                                                      <div class='clearfix  input-group'>
                                                        <select class='form-control input-sm sl_lotto_com' id='7_{$key}_lotto_com2' name='lotto_com2_{$key}'>";
                                                            for($i=0;$i<=intval($r_lotto_dis2[$key]);$i++){
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
                                                          <input type='checkbox' class='ace' id='lotto_typeCOpen' name='lotto_typeCOpen' style='height: 23px;' ".$chk3." >
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
                            $data["temp"].="<tr class='text-center'>
                                              <td width='35%'>{$value}</td>
                                              <td width='30%'>
                                                  <input type='text' name='lotto_pay3_".$key."' id='lotto_pay3_".$key."'  class='numeric maxLimit input-num2digt' value='".addCommas($array_data["lotto_pay3"][$key])."' onblur=\"chkMinMax(this,0,".$r_lotto_pay3[$key].");\">
                                                  <br>
                                                  <span class='text-danger label-sm maxtransfer' id='lotto_pay_info' data-json='".$r_lotto_pay3[$key]."'>(0-".$r_lotto_pay3[$key].") </span>
                                              </td>
                                              <td width='35%'>
                                                  <div class='col-xs-12 col-sm-12 col-md-12'>
                                                      <div class='clearfix  input-group'>
                                                        <select class='form-control input-sm sl_lotto_com' id='7_{$key}_lotto_com3' name='lotto_com3_{$key}'>";
                                                            for($i=0;$i<=intval($r_lotto_dis3[$key]);$i++){
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