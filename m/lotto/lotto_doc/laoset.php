<?
    $totalRows = 50;
    $head_title = $lang_member[2348] . " - " . $lang_g['lotZone'][$_SESSION["zone_hun"]]." ".$lang_member[688]." ".$_SESSION["rob_hun"];
?>
<style>
	.lotto-table-sizing > tbody > tr > td:nth-child(odd){
		width: 18%;
	}
</style>
<div class="container-fluid h-100">
	<div class="row h-100">
		<div class="col-md-6 col-lg-4 mx-auto border rounded p-1 h-100">
			<div class="h-100">
				<!-- <form class="h-100 auto-form" action="#" method="post" data-onsuccess="SaveLottoSuccess" data-onfail="SaveLottoFail" data-onbegin="manageFormData" data-oninit="addLoadingTask" data-oncomplete="subtractLoadingTask,removeHiddenInput" data-lottype="laoset"> -->

				<form class="h-100 auto-form" action="process/<?=($zone!=1) ? "lothun" : "lotto";?>/save_lotto.php" method="post" data-onsuccess="SaveLottoSuccess" data-onfail="SaveLottoFail" data-onbegin="manageFormData" data-oninit="addLoadingTask" data-oncomplete="subtractLoadingTask,removeHiddenInput" data-lottype="laoset">
					<fieldset class="h-100">
						<input type="hidden" name="totalRows" value="<?=$totalRows;?>">
						<input type="hidden" name="tlot" value="10">
						<input type="hidden" name="zone" value="<?=$zone;?>">
						<input type="hidden" name="rob" value="<?=$rob;?>">
						<div class="d-flex flex-column h-100">
							<?
								include 't_box.php';
							?>
							<div>
								<div class="mt-2">
									<table class="w-100 lotto-table-sizing small" cellpadding="2" cellspacing="0">
										<tbody>
										<tr>
											<td>
												<div class="m_bg px-1 py-2 text-white text-center"><?=$lang_member[425];?></div>
											</td>
											<td>
												<div class="m_bg px-1 py-2 text-white text-center">
													<label for="num" class="m-0"><?=$lang_member[381];?></label>
												</div>
											</td>
											<td>
												<div class="m_bg px-1 py-2 text-white text-center"><?=$lang_member[425];?></div>
											</td>
											<td>
												<div class="m_bg px-1 py-2 text-white text-center">
													<label for="num" class="m-0"><?=$lang_member[381];?></label>
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
												for ($i=1; $i < ($totalRows/2)+1; $i++) { 
													$numId = "num_$i";
													$numId2 = "num_".(($totalRows/2)+$i);

											?>
											<tr>
												<td class="text-center">
													<span class="mb-0 ml-1"><?=$i;?>.</span>
												</td>
												<td>
													<div class="d-flex">
														<input type="text" class="form-control control-sc no-outline px-0 text-center inputFilter" name="<?=$numId;?>" id="<?=$numId;?>" data-filter-type="numeric" data-filter-add-comma="false" maxlength="4" />
													</div>
												</td>
												<td class="text-center">
													<span class="mb-0 ml-1"><?=(($totalRows/2)+$i);?>.</span>
												</td>
												<td>
													<div class="d-flex">
														<input type="text" class="form-control control-sc no-outline px-0 text-center inputFilter" name="<?=$numId2;?>" id="<?=$numId2;?>" data-filter-type="numeric" data-filter-add-comma="false" maxlength="4" />
													</div>
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