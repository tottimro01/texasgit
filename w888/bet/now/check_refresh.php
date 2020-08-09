<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
$url_file="refresh.json";		
$live_dd=file_get_contents($url_file);
$live_ok = json_decode($live_dd, true);

if($live_ok[0][time]>0){
echo'';	
}
#print_r($live_ok[0][time]);
/*
$js2=array();
$js2[]=array("time"=>"3");
$txt22=json_encode($js2);
write2($url_file ,$txt22,"w+"); 
*/
?>