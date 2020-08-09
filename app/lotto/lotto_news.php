<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
header("Content-type: text/json");     
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);
require ("../inc/conn.php");
require ("../inc/function.php");

$arr = array();


$sql = "SELECT * FROM bom_tb_news WHERE b_zone = 2 ORDER BY n_date DESC"; 
$resNews = sql_query($sql);
$c = 0;
while ($news = sql_fetch($resNews)){
	if($_GET["lang"]=="th"){
		$news["n_note"] = $news["n_note_th"];
	}else if($_GET["lang"]=="cn"){
		$news["n_note"] = $news["n_note_cn"];
	}else{
		$news["n_note"] = $news["n_note_en"];
	}

	if($news["n_note"]==""){
		$news["n_note"] = $news["n_note_en"];
	}
	
	$arr[] = $news;
}

echo json_encode($arr);
//echo file_get_contents2("../json/news/lotto.json");
?>