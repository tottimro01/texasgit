<?
	session_start();

    $head_title = $lang_member[2345];
?>
<div class="h-100">
	<div class="h-100">
		<div class="h-100" style="overflow-y: auto;">

			<div class="d-flex flex-column h-100">
		
				<div class="p-1 mb-2 text-center text-white rounded-top m_bg">
					<h6 class="m-0"><?=$head_title;?></h6>
				</div>
				<div class="lotto-scroll-area">
					<form action="process/change_language.php" method="post" class="auto-form" id="form_lang" data-onsuccess="changeLanguageCallback" data-oninit="addLoadingTask" data-oncomplete="subtractLoadingTask" data-onfail="toastSaveError">
						<fieldset>
							
						
					<ul class="text-white p-0">
						<? for ($i=1; $i < count($arr_lang); $i++) { ?>
						<li class="border-bottom" style="list-style: none;">
							<label for="slang_<?=$arr_lang[$i];?>" class="d-block m-0">
								<div class="m_bg p-2">
									<table class="w-100">
										<tr>
											<td style="width: 30px;" class="pr-2"><img src="assets/img/flag/ic_flag_<?=$arr_lang[$i];?>.png" class="w-100" /></td>
											<td><span><?=$m_lang[$i];?></span></td>
											<td class="text-right">
												<div class="checkbox-checkmark my-0">
													<input type="radio" name="lang" value="<?=$arr_lang[$i];?>" id="slang_<?=$arr_lang[$i];?>" class="hideInput" <?if($arr_lang[$i]==$lang){?>checked="checked"<?}?> />
													<span class="checkmark">
														<span class="onCheck d_block"><img src="assets/img/ui/ic_menu_check.png" style="width: 20px;" /></span>
														<span class="onUncheck d_block"></span>
													</span>
												</div>
											</td>
										</tr>
									</table>
								</div>
							</label>
							
						</li>
						<? } ?>
					</ul>

						</fieldset>
					</form>
				</div>

			</div>

  		</div>
	</div>
</div>


<script>
	$(document).off('change', 'input[name="lang"]');
	$(document).on('change', 'input[name="lang"]', function(event){
		event.preventDefault();
		var s = $('input[name="lang"]:checked').val();
		$('#form_lang').trigger('submit');
	});

	function changeLanguageCallback(form, data){
		if(data.status == 1){
			window.location.reload();
		}
	}
</script>