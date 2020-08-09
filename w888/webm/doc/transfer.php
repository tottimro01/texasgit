<?
	session_start();

    $head_title = $lang_member[39];
	$rs_mems = sql_array("select * from bom_tb_member where m_id='".$_SESSION['m_id']."'");
	$rs_cset = sql_array("select * from bom_tb_agent where r_id = '".$_SESSION['cr_id']."'");

	$sql = "SELECT * FROM `bom_tb_bank` WHERE `r_id` = ".$_SESSION["cr_id"]." ORDER BY bank_id DESC";
    $re_bank = sql_query($sql);

?>
<style>
	.tf-arrow > img{
		width: 40px;
		height: 30px;
	}
</style>

<div class="h-100">
	<div class="h-100">
		<div class="h-100" style="overflow-y: auto;">

			<div class="d-flex flex-column h-100">

				<div>
					<nav class='nav nav-pills nav-justified'>
   		 				<a class="nav-item nav-link nav-page-transfer border-right-1 m_bf_color" href="#" onclick="DisplayTransfer('TRANSFER');"><?=$lang_member[965];?></a>
   						<a class="nav-item nav-link nav-page-withdraw" href="#" onclick="DisplayTransfer('WITHDRAW');"><?=$lang_member[966];?></a>
   					</nav>
				</div>

				<br>

				<div class="list-group" style="width: 92%; margin: auto; padding-top: 10px;"> <!-- container -->
					<div class="list-group-item">
					<div style="width: 95%" class="mx-auto">

					<div class="s_s h_transfer">
						<div>
							<form action="process/save_transfer.php" method="post" class="auto-form" data-onsuccess="saveTransferCallback" data-oninit="" data-oncomplete="" data-onfail="toastSaveError">
								<fieldset>

									<? if($_SESSION['m1']['m_b_bank']!="" && $_SESSION['m1']['m_b_bank'] != 0){ ?>
									<div>
									  <div class="d-flex align-items-center justify-content-center">
									  	<div>
									  		<div class="font-weight-bold"><?=$lang_member[2374];?>: </div>
									  	</div>
									  	<div class="d-flex">
									  		<img src="Images/bank/b<?=$_SESSION['m1']['m_b_bank'];?>.png" / >
									        <div>
									         	<div class="font-weight-bold"><?=$ab_bank[$_SESSION['m1']['m_b_bank']];?> <?=$_SESSION['m1']['m_b_name'];?></div>
									          	<div class="font-weight-bold"><?=_bankok($_SESSION['m1']['m_b_code']);?></div>
									        </div>
									  	</div>
									  </div>
									</div>
									<? }else{ ?>
									<div>
									  	<div class="text-center">
											<a href="#" onclick="openUserBankAdd(event); return false;" class="bg-transparent border-0">
												<img src="Images/transfer/add-icon.png" alt="" style="width: 40px;">
											</a>
									    </div>
									</div>
									<? } ?>
									
									<div class="text-center tf-arrow my-3">
									  	<img src="Images/transfer/arrow_down.png" />
									</div>

									<? if($rs_mems["m_b_type"] == 2){ ?>
										<div class="text-center">
									        <img src="Images/transfer/AutoV3.png" alt="AUTO" style="width: 120px;">
									    </div>
									<? }else{ ?>
										<div class="text-white p-1"><?=$lang_member[969];?>:</div>
										<div class="border-right-0 p-1">
											<input type="text" class="form-control-sm flex-item border m_bd_color inputFilter text-center text-white w-100" name="tcount" data-filter-type="integer" data-filter-add-comma="false" >
										</div>

										<div class="text-white p-1"><?=$lang_member[146];?>:</div>
										<div class="border-right-0 p-1">
											<input type="hidden" name="tdd" id="date" />
											<div class="d-flex">
												<input type="text" id="datepicker" name="datepicker" class="form-control-sm p-1 text-center flex-fill text-white flex-item " />
										
												<select id="thh" name="thh" class="w-25 ml-1 form-control-sm p-1 text-center m-0 flex-item text-white" required>
													<?for($x=0;$x<=23;$x++){?>
													<option value="<?=sprintf("%02d",$x)?>"><?=sprintf("%02d",$x)?></option>
													<?}?>
												</select>
										
												<select id="tmm" name="tmm" class="w-25 ml-1 form-control-sm p-1 text-center m-0 flex-item text-white">
												  	<?for($x=0;$x<=59;$x++){?>
												  	<option value="<?=sprintf("%02d",$x)?>"><?=sprintf("%02d",$x)?></option>
												  	<?}?>        
												</select>
											</div>
										</div>

										<div>
											<div class="text-danger small mt-1">
											<div>
												<?=$lang_member[1659];?> <?=number_format($rs_cset["r_m_deposit_min"] , 2)?> <?=$_SESSION['m1']['m_currency']?>
											</div>
											<div>
												<?=$lang_member[1660];?> <?=number_format($rs_cset["r_m_deposit_max"] , 2)?> <?=$_SESSION['m1']['m_currency']?>
											</div>
										</div>
										</div>
										<div class="text-center mt-2">
											<button class="btn btn-sm flex-item active" onclick="submitTrigger(this); return false;"><?=$lang_member[121];?></button>
										</div>
									<? } ?>
									
									<div class="text-center tf-arrow my-3">
									  	<img src="Images/transfer/arrow_down.png" />
									</div>
									
									<?
									    if($rs_mems["bank_id"]>0 and $rs_mems["bank_id"]!=""){
									      	$rs_bank_mem = sql_array("select * from bom_tb_bank where bank_id = '".$rs_mems['bank_id']."'");
									?>
									<div>
									  <div class="d-flex align-items-center justify-content-center">
									  	<div>
									  		<div class="font-weight-bold"><?=$lang_member[2375];?>: </div>
									  	</div>
									  	<div class="d-flex">
									  		<img src="Images/bank/b<?=$rs_bank_mem['bank_name'];?>.png" / >
									  		<div>
									         	<div class="font-weight-bold"><?=$ab_bank[$rs_bank_mem['bank_name']];?> <?=$rs_bank_mem['bank_cname'];?></div>
									          	<div class="font-weight-bold"><?=_bankok($rs_bank_mem['bank_code']);?></div>
									        </div>
									    	<input type="hidden" value="<?=$rs_bank_mem['bank_name']?>" name="tbank">
									  	</div>
									  </div>
									</div>
									<?
									    }else{
									?>
									<div class="text-white p-1"><?=$lang_member[2375];?>:</div>
									<div class="border-right-0 p-1">
										<select class="mt-1 form-control-sm p-1 text-center m-0 flex-item text-white w-100" name="tbank" id="tbank" required>
									  	<?for($x=1;$x<=count($ab_bank)-2;$x++){?>
									  	<option value="<?=$x;?>"><?=$ab_bank[$x];?></option>
									  	<?}?>
									</select>
									</div>
									<?
										}
									?>
									
									<? if($rs_mems["bank_id"]>0 and $rs_mems["bank_id"]!=""){ ?>
										<input type="hidden" value="<?=substr($rs_bank_mem['bank_code'] , 6 , 4)?>" name="tbankcode" />
									<? }else{ ?>
										<div class="text-white p-1"><?=$lang_member[976];?>:</div>
										<div class="border-right-0 p-1">
											<input name="tbankcode" type="tel" class="form-control-sm flex-item border m_bd_color inputFilter text-center text-white w-100" id="tbankcode" data-filter-type="integer" data-filter-add-comma="false" minlength="4" maxlength="4" required>
										</div>
									<? } ?>

									<!-- FORM APP STYLE -->
									<!-- <table class="table mb-1 table-borderless">
										<tbody>
											<tr>
												<td class="text-white p-1 text-right" style="vertical-align: top;"><?=$lang_member[975];?>:</td>
												<td class="p-1">

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
													<select name="tbank" id="tbank" required class="custom-select custom-select-sm small text-white py-1 px-3 w-100 flex-item">
      													<?for($x=1;$x<=count($ab_bank)-2;$x++){?>
      													<option value="<?=$x;?>"><?=$ab_bank[$x];?></option>
      													<?}?>
    												</select>
												<? } ?>
												</td>
											</tr>
											<? if($rs_mems["bank_id"]<=0 or $rs_mems["bank_id"]==""){ ?>
											<tr>
												<td class="text-white p-1 text-right" style="vertical-align: top;"><?=$lang_member[976];?>:</td>
												<td class="p-1" style="vertical-align: top;">
													<input type="text" class="form-control form-control-sm flex-item w-100 border m_bd_color inputFilter text-center text-white" name="tbankcode" data-filter-type="numeric" data-filter-add-comma="false" maxlength="4" minlength="4">
												</td>
											</tr>
											<? } ?>
											<tr>
												<td class="text-white p-1 text-right" style="vertical-align: top;"><?=$lang_member[146];?>:</td>
												<td class="border-right-0 p-1" style="vertical-align: top;">
													<input type="hidden" name="tdd" id="date" />
													<input type="text" id="datepicker" name="datepicker" class="form-control-sm p-1 text-center w-100 text-white flex-item " />

													<select id="thh" name="thh" class=" mt-1 form-control-sm p-1 text-center m-0 flex-item text-white" required>
            		  									<?for($x=0;$x<=23;$x++){?>
            		  									<option value="<?=sprintf("%02d",$x)?>"><?=sprintf("%02d",$x)?></option>
            		  									<?}?>
            										</select>

            										<select id="tmm" name="tmm" class=" mt-1 form-control-sm p-1 text-center m-0 flex-item text-white">
            										  	<?for($x=0;$x<=59;$x++){?>
            										  	<option value="<?=sprintf("%02d",$x)?>"><?=sprintf("%02d",$x)?></option>
            										  	<?}?>        
            										</select>
												</td>
											</tr>
											<tr>
												<td class="text-white p-1 text-right" style="vertical-align: top;"><?=$lang_member[969];?>:</td>
												<td class="border-right-0 p-1" style="vertical-align: top;">
													<input type="text" class="form-control form-control-sm flex-item border m_bd_color inputFilter text-center text-white w-100" name="tcount" data-filter-type="integer" data-filter-add-comma="false" >

													<div class="text-danger mt-1">
														<div>
															<?=$lang_member[1659];?> <?=number_format($rs_cset["r_m_deposit_min"] , 2)?> <?=$_SESSION['m1']['m_currency']?>
														</div>
														<div>
															<?=$lang_member[1660];?> <?=number_format($rs_cset["r_m_deposit_max"] , 2)?> <?=$_SESSION['m1']['m_currency']?>
														</div>
													</div>
													
												</td>
											</tr>
											<tr>
												<td class="p-1 text-center" colspan="2">
													<button class="btn btn-sm flex-item active"><?=$lang_member[121];?></button>
												</td>
											</tr>
										</tbody>
									</table> -->
								</fieldset>
							</form>
						</div>
						<hr>
						<div>
							<table class="small font-weight-bold table w-100 m_bd_color mb-0" style="table-layout: fixed;">
								<tr class="flex-item active">
									<th class="py-1 px-0 small"><?=$lang_member[971];?></th>
									<th class="py-1 px-0 small"><?=$lang_member[77];?></th>
									<th class="py-1 px-0 small"><?=$lang_member[969];?></th>
									<th class="py-1 px-0 small"><?=$lang_member[301];?></th>
								</tr>
							</table>
						</div>
					</div>
					
					<div class="s_s h_withdraw">

						<div>
							<?
								$rs_mems = sql_array("select * from bom_tb_member where m_id='".$_SESSION['m_id']."'");
							?>
							<form action="process/save_withdraw.php" method="post" class="auto-form" data-onsuccess="saveWithdrawCallback" data-oninit="" data-oncomplete="" data-onfail="toastSaveError">
								<fieldset>

									<div class="text-center">
							            <img src="Images/transfer/icon_bet.png" alt="BET" style="width: 50px;">
							        </div>

							        <div class="text-center tf-arrow my-3">
									  	<img src="Images/transfer/arrow_down.png" />
									</div>

									<div>
										<div class="d-flex align-items-center justify-content-center">
											<div>
												<div class="font-weight-bold"><?=$lang_member[2375];?>: </div>
											</div>
											<div class="d-flex">
												<img src="Images/bank/b<?=$_SESSION['m1']['m_b_bank'];?>.png" / >
										      <div>
										       	<div class="font-weight-bold"><?=$ab_bank[$_SESSION['m1']['m_b_bank']];?> <?=$_SESSION['m1']['m_b_name'];?></div>
										        	<div class="font-weight-bold"><?=_bankok($_SESSION['m1']['m_b_code']);?></div>
										      </div>
											</div>
										</div>
									</div>

									<div class="text-center tf-arrow my-3">
									  	<img src="Images/transfer/arrow_down.png" />
									</div>

									<div>
										<div class="text-white p-1"><?=$lang_member[969];?>:</div>
										<div class="border-right-0 p-1">
											<input type="text" class="form-control form-control-sm flex-item border m_bd_color inputFilter text-center text-white w-100" name="tcount" data-filter-type="integer" data-filter-add-comma="false">
										</div>

										<!-- <div class="text-white p-1"><?=$lang_member[974];?>:</div>
										<div class="border-right-0 p-1">
											<input type="text" class="form-control form-control-sm flex-item border m_bd_color inputFilter text-center text-white w-100" name="tcode" data-filter-type="numeric" data-filter-add-comma="false" maxlength="4" minlength="4" autocomplete="off">
											<? if($_SESSION['m1']['m_b_pass']!=""){ echo'***'.substr($_SESSION['m1']['m_b_pass'] , -1);}?>
										</div> -->
									</div>

									<div class="text-center mt-2">
										<button class="btn btn-sm flex-item active" onclick="submitTrigger(this); return false;"><?=$lang_member[121];?></button>
									</div>

									<!-- FORM APP STYLE -->
									<!-- <table class="table mb_1 table-borderless">
										<tbody>
											<tr>
												<td class="text-white p-1 text-right" style="vertical-align: top;"><?=$lang_member[981];?>:</td>
												<td class="p-1">

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
													<select name="tbank" id="tbank" required class="custom-select custom-select-sm m_bg small text-white py-1 px-3 w-100 flex-item text-white">
      													<?for($x=1;$x<=count($ab_bank)-2;$x++){?>
      													<option value="<?=$x;?>"><?=$ab_bank[$x];?></option>
      													<?}?>
    												</select>
												<? } ?>
												</td>
											</tr>
											<tr>
												<td class="text-white p-1 text-right" style="vertical-align: top;"><?=$lang_member[969];?>:</td>
												<td class="border-right-0 p-1" style="vertical-align: top;">
													<input type="text" class="form-control form-control-sm flex-item border m_bd_color inputFilter text-center text-white w-100" name="tcount" data-filter-type="integer" data-filter-add-comma="false">

													<div class="text-danger mt-1">
														<div>
															<?=$lang_member[1661];?> <?=number_format($rs_cset["r_m_withdraw_min"] , 2)?> <?=$_SESSION['m1']['m_currency']?>
														</div>
														<div>
															<?=$lang_member[1662];?> <?=number_format($rs_cset["r_m_withdraw_max"] , 2)?> <?=$_SESSION['m1']['m_currency']?>
														</div>
													</div>
												</td>
											</tr>
											<tr>
												<td class="text-white p-1 text-right" style="vertical-align: top;"><?=$lang_member[974];?>:</td>
												<td class="border-right-0 p-1" style="vertical-align: top;">
													<input type="text" class="form-control form-control-sm flex-item border m_bd_color inputFilter text-center text-white w-100" name="tcode" data-filter-type="numeric" data-filter-add-comma="false" maxlength="4" minlength="4" autocomplete="off">
													<? if($_SESSION['m1']['m_b_pass']!=""){ echo'***'.substr($_SESSION['m1']['m_b_pass'] , -1);}?>
												</td>
											</tr>
											<tr>
												<td class="p-1 text-center" colspan="2">
													<button class="btn btn-sm flex-item active"><?=$lang_member[121];?></button>
												</td>
											</tr>
										</tbody>
									</table> -->
								</fieldset>
							</form>
						</div>
						<hr>
						<div>
							<table class="small font-weight-bold table w-100 m_bd_color mb-0" style="table-layout: fixed;">
								<tr class="flex-item active">
									<th class="py-1 px-0 small"><?=$lang_member[971];?></th>
									<th class="py-1 px-0 small"><?=$lang_member[972];?></th>
									<th class="py-1 px-0 small"><?=$lang_member[969];?></th>
									<th class="py-1 px-0 small"><?=$lang_member[301];?></th>
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
				</div> <!-- end container -->

			</div>

  		</div>
	</div>
</div>
<form action="process/transfer_list.php" method="get" class="auto-form" id="form_transfer_list" data-oninit="pauseTfInterval" data-onsuccess="renderTranferListTable" data-onfail="updateTfInterval"><fieldset></fieldset></form>
<script id="tmpl_transfer_list" type="text/x-jsrender">
{{for transfer}}
	<tr>
		<td class="date">
			<span class="no small">{{:no}}</span>
			<span class="time small text-white">{{:time}}</span>
			<div class="mt-2 text-white">{{:date}}</div>
		</td>
		<td>
			<div class="text-warning">
				<div>{{:bank}}</div>
				<div class="font-weight-bold">{{:bank_num}}</div>
			</div>
		
		</td>
		<td><div class="font-weight-bold text-warning">{{:amount}}</div></td>
		<td class="{{if status == 1}}text-success{{else status == 2}}text-danger{{else}}text-white{{/if}}">{{:status_txt}}</td>
	</tr>
{{/for}}
</script>
<script id="tmpl_withdraw_list" type="text/x-jsrender">
{{for withdraw}}
	<tr>
		<td class="date">
			<span class="no small">{{:no}}</span>
			<span class="time small text-white">{{:time}}</span>
			<div class="mt-2 text-white">{{:date}}</div>
		</td>
		<td>
			<div class="text-warning">
				<div>{{:bank}}</div>
				<div class="font-weight-bold">{{:bank_num}}</div>
			</div>
		
		</td>
		<td><div class="font-weight-bold text-warning">{{:amount}}</div></td>
		<td class="{{if status == 1}}text-success{{else status == 2}}text-danger{{else}}text-white{{/if}}">{{:status_txt}}</td>
	</tr>
{{/for}}
</script>
<script>
	
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

	function saveTransferCallback(form, data){
		if(data.status == 1){
			toastSaveSuccess();
			form.reset();
			$('#datepicker').datepicker('setDate', new Date());
			$('#form_transfer_list').trigger('submit');
		}else{
			toastSaveError(data.msg);
		}
	}

	function saveWithdrawCallback(form, data){
		if(data.status == 1){
			toastSaveSuccess();
			form.reset();
			$('#form_transfer_list').trigger('submit');
		}else{
			toastSaveError(data.msg);
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
		nextUpdateTfList = new Date().getTime() + (100 * 1000);
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

var _jcUserBank = null;
function openUserBankAdd(event){
    event.stopImmediatePropagation()
    if(null!==_jcUserBank)
      _jcUserBank.close();

    var _form = $('#tmpl-mbank-form').html();
    _jcUserBank = $.dialog({
        title: '<?=$lang_member[2309];?>',
        content: _form,
        useBootstrap: false,
        theme: "oho",
        closeIcon: true,
        animation: 'none',
        closeAnimation: 'none',
        backgroundDismiss: false,
        boxWidth: '90%',
        onContentReady: function(){
          var self = this;
          $(self.$content).on('submit', 'form', function(event){
            event.preventDefault();
            var fd = new FormData(event.target);

            _jcUserBank.setContent('<div class="text-center">Loading ...</div>');
            submitUserBank(fd).then(function(res){
              	_jcUserBank.close();
              	GetMenu('TRANSFER', 1);
            }, function(msg){
              	toastSaveError(msg);
              	_jcUserBank.close();
            });
          });

          $(self.$content).on('click', '._close', function(event){
            	event.preventDefault();
            	_jcUserBank.close();
          });
        },
        onClose: function(){
          	_jcUserBank = null;
        },
    });
  }
	
	function submitUserBank($fd){
		var $def = $.Deferred();
		$.ajax({
		  url: 'process/mbank_save.php',
		  type: 'post',
		  dataType: 'json',
		  data: $fd,
		  contentType: false,
		  processData: false,
		})
		.done(function(data){
		  if(data.status==1){
		    $def.resolve(true);
		  }else{
		    $def.reject(data.msg);
		  }
		})
		.fail(function() {
		  $def.reject("<?=$lang_member[66];?>");
		});
		return $def.promise();
	}
</script>

<template id="tmpl-mbank-form">
<div class="my-4">
  <form action="#" method="post" class="jquery-confirm-form">
    <fieldset class="border-0 p-0 m-0">
    	<div style="margin-bottom: 4px;">
    		<label for="tbank" class="m_color mb-1"><?=$lang_member[77];?></label>
    		<select class="custom-select-sm m_bd_color" name="tbank" id="tbank" required style="height: 26px;">
    		<?for($x=1;$x<=count($ab_bank)-2;$x++){?>
    		<option value="<?=$x;?>"><?=$ab_bank[$x];?></option>
    		<?}?>
    		</select>
    	</div>
    	<div class="mb-1">
    		<label for="tbanknum" class="m_color mb-1"><?=$lang_member[79];?></label>
    		<input name="tbanknum" type="tel" id="tbanknum" class="form-control-sm m_bd_color inputFilter" data-filter-type="numeric" data-filter-add-comma="false" minlength="10" maxlength="10" required autocomplete="off">
    	</div>
    	<div class="mb-1">
    		<label for="tbankname" class="m_color mb-1"><?=$lang_member[80];?></label>
    		<input name="tbankname" type="tel" id="tbankname" class="form-control-sm m_bd_color inputFilter" required autocomplete="off">
    	</div>
    	<div class="mb-1">
    		<label for="tbankcode" class="m_color mb-1"><?=$lang_member[974];?></label>
    		<input name="tbankcode" type="tel" id="tbankcode" class="form-control-sm m_bd_color inputFilter" data-filter-type="numeric" data-filter-add-comma="false" minlength="4" maxlength="4" required autocomplete="off">
    	</div>
      <div class="mt-2">
        <div class="jconfirm-buttons oho-btns border-0 p-0">
          <button type="submit" class="btn btn-default oho-btn _submit"><span><?=$lang_member[64];?></span></button>
          <button type="button" class="btn btn-default oho-btn _close"><span><?=$lang_member[65];?></span></button>
        </div>
      </div>
    </fieldset>
  </form>
</div>
</template>