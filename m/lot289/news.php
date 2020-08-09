
<div class="page-wrapper-flex">
	<div class="content-title"><?=$lang_data["menu_news"];?></div>
	<div id="news" class="lotto-info-table-wrapper" style="padding: 0 2px;">
</div>	
<script>
$(document).ready(function($) {
	$.ajax({
		url: 'function/get_news.php',
		type: 'post',
		dataType: 'html',
		cache: false,
		beforeSend: activeLoadModal,
	})
	.done(function(data,status,xhr) {
		$('#news').html(data);
	})
	.fail(function() {
	})
	.always(function() {
		activeLoadModal(false);
	});
});
</script>