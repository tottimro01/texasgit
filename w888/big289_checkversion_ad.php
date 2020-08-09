<?php
header("Content-type: text/json");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);

$arr = array();
$arr["is_check"] = 1;// 1 ให้เช็ก 0 คือไม่ต้องเช็ก
$arr["version"] = 4;
$arr["url"] = "market://details?id=mvk.cig.othto";
echo json_encode($arr);
