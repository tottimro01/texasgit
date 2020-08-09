
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
  <?
#  $sql="TRUNCATE TABLE  tb_check ";
 for($xx=1;$xx<=20000;$xx++){
	$sql="INSERT IGNORE INTO z_write (z_txt, z_date) values ('aaaa', getdate() );";
	$re=mssql_query($sql);
	
	echo"$xx=$sql<br>";
	}
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

