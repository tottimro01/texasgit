<?
$url_file="2hit/json/win.txt";
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
$txt4='<img src="img/2hit/'.$date2_bet[0][1].'.png" height="35">';
?>