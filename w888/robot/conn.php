<?php 
require('conn_dd.php');

function conn_db_func(){
	global $conn;
	global $hostname_conn;
	global $username_conn;
	global $password_conn;
	global $database_conn;

$conn = @mysql_connect($hostname_conn, $username_conn, $password_conn, $database_conn)or die("No connect");
@mysql_query("SET NAMES UTF8");


@mysql_select_db($database_conn)or die("No connect");
}
################################

function close_db_func(){
	global $conn;
	 @mysql_close($conn);
}
###############################
function sql_query($sqlSelect){	
	global $database_conn;
	conn_db_func();		
	$result =  @mysql_db_query($database_conn, $sqlSelect);
	close_db_func();		
	return $result;	}
	
###############################
function sql_array($sqlSelect){	
	global $database_conn;
	conn_db_func();		
	$result =  @mysql_db_query($database_conn, $sqlSelect);
	$array= @sql_fetch($result); 
	close_db_func();		
	return $array;	}
	

?>