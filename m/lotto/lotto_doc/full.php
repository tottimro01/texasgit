<?
	session_start();

    $head_title = $lang_member[414] . " - " . $lang_g['lotZone'][$_SESSION["zone_hun"]]." ".$lang_member[688]." ".$_SESSION["rob_hun"];
?>
<div class="h-100">
	<div class="h-100">
		<div class="h-100" style="overflow-y: auto;">

			<div class="d-flex flex-column h-100">
		
				<div class="p-1 mb-2 text-center text-white rounded-top m_bg">
					<h6 class="m-0"><?=$head_title;?></h6>
				</div>
				

				<div class="lotto-scroll-area">
					<div id="full"></div>
				</div>

			</div>

  		</div>
	</div>
</div>
<form action="process/get_full.php" method="get" id="form_full" class="auto-form" data-oninit="addLoadingTask" data-oncomplete="subtractLoadingTask" data-onsuccess="renderFullTable">
	<fieldset></fieldset>
</form>
<script id="tmpl_full" type="text/x-jsrender">
{{for full}}
	<div class="mb-1 small">
		<div class="text-white m_bg p-1 font-weight-bold">
			<span>{{:lot_type}}</span>
		</div>
		<div class="m_color bg-light p-1">
			<span>{{:lot_txt}}</span>
		</div>
	</div>
{{/for}}
</script>
<script>
	$('#form_full').trigger('submit');
	function renderFullTable(form, data){
		var data = {full: data };
		var tmpl = $.templates("#tmpl_full");
		var html = tmpl.render(data);
		$('#full').html(html);
	}
</script>