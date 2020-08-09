<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('../inc/conn.php');
require('../inc/function.php');

$rs_credit=sql_array("select sum(m_count) as sm from bom_tb_member where r_agent_id like '%*297*%'");

echo number_format($rs_credit[sm],2);
?>