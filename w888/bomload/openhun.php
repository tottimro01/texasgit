<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('../inc/conn.php');
require('../inc/function.php');



##################JSON Lotto Config
$sql="select * from bom_tb_agent where   r_level=4 order by r_id asc ";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
	$sh=@explode(",",$rs[r_lotto_share]);
	$share=$sh[1];
	
	$shmy=@explode(",",$rs[r_lotto_myshare_super]);
	$sharemy=$shmy[1];
echo "update bom_tb_agent set
r_lotto_hun_myshare_super='$rs[r_lotto_myshare_super]' , r_lotto_hun_myshare_senior='$rs[r_lotto_myshare_senior]' , r_lotto_hun_myshare_master='$rs[r_lotto_myshare_master]' 
, r_lotto_hun_force_super='$rs[r_lotto_force_super]' , r_lotto_hun_force_senior='$rs[r_lotto_force_senior]' , r_lotto_hun_force_master='$rs[r_lotto_force_master]' , 
r_lotto_hun_force_agent='$rs[r_lotto_force_agent]' 
, r_share_games='$share' , r_myshare_games='$sharemy' 
 where  r_id='$rs[r_id]';<br> ";
##################JSON LottoMaxReceive
}


?>