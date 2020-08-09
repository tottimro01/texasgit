<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('../inc/conn.php');
require("../lang/th.php");
require('../inc/function.php');
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<body>

      <?
	$re=sql_query("select * from bom_tb_member order by m_user asc");
	while($rs=sql_fetch($re)){


		$r_lotto_over=$rs[r_lotto_over].',100000';
		/*
		$ex3=explode(',',$rs[m_lotto_share]);
		$m_lotto_share='share,'.$ex3[1].','.$ex3[2].','.$ex3[3].','.$ex3[4].','.$ex3[5].','.$ex3[6].','.$ex3[7].','.$ex3[8].','.$ex3[9].','.$ex3[10].','.$ex3[11].','.$ex3[12].','.$ex3[13].','.$ex3[14].','.$ex3[15].','.$ex3[16].','.$ex3[17].','.$ex3[18].','.$ex3[19].','.$ex3[20].','.$ex3[21].','.$ex3[22].','.$ex3[23].','.$ex3[24].','.$ex3[25];
		*/
	   echo'<br>'.	$sql="update bom_tb_member set  r_lotto_over='$r_lotto_over' where m_id='$rs[m_id]';";
		sql_query($sql);
	}
	
?>
</body>
</html>