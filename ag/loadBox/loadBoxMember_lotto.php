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

$r_lotto_share  = explode(",", $_SESSION["agent_data"]["r_lotto_share"]);
$r_lotto_max    = explode(",", $_SESSION["agent_data"]["r_lotto_max"]);
$r_lotto_min    = explode(",", $_SESSION["agent_data"]["r_lotto_min"]);
$r_lotto_pay1   = explode(",", $_SESSION["agent_data"]["r_lotto_pay1"]);
$r_lotto_dis1   = explode(",", $_SESSION["agent_data"]["r_lotto_dis1"]);
$r_lotto_pay2   = explode(",", $_SESSION["agent_data"]["r_lotto_pay2"]);
$r_lotto_dis2   = explode(",", $_SESSION["agent_data"]["r_lotto_dis2"]);
$r_lotto_pay3   = explode(",", $_SESSION["agent_data"]["r_lotto_pay3"]);
$r_lotto_dis3   = explode(",", $_SESSION["agent_data"]["r_lotto_dis3"]);

$r_lotto_hun_share  = explode(",", $_SESSION["agent_data"]["r_lotto_hun_share"]);
$r_lotto_hun_max    = explode(",", $_SESSION["agent_data"]["r_lotto_hun_max"]);
$r_lotto_hun_min    = explode(",", $_SESSION["agent_data"]["r_lotto_hun_min"]);
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



if($array_data["bonus_m_id"] != "")
{
  $chk_bonus = "disabled=\"disabled\"";
  $chk_bonus_script = " $('#lotto_chk2_all').prop('checked',false).prop('disabled',true);
          $('#lotto_chk3_all').prop('checked',false).prop('disabled',true);
          close_lotto_all('#lotto_chk2_all','2','lotto');
          close_lotto_all('#lotto_chk3_all','3','lotto');
          $('.lotto_chk2').prop('disabled',true);
          $('.lotto_chk3').prop('disabled',true);";        
}



    $data["lotto_type"] = $lot_type["th"][1];
  
	$data["temp"] = "<div class='widget-main no-padding'>
	<div class='form-group'>
             <div class='col-xs-12 col-sm-12 col-md-12'>
               <div class='form-inline pull-left'>
                 <label class='inline'>
                 <div id='lotto_today'>
                   <input type='checkbox' class='ace' id='lotto_active' name='lotto_active' {$lotto_active} >
                   <span class='lbl'> {$lang_ag[137]} </span>
                   </div>
                 </label>
               </div>
               <div id='setMax_lotto' class='form-inline pull-right'>
                 <button type='button' class='btn btn-white btn-warning btn-bold btn-sm' onclick=\"setMax('lotto');\">{$lang_ag[1408]}</button>
               </div> 
             </div>

              <div class='col-xs-12 col-sm-6 col-md-4'>
                 <div class='col-xs-12 col-sm-6 col-md-4'>
                   <label class='control-label col-xs-12 col-sm-12 col-md-12 no-padding-right' for='7_lotto_share'>  {$lang_ag[831]} :
                   </label>
                 </div> 
                <div class='col-xs-12 col-sm-6 col-md-8'>
                  <div class='clearfix'> 
                    <input type='text' name='lotto_betmax_money' id='lotto_betmax_money' class='numeric input-num2digt no-margin-top' value='".addCommas($array_data["m_lotto_max"])."' onblur=\"chkMinMax(this,".$r_lotto_min[1].",".$r_lotto_max[1].");\">
                    <span class='text-danger label-sm span_block' id='k_lotto_betmax_money' data-json='".addCommas($r_lotto_max[1])."'>(".addCommas($r_lotto_min[1])." - ".addCommas($r_lotto_max[1]).") </span>
                  </div>
                </div>
              </div>

              <div class='col-xs-12 col-sm-6 col-md-4'>
                   <div class='col-xs-12 col-sm-6 col-md-4'>
                     <label class='control-label col-xs-12 col-sm-12 col-md-12 no-padding-right' for='7_lotto_share'>  {$lang_ag[1410]} :
                     </label>
                   </div> 
                   <div class='col-xs-12 col-sm-6 col-md-8'>
                     <div class='clearfix'>
                       <input type='text' name='lotto_betmin_money' id='lotto_betmin_money' class='numeric input-num2digt no-margin-top' value='".addCommas($array_data["m_lotto_min"])."' onblur=\"chkMinMax(this,".$r_lotto_min[1].",".$max_betmin_money.");\">
                       <span class='text-danger label-sm span_block' id='k_lotto_betmin_money' data-json='".addCommas($r_lotto_min[1])."'>(".addCommas($r_lotto_min[1])." - ".$max_betmin_money.") </span>
                     </div>
                   </div>
              </div>

 </div>

<div id='lotto_body'>
		<div class='form-group'>";


$lotto_chk_all = "checked=''";
foreach ($array_data["lotto_pay1"] as $key => $value) {
  if($value == "0"){
    $lotto_chk_all = "";
  }
}

$data["temp"].="<div class='col-xs-12 col-sm-4'>
					            <div class='widget-box'>
					                <div class='widget-body'>
					                    <div class='table-responsive'>
					                        <table class='table table-bordered table-hover'>
					                            <thead>
                                          <tr>
                                               <th colspan='100%'>
                                                   <div id='lotto_typeA' style='text-align: center; height: 40px; line-height: 40px;'>
                                                          <input type='checkbox' class='ace' id='lotto_typeAOpen' name='lotto_typeAOpen' style='height: 23px;' ".$chk1." $chk_bonus>
                                                           <span class='lbl'> $lang_ag[1425] A </span>
                                                   </div>
                                               </th>
                                          </tr>
					                                <tr>
					                                   <th class='text-center'>
                                                <div style='text-align: left; padding-left: 15px; float: left;'>
                                                    <input type='checkbox' class='ace' id='lotto_chk1_all' name='lotto_chk1_all' {$lotto_chk_all} style='height: 23px;' onchange=\"close_lotto_all('#lotto_chk1_all','1','lotto')\">
                                                    <span class='lbl'>  </span>
                                                </div>
                                                {$lang_ag[177]} 
                                             </th>
					                                   <th class='text-center'>{$lang_ag[833]}</th>
					                                   <th class='text-center'>{$lang_ag[210]}</th>
					                                </tr>
					                            </thead>
					                            <tbody>";                                          
                    foreach ($data["lotto_type"] as $key => $value) {

                            if($array_data["lotto_pay1"][$key] != 0)
                            {
                              $lot_chk = "checked=\"\"";
                              $tr_class = "";
                              $_read = "";
                              $sl_blocks = "";
                            }else{
                              $lot_chk = "";
                              $tr_class = "_disabled";
                              $_read = "readonly=\"readonly\"";
                              $sl_blocks = "block_select";
                            }

                            $data["temp"].="<tr class='text-left {$tr_class}'>
                                              <td width='35%'>
                                                  <label style='text-align: left; padding-left: 15px;'>
                                                    <input type='checkbox' class='ace lotto_chk1' id='lotto_chk1_{$key}_chk' name='lotto_chk1_{$key}_chk' {$lot_chk} style='height: 23px;' onchange=\"close_lotto(this,{$key},'1','lotto')\">
                                                    <span class='lbl'>  {$value} </span>
                                                  </label>  
                                              </td>
                                              <td width='30%'>
                                                  <input type='text' name='lotto_pay1_".$key."' id='lotto_pay1_".$key."' {$_read} class='numeric maxLimit input-num2digt' value='".addCommas($array_data["lotto_pay1"][$key])."' onblur=\"chkMinMax(this,0,".$r_lotto_pay1[$key].");\">
                                                  <br>
                                                  <span class='text-danger label-sm maxtransfer' id='lotto_pay_info' data-json='".$r_lotto_pay1[$key]."'>(0-".$r_lotto_pay1[$key].") </span>
                                              </td>
                                              <td width='35%'>
                                                  <div class='col-xs-12 col-sm-12 col-md-12'>
                                                      <div class='clearfix  input-group'>
                                                        <select class='form-control input-sm sl_lotto_com {$sl_blocks}'  id='7_{$key}_lotto_com1' name='lotto_com1_{$key}'>";
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

$lotto_chk_all = "checked=''";
foreach ($array_data["lotto_pay2"] as $key => $value) {
  if($value == "0"){
    $lotto_chk_all = "";
  }
}                

   $data["temp"].="<div class='col-xs-12 col-sm-4'>
                      <div class='widget-box'>
                          <div class='widget-body'>
                              <div class='table-responsive'>
                                  <table class='table table-bordered table-hover'>
                                      <thead>
                                          <tr>
                                               <th colspan='100%'>
                                                   <div id='lotto_typeB' style='text-align: center; height: 40px; line-height: 40px;'>
                                                          <input type='checkbox' class='ace' id='lotto_typeBOpen' name='lotto_typeBOpen' style='height: 23px;' ".$chk2." $chk_bonus>
                                                           <span class='lbl'> $lang_ag[1425] B </span>
                                                   </div>
                                               </th>
                                          </tr>
                                          <tr>
                                             <th class='text-center'>
                                                <div style='text-align: left; padding-left: 15px; float: left;'>
                                                    <input type='checkbox' class='ace' id='lotto_chk2_all' name='lotto_chk2_all' {$lotto_chk_all} style='height: 23px;' onchange=\"close_lotto_all('#lotto_chk2_all','2','lotto')\" $chk_bonus>
                                                    <span class='lbl'>  </span>
                                                </div>
                                                {$lang_ag[177]} 
                                             </th>
                                             <th class='text-center'>{$lang_ag[833]}</th>
                                             <th class='text-center'>{$lang_ag[210]}</th>
                                          </tr>
                                      </thead>
                                      <tbody>";                                          
                    foreach ($data["lotto_type"] as $key => $value) {    

                            if($array_data["lotto_pay2"][$key] != 0)
                            {
                              $lot_chk = "checked=\"\"";
                              $tr_class = "";
                              $_read = "";
                              $sl_blocks = "";
                            }else{
                              $lot_chk = "";
                              $tr_class = "_disabled";
                              $_read = "readonly=\"readonly\"";
                              $sl_blocks = "block_select";
                            }

                            $data["temp"].="<tr class='text-left {$tr_class}'>
                                              <td width='35%'>
                                                  <label style='text-align: left; padding-left: 15px;'>
                                                    <input type='checkbox' class='ace lotto_chk2' id='lotto_chk2_{$key}_chk' name='lotto_chk2_{$key}_chk' {$lot_chk} style='height: 23px;' onchange=\"close_lotto(this,{$key},'2','lotto')\">
                                                    <span class='lbl'>  {$value} </span>
                                                  </label>  
                                              </td>
                                              <td width='30%'>
                                                  <input type='text' name='lotto_pay2_".$key."' id='lotto_pay2_".$key."' {$_read} class='numeric maxLimit input-num2digt' value='".addCommas($array_data["lotto_pay2"][$key])."' onblur=\"chkMinMax(this,0,".$r_lotto_pay2[$key].");\">
                                                  <br>
                                                  <span class='text-danger label-sm maxtransfer' id='lotto_pay_info' data-json='".$r_lotto_pay2[$key]."'>(0-".$r_lotto_pay2[$key].") </span>
                                              </td>
                                              <td width='35%'>
                                                  <div class='col-xs-12 col-sm-12 col-md-12'>
                                                      <div class='clearfix  input-group'>
                                                        <select class='form-control input-sm sl_lotto_com {$sl_blocks}'  id='7_{$key}_lotto_com2' name='lotto_com2_{$key}'>";
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
                  
$lotto_chk_all = "checked=''";
foreach ($array_data["lotto_pay3"] as $key => $value) {
  if($value == "0"){
    $lotto_chk_all = "";
  }
}
$data["temp"].="<div class='col-xs-12 col-sm-4'>
                      <div class='widget-box'>
                          <div class='widget-body'>
                              <div class='table-responsive'>
                                  <table class='table table-bordered table-hover'>
                                      <thead>
                                          <tr>
                                               <th colspan='100%'>
                                                   <div id='lotto_typeC' style='text-align: center; height: 40px; line-height: 40px;'>
                                                          <input type='checkbox' class='ace' id='lotto_typeCOpen' name='lotto_typeCOpen' style='height: 23px;' ".$chk3." $chk_bonus>
                                                           <span class='lbl'> $lang_ag[1425] C </span>
                                                   </div>
                                               </th>
                                          </tr>
                                          <tr>
                                             <th class='text-center'>
                                                <div style='text-align: left; padding-left: 15px; float: left;'>
                                                    <input type='checkbox' class='ace' id='lotto_chk3_all' name='lotto_chk3_all' {$lotto_chk_all} style='height: 23px;' onchange=\"close_lotto_all('#lotto_chk3_all','3','lotto')\">
                                                    <span class='lbl'>  </span>
                                                </div>
                                                {$lang_ag[177]} 
                                             </th>
                                             <th class='text-center'>{$lang_ag[833]}</th>
                                             <th class='text-center'>{$lang_ag[210]}</th>
                                          </tr>
                                      </thead>
                                      <tbody>";                                          
                    foreach ($data["lotto_type"] as $key => $value) {  

                            if($array_data["lotto_pay3"][$key] != 0)
                            {
                              $lot_chk = "checked=\"\"";
                              $tr_class = "";
                              $_read = "";
                              $sl_blocks = "";
                            }else{
                              $lot_chk = "";
                              $tr_class = "_disabled";
                              $_read = "readonly=\"readonly\"";
                              $sl_blocks = "block_select";
                            }

                            $data["temp"].="<tr class='text-left {$tr_class}'>
                                               <td width='35%'>
                                                  <label style='text-align: left; padding-left: 15px;'>
                                                    <input type='checkbox' class='ace lotto_chk3' id='lotto_chk3_{$key}_chk' name='lotto_chk3_{$key}_chk' {$lot_chk} style='height: 23px;' onchange=\"close_lotto(this,{$key},'3','lotto')\">
                                                    <span class='lbl'>  {$value} </span>
                                                  </label>  
                                              </td>
                                              <td width='30%'>
                                                  <input type='text' name='lotto_pay3_".$key."' id='lotto_pay3_".$key."' {$_read} class='numeric maxLimit input-num2digt' value='".addCommas($array_data["lotto_pay3"][$key])."' onblur=\"chkMinMax(this,0,".$r_lotto_pay3[$key].");\">
                                                  <br>
                                                  <span class='text-danger label-sm maxtransfer' id='lotto_pay_info' data-json='".$r_lotto_pay3[$key]."'>(0-".$r_lotto_pay3[$key].") </span>
                                              </td>
                                              <td width='35%'>
                                                  <div class='col-xs-12 col-sm-12 col-md-12'>
                                                      <div class='clearfix  input-group'>
                                                        <select class='form-control input-sm sl_lotto_com {$sl_blocks}'  id='7_{$key}_lotto_com3' name='lotto_com3_{$key}'>";
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
        
          
          ".$chk_bonus_script."

          </script>
          ";
	echo json_encode($data);

 ?>