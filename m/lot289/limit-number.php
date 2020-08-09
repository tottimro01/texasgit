<? #session_start(); ?>
<div class="page-wrapper-flex">
	<div class="content-title"><?=$lang_data["menu_lotfull"];?></div>
	<div class="lotto-info-table-wrapper">
		<div class="lotto-info-table">
			<table id="lm">
			
			</table>
		</div>

	</div>
</div>	
<script>
$(document).ready(function($) {
	$.ajax({
		url: 'function/get_limit_number.php',
		type: 'post',
		dataType: 'html',
		cache: false,
		beforeSend: activeLoadModal,
	})
	.done(function(data,status,xhr) {
		console.log(data)
		$('#lm').html(data);
	})
	.fail(function() { })
	.always(function() {
		activeLoadModal(false);
	});
});
</script>