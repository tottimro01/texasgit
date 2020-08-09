<?
$url_file="bacarat/json/win.txt";
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
$txt1a='<img src="img/bacarat/card/'.$date2_bet[0][1].'.jpg" height="80" style="position: absolute;top: 0px; ;left: 0px;">';
$txt1b='<img src="img/bacarat/card/'.$date2_bet[0][2].'.jpg" height="80" style="position: absolute;top: 0px; left: 0px;">';
$txt1c='<img src="img/bacarat/card/'.$date2_bet[0][2].'.jpg" height="80" style="position: absolute;top: 0px; left: 0px;">';
$txt1d='<img src="img/bacarat/card/'.$date2_bet[0][2].'.jpg" height="80" style="position: absolute;top: 0px; left: 0px;">';
?>