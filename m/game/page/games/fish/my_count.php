<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
  header ("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
  header ("Pragma: no-cache"); // HTTP/1.0


 
if($_SESSION[mid]==""){exit();}

require('../inc/conn.php');

if(!strstr($_SERVER['HTTP_REFERER'],   $check_url   )){ exit();}  

$sql="select m_count   from pha_tb_member where m_id='$_SESSION[mid]'";
$re_m=sql_array($sql);

echo number_format($re_m[m_count]);

?>  