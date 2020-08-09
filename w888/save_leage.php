<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php       
header("Content-type:text/html; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);     
$_SESSION["ppp"][$_POST['sport']] = "";
$ar = $_REQUEST['le'];
$_SESSION["ppp"][$_POST['sport']] = $ar;
//print_r($_SESSION["ppp"]);
echo "ok";
?>

