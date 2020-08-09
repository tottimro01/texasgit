<?
	require_once '../inc/lang.php';
    require_once '../inc/rsc.php';
    require_once '../inc/function.php';
    require_once '../inc/conn.php';

    $totalRows = 20;
    $head_title = $lang_member[43] . " - " . $lang_g['lotZone'][$_SESSION["zone_hun"]]." ".$lang_member[688]." ".$_SESSION["rob_hun"];
?>
<style>
	.lotto-table-sizing{
		table-layout: fixed;
	}
	.lotto-table-sizing > thead > tr > td,
	.lotto-table-sizing > tbody > tr > td{
		/*width: 22%;*/
		padding: .5rem .25rem;
	}
</style>
<div class="container-fluid h-100">
	<div class="row h-100">
		<div class="col-md-6 col-lg-4 mx-auto border rounded p-1 h-100">
			<div class="h-100">
				<div class="h-100">
					<div class="h-100">
						<div class="d-flex flex-column h-100">
							
							<div id="t_box">
								<div class="p-1 mb-2 text-center text-white rounded-top m_bg">
									<h6 class="m-0"><?=$head_title;?></h6>
								</div>
								<form action="process/get_list.php" method="get" class="auto-form" data-onsuccess="renderListTable" data-oninit="addLoadingTask" data-oncomplete="subtractLoadingTask">
									<fieldset>
										<div class="row no-gutters mb-2">
											<div class="col-6 pr-2">
												<select name="date" id="date" class="custom-select pl-3 custom-select-sm m_bg rounded-pill text-white border-0">
													<?
														$arr = array();
														$i=0;
														$sql=sql_query("select * from bom_tb_lotto_ok where lot_zone = '".$zone."' and lot_rob = '".$rob."' group by ok_date order by o_limit_time desc");
														while($rs=sql_fetch($sql)){
															$arr[$i]["strDate"] = $rs["ok_date"];
															$i++;
															?>
													<option value="<?=$rs["ok_date"];?>"><?=$rs["ok_date"];?></option>

													<?
														}
													?>
												</select>
											</div>
											<div class="col-3">
												<label class="checkbox-checkmark my-0 d-flex">
													<input type="radio" name="list_type" value="bill" class="hideInput rdo_select_s" checked="checked" />
													<span class="checkmark">
														<span class="onCheck d_block"></span>
														<span class="onUncheck d_block"></span>
													</span>
													<span class="ml-2"><?=$lang_member[2230];?></span>
												</label>
											</div>
											<div class="col-3">
												<label class="checkbox-checkmark my-0 d-flex">
													<input type="radio" name="list_type" value="all" class="hideInput rdo_select_s" />
													<span class="checkmark">
														<span class="onCheck d_block"></span>
														<span class="onUncheck d_block"></span>
													</span>
													<span class="ml-2"><?=$lang_member[304];?></span>
												</label>
											</div>
										</div>
										<div class="d-flex mb-2">
											<div class="mr-1">
												<label for="mname" class="mb-0" style="white-space: nowrap;"><?=$lang_member[118];?>: </label>
											</div>
											<div class="mr-1">
												<input type="text" name="mname" id="mname" class="form-control form-control-sm control-sc no-outline">
											</div>
											<div class="mr-1">
												<label for="poy_num" class="mb-0" style="white-space: nowrap;"><?=$lang_member[574];?>: </label></div>
											<div class="mr-1">
												<input type="text" name="poy_num" id="poy_num" class="form-control form-control-sm control-sc no-outline">
											</div>
											<div class="">
												<button class="btn btn-success btn-sm"><?=$lang_member[293];?></button>
											</div>
										</div>
									</fieldset>
								</form>
							</div>

							<div>
								<div class="mt-2">
									<!-- รายบิล หัวตาราง -->
									<table class="w-100 lotto-table-sizing table table-bordered mb-0 m_bg text-white s_s h_bill" cellpadding="0" cellspacing="0" style="display: none;">
										<thead>
											<tr class="text-center small">
												<td>
													<div><?=$lang_member[407];?></div>
												</td>
												<td>
													<div><?=$lang_member[529];?></div>
												</td>
												<td>
													<div><?=$lang_member[610];?></div>
												</td>
												<td>
													<div><?=$lang_member[2231];?></div>
												</td>
												<td>
													<div><?=$lang_member[2232];?></div>
												</td>
											</tr>
										</thead>
									</table>
									
									<!-- ทั้งหมด หัวตาราง -->
									<table class="w-100 lotto-table-sizing table table-bordered mb-0 m_bg text-white s_s h_all" cellpadding="0" cellspacing="0" style="display: none;">
										<thead>
											<tr class="text-center small">
												<td>
													<div><?=$lang_member[407];?></div>
												</td>
												<td>
													<div><?=$lang_member[160];?></div>
												</td>
												<td>
													<div><?=$lang_member[381];?></div>
												</td>
												<td>
													<div><?=$lang_member[559];?></div>
												</td>
												<td>
													<div><?=$lang_member[610];?></div>
												</td>
												<td>
													<div><?=$lang_member[2232];?></div>
												</td>
											</tr>
										</thead>
									</table>
								</div>
							</div>
							<div class="lotto-scroll-area">
								<div>
									<div>
										<!-- รายบิล -->
										<table class="w-100 lotto-table-sizing table table-bordered mb-0 s_s h_bill" cellpadding="0" cellspacing="0" style="display: none;">
											<tbody id="tbl_bill" class="tf_tbody small">
												
											</tbody>
										</table>

										<!-- ทั้งหมด -->
										<table class="w-100 lotto-table-sizing table table-bordered mb-0 s_s h_all" cellpadding="0" cellspacing="0" style="display: none;">
											<tbody id="tbl_all" class="tf_tbody small">
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<form action="process/get_listDetails.php" method="get" class="auto-form" id="form_listDetails" data-onsuccess="renderListDetailsTable" data-oninit="addLoadingTask" data-oncomplete="subtractLoadingTask">
<fieldset><input type="hidden" name="bid" id="bid" /></fieldset>
</form>
<script id="tmpl_list_bill" type="text/x-jsrender">
{{for list}}
	<tr onclick="displayListDetails('{{:Nid}}');">
		<td class="date">
			<span class="no small">{{:No}}</span>
			<span class="time small text-muted">{{:Ntime}}</span>
			{{if Nno != "" || Nname != ""}}
			<div class="bg-info small text-white mt-3 d-flex">
				<div class="flex-fill">{{:Nname}}</div>
				<div class="px-1 bg-primary">{{:Nno}}</div>
			</div>
			{{/if}}
			<div class="{{if Nno == "" && Nname == ""}}mt-3{{/if}}">{{:Ndate}}</div>
		</td>
		<td>
			<div>
				<div class="{{if Ntb < 0}}text-danger{{/if}}">{{:Ntb}}</div>
			</div>
		</td>
		<td>
			<div>
				<div class="{{if Ndis < 0}}text-danger{{/if}}">{{:Ndis}}</div>
			</div>
		</td>
		<td>
			<div>
				<div class="{{if Nbonus < 0}}text-danger{{/if}}">{{:Nbonus}}</div>
			</div>
		</td>
		<td>
			<div>
				<div class="{{if Ntotal < 0}}text-danger{{/if}}">{{:Ntotal}}</div>
			</div>
		</td>
	</tr>
{{/for}}
	<tr class="sum">
		<td><div class="font-weight-bold"><?=$lang_member[611];?></div></td>
		<td>
			<div>
				<div class="{{if sum.Ntb < 0}}text-danger{{/if}}">{{:sum.Ntb}}</div>
			</div>
		</td>
		<td>
			<div>
				<div class="{{if sum.Ndis < 0}}text-danger{{/if}}">{{:sum.Ndis}}</div>
			</div>
		</td>
		<td>
			<div>
				<div class="{{if sum.Nbonus < 0}}text-danger{{/if}}">{{:sum.Nbonus}}</div>
			</div>
		</td>
		<td>
			<div>
				<div class="{{if sum.Ntotal < 0}}text-danger{{/if}}">{{:sum.Ntotal}}</div>
			</div>
		</td>
	</tr>
</script>
<script id="tmpl_list_all" type="text/x-jsrender">
{{for list}}
	<tr>
		<td class="date">
			<span class="no small">{{:No}}</span>
			<span class="time small text-muted">{{:Ntime}}</span>
			<div class="mt-3">{{:Ndate}}</div>
		</td>
		<td>
			<div>
				<div>{{:Ntype}}</div>
			</div>
		</td>
		<td>
			<div>
				<div class="{{if Nnum < 0}}text-danger{{/if}}">{{:Nnum}}</div>
			</div>
		</td>
		<td>
			<div>
				<div class="{{if Ntb < 0}}text-danger{{/if}}">{{:Ntb}}</div>
			</div>
		</td>
		<td>
			<div>
				<div class="{{if Ndis < 0}}text-danger{{/if}}">{{:Ndis}}</div>
			</div>
		</td>
		<td>
			<div>
				<div class="{{if Ntotal < 0}}text-danger{{/if}}">{{:Ntotal}}</div>
			</div>
		</td>
	</tr>
{{/for}}
	<tr class="sum">
		<td colspan="3"><div class="font-weight-bold"><?=$lang_member[611];?></div></td>
		<td>
			<div>
				<div class="{{if sum.Ntb < 0}}text-danger{{/if}}">{{:sum.Ntb}}</div>
			</div>
		</td>
		<td>
			<div>
				<div class="{{if sum.Ndis < 0}}text-danger{{/if}}">{{:sum.Ndis}}</div>
			</div>
		</td>
		<td>
			<div>
				<div class="{{if sum.Ntotal < 0}}text-danger{{/if}}">{{:sum.Ntotal}}</div>
			</div>
		</td>
	</tr>
</script>
<script id="tmpl_listDetails" type="text/x-jsrender">
<table class="w-100 lotto-table-sizing table table-bordered mb-0" cellpadding="0" cellspacing="0">
	<thead class="m_bg text-white">
		<!-- <tr class="text-center small">
			<td colspan="3"><?=$lang_member[2233];?>: {{:Nid}}</td>
		</tr> -->
		<tr class="text-center small">
			<td>
				<div><?=$lang_member[160];?></div>
			</td>
			<td>
				<div><?=$lang_member[381];?></div>
			</td>
			<td>
				<div><?=$lang_member[1655];?></div>
			</td>
		</tr>
	</thead>
	<tbody class="tf_tbody">
	{{for list}}
		<tr>
			<td>
				<div>
					<div>{{:Ntype}}</div>
				</div>
			</td>
			<td>
				<div>
					<div class="{{if Nnum < 0}}text-danger{{/if}}">{{:Nnum}}</div>
				</div>
			</td>
			<td>
				<div>
					<div class="{{if Ntb < 0}}text-danger{{/if}}">{{:Ntb}}</div>
				</div>
			</td>
		</tr>
	{{/for}}
	<tr class="sum">
		<td colspan="2"><div class="font-weight-bold"><?=$lang_member[611];?></div></td>
		<td>
			<div>
				<div class="{{if sum.Ntb < 0}}text-danger{{/if}}">{{:sum.Ntb}}</div>
			</div>
		</td>
	</tr>
	</tbody>
</table>
</script>
<script>
	$(document).off('change', 'input[name="list_type"]');
	$(document).off('change', '#date, input[name="list_type"]');

	$(document).on('change', 'input[name="list_type"]', function(event){
		event.preventDefault();
		var s = $('input[name="list_type"]:checked').val();
		$('.s_s').hide();
		$('.s_s.h_'+s).show();
	});

	$(document).on('change', '#date, input[name="list_type"]', function(event){
		event.preventDefault();
		$(this.form).trigger('submit');
	});

	$('input[name="list_type"]').first().trigger('change');

	function renderListTable(form, data){
		var s = $('input[name="list_type"]:checked').val();
		var sum = data.pop();
		var d = {list: data, sum:sum };
		var tmpl = $.templates('#tmpl_list_'+s);
		var html = tmpl.render(d);
		$('#tbl_'+s).html(html);
	}

	function displayListDetails(nid){
		var form = document.getElementById('form_listDetails');
		form.bid.value = nid;
		$(form).trigger('submit');
	}

	function renderListDetailsTable(form, data){
		console.log(data);
		var sum = data.pop();
		var d = {list: data, sum:sum, bid: data[0].Nid };
		var tmpl = $.templates('#tmpl_listDetails');
		var html = tmpl.render(d);

		$.dialog({
			theme: 'oho,oho-full',
			title: '<?=$lang_member[2233];?> : ' + data[0].Nid,
			content: html,
			offsetTop: 60,
			offsetBottom: 87,
			boxWidth: '100%',
			draggable: false,
			dragWindowGap: 0,
		});
	}
</script>
