<?php
header("Content-type: text/json");     
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);


$arr["status"] = 200;
$arr["balance"] = 16010.97;
$arr["systemMaintain"] = 0;

echo $json = json_encode($arr);
?>