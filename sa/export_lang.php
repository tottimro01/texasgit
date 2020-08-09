<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
if($_SESSION[aid]==""){@header('Location: index.php');exit();}
 
require('inc/conn.php');
require('inc/function.php');

foreach ($arr_lang as $key => $value) {
  $txt[$value] = "<?"."\n";
}


$query = "select * from bom_tb_lang_page where type=2 order by lang_id asc";
$result = sql_query($query);
while($rs=sql_fetch($result)){
  foreach ($arr_lang as $key => $value) {
    $txt[$value] .= '$'.'lang_ag['.$rs["lang_id"].'] = "'.$rs[$value].'";'."\n";
  }
}

foreach ($arr_lang as $key => $value) {
  $txt[$value] .= "?>";
}

foreach ($txt as $key => $value) {
  $url_file="../admin_lang/export/lang_ag_".$key.".php";    
  @write($url_file ,$value,"w+");
}
/*$txt44=json_encode($num);
$url_file="../keycode/keycode.json";    
@write($url_file ,$txt44,"w+"); */
?>


