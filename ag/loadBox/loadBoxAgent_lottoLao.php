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

$r_lotto_hun_set_share   = explode(",", $_SESSION["agent_data"]["r_lotto_hun_set_share"]);
$r_lotto_hun_set_pay   = explode(",", $_SESSION["agent_data"]["r_lotto_hun_set_pay"]);
$r_lotto_hun_set_price   = explode(",", $_SESSION["agent_data"]["r_lotto_hun_set_price"]);

$r_games_dis   = explode(",", $_SESSION["agent_data"]["r_games_dis"]);
$r_games_share   = explode(",", $_SESSION["agent_data"]["r_games_share"]);
$r_games_myshare   = explode(",", $_SESSION["agent_data"]["r_games_myshare"]);

$r_casino_share = explode(",", $_SESSION["agent_data"]["r_casino_share"]);
$r_casino_max   = explode(",", $_SESSION["agent_data"]["r_casino_max"]);

    $array_data = $_POST["arr"]; 
    $lotto_lao_active = ($array_data["lotto_lao_active"] == 1) ? "checked=''" : "";

    $r_open_agent = $array_data["r_open_agent"];

    $lotto_hun_set_share_max =  ($array_data["lotto_hun_set_share_max"] == ""  ) ? 0 : $array_data["lotto_hun_set_share_max"];

    

    $data["arr"]["lottoLao"] = $array_data;
    $data["lotto_type"] =  $lang_g["setpay"];

   
    $data["temp"] = "<div id='lotto_lao' class='widget-main no-padding'>

    <div class='form-group'>
      <div class='col-xs-12 col-sm-12 col-md-12'>
        <div class='form-inline pull-left'>
          <label class='inline'>
          <div id='lotto_lao_today'>
            <input type='checkbox' class='ace' id='lotto_lao_active' name='lotto_lao_active' {$lotto_lao_active}>
            <span class='lbl'> {$lang_ag[161]} </span>
            </div>
          </label>
        </div>
        <div id='setMax_lotto_lao' class='form-inline pull-right'>
          <button type='button' class='btn btn-white btn-warning btn-bold btn-sm' onclick=\"setMax('lotto_lao');\">{$lang_ag[1408]}</button>
        </div>
      </div>
    </div>
    <div id='lotto_lao_body'>
    <div class='form-group'>
	    <div class='col-xs-12 col-sm-4 col-md-2'> 
	        <label class='control-label col-xs-12 col-sm-6 col-md-6 no-padding-right' for='9_lotto_share'>{$lang_ag[567]} :</label>
	        <div class='col-xs-12 col-sm-6 col-md-6'> 
	            <div class='clearfix input-group'> 
	                <select class='form-control input-sm sl_lotto_lao_share' id='9_lotto_share' name='lotto_hun_set_share' onchange=\"setKeep('9_lotto_share');\">";  
                    for($i=$lotto_hun_set_share_max;$i<=intval($r_lotto_hun_set_share[1]);$i++)
                    {
                       $sl_row = "";
                       $sl_row = ($array_data["lotto_hun_set_share"] == $i) ? "selected='selected'" : "";
                       $data["temp"] .= "<option value='{$i}' {$sl_row} >{$i}</option>";
                    } 
                           
            $data["temp"] .="</select>
	                <span class='input-group-addon'>%</span>
	            </div>
	        </div>
	    </div>
	    <div class='col-xs-12 col-sm-6 col-md-6'>
	        <label class='control-label col-xs-12 col-sm-6 col-md-6 no-padding-right'>
	            <span class='text-danger'>".$array_data["r_name"]."</span>
	                {$lang_ag[1402]} : <span id='k_9_lotto_share' data-json='".$r_lotto_hun_set_share[1]."'> ".$array_data["k_9_lotto_share"]."  </span> %
	        </label>
	    </div>
	</div>


                        <div class='form-group'>";                      
            $data["temp"] .= "<div class='col-xs-12 col-sm-12 col-md-12'>
            <div class='widget-box'>
              <div class='widget-body'>";
                
                $data["temp"] .= "<div class='table-responsive'>
                  <table class='table table-striped table-bordered table-hover' style='width: 99.9%;'>
                    <thead>
                      <tr>
                        <th class='text-center'>{$lang_ag[177]}</th>
                        <th class='text-center'>{$lang_ag[835]}</th>
                        <th class='text-center'>{$lang_ag[837]}</th>
                      </tr>
                    </thead>
                    <tbody>";

                                   
                                    foreach ($data["lotto_type"] as $key => $value) {
                                      $index = ($key+1);

                        // ค่าต่ำสุดของ user ภายใต้ ที่ตั้งไว้                         

                        $lotto_hun_set_pay_max[$index] =  ($array_data["lotto_hun_set_pay_max"][$index] == "") ? 0 : $array_data["lotto_hun_set_pay_max"][$index];              
                                        $data["temp"] .= "<tr class='text-center'>
                                      <td width='35%'>".$value."</td>
                                      <td width='35%' class='lotto_lao_Input'>
                                        <input type='text' name='lot_hun_set_pay".$index."' id='lot_hun_set_pay".$index."' class='numeric maxLimit' value='".addCommas($array_data["lot_hun_set_pay"][$index])."' onblur=\"chkMinMax(this,".$lotto_hun_set_pay_max[$index].",".$r_lotto_hun_set_pay[$index].");\">
                                        <span class='text-danger label-sm maxtransfer di-b' id='lot_hun_set_pay_info' data-json='".$r_lotto_hun_set_pay[$index]."'>(".addCommas($lotto_hun_set_pay_max[$index])." - ".addCommas($r_lotto_hun_set_pay[$index]).") </span>
                                      </td>";
                                    if($index == 1){
           
                        $_lotto_hun_set_price[$index] =  ($array_data["lotto_hun_set_price_max"][$index] == "" || $array_data["lotto_hun_set_price_max"][$index] == 0 ) ?  $max_betmin_money : $array_data["lotto_hun_set_price_max"][$index];

                                        $data["temp"] .= "<td width='35%' rowspan='100%' style='vertical-align: top;' class='lotto_lao_Input'>
                                        <input type='text' name='lot_hun_set_price".$index."' id='lot_hun_set_price".$index."' class='numeric maxLimit' value='".$array_data["lot_hun_set_price"][$index]."' onblur=\"chkMinMax(this,".$r_lotto_hun_set_price[$index].",".$_lotto_hun_set_price[$index].");\">
                                        <span class='text-danger label-sm maxtransfer di-b' id='lot_hun_set_price_info' data-json='".$r_lotto_hun_set_price[$index]."'>(".addCommas($r_lotto_hun_set_price[$index])." - ".addCommas($_lotto_hun_set_price[$index]).") </span>
                                      </td>";  
                                    } 
                                    $data["temp"] .="</tr>";
                                   }
                                
                                $data["temp"] .= "</tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>";

                 
        $data["temp"] .= "</div>
                    </div>
                    </div>
                    <div id='lotto_lao_alerts'></div>
                    <script>
                    var r_open_agent = '{$r_open_agent}';
                    if(r_open_agent == 1){
                      $('#lotto_lao_body').show();
                      $('#lotto_lao_alerts').hide();
                    }
                    else{
                      $('#lotto_lao_today').hide();
                      $('#setMax_lotto_lao').hide();
                      $('#lotto_lao_body').hide();
                      $('#lotto_lao_alerts').append(html_alerts);
                    }
                    </script>
                    ";

            echo json_encode($data); 

 ?>