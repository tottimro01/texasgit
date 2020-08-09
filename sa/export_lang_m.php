<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?
if($_SESSION[aid]==""){@header('Location: index.php');exit();}
 
require('inc/conn.php');
require('inc/function.php');

foreach ($arr_lang as $key => $value) {
  $txt[$value] = "<?"."\n";
}

$find_double_quote = '"';
$query = "select * from bom_tb_lang_page where type=1 order by lang_id asc";
$result = sql_query($query);
while($rs=sql_fetch($result)){
  foreach ($arr_lang as $key => $value) {
  	if(strpos($rs[$value],$find_double_quote)==false){
  		$txt[$value] .= '$'.'lang_member['.$rs["lang_id"].'] = "'.$rs[$value].'";'."\n";
  	}else{
  		$txt[$value] .= '$'.'lang_member['.$rs["lang_id"].'] = "'.str_replace($find_double_quote, '\"', $rs[$value]).'";'."\n";
  	}
    
  }
}

foreach ($arr_lang as $key => $value) {
  $txt[$value] .= "?>";
}

foreach ($txt as $key => $value) {
  $url_file="../admin_lang/export/lang_member_".$key.".php";    
  @write($url_file ,$value,"w+");
}
/*$txt44=json_encode($num);
$url_file="../keycode/keycode.json";    
@write($url_file ,$txt44,"w+"); */
?>


