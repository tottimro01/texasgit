
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<?php



		$hostname_conn = "202.162.78.183";
		$username_conn = "sa";
		$password_conn = "!Bomload9632";
		$database_conn = "admin_lotto17";
		
$link = mssql_connect($hostname_conn , $username_conn, $password_conn);
 
if (!$link)
    die('Unable to connect!');
 
if (!mssql_select_db($database_conn , $link))
    die('Unable to select database!');


$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;

?>

<h1>MS SQL SERVER 2014</h1>
<!--<table border="1" cellspacing="0" cellpadding="0">
  <tr>
  <td>b_id</td>
    <td>b_name</td>
    <td>t_date</td>
  </tr> -->
  <?
 $sql="select  top 100000 * from z_read order by b_id asc";
$re = mssql_query($sql);
while ($rs = mssql_fetch_array($re)) 
{ 
 # var_dump($row);
#$logdate=date_format($rs['t_date'],"Y-m-d H:i:s");
	echo"$rs[b_id]=$rs[b_name]<br>";
  ?>

  <? }?><!--  <tr>
   <td><?=$rs[b_id];?></td>
    <td><?=$rs[b_name];?></td>
    <td><?=$logdate;?></td>
  </tr> -->
<!--</table> -->
<?
mssql_free_result($re);
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

