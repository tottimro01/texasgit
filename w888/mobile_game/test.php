<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php 
require('../inc/conn.php');
require('../inc/function.php');

echo $_SESSION[mid]."<br>";

// $url_file="../games/json/bet_id.txt";
// $date2_js=file_get_contents2($url_file);
// $date2_bet = json_decode($date2_js, true);
// $bet_id=$date2_bet[0][id];
// $bet_id ='1806201047';

// echo $bet_id."<br>";
$sql="select *  from bom_tb_games_bill_play   where  1 and m_id='$_SESSION[mid]' limit 0 , 10";
// $sql="select * from bom_tb_games_bill_play_live where m_id='$_SESSION[mid]' and bet_id='{$bet_id}'  order by play_id desc limit 100";
// $sql = "select * form bom_tb_games_bill_play";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
	print_r($rs);
	echo "<br>";
	
}

?>

<select name="" id="">
	
	<option value="">1</option>
</select>