<?
$url_file="dragon/json/win.json";
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
$txt5a='<img src="img/bacarat/card/'.$date2_bet[0][1].'.jpg" height="150" style="position: absolute;top: 7px; ;left: 7px;">';
$txt5b='<img src="img/bacarat/card/'.$date2_bet[0][2].'.jpg" height="150" style="position: absolute;top: 7px; left: 7px;">';
?>