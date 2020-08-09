<div class="page-wrapper-flex">
	<div class="content-title"><?=$lang_data["menu_newpass"];?></div>
		<div class="lotto-info-table-wrapper">
			<form id="changepass-form" class="changepass-form" action="" method="post">
				<input type="password" id="txt_old_pwd" name="txt_old_pwd" placeholder='<?=$lang_data["pass_old"];?>'>
				<input type="password" id="txt_new_pwd" name="txt_new_pwd" placeholder='<?=$lang_data["pass_new"];?>'>
				<input type="password" id="txt_con_pwd" name="txt_con_pwd" placeholder='<?=$lang_data["confirm_pass"];?>'>
				<input type="submit" id="changepass-submit" name="changepass-submit" value='<?=$lang_data["menu_newpass"];?>'>
			</form>
		</div>
	</div>
</div>