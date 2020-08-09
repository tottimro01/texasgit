<?
	session_start();

    $head_title = $lang_member[580] . " - " . $lang_g['lotZone'][$_SESSION["zone_hun"]]." ".$lang_member[688]." ".$_SESSION["rob_hun"];

    if($zone==1){
		$sql="select m_lotto_setbet from bom_tb_member where m_id = '$mid'";
		$d = sql_array($sql);
		$currentPay = $d['m_lotto_setbet'];
	}else{
		$sql="select m_lotto_hun_setbet from bom_tb_member where m_id = '$mid'";
		$d = sql_array($sql);
		$currentPay = $d['m_lotto_hun_setbet'];
	}
?>
<div class="h-100">
	<div class="h-100">
		<div class="h-100" style="overflow-y: auto;">

			<div class="d-flex flex-column h-100">
		
				<div class="p-1 mb-2 text-center text-white rounded-top m_bg">
					<h6 class="m-0"><?=$head_title;?></h6>
				</div>

				<div>
					<form action="process/set_pay.php" method="post" id="form_pay_set" class="auto-form" data-onsuccess="toastSaveSuccess" data-oninit="addLoadingTask" data-oncomplete="subtractLoadingTask" data-onfail="toastSaveError">
						<fieldset>
							<div class="row no-gutters mb-2">
								
								<div class="col-2 offset-3">
									<label class="checkbox-checkmark my-0 d-flex">
										<input type="radio" name="pay_dis" value="a" class="hideInput rdo_select_s" checked="checked" />
										<span class="checkmark">
											<span class="onCheck d_block"></span>
											<span class="onUncheck d_block"></span>
										</span>
										<span class="ml-2">A</span>
									</label>

								</div>
								<div class="col-2">
									<label class="checkbox-checkmark my-0 d-flex">
										<input type="radio" name="pay_dis" value="b" class="hideInput rdo_select_s" />
										<span class="checkmark">
											<span class="onCheck d_block"></span>
											<span class="onUncheck d_block"></span>
										</span>
										<span class="ml-2">B</span>
									</label>
								</div>
								<div class="col-2">
									<label class="checkbox-checkmark my-0 d-flex">
										<input type="radio" name="pay_dis" value="c" class="hideInput rdo_select_s" />
										<span class="checkmark">
											<span class="onCheck d_block"></span>
											<span class="onUncheck d_block"></span>
										</span>
										<span class="ml-2">C</span>
									</label>
								</div>

							</div>
							<div class="s_s h_a">
								<label for="pay_a" class="checkbox-checkmark w-50 d-block mx-auto">
									<input type="radio" name="pay_type" class="hideInput" value="1" id="pay_a" <?if($currentPay==1){?> checked="checked" <?}?> />
									<span class="checkmark">
										<span class="onCheck d_block text-center text-white m_bg rounded-pill p-1 border m_bd_color"><?=$lang_member[2378];?></span>
										<span class="onUncheck d_block text-center text-white bg-secondary rounded-pill p-1 border m_bd_color"><?=$lang_member[299];?></span>
									</span>
								</label>
							</div>
							<div class="s_s h_b">
								<label for="pay_b" class="checkbox-checkmark w-50 d-block mx-auto">
									<input type="radio" name="pay_type" class="hideInput" value="2" id="pay_b" <?if($currentPay==2){?> checked="checked" <?}?> />
									<span class="checkmark">
										<span class="onCheck d_block text-center text-white m_bg rounded-pill p-1 border m_bd_color"><?=$lang_member[2378];?></span>
										<span class="onUncheck d_block text-center text-white bg-secondary rounded-pill p-1 border m_bd_color"><?=$lang_member[299];?></span>
									</span>
								</label>
							</div>
							<div class="s_s h_c">
								<label for="pay_c" class="checkbox-checkmark w-50 d-block mx-auto">
									<input type="radio" name="pay_type" class="hideInput" value="3" id="pay_c" <?if($currentPay==3){?> checked="checked" <?}?> />
									<span class="checkmark">
										<span class="onCheck d_block text-center text-white m_bg rounded-pill p-1 border m_bd_color"><?=$lang_member[2378];?></span>
										<span class="onUncheck d_block text-center text-white bg-secondary rounded-pill p-1 border m_bd_color"><?=$lang_member[299];?></span>
									</span>
								</label>
							</div>
						</fieldset>
					</form>
				</div>

				<div>
					<table class="table mb-0 small">
						<colgroup><col style="width: 40%;" /><col style="width: 30%;" /><col style="width: 30%;" /></colgroup>
						<thead>
							<tr class="m_bg text-white text-center">
								<th class="p-2"><?=$lang_member[160];?></th>
								<th class="p-2"><?=$lang_member[162];?></th>
								<th class="p-2"><?=$lang_member[610];?></th>
							</tr>
						</thead>
					</table>
				</div>

				<div class="lotto-scroll-area">
					<div class="s_s h_a">
						<table class="table table-borderless mb-0 text-center small">
							<colgroup><col style="width: 40%;" /><col style="width: 30%;" /><col style="width: 30%;" /></colgroup>
							<tbody id="pd1" class="strip-row">
							</tbody>
						</table>
					</div>
					
					<div class="s_s h_b">
						<table class="table table-borderless mb-0 text-center small">
							<colgroup><col style="width: 40%;" /><col style="width: 30%;" /><col style="width: 30%;" /></colgroup>
							<tbody id="pd2" class="strip-row">
							</tbody>
						</table>
					</div>
					
					<div class="s_s h_c">
						<table class="table table-borderless mb-0 text-center small">
							<colgroup><col style="width: 40%;" /><col style="width: 30%;" /><col style="width: 30%;" /></colgroup>
							<tbody id="pd3" class="strip-row">
							</tbody>
						</table>
					</div>
					
				</div>

			</div>

  		</div>
	</div>
</div>

<form action="process/get_pay.php" method="get" id="form_pay" class="auto-form" data-onsuccess="renderPayTable" data-oninit="addLoadingTask" data-oncomplete="subtractLoadingTask" data-onfail="toastSaveError"><fieldset></fieldset></form>

<script id="tmpl_full" type="text/x-jsrender">
{{for pay}}
	<tr>
		<td class="p-1">{{:lotType}}</td>
		<td class="p-1">{{:lotPay}}</td>
		<td class="p-1">{{:lotDis}}</td>
	</tr>
{{/for}}
</script>
<script>
	$(document).off('change', 'input[name="pay_dis"]');
	$(document).on('change', 'input[name="pay_dis"]', function(event){
		event.preventDefault();
		var s = $('input[name="pay_dis"]:checked').val();
		$('.s_s').hide();
		$('.s_s.h_'+s).show();
	});

	$(document).on('change', 'input[name="pay_type"]', function(event){
		event.preventDefault();
		var s = $('input[name="pay_type"]:checked').val();
		$('#form_pay_set').trigger('submit');
	});

	$('input[name="pay_dis"]').first().trigger('change');
	$('#form_pay').trigger('submit');
	function renderPayTable(form, data){
		console.log(data);
		var tmpl = $.templates("#tmpl_full");

		var html = tmpl.render({ pay: data.pd1 });
		$('#pd1').html(html);

		html = tmpl.render({ pay: data.pd2 });
		$('#pd2').html(html);

		html = tmpl.render({ pay: data.pd3 });
		$('#pd3').html(html);
	}
</script>