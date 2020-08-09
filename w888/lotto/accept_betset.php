<?
	session_start();
	require('../inc/conn.php');
	require('../inc/function.php');
	$update = sql_query("UPDATE bom_tb_member SET m_accept_new_set = 1 WHERE m_id = '{$_SESSION['m_id']}'");
	echo "OK";
?>