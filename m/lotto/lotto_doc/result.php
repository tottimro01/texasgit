<?
	session_start();

    $head_title = $lang_member[50];

    // check time zone
	$tz = $timezoneArr[strtolower($_SESSION['m_timezone'])]['php_code'];
	try {
	    $date = new DateTime("now", new DateTimeZone($tz));
	    $userDateTimeNow = strtotime($date->format('Y-m-d H:i:s'));
	}catch (Exception $e) {
	    echo $e->getMessage();
	    exit(1);
	}


	$tz = $timezoneArr[strtolower($_SESSION['m_timezone'])]['php_code'];

	$arr = array();
	$i=0;
	$arr[$i]["block_name"] = "<?=$lang_member[686]?>";
	$arr[$i]["block_list"] = array();
	$zone_i = 18;
	$rob_i = 1;
	for($y=0;$y<$lot_zone_nrob[$zone_i];$y++){

		$zone=$zone_i;
		$rob=$rob_i;
		$sql="select * from bom_tb_lotto_ok where lot_zone=$zone and lot_rob=$rob order by ok_id desc limit 1";
		$rs=sql_array($sql);
		
		// ปรับเวลาปิดรับ ตาม timezone ของ user
		$olt = new DateTime(date("Y-m-d H:i:s",$rs["o_limit_time"]));
		$olt->setTimezone(new DateTimeZone($tz));
		$rs["o_limit_time"] = strtotime($olt->format('Y-m-d H:i:s'));

		$arr[$i]["block_list"][$y]["z_name"] = $lang_g['lotZone'][$zone_i]." ".$lang_member[688]." ".$rob_i;
		$arr[$i]["block_list"][$y]["z_status"] = $rs["o_status"];
		$arr[$i]["block_list"][$y]["z_close"] = $rs["o_limit_time"];
		$arr[$i]["block_list"][$y]["z_close_date"] = _cvf($rs["o_limit_time"] , 7);
		$arr[$i]["block_list"][$y]["z_close_time"] = date("H:i:s" , $rs["o_limit_time"]);
		$arr[$i]["block_list"][$y]["z_zone"] = $zone_i;
		$arr[$i]["block_list"][$y]["z_rob"] = $rob_i;
		$arr[$i]["block_list"][$y]["z_data"] = $rs;
		$rob_i++;
	}

	$lotzone_24  = json_encode($arr);
	  

		  	$arr = array();
	// --------------------- query หวยไทย
	$arr_lotto = array();
	
	$arr_lotto["block_name"] = $lang_member[568];
	$arr_lotto["block_show"] = 1;
	$arr_lotto["block_list"] = array();
	$zone_i = 1;
	$rob_i = 1;
	for($y=0;$y<$lot_zone_nrob[$zone_i];$y++){
	
		$zone=$zone_i;
		$rob=$rob_i;
		$sql="select * from bom_tb_lotto_ok where lot_zone=$zone and lot_rob=$rob order by ok_id desc limit 1";
		$rs=sql_array($sql);
	
		// ปรับเวลาปิดรับ ตาม timezone ของ user
		$olt = new DateTime(date("Y-m-d H:i:s",$rs["o_limit_time"]));
		$olt->setTimezone(new DateTimeZone($tz));
		$rs["o_limit_time"] = strtotime($olt->format('Y-m-d H:i:s'));

		$arr_lotto["block_list"][$y]["z_name"] = $lang_g['lotZone'][$zone_i].$lang_g['lotrob'][$rob_i];
		$arr_lotto["block_list"][$y]["z_status"] = $rs["o_status"];
		$arr_lotto["block_list"][$y]["z_close"] = $rs["o_limit_time"];
		$arr_lotto["block_list"][$y]["z_close_date"] = _cvf($rs["o_limit_time"] , 7);
		$arr_lotto["block_list"][$y]["z_close_time"] = date("H:i:s" , $rs["o_limit_time"]);
		$arr_lotto["block_list"][$y]["z_zone"] = $zone_i;
		$arr_lotto["block_list"][$y]["z_rob"] = $rob_i;
		$arr_lotto["block_list"][$y]["z_data"] = $rs;
	}
	// --------------------- end query หวยไทย

	$i=0;				
	$arr[$i]["block_name"] = $lang_g['lotZone'][2];
	$arr[$i]["block_show"] = 1;
	$arr[$i]["block_list"] = array();
	$zone_i = 2;
	$rob_i = 1;
	for($y=0;$y<$lot_zone_nrob[$zone_i];$y++){

		$zone=$zone_i;
		$rob=$rob_i;
		$sql="select * from bom_tb_lotto_ok where lot_zone=$zone and lot_rob=$rob order by ok_id desc limit 1";
		$rs=sql_array($sql);
		
		// ปรับเวลาปิดรับ ตาม timezone ของ user
		$olt = new DateTime(date("Y-m-d H:i:s",$rs["o_limit_time"]));
		$olt->setTimezone(new DateTimeZone($tz));
		$rs["o_limit_time"] = strtotime($olt->format('Y-m-d H:i:s'));

		$arr[$i]["block_list"][$y]["z_name"] = $lang_g['lotZone'][$zone_i].$lang_g['lotrob'][$rob_i];
		$arr[$i]["block_list"][$y]["z_status"] = $rs["o_status"];
		$arr[$i]["block_list"][$y]["z_close"] = $rs["o_limit_time"];
		$arr[$i]["block_list"][$y]["z_close_date"] = _cvf($rs["o_limit_time"] , 7);
		$arr[$i]["block_list"][$y]["z_close_time"] = date("H:i:s" , $rs["o_limit_time"]);
		$arr[$i]["block_list"][$y]["z_zone"] = $zone_i;
		$arr[$i]["block_list"][$y]["z_rob"] = $rob_i;
		$arr[$i]["block_list"][$y]["z_data"] = $rs;
		$rob_i++;
	}
		
	$zone_i = 19;
	$rob_i = 1;
	for($yx=0;$yx<$lot_zone_nrob[$zone_i];$yx++){
		
		$zone=$zone_i;
		$rob=$rob_i;
		$sql="select * from bom_tb_lotto_ok where lot_zone=$zone and lot_rob=$rob order by ok_id desc limit 1";
		$rs=sql_array($sql);
		
		// ปรับเวลาปิดรับ ตาม timezone ของ user
		$olt = new DateTime(date("Y-m-d H:i:s",$rs["o_limit_time"]));
		$olt->setTimezone(new DateTimeZone($tz));
		$rs["o_limit_time"] = strtotime($olt->format('Y-m-d H:i:s'));

		$arr[$i]["block_list"][$y]["z_name"] = $lang_g['lotZone'][$zone_i]." ".$lang_member[643]." ".$lot_robmun[$rob_i];
		$arr[$i]["block_list"][$y]["z_status"] = $rs["o_status"];
		$arr[$i]["block_list"][$y]["z_close"] = $rs["o_limit_time"];
		$arr[$i]["block_list"][$y]["z_close_date"] = _cvf($rs["o_limit_time"] , 7);
		$arr[$i]["block_list"][$y]["z_close_time"] = date("H:i:s" , $rs["o_limit_time"]);
		$arr[$i]["block_list"][$y]["z_zone"] = $zone_i;
		$arr[$i]["block_list"][$y]["z_rob"] = $rob_i;
		$arr[$i]["block_list"][$y]["z_data"] = $rs;
		$rob_i++;
		$y++;
	}

	$i=1;
	$arr[$i]["block_name"] = $lang_member[684];
	$arr[$i]["block_show"] = 1;
	$arr[$i]["block_list"] = array();
	$nr=0;
	for($x=3;$x<18;$x++){
		$zone_i = $x;
		$rob_i = 1;
		for($y=0;$y<$lot_zone_nrob[$zone_i];$y++){
			
			$zone=$zone_i;
			$rob=$rob_i;
			$sql="select * from bom_tb_lotto_ok where lot_zone=$zone and lot_rob=$rob order by ok_id desc limit 1";
			$rs=sql_array($sql);
			
			// ปรับเวลาปิดรับ ตาม timezone ของ user
			$olt = new DateTime(date("Y-m-d H:i:s",$rs["o_limit_time"]));
			$olt->setTimezone(new DateTimeZone($tz));
			$rs["o_limit_time"] = strtotime($olt->format('Y-m-d H:i:s'));
			

			$arr[$i]["block_list"][$nr]["z_name"] = $lang_g['lotZone'][$zone_i].($lot_zone_nrob[$zone_i] > 1 ? $lang_g['lotrob'][$rob_i] : '');
			$arr[$i]["block_list"][$nr]["z_status"] = $rs["o_status"];
			$arr[$i]["block_list"][$nr]["z_close"] = $rs["o_limit_time"];
			$arr[$i]["block_list"][$nr]["z_close_date"] = _cvf($rs["o_limit_time"] , 7);
			$arr[$i]["block_list"][$nr]["z_close_time"] = date("H:i:s" , $rs["o_limit_time"]);
			$arr[$i]["block_list"][$nr]["z_zone"] = $zone_i;
			$arr[$i]["block_list"][$nr]["z_rob"] = $rob_i;
			$arr[$i]["block_list"][$nr]["z_data"] = $rs;
			$rob_i++;
			$nr++;
		}
	}

	$lotzone = json_encode($arr);

			
	// $lotzone_open = explode(",", $rec["con_open_lotto_hun_new"]);
       $lotzone = json_decode($lotzone,true);
       // var_dump($lotzone);
        $lotzone_24 = json_decode($lotzone_24,true);
?>
<div class="h-100">
	<div class="h-100">
		<div class="h-100" style="overflow-y: auto;">

			<div class="d-flex flex-column h-100">
		
				<div class="p-1 mb-2 text-center text-white rounded-top m_bg">
					<h6 class="m-0"><?=$head_title;?></h6>
				</div>

				<div>
					<form action="process/get_result.php" method="get" id="form_result" class="auto-form" data-onsuccess="renderResultTable" data-oninit="addLoadingTask" data-oncomplete="subtractLoadingTask" data-onfail="toastSaveError">
						<fieldset>
							<div class="row no-gutters mb-2">
								<div class="col-4 offset-2">
									<label class="checkbox-checkmark my-0 d-flex">
										<input type="radio" name="result_type" value="date" class="hideInput rdo_select_s" checked="checked" />
										<span class="checkmark">
											<span class="onCheck d_block"></span>
											<span class="onUncheck d_block"></span>
										</span>
										<span class="ml-2"><?=$lang_member[2283];?></span>
									</label>
								</div>
								<div class="col-4">
									<label class="checkbox-checkmark my-0 d-flex">
										<input type="radio" name="result_type" value="type" class="hideInput rdo_select_s" />
										<span class="checkmark">
											<span class="onCheck d_block"></span>
											<span class="onUncheck d_block"></span>
										</span>
										<span class="ml-2"><?=$lang_member[2284];?></span>
									</label>
								</div>
							</div>
							<div class="text-center s_s h_date">
								<input type="hidden" name="date" id="date" />
								<input type="text" id="datepicker" name="datepicker" class="border form-control-sm border-dark p-1 rounded-pill text-center w-75" />
							</div>
							<div class="text-center s_s h_type">
								<select name="zone" id="zone" class="custom-select pl-3 custom-select-sm m_bg rounded-pill w-75 text-white border-0">
									<option value="<?='1_1';?>"><?=$arr_lotto["block_name"];?></option>
								<? 	foreach ($lotzone as $k1 => $v1) { 
										foreach ($v1 as $k2 => $v2) { 
											foreach ($v2 as $k3 => $v3) { 
								?>
									<option value="<?=$v3['z_zone'].'_'.$v3['z_rob'];?>"><?=$v3['z_name'];?></option>
								<? }}} ?>
								<? 	foreach ($lotzone_24 as $k1 => $v1) { 
										foreach ($v1 as $k2 => $v2) { 
											foreach ($v2 as $k3 => $v3) { 
								?>
									<option value="<?=$v3['z_zone'].'_'.$v3['z_rob'];?>"><?=$v3['z_name'];?></option>
								<? }}} ?>
								</select>
							</div>
							<div class="mb-2"></div>
						</fieldset>
					</form>
					<hr class="s_s h_date mt-0 mb-0" />
					<hr class="s_s h_type mt-0 mb-0" />	

				</div>
				

				<div class="lotto-scroll-area">
					<div class="s_s h_date result_container">
					</div>
					
					<div class="s_s h_type result_container">
					</div>

				</div>

			</div>

  		</div>
	</div>
</div>
<script id="tmpl_result_date" type="text/x-jsrender">
{{for result}}
	<div>
		<div><h6 class="mt-3">{{:name}} - {{:date}}</h6></div>
		<table class="table table-bordered small text-center mb-2 m_bd_color">
			<tbody>
				{{if zone == 1}}
					<tr class="m_bg text-white font-weight-bold">
						<td class="p-2"><?=$lang_member[2196];?></td>
						<td class="p-2"><?=$lang_member[2197];?></td>
						<td class="p-2"><?=$lang_member[461];?></td>
						<td class="p-2"><?=$lang_member[388];?></td>
					</tr>
					{{for data}}
					<tr class="font-weight-bold {{if wait === true}}text-muted{{/if}}">
						<td class="p-1">{{:num1}}</td>
						<td class="p-1">{{:num2}}</td>
						<td class="p-1">{{:num3_1}} {{if wait !== true}}{{:num3_2}}{{/if}}</td>
						<td class="p-1">{{:num3_3}} {{if wait !== true}}{{:num3_4}}{{/if}}</td>
					</tr>
					{{/for}}
				{{else}}
					<tr class="m_bg text-white font-weight-bold">
						<td class="p-2"><?=$lang_member[643];?></td>
						<td class="p-2"><?=$lang_member[2285];?></td>
						<td class="p-2"><?=$lang_member[2203];?></td>
					</tr>
					{{for data}}
					<tr class="font-weight-bold {{if wait === true}}text-muted{{/if}}">
						<td class="p-1 text-dark">{{:rob}}</td>
						<td class="p-1">{{:num3}}</td>
						<td class="p-1">{{:num2}}</td>
					</tr>
					{{/for}}
				{{/if}}
			</tbody>
		</table>
	</div>
	<hr class="m-0" />
{{/for}}
</script>
<script id="tmpl_result_type" type="text/x-jsrender">
{{for result}}
	<div>
		<div><h6 class="mt-3">{{:name}} - {{:date}}</h6></div>
		<table class="table table-bordered small text-center mb-2 m_bd_color">
			<tbody>
				{{if zone == 1}}
					<tr class="m_bg text-white font-weight-bold">
						<td class="p-2"><?=$lang_member[2196];?></td>
						<td class="p-2"><?=$lang_member[2197];?></td>
						<td class="p-2"><?=$lang_member[461];?></td>
						<td class="p-2"><?=$lang_member[388];?></td>
					</tr>
					<tr class="font-weight-bold {{if wait === true}}text-muted{{/if}}">
						<td class="p-1 {{if wait !== true}}text-danger{{/if}}">{{:num1}}</td>
						<td class="p-1 {{if wait !== true}}text-primary{{/if}}"">{{:num2}}</td>
						<td class="p-1 {{if wait !== true}}text-success{{/if}}"">{{:num3_1}} {{if wait !== true}}{{:num3_2}}{{/if}}</td>
						<td class="p-1 {{if wait !== true}}text-success{{/if}}"">{{:num3_3}} {{if wait !== true}}{{:num3_4}}{{/if}}</td>
					</tr>
				{{else}}
					<tr class="m_bg text-white font-weight-bold">
						<td class="p-2"><?=$lang_member[643];?></td>
						<td class="p-2"><?=$lang_member[2285];?></td>
						<td class="p-2"><?=$lang_member[2203];?></td>
					</tr>
					<tr class="font-weight-bold {{if wait === true}}text-muted{{/if}}">
						<td class="p-1 text-dark">{{:name}}</td>
						<td class="p-1">{{:num3}}</td>
						<td class="p-1">{{:num2}}</td>
					</tr>
				{{/if}}
			</tbody>
		</table>
	</div>
	<hr class="m-0" />
{{/for}}
</script>
<script>
	$(document).off('change', 'input[name="result_type"]');
	$(document).off('change', '#zone');
	var loadResultJob = 0;
	$('#datepicker').datepicker({
		maxDate: "0",
		minDate: "-30d",
		defaultDate: "0",
		dateFormat: "dd MM yy",
		altField: "#date",
		altFormat: "dd-mm-yy",
		beforeShow: function (input, inst) {
        	setTimeout(function(){
            	inst.dpDiv.outerWidth($(input).outerWidth());
        	}, 0);
    	},
    	onSelect: function(date){
    		$('#form_result').trigger('submit');
    	},
	});
	$('.ui-datepicker').wrap('<div class="jsui" />');
	$('#datepicker').datepicker('setDate', new Date());

	$(document).on('change', 'input[name="result_type"]', function(event){
		event.preventDefault();
		var s = $('input[name="result_type"]:checked').val();
		$('.s_s').hide();
		$('.s_s.h_'+s).show();
		if(s == 'type' && loadResultJob < 2){
			$('#form_result').trigger('submit');
		}
	});
	$('input[name="result_type"]').first().trigger('change');

	$(document).on('change', '#zone', function(event) {
		event.preventDefault();
		$('#form_result').trigger('submit');
	});

	$('#form_result').trigger('submit');
	function renderResultTable(form, data){
		var s = $('input[name="result_type"]:checked').val();
		if(s == 'type'){
			loadResultJob++;
		}

		var d = {result: data };
		var tmpl = $.templates('#tmpl_result_'+s);
		var html = tmpl.render(d);
		$('.result_container.h_'+s).html(html);
	}
</script>