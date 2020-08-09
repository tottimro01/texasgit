<?
	session_start();

    $head_title = $lang_member[441] . " - " . $lang_g['lotZone'][$_SESSION["zone_hun"]]." ".$lang_member[688]." ".$_SESSION["rob_hun"];
?>
<div class="h-100">
	<div class="h-100">
		<div class="h-100" style="overflow-y: auto;">

			<div class="d-flex flex-column h-100">
		
				<div class="p-1 mb-2 text-center text-white rounded-top m_bg">
					<h6 class="m-0"><?=$head_title;?></h6>
				</div>
				

				<div class="lotto-scroll-area">
					<div id="news"></div>
				</div>

			</div>

  		</div>
	</div>
</div>
<form action="process/get_news.php" method="get" id="form_news" class="auto-form" data-oninit="addLoadingTask" data-oncomplete="subtractLoadingTask" data-onsuccess="renderNewsTable">
	<fieldset></fieldset>
</form>
<script id="tmpl_news" type="text/x-jsrender">
{{for news}}
	<div class="border rounded p-1 text-muted mb-1">
		<div>
			<span>{{:n_note}}</span>
		</div>
		<div class="text-right small">
			<span>{{:n_date}}</span>
		</div>
	</div>
{{/for}}
</script>
<script>
	$('#form_news').trigger('submit');
	function renderNewsTable(form, data){
		console.log(data)
		var data = {news: data };
		var tmpl = $.templates("#tmpl_news");
		var html = tmpl.render(data);
		$('#news').html(html)
	}
</script>