<?
	session_start();

    $head_title = $lang_member[45];
?>
<div class="h-100">
	<div class="h-100">
		<div class="h-100" style="overflow-y: auto;">

			<div class="d-flex flex-column h-100">
		
				<div class="p-1 mb-2 text-center text-white rounded-top m_bg">
					<h6 class="m-0"><?=$head_title;?></h6>
				</div>
				

				<div class="lotto-scroll-area">
					<div class="container">
						<form action="process/change_password.php" method="post" class="auto-form" data-onsuccess="changePasswordCallback" data-oninit="addLoadingTask" data-oncomplete="subtractLoadingTask" data-onfail="toastSaveError">
							<fieldset>
								<input type="password" class="form-control control-sc mb-2" name="old_password" placeholder="<?=$lang_member[2234];?>" />
								<input type="password" class="form-control control-sc mb-2" name="new_password" placeholder="<?=$lang_member[1045];?>" />
								<input type="password" class="form-control control-sc mb-2" name="con_password" placeholder="<?=$lang_member[2235];?>" />
								<input type="submit" class="btn btn-block control-sc sc-gd" value="<?=$lang_member[121];?>" />
							</fieldset>
						</form>
					</div>
					
					
				</div>

			</div>

  		</div>
	</div>
</div>

<script>
	function changePasswordCallback(form, data){
		if(data.status == 1){
			toastSaveSuccess();
		}else{
			toastSaveError();
		}
	}
	// $(document).off('change', 'input[name="pay_type"]');
	// $(document).on('change', 'input[name="pay_type"]', function(event){
	// 	event.preventDefault();
	// 	var s = $('input[name="pay_type"]:checked').val();
	// 	$('.s_s').hide();
	// 	$('.s_s.h_'+s).show();
	// 	$('#form_pay').trigger('submit');
	// });
	// $('input[name="pay_type"]').first().trigger('change');

	// function renderPayTable(form, data){
	// 	console.log(data);
	// }
</script>