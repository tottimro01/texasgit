<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
require('conn.php');
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;
?>

<h1>Speed</h1>
<!--<table border="1" cellspacing="0" cellpadding="0">
  <tr>
  <td>b_id</td>
    <td>b_name</td>
    <td>t_date</td>
  </tr> -->
<?
/*
for($xx=1;$xx<=10000;$xx++){
	$sql="select * from pha_tb_member limit 1";
	$re=sql_array($sql);
	echo"$xx=$re[m_user]<br>";
	}
	*/
	$xx=1;
	$sql="select * from z_read  limit 100000  ";
	$re=sql_query($sql);
	while($rs=sql_fetch($re)){
		echo"$rs[b_id]=$rs[b_name]<br>";
		?>
        
		
<?
	$xx++;	}
	
?>
<!--</table> -->
<hr>
    <?
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$finish = $time;
$total_time = round(($finish - $start), 4);
echo 'ความเร็ว ' . $total_time . ' วินาที.';
?>

