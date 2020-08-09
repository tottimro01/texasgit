<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
header("Content-type: text/json");     
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);
require ("../../inc/conn.php");
require ("../../inc/function.php");

echo file_get_contents2("../json/news/lotto.json");
?>