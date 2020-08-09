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
          <span class='lbl'> {$lang_memberMember[21]} </span>
          </div>
				</label>
			</div>
			<div id='setMax_casino' class='form-inline pull-right'>
				<button type='button' class='btn btn-white btn-warning btn-bold btn-sm' onclick=\"setMax('casino');\">{$lang_memberMember[24]}</button>
			</div>
		</div>
  </div>
  <div id='casino_body'>
    <div class='form-group'>";
    foreach ($lang_g["casino_share"] as $key => $value)
    {       
    $data["temp"] .= "
      <div class='col-xs-12 col-sm-6 col-md-6'>
        <div class='widget-box'>
          <div class='widget-header widget-header-flat  text-center'>
            <h4 class='widget-title smaller'>$value</h4>
          </div>
          <div class='widget-body'>
            <div class='widget-main'>
              <div class='form-group' style='display:none;'>
                <div class='col-xs-12 col-sm-12 col-md-12'>
                <label class='control-label col-xs-12 col-sm-4 col-md-5 no-padding-right' for='rcb_com'>{$lang_memberMember[25]} :</label>
                <div class='col-xs-12 col-sm-8 col-md-7'>
                  <div class='clearfix  input-group'>
                    <select class='form-control input-sm sl_casino' id='rcb_com' name='rcb_com'>
                      <option value='0.00'>0.00</option>
                    </select>
                    <span class='input-group-addon' id='k_rcb_com' data-json='0.00'>%</span>
                  </div>
                </div>
              </div>
            </div>
            <div class='form-group'>
              <div class='col-xs-12 col-sm-12 col-md-12'>
                <label class='control-label col-xs-12 col-sm-4 col-md-5 no-padding-right' for='rcb_maxtransfer'>{$lang_memberMember[47]} :</label>
                <div class='col-xs-12 col-sm-8 col-md-7'>
                  <div class='clearfix casino_Input'>
                    <input type='text' name='rcb_maxtransfer{$key}' id='rcb_maxtransfer{$key}' class='numeric maxLimit' value='".addCommas($array_data["rcb_maxtransfer"][$key])."' onblur=\"chkMinMax(this,0,".$r_casino_max[$key].");\">
                    <span class='text-danger label-sm maxtransfer' id='k_rcb_maxtransfer' data-json='".addCommas($r_casino_max[$key])."'>(0 - ".addCommas($r_casino_max[$key]).") </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>";
    }
    $data["temp"] .=  "
    </div>
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