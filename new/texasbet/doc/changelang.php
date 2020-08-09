<?
	session_start();

    $head_title = $lang_member[2345];
?>

			<div>
				<nav class='nav nav-pills nav-justified'>
   		 			<a class="nav-item nav-link active m_bf_color" href="#"><?=$lang_member[2345];?></a>
   				</nav>
			</div>

			<div style="width: 92%; margin: auto; padding-top: 10px;">
					<div>
					<div style="width: 95%" class="mx-auto">
				
					<form action="process/change_language.php" method="post" class="auto-form" id="form_lang" data-onsuccess="changeLanguageCallback" data-oninit="addLoadingTask" data-oncomplete="subtractLoadingTask" data-onfail="toastSaveError">
						<fieldset>
							
						
					<ul class="text-white p-0 list-group">
						<? for ($i=1; $i < count($arr_lang); $i++) { ?>
						<li class="border-bottom list-group-item" style="list-style: none;">
							<label for="slang_<?=$arr_lang[$i];?>" class="d-block m-0">
								<div class="px-2 py-0">
									<table class="w-100">
										<tr>
											<td style="width: 30px;" class="pr-2"><img src="Images/flag/ic_flag_<?=$arr_lang[$i];?>.png" class="w-100" /></td>
											<td><span><?=$m_lang[$i];?></span></td>
											<td class="text-right">
												<div class="checkbox-checkmark my-0">
													<input type="radio" name="lang" value="<?=$arr_lang[$i];?>" id="slang_<?=$arr_lang[$i];?>" class="hideInput" <?if($arr_lang[$i]==$lang){?>checked="checked"<?}?> />
													<span class="checkmark">
														<span class="onCheck d_block"><img src="Images/MainSmart/pic/ic_menu_check.png" style="width: 20px;" /></span>
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