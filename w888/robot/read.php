<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
require('conn.php');
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;
?>

<h1>Speed</h1>

<?

	$xx=1;
	$sql="select *,en as tname from bom_tb_lang_team  limit 10000";
	$re=sql_query($sql);
	while($rs=sql_fetch($re)){
		echo"$xx = $rs[tname]<br>";
		?>
        
		
<?
	$xx++;	}
	
?>

<hr>
    <?
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$finish = $time;
$total_time = round(($finish - $start), 4);
echo 'ความเร็ว ' . $total_time . ' วินาที.';
?>

