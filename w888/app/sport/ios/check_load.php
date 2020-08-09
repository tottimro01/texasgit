<?
header("Content-type: text/json");     
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);
$arrData=array();
//$arrData["check_load"]="1518192185";
$arrData["check_load"]=time();
echo json_encode($arrData);
?>