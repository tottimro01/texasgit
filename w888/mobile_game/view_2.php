<?
$url_file="../games/hilo/json/win.txt";
$date2_js=file_get_contents2($url_file);
$date2_bet = json_decode($date2_js, true);
$txt2='<img src="../img/hilo/hilo'.$date2_bet[0][1].'.png" ><img src="../img/hilo/hilo'.$date2_bet[0][2].'.png" ><img src="../img/hilo/hilo'.$date2_bet[0][3].'.png" >';
?>