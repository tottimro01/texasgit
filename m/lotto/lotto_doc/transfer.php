<?
	session_start();

    $head_title = $lang_member[39];
	$rs_mems = sql_array("select * from bom_tb_member where m_id='".$_SESSION['m_id']."'");
	$rs_cset = sql_array("select * from bom_tb_agent where r_id = '".$_SESSION['cr_id']."'");

?>
<div class="h-100">
	<div class="h-100">
		<div class="h-100" style="overflow-y: auto;">

			<div class="d-flex flex-column h-100">
		
				<div class="p-1 mb-2 text-center text-white rounded-top m_bg">
					<h6 class="m-0"><?=$head_title;?></h6>
				</div>

				<div>
					<form action="" method="get">
						<fieldset>
							<div class="row no-gutters mb-2">
								<div class="col-4 offset-2">
									<label class="checkbox-checkmark my-0 d-flex">
										<input type="radio" name="transfer_page" value="transfer" class="hideInput rdo_select_s" checked="checked" />
										<span class="checkmark">
											<span class="onCheck d_block"></span>
											<span class="onUncheck d_block"></span>
										</span>
										<span class="ml-2"><?=$lang_member[965];?></span>
									</label>
								</div>
								<div class="col-4">
									<label class="checkbox-checkmark my-0 d-flex">
										<input type="radio" name="transfer_page" value="withdraw" class="hideInput rdo_select_s" />
										<span class="checkmark">
											<span class="onCheck d_block"></span>
											<span class="onUncheck d_block"></span>
										</span>
										<span class="ml-2"><?=$lang_member[966];?></span>
									</label>
								</div>
							</div>
							
						</fieldset>
					</form>

				</div>

				<div class="s_s h_transfer">
					<div>
						<form action="process/save_transfer.php" method="post" class="auto-form" data-onsuccess="saveTransferCallback" data-oninit="addLoadingTask" data-oncomplete="subtractLoadingTask" data-onfail="toastSaveError">
							<fieldset>
								<table class="table table-bordered m_bd_color mb-1">
									<tbody>
										<tr>
											<td class="text-white m_bg p-1 text-right" style="vertical-align: middle;"><?=$lang_member[975];?>:</td>
											<td class="p-1" colspan="2">

											<?
												if($rs_mems["bank_id"]>0 and $rs_mems["bank_id"]!=""){
													$rs_bank_mem = sql_array("select * from bom_tb_bank where bank_id = '".$rs_mems['bank_id']."'");
											?>
											<div>
												<input type="hidden" value="<?=substr($rs_bank_mem['bank_code'] , 6 , 4)?>" name="tbankcode" />
												<table class="table-borderless small mb-0">
													<tr>
														<td rowspan="2" class="p-0">
															<img src="assets/img/bank/b<?=$rs_bank_mem['bank_name'];?>.png" />
														</td>
														<td class="p-0">
															<span><?=$ab_bank[$rs_bank_mem['bank_name']];?></span>
															<span class="font-weight-bold text-primary"><?=$rs_bank_mem['bank_cname'];?></span>
														</td>
													</tr>
													<tr>
														<td class="p-0">
															<span class="font-weight-bold"><?=_bankok($rs_bank_mem['bank_code']);?></span>
															<input type="hidden" value="<?=$rs_bank_mem['bank_name']?>" name="tbank">
														</td>
													</tr>
												</table>
											</div>
											<? 	
												}else{
											?>
												<select name="tbank" id="tbank" required class="custom-select custom-select-sm m_bg small text-white py-1 px-3 w-75 rounded-pill">
      												<?for($x=1;$x<=count($ab_bank)-2;$x++){?>
      												<option value="<?=$x;?>"><?=$ab_bank[$x];?></option>
      												<?}?>
    											</select>
											<? } ?>
											</td>
										</tr>
										<? if($rs_mems["bank_id"]<=0 or $rs_mems["bank_id"]==""){ ?>
										<tr>
											<td class="text-white m_bg p-1 text-right" style="vertical-align: middle;"><?=$lang_member[976];?>:</td>
											<td class="p-1" colspan="2" style="vertical-align: middle;">
												<input type="text" class="form-control form-control-sm control-sc inputFilter text-center" name="tbankcode" data-filter-type="numeric" data-filter-add-comma="false" maxlength="4" minlength="4">
											</td>
										</tr>
										<? } ?>
										<tr>
											<td class="text-white m_bg p-1 text-right" style="vertical-align: middle;"><?=$lang_member[146];?>:</td>
											<td colspan="2" class="border-right-0 p-1" style="vertical-align: middle;">
												<input type="hidden" name="tdd" id="date" />
												<input type="text" id="datepicker" name="datepicker" class="border form-control-sm border-dark p-1 rounded-pill text-center w-50" />

												<select id="thh" name="thh" class="border form-control-sm border-dark p-1 rounded-pill text-center" required>
                  									<?for($x=0;$x<=23;$x++){?>
                  									<option value="<?=sprintf("%02d",$x)?>"><?=sprintf("%02d",$x)?></option>
                  									<?}?>
                								</select>

                								<select id="tmm" name="tmm" class="border form-control-sm border-dark p-1 rounded-pill text-center">
                								  	<?for($x=0;$x<=59;$x++){?>
                								  	<option value="<?=sprintf("%02d",$x)?>"><?=sprintf("%02d",$x)?></option>
                								  	<?}?>        
                								</select>
											</td>
										</tr>
										<tr>
											<td class="text-white m_bg p-1 text-right" style="vertical-align: middle;"><?=$lang_member[969];?>:</td>
											<td class="border-right-0 p-1" style="vertical-align: middle;">
												<input type="text" class="form-control form-control-sm control-sc inputFilter text-center" name="tcount" data-filter-type="integer" data-filter-add-comma="false" >
											</td>
											<td class="border-left-0 p-1 m_color small">
												<div>
													<?=$lang_member[1659];?> <?=number_format($rs_cset["r_m_deposit_min"] , 2)?> <?=$_SESSION['m1']['m_currency']?>
												</div>
												<div>
													<?=$lang_member[1660];?> <?=number_format($rs_cset["r_m_deposit_max"] , 2)?> <?=$_SESSION['m1']['m_currency']?>
												</div>
											</td>
										</tr>
										<tr>
											<td class="p-1 text-center" colspan="3">
												<button class="btn btn-sm m_bg_gd w-50 text-white rounded-pill"><?=$lang_member[121];?></button>
											</td>
										</tr>
									</tbody>
								</table>
							</fieldset>
						</form>
					</div>
					
					<div>
						<table class="m_bg text-white text-center small font-weight-bold table w-100 m_bd_color mb-0" style="table-layout: fixed;">
							<tr>
								<td class="p-1"><?=$lang_member[971];?></td>
								<td class="p-1"><?=$lang_member[77];?></td>
								<td class="p-1"><?=$lang_member[969];?></td>
								<td class="p-1"><?=$lang_member[301];?></td>
							</tr>
						</table>
					</div>
				</div>
				
				<div class="s_s h_withdraw">

					<div>
						<?
							$rs_mems = sql_array("select * from bom_tb_member where m_id='".$_SESSION['m_id']."'");
						?>
						<form action="process/save_withdraw.php" method="post" class="auto-form" data-onsuccess="saveWithdrawCallback" data-oninit="addLoadingTask" data-oncomplete="subtractLoadingTask" data-onfail="toastSaveError">
							<fieldset>
								<table class="table table-bordered m_bd_color mb_1">
									<tbody>
										<tr>
											<td class="text-white m_bg p-1 text-right" style="vertical-align: middle;"><?=$lang_member[981];?>:</td>
											<td class="p-1" colspan="2">

											<?
												if($_SESSION['m1']['m_b_bank']>0){
											?>
											<div>
												<input type="hidden" value="<?=substr($rs_bank_mem['bank_code'] , 6 , 4)?>" name="tbankcode" />
												<table class="table-borderless small mb-0">
													<tr>
														<td rowspan="2" class="p-0">
															<img src="assets/img/bank/b<?=$_SESSION['m1']['m_b_bank'];?>.png" />
														</td>
														<td class="p-0">
															<span><?=$ab_bank[$_SESSION['m1']['m_b_bank']];?></span>
															<span class="font-weight-bold text-primary"><?=$_SESSION['m1']['m_b_name'];?></span>
														</td>
													</tr>
													<tr>
														<td class="p-0">
															<span class="font-weight-bold"><?=_bankok($_SESSION['m1']['m_b_code']);?></span>
														</td>
													</tr>
												</table>
											</div>
											<? 	
												}else{
											?>
												<select name="tbank" id="tbank" required class="custom-select custom-select-sm m_bg small text-white py-1 px-3 w-75 rounded-pill">
      												<?for($x=1;$x<=count($ab_bank)-2;$x++){?>
      												<option value="<?=$x;?>"><?=$ab_bank[$x];?></option>
      												<?}?>
    											</select>
											<? } ?>
											</td>
										</tr>
										<tr>
											<td class="text-white m_bg p-1 text-right" style="vertical-align: middle;"><?=$lang_member[969];?>:</td>
											<td class="border-right-0 p-1" style="vertical-align: middle;">
												<input type="text" class="form-control form-control-sm control-sc inputFilter text-center" name="tcount" data-filter-type="integer" data-filter-add-comma="false">
											</td>
											<td class="border-left-0  p-1 m_color small">
												<div>
													<?=$lang_member[1661];?> <?=number_format($rs_cset["r_m_withdraw_min"] , 2)?> <?=$_SESSION['m1']['m_currency']?>
												</div>
												<div>
													<?=$lang_member[1662];?> <?=number_format($rs_cset["r_m_withdraw_max"] , 2)?> <?=$_SESSION['m1']['m_currency']?>
												</div>
											</td>
										</tr>
										<tr>
											<td class="text-white m_bg p-1 text-right" style="vertical-align: middle;"><?=$lang_member[974];?>:</td>
											<td class="border-right-0 p-1" style="vertical-align: middle;">
												<input type="text" class="form-control form-control-sm control-sc inputFilter text-center" name="tcode" data-filter-type="numeric" data-filter-add-comma="false" maxlength="4" minlength="4" autocomplete="off">
												<? if($_SESSION['m1']['m_b_pass']!=""){ echo'***'.substr($_SESSION['m1']['m_b_pass'] , -1);}?>
											</td>
											<td class="border-left-0 p-1"></td>
										</tr>
										<tr>
											<td class="p-1 text-center" colspan="3">
												<button class="btn btn-sm m_bg_gd w-50 text-white rounded-pill"><?=$lang_member[121];?></button>
											</td>
										</tr>
									</tbody>
								</table>
							</fieldset>
						</form>
					</div>

					<div>
						<table class="m_bg text-white text-center small font-weight-bold table w-100 m_bd_color mb-0" style="table-layout: fixed;">
							<tr>
								<td class="p-1"><?=$lang_member[971];?></td>
								<td class="p-1"><?=$lang_member[972];?></td>
								<td class="p-1"><?=$lang_member[969];?></td>
								<td class="p-1"><?=$lang_member[301];?></td>
							</tr>
						</table>
					</div>
				</div>
				
				<div class="lotto-scroll-area">
					<div class="s_s h_transfer">
						<table class="table table-borderless m_bd_color w-100 small mb-0" cellspacing="3" style="table-layout: fixed;">
							<tbody id="tf_body" class="tf_tbody"></tbody>
						</table>
					</div>

					<div class="s_s h_withdraw">
						<table class="table table-borderless m_bd_color w-100 small mb-0" cellspacing="3" style="table-layout: fixed;">
							<tbody id="wd_body" class="tf_tbody"></tbody>
						</table>
					</div>

				</div>

			</div>

  		</div>
	</div>
</div>
<form action="process/get_transfer_list.php" method="get" class="auto-form" id="form_transfer_list" data-oninit="pauseTfInterval" data-onsuccess="renderTranferListTable" data-onfail="updateTfInterval"><fieldset></fieldset></form>
<script id="tmpl_transfer_list" type="text/x-jsrender">
{{for transfer}}
	<tr>
		<td class="date">
			<span class="no small">{{:no}}</span>
			<span class="time small text-muted">{{:time}}</span>
			<div class="mt-2">{{:date}}</div>
		</td>
		<td>
			<div>
				<div>{{:bank}}</div>
				<div class="font-weight-bold">{{:bank_num}}</div>
			</div>
		
		</td>
		<td><div class="font-weight-bold">{{:amount}}</div></td>
		<td class="{{if status == 1}}text-success{{else status == 2}}text-danger{{/if}}">{{:status_txt}}</td>
	</tr>
{{/for}}
</script>
<script id="tmpl_withdraw_list" type="text/x-jsrender">
{{for withdraw}}
	<tr>
		<td class="date">
			<span class="no small">{{:no}}</span>
			<span class="time small text-muted">{{:time}}</span>
			<div class="mt-2">{{:date}}</div>
		</td>
		<td>
			<div>
				<div>{{:bank}}</div>
				<div class="font-weight-bold">{{:bank_num}}</div>
			</div>
		
		</td>
		<td><div class="font-weight-bold">{{:amount}}</div></td>
		<td class="{{if status == 1}}text-success{{else status == 2}}text-danger{{/if}}">{{:status_txt}}</td>
	</tr>
{{/for}}
</script>
<script>
	$(document).off('change', 'input[name="transfer_page"]');

	$('#datepicker').datepicker({
		maxDate: "0",
		defaultDate: "0",
		dateFormat: "dd MM yy",
		altField: "#date",
		altFormat: "dd-mm-yy",
		beforeShow: function (input, inst) {
        	setTimeout(function(){
            	// inst.dpDiv.outerWidth($(input).outerWidth());
        	}, 0);
    	},
    	onSelect: function(date){
    		$('#form_result').trigger('submit');
    	},
	});
	$('.ui-datepicker').wrap('<div class="jsui" />');
	$('#datepicker').datepicker('setDate', new Date());

	$(document).on('change', 'input[name="transfer_page"]', function(event){
		event.preventDefault();
		var s = $('input[name="transfer_page"]:checked').val();
		$('.s_s').hide();
		$('.s_s.h_'+s).show();
	});
	$('input[name="transfer_page"]').first().trigger('change');

	function saveTransferCallback(form, data){
		if(data.status == 1){
			toastSaveSuccess();
			form.reset();
			$('#datepicker').datepicker('setDate', new Date());
			$('#form_transfer_list').trigger('submit');
		}else{
			toastSaveError();
		}
	}

	function saveWithdrawCallback(form, data){
		if(data.status == 1){
			toastSaveSuccess();
			form.reset();
			$('#form_transfer_list').trigger('submit');
		}else{
			toastSaveError();
		}
	}

	$('#form_transfer_list').trigger('submit');
	var nextUpdateTfList = 0;
	if(typeof tfInterval != 'undefined'){
		clearInterval(tfInterval);
	}
	var tfInterval = setInterval(function(){
		let n = new Date().getTime();
		if(nextUpdateTfList != 0 && nextUpdateTfList < n){
			$('#form_transfer_list').trigger('submit');
		}
	}, 1000);

	function pauseTfInterval(){
		nextUpdateTfList = 0;
	}

	function updateTfInterval(){
		nextUpdateTfList = new Date().getTime() + (10 * 1000);
	}

	function renderTranferListTable(form, data){
		var d = {transfer: data.transfer };
		var tmpl = $.templates('#tmpl_transfer_list');
		var html = tmpl.render(d);
		$('#tf_body').html(html);
	
		d = {withdraw: data.withdraw };
		tmpl = $.templates('#tmpl_withdraw_list');
		html = tmpl.render(d);
		$('#wd_body').html(html);
		updateTfInterval();
	}

</script>