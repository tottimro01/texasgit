<?
	header("Content-type: text/html");
	require '../../../inc/function.php'; 
	require 'compress_page.php';
	
	$data = file_get_contents2("../../../json/news/lotto.json");
	$data = json_decode($data,true);
	foreach ($data as $key => $value) {
	?>
	<div class="news-wrapper">
		<p class="news-content"><?=$value["n_note"];?></p>
		<p class="news-date"><?=$value["n_date"];?></p>
	</div>
<? } ?>

