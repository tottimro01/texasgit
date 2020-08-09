<?
if(isset($_GET['o_file'])) {
	$url = $_GET['o_file'];
	// $url = $_SESSION["url"].$_POST['o_file']."?mid=".$_SESSION["mid"]."&lang=".$_COOKIE["lang"];
	unset($_GET['o_file']);
}else {
	$url = "getZone.php";
	// $url = $_SESSION["url"]."getZone.php?mid=".$_SESSION["mid"]."&lang=".$_COOKIE["lang"];
}
?>
<script>var z_url = '<?=base64_encode($url);?>'</script>
<script src="library/js/zone.js?v=<?=time();?>"></script>
<form action="index.php?page=quick" hidden="true" method="post" id="zform">
	<input type="hidden" name="fzone" id="fzone">
	<input type="hidden" name="frob" id="frob">
</form>

<form action="index.php?page=lotto-zone&o_file=getRob18.php" hidden="true" method="post" id="_24form">
	<input type="hidden" name="o_file" id="o_file">
</form>

<div class="page-wrapper-flex">
	<div class="content-title"><?=$lang_data["select_zone"];?></div>
	<div class="zone-container" id="zone"></div>
</div>



