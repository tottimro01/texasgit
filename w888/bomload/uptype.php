<meta charset="utf-8">
<?php
require('../inc/conn.php');
require('../inc/function.php');

if(isset($_POST[b_up])){
	$_POST[trid]=trim($_POST[trid]);
	$sql="update bom_tb_agent set r_type=1 where r_id='$_POST[trid]'";
	sql_query($sql);
	$sql="update bom_tb_member set m_type=1 where r_agent_id like '%*$_POST[trid]*%'";
	sql_query($sql);
}
?>
<form action="" method="post">
RID : <input name="trid" type="text" id="trid" value="<?=$_POST[trid];?>" /><input name="b_up" type="submit" id="b_up" value="บันทึก" />
</form>
