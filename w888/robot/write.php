<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
require('conn.php');
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;
?>

<h1>Write Speed</h1>
<?

for($xx=1;$xx<=1000;$xx++){
	$sql="INSERT IGNORE INTO z_write (z_txt, z_date) values ('aaaa-".time()."', now() );";
	sql_query($sql);
	echo"$xx=$sql<br>";
	}


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

