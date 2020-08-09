<?
$url_file="fish/json/win.json";
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
$txt3='<img src="img/fish/'.$date2_bet[0][1].'.png" height="50"><img src="img/fish/'.$date2_bet[0][2].'.png" height="50"><img src="img/fish/'.$date2_bet[0][3].'.png" height="50">';
?>