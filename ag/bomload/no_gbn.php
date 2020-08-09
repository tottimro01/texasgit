<? ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<meta charset="utf-8">
<?
require('../inc/conn.php');
require('../inc/function.php');


if(isset($_POST[b_add])){
	
	$_POST[tmid]=trim($_POST[tmid]);
	$_POST[ttime]=trim($_POST[ttime]);
	$_POST[tgbn]=trim(str_replace(',','', $_POST[tgbn]));

	
	$sql="select sum(b_total) as summ from bom_tb_lotto_bill_play  where m_id=$_POST[tmid]  and play_datenow between  '$_POST[ttime]' and '2017-09-16 18:00:00' ";
	$re=sql_array($sql);
	echo $_POST[tgbn]-$re[summ];
}

?>
<form action="" method="post">
       
Mid : 
<input name="tmid" type="text"  id="tmid" value="<?=$_POST[tmid];?>"  size="8"  />
Time : 
<input name="ttime" type="text"  id="ttime" value="<?=$_POST[ttime];?>"  size="8"  />
GBN : 
<input name="tgbn" type="text"  id="tgbn" value="<?=$_POST[tgbn];?>"  size="8"  />
<input name="b_add" type="submit" id="b_add" value="บันทึก" />
</form>

