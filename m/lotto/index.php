<?
	$docBodyClass = "removeLoaderOnLoad";
	include 'header.php';
?>
<div id="content-wrapper" class="h-100">
	<div id="content" class="h-100 p-1"></div>	
</div>
<form action="process/load_page.php" id="FormQueryPage" class="auto-form" data-datatype="html" method="get" data-cache="false" data-onsuccess="renderPageContent" data-oninit="addLoadingTask" data-oncomplete="subtractLoadingTask">
	<input type="hidden" name="cmd" id="cmd" value="" />
    <input type="hidden" name="lang" value="<?=$lang;?>" />
</form>
<?
	include 'footer.php';
?>