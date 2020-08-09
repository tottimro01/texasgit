<div class="page-wrapper-flex">
	<div class="content-title"><?=$lang_data["menu_language"];?></div>
	<div class="lotto-info-table-wrapper" id="ll">
		
	</div>
</div>	
<script>
$(document).ready(function($) {
	$.ajax({
		url: 'function/get_langlist.php',
		type: 'post',
		dataType: 'html',
		cache: false,
		beforeSend: activeLoadModal,
	})
	.done(function(data,status,xhr) {
		$('#ll').html(data);
	})
	.fail(function() {
	})
	.always(function() {
		activeLoadModal(false);
	});
});
</script>