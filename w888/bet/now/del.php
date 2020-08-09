<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
//Step & YODAY
require('../inc/conn.php');
require('../inc/function.php');

$del_time=$time_stam-600;
$sql="delete from pha_tb_ball_list_live_bb where b_time<'$del_time' ";
sql_query($sql);
?>