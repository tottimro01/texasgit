<?php
  session_start();
  if(isset($_SESSION["manage_language"]) == null){
    header('Location:login.php');
  }
  require_once 'inc/conn.php';

  if($_POST["rule_lang"]!=""){
  	$url_file="../lang/rule/".$_POST["rule_lang"]."_football.php";    
  	@write($url_file ,$_POST['rule_txt'],"w+"); 
  }


function write($path, $content, $mode="w+"){
	@unlink($path);
    if (file_exists($path) && !is_writeable($path)){ return false; }
    if ($fp = fopen($path, $mode)){
        fwrite($fp, $content);
        fclose($fp);
    }
    else { return false; }
    return true;
}
  //$rs_rule = sql_array("select * from bom_tb_lang_rule where rule_type = 1");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="margin: 0px;">
	<h3 style="width: 50%; float: left; margin-left: 10px;">กฏกติกาฟุตบอล</h3>
	<form method="POST">
		<select style="float: right; margin: 10px;" name="rule_lang" onchange="window.location.href='rule_sport.php?lg='+this.value;">
			<option value="en"<? if($_GET["lg"]=="en"){ ?> selected="selected"<? } ?>>en</option>
			<option value="th"<? if($_GET["lg"]=="th"){ ?> selected="selected"<? } ?>>th</option>
			<option value="jp"<? if($_GET["lg"]=="jp"){ ?> selected="selected"<? } ?>>jp</option>
			<option value="ko"<? if($_GET["lg"]=="ko"){ ?> selected="selected"<? } ?>>ko</option>
			<option value="cn"<? if($_GET["lg"]=="cn"){ ?> selected="selected"<? } ?>>cn</option>
			<option value="vn"<? if($_GET["lg"]=="vn"){ ?> selected="selected"<? } ?>>vn</option>
			<option value="id"<? if($_GET["lg"]=="id"){ ?> selected="selected"<? } ?>>id</option>
			<option value="mm"<? if($_GET["lg"]=="mm"){ ?> selected="selected"<? } ?>>mm</option>
			<option value="km"<? if($_GET["lg"]=="km"){ ?> selected="selected"<? } ?>>km</option>
			<option value="la"<? if($_GET["lg"]=="la"){ ?> selected="selected"<? } ?>>la</option>
		</select>
		<textarea style="width: 90%; height: 90vh; display: block; margin: auto;" name="rule_txt"><? include "../lang/rule/".$_GET["lg"].'_football.php'; ?></textarea>
		<button type="submit" style="display: block; width: 90%; height: 40px; margin: 10px auto;">บันทึก</button>
	</form>
</body>
</html>