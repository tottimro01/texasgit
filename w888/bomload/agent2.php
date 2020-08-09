<?php ob_start(); if (!isset($_SESSION)) { session_start(); } ?>
<?php
require('../inc/conn.php');
require('../inc/function.php');



##################JSON Lotto Config
/*$sql="select * from bom_tb_agent where  1 order by r_id asc ";
$re=sql_query($sql);
while($rs=sql_fetch($re)){
$js1=array();
$js1["r_lotto_over"]="$rs[r_lotto_over]";
$js1["r_lotto_hun_over"]="$rs[r_lotto_hun_over]";
$js1["r_active_bet"]="$rs[r_active_bet]";
$txt=json_encode($js1);
echo '<br>'.$url_file="../json/config/agent/LottoConfig_".$rs[r_id].".json";	
write($url_file ,$txt,"w+"); 
##################JSON LottoMaxReceive
}*/


##################JSON Lotto Config
$sql="select * from bom_tb_member where  `r_agent_id` like '%297%' order by m_id asc ";
$re=sql_query($sql);
while($rsm_2=sql_fetch($re)){

$js1=array();
$js1["m_lotto_nummax"]="$rsm_2[m_lotto_nummax]";
$js1["m_lotto_max"]="$rsm_2[m_lotto_max]";
$js1["m_lotto_min"]="$rsm_2[m_lotto_min]";

$js1["m_lotto_hun_nummax"]="$rsm_2[m_lotto_hun_nummax]";
$js1["m_lotto_hun_max"]="$rsm_2[m_lotto_hun_max]";
$js1["m_lotto_hun_min"]="$rsm_2[m_lotto_hun_min]";

###########################หวย
$js1["m_lotto_myshare_super"]="$rsm_2[m_lotto_myshare_super]";
$js1["m_lotto_myshare_senior"]="$rsm_2[m_lotto_myshare_senior]";
$js1["m_lotto_myshare_master"]="$rsm_2[m_lotto_myshare_master]";
$js1["m_lotto_myshare_agent"]="$rsm_2[m_lotto_myshare_agent]";

$js1["m_lotto_force_super"]="$rsm_2[m_lotto_force_super]";
$js1["m_lotto_force_senior"]="$rsm_2[m_lotto_force_senior]";
$js1["m_lotto_force_master"]="$rsm_2[m_lotto_force_master]";
$js1["m_lotto_force_agent"]="$rsm_2[m_lotto_force_agent]";


$js1["m_lotto_pay_super"]="$rsm_2[m_lotto_pay_super]";
$js1["m_lotto_pay_senior"]="$rsm_2[m_lotto_pay_senior]";
$js1["m_lotto_pay_master"]="$rsm_2[m_lotto_pay_master]";
$js1["m_lotto_pay_agent"]="$rsm_2[m_lotto_pay_agent]";
$js1["m_lotto_pay_member"]="$rsm_2[m_lotto_pay_member]";

$js1["m_lotto_dis_super"]="$rsm_2[m_lotto_dis_super]";
$js1["m_lotto_dis_senior"]="$rsm_2[m_lotto_dis_senior]";
$js1["m_lotto_dis_master"]="$rsm_2[m_lotto_dis_master]";
$js1["m_lotto_dis_agent"]="$rsm_2[m_lotto_dis_agent]";
$js1["m_lotto_dis_member"]="$rsm_2[m_lotto_dis_member]";



###########################หุ้น
$js1["m_lotto_hun_myshare_super"]="$rsm_2[m_lotto_hun_myshare_super]";
$js1["m_lotto_hun_myshare_senior"]="$rsm_2[m_lotto_hun_myshare_senior]";
$js1["m_lotto_hun_myshare_master"]="$rsm_2[m_lotto_hun_myshare_master]";
$js1["m_lotto_hun_myshare_agent"]="$rsm_2[m_lotto_hun_myshare_agent]";

$js1["m_lotto_hun_force_super"]="$rsm_2[m_lotto_hun_force_super]";
$js1["m_lotto_hun_force_senior"]="$rsm_2[m_lotto_hun_force_senior]";
$js1["m_lotto_hun_force_master"]="$rsm_2[m_lotto_hun_force_master]";
$js1["m_lotto_hun_force_agent"]="$rsm_2[m_lotto_hun_force_agent]";


$js1["m_lotto_hun_pay_super"]="$rsm_2[m_lotto_hun_pay_super]";
$js1["m_lotto_hun_pay_senior"]="$rsm_2[m_lotto_hun_pay_senior]";
$js1["m_lotto_hun_pay_master"]="$rsm_2[m_lotto_hun_pay_master]";
$js1["m_lotto_hun_pay_agent"]="$rsm_2[m_lotto_hun_pay_agent]";
$js1["m_lotto_hun_pay_member"]="$rsm_2[m_lotto_hun_pay_member]";

$js1["m_lotto_hun_dis_super"]="$rsm_2[m_lotto_hun_dis_super]";
$js1["m_lotto_hun_dis_senior"]="$rsm_2[m_lotto_hun_dis_senior]";
$js1["m_lotto_hun_dis_master"]="$rsm_2[m_lotto_hun_dis_master]";
$js1["m_lotto_hun_dis_agent"]="$rsm_2[m_lotto_hun_dis_agent]";
$js1["m_lotto_hun_dis_member"]="$rsm_2[m_lotto_hun_dis_member]";

####################################################
$js1["m_min"]="$rsm_2[m_min]";
$js1["m_max"]="$rsm_2[m_max]";
$js1["m_max_match"]="$rsm_2[m_max_match]";

$js1["m_myshare_super"]="$rsm_2[m_myshare_super]";
$js1["m_myshare_senior"]="$rsm_2[m_myshare_senior]";
$js1["m_myshare_master"]="$rsm_2[m_myshare_master]";
$js1["m_myshare_agent"]="$rsm_2[m_myshare_agent]";

$js1["m_force_super"]="$rsm_2[m_force_super]";
$js1["m_force_senior"]="$rsm_2[m_force_senior]";
$js1["m_force_master"]="$rsm_2[m_force_master]";
$js1["m_force_agent"]="$rsm_2[m_force_agent]";


$js1["m_games_dis_super"]="$rsm_2[m_games_dis_super]";
$js1["m_games_dis_senior"]="$rsm_2[m_games_dis_senior]";
$js1["m_games_dis_master"]="$rsm_2[m_games_dis_master]";
$js1["m_games_dis_agent"]="$rsm_2[m_games_dis_agent]";
$js1["m_games_dis_member"]="$rsm_2[m_games_dis_member]";



$js1["m_active_bet"]="$rsm_2[m_active_bet]";

$txt=json_encode($js1);
echo '<br>'.$url_file="../json/config/member/LottoConfig_".$rsm_2[m_id].".json";	
write($url_file ,$txt,"w+"); 
##################JSON LottoMaxReceive
}
?>