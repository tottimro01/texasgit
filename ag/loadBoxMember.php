<?php 

header('Content-type: application/json');


require('inc/conn.php');
require('inc/function.php');



if($_POST["type"] == "sport")
{
	$array_data = json_decode($_POST["arr"], true); 
	$data["arr"]["sport"] = $array_data;	
	$data["temp"] = "
	<div class='form-group'>
	<div class='col-xs-12 col-sm-12 col-md-12'>
	  <div class='form-inline pull-left'>
		<label class='inline'>
		  <input type='checkbox' class='ace' name='sport_today_active' checked='checked'>
		  <span class='lbl'>กีฬาวันนี้</span>
		</label> &nbsp;
		<label class='inline'>
		  <input type='checkbox' class='ace' name='sport_live_active' checked='checked'>
		  <span class='lbl'>กีฬากำลังแข่ง</span>
		</label>
	  </div>
	  <div class='form-inline pull-right'>
		<button type='button' class='btn btn-white btn-warning btn-bold btn-sm' onclick=\"setMax('sport');\">ค่าสูงสุด</button>
	  </div>
	</div>
  </div>
	<div class='form-group'>
    <div class='col-xs-12 col-sm-4'>
        <label class='control-label col-xs-4 col-sm-4 no-padding-right' for='sport_com'>ค่าคอม :</label>
        <div class='col-xs-8 col-sm-8'>
            <div class='clearfix input-group'>
				<select class='form-control input-sm' id='sport_com' name='sport_com'>
				";

                				for($i=$array_data["min_sport_com"]; $i<=$array_data["main_sport_com"];$i += 0.05)
                				{
                					$sl_row = "";
                					$sl_row = ($array_data["user_sport_com"] == number_format($i,2)) ? "selected='selected'" : "";
                					$data["temp"].="<option value='".number_format($i,2)."' ".$sl_row."'>".number_format($i,2)."</option>";
                				}
                                         
                         $data["temp"].=  "</select>
                <span class='input-group-addon' id='k_sport_com' data-json='0.50'>%</span>
            </div>
        </div>
    </div>
</div>
<div class='form-group'>
    <div class='col-xs-12 col-sm-4'>
        <label class='control-label col-xs-4 col-sm-4 no-padding-right' for='sport_betmoneymax_pair'>สูงสุด/คู่ :</label>
        <div class='col-xs-8 col-sm-8'>
            <div class='clearfix'>
                <input type='text' name='sport_betmoneymax_pair' id='sport_betmoneymax_pair' class='numeric maxLimit' value='".number_format($array_data["user_sport_betmoneymax_pair"])."'>
                <span class='text-danger' id='k_sport_betmoneymax_pair' data-json='".number_format($array_data["main_sport_betmoneymax_pair"])."'>(&lt;= ".number_format($array_data["main_sport_betmoneymax_pair"]).") </span>
            </div>
        </div>
    </div>
    <div class='col-xs-12 col-sm-4'>
        <label class='control-label col-xs-4 col-sm-4 no-padding-right' for='sport_betmax_money'>สูงสุด/ไม้  :</label>
        <div class='col-xs-8 col-sm-8'>
            <div class='clearfix'>
                <input type='text' name='sport_betmax_money' id='sport_betmax_money' class='numeric maxLimit' value='".number_format($array_data["user_sport_betmax_money"])."'>
                <span class='text-danger' id='k_sport_betmax_money' data-json='".number_format($array_data["main_sport_betmax_money"])."'>(&lt;= ".number_format($array_data["main_sport_betmax_money"]).") </span>
            </div>
        </div>
    </div>
    <div class='col-xs-12 col-sm-4'>
        <label class='control-label col-xs-4 col-sm-4 no-padding-right' for='sport_betmin_money'>ต่ำสุด/ไม้ :</label>
        <div class='col-xs-8 col-sm-8'>
            <div class='clearfix'>
                <input type='text' name='sport_betmin_money' id='sport_betmin_money' class='numeric minLimit' value='".number_format($array_data["user_sport_betmin_money"])."'>
                <span class='text-danger' id='k_sport_betmin_money' data-json='".number_format($array_data["main_sport_betmin_money"])."'>(&gt;= ".number_format($array_data["main_sport_betmin_money"]).") </span>
            </div>
        </div>
    </div>
</div>";

echo json_encode($data);


##########################################################
}else if($_POST["type"] == "step")
{

	$array_data = json_decode($_POST["arr"], true); 
	$data["arr"]["step"] = $array_data;

		$data["temp"] = "
		<div class='form-group'>
                        <div class='col-xs-12 col-sm-12 col-md-12'>
                          <div class='form-inline pull-left'>
                            <label class='inline'>
                              <input type='checkbox' class='ace' name='step_active' checked='checked'>
                              <span class='lbl'> สเต็ป  </span>
                            </label>
                          </div>
                          <div class='form-inline pull-right'>
                            <button type='button' class='btn btn-white btn-warning btn-bold btn-sm' onclick=\"setMax('step');\">ค่าสูงสุด</button>
                          </div>
                        </div>
					  </div>
					  <div class='form-group'>
    <div class='col-xs-12 col-sm-4'>
        <label class='control-label col-xs-4 col-sm-4 no-padding-right' for='stepcom2'>ส่วนลด 2 คู่ :</label>
        <div class='col-xs-8 col-sm-8'>
            <div class='clearfix  input-group'>
                <select class='form-control input-sm' id='stepcom2' name='stepcom2'>";
                                            
                                        for($i=$array_data["min_stepcom2"]; $i<=$array_data["main_stepcom2"];$i ++)
                						{
                							$sl_row = "";
                							$sl_row = (number_format($array_data["user_stepcom2"]) == number_format($i)) ? "selected='selected'" : "";
                							$data["temp"].="<option value='".number_format($i)."' ".$sl_row."'>".number_format($i)."</option>";
                						}

                             $data["temp"].= "</select>
                <span class='input-group-addon' id='k_stepcom2' data-json='5'>%</span>
            </div>
        </div>
    </div>
    <div class='col-xs-12 col-sm-4'>
        <label class='control-label col-xs-4 col-sm-4 no-padding-right' for='step_betmax_money'>สูงสุด/ไม้ :</label>
        <div class='col-xs-8 col-sm-8'>
            <div class='clearfix'>
                <input type='text' name='step_betmax_money' id='step_betmax_money' class='numeric maxLimit' value='".number_format($array_data["user_step_betmax_money"])."'>
                <span class='text-danger' id='k_step_betmax_money' data-json='".number_format($array_data["main_step_betmax_money"])."'>(&lt;= ".number_format($array_data["main_step_betmax_money"]).") </span>
            </div>
        </div>
    </div>
    <div class='col-xs-12 col-sm-4'>
        <label class='control-label col-xs-4 col-sm-4 no-padding-right' for='step_daymax_money'>เล่นได้สูงสุด/วัน :</label>
        <div class='col-xs-8 col-sm-8'>
            <div class='clearfix'>
                <input type='text' name='step_daymax_money' id='step_daymax_money' class='numeric' value='".number_format($array_data["main_step_daymax_money"])."' readonly=''>
				<span class='text-danger label-sm' id='k_step_daymax_money' data-json='100,000'>(&lt;= 100,000) </span>
			</div>
        </div>
    </div>
</div>
<div class='form-group'>
    <div class='col-xs-12 col-sm-4'>
        <label class='control-label col-xs-4 col-sm-4 no-padding-right' for='stepcom3'>ส่วนลด 3-4 คู่ :</label>
        <div class='col-xs-8 col-sm-8'>
            <div class='clearfix  input-group'>
                <select class='form-control input-sm' id='stepcom3' name='stepcom3'>";
                                            
                                        for($i=$array_data["min_stepcom3"]; $i<=$array_data["main_stepcom3"];$i ++)
                						{
                							$sl_row = "";
                							$sl_row = (number_format($array_data["user_stepcom3"]) == number_format($i)) ? "selected='selected'" : "";
                							$data["temp"].="<option value='".number_format($i)."' ".$sl_row."'>".number_format($i)."</option>";
                						}

                             $data["temp"].= "</select>
                <span class='input-group-addon' id='k_stepcom3' data-json='10'>%</span>
            </div>
        </div>  
    </div>
    <div class='col-xs-12 col-sm-4'>
        <label class='control-label col-xs-4 col-sm-4 no-padding-right' for='step_betmin_money'>ต่ำสุด/ไม้ :</label>
        <div class='col-xs-8 col-sm-8'>
            <div class='clearfix'>
                <input type='text' name='step_betmin_money' id='step_betmin_money' class='numeric minLimit' value='".number_format($array_data["user_step_betmin_money"])."'>
                <span class='text-danger' id='k_step_betmin_money' data-json='".number_format($array_data["main_step_betmin_money"])."'>(&gt;= ".number_format($array_data["main_step_betmin_money"]).") </span>
            </div>
        </div>
    </div>  
    <div class='col-xs-12 col-sm-4'>
        <label class='control-label col-xs-4 col-sm-4 no-padding-right' for='step_billmax_money'>จ่ายสูงสุด/บิล :</label>
        <div class='col-xs-8 col-sm-8'>
            <div class='clearfix'>
                <input type='text' name='step_billmax_money' id='step_billmax_money' class='numeric' value='".number_format($array_data["main_step_billmax_money"])."' readonly=''>
				<span class='text-danger label-sm' id='k_step_billmax_money' data-json='1,000,000'>(&lt;= 1,000,000) </span>
			</div>
        </div>
    </div>
</div>
<div class='form-group'>
    <div class='col-xs-12 col-sm-4'>
        <label class='control-label col-xs-4 col-sm-4 no-padding-right' for='stepcom5'>ส่วนลด 5-6 คู่ :</label>
        <div class='col-xs-8 col-sm-8'>
            <div class='clearfix  input-group'>
                <select class='form-control input-sm' id='stepcom5' name='stepcom5'>";
                                            
					for($i=$array_data["min_stepcom5"]; $i<=$array_data["main_stepcom5"];$i ++)
					{
						$sl_row = "";
						$sl_row = (number_format($array_data["user_stepcom5"]) == number_format($i)) ? "selected='selected'" : "";
						$data["temp"].="<option value='".number_format($i)."' ".$sl_row."'>".number_format($i)."</option>";
					}

					$data["temp"].= "</select>
                <span class='input-group-addon' id='k_stepcom5' data-json='11'>%</span>
            </div>
        </div>
    </div>
    <div class='col-xs-12 col-sm-4'>
        <label class='control-label col-xs-4 col-sm-4 no-padding-right' for='stepcom1'>Comm fold :</label>
        <div class='col-xs-8 col-sm-8'>
            <div class='clearfix  input-group'>
                <select class='form-control input-sm' id='stepcom1' name='stepcom1'>
                                            <option value='0' selected=''>0</option>
                                    </select>
                <span class='input-group-addon' id='k_stepcom1' data-json='0'>%</span>
            </div>
        </div>
    </div>
    <div class='col-xs-12 col-sm-4'>
        <label class='control-label col-xs-4 col-sm-4 no-padding-right' for='step_max_pair'>จำนวนคู่สูงสุด/บิล :</label>
        <div class='col-xs-8 col-sm-8'>
            <div class='clearfix input-group'>
                <select class='form-control sl-width input-sm' id='step_max_pair' name='step_max_pair'>";
                                            
                                        for($i=$array_data["main_step_max_pair"]; $i >= $array_data["main_step_min_pair"];$i--)
                						{
                							$sl_row = "";
                							$sl_row = (number_format($array_data["user_step_max_pair"]) == number_format($i)) ? "selected='selected'" : "";
                							$data["temp"].="<option value='".number_format($i)."' ".$sl_row."'>".number_format($i)."</option>";
                						}

                             $data["temp"].= "</select>
                <span class='input-group-addon' id='k_step_max_pair' data-json='12'>%</span>
            </div>
        </div>
    </div>
</div>
<div class='form-group'>
    <div class='col-xs-12 col-sm-4'>
        <label class='control-label col-xs-4 col-sm-4 no-padding-right' for='stepcom7'>ส่วนลด 7-8 คู่ :</label>
        <div class='col-xs-8 col-sm-8'>
            <div class='clearfix  input-group'>
                <select class='form-control input-sm' id='stepcom7' name='stepcom7'>";
                                            
							for($i=$array_data["min_stepcom7"]; $i<=$array_data["main_stepcom7"];$i ++)
							{
								$sl_row = "";
								$sl_row = (number_format($array_data["user_stepcom7"]) == number_format($i)) ? "selected='selected'" : "";
								$data["temp"].="<option value='".number_format($i)."' ".$sl_row."'>".number_format($i)."</option>";
							}

                             $data["temp"].= "</select>
                <span class='input-group-addon' id='k_stepcom7' data-json='14'>%</span>
            </div>
        </div>
    </div>
    <div class='col-xs-12 col-sm-4'></div>
    <div class='col-xs-12 col-sm-4'>
        <label class='control-label col-xs-4 col-sm-4 no-padding-right' for='step_min_pair'>จำนวนคู่ต่ำสุด/บิล :</label>
        <div class='col-xs-8 col-sm-8'>
            <div class='clearfix input-group'>
                                <select class='form-control sl-width input-sm' id='step_min_pair' name='step_min_pair'>";
                                            
                                        for($i=$array_data["main_step_min_pair"]; $i <= $array_data["main_step_max_pair"];$i++)
                						{
                							$sl_row = "";
                							$sl_row = (number_format($array_data["user_step_min_pair"]) == number_format($i)) ? "selected='selected'" : "";
                							$data["temp"].="<option value='".number_format($i)."' ".$sl_row."'>".number_format($i)."</option>";
                						}

                             $data["temp"].= " </select>
                <span class='input-group-addon' id='k_step_min_pair' data-json='2'>%</span>
            </div>
        </div>
    </div>
</div>
<div class='form-group'>
    <div class='col-xs-12 col-sm-4'>
        <label class='control-label col-xs-4 col-sm-4 no-padding-right' for='stepcom9'>ส่วนลด 9-10 คู่ :</label>
        <div class='col-xs-8 col-sm-8'>
            <div class='clearfix  input-group'>
                <select class='form-control input-sm' id='stepcom9' name='stepcom9'>";
                                            
                                        for($i=$array_data["min_stepcom9"]; $i<=$array_data["main_stepcom9"];$i ++)
                						{
                							$sl_row = "";
                							$sl_row = (number_format($array_data["user_stepcom9"]) == number_format($i)) ? "selected='selected'" : "";
                							$data["temp"].="<option value='".number_format($i)."' ".$sl_row."'>".number_format($i)."</option>";
                						}

                             $data["temp"].= "</select>
                <span class='input-group-addon' id='k_stepcom9' data-json='17'>%</span>
            </div>
        </div>
    </div>
</div>
<div class='form-group'>
    <div class='col-xs-12 col-sm-4'>
        <label class='control-label col-xs-4 col-sm-4 no-padding-right' for='stepcom11'>ส่วนลด 11-12 คู่ :</label>
        <div class='col-xs-8 col-sm-8'>
            <div class='clearfix  input-group'>
                <select class='form-control input-sm' id='stepcom11' name='stepcom11'>";
                                            
                                        for($i=$array_data["min_stepcom11"]; $i<=$array_data["main_stepcom11"];$i ++)
                						{
                							$sl_row = "";
                							$sl_row = (number_format($array_data["user_stepcom11"]) == number_format($i)) ? "selected='selected'" : "";
                							$data["temp"].="<option value='".number_format($i)."' ".$sl_row."'>".number_format($i)."</option>";
                						}

                             $data["temp"].= "</select>
                <span class='input-group-addon' id='k_stepcom11' data-json='20'>%</span>
            </div>
        </div>
    </div>
</div>";



echo json_encode($data);


###########################################################
}else if($_POST["type"] == "casino")
{	
	$array_data = json_decode($_POST["arr"], true); 
	$data["arr"]["casino"] = $array_data;
	$data["temp"] = "
	<div class='form-group'>
		<div class='col-xs-12 col-sm-12 col-md-12'>
			<div class='form-inline pull-left'>
				<label class='inline'>
					<input type='checkbox' class='ace' name='casino_active' checked='checked'>
					<span class='lbl'> คาสิโน </span>
				</label>
			</div>
			<div class='form-inline pull-right'>
				<button type='button' class='btn btn-white btn-warning btn-bold btn-sm' onclick=\"setMax('casino');\">ค่าสูงสุด</button>
			</div>
		</div>
	</div>";

 $data["temp"] .=   "<div class='form-group'>";

                          
                              foreach ($arr["list_game"] as $key => $value)
                              {

                          
        $data["temp"] .= "<div class='col-xs-12 col-sm-6 col-md-6'>
                          <div class='widget-box'>
                            <div class='widget-header widget-header-flat  text-center'>
                              <h4 class='widget-title smaller'>$value</h4>
                            </div>
                            <div class='widget-body'>
                              <div class='widget-main'>
                                <div class='form-group' style='display:none;'>
                                  <div class='col-xs-12 col-sm-12 col-md-12'>
                                    <label class='control-label col-xs-12 col-sm-4 col-md-5 no-padding-right' for='rcb_com'>ค่าคอม :</label>
                                    <div class='col-xs-12 col-sm-8 col-md-7'>
                                      <div class='clearfix  input-group'>
                                        <select class='form-control input-sm sl_casino' id='rcb_com' name='rcb_com' onclick=\"generateSL2('0.00',this);\">
                                          <option value='0.00'>0.00</option>
                                        </select>
                                        <span class='input-group-addon' id='k_rcb_com' data-json='0.00'>%</span>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class='form-group'>
                                  <div class='col-xs-12 col-sm-12 col-md-12'>
                                    <label class='control-label col-xs-12 col-sm-4 col-md-5 no-padding-right' for='rcb_maxtransfer'>โอนไปคาสิโนสูงสุด :</label>
                                    <div class='col-xs-12 col-sm-8 col-md-7'>
                                      <div class='clearfix casino_Input'>
                                        <input type='text' name='maxtransfer_<?=$key;?>' id='rcb_maxtransfer' class='numeric maxLimit' value='50,000'>
                                        <span class='text-danger label-sm maxtransfer' id='k_rcb_maxtransfer' data-json='50,000'>(&lt;= 50,000) </span>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>";
                    }
    $data["temp"] .=  "</div>";

                        

echo json_encode($data);


###########################################################################
}else if($_POST["type"] == "game")
{
	$array_data = json_decode($_POST["arr"], true); 
	$data["arr"]["game"] = $array_data;
	$data["temp"] = 	" <div class='form-group'>
			     <div class='col-xs-12 col-sm-12 col-md-12'>
			         <div class='form-inline pull-left'>
			             <label class='inline'>
			                 <input type='checkbox' class='ace' name='game_active' checked='checked'>
			                 <span class='lbl'> เกมส์ </span>
			             </label>
			         </div>
			         <div class='form-inline pull-right'>
			             <button type='button' class='btn btn-white btn-warning btn-bold btn-sm' onclick=\"setMax('game');\">
			                 ค่าสูงสุด                                                </button>
			         </div>
			     </div>
			 </div>
			 <div class='form-group'>
			     <div class='col-xs-8 col-sm-6 col-md-4'>
			         <label class='control-label col-xs-6 col-sm-4 col-md-6 no-padding-right' for='game_com'>ค่าคอม :</label>
			         <div class='col-xs-6 col-sm-8 col-md-6'>
			             <div class='clearfix input-group'>
			                 <select class='form-control input-sm sl_game' id='game_com' name='game_com' onclick='generateSL2(\"0.30\",this);'>";

                				for($i=$array_data["min_game_com"]; $i<=$array_data["max_game_com"];$i += 0.05)
                				{
                					$sl_row = "";
                					$sl_row = ($array_data["user_game_com"] == number_format($i,2)) ? "selected='selected'" : "";
                					$data["temp"].="<option value='".number_format($i,2)."' ".$sl_row."'>".number_format($i,2)."</option>";
                				}
                                         
                         $data["temp"].=  "</select>
			                 <span class='input-group-addon' id='k_game_com' data-json='0.30'>%</span>
			             </div>
			         </div>
			     </div>
			 </div>";
			 echo json_encode($data);
                              
########################################################
}else if($_POST["type"] == "lotto")
{

	$array_data = json_decode($_POST["arr"], true); 
	$data["arr"]["lotto"] = $array_data;
	$data["lotto_type"] = array(
				'0' =>   "3 ตัวบน" ,
				'1' =>   "3 ตัวบนโต๊ด" ,
				'2' =>   "3 ตัวบนวิ่ง" ,
				'4' =>   "2 ตัวบน" ,
				'6' =>   "3 ตัวล่าง" ,
				'5' =>   "2 ตัวล่าง" ,
				'3' =>   "2 ตัวล่างวิ่ง" ,
				'7' =>   "บน 2 ใน 3" ,
				'8' =>   "บน 3 ใน 4" ,
				'9' =>   "บน 3 ใน 5" ,
				'10' =>  "ปักหลักหน่วย" ,
				'11' =>  "ปักหลักสิบ" ,
				'12' =>  "ปักหลักร้อย" ,
	);	
	$num_row = count($data["lotto_type"]);
	$is_row_divide = false;

	if($num_row > 10)
	{
		$row_divide = ceil($num_row/2);
		$is_row_divide = true;
	}else{
		$is_row_divide = false;
	}
	$data["temp"] = "<div class='widget-main no-padding'>
	<div class='form-group'>
                              <div class='col-xs-12 col-sm-12 col-md-12'>
                                <div class='form-inline pull-left'>
                                  <label class='inline'>
                                    <input type='checkbox' class='ace' name='lotto_active' checked='checked'>
                                    <span class='lbl'> หวย </span>
                                  </label>
                                </div>
                                <div class='form-inline pull-right'>
                                  <button type='button' class='btn btn-white btn-warning btn-bold btn-sm' onclick=\"setMax('lotto');\">ค่าสูงสุด</button>
                                </div> 
                              </div>
                            </div>
					    <div class='form-group'>
					        <div class='col-xs-6'>
					            <div class='widget-box'>
					                <div class='widget-body'>
					                    <div class='table-responsive'>
					                        <table class='table table-bordered table-hover'>
					                            <thead>
					                                <tr>
					                                    <th class='text-center'>รายการ</th>
					                                    <th class='text-center'>อัตราจ่าย</th>
					                                    <th class='text-center'>ค่าคอม</th>
					                                </tr>
					                            </thead>
					                            <tbody>";

					$data["temp"].="<tr class='text-center'>
					<td width='35%'>3 ตัวบน</td>
					<td width='30%'>
					  <div class='col-xs-12 col-sm-12 col-md-12'>
						<div class='clearfix'>
						  <select class='form-control sl-width input-sm sl_lotto' id='7_0_lotto_pay' name='7[0][lotto_pay]' onclick=\"generateSL('700',this,true);\">";
							for($i=0;$i<=700;$i++){
								$data["temp"].="<option value='{$i}'>{$i}</option>";
							}
						  $data["temp"].="</select>
						  <span class='hidden' id='k_7_0_lotto_pay' data-json='700'>%</span>
						</div>
					  </div>
					</td>
					<td width='35%'>
					  <div class='col-xs-12 col-sm-12 col-md-12'>
						<div class='clearfix  input-group'>
						  <select class='form-control input-sm sl_lotto' id='7_0_lotto_com' name='7[0][lotto_com]' onclick=\"generateSL('0',this,true);\">
							<option value='0'>0</option>
						  </select>
						  <span class='input-group-addon' id='k_7_0_lotto_com' data-json='0'>%</span>
						</div>
					  </div>
					</td>
				  </tr>
				  <tr class='text-center'>
					<td width='35%'>3 ตัวบนโต๊ด</td>
					<td width='30%'>
					  <div class='col-xs-12 col-sm-12 col-md-12'>
						<div class='clearfix'>
						  <select class='form-control sl-width input-sm sl_lotto' id='7_1_lotto_pay' name='7[1][lotto_pay]' onclick=\"generateSL('120',this,true);\">";
								for($i=0;$i<=700;$i++){
									$data["temp"].="<option value='{$i}'>{$i}</option>";
								}
							$data["temp"].="</select>
						  <span class='hidden' id='k_7_1_lotto_pay' data-json='120'>%</span>
						</div>
					  </div>
					</td>
					<td width='35%'>
					  <div class='col-xs-12 col-sm-12 col-md-12'>
						<div class='clearfix  input-group'>
						  <select class='form-control input-sm sl_lotto' id='7_1_lotto_com' name='7[1][lotto_com]' onclick=\"generateSL('0',this,true);\">
							<option value='0'>0</option>
						  </select>
						  <span class='input-group-addon' id='k_7_1_lotto_com' data-json='0'>%</span>
						</div>
					  </div>
					</td>
				  </tr>
				  <tr class='text-center'>
					<td width='35%'>3 ตัวบนวิ่ง</td>
					<td width='30%'>
					  <div class='col-xs-12 col-sm-12 col-md-12'>
						<div class='clearfix'>
						  <select class='form-control sl-width input-sm sl_lotto' id='7_2_lotto_pay' name='7[2][lotto_pay]' onclick=\"generateSL('3',this,true);\">
							<option value='0'>0</option>
							<option value='1'>1</option>
							<option value='2'>2</option>
							<option value='3'>3</option>
						  </select>
						  <span class='hidden' id='k_7_2_lotto_pay' data-json='3'>%</span>
						</div>
					  </div>
					</td>
					<td width='35%'>
					  <div class='col-xs-12 col-sm-12 col-md-12'>
						<div class='clearfix  input-group'>
						  <select class='form-control input-sm sl_lotto' id='7_2_lotto_com' name='7[2][lotto_com]' onclick=\"generateSL('8',this,true);\">
							<option value='0'>0</option>
							<option value='1'>1</option>
							<option value='2'>2</option>
							<option value='3'>3</option>
							<option value='4'>4</option>
							<option value='5'>5</option>
							<option value='6'>6</option>
							<option value='7'>7</option>
							<option value='8'>8</option>
						  </select>
						  <span class='input-group-addon' id='k_7_2_lotto_com' data-json='8'>%</span>
						</div>
					  </div>
					</td>
				  </tr>
				  <tr class='text-center'>
					<td width='35%'>2 ตัวบน</td>
					<td width='30%'>
					  <div class='col-xs-12 col-sm-12 col-md-12'>
						<div class='clearfix'>
						  <select class='form-control sl-width input-sm sl_lotto' id='7_4_lotto_pay' name='7[4][lotto_pay]' onclick=\"generateSL('75',this,true);\">";
							for($i=0;$i<=75;$i++){
									$data["temp"].="<option value='{$i}'>{$i}</option>";
								}
							$data["temp"].="</select>
						  <span class='hidden' id='k_7_4_lotto_pay' data-json='75'>%</span>
						</div>
					  </div>
					</td>
					<td width='35%'>
					  <div class='col-xs-12 col-sm-12 col-md-12'>
						<div class='clearfix  input-group'>
						  <select class='form-control input-sm sl_lotto' id='7_4_lotto_com' name='7[4][lotto_com]' onclick=\"generateSL('0',this,true);\">
							<option value='0'>0</option>
						  </select>
						  <span class='input-group-addon' id='k_7_4_lotto_com' data-json='0'>%</span>
						</div>
					  </div>
					</td>
				  </tr>
				  <tr class='text-center'>
					<td width='35%'>3 ตัวล่าง</td>
					<td width='30%'>
					  <div class='col-xs-12 col-sm-12 col-md-12'>
						<div class='clearfix'>
						  <select class='form-control sl-width input-sm sl_lotto' id='7_6_lotto_pay' name='7[6][lotto_pay]' onclick=\"generateSL('150',this,true);\">";
							for($i=0;$i<=150;$i++){
								$data["temp"].="<option value='{$i}'>{$i}</option>";
							}
							$data["temp"].="</select>
						  <span class='hidden' id='k_7_6_lotto_pay' data-json='150'>%</span>
						</div>
					  </div>
					</td>
					<td width='35%'>
					  <div class='col-xs-12 col-sm-12 col-md-12'>
						<div class='clearfix  input-group'>
						  <select class='form-control input-sm sl_lotto' id='7_6_lotto_com' name='7[6][lotto_com]' onclick=\"generateSL('0',this,true);\">
							<option value='0'>0</option>
						  </select>
						  <span class='input-group-addon' id='k_7_6_lotto_com' data-json='0'>%</span>
						</div>
					  </div>
					</td>
				  </tr>
				  <tr class='text-center'>
					<td width='35%'>2 ตัวล่าง</td>
					<td width='30%'>
					  <div class='col-xs-12 col-sm-12 col-md-12'>
						<div class='clearfix'>
						  <select class='form-control sl-width input-sm sl_lotto' id='7_5_lotto_pay' name='7[5][lotto_pay]' onclick=\"generateSL('75',this,true);\">";
						  for($i=0;$i<=75;$i++){
								$data["temp"].="<option value='{$i}'>{$i}</option>";
							}
							$data["temp"].="</select>
						  <span class='hidden' id='k_7_5_lotto_pay' data-json='75'>%</span>
						</div>
					  </div>
					</td>
					<td width='35%'>
					  <div class='col-xs-12 col-sm-12 col-md-12'>
						<div class='clearfix  input-group'>
						  <select class='form-control input-sm sl_lotto' id='7_5_lotto_com' name='7[5][lotto_com]' onclick=\"generateSL('0',this,true);\">
							<option value='0'>0</option>
						  </select>
						  <span class='input-group-addon' id='k_7_5_lotto_com' data-json='0'>%</span>
						</div>
					  </div>
					</td>
				  </tr>
				  <tr class='text-center'>
					<td width='35%'>2 ตัวล่างวิ่ง</td>
					<td width='30%'>
					  <div class='col-xs-12 col-sm-12 col-md-12'>
						<div class='clearfix'>
						  <select class='form-control sl-width input-sm sl_lotto' id='7_3_lotto_pay' name='7[3][lotto_pay]' onclick=\"generateSL('4',this,true);\">
							<option value='0'>0</option>
							<option value='1'>1</option>
							<option value='2'>2</option>
							<option value='3'>3</option>
							<option value='4'>4</option>
						  </select>
						  <span class='hidden' id='k_7_3_lotto_pay' data-json='4'>%</span>
						</div>
					  </div>
					</td>
					<td width='35%'>
					  <div class='col-xs-12 col-sm-12 col-md-12'>
						<div class='clearfix  input-group'>
						  <select class='form-control input-sm sl_lotto' id='7_3_lotto_com' name='7[3][lotto_com]' onclick=\"generateSL('8',this,true);\">
							<option value='0'>0</option>
							<option value='1'>1</option>
							<option value='2'>2</option>
							<option value='3'>3</option>
							<option value='4'>4</option>
							<option value='5'>5</option>
							<option value='6'>6</option>
							<option value='7'>7</option>
							<option value='8'>8</option>
						  </select>
						  <span class='input-group-addon' id='k_7_3_lotto_com' data-json='8'>%</span>
						</div>
					  </div>
					</td>
				  </tr>";
					                   $data["temp"].="</tbody>
					                        </table>
					                    </div>
					                </div>
					            </div>
					        </div>";
		if($is_row_divide)
		{			        
			$data["temp"].=   "<div class='col-xs-6'>
					            <div class='widget-box'>
					                <div class='widget-body'>
					                    <div class='table-responsive'>
					                        <table class='table table-bordered table-hover'>
					                            <thead>
					                                <tr>
					                                    <th class='text-center'>รายการ</th>
					                                    <th class='text-center'>อัตราจ่าย</th>
					                                    <th class='text-center'>ค่าคอม</th>
					                                </tr>
					                            </thead>
					                            <tbody>";

			
											   $data["temp"].="<tr class='text-center'>
											   <td width='35%'>บน 2 ใน 3</td>
											   <td width='30%'>
												 <div class='col-xs-12 col-sm-12 col-md-12'>
												   <div class='clearfix'>
													 <select class='form-control sl-width input-sm sl_lotto' id='7_7_lotto_pay' name='7[7][lotto_pay]' onclick=\"generateSL('10',this,true);\">
													   <option value='0'>0</option>
													   <option value='1'>1</option>
													   <option value='2'>2</option>
													   <option value='3'>3</option>
													   <option value='4'>4</option>
													   <option value='5'>5</option>
													   <option value='6'>6</option>
													   <option value='7'>7</option>
													   <option value='8'>8</option>
													   <option value='9'>9</option>
													   <option value='10'>10</option>
													 </select>
													 <span class='hidden' id='k_7_7_lotto_pay' data-json='10'>%</span>
												   </div>
												 </div>
											   </td>
											   <td width='35%'>
												 <div class='col-xs-12 col-sm-12 col-md-12'>
												   <div class='clearfix  input-group'>
													 <select class='form-control input-sm sl_lotto' id='7_7_lotto_com' name='7[7][lotto_com]' onclick=\"generateSL('0',this,true);\">
													   <option value='0'>0</option>
													 </select>
													 <span class='input-group-addon' id='k_7_7_lotto_com' data-json='0'>%</span>
												   </div>
												 </div>
											   </td>
											 </tr>
											 <tr class='text-center'>
											   <td width='35%'>บน 3 ใน 4</td>
											   <td width='30%'>
												 <div class='col-xs-12 col-sm-12 col-md-12'>
												   <div class='clearfix'>
													 <select class='form-control sl-width input-sm sl_lotto' id='7_8_lotto_pay' name='7[8][lotto_pay]' onclick=\"generateSL('20',this,true);\">
													   <option value='0'>0</option>
													   <option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option><option value='16'>16</option><option value='17'>17</option><option value='18'>18</option><option value='19'>19</option><option value='20'>20</option></select>
													 <span class='hidden' id='k_7_8_lotto_pay' data-json='20'>%</span>
												   </div>
												 </div>
											   </td>
											   <td width='35%'>
												 <div class='col-xs-12 col-sm-12 col-md-12'>
												   <div class='clearfix  input-group'>
													 <select class='form-control input-sm sl_lotto' id='7_8_lotto_com' name='7[8][lotto_com]' onclick=\"generateSL('0',this,true);\">
													   <option value='0'>0</option>
													 </select>
													 <span class='input-group-addon' id='k_7_8_lotto_com' data-json='0'>%</span>
												   </div>
												 </div>
											   </td>
											 </tr>
											 <tr class='text-center'>
											   <td width='35%'>บน 3 ใน 5</td>
											   <td width='30%'>
												 <div class='col-xs-12 col-sm-12 col-md-12'>
												   <div class='clearfix'>
													 <select class='form-control sl-width input-sm sl_lotto' id='7_9_lotto_pay' name='7[9][lotto_pay]' onclick=\"generateSL('10',this,true);\">
													   <option value='0'>0</option>
													   <option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option></select>
													 <span class='hidden' id='k_7_9_lotto_pay' data-json='10'>%</span>
												   </div>
												 </div>
											   </td>
											   <td width='35%'>
												 <div class='col-xs-12 col-sm-12 col-md-12'>
												   <div class='clearfix  input-group'>
													 <select class='form-control input-sm sl_lotto' id='7_9_lotto_com' name='7[9][lotto_com]' onclick=\"generateSL('0',this,true);\">
													   <option value='0'>0</option>
													 </select>
													 <span class='input-group-addon' id='k_7_9_lotto_com' data-json='0'>%</span>
												   </div>
												 </div>
											   </td>
											 </tr>
											 <tr class='text-center'>
											   <td width='35%'>ปักหลักหน่วย</td>
											   <td width='30%'>
												 <div class='col-xs-12 col-sm-12 col-md-12'>
												   <div class='clearfix'>
													 <select class='form-control sl-width input-sm sl_lotto' id='7_10_lotto_pay' name='7[10][lotto_pay]' onclick=\"generateSL('8',this,true);\">
													   <option value='0'>0</option>
													   <option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option></select>
													 <span class='hidden' id='k_7_10_lotto_pay' data-json='8'>%</span>
												   </div>
												 </div>
											   </td>
											   <td width='35%'>
												 <div class='col-xs-12 col-sm-12 col-md-12'>
												   <div class='clearfix  input-group'>
													 <select class='form-control input-sm sl_lotto' id='7_10_lotto_com' name='7[10][lotto_com]' onclick=\"generateSL('0',this,true);\">
													   <option value='0'>0</option>
													 </select>
													 <span class='input-group-addon' id='k_7_10_lotto_com' data-json='0'>%</span>
												   </div>
												 </div>
											   </td>
											 </tr>
											 <tr class='text-center'>
											   <td width='35%'>ปักหลักสิบ</td>
											   <td width='30%'>
												 <div class='col-xs-12 col-sm-12 col-md-12'>
												   <div class='clearfix'>
													 <select class='form-control sl-width input-sm sl_lotto' id='7_11_lotto_pay' name='7[11][lotto_pay]' onclick=\"generateSL('8',this,true);\">
													   <option value='0'>0</option>
													   <option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option></select>
													 <span class='hidden' id='k_7_11_lotto_pay' data-json='8'>%</span>
												   </div>
												 </div>
											   </td>
											   <td width='35%'>
												 <div class='col-xs-12 col-sm-12 col-md-12'>
												   <div class='clearfix  input-group'>
													 <select class='form-control input-sm sl_lotto' id='7_11_lotto_com' name='7[11][lotto_com]' onclick=\"generateSL('0',this,true);\">
													   <option value='0'>0</option>
													 </select>
													 <span class='input-group-addon' id='k_7_11_lotto_com' data-json='0'>%</span>
												   </div>
												 </div>
											   </td>
											 </tr>
											 <tr class='text-center'>
											   <td width='35%'>ปักหลักร้อย</td>
											   <td width='30%'>
												 <div class='col-xs-12 col-sm-12 col-md-12'>
												   <div class='clearfix'>
													 <select class='form-control sl-width input-sm sl_lotto' id='7_12_lotto_pay' name='7[12][lotto_pay]' onclick=\"generateSL('8',this,true);\">
													   <option value='0'>0</option>
													   <option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option></select>
													 <span class='hidden' id='k_7_12_lotto_pay' data-json='8'>%</span>
												   </div>
												 </div>
											   </td>
											   <td width='35%'>
												 <div class='col-xs-12 col-sm-12 col-md-12'>
												   <div class='clearfix  input-group'>
													 <select class='form-control input-sm sl_lotto' id='7_12_lotto_com' name='7[12][lotto_com]' onclick=\"generateSL('0',this,true);\">
													   <option value='0'>0</option>
													 </select>
													 <span class='input-group-addon' id='k_7_12_lotto_com' data-json='0'>%</span>
												   </div>
												 </div>
											   </td>
											 </tr>";
					                   $data["temp"].="</tbody>
					                        </table>
					                    </div>
					                </div>
					            </div>
					        </div>";
		}			        
		$data["temp"].= "</div>
					</div>";
	echo json_encode($data);


#######################################################################	
}else if($_POST["type"] == "lottoSet")
{


	$array_data = json_decode($_POST["arr"], true); 
	$data["arr"]["lottoSet"] = $array_data;
	$data["lotto_type"] = array(
				'0' =>   "2 ตัว" ,
				'6' =>   "เลขวิ่ง" ,
	);	

	$num_row = count($data["lotto_type"]);
	$is_row_divide = false;

	if($num_row > 7)
	{
		$row_divide = ceil($num_row/2);
		$is_row_divide = true;
	}else{
		$is_row_divide = false;
	}

	$data["temp"] =  "<div class='widget-main no-padding'>
	<div class='form-group'>
                          <div class='col-xs-12 col-sm-12 col-md-12'>
                            <div class='form-inline pull-left'>
                              <label class='inline'>
                                <input type='checkbox' class='ace' name='lotto_share_active' checked='checked'>
                                <span class='lbl'> หวยหุ้น </span>
                              </label>
                            </div>
                            <div class='form-inline pull-right'>
                              <button type='button' class='btn btn-white btn-warning btn-bold btn-sm' onclick=\"setMax('lotto_set');\">ค่าสูงสุด</button>
                            </div>
                          </div>
                        </div>
					    <div class='form-group'>";
			$data["temp"] .= "<div class='col-xs-12 col-sm-6'>
					            <div class='widget-box'>
					                <div class='widget-body'>
					                    <div class='table-responsive'>
					                        <table class='table table-bordered table-hover'>
					                            <thead>
					                                <tr>
					                                    <th class='text-center'>รายการ</th>
					                                    <th class='text-center'>อัตราจ่าย</th>
					                                    <th class='text-center'>ค่าคอม</th>
					                                </tr>
					                            </thead>
					                            <tbody>";
					                          $counter = 0;    	
					                         foreach ($data["lotto_type"] as $key => $value) {
					                         
					                      		if($is_row_divide)
					                      		{
					                      			$counter++; 
					                      		 	if($counter > $row_divide) 
					                      		 	{
					                      		 		break; 
					                      		 	} 
					                      		} 

					                      		$data["temp"] .= "<tr class='text-center'>
					                                    <td width='35%'>
					                                        ".$value."  <input type='hidden' name='lottoSet[".$key."][lotto_code]' value='".$array_data[$key]["main_lotto_code"]."'>
					                                    </td>
					                                    <td width='30%'>
					                                        <div class='col-sm-12'>
					                                            <div class='clearfix'>
					                                                <select class='form-control sl-width input-sm' name='lottoSet[".$key."][lotto_pay]'>";
					                                                          
                														for($i=0; $i<=intval($array_data[$key]["main_lotto_pay"]);$i ++)
                														{
                															$sl_row = "";
                															$sl_row = (intval($array_data[$key]["user_lotto_pay"]) == $i) ? "selected='selected'" : "";
                															$data["temp"].="<option value='".$i."' ".$sl_row."'>".$i."</option>";
                														}
                        										                 
                        							$data["temp"].=  "</select>
					                                            </div>
					                                        </div>
					                                    </td>
					                                    <td width='35%'>
					                                        <div class='col-sm-12'>
					                                            <div class='clearfix  input-group'>
					                                                <select class='form-control input-sm' name='lottoSet[".$key."][lotto_com]'>";
					                                                          
                														for($i=0; $i<=intval($array_data[$key]["main_lotto_com"]);$i ++)
                														{
                															$sl_row = "";
                															$sl_row = (intval($array_data[$key]["user_lotto_com"]) == $i) ? "selected='selected'" : "";
                															$data["temp"].="<option value='".$i."' ".$sl_row."'>".$i."</option>";
                														}
                        										                 
                        							$data["temp"].=  "</select>
					                                                <span class='input-group-addon'>%</span>
					                                            </div>
					                                        </div>
					                                    </td>
					                                </tr>";
					                         }  

					                                
					                                                                   
					                $data["temp"] .= "</tbody>
					                        </table>
					                    </div>
					                </div>
					            </div>
					        </div>";

				if($is_row_divide)
				{	
							$data["temp"] .= "<div class='col-xs-12 col-sm-6'>
									            <div class='widget-box'>
									                <div class='widget-body'>
									                    <div class='table-responsive'>
									                        <table class='table table-bordered table-hover'>
									                            <thead>
									                                <tr>
									                                    <th class='text-center'>รายการ</th>
									                                    <th class='text-center'>อัตราจ่าย</th>
									                                    <th class='text-center'>ค่าคอม</th>
									                                </tr>
									                            </thead>
									                            <tbody>";
									                               
									                        foreach (array_slice($data["lotto_type"],$row_divide, ($num_row-$row_divide), true) as $key => $value){
									                        
													$data["temp"] .= "<tr class='text-center'>
					               									   <td width='35%'>
					               									       ".$value."  <input type='hidden' name='lottoSet[".$key."][lotto_code]' value='".$array_data[$key]["main_lotto_code"]."'>
					               									   </td>
					               									   <td width='30%'>
					               									       <div class='col-sm-12'>
					               									           <div class='clearfix'>
					               									               <select class='form-control sl-width input-sm' name='lottoSet[".$key."][lotto_pay]'>";
					               									                         
                																			for($i=0; $i<=intval($array_data[$key]["main_lotto_pay"]);$i ++)
                																			{
                																				$sl_row = "";
                																				$sl_row = (intval($array_data[$key]["user_lotto_pay"]) == $i) ? "selected='selected'" : "";
                																				$data["temp"].="<option value='".$i."' ".$sl_row."'>".$i."</option>";
                																			}
                        															                 
                        												$data["temp"].=  "</select>
					               									           </div>
					               									       </div>
					               									   </td>
					               									   <td width='35%'>
					               									       <div class='col-sm-12'>
					               									           <div class='clearfix  input-group'>
					               									               <select class='form-control input-sm' name='lottoSet[".$key."][lotto_com]'>";
					               									                         
                																			for($i=0; $i<=intval($array_data[$key]["main_lotto_com"]);$i ++)
                																			{
                																				$sl_row = "";
                																				$sl_row = (intval($array_data[$key]["user_lotto_com"]) == $i) ? "selected='selected'" : "";
                																				$data["temp"].="<option value='".$i."' ".$sl_row."'>".$i."</option>";
                																			}
                        															                 
                        												$data["temp"].=  "</select>
					               									               <span class='input-group-addon'>%</span>
					               									           </div>
					               									       </div>
					               									   </td>
					               							  		 </tr>";

									                        }                                          
									                $data["temp"] .= "</tbody>
									                        </table>
									                    </div>
									                </div>
									            </div>
									        </div>";

				}

		$data["temp"] .= "</div>
					</div>";

					echo json_encode($data);

	
##############################################################	
}else if($_POST["type"] == "lottoLao")
{

	$array_data = json_decode($_POST["arr"], true); 
	$data["arr"]["lottoLao"] = $array_data;
	$data["lotto_type"] = array(
				'0' =>   "3 ตัวตรง",
				'1' =>   "3 ตัวโต๊ด",
				'2' =>   "2 ตัวตรง",
				'3' =>   "2 ตัวโต๊ด",
				'4' =>   "1 ตัววิ่ง",
				'5' =>   "สูง-ต่ำ",
				'6' =>   "คู่-คี่",
			
	);	
	$num_row = count($data["lotto_type"]);
	$is_row_divide = false;

	if($num_row > 5)
	{
		$row_divide = ceil($num_row/2);
		$is_row_divide = true;
	}else{
		$is_row_divide = false;
	}
	$data["temp"] = "<div id='lotto_lao' class='widget-main no-padding'>
	<div class='form-group'>
                        <div class='col-xs-12 col-sm-12 col-md-12'>
                          <div class='form-inline pull-left'>
                            <label class='inline'>
                              <input type='checkbox' class='ace' name='lotto_lao_active' checked='checked'>
                              <span class='lbl'> หวยชุด </span>
                            </label>
                          </div>
                          <div class='form-inline pull-right'>
                            <button type='button' class='btn btn-white btn-warning btn-bold btn-sm' onclick=\"setMax('lotto_lao');\">ค่าสูงสุด</button>
                          </div>
                        </div>
                      </div>
					    <div class='form-group'>";				        
			$data["temp"] .= "<div class='col-xs-12 col-sm-12 col-md-12'>
			<div class='widget-box'>
			  <div class='widget-body'>";
				$lot_type= array(1 =>"4 ตัวตรง", 2 =>"4 ตัวโต๊ด", 3 =>"3 ตัวตรง(หลัง)", 4 =>"3 ตัวหน้าตรง", 5 =>"3 ตัวโต๊ด(หลัง)", 6 =>"2 ตัวหน้า(2ล่าง)", 7 =>"2 ตัวตรง");
				$data["temp"] .= "<div class='table-responsive'>
				  <table class='table table-striped table-bordered table-hover' style='width: 99.9%;'>
					<thead>
					  <tr>
						<th class='text-center'>รายการ</th>
						<th class='text-center'>รางวัล , 0=ปิด</th>
						<th class='text-center'>ราคาส่ง</th>
					  </tr>
					</thead>
					<tbody>";

					               
                                    foreach ($lot_type as $key => $value) {
										$data["temp"] .= "<tr class='text-center'>
                                      <td width='35%'>".$value."</td>
                                      <td width='35%' class='lotto_lao_Input'>
                                        <input type='text' name='lot_hun_set_pay".$key."' id='' class='numeric maxLimit' value='50,000'>
                                        <span class='text-danger label-sm maxtransfer' id='lot_hun_set_pay_info' data-json='50,000'>(0-50,000) </span>
                                      </td>";
                                    if($key == 1){
										$data["temp"] .= "<td width='35%' rowspan='100%' style='vertical-align: top;' class='lotto_lao_Input'>
                                        <input type='text' name='lot_hun_set_price".$key."' id='' class='numeric maxLimit' value='50,000'>
                                        <span class='text-danger label-sm maxtransfer' id='lot_hun_set_price_info' data-json='50,000'>(0- 50,000) </span>
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

				if($is_row_divide)
				{
					
				}	
		$data["temp"] .= "</div>
					</div>";

			echo json_encode($data);			



	
#######################################################################################	
}else if($_POST[type] == "soccer")
{
	$array_data = json_decode($_POST["arr"], true); 
	$data["arr"]["soccer"] = $array_data;

	$data["temp"] = 		"<div class='form-group'>
	<div class='col-xs-12 col-sm-12 col-md-12'>
	  <div class='form-inline pull-left'>
		<label class='inline'>
		  <input type='checkbox' class='ace' name='soccer_today_active' checked=''>
		  <span class='lbl'>บอลก่อนแข่ง</span>
		</label> &nbsp;
		<label class='inline'>
		  <input type='checkbox' class='ace' name='soccer_live_active' checked=''>
		  <span class='lbl'> บอลกำลังแข่ง </span>
		</label>
	  </div>
	  <div class='form-inline pull-right'>
		<button type='button' class='btn btn-white btn-warning btn-bold btn-sm' onclick='setMax(\"soccer\");'>ค่าสูงสุด</button>
	  </div>
	</div>
  </div>
  <div class='form-group'>
             <div class='col-xs-12 col-sm-4'>
                 <label class='control-label col-xs-5 col-sm-4 no-padding-right' for='today_com'>ค่าคอม :</label>
                 <div class='col-xs-7 col-sm-8'>
                     <div class='clearfix input-group'>
                         <select class='form-control input-sm' id='today_com' name='today_com'>";
                           for($i=$array_data["min_soccer_today_com"]; $i<=$array_data["max_soccer_today_com"];$i += 0.05)
                		   {
                		   		$sl_row = "";
                		   		$sl_row = ($array_data["user_soccer_today_com"] == number_format($i,2)) ? "selected='selected'" : "";
                		   		$data["temp"].="<option value='".number_format($i,2)."' ".$sl_row."'>".number_format($i,2)."</option>";
                		   }
            $data["temp"] .="</select>
                         <span class='input-group-addon' id='k_today_com' data-json='0.50'>%</span>
                     </div>
                 </div>
             </div>
             <div class='col-xs-12 col-sm-4'>
                 <label class='control-label col-xs-5 col-sm-4 no-padding-right' for='torup'>เพิ่มราคาทีมต่อ :</label>
                 <div class='col-xs-7 col-sm-8'>
                     <div class='clearfix'>
                         <input type='text' class='col-sm-6 input-sm' name='torup' value='".number_format($array_data["user_soccer_torup"],2)."' readonly=''>
                     </div>
                 </div>
             </div>
             <div class='col-xs-12 col-sm-4'>
                 <label class='control-label col-xs-5 col-sm-4 no-padding-right' for='logup'>เพิ่มราคาทีมรอง :</label>
                 <div class='col-xs-7 col-sm-8'>
                     <div class='clearfix'>
                         <input type='text' class='col-sm-6 input-sm' name='logup' value='".number_format($array_data["user_soccer_logup"],2)."' readonly=''>
                     </div>
                 </div>
            </div>
         </div>   
         <div class='form-group'>
             <div class='col-xs-12 col-sm-4'>
                 <label class='control-label col-xs-5 col-sm-4 no-padding-right' for='live_betmoneymax_pair'>45 นาทีสูงสุด/คู่ :</label>
                 <div class='col-xs-7 col-sm-8'>
                     <div class='clearfix'>
                         <input type='text' name='live_betmoneymax_pair' id='live_betmoneymax_pair' class='numeric maxLimit' value='".number_format($array_data["user_live_betmoneymax_pair"])."'>
                         <span class='text-danger label-sm' id='k_live_betmoneymax_pair' data-json='".number_format($array_data["main_live_betmoneymax_pair"])."'>(&lt;= ".number_format($array_data["main_live_betmoneymax_pair"]).") </span>
                     </div>
                 </div>
             </div>
             <div class='col-xs-12 col-sm-4'>
                 <label class='control-label col-xs-5 col-sm-4 no-padding-right' for='live_betmax_money'>45 นาทีสูงสุด/ไม้ :</label>
                 <div class='col-xs-7 col-sm-8'>
                     <div class='clearfix'>
                         <input type='text' name='live_betmax_money' id='live_betmax_money' class='numeric maxLimit' value='".number_format($array_data["user_live_betmax_money"])."'>
                         <span class='text-danger label-sm' id='k_live_betmax_money' data-json='".number_format($array_data["main_live_betmax_money"])."'>(&lt;= ".number_format($array_data["main_live_betmax_money"]).") </span>
                     </div>
                 </div>  
             </div>
             <div class='col-xs-12 col-sm-4'>
                 <label class='control-label col-xs-5 col-sm-4 no-padding-right' for='live_betmin_money'>45 นาทีต่ำสุด/ไม้ :</label>
                 <div class='col-xs-7 col-sm-8'>
                     <div class='clearfix'>
                         <input type='text' name='live_betmin_money' id='live_betmin_money' class='numeric minLimit' value='".number_format($array_data["user_live_betmin_money"])."'>
                         <span class='text-danger label-sm' id='k_live_betmin_money' data-json='".number_format($array_data["main_live_betmin_money"])."'>(&gt;= ".number_format($array_data["main_live_betmin_money"]).") </span>
                     </div>
                 </div>
             </div>   
         </div>
         <div class='form-group'>
             <div class='col-xs-12 col-sm-4'>
                 <label class='control-label col-xs-5 col-sm-4 no-padding-right' for='live_fbetmoneymax_pair'>90 นาทีสูงสุด/คู่ :</label>
                 <div class='col-xs-7 col-sm-8'>
                     <div class='clearfix'>
                         <input type='text' name='live_fbetmoneymax_pair' id='live_fbetmoneymax_pair' class='numeric maxLimit' value='".number_format($array_data["user_live_fbetmoneymax_pair"])."'>
                         <span class='text-danger label-sm' id='k_live_fbetmoneymax_pair' data-json='".number_format($array_data["main_live_fbetmoneymax_pair"])."'>(&lt;= ".number_format($array_data["main_live_fbetmoneymax_pair"]).") </span>
                     </div>
                 </div>
             </div>
             <div class='col-xs-12 col-sm-4'>
                 <label class='control-label col-xs-5 col-sm-4 no-padding-right' for='live_fbetmax_money'>90 นาทีสูงสุด/ไม้ :</label>
                 <div class='col-xs-7 col-sm-8'>
                     <div class='clearfix'>
                         <input type='text' name='live_fbetmax_money' id='live_fbetmax_money' class='numeric maxLimit' value='".number_format($array_data["user_live_fbetmax_money"])."'>
                         <span class='text-danger label-sm' id='k_live_fbetmax_money' data-json='".number_format($array_data["main_live_fbetmax_money"])."'>(&lt;= ".number_format($array_data["main_live_fbetmax_money"]).") </span>
                     </div>
                 </div>
             </div>
             <div class='col-xs-12 col-sm-4'>
                 <label class='control-label col-xs-5 col-sm-4 no-padding-right' for='live_fbetmin_money'>90 นาทีต่ำสุด/ไม้ :</label>
                 <div class='col-xs-7 col-sm-8'>
                     <div class='clearfix'>
                         <input type='text' name='live_fbetmin_money' id='live_fbetmin_money' class='numeric minLimit' value='".number_format($array_data["user_main_live_fbetmin_money"])."'>
                         <span class='text-danger label-sm' id='k_live_fbetmin_money' data-json='".number_format($array_data["main_live_fbetmin_money"])."'>(&gt;= ".number_format($array_data["main_live_fbetmin_money"]).") </span>
                     </div>
                 </div>
             </div>
		 </div>
		 ";

         echo json_encode($data);
}

// echo json_encode($_POST[type]);
 ?>