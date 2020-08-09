<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<meta charset="utf-8">
<?
require('../inc/conn.php');
require('../inc/function.php');
/*
echo'$arr_z=array();<br>';
$re=sql_query("select * from bom_tb_lang_zone where la!=''");
while($rs=sql_fetch($re)){
echo'$arr_z["'.md5(trim($rs[en])).'"]="'.trim($rs[la]).'";<br>';
}
*/
#echo'<br>$arr_t=array();<br>';
$re=sql_query("select * from bom_tb_lang_team where la!=''  limit 9001, 12000");
while($rs=sql_fetch($re)){
echo'$arr_t["'.md5(trim($rs[en])).'"]="'.trim($rs[la]).'";<br>';
}
?>

