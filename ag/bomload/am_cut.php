<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<meta charset="utf-8">
<?
require('../inc/conn.php');
require('../inc/function.php');



   sql_query("update  bom_tb_member set  m_count=m_count_de  where r_agent_id like '%*40*%' ");
   sql_query("update  bom_tb_member set  m_count=m_count_de  where r_agent_id like '%*45*%' ");
    sql_query("update  bom_tb_member set  m_count=m_count_de  where r_agent_id like '%*124*%' ");
	 sql_query("update  bom_tb_member set  m_count=m_count_de  where r_agent_id like '%*125*%' ");
	sql_query("update  bom_tb_member set  m_count=m_count_de  where r_agent_id like '%*417*%' ");
	sql_query("update  bom_tb_member set  m_count=m_count_de  where r_agent_id like '%*416*%' ");
?>


