<?
$url_file="../games/bacarat/json/win.txt";
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
$txt1a='<img src="../img/bacarat/card/'.$date2_bet[0][1].'.jpg">';
$txt1b='<img src="../img/bacarat/card/'.$date2_bet[0][2].'.jpg">';
$txt1c='<img src="../img/bacarat/card/'.$date2_bet[0][3].'.jpg">';
$txt1d='<img src="../img/bacarat/card/'.$date2_bet[0][4].'.jpg">';
?>