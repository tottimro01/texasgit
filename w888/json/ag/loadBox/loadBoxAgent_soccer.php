<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 
if($_SESSION["rid"]=="" and $_SESSION["uu_id"]==""){exit();}

require('../inc/ag_function.php');

$r_agent_id = $_SESSION["r_agent_id"];
$sql="select * from bom_tb_agent where  r_agent_id like '%$r_agent_id%' and r_id = ".$_SESSION["rid"]." and r_level=".intval($_SESSION["r_level"])."";
$rs = sql_array($sql);

$_SESSION["agent_data"] = $rs;

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
$soccer_today_active = ($array_data["soccer_today_active"] == 1) ? "checked=''" : "";
$soccer_live_active = ($array_data["soccer_live_active"] == 1) ? "checked=''" : "";

$r_open_agent = $array_data["r_open_agent"];

// ข้อมูลของ user ภายใต้ สำหรับเปรียบเทียบค่าสูงสุด ต่ำสุด
$array_data["today_share"] = ($array_data["today_share"] == "") ? intval($r_sport_share[1]) : $array_data["today_share"];  
$array_data["live_share"] = ($array_data["live_share"] == "") ? intval($r_sport_share_live[1]) : $array_data["live_share"]; 

$live_betmoneymax_pair_max =  ($array_data["live_betmoneymax_pair_max"] == "") ? 0 : intval($array_data["live_betmoneymax_pair_max"]);
$live_fbetmoneymax_pair_max =  ($array_data["live_fbetmoneymax_pair_max"] == "") ? 0 : intval($array_data["live_fbetmoneymax_pair_max"]);
$live_betmax_money_max =  ($array_data["live_betmax_money_max"] == "") ? intval($r_sport_min[1]) : intval($array_data["live_betmax_money_max"]);
$live_fbetmax_money_max =  ($array_data["live_fbetmax_money_max"] == "") ? intval($r_sport_min[2]) : intval($array_data["live_fbetmax_money_max"]);
$live_betmin_money_max =  ($array_data["live_betmin_money_max"] == "") ? intval($r_sport_max[3]) : intval($array_data["live_betmin_money_max"]);
$live_fbetmin_money_max =  ($array_data["live_fbetmin_money_max"] == "") ? intval($r_sport_max[4]) : intval($array_data["live_fbetmin_money_max"]);

$today_share_max =  ($array_data["today_share_max"] == "") ? 0 : intval($array_data["today_share_max"]);
$live_share_max =  ($array_data["live_share_max"] == "") ? 0 : intval($array_data["live_share_max"]);
$today_com_max =  ($array_data["today_com_max"] == "") ? 0.00 : addCommas($array_data["today_com_max"],2);
$torup_max =  ($array_data["torup_max"] == "") ? 0 : intval($array_data["torup_max"]);
$logup_max =  ($array_data["logup_max"] == "") ? 0 : intval($array_data["logup_max"]);

    $data["temp"] =         "<div class='form-group'>
    <div class='col-xs-12 col-sm-12 col-md-12'>
      <div class='form-inline pull-left'>
        <label class='inline'>
            <div id='soccer_today'>
                <input type='checkbox' class='ace' id='soccer_today_active' name='soccer_today_active' {$soccer_today_active}>
                <span class='lbl'>{$lang_memberMember[22]}</span>
            </div>
        </label> &nbsp;
        <label class='inline'>
            <div id='soccer_live_active'>        
                <input type='checkbox' class='ace' name='soccer_live_active' {$soccer_live_active}>
                <span class='lbl'> {$lang_memberMember[23]} </span>
            </div>
        </label>
      </div>
      <div id='setMax_soccer' class='form-inline pull-right'>
        <button type='button' class='btn btn-white btn-warning btn-bold btn-sm' onclick='setMax(\"soccer\");'>{$lang_memberMember[24]}</button>
      </div>
    </div>
  </div>
  <div id='soccer_body'>
  <div class='form-group'>
               <div class='col-xs-12 col-sm-6 col-md-6'>
                    <label class='control-label col-xs-12 col-sm-6 col-md-6 no-padding-right' for='today_share'>{$lang_memberAgent[26]} :</label>
                    <div class='col-xs-12 col-sm-6 col-md-6'>
                        <div class='clearfix input-group'> 
                            <select class='form-control input-sm sl_soccer' id='today_share' name='today_share' onchange=\"setKeep('today_share');\" >";
                                    for($i=$today_share_max;$i<=intval($r_sport_share[1]);$i++)
                                    {
                                         $sl_row = "";
                                         $sl_row = ($array_data["today_share"] == $i) ? "selected='selected'" : "";
                                         $data["temp"] .= "<option value='{$i}' {$sl_row}>{$i}</option>";
                                    } 
                                
                $data["temp"] .="</select>
                            <span class='input-group-addon'>%</span>
                        </div>
                    </div>
                </div>
                <div class='col-xs-12 col-sm-6 col-md-6'>
                    <label class='control-label col-xs-12 col-sm-6 col-md-6 no-padding-right'>
                        <span class='text-danger'> 
                            <?=$r_name;?> 
                        </span>
                       {$lang_memberAgent[27]} : <span id='k_today_share' data-json='".$r_sport_share[1]."'>
                            ".$array_data["k_today_share"]."  </span> %
                    </label>
                </div> 
  </div>

  <div class='form-group'>
    <div class='col-xs-12 col-sm-6 col-md-6'>
        <label class='control-label col-xs-12 col-sm-6 col-md-6 no-padding-right' for='live_share'>{$lang_memberAgent[28]} :</label>
        <div class='col-xs-12 col-sm-6 col-md-6'>
            <div class='clearfix input-group'>
                <select class='form-control input-sm sl_soccer' id='live_share' name='live_share' onchange=\"setKeep('live_share');\">";
                                    for($i=$live_share_max;$i<=intval($r_sport_share_live[1]);$i++)
                                    {
                                         $sl_row = "";
                                         $sl_row = ($array_data["live_share"] == $i) ? "selected='selected'" : "";
                                         $data["temp"] .= "<option value='{$i}' {$sl_row}>{$i}</option>";
                                    } 
                                
                $data["temp"] .="</select>
                <span class='input-group-addon'>%</span>
            </div>
        </div>
    </div>
    <div class='col-xs-12 col-sm-6 col-md-6'>
        <label class='control-label col-xs-12 col-sm-6 col-md-6 no-padding-right'>
            <span class='text-danger'>
                <?=$r_name;?> 
            </span> 
            {$lang_memberAgent[27]} : <span id='k_live_share' data-json='".$r_sport_share_live[1]."'>
                ".$array_data["k_live_share"]."   </span> %
        </label>
    </div>
</div>

  <div class='form-group'>
             <div class='col-xs-12 col-sm-4'>
                 <label class='control-label col-xs-5 col-sm-4 no-padding-right' for='today_com'>{$lang_memberMember[25]} :</label>
                 <div class='col-xs-7 col-sm-8'>
                     <div class='clearfix input-group'>
                         <select class='form-control input-sm' id='today_com' name='today_com'>";
                          for($x=0;$x<=400;$x++){
                             $num=number_format($x*0.05,2);
                             $rnum=number_format($r_sport_dis[1],2);
                              if($num <= $rnum && $num >= $today_com_max)
                              {
                                 $sl_row = "";
                                 $sl_row = (number_format($array_data["today_com"],2) == $num) ? "selected='selected'" : "";
                                 $data["temp"].="<option value='".$num."' ".$sl_row."'>".$num."</option>";
                              }
                         }

            $data["temp"] .="</select>
                         <span class='input-group-addon' id='k_today_com' data-json='{$r_sport_dis[1]}'>%</span>
                     </div>
                 </div>
             </div>
             <div class='col-xs-12 col-sm-4'>
                 <label class='control-label col-xs-5 col-sm-4 no-padding-right' for='torup'>{$lang_memberMember[26]} :</label>
                 <div class='col-xs-7 col-sm-8'>
                     <div class='clearfix'>
                          <select class='form-control sl-width input-sm sl_soccer' id='torup' name='torup'> ";

                          for($i=$torup_max; $i<=intval($r_sport_nam_tor[1]); $i++)
                          {
                             $sl_row = "";
                             $sl_row = ($array_data["torup"] == $i) ? "selected='selected'" : "";
                             $data["temp"].="<option value='".$i."' ".$sl_row.">".$i."</option>";
                          }

                        $data["temp"] .="</select> 
                        <!--<input type='text' class='col-sm-6 input-sm' name='torup' value='".number_format(0.00,2)."' readonly=''>-->
                        <span class='hidden' id='k_torup' data-json='".intval($r_sport_nam_tor[1])."'></span>
                     </div>
                 </div>
             </div>
             <div class='col-xs-12 col-sm-4'>
                 <label class='control-label col-xs-5 col-sm-4 no-padding-right' for='logup'>{$lang_memberMember[27]} :</label>
                 <div class='col-xs-7 col-sm-8'>
                     <div class='clearfix'>
                        <select class='form-control sl-width input-sm sl_soccer' id='logup' name='logup'>";

                          for($i=$logup_max; $i<=intval($r_sport_nam_rong[1]); $i++)
                          {
                             $sl_row = "";
                             $sl_row = ($array_data["logup"] == $i) ? "selected='selected'" : "";
                             $data["temp"].="<option value='".$i."' ".$sl_row.">".$i."</option>";
                          }

                        $data["temp"] .="</select>
                         <!--<input type='text' class='col-sm-6 input-sm' name='logup' value='".number_format(0.00,2)."' readonly=''>-->
                         <span class='hidden' id='k_logup' data-json='".intval($r_sport_nam_rong[1])."'></span>
                     </div>
                 </div>
            </div>
         </div>   
         <div class='form-group'>
             <div class='col-xs-12 col-sm-4'>
                 <label class='control-label col-xs-5 col-sm-4 no-padding-right' for='live_betmoneymax_pair'>{$lang_memberMember[28]} :</label>
                 <div class='col-xs-7 col-sm-8'>
                     <div class='clearfix'>
                         <input type='text' name='live_betmoneymax_pair' id='live_betmoneymax_pair' class='numeric maxLimit input-num2digt' value='".addCommas($array_data["live_betmoneymax_pair"])."' onblur=\"chkMinMax(this,".$live_betmoneymax_pair_max.",".$r_sport_max[1].");\">
                         <span class='text-danger label-sm' id='k_live_betmoneymax_pair' data-json='".addCommas($r_sport_max[1])."'>(".addCommas($live_betmoneymax_pair_max)." - ".addCommas($r_sport_max[1]).") </span>
                     </div>
                 </div>
             </div>
             <div class='col-xs-12 col-sm-4'> 
                 <label class='control-label col-xs-5 col-sm-4 no-padding-right' for='live_betmax_money'>{$lang_memberMember[29]} :</label>
                 <div class='col-xs-7 col-sm-8'>
                     <div class='clearfix'>
                         <input type='text' name='live_betmax_money' id='live_betmax_money' class='numeric maxLimit input-num2digt' value='".addCommas($array_data["live_betmax_money"])."' onblur=\"chkMinMax(this,".$live_betmax_money_max.",".$r_sport_max[3].");\">
                         <span class='text-danger label-sm' id='k_live_betmax_money' data-json='".addCommas($r_sport_max[3])."'> (".addCommas($live_betmax_money_max)." - ".addCommas($r_sport_max[3]).") </span>
                     </div>
                 </div>  
             </div>
             <div class='col-xs-12 col-sm-4'>
                 <label class='control-label col-xs-5 col-sm-4 no-padding-right' for='live_betmin_money'>{$lang_memberMember[60]} :</label>
                 <div class='col-xs-7 col-sm-8'>
                     <div class='clearfix'>
                         <input type='text' name='live_betmin_money' id='live_betmin_money' class='numeric minLimit input-num2digt' value='".addCommas($array_data["live_betmin_money"])."' onblur=\"chkMinMax(this,".$r_sport_min[1].",".$live_betmin_money_max.");\">
                         <span class='text-danger label-sm' id='k_live_betmin_money' data-json='".addCommas($r_sport_min[1])."'>(".addCommas($r_sport_min[1])." - ".addCommas($live_betmin_money_max).") </span>
                     </div>
                 </div>
             </div>   
         </div>
         <div class='form-group'>
             <div class='col-xs-12 col-sm-4'>
                 <label class='control-label col-xs-5 col-sm-4 no-padding-right' for='live_fbetmoneymax_pair'>{$lang_memberMember[30]} :</label>
                 <div class='col-xs-7 col-sm-8'>
                     <div class='clearfix'>
                         <input type='text' name='live_fbetmoneymax_pair' id='live_fbetmoneymax_pair' class='numeric maxLimit input-num2digt' value='".addCommas($array_data["live_fbetmoneymax_pair"])."' onblur=\"chkMinMax(this,".$live_fbetmoneymax_pair_max.",".$r_sport_max[2].");\">
                         <span class='text-danger label-sm' id='k_live_fbetmoneymax_pair'data-json='".addCommas($r_sport_max[2])."'>(".addCommas($live_fbetmoneymax_pair_max)." - ".addCommas($r_sport_max[2]).") </span>
                     </div>
                 </div>
             </div>
             <div class='col-xs-12 col-sm-4'>
                 <label class='control-label col-xs-5 col-sm-4 no-padding-right' for='live_fbetmax_money'>{$lang_memberMember[31]} :</label>
                 <div class='col-xs-7 col-sm-8'>
                     <div class='clearfix'>
                         <input type='text' name='live_fbetmax_money' id='live_fbetmax_money' class='numeric maxLimit input-num2digt' value='".addCommas($array_data["live_fbetmax_money"])."' onblur=\"chkMinMax(this,".$live_fbetmax_money_max.",".$r_sport_max[4].");\">
                         <span class='text-danger label-sm' id='k_live_fbetmax_money' data-json='".addCommas($r_sport_max[4])."'>(".addCommas($live_fbetmax_money_max)." - ".addCommas($r_sport_max[4]).") </span>
                     </div>
                 </div>
             </div>
             <div class='col-xs-12 col-sm-4'>
                 <label class='control-label col-xs-5 col-sm-4 no-padding-right' for='live_fbetmin_money'>{$lang_memberMember[61]} :</label>
                 <div class='col-xs-7 col-sm-8'>
                     <div class='clearfix'>
                         <input type='text' name='live_fbetmin_money' id='live_fbetmin_money' class='numeric minLimit input-num2digt' value='".addCommas($array_data["live_fbetmin_money"])."' onblur=\"chkMinMax(this,".$r_sport_min[2].",".$live_fbetmin_money_max.");\">
                         <span class='text-danger label-sm' id='k_live_fbetmin_money' data-json='".addCommas($r_sport_min[2])."'>(".addCommas($r_sport_min[2])." - ".addCommas($live_fbetmin_money_max).") </span>
                     </div>
                 </div>
             </div>
         </div>
         </div>
         <div id='soccer_alerts'></div>
         <script>
         var r_open_agent = '{$r_open_agent}';
         if(r_open_agent == 1){
            $('#soccer_body').show();
            $('#soccer_alerts').hide();
        }
        else{
            $('#soccer_today').hide();
            $('#soccer_live_active').hide();
            $('#setMax_soccer').hide();
            $('#soccer_body').hide();
            $('#soccer_alerts').append(html_alerts);
        }
        </script>
         ";

         echo json_encode($data);

 ?>