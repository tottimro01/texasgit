<?
	session_start();

    $head_title = $lang_member[45];
?>
			<div>
				<nav class='nav nav-pills nav-justified'>
   		 			<a class="nav-item nav-link active m_bf_color" href="#"><?=$lang_member[45];?></a>
   				</nav>
			</div>

			<div class="list-group" style="width: 92%; margin: auto; padding-top: 10px;"> <!-- container -->
					<div class="list-group-item">
					<div style="width: 95%" class="mx-auto">

	
						
				

					<div class="container">
						<form action="process/change_password.php" method="post" class="auto-form" data-onsuccess="changePasswordCallback" data-oninit="" data-oncomplete="" data-onfail="toastSaveError">
							<fieldset>
								<input type="password" class="form-control-sm flex-item border m_bd_color text-center text-white w-100 mx-0 mb-2" name="old_password" placeholder="<?=$lang_member[2234];?>" />
								<input type="password" class="form-control-sm flex-item border m_bd_color text-center text-white w-100 mx-0 mb-2" name="new_password" placeholder="<?=$lang_member[1045];?>" />
								<input type="password" class="form-control-sm flex-item border m_bd_color text-center text-white w-100 mx-0 mb-2" name="con_password" placeholder="<?=$lang_member[2235];?>" />

								<div class="text-center mt-2">
									<button class="btn btn-sm flex-item active" onclick="submitTrigger(this); return false;"><?=$lang_member[121];?></button>
								</div>
							</fieldset>
						</form>
					</div>
					
					
					</div>
					</div>
			</div>

<script>
	function changePasswordCallback(form, data){
		if(data.status == 1){
			form.reset();
			toastSaveSuccess();
		}else{
			toastSaveError(data.msg);
		}
	}
</script>