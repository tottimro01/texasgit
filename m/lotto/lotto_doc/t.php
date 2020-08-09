<?
    $totalRows = 20;
    $head_title = $lang_member[483] . " - " . $lang_g['lotZone'][$_SESSION["zone_hun"]]." ".$lang_member[688]." ".$_SESSION["rob_hun"];
?>
<style>
	.lotto-table-sizing > tbody > tr > td:not(:first-child){
		width: 22%;
	}
</style>
<div class="container-fluid h-100">
	<div class="row h-100">
		<div class="col-md-6 col-lg-4 mx-auto border rounded p-1 h-100">
			<div class="h-100">

				<form class="h-100 auto-form" action="process/<?=($zone!=1) ? "lothun" : "lotto";?>/save_lotto.php" method="post" data-onsuccess="SaveLottoSuccess" data-onfail="SaveLottoFail" data-onbegin="manageFormData" data-oninit="addLoadingTask" data-oncomplete="subtractLoadingTask,removeHiddenInput">
					<fieldset class="h-100">
						<input type="hidden" name="totalRows" value="<?=$totalRows;?>">
						<input type="hidden" name="tlot" value="1">
						<input type="hidden" name="zone" value="<?=$zone;?>">
						<input type="hidden" name="rob" value="<?=$rob;?>">
						<div class="d-flex flex-column h-100">
							<?
								include 't_box.php';
							?>
							<div>
								<div class="mt-2">
									<table class="w-100 lotto-table-sizing" cellpadding="2" cellspacing="0">
										<tbody>
										<tr>
											<td></td>
											<td><button class="btn btn-light border px-0 w-100 btn-cross-num" data-cross-num-ref="1"><?=$lang_member[492];?></button></td>
											<td><button class="btn btn-light border px-0 w-100 btn-copy-num tg-1" data-copy-num-ref="1"><?=$lang_member[371];?></button></td>
											<td><button class="btn btn-light border px-0 w-100 btn-copy-num tg-2" data-copy-num-ref="2"><?=$lang_member[371];?></button></td>
											<td><button class="btn btn-light border px-0 w-100 btn-copy-num tg-3" data-copy-num-ref="3"><?=$lang_member[371];?></button></td>
										</tr>
										<tr class="small">
											<td>
												<div class="m_bg px-1 py-2 text-white text-center"><?=$lang_member[492];?></div>
											</td>
											<td>
												<div class="m_bg px-1 py-2 text-white text-center">
													<label for="num" class="m-0"><?=$lang_member[381];?></label>
												</div>
											</td>
											<td>
												<div class="m_bg px-1 py-2 text-white text-center">
													<input type="checkbox" name="up" id="up" class="chk-activator" data-chk-target="tg-1" checked="checked" />
													<label for="up" class="m-0"><?=$lang_member[448];?></label>
												</div>
											</td>
											<td>
												<div class="m_bg px-1 py-2 text-white text-center">
													<input type="checkbox" name="down" id="down" class="chk-activator" data-chk-target="tg-2" checked="checked" />
													<label for="down" class="m-0"><?=$lang_member[450];?></label>
												</div>
											</td>
											<td>
												<div class="m_bg px-1 py-2 text-white text-center">
													<input type="checkbox" name="toot" id="toot" class="chk-activator" data-chk-target="tg-3" checked="checked" />
													<label for="toot" class="m-0"><?=$lang_member[209];?></label>
												</div>
											</td>
										</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="lotto-scroll-area">
								<div>
									<div>
										<table class="w-100 lotto-table-sizing" cellpadding="2" cellspacing="0">
											<tbody>
											<? 
												for ($i=1; $i < $totalRows+1; $i++) { 
													$chkId = "chk_$i";
													$numId = "num_$i";
													$_n1Id = "up_$i";
													$_n2Id = "down_$i";
													$_n3Id = "toot_$i";
											?>
											<tr>
												<td>
													<table class="w-100" style="table-layout: fixed;">
														<tr>
															<td><?=sprintf('%02d', $i).".";?></td>
															<td>
																<label for="<?=$chkId;?>" class="mb-0 ml-1">
																	<input type="checkbox" name="<?=$chkId;?>" class="chk-turn" data-row-num="<?=$i;?>">
																</label>
															</td>
														</tr>
													</table>
												</td>
												<td>
													<div class="d-flex">
														<input type="text" class="form-control control-sc no-outline px-0 text-center inputFilter cross-num-1 lotnum" name="<?=$numId;?>" id="<?=$numId;?>" data-filter-type="numeric" data-filter-add-comma="false" maxlength="4" data-disnum="true" />
														<span class="mt-1">=</span>
													</div>
												</td>
												<td>
													<div><input type="text" class="form-control control-sc no-outline px-0 text-center inputFilter copy-num-1 tg-1 <?=$_n1Id;?>" name="<?=$_n1Id;?>" id="<?=$_n1Id;?>" data-filter-type="integer" /></div>
												</td>
												<td>
													<div><input type="text" class="form-control control-sc no-outline px-0 text-center inputFilter copy-num-2 tg-2 <?=$_n2Id;?>" name="<?=$_n2Id;?>" id="<?=$_n2Id;?>" data-filter-type="integer" /></div>
												</td>
												<td>
													<div><input type="text" class="form-control control-sc no-outline px-0 text-center inputFilter copy-num-3 tg-3 <?=$_n3Id;?>" name="<?=$_n3Id;?>" id="<?=$_n3Id;?>" data-filter-type="integer" /></div>
												</td>
											</tr>
											<? } ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>	
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>

